<?php

	/**
	 * Central WebDB configuration
	 *
	 * $Id: config.inc.php,v 1.5 2002/04/10 04:09:47 chriskl Exp $
	 */

	// Set error reporting level
	error_reporting(E_ALL);

	// App settings
	$appName = 'WebDB';
	$appIntro = 'Welcome to WebDB.';
	$appBase = '../public_html';
	$appVersion = '0.1-dev';
	
	// GUI settings
	$guiLeftFrameWidth = 200;
	$guiTheme = 'default';

	// Servers and types
	$confServers = array();
	$confServers[0]['desc'] = 'Home-PG';
	$confServers[0]['host'] = 'localhost';
	$confServers[0]['port'] = '5432';
	$confServers[0]['type'] = 'Postgres71';
	$confServers[0]['default'] = 'template1';
	
	// MySQL example
	$confServers[1]['desc'] = 'Home-MySQL';
	$confServers[1]['host'] = 'localhost';
	$confServers[1]['port'] = 'xxx'; // Port isn't being used anywhere yet
	$confServers[1]['type'] = 'MySQL';
	$confServers[1]['default'] = '';
	
	// Language
	include_once ('../lang/template.php');
	
	// If login action is set, then set login variables
	if (isset($formServer) && isset($formUsername) && isset($formPassword)) {
		$webdbServerID = $formServer;
		$webdbUsername = $formUsername;
		$webdbPassword = $formPassword;
		setCookie('webdbServerID', $webdbServerID);
		setCookie('webdbUsername', $webdbUsername);
		setCookie('webdbPassword', $webdbPassword);
	}
		
	// If the logged in settings aren't present, put up the login screen
	if (!isset($webdbUsername) || !isset($webdbPassword) || !isset($webdbServerID) || !isset($confServers[$webdbServerID])) {
		include($appBase . '/login.php');
		exit;
	}
	
	// Create data accessor object, if valid
	if (isset($webdbServerID) && isset($confServers[$webdbServerID])) {
		$_type = $confServers[$webdbServerID]['type'];
		include_once('../classes/database/' . $_type . '.php');
		$data = new $_type(	$confServers[$webdbServerID]['host'],
									$confServers[$webdbServerID]['port'],
									$confServers[$webdbServerID]['default'],
									$webdbUsername,
									$webdbPassword);
	}

	// Create local (database-specific) data accessor object, if valid
	if (isset($webdbServerID) && isset($confServers[$webdbServerID]) && isset($database)) {
		$_type = $confServers[$webdbServerID]['type'];
		include_once('../classes/database/' . $_type . '.php');
		$localData = new $_type(	$confServers[$webdbServerID]['host'],
											$confServers[$webdbServerID]['port'],
											$database,
											$webdbUsername,
											$webdbPassword);
	}

	// Theme
	echo "<style type=\"text/css\">\n<!--\n";
	include("../themes/{$guiTheme}/global.css");
	echo "\n-->\n</style>\n";
	
?>