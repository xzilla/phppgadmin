<?php

	/**
	 * Manage types in a database
	 *
	 * $Id: types.php,v 1.19 2004/07/13 15:24:41 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show read only properties for a type
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		// Get type (using base name)
		$typedata = &$data->getType($_REQUEST['type']);

		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strtypes'], 
				$misc->printVal($typedata->f['typname']), $lang['strproperties']), 'types');
		$misc->printMsg($msg);
		
		
		if ($typedata->recordCount() > 0) {
			$byval = $data->phpBool($typedata->f['typbyval']);
			echo "<table>\n";
			echo "<tr><th class=\"data left\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f['typname']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strinputfn']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f['typin']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['stroutputfn']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f['typout']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strlength']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f['typlen']), "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strpassbyval']}</th>\n";
			echo "<td class=\"data1\">", ($byval) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['stralignment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f['typalign']), "</td></tr>\n";
			echo "</table>\n";

			echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalltypes']}</a></p>\n";		}
		else
			doDefault($lang['strinvalidparam']);
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strtypes'], $misc->printVal($_REQUEST['type']), $lang['strdrop']), 'drop_type');

			echo "<p>", sprintf($lang['strconfdroptype'], $misc->printVal($_REQUEST['type'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropType($_POST['type'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strtypedropped']);
			else
				doDefault($lang['strtypedroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new type
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_POST['typname'])) $_POST['typname'] = '';
		if (!isset($_POST['typin'])) $_POST['typin'] = '';
		if (!isset($_POST['typout'])) $_POST['typout'] = '';
		if (!isset($_POST['typlen'])) $_POST['typlen'] = '';
		if (!isset($_POST['typdef'])) $_POST['typdef'] = '';
		if (!isset($_POST['typelem'])) $_POST['typelem'] = '';
		if (!isset($_POST['typdelim'])) $_POST['typdelim'] = '';
		if (!isset($_POST['typalign'])) $_POST['typalign'] = $data->typAlignDef;
		if (!isset($_POST['typstorage'])) $_POST['typstorage'] = $data->typStorageDef;

		// Retrieve all functions and types in the database
		$funcs = &$data->getFunctions(true);
		$types = &$data->getTypes(true);

		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strtypes'], $lang['strcreatetype']), 'create_type');
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typname\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['typname']), "\" /></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['strinputfn']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typin\">";
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f['proname']);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typin']) ? ' selected="selected"' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['stroutputfn']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typout\">";
		$funcs->moveFirst();
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f['proname']);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typout']) ? ' selected="selected"' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left required\">{$lang['strlength']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typlen\" size=\"8\" value=\"",
			htmlspecialchars($_POST['typlen']), "\" /></td></tr>";
		echo "<tr><th class=\"data left\">{$lang['strdefault']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typdef\" size=\"8\" value=\"",
			htmlspecialchars($_POST['typdef']), "\" /></td></tr>";
		echo "<tr><th class=\"data left\">{$lang['strelement']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typelem\">";
		echo "<option value=\"\"></option>\n";
		while (!$types->EOF) {
			$currname = htmlspecialchars($types->f['typname']);
			echo "<option value=\"{$currname}\"",
				($currname == $_POST['typelem']) ? ' selected="selected"' : '', ">{$currname}</option>\n";
			$types->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['strdelimiter']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typdelim\" size=\"1\" maxlength=\"1\" value=\"",
			htmlspecialchars($_POST['typdelim']), "\" /></td></tr>";
		echo "<tr><th class=\"data left\">{$lang['strpassbyval']}</th>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"typbyval\"", 
			isset($_POST['typbyval']) ? ' checked="checked"' : '', " /></td></tr>";
		echo "<tr><th class=\"data left\">{$lang['stralignment']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typalign\">";
		foreach ($data->typAligns as $v) {
			echo "<option value=\"{$v}\"",
				($v == $_POST['typalign']) ? ' selected="selected"' : '', ">{$v}</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data left\">{$lang['strstorage']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typstorage\">";
		foreach ($data->typStorages as $v) {
			echo "<option value=\"{$v}\"",
				($v == $_POST['typstorage']) ? ' selected="selected"' : '', ">{$v}</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new type in the database
	 */
	function doSaveCreate() {
		global $data;
		global $lang;

		// Check that they've given a name and a length.
		// Note: We're assuming they've given in and out functions here
		// which might be unwise...
		if ($_POST['typname'] == '') doCreate($lang['strtypeneedsname']);
		elseif ($_POST['typlen'] == '') doCreate($lang['strtypeneedslen']);
		else {		 
			$status = $data->createType(
				$_POST['typname'],
				$_POST['typin'],
				$_POST['typout'],
				$_POST['typlen'],
				$_POST['typdef'],
				$_POST['typelem'],
				$_POST['typdelim'],
				isset($_POST['typbyval']),
				$_POST['typalign'],
				$_POST['typstorage']
			);
			if ($status == 0)
				doDefault($lang['strtypecreated']);
			else
				doCreate($lang['strtypecreatedbad']);
		}
	}	

	/**
	 * Show default list of types in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $PHP_SELF, $lang;

		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['strtypes']), 'types');
		$misc->printMsg($msg);
		
		$types = &$data->getTypes();

		$columns = array(
			'type' => array(
				'title' => $lang['strtype'],
				'field' => 'typname',
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'typowner',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'typcomment',
			),
		);

		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "{$PHP_SELF}?action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('type' => 'basename'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('type' => 'basename'),
			),
		);
		
		$misc->printTable($types, $columns, $actions, $lang['strnotypes']);

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreatetype']}</a></p>\n";

	}

	$misc->printHeader($lang['strtypes']);
	$misc->printBody();
	$misc->printNav('schema','types');

	switch ($action) {
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['cancel'])) doDefault();
			else doDrop(false);
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
