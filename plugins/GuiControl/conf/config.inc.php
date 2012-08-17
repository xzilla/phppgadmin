<?php

$plugin_conf = array(

    /**
     * Top Links
     **/
    'top_links' => array (
        // 'sql' => true,
        // 'history' => true,
        // 'find' => true,
        // 'logout' => true,
    ),

    /**
     * Tabs Links
     **/
     'tab_links' => array (
        'root' => array (
            // 'intro' => true,
            // 'servers' => true,
        ),
        // case 'report' ???
        'server' => array (
            // 'databases' => true,
            // 'roles' => true, /* postgresql 8.1+ */
            // 'users' => true, /* postgresql <8.1 */
            // 'groups' => true,
            // 'account' => true,
            // 'tablespaces' => true,
            // 'export' => true,
            // 'reports' => true,
        ),
        'database' => array (
            // 'schemas' => true,
            // 'sql' => true,
            // 'find' => true,
            'variables' => false,
            // 'processes' => true,
            // 'locks' => true,
            'admin' => false,
            'privileges' => false,
            'languages' => false,
            'casts' => false,
            // 'export' => true,
        ),
        'schema' => array(
            // 'tables' => true,
            // 'views' => true,
            // 'sequences' => true,
            // 'functions' => true,
            // 'fulltext' => true,
            'domains' => false,
            'aggregates' => false,
            'types' => false,
            'operators' => false,
            'opclasses' => false,
            'conversions' => false,
            // 'privileges' => true,
            // 'export' => true,
        ),
        'table' => array(
            // 'columns' => true,
            // 'indexes' => true,
            // 'constraints' => true,
            // 'triggers' => true,
            // 'rules' => true,
            'admin' => false,
            'info' => false,
            // 'privileges' => true,
            // 'import' => true,
            // 'export' => true,
        ),
        'view' => array (
            // 'columns' => true,
            // 'definition' => true,
            // 'rules' => true,
            // 'privileges' => true,
            // 'export' => true,
        ),
        'function' => array(
            // 'definition' => true,
            // 'privileges' => true,
        ),
        'aggregate' => array(
            // 'definition' => true,
        ),
        'role' => array(
            // 'definition' => true,
        ),
        'popup' => array(
            // 'sql' => true,
            // 'find' => true,
        ),
        'column' => array(
            // 'properties' => true,
            // 'privileges' => true,
        ),
        'fulltext' => array(
            // 'ftsconfigs' => true,
            // 'ftsdicts' => true,
            // 'ftsparsers' => true,
        ),
     ),

    /**
     * Trail Links
     **/
     'trail_links' => true, /* enable/disable the whole trail */

    /**
     * Navigation Links
     **/
     'navlinks' => array(
        'aggregates-properties' => array(
            // 'showall' => true,
			'alter' => false,
            'drop' => false,
        ),
        'aggregates-aggregates' => array(
            'create' => false,
        ),
        'all_db-databases' => array(
            'create' => false,
        ),
        'colproperties-colproperties' => array(
            // 'browse' => true,
            'alter' => false,
            'drop' => false,
        ),
        'constraints-constraints' => array(
            'addcheck' => false,
            'adduniq' => false,
            'addpk' => false,
            'addfk' => false,
        ),
        'display-browse' => array(
            // 'back' => true,
            // 'edit' => true,
            // 'collapse' => true,
            'createreport' => false,
            'createview' => false,
            // 'download' => true,
            // 'insert' => true,
            // 'refresh' => true,
        ),
        'domains-properties' => array(
            'drop' => false,
            'addcheck' => false,
            // 'alter' => true,
        ),
        'domains-domains' => array(
            'create' => false,
        ),
        'fulltext-fulltext' => array(
            'createconf' => false,
        ),
        'fulltext-viewdicts' => array(
            'createdict' => false,
        ),
        'fulltext-viewconfig' => array(
            'addmapping' => false,
        ),
        'functions-properties' => array(
            // 'showall' => true,
            'alter' => false,
            'drop' => false,
        ),
        'functions-functions' => array(
            'createpl' => false,
            'createinternal' => false,
            'createc' => false,
        ),
        'groups-groups' => array(
            'create' => false,
        ),
        'groups-properties' => array(
            // 'showall' => true,
        ),
        'history-history' => array(
            // 'refresh' => true,
            // 'download' => true,
            // 'clear' => true,
        ),
        'indexes-indexes' => array(
            'create' => false,
        ),
        'operators-properties' => array(
            // 'showall' => true,
        ),
        'privileges-privileges' => array(
            'grant' => false,
            'revoke' => false,
            // 'showalltables' => true,
            // 'showallcolumns' => true,
            // 'showallviews' => true,
            // 'showalldatabases' => true,
            // 'showallschemas' => true,
            // 'showallfunctions' => true,
            // 'showallsequences' => true,
            // 'showalltablespaces' => true,
        ),
        'reports-properties' => array(
            // 'showall' => true,
            'alter' => false,
            // 'exec' => true,
        ),
        'reports-reports' => array(
            'create' => false,
        ),
        'roles-account' => array(
            'changepassword' => true,
        ),
        'roles-properties' => array(
            // 'showall' => true,
            'alter' => false,
            'drop' => false,
        ),
        'roles-roles' => array(
            'create' => false,
        ),
        'rules-rules' => array(
            'create' => false,
        ),
        'schemas-schemas' => array(
            'create' => false,
        ),
        'sequences-properties' => array(
            'alter' => false,
            'nextval' => false,
            'restart' => false,
            'reset' => false,
        ),
        'sequences-sequences' => array(
            'create' => false,
        ),
        'servers-servers' => array(
            // 'showall' => true,
            /*we cannot filter the group names in navlinks presently*/
        ),
        'sql-form' => array(
            // 'back' => true,
            // 'alter' => true,
            'createreport' => false,
            'createview' => false,
            // 'download' => true,
        ),
        'tables-tables' => array(
            'create' => false,
            'createlike' => false,
        ),
        'tablespaces-tablespaces' => array(
            'create' => false,
        ),
        'tblproperties-tblproperties' => array(
            // 'browse' => true,
	    // 'select' => true,
            // 'insert' => true,
	    'empty' => false,
            'drop' => false,
            'addcolumn' => false,
            'alter' => false,
        ),
        'triggers-triggers' => array(
            'create' => false,
        ),
        'types-properties' => array(
            // 'showall' => true,
        ),
        'types-types' => array(
            'create' => false,
            'createcomp' => false,
            'createenum' => false,
        ),
        'users-account' => array(
            // 'changepassword' => true,
        ),
        'users-users' => array(
            'create' => false,
        ),
        'viewproperties-definition' => array(
            'alter' => false,
        ),
        'viewproperties-viewproperties' => array(
            // 'browse' => true,
            // 'select' => true,
            'drop' => false,
            'alter' => false,
        ),
        'views-views' => array(
            'create' => false,
            'createwiz' => false,
        ),
     ),

     /**
      * action links
      **/

    'actionbuttons' => array(
        'admin-admin' => array(
            'edit' => false,
            'delete' => false,
        ),
        'aggregates-aggregates' => array(
            'alter' => false,
			'drop' => false,
        ),
        'all_db-databases' => array(
            'drop' => false,
            // 'privileges' => true,
            'alter' => false,
        ),
        'casts-casts' => array(
            // none
        ),
        'colproperties-colproperties' => array(
            // none
        ),
        'constraints-constraints' => array(
            'drop' => false,
        ),
        'conversions-conversions' => array(
            // none
        ),
        'database-variables' => array(
            // none
        ),
        'database-processes-preparedxacts' => array(
            // none
        ),
        'database-processes' => array(
            'cancel' => false,
            'kill' => false,
        ),
        'database-locks' => array(
            // none
        ),
        'display-browse' => array(
            // TODO
            // 'edit' => true,
            // 'delete' => true,
        ),
        'domains-properties' => array(
            'drop' => false,
        ),
        'domains-domains' => array(
            'alter' => false,
			'drop' => false,
        ),
        'fulltext-fulltext' => array(
            'drop' => false,
            'alter' => false,
        ),
        'fulltext-viewparsers' => array(
            // none
        ),
        'fulltext-viewdicts' => array(
            'drop' => false,
            'alter' => false,
        ),
        'fulltext-viewconfig' => array(
            'multiactions' => false,
            'drop' => false,
            'alter' => false,
        ),
        'functions-functions' => array(
            'multiactions' => false,
            'alter' => false,
            'drop' => false,
            // 'privileges' => true,
        ),
        'groups-members' => array(
            'drop' => false,
        ),
        'groups-properties' => array(
            'drop' => false,
        ),
        'history-history' => array(
            // 'run' => true,
            // 'remove' => true,
        ),
        'indexes-indexes' => array(
            'cluster' => false,
            'reindex' => false,
            'drop' => false,
        ),
        'info-referrers' => array(
            // 'properties' => true,
        ),
        'info-parents' => array(
            // 'properties' => true,
        ),
        'info-children' => array(
            // 'properties' => true,
        ),
        'languages-languages' => array(
            // none
        ),
        'opclasses-opclasses' => array(
            // none
        ),
        'operators-operators' => array(
             'drop' => false,
        ),
        'reports-reports' => array(
            // 'run' => true,
            'edit' => false,
            'drop' => false,
        ),
        'roles-roles' => array(
            'alter' => false,
            'drop' => false,
        ),
        'rules-rules' => array(
            'drop' => false,
        ),
        'schemas-schemas' => array(
            'multiactions' => false,
            'drop' => false,
            // 'privileges' => true,
            'alter' => false,
        ),
        'sequences-sequences' => array(
            'multiactions' => false,
            'drop' => false,
            // 'privileges' => true,
            'alter' => false,
        ),
        'servers-servers' => array(
            // 'logout' => true,
        ),
        'tables-tables' => array(
            'multiactions' => false,
            // 'browse' => true,
            // 'select' => true,
            // 'insert' => true,
            'empty' => false,
            'alter' => false,
            'drop' => false,
            'vacuum' => false,
            'analyze' => false,
            'reindex' => false,
        ),
        'tablespaces-tablespaces' => array(
            'drop' => false,
            // 'privileges' => true,
            'alter' => false,
        ),
        'tblproperties-tblproperties' => array(
            // 'browse' => true,
            'alter' => false,
            // 'privileges' => true,
            'drop' => false,
        ),
        'triggers-triggers' => array(
            'alter' => false,
            'drop' => false,
            'enable' => false,
            'disable' => false,
        ),
        'types-properties' => array(
            // none
        ),
        'types-types' => array(
            'drop' => false,
        ),
        'users-users' => array(
            'alter' => false,
            'drop' => false,
        ),
        'viewproperties-viewproperties' => array(
            'alter' => false,
        ),
        'views-views' => array(
            'multiactions' => false,
	    // 'browse' => true,
	    // 'select' => true,
	    'alter' => false,
	    'drop' => false,
        ),
    ),
);

?>
