<?php

	/**
	 * Main object browser
	 *
	 * $Id: browser.php,v 1.1 2002/02/11 09:33:08 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc');
?>

<html>
<head>
<title><?= $appName ?></title>
<body>
<?php

	$databases = &$data->getDatabases();
	while (!$databases->EOF) {
		echo htmlspecialchars($databases->f['datname']), "<br>\n";
		if ($data->hasTables())
			echo "&nbsp;&nbsp;<a href=\"tables.php?database=", 
				urlencode($databases->f['datname']), "\" target=detail>Tables</a><br>\n";
		if ($data->hasViews())
			echo "&nbsp;&nbsp;<a href=\"views.php\" target=detail>Views</a><br>\n";
		if ($data->hasSequences())
			echo "&nbsp;&nbsp;<a href=\"sequences.php\" target=detail>Sequences</a><br>\n";
		if ($data->hasFunctions())
			echo "&nbsp;&nbsp;<a href=\"functions.php\" target=detail>Functions</a><br>\n";
		if ($data->hasTriggers())
			echo "&nbsp;&nbsp;<a href=\"triggers.php\" target=detail>Triggers</a><br>\n";
		if ($data->hasOperators())
			echo "&nbsp;&nbsp;<a href=\"operators.php\" target=detail>Operators</a><br>\n";
		if ($data->hasTypes())
			echo "&nbsp;&nbsp;<a href=\"types.php\" target=detail>Types</a><br>\n";
		if ($data->hasAggregates())
			echo "&nbsp;&nbsp;<a href=\"aggregates.php\" target=detail>Aggregates</a><br>\n";
		if ($data->hasRules())
			echo "&nbsp;&nbsp;<a href=\"rules.php\" target=detail>Rules</a><br>\n";
		$databases->moveNext();
	}

?>
</body>
</html>
