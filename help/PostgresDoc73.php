<?php

/**
 * Help links for PostgreSQL 7.3 documentation
 *
 * $Id: PostgresDoc73.php,v 1.3 2005/02/16 10:27:44 jollytoad Exp $
 */

include('./help/PostgresDoc72.php');

# TODO: Check and fix links for 7.3

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.3');

$this->help_page['pg.database.create'][1] = 'manage-ag-createdb.html';

?>
