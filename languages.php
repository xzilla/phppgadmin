<?php

	/**
	 * Manage languages in a database
	 *
	 * $Id: languages.php,v 1.7 2004/09/01 16:35:59 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of languages in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('database');
		$misc->printTabs('database','languages');
		$misc->printMsg($msg);
		
		$languages = &$data->getlanguages();

		$columns = array(
			'language' => array(
				'title' => $lang['strname'],
				'field' => 'lanname',
			),
			'trusted' => array(
				'title' => $lang['strtrusted'],
				'field' => 'lanpltrusted',
				'type'  => 'yesno',
			),
			'function' => array(
				'title' => $lang['strfunction'],
				'field' => 'lanplcallf',
			),
		);

		$actions = array();

		$misc->printTable($languages, $columns, $actions, $lang['strnolanguages']);
	}

	$misc->printHeader($lang['strlanguages']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
