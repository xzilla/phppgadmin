<?php

	/**
	 * Main object browser.  This page first shows a list of databases and then
	 * if you click on a database it shows a list of database objects in that
	 * database.
	 *
	 * $Id: browser.php,v 1.15 2002/12/23 10:20:20 jmpoure Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	// Include tree classes
	include_once('class.tree/class.tree.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php $appName ?></title>
</head>
<body class="browser">
<?php

	// Construct expanding tree
   $tree = new Tree ('class.tree');
   $tree->set_frame ('detail');
   $root  = $tree->open_tree ('<a href=\"all_db.php\" target=\"detail\">'. htmlspecialchars($confServers[$_SESSION['webdbServerID']]['desc']) .'</a>', '');

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		// If database is selected, show folder, otherwise show document
		if (isset($_REQUEST['database']) && $_REQUEST['database'] == $databases->f[$data->dbFields['dbname']]) {
			$node = $tree->add_folder($root, htmlspecialchars($databases->f[$data->dbFields['dbname']]), 
				'database.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
				
			if ($data->hasSchemas()) {
				$schemas = &$data->getSchemas();
				while (!$schemas->EOF) {
					$schemanode = $tree->add_folder($node, htmlspecialchars($schemas->f[$data->nspFields['nspname']]), 
						'schema.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&schema=' . 
						urlencode($schemas->f[$data->nspFields['nspname']]), 'detail');			
					if ($data->hasTables()) {
						$tables = &$localData->getTables();
						$table_node = $tree->add_folder($schemanode, $strTables, 
							'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
						while (!$tables->EOF) {
							$tree->add_document($table_node, htmlspecialchars($tables->f[$data->tbFields['tbname']]), 
								'tblproperties.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&table=' .
								urlencode($tables->f[$data->tbFields['tbname']]), 'detail', "../images/themes/{$guiTheme}/tables.gif");
							$tables->moveNext();
						}
					}
					if ($data->hasViews())
						$tree->add_document($schemanode, $strViews, 'views.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/views.gif");
					if ($data->hasSequences())
						$tree->add_document($schemanode, $strSequences, 'sequences.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/sequences.gif");
					if ($data->hasFunctions())
						$tree->add_document($schemanode, $strFunctions, 'functions.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/functions.gif");
					if ($data->hasOperators())
						$tree->add_document($schemanode, $strOperators, 'operators.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/operators.gif");
					if ($data->hasTypes())
						$tree->add_document($schemanode, $strTypes, 'types.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
					if ($data->hasAggregates())
						$tree->add_document($schemanode, $strAggregates, 'aggregates.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
					$schemas->moveNext();
				}
			}
			// Database doesn't support schemas
			else {
				if ($data->hasTables()) {
					$tables = &$localData->getTables();
					$table_node = $tree->add_folder($node, $strTables, 
						'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
					while (!$tables->EOF) {
						$tree->add_document($table_node, htmlspecialchars($tables->f[$data->tbFields['tbname']]), 
							'tblproperties.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&table=' .
							urlencode($tables->f[$data->tbFields['tbname']]), 'detail', "../images/themes/{$guiTheme}/tables.gif");
						$tables->moveNext();
					}
				}
				if ($data->hasViews())
					$tree->add_document($node, $strViews, 'views.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/views.gif");
				if ($data->hasSequences())
					$tree->add_document($node, $strSequences, 'sequences.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/sequences.gif");
				if ($data->hasFunctions())
					$tree->add_document($node, $strFunctions, 'functions.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/functions.gif");
				if ($data->hasOperators())
					$tree->add_document($node, $strOperators, 'operators.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail', "../images/themes/{$guiTheme}/operators.gif");
				if ($data->hasTypes())
					$tree->add_document($node, $strTypes, 'types.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
				if ($data->hasAggregates())
					$tree->add_document($node, $strAggregates, 'aggregates.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), 'detail');
			}
		} else {
			$node = $tree->add_document($root, htmlspecialchars($databases->f[$data->dbFields['dbname']]), 
				"{$_SERVER['PHP_SELF']}?database=" . urlencode($databases->f[$data->dbFields['dbname']]), '_self', "../images/themes/{$guiTheme}/database.gif");
		}		

		$databases->moveNext();
	}		
   $tree->close_tree ( );

?>
</body>
</html>
