<?php

	/**
	 * Manage conversions in a database
	 *
	 * $Id: conversions.php,v 1.9 2004/09/01 16:35:58 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of conversions in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc, $database;
		global $PHP_SELF, $lang;

		$misc->printTrail('schema');
		$misc->printTabs('schema', 'conversions');
		$misc->printMsg($msg);
		
		$conversions = &$data->getconversions();
		
		$columns = array(
			'conversion' => array(
				'title' => $lang['strname'],
				'field' => 'conname',
			),
			'source_encoding' => array(
				'title' => $lang['strsourceencoding'],
				'field' => 'conforencoding',
			),
			'target_encoding' => array(
				'title' => $lang['strtargetencoding'],
				'field' => 'contoencoding',
			),
			'default' => array(
				'title' => $lang['strdefault'],
				'field' => 'condefault',
				'type'  => 'yesno',
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'concomment',
			),
		);
		
		$actions = array();
		
		$misc->printTable($conversions, $columns, $actions, $lang['strnoconversions']);
	}

	$misc->printHeader($lang['strconversions']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
