<?php

	/**
	 * List rules on a table
	 *
	 * $Id: rules.php,v 1.5 2003/03/17 05:20:30 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Confirm and then actually create a rule
	 */
	function createRule($confirm, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_POST['name'])) $_POST['name'] = '';
		if (!isset($_POST['event'])) $_POST['event'] = '';
		if (!isset($_POST['where'])) $_POST['where'] = '';
		if (!isset($_POST['type'])) $_POST['type'] = 'SOMETHING';
		if (!isset($_POST['raction'])) $_POST['raction'] = '';

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: ",
				htmlspecialchars($_REQUEST['table']), ": {$strCreateRule}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th>\n";
			echo "<td class=\"data1\"><input name=\"name\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['name']), "\"></td></tr>\n";
			echo "<tr><th class=\"data\">{$strEvent}</th>\n";
			echo "<td class=\"data1\"><select name=\"event\">\n";
			foreach ($data->rule_events as $v) {
				echo "<option value=\"{$v}\"", ($v == $_POST['event']) ? ' selected' : '',
				">{$v}</option>\n";
			}
			echo "</select></td></tr>\n";
			echo "<tr><th class=\"data\">{$strWhere}</th>\n";
			echo "<td class=\"data1\"><input name=\"where\" size=\"32\" value=\"",
				htmlspecialchars($_POST['where']), "\"></td></tr>\n";
			echo "<tr><th class=\"data\">{$strInstead}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input type=\"checkbox\" name=\"instead\" ", (isset($_POST['instead'])) ? ' checked' : '', ">\n";
			echo "</td></tr>\n";
			echo "<tr><th class=\"data\">{$strAction}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input type=\"radio\" name=\"type\" value=\"NOTHING\"", ($_POST['type'] == 'NOTHING') ? ' checked' : '', "> NOTHING<br />\n";
			echo "<input type=\"radio\" name=\"type\" value=\"SOMETHING\"", ($_POST['type'] == 'SOMETHING') ? ' checked' : '', ">\n";
			echo "(<input name=\"raction\" size=\"32\" value=\"",
				htmlspecialchars($_POST['raction']), "\">)</td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save_create_rule\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"ok\" value=\"{$strOK}\"> <input type=\"submit\" name=\"cancel\" value=\"{$strCancel}\"></p>\n";
			echo "</form>\n";

		}
		else {
			if (trim($_POST['name']) == '')
				createRule(true, $strRuleNeedsName);
			else {
				$status = $localData->createRule($_POST['name'],
					$_POST['event'], $_POST['table'], $_POST['where'],
					isset($_POST['instead']), $_POST['type'], $_POST['raction']);
				if ($status == 0)
					doDefault($strRuleCreated);
				else
					createRule(true, $strRuleCreatedBad);
			}
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;
		global $strTables;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['rule']), ": Drop</h2>\n";

			echo "<p>", sprintf($lang['strconfdroprule'], htmlspecialchars($_REQUEST['rule']),
				htmlspecialchars($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=\"hidden\" name=\"rule\" value=\"", htmlspecialchars($_REQUEST['rule']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=\"submit\" name=\"choice\" value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropRule($_POST['rule'], $_POST['table']);
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
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $lang;

		$misc->printTableNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$lang['strrules']}</h2>\n";
		$misc->printMsg($msg);

		$rules = &$localData->getRules($_REQUEST['table']);
		
		if ($rules->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th><th class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			
			while (!$rules->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $rules->f[$data->rlFields['rulename']]), "</td>";
				echo "<td class=\"data{$id}\">", htmlspecialchars( $rules->f[$data->rlFields['ruledef']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&rule=", htmlspecialchars( $rules->f[$data->rlFields['rulename']]),
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$lang['strdrop']}</td></tr>\n";

				$rules->movenext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnorules']}</p>\n";

		echo "<p><a href=\"{$PHP_SELF}?action=create_rule&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']),
			"\">{$strCreateRule}</a></p>\n";
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strrules']);
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
			if ($_POST['choice'] == $lang['stryes']) doDrop(false);
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
