<?php

	/**
	 * List databases in a server
	 * @param $webdbServerID The ID of the current server
	 *
	 * $Id: databases.php,v 1.2 2003/02/07 17:34:34 xzilla Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$misc->printHeader($strDatabases);
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $appIntro ?></p>

<?php
	$misc->printFooter();
?>
