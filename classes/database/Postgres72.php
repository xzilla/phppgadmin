<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.32 2003/03/27 12:56:30 chriskl Exp $
 */


include_once('classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	var $fnFields = array('fnname' => 'proname', 'fnreturns' => 'return_type', 'fnarguments' => 'arguments','fnoid' => 'oid', 'fndef' => 'source', 'fnlang' => 'language' );
	var $langFields = array('lanname' => 'lanname');
	var $privFields = array('privarr' => 'relacl');

	// Set the maximum built-in ID.
	var $_lastSystemOID = 16554;

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'RULE', 'ALL PRIVILEGES'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES')
	);

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
	}

	// Table functions

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
					format_type(a.atttypid, a.atttypmod) as type,
					a.attnotnull, a.atthasdef, adef.adsrc
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
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
					a.attnotnull, a.atthasdef, adef.adsrc
				FROM 
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
				WHERE 
					a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
					AND a.attname = '{$field}'
				ORDER BY a.attnum";
		}
					
		return $this->selectSet($sql);
	}

	function getTableKeys($table) {
		$this->clean($table);

		$sql = "
				SELECT 
					ic.relname AS index_name, 
					bc.relname AS tab_name, 
					ta.attname AS column_name,
					i.indisunique AS unique_key,
					i.indisprimary AS primary_key
				FROM 
					pg_class bc,
					pg_class ic,
					pg_index i,
					pg_attribute ta,
					pg_attribute ia
				WHERE 
					bc.oid = i.indrelid
					AND ic.oid = i.indexrelid
					AND ia.attrelid = i.indexrelid
					AND ta.attrelid = bc.oid
					AND bc.relname = '$table'
					AND ta.attrelid = i.indrelid
					AND ta.attnum = i.indkey[ia.attnum-1]
				ORDER BY 
					index_name, tab_name, column_name
				";

		return $this->selectSet($sql);
	}

	// Constraint functions
	
	/**
	 * Drops a check constraint from a table
	 * @param $table The table from which to drop the check
	 * @param $name The name of the check to be dropped
	 * @return 0 success
	 */
	function dropCheckConstraint($table, $name) {
		$this->fieldClean($table);
		$this->fieldClean($name);

		$sql = "ALTER TABLE \"{$table}\" DROP CONSTRAINT \"{$name}\"";

		return $this->execute($sql);
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
	 * Returns all details for a particular function
	 * @param $func The name of the function to retrieve
	 * @return Function info
	 */
	function getFunction($function_oid) {
		$this->clean($function_oid);
		
		$sql = "SELECT 
					pc.oid,
					proname,
					lanname as language,
					format_type(prorettype, NULL) as return_type,
					prosrc as source,
					probin as binary,
					oidvectortypes(pc.proargtypes) AS arguments
				FROM
					pg_proc pc, pg_language pl
				WHERE 
					pc.oid = '$function_oid'::oid
				AND pc.prolang = pl.oid
				";
	
		return $this->selectSet($sql);
	}	

	/**
	 * Creates a new function.
	 * @param $funcname The name of the function to create
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $replace (optional) True if OR REPLACE, false for normal
	 * @return 0 success
	 */
	function createFunction($funcname, $args, $returns, $definition, $language, $flags, $replace = false) {
		/*
		RE: arguments implementation It seem to me that we should be  getting passed a comma delimited string
		and that we need a comma delimited string
		So why go through the array end around 
		ADODB throws errors if you leave it blank, and join complaines as well
		

		Also I'm dropping support for the WITH option for now
		Given that there are only 3 options, this might best be implemented with hardcoding
		*/

		$this->clean($funcname);
//		if (is_array($args)) {
//			$this->arrayClean($args);
//		}
		$this->clean($args);
		$this->clean($returns);
		$this->clean($definition);
		$this->clean($language);
//		if (is_array($flags)) {
//			$this->arrayClean($flags);
//		}

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " FUNCTION \"{$funcname}\" (";
/*
		if (sizeof($args) > 0)
			$sql .= '"' . join('", "', $args) . '"';
*/
		if ($args)
			$sql .= $args;

		// For some reason, the returns field cannot have quotes...
		$sql .= ") RETURNS {$returns} AS '\n";
		$sql .= $definition;
		$sql .= "\n'";
		$sql .= " LANGUAGE \"{$language}\"";
/*
		if (sizeof($flags) > 0)
			$sql .= ' WITH ("' . join('", "', $flags) . '")';
*/


		return $this->execute($sql);
	}
	
	/**
	 * Drops a function.
	 * @param $funcname The name of the function to drop
	 * @return 0 success
	 */
	function dropFunction($funcname) {
		$this->clean($funcname);
	
		$sql = "DROP FUNCTION {$funcname} ";
		
		return $this->execute($sql);
	}
	
	/**
	 * Updates (replaces) a function.
	 * @param $funcname The name of the function to create
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @return 0 success
	 */
	function setFunction($funcname, $args, $returns, $definition, $language, $flags) {
		return $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, true);
	}

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @return A recordset
	 */
	function &getIndexes($table = '') {
		$this->clean($table);
		$sql = "SELECT c2.relname, i.indisprimary, i.indisunique, pg_get_indexdef(i.indexrelid)
			FROM pg_class c, pg_class c2, pg_index i
			WHERE c.relname = '{$table}' AND c.oid = i.indrelid AND i.indexrelid = c2.oid
			ORDER BY c2.relname";

		return $this->selectSet($sql);
	}

	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @return A recordet
	 */
	function &getTypes($all = false) {
		$sql = "SELECT
				format_type(pt.oid, NULL) AS typname,
				pu.usename AS typowner
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND typrelid = 0
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
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	// Rule functions

	/**
	 * Returns a list of all rules on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function &getRules($table) {
		$this->clean($table);

		$sql = "SELECT
				*
			FROM
				pg_rules
			WHERE
				tablename='{$table}'
			ORDER BY
				rulename
		";

		return $this->selectSet($sql);
	}

}

?>
