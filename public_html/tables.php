<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.1 2002/02/12 08:51:08 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$tables = &$localData->getTables();
?>

<html>
<body>

<h1><?= $appName ?></h1>
<?php

	if ($tables->recordCount() > 0) {
		echo "<table>\n";
		while (!$tables->EOF) {
			echo "<tr><td>", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "</td></tr>\n";
			$tables->moveNext();
		}
	}
	else {
		echo "<p>{$strNoTables}</p>\n";
	}
	
	
?>
</body>
</html>