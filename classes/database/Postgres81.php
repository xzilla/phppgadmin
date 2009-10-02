<?php

/**
 * PostgreSQL 8.1 support
 *
 * $Id: Postgres81.php,v 1.21 2008/01/19 13:46:15 ioguix Exp $
 */

include_once('./classes/database/Postgres82.php');

class Postgres81 extends Postgres82 {

	var $major_version = 8.1;
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
	// List of characters in acl lists and the privileges they
	// refer to.
	var $privmap = array(
		'r' => 'SELECT',
		'w' => 'UPDATE',
		'a' => 'INSERT',
		'd' => 'DELETE',
		'R' => 'RULE',
		'x' => 'REFERENCES',
		't' => 'TRIGGER',
		'X' => 'EXECUTE',
		'U' => 'USAGE',
		'C' => 'CREATE',
		'T' => 'TEMPORARY'
	);
	// Array of allowed index types
	var $typIndexes = array('BTREE', 'RTREE', 'GIST', 'HASH');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres81($conn) {
		$this->Postgres82($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc81.php');
		return $this->help_page;
	}

	// Database functions

	/**
	 * Returns all databases available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function getDatabases($currentdatabase = NULL) {
		global $conf, $misc;
		
		$server_info = $misc->getServerInfo();
		
		if (isset($conf['owned_only']) && $conf['owned_only'] && !$this->isSuperUser($server_info['username'])) {
			$username = $server_info['username'];
			$this->clean($username);
			$clause = " AND pr.rolname='{$username}'";
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

		$sql = "SELECT pdb.datname AS datname, pr.rolname AS datowner, pg_encoding_to_char(encoding) AS datencoding,
                               (SELECT description FROM pg_catalog.pg_description pd WHERE pdb.oid=pd.objoid) AS datcomment,
                               (SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=pdb.dattablespace) AS tablespace,
							   pg_catalog.pg_database_size(pdb.oid) as dbsize 
                        FROM pg_catalog.pg_database pdb LEFT JOIN pg_catalog.pg_roles pr ON (pdb.datdba = pr.oid)  
						WHERE true 
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
	function alterDatabase($dbName, $newName, $newOwner = '', $comment = '') {
		$this->clean($dbName);
		$this->clean($newName);
		$this->clean($newOwner);
		//ignore $comment, not supported pre 8.2
			
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

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table,
	 * including constraint name, definition, related col and referenced namespace,
	 * table and col if needed
	 * @param $table the table where we are looking for fk
	 * @return a recordset
	 */
	function getConstraintsWithFields($table) {
		global $data;

		$c_schema = $this->_schema;
		$this->clean($c_schema);
		$data->clean($table);

		// get the max number of col used in a constraint for the table
		$sql = "SELECT DISTINCT
				max(SUBSTRING(array_dims(c.conkey) FROM  '^\\\[.*:(.*)\\\]$')) as nb
		FROM
		      pg_catalog.pg_constraint AS c
		  JOIN pg_catalog.pg_class AS r ON (c.conrelid = r.oid)
		      JOIN pg_catalog.pg_namespace AS ns ON r.relnamespace=ns.oid
		WHERE
			r.relname = '{$table}' AND ns.nspname='{$c_schema}'";

		$rs = $this->selectSet($sql);

		if ($rs->EOF) $max_col = 0;
		else $max_col = $rs->fields['nb'];

		$sql = '
			SELECT
				c.oid AS conid, c.contype, c.conname, pg_catalog.pg_get_constraintdef(c.oid,true) AS consrc,
				ns1.nspname as p_schema, r1.relname as p_table, ns2.nspname as f_schema,
				r2.relname as f_table, f1.attname as p_field, f1.attnum AS p_attnum,
				f2.attname as f_field, f2.attnum AS f_attnum,
				pg_catalog.obj_description(c.oid, \'pg_constraint\') AS constcomment,
				confrelid
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
			ORDER BY 1", $table, $c_schema);

		return $this->selectSet($sql);
	}

	// Tablespace functions
	
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

	// Capabilities

	function hasCreateTableLikeWithConstraints() {return false;}
	function hasSharedComments() {return false;}
	function hasConcurrentIndexBuild() {return false;}
}

?>
