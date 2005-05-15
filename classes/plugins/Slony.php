<?php

/**
 * A class that implements the Slony 1.0.x support plugin
 *
 * $Id: Slony.php,v 1.1.2.2 2005/05/15 14:27:16 chriskl Exp $
 */

include_once('./classes/plugins/Plugin.php');

class Slony extends Plugin {

	var $config = 'slony.inc.php';
	var $category = 'Replication';
	var $slony_version;
	var $slony_schema;
	var $slony_cluster;
	
	/**
	 * Constructor
	 */
	function Slony() {
		$this->Plugin('slony');
	}

	/**
	 * Determines whether or not Slony is installed in the current
	 * database.
	 * @post Will populate version and schema fields, etc.
	 * @return True if Slony is installed, false otherwise.
	 */
	function isEnabled() {
		global $data;
		
		// Slony needs schemas
		if (!$data->hasSchemas()) return false;
		
		// Check for the slonyversion() function and find the schema
		// it's in.
		$sql = "SELECT pn.nspname AS schema, SUBSTRING(pn.nspname FROM 2) AS cluster FROM pg_proc pp, pg_namespace pn
					WHERE pp.pronamespace=pn.oid
					AND pp.proname='slonyversion'
					AND pn.nspname LIKE '\\\\_%'";
		$rs = $data->selectSet($sql);
		if ($rs->recordCount() == 1) {
			$schema = $rs->f['schema'];
			$this->slony_schema = $schema;
			// Cluster name is schema minus "_" prefix.
			$this->slony_cluster = $rs->f['cluster'];
			$data->fieldClean($schema);
			$sql = "SELECT \"{$schema}\".slonyversion() AS version";
			$version = $data->selectField($sql, 'version');
			if ($version === -1) return false;
			else {
				$this->slony_version = $version;
				return true;
			}
		}
		else return false;
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
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_node ORDER BY no_id";
		
		return $data->selectSet($sql);
	}

	/**
	 * Gets a single node
	 */
	function getNode($no_id) {
		global $data;
		$data->clean($no_id);

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_node WHERE no_id='{$no_id}'";
		
		return $data->selectSet($sql);
	}
	
	/**
	 * Gets node listens
	 */
	function getNodeClients($no_id) {
		global $data;
		$data->clean($no_id);

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_path sp, \"{$schema}\".sl_node sn
					WHERE sp.pa_client=sn.no_id 
					AND pa_server='{$no_id}'
					ORDER BY sn.no_id";
		
		return $data->selectSet($sql);
	}
}

?>
