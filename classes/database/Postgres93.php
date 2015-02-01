<?php

/**
 * PostgreSQL 9.3 support
 *
 */

include_once('./classes/database/Postgres.php');

class Postgres93 extends Postgres {

	var $major_version = 9.3;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres93($conn) {
		$this->Postgres($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc93.php');
		return $this->help_page;
	}

}
?>
