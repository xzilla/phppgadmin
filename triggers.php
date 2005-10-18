<?php

	/**
	 * List triggers on a table
	 *
	 * $Id: triggers.php,v 1.28 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	include_once('./classes/class.select.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/** 
	 * Function to save after altering a trigger
	 */
	function doSaveAlter() {
		global $data, $lang;
		
		$status = $data->alterTrigger($_POST['table'], $_POST['trigger'], $_POST['name']);
		if ($status == 0)
			doDefault($lang['strtriggeraltered']);
		else
			doAlter($lang['strtriggeralteredbad']);
	}

	/**
	 * Function to allow altering of a trigger
	 */
	function doAlter($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('trigger');
		$misc->printTitle($lang['stralter'],'pg.trigger.alter');
		$misc->printMsg($msg);
		
		$triggerdata = $data->getTrigger($_REQUEST['table'], $_REQUEST['trigger']);
		
		if ($triggerdata->recordCount() > 0) {
			
			if (!isset($_POST['name'])) $_POST['name'] = $triggerdata->f['tgname'];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th>\n";
			echo "<td class=\"data1\">";
			echo "<input name=\"name\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
				htmlspecialchars($_POST['name']), "\" />\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"alter\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"trigger\" value=\"", htmlspecialchars($_REQUEST['trigger']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"alter\" value=\"{$lang['strok']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('trigger');
			$misc->printTitle($lang['strdrop'],'pg.trigger.drop');

			echo "<p>", sprintf($lang['strconfdroptrigger'], $misc->printVal($_REQUEST['trigger']),
				$misc->printVal($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"trigger\" value=\"", htmlspecialchars($_REQUEST['trigger']), "\" />\n";
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
			$status = $data->dropTrigger($_POST['trigger'], $_POST['table'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strtriggerdropped']);
			else
				doDefault($lang['strtriggerdroppedbad']);
		}

	}

	/**
	 * Let them create s.th.
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('table');
		$misc->printTitle($lang['strcreatetrigger'],'pg.trigger.create');
		$misc->printMsg($msg);
		
		// Get all the functions that can be used in triggers
		$funcs = $data->getTriggerFunctions();
		if ($funcs->recordCount() == 0) {
			doDefault($lang['strnofunctions']);
			return;
		}

		/* Populate functions */
		$sel0 = new XHTML_Select('formFunction');
		while (!$funcs->EOF) {
			$sel0->add(new XHTML_Option($funcs->f['proname']));
			$funcs->moveNext();
		}

		/* Populate times */
		$sel1 = new XHTML_Select('formExecTime');
		$sel1->set_data($data->triggerExecTimes);

		/* Populate events */
		$sel2 = new XHTML_Select('formEvent');
		$sel2->set_data($data->triggerEvents);
		
		/* Populate occurences */
		$sel3 = new XHTML_Select('formFrequency');
		$sel3->set_data($data->triggerFrequency);
		
		echo "<form action=\"$PHP_SELF\" method=\"POST\">\n";
		echo "<table>\n";
		echo "<tr>\n";
		echo "		<th class=\"data\">{$lang['strname']}</th>\n";
		echo "		<th class=\"data\">{$lang['strwhen']}</th>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "		<td class=\"data1\"> <input type=\"text\" name=\"formTriggerName\" size=\"32\" /></td>\n";
		echo "		<td class=\"data1\"> ", $sel1->fetch(), "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "    <th class=\"data\">{$lang['strevent']}</th>\n";
		echo "    <th class=\"data\">{$lang['strforeach']}</th>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "     <td class=\"data1\"> ", $sel2->fetch(), "</td>\n";
		echo "     <td class=\"data1\"> ", $sel3->fetch(), "</td>\n";
		echo "</tr>\n";
		echo "<tr><th class=\"data\"> {$lang['strfunction']}</th>\n";
		echo "<th class=\"data\"> {$lang['strarguments']}</th></tr>\n";
		echo "<tr><td class=\"data1\">", $sel0->fetch(), "</td>\n";
		echo "<td class=\"data1\">(<input type=\"text\" name=\"formTriggerArgs\" size=\"32\" />)</td>\n";
		echo "</tr></table>\n";
		echo "<p><input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
		echo $misc->form;
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new trigger in the database
	 */
	function doSaveCreate() {
		global $data;
		global $PHP_SELF, $lang;		
	
		// Check that they've given a name and a definition

		if ($_POST['formFunction'] == '')
			doCreate($lang['strtriggerneedsfunc']);
		elseif ($_POST['formTriggerName'] == '')
			doCreate($lang['strtriggerneedsname']);
		elseif ($_POST['formEvent'] == '') 
			doCreate();
		else {		 
			$status = $data->createTrigger($_POST['formTriggerName'], $_POST['table'],
					$_POST['formFunction'], $_POST['formExecTime'], $_POST['formEvent'],
					$_POST['formFrequency'], $_POST['formTriggerArgs']);
			if ($status == 0)
				doDefault($lang['strtriggercreated']);
			else
				doCreate($lang['strtriggercreatedbad']);
		}
	}	

	/**
	 * List all the triggers on the table
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF;
		global $lang;

		function tgPre(&$rowdata) {
			global $data, $lang;
			// Nasty hack to support pre-7.4 PostgreSQL
			$rowdata->f['+tgdef'] = $rowdata->f['tgdef'] !== null
									? $rowdata->f['tgdef']
									: $data->getTriggerDef($rowdata->f);
		}
		
		$misc->printTrail('table');
		$misc->printTabs('table','triggers');
		$misc->printMsg($msg);

		$triggers = $data->getTriggers($_REQUEST['table']);

		$columns = array(
			'trigger' => array(
				'title' => $lang['strname'],
				'field' => 'tgname',
			),
			'definition' => array(
				'title' => $lang['strdefinition'],
				'field' => '+tgdef',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
		);

		$actions = array(
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "{$PHP_SELF}?action=confirm_alter&amp;{$misc->href}&amp;table=".urlencode($_REQUEST['table'])."&amp;",
				'vars'  => array('trigger' => 'tgname'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;table=".urlencode($_REQUEST['table'])."&amp;",
				'vars'  => array('trigger' => 'tgname'),
			),
		);

		if (!$data->hasAlterTrigger()) unset($actions['alter']);
		
		$misc->printTable($triggers, $columns, $actions, $lang['strnotriggers'], 'tgPre');
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&amp;{$misc->href}&amp;table=", urlencode($_REQUEST['table']), "\">{$lang['strcreatetrigger']}</a></p>\n";
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strtriggers']);
	$misc->printBody();

	switch ($action) {
		case 'alter':
			if (isset($_POST['alter'])) doSaveAlter();
			else doDefault();
			break;
		case 'confirm_alter':
			doAlter();
			break;
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':
			doCreate();
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
