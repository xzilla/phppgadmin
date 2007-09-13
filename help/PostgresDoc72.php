<?php

/**
 * Help links for PostgreSQL 7.2 documentation
 *
 * $Id: PostgresDoc72.php,v 1.5 2007/09/13 14:53:41 ioguix Exp $
 */

include('./help/PostgresDoc71.php');

# TODO: Check and fix links for 7.2

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.2');

$this->help_page['pg.admin.analyze'] = 'sql-analyze.html';

$this->help_page['pg.aggregate'][1] = 'tutorial-agg.html';

$this->help_page['pg.view.alter'] = array('sql-createview.html','sql-altertable.html');
?>
