<?php
	$test_title = 'Admin tests';

	if (isset($_GET['run'])) {
		global $lang;
		require('../config.test.php');
		require('../testBuilder.class.php');
		/*
		 * 1/ swing through the admin panel 
		 */
		$t = new TestBuilder($test_title,
			'Test the admin interfaces.'
		);

		$t->login($admin_user, $admin_user_pass);

	/** 1 **/
		$t->addComment('1. Check Variables');
		$t->clickAndWait("link={$lang['strdatabases']}");
		$t->clickAndWait("link={$testdb}");
		$t->clickAndWait("link={$lang['strvariables']}");
        $t->assertText("//tr/th[text()='{$lang['strname']}' and @class='data']/../../tr/th[1]",$lang['strname']);
        $t->assertText("//tr/th[text()='{$lang['strsetting']}' and @class='data']/../../tr/th[2]",$lang['strsetting']);

    /** 2 **/ 
		$t->addComment('2. Check Processes');
		$t->clickAndWait("link={$lang['strprocesses']}");
		$t->assertText('//h3', $lang['strpreparedxacts']);
/**	
    	$t->assertText('//h3', $lang['strprocesses']);
        # this check is a bit fragile, since it relies on new line wrapping 
**/
	    $t->assertText('//pre[@class=\'data\']', 'SELECT * FROM pg_catalog.pg_stat_activity*WHERE datname=\'ppatests_db\' ORDER BY usename, procpid');
                
                

    /** 3 **/ 
		$t->addComment('3. Check Locks');
		$t->clickAndWait("link={$lang['strlocks']}");
        $t->assertText("//tr/th[text()='{$lang['strvirtualtransaction']}' and @class='data']/../../tr/th[3]",$lang['strvirtualtransaction']);
        /*  
            Would like to assert for text pg_locks and AccessShareLock, 
            but since they can dynamically be written, 
            it doesn't seem Selenium can find them 
        */


    /** 4 **/ 
		$t->addComment('4. Admin Options');
		$t->clickAndWait("link={$lang['stradmin']}");
        $t->clickAndWait("//input[@value='Analyze']");
        $t->clickAndWait("//input[@value='Analyze']");
		$t->assertText('//p[@class=\'message\']', $lang['stranalyzegood']);

    /** 5 **/
		$t->logout();
		unset($t);
	}
?>
