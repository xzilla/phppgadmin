<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.4 2002/07/26 09:03:06 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDelRow($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", htmlspecialchars($_REQUEST['table']), ": Delete Row</h2>\n";

			echo "<p>Are you sure you want to delete this row?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=delrow>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=hidden name=offset value=\"", htmlspecialchars($_REQUEST['offset']), "\">\n";
			echo "<input type=hidden name=limit value=\"", htmlspecialchars($_REQUEST['limit']), "\">\n";
			echo "<input type=hidden name=key value=\"", htmlspecialchars(serialize($_REQUEST['key'])), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse('Row deleted.');
			else
				doBrowse('Row deletion failed.');
		}
		
	}
	
	/**
	 * Browse a table
	 */
	function doBrowse($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strActions;
		
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), "</h2>\n";
		$misc->printMsg($msg);

		$rs = &$localData->browseTable($_REQUEST['table'], $_REQUEST['offset'], $_REQUEST['limit']);
		
		// Fetch unique row identifier, if there is one
		$key = $localData->getRowIdentifier($_REQUEST['table']);
		
		if ($rs->recordCount() > 0) {
			echo "<table>\n<tr>";
			reset($rs->f);
			while(list($k, ) = each($rs->f)) {
				echo "<th class=data>", htmlspecialchars($k), "</td>";
			}
			
			// @@ CHECK THAT KEY ACTUALLY IS IN THE RESULT SET...
			
			if (sizeof($key) > 0)
				echo "<th colspan=2 class=data>{$strActions}</th>\n";
			
			$i = 0;
			reset($rs->f);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				while(list(, $v) = each($rs->f)) {
					echo "<td class=data{$id} nowrap>", nl2br(htmlspecialchars($v)), "</td>";
				}							
				if (sizeof($key) > 0) {
					$key_str = '';
					foreach ($key as $v) {
						if ($key_str != '') $key_str .= '&';
						$key_str .= urlencode("key[{$v}]") . '=' . urlencode($rs->f[$v]);
					}
					
					echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=editrow&database=", urlencode($_REQUEST['database']),
						"&table=", urlencode($_REQUEST['table']), "&offset=", $_REQUEST['offset'], "&limit=", $_REQUEST['limit'], "&{$key_str}\">Edit</a></td>\n";
					echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=confdelrow&database=", urlencode($_REQUEST['database']),
						"&table=", urlencode($_REQUEST['table']), "&offset=", $_REQUEST['offset'], "&limit=", $_REQUEST['limit'], "&{$key_str}\">Delete</a></td>\n";
				}
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
		}
		else echo "<p>No data.</p>\n";
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData;
		global $PHP_SELF, $strTable, $strOwner, $strActions, $strNoTables;
		
		echo "<h2>", htmlspecialchars($_GET['database']), "</h2>\n";
			
		$tables = &$localData->getTables();
		
		if ($tables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strTable}</th><th class=data>{$strOwner}</th><th colspan=6 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$tables->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?action=browse&offset=0&limit=30&database=", 
					htmlspecialchars($_GET['database']), "&table=", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "\">Browse</a></td>\n";
				echo "<td class=opbutton{$id}>Select</td>\n";
				echo "<td class=opbutton{$id}>Insert</td>\n";
				echo "<td class=opbutton{$id}>Properties</td>\n";
				echo "<td class=opbutton{$id}>Empty</td>\n";
				echo "<td class=opbutton{$id}>Drop</td>\n";
				echo "</tr>\n";
				$tables->moveNext();
				$i++;
			}
		}
		else {
			echo "<p>{$strNoTables}</p>\n";
		}
	}
	
	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
		case 'delrow':
			if ($_POST['choice'] == 'Yes') doDelRow(false);
			else doBrowse();
			break;
		case 'confdelrow':
			doDelRow(true);
			break;			
		case 'browse':
			doBrowse();
			break;
		default:
			doDefault();
			break;
	}	

	echo "</body>\n";
	echo "</html>\n";

?>
