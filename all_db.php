<?php

	/**
	 * Manage databases within a server
	 *
	 * $Id: all_db.php,v 1.13 2003/05/17 15:52:48 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang, $_reload_browser;

		if ($confirm) { 
			echo "<h2>{$lang['strdatabases']}: ", $misc->printVal($_REQUEST['database']), ": {$lang['strdrop']}</h2>\n";
			echo "<p>", sprintf($lang['strconfdropdatabase'], $misc->printVal($_REQUEST['database'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", 
				htmlspecialchars($_REQUEST['database']), "\" />\n";
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$localData->close();
			$status = $data->dropDatabase($_POST['database']);
			if ($status == 0) {
				$_reload_browser = true;
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
		if (!isset($_POST['formEncoding'])) $_POST['formEncoding'] = '';
		
		echo "<h2>{$lang['strdatabases']}: {$lang['strcreatedatabase']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strencoding']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input name=\"formName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\" /></td>";
		echo "<td class=\"data1\">";
		echo "<select name=\"formEncoding\">";
		echo "<option value=\"\"></option>\n";
		while (list ($key) = each ($data->codemap)) {
		    echo "<option value=\"", htmlspecialchars($key), "\"", 
				($key == $_POST['formEncoding']) ? ' selected="selected"' : '', ">",
				$misc->printVal($key), "</option>\n";
		}
		echo "</select>\n";
		echo "</td></tr>\n";
		echo "</table>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$lang['strshowalldatabases']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $lang, $_reload_browser;
		
		// Check that they've given a name and a definition
		if ($_POST['formName'] == '') doCreate($lang['strdatabaseneedsname']);
		else {
			$status = $data->createDatabase($_POST['formName'], $_POST['formEncoding']);
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
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>{$lang['strdatabases']}</h2>\n";
		$misc->printMsg($msg);
		
		$databases = &$data->getDatabases();
		if ($databases->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strdatabase']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th class=\"data\">{$lang['strencoding']}</th><th class=\"data\">{$lang['strcomment']}</th>";
			echo "<th class=\"data\">{$lang['stractions']}</th></tr>\n";
			$i = 0;
			while (!$databases->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($databases->f[$data->dbFields['dbname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($databases->f[$data->dbFields['owner']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($databases->f[$data->dbFields['encoding']]), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($databases->f[$data->dbFields['dbcomment']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&database=",
					urlencode($databases->f[$data->dbFields['dbname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$databases->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnodatabases']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$lang['strcreatedatabase']}</a></p>\n";

	}

	$misc->printHeader($lang['strdatabases']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_REQUEST['yes'])) doDrop(false);
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
