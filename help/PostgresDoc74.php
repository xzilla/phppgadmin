<?php

/**
 * Help links for PostgreSQL 7.4 documentation
 *
 * $Id: PostgresDoc74.php,v 1.1 2004/09/07 13:39:41 jollytoad Exp $
 */
 
include('./help/PostgresDocLinks.php');

$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2115'; $this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2124';
$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1599';
$this->help_page['pg.domain'] = 'extend-type-system.html#AEN28657';
$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1570';
$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2131';
$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2140';
$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN1972';
$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN1950';
$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1895';

$this->help_base = 'http://www.postgresql.org/docs/7.4/interactive/';

?>
