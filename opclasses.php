<?php

	/**
	 * Manage opclasss in a database
	 *
	 * $Id: opclasses.php,v 1.4 2004/07/13 15:24:41 jollytoad Exp $
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
		
		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['stropclasses']), 'opclasses');
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
				'type'  => 'bool',
				'true'  => $lang['stryes'],
				'false' => $lang['strno'],
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
	$misc->printNav('schema','opclasses');

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
