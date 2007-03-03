<?php

/**
 * PostgreSQL 8.2 support
 *
 * $Id: Postgres82.php,v 1.3.2.1 2007/03/03 14:02:38 xzilla Exp $
 */

include_once('./classes/database/Postgres81.php');

class Postgres82 extends Postgres81 {

	var $major_version = 8.2;
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231;

  	// List of all legal privileges that can be applied to different types
  	// of objects.
  	var $privlist = array(
  		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
  		'view' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
  		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES'),
  		'database' => array('CREATE', 'TEMPORARY', 'CONNECT', 'ALL PRIVILEGES'),
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
  		'T' => 'TEMPORARY',
  		'c' => 'CONNECT'
  	);	

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres82($conn) {
		$this->Postgres81($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc82.php');
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
                               (SELECT description FROM pg_catalog.pg_shdescription pd WHERE pdb.oid=pd.objoid) AS datcomment,
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
	 * @return -4 comment error
	 */
	function alterDatabase($dbName, $newName, $newOwner = '',$comment = '')
	{
		//ignore $newowner, not supported pre 8.0
		//ignore $comment, not supported pre 8.2
		$this->clean($dbName);
		$this->clean($newName);
		
		$status = $this->alterDatabaseRename($dbName, $newName);
		if ($status != 0) return -3;

		if (trim($comment) != '' ) {	
			$status = $this->setComment('DATABASE',$dbName,'', $comment);
			if ($status != 0) return -4;
		}
		else return 0;
	}

	/**
	 * Return the database comment of a db from the shared description table
	 * @param string $database the name of the database to get the comment for
	 * @return recordset of the db comment info
	 */
	function getDatabaseComment($database) {
		$this->clean($database);
		$sql = "SELECT description FROM pg_catalog.pg_database JOIN pg_catalog.pg_shdescription ON (oid=objoid) WHERE pg_database.datname = '{$database}' ";
		return $this->selectSet($sql);
	}

	// Tablespace functions
	
	/**
	 * Retrieves information for all tablespaces
	 * @param $all Include all tablespaces (necessary when moving objects back to the default space)
	 * @return A recordset
	 */
	function getTablespaces($all = false) {
		global $conf;
		
		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation,
                    (SELECT description FROM pg_catalog.pg_shdescription pd WHERE pg_tablespace.oid=pd.objoid) AS spccomment
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
		
		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation,
                    (SELECT description FROM pg_catalog.pg_shdescription pd WHERE pg_tablespace.oid=pd.objoid) AS spccomment
					FROM pg_catalog.pg_tablespace WHERE spcname='{$spcname}'";
					
		return $this->selectSet($sql);
	}
	
	// Capabilities
	function hasSharedComments() {return true;}
}

?>
