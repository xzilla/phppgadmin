<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres71.php,v 1.32 2003/05/16 05:58:08 chriskl Exp $
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

	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres71($host, $port, $database, $user, $password) {
		$this->Postgres($host, $port, $database, $user, $password);
	}

	// Database functions

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function &getDatabases() {
		global $conf;

		if (isset($conf['owned_only']) && $conf['owned_only']) {
			$username = $_SESSION['webdbUsername'];
			$this->clean($username);
			$clause = " AND pu.usename='{$username}'";
		}
		else $clause = '';
		
		if (!$conf['show_system'])
			$where = 'AND NOT pdb.datistemplate';
		else
			$where = 'AND pdb.datallowconn';

		$sql = "SELECT pdb.datname, pu.usename AS owner, pg_encoding_to_char(encoding) AS encoding, pde.description FROM
					pg_database pdb LEFT JOIN pg_description pde ON pdb.oid=pde.objoid,
					pg_user pu
					WHERE pdb.datdba = pu.usesysid
					{$where}
					{$clause}
					ORDER BY pdb.datname";

		return $this->selectSet($sql);
	}

	// Table functions

	/**
	 * Returns a list of all functions in the database
 	 * @param $all If true, will find all available functions, if false just userland ones
	 * @return All functions
	 */
	function &getFunctions($all = false) {
		global $conf;
		
		if ($all || $conf['show_system'])
			$where = '';
		else
			$where = "AND pc.oid > '{$this->_lastSystemOID}'::oid";

		$sql = 	"SELECT
				pc.oid,
				proname,
				proretset,
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
				proretset,
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
	 * Changes the owner of a table
	 * @param $table The table whose owner is to change
	 * @param $owner The new owner (username) of the table
	 * @return 0 success
	 */
	function setOwnerOfTable($table, $owner) {
		$this->fieldClean($table);
		$this->fieldClean($owner);
		
		$sql = "ALTER TABLE \"{$table}\" OWNER TO \"{$owner}\"";

		return $this->execute($sql);
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
