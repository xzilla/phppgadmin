<?php

	/**
	 * Central WebDB configuration
	 *
	 * $Id: config.inc,v 1.1.1.1 2002/02/11 09:32:49 chriskl Exp $
	 */

	// Set error reporting level
	error_reporting(E_ALL);

	// App settings
	$appName = 'WebDB';
	$appIntro = 'Welcome to WebDB.';
	$appBase = '/home/chriskl/public_html/webdb';
	$appVersion = '1-dev';
	
	// GUI settings
	$guiLeftFrameWidth = 150;

	// Servers and types
	$confServers = array();
	$confServers[0]['desc'] = 'Houston';
	$confServers[0]['host'] = 'database.internal';
	$confServers[0]['port'] = '5432';
	$confServers[0]['type'] = 'Postgres71';
	$confServers[0]['default'] = 'template1';

	// Language
	include_once($appBase . '/lang/template.php');
	
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
		include($appBase . '/public_html/login.php');
		exit;
	}
	
	// Create data accessor object, if valid
	if (isset($webdbServerID) && isset($confServers[$webdbServerID])) {
		$_type = $confServers[$webdbServerID]['type'];
		include_once($appBase . '/classes/database/' . $_type . '.php');
		$data = new $_type(	$confServers[$webdbServerID]['host'],
									$confServers[$webdbServerID]['port'],
									$confServers[$webdbServerID]['default'],
									$webdbUsername,
									$webdbPassword);
	}


	

?>