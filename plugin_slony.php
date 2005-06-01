<?php

	/**
	 * Slony database tab plugin
	 *
	 * $Id: plugin_slony.php,v 1.1.2.6 2005/06/01 14:57:25 chriskl Exp $
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
									field('urlvars', array())
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
									field('urlvars', array())
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
									array('no_id' => field('pa_server'), 'path_id' => field('no_id'), 'action' => 'path_properties')
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
									array('no_id' => field('no_id'))
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'sets':
				$sets = &$slony->getReplicationSets();
			
				$attrs = array(
					'text'   => field('set_comment'),
					'icon'   => 'folder',
					'action' => url('redirect.php',
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
									field('urlvars', array())
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
									array('no_id' => field('no_id'))
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
		}
			
		exit;
	}

	/**
	 * List all the nodes
	 */
	function doNodes($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
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
			)
		);
		
		$misc->printTable($nodes, $columns, $actions, 'No nodes found.');
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
	}

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
				'vars'  => array('no_id' => 'pa_server', 'path_id' => 'no_id')
			)
		);
		
		$misc->printTable($paths, $columns, $actions, 'No paths found.');
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
	}
	
	/**
	 * List all the replication sets
	 */
	function doReplicationSets($msg = '') {
		global $slony, $misc;
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
			)
		);
		
		$misc->printTable($sets, $columns, $actions, 'No sets found.');
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
			echo "<tr><th class=\"data left\" width=\"70\">Locked</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_locked']), "</td></tr>\n";
			echo "<tr><th class=\"data left\" width=\"70\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($set->f['set_comment']), "</td></tr>\n";
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
		case 'paths_properties':
			doPaths();
			break;
		case 'path_properties':
			doPath();
			break;
		case 'sets_properties':
			doReplicationSets();
			break;
		case 'set_properties':
			doReplicationSet();
			break;
		default:
			// Shouldn't happen
	}
	
	$misc->printFooter();

?>
