<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.3 2002/07/26 09:03:06 chriskl Exp $
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