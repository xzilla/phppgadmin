<?php

/**
 * PostgreSQL 7.5 support
 *
 * $Id: Postgres75.php,v 1.1 2003/11/09 08:29:33 chriskl Exp $
 */

include_once('classes/database/Postgres74.php');

class Postgres75 extends Postgres74 {

	// Last oid assigned to a system object
	var $_lastSystemOID = 17137;

	/**
	 * Constructor
	 * @param $host The hostname to connect to
	 * @param $post The port number to connect to
	 * @param $database The database name to connect to
	 * @param $user The user to connect as
	 * @param $password The password to use
	 */
	function Postgres75($host, $port, $database, $user, $password) {
		$this->Postgres74($host, $port, $database, $user, $password);
	}

}
