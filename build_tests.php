#!/usr/bin/php
<?php

	/**
	 * Build the test files for each servers in conf/config.inc.php according to the pg backend version.
	 */

	require('./conf/config.inc.php');

	$test_dir = './tests/selenium/';
	$test_src_dir = "{$test_dir}src/";
	$test_static_dir = "{$test_dir}static/";
	$testsuite_file = "{$test_static_dir}TestSuite.html";

	if(isset($argv[1]) && ($argv[1] == 'clean')) {
		echo "Cleaning...";
		/* delete server directories */
		foreach ($conf['servers'] as $server) {
			$dir = "{$test_static_dir}{$server['desc']}";
			while(is_dir($dir)) {
				$dh = opendir($dir);
				while($file = readdir($dh))
					if (($file != '.') && ($file != '..')) unlink("{$dir}/{$file}");
				rmdir($dir);
			} 
		}
		/* delete the TestSuite.html file */
		@unlink($testsuite_file);
		echo "done.\n";

		exit;
	}

	// Include application functions
	require('./tests/selenium/config.test.php');
	define('ADODB_ERROR_HANDLER','');
	require('./classes/database/Connection.php');
	require('./lang/recoded/english.php');
	require('./tests/selenium/testBuilder.class.php');

	/* create directory for tests static files */
	if(!is_dir($test_static_dir))
		mkdir($test_static_dir);

	/* create the TestSuite.html file with its html header */
	$fd = fopen($testsuite_file, 'w');
	fprintf($fd, "<table border=\"1\">
		<tr>
			<th>Test suite for PPA</th>
		</tr>\n");
	fclose($fd);

	/* Loop on the servers given in the conf/config.inc.conf file */
	foreach ($conf['servers'] as $server) {
		// Is this server in our list of configured servers?
		if (!in_array($server['desc'],$test_servers))
			continue;

		/* connect to the server to get its version
		 * and test its feature along the tests */
		$_c = new Connection($server['host'],
			$server['port'],
			$server['sslmode'],
			$super_user[$server['desc']],
			$super_pass[$server['desc']],
			$server['defaultdb']
		);

		$_type = $data = null;
		if (! $_c->conn->isConnected())
			die ("Connection to {$server['desc']} failed !\n");
		else {
			if (($_type = $_c->getDriver($platform)) === null) {
				die( printf($lang['strpostgresqlversionnotsupported'], $postgresqlMinVer));
			}
			/* create the database handler we are going to use in the tests creator scripts */
			include_once('./classes/database/' . $_type . '.php');
			$data = new $_type($_c->conn);
			$data->platform = $_c->platform;
		}

		fprintf(STDERR, "Connected to %s...\n", $server['desc']);

		if (!is_dir("{$test_static_dir}/{$server['desc']}"))
			mkdir("{$test_static_dir}/{$server['desc']}");

		$fd = opendir($test_src_dir);
		$files = array();
		while ($file = readdir($fd))
			if (($file != '.') && ($file != '..'))
				$files[] = $file;
		sort($files);
		/* include the tests creator scripts here
		 * in the order you want them executed.
		 * Each script append itself to the TestSuite.html file.
		 **/
		foreach ($files as $testgroupfile)
			require("{$test_src_dir}/{$testgroupfile}");
	}

	/* close the TestSuite.html file */
	$fd = fopen($testsuite_file, 'a');
	fprintf($fd, "</table>");
	fclose($fd);

	/* Tests ready to be runned on all your configured servers !!!! */
?>
