<?php

/**
 * Overrides default ADODB error handler to provide nicer error handling.
 *
 * $Id: errorhandler.inc.php,v 1.5 2003/01/04 07:08:03 chriskl Exp $
 */

define('ADODB_ERROR_HANDLER','Error_Handler');

/**
 * Default Error Handler. This will be called with the following params
 *
 * @param $dbms		the RDBMS you are connecting to
 * @param $fn		the name of the calling function (in uppercase)
 * @param $errno		the native error number from the database
 * @param $errmsg	the native error msg from the database
 * @param $p1		$fn specific parameter - see below
 * @param $P2		$fn specific parameter - see below
 */
function Error_Handler($dbms, $fn, $errno, $errmsg, $p1=false, $p2=false)
{
	global $strSQLError, $strInStatement, $strLogin, $strLoginFailed;
	global $misc, $appName;

	switch($fn) {
	case 'EXECUTE':
		$sql = $p1;
		$inputparams = $p2;

		$s = "<p><b>{$strSQLError}</b><br>" . nl2br(htmlspecialchars($errmsg)) . "</p>
		      <p><b>{$strInStatement}</b><br>" . nl2br(htmlspecialchars($sql)) . "</p>
		";
		echo "<table class=\"error\" cellpadding=\"5\"><tr><td>{$s}</td></tr></table>\n";

		break;

	case 'PCONNECT':
	case 'CONNECT':
		include('../conf/config.inc.php');
		$_failed = true;
		// Theme
		echo "<style type=\"text/css\">\n<!--\n";
		include("../themes/{$guiTheme}/global.css");
		echo "\n-->\n</style>\n";
		include($appBase . '/login.php');
		exit;
		break;
	default:
		$s = "$dbms error: [$errno: $errmsg] in $fn($p1, $p2)\n";
		echo "<table class=\"error\" cellpadding=\"5\"><tr><td>{$s}</td></tr></table>\n";
		break;
	}
	/*
	* Log connection error somewhere
	*	0 message is sent to PHP's system logger, using the Operating System's system
	*		logging mechanism or a file, depending on what the error_log configuration
	*		directive is set to.
	*	1 message is sent by email to the address in the destination parameter.
	*		This is the only message type where the fourth parameter, extra_headers is used.
	*		This message type uses the same internal function as mail() does.
	*	2 message is sent through the PHP debugging connection.
	*		This option is only available if remote debugging has been enabled.
	*		In this case, the destination parameter specifies the host name or IP address
	*		and optionally, port number, of the socket receiving the debug information.
	*	3 message is appended to the file destination
	*/
	if (defined('ADODB_ERROR_LOG_TYPE')) {
		$t = date('Y-m-d H:i:s');
		if (defined('ADODB_ERROR_LOG_DEST'))
			error_log("($t) $s", ADODB_ERROR_LOG_TYPE, ADODB_ERROR_LOG_DEST);
		else
			error_log("($t) $s", ADODB_ERROR_LOG_TYPE);
	}
}
?>
