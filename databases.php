<?php

	/**
	 * List databases in a server
	 * @param $webdbServerID The ID of the current server
	 *
	 * $Id: databases.php,v 1.3 2003/03/01 00:53:51 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$misc->printHeader($strDatabases);
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $appIntro ?></p>

<?php
	$misc->printFooter();
?>
