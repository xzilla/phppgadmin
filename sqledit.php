<?php

	/**
	 * Alternative SQL editing window
	 *
	 * $Id: sqledit.php,v 1.1 2003/07/31 08:39:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doDefault() {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_POST['query'])) $_POST['query'] = '';

		echo "<h2>{$lang['strsql']}</h2>\n";

		echo "<form action=\"sql.php\" method=\"post\" target=\"detail\">\n";

		echo "<p>{$lang['strdatabase']}: <select name=\"database\">\n";
		$databases = &$data->getDatabases();
		while (!$databases->EOF) {
			$dbname = $databases->f[$data->dbFields['dbname']];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			(isset($_REQUEST['database']) && $dbname == $_REQUEST['database']) ? ' selected' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select>\n";
		echo "<input type=\"submit\" value=\"{$lang['strgo']}\" />\n";
		echo "<input type=\"submit\" name=\"explain\" value=\"{$lang['strexplain']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
		echo "<input type=\"button\" value=\"Taller\" onclick=\"document.forms[0].query.rows += 2;\" />\n";
		echo "<input type=\"button\" value=\"Shorter\" onclick=\"document.forms[0].query.rows -= 2;\" />\n";

		$rows = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 20;

		echo "<textarea style=\"width:100%; height:auto;\" rows=\"{$rows}\" cols=\"50\" name=\"query\" id=\"query\">",
			htmlspecialchars($_POST['query']), "</textarea></p>\n";

		echo $misc->form;

//		HMMM: Not sure what the back link could do in this situation, any ideas?

//		echo "<input type=\"hidden\" name=\"return_url\" value=\"database.php?database=",
//			urlencode($_REQUEST['database']), " />\n";
//		echo "<input type=\"hidden\" name=\"return_desc\" value=\"{$lang['strback']}\" />\n";
		echo "</form>\n";
	}

	$misc->printHeader($lang['strsql']);
	// Bring to the front always
	echo "<body onLoad=\"window.focus();\">\n";
	
	switch ($action) {
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();
	
?>
