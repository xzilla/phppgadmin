<?php

	/**
	 * Manage databases within a server
	 *
	 * $Id: all_db.php,v 1.35 2004/09/07 13:58:21 jollytoad Exp $
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
			$misc->printTrail('database');
			$misc->printTitle($lang['strdrop'], 'pg.database.drop');
			
			echo "<p>", sprintf($lang['strconfdropdatabase'], $misc->printVal($_REQUEST['database'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", 
				htmlspecialchars($_REQUEST['database']), "\" />\n";
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropDatabase($_POST['database']);
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
		
		$misc->printTrail('server');
		$misc->printTitle($lang['strcreatedatabase'], 'pg.database.create');
		$misc->printMsg($msg);
		
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
	 * Displays options for cluster download
	 */
	function doExport($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$misc->printTrail('server');
		$misc->printTabs('server','export');
		$misc->printMsg($msg);

		echo "<form action=\"dbexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\" rowspan=\"2\">";
		echo "<input type=\"radio\" name=\"what\" value=\"dataonly\" checked=\"checked\" />{$lang['strdataonly']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"d_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"d_oids\" /></td>\n</tr>\n";
		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" name=\"what\" value=\"structureonly\" />{$lang['strstructureonly']}</th>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"3\">";
		echo "<input type=\"radio\" name=\"what\" value=\"structureanddata\" />{$lang['strstructureanddata']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"sd_oids\" /></td>\n</tr>\n";
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" name=\"output\" value=\"show\" checked=\"checked\" />{$lang['strshow']}\n";
		echo "<br/><input type=\"radio\" name=\"output\" value=\"download\" />{$lang['strdownload']}</p>\n";

		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo "<p><input type=\"hidden\" name=\"mode\" value=\"cluster\" />\n";		
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}

	/**
	 * Show default list of databases in the server
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $PHP_SELF, $lang;

		$misc->printTrail('server');
		$misc->printTabs('server','databases');
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
				'url'   => 'redirect.php?section=database&amp;',
				'vars'  => array('database' => 'datname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;subject=database&amp;",
				'vars'  => array('database' => 'datname'),
			),
			'privileges' => array(
				'title' => $lang['strprivileges'],
				'url'   => "privileges.php?subject=database&amp;",
				'vars'  => array('database' => 'datname'),
			)
		);
		
		if (!$data->hasTablespaces()) unset($columns['tablespace']);
		if (!isset($data->privlist['database'])) unset($actions['privileges']);
		
		$misc->printTable($databases, $columns, $actions, $lang['strnodatabases']);

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$lang['strcreatedatabase']}</a></p>\n";

	}

	$misc->printHeader($lang['strdatabases']);
	$misc->printBody();

	switch ($action) {
		case 'export':
			doExport();
			break;
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
