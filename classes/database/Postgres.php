<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres.php,v 1.98 2003/05/08 15:14:14 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('classes/database/BaseDB.php');

class Postgres extends BaseDB {

	var $dbFields = array('dbname' => 'datname', 'dbcomment' => 'description', 'encoding' => 'encoding', 'owner' => 'owner');
	var $tbFields = array('tbname' => 'tablename', 'tbowner' => 'tableowner');
	var $vwFields = array('vwname' => 'viewname', 'vwowner' => 'viewowner', 'vwdef' => 'definition');
	var $uFields = array('uname' => 'usename', 'usuper' => 'usesuper', 'ucreatedb' => 'usecreatedb', 'uexpires' => 'valuntil');
	var $grpFields = array('groname' => 'groname', 'grolist' => 'grolist');
	var $sqFields = array('seqname' => 'relname', 'seqowner' => 'usename', 'lastvalue' => 'last_value', 'incrementby' => 'increment_by', 'maxvalue' => 'max_value', 'minvalue'=> 'min_value', 'cachevalue' => 'cache_value', 'logcount' => 'log_cnt', 'iscycled' => 'is_cycled', 'iscalled' => 'is_called' );
	var $ixFields = array('idxname' => 'relname', 'idxdef' => 'pg_get_indexdef', 'uniquekey' => 'indisunique', 'primarykey' => 'indisprimary');
	var $rlFields = array('rulename' => 'rulename', 'ruledef' => 'definition');
	var $tgFields = array('tgname' => 'tgname', 'tgdef' => 'tgdef');
	var $cnFields = array('conname' => 'conname', 'consrc' => 'consrc', 'contype' => 'contype');
	var $typFields = array('typname' => 'typname', 'typowner' => 'typowner', 'typin' => 'typin',
		'typout' => 'typout', 'typlen' => 'typlen', 'typdef' => 'typdef', 'typelem' => 'typelem',
		'typdelim' => 'typdelim', 'typbyval' => 'typbyval', 
		'typalign' => 'typalign', 'typstorage' => 'typstorage');

	// Array of allowed type alignments
	var $typAligns = array('char', 'int2', 'int4', 'double');
	// The default type alignment
	var $typAlignDef = 'int4';
	// Array of allowed type storage attributes
	var $typStorages = array('plain', 'external', 'extended', 'main');
	// The default type storage
	var $typStorageDef = 'plain';
	// Extra "magic" types
	var $extraTypes = array('SERIAL');
	// Array of allowed index types
	var $typIndexes = array('BTREE', 'RTREE', 'GIST', 'HASH');
	// Default index type 
	var $typIndexDef = 'BTREE';
	// Array of allowed trigger events	
	var $triggerEvents= array('INSERT', 'UPDATE', 'DELETE', 'INSERT OR UPDATE', 'INSERT OR DELETE', 
		'UPDATE OR DELETE', 'INSERT OR UPDATE OR DELETE');
	// When to execute the trigger	
	var $triggerExecTimes = array('BEFORE', 'AFTER');
	// Foreign key actions
	var $fkactions = array('NO ACTION', 'RESTRICT', 'CASCADE', 'SET NULL', 'SET DEFAULT');
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 18539;
	var $_maxNameLen = 31;
	
	// Name of id column
	var $id = 'oid';
	
	// Map of database encoding names to HTTP encoding names.  If a
	// database encoding does not appear in this list, then its HTTP
	// encoding name is the same as its database encoding name.
	var $codemap = array(
		'ALT' => 'CP866',
		'EUC_CN' => 'GB2312',
		'EUC_JP' => 'EUCJP',
		'EUC_KR' => 'EUCKR',
		'EUC_TW' => 'EUCTW', 
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
		// The following encoding map is a known error in PostgreSQL < 7.2
		// See the constructor for Postgres72.
		'LATIN5' => 'ISO-8859-5',
		'LATIN6' => 'ISO-8859-10',
		'LATIN7' => 'ISO-8859-13',
		'LATIN8' => 'ISO-8859-14',
		'LATIN9' => 'ISO-8859-15',
		'LATIN10' => 'ISO-8859-16',
		'SQL_ASCII' => 'US-ASCII',
		'TCVN' => 'CP1258',
		'UNICODE' => 'UTF-8',
		'WIN' => 'CP1251',
		'WIN874' => 'CP874',
		'WIN1256' => 'CP1256'
	);
	
	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'ALL'),
		'view' => array('SELECT', 'RULE', 'ALL'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL')
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
	
	// Rule action types
	var $rule_events = array('SELECT', 'INSERT', 'UPDATE', 'DELETE');

	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to. NULL for default.
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres($host, $port, $database, $user, $password) {
		$this->BaseDB('postgres7');

		// Ignore host if null
		if ($host === null || $host == '')
			$pghost = '';
		else
			$pghost = "{$host}:{$port}";

		if ($database === null || $database == '') $database = 'template1';

		$this->conn->connect($pghost, $user, $password, $database);
	}

	/**
	 * Cleans (escapes) a string
	 * @param $str The string to clean, by reference
	 * @return The cleaned string
	 */
	function clean(&$str) {
		if ($str === null) return null;
		if (function_exists('pg_escape_string'))
			$str = pg_escape_string($str);
		else
			$str = addslashes($str);
		return $str;
	}
	
	/**
	 * Cleans (escapes) an object name (eg. table, field)
	 * @param $str The string to clean, by reference
	 * @return The cleaned string
	 */
	function fieldClean(&$str) {
		if ($str === null) return null;
		$str = str_replace('"', '""', $str);
		return $str;
	}

	/**
	 * Cleans (escapes) an array
	 * @param $arr The array to clean, by reference
	 * @return The cleaned array
	 */
	function arrayClean(&$arr) {
		foreach ($arr as $k => $v) {
			if ($v === null) continue;
			if (function_exists('pg_escape_string'))
				$arr[$k] = pg_escape_string($v);
			else
				$arr[$k] = addslashes($v);
		}
		return $arr;
	}

	/**
	 * Cleans (escapes) an array of field names
	 * @param $arr The array to clean, by reference
	 * @return The cleaned array
	 */
	function fieldArrayClean(&$arr) {
		foreach ($arr as $k => $v) {
			if ($v === null) continue;
			$arr[$k] = str_replace('"', '""', $v);
		}
		return $arr;
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

		$sql = "SELECT pdb.datname, pu.usename AS owner, pg_encoding_to_char(encoding) AS encoding, pde.description FROM
					pg_database pdb LEFT JOIN pg_description pde ON pdb.oid=pde.objoid,
					pg_user pu
					WHERE pdb.datdba = pu.usesysid
					AND NOT pdb.datistemplate
					{$clause}
					ORDER BY pdb.datname";

		return $this->selectSet($sql);
	}

	/**
	 * Return all information about a particular database
	 * @param $database The name of the database to retrieve
	 * @return The database info
	 */
	function &getDatabase($database) {
		$this->clean($database);
		$sql = "SELECT * FROM pg_database WHERE datname='{$database}'";
		return $this->selectRow($sql);
	}

	/**
	 * Returns the current database encoding
	 * @return The encoding.  eg. SQL_ASCII, UTF-8, etc.
	 */
	function getDatabaseEncoding() {
		$sql = "SELECT getdatabaseencoding() AS encoding";
		
		return $this->selectField($sql, 'encoding');
	}
	
	/**
	 * Sets the client encoding
	 * @param $encoding The encoding to for the client
	 * @return 0 success
	 */
	function setClientEncoding($encoding) {
		$this->clean($encoding);

		$sql = "SET CLIENT_ENCODING TO '{$encoding}'";
		
		return $this->execute($sql);
	}

	// Table functions

	/**
	 * Checks to see whether or not a table has a unique id column
	 * @param $table The table name
	 * @return True if it has a unique id, false otherwise
	 * @return -99 error
	 */
	function hasObjectID($table) {
		// 7.0 and 7.1 always had an oid column
		return true;
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

		$sql = "SELECT attnum, attname FROM pg_attribute WHERE attrelid=(SELECT oid FROM pg_class WHERE relname='{$table}') AND attnum IN ('" .
			join("','", $atts) . "')";

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
		
		$sql = "SELECT indrelid, indkey FROM pg_index WHERE indisprimary AND indrelid=(SELECT oid FROM pg_class WHERE relname='{$table}')";
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
	 * Outputs the HTML code for a particular field
	 * @param $name The name to give the field
	 * @param $value The value of the field.  Note this could be 'numeric(7,2)' sort of thing...
	 * @param $type The database type of the field
	 */
	function printField($name, $value, $type) {
		global $lang;
		
		switch ($type) {
			case 'bool':
			case 'boolean':
				echo "<select name=\"", htmlspecialchars($name), "\">\n";
				echo "<option value=\"Y\"", ($value) ? ' selected' : '', ">{$lang['stryes']}</option>\n";
				echo "<option value=\"N\"", (!$value) ? ' selected' : '', ">{$lang['strno']}</option>\n";
				echo "</select>\n";
				break;
			case 'text':
			case 'bytea':
				echo "<textarea name=\"", htmlspecialchars($name), "\" rows=\"5\" cols=\"28\" wrap=\"virtual\">\n";
				echo htmlspecialchars($value);
				echo "</textarea>\n";
				break;
			default:
				echo "<input name=\"", htmlspecialchars($name), "\" value=\"", htmlspecialchars($value), "\" size=\"35\" />\n";
				break;
		}		
	}	

	/**
	 * Return all database available on the server
	 * @return A list of databases, sorted alphabetically
	 */
	function &getLanguages() {
		$sql = "SELECT lanname, lanispl, lanpltrusted FROM pg_language ORDER BY lanname";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information about a particular database
	 * @param $database The name of the database to retrieve
	 * @return The database info
	 */
	function &getLanguage($database) {
		$this->clean($database);
		$sql = "SELECT * FROM pg_database WHERE datname='{$database}'";
		return $this->selectRow($sql);
	}

	/**
	 * Creates a database
	 * @param $database The name of the database to create
	 * @param $encoding Encoding of the database
	 * @return 0 success
	 */
	function createDatabase($database, $encoding) {
		$this->fieldClean($database);
		$this->clean($encoding);

		if ( $encoding == '' ) {
			$sql = "CREATE DATABASE \"{$database}\"";
		} else {
			$sql = "CREATE DATABASE \"{$database}\" WITH ENCODING='{$encoding}'";
		}
		return $this->execute($sql);
	}

	/**
	 * Drops a database
	 * @param $database The name of the database to drop
	 * @return 0 success
	 */
	function dropDatabase($database) {
		$this->fieldClean($database);
		$sql = "DROP DATABASE \"{$database}\"";
		return $this->execute($sql);
	}
	
	/**
	 * Dumps a database
	 */
	function dbDump($database) {
		global $appDumper;

		$database = escapeshellarg($database);

		passthru("/usr/local/bin/pg_dump {$database}");
	}

	// Table functions

	/**
	 * Return all tables in current database
	 * @return All tables, sorted alphabetically 
	 */
	function &getTables() {
		if (!$this->_showSystem) $where = "WHERE tablename NOT LIKE 'pg_%' ";
		else $where = '';
		$sql = "SELECT tablename, tableowner FROM pg_tables {$where}ORDER BY tablename";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information relating to a table
	 * @param $table The name of the table
	 * @return Table information
	 */
	function &getTableByName($table) {
		$this->clean($table);
		$sql = "SELECT * FROM pg_class WHERE relname='{$table}'";
		return $this->selectRow($sql);
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
			$sql = "SELECT
					a.attname, t.typname as type, a.attlen, a.atttypmod, a.attnotnull, a.atthasdef, adef.adsrc
				FROM
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum,
					pg_class c,
					pg_type t
				WHERE
					c.relname = '{$table}' AND a.attnum > 0 AND a.attrelid = c.oid AND a.atttypid = t.oid
				ORDER BY a.attnum";
		}
		else {
			$sql = "SELECT
					a.attname, t.typname as type, a.attlen, a.atttypmod, a.attnotnull, a.atthasdef, adef.adsrc
				FROM
					pg_attribute a LEFT JOIN pg_attrdef adef
					ON a.attrelid=adef.adrelid AND a.attnum=adef.adnum,
					pg_class c,
					pg_type t
				WHERE
					c.relname = '{$table}' AND a.attname='{$field}' AND a.attrelid = c.oid AND a.atttypid = t.oid
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
	 * @return -99 not implemented
	 */
	function dropColumn($table, $column, $cascade) {
		return -99;
	}
	
	/**
	 * Alters a column in a table
	 * @param $table The table in which the column resides
	 * @param $column The column to alter
	 * @param $name The new name for the column
	 * @param $notnull (boolean) True if not null, false otherwise
	 * @param $default The new default for the column
	 * @param $olddefault THe old default for the column
	 * @return 0 success
	 * @return -1 set not null error
	 * @return -2 set default error
	 * @return -3 rename column error
	 */
	function alterColumn($table, $column, $name, $notnull, $default, $olddefault) {
		$this->beginTransaction();

		// @@ NEED TO HANDLE "NESTED" TRANSACTION HERE
		$status = $this->setColumnNull($table, $column, !$notnull);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		// Set default, if it has changed
		if ($default != $olddefault) {
			if ($default == '')
				$status = $this->dropColumnDefault($table, $column);
			else 
				$status = $this->setColumnDefault($table, $column, $default);

			if ($status != 0) {
				$this->rollbackTransaction();
				return -2;
			}
		}

		// Rename the column, if it has been changed
		if ($column != $name) {
			$status = $this->renameColumn($table, $column, $name);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}

		return $this->endTransaction();
	}	

	/**
	 * Creates a new table in the database
	 * @param $name The name of the table
	 * @param $fields The number of fields
	 * @param $field An array of field names
	 * @param $type An array of field types
	 * @param $length An array of field lengths
	 * @param $notnull An array of not null
	 * @param $default An array of default values
	 * @return 0 success
	 * @return -1 no fields supplied
	 */
	function createTable($name, $fields, $field, $type, $length, $notnull, $default) {
		// @@ NOTE: $default field not being cleaned - how on earth DO we clean it??
		$this->fieldClean($name);
	
		$found = false;
		$sql = "CREATE TABLE \"{$name}\" (";
		
		for ($i = 0; $i < $fields; $i++) {
			$this->fieldClean($field[$i]);
			$this->clean($type[$i]);
			$this->clean($length[$i]);

			// Skip blank columns - for user convenience
			if ($field[$i] == '' || $type[$i] == '') continue;
			
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

			if (isset($notnull[$i])) $sql .= " NOT NULL";
			if ($default[$i] != '') $sql .= " DEFAULT {$default[$i]}";
			if ($i != $fields - 1) $sql .= ", ";

			$found = true;
		}
		
		if (!$found) return -1;
		
		$sql .= ")";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Removes a table from the database
	 * @param $table The table to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropTable($table, $cascade) {
		$this->fieldClean($table);

		$sql = "DROP TABLE \"{$table}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Empties a table in the database
	 * @param $table The table to be emptied
	 * @return 0 success
	 */
	function emptyTable($table) {
		$this->fieldClean($table);

		$sql = "DELETE FROM \"{$table}\"";

		return $this->execute($sql);
	}

	/**
	 * Renames a table
	 * @param $table The table to be renamed
	 * @param $newName The new name for the table
	 * @return 0 success
	 */
	function renameTable($table, $newName) {
		$this->fieldClean($table);
		$this->fieldClean($newName);
		
		$sql = "ALTER TABLE \"{$table}\" RENAME TO \"{$newName}\"";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Returns a recordset of all columns in a relation.  Supports paging.
	 * @param $relation The name of a relation
	 * @param $sortkey Field over which to sort.  '' for no sort.
	 * @param $page The page of the relation to retrieve
	 * @param $page_size The number of rows per page
	 * @param &$max_pages (return-by-ref) The max number of pages in the relation
	 * @return A recordset on success
	 * @return -1 transaction error
	 * @return -2 counting error
	 * @return -3 page or page_size invalid
	 */
	function &browseRelation($relation, $sortkey, $page, $page_size, &$max_pages) {
		$oldrelation = $relation;
		$this->fieldClean($relation);

		// Check that we're not going to divide by zero
		if (!is_numeric($page_size) || $page_size != (int)$page_size || $page_size <= 0) return -3;

		// Open a transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		// Count the number of rows
		$sql = "SELECT COUNT(*) AS total FROM \"{$relation}\"";
		$total = $this->selectField($sql, 'total');
		if ($total < 0) {
			$this->rollbackTransaction();
			return -2;
		}

		// Calculate max pages
		$max_pages = ceil($total / $page_size);
		
		// Check that page is less than or equal to max pages
		if (!is_numeric($page) || $page != (int)$page || $page > $max_pages || $page < 1) {
			$this->rollbackTransaction();
			return -3;
		}

		// Figure out ORDER BY
		if ($sortkey != '') {
			$this->fieldClean($sortkey);
			$orderby = " ORDER BY \"{$sortkey}\"";
		}
		else $orderby = '';

		// We need to do a check to see if the relation has an OID column.  If so, then
		// we need to include it in the result set, in case the user has created a primary key
		// constraint on it.
		$hasID = $this->hasObjectID($oldrelation);

		// Actually retrieve the rows, with offset and limit
		if ($hasID)
			$rs = $this->selectSet("SELECT \"{$this->id}\",* FROM \"{$relation}\" {$orderby}LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);
		else
			$rs = $this->selectSet("SELECT * FROM \"{$relation}\" {$orderby}LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);
			
		$status = $this->endTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
		
		return $rs;
	}

	/**
	 * Returns a recordset of all columns in a query.  Supports paging.
	 * @param $query The SQL SELECT query.
	 * @param $count The same SQL query, but only retrieves the count of the rows (AS total)
	 * @param $page The page of the relation to retrieve
	 * @param $page_size The number of rows per page
	 * @param &$max_pages (return-by-ref) The max number of pages in the relation
	 * @return A recordset on success
	 * @return -1 transaction error
	 * @return -2 counting error
	 * @return -3 page or page_size invalid
	 */
	function &browseSQL($query, $count, $page, $page_size, &$max_pages) {
		// Check that we're not going to divide by zero
		if (!is_numeric($page_size) || $page_size != (int)$page_size || $page_size <= 0) return -3;

		// Open a transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		// Count the number of rows
		$total = $this->selectField($count, 'total');
		if ($total < 0) {
			$this->rollbackTransaction();
			return -2;
		}

		// Calculate max pages
		$max_pages = ceil($total / $page_size);
		
		// Check that page is less than or equal to max pages
		if (!is_numeric($page) || $page != (int)$page || $page > $max_pages || $page < 1) {
			$this->rollbackTransaction();
			return -3;
		}

		// Actually retrieve the rows, with offset and limit
		// @@@@@@@@@@@@@@ THIS NEXT LINE ONLY WORKS IN POSTGRESQL 7.2+ @@@@@@@@@@@@@@@@@
		//$sql = "SELECT * FROM ($query) LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);
		$rs = $this->selectSet("{$query} LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);

		$status = $this->endTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
		
		return $rs;
	}
		
	/**
	 * Returns a recordset of all columns in a table
	 * @param $table The name of a table
	 * @param $key The associative array holding the key to retrieve
	 * @return A recordset
	 */
	function &browseRow($table, $key) {
		$this->fieldClean($table);

		$sql = "SELECT * FROM \"{$table}\"";
		if (is_array($key) && sizeof($key) > 0) {
			$sql .= " WHERE true";
			foreach ($key as $k => $v) {
				$this->fieldClean($k);
				$this->clean($v);
				$sql .= " AND \"{$k}\"='{$v}'";
			}
		}

		return $this->selectSet($sql);
	}

	// Sequence functions
	
	/**
	 * Returns all sequences in the current database
	 * @return A recordset
	 */
	function &getSequences() {
		if (!$this->_showSystem) $where = " AND relname NOT LIKE 'pg_%'";
		else $where = '';
		$sql = "SELECT c.relname, u.usename  FROM pg_class c, pg_user u WHERE c.relowner=u.usesysid AND c.relkind = 'S'{$where} ORDER BY relname";
		
		return $this->selectSet( $sql );
	}

	/**
	 * Returns properties of a single sequence
	 * @param $sequence Sequence name
	 * @return A recordset
	 */
	function &getSequence($sequence) {
		$this->fieldClean($sequence);
		
		if (!$this->_showSystem) $where = " AND relname NOT LIKE 'pg_%'";
		else $where = '';
		$sql = "SELECT sequence_name AS relname, * FROM \"{$sequence}\""; 
		
		return $this->selectSet( $sql );
	}

	/** 
	 * Drops a given sequence
	 * @param $sequence Sequence name
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropSequence($sequence, $cascade) {
		$this->fieldClean($sequence);
		
		$sql = "DROP SEQUENCE \"{$sequence}\"";
		if ($cascade) $sql .= " CASCADE";
		
		return $this->execute($sql);
	}

	/** 
	 * Resets a given sequence to 1
	 * @param $sequence Sequence name
	 * @return 0 success
	 */
	function &resetSequence($sequence) {
		$this->clean($sequence);
		
		$sql = "SELECT SETVAL('{$sequence}', 1)";
		
		return $this->execute($sql);
	}

	/**
	 * Creates a new sequence
	 * @param $sequence Sequence name
	 * @param $increment The increment
	 * @param $minvalue The min value
	 * @param $maxvalue The max value
	 * @param $startvalue The starting value
	 * @return 0 success
	 */
	function createSequence($sequence, $increment, $minvalue, $maxvalue, $startvalue) {
		$this->fieldClean($sequence);
		
		$sql = "CREATE SEQUENCE \"{$sequence}\"";
		if ($increment != '') $sql .= " INCREMENT {$increment}";
		if ($minvalue != '') $sql .= " MINVALUE {$minvalue}";
		if ($maxvalue != '') $sql .= " MAXVALUE {$maxvalue}";
		if ($startvalue != '') $sql .= " START {$startvalue}";
		
		return $this->execute($sql);
	}

	// Constraint functions

	/**
	 * Adds a check constraint to a table
	 * @param $table The table to which to add the check
	 * @param $definition The definition of the check
	 * @param $name (optional) The name to give the check, otherwise default name is assigned
	 * @return 0 success
	 */
	function addCheckConstraint($table, $definition, $name = '') {
		$this->fieldClean($table);
		$this->fieldClean($name);
		// @@ How the heck do you clean a definition???

		$sql = "ALTER TABLE \"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "CHECK ({$definition})";

		return $this->execute($sql);
	}
	
	/**
	 * Drops a check constraint from a table
	 * @param $table The table from which to drop the check
	 * @param $name The name of the check to be dropped
	 * @return 0 success
	 * @return -2 transaction error
	 * @return -3 lock error
	 * @return -4 check drop error
	 */
	function dropCheckConstraint($table, $name) {
		$this->clean($table);
		$this->clean($name);
		
		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -2;

		// Properly lock the table
		$sql = "LOCK TABLE \"{$table}\" IN ACCESS EXCLUSIVE MODE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Delete the check constraint
		$sql = "DELETE FROM pg_relcheck WHERE rcrelid=(SELECT oid FROM pg_class WHERE relname='{$table}') AND rcname='{$name}'";
	   	$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}
		
		// Update the pg_class catalog to reflect the new number of checks
		$sql = "UPDATE pg_class SET relchecks=(SELECT COUNT(*) FROM pg_relcheck WHERE 
					rcrelid=(SELECT oid FROM pg_class WHERE relname='{$table}')) 
					WHERE relname='{$table}'";
	   	$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Otherwise, close the transaction
		return $this->endTransaction();
	}	

	// Constraint functions

	/**
	 * Removes a constraint from a relation
	 * @param $constraint The constraint to drop
	 * @param $relation The relation from which to drop
	 * @param $type The type of constraint (c, f, u or p)
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 * @return -99 dropping foreign keys not supported
	 */
	function dropConstraint($constraint, $relation, $type, $cascade) {
		$this->fieldClean($constraint);
		$this->fieldClean($relation);

		switch ($type) {
			case 'c':
				// CHECK constraint		
				return $this->dropCheckConstraint($relation, $constraint);
				break;
			case 'p':
			case 'u':
				// PRIMARY KEY or UNIQUE constraint
				return $this->dropIndex($constraint, $cascade);
				break;
			case 'f':
				// FOREIGN KEY constraint
				return -99;
		}				
	}

	/**
	 * Adds a unique constraint to a table
	 * @param $table The table to which to add the unique
	 * @param $fields (array) An array of fields over which to add the unique
	 * @param $name (optional) The name to give the unique, otherwise default name is assigned
	 * @return 0 success
	 * @return -1 invalid fields
	 */
	function addUniqueKey($table, $fields, $name = '') {
		if (!is_array($fields) || sizeof($fields) == 0) return -1;
		$this->fieldClean($table);
		$this->fieldArrayClean($fields);
		$this->fieldClean($name);
		
		if ($name != '')
			$sql = "CREATE UNIQUE INDEX \"{$name}\" ON \"{$table}\"(\"" . join('","', $fields) . "\")";
		else return -99; // Not supported

		return $this->execute($sql);
	}

	/**
	 * Adds a foreign key constraint to a table
	 * @param $table The table to which to add the foreign key
	 * @param $target The table that contains the target columns
	 * @param $sfields (array) An array of source fields over which to add the foreign key
	 * @param $tfields (array) An array of target fields over which to add the foreign key
	 * @param $upd_action The action for updates (eg. RESTRICT)
	 * @param $del_action The action for deletes (eg. RESTRICT)
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 * @return -1 no fields given
	 */
	function addForeignKey($table, $target, $sfields, $tfields, $upd_action, $del_action, $name = '') {
		if (!is_array($sfields) || sizeof($sfields) == 0 ||
			!is_array($tfields) || sizeof($tfields) == 0) return -1;
		$this->fieldClean($table);
		$this->fieldClean($target);
		$this->fieldArrayClean($sfields);
		$this->fieldArrayClean($tfields);
		$this->fieldClean($name);

		$sql = "ALTER TABLE \"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "FOREIGN KEY (\"" . join('","', $sfields) . "\") ";
		$sql .= "REFERENCES \"{$target}\"(\"" . join('","', $tfields) . "\") ";
		if ($upd_action != 'NO ACTION') $sql .= " ON UPDATE {$upd_action}";
		if ($del_action != 'NO ACTION') $sql .= " ON DELETE {$del_action}";

		return $this->execute($sql);
	}
	 
	/**
	 * Adds a primary key constraint to a table
	 * @param $table The table to which to add the primery key
	 * @param $fields (array) An array of fields over which to add the primary key
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 */
	function addPrimaryKey($table, $fields, $name = '') {
		// This function can be faked with a unique index and a catalog twiddle, however
		// how do we ensure that it's only used on NOT NULL fields?
		return -99; // Not supported.
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

	// Column Functions

	/**
	 * Add a new column to a table
	 * @param $table The table to add to
	 * @param $column The name of the new column
	 * @param $type The type of the column
	 * @param $length The optional size of the column (ie. 30 for varchar(30))
	 * @return 0 success
	 */
	function addColumn($table, $column, $type, $length) {
		$this->fieldClean($table);
		$this->fieldClean($column);
		$this->clean($type);
		$this->clean($length);
		// @@ How do we reliably escape the type here?
		if ($length == '')
			$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" {$type}";
		else {
			switch ($type) {
				// Have to account for weird placing of length for with/without
				// time zone types
				case 'timestamp with time zone':
				case 'timestamp without time zone':
					$qual = substr($type, 9);
					$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" timestamp({$length}){$qual}";
					break;
				case 'time with time zone':
				case 'time without time zone':
					$qual = substr($type, 4);
					$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" time({$length}){$qual}";
					break;
				default:
					$sql = "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" {$type}({$length})";
			}
		}
		return $this->execute($sql);
	}

	/**
	 * Sets default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to set
	 * @param $default The new default value
	 * @return 0 success
	 */
	function setColumnDefault($table, $column, $default) {
		$this->fieldClean($table);
		$this->fieldClean($column);
		// @@ How the heck do you clean default clause?
		
		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" SET DEFAULT {$default}";

		return $this->execute($sql);
	}

	/**
	 * Drops default value of a column
	 * @param $table The table from which to drop
	 * @param $column The column name to drop default
	 * @return 0 success
	 */
	function dropColumnDefault($table, $column) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		$sql = "ALTER TABLE \"{$table}\" ALTER COLUMN \"{$column}\" DROP DEFAULT";

		// @@ How do you do this?
		return $this->execute($sql);
	}

	/**
	 * Sets whether or not a column can contain NULLs
	 * @param $table The table that contains the column
	 * @param $column The column to alter
	 * @param $state True to set null, false to set not null
	 * @return 0 success
	 * @return -1 attempt to set not null, but column contains nulls
	 * @return -2 transaction error
	 * @return -3 lock error
	 * @return -4 update error
	 */
	function setColumnNull($table, $column, $state) {
		$this->fieldClean($table);
		$this->fieldClean($column);

		// Begin transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -2;

		// Properly lock the table
		$sql = "LOCK TABLE \"{$table}\" IN ACCESS EXCLUSIVE MODE";
		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		// Check for existing nulls
		if (!$state) {
			$sql = "SELECT COUNT(*) AS total FROM \"{$table}\" WHERE \"{$column}\" IS NULL";
			$result = $this->selectField($sql, 'total');
			if ($result > 0) {
				$this->rollbackTransaction();
				return -1;
			}
		}

		// Otherwise update the table.  Note the reverse-sensed $state variable
		$sql = "UPDATE pg_attribute SET attnotnull = " . (($state) ? 'false' : 'true') . " 
					WHERE attrelid = (SELECT oid FROM pg_class WHERE relname = '{$table}') 
					AND attname = '{$column}'";

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		// Otherwise, close the transaction
		return $this->endTransaction();
	}

	/**
	 * Renames a column in a table
	 * @param $table The table containing the column to be renamed
	 * @param $column The column to be renamed
	 * @param $newName The new name for the column
	 * @return 0 success
	 */
	function renameColumn($table, $column, $newName) {
		$this->fieldClean($table);
		$this->fieldClean($column);
		$this->fieldClean($newName);

		$sql = "ALTER TABLE \"{$table}\" RENAME COLUMN \"{$column}\" TO \"{$newName}\"";

		return $this->execute($sql);
	}

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @return A recordset
	 */
	function &getIndexes($table = '') {
		$this->clean($table);
		$sql = "SELECT c2.relname, i.indisprimary, i.indisunique, pg_get_indexdef(i.indexrelid)
			FROM pg_class c, pg_class c2, pg_index i
			WHERE c.relname = '{$table}' AND c.oid = i.indrelid AND i.indexrelid = c2.oid
			ORDER BY c2.relname";

		return $this->selectSet($sql);
	}

	/**
	 * Creates an index
	 * @param $name The index name
	 * @param $table The table on which to add the index
	 * @param $columns An array of columns that form the index
	 * @param $type The index type
	 * @return 0 success
	 */
	function createIndex($name, $table, $columns, $type) {
		$this->fieldClean($name);
		$this->fieldClean($table);
		$this->arrayClean($columns);

		$sql = "CREATE INDEX \"{$name}\" ON \"{$table}\" USING {$type} ";
		$sql .= "(\"" . implode('","', $columns) . "\")";
			

		return $this->execute($sql);
	}

	/**
	 * Removes an index from the database
	 * @param $index The index to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropIndex($index, $cascade) {
		$this->fieldClean($index);

		$sql = "DROP INDEX \"{$index}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Rule functions
	
	/**
	 * Removes a rule from a relation
	 * @param $rule The rule to drop
	 * @param $relation The relation from which to drop (unused)
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropRule($rule, $relation, $cascade) {
		$this->fieldClean($rule);

		$sql = "DROP RULE \"{$rule}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Creates a rule
	 * @param $name The name of the new rule
	 * @param $event SELECT, INSERT, UPDATE or DELETE
	 * @param $table Table on which to create the rule
	 * @param $where When to execute the rule, '' indicates always
	 * @param $instead True if an INSTEAD rule, false otherwise
	 * @param $type NOTHING for a do nothing rule, SOMETHING to use given action
	 * @param $action The action to take
	 * @param $replace (optional) True to replace existing rule, false otherwise
	 * @return 0 success
	 * @return -1 invalid event
	 */
	function createRule($name, $event, $table, $where, $instead, $type, $action, $replace = false) {
		$this->fieldClean($name);
		$this->fieldClean($table);
		if (!in_array($event, $this->rule_events)) return -1;

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " RULE \"{$name}\" AS ON {$event} TO \"{$table}\"";
		// Can't escape WHERE clause
		if ($where != '') $sql .= " WHERE {$where}";
		$sql .= " DO";
		if ($instead) $sql .= " INSTEAD";
		if ($type == 'NOTHING') 
			$sql .= " NOTHING";
		else $sql .= " ({$action})";

		return $this->execute($sql);
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
	 * @return -2 transaction error
	 * @return -3 drop existing rule error
	 * @return -4 create new rule error
	 */
	function setRule($name, $event, $table, $where, $instead, $type, $action) {
		$status = $this->beginTransaction();
		if ($status != 0) return -2;

		$status = $this->dropRule($name, $table);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		$status = $this->createRule($name, $event, $table, $where, $instead, $type, $action);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}
		
		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -2;
	}

	// View functions
	
	/**
	 * Returns a list of all views in the database
	 * @return All views
	 */
	function &getViews() {
		if (!$this->_showSystem)
			$where = "WHERE viewname NOT LIKE 'pg_%'";
		else $where  = '';
		
		$sql = "SELECT viewname, viewowner FROM pg_views {$where} ORDER BY viewname";

		return $this->selectSet($sql);
	}
	
	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function &getView($view) {
		$this->clean($view);
		
		$sql = "SELECT viewname, viewowner, definition FROM pg_views WHERE viewname='$view'";

		return $this->selectSet($sql);
	}	

	/**
	 * Creates a new view.
	 * @param $viewname The name of the view to create
	 * @param $definition The definition for the new view
	 * @param $replace True to replace the view, false otherwise
	 * @return 0 success
	 */
	function createView($viewname, $definition, $replace) {
		$this->fieldClean($viewname);
		// Note: $definition not cleaned
		
		$sql = "CREATE ";
		if ($replace) $sql .= "OR REPLACE ";		
		$sql .= "VIEW \"{$viewname}\" AS {$definition}";
		
		return $this->execute($sql);
	}
	
	/**
	 * Drops a view.
	 * @param $viewname The name of the view to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropView($viewname, $cascade) {
		$this->fieldClean($viewname);

		$sql = "DROP VIEW \"{$viewname}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	/**
	 * Updates a view.  Postgres 7.1 and below don't have CREATE OR REPLACE view,
	 * so we do it with a drop and a recreate.
	 * @param $viewname The name fo the view to update
	 * @param $definition The new definition for the view
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop view error
	 * @return -3 create view error
	 */
	function setView($viewname, $definition) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		$status = $this->dropView($viewname, false);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createView($viewname, $definition, false);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
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
	
	
	// User functions
	
	/**
	 * Changes a user's password
	 * @param $username The username
	 * @param $password The new password
	 * @return 0 success
	 */
	function changePassword($username, $password) {
		$this->fieldClean($username);
		$this->clean($password);
		
		$sql = "ALTER USER \"{$username}\" WITH PASSWORD '{$password}'";
		
		return $this->execute($sql);
	}
	
	/**
	 * Returns all users in the database cluster
	 * @return All users
	 */
	function &getUsers() {
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil FROM pg_user ORDER BY usename";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Return information about a single user
	 * @param $username The username of the user to retrieve
	 * @return The user's data
	 */
	function &getUser($username) {
		$this->clean($username);
		
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil FROM pg_user WHERE usename='{$username}'";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Determines whether or not a user is a super user
	 * @param $username The username of the user
	 * @return True if is a super user, false otherwise
	 */
	function isSuperUser($username) {
		$this->clean($username);
		
		$sql = "SELECT usesuper FROM pg_user WHERE usename='{$username}'";
		
		$usesuper = $this->selectField($sql, 'usesuper');
		if ($usesuper == -1) return false;
		else return $usesuper == 't';
	}	
	
	/**
	 * Creates a new user
	 * @param $username The username of the user to create
	 * @param $password A password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  When the account expires.
	 * @param $group (array) The groups to create the user in
	 * @return 0 success
	 */
	function createUser($username, $password, $createdb, $createuser, $expiry, $groups) {
		$this->fieldClean($username);
		$this->clean($password);
		$this->clean($expiry);
		$this->fieldArrayClean($groups);		

		$sql = "CREATE USER \"{$username}\"";
		if ($password != '') $sql .= " WITH PASSWORD '{$password}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createuser) ? ' CREATEUSER' : ' NOCREATEUSER';
		if (is_array($groups) && sizeof($groups) > 0) $sql .= " IN GROUP \"" . join('", "', $groups) . "\"";
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Adjusts a user's info
	 * @param $username The username of the user to modify
	 * @param $password A new password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  When the account expires.
	 * @return 0 success
	 */
	function setUser($username, $password, $createdb, $createuser, $expiry) {
		$this->fieldClean($username);
		$this->clean($password);
		$this->clean($expiry);
		
		$sql = "ALTER USER \"{$username}\"";
		if ($password != '') $sql .= " WITH PASSWORD '{$password}'";
		$sql .= ($createdb) ? ' CREATEDB' : ' NOCREATEDB';
		$sql .= ($createuser) ? ' CREATEUSER' : ' NOCREATEUSER';
		if ($expiry != '') $sql .= " VALID UNTIL '{$expiry}'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Removes a user
	 * @param $username The username of the user to drop
	 * @return 0 success
	 */
	function dropUser($username) {
		$this->fieldClean($username);
		
		$sql = "DROP USER \"{$username}\"";
		
		return $this->execute($sql);
	}
	
	// Group functions
	
	/**
	 * Returns all groups in the database cluser
	 * @return All groups
	 */
	function &getGroups() {
		$sql = "SELECT groname FROM pg_group ORDER BY groname";
		
		return $this->selectSet($sql);
	}

	/**
	 * Return information about a specific group
	 * @param $groname The name of the group
	 * @return All groups
	 */
	function &getGroup($groname) {
		$this->clean($groname);

		$sql = "SELECT grolist FROM pg_group WHERE groname = '{$groname}'";
      
		$grodata = $this->selectSet($sql);
		if ($grodata->f['grolist'] !== null && $grodata->f['grolist'] != '{}') {
			$members = $grodata->f['grolist'];
			$members = ereg_replace("\{|\}","",$members);
			$this->clean($members);

			$sql = "SELECT usename FROM pg_user WHERE usesysid IN ({$members}) ORDER BY usename";
		}
		else $sql = "SELECT usename FROM pg_user WHERE false";

		return $this->selectSet($sql);
	}

	
	/**
	 * Creates a new group
	 * @param $groname The name of the group
	 * @param $users An array of users to add to the group
	 * @return 0 success
	 */
	function createGroup($groname, $users) {
		$this->fieldClean($groname);

		$sql = "CREATE GROUP \"{$groname}\"";
		
		if (is_array($users) && sizeof($users) > 0) {
			$this->fieldArrayClean($users);
			$sql .= ' WITH USER "' . join('", "', $users) . '"';			
		}		
		
		return $this->execute($sql);
	}	
	
	/**
	 * Removes a group
	 * @param $groname The name of the group to drop
	 * @return 0 success
	 */
	function dropGroup($groname) {
		$this->fieldClean($groname);
		
		$sql = "DROP GROUP \"{$groname}\"";
		
		return $this->execute($sql);
	}
	
	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @return A recordet
	 */
	function &getTypes($all = false) {
		$sql = "SELECT
				pt.typname,
				pu.usename AS typowner
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND typrelid = 0
				AND typname !~ '^_.*'
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all details for a particular type
	 * @param $typname The name of the view to retrieve
	 * @return Type info
	 */
	function &getType($typname) {
		$this->clean($typname);
		
		$sql = "SELECT *, typinput AS typin, typoutput AS typout 
			FROM pg_type WHERE typname='{$typname}'";

		return $this->selectSet($sql);
	}	
	
	/**
	 * Creates a new type
	 * @param ...
	 * @return 0 success
	 */
	function createType($typname, $typin, $typout, $typlen, $typdef,
				$typelem, $typdelim, $typbyval, $typalign, $typstorage) {
		$this->fieldClean($typname);
		$this->fieldClean($typin);
		$this->fieldClean($typout);

		$sql = "
			CREATE TYPE \"{$typname}\" (
				INPUT = \"{$typin}\",
				OUTPUT = \"{$typout}\",
				INTERNALLENGTH = {$typlen}";
		if ($typdef != '') $sql .= ", DEFAULT = {$typdef}";
		if ($typelem != '') $sql .= ", ELEMENT = {$typelem}";
		if ($typdelim != '') $sql .= ", DELIMITER = {$typdelim}";
		if ($typbyval) $sql .= ", PASSEDBYVALUE, ";
		if ($typalign != '') $sql .= ", ALIGNMENT = {$typalign}";
		if ($typstorage != '') $sql .= ", STORAGE = {$typstorage}";
		
		$sql .= ")";

		return $this->execute($sql);
	}
	
	/**
	 * Drops a type.
	 * @param $typname The name of the type to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropType($typname, $cascade) {
		$this->fieldClean($typname);

		$sql = "DROP TYPE \"{$typname}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Trigger functions

	/**
	 * A helper function for getTriggers that translates
	 * an array of attribute numbers to an array of field names.
	 * @param $trigger An array containing fields from the trigger table
	 * @return The trigger definition string
	 */
	function &getTriggerDef($trigger) {
		// Constants to figure out tgtype

		define ('TRIGGER_TYPE_ROW', (1 << 0) );
		define ('TRIGGER_TYPE_BEFORE', (1 << 1) );
		define ('TRIGGER_TYPE_INSERT', (1 << 2) );
		define ('TRIGGER_TYPE_DELETE', (1 << 3) );
		define ('TRIGGER_TYPE_UPDATE', (1 << 4) );

		$trigger['tgisconstraint'] = $this->phpBool($trigger['tgisconstraint']);
		$trigger['tgdeferrable'] = $this->phpBool($trigger['tgdeferrable']);
		$trigger['tginitdeferred'] = $this->phpBool($trigger['tginitdeferred']);

		// Constraint trigger or normal trigger
		if ($trigger['tgisconstraint'])
			$tgdef = 'CREATE CONSTRAINT TRIGGER ';
		else
			$tgdef = 'CREATE TRIGGER ';

		$tgdef .= "\"{$trigger['tgname']}\" ";

		// Trigger type
		$findx = 0;
		if ($trigger['tgtype'] & TRIGGER_TYPE_BEFORE == TRIGGER_TYPE_BEFORE)
			$tgdef .= 'BEFORE';
		else
			$tgdef .= 'AFTER';

		if ($trigger['tgtype'] & TRIGGER_TYPE_INSERT == TRIGGER_TYPE_INSERT) {
			$tgdef .= ' INSERT';
			$findx++;
		}
		if ($trigger['tgtype'] & TRIGGER_TYPE_DELETE == TRIGGER_TYPE_DELETE) {
			if ($findx > 0)
				$tgdef .= ' OR DELETE';
			else
				$tgdef .= ' DELETE';
			$findx++;
		}
		if ($trigger['tgtype'] & TRIGGER_TYPE_UPDATE == TRIGGER_TYPE_UPDATE) {
			if ($findx > 0)
				$tgdef .= ' OR UPDATE';
			else
				$tgdef .= ' UPDATE';
		}
	
		// Table name
		$tgdef .= " ON \"{$trigger['relname']}\" ";
		
		// Deferrability
		if ($trigger['tgisconstraint']) {
			if ($trigger['tgconstrrelid'] != 0) {
				// Assume constrelname is not null
				$tgdef .= " FROM \"{$trigger['tgconstrrelname']}\" ";
			}
			if (!$trigger['tgdeferrable'])
				$tgdef .= 'NOT ';
			$tgdef .= 'DEFERRABLE INITIALLY ';
			if ($trigger['tginitdeferred'])
				$tgdef .= 'DEFERRED ';
			else
				$tgdef .= 'IMMEDIATE ';
		}

		// Row or statement
		if ($trigger['tgtype'] & TRIGGER_TYPE_ROW == TRIGGER_TYPE_ROW)
			$tgdef .= 'FOR EACH ROW ';
		else
			$tgdef .= 'FOR EACH STATEMENT ';

		// Execute procedure
		$tgdef .= "EXECUTE PROCEDURE \"{$trigger['tgfname']}\"(";
		
		// Parameters
		// @@ WHY DOESN'T ALL THIS WORK?
		// @@ ACTUALLY, pg_unescape_bytea is unnecessary
		/*
		if (function_exists('pg_unescape_bytea')) {
			$params = explode('\000', pg_unescape_bytea($trigger['tgargs']));
			for ($findx = 0; $findx < $trigger['tgnargs']; $findx++) {
				$param = str_replace('\'', '\\\'', $params[$findx]);
				$tgdef .= $param;
				if ($findx < ($trigger['tgnargs'] - 1))
					$tgdef .= ', ';
			}
		}		
		else */ $tgdef .= "args here";
		
		// Finish it off
		$tgdef .= ')';

		return $tgdef;
	}

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function &getTriggers($table = '') {
		$this->clean($table);

		// We include constraint triggers
		$sql = "SELECT t.tgname, t.tgisconstraint, t.tgdeferrable, t.tginitdeferred, t.tgtype, 
			t.tgargs, t.tgnargs, p.proname AS tgfname, c.relname, NULL AS tgdef
			FROM pg_trigger t LEFT JOIN pg_proc p
			ON t.tgfoid=p.oid, pg_class c
			WHERE t.tgrelid=c.oid
			AND c.relname='{$table}'";

		return $this->selectSet($sql);
	}

	/**
	 * Creates a trigger
	 * @param $tgname The name of the trigger to create
	 * @param $table The name of the table
	 * @param $tgproc The function to execute
	 * @param $tgtime BEFORE or AFTER
	 * @param $tgevent Event
	 * @param $tgargs The function arguments
	 * @return 0 success
	 */
	function createTrigger($tgname, $table, $tgproc, $tgtime, $tgevent, $tgargs) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);
		$this->fieldClean($tgproc);
		
		/* No Statement Level Triggers in PostgreSQL (by now) */
		$sql = "CREATE TRIGGER \"{$tgname}\" {$tgtime} 
				{$tgevent} ON \"{$table}\"
				FOR EACH ROW EXECUTE PROCEDURE \"{$tgproc}\"({$tgargs})";
				
		return $this->execute($sql);
	}

	/**
	 * Drops a trigger
	 * @param $tgname The name of the trigger to drop
	 * @param $table The table from which to drop the trigger
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropTrigger($tgname, $table, $cascade) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);

		$sql = "DROP TRIGGER \"{$tgname}\" ON \"{$table}\"";
		if ($cascade) $sql .= " CASCADE";

		return $this->execute($sql);
	}

	// Privilege functions

	/**
	 * Grabs an array of users and their privileges for an object,
	 * given its type.
	 * @param $object The name of the object whose privileges are to be retrieved
	 * @param $type The type of the object (eg. database, schema, relation, function or language
	 * @return Privileges array
	 * @return -1 invalid type
	 * @return -2 object not found
	 * @return -3 unknown privilege type
	 */
	function getPrivileges($object, $type) {
		$this->clean($object);

		// @@ NEED SCHEMA SUPPORT FOR 7.3
		switch ($type) {
			case 'table':
			case 'view':
			case 'sequence':
				$sql = "SELECT relacl AS acl FROM pg_class WHERE relname = '{$object}'";
				break;
			case 'database':
				$sql = "SELECT datacl AS acl FROM pg_database WHERE datname = '{$object}'";
				break;
			case 'function':
				$sql = "SELECT proacl AS acl FROM pg_proc WHERE oid = '{$object}'";
				break;
			case 'language':
				$sql = "SELECT lanacl AS acl FROM pg_language WHERE lanname = '{$object}'";
				break;
			case 'schema':
				// @@ MOVE THIS TO 7.3 ONLY
				$sql = "SELECT nspacl AS acl FROM pg_namespace WHERE nspname = '{$object}'";
				break;
			default:
				return -1;
		}

		// Fetch the ACL for object
		$acl = $this->selectField($sql, 'acl');
		if ($acl == -1) return -2;
		elseif ($acl == '') return array();

		// Take off the first and last characters (the braces)
		$acl = substr($acl, 1, strlen($acl) - 2);

		// Pick out individual ACE's by exploding on the comma
		$aces = explode(',', $acl);

		// Create the array to be returned
		$temp = array();

		// For each ACE, generate an entry in $temp
		foreach ($aces as $v) {
			// If the ACE begins with a double quote, strip them off both ends
			if (strpos($v, '"') === 0) $v = substr($v, 1, strlen($v) - 2);

			// Figure out type of ACE (public, user or group)
			if (strpos($v, '=') === 0)
				$atype = 'public';
			elseif (strpos($v, 'group ') === 0) {
				$atype = 'group';
				// Tear off 'group' prefix
				$v = substr($v, 6);
			}
			else
				$atype = 'user';

			// Separate entity from character list
			list ($entity, $chars) = explode('=', $v);
			
			// New row to be added to $temp
			// (type, grantee, privilegs, grantor, grant option
			$row = array($atype, $entity, array(), '', false);

			// Loop over chars and add privs to $row
			for ($i = 0; $i < strlen($chars); $i++) {
				// Append to row's privs list the string representing
				// the privilege
				$char = substr($chars, $i, 1);
				if ($char == '*')
					$row[4] = true;
				elseif ($char == '/') {
					$row[5] = substr($chars, $i + 1);
					break;
				}
				if (!isset($this->privmap[$char]))
					return -3;
				else
					$row[2][] = $this->privmap[$char];
			}
			
			// Append row to temp
			$temp[] = $row;
		}

		return $temp;
	}
	
	/**
	 * Grants a privilege to a user, group or public
	 * @param $type The type of object
	 * @param $object The name of the object
	 * @param $entity The type of entity (eg. USER, GROUP or PUBLIC)
	 * @param $name The username or groupname to grant privs to. Ignored for PUBLIC.
	 * @param $privilege The privilege to grant (eg. SELECT, ALL PRIVILEGES, etc.)
	 * @return 0 success
	 * @return -1 invalid type
	 * @return -2 invalid entity
	 */
	function grantPrivileges($type, $object, $entity, $name, $privilege) {
		$this->fieldClean($object);
		$this->fieldClean($name);

		$sql = "GRANT {$privilege} ON";
		// @@ WE NEED SCHEMA SUPPORT BELOW
		switch ($type) {
			case 'table':
			case 'view':
			case 'sequence':
				$sql .= " \"{$object}\"";
				break;
			case 'database':
				$sql .= " DATABASE \"{$object}\"";
				break;
			case 'function':
				$sql .= " FUNCTION \"{$object}\"";
				break;
			case 'language':
				$sql .= " LANGUAGE \"{$object}\"";
				break;
			case 'schema':
				// @@ MOVE THIS TO 7.3 ONLY
				$sql .= " SCHEMA \"{$object}\"";
				break;
			default:
				return -1;
		}
		
		switch ($entity) {
			case 'USER':
				$sql .= " TO \"{$name}\"";
				break;
			case 'GROUP':
				$sql .= " TO GROUP \"{$name}\"";
				break;
			case 'PUBLIC':
				$sql .= " TO PUBLIC";
				break;
			default:
				return -2;
		}
		
		return $this->execute($sql);
	}
 
	// Administration functions

	/**
	 * Vacuums a database
	 * @param $database The database to vacuum
	 */
	function vacuumDB($database) {
		$this->fieldClean($database);

		$sql = "VACUUM \"{$database}\"";

		return $this->execute($sql);
	}

	/**
	 * Analyze a database
	 * @param $database The database to analyze
	 */
	function analyzeDB($database) {
		$this->fieldClean($database);

		$sql = "ANALYZE \"{$database}\"";

		return $this->execute($sql);
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

		$sql = "SELECT attnum, attname FROM pg_attribute
			WHERE attnum IN ('" . join("','", $colnums) . "')
			AND attrelid = (SELECT oid FROM pg_class WHERE relname='{$table}')";

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
					rcname AS conname,
					'CHECK ' || rcsrc AS consrc,
					'c' AS contype,
					rcrelid AS relid,
					NULL AS indkey
				FROM
					pg_relcheck
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
					pg_class pc,
					pg_index pi
				WHERE
					pc.oid=pi.indexrelid
					AND (pi.indisunique OR pi.indisprimary)
			) AS sub
			WHERE relid = (SELECT oid FROM pg_class WHERE relname='{$table}')
		";

		return $this->selectSet($sql);
	}

	// Function functions

	/**
	 * Returns a list of all functions that can be used in triggers
	 */
	function &getTriggerFunctions() {
		return $this->getFunctions(true);
	}

	/**
	 * Updates a function.  Postgres 7.1 doesn't have CREATE OR REPLACE function,
	 * so we do it with a drop and a recreate.
	 * @param $funcname The name of the function to update
	 * @param $definition The new definition for the function
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 drop function error
	 * @return -3 create function error
	 */
	function setFunction($funcname, $definition) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$status = $this->dropFunction($funcname);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createFunction($funcname, $definition);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}

		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
	}
	
	/**
	 * Creates a new function.
	 * @param $funcname The name of the function to create
	 * @param $args The array of argument types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $replace (optional) True if OR REPLACE, false for normal
	 * @return 0 success
	 */
	function createFunction($funcname, $args, $returns, $definition, $language, $flags, $replace = false) {
		/*
		RE: arguments implementation It seem to me that we should be  getting passed a comma delimited string
		and that we need a comma delimited string
		So why go through the array end around 
		ADODB throws errors if you leave it blank, and join complaines as well
		

		Also I'm dropping support for the WITH option for now
		Given that there are only 3 options, this might best be implemented with hardcoding
		*/

		$this->clean($funcname);
//		if (is_array($args)) {
//			$this->arrayClean($args);
//		}
		$this->clean($args);
		$this->clean($returns);
		$this->clean($definition);
		$this->clean($language);
//		if (is_array($flags)) {
//			$this->arrayClean($flags);
//		}

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " FUNCTION \"{$funcname}\" (";
/*
		if (sizeof($args) > 0)
			$sql .= '"' . join('", "', $args) . '"';
*/
		if ($args)
			$sql .= $args;

		// For some reason, the returns field cannot have quotes...
		$sql .= ") RETURNS {$returns} AS '\n";
		$sql .= $definition;
		$sql .= "\n'";
		$sql .= " LANGUAGE \"{$language}\"";
/*
		if (sizeof($flags) > 0)
			$sql .= ' WITH ("' . join('", "', $flags) . '")';
*/


		return $this->execute($sql);
	}
		
	/**
	 * Drops a function.
	 * @param $funcname The name of the function to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropFunction($funcname, $cascade) {
		$this->clean($funcname);
	
		$sql = "DROP FUNCTION {$funcname} ";
		if ($cascade) $sql .= " CASCADE";
		
		return $this->execute($sql);
	}	

	// Rule functions

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
				pg_rules
			WHERE
				tablename='{$table}'
			ORDER BY
				rulename
		";

		return $this->selectSet($sql);
	}

	// Type conversion routines

	/**
	 * Change the value of a parameter to 't' or 'f' depending on whether it evaluates to true or false
	 * @param $parameter the parameter
	 */
	function dbBool(&$parameter) {
		if ($parameter) $parameter = 't';
		else $parameter = 'f';

		return $parameter;
	}

	/**
	 * Change a parameter from 't' or 'f' to a boolean, (others evaluate to false)
	 * @param $parameter the parameter
	 */
	function phpBool($parameter) {
		$parameter = ($parameter == 't');
		return $parameter;
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
	function hasIndicies() { return true; }
	function hasRules() { return true; }
	function hasLanguages() { return true; }
	function hasDropColumn() { return false; }

}

?>
