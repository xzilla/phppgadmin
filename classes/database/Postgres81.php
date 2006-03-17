<?php

/**
 * PostgreSQL 8.1 support
 *
 * $Id: Postgres81.php,v 1.5 2006/03/17 21:14:30 xzilla Exp $
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

		$sql = "SELECT pdb.datname AS datname, pu.usename AS datowner, pg_encoding_to_char(encoding) AS datencoding,
                               (SELECT description FROM pg_catalog.pg_description pd WHERE pdb.oid=pd.objoid) AS datcomment,
                               (SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=pdb.dattablespace) AS tablespace,
							   pg_catalog.pg_database_size(oid) as dbsize 
                        FROM pg_catalog.pg_database pdb, pg_catalog.pg_user pu
			WHERE pdb.datdba = pu.usesysid
			{$where}
			{$clause}
			{$orderby}";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all available process information.
	 * @param $database (optional) Find only connections to specified database
	 * @return A recordset
	 */
	function getAutovacuum() {
		$sql = "SELECT vacrelid, nspname, relname, enabled, vac_base_thresh, vac_scale_factor, anl_base_thresh, anl_scale_factor, vac_cost_delay, vac_cost_limit 
					FROM pg_autovacuum join pg_class on (oid=vacrelid) join pg_namespace on (oid=relnamespace) ORDER BY nspname, relname";
		
		return $this->selectSet($sql);
	}

	// Capabilities
	function hasServerAdminFuncs() { return true; }
	function hasAutovacuum() { return true; }
}

?>
