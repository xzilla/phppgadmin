<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.154 2005/10/17 08:28:23 jollytoad Exp $
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
	var $selectOps = array('=' => 'i', '!=' => 'i', '<' => 'i', '>' => 'i', '<=' => 'i', '>=' => 'i', 'LIKE' => 'i', 'NOT LIKE' => 'i', 'ILIKE' => 'i', 'NOT ILIKE' => 'i', 
									'SIMILAR TO' => 'i', 'NOT SIMILAR TO' => 'i', '~' => 'i', '!~' => 'i', '~*' => 'i', '!~*' => 'i', 'IS NULL' => 'p', 'IS NOT NULL' => 'p',
									'IN' => 'x', 'NOT IN' => 'x');

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
	function updateSchema($schemaname, $comment) {
		$this->fieldClean($schemaname);
		$this->clean($comment);
		return $this->setComment('SCHEMA', $schemaname, '', $comment);
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
			$rs->f['relhasoids'] = $this->phpBool($rs->f['relhasoids']);
			return $rs->f['relhasoids'];
		}
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
				$temp[$rs->f['attnum']] = $rs->f['attname'];
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
			$attnames = $this->getAttributeNames($oldtable, explode(' ', $rs->f['indkey']));
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
			  c.relname, u.usename AS relowner,
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
						reltuples::integer
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
	 * Drops a column from a table
	 * @param $table The table from which to drop a column
	 * @param $column The column to be dropped
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropColumn($table, $column, $cascade) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$table}\" DROP COLUMN \"{$column}\"";
		if ($cascade) $sql .= " CASCADE";		

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

		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" " . (($state) ? 'DROP' : 'SET') . " NOT NULL";

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

	// View functions
	
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

		$sql = "SELECT c.relname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner, 
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
	
		$sql = "SELECT sequence_name AS seqname, *, pg_catalog.obj_description(s.tableoid, 'pg_class') AS seqcomment FROM \"{$sequence}\" AS s"; 
		
		return $this->selectSet( $sql );
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
			pg_catalog.pg_get_indexdef(i.indexrelid) AS inddef
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND pg_catalog.pg_table_is_visible(c.oid) 
			AND c.oid = i.indrelid AND i.indexrelid = c2.oid
		";
		if ($unique) $sql .= " AND i.indisunique ";
		$sql .= " ORDER BY c2.relname";

		return $this->selectSet($sql);
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
			p.proname AS tgfname, c.relname, NULL AS tgdef
			FROM pg_catalog.pg_trigger t LEFT JOIN pg_catalog.pg_proc p
			ON t.tgfoid=p.oid, pg_catalog.pg_class c
			WHERE t.tgrelid=c.oid
			AND c.relname='{$table}'
			AND c.relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}')
			AND (NOT tgisconstraint OR NOT EXISTS
			(SELECT 1 FROM pg_catalog.pg_depend d JOIN pg_catalog.pg_constraint c
			ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
			WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))";

		return $this->selectSet($sql);
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
		
		$sql = "ALTER TRIGGER \"{$trigger}\" ON \"{$table}\" RENAME TO \"{$name}\"";
		
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
					pg_catalog.pg_proc pc, pg_catalog.pg_language pl
				WHERE 
					pc.oid = '$function_oid'::oid
				AND pc.prolang = pl.oid
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
	function createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, $replace = false) {
		$this->fieldClean($funcname);
		$this->clean($args);
		$this->clean($language);
		$this->arrayClean($flags);

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " FUNCTION \"{$funcname}\" (";
		
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
			$where = 'pg_catalog.pg_type_is_visible(t.oid)';
		else
			$where = "n.nspname = '{$this->_schema}'";
		// Never show system table types
		$where2 = "AND c.relnamespace NOT IN (SELECT oid FROM pg_catalog.pg_namespace WHERE nspname LIKE 'pg\\\\_%')";

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
		$sql = "CREATE TYPE \"{$name}\" AS (";
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

			if ($colcomment[$i] != '') $comment_sql .= "COMMENT ON COLUMN \"{$name}\".\"{$field[$i]}\" IS '{$colcomment[$i]}';\n";

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

		$sql = "DROP RULE \"{$rule}\" ON \"{$relation}\"";
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
	 * A function for getting all columns linked by foreign keys given a group of tables
	 * @param $tables multi dimensional assoc array that holds schema and table name
	 * @return An array of linked tables and columns
	 * @return -1 $tables isn't an array
	 */
	 function getLinkingKeys($tables) {
		if (!is_array($tables)) return -1;

		
		$tables_list = "'{$tables[0]['schemaname']}'";
		$schema_list = "'{$tables[0]['tablename']}'";
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

		$sql = "ALTER TABLE \"{$relation}\" DROP CONSTRAINT \"{$constraint}\"";
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
		
		$sql = "CREATE DOMAIN \"{$domain}\" AS ";

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

		$sql = "DROP DOMAIN \"{$domain}\"";
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
				c.castcontext
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
	 * Gets all aggregates
	 * @return A recordset
	 */
	function getAggregates() {
		$sql = "
			SELECT
				p.proname,
				CASE p.proargtypes[0]
					WHEN 'pg_catalog.\"any\"'::pg_catalog.regtype
					THEN NULL
					ELSE pg_catalog.format_type(p.proargtypes[0], NULL)
				END AS proargtypes,
				pg_catalog.obj_description(p.oid, 'pg_proc') AS aggcomment
			FROM pg_catalog.pg_proc p
				LEFT JOIN pg_catalog.pg_namespace n ON n.oid = p.pronamespace
			WHERE
				p.proisagg
				AND n.nspname='{$this->_schema}'
			ORDER BY 1, 2
		";

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
	function hasFullExplain() { return true; }
	function hasForeignKeysInfo() { return true; }
	function hasViewColumnRename() { return true; }
	function hasUserAndDbVariables() { return true; }
	function hasCompositeTypes() { return true; }	
	function hasFuncPrivs() { return true; }

}

?>
