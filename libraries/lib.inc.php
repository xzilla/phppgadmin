<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.92.2.3 2005/03/02 09:47:40 jollytoad Exp $
	 */
	include_once('decorator.inc.php');
	
	// Set error reporting level to max
	error_reporting(E_ALL);

	// Application name 
	$appName = 'phpPgAdmin';

	// Application version
	$appVersion = '3.6-dev';

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
	$conf['base_version'] = 14;

	// List of available language files.  Remember to update login.php
	// when you update this list.
	$appLangFiles = array(
		'afrikaans' => 'Afrikaans',
		'arabic' => '&#1593;&#1585;&#1576;&#1610;',
		'chinese-tr' => '&#32321;&#39636;&#20013;&#25991;',
		'chinese-sim' => '&#31616;&#20307;&#20013;&#25991;',
		'czech' => '&#268;esky',
		'danish' => 'Danish',
		'dutch' => 'Nederlands',
		'english' => 'English',
		'french' => 'Fran&ccedil;ais',
		'german' => 'Deutsch',
		'hebrew' => 'Hebrew',
		'italian' => 'Italiano',
		'japanese' => '&#26085;&#26412;&#35486;',
		'hungarian' => 'Magyar',
		'mongol' => 'Mongolian',
		'polish' => 'Polski',
		'portuguese-br' => 'Portugu&ecirc;s-Brasileiro',
		'romanian' => 'Rom&acirc;n&#259;',
		'russian' => '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;',
		'slovak' => 'Slovensky',
		'swedish' => 'Svenska',
		'spanish' => 'Espa&ntilde;ol',
		'turkish' => 'T&uuml;rk&ccedil;e',
		'ukrainian' => '&#1059;&#1082;&#1088;&#1072;&#9558;&#1085;&#1089;&#1100;&#1082;&#1072;'
	);

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
	
	if (isset($_REQUEST['language'])) {
		$_language = strtolower($_REQUEST['language']);
		if (isset($appLangFiles[$_language])) {
			$_SESSION['webdbLanguage'] = $_language;
		}
	}
	
	// If login action is set, then set session variables
	if (isset($_POST['loginServer']) && isset($_POST['loginUsername']) && 
		isset($_POST['loginPassword'])) {
		
		$_server_info = $misc->getServerInfo($_POST['loginServer']);
		
		$_server_info['username'] = $_POST['loginUsername'];
		$_server_info['password'] = $_POST['loginPassword'];
		
		$misc->setServerInfo(null, $_server_info, $_POST['loginServer']);
	}

	// Import language file
	if (isset($_SESSION['webdbLanguage']))
		include("./lang/recoded/{$_SESSION['webdbLanguage']}.php");

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
		$data =& $misc->getDatabaseAccessor($_curr_db);

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
			$status = $data->setClientEncoding($dbEncoding);
			if ($status != 0 && $status != -99) {
				echo $lang['strbadencoding'];
				exit;
			}
		
			// Override $lang['appcharset']
			if (isset($data->codemap[$dbEncoding]))
				$lang['appcharset'] = $data->codemap[$dbEncoding];
			else
				$lang['appcharset'] = $dbEncoding;
		}
	}

?>
