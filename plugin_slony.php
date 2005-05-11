<?php

	/**
	 * Slony database tab plugin
	 *
	 * $Id: plugin_slony.php,v 1.1.2.1 2005/05/11 15:48:03 chriskl Exp $
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
