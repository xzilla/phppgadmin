<?php

/**
 * Help links for PostgreSQL 7.4 documentation
 *
 * $Id: PostgresDoc74.php,v 1.4 2005/02/16 10:27:44 jollytoad Exp $
 */
 
include('./help/PostgresDoc73.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.4');

$this->help_page['pg.aggregate.alter'] = 'sql-alteraggregate.html';

?>
