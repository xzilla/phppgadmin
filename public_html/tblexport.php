<?php

	/**
	 * Does an export to the screen or as a download
	 *
	 * $Id: tblexport.php,v 1.1 2002/11/14 01:04:38 chriskl Exp $
	 */

	$extensions = array(
		'sql' => 'sql',
		'csv' => 'csv',
		'tab' => 'txt',
		'xml' => 'xml'
	);
	 
	// Make it do a download, if necessary
	if (isset($_REQUEST['download'])) {
		header('Content-Type: application/download');

		if (isset($extensions[$_REQUEST['format']]))
			$ext = $extensions[$_REQUEST['format']];
		else
			$ext = 'txt';
		
		header('Content-Disposition: attachment; filename=dump.' . $ext);			
	}

	// Include application functions
	$_no_output = true;
	include_once('../conf/config.inc.php');

	$PHP_SELF = $_SERVER['PHP_SELF'];

	if ($_REQUEST['format'] == 'sql') {
	}
	else {
		// Return all rows in the table
		// @@ Note: This should really use a cursor
		$rs = &$localData->browseTable($_REQUEST['table']);
		
		if (!isset($_REQUEST['download'])) echo "<pre>\n";

		while (!$rs->EOF) {
			while(list($k, $v) = each($rs->f)) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				switch ($_REQUEST['format']) {
					case 'csv':
						$v = str_replace('"', '""', $v);
						echo "\"{$v}\",";
						break;
					case 'tab':
						$v = str_replace('"', '""', $v);
						echo "\"{$v}\"\t";
						break;
					case 'xml':
						break;
				}
			}
			echo "\r\n";
			$rs->moveNext();
		}

		if (!isset($_REQUEST['download'])) echo "</pre>\n";

	}	

?>
