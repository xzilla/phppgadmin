<?php

	/**
	 * Manage functions in a database
	 *
	 * $Id: functions.php,v 1.25 2003/12/21 02:03:15 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/** 
	 * Function to save after editing a function
	 */
	function doSaveEdit() {
		global $data, $lang;

		$status = $data->setFunction($_POST['function_oid'], $_POST['original_function'], $_POST['original_arguments'], 
														$_POST['original_returns'], $_POST['formDefinition'], 
														$_POST['original_lang'], $_POST['formProperties'], isset($_POST['original_setof']), true);
		if ($status == 0)
			doProperties($lang['strfunctionupdated']);
		else
			doEdit($lang['strfunctionupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a Function
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfunctions']}: ", $misc->printVal($_REQUEST['function']), ": {$lang['stralter']}</h2>\n";
		$misc->printMsg($msg);

		$fndata = &$data->getFunction($_REQUEST['function_oid']);

		if ($fndata->recordCount() > 0) {
			$fndata->f[$data->fnFields['setof']] = $data->phpBool($fndata->f[$data->fnFields['setof']]);

			// Initialise variables
			if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = $fndata->f[$data->fnFields['fndef']];
			if (!isset($_POST['formProperties'])) $_POST['formProperties'] = $data->getFunctionProperties($fndata->f);

			$func_full = $fndata->f[$data->fnFields['fnname']] . "(". $fndata->f[$data->fnFields['fnarguments']] .")";
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"90%\">\n";
			echo "<tr>\n";
			echo "<th class=\"data\">{$lang['strfunction']}</th>\n";
			echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
			echo "<th class=\"data\">{$lang['strreturns']}</th>\n";
			echo "<th class=\"data\">{$lang['strproglanguage']}</th>\n";
			echo "</tr>\n";
				

			echo "<tr>\n";
			echo "<td class=\"data1\">", $misc->printVal($fndata->f[$data->fnFields['fnname']]), "\n";
			echo "<input type=\"hidden\" name=\"original_function\" value=\"", htmlspecialchars($fndata->f[$data->fnFields['fnname']]),"\" />\n"; 
			echo "</td>\n";

			echo "<td class=\"data1\">", $misc->printVal($fndata->f[$data->fnFields['fnarguments']]), "\n";
			echo "<input type=\"hidden\" name=\"original_arguments\" value=\"",htmlspecialchars($fndata->f[$data->fnFields['fnarguments']]),"\" />\n"; 
			echo "</td>\n";

			echo "<td class=data1>";
			if ($fndata->f[$data->fnFields['setof']]) echo "setof ";
			echo $misc->printVal($fndata->f[$data->fnFields['fnreturns']]), "\n";
			echo "<input type=\"hidden\" name=\"original_returns\" value=\"", htmlspecialchars($fndata->f[$data->fnFields['fnreturns']]), "\" />\n"; 
			if ($fndata->f[$data->fnFields['setof']])
				echo "<input type=\"hidden\" name=\"original_setof\" value=\"yes\" />\n"; 
			echo "</td>\n";

			echo "<td class=data1>", $misc->printVal($fndata->f[$data->fnFields['fnlang']]), "\n";
			echo "<input type=\"hidden\" name=\"original_lang\" value=\"", htmlspecialchars($fndata->f[$data->fnFields['fnlang']]), "\" />\n"; 
			echo "</td>\n";

			echo "<tr><th class=\"data\" colspan=\"8\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"8\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
			// Display function properies
			if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\">\n";
				$i = 0;
				foreach ($data->funcprops as $k => $v) {
					echo "<select name=\"formProperties[{$i}]\">\n";
					foreach ($v as $p) {
						echo "<option value=\"", htmlspecialchars($p), "\"", 
							($p == $_POST['formProperties'][$i]) ? ' selected="selected"' : '', 
							">", $misc->printVal($p), "</option>\n";
					}
					echo "</select><br />\n";
					$i++;
				}
				echo "</td></tr>\n";
			}		
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
			echo "<input type=\"hidden\" name=\"function_oid\" value=\"", htmlspecialchars($_REQUEST['function_oid']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/**
	 * Show read only properties of a function
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfunctions']}: ", $misc->printVal($_REQUEST['function']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$funcdata = &$data->getFunction($_REQUEST['function_oid']);
		
		if ($funcdata->recordCount() > 0) {
			$funcdata->f[$data->fnFields['setof']] = $data->phpBool($funcdata->f[$data->fnFields['setof']]);
			$func_full = $funcdata->f[$data->fnFields['fnname']] . "(". $funcdata->f[$data->fnFields['fnarguments']] .")";
			echo "<table width=\"90%\">\n";
			echo "<tr><th class=\"data\">{$lang['strfunctions']}</th>\n";
			echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
			echo "<th class=\"data\">{$lang['strreturns']}</th>\n";
			echo "<th class=\"data\">{$lang['strproglanguage']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($funcdata->f[$data->fnFields['fnname']]), "</td>\n";
			echo "<td class=\"data1\">", $misc->printVal($funcdata->f[$data->fnFields['fnarguments']]), "</td>\n";
			echo "<td class=\"data1\">";
			if ($funcdata->f[$data->fnFields['setof']]) echo "setof ";			
			echo $misc->printVal($funcdata->f[$data->fnFields['fnreturns']]), "</td>\n";
			echo "<td class=\"data1\">", $misc->printVal($funcdata->f[$data->fnFields['fnlang']]), "</td></tr>\n";
			echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"4\">", $misc->printVal($funcdata->f[$data->fnFields['fndef']]), "</td></tr>\n";
			if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
				// Fetch an array of the function properties
				$funcprops = $data->getFunctionProperties($funcdata->f);
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\">\n";
				foreach ($funcprops as $v) {
					echo $misc->printVal($v), "<br />\n";
				}
				echo "</td></tr>\n";
			}		
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallfunctions']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
			urlencode($_REQUEST['function']), "&function_oid=", urlencode($_REQUEST['function_oid']), "\">{$lang['stralter']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
			urlencode($func_full), "&function_oid=", $_REQUEST['function_oid'], "\">{$lang['strdrop']}</a></td>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfunctions']}: ", $misc->printVal($_REQUEST['function']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropfunction'], $misc->printVal($_REQUEST['function'])), "</p>\n";	
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
			echo "<input type=\"hidden\" name=\"function_oid\" value=\"", htmlspecialchars($_REQUEST['function_oid']), "\" />\n";
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
			$status = $data->dropFunction($_POST['function_oid'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strfunctiondropped']);
			else
				doDefault($lang['strfunctiondroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new function
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formFunction'])) $_POST['formFunction'] = '';
		if (!isset($_POST['formArguments'])) $_POST['formArguments'] = '';
		if (!isset($_POST['formReturns'])) $_POST['formReturns'] = '';
		if (!isset($_POST['formLanguage'])) $_POST['formLanguage'] = '';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		if (!isset($_POST['formProperties'])) $_POST['formProperties'] = $data->defaultprops;
		if (!isset($_POST['formSetOf'])) $_POST['formSetOf'] = '';
		
		$types = &$data->getTypes(true);
		$langs = &$data->getLanguages(true);

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfunctions']}: {$lang['strcreatefunction']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
		echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
		echo "<th class=\"data\">{$lang['strreturns']}</th>\n";
		echo "<th class=\"data\">{$lang['strproglanguage']}</th></tr>\n";

		echo "<tr><td class=\"data1\"><input name=\"formFunction\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formFunction']), "\" /></td>\n";

		echo "<td class=\"data1\"><input name=\"formArguments\" style=\"width:100%;\" size=\"16\" value=\"",
			htmlspecialchars($_POST['formArguments']), "\" /></td>\n";

		echo "<td class=\"data1\">\n";
		// If supports set-returning-functions, output setof option
		if ($data->hasSRFs()) {
			echo "<select name=\"formSetOf\">\n";
			echo "<option value=\"\"", ($_POST['formSetOf'] == '') ? ' selected="selected"' : '', "></option>\n";
			echo "<option value=\"SETOF\"", ($_POST['formSetOf'] == 'SETOF') ? ' selected="selected"' : '', ">SETOF</option>\n";
			echo "</select>\n";
		}
		else {
			echo "<input type=\"hidden\" name=\"formSetOf\" value=\"\" />\n";
		}
		// Output return type list		
		echo "<select name=\"formReturns\">\n";
		while (!$types->EOF) {
			echo "<option value=\"", htmlspecialchars($types->f[$data->typFields['typname']]), "\"", 
				($types->f[$data->typFields['typname']] == $_POST['formReturns']) ? ' selected="selected"' : '', ">",
				$misc->printVal($types->f[$data->typFields['typname']]), "</option>\n";
			$types->moveNext();
		}
		echo "</select>\n";

		echo "<td class=\"data1\"><select name=\"formLanguage\">\n";
		while (!$langs->EOF) {
			echo "<option value=\"", htmlspecialchars($langs->f[$data->langFields['lanname']]), "\"",
				($langs->f[$data->langFields['lanname']] == $_POST['formLanguage']) ? ' selected="selected"' : '', ">",
				$misc->printVal($langs->f[$data->langFields['lanname']]), "</option>\n";
			$langs->moveNext();
		}
		echo "</select>\n";

		echo "</td></tr>\n";
		echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strdefinition']}</th></tr>\n";
		echo "<tr><td class=\"data1\" colspan=\"4\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">",
			htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		// Display function properies
		if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
			echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"4\">\n";
			$i = 0;
			foreach ($data->funcprops as $k => $v) {
				echo "<select name=\"formProperties[{$i}]\">\n";
				foreach ($v as $p) {
					echo "<option value=\"", htmlspecialchars($p), "\"", 
						($p == $_POST['formProperties'][$i]) ? ' selected="selected"' : '', 
						">", $misc->printVal($p), "</option>\n";
				}
				echo "</select><br />\n";
				$i++;
			}
			echo "</td></tr>\n";
		}		
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new function in the database
	 */
	function doSaveCreate() {
		global $data, $lang;
		
		// Set properties to an empty array if it doesn't exist (for db's without properties)
		if (!is_array($_POST['formProperties'])) $_POST['formProperties'] = array();
		
		// Check that they've given a name and a definition
		if ($_POST['formFunction'] == '') doCreate($lang['strfunctionneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strfunctionneedsdef']);
		else {		 
			$status = $data->createFunction($_POST['formFunction'], $_POST['formArguments'] , 
					$_POST['formReturns'] , $_POST['formDefinition'] , $_POST['formLanguage'], 
					$_POST['formProperties'], $_POST['formSetOf'] == 'SETOF', false);
			if ($status == 0)
				doDefault($lang['strfunctioncreated']);
			else
				doCreate($lang['strfunctioncreatedbad']);
		}
	}	

	/**
	 * Show default list of functions in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $func;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strfunctions']}</h2>\n";
		$misc->printMsg($msg);
		
		$funcs = &$data->getFunctions();

		if ($funcs->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strfunctions']}</th><th class=\"data\">{$lang['strreturns']}</th>\n";
			echo "<th class=\"data\">{$lang['strarguments']}</th><th colspan=\"4\" class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$funcs->EOF) {
				$funcs->f[$data->fnFields['setof']] = $data->phpBool($funcs->f[$data->fnFields['setof']]);
				$func_full = $funcs->f[$data->fnFields['fnname']] . "(". $funcs->f[$data->fnFields['fnarguments']] .")";
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($funcs->f[$data->fnFields['fnname']]), "</td>\n";
				echo "<td class=\"data{$id}\">";
				if ($funcs->f[$data->fnFields['setof']]) echo "setof ";
				echo $misc->printVal($funcs->f[$data->fnFields['fnreturns']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($funcs->f[$data->fnFields['fnarguments']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['stralter']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['strdrop']}</a></td>\n";
				if (isset($data->privlist['function'])) {
					echo "<td class=\"opbutton{$id}\"><a href=\"privileges.php?{$misc->href}&function=", 
						urlencode($func_full), "&object=",
						$funcs->f[$data->fnFields['fnoid']], "&type=function\">{$lang['strprivileges']}</a></td>\n";
				}
				else echo "<td></td>";
				echo "</tr>\n";
				$funcs->moveNext();
				$i++;
			}

			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnofunctions']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatefunction']}</a></p>\n";

	}
	
	$misc->printHeader($lang['strfunctions']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
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
		case 'save_edit':
			if (isset($_POST['cancel'])) doProperties();
			else doSaveEdit();
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
