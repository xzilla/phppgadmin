<?php

	/**
	 * Manage groups in a database cluster
	 *
	 * $Id: groups.php,v 1.3 2003/02/07 17:34:34 xzilla Exp $
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
		global $data;
		
		$status = $data->setUser($_POST['username'], '', isset($_POST['formCreateDB']), isset($_POST['formSuper']), $_POST['formExpires']);
		if ($status == 0)
			doProperties('User updated.');
		else
			doEdit('User update failed.');
	}
	
	/**
	 * Function to allow editing of a user
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strShowAllGroups, $strUsername, $strSuper, $strCreateDB, $strExpires, $strActions, $strNoUsers;
		global $strProperties, $strEdit;
	
		echo "<h2>Users: ", htmlspecialchars($_REQUEST['groname']), ": $strEdit</h2>\n";
		$misc->printMsg($msg);
		
		$userdata = &$data->getUser($_REQUEST['groname']);
		
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
			echo "<input type=\"submit\" value=\"Save\" /> <input type=\"reset\" />\n";
			echo "</form>\n";
		}
		else echo "<p>No data.</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$strShowAllGroups}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=properties&amp;groname=", 
			urlencode($_REQUEST['groname']), "\">{$strProperties}</a></p>\n";
	}
	
	/**
	 * Show read only properties for a user
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strShowAllGroups, $strMembers, $strCreateDB, $strExpires, $strActions, $strNoUsers, $strEdit;
	
		echo "<h2>Group: ", htmlspecialchars($_REQUEST['groname']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$groupdata = &$data->getGroup($_REQUEST['groname']);
		
		if ($groupdata->recordCount() > 0) {
			echo "<table>\n";
           	echo "<tr><th class=\"data\">{$strMembers}</th></tr>\n";
           	while (!$groupdata->EOF) {
            	echo "<tr><td class=\"data1\">", htmlspecialchars($groupdata->f[$data->uFields['uname']]), "</td></tr>\n";
            	$groupdata->moveNext();
           	}
			echo "</table>\n";

		}
		else echo "<p>No data.</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$strShowAllGroups}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&amp;groname=", 
			urlencode($_REQUEST['groname']), "\">{$strEdit}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data;
		global $PHP_SELF, $strGroups, $strDrop, $strConfDropGroup, $strGroupDropped, $strGroupDroppedBad;

		if ($confirm) { 
			echo "<h2>{$strGroups}: ", htmlspecialchars($_REQUEST['groname']), ": {$strDrop}</h2>\n";
			
			echo "<p>", sprintf($strConfDropGroup, htmlspecialchars($_REQUEST['groname'])), "</p>\n";
			
			echo "<form action=\"{$PHP_SELF}\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"groname\" value=\"", htmlspecialchars($_REQUEST['groname']), "\" />\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"Yes\" /> <input type=\"submit\" name=\"choice\" value=\"No\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropGroup($_REQUEST['groname']);
			if ($status == 0)
				doDefault($strGroupDropped);
			else
				doDefault($strGroupDroppedBad);
		}		
	}
	
	/**
	 * Displays a screen where they can enter a new group
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strName, $strGroups, $strCreateGroup, $strShowAllGroups, $strMembers, $strNoUsers;
		
		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		if (!isset($_POST['formMembers'])) $_POST['formMembers'] = array();

		// Fetch a list of all users in the cluster
		$users = &$data->getUsers();
		
		echo "<h2>{$strGroups}: {$strCreateGroup}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$strName}</th>\n";
		echo "<td class=\"data\"><input size=\"32\" maxlength=\"{$data->_maxNameLen}\" name=\"formName\" value=\"", htmlspecialchars($_POST['formName']), "\" /></td></tr>\n";
		if ($users->recordCount() > 0) {
			echo "<tr><th class=\"data\">{$strMembers}</th>\n";
			echo "<td class=\"data\">\n";
			while (!$users->EOF) {
				$username = $users->f[$data->uFields['uname']];
				echo "<input type=\"checkbox\" name=\"formMembers[", htmlspecialchars($username), "]\"", 
					(isset($_POST['formMembers'][$username]) ? ' checked' : ''), ">", htmlspecialchars($username), "<br>\n";
				$users->moveNext();
			}		
			echo "</td></tr>\n";
		}
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"Save\" /> <input type=\"reset\" /></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF\">{$strShowAllGroups}</a></p>\n";
	}
	
	/**
	 * Actually creates the new group in the database
	 */
	function doSaveCreate() {
		global $data;
		global $strGroupNeedsName, $strGroupCreated, $strGroupCreatedBad;
		
		if (!isset($_POST['formMembers'])) $_POST['formMembers'] = array();

		// Check form vars
		if (trim($_POST['formName']) == '')
			doCreate($strGroupNeedsName);
		else {		
			$status = $data->createGroup($_POST['formName'], array_keys($_POST['formMembers']));
			if ($status == 0)
				doDefault($strGroupCreated);
			else
				doCreate($strGroupCreatedBad);
		}
	}	

	/**
	 * Show default list of users in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strGroup, $strGroups, $strCreateGroup, $strActions, $strDrop, $strProperties, $strNoGroups;
		
		echo "<h2>{$strGroups}</h2>\n";
		$misc->printMsg($msg);
		
		$groups = &$data->getGroups();
		
		if ($groups->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strGroup}</th><th colspan=\"2\" class=\"data\">{$strActions}</th></tr>\n";
			$i = 0;
			while (!$groups->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($groups->f[$data->grpFields['groname']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&groname=",
					urlencode($groups->f[$data->grpFields['groname']]), "\">{$strProperties}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&groname=", 
					urlencode($groups->f[$data->grpFields['groname']]), "\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$groups->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoGroups}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create\">{$strCreateGroup}</a></p>\n";

	}

	$misc->printHeader($strGroups);

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
