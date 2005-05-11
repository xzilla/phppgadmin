<?php

/**
 * A class that implements the Slony 1.0.x support plugin
 *
 * $Id: Slony.php,v 1.1.2.1 2005/05/11 15:48:03 chriskl Exp $
 */

include_once('./classes/plugins/Plugin.php');

class Slony extends Plugin {

	var $config = 'slony.inc.php';
	
	/**
	 * Constructor
	 */
	function Slony() {
		$this->Plugin('slony');
	}

	/**
	 * Gets the database tab details
	 * @return array The array of tab details, null for none
	 */
	function getDatabaseTab() {
		return array(
			'id' => 'slony',
			'title' => 'Slony',
			'url'   => 'plugin_slony.php',
			'urlvars' => array('subject' => 'database', 'action' => 'slony'),
			'hide'  => false
		);				
	}

	/**
	 * Gets the nodes in this database
	 */
	function getNodes() {
		global $data;
		
		$sql = "SELECT * FROM sl_node ORDER BY no_id";
		
		return $data->selectSet($sql);
	}

	/**
	 * Gets a single node
	 */
	function getNode($no_id) {
		global $data;
		$data->clean($no_id);
		
		$sql = "SELECT * FROM sl_node WHERE no_id='{$no_id}'";
		
		return $data->selectSet($sql);
	}
	
	/**
	 * Gets node listens
	 */
	function getNodeClients($no_id) {
		global $data;
		$data->clean($no_id);
		
		$sql = "SELECT * FROM sl_path sp, sl_node sn
					WHERE sp.pa_client=sn.no_id 
					AND pa_server='{$no_id}'
					ORDER BY sn.no_id";
		
		return $data->selectSet($sql);
	}
}

?>
