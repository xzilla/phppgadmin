<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.4 2002/09/09 10:16:29 chriskl Exp $
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
	 * @param $key An array mapping column => value to update
	 * @return 0 success
	 */
	function editRow($table, $values, $key) {
		if (!is_array($values) || !is_array($key)) return -1;
		// @@ WE NEED TO SUPPORT NULL VALUES HERE!
		// @@ ALSO, WE CANNOT USE update AS WE NEED TO NO QUOTE SOME THINGS
		else return $this->update($table, $values, $key);
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