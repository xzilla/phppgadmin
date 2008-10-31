<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres74.php,v 1.72 2008/02/20 21:06:18 ioguix Exp $
 */

include_once('./classes/database/Postgres73.php');

class Postgres74 extends Postgres73 {

	var $major_version = 7.4;

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	// Max object name length
	var $_maxNameLen = 63;

	// How often to execute the trigger
	var $triggerFrequency = array('ROW','STATEMENT');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres74($conn) {
		$this->Postgres73($conn);
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
	function alterDatabase($dbName, $newName, $newOwner = '', $comment = '')
	{
		//ignore $newowner, not supported pre 8.0
		//ignore $comment, not supported pre 8.2
		$this->clean($dbName);
		$this->clean($newName);

		$status = $this->alterDatabaseRename($dbName, $newName);
		if ($status != 0) return -3;
		else return 0;
	}

	/**
	 * Renames a database, note that this operation cannot be
	 * performed on a database that is currently being connected to
	 * @param string $oldName name of database to rename
	 * @param string $newName new name of database
	 * @return int 0 on success
	 */
	function alterDatabaseRename($oldName, $newName) {
		$this->clean($oldName);
		$this->clean($newName);

		if ($oldName != $newName) {
			$sql = "ALTER DATABASE \"{$oldName}\" RENAME TO \"{$newName}\"";
			return $this->execute($sql);
		}
		else //just return success, we're not going to do anything
			return 0;
	}

	// Table functions

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
			AND indpred IS NULL AND indexprs IS NULL ORDER BY indisprimary DESC LIMIT 1";
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
	 * Sets up the data object for a dump.  eg. Starts the appropriate
	 * transaction, sets variables, etc.
	 * @return 0 success
	 */
	function beginDump() {
		$status = parent::beginDump();
		if ($status != 0) return $status;

		// Set extra_float_digits to 2
		$sql = "SET extra_float_digits TO 2";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
	}

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function getConstraints($table) {
		$this->clean($table);

		// This SQL is greatly complicated by the need to retrieve
		// index clustering information for primary and unique constraints
		$sql = "SELECT
				pc.conname,
				pg_catalog.pg_get_constraintdef(pc.oid, true) AS consrc,
				pc.contype,
				CASE WHEN pc.contype='u' OR pc.contype='p' THEN (
					SELECT
						indisclustered
					FROM
						pg_catalog.pg_depend pd,
						pg_catalog.pg_class pl,
						pg_catalog.pg_index pi
					WHERE
						pd.refclassid=pc.tableoid
						AND pd.refobjid=pc.oid
						AND pd.objid=pl.oid
						AND pl.oid=pi.indexrelid
				) ELSE
					NULL
				END AS indisclustered
			FROM
				pg_catalog.pg_constraint pc
			WHERE
				pc.conrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
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

		if ($rs->EOF) $max_col = 0;
		else $max_col = $rs->fields['nb'];

		$sql = '
			SELECT
				c.contype, c.conname, pg_catalog.pg_get_constraintdef(c.oid,true) AS consrc,
				ns1.nspname as p_schema, r1.relname as p_table, ns2.nspname as f_schema,
				r2.relname as f_table, f1.attname as p_field, f2.attname as f_field,
				pg_catalog.obj_description(c.oid, \'pg_constraint\') AS constcomment
			FROM
				pg_catalog.pg_constraint AS c
				JOIN pg_catalog.pg_class AS r1 ON (c.conrelid=r1.oid)
				JOIN pg_catalog.pg_attribute AS f1 ON (f1.attrelid=r1.oid AND (f1.attnum=c.conkey[1]';
		for ($i = 2; $i <= $rs->fields['nb']; $i++) {
			$sql.= " OR f1.attnum=c.conkey[$i]";
		}
		$sql.= '))
				JOIN pg_catalog.pg_namespace AS ns1 ON r1.relnamespace=ns1.oid
				LEFT JOIN (
					pg_catalog.pg_class AS r2 JOIN pg_catalog.pg_namespace AS ns2 ON (r2.relnamespace=ns2.oid)
				) ON (c.confrelid=r2.oid)
				LEFT JOIN pg_catalog.pg_attribute AS f2 ON
					(f2.attrelid=r2.oid AND ((c.confkey[1]=f2.attnum AND c.conkey[1]=f1.attnum)';
		for ($i = 2; $i <= $rs->fields['nb']; $i++)
			$sql.= "OR (c.confkey[$i]=f2.attnum AND c.conkey[$i]=f1.attnum)";

		$sql .= sprintf("))
			WHERE
				r1.relname = '%s' AND ns1.nspname='%s'
			ORDER BY 1", $table, $this->_schema);

		return $this->selectSet($sql);
	}

	/**
	 * Creates a new table in the database copying attribs and other properties from another table
	 * @param $name The name of the table
	 * @param $like an array giving the schema ans the name of the table from which attribs are copying from:
	 *		array(
	 *			'table' => table name,
	 *			'schema' => the schema name,
	 *		)
	 * @param $defaults if true, copy the defaults values as well
	 * @param $constraints if true, copy the constraints as well (CHECK on table & attr)
	 * @param $tablespace The tablespace name ('' means none/default)
	 */
	function createTableLike($name, $like, $defaults = false, $constraints = false, $idx = false, $tablespace = '') {
		$this->fieldClean($name);

		$this->fieldClean($like['schema']);
		$this->fieldClean($like['table']);
		$like = "\"{$like['schema']}\".\"{$like['table']}\"";

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$sql = "CREATE TABLE \"{$this->_schema}\".\"{$name}\" (LIKE {$like}";

		if ($defaults) $sql .= " INCLUDING DEFAULTS";
		if ($this->hasCreateTableLikeWithConstraints() && $constraints) $sql .= " INCLUDING CONSTRAINTS";
		if ($this->hasCreateTableLikeWithIndexes() && $idx) $sql .= " INCLUDING INDEXES";

		$sql .= ")";

		if ($this->hasTablespaces() && $tablespace != '') {
			$this->fieldClean($tablespace);
			$sql .= " TABLESPACE \"{$tablespace}\"";
		}

		$status = $this->execute($sql);
		if ($status) {
			$this->rollbackTransaction();
			return -1;
		}

		return $this->endTransaction();
	}

	// Group functions

	/**
	 * Return users in a specific group
	 * @param $groname The name of the group
	 * @return All users in the group
	 */
	function getGroup($groname) {
		$this->clean($groname);

		$sql = "SELECT s.usename FROM pg_catalog.pg_user s, pg_catalog.pg_group g
					WHERE g.groname='{$groname}' AND s.usesysid = ANY (g.grolist)
					ORDER BY s.usename";

		return $this->selectSet($sql);
	}

	// Schema functions

	/**
	 * Return all schemas in the current database.  This differs from the version
	 * in 7.3 only in that it considers the information_schema to be a system schema.
	 * @return All schemas, sorted alphabetically
	 */
	function getSchemas() {
		global $conf, $slony;

		if (!$conf['show_system']) {
			$where = "WHERE nspname NOT LIKE 'pg@_%' ESCAPE '@' AND nspname != 'information_schema'";
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

	// Index functions

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @param $unique Only get unique/pk indexes
	 * @return A recordset
	 */
	function getIndexes($table = '', $unique = false) {
		$this->clean($table);

		$sql = "SELECT c2.relname AS indname, i.indisprimary, i.indisunique, i.indisclustered,
			pg_catalog.pg_get_indexdef(i.indexrelid, 0, true) AS inddef
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND pg_catalog.pg_table_is_visible(c.oid)
			AND c.oid = i.indrelid AND i.indexrelid = c2.oid
		";
		if ($unique) $sql .= " AND i.indisunique ";
		$sql .= " ORDER BY c2.relname";

		return $this->selectSet($sql);
	}

	// View functions

	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function getView($view) {
		$this->clean($view);

		$sql = "SELECT c.relname, n.nspname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner,
                          pg_catalog.pg_get_viewdef(c.oid, true) AS vwdefinition, pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
                        FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON (n.oid = c.relnamespace)
                        WHERE (c.relname = '$view')
                        AND n.nspname='{$this->_schema}'";

		return $this->selectSet($sql);
	}

	// Trigger functions

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function getTriggers($table = '') {
		$this->clean($table);

		$sql = "SELECT
				t.tgname, pg_catalog.pg_get_triggerdef(t.oid) AS tgdef, t.tgenabled, p.oid AS prooid,
				p.proname || ' (' || pg_catalog.oidvectortypes(p.proargtypes) || ')' AS proproto,
				ns.nspname AS pronamespace
			FROM pg_catalog.pg_trigger t, pg_catalog.pg_proc p, pg_catalog.pg_namespace ns
			WHERE t.tgrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
				AND relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
				AND (NOT tgisconstraint OR NOT EXISTS
						(SELECT 1 FROM pg_catalog.pg_depend d    JOIN pg_catalog.pg_constraint c
							ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
						WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))
				AND p.oid=t.tgfoid
				AND p.pronamespace = ns.oid";

		return $this->selectSet($sql);
	}

	// Administration functions

	/**
	 * Recluster a table or all the tables in the current database
	 * @param $table (optional) The table to recluster
	 */
	function recluster($table = '') {
		if ($table != '') {
			$this->fieldClean($table);
			$sql = "CLUSTER \"{$this->_schema}\".\"{$table}\"";
		}
		else
			$sql = "CLUSTER";

		return $this->execute($sql);
	}

	// Domain functions

	/**
	 * Get domain constraints
	 * @param $domain The name of the domain whose constraints to fetch
	 * @return A recordset
	 */
	function getDomainConstraints($domain) {
		$this->clean($domain);

		$sql = "
			SELECT
				conname,
				contype,
				pg_catalog.pg_get_constraintdef(oid, true) AS consrc
			FROM
				pg_catalog.pg_constraint
			WHERE
				contypid = (SELECT oid FROM pg_catalog.pg_type
								WHERE typname='{$domain}'
								AND typnamespace = (SELECT oid FROM pg_catalog.pg_namespace
															WHERE nspname = '{$this->_schema}'))
			ORDER BY
				conname";

		return $this->selectSet($sql);
	}

	/**
	 * Drops a domain constraint
	 * @param $domain The domain from which to remove the constraint
	 * @param $constraint The constraint to remove
	 * @param $cascade True to cascade, false otherwise
	 * @return 0 success
	 */
	function dropDomainConstraint($domain, $constraint, $cascade) {
		$this->fieldClean($domain);
		$this->fieldClean($constraint);

		$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" DROP CONSTRAINT \"{$constraint}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Adds a check constraint to a domain
	 * @param $domain The domain to which to add the check
	 * @param $definition The definition of the check
	 * @param $name (optional) The name to give the check, otherwise default name is assigned
	 * @return 0 success
	 */
	function addDomainCheckConstraint($domain, $definition, $name = '') {
		$this->fieldClean($domain);
		$this->fieldClean($name);

		$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "CHECK ({$definition})";

		return $this->execute($sql);
	}

	/**
	 * Alters a domain
	 * @param $domain The domain to alter
	 * @param $domdefault The domain default
	 * @param $domnotnull True for NOT NULL, false otherwise
	 * @param $domowner The domain owner
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 default error
	 * @return -3 not null error
	 * @return -4 owner error
	 */
	function alterDomain($domain, $domdefault, $domnotnull, $domowner) {
		$this->fieldClean($domain);
		$this->fieldClean($domowner);

		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Default
		if ($domdefault == '')
			$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" DROP DEFAULT";
		else
			$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" SET DEFAULT {$domdefault}";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}

		// NOT NULL
		if ($domnotnull)
			$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" SET NOT NULL";
		else
			$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" DROP NOT NULL";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Owner
		$sql = "ALTER DOMAIN \"{$this->_schema}\".\"{$domain}\" OWNER TO \"{$domowner}\"";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		return $this->endTransaction();
	}

	// User functions

	/**
	 * Renames a user
	 * @param $username The username of the user to rename
	 * @param $newname The new name of the user
	 * @return 0 success
	 */
	function renameUser($username, $newname){
		$this->fieldClean($username);
		$this->fieldClean($newname);

		$sql = "ALTER USER \"{$username}\" RENAME TO \"{$newname}\"";

		return $this->execute($sql);
	}

	/**
	 * Adjusts a user's info and renames the user
	 * @param $username The username of the user to modify
	 * @param $password A new password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  '' means never expire.
	 * @param $newname The new name of the user
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 set user attributes error
	 * @return -3 rename error
	 */
	function setRenameUser($username, $password, $createdb, $createuser, $expiry, $newname) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$status = $this->setUser($username, $password, $createdb, $createuser, $expiry);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}

		if ($username != $newname){
			$status = $this->renameUser($username, $newname);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}

		return $this->endTransaction();
	}

	// Function functions

	/**
	 * Updates (replaces) a function.
	 * @param $function_oid The OID of the function
	 * @param $funcname The name of the function to create
	 * @param $newname The new name for the function
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $setof True if returns a set, false otherwise
	 * @param $comment The comment on the function
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -3 create function error
	 * @return -4 comment error
	 * @return -5 rename function error
	 * @return -6 alter owner error
	 * @return -7 alter schema error
	 */
	function setFunction($function_oid, $funcname, $newname, $args, $returns, $definition, $language, $flags, $setof, $funcown, $newown, $funcschema, $newschema, $cost, $rows, $comment) {
		// Begin a transaction
		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Replace the existing function
		$status = $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, $cost, $rows, true);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Comment on the function
		$this->fieldClean($funcname);
		$this->clean($comment);
		$status = $this->setComment('FUNCTION', "\"{$funcname}\"({$args})", null, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Rename the function, if necessary
		$this->fieldClean($newname);
		if ($funcname != $newname) {
			$sql = "ALTER FUNCTION \"{$this->_schema}\".\"{$funcname}\"({$args}) RENAME TO \"{$newname}\"";
			$status = $this->execute($sql);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -5;
			}

                        $funcname = $newname;
		}

		// Alter the owner, if necessary
		if ($this->hasFunctionAlterOwner()) {
			$this->fieldClean($newown);
		    if ($funcown != $newown) {
				$sql = "ALTER FUNCTION \"{$this->_schema}\".\"{$funcname}\"({$args}) OWNER TO \"{$newown}\"";
				$status = $this->execute($sql);
				if ($status != 0) {
					$this->rollbackTransaction();
					return -6;
				}
		    }

		}

		// Alter the schema, if necessary
		if ($this->hasFunctionAlterSchema()) {
		    $this->fieldClean($newschema);
		    if ($funcschema != $newschema) {
				$sql = "ALTER FUNCTION \"{$this->_schema}\".\"{$funcname}\"({$args}) SET SCHEMA \"{$newschema}\"";
				$status = $this->execute($sql);
				if ($status != 0) {
					$this->rollbackTransaction();
					return -7;
				}
		    }
		}

		return $this->endTransaction();
	}

	// Sequences

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
	 * @return -6 get sequence error
	 */
	/*protected*/
	function _alterSequence($seqrs, $name, $comment, $owner, $schema, $increment,
				$minvalue, $maxvalue, $startvalue, $cachevalue, $cycledvalue) {

		$status = parent::_alterSequence($seqrs, $name, $comment, $owner, $schema, $increment,
				$minvalue, $maxvalue, $startvalue, $cachevalue, $cycledvalue);
		if ($status != 0)
			return $status;

		/* $schema not supported in pg74 */

		// if name != seqname, sequence has been renamed in parent
		$sequence = ($seqrs->fields['seqname'] == $name) ? $seqrs->fields['seqname'] : $name;
		$this->clean($increment);
		$this->clean($minvalue);
		$this->clean($maxvalue);
		$this->clean($startvalue);
		$this->clean($cachevalue);
		$this->clean($cycledvalue);

		// Props
		$sql = '';
		if (!empty($increment) && ($increment != $seqrs->fields['increment_by'])) $sql .= " INCREMENT {$increment}";
		if (!empty($minvalue) && ($minvalue != $seqrs->fields['min_value'])) $sql .= " MINVALUE {$minvalue}";
		if (!empty($maxvalue) && ($maxvalue != $seqrs->fields['max_value'])) $sql .= " MAXVALUE {$maxvalue}";
		if (!empty($startvalue) && ($startvalue != $seqrs->fields['last_value'])) $sql .= " RESTART {$startvalue}";
		if (!empty($cachevalue) && ($cachevalue != $seqrs->fields['cache_value'])) $sql .= " CACHE {$cachevalue}";
		// toggle cycle yes/no
		if (!is_null($cycledvalue))
			$sql .= (!$cycledvalue ? ' NO ' : '') . " CYCLE";
		if ($sql != '') {
			$sql = "ALTER SEQUENCE \"{$this->_schema}\".\"{$sequence}\" $sql";
			$status = $this->execute($sql);
			if ($status != 0)
				return -6;
		}

		return 0;
	}

	// Aggregates

	/**
	 * Alters an aggregate
	 * @param $aggrname The actual name of the aggregate
	 * @param $aggrtype The actual input data type of the aggregate
	 * @param $aggrowner The actual owner of the aggregate
	 * @param $aggrschema The actual schema the aggregate belongs to
	 * @param $aggrcomment The actual comment for the aggregate
	 * @param $newaggrname The new name of the aggregate
	 * @param $newaggrowner The new owner of the aggregate
	 * @param $newaggrschema The new schema where the aggregate will belong to
	 * @param $newaggrcomment The new comment for the aggregate
	 * @return 0 success
	 * @return -1 change owner error
	 * @return -2 change comment error
	 * @return -3 change schema error
	 * @return -4 change name error
	 */
	function alterAggregate($aggrname, $aggrtype, $aggrowner, $aggrschema, $aggrcomment, $newaggrname, $newaggrowner, $newaggrschema, $newaggrcomment) {
		// Clean fields
		$this->fieldClean($aggrname);
		$this->fieldClean($aggrtype);
		$this->fieldClean($aggrowner);
		$this->fieldClean($aggrschema);
		$this->clean($aggrcomment);
		$this->fieldClean($newaggrname);
		$this->fieldClean($newaggrowner);
		$this->fieldClean($newaggrschema);
		$this->clean($newaggrcomment);

		$this->beginTransaction();

		// Change the owner, if it has changed
		if($aggrowner != $newaggrowner) {
			$status = $this->changeAggregateOwner($aggrname, $aggrtype, $newaggrowner);
			if($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
		}

		// Set the comment, if it has changed
		if($aggrcomment != $newaggrcomment) {
			$status = $this->setComment('AGGREGATE', $aggrname, '', $newaggrcomment, $aggrtype);
			if ($status) {
				$this->rollbackTransaction();
				return -2;
			}
		}

		// Change the schema, if it has changed
		if($aggrschema != $newaggrschema) {
			$status = $this->changeAggregateSchema($aggrname, $aggrtype, $newaggrschema);
			if($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}

		// Rename the aggregate, if it has changed
		if($aggrname != $newaggrname) {
			$status = $this->renameAggregate($newaggrschema, $aggrname, $aggrtype, $newaggrname);
			if($status != 0) {
				$this->rollbackTransaction();
				return -4;
			}
		}

		return $this->endTransaction();
	}

	/**
	 * Changes the owner of an aggregate function
	 * @param $aggrname The name of the aggregate
	 * @param $aggrtype The input data type of the aggregate
	 * @param $newaggrowner The new owner of the aggregate
	 * @return 0 success
	 */
	function changeAggregateOwner($aggrname, $aggrtype, $newaggrowner) {
		$sql = "ALTER AGGREGATE \"{$this->_schema}\".\"{$aggrname}\" (\"{$aggrtype}\") OWNER TO \"{$newaggrowner}\"";
		return $this->execute($sql);
	}

	/**
	 * Changes the schema of an aggregate function
	 * @param $aggrname The name of the aggregate
	 * @param $aggrtype The input data type of the aggregate
	 * @param $newaggrschema The new schema for the aggregate
	 * @return 0 success
	 */
	function changeAggregateSchema($aggrname, $aggrtype, $newaggrschema) {
		$sql = "ALTER AGGREGATE \"{$this->_schema}\".\"{$aggrname}\" (\"{$aggrtype}\") SET SCHEMA  \"{$newaggrschema}\"";
		return $this->execute($sql);
	}

	/**
	 * Renames an aggregate function
	 * @param $aggrname The actual name of the aggregate
	 * @param $aggrtype The actual input data type of the aggregate
	 * @param $newaggrname The new name of the aggregate
	 * @return 0 success
	 */
	function renameAggregate($aggrschema, $aggrname, $aggrtype, $newaggrname) {
		$sql = "ALTER AGGREGATE \"{$aggrschema}\"" . '.' . "\"{$aggrname}\" (\"{$aggrtype}\") RENAME TO \"{$newaggrname}\"";
		return $this->execute($sql);
	}

	// Capabilities
	function hasAlterDatabaseRename() { return true; }
	function hasAlterSchema() { return true; }
	function hasGrantOption() { return true; }
	function hasAlterDomains() { return true; }
	function hasDomainConstraints() { return true; }
	function hasUserRename() { return true; }
	function hasRecluster() { return true; }
	function hasReadOnlyQueries() { return true; }
	function hasAlterSequenceProps() { return true; }
	function hasAlterAggregate() { return true; }
	function hasCreateTableLike() { return true; }
}

?>
