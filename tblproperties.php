<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.30 2003/11/05 08:32:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/** 
	 * Function to save after altering a table
	 */
	function doSaveAlter() {
		global $localData, $lang, $_reload_browser;

		// For databases that don't allow owner change
		if (!isset($_POST['owner'])) $_POST['owner'] = '';
		
		$status = $localData->alterTable($_POST['table'], $_POST['name'], $_POST['owner'], $_POST['comment']);
		if ($status == 0) {
			// Jump them to the new table name
			$_REQUEST['table'] = $_POST['name'];
			// Force a browser reload
			$_reload_browser = true;
			doDefault($lang['strtablealtered']);
		}
		else
			doAlter($lang['strtablealteredbad']);
	}

	/**
	 * Function to allow altering of a table
	 */
	function doAlter($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['stralter']}</h2>\n";
		$misc->printMsg($msg);

		// Fetch table info		
		$table = &$localData->getTable($_REQUEST['table']);
		// Fetch all users
		$users = &$data->getUsers();
		
		if ($table->recordCount() > 0) {
			
			if (!isset($_POST['name'])) $_POST['name'] = $table->f[$data->tbFields['tbname']];
			if (!isset($_POST['owner'])) $_POST['owner'] = $table->f[$data->tbFields['tbowner']];
			if (!isset($_POST['comment'])) $_POST['comment'] = $table->f[$data->tbFields['tbcomment']];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				htmlspecialchars($_POST['name']), "\" /></td></tr>\n";
			if ($data->hasAlterTableOwner()) {
				echo "<tr><th class=\"data\">{$lang['strowner']}</th>\n";
				echo "<td class=\"data1\"><select name=\"owner\">";
				while (!$users->EOF) {
					$uname = $users->f[$data->uFields['uname']];
					echo "<option value=\"", htmlspecialchars($uname), "\"",
						($uname == $_POST['owner']) ? ' selected="selected"' : '', ">", htmlspecialchars($uname), "</option>\n";
					$users->moveNext();
				}
				echo "</select></td></tr>\n";				
			}
			echo "<tr><th class=\"data\">{$lang['strcomment']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"comment\" size=\"32\" value=\"", 
				htmlspecialchars($_POST['comment']), "\" /></td></tr>\n";
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
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		// Determine whether or not the table has an object ID
		$hasID = $localData->hasObjectID($_REQUEST['table']);
		
		$misc->printTableNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strexport']}</h2>\n";
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
		echo "<option value=\"tab\">Tabbed</option>\n";
		echo "<option value=\"html\">XHTML</option>\n";
		echo "<option value=\"xml\">XML</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		if ($hasID) {
			echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"d_oids\" /></td>\n</tr>\n";
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
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		if ($hasID) {
			echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"sd_oids\" /></td>\n</tr>\n";
		}
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<table>\n";		
		echo "<tr>\n<th class=\"data left\">{$lang['strdownload']}</th>\n";
		echo "<td><input type=\"checkbox\" name=\"download\" /></td>\n</tr>\n";
		echo "</table>\n";

		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}

	/**
	 * Displays a screen where they can add a column
	 */
	function doAddColumn($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;

		switch ($_REQUEST['stage']) {
			case 1:
				global $lang;

				// Set variable defaults
				if (!isset($_POST['field'])) $_POST['field'] = '';
				if (!isset($_POST['type'])) $_POST['type'] = '';
				if (!isset($_POST['length'])) $_POST['length'] = '';

				// Fetch all available types
				$types = &$localData->getTypes(true);

				echo "<h2>", $misc->printVal($_REQUEST['database']), ": ",
					$misc->printVal($_REQUEST['table']), ": {$lang['straddcolumn']}</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strlength']}</th></tr>";

				echo "<tr><td><input name=\"field\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
					htmlspecialchars($_POST['field']), "\" /></td>";
				echo "<td><select name=\"type\">\n";
				while (!$types->EOF) {
					$typname = $types->f[$data->typFields['typname']];
					echo "<option value=\"", htmlspecialchars($typname), "\"", ($typname == $_POST['type']) ? ' selected="selected"' : '', ">",
						$misc->printVal($typname), "</option>\n";
					$types->moveNext();
				}
				echo "</select></td>\n";
				echo "<td><input name=\"length\" size=\"8\" value=\"",
					htmlspecialchars($_POST['length']), "\" /></td></tr>";
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
				global $localData, $lang;

				// Check inputs
				if (trim($_POST['field']) == '') {
					$_REQUEST['stage'] = 1;
					doAddColumn($lang['strfieldneedsname']);
					return;
				}
				
				$status = $localData->addColumn($_POST['table'], $_POST['field'],
								$_POST['type'], $_POST['length']);
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
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;

		switch ($_REQUEST['stage']) {
			case 1:
				global $lang;

				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: {$lang['straltercolumn']}: ",
					$misc->printVal($_REQUEST['column']), "</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strnotnull']}</th><th class=\"data\">{$lang['strdefault']}</th></tr>";

				$column = &$localData->getTableAttributes($_REQUEST['table'], $_REQUEST['column']);
				$column->f['attnotnull'] = $localData->phpBool($column->f['attnotnull']);

				if (!isset($_REQUEST['default'])) {
					$_REQUEST['field'] = $column->f['attname'];
					$_REQUEST['default'] = $_REQUEST['olddefault'] = $column->f['adsrc'];
					if ($column->f['attnotnull']) $_REQUEST['notnull'] = 'YES';
				}				

				echo "<tr><td><input name=\"field\" size=\"32\" value=\"",
					htmlspecialchars($_REQUEST['field']), "\" /></td>";
				echo "<td>", $misc->printVal($localData->formatType($column->f['type'], $column->f['atttypmod'])), "</td>";
				echo "<td><input type=\"checkbox\" name=\"notnull\"", (isset($_REQUEST['notnull'])) ? ' checked="checked"' : '', " /></td>\n";
				echo "<td><input name=\"default\" size=\"20\" value=\"", 
					htmlspecialchars($_REQUEST['default']), "\" /></td>";
				
				echo "</table>\n";
				echo "<p><input type=\"hidden\" name=\"action\" value=\"properties\" />\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\" />\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
				echo "<input type=\"hidden\" name=\"column\" value=\"", htmlspecialchars($_REQUEST['column']), "\" />\n";
				echo "<input type=\"hidden\" name=\"olddefault\" value=\"", htmlspecialchars($_REQUEST['olddefault']), "\" />\n";
				echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
				echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
				echo "</form>\n";
								
				break;
			case 2:
				global $localData, $lang;

				// Check inputs
				if (trim($_REQUEST['field']) == '') {
					$_REQUEST['stage'] = 1;
					doProperties($lang['strfieldneedsname']);
					return;
				}
				
				$status = $localData->alterColumn($_REQUEST['table'], $_REQUEST['column'], $_REQUEST['field'], 
								isset($_REQUEST['notnull']), $_REQUEST['default'], $_REQUEST['olddefault']);
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
		global $localData, $database, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", 
				$misc->printVal($_REQUEST['table']), ": " , $misc->printVal($_REQUEST['column']), ": {$lang['strdrop']}</h2>\n";

                        echo "<p>", sprintf($lang['strconfdropcolumn'], $misc->printVal($_REQUEST['column']),
                                $misc->printVal($_REQUEST['table'])), "</p>\n";
								

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"column\" value=\"", htmlspecialchars($_REQUEST['column']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\"> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropColumn($_POST['table'], $_POST['column'], isset($_POST['cascade']));
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
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		$misc->printTableNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), "</h2>\n";

		// Get table
		$tdata = &$localData->getTable($_REQUEST['table']);
		// Get columns
		$attrs = &$localData->getTableAttributes($_REQUEST['table']);		
		$misc->printMsg($msg);

		// Show comment if any
		if ($tdata->f[$data->tbFields['tbcomment']] != null)
			echo "<p class=\"comment\">", htmlspecialchars($tdata->f[$data->tbFields['tbcomment']]), "</p>\n";

		echo "<table>\n";
		echo "<tr>\n\t<th class=\"data\">{$lang['strfield']}</th>\n\t<th class=\"data\">{$lang['strtype']}</th>\n";
		echo "\t<th class=\"data\">{$lang['strnotnull']}</th>\n\t<th class=\"data\">{$lang['strdefault']}</th>\n";
		if ($data->hasDropColumn())
			echo "\t<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";
		else
			echo "\t<th class=\"data\">{$lang['stractions']}</th>\n";
		echo "</tr>\n";

		$i = 0;
		while (!$attrs->EOF) {
			$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
			$id = (($i % 2) == 0 ? '1' : '2');
			echo "<tr>\n\t<td class=\"data{$id}\">", $misc->printVal($attrs->f['attname']), "</td>\n";
			echo "\t<td class=\"data{$id}\">", $misc->printVal($localData->formatType($attrs->f['type'], $attrs->f['atttypmod'])), "</td>\n";
			echo "\t<td class=\"data{$id}\">", ($attrs->f['attnotnull'] ? 'NOT NULL' : ''), "</td>\n";
			echo "\t<td class=\"data{$id}\">", $misc->printVal($attrs->f['adsrc']), "</td>\n";
			echo "\t<td class=\"opbutton{$id}\"><a href=\"{$PHP_SELF}?{$misc->href}&table=", urlencode($_REQUEST['table']),
				"&column=", urlencode($attrs->f['attname']), "&action=properties\">{$lang['stralter']}</a></td>\n";
			if ($data->hasDropColumn()) {
				echo "\t<td class=\"opbutton{$id}\"><a href=\"{$PHP_SELF}?{$misc->href}&table=", urlencode($_REQUEST['table']),
					"&column=", urlencode($attrs->f['attname']), "&action=confirm_drop\">{$lang['strdrop']}</a></td>\n";
			}
			echo "</tr>\n";
			$attrs->moveNext();
			$i++;
		}
		echo "</table>\n";
		echo "<br />\n";

		echo "<ul>\n";
		$return_url = urlencode("tblproperties.php?{$misc->href}&table={$_REQUEST['table']}");
		echo "\t<li><a href=\"display.php?{$misc->href}&table=", urlencode($_REQUEST['table']), "&return_url={$return_url}&return_desc=",
			urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confselectrows&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['strselect']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confinsertrow&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['strinsert']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confirm_empty&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['strempty']}</a></li>\n";
		echo "\t<li><a href=\"tables.php?action=confirm_drop&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['strdrop']}</a></li>\n";
		echo "\t<li><a href=\"{$PHP_SELF}?action=add_column&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['straddcolumn']}</a></li>\n";
		echo "\t<li><a href=\"{$PHP_SELF}?action=confirm_alter&{$misc->href}&table=", urlencode($_REQUEST['table']),"\">{$lang['stralter']}</a></li>\n";
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
