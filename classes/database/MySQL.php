<?php

/**
 * A class that implements the DB interface for MySQL 3.23 and up
 *
 * $Id: MySQL.php,v 1.1 2002/02/12 06:53:30 chriskl Exp $
 */

include_once('../classes/database/BaseDB.php');

class MySQL extends BaseDB {

	var $dbFields = array('dbname' => 'Database');

	function MySQL($host, $port, $database, $user, $password) {
		$this->BaseDB('mysql');

		//$this->Port = $port;

		$this->conn->connect($host, $user, $password, $database);
	}

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function &getDatabases() {
		$sql = "SHOW DATABASES";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information about a particular database
	 * @param $database The name of the database to retrieve
	 * @return The database info
	 */
	function &getDatabase($database) {
		$this->clean($database);
		$sql = "SHOW DATABASES LIKE '{$database}'";
		return $this->selectRow($sql);
	}

	/**
	 * Drops a database
	 * @param $database The name of the database to retrieve
	 * @return 0 success
	 */
	function dropDatabase($database) {
		$this->clean($database);
		$sql = "DROP DATABASE {$database}";
	}

	// Table functions

	/**
	 * Return all tables in current database
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables() {
		$sql = "SHOW TABLE STATUS";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a table
	 * @param $table The name of the table
	 * @return Table information
	 */
	function &getTableByName($table) {
		$this->clean($table);
		$sql = "SHOW TABLE STATUS LIKE '{$table}'";
		return $this->selectRow($sql);
	}

	// @@ Need create table - tricky!!
	
	/**
	 * Removes a table from the database
	 * @param $table
	 * @return 0 success
	 */
	function dropTable($table) {
		$this->clean($table);
		
		$sql = "DROP TABLE {$table}";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Renames a table
	 * @param $table The table to be renamed
	 * @param $newName The new name for the table
	 * @return 0 success
	 */
	function renameTable($table, $newName) {
		$this->clean($table);
		$this->clean($newName);
		$sql = "ALTER TABLE {$table} RENAME {$newName}";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Adds a check constraint to a table
	 * @param $table The table to which to add the check
	 * @param $definition The definition of the check
	 * @param $name (optional) The name to give the check, otherwise default name is assigned
	 * @return 0 success
	 */
	function addCheckConstraint($table, $definition, $name = '') {
		// Not implemented
		return -99;
	}
	
	/**
	 * Drops a check constraint from a table
	 * @param $table The table from which to drop the check
	 * @param $name The name of the check to be dropped
	 * @return 0 success
	 * @return -2 transaction error
	 * @return -3 lock error
	 * @return -4 check drop error
	 */
	function dropCheckConstraint($table, $name) {
		// Not implemented
		return -99;
	}	

	/**
	 * Adds a unique constraint to a table
	 * @param $table The table to which to add the unique
	 * @param $fields (array) An array of fields over which to add the unique
	 * @param $name (optional) The name to give the unique, otherwise default name is assigned
	 * @return 0 success
	 */
	function addUniqueConstraint($table, $fields, $name = '') {
		$this->clean($table);
		$this->arrayClean($fields);
		$this->clean($name);
		
		if ($name != '')
			$sql = "ALTER TABLE {$table} ADD UNIQUE {$name} (\"" . join('","', $fields) . "\")";
		else
			$sql = "ALTER TABLE {$table} ADD UNIQUE (\"" . join('","', $fields) . "\")";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Drops a unique constraint from a table
	 * @param $table The table from which to drop the unique
	 * @param $name The name of the unique
	 * @return 0 success
	 */
	function dropUniqueConstraint($table, $name) {
		$this->clean($table);
		$this->clean($name);
		
		$sql = "ALTER TABLE {$table} DROP INDEX {$name}";

		// @@ How do you do this?
		return $this->execute($sql);
	}	
	 
	/**
	 * Adds a primary key constraint to a table
	 * @param $table The table to which to add the primery key
	 * @param $fields (array) An array of fields over which to add the primary key
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 */
	function addPrimaryKeyConstraint($table, $fields, $name = '') {
		$this->clean($table);
		$this->arrayClean($fields);
		$this->clean($name);
		
		if ($name != '')
			return -99;
		else
			$sql = "ALTER TABLE {$table} ADD PRIMARY KEY (\"" . join('","', $fields) . "\")";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Drops a primary key constraint from a table
	 * @param $table The table from which to drop the primary key
	 * @param $name The name of the primary key
	 * @return 0 success
	 */
	function dropPrimaryKeyConstraint($table, $name = '') {
		$this->clean($table);
		$this->clean($name);
		
		$sql = "ALTER TABLE {$table} DROP PRIMARY KEY";

		// @@ How do you do this?
		return $this->execute($sql);
	}	
	
	/**
	 * Changes the owner of a table
	 * @param $table The table whose owner is to change
	 * @param $owner The new owner (username) of the table
	 * @return 0 success
	 */
	function setOwnerOfTable($table, $owner) {
		// Not implemented
		return -99;
	}

	// Column Functions

	/**
	 * Add a new column to a table
	 * @param $table The table to add to
	 * @param $column The name of the new column
	 * @param $type The type of the column
	 * @param $size (optional) The optional size of the column (ie. 30 for varchar(30))
	 * @return 0 success
	 */
	function addColumnToTable($table, $column, $type, $size = '') {
		$this->clean($table);
		$this->clean($column);
		$this->clean($type);
		$this->clean($size);
		// @@ How the heck do you properly clean type and size?
		
		if ($size == '')
			$sql = "ALTER TABLE {$table} ADD COLUMN {$column} {$type}";
		else
			$sql = "ALTER TABLE {$table} ADD COLUMN {$column} {$type}({$size})";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Drops a column from a table
	 * @param $table The table from which to drop
	 * @param $column The column name to drop
	 * @return 0 success
	 */
	function dropColumnFromTable($table, $column) {
		$this->clean($table);
		$this->clean($column);
		
		$sql = "ALTER TABLE {$table} DROP COLUMN {$column}";
		
		return $this->execute($sql);
	}

	/**
	 * Sets default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to set
	 * @param $default The new default value
	 * @return 0 success
	 */
	function setColumnDefault($table, $column, $default) {
		$this->clean($table);
		$this->clean($column);
		// @@ How the heck do you clean default clause?
		
		$sql = "ALTER TABLE {$table} ALTER COLUMN {$column} SET DEFAULT {$default}";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Drops default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to drop default
	 * @return 0 success
	 */
	function dropColumnDefault($table, $column) {
		$this->clean($table);
		$this->clean($column);

		$sql = "ALTER TABLE {$table} ALTER COLUMN {$column} DROP DEFAULT";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Sets whether or not a column can contain NULLs
	 * @param $table The table that contains the column
	 * @param $column The column to alter
	 * @param $state True to set null, false to set not null
	 * @return 0 success
	 * @return -1 attempt to set not null, but column contains nulls
	 * @return -2 transaction error
	 * @return -3 lock error
	 * @return -4 update error
	 */
	function setColumnNull($table, $column, $state) {
		// Not implemented without knowing column type
		return -99;
	}

	/**
	 * Renames a column in a table
	 * @param $table The table containing the column to be renamed
	 * @param $column The column to be renamed
	 * @param $newName The new name for the column
	 * @return 0 success
	 */
	function renameColumn($table, $column, $newName) {
		// Not implemented without knowing column type
		return -99;
	}
/*
	function &getIndices()
	function &getIndex()
	function setIndex()
	function delIndex()

	function &getSequences()
	function &getSequence()
	function setSequence()
	function delSequence()

	// DML Functions

	function doSelect()
	function doDelete()
	function doUpdate()
*/

	// Capabilities
	function hasTables() { return true; }
	function hasViews() { return false; }
	function hasSequences() { return false; }
	function hasFunctions() { return true; }
	function hasTriggers() { return false; }
	function hasOperators() { return false; }
	function hasTypes() { return false; }
	function hasAggregates() { return false; }
	function hasRules() { return false; }

}

?>