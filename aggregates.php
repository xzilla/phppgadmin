<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.5 2004/07/07 02:59:56 chriskl Exp $
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

		function aggPre(&$rowdata) {
			global $data, $lang;
			$rowdata->f['+argtypes'] = is_null($rowdata->f['proargtypes']) ? $lang['stralltypes'] : $rowdata->f['proargtypes'];
		}
		
		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['straggregates']), 'aggregates');
		$misc->printMsg($msg);
		
		$aggregates = &$data->getAggregates();

		$columns = array(
			'aggregate' => array(
				'title' => $lang['strname'],
				'field' => 'proname',
			),
			'type' => array(
				'title' => $lang['strtype'],
				'field' => '+argtypes',
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'aggcomment',
			),
		);
		
		$actions = array();
		
		$misc->printTable($aggregates, $columns, $actions, $lang['strnoaggregates'], 'aggPre');
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
