<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.5 2002/12/24 07:35:25 chriskl Exp $
	 */
	 
	class Misc {
		
		/* Empty constructor */
		function Misc() {}

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
			if ($msg != '') echo "<p class=message>", htmlspecialchars($msg), "</p>\n";
		}
		
		/**
		 * Creates a database accessor
		 */
		function &getDatabaseAccessor($type, $host, $port, $database, $username, $password) {
			include_once('../classes/database/' . $type . '.php');
			$localData = new $type(	$host,
											$port,
											$database,
											$username,
											$password);
			
			return $localData;
		}
		
		/**
		 * Do multi-page navigation.  Displays the prev, next and page options.
		 * @param $page the page currently viewed
		 * @param $pages the maximum number of pages
		 * @param $url the url to refer to with the page number inserted
		 * @param $max_width the number of pages to make available at any one time (default = 20)
		 */
		function printPages($page, $pages, $url, $max_width = 20) {
			global $strPrev, $strNext;

			if ($page < 0 || $page > $pages) return;
			if ($pages < 0) return;
			if ($max_width <= 0) return;

			if ($pages > 1) {
				echo "<center><p>\n";
				if ($page != 1) {
					$temp = str_replace('%s', $page - 1, $url);
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$strPrev}</a>\n";
				}
				
				if ($page <= 5) { 
					$min_page = 1; 
					$max_page = min(10, $pages); 
				}
				elseif ($page > 5 && $pages >= $page + 5) { 
					$min_page = ($page - 5) + 1; 
					$max_page = $page + 5; 
				}
				else { 
					$min_page = ($page - (10 - ($pages - $page))) + 1; 
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
					echo "<a class=\"pagenav\" href=\"{$temp}\">{$strNext}</a>\n";
				}
				echo "</p></center>\n";
			}
		}		
	
	}
?>
