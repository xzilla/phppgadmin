<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.51 2004/05/14 07:56:30 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Displays a screen where they can enter a new table
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;
		if (!isset($_REQUEST['name'])) $_REQUEST['name'] = '';
		if (!isset($_REQUEST['fields'])) $_REQUEST['fields'] = '';
		if (!isset($_REQUEST['tblcomment'])) $_REQUEST['tblcomment'] = '';

		switch ($_REQUEST['stage']) {
			case 1:
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: {$lang['strcreatetable']}</h2>\n";
				$misc->printMsg($msg);
				
				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
				echo "<table>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
				echo "\t\t<td class=\"data\"><input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['name']), "\" /></td>\n\t</tr>\n";
				echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strnumfields']}</th>\n";
				echo "\t\t<td class=\"data\"><input name=\"fields\" size=\"5\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['fields']), "\" /></td>\n\t</tr>\n";
				if ($data->hasWithoutOIDs()) {
					echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['stroptions']}</th>\n";
					echo "\t\t<td class=\"data\"><input type=\"checkbox\" name=\"withoutoids\"", 
						(isset($_REQUEST['withoutoids']) ? ' checked="checked"' : ''), " />WITHOUT OIDS</td>\n\t</tr>\n";
				}

				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strcomment']}</th>\n";
				echo "\t\t<td><input name=\"tblcomment\" value=\"", 
					htmlspecialchars($_REQUEST['tblcomment']), "\" /></td>\n\t</tr>\n";

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

				$types = &$data->getTypes(true);
	
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: {$lang['strcreatetable']}</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n";
				echo "\t<tr><th colspan=\"2\" class=\"data required\">{$lang['strfield']}</th><th colspan=\"2\" class=\"data required\">{$lang['strtype']}</th>";
				echo"<th class=\"data\">{$lang['strlength']}</th><th class=\"data\">{$lang['strnotnull']}</th><th class=\"data\">{$lang['strdefault']}</th><th class=\"data\">{$lang['strcomment']}</th></tr>\n";
				
				for ($i = 0; $i < $_REQUEST['fields']; $i++) {
					if (!isset($_REQUEST['field'][$i])) $_REQUEST['field'][$i] = '';
					if (!isset($_REQUEST['length'][$i])) $_REQUEST['length'][$i] = '';
					if (!isset($_REQUEST['default'][$i])) $_REQUEST['default'][$i] = '';
					if (!isset($_REQUEST['colcomment'][$i])) $_REQUEST['colcomment'][$i] = '';

					echo "\t<tr>\n\t\t<td>", $i + 1, ".&nbsp;</td>\n";
					echo "\t\t<td><input name=\"field[{$i}]\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
						htmlspecialchars($_REQUEST['field'][$i]), "\" /></td>\n";
					echo "\t\t<td>\n\t\t\t<select name=\"type[{$i}]\">\n";
					// Output any "magic" types
					foreach ($data->extraTypes as $v) {
						echo "\t\t\t\t<option value=\"", htmlspecialchars($v), "\"",
						(isset($_REQUEST['type'][$i]) && $v == $_REQUEST['type'][$i]) ? ' selected="selected"' : '', ">",
							$misc->printVal($v), "</option>\n";
					}
					$types->moveFirst();
					while (!$types->EOF) {
						$typname = $types->f[$data->typFields['typname']];
						echo "\t\t\t\t<option value=\"", htmlspecialchars($typname), "\"",
						(isset($_REQUEST['type'][$i]) && $typname == $_REQUEST['type'][$i]) ? ' selected="selected"' : '', ">",
							$misc->printVal($typname), "</option>\n";
						$types->moveNext();
					}
					echo "\t\t\t</select>\n\t\t</td>\n";
					
					// Output array type selector
					echo "\t\t<td>\n\t\t\t<select name=\"array[{$i}]\">\n";
					echo "\t\t\t\t<option value=\"\"", (isset($_REQUEST['array'][$i]) && $_REQUEST['array'][$i] == '') ? ' selected="selected"' : '', "></option>\n";
					echo "\t\t\t\t<option value=\"[]\"", (isset($_REQUEST['array'][$i]) && $_REQUEST['array'][$i] == '[]') ? ' selected="selected"' : '', ">[ ]</option>\n";
					echo "\t\t\t</select>\n\t\t</td>\n";
					
					echo "\t\t<td><input name=\"length[{$i}]\" size=\"10\" value=\"", 
						htmlspecialchars($_REQUEST['length'][$i]), "\" /></td>\n";
					echo "\t\t<td><input type=\"checkbox\" name=\"notnull[{$i}]\"", (isset($_REQUEST['notnull'][$i])) ? ' checked="checked"' : '', " /></td>\n";
					echo "\t\t<td><input name=\"default[{$i}]\" size=\"20\" value=\"", 
						htmlspecialchars($_REQUEST['default'][$i]), "\" /></td>\n";
					echo "\t\t<td><input name=\"colcomment[{$i}]\" size=\"40\" value=\"", 
						htmlspecialchars($_REQUEST['colcomment'][$i]), "\" /></td>\n\t</tr>\n";
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
				echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";
								
				break;
			case 3:
				global $data, $lang, $_reload_browser;

				if (!isset($_REQUEST['notnull'])) $_REQUEST['notnull'] = array();

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
								isset($_REQUEST['withoutoids']), $_REQUEST['colcomment'], $_REQUEST['tblcomment']);
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
				global $lang;
				echo "<p>{$lang['strinvalidparam']}</p>\n";
		}
	}

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $data, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strselect']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$data->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\" name=\"selectform\">\n";
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
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
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
				$_REQUEST['return_url'] = "tables.php?action=confselectrows&{$misc->href}&table={$_REQUEST['table']}";
				$_REQUEST['return_desc'] = $lang['strback'];

				include('./display.php');
				exit;
			}
		}

	}

	/**
	 * Ask for insert parameters and then actually insert row
	 */
	function doInsertRow($confirm, $msg = '') {
		global $data, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strinsertrow']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$data->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";
				
				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $data->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = $attrs->f['adsrc'];
					// Default format to 'LITERAL' if there is no default, otherwise
					// default to 'EXPRESSION'...
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
					if (!$attrs->f['attnotnull'])
						echo "<input type=\"checkbox\" name=\"nulls[", htmlspecialchars($attrs->f['attname']), "]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $data->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>{$lang['strnodata']}</p>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"insertrow\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"save\" value=\"{$lang['strinsert']}\" />\n";
			echo "<input type=\"submit\" name=\"saveandrepeat\" value=\"{$lang['strsaveandrepeat']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();

			$status = $data->insertRow($_POST['table'], $_POST['values'], 
												$_POST['nulls'], $_POST['format'], $_POST['types']);
			if ($status == 0) {
				if (isset($_POST['save']))
					doDefault($lang['strrowinserted']);
				else {
					$_REQUEST['values'] = array();
					$_REQUEST['nulls'] = array();
					doInsertRow(true, $lang['strrowinserted']);
				}
			}
			else
				doInsertRow(true, $lang['strrowinsertedbad']);
		}

	}

	/**
	 * Show confirmation of empty and perform actual empty
	 */
	function doEmpty($confirm) {
		global $data, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strempty']}</h2>\n";

			echo "<p>", sprintf($lang['strconfemptytable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
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
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdroptable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
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
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc, $data;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}</h2>\n";
			
		$tables = &$data->getTables();
		
		if ($tables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr>\n\t<th class=\"data\">{$lang['strtable']}</th>\n\t<th class=\"data\">{$lang['strowner']}</th>\n";
			echo "\t<th colspan=\"6\" class=\"data\">{$lang['stractions']}</th>\n";
			if ($conf['show_comments']) echo "\t<th class=\"data\">{$lang['strcomment']}</th>\n";
			echo "</tr>\n";
			$i = 0;
			while (!$tables->EOF) {
				$return_url = urlencode("tables.php?{$misc->href}");
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n\t<td class=\"data{$id}\">", $misc->printVal($tables->f[$data->tbFields['tbname']]), "</td>\n";
				echo "\t<td class=\"data{$id}\">", $misc->printVal($tables->f[$data->tbFields['tbowner']]), "</td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"display.php?{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "&amp;return_url={$return_url}&amp;return_desc=",
					urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confselectrows&amp;{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strselect']}</a></td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confinsertrow&amp;{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strinsert']}</a></td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"tblproperties.php?{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strproperties']}</a></td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_empty&amp;{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strempty']}</a></td>\n";
				echo "\t<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&amp;{$misc->href}&amp;table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strdrop']}</a></td>\n";
				if ($conf['show_comments']) echo "\t<td class=\"data{$id}\">", $misc->printVal($tables->f['tablecomment']), "</td>\n";
				echo "</tr>\n";
				$tables->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnotables']}</p>\n";
		}

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}\">{$lang['strcreatetable']}</a></p>\n";
	}
	
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
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
