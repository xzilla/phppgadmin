<?php
	/**
	 * Does an export of a database or a table (via pg_dump)
	 * to the screen or as a download.
	 *
	 * $Id: dbexport.php,v 1.12 2004/08/04 07:44:03 chriskl Exp $
	 */

	// Include application functions
	$_no_output = true;
	include_once('./libraries/lib.inc.php');

	// Check that database dumps are enabled.
	if ($misc->isDumpEnabled()) {

		// Make it do a download, if necessary
		switch($_REQUEST['output']){
			case 'show':
				header('Content-Type: text/plain');
				break;
			case 'download':
				header('Content-Type: application/download');
				header('Content-Disposition: attachment; filename=dump.sql');
				break;
			case 'gzipped':
				header('Content-Type: application/download');
				header('Content-Disposition: attachment; filename=dump.sql.gz');
				break;
		}

		// Set environmental variable for user and password that pg_dump uses
		putenv('PGPASSWORD=' . $_SESSION['webdbPassword']);
		putenv('PGUSER=' . $_SESSION['webdbUsername']);

		// Prepare command line arguments
		$hostname = $conf['servers'][$_SESSION['webdbServerID']]['host'];
		$port = $conf['servers'][$_SESSION['webdbServerID']]['port'];
		
		// Check if we're doing a cluster-wide dump or just a per-database dump
		if ($_REQUEST['mode'] == 'database') {
			// Build command for executing pg_dump.  '-i' means ignore version differences.
			$cmd = escapeshellcmd($conf['servers'][$_SESSION['webdbServerID']]['pg_dump_path']) . " -i";
		}
		else {
			// Build command for executing pg_dump.  '-i' means ignore version differences.
			$cmd = escapeshellcmd($conf['servers'][$_SESSION['webdbServerID']]['pg_dumpall_path']) . " -i";
		}
		
		if ($hostname !== null && $hostname != '') {
			$cmd .= " -h " . escapeshellarg($hostname);
		}
		if ($port !== null && $port != '') {
			$cmd .= " -p " . escapeshellarg($port);
		}
		
		// Check for a table specified
		if (isset($_REQUEST['table']) && $_REQUEST['mode'] == 'database') {			
			// If we are 7.4 or higher, assume they are using 7.4 pg_dump and
			// set dump schema as well.  Also, mixed case dumping has been fixed
			// then..
			if ($data->hasSchemaDump()) {
				$cmd .= " -t " . escapeshellarg($_REQUEST['table']);
				$cmd .= " -n " . escapeshellarg($_REQUEST['schema']);
			}
			else {
				// This is an annoying hack needed to work around a bug in dumping
				// mixed case tables in pg_dump prior to 7.4
				$cmd .= " -t " . escapeshellarg('"' . $_REQUEST['table'] . '"');
			}
		}

		// Check for GZIP compression specified
		if ($_REQUEST['output'] == 'gzipped' && $_REQUEST['mode'] == 'database') {
			$cmd .= " -Z 9";
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
		
		if ($_REQUEST['mode'] == 'database') {
			$cmd .= " " . escapeshellarg($_REQUEST['database']);
		}

		// Execute command and return the output to the screen
		passthru($cmd);
	}

?>
