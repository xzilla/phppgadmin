<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.2 2002/09/23 06:11:39 chriskl Exp $
	 */

	// Create Misc class references
	include_once('../classes/Misc.php');
	$misc = new Misc();

	// Do basic PHP configuration checks
	if (ini_get('magic_quotes_gpc')) {
		$misc->stripVar($_GET);
		$misc->stripVar($_POST);
		$misc->stripVar($_COOKIE);
		$misc->stripVar($_REQUEST);
	}

	ini_set('magic_quotes_gpc', 0);
	ini_set('magic_quotes_runtime', 0);
	ini_set('magic_quotes_sybase', 0);
	
	// If login action is set, then set login variables
	if (isset($_POST['formServer']) && isset($_POST['formUsername']) && isset($_POST['formPassword'])) {
		$webdbServerID = $_POST['formServer'];
		$webdbUsername = $_POST['formUsername'];
		$webdbPassword = $_POST['formPassword'];
		setCookie('webdbServerID', $webdbServerID);
		setCookie('webdbUsername', $webdbUsername);
		setCookie('webdbPassword', $webdbPassword);
		$_COOKIE['webdbServerID'] = $webdbServerID;
		$_COOKIE['webdbUsername'] = $webdbUsername;
		$_COOKIE['webdbPassword'] = $webdbPassword;
	}
		
	// If the logged in settings aren't present, put up the login screen
	if (!isset($_COOKIE['webdbUsername']) || 
			!isset($_COOKIE['webdbPassword']) || 
			!isset($_COOKIE['webdbServerID']) || 
			!isset($confServers[$_COOKIE['webdbServerID']])) {
		include($appBase . '/login.php');
		exit;
	}
	
	// Create data accessor object, if valid
	if (isset($_COOKIE['webdbServerID']) && isset($confServers[$_COOKIE['webdbServerID']])) {
		$_type = $confServers[$_COOKIE['webdbServerID']]['type'];
		include_once('../classes/database/' . $_type . '.php');
		$data = new $_type(	$confServers[$_COOKIE['webdbServerID']]['host'],
									$confServers[$_COOKIE['webdbServerID']]['port'],
									$confServers[$_COOKIE['webdbServerID']]['default'],
									$_COOKIE['webdbUsername'],
									$_COOKIE['webdbPassword']);
	}
	
	// Check that the database functions are loaded
	if (!$data->isLoaded()) {
		echo $strNotLoaded;
		exit;
	}	

	// Create local (database-specific) data accessor object, if valid
	if (isset($_COOKIE['webdbServerID']) && isset($confServers[$_COOKIE['webdbServerID']]) && isset($_REQUEST['database'])) {
		$_type = $confServers[$_COOKIE['webdbServerID']]['type'];
		include_once('../classes/database/' . $_type . '.php');
		$localData = new $_type(	$confServers[$_COOKIE['webdbServerID']]['host'],
											$confServers[$_COOKIE['webdbServerID']]['port'],
											$_REQUEST['database'],
											$_COOKIE['webdbUsername'],
											$_COOKIE['webdbPassword']);
	}

	// Theme
	echo "<style type=\"text/css\">\n<!--\n";
	include("../themes/{$guiTheme}/global.css");
	echo "\n-->\n</style>\n";
	
?>