<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.35 2004/02/13 08:53:04 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

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
		global $PHP_SELF, $data, $data, $misc;
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
		
		// Default focus
		$misc->setFocus('forms[0].term');

		// If a search term has been specified, then perform the search
		// and display the results, grouped by object type
		if ($_GET['term'] != '') {
			$rs = &$data->findObject($_GET['term']);
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
							case 'INDEX':
								echo $lang['strindexes'];
								break;
							case 'CONSTRAINT':
								echo $lang['strconstraints'];
								break;
							case 'TRIGGER':
								echo $lang['strtriggers'];
								break;
							case 'RULE':
								echo $lang['strrules'];
								break;
							case 'FUNCTION':
								echo $lang['strfunctions'];
								break;
							case 'TYPE':
								echo $lang['strtypes'];
								break;
							case 'DOMAIN':
								echo $lang['strdomains'];
								break;
							case 'OPERATOR':
								echo $lang['stroperators'];
								break;
							case 'CONVERSION':
								echo $lang['strconversions'];
								break;
							case 'LANGUAGE':
								echo $lang['strlanguages'];
								break;
							case 'AGGREGATE':
								echo $lang['straggregates'];
								break;
							case 'OPCLASS':
								echo $lang['stropclasses'];
								break;
						}
						echo "</h2>";
						echo "<ul>\n";
					}
					
					// Generate schema prefix
					if ($data->hasSchemas())
						$prefix = $rs->f['schemaname'] . '.';
					else
						$prefix = '';
						
					switch ($curr) {
						case 'SCHEMA':						
							echo "<li><a href=\"database.php?{$misc->href}\">", _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TABLE':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'VIEW':
							echo "<li><a href=\"views.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;view=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'SEQUENCE':
							echo "<li><a href=\"sequences.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), 
								"&amp;sequence=", urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'COLUMN':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "&amp;column=", urlencode($rs->f['name']), "&amp;action=properties\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'INDEX':
							echo "<li><a href=\"indexes.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'CONSTRAINT':
							echo "<li><a href=\"constraints.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TRIGGER':
							echo "<li><a href=\"triggers.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'RULE':
							echo "<li><a href=\"rules.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'FUNCTION':
							echo "<li><a href=\"functions.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;function=", 
								urlencode($rs->f['name']), "&amp;function_oid=", urlencode($rs->f['oid']), "\">", 
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TYPE':
							echo "<li><a href=\"types.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;type=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'DOMAIN':
							echo "<li><a href=\"domains.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;domain=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'OPERATOR':
							echo "<li><a href=\"operators.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;operator=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'CONVERSION':
							echo "<li><a href=\"conversions.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), 
								"\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'LANGUAGE':
							echo "<li><a href=\"languages.php?{$misc->href}\">", _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'AGGREGATE':
							echo "<li><a href=\"aggregates.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "\">",
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'OPCLASS':
							echo "<li><a href=\"opclasses.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "\">",
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
					}
					$rs->moveNext();	
				}			
				echo "</ul>\n";
				
				echo "<p>", $rs->recordCount(), " ", $lang['strobjects'], "</p>\n";
			}
			else echo "<p>{$lang['strnoobjects']}</p>\n";
		}		
	}

	/**
	 * Displays options for database download
	 */
	function doExport($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strexport']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"dbexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\" rowspan=\"2\">";
		echo "<input type=\"radio\" name=\"what\" value=\"dataonly\" checked=\"checked\" />{$lang['strdataonly']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"d_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"d_oids\" /></td>\n</tr>\n";
		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" name=\"what\" value=\"structureonly\" />{$lang['strstructureonly']}</th>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"3\">";
		echo "<input type=\"radio\" name=\"what\" value=\"structureanddata\" />{$lang['strstructureanddata']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"sd_oids\" /></td>\n</tr>\n";
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" name=\"output\" value=\"show\" checked=\"checked\" />{$lang['strshow']}\n";
		echo "<br/><input type=\"radio\" name=\"output\" value=\"download\" />{$lang['strdownload']}\n";
		echo "<br /><input type=\"radio\" name=\"output\" value=\"gzipped\" />{$lang['strdownloadgzipped']}</p>\n";

		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Show the current status of all database variables
	 */
	function doVariables() {
		global $PHP_SELF, $data, $misc;
		global $lang;

		// Fetch the variables from the database
		$variables = &$data->getVariables();
		
		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strvariables']}</h2>\n";

		if ($variables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strsetting']}</th></tr>\n";
			$i = 0;
			while (!$variables->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>";
				echo "<td class=\"data{$id}\">", $misc->printVal($variables->f['name']), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal($variables->f['setting']), "</td>";
				echo "</tr>\n";
				$variables->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnodata']}</p>\n";
		}
	}

	/**
	 * Show all current database connections and any queries they
	 * are running.
	 */
	function doProcesses() {
		global $PHP_SELF, $data, $misc;
		global $lang;

		// Fetch the processes from the database
		$processes = &$data->getProcesses($_REQUEST['database']);
		
		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strprocesses']}</h2>\n";

		if ($processes->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strusername']}</th><th class=\"data\">{$lang['strprocess']}</th>";
			echo "<th class=\"data\">{$lang['strsql']}</th>";
			// Show query start time for 7.4+
			if (isset($processes->f['query_start'])) echo "<th class=\"data\">{$lang['strstarttime']}</th>";
			echo "</tr>\n";
			
			$i = 0;
			while (!$processes->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>";
				echo "<td class=\"data{$id}\">", $misc->printVal($processes->f['usename']), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal($processes->f['procpid'], false, 'int4'), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal($processes->f['current_query']), "</td>";
				// Show query start time for 7.4+
				if (isset($processes->f['query_start'])) {
					echo "<td class=\"data{$id}\">", $misc->printVal($processes->f['query_start']), "</td>";				
				}
				echo "</tr>\n";
				$processes->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnodata']}</p>\n";
		}
	}

	/**
	 * Allow database administration and tuning tasks
	 */
	function doAdmin($action = '', $msg = '') {
		global $PHP_SELF, $data, $misc;
		global $lang;

		switch ($action) {
			case 'vacuum':
				$status = $data->vacuumDB();
				if ($status == 0) doAdmin('', $lang['strvacuumgood']);
				else doAdmin('', $lang['strvacuumbad']);
				break;
			case 'analyze':
				$status = $data->analyzeDB();
				if ($status == 0) doAdmin('', $lang['stranalyzegood']);
				else doAdmin('', $lang['stranalyzebad']);
				break;
			default:
				$misc->printDatabaseNav();
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['stradmin']}</h2>\n";
				$misc->printMsg($msg);
				echo "<ul>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&amp;action=vacuum\">{$lang['strvacuum']}</a></li>\n";
				echo "<li><a href=\"{$PHP_SELF}?{$misc->href}&amp;action=analyze\">{$lang['stranalyze']}</a></li>\n";
				echo "</ul>\n";

				break;
		}
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $PHP_SELF, $data, $misc;
		global $lang;

		if (!isset($_REQUEST['query'])) $_REQUEST['query'] = '';

		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsql']}</h2>\n";

		echo "<p>{$lang['strentersql']}</p>\n";
		echo "<form action=\"sql.php\" method=\"post\">\n";
		echo "<p>{$lang['strsql']}<br />\n";
		echo "<textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_REQUEST['query']), "</textarea></p>\n";

		echo $misc->form;
		echo "<input type=\"checkbox\" name=\"paginate\"", (isset($_REQUEST['paginate']) ? ' checked="checked"' : ''), " /> {$lang['strpaginate']}\n";
		echo "<br /><br />\n";
		echo "<input type=\"submit\" value=\"{$lang['strgo']}\" />\n";
		echo "</form>\n";

		// Default focus
		$misc->setFocus('forms[0].query');
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $PHP_SELF, $data, $data, $misc;
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
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropSchema($_POST['schema'], isset($_POST['cascade']));
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
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t\t<td class=\"data1\"><input name=\"formName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strowner']}</th>\n";
		echo "\t\t<td class=\"data1\">\n\t\t\t<select name=\"formAuth\">\n";
		while (!$users->EOF) {
			$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
			echo "\t\t\t\t<option value=\"{$uname}\"",
				($uname == $_POST['formAuth']) ? ' selected="selected"' : '', ">{$uname}</option>\n";
			$users->moveNext();
		}
		echo "\t\t\t</select>\n\t\t</td>\n\t</tr>\n";
		echo "</table>\n";
		echo "<p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
		echo "</p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new schema in the database
	 */
	function doSaveCreate() {
		global $data, $lang, $_reload_browser;

		// Check that they've given a name
		if ($_POST['formName'] == '') doCreate($lang['strschemaneedsname']);
		else {
			$status = $data->createSchema($_POST['formName'], $_POST['formAuth']);
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
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printDatabaseNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strschemas']}</h2>\n";
		$misc->printMsg($msg);
		
		// Check that the DB actually supports schemas
		if ($data->hasSchemas()) {
			$schemas = &$data->getSchemas();

			if ($schemas->recordCount() > 0) {
				echo "<table>\n";
				echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strowner']}</th>";
				echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";
				$i = 0;
				while (!$schemas->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr><td class=\"data{$id}\">", $misc->printVal($schemas->f[$data->nspFields['nspname']]), "</td>\n";
					echo "<td class=\"data{$id}\">", $misc->printVal($schemas->f[$data->nspFields['nspowner']]), "</td>\n";
					echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&amp;database=",
						urlencode($_REQUEST['database']), "&amp;schema=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "\">{$lang['strdrop']}</a></td>\n";
					echo "<td class=\"opbutton{$id}\"><a href=\"privileges.php?database=",
						urlencode($_REQUEST['database']), "&amp;object=",
						urlencode($schemas->f[$data->nspFields['nspname']]), "&amp;type=schema\">{$lang['strprivileges']}</a></td>\n";
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
				"&amp;action=create\">{$lang['strcreateschema']}</a></p>\n";
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
			if (!isset($_POST['cancel'])) doSaveCreate();
			else doDefault();
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
		case 'variables':
			doVariables();
			break;
		case 'processes':
			doProcesses();
			break;
		case 'export':
			doExport();
			break;
		default:
			if ($data->hasSchemas())
				doDefault();
			else
				doSQL();
			break;
	}

	$misc->printFooter();

?>
