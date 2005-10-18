<?php

	/**
	 * Manage tablespaces in a database cluster
	 *
	 * $Id: tablespaces.php,v 1.9 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Function to allow altering of a tablespace
	 */
	function doAlter($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('tablespace');
		$misc->printTitle($lang['stralter'],'pg.tablespace.alter');
		$misc->printMsg($msg);

		// Fetch tablespace info		
		$tablespace = $data->getTablespace($_REQUEST['tablespace']);
		// Fetch all users		
		$users = $data->getUsers();
		
		if ($tablespace->recordCount() > 0) {
			
			if (!isset($_POST['name'])) $_POST['name'] = $tablespace->f['spcname'];
			if (!isset($_POST['owner'])) $_POST['owner'] = $tablespace->f['spcowner'];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<table>\n";
			echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				htmlspecialchars($_POST['name']), "\" /></td></tr>\n";
			echo "<tr><th class=\"data left required\">{$lang['strowner']}</th>\n";
			echo "<td class=\"data1\"><select name=\"owner\">";
			while (!$users->EOF) {
				$uname = $users->f['usename'];
				echo "<option value=\"", htmlspecialchars($uname), "\"",
					($uname == $_POST['owner']) ? ' selected="selected"' : '', ">", htmlspecialchars($uname), "</option>\n";
				$users->moveNext();
			}
			echo "</select></td></tr>\n";				
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"tablespace\" value=\"", htmlspecialchars($_REQUEST['tablespace']), "\" />\n";
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/** 
	 * Function to save after altering a tablespace
	 */
	function doSaveAlter() {
		global $data, $lang;

		// Check data
		if (trim($_POST['name']) == '')
			doAlter($lang['strtablespaceneedsname']);
		else {
			$status = $data->alterTablespace($_POST['tablespace'], $_POST['name'], $_POST['owner']);
			if ($status == 0) {
				// If tablespace has been renamed, need to change to the new name
				if ($_POST['tablespace'] != $_POST['name']) {
					// Jump them to the new table name
					$_REQUEST['tablespace'] = $_POST['name'];
				}
				doDefault($lang['strtablespacealtered']);
			}
			else
				doAlter($lang['strtablespacealteredbad']);
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('tablespace');
			$misc->printTitle($lang['strdrop'],'pg.tablespace.drop');
			
			echo "<p>", sprintf($lang['strconfdroptablespace'], $misc->printVal($_REQUEST['tablespace'])), "</p>\n";	
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"tablespace\" value=\"", htmlspecialchars($_REQUEST['tablespace']), "\" />\n";
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->droptablespace($_REQUEST['tablespace']);
			if ($status == 0)
				doDefault($lang['strtablespacedropped']);
			else
				doDefault($lang['strtablespacedroppedbad']);
		}		
	}
	
	/**
	 * Displays a screen where they can enter a new tablespace
	 */
	function doCreate($msg = '') {
		global $data, $misc, $spcname;
		global $PHP_SELF, $lang;
		
		$server_info = $misc->getServerInfo();
		
		if (!isset($_POST['formSpcname'])) $_POST['formSpcname'] = '';
		if (!isset($_POST['formOwner'])) $_POST['formOwner'] = $server_info['username'];
		if (!isset($_POST['formLoc'])) $_POST['formLoc'] = '';

		// Fetch all users
		$users = $data->getUsers();
		
		$misc->printTrail('server');
		$misc->printTitle($lang['strcreatetablespace'],'pg.tablespace.create');
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo $misc->form;
		echo "<table>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strname']}</th>\n";
		echo "\t\t<td class=\"data1\"><input size=\"32\" name=\"formSpcname\" maxlength=\"{$data->_maxNameLen}\" value=\"", htmlspecialchars($_POST['formSpcname']), "\" /></td>\n\t</tr>\n";
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strowner']}</th>\n";
		echo "\t\t<td class=\"data1\"><select name=\"formOwner\">\n";
		while (!$users->EOF) {
			$uname = $users->f['usename'];
			echo "\t\t\t<option value=\"", htmlspecialchars($uname), "\"",
				($uname == $_POST['formOwner']) ? ' selected="selected"' : '', ">", htmlspecialchars($uname), "</option>\n";
			$users->moveNext();
		}
		echo "\t\t</select></td>\n\t</tr>\n";				
		echo "\t<tr>\n\t\t<th class=\"data left required\">{$lang['strlocation']}</th>\n";
		echo "\t\t<td class=\"data1\"><input size=\"32\" name=\"formLoc\" value=\"", htmlspecialchars($_POST['formLoc']), "\" /></td>\n\t</tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new tablespace in the cluster
	 */
	function doSaveCreate() {
		global $data;
		global $lang;

		// Check data
		if (trim($_POST['formSpcname']) == '')
			doCreate($lang['strtablespaceneedsname']);
		elseif (trim($_POST['formLoc']) == '')
			doCreate($lang['strtablespaceneedsloc']);
		else {		
			$status = $data->createTablespace($_POST['formSpcname'], $_POST['formOwner'], $_POST['formLoc']);
			if ($status == 0)
				doDefault($lang['strtablespacecreated']);
			else
				doCreate($lang['strtablespacecreatedbad']);
		}
	}	

	/**
	 * Show default list of tablespaces in the cluster
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('server');
		$misc->printTabs('server','tablespaces');
		$misc->printMsg($msg);
		
		$tablespaces = $data->getTablespaces();

		$columns = array(
			'database' => array(
				'title' => $lang['strname'],
				'field' => 'spcname'
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'spcowner'
			),
			'location' => array(
				'title' => $lang['strlocation'],
				'field' => 'spclocation'
			),
			'actions' => array(
				'title' => $lang['stractions']
			)
		);
		
		$actions = array(
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "{$PHP_SELF}?action=edit&amp;{$misc->href}&amp;",
				'vars'  => array('tablespace' => 'spcname')
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('tablespace' => 'spcname')
			),
			'privileges' => array(
				'title' => $lang['strprivileges'],
				'url'   => "privileges.php?subject=tablespace&amp;{$misc->href}&amp;",
				'vars'  => array('tablespace' => 'spcname')
			)
		);
				
		$misc->printTable($tablespaces, $columns, $actions, $lang['strnotablespaces']);
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create&amp;{$misc->href}\">{$lang['strcreatetablespace']}</a></p>\n";

	}

	$misc->printHeader($lang['strtablespaces']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':			
			doCreate();
			break;
		case 'drop':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doDrop(false);
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		case 'save_edit':
			if (isset($_REQUEST['cancel'])) doDefault();
			else doSaveAlter();
			break;
		case 'edit':
			doAlter();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
