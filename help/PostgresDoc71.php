<?php

/**
 * Help links for PostgreSQL 7.1 documentation
 *
 * $Id: PostgresDoc71.php,v 1.4 2005/02/16 10:27:44 jollytoad Exp $
 */

include('./help/PostgresDoc70.php');

# TODO: Check and fix links for 7.1

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.1');

$this->help_page['pg.admin.analyze'] = 'sql-vacuum.html';
$this->help_page['pg.admin.vacuum'] = 'sql-vacuum.html';

$this->help_page['pg.aggregate'] = array('xaggr.html', 'query-agg.html', 'functions-aggregate.html', 'sql-expressions.html#SYNTAX-AGGREGATES');
$this->help_page['pg.aggregate.create'] = 'sql-createaggregate.html';
$this->help_page['pg.aggregate.drop'] = 'sql-dropaggregate.html';

$this->help_page['pg.database'] = 'managing-databases.html';
$this->help_page['pg.database.create'] = array('sql-createdatabase.html', 'managing-databases.html#MANAGE-AG-CREATEDB');
$this->help_page['pg.database.drop'] = array('sql-dropdatabase.html', 'manage-ag-dropdb.html');

$this->help_page['pg.server'] = 'admin.html';

$this->help_page['pg.user'] = 'user-manag.html';

?>
