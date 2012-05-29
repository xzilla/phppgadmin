<?php

/**
 * PostgreSQL 9.1 support
 *
 * $Id: Postgres82.php,v 1.10 2007/12/28 16:21:25 ioguix Exp $
 */

include_once('./classes/database/Postgres.php');

class Postgres91 extends Postgres {

	var $major_version = 9.1;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres91($conn) {
		$this->Postgres($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc91.php');
		return $this->help_page;
	}

	// Capabilities

}
?>
