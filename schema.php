<?php

	/**
	 * Display properties of a schema
	 *
	 * $Id: schema.php,v 1.17 2004/06/11 05:08:25 xzilla Exp $
	 */

	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show schema properties
	 */
	function doDefault($msg = '') {
		global $data, $misc, $lang, $conf;

		$schema = &$data->getSchemaByName($_REQUEST['schema']);
		
		$misc->printTitle(array($misc->printVal($_REQUEST['database']),$lang['strschemas'],$misc->printVal($_REQUEST['schema'])),'schemas');

		// Show comment if any
		if ($schema->f[$data->nspFields['nspcomment']] !== null)
			echo "<p class=\"comment\">", $misc->printVal($schema->f[$data->nspFields['nspcomment']]), "</p>\n";

		$misc->printMsg($msg);
		
		echo "<ul>\n";
		echo "<li><a href=\"tables.php?{$misc->href}\">{$lang['strtables']}</a></li>\n";
		echo "<li><a href=\"views.php?{$misc->href}\">{$lang['strviews']}</a></li>\n";
		echo "<li><a href=\"sequences.php?{$misc->href}\">{$lang['strsequences']}</a></li>\n";
		echo "<li><a href=\"functions.php?{$misc->href}\">{$lang['strfunctions']}</a></li>\n";
		echo "<li><a href=\"domains.php?{$misc->href}\">{$lang['strdomains']}</a></li>\n";
		if ($conf['show_advanced']) {
			echo "<li>{$lang['stradvanced']}</li>\n";
			echo "<ul>\n";
			echo "<li><a href=\"aggregates.php?{$misc->href}\">{$lang['straggregates']}</a></li>\n";
			echo "<li><a href=\"types.php?{$misc->href}\">{$lang['strtypes']}</a></li>\n";
			echo "<li><a href=\"operators.php?{$misc->href}\">{$lang['stroperators']}</a></li>\n";
			echo "<li><a href=\"opclasses.php?{$misc->href}\">{$lang['stropclasses']}</a></li>\n";
			echo "<li><a href=\"conversions.php?{$misc->href}\">{$lang['strconversions']}</a></li>\n";
			echo "</ul>\n";
		}
		echo "</ul>\n";

		echo "<ul>\n";
		echo "<li><a href=\"schema.php?database=", urlencode($_REQUEST['database']), "&amp;schema=",
			urlencode($_REQUEST['schema']),"&amp;action=alter\">{$lang['stralter']}</a></li>\n";
		echo "</ul>\n";
	}

	/**
	 * Display a form to permit editing schema properies.
	 * TODO: permit changing name, owner
	 */
	function doAlter($msg = '') {
		global $data, $misc,$PHP_SELF, $lang;
		
		$misc->printTitle(array($misc->printVal($_REQUEST['database']),$misc->printVal($_REQUEST['schema']),$lang['stralter']),'alter_schema');
		$misc->printMsg($msg);

		$schema = &$data->getSchemaByName($_REQUEST['schema']);
		if ($schema->recordCount() > 0) {
			if (!isset($_POST['comment'])) $_POST['comment'] = $schema->f[$data->nspFields['nspcomment']];
			if (!isset($_POST['schema'])) $_POST['schema'] = $_REQUEST['schema'];

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "\t<tr>\n";
			echo "\t\t<th class=\"data\">{$lang['strcomment']}</th>\n";
			echo "\t\t<td class=\"data1\"><textarea cols=\"32\" rows=\"3\"name=\"comment\" wrap=\"virtual\">", htmlspecialchars($_POST['comment']), "</textarea></td>\n";
			echo "\t</tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"alter\" />\n";
			echo "<input type=\"hidden\" name=\"schema\" value=\"", htmlspecialchars($_POST['schema']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		} else {
			echo "<p>{$lang['strnodata']}</p>\n";
		}

	}

	/**
	 * Save the form submission containing changes to a schema
	 */
        function doSaveAlter($msg = '') {
		global $data, $misc,$PHP_SELF, $lang;
		
		
		$status = $data->updateSchema($_POST['schema'], $_POST['comment']);
		if ($status == 0)
			doDefault($lang['strschemaaltered']);
		else
			doAlter($lang['strschemaalteredbad']);
	}


	$misc->printHeader($lang['strschema'] . ' - ' . $_REQUEST['schema']);
	$misc->printBody();

	switch ($action) {
		case 'alter':
			if (isset($_POST['cancel'])) 
				doDefault();
			elseif (isset($_POST['alter']))
		       		doSaveAlter();
		       	else 
		       		doAlter();
		       	break;
		default:
        		doDefault();
	}
	

	$misc->printFooter();

?>
