<?php

	/**
	 * Manage casts in a database
	 *
	 * $Id: casts.php,v 1.1 2003/10/26 12:12:28 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of casts in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strcasts']}</h2>\n";
		$misc->printMsg($msg);
		
		$casts = &$localData->getcasts();

		if ($casts->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strsourcetype']}</th><th class=\"data\">{$lang['strtargettype']}</th>";
			echo "<th class=\"data\">{$lang['strfunction']}</th><th class=\"data\">{$lang['strimplicit']}</th>";
			echo "</tr>\n";
			$i = 0;
			while (!$casts->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($casts->f['castsource']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($casts->f['casttarget']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($casts->f['castfunc']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($casts->f['castcontext']), "</td>\n";
				echo "</tr>\n";
				$casts->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnocasts']}</p>\n";
		}
		
//		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreatecast']}</a></p>\n";
	}

	$misc->printHeader($lang['strcasts']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['cancel'])) doDefault();
			else doDrop(false);
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
