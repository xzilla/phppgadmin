<?php

	/**
	 * Manage databases within a server
	 *
	 * $Id: all_db.php,v 1.4 2003/01/23 00:44:34 slubek Exp $
	 */

	// Include application functions
	include_once('conf/config.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $localData, $database;
		global $PHP_SELF, $strDatabases, $strConfDropDatabase, $strDrop, $strYes, $strNo, $strDatabaseDropped, $strDatabaseDroppedBad;

		if ($confirm) { 
			echo "<h2>{$strDatabases}: ", htmlspecialchars($_REQUEST['database']), ": {$strDrop}</h2>\n";
			echo "<p>", sprintf($strConfDropDatabase, htmlspecialchars($_REQUEST['database'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"{$strYes}\"> <input type=submit name=choice value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$localData->close();
			$status = $data->dropDatabase($_POST['database']);
			if ($status == 0)
				doDefault($strDatabaseDropped);
			else
				doDefault($strDatabaseDroppedBad);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new database
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strName, $strDatabases, $strCreateDatabase, $strShowAllDatabases, $strEncoding, $strSave, $strReset;
		
		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		
		echo "<h2>{$strDatabases}: {$strCreateDatabase}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=100%>\n";
		echo "<tr><th class=data>{$strName}</th><th class=data>{$strEncoding}</th></tr>\n";
		echo "<tr><td class=data1><input name=formName size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"", 
			htmlspecialchars($_POST['formName']), "\"></td>";
		echo "<td class=data1><input name=formEncoding></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo "<input type=submit value={$strSave}> <input type=reset value={$strReset}>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF\">{$strShowAllDatabases}</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $strDatabaseNeedsName, $strDatabaseCreated, $strDatabaseCreatedBad;
		
		// Check that they've given a name and a definition
		if ($_POST['formName'] == '') doCreate($strDatabaseNeedsName);
		else {
			$status = $data->createDatabase($_POST['formName'], $_POST['formEncoding']);
			if ($status == 0)
				doDefault($strDatabaseCreated);
			else
				doCreate($strDatabaseCreatedBad);
		}
	}	

	/**
	 * Show default list of databases in the server
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strDatabase, $strDatabases, $strComment, $strActions, $strNoDatabases, $strCreateDatabase, $strDrop;
		
		echo "<h2>{$strDatabases}</h2>\n";
		$misc->printMsg($msg);
		
		$databases = &$data->getDatabases();
		
		if ($databases->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strDatabase}</th><th class=data>{$strComment}</th><th class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$databases->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($databases->f[$data->dbFields['dbname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($databases->f[$data->dbFields['dbcomment']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=confirm_drop&database=", 
					htmlspecialchars($databases->f[$data->dbFields['dbname']]), "\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$databases->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoDatabases}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create\">{$strCreateDatabase}</a></p>\n";

	}

	$misc->printHeader($strDatabases);

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == $strYes) doDrop(false);
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
