<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.45 2004/05/14 07:56:37 chriskl Exp $
 */

include_once('./classes/database/ADODB_base.php');

class BaseDB extends ADODB_base {

	function BaseDB($conn) {
		$this->ADODB_base($conn);
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
		else {
			// Begin transaction.  We do this so that we can ensure only one row is
			// deleted
			$status = $this->beginTransaction();
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
			
			$status = $this->delete($table, $key);
			if ($status != 0 || $this->conn->Affected_Rows() != 1) {
				$this->rollbackTransaction();
				return -2;
			}
			
			// End transaction
			return $this->endTransaction();
		}
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

			// Begin transaction.  We do this so that we can ensure only one row is
			// edited
			$status = $this->beginTransaction();
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}

			$status = $this->execute($sql);
			if ($status != 0 || $this->conn->Affected_Rows() != 1) {
				$this->rollbackTransaction();
				return -2;
			}
		
			// End transaction
			return $this->endTransaction();		
		}
	}

	/**
	 * Adds a new row to a table
	 * @param $table The table in which to insert
	 * @param $var An array mapping new values for the row
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
	 * @param $show An array of columns to show.  Empty array means all columns.
	 * @param $values An array mapping columns to values
	 * @param $ops An array of the operators to use
	 * @param $orderby (optional) An array of column numbers (one based) 
	 *        mapped to sort direction (asc or desc or '' or null) to order by
	 * @return The SQL query
	 */
	function getSelectSQL($table, $show, $values, $ops, $orderby = array()) {
		$this->fieldClean($table);
		$this->fieldArrayClean($show);

		// If an empty array is passed in, then show all columns
		if (sizeof($show) == 0) {
			if ($this->hasObjectID($table))
				$sql = "SELECT \"{$this->id}\", * FROM ";
			else
				$sql = "SELECT * FROM ";
		}
		else {
			// Add oid column automatically to results for editing purposes
			if (!in_array($this->id, $show) && $this->hasObjectID($table))
				$sql = "SELECT \"{$this->id}\", \"";
			else
				$sql = "SELECT \"";
			
			$sql .= join('","', $show) . "\" FROM ";
		}
			
		if ($this->hasSchemas() && isset($_REQUEST['schema'])) {
			$this->fieldClean($_REQUEST['schema']);
			$sql .= "\"{$_REQUEST['schema']}\".";
		}
		$sql .= "\"{$table}\"";

		// If we have values specified, add them to the WHERE clause
		$first = true;
		if (is_array($values) && sizeof($values) > 0) {
			foreach ($values as $k => $v) {
				if ($v != '' || $this->selectOps[$ops[$k]] == 'p') {
					$this->fieldClean($k);
					$this->clean($v);
					if ($first) {
						$sql .= " WHERE ";
						$first = false;
					} else {
						$sql .= " AND ";
					}
					// Different query format depending on operator type
					switch ($this->selectOps[$ops[$k]]) {
						case 'i':
							$sql .= "\"{$k}\" {$ops[$k]} '{$v}'";
							break;
						case 'p':
							$sql .= "\"{$k}\" {$ops[$k]}";
							break;
						case 'x':
							$sql .= "\"{$k}\" {$ops[$k]} ({$v})";
							break;
						default:
							// Shouldn't happen
					}
				}
			}
		}

		// ORDER BY
		if (is_array($orderby) && sizeof($orderby) > 0) {
			$sql .= " ORDER BY ";
			foreach ($orderby as $k => $v) {
				$sql .= $k;
				if (strtoupper($v) == 'DESC') $sql .= " DESC";
			}
		}
		
		return $sql;
	}

	/**
	 * Returns a recordset of all columns in a relation.  Used for data export.
	 * @@ Note: Really needs to use a cursor
	 * @param $relation The name of a relation
	 * @return A recordset on success
	 * @return -1 Failed to set datestyle
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
	function hasCasts() { return false; }
	function hasFullSubqueries() { return false; }
	function hasPrepare() { return false; }
	function hasOpClasses() { return false; }
	function hasProcesses() { return false; }
	function hasVariables() { return false; }
	function hasFullExplain() { return false; }
	function hasStatsCollector() { return false; }
	function hasSchemaDump() { return false; }
	function hasFunctionRename() { return false; }
	function hasAlterColumnType() { return false; }

}

?>
