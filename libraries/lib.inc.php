<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.77.2.1 2004/06/06 06:42:07 chriskl Exp $
	 */
	
	// Set error reporting level to max
	error_reporting(E_ALL);

	// Application name 
	$appName = 'phpPgAdmin';

	// Application version
	$appVersion = '3.4.1';


	// Check to see if the configuration file exists, if not, explain
	if (file_exists('conf/config.inc.php')) {
		$conf = array();
		include('./conf/config.inc.php');
	}
	else {
		echo "Configuration error: Copy conf/config.inc.php-dist to conf/config.inc.php and edit appropriately.";
		exit;
	}

	// Configuration file version.  If this is greater than that in config.inc.php, then
	// the app will refuse to run.  This and $conf['version'] should be incremented whenever
	// backwards incompatible changes are made to config.inc.php-dist.
	$conf['base_version'] = 13;

	// List of available language files
	$appLangFiles = array(
		'afrikaans' => 'Afrikaans',
		'chinese-tr' => '&#32321;&#39636;&#20013;&#25991;',
		'chinese-sim' => '&#31616;&#20307;&#20013;&#25991;',
		'czech' => '&#268;esky',
		'dutch' => 'Nederlands',
		'english' => 'English',
		'french' => 'Fran&ccedil;ais',
		'german' => 'Deutsch',
		'italian' => 'Italiano',
		'japanese' => '&#26085;&#26412;&#35486;',
		'hungarian' => 'Magyar',
		'polish' => 'Polski',
		'portuguese-br' => 'Portugu&ecirc;s-Brasileiro',
		'russian' => '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;',
		'slovak' => 'Slovensky',
		'swedish' => 'Svenska',
		'spanish' => 'Espa&ntilde;ol',
		'turkish' => 'T&uuml;rk&ccedil;e'
	);

	// Language settings.  Always include english.php, since it's the master
	// language file, and then overwrite it with the user-specified language if
	// one has not been selected yet.
	if (!isset($conf['default_lang'])) $conf['default_lang'] = 'english';
	$lang = array();
	include_once('./lang/recoded/english.php');
	// Include default language over the top - we really should try to avoid this
	// in the case when the user has chosen a language.
	include_once("./lang/recoded/" . strtolower($conf['default_lang']) . ".php");

	// Check for config file version mismatch
	if (!isset($conf['version']) || $conf['base_version'] > $conf['version']) {
		echo $lang['strbadconfig'];
		exit;
	}

	// Create Misc class references
	include_once('./classes/Misc.php');
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
	if (isset($_POST['formServer']) && isset($_POST['formUsername']) && 
		isset($_POST['formPassword']) && isset($_POST['formLanguage'])) {
		$_SESSION['webdbServerID'] = $_POST['formServer'];
		$_SESSION['webdbUsername'] = $_POST['formUsername'];
		$_SESSION['webdbPassword'] = $_POST['formPassword'];
		$_SESSION['webdbLanguage'] = $_POST['formLanguage'];
	}

	// If the logged in settings aren't present, put up the login screen.
	if (!isset($_SESSION['webdbUsername'])
			||	!isset($_SESSION['webdbPassword'])
			||	!isset($_SESSION['webdbServerID'])
			||	!isset($_SESSION['webdbLanguage'])
			||	!isset($conf['servers'][$_SESSION['webdbServerID']])) {
		include('./login.php');
		exit;
	}

	// If extra login check fails, back to the login screen
	$_allowed = $misc->checkExtraSecurity();
	if (!$_allowed) {
		include('./login.php');
		exit;
	}

	// Import language file
	include("./lang/recoded/" . strtolower($_SESSION['webdbLanguage']) . ".php");

	// Check database support is properly compiled in
	if (!function_exists('pg_connect')) {
		echo $lang['strnotloaded'];
		exit;
	}

	// Create data accessor object, if necessary
	if (!isset($_no_db_connection)) {
		// Connect to the current database, or if one is not specified
		// then connect to the default database.
		if (isset($_REQUEST['database']))
			$_curr_db = $_REQUEST['database'];
		else
			$_curr_db = $conf['servers'][$_SESSION['webdbServerID']]['defaultdb'];

		// Create the connection object and make the connection
		include_once('./classes/database/Connection.php');
		$_connection = new Connection(
			$conf['servers'][$_SESSION['webdbServerID']]['host'],
			$conf['servers'][$_SESSION['webdbServerID']]['port'],
			$_SESSION['webdbUsername'],
			$_SESSION['webdbPassword'],
			$_curr_db
		);

		// Get the name of the database driver we need to use.  The description
		// of the server is returned and placed into the conf array.
		$_type = $_connection->getDriver($conf['description']);
		// XXX: NEED TO CHECK RETURN STATUS HERE

		// Create a database wrapper class for easy manipulation of the
		// connection.
		require_once('./classes/database/' . $_type . '.php');
		$data = new $_type($_connection->conn);

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
