<?php

	/**
	 * List constraints on a table
	 *
	 * $Id: constraints.php,v 1.17 2003/05/20 05:42:48 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	include_once('classes/class.select.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];


	/**
	 * Confirm and then actually add a FOREIGN KEY constraint
	 */
	function addForeignKey($stage, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_POST['name'])) $_POST['name'] = '';
		if (!isset($_POST['target'])) $_POST['target'] = '';

		switch ($stage) {
			case 2:
			
				// Copy the IndexColumnList variable from stage 2
				if (isset($_REQUEST['IndexColumnList']) && !isset($_REQUEST['SourceColumnList']))
					$_REQUEST['SourceColumnList'] = serialize($_REQUEST['IndexColumnList']);
				
				// Initialise variables
				if (!isset($_POST['upd_action'])) $_POST['upd_action'] = null;
				if (!isset($_POST['del_action'])) $_POST['del_action'] = null;
				
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
					$misc->printVal($_REQUEST['table']), ": {$lang['straddfk']}</h2>\n";
				$misc->printMsg($msg);

				$attrs = &$localData->getTableAttributes($_REQUEST['target']);

				$selColumns = new XHTML_select('TableColumnList', true, 10);
				$selColumns->set_style('width: 10em;');

				if ($attrs->recordCount() > 0) {
					while (!$attrs->EOF) {
						$selColumns->add(new XHTML_Option($attrs->f['attname']));
						$attrs->moveNext();
					}
				}

				$selIndex = new XHTML_select('IndexColumnList[]', true, 10);
				$selIndex->set_style('width: 10em;');
				$selIndex->set_attribute('id', 'IndexColumnList');
				$buttonAdd = new XHTML_Button('add', '>>');
				$buttonAdd->set_attribute('onclick', 'buttonPressed(this);');
				$buttonAdd->set_attribute('type', 'button');

				$buttonRemove = new XHTML_Button('remove', '<<');
				$buttonRemove->set_attribute('onclick', 'buttonPressed(this);');
				$buttonRemove->set_attribute('type', 'button');

				echo "<form onsubmit=\"doSelectAll();\" name=\"formIndex\" action=\"$PHP_SELF\" method=\"post\">\n";	

				echo "<table>\n";
				echo "<tr><th class=\"data\">{$lang['strtablecolumnlist']}</th><th class=\"data\">&nbsp;</th><th class=data>{$lang['strfkcolumnlist']}</th></tr>\n";
				echo "<tr><td class=\"data1\">" . $selColumns->fetch() . "</td>\n";
				echo "<td class=\"data1\" align=\"center\">" . $buttonRemove->fetch() . $buttonAdd->fetch() . "</td>";
				echo "<td class=\"data1\">" . $selIndex->fetch() . "</td></tr>\n";
				echo "<tr><th class=\"data\" colspan=\"3\">{$lang['stractions']}</th></tr>";
				echo "<tr>";
				echo "<td class=\"data1\" colspan=\"3\">\n";				
				// ON SELECT actions
				echo "{$lang['stronupdate']} <select name=\"upd_action\">";
				foreach ($data->fkactions as $v) {
					echo "<option value=\"{$v}\"", ($_POST['upd_action'] == $v) ? ' selected="selected"' : '', ">{$v}</option>\n";
				}
				echo "</select><br />\n";
				// ON DELETE actions
				echo "{$lang['strondelete']} <select name=\"del_action\">";
				foreach ($data->fkactions as $v) {
					echo "<option value=\"{$v}\"", ($_POST['del_action'] == $v) ? ' selected="selected"' : '', ">{$v}</option>\n";
				}
				echo "</select>\n";				
				echo "</td></tr>";
				echo "</table>\n";

				echo "<p><input type=\"hidden\" name=\"action\" value=\"save_add_foreign_key\">\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
				echo "<input type=\"hidden\" name=\"name\" value=\"", htmlspecialchars($_REQUEST['name']), "\">\n";
				echo "<input type=\"hidden\" name=\"target\" value=\"", htmlspecialchars($_REQUEST['target']), "\">\n";
				echo "<input type=\"hidden\" name=\"SourceColumnList\" value=\"", htmlspecialchars($_REQUEST['SourceColumnList']), "\">\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"3\">\n";
				echo "<input type=\"submit\" value=\"{$lang['stradd']}\"> <input type=\"reset\" value=\"{$lang['strreset']}\"></p>\n";
				echo "</form>\n";

				echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}&table=", urlencode($_REQUEST['table']),
					"\">{$lang['strshowallconstraints']}</a></p>\n";
				break;
			case 3:
				// Check that they've given at least one column
				if (isset($_POST['SourceColumnList'])) $temp = unserialize($_POST['SourceColumnList']);
				if (!isset($_POST['IndexColumnList']) || !is_array($_POST['IndexColumnList'])
						|| sizeof($_POST['IndexColumnList']) == 0 || !isset($temp) 
						|| !is_array($temp) || sizeof($temp) == 0) addForeignKey(2, $lang['strfkneedscols']);
				else {
					$status = $localData->addForeignKey($_POST['table'], $_POST['target'], unserialize($_POST['SourceColumnList']), 
						$_POST['IndexColumnList'], $_POST['upd_action'], $_POST['del_action'], $_POST['name']);
					if ($status == 0)
						doDefault($lang['strfkadded']);
					else
						addForeignKey(2, $lang['strfkaddedbad']);
				}
				break;
			default:
				echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
					$misc->printVal($_REQUEST['table']), ": {$lang['straddfk']}</h2>\n";
				$misc->printMsg($msg);

				$attrs = &$localData->getTableAttributes($_REQUEST['table']);
				$tables = &$localData->getTables(true);

				$selColumns = new XHTML_select('TableColumnList', true, 10);
				$selColumns->set_style('width: 10em;');

				if ($attrs->recordCount() > 0) {
					while (!$attrs->EOF) {
						$selColumns->add(new XHTML_Option($attrs->f['attname']));
						$attrs->moveNext();
					}
				}

				$selIndex = new XHTML_select('IndexColumnList[]', true, 10);
				$selIndex->set_style('width: 10em;');
				$selIndex->set_attribute('id', 'IndexColumnList');
				$buttonAdd = new XHTML_Button('add', '>>');
				$buttonAdd->set_attribute('onclick', 'buttonPressed(this);');
				$buttonAdd->set_attribute('type', 'button');

				$buttonRemove = new XHTML_Button('remove', '<<');
				$buttonRemove->set_attribute('onclick', 'buttonPressed(this);');
				$buttonRemove->set_attribute('type', 'button');

				echo "<form onsubmit=\"doSelectAll();\" name=\"formIndex\" action=\"$PHP_SELF\" method=\"post\">\n";	

				echo "<table>\n";
				echo "<tr><th class=\"data\" colspan=\"3\">{$lang['strname']}</th></tr>";
				echo "<tr>";
				echo "<td class=\"data1\" colspan=\"3\"><input type=\"text\" name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" /></td></tr>";
				echo "<tr><th class=\"data\">{$lang['strtablecolumnlist']}</th><th class=\"data\">&nbsp;</th><th class=data>{$lang['strfkcolumnlist']}</th></tr>\n";
				echo "<tr><td class=\"data1\">" . $selColumns->fetch() . "</td>\n";
				echo "<td class=\"data1\" align=\"center\">" . $buttonRemove->fetch() . $buttonAdd->fetch() . "</td>";
				echo "<td class=data1>" . $selIndex->fetch() . "</td></tr>\n";
				echo "<tr><th class=\"data\" colspan=\"3\">{$lang['strfktarget']}</th></tr>";
				echo "<tr>";
				echo "<td class=\"data1\" colspan=\"3\"><select name=\"target\">";
				while (!$tables->EOF) {
					echo "<option value=\"", htmlspecialchars($tables->f['tablename']), "\">",
						htmlspecialchars($tables->f['tablename']), "</option>\n";
					$tables->moveNext();	
				}
				echo "</select>\n";
				echo "</td></tr>";
				echo "</table>\n";

				echo "<p><input type=\"hidden\" name=\"action\" value=\"save_add_foreign_key\">\n";
				echo $misc->form;
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
				echo "<input type=\"hidden\" name=\"stage\" value=\"2\">\n";
				echo "<input type=\"submit\" value=\"{$lang['stradd']}\"> <input type=\"reset\" value=\"{$lang['strreset']}\"></p>\n";
				echo "</form>\n";

				echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}&table=", urlencode($_REQUEST['table']),
					"\">{$lang['strshowallconstraints']}</a></p>\n";
				break;
		}

	}

	/**
	 * Confirm and then actually add a PRIMARY KEY or UNIQUE constraint
	 */
	function addPrimaryOrUniqueKey($type, $confirm, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_POST['name'])) $_POST['name'] = '';

		if ($confirm) {
			if (!isset($_POST['name'])) $_POST['name'] = '';

			if ($type == 'primary') $desc = $lang['straddpk'];
			elseif ($type == 'unique') $desc = $lang['stradduniq'];
			else {
				doDefault($lang['strinvalidparam']);
				return;
			}

			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
				$misc->printVal($_REQUEST['table']), ": {$desc}</h2>\n";
			$misc->printMsg($msg);
			
			$attrs = &$localData->getTableAttributes($_REQUEST['table']);
	
			$selColumns = new XHTML_select('TableColumnList', true, 10);
			$selColumns->set_style('width: 10em;');
	
			if ($attrs->recordCount() > 0) {
				while (!$attrs->EOF) {
					$selColumns->add(new XHTML_Option($attrs->f['attname']));
					$attrs->moveNext();
				} 
			}
	
			$selIndex = new XHTML_select('IndexColumnList[]', true, 10);
			$selIndex->set_style('width: 10em;');
			$selIndex->set_attribute('id', 'IndexColumnList');
			$buttonAdd = new XHTML_Button('add', '>>');
			$buttonAdd->set_attribute('onclick', 'buttonPressed(this);');
			$buttonAdd->set_attribute('type', 'button');
	
			$buttonRemove = new XHTML_Button('remove', '<<');
			$buttonRemove->set_attribute('onclick', 'buttonPressed(this);');
			$buttonRemove->set_attribute('type', 'button');
	
			echo "<form onsubmit=\"doSelectAll();\" name=\"formIndex\" action=\"$PHP_SELF\" method=\"post\">\n";	
	
			echo "<table>\n";
			echo "<tr><th class=\"data\" colspan=\"3\">{$lang['strname']}</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\" colspan=\"3\"><input type=\"text\" name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" /></td></tr>";
			echo "<tr><th class=\"data\">{$lang['strtablecolumnlist']}</th><th class=\"data\">&nbsp;</th><th class=data>{$lang['strindexcolumnlist']}</th></tr>\n";
			echo "<tr><td class=\"data1\">" . $selColumns->fetch() . "</td>\n";
			echo "<td class=\"data1\" align=\"center\">" . $buttonRemove->fetch() . $buttonAdd->fetch() . "</td>";
			echo "<td class=data1>" . $selIndex->fetch() . "</td></tr>\n";
			echo "</table>\n";
	
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_add_primary_key\">\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($type), "\">\n";
			echo "<input type=\"submit\" value=\"{$lang['stradd']}\"> <input type=reset value=\"{$lang['strreset']}\"></p>\n";
			echo "</form>\n";
			
			echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}&table=", urlencode($_REQUEST['table']), 
				"\">{$lang['strshowallconstraints']}</a></p>\n";
		}
		else {
			if ($_POST['type'] == 'primary') {
				// Check that they've given at least one column
				if (!isset($_POST['IndexColumnList']) || !is_array($_POST['IndexColumnList'])
						|| sizeof($_POST['IndexColumnList']) == 0) addPrimaryOrUniqueKey($_POST['type'], true, $lang['strpkneedscols']);
				else {
					$status = $localData->addPrimaryKey($_POST['table'], $_POST['IndexColumnList'], $_POST['name']);
					if ($status == 0)
						doDefault($lang['strpkadded']);
					else
						addPrimaryOrUniqueKey($_POST['type'], true, $lang['strpkaddedbad']);
				}
			}
			elseif ($_POST['type'] == 'unique') {
				// Check that they've given at least one column
				if (!isset($_POST['IndexColumnList']) || !is_array($_POST['IndexColumnList'])
						|| sizeof($_POST['IndexColumnList']) == 0) addPrimaryOrUniqueKey($_POST['type'], true, $lang['struniqneedscols']);
				else {
					$status = $localData->addUniqueKey($_POST['table'], $_POST['IndexColumnList'], $_POST['name']);
					if ($status == 0)
						doDefault($lang['struniqadded']);
					else
						addPrimaryOrUniqueKey($_POST['type'], true, $lang['struniqaddedbad']);
				}
			}
			else doDefault($lang['strinvalidparam']);
		}
	}

	/**
	 * Confirm and then actually add a CHECK constraint
	 */
	function addCheck($confirm, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $lang;

		if (!isset($_POST['name'])) $_POST['name'] = '';
		if (!isset($_POST['definition'])) $_POST['definition'] = '';

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
				$misc->printVal($_REQUEST['table']), ": {$lang['straddcheck']}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
			echo "<th class=\"data\">{$lang['strdefinition']}</th></tr>\n";

			echo "<tr><td class=\"data1\"><input name=\"name\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['name']), "\"></td>\n";

			echo "<td class=\"data1\">(<input name=\"definition\" size=\"32\" value=\"",
				htmlspecialchars($_POST['definition']), "\">)</td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save_add_check\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"ok\" value=\"{$lang['strok']}\"> <input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\"></p>\n";
			echo "</form>\n";

		}
		else {
			if (trim($_POST['definition']) == '')
				addCheck(true, $lang['strcheckneedsdefinition']);
			else {
				$status = $localData->addCheckConstraint($_POST['table'],
					$_POST['definition'], $_POST['name']);
				if ($status == 0)
					doDefault($lang['strcheckadded']);
				else
					addCheck(true, $lang['strcheckaddedbad']);
			}
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
				$misc->printVal($_REQUEST['table']), ": " , $misc->printVal($_REQUEST['constraint']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdropconstraint'], $misc->printVal($_REQUEST['constraint']),
				$misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"constraint\" value=\"", htmlspecialchars($_REQUEST['constraint']), "\" />\n";
			echo "<input type=\"hidden\" name=\"type\" value=\"", htmlspecialchars($_REQUEST['type']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"choice\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"choice\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropConstraint($_POST['constraint'], $_POST['table'], $_POST['type'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strconstraintdropped']);
			else
				doDefault($lang['strconstraintdroppedbad']);
		}
	}

	/**
	 * List all the constraints on the table
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $lang;

		$misc->printTableNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strconstraints']}</h2>\n";
		$misc->printMsg($msg);

		$constraints = &$localData->getConstraints($_REQUEST['table']);

		if ($constraints->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th><th class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			
			while (!$constraints->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($constraints->f[$data->cnFields['conname']]), "</td>";
				echo "<td class=\"data{$id}\">";
				// Nasty hack to support pre-7.4 PostgreSQL
				if ($constraints->f['consrc'] !== null)
					echo $misc->printVal($constraints->f[$data->cnFields['consrc']]);
				else {
					$atts = &$localData->getKeys($_REQUEST['table'], explode(' ', $constraints->f['indkey']));
					echo ($constraints->f['contype'] == 'u') ? "UNIQUE (" : "PRIMARY KEY (";
					echo join(',', $atts);
					echo ")";
				}
				echo "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&constraint=", urlencode($constraints->f[$data->cnFields['conname']]),
					"&table=", urlencode($_REQUEST['table']), "&type=", urlencode($constraints->f['contype']), "\">{$lang['strdrop']}</td></tr>\n";

				$constraints->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnoconstraints']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=add_check&{$misc->href}&table=", urlencode($_REQUEST['table']),
			"\">{$lang['straddcheck']}</a> |\n";
		echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=add_unique_key&{$misc->href}&table=", urlencode($_REQUEST['table']),
			"\">{$lang['stradduniq']}</a> |\n";
		echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=add_primary_key&{$misc->href}&table=", urlencode($_REQUEST['table']),
			"\">{$lang['straddpk']}</a> |\n";
		echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=add_foreign_key&{$misc->href}&table=", urlencode($_REQUEST['table']),
			"\">{$lang['straddfk']}</a></p>\n";
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strconstraints'],
		"<script src=\"indexes.js\" type=\"text/javascript\"></script>");

	if ($action == 'add_unique_key' || $action == 'save_add_unique_key'
			|| $action == 'add_primary_key' || $action == 'save_add_primary_key'
			|| $action == 'add_foreign_key' || $action == 'save_add_foreign_key')
		echo "<body onload=\"init();\">";
	else
		$misc->printBody();

	switch ($action) {
		case 'add_foreign_key':
			addForeignKey(1);
			break;
		case 'save_add_foreign_key':
			if (isset($_POST['cancel'])) doDefault();
			else addForeignKey($_REQUEST['stage']);
			break;
		case 'add_unique_key':
			addPrimaryOrUniqueKey('unique', true);
			break;
		case 'save_add_unique_key':
			if (isset($_POST['cancel'])) doDefault();
			else addPrimaryOrUniqueKey('unique', false);
			break;
		case 'add_primary_key':
			addPrimaryOrUniqueKey('primary', true);
			break;
		case 'save_add_primary_key':
			if (isset($_POST['cancel'])) doDefault();
			else addPrimaryOrUniqueKey('primary', false);
			break;
		case 'add_check':
			addCheck(true);
			break;
		case 'save_add_check':
			if (isset($_POST['cancel'])) doDefault();
			else addCheck(false);
			break;
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
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
