<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.3 2002/09/16 10:12:01 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop column and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", 
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['column']), ": Drop</h2>\n";

			echo "<p>Are you sure you want to drop the column \"", htmlspecialchars($_REQUEST['column']),
				"\" from table \"", htmlspecialchars($_REQUEST['table']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=column value=\"", htmlspecialchars($_REQUEST['column']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropColumn($_POST['table'], $_POST['column'], 'RESTRICT');
			if ($status == 0)
				doDefault('Column dropped.');
			else
				doDefault('Column drop failed.');
		}
		
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData;
		global $PHP_SELF, $strTable, $strOwner, $strActions, $strNoTables;
		global $strBrowse, $strProperties, $strDrop, $strShowAllTables;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), "</h2>\n";

		$attrs = &$localData->getTableAttributes($_REQUEST['table']);

		if ($attrs->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>Field</th><th class=data>Type</th><th class=data>Not Null</th><th class=data>Default</th><th colspan=2 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$attrs->EOF) {
				$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($attrs->f['attname']), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($attrs->f['type']), "</td>\n";
				echo "<td class=data{$id}>", ($attrs->f['attnotnull'] ? 'NOT NULL' : ''), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($attrs->f['adsrc']), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?database=",
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($_REQUEST['table']),
					"&column=", htmlspecialchars($attrs->f['attname']), "&action=properties\">{$strProperties}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?database=",
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($_REQUEST['table']),
					"&column=", htmlspecialchars($attrs->f['attname']), "&action=confirm_drop\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$attrs->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$strNoTable}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"tables.php?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
		case 'drop':
			if ($_POST['choice'] == 'Yes') doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		default:
			doDefault();
			break;
	}	

	echo "</body>\n";
	echo "</html>\n";

?>
