<?php

	/**
	 * Manage casts in a database
	 *
	 * $Id: casts.php,v 1.11 2005/10/18 03:45:15 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of casts in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF, $lang;

		function renderCastContext($val) {
			global $lang;
			switch ($val) {
				case 'e': return $lang['strno'];
				case 'a': return $lang['strinassignment'];
				default: return $lang['stryes'];
			}
		}
		
		$misc->printTrail('database');
		$misc->printTabs('database','casts');
		$misc->printMsg($msg);
		
		$casts = $data->getCasts();

		$columns = array(
			'source_type' => array(
				'title' => $lang['strsourcetype'],
				'field' => 'castsource',
			),
			'target_type' => array(
				'title' => $lang['strtargettype'],
				'field' => 'casttarget',
			),
			'function' => array(
				'title' => $lang['strfunction'],
				'field' => 'castfunc',
				'params'=> array('null' => $lang['strbinarycompat']),
			),
			'implicit' => array(
				'title' => $lang['strimplicit'],
				'field' => 'castcontext',
				'type'  => 'callback',
				'params'=> array('function' => 'renderCastContext', 'align' => 'center'),
			),
		);

		$actions = array();
		
		$misc->printTable($casts, $columns, $actions, $lang['strnocasts']);
	}

	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$casts = $data->getCasts();
		
		$proto = concat(field('castsource'), ' AS ', field('casttarget'));
		
		$attrs = array(
			'text'   => $proto,
			'icon'   => 'casts'
		);
		
		$misc->printTreeXML($casts, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['strcasts']);
	$misc->printBody();

	switch ($action) {
		case 'tree':
			doTree();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
