<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres71.php,v 1.8 2002/05/01 09:37:30 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('../classes/database/BaseDB.php');

class Postgres71 extends BaseDB {

	var $dbFields = array('dbname' => 'datname', 'dbcomment' => 'description');
	var $tbFields = array('tbname' => 'tablename', 'tbowner' => 'tableowner');
	var $vwFields = array('vwname' => 'viewname', 'vwowner' => 'viewowner', 'vwdef' => 'definition');
	var $uFields = array('uname' => 'usename', 'usuper' => 'usesuper', 'ucreatedb' => 'usecreatedb', 'uexpires' => 'valuntil');

	// @@ Should we bother querying for this?
	var $_lastSystemOID = 18539;
	var $_maxNameLen = 31;

	function Postgres71($host, $port, $database, $user, $password) {
		$this->BaseDB('postgres7');

//		$this->conn->host = $host;
		//$this->Port = $port;

		$this->conn->connect($host, $user, $password, $database);
	}

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function &getDatabases() {
		$sql = "SELECT pdb.datname, pde.description FROM 
					pg_database pdb LEFT JOIN pg_description pde ON pdb.oid=pde.objoid
					WHERE NOT pdb.datistemplate
					ORDER BY pdb.datname";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information about a particular database
	 * @param $database The name of the database to retrieve
	 * @return The database info
	 */
	function &getDatabase($database) {
		$this->clean($database);
		$sql = "SELECT * FROM pg_database WHERE datname='{$database}'";
		return $this->selectRow($sql);
	}

	/**
	 * Drops a database
	 * @param $database The name of the database to retrieve
	 * @return 0 success
	 */
	function dropDatabase($database) {
		$this->clean($database);
		$sql = "DROP DATABASE \"{$database}\"";
	}

	// Table functions

	/**
	 * Return all tables in current database
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables() {
		if (!$this->_showSystem) $where = "WHERE tablename NOT LIKE 'pg_%' ";
		else $where = '';
		$sql = "SELECT tablename, tableowner FROM pg_tables {$where}ORDER BY tablename";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a table
	 * @param $table The name of the table
	 * @return Table information
	 */
	function &getTableByName($table) {
		$this->clean($table);
		$sql = "SELECT * FROM pg_class WHERE relname='{$table}'";
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
		
		$sql = "DROP TABLE \"{$table}\"";

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
		$sql = "ALTER TABLE \"{$table}\" RENAME TO \"{$newName}\"";

		// @@ How do you do this?
		return $this->execute($sql);
	}
	
	/**
	 *
	 */
	function &browseTable($table, $offset, $limit) {
		return $this->selectTable("SELECT * FROM \"{$table}\"", $offset, $limit);
	}
	
	/**
	 *
	 */
	function &selectTable($sql, $offset, $limit) {
		return $this->selectSet($sql, $offset, $limit);
	}

	/**
	 * Adds a check constraint to a table
	 * @param $table The table to which to add the check
	 * @param $definition The definition of the check
	 * @param $name (optional) The name to give the check, otherwise default name is assigned
	 * @return 0 success
	 */
	function addCheckConstraint($table, $definition, $name = '') {
		$this->clean($table);
		$this->clean($name);
		// @@ how the heck do you clean definition???
		
		if ($name != '')
			$sql = "ALTER TABLE \"{$table}\" ADD CONSTRAINT \"{$name}\" CHECK ({$definition})";
		else
			$sql = "ALTER TABLE \"{$table}\" ADD CHECK ({$definition})";

		// @@ How do you do this?
		return $this->execute($sql);
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
		$this->clean($table);
		$this->clean($name);
		
		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -2;

		// Properly lock the table
		$sql = "LOCK TABLE \"{$table}\" IN ACCESS EXCLUSIVE MODE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Delete the check constraint
		$sql = "DELETE FROM pg_relcheck WHERE rcrelid=(SELECT oid FROM pg_class WHERE relname='{$table}') AND rcname='{$name}'";
	   $status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}
		
		// Update the pg_class catalog to reflect the new number of checks
		$sql = "UPDATE pg_class SET relchecks=(SELECT COUNT(*) FROM pg_relcheck WHERE 
					rcrelid=(SELECT oid FROM pg_class WHERE relname='{$table}')) 
					WHERE relname='{$table}'";
	   $status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Otherwise, close the transaction
		return $this->endTransaction();
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
			$sql = "CREATE UNIQUE INDEX \"{$name}\" ON \"{$table}\"(\"" . join('","', $fields) . "\")";
		else return -99; // Not supported

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
		
		$sql = "DROP INDEX \"{$name}\"";

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
		// This function can be faked with a unique index and a catalog twiddle, however
		// how do we ensure that it's only used on NOT NULL fields?
		return -99; // Not supported.
	}

	/**
	 * Drops a primary key constraint from a table
	 * @param $table The table from which to drop the primary key
	 * @param $name The name of the primary key
	 * @return 0 success
	 */
	function dropPrimaryKeyConstraint($table, $name) {
		$this->clean($table);
		$this->clean($name);
		
		$sql = "DROP INDEX \"{$name}\"";

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
		$this->clean($table);
		$this->clean($owner);
		
		$sql = "ALTER TABLE \"{$table}\" OWNER TO \"{$owner}\"";

		// @@ How do you do this?
		return $this->execute($sql);
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
			$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" {$type}";
		else
			$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" {$type}({$size})";

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
		return -99; // Not implemented
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
		
		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" SET DEFAULT {$default}";

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

		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" DROP DEFAULT";

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
		$this->clean($table);
		$this->clean($column);

		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -2;

		// Properly lock the table
		$sql = "LOCK TABLE \"{$table}\" IN ACCESS EXCLUSIVE MODE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Check for existing nulls
		if (!$state) {
			$sql = "SELECT COUNT(*) AS total FROM \"{$table}\" WHERE \"{$column}\" IS NULL";
			$result = $this->selectField($sql, 'total');
			if ($result > 0) {
				$this->rollbackTransaction();
				return -1;
			}
		}
		
		// Otherwise update the table.  Note the reverse-sensed $state variable
		$sql = "UPDATE pg_attribute SET attnotnull = " . ($state) ? 'false' : 'true' . " 
					WHERE attrelid = (SELECT oid FROM pg_class WHERE relname = '{$table}') 
					AND attname = '{$column}'";
	   $status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Otherwise, close the transaction
		return $this->endTransaction();
	}

	/**
	 * Renames a column in a table
	 * @param $table The table containing the column to be renamed
	 * @param $column The column to be renamed
	 * @param $newName The new name for the column
	 * @return 0 success
	 */
	function renameColumn($table, $column, $newName) {
		$this->clean($table);
		$this->clean($column);
		$this->clean($newName);

		$sql = "ALTER TABLE \"{$table}\" RENAME COLUMN \"{$column}\" TO \"{$newName}\"";

		// @@ how?
		return $this->execute($sql);
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

	// View functions
	
	/**
	 * Returns a list of all views in the database
	 * @return All views
	 */
	function getViews() {
		if (!$this->_showSystem)
			$where = "WHERE viewname NOT LIKE 'pg_%'";
		else $where  = '';
		
		$sql = "SELECT viewname, viewowner FROM pg_views {$where} ORDER BY viewname";

		return $this->selectSet($sql);
	}
	
	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function getView($view) {
		$this->clean($view);
		
		$sql = "SELECT viewname, viewowner, definition FROM pg_views WHERE viewname='$view'";

		return $this->selectSet($sql);
	}	

	/**
	 * Creates a new view.
	 * @param $viewname The name of the view to create
	 * @param $definition The definition for the new view
	 * @return 0 success
	 */
	function createView($viewname, $definition) {
		$this->clean($viewname);
		// Note: $definition not cleaned
		
		$sql = "CREATE VIEW \"{$viewname}\" AS {$definition}";
		
		return $this->execute($sql);
	}
	
	/**
	 * Drops a view.
	 * @param $viewname The name of the view to drop
	 * @return 0 success
	 */
	function dropView($viewname) {
		$this->clean($viewname);
		
		$sql = "DROP VIEW \"{$viewname}\"";
		
		return $this->execute($sql);
	}
	
	/**
	 * Updates a view.  Postgres doesn't have CREATE OR REPLACE view,
	 * so we do it with a drop and a recreate.
	 * @param $viewname The name fo the view to update
	 * @param $definition The new definition for the view
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop view error
	 * @return -3 create view error
	 */
	function setView($viewname, $definition) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		$status = $this->dropView($viewname);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createView($viewname, $definition);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
	}	

	// Operator functions
	
	/**
	 * Returns a list of all operators in the database
	 * @return All operators
	 */
	function getOperators() {
		if (!$this->_showSystem)
			$where = "WHERE po.oid > '{$this->_lastSystemOID}'::oid";
		else $where  = '';
		
		$sql = "
			SELECT
            po.oid,
				po.oprname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprleft) AS oprleftname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprright) AS oprrightname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprresult) AS resultname
			FROM
				pg_operator po
			{$where}				
			ORDER BY
				po.oprname, po.oid
		";

		return $this->selectSet($sql);
	}
	
	
	/**
	 * Creates a new operator
	 */

	// User and group functions
	
	/**
	 * Returns all users in the database cluster
	 * @return All users
	 */
	function &getUsers() {
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil FROM pg_shadow ORDER BY usename";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Return information about a single user
	 * @param $username The username of the user to retrieve
	 * @return The user's data
	 */
	function &getUser($username) {
		$this->clean($username);
		
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil FROM pg_shadow WHERE usename='{$username}'";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Creates a new user
	 * @param $username The username of the user to create
	 * @param $password A password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  When the account expires.
	 * @param $group (array) The groups to create the user in
	 * @return 0 success
	 */
	function createUser($username, $password, $createdb, $createuser, $expiry, $groups) {
		$this->clean($username);
		// @@ THIS IS A PROBLEM FOR TRIMMING PASSWORD!!!
		$this->clean($password);
		$this->clean($expiry);
		$this->arrayClean($groups);		
		
		$sql = "CREATE USER \"{$username}\"";
		if ($password != '') $sql .= " WITH PASSWORD '{$password}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createuser) ? ' CREATEUSER' : ' NOCREATEUSER';
		if (is_array($groups) && sizeof($groups) > 0) $sql .= " IN GROUP '" . join("', '", $groups) . "'";
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Adjusts a user's info
	 * @param $username The username of the user to modify
	 * @param $password A new password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  When the account expires.
	 * @return 0 success
	 */
	function setUser($username, $password, $createdb, $createuser, $expiry) {
		$this->clean($username);
		$this->clean($password);
		$this->clean($expiry);
		
		$sql = "ALTER USER \"{$username}\"";
		if ($password != '') $sql .= " WITH PASSWORD '{$password}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createuser) ? ' CREATEUSER' : ' NOCREATEUSER';
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Removes a user
	 * @param $username The username of the user to drop
	 * @return 0 success
	 */
	function dropUser($username) {
		$this->clean($username);
		
		$sql = "DROP USER \"{$username}\"";
		
		return $this->execute($sql);
	}
	 
	// Capabilities
	function hasTables() { return true; }
	function hasViews() { return true; }
	function hasSequences() { return true; }
	function hasFunctions() { return true; }
	function hasTriggers() { return true; }
	function hasOperators() { return true; }
	function hasTypes() { return true; }
	function hasAggregates() { return true; }
	function hasRules() { return true; }

}

?>