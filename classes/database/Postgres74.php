<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres74.php,v 1.2 2003/01/18 06:38:37 chriskl Exp $
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

	function Postgres74($host, $port, $database, $user, $password) {
		$this->Postgres73($host, $port, $database, $user, $password);
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

}

?>
