<?php

	/**
	 * List reports in a database
	 *
	 * $Id: reports.php,v 1.22 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Displays a screen where they can edit a report
	 */
	function doEdit($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		// If it's a first, load then get the data from the database
		$report = $reportsdb->getReport($_REQUEST['report_id']);
		if ($_REQUEST['action'] == 'edit') {			
			$_POST['report_name'] = $report->f['report_name'];
			$_POST['db_name'] = $report->f['db_name'];
			$_POST['descr'] = $report->f['descr'];
			$_POST['report_sql'] = $report->f['report_sql'];
		}

		// Get a list of available databases
		$databases = $data->getDatabases();

		$_REQUEST['report'] = $report->f['report_name'];
		$misc->printTrail('report');
		$misc->printTitle($lang['stredit']);
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo $misc->form;
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"report_name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['report_name']), "\" /></td></tr>\n";
		echo "<tr><th class=\"data left required\">{$lang['strdatabase']}</th>\n";
		echo "<td class=\"data1\"><select name=\"db_name\">\n";
		while (!$databases->EOF) {
			$dbname = $databases->f['datname'];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			($dbname == $_POST['db_name']) ? ' selected="selected"' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['strcomment']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"5\" cols=\"50\" name=\"descr\" wrap=\"virtual\">",
			htmlspecialchars($_POST['descr']), "</textarea></td></tr>\n";
		echo "<tr><th class=\"data left required\">{$lang['strsql']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"15\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_POST['report_sql']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "<input type=\"hidden\" name=\"report_id\" value=\"{$report->f['report_id']}\" />\n";
		echo "</form>\n";
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
		if ($_POST['report_name'] == '') doEdit($lang['strreportneedsname']);
		elseif ($_POST['report_sql'] == '') doEdit($lang['strreportneedsdef']);
		else {
			$status = $reportsdb->alterReport($_POST['report_id'], $_POST['report_name'], $_POST['db_name'],
								$_POST['descr'], $_POST['report_sql']);
			if ($status == 0)
				doDefault($lang['strreportcreated']);
			else
				doEdit($lang['strreportcreatedbad']);
		}
	}

	/**
	 * Display read-only properties of a report
	 */
	function doProperties($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		$report = $reportsdb->getReport($_REQUEST['report_id']);

		$_REQUEST['report'] = $report->f['report_name'];
		$misc->printTrail('report');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);

		if ($report->recordCount() == 1) {
			echo "<table>\n";
			echo "<tr><th class=\"data left\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($report->f['report_name']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strdatabase']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($report->f['db_name']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($report->f['descr']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strsql']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($report->f['report_sql']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strinvalidparam']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?{$misc->href}\">{$lang['strshowallreports']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&amp;{$misc->href}&amp;report_id={$report->f['report_id']}\">{$lang['stredit']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new report
	 */
	function doCreate($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['report_name'])) $_REQUEST['report_name'] = '';
		if (!isset($_REQUEST['db_name'])) $_REQUEST['db_name'] = (isset($_REQUEST['database']) ? $_REQUEST['database'] : '');
		if (!isset($_REQUEST['descr'])) $_REQUEST['descr'] = '';
		if (!isset($_REQUEST['report_sql'])) $_REQUEST['report_sql'] = '';

		$databases = $data->getDatabases();

		$misc->printTrail('server');
		$misc->printTitle($lang['strcreatereport']);
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo $misc->form;
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"report_name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_REQUEST['report_name']), "\" /></td></tr>\n";
		echo "<tr><th class=\"data left required\">{$lang['strdatabase']}</th>\n";
		echo "<td class=\"data1\"><select name=\"db_name\">\n";
		while (!$databases->EOF) {
			$dbname = $databases->f['datname'];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			($dbname == $_REQUEST['db_name']) ? ' selected="selected"' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['strcomment']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"5\" cols=\"50\" name=\"descr\" wrap=\"virtual\">",
			htmlspecialchars($_REQUEST['descr']), "</textarea></td></tr>\n";
		echo "<tr><th class=\"data left required\">{$lang['strsql']}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"15\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_REQUEST['report_sql']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
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
			$report = $reportsdb->getReport($_REQUEST['report_id']);

			$_REQUEST['report'] = $report->f['report_name'];
			$misc->printTrail('report');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdropreport'], $misc->printVal($report->f['report_name'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"report_id\" value=\"", htmlspecialchars($_REQUEST['report_id']), "\" />\n";
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
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

		$misc->printTrail('server');
		$misc->printTabs('server','reports');
		$misc->printMsg($msg);
		
		$reports = $reportsdb->getReports();
		
		$columns = array(
			'report' => array(
				'title' => $lang['strreport'],
				'field' => 'report_name',
			),
			'database' => array(
				'title' => $lang['strdatabase'],
				'field' => 'db_name',
			),
			'created' => array(
				'title' => $lang['strcreated'],
				'field' => 'date_created',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'descr',
			),
		);
		
		$return_url = urlencode("{$PHP_SELF}?{$misc->href}");
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "{$PHP_SELF}?action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('report_id' => 'report_id'),
			),
			'run' => array(
				'title' => $lang['strrun'],
				'url'   => "display.php?subject=report&amp;{$misc->href}&amp;return_url={$return_url}&amp;return_desc=".urlencode($lang['strback'])."&amp;",
				'vars'  => array('report' => 'report_name', 'database' => 'db_name', 'query' => 'report_sql'),
			),
			'edit' => array(
				'title' => $lang['stredit'],
				'url'   => "{$PHP_SELF}?action=edit&amp;{$misc->href}&amp;",
				'vars'  => array('report_id' => 'report_id'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('report_id' => 'report_id'),
			),
		);
		
		$misc->printTable($reports, $columns, $actions, $lang['strnoreports']);
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create&amp;{$misc->href}\">{$lang['strcreatereport']}</a></p>\n";
	}
	
	$misc->printHeader($lang['strreports']);
	$misc->printBody();

	// Create a database accessor for the reports database
	include_once('./classes/Reports.php');
	$reportsdb = new Reports($status);
	if ($status != 0) {
		$misc->printTrail('server');
		$misc->printTabs('server','reports');
		$misc->printMsg($lang['strnoreportsdb']);
	}
	else {
		switch ($action) {
			case 'save_edit':
				if (isset($_POST['cancel'])) doDefault();
				else doSaveEdit();
				break;
			case 'edit':
				doEdit();
				break;
			case 'properties':
				doProperties();
				break;
			case 'save_create':
				if (isset($_POST['cancel'])) doDefault();
				else doSaveCreate();
				break;
			case 'create':
				doCreate();
				break;
			case 'drop':
				if (isset($_POST['drop'])) doDrop(false);
				else doDefault();
				break;
			case 'confirm_drop':
				doDrop(true);
				break;
			default:
				doDefault();
				break;
		}
	}

	$misc->printFooter();

?>
