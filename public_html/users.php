<?php

	/**
	 * Manage users in a database cluster
	 *
	 * $Id: users.php,v 1.1 2002/05/01 09:37:30 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	if (!isset($action)) $action = '';
	if (!isset($msg)) $msg = '';

	/** 
	 * Function to save after editing a user
	 */
	function doSaveEdit() {
		global $data, $username, $formCreateDB, $formSuper, $formExpires, $form;
		
		$status = $data->setUser($username, '', isset($formCreateDB), isset($formSuper), $formExpires);
		if ($status == 0)
			doProperties('User updated.');
		else
			doEdit('User update failed.');
	}
	
	/**
	 * Function to allow editing of a user
	 */
	function doEdit($msg = '') {
		global $data, $misc, $username;
		global $PHP_SELF, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
	
		echo "<h2>Users: ", htmlspecialchars($username), ": Edit</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($username);
		
		if ($userdata->recordCount() > 0) {
			$userdata->f[$data->uFields['ucreatedb']] = $data->phpBool($userdata->f[$data->uFields['ucreatedb']]);
			$userdata->f[$data->uFields['usuper']] = $data->phpBool($userdata->f[$data->uFields['usuper']]);
			echo "<form action=\"$PHP_SELF\" method=post>\n";
			echo "<table>\n";
			echo "<tr><th class=data>{$strUsername}</th><th class=data>{$strSuper}</th><th class=data>{$strCreateDB}</th><th class=data>{$strExpires}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=data1><input type=checkbox name=formSuper", 
				($userdata->f[$data->uFields['usuper']]) ? ' checked' : '', "></td>\n";
			echo "<td class=data1><input type=checkbox name=formCreateDB", 
				($userdata->f[$data->uFields['ucreatedb']]) ? ' checked' : '', "></td>\n";
			echo "<td class=data1><input size=30 name=formExpires value=\"", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "\"></td></tr>\n";
			echo "</table>\n";
			echo "<input type=hidden name=action value=save_edit>\n";
			echo "<input type=hidden name=username value=\"", htmlspecialchars($username), "\">\n";
			echo "<input type=submit value=Save> <input type=reset>\n";
			echo "</form>\n";
		}
		else echo "<p>No data.</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF\">Show All Users</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=properties&username=", 
			urlencode($username), "\">Properties</a></p>\n";
	}
	
	/**
	 * Show read only properties for a user
	 */
	function doProperties($msg = '') {
		global $data, $misc, $username;
		global $PHP_SELF, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
	
		echo "<h2>Users: ", htmlspecialchars($username), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($username);
		
		if ($userdata->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strUsername}</th><th class=data>{$strSuper}</th><th class=data>{$strCreateDB}</th><th class=data>{$strExpires}</th></tr>\n";
			echo "<tr><td class=data1>", htmlspecialchars($userdata->f[$data->uFields['uname']]), "</td>\n";
			echo "<td class=data1>", $userdata->f[$data->uFields['usuper']], "</td>\n";
			echo "<td class=data1>", $userdata->f[$data->uFields['ucreatedb']], "</td>\n";
			echo "<td class=data1>", htmlspecialchars($userdata->f[$data->uFields['uexpires']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>No data.</p>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF\">Show All Users</a> |\n";
		echo "<a class=navlink href=\"$PHP_SELF?action=edit&username=", 
			urlencode($username), "\">Edit</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $username;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>Users: ", htmlspecialchars($username), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the user \"", htmlspecialchars($username), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=username value=\"", htmlspecialchars($username), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropUser($username);
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

		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table>\n";
		echo "<tr><th class=data>{$strUsername}</th><th class=data>{$strPassword}</th><th class=data>{$strSuper}</th><th class=data>{$strCreateDB}</th><th class=data>{$strExpires}</th></tr>\n";
		echo "<tr><td class=data1><input size=15 name=formUsername value=\"", htmlspecialchars($formUsername), "\"></td>\n";
		echo "<td class=data1><input size=15 name=formPassword value=\"", htmlspecialchars($formPassword), "\"></td>\n";
		echo "<td class=data1><input type=checkbox name=formSuper", 
			(isset($formSuper)) ? ' checked' : '', "></td>\n";
		echo "<td class=data1><input type=checkbox name=formCreateDB", 
			(isset($formCreateDB)) ? ' checked' : '', "></td>\n";
		echo "<td class=data1><input size=30 name=formExpires value=\"", htmlspecialchars($formExpires), "\"></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo "<input type=submit value=Save> <input type=reset>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF\">Show All Users</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $formUsername, $formPassword, $formSuper, $formCreateDB, $formExpires;
		
		// @@ NOTE: No groups handled yet
		$status = $data->createUser($formUsername, $formPassword, isset($formSuper), isset($formCreateDB), $formExpires, array());
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
			echo "<tr><th class=data>{$strUsername}</th><th class=data>{$strSuper}</th>";
			echo "<th class=data>{$strCreateDB}</th><th class=data>{$strExpires}</th><th colspan=2 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$users->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($users->f[$data->uFields['uname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($users->f[$data->uFields['usuper']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($users->f[$data->uFields['ucreatedb']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($users->f[$data->uFields['uexpires']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=properties&username=", 
					urlencode($users->f[$data->uFields['uname']]), "\">Properties</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&username=", 
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
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create\">Create User</a></p>\n";

	}

	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($choice == 'Yes') doDrop(false);
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

	echo "</body>\n";
	echo "</html>\n";
	
?>