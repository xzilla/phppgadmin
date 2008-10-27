<?php
/**
 * Function area     : Database.
 * Sub Function area : Admin.
 * 
 * @author     Augmentum SpikeSource Team
 * @copyright  Copyright (c) 2005 by Augmentum, Inc.
 */

// Import the precondition class.
if (is_dir('../Public'))
{
    require_once('../Public/SetPrecondition.php');
} 

/**
 * This class is to test the Admin about PostgreSql implementation.
 */

class AdminTest extends PreconditionSet
{
    /**
     * Set up the preconditon.
     */
    function setUp()
    {
        global $webUrl;
        global $SUPER_USER_NAME;
        global $SUPER_USER_PASSWORD;
        $this->login($SUPER_USER_NAME, $SUPER_USER_PASSWORD,
                     "$webUrl/login.php");

        return TRUE;
    }


    /**
     * Release the relational resource.
     */
    function tearDown()
    {
        // Logout this system.
        $this->logout();

        return TRUE;
    }


    /**
     * TestCaseId: DAV001
     * This test is used to test the admin about Vacuum and full.
     */
    function testAdminVacuumAna()
    {
        global $webUrl, $lang, $SERVER, $DATABASE;
        
        // Locate the list page of admin.
		$this->assertTrue($this->get("$webUrl/database.php",
			array('database' => $DATABASE,
				'subject' => 'database',
				'action' => 'admin',
				'server' => $SERVER))
		);
        $this->assertTrue($this->setField('vacuum_analyze', TRUE));
        $this->assertTrue($this->setField('vacuum_full', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strvacuum']));
        $this->assertWantedText($lang['strvacuumgood']);

        return TRUE;
    }


    /**
     * TestCaseId: DCS002
     * This test is used to test the admin about freeze.
     */
    function testAdminFreeze()
    {
        global $webUrl, $lang, $SERVER, $DATABASE;
        
        // Locate the list page of admin.
		$this->assertTrue($this->get("$webUrl/database.php",
			array('database' => $DATABASE,
				'subject' => 'database',
				'action' => 'admin',
				'server' => $SERVER))
		);
        $this->assertTrue($this->setField('vacuum_freeze', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strvacuum']));
        $this->assertWantedText($lang['strvacuumgood']);

        return TRUE;
    }


    /**
     * TestCaseId: DCS003
     * This test is used to test the admin about Analyze.
     */
    function testAdminAnalyze()
    {
        global $webUrl, $lang, $SERVER, $DATABASE;
        
        // Locate the list page of admin.
		$this->assertTrue($this->get("$webUrl/database.php",
			array('database' => $DATABASE,
				'subject' => 'database',
				'action' => 'admin',
				'server' => $SERVER))
		);
        $this->assertTrue($this->clickSubmit($lang['stranalyze']));
        $this->assertWantedText($lang['stranalyzegood']);

        return TRUE;
    }


    /**
     * TestCaseId: DCS004
     * This test is used to test the admin about Cluster.
     */
    function testAdminCluster()
    {
        global $webUrl, $lang, $SERVER, $DATABASE;
        
        // Locate the list page of admin.
		$this->assertTrue($this->get("$webUrl/database.php", array(
				'server' => $SERVER,
				'database' => $DATABASE,
				'subject' => 'database',
				'action' => 'admin'))
		);
        $this->assertTrue($this->clickSubmit($lang['strcluster']));
        $this->assertWantedText($lang['strclusteredgood']);

        return TRUE;
    }


    /**
     * TestCaseId: DCS005
     * This test is used to test the admin about Reindex.
     */
    function testAdminReindex()
    {
        global $webUrl, $lang, $SERVER, $DATABASE;

        // Locate the list page of admin.
		$this->assertTrue($this->get("$webUrl/database.php", array(
				'database' => $DATABASE,
				'subject' => 'database',
				'action' => 'admin',
				'server' => $SERVER))
		);
        $this->assertTrue($this->setField('reindex_force', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strreindex']));
        $this->assertWantedText($lang['strreindexgood']);

        return TRUE;
    }
}

?>
