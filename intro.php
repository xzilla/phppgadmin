<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.5 2003/04/18 08:43:41 chriskl Exp $
	 */

	// Include application functions (no db conn)
	$_no_db_connection = true;
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $lang['strintro'] ?></p>

<?php
	$misc->printFooter();
?>
