<?php

/**
 * Class to represent a database connection
 *
 * $Id: Connection.php,v 1.3 2004/04/17 12:59:04 chriskl Exp $
 */

include_once('./classes/database/ADODB_base.php');

class Connection {

	var $conn;

	/**
	 * Creates a new connection.  Will actually make a database connection.
	 * @param $fetchMode Defaults to associative.  Override for different behaviour
	 */
	function Connection($host, $port, $user, $password, $database, $fetchMode = ADODB_FETCH_ASSOC) {
		$this->conn = &ADONewConnection('postgres7');
		$this->conn->setFetchMode($fetchMode);

		// Ignore host if null
		if ($host === null || $host == '')
			$pghost = '';
		else
			$pghost = "{$host}:{$port}";

		$this->conn->connect($pghost, $user, $password, $database);
	}

	/**
	 * Gets the name of the correct database driver to use
	 * @param (return-by-ref) $description A description of the database and version
	 * @return The class name of the driver eg. Postgres73
	 * @return -3 Database-specific failure
	 */
	function getDriver(&$description) {
		$adodb = new ADODB_base($this->conn);

		$sql = "SELECT VERSION() AS version";
		$field = $adodb->selectField($sql, 'version');

		$params = explode(' ', $field);
		if (!isset($params[1])) return -3;

		$version = $params[1]; // eg. 7.3.2
		$description = "PostgreSQL {$params[1]}";

		// Detect version and choose appropriate database driver
		// If unknown version, then default to latest driver
		// All 6.x versions default to oldest driver, even though
		// it won't work with those versions.
		if (strpos($version, '7.4') === 0)
			return 'Postgres74';
		elseif (strpos($version, '7.3') === 0)
			return 'Postgres73';
		elseif (strpos($version, '7.2') === 0)
			return 'Postgres72';
		elseif (strpos($version, '7.1') === 0)
			return 'Postgres71';
		elseif (strpos($version, '7.0') === 0
				|| strpos($version, '6.') === 0)
			return 'Postgres';
		else
			return 'Postgres75';
	}

	/** 
	 * Get the last error in the connection
	 * @return Error string
	 */
	function getLastError() {		
		if (function_exists('pg_errormessage'))
			return pg_errormessage($this->conn->_connectionID);
		else
			return pg_last_error($this->conn->_connectionID);
	}
}
