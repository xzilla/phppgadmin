<?php

/**
 * Help links for PostgreSQL 8.0 documentation
 *
 * $Id: PostgresDoc80.php,v 1.2.2.1 2004/11/30 01:45:59 chriskl Exp $
 */

include('./help/PostgresDoc74.php');

$this->help_base = 'http://developer.postgresql.org/docs/postgres/';

$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2217';
$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2226';

$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2217';
$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1978';
$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2226';
$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2055';
$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2033';

$this->help_page['pg.domain'] = 'extend-type-system.html#AEN27940';

$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1652';

$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1623';

?>
