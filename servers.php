<?php

	/**
	 * Manage servers
	 *
	 * $Id: servers.php,v 1.4 2005/10/18 04:00:19 chriskl Exp $
	 */

	// Include application functions
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	function doLogout() {
		global $misc, $lang, $_reload_browser;
		
		$server_info = $misc->getServerInfo($_REQUEST['logoutServer']);
		$misc->setServerInfo(null, null, $_REQUEST['logoutServer']);
		doDefault(sprintf($lang['strlogoutmsg'], $server_info['desc']));
		
		$_reload_browser = true;
	}

	function doDefault($msg = '') {
		global $conf, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTabs('root','servers');
		$misc->printMsg($msg);
		
		$servers = $misc->getServers(true);
		
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
				'url'   => "redirect.php?subject=server&amp;",
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
		
		$servers = $misc->getServers(true);
		
		$reqvars = $misc->getRequestVars('server');
		
		$attrs = array(
			'text'   => field('desc'),
			
			// Show different icons for logged in/out
			'icon'   => ifempty(field('username'), 'serverOut', 'server'),
			
			'toolTip'=> field('id'),
			
			'action' => url('redirect.php',
							$reqvars,
							array('server' => field('id'))
						),
			
			// Only create a branch url if the user has
			// logged into the server.
			'branch' => ifempty(field('username'), false,
							url('all_db.php',
								$reqvars,
								array(
									'action' => 'tree',
									'server' => field('id')
								)
							)
						),
		);
		
		$misc->printTreeXML($servers, $attrs);
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
