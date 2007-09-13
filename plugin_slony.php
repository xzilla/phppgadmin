<?php

	/**
	 * Slony database tab plugin
	 *
	 * $Id: plugin_slony.php,v 1.24 2007/09/13 13:41:01 ioguix Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

	// Avoid database connections whenever possible
	switch ($action) {
		case 'clusters_top':
		case 'nodes_top':
		case 'sets_top':
			$_no_db_connection = true;
			break;
		default:
	}

	// Include 'slony_cluster' in $misc->href if present
	if (isset($_REQUEST['slony_cluster'])) {
		$misc->href .= '&amp;slony_cluster=' . urlencode($_REQUEST['slony_cluster']);
	}

	/**
	 * Generate the somewhat complex Slony tree
	 * @param string $subject The tree node to return
	 */
	function doTree($subject) {
		global $misc, $data, $lang, $slony;

		$reqvars = $misc->getRequestVars('database');
		if (isset($slony))
			$reqvars['slony_cluster'] = $slony->slony_cluster;

		// Determine what actual tree we are building
		switch ($subject) {
			case 'clusters':
				// Clusters
				
				// Enabled check here is just a hack.
				if ($slony->isEnabled()) {
						$tabs = array('cluster' => array (
											'title' => $slony->slony_cluster,
											'url'   => 'plugin_slony.php',
											'urlvars' => array('subject' => 'clusters_top'),
											'icon'  => 'Cluster',
										));
				}
				else $tabs = array();
					
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									array('action'  => 'cluster_properties')
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'clusters_top')
								),
				);
				
				$misc->printTreeXML($items, $attrs);

				break;			
			case 'clusters_top':
				// Top level Nodes and Replication sets folders
				$tabs = array('nodes' => array (
										'title' => $lang['strnodes'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'nodes'),
										'icon'  => 'Nodes',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array(
										'action' => 'nodes_properties'
									)
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'nodes')
								),
					'nofoot' => true
				);
				
				$misc->printTreeXML($items, $attrs);

				$tabs = array('sets' => array (
										'title' => 	$lang['strrepsets'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'sets'),
										'icon'  => 'ReplicationSets',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'sets_properties')
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'sets')
								),
					'nohead' => true
				);
				
				$misc->printTreeXML($items, $attrs);
				
				break;
			case 'nodes':			
				$nodes = $slony->getNodes();
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => 'Node',
					'action' => url('plugin_slony.php',
									$reqvars,
									array(
										'subject' => 'slony_node',
										'action'  => 'node_properties',
										'no_id' => field('no_id'),
										'no_name' => field('no_comment'),
										'slony_cluster' => $slony->slony_cluster
									)
								),
					'branch' => url('plugin_slony.php',
									$reqvars,
									array(
										'action'  => 'nodes_top',
										'no_id' => field('no_id')
									)
								)
				);

				$misc->printTreeXML($nodes, $attrs);
				
				break;
			case 'nodes_top':
				// Nodes paths and listens entries
				
				$tabs = array('paths' => array (
										'title' => $lang['strpaths'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'paths'),
										'icon'  => 'Paths',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'paths_properties', 'no_id' => $_REQUEST['no_id'])
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'paths', 'no_id' => $_REQUEST['no_id'])
								),
					'nofoot' => true
				);
				
				$misc->printTreeXML($items, $attrs);

				$tabs = array('listens' => array (
										'title' => $lang['strlistens'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'listens'),
										'icon'  => 'Listens',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'listens_properties', 'no_id' => $_REQUEST['no_id'])
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'listens', 'no_id' => $_REQUEST['no_id'])
								),
					'nohead' => true
				);
				
				$misc->printTreeXML($items, $attrs);
				
				break;			
			case 'paths':
				$tables = $slony->getPaths($_REQUEST['no_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => 'Path',
					'action' => url('plugin_slony.php',
									$reqvars,
									array('no_id' => field('pa_client'), 'path_id' => field('no_id'), 'action' => 'path_properties')
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'listens':
				$tables = $slony->getListens($_REQUEST['no_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => 'Listen',
					'action' => url('plugin_slony.php',
									$reqvars,
									array('no_id' => field('li_receiver'), 'listen_id' => field('no_id'), 'action' => 'listen_properties')
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'sets':
				$sets = $slony->getReplicationSets();
			
				$attrs = array(
					'text'   => field('set_comment'),
					'icon'   => 'AvailableReplicationSet',
					'action' => url('plugin_slony.php',
									$reqvars,
									array(
										'action'  => 'set_properties',
										'set_id' => field('set_id')
									)
								),
					'branch' => url('plugin_slony.php',
									$reqvars,
									array(
										'action'  => 'sets_top',
										'set_id' => field('set_id')
									)
								)
				);
				
				$misc->printTreeXML($sets, $attrs);
				break;
			case 'sets_top':
				// Top level Nodes and Replication sets folders
				
				$tabs = array('sequences' => array (
										'title' => $lang['strsequences'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'sequences'),
										'icon'  => 'Sequences'
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'sequences_properties', 'set_id' => $_REQUEST['set_id'])
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'sequences', 'set_id' => $_REQUEST['set_id'])
								),
					'nofoot' => true
				);
				
				$misc->printTreeXML($items, $attrs);

				$tabs = array('tables' => array (
										'title' => $lang['strtables'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'tables'),
										'icon'  => 'Tables',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'tables_properties', 'set_id' => $_REQUEST['set_id'])
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'tables', 'set_id' => $_REQUEST['set_id'])
								),
					'nohead' => true,
					'nofoot' => true
				);
				
				$misc->printTreeXML($items, $attrs);

				$tabs = array('subscriptions' => array (
										'title' => $lang['strsubscriptions'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'subscriptions'),
										'icon'  => 'Subscriptions',
									));
				
				$items = $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'subscriptions_properties', 'set_id' => $_REQUEST['set_id'])
								),
					'branch' => url(field('url'),
									$reqvars,
									field('urlvars'),
									array('action' => 'subscriptions', 'set_id' => $_REQUEST['set_id'])
								),
					'nohead' => true
				);
				
				$misc->printTreeXML($items, $attrs);
				
				break;
			case 'sequences':
				$tables = $slony->getSequences($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('sequence');

				$attrs = array(
					'text'   => field('qualname'),
					'icon'   => 'Sequence',
					'toolTip'=> field('seqcomment'),
					'action' => url('sequences.php',
									$reqvars,
									array (
										'action' => 'properties',
										'sequence' => field('seqname'),
										'schema' => field('nspname')
									)
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'tables':
				$tables = $slony->getTables($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('table');
				
				$attrs = array(
					'text'   => field('qualname'),
					'icon'   => 'Table',
					'toolTip'=> field('relcomment'),
					'action' => url('redirect.php',
									$reqvars,
									array('table' => field('relname'), 'schema' => field('nspname'))
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'subscriptions':
				$tables = $slony->getSubscribedNodes($_REQUEST['set_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => 'AvailableSubscription',
					'action' => url('plugin_slony.php',
									$reqvars,
									array('set_id' => field('sub_set'), 'no_id' => field('no_id'), 'action' => 'subscription_properties')
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
		}
			
		exit;
	}

	/**
	 * Display the slony clusters (we only support one)
	 */	 
	function doClusters($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printTabs('database', 'slony');
		$misc->printMsg($msg);

		$clusters = $slony->getClusters();

		$columns = array(
			'no_name' => array(
				'title' => $lang['strcluster'],
				'field' => field('cluster'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=cluster_properties&amp;",
				'vars'  => array('slony_cluster' => 'cluster'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('comment'),
			)
		);
		
		$actions = array (
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_cluster&amp;",
				'vars'  => array('slony_cluster' => 'cluster'),
			)
		);
		
		$misc->printTable($clusters, $columns, $actions, $lang['strnoclusters']);

		if ($clusters->recordCount() == 0) {		
			echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=create_cluster&amp;{$misc->href}\">{$lang['strinitcluster']}</a></p>\n";
		}
	}

	// CLUSTERS

	/**
	 * Display the properties of a slony cluster
	 */	 
	function doCluster($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_cluster');
		$misc->printTabs('slony_cluster', 'properties');
		$misc->printMsg($msg);
		
		// Fetch the cluster information
		$cluster = $slony->getCluster();
		
		if (is_object($cluster) && $cluster->recordCount() > 0) {			
			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($slony->slony_cluster), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Local Node ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->fields['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Local Node</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->fields['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Version</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->fields['version']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strowner']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($slony->slony_owner), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\"></td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/**
	 * Displays a screen where they can enter a new cluster
	 */
	function doCreateCluster($confirm, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['cluster'])) $_POST['cluster'] = '';
			if (!isset($_POST['no_id'])) $_POST['no_id'] = '1';
			if (!isset($_POST['no_comment'])) $_POST['no_comment'] = '';
	
			$misc->printTrail('slony_clusters');
			$misc->printTitle($lang['strinitcluster']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<table style=\"width: 100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strcluster']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"cluster\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['cluster']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strid']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"no_id\" size=\"5\" value=\"",
				htmlspecialchars($_POST['no_id']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"no_comment\" rows=\"3\" cols=\"32\">", 
				htmlspecialchars($_POST['no_comment']), "</textarea></td>\n\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_cluster\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['strinitcluster']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			if (trim($_POST['cluster']) == '') {
				doCreateCluster(true, $lang['strclusterneedsname']);
				return;
			}
			elseif (trim($_POST['no_id']) == '') {
				doCreateCluster(true, $lang['strclusterneedsnodeid']);
				return;
			}
			
			$status = $slony->initCluster($_POST['cluster'], $_POST['no_id'], $_POST['no_comment']);
			if ($status == 0)
				doClusters($lang['strclustercreated']);
			else
				doCreateCluster(true, $lang['strclustercreatedbad'] . ':' . $status);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a cluster
	 */
	function doDropCluster($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdropcluster'], $misc->printVal($slony->slony_cluster)), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_cluster\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropCluster();
			if ($status == 0)
				doClusters($lang['strclusterdropped']);
			else
				doClusters($lang['strclusterdroppedbad']);
		}
	}

	// NODES
	
	/**
	 * List all the nodes
	 */
	function doNodes($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('slony_cluster');
		$misc->printTabs('slony_cluster', 'nodes');
		$misc->printMsg($msg);

		$nodes = $slony->getNodes();

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => field('no_comment'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=node_properties&amp;subject=slony_node&amp;",
				'vars'  => array('no_id' => 'no_id', 'no_name' => 'no_comment'),
			),
			'no_status' => array(
				'title' => $lang['strstatus'],
				'field' => field('no_status'),
				'type' => 'slonystatus',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('no_comment'),
			)
		);
		
		$actions = array (
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_node&amp;subject=slony_node&amp;",
				'vars'  => array('no_id' => 'no_id', 'no_name' => 'no_comment'),
			)
		);
		
		$misc->printTable($nodes, $columns, $actions, $lang['strnonodes']);
		
		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=create_node&amp;{$misc->href}\">{$lang['strcreatenode']}</a></p>\n";
	}
	
	/**
	 * Display the properties of a node
	 */	 
	function doNode($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_node');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the node information
		$node = $slony->getNode($_REQUEST['no_id']);		
		
		if (is_object($node) && $node->recordCount() > 0) {			
			// Show comment if any
			if ($node->fields['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($node->fields['no_comment']), "</p>\n";

			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->fields['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strid']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->fields['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['stractive']}</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($node->fields['no_active'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->fields['no_comment']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=confirm_drop_node&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new node
	 */
	function doCreateNode($confirm, $msg = '') {
		global $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['nodeid'])) $_POST['nodeid'] = '';
			if (!isset($_POST['nodecomment'])) $_POST['nodecomment'] = '';
	
			$misc->printTrail('slony_nodes');
			$misc->printTitle($lang['strcreatenode']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table style=\"width: 100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strid']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"nodeid\" size=\"5\" value=\"",
				htmlspecialchars($_POST['nodeid']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"nodecomment\" rows=\"3\" cols=\"32\">", 
				htmlspecialchars($_POST['nodecomment']), "</textarea></td>\n\t</tr>\n";
				
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_node\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->createNode($_POST['nodeid'], $_POST['nodecomment']);
			if ($status == 0)
				doNodes($lang['strnodecreated']);
			else
				doCreateNode(true, $lang['strnodecreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a node
	 */
	function doDropNode($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdropnode'], $misc->printVal($_REQUEST['no_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_node\" />\n";
			echo "<input type=\"hidden\" name=\"no_id\" value=\"", htmlspecialchars($_REQUEST['no_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropNode($_REQUEST['no_id']);
			if ($status == 0)
				doNodes($lang['strnodedropped']);
			else
				doNodes($lang['strnodedroppedbad']);
		}
	}
			
	// PATHS

	/**
	 * List all the paths
	 */
	function doPaths($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$paths = $slony->getPaths($_REQUEST['no_id']);

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => field('no_comment'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=path_properties&amp;",
				'vars'  => array('no_id' => 'pa_client', 'path_id' => 'no_id'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('no_comment'),
			)
		);
		
		$actions = array (
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_path&amp;",
				'vars'  => array('no_id' => 'pa_client', 'path_id' => 'no_id'),
			)
		);
		
		$misc->printTable($paths, $columns, $actions, $lang['strnopaths']);
	
		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=create_path&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">{$lang['strcreatepath']}</a></p>\n";
	}
	
	/**
	 * Display the properties of a path
	 */	 
	function doPath($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_path');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the path information
		$path = $slony->getPath($_REQUEST['no_id'], $_REQUEST['path_id']);		
		
		if (is_object($path) && $path->recordCount() > 0) {			
			// Show comment if any
			if ($path->fields['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($path->fields['no_comment']), "</p>\n";

			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strnodename']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->fields['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strnodeid']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->fields['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strconninfo']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->fields['pa_conninfo']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strconnretry']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->fields['pa_connretry']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=confirm_drop_path&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}&amp;path_id={$_REQUEST['path_id']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new path
	 */
	function doCreatePath($confirm, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['pathserver'])) $_POST['pathserver'] = '';
			if (!isset($_POST['pathconn'])) $_POST['pathconn'] = '';
			if (!isset($_POST['pathretry'])) $_POST['pathretry'] = '10';
	
			// Fetch all servers
			$nodes = $slony->getNodes();

			$misc->printTrail('slony_paths');
			$misc->printTitle($lang['strcreatepath']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table style=\"width: 100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strnodename']}</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"pathserver\">\n";
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->fields['no_id']}\"",
					($nodes->fields['no_id'] == $_POST['pathserver']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->fields['no_comment']), "</option>\n";
				$nodes->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t\n";		
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strconninfo']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"pathconn\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['pathconn']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strconnretry']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"pathretry\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['pathretry']), "\" /></td>\n\t</tr>\n";
				
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_path\" />\n";
			echo "<input type=\"hidden\" name=\"no_id\" value=\"", htmlspecialchars($_REQUEST['no_id']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			if (trim($_POST['pathconn']) == '') {
				doCreatePath(true, $lang['strpathneedsconninfo']);
				return;
			}
			elseif (trim($_POST['pathretry']) == '') {
				doCreatePath(true, $lang['strpathneedsconnretry']);
				return;
			}
				
			$status = $slony->createPath($_POST['no_id'], $_POST['pathserver'], $_POST['pathconn'], $_POST['pathretry']);
			if ($status == 0)
				doPaths($lang['strpathcreated']);
			else
				doCreatePath(true, $lang['strpathcreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a path
	 */
	function doDropPath($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdroppath'], $misc->printVal($_REQUEST['path_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_path\" />\n";
			echo "<input type=\"hidden\" name=\"no_id\" value=\"", htmlspecialchars($_REQUEST['no_id']), "\" />\n";
			echo "<input type=\"hidden\" name=\"path_id\" value=\"", htmlspecialchars($_REQUEST['path_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropPath($_REQUEST['no_id'], $_REQUEST['path_id']);
			if ($status == 0)
				doPaths($lang['strpathdropped']);
			else
				doPaths($lang['strpathdroppedbad']);
		}
	}
	
	// LISTENS
	
	/**
	 * List all the listens
	 */
	function doListens($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$listens = $slony->getListens($_REQUEST['no_id']);

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => field('no_comment'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=listen_properties&amp;",
				'vars'  => array('no_id' => 'li_receiver', 'listen_id' => 'no_id', 'origin_id' => 'li_origin'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('no_comment'),
			)
		);
		
		$actions = array (
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_listen&amp;",
				'vars'  => array('no_id' => 'li_receiver', 'listen_id' => 'no_id', 'origin_id' => 'li_origin'),
			)

		);
		
		$misc->printTable($listens, $columns, $actions, $lang['strnolistens']);

		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=create_listen&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">{$lang['strcreatelisten']}</a></p>\n";
	}

	/**
	 * Display the properties of a listen
	 */	 
	function doListen($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_path');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the listen information
		$listen = $slony->getListen($_REQUEST['no_id'], $_REQUEST['listen_id']);		
		
		if (is_object($listen) && $listen->recordCount() > 0) {			
			// Show comment if any
			if ($listen->fields['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($listen->fields['no_comment']), "</p>\n";

			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Provider</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->fields['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Provider ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->fields['li_provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Origin</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->fields['origin']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Origin ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->fields['li_origin']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=confirm_drop_listen&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}&amp;listen_id={$_REQUEST['listen_id']}&amp;origin_id={$listen->fields['li_origin']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new listen
	 */
	function doCreateListen($confirm, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['listenorigin'])) $_POST['listenorigin'] = '';
			if (!isset($_POST['listenprovider'])) $_POST['listenprovider'] = '';
	
			// Fetch all servers
			$nodes = $slony->getNodes();

			$misc->printTrail('slony_listens');
			$misc->printTitle($lang['strcreatelisten']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table style=\"width: 100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Origin</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"listenorigin\">\n";
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->fields['no_id']}\"",
					($nodes->fields['no_id'] == $_POST['listenorigin']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->fields['no_comment']), "</option>\n";
				$nodes->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Provider</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"listenprovider\">\n";
			$nodes->moveFirst();
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->fields['no_id']}\"",
					($nodes->fields['no_id'] == $_POST['listenprovider']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->fields['no_comment']), "</option>\n";
				$nodes->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t\n";		
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_listen\" />\n";
			echo "<input type=\"hidden\" name=\"no_id\" value=\"", htmlspecialchars($_REQUEST['no_id']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->createListen($_POST['no_id'], $_POST['listenorigin'], $_POST['listenprovider']);
			if ($status == 0)
				doListens($lang['strlistencreated']);
			else
				doCreateListen(true, $lang['strlistencreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a listen
	 */
	function doDropListen($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdroplisten'], $misc->printVal($_REQUEST['listen_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_listen\" />\n";
			echo "<input type=\"hidden\" name=\"no_id\" value=\"", htmlspecialchars($_REQUEST['no_id']), "\" />\n";
			echo "<input type=\"hidden\" name=\"listen_id\" value=\"", htmlspecialchars($_REQUEST['listen_id']), "\" />\n";
			echo "<input type=\"hidden\" name=\"origin_id\" value=\"", htmlspecialchars($_REQUEST['origin_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropListen($_REQUEST['no_id'], $_REQUEST['origin_id'], $_REQUEST['listen_id']);
			if ($status == 0)
				doListens($lang['strlistendropped']);
			else
				doListens($lang['strlistendroppedbad']);
		}
	}
	
	// REPLICATION SETS
		
	/**
	 * List all the replication sets
	 */
	function doReplicationSets($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('slony_cluster');
		$misc->printTabs('slony_cluster', 'sets');
		$misc->printMsg($msg);

		$sets = $slony->getReplicationSets();

		$columns = array(
			'set_name' => array(
				'title' => $lang['strname'],
				'field' => field('set_comment'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=set_properties&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'set_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('set_comment'),
			)
		);
		
		$actions = array (
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'lock' => array(
				'title' => $lang['strlock'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_lock_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'unlock' => array(
				'title' => $lang['strunlock'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_unlock_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'merge' => array(
				'title' => $lang['strmerge'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=merge_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'move' => array(
				'title' => $lang['strmove'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=move_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			),
			'execute' => array(
				'title' => $lang['strexecute'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=execute_set&amp;",
				'vars'  => array('set_id' => 'set_id'),
			)
		);
		
		$misc->printTable($sets, $columns, $actions, $lang['strnorepsets']);
		
		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=create_set&amp;{$misc->href}\">{$lang['strcreaterepset']}</a></p>\n";
	}	

	/**
	 * Display the properties of a replication set
	 */	 
	function doReplicationSet($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_set');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the set information
		$set = $slony->getReplicationSet($_REQUEST['set_id']);		
		
		if (is_object($set) && $set->recordCount() > 0) {			
			// Show comment if any
			if ($set->fields['set_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($set->fields['set_comment']), "</p>\n";

			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['set_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strid']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['set_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strlocked']}</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($set->fields['is_locked'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Origin ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['set_origin']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Origin Node</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Subscriptions</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['subscriptions']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->fields['set_comment']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<ul class=\"navlink\"><li><a href=\"plugin_slony.php?action=confirm_drop_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strdrop']}</a></li>\n";
		echo "\t<li><a href=\"plugin_slony.php?action=confirm_lock_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strlock']}</a></li>\n";
		echo "\t<li><a href=\"plugin_slony.php?action=confirm_unlock_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strunlock']}</a></li>\n";
		echo "\t<li><a href=\"plugin_slony.php?action=merge_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strmerge']}</a></li>\n";
		echo "\t<li><a href=\"plugin_slony.php?action=move_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strmove']}</a></li>\n";
		echo "\t<li><a href=\"plugin_slony.php?action=execute_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strexecute']}</a></li></ul>\n";
	}

	/**
	 * Displays a screen where they can enter a new set
	 */
	function doCreateReplicationSet($confirm, $msg = '') {
		global $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['setid'])) $_POST['setid'] = '';
			if (!isset($_POST['setcomment'])) $_POST['setcomment'] = '';
	
			$misc->printTrail('slony_sets');
			$misc->printTitle($lang['strcreaterepset']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table style=\"width: 100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strid']}</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"setid\" size=\"5\" value=\"",
				htmlspecialchars($_POST['setid']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"setcomment\" rows=\"3\" cols=\"32\">", 
				htmlspecialchars($_POST['setcomment']), "</textarea></td>\n\t</tr>\n";
				
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_set\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->createReplicationSet($_POST['setid'], $_POST['setcomment']);
			if ($status == 0)
				doReplicationSets($lang['strrepsetcreated']);
			else
				doCreateReplicationSet(true, $lang['strrepsetcreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a set
	 */
	function doDropReplicationSet($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfdroprepset'], $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropReplicationSet($_REQUEST['set_id']);
			if ($status == 0)
				doReplicationSet($lang['strrepsetdropped']);
			else
				doReplicationSet($lang['strrepsetdroppedbad']);
		}
	}

	/**
	 * Show confirmation of lock and perform actual lock of a set
	 */
	function doLockReplicationSet($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strlock']);

			echo "<p>", sprintf($lang['strconflockrepset'], $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"lock_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"lock\" value=\"{$lang['strlock']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->lockReplicationSet($_REQUEST['set_id'], true);
			if ($status == 0)
				doReplicationSet($lang['strrepsetlocked']);
			else
				doReplicationSet($lang['strrepsetlockedbad']);
		}
	}

	/**
	 * Show confirmation of unlock and perform actual unlock of a set
	 */
	function doUnlockReplicationSet($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strunlock']);

			echo "<p>", sprintf($lang['strconfunlockrepset'], $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"unlock_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"unlock\" value=\"{$lang['strunlock']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->lockReplicationSet($_REQUEST['set_id'], false);
			if ($status == 0)
				doReplicationSets($lang['strrepsetunlocked']);
			else
				doReplicationSets($lang['strrepsetunlockedbad']);
		}
	}
	
	/**
	 * Displays a screen where they can merge one set into another
	 */
	function doMergeReplicationSet($confirm, $msg = '') {
		global $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['target'])) $_POST['target'] = '';
	
			$sets = $slony->getReplicationSets();
	
			$misc->printTrail('slony_sets');
			$misc->printTitle($lang['strmerge']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strmergeinto']}</th>\n";
			echo "<td class=\"data1\" colspan=\"3\"><select name=\"target\">";
			while (!$sets->EOF) {
				if ($sets->fields['set_id'] != $_REQUEST['set_id']) {
					echo "<option value=\"{$sets->fields['set_id']}\">";
					echo htmlspecialchars($sets->fields['set_comment']), "</option>\n";
				}
				$sets->moveNext();	
			}
			echo "</select></td></tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_merge_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strmerge']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->mergeReplicationSet($_POST['set_id'], $_POST['target']);
			if ($status == 0)
				doReplicationSet($lang['strrepsetmerged']);
			else
				doMergeReplicationSet(true, $lang['strrepsetmergedbad']);
		}
	}

	/**
	 * Displays a screen where they can move one set into another
	 */
	function doMoveReplicationSet($confirm, $msg = '') {
		global $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['new_origin'])) $_POST['new_origin'] = '';
	
			$nodes = $slony->getNodes();
			$set = $slony->getReplicationSet($_REQUEST['set_id']);
	
			$misc->printTrail('slony_sets');
			$misc->printTitle($lang['strmove']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strneworigin']}</th>\n";
			echo "<td class=\"data1\" colspan=\"3\"><select name=\"new_origin\">";
			while (!$nodes->EOF) {
				if ($nodes->fields['no_id'] != $set->fields['set_origin']) {
					echo "<option value=\"{$nodes->fields['no_id']}\">";
					echo htmlspecialchars($nodes->fields['no_comment']), "</option>\n";
				}
				$nodes->moveNext();	
			}
			echo "</select></td></tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_move_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strmove']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->moveReplicationSet($_POST['set_id'], $_POST['new_origin']);
			if ($status == 0)
				doReplicationSet($lang['strrepsetmoved']);
			else
				doMoveReplicationSet(true, $lang['strrepsetmovedbad']);
		}
	}

	/**
	 * Displays a screen where they can enter a DDL script to
	 * be executed on all or a particular node, for this set.
	 */
	function doExecuteReplicationSet($confirm, $msg = '') {
		global $slony, $misc;
		global $lang;
		
		if ($confirm) {
			if (!isset($_POST['script'])) $_POST['script'] = '';
	
			$nodes = $slony->getNodes();
	
			$misc->printTrail('slony_sets');
			$misc->printTitle($lang['strexecute']);
			$misc->printMsg($msg);
	
			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo $misc->form;
			echo "<table>\n";
			/* Slony 1.1 only
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['stronlyonnode']}</th>\n";
			echo "<td class=\"data1\" colspan=\"3\"><select name=\"only_on_node\">";
			echo "<option value=\"0\"></option>\n";
			while (!$nodes->EOF) {
				echo "<option value=\"{$nodes->fields['no_id']}\"", ($_POST['only_on_node'] == $nodes->fields['no_id'] ? ' selected="selected"' : ''), ">";
				echo htmlspecialchars($nodes->fields['no_comment']), "</option>\n";
				$nodes->moveNext();	
			}
			echo "</select></td></tr>\n";
			*/
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strddlscript']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"script\" rows=\"20\" cols=\"40\">", 
				htmlspecialchars($_POST['script']), "</textarea></td>\n\t</tr>\n";
			echo "</table>\n";
			echo "<p>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_execute_set\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strexecute']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			if (trim($_POST['script']) == '') {
				doExecuteReplicationSet(true, $lang['strscriptneedsbody']);
				return;
			}
			
			$status = $slony->executeReplicationSet($_POST['set_id'], $_POST['script']);
			if ($status == 0)
				doReplicationSet($lang['strscriptexecuted']);
			else
				doExecuteReplicationSet(true, $lang['strscriptexecutedbad']);
		}
	}
			
	// TABLES
	
	/**
	 * List all the tables in a replication set
	 */
	function doTables($msg = '') {
		global $data, $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$tables = $slony->getTables($_REQUEST['set_id']);

		$columns = array(
			'table' => array(
				'title' => $lang['strtable'],
				'field' => field('qualname'),
				'url'   => "redirect.php?subject=table&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname', 'schema' => 'nspname'),
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => field('relowner'),
			),
			'tablespace' => array(
				'title' => $lang['strtablespace'],
				'field' => field('tablespace'),
			),
			'tuples' => array(
				'title' => $lang['strestimatedrowcount'],
				'field' => field('reltuples'),
				'type'  => 'numeric',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('relcomment'),
			),
		);
		
		$actions = array(
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_table&amp;set_id={$_REQUEST['set_id']}&amp;",
				'vars'  => array('tab_id' => 'tab_id', 'qualname' => 'qualname'),
			),
			'move' => array(
				'title' => $lang['strmove'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=move_table&amp;set_id={$_REQUEST['set_id']}&amp;stage=1&amp;",
				'vars'  => array('tab_id' => 'tab_id'),
			)
		);
		
		if (!$data->hasTablespaces()) unset($columns['tablespace']);

		$misc->printTable($tables, $columns, $actions, $lang['strnotables']);
		
		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=add_table&amp;stage=1&amp;set_id={$_REQUEST['set_id']}&amp;{$misc->href}\">{$lang['straddtable']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can add a table to a 
	 * replication set.
	 */
	function doAddTable($stage, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		switch ($stage) {
			case 1:
				if (!isset($_POST['tab_id'])) $_POST['tab_id'] = '';
				if (!isset($_POST['comment'])) $_POST['comment'] = '';
				
				$tables = $slony->getNonRepTables();
	
				$misc->printTrail('slony_sets');
				$misc->printTitle($lang['straddtable']);
				$misc->printMsg($msg);
		
				echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
				echo $misc->form;
				echo "<table style=\"width: 100%\">\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strtable']}</th>\n";
				echo "<td class=\"data1\" colspan=\"3\"><select name=\"target\">";
				while (!$tables->EOF) {
					$key = array('schemaname' => $tables->fields['nspname'], 'tablename' => $tables->fields['relname']);
					$key = serialize($key);
					echo "<option value=\"", htmlspecialchars($key), "\">";
					echo htmlspecialchars($tables->fields['nspname']), '.';
					echo htmlspecialchars($tables->fields['relname']), "</option>\n";
					$tables->moveNext();	
				}
				echo "</select></td></tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strid']}</th>\n";
				echo "\t\t<td class=\"data1\"><input name=\"tab_id\" size=\"5\" value=\"",
					htmlspecialchars($_POST['tab_id']), "\" /></td>\n\t</tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
				echo "\t\t<td class=\"data1\"><textarea name=\"comment\" rows=\"3\" cols=\"32\">", 
					htmlspecialchars($_POST['comment']), "</textarea></td>\n\t</tr>\n";
					
				echo "\t</tr>\n";
				echo "</table>\n";
				echo "<p>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"add_table\" />\n";
				echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['strnext']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
				echo "</p>\n";
				echo "</form>\n";
				break;
			case 2:
				// Unserialize table and fetch. This is a bit messy
				// because the table could be in another schema.
				$_REQUEST['target'] = unserialize($_REQUEST['target']);
				$data->setSchema($_REQUEST['target']['schemaname']);
				// Get indexes
				$indexes = $data->getIndexes($_REQUEST['target']['tablename'], true);
				if ($indexes->recordCount() == 0) {
					doAddTable(1, $lang['strtableneedsuniquekey']);
					return;
				}
				
				// Get triggers
				$triggers = $data->getTriggers($_REQUEST['target']['tablename']);				

				// If only one index and no triggers then jump to next step
				if ($indexes->recordCount() == 1 && $triggers->recordCount() == 0) {
					$_REQUEST['idxname'] = $indexes->fields['indname'];
					$_REQUEST['nspname'] = $_REQUEST['target']['schemaname'];
					$_REQUEST['relname'] = $_REQUEST['target']['tablename'];
					$_REQUEST['target'] = serialize($_REQUEST['target']);
					doAddTable(3);
					return;
				}
				
				$misc->printTrail('slony_sets');
				$misc->printTitle($lang['straddtable']);
				$misc->printMsg($msg);
		
				echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
				echo $misc->form;
				echo "<table>\n";
				if ($indexes->recordCount() > 1) {
					echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strindex']}</th>\n";
					echo "<td class=\"data1\" colspan=\"3\"><select name=\"idxname\">";
					while (!$indexes->EOF) {
						echo "<option value=\"", htmlspecialchars($indexes->fields['indname']), "\">";
						echo htmlspecialchars($indexes->fields['indname']), "</option>\n";
						$indexes->moveNext();	
					}
					echo "</select></td></tr>\n";
				}
				else {
					echo "<input type=\"hidden\" name=\"idxname\" value=\"", htmlspecialchars($indexes->fields['indname']), "\" />\n";
				}
				if ($triggers->recordCount() > 0) {
					echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strtriggers']}</th>\n";
					echo "<td class=\"data1\" colspan=\"3\"><p>{$lang['strtabletriggerstoretain']}</p>\n";
					while (!$triggers->EOF) {
						echo "<input type=\"checkbox\" id=\"storedtriggers[", htmlspecialchars($triggers->fields['tgname']), "]\" name=\"storedtriggers[", htmlspecialchars($triggers->fields['tgname']), "]\">";
						echo "<label for=\"storedtriggers[", htmlspecialchars($triggers->fields['tgname']), "]\">", htmlspecialchars($triggers->fields['tgname']), "</label><br/>\n";
						$triggers->moveNext();	
					}
					echo "</select></td></tr>\n";					
				}
				echo "</table>\n";
				echo "<p>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"add_table\" />\n";
				echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"tab_id\" value=\"", htmlspecialchars($_REQUEST['tab_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"comment\" value=\"", htmlspecialchars($_REQUEST['comment']), "\" />\n";
				echo "<input type=\"hidden\" name=\"nspname\" value=\"", htmlspecialchars($_REQUEST['target']['schemaname']), "\" />\n";
				echo "<input type=\"hidden\" name=\"relname\" value=\"", htmlspecialchars($_REQUEST['target']['tablename']), "\" />\n";
				echo "<input type=\"hidden\" name=\"target\" value=\"", htmlspecialchars(serialize($_REQUEST['target'])), "\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"3\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['stradd']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
				echo "</p>\n";
				echo "</form>\n";
				break;
			case 3:
				if (!isset($_REQUEST['storedtriggers'])) $_REQUEST['storedtriggers'] = array();
				$status = $slony->addTable($_REQUEST['set_id'], $_REQUEST['tab_id'], $_REQUEST['nspname'], $_REQUEST['relname'], 
														$_REQUEST['idxname'], $_REQUEST['comment'], array_keys($_REQUEST['storedtriggers']));
				if ($status == 0)
					doTables($lang['strtableaddedtorepset']);
				else
					doAddTable(2, $lang['strtableaddedtorepsetbad']);
				break;
		}
	}

	/**
	 * Displays a screen where they can move a table to a 
	 * replication set.
	 */
	function doMoveTable($stage, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		switch ($stage) {
			case 1:
				if (!isset($_POST['new_set_id'])) $_POST['new_set_id'] = '';
				
				$sets = $slony->getReplicationSets();
		
				$misc->printTrail('slony_sets');
				$misc->printTitle($lang['strmove']);
				$misc->printMsg($msg);
		
				echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
				echo $misc->form;
				echo "<table>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strnewrepset']}</th>\n";
				echo "<td class=\"data1\" colspan=\"3\"><select name=\"new_set_id\">";
				while (!$sets->EOF) {
					if ($sets->fields['set_id'] != $_REQUEST['set_id']) {
						echo "<option value=\"{$sets->fields['set_id']}\">";
						echo htmlspecialchars($sets->fields['set_comment']), "</option>\n";
					}
					$sets->moveNext();	
				}
				echo "</select></td></tr>\n";
				echo "</table>\n";
				echo "<p>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"move_table\" />\n";
				echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"tab_id\" value=\"", htmlspecialchars($_REQUEST['tab_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['strmove']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
				echo "</p>\n";
				echo "</form>\n";
				break;
			case 2:
				$status = $slony->moveTable($_REQUEST['tab_id'], $_REQUEST['new_set_id']);
				if ($status == 0)
					doTables('Table moved to replication set.');
				else
					doMoveTable(1, 'Failed moving table to replication set.');
				break;
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a table from a
	 * replication set.
	 */
	function doDropTable($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfremovetablefromrepset'], 
				$misc->printVal($_REQUEST['qualname']), $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_table\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo "<input type=\"hidden\" name=\"tab_id\" value=\"", htmlspecialchars($_REQUEST['tab_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropTable($_REQUEST['tab_id']);
			if ($status == 0)
				doTables($lang['strtableremovedfromrepset']);
			else
				doTables($lang['strtableremovedfromrepsetbad']);
		}
	}

	// SEQUENCES
	
	/**
	 * List all the sequences in a replication set
	 */
	function doSequences($msg = '') {
		global $data, $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$sequences = $slony->getSequences($_REQUEST['set_id']);

		$columns = array(
			'sequence' => array(
				'title' => $lang['strsequence'],
				'field' => field('qualname'),
				'url'   => "sequences.php?action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('sequence' => 'seqname', 'schema' => 'nspname'),
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => field('seqowner'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('seqcomment'),
			),
		);
		
		$actions = array(
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_sequence&amp;set_id={$_REQUEST['set_id']}&amp;",
				'vars'  => array('seq_id' => 'seq_id', 'qualname' => 'qualname'),
			),
			'move' => array(
				'title' => $lang['strmove'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=move_sequence&amp;set_id={$_REQUEST['set_id']}&amp;stage=1&amp;",
				'vars'  => array('seq_id' => 'seq_id'),
			)
		);
		
		$misc->printTable($sequences, $columns, $actions, $lang['strnosequences']);
		
		echo "<p><a class=\"navlink\" href=\"plugin_slony.php?action=add_sequence&amp;stage=1&amp;set_id={$_REQUEST['set_id']}&amp;{$misc->href}\">{$lang['straddsequence']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can add a sequence to a 
	 * replication set.
	 */
	function doAddSequence($stage, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		switch ($stage) {
			case 1:
				if (!isset($_POST['seq_id'])) $_POST['seq_id'] = '';
				if (!isset($_POST['comment'])) $_POST['comment'] = '';
				
				$sequences = $data->getSequences(true);
		
				$misc->printTrail('slony_sets');
				$misc->printTitle($lang['straddsequence']);
				$misc->printMsg($msg);
		
				echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
				echo $misc->form;
				echo "<table style=\"width: 100%\">\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strsequence']}</th>\n";
				echo "<td class=\"data1\" colspan=\"3\"><select name=\"target\">";
				while (!$sequences->EOF) {
					$key = array('schemaname' => $sequences->fields['nspname'], 'sequencename' => $sequences->fields['seqname']);
					$key = serialize($key);
					echo "<option value=\"", htmlspecialchars($key), "\">";
					echo htmlspecialchars($sequences->fields['nspname']), '.';
					echo htmlspecialchars($sequences->fields['seqname']), "</option>\n";
					$sequences->moveNext();	
				}
				echo "</select></td></tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strid']}</th>\n";
				echo "\t\t<td class=\"data1\"><input name=\"seq_id\" size=\"5\" value=\"",
					htmlspecialchars($_POST['seq_id']), "\" /></td>\n\t</tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
				echo "\t\t<td class=\"data1\"><textarea name=\"comment\" rows=\"3\" cols=\"32\">", 
					htmlspecialchars($_POST['comment']), "</textarea></td>\n\t</tr>\n";
					
				echo "\t</tr>\n";
				echo "</table>\n";
				echo "<p>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"add_sequence\" />\n";
				echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['stradd']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
				echo "</p>\n";
				echo "</form>\n";
				break;
			case 2:
				// Unserialize sequence.
				$_REQUEST['target'] = unserialize($_REQUEST['target']);

				$status = $slony->addSequence($_REQUEST['set_id'], $_REQUEST['seq_id'], 
															$_REQUEST['target']['schemaname'] . '.' . $_REQUEST['target']['sequencename'],
															$_REQUEST['comment']);
				if ($status == 0)
					doSequences($lang['strsequenceaddedtorepset']);
				else
					doAddSequence(1, $lang['strsequenceaddedtorepsetbad']);
				break;
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a sequence from a
	 * replication set.
	 */
	function doDropSequence($confirm) {
		global $slony, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf($lang['strconfremovesequencefromrepset'], 
				$misc->printVal($_REQUEST['qualname']), $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_sequence\" />\n";
			echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
			echo "<input type=\"hidden\" name=\"seq_id\" value=\"", htmlspecialchars($_REQUEST['seq_id']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropSequence($_REQUEST['seq_id']);
			if ($status == 0)
				doSequences($lang['strsequenceremovedfromrepset']);
			else
				doSequences($lang['strsequenceremovedfromrepsetbad']);
		}
	}

	/**
	 * Displays a screen where they can move a sequence to a 
	 * replication set.
	 */
	function doMoveSequence($stage, $msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		switch ($stage) {
			case 1:
				if (!isset($_POST['new_set_id'])) $_POST['new_set_id'] = '';
				
				$sets = $slony->getReplicationSets();
		
				$misc->printTrail('slony_sets');
				$misc->printTitle($lang['strmove']);
				$misc->printMsg($msg);
		
				echo "<form action=\"plugin_slony.php\" method=\"post\">\n";
				echo $misc->form;
				echo "<sequence>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strnewrepset']}</th>\n";
				echo "<td class=\"data1\" colspan=\"3\"><select name=\"new_set_id\">";
				while (!$sets->EOF) {
					if ($sets->fields['set_id'] != $_REQUEST['set_id']) {
						echo "<option value=\"{$sets->fields['set_id']}\">";
						echo htmlspecialchars($sets->fields['set_comment']), "</option>\n";
					}
					$sets->moveNext();	
				}
				echo "</select></td></tr>\n";
				echo "</sequence>\n";
				echo "<p>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"move_sequence\" />\n";
				echo "<input type=\"hidden\" name=\"set_id\" value=\"", htmlspecialchars($_REQUEST['set_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"seq_id\" value=\"", htmlspecialchars($_REQUEST['seq_id']), "\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['strmove']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
				echo "</p>\n";
				echo "</form>\n";
				break;
			case 2:
				$status = $slony->moveSequence($_REQUEST['seq_id'], $_REQUEST['new_set_id']);
				if ($status == 0)
					doSequences('Sequence moved to replication set.');
				else
					doMoveSequence(1, 'Failed moving sequence to replication set.');
				break;
		}
	}
				
	// SUBSCRIPTIONS
	
	/**
	 * List all the subscriptions
	 */
	function doSubscriptions($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$subscriptions = $slony->getSubscribedNodes($_REQUEST['set_id']);

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => field('no_comment'),
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=subscription_properties&amp;",
				'vars'  => array('set_id' => 'sub_set', 'no_id' => 'no_id'),
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => field('no_comment'),
			)
		);
		
		$actions = array ();
		
		$misc->printTable($subscriptions, $columns, $actions, $lang['strnosubscriptions']);
	}
	
	/**
	 * Display the properties of a subscription
	 */	 
	function doSubscription($msg = '') {
		global $data, $slony, $misc;
		global $lang;
		
		$misc->printTrail('slony_subscription');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the subscription information
		$subscription = $slony->getSubscription($_REQUEST['set_id'], $_REQUEST['no_id']);		
		
		if (is_object($subscription) && $subscription->recordCount() > 0) {			
			// Show comment if any
			if ($subscription->fields['receiver'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($subscription->fields['receiver']), "</p>\n";

			echo "<table>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Provider ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->fields['sub_provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Provider Name</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->fields['provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Receiver ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->fields['sub_receiver']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">Receiver Name</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->fields['receiver']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">{$lang['stractive']}</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($subscription->fields['sub_active'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\" style=\"width: 70px\">May Forward</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($subscription->fields['sub_forward'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	// Tree actions
	if ($action == 'tree') doTree('clusters');
	elseif ($action == 'clusters_top') doTree('clusters_top');
	elseif ($action == 'nodes') doTree('nodes');
	elseif ($action == 'nodes_top') doTree('nodes_top');
	elseif ($action == 'paths') doTree('paths');
	elseif ($action == 'listens') doTree('listens');
	elseif ($action == 'sets') doTree('sets');
	elseif ($action == 'sets_top') doTree('sets_top');
	elseif ($action == 'subscriptions') doTree('subscriptions');
	elseif ($action == 'sequences') doTree('sequences');
	elseif ($action == 'tables') doTree('tables');

	$misc->printHeader('Slony');
	$misc->printBody();

	switch ($action) {
		case 'save_create_cluster':
			if (isset($_POST['cancel'])) doClusters();
			else doCreateCluster(false);
			break;
		case 'create_cluster':
			doCreateCluster(true);
			break;
		case 'drop_cluster':
			if (isset($_POST['cancel'])) doClusters();
			else doDropCluster(false);
			break;
		case 'confirm_drop_cluster':
			doDropCluster(true);
			break;
		case 'nodes_properties':
			doNodes();
			break;
		case 'node_properties':
			doNode();
			break;
		case 'save_create_node':
			if (isset($_POST['cancel'])) doNodes();
			else doCreateNode(false);
			break;
		case 'create_node':
			doCreateNode(true);
			break;
		case 'drop_node':
			if (isset($_POST['cancel'])) doNodes();
			else doDropNode(false);
			break;
		case 'confirm_drop_node':
			doDropNode(true);
			break;
		case 'failover_node':
			if (isset($_POST['cancel'])) doNodes();
			else doFailoverNode(false);
			break;
		case 'confirm_failover_node':
			doFailoverNode(true);
			break;
		case 'paths_properties':
			doPaths();
			break;
		case 'path_properties':
			doPath();
			break;
		case 'save_create_path':
			if (isset($_POST['cancel'])) doPaths();
			else doCreatePath(false);
			break;
		case 'create_path':
			doCreatePath(true);
			break;
		case 'drop_path':
			if (isset($_POST['cancel'])) doPaths();
			else doDropPath(false);
			break;
		case 'confirm_drop_path':
			doDropPath(true);
			break;
		case 'listens_properties':
			doListens();
			break;
		case 'listen_properties':
			doListen();
			break;
		case 'save_create_listen':
			if (isset($_POST['cancel'])) doListens();
			else doCreateListen(false);
			break;
		case 'create_listen':
			doCreateListen(true);
			break;
		case 'drop_listen':
			if (isset($_POST['cancel'])) doListens();
			else doDropListen(false);
			break;
		case 'confirm_drop_listen':
			doDropListen(true);
			break;
		case 'sets_properties':
			doReplicationSets();
			break;
		case 'set_properties':
			doReplicationSet();
			break;
		case 'save_create_set':
			if (isset($_POST['cancel'])) doReplicationSets();
			else doCreateReplicationSet(false);
			break;
		case 'create_set':
			doCreateReplicationSet(true);
			break;
		case 'drop_set':
			if (isset($_POST['cancel'])) doReplicationSets();
			else doDropReplicationSet(false);
			break;
		case 'confirm_drop_set':
			doDropReplicationSet(true);
			break;
		case 'lock_set':
			if (isset($_POST['cancel'])) doReplicationSets();
			else doLockReplicationSet(false);
			break;
		case 'confirm_lock_set':
			doLockReplicationSet(true);
			break;
		case 'unlock_set':
			if (isset($_POST['cancel'])) doReplicationSets();
			else doUnlockReplicationSet(false);
			break;
		case 'confirm_unlock_set':
			doUnlockReplicationSet(true);
			break;
		case 'save_merge_set':
			if (isset($_POST['cancel'])) doReplicationSet();
			else doMergeReplicationSet(false);
			break;
		case 'merge_set':
			doMergeReplicationSet(true);
			break;
		case 'save_move_set':
			if (isset($_POST['cancel'])) doReplicationSet();
			else doMoveReplicationSet(false);
			break;
		case 'move_set':
			doMoveReplicationSet(true);
			break;
		case 'save_execute_set':
			if (isset($_POST['cancel'])) doReplicationSet();
			else doExecuteReplicationSet(false);
			break;
		case 'execute_set':
			doExecuteReplicationSet(true);
			break;
		case 'tables_properties':
			doTables();
			break;
		case 'add_table':
			if (isset($_REQUEST['cancel'])) doTables();
			else doAddTable($_REQUEST['stage']);
			break;
		case 'drop_table':
			if (isset($_POST['cancel'])) doTables();
			else doDropTable(false);
			break;
		case 'confirm_drop_table':
			doDropTable(true);
			break;
		case 'move_table':
			if (isset($_REQUEST['cancel'])) doTables();
			else doMoveTable($_REQUEST['stage']);
			break;
		case 'sequences_properties':
			doSequences();
			break;
		case 'add_sequence':
			if (isset($_REQUEST['cancel'])) doSequences();
			else doAddSequence($_REQUEST['stage']);
			break;
		case 'drop_sequence':
			if (isset($_POST['cancel'])) doSequences();
			else doDropSequence(false);
			break;
		case 'confirm_drop_sequence':
			doDropSequence(true);
			break;
		case 'move_sequence':
			if (isset($_REQUEST['cancel'])) doSequences();
			else doMoveSequence($_REQUEST['stage']);
			break;
		case 'subscriptions_properties':
			doSubscriptions();
			break;
		case 'subscription_properties':
			doSubscription();
			break;
		case 'cluster_properties':
			doCluster();
			break;
		case 'clusters_properties':
		default:
			doClusters();
			break;
	}
	
	$misc->printFooter();

?>
