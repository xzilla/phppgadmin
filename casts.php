<?php

	/**
	 * Manage casts in a database
	 *
	 * $Id: casts.php,v 1.7 2004/07/13 15:24:40 jollytoad Exp $
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

		function castPre(&$rowdata) {
			global $data, $lang;
			$rowdata->f['+castfunc'] = is_null($rowdata->f['castfunc']) ? $lang['strbinarycompat'] : $rowdata->f['castfunc'];
			switch ($rowdata->f['castcontext']) {
				case 'e':
					$rowdata->f['+castcontext'] = $lang['strno'];
					break;
				case 'a':
					$rowdata->f['+castcontext'] = $lang['strinassignment'];
					break;
				default:
					$rowdata->f['+castcontext'] = $lang['stryes'];
			}
		}
		
		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strcasts']));
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
				'field' => '+castfunc',
			),
			'implicit' => array(
				'title' => $lang['strimplicit'],
				'field' => '+castcontext',
				'type'  => 'verbatim',
			),
		);

		$actions = array();
		
		$misc->printTable($casts, $columns, $actions, $lang['strnocasts'], 'castPre');
	}

	$misc->printHeader($lang['strcasts']);
	$misc->printBody();
	$misc->printNav('database','casts');

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
