<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.11 2002/09/23 06:11:38 chriskl Exp $
 */


require_once('../classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	var $fnFields = array('fnname' => 'proname', 'fnreturns' => 'return_type', 'fnarguments' => 'arguments','fnoid' => 'oid', 'fndef' => 'source', 'fnlang' => 'language' );
	var $typFields = array('typname' => 'typname');
	var $langFields = array('lanname' => 'lanname');

	// @@ Set the maximum built-in ID. Should we bother querying for this?
	var $_lastSystemOID = 16554;

	// This gets it from the database. 
	// $rs = pg_exec($link, "SELECT oid FROM pg_database WHERE datname='template1'") or pg_die(pg_errormessage(), "", __FILE__, __LINE__);
	// $builtin_max = pg_result($rs, 0, "oid");

	// Table functions

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
				format_type(a.atttypid, a.atttypmod) as type,
				a.attnotnull, a.atthasdef, adef.adsrc
			FROM 
				pg_attribute a LEFT JOIN pg_attrdef adef
				ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum
			WHERE 
				a.attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}') 
				AND a.attnum > 0
			ORDER BY a.attnum";
			
		return $this->selectSet($sql);
	}	

	// Function functions

	/**
	 * Returns a list of all functions in the database
	 * @return All functions
	 */
	function &getFunctions() {
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
				AND p.oid > '{$this->_lastSystemOID}'
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

		$sql .= ") RETURNS \"{$returns}\" AS '\n"; 
		$sql .= stripslashes($definition);
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
	 * @param $funcname The name of the view to drop
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
	 * @param $replace (optional) True if OR REPLACE, false for normal
	 * @return 0 success
	 */
	function setFunction($funcname, $args, $returns, $definition, $language, $flags) {
		return $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, true);
	}

	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @return A recordet
	 */
	function &getTypes() {
		$sql = "SELECT
				format_type(t.oid, NULL) AS typname
			FROM
				pg_type t
			WHERE
				typrelid = 0
			UNION
			SELECT
				typname
			FROM
				pg_type
			WHERE
				typrelid = 0
				AND typname !~ '^_.*'
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	// Function Languages

	/**
	 * Returns a list of all languages in the database
	 * @return A recordset
	 */
	function &getLangs() {
		$sql = "SELECT lanname FROM pg_language ORDER BY lanname DESC";

		return $this->selectSet($sql);
	}


}

?>
