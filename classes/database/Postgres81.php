<?php

/**
 * PostgreSQL 8.1 support
 *
 * $Id: Postgres81.php,v 1.11 2006/09/28 13:04:00 xzilla Exp $
 */

include_once('./classes/database/Postgres80.php');

class Postgres81 extends Postgres80 {

	var $major_version = 8.1;

	// Map of database encoding names to HTTP encoding names.  If a
	// database encoding does not appear in this list, then its HTTP
	// encoding name is the same as its database encoding name.
	var $codemap = array(
		'BIG5' => 'BIG5',
		'EUC_CN' => 'GB2312',
		'EUC_JP' => 'EUC-JP',
		'EUC_KR' => 'EUC-KR',
		'EUC_TW' => 'EUC-TW', 
		'GB18030' => 'GB18030',
		'GBK' => 'GB2312',
		'ISO_8859_5' => 'ISO-8859-5',
		'ISO_8859_6' => 'ISO-8859-6',
		'ISO_8859_7' => 'ISO-8859-7',
		'ISO_8859_8' => 'ISO-8859-8',
		'JOHAB' => 'CP1361',
		'KOI8' => 'KOI8-R',
		'LATIN1' => 'ISO-8859-1',
		'LATIN2' => 'ISO-8859-2',
		'LATIN3' => 'ISO-8859-3',
		'LATIN4' => 'ISO-8859-4',
		'LATIN5' => 'ISO-8859-9',
		'LATIN6' => 'ISO-8859-10',
		'LATIN7' => 'ISO-8859-13',
		'LATIN8' => 'ISO-8859-14',
		'LATIN9' => 'ISO-8859-15',
		'LATIN10' => 'ISO-8859-16',
		'SJIS' => 'SHIFT_JIS',
		'SQL_ASCII' => 'US-ASCII',
		'UHC' => 'WIN949',
		'UTF8' => 'UTF-8',
		'WIN866' => 'CP866',
		'WIN874' => 'CP874',
		'WIN1250' => 'CP1250',
		'WIN1251' => 'CP1251',
		'WIN1252' => 'CP1252',
		'WIN1256' => 'CP1256',
		'WIN1258' => 'CP1258'
	);
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres81($conn) {
		$this->Postgres80($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc81.php');
		return $this->help_page;
	}

	// Database Functions
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
	 * Returns prepared transactions information
	 * @param $database (optional) Find only prepared trasactions executed in a specific database
	 * @return A recordset
	 */
	function getPreparedXacts($database = null) {
		if ($database === null)
			$sql = "SELECT * FROM pg_prepared_xacts";
		else {
			$this->clean($database);
			$sql = "SELECT transaction, gid, prepared, owner FROM pg_prepared_xacts WHERE database='{$database}' 
				   ORDER BY owner";
		}
		
		return $this->selectSet($sql);
	}

	// Roles
	
	/**
	 * Changes a role's password
	 * @param $rolename The rolename
	 * @param $password The new password
	 * @return 0 success
	 */
	function changePassword($rolename, $password) {
		$enc = $this->_encryptPassword($rolename, $password);
		$this->fieldClean($rolename);
		$this->clean($enc);
		
		$sql = "ALTER ROLE \"{$rolename}\" WITH ENCRYPTED PASSWORD '{$enc}'";
		
		return $this->execute($sql);
	}
	
	/**
	 * Returns all roles in the database cluster
	 * @return All roles
	 */
	function getRoles() {
		$sql = "SELECT * FROM pg_catalog.pg_roles ORDER BY rolname";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Returns information about a single role
	 * @param $rolename The username of the role to retrieve
	 * @return The role's data
	 */
	function getRole($rolename) {
		$this->clean($rolename);
		
		$sql = "SELECT * FROM pg_catalog.pg_roles WHERE rolname='{$rolename}'";
		
		return $this->selectSet($sql);
	}

	/**
	 * Creates a new role
	 * @param $rolename The rolename of the role to create
	 * @param $password A password for the role
	 * @param $createdb boolean Whether or not the role can create databases
	 * @param $createrole boolean Whether or not the role can create other roles
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  '' means never expire
	 * @param $group (array) The groups to create the role in
	 * @return 0 success
	 */
	function createRole($rolename, $password, $createdb, $super, $createrole, $inherits, $login, $expiry, $conn, $roles) {
		$enc = $this->_encryptPassword($rolename, $password);
		$this->fieldClean($rolename);
		$this->clean($expiry);
		$this->clean($conn);
		$this->fieldArrayClean($roles);

		$sql = "CREATE ROLE \"{$rolename}\"";
		if ($password != '') $sql .= " WITH ENCRYPTED PASSWORD '{$enc}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createrole) ? ' CREATEROLE' : ' NOCREATEROLE';
		$sql .= ($super) ? ' SUPERUSER' : ' NOSUPERUSER';
		$sql .= ($inherits) ? ' INHERIT' : ' NOINHERIT';
		$sql .= ($login) ? ' LOGIN' : ' NOLOGIN';
		if ($conn != '') $sql .= " CONNECTION LIMIT {$conn}";
		if (is_array($roles) && sizeof($roles) > 0) $sql .= " IN ROLE \"" . join('", "', $roles) . "\"";
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Adjusts a role's info
	 * @param $rolename The rolename of the role to modify
	 * @param $password A new password for the role
	 * @param $createdb boolean Whether or not the role can create databases
	 * @param $createrole boolean Whether or not the role can create other roles
	 * @param $inherit Inherits privs from parent role or not.
	 * @param $login Can login or not
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  '' means never expire.
	 * @return 0 success
	 */
	function setRole($rolename, $password, $createdb, $createrole, $inherit, $login, $expiry) {
		$enc = $this->_encryptPassword($rolename, $password);
		$this->fieldClean($rolename);
		$this->clean($expiry);
		
		$sql = "ALTER ROLE \"{$rolename}\"";
		if ($password != '') $sql .= " WITH ENCRYPTED PASSWORD '{$enc}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createrole) ? ' CREATEROLE' : ' NOCREATEROLE';
		$sql .= ($inherit) ? ' INHERIT' : ' NOINHERIT';
		$sql .= ($login) ? ' LOGIN' : ' NOLOGIN';
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		else $sql .= " VALID UNTIL 'infinity'";
		
		return $this->execute($sql);
	}	

	/**
	 * Removes a role
	 * @param $rolename The rolename of the role to drop
	 * @return 0 success
	 */
	function dropRole($rolename) {
		$this->fieldClean($rolename);

		$sql = "DROP ROLE \"{$rolename}\"";
		
		return $this->execute($sql);
	}

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
	 * Returns all available process information.
	 * @return A recordset
	 */
	function getAutovacuum() {
		$sql = "SELECT vacrelid, nspname, relname, enabled, vac_base_thresh, vac_scale_factor, anl_base_thresh, anl_scale_factor, vac_cost_delay, vac_cost_limit 
					FROM pg_autovacuum join pg_class on (oid=vacrelid) join pg_namespace on (oid=relnamespace) ORDER BY nspname, relname";
		
		return $this->selectSet($sql);
	}
	

	/**
	 * Enables a trigger
	 * @param $tgname The name of the trigger to enable
	 * @param $table The table in which to enable the trigger
	 * @return 0 success
	 */
	function enableTrigger($tgname, $table) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);

		$sql = "ALTER TABLE \"{$table}\" ENABLE TRIGGER \"{$tgname}\"";

		return $this->execute($sql);
	}

	/**
	 * Disables a trigger
	 * @param $tgname The name of the trigger to disable
	 * @param $table The table in which to disable the trigger
	 * @return 0 success
	 */
	function disableTrigger($tgname, $table) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);

		$sql = "ALTER TABLE \"{$table}\" DISABLE TRIGGER \"{$tgname}\"";

		return $this->execute($sql);
	}

	
	// Capabilities
	function hasServerAdminFuncs() { return true; }
	function hasRoles() { return true; }
	function hasAutovacuum() { return true; }
	function hasPreparedXacts() { return true; }
	function hasDisableTriggers() { return true; }
}

?>
