<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.1 2002/07/11 06:02:57 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('../classes/database/Postgres71.php');

class Postgres73 extends Postgres71 {

	var $nspFields = array('nspname' => 'nspname', 'nspowner' => 'nspowner');

	// Store the current schema
	var $_schema = 'public';

	// @@ Should we bother querying for this?
	var $_lastSystemOID = 16568;

	function Postgres73($host, $port, $database, $user, $password) {
		$this->Postgres71($host, $port, $database, $user, $password);
	}

	// Schema functions
	
	/**
	 * Sets the current schema search path
	 * @param $path An array of schemas in required search order
	 * @return 0 success
	 * @return -1 Array not passed
	 * @return -2 Array must contain at least one item
	 */
	function setSearchPath($paths) {
		if (!is_array($paths)) return -1;
		elseif (sizeof($paths) == 0) return -2;
		$this->arrayClean($paths);
		
		$sql = 'SET SEARCH_PATH="' . implode('"', $paths) . '"';
		
		return $this->execute($sql);
	}	
	
	/**
	 * Return all schemas in the current database
	 * @return All schemas, sorted alphabetically - but with PUBLIC first (if it exists)
	 */
	function &getSchemas() {
		if (!$this->_showSystem) $and = "AND nspname NOT LIKE 'pg_%' ";
		else $and = '';
		$sql = "SELECT nspname, nspowner FROM pg_namespace WHERE nspname = 'public'
					UNION ALL
				  SELECT nspname, nspowner FROM pg_namespace WHERE nspname != 'public' {$and}ORDER BY nspname";
				  
		return $this->selectSet($sql);
	}
	
	/**
	 * Return all information relating to a schema
	 * @param $schema The name of the schema
	 * @return Schema information
	 */
	function &getSchemaByName($schema) {
		$this->clean($schema);
		$sql = "SELECT * FROM pg_namespace WHERE nspname='{$schema}'";
		return $this->selectRow($sql);
	}

	/**
	 * Creates a new schema.
	 * @param $schemaname The name of the schema to create
	 * @param $authorization (optional) The username to create the schema for.
	 * @param $authorization (optional) If omitted, defaults to current user.
	 * @return 0 success
	 */
	function createSchema($schemaname, $authorization = '') {
		$this->clean($schemaname);
		$this->clean($authorization);
		
		$sql = "CREATE SCHEMA \"{$schemaname}\"";
		if ($authorization != '') $sql .= " AUTHORIZATION \"{$authorization}\"";
		
		return $this->execute($sql);
	}
	
	/**
	 * Drops a schema.
	 * @param $schemaname The name of the schema to drop
	 * @return 0 success
	 */
	function dropSchema($schemaname) {
		$this->clean($schemaname);
		
		$sql = "DROP SCHEMA \"{$schemaname}\"";
		
		return $this->execute($sql);
	}

	// Table functions

	/**
	 * Return all tables in current database
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables() {
		$sql = "SELECT tablename, tableowner FROM pg_tables ORDER BY tablename";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a table
	 * @param $table The name of the table
	 * @return Table information
	 */
	function &getTableByName($table) {
		$this->clean($table);
		$sql = "SELECT * FROM pg_class WHERE relname='{$table}'";
		return $this->selectRow($sql);
	}

	/**
	 * Sets whether or not a column can contain NULLs
	 * @param $table The table that contains the column
	 * @param $column The column to alter
	 * @param $state True to set null, false to set not null
	 * @return 0 success
	 * @return -1 attempt to set not null, but column contains nulls
	 * @return -2 transaction error
	 * @return -3 lock error
	 * @return -4 update error
	 */
	function setColumnNull($table, $column, $state) {
		$this->clean($table);
		$this->clean($column);

		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" " . (($state) ? 'DROP' : 'SET') . " NOT NULL";

		return $this->execute($sql);
	}

	// View functions
	
	/**
	 * Returns a list of all views in the database
	 * @return All views
	 */
	function getViews() {
		if (!$this->_showSystem)
			$where = "WHERE viewname NOT LIKE 'pg_%'";
		else $where  = '';
		
		$sql = "SELECT viewname, viewowner FROM pg_views {$where} ORDER BY viewname";

		return $this->selectSet($sql);
	}

	// Operator functions
	
	/**
	 * Returns a list of all operators in the database
	 * @return All operators
	 */
	function getOperators() {
		if (!$this->_showSystem)
			$where = "WHERE po.oid > '{$this->_lastSystemOID}'::oid";
		else $where  = '';
		
		$sql = "
			SELECT
            po.oid,
				po.oprname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprleft) AS oprleftname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprright) AS oprrightname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprresult) AS resultname
			FROM
				pg_operator po
			{$where}				
			ORDER BY
				po.oprname, po.oid
		";

		return $this->selectSet($sql);
	}
	 
	// Capabilities
	function hasSchemas() { return true; }

}

?>