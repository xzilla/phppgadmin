<?php

	/**
	 * Does an export to the screen or as a download
	 *
	 * $Id: tblexport.php,v 1.7 2003/06/30 02:14:03 chriskl Exp $
	 */

	$extensions = array(
		'sql' => 'sql',
		'copy' => 'sql',
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
	include_once('libraries/lib.inc.php');

	// Return all rows in the table
	// @@ Note: This should really use a cursor
	$rs = &$localData->dumpRelation($_REQUEST['table'], isset($_REQUEST['oids']));

	if ($_REQUEST['format'] == 'copy') {
		$data->fieldClean($_REQUEST['table']);
		echo "COPY \"{$_REQUEST['table']}\"";
		if (isset($_REQUEST['oids'])) echo " WITH OIDS";
		echo " FROM stdin;\n";
		while (!$rs->EOF) {
			$first = true;
			while(list($k, $v) = each($rs->f)) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				// Escape value
				// addCSlashes converts all weird ASCII characters to octal representation,
				// EXCEPT the 'special' ones like \r \n \t, etc.
				$v = addCSlashes($v, "\0..\37\177..\377");
				// We add an extra escaping slash onto octal encoded characters
				$v = ereg_replace('\\\\([0-7]{3})', '\\\\\1', $v);
				if ($first) {
					echo ($v == null) ? '\\N' : $v;
					$first = false;
				}
				else echo "\t", ($v == null) ? '\\N' : $v;
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
	elseif ($_REQUEST['format'] == 'sql') {
		$data->fieldClean($_REQUEST['table']);
		while (!$rs->EOF) {
			echo "INSERT INTO \"{$_REQUEST['table']}\" (";
			$first = true;
			while(list($k, $v) = each($rs->f)) {
				// SQL (INSERT) format cannot handle oids
				if ($k == $localData->id) continue;
				// Output field
				$data->fieldClean($k);
				if ($first) echo "\"{$k}\"";
				else echo ", \"{$k}\"";
				
				// Output value
				// addCSlashes converts all weird ASCII characters to octal representation,
				// EXCEPT the 'special' ones like \r \n \t, etc.
				$v = addCSlashes($v, "\0..\37\177..\377");
				// We add an extra escaping slash onto octal encoded characters
				$v = ereg_replace('\\\\([0-7]{3})', '\\\1', $v);
				// Finally, escape all apostrophes
				$v = str_replace("'", "''", $v);
				if ($first) {
					$values = ($v === null) ? 'NULL' : "'{$v}'";
					$first = false;
				}
				else $values .= ', ' . (($v === null) ? 'NULL' : "'{$v}'");
			}
			echo ") VALUES ({$values});\n";
			$rs->moveNext();
		}
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
