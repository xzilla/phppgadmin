<?php

	/**
	 * Bottom bar
	 *
	 * $Id: bottombar.php,v 1.3 2003/12/17 09:11:32 chriskl Exp $
	 */	

	// Include application functions (no db conn)
	$_no_db_connection = true;
        include_once('./libraries/lib.inc.php');

	$misc->printHeader();
	$misc->printBody('bottombar');
	$misc->printFooter();
?>
