<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.67 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/** 
	 * Function to save after altering a table
	 */
	function doSaveAlter() {
		global $data, $lang, $_reload_browser;

		// For databases that don't allow owner change
		if (!isset($_POST['owner'])) $_POST['owner'] = '';
		// Default tablespace to null if it isn't set
		if (!isset($_POST['tablespace'])) $_POST['tablespace'] = null;
		
		$status = $data->alterTable($_POST['table'], $_POST['name'], $_POST['owner'], $_POST['comment'], $_POST['tablespace']);
		if ($status == 0) {
			// If table has been renamed, need to change to the new name and
			// reload the browser frame.
			if ($_POST['table'] != $_POST['name']) {
				// Jump them to the new table name
				$_REQUEST['table'] = $_POST['name'];
				// Force a browser reload
				$_reload_browser = true;
			}
			doDefault($lang['strtablealtered']);
		}
		else
			doAlter($lang['strtablealteredbad']);
	}

	/**
	 * Function to allow altering of a table
	 */
	function doAlter($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('table');
		$misc->printTitle($lang['stralter'], 'pg.table.alter');
		$misc->printMsg($msg);

		// Fetch table info		
		$table = $data->getTable($_REQUEST['table']);
		// Fetch all users
		$users = $data->getUsers();
		// Fetch all tablespaces from the database
		if ($data->hasTablespaces()) $tablespaces = $data->getTablespaces(true);
		
		if ($table->recordCount() > 0) {
			
			if (!isset($_POST['name'])) $_POST['name'] = $table->f['relname'];
			if (!isset($_POST['owner'])) $_POST['owner'] = $table->f['relowner'];
			if (!isset($_POST['comment'])) $_POST['comment'] = $table->f['relcomment'];
			if ($data->hasTablespaces() && !isset($_POST['tablespace'])) $_POST['tablespace'] = $table->f['tablespace'];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				htmlspecialchars($_POST['name']), "\" /></td></tr>\n";
			
			$server_info = $misc->getServerInfo();
			if ($data->hasAlterTableOwner() && $data->isSuperUser($server_info['username'])) {
				echo "<tr><th class=\"data left required\">{$lang['strowner']}</th>\n";
				echo "<td class=\"data1\"><select name=\"owner\">";
				while (!$users->EOF) {
					$uname = $users->f['usename'];
					echo "<option value=\"", htmlspecialchars($uname), "\"",
						($uname == $_POST['owner']) ? ' selected="selected"' : '', ">", htmlspecialchars($uname), "</option>\n";
					$users->moveNext();
				}
				echo "</select></td></tr>\n";				
			}

			// Tablespace (if there are any)
			if ($data->hasTablespaces() && $tablespaces->recordCount() > 0) {
				echo "\t<tr>\n\t\t<th class=\"data left\">{$lang['strtablespace']}</th>\n";
				echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"tablespace\">\n";
				// Always offer the default (empty) option
				echo "\t\t\t\t<option value=\"\"",
					($_POST['tablespace'] == '') ? ' selected="selected"' : '', "></option>\n";
				// Display all other tablespaces
				while (!$tablespaces->EOF) {
					$spcname = htmlspecialchars($tablespaces->f['spcname']);
					echo "\t\t\t\t<option value=\"{$spcname}\"",
						($spcname == $_POST['tablespace']) ? ' selected="selected"' : '', ">{$spcname}</option>\n";
					$tablespaces->moveNext();
				}
				echo "\t\t\t</select>\n\t\t</td>\n\t</tr>\n";
			}
			
			echo "<tr><th class=\"data left\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<textarea rows=\"3\" cols=\"32\" name=\"comment\" wrap=\"virtual\">",
				htmlspecialchars($_POST['comment']), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"alter\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}
	
	function doExport($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		// Determine whether or not the table has an object ID
		$hasID = $data->hasObjectID($_REQUEST['table']);
		
		$misc->printTrail('table');
		$misc->printTabs('table','export');
		$misc->printMsg($msg);

		echo "<form action=\"dataexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\" rowspan=\"", ($hasID) ? 2 : 1, "\">";
		echo "<input type=\"radio\" name=\"what\" value=\"dataonly\" checked=\"checked\" />{$lang['strdataonly']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"d_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "<option value=\"csv\">CSV</option>\n";
		echo "<option value=\"tab\">{$lang['strtabbed']}</option>\n";
		echo "<option value=\"html\">XHTML</option>\n";
		echo "<option value=\"xml\">XML</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		if ($hasID) {
			echo "<tr><td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"d_oids\" /></td>\n</tr>\n";
		}
		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" name=\"what\" value=\"structureonly\" />{$lang['strstructureonly']}</th>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"", ($hasID) ? 3 : 2, "\">";
		echo "<input type=\"radio\" name=\"what\" value=\"structureanddata\" />{$lang['strstructureanddata']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<tr><td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		if ($hasID) {
			echo "<tr><td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"sd_oids\" /></td>\n</tr>\n";
		}
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" name=\"output\" value=\"show\" checked=\"checked\" />{$lang['strshow']}\n";
		echo "<br/><input type=\"radio\" name=\"output\" value=\"download\" />{$lang['strdownload']}</p>\n";

		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"subject\" value=\"table\" />\n";
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}
	
	function doImport($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$misc->printTrail('table');
		$misc->printTabs('table','import');
		$misc->printMsg($msg);

		// Check that file uploads are enabled
		if (ini_get('file_uploads')) {
			// Don't show upload option if max size of uploads is zero
			$max_size = $misc->inisizeToBytes(ini_get('upload_max_filesize'));
			if (is_double($max_size) && $max_size > 0) {
				echo "<form action=\"dataimport.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
				echo "<table>\n";
				echo "<tr><th class=\"data left required\">{$lang['strformat']}</th>";
				echo "<td><select name=\"format\">\n";
				echo "<option value=\"auto\">{$lang['strauto']}</option>\n";
				echo "<option value=\"csv\">CSV</option>\n";
				echo "<option value=\"tab\">{$lang['strtabbed']}</option>\n";
				if (function_exists('xml_parser_create')) {
					echo "<option value=\"xml\">XML</option>\n";
				}
				echo "</select>\n</td>\n</tr>\n";
				echo "<tr><th class=\"data left required\">{$lang['strallowednulls']}</th>";
				echo "<td><select multiple size=\"3\" name=\"allowednulls[]\">\n";
				echo "<option value=\"default\" selected=\"selected\">{$lang['strbackslashn']}</option>\n";
				echo "<option value=\"null\">{$lang['strnull']}</option>\n";
				echo "<option value=\"emptystring\">{$lang['stremptystring'] }</option>\n";
				echo "</select>\n</td>\n</tr>\n";
				echo "<tr><th class=\"data left required\">{$lang['strfile']}</th>";
				echo "<td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"{$max_size}\" />\n";
				echo "<input type=\"file\" name=\"source\" />\n";
				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"import\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['strimport']}\" /></p>\n";
				echo "</form>\n";
			}
		}
		else echo "<p>{$lang['strnouploads']}</p>\n";		
	}	

	/**
	 * Displays a screen where they can add a column
	 */
	function doAddColumn($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;

		switch ($_REQUEST['stage']) {
			case 1:
				global $lang;

				// Set variable defaults
				if (!isset($_POST['field'])) $_POST['field'] = '';
				if (!isset($_POST['type'])) $_POST['type'] = '';
				if (!isset($_POST['array'])) $_POST['array'] = '';
				if (!isset($_POST['length'])) $_POST['length'] = '';
				if (!isset($_POST['default'])) $_POST['default'] = '';
				if (!isset($_POST['comment'])) $_POST['comment'] = '';

				// Fetch all available types
				$types = $data->getTypes(true, false, true);

				$misc->printTrail('table');
				$misc->printTitle($lang['straddcolumn'], 'pg.column.add');
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th class=\"data required\">{$lang['strcolumn']}</th><th colspan=\"2\" class=\"data required\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strlength']}</th>";
				if ($data->hasAlterColumnType()) echo "<th class=\"data\">{$lang['strnotnull']}</th><th class=\"data\">{$lang['strdefault']}</th>";
				echo "<th class=\"data\">{$lang['strcomment']}</th></tr>";

				echo "<tr><td><input name=\"field\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
					htmlspecialchars($_POST['field']), "\" /></td>";
				echo "<td><select name=\"type\">\n";				
				// Output any "magic" types.  This came in with the alter column type so we'll check that
				if ($data->hasAlterColumnType()) {
					foreach ($data->extraTypes as $v) {
						echo "<option value=\"", htmlspecialchars($v), "\"",
						($v == $_POST['type']) ? ' selected="selected"' : '', ">",
							$misc->printVal($v), "</option>\n";
					}
				}
				while (!$types->EOF) {
					$typname = $types->f['typname'];
					echo "<option value=\"", htmlspecialchars($typname), "\"", ($typname == $_POST['type']) ? ' selected="selected"' : '', ">",
						$misc->printVal($typname), "</option>\n";
					$types->moveNext();
				}
				echo "</select></td>";
				
				// Output array type selector
				echo "<td><select name=\"array\">\n";
				echo "<option value=\"\"", ($_POST['array'] == '') ? ' selected="selected"' : '', "></option>\n";
				echo "<option value=\"[]\"", ($_POST['array'] == '[]') ? ' selected="selected"' : '', ">[ ]</option>\n";
				echo "</select></td>\n";

				echo "<td><input name=\"length\" size=\"8\" value=\"",
					htmlspecialchars($_POST['length']), "\" /></td>";
				// Support for adding column with not null and default
				if ($data->hasAlterColumnType()) {					
					echo "<td><input type=\"checkbox\" name=\"notnull\"", 
						(isset($_REQUEST['notnull'])) ? ' checked="checked"' : '', " /></td>\n";
					echo "<td><input name=\"default\" size=\"20\" value=\"",
						htmlspecialchars($_POST['default']), "\" /></td>";
				}
				else {
					echo "<input type=\"hidden\" name=\"default\" value=\"\" />\n";	
				}
				echo "<td><input name=\"comment\" size=\"40\" value=\"",
					htmlspecialchars($_POST['comment']), "\" /></td></tr>";
				echo "</table>\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"add_column\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
				echo "<p><input type=\"submit\" value=\"{$lang['stradd']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";

				break;
			case 2:
				global $data, $lang;

				// Check inputs
				if (trim($_POST['field']) == '') {
					$_REQUEST['stage'] = 1;
					doAddColumn($lang['strcolneedsname']);
					return;
				}

				$status = $data->addColumn($_POST['table'], $_POST['field'],
							   $_POST['type'], $_POST['array'] != '', $_POST['length'], isset($_POST['notnull']),
							   $_POST['default'], $_POST['comment']);
				if ($status == 0)
					doDefault($lang['strcolumnadded']);
				else {
					$_REQUEST['stage'] = 1;
					doAddColumn($lang['strcolumnaddedbad']);
					return;
				}
				break;
			default:
				echo "<p>{$lang['strinvalidparam']}</p>\n";
		}
	}

	/**
	 * Displays a screen where they can alter a column
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;

		switch ($_REQUEST['stage']) {
			case 1:
				global $lang;

				$misc->printTrail('column');
				$misc->printTitle($lang['straltercolumn'], 'pg.column.alter'); 
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th class=\"data required\">{$lang['strname']}</th>";
				if ($data->hasAlterColumnType()) {
					echo "<th class=\"data required\" colspan=\"2\">{$lang['strtype']}</th>";
					echo "<th class=\"data\">{$lang['strlength']}</th>";
				}
				else {
					echo "<th class=\"data required\">{$lang['strtype']}</th>";					
				}
				echo "<th class=\"data\">{$lang['strnotnull']}</th><th class=\"data\">{$lang['strdefault']}</th><th class=\"data\">{$lang['strcomment']}</th></tr>";

				$column = $data->getTableAttributes($_REQUEST['table'], $_REQUEST['column']);
				$column->f['attnotnull'] = $data->phpBool($column->f['attnotnull']);

				// Upon first drawing the screen, load the existing column information
				// from the database.
				if (!isset($_REQUEST['default'])) {
					$_REQUEST['field'] = $column->f['attname'];
					$_REQUEST['type'] = $column->f['base_type'];
					// Check to see if its' an array type...
					// XXX: HACKY
					if (substr($column->f['base_type'], strlen($column->f['base_type']) - 2) == '[]') {
						$_REQUEST['type'] = substr($column->f['base_type'], 0, strlen($column->f['base_type']) - 2);
						$_REQUEST['array'] = '[]';
					}
					else {
						$_REQUEST['type'] = $column->f['base_type'];
						$_REQUEST['array'] = '';
					}
					// To figure out the length, look in the brackets :(
					// XXX: HACKY
					if ($column->f['type'] != $column->f['base_type'] && ereg('\\(([0-9, ]*)\\)', $column->f['type'], $bits)) {
						$_REQUEST['length'] = $bits[1];
					}
					else
						$_REQUEST['length'] = '';
					$_REQUEST['default'] = $_REQUEST['olddefault'] = $column->f['adsrc'];
					if ($column->f['attnotnull']) $_REQUEST['notnull'] = 'YES';
					$_REQUEST['comment'] = $column->f['comment'];
				}				

				// Column name
				echo "<tr><td><input name=\"field\" size=\"32\" value=\"",
					htmlspecialchars($_REQUEST['field']), "\" /></td>";
					
				// Column type
				if ($data->hasAlterColumnType()) {
					// Fetch all available types
					$types = $data->getTypes(true, false, true);
					
					echo "<td><select name=\"type\">\n";				
					// Output any "magic" types.  This came in with Alter Column Type so we don't need to check that
					foreach ($data->extraTypes as $v) {
						echo "<option value=\"", htmlspecialchars($v), "\"",
						($v == $_REQUEST['type']) ? ' selected="selected"' : '', ">",
							$misc->printVal($v), "</option>\n";
					}
					while (!$types->EOF) {
						$typname = $types->f['typname'];
						echo "<option value=\"", htmlspecialchars($typname), "\"", ($typname == $_REQUEST['type']) ? ' selected="selected"' : '', ">",
							$misc->printVal($typname), "</option>\n";
						$types->moveNext();
					}
					echo "</select></td>";
					
					// Output array type selector
					echo "<td><select name=\"array\">\n";
					echo "<option value=\"\"", ($_REQUEST['array'] == '') ? ' selected="selected"' : '', "></option>\n";
					echo "<option value=\"[]\"", ($_REQUEST['array'] == '[]') ? ' selected="selected"' : '', ">[ ]</option>\n";
					echo "</select></td>\n";
	
					echo "<td><input name=\"length\" size=\"8\" value=\"",
						htmlspecialchars($_REQUEST['length']), "\" /></td>";
				} else {
					// Otherwise draw the read-only type name
					echo "<td>", $misc->printVal($data->formatType($column->f['type'], $column->f['atttypmod'])), "</td>";
				}
				
				echo "<td><input type=\"checkbox\" name=\"notnull\"", (isset($_REQUEST['notnull'])) ? ' checked="checked"' : '', " /></td>\n";
				echo "<td><input name=\"default\" size=\"20\" value=\"", 
					htmlspecialchars($_REQUEST['default']), "\" /></td>";
				echo "<td><input name=\"comment\" size=\"20\" value=\"", 
					htmlspecialchars($_REQUEST['comment']), "\" /></td>";
				
				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"properties\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
				echo "<input type=\"hidden\" name=\"column\" value=\"", htmlspecialchars($_REQUEST['column']), "\" />\n";
				echo "<input type=\"hidden\" name=\"olddefault\" value=\"", htmlspecialchars($_REQUEST['olddefault']), "\" />\n";
				if ($column->f['attnotnull']) echo "<input type=\"hidden\" name=\"oldnotnull\" value=\"on\" />\n";
				echo "<input type=\"hidden\" name=\"oldtype\" value=\"", htmlspecialchars($data->formatType($column->f['type'], $column->f['atttypmod'])), "\" />\n";
				// Add hidden variables to suppress error notices if we don't support altering column type
				if (!$data->hasAlterColumnType()) {
					echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\" />\n";				
					echo "<input type=\"hidden\" name=\"length\" value=\"", htmlspecialchars($_REQUEST['length']), "\" />\n";				
					echo "<input type=\"hidden\" name=\"array\" value=\"", htmlspecialchars($_REQUEST['array']), "\" />\n";				
				}
				echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";
								
				break;
			case 2:
				global $data, $lang;

				// Check inputs
				if (trim($_REQUEST['field']) == '') {
					$_REQUEST['stage'] = 1;
					doProperties($lang['strcolneedsname']);
					return;
				}

				$status = $data->alterColumn($_REQUEST['table'], $_REQUEST['column'], $_REQUEST['field'], 
							     isset($_REQUEST['notnull']), isset($_REQUEST['oldnotnull']), 
							     $_REQUEST['default'], $_REQUEST['olddefault'],
							     $_REQUEST['type'], $_REQUEST['length'], $_REQUEST['array'], $_REQUEST['oldtype'],
							     $_REQUEST['comment']);
				if ($status == 0)
					doDefault($lang['strcolumnaltered']);
				else {
					$_REQUEST['stage'] = 1;
					doProperties($lang['strcolumnalteredbad']);
					return;
				}
				break;
			default:
				echo "<p>{$lang['strinvalidparam']}</p>\n";
		}
	}

	/**
	 * Show confirmation of drop column and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $database, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('column');
			$misc->printTitle($lang['strdrop'], 'pg.column.drop');

            echo "<p>", sprintf($lang['strconfdropcolumn'], $misc->printVal($_REQUEST['column']),
                    $misc->printVal($_REQUEST['table'])), "</p>\n";
								

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"column\" value=\"", htmlspecialchars($_REQUEST['column']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\"> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropColumn($_POST['table'], $_POST['column'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strcolumndropped']);
			else
				doDefault($lang['strcolumndroppedbad']);
		}
		
	}

	/**
	 * Show default list of columns in the table
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $PHP_SELF, $lang;

		function attPre(&$rowdata) {
			global $data;
			$rowdata->f['+type'] = $data->formatType($rowdata->f['type'], $rowdata->f['atttypmod']);
		}
		
		$misc->printTrail('table');
		$misc->printTabs('table','columns');
		$misc->printMsg($msg);

		// Get table
		$tdata = $data->getTable($_REQUEST['table']);
		// Get columns
		$attrs = $data->getTableAttributes($_REQUEST['table']);		

		// Show comment if any
		if ($tdata->f['relcomment'] !== null)
			echo "<p class=\"comment\">", $misc->printVal($tdata->f['relcomment']), "</p>\n";

		$columns = array(
			'column' => array(
				'title' => $lang['strcolumn'],
				'field' => 'attname',
			),
			'type' => array(
				'title' => $lang['strtype'],
				'field' => '+type',
			),
			'notnull' => array(
				'title' => $lang['strnotnull'],
				'field' => 'attnotnull',
				'type'  => 'bool',
				'params'=> array('true' => 'NOT NULL', 'false' => ''),
			),
			'default' => array(
				'title' => $lang['strdefault'],
				'field' => 'adsrc',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'comment',
			),
		);
		
		$actions = array(
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "{$PHP_SELF}?action=properties&amp;{$misc->href}&amp;table=".urlencode($_REQUEST['table'])."&amp;",
				'vars'  => array('column' => 'attname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;table=".urlencode($_REQUEST['table'])."&amp;",
				'vars'  => array('column' => 'attname'),
			),
		);
		
		if (!$data->hasDropColumn()) unset($actions['drop']);
		
		$misc->printTable($attrs, $columns, $actions, null, 'attPre');
		
		echo "<br />\n";

		echo "<ul>\n";
		$return_url = urlencode("tblproperties.php?{$misc->href}&table={$_REQUEST['table']}");
		echo "\t<li><a href=\"display.php?{$misc->href}&amp;table=", urlencode($_REQUEST['table']), "&amp;subject=table&amp;return_url={$return_url}&amp;return_desc=",
			urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confselectrows&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['strselect']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confinsertrow&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['strinsert']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confirm_empty&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['strempty']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confirm_drop&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['strdrop']}</a></li>\n";
		echo "\t<li><a href=\"{$PHP_SELF}?action=add_column&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['straddcolumn']}</a></li>\n";
		echo "\t<li><a href=\"{$PHP_SELF}?action=confirm_alter&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']),"\">{$lang['stralter']}</a></li>\n";
		echo "</ul>\n";
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table']);
	$misc->printBody();

	switch ($action) {
		case 'alter':
			if (isset($_POST['alter'])) doSaveAlter();
			else doDefault();
			break;
		case 'confirm_alter':
			doAlter();
			break;
		case 'import':
			doImport();
			break;
		case 'export':
			doExport();
			break;
		case 'add_column':
			if (isset($_POST['cancel'])) doDefault();
			else doAddColumn();
			break;
		case 'properties':
			if (isset($_POST['cancel'])) doDefault();
			else doProperties();
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
