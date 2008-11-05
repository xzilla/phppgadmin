<?php
	global $testsuite_file, $test_static_dir;

	/*
	 * 1/ create test schema
	 * 2/ alter its name, owner and comment
	 * NB: droping the schema is in the cleantests.php tests
	 */
	$t = new TestBuilder($server['desc'],
		'Schema tests',
		'Create and Alter schema.'
	);

	$t->login($admin_user, $admin_user_pass);

/** 1 **/
	$t->clickAndWait("link={$lang['strdatabases']}");
	$t->clickAndWait("link={$testdb}");
	$t->clickAndWait("link={$lang['strschemas']}");
	$t->clickAndWait("link={$lang['strcreateschema']}");
	if ($data->hasAlterSchema()) {
		$t->type('formName', 'test_schema_toalter');
		if ($data->hasAlterSchemaOwner())
			$t->select('formAuth', $super_user[$server['desc']]);
		else $t->select('formAuth', $admin_user);
		$t->type('formComment', 'test schema comment to alter');
	}
	else {
		$t->type('formName', 'test_schema');
		$t->type('formComment', 'test schema comment');
	}
	$t->clickAndWait('create');
	$t->assertText('//p[@class=\'message\']', $lang['strschemacreated']);

/** 2 **/
	if ($data->hasAlterSchema()) {
		$t->clickAndWait("link={$lang['strschemas']}");
		$t->clickAndWait("//tr/td/a[text()='test_schema_toalter']/../../td/a[text()='{$lang['stralter']}']");
		$t->type('name', 'test_schema');
		if ($data->hasAlterSchemaOwner())
			$t->select('owner', $admin_user);
		$t->type('comment', 'test schema');
		$t->clickAndWait('alter');
		$t->assertText('//p[@class=\'message\']', $lang['strschemaaltered']);
	}
	
	$t->logout();
	$t->writeTests("{$test_static_dir}/{$server['desc']}/schema.html", $testsuite_file);
	unset($t);
?>
