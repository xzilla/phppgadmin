<?php

/**
 * Help links for PostgreSQL documention - master file.
 * Links are currently for the 8.0.0beta2 docs.
 *
 * $Id: PostgresDocLinks.php,v 1.1 2004/09/07 13:39:41 jollytoad Exp $
 */

$this->help_page = array(
	'pg.server'				=> 'admin.html',
	
	'pg.database'			=> 'managing-databases.html',
	'pg.database.create'	=> array('sql-createdatabase.html','manage-ag-createdb.html'),
	'pg.database.alter'		=> array('sql-alterdatabase.html'),
	'pg.database.drop'		=> array('sql-dropdatabase.html','manage-ag-dropdb.html'),
	
	'pg.user'				=> 'user-manag.html',
	'pg.user.alter'			=> array('sql-alteruser.html','user-attributes.html'),
	'pg.user.create'		=> array('sql-createuser.html','user-manag.html#DATABASE-USERS'),
	'pg.user.drop'			=> array('sql-dropuser.html','user-manag.html#DATABASE-USERS'),
	
	'pg.group'				=> 'groups.html',
	'pg.group.create'		=> 'sql-creategroup.html',
	'pg.group.alter'		=> array('sql-altergroup.html','groups.html'),
	'pg.group.drop'			=> 'sql-dropgroup.html',
	
	'pg.tablespace'			=> 'manage-ag-tablespaces.html',
	'pg.tablespace.create'	=> 'sql-createtablespace.html',
	'pg.tablespace.alter'	=> 'sql-altertablespace.html',
	'pg.tablespace.drop'	=> 'sql-droptablespace.html',
	
	'pg.schema'				=> 'ddl-schemas.html',
	'pg.schema.create'		=> array( 'sql-createschema.html','ddl-schemas.html#DDL-SCHEMAS-CREATE'),
	'pg.schema.alter'		=> 'sql-alterschema.html',
	'pg.schema.drop'		=> 'sql-dropschema.html',
	'pg.schema.search_path'	=> 'ddl-schemas.html#DDL-SCHEMAS-PATH',
	
	'pg.sql'				=> array('sql.html','sql-commands.html'),
	'pg.sql.select'			=> 'sql-select.html',
	'pg.sql.insert'			=> 'sql-insert.html',
	'pg.sql.update'			=> 'sql-update.html',
	
	'pg.variable'			=> 'runtime-config.html',
	
	'pg.process'			=> 'monitoring.html',
	
	'pg.privilege'			=> array('privileges.html','ddl-priv.html'),
	'pg.privilege.grant'	=> 'sql-grant.html',
	'pg.privilege.revoke'	=> 'sql-revoke.html',
	
	'pg.language'			=> 'xplang.html',
	'pg.language.create'	=> 'sql-createlanguage.html',
	'pg.language.alter'		=> 'sql-alterlanguage.html',
	'pg.language.drop'		=> 'sql-droplanguage.html',
	
	'pg.pl'					=> 'xplang.html',
	'pg.pl.plpgsql'			=> 'plpgsql.html',
	'pg.pl.pltcl'			=> 'pltcl.html',
	'pg.pl.plperl'			=> 'plperl.html',
	'pg.pl.plpython'		=> 'plpython.html',
	
	'pg.cast'				=> array('sql-expressions.html#SQL-SYNTAX-TYPE-CASTS','sql-createcast.html'),
	'pg.cast.create'		=> 'sql-createcast.html',
	'pg.cast.drop'			=> 'sql-dropcast.html',
	
	'pg.table'				=> 'ddl.html#DDL-BASICS',
	'pg.table.create'		=> 'sql-createtable.html',
	'pg.table.alter'		=> 'sql-altertable.html',
	'pg.table.drop'			=> 'sql-droptable.html',
	'pg.table.empty'		=> 'sql-truncate.html',
	
	'pg.column.add'			=> array('ddl-alter.html#AEN2217','sql-altertable.html'),
	'pg.column.alter'		=> array('ddl-alter.html','sql-altertable.html'),
	'pg.column.drop'		=> array('ddl-alter.html#AEN2226','sql-altertable.html'),
	
	'pg.view'				=> 'tutorial-views.html',
	'pg.view.create'		=> 'sql-createview.html',
	'pg.view.alter'			=> 'sql-createview.html',
	'pg.view.drop'			=> 'sql-dropview.html',
	
	'pg.sequence'			=> 'functions-sequence.html',
	'pg.sequence.create'	=> 'sql-createsequence.html',
	'pg.sequence.alter'		=> 'sql-altersequence.html',
	'pg.sequence.drop'		=> 'sql-dropsequence.html',
	
	'pg.function'			=> array('xfunc.html','functions.html','sql-expressions.html#AEN1652'),
	'pg.function.create'	=> 'sql-createfunction.html',
	'pg.function.create.c'	=> array('xfunc-c.html','sql-createfunction.html'),
	'pg.function.create.internal'	=> array('xfunc-internal.html','sql-createfunction.html'),
	'pg.function.create.pl'	=> array('xfunc-sql.html','xfunc-pl.html','sql-createfunction.html'),
	'pg.function.alter'		=> 'sql-alterfunction.html',
	'pg.function.drop'		=> 'sql-dropfunction.html',
	
	'pg.domain'				=> 'extend-type-system.html#AEN27940',
	'pg.domain.create'		=> 'sql-createdomain.html',
	'pg.domain.alter'		=> 'sql-alterdomain.html',
	'pg.domain.drop'		=> 'sql-dropdomain.html',
	
	'pg.aggregate'			=> array('xaggr.html','tutorial-agg.html','functions-aggregate.html','sql-expressions.html#SYNTAX-AGGREGATES'),
	'pg.aggregate.create'	=> 'sql-createaggregate.html',
	'pg.aggregate.alter'	=> 'sql-alteraggregate.html',
	'pg.aggregate.drop'		=> 'sql-dropaggregate.html',
	
	'pg.type'				=> array('xtypes.html','datatype.html','extend-type-system.html'),
	'pg.type.create'		=> 'sql-createtype.html',
	'pg.type.alter'			=> 'sql-altertype.html',
	'pg.type.drop'			=> 'sql-droptype.html',
	
	'pg.operator'			=> array('xoper.html','functions.html','sql-expressions.html#AEN1623'),
	'pg.operator.create'	=> 'sql-createoperator.html',
	'pg.operator.alter'		=> 'sql-alteroperator.html',
	'pg.operator.drop'		=> 'sql-dropoperator.html',
	
	'pg.opclass'			=> 'indexes-opclass.html',
	'pg.opclass.create'		=> 'sql-createopclass.html',
	'pg.opclass.alter'		=> 'sql-alteropclass.html',
	'pg.opclass.drop'		=> 'sql-dropopclass.html',
	
	'pg.conversion'			=> 'multibyte.html',
	'pg.conversion.create'	=> 'sql-createconversion.html',
	'pg.conversion.alter'	=> 'sql-alterconversion.html',
	'pg.conversion.drop'	=> 'sql-dropconversion.html',
	
	'pg.constraint'			=> 'ddl-constraints.html',
	'pg.constraint.add'		=> 'ddl-alter.html#AEN2217',
	'pg.constraint.drop'	=> 'ddl-alter.html#AEN2226',
	'pg.constraint.primary_key'	=> 'ddl-constraints.html#AEN2055',
	'pg.constraint.foreign_key'	=> 'ddl-constraints.html#DDL-CONSTRAINTS-FK',
	'pg.constraint.unique_key'	=> 'ddl-constraints.html#AEN2033',
	'pg.constraint.check'		=> 'ddl-constraints.html#AEN1978',
	
	'pg.trigger'			=> 'triggers.html',
	'pg.trigger.create'		=> 'sql-createtrigger.html',
	'pg.trigger.alter'		=> 'sql-altertrigger.html',
	'pg.trigger.drop'		=> 'sql-droptrigger.html',
	
	'pg.index'				=> 'indexes.html',
	'pg.index.create'		=> 'sql-createindex.html',
	'pg.index.cluster'		=> 'sql-cluster.html',
	'pg.index.reindex'		=> 'sql-reindex.html',
	'pg.index.drop'			=> 'sql-dropindex.html',
	
	'pg.rule'				=> 'rules.html',
	'pg.rule.create'		=> 'sql-createrule.html',
	'pg.rule.drop'			=> 'sql-droprule.html',
	
	'pg.admin.vacuum'		=> 'sql-vacuum.html',
	'pg.admin.analyze'		=> 'sql-analyze.html',
);
?>
