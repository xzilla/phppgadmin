<?php

/**
 * Help links for PostgreSQL 8.1 documentation
 *
 * $Id: PostgresDoc81.php,v 1.2 2006/04/21 03:31:26 chriskl Exp $
 */

include('./help/PostgresDoc80.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.1');

$this->help_page['pg.role'] = 'user-manag.html';
$this->help_page['pg.role.create'] = array('sql-createrole.html','user-manag.html#DATABASE-ROLES');
$this->help_page['pg.role.alter'] = array('sql-alterrole.html','user-attributes.html');
$this->help_page['pg.role.drop'] = array('sql-droprole.html','user-manag.html#DATABASE-ROLES');

?>
