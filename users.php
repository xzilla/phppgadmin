<?php

	/**
	 * Manage users in a database cluster
	 *
	 * $Id: users.php,v 1.7 2003/04/04 20:04:09 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/** 
	 * Function to save after editing a user
	 */
	function doSaveEdit() {
		global $data, $lang;
		
		$status = $data->setUser($_POST['username'], '', isset($_POST['formCreateDB']), isset($_POST['formSuper']), $_POST['formExpires']);
		if ($status == 0)
			doProperties($lang['struserupdated']);
		else
			doEdit($lang['struserupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a user
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>{$lang['strusers']}: ", htmlspecialchars($_REQUEST['username']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($_REQUEST['username']);
		
		if ($userdata->recordCount() > 0) {
			$userdata->f[$data->uFields['ucreatedb']] = $data->phpBool($userdata->f[$data->uFields['ucreatedb']]);
			$userdata->f[$data->uFields['usuper']] = $data->phpBool($userdata->f[$data->uFields['usuper']]);
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strusername']}</th><th class=\"data\">{$lang['strsuper']}</th><th class=\"data\">{$lang['strcreatedb']}</th><th class=\"data\">{$lang['strexpires']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formSuper\"", 
				($userdata->f[$data->uFields['usuper']]) ? ' checked="checked"' : '', " /></td>\n";
			echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formCreateDB\"", 
				($userdata->f[$data->uFields['ucreatedb']]) ? ' checked="checked"' : '', " /></td>\n";
			echo "<td class=\"data1\"><input size=\"30\" name=\"formExpires\" value=\"", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "\" /></td></tr>\n";
			echo "</table>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"username\" value=\"", htmlspecialchars($_REQUEST['username']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$lang['strsave']}\" /> <input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$lang['strshowallusers']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=properties&amp;username=", 
			urlencode($_REQUEST['username']), "\">{$lang['strproperties']}</a></p>\n";
	}
	
	/**
	 * Show read only properties for a user
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>{$lang['strusers']}: ", htmlspecialchars($_REQUEST['username']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($_REQUEST['username']);
		
		if ($userdata->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strusername']}</th><th class=\"data\">{$lang['strsuper']}</th><th class=\"data\">{$lang['strcreatedb']}</th><th class=\"data\">{$lang['strexpires']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=\"data1\">", $userdata->f[$data->uFields['usuper']], "</td>\n";
			echo "<td class=\"data1\">", $userdata->f[$data->uFields['ucreatedb']], "</td>\n";
			echo "<td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$lang['strshowallusers']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&amp;username=", 
			urlencode($_REQUEST['username']), "\">{$lang['stredit']}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>{$lang['strusers']}: ", htmlspecialchars($_REQUEST['username']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropuser'], htmlspecialchars($_REQUEST['username'])), "</p>\n";	
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"username\" value=\"", htmlspecialchars($_REQUEST['username']), "\" />\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"{$lang['stryes']}\" /> <input type=\"submit\" name=\"choice\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropUser($_REQUEST['username']);
			if ($status == 0)
				doDefault($lang['struserdropped']);
			else
				doDefault($lang['struserdroppedbad']);
		}		
	}
	
	/**
	 * Displays a screen where they can enter a new user
	 */
	function doCreate($msg = '') {
		global $data, $misc, $username;
		global $formUsername, $formPassword, $formSuper, $formCreateDB, $formExpires;
		global $PHP_SELF, $lang;
		
		if (!isset($formUsername)) $formUsername = '';
		if (!isset($formUsername)) $formPassword = '';
		if (!isset($formExpires)) $formExpires = '';
		
		echo "<h2>{$lang['strusers']}: {$lang['strcreateuser']}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strusername']}</th><th class=\"data\">{$lang['strpassword']}</th><th class=\"data\">{$lang['strsuper']}</th><th class=\"data\">{$lang['strcreatedb']}</th><th class=\"data\">{$lang['strexpires']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input size=\"15\" name=\"formUsername\" value=\"", htmlspecialchars($formUsername), "\" /></td>\n";
		echo "<td class=\"data1\"><input size=\"15\" name=\"formPassword\" value=\"", htmlspecialchars($formPassword), "\" /></td>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formSuper\"", 
			(isset($formSuper)) ? ' checked="checked"' : '', " /></td>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formCreateDB\"", 
			(isset($formCreateDB)) ? ' checked="checked"' : '', " /></td>\n";
		echo "<td class=\"data1\"><input size=\"30\" name=\"formExpires\" value=\"", htmlspecialchars($formExpires), "\" /></td></tr>\n";
		echo "</table>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strsave']}\" /> <input type=\"reset\" value=\"{$lang['strreset']}\" />\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$lang['strshowallusers']}</a></p>\n";
	}
	
	/**
	 * Actually creates the new user in the database
	 */
	function doSaveCreate() {
		global $data;
		global $lang;
		
		// @@ NOTE: No groups handled yet
		$status = $data->createUser($_POST['formUsername'], $_POST['formPassword'], 
			isset($_POST['formSuper']), isset($_POST['formCreateDB']), $_POST['formExpires'], array());
		if ($status == 0)
			doDefault($lang['strusercreated']);
		else
			doCreate($lang['strusercreatedbad']);
	}	

	/**
	 * Show default list of users in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>{$lang['strusers']}</h2>\n";
		$misc->printMsg($msg);
		
		$users = &$data->getUsers();
		
		if ($users->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strusername']}</th><th class=\"data\">{$lang['strsuper']}</th>";
			echo "<th class=\"data\">{$lang['strcreatedb']}</th><th class=\"data\">{$lang['strexpires']}</th><th colspan=\"2\" class=\"data\">{$lang['stractions']}</th></tr>\n";
			$i = 0;
			while (!$users->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['uname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", (htmlspecialchars($users->f[$data->uFields['usuper']])==='t') ? $lang['stryes'] : $lang['strno'], "</td>\n";
				echo "<td class=\"data{$id}\">", (htmlspecialchars($users->f[$data->uFields['ucreatedb']])==='t') ? $lang['stryes'] : $lang['strno'], "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['uexpires']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&amp;username=",
					urlencode($users->f[$data->uFields['uname']]), "\">{$lang['strproperties']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&amp;username=", 
					urlencode($users->f[$data->uFields['uname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "</tr>\n";
				$users->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnousers']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$lang['strcreateuser']}</a></p>\n";

	}

	$misc->printHeader($lang['strusers']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_REQUEST['choice'] == $lang['stryes']) doDrop(false);
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
