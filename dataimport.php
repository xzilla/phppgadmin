<?php

	/**
	 * Does an import to a particular table from a text file
	 *
	 * $Id: dataimport.php,v 1.1 2004/04/12 06:43:15 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$misc->printHeader($lang['strimport']);		
	$misc->printTableNav();
	echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strimport']}</h2>\n";

	// Check that file is specified and is an uploaded file
	if (isset($_FILES['source']) && is_uploaded_file($_FILES['source']['tmp_name']) && is_readable($_FILES['source']['tmp_name'])) {
		
		$fd = fopen($_FILES['source']['tmp_name'], 'r');
		// Check that file was opened successfully
		if ($fd !== false) {		
			$status = $data->beginTransaction();
			if ($status != 0) {
				$misc->printMsg($lang['strimporterror']);
				exit;
			}
			
			switch ($_REQUEST['format']) {
				case 'csv':
				case 'tab':
					// XXX: Length of CSV lines limited to 100k
					$csv_max_line = 100000;
					// Set delimiter to tabs or commas
					if ($_REQUEST['format'] == 'csv') $csv_delimiter = ',';
					else $csv_delimiter = "\t";
					// Get first line of field names
					$fields = fgetcsv($fd, $csv_max_line, $csv_delimiter);
					$row = 1;
					while ($line = fgetcsv($fd, $csv_max_line, $csv_delimiter)) {
						// Build value map
						$vars = array();
						$nulls = array();
						$format = array();						
						$i = 0;
						foreach ($fields as $f) {
							// Check that there is a column
							if (!isset($line[$i])) {
								$misc->printMsg(sprintf($lang['strimporterrorline'], $row));
								exit;
							}
							// Check for nulls
							if ($line[$i] == '\\N') $nulls[$f] = 'on';
							// Add to value array
							$vars[$f] = $line[$i];
							// Format is always VALUE
							$format[$f] = 'VALUE';
							// Type is always text
							$types[$f] = 'text';
							$i++;
						}
						$status = $data->insertRow($_REQUEST['table'], $vars, $nulls, $format, $types);
						if ($status != 0) {
							$data->rollbackTransaction();
							$misc->printMsg(sprintf($lang['strimporterrorline'], $row));
							exit;
						}
						$row++;
					}
					break;
				default:
					// Unknown type
					$data->rollbackTransaction();
					$misc->printMsg($lang['strinvalidparam']);
					exit;
			}
	
			$status = $data->endTransaction();
			if ($status != 0) {
				$misc->printMsg($lang['strimporterror']);
				exit;
			}
			fclose($fd);

			$misc->printMsg($lang['strfileimported']);
		}
		else {
			// File could not be opened
			$misc->printMsg($lang['strimporterror']);
		}
	}
	else {
		// Upload went wrong
		$misc->printMsg($lang['strimporterror']);
	}
	
	$misc->printFooter();

?>
