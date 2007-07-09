<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.82.2.2 2007/07/09 14:55:22 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

	/**
	 * Displays a screen where they can enter a new table
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $lang;

		if (!isset($_REQUEST['stage'])) {
			$_REQUEST['stage'] = 1;
			$default_with_oids = $data->getDefaultWithOid();
			if ($default_with_oids == 'off') $_REQUEST['withoutoids'] = 'on';
		}
			
		if (!isset($_REQUEST['name'])) $_REQUEST['name'] = '';
		if (!isset($_REQUEST['fields'])) $_REQUEST['fields'] = '';
		if (!isset($_REQUEST['tblcomment'])) $_REQUEST['tblcomment'] = '';
		if (!isset($_REQUEST['spcname'])) $_REQUEST['spcname'] = '';

		switch ($_REQUEST['stage']) {
			case 1:
				// Fetch all tablespaces from the database
				if ($data->hasTablespaces()) $tablespaces = $data->getTablespaces();
				
				$misc->printTrail('schema');
				$misc->printTitle($lang['strcreatetable'], 'pg.table.create');
				$misc->printMsg($msg);
				
				echo "<form action=\"tables.php\" method=\"post\">\n";
				echo "<table>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
				echo "\t\t<td class=\"data\"><input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['name']), "\" /></td>\n\t</tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strnumcols']}</th>\n";
				echo "\t\t<td class=\"data\"><input name=\"fields\" size=\"5\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['fields']), "\" /></td>\n\t</tr>\n";
				if ($data->hasWithoutOIDs()) {
					echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['stroptions']}</th>\n";
					echo "\t\t<td class=\"data\"><label for=\"withoutoids\"><input type=\"checkbox\" id=\"withoutoids\" name=\"withoutoids\"", isset($_REQUEST['withoutoids']) ? ' checked="checked"' : '', " />WITHOUT OIDS</label></td>\n\t</tr>\n";
				}
				
				// Tablespace (if there are any)
				if ($data->hasTablespaces() && $tablespaces->recordCount() > 0) {
					echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strtablespace']}</th>\n";
					echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"spcname\">\n";
					// Always offer the default (empty) option
					echo "\t\t\t\t<option value=\"\"",
						($_REQUEST['spcname'] == '') ? ' selected="selected"' : '', "></option>\n";
					// Display all other tablespaces
					while (!$tablespaces->EOF) {
						$spcname = htmlspecialchars($tablespaces->f['spcname']);
						echo "\t\t\t\t<option value=\"{$spcname}\"",
							($spcname == $_REQUEST['spcname']) ? ' selected="selected"' : '', ">{$spcname}</option>\n";
						$tablespaces->moveNext();
					}
					echo "\t\t\t</select>\n\t\t</td>\n\t</tr>\n";
				}

				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
				echo "\t\t<td><textarea name=\"tblcomment\" rows=\"3\" cols=\"32\" wrap=\"virtual\">", 
					htmlspecialchars($_REQUEST['tblcomment']), "</textarea></td>\n\t</tr>\n";

				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"create\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo $misc->form;
				echo "<input type=\"submit\" value=\"{$lang['strnext']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";
				break;
			case 2:
				global $lang;

				// Check inputs
				$fields = trim($_REQUEST['fields']);
				if (trim($_REQUEST['name']) == '') {
					$_REQUEST['stage'] = 1;
					doCreate($lang['strtableneedsname']);
					return;
				}
				elseif ($fields == '' || !is_numeric($fields) || $fields != (int)$fields || $fields < 1)  {
					$_REQUEST['stage'] = 1;
					doCreate($lang['strtableneedscols']);
					return;
				}

				$types = $data->getTypes(true, false, true);
				$types_for_js = array();

				$misc->printTrail('schema');
				$misc->printTitle($lang['strcreatetable'], 'pg.table.create');
				$misc->printMsg($msg);

				echo "<script src=\"tables.js\" type=\"text/javascript\"></script>";
				echo "<form action=\"tables.php\" method=\"post\">\n";

				// Output table header
				echo "<table>\n";
				echo "\t<tr><th colspan=\"2\" class=\"data required\">{$lang['strcolumn']}</th><th colspan=\"2\" class=\"data required\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strlength']}</th><th class=\"data\">{$lang['strnotnull']}</th>";
				echo "<th class=\"data\">{$lang['struniquekey']}</th><th class=\"data\">{$lang['strprimarykey']}</th>";
				echo "<th class=\"data\">{$lang['strdefault']}</th><th class=\"data\">{$lang['strcomment']}</th></tr>\n";
				
				for ($i = 0; $i < $_REQUEST['fields']; $i++) {
					if (!isset($_REQUEST['field'][$i])) $_REQUEST['field'][$i] = '';
					if (!isset($_REQUEST['length'][$i])) $_REQUEST['length'][$i] = '';
					if (!isset($_REQUEST['default'][$i])) $_REQUEST['default'][$i] = '';
					if (!isset($_REQUEST['colcomment'][$i])) $_REQUEST['colcomment'][$i] = '';

					echo "\t<tr>\n\t\t<td>", $i + 1, ".&nbsp;</td>\n";
					echo "\t\t<td><input name=\"field[{$i}]\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
						htmlspecialchars($_REQUEST['field'][$i]), "\" /></td>\n";
					echo "\t\t<td>\n\t\t\t<select name=\"type[{$i}]\" id=\"types{$i}\" onchange=\"checkLengths(this.options[this.selectedIndex].value,{$i});\">\n";
					// Output any "magic" types
					foreach ($data->extraTypes as $v) {
						$types_for_js[strtolower($v)] = 1;
						echo "\t\t\t\t<option value=\"", htmlspecialchars($v), "\"",
						(isset($_REQUEST['type'][$i]) && $v == $_REQUEST['type'][$i]) ? ' selected="selected"' : '', ">",
							$misc->printVal($v), "</option>\n";
					}
					$types->moveFirst();
					while (!$types->EOF) {
						$typname = $types->f['typname'];
						$types_for_js[$typname] = 1;
						echo "\t\t\t\t<option value=\"", htmlspecialchars($typname), "\"",
						(isset($_REQUEST['type'][$i]) && $typname == $_REQUEST['type'][$i]) ? ' selected="selected"' : '', ">",
							$misc->printVal($typname), "</option>\n";
						$types->moveNext();
					}
					echo "\t\t\t</select>\n\t\t\n";
					if($i==0) { // only define js types array once
						$predefined_size_types = array_intersect($data->predefined_size_types,array_keys($types_for_js));
						$escaped_predef_types = array(); // the JS escaped array elements
						foreach($predefined_size_types as $value) {
							$escaped_predef_types[] = "'{$value}'";
						}
						echo "<script type=\"text/javascript\">predefined_lengths = new Array(". implode(",",$escaped_predef_types) .");</script>\n\t</td>";
					}
					
					// Output array type selector
					echo "\t\t<td>\n\t\t\t<select name=\"array[{$i}]\">\n";
					echo "\t\t\t\t<option value=\"\"", (isset($_REQUEST['array'][$i]) && $_REQUEST['array'][$i] == '') ? ' selected="selected"' : '', "></option>\n";
					echo "\t\t\t\t<option value=\"[]\"", (isset($_REQUEST['array'][$i]) && $_REQUEST['array'][$i] == '[]') ? ' selected="selected"' : '', ">[ ]</option>\n";
					echo "\t\t\t</select>\n\t\t</td>\n";
					
					echo "\t\t<td><input name=\"length[{$i}]\" id=\"lengths{$i}\" size=\"10\" value=\"", 
						htmlspecialchars($_REQUEST['length'][$i]), "\" /></td>\n";
					echo "\t\t<td><input type=\"checkbox\" name=\"notnull[{$i}]\"", (isset($_REQUEST['notnull'][$i])) ? ' checked="checked"' : '', " /></td>\n";
					echo "\t\t<td align=\"center\"><input type=\"checkbox\" name=\"uniquekey[{$i}]\""
						.(isset($_REQUEST['uniquekey'][$i]) ? ' checked="checked"' :'')." /></td>\n";
					echo "\t\t<td align=\"center\"><input type=\"checkbox\" name=\"primarykey[{$i}]\" "
						.(isset($_REQUEST['primarykey'][$i]) ? ' checked="checked"' : '')
						." /></td>\n";
					echo "\t\t<td><input name=\"default[{$i}]\" size=\"20\" value=\"", 
						htmlspecialchars($_REQUEST['default'][$i]), "\" /></td>\n";
					echo "\t\t<td><input name=\"colcomment[{$i}]\" size=\"40\" value=\"", 
						htmlspecialchars($_REQUEST['colcomment'][$i]), "\" />
						<script type=\"text/javascript\">checkLengths(document.getElementById('types{$i}').value,{$i});</script>
						</td>\n\t</tr>\n";
				}	
				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"create\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"3\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"name\" value=\"", htmlspecialchars($_REQUEST['name']), "\" />\n";
				echo "<input type=\"hidden\" name=\"fields\" value=\"", htmlspecialchars($_REQUEST['fields']), "\" />\n";
				if (isset($_REQUEST['withoutoids'])) {
					echo "<input type=\"hidden\" name=\"withoutoids\" value=\"true\" />\n";
				}
				echo "<input type=\"hidden\" name=\"tblcomment\" value=\"", htmlspecialchars($_REQUEST['tblcomment']), "\" />\n";
				if (isset($_REQUEST['spcname'])) {
					echo "<input type=\"hidden\" name=\"spcname\" value=\"", htmlspecialchars($_REQUEST['spcname']), "\" />\n";
				}
				echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";
								
				break;
			case 3:
				global $data, $lang, $_reload_browser;
				
				if (!isset($_REQUEST['notnull'])) $_REQUEST['notnull'] = array();
				if (!isset($_REQUEST['uniquekey'])) $_REQUEST['uniquekey'] = array();
				if (!isset($_REQUEST['primarykey'])) $_REQUEST['primarykey'] = array();
				// Default tablespace to null if it isn't set
				if (!isset($_REQUEST['spcname'])) $_REQUEST['spcname'] = null;

				// Check inputs
				$fields = trim($_REQUEST['fields']);
				if (trim($_REQUEST['name']) == '') {
					$_REQUEST['stage'] = 1;
					doCreate($lang['strtableneedsname']);
					return;
				}
				elseif ($fields == '' || !is_numeric($fields) || $fields != (int)$fields || $fields <= 0)  {
					$_REQUEST['stage'] = 1;
					doCreate($lang['strtableneedscols']);	
					return;
				}
				
				$status = $data->createTable($_REQUEST['name'], $_REQUEST['fields'], $_REQUEST['field'],
								$_REQUEST['type'], $_REQUEST['array'], $_REQUEST['length'], $_REQUEST['notnull'], $_REQUEST['default'],
								isset($_REQUEST['withoutoids']), $_REQUEST['colcomment'], $_REQUEST['tblcomment'], $_REQUEST['spcname'],
								$_REQUEST['uniquekey'], $_REQUEST['primarykey']);

				if ($status == 0) {
					$_reload_browser = true;
					doDefault($lang['strtablecreated']);
				}
				elseif ($status == -1) {
					$_REQUEST['stage'] = 2;
					doCreate($lang['strtableneedsfield']);
					return;
				}
				else {
					$_REQUEST['stage'] = 2;
					doCreate($lang['strtablecreatedbad']);
					return;
				}
				break;
			default:
				echo "<p>{$lang['strinvalidparam']}</p>\n";
		}
	}

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $data, $misc, $_no_output;
		global $lang;

		if ($confirm) {
			$misc->printTrail('table');
			$misc->printTitle($lang['strselect'], 'pg.sql.select');
			$misc->printMsg($msg);

			$attrs = $data->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"tables.php\" method=\"post\" name=\"selectform\">\n";
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
				echo "<tr><td colspan=\"5\"><input type=\"checkbox\" id=\"selectall\" name=\"selectall\" onClick=\"javascript:selectAll()\" /><label for=\"selectall\">{$lang['strselectallfields']}</label></td>";
				echo "</table></p>\n";
			}
			else echo "<p>{$lang['strinvalidparam']}</p>\n";

			echo "<p><input type=\"hidden\" name=\"action\" value=\"selectrows\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"subject\" value=\"table\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"select\" value=\"{$lang['strselect']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['show'])) $_POST['show'] = array();
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			// Verify that they haven't supplied a value for unary operators
			foreach ($_POST['ops'] as $k => $v) {
				if ($data->selectOps[$v] == 'p' && $_POST['values'][$k] != '') {
					doSelectRows(true, $lang['strselectunary']);
					return;
				}
			}
			
			if (sizeof($_POST['show']) == 0)
				doSelectRows(true, $lang['strselectneedscol']);
			else {
				// Generate query SQL
				$query = $data->getSelectSQL($_REQUEST['table'], array_keys($_POST['show']),
					$_POST['values'], $_POST['ops']);
				$_REQUEST['query'] = $query;
				$_REQUEST['return_url'] = "tables.php?action=confselectrows&amp;{$misc->href}&amp;table={$_REQUEST['table']}";
				$_REQUEST['return_desc'] = $lang['strback'];

				$_no_output = true;
				include('./display.php');
				exit;
			}
		}

	}

	/**
	 * Ask for insert parameters and then actually insert row
	 */
	function doInsertRow($confirm, $msg = '') {
		global $data, $misc, $conf;
		global $lang;

		$bAllowAC = ($conf["autocomplete"]!='disable') ? TRUE : FALSE ;

		if ($confirm) {
			$misc->printTrail('table');
			$misc->printTitle($lang['strinsertrow'], 'pg.sql.insert');
			$misc->printMsg($msg);

			$attrs = $data->getTableAttributes($_REQUEST['table']);
			if($bAllowAC) {
				$constraints = $data->getConstraints($_REQUEST['table']);
				$arrayLocals = array();
				$arrayRefs = array();
				$nC = 0;
				// A word of caution, the following does not support multicolumn FK's at the moment
				while(!$constraints->EOF) {
					preg_match('/foreign key \((\w+)\) references ([\w]+)\((\w+)\)/i',$constraints->fields["consrc"],$matches);
					if(!empty($matches)) {
						$arrayLocals[$nC] = $matches[1];
						$arrayRefs[$nC] = array($matches[2],$matches[3]);
						$nC++;
					}
					$constraints->moveNext();
				}
			}

			echo "<form action=\"tables.php\" method=\"post\" id=\"ac_form\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strcolumn']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";
				
				$i = 0;
				while (!$attrs->EOF) {
					$szValueName = "values[{$attrs->f['attname']}]";
					$szEvents = "";
					$szDivPH = "";
					if($bAllowAC) {
						if(($idxFound = array_search($attrs->f['attname'],$arrayLocals))!==false) {
							$szEvent = "makeAC('{$szValueName}',{$i},'{$arrayRefs[$idxFound][0]}','{$arrayRefs[$idxFound][1]}','{$_REQUEST["server"]}','{$_REQUEST["database"]}');";
							$szEvents = "onfocus=\"{$szEvent}\" onblur=\"hideAC();document.getElementById('ac_form').onsubmit=function(){return true;};\" onchange=\"{$szEvent}\" id=\"{$szValueName}\" onkeyup=\"{$szEvent}\" autocomplete=\"off\" class='ac_field'";
							$szDivPH = "<div id=\"fac{$i}_ph\"></div>";
						}
					}
					$attrs->f['attnotnull'] = $data->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = $attrs->f['adsrc'];
					// Default format to 'VALUE' if there is no default,
					// otherwise default to 'EXPRESSION'
					if (!isset($_REQUEST['format'][$attrs->f['attname']]))
						$_REQUEST['format'][$attrs->f['attname']] = ($attrs->f['adsrc'] === null) ? 'VALUE' : 'EXPRESSION';
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo $misc->printVal($data->formatType($attrs->f['type'], $attrs->f['atttypmod']));
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->f['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->f['type']), "\" /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->f['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->f['attname']] == 'VALUE') ? ' selected="selected"' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->f['attname']] == 'EXPRESSION') ? ' selected="selected"' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull']) {
						echo "<input type=\"checkbox\" name=\"nulls[", htmlspecialchars($attrs->f['attname']), "]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					}
					else {
						echo "&nbsp;</td>";
					}
					echo "<td class=\"data{$id}\" id=\"aciwp{$i}\" nowrap=\"nowrap\">", $data->printField($szValueName,
					$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type'],array(),$szEvents),$szDivPH ,"</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table>\n";
				if($bAllowAC) {
					echo '<script src="aciur.js" type="text/javascript"></script>';
					echo "<div id=\"ac\"></div>";
				}
			}
			else echo "<p>{$lang['strnodata']}</p>\n";
			
			if (!isset($_SESSION['counter'])) { $_SESSION['counter'] = 0; }

			echo "<input type=\"hidden\" name=\"action\" value=\"insertrow\" />\n";
			echo "<input type=\"hidden\" name=\"protection_counter\" value=\"".$_SESSION['counter']."\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"insert\" value=\"{$lang['strinsert']}\" />\n";
			echo "<input type=\"submit\" name=\"insertandrepeat\" value=\"{$lang['strinsertandrepeat']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			if($bAllowAC) {
				$szChecked = $conf["autocomplete"]!='default off' ? "checked=\"checked\"" : "";
				echo "<input type=\"checkbox\" name=\"no_ac\" id=\"no_ac\" onclick=\"rEB(this.checked);\" value=\"1\" {$szChecked} /><label for='no_ac' onmouseover='this.style.cursor=\"pointer\";'>{$lang['strac']}</label>\n";
			}
			echo "</p>\n";
			echo "</form>\n";
			echo "<script type=\"text/javascript\">rEB(document.getElementById('no_ac').checked);</script>";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();

			if ($_SESSION['counter']++ == $_POST['protection_counter']) {
				$status = $data->insertRow($_POST['table'], $_POST['values'], 
													$_POST['nulls'], $_POST['format'], $_POST['types']);
				if ($status == 0) {
					if (isset($_POST['insert']))
						doDefault($lang['strrowinserted']);
					else {
						$_REQUEST['values'] = array();
						$_REQUEST['nulls'] = array();
						doInsertRow(true, $lang['strrowinserted']);
					}
				}
				else
					doInsertRow(true, $lang['strrowinsertedbad']);
			} else
				doInsertRow(true, $lang['strrowduplicate']);
		}

	}

	/**
	 * Show confirmation of empty and perform actual empty
	 */
	function doEmpty($confirm) {
		global $data, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('table');
			$misc->printTitle($lang['strempty'],'pg.table.empty');

			echo "<p>", sprintf($lang['strconfemptytable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"tables.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"empty\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"empty\" value=\"{$lang['strempty']}\" /> <input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->emptyTable($_POST['table']);
			if ($status == 0)
				doDefault($lang['strtableemptied']);
			else
				doDefault($lang['strtableemptiedbad']);
		}
		
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $lang, $_reload_browser;

		if ($confirm) {
			$misc->printTrail('table');
			$misc->printTitle($lang['strdrop'], 'pg.table.drop');

			echo "<p>", sprintf($lang['strconfdroptable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"tables.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" id=\"cascade\" name=\"cascade\" /> <label for=\"cascade\">{$lang['strcascade']}</label></p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropTable($_POST['table'], isset($_POST['cascade']));
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strtabledropped']);
			}
			else
				doDefault($lang['strtabledroppedbad']);
		}
		
	}


	/**
	 * Show confirmation of vacuum and perform actual vacuum
	 */
	function doVacuum($confirm) {
		global $data, $misc;
		global $lang, $_reload_browser;

		if ($confirm) {
			$misc->printTrail('table');
			$misc->printTitle($lang['strvacuum'], 'pg.vacuum');

			echo "<p>", sprintf($lang['strconfvacuumtable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"tables.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"vacuum\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			// Show vacuum full option if supportd
			if ($data->hasFullVacuum()) {
				echo "<p><input type=\"checkbox\" id=\"vacuum_full\" name=\"vacuum_full\" /> <label for=\"vacuum_full\">{$lang['strfull']}</label></p>\n";
				echo "<p><input type=\"checkbox\" id=\"vacuum_analyze\" name=\"vacuum_analyze\" /> <label for=\"vacuum_analyze\">{$lang['stranalyze']}</label></p>\n";
			}
			echo "<input type=\"submit\" name=\"vacuum\" value=\"{$lang['strvacuum']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->vacuumDB($_POST['table'], isset($_REQUEST['vacuum_analyze']), isset($_REQUEST['vacuum_full']), '');
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strvacuumgood']);
			}
			else
				doDefault($lang['strvacuumbad']);
		}
		
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc, $data;
		global $lang;
		
		$misc->printTrail('schema');
		$misc->printTabs('schema','tables');
		$misc->printMsg($msg);
		
		$tables = $data->getTables();
		
		$columns = array(
			'table' => array(
				'title' => $lang['strtable'],
				'field' => 'relname',
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'relowner',
			),
			'tablespace' => array(
				'title' => $lang['strtablespace'],
				'field' => 'tablespace'
			),
			'tuples' => array(
				'title' => $lang['strestimatedrowcount'],
				'field' => 'reltuples',
				'type'  => 'numeric'
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'relcomment',
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "redirect.php?subject=table&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'browse' => array(
				'title' => $lang['strbrowse'],
				'url'   => "display.php?{$misc->href}&amp;subject=table&amp;return_url=".urlencode("tables.php?{$misc->href}")."&amp;return_desc=".urlencode($lang['strback'])."&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'select' => array(
				'title' => $lang['strselect'],
				'url'   => "tables.php?action=confselectrows&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'insert' => array(
				'title' => $lang['strinsert'],
				'url'   => "tables.php?action=confinsertrow&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'empty' => array(
				'title' => $lang['strempty'],
				'url'   => "tables.php?action=confirm_empty&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "tables.php?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
			'vacuum' => array(
				'title' => $lang['strvacuum'],
				'url'   => "tables.php?action=confirm_vacuum&amp;{$misc->href}&amp;",
				'vars'  => array('table' => 'relname'),
			),
		);
		
		if (!$data->hasTablespaces()) unset($columns['tablespace']);

		$misc->printTable($tables, $columns, $actions, $lang['strnotables']);

		echo "<p><a class=\"navlink\" href=\"tables.php?action=create&amp;{$misc->href}\">{$lang['strcreatetable']}</a></p>\n";
	}
	
	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$tables = $data->getTables();
		
		$reqvars = $misc->getRequestVars('table');
		
		$attrs = array(
			'text'   => field('relname'),
			'icon'   => 'Table',
			'iconAction' => url('display.php',
							$reqvars,
							array('table' => field('relname'))
						),
			'toolTip'=> field('relcomment'),
			'action' => url('redirect.php',
							$reqvars,
							array('table' => field('relname'))
						),
			'branch' => url('tblproperties.php',
							$reqvars,
							array (
								'action' => 'tree',
								'table' => field('relname')
							)
						)	
		);
		
		$misc->printTreeXML($tables, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['strtables']);
	$misc->printBody();

	switch ($action) {
		case 'create':
			if (isset($_POST['cancel'])) doDefault();
			else doCreate();
			break;
		case 'selectrows':
			if (!isset($_POST['cancel'])) doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
			break;
		case 'insertrow':
			if (!isset($_POST['cancel'])) doInsertRow(false);
			else doDefault();
			break;
		case 'confinsertrow':
			doInsertRow(true);
			break;
		case 'empty':
			if (isset($_POST['empty'])) doEmpty(false);
			else doDefault();
			break;
		case 'confirm_empty':
			doEmpty(true);
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		case 'vacuum':
			if (isset($_POST['vacuum'])) doVacuum(false);
			else doDefault();
			break;
		case 'confirm_vacuum':
			doVacuum(true);
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
