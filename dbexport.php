<?php
	/**
	 * Does an export of a database or a table (via pg_dump)
	 * to the screen or as a download.
	 *
	 * $Id: dbexport.php,v 1.14.2.6 2005/04/13 08:33:01 chriskl Exp $
	 */

	// Prevent timeouts
	if (!ini_get('safe_mode')) set_time_limit(0);

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
				// Set headers.  MSIE is totally broken for SSL downloading, so
				// we need to have it download in-place as plain text
				if (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE') && isset($_SERVER['HTTPS'])) {
					header('Content-Type: text/plain');
				}
				else {
					header('Content-Type: application/download');
					header('Content-Disposition: attachment; filename=dump.sql');
				}
				break;
			case 'gzipped':
				// MSIE in SSL mode cannot do this - it should never get to this point
				header('Content-Type: application/download');
				header('Content-Disposition: attachment; filename=dump.sql.gz');
				break;
		}

		// Set environmental variables that pg_dump uses
		putenv('PGPASSWORD=' . $_SESSION['webdbPassword']);
		putenv('PGUSER=' . $_SESSION['webdbUsername']);
		$hostname = $conf['servers'][$_SESSION['webdbServerID']]['host'];
		if ($hostname !== null && $hostname != '') {
			putenv('PGHOST=' . $hostname);
		}
		$port = $conf['servers'][$_SESSION['webdbServerID']]['port'];
		if ($port !== null && $port != '') {
			putenv('PGPORT=' . $port);
		}
		if ($_REQUEST['mode'] == 'database') {
			putenv('PGDATABASE=' . $_REQUEST['database']);
		}

		// Check if we're doing a cluster-wide dump or just a per-database dump
		if ($_REQUEST['mode'] == 'database') {
			// Get path of the pg_dump executable.
			$exe = $misc->escapeShellCmd($conf['servers'][$_SESSION['webdbServerID']]['pg_dump_path']);
		}
		else {
			// Get path of the pg_dumpall executable.
			$exe = $misc->escapeShellCmd($conf['servers'][$_SESSION['webdbServerID']]['pg_dumpall_path']);
		}
		
		// Build command for executing pg_dump.  '-i' means ignore version differences.
		$cmd = $exe . " -i";
		
		// Check for a table specified
		if (isset($_REQUEST['table']) && $_REQUEST['mode'] == 'database') {
			
			// Obtain the pg_dump version number
			$version = array();
			preg_match("/(\d+(?:\.\d+)?)(?:\.\d+)?.*$/", exec($exe . " --version"), $version);
			
			// If we are 7.4 or higher, assume they are using 7.4 pg_dump and
			// set dump schema as well.  Also, mixed case dumping has been fixed
			// then..
			if (((float) $version[1]) >= 7.4) {
				$cmd .= " -t " . $misc->escapeShellArg($_REQUEST['table']);
				// Even though they're using a schema-enabled pg_dump, the backend database
				// may not support schemas.
				if ($data->hasSchemas()) {
					$cmd .= " -n " . $misc->escapeShellArg($_REQUEST['schema']);
				}
			}
			else {
				// This is an annoying hack needed to work around a bug in dumping
				// mixed case tables in pg_dump prior to 7.4
				$cmd .= " -t " . $misc->escapeShellArg('"' . $_REQUEST['table'] . '"');
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
		
		// Execute command and return the output to the screen
		passthru($cmd);
	}

?>
