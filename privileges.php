<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.9 2003/03/23 03:13:57 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Grant permissions on an object to a user
	 * @peram $confirm To show entry screen
	 * @param $msg (optional) A message to show
	 */
	function doGrantUser($confirm, $msg = '') {
		global $data, $localData, $misc;
  		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['username'])) $_REQUEST['username'] = '';
		if (!isset($_REQUEST['privilege'])) $_REQUEST['privilege'] = '';

		if ($confirm) {
			// Get users from the database
			$users = &$localData->getUsers();

			switch ($_REQUEST['type']) {
				case 'function':
					$name = $_REQUEST['function'];
					break;
				default:
					$name = $_REQUEST['object'];
			}
			echo "<h2>{$lang['strprivileges']}: ", htmlspecialchars($name), ": {$lang['strgrant']}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['struser']}</th>\n";
			echo "<td class=\"data1\"><select name=\"username\">\n";
			// Automatically prepend PUBLIC to the list of users
			echo "<option value=\"PUBLIC\"",
				('PUBLIC' == $_REQUEST['username']) ? ' selected' : '', ">PUBLIC</option>\n";
			while (!$users->EOF) {
				$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
				echo "<option value=\"{$uname}\"",
					($uname == $_REQUEST['username']) ? ' selected' : '', ">{$uname}</option>\n";
				$users->moveNext();
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strprivilege']}</th>\n";
			echo "<td class=\"data1\"><select name=\"privilege\">\n";
			foreach ($data->privlist[$_REQUEST['type']] as $v) {
				$v = htmlspecialchars($v);
				echo "<option value=\"{$v}\"",
					($v == $_REQUEST['privilege']) ? ' selected' : '', ">{$v}</option>\n";
			}
			echo "</select></td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"savegrantuser\">\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']),"\">\n";
			echo "<input type=\"hidden\" name=\"object\" value=\"", htmlspecialchars($_REQUEST['object']),"\">\n";
			switch ($_REQUEST['type']) {
				case 'table':
					echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']),"\">\n";
					break;
				case 'function':
					echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']),"\">\n";
					break;
				default:
			}
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"confirm\" value=\"{$lang['strgrant']}\"> <input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\"></p>\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->grantPrivileges($_REQUEST['type'], $_REQUEST['object'],
				($_REQUEST['username'] == 'PUBLIC') ? 'PUBLIC' : 'USER',
				$_REQUEST['username'], $_REQUEST['privilege']);
			if ($status == 0)
				doDefault($lang['strgranted']);
			else
				doDefault($lang['strgrantfailed']);
		}
	}

	/**
	 * Grant permissions on an object to a group
	 * @peram $confirm To show entry screen
	 * @param $msg (optional) A message to show
	 */
	function doGrantGroup($confirm, $msg = '') {
		global $data, $localData, $misc;
  		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['groupname'])) $_REQUEST['groupname'] = '';
		if (!isset($_REQUEST['privilege'])) $_REQUEST['privilege'] = '';

		if ($confirm) {
			// Get groups from the database
			$groups = &$localData->getGroups();

			switch ($_REQUEST['type']) {
				case 'function':
					$name = $_REQUEST['function'];
					break;
				default:
					$name = $_REQUEST['object'];
			}
			echo "<h2>{$lang['strprivileges']}: ", htmlspecialchars($name), ": {$lang['strgrant']}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strgroup']}</th>\n";
			echo "<td class=\"data1\"><select name=\"groupname\">\n";
			// Automatically prepend PUBLIC to the list of groups
			echo "<option value=\"PUBLIC\"",
				('PUBLIC' == $_REQUEST['groupname']) ? ' selected' : '', ">PUBLIC</option>\n";
			while (!$groups->EOF) {
				$gname = htmlspecialchars($groups->f[$data->grpFields['groname']]);
				echo "<option value=\"{$gname}\"",
					($gname == $_REQUEST['groupname']) ? ' selected' : '', ">{$gname}</option>\n";
				$groups->moveNext();
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strprivilege']}</th>\n";
			echo "<td class=\"data1\"><select name=\"privilege\">\n";
			foreach ($data->privlist[$_REQUEST['type']] as $v) {
				$v = htmlspecialchars($v);
				echo "<option value=\"{$v}\"",
					($v == $_REQUEST['privilege']) ? ' selected' : '', ">{$v}</option>\n";
			}
			echo "</select></td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"savegrantgroup\">\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']),"\">\n";
			echo "<input type=\"hidden\" name=\"object\" value=\"", htmlspecialchars($_REQUEST['object']),"\">\n";
			switch ($_REQUEST['type']) {
				case 'table':
					echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']),"\">\n";
					break;
				case 'function':
					echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']),"\">\n";
					break;
				default:
			}
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"confirm\" value=\"{$lang['strgrant']}\"> <input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\"></p>\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->grantPrivileges($_REQUEST['type'], $_REQUEST['object'],
				($_REQUEST['groupname'] == 'PUBLIC') ? 'PUBLIC' : 'GROUP',
				$_REQUEST['groupname'], $_REQUEST['privilege']);
			if ($status == 0)
				doDefault($lang['strgranted']);
			else
				doDefault($lang['strgrantfailed']);
		}
	}

	/**
	 * Show permissions on a database, namespace, relation, language or function
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $lang;

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
		echo "<h2>{$lang['strprivileges']}: ", htmlspecialchars($name), "</h2>\n";
		$misc->printMsg($msg);

		// Get the privileges on the object, given its type
		$privileges = $localData->getPrivileges($_REQUEST['object'], $_REQUEST['type']);

		if (sizeof($privileges) > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['struser']}/{$lang['strgroup']}</th>";
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
						echo "<td class=\"data{$id}\">{$lang['stryes']}</td>\n";
					else
						echo "<td class=\"data{$id}\">{$lang['strno']}</td>\n";
				}
				if ($data->hasGrantOption()) {
					echo "<td class=\"data{$id}\">", ($v[3]) ? $lang['stryes'] : $lang['strno'], "</td>\n";
					echo "<td class=\"data{$id}\">", htmlspecialchars($v[4]), "</td>\n";
				}
				echo "</tr>\n";
				$i++;
			}

			echo "</table>";
		}
		else {
			echo "<p>{$lang['strnoprivileges']}</p>\n";
		}
		
		// Links for granting to a user or group
		switch ($_REQUEST['type']) {
			case 'table':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&table=", urlencode($_REQUEST['table']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&table=", urlencode($_REQUEST['table']), "\">{$lang['strgrantgroup']}</a>\n";
				break;
			case 'view':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantgroup']}</a>\n";
				echo "| <a class=\"navlink\" href=\"views.php?{$misc->href}\">{$lang['strshowallviews']}</a></p>\n";
				break;
			case 'sequence':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantgroup']}</a>\n";
				echo "| <a class=\"navlink\" href=\"sequences.php?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
				break;
			case 'database':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantgroup']}</a>\n";
				break;
			case 'function':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&function=", urlencode($_REQUEST['function']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&function=", urlencode($_REQUEST['function']), "\">{$lang['strgrantgroup']}</a>\n";
				echo "| <a class=\"navlink\" href=\"functions.php?{$misc->href}\">{$lang['strshowallfunctions']}</a></p>\n";
				break;
			case 'schema':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=grantuser&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantuser']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=grantgroup&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['strgrantgroup']}</a>\n";
				echo "| <a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
					"\">{$lang['strshowallschemas']}</a></p>\n";
				break;
		}
		echo "</p>\n";
	}

	$misc->printHeader($lang['strprivileges']);
	$misc->printBody();

	switch ($action) {
		case 'savegrantgroup':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doGrantGroup(false);
			break;
		case 'grantgroup':
			doGrantGroup(true);
			break;
		case 'savegrantuser':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doGrantUser(false);
			break;
		case 'grantuser':
			doGrantUser(true);
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
