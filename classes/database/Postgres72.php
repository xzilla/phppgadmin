<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.52 2003/10/13 08:50:04 chriskl Exp $
 */


include_once('classes/database/Postgres71.php');

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
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres72($host, $port, $database, $user, $password) {
		$this->Postgres71($host, $port, $database, $user, $password);

		// Correct the error in the encoding tables, that was
		// fixed in PostgreSQL 7.2
		$this->codemap['LATIN5'] = 'ISO-8859-9';
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
					-1 AS attstattarget, a.attstorage, t.typstorage, false AS attisserial
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
					LEFT JOIN pg_type t ON a.atttypid=t.oid
				WHERE 
					a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
					AND a.attnum > 0
				ORDER BY a.attnum";
		}
		else {
			$sql = "
				SELECT
					a.attname,
					format_type(a.atttypid, a.atttypmod) as type, a.atttypmod,
					a.attnotnull, a.atthasdef, adef.adsrc,
					-1 AS attstattarget, a.attstorage, t.typstorage
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
					LEFT JOIN pg_type t ON a.atttypid=t.oid
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
				oidvectortypes(p.proargtypes) AS arguments
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
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $setof True if returns a set, false otherwise
	 * @return 0 success
	 */
	function setFunction($function_oid, $funcname, $args, $returns, $definition, $language, $flags, $setof) {
		return $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, true);
	}

	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @return A recordet
	 */
	function &getTypes($all = false) {
		global $conf;
		
		if ($all || $conf['show_system'])
			$where = '';
		else
			$where = "AND pt.oid > '{$this->_lastSystemOID}'::oid";
		
		$sql = "SELECT
				format_type(pt.oid, NULL) AS typname,
				pu.usename AS typowner
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND typrelid = 0
				{$where}
			UNION
			SELECT
				pt.typname,
				pu.usename AS typowner
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND typrelid = 0
				AND typname !~ '^_.*'
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

	// Capabilities
	function hasWithoutOIDs() { return true; }
	function hasPartialIndexes() { return true; }

}

?>
