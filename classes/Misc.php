<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.61 2004/05/08 13:06:09 chriskl Exp $
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
		 * Display the navigation header for tables
		 */
		function printTableNav() {
			global $lang;

			$vars = $this->href . '&amp;table=' . urlencode($_REQUEST['table']);
			// Width of each cell
			$width = round(100 / 9) . '%';
			
			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			echo "<td width=\"{$width}\"><a href=\"tblproperties.php?{$vars}\">{$lang['strcolumns']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"indexes.php?{$vars}\">{$lang['strindexes']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"constraints.php?{$vars}\">{$lang['strconstraints']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"triggers.php?{$vars}\">{$lang['strtriggers']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"rules.php?{$vars}\">{$lang['strrules']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"info.php?{$vars}\">{$lang['strinfo']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"privileges.php?{$vars}&amp;type=table&amp;object=", urlencode($_REQUEST['table']), "\">{$lang['strprivileges']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"tblproperties.php?{$vars}&amp;action=import\">{$lang['strimport']}</a></td>\n";
			echo "<td width=\"{$width}\"><a href=\"tblproperties.php?{$vars}&amp;action=export\">{$lang['strexport']}</a></td>\n";
			echo "</tr></table>\n";
		}

		/**
		 * Display the navigation header for tables
		 */
		function printDatabaseNav() {
			global $lang, $conf, $data;

			$vars = 'database=' . urlencode($_REQUEST['database']);

			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			// Only show schemas if available
			if ($data->hasSchemas()) {
				echo "<td width=\"12%\"><a href=\"database.php?{$vars}\">{$lang['strschemas']}</a></td>\n";
			}
			echo "<td width=\"12%\"><a href=\"database.php?{$vars}&amp;action=sql\">{$lang['strsql']}</a></td>\n";
			echo "<td width=\"13%\"><a href=\"database.php?{$vars}&amp;action=find\">{$lang['strfind']}</a></td>\n";
			if ($data->hasVariables()) {
				echo "<td width=\"12%\"><a href=\"database.php?{$vars}&amp;action=variables\">{$lang['strvariables']}</a></td>\n";
			}
			if ($data->hasProcesses()) {
				echo "<td width=\"13%\"><a href=\"database.php?{$vars}&amp;action=processes\">{$lang['strprocesses']}</a></td>\n";
			}
			echo "<td width=\"12%\"><a href=\"database.php?{$vars}&amp;action=admin\">{$lang['stradmin']}</a></td>\n";
			// Only show database privs if available
			if (isset($data->privlist['database'])) {
				echo "<td width=\"13%\"><a href=\"privileges.php?{$vars}&amp;type=database&amp;object=", urlencode($_REQUEST['database']), "\">{$lang['strprivileges']}</a></td>\n";
			}
			// Check that database dumps are enabled.
			if ($this->isDumpEnabled()) {
				echo "<td width=\"13%\"><a href=\"database.php?{$vars}&amp;action=export\">{$lang['strexport']}</a></td>\n";
			}
			echo "</tr></table>\n";
		}

		/**
		 * Display the navigation header for popup window
		 */
		function printPopUpNav() {
			global $lang, $data;

			if (isset($_REQUEST['database'])) $url = '&amp;database=' . urlencode($_REQUEST['database']);
			else $url = '';

			echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\"><tr>\n";
			echo "<td width=\"50%\"><a href=\"sqledit.php?action=sql{$url}\">{$lang['strsql']}</a></td>\n";
			echo "<td width=\"50%\"><a href=\"sqledit.php?action=find{$url}\">{$lang['strfind']}</a></td>\n";
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
           // and return a double (64-bit float) representing the number of bytes that the parameter represents. Or false if $strIniSize is unparseable.
           $a_IniParts = array();
        
           if (!is_string( $strIniSize ))
               return false;
        
           if (!preg_match ('/^(\d+)([bkm]*)$/i', $strIniSize,$a_IniParts))
               return false;
          
           $nSize    = (double) $a_IniParts[1];
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
	}
?>
