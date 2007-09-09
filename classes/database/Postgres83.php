<?php

/**
 * PostgreSQL 8.3 support
 *
 * $Id: Postgres83.php,v 1.2 2007/09/09 20:20:31 ioguix Exp $
 */

include_once('./classes/database/Postgres82.php');

class Postgres83 extends Postgres82 {

	var $major_version = 8.3;
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231; // need to confirm this once we get to beta!!!

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres83($conn) {
		$this->Postgres82($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc83.php');
		return $this->help_page;
	}

	function hasCreateTableLikeWithIndexes() {return true;}
}
?>
