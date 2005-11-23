<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.105.2.3 2005/11/23 04:31:10 chriskl Exp $
	 */
	include_once('decorator.inc.php');
	include_once('./lang/translations.php');
	
	// Set error reporting level to max
	error_reporting(E_ALL);

	// Application name 
	$appName = 'phpPgAdmin';

	// Application version
	$appVersion = '4.0.1';

	// PostgreSQL and PHP minimum version
	$postgresqlMinVer = '7.0';
	$phpMinVer = '4.1';

	// Check the version of PHP
	if (version_compare(phpversion(), $phpMinVer, '<'))
		exit(sprintf('Version of PHP not supported. Please upgrade to version %s or later.', $phpMinVer));

	// Check to see if the configuration file exists, if not, explain
	if (file_exists('conf/config.inc.php')) {
		$conf = array();
		include('./conf/config.inc.php');
	}
	else {
		echo 'Configuration error: Copy conf/config.inc.php-dist to conf/config.inc.php and edit appropriately.';
		exit;
	}

	// Configuration file version.  If this is greater than that in config.inc.php, then
	// the app will refuse to run.  This and $conf['version'] should be incremented whenever
	// backwards incompatible changes are made to config.inc.php-dist.
	$conf['base_version'] = 15;

	// Always include english.php, since it's the master language file
	if (!isset($conf['default_lang'])) $conf['default_lang'] = 'english';
	$lang = array();
	require_once('./lang/recoded/english.php');

	// Create Misc class references
	require_once('./classes/Misc.php');
	$misc = new Misc();

	// Start session (if not auto-started)
	if (!ini_get('session.auto_start')) {
		session_name('PPA_ID'); 
		session_start();
	}

	// Do basic PHP configuration checks
	if (ini_get('magic_quotes_gpc')) {
		$misc->stripVar($_GET);
		$misc->stripVar($_POST);
		$misc->stripVar($_COOKIE);
		$misc->stripVar($_REQUEST);
	}

	// This has to be deferred until after stripVar above
	$misc->setHREF();
	$misc->setForm();

	// Enforce PHP environment
	ini_set('magic_quotes_gpc', 0);
	ini_set('magic_quotes_runtime', 0);
	ini_set('magic_quotes_sybase', 0);
	ini_set('arg_separator.output', '&amp;');
	
	// If login action is set, then set session variables
	if (isset($_POST['loginServer']) && isset($_POST['loginUsername']) && 
		isset($_POST['loginPassword'])) {
		
		$_server_info = $misc->getServerInfo($_POST['loginServer']);
		
		$_server_info['username'] = $_POST['loginUsername'];
		$_server_info['password'] = $_POST['loginPassword'];
		
		$misc->setServerInfo(null, $_server_info, $_POST['loginServer']);

		// Check for shared credentials
		if (isset($_POST['loginShared'])) {
			$_SESSION['sharedUsername'] = $_POST['loginUsername'];
			$_SESSION['sharedPassword'] = $_POST['loginPassword'];
		}
		
		$_reload_browser = true;
	}

	// Determine language file to import:
	// 1. Check for the language from a request var
	if (isset($_REQUEST['language']) && isset($appLangFiles[$_REQUEST['language']]))
		$_language = $_REQUEST['language'];
	
	// 2. Check for language session var
	if (!isset($_language) && isset($_SESSION['webdbLanguage']) && isset($appLangFiles[$_SESSION['webdbLanguage']])) {
		$_language = $_SESSION['webdbLanguage'];
	}
	
	// 3. Check for acceptable languages in HTTP_ACCEPT_LANGUAGE var
	if (!isset($_language) && $conf['default_lang'] == 'auto' && isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		// extract acceptable language tags
		// (http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.4)
		preg_match_all('/\s*([a-z]{1,8}(?:-[a-z]{1,8})*)(?:;q=([01](?:.[0-9]{0,3})?))?\s*(?:,|$)/', strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']), $_m, PREG_SET_ORDER);
		foreach($_m as $_l) {  // $_l[1] = language tag, [2] = quality
			if (!isset($_l[2])) $_l[2] = 1;  // Default quality to 1
			if ($_l[2] > 0 && $_l[2] <= 1 && isset($availableLanguages[$_l[1]])) {
				// Build up array of (quality => language_file)
				$_acceptLang[$_l[2]] = $availableLanguages[$_l[1]];
			}
		}
		unset($_m);
		unset($_l);
		if (isset($_acceptLang)) {
			// Sort acceptable languages by quality
			krsort($_acceptLang, SORT_NUMERIC);
			$_language = reset($_acceptLang);
			unset($_acceptLang);
		}
	}

	// 4. Otherwise resort to the default set in the config file
	if (!isset($_language) && $conf['default_lang'] != 'auto' && isset($appLangFiles[$conf['default_lang']])) {
		$_language = $conf['default_lang'];
	}

	// Import the language file
	if (isset($_language)) {
		include("./lang/recoded/{$_language}.php");
		$_SESSION['webdbLanguage'] = $_language;
	}

	// Check for config file version mismatch
	if (!isset($conf['version']) || $conf['base_version'] > $conf['version']) {
		echo $lang['strbadconfig'];
		exit;
	}
	
	// Check database support is properly compiled in
	if (!function_exists('pg_connect')) {
		echo $lang['strnotloaded'];
		exit;
	}

	// Create data accessor object, if necessary
	if (!isset($_no_db_connection)) {
		if (!isset($_REQUEST['server'])) {
			die('No server supplied!');
			# TODO: nice error
		}
		$_server_info = $misc->getServerInfo();

		// Redirect to the login form if not logged in
		if (!isset($_server_info['username'])) {
			include('./login.php');
			exit;
		}

		// Connect to the current database, or if one is not specified
		// then connect to the default database.
		if (isset($_REQUEST['database']))
			$_curr_db = $_REQUEST['database'];
		else
			$_curr_db = $_server_info['defaultdb'];

		include_once('./classes/database/Connection.php');
		
		// Connect to database and set the global $data variable
		$data = $misc->getDatabaseAccessor($_curr_db);

		// If schema is defined and database supports schemas, then set the 
		// schema explicitly.
		if (isset($_REQUEST['database']) && isset($_REQUEST['schema']) && $data->hasSchemas()) {
			$status = $data->setSchema($_REQUEST['schema']);
			if ($status != 0) {
				echo $lang['strbadschema'];
				exit;
			}
		}

		// Get database encoding
		$dbEncoding = $data->getDatabaseEncoding();
		
		// Set client encoding to database encoding
		if ($dbEncoding != '') {
			// Explicitly change client encoding if it's different to server encoding.
			if (function_exists('pg_client_encoding'))
				$currEncoding = pg_client_encoding($data->conn->_connectionID);
			elseif (function_exists('pg_clientencoding'))
				$currEncoding = pg_clientencoding($data->conn->_connectionID);
			else
				$currEncoding = null;
				
			if ($currEncoding != $dbEncoding) {
				$status = $data->setClientEncoding($dbEncoding);
				if ($status != 0 && $status != -99) {
					echo $lang['strbadencoding'];
					exit;
				}
			}
					
			// Override $lang['appcharset']
			if (isset($data->codemap[$dbEncoding]))
				$lang['appcharset'] = $data->codemap[$dbEncoding];
			else
				$lang['appcharset'] = $dbEncoding;
		}
		
		// Load Slony if required		
		if ($_server_info['slony_support']) {
			include('./classes/plugins/Slony.php');
			$slony = new Slony();
		}
	}

?>
