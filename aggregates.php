<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.10 2004/09/20 14:41:38 jollytoad Exp $
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

	$misc->printHeader($lang['straggregates']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
