<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.2 2003/02/07 17:34:34 xzilla Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $strIntro ?></p>

<?php
	$misc->printFooter();
?>
