<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.4 2003/03/17 05:20:30 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $lang['strintro'] ?></p>

<?php
	$misc->printFooter();
?>
