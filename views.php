<?php

	/**
	 * Manage views in a database
	 *
	 * $Id: views.php,v 1.54 2005/10/18 03:45:16 chriskl Exp $
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
			$misc->printTrail('view');
			$misc->printTitle($lang['strselect'], 'pg.sql.select');
			$misc->printMsg($msg);

			$attrs = $data->getTableAttributes($_REQUEST['view']);

			echo "<form action=\"$PHP_SELF\" method=\"get\" name=\"selectform\">\n";
			if ($attrs->recordCount() > 0) {
				// JavaScript for select all feature
				echo "<script type=\"text/javascript\">\n";
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
				echo "<tr><th class=\"data\">{$lang['strshow']}</th><th class=\"data\">{$lang['strcolumn']}</th>";
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
			echo "<input type=\"hidden\" name=\"subject\" value=\"view\" />\n";
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
			$misc->printTrail('view');
			$misc->printTitle($lang['strdrop'],'pg.view.drop');
			
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
			
			$misc->printTrail('schema');
			$misc->printTitle($lang['strcreateviewwiz'], 'pg.view.create');
			$misc->printMsg($msg);
			
			$tblCount = sizeof($_POST['formTables']);
			//unserialize our schema/table information and store in arrSelTables
			for ($i = 0; $i < $tblCount; $i++) {
				$arrSelTables[] = unserialize($_POST['formTables'][$i]);
			}
			
			$linkCount = $tblCount;
			// If we can get foreign key info then get our linking keys
			if ($data->hasForeignKeysInfo()) {
				$rsLinkKeys = $data->getLinkingKeys($arrSelTables);
				$linkCount = $rsLinkKeys->recordCount() > $tblCount ? $rsLinkKeys->recordCount() : $tblCount;
			}
			
			$arrFields = array(); //array that will hold all our table/field names
			
			//if we have schemas we need to specify the correct schema for each table we're retrieiving
			//with getTableAttributes
			$curSchema = $data->hasSchemas() ? $data->_schema : NULL;
			for ($i = 0; $i < $tblCount; $i++) {
				if ($data->hasSchemas() && $data->_schema != $arrSelTables[$i]['schemaname']) {
					$data->setSchema($arrSelTables[$i]['schemaname']);
				}
				
				$attrs = $data->getTableAttributes($arrSelTables[$i]['tablename']);
				while (!$attrs->EOF) {
					if ($data->hasSchemas() ) {
						$arrFields["{$arrSelTables[$i]['schemaname']}.{$arrSelTables[$i]['tablename']}.{$attrs->f['attname']}"] = serialize(array('schemaname' => $arrSelTables[$i]['schemaname'], 'tablename' => $arrSelTables[$i]['tablename'], 'fieldname' => $attrs->f['attname']) );
					}
					else {
						$arrFields["{$arrSelTables[$i]['tablename']}.{$attrs->f['attname']}"] = serialize(array('schemaname' => NULL, 'tablename' => $arrSelTables[$i]['tablename'], 'fieldname' => $attrs->f['attname']) );
					}
					$attrs->moveNext();
				}
				
				//reset back to our original schema in case we switched from it
				if ($data->hasSchemas() ) {
					$data->setSchema($curSchema);
				}
			}
			asort($arrFields);
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strviewname']}</th></tr>";
			echo "<tr>\n<td class=\"data1\">\n";
			// View name
			echo "<input name=\"formView\" id=\"formView\" value=\"", htmlspecialchars($_REQUEST['formView']), "\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
			echo "</td>\n</tr>\n";
			echo "<tr><th class=\"data\">{$lang['strcomment']}</th></tr>";
			echo "<tr>\n<td class=\"data1\">\n";
			// View comments
			echo "<textarea name=\"formComment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
				htmlspecialchars($_REQUEST['formComment']), "</textarea>\n";
			echo "</td>\n</tr>\n";
			echo "</table>\n";
			
			// Output selector for fields to be retrieved from view
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strcolumns']}</th></tr>";
			echo "<tr>\n<td class=\"data1\">\n";
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
				
				if ($data->hasForeignKeysInfo() && !$rsLinkKeys->EOF) {
					$curLeftLink = htmlspecialchars(serialize(array('schemaname' => $rsLinkKeys->f['p_schema'], 'tablename' => $rsLinkKeys->f['p_table'], 'fieldname' => $rsLinkKeys->f['p_field']) ) );
					$curRightLink = htmlspecialchars(serialize(array('schemaname' => $rsLinkKeys->f['f_schema'], 'tablename' => $rsLinkKeys->f['f_table'], 'fieldname' => $rsLinkKeys->f['f_field']) ) );
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
			
			// Build list of available operators (infix only)
			$arrOperators = array();
			foreach ($data->selectOps as $k => $v) {
				if ($v == 'i') $arrOperators[$k] = $k;
			}

			// Output additional conditions, note that this portion of the wizard treats the right hand side as literal values 
			//(not as database objects) so field names will be treated as strings, use the above linking keys section to perform joins
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strviewconditions']}</th></tr>";
			$rowClass = 'data1';
			for ($i = 0; $i < $linkCount; $i++) {
				echo "<tr>\n<td class=\"$rowClass\">\n";
				echo GUI::printCombo($arrFields, "formCondition[$i][field]");
				echo GUI::printCombo($arrOperators, "formCondition[$i][operator]", false, false);
				echo "<input type=\"text\" name=\"formCondition[$i][txt]\" />\n";
				echo "</td>\n</tr>\n";
				$rowClass = $rowClass == 'data1' ? 'data2' : 'data1';
			}
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" id=\"action\" value=\"save_create_wiz\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			
			foreach ($arrSelTables AS $curTable) {
				echo "<input type=\"hidden\" name=\"formTables[]\" id=\"formTables[]\" value=\"" . htmlspecialchars(serialize($curTable) ) . "\" />\n";
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
		
		$tables = $data->getTables(true);
		
		$misc->printTrail('schema');
		$misc->printTitle($lang['strcreateviewwiz'], 'pg.view.create');
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strtables']}</th></tr>";		
		echo "<tr>\n<td class=\"data1\">\n";		
		
		$arrTables = array();
		while (!$tables->EOF) {						
			$arrTmp = array();
			$arrTmp['schemaname'] = $tables->f['nspname'];
			$arrTmp['tablename'] = $tables->f['relname'];
			if ($data->hasSchemas() ) { //if schemas aren't available don't show them in the interface
				$arrTables[$tables->f['nspname'] . '.' . $tables->f['relname']] = serialize($arrTmp);
			}
			else {
				$arrTables[$tables->f['relname']] = serialize($arrTmp);
			}
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
		
		$misc->printTrail('schema');
		$misc->printTitle($lang['strcreateview'], 'pg.view.create');
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
		echo "\t\t<td class=\"data1\"><textarea name=\"formComment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
			htmlspecialchars($_REQUEST['formComment']), "</textarea></td>\n\t</tr>\n";
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
		global $data, $lang, $_reload_browser;
		
		// Check that they've given a name and fields they want to select		
	
		if (!strlen($_POST['formView']) ) doSetParamsCreate($lang['strviewneedsname']);
		else if (!isset($_POST['formFields']) || !count($_POST['formFields']) ) doSetParamsCreate($lang['strviewneedsfields']);
		else {						
			$selFields = '';						
			foreach ($_POST['formFields'] AS $curField) {
				$arrTmp = unserialize($curField);
				if ($data->hasSchemas() ) {					
					$selFields .= strlen($selFields) ? ", \"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\"" : "\"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\"";
				}
				else {
					$selFields .= strlen($selFields) ? ", \"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\"" : "\"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\"";
				}				
			}			
			
			$linkFields = '';

			// If we have links, out put the JOIN ... ON statements
			if (is_array($_POST['formLink']) ) {
				// Filter out invalid/blank entries for our links
				$arrLinks = array();
				foreach ($_POST['formLink'] AS $curLink) {
					if (strlen($curLink['leftlink']) && strlen($curLink['rightlink']) && strlen($curLink['operator'])) {
						$arrLinks[] = $curLink;
					}
				}				
				// We must perform some magic to make sure that we have a valid join order
				$count = sizeof($arrLinks);
				$arrJoined = array();
				$arrUsedTbls = array();								

				// If we have at least one join condition, output it
				if ($count > 0) {
					$j = 0;
					while ($j < $count) {					
						foreach ($arrLinks AS $curLink) {
							
							$arrLeftLink = unserialize($curLink['leftlink']);
							$arrRightLink = unserialize($curLink['rightlink']);
							
							$tbl1 = $data->hasSchemas() ? "\"{$arrLeftLink['schemaname']}\".\"{$arrLeftLink['tablename']}\"" : $arrLeftLink['tablename'];
							$tbl2 = $data->hasSchemas() ? "\"{$arrRightLink['schemaname']}\".\"{$arrRightLink['tablename']}\"" : $arrRightLink['tablename'];
							
							if ( (!in_array($curLink, $arrJoined) && in_array($tbl1, $arrUsedTbls)) || !count($arrJoined) ) {
								
								// Make sure for multi-column foreign keys that we use a table alias tables joined to more than once
								// This can (and should be) more optimized for multi-column foreign keys
								$adj_tbl2 = in_array($tbl2, $arrUsedTbls) ? "$tbl2 AS alias_ppa_" . mktime() : $tbl2;
								
								if ($data->hasSchemas() ) {
									$linkFields .= strlen($linkFields) ? "{$curLink['operator']} $adj_tbl2 ON (\"{$arrLeftLink['schemaname']}\".\"{$arrLeftLink['tablename']}\".\"{$arrLeftLink['fieldname']}\" = \"{$arrRightLink['schemaname']}\".\"{$arrRightLink['tablename']}\".\"{$arrRightLink['fieldname']}\") " : "$tbl1 {$curLink['operator']} $adj_tbl2 ON (\"{$arrLeftLink['schemaname']}\".\"{$arrLeftLink['tablename']}\".\"{$arrLeftLink['fieldname']}\" = \"{$arrRightLink['schemaname']}\".\"{$arrRightLink['tablename']}\".\"{$arrRightLink['fieldname']}\") ";
								}
								else {
									$linkFields .= strlen($linkFields) ? "{$curLink['operator']} $adj_tbl2 ON (\"{$arrLeftLink['tablename']}\".\"{$arrLeftLink['fieldname']}\" = \"{$arrRightLink['tablename']}\".\"{$arrRightLink['fieldname']}\") " : "$tbl1 {$curLink['operator']} $adj_tbl2 ON (\"{$arrLeftLink['tablename']}\".\"{$arrLeftLink['fieldname']}\" = \"{$arrRightLink['tablename']}\".\"{$arrRightLink['fieldname']}\") ";
								}
								
								$arrJoined[] = $curLink;
								if (!in_array($tbl1, $arrUsedTbls) )  $arrUsedTbls[] = $tbl1;
								if (!in_array($tbl2, $arrUsedTbls) )  $arrUsedTbls[] = $tbl2;
							}
						}
						$j++;
					}
				}
			}
			
			//if linkfields has no length then either _POST['formLink'] was not set, or there were no join conditions 
			//just select from all seleted tables - a cartesian join do a
			if (!strlen($linkFields) ) {
				foreach ($_POST['formTables'] AS $curTable) {
					$arrTmp = unserialize($curTable);
					if ($data->hasSchemas() ) {
						$linkFields .= strlen($linkFields) ? ", \"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\"" : "\"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\"";
					}
					else {
						$linkFields .= strlen($linkFields) ? ", \"{$arrTmp['tablename']}\"" : "\"{$arrTmp['tablename']}\"";
					}
				}
			}
			
			$addConditions = '';
			if (is_array($_POST['formCondition']) ) {
				foreach ($_POST['formCondition'] AS $curCondition) {
					if (strlen($curCondition['field']) && strlen($curCondition['txt']) ) {
						$arrTmp = unserialize($curCondition['field']);
						if ($data->hasSchemas() ) {
							$addConditions .= strlen($addConditions) ? " AND \"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\" {$curCondition['operator']} '{$curCondition['txt']}' " : " \"{$arrTmp['schemaname']}\".\"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\" {$curCondition['operator']} '{$curCondition['txt']}' ";
						}
						else {
							$addConditions .= strlen($addConditions) ? " AND \"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\" {$curCondition['field']} {$curCondition['operator']} '{$curCondition['txt']}' " : " \"{$arrTmp['tablename']}\".\"{$arrTmp['fieldname']}\" {$curCondition['operator']} '{$curCondition['txt']}' ";
						}
					}
				}
			}
			
			$viewQuery = "SELECT $selFields FROM $linkFields ";
			
			//add where from additional conditions
			if (strlen($addConditions) ) $viewQuery .= ' WHERE ' . $addConditions;
			
			$status = $data->createView($_POST['formView'], $viewQuery, false, $_POST['formComment']);
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strviewcreated']);
			}
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
		
		$misc->printTrail('schema');
		$misc->printTabs('schema','views');
		$misc->printMsg($msg);
		
		$views = $data->getViews();
		
		$columns = array(
			'view' => array(
				'title'	=> $lang['strview'],
				'field'	=> 'relname',
			),
			'owner' => array(
				'title'	=> $lang['strowner'],
				'field'	=> 'relowner',
			),
			'actions' => array(
				'title'	=> $lang['stractions'],
			),
			'comment' => array(
				'title'	=> $lang['strcomment'],
				'field'	=> 'relcomment',
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'	=> "redirect.php?subject=view&amp;{$misc->href}&amp;",
				'vars'	=> array('view' => 'relname'),
			),
			'browse' => array(
				'title'	=> $lang['strbrowse'],
				'url'	=> "display.php?{$misc->href}&amp;subject=view&amp;return_url=".urlencode("views.php?{$misc->href}")."&amp;return_desc=".urlencode($lang['strback'])."&amp;",
				'vars'	=> array('view' => 'relname'),
			),
			'select' => array(
				'title'	=> $lang['strselect'],
				'url'	=> "{$PHP_SELF}?action=confselectrows&amp;{$misc->href}&amp;",
				'vars'	=> array('view' => 'relname'),
			),
			
// Insert is possible if the relevant rule for the view has been created.
//			'insert' => array(
//				'title'	=> $lang['strinsert'],
//				'url'	=> "{$PHP_SELF}?action=confinsertrow&amp;{$misc->href}&amp;",
//				'vars'	=> array('view' => 'relname'),
//			),

			'drop' => array(
				'title'	=> $lang['strdrop'],
				'url'	=> "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'	=> array('view' => 'relname'),
			),
		);
		
		$misc->printTable($views, $columns, $actions, $lang['strnoviews']);
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreateview']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=wiz_create&amp;{$misc->href}\">{$lang['strcreateviewwiz']}</a></p>\n";

	}
	
	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$views = $data->getViews();
		
		$reqvars = $misc->getRequestVars('view');
		
		$attrs = array(
			'text'   => field('relname'),
			'icon'   => 'views',
			'toolTip'=> field('relcomment'),
			'action' => url('redirect.php',
							$reqvars,
							array('view' => field('relname'))
						)
		);
		
		$misc->printTreeXML($views, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
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
