<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.26 2003/05/31 07:23:24 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Displays a screen where they can enter a new table
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;
		if (!isset($_REQUEST['name'])) $_REQUEST['name'] = '';
		if (!isset($_REQUEST['fields'])) $_REQUEST['fields'] = '';

		switch ($_REQUEST['stage']) {
			case 1:
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: {$lang['strcreatetable']}</h2>\n";
				$misc->printMsg($msg);
				
				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
				echo "<table width=\"100%\">\n";
				echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
				echo "<tr><td class=\"data1\"><input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['name']), "\" /></td></tr>\n";
				echo "<tr><th class=\"data\">{$lang['strnumfields']}</th></tr>\n";
				echo "<tr><td class=\"data1\"><input name=\"fields\" size=\"5\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
					htmlspecialchars($_REQUEST['fields']), "\" /></td></tr>\n";
				echo "</table>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"create\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo $misc->form;
				echo "<input type=\"submit\" value=\"{$lang['strnext']}\" />\n";
				echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
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

				$types = &$localData->getTypes(true);
	
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: {$lang['strcreatetable']}</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th colspan=\"2\" class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strlength']}</th><th class=\"data\">{$lang['strnotnull']}</th><th class=\"data\">{$lang['strdefault']}</th></tr>";
				
				for ($i = 0; $i < $_REQUEST['fields']; $i++) {
					if (!isset($_REQUEST['field'][$i])) $_REQUEST['field'][$i] = '';
					if (!isset($_REQUEST['length'][$i])) $_REQUEST['length'][$i] = '';
					if (!isset($_REQUEST['default'][$i])) $_REQUEST['default'][$i] = '';
					echo "<tr><td>", $i + 1, ".&nbsp;</td>";
					echo "<td><input name=\"field[{$i}]\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
						htmlspecialchars($_REQUEST['field'][$i]), "\"></td>";
					echo "<td><select name=\"type[{$i}]\">\n";
					// Output any "magic" types
					foreach ($localData->extraTypes as $v) {
						echo "<option value=\"", htmlspecialchars($v), "\"",
						(isset($_REQUEST['type'][$i]) && $v == $_REQUEST['type'][$i]) ? ' selected' : '', ">",
							$misc->printVal($v), "</option>\n";
					}
					$types->moveFirst();
					while (!$types->EOF) {
						$typname = $types->f[$data->typFields['typname']];
						echo "<option value=\"", htmlspecialchars($typname), "\"",
						(isset($_REQUEST['type'][$i]) && $typname == $_REQUEST['type'][$i]) ? ' selected' : '', ">",
							$misc->printVal($typname), "</option>\n";
						$types->moveNext();
					}
					echo "</select></td>";
					echo "<td><input name=\"length[{$i}]\" size=\"10\" value=\"", 
						htmlspecialchars($_REQUEST['length'][$i]), "\" /></td>";
					echo "<td><input type=\"checkbox\" name=\"notnull[{$i}]\"", (isset($_REQUEST['notnull'][$i])) ? ' checked' : '', " /></td>\n";
					echo "<td><input name=\"default[{$i}]\" size=\"20\" value=\"", 
						htmlspecialchars($_REQUEST['default'][$i]), "\" /></td>";
				}				
				
				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"create\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"3\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"name\" value=\"", htmlspecialchars($_REQUEST['name']), "\" />\n";
				echo "<input type=\"hidden\" name=\"fields\" value=\"", htmlspecialchars($_REQUEST['fields']), "\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
				echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";
				echo "</form>\n";
								
				break;
			case 3:
				global $localData, $lang, $_reload_browser;

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
				
				$status = $localData->createTable($_REQUEST['name'], $_REQUEST['fields'], $_REQUEST['field'],
								$_REQUEST['type'], $_REQUEST['length'], $_REQUEST['notnull'], $_REQUEST['default']);
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
					
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalltables']}</a></p>\n";
	}

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strselect']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strshow']}</th><th class=\"data\">{$lang['strfield']}</th>";
				echo "<th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strnull']}</th>";
				echo "<th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = null;
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					echo "<input type=\"checkbox\" name=\"show[", htmlspecialchars($attrs->f['attname']), "]\"",
						isset($_REQUEST['show'][$attrs->f['attname']]) ? ' checked' : '', " /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['type']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=\"checkbox\" name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked' : '', " /></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $localData->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
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
			
			if (sizeof($_POST['show']) == 0)
				doSelectRows(true, $lang['strselectneedscol']);
			else {
				// Generate query SQL
				$query = $localData->getSelectSQL($_REQUEST['table'], array_keys($_POST['show']),
					$_POST['values'], array_keys($_POST['nulls']));
				$_REQUEST['query'] = $query;
				$_REQUEST['return_url'] = "tables.php?action=confselectrows&{$misc->href}&table={$_REQUEST['table']}";
				$_REQUEST['return_desc'] = $lang['strback'];

				include('display.php');
				exit;
			}
		}

	}

	/**
	 * Ask for insert parameters and then actually insert row
	 */
	function doInsertRow($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strinsertrow']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";
				
				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
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
					echo $misc->printVal($attrs->f['type']);
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->f['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->f['type']), "\" /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->f['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->f['attname']] == 'VALUE') ? ' selected' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->f['attname']] == 'EXPRESSION') ? ' selected' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=\"checkbox\" name=\"nulls[", htmlspecialchars($attrs->f['attname']), "]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked' : '', " /></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $localData->printField("values[{$attrs->f['attname']}]",
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
			echo "<p><input type=\"submit\" name=\"save\" value=\"{$lang['strsave']}\" />\n";
			echo "<input type=\"submit\" name=\"saveandrepeat\" value=\"{$lang['strsaveandrepeat']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();

			$status = $localData->insertRow($_POST['table'], $_POST['values'], 
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
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strempty']}</h2>\n";

			echo "<p>", sprintf($lang['strconfemptytable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=empty>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo $misc->form;
			echo "<input type=submit name=yes value=\"{$lang['stryes']}\"> <input type=submit name=no value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->emptyTable($_POST['table']);
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
		global $localData, $database, $misc;
		global $lang, $_reload_browser;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdroptable'], $misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\"> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\"> <input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropTable($_POST['table'], isset($_POST['cascade']));
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strtabledropped']);
			}
			else
				doDefault($lang['strtabledroppedbad']);
		}
		
	}

	/**
	 * Show confirmation of edit and perform actual update
	 */
	function doEditRow($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		$key = $_REQUEST['key'];

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['streditrow']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);
			$rs = &$localData->browseRow($_REQUEST['table'], $key);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($rs->recordCount() == 1 && $attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>\n";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";

				// @@ CHECK THAT KEY ACTUALLY IS IN THE RESULT SET...

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					$id = (($i % 2) == 0 ? '1' : '2');
					
					// Initialise variables
					if (!isset($_REQUEST['format'][$attrs->f['attname']]))
						$_REQUEST['format'][$attrs->f['attname']] = 'VALUE';
					
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo $misc->printVal($attrs->f['type']);
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->f['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->f['type']), "\" /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->f['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->f['attname']] == 'VALUE') ? ' selected' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->f['attname']] == 'EXPRESSION') ? ' selected' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull']) {
						// Set initial null values
						if ($_REQUEST['action'] == 'confeditrow' && $rs->f[$attrs->f['attname']] === null) {
							$_REQUEST['nulls'][$attrs->f['attname']] = 'on';
						}
						echo "<input type=\"checkbox\" name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked' : '', " /></td>";
					}
					else
						echo "&nbsp;</td>";

					echo "<td class=\"data{$id}\" nowrap>", $localData->printField("values[{$attrs->f['attname']}]",
						$rs->f[$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>{$lang['strinvalidparam']}</p>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"editrow\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"page\" value=\"", htmlspecialchars($_REQUEST['page']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortkey\" value=\"", htmlspecialchars($_REQUEST['sortkey']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortdir\" value=\"", htmlspecialchars($_REQUEST['sortdir']), "\" />\n";
			echo "<input type=\"hidden\" name=\"strings\" value=\"", htmlspecialchars($_REQUEST['strings']), "\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($key)), "\" />\n";
			echo "<p><input type=\"submit\" name=\"save\" value=\"{$lang['strsave']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			$status = $localData->editRow($_POST['table'], $_POST['values'], $_POST['nulls'], 
												$_POST['format'], $_POST['types'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse($lang['strrowupdated']);
			else
				doEditRow($lang['strrowupdatedbad']);
		}

	}	

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDelRow($confirm) {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strdeleterow']}</h2>\n";

			echo "<p>{$lang['strconfdeleterow']}</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"delrow\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"page\" value=\"", htmlspecialchars($_REQUEST['page']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortkey\" value=\"", htmlspecialchars($_REQUEST['sortkey']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortdir\" value=\"", htmlspecialchars($_REQUEST['sortdir']), "\" />\n";
			echo "<input type=\"hidden\" name=\"strings\" value=\"", htmlspecialchars($_REQUEST['strings']), "\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($_REQUEST['key'])), "\" />\n";
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse($lang['strrowdeleted']);
			else
				doBrowse($lang['strrowdeletedbad']);
		}
		
	}
	
	/**
	 * Browse a table
	 */
	function doBrowse($msg = '') {
		global $data, $localData, $misc, $conf;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strbrowse']}</h2>\n";
		$misc->printMsg($msg);
		
		if (!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;
		if (!isset($_REQUEST['sortkey'])) $_REQUEST['sortkey'] = '';
		if (!isset($_REQUEST['sortdir'])) $_REQUEST['sortdir'] = '';
		if (!isset($_REQUEST['strings'])) $_REQUEST['strings'] = 'collapsed';

		// Retrieve page from table.  $max_pages is returned by reference.
		$rs = &$localData->browseRelation($_REQUEST['table'], $_REQUEST['sortkey'], $_REQUEST['sortdir'], 
														$_REQUEST['page'], $conf['max_rows'], $max_pages);

		// Fetch unique row identifier, if there is one
		$key = $localData->getRowIdentifier($_REQUEST['table']);

		if (is_object($rs) && $rs->recordCount() > 0) {
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "{$PHP_SELF}?action=browse&page=%s&{$misc->href}&sortkey=" .
				urlencode($_REQUEST['sortkey']) . "&sortdir=" . urlencode($_REQUEST['sortdir']) . 
				"&strings=" . urlencode($_REQUEST['strings']) . "&table=" . urlencode($_REQUEST['table']));
			echo "<table>\n<tr>";

			// @@ CHECK THAT KEY ACTUALLY IS IN THE RESULT SET...
			
			if (sizeof($key) > 0)
				echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";

			reset($rs->f);
			while(list($k, ) = each($rs->f)) {
				if ($k == $localData->id && !$conf['show_oids']) continue;
				echo "<th class=\"data\"><a href=\"{$PHP_SELF}?action=browse&page=", $_REQUEST['page'], 
					"&{$misc->href}&sortkey=", urlencode($k), "&sortdir=";
					// Sort direction opposite to current direction, unless it's currently ''
					echo ($_REQUEST['sortdir'] == 'asc' && $_REQUEST['sortkey'] == $k) ? 'desc' : 'asc';
					echo "&strings=", urlencode($_REQUEST['strings']), "&table=", 
					urlencode($_REQUEST['table']), "\">", $misc->printVal($k), "</a></th>\n";
			}
						
			$i = 0;
			reset($rs->f);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				if (sizeof($key) > 0) {
					$key_str = '';
					$has_nulls = false;
					foreach ($key as $v) {
						if ($rs->f[$v] === null) {
							$has_nulls = true;
							break;
						}
						if ($key_str != '') $key_str .= '&';
						$key_str .= urlencode("key[{$v}]") . '=' . urlencode($rs->f[$v]);
					}
					if ($has_nulls) {
						echo "<td class=\"opbutton{$id}\">&nbsp;</td>\n<td class=\"opbutton{$id}\">&nbsp;</td>\n";
					} else {
						echo "<td class=\"opbutton{$id}\"><a href=\"{$PHP_SELF}?action=confeditrow&{$misc->href}&sortkey=", 
							urlencode($_REQUEST['sortkey']), "&sortdir=", urlencode($_REQUEST['sortdir']), 
							"&table=", urlencode($_REQUEST['table']), "&strings=", urlencode($_REQUEST['strings']), 
							"&page=", $_REQUEST['page'], "&{$key_str}\">{$lang['stredit']}</a></td>\n";
						echo "<td class=\"opbutton{$id}\"><a href=\"{$PHP_SELF}?action=confdelrow&{$misc->href}&sortkey=", 
							urlencode($_REQUEST['sortkey']), "&sortdir=", urlencode($_REQUEST['sortdir']), 
							"&table=", urlencode($_REQUEST['table']),  "&strings=", urlencode($_REQUEST['strings']), 
							"&page=", $_REQUEST['page'], "&{$key_str}\">{$lang['strdelete']}</a></td>\n";
					}
				}
				while(list($k, $v) = each($rs->f)) {
					if ($k == $localData->id && !$conf['show_oids']) continue;
					elseif ($v !== null && $v == '') echo "<td class=\"data{$id}\">&nbsp;</td>";
					else {
						// Trim strings if over length
						if ($_REQUEST['strings'] == 'collapsed' && strlen($v) > $conf['max_chars']) {							
							$v = substr($v, 0, $conf['max_chars'] - 1) . $lang['strellipsis'];
						}
						echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($v, true), "</td>";
					}
				}
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";
			echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalltables']}</a> |\n";
		if ($_REQUEST['strings'] == 'expanded')
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=browse&{$misc->href}&sortkey=", 
				urlencode($_REQUEST['sortkey']), "&sortdir=", urlencode($_REQUEST['sortdir']), "&table=", urlencode($_REQUEST['table']), 
				"&strings=collapsed&page=", $_REQUEST['page'], "\">{$lang['strcollapse']}</a></p>\n";
		else
			echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=browse&{$misc->href}&sortkey=", 
				urlencode($_REQUEST['sortkey']), "&sortdir=", urlencode($_REQUEST['sortdir']), "&table=", urlencode($_REQUEST['table']), 
				"&strings=expanded&page=", $_REQUEST['page'], "\">{$lang['strexpand']}</a></p>\n";
		
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $localData;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), "</h2>\n";
			
		$tables = &$localData->getTables();
		
		if ($tables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$lang['strtable']}</th><th class=data>{$lang['strowner']}</th><th colspan=6 class=data>{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$tables->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", $misc->printVal($tables->f[$data->tbFields['tbname']]), "</td>\n";
				echo "<td class=data{$id}>", $misc->printVal($tables->f[$data->tbFields['tbowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=browse&page=1&{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strbrowse']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confselectrows&{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strselect']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confinsertrow&{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strinsert']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"tblproperties.php?{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_empty&{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strempty']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&table=",
					urlencode($tables->f[$data->tbFields['tbname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$tables->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnotables']}</p>\n";
		}

		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatetable']}</a></p>\n";
	}
	
	$misc->printHeader($lang['strtables']);
	$misc->printBody();

	switch ($action) {
		case 'create':
			doCreate();
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
			if (isset($_POST['yes'])) doEmpty(false);
			else doDefault();
			break;
		case 'confirm_empty':
			doEmpty(true);
			break;
		case 'drop':
			if (isset($_POST['yes'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		case 'editrow':
			if (isset($_POST['save'])) doEditRow(false);
			else doBrowse();
			break;
		case 'confeditrow':
			doEditRow(true);
			break;
		case 'delrow':
			if (isset($_POST['yes'])) doDelRow(false);
			else doBrowse();
			break;
		case 'confdelrow':
			doDelRow(true);
			break;			
		case 'browse':
			doBrowse();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
