<?php
	/**
	 * Class to hold various commonly used functions
	 *
	 * $Id: Misc.php,v 1.1 2002/04/15 11:57:28 chriskl Exp $
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
		
	
	}
?>