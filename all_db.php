<?php

	/**
	 * Manage databases within a server
	 *
	 * $Id: all_db.php,v 1.28 2004/07/10 08:51:01 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang, $_reload_drop_database;

		if ($confirm) { 
			$misc->printTitle(array($lang['strdatabases'], $misc->printVal($_REQUEST['db']), $lang['strdrop']), 'drop_database');
			echo "<p>", sprintf($lang['strconfdropdatabase'], $misc->printVal($_REQUEST['db'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"db\" value=\"", 
				htmlspecialchars($_REQUEST['db']), "\" />\n";
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropDatabase($_POST['db']);
			if ($status == 0) {
				$_reload_drop_database = true;
				doDefault($lang['strdatabasedropped']);
			}
			else
				doDefault($lang['strdatabasedroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new database
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		// Default encoding is that in language file
		if (!isset($_POST['formEncoding'])) {
			if (isset($lang['appdbencoding']))
				$_POST['formEncoding'] = $lang['appdbencoding'];
			else
				$_POST['formEncoding'] = '';
		}
		if (!isset($_POST['formSpc'])) $_POST['formSpc'] = '';
		
		// Fetch all tablespaces from the database
		if ($data->hasTablespaces()) $tablespaces = &$data->getTablespaces();

		$misc->printTitle(array($lang['strdatabases'], $lang['strcreatedatabase']), 'create_database');
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t\t<td class=\"data1\"><input name=\"formName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strencoding']}</th>\n";
		echo "\t\t<td class=\"data1\">\n";
		echo "\t\t\t<select name=\"formEncoding\">\n";
		echo "\t\t\t\t<option value=\"\"></option>\n";
		while (list ($key) = each ($data->codemap)) {
		    echo "\t\t\t\t<option value=\"", htmlspecialchars($key), "\"", 
				($key == $_POST['formEncoding']) ? ' selected="selected"' : '', ">",
				$misc->printVal($key), "</option>\n";
		}
		echo "\t\t\t</select>\n";
		echo "\t\t</td>\n\t</tr>\n";
		
		// Tablespace (if there are any)
		if ($data->hasTablespaces() && $tablespaces->recordCount() > 0) {
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strtablespace']}</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"formSpc\">\n";
			// Always offer the default (empty) option
			echo "\t\t\t\t<option value=\"\"",
				($_POST['formSpc'] == '') ? ' selected="selected"' : '', "></option>\n";
			// Display all other tablespaces
			while (!$tablespaces->EOF) {
				$spcname = htmlspecialchars($tablespaces->f['spcname']);
				echo "\t\t\t\t<option value=\"{$spcname}\"",
					($spcname == $_POST['formSpc']) ? ' selected="selected"' : '', ">{$spcname}</option>\n";
				$tablespaces->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t</tr>\n";
		}
		
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $lang, $_reload_browser;
		
		// Default tablespace to null if it isn't set
		if (!isset($_POST['formSpc'])) $_POST['formSpc'] = null;

		// Check that they've given a name and a definition
		if ($_POST['formName'] == '') doCreate($lang['strdatabaseneedsname']);
		else {
			$status = $data->createDatabase($_POST['formName'], $_POST['formEncoding'], $_POST['formSpc']);
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strdatabasecreated']);
			}
			else
				doCreate($lang['strdatabasecreatedbad']);
		}
	}	

	/**
	 * Show default list of databases in the server
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $PHP_SELF, $lang;

		$misc->printTitle(array($lang['strdatabases']), 'managing_databases');
		$misc->printMsg($msg);
		
		$databases = &$data->getDatabases();

		$columns = array(
			'database' => array(
				'title' => $lang['strdatabase'],
				'field' => 'datname',
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'datowner',
			),
			'encoding' => array(
				'title' => $lang['strencoding'],
				'field' => 'datencoding',
			),
			'tablespace' => array(
				'title' => $lang['strtablespace'],
				'field' => 'tablespace',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'datcomment',
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => 'database.php?',
				'vars'  => array('database' => 'datname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;",
				'vars'  => array('db' => 'datname'),
			),
			'privileges' => array(
				'title' => $lang['strprivileges'],
				'url'   => "privileges.php?type=database&amp;",
				'vars'  => array('object' => 'datname'),
			)
		);
		
		if (!$data->hasTablespaces()) unset($columns['tablespace']);
		
		$misc->printTable($databases, $columns, $actions, $lang['strnodatabases']);

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$lang['strcreatedatabase']}</a></p>\n";

	}

	$misc->printHeader($lang['strdatabases']);
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
			if (isset($_REQUEST['drop'])) doDrop(false);
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
