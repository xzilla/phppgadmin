<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.3 2002/10/23 21:59:14 xzilla Exp $
	 */

	// Create Misc class references
	include_once('../classes/Misc.php');
	$misc = new Misc();

	session_start();
	//session_register('webdbServerID');
	//session_register('webdbUsername');
	//session_register('webdbPassword');

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

		$_SESSION['webdbServerID'] = $webdbServerID;
		$_SESSION['webdbUsername'] = $webdbUsername;
		$_SESSION['webdbPassword'] = $webdbPassword;

		//setCookie('webdbServerID', $webdbServerID);
		//setCookie('webdbUsername', $webdbUsername);
		//setCookie('webdbPassword', $webdbPassword);
		//$_COOKIE['webdbServerID'] = $webdbServerID;
		//$_COOKIE['webdbUsername'] = $webdbUsername;
		//$_COOKIE['webdbPassword'] = $webdbPassword;
	}
		
	// If the logged in settings aren't present, put up the login screen
	if (!isset($_SESSION['webdbUsername'])  
			||	!isset($_SESSION['webdbPassword'])  
			||	!isset($_SESSION['webdbServerID'])  
			||	!isset($confServers[$_SESSION['webdbServerID']])
	){
		include($appBase . '/login.php');
		exit;
	}
	
	// Create data accessor object, if valid
	if (isset($_SESSION['webdbServerID']) && isset($confServers[$_SESSION['webdbServerID']])) {
		$_type = $confServers[$_SESSION['webdbServerID']]['type'];
		require_once('../classes/database/' . $_type . '.php');
		$data = new $_type(	$confServers[$_SESSION['webdbServerID']]['host'],
									$confServers[$_SESSION['webdbServerID']]['port'],
									$confServers[$_SESSION['webdbServerID']]['default'],
									$_SESSION['webdbUsername'],
									$_SESSION['webdbPassword']);
	}
	
	// Check that the database functions are loaded
	if (!$data->isLoaded()) {
		echo $strNotLoaded;
		exit;
	}	

	// Create local (database-specific) data accessor object, if valid
	if (isset($_SESSION['webdbServerID']) && isset($confServers[$_SESSION['webdbServerID']]) && isset($_REQUEST['database'])) {
		$_type = $confServers[$_SESSION['webdbServerID']]['type'];
		require_once('../classes/database/' . $_type . '.php');
		$localData = new $_type(	$confServers[$_SESSION['webdbServerID']]['host'],
											$confServers[$_SESSION['webdbServerID']]['port'],
											$_REQUEST['database'],
											$_SESSION['webdbUsername'],
											$_SESSION['webdbPassword']);
	}

	// Theme
	echo "<style type=\"text/css\">\n<!--\n";
	include("../themes/{$guiTheme}/global.css");
	echo "\n-->\n</style>\n";
	
?>
