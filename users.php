<?php

	/**
	 * Manage users in a database cluster
	 *
	 * $Id: users.php,v 1.3 2003/02/20 23:19:38 slubek Exp $
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
		global $data, $strUserUpdated, $strUserUpdatedBad;
		
		$status = $data->setUser($_POST['username'], '', isset($_POST['formCreateDB']), isset($_POST['formSuper']), $_POST['formExpires']);
		if ($status == 0)
			doProperties($strUserUpdated);
		else
			doEdit($strUserUpdatedBad);
	}
	
	/**
	 * Function to allow editing of a user
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers, $strSave, $strReset;
		global $strShowAllUsers, $strNodata, $strProperties, $strEdit;
	
		echo "<h2>Users: ", htmlspecialchars($_REQUEST['username']), ": {$strEdit}</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($_REQUEST['username']);
		
		if ($userdata->recordCount() > 0) {
			$userdata->f[$data->uFields['ucreatedb']] = $data->phpBool($userdata->f[$data->uFields['ucreatedb']]);
			$userdata->f[$data->uFields['usuper']] = $data->phpBool($userdata->f[$data->uFields['usuper']]);
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strUsername}</th><th class=\"data\">{$strSuper}</th><th class=\"data\">{$strCreateDB}</th><th class=\"data\">{$strExpires}</th></tr>\n";
			echo "<tr><td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formSuper\"", 
				($userdata->f[$data->uFields['usuper']]) ? ' checked="checked"' : '', " /></td>\n";
			echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formCreateDB\"", 
				($userdata->f[$data->uFields['ucreatedb']]) ? ' checked="checked"' : '', " /></td>\n";
			echo "<td class=\"data1\"><input size=\"30\" name=\"formExpires\" value=\"", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "\" /></td></tr>\n";
			echo "</table>\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"username\" value=\"", htmlspecialchars($_REQUEST['username']), "\" />\n";
			echo "<input type=\"submit\" value=\"{$strSave}\" /> <input type=\"reset\" value=\"$strReset\" />\n";
			echo "</form>\n";
		}
		else echo "<p>{$strNoData}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$strShowAllUsers}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=properties&amp;username=", 
			urlencode($_REQUEST['username']), "\">{$strProperties}</a></p>\n";
	}
	
	/**
	 * Show read only properties for a user
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
		global $strPrperties, $strShowAllUsers, $strEdit, $strNoData, $strUsers;
	
		echo "<h2>{$strUsers}: ", htmlspecialchars($_REQUEST['username']), ": {$strProperties}</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($_REQUEST['username']);
		
		if ($userdata->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strUsername}</th><th class=\"data\">{$strSuper}</th><th class=\"data\">{$strCreateDB}</th><th class=\"data\">{$strExpires}</th></tr>\n";
			echo "<tr><td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=\"data1\">", $userdata->f[$data->uFields['usuper']], "</td>\n";
			echo "<td class=\"data1\">", $userdata->f[$data->uFields['ucreatedb']], "</td>\n";
			echo "<td class=\"data1\">", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>$strNoData}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$strShowAllUsers}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&amp;username=", 
			urlencode($_REQUEST['username']), "\">{$strEdit}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>Users: ", htmlspecialchars($_REQUEST['username']), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the user \"", htmlspecialchars($_REQUEST['username']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"username\" value=\"", htmlspecialchars($_REQUEST['username']), "\" />\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"Yes\" /> <input type=\"submit\" name=\"choice\" value=\"No\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropUser($_REQUEST['username']);
			if ($status == 0)
				doDefault('User dropped.');
			else
				doDefault('User drop failed.');
		}		
	}
	
	/**
	 * Displays a screen where they can enter a new user
	 */
	function doCreate($msg = '') {
		global $data, $misc, $username;
		global $formUsername, $formPassword, $formSuper, $formCreateDB, $formExpires;
		global $PHP_SELF, $strUsername, $strPassword, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
		
		if (!isset($formUsername)) $formUsername = '';
		if (!isset($formUsername)) $formPassword = '';
		if (!isset($formExpires)) $formExpires = '';
		
		echo "<h2>Users: Create User</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$strUsername}</th><th class=\"data\">{$strPassword}</th><th class=\"data\">{$strSuper}</th><th class=\"data\">{$strCreateDB}</th><th class=\"data\">{$strExpires}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input size=\"15\" name=\"formUsername\" value=\"", htmlspecialchars($formUsername), "\" /></td>\n";
		echo "<td class=\"data1\"><input size=\"15\" name=\"formPassword\" value=\"", htmlspecialchars($formPassword), "\" /></td>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formSuper\"", 
			(isset($formSuper)) ? ' checked="checked"' : '', " /></td>\n";
		echo "<td class=\"data1\"><input type=\"checkbox\" name=\"formCreateDB\"", 
			(isset($formCreateDB)) ? ' checked="checked"' : '', " /></td>\n";
		echo "<td class=\"data1\"><input size=\"30\" name=\"formExpires\" value=\"", htmlspecialchars($formExpires), "\" /></td></tr>\n";
		echo "</table>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"Save\" /> <input type=\"reset\" />\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">Show All Users</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data;
		
		// @@ NOTE: No groups handled yet
		$status = $data->createUser($_POST['formUsername'], $_POST['formPassword'], 
			isset($_POST['formSuper']), isset($_POST['formCreateDB']), $_POST['formExpires'], array());
		if ($status == 0)
			doDefault('User created.');
		else
			doCreate('User creation failed.');
	}	

	/**
	 * Show default list of users in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
		
		echo "<h2>Users</h2>\n";
		$misc->printMsg($msg);
		
		$users = &$data->getUsers();
		
		if ($users->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strUsername}</th><th class=\"data\">{$strSuper}</th>";
			echo "<th class=\"data\">{$strCreateDB}</th><th class=\"data\">{$strExpires}</th><th colspan=\"2\" class=\"data\">{$strActions}</th></tr>\n";
			$i = 0;
			while (!$users->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['uname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['usuper']]), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['ucreatedb']]), "</td>\n";
				echo "<td class=\"data{$id}\">", htmlspecialchars($users->f[$data->uFields['uexpires']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&amp;username=",
					urlencode($users->f[$data->uFields['uname']]), "\">Properties</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&amp;username=", 
					urlencode($users->f[$data->uFields['uname']]), "\">Drop</a></td>\n";
				echo "</tr>\n";
				$users->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoUsers}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">Create User</a></p>\n";

	}

	$misc->printHeader('Users');

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_REQUEST['choice'] == 'Yes') doDrop(false);
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
