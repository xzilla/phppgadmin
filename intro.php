<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.3 2003/03/01 00:53:51 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $strIntro ?></p>

<?php
	$misc->printFooter();
?>
