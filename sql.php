<?php

	/**
	 * Process an arbitrary SQL query - tricky!  The main problem is that
	 * unless we implement a full SQL parser, there's no way of knowing
	 * how many SQL statements have been strung together with semi-colons
	 * @param $query The SQL query string to execute
	 * @param $return_url The return URL
	 * @param $return_desc The return link name
	 *
	 * $Id: sql.php,v 1.2 2003/05/05 03:03:53 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();
	$misc->printDatabaseNav();
	echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strsql']}: {$lang['strqueryresults']}</h2>\n";

	$_POST['query'] = trim($_POST['query']);
	if ($_POST['query'] != '') {
		// Execute the query
		$rs = $localData->conn->Execute($_POST['query']);

		// $rs will only be an object if there is no error
		if (is_object($rs)) {
			// Now, depending on what happened do various things

			// First, if rows returned, then display the results
			if ($rs->recordCount() > 0) {
				echo "<table>\n<tr>";
				reset($rs->f);
				while(list($k, ) = each($rs->f)) {
					echo "<th class=\"data\">", $misc->printVal($k), "</th>";
				}

				$i = 0;
				reset($rs->f);
				while (!$rs->EOF) {
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					while(list($k, $v) = each($rs->f)) {
						echo "<td class=\"data{$id}\">", $misc->printVal($v), "</td>";
					}							
					echo "</tr>\n";
					$rs->moveNext();
					$i++;
				}
				echo "</table>\n";
				echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
			}
			// Otherwise if any rows have been affected
			elseif ($localData->conn->Affected_Rows() > 0) {
				echo "<p>", $localData->conn->Affected_Rows(), " {$lang['strrowsaff']}</p>\n";
			}
			// Else say success
			else echo "<p>{$lang['strsqlexecuted']}</p>\n";
		}
	}
	else echo "<p>{$lang['strinvalidparam']}</p>\n";

	echo "<p><a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
		"&action=sql\">{$lang['strback']}</a></p>\n";
	
	$misc->printFooter();
?>
