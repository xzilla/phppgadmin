<?php

	/**
	 * Manage sequences in a database
	 *
	 * $Id: sequences.php,v 1.17 2003/12/30 03:09:29 chriskl Exp $
	 */
	
	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Display list of all sequences in the database/schema
	 */	
	function doDefault($msg = '')	{
		global $data, $misc; 
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']}</h2>\n";
		$misc->printMsg($msg);
		
		// Get all sequences
		$sequences = &$data->getSequences();
		
		if (is_object($sequences) && $sequences->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th colspan=\"3\" class=\"data\">{$lang['stractions']}</th></tr>\n";
			$i = 0;
			
			while (!$sequences->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($sequences->f[$data->sqFields['seqname']]), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal($sequences->f[$data->sqFields['seqowner']]), "</td>";
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&amp;{$misc->href}&amp;sequence=", 
					urlencode($sequences->f[$data->sqFields['seqname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&amp;{$misc->href}&amp;sequence=", 
					urlencode($sequences->f[$data->sqFields['seqname']]), "\">{$lang['strdrop']}</td>\n"; 
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"privileges.php?{$misc->href}&amp;object=", urlencode($sequences->f[$data->sqFields['seqname']]),
					"&amp;type=sequence\">{$lang['strprivileges']}</td></tr>\n";
				
				$sequences->movenext();
				$i++;
			}
			
			echo "</table>\n";
		}
		else
			echo "<p>{$lang['strnosequences']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreatesequence']}</a></p>\n";
	}
	
	/**
	 * Display the properties of a sequence
	 */	 
	function doProperties($msg = '') {
		global $data, $misc, $PHP_SELF;
		global $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']} : ", $misc->printVal($_REQUEST['sequence']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		// Fetch the sequence information
		$sequence = &$data->getSequence($_REQUEST['sequence']);		
		
		if (is_object($sequence) && $sequence->recordCount() > 0) {			
			$sequence->f[$data->sqFields['iscycled']] = $data->phpBool($sequence->f[$data->sqFields['iscycled']]);
			$sequence->f[$data->sqFields['iscalled']] = $data->phpBool($sequence->f[$data->sqFields['iscalled']]);
			echo "<table border=\"0\">";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strlastvalue']}</th>";
			echo "<th class=\"data\">{$lang['strincrementby']}</th><th class=\"data\">{$lang['strmaxvalue']}</th>";
			echo "<th class=\"data\">{$lang['strminvalue']}</th><th class=\"data\">{$lang['strcachevalue']}</th>";
			// PostgreSQL 7.0 and below don't have logcount
			if (isset($sequence->f[$data->sqFields['logcount']])) {
				echo "<th class=\"data\">{$lang['strlogcount']}</th>";
			}
			echo "<th class=\"data\">{$lang['striscycled']}</th><th class=\"data\">{$lang['striscalled']}</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['seqname']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['lastvalue']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['incrementby']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['maxvalue']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['minvalue']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['cachevalue']]), "</td>";
			// PostgreSQL 7.0 and below don't have logcount
			if (isset($sequence->f[$data->sqFields['logcount']])) {
				echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['logcount']]), "</td>";
			}
			echo "<td class=\"data1\">", (($sequence->f[$data->sqFields['iscycled']]) ? $lang['stryes'] : $lang['strno']), "</td>";
			echo "<td class=\"data1\">", (($sequence->f[$data->sqFields['iscalled']]) ? $lang['stryes'] : $lang['strno']), "</td>";
			echo "</tr>";
			echo "</table>";
			
			echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=reset&amp;{$misc->href}&amp;sequence=", urlencode($sequence->f[$data->sqFields['seqname']]), "\">{$lang['strreset']}</a> |\n";
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
		}
		else echo "<p>{$lang['strnodata']}.</p>\n";
	}

	/**
	 * Drop a sequence
	 */	 	
	function doDrop($confirm, $msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']} : ", $misc->printVal($_REQUEST['sequence']), ": {$lang['strdrop']}</h2>\n";
			$misc->printMsg($msg);
			
			echo "<p>", sprintf($lang['strconfdropsequence'], $misc->printVal($_REQUEST['sequence'])), "</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropSequence($_POST['sequence'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strsequencedropped']);
			else
				doDrop(true, $lang['strsequencedroppedbad']);
		}	
	}

	/**
	 * Displays a screen where they can enter a new sequence
	 */
	function doCreateSequence($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formSequenceName'])) $_POST['formSequenceName'] = '';
		if (!isset($_POST['formIncrement'])) $_POST['formIncrement'] = '';
		if (!isset($_POST['formStartValue'])) $_POST['formStartValue'] = '';
		if (!isset($_POST['formMinValue'])) $_POST['formMinValue'] = '';
		if (!isset($_POST['formMaxValue'])) $_POST['formMaxValue'] = '';
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']} : {$lang['strcreatesequence']} </h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		
		echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formSequenceName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formSequenceName']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strincrementby']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formIncrement\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formIncrement']), "\" /> </td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strstartvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formStartValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formStartValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strminvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMinValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMinValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strmaxvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMaxValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMaxValue']), "\" /></td></tr>\n";
		
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create_sequence\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
		echo "<input type=\"submit\" name=\"create\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}

	/**
	 * Actually creates the new sequence in the database
	 */
	function doSaveCreateSequence() {
		global $data;
		global $lang;
		
		// Check that they've given a name and at least one column
		if ($_POST['formSequenceName'] == '') doCreateSequence($lang['strsequenceneedsname']);
		else {
			$status = $data->createSequence($_POST['formSequenceName'], $_POST['formIncrement'],
							$_POST['formMinValue'], $_POST['formMaxValue'], $_POST['formStartValue']);
			if ($status == 0) {
				doDefault($lang['strsequencecreated']);
			} else {
				doCreateSequence($lang['strsequencecreatedbad']);
			}
		}
	}

	/**
	 * Resets a sequence
	 */
	function doReset() {
		global $data;
		global $PHP_SELF, $lang;
		
		$status = $data->resetSequence($_REQUEST['sequence']);
		if ($status == 0)
			doProperties($lang['strsequencereset']);
		else	
			doProperties($lang['strsequenceresetbad']);
	}
	
	// Print header
	$misc->printHeader($lang['strsequences']);
	$misc->printBody();
	
	switch($action) {
		case 'create':
			doCreateSequence();
			break;
		case 'save_create_sequence':
			if (isset($_POST['create'])) doSaveCreateSequence();
			else doDefault();
			break;
		case 'properties':
			doProperties();	
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		case 'reset':
			doReset();
			break;
		default:
			doDefault();
			break;
	}
	
	// Print footer
	$misc->printFooter();

?>
