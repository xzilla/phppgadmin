<?php

	/**
	 * Main object browser
	 *
	 * $Id: browser.php,v 1.5 2002/04/10 04:09:47 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	// Include tree classes
	include_once('class.tree/class.tree.php');
?>

<html>
<head>
<title><?= $appName ?></title>
<body class=browser>
<?php

	// Construct expanding tree
   $tree = new Tree ('class.tree');
   $tree->set_frame ('detail');
   $root  = $tree->open_tree (htmlspecialchars($confServers[$webdbServerID]['desc']), '');

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		$node = $tree->add_folder($root, htmlspecialchars($databases->f[$data->dbFields['dbname']]), 
			'database.php?database=' . urlencode($databases->f[$data->dbFields['dbname']]));
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
		$databases->moveNext();
	}
	
   $tree->close_tree ( );

?>
</body>
</html>
