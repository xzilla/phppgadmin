<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.28 2004/07/22 04:52:50 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Grant permissions on an object to a user
	 * @param $confirm To show entry screen
	 * @param $mode 'grant' or 'revoke'
	 * @param $msg (optional) A message to show
	 */
	function doAlter($confirm, $mode, $msg = '') {
		global $data, $misc;
  		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['username'])) $_REQUEST['username'] = array();
		if (!isset($_REQUEST['groupname'])) $_REQUEST['groupname'] = array();
		if (!isset($_REQUEST['privilege'])) $_REQUEST['privilege'] = array();
		
		// Set name
		switch ($_REQUEST['type']) {
			case 'function':
				$fn = &$data->getFunction($_REQUEST['object']);
				$data->fieldClean($fn->f['proname']);
				$name = $fn->f['proname'] . "(". $fn->f['proarguments'] .")";
				break;
			default:
				$name = $_REQUEST['object'];
		}

		if ($confirm) {
			// Get users from the database
			$users = &$data->getUsers();
			// Get groups from the database
			$groups = &$data->getGroups();

			if ($mode == 'grant')
				echo "<h2>{$lang['strprivileges']}: ", $misc->printVal($name), ": {$lang['strgrant']}</h2>\n";
			elseif ($mode == 'revoke')
				echo "<h2>{$lang['strprivileges']}: ", $misc->printVal($name), ": {$lang['strrevoke']}</h2>\n";
			$misc->printMsg($msg);
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data left\">{$lang['strusers']}</th>\n";
			echo "<td class=\"data1\"><select name=\"username[]\" multiple=\"multiple\" size=\"", min(6, $users->recordCount()), "\">\n";
			while (!$users->EOF) {
				$uname = htmlspecialchars($users->f['usename']);				
				echo "<option value=\"	{$uname}\"",
					in_array($users->f['usename'], $_REQUEST['username']) ? ' selected="selected"' : '', ">{$uname}</option>\n";
				$users->moveNext();
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strgroups']}</th>\n";
			echo "<td class=\"data1\">\n";
			echo "<input type=\"checkbox\" name=\"public\"", (isset($_REQUEST['public']) ? ' checked="checked"' : ''), " />PUBLIC\n";
			// Only show groups if there are groups!
			if ($groups->recordCount() > 0) {
				echo "<br /><select name=\"groupname[]\" multiple=\"multiple\" size=\"", min(6, $groups->recordCount()), "\">\n";
				while (!$groups->EOF) {
					$gname = htmlspecialchars($groups->f['groname']);
					echo "<option value=\"{$gname}\"",
						in_array($groups->f['groname'], $_REQUEST['groupname']) ? ' selected="selected"' : '', ">{$gname}</option>\n";
					$groups->moveNext();
				}
				echo "</select>\n";
			}
			echo "</td></tr>\n";
			echo "<tr><th class=\"data left required\">{$lang['strprivileges']}</th>\n";
			echo "<td class=\"data1\">\n";
			foreach ($data->privlist[$_REQUEST['type']] as $v) {
				$v = htmlspecialchars($v);
				echo "<input type=\"checkbox\" name=\"privilege[$v]\"", 
							isset($_REQUEST['privilege'][$v]) ? ' checked="checked"' : '', " />{$v}<br />\n";
			}
			echo "</td></tr>\n";
			// Grant option
			if ($data->hasGrantOption()) {
				echo "<tr><th class=\"data left\">{$lang['stroptions']}</th>\n";
				echo "<td class=\"data1\">\n";
				if ($mode == 'grant') {
					echo "<input type=\"checkbox\" name=\"grantoption\"", 
								isset($_REQUEST['grantoption']) ? ' checked="checked"' : '', " />GRANT OPTION\n";
				}
				elseif ($mode == 'revoke') {
					echo "<input type=\"checkbox\" name=\"grantoption\"", 
								isset($_REQUEST['grantoption']) ? ' checked="checked"' : '', " />GRANT OPTION FOR<br />\n";
					echo "<input type=\"checkbox\" name=\"cascade\"", 
								isset($_REQUEST['cascade']) ? ' checked="checked"' : '', " />CASCADE<br />\n";
				}
				echo "</td></tr>\n";
			}
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save\" />\n";
			echo "<input type=\"hidden\" name=\"mode\" value=\"", htmlspecialchars($mode), "\" />\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\" />\n";
			echo "<input type=\"hidden\" name=\"object\" value=\"", htmlspecialchars($_REQUEST['object']), "\" />\n";
			switch ($_REQUEST['type']) {
				case 'table':
					echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
					break;
				case 'view':
					echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
					break;
				case 'function':
					echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
					break;
				default:
			}
			echo $misc->form;
			echo "<p>";
			if ($mode == 'grant')
				echo "<input type=\"submit\" name=\"grant\" value=\"{$lang['strgrant']}\" />\n";
			elseif ($mode == 'revoke')
				echo "<input type=\"submit\" name=\"revoke\" value=\"{$lang['strrevoke']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $data->setPrivileges(($mode == 'grant') ? 'GRANT' : 'REVOKE', $_REQUEST['type'], $_REQUEST['object'],
				isset($_REQUEST['public']), $_REQUEST['username'], $_REQUEST['groupname'], array_keys($_REQUEST['privilege']),
				isset($_REQUEST['grantoption']), isset($_REQUEST['cascade']));
			if ($status == 0)
				doDefault($lang['strgranted']);
			elseif ($status == -3 || $status == -4)
				doAlter(true, $_REQUEST['mode'], $lang['strgrantbad']);
			else
				doAlter(true, $_REQUEST['mode'], $lang['strgrantfailed']);
		}
	}

	/**
	 * Show permissions on a database, namespace, relation, language or function
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF, $lang;

		switch ($_REQUEST['type']) {
			case 'function':
				$name = $_REQUEST['function'];
				break;
			default:
				$name = $_REQUEST['object'];
		}
		
		$misc->printTitle(array($lang['strprivileges'], $misc->printVal($name)));
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
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;table=", urlencode($_REQUEST['table']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;table=", urlencode($_REQUEST['table']), "&amp;mode=revoke\">{$lang['strrevoke']}</a></p>\n";
				break;
			case 'view':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;view=", urlencode($_REQUEST['view']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;view=", urlencode($_REQUEST['view']), "&amp;mode=revoke\">{$lang['strrevoke']}</a></p>\n";
				break;
			case 'sequence':
				if (!isset($_REQUEST['sequence'])) $_REQUEST['sequence'] = $_REQUEST['object'];
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;sequence=", urlencode($_REQUEST['sequence']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;sequence=", urlencode($_REQUEST['sequence']), "&amp;mode=revoke\">{$lang['strrevoke']}</a> |\n";
				echo "<a class=\"navlink\" href=\"sequences.php?{$misc->href}\">{$lang['strshowallsequences']}</a></p>\n";
				break;
			case 'database':
				if (!isset($_REQUEST['database'])) $_REQUEST['database'] = $_REQUEST['object'];
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;database=", urlencode($_REQUEST['database']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;database=", urlencode($_REQUEST['database']), "&amp;mode=revoke\">{$lang['strrevoke']}</a> |\n";
				echo "<a class=\"navlink\" href=\"all_db.php\">{$lang['strshowalldatabases']}</a></p>\n";
				break;
			case 'function':
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;function=", urlencode($_REQUEST['function']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;function=", urlencode($_REQUEST['function']), "&amp;mode=revoke\">{$lang['strrevoke']}</a> |\n";
				echo "<a class=\"navlink\" href=\"functions.php?{$misc->href}\">{$lang['strshowallfunctions']}</a></p>\n";
				break;
			case 'schema':
				if (!isset($_REQUEST['schema'])) $_REQUEST['schema'] = $_REQUEST['object'];
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;schema=", urlencode($_REQUEST['schema']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;schema=", urlencode($_REQUEST['schema']), "&amp;mode=revoke\">{$lang['strrevoke']}</a> |\n";
				echo "<a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
					"\">{$lang['strshowallschemas']}</a></p>\n";
				break;
			case 'tablespace':
				if (!isset($_REQUEST['tablespace'])) $_REQUEST['tablespace'] = $_REQUEST['object'];
				echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;tablespace=", urlencode($_REQUEST['tablespace']), "&amp;mode=grant\">{$lang['strgrant']}</a> |\n";
				echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=alter&amp;type={$_REQUEST['type']}&amp;object=",
					urlencode($_REQUEST['object']), "&amp;tablespace=", urlencode($_REQUEST['tablespace']), "&amp;mode=revoke\">{$lang['strrevoke']}</a> |\n";
				echo "<a class=\"navlink\" href=\"tablespaces.php\">{$lang['strshowalltablespaces']}</a></p>\n";
				break;
		}
		echo "</p>\n";
	}

	$misc->printHeader($lang['strprivileges']);
	$misc->printBody();
	$misc->printNav($_REQUEST['type'], 'privileges');

	switch ($action) {
		case 'save':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doAlter(false, $_REQUEST['mode']);
			break;
		case 'alter':
			doAlter(true, $_REQUEST['mode']);
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
