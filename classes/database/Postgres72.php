<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.2 2002/09/09 05:08:55 chriskl Exp $
 */


include_once('../classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	var $fnFields = array('fnname' => 'proname', 'fnresult' => 'result', 'fnarguments' => 'arguments');

	// Last oid assigned to a system object
	var $_lastSystemOID = 16554;

	// Function functions
	
	/**
	 * Returns a list of all functions in the database
	 * @return All functions
	 */

	function getFunctions() {
		/*
		
		By default I dont think we want to show system functions, but we mighth want to later on

		if (!$this->_showSystem)
			$where = "WHERE funcname NOT LIKE 'pg_%'";
		else $where  = '';
		*/

		// NOTE: This string needs to be determined based on a query to the database. 
		// We used to capture this number as "$builtin_max" but we don't seem to any more.
		// 10,000 should work for most systems, but this definatly needs to be changed
		$max=10000;
			
		$sql = 	"SELECT 
				pc.oid,
				proname, 
				pt.typname AS result, 
				oidvectortypes(pc.proargtypes) AS arguments
			FROM 
				pg_proc pc, pg_user pu, pg_type pt
			WHERE	
				pc.proowner = pu.usesysid
				AND pc.prorettype = pt.oid
				AND pc.oid > '$max'::oid
			UNION
			SELECT 
				pc.oid,
				proname, 
				'OPAQUE' AS result, 
				oidvectortypes(pc.proargtypes) AS arguments
			FROM 
				pg_proc pc, pg_user pu, pg_type pt
			WHERE	
				pc.proowner = pu.usesysid
				AND pc.prorettype = 0
				AND pc.oid > '$max'::oid
			ORDER BY
				proname, result
			";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all details for a particular function
	 * @param $func The name of the function to retrieve
	 * @return Function info
	 */
	function getFunc($func) {
		$this->clean($func);
		
		$sql = "SELECT viewname, viewowner, definition FROM pg_views WHERE viewname='$view'";

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
		
		$sql = "DROP VIEW \"{$funcname}\"";
		
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

}

?>
