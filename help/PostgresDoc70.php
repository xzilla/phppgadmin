<?php

/**
 * Help links for PostgreSQL 7.0 documentation
 *
 * $Id: PostgresDoc70.php,v 1.4 2005/02/16 10:27:44 jollytoad Exp $
 */

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7');

# TODO: Check and fix links for >= 7.0 and <= 7.3 (those in the following array)

$this->help_page = array(
	'pg.cast'			=> array('sql-expressions.html#SQL-SYNTAX-TYPE-CASTS','sql-createcast.html'),
	'pg.cast.create'		=> 'sql-createcast.html',
	'pg.cast.drop'			=> 'sql-dropcast.html',

	'pg.column.add'			=> array('ddl-alter.html#AEN2115', 'sql-altertable.html'),
	'pg.column.alter'		=> array('ddl-alter.html','sql-altertable.html'),
	'pg.column.drop'		=> array('ddl-alter.html#AEN2124', 'sql-altertable.html'),

	'pg.constraint'			=> 'ddl-constraints.html',
	'pg.constraint.add'		=> 'ddl-alter.html#AEN2131',
	'pg.constraint.check'		=> 'ddl-constraints.html#AEN1895',
	'pg.constraint.drop'		=> 'ddl-alter.html#AEN2140',
	'pg.constraint.foreign_key'	=> 'ddl-constraints.html#DDL-CONSTRAINTS-FK',
	'pg.constraint.primary_key'	=> 'ddl-constraints.html#AEN1972',
	'pg.constraint.unique_key'	=> 'ddl-constraints.html#AEN1950',

	'pg.conversion'			=> 'multibyte.html',
	'pg.conversion.alter'		=> 'sql-alterconversion.html',
	'pg.conversion.create'		=> 'sql-createconversion.html',
	'pg.conversion.drop'		=> 'sql-dropconversion.html',

	'pg.domain'			=> 'extend-type-system.html#AEN28657',
	'pg.domain.alter'		=> 'sql-alterdomain.html',
	'pg.domain.create'		=> 'sql-createdomain.html',
	'pg.domain.drop'		=> 'sql-dropdomain.html',

	'pg.function'			=> array('xfunc.html', 'functions.html', 'sql-expressions.html#AEN1599'),
	'pg.function.alter'		=> 'sql-alterfunction.html',
	'pg.function.create'		=> 'sql-createfunction.html',
	'pg.function.create.c'		=> array('xfunc-c.html','sql-createfunction.html'),
	'pg.function.create.internal'	=> array('xfunc-internal.html','sql-createfunction.html'),
	'pg.function.create.pl'		=> array('xfunc-sql.html','xfunc-pl.html','sql-createfunction.html'),
	'pg.function.drop'		=> 'sql-dropfunction.html',

	'pg.group'			=> 'groups.html',
	'pg.group.alter'		=> array('sql-altergroup.html','groups.html'),
	'pg.group.create'		=> 'sql-creategroup.html',
	'pg.group.drop'			=> 'sql-dropgroup.html',

	'pg.index'			=> 'indexes.html',
	'pg.index.cluster'		=> 'sql-cluster.html',
	'pg.index.drop'			=> 'sql-dropindex.html',
	'pg.index.create'		=> 'sql-createindex.html',
	'pg.index.reindex'		=> 'sql-reindex.html',

	'pg.language'			=> 'xplang.html',
	'pg.language.alter'		=> 'sql-alterlanguage.html',
	'pg.language.create'		=> 'sql-createlanguage.html',
	'pg.language.drop'		=> 'sql-droplanguage.html',

	'pg.opclass'			=> 'indexes-opclass.html',
	'pg.opclass.alter'		=> 'sql-alteropclass.html',
	'pg.opclass.create'		=> 'sql-createopclass.html',
	'pg.opclass.drop'		=> 'sql-dropopclass.html',

	'pg.operator'			=> array('xoper.html', 'functions.html', 'sql-expressions.html#AEN1570'),
	'pg.operator.alter'		=> 'sql-alteroperator.html',
	'pg.operator.create'		=> 'sql-createoperator.html',
	'pg.operator.drop'		=> 'sql-dropoperator.html',

	'pg.pl'				=> 'xplang.html',
	'pg.pl.plperl'			=> 'plperl.html',
	'pg.pl.plpgsql'			=> 'plpgsql.html',
	'pg.pl.plpython'		=> 'plpython.html',
	'pg.pl.pltcl'			=> 'pltcl.html',

	'pg.privilege'			=> array('privileges.html','ddl-priv.html'),
	'pg.privilege.grant'		=> 'sql-grant.html',
	'pg.privilege.revoke'		=> 'sql-revoke.html',

	'pg.process'			=> 'monitoring.html',

	'pg.rule'			=> 'rules.html',
	'pg.rule.create'		=> 'sql-createrule.html',
	'pg.rule.drop'			=> 'sql-droprule.html',

	'pg.schema'			=> 'ddl-schemas.html',
	'pg.schema.alter'		=> 'sql-alterschema.html',
	'pg.schema.create'		=> array( 'sql-createschema.html','ddl-schemas.html#DDL-SCHEMAS-CREATE'),
	'pg.schema.drop'		=> 'sql-dropschema.html',
	'pg.schema.search_path'		=> 'ddl-schemas.html#DDL-SCHEMAS-PATH',
	
	'pg.sequence'			=> 'functions-sequence.html',
	'pg.sequence.alter'		=> 'sql-altersequence.html',
	'pg.sequence.create'		=> 'sql-createsequence.html',
	'pg.sequence.drop'		=> 'sql-dropsequence.html',

	'pg.sql'			=> array('sql.html','sql-commands.html'),
	'pg.sql.insert'			=> 'sql-insert.html',
	'pg.sql.select'			=> 'sql-select.html',
	'pg.sql.update'			=> 'sql-update.html',

	'pg.table'			=> 'ddl.html#DDL-BASICS',
	'pg.table.alter'		=> 'sql-altertable.html',
	'pg.table.create'		=> 'sql-createtable.html',
	'pg.table.drop'			=> 'sql-droptable.html',
	'pg.table.empty'		=> 'sql-truncate.html',

	'pg.tablespace'			=> 'manage-ag-tablespaces.html',
	'pg.tablespace.alter'		=> 'sql-altertablespace.html',
	'pg.tablespace.create'		=> 'sql-createtablespace.html',
	'pg.tablespace.drop'		=> 'sql-droptablespace.html',

	'pg.trigger'			=> 'triggers.html',
	'pg.trigger.alter'		=> 'sql-altertrigger.html',
	'pg.trigger.create'		=> 'sql-createtrigger.html',
	'pg.trigger.drop'		=> 'sql-droptrigger.html',

	'pg.type'			=> array('xtypes.html','datatype.html','extend-type-system.html'),
	'pg.type.alter'			=> 'sql-altertype.html',
	'pg.type.create'		=> 'sql-createtype.html',
	'pg.type.drop'			=> 'sql-droptype.html',

	'pg.user.alter'			=> array('sql-alteruser.html','user-attributes.html'),
	'pg.user.create'		=> array('sql-createuser.html','user-manag.html#DATABASE-USERS'),
	'pg.user.drop'			=> array('sql-dropuser.html','user-manag.html#DATABASE-USERS'),

	'pg.variable'			=> 'runtime-config.html',

	'pg.view'			=> 'tutorial-views.html',
	'pg.view.alter'			=> 'sql-createview.html',
	'pg.view.create'		=> 'sql-createview.html',
	'pg.view.drop'			=> 'sql-dropview.html',
);

# correct links follow:

$this->help_page['pg.admin.analyze'] = 'sql-vacuum.htm';
$this->help_page['pg.admin.vacuum'] = 'sql-vacuum.htm';

$this->help_page['pg.aggregate'] = array('xaggr.htm', 'query27856.htm', 'syntax658.htm');
$this->help_page['pg.aggregate.create'] = 'sql-createaggregate.htm';
$this->help_page['pg.aggregate.drop'] = 'sql-dropaggregate.htm';

$this->help_page['pg.database'] = 'manage-ag.htm';
$this->help_page['pg.database.create'] = array('sql-createdatabase.htm', 'manage-ag.htm#AEN17907');
$this->help_page['pg.database.drop'] = array('sql-dropdatabase.htm', 'manage-ag17956.htm');

$this->help_page['pg.server'] = 'part-admin.htm';

$this->help_page['pg.user'] = 'newuser.htm';

?>
