<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres74.php,v 1.14 2003/09/21 02:58:16 chriskl Exp $
 */

include_once('classes/database/Postgres73.php');

class Postgres74 extends Postgres73 {

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	// Max object name length
	var $_maxNameLen = 63;

	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres74($host, $port, $database, $user, $password) {
		$this->Postgres73($host, $port, $database, $user, $password);
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

	// Group functions
	
	/**
	 * Return users in a specific group
	 * @param $groname The name of the group
	 * @return All users in the group
	 */
	function &getGroup($groname) {
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
	function &getSchemas() {
		global $conf;
		
		if (!$conf['show_system']) $and = "AND nspname NOT LIKE 'pg_%' AND nspname != 'information_schema'";
		else $and = '';
		$sql = "SELECT pn.nspname, pu.usename AS nspowner FROM pg_catalog.pg_namespace pn, pg_catalog.pg_user pu
			WHERE pn.nspowner = pu.usesysid
			{$and}ORDER BY nspname";

		return $this->selectSet($sql);
	}	

	// Index functions
	
	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @return A recordset
	 */
	function &getIndexes($table = '') {
		$this->clean($table);

		$sql = "SELECT c2.relname, i.indisprimary, i.indisunique, pg_catalog.pg_get_indexdef(i.indexrelid, 0, true) as pg_get_indexdef
			FROM pg_catalog.pg_class c, pg_catalog.pg_class c2, pg_catalog.pg_index i
			WHERE c.relname = '{$table}' AND pg_catalog.pg_table_is_visible(c.oid) 
			AND c.oid = i.indrelid AND i.indexrelid = c2.oid
			AND NOT i.indisprimary
			ORDER BY i.indisunique DESC, c2.relname";

		return $this->selectSet($sql);
	}

	// View functions
	
	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function &getView($view) {
		$this->clean($view);
		
		$sql = "SELECT viewname, viewowner, pg_catalog.pg_get_viewdef(viewname, true) AS definition FROM pg_catalog.pg_views WHERE viewname='$view'";

		return $this->selectSet($sql);
	}	

	// Trigger functions
	
	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function &getTriggers($table = '') {
		$this->clean($table);

		$sql = "SELECT t.tgname, pg_catalog.pg_get_triggerdef(t.oid) AS tgdef
			FROM pg_catalog.pg_trigger t
			WHERE t.tgrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
			AND relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
			AND (NOT tgisconstraint OR NOT EXISTS
			(SELECT 1 FROM pg_catalog.pg_depend d    JOIN pg_catalog.pg_constraint c
			ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
			WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))";

		return $this->selectSet($sql);
	}

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function &getConstraints($table) {
		$this->clean($table);

		$sql = "SELECT
				conname,
				pg_catalog.pg_get_constraintdef(oid, true) AS consrc,
				contype
			FROM
				pg_catalog.pg_constraint
			WHERE
				conrelid = (SELECT oid FROM pg_class WHERE relname='{$table}'
					AND relnamespace = (SELECT oid FROM pg_namespace
					WHERE nspname='{$this->_schema}'))
		";

		return $this->selectSet($sql);
	}
	
	// Domain functions
	
	/**
	 * Get domain constraints
	 * @param $domain The name of the domain whose constraints to fetch
	 * @return A recordset
	 */
	function &getDomainConstraints($domain) {
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
	 * Drop a domain constraint
	 * @param $domain The domain from which to remove the constraint
	 * @param $constraint The constraint to remove
	 * @param $cascade True to cascade, false otherwise
	 * @return 0 success
	 */
	function dropDomainConstraint($domain, $constraint, $cascade) {
		$this->fieldClean($domain);
		$this->fieldClean($constraint);
		
		$sql = "ALTER DOMAIN \"{$domain}\" DROP CONSTRAINT \"{$constraint}\"";
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

		$sql = "ALTER DOMAIN \"{$domain}\" ADD ";
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
			$sql = "ALTER DOMAIN \"{$domain}\" DROP DEFAULT";
		else
			$sql = "ALTER DOMAIN \"{$domain}\" SET DEFAULT {$domdefault}";
		
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		// NOT NULL
		if ($domnotnull)
			$sql = "ALTER DOMAIN \"{$domain}\" SET NOT NULL";
		else
			$sql = "ALTER DOMAIN \"{$domain}\" DROP NOT NULL";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		// Owner
		$sql = "ALTER DOMAIN \"{$domain}\" OWNER TO \"{$domowner}\"";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}
		
		return $this->endTransaction();
	}	
	 
	// Capabilities
	function hasGrantOption() { return true; }
	function hasDomainConstraints() { return true; }
	
}

?>
