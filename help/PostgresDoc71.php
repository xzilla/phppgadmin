<?php

/**
 * Help links for PostgreSQL 7.1 documentation
 *
 * $Id: PostgresDoc71.php,v 1.2 2004/11/07 12:27:14 soranzo Exp $
 */

include('./help/PostgresDoc70.php');

# TODO: Check and fix links for 7.1

$this->help_base = 'http://www.postgresql.org/docs/7.1/interactive/';

$this->help_page['pg.database'] = 'managing-databases.html';
$this->help_page['pg.database.create'] = array('sql-createdatabase.html', 'managing-databases.html#MANAGE-AG-CREATEDB');
$this->help_page['pg.database.drop'] = array('sql-dropdatabase.html', 'manage-ag-dropdb.html');

$this->help_page['pg.server'] = 'admin.html';

$this->help_page['pg.user'] = 'user-manag.html';

?>
