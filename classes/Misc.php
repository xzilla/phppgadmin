<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.69 2004/07/09 03:23:01 chriskl Exp $
	 */
	 
	class Misc {
		// Tracking string to include in HREFs 
		var $href;
		// Tracking string to include in forms
		var $form;
		
		/* Constructor */
		function Misc() {
		}

		/** 
		 * Checks if dumps are properly set up
		 * @param $all (optional) True to check pg_dumpall, false to just check pg_dump
		 * @return True, dumps are set up, false otherwise
		 */
		function isDumpEnabled($all = false) {
			global $conf;
			
			if ($all)
				return ($conf['servers'][$_SESSION['webdbServerID']]['pg_dumpall_path'] !== null 
								&& $conf['servers'][$_SESSION['webdbServerID']]['pg_dumpall_path'] != '');
			else 
				return ($conf['servers'][$_SESSION['webdbServerID']]['pg_dump_path'] !== null 
								&& $conf['servers'][$_SESSION['webdbServerID']]['pg_dump_path'] != '');
		}

		/**
		 * Checks whether a login is allowed
		 * @return True if login is allowed to be used
		 */
		function checkExtraSecurity() {
			global $conf;

			// Disallowed logins if extra_login_security is enabled.  These must be lowercase.
			$bad_usernames = array('pgsql', 'postgres', 'root', 'administrator');
			
			// If extra security is off, return true
			if (!$conf['extra_login_security']) return true;
			elseif ($_SESSION['webdbPassword'] == '') return false;
			else {
				$username = strtolower($_SESSION['webdbUsername']);
				return !in_array($username, $bad_usernames);
			}
		}

		/**
		 * Sets the href tracking variable
		 */
		function setHREF() {
			$this->href = '';
			if (isset($_REQUEST['database'])) {
				$this->href .= 'database=' . urlencode($_REQUEST['database']);
				if (isset($_REQUEST['schema']))
					$this->href .= '&amp;schema=' . urlencode($_REQUEST['schema']);
			}
		}

		/**
		 * Sets the form tracking variable
		 */
		function setForm() {
			$this->form = '';
			if (isset($_REQUEST['database'])) {
				$this->form .= "<input type=\"hidden\" name=\"database\" value=\"" . htmlspecialchars($_REQUEST['database']) . "\" />\n";
				if (isset($_REQUEST['schema']))
					$this->form .= "<input type=\"hidden\" name=\"schema\" value=\"" . htmlspecialchars($_REQUEST['schema']) . "\" />\n";
			}
		}

		/**
		 * Replace all spaces with &nbsp; in a string
		 * @param $str The string to change
		 * @param $shownull True to show NULLs, false otherwise
		 * @param $type Field type if available, other NULL
		 * @return The string with replacements
		 */
		function printVal($str, $shownull = false, $type = null) {
			global $lang;

			// If the string contains at least one instance of >1 space in a row, a tab character, a
			// space at the start of a line, or a space at the start of the whole string then
			// substitute all spaces for &nbsp;s
			if ($str === null && $shownull) return '<i>NULL</i>';
			elseif ($str) {
				switch ($type) {
					case 'int2':
					case 'int4':
					case 'int8':
					case 'float4':
					case 'float8':
					case 'money':
					case 'numeric':
					case 'oid':
					case 'xid':
					case 'cid':
					case 'tid':
						return "<div align=\"right\">" . nl2br(htmlspecialchars($str)) . "</div>";
						break;
					case 'bool':
					case 'boolean':
						if ($str == 't') return $lang['strtrue'];
						elseif ($str == 'f') return $lang['strfalse'];
						else return nl2br(htmlspecialchars($str));
						break;
					case 'bytea':
						// addCSlashes converts all weird ASCII characters to octal representation,
						// EXCEPT the 'special' ones like \r \n \t, etc.
						return htmlspecialchars(addCSlashes($str, "\0..\37\177..\377"));
						break;
					default:
						if (strstr($str, '  ') || strstr($str, "\t") || strstr($str, "\n ") || $str{0} == ' ') {
							$str = str_replace(' ', '&nbsp;', htmlspecialchars($str));
							// Replace tabs with 8 spaces
							$str = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $str);
							return nl2br($str);
						}
						else
							return nl2br(htmlspecialchars($str));					
					}						
			} else
				return '';
		}

		/**
		 * A function to recursively strip slashes.  Used to
		 * enforce magic_quotes_gpc being off.
		 * @param &var The variable to strip
		 */
		function stripVar(&$var) {
			if (is_array($var)) {
				foreach($var as $k => $v) {
					$this->stripVar($var[$k]);
				}		
			}
			else
				$var = stripslashes($var);	
		}
		
		/**
		 * Print out the page heading and help link
		 * @param $arr Array of heading items, already escaped
		 * @param $help (optional) The identifier for the help link
		 */
		function printTitle($arr, $help = null) {
			global $data, $lang;

			// Don't continue unless we are actually displaying something			
			if (!is_array($arr) || sizeof($arr) == 0) return;
			
			if ($help !== null && isset($data->help_page[$help])) {
				echo "<br /><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n";
				echo "<tr><td><h2>";
				// Join array with separator character
				echo implode($lang['strseparator'], $arr);
				echo "</h2></td><td style=\"text-align: right\"><a class=\"navlink help\" href=\"";
				// Output URL to help
				echo htmlspecialchars($data->help_base . $data->help_page[$help]);
				echo "\" target=\"ppa_help\">{$lang['strhelp']}</a></td></tr>\n";
				echo "</table>\n";
				echo "<br />\n";
			}
			else {
				echo "<h2>";
				// Join array with separator character
				echo implode($lang['strseparator'], $arr);
				echo "</h2>\n";
			}
		}
		
		/**
		 * Print out a message
		 * @param $msg The message to print
		 */
		function printMsg($msg) {
			if ($msg != '') echo "<p class=\"message\">{$msg}</p>\n";
		}

		/**
		 * Creates a database accessor
		 */
		function &getDatabaseAccessor($database) {
			global $conf;

			// Create the connection object and make the connection
			$_connection = new Connection(
				$conf['servers'][$_SESSION['webdbServerID']]['host'],
				$conf['servers'][$_SESSION['webdbServerID']]['port'],
				$_SESSION['webdbUsername'],
				$_SESSION['webdbPassword'],
				$database
			);

			// Get the name of the database driver we need to use.  The description
			// of the server is returned and placed into the conf array.
			$_type = $_connection->getDriver($desc);
			// XXX: NEED TO CHECK RETURN STATUS HERE

			// Create a database wrapper class for easy manipulation of the
			// connection.
			include_once('./classes/database/' . $_type . '.php');
			$data = &new $_type($_connection->conn);

			return $data;
		}


		/**
		 * Prints the page header.  If global variable $_no_output is
		 * set then no header is drawn.
		 * @param $title The title of the page
		 * @param $script script tag
		 */
		function printHeader($title = '', $script = null) {
			global $appName, $lang, $_no_output, $conf;

			if (!isset($_no_output)) {
				// Send XHTML headers, or regular HTML headers
				if (isset($conf['use_xhtml']) && $conf['use_xhtml']) {
					echo "<?xml version=\"1.0\" encoding=\"", htmlspecialchars($lang['appcharset']), "\"?>\n";
					echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd\">\n";
					echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n";
				} else {
					echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
					echo "<html>\n";
				}
				echo "<head>\n";
				echo "<title>", htmlspecialchars($appName);
				if ($title != '') echo " - {$title}";
				echo "</title>\n";
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset={$lang['appcharset']}\" />\n";
				
				// Theme
				echo "<link rel=\"stylesheet\" href=\"themes/{$conf['theme']}/global.css\" type=\"text/css\" />\n";
				if ($script) echo "{$script}\n";
				echo "</head>\n";
			}
		}

		/**
		 * Prints the page footer
		 * @param $doBody True to output body tag, false otherwise
		 */
		function printFooter($doBody = true) {
			global $_reload_browser, $_reload_drop_database;

			if ($doBody) {
				if (isset($_reload_browser)) $this->printReload(false);
				elseif (isset($_reload_drop_database)) $this->printReload(true);
				echo "</body>\n";
			}
			echo "</html>\n";
		}

		/**
		 * Prints the page body.
		 * @param $doBody True to output body tag, false otherwise
		 * @param $bodyClass - name of body class
		 */
		function printBody($bodyClass = '', $doBody = true ) {
			global $_no_output;			

			if (!isset($_no_output)) {
				if ($doBody) {
					$bodyClass = htmlspecialchars($bodyClass);
					echo "<body", ($bodyClass == '' ? '' : " class=\"{$bodyClass}\"");
					echo ">\n";
				}
			}
		}

		/**
		 * Outputs JavaScript code that will reload the browser
		 * @param $database True if dropping a database, false otherwise
		 */
		function printReload($database) {
			echo "<script language=\"JavaScript\">\n";
			if ($database)
				echo "\tparent.frames.browser.location.href=\"browser.php\";\n";
			else
				echo "\tparent.frames.browser.location.reload();\n";
			echo "</script>\n";
		}

		/**
		 * Display navigation tabs
		 * @params $tabs An associative array of tabs definitions, see printTableNav() for an example.
		 */
		function printTabs($tabs) {
			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			
			$width = round(100 / count($tabs)).'%';
			if (!isset($_REQUEST['tab'])) $_REQUEST['tab'] = '';
			
			foreach ($tabs as $tab_id => $tab) {
				if ($tab_id == $_REQUEST['tab'])
					$class = ' class="active"';
				else
					$class = '';
				echo "<td width=\"{$width}\"{$class}><a href=\"{$tab['url']}&amp;tab={$tab_id}\">{$tab['title']}</a></td>\n";
			}
			
			echo "</tr></table>\n";
		}
		
		/**
		 * Display the navigation header for tables
		 */
		function printTableNav() {
			global $lang;
			
			$vars = $this->href . '&amp;table=' . urlencode($_REQUEST['table']);
			
			$tabs = array (
				'columns' => array (
					'title' => $lang['strcolumns'],
					'url'   => "tblproperties.php?{$vars}",
				),
				'indexes' => array (
					'title' => $lang['strindexes'],
					'url'   => "indexes.php?{$vars}",
				),
				'constraints' => array (
					'title' => $lang['strconstraints'],
					'url'   => "constraints.php?{$vars}",
				),
				'triggers' => array (
					'title' => $lang['strtriggers'],
					'url'   => "triggers.php?{$vars}",
				),
				'rules' => array (
					'title' => $lang['strrules'],
					'url'   => "rules.php?{$this->href}&amp;reltype=table&amp;relation=" . urlencode($_REQUEST['table']),
				),
				'info' => array (
					'title' => $lang['strinfo'],
					'url'   => "info.php?{$vars}",
				),
				'privileges' => array (
					'title' => $lang['strprivileges'],
					'url'   => "privileges.php?{$vars}&amp;type=table&amp;object=" . urlencode($_REQUEST['table']),
				),
				'import' => array (
					'title' => $lang['strimport'],
					'url'   => "tblproperties.php?{$vars}&amp;action=import",
				),
				'export' => array (
					'title' => $lang['strexport'],
					'url'   => "tblproperties.php?{$vars}&amp;action=export",
				),
			);
			
			$this->printTabs($tabs);
		}

		/**
		 * Display the navigation header for views
		 */
		function printViewNav() {
			global $lang;

			$vars = $this->href . '&amp;view=' . urlencode($_REQUEST['view']);
			
			$tabs = array (
				'columns' => array (
					'title' => $lang['strcolumns'],
					'url'   => "viewproperties.php?{$vars}",
				),
				'definition' => array (
					'title' => $lang['strdefinition'],
					'url'   => "viewproperties.php?action=definition&amp;{$vars}",
				),
				'rules' => array (
					'title' => $lang['strrules'],
					'url'   => "rules.php?{$this->href}&amp;reltype=view&amp;relation=" . urlencode($_REQUEST['view']),
				),
				'privileges' => array (
					'title' => $lang['strprivileges'],
					'url'   => "privileges.php?{$vars}&amp;type=view&amp;object=" . urlencode($_REQUEST['view']),
				),
			);
			
			$this->printTabs($tabs);
		}

		/**
		 * Display the navigation header for tables
		 */
		function printDatabaseNav() {
			global $lang, $conf, $data;

			$vars = 'database=' . urlencode($_REQUEST['database']);
			
			$tabs = array (
				'schemas' => array (
					'title' => $lang['strschemas'],
					'url'   => "database.php?{$vars}",
				),
				'sql' => array (
					'title' => $lang['strsql'],
					'url'   => "database.php?{$vars}&amp;action=sql",
				),
				'find' => array (
					'title' => $lang['strfind'],
					'url'   => "database.php?{$vars}&amp;action=find",
				),
				'variables' => array (
					'title' => $lang['strvariables'],
					'url'   => "database.php?{$vars}&amp;action=variables",
				),
				'processes' => array (
					'title' => $lang['strprocesses'],
					'url'   => "database.php?{$vars}&amp;action=processes",
				),
				'admin' => array (
					'title' => $lang['stradmin'],
					'url'   => "database.php?{$vars}&amp;action=admin",
				),
				'privileges' => array (
					'title' => $lang['strprivileges'],
					'url'   => "privileges.php?{$vars}&amp;type=database&amp;object=" . urlencode($_REQUEST['database']),
				),
				'export' => array (
					'title' => $lang['strexport'],
					'url'   => "database.php?{$vars}&amp;action=export",
				),
			);
			
			if (!$data->hasSchemas()) unset($tabs['schemas']);
			if (!$data->hasVariables()) unset($tabs['variables']);
			if (!$data->hasProcesses()) unset($tabs['processes']);
			if (!isset($data->privlist['database'])) unset($tabs['privileges']);
			if (!$this->isDumpEnabled()) unset($tabs['export']);

			$this->printTabs($tabs);
		}

		/**
		 * Display the navigation header for popup window
		 */
		function printPopUpNav() {
			global $lang, $data;

			if (isset($_REQUEST['database'])) $url = '&amp;database=' . urlencode($_REQUEST['database']);
			else $url = '';

			$tabs = array (
				'sql' => array (
					'title' => $lang['strsql'],
					'url'   => "sqledit.php?action=sql{$url}",
				),
				'find' => array (
					'title' => $lang['strfind'],
					'url'   => "sqledit.php?action=find{$url}",
				),
			);
			
			$this->printTabs($tabs);
		}
		
		/**
		 * Do multi-page navigation.  Displays the prev, next and page options.
		 * @param $page the page currently viewed
		 * @param $pages the maximum number of pages
		 * @param $url the url to refer to with the page number inserted
		 * @param $max_width the number of pages to make available at any one time (default = 20)
		 */
		function printPages($page, $pages, $url, $max_width = 20) {
			global $lang;

			$window = 10;

			if ($page < 0 || $page > $pages) return;
			if ($pages < 0) return;
			if ($max_width <= 0) return;

			if ($pages > 1) {
				echo "<center><p>\n";
				if ($page != 1) {
					$temp = str_replace('%s', 1, $url);
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$lang['strfirst']}</a>\n";
					$temp = str_replace('%s', $page - 1, $url);
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$lang['strprev']}</a>\n";
				}
				
				if ($page <= $window) { 
					$min_page = 1; 
					$max_page = min(2 * $window, $pages); 
				}
				elseif ($page > $window && $pages >= $page + $window) { 
					$min_page = ($page - $window) + 1; 
					$max_page = $page + $window; 
				}
				else { 
					$min_page = ($page - (2 * $window - ($pages - $page))) + 1; 
					$max_page = $pages; 
				}
				
				// Make sure min_page is always at least 1
				// and max_page is never greater than $pages
				$min_page = max($min_page, 1);
				$max_page = min($max_page, $pages);
				
				for ($i = $min_page; $i <= $max_page; $i++) {
					$temp = str_replace('%s', $i, $url);
					if ($i != $page) echo "<a class=\"pagenav\" href=\"{$temp}\">$i</a>\n";
					else echo "$i\n";
				}
				if ($page != $pages) {
					$temp = str_replace('%s', $page + 1, $url);
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$lang['strnext']}</a>\n";
					$temp = str_replace('%s', $pages, $url);
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$lang['strlast']}</a>\n";
				}
				echo "</p></center>\n";
			}
		}		

		/**
		 * Displays link to the context help.if $conf['docsdir'] is set
		 * @param $url - last part of a document's url (relative to $conf['docsdir'])
		 */
		function printHelp($url) {
			global $lang, $conf;

			if (isset($conf['docdir'])) {
				echo "<p><a href=\"" . $conf['docdir'] . $url . "\" target=\"_blank\">";
				echo $lang['strhelp'];
				echo "</a></p>\n";
			}
		}
	
		/** 
		 * Outputs JavaScript to set default focus
		 * @param $object eg. forms[0].username
		 */
		function setFocus($object) {
			echo "<script language=\"JavaScript\">\n";
			echo "<!--\n";
			echo "   document.{$object}.focus();\n";
			echo "-->\n";
			echo "</script>\n";
		}

		/**
		 * Converts a PHP.INI size variable to bytes.  Taken from publically available
		 * function by Chris DeRose, here: http://www.php.net/manual/en/configuration.directives.php#ini.file-uploads
		 * @param $strIniSize The PHP.INI variable
		 * @return size in bytes, false on failure
		 */
	        function inisizeToBytes($strIniSize) {
			// This function will take the string value of an ini 'size' parameter,
			// and return a double (64-bit float) representing the number of bytes
			// that the parameter represents. Or false if $strIniSize is unparseable.
			$a_IniParts = array();

			if (!is_string($strIniSize))
				return false;

			if (!preg_match ('/^(\d+)([bkm]*)$/i', $strIniSize,$a_IniParts))
				return false;

			$nSize = (double) $a_IniParts[1];
			$strUnit = strtolower($a_IniParts[2]);

			switch($strUnit) {
				case 'm':
					return ($nSize * (double) 1048576);
				case 'k':
					return ($nSize * (double) 1024);
				case 'b':
				default:
					return $nSize;
			}
        	}		 

		/**
		 * Clip a string down to a specified length, and append an ellipsis.
		 * @param $str      The string to be clipped.
		 * @param $maxlen   (optional) Maximum length of string (defaults to the configuration value 'max_chars'.
		 * @param $ellipsis (optional) The string to append if clipping was performed.
		 */
		function clipString($str, $maxlen = null, $ellipsis = null) {
			global $lang, $conf;
			if (is_null($maxlen)) $maxlen = $conf['max_chars'];
			if (is_null($ellipsis)) $ellipsis = $lang['strellipsis'];
			if (strlen($str) > $maxlen) {
				return substr($str, 0, $maxlen-1) . $ellipsis;
			} else {
				return $str;
			}
		}
		
		function printUrlVars($vars, $fields) {
			foreach ($vars as $var => $varfield) {
				echo "{$var}=", urlencode($fields[$varfield]), "&amp;";
			}
		}
		
		/**
		 * Format a table cell according to a set of parameters.
		 * @param $value The value to display
		 * @param $params Associative array of type parameters, or just a type name.
		 * @return The HTML formatted string
		 */
		function printCell($value, $params) {
			global $lang, $data;

			if (is_string($params)) {
				$type = $params;
				$params = array();
			} else {
				$type = isset($params['type']) ? $params['type'] : 'str';
			}
			$out = '';
			
			switch ($type) {
				case 'bool':
				case 'boolean':
					$out = $data->phpBool($value)
							? (isset($params['true']) ? $params['true'] : $lang['strtrue'])
							: (isset($params['false']) ? $params['false'] : $lang['strfalse']);
					break;
				case 'num':
				case 'numeric':
					$align = 'right';
					$out = nl2br(htmlspecialchars($value));
					break;
				case 'pre':
					$tag = 'pre';
					$out = htmlspecialchars($value);
					break;
				case 'nbsp':
					$out = nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($value)));
					break;
				case 'verbatim':
					$out = $value;
					break;
				case 'str':
				case 'string':
				default:
					$out = nl2br(htmlspecialchars($value));
					break;
			}
			
			if (isset($params['class'])) $class = $params['class'];
			
			if (!isset($tag) && (isset($class) || isset($align))) $tag = 'div';
			
			if (isset($tag)) {
				$alignattr = isset($align) ? " align=\"{$align}\"" : '';
				$classattr = isset($class) ? " class=\"{$class}\"" : '';
				return "<{$tag}{$alignattr}{$classattr}>{$out}</{$tag}>";
			}
			
			return $out;
		}

		/**
		 * Display a table of data.
		 * @param $tabledata A set of data to be formatted, as returned by $data->getDatabases() etc.
		 * @param $columns   An associative array of columns to be displayed:
		 *			$columns = array(
		 *				column_id => array(
		 *					'title' => Column heading,
		 *					'field' => Field name for $tabledata->f[...],
		 *				), ...
		 *			);
		 * @param $actions   Actions that can be performed on each object:
		 *			$actions = array(
		 *				action_id => array(
		 *					'title' => Action heading,
		 *					'url'   => Static part of URL,
		 *					'vars'  => Associative array of (URL variable => field name),
		 *				), ...
		 *			);
		 * @param $nodata    (optional) Message to display if data set is empty.
		 * @param $pre_fn    (optional) Name of a function to call for each row,
		 *					 it will be passed two params: $rowdata and $actions,
		 *					 it may be used to derive new fields or modify actions.
		 *					 It can return an array of actions specific to the row,
		 *					 or if nothing is returned then the standard actions are used.
		 *					 (see functions.php and constraints.php for examples)
		 */
		function printTable(&$tabledata, &$columns, &$actions, $nodata = null, $pre_fn = null) {
			global $data, $conf, $misc;
			global $PHP_SELF;

			if ($tabledata->recordCount() > 0) {
				
				// Remove the 'comment' column if they have been disabled
				if (!$conf['show_comments']) {
					unset($columns['comment']);
				}

				// Apply the 'properties' action to the first column
				// and remove it from the action list.
				// (Remove this section to keep the 'Properties' button instead of links)
				if (isset($actions['properties'])) {
					reset($columns);
					$first_column = key($columns);
					$columns[$first_column]['url'] = $actions['properties']['url'];
					$columns[$first_column]['vars'] = $actions['properties']['vars'];
					unset($actions['properties']);
				}
				
				// TEMP: Display field keys
				//echo "<p>", join(', ', array_keys($tabledata->f)), "</p>";
				// END OF TEMP
				
				echo "<table>\n";
				echo "<tr>\n";
				foreach ($columns as $column_id => $column) {
					switch ($column_id) {
						case 'actions':
							echo "<th class=\"data\" colspan=\"", count($actions), "\">{$column['title']}</th>\n";
							break;
						default:
							echo "<th class=\"data\">{$column['title']}</th>\n";
							break;
					}
				}
				echo "</tr>\n";
				
				if (function_exists('ob_start')) ob_start();
				
				$i = 0;
				while (!$tabledata->EOF) {
					$id = ($i % 2) + 1;
					
					unset($alt_actions);
					if (!is_null($pre_fn)) $alt_actions = $pre_fn(&$tabledata, $actions);
					if (!isset($alt_actions)) $alt_actions =& $actions;
					
					echo "<tr>\n";
					
					foreach ($columns as $column_id => $column) {
					
						// Apply default values for missing parameters
						if (isset($column['url']) && !isset($column['vars'])) $column['vars'] = array();
						
						switch ($column_id) {
							case 'actions':
								foreach ($alt_actions as $action) {
									if (isset($action['disable'])) {
										echo "<td class=\"data{$id}\"></td>";
									} else {
										echo "<td class=\"opbutton{$id}\">";
										echo "<a href=\"{$action['url']}";
										$misc->printUrlVars($action['vars'], &$tabledata->f);
										echo "\">{$action['title']}</a></td>";
									}
								}
								break;
							case 'comment':
								// Uncomment this for clipped comments.
								//$tabledata->f[$column['field']] = $misc->clipString($tabledata->f[$column['field']]);
							default;
								echo "<td class=\"data{$id}\">";
								if (isset($column['url'])) {
									echo "<a href=\"{$column['url']}";
									$misc->printUrlVars($column['vars'], &$tabledata->f);
									echo "\">";
								}
								
								$cell = $misc->printCell($tabledata->f[$column['field']], &$column);
								echo $cell;
								
								if (isset($column['url'])) echo "</a>";

								echo "</td>\n";
								break;
						}
					}
					echo "</tr>\n";
					
					if (function_exists('ob_flush')) ob_flush();
					$tabledata->moveNext();
					$i++;
				}
				
				if (function_exists('ob_end_flush')) ob_end_flush();
				
				echo "</table>\n";
			
				return true;
			} else {
				if (!is_null($nodata)) {
					echo "<p>{$nodata}</p>\n";
				}
				return false;
			}
		}
	
	}
?>
