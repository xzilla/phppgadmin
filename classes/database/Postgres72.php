<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.64 2004/05/14 07:56:38 chriskl Exp $
 */


include_once('./classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	// Set the maximum built-in ID.
	var $_lastSystemOID = 16554;

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'RULE', 'ALL PRIVILEGES'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES')
	);

	// Extra "magic" types.  BIGSERIAL was added in PostgreSQL 7.2.
	var $extraTypes = array('SERIAL', 'BIGSERIAL');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres72($conn) {
		$this->Postgres71($conn);

		// Correct the error in the encoding tables, that was
		// fixed in PostgreSQL 7.2
		$this->codemap['LATIN5'] = 'ISO-8859-9';
	}

	/**
	 * Returns all available process information.
	 * @param $database (optional) Find only connections to specified database
	 * @return A recordset
	 */
	function &getProcesses($database = null) {
		if ($database === null)
			$sql = "SELECT * FROM pg_stat_activity ORDER BY datname, usename, procpid";
		else {
			$this->clean($database);
			$sql = "SELECT * FROM pg_stat_activity WHERE datname='{$database}' ORDER BY usename, procpid";
		}
		
		return $this->selectSet($sql);
	}
	
	// Table functions

	/**
	 * Returns the SQL for changing the current user
	 * @param $user The user to change to
	 * @return The SQL
	 */
	function getChangeUserSQL($user) {
		$this->clean($user);
		return "SET SESSION AUTHORIZATION '{$user}';";
	}

	/**
	 * Checks to see whether or not a table has a unique id column
	 * @param $table The table name
	 * @return True if it has a unique id, false otherwise
	 * @return -99 error
	 */
	function hasObjectID($table) {
		$this->clean($table);

		$sql = "SELECT relhasoids FROM pg_class WHERE relname='{$table}'";

		$rs = $this->selectSet($sql);
		if ($rs->recordCount() != 1) return -99;
		else {
			$rs->f['relhasoids'] = $this->phpBool($rs->f['relhasoids']);
			return $rs->f['relhasoids'];
		}
	}

	/**
	 * Returns table information
	 * @param $table The name of the table
	 * @return A recordset
	 */
	function &getTable($table) {
		$this->clean($table);
				
		$sql = "SELECT pc.relname AS tablename, 
			pg_get_userbyid(pc.relowner) AS tableowner, 
			(SELECT description FROM pg_description pd 
                        WHERE pc.oid=pd.objoid AND objsubid = 0) AS tablecomment 
			FROM pg_class pc
			WHERE pc.relname='{$table}'";
							
		return $this->selectSet($sql);
	}

	/**
	 * Return all tables in current database
	 * @param $all True to fetch all tables, false for just in current schema
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables($all = false) {
		global $conf;
		if (!$conf['show_system'] || $all) $where = "AND c.relname NOT LIKE 'pg\\\\_%' ";
		else $where = '';
		
		$sql = "SELECT NULL AS schemaname, c.relname AS tablename, 
					(SELECT usename FROM pg_user u WHERE u.usesysid=c.relowner) AS tableowner, 
					(SELECT description FROM pg_description pd WHERE c.oid=pd.objoid AND objsubid = 0) AS tablecomment
			 FROM pg_class c WHERE c.relkind='r' {$where}ORDER BY relname";
		return $this->selectSet($sql);
	}

	/**
	 * Retrieve the attribute definition of a table
	 * @param $table The name of the table
	 * @param $field (optional) The name of a field to return
	 * @return All attributes in order
	 */
	function &getTableAttributes($table, $field = '') {
		$this->clean($table);
		$this->clean($field);

		if ($field == '') {		
			$sql = "
				SELECT
					a.attname,
					format_type(a.atttypid, a.atttypmod) as type, a.atttypmod,
					a.attnotnull, a.atthasdef, adef.adsrc,
					-1 AS attstattarget, a.attstorage, t.typstorage, false AS attisserial, 
                                        description as comment
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
					LEFT JOIN pg_type t ON a.atttypid=t.oid
                                        LEFT JOIN pg_description d ON (a.attrelid = d.objoid AND a.attnum = d.objsubid)
				WHERE 
					a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
					AND a.attnum > 0
				ORDER BY a.attnum";
		}
		else {
			$sql = "
				SELECT
					a.attname,
					format_type(a.atttypid, a.atttypmod) as type, 
					format_type(a.atttypid, NULL) as base_type, 
					a.atttypmod,
					a.attnotnull, a.atthasdef, adef.adsrc,
					-1 AS attstattarget, a.attstorage, t.typstorage, 
                                        description as comment
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
					LEFT JOIN pg_type t ON a.atttypid=t.oid
                                        LEFT JOIN pg_description d ON (a.attrelid = d.objoid AND a.attnum = d.objsubid)
				WHERE 
					a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
					AND a.attname = '{$field}'
				ORDER BY a.attnum";
		}
					
		return $this->selectSet($sql);
	}

	// Constraint functions

	/**
	 * Removes a constraint from a relation
	 * @param $constraint The constraint to drop
	 * @param $relation The relation from which to drop
	 * @param $type The type of constraint (c, f, u or p)
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 * @return -99 dropping foreign keys not supported
	 */
	function dropConstraint($constraint, $relation, $type, $cascade) {
		$this->fieldClean($constraint);
		$this->fieldClean($relation);

		switch ($type) {
			case 'c':
				// CHECK constraint		
				$sql = "ALTER TABLE \"{$relation}\" DROP CONSTRAINT \"{$constraint}\" RESTRICT";
		
				return $this->execute($sql);
				break;
			case 'p':
			case 'u':
				// PRIMARY KEY or UNIQUE constraint
				return $this->dropIndex($constraint, $cascade);
				break;
			case 'f':
				// FOREIGN KEY constraint
				return -99;
		}				
	}

	/**
	 * Adds a unique constraint to a table
	 * @param $table The table to which to add the unique key
	 * @param $fields (array) An array of fields over which to add the unique key
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 * @return -1 no fields given
	 */
	function addUniqueKey($table, $fields, $name = '') {
		if (!is_array($fields) || sizeof($fields) == 0) return -1;
		$this->fieldClean($table);
		$this->fieldArrayClean($fields);
		$this->fieldClean($name);

		$sql = "ALTER TABLE \"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "UNIQUE (\"" . join('","', $fields) . "\")";

		return $this->execute($sql);
	}

	/**
	 * Adds a primary key constraint to a table
	 * @param $table The table to which to add the primery key
	 * @param $fields (array) An array of fields over which to add the primary key
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 * @return -1 no fields given
	 */
	function addPrimaryKey($table, $fields, $name = '') {
		if (!is_array($fields) || sizeof($fields) == 0) return -1;
		$this->fieldClean($table);
		$this->fieldArrayClean($fields);
		$this->fieldClean($name);

		$sql = "ALTER TABLE \"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "PRIMARY KEY (\"" . join('","', $fields) . "\")";

		return $this->execute($sql);
	}

	// Function functions

	/**
	 * Returns a list of all functions in the database
 	 * @param $all If true, will find all available functions, if false just userland ones
	 * @return All functions
	 */
	function &getFunctions($all = false) {
		if ($all)
			$where = '';
		else
			$where = "AND p.oid > '{$this->_lastSystemOID}'";

		$sql = "SELECT
				p.oid,
				p.proname,
				false AS proretset,
				format_type(p.prorettype, NULL) AS return_type,
				oidvectortypes(p.proargtypes) AS arguments,
				(SELECT description FROM pg_description pd WHERE p.oid=pd.objoid) AS funccomment
			FROM
				pg_proc p
			WHERE
				p.prorettype <> 0
				AND (pronargs = 0 OR oidvectortypes(p.proargtypes) <> '')
				{$where}
			ORDER BY
				p.proname, return_type
			";

		return $this->selectSet($sql);
	}
		
	/**
	 * Updates (replaces) a function.
	 * @param $function_oid The OID of the function
	 * @param $funcname The name of the function to create
	 * @param $newname The new name for the function
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $setof True if returns a set, false otherwise
	 * @param $comment The comment on the function	 
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 commenting error
	 * @return -3 rename error
	 */
	function setFunction($function_oid, $funcname, $newname, $args, $returns, $definition, $language, $flags, $setof, $comment) {
		// Begin a transaction
		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Replace the existing function
		$status = $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, true);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Comment on the function
		$this->fieldClean($funcname);
		$status = $this->setComment('FUNCTION', "\"{$funcname}\"({$args})", null, $comment);
		if ($status != 0) {
		  $this->rollbackTransaction();
		  return -2;
		}

		// Rename the function, if necessary
		if ($funcname != $newname && $this->hasFunctionRename()) {
			$this->fieldClean($newname);
			$sql = "ALTER FUNCTION \"{$funcname}\"({$args}) RENAME TO \"{$newname}\"";
			$status = $this->execute($sql);
			if ($status != 0) {
			  $this->rollbackTransaction();
			  return -3;
			}
		}
		
		return $this->endTransaction();
	}

	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @return A recordet
	 */
	function &getTypes($all = false, $tabletypes = false) {
		global $conf;
		
		if ($all || $conf['show_system']) {
			$where = '';
		} else {
			$where = "AND pt.oid > '{$this->_lastSystemOID}'::oid";
		}
		// Never show system table types
		$where2 = "AND c.oid > '{$this->_lastSystemOID}'::oid";
		
		if ($tabletypes)
			$tqry = "'c', 'r', 'v'";
		else
			$tqry = "'c'";
		
		$sql = "SELECT
				pt.typname AS basename,
				format_type(pt.oid, NULL) AS typname,
				pu.usename AS typowner,
				(SELECT description FROM pg_description pd WHERE pt.oid=pd.objoid) AS typcomment
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND (pt.typrelid = 0 OR (SELECT c.relkind IN ({$tqry}) FROM pg_class c WHERE c.oid = pt.typrelid {$where2}))
				AND typname !~ '^_'
				{$where}
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	// Administration functions

	/**
	 * Analyze a database
	 * @note PostgreSQL 7.2 finally had an independent ANALYZE command
	 * @param $table (optional) The table to analyze
	 */
	function analyzeDB($table = '') {
		if ($table != '') {
			$this->fieldClean($table);
			$sql = "ANALYZE \"{$table}\"";
		}
		else
			$sql = "ANALYZE";

		return $this->execute($sql);
	}

	// Statistics collector functions

	/**
	 * Fetches statistics for a database
	 * @param $database The database to fetch stats for
	 * @return A recordset
	 */
	function &getStatsDatabase($database) {
		$this->clean($database);

		$sql = "SELECT * FROM pg_stat_database WHERE datname='{$database}'";

		return $this->selectSet($sql);
	}

	/**
	 * Fetches tuple statistics for a table
	 * @param $table The table to fetch stats for
	 * @return A recordset
	 */
	function &getStatsTableTuples($table) {
		$this->clean($table);

		$sql = 'SELECT * FROM pg_stat_all_tables WHERE';
		if ($this->hasSchemas()) $sql .= " schemaname='{$this->_schema}' AND";
		$sql .= " relname='{$table}'";

		return $this->selectSet($sql);
	}

	/**
	 * Fetches I/0 statistics for a table
	 * @param $table The table to fetch stats for
	 * @return A recordset
	 */
	function &getStatsTableIO($table) {
		$this->clean($table);

		$sql = 'SELECT * FROM pg_statio_all_tables WHERE';
		if ($this->hasSchemas()) $sql .= " schemaname='{$this->_schema}' AND";
		$sql .= " relname='{$table}'";

		return $this->selectSet($sql);
	}

	/**
	 * Fetches tuple statistics for all indexes on a table
	 * @param $table The table to fetch index stats for
	 * @return A recordset
	 */
	function &getStatsIndexTuples($table) {
		$this->clean($table);

		$sql = 'SELECT * FROM pg_stat_all_indexes WHERE';
		if ($this->hasSchemas()) $sql .= " schemaname='{$this->_schema}' AND";
		$sql .= " relname='{$table}' ORDER BY indexrelname";

		return $this->selectSet($sql);
	}

	/**
	 * Fetches I/0 statistics for all indexes on a table
	 * @param $table The table to fetch index stats for
	 * @return A recordset
	 */
	function &getStatsIndexIO($table) {
		$this->clean($table);

		$sql = 'SELECT * FROM pg_statio_all_indexes WHERE';
		if ($this->hasSchemas()) $sql .= " schemaname='{$this->_schema}' AND";
		$sql .= " relname='{$table}' ORDER BY indexrelname";

		return $this->selectSet($sql);
	}

	// Capabilities
	function hasWithoutOIDs() { return true; }
	function hasPartialIndexes() { return true; }
	function hasProcesses() { return true; }
	function hasStatsCollector() { return true; }

}

?>
