<?php

	/**
	 * Manage sequences in a database
	 *
	 * $Id: sequences.php,v 1.39 2007/05/03 17:01:03 ioguix Exp $
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
		global $data, $conf, $misc; 
		global $PHP_SELF, $lang;
		
		$misc->printTrail('schema');
		$misc->printTabs('schema', 'sequences');
		$misc->printMsg($msg);
		
		// Get all sequences
		$sequences = $data->getSequences();
		
		$columns = array(
			'sequence' => array(
				'title' => $lang['strsequence'],
				'field' => 'seqname',
				'url'   => "{$PHP_SELF}?action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('sequence' => 'seqname'),
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'seqowner',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'seqcomment',
			),
		);
		
		$actions = array(
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "sequences.php?action=confirm_alter&amp;{$misc->href}&amp;subject=sequence&amp;",
				'vars'  => array('sequence' => 'seqname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('sequence' => 'seqname'),
			),
			'privileges' => array(
				'title' => $lang['strprivileges'],
				'url'   => "privileges.php?{$misc->href}&amp;subject=sequence&amp;",
				'vars'  => array('sequence' => 'seqname'),
			),
		);
		
		if (!$data->hasAlterSequence()) unset($actions['alter']);
		$misc->printTable($sequences, $columns, $actions, $lang['strnosequences']);
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreatesequence']}</a></p>\n";
	}
	
	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$sequences = $data->getSequences();
		
		$reqvars = $misc->getRequestVars('sequence');
		
		$attrs = array(
			'text'   => field('seqname'),
			'icon'   => 'Sequence',
			'toolTip'=> field('seqcomment'),
			'action' => url('sequences.php',
							$reqvars,
							array (
								'action' => 'properties',
								'sequence' => field('seqname')
							)
						)
		);
		
		$misc->printTreeXML($sequences, $attrs);
		exit;
	}
	
	/**
	 * Display the properties of a sequence
	 */	 
	function doProperties($msg = '') {
		global $data, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('sequence');
		$misc->printTitle($lang['strproperties'],'pg.sequence');
		$misc->printMsg($msg);
		
		// Fetch the sequence information
		$sequence = $data->getSequence($_REQUEST['sequence']);		
		
		if (is_object($sequence) && $sequence->recordCount() > 0) {
			$sequence->fields['is_cycled'] = $data->phpBool($sequence->fields['is_cycled']);
			$sequence->fields['is_called'] = $data->phpBool($sequence->fields['is_called']);

			// Show comment if any
			if ($sequence->fields['seqcomment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($sequence->fields['seqcomment']), "</p>\n";

			echo "<table border=\"0\">";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strlastvalue']}</th>";
			echo "<th class=\"data\">{$lang['strincrementby']}</th><th class=\"data\">{$lang['strmaxvalue']}</th>";
			echo "<th class=\"data\">{$lang['strminvalue']}</th><th class=\"data\">{$lang['strcachevalue']}</th>";
			// PostgreSQL 7.0 and below don't have logcount
			if (isset($sequence->fields['log_cnt'])) {
				echo "<th class=\"data\">{$lang['strlogcount']}</th>";
			}
			echo "<th class=\"data\">{$lang['strcancycle']}</th><th class=\"data\">{$lang['striscalled']}</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['seqname']), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['last_value']), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['increment_by']), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['max_value']), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['min_value']), "</td>";
			echo "<td class=\"data1\">", $misc->printVal($sequence->fields['cache_value']), "</td>";
			// PostgreSQL 7.0 and below don't have logcount
			if (isset($sequence->fields['log_cnt'])) {
				echo "<td class=\"data1\">", $misc->printVal($sequence->fields['log_cnt']), "</td>";
			}
			echo "<td class=\"data1\">", ($sequence->fields['is_cycled'] ? $lang['stryes'] : $lang['strno']), "</td>";
			echo "<td class=\"data1\">", ($sequence->fields['is_called'] ? $lang['stryes'] : $lang['strno']), "</td>";
			echo "</tr>";
			echo "</table>";
			
			if ($data->hasAlterSequence()) {
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_alter&amp;{$misc->href}&amp;sequence=", urlencode($sequence->fields['seqname']), "\">{$lang['stralter']}</a> |\n";
			}
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_setval&amp;{$misc->href}&amp;sequence=", urlencode($sequence->fields['seqname']), "\">{$lang['strsetval']}</a> |\n";
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=nextval&amp;{$misc->href}&amp;sequence=", urlencode($sequence->fields['seqname']), "\">{$lang['strnextval']}</a> |\n";
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=reset&amp;{$misc->href}&amp;sequence=", urlencode($sequence->fields['seqname']), "\">{$lang['strreset']}</a> |\n";
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/**
	 * Drop a sequence
	 */	 	
	function doDrop($confirm, $msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) {
			$misc->printTrail('sequence');
			$misc->printTitle($lang['strdrop'],'pg.sequence.drop');
			$misc->printMsg($msg);
			
			echo "<p>", sprintf($lang['strconfdropsequence'], $misc->printVal($_REQUEST['sequence'])), "</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" id=\"cascade\" name=\"cascade\" /> <label for=\"cascade\">{$lang['strcascade']}</label></p>\n";
			}
			echo "<p><input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
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
		if (!isset($_POST['formMinValue'])) $_POST['formMinValue'] = '';
		if (!isset($_POST['formMaxValue'])) $_POST['formMaxValue'] = '';
		if (!isset($_POST['formStartValue'])) $_POST['formStartValue'] = '';
		if (!isset($_POST['formCacheValue'])) $_POST['formCacheValue'] = '';
		
		$misc->printTrail('schema');
		$misc->printTitle($lang['strcreatesequence'],'pg.sequence.create');
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		
		echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formSequenceName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formSequenceName']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strincrementby']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formIncrement\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formIncrement']), "\" /> </td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strminvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMinValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMinValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strmaxvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formMaxValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formMaxValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strstartvalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formStartValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formStartValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\">{$lang['strcachevalue']}</th>\n";
		echo "<td class=\"data1\"><input name=\"formCacheValue\" size=\"5\" value=\"",
			htmlspecialchars($_POST['formCacheValue']), "\" /></td></tr>\n";
		
		echo "<tr><th class=\"data left\"><label for=\"formCycledValue\">{$lang['strcancycle']}</label></th>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" id=\"formCycledValue\" name=\"formCycledValue\" ",
			(isset($_POST['formCycledValue']) ? ' checked="checked"' : ''), " /></td></tr>\n";

		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create_sequence\" />\n";
		echo $misc->form;
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
			$status = $data->createSequence($_POST['formSequenceName'],
				$_POST['formIncrement'], $_POST['formMinValue'],
				$_POST['formMaxValue'], $_POST['formStartValue'],
				$_POST['formCacheValue'], isset($_POST['formCycledValue']));
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
	
	/**
	 * Set Nextval of a sequence
	 */
	function doNextval() {
		global $data;
		global $PHP_SELF, $lang;
		
		$status = $data->nextvalSequence($_REQUEST['sequence']);
		if ($status == 0)
			doProperties($lang['strsequencenextval']);
		else	
			doProperties($lang['strsequencenextvalbad']);
	}
	
	/** 
	 * Function to save after 'setval'ing a sequence
	 */
	function doSaveSetval() {
		global $data, $lang, $_reload_browser;

		$status = $data->setvalSequence($_POST['sequence'], $_POST['nextvalue']);
		if ($status == 0)
			doProperties($lang['strsequencesetval']);
		else	
			doProperties($lang['strsequencesetvalbad']);
	}

	/**
	 * Function to allow 'setval'ing of a sequence
	 */
	function doSetval($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('sequence');
		$misc->printTitle($lang['strsetval'], 'pg.sequence');
		$misc->printMsg($msg);

		// Fetch the sequence information
		$sequence = $data->getSequence($_REQUEST['sequence']);		
		
		if (is_object($sequence) && $sequence->recordCount() > 0) {
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table border=\"0\">";
			echo "<tr><th class=\"data left required\">{$lang['strlastvalue']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"nextvalue\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				$misc->printVal($sequence->fields['last_value']), "\" /></td></tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"setval\" />\n";
			echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"setval\" value=\"{$lang['strsetval']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}
	
	/** 
	 * Function to save after altering a sequence
	 */
	function doSaveAlter() {
		global $data, $lang, $_reload_browser;

		$status = $data->alterSequence($_POST['sequence'], $_POST['formIncrement'], $_POST['formMinValue'], $_POST['formMaxValue'], $_POST['formStartValue'], $_POST['formCacheValue'], isset($_POST['formCycledValue']));
		if ($status == 0) {
			doProperties($lang['strsequencealtered']);
		}
		else
			doProperties($lang['strsequencealteredbad']);
	}

	/**
	 * Function to allow altering of a sequence
	 */
	function doAlter($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('sequence');
		$misc->printTitle($lang['stralter'], 'pg.sequence.alter');
		$misc->printMsg($msg);
		
		// Fetch the sequence information
		$sequence = $data->getSequence($_REQUEST['sequence']);
		
		if (is_object($sequence) && $sequence->recordCount() > 0) {
			// Handle Checkbox Value
			$sequence->fields['is_cycled'] = $data->phpBool($sequence->fields['is_cycled']);
			if ($sequence->fields['is_cycled']) $_POST['formCycledValue'] = 'on';

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			
			echo "<tr><th class=\"data left\">{$lang['strstartvalue']}</th>\n";
			echo "<td class=\"data1\"><input name=\"formStartValue\" size=\"5\" value=\"",
				htmlspecialchars($sequence->fields['last_value']), "\" /></td></tr>\n";

			echo "<tr><th class=\"data left\">{$lang['strincrementby']}</th>\n";
			echo "<td class=\"data1\"><input name=\"formIncrement\" size=\"5\" value=\"",
				htmlspecialchars($sequence->fields['increment_by']), "\" /> </td></tr>\n";
			
			echo "<tr><th class=\"data left\">{$lang['strmaxvalue']}</th>\n";
			echo "<td class=\"data1\"><input name=\"formMaxValue\" size=\"5\" value=\"",
				htmlspecialchars($sequence->fields['max_value']), "\" /></td></tr>\n";
			
			echo "<tr><th class=\"data left\">{$lang['strminvalue']}</th>\n";
			echo "<td class=\"data1\"><input name=\"formMinValue\" size=\"5\" value=\"",
				htmlspecialchars($sequence->fields['min_value']), "\" /></td></tr>\n";
			
			echo "<tr><th class=\"data left\">{$lang['strcachevalue']}</th>\n";
			echo "<td class=\"data1\"><input name=\"formCacheValue\" size=\"5\" value=\"",
				htmlspecialchars($sequence->fields['cache_value']), "\" /></td></tr>\n";
			
			echo "<tr><th class=\"data left\"><label for=\"formCycledValue\">{$lang['strcancycle']}</label></th>\n";
			echo "<td class=\"data1\"><input type=\"checkbox\" id=\"formCycledValue\" name=\"formCycledValue\" ",
				( isset($_POST['formCycledValue']) ? ' checked="checked"' : ''), " /></td></tr>\n";
	
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"alter\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"sequence\" value=\"", htmlspecialchars($_REQUEST['sequence']), "\" />\n";
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	if ($action == 'tree') doTree();
	
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
		case 'nextval':
			doNextval();
			break;
		case 'setval':
			if (isset($_POST['setval'])) doSaveSetval();
			else doDefault();
			break;
		case 'confirm_setval':
			doSetval();
			break;
		case 'alter':
			if (isset($_POST['alter'])) doSaveAlter();
			else doDefault();
			break;
		case 'confirm_alter':
			doAlter();
			break;
		default:
			doDefault();
			break;
	}
	
	// Print footer
	$misc->printFooter();

?>
