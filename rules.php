<?php

	/**
	 * List rules on a table OR view
	 *
	 * $Id: rules.php,v 1.18 2004/05/16 07:31:20 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Confirm and then actually create a rule
	 */
	function createRule($confirm, $msg = '') {
		global $PHP_SELF, $data, $data, $misc;
		global $lang;

		if (!isset($_POST['name'])) $_POST['name'] = '';
		if (!isset($_POST['event'])) $_POST['event'] = '';
		if (!isset($_POST['where'])) $_POST['where'] = '';
		if (!isset($_POST['type'])) $_POST['type'] = 'SOMETHING';
		if (!isset($_POST['raction'])) $_POST['raction'] = '';

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']),
				$misc->printVal($_REQUEST['relation']), ": {$lang['strcreaterule']}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data left required\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\"><input name=\"name\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['name']), "\" /></td></tr>\n";
			echo "<tr><th class=\"data left required\">{$lang['strevent']}</th>\n";
			echo "<td class=\"data1\"><select name=\"event\">\n";
			foreach ($data->rule_events as $v) {
				echo "<option value=\"{$v}\"", ($v == $_POST['event']) ? ' selected="selected"' : '',
				">{$v}</option>\n";
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strwhere']}</th>\n";
			echo "<td class=\"data1\"><input name=\"where\" size=\"32\" value=\"",
				htmlspecialchars($_POST['where']), "\" /></td></tr>\n";
			echo "<tr><th class=\"data left\">{$lang['strinstead']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input type=\"checkbox\" name=\"instead\" ", (isset($_POST['instead'])) ? ' checked="checked"' : '', " />\n";
			echo "</td></tr>\n";
			echo "<tr><th class=\"data left required\">{$lang['straction']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input type=\"radio\" name=\"type\" value=\"NOTHING\"", ($_POST['type'] == 'NOTHING') ? ' checked="checked"' : '', " /> NOTHING<br />\n";
			echo "<input type=\"radio\" name=\"type\" value=\"SOMETHING\"", ($_POST['type'] == 'SOMETHING') ? ' checked="checked"' : '', " />\n";
			echo "(<input name=\"raction\" size=\"32\" value=\"",
				htmlspecialchars($_POST['raction']), "\" />)</td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_rule\" />\n";
			echo "<input type=\"hidden\" name=\"reltype\" value=\"", htmlspecialchars($_REQUEST['reltype']), "\" />\n";
			echo "<input type=\"hidden\" name=\"relation\" value=\"", htmlspecialchars($_REQUEST['relation']), "\" />\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"ok\" value=\"{$lang['strcreate']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";

		}
		else {
			if (trim($_POST['name']) == '')
				createRule(true, $lang['strruleneedsname']);
			else {
				$status = $data->createRule($_POST['name'],
					$_POST['event'], $_POST['relation'], $_POST['where'],
					isset($_POST['instead']), $_POST['type'], $_POST['raction']);
				if ($status == 0)
					doDefault($lang['strrulecreated']);
				else
					createRule(true, $lang['strrulecreatedbad']);
			}
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']),
				$misc->printVal($_REQUEST['relation']), ": " , $misc->printVal($_REQUEST['rule']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdroprule'], $misc->printVal($_REQUEST['rule']),
				$misc->printVal($_REQUEST['relation'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"reltype\" value=\"", htmlspecialchars($_REQUEST['reltype']), "\" />\n";
			echo "<input type=\"hidden\" name=\"relation\" value=\"", htmlspecialchars($_REQUEST['relation']), "\" />\n";
			echo "<input type=\"hidden\" name=\"rule\" value=\"", htmlspecialchars($_REQUEST['rule']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropRule($_POST['rule'], $_POST['relation'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strruledropped']);
			else
				doDefault($lang['strruledroppedbad']);
		}

	}

	/**
	 * List all the rules on the table
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $PHP_SELF;
		global $lang;

		if ($_REQUEST['reltype'] == 'table') $misc->printTableNav();
		else $misc->printViewNav();		
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['relation']), ": {$lang['strrules']}</h2>\n";
		$misc->printMsg($msg);

		$rules = &$data->getRules($_REQUEST['relation']);
		
		if ($rules->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th><th class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			
			while (!$rules->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", $misc->printVal( $rules->f[$data->rlFields['rulename']]), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal( $rules->f[$data->rlFields['ruledef']]), "</td>";
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&amp;{$misc->href}&amp;rule=", urlencode($rules->f[$data->rlFields['rulename']]),
					"&amp;reltype=", urlencode($_REQUEST['reltype']), "&amp;relation=", urlencode($_REQUEST['relation']), "\">{$lang['strdrop']}</a></td></tr>\n";

				$rules->movenext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnorules']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create_rule&amp;{$misc->href}&amp;reltype=", 
			urlencode($_REQUEST['reltype']), "&amp;relation=", urlencode($_REQUEST['relation']), "\">{$lang['strcreaterule']}</a></p>\n";
	}

	// Different header if we're view rules or table rules
	if ($_REQUEST['reltype'] == 'table') {
		$_REQUEST['table'] = $_REQUEST['relation'];
		$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['relation'] . ' - ' . $lang['strrules']);
	}
	else {
		$_REQUEST['view'] = $_REQUEST['relation'];
		$misc->printHeader($lang['strviews'] . ' - ' . $_REQUEST['relation'] . ' - ' . $lang['strrules']);
	}
	$misc->printBody();
	
	switch ($action) {
		case 'create_rule':
			createRule(true);
			break;
		case 'save_create_rule':
			if (isset($_POST['cancel'])) doDefault();
			else createRule(false);
			break;
		case 'drop':
			if (isset($_POST['yes'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();

?>
