<?php
	global $testsuite_file, $test_static_dir;

	/*
	 * 1/ login as superuser
	 * 2/ create admin_user role/user with wrong pass conf -> fail
	 * 3/ create admin_user
	 * 4/ logout & login as admin_user
	 * 5/ create user role/user with altered name, pass and props
	 * 6/ alter user back to the normal value
	 * NB: droping role tests are in the cleantests.php tests
	 */
	$t = new TestBuilder($server['desc'],
		'Roles, Users and Groups tests',
		'Create test admin role, test user role and tests Roles (or user/groups) features.'
	);

	/* 1 */
	$t->addComment('1. login as superuser');
	$t->login($super_user[$server['desc']], $super_pass[$server['desc']]);

	/* 2 */
	$t->addComment('2. create admin_user role/user with wrong pass conf -> fail');
	if ($data->hasRoles()) {
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("link={$lang['strcreaterole']}");
		$t->type('formRolename', $admin_user);
		$t->click('formCreateRole');
		$t->click('formInherits');
		$t->click('formCanLogin');
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		$t->clickAndWait("link={$lang['strcreateuser']}");
		$t->type('formUsername', $admin_user);
	}
	$t->type('formPassword', "{$admin_user_pass}bad");
	$t->type('formConfirm', $admin_user_pass);
	$t->click('formSuper');
	$t->click('formCreateDB');
	$t->clickAndWait('create');
	$t->assertText("//p[@class='message']", $lang['strpasswordconfirm']);

	/* 3 */
	$t->addComment('3. create admin_user');
	$t->type('formPassword', $admin_user_pass);
	$t->type('formConfirm', $admin_user_pass);
	$t->clickAndWait('create');
	if ($data->hasRoles())
		$t->assertText("//p[@class='message']", $lang['strrolecreated']);
	else
		$t->assertText("//p[@class='message']", $lang['strusercreated']);

	/* 4 */
	$t->addComment('4. logout & login as admin_user');
	$t->logout();
	$t->login($admin_user, $admin_user_pass);


	/* 5 */
	$t->addComment('5. create user role/user with altered name, pass and props');
	if ($data->hasRoles()) {
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("link={$lang['strcreaterole']}");
		$t->type('formRolename', "{$user}toalter");
		$t->click('formCanLogin');
		$t->click('formCreateRole'); // will be revert
		$t->click('formInherits'); // will be revert
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		$t->clickAndWait("link={$lang['strcreateuser']}");
		if ($data->hasUserRename()) $t->type('formUsername', "{$user}toalter");
		else $t->type('formUsername', $user);
	}
	$t->click('formSuper'); // will be revert
	$t->click('formCreateDB'); // will be revert
	$t->type('formPassword', "{$user_pass}toalter");
	$t->type('formConfirm', "{$user_pass}toalter");
	$t->clickAndWait('create');
	if ($data->hasRoles())
		$t->assertText("//p[@class='message']", $lang['strrolecreated']);
	else
		$t->assertText("//p[@class='message']", $lang['strusercreated']);

	/* 6 */
	$t->addComment('6. alter user back to the normal value');
	if ($data->hasRoles()) {
		$t->clickAndWait("link={$lang['strroles']}");
		$t->clickAndWait("link={$user}toalter");
		$t->clickAndWait("link={$lang['stralter']}");
		$t->type('formNewRoleName', $user);
		$t->click('formCreateRole'); // revert
		$t->click('formInherits'); // revert
	} else {
		$t->clickAndWait("link={$lang['strusers']}");
		if ($data->hasUserRename()) {
			$t->clickAndWait("//tr/td[text()='{$user}toalter']/../td/a[text()='{$lang['stralter']}']");
			$t->type('newname', $user);
		} else
			$t->clickAndWait("//tr/td[text()='{$user}']/../td/a[text()='{$lang['stralter']}']");
	}
	$t->click('formSuper'); // revert
	$t->click('formCreateDB'); // revert
	$t->type('formPassword', $user_pass);
	$t->type('formConfirm', $user_pass);
	$t->clickAndWait('alter');
	if ($data->hasRoles())
		$t->assertText("//p[@class='message']", $lang['strrolealtered']);
	else
		$t->assertText("//p[@class='message']", $lang['struserupdated']);

	$t->logout();
	
	$t->writeTests("{$test_static_dir}/{$server['desc']}/roles.html", $testsuite_file);

	unset($t);
?>
