<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.12 2005/10/18 03:45:15 chriskl Exp $
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
		
		$aggregates = $data->getAggregates();

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
		
		$aggregates = $data->getAggregates();
		
		$proto = concat(field('proname'), ' (', field('proargtypes'), ')');
		
		$attrs = array(
			'text'   => $proto,
			'icon'   => 'functions',
			'toolTip'=> field('aggcomment'),
		);
		
		$misc->printTreeXML($aggregates, $attrs);
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
