<?php

	/**
	 * List views in a database
	 *
	 * $Id: viewproperties.php,v 1.1 2004/05/10 15:22:00 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/** 
	 * Function to save after editing a view
	 */
	function doSaveEdit() {
		global $data, $lang;
		
		$status = $data->setView($_POST['view'], $_POST['formDefinition'], $_POST['formComment']);
		if ($status == 0)
			doDefinition($lang['strviewupdated']);
		else
			doEdit($lang['strviewupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a view
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$data->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			
			if (!isset($_POST['formDefinition'])) {
				$_POST['formDefinition'] = $viewdata->f[$data->vwFields['vwdef']];
				$_POST['formComment'] = $viewdata->f[$data->vwFields['vwcomment']];
			}
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"100%\">\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strdefinition']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea style=\"width: 100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td>\n\t</tr>\n";
			echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><input style=\"width: 100%;\" name=\"formComment\" value='", 
				htmlspecialchars($_POST['formComment']), "' /></td>\n\t</tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/** 
	 * Allow the dumping of the data "in" a view
	 */
	function doExport($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$misc->printViewNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['view']), ": {$lang['strexport']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"dataexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\">";
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

		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" name=\"what\" value=\"structureonly\" />{$lang['strstructureonly']}</th>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"2\">";
		echo "<input type=\"radio\" name=\"what\" value=\"structureanddata\" />{$lang['strstructureanddata']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" name=\"output\" value=\"show\" checked=\"checked\" />{$lang['strshow']}\n";
		echo "<br/><input type=\"radio\" name=\"output\" value=\"download\" />{$lang['strdownload']}</p>\n";

		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}

	/**
	 * Show definition for a view
	 */
	function doDefinition($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
	
		$misc->printViewNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strdefinition']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$data->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwdef']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=edit&{$misc->href}&view=", 
			urlencode($_REQUEST['view']), "\">{$lang['stralter']}</a></p>\n";
	}
	
	/**
	 * Show view definition and virtual columns
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;

		$misc->printViewNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), "</h2>\n";

		// Get view (using same method for getting a table)
		$vdata = &$data->getTable($_REQUEST['view']);
		// Get columns (using same method for getting a view)
		$attrs = &$data->getTableAttributes($_REQUEST['view']);		
		$misc->printMsg($msg);

		// Show comment if any
		if ($vdata->f[$data->vwFields['vwcomment']] != null)
			echo "<p class=\"comment\">", htmlspecialchars($vdata->f[$data->vwFields['vwcomment']]), "</p>\n";

		echo "<table>\n";
		echo "<tr>\n\t<th class=\"data\">{$lang['strfield']}</th>\n";
		echo "\t<th class=\"data\">{$lang['strtype']}</th>\n";
		echo "\t<th class=\"data\">{$lang['strdefault']}</th>\n";
		echo "\t<th class=\"data\">{$lang['stractions']}</th>\n";
		echo "\t<th class=\"data\">{$lang['strcomment']}</th>\n"; 
		echo "</tr>\n";

		$i = 0;
		while (!$attrs->EOF) {
			$id = (($i % 2) == 0 ? '1' : '2');
			echo "<tr>\n\t<td class=\"data{$id}\">", $misc->printVal($attrs->f['attname']), "</td>\n";
			echo "\t<td class=\"data{$id}\">", $misc->printVal($data->formatType($attrs->f['type'], $attrs->f['atttypmod'])), "</td>\n";
			echo "\t<td class=\"data{$id}\">", $misc->printVal($attrs->f['adsrc']), "</td>\n";
			echo "\t<td class=\"opbutton{$id}\"><a href=\"{$PHP_SELF}?{$misc->href}&view=", urlencode($_REQUEST['view']),
				"&column=", urlencode($attrs->f['attname']), "&action=properties\">{$lang['stralter']}</a></td>\n";
			echo "\t<td class=\"data{$id}\">", $misc->printVal($attrs->f['comment']), "</td>\n"; 
			echo "</tr>\n";
			$attrs->moveNext();
			$i++;
		}
		echo "</table>\n";
		echo "<br />\n";

		echo "<ul>\n";

		// @@@@@@@@@ FIX THIS!!!!!
		$data->fieldClean($_REQUEST['view']);
		if ($data->hasSchemas() && isset($_REQUEST['schema'])) {
			$data->fieldClean($_REQUEST['schema']);
			$query = urlencode("SELECT * FROM \"{$_REQUEST['schema']}\".\"{$_REQUEST['view']}\"");
		}
		else
			$query = urlencode("SELECT * FROM \"{$_REQUEST['view']}\"");
			
		$count = urlencode("SELECT COUNT(*) AS total FROM \"{$_REQUEST['view']}\"");
		$return_url = urlencode("viewproperties.php?{$misc->href}&view=" . urlencode($_REQUEST['view']));

		echo "\t<li><a href=\"display.php?{$misc->href}&query={$query}&count={$count}&return_url={$return_url}&return_desc=",
			urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></li>\n";
		echo "\t<li><a href=\"views.php?action=confselectrows&{$misc->href}&view=", urlencode($_REQUEST['view']),"\">{$lang['strselect']}</a></li>\n";
		echo "\t<li><a href=\"views.php?action=confirm_drop&{$misc->href}&view=", urlencode($_REQUEST['view']),"\">{$lang['strdrop']}</a></li>\n";
		echo "</ul>\n";
	}

	$misc->printHeader($lang['strviews'] . ' - ' . $_REQUEST['view']);
	$misc->printBody();

	switch ($action) {
		case 'save_edit':
			if (isset($_POST['cancel'])) doDefinition();
			else doSaveEdit();
			break;
		case 'edit':
			doEdit();
			break;
		case 'export':
			doExport();
			break;
		case 'definition':
			doDefinition();
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
