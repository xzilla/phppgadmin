<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.41 2003/08/12 08:18:53 chriskl Exp $
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
		 * Sets the href tracking variable
		 */
		function setHREF() {
			$this->href = '';
			if (isset($_REQUEST['database'])) {
				$this->href .= 'database=' . urlencode($_REQUEST['database']);
				if (isset($_REQUEST['schema']))
					$this->href .= '&schema=' . urlencode($_REQUEST['schema']);
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
			else {
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
						if (strstr($str, '  ') || strstr($str, "\t") || strstr($str, "\n ") || ereg('^[ ]', $str)) {
							$str = str_replace(' ', '&nbsp;', htmlspecialchars($str));
							// Replace tabs with 8 spaces
							$str = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $str);
							return nl2br($str);
						}
						else
							return nl2br(htmlspecialchars($str));					
					}						
			}
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
		 * Print out a message
		 * @param $msg The message to print
		 */
		function printMsg($msg) {
			if ($msg != '') echo "<p class=\"message\">{$msg}</p>\n";
		}

		/**
		 * Creates a database accessor
		 */
		function &getDatabaseAccessor($host, $port, $database, $username, $password) {
			global $conf;
			
			$desc = null;
			$type = $this->getDriver($host, $port, $username, $password, 
							 $conf['servers'][$_SESSION['webdbServerID']]['type'], 
							 $conf['servers'][$_SESSION['webdbServerID']]['defaultdb'], $desc);
			include_once('classes/database/' . $type . '.php');
			$localData = new $type(	$host,
											$port,
											$database,
											$username,
											$password);
			
			return $localData;
		}

		/**
		 * Gets the name of the correct database driver to use
		 * @param $host The hostname to connect to
		 * @param $port The port to connect to
		 * @param $user The username to use
		 * @param $password The password to use
		 * @param $type The ADODB database type name.
		 * @param $database The default database to which to connect
		 * @param (return-by-ref) $description A description of the database and version
		 * @return The class name of the driver eg. Postgres73
		 * @return -1 Database functions not compiled in
		 * @return -2 Invalid database type
		 * @return -3 Database-specific failure
		 */
		function getDriver($host, $port, $user, $password, $type, $database, &$description) {
			switch ($type) {
				case 'postgres7':
					// Check functions are loaded
					if (!function_exists('pg_connect')) return -1;

					include_once('classes/database/ADODB_base.php');
					$adodb = new ADODB_base('postgres7');

					$adodb->conn->connect(($host === null || $host == '') ? null : "{$host}:{$port}", $user, $password, $database);

					$sql = "SELECT VERSION() AS version";
					$field = $adodb->selectField($sql, 'version');

					$params = explode(' ', $field);
					if (!isset($params[1])) return -3;

					$version = $params[1]; // eg. 7.3.2
					$description = "PostgreSQL {$params[1]}";

					if (strpos($version, '7.4') === 0)
						return 'Postgres74';
					elseif (strpos($version, '7.3') === 0)
						return 'Postgres73';
					elseif (strpos($version, '7.2') === 0)
						return 'Postgres72';
					elseif (strpos($version, '7.1') === 0)
						return 'Postgres71';
					else
						return 'Postgres';

					break;
				case 'mysql':
					// Check functions are loaded
					$description = 'MySQL';
					if (!function_exists('mysql_connect')) return -1;
					return 'MySQL';
					break;
				default:
					return -2;
			}
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
					echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
					echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
				} else {
					echo "<html>\n";
				}
				echo "<head>\n";
				echo "<title>", htmlspecialchars($appName);
				if ($title != '') echo " - {$title}";
				echo "</title>\n";
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset={$lang['appcharset']}\" />\n";
				
				// Theme
				echo "<style type=\"text/css\">\n<!--\n";
				include("themes/{$conf['theme']}/global.css");
				echo "\n-->\n</style>\n";
				if ($script) echo "\n {$script} \n";
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
		 * Display the navigation header for tables
		 */
		function printTableNav() {
			global $lang;

			$vars = $this->href . '&table=' . urlencode($_REQUEST['table']);

			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			echo "<td width=\"14%\"><a href=\"tblproperties.php?{$vars}\">{$lang['strcolumns']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"indexes.php?{$vars}\">{$lang['strindexes']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"constraints.php?{$vars}\">{$lang['strconstraints']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"triggers.php?{$vars}\">{$lang['strtriggers']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"rules.php?{$vars}\">{$lang['strrules']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"privileges.php?{$vars}&type=table&object=", urlencode($_REQUEST['table']), "\">{$lang['strprivileges']}</a></td>\n";
			echo "<td width=\"14%\"><a href=\"tblproperties.php?{$vars}&action=export\">{$lang['strexport']}</a></td>\n";
			echo "</tr></table>\n";
		}

		/**
		 * Display the navigation header for tables
		 */
		function printDatabaseNav() {
			global $lang, $data;

			$vars = 'database=' . urlencode($_REQUEST['database']);

			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			// Only show schemas if available
			if ($data->hasSchemas()) {
				echo "<td width=\"20%\"><a href=\"database.php?{$vars}\">{$lang['strschemas']}</a></td>\n";
			}
			// Only show database privs if available
			if (isset($data->privlist['database'])) {
				echo "<td width=\"20%\"><a href=\"privileges.php?{$vars}&type=database&object=", urlencode($_REQUEST['database']), "\">{$lang['strprivileges']}</a></td>\n";
			}
			echo "<td width=\"20%\"><a href=\"database.php?{$vars}&action=sql\">{$lang['strsql']}</a></td>\n";
			echo "<td width=\"20%\"><a href=\"database.php?{$vars}&action=find\">{$lang['strfind']}</a></td>\n";
			echo "<td width=\"20%\"><a href=\"database.php?{$vars}&action=admin\">{$lang['stradmin']}</a></td>\n";
			//echo "<td width=\"20%\"><a href=\"database.php?{$vars}&action=export\">{$lang['strexport']}</a></td></tr>\n";
			echo "</tr></table>\n";
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
	
	}
?>
