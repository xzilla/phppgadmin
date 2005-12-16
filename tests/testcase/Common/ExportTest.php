<?php
/**
 * Function area: Common manipulation
 * Sub function area: Export
 *
 * @author     Augmentum SpikeSource Team 
 * @copyright  2005 by Augmentum, Inc.
 */

// Import the precondition class.
if(is_dir('../Public')) 
{
    require_once('../Public/SetPrecondition.php');
}

/**
 * This class is to test the export function.
 * It includes server/database/table/view's export function.
 */
class ExportTest extends PreconditionSet 
{
    // Declare the member variable for database name.
    private $_databaseName = 'test';
    
    function setUp()
    {
        global $webUrl;
        global $SUPER_USER_NAME;
        global $SUPER_USER_PASSWORD;
        
        $this->login($SUPER_USER_NAME, $SUPER_USER_PASSWORD, $webUrl . '/index.php');
        
        return TRUE;
    }
    
    
    function tearDown()
    {
        $this->logout();
        
        return TRUE;
    }
   
   
    /*
     * TestCaseID: CED01
     * Test to export server data with "COPY" format.
     */
    function testServerDataCopyShow() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/all_db.php?action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'dataonly'));
        $this->assertTrue($this->setField('d_format', 'COPY'));
        $this->assertTrue($this->setField('output', 'show'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('connect ' . $this->_databaseName);
        
        return TRUE;
    }
    
    
    /*
     * TestCaseID: CED02
     * Test to export server structure with "SQL" format.
     */
    function testServerStructureSQLDownload() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/all_db.php?action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'structureonly'));
        $this->assertTrue($this->setField('d_format', 'SQL'));
        $this->assertTrue($this->setField('output', 'download'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('connect ' . $this->_databaseName);
        
        return TRUE;
    }
    
    /*
     * TestCaseID: CED03
     * Test to export database data with "SQL" format.
     */
    function testDatabaseDataSQLShow() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/database.php?database=' . 
                          $this->_databaseName . '&subject=database&action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'dataonly'));
        $this->assertTrue($this->setField('d_format', 'SQL'));
        $this->assertTrue($this->setField('output', 'show'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('Data for Name: student');
        
        return TRUE;
    }
    
    
    /*
     * TestCaseID: CED04
     * Test to export database structure with "COPY" format.
     */
    function testDatabaseStructureCOPYDownload() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/database.php?database=' . $this->_databaseName . 
                                     '&subject=database&action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'structureonly'));
        $this->assertTrue($this->setField('d_format', 'COPY'));
        $this->assertTrue($this->setField('output', 'download'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('CREATE TABLE student');
        
        return TRUE;
    }
    
    /*
     * TestCaseID: CED05
     * Test to export table data with "XML" format.
     * 
     * This test case need insert one row data firstly.
     * And the data will be removed in the end of the test case.
     */
    function testTableDataShow() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the "Insert row" interface.
        $this->assertTrue($this->get($webUrl . '/tables.php?action=confinsertrow' .
                                     '&database=test&schema=public&table=student&'));
          
        // Set the value of the fields.		
        $this->assertTrue($this->setField('values[name]', 'testname'));
        $this->assertTrue($this->setField('values[birthday]', '2005-05-31'));
        $this->assertTrue($this->setField('values[resume]', 'test resume'));
                
        // Click the "Insert" button insert a row.
        $this->assertTrue($this->clickSubmit($lang['strinsert']));
        // Verify if the row insert successful.
        $this->assertTrue($this->assertWantedText($lang['strrowinserted']));
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/tblproperties.php?database=' . $this->_databaseName . 
                                     '&schema=public&table=student&subject=table&action=export'));
        // Enter information for export the data.
        $this->assertTrue($this->setField('what', 'dataonly'));
        $this->assertTrue($this->setField('d_format', 'XML'));
        $this->assertTrue($this->setField('output', 'show'));
       
        // Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedPattern("/xml version/");
        
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/tblproperties.php?database=' . $this->_databaseName . 
                                     '&schema=public&table=student&subject=table&action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'dataonly'));
        $this->assertTrue($this->setField('d_format', 'XHTML'));
        $this->assertTrue($this->setField('output', 'show'));
       
        // Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedPattern('/testname/');
        
        // Empty the data in the table.
        $this->assertTrue($this->get($webUrl . '/tables.php?action=confirm_empty' . 
                                     '&database=test&schema=public&table=student'));
        $this->assertTrue($this->clickSubmit($lang['strempty']));

        return TRUE;
    }
    
    
    /*
     * TestCaseID: CED06
     * Test to export database structure and data with "SQL" format.
     */
    function testTableStructureDataSQLDownload() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/tblproperties.php?database=' . $this->_databaseName .
                                     '&schema=public&table=student&subject=table&action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('what', 'structureanddata'));
        $this->assertTrue($this->setField('sd_format', 'COPY'));
        $this->assertTrue($this->setField('output', 'download'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('CREATE TABLE student');
        
        return TRUE;
    }
    
    /*
     * TestCaseID: CED07
     * Test to export view structure. 
     */
    function testViewStructureShow() 
    {
        global $webUrl;
        global $lang;
        
        // Turn to the export data page.
        $this->assertTrue($this->get($webUrl . '/viewproperties.php?database=' . $this->_databaseName . 
                                     '&schema=pg_catalog&view=pg_user&subject=view&action=export'));
       
        // Enter information for exporting the data.
        $this->assertTrue($this->setField('s_clean', TRUE));
        $this->assertTrue($this->setField('output', 'show'));
       
        //Then submit and verify it.
        $this->assertTrue($this->clickSubmit($lang['strexport']));
        $this->assertWantedText('CREATE VIEW pg_user');
        
        return TRUE;
    }

}
?>
