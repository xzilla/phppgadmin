<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.4 2003/02/09 09:23:37 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show permissions on a database, namespace, relation, language or function
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $strPrivileges, $strGrant, $strRevoke;
		global $strUser, $strGroup, $strSelect, $strInsert, $strUpdate, $strDelete, $strRule;
		global $strReferences, $strTrigger, $strAction, $strYes, $strNo, $strType;

		switch ($_REQUEST['type']) {
			case 'database':
				$misc->printDatabaseNav();
				break;
			case 'table':
				$misc->printTableNav();
				break;
		}
		echo "<h2>$strPrivileges: ", htmlspecialchars($_REQUEST['object']), "</h2>\n";
		$misc->printMsg($msg);

		// Get the privileges on the object, given its type
		$privileges = $localData->getPrivileges($_REQUEST['object'], $_REQUEST['type']);

		echo "<table>\n";
		echo "<tr><th class=\"data\">{$strType}</th><th class=\"data\">User/Group</th><th class=\"data\">",
			join('</th><th class="data">', $data->privlist[$_REQUEST['type']]), "</th>";
		echo "<th class=\"data\">Grant Option?</th><th class=\"data\">Grantor</th></tr>\n";

		// Loop over privileges, outputting them
		$i = 0;
		foreach ($privileges as $v) {
			$id = (($i % 2) == 0 ? '1' : '2');
			echo "<tr>\n";
			echo "<td class=\"data{$id}\">", htmlspecialchars($v[0]), "</td>\n";
			echo "<td class=\"data{$id}\">", htmlspecialchars($v[1]), "</td>\n";
			foreach ($data->privlist[$_REQUEST['type']] as $v2) {
				if (in_array($v2, $v[2]))
					echo "<td class=\"data{$id}\">$strYes</td>\n";
				else
					echo "<td class=\"data{$id}\">$strNo</td>\n";
			}
			echo "<td class=\"data{$id}\">", ($v[3]) ? $strYes : $strNo, "</td>\n";
			echo "<td class=\"data{$id}\">", htmlspecialchars($v[4]), "</td>\n";
			echo "</tr>\n";
			$i++;
		}

		echo "</table>";
	}

	$misc->printHeader($strPrivileges);

	switch ($action) {
		case 'edit':
			doEdit();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
