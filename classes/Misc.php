<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.95.2.2 2005/04/13 08:33:01 chriskl Exp $
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
		 * Render a value into HTML using formatting rules specified
		 * by a type name and parameters.
		 *
		 * @param $str The string to change
		 *
		 * @param $type Field type (optional), this may be an internal PostgreSQL type, or:
		 *			yesno    - same as bool, but renders as 'Yes' or 'No'.
		 *			pre      - render in a <pre> block.
		 *			nbsp     - replace all spaces with &nbsp;'s
		 *			verbatim - render exactly as supplied, no escaping what-so-ever.
		 *			callback - render using a callback function supplied in the 'function' param.
		 *
		 * @param $params Type parameters (optional), known parameters:
		 *			null     - string to display if $str is null, or set to TRUE to use a default 'NULL' string,
		 *			           otherwise nothing is rendered.
		 *			clip     - if true, clip the value to a fixed length, and append an ellipsis...
		 *			cliplen  - the maximum length when clip is enabled (defaults to $conf['max_chars'])
		 *			ellipsis - the string to append to a clipped value (defaults to $lang['strellipsis'])
		 *			tag      - an HTML element name to surround the value.
		 *			class    - a class attribute to apply to any surrounding HTML element.
		 *			align    - an align attribute ('left','right','center' etc.)
		 *			true     - (type='bool') the representation of true.
		 *			false    - (type='bool') the representation of false.
		 *			function - (type='callback') a function name, accepts args ($str, $params) and returns a rendering.
		 *			lineno   - prefix each line with a line number.
		 *			map      - an associative array.
		 *
		 * @return The HTML rendered value
		 */
		function printVal($str, $type = null, $params = array()) {
			global $lang, $conf;
			
			// Shortcircuit for a NULL value
			if (is_null($str))
				return isset($params['null'])
						? ($params['null'] === true ? '<i>NULL</i>' : $params['null'])
						: '';
			
			if (isset($params['map']) && isset($params['map'][$str])) $str = $params['map'][$str];
			
			// Clip the value if the 'clip' parameter is true.
			if (isset($params['clip']) && $params['clip'] === true) {
				$maxlen = isset($params['cliplen']) && is_integer($params['cliplen']) ? $params['cliplen'] : $conf['max_chars'];
				$ellipsis = isset($params['ellipsis']) ? $params['ellipsis'] : $lang['strellipsis'];
				if (strlen($str) > $maxlen) {
					$str = substr($str, 0, $maxlen-1) . $ellipsis;
				}
			}

			$out = '';
			
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
					$align = 'right';
					$out = nl2br(htmlspecialchars($str));
					break;
				case 'yesno':
					if (!isset($params['true'])) $params['true'] = $lang['stryes'];
					if (!isset($params['false'])) $params['false'] = $lang['strno'];
					// No break - fall through to boolean case.
				case 'bool':
				case 'boolean':
					if (is_bool($str)) $str = $str ? 't' : 'f';
					switch ($str) {
						case 't':
							$out = (isset($params['true']) ? $params['true'] : $lang['strtrue']);
							$align = 'center';
							break;
						case 'f':
							$out = (isset($params['false']) ? $params['false'] : $lang['strfalse']);
							$align = 'center';
							break;
						default:
							$out = htmlspecialchars($str);
					}
					break;
				case 'bytea':
					// addCSlashes converts all weird ASCII characters to octal representation,
					// EXCEPT the 'special' ones like \r \n \t, etc.
					$out = htmlspecialchars(addCSlashes($str, "\0..\37\177..\377"));
					break;
				case 'pre':
					$tag = 'pre';
					$out = htmlspecialchars($str);
					break;
				case 'prenoescape':
					$tag = 'pre';
					$out = $str;
					break;
				case 'nbsp':
					$out = nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($str)));
					break;
				case 'verbatim':
					$out = $str;
					break;
				case 'callback':
					$out = $params['function']($str, $params);
					break;
				default:
					// If the string contains at least one instance of >1 space in a row, a tab
					// character, a space at the start of a line, or a space at the start of
					// the whole string then render within a pre-formatted element (<pre>).
					if (preg_match('/(^ |  |\t|\n )/m', $str)) {
						$tag = 'pre';
						$class = 'data';
						$out = htmlspecialchars($str);
					} else {
						$out = nl2br(htmlspecialchars($str));
					}
			}
			
			if (isset($params['class'])) $class = $params['class'];
			if (isset($params['align'])) $align = $params['align'];
			
			if (!isset($tag) && (isset($class) || isset($align))) $tag = 'div';
			
			if (isset($tag)) {
				$alignattr = isset($align) ? " align=\"{$align}\"" : '';
				$classattr = isset($class) ? " class=\"{$class}\"" : '';				
				$out = "<{$tag}{$alignattr}{$classattr}>{$out}</{$tag}>";
			}

			// Add line numbers if 'lineno' param is true
			if (isset($params['lineno']) && $params['lineno'] === true) {
				$lines = explode("\n", $str);
				$num = count($lines);
				if ($num > 0) {
					$temp = "<table>\n<tr><td class=\"{$class}\" style=\"vertical-align: top; padding-right: 10px;\"><pre class=\"{$class}\">";
					for ($i = 1; $i <= $num; $i++) {
						$temp .= $i . "\n";
					}
					$temp .= "</pre></td><td class=\"{$class}\" style=\"vertical-align: top;\">{$out}</td></tr></table>\n";
					$out = $temp;
				}
				unset($lines);
			}

			return $out;
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
		 * @param $title Title, already escaped
		 * @param $help (optional) The identifier for the help link
		 */
		function printTitle($title, $help = null) {
			global $data, $lang;
			
			echo "<h2>";
			$this->printHelp($title, $help);
			echo "</h2>\n";
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
					echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"{$lang['applocale']}\" lang=\"{$lang['applocale']}\"";
					if (strcasecmp($lang['applangdir'], 'ltr') != 0) echo " dir=\"", htmlspecialchars($lang['applangdir']), "\"";
					echo ">\n";
				} else {
					echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
					echo "<html lang=\"{$lang['applocale']}\"";
					if (strcasecmp($lang['applangdir'], 'ltr') != 0) echo " dir=\"", htmlspecialchars($lang['applangdir']), "\"";
					echo ">\n";
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
		 * @param $tabs An associative array of tabs definitions, see printNav() for an example.
		 * @param $activetab The name of the tab to be highlighted.
		 */
		function printTabs($tabs, $activetab) {
			global $misc, $conf, $data, $lang;
			
			if (is_string($tabs)) {
				switch ($tabs) {
					case 'database':
					case 'schema':
						if ($data->hasSchemas() === false) {
							$this->printTabs($this->getNavTabs('database'),$activetab);
							$this->printTabs($this->getNavTabs('schema'),$activetab);
							$_SESSION['webdbLastTab']['database'] = $activetab;
							return;
						}
					default:
						$_SESSION['webdbLastTab'][$tabs] = $activetab;
						$tabs = $this->getNavTabs($tabs);
				}
			}
			
			echo "<table class=\"tabs\"><tr>\n";
			
			# FIXME: don't count hiden tags
			$width = round(100 / count($tabs)).'%';
			
			foreach ($tabs as $tab_id => $tab) {
				$active = ($tab_id == $activetab) ? ' active' : '';
				
				if (!isset($tab['hide']) || $tab['hide'] !== true) {
					$tablink = "<a href=\"" . $this->printVal($tab['url'], 'nbsp') . "\">{$tab['title']}</a>";
					
					echo "<td width=\"{$width}\" class=\"tab{$active}\">";
					
					if (isset($tab['help']))
						$this->printHelp($tablink, $tab['help']);
					else
						echo $tablink;
					
					echo "</td>\n";
				}
			}
			
			echo "</tr></table>\n";
		}

		/**
		 * Retreive the tab info for a specific tab bar.
		 * @param $section The name of the tab bar.
		 */
		function getNavTabs($section) {
			global $data, $lang, $conf;
			
			$databasevar = isset($_REQUEST['database']) ? 'database=' . urlencode($_REQUEST['database']) : '';
			$schemavar = isset($_REQUEST['schema']) ? '&schema=' . urlencode($_REQUEST['schema']) : '';
			$hide_advanced = ($conf['show_advanced'] === false);
			
			switch ($section) {
				case 'server':
					$hide_users = !$data->isSuperUser($_SESSION['webdbUsername']);
					return array (
						'databases' => array (
							'title' => $lang['strdatabases'],
							'url'   => "all_db.php",
							'help'  => 'pg.database',
						),
						'users' => array (
							'title' => $lang['strusers'],
							'url'   => "users.php",
							'hide'  => $hide_users,
							'help'  => 'pg.user',
						),
						'groups' => array (
							'title' => $lang['strgroups'],
							'url'   => "groups.php",
							'hide'  => $hide_users,
							'help'  => 'pg.group',
						),
						'tablespaces' => array (
							'title' => $lang['strtablespaces'],
							'url'   => "tablespaces.php",
							'hide'  => (!$data->hasTablespaces()),
							'help'  => 'pg.tablespace',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => "all_db.php?action=export",
							'hide'  => (!$this->isDumpEnabled()),
						),
					);

				case 'database':
					$vars = $databasevar . '&subject=database';
					return array (
						'schemas' => array (
							'title' => $lang['strschemas'],
							'url'   => "database.php?{$vars}",
							'hide'  => (!$data->hasSchemas()),
							'help'  => 'pg.schema',
						),
						'sql' => array (
							'title' => $lang['strsql'],
							'url'   => "database.php?{$vars}&action=sql",
							'help'  => 'pg.sql',
						),
						'find' => array (
							'title' => $lang['strfind'],
							'url'   => "database.php?{$vars}&action=find",
						),
						'variables' => array (
							'title' => $lang['strvariables'],
							'url'   => "database.php?{$vars}&action=variables",
							'hide'  => (!$data->hasVariables()),
							'help'  => 'pg.variable',
						),
						'processes' => array (
							'title' => $lang['strprocesses'],
							'url'   => "database.php?{$vars}&action=processes",
							'hide'  => (!$data->hasProcesses()),
							'help'  => 'pg.process',
						),
						'admin' => array (
							'title' => $lang['stradmin'],
							'url'   => "database.php?{$vars}&action=admin",
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => "privileges.php?{$vars}",
							'hide'  => (!isset($data->privlist['database'])),
							'help'  => 'pg.privilege',
						),
						'languages' => array (
							'title' => $lang['strlanguages'],
							'url'   => "languages.php?{$vars}",
							'hide'  => $hide_advanced,
							'help'  => 'pg.language',
						),
						'casts' => array (
							'title' => $lang['strcasts'],
							'url'   => "casts.php?{$vars}",
							'hide'  => ($hide_advanced || !$data->hasCasts()),
							'help'  => 'pg.cast',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => "database.php?{$vars}&action=export",
							'hide'  => (!$this->isDumpEnabled()),
						),
					);

				case 'schema':
					$vars = $databasevar . $schemavar . '&subject=schema';
					return array (
						'tables' => array (
							'title' => $lang['strtables'],
							'url'   => "tables.php?{$vars}",
							'help'  => 'pg.table',
						),
						'views' => array (
							'title' => $lang['strviews'],
							'url'   => "views.php?{$vars}",
							'help'  => 'pg.view',
						),
						'sequences' => array (
							'title' => $lang['strsequences'],
							'url'   => "sequences.php?{$vars}",
							'help'  => 'pg.sequence',
						),
						'functions' => array (
							'title' => $lang['strfunctions'],
							'url'   => "functions.php?{$vars}",
							'help'  => 'pg.function',
						),
						'domains' => array (
							'title' => $lang['strdomains'],
							'url'   => "domains.php?{$vars}",
							'hide'  => (!$data->hasDomains()),
							'help'  => 'pg.domain',
						),
						'aggregates' => array (
							'title' => $lang['straggregates'],
							'url'   => "aggregates.php?{$vars}",
							'hide'  => $hide_advanced,
							'help'  => 'pg.aggregate',
						),
						'types' => array (
							'title' => $lang['strtypes'],
							'url'   => "types.php?{$vars}",
							'hide'  => $hide_advanced,
							'help'  => 'pg.type',
						),
						'operators' => array (
							'title' => $lang['stroperators'],
							'url'   => "operators.php?{$vars}",
							'hide'  => $hide_advanced,
							'help'  => 'pg.operator',
						),
						'opclasses' => array (
							'title' => $lang['stropclasses'],
							'url'   => "opclasses.php?{$vars}",
							'hide'  => $hide_advanced,
							'help'  => 'pg.opclass',
						),
						'conversions' => array (
							'title' => $lang['strconversions'],
							'url'   => "conversions.php?{$vars}",
							'hide'  => ($hide_advanced || !$data->hasConversions()),
							'help'  => 'pg.conversion',
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => "privileges.php?{$vars}",
							'hide'  => (!$data->hasSchemas()),
							'help'  => 'pg.privilege',
						),
					);

				case 'table':
					$table = urlencode($_REQUEST['table']);
					$vars = $databasevar . $schemavar . "&table={$table}&subject=table";
					return array (
						'columns' => array (
							'title' => $lang['strcolumns'],
							'url'   => "tblproperties.php?{$vars}",
						),
						'indexes' => array (
							'title' => $lang['strindexes'],
							'url'   => "indexes.php?{$vars}",
							'help'  => 'pg.index',
						),
						'constraints' => array (
							'title' => $lang['strconstraints'],
							'url'   => "constraints.php?{$vars}",
							'help'  => 'pg.constraint',
						),
						'triggers' => array (
							'title' => $lang['strtriggers'],
							'url'   => "triggers.php?{$vars}",
							'help'  => 'pg.trigger',
						),
						'rules' => array (
							'title' => $lang['strrules'],
							'url'   => "rules.php?{$vars}",
							'help'  => 'pg.rule',
						),
						'info' => array (
							'title' => $lang['strinfo'],
							'url'   => "info.php?{$vars}",
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => "privileges.php?{$vars}",
							'help'  => 'pg.privilege',
						),
						'import' => array (
							'title' => $lang['strimport'],
							'url'   => "tblproperties.php?{$vars}&action=import",
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => "tblproperties.php?{$vars}&action=export",
						),
					);
				
				case 'view':
					$view = urlencode($_REQUEST['view']);
					$vars = $databasevar . $schemavar . "&view={$view}&subject=view";
					return array (
						'columns' => array (
							'title' => $lang['strcolumns'],
							'url'   => "viewproperties.php?{$vars}",
						),
						'definition' => array (
							'title' => $lang['strdefinition'],
							'url'   => "viewproperties.php?{$vars}&action=definition",
						),
						'rules' => array (
							'title' => $lang['strrules'],
							'url'   => "rules.php?{$vars}",
							'help'  => 'pg.rule',
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => "privileges.php?{$vars}",
							'help'  => 'pg.privilege',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => "viewproperties.php?{$vars}&action=export",
						),
					);
				
				case 'function':
					$funcnam = urlencode($_REQUEST['function']);
					$funcoid = urlencode($_REQUEST['function_oid']);
					$vars = $databasevar . $schemavar . "&function={$funcnam}&function_oid={$funcoid}&subject=function";
					return array (
						'definition' => array (
							'title' => $lang['strdefinition'],
							'url'   => "functions.php?{$vars}&action=properties",
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => "privileges.php?{$vars}",
						),
					);
				
				case 'popup':
					$vars = $databasevar;
					return array (
						'sql' => array (
							'title' => $lang['strsql'],
							'url'   => "sqledit.php?{$vars}&action=sql",
							'help'  => 'pg.sql',
						),
						'find' => array (
							'title' => $lang['strfind'],
							'url'   => "sqledit.php?{$vars}&action=find",
						),
					);
				
				default:
					return array();
			}
		}

		/**
		 * Get the URL for the last active tab of a particular tab bar.
		 */
		function getLastTabURL($section) {
			global $data;
			
			switch ($section) {
				case 'database':
				case 'schema':
					if ($data->hasSchemas() === false) {
						$section = 'database';
						$tabs = array_merge($this->getNavTabs('schema'), $this->getNavTabs('database'));
						break;
					}
				default:
					$tabs = $this->getNavTabs($section);
			}
			
			if (isset($_SESSION['webdbLastTab'][$section]) && isset($tabs[$_SESSION['webdbLastTab'][$section]]))
				$tab = $tabs[$_SESSION['webdbLastTab'][$section]];
			else
				$tab = reset($tabs);
			
			return isset($tab['url']) ? $tab['url'] : null;
		}

		/**
		 * Display a bread crumb trail.
		 */
		function printTrail($trail = array()) {
			global $lang;
			
			if (is_string($trail)) {
				$trail = $this->getTrail($trail);
			}
			
			echo "<div class=\"trail\"><table><tr>";
			
			foreach ($trail as $crumb) {
				echo "<td>";
				$crumblink = "<a";
				
				if (isset($crumb['url']))
					$crumblink .= ' href="' . $this->printVal($crumb['url'], 'nbsp') . '"';
				
				if (isset($crumb['title']))
					$crumblink .= " title=\"{$crumb['title']}\"";
				
				$crumblink .= ">" . htmlspecialchars($crumb['text']) . "</a>";
				
				if (isset($crumb['help']))
					$this->printHelp($crumblink, $crumb['help']);
				else
					echo $crumblink;
				
				echo "{$lang['strseparator']}";
				echo "</td>";
			}
			
			echo "</tr></table></div>\n";
		}

		/**
		 * Create a bread crumb trail of the object hierarchy.
		 * @param $object The type of object at the end of the trail.
		 */
		function getTrail($subject = null) {
			global $lang, $conf;
			
			$trail = array();
			$vars = '';
			$done = false;
			
			$trail['server'] = array(
				'title' => $lang['strserver'],
				'text'  => $conf['servers'][$_SESSION['webdbServerID']]['desc'],
				'url'   => 'redirect.php?section=server',
				'help'  => 'pg.server'
			);
			if ($subject == 'server') $done = true;
			
			if (isset($_REQUEST['database']) && !$done) {
				$vars = 'database='.urlencode($_REQUEST['database']).'&';
				$trail['database'] = array(
					'title' => $lang['strdatabase'],
					'text'  => $_REQUEST['database'],
					'url'   => "redirect.php?section=database&{$vars}",
					'help'  => 'pg.database'
				);
			}
			if ($subject == 'database') $done = true;
			
			if (isset($_REQUEST['schema']) && !$done) {
				$vars .= 'schema='.urlencode($_REQUEST['schema']).'&';
				$trail['schema'] = array(
					'title' => $lang['strschema'],
					'text'  => $_REQUEST['schema'],
					'url'   => "redirect.php?section=schema&{$vars}",
					'help'  => 'pg.schema'
				);
			}
			if ($subject == 'schema') $done = true;
			
			if (isset($_REQUEST['table']) && !$done) {
				$vars .= "section=table&table=".urlencode($_REQUEST['table']);
				$trail['table'] = array(
					'title' => $lang['strtable'],
					'text'  => $_REQUEST['table'],
					'url'   => "redirect.php?{$vars}",
					'help'  => 'pg.table'
				);
			} elseif (isset($_REQUEST['view']) && !$done) {
				$vars .= "section=view&view=".urlencode($_REQUEST['view']);
				$trail['view'] = array(
					'title' => $lang['strview'],
					'text'  => $_REQUEST['view'],
					'url'   => "redirect.php?{$vars}",
					'help'  => 'pg.view'
				);
			}
			if ($subject == 'table' || $subject == 'view') $done = true;
			
			if (!$done && !is_null($subject)) {
				switch ($subject) {
					case 'function':
						$vars .= "{$subject}_oid=".urlencode($_REQUEST[$subject.'_oid']).'&';
						$vars .= "section={$subject}&{$subject}=".urlencode($_REQUEST[$subject]);
						$trail[$subject] = array(
							'title' => $lang['str'.$subject],
							'text'  => $_REQUEST[$subject],
							'url'   => "redirect.php?{$vars}",
							'help'  => 'pg.function'
						);
						break;
					default:
						if (isset($_REQUEST[$subject])) {
							$trail[$_REQUEST[$subject]] = array(
								'title' => $lang['str'.$subject],
								'text'  => $_REQUEST[$subject],
								'help'  => 'pg.'.$subject	
							);
						}
				}
			}
			
			return $trail;
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
		 * Displays link to the context help.
		 * @param $str   - the string that the context help is related to (already escaped) 
		 * @param $help  - help section identifier
		 */
		function printHelp($str, $help) {
			global $lang, $data;
			
			echo $str;
			if ($help) {
				echo "<a class=\"help\" href=\"";
				echo htmlspecialchars("help.php?help=".urlencode($help));
				echo "\" title=\"{$lang['strhelp']}\" target=\"phppgadminhelp\">{$lang['strhelpicon']}</a>";
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

		function printUrlVars(&$vars, &$fields) {
			foreach ($vars as $var => $varfield) {
				echo "{$var}=", urlencode($fields[$varfield]), "&amp;";
			}
		}
		
		/**
		 * Display a table of data.
		 * @param $tabledata A set of data to be formatted, as returned by $data->getDatabases() etc.
		 * @param $columns   An associative array of columns to be displayed:
		 *			$columns = array(
		 *				column_id => array(
		 *					'title' => Column heading,
		 *					'field' => Field name for $tabledata->f[...],
		 *					'help'  => Help page for this column,
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
				
				if (isset($columns['comment'])) {
					// Uncomment this for clipped comments.
					// TODO: This should be a user option.
					//$columns['comment']['params']['clip'] = true;
				}
				
				echo "<table>\n";
				echo "<tr>\n";
				// Display column headings
				foreach ($columns as $column_id => $column) {
					switch ($column_id) {
						case 'actions':
							echo "<th class=\"data\" colspan=\"", count($actions), "\">{$column['title']}</th>\n";
							break;
						default:
							echo "<th class=\"data\">";
							if (isset($column['help']))
								$this->printHelp($column['title'], $column['help']);
							else
								echo $column['title'];
							echo "</th>\n";
							break;
					}
				}
				echo "</tr>\n";
				
				// Display table rows
				$i = 0;
				while (!$tabledata->EOF) {
					$id = ($i % 2) + 1;
					
					unset($alt_actions);
					if (!is_null($pre_fn)) $alt_actions = $pre_fn($tabledata, $actions);
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
										$misc->printUrlVars($action['vars'], $tabledata->f);
										echo "\">{$action['title']}</a></td>";
									}
								}
								break;
							default;
								echo "<td class=\"data{$id}\">";
								if (isset($column['url'])) {
									echo "<a href=\"{$column['url']}";
									$misc->printUrlVars($column['vars'], $tabledata->f);
									echo "\">";
								}
								
								$type = isset($column['type']) ? $column['type'] : null;
								$params = isset($column['params']) ? $column['params'] : array();
								echo $misc->printVal($tabledata->f[$column['field']], $type, $params);
								
								if (isset($column['url'])) echo "</a>";

								echo "</td>\n";
								break;
						}
					}
					echo "</tr>\n";
					
					$tabledata->moveNext();
					$i++;
				}
				
				echo "</table>\n";
				
				return true;
			} else {
				if (!is_null($nodata)) {
					echo "<p>{$nodata}</p>\n";
				}
				return false;
			}
		}
		
		/**
		 * Function to escape command line parameters
		 * @param $str The string to escape
		 * @return The escaped string
		 */
		function escapeShellArg($str) {
			global $data, $lang;
			
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				// Due to annoying PHP bugs, shell arguments cannot be escaped
				// (command simply fails), so we cannot allow complex objects
				// to be dumped.
				if (ereg('^[_.[:alnum:]]+$', $str))
					return $str;
				else {
					echo $lang['strcannotdumponwindows'];
					exit;
				}				
			}
			else	
				return escapeshellarg($str);
		}

		/**
		 * Function to escape command line programs
		 * @param $str The string to escape
		 * @return The escaped string
		 */
		function escapeShellCmd($str) {
			global $data;
			
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				$data->fieldClean($str);
				return '"' . $str . '"';
			}
			else	
				return escapeshellcmd($str);
		}
	}
?>
