<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.6 2002/11/18 04:57:33 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('../classes/database/Postgres71.php');

class Postgres73 extends Postgres71 {

	var $nspFields = array('nspname' => 'nspname', 'nspowner' => 'nspowner');
	var $conFields = array('conname' => 'conname', 'conowner' => 'conownder');

	// Store the current schema
	var $_schema;

	// Last oid assigned to a system object
	var $_lastSystemOID = 16568;
	var $_maxNameLen = 63;

	function Postgres73($host, $port, $database, $user, $password) {
		$this->Postgres71($host, $port, $database, $user, $password);
	}

	// Schema functions
	
	/**
	 * Sets the current working schema
	 * @param $schema The the name of the schema to work in
	 * @return 0 success
	 * @return -3 setting search path failed
	 */
	function setSchema($schema) {
		$this->clean($schema);
		
		$sql = "SELECT nspname FROM pg_namespace WHERE nspname='{$schema}'";
		
		$rs = $this->selectRow($sql);
		
		// If the schema is found...
		if ($rs->recordCount() == 1) {
			$status = $this->setSearchPath(array($rs->f['nspname']));
			if ($status == 0) {
				$this->_schema = $rs->f['nspname'];
				return 0;
			}
			else return $status;
		}
		else
			return -3;
	}	
	
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
	
	// Conversions functions
	
	/**
	 * Return all conversions in the current database
	 * @return All conversions, sorted alphabetically
	 */
	function &getConversions() {
		$sql = "SELECT conname, conowner FROM pg_conversion ORDER BY conname";
				  
		return $this->selectSet($sql);
	}
	
	/**
	 * Return all information relating to a conversion
	 * @param $conversion The name of the conversion
	 * @return Conversion information
	 */
	function &getConversionByName($conversion) {
		$this->clean($conversion);
		$sql = "SELECT * FROM pg_conversion WHERE conname='{$conversion}'";
		return $this->selectRow($sql);
	}

	/**
	 * Creates a new conversion.
	 * @param $schemaname The name of the schema to create
	 * @param $authorization (optional) The username to create the schema for.
	 * @param $authorization (optional) If omitted, defaults to current user.
	 * @return 0 success
	 */
	 /*
	function createSchema($schemaname, $authorization = '') {
		$this->clean($schemaname);
		$this->clean($authorization);
		
		$sql = "CREATE SCHEMA \"{$schemaname}\"";
		if ($authorization != '') $sql .= " AUTHORIZATION \"{$authorization}\"";
		
		return $this->execute($sql);
	}
	*/
	/**
	 * Drops a schema.
	 * @param $schemaname The name of the schema to drop
	 * @return 0 success
	 */
	 /*
	function dropSchema($schemaname) {
		$this->clean($schemaname);
		
		$sql = "DROP SCHEMA \"{$schemaname}\"";
		
		return $this->execute($sql);
	}	
*/
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
	 * Retrieve the attribute definition of a table
	 * @param $table The name of the table
	 * @return All attributes in order
	 */
	function &getTableAttributes($table) {
		$this->clean($table);

		$sql = "
			SELECT
				a.attname,
				pg_catalog.format_type(a.atttypid, a.atttypmod) as type,
				a.attnotnull, a.atthasdef, adef.adsrc
			FROM
				pg_catalog.pg_attribute a LEFT JOIN pg_catalog.pg_attrdef adef
				ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
			WHERE
				a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
				AND a.attnum > 0 AND NOT a.attisdropped
			ORDER BY a.attnum";

		return $this->selectSet($sql);
	}

	/**
	 * Empties a table in the database.  Truncate is safe in 7.3 upwards.
	 * @param $table The table to be emptied
	 * @return 0 success
	 */
	function emptyTable($table) {
		$this->clean($table);

		$sql = "TRUNCATE \"{$table}\"";

		return $this->execute($sql);
	}

	/**
	 * Drops a column from a table
	 * @param $table The table from which to drop a column
	 * @param $column The column to be dropped
	 * @param $behavior CASCADE or RESTRICT or empty
	 * @return 0 success
	 */
	function dropColumn($table, $column, $behavior) {
		$this->clean($table);
		$this->clean($column);
		$this->clean($behavior);

		$sql = "ALTER TABLE \"{$table}\" DROP COLUMN \"{$column}\" " .
			($behavior == 'CASCADE') ? 'CASCADE' : 'RESTRICT';

		return $this->execute($sql);
	}

	/**
	 * Sets whether or not a column can contain NULLs
	 * @param $table The table that contains the column
	 * @param $column The column to alter
	 * @param $state True to set null, false to set not null
	 * @return 0 success
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

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @return A recordset
	 */
	function &getIndexes($table = '') {
		$this->clean($table);

		$sql = "SELECT c2.relname, i.indisprimary, i.indisunique, pg_catalog.pg_get_indexdef(i.indexrelid) as indexdef
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND c.oid = i.indrelid AND i.indexrelid = c2.oid
			ORDER BY i.indisprimary DESC, i.indisunique DESC, c2.relname";

		return $this->selectSet($sql);
	}
	 
	// Capabilities
	function hasSchemas() { return true; }
	function hasConversions() { return true; }

}

?>
