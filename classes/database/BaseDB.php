<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.7 2003/01/11 04:32:38 chriskl Exp $
 */

include_once('../classes/database/ADODB_base.php');

class BaseDB extends ADODB_base {

	// Filter objects for user?
	var $_showSystem = false;
	
	function BaseDB($type) {
		$this->ADODB_base($type);
	}

	/**
	 * Turn off or on the showing of 'system' object
	 * @param True to turn system objects on, false to turn them off
	 */
	function setShowSystem($state) {
		$this->_showSystem = $state;
	}
	
	// Table functions
	
	/**
	 * Delete a row from a table
	 * @param $table The table from which to delete
	 * @param $key An array mapping column => value to delete
	 * @return 0 success
	 */
	function deleteRow($table, $key) {
		if (!is_array($key)) return -1;
		else return $this->delete($table, $key);
	}
	
	/**
	 * Updates a row in a table
	 * @param $table The table in which to update
	 * @param $values An array mapping new values for the row
	 * @param $nulls An array mapping column => something if it is to be null
	 * @param $key An array mapping column => value to update
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function editRow($table, $values, $nulls, $key) {
		if (!is_array($values) || !is_array($nulls) || !is_array($key)) return -1;
		// @@ WE CANNOT USE update AS WE NEED TO NOT QUOTE SOME THINGS
		// @@ WHAT ABOUT BOOLEANS??
		else {
			$temp = array();
			foreach($values as $k => $v) {
				if (!isset($nulls[$k])) $temp[$k] = $v;
			}
			return $this->update($table, $temp, $key, array_keys($nulls));
		}
	}

	/**
	 * Adds a new row to a table
	 * @param $table The table in which to insert
	 * @param $values An array mapping new values for the row
	 * @param $nulls An array mapping column => something if it is to be null
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function insertRow($table, $values, $nulls) {
		if (!is_array($values) || !is_array($nulls)) return -1;
		// @@ WE CANNOT USE insert AS WE NEED TO NOT QUOTE SOME THINGS
		// @@ WHAT ABOUT BOOLEANS??
		else {
			$temp = array();
			foreach($values as $k => $v) {
				if (!isset($nulls[$k])) $temp[$k] = $v;
			}
			return $this->insert($table, $temp);
		}
	}
	
	/**
	 * Returns a recordset of all columns in a relation.  Used for data export.
	 * @@ Note: Really needs to use a cursor
	 * @param $relation The name of a relation
	 * @return A recordset on success
	 */
	function &dumpRelation($relation, $oids) {
		$this->fieldClean($relation);

		// Actually retrieve the rows
		if ($oids) $oid_str = $this->id . ', ';
		else $oid_str = '';

		return $this->selectSet("SELECT {$oid_str}* FROM \"{$relation}\"");
	}
		
	// Capabilities
	function hasTables() { return false; }
	function hasViews() { return false; }
	function hasSequences() { return false; }
	function hasFunctions() { return false; }
	function hasTriggers() { return false; }
	function hasOperators() { return false; }
	function hasTypes() { return false; }
	function hasAggregates() { return false; }
	function hasRules() { return false; }
	function hasLanguages() { return false; }
	function hasSchemas() { return false; }
	function hasConversions() { return false; }

}

?>
