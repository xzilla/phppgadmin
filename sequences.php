<?php

	/**
	 * Manage sequences in a database
	 *
	 * $Id: sequences.php,v 1.14 2003/09/08 03:00:12 chriskl Exp $
	 */
	
	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Display list of all sequences in the database/schema
	 */	
	function doDefault($msg = '')	{
		global $data, $localData, $misc; 
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']}</h2>\n";
		$misc->printMsg($msg);
		
		// Get all sequences
		$sequences = &$localData->getSequences();
		
		if (is_object($sequences) && $sequences->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strsequences']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th colspan=\"3\" class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			
			while (!$sequences->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($sequences->f[$data->sqFields['seqname']]), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal($sequences->f[$data->sqFields['seqowner']]), "</td>";
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&{$misc->href}&sequence=", 
					urlencode($sequences->f[$data->sqFields['seqname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&sequence=", 
					urlencode($sequences->f[$data->sqFields['seqname']]), "\">{$lang['strdrop']}</td>\n"; 
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"privileges.php?{$misc->href}&object=", urlencode($sequences->f[$data->sqFields['seqname']]),
					"&type=sequence\">{$lang['strprivileges']}</td></tr>\n";
				
				$sequences->movenext();
				$i++;
			}
			
			echo "</table>\n";
		}
		else
			echo "<p>{$lang['strnosequences']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatesequence']}</a></p>\n";
	}
	
	/**
	 * Display the properties of a sequence
	 */	 
	function doProperties($msg = '') {
		global $data, $localData, $misc, $PHP_SELF;
		global $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsequences']} : ", $misc->printVal($_REQUEST['sequence']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		// Fetch the sequence information
		$sequence = &$localData->getSequence($_REQUEST['sequence']);		
		
		if (is_object($sequence) && $sequence->recordCount() > 0) {			
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
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['iscycled']]), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->f[$data->sqFields['iscalled']]), "</td>";
			echo "</tr>";
			echo "</table>";
			
			echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=reset&{$misc->href}&sequence=", urlencode($sequence->f[$data->sqFields['seqname']]), "\">{$lang['strreset']}</a> |\n";
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
		}
		else echo "<p>{$lang['strnodata']}.</p>\n";
	}

	/**
	 * Drop a sequence
	 */	 	
	function doDrop($confirm, $msg = '') {
		global $localData, $misc;
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
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSequence($_POST['sequence'], isset($_POST['cascade']));
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
		global $data, $localData, $misc;
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
		
		echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formSequenceName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formSequenceName']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data\">{$lang['strincrementby']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formIncrement\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formIncrement']), "\" /> </td></tr>\n";
		
		echo "<tr><th class=\"data\">{$lang['strstartvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formStartValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formStartValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data\">{$lang['strminvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMinValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMinValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data\">{$lang['strmaxvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMaxValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMaxValue']), "\" /></td></tr>\n";
		
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create_sequence\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}&sequence=", urlencode($_REQUEST['sequence']), "\">{$lang['strshowallsequences']}</a></p>\n";
	}

	/**
	 * Actually creates the new sequence in the database
	 */
	function doSaveCreateSequence() {
		global $localData;
		global $lang;
		
		// Check that they've given a name and at least one column
		if ($_POST['formSequenceName'] == '') doCreateSequence($lang['strsequenceneedsname']);
		else {
			$status = $localData->createSequence($_POST['formSequenceName'], $_POST['formIncrement'],
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
		global $localData;
		global $PHP_SELF, $lang;
		
		$status = $localData->resetSequence($_REQUEST['sequence']);
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
			doSaveCreateSequence();
			break;
		case 'properties':
			doProperties();	
			break;
		case 'drop':
			if (isset($_POST['yes'])) doDrop(false);
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
