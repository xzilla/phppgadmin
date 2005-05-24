<?php

	/**
	 * Slony database tab plugin
	 *
	 * $Id: plugin_slony.php,v 1.1.2.3 2005/05/24 13:02:01 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	function doProperties() {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printTabs('database','slony');

		$clients = $slony->getNodeClients($_REQUEST['no_id']);

		echo "<h3>Clients</h3>\n";
		
		$columns = array(
			'no_id' => array(
				'title' => 'Node ID',
				'field' => 'no_id'
			),
			'no_active' => array(
				'title' => 'Active',
				'field' => 'no_active'
			),
			'no_spool' => array(
				'title' => 'Spool',
				'field' => 'no_spool'
			),
			'pa_conninfo' => array(
				'title' => 'Connection',
				'field' => 'pa_conninfo'
			),
			'pa_connretry' => array(
				'title' => 'Retry',
				'field' => 'pa_connretry'
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
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=properties&amp;",
				'vars'  => array('no_id' => 'no_id')
			)
		);
		
		$misc->printTable($clients, $columns, $actions, 'No nodes found.');
	}

	function doTree($subject) {
		global $misc, $data, $lang, $PHP_SELF, $slony;

		$reqvars = $misc->getRequestVars('database');

		// Determine what actual tree we are building
		switch ($subject) {			
			case 'top':
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
									field('urlvars', array())
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
									field('urlvars', array())
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
					'text'   => field('no_name'),
					'icon'   => 'folder',
					'toolTip'=> field('no_comment'),
					'action' => url('redirect.php',
									$reqvars,
									array(
										'subject' => 'slony_node'
									)
								),
								/*
					'branch' => url('plugin_slony.php',
									$reqvars,
									array(
										'action'  => 'subtree',
										'schema'  => field('nspname')
									)
								)*/
				);

				$misc->printTreeXML($nodes, $attrs);
				
				break;
			case 'sets':
				$sets = &$slony->getReplicationSets();
			
				$attrs = array(
					'text'   => field('set_name'),
					'icon'   => 'folder',
					'toolTip'=> field('set_comment'),
					'action' => url('redirect.php',
									$reqvars,
									array(
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

				$tabs = array('sequencess' => array (
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
					'nohead' => true
				);
				
				$misc->printTreeXML($items, $attrs);
				
				break;
			case 'tables':
				$tables = &$slony->getTables($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('table');
				
				$attrs = array(
					'text'   => field('relname'),
					'icon'   => 'tables',
					'toolTip'=> field('relcomment'),
					'action' => url('redirect.php',
									$reqvars,
									array('table' => field('relname'), 'schema' => field('nspname'))
								)
				);
				
				$misc->printTreeXML($tables, $attrs);
			
				break;
			case 'sequences':
				$tables = &$slony->getSequences($_REQUEST['set_id']);
				
				$reqvars = $misc->getRequestVars('sequence');

				$attrs = array(
					'text'   => field('seqname'),
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
		}
			
		exit;
	}

	/**
	 * List all the information on the table
	 */
	function doDefault($msg = '') {
		global $slony, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printTabs('database','slony');
		$misc->printMsg($msg);

		$nodes = $slony->getNodes();

		echo "<h3>Nodes</h3>\n";
		
		$columns = array(
			'no_id' => array(
				'title' => 'Node ID',
				'field' => 'no_id'
			),
			'no_active' => array(
				'title' => 'Active',
				'field' => 'no_active'
			),
			'no_spool' => array(
				'title' => 'Spool',
				'field' => 'no_spool'
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
				'url'   => "plugin_slony.php?{$misc->href}&amp;action=properties&amp;",
				'vars'  => array('no_id' => 'no_id')
			)
		);
		
		$misc->printTable($nodes, $columns, $actions, 'No nodes found.');
	}

	if ($action == 'tree') doTree('top');
	elseif ($action == 'nodes') doTree('nodes');
	elseif ($action == 'sets') doTree('sets');
	elseif ($action == 'sets_top') doTree('sets_top');
	elseif ($action == 'subscriptions') doTree('subscriptions');
	elseif ($action == 'sequences') doTree('sequences');
	elseif ($action == 'tables') doTree('tables');

	$misc->printHeader('Slony');
	$misc->printBody();
	
	switch ($action) {
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();

?>
