<?php

	/**
	 * List triggers on a table
	 *
	 * $Id: triggers.php,v 1.6 2003/03/17 05:20:30 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	include_once('classes/class.select.php');
	
	// Constants to figure out tgtype
	
	define ('TRIGGER_TYPE_ROW', (1 << 0) );
	define ('TRIGGER_TYPE_BEFORE', (1 << 1) );
	define ('TRIGGER_TYPE_INSERT', (1 << 2) );
	define ('TRIGGER_TYPE_DELETE', (1 << 3) );
	define ('TRIGGER_TYPE_UPDATE', (1 << 4) );
		
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];


	
	function getTriggerExecTime($type) {
	    $execTime = "AFTER";
		if ($type & TRIGGER_TYPE_BEFORE) $execTime = "BEFORE";
		
		return $execTime;
	}

	function getTriggerEvent($type) {
		if ($type & TRIGGER_TYPE_INSERT) $event = "INSERT";
		elseif ($type & TRIGGER_TYPE_DELETE) $event = "DELETE";
		
		if ($type & TRIGGER_TYPE_UPDATE) $event .= (empty($event)) ? "UPDATE" : " OR UPDATE";
		
		return $event;

	}
	
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
    // global $lang['strcreatetrigger'], $lang['strsave'], $lang['strreset'], $lang['strfunction'],$lang['strtriggername'],
		global $strTriggerEvents, $strTriggerWhen,$strTriggerNeedsFunction;
		global $strTriggerFunction,$strTriggerEvent,$strTriggerExecTimes;
		global $strTriggerArgs;
		
		
		echo "<h2>{$lang['strcreatetrigger']}</h2>";

		$misc->printMsg($msg);
		
		// List only functions, that return "trigger"
		$funcs = &$localData->getFunctions(false, 'trigger');

		if ($funcs->recordCount() == 0) {
			echo "<p class='message'>" . $strTriggerNeedsFunction . "</p>";
			return;
		}

		
		/* Populate functions */
		$sel0 = new XHTML_Select("formFunction");
		$sel0->set_style("width: 20em;");
		while (!$funcs->EOF) {
			$sel0->add(new XHTML_Option($funcs->f[$data->fnFields['fnname']]));
			$funcs->moveNext();
		}	

		$sel1 = new XHTML_Select('formExecTime');
		$sel1->set_style("width: 7em;");
		$sel1->set_data($localData->triggerExecTimes);

		/* Populate events */
		$sel2 = new XHTML_Select('formEvent');
		$sel2->set_style("width: 7em;");
		$sel2->set_data($localData->triggerEvents);
		
		echo "<form action=\"$PHP_SELF\" method=\"POST\">\n";
		echo "<table>";
		echo "<tr><th colspan=\"4\" class=\"data\">{$lang['strtriggername']}</th>";
		echo "</tr>";
		echo "<tr><td colspan=\"4\" class=\"data1\"><input type=\"text\" name=\"formTriggerName\" size=\"80\"/></th>";
		echo "</tr>";
		echo "<tr><th class=\"data\">&nbsp;</th>";
		echo "    <th class=\"data\">{$lang['strfunction']}</th>";
		echo "    <th class=\"data\">{$strTriggerWhen}</th>";
		echo "    <th class=\"data\">{$strTriggerEvent}</th>";
		echo "</tr>";
		echo " <tr><td class=\"data1\">{$strTriggerFunction}</td>\n";
		echo "     <td class=\"data1\">" . $sel0->fetch() ."</td>";
		echo "     <td class=\"data1\">" . $sel1->fetch() . "</td>";
		echo "     <td class=\"data1\">" . $sel2->fetch() . "</td>";
		echo "</tr>";
		echo "<th colspan=\"4\" class=\"data\">{$strTriggerArgs}</th>";
		echo "<tr><td colspan=\"4\" class=\"data1\"><input type=\"text\" name=\"formTriggerArgs\" size=\"80\"/></th>";
		echo "</table>";
		echo "<p><input type=submit value=\"{$lang['strsave']}\"> <input type=reset value=\"{$lang['strreset']}\"></p>\n";
		echo "<input type=hidden value=save_create name=\"action\">";
		echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
	    echo $misc->form;
		echo "</form>";
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
				//$execTime = htmlspecialchars( getTriggerExecTime($triggers->f[$data->tgFields['tgtype']]));
				//$event    = htmlspecialchars( getTriggerEvent($triggers->f[$data->tgFields['tgtype']]));
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "</td>";
				echo "<td class=\"data{$id}\">", htmlspecialchars( $triggers->f[$data->tgFields['tgdef']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&trigger=", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]),
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$lang['strdrop']}</td></tr>\n";

				$triggers->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnotriggers']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']), "\">{$lang['strcreatetrigger']}</a></p>\n";
	}

	/**
	 * Actually creates the new trigger in the database
	 */
	function doSaveCreate() {
		global $data, $localData, $misc, $database;
		global $PHP_SELF, $lang;
		global $strTriggerNeedsFunction, $strTriggerDone;
		
	
		// Check that they've given a name and a definition

		if ($_POST['formFunction'] == '') 
			doCreate($strTriggerNeedsFunction);
		elseif ($_POST['formExecTime'] == '') 
			doCreate();
		elseif ($_POST['formTriggerName'] == '') 
			doCreate($lang['strtriggerneedsname']);
		elseif ($_POST['formEvent'] == '') 
			doCreate();
		else {		 
			$status = &$localData->createTrigger($_POST['formTriggerName'],$_POST['table'], $_POST['formFunction'], $_POST['formExecTime'] , $_POST['formEvent']);
			if ($status == 0)
				doDefault($strTriggerDone);
			else
				doCreate($strTriggerFailed);
		}
	}	
	
	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strtriggers']);

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
