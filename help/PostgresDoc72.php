<?php

/**
 * Help links for PostgreSQL 7.2 documentation
 *
 * $Id: PostgresDoc72.php,v 1.4 2005/02/16 10:27:44 jollytoad Exp $
 */

include('./help/PostgresDoc71.php');

# TODO: Check and fix links for 7.2

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.2');

$this->help_page['pg.admin.analyze'] = 'sql-analyze.html';

$this->help_page['pg.aggregate'][1] = 'tutorial-agg.html';

?>
