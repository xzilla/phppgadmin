<?php

/**
 * A class that implements the Slony 1.0.x support plugin
 *
 * $Id: Slony.php,v 1.1.2.5 2005/05/28 13:16:31 chriskl Exp $
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
		// it's in.  We put an order by and limit 1 in here to guarantee
		// only finding the first one, even if there are somehow two
		// Slony schemas.
		$sql = "SELECT pn.nspname AS schema, SUBSTRING(pn.nspname FROM 2) AS cluster FROM pg_proc pp, pg_namespace pn
					WHERE pp.pronamespace=pn.oid
					AND pp.proname='slonyversion'
					AND pn.nspname LIKE '\\\\_%' 
					ORDER BY pn.nspname LIMIT 1";
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

	// NODES

	/**
	 * Gets the nodes in this database
	 */
	function getNodes() {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT *, 'Node ' || no_id AS no_name FROM \"{$schema}\".sl_node ORDER BY no_comment";
		
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
		
		$sql = "SELECT *, 'Node ' || no_id AS no_name FROM \"{$schema}\".sl_node WHERE no_id='{$no_id}'";
		
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
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}

	// REPLICATION SETS
	
	/**
	 * Gets the replication sets in this database
	 */
	function getReplicationSets() {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT *, 'Set ' || set_id AS set_name  FROM \"{$schema}\".sl_set ORDER BY set_id";
		
		return $data->selectSet($sql);
	}

	/**
	 * Return all tables in a replication set
	 * @param $set_id The ID of the replication set
	 * @return Tables in the replication set, sorted alphabetically 
	 */
	function getTables($set_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);		

		$sql = "SELECT c.relname, n.nspname, n.nspname||'.'||c.relname AS qualname
					FROM pg_catalog.pg_class c, \"{$schema}\".sl_table st, pg_catalog.pg_namespace n
					WHERE c.oid=st.tab_reloid
					AND c.relnamespace=n.oid
					AND st.tab_set='{$set_id}'
					ORDER BY c.relname";

		return $data->selectSet($sql);
	}

	/**
	 * Return all sequences in a replication set
	 * @param $set_id The ID of the replication set
	 * @return Sequences in the replication set, sorted alphabetically 
	 */
	function getSequences($set_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);		

		$sql = "SELECT c.relname AS seqname, n.nspname, n.nspname||'.'||c.relname AS qualname
					FROM pg_catalog.pg_class c, \"{$schema}\".sl_sequence ss, pg_catalog.pg_namespace n
					WHERE c.oid=ss.seq_reloid
					AND c.relnamespace=n.oid
					AND ss.seq_set='{$set_id}'
					ORDER BY c.relname";

		return $data->selectSet($sql);
	}

	/**
	 * Gets all nodes subscribing to a set
	 * @param $set_id The ID of the replication set
	 * @return Nodes subscribing to this set
	 */
	function getSubscribedNodes($set_id) {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);		
		
		$sql = "SELECT sn.*
					FROM \"{$schema}\".sl_subscribe ss, \"{$schema}\".sl_node sn
					WHERE ss.sub_set='{$set_id}'
					AND ss.sub_receiver = sn.no_id
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}

	// NODES
	
	/**
	 * Gets node paths
	 */
	function getPaths($no_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_path sp, \"{$schema}\".sl_node sn
					WHERE sp.pa_client=sn.no_id 
					AND sp.pa_server='{$no_id}'
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}
	
	/**
	 * Gets node listens
	 */
	function getListens($no_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_listen sl, \"{$schema}\".sl_node sn
					WHERE sl.li_provider=sn.no_id 
					AND sl.li_receiver='{$no_id}'
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}

}

?>
