<?php

/**
 * A class that implements the Slony 1.0.x support plugin
 *
 * $Id: Slony.php,v 1.15 2007/10/02 21:36:35 ioguix Exp $
 */

include_once('./classes/plugins/Plugin.php');

class Slony extends Plugin {

	var $slony_version;
	var $slony_schema;
	var $slony_cluster;
	var $slony_owner;
	var $slony_comment;
	var $enabled = null;
	
	/**
	 * Constructor
	 */
	function Slony() {
		$this->Plugin('slony');
		$this->isEnabled();
	}

	/**
	 * Determines whether or not Slony is installed in the current
	 * database.
	 * @post Will populate version and schema fields, etc.
	 * @return True if Slony is installed, false otherwise.
	 */
	function isEnabled() {
		// Access cache
		if ($this->enabled !== null) return $this->enabled;
		else $this->enabled = false;
		
		global $data;
		
		// Check for the slonyversion() function and find the schema
		// it's in.  We put an order by and limit 1 in here to guarantee
		// only finding the first one, even if there are somehow two
		// Slony schemas.
		$sql = "SELECT pn.nspname AS schema, pu.usename AS owner, 
                    SUBSTRING(pn.nspname FROM 2) AS cluster,
                    pg_catalog.obj_description(pn.oid, 'pg_namespace') AS 
                    nspcomment
                    FROM pg_catalog.pg_proc pp, pg_catalog.pg_namespace pn, 
                    pg_catalog.pg_user pu 
					WHERE pp.pronamespace=pn.oid
					AND pn.nspowner = pu.usesysid
					AND pp.proname='slonyversion'
					AND pn.nspname LIKE '@_%' ESCAPE '@'  
					ORDER BY pn.nspname LIMIT 1";
		$rs = $data->selectSet($sql);
		if ($rs->recordCount() == 1) {
			$schema = $rs->fields['schema'];
			$this->slony_schema = $schema;
			$this->slony_owner = $rs->fields['owner'];
			$this->slony_comment = $rs->fields['nspcomment'];
			// Cluster name is schema minus "_" prefix.
			$this->slony_cluster = $rs->fields['cluster'];
			$data->fieldClean($schema);
			$sql = "SELECT \"{$schema}\".slonyversion() AS version";
			$version = $data->selectField($sql, 'version');
			if ($version === -1) return false;
			else {
				$this->slony_version = $version;
				$this->enabled = true;
				return true;
			}
		}
		else return false;
	}	

	// CLUSTERS

	/**
	 * Gets the clusters in this database
	 */
	function getClusters() {
		include_once('./classes/ArrayRecordSet.php');

		if ($this->isEnabled()) {
			$clusters = array(array('cluster' => $this->slony_cluster, 'comment' => $this->slony_comment));
		}
		else
			$clusters = array();

		return new ArrayRecordSet($clusters);
	}
	
	/**
	 * Gets a single cluster
	 */
	function getCluster() {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		
		$sql = "SELECT no_id, no_comment, \"{$schema}\".slonyversion() AS version
					FROM \"{$schema}\".sl_local_node_id, \"{$schema}\".sl_node
					WHERE no_id=last_value";
		
		
		return $data->selectSet($sql);
	}

	/**
	 * Drops an entire cluster.
	 */
	function dropCluster() {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);

		$sql = "SELECT \"{$schema}\".uninstallnode(); DROP SCHEMA \"{$schema}\" CASCADE";
		
		$status = $data->execute($sql);
		if ($status == 0) {
			$this->enabled = null;
			$enabled = $this->isEnabled();
		}
		return $status;
	}
	
	/**
	 * Helper function to get a file into a string and replace
	 * variables.
	 * @return The file contents, or FALSE on error.
	 */
	function _getFile($file, $cluster) {
		global $data,$misc;
		$schema = '_' . $cluster;
		$data->fieldClean($cluster);
		
		$server_info = $misc->getServerInfo();
		$path = $server_info['slony_sql'] . '/' . $file;
		
		// Check that we can access the file
		if (!file_exists($path) || !is_readable($path)) return false;

		$buffer = null;
		$handle = fopen($path, 'r');
		if ($handle === false) return false;
		while (!feof($handle)) {
		   $temp = fgets($handle, 4096);
		   $temp = str_replace('@CLUSTERNAME@', $cluster, $temp);
		   
		   $temp = str_replace('@NAMESPACE@', $schema, $temp);
		   $buffer .= $temp;
		}
		fclose($handle);
		
		return $buffer;
	}
	
	/**
	 * Initializes a new cluster
	 */
	function initCluster($name, $no_id, $no_comment) {
		global $data, $misc;
		
		// Prevent timeouts since cluster initialization can be slow
		if (!ini_get('safe_mode')) set_time_limit(0);

		$server_info = $misc->getServerInfo();
		
		if (!$data->isSuperUser($server_info['username'])) {
			return -10;
		}

		// Determine Slony compatibility version.
		if ($data->major_version == 7.3)
			$ver = '73';
		elseif ($data->major_version >= 7.4)
			$ver = '74';
		else {
			return -11;
		}
		
		$status = $data->beginTransaction();
		if ($status != 0) return -1;

		// Create the schema
		$status = $data->createSchema('_' . $name);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -2;
		}

		$sql = $this->_getFile("xxid.v{$ver}.sql", $name);
		if ($sql === false) {
			$data->rollbackTransaction();
			return -6;
		}			
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -3;
		}
		
		$sql = $this->_getFile('slony1_base.sql', $name);
		if ($sql === false) {
			$data->rollbackTransaction();
			return -6;
		}			
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -3;
		}
/* THIS FILE IS EMPTY AND JUST CAUSES ERRORS
		$sql = $this->_getFile('slony1_base.v74.sql', $name);
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -3;
		}
*/
		$sql = $this->_getFile('slony1_funcs.sql', $name);
		if ($sql === false) {
			$data->rollbackTransaction();
			return -6;
		}			
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -3;
		}

		$sql = $this->_getFile("slony1_funcs.v{$ver}.sql", $name);
		if ($sql === false) {
			$data->rollbackTransaction();
			return -6;
		}			
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -3;
		}
		
		$this->enabled = null;
		$enabled = $this->isEnabled();
		if (!$enabled) {
			$data->rollbackTransaction();
			return -4;
		}
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($no_comment);

		$sql = "SELECT \"{$schema}\".initializelocalnode('{$no_id}', '{$no_comment}'); SELECT \"{$schema}\".enablenode('{$no_id}')";
		$status = $data->execute($sql);
		if ($status != 0) {
			$data->rollbackTransaction();
			return -5;
		}
		
		return $data->endTransaction();
	}
	
	// NODES

	/**
	 * Gets the nodes in this database
	 */
	function getNodes() {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		// We use 10 seconds as the default check time since that is the
		// the default in Slony, and it gives no mechanism to look it up
		$sql = "SELECT no_id, no_active, no_comment, no_spool, ".
				"CASE WHEN st_lag_time > '10 seconds'::interval ". 
				"THEN 'outofsync' ELSE 'insync' END AS no_status ".
				"FROM \"{$schema}\".sl_node ".
				"LEFT JOIN \"{$schema}\".sl_status ON (no_id =st_received) ".
				"ORDER BY no_comment";

		return $data->selectSet($sql);
	}

	/**
	 * Gets a single node
	 */
	function getNode($no_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_node WHERE no_id='{$no_id}'";
		
		return $data->selectSet($sql);
	}
	
	/**
	 * Creates a node
	 */
	function createNode($no_id, $no_comment) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_comment);
		$data->clean($no_id);
		
		if ($no_id != '')
			$sql = "SELECT \"{$schema}\".storenode('{$no_id}', '{$no_comment}')";
		else
			$sql = "SELECT \"{$schema}\".storenode((SELECT COALESCE(MAX(no_id), 0) + 1 FROM \"{$schema}\".sl_node), '{$no_comment}')";

		return $data->execute($sql);
	}

	/**
	 * Drops a node
	 */
	function dropNode($no_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);

		$sql = "SELECT \"{$schema}\".dropnode('{$no_id}')";

		return $data->execute($sql);
	}	
	
	// REPLICATION SETS
	
	/**
	 * Gets the replication sets in this database
	 */
	function getReplicationSets() {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		
		$sql = "SELECT *, set_locked IS NOT NULL AS is_locked FROM \"{$schema}\".sl_set ORDER BY set_id";
		
		return $data->selectSet($sql);
	}

	/**
	 * Gets a particular replication set
	 */
	function getReplicationSet($set_id) {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		
		$sql = "SELECT *, (SELECT COUNT(*) FROM \"{$schema}\".sl_subscribe ssub WHERE ssub.sub_set=ss.set_id) AS subscriptions,
					set_locked IS NOT NULL AS is_locked
					FROM \"{$schema}\".sl_set ss, \"{$schema}\".sl_node sn
					WHERE ss.set_origin=sn.no_id
					AND set_id='{$set_id}'";
		
		return $data->selectSet($sql);
	}

	/**
	 * Creates a set
	 */
	function createReplicationSet($set_id, $set_comment) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_comment);
		$data->clean($set_id);

		if ($set_id != '')
			$sql = "SELECT \"{$schema}\".storeset('{$set_id}', '{$set_comment}')";
		else
			$sql = "SELECT \"{$schema}\".storeset((SELECT COALESCE(MAX(set_id), 0) + 1 FROM \"{$schema}\".sl_set), '{$set_comment}')";

		return $data->execute($sql);
	}

	/**
	 * Drops a set
	 */
	function dropReplicationSet($set_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);

		$sql = "SELECT \"{$schema}\".dropset('{$set_id}')";

		return $data->execute($sql);
	}	

	/**
	 * Locks or unlocks a set
	 * @param boolean $lock True to lock, false to unlock
	 */
	function lockReplicationSet($set_id, $lock) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);

		if ($lock)
			$sql = "SELECT \"{$schema}\".lockset('{$set_id}')";
		else
			$sql = "SELECT \"{$schema}\".unlockset('{$set_id}')";		

		return $data->execute($sql);
	}	
		
	/**
	 * Merges two sets
	 */
	function mergeReplicationSet($set_id, $target) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($target);

		$sql = "SELECT \"{$schema}\".mergeset('{$target}', '{$set_id}')";

		return $data->execute($sql);
	}

	/**
	 * Moves a set to a new origin
	 */
	function moveReplicationSet($set_id, $new_origin) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($new_origin);

		$sql = "SELECT \"{$schema}\".moveset('{$set_id}', '{$new_origin}')";

		return $data->execute($sql);
	}

	/**
	 * Executes schema changing DDL set on nodes
	 */
	function executeReplicationSet($set_id, $script) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($script);

		$sql = "SELECT \"{$schema}\".ddlscript('{$set_id}', '{$script}')";

		return $data->execute($sql);
	}	
	
	// TABLES
	
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

		$sql = "SELECT st.tab_id, c.relname, n.nspname, n.nspname||'.'||c.relname AS qualname,
					pg_catalog.pg_get_userbyid(c.relowner) AS relowner, 
					reltuples::bigint";
		// Tablespace
		if ($data->hasTablespaces()) {
			$sql .= ", (SELECT spcname FROM pg_catalog.pg_tablespace pt WHERE pt.oid=c.reltablespace) AS tablespace";
		}
		$sql .= " FROM pg_catalog.pg_class c, \"{$schema}\".sl_table st, pg_catalog.pg_namespace n
					WHERE c.oid=st.tab_reloid
					AND c.relnamespace=n.oid
					AND st.tab_set='{$set_id}'
					ORDER BY n.nspname, c.relname";

		return $data->selectSet($sql);
	}

	/**
	 * Adds a table to a replication set
	 */
	function addTable($set_id, $tab_id, $nspname, $relname, $idxname, $comment, $storedtriggers) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($tab_id);
		$fqname = $nspname . '.' . $relname;
		$data->clean($fqname);
		$data->clean($nspname);
		$data->clean($relname);
		$data->clean($idxname);
		$data->clean($comment);

		$hastriggers = (sizeof($storedtriggers) > 0);
		if ($hastriggers) {
			// Begin a transaction
			$status = $data->beginTransaction();
			if ($status != 0) return -1;
		}

		if ($tab_id != '')
			$sql = "SELECT \"{$schema}\".setaddtable('{$set_id}', '{$tab_id}', '{$fqname}', '{$idxname}', '{$comment}')";
		else {
			$sql = "SELECT \"{$schema}\".setaddtable('{$set_id}', (SELECT COALESCE(MAX(tab_id), 0) + 1 FROM \"{$schema}\".sl_table), '{$fqname}', '{$idxname}', '{$comment}')";			
		}

		$status = $data->execute($sql);	
		if ($status != 0) {
			if ($hastriggers) $data->rollbackTransaction();
			return -3;
		}		

		// If we are storing triggers, we need to know the tab_id that was assigned to the table
		if ($tab_id == '' && $hastriggers) {
			$sql = "SELECT tab_id
						FROM \"{$schema}\".sl_table
						WHERE tab_set='{$set_id}'
						AND tab_reloid=(SELECT pc.oid FROM pg_catalog.pg_class pc, pg_namespace pn 
												WHERE pc.relnamespace=pn.oid AND pc.relname='{$relname}'
												AND pn.nspname='{$nspname}')";
			$tab_id = $data->selectField($sql, 'tab_id');
			if ($tab_id === -1) {
				$data->rollbackTransaction();
				return -4;
			}
		}
		
		// Store requested triggers
		if ($hastriggers) {
			foreach ($storedtriggers as $tgname) {
				$data->clean($tgname);
				$sql = "SELECT \"{$schema}\".storetrigger('{$tab_id}', '{$tgname}')";
				$status = $data->execute($sql);	
				if ($status != 0) {
					$data->rollbackTransaction();
					return -5;
				}		
			}				
		}

		if ($hastriggers)
			return $data->endTransaction();
		else
			return $status;
	}
		
	/**
	 * Drops a table from a replication set
	 */
	function dropTable($tab_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($tab_id);

		$sql = "SELECT \"{$schema}\".setdroptable('{$tab_id}')";

		return $data->execute($sql);
	}		

	/**
	 * Moves a table to another replication set
	 */
	function moveTable($tab_id, $new_set_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($tab_id);
		$data->clean($new_set_id);

		$sql = "SELECT \"{$schema}\".setmovetable('{$tab_id}', '{$new_set_id}')";

		return $data->execute($sql);
	}		

    /**
     * Return all tables we are not current in a replication set
     */
    function getNonRepTables()
    {
		global $data;
        /*
         * we cannot just query pg_tables as we want the OID of the table 
         * for the subquery against the slony table. We could match on
         * on schema name and table name, but the slony info isn't updated
         * if the user renames a table which is in a replication set
         */
        $sql = "SELECT c.relname, n.nspname, n.nspname||'.'||c.relname AS qualname, 
                    pg_get_userbyid(c.relowner) AS relowner
                    FROM pg_class c
                    LEFT JOIN pg_namespace n ON n.oid = c.relnamespace
                    WHERE c.relkind = 'r' AND n.nspname NOT IN ('pg_catalog', 
                    'information_schema', 'pg_toast') AND
                    NOT(n.nspname = '_{$this->slony_cluster}' AND
                    relname LIKE 'sl_%') AND 
                    NOT EXISTS(SELECT 1 FROM _{$this->slony_cluster}.sl_table s
                    WHERE s.tab_reloid = c.oid)
                    ORDER BY n.nspname, c.relname";
        return $data->selectSet($sql);
    }

	// SEQUENCES
	
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

		$sql = "SELECT ss.seq_id, c.relname AS seqname, n.nspname, n.nspname||'.'||c.relname AS qualname,
						pg_catalog.obj_description(c.oid, 'pg_class') AS seqcomment,
						pg_catalog.pg_get_userbyid(c.relowner) AS seqowner 
					FROM pg_catalog.pg_class c, \"{$schema}\".sl_sequence ss, pg_catalog.pg_namespace n
					WHERE c.oid=ss.seq_reloid
					AND c.relnamespace=n.oid
					AND ss.seq_set='{$set_id}'
					ORDER BY n.nspname, c.relname";

		return $data->selectSet($sql);
	}

	/**
	 * Adds a sequence to a replication set
	 */
	function addSequence($set_id, $seq_id, $fqname, $comment) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($seq_id);
		$data->clean($fqname);
		$data->clean($comment);

		if ($seq_id != '')
			$sql = "SELECT \"{$schema}\".setaddsequence('{$set_id}', '{$seq_id}', '{$fqname}', '{$comment}')";
		else
			$sql = "SELECT \"{$schema}\".setaddsequence('{$set_id}', (SELECT COALESCE(MAX(seq_id), 0) + 1 FROM \"{$schema}\".sl_sequence), '{$fqname}', '{$comment}')";

		return $data->execute($sql);	}		
		
	/**
	 * Drops a sequence from a replication set
	 */
	function dropSequence($seq_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($seq_id);

		$sql = "SELECT \"{$schema}\".setdropsequence('{$seq_id}')";

		return $data->execute($sql);
	}		

	/**
	 * Moves a sequence to another replication set
	 */
	function moveSequence($seq_id, $new_set_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($seq_id);
		$data->clean($new_set_id);

		$sql = "SELECT \"{$schema}\".setmovesequence('{$seq_id}', '{$new_set_id}')";

		return $data->execute($sql);
	}		
	
	// SUBSCRIPTIONS
	
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
		
		$sql = "SELECT sn.*, ss.sub_set
					FROM \"{$schema}\".sl_subscribe ss, \"{$schema}\".sl_node sn
					WHERE ss.sub_set='{$set_id}'
					AND ss.sub_receiver = sn.no_id
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}

	/**
	 * Gets all nodes subscribing to a set
	 * @param $set_id The ID of the replication set
	 * @return Nodes subscribing to this set
	 */
	function getSubscription($set_id, $no_id) {
		global $data;
		
		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($set_id);
		$data->clean($no_id);
		
		$sql = "SELECT ss.*, sn.no_comment AS receiver, sn2.no_comment AS provider
					FROM \"{$schema}\".sl_subscribe ss, \"{$schema}\".sl_node sn, \"{$schema}\".sl_node sn2
					WHERE ss.sub_set='{$set_id}'
					AND ss.sub_receiver = sn.no_id
					AND ss.sub_provider = sn2.no_id
					AND sn.no_id='{$no_id}'";
		
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
					WHERE sp.pa_server=sn.no_id 
					AND sp.pa_client='{$no_id}'
					ORDER BY sn.no_comment";
		
		return $data->selectSet($sql);
	}

	/**
	 * Gets node path details
	 */
	function getPath($no_id, $path_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($path_id);
		
		$sql = "SELECT * FROM \"{$schema}\".sl_path sp, \"{$schema}\".sl_node sn
					WHERE sp.pa_server=sn.no_id 
					AND sp.pa_client='{$no_id}'
					AND sn.no_id='{$path_id}'";
		
		return $data->selectSet($sql);
	}

	/**
	 * Creates a path
	 */
	function createPath($no_id, $server, $conn, $retry) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($server);
		$data->clean($conn);
		$data->clean($retry);

		$sql = "SELECT \"{$schema}\".storepath('{$server}', '{$no_id}', '{$conn}', '{$retry}')";

		return $data->execute($sql);
	}

	/**
	 * Drops a path
	 */
	function dropPath($no_id, $path_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($path_id);

		$sql = "SELECT \"{$schema}\".droppath('{$path_id}', '{$no_id}')";

		return $data->execute($sql);
	}	
	
	// LISTENS
	
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

	/**
	 * Gets node listen details
	 */
	function getListen($no_id, $listen_id) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($listen_id);
		
		$sql = "SELECT sl.*, sn.*, sn2.no_comment AS origin FROM \"{$schema}\".sl_listen sl, \"{$schema}\".sl_node sn, \"{$schema}\".sl_node sn2
					WHERE sl.li_provider=sn.no_id 
					AND sl.li_receiver='{$no_id}'
					AND sn.no_id='{$listen_id}'
					AND sn2.no_id=sl.li_origin";
		
		return $data->selectSet($sql);
	}

	/**
	 * Creates a listen
	 */
	function createListen($no_id, $origin, $provider) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($origin);
		$data->clean($provider);

		$sql = "SELECT \"{$schema}\".storelisten('{$origin}', '{$provider}', '{$no_id}')";

		return $data->execute($sql);
	}

	/**
	 * Drops a listen
	 */
	function dropListen($no_id, $origin, $provider) {
		global $data;

		$schema = $this->slony_schema;
		$data->fieldClean($schema);
		$data->clean($no_id);
		$data->clean($origin);
		$data->clean($provider);

		$sql = "SELECT \"{$schema}\".droplisten('{$origin}', '{$provider}', '{$no_id}')";

		return $data->execute($sql);
	}	
	
	// ACTIONS
	
	

}

?>
