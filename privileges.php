<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.5 2003/02/09 10:22:38 chriskl Exp $
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
		global $strUser, $strGroup, $strYes, $strNo, $strType;
		global $strShowAllViews, $strShowAllSequences, $strShowAllFunctions, $strNoPrivileges;
		global $strShowAllSchemas;

		switch ($_REQUEST['type']) {
			case 'database':
				$misc->printDatabaseNav();
				$name = $_REQUEST['object'];
				break;
			case 'table':
				$misc->printTableNav();
				$name = $_REQUEST['object'];
				break;
			case 'function':
				$name = $_REQUEST['function'];
				break;
			default:
				$name = $_REQUEST['object'];
		}
		echo "<h2>$strPrivileges: ", htmlspecialchars($name), "</h2>\n";
		$misc->printMsg($msg);

		// Get the privileges on the object, given its type
		$privileges = $localData->getPrivileges($_REQUEST['object'], $_REQUEST['type']);

		if (sizeof($privileges) > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strType}</th><th class=\"data\">{$strUser}/{$strGroup}</th>";
			foreach ($data->privlist[$_REQUEST['type']] as $v2) {
				// Skip over ALL PRIVILEGES
				if ($v2 == 'ALL PRIVILEGES') continue;
				echo "<th class=\"data\">{$v2}</th>\n";
			}
			if ($data->hasGrantOption()) {
				echo "<th class=\"data\">Grant Option?</th><th class=\"data\">Grantor</th>";
			}
			echo "</tr>\n";

			// Loop over privileges, outputting them
			$i = 0;
			foreach ($privileges as $v) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($v[0]), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($v[1]), "</td>\n";
				foreach ($data->privlist[$_REQUEST['type']] as $v2) {
					// Skip over ALL PRIVILEGES
					if ($v2 == 'ALL PRIVILEGES') continue;
					if (in_array($v2, $v[2]))
						echo "<td class=\"data{$id}\">$strYes</td>\n";
					else
						echo "<td class=\"data{$id}\">$strNo</td>\n";
				}
				if ($data->hasGrantOption()) {
					echo "<td class=\"data{$id}\">", ($v[3]) ? $strYes : $strNo, "</td>\n";
					echo "<td class=\"data{$id}\">", htmlspecialchars($v[4]), "</td>\n";
				}
				echo "</tr>\n";
				$i++;
			}

			echo "</table>";
		}
		else {
			echo "<p>{$strNoPrivileges}</p>\n";
		}

		switch ($_REQUEST['type']) {
			case 'view':
				echo "<p><a class=\"navlink\" href=\"views.php?{$misc->href}\">{$strShowAllViews}</a></p>\n";
				break;
			case 'sequence':
				echo "<p><a class=\"navlink\" href=\"sequences.php?{$misc->href}\">{$strShowAllSequences}</a></p>\n";
				break;
			case 'function':
				echo "<p><a class=\"navlink\" href=\"functions.php?{$misc->href}\">$strShowAllFunctions</a></p>\n";
				break;
			case 'schema':
				echo "<p><a class=\"navlink\" href=\"database.php?database=", htmlspecialchars($_REQUEST['database']),
					"\">$strShowAllSchemas</a></p>\n";
				break;		
		}
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
