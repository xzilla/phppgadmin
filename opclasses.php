<?php

	/**
	 * Manage opclasss in a database
	 *
	 * $Id: opclasses.php,v 1.6 2004/09/01 16:35:59 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	/**
	 * Show default list of opclasss in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $lang;
		
		$misc->printTrail('schema');
		$misc->printTabs('schema','opclasses');
		$misc->printMsg($msg);
		
		$opclasses = &$data->getOpClasses();
		
		$columns = array(
			'accessmethod' => array(
				'title' => $lang['straccessmethod'],
				'field' => 'amname',
			),
			'opclass' => array(
				'title' => $lang['strname'],
				'field' => 'opcname',
			),
			'type' => array(
				'title' => $lang['strtype'],
				'field' => 'opcintype',
			),
			'default' => array(
				'title' => $lang['strdefault'],
				'field' => 'opcdefault',
				'type'  => 'yesno',
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'opccomment',
			),
		);
		
		$actions = array();
		
		$misc->printTable($opclasses, $columns, $actions, $lang['strnoopclasses']);
	}

	$misc->printHeader($lang['stropclasses']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
