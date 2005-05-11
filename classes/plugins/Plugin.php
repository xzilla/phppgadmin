<?php

/**
 * A class that implements the plugin system
 *
 * $Id: Plugin.php,v 1.1.2.1 2005/05/11 15:48:03 chriskl Exp $
 */

class Plugin {

	var $tabname = null;
	var $config = null;
	var $name = null;
	
	/**
	 * Constructor
	 */
	function Plugin($name) {
		$this->name = $name;
		
		// Read in configuration
		if ($this->config !== null) {
			global $conf;
			include('./conf/' . $name . '.inc.php');			
		}
	}

}

?>
