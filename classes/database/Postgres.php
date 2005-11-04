<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: Postgres.php,v 1.279 2005/11/04 04:23:16 chriskl Exp $
 */

// @@@ THOUGHT: What about inherits? ie. use of ONLY???

include_once('./classes/database/ADODB_base.php');

class Postgres extends ADODB_base {

	// Major version. MUST be numerically comparable to other versions.
	var $major_version = 7.0;
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
		'DELETE OR UPDATE', 'INSERT OR DELETE OR UPDATE');
	// When to execute the trigger	
	var $triggerExecTimes = array('BEFORE', 'AFTER');
	// How often to execute the trigger	
	var $triggerFrequency = array('ROW');
	// Foreign key stuff.  First element MUST be the default.
	var $fkactions = array('NO ACTION', 'RESTRICT', 'CASCADE', 'SET NULL', 'SET DEFAULT');
	var $fkmatches = array('MATCH SIMPLE', 'MATCH FULL');
	var $fkdeferrable = array('NOT DEFERRABLE', 'DEFERRABLE');
	var $fkinitial = array('INITIALLY IMMEDIATE', 'INITIALLY DEFERRED');
	// Function properties
	var $funcprops = array(array('', 'ISCACHABLE'));
	var $defaultprops = array('');
	
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
		'EUC_JP' => 'EUC-JP',
		'EUC_KR' => 'EUC-KR',
		'EUC_TW' => 'EUC-TW', 
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
	
	// Map of internal language name to syntax highlighting name
	var $langmap = array(
		'sql' => 'SQL',
		'plpgsql' => 'SQL',
		'php' => 'PHP',
		'phpu' => 'PHP',
		'plphp' => 'PHP',
		'plphpu' => 'PHP',
		'perl' => 'Perl',
		'perlu' => 'Perl',
		'plperl' => 'Perl',
		'plperlu' => 'Perl',
		'java' => 'Java',
		'javau' => 'Java',
		'pljava' => 'Java',
		'pljavau' => 'Java',
		'plj' => 'Java',
		'plju' => 'Java',
		'python' => 'Python',
		'pythonu' => 'Python',
		'plpython' => 'Python',
		'plpythonu' => 'Python',
		'ruby' => 'Ruby',
		'rubyu' => 'Ruby',
		'plruby' => 'Ruby',
		'plrubyu' => 'Ruby'
	);
	
	// List of all legal privileges that can be applied to different types
	// of objects.
	var $privlist = array(
		'table' => array('SELECT', 'INSERT', 'UPDATE', 'RULE', 'ALL'),
		'view' => array('SELECT', 'INSERT', 'UPDATE', 'RULE', 'ALL'),
		'sequence' => array('SELECT', 'UPDATE', 'ALL')
	);

	// List of characters in acl lists and the privileges they
	// refer to.
	var $privmap = array(
		'r' => 'SELECT',
		'w' => 'UPDATE',
		'a' => 'INSERT',
		'R' => 'RULE'
	);
	
	// Rule action types
	var $rule_events = array('SELECT', 'INSERT', 'UPDATE', 'DELETE');

	// Select operators
	// Operators of type 'i' are 'infix', eg. a = '1'.  Type 'p' means postfix unary, eg. a IS TRUE.
	// 'x' is a bracketed subquery form.  eg. IN (1,2,3)
	var $selectOps = array('=' => 'i', '!=' => 'i', '<' => 'i', '>' => 'i', '<=' => 'i', '>=' => 'i', 'LIKE' => 'i', 'NOT LIKE' => 'i', 
									'~' => 'i', '!~' => 'i', '~*' => 'i', '!~*' => 'i', 'IS NULL' => 'p', 'IS NOT NULL' => 'p', 
									'IN' => 'x', 'NOT IN' => 'x');

	// Supported join operations for use with view wizard
	var $joinOps = array('INNER JOIN' => 'INNER JOIN');
	
	// Default help URL
	var $help_base;

	// Help sub pages
	var $help_page;
	
	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres($conn) {
		$this->ADODB_base($conn);
	}

	// Help functions
	
	/**
	 * Fetch a URL (or array of URLs) for a given help page.
	 */
	function getHelp($help) {
		$this->getHelpPages();
		
		if (isset($this->help_page[$help])) {
			if (is_array($this->help_page[$help])) {
				$urls = array();
				foreach ($this->help_page[$help] as $link) {
					$urls[] = $this->help_base . $link;
				}
				return $urls;
			} else
				return $this->help_base . $this->help_page[$help];
		} else
			return null;
	}

	/**
	 * Initialize help pages and return the full list
	 */
	function getHelpPages() {
		include_once('./help/PostgresDoc70.php');
		return $this->help_page;
	}
	
	// Formatting functions
	
	/**
	 * Cleans (escapes) a string
	 * @param $str The string to clean, by reference
	 * @return The cleaned string
	 */
	function clean(&$str) {
		if ($str === null) return null;
		$str = str_replace("\r\n","\n",$str);
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
	
	/**
	 * Escapes bytea data for display on the screen
	 * @param $data The bytea data
	 * @return Data formatted for on-screen display
	 */
	function escapeBytea($data) {
		if (function_exists('pg_escape_bytea'))
			return stripslashes(pg_escape_bytea($data));
		else {
		 		$translations = array('\\a' => '\\007', '\\b' => '\\010', '\\t' => '\\011', '\\n' => '\\012', '\\v' => '\\013', '\\f' => '\\014', '\\r' => '\\015');
 				return strtr(addCSlashes($data, "\0..\37\177..\377"), $translations);
		}
	}
	
	/**
	 * Outputs the HTML code for a particular field
	 * @param $name The name to give the field
	 * @param $value The value of the field.  Note this could be 'numeric(7,2)' sort of thing...
	 * @param $type The database type of the field
	 * @param $actions An array of javascript action name to the code to execute on that action
	 */
	function printField($name, $value, $type, $actions = array()) {
		global $lang;
		
		// Determine actions string
		$action_str = '';
		foreach ($actions as $k => $v) {
			$action_str .= " {$k}=\"" . htmlspecialchars($v) . "\"";
		}

		switch (substr($type,0,9)) {
			case 'bool':
			case 'boolean':
				if ($value !== null && $value == '') $value = null;
				elseif ($value == 'true') $value = 't';
				elseif ($value == 'false') $value = 'f';
				
				// If value is null, 't' or 'f'...
				if ($value === null || $value == 't' || $value == 'f') {
					echo "<select name=\"", htmlspecialchars($name), "\"{$action_str}>\n";
					echo "<option value=\"\"", ($value === null) ? ' selected="selected"' : '', "></option>\n";
					echo "<option value=\"t\"", ($value == 't') ? ' selected="selected"' : '', ">{$lang['strtrue']}</option>\n";
					echo "<option value=\"f\"", ($value == 'f') ? ' selected="selected"' : '', ">{$lang['strfalse']}</option>\n";
					echo "</select>\n";
				}
				else {
					echo "<input name=\"", htmlspecialchars($name), "\" value=\"", htmlspecialchars($value), "\" size=\"35\"{$action_str} />\n";
				}				
				break;
			case 'bytea':
				$value = $this->escapeBytea($value);
			case 'text':
				$n = substr_count($value, "\n");
				$n = $n < 5 ? 5 : $n;
				$n = $n > 20 ? 20 : $n;
				echo "<textarea name=\"", htmlspecialchars($name), "\" rows=\"{$n}\" cols=\"75\" wrap=\"virtual\"{$action_str}>\n";
				echo htmlspecialchars($value);
				echo "</textarea>\n";
				break;
			case 'character':
				$n = substr_count($value, "\n");
				$n = $n < 5 ? 5 : $n;
				$n = $n > 20 ? 20 : $n;
				echo "<textarea name=\"", htmlspecialchars($name), "\" rows=\"{$n}\" cols=\"35\" wrap=\"virtual\"{$action_str}>\n";
				echo htmlspecialchars($value);
				echo "</textarea>\n";
				break;
			default:
				echo "<input name=\"", htmlspecialchars($name), "\" value=\"", htmlspecialchars($value), "\" size=\"35\"{$action_str} />\n";
				break;
		}		
	}
	
	/**
	 * Formats a value or expression for sql purposes
	 * @param $type The type of the field
	 * @param $format VALUE or EXPRESSION
	 * @param $value The actual value entered in the field.  Can be NULL
	 * @return The suitably quoted and escaped value.
	 */
	function formatValue($type, $format, $value) {
		switch ($type) {
			case 'bool':
			case 'boolean':
				if ($value == 't')
					return 'TRUE';
				elseif ($value == 'f')
					return 'FALSE';
				elseif ($value == '')
					return 'NULL';
				else
					return $value;
				break;		
			default:
				// Checking variable fields is difficult as there might be a size
				// attribute...			
				if (strpos($type, 'time') === 0) {
					// Assume it's one of the time types...
					if ($value == '') return "''";
					elseif (strcasecmp($value, 'CURRENT_TIMESTAMP') == 0 
							|| strcasecmp($value, 'CURRENT_TIME') == 0
							|| strcasecmp($value, 'CURRENT_DATE') == 0
							|| strcasecmp($value, 'LOCALTIME') == 0
							|| strcasecmp($value, 'LOCALTIMESTAMP') == 0) {
						return $value;
					}
					elseif ($format == 'EXPRESSION')
						return $value;
					else {
						$this->clean($value);
						return "'{$value}'";
					}
				}
				else {
					if ($format == 'VALUE') {
						$this->clean($value);
						return "'{$value}'";					
					}
					return $value;
				}
		}
	}

	/**
	 * Formats a type correctly for display.  Postgres 7.0 had no 'format_type'
	 * built-in function, and hence we need to do it manually.
	 * @param $typname The name of the type
	 * @param $typmod The contents of the typmod field
	 */
	function formatType($typname, $typmod) {
		// This is a specific constant in the 7.0 source
		$varhdrsz = 4;
		
		// If the first character is an underscore, it's an array type
		$is_array = false;		
		if (substr($typname, 0, 1) == '_') {
			$is_array = true;
			$typname = substr($typname, 1);
		}	
		
		// Show lengths on bpchar and varchar
		if ($typname == 'bpchar') {
			$len = $typmod - $varhdrsz;
			$temp = 'character';
			if ($len > 1)
				$temp .= "({$len})";
		}
		elseif ($typname == 'varchar') {
			$temp = 'character varying';
			if ($typmod != -1)
				$temp .= "(" . ($typmod - $varhdrsz) . ")";			
		}
		elseif ($typname == 'numeric') {
			$temp = 'numeric';
			if ($typmod != -1) {
				$tmp_typmod = $typmod - $varhdrsz;
				$precision = ($tmp_typmod >> 16) & 0xffff;
				$scale = $tmp_typmod & 0xffff;
				$temp .= "({$precision}, {$scale})";
			}			
		}
		else $temp = $typname;
		
		// Add array qualifier if it's an array
		if ($is_array) $temp .= '[]';
		
		return $temp;
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
			$clause = " AND pu.usename='{$username}'";
		}
		else $clause = '';

		if ($currentdatabase != NULL)
			$orderby = "ORDER BY pdb.datname = '{$currentdatabase}' DESC, pdb.datname";
		else
			$orderby = "ORDER BY pdb.datname";

		if (!$conf['show_system'])
			$where = "AND pdb.datname NOT IN ('template1')";
		else
			$where = '';

		$sql = "SELECT pdb.datname, pu.usename AS datowner, pg_encoding_to_char(encoding) AS datencoding, 
					(SELECT description FROM pg_description pd WHERE pdb.oid=pd.objoid) AS datcomment 
					FROM pg_database pdb, pg_user pu
					WHERE pdb.datdba = pu.usesysid
					{$where}
					{$clause}
					{$orderby}";

		return $this->selectSet($sql);
	}

	/**
	 * Return the database owner of a db
	 * @param string $database the name of the database to get the owner for
	 * @return recordset of the db owner info
	 */
	function getDatabaseOwner($database) {
		$this->clean($database);
		$sql = "SELECT usename FROM pg_user, pg_database WHERE pg_user.usesysid = pg_database.datdba AND pg_database.datname = '{$database}' ";
		return $this->selectSet($sql);
	}

	/**
	 * Return all information about a particular database
	 * @param $database The name of the database to retrieve
	 * @return The database info
	 */
	function getDatabase($database) {
		$this->clean($database);
		$sql = "SELECT * FROM pg_database WHERE datname='{$database}'";
		return $this->selectSet($sql);
	}

	/**
	 * Returns the current database encoding
	 * @return The encoding.  eg. SQL_ASCII, UTF-8, etc.
	 */
	function getDatabaseEncoding() {
		// Try to avoid a query if at all possible (5)
		if (function_exists('pg_parameter_status')) {
			$encoding = pg_parameter_status($this->conn->_connectionID, 'server_encoding');
			if ($encoding !== false) return $encoding;
		}
		
		$sql = "SELECT getdatabaseencoding() AS encoding";
		
		return $this->selectField($sql, 'encoding');
	}
	
	/**
	 * Sets the client encoding
	 * @param $encoding The encoding to for the client
	 * @return 0 success
	 */
	function setClientEncoding($encoding) {
		return -99;
	}

	/**
	 * Creates a database
	 * @param $database The name of the database to create
	 * @param $encoding Encoding of the database
	 * @param $tablespace (optional) The tablespace name
	 * @return 0 success
	 */
	function createDatabase($database, $encoding, $tablespace = '') {
		$this->fieldClean($database);
		$this->clean($encoding);
		$this->fieldClean($tablespace);

		if ($encoding == '') {
			$sql = "CREATE DATABASE \"{$database}\"";
		} else {
			$sql = "CREATE DATABASE \"{$database}\" WITH ENCODING='{$encoding}'";
		}
		
		if ($tablespace != '' && $this->hasTablespaces()) $sql .= " TABLESPACE \"{$tablespace}\"";
		
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
	
	// Schema functions
	
	/**
	 * Sets the current working schema.  This is a do nothing method for
	 * < 7.3 and is just here for polymorphism's sake.
	 * @param $schema The the name of the schema to work in
	 * @return 0 success
	 */
	function setSchema($schema) {
		return 0;
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
				NULL AS nspname, relname
			FROM
				pg_class pc, pg_inherits pi
			WHERE
				pc.oid=pi.inhparent
				AND pi.inhrelid = (SELECT oid from pg_class WHERE relname='{$table}')
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
				NULL AS nspname, relname
			FROM
				pg_class pc, pg_inherits pi
			WHERE
				pc.oid=pi.inhrelid
				AND pi.inhparent = (SELECT oid from pg_class WHERE relname='{$table}')
		";
		
		return $this->selectSet($sql);					
	}	
	
	// Table functions

	/**
	 * Returns table information
	 * @param $table The name of the table
	 * @return A recordset
	 */
	function getTable($table) {
		$this->clean($table);
				
		$sql = "SELECT pc.relname, 
			pg_get_userbyid(pc.relowner) AS relowner, 
			(SELECT description FROM pg_description pd 
                        WHERE pc.oid=pd.objoid) AS relcomment 
			FROM pg_class pc
			WHERE pc.relname='{$table}'";
							
		return $this->selectSet($sql);
	}

	/**
	 * Return all tables in current database
	 * @param $all True to fetch all tables, false for just in current schema
	 * @return All tables, sorted alphabetically 
	 */
	function getTables($all = false) {
		global $conf;
		if (!$conf['show_system'] || $all) $where = "AND c.relname NOT LIKE 'pg\\\\_%' ";
		else $where = '';
		
		$sql = "SELECT NULL AS nspname, c.relname, 
					(SELECT usename FROM pg_user u WHERE u.usesysid=c.relowner) AS relowner, 
					(SELECT description FROM pg_description pd WHERE c.oid=pd.objoid) AS relcomment,
					reltuples::integer AS reltuples
				FROM pg_class c 
				WHERE c.relkind='r' 
					AND NOT EXISTS (SELECT 1 FROM pg_rewrite r WHERE r.ev_class = c.oid AND r.ev_type = '1')
					{$where}
				ORDER BY relname";
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
			$sql = "SELECT
					a.attname, t.typname as type, a.attlen, a.atttypmod, a.attnotnull, a.atthasdef, -1 AS attstattarget, a.attstorage,
					(SELECT adsrc FROM pg_attrdef adef WHERE a.attrelid=adef.adrelid AND a.attnum=adef.adnum) AS adsrc,
					a.attstorage AS typstorage, false AS attisserial, 
                                        (SELECT description FROM pg_description d WHERE d.objoid = a.oid) as comment 
				FROM
					pg_attribute a,
					pg_class c,
					pg_type t
				WHERE
					c.relname = '{$table}' AND a.attnum > 0 AND a.attrelid = c.oid AND a.atttypid = t.oid
				ORDER BY a.attnum";
		}
		else {
			$sql = "SELECT
					a.attname, t.typname as type, t.typname as base_type, 
					a.attlen, a.atttypmod, a.attnotnull, a.atthasdef, -1 AS attstattarget, a.attstorage,
					(SELECT adsrc FROM pg_attrdef adef WHERE a.attrelid=adef.adrelid AND a.attnum=adef.adnum) AS adsrc,
					a.attstorage AS typstorage, 
                                       (SELECT description FROM pg_description d WHERE d.objoid = a.oid) as comment 
				FROM
					pg_attribute a ,
					pg_class c,
					pg_type t
				WHERE
					c.relname = '{$table}' AND a.attname='{$field}' AND a.attrelid = c.oid AND a.atttypid = t.oid";
		}
		
		return $this->selectSet($sql);
	}

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
	 * Creates a new table in the database
	 * @param $name The name of the table
	 * @param $fields The number of fields
	 * @param $field An array of field names
	 * @param $type An array of field types
	 * @param $array An array of '' or '[]' for each type if it's an array or not
	 * @param $length An array of field lengths
	 * @param $notnull An array of not null
	 * @param $default An array of default values
	 * @param $withoutoids True if WITHOUT OIDS, false otherwise
	 * @param $colcomment An array of comments
	 * @param $comment Table comment
	 * @param $tablespace The tablespace name ('' means none/default)
 	 * @param $uniquekey An Array indicating the fields that are unique (those indexes that are set)
 	 * @param $primarykey An Array indicating the field used for the primarykey (those indexes that are set)
	 * @return 0 success
	 * @return -1 no fields supplied
	 */
	function createTable($name, $fields, $field, $type, $array, $length, $notnull, 
				$default, $withoutoids, $colcomment, $tblcomment, $tablespace,
				$uniquekey, $primarykey) {
		$this->fieldClean($name);
		$this->clean($tblcomment);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$found = false;
		$first = true;
		$comment_sql = ''; //Accumulate comments for the columns
		$sql = "CREATE TABLE \"{$name}\" (";
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
			// Add other qualifiers
			if (!isset($primarykey[$i])) {
 				if (isset($uniquekey[$i])) $sql .= " UNIQUE";
 				if (isset($notnull[$i])) $sql .= " NOT NULL";
 			}
			if ($default[$i] != '') $sql .= " DEFAULT {$default[$i]}";

			if ($colcomment[$i] != '') $comment_sql .= "COMMENT ON COLUMN \"{$name}\".\"{$field[$i]}\" IS '{$colcomment[$i]}';\n";

			$found = true;
		}
		
		if (!$found) return -1;
		
		// PRIMARY KEY
 		$primarykeycolumns = array();
 		for ($i = 0; $i < $fields; $i++) {
 			if (isset($primarykey[$i])) {
 				$primarykeycolumns[] = "\"{$field[$i]}\"";
 			}
		}
 		if (count($primarykeycolumns) > 0) {
 			$sql .= ", PRIMARY KEY (" . implode(", ", $primarykeycolumns) . ")";
 		}
 		
		$sql .= ")";
		
		// WITHOUT OIDS
		if ($this->hasWithoutOIDs() && $withoutoids)
			$sql .= ' WITHOUT OIDS';
			
		// Tablespace
		if ($this->hasTablespaces() && $tablespace != '') {
			$this->fieldClean($tablespace);
			$sql .= " TABLESPACE \"{$tablespace}\"";
		}
		
		$status = $this->execute($sql);
		if ($status) {
			$this->rollbackTransaction();
			return -1;
		}

		if ($tblcomment != '') {
			$status = $this->setComment('TABLE', '', $name, $tblcomment, true);
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

	/**
	 * Alters a table
	 * @param $table The name of the table
	 * @param $name The new name for the table
	 * @param $owner The new owner for the table	
	 * @param $comment The comment on the table
	 * @param $tablespace The new tablespace for the table ('' means leave as is)
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 owner error
	 * @return -3 rename error
	 * @return -4 comment error
	 * @return -5 get existing table error
	 * @return -6 tablespace error
	 */
	function alterTable($table, $name, $owner, $comment, $tablespace) {
		$this->fieldClean($table);
		$this->fieldClean($name);
		$this->fieldClean($owner);
		$this->clean($comment);
		$this->fieldClean($tablespace);

		$status = $this->beginTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
		
		// Comment
		$status = $this->setComment('TABLE', '', $table, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}
		
		// Owner
		if ($this->hasAlterTableOwner() && $owner != '') {
			// Fetch existing owner
			$data = $this->getTable($table);
			if ($data->recordCount() != 1) {
				$this->rollbackTransaction();
				return -5;
			}
				
			// If owner has been changed, then do the alteration.  We are
			// careful to avoid this generally as changing owner is a
			// superuser only function.
			if ($data->f['relowner'] != $owner) {
				$sql = "ALTER TABLE \"{$table}\" OWNER TO \"{$owner}\"";
		
				$status = $this->execute($sql);
				if ($status != 0) {
					$this->rollbackTransaction();
					return -2;
				}
			}
		}
		
		// Tablespace
		if ($this->hasTablespaces() && $tablespace != '') {
			// Fetch existing tablespace
			$data = $this->getTable($table);
			if ($data->recordCount() != 1) {
				$this->rollbackTransaction();
				return -5;
			}
				
			// If tablespace has been changed, then do the alteration.  We
			// don't want to do this unnecessarily.
			if ($data->f['tablespace'] != $tablespace) {
				$sql = "ALTER TABLE \"{$table}\" SET TABLESPACE \"{$tablespace}\"";
		
				$status = $this->execute($sql);
				if ($status != 0) {
					$this->rollbackTransaction();
					return -6;
				}
			}		
		}

		// Rename (only if name has changed)
		if ($name != $table) {
			$sql = "ALTER TABLE \"{$table}\" RENAME TO \"{$name}\"";
			$status = $this->execute($sql);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -3;
			}
		}
				
		return $this->endTransaction();
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

		return $this->execute($sql);
	}

	/**
	 * Returns the SQL definition for the table.
	 * @pre MUST be run within a transaction
	 * @param $table The table to define
	 * @param $clean True to issue drop command, false otherwise
	 * @return A string containing the formatted SQL code
	 * @return null On error
	 */
	function getTableDefPrefix($table, $clean = false) {
		// Fetch table
		$t = $this->getTable($table);
		if (!is_object($t) || $t->recordCount() != 1) {
			$this->rollbackTransaction();
			return null;
		}
		$this->fieldClean($t->f['relname']);

		// Fetch attributes
		$atts = $this->getTableAttributes($table);
		if (!is_object($atts)) {
			$this->rollbackTransaction();
			return null;
		}

		// Fetch constraints
		$cons = $this->getConstraints($table);
		if (!is_object($cons)) {
			$this->rollbackTransaction();
			return null;
		}

		// Output a reconnect command to create the table as the correct user
		$sql = $this->getChangeUserSQL($t->f['relowner']) . "\n\n";

		// Set schema search path if we support schemas
		if ($this->hasSchemas()) {
			$sql .= "SET search_path = \"{$this->_schema}\", pg_catalog;\n\n";
		}
		
		// Begin CREATE TABLE definition
		$sql .= "-- Definition\n\n";
		// DROP TABLE must be fully qualified in case a table with the same name exists
		// in pg_catalog.
		if (!$clean) $sql .= "-- ";
		$sql .= "DROP TABLE ";
		if ($this->hasSchemas()) {
			$sql .= "\"{$this->_schema}\".";
		}
		$sql .= "\"{$t->f['relname']}\";\n";
		$sql .= "CREATE TABLE \"{$t->f['relname']}\" (\n";

		// Output all table columns
		$col_comments_sql = '';   // Accumulate comments on columns
		$num = $atts->recordCount() + $cons->recordCount();
		$i = 1;
		while (!$atts->EOF) {
			$this->fieldClean($atts->f['attname']);
			$sql .= "    \"{$atts->f['attname']}\"";
			// Dump SERIAL and BIGSERIAL columns correctly
			if ($this->phpBool($atts->f['attisserial']) && 
					($atts->f['type'] == 'integer' || $atts->f['type'] == 'bigint')) {
				if ($atts->f['type'] == 'integer')
					$sql .= " SERIAL";
				else
					$sql .= " BIGSERIAL";
			}
			else {
				$sql .= " " . $this->formatType($atts->f['type'], $atts->f['atttypmod']);

				// Add NOT NULL if necessary
				if ($this->phpBool($atts->f['attnotnull']))
					$sql .= " NOT NULL";
				// Add default if necessary
				if ($atts->f['adsrc'] !== null) 
					$sql .= " DEFAULT {$atts->f['adsrc']}";
			}

			// Output comma or not
			if ($i < $num) $sql .= ",\n";
			else $sql .= "\n";

			// Does this column have a comment?  
			if ($atts->f['comment'] !== null) {
				$this->clean($atts->f['comment']);
				$col_comments_sql .= "COMMENT ON COLUMN \"{$t->f['relname']}\".\"{$atts->f['attname']}\"  IS '{$atts->f['comment']}';\n";
			}
			
			$atts->moveNext();
			$i++;
		}
		// Output all table constraints
		while (!$cons->EOF) {
			$this->fieldClean($cons->f['conname']);
			$sql .= "    CONSTRAINT \"{$cons->f['conname']}\" ";
			// Nasty hack to support pre-7.4 PostgreSQL
			if ($cons->f['consrc'] !== null)
				$sql .= $cons->f['consrc'];
			else {
				switch ($cons->f['contype']) {
					case 'p':
						$keys = $this->getAttributeNames($table, explode(' ', $cons->f['indkey']));
						$sql .= "PRIMARY KEY (" . join(',', $keys) . ")";
						break;
					case 'u':
						$keys = $this->getAttributeNames($table, explode(' ', $cons->f['indkey']));
						$sql .= "UNIQUE (" . join(',', $keys) . ")";
						break;
					default:
						// Unrecognised constraint
						$this->rollbackTransaction();
						return null;
				}
			}

			// Output comma or not
			if ($i < $num) $sql .= ",\n";
			else $sql .= "\n";

			$cons->moveNext();
			$i++;
		}

		$sql .= ")";

		// @@@@ DUMP CLUSTERING INFORMATION

		// Inherits
		/*
		 * XXX: This is currently commented out as handling inheritance isn't this simple.
		 * You also need to make sure you don't dump inherited columns and defaults, as well
		 * as inherited NOT NULL and CHECK constraints.  So for the time being, we just do
		 * not claim to support inheritance.
		$parents = $this->getTableParents($table);
		if ($parents->recordCount() > 0) {
			$sql .= " INHERITS (";
			while (!$parents->EOF) {
				$this->fieldClean($parents->f['relname']);
				// Qualify the parent table if it's in another schema
				if ($this->hasSchemas() && $parents->f['schemaname'] != $this->_schema) {
					$this->fieldClean($parents->f['schemaname']);
					$sql .= "\"{$parents->f['schemaname']}\".";
				}
				$sql .= "\"{$parents->f['relname']}\"";
				
				$parents->moveNext();
				if (!$parents->EOF) $sql .= ', ';
			}			
			$sql .= ")";
		}
		*/

		// Handle WITHOUT OIDS
		if ($this->hasWithoutOIDs()) {
			if ($this->hasObjectID($table))
				$sql .= " WITH OIDS";
			else
				$sql .= " WITHOUT OIDS";
		}

		$sql .= ";\n";

		// Column storage and statistics
		$atts->moveFirst();
		$first = true;
		while (!$atts->EOF) {
			$this->fieldClean($atts->f['attname']);
			// Statistics first
			if ($atts->f['attstattarget'] >= 0) {
				if ($first) {
					$sql .= "\n";
					$first = false;
				}
				$sql .= "ALTER TABLE ONLY \"{$t->f['relname']}\" ALTER COLUMN \"{$atts->f['attname']}\" SET STATISTICS {$atts->f['attstattarget']};\n";
			}
			// Then storage
			if ($atts->f['attstorage'] != $atts->f['typstorage']) {
				switch ($atts->f['attstorage']) {
					case 'p':
						$storage = 'PLAIN';
						break;
					case 'e':
						$storage = 'EXTERNAL';
						break;
					case 'm':
						$storage = 'MAIN';
						break;
					case 'x':
						$storage = 'EXTENDED';
						break;
					default:
						// Unknown storage type
						$this->rollbackTransaction();
						return null;
				}
				$sql .= "ALTER TABLE ONLY \"{$t->f['relname']}\" ALTER COLUMN \"{$atts->f['attname']}\" SET STORAGE {$storage};\n";
			}

			$atts->moveNext();
		}

		// Comment
		if ($t->f['relcomment'] !== null) {
			$this->clean($t->f['relcomment']);
			$sql .= "\n-- Comment\n\n";
			$sql .= "COMMENT ON TABLE \"{$t->f['relname']}\" IS '{$t->f['relcomment']}';\n";
		}

		// Add comments on columns, if any
		if ($col_comments_sql != '') $sql .= $col_comments_sql;

		// Privileges
		$privs = $this->getPrivileges($table, 'table');
		if (!is_array($privs)) {
			$this->rollbackTransaction();
			return null;
		}

		if (sizeof($privs) > 0) {
			$sql .= "\n-- Privileges\n\n";
			/*
			 * Always start with REVOKE ALL FROM PUBLIC, so that we don't have to
			 * wire-in knowledge about the default public privileges for different
			 * kinds of objects.
			 */
			$sql .= "REVOKE ALL ON TABLE \"{$t->f['relname']}\" FROM PUBLIC;\n";
			foreach ($privs as $v) {
				// Get non-GRANT OPTION privs
				$nongrant = array_diff($v[2], $v[4]);
				
				// Skip empty or owner ACEs
				if (sizeof($v[2]) == 0 || ($v[0] == 'user' && $v[1] == $t->f['relowner'])) continue;
				
				// Change user if necessary
				if ($this->hasGrantOption() && $v[3] != $t->f['relowner']) {
					$grantor = $v[3];
					$this->clean($grantor);
					$sql .= "SET SESSION AUTHORIZATION '{$grantor}';\n";
				}				
				
				// Output privileges with no GRANT OPTION
				$sql .= "GRANT " . join(', ', $nongrant) . " ON TABLE \"{$t->f['relname']}\" TO ";
				switch ($v[0]) {
					case 'public':
						$sql .= "PUBLIC;\n";
						break;
					case 'user':
						$this->fieldClean($v[1]);
						$sql .= "\"{$v[1]}\";\n";
						break;
					case 'group':
						$this->fieldClean($v[1]);
						$sql .= "GROUP \"{$v[1]}\";\n";
						break;
					default:
						// Unknown privilege type - fail
						$this->rollbackTransaction();
						return null;
				}

				// Reset user if necessary
				if ($this->hasGrantOption() && $v[3] != $t->f['relowner']) {
					$sql .= "RESET SESSION AUTHORIZATION;\n";
				}				
				
				// Output privileges with GRANT OPTION
				
				// Skip empty or owner ACEs
				if (!$this->hasGrantOption() || sizeof($v[4]) == 0) continue;

				// Change user if necessary
				if ($this->hasGrantOption() && $v[3] != $t->f['relowner']) {
					$grantor = $v[3];
					$this->clean($grantor);
					$sql .= "SET SESSION AUTHORIZATION '{$grantor}';\n";
				}				
				
				$sql .= "GRANT " . join(', ', $v[4]) . " ON \"{$t->f['relname']}\" TO ";
				switch ($v[0]) {
					case 'public':
						$sql .= "PUBLIC";
						break;
					case 'user':
						$this->fieldClean($v[1]);
						$sql .= "\"{$v[1]}\"";
						break;
					case 'group':
						$this->fieldClean($v[1]);
						$sql .= "GROUP \"{$v[1]}\"";
						break;
					default:
						// Unknown privilege type - fail
						return null;
				}
				$sql .= " WITH GRANT OPTION;\n";
				
				// Reset user if necessary
				if ($this->hasGrantOption() && $v[3] != $t->f['relowner']) {
					$sql .= "RESET SESSION AUTHORIZATION;\n";
				}				

			}
		}

		// Add a newline to separate data that follows (if any)
		$sql .= "\n";

		return $sql;
	}

	/**
	 * Returns extra table definition information that is most usefully
	 * dumped after the table contents for speed and efficiency reasons
	 * @param $table The table to define
	 * @return A string containing the formatted SQL code
	 * @return null On error
	 */
	function getTableDefSuffix($table) {
		$sql = '';

		// Indexes
		$indexes = $this->getIndexes($table);
		if (!is_object($indexes)) {
			$this->rollbackTransaction();
			return null;
		}

		if ($indexes->recordCount() > 0) {
			$sql .= "\n-- Indexes\n\n";
			while (!$indexes->EOF) {
				$sql .= $indexes->f['inddef'] . ";\n";

				$indexes->moveNext();
			}
		}

		// Triggers
		$triggers = $this->getTriggers($table);
		if (!is_object($triggers)) {
			$this->rollbackTransaction();
			return null;
		}

		if ($triggers->recordCount() > 0) {
			$sql .= "\n-- Triggers\n\n";
			while (!$triggers->EOF) {
				// Nasty hack to support pre-7.4 PostgreSQL
				if ($triggers->f['tgdef'] !== null)
					$sql .= $triggers->f['tgdef'];
				else 
					$sql .= $this->getTriggerDef($triggers->f);	

				$sql .= ";\n";

				$triggers->moveNext();
			}
		}

		// Rules
		$rules = $this->getRules($table);
		if (!is_object($rules)) {
			$this->rollbackTransaction();
			return null;
		}

		if ($rules->recordCount() > 0) {
			$sql .= "\n-- Rules\n\n";
			while (!$rules->EOF) {
				$sql .= $rules->f['definition'] . "\n";

				$rules->moveNext();
			}
		}

		return $sql;
	}

	/**
	 * Given an array of attnums and a relation, returns an array mapping
	 * atttribute number to attribute name.  Relation could be a table OR
	 * a view.
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
	 * Add a new column to a table
	 * @param $table The table to add to
	 * @param $column The name of the new column
	 * @param $type The type of the column
	 * @param $array True if array type, false otherwise
	 * @param $notnull True if NOT NULL, false otherwise
	 * @param $default The default for the column.  '' for none.
	 * @param $length The optional size of the column (ie. 30 for varchar(30))
	 * @return 0 success
	 */
	function addColumn($table, $column, $type, $array, $length, $notnull, $default, $comment) {
		$this->fieldClean($table);
		$this->fieldClean($column);
		$this->clean($type);
		$this->clean($length);
		$this->clean($comment);

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
		
		// Add array qualifier, if requested
		if ($array) $sql .= '[]';
		
		// If we have advanced column adding, add the extra qualifiers
		if ($this->hasAlterColumnType()) {
			// NOT NULL clause
			if ($notnull) $sql .= ' NOT NULL';
			
			// DEFAULT clause
			if ($default != '') $sql .= ' DEFAULT ' . $default;
		}

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$status = $this->execute($sql);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		$status = $this->setComment('COLUMN', $column, $table, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}

		return $this->endTransaction();
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
	 * Alters a column in a table OR view
	 * @param $table The table in which the column resides
	 * @param $column The column to alter
	 * @param $name The new name for the column
	 * @param $notnull (boolean) True if not null, false otherwise
	 * @param $oldnotnull (boolean) True if column is already not null, false otherwise
	 * @param $default The new default for the column
	 * @param $olddefault The old default for the column
	 * @param $type The new type for the column
	 * @param $array True if array type, false otherwise
	 * @param $length The optional size of the column (ie. 30 for varchar(30))
	 * @param $oldtype The old type for the column
	 * @param $comment Comment for the column
	 * @return 0 success
	 * @return -1 set not null error
	 * @return -2 set default error
	 * @return -3 rename column error
	 * @return -4 comment error
	 */
	function alterColumn($table, $column, $name, $notnull, $oldnotnull, $default, $olddefault, 
									$type, $length, $array, $oldtype, $comment) {
		$this->beginTransaction();

		// @@ NEED TO HANDLE "NESTED" TRANSACTION HERE
		if ($notnull != $oldnotnull) {
			$status = $this->setColumnNull($table, $column, !$notnull);
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
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
		
		// Parameters must be cleaned for the setComment function.  It's ok to do
		// that here since this is the last time these variables are used.
		$this->fieldClean($name);
		$this->fieldClean($table);
		$this->clean($comment);	
		$status = $this->setComment('COLUMN', $name, $table, $comment);
		if ($status != 0) {
		  $this->rollbackTransaction();
		  return -4;
		}

		return $this->endTransaction();
	}	

	// Row functions
	
	/**
	 * Delete a row from a table
	 * @param $table The table from which to delete
	 * @param $key An array mapping column => value to delete
	 * @return 0 success
	 */
	function deleteRow($table, $key) {
		if (!is_array($key)) return -1;
		else {
			// Begin transaction.  We do this so that we can ensure only one row is
			// deleted
			$status = $this->beginTransaction();
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}
			
			$status = $this->delete($table, $key);
			if ($status != 0 || $this->conn->Affected_Rows() != 1) {
				$this->rollbackTransaction();
				return -2;
			}
			
			// End transaction
			return $this->endTransaction();
		}
	}
	
	/**
	 * Updates a row in a table
	 * @param $table The table in which to update
	 * @param $vars An array mapping new values for the row
	 * @param $nulls An array mapping column => something if it is to be null
	 * @param $format An array of the data type (VALUE or EXPRESSION)
	 * @param $types An array of field types
	 * @param $keyarr An array mapping column => value to update
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function editRow($table, $vars, $nulls, $format, $types, $keyarr) {
		if (!is_array($vars) || !is_array($nulls) || !is_array($format)
			|| !is_array($types)) return -1;
		else {
			$this->fieldClean($table);

			// Build clause
			if (sizeof($vars) > 0) {
				foreach($vars as $key => $value) {
					$this->fieldClean($key);
	
					// Handle NULL values
					if (isset($nulls[$key])) $tmp = 'NULL';
					else $tmp = $this->formatValue($types[$key], $format[$key], $value);
					
					if (isset($sql)) $sql .= ", \"{$key}\"={$tmp}";
					else $sql = "UPDATE \"{$table}\" SET \"{$key}\"={$tmp}";
				}
				$first = true;
				foreach ($keyarr as $k => $v) {
					$this->fieldClean($k);
					$this->clean($v);
					if ($first) {
						$sql .= " WHERE \"{$k}\"='{$v}'";
						$first = false;
					}
					else $sql .= " AND \"{$k}\"='{$v}'";
				}				
			}

			// Begin transaction.  We do this so that we can ensure only one row is
			// edited
			$status = $this->beginTransaction();
			if ($status != 0) {
				$this->rollbackTransaction();
				return -1;
			}

			$status = $this->execute($sql);
			if ($status != 0 || $this->conn->Affected_Rows() != 1) {
				$this->rollbackTransaction();
				return -2;
			}
		
			// End transaction
			return $this->endTransaction();		
		}
	}

	/**
	 * Adds a new row to a table
	 * @param $table The table in which to insert
	 * @param $var An array mapping new values for the row
	 * @param $nulls An array mapping column => something if it is to be null
	 * @param $format An array of the data type (VALUE or EXPRESSION)
	 * @param $types An array of field types
	 * @return 0 success
	 * @return -1 invalid parameters
	 */
	function insertRow($table, $vars, $nulls, $format, $types) {
		if (!is_array($vars) || !is_array($nulls) || !is_array($format)
			|| !is_array($types)) return -1;
		else {
			$this->fieldClean($table);

			// Build clause
			if (sizeof($vars) > 0) {
				$fields = '';
				$values = '';
				foreach($vars as $key => $value) {
					$this->fieldClean($key);
	
					// Handle NULL values
					if (isset($nulls[$key])) $tmp = 'NULL';
					else $tmp = $this->formatValue($types[$key], $format[$key], $value);
					
					if ($fields) $fields .= ", \"{$key}\"";
					else $fields = "INSERT INTO \"{$table}\" (\"{$key}\"";

					if ($values) $values .= ", {$tmp}";
					else $values = ") VALUES ({$tmp}";
				}
				$sql = $fields . $values . ')';
			}			
			return $this->execute($sql);
		}
	}
	
	/**
	 * Returns a recordset of all columns in a table
	 * @param $table The name of a table
	 * @param $key The associative array holding the key to retrieve
	 * @return A recordset
	 */
	function browseRow($table, $key) {
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
		$sql = "SELECT indrelid, indkey FROM pg_index WHERE indisunique AND indrelid=(SELECT oid FROM pg_class 
					WHERE relname='{$table}') AND indpred='' AND indproc=0 ORDER BY indisprimary DESC LIMIT 1";
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

	// Sequence functions
	
	/**
	 * Returns all sequences in the current database
	 * @return A recordset
	 */
	function getSequences($all = false) {
		// $all argument is ignored as it makes no difference
		$sql = "SELECT
					c.relname AS seqname,
					u.usename AS seqowner,
					(SELECT description FROM pg_description pd WHERE c.oid=pd.objoid) AS seqcomment
				FROM 
					pg_class c, pg_user u WHERE c.relowner=u.usesysid AND c.relkind = 'S' ORDER BY seqname";
					
		return $this->selectSet( $sql );
	}

	/**
	 * Returns properties of a single sequence
	 * @param $sequence Sequence name
	 * @return A recordset
	 */
	function getSequence($sequence) {
		$temp = $sequence;
		// Need both field cleaned and literal cleaned versions
		$this->fieldClean($sequence);
		$this->clean($temp);
		
		$sql = "SELECT sequence_name AS seqname, *, 
					(SELECT description FROM pg_description pd WHERE pd.objoid=(SELECT oid FROM pg_class WHERE relname='{$temp}')) AS seqcomment
					FROM \"{$sequence}\" AS s"; 
		
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
	 * Resets a given sequence to min value of sequence
	 * @param $sequence Sequence name
	 * @return 0 success
	 * @return -1 sequence not found
	 */
	function resetSequence($sequence) {
		// Get the minimum value of the sequence
		$seq = $this->getSequence($sequence);
		if ($seq->recordCount() != 1) return -1;
		$minvalue = $seq->f[$this->sqFields['minvalue']];

		/* This double-cleaning is deliberate */
		$this->fieldClean($sequence);
		$this->clean($sequence);
		
		$sql = "SELECT SETVAL('\"{$sequence}\"', {$minvalue})";
		
		return $this->execute($sql);
	}

	/**
	 * Creates a new sequence
	 * @param $sequence Sequence name
	 * @param $increment The increment
	 * @param $minvalue The min value
	 * @param $maxvalue The max value
	 * @param $startvalue The starting value
	 * @param $cachevalue The cache value
	 * @param $cycledvalue True if cycled, false otherwise
	 * @return 0 success
	 */
	function createSequence($sequence, $increment, $minvalue, $maxvalue, 
								$startvalue, $cachevalue, $cycledvalue) {
		$this->fieldClean($sequence);
		$this->clean($increment);
		$this->clean($minvalue);
		$this->clean($maxvalue);
		$this->clean($startvalue);
		$this->clean($cachevalue);
		
		$sql = "CREATE SEQUENCE \"{$sequence}\"";
		if ($increment != '') $sql .= " INCREMENT {$increment}";
		if ($minvalue != '') $sql .= " MINVALUE {$minvalue}";
		if ($maxvalue != '') $sql .= " MAXVALUE {$maxvalue}";
		if ($startvalue != '') $sql .= " START {$startvalue}";
		if ($cachevalue != '') $sql .= " CACHE {$cachevalue}";
		if ($cycledvalue) $sql .= " CYCLE";
		
		return $this->execute($sql);
	}

	// Constraint functions

	/**
	 * Returns a list of all constraints on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function getConstraints($table) {
		$this->clean($table);

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$sql = "
			SELECT
				rcname AS conname,
				'CHECK (' || rcsrc || ')' AS consrc,
				'c' AS contype,
				NULL::int2vector AS indkey
			FROM
				pg_relcheck
			WHERE 
				rcrelid = (SELECT oid FROM pg_class WHERE relname='{$table}')
			UNION ALL
			SELECT
				pc.relname,
				NULL,
				CASE WHEN indisprimary THEN
					'p'
				ELSE
					'u'
				END,
				indkey
			FROM
				pg_class pc,
				pg_index pi
			WHERE
				pc.oid=pi.indexrelid
				AND (pi.indisunique OR pi.indisprimary)
				AND pi.indrelid = (SELECT oid FROM pg_class WHERE relname='{$table}')
			ORDER BY
				1
		";

		return $this->selectSet($sql);
	}

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
	 * @param $targschema The schema that houses the target table to which to add the foreign key
	 * @param $targtable The table to which to add the foreign key
	 * @param $target The table that contains the target columns
	 * @param $sfields (array) An array of source fields over which to add the foreign key
	 * @param $tfields (array) An array of target fields over which to add the foreign key
	 * @param $upd_action The action for updates (eg. RESTRICT)
	 * @param $del_action The action for deletes (eg. RESTRICT)
	 * @param $match The match type (eg. MATCH FULL)
	 * @param $deferrable The deferrability (eg. NOT DEFERRABLE)
	 * @param $intially The initial deferrability (eg. INITIALLY IMMEDIATE)
	 * @param $name (optional) The name to give the key, otherwise default name is assigned
	 * @return 0 success
	 * @return -1 no fields given
	 */
	function addForeignKey($table, $targschema, $targtable, $sfields, $tfields, $upd_action, $del_action, 
							$match, $deferrable, $initially, $name = '') {
		if (!is_array($sfields) || sizeof($sfields) == 0 ||
			!is_array($tfields) || sizeof($tfields) == 0) return -1;
		$this->fieldClean($table);
		$this->fieldClean($targschema);
		$this->fieldClean($targtable);
		$this->fieldArrayClean($sfields);
		$this->fieldArrayClean($tfields);
		$this->fieldClean($name);

		$sql = "ALTER TABLE \"{$table}\" ADD ";
		if ($name != '') $sql .= "CONSTRAINT \"{$name}\" ";
		$sql .= "FOREIGN KEY (\"" . join('","', $sfields) . "\") ";
		$sql .= "REFERENCES ";
		// Target table needs to be fully qualified
		if ($this->hasSchemas()) {
			$sql .= "\"{$targschema}\".";
		}		
		$sql .= "\"{$targtable}\"(\"" . join('","', $tfields) . "\") ";
		if ($match != $this->fkmatches[0]) $sql .= " {$match}";
		if ($upd_action != $this->fkactions[0]) $sql .= " ON UPDATE {$upd_action}";
		if ($del_action != $this->fkactions[0]) $sql .= " ON DELETE {$del_action}";
		if ($deferrable != $this->fkdeferrable[0]) $sql .= " {$deferrable}";
		if ($initially != $this->fkinitial[0]) $sql .= " {$initially}";

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
	 * Finds the foreign keys that refer to the specified table
	 * @param $table The table to find referrers for
	 * @return A recordset
	 */
	function getReferrers($table) {
		// In PostgreSQL < 7.3, there is no way to discover foreign keys
		return -99;
	}

	// Index functions

	/**
	 * Grabs a list of indexes for a table
	 * @param $table The name of a table whose indexes to retrieve
	 * @param $unique Only get unique/pk indexes
	 * @return A recordset
	 */
	function getIndexes($table = '', $unique = false) {
		$this->clean($table);
		$sql = "SELECT c2.relname AS indname, i.indisprimary, i.indisunique, pg_get_indexdef(i.indexrelid) AS inddef
			FROM pg_class c, pg_class c2, pg_index i
			WHERE c.relname = '{$table}' AND c.oid = i.indrelid AND i.indexrelid = c2.oid
		";
		if ($unique) $sql .= " AND i.indisunique ";
		$sql .= " ORDER BY c2.relname";

		return $this->selectSet($sql);
	}

	/**
	 * Creates an index
	 * @param $name The index name
	 * @param $table The table on which to add the index
	 * @param $columns An array of columns that form the index
	 *                 or a string expression for a functional index
	 * @param $type The index type
	 * @param $unique True if unique, false otherwise
	 * @param $where Index predicate ('' for none)
	 * @param $tablespace The tablespaces ('' means none/default)
	 * @return 0 success
	 */
	function createIndex($name, $table, $columns, $type, $unique, $where, $tablespace) {
		$this->fieldClean($name);
		$this->fieldClean($table);

		$sql = "CREATE";
		if ($unique) $sql .= " UNIQUE";
		$sql .= " INDEX \"{$name}\" ON \"{$table}\" USING {$type} ";
		
		if (is_array($columns)) {
			$this->arrayClean($columns);
			$sql .= "(\"" . implode('","', $columns) . "\")";
		} else {
			$sql .= "(" . $columns .")";
		}

		// Tablespace
		if ($this->hasTablespaces() && $tablespace != '') {
			$this->fieldClean($tablespace);
			$sql .= " TABLESPACE \"{$tablespace}\"";
		}

		// Predicate
		if ($this->hasPartialIndexes() && trim($where) != '') {
			$sql .= " WHERE ({$where})";
		}

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

	/**
	 * Clusters an index
	 * @param $index The name of the index
	 * @param $table The table the index is on
	 * @return 0 success
	 */
	function clusterIndex($index, $table) {
		$this->fieldClean($index);
		$this->fieldClean($table);

		// We don't bother with a transaction here, as there's no point rolling
		// back an expensive cluster if a cheap analyze fails for whatever reason
		$sql = "CLUSTER \"{$index}\" ON \"{$table}\"";

		return $this->execute($sql);
	}

	// Rule functions
	
	/**
	 * Returns a list of all rules on a table
	 * @param $table The table to find rules for
	 * @return A recordset
	 */
	function getRules($table) {
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
	function getViews() {
		global $conf;

		if (!$conf['show_system'])
			$where = " WHERE viewname NOT LIKE 'pg\\\\_%'";
		else
			$where = '';

		$sql = "SELECT viewname AS relname, viewowner AS relowner, definition AS vwdefinition,
			      (SELECT description FROM pg_description pd, pg_class pc 
			       WHERE pc.oid=pd.objoid AND pc.relname=v.viewname) AS relcomment
			FROM pg_views v
			{$where}
			ORDER BY relname";

		return $this->selectSet($sql);
	}
	
	/**
	 * Returns all details for a particular view
	 * @param $view The name of the view to retrieve
	 * @return View info
	 */
	function getView($view) {
		$this->clean($view);
		
		$sql = "SELECT viewname AS relname, viewowner AS relowner, definition AS vwdefinition,
			  (SELECT description FROM pg_description pd, pg_class pc 
			    WHERE pc.oid=pd.objoid AND pc.relname=v.viewname) AS relcomment
			FROM pg_views v
			WHERE viewname='{$view}'";
			
		return $this->selectSet($sql);
	}	

	/**
	 * Creates a new view.
	 * @param $viewname The name of the view to create
	 * @param $definition The definition for the new view
	 * @param $replace True to replace the view, false otherwise
	 * @return 0 success
	 */
	function createView($viewname, $definition, $replace, $comment) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$this->fieldClean($viewname);
		$this->clean($comment);

		// Note: $definition not cleaned
		
		$sql = "CREATE ";
		if ($replace) $sql .= "OR REPLACE ";		
		$sql .= "VIEW \"{$viewname}\" AS {$definition}";
		
		$status = $this->execute($sql);
		if ($status) {
			$this->rollbackTransaction();
			return -1;
		}

		if ($comment != '') {
			$status = $this->setComment('VIEW', $viewname, '', $comment);
			if ($status) {
				$this->rollbackTransaction();
			return -1;
			}
		}

		return $this->endTransaction();
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
	 * @return -4 comment error
	 */
	function setView($viewname, $definition, $comment) {
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		$status = $this->dropView($viewname, false);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		$status = $this->createView($viewname, $definition, false, $comment);
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
		global $conf;
		if (!$conf['show_system'])
			$where = "WHERE po.oid > '{$this->_lastSystemOID}'::oid";
		else $where  = '';
		
		$sql = "
			SELECT
            po.oid,
				po.oprname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprleft) AS oprleftname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprright) AS oprrightname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprresult) AS resultname,
				(SELECT description FROM pg_description pd WHERE po.oid=pd.objoid) AS oprcomment
			FROM
				pg_operator po
			{$where}				
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
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprleft) AS oprleftname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprright) AS oprrightname,
				(SELECT typname FROM pg_type pt WHERE pt.oid=po.oprresult) AS resultname,
				po.oprcanhash,
				(SELECT oprname FROM pg_operator po2 WHERE po2.oid=po.oprcom) AS oprcom,
				(SELECT oprname FROM pg_operator po2 WHERE po2.oid=po.oprnegate) AS oprnegate,
				(SELECT oprname FROM pg_operator po2 WHERE po2.oid=po.oprlsortop) AS oprlsortop,
				(SELECT oprname FROM pg_operator po2 WHERE po2.oid=po.oprltcmpop) AS oprltcmpop,
				(SELECT oprname FROM pg_operator po2 WHERE po2.oid=po.oprgtcmpop) AS oprgtcmpop,
				po.oprcode::regproc AS oprcode,
				--(SELECT proname FROM pg_proc pp WHERE pp.oid=po.oprcode) AS oprcode,
				(SELECT proname FROM pg_proc pp WHERE pp.oid=po.oprrest) AS oprrest,
				(SELECT proname FROM pg_proc pp WHERE pp.oid=po.oprjoin) AS oprjoin
			FROM
				pg_operator po
			WHERE
				po.oid='{$operator_oid}'
		";
	
		return $this->selectSet($sql);
	}

	/**
	 * Drops an operator
	 * @param $operator_oid The OID of the operator to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropOperator($operator_oid, $cascade) {
		// Function comes in with $object as operator OID
		$opr = $this->getOperator($operator_oid);
		$this->fieldClean($opr->f['oprname']);

		$sql = "DROP OPERATOR {$opr->f['oprname']} (";
		// Quoting or formatting here???
		if ($opr->f['oprleftname'] !== null) $sql .= $opr->f['oprleftname'] . ', ';
		else $sql .= "NONE, ";
		if ($opr->f['oprrightname'] !== null) $sql .= $opr->f['oprrightname'] . ')';
		else $sql .= "NONE)";
		
		if ($cascade) $sql .= " CASCADE";
		
		return $this->execute($sql);
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
	function getUsers() {
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil AS useexpires";
		if ($this->hasUserSessionDefaults()) $sql .= ", useconfig";
		$sql .= " FROM pg_user ORDER BY usename";
		
		return $this->selectSet($sql);
	}
	
	/**
	 * Returns information about a single user
	 * @param $username The username of the user to retrieve
	 * @return The user's data
	 */
	function getUser($username) {
		$this->clean($username);
		
		$sql = "SELECT usename, usesuper, usecreatedb, valuntil AS useexpires";
		if ($this->hasUserSessionDefaults()) $sql .= ", useconfig";
		$sql .= " FROM pg_user WHERE usename='{$username}'";
		
		return $this->selectSet($sql);
	}

	/**
	 * Determines whether or not a user is a super user
	 * @param $username The username of the user
	 * @return True if is a super user, false otherwise
	 */
	function isSuperUser($username) {
		$this->clean($username);

		if (function_exists('pg_parameter_status')) {
			$val = pg_parameter_status($this->conn->_connectionID, 'is_superuser');	
			if ($val !== false) return $val == 'on';
		}
		
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
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  '' means never expire
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
		else $sql .= " VALID UNTIL 'infinity'";
		
		return $this->execute($sql);
	}	
	
	/**
	 * Adjusts a user's info
	 * @param $username The username of the user to modify
	 * @param $password A new password for the user
	 * @param $createdb boolean Whether or not the user can create databases
	 * @param $createuser boolean Whether or not the user can create other users
	 * @param $expiry string Format 'YYYY-MM-DD HH:MM:SS'.  '' means never expire.
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
		else $sql .= " VALID UNTIL 'infinity'";
		
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
	function getGroups() {
		$sql = "SELECT groname FROM pg_group ORDER BY groname";
		
		return $this->selectSet($sql);
	}

	/**
	 * Returns users in a specific group
	 * @param $groname The name of the group
	 * @return All users in the group
	 */
	function getGroup($groname) {
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

	/**
	 * Adds a group member
	 * @param $groname The name of the group
	 * @param $user The name of the user to add to the group
	 * @return 0 success
	 */
	function addGroupMember($groname, $user) {
		$this->fieldClean($groname);
		$this->fieldClean($user);
		
		$sql = "ALTER GROUP \"{$groname}\" ADD USER \"{$user}\"";

		return $this->execute($sql);
	}
	
	/**
	 * Removes a group member
	 * @param $groname The name of the group
	 * @param $user The name of the user to remove from the group
	 * @return 0 success
	 */
	function dropGroupMember($groname, $user) {
		$this->fieldClean($groname);
		$this->fieldClean($user);
		
		$sql = "ALTER GROUP \"{$groname}\" DROP USER \"{$user}\"";

		return $this->execute($sql);
	}
	
	// Type functions

	/**
	 * Returns a list of all types in the database
	 * @param $all If true, will find all available functions, if false just those in search path
	 * @param $tabletypes If true, will include table types
	 * @param $domains Ignored
	 * @return A recordet
	 */
	function getTypes($all = false, $tabletypes = false, $domains = false) {
		global $conf;
		
		if ($all || $conf['show_system']) {
			$where = '';
		} else {
			$where = "AND pt.oid > '{$this->_lastSystemOID}'::oid";
		}
		// Never show system table types
		$where2 = "AND c.oid > '{$this->_lastSystemOID}'::oid";

		// Create type filter
		$tqry = "'c'";
		if ($tabletypes)
			$tqry .= ", 'r', 'v'";

		$sql = "SELECT
				pt.typname AS basename,
				pt.typname,
				pu.usename AS typowner,
				(SELECT description FROM pg_description pd WHERE pt.oid=pd.objoid) AS typcomment
			FROM
				pg_type pt,
				pg_user pu
			WHERE
				pt.typowner = pu.usesysid
				AND (pt.typrelid = 0 OR (SELECT c.relkind IN ({$tqry}) FROM pg_class c WHERE c.oid = pt.typrelid {$where2}))
				AND typname !~ '^_'
				{$where}
			ORDER BY typname
		";

		return $this->selectSet($sql);
	}

	/**
	 * Returns all details for a particular type
	 * @param $typname The name of the view to retrieve
	 * @return Type info
	 */
	function getType($typname) {
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
	function getTriggerDef($trigger) {
		// Constants to figure out tgtype

		if (!defined('TRIGGER_TYPE_ROW')) define ('TRIGGER_TYPE_ROW', (1 << 0));
		if (!defined('TRIGGER_TYPE_BEFORE')) define ('TRIGGER_TYPE_BEFORE', (1 << 1));
		if (!defined('TRIGGER_TYPE_INSERT')) define ('TRIGGER_TYPE_INSERT', (1 << 2));
		if (!defined('TRIGGER_TYPE_DELETE')) define ('TRIGGER_TYPE_DELETE', (1 << 3));
		if (!defined('TRIGGER_TYPE_UPDATE')) define ('TRIGGER_TYPE_UPDATE', (1 << 4));

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
		if (($trigger['tgtype'] & TRIGGER_TYPE_BEFORE) == TRIGGER_TYPE_BEFORE)
			$tgdef .= 'BEFORE';
		else
			$tgdef .= 'AFTER';

		if (($trigger['tgtype'] & TRIGGER_TYPE_INSERT) == TRIGGER_TYPE_INSERT) {
			$tgdef .= ' INSERT';
			$findx++;
		}
		if (($trigger['tgtype'] & TRIGGER_TYPE_DELETE) == TRIGGER_TYPE_DELETE) {
			if ($findx > 0)
				$tgdef .= ' OR DELETE';
			else {
				$tgdef .= ' DELETE';
				$findx++;
			}
		}
		if (($trigger['tgtype'] & TRIGGER_TYPE_UPDATE) == TRIGGER_TYPE_UPDATE) {
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
		// Escape null characters
		$v = addCSlashes($trigger['tgargs'], "\0");
		// Split on escaped null characters
		$params = explode('\\000', $v);		
		for ($findx = 0; $findx < $trigger['tgnargs']; $findx++) {
			$param = "'" . str_replace('\'', '\\\'', $params[$findx]) . "'";
			$tgdef .= $param;
			if ($findx < ($trigger['tgnargs'] - 1))
				$tgdef .= ', ';
		}
		
		// Finish it off
		$tgdef .= ')';

		return $tgdef;
	}

	/**
	 * Grabs a list of triggers on a table
	 * @param $table The name of a table whose triggers to retrieve
	 * @return A recordset
	 */
	function getTriggers($table = '') {
		$this->clean($table);

		// We include constraint triggers
		$sql = "SELECT t.tgname, t.tgisconstraint, t.tgdeferrable, t.tginitdeferred, t.tgtype, 
			t.tgargs, t.tgnargs, t.tgconstrrelid,
			(SELECT relname FROM pg_class c2 WHERE c2.oid=t.tgconstrrelid) AS tgconstrrelname,
			(SELECT proname FROM pg_proc p WHERE t.tgfoid=p.oid) AS tgfname, 
			c.relname, NULL AS tgdef
			FROM pg_trigger t, pg_class c
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
	function createTrigger($tgname, $table, $tgproc, $tgtime, $tgevent, $tgfrequency, $tgargs) {
		$this->fieldClean($tgname);
		$this->fieldClean($table);
		$this->fieldClean($tgproc);
		
		/* No Statement Level Triggers in PostgreSQL (by now) */
		$sql = "CREATE TRIGGER \"{$tgname}\" {$tgtime} 
				{$tgevent} ON \"{$table}\"
				FOR EACH {$tgfrequency} EXECUTE PROCEDURE \"{$tgproc}\"({$tgargs})";
				
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
	 * Internal function used for parsing ACLs
	 * @param $acl The ACL to parse (of type aclitem[])
	 * @return Privileges array
	 */
	function _parseACL($acl) {
		// Take off the first and last characters (the braces)
		$acl = substr($acl, 1, strlen($acl) - 2);

		// Pick out individual ACE's by carefully parsing.  This is necessary in order
		// to cope with usernames and stuff that contain commas
		$aces = array();
		$i = $j = 0;		
		$in_quotes = false;
		while ($i < strlen($acl)) {
			// If current char is a double quote and it's not escaped, then
			// enter quoted bit
			$char = substr($acl, $i, 1);
			if ($char == '"' && ($i == 0 || substr($acl, $i - 1, 1) != '\\')) 
				$in_quotes = !$in_quotes;
			elseif ($char == ',' && !$in_quotes) {
				// Add text so far to the array
				$aces[] = substr($acl, $j, $i - $j);
				$j = $i + 1;
			}
			$i++;
		}
		// Add final text to the array
		$aces[] = substr($acl, $j);

		// Create the array to be returned
		$temp = array();

		// For each ACE, generate an entry in $temp
		foreach ($aces as $v) {
			
			// If the ACE begins with a double quote, strip them off both ends
			// and unescape backslashes and double quotes
			$unquote = false;
			if (strpos($v, '"') === 0) {
				$v = substr($v, 1, strlen($v) - 2);
				$v = str_replace('\\"', '"', $v);
				$v = str_replace('\\\\', '\\', $v);
			}
			
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

			// Break on unquoted equals sign...
			$i = 0;		
			$in_quotes = false;
			$entity = null;
			$chars = null;	
			while ($i < strlen($v)) {
				// If current char is a double quote and it's not escaped, then
				// enter quoted bit
				$char = substr($v, $i, 1);
				$next_char = substr($v, $i + 1, 1);
				if ($char == '"' && ($i == 0 || $next_char != '"')) {
					$in_quotes = !$in_quotes;
				}
				// Skip over escaped double quotes
				elseif ($char == '"' && $next_char == '"') {
					$i++;
				}
				elseif ($char == '=' && !$in_quotes) {
					// Split on current equals sign					
					$entity = substr($v, 0, $i);
					$chars = substr($v, $i + 1);
					break;
				}
				$i++;
			}
			
			// Check for quoting on entity name, and unescape if necessary
			if (strpos($entity, '"') === 0) {
				$entity = substr($entity, 1, strlen($entity) - 2);
				$entity = str_replace('""', '"', $entity);
			}
			
			// New row to be added to $temp
			// (type, grantee, privileges, grantor, grant option?
			$row = array($atype, $entity, array(), '', array());

			// Loop over chars and add privs to $row
			for ($i = 0; $i < strlen($chars); $i++) {
				// Append to row's privs list the string representing
				// the privilege
				$char = substr($chars, $i, 1);
				if ($char == '*')
					$row[4][] = $this->privmap[substr($chars, $i - 1, 1)];
				elseif ($char == '/') {
					$grantor = substr($chars, $i + 1);
					// Check for quoting
					if (strpos($grantor, '"') === 0) {
						$grantor = substr($grantor, 1, strlen($grantor) - 2);
						$grantor = str_replace('""', '"', $grantor);
					}
					$row[3] = $grantor;
					break;
				}
				else {
					if (!isset($this->privmap[$char]))
						return -3;
					else
						$row[2][] = $this->privmap[$char];
				}
			}
			
			// Append row to temp
			$temp[] = $row;
		}

		return $temp;
	}
	
	/**
	 * Grabs an array of users and their privileges for an object,
	 * given its type.
	 * @param $object The name of the object whose privileges are to be retrieved
	 * @param $type The type of the object (eg. relation, view or sequence)
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
				$sql = "SELECT relacl AS acl FROM pg_class WHERE relname='{$object}'";
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
	
	/**
	 * Grants a privilege to a user, group or public
	 * @param $mode 'GRANT' or 'REVOKE';
	 * @param $type The type of object
	 * @param $object The name of the object
	 * @param $public True to grant to public, false otherwise
	 * @param $usernames The array of usernames to grant privs to.
	 * @param $groupnames The array of group names to grant privs to.	 
	 * @param $privileges The array of privileges to grant (eg. ('SELECT', 'ALL PRIVILEGES', etc.) )
	 * @param $grantoption True if has grant option, false otherwise
	 * @param $cascade True for cascade revoke, false otherwise
	 * @return 0 success
	 * @return -1 invalid type
	 * @return -2 invalid entity
	 * @return -3 invalid privileges
	 * @return -4 not granting to anything
	 * @return -4 invalid mode
	 */
	function setPrivileges($mode, $type, $object, $public, $usernames, $groupnames, $privileges, $grantoption, $cascade) {
		$this->fieldArrayClean($usernames);
		$this->fieldArrayClean($groupnames);

		// Input checking
		if (!is_array($privileges) || sizeof($privileges) == 0) return -3;
		if (!is_array($usernames) || !is_array($groupnames) || 
			(!$public && sizeof($usernames) == 0 && sizeof($groupnames) == 0)) return -4;
		if ($mode != 'GRANT' && $mode != 'REVOKE') return -5;

		$sql = $mode;

		// Grant option
		if ($this->hasGrantOption() && $mode == 'REVOKE' && $grantoption) {
			$sql .= ' GRANT OPTION FOR';
		}		

		if (in_array('ALL PRIVILEGES', $privileges))
			$sql .= " ALL PRIVILEGES ON";
		else
			$sql .= " " . join(', ', $privileges) . " ON";
		switch ($type) {
			case 'table':
			case 'view':
			case 'sequence':
				$this->fieldClean($object);
				$sql .= " \"{$object}\"";
				break;
			case 'database':
				$this->fieldClean($object);
				$sql .= " DATABASE \"{$object}\"";
				break;
			case 'function':
				// Function comes in with $object as function OID
				$fn = $this->getFunction($object);
				$this->fieldClean($fn->f['proname']);
				$sql .= " FUNCTION \"{$fn->f['proname']}\"({$fn->f['proarguments']})";
				break;
			case 'language':
				$this->fieldClean($object);
				$sql .= " LANGUAGE \"{$object}\"";
				break;
			case 'schema':
				$this->fieldClean($object);
				$sql .= " SCHEMA \"{$object}\"";
				break;
			case 'tablespace':
				$this->fieldClean($object);
				$sql .= " TABLESPACE \"{$object}\"";
				break;
			default:
				return -1;
		}
		
		// Dump PUBLIC
		$first = true;
		$sql .= ($mode == 'GRANT') ? ' TO ' : ' FROM ';
		if ($public) {
			$sql .= 'PUBLIC';
			$first = false;
		}
		// Dump users
		foreach ($usernames as $v) {
			if ($first) {
				$sql .= "\"{$v}\"";
				$first = false;
			}
			else {
				$sql .= ", \"{$v}\"";
			}
		}			
		// Dump groups
		foreach ($groupnames as $v) {
			if ($first) {
				$sql .= "GROUP \"{$v}\"";
				$first = false;
			}
			else {
				$sql .= ", GROUP \"{$v}\"";
			}
		}			

		// Grant option
		if ($this->hasGrantOption() && $mode == 'GRANT' && $grantoption) {
			$sql .= ' WITH GRANT OPTION';
		}
		
		// Cascade revoke
		if ($this->hasGrantOption() && $mode == 'REVOKE' && $cascade) {
			$sql .= ' CASCADE';
		}

		return $this->execute($sql);
	}
 
	// Administration functions

	/**
	 * Vacuums a database
	 * @param $table The table to vacuum
 	 * @param $analyze If true, also does analyze
	 * @param $full If true, selects "full" vacuum (PostgreSQL >= 7.2)
	 * @param $freeze If true, selects aggressive "freezing" of tuples (PostgreSQL >= 7.2)
	 */
	function vacuumDB($table = '', $analyze = false, $full = false, $freeze = false) {
		$sql = "VACUUM";
		if ($analyze) $sql .= " ANALYZE";
		if ($table != '') {
			$this->fieldClean($table);
			$sql .= " \"{$table}\"";
		}

		return $this->execute($sql);
	}

	/**
	 * Analyze a database
	 * @param $table (optional) The table to analyze
	 */
	function analyzeDB($table = '') {
		if ($table != '') {
			$this->fieldClean($table);
			$sql = "VACUUM ANALYZE \"{$table}\"";
		}
		else
			$sql = "VACUUM ANALYZE";

		return $this->execute($sql);
	}

	/**
	 * Rebuild indexes
	 * @param $type 'DATABASE' or 'TABLE' or 'INDEX'
	 * @param $name The name of the specific database, table, or index to be reindexed
	 * @param $force If true, recreates indexes forcedly in PostgreSQL 7.0-7.1, forces rebuild of system indexes in 7.2-7.3, ignored in >=7.4
	 */
	function reindex($type, $name, $force = false) {
		$this->fieldClean($name);
		switch($type) {
			case 'DATABASE':
			case 'TABLE':
			case 'INDEX':
				$sql = "REINDEX {$type} \"{$name}\"";
				if ($force) $sql .= ' FORCE';
				break;
			default:
				return -1;
		}

		return $this->execute($sql);
	}

	// Function functions

	/**
	 * Returns a list of all functions in the database
 	 * @param $all If true, will find all available functions, if false just userland ones
	 * @return All functions
	 */
	function getFunctions($all = false) {
		global $conf;
		
		if ($all || $conf['show_system'])
			$where = '';
		else
			$where = "AND pc.oid > '{$this->_lastSystemOID}'::oid";

		$sql = 	"SELECT
				pc.oid AS prooid,
				proname,
				proretset,
				pt.typname AS proresult,
				pl.lanname AS prolanguage,
				oidvectortypes(pc.proargtypes) AS proarguments,
				(SELECT description FROM pg_description pd WHERE pc.oid=pd.objoid) AS procomment,
				proname || ' (' || oidvectortypes(pc.proargtypes) || ')' AS proproto,
				CASE WHEN proretset THEN 'setof '::text ELSE '' END || pt.typname AS proreturns,
				usename as proowner
			FROM
				pg_proc pc, pg_user pu, pg_type pt, pg_language pl
			WHERE
				pc.proowner = pu.usesysid
				AND pc.prorettype = pt.oid
				AND pc.prolang = pl.oid
				{$where}
			UNION
			SELECT 
				pc.oid AS prooid,
				proname,
				proretset,
				'opaque' AS proresult,
				pl.lanname AS prolanguage,
				oidvectortypes(pc.proargtypes) AS proarguments,
				(SELECT description FROM pg_description pd WHERE pc.oid=pd.objoid) AS procomment,
				proname || ' (' || oidvectortypes(pc.proargtypes) || ')' AS proproto,
				CASE WHEN proretset THEN 'setof '::text ELSE '' END || 'opaque' AS proreturns,
				usename as proowner
			FROM
				pg_proc pc, pg_user pu, pg_type pt, pg_language pl
			WHERE	
				pc.proowner = pu.usesysid
				AND pc.prorettype = 0
				AND pc.prolang = pl.oid
				{$where}
			ORDER BY
				proname, proresult
			";

		return $this->selectSet($sql);
	}
	
	/**
	 * Returns a list of all functions that can be used in triggers
	 */
	function getTriggerFunctions() {
		return $this->getFunctions(true);
	}

	/**
	 * Returns all details for a particular function
	 * @param $function_oid The OID of the function to retrieve
	 * @return Function info
	 */
	function getFunction($function_oid) {
		$this->clean($function_oid);
		
		$sql = "SELECT 
					pc.oid AS prooid,
					proname,
					lanname AS prolanguage,
					pt.typname AS proresult,
					prosrc,
					probin,
					proretset,
					proiscachable,
					oidvectortypes(pc.proargtypes) AS proarguments,
					(SELECT description FROM pg_description pd WHERE pc.oid=pd.objoid) AS procomment
				FROM
					pg_proc pc, pg_language pl, pg_type pt
				WHERE 
					pc.oid = '$function_oid'::oid
					AND pc.prolang = pl.oid
					AND pc.prorettype = pt.oid
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

		// Cachable
		$f['proiscachable'] = $this->phpBool($f['proiscachable']);
		if ($f['proiscachable'])
			$temp[] = 'ISCACHABLE';
		else
			$temp[] = '';
					
		return $temp;
	}
	
	/**
	 * Updates a function.  Postgres 7.1 doesn't have CREATE OR REPLACE function,
	 * so we do it with a drop and a recreate.
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
	function setFunction($function_oid, $funcname, $newname, $args, $returns, $definition, $language, $flags, $setof, $comment) {		
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		// Drop existing function
		$status = $this->dropFunction($function_oid, false);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -2;
		}
		
		// Create function with new name
		$status = $this->createFunction($newname, $args, $returns, $definition, $language, $flags, $setof, false);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -3;
		}
		
		// Comment on the function
		$this->fieldClean($newname);
		$this->clean($comment);
		$status = $this->setComment('FUNCTION', "\"{$newname}\"({$args})", null, $comment);
		if ($status != 0) {
			$this->rollbackTransaction();
			return -4;
		}

		$status = $this->endTransaction();
		return ($status == 0) ? 0 : -1;
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
		
		$sql .= " LANGUAGE '{$language}'";
		
		// Add flags
		$first = true;
		foreach ($flags as  $v) {
			// Skip default flags
			if ($v == '') continue;
			elseif ($first) {
				$sql .= " WITH ({$v}";
				$first = false;
			}
			else {
				$sql .= ", {$v}";
			}
		}
		// Close off WITH clause if necessary
		if (!$first) $sql .= ")";

		return $this->execute($sql);
	}
		
	/**
	 * Drops a function.
	 * @param $function_oid The OID of the function to drop
	 * @param $cascade True to cascade drop, false to restrict
	 * @return 0 success
	 */
	function dropFunction($function_oid, $cascade) {
		// Function comes in with $object as function OID
		$fn = $this->getFunction($function_oid);
		$this->fieldClean($fn->f['proname']);
		
		$sql = "DROP FUNCTION \"{$fn->f['proname']}\"({$fn->f['proarguments']})";
		if ($cascade) $sql .= " CASCADE";
		
		return $this->execute($sql);
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
				lanplcallfoid::regproc AS lanplcallf
			FROM
				pg_language
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
		global $conf;
		
		if ($conf['show_system'])
			$where = '';
		else
			$where = "WHERE a.oid > '{$this->_lastSystemOID}'::oid";

		$sql = "
			SELECT
				a.aggname AS proname,
				CASE a.aggbasetype
					WHEN 0 THEN NULL
					ELSE (SELECT typname FROM pg_type t WHERE t.oid=a.aggbasetype)
				END AS proargtypes,
				(SELECT description FROM pg_description pd WHERE a.oid=pd.objoid) AS aggcomment
			FROM 
				pg_aggregate a
			{$where}
			ORDER BY
				1, 2;
		";

		return $this->selectSet($sql);
	}

	// Operator Class functions
	
	/**
	 * Gets all opclasses
	 * @return A recordset
	 */
	function getOpClasses() {
		global $conf;
		
		if ($conf['show_system'])
			$where = '';
		else
			$where = "AND po.oid > '{$this->_lastSystemOID}'::oid";

		$sql = "
			SELECT DISTINCT
				pa.amname, 
				po.opcname, 
				(SELECT typname FROM pg_type t WHERE t.oid=opcdeftype) AS opcintype,
				TRUE AS opcdefault,
				NULL::text AS opccomment
			FROM
				pg_opclass po, pg_am pa, pg_amop pam
			WHERE
				pam.amopid=pa.oid
				AND pam.amopclaid=po.oid
				{$where}
			ORDER BY 1,2
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
	
	// Misc functions

	/**
	 * Sets the comment for an object in the database
	 * @pre All parameters must already be cleaned
	 * @param $obj_type One of 'TABLE' | 'COLUMN' | 'VIEW' | 'SCHEMA' | 'SEQUENCE' | 'TYPE' | 'FUNCTION'
	 * @param $obj_name The name of the object for which to attach a comment.
	 * @param $table Name of table that $obj_name belongs to.  Ignored unless $obj_type is 'TABLE' or 'COLUMN'.
	 * @param $comment The comment to add.
	 * @return 0 success
	 */
	function setComment($obj_type, $obj_name, $table, $comment) {
		$sql = "COMMENT ON {$obj_type} " ;

		switch ($obj_type) {
			case 'TABLE':
				$sql .= "\"{$table}\" IS ";
				break;
			case 'COLUMN':
				$sql .= "\"{$table}\".\"{$obj_name}\" IS ";
				break;
			case 'VIEW':
			case 'SCHEMA':
			case 'SEQUENCE':
			case 'TYPE':
				$sql .= "\"{$obj_name}\" IS ";
				break;
			case 'FUNCTION':				
				$sql .= "{$obj_name} IS ";
				break;
			default:
				// Unknown object type
				return -1;
		}

		if ($comment != '')
			$sql .= "'{$comment}';";
		else
			$sql .= 'NULL;';

		return $this->execute($sql);

	}

	/**
	 * Returns the SQL for changing the current user
	 * @param $user The user to change to
	 * @return The SQL
	 */
	function getChangeUserSQL($user) {
		$this->fieldClean($user);
		return "\\connect - \"{$user}\"";
	}

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

	/**
	 * Ends the data object for a dump.
	 * @return 0 success
	 */
	function endDump() {
		return $this->endTransaction();
	}

	/**
	 * Generates the SQL for the 'select' function
	 * @param $table The table from which to select
	 * @param $show An array of columns to show.  Empty array means all columns.
	 * @param $values An array mapping columns to values
	 * @param $ops An array of the operators to use
	 * @param $orderby (optional) An array of column numbers or names (one based) 
	 *        mapped to sort direction (asc or desc or '' or null) to order by
	 * @return The SQL query
	 */
	function getSelectSQL($table, $show, $values, $ops, $orderby = array()) {
		$this->fieldClean($table);
		$this->fieldArrayClean($show);

		// If an empty array is passed in, then show all columns
		if (sizeof($show) == 0) {
			if ($this->hasObjectID($table))
				$sql = "SELECT \"{$this->id}\", * FROM ";
			else
				$sql = "SELECT * FROM ";
		}
		else {
			// Add oid column automatically to results for editing purposes
			if (!in_array($this->id, $show) && $this->hasObjectID($table))
				$sql = "SELECT \"{$this->id}\", \"";
			else
				$sql = "SELECT \"";
			
			$sql .= join('","', $show) . "\" FROM ";
		}
			
		if ($this->hasSchemas() && isset($_REQUEST['schema'])) {
			$this->fieldClean($_REQUEST['schema']);
			$sql .= "\"{$_REQUEST['schema']}\".";
		}
		$sql .= "\"{$table}\"";

		// If we have values specified, add them to the WHERE clause
		$first = true;
		if (is_array($values) && sizeof($values) > 0) {
			foreach ($values as $k => $v) {
				if ($v != '' || $this->selectOps[$ops[$k]] == 'p') {
					$this->fieldClean($k);
					$this->clean($v);
					if ($first) {
						$sql .= " WHERE ";
						$first = false;
					} else {
						$sql .= " AND ";
					}
					// Different query format depending on operator type
					switch ($this->selectOps[$ops[$k]]) {
						case 'i':
							$sql .= "\"{$k}\" {$ops[$k]} '{$v}'";
							break;
						case 'p':
							$sql .= "\"{$k}\" {$ops[$k]}";
							break;
						case 'x':
							$sql .= "\"{$k}\" {$ops[$k]} ({$v})";
							break;
						default:
							// Shouldn't happen
					}
				}
			}
		}

		// ORDER BY
		if (is_array($orderby) && sizeof($orderby) > 0) {
			$sql .= " ORDER BY ";
			$first = true;
			foreach ($orderby as $k => $v) {
				if ($first) $first = false;
				else $sql .= ', ';
				if (ereg('^[0-9]+$', $k)) {
					$sql .= $k;
				}
				else {
					$this->fieldClean($k);
					$sql .= '"' . $k . '"';
				}
				if (strtoupper($v) == 'DESC') $sql .= " DESC";
			}
		}
		
		return $sql;
	}

	/**
	 * Finds the number of rows that would be returned by a
	 * query.
	 * @param $query The SQL query
	 * @param $count The count query
	 * @return The count of rows
	 * @return -1 error
	 */
	function browseQueryCount($query, $count) {
		// Count the number of rows
		$rs = $this->selectSet($query);
		if (!is_object($rs)) {
			return -1;
		}
		
		return $rs->recordCount();	
	}
	
	/**
	 * Returns a recordset of all columns in a query.  Supports paging.
	 * @param $type Either 'QUERY' if it is an SQL query, or 'TABLE' if it is a table identifier,
	 *              or 'SELECT" if it's a select query
	 * @param $table The base table of the query.  NULL for no table.
	 * @param $query The query that is being executed.  NULL for no query.
	 * @param $sortkey The column number to sort by, or '' or null for no sorting
	 * @param $sortdir The direction in which to sort the specified column ('asc' or 'desc')
	 * @param $page The page of the relation to retrieve
	 * @param $page_size The number of rows per page
	 * @param &$max_pages (return-by-ref) The max number of pages in the relation
	 * @return A recordset on success
	 * @return -1 transaction error
	 * @return -2 counting error
	 * @return -3 page or page_size invalid
	 * @return -4 unknown type
	 * @return -5 failed setting transaction read only
	 */
	function browseQuery($type, $table, $query, $sortkey, $sortdir, $page, $page_size, &$max_pages) {
		// Check that we're not going to divide by zero
		if (!is_numeric($page_size) || $page_size != (int)$page_size || $page_size <= 0) return -3;

		// If $type is TABLE, then generate the query
		switch ($type) {
			case 'TABLE':
				if (ereg('^[0-9]+$', $sortkey) && $sortkey > 0) $orderby = array($sortkey => $sortdir);
				else $orderby = array();
				$query = $this->getSelectSQL($table, array(), array(), array(), $orderby);
				break;
			case 'QUERY':
			case 'SELECT':
				// Trim query
				$query = trim($query);
				// Trim off trailing semi-colon if there is one
				if (substr($query, strlen($query) - 1, 1) == ';')
					$query = substr($query, 0, strlen($query) - 1);
				break;
			default:
				return -4;
		}

		// Generate count query
		$count = "SELECT COUNT(*) AS total FROM ($query) AS sub";

		// Open a transaction
		$status = $this->beginTransaction();
		if ($status != 0) return -1;
		
		// If backend supports read only queries, then specify read only mode
		// to avoid side effects from repeating queries that do writes.
		if ($this->hasReadOnlyQueries()) {
			$status = $this->execute("SET TRANSACTION READ ONLY");
			if ($status != 0) {
				$this->rollbackTransaction();
				return -5;
			}
		}

		
		// Count the number of rows
		$total = $this->browseQueryCount($query, $count);
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

		// Set fetch mode to NUM so that duplicate field names are properly returned
		// for non-table queries.  Since the SELECT feature only allows selecting one
		// table, duplicate fields shouldn't appear.
		if ($type == 'QUERY') $this->conn->setFetchMode(ADODB_FETCH_NUM);

		// Figure out ORDER BY.  Sort key is always the column number (based from one)
		// of the column to order by.  Only need to do this for non-TABLE queries
		if ($type != 'TABLE' && ereg('^[0-9]+$', $sortkey) && $sortkey > 0) {
			$orderby = " ORDER BY {$sortkey}";
			// Add sort order
			if ($sortdir == 'desc')
				$orderby .= ' DESC';
			else
				$orderby .= ' ASC';
		}	
		else $orderby = '';

		// Actually retrieve the rows, with offset and limit
		if ($this->hasFullSubqueries())
			$rs = $this->selectSet("SELECT * FROM ({$query}) AS sub {$orderby} LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);
		else
			$rs = $this->selectSet("{$query} LIMIT {$page_size} OFFSET " . ($page - 1) * $page_size);
		$status = $this->endTransaction();
		if ($status != 0) {
			$this->rollbackTransaction();
			return -1;
		}
		
		return $rs;
	}
		
	/**
	 * Returns a recordset of all columns in a relation.  Used for data export.
	 * @@ Note: Really needs to use a cursor
	 * @param $relation The name of a relation
	 * @return A recordset on success
	 * @return -1 Failed to set datestyle
	 */
	function dumpRelation($relation, $oids) {
		$this->fieldClean($relation);
		
		// Actually retrieve the rows
		if ($oids) $oid_str = $this->id . ', ';
		else $oid_str = '';

		return $this->selectSet("SELECT {$oid_str}* FROM \"{$relation}\"");
	}

	/**
	 * Searches all system catalogs to find objects that match a certain name.
	 * @param $term The search term
	 * @param $filter The object type to restrict to ('' means no restriction)
	 * @return A recordset
	 */
	function findObject($term, $filter) {
		global $conf;

		// Escape search term for ~* match
		$special = array('.', '*', '^', '$', ':', '?', '+', ',', '=', '!', '[', ']', '(', ')', '{', '}', '<', '>', '-', '\\');
		foreach ($special as $v) {
			$term = str_replace($v, "\\{$v}", $term);
		}
		$this->clean($term);
		$this->clean($filter);

		// Build SQL, excluding system relations as necessary
		// Relations
		$case_clause = "CASE WHEN relkind='r' THEN (CASE WHEN EXISTS (SELECT 1 FROM pg_rewrite r WHERE r.ev_class = pc.oid AND r.ev_type = '1') THEN 'VIEW'::VARCHAR ELSE 'TABLE'::VARCHAR END) WHEN relkind='v' THEN 'VIEW'::VARCHAR WHEN relkind='S' THEN 'SEQUENCE'::VARCHAR END";
		$sql = "
			SELECT {$case_clause} AS type, 
				pc.oid, NULL::VARCHAR AS schemaname, NULL::VARCHAR AS relname, pc.relname AS name FROM pg_class pc
				WHERE relkind IN ('r', 'v', 'S') AND relname ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND pc.relname NOT LIKE 'pg\\\\_%'";			
		if ($filter == 'TABLE' || $filter == 'VIEW' || $filter == 'SEQUENCE') $sql .= " AND {$case_clause} = '{$filter}'";
		elseif ($filter != '') $sql .= " AND FALSE";

		// Columns
		$sql .= "				
			UNION ALL
			SELECT CASE WHEN relkind='r' THEN (CASE WHEN EXISTS (SELECT 1 FROM pg_rewrite r WHERE r.ev_class = pc.oid AND r.ev_type = '1') THEN 'COLUMNVIEW'::VARCHAR ELSE 'COLUMNTABLE'::VARCHAR END) WHEN relkind='v' THEN 'COLUMNVIEW'::VARCHAR END,
				NULL, NULL, pc.relname, pa.attname FROM pg_class pc,
				pg_attribute pa WHERE pc.oid=pa.attrelid 
				AND pa.attname ~* '.*{$term}.*' AND pa.attnum > 0 AND pc.relkind IN ('r', 'v')";
		if (!$conf['show_system']) $sql .= " AND pc.relname NOT LIKE 'pg\\\\_%'";
		if ($filter != '' && $filter != 'COLUMNTABLE' || $filter != 'COLUMNVIEW') $sql .= " AND FALSE";

		// Functions
		$sql .= "
			UNION ALL
			SELECT 'FUNCTION', pp.oid, NULL, NULL, pp.proname || '(' || oidvectortypes(pp.proargtypes) || ')' FROM pg_proc pp
				WHERE proname ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND pp.oid > '{$this->_lastSystemOID}'::oid";
		if ($filter != '' && $filter != 'FUNCTION') $sql .= " AND FALSE";
			
		// Indexes
		$sql .= "
			UNION ALL
			SELECT 'INDEX', NULL, NULL, pc.relname, pc2.relname FROM pg_class pc,
				pg_index pi, pg_class pc2 WHERE pc.oid=pi.indrelid 
				AND pi.indexrelid=pc2.oid
				AND pc2.relname ~* '.*{$term}.*' AND NOT pi.indisprimary AND NOT pi.indisunique";
		if (!$conf['show_system']) $sql .= " AND pc2.relname NOT LIKE 'pg\\\\_%'";
		if ($filter != '' && $filter != 'INDEX') $sql .= " AND FALSE";

		// Check Constraints
		$sql .= "
			UNION ALL
			SELECT 'CONSTRAINTTABLE', NULL, NULL, pc.relname, pr.rcname FROM pg_class pc,
				pg_relcheck pr WHERE pc.oid=pr.rcrelid
				AND pr.rcname ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND pc.relname NOT LIKE 'pg\\\\_%'";				
		if ($filter != '' && $filter != 'CONSTRAINT') $sql .= " AND FALSE";
		
		// Unique and Primary Key Constraints
		$sql .= "
			UNION ALL
			SELECT 'CONSTRAINTTABLE', NULL, NULL, pc.relname, pc2.relname FROM pg_class pc,
				pg_index pi, pg_class pc2 WHERE pc.oid=pi.indrelid 
				AND pi.indexrelid=pc2.oid
				AND pc2.relname ~* '.*{$term}.*' AND (pi.indisprimary OR pi.indisunique)";
		if (!$conf['show_system']) $sql .= " AND pc2.relname NOT LIKE 'pg\\\\_%'";	
		if ($filter != '' && $filter != 'CONSTRAINT') $sql .= " AND FALSE";			

		// Triggers
		$sql .= "
			UNION ALL
			SELECT 'TRIGGER', NULL, NULL, pc.relname, pt.tgname FROM pg_class pc,
				pg_trigger pt WHERE pc.oid=pt.tgrelid
				AND pt.tgname ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND pc.relname NOT LIKE 'pg\\\\_%'";				
		if ($filter != '' && $filter != 'TRIGGER') $sql .= " AND FALSE";

		// Table Rules
		$sql .= "
			UNION ALL
			SELECT 'RULETABLE', NULL, NULL, c.relname AS tablename, r.rulename
				FROM pg_rewrite r, pg_class c
				WHERE c.relkind='r' AND NOT EXISTS (SELECT 1 FROM pg_rewrite r WHERE r.ev_class = c.oid AND r.ev_type = '1') 
				AND r.rulename !~ '^_RET' AND c.oid = r.ev_class AND r.rulename ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND c.relname NOT LIKE 'pg\\\\_%'";				
		if ($filter != '' && $filter != 'RULE') $sql .= " AND FALSE";

		// View Rules
		$sql .= "
			UNION ALL
			SELECT 'RULEVIEW', NULL, NULL, c.relname AS tablename, r.rulename
				FROM pg_rewrite r, pg_class c
				WHERE c.relkind='r' AND EXISTS (SELECT 1 FROM pg_rewrite r WHERE r.ev_class = c.oid AND r.ev_type = '1')
				AND r.rulename !~ '^_RET' AND c.oid = r.ev_class AND r.rulename ~* '.*{$term}.*'";
		if (!$conf['show_system']) $sql .= " AND c.relname NOT LIKE 'pg\\\\_%'";				
		if ($filter != '' && $filter != 'RULE') $sql .= " AND FALSE";

		// Advanced Objects
		if ($conf['show_advanced']) {
			// Types
			$sql .= "
				UNION ALL
				SELECT 'TYPE', pt.oid, NULL, NULL, pt.typname FROM pg_type pt
					WHERE typname ~* '.*{$term}.*' AND (pt.typrelid = 0 OR (SELECT c.relkind = 'c' FROM pg_class c WHERE c.oid = pt.typrelid))";
			if (!$conf['show_system']) $sql .= " AND pt.oid > '{$this->_lastSystemOID}'::oid";
			if ($filter != '' && $filter != 'TYPE') $sql .= " AND FALSE";

			// Operators
			$sql .= "				
				UNION ALL
				SELECT 'OPERATOR', po.oid, NULL, NULL, po.oprname FROM pg_operator po
					WHERE oprname ~* '.*{$term}.*'";
			if (!$conf['show_system']) $sql .= " AND po.oid > '{$this->_lastSystemOID}'::oid";
			if ($filter != '' && $filter != 'OPERATOR') $sql .= " AND FALSE";

			// Languages
			$sql .= "				
				UNION ALL
				SELECT 'LANGUAGE', pl.oid, NULL, NULL, pl.lanname FROM pg_language pl
					WHERE lanname ~* '.*{$term}.*'";
			if (!$conf['show_system']) $sql .= " AND pl.lanispl";
			if ($filter != '' && $filter != 'LANGUAGE') $sql .= " AND FALSE";

			// Aggregates
			$sql .= "				
				UNION ALL
				SELECT DISTINCT ON (a.aggname) 'AGGREGATE', a.oid, NULL, NULL, a.aggname FROM pg_aggregate a 
					WHERE aggname ~* '.*{$term}.*'";
			if (!$conf['show_system']) $sql .= " AND a.oid > '{$this->_lastSystemOID}'::oid";
			if ($filter != '' && $filter != 'AGGREGATE') $sql .= " AND FALSE";

			// Op Classes
			$sql .= "				
				UNION ALL
				SELECT DISTINCT ON (po.opcname) 'OPCLASS', po.oid, NULL, NULL, po.opcname FROM pg_opclass po
					WHERE po.opcname ~* '.*{$term}.*'";
			if (!$conf['show_system']) $sql .= " AND po.oid > '{$this->_lastSystemOID}'::oid";
			if ($filter != '' && $filter != 'OPCLASS') $sql .= " AND FALSE";
		}
				
		$sql .= " ORDER BY type, schemaname, relname, name";
			
		return $this->selectSet($sql);
	}

	/**    
	 * Private helper method to detect a valid $foo$ quote delimiter at
	 * the start of the parameter dquote
	 * @return True if valid, false otherwise
	 */    
	function valid_dolquote($dquote) {
		// XXX: support multibyte
		return (ereg('^[$][$]', $dquote) || ereg('^[$][_[:alpha:]][_[:alnum:]]*[$]', $dquote));
	}
	
	/**
	 * A private helper method for executeScript that advances the
	 * character by 1.  In psql this is careful to take into account
	 * multibyte languages, but we don't at the moment, so this function
	 * is someone redundant, since it will always advance by 1
	 * @param &$i The current character position in the line
	 * @param &$prevlen Length of previous character (ie. 1)
	 * @param &$thislen Length of current character (ie. 1)     
	 */
	function advance_1(&$i, &$prevlen, &$thislen) {
		$prevlen = $thislen;
		$i += $thislen;
		$thislen = 1;
	}

	/** 
	 * Executes an SQL script as a series of SQL statements.  Returns
	 * the result of the final step.  This is a very complicated lexer
	 * based on the REL7_4_STABLE src/bin/psql/mainloop.c lexer in
	 * the PostgreSQL source code.
	 * XXX: It does not handle multibyte languages properly.
	 * @param $name Entry in $_FILES to use
	 * @param $callback (optional) Callback function to call with each query,
	                               its result and line number.
	 * @return True for general success, false on any failure.
	 */
	function executeScript($name, $callback = null) {
		global $data;

		// This whole function isn't very encapsulated, but hey...
		$conn = $data->conn->_connectionID;
		if (!is_uploaded_file($_FILES[$name]['tmp_name'])) return false;

		$fd = fopen($_FILES[$name]['tmp_name'], 'r');
		if (!$fd) return false;
		
		// Build up each SQL statement, they can be multiline
		$query_buf = null;
		$query_start = 0;
		$in_quote = 0;
		$in_xcomment = 0;
		$bslash_count = 0;
		$dol_quote = null;
		$paren_level = 0;
		$len = 0;
		$i = 0;
		$prevlen = 0;
		$thislen = 0;
		$lineno = 0;
		
		// Loop over each line in the file
		while (!feof($fd)) {
			$line = fgets($fd, 32768);
			$lineno++;
			
			// Nothing left on line? Then ignore...
			if (trim($line) == '') continue;
		
		    $len = strlen($line);
		    $query_start = 0;

    		/*
    		 * Parse line, looking for command separators.
    		 *
    		 * The current character is at line[i], the prior character at line[i
    		 * - prevlen], the next character at line[i + thislen].
    		 */
    		$prevlen = 0;
    		$thislen = ($len > 0) ? 1 : 0;
    
    		for ($i = 0; $i < $len; $this->advance_1($i, $prevlen, $thislen)) {
    			
    			/* was the previous character a backslash? */
    			if ($i > 0 && substr($line, $i - $prevlen, 1) == '\\')
    				$bslash_count++;
    			else
    				$bslash_count = 0;
    
    			/*
    			 * It is important to place the in_* test routines before the
    			 * in_* detection routines. i.e. we have to test if we are in
    			 * a quote before testing for comments.
    			 */
    
    			/* in quote? */
    			if ($in_quote != 0)
    			{
    				/*
    				 * end of quote if matching non-backslashed character.
    				 * backslashes don't count for double quotes, though.
    				 */
    				if (substr($line, $i, 1) == $in_quote &&
    					($bslash_count % 2 == 0 || $in_quote == '"'))
    					$in_quote = 0;
    			}
				
				/* in or end of $foo$ type quote? */				
				else if ($dol_quote) {
					if (strncmp(substr($line, $i), $dol_quote, strlen($dol_quote)) == 0) {
						$this->advance_1($i, $prevlen, $thislen);
						while(substr($line, $i, 1) != '$')
							$this->advance_1($i, $prevlen, $thislen);
						$dol_quote = null;
					}
				}
    
    			/* start of extended comment? */
    			else if (substr($line, $i, 2) == '/*')
    			{
    				$in_xcomment++;
    				if ($in_xcomment == 1)
    					$this->advance_1($i, $prevlen, $thislen);
    			}
    
    			/* in or end of extended comment? */
    			else if ($in_xcomment)
    			{
    				if (substr($line, $i, 2) == '*/' && !--$in_xcomment)
    					$this->advance_1($i, $prevlen, $thislen);
    			}
    
    			/* start of quote? */
    			else if (substr($line, $i, 1) == '\'' || substr($line, $i, 1) == '"') {
    				$in_quote = substr($line, $i, 1);
    		    }

				/* 
				 * start of $foo$ type quote? 
				 */
				else if (!$dol_quote && $this->valid_dolquote(substr($line, $i))) {
					$dol_end = strpos(substr($line, $i + 1), '$');
					$dol_quote = substr($line, $i, $dol_end + 1);
					$this->advance_1($i, $prevlen, $thislen);
					while (substr($line, $i, 1) != '$') {
						$this->advance_1($i, $prevlen, $thislen);
					}
					
				}
    
    			/* single-line comment? truncate line */
    			else if (substr($line, $i, 2) == '--')
    			{
    			    $line = substr($line, 0, $i); /* remove comment */
    				break;
    			}			
    
    			/* count nested parentheses */
    			else if (substr($line, $i, 1) == '(') {
    				$paren_level++;
    			}
    
    			else if (substr($line, $i, 1) == ')' && $paren_level > 0) {
    				$paren_level--;
    			}
    
    			/* semicolon? then send query */
    			else if (substr($line, $i, 1) == ';' && !$bslash_count && !$paren_level)
    			{
    			    $subline = substr(substr($line, 0, $i), $query_start);
    				/* is there anything else on the line? */
    				if (strspn($subline, " \t\n\r") != strlen($subline))
    				{
    					/*
    					 * insert a cosmetic newline, if this is not the first
    					 * line in the buffer
    					 */
    					if (strlen($query_buf) > 0)
    					    $query_buf .= "\n";
    					/* append the line to the query buffer */
    					$query_buf .= $subline;
    					$query_buf .= ';';

            			// Execute the query (supporting 4.1.x PHP...). PHP cannot execute
            			// empty queries, unlike libpq
            			if (function_exists('pg_query'))
            				$res = @pg_query($conn, $query_buf);
            			else
            				$res = @pg_exec($conn, $query_buf);      
						// Call the callback function for display
						if ($callback !== null) $callback($query_buf, $res, $lineno);
            			// Check for COPY request
            			if (pg_result_status($res) == 4) { // 4 == PGSQL_COPY_FROM
            				while (!feof($fd)) {
            					$copy = fgets($fd, 32768);
            					$lineno++;
            					pg_put_line($conn, $copy);
            					if ($copy == "\\.\n" || $copy == "\\.\r\n") {
            						pg_end_copy($conn);
            						break;
            					}
            				}
            			}    				
    				}
        
					$query_buf = null;
					$query_start = $i + $thislen;
    			}
    			
    			/*
				 * keyword or identifier? 
				 * We grab the whole string so that we don't
				 * mistakenly see $foo$ inside an identifier as the start
				 * of a dollar quote.
				 */	
				// XXX: multibyte here
				else if (ereg('^[_[:alpha:]]$', substr($line, $i, 1))) {
					$sub = substr($line, $i, $thislen);
					while (ereg('^[\$_A-Za-z0-9]$', $sub)) {
						/* keep going while we still have identifier chars */
						$this->advance_1($i, $prevlen, $thislen);
						$sub = substr($line, $i, $thislen);
					}
					// Since we're now over the next character to be examined, it is necessary
					// to move back one space.
					$i-=$prevlen;
				}
    	    } // end for

    		/* Put the rest of the line in the query buffer. */
    		$subline = substr($line, $query_start);    		
    		if ($in_quote || $dol_quote || strspn($subline, " \t\n\r") != strlen($subline))
    		{
    			if (strlen($query_buf) > 0)
    			    $query_buf .= "\n";
    			$query_buf .= $subline;
    		}
    
    		$line = null;
    		
    	} // end while

    	/*
    	 * Process query at the end of file without a semicolon, so long as
    	 * it's non-empty.
    	 */
    	if (strlen($query_buf) > 0 && strspn($query_buf, " \t\n\r") != strlen($query_buf))
    	{
			// Execute the query (supporting 4.1.x PHP...)
			if (function_exists('pg_query'))
				$res = @pg_query($conn, $query_buf);
			else
				$res = @pg_exec($conn, $query_buf);
			// Call the callback function for display
			if ($callback !== null) $callback($query_buf, $res, $lineno);
			// Check for COPY request
			if (pg_result_status($res) == 4) { // 4 == PGSQL_COPY_FROM
				while (!feof($fd)) {
					$copy = fgets($fd, 32768);
					$lineno++;
					pg_put_line($conn, $copy);
					if ($copy == "\\.\n" || $copy == "\\.\r\n") {
						pg_end_copy($conn);
						break;
					}
				}
			}    				
    	}
		
		fclose($fd);
		
		return true;
	}

	// Capabilities
	function hasAlterDatabaseOwner() { return false; }
	function hasAlterDatabaseRename() { return false; }
	function hasAlterDatabase() { return $this->hasAlterDatabaseRename(); }
	function hasSchemas() { return false; }
	function hasConversions() { return false; }	
	function hasGrantOption() { return false; }
	function hasIsClustered() { return false; }
	function hasDropBehavior() { return false; }
	function hasDropColumn() { return false; }
	function hasDomains() { return false; }
	function hasDomainConstraints() { return false; }
	function hasAlterTrigger() { return false; }
	function hasWithoutOIDs() { return false; }
	function hasAlterTableOwner() { return false; }
	function hasPartialIndexes() { return false; }
	function hasCasts() { return false; }
	function hasFullSubqueries() { return false; }
	function hasPrepare() { return false; }
	function hasProcesses() { return false; }
	function hasVariables() { return false; }
	function hasFullExplain() { return false; }
	function hasStatsCollector() { return false; }
	function hasAlterColumnType() { return false; }
	function hasUserSessionDefaults() { return false; }
	function hasUserRename() { return false; }
	function hasRecluster() { return false; }
	function hasFullVacuum() { return false; }
	function hasForeignKeysInfo() { return false; }
	function hasViewColumnRename() { return false; }
	function hasTablespaces() { return false; }
	function hasSignals() { return false; }
	function hasNamedParams() { return false; }
	function hasUserAndDbVariables() { return false; }
	function hasCompositeTypes() { return false; }
	function hasReadOnlyQueries() { return false; }
	function hasFuncPrivs() { return false; }

}

?>
