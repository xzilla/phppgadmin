<?php

	/**
	 * List triggers on a table
	 *
	 * $Id: triggers.php,v 1.1 2003/01/19 02:47:25 chriskl Exp $
	 */

	// Include application functions
	include_once('conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $strDrop, $strConfDropTrigger, $strTriggerDropped, $strTriggerDroppedBad, $strYes, $strNo;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['trigger']), ": {$strDrop}</h2>\n";

			echo "<p>", sprintf($strConfDropTrigger, htmlspecialchars($_REQUEST['trigger']),
				htmlspecialchars($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=\"hidden\" name=\"trigger\" value=\"", htmlspecialchars($_REQUEST['trigger']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=\"submit\" name=\"choice\" value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropTrigger($_POST['trigger'], $_POST['table']);
			if ($status == 0)
				doDefault($strTriggerDropped);
			else
				doDefault($strTriggerDroppedBad);
		}

	}

	/**
	 * List all the triggers on the table
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $strTriggers, $strName, $strActions, $strNoTriggers, $strCreateTrigger, $strDrop;

		$misc->printTableNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strTriggers}</h2>\n";
		$misc->printMsg($msg);

		$triggers = &$localData->getTriggers($_REQUEST['table']);

		if ($triggers->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th><th class=\"data\">{$strActions}</th>\n";
			$i = 0;
			
			while (!$triggers->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&trigger=", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]),
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$strDrop}</td></tr>\n";

				$triggers->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$strNoTriggers}</p>\n";
		
		//echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']), "\">{$strCreateTrigger}</a></p>\n";
	}

	$misc->printHeader($strTables . ' - ' . $_REQUEST['table'] . ' - ' . $strTriggers);

	switch ($action) {
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == $strYes) doDrop(false);
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
