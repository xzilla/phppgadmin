<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.11 2003/04/04 03:59:36 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Allow database administration and tuning tasks
	 */
	function doAdmin($action = '', $msg = '') {
		global $PHP_SELF, $localData, $misc;
		global $lang;

		switch ($action) {
			case 'vacuum':
				$status = $localData->vacuumDB($_REQUEST['database']);
				if ($status == 0) doAdmin('', $lang['strvacuumgood']);
				else doAdmin('', $lang['strvacuumbad']);
				break;
			case 'analyze':
				$status = $localData->analyzeDB($_REQUEST['database']);
				if ($status == 0) doAdmin('', $lang['stranalyzegood']);
				else doAdmin('', $lang['stranalyzebad']);
				break;
			default:
				$misc->printDatabaseNav();
				echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['stradmin']}</h2>\n";
				$misc->printMsg($msg);
				echo "<ul>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&action=vacuum\">{$lang['strvacuum']}</a></li>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&action=analyze\">{$lang['stranalyze']}</a></li>\n";
				echo "</ul>\n";

				break;
		}
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $PHP_SELF, $localData, $misc;
		global $lang;

		if (!isset($_POST['query'])) $_POST['query'] = '';

		$misc->printDatabaseNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strsql']}</h2>\n";

		echo "<p>{$lang['strentersql']}</p>\n";
		echo "<form action=\"display.php\" method=post>\n";
		echo "<p>{$lang['strsql']}<br>\n";
		echo "<textarea style=\"width:100%;\" rows=20 cols=50 name=\"query\">",
			htmlspecialchars($_POST['query']), "</textarea></p>\n";

		echo $misc->form;
		echo "<input type=\"hidden\" name=\"return_url\" value=\"database.php?database=",
			urlencode($_REQUEST['database']), "&action=sql\">\n";
		echo "<input type=\"hidden\" name=\"return_desc\" value=\"{$lang['strback']}\">\n";
		echo "<input type=submit value=\"{$lang['strgo']}\"> <input type=reset value=\"{$lang['strreset']}\">\n";
		echo "</form>\n";

	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $PHP_SELF, $data, $localData;
		global $lang;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ",
				htmlspecialchars($_REQUEST['schema']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdropschema'], htmlspecialchars($_REQUEST['schema'])), "</p>\n";

			echo "<form action=\"{$PHP_SELF}\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_REQUEST['schema']), "\">\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"{$lang['stryes']}\"> <input type=\"submit\" name=\"choice\" value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSchema($_POST['schema']);
			if ($status == 0)
				doDefault($lang['strschemadropped']);
			else
				doDefault($lang['strschemadroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new schema
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		if (!isset($_POST['formAuth'])) $_POST['formAuth'] = $_SESSION['webdbUsername'];

		// Fetch all users from the database
		$users = &$data->getUsers();

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strcreateschema']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strowner']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input name=\"formName\" size=\"{$data->_maxNameLen}\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\"></td>\n";
		echo "<td class=\"data1\"><select name=\"formAuth\">";
		while (!$users->EOF) {
			$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
			echo "<option value=\"{$uname}\"",
				($uname == $_POST['formAuth']) ? ' selected' : '', ">{$uname}</option>\n";
			$users->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "</table>\n";
		echo "<p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\"> <input type=\"reset\" value=\"{$lang['strreset']}\">\n";
		echo "</p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?database=", 
			urlencode($_REQUEST['database']), "\">{$lang['strshowallschemas']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new schema in the database
	 */
	function doSaveCreate() {
		global $localData, $lang;

		// Check that they've given a name
		if ($_POST['formName'] == '') doCreate($lang['strschemaneedsname']);
		else {
			$status = $localData->createSchema($_POST['formName'], $_POST['formAuth']);
			if ($status == 0)
				doDefault($lang['strschemacreated']);
			else
				doCreate($lang['strschemacreatedbad']);
		}
	}	

	/**
	 * Show default list of schemas in the server
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printDatabaseNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strschemas']}</h2>\n";
		$misc->printMsg($msg);
		
		// Check that the DB actually supports schemas
		if ($data->hasSchemas()) {
			$schemas = &$localData->getSchemas();

			if ($schemas->recordCount() > 0) {
				echo "<table>\n";
				echo "<tr><th class=data>{$lang['strname']}</th><th class=data>{$lang['strowner']}</th><th colspan=\"2\" class=data>{$lang['stractions']}</th>\n";
				$i = 0;
				while (!$schemas->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr><td class=data{$id}>", htmlspecialchars($schemas->f[$data->nspFields['nspname']]), "</td>\n";
					echo "<td class=data{$id}>", htmlspecialchars($schemas->f[$data->nspFields['nspowner']]), "</td>\n";
					echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&database=",
						urlencode($_REQUEST['database']), "&schema=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "\">{$lang['strdrop']}</a></td>\n";
					echo "<td class=opbutton{$id}><a href=\"privileges.php?database=",
						urlencode($_REQUEST['database']), "&object=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "&type=schema\">{$lang['strprivileges']}</a></td>\n";
					echo "</tr>\n";
					$schemas->moveNext();
					$i++;
				}
				echo "</table>\n";
			}
			else {
				echo "<p>{$lang['strnoschemas']}</p>\n";
			}

			echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']),
				"&action=create\">{$lang['strcreateschema']}</a></p>\n";
		} else {
			// If the database does not support schemas...
			echo "<p>{$lang['strnoschemas']}</p>\n";
		}
	}

	$misc->printHeader($lang['strschemas']);
	$misc->printBody();

	switch ($action) {
		case 'analyze':
			doAdmin('analyze');
			break;
		case 'vacuum':
			doAdmin('vacuum');
			break;
		case 'admin':
			doAdmin();
			break;
		case 'sql':
			doSQL();
			break;
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == "{$lang['stryes']}") doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		default:
			doDefault();
			break;
	}

	$misc->printFooter();

?>
