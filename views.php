<?php

	/**
	 * Manage views in a database
	 *
	 * $Id: views.php,v 1.8 2003/04/04 03:59:36 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/** 
	 * Function to save after editing a view
	 */
	function doSaveEdit() {
		global $localData, $lang;
		
		$status = $localData->setView($_POST['view'], $_POST['formDefinition']);
		if ($status == 0)
			doProperties($lang['strviewupdated']);
		else
			doEdit($lang['strviewupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a view
	 */
	function doEdit($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strviews']}: ", htmlspecialchars($_REQUEST['view']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$localData->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			echo "<form action=\"$PHP_SELF\" method=post>\n";
			echo "<table width=100%>\n";
			echo "<tr><th class=data>{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($viewdata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=data>{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=data1><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>", 
				htmlspecialchars($viewdata->f[$data->vwFields['vwdef']]), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<input type=hidden name=action value=save_edit>\n";
			echo "<input type=hidden name=view value=\"", htmlspecialchars($_REQUEST['view']), "\">\n";
			echo $misc->form;
			echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\">\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallviews']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=properties&{$misc->href}&view=", 
			urlencode($_REQUEST['view']), "\">{$lang['strproperties']}</a></p>\n";
	}
	
	/**
	 * Show read only properties for a view
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strviews']}: ", htmlspecialchars($_REQUEST['view']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$localData->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			echo "<table width=100%>\n";
			echo "<tr><th class=data>{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($viewdata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=data>{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=data1>", nl2br(htmlspecialchars($viewdata->f[$data->vwFields['vwdef']])), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallviews']}</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&{$misc->href}&view=", 
			urlencode($_REQUEST['view']), "\">{$lang['stredit']}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strviews']}: ", htmlspecialchars($_REQUEST['view']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropview'], htmlspecialchars($_REQUEST['view'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=view value=\"", htmlspecialchars($_REQUEST['view']), "\">\n";
			echo $misc->form;
			echo "<input type=submit name=choice value=\"{$lang['stryes']}\"> <input type=submit name=choice value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropView($_POST['view']);
			if ($status == 0)
				doDefault($lang['strviewdropped']);
			else
				doDefault($lang['strviewdroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new view
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formView'])) $_POST['formView'] = '';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strviews']}: {$lang['strcreateview']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=100%>\n";
		echo "<tr><th class=data>{$lang['strname']}</th></tr>\n";
		echo "<tr><td class=data1><input name=formView size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"", 
			htmlspecialchars($_POST['formView']), "\"></td></tr>\n";
		echo "<tr><th class=data>{$lang['strdefinition']}</th></tr>\n";
		echo "<tr><td class=data1><textarea style=\"width:100%;\" rows=20 cols=50 name=formDefinition wrap=virtual>", 
			htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo $misc->form;
		echo "<input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\">\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallviews']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $localData, $lang;
		
		// Check that they've given a name and a definition
		if ($_POST['formView'] == '') doCreate($lang['strviewneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strviewneedsdef']);
		else {		 
			$status = $localData->createView($_POST['formView'], $_POST['formDefinition']);
			if ($status == 0)
				doDefault($lang['strviewcreated']);
			else
				doCreate($lang['strviewcreatedbad']);
		}
	}	

	/**
	 * Show default list of views in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strviews']}</h2>\n";
		$misc->printMsg($msg);
		
		$views = &$localData->getViews();
		
		if ($views->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$lang['strview']}</th><th class=data>{$lang['strowner']}</th><th colspan=\"5\" class=data>{$lang['stractions']}</th>\n";
			$i = 0;
			while (!$views->EOF) {
				// @@@@@@@@@ FIX THIS!!!!!
				$query = urlencode("SELECT * FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$count = urlencode("SELECT COUNT(*) AS total FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$return_url = urlencode("views.php?{$misc->href}");
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($views->f[$data->vwFields['vwname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($views->f[$data->vwFields['vwowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"display.php?{$misc->href}&query={$query}&count={$count}&return_url={$return_url}&return_desc=",
					urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></td>\n";
				echo "<td class=opbutton{$id}>{$lang['strselect']}</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=properties&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"privileges.php?{$misc->href}&object=", urlencode($views->f[$data->vwFields['vwname']]),
					"&type=view\">{$lang['strprivileges']}</a></td>\n";
				echo "</tr>\n";
				$views->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoviews']}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreateview']}</a></p>\n";

	}

	$misc->printHeader($lang['strviews']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == "{$lang['stryes']}") doDrop(false);
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
