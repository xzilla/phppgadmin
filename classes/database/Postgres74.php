<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres74.php,v 1.6 2003/07/29 09:07:09 chriskl Exp $
 */

include_once('classes/database/Postgres73.php');

class Postgres74 extends Postgres73 {

	// Last oid assigned to a system object
	var $_lastSystemOID = 16974;

	// Max object name length
	var $_maxNameLen = 63;

	// System schema ids and names
	var $_schemaOIDs = array(11, 99);
	var $_schemaNames = array('pg_catalog', 'pg_toast');

	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres74($host, $port, $database, $user, $password) {
		$this->Postgres73($host, $port, $database, $user, $password);
	}


	// Trigger functions
	
	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function &getTriggers($table = '') {
		$this->clean($table);

		$sql = "SELECT t.tgname, pg_catalog.pg_get_triggerdef(t.oid) AS tgdef
			FROM pg_catalog.pg_trigger t
			WHERE t.tgrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
			AND relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
			AND (NOT tgisconstraint OR NOT EXISTS
			(SELECT 1 FROM pg_catalog.pg_depend d    JOIN pg_catalog.pg_constraint c
			ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
			WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))";

		return $this->selectSet($sql);
	}

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function &getConstraints($table) {
		$this->clean($table);

		$sql = "SELECT
				conname,
				pg_catalog.pg_get_constraintdef(oid) AS consrc,
				contype
			FROM
				pg_catalog.pg_constraint
			WHERE
				conrelid = (SELECT oid FROM pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_namespace
					WHERE nspname='{$this->_schema}'))
		";

		return $this->selectSet($sql);
	}

	// Capabilities
	function hasGrantOption() { return true; }
	function hasDomainConstraints() { return true; }
	
}

?>
