<?php

	/**
	 * List databases in a server
	 * @param $webdbServerID The ID of the current server
	 *
	 * $Id: databases.php,v 1.5 2003/12/17 09:11:32 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$misc->printHeader($lang['strdatabases']);
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $appIntro ?></p>

<?php
	$misc->printFooter();
?>
