<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.44 2003/05/15 08:59:51 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('classes/database/Postgres72.php');

class Postgres73 extends Postgres72 {

	var $nspFields = array('nspname' => 'nspname', 'nspowner' => 'nspowner');
	var $conFields = array('conname' => 'conname', 'conowner' => 'conowner');

	// Store the current schema
	var $_schema;

	// Last oid assigned to a system object
	var $_lastSystemOID = 16974;

	// Max object name length
	var $_maxNameLen = 63;

	// System schema ids and names
	var $_schemaOIDs = array(11, 99);
	var $_schemaNames = array('pg_catalog', 'pg_toast');

	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
		'view' => array('SELECT', 'RULE', 'ALL PRIVILEGES'),
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
	
	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres73($host, $port, $database, $user, $password) {
		$this->Postgres72($host, $port, $database, $user, $password);
	}


	// Schema functions
	
	/**
	 * Sets the current working schema.  Will also set class variable.
	 * @param $schema The the name of the schema to work in
	 * @return 0 success
	 */
	function setSchema($schema) {
		$status = $this->setSearchPath(array($schema));
		if ($status == 0) {
			$this->clean($schema);
			$this->_schema = $schema;
			return 0;
		}
		else return $status;
	}
	
	/**
	 * Sets the current schema search path
	 * @param $path An array of schemas in required search order
	 * @return 0 success
	 * @return -1 Array not passed
	 * @return -2 Array must contain at least one item
	 */
	function setSearchPath($paths) {
		if (!is_array($paths)) return -1;
		elseif (sizeof($paths) == 0) return -2;
		$this->fieldArrayClean($paths);

		$sql = 'SET SEARCH_PATH TO "' . implode('"', $paths) . '"';
		
		return $this->execute($sql);
	}

	/**
	 * Return all schemas in the current database
	 * @return All schemas, sorted alphabetically - but with PUBLIC first (if it exists)
	 */
	function &getSchemas() {
		if (!$this->_showSystem) $and = "AND nspname NOT LIKE 'pg_%'";
		else $and = '';
		$sql = "SELECT pn.nspname, pu.usename AS nspowner FROM pg_namespace pn, pg_user pu
			WHERE pn.nspowner = pu.usesysid
			AND nspname = 'public'
			UNION ALL
			SELECT pn.nspname, pu.usename AS nspowner FROM pg_namespace pn, pg_user pu
			WHERE pn.nspowner = pu.usesysid
			AND nspname != 'public' {$and}ORDER BY nspname";

		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a schema
	 * @param $schema The name of the schema
	 * @return Schema information
	 */
	function &getSchemaByName($schema) {
		$this->clean($schema);
		$sql = "SELECT * FROM pg_namespace WHERE nspname='{$schema}'";
		return $this->selectRow($sql);
	}

	/**
	 * Creates a new schema.
	 * @param $schemaname The name of the schema to create
	 * @param $authorization (optional) The username to create the schema for.
	 * @param $authorization (optional) If omitted, defaults to current user.
	 * @return 0 success
	 */
	function createSchema($schemaname, $authorization = '') {
		$this->fieldClean($schemaname);
		$this->fieldClean($authorization);

		$sql = "CREATE SCHEMA \"{$schemaname}\"";
		if ($authorization != '') $sql .= " AUTHORIZATION \"{$authorization}\"";
		
		return $this->execute($sql);
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
	
	// Conversions functions
	
	/**
	 * Return all conversions in the current database
	 * @return All conversions, sorted alphabetically
	 */
	function &getConversions() {
		$sql = "SELECT conname, conowner FROM pg_conversion ORDER BY conname";
				  
		return $this->selectSet($sql);
	}
	
	/**
	 * Return all information relating to a conversion
	 * @param $conversion The name of the conversion
	 * @return Conversion information
	 */
	function &getConversionByName($conversion) {
		$this->clean($conversion);
		$sql = "SELECT * FROM pg_conversion WHERE conname='{$conversion}'";
		return $this->selectRow($sql);
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

		$sql = "SELECT relhasoids FROM pg_class WHERE relname='{$table}' 
			AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname='{$this->_schema}')";

		$rs = $this->selectSet($sql);
		if ($rs->recordCount() != 1) return -99;
		else {
			$rs->f['relhasoids'] = $this->phpBool($rs->f['relhasoids']);
			return $rs->f['relhasoids'];
		}
	}

	/**
	 * Given an array of attnums and a relation, returns an array mapping
	 * atttribute number to attribute name.
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

		$sql = "SELECT attnum, attname FROM pg_attribute WHERE 
			attrelid=(SELECT oid FROM pg_class WHERE relname='{$table}'AND
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
		
		$sql = "SELECT indrelid, indkey FROM pg_index WHERE indisunique AND 
			indrelid=(SELECT oid FROM pg_class WHERE relname='{$table}' AND
			relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))";
		$rs = $this->selectSet($sql);

		// If none, return an empty array.  We can't search for an OID column
		// as there's no guarantee that it will be unique.
		if ($rs->recordCount() == 0) {
			$this->endTransaction();
			return array();
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
	 * Return all tables in current database
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables() {
		$sql = "SELECT tablename, tableowner FROM pg_tables
			WHERE schemaname='{$this->_schema}' ORDER BY tablename";

		return $this->selectSet($sql);
	}

	/**
	 * Retrieve the attribute definition of a table
	 * @param $table The name of the table
	 * @param $field (optional) The name of a field to return
	 * @return All attributes in order
	 */
	function &getTableAttributes($table, $field = '') {
		$this->clean($table);
		$this->clean($field);

		if ($field == '') {
			$sql = "
				SELECT
					a.attname,
					pg_catalog.format_type(a.atttypid, a.atttypmod) as type,
					a.attnotnull, a.atthasdef, adef.adsrc
				FROM
					pg_catalog.pg_attribute a LEFT JOIN pg_catalog.pg_attrdef adef
					ON a.attrelid=adef.adrelid
					AND a.attnum=adef.adnum
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
					a.attnotnull, a.atthasdef, adef.adsrc
				FROM
					pg_catalog.pg_attribute a LEFT JOIN pg_catalog.pg_attrdef adef
					ON a.attrelid=adef.adrelid
					AND a.attnum=adef.adnum
				WHERE
					a.attrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
						AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace WHERE
						nspname = '{$this->_schema}'))
					AND a.attname = '{$field}'
				ORDER BY a.attnum";
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

	// View functions
	
	/**
	 * Returns a list of all views in the database
	 * @return All views
	 */
	function getViews() {
		$sql = "SELECT viewname, viewowner FROM pg_views
			WHERE schemaname='{$this->_schema}' ORDER BY viewname";

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
	function setView($viewname, $definition) {
		return $this->createView($viewname, $definition, true);
	}

	// Sequence functions

	/**
	 * Returns all sequences in the current database
	 * @return A recordset
	 */
	function &getSequences() {
		$sql = "SELECT c.relname, u.usename FROM pg_catalog.pg_class c, pg_catalog.pg_user u, pg_catalog.pg_namespace n
			WHERE c.relowner=u.usesysid AND c.relnamespace=n.oid
			AND c.relkind = 'S' AND n.nspname='{$this->_schema}' ORDER BY relname";
			
		return $this->selectSet( $sql );
	}

	/**
	 * Returns properties of a single sequence
	 * @return A recordset
	 */
	function &getSequence($sequence) {
		$this->fieldClean($sequence);
		
		$sql = "SELECT sequence_name AS relname, * FROM \"{$sequence}\""; 
		
		return $this->selectSet( $sql );
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
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @return A recordset
	 */
	function &getIndexes($table = '') {
		$this->clean($table);

		$sql = "SELECT c2.relname, i.indisprimary, i.indisunique, pg_catalog.pg_get_indexdef(i.indexrelid) as pg_get_indexdef
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND pg_catalog.pg_table_is_visible(c.oid) 
			AND c.oid = i.indrelid AND i.indexrelid = c2.oid
			AND NOT i.indisprimary
			ORDER BY i.indisunique DESC, c2.relname";

		return $this->selectSet($sql);
	}

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function &getTriggers($table = '') {
		$this->clean($table);

		$sql = "SELECT t.tgname, t.tgisconstraint, t.tgdeferrable, t.tginitdeferred, t.tgtype, 
			t.tgargs, t.tgnargs, p.proname AS tgfname, c.relname, NULL AS tgdef
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

	// Function functions

	/**
	 * Returns a list of all functions in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @param $type If not null, will find all functions with return value = type 
	 *
  	 * @return All functions
	 */
	function &getFunctions($all = false, $type = null) {
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
				p.oid,
				p.proname,
				p.proretset,
				pg_catalog.format_type(p.prorettype, NULL) AS return_type,
				pg_catalog.oidvectortypes(p.proargtypes) AS arguments
			FROM pg_catalog.pg_proc p
			LEFT JOIN pg_catalog.pg_namespace n ON n.oid = p.pronamespace
			WHERE p.prorettype <> 'pg_catalog.cstring'::pg_catalog.regtype
			AND p.proargtypes[0] <> 'pg_catalog.cstring'::pg_catalog.regtype
			AND NOT p.proisagg
			AND {$where}
			ORDER BY p.proname, return_type
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
					pc.oid,
					proname,
					lanname as language,
					format_type(prorettype, NULL) as return_type,
					prosrc as source,
					probin as binary,
					proretset,
					proisstrict,
					provolatile,
					prosecdef,
					oidvectortypes(pc.proargtypes) AS arguments
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
		if ($f['proisstrict'])
			$temp[] = 'RETURNS NULL ON NULL INPUT';
		else
			$temp[] = 'CALLED ON NULL INPUT';
		
		// Security
		if ($f['prosecdef'])
			$temp[] = 'SECURITY DEFINER';
		else
			$temp[] = 'SECURITY INVOKER';
			
		return $temp;
	}	

	/**
	 * Returns a list of all functions that can be used in triggers
	 */
	function &getTriggerFunctions() {
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
		$this->fieldClean($returns);
		$this->clean($definition);
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
		$sql .= "{$returns} AS '\n";
		$sql .= $definition;
		$sql .= "\n'";
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
	 * @return A recordet
	 */
	function &getTypes($all = false) {
		if ($all)
			$where = 'pg_catalog.pg_type_is_visible(t.oid)';
		else
			$where = "n.nspname = '{$this->_schema}'";

		$sql = "SELECT
				pg_catalog.format_type(t.oid, NULL) AS typname,
				pu.usename AS typowner
			FROM (pg_catalog.pg_type t
				LEFT JOIN pg_catalog.pg_namespace n ON n.oid = t.typnamespace)
				LEFT JOIN pg_catalog.pg_user pu ON t.typowner = pu.usesysid
			WHERE (t.typrelid = 0 OR (SELECT c.relkind = 'c' FROM pg_catalog.pg_class c WHERE c.oid = t.typrelid)) AND t.typname !~ '^_'
			AND {$where}
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}
	
	// Rule functions
	
	/**
	 * Removes a rule from a relation
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
	 * Returns a list of all rules on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function &getRules($table) {
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
	 * Edits a rule
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
	 * A helper function for getConstraints that translates
	 * an array of attribute numbers to an array of field names.
	 * @param $table The name of the table
	 * @param $columsn An array of column ids
	 * @return An array of column names
	 */
	function &getKeys($table, $colnums) {
		$this->clean($table);
		$this->arrayClean($colnums);

		$sql = "SELECT attnum, attname FROM pg_catalog.pg_attribute
			WHERE attnum IN ('" . join("','", $colnums) . "')
			AND attrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_catalog.pg_namespace
					WHERE nspname='{$this->_schema}'))";

		$rs = $this->selectSet($sql);

		$temp = array();
		while (!$rs->EOF) {
			$temp[$rs->f['attnum']] = $rs->f['attname'];
			$rs->moveNext();
		}

		$atts = array();
		foreach ($colnums as $v) {
			$atts[] = '"' . $temp[$v] . '"';
		}
		
		return $atts;
	}

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function &getConstraints($table) {
		$this->clean($table);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$sql = "
			SELECT conname, consrc, contype, indkey FROM (
				SELECT
					conname,
					CASE WHEN contype='f' THEN
						pg_catalog.pg_get_constraintdef(oid)
					ELSE
						'CHECK ' || consrc
					END AS consrc,
					contype,
					conrelid AS relid,
					NULL AS indkey
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
					indkey
				FROM
					pg_catalog.pg_class pc,
					pg_catalog.pg_index pi
				WHERE
					pc.oid=pi.indexrelid
					AND (pi.indisunique OR pi.indisprimary)
			) AS sub
			WHERE relid = (SELECT oid FROM pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_namespace
					WHERE nspname='{$this->_schema}'))
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

	// Capabilities
	function hasSchemas() { return true; }
	function hasConversions() { return true; }
	function hasCluster() { return true; }
	function hasDropBehavior() { return true; }
	function hasDropColumn() { return true; }
	function hasSRFs() { return true; }

}

?>
