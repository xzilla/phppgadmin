<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.10 2003/01/04 07:08:03 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	$misc->printHeader();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $strIntro ?></p>

<?php
	$misc->printFooter();
?>
