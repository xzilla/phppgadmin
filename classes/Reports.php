<?php
	/**
	 * Class to manage reports.  Note how this class is designed to use
	 * the functions provided by the database driver exclusively, and hence
	 * will work with any database without modification.
	 *
	 * $Id: Reports.php,v 1.15 2005/11/04 04:19:41 chriskl Exp $
	 */

	class Reports {

		// A database driver
		var $driver;
		var $reports_db = 'phppgadmin';

		/* Constructor */
		function Reports(&$status) {
			global $misc, $data;
			
			// Check to see if the reports database exists
			$rs = $data->getDatabase($this->reports_db);
			if ($rs->recordCount() != 1) $status = -1;
			else {
				// Create a new database access object.
				$this->driver = $misc->getDatabaseAccessor($this->reports_db);
				// Reports database should have been created in public schema
				if ($this->driver->hasSchemas()) $this->driver->setSchema('public');
				$status = 0;
			}
		}

		/**
		 * Finds all reports
		 * @return A recordset
		 */
		function getReports() {
			global $conf, $misc;
			// Filter for owned reports if necessary
			if ($conf['owned_reports_only']) {
				$server_info = $misc->getServerInfo();
				$filter['created_by'] = $server_info['username'];
				$ops = array('created_by' => '=');
			}
			else $filter = $ops = array();

			$sql = $this->driver->getSelectSQL('ppa_reports',
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql'),
				$filter, $ops, array('db_name' => 'asc', 'report_name' => 'asc'));

			return $this->driver->selectSet($sql);
		}

		/**
		 * Finds a particular report
		 * @param $report_id The ID of the report to find
		 * @return A recordset
		 */
		function getReport($report_id) {			
			$sql = $this->driver->getSelectSQL('ppa_reports',
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql'),
				array('report_id' => $report_id), array('report_id' => '='), array());

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
			global $misc;
			$server_info = $misc->getServerInfo();
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $server_info['username'],
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
			global $misc;
			$server_info = $misc->getServerInfo();
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $server_info['username'],
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
