<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.18 2003/03/14 07:33:32 chriskl Exp $
	 */

	// Application name 
	$appName = 'phpPgAdmin';

	// Application version
	$appVersion = '3.0-dev';


	// Check to see if the configuration file exists, if not, explain
	if (file_exists('conf/config.inc.php')) {
		include('conf/config.inc.php');
	}
	else {
		echo "Configuration Error: You must rename/copy config.inc.php-dist to config.inc.php and set your appropriate settings";
		exit;
	}

	// Configuration file version.  If this is greater than that in config.inc.php, then
	// the app will refuse to run.  This and $appConfVersion should be incremented whenever
	// backwards incompatible changes are made to config.inc.php-dist.
	$appBaseConfVersion = 4;

	// List of available language files
	$appLangFiles = array(
//		'chinese-tr-big5' => '',
		'chinese-tr-utf8' => '&#32321;&#39636;&#20013;&#25991;&#65288;&#33836;&#22283;&#30908;&#65289;',
		//'chinese-sim-gb2312' => '',
		'chinese-sim-utf8' => '&#31616;&#20307;&#20013;&#25991;&#65288;&#32479;&#19968;&#30721;&#65289;',
		'dutch' => 'Nederlands',
		'english' => 'English',
		'german' => 'Deutsch',
		'italian' => 'Italiano',
		'polish' => 'Polish',
		'spanish' => 'Espa&ntilde;ol'
	);

	// Language settings.  Always include english.php, since it's the master
	// language file, and then overwrite it with the user-specified language.
	// Default language to English if it's not set.
	if (!isset($appDefaultLanguage)) $appDefaultLanguage = 'english';
	include_once('lang/recoded/english.php');

	// Check for config file version mismatch
	if (!isset($appConfVersion) || $appBaseConfVersion > $appConfVersion) {
		echo $strBadConfig;
		exit;
	}

	// Create Misc class references
	include_once('classes/Misc.php');
	$misc = new Misc();

	// Start session
	session_start();

	// Do basic PHP configuration checks
	if (ini_get('magic_quotes_gpc')) {
		$misc->stripVar($_GET);
		$misc->stripVar($_POST);
		$misc->stripVar($_COOKIE);
		$misc->stripVar($_REQUEST);
	}

	// Enforce PHP environment
	ini_set('magic_quotes_gpc', 0);
	ini_set('magic_quotes_runtime', 0);
	ini_set('magic_quotes_sybase', 0);
	ini_set('session.use_cookies', 1);
	
	// If login action is set, then set login variables
	if (isset($_POST['formServer']) && isset($_POST['formUsername']) && 
		isset($_POST['formPassword']) && isset($_POST['formLanguage'])) {
		$webdbServerID = $_POST['formServer'];
		$webdbUsername = $_POST['formUsername'];
		$webdbPassword = $_POST['formPassword'];
		$webdbLanguage = $_POST['formLanguage'];

		// Register some session variables
		$_SESSION['webdbServerID'] = $webdbServerID;
		$_SESSION['webdbUsername'] = $webdbUsername;
		$_SESSION['webdbPassword'] = $webdbPassword;
		$_SESSION['webdbLanguage'] = $webdbLanguage;
	}

	// If the logged in settings aren't present, put up the login screen
	if (!isset($_SESSION['webdbUsername'])
			||	!isset($_SESSION['webdbPassword'])
			||	!isset($_SESSION['webdbServerID'])
			||	!isset($_SESSION['webdbLanguage'])
			||	!isset($confServers[$_SESSION['webdbServerID']])){
		include('login.php');
		exit;
	}

	// Import language file
	include("lang/recoded/" . strtolower($_SESSION['webdbLanguage']) . ".php");

	// Create data accessor object, if valid
	if (isset($_SESSION['webdbServerID']) && isset($confServers[$_SESSION['webdbServerID']])) {
		$_type = $confServers[$_SESSION['webdbServerID']]['type'];
		require_once('classes/database/' . $_type . '.php');
		$data = new $_type(	$confServers[$_SESSION['webdbServerID']]['host'],
									$confServers[$_SESSION['webdbServerID']]['port'],
									$confServers[$_SESSION['webdbServerID']]['default'],
									$_SESSION['webdbUsername'],
									$_SESSION['webdbPassword']);
	}
	
	// Check that the database functions are loaded
	// @@ NOTE: THIS IS WRONG. IT NEEDS TO BE DONE BEFORE THE ABOVE, BUT
	// RELIES ON THE ABOVE!!
	if (!$data->isLoaded()) {
		echo $strNotLoaded;
		exit;
	}	

	// Create local (database-specific) data accessor object, if valid
	if (isset($_SESSION['webdbServerID']) && isset($confServers[$_SESSION['webdbServerID']]) && isset($_REQUEST['database'])) {
		$_type = $confServers[$_SESSION['webdbServerID']]['type'];
		require_once('classes/database/' . $_type . '.php');
		$localData = new $_type(	$confServers[$_SESSION['webdbServerID']]['host'],
											$confServers[$_SESSION['webdbServerID']]['port'],
											$_REQUEST['database'],
											$_SESSION['webdbUsername'],
											$_SESSION['webdbPassword']);
		
		// If schema is defined and database supports schemas, then set the schema explicitly
		if (isset($_REQUEST['schema']) && $localData->hasSchemas()) {
			$status = $localData->setSchema($_REQUEST['schema']);
			if ($status != 0) {
				echo $strBadSchema;
				exit;
			}
		}
		
		// Get database encoding
		$dbEncoding = $localData->getDatabaseEncoding();
		
		// Set client encoding to database encoding
		if ($dbEncoding != '') {
			$status = $localData->setClientEncoding($dbEncoding);
			if ($status != 0) {
				echo $strBadEncoding;
				exit;
			}
		
			// Override $appCharset
			if (isset($localData->codemap[$dbEncoding]))
				$appCharset = $localData->codemap[$dbEncoding];
			else
				$appCharset = $dbEncoding;
		}
	}

?>
