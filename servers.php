<?php

	/**
	 * Manage servers
	 *
	 * $Id: servers.php,v 1.12 2008/02/18 22:20:26 ioguix Exp $
	 */

	// Include application functions
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	
	function doLogout() {
		global $misc, $lang, $_reload_browser;
		
		$server_info = $misc->getServerInfo($_REQUEST['logoutServer']);
		$misc->setServerInfo(null, null, $_REQUEST['logoutServer']);

		unset($_SESSION['sharedUsername'], $_SESSION['sharedPassword']);

		doDefault(sprintf($lang['strlogoutmsg'], $server_info['desc']));
		
		$_reload_browser = true;
	}

	function doDefault($msg = '') {
		global $conf, $misc;
		global $lang;
		
		$misc->printTabs('root','servers');
		$misc->printMsg($msg);
		
		$group = isset($_GET['group']) ? $_GET['group'] : false;
		
		$servers = $misc->getServers(true, $group);
		
		function svPre(&$rowdata, $actions) {
			$actions['logout']['disable'] = empty($rowdata->fields['username']);
			return $actions;
		}
		
		$columns = array(
			'server' => array(
				'title' => $lang['strserver'],
				'field' => field('desc'),
				'url'   => "redirect.php?subject=server&amp;",
				'vars'  => array('server' => 'id'),
			),
			'host' => array(
				'title' => $lang['strhost'],
				'field' => field('host'),
			),
			'port' => array(
				'title' => $lang['strport'],
				'field' => field('port'),
			),
			'username' => array(
				'title' => $lang['strusername'],
				'field' => field('username'),
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
		);
		
		$actions = array(
			'logout' => array(
				'title' => $lang['strlogout'],
				'url'   => "servers.php?action=logout&amp;",
				'vars'  => array('logoutServer' => 'id'),
			),
		);
		
		if (($group !== false) and isset($conf['srv_groups'][$group])) {
			printf("<h2>{$lang['strgroupservers']}</h2>", htmlentities($conf['srv_groups'][$group]['desc']));
			$actions['logout']['url'] .= "group=" . htmlentities($group) . "&amp;";
		}
		
		$misc->printTable($servers, $columns, $actions, $lang['strnoobjects'], 'svPre');
		
		if (isset($conf['srv_groups'])) {
			echo "<br /><ul class=\"navlink\">\n";
			echo "\t<li><a href=\"servers.php\">{$lang['strallservers']}</a></li>\n";
			foreach ($conf['srv_groups'] as $id => $grp) {
				echo "\t<li><a href=\"servers.php?group={$id}\">", htmlentities($grp['desc']), "</a></li>\n";
			}
			echo "</ul>\n";			
		}
	}
	
	function doTree($group = false) {
		global $misc;
		
		$servers = $misc->getServers(true, $group);
		
		$reqvars = $misc->getRequestVars('server');
		
		$attrs = array(
			'text'   => field('desc'),
			
			// Show different icons for logged in/out
			'icon'   => ifempty(field('username'), 'DisconnectedServer', 'Server'),
			
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
	
	function doGroupsTree() {
		global $misc;
		
		$groups = $misc->getServersGroups();

		function escape($fields) {
			global $lang;
			if ($fields['id'] === 'all') {
				return $lang['strallservers'];
			}
			else return value(field('desc'), $fields, 'xml');
		}

		$attrs = array(
			'text'   => noEscape(callback('escape')),
			'icon'   => 'Servers',			
			'action' => url('servers.php',
				array(
					'group' => field('id')
				)
			),
			'branch' => url('servers.php',
				array(
					'action' => 'tree',
					'group' => field('id')
				)
			)
		);
		
		$misc->printTreeXML($groups, $attrs);
		exit;
	}
	
	if ($action == 'tree') {
		if (isset($_GET['group'])) doTree($_GET['group']);
		else doTree(false);
	}

	if ($action == 'groupstree') doGroupsTree();
	
	$misc->printHeader($lang['strservers']);
	$misc->printBody();
	$misc->printTrail('root');

	switch ($action) {
		case 'logout':
			doLogout();
			break;
		default:
			doDefault($msg);
			break;
	}

	$misc->printFooter();
?>
