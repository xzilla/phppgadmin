<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.27 2003/09/01 03:15:43 chriskl Exp $
 */

include_once('classes/database/ADODB_base.php');

class BaseDB extends ADODB_base {

	function BaseDB($type) {
		$this->ADODB_base($type);
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
	 * @param $vars An array mapping new values for the row
	 * @param $nulls An array mapping column => something if it is to be null
	 * @param $format An array of the data type (VALUE or EXPRESSION)
	 * @param $types An array of field types
	 * @param $keyarr An array mapping column => value to update
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function editRow($table, $vars, $nulls, $format, $types, $keyarr) {
		if (!is_array($vars) || !is_array($nulls) || !is_array($format)
			|| !is_array($types)) return -1;
		else {
			$this->fieldClean($table);

			// Build clause
			if (sizeof($vars) > 0) {
				foreach($vars as $key => $value) {
					$this->fieldClean($key);
	
					// Handle NULL values
					if (isset($nulls[$key])) $tmp = 'NULL';
					else $tmp = $this->formatValue($types[$key], $format[$key], $value);
					
					if (isset($sql)) $sql .= ", \"{$key}\"={$tmp}";
					else $sql = "UPDATE \"{$table}\" SET \"{$key}\"={$tmp}";
				}
				$first = true;
				foreach ($keyarr as $k => $v) {
					$this->fieldClean($k);
					$this->clean($v);
					if ($first) {
						$sql .= " WHERE \"{$k}\"='{$v}'";
						$first = false;
					}
					else $sql .= " AND \"{$k}\"='{$v}'";
				}				
			}			
			return $this->execute($sql);
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
		else {
			$this->fieldClean($table);

			// Build clause
			if (sizeof($vars) > 0) {
				$fields = '';
				$values = '';
				foreach($vars as $key => $value) {
					$this->fieldClean($key);
	
					// Handle NULL values
					if (isset($nulls[$key])) $tmp = 'NULL';
					else $tmp = $this->formatValue($types[$key], $format[$key], $value);
					
					if ($fields) $fields .= ", \"{$key}\"";
					else $fields = "INSERT INTO \"{$table}\" (\"{$key}\"";

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

		$sql = "SELECT \"" . join('","', $show) . "\" FROM ";
		if ($this->hasSchemas() && isset($_REQUEST['schema'])) {
			$this->fieldClean($_REQUEST['schema']);
			$sql .= "\"{$_REQUEST['schema']}\".";
		}
		$sql .= "\"{$table}\"";

		// If we have values specified, add them to the WHERE clause
		$first = true;
		if (is_array($values) && sizeof($values) > 0) {
			foreach ($values as $k => $v) {
				if ($v != '' && !in_array($k, $nulls)) {
					if ($first) {
						$this->fieldClean($k);
						$this->clean($v);
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
					$this->fieldClean($v);
					$sql .= " WHERE \"{$v}\" IS NULL";
					$first = false;
				} else {
					$sql .= " AND \"{$v}\" IS NULL";
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
	function hasDomains() { return false; }
	function hasDomainConstraints() { return false; }
	function hasAlterTrigger() { return false; }
	function hasWithoutOIDs() { return false; }
	function hasAlterTableOwner() { return false; }
	function hasPartialIndexes() { return false; }

}

?>
