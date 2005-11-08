<?php

/**
 * PostgreSQL 8.2 support
 *
 * $Id: Postgres82.php,v 1.1 2005/11/08 02:24:31 chriskl Exp $
 */

include_once('./classes/database/Postgres81.php');

class Postgres82 extends Postgres81 {

	var $major_version = 8.2;
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres82($conn) {
		$this->Postgres81($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc82.php');
		return $this->help_page;
	}

}

?>
