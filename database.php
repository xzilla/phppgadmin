<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.5 2003/02/20 23:17:05 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $PHP_SELF, $localData, $misc;
		global $strSQL, $strEnterSQL, $strGo, $strReset;

		if (!isset($_POST['query'])) $_POST['query'] = '';

		$misc->printDatabaseNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strSQL}</h2>\n";

		echo "<p>{$strEnterSQL}</p>\n";
		echo "<form action=\"display.php\" method=post>\n";
		echo "<p>{$strSQL}<br>\n";
		echo "<textarea style=\"width:100%;\" rows=20 cols=50 name=\"query\">",
			htmlspecialchars($_POST['query']), "</textarea></p>\n";

		echo $misc->form;
		echo "<input type=\"hidden\" name=\"return_url\" value=\"database.php?database=", 
			urlencode($_REQUEST['database']), "&action=sql\">\n";
		echo "<input type=\"hidden\" name=\"return_desc\" value=\"Back\">\n";
		echo "<input type=submit value=\"{$strGo}\"> <input type=reset value=\"{$strReset}\">\n";
		echo "</form>\n";

	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $PHP_SELF, $data, $localData;
		global $strDrop, $strConfDropSchema, $strSchemaDropped, $strSchemaDroppedBad, $strYes, $strNo;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ",
				htmlspecialchars($_REQUEST['schema']), ": {$strDrop}</h2>\n";

			echo "<p>", sprintf($strConfDropSchema, htmlspecialchars($_REQUEST['schema'])), "</p>\n";

			echo "<form action=\"{$PHP_SELF}\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_REQUEST['schema']), "\">\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=\"submit\" name=\"choice\" value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSchema($_POST['schema']);
			if ($status == 0)
				doDefault($strSchemaDropped);
			else
				doDefault($strSchemaDroppedBad);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new schema
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strName, $strOwner, $strCreateSchema, $strShowAllSchemas, $strSave, $strReset;

		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		if (!isset($_POST['formAuth'])) $_POST['formAuth'] = $_SESSION['webdbUsername'];

		// Fetch all users from the database
		$users = &$data->getUsers();

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strCreateSchema}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$strName}</th><th class=\"data\">{$strOwner}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input name=\"formName\" size=\"{$data->_maxNameLen}\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formName']), "\"></td>\n";
		echo "<td class=\"data1\"><select name=\"formAuth\">";
		while (!$users->EOF) {
			$uname = htmlspecialchars($users->f[$data->uFields['uname']]);
			echo "<option value=\"{$uname}\"",
				($uname == $_POST['formAuth']) ? ' selected' : '', ">{$uname}</option>\n";
			$users->moveNext();
		}
		echo "</select></td></tr>\n";
		echo "</table>\n";
		echo "<p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo "<input type=\"hidden\" name=\"database\" value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
		echo "<input type=\"submit\" value=\"{$strSave}\"> <input type=\"reset\" value=\"{$strReset}\">\n";
		echo "</p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?database=", 
			urlencode($_REQUEST['database']), "\">{$strShowAllSchemas}</a></p>\n";
	}
	
	/**
	 * Actually creates the new schema in the database
	 */
	function doSaveCreate() {
		global $localData, $strSchemaNeedsName, $strSchemaCreated, $strSchemaCreatedBad;

		// Check that they've given a name
		if ($_POST['formName'] == '') doCreate($strSchemaNeedsName);
		else {
			$status = $localData->createSchema($_POST['formName'], $_POST['formAuth']);
			if ($status == 0)
				doDefault($strSchemaCreated);
			else
				doCreate($strSchemaCreatedBad);
		}
	}	

	/**
	 * Show default list of schemas in the server
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strOwner, $strSchemas, $strDrop, $strActions;
		global $strCreateSchema, $strNoSchemas, $strPrivileges;
		
		$misc->printDatabaseNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strSchemas}</h2>\n";
		$misc->printMsg($msg);
		
		// Check that the DB actually supports schemas
		if ($data->hasSchemas()) {
			$schemas = &$localData->getSchemas();

			if ($schemas->recordCount() > 0) {
				echo "<table>\n";
				echo "<tr><th class=data>{$strName}</th><th class=data>{$strOwner}</th><th colspan=\"2\" class=data>{$strActions}</th>\n";
				$i = 0;
				while (!$schemas->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr><td class=data{$id}>", htmlspecialchars($schemas->f[$data->nspFields['nspname']]), "</td>\n";
					echo "<td class=data{$id}>", htmlspecialchars($schemas->f[$data->nspFields['nspowner']]), "</td>\n";
					echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&database=",
						htmlspecialchars($_REQUEST['database']), "&schema=",
						htmlspecialchars($schemas->f[$data->nspFields['nspname']]), "\">{$strDrop}</a></td>\n";
					echo "<td class=opbutton{$id}><a href=\"privileges.php?database=",
						htmlspecialchars($_REQUEST['database']), "&object=",
						htmlspecialchars($schemas->f[$data->nspFields['nspname']]), "&type=schema\">{$strPrivileges}</a></td>\n";
					echo "</tr>\n";
					$schemas->moveNext();
					$i++;
				}
				echo "</table>\n";
			}
			else {
				echo "<p>{$strNoSchemas}</p>\n";
			}

			echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']),
				"&action=create\">{$strCreateSchema}</a></p>\n";
		} else {
			// If the database does not support schemas...
			echo "<p>{$strNoSchemas}</p>\n";
		}
	}

	$misc->printHeader($strSchemas);

	switch ($action) {
		case 'sql':
			doSQL();
			break;
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
		default:
			doDefault();
			break;
	}

	$misc->printFooter();

?>
