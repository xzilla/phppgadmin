<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres74.php,v 1.72 2008/02/20 21:06:18 ioguix Exp $
 */

include_once('./classes/database/Postgres80.php');

class Postgres74 extends Postgres80 {

	var $major_version = 7.4;
	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES'),
		'database' => array('CREATE', 'TEMPORARY', 'ALL PRIVILEGES'),
		'function' => array('EXECUTE', 'ALL PRIVILEGES'),
		'language' => array('USAGE', 'ALL PRIVILEGES'),
		'schema' => array('CREATE', 'USAGE', 'ALL PRIVILEGES')
	);


	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres74($conn) {
		$this->Postgres80($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc74.php');
		return $this->help_page;
	}

	// Database functions

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
	function alterDatabase($dbName, $newName, $newOwner = '', $comment = '') {
		//ignore $newowner, not supported pre 8.0
		//ignore $comment, not supported pre 8.2
		$this->clean($dbName);
		$this->clean($newName);

		$status = $this->alterDatabaseRename($dbName, $newName);
		if ($status != 0) return -3;
		else return 0;
	}

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

		if ($currentdatabase != NULL) {
			$this->clean($currentdatabase);
			$orderby = "ORDER BY pdb.datname = '{$currentdatabase}' DESC, pdb.datname";
		}
		else
			$orderby = "ORDER BY pdb.datname";

		if (!$conf['show_system'])
			$where = ' AND NOT pdb.datistemplate';
		else
			$where = ' AND pdb.datallowconn';

		$sql = "SELECT pdb.datname AS datname, pu.usename AS datowner, pg_encoding_to_char(encoding) AS datencoding,
                               (SELECT description FROM pg_description pd WHERE pdb.oid=pd.objoid) AS datcomment
                        FROM pg_database pdb, pg_user pu
			WHERE pdb.datdba = pu.usesysid
			{$where}
			{$clause}
			{$orderby}";

		return $this->selectSet($sql);
	}

	// Table functions

	/**
	 * Protected method which alter a table
	 * SHOULDN'T BE CALLED OUTSIDE OF A TRANSACTION
	 * @param $tblrs The table recordSet returned by getTable()
	 * @param $name The new name for the table
	 * @param $owner The new owner for the table
	 * @param $schema The new schema for the table
	 * @param $comment The comment on the table
	 * @param $tablespace The new tablespace for the table ('' means leave as is)
	 * @return 0 success
	 * @return -3 rename error
	 * @return -4 comment error
	 * @return -5 owner error
	 */
	protected
	function _alterTable($tblrs, $name, $owner, $schema, $comment, $tablespace) {

		/* $schema and tablespace not supported in pg74- */
		$this->fieldArrayClean($tblrs->fields);

		// Comment
		$status = $this->setComment('TABLE', '', $tblrs->fields['relname'], $comment);
		if ($status != 0) return -4;

		// Owner
		$this->fieldClean($owner);
		$status = $this->alterTableOwner($tblrs, $owner);
		if ($status != 0) return -5;

		// Rename
		$this->fieldClean($name);
		$status = $this->alterTableName($tblrs, $name);
		if ($status != 0) return -3;

		return 0;
	}

	/**
	 * Alters a column in a table OR view
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
	 * @return -2 set not null error
	 * @return -3 set default error
	 * @return -4 rename column error
	 * @return -5 comment error
	 * @return -6 transaction error
	 */
	function alterColumn($table, $column, $name, $notnull, $oldnotnull, $default, $olddefault,
	$type, $length, $array, $oldtype, $comment)
	{
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		// @@ NEED TO HANDLE "NESTED" TRANSACTION HERE
		if ($notnull != $oldnotnull) {
			$status = $this->setColumnNull($table, $column, !$notnull);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -2;
			}
		}

		// Set default, if it has changed
		if ($default != $olddefault) {
			if ($default == '')
				$status = $this->dropColumnDefault($table, $column);
			else
				$status = $this->setColumnDefault($table, $column, $default);

			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}

		// Rename the column, if it has been changed
		if ($column != $name) {
			$status = $this->renameColumn($table, $column, $name);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -4;
			}
		}

		// The $name and $table parameters must be cleaned for the setComment function.  
                // It's ok to do that here since this is the last time these variables are used.
		$this->fieldClean($name);
		$this->fieldClean($table);
		$status = $this->setComment('COLUMN', $name, $table, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -5;
		}

		return $this->endTransaction();
	}

	/**
	 * Returns table information
	 * @param $table The name of the table
	 * @return A recordset
	 */
	function getTable($table) {
		$c_schema = $this->_schema;
		$this->clean($c_schema);
		$this->clean($table);

		$sql = "
			SELECT
			  c.relname, n.nspname, u.usename AS relowner,
			  pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
			FROM pg_catalog.pg_class c
			     LEFT JOIN pg_catalog.pg_user u ON u.usesysid = c.relowner
			     LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
			WHERE c.relkind = 'r'
				AND n.nspname = '{$c_schema}'
			    AND c.relname = '{$table}'";

		return $this->selectSet($sql);
	}

	/**
	 * Return all tables in current database (and schema)
	 * @param $all True to fetch all tables, false for just in current schema
	 * @return All tables, sorted alphabetically
	 */
	function getTables($all = false) {
		$c_schema = $this->_schema;
		$this->clean($c_schema);
		if ($all) {
			// Exclude pg_catalog and information_schema tables
			$sql = "SELECT schemaname AS nspname, tablename AS relname, tableowner AS relowner
					FROM pg_catalog.pg_tables
					WHERE schemaname NOT IN ('pg_catalog', 'information_schema', 'pg_toast')
					ORDER BY schemaname, tablename";
		} else {
			$sql = "SELECT c.relname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner,
						pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment,
						reltuples::bigint
					FROM pg_catalog.pg_class c
					LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
					WHERE c.relkind = 'r'
					AND nspname='{$c_schema}'
					ORDER BY c.relname";
		}

		return $this->selectSet($sql);
	}

	/**
	 * Returns the current default_with_oids setting
	 * @return default_with_oids setting
	 */
	function getDefaultWithOid() {
		// 8.0 is the first release to have this setting
		// Prior releases don't have this setting... oids always activated
		return 'on';
		}

	// Sequence functions

	/**
	 * Returns all sequences in the current database
	 * @return A recordset
	 */
	function getSequences($all = false) {
		$c_schema = $this->_schema;
		$this->clean($c_schema);
		if ($all) {
			// Exclude pg_catalog and information_schema tables
			$sql = "SELECT n.nspname, c.relname AS seqname, u.usename AS seqowner
				FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
				AND c.relkind = 'S'
				AND n.nspname NOT IN ('pg_catalog', 'information_schema', 'pg_toast')
				ORDER BY nspname, seqname";
		} else {
			$sql = "SELECT c.relname AS seqname, u.usename AS seqowner, pg_catalog.obj_description(c.oid, 'pg_class') AS seqcomment
				FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
				AND c.relkind = 'S' AND n.nspname='{$c_schema}' ORDER BY seqname";
		}

		return $this->selectSet( $sql );
		}

	// Function functions

	/**
	 * Returns all details for a particular function
	 * @param $func The name of the function to retrieve
	 * @return Function info
	 */
	function getFunction($function_oid) {
		$this->clean($function_oid);

		$sql = "
		SELECT
			pc.oid AS prooid,
			proname,
			pg_catalog.pg_get_userbyid(proowner) AS proowner,
			nspname as proschema,
			lanname as prolanguage,
			pg_catalog.format_type(prorettype, NULL) as proresult,
			prosrc,
			probin,
			proretset,
			proisstrict,
			provolatile,
			prosecdef,
			pg_catalog.oidvectortypes(pc.proargtypes) AS proarguments,
			pg_catalog.obj_description(pc.oid, 'pg_proc') AS procomment
		FROM
			pg_catalog.pg_proc pc, pg_catalog.pg_language pl, pg_catalog.pg_namespace n
		WHERE
			pc.oid = '$function_oid'::oid
			AND pc.prolang = pl.oid
			AND n.oid = pc.pronamespace
		";

		return $this->selectSet($sql);
	}

	// Capabilities

	function hasAlterColumnType() { return false; }
	function hasCreateFieldWithConstraints() { return false; }
	function hasAlterDatabaseOwner() { return false; }
	function hasAlterSchemaOwner() { return false; }
	function hasFunctionAlterOwner() { return false; }
	function hasNamedParams() { return false; }
	function hasQueryCancel() { return false; }
	function hasTablespaces() { return false; }
	function hasMagicTypes() { return false; }
}
?>
