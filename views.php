<?php

	/**
	 * Manage views in a database
	 *
	 * $Id: views.php,v 1.29 2004/05/08 14:45:10 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $data, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strselect']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$data->getTableAttributes($_REQUEST['view']);

			echo "<form action=\"$PHP_SELF\" method=\"get\" name=\"selectform\">\n";
			if ($attrs->recordCount() > 0) {
				// JavaScript for select all feature
				echo "<script language=\"JavaScript\">\n";
				echo "<!--\n";
				echo "	function selectAll() {\n";
				echo "		for (var i=0; i<document.selectform.elements.length; i++) {\n";
				echo "			var e = document.selectform.elements[i];\n";
				echo "			if (e.name.indexOf('show') == 0) e.checked = document.selectform.selectall.checked;\n";
				echo "		}\n";
				echo "	}\n";
				echo "//-->\n";
				echo "</script>\n";
	
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strshow']}</th><th class=\"data\">{$lang['strfield']}</th>";
				echo "<th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['stroperator']}</th>";
				echo "<th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $data->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = null;
					if (!isset($_REQUEST['ops'][$attrs->f['attname']]))
						$_REQUEST['ops'][$attrs->f['attname']] = null;
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					echo "<input type=\"checkbox\" name=\"show[", htmlspecialchars($attrs->f['attname']), "]\"",
						isset($_REQUEST['show'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($data->formatType($attrs->f['type'], $attrs->f['atttypmod'])), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					echo "<select name=\"ops[{$attrs->f['attname']}]\">\n";
					foreach (array_keys($data->selectOps) as $v) {
						echo "<option value=\"", htmlspecialchars($v), "\"", ($v == $_REQUEST['ops'][$attrs->f['attname']]) ? ' selected="selected"' : '', 
						">", htmlspecialchars($v), "</option>\n";
					}
					echo "</select>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $data->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				// Select all checkbox
				echo "<tr><td colspan=\"5\"><input type=\"checkbox\" name=\"selectall\" onClick=\"javascript:selectAll()\" />{$lang['strselectallfields']}</td>";
				echo "</table></p>\n";
			}
			else echo "<p>{$lang['strinvalidparam']}</p>\n";

			echo "<p><input type=\"hidden\" name=\"action\" value=\"selectrows\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"select\" value=\"{$lang['strselect']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_GET['show'])) $_GET['show'] = array();
			if (!isset($_GET['values'])) $_GET['values'] = array();
			if (!isset($_GET['nulls'])) $_GET['nulls'] = array();
			
			// Verify that they haven't supplied a value for unary operators
			foreach ($_GET['ops'] as $k => $v) {
				if ($data->selectOps[$v] == 'p' && $_GET['values'][$k] != '') {
					doSelectRows(true, $lang['strselectunary']);
					return;
				}
			}
						
			if (sizeof($_GET['show']) == 0)
				doSelectRows(true, $lang['strselectneedscol']);			
			else {
				// Generate query SQL
				$query = $data->getSelectSQL($_REQUEST['view'], array_keys($_GET['show']),
					$_GET['values'], $_GET['ops']);
				$_REQUEST['query'] = $query;
				$_REQUEST['return_url'] = "views.php?action=confselectrows&{$misc->href}&view={$_REQUEST['view']}";
				$_REQUEST['return_desc'] = $lang['strback'];

				include('./display.php');
				exit;
			}
		}

	}
	
	/** 
	 * Function to save after editing a view
	 */
	function doSaveEdit() {
		global $data, $lang;
		
		$status = $data->setView($_POST['view'], $_POST['formDefinition'], $_POST['formComment']);
		if ($status == 0)
			doProperties($lang['strviewupdated']);
		else
			doEdit($lang['strviewupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a view
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$data->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			
			if (!isset($_POST['formDefinition'])) {
				$_POST['formDefinition'] = $viewdata->f[$data->vwFields['vwdef']];
				$_POST['formComment'] = $viewdata->f[$data->vwFields['vwcomment']];
			}
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strdefinition']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea style=\"width: 100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><input style=\"width: 100%;\" name=\"formComment\" value='", 
				htmlspecialchars($_POST['formComment']), "' /></td>\n\t</tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}
	
	/**
	 * Show read only properties for a view
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$data->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strname']}</th>\n";
			echo "\t\t<td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwname']]), "</td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strdefinition']}</th>\n";
			echo "\t\t<td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwdef']]), "</td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwcomment']]), "</td>\n\t</tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallviews']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&{$misc->href}&view=", 
			urlencode($_REQUEST['view']), "\">{$lang['stralter']}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropview'], $misc->printVal($_REQUEST['view'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
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
			$status = $data->dropView($_POST['view'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strviewdropped']);
			else
				doDefault($lang['strviewdroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new view
	 */
	function doCreate($msg = '') {
		global $data, $misc, $conf;
		global $PHP_SELF, $lang;
		
		if (!isset($_REQUEST['formView'])) $_REQUEST['formView'] = '';
		if (!isset($_REQUEST['formDefinition'])) $_REQUEST['formDefinition'] = 'SELECT ';
		if (!isset($_REQUEST['formComment'])) $_REQUEST['formComment'] = '';
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: {$lang['strcreateview']}</h2>\n";
		
		//$misc->printHelp("/sql-createview.html#R2-SQL-CREATEVIEW-1");
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t<td class=\"data1\"><input name=\"formView\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_REQUEST['formView']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strdefinition']}</th>\n";
		echo "\t<td class=\"data1\"><textarea style=\"width:100%;\" rows=\"10\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
			htmlspecialchars($_REQUEST['formDefinition']), "</textarea></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
		echo "\t\t<td class=\"data1\"><input style=\"width: 100%;\" name=\"formComment\" value='", 
			htmlspecialchars($_REQUEST['formComment']), "' /></td>\n\t</tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $lang;
		
		// Check that they've given a name and a definition
		if ($_POST['formView'] == '') doCreate($lang['strviewneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strviewneedsdef']);
		else {		 
			$status = $data->createView($_POST['formView'], $_POST['formDefinition'], false, $_POST['formComment']);
			if ($status == 0)
				doDefault($lang['strviewcreated']);
			else
				doCreate($lang['strviewcreatedbad']);
		}
	}	

	/**
	 * Show default list of views in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $conf;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}</h2>\n";
		$misc->printMsg($msg);
		
		$views = &$data->getViews();
		
		if ($views->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strview']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th colspan=\"5\" class=\"data\">{$lang['stractions']}</th>\n";
			if ($conf['show_comments']) echo "<th class=\"data\">{$lang['strcomment']}</th>";
			echo "</tr>\n";
			$i = 0;
			while (!$views->EOF) {
				// @@@@@@@@@ FIX THIS!!!!!
				if ($data->hasSchemas() && isset($_REQUEST['schema'])) {
					$data->fieldClean($_REQUEST['schema']);
					$query = urlencode("SELECT * FROM \"{$_REQUEST['schema']}\".\"{$views->f[$data->vwFields['vwname']]}\"");
				}
				else
					$query = urlencode("SELECT * FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$count = urlencode("SELECT COUNT(*) AS total FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$return_url = urlencode("views.php?{$misc->href}");
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($views->f[$data->vwFields['vwname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($views->f[$data->vwFields['vwowner']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"display.php?{$misc->href}&query={$query}&count={$count}&return_url={$return_url}&return_desc=",
					urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confselectrows&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strselect']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"privileges.php?{$misc->href}&object=", urlencode($views->f[$data->vwFields['vwname']]),
					"&type=view\">{$lang['strprivileges']}</a></td>\n";
				if ($conf['show_comments']) echo "<td class=\"data{$id}\">", $misc->printVal($views->f[$data->vwFields['vwcomment']]), "</td>\n";
				echo "</tr>\n";
				$views->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoviews']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreateview']}</a></p>\n";

	}

	$misc->printHeader($lang['strviews']);
	$misc->printBody();

	switch ($action) {
		case 'selectrows':
			if (!isset($_POST['cancel'])) doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
			break;
		case 'save_create':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		case 'save_edit':
			if (isset($_POST['cancel'])) doProperties();
			else doSaveEdit();
			break;
		case 'edit':
			doEdit();
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
