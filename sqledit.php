<?php

	/**
	 * Alternative SQL editing window
	 *
	 * $Id: sqledit.php,v 1.10 2003/12/17 09:11:32 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Private function to display list of databases
	 */
	function _printDatabases() {
		global $data, $lang, $conf;
		
		// Get the list of all databases
		$databases = &$data->getDatabases();

		if ($databases->recordCount() > 0) {
			echo "<p>{$lang['strdatabase']}: <select name=\"database\">\n";
			while (!$databases->EOF) {
				$dbname = $databases->f[$data->dbFields['dbname']];
				echo "<option value=\"", htmlspecialchars($dbname), "\"",
				((isset($_REQUEST['database']) && $dbname == $_REQUEST['database']) || (isset($_REQUEST['seldatabase']) && $dbname == $_REQUEST['seldatabase'])) ? ' selected="selected"' : '', ">",
					htmlspecialchars($dbname), "</option>\n";
				$databases->moveNext();
			}
			echo "</select></p>\n";
		}
		else {
			echo "<input type=\"hidden\" name=\"database\" value=\"", 
				htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['defaultdb']), "\" />\n";
		}		
	}	

	/**
	 * Searches for a named database object
	 */
	function doFind() {
		global $PHP_SELF, $data, $misc;
		global $lang;

		if (!isset($_GET['term'])) $_GET['term'] = '';

		$misc->printPopUpNav();
		echo "<h2>{$lang['strfind']}</h2>\n";
		
		echo "<form action=\"database.php\" method=\"get\" target=\"detail\">\n";
		_printDatabases();
		echo "<p><input name=\"term\" value=\"", htmlspecialchars($_GET['term']), 
			"\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strfind']}\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"action\" value=\"find\" />\n";
		echo "</form>\n";
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doDefault() {
		global $PHP_SELF, $data, $data, $misc;
		global $lang, $conf;

		if (!isset($_POST['query'])) $_POST['query'] = '';

		$misc->printPopUpNav();
		echo "<h2>{$lang['strsql']}</h2>\n";

		echo "<form action=\"sql.php\" method=\"post\" target=\"detail\">\n";
		_printDatabases();

		echo "<textarea style=\"width: 100%\" rows=\"10\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_POST['query']), "</textarea>\n";
		echo "<p><input type=\"submit\" value=\"{$lang['strgo']}\" />\n";
		echo "<input type=\"submit\" name=\"explain\" value=\"{$lang['strexplain']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";

		echo $misc->form;

		echo "</form>\n";
	}

	$misc->printHeader($lang['strsql']);

	// Bring to the front always
	echo "<body onLoad=\"window.focus();\">\n";
	
	switch ($action) {
		case 'find':
			doFind();
			break;
		case 'sql':
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();
	
?>
