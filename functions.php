<?php

	/**
	 * Manage functions in a database
	 *
	 * $Id: functions.php,v 1.10 2003/04/30 06:49:11 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/** 
	 * Function to save after editing a function
	 */
	function doSaveEdit() {
		global $localData, $lang;
		
		$status = $localData->setFunction($_POST['original_function'], $_POST['original_arguments'] , $_POST['original_returns'] , $_POST['formDefinition'] , $_POST['original_lang'],0,true);
		if ($status == 0)
			doProperties($lang['strfunctionupdated']);
		else
			doEdit($lang['strfunctionupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a Function
	 */
	function doEdit($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strfunctions']}: ", htmlspecialchars($_REQUEST['function']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);

		$fndata = &$localData->getFunction($_REQUEST['function_oid']);
		
		if ($fndata->recordCount() > 0) {
			$func_full = $fndata->f[$data->fnFields['fnname']] . "(". $fndata->f[$data->fnFields['fnarguments']] .")";
			echo "<form action=\"$PHP_SELF\" method=post>\n";
			echo "<table width=90%>\n";
			echo "<tr>\n";
			echo "<th class=data>{$lang['strfunction']}</th>\n";
			echo "<th class=data>{$lang['strarguments']}</th>\n";
			echo "<th class=data>{$lang['strreturns']}</th>\n";
			echo "<th class=data>{$lang['strlanguage']}</th>\n";
			echo "</tr>\n";
				

			echo "<tr>\n";
			echo "<td class=data1>",htmlspecialchars($fndata->f[$data->fnFields['fnname']]),"\n";
			echo "<input type=hidden name=original_function value=",htmlspecialchars($fndata->f[$data->fnFields['fnname']]),">"; 
			echo "</td>\n";

			echo "<td class=data1>",htmlspecialchars($fndata->f[$data->fnFields['fnarguments']]),"\n";
			echo "<input type=hidden name=original_arguments value=",htmlspecialchars($fndata->f[$data->fnFields['fnarguments']]),">"; 
			echo "</td>\n";

			echo "<td class=data1>",htmlspecialchars($fndata->f[$data->fnFields['fnreturns']]),"\n";
			echo "<input type=hidden name=original_returns value=",htmlspecialchars($fndata->f[$data->fnFields['fnreturns']]),">"; 
			echo "</td>\n";

			echo "<td class=data1>",htmlspecialchars($fndata->f[$data->fnFields['fnlang']]),"\n";
			echo "<input type=hidden name=original_lang value=",htmlspecialchars($fndata->f[$data->fnFields['fnlang']]),">"; 
			echo "</td>\n";

			echo "<tr><th class=data colspan=8>{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=data1 colspan=8><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>", 
				htmlspecialchars($fndata->f[$data->fnFields['fndef']]), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<input type=hidden name=action value=save_edit>\n";
			echo "<input type=hidden name=function value=\"", htmlspecialchars($_REQUEST['function']), "\">\n";
			echo "<input type=hidden name=function_oid value=\"", htmlspecialchars($_REQUEST['function_oid']), "\">\n";
			echo $misc->form;
			echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\">\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallfunctions']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=properties&{$misc->href}&function=", 
			urlencode($_REQUEST['function']), "&function_oid=", urlencode($_REQUEST['function_oid']), "\">{$lang['strproperties']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
			urlencode($func_full), "&function_oid=", $_REQUEST['function_oid'], "\">{$lang['strdrop']}</a></p>\n";
	}

	/**
	 * Show read only properties of a function
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strfunctions']}: ", htmlspecialchars($_REQUEST['function']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$funcdata = &$localData->getFunction($_REQUEST['function_oid']);
		
		if ($funcdata->recordCount() > 0) {
			$func_full = $funcdata->f[$data->fnFields['fnname']] . "(". $funcdata->f[$data->fnFields['fnarguments']] .")";
			echo "<table width=90%>\n";
			echo "<tr><th class=data>{$lang['strfunctions']}</th>\n";
			echo "<th class=data>{$lang['strarguments']}</th>\n";
			echo "<th class=data>{$lang['strreturns']}</th>\n";
			echo "<th class=data>{$lang['strlanguage']}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnname']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnarguments']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnreturns']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnlang']]), "</td></tr>\n";
			echo "<tr><th class=data colspan=4>{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=data1 colspan=4>", nl2br(htmlspecialchars($funcdata->f[$data->fnFields['fndef']])), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallfunctions']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
			urlencode($_REQUEST['function']), "&function_oid=", urlencode($_REQUEST['function_oid']), "\">{$lang['stredit']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
			urlencode($func_full), "&function_oid=", $_REQUEST['function_oid'], "\">{$lang['strdrop']}</a></td>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strfunctions']}: ", htmlspecialchars($_REQUEST['function']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropfunction'], htmlspecialchars($_REQUEST['function'])), "</p>\n";	
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\">\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\"> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\"> <input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropFunction($_POST['function'], isset($_POST['cascade']));
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
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formFunction'])) $_POST['formFunction'] = '';
		if (!isset($_POST['formArguments'])) $_POST['formArguments'] = '';
		if (!isset($_POST['formReturns'])) $_POST['formReturns'] = '';
		if (!isset($_POST['formLanguage'])) $_POST['formLanguage'] = '';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		
		$types = &$localData->getTypes(true);
		$langs = &$localData->getLanguages();

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strfunctions']}: {$lang['strcreatefunction']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=90%>\n";
		echo "<tr><th class=data>{$lang['strname']}</th>\n";
		echo "<th class=data>{$lang['strarguments']}</th>\n";
		echo "<th class=data>{$lang['strreturns']}</th>\n";
		echo "<th class=data>{$lang['strlanguage']}</th></tr>\n";

		echo "<tr><td class=data1><input name=formFunction size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"",
			htmlspecialchars($_POST['formFunction']), "\"></td>\n";

		echo "<td class=data1><input name=formArguments style=\"width:100%;\" size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"",
			htmlspecialchars($_POST['formArguments']), "\"></td>\n";

		echo "<td class=data1><select name=formReturns>\n";
		while (!$types->EOF) {
			echo "<option value=\"", htmlspecialchars($types->f[$data->typFields['typname']]), "\">",
				htmlspecialchars($types->f[$data->typFields['typname']]), "</option>\n";
			$types->moveNext();
		}
		echo "</select>\n";

		echo "<td class=data1><select name=formLanguage>\n";
		while (!$langs->EOF) {
			echo "<option value=\"", htmlspecialchars($langs->f[$data->langFields['lanname']]), "\">",
				htmlspecialchars($langs->f[$data->langFields['lanname']]), "</option>\n";
			$langs->moveNext();
		}
		echo "</select>\n";

		echo "</td></tr>\n";
		echo "<tr><th class=data colspan=4>{$lang['strdefinition']}</th></tr>\n";
		echo "<tr><td class=data1 colspan=4><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>",
			htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo $misc->form;
		echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\">\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallfunctions']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new function in the database
	 */
	function doSaveCreate() {
		global $localData, $lang;
		
		// Check that they've given a name and a definition
		if ($_POST['formFunction'] == '') doCreate($lang['strfunctionneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strfunctionneedsdef']);
		else {		 
			$status = $localData->createFunction($_POST['formFunction'], $_POST['formArguments'] , $_POST['formReturns'] , $_POST['formDefinition'] , $_POST['formLanguage'],0);
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
		global $data, $localData, $misc, $database, $func;
		global $PHP_SELF, $lang;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strfunctions']}</h2>\n";
		$misc->printMsg($msg);
		
		$funcs = &$localData->getFunctions();

		if ($funcs->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$lang['strfunctions']}</th><th class=data>{$lang['strreturns']}</th><th class=data>{$lang['strarguments']}</th><th colspan=\"4\" class=data>{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$funcs->EOF) {
				$func_full = $funcs->f[$data->fnFields['fnname']] . "(". $funcs->f[$data->fnFields['fnarguments']] .")";
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnreturns']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnarguments']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=properties&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['stredit']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$lang['strdrop']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"privileges.php?{$misc->href}&function=", 
					urlencode($func_full), "&object=",
					$funcs->f[$data->fnFields['fnoid']], "&type=function\">{$lang['strprivileges']}</a></td>\n";
				echo "</tr>\n";
				$funcs->moveNext();
				$i++;
			}

			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnofunctions']}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatefunction']}</a></p>\n";

	}
	
	$misc->printHeader($lang['strfunctions']);
	$misc->printBody();

	switch ($action) {
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
		case 'browse':
			// @@ Not yet implemented
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
