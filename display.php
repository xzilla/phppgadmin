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
	 * $Id: display.php,v 1.14 2003/05/05 14:26:15 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	global $conf, $lang;

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();

	echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strqueryresults']}</h2>\n";
	
	// If current page is not set, default to first page
	if (!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;

	$sub = $_REQUEST['query'];
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
		// If action is set, then pass it along
		global $action;
		if (isset($action)) $action_str = 'action=' . urlencode($action);
		else $action_str = '';

		// Show page navigation
		$misc->printPages($_REQUEST['page'], $max_pages, "{$PHP_SELF}?page=%s&{$misc->href}&query=" .
			urlencode($_REQUEST['query']) . '&count=' . urlencode($_REQUEST['count']) . '&return_url=' .
			urlencode($_REQUEST['return_url']) . '&return_desc=' . urlencode($_REQUEST['return_desc']) .
			$action_str);
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
	else echo "<p>{$lang['strnodata']}</p>\n";
	
	echo "<p><a class=\"navlink\" href=\"{$_REQUEST['return_url']}\">{$_REQUEST['return_desc']}</a></p>\n";

	$misc->printFooter();
?>
