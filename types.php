<?php

	/**
	 * Manage types in a database
	 *
	 * $Id: types.php,v 1.12 2003/12/10 16:03:29 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show read only properties for a type
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtypes']}: ", $misc->printVal($_REQUEST['type']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$typedata = &$data->getType($_REQUEST['type']);
		
		if ($typedata->recordCount() > 0) {
			$byval = $data->phpBool($typedata->f[$data->typFields['typbyval']]);
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f[$data->typFields['typname']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strinputfn']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f[$data->typFields['typin']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['stroutputfn']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f[$data->typFields['typout']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strlength']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f[$data->typFields['typlen']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strpassbyval']}</th>\n";
			echo "<td class=\"data1\">", ($byval) ? $lang['stryes'] : $lang['strno'], "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['stralignment']}</th>\n";
			echo "<td class=\"data1\">", $misc->printVal($typedata->f[$data->typFields['typalign']]), "</td></tr>\n";
			echo "</table>\n";

			echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalltypes']}</a></p>\n";		}
		else
			doDefault($lang['strinvalidparam']);
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $database, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtypes']}: ", $misc->printVal($_REQUEST['type']), ": {$lang['strdrop']}</h2>\n";

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
		$types = &$data->getTypes();

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtypes']}: {$lang['strcreatetype']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\"><b>{$lang['strname']}</b></th>\n";
		echo "<td class=\"data1\"><input name=\"typname\" size=\"{$data->_maxNameLen}\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['typname']), "\" /></td></tr>\n";
		echo "<tr><th class=\"data\"><b>{$lang['strinputfn']}</b></th>\n";
		echo "<td class=\"data1\"><select name=\"typin\">";
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f[$data->fnFields['fnname']]);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typin']) ? ' selected="selected"' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\"><b>{$lang['stroutputfn']}</b></th>\n";
		echo "<td class=\"data1\"><select name=\"typout\">";
		$funcs->moveFirst();
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f[$data->fnFields['fnname']]);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typout']) ? ' selected="selected"' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\"><b>{$lang['strlength']}</b></th>\n";
		echo "<td class=\"data1\"><input name=\"typlen\" size=\"8\" value=\"",
			htmlspecialchars($_POST['typlen']), "\" /></td></tr>";
		echo "<tr><th class=\"data\">{$lang['strdefault']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typdef\" size=\"8\" value=\"",
			htmlspecialchars($_POST['typdef']), "\" /></td></tr>";
		echo "<tr><th class=\"data\">{$lang['strelement']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typelem\">";
		echo "<option value=\"\"></option>\n";
		while (!$types->EOF) {
			$currname = htmlspecialchars($types->f[$data->typFields['typname']]);
			echo "<option value=\"{$currname}\"",
				($currname == $_POST['typelem']) ? ' selected="selected"' : '', ">{$currname}</option>\n";
			$types->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strdelimiter']}</th>\n";
		echo "<td class=\"data1\"><input name=\"typdelim\" size=\"1\" maxlength=\"1\" value=\"",
			htmlspecialchars($_POST['typdelim']), "\" /></td></tr>";
		echo "<tr><th class=\"data\">{$lang['strpassbyval']}</th>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"typbyval\"", 
			isset($_POST['typbyval']) ? ' checked="checked"' : '', " /></td></tr>";
		echo "<tr><th class=\"data\">{$lang['stralignment']}</th>\n";
		echo "<td class=\"data1\"><select name=\"typalign\">";
		foreach ($data->typAligns as $v) {
			echo "<option value=\"{$v}\"",
				($v == $_POST['typalign']) ? ' selected="selected"' : '', ">{$v}</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strstorage']}</th>\n";
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
		global $data, $misc, $database;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtypes']}</h2>\n";
		$misc->printMsg($msg);
		
		$types = &$data->getTypes();

		if ($types->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strowner']}</th><th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$types->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($types->f[$data->typFields['typname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($types->f[$data->typFields['typowner']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&{$misc->href}&type=", urlencode($types->f[$data->typFields['typname']]), "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&type=", urlencode($types->f[$data->typFields['typname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$types->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnotypes']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatetype']}</a></p>\n";

	}

	$misc->printHeader($lang['strtypes']);
	$misc->printBody();

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
