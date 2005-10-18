<?php

	/**
	 * Manage privileges in a database
	 *
	 * $Id: privileges.php,v 1.38 2005/10/18 03:45:16 chriskl Exp $
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
	
		if ($confirm) {
			// Get users from the database
			$users = $data->getUsers();
			// Get groups from the database
			$groups = $data->getGroups();
		
			$misc->printTrail($_REQUEST['subject']);
			
			switch ($mode) {
				case 'grant':
					$misc->printTitle($lang['strgrant'],'pg.privilege.grant');
					break;
				case 'revoke':
					$misc->printTitle($lang['strrevoke'],'pg.privilege.revoke');
					break;
			}
			$misc->printMsg($msg);
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data left\">{$lang['strusers']}</th>\n";
			echo "<td class=\"data1\"><select name=\"username[]\" multiple=\"multiple\" size=\"", min(6, $users->recordCount()), "\">\n";
			while (!$users->EOF) {
				$uname = htmlspecialchars($users->f['usename']);
				echo "<option value=\"{$uname}\"",
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
			foreach ($data->privlist[$_REQUEST['subject']] as $v) {
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

			if (isset($_REQUEST[$_REQUEST['subject'].'_oid']))
				echo "<input type=\"hidden\" name=\"", htmlspecialchars($_REQUEST['subject'].'_oid'),
					"\" value=\"", htmlspecialchars($_REQUEST[$_REQUEST['subject'].'_oid']), "\" />\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save\" />\n";
			echo "<input type=\"hidden\" name=\"mode\" value=\"", htmlspecialchars($mode), "\" />\n";
			echo "<input type=\"hidden\" name=\"subject\" value=\"", htmlspecialchars($_REQUEST['subject']), "\" />\n";
			echo "<input type=\"hidden\" name=\"", htmlspecialchars($_REQUEST['subject']),
					"\" value=\"", htmlspecialchars($_REQUEST[$_REQUEST['subject']]), "\" />\n";
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

			// Determine whether object should be ref'd by name or oid.
			if (isset($_REQUEST[$_REQUEST['subject'].'_oid']))
				$object = $_REQUEST[$_REQUEST['subject'].'_oid'];
			else
				$object = $_REQUEST[$_REQUEST['subject']];

			$status = $data->setPrivileges(($mode == 'grant') ? 'GRANT' : 'REVOKE', $_REQUEST['subject'], $object,
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

		$misc->printTrail($_REQUEST['subject']);
		
		# @@@FIXME: This switch is just a temporary solution,
		# need a better way, maybe every type of object should
		# have a tab bar???
		switch ($_REQUEST['subject']) {
			case 'server':
			case 'database':
			case 'schema':
			case 'table':
			case 'view':
				$misc->printTabs($_REQUEST['subject'], 'privileges');
				break;
			default:
				$misc->printTitle($lang['strprivileges'], 'pg.privilege');
		}
		$misc->printMsg($msg);

		// Determine whether object should be ref'd by name or oid.
		if (isset($_REQUEST[$_REQUEST['subject'].'_oid']))
			$object = $_REQUEST[$_REQUEST['subject'].'_oid'];
		else
			$object = $_REQUEST[$_REQUEST['subject']];
		
		// Get the privileges on the object, given its type
		$privileges = $data->getPrivileges($object, $_REQUEST['subject']);

		if (sizeof($privileges) > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['struser']}/{$lang['strgroup']}</th>";
			foreach ($data->privlist[$_REQUEST['subject']] as $v2) {
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
				foreach ($data->privlist[$_REQUEST['subject']] as $v2) {
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
		switch ($_REQUEST['subject']) {
			case 'table':
			case 'view':
			case 'sequence':
			case 'function':
			case 'tablespace':
				$allurl = "{$_REQUEST['subject']}s.php";
				$alltxt = $lang["strshowall{$_REQUEST['subject']}s"];
				break;
			case 'schema':
				$allurl = "database.php";
				$alltxt = $lang["strshowallschemas"];
				break;
			case 'database':
				$allurl = 'all_db.php';
				$alltxt = $lang['strshowalldatabases'];
				break;
		}
		
		$subject = htmlspecialchars(urlencode($_REQUEST['subject']));
		$object = htmlspecialchars(urlencode($_REQUEST[$_REQUEST['subject']]));
		
		if ($_REQUEST['subject'] == 'function') {
			$objectoid = $_REQUEST[$_REQUEST['subject'].'_oid'];
			$alterurl = "{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;{$subject}={$object}&amp;{$subject}_oid=$objectoid&amp;subject={$subject}&amp;mode=";
		} else {
			$alterurl = "{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;{$subject}={$object}&amp;subject={$subject}&amp;mode=";
		}
	
		echo "<p><a class=\"navlink\" href=\"{$alterurl}grant\">{$lang['strgrant']}</a> |\n";
		echo "<a class=\"navlink\" href=\"{$alterurl}revoke\">{$lang['strrevoke']}</a>\n";
		if (isset($allurl))
			echo "| <a class=\"navlink\" href=\"{$allurl}?{$misc->href}\">{$alltxt}</a>\n";
		
		echo "</p>\n";
	}

	$misc->printHeader($lang['strprivileges']);
	$misc->printBody();

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
