<?php

	/**
	 * Manage views in a database
	 *
	 * $Id: views.php,v 1.34 2004/05/23 04:10:19 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	include_once('./classes/Gui.php');
	
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
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang, $_reload_browser;

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
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strviewdropped']);
			}
			else
				doDefault($lang['strviewdroppedbad']);
		}
		
	}
	
	/**
	 * Sets up choices for table linkage, and which fields to select for the view we're creating
	 */
	function doSetParamsCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		// Check that they've chosen tables for the view definition
		if (!isset($_POST['formTables']) ) doWizardCreate($lang['strviewneedsdef']);
		else {
			// Initialise variables
			if (!isset($_REQUEST['formView'])) $_REQUEST['formView'] = '';
			if (!isset($_REQUEST['formComment'])) $_REQUEST['formComment'] = '';
			
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: {$lang['strcreateviewwiz']}</h2>\n";		
			$misc->printMsg($msg);
			$tblCount = count($_POST['formTables']);
			// If we have a message that means an error occurred in doSaveCreate, which means POST['formTables'] has quotes
			// around the table names, but getTableAttributes doesn't accept quoted table names so we strip them here
			if (strlen($msg)) {
				for ($i = 0; $i < $tblCount; $i++) {
					$_POST['formTables'][$i] = str_replace('"', '', $_POST['formTables'][$i]);
				}
			}
						
			$arrFields = array(); //array that will hold all our table/field names						
			
			$rsLinkKeys = $data->getLinkingKeys($_POST['formTables']);
			
			// Update tblcount if we have more foreign keys than tables (perhaps in the case of composite foreign keys)
			$linkCount = $rsLinkKeys->recordCount() > $tblCount ? $rsLinkKeys->recordCount() : $tblCount;
			
			// Get fieldnames
			for ($i = 0; $i < $tblCount; $i++) {				
				$attrs = &$data->getTableAttributes($_POST['formTables'][$i]);
				while (!$attrs->EOF) {
					// Quote table/field name
					$arrFields["\"{$_POST['formTables'][$i]}\"." . "\"{$attrs->f['attname']}\""] = "\"{$_POST['formTables'][$i]}\"." . "\"{$attrs->f['attname']}\"";
					$attrs->moveNext();
				}
			}
			asort($arrFields);			
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strviewname']}</th></tr>";
			echo "<tr>\n<td class=\"data1\">\n";
			// View name
			echo "<input name=\"formView\" id=\"formView\" value=\"", htmlspecialchars($_REQUEST['formView']), "\" style=\"width: 100%;\" />\n";
			echo "</td>\n</tr>\n";
			echo "<tr><th class=\"data\">{$lang['strcomment']}</th></tr>";
			echo "<tr>\n<td class=\"data1\">\n";
			// View comments			
			echo "<input name=\"formComment\" id=\"formComment\" value=\"", htmlspecialchars($_REQUEST['formComment']), "\" style=\"width: 100%;\" />\n";
			echo "</td>\n</tr>\n";									
			echo "<tr>\n<td class=\"data1\">\n";
			
			// Output selector for fields to be retrieved from view
			echo GUI::printCombo($arrFields, 'formFields[]', false, '', true);			
			echo "</td>\n</tr>\n</table>\n<br />\n";						
			
			// Output the Linking keys combo boxes
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strviewlink']}</th></tr>";					
			$rowClass = 'data1';
			for ($i = 0; $i < $linkCount; $i++) {
				// Initialise variables
				if (!isset($formLink[$i]['operator'])) $formLink[$i]['operator'] = 'INNER JOIN';
				echo "<tr>\n<td class=\"$rowClass\">\n";
							
				if (!$rsLinkKeys->EOF) {
					$curLeftLink = htmlspecialchars("\"{$rsLinkKeys->f['p_table']}\".\"{$rsLinkKeys->f['p_field']}\"");
					$curRightLink = htmlspecialchars("\"{$rsLinkKeys->f['f_table']}\".\"{$rsLinkKeys->f['f_field']}\"");
					$rsLinkKeys->moveNext();
				}
				else {
					$curLeftLink = '';
					$curRightLink = '';
				}
				
				echo GUI::printCombo($arrFields, "formLink[$i][leftlink]", true, $curLeftLink, false );
				echo GUI::printCombo($data->joinOps, "formLink[$i][operator]", true, $formLink[$i]['operator']);
				echo GUI::printCombo($arrFields, "formLink[$i][rightlink]", true, $curRightLink, false );
				echo "</td>\n</tr>\n";
				$rowClass = $rowClass == 'data1' ? 'data2' : 'data1';
			
			}
			echo "</table>\n<br />\n";			
						
			// Output additional conditions			
			$arrOperators = array('=' => '=', 'LIKE' => 'LIKE', '!=' => '!=', '>' => '>', '<' =>'<', 'IN' => 'IN', '!!=' => '!!=', 'BETWEEN' => 'BETWEEN');
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strviewconditions']}</th></tr>";					
			$rowClass = 'data1';
			for ($i = 0; $i < 3; $i++) {				
				echo "<tr>\n<td class=\"$rowClass\">\n";
				echo GUI::printCombo($arrFields, "formCondition[$i][field]");
				echo GUI::printCombo($arrOperators, "formCondition[$i][operator]", false, false);
				echo "<input type=\"text\" name=\"formCondition[$i][txt]\" />\n";
				echo "</td>\n</tr>\n";
				$rowClass = $rowClass == 'data1' ? 'data2' : 'data1';
			}			
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" id=\"action\" value=\"save_create_wiz\" />\n";			
			echo "<input type=\"submit\" value=\"{$lang['strnext']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
						
			foreach ($_POST['formTables'] AS $curTable) {
				echo "<input type=\"hidden\" name=\"formTables[]\" id=\"formTables[]\" value=\"" . htmlspecialchars("\"$curTable\"") . "\" />\n";
			}
			
			echo $misc->form;
			echo "</form>\n";
		}	
	}
	
	/**
	 * Display a wizard where they can enter a new view
	 */
	function doWizardCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		$tables = &$data->getTables();
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: {$lang['strcreateviewwiz']}</h2>\n";		
		$misc->printMsg($msg);
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strtables']}</th></tr>";		
		echo "<tr>\n<td class=\"data1\">\n";		
		
		$arrTables = array();
		while (!$tables->EOF) {			
			$arrTables[$tables->f[$data->tbFields['tbname']]] = $tables->f[$data->tbFields['tbname']];			
			$tables->moveNext();
		}		
		echo GUI::printCombo($arrTables, 'formTables[]', false, '', true);			
		
		echo "</td>\n</tr>\n";		
		echo "</table>\n";		
		echo "<p><input type=\"submit\" value=\"{$lang['strnext']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"set_params_create\" />\n";
		echo $misc->form;
		echo "</form>\n";
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
		echo "\t\t<td class=\"data1\"><input size=\"64\" name=\"formComment\" value=\"", 
			htmlspecialchars($_REQUEST['formComment']), "\" /></td>\n\t</tr>\n";
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
		global $data, $lang, $_reload_browser;
		
		// Check that they've given a name and a definition
		if ($_POST['formView'] == '') doCreate($lang['strviewneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strviewneedsdef']);
		else {		 
			$status = $data->createView($_POST['formView'], $_POST['formDefinition'], false, $_POST['formComment']);
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strviewcreated']);
			}
			else
				doCreate($lang['strviewcreatedbad']);
		}
	}	

  	/**
	 * Actually creates the new wizard view in the database
	 */
	function doSaveCreateWiz() {
		global $data, $lang;
		
		// Check that they've given a name and fields they want to select		
	
		if (!strlen($_POST['formView']) ) doSetParamsCreate($lang['strviewneedsname']);
		else if (!isset($_POST['formFields']) || !count($_POST['formFields']) ) doSetParamsCreate($lang['strviewneedsfields']);
		else {		 
			$selTables = implode(', ', $_POST['formTables']);		
			$selFields = implode(', ', $_POST['formFields']);		
			
			$linkFields = '';
			
			if (is_array($_POST['formLink']) ) {
				
				// Filter out invalid/blank entries for our links
				$arrLinks = array();
				foreach ($_POST['formLink'] AS $curLink) {
					if (strlen($curLink['leftlink']) && strlen($curLink['rightlink']) && strlen($curLink['operator'])) {
						$arrLinks[] = $curLink;
					}
				}				
				// We must perform some magic to make sure that we have a valid join order
				$count = count($arrLinks);
				$arrJoined = array();
				$arrUsedTbls = array();								
								
				$j = 0;
				while ($j < $count) {					
					foreach ($arrLinks AS $curLink) {
						
						$tbl1 = substr($curLink['leftlink'], 0, strpos($curLink['leftlink'], '.') );
						$tbl2 = substr($curLink['rightlink'], 0, strpos($curLink['rightlink'], '.') );
												
						if ( (!in_array($curLink, $arrJoined) && in_array($tbl1, $arrUsedTbls)) || !count($arrJoined) ) {
														
							//make sure for multi-column foreign keys that we use a table alias tables joined to more than once
							//this can (and should be) more optimized for multi-column foreign keys
							$adj_tbl2 = in_array($tbl2, $arrUsedTbls) ? "$tbl2 AS alias_ppa_" . mktime() : $tbl2;
							
							$linkFields .= strlen($linkFields) ? "{$curLink['operator']} $adj_tbl2 ON ({$curLink['leftlink']} = {$curLink['rightlink']}) " : "$tbl1 {$curLink['operator']} $adj_tbl2 ON ({$curLink['leftlink']} = {$curLink['rightlink']}) ";
							$arrJoined[] = $curLink;
							if (!in_array($tbl1, $arrUsedTbls) )  $arrUsedTbls[] = $tbl1;
							if (!in_array($tbl2, $arrUsedTbls) )  $arrUsedTbls[] = $tbl2;
						}						
					}
					$j++;					
				}
			}
			
			$addConditions = '';
			if (is_array($_POST['formCondition']) ) {
				foreach ($_POST['formCondition'] AS $curCondition) {
					if (strlen($curCondition['field']) && strlen($curCondition['txt']) ) {
						$addConditions .= strlen($addConditions) ? ' AND ' . "{$curCondition['field']} {$curCondition['operator']} '{$curCondition['txt']}' " : " {$curCondition['field']} {$curCondition['operator']} '{$curCondition['txt']}' ";
					}	
				}		
			}
			
			$viewQuery = "SELECT $selFields FROM $linkFields ";
			
			//add where from additional conditions
			if (strlen($addConditions) ) $viewQuery .= ' WHERE ' . $addConditions;
			
			$status = $data->createView($_POST['formView'], $viewQuery, false, $_POST['formComment']);
			
			if ($status == 0)
				doDefault($lang['strviewcreated']);
			else				
				doSetParamsCreate($lang['strviewcreatedbad']);
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
			echo "<th colspan=\"4\" class=\"data\">{$lang['stractions']}</th>\n";
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
				echo "<td class=\"opbutton{$id}\"><a href=\"viewproperties.php?{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strdrop']}</a></td>\n";
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
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreateview']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=wiz_create&{$misc->href}\">{$lang['strcreateviewwiz']}</a></p>\n";

	}

	$misc->printHeader($lang['strviews']);
	$misc->printBody();

	switch ($action) {
		case 'selectrows':
			if (!isset($_REQUEST['cancel'])) doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
			break;
		case 'save_create_wiz':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doSaveCreateWiz();
			break;
		case 'wiz_create':
			doWizardCreate();
			break;
		case 'set_params_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSetParamsCreate();
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
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
