<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres73.php,v 1.186 2008/01/19 13:46:15 ioguix Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('./classes/database/Postgres74.php');

class Postgres73 extends Postgres74 {

	var $major_version = 7.3;
	// How often to execute the trigger
	var $triggerFrequency = array('ROW');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres73($conn) {
		$this->Postgres74($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc73.php');
		return $this->help_page;
	}

	// Database functions

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
		$sql = "
		SELECT pn.nspname, pu.usename AS nspowner,
			pg_catalog.obj_description(pn.oid, 'pg_namespace') AS nspcomment
                  FROM pg_catalog.pg_namespace pn LEFT JOIN pg_catalog.pg_user pu ON (pn.nspowner = pu.usesysid)
		{$where}
		ORDER BY nspname";

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

	// View function

	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function getView($view) {
		$this->clean($view);

		$sql = "
			SELECT c.relname, n.nspname, pg_catalog.pg_get_userbyid(c.relowner) AS relowner,
            	pg_catalog.pg_get_viewdef(c.oid) AS vwdefinition, pg_catalog.obj_description(c.oid, 'pg_class') AS relcomment
			FROM pg_catalog.pg_class c LEFT JOIN pg_catalog.pg_namespace n ON (n.oid = c.relnamespace)
			WHERE (c.relname = '$view')
				AND n.nspname='{$this->_schema}'";

		return $this->selectSet($sql);
	}

	// Sequence functions

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
	 */
    protected
    function _alterSequence($seqrs, $name, $comment, $owner, $schema, $increment,
	$minvalue, $maxvalue, $startvalue, $cachevalue, $cycledvalue) {
		/* $schema not supported in pg80- */
		$this->fieldArrayClean($seqrs->fields);

		// Comment
		$this->clean($comment);
		$status = $this->setComment('SEQUENCE', $seqrs->fields['seqname'], '', $comment);
		if ($status != 0)
			return -4;

		// Owner
		$this->fieldClean($owner);
		$status = $this->alterSequenceOwner($seqrs, $owner);
		if ($status != 0)
			return -5;

		// Rename
		$this->fieldClean($name);
		$status = $this->alterSequenceName($seqrs, $name);
		if ($status != 0)
			return -3;

		return 0;
	}

	// Indexe functions

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

    // Role, User and Group functions

	/**
	 * Returns users in a specific group
	 * @param $groname The name of the group
	 * @return All users in the group
	 */
	function getGroup($groname) {
		$this->clean($groname);

		$sql = "SELECT grolist FROM pg_group WHERE groname = '{$groname}'";

		$grodata = $this->selectSet($sql);
		if ($grodata->fields['grolist'] !== null && $grodata->fields['grolist'] != '{}') {
			$members = $grodata->fields['grolist'];
			$members = ereg_replace("\{|\}","",$members);
			$this->clean($members);

			$sql = "SELECT usename FROM pg_user WHERE usesysid IN ({$members}) ORDER BY usename";
	}
		else $sql = "SELECT usename FROM pg_user WHERE false";

		return $this->selectSet($sql);
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
	 * @return -2 drop function error
	 * @return -3 create function error
	 * @return -4 comment error
	 */
	function setFunction($function_oid, $funcname, $newname, $args, $returns, $definition, $language, $flags, $setof, $rows, $cost, $comment) {
		// Begin a transaction
		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Replace the existing function
		if ($funcname != $newname) {
			$status = $this->dropFunction($function_oid, false);
		if ($status != 0) {
			$this->rollbackTransaction();
				return -2;
		}

			$status = $this->createFunction($newname, $args, $returns, $definition, $language, $flags, $setof, $cost, $rows, false);
		if ($status != 0) {
			$this->rollbackTransaction();
				return -3;
	}
		} else {
			$status = $this->createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, $cost, $rows, true);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
		}
	}

		// Comment on the function
		$this->fieldClean($newname);
		$this->clean($comment);
		$status = $this->setComment('FUNCTION', "\"{$newname}\"({$args})", null, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		return $this->endTransaction();
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
					SELECT 1
					FROM pg_catalog.pg_depend AS d
						JOIN pg_catalog.pg_constraint AS c
					ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
					WHERE d.classid = pc.tableoid AND d.objid = pc.oid
						AND d.deptype = 'i' AND c.contype IN ('u', 'p')
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

    // Misc functions

	/**
	 * Sets up the data object for a dump.  eg. Starts the appropriate
	 * transaction, sets variables, etc.
	 * @return 0 success
	 */
	function beginDump() {
		// Begin serializable transaction (to dump consistent data)
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		// Set serializable
		$sql = "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
	}

		// Set datestyle to ISO
		$sql = "SET DATESTYLE = ISO";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
	}

	// Capabilities

	function hasAlterAggregate() { return false; }
	function hasAlterDatabaseRename() { return false; }
	function hasAlterSequenceProps() { return false; }
	function hasCreateTableLike() {return false;}
	function hasDomainConstraints() { return false; }
	function hasGrantOption() { return false; }
	function hasReadOnlyQueries() { return false; }
	function hasRecluster() { return false; }
	function hasUserRename() { return false; }
}

?>
