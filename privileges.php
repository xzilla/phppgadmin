<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.20 2003/12/10 16:03:29 chriskl Exp $
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
	function doAlter($confirm, $msg = '') {
		global $data, $misc;
  		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['username'])) $_REQUEST['username'] = array();
		if (!isset($_REQUEST['groupname'])) $_REQUEST['groupname'] = array();
		if (!isset($_REQUEST['privilege'])) $_REQUEST['privilege'] = array();
		
		// Set name
		switch ($_REQUEST['type']) {
			case 'function':
				$fn = &$data->getFunction($_REQUEST['object']);
				$data->fieldClean($fn->f[$data->fnFields['fnname']]);
				$name = $fn->f[$data->fnFields['fnname']] . "(". $fn->f[$data->fnFields['fnarguments']] .")";
				break;
			default:
				$name = $_REQUEST['object'];
		}

		if ($confirm) {
			// Get users from the database
			$users = &$data->getUsers();
			// Get groups from the database
			$groups = &$data->getGroups();

			echo "<h2>{$lang['strprivileges']}: ", $misc->printVal($name), ": {$lang['stralterprivs']}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strusers']}</th>\n";
			echo "<td class=\"data1\"><select name=\"username[]\" multiple=\"multiple\" size=\"", min(6, $users->recordCount()), "\">\n";
			while (!$users->EOF) {
				$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
				echo "<option value=\"{$uname}\"",
					($uname == $_REQUEST['username']) ? ' selected="selected"' : '', ">{$uname}</option>\n";
				$users->moveNext();
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strgroups']}</th>\n";
			echo "<td class=\"data1\">\n";
			echo "<input type=\"checkbox\" name=\"public\"", (isset($_REQUEST['public']) ? ' selected="selected"' : ''), " />PUBLIC\n";
			// Only show groups if there are groups!
			if ($groups->recordCount() > 0) {
				echo "<br /><select name=\"groupname[]\" multiple=\"multiple\" size=\"", min(6, $groups->recordCount()), "\">\n";
				while (!$groups->EOF) {
					$gname = htmlspecialchars($groups->f[$data->grpFields['groname']]);
					echo "<option value=\"{$gname}\"",
						($gname == $_REQUEST['groupname']) ? ' selected="selected"' : '', ">{$gname}</option>\n";
					$groups->moveNext();
				}
				echo "</select>\n";
			}
			echo "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strprivileges']}</th>\n";
			echo "<td class=\"data1\">\n";
			foreach ($data->privlist[$_REQUEST['type']] as $v) {
				$v = htmlspecialchars($v);
				echo "<input type=\"checkbox\" name=\"privilege[$v]\"", 
							isset($_REQUEST['privilege'][$v]) ? ' selected="selected"' : '', " />{$v}<br />\n";
			}
			echo "</td></tr>\n";
			// Grant option
			if ($data->hasGrantOption()) {
				echo "<tr><th class=\"data\">{$lang['stroptions']}</th>\n";
				echo "<td class=\"data1\">\n";
				echo "<input type=\"checkbox\" name=\"grantoption\"", 
							isset($_REQUEST['grantoption']) ? ' selected="selected"' : '', " />GRANT OPTION<br />\n";
				echo "<input type=\"checkbox\" name=\"cascade\"", 
							isset($_REQUEST['cascade']) ? ' selected="selected"' : '', " />CASCADE ({$lang['strrevoke']})<br />\n";
				echo "</td></tr>\n";
			}
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save\" />\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\" />\n";
			echo "<input type=\"hidden\" name=\"object\" value=\"", htmlspecialchars($_REQUEST['object']), "\" />\n";
			switch ($_REQUEST['type']) {
				case 'table':
					echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
					break;
				case 'function':
					echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
					break;
				default:
			}
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"grant\" value=\"{$lang['strgrant']}\" />\n";
			echo "<input type=\"submit\" name=\"revoke\" value=\"{$lang['strrevoke']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			$status = $data->setPrivileges(isset($_REQUEST['grant']) ? 'GRANT' : 'REVOKE', $_REQUEST['type'], $_REQUEST['object'],
				isset($_REQUEST['public']), $_REQUEST['username'], $_REQUEST['groupname'], array_keys($_REQUEST['privilege']),
				isset($_REQUEST['grantoption']), isset($_REQUEST['cascade']));
			if ($status == 0)
				doDefault($lang['strgranted']);
			elseif ($status == -3 || $status == -4)
				doAlter(true, $lang['strgrantbad']);
			else
				doAlter(true, $lang['strgrantfailed']);
		}
	}

	/**
	 * Show permissions on a database, namespace, relation, language or function
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
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
		echo "<h2>{$lang['strprivileges']}: ", $misc->printVal($name), "</h2>\n";
		$misc->printMsg($msg);

		// Get the privileges on the object, given its type
		$privileges = $data->getPrivileges($_REQUEST['object'], $_REQUEST['type']);

		if (sizeof($privileges) > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['struser']}/{$lang['strgroup']}</th>";
			foreach ($data->privlist[$_REQUEST['type']] as $v2) {
				// Skip over ALL PRIVILEGES
				if ($v2 == 'ALL PRIVILEGES') continue;
				echo "<th class=\"data\">{$v2}</th>\n";
			}
			if ($data->hasGrantOption()) {
				echo "<th class=\"data\">{$lang['strgrantor']}</th>";
			}
			echo "</tr>\n";

			// Loop over privileges, outputting them
			$i = 0;
			foreach ($privileges as $v) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($v[0]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($v[1]), "</td>\n";
				foreach ($data->privlist[$_REQUEST['type']] as $v2) {
					// Skip over ALL PRIVILEGES
					if ($v2 == 'ALL PRIVILEGES') continue;
					echo "<td class=\"data{$id}\">";
					if (in_array($v2, $v[2]))
						echo $lang['stryes'];
					else
						echo $lang['strno'];
					// If we have grant option for this, end mark
					if ($data->hasGrantOption() && in_array($v2, $v[4])) echo $lang['strasterisk'];
					echo "</td>\n";
				}
				if ($data->hasGrantOption()) {
					echo "<td class=\"data{$id}\">", $misc->printVal($v[3]), "</td>\n";
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
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&table=", urlencode($_REQUEST['table']), "\">{$lang['stralterprivs']}</a></p>\n";
				break;
			case 'view':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['stralterprivs']}</a>\n";
				echo "| <a class=\"navlink\" href=\"views.php?{$misc->href}\">{$lang['strshowallviews']}</a></p>\n";
				break;
			case 'sequence':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['stralterprivs']}</a>\n";
				echo "| <a class=\"navlink\" href=\"sequences.php?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
				break;
			case 'database':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['stralterprivs']}</a></p>\n";
				break;
			case 'function':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "&function=", urlencode($_REQUEST['function']), "\">{$lang['stralterprivs']}</a>\n";
				echo "| <a class=\"navlink\" href=\"functions.php?{$misc->href}\">{$lang['strshowallfunctions']}</a></p>\n";
				break;
			case 'schema':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&{$misc->href}&type={$_REQUEST['type']}&object=",
					urlencode($_REQUEST['object']), "\">{$lang['stralterprivs']}</a>\n";
				echo "| <a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
					"\">{$lang['strshowallschemas']}</a></p>\n";
				break;
		}
		echo "</p>\n";
	}

	$misc->printHeader($lang['strprivileges']);
	$misc->printBody();

	switch ($action) {
		case 'save':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doAlter(false);
			break;
		case 'alter':
			doAlter(true);
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
