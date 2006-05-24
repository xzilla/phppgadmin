<?php

/**
 * Help links for PostgreSQL 7.3 documentation
 *
 * $Id: PostgresDoc73.php,v 1.5 2006/05/24 04:53:40 chriskl Exp $
 */

include('./help/PostgresDoc72.php');

# TODO: Check and fix links for 7.3

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.3');

$this->help_page['pg.database.alter'] = 'sql-alterdatabase.html';
$this->help_page['pg.database.create'][1] = 'manage-ag-createdb.html';

$this->help_page['pg.locks'] = 'view-pg-locks.html';

?>
