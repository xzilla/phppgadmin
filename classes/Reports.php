<?php
	/**
	 * Class to manage reports
	 *
	 * $Id: Reports.php,v 1.2 2003/02/23 12:51:32 chriskl Exp $
	 */

	class Reports {
	
		// A database driver
		var $driver;
		
		/* Constructor */
		function Reports() {
			global $confServers, $misc;

			// Create a new database access object.
			// @@ IF THE phppgadmin DATABASE DOES NOT EXIST THEN
			// @@ LOGIN FAILURE OCCURS
			$this->driver = &$misc->getDatabaseAccessor(
				$confServers[$_SESSION['webdbServerID']]['type'],
				$confServers[$_SESSION['webdbServerID']]['host'],
				$confServers[$_SESSION['webdbServerID']]['port'],
				'phppgadmin',
				$_SESSION['webdbUsername'],
				$_SESSION['webdbPassword']);
		}

		/**
		 * Finds all reports
		 * @return A recordset
		 */
		function &getReports() {
			$sql = "SELECT * FROM ppa_reports ORDER BY report_name";

			return $this->driver->selectSet($sql);
		}

		/**
		 * Finds a particular report
		 * @param $report_id The ID of the report to find
		 * @return A recordset
		 */
		function &getReport($report_id) {
			$this->driver->clean($report_id);

			$sql = "SELECT * FROM ppa_reports WHERE report_id='{$report_id}'";

			return $this->driver->selectSet($sql);
		}
		
		/**
		 * Creates a report
		 * @param $report_name The name of the report
		 * @param $db_name The name of the database
		 * @param $descr The comment on the report
		 * @param $report_sql The SQL for the report
		 * @return 0 success
		 */
		function createReport($report_name, $db_name, $descr, $report_sql) {
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $_SESSION['webdbUsername'],
				'report_sql' => $report_sql
			);
			if ($descr != '') $temp['descr'] = $descr;
			
			return $this->driver->insert('ppa_reports', $temp);
		}

		/**
		 * Drops a report
		 * @param $report_id The ID of the report to drop
		 * @return 0 success
		 */
		function dropReport($report_id) {
			return $this->driver->delete('ppa_reports', array('report_id' => $report_id));
		}

		/**
		 * Checks to see if the reports database has been
		 * initialized.
		 * @return True if database has been initialized
		 */
/*
		function isInitialized() {
			global $appReportsDB;

			// Copy off database name and escape it
			$dbname = $appReportsDB;
			$this->clean($dbname);

			$sql = "SELECT datname FROM pg_database WHERE datname='{$dbname}'";

			$rs = $driver->selectSet($sql);

			return ($rs->recordCount() == 1);
		}
*/
		/**
		 * Initialize the reports database.
		 * @return 0 success
		 */
/*
		function initReportsDB() {
			global $appReportsDB;

			return $this->driver->createDatabase($appReportsDB);
		}
*/
		/**
		 * Initialize the reports table.
		 * @return 0 success
		 */
/*
		function initReportsTable() {

		}
*/

	}
?>
