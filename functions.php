<?php

	/**
	 * Manage functions in a database
	 *
	 * $Id: functions.php,v 1.6 2003/03/01 00:53:51 slubek Exp $
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
		global $localData, $strFunctionUpdated, $strFunctionUpdatedBad;
		
		$status = $localData->setFunction($_POST['original_function'], $_POST['original_arguments'] , $_POST['original_returns'] , $_POST['formDefinition'] , $_POST['original_lang'],0,true);
		if ($status == 0)
			doProperties($strFunctionUpdated);
		else
			doEdit($strFunctionUpdatedBad);
	}
	
	/**
	 * Function to allow editing of a Function
	 */
	function doEdit($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strFunction, $strArguments, $strReturns, $strActions, $strNoFunctions, $strDefinition, $strLanguage;
		global $strSave, $strReset, $strNoData, $strFunctions, $strEdit, $strProperties, $strShowAllFunctions;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strFunctions}: ", htmlspecialchars($_REQUEST['function']), ": {$strEdit}</h2>\n";
		$misc->printMsg($msg);

		$fndata = &$localData->getFunction($_REQUEST['function_oid']);
		
		if ($fndata->recordCount() > 0) {
			echo "<form action=\"$PHP_SELF\" method=post>\n";
			echo "<table width=90%>\n";
			echo "<tr>\n";
			echo "<th class=data>{$strFunction}</th>\n";
			echo "<th class=data>{$strArguments}</th>\n";
			echo "<th class=data>{$strReturns}</th>\n";
			echo "<th class=data>{$strLanguage}</th>\n";
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

			echo "<tr><th class=data colspan=8>{$strDefinition}</th></tr>\n";
			echo "<tr><td class=data1 colspan=8><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>", 
				htmlspecialchars($fndata->f[$data->fnFields['fndef']]), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<input type=hidden name=action value=save_edit>\n";
			echo "<input type=hidden name=function value=\"", htmlspecialchars($_REQUEST['function']), "\">\n";
			echo "<input type=hidden name=function_oid value=\"", htmlspecialchars($_REQUEST['function_oid']), "\">\n";
			echo $misc->form;
			echo "<input type=submit value=\"{$strSave}\"> <input type=reset value=\"{$strReset}\">\n";
			echo "</form>\n";
		}
		else echo "<p>{$strNoData}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllFunctions}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=properties&{$misc->href}&function=", 
			urlencode($_REQUEST['function']), "&function_oid=", urlencode($_REQUEST['function_oid']), "\">{$strProperties}</a></p>\n";
	}

	/**
	 * Show read only properties of a function
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strFunctions, $strArguments, $strReturns, $strActions, $strNoFunctions, $strDefinition, $strLanguage;
		global $strFunctions, $strProperties, $strNoData, $strShowAllFunctions, $strEdit;
	
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strFunctions}: ", htmlspecialchars($_REQUEST['function']), ": {$strProperties}</h2>\n";
		$misc->printMsg($msg);
		
		$funcdata = &$localData->getFunction($_REQUEST['function_oid']);
		
		if ($funcdata->recordCount() > 0) {
			echo "<table width=90%>\n";
			echo "<tr><th class=data>{$strFunctions}</th>\n";
			echo "<th class=data>{$strArguments}</th>\n";
			echo "<th class=data>{$strReturns}</th>\n";
			echo "<th class=data>{$strLanguage}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnname']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnarguments']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnreturns']]), "</td>\n";
			echo "<td class=data1>", htmlspecialchars($funcdata->f[$data->fnFields['fnlang']]), "</td></tr>\n";
			echo "<tr><th class=data colspan=4>{$strDefinition}</th></tr>\n";
			echo "<tr><td class=data1 colspan=4>", nl2br(htmlspecialchars($funcdata->f[$data->fnFields['fndef']])), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$strNoData}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllFunctions}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
			urlencode($_REQUEST['function']), "&function_oid=", urlencode($_REQUEST['function_oid']), "\">{$strEdit}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database, $misc;
		global $PHP_SELF, $strFunctions, $strDrop, $strConfDropFunction, $strYes, $strNo, $strFunctionDropped, $strFunctionDroppedBad;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strFunctions}: ", htmlspecialchars($_REQUEST['function']), ": {$strDrop}</h2>\n";
			
			echo "<p>", sprintf($strConfDropFunction, htmlspecialchars($_REQUEST['function'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=function value=\"", htmlspecialchars($_REQUEST['function']), "\">\n";
			echo $misc->form;
			echo "<input type=submit name=choice value=\"{$strYes}\"> <input type=submit name=choice value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropFunction($_POST['function']);
			if ($status == 0)
				doDefault($strFunctionDropped);
			else
				doDefault($strFunctionDroppedBad);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new function
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strArguments, $strReturns, $strDefinition, $strLanguage;
		global $strFunctions, $strCreateFunction, $strSave, $strReset, $strShowAllFunctions;
		
		if (!isset($_POST['formFunction'])) $_POST['formFunction'] = '';
		if (!isset($_POST['formArguments'])) $_POST['formArguments'] = '';
		if (!isset($_POST['formReturns'])) $_POST['formReturns'] = '';
		if (!isset($_POST['formLanguage'])) $_POST['formLanguage'] = '';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		
		$types = &$localData->getTypes(true);
		$langs = &$localData->getLanguages();

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strFunctions}: {$strCreateFunction}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=90%>\n";
		echo "<tr><th class=data>{$strName}</th>\n";
		echo "<th class=data>{$strArguments}</th>\n";
		echo "<th class=data>{$strReturns}</th>\n";
		echo "<th class=data>{$strLanguage}</th></tr>\n";

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

		echo "<td class=data1><select name=formLanguage>\n";
		while (!$langs->EOF) {
			echo "<option value=\"", htmlspecialchars($langs->f[$data->langFields['lanname']]), "\">",
				htmlspecialchars($langs->f[$data->langFields['lanname']]), "</option>\n";
			$langs->moveNext();
		}

		echo "</td></tr>\n";
		echo "<tr><th class=data colspan=4>{$strDefinition}</th></tr>\n";
		echo "<tr><td class=data1 colspan=4><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>",
			htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo $misc->form;
		echo "<input type=submit value=\"{$strSave}\"> <input type=reset value=\"{$strReset}\">\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllFunctions}</a></p>\n";
	}
	
	/**
	 * Actually creates the new function in the database
	 */
	function doSaveCreate() {
		global $localData, $strFunctionNeedsName, $strFunctionNeedsDef;
		global $strFunctionCreated, $strFunctionCreatedBad;
		
		// Check that they've given a name and a definition
		if ($_POST['formFunction'] == '') doCreate($strFunctionNeedsName);
		elseif ($_POST['formDefinition'] == '') doCreate($strFunctionNeedsDef);
		else {		 
			$status = $localData->createFunction($_POST['formFunction'], $_POST['formArguments'] , $_POST['formReturns'] , $_POST['formDefinition'] , $_POST['formLanguage'],0);
			if ($status == 0)
				doDefault($strFunctionCreated);
			else
				doCreate($strFunctionCreatedBad);
		}
	}	

	/**
	 * Show default list of functions in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database, $func;
		global $PHP_SELF, $strFunctions, $strArguments, $strReturns, $strActions, $strNoFunctions;
		global $strCreateFunction, $strProperties, $strEdit, $strDrop, $strPrivileges;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strFunctions}</h2>\n";
		$misc->printMsg($msg);
		
		$funcs = &$localData->getFunctions();

		if ($funcs->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strFunctions}</th><th class=data>{$strReturns}</th><th class=data>{$strArguments}</th><th colspan=\"4\" class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$funcs->EOF) {
				$func_full = $funcs->f[$data->fnFields['fnname']] . "(". $funcs->f[$data->fnFields['fnarguments']] .")";
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnreturns']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($funcs->f[$data->fnFields['fnarguments']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=properties&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$strProperties}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=edit&{$misc->href}&function=", 
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$strEdit}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&function=",
					urlencode($func_full), "&function_oid=", $funcs->f[$data->fnFields['fnoid']], "\">{$strDrop}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"privileges.php?{$misc->href}&function=", 
					urlencode($func_full), "&object=",
					$funcs->f[$data->fnFields['fnoid']], "&type=function\">{$strPrivileges}</a></td>\n";
				echo "</tr>\n";
				$funcs->moveNext();
				$i++;
			}

			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoFunctions}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&{$misc->href}\">{$strCreateFunction}</a></p>\n";

	}
	
	$misc->printHeader($strFunctions);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == "{$strYes}") doDrop(false);
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
