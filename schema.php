<?php

	/**
	 * Display properties of a schema
	 *
	 * $Id: schema.php,v 1.6 2003/08/01 03:59:15 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show schema properties
	 */
	function doDefault($msg = '') {
		global $misc, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strschemas']}: ", 
			$misc->printVal($_REQUEST['schema']), "</h2>\n";
		
		echo "<ul>\n";
		echo "<li><a href=\"tables.php?{$misc->href}\">{$lang['strtables']}</a></li>\n";
		echo "<li><a href=\"views.php?{$misc->href}\">{$lang['strviews']}</a></li>\n";
		echo "<li><a href=\"sequences.php?{$misc->href}\">{$lang['strsequences']}</a></li>\n";
		echo "<li><a href=\"functions.php?{$misc->href}\">{$lang['strfunctions']}</a></li>\n";
		echo "<li><a href=\"domains.php?{$misc->href}\">{$lang['strdomains']}</a></li>\n";
		echo "<li><a href=\"types.php?{$misc->href}\">{$lang['strtypes']}</a></li>\n";
		echo "</ul>\n";
	}

	$misc->printHeader($lang['strschema'] . ' - ' . $_REQUEST['schema']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}

	$misc->printFooter();

?>
