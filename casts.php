<?php

	/**
	 * Manage casts in a database
	 *
	 * $Id: casts.php,v 1.9 2004/09/01 16:35:57 jollytoad Exp $
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
		
		$casts = &$data->getcasts();

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

	$misc->printHeader($lang['strcasts']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
