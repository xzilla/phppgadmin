<?php

	/**
	 * Manage databases within a server
	 *
	 * $Id: all_db.php,v 1.2 2002/11/07 09:39:49 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $database;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>Databases: ", htmlspecialchars($_REQUEST['database']), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the database \"", htmlspecialchars($_REQUEST['database']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropDatabase($_POST['database']);
			if ($status == 0)
				doDefault('Database dropped.');
			else
				doDefault('Database drop failed.');
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new database
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strName;
		
		if (!isset($_POST['formName'])) $_POST['formName'] = '';
		
		echo "<h2>Databases: Create Database</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=100%>\n";
		echo "<tr><th class=data>{$strName}</th></tr>\n";
		echo "<tr><td class=data1><input name=formName size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"", 
			htmlspecialchars($_POST['formName']), "\"></td></tr>\n";
		echo "</table>\n";
		echo "<input type=hidden name=action value=save_create>\n";
		echo "<input type=submit value=Save> <input type=reset>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF\">Show All Databases</a></p>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $data, $strDatabaseNeedsName;
		
		// Check that they've given a name and a definition
		if ($_POST['formName'] == '') doCreate($strDatabaseNeedsName);
		else {		 
			$status = $data->createDatabase($_POST['formName']);
			if ($status == 0)
				doDefault('Database created.');
			else
				doCreate('Database creation failed.');
		}
	}	

	/**
	 * Show default list of databases in the server
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $strDatabase, $strDatabases, $strComment, $strActions, $strNoDatabases, $strCreate;
		
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
					htmlspecialchars($databases->f[$data->dbFields['dbname']]), "\">Drop</a></td>\n";
				echo "</tr>\n";
				$databases->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoDatabases}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"$PHP_SELF?action=create\">{$strCreate} {$strDatabase}</a></p>\n";

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
			if ($_POST['choice'] == 'Yes') doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		default:
			doDefault();
			break;
	}	

	echo "</body>\n";
	echo "</html>\n";
	
?>
