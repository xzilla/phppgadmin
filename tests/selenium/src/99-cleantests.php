<?php
	global $testsuite_file, $test_static_dir;

	/*
	 * 1/ login as user and try to drop database -> fail
	 * 2/ logout / login as admin_user and drop user role/user
	 * 3/ try to drop himself -> fail
	 * 4/ drop test database
	 * 5/ logout & login as superuser and drop admin_user
	 */
	$t = new TestBuilder("{$test_static_dir}/{$server['desc']}/cleantests.html", $server['desc'],
		'Cleaner tests',
		'Clean every created stuff for test.'
	);

/** 1 **/
	$t->login($user, $user_pass);
	$t->clickAndWait("link={$lang['strdatabases']}");
	$t->clickAndWait("//tr/td/a[text()='{$testdb}']/../../td/a[text()='{$lang['strdrop']}']");
	$t->clickAndWait('drop');
	$t->assertText('//p[@class=\'message\']', $lang['strdatabasedroppedbad']);

/** 2 **/
	$t->logout();
	$t->login($admin_user, $admin_pass);
	if ($data->hasRoles()) {
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("//tr/td/a[text()='{$user}']/../../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['strroledropped']);
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		$t->clickAndWait("//tr/td[text()='{$user}']/../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['struserdropped']);
	}

/** 3 **/
	if ($data->hasRoles()) {
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("link={$admin_user}");
		$t->assertText("//div[@class='trail']/descendant::a[@title='{$lang['strrole']}']/span[@class='label']", $admin_user);
		$t->clickAndWait("link={$lang['strdrop']}");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['strroledroppedbad']);
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		$t->clickAndWait("//tr/td[text()='{$admin_user}']/../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['struserdroppedbad']);
	}

/** 4 **/
	$t->clickAndWait("link={$lang['strdatabases']}");
	$t->clickAndWait("//tr/td/a[text()='{$testdb}']/../../td/a[text()='{$lang['strdrop']}']");
	$t->clickAndWait('drop');
	$t->assertText('//p[@class=\'message\']', $lang['strdatabasedropped']);

/** 5 **/
	$t->logout();
	$t->login($super_user[$server['desc']], $super_pass[$server['desc']]);

	if ($data->hasRoles()) {
		/* drop adminuser */
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("//tr/td/a[text()='{$admin_user}']/../../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['strroledropped']);
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		$t->clickAndWait("//tr/td[text()='{$admin_user}']/../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText('//p[@class=\'message\']', $lang['struserdropped']);
	}

	$t->logout();
	$t->writeTests($testsuite_file);
    unset($t);
?>
