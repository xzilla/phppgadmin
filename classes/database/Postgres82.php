<?php

/**
 * PostgreSQL 8.2 support
 *
 * $Id: Postgres82.php,v 1.2 2006/11/01 00:50:17 xzilla Exp $
 */

include_once('./classes/database/Postgres81.php');

class Postgres82 extends Postgres81 {

	var $major_version = 8.2;
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231;

  	// List of all legal privileges that can be applied to different types
  	// of objects.
  	var $privlist = array(
  		'table' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
  		'view' => array('SELECT', 'INSERT', 'UPDATE', 'DELETE', 'RULE', 'REFERENCES', 'TRIGGER', 'ALL PRIVILEGES'),
  		'sequence' => array('SELECT', 'UPDATE', 'ALL PRIVILEGES'),
  		'database' => array('CREATE', 'TEMPORARY', 'CONNECT', 'ALL PRIVILEGES'),
  		'function' => array('EXECUTE', 'ALL PRIVILEGES'),
  		'language' => array('USAGE', 'ALL PRIVILEGES'),
  		'schema' => array('CREATE', 'USAGE', 'ALL PRIVILEGES'),
  		'tablespace' => array('CREATE', 'ALL PRIVILEGES')
  	);
  
  	// List of characters in acl lists and the privileges they
  	// refer to.
  	var $privmap = array(
  		'r' => 'SELECT',
  		'w' => 'UPDATE',
  		'a' => 'INSERT',
  		'd' => 'DELETE',
  		'R' => 'RULE',
  		'x' => 'REFERENCES',
  		't' => 'TRIGGER',
  		'X' => 'EXECUTE',
  		'U' => 'USAGE',
  		'C' => 'CREATE',
  		'T' => 'TEMPORARY',
  		'c' => 'CONNECT'
  	);	

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
