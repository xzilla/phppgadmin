<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.113.2.3 2005/11/19 09:17:23 chriskl Exp $
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
			$info = $this->getServerInfo();
			return !empty($info[$all ? 'pg_dumpall_path' : 'pg_dump_path']);
		}

		/**
		 * Sets the href tracking variable
		 */
		function setHREF() {
			$this->href = $this->getHREF();
		}
		
		/**
		 * Get a href query string, excluding objects below the given object type (inclusive)
		 */
		function getHREF($exclude_from = null) {
			$href = '';
			if (isset($_REQUEST['server']) && $exclude_from != 'server') {
				$href .= 'server=' . urlencode($_REQUEST['server']);
				if (isset($_REQUEST['database']) && $exclude_from != 'database') {
					$href .= '&amp;database=' . urlencode($_REQUEST['database']);
					if (isset($_REQUEST['schema']) && $exclude_from != 'schema') {
						$href .= '&amp;schema=' . urlencode($_REQUEST['schema']);
					}
				}
			}
			return $href;
		}

		/**
		 * Sets the form tracking variable
		 */
		function setForm() {
			$this->form = '';
			if (isset($_REQUEST['server'])) {
				$this->form .= "<input type=\"hidden\" name=\"server\" value=\"" . htmlspecialchars($_REQUEST['server']) . "\" />\n";
				if (isset($_REQUEST['database'])) {
					$this->form .= "<input type=\"hidden\" name=\"database\" value=\"" . htmlspecialchars($_REQUEST['database']) . "\" />\n";
					if (isset($_REQUEST['schema'])) {
						$this->form .= "<input type=\"hidden\" name=\"schema\" value=\"" . htmlspecialchars($_REQUEST['schema']) . "\" />\n";
					}
				}
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
			global $lang, $conf, $data;
			
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
					$out = $data->escapeBytea($str);
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
		function getDatabaseAccessor($database, $server_id = null) {
			global $lang, $conf, $misc;
			
			$server_info = $this->getServerInfo($server_id);

			// Perform extra security checks if this config option is set
			if ($conf['extra_login_security']) {
				// Disallowed logins if extra_login_security is enabled.
				// These must be lowercase.
				$bad_usernames = array('pgsql', 'postgres', 'root', 'administrator');
				
				$username = strtolower($server_info['username']);
				
				if ($server_info['password'] == '' || in_array($username, $bad_usernames)) {
					unset($_SESSION['webdbLogin'][$_REQUEST['server']]);
					$msg = $lang['strlogindisallowed'];
					include('./login.php');
					exit;
				}
			}
			
			// Create the connection object and make the connection
			$_connection = new Connection(
				$server_info['host'],
				$server_info['port'],
				$server_info['username'],
				$server_info['password'],
				$database
			);

			// Get the name of the database driver we need to use.
			// The description of the server is returned in $platform.
			$_type = $_connection->getDriver($platform);
			if ($_type === null) {
				printf($lang['strpostgresqlversionnotsupported'], $postgresqlMinVer);
				exit;
			}
			$this->setServerInfo('platform', $platform, $server_id);
			
			// Create a database wrapper class for easy manipulation of the
			// connection.
			include_once('./classes/database/' . $_type . '.php');
			$data =& new $_type($_connection->conn);
			$data->platform = $_connection->platform;

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
				header("Content-Type: text/html; charset=" . $lang['appcharset']);
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
			echo "<script type=\"text/javascript\">\n";
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
							$this->printTabs($this->getNavTabs('database'), $activetab);
							$this->printTabs($this->getNavTabs('schema'), $activetab);
							$_SESSION['webdbLastTab']['database'] = $activetab;
							return;
						}
					default:
						$_SESSION['webdbLastTab'][$tabs] = $activetab;
						$tabs = $this->getNavTabs($tabs);
				}
			}
			
			echo "<table class=\"tabs\"><tr>\n";
			
			# FIXME: don't count hidden tags
			$width = round(100 / count($tabs)).'%';
			
			foreach ($tabs as $tab_id => $tab) {
				$active = ($tab_id == $activetab) ? ' active' : '';
				
				if (!isset($tab['hide']) || $tab['hide'] !== true) {
					$tablink = "<a" . $this->printActionUrl($tab, $_REQUEST, 'href') . ">{$tab['title']}</a>";
					
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
			global $data, $lang, $conf, $slony;

			$hide_advanced = ($conf['show_advanced'] === false);
			
			switch ($section) {
				case 'root':
					return array (
						'intro' => array (
							'title' => $lang['strintroduction'],
							'url'   => "intro.php",
						),
						'servers' => array (
							'title' => $lang['strservers'],
							'url'   => "servers.php",
						),
					);

				case 'server':
					$server_info = $this->getServerInfo();
					$hide_users = !$data->isSuperUser($server_info['username']);
					return array (
						'databases' => array (
							'title' => $lang['strdatabases'],
							'url'   => 'all_db.php',
							'urlvars' => array('subject' => 'server'),
							'help'  => 'pg.database',
						),
						'users' => array (
							'title' => $lang['strusers'],
							'url'   => 'users.php',
							'urlvars' => array('subject' => 'server'),
							'hide'  => $hide_users,
							'help'  => 'pg.user',
						),
						'groups' => array (
							'title' => $lang['strgroups'],
							'url'   => 'groups.php',
							'urlvars' => array('subject' => 'server'),
							'hide'  => $hide_users,
							'help'  => 'pg.group',
						),
						'account' => array (
							'title' => $lang['straccount'],
							'url'   => 'users.php',
							'urlvars' => array('subject' => 'server', 'action' => 'account'),
							'hide'  => !$hide_users,
							'help'  => 'pg.user',
						),
						'tablespaces' => array (
							'title' => $lang['strtablespaces'],
							'url'   => 'tablespaces.php',
							'urlvars' => array('subject' => 'server'),
							'hide'  => (!$data->hasTablespaces()),
							'help'  => 'pg.tablespace',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => 'all_db.php',
							'urlvars' => array('subject' => 'server', 'action' => 'export'),
							'hide'  => (!$this->isDumpEnabled()),
						),
						'reports' => array (
							'title' => $lang['strreports'],
							'url'   => 'reports.php',
							'urlvars' => array('subject' => 'server'),
							'hide' => !$conf['show_reports']
						),
					);

				case 'database':				
					$tabs = array (
						'schemas' => array (
							'title' => $lang['strschemas'],
							'url'   => 'schemas.php',
							'urlvars' => array('subject' => 'database'),
							'hide'  => (!$data->hasSchemas()),
							'help'  => 'pg.schema',
						),
						'sql' => array (
							'title' => $lang['strsql'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'sql'),
							'help'  => 'pg.sql',
							'tree'  => false,
						),
						'find' => array (
							'title' => $lang['strfind'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'find'),
							'tree'  => false,
						),
						'variables' => array (
							'title' => $lang['strvariables'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'variables'),
							'hide'  => (!$data->hasVariables()),
							'help'  => 'pg.variable',
							'tree'  => false,
						),
						'processes' => array (
							'title' => $lang['strprocesses'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'processes'),
							'hide'  => (!$data->hasProcesses()),
							'help'  => 'pg.process',
							'tree'  => false,
						),
						'admin' => array (
							'title' => $lang['stradmin'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'admin'),
							'tree'  => false,
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => 'privileges.php',
							'urlvars' => array('subject' => 'database'),
							'hide'  => (!isset($data->privlist['database'])),
							'help'  => 'pg.privilege',
							'tree'  => false,
						),
						'languages' => array (
							'title' => $lang['strlanguages'],
							'url'   => 'languages.php',
							'urlvars' => array('subject' => 'database'),
							'hide'  => $hide_advanced,
							'help'  => 'pg.language',
						),
						'casts' => array (
							'title' => $lang['strcasts'],
							'url'   => 'casts.php',
							'urlvars' => array('subject' => 'database'),
							'hide'  => ($hide_advanced || !$data->hasCasts()),
							'help'  => 'pg.cast',
						),
						'slony' => array (
							'title' => 'Slony',
							'url'   => 'plugin_slony.php',
							'urlvars' => array('subject' => 'database', 'action' => 'clusters_properties'),
							'hide'  => !isset($slony),
							'help'  => '',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => 'database.php',
							'urlvars' => array('subject' => 'database', 'action' => 'export'),
							'hide'  => (!$this->isDumpEnabled()),
							'tree'  => false,
						),
					);
					return $tabs;
				case 'schema':
					return array (
						'tables' => array (
							'title' => $lang['strtables'],
							'url'   => 'tables.php',
							'urlvars' => array('subject' => 'schema'),
							'help'  => 'pg.table',
							'icon'  => 'tables',
						),
						'views' => array (
							'title' => $lang['strviews'],
							'url'   => 'views.php',
							'urlvars' => array('subject' => 'schema'),
							'help'  => 'pg.view',
							'icon'  => 'views',
						),
						'sequences' => array (
							'title' => $lang['strsequences'],
							'url'   => 'sequences.php',
							'urlvars' => array('subject' => 'schema'),
							'help'  => 'pg.sequence',
							'icon'  => 'sequences',
						),
						'functions' => array (
							'title' => $lang['strfunctions'],
							'url'   => 'functions.php',
							'urlvars' => array('subject' => 'schema'),
							'help'  => 'pg.function',
							'icon'  => 'functions',
						),
						'domains' => array (
							'title' => $lang['strdomains'],
							'url'   => 'domains.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => (!$data->hasDomains()),
							'help'  => 'pg.domain',
							'icon'  => 'domains',
						),
						'aggregates' => array (
							'title' => $lang['straggregates'],
							'url'   => 'aggregates.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => $hide_advanced,
							'help'  => 'pg.aggregate',
							'icon'  => 'functions',
						),
						'types' => array (
							'title' => $lang['strtypes'],
							'url'   => 'types.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => $hide_advanced,
							'help'  => 'pg.type',
							'icon'  => 'types',
						),
						'operators' => array (
							'title' => $lang['stroperators'],
							'url'   => 'operators.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => $hide_advanced,
							'help'  => 'pg.operator',
							'icon'  => 'operators',
						),
						'opclasses' => array (
							'title' => $lang['stropclasses'],
							'url'   => 'opclasses.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => $hide_advanced,
							'help'  => 'pg.opclass',
							'icon'  => 'operators',
						),
						'conversions' => array (
							'title' => $lang['strconversions'],
							'url'   => 'conversions.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => ($hide_advanced || !$data->hasConversions()),
							'help'  => 'pg.conversion',
							'icon'  => 'types',
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => 'privileges.php',
							'urlvars' => array('subject' => 'schema'),
							'hide'  => (!$data->hasSchemas()),
							'help'  => 'pg.privilege',
							'tree'  => false,
						),
					);

				case 'table':
					return array (
						'columns' => array (
							'title' => $lang['strcolumns'],
							'url'   => 'tblproperties.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
						),
						'indexes' => array (
							'title' => $lang['strindexes'],
							'url'   => 'indexes.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
							'help'  => 'pg.index',
						),
						'constraints' => array (
							'title' => $lang['strconstraints'],
							'url'   => 'constraints.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
							'help'  => 'pg.constraint',
						),
						'triggers' => array (
							'title' => $lang['strtriggers'],
							'url'   => 'triggers.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
							'help'  => 'pg.trigger',
						),
						'rules' => array (
							'title' => $lang['strrules'],
							'url'   => 'rules.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
							'help'  => 'pg.rule',
						),
						'info' => array (
							'title' => $lang['strinfo'],
							'url'   => 'info.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => 'privileges.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table')),
							'help'  => 'pg.privilege',
						),
						'import' => array (
							'title' => $lang['strimport'],
							'url'   => 'tblproperties.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table'), 'action' => 'import'),
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => 'tblproperties.php',
							'urlvars' => array('subject' => 'table', 'table' => field('table'), 'action' => 'export'),
						),
					);
				
				case 'view':
					return array (
						'columns' => array (
							'title' => $lang['strcolumns'],
							'url'   => 'viewproperties.php',
							'urlvars' => array('subject' => 'view', 'view' => field('view')),
						),
						'definition' => array (
							'title' => $lang['strdefinition'],
							'url'   => 'viewproperties.php',
							'urlvars' => array('subject' => 'view', 'view' => field('view'), 'action' => 'definition'),
						),
						'rules' => array (
							'title' => $lang['strrules'],
							'url'   => 'rules.php',
							'urlvars' => array('subject' => 'view', 'view' => field('view')),
							'help'  => 'pg.rule',
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => 'privileges.php',
							'urlvars' => array('subject' => 'view', 'view' => field('view')),
							'help'  => 'pg.privilege',
						),
						'export' => array (
							'title' => $lang['strexport'],
							'url'   => 'viewproperties.php',
							'urlvars' => array('subject' => 'view', 'view' => field('view'), 'action' => 'export'),
						),
					);
				
				case 'function':
					return array (
						'definition' => array (
							'title' => $lang['strdefinition'],
							'url'   => 'functions.php',
							'urlvars' => array(
									'subject' => 'function',
									'function' => field('function'),
									'function_oid' => field('function_oid'),
									'action' => 'properties',
								),
						),
						'privileges' => array (
							'title' => $lang['strprivileges'],
							'url'   => 'privileges.php',
							'urlvars' => array(
									'subject' => 'function',
									'function' => field('function'),
									'function_oid' => field('function_oid'),
								),
						),
					);
				
				case 'popup':
					return array (
						'sql' => array (
							'title' => $lang['strsql'],
							'url'   => 'sqledit.php',
							'urlvars' => array('subject' => 'schema', 'action' => 'sql'),
							'help'  => 'pg.sql',
						),
						'find' => array (
							'title' => $lang['strfind'],
							'url'   => 'sqledit.php',
							'urlvars' => array('subject' => 'schema', 'action' => 'find'),
						),
					);
				
				case 'slony_cluster':
					return array (
						'properties' => array (
							'title' => $lang['strproperties'],
							'url'   => 'plugin_slony.php',
							'urlvars' => array(
									'subject' => 'slony_cluster',
									'action' => 'cluster_properties',
									'slony_cluster' => field('slony_cluster')
								),
							'help'  => '',
						),
						'nodes' => array (
							'title' => $lang['strnodes'],
							'url'   => 'plugin_slony.php',
							'urlvars' => array(
									'subject' => 'slony_cluster',
									'action' => 'nodes_properties',
									'slony_cluster' => field('slony_cluster')
								),
							'help'  => '',
						),
						'sets' => array (
							'title' => $lang['strrepsets'],
							'url'   => 'plugin_slony.php',
							'urlvars' => array(
									'subject' => 'slony_cluster',
									'action' => 'sets_properties',
									'slony_cluster' => field('slony_cluster')
								),
							'help'  => '',
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

		function printTopbar() {
			global $lang, $conf, $appName, $appVersion, $appLangFiles;
			
			$server_info = $this->getServerInfo();
			
			echo "<div class=\"topbar\"><table width=\"100%\"><tr><td>";
			
			if ($server_info && isset($server_info['platform']) && isset($server_info['username'])) {
				echo sprintf($lang['strtopbar'],
					'<span class="platform">'.htmlspecialchars($server_info['platform']).'</span>',
					'<span class="host">'.htmlspecialchars($server_info['host']).'</span>',
					'<span class="port">'.htmlspecialchars($server_info['port']).'</span>',
					'<span class="username">'.htmlspecialchars($server_info['username']).'</span>',
					'<span class="date">'.date($lang['strtimefmt']).'</span>');
			} else {
				echo "<span class=\"appname\">$appName</span> <span class=\"version\">$appVersion</span>";
			}
			
			echo "</td>";

			if (isset($_REQUEST['server'])) {
				$url = "sqledit.php?{$this->href}&amp;action=";
				
				$window_id = htmlspecialchars('sqledit:'.$_REQUEST['server']);
				
				echo "<td align=\"right\">";

				echo "<a class=\"toplink\" href=\"{$url}sql\" target=\"sqledit\" onclick=\"window.open('{$url}sql','{$window_id}','toolbar=no,width=600,height=400,resizable=yes,scrollbars=no').focus(); return false;\">{$lang['strsql']}</a> | ";
				
				echo "<a class=\"toplink\" href=\"{$url}find\" target=\"sqledit\" onclick=\"window.open('{$url}find','{$window_id}','toolbar=no,width=600,height=400,resizable=yes,scrollbars=no').focus(); return false;\">{$lang['strfind']}</a> | ";
				
				echo "<a class=\"toplink\" href=\"servers.php?action=logout&amp;logoutServer=".htmlspecialchars($server_info['host']).":".htmlspecialchars($server_info['port'])."\">{$lang['strlogout']}</a>";
				
				echo "</td>";
			}
/*
			echo "<td align=\"right\" width=\"1%\">";
			
			echo "<form method=\"get\"><select name=\"language\" onchange=\"this.form.submit()\">\n";
			$language = isset($_SESSION['webdbLanguage']) ? $_SESSION['webdbLanguage'] : 'english';
			foreach ($appLangFiles as $k => $v) {
				echo "<option value=\"{$k}\"",
					($k == $language) ? ' selected="selected"' : '',
					">{$v}</option>\n";
			}
			echo "</select>\n";
			echo "<noscript><input type=\"submit\" value=\"Set Language\"></noscript>\n";
			foreach ($_GET as $key => $val) {
				if ($key == 'language') continue;
				echo "<input type=\"hidden\" name=\"$key\" value=\"", htmlspecialchars($val), "\" />\n";
			}
			echo "</form>\n";
			
			echo "</td>";
*/
			echo "</tr></table></div>\n";
		}
		
		/**
		 * Display a bread crumb trail.
		 */
		function printTrail($trail = array()) {
			global $lang;
			
			$this->printTopbar();
			
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
			global $lang, $conf, $data, $appName;
			
			$trail = array();
			$vars = '';
			$done = false;
			
			$trail['root'] = array(
				'text'  => $appName,
				'url'   => 'redirect.php?subject=root',
			);
			
			if ($subject == 'root') $done = true;
			
			if (!$done) {
				$vars = 'server='.urlencode($_REQUEST['server']).'&';
				$server_info = $this->getServerInfo();
				$trail['server'] = array(
					'title' => $lang['strserver'],
					'text'  => $server_info['desc'],
					'url'   => "redirect.php?subject=server&{$vars}",
					'help'  => 'pg.server'
				);
			}
			if ($subject == 'server') $done = true;
			
			if (isset($_REQUEST['database']) && !$done) {
				$vars .= 'database='.urlencode($_REQUEST['database']).'&';
				$trail['database'] = array(
					'title' => $lang['strdatabase'],
					'text'  => $_REQUEST['database'],
					'url'   => "redirect.php?subject=database&{$vars}",
					'help'  => 'pg.database'
				);
			}
			if ($subject == 'database') $done = true;
			
			if (isset($_REQUEST['schema']) && !$done) {
				$vars .= 'schema='.urlencode($_REQUEST['schema']).'&';
				$trail['schema'] = array(
					'title' => $lang['strschema'],
					'text'  => $_REQUEST['schema'],
					'url'   => "redirect.php?subject=schema&{$vars}",
					'help'  => 'pg.schema'
				);
			}
			if ($subject == 'schema') $done = true;
			
			if (isset($_REQUEST['slony_cluster']) && !$done) {
				$vars .= 'slony_cluster='.urlencode($_REQUEST['slony_cluster']).'&';
				$trail['slony_cluster'] = array(
					'title' => 'Slony Cluster',
					'text'  => $_REQUEST['slony_cluster'],
					'url'   => "redirect.php?subject=slony_cluster&{$vars}",
					'help'  => 'sl.cluster'
				);
			}
			if ($subject == 'slony_cluster') $done = true;
			
			if (isset($_REQUEST['table']) && !$done) {
				$vars .= "subject=table&table=".urlencode($_REQUEST['table']);
				$trail['table'] = array(
					'title' => $lang['strtable'],
					'text'  => $_REQUEST['table'],
					'url'   => "redirect.php?{$vars}",
					'help'  => 'pg.table'
				);
			} elseif (isset($_REQUEST['view']) && !$done) {
				$vars .= "subject=view&view=".urlencode($_REQUEST['view']);
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
						$vars .= "subject={$subject}&{$subject}=".urlencode($_REQUEST[$subject]);
						$trail[$subject] = array(
							'title' => $lang['str'.$subject],
							'text'  => $_REQUEST[$subject],
							'url'   => "redirect.php?{$vars}",
							'help'  => 'pg.function'
						);
						break;
					case 'slony_node':
						$vars .= 'no_id='.urlencode($_REQUEST['no_id']).'&no_name='.urlencode($_REQUEST['no_name']);
						$trail[$subject] = array(
							'title' => 'Slony Node',
							'text'  => $_REQUEST['no_name'],
							'url'   => "redirect.php?{$vars}",
							'help'  => 'sl.'.$subject
						);
						break;
					case 'slony_set':
						$vars .= "{$subject}_id=".urlencode($_REQUEST[$subject]).'&';
						$vars .= "subject={$subject}&{$subject}=".urlencode($_REQUEST[$subject]);
						$trail[$subject] = array(
							'title' => $lang['str'.$subject],
							'text'  => $_REQUEST[$subject],
							'url'   => "redirect.php?{$vars}",
							'help'  => 'sl.'.$subject
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
				echo htmlspecialchars("help.php?help=".urlencode($help)."&server=".urlencode($_REQUEST['server']));
				echo "\" title=\"{$lang['strhelp']}\" target=\"phppgadminhelp\">{$lang['strhelpicon']}</a>";
			}
		}
	
		/** 
		 * Outputs JavaScript to set default focus
		 * @param $object eg. forms[0].username
		 */
		function setFocus($object) {
			echo "<script type=\"text/javascript\">\n";
			echo "<!--\n";
			echo "   document.{$object}.focus();\n";
			echo "-->\n";
			echo "</script>\n";
		}
		
		/**
		 * Outputs JavaScript to set the name of the browser window.
		 * @param $name the window name
		 * @param $addServer if true (default) then the server id is
		 *        attached to the name.
		 */
		function setWindowName($name, $addServer = true) {
			echo "<script type=\"text/javascript\">\n<!--\n";
			echo "   window.name = '{$name}", ($addServer ? ':'.htmlspecialchars($_REQUEST['server']) : ''), "';\n";
			echo "-->\n</script>\n";
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
		 * Display a URL given an action associative array.
		 * @param $action An associative array of the follow properties:
		 *			'url'  => The first part of the URL (before the ?)
		 *			'urlvars' => Associative array of (URL variable => field name)
		 *						these are appended to the URL
		 *			'urlfn' => Function to apply to URL before display
		 * @param $fields Field data from which 'urlfield' and 'vars' are obtained.
		 * @param $attr If supplied then the URL will be quoted and prefixed with
		 *				'$attr='.
		 */
		function printActionUrl(&$action, &$fields, $attr = null) {
			$url = value($action['url'], $fields);
			
			if ($url === false) return '';
			
			if (!empty($action['urlvars'])) {
				$urlvars = value($action['urlvars'], $fields);
			} else {
				$urlvars = array();
			}
			
			if (isset($urlvars['subject'])) {
				$subject = value($urlvars['subject'], $fields);
				if (isset($_REQUEST['server']) && $subject != 'root') {
					$urlvars['server'] = $_REQUEST['server'];
					if (isset($_REQUEST['database']) && $subject != 'server') {
						$urlvars['database'] = $_REQUEST['database'];
						if (isset($_REQUEST['schema']) && $subject != 'database') {
							$urlvars['schema'] = $_REQUEST['schema'];
						}
					}
				}
			}
			
			$sep = '?';
			foreach ($urlvars as $var => $varfield) {
				$url .= $sep . value_url($var, $fields) . '=' . value_url($varfield, $fields);
				$sep = '&';
			}
			
			$url = htmlentities($url);
			
			if ($attr !== null && $url != '')
				return ' '.$attr.'="'.$url.'"';
			else
				return $url;
		}

		function getRequestVars($subject = '') {
			$v = array();
			if (!empty($subject))
				$v['subject'] = $subject;
			if (isset($_REQUEST['server']) && $subject != 'root') {
				$v['server'] = $_REQUEST['server'];
				if (isset($_REQUEST['database']) && $subject != 'server') {
					$v['database'] = $_REQUEST['database'];
					if (isset($_REQUEST['schema']) && $subject != 'database') {
						$v['schema'] = $_REQUEST['schema'];
					}
				}
			}
			return $v;
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
									if (isset($action['disable']) && $action['disable'] === true) {
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
								if (isset($tabledata->f[$column['field']])) {
									if (isset($column['url'])) {
										echo "<a href=\"{$column['url']}";
										$misc->printUrlVars($column['vars'], $tabledata->f);
										echo "\">";
									}
								
									$type = isset($column['type']) ? $column['type'] : null;
									$params = isset($column['params']) ? $column['params'] : array();
									echo $misc->printVal($tabledata->f[$column['field']], $type, $params);
								}
								
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
		
		/** Produce XML data for the browser tree
		 * @param $treedata A set of records to populate the tree.
		 * @param $attrs Attributes for tree items
		 *        'text' - the text for the tree node
		 *        'icon' - an icon for node
		 *        'openIcon' - an alternative icon when the node is expanded
		 *        'toolTip' - tool tip text for the node
		 *        'action' - URL to visit when single clicking the node
		 *        'branch' - URL for child nodes (tree XML)
		 *        'expand' - the action to return XML for the subtree
		 *        'nodata' - message to display when node has no children
		 *        'nohead' - suppress headers and opening <tree> tag
		 *        'nofoot' - suppress closing </tree> tag
		 */
		function printTreeXML(&$treedata, &$attrs) {
			global $conf, $lang;
			
			if (!isset($attrs['nohead']) || $attrs['nohead'] === false) {
				header("Content-Type: text/xml");
				header("Cache-Control: no-cache");
				
				echo "<?xml version=\"1.0\"?>\n";
				
				echo "<tree>\n";
			}
			
			if ($treedata->recordCount() > 0) {
				while (!$treedata->EOF) {
					$rec =& $treedata->f;
					
					echo "<tree";
					echo value_xml_attr('text', $attrs['text'], $rec);
					echo value_xml_attr('action', $attrs['action'], $rec);
					echo value_xml_attr('src', $attrs['branch'], $rec);
					
					$icon = $this->icon(value($attrs['icon'], $rec));
					echo value_xml_attr('icon', $icon, $rec);
					
					if (!empty($attrs['openIcon'])) {
						$icon = $this->icon(value($attrs['openIcon'], $rec));
					}
					echo value_xml_attr('openIcon', $icon, $rec);
					
					echo value_xml_attr('toolTip', $attrs['toolTip'], $rec);
					
					echo "/>\n";
					
					$treedata->moveNext();
				}
			} else {
				$msg = isset($attrs['nodata']) ? $attrs['nodata'] : $lang['strnoobjects'];
				echo "<tree text=\"{$msg}\" onaction=\"this.parentNode.reload()\" icon=\"", $this->icon('error'), "\"/>\n";
			}
			
			if (!isset($attrs['nofoot']) || $attrs['nofoot'] === false) {
				echo "</tree>\n";
			}
		}
		
		function adjustTabsForTree(&$tabs) {
			include_once('./classes/ArrayRecordSet.php');
			
			foreach ($tabs as $i => $tab) {
				if ((isset($tab['hide']) && $tab['hide'] === true) || (isset($tab['tree']) && $tab['tree'] === false)) {
					unset($tabs[$i]);
				}
			}
			return new ArrayRecordSet($tabs);
		}
		
		function icon($icon) {
			global $conf;
			$path = "images/themes/{$conf['theme']}/{$icon}";
			if (file_exists($path.'.png')) return $path.'.png';
			if (file_exists($path.'.gif')) return $path.'.gif';
			$path = "images/themes/default/{$icon}";
			if (file_exists($path.'.png')) return $path.'.png';
			if (file_exists($path.'.gif')) return $path.'.gif';
			return '';
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
		
		/**
		 * Get list of servers
		 * @param $recordset return as RecordSet suitable for printTable if true,
		 *                   otherwise just return an array.
		 */
		function getServers($recordset = false) {
			global $conf;
			
			$srvs = isset($_SESSION['webdbLogin']) && is_array($_SESSION['webdbLogin']) ? $_SESSION['webdbLogin'] : array();

			foreach($conf['servers'] as $idx => $info) {
				$server_id = $info['host'].':'.$info['port'];
				
				if (!isset($srvs[$server_id])) {
					$srvs[$server_id] = $info;
				}
				$srvs[$server_id]['id'] = $server_id;
			}
			
			function _cmp_desc($a, $b) {
				return strcmp($a['desc'], $b['desc']);
			}
			uasort($srvs, '_cmp_desc');
			
			if ($recordset) {
				include_once('./classes/ArrayRecordSet.php');
				return new ArrayRecordSet($srvs);
			}
			return $srvs;
		}
		
		/**
		 * Get information on a server.
		 * If the parameter isn't supplied then the currently
		 * connected server is returned.
		 * @param $server_id A server identifier (host:port)
		 * @return An associative array of server properties
		 */
		function getServerInfo($server_id = null) {
			global $conf, $_reload_browser;

			if ($server_id === null && isset($_REQUEST['server']))
				$server_id = $_REQUEST['server'];
			
			// Check for the server in the logged-in list
			if (isset($_SESSION['webdbLogin'][$server_id]))
				return $_SESSION['webdbLogin'][$server_id];
			
			// Otherwise, look for it in the conf file
			foreach($conf['servers'] as $idx => $info) {
				if ($server_id == $info['host'].':'.$info['port']) {
					// Automatically use shared credentials if available
					if (!isset($info['username']) && isset($_SESSION['sharedUsername'])) {
						$info['username'] = $_SESSION['sharedUsername'];
						$info['password'] = $_SESSION['sharedPassword'];
						$_reload_browser = true;
						$this->setServerInfo(null, $info, $server_id);
					}
					
					return $info;
				}
			}
			
			return null;
		}
		
		/**
		 * Set server information.
		 * @param $key parameter name to set, or null to replace all
		 *             params with the assoc-array in $value.
		 * @param $value the new value, or null to unset the parameter
		 * @param $server_id the server identifier, or null for current
		 *                   server.
		 */
		function setServerInfo($key, $value, $server_id = null)
		{
			if ($server_id === null && isset($_REQUEST['server']))
				$server_id = $_REQUEST['server'];
			
			if ($key === null) {
				if ($value === null)
					unset($_SESSION['webdbLogin'][$server_id]);
				else
					$_SESSION['webdbLogin'][$server_id] = $value;
			} else {
				if ($value === null)
					unset($_SESSION['webdbLogin'][$server_id][$key]);
				else
					$_SESSION['webdbLogin'][$server_id][$key] = $value;
			}
		}
	}
?>
