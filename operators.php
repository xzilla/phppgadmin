<?php

	/**
	 * Manage operators in a database
	 *
	 * $Id: operators.php,v 1.6 2003/08/27 02:30:12 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of operators in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['stroperators']}</h2>\n";
		$misc->printMsg($msg);
		
		$operators = &$localData->getOperators();

		if ($operators->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['stroperator']}</th><th class=\"data\">{$lang['strleftarg']}</th>";
			echo "<th class=\"data\">{$lang['strrightarg']}</th><th class=\"data\">{$lang['strreturns']}</th>";
			//echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";
			echo "</tr>\n";
			$i = 0;
			while (!$operators->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($operators->f['oprname']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($operators->f['oprleftname']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($operators->f['oprrightname']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($operators->f['resultname']), "</td>\n";
				//echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&amp;{$misc->href}&amp;operatoroid=", urlencode($operators->f['oid']), "\">{$lang['strproperties']}</a></td>\n";
				//echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&amp;{$misc->href}&amp;operatoroid=", urlencode($operators->f['oid']), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$operators->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnooperators']}</p>\n";
		}
		
		//echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreateoperator']}</a></p>\n";
	}

	$misc->printHeader($lang['stroperators']);
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
