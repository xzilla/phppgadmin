<?php

/**
 * PostgreSQL 7.5 support
 *
 * $Id: Postgres75.php,v 1.12 2004/07/10 08:51:01 chriskl Exp $
 */

include_once('./classes/database/Postgres74.php');

class Postgres75 extends Postgres74 {

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'RULE', 'ALL PRIVILEGES'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES'),
		'database' => array('CREATE', 'TEMPORARY', 'ALL PRIVILEGES'),
		'function' => array('EXECUTE', 'ALL PRIVILEGES'),
		'language' => array('USAGE', 'ALL PRIVILEGES'),
		'schema' => array('CREATE', 'USAGE', 'ALL PRIVILEGES'),
		'tablespace' => array('CREATE', 'ALL PRIVILEGES')
	);

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	// Default help URL
	var $help_base = 'http://developer.postgresql.org/docs/postgres/';

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres75($conn) {
		$this->Postgres74($conn);
	}

	// Database functions

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function &getDatabases() {
		global $conf;

		if (isset($conf['owned_only']) && $conf['owned_only'] && !$this->isSuperUser($_SESSION['webdbUsername'])) {
			$username = $_SESSION['webdbUsername'];
			$this->clean($username);
			$clause = " AND pu.usename='{$username}'";
		}
		else $clause = '';
		
		if (!$conf['show_system'])
			$where = ' AND NOT pdb.datistemplate';
		else
			$where = ' AND pdb.datallowconn';

		$sql = "SELECT pdb.datname AS datname, pu.usename AS datowner, pg_encoding_to_char(encoding) AS datencoding,
                               (SELECT description FROM pg_description pd WHERE pdb.oid=pd.objoid) AS datcomment,
                               (SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=pdb.dattablespace) AS tablespace
                        FROM pg_database pdb, pg_user pu
			WHERE pdb.datdba = pu.usesysid
			{$where}
			{$clause}
			ORDER BY pdb.datname";
			
		return $this->selectSet($sql);
	}
	
	// Schema functions

	/**
	 * Return all schemas in the current database
	 * @return All schemas, sorted alphabetically
	 */
	function &getSchemas() {
		global $conf;

		if (!$conf['show_system']) $and = "AND nspname NOT LIKE 'pg\\\\_%' AND nspname != 'information_schema'";
		else $and = '';
		$sql = "SELECT pn.nspname, pu.usename AS nspowner, pg_catalog.obj_description(pn.oid, 'pg_namespace') AS nspcomment,
								(SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=pn.nsptablespace) AS tablespace
                        FROM pg_catalog.pg_namespace pn, pg_catalog.pg_user pu
			WHERE pn.nspowner = pu.usesysid
			{$and} ORDER BY nspname";

		return $this->selectSet($sql);
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
		$this->clean($comment);

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
	
	// Tablespace functions
	
	/**
	 * Retrieves information for all tablespaces
	 * @return A recordset
	 */
	function getTablespaces() {
		global $conf;
		
		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation
					FROM pg_catalog.pg_tablespace";
					
		if (!$conf['show_system']) {
			$sql .= " WHERE spcname NOT LIKE 'pg\\\\_%'";
		}
		
		$sql .= " ORDER BY spcname";
					
		return $this->selectSet($sql);
	}
	
	/**
	 * Retrieves a tablespace's information
	 * @return A recordset
	 */
	function getTablespace($spcname) {
		$this->clean($spcname);
		
		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation
					FROM pg_catalog.pg_tablespace WHERE spcname='{$spcname}'";
					
		return $this->selectSet($sql);
	}
	
	/**
	 * Creates a tablespace
	 * @param $spcname The name of the tablespace to create
	 * @param $spcowner The owner of the tablespace. '' for current
	 * @param $spcloc The directory in which to create the tablespace
	 * @return 0 success
	 */
	function createTablespace($spcname, $spcowner, $spcloc) {
		$this->fieldClean($spcname);
		$this->clean($spcloc);
		
		$sql = "CREATE TABLESPACE \"{$spcname}\"";
		
		if ($spcowner != '') {
			$this->fieldClean($spcowner);
			$sql .= " OWNER \"{$spcowner}\"";
		}
		
		$sql .= " LOCATION '{$spcloc}'";

		return $this->execute($sql);
	}

	/**
	 * Drops a tablespace
	 * @param $spcname The name of the domain to drop
	 * @return 0 success
	 */
	function dropTablespace($spcname) {
		$this->fieldClean($spcname);

		$sql = "DROP TABLESPACE \"{$spcname}\"";

		return $this->execute($sql);
	}

	/**
	 * Alters a tablespace
	 * @param $spcname The name of the tablespace
	 * @param $name The new name for the tablespace
	 * @param $owner The new owner for the tablespace
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 owner error
	 * @return -3 rename error
	 */
	function alterTablespace($spcname, $name, $owner) {
		$this->fieldClean($spcname);
		$this->fieldClean($name);
		$this->fieldClean($owner);

		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		// Owner
		$sql = "ALTER TABLESPACE \"{$spcname}\" OWNER TO \"{$owner}\"";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}

		// Rename (only if name has changed)
		if ($name != $spcname) {
			$sql = "ALTER TABLESPACE \"{$spcname}\" RENAME TO \"{$name}\"";
			$status = $this->execute($sql);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}
				
		return $this->endTransaction();
	}
	
	// Backend process signalling functions
	
	/**
	 * Sends a cancel or kill command to a process
	 * @param $pid The ID of the backend process
	 * @param $signal 'CANCEL' or 'KILL'
	 * @return 0 success
	 * @return -1 invalid signal type
	 */
	function sendSignal($pid, $signal) {
		// Clean
		$pid = (int)$pid;
		
		if ($signal == 'CANCEL')
			$sql = "SELECT pg_catalog.pg_cancel_backend({$pid}) AS val";
		elseif ($signal == 'KILL')
			$sql = "SELECT pg_catalog.pg_terminate_backend({$pid}) AS val";
		else
			return -1;
			
		// Execute the query
		$val = $this->selectField($sql, 'val');
		
		if ($val === -1) return -1;
		elseif ($val == '1') return 0;
		else return -1;
	}
	
	function hasAlterColumnType() { return true; }
	function hasTablespaces() { 
		$platform = $this->getPlatform();
		return $platform != 'MINGW';
	}
	function hasSignals() { return true; }
	
}
