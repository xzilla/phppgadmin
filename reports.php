<?php

	/**
	 * List reports in a database
	 *
	 * $Id: reports.php,v 1.10 2003/04/18 11:08:26 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	// Create a database accessor for the reports database
	include_once('classes/Reports.php');
	$reportsdb = new Reports();

	/**
	 * Displays a screen where they can edit a report
	 */
	function doEdit($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		// If it's a first, load then get the data from the database
		if ($_REQUEST['action'] == 'edit') {
			$report = &$reportsdb->getReport($_REQUEST['report_id']);
			$_POST['report_name'] = $report->f['report_name'];
			$_POST['db_name'] = $report->f['db_name'];
			$_POST['descr'] = $report->f['descr'];
			$_POST['report_sql'] = $report->f['report_sql'];
		}

		// Get a list of available databases
		$databases = &$data->getDatabases();

		echo "<h2>{$lang['strreports']}: {$lang['strcreatereport']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"report_name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['report_name']), "\"></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strdatabase']}</th>\n";
		echo "<td class=\"data1\"><select name=\"db_name\">\n";
		while (!$databases->EOF) {
			$dbname = $databases->f[$data->dbFields['dbname']];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			($dbname == $_POST['db_name']) ? ' selected' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strcomment']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"5\" cols=\"50\" name=\"descr\" wrap=\"virtual\">",
			htmlspecialchars($_POST['descr']), "</textarea></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strsql']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"15\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_POST['report_sql']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\">\n";
		echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\"></p>\n";
		echo "<input type=\"hidden\" name=\"report_id\" value=\"{$report->f['report_id']}\">\n";
		echo "</form>\n";

		echo "<p><a class=navlink href=\"$PHP_SELF\">{$lang['strshowallreports']}</a></p>\n";
	}

	/**
	 * Saves changes to a report
	 */
	function doSaveEdit() {
		global $reportsdb, $lang;

		if (!isset($_POST['report_name'])) $_POST['report_name'] = '';
		if (!isset($_POST['db_name'])) $_POST['db_name'] = '';
		if (!isset($_POST['descr'])) $_POST['descr'] = '';
		if (!isset($_POST['report_sql'])) $_POST['report_sql'] = '';

		// Check that they've given a name and a definition
		if ($_POST['report_name'] == '') doCreate($lang['strreportneedsname']);
		elseif ($_POST['report_sql'] == '') doCreate($lang['strreportneedsdef']);
		else {
			$status = $reportsdb->alterReport($_POST['report_id'], $_POST['report_name'], $_POST['db_name'],
								$_POST['descr'], $_POST['report_sql']);
			if ($status == 0)
				doDefault($lang['strreportcreated']);
			else
				doCreate($lang['strreportcreatedbad']);
		}
	}

	/**
	 * Display read-only properties of a report
	 */
	function doProperties($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		$report = $reportsdb->getReport($_REQUEST['report_id']);

		echo "<h2>{$lang['strreports']}: {$lang['strreport']}</h2>\n";
		$misc->printMsg($msg);

		if ($report->recordCount() == 1) {
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", htmlspecialchars($report->f['report_name']), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strdatabase']}</th>\n";
			echo "<td class=\"data1\">", htmlspecialchars($report->f['db_name']), "</td></tr>\n";
			echo "<tr><th class=\"data\" colspan=\"2\">{$lang['strcomment']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"2\">", nl2br(htmlspecialchars($report->f['descr'])), "</td></tr>\n";
			echo "<tr><th class=\"data\" colspan=\"2\">{$lang['strsql']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"2\">", nl2br(htmlspecialchars($report->f['report_sql'])), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strinvalidparam']}</p>\n";

		echo "<p><a class=navlink href=\"$PHP_SELF\">{$lang['strshowallreports']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&report_id={$report->f['report_id']}\">{$lang['stredit']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new report
	 */
	function doCreate($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_POST['report_name'])) $_POST['report_name'] = '';
		if (!isset($_POST['db_name'])) $_POST['db_name'] = '';
		if (!isset($_POST['descr'])) $_POST['descr'] = '';
		if (!isset($_POST['report_sql'])) $_POST['report_sql'] = '';

		$databases = &$data->getDatabases();

		echo "<h2>{$lang['strreports']}: {$lang['strcreatereport']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"report_name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['report_name']), "\"></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strdatabase']}</th>\n";
		echo "<td class=\"data1\"><select name=\"db_name\">\n";
		while (!$databases->EOF) {
			$dbname = $databases->f[$data->dbFields['dbname']];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			($dbname == $_POST['db_name']) ? ' selected' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strcomment']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"5\" cols=\"50\" name=\"descr\" wrap=\"virtual\">",
			htmlspecialchars($_POST['descr']), "</textarea></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strsql']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"15\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_POST['report_sql']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=\"{$lang['strreset']}\"></p>\n";
		echo "</form>\n";

		echo "<p><a class=navlink href=\"$PHP_SELF\">{$lang['strshowallreports']}</a></p>\n";
	}

	/**
	 * Actually creates the new report in the database
	 */
	function doSaveCreate() {
		global $reportsdb, $lang;

		if (!isset($_POST['report_name'])) $_POST['report_name'] = '';
		if (!isset($_POST['db_name'])) $_POST['db_name'] = '';
		if (!isset($_POST['descr'])) $_POST['descr'] = '';
		if (!isset($_POST['report_sql'])) $_POST['report_sql'] = '';

		// Check that they've given a name and a definition
		if ($_POST['report_name'] == '') doCreate($lang['strreportneedsname']);
		elseif ($_POST['report_sql'] == '') doCreate($lang['strreportneedsdef']);
		else {
			$status = $reportsdb->createReport($_POST['report_name'], $_POST['db_name'],
								$_POST['descr'], $_POST['report_sql']);
			if ($status == 0)
				doDefault($lang['strreportcreated']);
			else
				doCreate($lang['strreportcreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $reportsdb, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			// Fetch report from the database
			$report = &$reportsdb->getReport($_REQUEST['report_id']);

			echo "<h2>{$lang['strreports']}: ", htmlspecialchars($report->f['report_name']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdropreport'], htmlspecialchars($report->f['report_name'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"report_id\" value=\"", htmlspecialchars($_REQUEST['report_id']), "\">\n";
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\"> <input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $reportsdb->dropReport($_POST['report_id']);
			if ($status == 0)
				doDefault($lang['strreportdropped']);
			else
				doDefault($lang['strreportdroppedbad']);
		}

	}

	/**
	 * Show default list of reports in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $reportsdb;
		global $PHP_SELF, $lang;

		echo "<h2>{$lang['strreports']}</h2>\n";
		$misc->printMsg($msg);
			
		$reports = &$reportsdb->getReports();
		
		if ($reports->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strreport']}</th><th class=\"data\">{$lang['strdatabase']}</th><th class=\"data\">{$lang['strcreated']}</th><th colspan=\"4\" class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$reports->EOF) {
				// @@@@@@@@@ FIX THIS!!!!!
				$query = urlencode($reports->f['report_sql']);
				$return_url = urlencode('reports.php');
				$return_desc = urlencode($lang['strback']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($reports->f['report_name']), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($reports->f['db_name']), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($reports->f['date_created']), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"display.php?database=", urlencode($reports->f['db_name']),
					"&query={$query}&return_url={$return_url}&return_desc={$return_desc}\">{$lang['strrun']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&report_id=",
					$reports->f['report_id'], "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=edit&report_id=",
					$reports->f['report_id'], "\">{$lang['stredit']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&report_id=",
					$reports->f['report_id'], "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$reports->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoreports']}</p>\n";
		}

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$lang['strcreatereport']}</a></p>\n";
	}
	
	$misc->printHeader($lang['strreports']);
	$misc->printBody();

	switch ($action) {
		case 'save_edit':
			doSaveEdit();
			break;
		case 'edit':
			doEdit();
			break;
		case 'properties':
			doProperties();
			break;
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['yes'])) doDrop(false);
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