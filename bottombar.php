<?php

	/**
	 * Bottom bar
	 *
	 * $Id: bottombar.php,v 1.2 2003/12/10 16:03:29 chriskl Exp $
	 */	

	// Include application functions (no db conn)
	$_no_db_connection = true;
        include_once('libraries/lib.inc.php');

	$misc->printHeader();
	$misc->printBody('bottombar');
	$misc->printFooter();
?>
