<?php

	/**
	 * Does an export to the screen or as a download
	 *
	 * $Id: tblexport.php,v 1.1 2003/01/18 06:38:36 chriskl Exp $
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
	else {
		header('Content-Type: text/plain');
	}

	// Include application functions
	$_no_output = true;
	include_once('conf/config.inc.php');

	// Return all rows in the table
	// @@ Note: This should really use a cursor
	$rs = &$localData->dumpRelation($_REQUEST['table'], isset($_REQUEST['oids']));

	if ($_REQUEST['format'] == 'sql') {
		$data->fieldClean($_REQUEST['table']);
		echo "COPY \"{$_REQUEST['table']}\" FROM stdin";
		if (isset($_REQUEST['oids'])) echo " WITH OIDS";
		echo ";\n";
		while (!$rs->EOF) {
			$first = true;
			while(list($k, $v) = each($rs->f)) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				// @@ Need escaping here
				// @@ Need to handle NULL values
				if ($first) {
					echo "\"{$v}\"";
					$first = false;
				}
				else echo "\t\"{$v}\"";
			}
			echo "\n";
			$rs->moveNext();
		}
		echo "\\.\n";
	}
	elseif ($_REQUEST['format'] == 'xml') {
		echo "<xml>\n";
		while (!$rs->EOF) {
			echo "\t<row>\n";
			while(list($k, $v) = each($rs->f)) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;

				$k = htmlspecialchars($k);
				$v = htmlspecialchars($v);
				echo "\t\t<{$k}>{$v}</{$k}>\n";
			}
			echo "\t</row>\n";
			$rs->moveNext();
		}
		echo "</xml>\n";
	}
	else {
		while (!$rs->EOF) {
			$first = true;
			while(list($k, $v) = each($rs->f)) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				switch ($_REQUEST['format']) {
					case 'csv':
						$v = str_replace('"', '""', $v);
						if ($first) {
							echo "\"{$v}\"";
							$first = false;
						}
						else echo ",\"{$v}\"";
						break;
					case 'tab':
						$v = str_replace('"', '""', $v);
						if ($first) {
							echo "\"{$v}\"";
							$first = false;
						}
						else echo "\t\"{$v}\"";
						break;
				}
			}
			echo "\r\n";
			$rs->moveNext();
		}
	}

?>
