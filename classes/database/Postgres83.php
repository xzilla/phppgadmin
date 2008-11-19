<?php

/**
 * PostgreSQL 8.2 support
 *
 * $Id: Postgres82.php,v 1.10 2007/12/28 16:21:25 ioguix Exp $
 */

include_once('./classes/database/Postgres.php');

class Postgres83 extends Postgres {

	var $major_version = 8.3;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres83($conn) {
		$this->Postgres($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc83.php');
		return $this->help_page;
	}
}

?>
