<?php
	global $testsuite_file, $test_static_dir;

	/*
	 * 1/ Create a sequence
	 * 2/ increment, reset sequence qnd set value
	 * 3/ alter sequence
	 * 4/ drop sequence
	 */
	$t = new TestBuilder($server['desc'],
		'Sequence tests',
		'Create alter and drop sequence...'
	);

	$t->login($admin_user, $admin_user_pass);

/** 1 **/
	$t->clickAndWait("link={$lang['strdatabases']}");
	$t->clickAndWait("link={$testdb}");
	$t->clickAndWait("link={$lang['strschemas']}");
	$t->clickAndWait('link=public');
	$t->clickAndWait("link={$lang['strsequences']}");
	$t->clickAndWait("link={$lang['strcreatesequence']}");
	$t->type('formSequenceName', 'testcase_seq');
	$t->type('formIncrement', '2');
	$t->type('formMinValue', '1');
	$t->type('formMaxValue', '100');
	$t->type('formStartValue', '1');
	$t->type('formCacheValue', '1');
	$t->click('formCycledValue');
	$t->clickAndWait('create');
	$t->assertText("//p[@class='message']", $lang['strsequencecreated']);
	$t->clickAndWait('link=testcase_seq');
	$t->assertText("//tr/th[text()='{$lang['strname']}' and @class='data']/../../tr/td[1]", 'testcase_seq');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[2]", '1');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[3]", '2');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[4]", '100');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[5]", '1');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[6]", '1');
	$t->assertText("//tr/td[text()='testcase_seq']/../td[8]", $lang['stryes']);

/** 2 **/
	$t->clickAndWait("link={$lang['strsetval']}");
	$t->type('nextvalue', '2');
	$t->clickAndWait('setval');
	$t->assertText("//p[@class='message']", $lang['strsequencesetval']);
	$t->assertText("//tr/td[text()='testcase_seq']/../td[2]", '2');
	$t->clickAndWait("link={$lang['strnextval']}");
	$t->assertText("//p[@class='message']", $lang['strsequencenextval']);
	$t->assertText("//tr/td[text()='testcase_seq']/../td[2]", '4');
	$t->clickAndWait("link={$lang['strreset']}");
	$t->assertText("//p[@class='message']", $lang['strsequencereset']);
	$t->assertText("//tr/td[text()='testcase_seq']/../td[2]", '1');

/** 3 **/
	$t->clickAndWait("//div[@class='trail']/descendant::a[@title='{$lang['strdatabase']}']/span[@class='label' and text()='{$testdb}']");
	$t->clickAndWait("link={$lang['strschemas']}");
	$t->clickAndWait('link=public');
	$t->clickAndWait("link={$lang['strsequences']}");
	$t->clickAndWait('link=testcase_seq');
	$t->clickAndWait("link={$lang['stralter']}");
	$t->type('name', 'testcase_renamed_seq');
	$t->select('owner', "label={$user}");
	if ($data->hasAlterSequenceSchema())
		$t->select('newschema', 'label=test_schema');
	$t->type('comment', 'test comment on testcase_renamed_seq');
	if ($data->hasAlterSequenceProps()) {
		$t->type('formStartValue', 20);
		$t->type('formIncrement', 3);
		$t->type('formMaxValue', 104);
		$t->type('formMinValue', 5);
		$t->type('formCacheValue', 6);
		$t->uncheck('formCycledValue');
	}
	$t->clickAndWait('alter');
	$t->assertText("//p[@class='message']", $lang['strsequencealtered']);
	if ($data->hasAlterSequenceSchema())
		$t->assertText("//div[@class='trail']/descendant::a[@title='{$lang['strschema']}']/span[@class='label']", 'test_schema');
	$t->assertText("//p[@class='comment']", 'test comment on testcase_renamed_seq');
	$t->assertText("//tr/th[text()='{$lang['strname']}' and @class='data']/../../tr/td[1]", 'testcase_renamed_seq');
	if ($data->hasAlterSequenceProps()) {
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[2]", '20');
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[3]", '3');
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[4]", '104');
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[5]", '5');
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[6]", '6');
		$t->assertText("//tr/td[text()='testcase_renamed_seq']/../td[8]", $lang['strno']);
	}
	if ($data->hasAlterSequenceSchema())
		$t->clickAndWait("//div[@class='trail']/descendant::a[@title='{$lang['strschema']}']/span[@class='label' and text()='test_schema']");
	else
		$t->clickAndWait("//div[@class='trail']/descendant::a[@title='{$lang['strschema']}']/span[@class='label' and text()='public']");
	$t->clickAndWait("link={$lang['strsequences']}");
	$t->assertText("//tr/td[2]/a[text()='testcase_renamed_seq']/../../td[3]", $user);

/** 4 **/
	$t->clickAndWait("link={$lang['strsequences']}");
	$t->clickAndWait("//tr/td/a[text()='testcase_renamed_seq']/../../td/a[text()='{$lang['strdrop']}']");
	$t->click('cascade');
	$t->clickAndWait('drop');
	$t->assertText("//p[@class='message']", $lang['strsequencedropped']);

	$t->logout();
	$t->writeTests("{$test_static_dir}/{$server['desc']}/sequence.html", $testsuite_file);
	unset($t);
?>
