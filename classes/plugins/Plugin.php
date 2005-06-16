<?php

/**
 * A class that implements the plugin system
 *
 * $Id: Plugin.php,v 1.2 2005/06/16 14:40:12 chriskl Exp $
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
