<?php
/**
 * This is entrance to run all the test suites and generate a report for the results.
 *
 * @author     Augmentum SpikeSource Team 
 * @copyright  2005 by Augmentum, Inc.
 */

// Import necessary library files to setup the testcase.
// And for web testcase, the library web_tester.php shoule be included.
require_once 'simpletest.inc.php';
require_once 'simpletest/web_tester.php';
require_once 'simpletest/reporter.php';
require_once 'simpletest/reporter/DetailedHtmlReporter.php';

// Import the language file for phpPgAdmi to avoid hard code.
require_once('lang/recoded/english.php');

require_once('Public/common.php'); 
require_once('Public/SetPrecondition.php');  

require_once('Server/ServerGroupTest.php');
require_once('Databases/DatabaseGroupTest.php');
require_once('Schemas/SchemasGroupTest.php');
require_once('Tables/TableGroupTest.php');
require_once('Common/CommonGroupTest.php');

/**
 * This class is to test the whole phpPgAdmin.
 * It includes server/database/schema/table management and common manipulation.
 */
class phpPgAdminGroupTest extends GroupTest
{
    function phpPgAdminGroupTest() 
    {
        $this->GroupTest('phpPgAdmin automation test.');
        $this->addTestClass(new ServerGroupTest());
        $this->addTestClass(new DatabaseGroupTest());
        $this->addTestClass(new SchemasGroupTest());
        $this->addTestClass(new TableGroupTest());
        $this->addTestClass(new CommonGroupTest());
    }
}

$phpPgAdminTest = &new phpPgAdminGroupTest();
$phpPgAdminTest->run(new DetailedHtmlReporter());

?>
