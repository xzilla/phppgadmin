<?php
	/**
	 * Does an export of a database to the screen or as a download.
	 * Can also dump a specific table of a database.
	 *
	 * $Id: dbexport.php,v 1.4 2003/12/21 10:44:52 chriskl Exp $
	 */

	// Include application functions
	$_no_output = true;
	include_once('./libraries/lib.inc.php');
	
	// Check that database dumps are enabled.
	if ($conf['pg_dump_path'] !== null && $conf['pg_dump_path'] != '') {

		// Make it do a download, if necessary
		if (isset($_REQUEST['download'])) {
			header('Content-Type: application/download');
			header('Content-Disposition: attachment; filename=dbdump.sql');
		}
		else {
			header('Content-Type: text/plain');
		}

		// Set environmental variable for password that pg_dump uses
		putenv('PGPASSWORD=' . $_SESSION['webdbPassword']);

		// Prepare command line arguments
		$hostname = $conf['servers'][$_SESSION['webdbServerID']]['host'];
		$port = $conf['servers'][$_SESSION['webdbServerID']]['port'];
		$username = escapeshellarg($_SESSION['webdbUsername']);
		$database = escapeshellarg($_REQUEST['database']);		

		// Build command for executing pg_dump
		$cmd = escapeshellcmd($conf['pg_dump_path']) . " -i -U {$username}";
		if ($hostname !== null && $hostname != '') {
			$cmd .= " -h " . escapeshellarg($hostname);
		}
		if ($port !== null && $port != '') {
			$cmd .= " -p " . escapeshellarg($port);
		}
		
		// Check for a table specified
		if (isset($_REQUEST['table'])) {
			$cmd .= " -t " . escapeshellarg($_REQUEST['table']);
		}
				
		switch ($_REQUEST['what']) {
			case 'dataonly':
				$cmd .= ' -a';
				if ($_REQUEST['d_format'] == 'sql') $cmd .= ' -d';
				elseif (isset($_REQUEST['d_oids'])) $cmd .= ' -o';
				break;
			case 'structureonly':
				$cmd .= ' -s';
				if (isset($_REQUEST['s_clean'])) $cmd .= ' -c';
				break;
			case 'structureanddata':
				if ($_REQUEST['sd_format'] == 'sql') $cmd .= ' -d';
				elseif (isset($_REQUEST['sd_oids'])) $cmd .= ' -o';
				if (isset($_REQUEST['sd_clean'])) $cmd .= ' -c';
				break;
		}
		
		$cmd .= " -U {$username} {$database}";

		// Execute command and return the output to the screen
		passthru($cmd);
	}

?>
