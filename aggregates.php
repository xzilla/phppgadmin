<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.10.4.2 2005/03/09 12:29:01 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	/**
	 * Show default list of aggregates in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $lang;

		$misc->printTrail('schema');
		$misc->printTabs('schema', 'aggregates');
		$misc->printMsg($msg);
		
		$aggregates = &$data->getAggregates();

		$columns = array(
			'aggregate' => array(
				'title' => $lang['strname'],
				'field' => 'proname',
			),
			'type' => array(
				'title' => $lang['strtype'],
				'field' => 'proargtypes',
				'params'=> array('null' => $lang['stralltypes']),
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'aggcomment',
			),
		);
		
		$actions = array();
		
		$misc->printTable($aggregates, $columns, $actions, $lang['strnoaggregates']);
	}

	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$aggregates = &$data->getAggregates();
		
		$proto = concat(field('proname'), ' (', field('proargtypes'), ')');
		
		$actions = array(
			'item' => array(
				'text'    => $proto,
				'icon'    => 'functions',
				'toolTip' => field('aggcomment'),
			),
		);
		
		$misc->printTreeXML($aggregates, $actions);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['straggregates']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
