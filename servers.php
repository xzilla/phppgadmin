<?php

	/**
	 * Manage servers
	 *
	 * $Id: servers.php,v 1.1.2.2 2005/03/08 09:45:22 jollytoad Exp $
	 */

	// Include application functions
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	function doLogout() {
		global $misc, $lang;
		
		$server_info = $misc->getServerInfo($_REQUEST['logoutServer']);
		$misc->setServerInfo(null,null,$_REQUEST['logoutServer']);
		doDefault(sprintf($lang['strlogoutmsg'], $server_info['desc']));
	}

	function doDefault($msg = '') {
		global $conf, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTabs('root','servers');
		$misc->printMsg($msg);
		
		$servers =& $misc->getServers(true);
		
		function svPre(&$rowdata, $actions) {
			$actions['logout']['disable'] = empty($rowdata->f['username']);
			return $actions;
		}
		
		$columns = array(
			'server' => array(
				'title' => $lang['strserver'],
				'field' => 'desc',
			),
			'host' => array(
				'title' => $lang['strhost'],
				'field' => 'host',
			),
			'port' => array(
				'title' => $lang['strport'],
				'field' => 'port',
			),
			'username' => array(
				'title' => $lang['strusername'],
				'field' => 'username',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "redirect.php?section=server&amp;",
				'vars'  => array('server' => 'id'),
			),
			'logout' => array(
				'title' => $lang['strlogout'],
				'url'   => "{$PHP_SELF}?action=logout&amp;",
				'vars'  => array('logoutServer' => 'id'),
			),
		);
		
		$misc->printTable($servers, $columns, $actions, $lang['strnoobjects'], 'svPre');
	}
	
	function doTree() {
		global $misc;
		
		$servers =& $misc->getServers(true);
		
		function notLoggedIn($url, $action, $fields) {
			if (empty($fields['username']))
				return '';
			return $url;
		}
		
		$actions = array(
			'item' => array(
				'text'    => field('desc'),
				'icon'    => 'folder',
				'url'     => 'redirect.php',
				'urlvars' => array(
						'subject' => 'server',
						'server' => field('id'),
					),
			),
			'expand' => array(
				'url'     => 'all_db.php',
				'urlvars' => array(
							'subject' => 'server',
							'action' => 'tree',
							'server' => field('id')
					),
				'urlfn'   => 'notLoggedIn',
			),
		);
		
		$misc->printTreeXML($servers, $actions);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['strservers']);
	$misc->printBody();
	$misc->printTrail('root');

	switch ($action) {
		case 'logout':
			doLogout();
			break;
		case 'tree':
		default:
			doDefault($msg);
			break;
	}

	$misc->printFooter();
?>
