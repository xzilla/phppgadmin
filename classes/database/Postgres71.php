<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres71.php,v 1.25 2003/03/16 10:51:01 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('classes/database/Postgres.php');

class Postgres71 extends Postgres {

	var $_lastSystemOID = 18539;
	var $_maxNameLen = 31;

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'ALL'),
		'view' => array('SELECT', 'RULE', 'ALL'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL')
	);

	function Postgres71($host, $port, $database, $user, $password) {
		$this->Postgres($host, $port, $database, $user, $password);
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
	 * Returns a list of all functions in the database
 	 * @param $all If true, will find all available functions, if false just userland ones
	 * @return All functions
	 */
	function &getFunctions($all = false) {
		if ($all)
			$where = '';
		else
			$where = "AND pc.oid > '{$this->_lastSystemOID}'::oid";
		
		$sql = 	"SELECT
				pc.oid,
				proname, 
				pt.typname AS return_type,
				oidvectortypes(pc.proargtypes) AS arguments
			FROM
				pg_proc pc, pg_user pu, pg_type pt
			WHERE
				pc.proowner = pu.usesysid
				AND pc.prorettype = pt.oid
				{$where}
			UNION
			SELECT 
				pc.oid,
				proname, 
				'OPAQUE' AS result, 
				oidvectortypes(pc.proargtypes) AS arguments
			FROM
				pg_proc pc, pg_user pu, pg_type pt
			WHERE	
				pc.proowner = pu.usesysid
				AND pc.prorettype = 0
				{$where}
			ORDER BY
				proname, return_type
			";

		return $this->selectSet($sql);
	}

	/**
	 * Updates a function.  Postgres 7.1 doesn't have CREATE OR REPLACE function,
	 * so we do it with a drop and a recreate.
	 * @param $funcname The name of the function to update
	 * @param $definition The new definition for the function
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop function error
	 * @return -3 create function error
	 */
	function setFunction($funcname, $definition) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		$status = $this->dropFunction($funcname);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createFunction($funcname, $definition);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
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
	function hasSchemas() { return false; }

}

?>
