<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.2 2002/07/26 09:03:06 chriskl Exp $
	 */
	 
	class Misc {
		
		/* Empty constructor */
		function Misc() {}
		
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
		
	
	}
?>