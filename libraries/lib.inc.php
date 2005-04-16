<?php

	/**
	 * Function library read in upon startup
	 *
	 * $Id: lib.inc.php,v 1.88.2.4 2005/04/16 05:11:05 chriskl Exp $
	 */
	
	// Set error reporting level to max
	error_reporting(E_ALL);

	// Application name 
	$appName = 'phpPgAdmin';

	// Application version
	$appVersion = '3.5.3';

	// PostgreSQL and PHP minimum version
	$postgresqlMinVer = '7.0';
	$phpMinVer = '4.1';

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
	$conf['base_version'] = 13;

	// List of available language files
	$appLangFiles = array(
		'afrikaans' => 'Afrikaans',
		'arabic' => '&#1593;&#1585;&#1576;&#1610;',
		'chinese-tr' => '&#32321;&#39636;&#20013;&#25991;',
		'chinese-sim' => '&#31616;&#20307;&#20013;&#25991;',
		'czech' => '&#268;esky',
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
		'portuguese-pt' => 'Portugu&ecirc;s-Portugu&ecirc;s',
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

	// Import language file
	include('./lang/recoded/' . strtolower($_SESSION['webdbLanguage']) . '.php');

	// If extra login check fails, back to the login screen
	$_allowed = $misc->checkExtraSecurity();
	if (!$_allowed) {
		include('./login.php');
		exit;
	}

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
		if ($_type === null) {
			printf($lang['strpostgresqlversionnotsupported'], $postgresqlMinVer);
			exit;
		}

		// Create a database wrapper class for easy manipulation of the
		// connection.
		require_once('./classes/database/' . $_type . '.php');
		$data = new $_type($_connection->conn);
		$data->platform = $_connection->platform;

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
