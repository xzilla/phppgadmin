<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.21 2003/09/09 06:23:12 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	function _highlight($string, $term) {
		return str_replace($term, "<b>{$term}</b>", $string);
	}	

	/**
	 * Searches for a named database object
	 */
	function doFind($confirm = true, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_GET['term'])) $_GET['term'] = '';

		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfind']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"get\">\n";
		echo "<p><input name=\"term\" value=\"", htmlspecialchars($_GET['term']), 
			"\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strfind']}\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"action\" value=\"find\" />\n";
		echo "</form>\n";
		
		if ($_GET['term'] != '') {
			$rs = &$localData->findObject($_GET['term']);
			if ($rs->recordCount() > 0) {
				$curr = '';
				while (!$rs->EOF) {
					if ($rs->f['type'] != $curr) {
						if ($curr != '') echo "</ul>\n";
						$curr = $rs->f['type'];
						echo "<h2>";
						switch ($curr) {
							case 'SCHEMA':
								echo $lang['strschemas'];
								break;
							case 'TABLE':
								echo $lang['strtables'];
								break;
							case 'VIEW':
								echo $lang['strviews'];
								break;
							case 'SEQUENCE':
								echo $lang['strsequences'];
								break;
							case 'COLUMN':
								echo $lang['strcolumns'];
								break;
							case 'FUNCTION':
								echo $lang['strfunctions'];
								break;
							case 'TYPE':
								echo $lang['strtypes'];
								break;
							case 'OPERATOR':
								echo $lang['stroperators'];
								break;
						}
						echo "</h2>";
						echo "<ul>\n";
					}
					
					// Generate schema prefix
					if ($localData->hasSchemas())
						$prefix = $rs->f['schemaname'] . '.';
					else
						$prefix = '';
						
					switch ($curr) {
						case 'SCHEMA':						
							echo "<li><a href=\"database.php?{$misc->href}\">", _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TABLE':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&table=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'VIEW':
							echo "<li><a href=\"views.php?action=properties&{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&view=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'SEQUENCE':
							echo "<li><a href=\"sequences.php?action=properties&{$misc->href}&schema=", urlencode($rs->f['schemaname']), 
								"&sequence=", urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'COLUMN':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&table=", 
								urlencode($rs->f['relname']), "&column=", urlencode($rs->f['name']), "&action=properties\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'FUNCTION':
							echo "<li><a href=\"functions.php?action=properties&{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&function=", 
								urlencode($rs->f['name']), "&function_oid=", urlencode($rs->f['oid']), "\">", 
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TYPE':
							echo "<li><a href=\"types.php?action=properties&{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&type=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'OPERATOR':
							echo "<li><a href=\"operators.php?{$misc->href}&schema=", urlencode($rs->f['schemaname']), "&operator=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
					}
					$rs->moveNext();	
				}			
				echo "</ul>\n";
				
				echo "<p>", $rs->recordCount(), " ", $lang['strrows'], "</p>\n";
			}
			else echo "<p>{$lang['strnodata']}</p>\n";
		}		
	}
	
	/**
	 * Allow database administration and tuning tasks
	 */
	function doAdmin($action = '', $msg = '') {
		global $PHP_SELF, $localData, $misc;
		global $lang;

		switch ($action) {
			case 'vacuum':
				$status = $localData->vacuumDB();
				if ($status == 0) doAdmin('', $lang['strvacuumgood']);
				else doAdmin('', $lang['strvacuumbad']);
				break;
			case 'analyze':
				$status = $localData->analyzeDB();
				if ($status == 0) doAdmin('', $lang['stranalyzegood']);
				else doAdmin('', $lang['stranalyzebad']);
				break;
			default:
				$misc->printDatabaseNav();
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['stradmin']}</h2>\n";
				$misc->printMsg($msg);
				echo "<ul>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&action=vacuum\">{$lang['strvacuum']}</a></li>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&action=analyze\">{$lang['stranalyze']}</a></li>\n";
				echo "</ul>\n";

				break;
		}
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $PHP_SELF, $localData, $misc;
		global $lang;

		if (!isset($_POST['query'])) $_POST['query'] = '';

		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsql']}</h2>\n";

		echo "<p>{$lang['strentersql']}</p>\n";
		echo "<form action=\"sql.php\" method=\"post\">\n";
		echo "<p>{$lang['strsql']}<br />\n";
		echo "<textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_POST['query']), "</textarea></p>\n";

		echo $misc->form;
		echo "<input type=\"hidden\" name=\"return_url\" value=\"database.php?database=",
			urlencode($_REQUEST['database']), "&action=sql\" />\n";
		echo "<input type=\"hidden\" name=\"return_desc\" value=\"{$lang['strback']}\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strgo']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
		echo "</form>\n";
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang, $_reload_browser;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": ",
				$misc->printVal($_REQUEST['schema']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdropschema'], $misc->printVal($_REQUEST['schema'])), "</p>\n";

			echo "<form action=\"{$PHP_SELF}\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\" />\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_REQUEST['schema']), "\" />\n";
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSchema($_POST['schema'], isset($_POST['cascade']));
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strschemadropped']);
			}
			else
				doDefault($lang['strschemadroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new schema
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		if (!isset($_POST['formAuth'])) $_POST['formAuth'] = $_SESSION['webdbUsername'];

		// Fetch all users from the database
		$users = &$data->getUsers();

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strcreateschema']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strowner']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input name=\"formName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\" /></td>\n";
		echo "<td class=\"data1\"><select name=\"formAuth\">";
		while (!$users->EOF) {
			$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
			echo "<option value=\"{$uname}\"",
				($uname == $_POST['formAuth']) ? ' selected="selected"' : '', ">{$uname}</option>\n";
			$users->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "</table>\n";
		echo "<p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
		echo "</p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?database=", 
			urlencode($_REQUEST['database']), "\">{$lang['strshowallschemas']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new schema in the database
	 */
	function doSaveCreate() {
		global $localData, $lang, $_reload_browser;

		// Check that they've given a name
		if ($_POST['formName'] == '') doCreate($lang['strschemaneedsname']);
		else {
			$status = $localData->createSchema($_POST['formName'], $_POST['formAuth']);
			if ($status == 0) {
				$_reload_browser = true;
				doDefault($lang['strschemacreated']);
			}
			else
				doCreate($lang['strschemacreatedbad']);
		}
	}	

	/**
	 * Show default list of schemas in the server
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strschemas']}</h2>\n";
		$misc->printMsg($msg);
		
		// Check that the DB actually supports schemas
		if ($data->hasSchemas()) {
			$schemas = &$localData->getSchemas();

			if ($schemas->recordCount() > 0) {
				echo "<table>\n";
				echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strowner']}</th>";
				echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";
				$i = 0;
				while (!$schemas->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr><td class=\"data{$id}\">", $misc->printVal($schemas->f[$data->nspFields['nspname']]), "</td>\n";
					echo "<td class=\"data{$id}\">", $misc->printVal($schemas->f[$data->nspFields['nspowner']]), "</td>\n";
					echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&database=",
						urlencode($_REQUEST['database']), "&schema=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "\">{$lang['strdrop']}</a></td>\n";
					echo "<td class=\"opbutton{$id}\"><a href=\"privileges.php?database=",
						urlencode($_REQUEST['database']), "&object=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "&type=schema\">{$lang['strprivileges']}</a></td>\n";
					echo "</tr>\n";
					$schemas->moveNext();
					$i++;
				}
				echo "</table>\n";
			}
			else {
				echo "<p>{$lang['strnoschemas']}</p>\n";
			}

			echo "<p><a class=\"navlink\" href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']),
				"&action=create\">{$lang['strcreateschema']}</a></p>\n";
		} else {
			// If the database does not support schemas...
			echo "<p>{$lang['strnoschemas']}</p>\n";
		}
	}

	$misc->printHeader($lang['strschemas']);
	$misc->printBody();

	switch ($action) {
		case 'find':
			if (isset($_GET['term'])) doFind(false);
			else doFind(true);
			break;
		case 'analyze':
			doAdmin('analyze');
			break;
		case 'vacuum':
			doAdmin('vacuum');
			break;
		case 'admin':
			doAdmin();
			break;
		case 'sql':
			doSQL();
			break;
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['yes'])) doDrop(false);
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
