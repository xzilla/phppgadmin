<?php

	/**
	 * Main object browser
	 *
	 * $Id: browser.php,v 1.9 2002/10/07 21:59:38 xzilla Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	// Include tree classes
	include_once('class.tree/class.tree.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $appName ?></title>
</head>
<body class="browser">
<?php

	// Construct expanding tree
   $tree = new Tree ('class.tree');
   $tree->set_frame ('detail');
   $root  = $tree->open_tree (htmlspecialchars($confServers[$_COOKIE['webdbServerID']]['desc']), '');

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		$node = $tree->add_folder($root, htmlspecialchars($databases->f[$data->dbFields['dbname']]), 
			'database.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
		if ($data->hasSchemas()) {
			$schemas = &$data->getSchemas();
			while (!$schemas->EOF) {
				$schemanode = $tree->add_folder($node, htmlspecialchars($schemas->f[$data->nspFields['nspname']]), 
					'schema.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]) . '&schema=' . 
					urlencode($schemas->f[$data->nspFields['nspname']]));			
				if ($data->hasTables())
					$tree->add_document($schemanode, $strTables, 'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/tables.gif");
				if ($data->hasViews())
					$tree->add_document($schemanode, $strViews, 'views.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/views.gif");
		/*		if ($data->hasTriggers())
					$tree->add_document($node, $strTriggers, 'triggers.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
				if ($data->hasRules())
					$tree->add_document($node, $strRules, 'rules.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));*/
				if ($data->hasSequences())
					$tree->add_document($schemanode, $strSequences, 'sequences.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/sequences.gif");
				if ($data->hasFunctions())
					$tree->add_document($schemanode, $strFunctions, 'functions.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/functions.gif");
				if ($data->hasOperators())
					$tree->add_document($schemanode, $strOperators, 'operators.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
				if ($data->hasTypes())
					$tree->add_document($schemanode, $strTypes, 'types.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
				if ($data->hasAggregates())
					$tree->add_document($schemanode, $strAggregates, 'aggregates.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
				$schemas->moveNext();
			}
		}
		// Database doesn't support schemas
		else {
			if ($data->hasTables())
				$tree->add_document($node, $strTables, 'tables.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/tables.gif");
			if ($data->hasViews())
				$tree->add_document($node, $strViews, 'views.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/views.gif");
	/*		if ($data->hasTriggers())
				$tree->add_document($node, $strTriggers, 'triggers.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
			if ($data->hasRules())
				$tree->add_document($node, $strRules, 'rules.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));*/
			if ($data->hasSequences())
				$tree->add_document($node, $strSequences, 'sequences.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/sequences.gif");
			if ($data->hasFunctions())
				$tree->add_document($node, $strFunctions, 'functions.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]), "../images/themes/{$guiTheme}/functions.gif");
			if ($data->hasOperators())
				$tree->add_document($node, $strOperators, 'operators.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
			if ($data->hasTypes())
				$tree->add_document($node, $strTypes, 'types.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
			if ($data->hasAggregates())
				$tree->add_document($node, $strAggregates, 'aggregates.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
			if ($data->hasIndicies())
				$tree->add_document($node, $strIndicies, 'indicies.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
	}
		$databases->moveNext();
	}
	
   $tree->close_tree ( );

?>
</body>
</html>
