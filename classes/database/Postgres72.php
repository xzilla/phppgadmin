<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.7 2002/09/16 15:09:54 chriskl Exp $
 */


require_once('../classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	var $fnFields = array('fnname' => 'proname', 'fnreturns' => 'return_type', 'fnarguments' => 'arguments','fnoid' => 'oid', 'fndef' => 'source', 'fnlang' => 'language' );
	var $typFields = array('typname' => 'typname');

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
	 * @param $definition The definition for the new function
	 * @return 0 success
	 */
	function createFunction($funcname, $definition) {
		$this->clean($funcname);
		// Note: $definition not cleaned
		
		$sql = "CREATE VIEW \"{$viewname}\" AS {$definition}";
		
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
	 * Updates a function.  Postgres doesn't have CREATE OR REPLACE function,
	 * so we do it with a drop and a recreate.
	 * @param $funcname The name of the function to update
	 * @param $definition The new definition for the function
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop function error
	 * @return -3 create function error
	 */
	function setFunction($funcname, $definition) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		$status = $this->dropFunction($funcname);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createFunction($funcname, $definition);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
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
				t.typrelid = 0 AND t.typname !~ '^_.*'
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

}

?>
