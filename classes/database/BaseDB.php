<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.16 2003/05/11 15:13:29 chriskl Exp $
 */

include_once('classes/database/ADODB_base.php');

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
	 * @param $format An array of the data type (VALUE or EXPRESSION)
	 * @param $types An array of field types
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function insertRow($table, $vars, $nulls, $format, $types) {
		if (!is_array($vars) || !is_array($nulls) || !is_array($format)
			|| !is_array($types)) return -1;
		// @@ WE CANNOT USE insert AS WE NEED TO NOT QUOTE SOME THINGS
		// @@ WHAT ABOUT BOOLEANS??
		else {
			$this->fieldClean($table);

			// Build clause
			if (sizeof($vars) > 0) {
				$fields = '';
				$values = '';
				foreach($vars as $key => $value) {
					$doEscape = $format[$key] == 'VALUE';
					$this->clean($key);
					if ($doEscape) $this->clean($value);
	
					if ($fields) $fields .= ", \"{$key}\"";
					else $fields = "INSERT INTO \"{$table}\" (\"{$key}\"";
	
					// Handle NULL values
					if (isset($nulls[$key])) $tmp = 'NULL';
					elseif ($doEscape) $tmp = "'{$value}'";
					else $tmp = $value;
					
					if ($values) $values .= ", {$tmp}";
					else $values = ") VALUES ({$tmp}";
				}
				$sql = $fields . $values . ')';
			}			
			return $this->execute($sql);
		}
	}
	
	/**
	 * Generates the SQL for the 'select' function
	 * @param $table The table from which to select
	 * @param $show An array of columns to show
	 * @param $values An array mapping columns to values
	 * @param $nulls An array of columns that are null
	 * @param $orderby (optional) An array of columns to order by
	 * @return The SQL query
	 */
	function getSelectSQL($table, $show, $values, $nulls, $orderby = array()) {
		$this->fieldClean($table);

		$sql = "SELECT \"" . join('","', $show) . "\" FROM \"{$table}\"";

		// If we have values specified, add them to the WHERE clause
		$first = true;
		if (is_array($values) && sizeof($values) > 0) {
			foreach ($values as $k => $v) {
				if ($v != '' && !in_array($k, $nulls)) {
					if ($first) {
						$this->fieldClean($k);
						$this->clean($v);
						// @@ FIX THIS QUOTING
						$sql .= " WHERE \"{$k}\"='{$v}'";
						$first = false;
					} else {
						$sql .= " AND \"{$k}\"='{$v}'";
					}
				}
			}
		}

		// If we have NULL values specified, add them to the WHERE clause
		if (is_array($nulls) && sizeof($nulls) > 0) {
			foreach ($nulls as $v) {
				if ($first) {
					$this->fieldClean($k);
					$sql .= " WHERE \"{$k}\" IS NULL";
					$first = false;
				} else {
					$sql .= " AND \"{$k}\" IS NULL";
				}
			}
		}

		// ORDER BY
		if (is_array($orderby) && sizeof($orderby) > 0) {
			$sql .= " ORDER BY \"" . join('","', $orderby) . "\"";
		}

		return $sql;
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
	function hasGrantOption() { return false; }
	function hasCluster() { return false; }
	function hasDropBehavior() { return false; }
	function hasSRFs() { return false; }

}

?>
