<?php

	/**
	 * Manage conversions in a database
	 *
	 * $Id: conversions.php,v 1.8 2004/07/13 16:13:15 jollytoad Exp $
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

		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strconversions']), 'conversions');
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
	$misc->printNav('schema','conversions');

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
