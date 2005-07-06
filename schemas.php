<?php

	/**
	 * Manage schemas in a database
	 *
	 * $Id: schemas.php,v 1.1 2005/07/06 14:46:24 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of schemas in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $conf;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('database');
		$misc->printTabs('database','schemas');
		$misc->printMsg($msg);
		
		// Check that the DB actually supports schemas
		if ($data->hasSchemas()) {
			$schemas = &$data->getSchemas();

			$columns = array(
				'schema' => array(
					'title' => $lang['strschema'],
					'field' => 'nspname',
				),
				'owner' => array(
					'title' => $lang['strowner'],
					'field' => 'nspowner',
				),
				'actions' => array(
					'title' => $lang['stractions'],
				),
				'comment' => array(
					'title' => $lang['strcomment'],
					'field' => 'nspcomment',
				),
			);
			
			$actions = array(
				'properties' => array(
					'title' => $lang['strproperties'],
					'url'   => "redirect.php?subject=schema&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
				'drop' => array(
					'title' => $lang['strdrop'],
					'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
				'privileges' => array(
					'title' => $lang['strprivileges'],
					'url'   => "privileges.php?subject=schema&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
				'alter' => array(
					'title' => $lang['stralter'],
					'url'   => "{$PHP_SELF}?action=alter_schema&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
			);
			
			$misc->printTable($schemas, $columns, $actions, $lang['strnoschemas']);

			echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreateschema']}</a></p>\n";
		} else {
			// If the database does not support schemas...
			echo "<p>{$lang['strnoschemas']}</p>\n";
		}
	}

	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data, $lang, $PHP_SELF, $slony;
		
		$schemas = &$data->getSchemas();
		
		$reqvars = $misc->getRequestVars('schema');
		
		$attrs = array(
			'text'   => field('nspname'),
			'icon'   => 'folder',
			'toolTip'=> field('nspcomment'),
			'action' => url('redirect.php',
							$reqvars,
							array(
								'subject' => 'schema',
								'schema'  => field('nspname')
							)
						),
			'branch' => url('database.php',
							$reqvars,
							array(
								'action'  => 'subtree',
								'schema'  => field('nspname')
							)
						),
		);
		
		$misc->printTreeXML($schemas, $attrs);
		
		exit;
	}
	
	function doSubTree() {
		global $misc, $data, $lang;
		
		$tabs = $misc->getNavTabs('schema');
		
		$items =& $misc->adjustTabsForTree($tabs);
		
		$reqvars = $misc->getRequestVars('schema');
		
		$attrs = array(
			'text'   => noEscape(field('title')),
			'icon'   => field('icon', 'folder'),
			'action' => url(field('url'),
							$reqvars,
							field('urlvars', array())
						),
			'branch' => url(field('url'),
							$reqvars,
							field('urlvars'),
							array('action' => 'tree')
						)
		);
		
		$misc->printTreeXML($items, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	if ($action == 'subtree') doSubTree();
	
	$misc->printHeader($lang['strschemas']);
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
