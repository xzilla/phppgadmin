<?php

	/**
	 * Manage domains in a database
	 *
	 * $Id: domains.php,v 1.1 2003/07/30 03:36:37 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/** 
	 * Function to save after editing a domain
	 */
	function doSaveEdit() {
		global $localData, $lang;
		
		$status = $localData->setDomain($_POST['domain'], $_POST['formDefinition']);
		if ($status == 0)
			doProperties($lang['strdomainupdated']);
		else
			doEdit($lang['strdomainupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a domain
	 */
	function doEdit($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strdomains']}: ", $misc->printVal($_REQUEST['domain']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$domaindata = &$localData->getDomain($_REQUEST['domain']);
		
		if ($domaindata->recordCount() > 0) {
			
			if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = $domaindata->f[$data->vwFields['vwdef']];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($domaindata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"domain\" value=\"", htmlspecialchars($_REQUEST['domain']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['strsave']}\" />\n";
			echo "<input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalldomains']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=properties&{$misc->href}&domain=", 
			urlencode($_REQUEST['domain']), "\">{$lang['strproperties']}</a></p>\n";
	}
	
	/**
	 * Show read only properties for a domain
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strdomains']}: ", $misc->printVal($_REQUEST['domain']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$domaindata = &$localData->getDomain($_REQUEST['domain']);
		
		if ($domaindata->recordCount() > 0) {
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($domaindata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($domaindata->f[$data->vwFields['vwdef']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalldomains']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&{$misc->href}&domain=", 
			urlencode($_REQUEST['domain']), "\">{$lang['stredit']}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strdomains']}: ", $misc->printVal($_REQUEST['domain']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropdomain'], $misc->printVal($_REQUEST['domain'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"domain\" value=\"", htmlspecialchars($_REQUEST['domain']), "\">\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" /> <input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropDomain($_POST['domain'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strdomaindropped']);
			else
				doDefault($lang['strdomaindroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new domain
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['domname'])) $_POST['domname'] = '';
		if (!isset($_POST['domtype'])) $_POST['domtype'] = '';
		if (!isset($_POST['domdefault'])) $_POST['domdefault'] = '';
		if (!isset($_POST['domcheck'])) $_POST['domcheck'] = '';

		$types = &$localData->getTypes(true);
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strdomains']}: {$lang['strcreatedomain']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\" width=\"70\">{$lang['strname']}</th>\n";
		echo "<td class=\"data1\"><input name=\"domname\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_POST['domname']), "\" /></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strtype']}</th>\n";
		echo "<td class=\"data1\">\n";
		// Output return type list		
		echo "<select name=\"domtype\">\n";
		while (!$types->EOF) {
			echo "<option value=\"", htmlspecialchars($types->f[$data->typFields['typname']]), "\"", 
				($types->f[$data->typFields['typname']] == $_POST['domtype']) ? ' selected' : '', ">",
				$misc->printVal($types->f[$data->typFields['typname']]), "</option>\n";
			$types->moveNext();
		}
		echo "</select>\n";		
		echo "</td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strnotnull']}</th>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"domnotnull\"", 
			(isset($_POST['domnotnull']) ? ' checked="checked"' : ''), " /></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strdefault']}</th>\n";
		echo "<td class=\"data1\"><input name=\"domdefault\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_POST['domdefault']), "\" /></td></tr>\n";
		if ($data->hasDomainConstraints()) {
			echo "<tr><th class=\"data\">{$lang['strconstraints']}</th>\n";
			echo "<td class=\"data1\">CHECK (<input name=\"domcheck\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				htmlspecialchars($_POST['domcheck']), "\" />)</td></tr>\n";
		}
		echo "</table>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<p><input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowalldomains']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new domain in the database
	 */
	function doSaveCreate() {
		global $localData, $lang;
		
		if (!isset($_POST['domcheck'])) $_POST['domcheck'] = '';

		// Check that they've given a name and a definition
		if ($_POST['domname'] == '') doCreate($lang['strdomainneedsname']);
		else {		 
			$status = $localData->createDomain($_POST['domname'], $_POST['domtype'], 
																isset($_POST['domnotnull']), $_POST['domdefault'], $_POST['domcheck']);
			if ($status == 0)
				doDefault($lang['strdomaincreated']);
			else
				doCreate($lang['strdomaincreatedbad']);
		}
	}	

	/**
	 * Show default list of domains in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strdomains']}</h2>\n";
		$misc->printMsg($msg);
		
		$domains = &$localData->getDomains();
		
		if ($domains->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strdomain']}</th><th class=\"data\">{$lang['strnotnull']}</th>";
			echo "<th class=\"data\">{$lang['strdefault']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th></tr>\n";
			$i = 0;
			while (!$domains->EOF) {
				$domains->f['domnotnull'] = $data->phpBool($domains->f['domnotnull']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($domains->f['domname']), "</td>\n";
				echo "<td class=\"data{$id}\">", ($domains->f['domnotnull'] ? 'NOT NULL' : ''), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($domains->f['domdef']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($domains->f['domowner']), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&{$misc->href}&domain=", urlencode($domains->f['domname']), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&domain=", urlencode($domains->f['domname']), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$domains->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnodomains']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatedomain']}</a></p>\n";

	}

	$misc->printHeader($lang['strdomains']);
	$misc->printBody();

	switch ($action) {
		case 'selectrows':
			if (!isset($_POST['cancel'])) doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
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
		case 'save_edit':
			doSaveEdit();
			break;
		case 'edit':
			doEdit();
			break;
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
