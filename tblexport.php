<?php

	/**
	 * Does an export to the screen or as a download
	 *
	 * $Id: tblexport.php,v 1.12 2003/08/21 04:54:54 chriskl Exp $
	 */

	$extensions = array(
		'sql' => 'sql',
		'copy' => 'sql',
		'csv' => 'csv',
		'tab' => 'txt',
		'html' => 'html',
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
	$dbEncoding = $localData->getDatabaseEncoding();
	
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
		echo "<?xml version=\"1.0\"";
		if (isset($localData->codemap[$dbEncoding]))
			echo " encoding=\"{$localData->codemap[$dbEncoding]}\"";
		echo " ?>\n";
		echo "<records>\n";
		if (!$rs->EOF) {
			// Output header row
			$j = 0;
			echo "\t<header>\n";
			foreach ($rs->f as $k => $v) {
				$finfo = $rs->fetchField($j++);
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				$k = htmlspecialchars($k);
				$type = htmlspecialchars($finfo->type);
				echo "\t\t<column name=\"{$k}\" type=\"{$type}\" />\n";
			}
			echo "\t</header>\n";
		}
		while (!$rs->EOF) {
			echo "\t<row>\n";
			foreach ($rs->f as $k => $v) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;

				$k = htmlspecialchars($k);
				if ($v != null) $v = htmlspecialchars($v);
				echo "\t\t<column name=\"{$k}\"", ($v == null ? ' null="yes"' : ''), ">{$v}</column>\n";
			}
			echo "\t</row>\n";
			$rs->moveNext();
		}
		echo "</records>\n";
	}
	elseif ($_REQUEST['format'] == 'html') {
		echo "<html>\r\n";
		echo "<head>\r\n";
		echo "\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset={$localData->codemap[$dbEncoding]}\" />\r\n";
		echo "</head>\r\n";
		echo "<body>\r\n";
		echo "<table class=\"phppgadmin\">\r\n";
		echo "\t<tr>\r\n\t\t";
		if (!$rs->EOF) {
			// Output header row
			$j = 0;
			foreach ($rs->f as $k => $v) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				echo "<th>", $misc->printVal($k, true), "</th>";
			}
		}
		echo "\r\n\t</tr>\r\n";
		while (!$rs->EOF) {
			echo "\t<tr>\r\n\t\t";
			foreach ($rs->f as $k => $v) {
				if ($k == $localData->id && !isset($_REQUEST['oids'])) continue;
				$finfo = $rs->fetchField($j++);
				echo "<td>", $misc->printVal($v, true, $finfo->type), "</td>";
			}
			echo "\r\n\t</tr>\r\n";
			$rs->moveNext();
		}
		echo "</table>\r\n";
		echo "</body>\r\n";
		echo "</html>\r\n";
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
				
				if ($v != null) {
					// Output value
					// addCSlashes converts all weird ASCII characters to octal representation,
					// EXCEPT the 'special' ones like \r \n \t, etc.
					$v = addCSlashes($v, "\0..\37\177..\377");
					// We add an extra escaping slash onto octal encoded characters
					$v = ereg_replace('\\\\([0-7]{3})', '\\\1', $v);
					// Finally, escape all apostrophes
					$v = str_replace("'", "''", $v);
				}
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
						if ($v != null) $v = str_replace('"', '""', $v);
						if ($first) {
							echo ($v == null) ? "\"\\N\"" : "\"{$v}\"";
							$first = false;
						}
						else echo ($v == null) ? ",\"\\N\"" : ",\"{$v}\"";
						break;
					case 'tab':
						if ($v != null) $v = str_replace('"', '""', $v);
						if ($first) {
							echo ($v == null) ? "\"\\N\"" : "\"{$v}\"";
							$first = false;
						}
						else echo ($v == null) ? "\t\"\\N\"" : "\t\"{$v}\"";
						break;
				}
			}
			echo "\r\n";
			$rs->moveNext();
		}
	}

?>
