<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.16 2003/01/08 05:36:33 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Displays a screen where they can enter a new table
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strNumFields, $strNext, $strTables;
		global $strCreateTable, $strShowAllTables, $strTableNeedsName, $strTableNeedsCols;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;
		if (!isset($_REQUEST['name'])) $_REQUEST['name'] = '';
		if (!isset($_REQUEST['fields'])) $_REQUEST['fields'] = '';
		
		switch ($_REQUEST['stage']) {
			case 1:
				echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: {$strCreateTable}</h2>\n";
				$misc->printMsg($msg);
				
				echo "<form action=\"$PHP_SELF\" method=post>\n";
				echo "<table width=100%>\n";
				echo "<tr><th class=data>{$strName}</th></tr>\n";
				echo "<tr><td class=data1><input name=name size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"", 
					htmlspecialchars($_REQUEST['name']), "\"></td></tr>\n";
				echo "<tr><th class=data>{$strNumFields}</th></tr>\n";
				echo "<tr><td class=data1><input name=fields size=5 maxlength={$data->_maxNameLen} value=\"", 
					htmlspecialchars($_REQUEST['fields']), "\"></td></tr>\n";
				echo "</table>\n";
				echo "<input type=hidden name=action value=create>\n";
				echo "<input type=hidden name=stage value=2>\n";
				echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
				echo "<input type=submit value=\"{$strNext}\"> <input type=reset>\n";
				echo "</form>\n";
				break;
			case 2:
				global $strCreate, $strField, $strType, $strLength, $strNotNull, $strDefault;

				// Check inputs
				$fields = trim($_REQUEST['fields']);
				if (trim($_REQUEST['name']) == '') {
					$_REQUEST['stage'] = 1;
					doCreate($strTableNeedsName);
					return;
				}
				elseif ($fields == '' || !is_numeric($fields) || $fields != (int)$fields || $fields < 1)  {
					$_REQUEST['stage'] = 1;
					doCreate($strTableNeedsCols);	
					return;
				}

				$types = &$localData->getTypes(true);
	
				echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: {$strCreateTable}</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th colspan=2 class=data>{$strField}</th><th class=data>{$strType}</th><th class=data>{$strLength}</th><th class=data>{$strNotNull}</th><th class=data>{$strDefault}</th></tr>";
				
				for ($i = 0; $i < $_REQUEST['fields']; $i++) {
					if (!isset($_REQUEST['field'][$i])) $_REQUEST['field'][$i] = '';
					if (!isset($_REQUEST['length'][$i])) $_REQUEST['length'][$i] = '';
					if (!isset($_REQUEST['default'][$i])) $_REQUEST['default'][$i] = '';
					echo "<tr><td>", $i + 1, ".&nbsp;</td>";
					echo "<td><input name=\"field[{$i}]\" size=\"32\" maxlength={$data->_maxNameLen} value=\"", 
						htmlspecialchars($_REQUEST['field'][$i]), "\"></td>";
					echo "<td><select name=\"type[{$i}]\">\n";
					$types->moveFirst();
					while (!$types->EOF) {
						$typname = $types->f[$data->typFields['typname']];
						echo "<option value=\"", htmlspecialchars($typname), "\"",
						(isset($_REQUEST['type'][$i]) && $typname == $_REQUEST['type'][$i]) ? ' selected' : '', ">",
							htmlspecialchars($typname), "</option>\n";
						$types->moveNext();
					}
					echo "</select></td>";
					echo "<td><input name=\"length[{$i}]\" size=10 value=\"", 
						htmlspecialchars($_REQUEST['length'][$i]), "\"></td>";
					echo "<td><input type=checkbox name=\"notnull[{$i}]\"", (isset($_REQUEST['notnull'][$i])) ? ' checked' : '', "></td>\n";
					echo "<td><input name=\"default[{$i}]\" size=20 value=\"", 
						htmlspecialchars($_REQUEST['default'][$i]), "\"></td>";
				}				
				
				echo "</table>\n";
				echo "<p><input type=hidden name=action value=create>\n";
				echo "<input type=hidden name=stage value=3>\n";
				echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
				echo "<input type=hidden name=name value=\"", htmlspecialchars($_REQUEST['name']), "\">\n";
				echo "<input type=hidden name=fields value=\"", htmlspecialchars($_REQUEST['fields']), "\">\n";
				echo "<input type=submit value=\"{$strCreate}\"> <input type=reset></p>\n";
				echo "</form>\n";
								
				break;
			case 3:
				global $localData, $strViewNeedsName, $strViewNeedsDef;

				if (!isset($_REQUEST['notnull'])) $_REQUEST['notnull'] = array();

				// Check inputs
				$fields = trim($_REQUEST['fields']);
				if (trim($_REQUEST['name']) == '') {
					$_REQUEST['stage'] = 1;
					doCreate($strTableNeedsName);
					return;
				}
				elseif ($fields == '' || !is_numeric($fields) || $fields != (int)$fields || $fields <= 0)  {
					$_REQUEST['stage'] = 1;
					doCreate($strTableNeedsCols);	
					return;
				}
				
				$status = $localData->createTable($_REQUEST['name'], $_REQUEST['fields'], $_REQUEST['field'],
								$_REQUEST['type'], $_REQUEST['length'], $_REQUEST['notnull'], $_REQUEST['default']);
				if ($status == 0)
					doDefault('Table created.');
				elseif ($status == -1) {
					$_REQUEST['stage'] = 2;
					doCreate('You must specify at least one field.');
					return;
				}
				else {
					$_REQUEST['stage'] = 2;
					doCreate('Table creation failed.');
					return;
				}
				break;
			default:
				echo "<p>Invalid script parameter.</p>\n";
		}
					
		echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $strField, $strType, $strNull, $strFunction, $strValue;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Select</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=data>Show</th><th class=data>{$strField}</th><th class=data>{$strType}</th><th class=data>{$strNull}</th><th class=data>{$strFunction}</th><th class=data>{$strValue}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = null;
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=data{$id} nowrap>";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=checkbox name=\"show[{$attrs->f['attname']}]\"",
							isset($_REQUEST['show'][$attrs->f['attname']]) ? ' checked' : '', "></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['attname']), "</td>";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['type']), "</td>";
					echo "<td class=data{$id} nowrap>";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=checkbox name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked' : '', "></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=data{$id} nowrap><input size=10 name=\"function[{$attrs->f['attname']}]\"></td>";
					echo "<td class=data{$id} nowrap>", $localData->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>No data.</p>\n";

			echo "<p><input type=hidden name=action value=selectrows>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Select\">\n";
			echo "<input type=submit name=choice value=\"Cancel\"></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			$status = $localData->selectRows($_POST['table'], $_POST['values'], $_POST['nulls']);
			if ($status == 0) {
				// @@@ AAARGH - THIS WON'T WORK WITH OTHER LANGUAGES!!
				if ($_POST['choice'] == 'Save')
					doDefault('Row inserted.');
				else {
					$_REQUEST['values'] = array();
					$_REQUEST['nulls'] = array();
					doInsertRow(true, 'Row inserted.');
				}
			}
			else
				doInsertRow(true, 'Row insert failed.');
		}

	}

	/**
	 * Ask for insert parameters and then actually insert row
	 */
	function doInsertRow($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $strField, $strType, $strNull, $strValue;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Insert Row</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=data>{$strField}</th><th class=data>{$strType}</th><th class=data>{$strNull}</th><th class=data>{$strValue}</th></tr>";
				
				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = null;
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['attname']), "</td>";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['type']), "</td>";
					echo "<td class=data{$id} nowrap>";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=checkbox name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked' : '', "></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=data{$id} nowrap>", $localData->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>No data.</p>\n";

			echo "<input type=hidden name=action value=insertrow>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Save\">\n";
			echo "<input type=submit name=choice value=\"Save &amp; Repeat\">\n";
			echo "<input type=submit name=choice value=\"Cancel\">\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			$status = $localData->insertRow($_POST['table'], $_POST['values'], $_POST['nulls']);
			if ($status == 0) {
				// @@@ AAARGH - THIS WON'T WORK WITH OTHER LANGUAGES!!
				if ($_POST['choice'] == 'Save')
					doDefault('Row inserted.');
				else {
					$_REQUEST['values'] = array();
					$_REQUEST['nulls'] = array();
					doInsertRow(true, 'Row inserted.');
				}
			}
			else
				doInsertRow(true, 'Row insert failed.');
		}

	}

	/**
	 * Show confirmation of empty and perform actual empty
	 */
	function doEmpty($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Empty</h2>\n";

			echo "<p>Are you sure you want to empty the table \"", htmlspecialchars($_REQUEST['table']), "\"?</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=empty>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->emptyTable($_POST['table']);
			if ($status == 0)
				doDefault('Table emptied.');
			else
				doDefault('Table empty failed.');
		}
		
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Drop</h2>\n";

			echo "<p>Are you sure you want to drop the table \"", htmlspecialchars($_REQUEST['table']), "\"?</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropTable($_POST['table']);
			if ($status == 0)
				doDefault('Table dropped.');
			else
				doDefault('Table drop failed.');
		}
		
	}

	/**
	 * Show confirmation of edit and perform actual update
	 */
	function doEditRow($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $strField, $strType, $strValue;
		global $PHP_SELF;

		$key = $_REQUEST['key'];

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Edit Row</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);
			$rs = &$localData->browseRow($_REQUEST['table'], $key);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($rs->recordCount() == 1 && $attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=data>{$strField}</th><th class=data>{$strType}</th><th class=data>{$strValue}</th></tr>";
				
				// @@ CHECK THAT KEY ACTUALLY IS IN THE RESULT SET...

				$i = 0;
				while (!$attrs->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['attname']), "</td>";
					echo "<td class=data{$id} nowrap>", htmlspecialchars($attrs->f['type']), "</td>";
					echo "<td class=data{$id} nowrap>", $localData->printField("values[{$attrs->f['attname']}]", 
						$rs->f[$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>No data.</p>\n";

			echo "<input type=hidden name=action value=editrow>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=hidden name=page value=\"", htmlspecialchars($_REQUEST['page']), "\">\n";
			echo "<input type=hidden name=key value=\"", htmlspecialchars(serialize($key)), "\">\n";
			echo "<input type=submit name=choice value=\"Save\"> <input type=submit name=choice value=\"Cancel\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->editRow($_POST['table'], $_POST['values'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse('Row updated.');
			else
				doBrowse('Row update failed.');
		}
		
	}	
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDelRow($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Delete Row</h2>\n";

			echo "<p>Are you sure you want to delete this row?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=delrow>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=hidden name=page value=\"", htmlspecialchars($_REQUEST['page']), "\">\n";
			echo "<input type=hidden name=key value=\"", htmlspecialchars(serialize($_REQUEST['key'])), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse('Row deleted.');
			else
				doBrowse('Row deletion failed.');
		}
		
	}
	
	/**
	 * Browse a table
	 */
	function doBrowse($msg = '') {
		global $data, $localData, $misc, $guiMaxRows, $strBrowse;
		global $PHP_SELF, $strActions, $guiShowOIDs, $strShowAllTables, $strRows;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strBrowse}</h2>\n";
		$misc->printMsg($msg);
		
		if (!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;

		// Retrieve page from table.  $max_pages is returned by reference.
		$rs = &$localData->browseRelation($_REQUEST['table'], $_REQUEST['page'], $guiMaxRows, $max_pages);

		// Fetch unique row identifier, if there is one
		$key = $localData->getRowIdentifier($_REQUEST['table']);

		if (is_object($rs) && $rs->recordCount() > 0) {
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "{$PHP_SELF}?action=browse&page=%s&database=" . 
				urlencode($_REQUEST['database']) . "&table=" . urlencode($_REQUEST['table']));
			echo "<table>\n<tr>";
			reset($rs->f);
			while(list($k, ) = each($rs->f)) {
				if ($k == $localData->id && !$guiShowOIDs) continue;
				echo "<th class=data>", htmlspecialchars($k), "</td>";
			}
			
			// @@ CHECK THAT KEY ACTUALLY IS IN THE RESULT SET...
			
			if (sizeof($key) > 0)
				echo "<th colspan=2 class=data>{$strActions}</th>\n";
			
			$i = 0;
			reset($rs->f);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				while(list($k, $v) = each($rs->f)) {
					if ($k == $localData->id && !$guiShowOIDs) continue;
					echo "<td class=data{$id} nowrap>", nl2br(htmlspecialchars($v)), "</td>";
				}							
				if (sizeof($key) > 0) {
					$key_str = '';
					foreach ($key as $v) {
						if ($key_str != '') $key_str .= '&';
						$key_str .= urlencode("key[{$v}]") . '=' . urlencode($rs->f[$v]);
					}
					
					echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=confeditrow&database=", urlencode($_REQUEST['database']),
						"&table=", urlencode($_REQUEST['table']), "&page=", $_REQUEST['page'], "&{$key_str}\">Edit</a></td>\n";
					echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=confdelrow&database=", urlencode($_REQUEST['database']),
						"&table=", urlencode($_REQUEST['table']), "&page=", $_REQUEST['page'], "&{$key_str}\">Delete</a></td>\n";
				}
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";
			echo "<p>", $rs->recordCount(), " {$strRows}</p>\n";
		}
		else echo "<p>No data.</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData;
		global $PHP_SELF, $strTable, $strOwner, $strActions, $strNoTables;
		global $strBrowse, $strProperties, $strCreateTable;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), "</h2>\n";
			
		$tables = &$localData->getTables();
		
		if ($tables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strTable}</th><th class=data>{$strOwner}</th><th colspan=6 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$tables->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=browse&page=1&database=", 
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "\">{$strBrowse}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confselectrows&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($tables->f[$data->tbFields['tbname']]), "\">Select</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confinsertrow&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($tables->f[$data->tbFields['tbname']]), "\">Insert</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"tblproperties.php?database=",
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "\">{$strProperties}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_empty&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($tables->f[$data->tbFields['tbname']]), "\">Empty</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($tables->f[$data->tbFields['tbname']]), "\">Drop</a></td>\n";
				echo "</tr>\n";
				$tables->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoTables}</p>\n";
		}

		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&database=", urlencode($_REQUEST['database']), "\">{$strCreateTable}</a></p>\n";
	}
	
	$misc->printHeader($strTables);

	switch ($action) {
		case 'create':
			doCreate();
			break;
		case 'selectrows':
			if ($_POST['choice'] != 'Cancel') doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
			break;
		case 'insertrow':
			if ($_POST['choice'] != 'Cancel') doInsertRow(false);
			else doDefault();
			break;
		case 'confinsertrow':
			doInsertRow(true);
			break;
		case 'empty':
			if ($_POST['choice'] == 'Yes') doEmpty(false);
			else doDefault();
			break;
		case 'confirm_empty':
			doEmpty(true);
			break;
		case 'drop':
			if ($_POST['choice'] == 'Yes') doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		case 'editrow':
			if ($_POST['choice'] == 'Save') doEditRow(false);
			else doBrowse();
			break;
		case 'confeditrow':
			doEditRow(true);
			break;
		case 'delrow':
			if ($_POST['choice'] == 'Yes') doDelRow(false);
			else doBrowse();
			break;
		case 'confdelrow':
			doDelRow(true);
			break;			
		case 'browse':
			doBrowse();
			break;
		case 'create':
			doCreate();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
