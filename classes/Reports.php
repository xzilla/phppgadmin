<?php
	/**
	 * Class to manage reports.  Note how this class is designed to use
	 * the functions provided by the database driver exclusively, and hence
	 * will work with any database without modification.
	 *
	 * $Id: Reports.php,v 1.4 2003/03/31 04:02:07 chriskl Exp $
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
			$sql = $this->driver->getSelectSQL('ppa_reports',
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql'),
				array(), array(), array('report_name'));

			return $this->driver->selectSet($sql);
		}

		/**
		 * Finds a particular report
		 * @param $report_id The ID of the report to find
		 * @return A recordset
		 */
		function &getReport($report_id) {
			$sql = $this->driver->getSelectSQL('ppa_reports',
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql'),
				array('report_id' => $report_id), array());

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
		 * Alters a report
		 * @param $report_id The ID of the report
		 * @param $report_name The name of the report
		 * @param $db_name The name of the database
		 * @param $descr The comment on the report
		 * @param $report_sql The SQL for the report
		 * @return 0 success
		 */
		function alterReport($report_id, $report_name, $db_name, $descr, $report_sql) {
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $_SESSION['webdbUsername'],
				'report_sql' => $report_sql
			);
			if ($descr != '') $temp['descr'] = $descr;

			return $this->driver->update('ppa_reports', $temp,
							array('report_id' => $report_id));
		}

		/**
		 * Drops a report
		 * @param $report_id The ID of the report to drop
		 * @return 0 success
		 */
		function dropReport($report_id) {
			return $this->driver->delete('ppa_reports', array('report_id' => $report_id));
		}

	}
?>
