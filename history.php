<?php

	/**
	 * Alternative SQL editing window
	 *
	 * $Id: history.php,v 1.3 2008/01/10 19:37:07 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

	function doDefault() {
		global $misc, $lang;

		$onchange = "onchange=\"location.href='history.php?server=' + encodeURI(server.options[server.selectedIndex].value) + '&amp;database=' + encodeURI(database.options[database.selectedIndex].value) + '&amp;'\"";

		$misc->printHeader($lang['strhistory']);
		
		// Bring to the front always
		echo "<body onload=\"window.focus();\">\n";
	
		echo "<form action=\"history.php\" method=\"post\">\n";
		$misc->printConnection($onchange);
		echo "</form><br />";
	
		if (!isset($_REQUEST['database'])) {
			echo "<p>{$lang['strnodatabaseselected']}</p>\n";
			return;
		}
			
		if (isset($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']])) {
			include_once('classes/ArrayRecordSet.php');
						   
			$history = new ArrayRecordSet($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']]);
			
			$columns = array(
				'query' => array(
					'title' => $lang['strsql'],
					'field' => field('query'),
				),
				'paginate' => array(
					'title' => $lang['strpaginate'],
					'field' => field('paginate'),
					'type' => 'yesno',
				),
				'actions' => array(
					'title' => $lang['stractions'],
				),
			);

			$actions = array(
				'run' => array(
					'title' => $lang['strexecute'],
					'url'   => "sql.php?{$misc->href}&amp;nohistory=t&amp;",
					'vars'  => array('query' => 'query', 'paginate' => 'paginate'),
					'target' => 'detail',
				),
				'remove' => array(
					'title' => $lang['strdelete'],
					'url'   => "history.php?{$misc->href}&amp;action=confdelhistory&amp;",
					'vars'  => array('queryid' => 'queryid'),
				),
			);

			$misc->printTable($history, $columns, $actions, $lang['strnohistory']);
		}
		else echo "<p>{$lang['strnohistory']}</p>\n";

		echo "<ul class=\"navlink\">\n";
		if (isset($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']]) 
				&& count($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']]))
			echo "\t<li><a href=\"history.php?action=confclearhistory&amp;{$misc->href}\">{$lang['strclearhistory']}</a></li>\n";
		echo "\t<li><a href=\"history.php?action=history&amp;{$misc->href}\">{$lang['strrefresh']}</a></li>\n</ul>\n";
	}

	function doDelHistory($qid, $confirm) {
		global $misc, $lang;

		if ($confirm) {
			$misc->printHeader($lang['strhistory']);

        		// Bring to the front always
	        	echo "<body onload=\"window.focus();\">\n";
			
			echo "<h3>{$lang['strdelhistory']}</h3>\n";
			echo "<p>{$lang['strconfdelhistory']}</p>\n";

			echo "<pre>", htmlentities($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']][$qid]['query']), "</pre>";
			echo "<form action=\"history.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"delhistory\" />\n";
			echo "<input type=\"hidden\" name=\"queryid\" value=\"$qid\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else
			unset($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']][$qid]);
	}       

	function doClearHistory($confirm) {
		global $misc, $lang;

		if ($confirm) {
			$misc->printHeader($lang['strhistory']);

        		// Bring to the front always
	        	echo "<body onload=\"window.focus();\">\n";

			echo "<h3>{$lang['strclearhistory']}</h3>\n";
			echo "<p>{$lang['strconfclearhistory']}</p>\n";

			echo "<form action=\"history.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"clearhistory\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else
			unset($_SESSION['history'][$_REQUEST['server']][$_REQUEST['database']]);
	}
																																							
	
	switch ($action) {
		case 'confdelhistory':
			doDelHistory($_REQUEST['queryid'], true);
			break;
		case 'delhistory':
			if (isset($_POST['yes'])) doDelHistory($_REQUEST['queryid'], false);
			doDefault();
			break;
		case 'confclearhistory':
			doClearHistory(true);
			break;
		case 'clearhistory':
			if (isset($_POST['yes'])) doClearHistory(false);
			doDefault();
			break;
		default:
			doDefault();
	}
																					
	// Set the name of the window
	$misc->setWindowName('history');
	$misc->printFooter();
	
?>
