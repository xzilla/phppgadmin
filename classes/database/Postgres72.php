<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres72.php,v 1.18 2002/12/19 22:27:38 xzilla Exp $
 */


require_once('../classes/database/Postgres71.php');

class Postgres72 extends Postgres71 {

	var $fnFields = array('fnname' => 'proname', 'fnreturns' => 'return_type', 'fnarguments' => 'arguments','fnoid' => 'oid', 'fndef' => 'source', 'fnlang' => 'language' );
	var $typFields = array('typname' => 'typname');
	var $langFields = array('lanname' => 'lanname');
	var $privFields = array('privarr' => 'relacl');

	// @@ Set the maximum built-in ID. Should we bother querying for this?
	var $_lastSystemOID = 16554;

	// This gets it from the database. 
	// $rs = pg_exec($link, "SELECT oid FROM pg_database WHERE datname='template1'") or pg_die(pg_errormessage(), "", __FILE__, __LINE__);
	// $builtin_max = pg_result($rs, 0, "oid");

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

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function &getTriggers($table = '') {
		$this->clean($table);
		
		$sql = "SELECT t.tgname
					FROM pg_trigger t, pg_class c
					WHERE c.relname='{$table}' AND c.oid = t.tgrelid AND NOT t.tgisconstraint";
			
		return $this->selectSet($sql);
	}


    /**
     * Grabs a list of privileges for an object
     * @param $object The object whose privileges are to be retrived
     * @return A recordset
     */

	function getPrivileges($object = '') {
		$this->clean($object);

		$sql = "SELECT relacl FROM pg_class WHERE relname = '$object'";

		return $this->selectSet($sql);
	}

/*	
	function get_privilege ($table) {
	global $link, $strYes, $strNo, $arrPrivileges, $arrAcl;
	$sql_get_privilege = "SELECT relacl FROM pg_class WHERE relname = '$table'";

	if (!$res = @pg_exec($link, $sql_get_privilege)) {
		pg_die(pg_errormessage($link), $sql_get_privilege, __FILE__, __LINE__);
	} else {
		// query must return exactly one row (check this ?)
		if (!($row = @pg_fetch_array($res, 0))) {
			echo "Error: unable to retrieve ACL for view: $table";
		}
		$priv = trim(ereg_replace("[\{\"]", "", $row[relacl]));
		
		$users = explode(",", $priv);
		for ($iUsers = 0; $iUsers < count($users); $iUsers++) {
			$aryUser = explode("=", $users[$iUsers]);
			$privilege = $aryUser[1]; 

			for ($i = 0; $i < 7; $i++) {
				// $result[$username][$arrPrivileges[$i]] = strchr($privilege, $arrAcl[$i]) ? $strYes : $strNo;
				$aryUser[0] = $aryUser[0] ? $aryUser[0] : "public";
				// echo $aryUser[0], ": ", $arrAcl[$i], ":", $privilege, "<br>";
				$result[trim($aryUser[0])][$arrPrivileges[$i]] = strchr($privilege, $arrAcl[$i]) ? $strYes : $strNo;
			}
		}
	}
	return $result;
	}
*/


}

?>
