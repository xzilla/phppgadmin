<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.186 2008/01/19 13:46:15 ioguix Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('./classes/database/Postgres72.php');

class Postgres73 extends Postgres72 {

	var $major_version = 7.3;

	// Store the current schema
	var $_schema;

	// Last oid assigned to a system object
	var $_lastSystemOID = 16974;

	// Max object name length
	var $_maxNameLen = 63;

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
	// Function properties
	var $funcprops = array( array('', 'VOLATILE', 'IMMUTABLE', 'STABLE'),
							array('', 'CALLED ON NULL INPUT', 'RETURNS NULL ON NULL INPUT'),
							array('', 'SECURITY INVOKER', 'SECURITY DEFINER'));
	var $defaultprops = array('', '', '');

	// Select operators
	var $selectOps = array('=' => 'i', '!=' => 'i', '<' => 'i', '>' => 'i', '<=' => 'i', '>=' => 'i', '<<' => 'i', '>>' => 'i', '<<=' => 'i', '>>=' => 'i',
									'LIKE' => 'i', 'NOT LIKE' => 'i', 'ILIKE' => 'i', 'NOT ILIKE' => 'i', 'SIMILAR TO' => 'i',
									'NOT SIMILAR TO' => 'i', '~' => 'i', '!~' => 'i', '~*' => 'i', '!~*' => 'i',
									'IS NULL' => 'p', 'IS NOT NULL' => 'p', 'IN' => 'x', 'NOT IN' => 'x');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres73($conn) {
		$this->Postgres72($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc73.php');
		return $this->help_page;
	}

	/**
	 * Returns the current schema to prepend on object names
	 */
	function schema() {
		return "\"{$this->_schema}\".";
	}

	// Schema functions

	/**
	 * Sets the current working schema.  Will also set class variable.
	 * @param $schema The the name of the schema to work in
	 * @return 0 success
	 */
	function setSchema($schema) {
		// Get the current schema search path, including 'pg_catalog'.
		$search_path = $this->getSearchPath();
		// Prepend $schema to search path
		array_unshift($search_path, $schema);
		$status = $this->setSearchPath($search_path);
		if ($status == 0) {
			$this->clean($schema);
			$this->_schema = $schema;
			return 0;
		}
		else return $status;
	}

	/**
	 * Sets the current schema search path
	 * @param $paths An array of schemas in required search order
	 * @return 0 success
	 * @return -1 Array not passed
	 * @return -2 Array must contain at least one item
	 */
	function setSearchPath($paths) {
		if (!is_array($paths)) return -1;
		elseif (sizeof($paths) == 0) return -2;
		elseif (sizeof($paths) == 1 && $paths[0] == '') {
			// Need to handle empty paths in some cases
			$paths[0] = 'pg_catalog';
		}

		// Loop over all the paths to check that none are empty
		$temp = array();
		foreach ($paths as $schema) {
			if ($schema != '') $temp[] = $schema;
		}
		$this->fieldArrayClean($temp);

		$sql = 'SET SEARCH_PATH TO "' . implode('","', $temp) . '"';

		return $this->execute($sql);
	}

	/**
	 * Return the current schema search path
	 * @return Array of schema names
	 */
	function getSearchPath() {
		$sql = 'SELECT current_schemas(false) AS search_path';

		return $this->phpArray($this->selectField($sql, 'search_path'));
	}

	/**
	 * Return all schemas in the current database
	 * @return All schemas, sorted alphabetically - but with PUBLIC first (if it exists)
	 */
	function getSchemas() {
		global $conf, $slony;

		if (!$conf['show_system']) {
			$where = "WHERE nspname NOT LIKE 'pg\\\\_%'";
			if (isset($slony) && $slony->isEnabled()) {
				$temp = $slony->slony_schema;
				$this->clean($temp);
				$where .= " AND nspname != '{$temp}'";
			}
		}
		else $where = "WHERE nspname !~ '^pg_t(emp_[0-9]+|oast)$'";
		$sql = "SELECT pn.nspname, pu.usename AS nspowner, pg_catalog.obj_description(pn.oid, 'pg_namespace') AS nspcomment
                  FROM pg_catalog.pg_namespace pn LEFT JOIN pg_catalog.pg_user pu ON (pn.nspowner = pu.usesysid)
				  {$where} ORDER BY nspname";

		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a schema
	 * @param $schema The name of the schema
	 * @return Schema information
	 */
	function getSchemaByName($schema) {
		$this->clean($schema);
		$sql = "SELECT nspname, nspowner, nspacl, pg_catalog.obj_description(pn.oid, 'pg_namespace') as nspcomment
                        FROM pg_catalog.pg_namespace pn
                        WHERE nspname='{$schema}'";
		return $this->selectSet($sql);
	}

	/**
	 * Creates a new schema.
	 * @param $schemaname The name of the schema to create
	 * @param $authorization (optional) The username to create the schema for.
	 * @param $comment (optional) If omitted, defaults to nothing
	 * @return 0 success
	 */
	function createSchema($schemaname, $authorization = '', $comment = '') {
		$this->fieldClean($schemaname);
		$this->fieldClean($authorization);
		$this->clean($comment);

		$sql = "CREATE SCHEMA \"{$schemaname}\"";
		if ($authorization != '') $sql .= " AUTHORIZATION \"{$authorization}\"";

		if ($comment != '') {
			$status = $this->beginTransaction();
			if ($status != 0) return -1;
		}

		// Create the new schema
		$status =  $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Set the comment
		if ($comment != '') {
			$status = $this->setComment('SCHEMA', $schemaname, '', $comment);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}

			return $this->endTransaction();
		}

		return 0;
	}

	/**
	 * Drops a schema.
	 * @param $schemaname The name of the schema to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropSchema($schemaname, $cascade) {
		$this->fieldClean($schemaname);

		$sql = "DROP SCHEMA \"{$schemaname}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Updates a schema.
	 * @param $schemaname The name of the schema to drop
	 * @param $comment The new comment for this schema
	 * @return 0 success
	 */
	function updateSchema($schemaname, $comment, $name) {
		$this->fieldClean($schemaname);
		$this->fieldClean($name);
		$this->clean($comment);

		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		$status = $this->setComment('SCHEMA', $schemaname, '', $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Only if the name has changed
		if ($name != $schemaname) {
			$sql = "ALTER SCHEMA \"{$schemaname}\" RENAME TO \"{$name}\"";
			$status = $this->execute($sql);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
		}

		return $this->endTransaction();
	}

	/**
	 * Returns the specified variable information.
	 * @return the field
	 */
	function getVariable($setting) {
		$sql = "SHOW $setting";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all available variable information.
	 * @return A recordset
	 */
	function getVariables() {
		$sql = "SHOW ALL";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all available process information.
	 * @param $database (optional) Find only connections to specified database
	 * @return A recordset
	 */
	function getProcesses($database = null) {
		if ($database === null)
			$sql = "SELECT * FROM pg_catalog.pg_stat_activity ORDER BY datname, usename, procpid";
		else {
			$this->clean($database);
			$sql = "SELECT * FROM pg_catalog.pg_stat_activity WHERE datname='{$database}' ORDER BY usename, procpid";
		}

		return $this->selectSet($sql);
	}

	/**
	 * Returns table locks information in the current database
	 * @return A recordset
	 */
	function getLocks() {
		global $conf;

		if (!$conf['show_system'])
			$where = "AND pn.nspname NOT LIKE 'pg\\\\_%'";
		else
			$where = "AND nspname !~ '^pg_t(emp_[0-9]+|oast)$'";

		$sql = "SELECT pn.nspname, pc.relname AS tablename, pl.transaction, pl.pid, pl.mode, pl.granted
		FROM pg_catalog.pg_locks pl, pg_catalog.pg_class pc, pg_catalog.pg_namespace pn
		WHERE pl.relation = pc.oid AND pc.relnamespace=pn.oid {$where}
		ORDER BY nspname,tablename";

		return $this->selectSet($sql);
	}

	// Table functions

	/**
	 * Checks to see whether or not a table has a unique id column
	 * @param $table The table name
	 * @return True if it has a unique id, false otherwise
	 * @return -99 error
	 */
	function hasObjectID($table) {
		$this->clean($table);

		$sql = "SELECT relhasoids FROM pg_catalog.pg_class WHERE relname='{$table}'
			AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')";

		$rs = $this->selectSet($sql);
		if ($rs->recordCount() != 1) return -99;
		else {
			$rs->fields['relhasoids'] = $this->phpBool($rs->fields['relhasoids']);
			return $rs->fields['relhasoids'];
		}
	}

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
	 * @return -6 tablespace error
	 * @return -7 schema error
	 */
	/* protected */
	function _alterTable($tblrs, $name, $owner, $schema, $comment, $tablespace) {

		$this->fieldClean($name);
		$this->fieldClean($owner);
		$this->clean($comment);
		/* $schema, $owner, $tablespace not supported in pg70 */

		$table = $tblrs->fields['relname'];

		// Comment
		$status = $this->setComment('TABLE', '', $table, $comment);
		if ($status != 0) return -4;

		// Rename (only if name has changed)
		if ($name != $table) {
			$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" RENAME TO \"{$name}\"";
			$status = $this->execute($sql);
			if ($status != 0)
				return -3;
			$table = $name;
		}

		// Owner
		if (!empty($owner) && ($tblrs->fields['relowner'] != $owner)) {
			// If owner has been changed, then do the alteration.  We are
			// careful to avoid this generally as changing owner is a
			// superuser only function.
			$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" OWNER TO \"{$owner}\"";

			$status = $this->execute($sql);
			if ($status != 0) return -5;
		}

		return 0;
	}

	/**
	 * Removes a table from the database
	 * @param $table The table to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropTable($table, $cascade) {
		$this->fieldClean($table);

		$sql = "DROP TABLE \"{$this->_schema}\".\"{$table}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Given an array of attnums and a relation, returns an array mapping
	 * attribute number to attribute name.
	 * @param $table The table to get attributes for
	 * @param $atts An array of attribute numbers
	 * @return An array mapping attnum to attname
	 * @return -1 $atts must be an array
	 * @return -2 wrong number of attributes found
	 */
	function getAttributeNames($table, $atts) {
		$this->clean($table);
		$this->arrayClean($atts);

		if (!is_array($atts)) return -1;

		if (sizeof($atts) == 0) return array();

		$sql = "SELECT attnum, attname FROM pg_catalog.pg_attribute WHERE
			attrelid=(SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}' AND
			relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
			AND attnum IN ('" . join("','", $atts) . "')";

		$rs = $this->selectSet($sql);
		if ($rs->recordCount() != sizeof($atts)) {
			return -2;
		}
		else {
			$temp = array();
			while (!$rs->EOF) {
				$temp[$rs->fields['attnum']] = $rs->fields['attname'];
				$rs->moveNext();
			}
			return $temp;
		}
	}

	/**
	 * Get the fields for uniquely identifying a row in a table
	 * @param $table The table for which to retrieve the identifier
	 * @return An array mapping attribute number to attribute name, empty for no identifiers
	 * @return -1 error
	 */
	function getRowIdentifier($table) {
		$oldtable = $table;
		$this->clean($table);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		// Get the first primary or unique index (sorting primary keys first) that
		// is NOT a partial index.
		$sql = "SELECT indrelid, indkey FROM pg_catalog.pg_index WHERE indisunique AND
			indrelid=(SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}' AND
			relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
			AND indpred='' AND indproc='-' ORDER BY indisprimary DESC LIMIT 1";
		$rs = $this->selectSet($sql);

		// If none, check for an OID column.  Even though OIDs can be duplicated, the edit and delete row
		// functions check that they're only modiying a single row.  Otherwise, return empty array.
		if ($rs->recordCount() == 0) {
			// Check for OID column
			$temp = array();
			if ($this->hasObjectID($table)) {
				$temp = array('oid');
			}
			$this->endTransaction();
			return $temp;
		}
		// Otherwise find the names of the keys
		else {
			$attnames = $this->getAttributeNames($oldtable, explode(' ', $rs->fields['indkey']));
			if (!is_array($attnames)) {
				$this->rollbackTransaction();
				return -1;
			}
			else {
				$this->endTransaction();
				return $attnames;
			}
		}
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
			  c.relname, n.nspname, u.usename AS relowner,
			  pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
			FROM pg_catalog.pg_class c
			     LEFT JOIN pg_catalog.pg_user u ON u.usesysid = c.relowner
			     LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
			WHERE c.relkind = 'r'
				AND n.nspname = '{$this->_schema}'
			    AND c.relname = '{$table}'";

		return $this->selectSet($sql);
	}

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
						reltuples::bigint
					FROM pg_catalog.pg_class c
					LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
					WHERE c.relkind = 'r'
					AND nspname='{$this->_schema}'
					ORDER BY c.relname";
		}

		return $this->selectSet($sql);
	}

	/**
	 * Retrieve the attribute definition of a table
	 * @param $table The name of the table
	 * @param $field (optional) The name of a field to return
	 * @return All attributes in order
	 */
	function getTableAttributes($table, $field = '') {
		$this->clean($table);
		$this->clean($field);

		if ($field == '') {
			// This query is made much more complex by the addition of the 'attisserial' field.
			// The subquery to get that field checks to see if there is an internally dependent
			// sequence on the field.
			$sql = "
				SELECT
					a.attname,
					pg_catalog.format_type(a.atttypid, a.atttypmod) as type,
					a.atttypmod,
					a.attnotnull, a.atthasdef, adef.adsrc,
					a.attstattarget, a.attstorage, t.typstorage,
					(
						SELECT 1 FROM pg_catalog.pg_depend pd, pg_catalog.pg_class pc
						WHERE pd.objid=pc.oid
						AND pd.classid=pc.tableoid
						AND pd.refclassid=pc.tableoid
						AND pd.refobjid=a.attrelid
						AND pd.refobjsubid=a.attnum
						AND pd.deptype='i'
						AND pc.relkind='S'
					) IS NOT NULL AS attisserial,
					pg_catalog.col_description(a.attrelid, a.attnum) AS comment

				FROM
					pg_catalog.pg_attribute a LEFT JOIN pg_catalog.pg_attrdef adef
					ON a.attrelid=adef.adrelid
					AND a.attnum=adef.adnum
					LEFT JOIN pg_catalog.pg_type t ON a.atttypid=t.oid
				WHERE
					a.attrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
						AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE
						nspname = '{$this->_schema}'))
					AND a.attnum > 0 AND NOT a.attisdropped
				ORDER BY a.attnum";
		}
		else {
			$sql = "
				SELECT
					a.attname,
					pg_catalog.format_type(a.atttypid, a.atttypmod) as type,
					pg_catalog.format_type(a.atttypid, NULL) as base_type,
					a.atttypmod,
					a.attnotnull, a.atthasdef, adef.adsrc,
					a.attstattarget, a.attstorage, t.typstorage,
					pg_catalog.col_description(a.attrelid, a.attnum) AS comment
				FROM
					pg_catalog.pg_attribute a LEFT JOIN pg_catalog.pg_attrdef adef
					ON a.attrelid=adef.adrelid
					AND a.attnum=adef.adnum
					LEFT JOIN pg_catalog.pg_type t ON a.atttypid=t.oid
				WHERE
					a.attrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
						AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE
						nspname = '{$this->_schema}'))
					AND a.attname = '{$field}'";
		}

		return $this->selectSet($sql);
	}

	/**
	 * Sets default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to set
	 * @param $default The new default value
	 * @return 0 success
	 */
	function setColumnDefault($table, $column, $default) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" ALTER COLUMN \"{$column}\" SET DEFAULT {$default}";

		return $this->execute($sql);
	}

	/**
	 * Drops default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to drop default
	 * @return 0 success
	 */
	function dropColumnDefault($table, $column) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" ALTER COLUMN \"{$column}\" DROP DEFAULT";

		return $this->execute($sql);
	}

	/**
	 * Drops a column from a table
	 * @param $table The table from which to drop a column
	 * @param $column The column to be dropped
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropColumn($table, $column, $cascade) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" DROP COLUMN \"{$column}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Renames a column in a table
	 * @param $table The table containing the column to be renamed
	 * @param $column The column to be renamed
	 * @param $newName The new name for the column
	 * @return 0 success
	 */
	function renameColumn($table, $column, $newName) {
		$this->fieldClean($table);
		$this->fieldClean($column);
		$this->fieldClean($newName);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" RENAME COLUMN \"{$column}\" TO \"{$newName}\"";

		return $this->execute($sql);
	}

	/**
	 * Sets whether or not a column can contain NULLs
	 * @param $table The table that contains the column
	 * @param $column The column to alter
	 * @param $state True to set null, false to set not null
	 * @return 0 success
	 */
	function setColumnNull($table, $column, $state) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" ALTER COLUMN \"{$column}\" " . (($state) ? 'DROP' : 'SET') . " NOT NULL";

		return $this->execute($sql);
	}

	// Row functions

	/**
	 * Empties a table in the database
	 * @param $table The table to be emptied
	 * @return 0 success
	 */
	function emptyTable($table) {
		$this->fieldClean($table);

		$sql = "DELETE FROM \"{$this->_schema}\".\"{$table}\"";

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
		$this->fieldClean($table);
		$this->fieldClean($name);
		// @@ How the heck do you clean a definition???

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "CHECK ({$definition})";

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
		$sql = "LOCK TABLE \"{$this->_schema}\".\"{$table}\" IN ACCESS EXCLUSIVE MODE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Delete the check constraint
		$sql = "DELETE FROM pg_relcheck WHERE rcrelid=(SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
						AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE
						nspname = '{$this->_schema}')) AND rcname='{$name}'";
	   	$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Update the pg_class catalog to reflect the new number of checks
		$sql = "UPDATE pg_class SET relchecks=(SELECT COUNT(*) FROM pg_relcheck WHERE
					rcrelid=(SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
						AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE
						nspname = '{$this->_schema}')))
					WHERE relname='{$table}'";
	   	$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Otherwise, close the transaction
		return $this->endTransaction();
	}

	// Administration functions

	/**
	 * Vacuums a database
	 * @param $table The table to vacuum
 	 * @param $analyze If true, also does analyze
	 * @param $full If true, selects "full" vacuum (PostgreSQL >= 7.2)
	 * @param $freeze If true, selects aggressive "freezing" of tuples (PostgreSQL >= 7.2)
	 */
	function vacuumDB($table = '', $analyze = false, $full = false, $freeze = false) {

		$sql = "VACUUM";
		if ($full) $sql .= " FULL";
		if ($freeze) $sql .= " FREEZE";
		if ($analyze) $sql .= " ANALYZE";
		if ($table != '') {
			$this->fieldClean($table);
			$sql .= " \"{$this->_schema}\".\"{$table}\"";
		}

		return $this->execute($sql);
	}

	/**
	 * Analyze a database
	 * @note PostgreSQL 7.2 finally had an independent ANALYZE command
	 * @param $table (optional) The table to analyze
	 */
	function analyzeDB($table = '') {
		if ($table != '') {
			$this->fieldClean($table);

			$sql = "ANALYZE \"{$this->_schema}\".\"{$table}\"";
		}
		else
			$sql = "ANALYZE";

		return $this->execute($sql);
	}

	// Inheritance functions

	/**
	 * Finds the names and schemas of parent tables (in order)
	 * @param $table The table to find the parents for
	 * @return A recordset
	 */
	function getTableParents($table) {
		$this->clean($table);

		$sql = "
			SELECT
				pn.nspname, relname
			FROM
				pg_catalog.pg_class pc, pg_catalog.pg_inherits pi, pg_catalog.pg_namespace pn
			WHERE
				pc.oid=pi.inhparent
				AND pc.relnamespace=pn.oid
				AND pi.inhrelid = (SELECT oid from pg_catalog.pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname = '{$this->_schema}'))
			ORDER BY
				pi.inhseqno
		";

		return $this->selectSet($sql);
	}


	/**
	 * Finds the names and schemas of child tables
	 * @param $table The table to find the children for
	 * @return A recordset
	 */
	function getTableChildren($table) {
		$this->clean($table);

		$sql = "
			SELECT
				pn.nspname, relname
			FROM
				pg_catalog.pg_class pc, pg_catalog.pg_inherits pi, pg_catalog.pg_namespace pn
			WHERE
				pc.oid=pi.inhrelid
				AND pc.relnamespace=pn.oid
				AND pi.inhparent = (SELECT oid from pg_catalog.pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname = '{$this->_schema}'))
		";

		return $this->selectSet($sql);
	}

	 /**
	  * Protected method which alter a view
	  * SHOULDN'T BE CALLED OUTSIDE OF A TRANSACTION
	  * @param $vwrs The view recordSet returned by getView()
	  * @param $name The new name for the view
	  * @param $owner The new owner for the view
	  * @param $comment The comment on the view
	  * @return 0 success
	  * @return -3 rename error
	  * @return -4 comment error
	  * @return -5 owner error
	  * @return -6 schema error
	  */
	 /*protected*/
    function _alterView($vwrs, $name, $owner, $schema, $comment) {

		$view = $vwrs->fields['relname'];

		// Comment
		$this->clean($comment);
		if ($this->setComment('VIEW', $view, '', $comment) != 0)
			return -4;

		// Owner
		$this->fieldClean($owner);
		if ((!empty($owner)) && ($vwrs->fields['relowner'] != $owner)) {
			// If owner has been changed, then do the alteration.  We are
			// careful to avoid this generally as changing owner is a
			// superuser only function.
			$sql = "ALTER TABLE \"{$this->_schema}\".\"{$view}\" OWNER TO \"{$owner}\"";
			$status = $this->execute($sql);
			if ($status != 0) return -5;
		}

		// Rename (only if name has changed)
		$this->fieldClean($name);
		if ($name != $view) {
			if ($this->renameView($view, $name) != 0)
				return -3;
		}

		return 0;
	}

	/**
	 * Returns a list of all views in the database
	 * @return All views
	 */
	function getViews() {
		$sql = "SELECT c.relname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner,
                          pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
                        FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON (n.oid = c.relnamespace)
                        WHERE (n.nspname='{$this->_schema}') AND (c.relkind = 'v'::\"char\")  ORDER BY relname";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function getView($view) {
		$this->clean($view);

		$sql = "SELECT c.relname, n.nspname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner,
                          pg_catalog.pg_get_viewdef(c.oid) AS vwdefinition, pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
                        FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON (n.oid = c.relnamespace)
                        WHERE (c.relname = '$view')
                        AND n.nspname='{$this->_schema}'";

		return $this->selectSet($sql);
	}

	/**
	 * Updates a view.
	 * @param $viewname The name fo the view to update
	 * @param $definition The new definition for the view
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop view error
	 * @return -3 create view error
	 */
	function setView($viewname, $definition,$comment) {
		return $this->createView($viewname, $definition, true, $comment);
	}

	/**
	 * Rename a view
	 * @param $view The current view's name
	 * @param $name The new view's name
	 * @return -1 Failed
	 * @return 0 success
	 */
	function renameView($view, $name) {
		$this->fieldClean($name);
		$this->fieldClean($view);
		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$view}\" RENAME TO \"{$name}\"";
		if ($this->execute($sql) != 0)
			return -1;
		return 0;
	}


	// Sequence functions

	/**
	 * Resets a given sequence to min value of sequence
	 * @param $sequence Sequence name
	 * @return 0 success
	 * @return -1 sequence not found
	 */
	function resetSequence($sequence) {
		// Get the minimum value of the sequence
		$seq = $this->getSequence($sequence);
		if ($seq->recordCount() != 1) return -1;
		$minvalue = $seq->fields['min_value'];

		/* This double-cleaning is deliberate */
		$this->fieldClean($sequence);
		$this->clean($sequence);

		$sql = "SELECT pg_catalog.SETVAL('\"{$this->_schema}\".\"{$sequence}\"', {$minvalue})";

		return $this->execute($sql);
	}

	/**
	 * Execute nextval on a given sequence
	 * @param $sequence Sequence name
	 * @return 0 success
	 * @return -1 sequence not found
	 */
	function nextvalSequence($sequence) {
		/* This double-cleaning is deliberate */
		$this->fieldClean($sequence);
		$this->clean($sequence);

		$sql = "SELECT pg_catalog.NEXTVAL('\"{$this->_schema}\".\"{$sequence}\"')";

		return $this->execute($sql);
	}

	/**
	 * Execute setval on a given sequence
	 * @param $sequence Sequence name
	 * @param $nextvalue The next value
	 * @return 0 success
	 * @return -1 sequence not found
	 */
	function setvalSequence($sequence, $nextvalue) {
		/* This double-cleaning is deliberate */
		$this->fieldClean($sequence);
		$this->clean($sequence);
		$this->clean($nextvalue);

		$sql = "SELECT pg_catalog.SETVAL('\"{$this->_schema}\".\"{$sequence}\"', '{$nextvalue}')";

		return $this->execute($sql);
	}

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
			$sql = "SELECT c.relname AS seqname, u.usename AS seqowner, pg_catalog.obj_description(c.oid, 'pg_class') AS seqcomment
				FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
				AND c.relkind = 'S' AND n.nspname='{$this->_schema}' ORDER BY seqname";
		}

		return $this->selectSet( $sql );
	}

	/**
	 * Returns properties of a single sequence
	 * @param $sequence Sequence name
	 * @return A recordset
	 */
	function getSequence($sequence) {
		$this->fieldClean($sequence);

		$sql = "SELECT c.relname AS seqname, s.*,
					pg_catalog.obj_description(s.tableoid, 'pg_class') AS seqcomment,
					u.usename AS seqowner, n.nspname
				FROM \"{$sequence}\" AS s, pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
				WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
					AND c.relname = '{$sequence}' AND c.relkind = 'S' AND n.nspname='{$this->_schema}'
					AND n.oid = c.relnamespace";

		return $this->selectSet( $sql );
	}

	/**
	 * Rename a sequence
	 * @param $sequence The sequence name
	 * @param $name The new name for the sequence
	 * @return 0 success
	 */
	function renameSequence($sequence, $name) {
		$this->fieldClean($name);
		$this->fieldClean($sequence);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$sequence}\" RENAME TO \"{$name}\"";
		return $this->execute($sql);
	}

	/**
	 * Protected method which alter a sequence
	 * SHOULDN'T BE CALLED OUTSIDE OF A TRANSACTION
	 * @param $seqrs The sequence recordSet returned by getSequence()
	 * @param $name The new name for the sequence
	 * @param $comment The comment on the sequence
	 * @param $owner The new owner for the sequence
	 * @param $schema The new schema for the sequence
	 * @param $increment The increment
	 * @param $minvalue The min value
	 * @param $maxvalue The max value
	 * @param $startvalue The starting value
	 * @param $cachevalue The cache value
	 * @param $cycledvalue True if cycled, false otherwise
	 * @return 0 success
	 * @return -3 rename error
	 * @return -4 comment error
	 * @return -5 owner error
	 * @return -7 schema error
	 */
	/*protected*/
	function _alterSequence($seqrs, $name, $comment, $owner, $schema, $increment,
				$minvalue, $maxvalue, $startvalue, $cachevalue, $cycledvalue) {

		$sequence = $seqrs->fields['seqname'];
		$this->fieldClean($name);
		$this->clean($comment);
		$this->fieldClean($owner);

		// Comment
		$status = $this->setComment('SEQUENCE', $sequence, '', $comment);
		if ($status != 0)
			return -4;

		// Rename (only if name has changed)
		if ($name != $sequence) {
			$status = $this->renameSequence($sequence, $name);
			if ($status != 0)
				return -3;
			$sequence = $name;
		}

		// Owner
		if (!empty($owner)) {

			// If owner has been changed, then do the alteration.  We are
			// careful to avoid this generally as changing owner is a
			// superuser only function.
			if ($seqrs->fields['seqowner'] != $owner) {
				$sql = "ALTER TABLE \"{$sequence}\" OWNER TO \"{$owner}\"";
				$status = $this->execute($sql);
				if ($status != 0)
					return -5;
			}
		}

		return 0;
	}

	/**
	 * Drops a given sequence
	 * @param $sequence Sequence name
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropSequence($sequence, $cascade) {
		$this->fieldClean($sequence);

		$sql = "DROP SEQUENCE \"{$this->_schema}\".\"{$sequence}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @param $unique Only get unique/pk indexes
	 * @return A recordset
	 */
	function getIndexes($table = '', $unique = false) {
		$this->clean($table);

		$sql = "SELECT c2.relname AS indname, i.indisprimary, i.indisunique, i.indisclustered,
			pg_catalog.pg_get_indexdef(i.indexrelid) AS inddef,
			pg_catalog.obj_description(c.oid, 'pg_index') AS idxcomment
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND pg_catalog.pg_table_is_visible(c.oid)
			AND c.oid = i.indrelid AND i.indexrelid = c2.oid
		";
		if ($unique) $sql .= " AND i.indisunique ";
		$sql .= " ORDER BY c2.relname";

		return $this->selectSet($sql);
	}

	/**
	 * Removes an index from the database
	 * @param $index The index to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropIndex($index, $cascade) {
		$this->fieldClean($index);

		$sql = "DROP INDEX \"{$this->_schema}\".\"{$index}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Clusters an index
	 * @param $index The name of the index
	 * @param $table The table the index is on
	 * @return 0 success
	 */
	function clusterIndex($index, $table) {
		$this->fieldClean($index);
		$this->fieldClean($table);

		// We don't bother with a transaction here, as there's no point rolling
		// back an expensive cluster if a cheap analyze fails for whatever reason
		$sql = "CLUSTER \"{$index}\" ON \"{$this->_schema}\".\"{$table}\"";

		return $this->execute($sql);
	}

	/**
	 * Rebuild indexes
	 * @param $type 'DATABASE' or 'TABLE' or 'INDEX'
	 * @param $name The name of the specific database, table, or index to be reindexed
	 * @param $force If true, recreates indexes forcedly in PostgreSQL 7.0-7.1, forces rebuild of system indexes in 7.2-7.3, ignored in >=7.4
	 */
	function reindex($type, $name, $force = false) {
		$this->fieldClean($name);
		switch($type) {
			case 'DATABASE':
				$sql = "REINDEX {$type} \"{$name}\"";
				if ($force) $sql .= ' FORCE';
				break;
			case 'TABLE':
			case 'INDEX':
				$sql = "REINDEX {$type} \"{$this->_schema}\".\"{$name}\"";
				if ($force) $sql .= ' FORCE';
				break;
			default:
				return -1;
		}

		return $this->execute($sql);
	}

	/**
	 * Grabs a single trigger
	 * @param $table The name of a table whose triggers to retrieve
	 * @param $trigger The name of the trigger to retrieve
	 * @return A recordset
	 */
	function getTrigger($table, $trigger) {
		$this->clean($table);
		$this->clean($trigger);

		$sql = "SELECT * FROM pg_catalog.pg_trigger t, pg_catalog.pg_class c
					WHERE t.tgrelid=c.oid
					AND c.relname='{$table}'
					AND t.tgname='{$trigger}'
					AND c.relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')";

		return $this->selectSet($sql);
	}

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function getTriggers($table = '') {
		$this->clean($table);

		$sql = "SELECT t.tgname, t.tgisconstraint, t.tgdeferrable, t.tginitdeferred, t.tgtype,
			t.tgargs, t.tgnargs, t.tgconstrrelid,
			(SELECT relname FROM pg_catalog.pg_class c2 WHERE c2.oid=t.tgconstrrelid) AS tgconstrrelname,
			p.proname AS tgfname, c.relname, NULL AS tgdef,
			p.proname || ' (' || pg_catalog.oidvectortypes(p.proargtypes) || ')' AS proproto,
			ns.nspname AS pronamespace
			FROM pg_catalog.pg_namespace ns,
				pg_catalog.pg_trigger t LEFT JOIN pg_catalog.pg_proc p
					ON t.tgfoid=p.oid, pg_catalog.pg_class c
			WHERE t.tgrelid=c.oid
				AND c.relname='{$table}'
				AND c.relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')
				AND (NOT tgisconstraint OR NOT EXISTS
					(SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
						ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
					WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))
				AND p.pronamespace = ns.oid";

		return $this->selectSet($sql);
	}

	/**
	 * Creates a trigger
	 * @param $tgname The name of the trigger to create
	 * @param $table The name of the table
	 * @param $tgproc The function to execute
	 * @param $tgtime BEFORE or AFTER
	 * @param $tgevent Event
	 * @param $tgargs The function arguments
	 * @return 0 success
	 */
	function createTrigger($tgname, $table, $tgproc, $tgtime, $tgevent, $tgfrequency, $tgargs) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);
		$this->fieldClean($tgproc);

		/* No Statement Level Triggers in PostgreSQL (by now) */
		$sql = "CREATE TRIGGER \"{$tgname}\" {$tgtime}
				{$tgevent} ON \"{$this->_schema}\".\"{$table}\"
				FOR EACH {$tgfrequency} EXECUTE PROCEDURE \"{$tgproc}\"({$tgargs})";

		return $this->execute($sql);
	}

	/**
	 * Drops a trigger
	 * @param $tgname The name of the trigger to drop
	 * @param $table The table from which to drop the trigger
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropTrigger($tgname, $table, $cascade) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);

		$sql = "DROP TRIGGER \"{$tgname}\" ON \"{$this->_schema}\".\"{$table}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Alters a trigger
	 * @param $table The name of the table containing the trigger
	 * @param $trigger The name of the trigger to alter
	 * @param $name The new name for the trigger
	 * @return 0 success
	 */
	function alterTrigger($table, $trigger, $name) {
		$this->fieldClean($table);
		$this->fieldClean($trigger);
		$this->fieldClean($name);

		$sql = "ALTER TRIGGER \"{$trigger}\" ON \"{$this->_schema}\".\"{$table}\" RENAME TO \"{$name}\"";

		return $this->execute($sql);
	}

	// Function functions

	/**
	 * Returns a list of all functions in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @param $type If not null, will find all functions with return value = type
	 *
  	 * @return All functions
	 */
	function getFunctions($all = false, $type = null) {
		if ($all) {
			$where = 'pg_catalog.pg_function_is_visible(p.oid)';
			$distinct = 'DISTINCT ON (p.proname)';

			if ($type) {
				$where .= " AND p.prorettype = (select oid from pg_catalog.pg_type p where p.typname = 'trigger') ";
			}
		}
		else {
			$where = "n.nspname = '{$this->_schema}'";

			$distinct = '';
		}

		$sql = "SELECT
				{$distinct}
				p.oid AS prooid,
				p.proname,
				p.proretset,
				pg_catalog.format_type(p.prorettype, NULL) AS proresult,
				pg_catalog.oidvectortypes(p.proargtypes) AS proarguments,
				pl.lanname AS prolanguage,
				pg_catalog.obj_description(p.oid, 'pg_proc') AS procomment,
				p.proname || ' (' || pg_catalog.oidvectortypes(p.proargtypes) || ')' AS proproto,
				CASE WHEN p.proretset THEN 'setof ' ELSE '' END || pg_catalog.format_type(p.prorettype, NULL) AS proreturns,
				u.usename AS proowner
			FROM pg_catalog.pg_proc p
				INNER JOIN pg_catalog.pg_namespace n ON n.oid = p.pronamespace
				INNER JOIN pg_catalog.pg_language pl ON pl.oid = p.prolang
				LEFT JOIN pg_catalog.pg_user u ON u.usesysid = p.proowner
			WHERE NOT p.proisagg
				AND {$where}
			ORDER BY p.proname, proresult
			";

		return $this->selectSet($sql);
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

	/**
	 * Returns an array containing a function's properties
	 * @param $f The array of data for the function
	 * @return An array containing the properties
	 */
	function getFunctionProperties($f) {
		$temp = array();

		// Volatility
		if ($f['provolatile'] == 'v')
			$temp[] = 'VOLATILE';
		elseif ($f['provolatile'] == 'i')
			$temp[] = 'IMMUTABLE';
		elseif ($f['provolatile'] == 's')
			$temp[] = 'STABLE';
		else
			return -1;

		// Null handling
		$f['proisstrict'] = $this->phpBool($f['proisstrict']);
		if ($f['proisstrict'])
			$temp[] = 'RETURNS NULL ON NULL INPUT';
		else
			$temp[] = 'CALLED ON NULL INPUT';

		// Security
		$f['prosecdef'] = $this->phpBool($f['prosecdef']);
		if ($f['prosecdef'])
			$temp[] = 'SECURITY DEFINER';
		else
			$temp[] = 'SECURITY INVOKER';

		return $temp;
	}

	/**
	 * Returns a list of all functions that can be used in triggers
	 */
	function getTriggerFunctions() {
		return $this->getFunctions(true, 'trigger');
	}

	/**
	 * Creates a new function.
	 * @param $funcname The name of the function to create
	 * @param $args A comma separated string of types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $setof True if it returns a set, false otherwise
	 * @param $replace (optional) True if OR REPLACE, false for normal
	 * @return 0 success
	 */
	function createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, $cost, $rows, $replace = false) {
		$this->fieldClean($funcname);
		$this->clean($args);
		$this->clean($language);
		$this->arrayClean($flags);

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " FUNCTION \"{$this->_schema}\".\"{$funcname}\" (";

		if ($args != '')
			$sql .= $args;

		// For some reason, the returns field cannot have quotes...
		$sql .= ") RETURNS ";
		if ($setof) $sql .= "SETOF ";
		$sql .= "{$returns} AS ";

		if (is_array($definition)) {
			$this->arrayClean($definition);
			$sql .= "'" . $definition[0] . "'";
			if ($definition[1]) {
				$sql .= ",'" . $definition[1] . "'";
			}
		} else {
			$this->clean($definition);
			$sql .= "'" . $definition . "'";
		}

		$sql .= " LANGUAGE \"{$language}\"";

		// Add flags
		foreach ($flags as  $v) {
			// Skip default flags
			if ($v == '') continue;
			else $sql .= "\n{$v}";
		}

		return $this->execute($sql);
	}

	/**
	 * Drops a function.
	 * @param $function_oid The OID of the function to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropFunction($function_oid, $cascade) {
		// Function comes in with $object as function OID
		$fn = $this->getFunction($function_oid);
		$this->fieldClean($fn->fields['proname']);

		$sql = "DROP FUNCTION \"{$this->_schema}\".\"{$fn->fields['proname']}\"({$fn->fields['proarguments']})";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @param $tabletypes If true, will include table types
	 * @param $domains If true, will include domains
	 * @return A recordet
	 */
	function getTypes($all = false, $tabletypes = false, $domains = false) {
		if ($all)
			$where = '1 = 1';
		else
			$where = "n.nspname = '{$this->_schema}'";
		// Never show system table types
		$where2 = "AND c.relnamespace NOT IN (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname LIKE 'pg@_%' ESCAPE '@')";

		// Create type filter
		$tqry = "'c'";
		if ($tabletypes)
			$tqry .= ", 'r', 'v'";

		// Create domain filter
		if (!$domains)
			$where .= " AND t.typtype != 'd'";

		$sql = "SELECT
				t.typname AS basename,
				pg_catalog.format_type(t.oid, NULL) AS typname,
				pu.usename AS typowner,
				t.typtype,
				pg_catalog.obj_description(t.oid, 'pg_type') AS typcomment
			FROM (pg_catalog.pg_type t
				LEFT JOIN pg_catalog.pg_namespace n ON n.oid = t.typnamespace)
				LEFT JOIN pg_catalog.pg_user pu ON t.typowner = pu.usesysid
			WHERE (t.typrelid = 0 OR (SELECT c.relkind IN ({$tqry}) FROM pg_catalog.pg_class c WHERE c.oid = t.typrelid {$where2}))
			AND t.typname !~ '^_'
			AND {$where}
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	/**
	 * Drops a type.
	 * @param $typname The name of the type to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropType($typname, $cascade) {
		$this->fieldClean($typname);

		$sql = "DROP TYPE \"{$this->_schema}\".\"{$typname}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Creates a new composite type in the database
	 * @param $name The name of the type
	 * @param $fields The number of fields
	 * @param $field An array of field names
	 * @param $type An array of field types
	 * @param $array An array of '' or '[]' for each type if it's an array or not
	 * @param $length An array of field lengths
	 * @param $colcomment An array of comments
	 * @param $typcomment Type comment
	 * @return 0 success
	 * @return -1 no fields supplied
	 */
	function createCompositeType($name, $fields, $field, $type, $array, $length, $colcomment, $typcomment) {
		$this->fieldClean($name);
		$this->clean($typcomment);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$found = false;
		$first = true;
		$comment_sql = ''; // Accumulate comments for the columns
		$sql = "CREATE TYPE \"{$this->_schema}\".\"{$name}\" AS (";
		for ($i = 0; $i < $fields; $i++) {
			$this->fieldClean($field[$i]);
			$this->clean($type[$i]);
			$this->clean($length[$i]);
			$this->clean($colcomment[$i]);

			// Skip blank columns - for user convenience
			if ($field[$i] == '' || $type[$i] == '') continue;
			// If not the first column, add a comma
			if (!$first) $sql .= ", ";
			else $first = false;

			switch ($type[$i]) {
				// Have to account for weird placing of length for with/without
				// time zone types
				case 'timestamp with time zone':
				case 'timestamp without time zone':
					$qual = substr($type[$i], 9);
					$sql .= "\"{$field[$i]}\" timestamp";
					if ($length[$i] != '') $sql .= "({$length[$i]})";
					$sql .= $qual;
					break;
				case 'time with time zone':
				case 'time without time zone':
					$qual = substr($type[$i], 4);
					$sql .= "\"{$field[$i]}\" time";
					if ($length[$i] != '') $sql .= "({$length[$i]})";
					$sql .= $qual;
					break;
				default:
					$sql .= "\"{$field[$i]}\" {$type[$i]}";
					if ($length[$i] != '') $sql .= "({$length[$i]})";
			}
			// Add array qualifier if necessary
			if ($array[$i] == '[]') $sql .= '[]';

			if ($colcomment[$i] != '') $comment_sql .= "COMMENT ON COLUMN \"{$this->_schema}\".\"{$name}\".\"{$field[$i]}\" IS '{$colcomment[$i]}';\n";

			$found = true;
		}

		if (!$found) return -1;

		$sql .= ")";

		$status = $this->execute($sql);
		if ($status) {
			$this->rollbackTransaction();
			return -1;
		}

		if ($typcomment != '') {
			$status = $this->setComment('TYPE', $name, '', $typcomment, true);
			if ($status) {
				$this->rollbackTransaction();
				return -1;
			}
		}

		if ($comment_sql != '') {
			$status = $this->execute($comment_sql);
			if ($status) {
				$this->rollbackTransaction();
				return -1;
			}
		}
		return $this->endTransaction();

	}

	// Rule functions

	/**
	 * Removes a rule from a table OR view
	 * @param $rule The rule to drop
	 * @param $relation The relation from which to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropRule($rule, $relation, $cascade) {
		$this->fieldClean($rule);
		$this->fieldClean($relation);

		$sql = "DROP RULE \"{$rule}\" ON \"{$this->_schema}\".\"{$relation}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Returns a list of all rules on a table OR view
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function getRules($table) {
		$this->clean($table);

		$sql = "SELECT
				*
			FROM
				pg_catalog.pg_rules
			WHERE
				schemaname='{$this->_schema}'
				AND tablename='{$table}'
			ORDER BY
				rulename
		";

		return $this->selectSet($sql);
	}

	/**
	 * Edits a rule on a table OR view
	 * @param $name The name of the new rule
	 * @param $event SELECT, INSERT, UPDATE or DELETE
	 * @param $table Table on which to create the rule
	 * @param $where When to execute the rule, '' indicates always
	 * @param $instead True if an INSTEAD rule, false otherwise
	 * @param $type NOTHING for a do nothing rule, SOMETHING to use given action
	 * @param $action The action to take
	 * @return 0 success
	 * @return -1 invalid event
	 */
	function setRule($name, $event, $table, $where, $instead, $type, $action) {
		return $this->createRule($name, $event, $table, $where, $instead, $type, $action, true);
	}

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function getConstraints($table) {
		$this->clean($table);

		/* This query finds all foreign key and check constraints in the pg_constraint
		 * table, and unions that with all indexes that are the basis for unique or
		 * primary key constraints. */
		$sql = "
			SELECT conname, consrc, contype, indkey, indisclustered FROM (
				SELECT
					conname,
					CASE WHEN contype='f' THEN
						pg_catalog.pg_get_constraintdef(oid)
					ELSE
						'CHECK (' || consrc || ')'
					END AS consrc,
					contype,
					conrelid AS relid,
					NULL AS indkey,
					FALSE AS indisclustered
				FROM
					pg_catalog.pg_constraint
				WHERE
					contype IN ('f', 'c')
				UNION ALL
				SELECT
					pc.relname,
					NULL,
					CASE WHEN indisprimary THEN
						'p'
					ELSE
						'u'
					END,
					pi.indrelid,
					indkey,
					pi.indisclustered
				FROM
					pg_catalog.pg_class pc,
					pg_catalog.pg_index pi
				WHERE
					pc.oid=pi.indexrelid
					AND EXISTS (
						SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
						ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
						WHERE d.classid = pc.tableoid AND d.objid = pc.oid AND d.deptype = 'i' AND c.contype IN ('u', 'p')
				)
			) AS sub
			WHERE relid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace
					WHERE nspname='{$this->_schema}'))
			ORDER BY
				1
		";

		return $this->selectSet($sql);
	}

	/**
	 * Returns a list of all constraints on a table,
	 * including constraint name, definition, related col and referenced namespace,
	 * table and col if needed
	 * @param $table the table where we are looking for fk
	 * @return a recordset
	 */
	function getConstraintsWithFields($table) {
		global $data;

		$data->clean($table);

		// get the max number of col used in a constraint for the table
    	$sql = "SELECT DISTINCT
			max(SUBSTRING(array_dims(c.conkey) FROM  '^\\\[.*:(.*)\\\]$')) as nb
    	FROM
	      pg_catalog.pg_constraint AS c
    	  JOIN pg_catalog.pg_class AS r ON (c.conrelid = r.oid)
	      JOIN pg_catalog.pg_namespace AS ns ON r.relnamespace=ns.oid
    	WHERE
      		r.relname = '$table' AND ns.nspname='". $this->_schema ."'";

		$rs = $this->selectSet($sql);

	    if ($rs->EOF) $max_col_cstr = 0;
		else $max_col_cstr = $rs->fields['nb'];

		// get the max number of col used in a constraint for the table
    	$sql = "SELECT i.indkey
		FROM
		  pg_catalog.pg_index AS i
		  JOIN pg_catalog.pg_class AS r ON (i.indrelid = r.oid)
		  JOIN pg_catalog.pg_namespace AS ns ON r.relnamespace=ns.oid
    	WHERE
      		r.relname = '$table' AND ns.nspname='". $this->_schema ."'";

		/* parse our output to find the highest dimension of index keys since
		 * i.indkey is stored in an int2vector */
		$max_col_ind = 0;
  		$rs = $this->selectSet($sql);
  		while (!$rs->EOF) {
  			$tmp = count(explode(' ', $rs->fields['indkey']));
  			$max_col_ind = $tmp > $max_col_ind ? $tmp : $max_col_ind;
  			$rs->MoveNext();
  		}

		$sql = "
		SELECT contype, conname, consrc, ns1.nspname as p_schema, sub.relname as p_table,
		f_schema, f_table, p_field, f_field, indkey
		FROM (
		  SELECT
			contype, conname,
			CASE WHEN contype='f' THEN
			  pg_catalog.pg_get_constraintdef(c.oid)
			ELSE
			  'CHECK (' || consrc || ')'
			END AS consrc, r1.relname,
			f1.attname as p_field, ns2.nspname as f_schema, r2.relname as f_table,
			conrelid, r1.relnamespace, f2.attname as f_field, NULL AS indkey
		  FROM
			pg_catalog.pg_constraint AS c
			JOIN pg_catalog.pg_class AS r1 ON (c.conrelid=r1.oid)
			JOIN pg_catalog.pg_attribute AS f1 ON ((f1.attrelid=c.conrelid) AND (f1.attnum=c.conkey[1]";
		for ($i = 2; $i <= $max_col_cstr; $i++) {
			$sql.= " OR f1.attnum=c.conkey[$i]";
		}
		$sql .= "))
			LEFT JOIN (
			  pg_catalog.pg_class AS r2 JOIN pg_catalog.pg_namespace AS ns2 ON (r2.relnamespace=ns2.oid)
			) ON (c.confrelid=r2.oid)
			LEFT JOIN pg_catalog.pg_attribute AS f2 ON
			  ((f2.attrelid=r2.oid) AND ((c.confkey[1]=f2.attnum AND c.conkey[1]=f1.attnum)";
		for ($i = 2; $i <= $max_col_cstr; $i++)
			$sql.= "OR (c.confkey[$i]=f2.attnum AND c.conkey[$i]=f1.attnum)";
		$sql .= "))
		  WHERE
			contype IN ('f', 'c')
		  UNION ALL
		  SELECT
			CASE WHEN indisprimary THEN
			  'p'
			ELSE
			  'u'
			END as contype,
			pc.relname as conname, NULL as consrc, r2.relname, f1.attname as p_field,
			NULL as f_schema, NULL as f_table, indrelid as conrelid, pc.relnamespace,
			NULL as f_field, indkey
		  FROM
			pg_catalog.pg_class pc, pg_catalog.pg_index pi
			JOIN pg_catalog.pg_attribute AS f1 ON ((f1.attrelid=pi.indrelid) AND (f1.attnum=pi.indkey[0]";
			for ($i = 1; $i <= $max_col_ind; $i++) {
				$sql.= " OR f1.attnum=pi.indkey[$i]";
			}
			$sql .= "))
			JOIN pg_catalog.pg_class r2 ON (pi.indrelid=r2.oid)
		  WHERE
			pc.oid=pi.indexrelid
			AND EXISTS (
			  SELECT 1 FROM pg_catalog.pg_depend AS d JOIN pg_catalog.pg_constraint AS c
				ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
			  WHERE d.classid = pc.tableoid AND d.objid = pc.oid AND d.deptype = 'i' AND c.contype IN ('u', 'p')
			)
		) AS sub
		  JOIN pg_catalog.pg_namespace AS ns1 ON sub.relnamespace=ns1.oid
		WHERE conrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
		  AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace
			WHERE nspname='{$this->_schema}'))
		ORDER BY 1
		";

		return $this->selectSet($sql);
	}

	/**
	 * A function for getting all columns linked by foreign keys given a group of tables
	 * @param $tables multi dimensional assoc array that holds schema and table name
	 * @return A recordset of linked tables and columns
	 * @return -1 $tables isn't an array
	 */
	function getLinkingKeys($tables) {
		if (!is_array($tables)) return -1;


		$tables_list = "'{$tables[0]['tablename']}'";
		$schema_list = "'{$tables[0]['schemaname']}'";
		$schema_tables_list = "'{$tables[0]['schemaname']}.{$tables[0]['tablename']}'";
		for ($i = 1; $i < sizeof($tables); $i++) {
			$tables_list .= ", '{$tables[$i]['tablename']}'";
			$schema_list .= ", '{$tables[$i]['schemaname']}'";
			$schema_tables_list .= ", '{$tables[$i]['schemaname']}.{$tables[$i]['tablename']}'";
		}
		$maxDimension = 1;

		$sql = "
			SELECT DISTINCT
				array_dims(pc.conkey) AS arr_dim,
				pgc1.relname AS p_table
			FROM
				pg_catalog.pg_constraint AS pc,
				pg_catalog.pg_class AS pgc1
			WHERE
				pc.contype = 'f'
				AND (pc.conrelid = pgc1.relfilenode OR pc.confrelid = pgc1.relfilenode)
				AND pgc1.relname IN ($tables_list)
			";

		//parse our output to find the highest dimension of foreign keys since pc.conkey is stored in an array
		$rs = $this->selectSet($sql);
		while (!$rs->EOF) {
			$arrData = explode(':', $rs->fields['arr_dim']);
			$tmpDimension = intval(substr($arrData[1], 0, strlen($arrData[1] - 1)));
			$maxDimension = $tmpDimension > $maxDimension ? $tmpDimension : $maxDimension;
			$rs->MoveNext();
		}

		//we know the highest index for foreign keys that conkey goes up to, expand for us in an IN query
		$cons_str = '( (pfield.attnum = conkey[1] AND cfield.attnum = confkey[1]) ';
		for ($i = 2; $i <= $maxDimension; $i++) {
			$cons_str .= "OR (pfield.attnum = conkey[{$i}] AND cfield.attnum = confkey[{$i}]) ";
		}
		$cons_str .= ') ';

		$sql = "
			SELECT
				pgc1.relname AS p_table,
				pgc2.relname AS f_table,
				pfield.attname AS p_field,
				cfield.attname AS f_field,
				pgns1.nspname AS p_schema,
				pgns2.nspname AS f_schema
			FROM
				pg_catalog.pg_constraint AS pc,
				pg_catalog.pg_class AS pgc1,
				pg_catalog.pg_class AS pgc2,
				pg_catalog.pg_attribute AS pfield,
				pg_catalog.pg_attribute AS cfield,
				(SELECT oid AS ns_id, nspname FROM pg_catalog.pg_namespace WHERE nspname IN ($schema_list) ) AS pgns1,
 				(SELECT oid AS ns_id, nspname FROM pg_catalog.pg_namespace WHERE nspname IN ($schema_list) ) AS pgns2
			WHERE
				pc.contype = 'f'
				AND pgc1.relnamespace = pgns1.ns_id
 				AND pgc2.relnamespace = pgns2.ns_id
				AND pc.conrelid = pgc1.relfilenode
				AND pc.confrelid = pgc2.relfilenode
				AND pfield.attrelid = pc.conrelid
				AND cfield.attrelid = pc.confrelid
				AND $cons_str
				AND pgns1.nspname || '.' || pgc1.relname IN ($schema_tables_list)
				AND pgns2.nspname || '.' || pgc2.relname IN ($schema_tables_list)
		";
		return $this->selectSet($sql);
	 }

	/**
	 * Removes a constraint from a relation
	 * @param $constraint The constraint to drop
	 * @param $relation The relation from which to drop
	 * @param $type The type of constraint (c, f, u or p)
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropConstraint($constraint, $relation, $type, $cascade) {
		$this->fieldClean($constraint);
		$this->fieldClean($relation);

		$sql = "ALTER TABLE \"{$this->_schema}\".\"{$relation}\" DROP CONSTRAINT \"{$constraint}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Finds the foreign keys that refer to the specified table
	 * @param $table The table to find referrers for
	 * @return A recordset
	 */
	function getReferrers($table) {
		$this->clean($table);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$sql = "
			SELECT
				pn.nspname,
				pl.relname,
				pc.conname,
				pg_catalog.pg_get_constraintdef(pc.oid) AS consrc
			FROM
				pg_catalog.pg_constraint pc,
				pg_catalog.pg_namespace pn,
				pg_catalog.pg_class pl
			WHERE
				pc.connamespace = pn.oid
				AND pc.conrelid = pl.oid
				AND pc.contype = 'f'
				AND confrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace
					WHERE nspname='{$this->_schema}'))
			ORDER BY 1,2,3
		";

		return $this->selectSet($sql);
	}

	// Privilege functions

	/**
	 * Grabs an array of users and their privileges for an object,
	 * given its type.
	 * @param $object The name of the object whose privileges are to be retrieved
	 * @param $type The type of the object (eg. database, schema, relation, function or language)
	 * @return Privileges array
	 * @return -1 invalid type
	 * @return -2 object not found
	 * @return -3 unknown privilege type
	 */
	function getPrivileges($object, $type) {
		$this->clean($object);

		switch ($type) {
			case 'table':
			case 'view':
			case 'sequence':
				$sql = "SELECT relacl AS acl FROM pg_catalog.pg_class WHERE relname='{$object}'
						AND relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')";
				break;
			case 'database':
				$sql = "SELECT datacl AS acl FROM pg_catalog.pg_database WHERE datname='{$object}'";
				break;
			case 'function':
				// Since we fetch functions by oid, they are already constrained to
				// the current schema.
				$sql = "SELECT proacl AS acl FROM pg_catalog.pg_proc WHERE oid='{$object}'";
				break;
			case 'language':
				$sql = "SELECT lanacl AS acl FROM pg_catalog.pg_language WHERE lanname='{$object}'";
				break;
			case 'schema':
				$sql = "SELECT nspacl AS acl FROM pg_catalog.pg_namespace WHERE nspname='{$object}'";
				break;
			case 'tablespace':
				$sql = "SELECT spcacl AS acl FROM pg_catalog.pg_tablespace WHERE spcname='{$object}'";
				break;
			default:
				return -1;
		}

		// Fetch the ACL for object
		$acl = $this->selectField($sql, 'acl');
		if ($acl == -1) return -2;
		elseif ($acl == '' || $acl == null) return array();
		else return $this->_parseACL($acl);
	}

	// Domain functions

	/**
	 * Gets all information for a single domain
	 * @param $domain The name of the domain to fetch
	 * @return A recordset
	 */
	function getDomain($domain) {
		$this->clean($domain);

		$sql = "
			SELECT
				t.typname AS domname,
				pg_catalog.format_type(t.typbasetype, t.typtypmod) AS domtype,
				t.typnotnull AS domnotnull,
				t.typdefault AS domdef,
				pg_catalog.pg_get_userbyid(t.typowner) AS domowner,
				pg_catalog.obj_description(t.oid, 'pg_type') AS domcomment
			FROM
				pg_catalog.pg_type t
			WHERE
				t.typtype = 'd'
				AND t.typname = '{$domain}'
				AND t.typnamespace = (SELECT oid FROM pg_catalog.pg_namespace
					WHERE nspname = '{$this->_schema}')";

		return $this->selectSet($sql);
	}

	/**
	 * Return all domains in current schema.  Excludes domain constraints.
	 * @return All tables, sorted alphabetically
	 */
	function getDomains() {
		$sql = "
			SELECT
				t.typname AS domname,
				pg_catalog.format_type(t.typbasetype, t.typtypmod) AS domtype,
				t.typnotnull AS domnotnull,
				t.typdefault AS domdef,
				pg_catalog.pg_get_userbyid(t.typowner) AS domowner,
				pg_catalog.obj_description(t.oid, 'pg_type') AS domcomment
			FROM
				pg_catalog.pg_type t
			WHERE
				t.typtype = 'd'
				AND t.typnamespace = (SELECT oid FROM pg_catalog.pg_namespace
					WHERE nspname='{$this->_schema}')
			ORDER BY t.typname";

		return $this->selectSet($sql);
	}

	/**
	 * Creates a domain
	 * @param $domain The name of the domain to create
	 * @param $type The base type for the domain
	 * @param $length Optional type length
	 * @param $array True for array type, false otherwise
	 * @param $notnull True for NOT NULL, false otherwise
	 * @param $default Default value for domain
	 * @param $check A CHECK constraint if there is one
	 * @return 0 success
	 */
	function createDomain($domain, $type, $length, $array, $notnull, $default, $check) {
		$this->fieldClean($domain);

		$sql = "CREATE DOMAIN \"{$this->_schema}\".\"{$domain}\" AS ";

		if ($length == '')
			$sql .= $type;
		else {
			switch ($type) {
				// Have to account for weird placing of length for with/without
				// time zone types
				case 'timestamp with time zone':
				case 'timestamp without time zone':
					$qual = substr($type, 9);
					$sql .= "timestamp({$length}){$qual}";
					break;
				case 'time with time zone':
				case 'time without time zone':
					$qual = substr($type, 4);
					$sql .= "time({$length}){$qual}";
					break;
				default:
					$sql .= "{$type}({$length})";
			}
		}

		// Add array qualifier, if requested
		if ($array) $sql .= '[]';

		if ($notnull) $sql .= ' NOT NULL';
		if ($default != '') $sql .= " DEFAULT {$default}";
		if ($this->hasDomainConstraints() && $check != '') $sql .= " CHECK ({$check})";

		return $this->execute($sql);
	}

	/**
	 * Drops a domain.
	 * @param $domain The name of the domain to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropDomain($domain, $cascade) {
		$this->fieldClean($domain);

		$sql = "DROP DOMAIN \"{$this->_schema}\".\"{$domain}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Find object functions

	/**
	 * Searches all system catalogs to find objects that match a certain name.
	 * @param $term The search term
	 * @param $filter The object type to restrict to ('' means no restriction)
	 * @return A recordset
	 */
	function findObject($term, $filter) {
		global $conf;

		// Escape search term for ILIKE match
		$term = str_replace('_', '\\_', $term);
		$term = str_replace('%', '\\%', $term);
		$this->clean($term);
		$this->clean($filter);

		// Exclude system relations if necessary
		if (!$conf['show_system']) {
			// XXX: The mention of information_schema here is in the wrong place, but
			// it's the quickest fix to exclude the info schema from 7.4
			$where = " AND pn.nspname NOT LIKE 'pg\\\\_%' AND pn.nspname != 'information_schema'";
			$lan_where = "AND pl.lanispl";
		}
		else {
			$where = '';
			$lan_where = '';
		}

		// Apply outer filter
		$sql = '';
		if ($filter != '') {
			$sql = "SELECT * FROM (";
		}

		$sql .= "
			SELECT 'SCHEMA' AS type, oid, NULL AS schemaname, NULL AS relname, nspname AS name
				FROM pg_catalog.pg_namespace pn WHERE nspname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT CASE WHEN relkind='r' THEN 'TABLE' WHEN relkind='v' THEN 'VIEW' WHEN relkind='S' THEN 'SEQUENCE' END, pc.oid,
				pn.nspname, NULL, pc.relname FROM pg_catalog.pg_class pc, pg_catalog.pg_namespace pn
				WHERE pc.relnamespace=pn.oid AND relkind IN ('r', 'v', 'S') AND relname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT CASE WHEN pc.relkind='r' THEN 'COLUMNTABLE' ELSE 'COLUMNVIEW' END, NULL, pn.nspname, pc.relname, pa.attname FROM pg_catalog.pg_class pc, pg_catalog.pg_namespace pn,
				pg_catalog.pg_attribute pa WHERE pc.relnamespace=pn.oid AND pc.oid=pa.attrelid
				AND pa.attname ILIKE '%{$term}%' AND pa.attnum > 0 AND NOT pa.attisdropped AND pc.relkind IN ('r', 'v') {$where}
			UNION ALL
			SELECT 'FUNCTION', pp.oid, pn.nspname, NULL, pp.proname || '(' || pg_catalog.oidvectortypes(pp.proargtypes) || ')' FROM pg_catalog.pg_proc pp, pg_catalog.pg_namespace pn
				WHERE pp.pronamespace=pn.oid AND NOT pp.proisagg AND pp.proname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'INDEX', NULL, pn.nspname, pc.relname, pc2.relname FROM pg_catalog.pg_class pc, pg_catalog.pg_namespace pn,
				pg_catalog.pg_index pi, pg_catalog.pg_class pc2 WHERE pc.relnamespace=pn.oid AND pc.oid=pi.indrelid
				AND pi.indexrelid=pc2.oid
				AND NOT EXISTS (
					SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
					ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
					WHERE d.classid = pc2.tableoid AND d.objid = pc2.oid AND d.deptype = 'i' AND c.contype IN ('u', 'p')
				)
				AND pc2.relname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'CONSTRAINTTABLE', NULL, pn.nspname, pc.relname, pc2.conname FROM pg_catalog.pg_class pc, pg_catalog.pg_namespace pn,
				pg_catalog.pg_constraint pc2 WHERE pc.relnamespace=pn.oid AND pc.oid=pc2.conrelid AND pc2.conrelid != 0
				AND CASE WHEN pc2.contype IN ('f', 'c') THEN TRUE ELSE NOT EXISTS (
					SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
					ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
					WHERE d.classid = pc2.tableoid AND d.objid = pc2.oid AND d.deptype = 'i' AND c.contype IN ('u', 'p')
				) END
				AND pc2.conname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'CONSTRAINTDOMAIN', pt.oid, pn.nspname, pt.typname, pc.conname FROM pg_catalog.pg_type pt, pg_catalog.pg_namespace pn,
				pg_catalog.pg_constraint pc WHERE pt.typnamespace=pn.oid AND pt.oid=pc.contypid AND pc.contypid != 0
				AND pc.conname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'TRIGGER', NULL, pn.nspname, pc.relname, pt.tgname FROM pg_catalog.pg_class pc, pg_catalog.pg_namespace pn,
				pg_catalog.pg_trigger pt WHERE pc.relnamespace=pn.oid AND pc.oid=pt.tgrelid
					AND (NOT pt.tgisconstraint OR NOT EXISTS
					(SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
					ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
					WHERE d.classid = pt.tableoid AND d.objid = pt.oid AND d.deptype = 'i' AND c.contype = 'f'))
				AND pt.tgname ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'RULETABLE', NULL, pn.nspname AS schemaname, c.relname AS tablename, r.rulename FROM pg_catalog.pg_rewrite r
				JOIN pg_catalog.pg_class c ON c.oid = r.ev_class
				LEFT JOIN pg_catalog.pg_namespace pn ON pn.oid = c.relnamespace
				WHERE c.relkind='r' AND r.rulename != '_RETURN' AND r.rulename ILIKE '%{$term}%' {$where}
			UNION ALL
			SELECT 'RULEVIEW', NULL, pn.nspname AS schemaname, c.relname AS tablename, r.rulename FROM pg_catalog.pg_rewrite r
				JOIN pg_catalog.pg_class c ON c.oid = r.ev_class
				LEFT JOIN pg_catalog.pg_namespace pn ON pn.oid = c.relnamespace
				WHERE c.relkind='v' AND r.rulename != '_RETURN' AND r.rulename ILIKE '%{$term}%' {$where}
		";

		// Add advanced objects if show_advanced is set
		if ($conf['show_advanced']) {
			$sql .= "
				UNION ALL
				SELECT CASE WHEN pt.typtype='d' THEN 'DOMAIN' ELSE 'TYPE' END, pt.oid, pn.nspname, NULL,
					pt.typname FROM pg_catalog.pg_type pt, pg_catalog.pg_namespace pn
					WHERE pt.typnamespace=pn.oid AND typname ILIKE '%{$term}%'
					AND (pt.typrelid = 0 OR (SELECT c.relkind = 'c' FROM pg_catalog.pg_class c WHERE c.oid = pt.typrelid))
					{$where}
			 	UNION ALL
				SELECT 'OPERATOR', po.oid, pn.nspname, NULL, po.oprname FROM pg_catalog.pg_operator po, pg_catalog.pg_namespace pn
					WHERE po.oprnamespace=pn.oid AND oprname ILIKE '%{$term}%' {$where}
				UNION ALL
				SELECT 'CONVERSION', pc.oid, pn.nspname, NULL, pc.conname FROM pg_catalog.pg_conversion pc,
					pg_catalog.pg_namespace pn WHERE pc.connamespace=pn.oid AND conname ILIKE '%{$term}%' {$where}
				UNION ALL
				SELECT 'LANGUAGE', pl.oid, NULL, NULL, pl.lanname FROM pg_catalog.pg_language pl
					WHERE lanname ILIKE '%{$term}%' {$lan_where}
				UNION ALL
				SELECT DISTINCT ON (p.proname) 'AGGREGATE', p.oid, pn.nspname, NULL, p.proname FROM pg_catalog.pg_proc p
					LEFT JOIN pg_catalog.pg_namespace pn ON p.pronamespace=pn.oid
					WHERE p.proisagg AND p.proname ILIKE '%{$term}%' {$where}
				UNION ALL
				SELECT DISTINCT ON (po.opcname) 'OPCLASS', po.oid, pn.nspname, NULL, po.opcname FROM pg_catalog.pg_opclass po,
					pg_catalog.pg_namespace pn WHERE po.opcnamespace=pn.oid
					AND po.opcname ILIKE '%{$term}%' {$where}
			";
		}
		// Otherwise just add domains
		else {
			$sql .= "
				UNION ALL
				SELECT 'DOMAIN', pt.oid, pn.nspname, NULL,
					pt.typname FROM pg_catalog.pg_type pt, pg_catalog.pg_namespace pn
					WHERE pt.typnamespace=pn.oid AND pt.typtype='d' AND typname ILIKE '%{$term}%'
					AND (pt.typrelid = 0 OR (SELECT c.relkind = 'c' FROM pg_catalog.pg_class c WHERE c.oid = pt.typrelid))
					{$where}
			";
		}

		if ($filter != '') {
			// We use like to make RULE, CONSTRAINT and COLUMN searches work
			$sql .= ") AS sub WHERE type LIKE '{$filter}%' ";
		}

		$sql .= "ORDER BY type, schemaname, relname, name";

		return $this->selectSet($sql);
	}

	// Operator functions

	/**
	 * Returns a list of all operators in the database
	 * @return All operators
	 */
	function getOperators() {
		// We stick with the subselects here, as you cannot ORDER BY a regtype
		$sql = "
			SELECT
            po.oid,
				po.oprname,
				(SELECT pg_catalog.format_type(oid, NULL) FROM pg_catalog.pg_type pt WHERE pt.oid=po.oprleft) AS oprleftname,
				(SELECT pg_catalog.format_type(oid, NULL) FROM pg_catalog.pg_type pt WHERE pt.oid=po.oprright) AS oprrightname,
				po.oprresult::pg_catalog.regtype AS resultname,
		        pg_catalog.obj_description(po.oid, 'pg_operator') AS oprcomment
			FROM
				pg_catalog.pg_operator po
			WHERE
				po.oprnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')
			ORDER BY
				po.oprname, oprleftname, oprrightname
		";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all details for a particular operator
	 * @param $operator_oid The oid of the operator
	 * @return Function info
	 */
	function getOperator($operator_oid) {
		$this->clean($operator_oid);

		$sql = "
			SELECT
            po.oid,
				po.oprname,
				oprleft::pg_catalog.regtype AS oprleftname,
				oprright::pg_catalog.regtype AS oprrightname,
				oprresult::pg_catalog.regtype AS resultname,
				po.oprcanhash,
				oprcom::pg_catalog.regoperator AS oprcom,
				oprnegate::pg_catalog.regoperator AS oprnegate,
				oprlsortop::pg_catalog.regoperator AS oprlsortop,
				oprrsortop::pg_catalog.regoperator AS oprrsortop,
				oprltcmpop::pg_catalog.regoperator AS oprltcmpop,
				oprgtcmpop::pg_catalog.regoperator AS oprgtcmpop,
				po.oprcode::pg_catalog.regproc AS oprcode,
				po.oprrest::pg_catalog.regproc AS oprrest,
				po.oprjoin::pg_catalog.regproc AS oprjoin
			FROM
				pg_catalog.pg_operator po
			WHERE
				po.oid='{$operator_oid}'
		";

		return $this->selectSet($sql);
	}

	// Cast functions

	/**
	 * Returns a list of all casts in the database
	 * @return All casts
	 */
	function getCasts() {
		global $conf;

		if ($conf['show_system'])
			$where = '';
		else
			$where = "
				AND n1.nspname NOT LIKE 'pg\\\\_%'
				AND n2.nspname NOT LIKE 'pg\\\\_%'
				AND n3.nspname NOT LIKE 'pg\\\\_%'
			";

		$sql = "
			SELECT
				c.castsource::pg_catalog.regtype AS castsource,
				c.casttarget::pg_catalog.regtype AS casttarget,
				CASE WHEN c.castfunc=0 THEN NULL
				ELSE c.castfunc::pg_catalog.regprocedure END AS castfunc,
				c.castcontext,
				obj_description(c.oid, 'pg_cast') as castcomment
			FROM
				(pg_catalog.pg_cast c LEFT JOIN pg_catalog.pg_proc p ON c.castfunc=p.oid JOIN pg_catalog.pg_namespace n3 ON p.pronamespace=n3.oid),
				pg_catalog.pg_type t1,
				pg_catalog.pg_type t2,
				pg_catalog.pg_namespace n1,
				pg_catalog.pg_namespace n2
			WHERE
				c.castsource=t1.oid
				AND c.casttarget=t2.oid
				AND t1.typnamespace=n1.oid
				AND t2.typnamespace=n2.oid
				{$where}
			ORDER BY 1, 2
		";

		return $this->selectSet($sql);
	}

	// Conversion functions

	/**
	 * Returns a list of all conversions in the database
	 * @return All conversions
	 */
	function getConversions() {
		$sql = "
			SELECT
			       c.conname,
			       pg_catalog.pg_encoding_to_char(c.conforencoding) AS conforencoding,
			       pg_catalog.pg_encoding_to_char(c.contoencoding) AS contoencoding,
			       c.condefault,
			       pg_catalog.obj_description(c.oid, 'pg_conversion') AS concomment
			FROM pg_catalog.pg_conversion c, pg_catalog.pg_namespace n
			WHERE n.oid = c.connamespace
			      AND n.nspname='{$this->_schema}'
			ORDER BY 1;
		";

		return $this->selectSet($sql);
	}

	// Language functions

	/**
	 * Gets all languages
	 * @param $all True to get all languages, regardless of show_system
	 * @return A recordset
	 */
	function getLanguages($all = false) {
		global $conf;

		if ($conf['show_system'] || $all)
			$where = '';
		else
			$where = 'WHERE lanispl';

		$sql = "
			SELECT
				lanname,
				lanpltrusted,
				lanplcallfoid::pg_catalog.regproc AS lanplcallf
			FROM
				pg_catalog.pg_language
			{$where}
			ORDER BY
				lanname
		";

		return $this->selectSet($sql);
	}

	// Aggregate functions

	/**
	 * Gets all information for an aggregate
	 * @param $name The name of the aggregate
	 * @param $basetype The input data type of the aggregate
	 * @return A recordset
	 */
	function getAggregate($name, $basetype) {
		$this->fieldclean($name);
		$this->fieldclean($basetype);

		$sql = "
			SELECT p.proname,
				CASE p.proargtypes[0]
					WHEN 'pg_catalog.\"any\"'::pg_catalog.regtype THEN NULL
					ELSE pg_catalog.format_type(p.proargtypes[0], NULL)
				END AS proargtypes, a.aggtransfn, format_type(a.aggtranstype, NULL) AS aggstype,
				a.aggfinalfn, a.agginitval, u.usename, pg_catalog.obj_description(p.oid, 'pg_proc') AS aggrcomment
			FROM pg_catalog.pg_proc p, pg_catalog.pg_namespace n, pg_catalog.pg_user u, pg_catalog.pg_aggregate a
			WHERE n.oid = p.pronamespace AND p.proowner=u.usesysid AND p.oid=a.aggfnoid
				AND p.proisagg AND n.nspname='{$this->_schema}'
				AND p.proname='" . $name . "'
				AND CASE p.proargtypes[0] 
					WHEN 'pg_catalog.\"any\"'::pg_catalog.regtype THEN ''
					ELSE pg_catalog.format_type(p.proargtypes[0], NULL)
				END ='" . $basetype . "'";

		return $this->selectSet($sql);
	}

	/**
	 * Gets all aggregates
	 * @return A recordset
	 */
	function getAggregates() {
		$sql = "SELECT p.proname, CASE p.proargtypes[0] WHEN 'pg_catalog.\"any\"'::pg_catalog.regtype THEN NULL ELSE
			   pg_catalog.format_type(p.proargtypes[0], NULL) END AS proargtypes, a.aggtransfn, u.usename,
			   pg_catalog.obj_description(p.oid, 'pg_proc') AS aggrcomment
			   FROM pg_catalog.pg_proc p, pg_catalog.pg_namespace n, pg_catalog.pg_user u, pg_catalog.pg_aggregate a
			   WHERE n.oid = p.pronamespace AND p.proowner=u.usesysid AND p.oid=a.aggfnoid
			   AND p.proisagg AND n.nspname='{$this->_schema}' ORDER BY 1, 2";

		return $this->selectSet($sql);
	}

	// Operator Class functions

	/**
	 * Gets all opclasses
	 * @return A recordset
	 */
	function getOpClasses() {
		$sql = "
			SELECT
				pa.amname,
				po.opcname,
				po.opcintype::pg_catalog.regtype AS opcintype,
				po.opcdefault,
				pg_catalog.obj_description(po.oid, 'pg_opclass') AS opccomment
			FROM
				pg_catalog.pg_opclass po, pg_catalog.pg_am pa, pg_catalog.pg_namespace pn
			WHERE
				po.opcamid=pa.oid
				AND po.opcnamespace=pn.oid
				AND pn.nspname='{$this->_schema}'
			ORDER BY 1,2
		";

		return $this->selectSet($sql);
	}

	/**
	 * Removes an aggregate function from the database
	 * @param $aggrname The name of the aggregate
	 * @param $aggrtype The input data type of the aggregate
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropAggregate($aggrname, $aggrtype, $cascade) {
		$this->fieldClean($aggrname);
		$this->fieldClean($aggrtype);

		$sql = "DROP AGGREGATE \"{$this->_schema}\".\"{$aggrname}\" (\"{$aggrtype}\")";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Query functions

	/**
	 * Returns explained version of a query
	 * @param $query The query for which to get data
	 * @param $analyze True to analyze as well
	 */
	function getExplainSQL($query, $analyze) {
		$temp = "EXPLAIN ";
		if ($analyze) $temp .= "ANALYZE ";
		$temp .= $query;
		return $temp;
	}

	// Capabilities
	function hasSchemas() { return true; }
	function hasConversions() { return true; }
	function hasIsClustered() { return true; }
	function hasDropBehavior() { return true; }
	function hasDropColumn() { return true; }
	function hasDomains() { return true; }
	function hasAlterTrigger() { return true; }
	function hasCasts() { return true; }
	function hasPrepare() { return true; }
	function hasUserSessionDefaults() { return true; }
	function hasVariables() { return true; }
//	function hasForeignKeysInfo() { return true; }
	function hasConstraintsInfo() { return true; }
	function hasViewColumnRename() { return true; }
	function hasUserAndDbVariables() { return true; }
	function hasCompositeTypes() { return true; }
	function hasFuncPrivs() { return true; }
	function hasLocksView() { return true; }

}

?>
