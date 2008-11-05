<?php
	/**
	 * Class to manage reports.  Note how this class is designed to use
	 * the functions provided by the database driver exclusively, and hence
	 * will work with any database without modification.
	 *
	 * $Id: Reports.php,v 1.18 2007/04/16 11:02:35 mr-russ Exp $
	 */

	class Reports {

		// A database driver
		var $driver;
		var $reports_db = 'phppgadmin';
		var $reports_schema = 'public';
		var $reports_table = 'ppa_reports';

		/* Constructor */
		function Reports(&$status) {
			global $conf, $misc, $data;
			
			// Get data from config if it's been defined
			if (isset($conf['reports_db'])) {
				$this->reports_db = $conf['reports_db'];
			}
			if (isset($conf['reports_schema'])) {
				$this->reports_schema = $conf['reports_schema'];
			}
			if (isset($conf['reports_table'])) {
				$this->reports_table = $conf['reports_table'];
			}

			// Check to see if the reports database exists
			$rs = $data->getDatabase($this->reports_db);
			if ($rs->recordCount() != 1) $status = -1;
			else {
				// Create a new database access object.
				$this->driver = $misc->getDatabaseAccessor($this->reports_db);
				// Reports database should have been created in public schema
				$this->driver->setSchema($this->reports_schema);
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

			$sql = $this->driver->getSelectSQL($this->reports_table,
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql', 'paginate'),
				$filter, $ops, array('db_name' => 'asc', 'report_name' => 'asc'));

			return $this->driver->selectSet($sql);
		}

		/**
		 * Finds a particular report
		 * @param $report_id The ID of the report to find
		 * @return A recordset
		 */
		function getReport($report_id) {			
			$sql = $this->driver->getSelectSQL($this->reports_table,
				array('report_id', 'report_name', 'db_name', 'date_created', 'created_by', 'descr', 'report_sql', 'paginate'),
				array('report_id' => $report_id), array('report_id' => '='), array());

			return $this->driver->selectSet($sql);
		}
		
		/**
		 * Creates a report
		 * @param $report_name The name of the report
		 * @param $db_name The name of the database
		 * @param $descr The comment on the report
		 * @param $report_sql The SQL for the report
		 * @param $paginate The report should be paginated
		 * @return 0 success
		 */
		function createReport($report_name, $db_name, $descr, $report_sql, $paginate) {
			global $misc;
			$server_info = $misc->getServerInfo();
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $server_info['username'],
				'report_sql' => $report_sql,
				'paginate' => $paginate ? 'true' : 'false',
			);
			if ($descr != '') $temp['descr'] = $descr;

			return $this->driver->insert($this->reports_table, $temp);
		}

		/**
		 * Alters a report
		 * @param $report_id The ID of the report
		 * @param $report_name The name of the report
		 * @param $db_name The name of the database
		 * @param $descr The comment on the report
		 * @param $report_sql The SQL for the report
		 * @param $paginate The report should be paginated
		 * @return 0 success
		 */
		function alterReport($report_id, $report_name, $db_name, $descr, $report_sql, $paginate) {
			global $misc;
			$server_info = $misc->getServerInfo();
			$temp = array(
				'report_name' => $report_name,
				'db_name' => $db_name,
				'created_by' => $server_info['username'],
				'report_sql' => $report_sql,
				'paginate' => $paginate ? 'true' : 'false',
				'descr' => $descr
			);

			return $this->driver->update($this->reports_table, $temp,
							array('report_id' => $report_id));
		}

		/**
		 * Drops a report
		 * @param $report_id The ID of the report to drop
		 * @return 0 success
		 */
		function dropReport($report_id) {
			return $this->driver->delete($this->reports_table, array('report_id' => $report_id));
		}

	}
?>
