<?php

	/**
	 * Common relation browsing function that can be used for views,
	 * tables, reports, arbitrary queries, etc. to avoid code duplication.
	 * @param $query The SQL SELECT string to execute
	 * @param $count The same SQL query, but only retrieves the count of the rows (AS total)
	 * @param $return_url The return URL
	 * @param $return_desc The return link name
	 * @param $page The current page
	 *
	 * $Id: display.php,v 1.28 2003/09/10 07:25:49 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	global $conf, $lang;

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();

	echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strqueryresults']}</h2>\n";
	
	// If current page is not set, default to first page
	if (!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;

	$sub = trim($_REQUEST['query']);
	// Trim off trailing semi-colon if there is one
	if (substr($sub, strlen($sub) - 1, 1) == ';')
		$sub = substr($sub, 0, strlen($sub) - 1);

	// If 'count' variable is not set, then set it to select count(*) from
	// 'query'
	if (!isset($_REQUEST['count'])) {
		$_REQUEST['count'] = "SELECT COUNT(*) AS total FROM ({$sub}) AS sub";
	}

	// Retrieve page from table.  $max_pages is returned by reference.
	$rs = &$localData->browseSQL($sub, $_REQUEST['count'], $_REQUEST['page'], $conf['max_rows'], $max_pages);
	
	if (is_object($rs) && $rs->recordCount() > 0) {
		// Show page navigation
		$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&{$misc->href}&query=" .
			urlencode($_REQUEST['query']) . '&count=' . urlencode($_REQUEST['count']) . '&return_url=' .
			urlencode($_REQUEST['return_url']) . '&return_desc=' . urlencode($_REQUEST['return_desc']));
		echo "<table>\n<tr>";
		
		foreach ($rs->f as $k => $v) {
			$finfo = $rs->fetchField($k);
			echo "<th class=\"data\">", $misc->printVal($finfo->name), "</th>";
		}

		echo "</tr>\n";

		$i = 0;		
		while (!$rs->EOF) {
			$id = (($i % 2) == 0 ? '1' : '2');
			echo "<tr>\n";
			foreach ($rs->f as $k => $v) {
				$finfo = $rs->fetchField($k);
				echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($v, true, $finfo->type), "</td>";
			}							
			echo "</tr>\n";
			$rs->moveNext();
			$i++;
		}
		
		echo "</table>\n";
		echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
	}
	else echo "<p>{$lang['strnodata']}</p>\n";
	
	echo "<p><a class=\"navlink\" href=\"{$_REQUEST['return_url']}\">{$_REQUEST['return_desc']}</a>";
	if ($conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {
		echo " | <a class=\"navlink\" href=\"reports.php?action=create&db_name=", urlencode($_REQUEST['database']), "&report_sql=",
			urlencode($_REQUEST['query']), "\">{$lang['strcreatereport']}</a>\n";
	}
	if (isset($rs) && is_object($rs) && $rs->recordCount() > 0) {		
		echo " | <a class=\"navlink\" href=\"views.php?action=create&formDefinition=",
			urlencode($_REQUEST['query']), "&{$misc->href}\">{$lang['strcreateview']}</a>\n";
		echo " | <a class=\"navlink\" href=\"dataexport.php?query=",
				urlencode($_REQUEST['query']), "&{$misc->href}\">{$lang['strdownload']}</a>\n";	
	}
	echo "</p>\n";

	$misc->printFooter();
?>
