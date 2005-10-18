<?php

	/**
	 * Alternative SQL editing window
	 *
	 * $Id: sqledit.php,v 1.29 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Private function to display server and list of databases
	 */
	function _printConnection() {
		global $data, $lang, $conf, $action, $misc;
		
		// The javascript action on the select box reloads the
		// popup whenever the server or database is changed.
		// This ensures that the correct page encoding is used.
		$onchange = "onchange=\"location.href='sqledit.php?action=" . 
				urlencode($action) . "&amp;server=' + encodeURI(server.options[server.selectedIndex].value) + '&amp;database=' + encodeURI(database.options[database.selectedIndex].value) + ";
		
		// The exact URL to reload to is different between SQL and Find mode, however.
		if ($action == 'find') {
			$onchange .= "'&amp;term=' + encodeURI(term.value) + '&amp;filter=' + encodeURI(filter.value) + '&amp;" . SID . "'\">\n";
		} else {
			$onchange .= "'&amp;query=' + encodeURI(query.value) ";
			if ($data->hasSchemas()) $onchange .= "+ '&amp;search_path=' + encodeURI(search_path.value) ";
			$onchange .= "+ (paginate.checked ? '&amp;paginate=on' : '')  + '&amp;" . SID . "'\"";
		}
		
		echo "<table width=\"100%\"><tr><td>\n";
		echo "<label>";
		$misc->printHelp($lang['strserver'], 'pg.server');
		echo "</label>";
		echo ": <select name=\"server\" {$onchange}>\n";
		
		$servers = $misc->getServers();
		foreach($servers as $info) {
			if (empty($info['username'])) continue;
			echo "<option value=\"", htmlspecialchars($info['id']), "\"",
				((isset($_REQUEST['server']) && $info['id'] == $_REQUEST['server'])) ? ' selected="selected"' : '', ">",
				htmlspecialchars("{$info['desc']} ({$info['id']})"), "</option>\n";
		}
		echo "</select>\n</td><td align=\"right\">\n";
		
		// Get the list of all databases
		$databases = $data->getDatabases();

		if ($databases->recordCount() > 0) {
			// The javascript action on the select box reloads
			// the popup whenever the database is changed.
			// This ensures that the correct page encoding is used.

			echo "<label>";
			$misc->printHelp($lang['strdatabase'], 'pg.database');
			echo ": <select name=\"database\" {$onchange}>\n";
			
			while (!$databases->EOF) {
				$dbname = $databases->f['datname'];
				echo "<option value=\"", htmlspecialchars($dbname), "\"",
				((isset($_REQUEST['database']) && $dbname == $_REQUEST['database'])) ? ' selected="selected"' : '', ">",
					htmlspecialchars($dbname), "</option>\n";
				$databases->moveNext();
			}
			echo "</select></label>\n";
		}
		else {
			$server_info = $misc->getServerInfo();
			echo "<input type=\"hidden\" name=\"database\" value=\"", 
				htmlspecialchars($server_info['defaultdb']), "\" />\n";
		}
		
		echo "</td></tr></table>\n";
	}
	
	/**
	 * Searches for a named database object
	 */
	function doFind() {
		global $PHP_SELF, $data, $misc;
		global $lang, $conf;
		
		if (!isset($_GET['term'])) $_GET['term'] = '';
		if (!isset($_GET['filter'])) $_GET['filter'] = '';
		
		$misc->printHeader($lang['strfind']);
		
		// Bring to the front always
		echo "<body onload=\"window.focus();\">\n";
		
		$misc->printTabs($misc->getNavTabs('popup'), 'find');
		
		echo "<form action=\"database.php\" method=\"get\" target=\"detail\">\n<p>";
		_printConnection();
		echo "</p><p><input name=\"term\" value=\"", htmlspecialchars($_GET['term']), 
			"\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
			
		// Output list of filters.  This is complex due to all the 'has' and 'conf' feature possibilities
		echo "<select name=\"filter\">\n";
		echo "\t<option value=\"\"", ($_GET['filter'] == '') ? ' selected="selected"' : '', ">{$lang['strallobjects']}</option>\n";
		if ($data->hasSchemas())
			echo "\t<option value=\"SCHEMA\"", ($_GET['filter'] == 'SCHEMA') ? ' selected="selected"' : '', ">{$lang['strschemas']}</option>\n";
		echo "\t<option value=\"TABLE\"", ($_GET['filter'] == 'TABLE') ? ' selected="selected"' : '', ">{$lang['strtables']}</option>\n";
		echo "\t<option value=\"VIEW\"", ($_GET['filter'] == 'VIEW') ? ' selected="selected"' : '', ">{$lang['strviews']}</option>\n";
		echo "\t<option value=\"SEQUENCE\"", ($_GET['filter'] == 'SEQUENCE') ? ' selected="selected"' : '', ">{$lang['strsequences']}</option>\n";
		echo "\t<option value=\"COLUMN\"", ($_GET['filter'] == 'COLUMN') ? ' selected="selected"' : '', ">{$lang['strcolumns']}</option>\n";
		echo "\t<option value=\"RULE\"", ($_GET['filter'] == 'RULE') ? ' selected="selected"' : '', ">{$lang['strrules']}</option>\n";
		echo "\t<option value=\"INDEX\"", ($_GET['filter'] == 'INDEX') ? ' selected="selected"' : '', ">{$lang['strindexes']}</option>\n";
		echo "\t<option value=\"TRIGGER\"", ($_GET['filter'] == 'TRIGGER') ? ' selected="selected"' : '', ">{$lang['strtriggers']}</option>\n";
		echo "\t<option value=\"CONSTRAINT\"", ($_GET['filter'] == 'CONSTRAINT') ? ' selected="selected"' : '', ">{$lang['strconstraints']}</option>\n";
		echo "\t<option value=\"FUNCTION\"", ($_GET['filter'] == 'FUNCTION') ? ' selected="selected"' : '', ">{$lang['strfunctions']}</option>\n";
		if ($data->hasDomains())
			echo "\t<option value=\"DOMAIN\"", ($_GET['filter'] == 'DOMAIN') ? ' selected="selected"' : '', ">{$lang['strdomains']}</option>\n";
		if ($conf['show_advanced']) {
			echo "\t<option value=\"AGGREGATE\"", ($_GET['filter'] == 'AGGREGATE') ? ' selected="selected"' : '', ">{$lang['straggregates']}</option>\n";
			echo "\t<option value=\"TYPE\"", ($_GET['filter'] == 'TYPE') ? ' selected="selected"' : '', ">{$lang['strtypes']}</option>\n";
			echo "\t<option value=\"OPERATOR\"", ($_GET['filter'] == 'OPERATOR') ? ' selected="selected"' : '', ">{$lang['stroperators']}</option>\n";
			echo "\t<option value=\"OPCLASS\"", ($_GET['filter'] == 'OPCLASS') ? ' selected="selected"' : '', ">{$lang['stropclasses']}</option>\n";
			if ($data->hasConversions())
				echo "\t<option value=\"CONVERSION\"", ($_GET['filter'] == 'CONVERSION') ? ' selected="selected"' : '', ">{$lang['strconversions']}</option>\n";
			echo "\t<option value=\"LANGUAGE\"", ($_GET['filter'] == 'LANGUAGE') ? ' selected="selected"' : '', ">{$lang['strlanguages']}</option>\n";
		}
		echo "</select>\n";
					
		echo "<input type=\"submit\" value=\"{$lang['strfind']}\" />\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"find\" /></p>\n";
		echo "</form>\n";

		// Default focus
		$misc->setFocus('forms[0].term');
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doDefault() {
		global $PHP_SELF, $data, $misc;
		global $lang, $conf;
		
		if (!isset($_REQUEST['query'])) $_REQUEST['query'] = '';
		
		$misc->printHeader($lang['strsql']);
		
		// Bring to the front always
		echo "<body onload=\"window.focus();\">\n";
		
		$misc->printTabs($misc->getNavTabs('popup'), 'sql');
		
		echo "<form action=\"sql.php\" method=\"post\" target=\"detail\">\n<p>";
		_printConnection();
		echo "</p>\n";
		if ($data->hasSchemas()) {
			if (!isset($_REQUEST['search_path']))
				$_REQUEST['search_path'] = implode(',',$data->getSearchPath());
		
			echo "<p><label>";
			$misc->printHelp($lang['strsearchpath'], 'pg.schema.search_path');
			echo ": <input type=\"text\" name=\"search_path\" size=\"50\" value=\"",
				htmlspecialchars($_REQUEST['search_path']), "\" /></label></p>\n";
		}
		
		echo "<textarea style=\"width: 100%;\" rows=\"10\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_REQUEST['query']), "</textarea>\n";
		echo "<label><input type=\"checkbox\" name=\"paginate\"", (isset($_REQUEST['paginate']) ? ' checked="checked"' : ''), " />&nbsp;{$lang['strpaginate']}</label>\n";
		
		echo "<p><input type=\"submit\" value=\"{$lang['strrun']}\" />\n";
		if ($data->hasFullExplain()) {
			echo "<input type=\"submit\" name=\"explain\" value=\"{$lang['strexplain']}\" />\n";
			echo "<input type=\"submit\" name=\"explain_analyze\" value=\"{$lang['strexplainanalyze']}\" />\n";
		}
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";
		echo "</form>\n";
		
		// Default focus
		$misc->setFocus('forms[0].query');
	}

	switch ($action) {
		case 'find':
			doFind();
			break;
		case 'sql':
		default:
			doDefault();
			break;
	}
	
	// Set the name of the window
	$misc->setWindowName('sqledit');
	
	$misc->printFooter();
	
?>
