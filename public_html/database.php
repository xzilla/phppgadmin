<?php

	/**
	 * List database controls
	 *
	 * $Id: database.php,v 1.6 2003/01/04 07:08:03 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$misc->printHeader();
?>

<h2><?php echo $appName ?> :: <?php echo $_GET['database'] ?></h2>

<?php
	$misc->printFooter();
?>
