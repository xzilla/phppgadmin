<?php

	/**
	 * Manage types in a database
	 *
	 * $Id: types.php,v 1.4 2003/03/01 00:53:51 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show read only properties for a type
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strTypes, $strInvalidParam, $strShowAllTypes;
		global $strInputFn, $strOutputFn, $strLength, $strPassByVal, $strAlignment;
		global $strProperties, $strYes, $strNo;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTypes}: ", htmlspecialchars($_REQUEST['type']), ": {$strProperties}</h2>\n";
		$misc->printMsg($msg);
		
		$typedata = &$localData->getType($_REQUEST['type']);
		
		if ($typedata->recordCount() > 0) {
			$byval = $data->phpBool($typedata->f[$data->typFields['typbyval']]);
			echo "<table width=100%>\n";
			echo "<tr><th class=data>{$strName}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($typedata->f[$data->typFields['typname']]), "</td></tr>\n";
			echo "<tr><th class=data>{$strInputFn}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($typedata->f[$data->typFields['typin']]), "</td></tr>\n";
			echo "<tr><th class=data>{$strOutputFn}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($typedata->f[$data->typFields['typout']]), "</td></tr>\n";
			echo "<tr><th class=data>{$strLength}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($typedata->f[$data->typFields['typlen']]), "</td></tr>\n";
			echo "<tr><th class=data>{$strPassByVal}</th></tr>\n";
			echo "<tr><td class=data1>", ($byval) ? $strYes : $strNo, "</td></tr>\n";
			echo "<tr><th class=data>{$strAlignment}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($typedata->f[$data->typFields['typalign']]), "</td></tr>\n";
			echo "</table>\n";

			echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllTypes}</a></p>\n";		}
		else
			doDefault($strInvalidParam);
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database, $misc;
		global $PHP_SELF, $strTypes, $strDrop, $strConfDropType, $strNo, $strYes;
		global $strTypeDropped, $strTypeDroppedBad;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTypes}: ", htmlspecialchars($_REQUEST['type']), ": {$strDrop}</h2>\n";

			echo "<p>", sprintf($strConfDropType, htmlspecialchars($_REQUEST['type'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=submit name=choice value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropType($_POST['type']);
			if ($status == 0)
				doDefault($strTypeDropped);
			else
				doDefault($strTypeDroppedBad);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new type
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strTypes, $strCreateType, $strShowAllTypes;
		global $strInputFn, $strOutputFn, $strLength, $strDefault;
		global $strElement, $strDelimiter, $strPassByVal, $strAlignment, $strStorage, $strSave, $strReset;

		if (!isset($_POST['typname'])) $_POST['typname'] = '';
		if (!isset($_POST['typin'])) $_POST['typin'] = '';
		if (!isset($_POST['typout'])) $_POST['typout'] = '';
		if (!isset($_POST['typlen'])) $_POST['typlen'] = '';
		if (!isset($_POST['typdef'])) $_POST['typdef'] = '';
		if (!isset($_POST['typelem'])) $_POST['typelem'] = '';
		if (!isset($_POST['typdelim'])) $_POST['typdelim'] = '';
		if (!isset($_POST['typalign'])) $_POST['typalign'] = $data->typAlignDef;
		if (!isset($_POST['typstorage'])) $_POST['typstorage'] = $data->typStorageDef;

		// Retrieve all functions and types in the database
		$funcs = &$localData->getFunctions(true);
		$types = &$localData->getTypes();

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTypes}: {$strCreateType}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=data><b>{$strName}</b></th></tr>\n";
		echo "<tr><td class=data1><input name=typname size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"",
			htmlspecialchars($_POST['typname']), "\"></td></tr>\n";
		echo "<tr><th class=data><b>{$strInputFn}</b></th></tr>\n";
		echo "<tr><td class=data1><select name=typin>";
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f[$data->fnFields['fnname']]);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typin']) ? ' selected' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=data><b>{$strOutputFn}</b></th></tr>\n";
		echo "<tr><td class=data1><select name=typout>";
		$funcs->moveFirst();
		while (!$funcs->EOF) {
			$proname = htmlspecialchars($funcs->f[$data->fnFields['fnname']]);
			echo "<option value=\"{$proname}\"",
				($proname == $_POST['typout']) ? ' selected' : '', ">{$proname}</option>\n";
			$funcs->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=data><b>{$strLength}</b></th></tr>\n";
		echo "<tr><td class=data1><input name=typlen size=8 value=\"",
			htmlspecialchars($_POST['typlen']), "\"></td></tr>";
		echo "<tr><th class=data>{$strDefault}</th></tr>\n";
		echo "<tr><td class=data1><input name=typdef size=8 value=\"",
			htmlspecialchars($_POST['typdef']), "\"></td></tr>";
		echo "<tr><th class=data>{$strElement}</th></tr>\n";
		echo "<tr><td class=data1><select name=typelem>";
		echo "<option value=\"\"></option>\n";
		while (!$types->EOF) {
			$currname = htmlspecialchars($types->f[$data->typFields['typname']]);
			echo "<option value=\"{$currname}\"",
				($currname == $_POST['typelem']) ? ' selected' : '', ">{$currname}</option>\n";
			$types->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=data>{$strDelimiter}</th></tr>\n";
		echo "<tr><td class=data1><input name=typdelim size=1 maxlength=1 value=\"",
			htmlspecialchars($_POST['typdelim']), "\"></td></tr>";
		echo "<tr><th class=data>{$strPassByVal}</th></tr>\n";
		echo "<tr><td class=data1><input type=checkbox name=typbyval", 
			isset($_POST['typbyval']) ? ' checked' : '', "></td></tr>";
		echo "<tr><th class=data>{$strAlignment}</th></tr>\n";
		echo "<tr><td class=data1><select name=typalign>";
		foreach ($data->typAligns as $v) {
			echo "<option value=\"{$v}\"",
				($v == $_POST['typalign']) ? ' selected' : '', ">{$v}</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "<tr><th class=data>{$strStorage}</th></tr>\n";
		echo "<tr><td class=data1><select name=typstorage>";
		foreach ($data->typStorages as $v) {
			echo "<option value=\"{$v}\"",
				($v == $_POST['typstorage']) ? ' selected' : '', ">{$v}</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo $misc->form;
		echo "<input type=submit value=\"{$strSave}\"> <input type=reset value=\"{$strReset}\">\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$strShowAllTypes}</a></p>\n";
	}
	
	/**
	 * Actually creates the new type in the database
	 */
	function doSaveCreate() {
		global $localData;
		global $strTypeCreated, $strTypeCreatedBad;
		global $strTypeNeedsName, $strTypeNeedsLen;

		// Check that they've given a name and a length.
		// Note: We're assuming they've given in and out functions here
		// which might be unwise...
		if ($_POST['typname'] == '') doCreate($strTypeNeedsName);
		elseif ($_POST['typlen'] == '') doCreate($strTypeNeedsLen);
		else {		 
			$status = $localData->createType(
				$_POST['typname'],
				$_POST['typin'],
				$_POST['typout'],
				$_POST['typlen'],
				$_POST['typdef'],
				$_POST['typelem'],
				$_POST['typdelim'],
				isset($_POST['typbyval']),
				$_POST['typalign'],
				$_POST['typstorage']
			);
			if ($status == 0)
				doDefault($strTypeCreated);
			else
				doCreate($strTypeCreatedBad);
		}
	}	

	/**
	 * Show default list of types in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $strType, $strTypes, $strOwner, $strActions, $strNoTypes, $strCreateType;
		global $strProperties, $strDrop;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTypes}</h2>\n";
		$misc->printMsg($msg);
		
		$types = &$localData->getTypes();

		if ($types->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strType}</th><th class=data>{$strOwner}</th><th colspan=\"2\" class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$types->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($types->f[$data->typFields['typname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($types->f[$data->typFields['typowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=properties&{$misc->href}&type=", urlencode($types->f[$data->typFields['typname']]), "\">{$strProperties}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&type=", urlencode($types->f[$data->typFields['typname']]), "\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$types->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoTypes}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&{$misc->href}\">{$strCreateType}</a></p>\n";

	}

	$misc->printHeader($strTypes);
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
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
