<?php

	/**
	 * List triggers on a table
	 *
	 * $Id: triggers.php,v 1.10 2003/03/26 02:14:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	include_once('classes/class.select.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['trigger']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdroptrigger'], htmlspecialchars($_REQUEST['trigger']),
				htmlspecialchars($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=\"hidden\" name=\"trigger\" value=\"", htmlspecialchars($_REQUEST['trigger']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$lang['stryes']}\"> <input type=\"submit\" name=\"choice\" value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropTrigger($_POST['trigger'], $_POST['table']);
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
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>{$lang['strcreatetrigger']}</h2>";
		$misc->printMsg($msg);
		
		// Get all the functions that can be used in triggers
		$funcs = &$localData->getTriggerFunctions();
		if ($funcs->recordCount() == 0) {
			doDefault($lang['strnofunctions']);
			return;
		}

		/* Populate functions */
		$sel0 = new XHTML_Select('formFunction');
		while (!$funcs->EOF) {
			$sel0->add(new XHTML_Option($funcs->f[$data->fnFields['fnname']]));
			$funcs->moveNext();
		}

		/* Populate times */
		$sel1 = new XHTML_Select('formExecTime');
		$sel1->set_data($localData->triggerExecTimes);

		/* Populate events */
		$sel2 = new XHTML_Select('formEvent');
		$sel2->set_data($localData->triggerEvents);
		
		echo "<form action=\"$PHP_SELF\" method=\"POST\">\n";
		echo "<table>\n";
		echo "<tr><th colspan=\"2\" class=\"data\">{$lang['strname']}</th></tr>\n";
		echo "<tr><td colspan=\"2\" class=\"data1\"><input type=\"text\" name=\"formTriggerName\" size=\"32\"/></td></tr>\n";
		echo "<tr>\n";
		echo "    <th class=\"data\">{$lang['strwhen']}</th>\n";
		echo "    <th class=\"data\">{$lang['strevent']}</th>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "     <td class=\"data1\">", $sel1->fetch(), "</td>\n";
		echo "     <td class=\"data1\">", $sel2->fetch(), "</td>\n";
		echo "</tr>\n";
		echo "<tr><th class=\"data\">{$lang['strfunction']}</th>\n";
		echo "<th class=\"data\">{$lang['strarguments']}</th></tr>\n";
		echo "<tr><td class=\"data1\">", $sel0->fetch(), "</td>\n";
		echo "<td class=\"data1\">(<input type=\"text\" name=\"formTriggerArgs\" size=\"32\"/>)</td>\n";
		echo "</tr></table>\n";
		echo "<p><input type=\"submit\" value=\"{$lang['strsave']}\"> <input type=\"reset\" value=\"{$lang['strreset']}\"></p>\n";
		echo "<input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
	    	echo $misc->form;
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new trigger in the database
	 */
	function doSaveCreate() {
		global $localData;
		global $PHP_SELF, $lang;		
	
		// Check that they've given a name and a definition

		if ($_POST['formFunction'] == '')
			doCreate($lang['strtriggerneedsfunc']);
		elseif ($_POST['formTriggerName'] == '')
			doCreate($lang['strtriggerneedsname']);
		elseif ($_POST['formEvent'] == '') 
			doCreate();
		else {		 
			$status = &$localData->createTrigger($_POST['formTriggerName'], $_POST['table'],
					$_POST['formFunction'], $_POST['formExecTime'], $_POST['formEvent'],
					$_POST['formTriggerArgs']);
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
		global $data, $localData, $misc, $database;
		global $PHP_SELF;
		global $lang;

		$misc->printTableNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$lang['strtriggers']}</h2>\n";
		$misc->printMsg($msg);

		$triggers = &$localData->getTriggers($_REQUEST['table']);

		if ($triggers->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th><th class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;

			while (!$triggers->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "</td>";
				echo "<td class=\"data{$id}\">";
				// Nasty hack to support pre-7.4 PostgreSQL
				if ($triggers->f[$data->tgFields['tgdef']] !== null)
					echo htmlspecialchars($triggers->f[$data->tgFields['tgdef']]);
				else 
					echo $localData->getTriggerDef($triggers->f);
				echo "</td>\n<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&trigger=", urlencode( $triggers->f[$data->tgFields['tgname']]),
					"&table=", urlencode($_REQUEST['table']), "\">{$lang['strdrop']}</td></tr>\n";

				$triggers->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnotriggers']}</p>\n";

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}&table=", urlencode($_REQUEST['table']), "\">{$lang['strcreatetrigger']}</a></p>\n";
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strtriggers']);
	$misc->printBody();

	switch ($action) {
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
