<?php

	/**
	 * Main object browser.  This page first shows a list of databases and then
	 * if you click on a database it shows a list of database objects in that
	 * database.
	 *
	 * $Id: browser.php,v 1.7 2003/04/23 03:36:12 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	// Include tree classes
	include_once('classes/class.tree/class.tree.php');

	// Output header
	$misc->printHeader();
	$misc->printBody('browser');

	// Construct expanding tree
	$tree = new Tree ('classes/class.tree');
	$tree->set_frame ('detail');
	$root  = $tree->open_tree ('<a href=\"all_db.php\" target=\"detail\">'. htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['desc']) .'</a>', '');

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		// If database is selected, show folder, otherwise show document
		if (isset($_REQUEST['database']) && $_REQUEST['database'] == $databases->f[$data->dbFields['dbname']]) {
			$node = $tree->add_folder($root, addslashes(htmlspecialchars($databases->f[$data->dbFields['dbname']])),
				'database.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');

			if ($data->hasSchemas()) {
				$schemas = &$localData->getSchemas();
				while (!$schemas->EOF) {
					$localData->setSchema($schemas->f[$data->nspFields['nspname']]);
					// Construct database & schema query string
					$querystr = 'database=' . urlencode($databases->f[$data->dbFields['dbname']]). '&schema=' .
							urlencode($schemas->f[$data->nspFields['nspname']]);
					$schemanode = $tree->add_folder($node, addslashes($schemas->f[$data->nspFields['nspname']]),
						"schema.php?{$querystr}", 'detail');
					if ($data->hasTables()) {
						$tables = &$localData->getTables();
						$table_node = $tree->add_folder($schemanode, $lang['strtables'],
							'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&schema=' .
							urlencode($schemas->f[$data->nspFields['nspname']]), 'detail');
						while (!$tables->EOF) {
							$tree->add_document($table_node, addslashes($tables->f[$data->tbFields['tbname']]),
								'tblproperties.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&schema=' .
								urlencode($schemas->f[$data->nspFields['nspname']]) . '&table=' .
								urlencode($tables->f[$data->tbFields['tbname']]), 'detail', "../../images/themes/{$conf['theme']}/tables.gif");
							$tables->moveNext();
						}
					}
					if ($data->hasViews())
						$tree->add_document($schemanode, $lang['strviews'], "views.php?{$querystr}", 'detail', "../../images/themes/{$conf['theme']}/views.gif");
					if ($data->hasSequences())
						$tree->add_document($schemanode, $lang['strsequences'], "sequences.php?{$querystr}", 'detail', "../../images/themes/{$conf['theme']}/sequences.gif");
					if ($data->hasFunctions())
						$tree->add_document($schemanode, $lang['strfunctions'], "functions.php?{$querystr}", 'detail', "../../images/themes/{$conf['theme']}/functions.gif");
//					if ($data->hasOperators())
//						$tree->add_document($schemanode, $lang['stroperators'], "operators.php?{$querystr}", 'detail', "../../images/themes/{$conf['theme']}/operators.gif");
					if ($data->hasTypes())
						$tree->add_document($schemanode, $lang['strtypes'], "types.php?{$querystr}", 'detail');
//					if ($data->hasAggregates())
//						$tree->add_document($schemanode, $lang['straggregates'], 'aggregates.php{$querystr}", 'detail');
					$schemas->moveNext();
				}
			}
			// Database doesn't support schemas
			else {
				if ($data->hasTables()) {
					$tables = &$localData->getTables();
					$table_node = $tree->add_folder($node, $lang['strtables'],
						'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
					while (!$tables->EOF) {
						$tree->add_document($table_node, addslashes($tables->f[$data->tbFields['tbname']]), 
							'tblproperties.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&table=' .
							urlencode($tables->f[$data->tbFields['tbname']]), 'detail', "../../images/themes/{$conf['theme']}/tables.gif");
						$tables->moveNext();
					}
				}
				if ($data->hasViews())
					$tree->add_document($node, $lang['strviews'], 'views.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../../images/themes/{$conf['theme']}/views.gif");
				if ($data->hasSequences())
					$tree->add_document($node, $lang['strsequences'], 'sequences.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../../images/themes/{$conf['theme']}/sequences.gif");
				if ($data->hasFunctions())
					$tree->add_document($node, $lang['strfunctions'], 'functions.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../../images/themes/{$conf['theme']}/functions.gif");
//				if ($data->hasOperators())
//					$tree->add_document($node, $lang['stroperators'], 'operators.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../../images/themes/{$conf['theme']}/operators.gif");
				if ($data->hasTypes())
					$tree->add_document($node, $lang['strtypes'], 'types.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
//				if ($data->hasAggregates())
//					$tree->add_document($node, $lang['straggregates'], 'aggregates.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
			}
		} else {
			$node = $tree->add_document($root, addslashes(htmlspecialchars($databases->f[$data->dbFields['dbname']])),
				"{$_SERVER['PHP_SELF']}?database=" . urlencode($databases->f[$data->dbFields['dbname']]), '_self', "../../images/themes/{$conf['theme']}/database.gif");
		}		

		$databases->moveNext();
	}		
   $tree->close_tree ( );

   // Output footer
   $misc->printFooter();

?>
