<?php

/**
 * PostgreSQL 7.5 support
 *
 * $Id: Postgres75.php,v 1.4 2004/05/14 07:56:38 chriskl Exp $
 */

include_once('./classes/database/Postgres74.php');

class Postgres75 extends Postgres74 {

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres75($conn) {
		$this->Postgres74($conn);
	}
	
	/**
	 * Alters a column in a table
	 * @param $table The table in which the column resides
	 * @param $column The column to alter
	 * @param $name The new name for the column
	 * @param $notnull (boolean) True if not null, false otherwise
	 * @param $oldnotnull (boolean) True if column is already not null, false otherwise
	 * @param $default The new default for the column
	 * @param $olddefault The old default for the column
	 * @param $type The new type for the column
	 * @param $array True if array type, false otherwise
	 * @param $length The optional size of the column (ie. 30 for varchar(30))
	 * @param $oldtype The old type for the column
	 * @param $comment Comment for the column
	 * @return 0 success
	 * @return -1 batch alteration failed
	 * @return -3 rename column error
	 * @return -4 comment error
	 * @return -6 transaction error
	 */
	function alterColumn($table, $column, $name, $notnull, $oldnotnull, $default, $olddefault, 
									$type, $length, $array, $oldtype, $comment) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		// Initialise an empty SQL string
		$sql = '';

		// Create the command for changing nullability
		if ($notnull != $oldnotnull) {
			$sql .= "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" " . (($notnull) ? 'SET' : 'DROP') . " NOT NULL";
		}
		
		// Add default, if it has changed
		if ($default != $olddefault) {
			if ($default == '') {
				if ($sql == '') $sql = "ALTER TABLE \"{$table}\" ";
				else $sql .= ", ";
				$sql .= "ALTER COLUMN \"{$column}\" DROP DEFAULT";
			}
			else {
				if ($sql == '') $sql = "ALTER TABLE \"{$table}\" ";
				else $sql .= ", ";
				$sql .= "ALTER COLUMN \"{$column}\" SET DEFAULT {$default}";
			}
		}
		
		// Add type, if it has changed
		if ($length == '')
			$ftype = $type;
		else {
			switch ($type) {
				// Have to account for weird placing of length for with/without
				// time zone types
				case 'timestamp with time zone':
				case 'timestamp without time zone':
					$qual = substr($type, 9);
					$ftype = "timestamp({$length}){$qual}";
					break;
				case 'time with time zone':
				case 'time without time zone':
					$qual = substr($type, 4);
					$ftype = "time({$length}){$qual}";
					break;
				default:
					$ftype = "{$type}({$length})";
			}
		}
		
		// Add array qualifier, if requested
		if ($array) $ftype .= '[]';
		
		if ($ftype != $oldtype) {
			if ($sql == '') $sql = "ALTER TABLE \"{$table}\" ";
			else $sql .= ", ";
			$sql .= "ALTER COLUMN \"{$column}\" TYPE {$ftype}";
		}

		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -6;
		}
		
		// Attempt to process the batch alteration, if anything has been changed
		if ($sql != '') {
			$status = $this->execute($sql);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
		}
		
		// Update the comment on the column
		$status = $this->setComment('COLUMN', $column, $table, $comment);
		if ($status != 0) {
		  $this->rollbackTransaction();
		  return -4;
		}

		// Rename the column, if it has been changed
		if ($column != $name) {
			$status = $this->renameColumn($table, $column, $name);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}

		return $this->endTransaction();
	}

	function hasAlterColumnType() { return true; }
		
}
