<?php

/**
 * Class to represent a database connection
 *
 * $Id: Connection.php,v 1.12 2005/11/08 02:24:31 chriskl Exp $
 */

include_once('./classes/database/ADODB_base.php');

class Connection {

	var $conn;
	
	// The backend platform.  Set to UNKNOWN by default.
	var $platform = 'UNKNOWN';
	
	/**
	 * Creates a new connection.  Will actually make a database connection.
	 * @param $fetchMode Defaults to associative.  Override for different behaviour
	 */
	function Connection($host, $port, $user, $password, $database, $fetchMode = ADODB_FETCH_ASSOC) {
		$this->conn = &ADONewConnection('postgres7');
		$this->conn->setFetchMode($fetchMode);

		// Ignore host if null
		if ($host === null || $host == '')
			if ($port !== null && $port != '')
				$pghost = ':'.$port;
			else
				$pghost = '';
		else
			$pghost = "{$host}:{$port}";

		$this->conn->connect($pghost, $user, $password, $database);
	}

	/**
	 * Gets the name of the correct database driver to use.  As a side effect,
	 * sets the platform.
	 * @param (return-by-ref) $description A description of the database and version
	 * @return The class name of the driver eg. Postgres73
	 * @return null if version is < 7.0
	 * @return -3 Database-specific failure
	 */
	function getDriver(&$description) {
		// If we're on a recent enough PHP 5, and against PostgreSQL 7.4 or
		// higher, we don't need to query for the version.  This gives a great
		// speed up.				
		if (function_exists('pg_version')) {
			$v = pg_version($this->conn->_connectionID);
			if (isset($v['server'])) $version = $v['server'];			
		}
		
		// If we didn't manage to get the version without a query, query...
		if (!isset($version)) {
			$adodb = new ADODB_base($this->conn);
	
			$sql = "SELECT VERSION() AS version";
			$field = $adodb->selectField($sql, 'version');
	
			// Check the platform, if it's mingw, set it
			if (eregi(' mingw ', $field))
				$this->platform = 'MINGW';
	
			$params = explode(' ', $field);
			if (!isset($params[1])) return -3;
	
			$version = $params[1]; // eg. 7.3.2
		}
		
		$description = "PostgreSQL {$version}";

		// Detect version and choose appropriate database driver
		// If unknown version, then default to latest driver
		// All 6.x versions default to oldest driver, even though
		// it won't work with those versions.
		if ((int)substr($version, 0, 1) < 7)
			return null;
		elseif (strpos($version, '8.1') === 0)
			return 'Postgres81';
		elseif (strpos($version, '8.0') === 0 || strpos($version, '7.5') === 0)
			return 'Postgres80';
		elseif (strpos($version, '7.4') === 0)
			return 'Postgres74';
		elseif (strpos($version, '7.3') === 0)
			return 'Postgres73';
		elseif (strpos($version, '7.2') === 0)
			return 'Postgres72';
		elseif (strpos($version, '7.1') === 0)
			return 'Postgres71';
		elseif (strpos($version, '7.0') === 0)
			return 'Postgres';
		else
			return 'Postgres82';
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

?>
