<?php

/**
 * PostgreSQL 8.3 support
 *
 * $Id: Postgres83.php,v 1.18 2008/03/17 21:35:48 ioguix Exp $
 */

include_once('./classes/database/Postgres82.php');

class Postgres83 extends Postgres82 {

	var $major_version = 8.3;

	// Last oid assigned to a system object
	var $_lastSystemOID = 17231; // need to confirm this once we get to beta!!!

	// Select operators
	var $selectOps = array('=' => 'i', '!=' => 'i', '<' => 'i', '>' => 'i', '<=' => 'i', '>=' => 'i', 
							'<<' => 'i', '>>' => 'i', '<<=' => 'i', '>>=' => 'i',
							'LIKE' => 'i', 'NOT LIKE' => 'i', 'ILIKE' => 'i', 'NOT ILIKE' => 'i', 'SIMILAR TO' => 'i',
							'NOT SIMILAR TO' => 'i', '~' => 'i', '!~' => 'i', '~*' => 'i', '!~*' => 'i',
							'IS NULL' => 'p', 'IS NOT NULL' => 'p', 'IN' => 'x', 'NOT IN' => 'x',
							'@@' => 'i', '@@@' => 'i', '@>' => 'i', '<@' => 'i',
							'@@ to_tsquery' => 't', '@@@ to_tsquery' => 't', '@> to_tsquery' => 't', '<@ to_tsquery' => 't',
							'@@ plainto_tsquery' => 't', '@@@ plainto_tsquery' => 't', '@> plainto_tsquery' => 't', '<@ plainto_tsquery' => 't');

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres83($conn) {
		$this->Postgres82($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc83.php');
		return $this->help_page;
	}

	// Schemas functions
	/**
	 * Returns table locks information in the current database
	 * @return A recordset
	 */

	function getLocks() {
		global $conf;

		if (!$conf['show_system'])
			$where = "AND pn.nspname NOT LIKE 'pg\\\\_%'";
		else
			$where = "AND nspname !~ '^pg_t(emp_[0-9]+|oast)$'";

		$sql = "SELECT
					pn.nspname, pc.relname AS tablename, pl.pid, pl.mode, pl.granted, pl.virtualtransaction,
					 (select transactionid from pg_catalog.pg_locks l2 where l2.locktype='transactionid'
						and l2.mode='ExclusiveLock' and l2.virtualtransaction=pl.virtualtransaction) as transaction
				FROM
					pg_catalog.pg_locks pl,
			    	pg_catalog.pg_class pc,
					pg_catalog.pg_namespace pn
				WHERE
					pl.relation = pc.oid
					AND
					pc.relnamespace=pn.oid
					{$where}
				ORDER BY
					pid,nspname,tablename";

		return $this->selectSet($sql);
	}

    // Views functions

	/**
	 * Rename a view
	 * @param $view The current view's name
	 * @param $name The new view's name
	 * @return -1 Failed
	 * @return 0 success
	 */
	function renameView($view, $name) {
		$this->fieldClean($name);
		$this->fieldClean($view);
		$sql = "ALTER VIEW \"{$this->_schema}\".\"{$view}\" RENAME TO \"{$name}\"";
		if ($this->execute($sql) != 0)
			return -1;
		return 0;
	}

	// Index functions

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
		$sql = "CLUSTER \"{$this->_schema}\".\"{$table}\" USING \"{$index}\"";

		return $this->execute($sql);
	}

	// Sequence functions

	/**
	 * Rename a sequence
	 * @param $sequence The sequence name
	 * @param $name The new name for the sequence
	 * @return 0 success
	 */
	function renameSequence($sequence, $name) {
		$this->fieldClean($name);
		$this->fieldClean($sequence);

		$sql = "ALTER SEQUENCE \"{$this->_schema}\".\"{$sequence}\" RENAME TO \"{$name}\"";
		return $this->execute($sql);
	}

	// Operator Class functions

	/**
	 *  Gets all opclasses
	 *
	 *  * @return A recordset

	 */

	function getOpClasses() {

		$sql = "
			SELECT
				pa.amname, po.opcname,
				po.opcintype::pg_catalog.regtype AS opcintype,
				po.opcdefault,
				pg_catalog.obj_description(po.oid, 'pg_opclass') AS opccomment
			FROM
				pg_catalog.pg_opclass po, pg_catalog.pg_am pa, pg_catalog.pg_namespace pn
			WHERE
				po.opcmethod=pa.oid
				AND po.opcnamespace=pn.oid
				AND pn.nspname='{$this->_schema}'
			ORDER BY 1,2
			";

		return $this->selectSet($sql);
	}

	// FTS functions

 	/**
 	 * Creates a new FTS configuration.
 	 * @param string $cfgname The name of the FTS configuration to create
 	 * @param string $parser The parser to be used in new FTS configuration
 	 * @param string $locale Locale of the FTS configuration
 	 * @param string $template The existing FTS configuration to be used as template for the new one
 	 * @param string $withmap Should we copy whole map of existing FTS configuration to the new one
 	 * @param string $makeDefault Should this configuration be the default for locale given
 	 * @param string $comment If omitted, defaults to nothing
 	 * @return 0 success
 	 */
 	function createFtsConfiguration($cfgname, $parser = '', $template = '', $comment = '') {
 		$this->fieldClean($cfgname);

 		$sql = "CREATE TEXT SEARCH CONFIGURATION \"{$cfgname}\" (";
 		if ($parser != '') {
			$this->fieldClean($parser['schema']);
			$this->fieldClean($parser['parser']);
			$parser = "\"{$parser['schema']}\".\"{$parser['parser']}\"";
			$sql .= " PARSER = {$parser}";
		}
 		if ($template != '') {
			$this->fieldClean($template);
 			$sql .= " COPY = \"{$template}\"";
 		}
		$sql .= ")";

 		if ($comment != '') {
 			$status = $this->beginTransaction();
 			if ($status != 0) return -1;
 		}

 		// Create the FTS configuration
 		$status =  $this->execute($sql);
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		// Set the comment
 		if ($comment != '') {
			$this->clean($comment);
 			$status = $this->setComment('TEXT SEARCH CONFIGURATION', $cfgname, '', $comment);
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}

 			return $this->endTransaction();
 		}

 		return 0;
 	}


 	/**
 	 * Returns all FTS configurations available
 	 */
 	function getFtsConfigurations() {
 		$sql = "SELECT
            		n.nspname as schema,
            		c.cfgname as name,
            		pg_catalog.obj_description(c.oid, 'pg_ts_config') as comment
         		FROM
			  		pg_catalog.pg_ts_config c
              		JOIN pg_catalog.pg_namespace n ON n.oid = c.cfgnamespace
         		WHERE
					pg_catalog.pg_ts_config_is_visible(c.oid)
         		ORDER BY
					schema, name";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Return all information related to a FTS configuration
 	 * @param $ftscfg The name of the FTS configuration
 	 * @return FTS configuration information
 	 */
 	function getFtsConfigurationByName($ftscfg) {
 		$this->clean($ftscfg);
 		$sql = "SELECT
            n.nspname as schema,
            c.cfgname as name,
            p.prsname as parser,
            c.cfgparser as parser_id,
            pg_catalog.obj_description(c.oid, 'pg_ts_config') as comment
         FROM pg_catalog.pg_ts_config c
         LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.cfgnamespace
         LEFT JOIN pg_catalog.pg_ts_parser p ON p.oid = c.cfgparser
         WHERE pg_catalog.pg_ts_config_is_visible(c.oid)
         AND c.cfgname = '{$ftscfg}'";

 		return $this->selectSet($sql);
 	}


 	/**
 	 * Returns the map of FTS configuration given (list of mappings (tokens) and their processing dictionaries)
 	 *
 	 * @param string $ftscfg Name of the FTS configuration
 	 */
 	function getFtsConfigurationMap($ftscfg) {
 		$this->fieldClean($ftscfg);
 		$getOidSql = "SELECT oid FROM pg_catalog.pg_ts_config WHERE cfgname = '{$ftscfg}'";
 		$oidSet = $this->selectSet($getOidSql);
 		$oid = $oidSet->fields['oid'];

 		$sql = " SELECT
           (SELECT t.alias FROM pg_catalog.ts_token_type(c.cfgparser) AS t WHERE t.tokid = m.maptokentype) AS name,
           (SELECT t.description FROM pg_catalog.ts_token_type(c.cfgparser) AS t WHERE t.tokid = m.maptokentype) AS description,
 c.cfgname AS cfgname
                 ,n.nspname ||'.'|| d.dictname as dictionaries
         FROM pg_catalog.pg_ts_config AS c, pg_catalog.pg_ts_config_map AS m, pg_catalog.pg_ts_dict d, pg_catalog.pg_namespace n
         WHERE c.oid = {$oid} AND m.mapcfg = c.oid and m.mapdict = d.oid and d.dictnamespace = n.oid
         ORDER BY name
         ";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Returns all FTS parsers available
 	 */
 	function getFtsParsers() {
 		$sql = "SELECT
           n.nspname as schema,
           p.prsname as name,
           pg_catalog.obj_description(p.oid, 'pg_ts_parser') as comment
         FROM pg_catalog.pg_ts_parser p
         LEFT JOIN pg_catalog.pg_namespace n ON n.oid = p.prsnamespace WHERE pg_catalog.pg_ts_parser_is_visible(p.oid)
         ORDER BY schema, name";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Returns all FTS dictionaries available
 	 */
 	function getFtsDictionaries() {
 		$sql = "SELECT
           n.nspname as schema,
           d.dictname as name,
           pg_catalog.obj_description(d.oid, 'pg_ts_dict') as comment
         FROM pg_catalog.pg_ts_dict d
         LEFT JOIN pg_catalog.pg_namespace n ON n.oid = d.dictnamespace
         WHERE pg_catalog.pg_ts_dict_is_visible(d.oid)
         ORDER BY schema, name;";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Returns all FTS dictionary templates available
 	 */
 	function getFtsDictionaryTemplates() {
 		$sql = "SELECT
           n.nspname as schema,
           t.tmplname as name,
           ( SELECT COALESCE(np.nspname, '(null)')::pg_catalog.text || '.' || p.proname FROM
             pg_catalog.pg_proc p
                                  LEFT JOIN pg_catalog.pg_namespace np ON np.oid = p.pronamespace
                                  WHERE t.tmplinit = p.oid ) AS  init,
           ( SELECT COALESCE(np.nspname, '(null)')::pg_catalog.text || '.' || p.proname FROM
             pg_catalog.pg_proc p
                                  LEFT JOIN pg_catalog.pg_namespace np ON np.oid = p.pronamespace
                                  WHERE t.tmpllexize = p.oid ) AS  lexize,
           pg_catalog.obj_description(t.oid, 'pg_ts_template') as comment
         FROM pg_catalog.pg_ts_template t
         LEFT JOIN pg_catalog.pg_namespace n ON n.oid = t.tmplnamespace
         WHERE pg_catalog.pg_ts_template_is_visible(t.oid)
         ORDER BY schema, name;";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Drops FTS coniguration
 	 */
 	function dropFtsConfiguration($ftscfg, $cascade) {
 		$this->fieldClean($ftscfg);

 		$sql = "DROP TEXT SEARCH CONFIGURATION \"{$ftscfg}\"";
 		if ($cascade) $sql .= " CASCADE";

 		return $this->execute($sql);
 	}

 	/**
 	 * Drops FTS dictionary
 	 *
 	 * @todo Support of dictionary templates dropping
 	 */
 	function dropFtsDictionary($ftsdict, $cascade = true) {
 		$this->fieldClean($ftsdict);

 		$sql = "DROP TEXT SEARCH DICTIONARY";
 		$sql .= " \"{$ftsdict}\"";
 		if ($cascade) $sql .= " CASCADE";

 		return $this->execute($sql);
 	}

 	/**
 	 * Alters FTS configuration
 	 */
 	function updateFtsConfiguration($cfgname, $comment, $name) {
 		$this->fieldClean($cfgname);
 		$this->fieldClean($name);
 		$this->clean($comment);

 		$status = $this->beginTransaction();
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		$status = $this->setComment('TEXT SEARCH CONFIGURATION', $cfgname, '', $comment);
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		// Only if the name has changed
 		if ($name != $cfgname) {
 			$sql = "ALTER TEXT SEARCH CONFIGURATION \"{$cfgname}\" RENAME TO \"{$name}\"";
 			$status = $this->execute($sql);
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}
 		}

 		return $this->endTransaction();
 	}

 	/**
 	 * Creates a new FTS dictionary or FTS dictionary template.
 	 * @param string $dictname The name of the FTS dictionary to create
 	 * @param boolean $isTemplate Flag whether we create usual dictionary or dictionary template
 	 * @param string $template The existing FTS dictionary to be used as template for the new one
 	 * @param string $lexize The name of the function, which does transformation of input word
 	 * @param string $init The name of the function, which initializes dictionary
 	 * @param string $option Usually, it stores various options required for the dictionary
 	 * @param string $comment If omitted, defaults to nothing
 	 * @return 0 success
 	 */
 	function createFtsDictionary($dictname, $isTemplate = false, $template = '', $lexize = '', $init = '', $option = '', $comment = '') {
 		$this->fieldClean($dictname);
 		$this->fieldClean($template);
 		$this->fieldClean($lexize);
 		$this->fieldClean($init);
 		$this->fieldClean($option);
 		$this->clean($comment);

 		$sql = "CREATE TEXT SEARCH";
 		if ($isTemplate) {
 			$sql .= " TEMPLATE {$dictname} (";
 			if ($lexize != '') $sql .= " LEXIZE = {$lexize}";
 			if ($init != '') $sql .= ", INIT = {$init}";
            $sql .= ")";
 			$whatToComment = 'TEXT SEARCH TEMPLATE';
 		} else {
 			$sql .= " DICTIONARY {$dictname} (";
 			if ($template != '') $sql .= " TEMPLATE = {$template}";
 			if ($option != '') $sql .= ", {$option}";
            $sql .= ")";
 			$whatToComment = 'TEXT SEARCH DICTIONARY';
 		}

 		if ($comment != '') {
 			$status = $this->beginTransaction();
 			if ($status != 0) return -1;
 		}

 		// Create the FTS dictionary
 		$status =  $this->execute($sql);
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		// Set the comment
 		if ($comment != '') {
 			$status = $this->setComment($whatToComment, $dictname, '', $comment);
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}
 		}

 		return $this->endTransaction();
 	}

 	/**
 	 * Alters FTS dictionary or dictionary template
 	 */
 	function updateFtsDictionary($dictname, $comment, $name) {
 		$this->fieldClean($dictname);
 		$this->fieldClean($name);
 		$this->clean($comment);

 		$status = $this->beginTransaction();
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		$status = $this->setComment('TEXT SEARCH DICTIONARY', $dictname, '', $comment);
 		if ($status != 0) {
 			$this->rollbackTransaction();
 			return -1;
 		}

 		// Only if the name has changed
 		if ($name != $dictname) {
 			$sql = "ALTER TEXT SEARCH CONFIGURATION \"{$dictname}\" RENAME TO \"{$name}\"";
 			$status = $this->execute($sql);
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}
 		}

 		return $this->endTransaction();
 	}

 	/**
 	 * Return all information relating to a FTS dictionary
 	 * @param $ftsdict The name of the FTS dictionary
 	 * @return FTS dictionary information
 	 */
 	function getFtsDictionaryByName($ftsdict) {
 		$this->clean($ftsdict);
 		$sql = "SELECT
           n.nspname as schema,
           d.dictname as name,
           ( SELECT COALESCE(nt.nspname, '(null)')::pg_catalog.text || '.' || t.tmplname FROM
             pg_catalog.pg_ts_template t
                                  LEFT JOIN pg_catalog.pg_namespace nt ON nt.oid = t.tmplnamespace
                                  WHERE d.dicttemplate = t.oid ) AS  template,
           d.dictinitoption as init,
           pg_catalog.obj_description(d.oid, 'pg_ts_dict') as comment
         FROM pg_catalog.pg_ts_dict d
         LEFT JOIN pg_catalog.pg_namespace n ON n.oid = d.dictnamespace
         WHERE d.dictname = '{$ftsdict}'
           AND pg_catalog.pg_ts_dict_is_visible(d.oid)
         ORDER BY schema, name";

 		return $this->selectSet($sql);
 	}

 	/**
 	 * Creates/updates/deletes FTS mapping.
 	 * @param string $cfgname The name of the FTS configuration to alter
 	 * @param array $mapping Array of tokens' names
 	 * @param string $action What to do with the mapping: add, alter or drop
 	 * @param string $dictname Dictionary that will process tokens given or null in case of drop action
 	 * @return 0 success
 	 */
 	function changeFtsMapping($ftscfg, $mapping, $action, $dictname = null) {
 		$this->fieldClean($ftscfg);
 		$this->fieldClean($dictname);
 		$this->arrayClean($mapping);

 		if (count($mapping) > 0) {
 			switch ($action) {
 				case 'alter':
 					$whatToDo = "ALTER";
 					break;
 				case 'drop':
 					$whatToDo = "DROP";
 					break;
 				default:
 					$whatToDo = "ADD";
 					break;
 			}
 			$sql = "ALTER TEXT SEARCH CONFIGURATION \"{$ftscfg}\" {$whatToDo} MAPPING FOR ";
 			$sql .= implode(",", $mapping);
 			if ($action != 'drop' && !empty($dictname)) {
 				$sql .= " WITH {$dictname}";
 			}

 			$status = $this->beginTransaction();
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}
 			$status =  $this->execute($sql);
 			if ($status != 0) {
 				$this->rollbackTransaction();
 				return -1;
 			}
 			return $this->endTransaction();
 		} else {
 			return -1;
 		}
 	}

 	/**
 	 * Return all information related to a given FTS configuration's mapping
 	 * @param $ftscfg The name of the FTS configuration
 	 * @param $mapping The name of the mapping
 	 * @return FTS configuration information
 	 */
 	function getFtsMappingByName($ftscfg, $mapping) {
 		$this->fieldClean($ftscfg);
 		$this->fieldClean($mapping);

 		$getOidSql = "SELECT oid, cfgparser FROM pg_catalog.pg_ts_config WHERE cfgname = '{$ftscfg}'";
 		$oidSet = $this->selectSet($getOidSql);
 		$oid = $oidSet->fields['oid'];
 		$cfgparser = $oidSet->fields['cfgparser'];

 		$getTokenIdSql = "SELECT tokid FROM pg_catalog.ts_token_type({$cfgparser}) WHERE alias = '{$mapping}'";
 		$tokenIdSet = $this->selectSet($getTokenIdSql);
 		$tokid = $tokenIdSet->fields['tokid'];

 		$sql = "SELECT
    (SELECT t.alias FROM pg_catalog.ts_token_type(c.cfgparser) AS t WHERE t.tokid = m.maptokentype) AS name,
                        d.dictname as dictionaries
         FROM pg_catalog.pg_ts_config AS c, pg_catalog.pg_ts_config_map AS m, pg_catalog.pg_ts_dict d
         WHERE c.oid = {$oid} AND m.mapcfg = c.oid AND m.maptokentype = {$tokid} AND m.mapdict = d.oid
         LIMIT 1;";
 		return $this->selectSet($sql);
 	}

 	/**
 	 * Return list of FTS mappings possible for given parser (specified by given configuration since configuration
 	 * can only have 1 parser)
 	 */
 	function getFtsMappings($ftscfg) {
 		$cfg = $this->getFtsConfigurationByName($ftscfg);
 		$sql = "SELECT alias AS name, description FROM pg_catalog.ts_token_type({$cfg->fields['parser_id']}) ORDER BY name";
 		return $this->selectSet($sql);
 	}

	// Type functions

	/**
	 * Creates a new enum type in the database
	 * @param $name The name of the type
	 * @param $values An array of values
	 * @param $typcomment Type comment
	 * @return 0 success
	 * @return -1 transaction error
	 * @return -2 no values supplied
	 */
	function createEnumType($name, $values, $typcomment) {
		$this->fieldClean($name);
		$this->clean($typcomment);

		if (empty($values)) return -2;

		$status = $this->beginTransaction();
		if ($status != 0) return -1;

		$values = array_unique($values);

		$nbval = count($values);

		for ($i = 0; $i < $nbval; $i++)
			$this->clean($values[$i]);

		$sql = "CREATE TYPE \"{$this->_schema}\".\"{$name}\" AS ENUM ('";
		$sql.= implode("','", $values);
		$sql .= "')";

		$status = $this->execute($sql);
		if ($status) {
			$this->rollbackTransaction();
			return -1;
		}

		if ($typcomment != '') {
			$status = $this->setComment('TYPE', $name, '', $typcomment, true);
			if ($status) {
				$this->rollbackTransaction();
				return -1;
			}
		}

		return $this->endTransaction();

	}

	/**
	 * Get defined values for a given enum
	 * @return A recordset
	 */
	function getEnumValues($name) {
		$this->fieldClean($name);

		$sql = "SELECT enumlabel AS enumval
		FROM pg_catalog.pg_type t JOIN pg_catalog.pg_enum e ON (t.oid=e.enumtypid)
		WHERE t.typname = '{$name}' ORDER BY e.oid";
		return $this->selectSet($sql);
	}

	// Function methods

	/**
	 * Creates a new function.
	 * @param $funcname The name of the function to create
	 * @param $args A comma separated string of types
	 * @param $returns The return type
	 * @param $definition The definition for the new function
	 * @param $language The language the function is written for
	 * @param $flags An array of optional flags
	 * @param $setof True if it returns a set, false otherwise
	 * @param $rows number of rows planner should estimate will be returned
     * @param $cost cost the planner should use in the function execution step
	 * @param $replace (optional) True if OR REPLACE, false for normal
	 * @return 0 success
	 */
	function createFunction($funcname, $args, $returns, $definition, $language, $flags, $setof, $cost, $rows, $replace = false) {
		$this->fieldClean($funcname);
		$this->clean($args);
		$this->clean($language);
		$this->arrayClean($flags);
		$this->clean($cost);
		$this->clean($rows);

		$sql = "CREATE";
		if ($replace) $sql .= " OR REPLACE";
		$sql .= " FUNCTION \"{$this->_schema}\".\"{$funcname}\" (";

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

		$sql .= " LANGUAGE \"{$language}\"";

		// Add costs
		if (!empty($cost))
			$sql .= " COST {$cost}";

		if ($rows <> 0 ){
			$sql .= " ROWS {$rows}";
		}

		// Add flags
		foreach ($flags as  $v) {
			// Skip default flags
			if ($v == '') continue;
			else $sql .= "\n{$v}";
		}

		return $this->execute($sql);
	}

	/**
	 * Returns all details for a particular function
	 * @param $func The name of the function to retrieve
	 * @return Function info
	 */
	function getFunction($function_oid) {
		$this->clean($function_oid);

		$sql = "SELECT
					pc.oid AS prooid,
					proname,
					pg_catalog.pg_get_userbyid(proowner) AS proowner,
					nspname as proschema,
					lanname as prolanguage,
					procost,
					prorows,
					pg_catalog.format_type(prorettype, NULL) as proresult,
					prosrc,
					probin,
					proretset,
					proisstrict,
					provolatile,
					prosecdef,
					pg_catalog.oidvectortypes(pc.proargtypes) AS proarguments,
					proargnames AS proargnames,
					pg_catalog.obj_description(pc.oid, 'pg_proc') AS procomment,
					proconfig
				FROM
					pg_catalog.pg_proc pc, pg_catalog.pg_language pl, pg_catalog.pg_namespace pn
				WHERE
					pc.oid = '{$function_oid}'::oid
					AND pc.prolang = pl.oid
					AND pc.pronamespace = pn.oid
				";

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

		$sql = "SELECT
				t.tgname, pg_catalog.pg_get_triggerdef(t.oid) AS tgdef,
				CASE WHEN t.tgenabled = 'D' THEN FALSE ELSE TRUE END AS tgenabled, p.oid AS prooid,
				p.proname || ' (' || pg_catalog.oidvectortypes(p.proargtypes) || ')' AS proproto,
				ns.nspname AS pronamespace
			FROM pg_catalog.pg_trigger t, pg_catalog.pg_proc p, pg_catalog.pg_namespace ns
			WHERE t.tgrelid = (SELECT oid FROM pg_catalog.pg_class WHERE relname='{$table}'
				AND relnamespace=(SELECT oid FROM pg_catalog.pg_namespace WHERE nspname='{$this->_schema}'))
				AND (NOT tgisconstraint OR NOT EXISTS
						(SELECT 1 FROM pg_catalog.pg_depend d    JOIN pg_catalog.pg_constraint c
							ON (d.refclassid = c.tableoid AND d.refobjid = c.oid)
						WHERE d.classid = t.tableoid AND d.objid = t.oid AND d.deptype = 'i' AND c.contype = 'f'))
				AND p.oid=t.tgfoid
				AND p.pronamespace = ns.oid";

		return $this->selectSet($sql);
	}



	// Capabilities
	function hasCreateTableLikeWithIndexes() {return true;}
	function hasVirtualTransactionId() {return true;}
	function hasEnumTypes() {return true;}
	function hasFTS() {return true;}
	function hasFunctionCosting() {return true;}
	function hasFunctionGUC() {return true;}
}
?>
