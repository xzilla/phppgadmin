<?php

/**
 * PostgreSQL 7.5 support
 *
 * $Id: Postgres75.php,v 1.3 2003/12/17 09:11:32 chriskl Exp $
 */

include_once('./classes/database/Postgres74.php');

class Postgres75 extends Postgres74 {

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres75($conn) {
		$this->Postgres74($conn);
	}

}
