<?php

/**
 * PostgreSQL 8.0 support
 *
 * $Id: Postgres80.php,v 1.18 2005/09/07 08:09:21 chriskl Exp $
 */

include_once('./classes/database/Postgres74.php');

class Postgres80 extends Postgres74 {

	var $major_version = 8.0;

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES'),
		'database' => array('CREATE', 'TEMPORARY', 'ALL PRIVILEGES'),
		'function' => array('EXECUTE', 'ALL PRIVILEGES'),
		'language' => array('USAGE', 'ALL PRIVILEGES'),
		'schema' => array('CREATE', 'USAGE', 'ALL PRIVILEGES'),
		'tablespace' => array('CREATE', 'ALL PRIVILEGES')
	);

	// Last oid assigned to a system object
	var $_lastSystemOID = 17228;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres80($conn) {
		$this->Postgres74($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc80.php');
		return $this->help_page;
	}

	// Database functions

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function getDatabases($currentdatabase = NULL) {
		global $conf, $misc;
		
		$server_info = $misc->getServerInfo();
		
		if (isset($conf['owned_only']) && $conf['owned_only'] && !$this->isSuperUser($server_info['username'])) {
			$username = $server_info['username'];
			$this->clean($username);
			$clause = " AND pu.usename='{$username}'";
		}
		else $clause = '';

		if ($currentdatabase != NULL)
			$orderby = "ORDER BY pdb.datname = '{$currentdatabase}' DESC, pdb.datname";
		else
			$orderby = "ORDER BY pdb.datname";

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
			{$orderby}";

		return $this->selectSet($sql);
	}

	/**
	 * Alters a database
	 * the multiple return vals are for postgres 8+ which support more functionality in alter database
	 * @param $dbName The name of the database
	 * @param $newName new name for the database
	 * @param $newOwner The new owner for the database
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 owner error
	 * @return -3 rename error
	 */
	function alterDatabase($dbName, $newName, $newOwner = '')
	{
		$this->clean($dbName);
		$this->clean($newName);
		$this->clean($newOwner);
		
		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
		
		if ($dbName != $newName) {
			$status = $this->alterDatabaseRename($dbName, $newName);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}
		
		$status = $this->alterDatabaseOwner($newName, $newOwner);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		return $this->endTransaction();
	}
	/**
	 * Changes ownership of a database
	 * This can only be done by a superuser or the owner of the database
	 * @param string $dbName database to change ownership of
	 * @param string $newOwner user that will own the database
	 * @return int 0 on success
	 */
	function alterDatabaseOwner($dbName, $newOwner) {
		$this->clean($dbName);
		$this->clean($newOwner);
		
		$sql = "ALTER DATABASE \"{$dbName}\" OWNER TO \"{$newOwner}\"";
		return $this->execute($sql);
	}

	// Table functions
	
	/**
	 * Return all tables in current database (and schema)
	 * @param $all True to fetch all tables, false for just in current schema
	 * @return All tables, sorted alphabetically 
	 */
	function getTables($all = false) {
		if ($all) {
			// Exclude pg_catalog and information_schema tables
			$sql = "SELECT schemaname AS nspname, tablename AS relname, tableowner AS relowner
					FROM pg_catalog.pg_tables 
					WHERE schemaname NOT IN ('pg_catalog', 'information_schema', 'pg_toast')
					ORDER BY schemaname, tablename";
		} else {
			$sql = "SELECT c.relname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner, 
						pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment,
						reltuples::integer,
						(SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=c.reltablespace) AS tablespace
					FROM pg_catalog.pg_class c
					LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
					WHERE c.relkind = 'r'
					AND nspname='{$this->_schema}'
					ORDER BY c.relname";
		}		

		return $this->selectSet($sql);
	}	

	/**
	 * Returns table information
	 * @param $table The name of the table
	 * @return A recordset
	 */
	function getTable($table) {
		$this->clean($table);
		
		$sql = "
			SELECT
			  c.relname, u.usename AS relowner,
			  pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment,
			  (SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=c.reltablespace) AS tablespace
			FROM pg_catalog.pg_class c
			     LEFT JOIN pg_catalog.pg_user u ON u.usesysid = c.relowner
			     LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
			WHERE c.relkind = 'r'
			      AND n.nspname = '{$this->_schema}'
			      AND c.relname = '{$table}'";		
			
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

	// Sequence functions

	/**
	 * Returns all sequences in the current database
	 * @return A recordset
	 */
	function getSequences($all = false) {
		if ($all) {
			// Exclude pg_catalog and information_schema tables
			$sql = "SELECT n.nspname, c.relname AS seqname, u.usename AS seqowner
				FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
				AND c.relkind = 'S' 
				AND n.nspname NOT IN ('pg_catalog', 'information_schema', 'pg_toast') 
				ORDER BY nspname, seqname";
		} else {
			$sql = "SELECT c.relname AS seqname, u.usename AS seqowner, pg_catalog.obj_description(c.oid, 'pg_class') AS seqcomment,
				(SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=c.reltablespace) AS tablespace
				FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
				AND c.relkind = 'S' AND n.nspname='{$this->_schema}' ORDER BY seqname";
		}
					
		return $this->selectSet( $sql );
	}
	
	// Tablespace functions
	
	/**
	 * Retrieves information for all tablespaces
	 * @param $all Include all tablespaces (necessary when moving objects back to the default space)
	 * @return A recordset
	 */
	function getTablespaces($all = false) {
		global $conf;
		
		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation
					FROM pg_catalog.pg_tablespace";
					
		if (!$conf['show_system'] && !$all) {
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
	 * @param $signal 'CANCEL'
	 * @return 0 success
	 * @return -1 invalid signal type
	 */
	function sendSignal($pid, $signal) {
		// Clean
		$pid = (int)$pid;
		
		if ($signal == 'CANCEL')
			$sql = "SELECT pg_catalog.pg_cancel_backend({$pid}) AS val";
		else
			return -1;
			
		// Execute the query
		$val = $this->selectField($sql, 'val');
		
		if ($val === -1) return -1;
		elseif ($val == '1') return 0;
		else return -1;
	}

	/**
	 * Returns all details for a particular function
	 * @param $func The name of the function to retrieve
	 * @return Function info
	 */
	function getFunction($function_oid) {
		$this->clean($function_oid);
		
		$sql = "SELECT 
					pc.oid AS prooid,
					proname,
					lanname as prolanguage,
					pg_catalog.format_type(prorettype, NULL) as proresult,
					prosrc,
					probin,
					proretset,
					proisstrict,
					provolatile,
					prosecdef,
					pg_catalog.oidvectortypes(pc.proargtypes) AS proarguments,
					proargnames AS proargnames,
					pg_catalog.obj_description(pc.oid, 'pg_proc') AS procomment
				FROM
					pg_catalog.pg_proc pc, pg_catalog.pg_language pl
				WHERE 
					pc.oid = '{$function_oid}'::oid
				AND pc.prolang = pl.oid
				";
	
		return $this->selectSet($sql);
	}
		
	// Capabilities
	function hasAlterDatabaseOwner() { return true; }
	function hasAlterColumnType() { return true; }
	function hasTablespaces() { return true; }
	function hasSignals() { return true; }
	function hasNamedParams() { return true; }
	
}

?>
