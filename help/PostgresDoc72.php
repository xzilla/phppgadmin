<?php

/**
 * Help links for PostgreSQL 7.2 documentation
 *
 * $Id: PostgresDoc72.php,v 1.3 2004/11/15 17:25:03 soranzo Exp $
 */

include('./help/PostgresDoc71.php');

# TODO: Check and fix links for 7.2

$this->help_base = 'http://www.postgresql.org/docs/7.2/interactive/';

$this->help_page['pg.admin.analyze'] = 'sql-analyze.html';

$this->help_page['pg.aggregate'][1] = 'tutorial-agg.html';

?>
