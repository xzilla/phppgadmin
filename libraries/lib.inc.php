<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.8 2003/01/04 07:08:03 chriskl Exp $
	 */

	// Application name 
	$appName = 'WebDB';

	// Application version
	$appVersion = '0.7';

	// Configuration file version.  If this is greater than that in config.inc.php, then
	// the app will refuse to run.  This and $appConfVersion should be incremented whenever
	// backwards incompatible changes are made to config.inc.php-dist.
	$appBaseConfVersion = 1;

	// Language settings.  Always include english.php, since it's the master
	// language file, and then overwrite it with the user-specified language.
	$appLanguage = strtolower($appLanguage);
	include_once('../lang/english.php');
	include_once("../lang/{$appLanguage}.php");

	// Check for config file version mismatch
	if (!isset($appConfVersion) || $appBaseConfVersion > $appConfVersion) {
		echo $strBadConfig;
		exit;
	}

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
			||	!isset($confServers[$_SESSION['webdbServerID']])){
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
		
		// If schema is defined and database supports schemas, then set the schema explicitly
		if (isset($_REQUEST['schema']) && $localData->hasSchemas()) {
			$status = $localData->setSchema($_REQUEST['schema']);
			if ($status != 0) {
				echo "<p class=\"message\">Invalid schema specified.</p>\n";
			}
		}
	}

?>
