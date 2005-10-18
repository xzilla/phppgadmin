<?php

	/**
	 * Manage opclasss in a database
	 *
	 * $Id: opclasses.php,v 1.8 2005/10/18 03:45:16 chriskl Exp $
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
		
		$opclasses = $data->getOpClasses();
		
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
	
	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$opclasses = $data->getOpClasses();
		
		// OpClass prototype: "op_class/access_method"
		$proto = concat(field('opcname'),'/',field('amname'));
		
		$attrs = array(
			'text'   => $proto,
			'icon'   => 'operators',
			'toolTip'=> field('opccomment'),
		);
		
		$misc->printTreeXML($opclasses, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['stropclasses']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
