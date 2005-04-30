<?php

/**
 * Help links for PostgreSQL 7.3 documentation
 *
 * $Id: PostgresDoc73.php,v 1.4 2005/04/30 18:02:01 soranzo Exp $
 */

include('./help/PostgresDoc72.php');

# TODO: Check and fix links for 7.3

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.3');

$this->help_page['pg.database.alter'] = 'sql-alterdatabase.html';
$this->help_page['pg.database.create'][1] = 'manage-ag-createdb.html';

?>
