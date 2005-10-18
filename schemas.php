<?php

	/**
	 * Manage schemas in a database
	 *
	 * $Id: schemas.php,v 1.4 2005/10/18 04:00:19 chriskl Exp $
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
			$schemas = $data->getSchemas();

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
					'url'   => "{$PHP_SELF}?action=drop&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
				'privileges' => array(
					'title' => $lang['strprivileges'],
					'url'   => "privileges.php?subject=schema&amp;{$misc->href}&amp;",
					'vars'  => array('schema' => 'nspname'),
				),
				'alter' => array(
					'title' => $lang['stralter'],
					'url'   => "{$PHP_SELF}?action=alter&amp;{$misc->href}&amp;",
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
	 * Displays a screen where they can enter a new schema
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$server_info = $misc->getServerInfo();
		
		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		if (!isset($_POST['formAuth'])) $_POST['formAuth'] = $server_info['username'];
		if (!isset($_POST['formSpc'])) $_POST['formSpc'] = '';
		if (!isset($_POST['formComment'])) $_POST['formComment'] = '';

		// Fetch all users from the database
		$users = $data->getUsers();

		$misc->printTrail('database');
		$misc->printTitle($lang['strcreateschema'],'pg.schema.create');
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo $misc->form;
		echo "<table width=\"100%\">\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t\t<td class=\"data1\"><input name=\"formName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\" /></td>\n\t</tr>\n";
		// Owner
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strowner']}</th>\n";
		echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"formAuth\">\n";
		while (!$users->EOF) {
			$uname = htmlspecialchars($users->f['usename']);
			echo "\t\t\t\t<option value=\"{$uname}\"",
				($uname == $_POST['formAuth']) ? ' selected="selected"' : '', ">{$uname}</option>\n";
			$users->moveNext();
		}
		echo "\t\t\t</select>\n\t\t</td>\n\t\n";		
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
		echo "\t\t<td class=\"data1\"><textarea name=\"formComment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
			htmlspecialchars($_POST['formComment']), "</textarea></td>\n\t</tr>\n";
			
		echo "\t</tr>\n";
		echo "</table>\n";
		echo "<p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"create\" />\n";
		echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\" />\n";
		echo "<input type=\"submit\" name=\"create\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
		echo "</p>\n";
		echo "</form>\n";
	}

	/**
	 * Actually creates the new schema in the database
	 */
	function doSaveCreate() {
		global $data, $lang, $_reload_browser;

		// Check that they've given a name
		if ($_POST['formName'] == '') doCreate($lang['strschemaneedsname']);
		else {
			$status = $data->createSchema($_POST['formName'], $_POST['formAuth'], $_POST['formComment']);
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strschemacreated']);
			}
			else
				doCreate($lang['strschemacreatedbad']);
		}
	}	
	
	/**
	 * Display a form to permit editing schema properies.
	 * TODO: permit changing name, owner
	 */
	function doAlter($msg = '') {
		global $data, $misc,$PHP_SELF, $lang;
		
		$misc->printTrail('schema');
		$misc->printTitle($lang['stralter'],'pg.schema.alter');
		$misc->printMsg($msg);

		$schema = $data->getSchemaByName($_REQUEST['schema']);
		if ($schema->recordCount() > 0) {
			if (!isset($_POST['comment'])) $_POST['comment'] = $schema->f['nspcomment'];
			if (!isset($_POST['schema'])) $_POST['schema'] = $_REQUEST['schema'];

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "\t<tr>\n";
			echo "\t\t<th class=\"data\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea cols=\"32\" rows=\"3\"name=\"comment\" wrap=\"virtual\">", htmlspecialchars($_POST['comment']), "</textarea></td>\n";
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"alter\" />\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_POST['schema']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		} else {
			echo "<p>{$lang['strnodata']}</p>\n";
		}
	}

	/**
	 * Save the form submission containing changes to a schema
	 */
	function doSaveAlter($msg = '') {
		global $data, $misc,$PHP_SELF, $lang;
		
		$status = $data->updateSchema($_POST['schema'], $_POST['comment']);
		if ($status == 0)
			doDefault($lang['strschemaaltered']);
		else
			doAlter($lang['strschemaalteredbad']);
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $PHP_SELF, $data, $data, $misc;
		global $lang, $_reload_browser;

		if ($confirm) {
			$misc->printTrail('schema');
			$misc->printTitle($lang['strdrop'],'pg.schema.drop');

			echo "<p>", sprintf($lang['strconfdropschema'], $misc->printVal($_REQUEST['schema'])), "</p>\n";

			echo "<form action=\"{$PHP_SELF}\" method=\"post\">\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\" />\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_REQUEST['schema']), "\" />\n";
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropSchema($_POST['schema'], isset($_POST['cascade']));
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strschemadropped']);
			}
			else
				doDefault($lang['strschemadroppedbad']);
		}
		
	}

	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data, $lang, $PHP_SELF, $slony;
		
		$schemas = $data->getSchemas();
		
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
			'branch' => url('schemas.php',
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
		
		$items = $misc->adjustTabsForTree($tabs);
		
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

	if (isset($_POST['cancel'])) $action = '';
	
	switch ($action) {
		case 'create':
			if (isset($_POST['create'])) doSaveCreate();
			else doCreate();
			break;
		case 'alter':
			if (isset($_POST['alter'])) doSaveAlter();
			else doAlter();
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDrop(true);
			break;
		default:
			doDefault();
			break;
	}

	$misc->printFooter();

?>
