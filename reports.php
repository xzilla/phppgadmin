<?php

	/**
	 * List reports in a database
	 *
	 * $Id: reports.php,v 1.5 2003/02/26 04:39:50 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	// Create a database accessor for the reports database
	include_once('classes/Reports.php');
	$reportsdb = new Reports();

	/**
	 * Displays a screen where they can enter a new report
	 */
	function doCreate($msg = '') {
		global $data, $reportsdb, $misc;
		global $PHP_SELF, $strName, $strDatabase, $strComment, $strSQL;
		global $strCreateReport, $strReports, $strSave, $strReset, $strShowAllViews;

		if (!isset($_POST['report_name'])) $_POST['report_name'] = '';
		if (!isset($_POST['db_name'])) $_POST['db_name'] = '';
		if (!isset($_POST['descr'])) $_POST['descr'] = '';
		if (!isset($_POST['report_sql'])) $_POST['report_sql'] = '';

		$databases = &$data->getDatabases();

		echo "<h2>{$strReports}: {$strCreateReport}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$strName}</th>\n";
		echo "<td class=\"data1\"><input name=\"report_name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['report_name']), "\"></td></tr>\n";
		echo "<tr><th class=\"data\">{$strDatabase}</th>\n";
		echo "<td class=\"data1\"><select name=\"db_name\">\n";
		while (!$databases->EOF) {
			$dbname = $databases->f[$data->dbFields['dbname']];
			echo "<option value=\"", htmlspecialchars($dbname), "\"",
			($dbname == $_POST['db_name']) ? ' selected' : '', ">",
				htmlspecialchars($dbname), "</option>\n";
			$databases->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\">{$strComment}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"5\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_POST['descr']), "</textarea></td></tr>\n";
		echo "<tr><th class=\"data\">{$strSQL}</th>\n";
		echo "<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"15\" cols=\"50\" name=\"report_sql\" wrap=\"virtual\">",
			htmlspecialchars($_POST['report_sql']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo $misc->form;
		echo "<input type=submit value=\"{$strSave}\"> <input type=\"{$strReset}\"></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllViews}</a></p>\n";
	}

	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $reportsdb, $strReportNeedsName, $strReportNeedsDef;
		global $strReportCreated, $strReportCreatedBad;

		if (!isset($_POST['report_name'])) $_POST['report_name'] = '';
		if (!isset($_POST['db_name'])) $_POST['db_name'] = '';
		if (!isset($_POST['descr'])) $_POST['descr'] = '';
		if (!isset($_POST['report_sql'])) $_POST['report_sql'] = '';

		// Check that they've given a name and a definition
		if ($_POST['report_name'] == '') doCreate($strReportNeedsName);
		elseif ($_POST['report_sql'] == '') doCreate($strReportNeedsDef);
		else {
			$status = $reportsdb->createReport($_POST['report_name'], $_POST['db_name'],
								$_POST['descr'], $_POST['report_sql']);
			if ($status == 0)
				doDefault($strReportCreated);
			else
				doCreate($strReportCreatedBad);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $reportsdb, $misc;
		global $strReports, $strReportDropped, $strReportDroppedBad;
		global $strYes, $strNo, $strDrop, $strConfDropReport;
		global $PHP_SELF;

		if ($confirm) {
			// Fetch report from the database
			$report = &$reportsdb->getReport($_REQUEST['report_id']);

			echo "<h2>{$strReports}: ", htmlspecialchars($report->f['report_name']), ": {$strDrop}</h2>\n";

			echo "<p>", sprintf($strConfDropReport, htmlspecialchars($report->f['report_name'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"report_id\" value=\"", htmlspecialchars($_REQUEST['report_id']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=\"submit\" name=\"choice\" value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $reportsdb->dropReport($_POST['report_id']);
			if ($status == 0)
				doDefault($strReportDropped);
			else
				doDefault($strReportDroppedBad);
		}

	}

	/**
	 * Show default list of reports in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $reportsdb;
		global $PHP_SELF, $strActions, $strReport, $strReports, $strNoReports, $strCreateReport;
		global $strOwner, $strDrop, $strBrowse, $strBack;

		echo "<h2>{$strReports}</h2>\n";
		$misc->printMsg($msg);
			
		$reports = &$reportsdb->getReports();
		
		if ($reports->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strReport}</th><th class=\"data\">{$strOwner}</th><th colspan=\"2\" class=\"data\">{$strActions}</th>\n";
			$i = 0;
			while (!$reports->EOF) {
				// @@@@@@@@@ FIX THIS!!!!!
				$query = urlencode($reports->f['report_sql']);
				$return_url = urlencode("reports.php?{$misc->href}");
				$return_desc = urlencode($strBack);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($reports->f['report_name']), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($reports->f['created_by']), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"display.php?database=", urlencode($reports->f['db_name']), "&query={$query}&return_url={$return_url}&return_desc={$return_desc}\">{$strBrowse}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&report_id=",
					$reports->f['report_id'], "\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$reports->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoReports}</p>\n";
		}

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$strCreateReport}</a></p>\n";
	}
	
	$misc->printHeader($strReports);

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == $strYes) doDrop(false);
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
