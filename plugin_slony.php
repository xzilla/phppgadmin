<?php

	/**
	 * Slony database tab plugin
	 *
	 * $Id: plugin_slony.php,v 1.1.2.13 2005/06/08 13:26:08 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Generate the somewhat complex Slony tree
	 * @param string $subject The tree node to return
	 */
	function doTree($subject) {
		global $misc, $data, $lang, $PHP_SELF, $slony;

		$reqvars = $misc->getRequestVars('database');

		// Determine what actual tree we are building
		switch ($subject) {			
			case 'clusters':
				// Nodes paths and listens entries
				
				$tabs = array('cluster' => array (
										'title' => $slony->slony_cluster,
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'clusters_top')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
					'action' => url(field('url'),
									$reqvars,
									array(
										'action'  => 'cluster_properties'
									)
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
				// Top level Nodes and Replication Sets folders
				$tabs = array('nodes' => array (
										'title' => 'Nodes',
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'nodes')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array()),
									array('action' => 'nodes_properties')
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
										'title' => 'Replication Sets',
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'sets')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
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
				$nodes = &$slony->getNodes();
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => 'folder',
					'action' => url('plugin_slony.php',
									$reqvars,
									array(
										'action'  => 'node_properties',
										'no_id' => field('no_id')
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
										'title' => 'Paths',
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'paths')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
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
										'title' => 'Listens',
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'listens')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
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
				$tables = &$slony->getPaths($_REQUEST['no_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => field('icon', 'folder'),
					'action' => url('plugin_slony.php',
									$reqvars,
									array('no_id' => field('pa_client'), 'path_id' => field('no_id'), 'action' => 'path_properties')
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'listens':
				$tables = &$slony->getListens($_REQUEST['no_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => field('icon', 'folder'),
					'action' => url('plugin_slony.php',
									$reqvars,
									array('no_id' => field('li_receiver'), 'listen_id' => field('no_id'), 'action' => 'listen_properties')
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'sets':
				$sets = &$slony->getReplicationSets();
			
				$attrs = array(
					'text'   => field('set_comment'),
					'icon'   => 'folder',
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
				// Top level Nodes and Replication Sets folders
				
				$tabs = array('sequences' => array (
										'title' => $lang['strsequences'],
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'sequences')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array())
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
										'urlvars' => array('subject' => 'tables')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
					'action' => url(field('url'),
									$reqvars,
									field('urlvars', array())
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
										'title' => 'Subscriptions',
										'url'   => 'plugin_slony.php',
										'urlvars' => array('subject' => 'subscriptions')
									));
				
				$items =& $misc->adjustTabsForTree($tabs);
				
				$attrs = array(
					'text'   => noEscape(field('title')),
					'icon'   => field('icon', 'folder'),
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
				$tables = &$slony->getSequences($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('sequence');

				$attrs = array(
					'text'   => field('qualname'),
					'icon'   => 'sequences',
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
				$tables = &$slony->getTables($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('table');
				
				$attrs = array(
					'text'   => field('qualname'),
					'icon'   => 'tables',
					'toolTip'=> field('relcomment'),
					'action' => url('redirect.php',
									$reqvars,
									array('table' => field('relname'), 'schema' => field('nspname'))
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'subscriptions':
				$tables = &$slony->getSubscribedNodes($_REQUEST['set_id']);
				
				$attrs = array(
					'text'   => field('no_comment'),
					'icon'   => field('icon', 'folder'),
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
		$misc->printMsg($msg);

		$clusters = $slony->getClusters();

		$columns = array(
			'no_name' => array(
				'title' => $lang['strcluster'],
				'field' => 'cluster'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=cluster_properties&amp;",
				'vars'  => array()
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_cluster&amp;",
				'vars'  => array()
			)
		);
		
		$misc->printTable($clusters, $columns, $actions, 'No clusters found.');
	}

	// CLUSTERS

	/**
	 * Display the properties of a slony cluster
	 */	 
	function doCluster($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_cluster');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the cluster information
		$cluster = &$slony->getCluster();
		
		if (is_object($cluster) && $cluster->recordCount() > 0) {			
			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($slony->slony_cluster), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Local Node ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->f['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Local Node</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->f['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Version</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($cluster->f['version']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strowner']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($slony->slony_owner), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\"></td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/**
	 * Show confirmation of drop and perform actual drop of a cluster
	 */
	function doDropCluster($confirm) {
		global $slony, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			// XXX: N
			echo "<p>", sprintf('Are you sure you want to drop Slony cluster "%s"?', $misc->printVal($slony->clony_cluster)), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $slony->dropCluster();
			if ($status == 0)
				doDefault('Cluster dropped.');
			else
				doDefault('Failed dropping cluster.');
		}
	}

	// NODES
	
	/**
	 * List all the nodes
	 */
	function doNodes($msg = '') {
		global $PHP_SELF, $slony, $misc;
		global $lang;

		$misc->printTrail('slony_nodes');
		$misc->printMsg($msg);

		$nodes = $slony->getNodes();

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => 'no_comment'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'no_comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=node_properties&amp;",
				'vars'  => array('no_id' => 'no_id')
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_node&amp;",
				'vars'  => array('no_id' => 'no_id')
			)
		);
		
		$misc->printTable($nodes, $columns, $actions, 'No nodes found.');
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create_node&amp;{$misc->href}\">Create Node</a></p>\n";
	}
	
	/**
	 * Display the properties of a node
	 */	 
	function doNode($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_node');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the node information
		$node = &$slony->getNode($_REQUEST['no_id']);		
		
		if (is_object($node) && $node->recordCount() > 0) {			
			// Show comment if any
			if ($node->f['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($node->f['no_comment']), "</p>\n";

			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->f['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->f['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Active</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($node->f['no_active'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($node->f['no_comment']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_drop_node&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new node
	 */
	function doCreateNode($confirm, $msg = '') {
		global $slony, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) {
			if (!isset($_POST['nodeid'])) $_POST['nodeid'] = '';
			if (!isset($_POST['nodecomment'])) $_POST['nodecomment'] = '';
	
			$misc->printTrail('slony_nodes');
			$misc->printTitle('Create Node');
			$misc->printMsg($msg);
	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">ID</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"nodeid\" size=\"5\" value=\"",
				htmlspecialchars($_POST['nodeid']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"nodecomment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
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
				doNodes('Node created.');
			else
				doCreateNode(true, 'Failed creating node.');
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a node
	 */
	function doDropNode($confirm) {
		global $slony, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf('Are you sure you want to drop node "%s"?', $misc->printVal($_REQUEST['no_id'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
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
				doNodes('Node dropped.');
			else
				doNodes('Failed dropping node.');
		}
	}
		
	// PATHS

	/**
	 * List all the paths
	 */
	function doPaths($msg = '') {
		global $PHP_SELF, $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$paths = $slony->getPaths($_REQUEST['no_id']);

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => 'no_comment'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'no_comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=path_properties&amp;",
				'vars'  => array('no_id' => 'pa_client', 'path_id' => 'no_id')
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_path&amp;",
				'vars'  => array('no_id' => 'pa_client', 'path_id' => 'no_id')
			)
		);
		
		$misc->printTable($paths, $columns, $actions, 'No paths found.');
	
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create_path&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">Create Path</a></p>\n";
	}
	
	/**
	 * Display the properties of a path
	 */	 
	function doPath($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_path');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the path information
		$path = &$slony->getPath($_REQUEST['no_id'], $_REQUEST['path_id']);		
		
		if (is_object($path) && $path->recordCount() > 0) {			
			// Show comment if any
			if ($path->f['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($path->f['no_comment']), "</p>\n";

			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Server name</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->f['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Server ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->f['no_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Connect Info</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->f['pa_conninfo']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Retry</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($path->f['pa_connretry']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_drop_path&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}&amp;path_id={$_REQUEST['path_id']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new path
	 */
	function doCreatePath($confirm, $msg = '') {
		global $data, $slony, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) {
			if (!isset($_POST['pathserver'])) $_POST['pathserver'] = '';
			if (!isset($_POST['pathconn'])) $_POST['pathconn'] = '';
			if (!isset($_POST['pathretry'])) $_POST['pathretry'] = '10';
	
			// Fetch all servers
			$nodes = &$slony->getNodes();

			$misc->printTrail('slony_paths');
			$misc->printTitle('Create Path');
			$misc->printMsg($msg);
	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Server</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"pathserver\">\n";
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->f['no_id']}\"",
					($nodes->f['no_id'] == $_POST['pathserver']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->f['no_comment']), "</option>\n";
				$nodes->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t\n";		
			echo "\t<tr>\n\t\t<th class=\"data left required\">Connect Info</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"pathconn\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['pathconn']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Conn Retry</th>\n";
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
				doCreatePath(true, 'Connect info is required.');
				return;
			}
			elseif (trim($_POST['pathretry']) == '') {
				doCreatePath(true, 'Connect retry is required.');
				return;
			}
				
			$status = $slony->createPath($_POST['no_id'], $_POST['pathserver'], $_POST['pathconn'], $_POST['pathretry']);
			if ($status == 0)
				doPaths('Path created.');
			else
				doCreatePath(true, 'Failed creating path.');
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a path
	 */
	function doDropPath($confirm) {
		global $slony, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf('Are you sure you want to drop path "%s"?', $misc->printVal($_REQUEST['path_id'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
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
				doPaths('Path dropped.');
			else
				doPaths('Failed dropping path.');
		}
	}
	
	// LISTENS
	
	/**
	 * List all the listens
	 */
	function doListens($msg = '') {
		global $PHP_SELF, $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$listens = $slony->getListens($_REQUEST['no_id']);

		$columns = array(
			'no_name' => array(
				'title' => $lang['strname'],
				'field' => 'no_comment'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'no_comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=listen_properties&amp;",
				'vars'  => array('no_id' => 'li_receiver', 'listen_id' => 'no_id', 'origin_id' => 'li_origin')
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_listen&amp;",
				'vars'  => array('no_id' => 'li_receiver', 'listen_id' => 'no_id', 'origin_id' => 'li_origin')
			)

		);
		
		$misc->printTable($listens, $columns, $actions, 'No listens found.');

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create_listen&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}\">Create Listen</a></p>\n";
	}

	/**
	 * Display the properties of a listen
	 */	 
	function doListen($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_path');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the listen information
		$listen = &$slony->getListen($_REQUEST['no_id'], $_REQUEST['listen_id']);		
		
		if (is_object($listen) && $listen->recordCount() > 0) {			
			// Show comment if any
			if ($listen->f['no_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($listen->f['no_comment']), "</p>\n";

			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Provider</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->f['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Provider ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->f['li_provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Origin</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->f['origin']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Origin ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($listen->f['li_origin']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_drop_listen&amp;{$misc->href}&amp;no_id={$_REQUEST['no_id']}&amp;listen_id={$_REQUEST['listen_id']}&amp;origin_id={$listen->f['li_origin']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new listen
	 */
	function doCreateListen($confirm, $msg = '') {
		global $data, $slony, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) {
			if (!isset($_POST['listenorigin'])) $_POST['listenorigin'] = '';
			if (!isset($_POST['listenprovider'])) $_POST['listenprovider'] = '';
	
			// Fetch all servers
			$nodes = &$slony->getNodes();

			$misc->printTrail('slony_listens');
			$misc->printTitle('Create Listen');
			$misc->printMsg($msg);
	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Origin</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"listenorigin\">\n";
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->f['no_id']}\"",
					($nodes->f['no_id'] == $_POST['listenorigin']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->f['no_comment']), "</option>\n";
				$nodes->moveNext();
			}
			echo "\t\t\t</select>\n\t\t</td>\n\t\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">Provider</th>\n";
			echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"listenprovider\">\n";
			$nodes->moveFirst();
			while (!$nodes->EOF) {
				echo "\t\t\t\t<option value=\"{$nodes->f['no_id']}\"",
					($nodes->f['no_id'] == $_POST['listenprovider']) ? ' selected="selected"' : '', ">", htmlspecialchars($nodes->f['no_comment']), "</option>\n";
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
				doListens('Listen created.');
			else
				doCreateListen(true, 'Failed creating listen.');
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a listen
	 */
	function doDropListen($confirm) {
		global $slony, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf('Are you sure you want to drop listen "%s"?', $misc->printVal($_REQUEST['listen_id'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
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
				doListens('Listen dropped.');
			else
				doListens('Failed dropping listen.');
		}
	}
	
	// REPLICATION SETS
		
	/**
	 * List all the replication sets
	 */
	function doReplicationSets($msg = '') {
		global $PHP_SELF, $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printMsg($msg);

		$sets = $slony->getReplicationSets();

		$columns = array(
			'set_name' => array(
				'title' => $lang['strname'],
				'field' => 'set_comment'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'set_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'set_comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=set_properties&amp;",
				'vars'  => array('set_id' => 'set_id')
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=confirm_drop_set&amp;",
				'vars'  => array('set_id' => 'set_id')
			)
		);
		
		$misc->printTable($sets, $columns, $actions, 'No replication sets found.');
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create_set&amp;{$misc->href}\">Create Replication Set</a></p>\n";
	}	

	/**
	 * Display the properties of a replication set
	 */	 
	function doReplicationSet($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_set');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the set information
		$set = &$slony->getReplicationSet($_REQUEST['set_id']);		
		
		if (is_object($set) && $set->recordCount() > 0) {			
			// Show comment if any
			if ($set->f['set_comment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($set->f['set_comment']), "</p>\n";

			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_id']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Origin ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_origin']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Origin Node</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['no_comment']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Subscriptions</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['subscriptions']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_comment']), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=confirm_drop_set&amp;{$misc->href}&amp;set_id={$_REQUEST['set_id']}\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new set
	 */
	function doCreateReplicationSet($confirm, $msg = '') {
		global $slony, $misc;
		global $PHP_SELF, $lang;
		
		if ($confirm) {
			if (!isset($_POST['setid'])) $_POST['setid'] = '';
			if (!isset($_POST['setcomment'])) $_POST['setcomment'] = '';
	
			$misc->printTrail('slony_sets');
			$misc->printTitle('Create ReplicationSet');
			$misc->printMsg($msg);
	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">ID</th>\n";
			echo "\t\t<td class=\"data1\"><input name=\"setid\" size=\"5\" value=\"",
				htmlspecialchars($_POST['setid']), "\" /></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea name=\"setcomment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
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
				doReplicationSets('Replication set created.');
			else
				doCreateReplicationSet(true, 'Failed creating set.');
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop of a set
	 */
	function doDropReplicationSet($confirm) {
		global $slony, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('slony_cluster');
			$misc->printTitle($lang['strdrop']);

			echo "<p>", sprintf('Are you sure you want to drop replication set "%s"?', $misc->printVal($_REQUEST['set_id'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
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
				doReplicationSets('Replication set dropped.');
			else
				doReplicationSets('Failed dropping set.');
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
				'field' => 'no_comment'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'no_comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'no_comment'
			)
		);
		
		$actions = array (
			'detail' => array(
				'title' => $lang['strproperties'],
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=subscription_properties&amp;",
				'vars'  => array('set_id' => 'sub_set', 'no_id' => 'no_id')
			)
		);
		
		$misc->printTable($subscriptions, $columns, $actions, 'No subscriptions found.');
	}
	
	/**
	 * Display the properties of a subscription
	 */	 
	function doSubscription($msg = '') {
		global $data, $slony, $misc, $PHP_SELF;
		global $lang;
		
		$misc->printTrail('slony_subscription');
		$misc->printTitle($lang['strproperties']);
		$misc->printMsg($msg);
		
		// Fetch the subscription information
		$subscription = &$slony->getSubscription($_REQUEST['set_id'], $_REQUEST['no_id']);		
		
		if (is_object($subscription) && $subscription->recordCount() > 0) {			
			// Show comment if any
			if ($subscription->f['receiver'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($subscription->f['receiver']), "</p>\n";

			// Display domain info
			echo "<table>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Provider ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->f['sub_provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Provider Name</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->f['provider']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Receiver ID</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->f['sub_receiver']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Receiver Name</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($subscription->f['receiver']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">Active</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($subscription->f['sub_active'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">May Forward</th>\n";
			echo "<td class=\"data1\">", ($data->phpBool($subscription->f['sub_forward'])) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
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
		case 'subscriptions_properties':
			doSubscriptions();
			break;
		case 'subscription_properties':
			doSubscription();
			break;
		case 'clusters_properties':
			doClusters();
			break;
		case 'cluster_properties':
			doCluster();
			break;
		default:
			// Shouldn't happen
	}
	
	$misc->printFooter();

?>
