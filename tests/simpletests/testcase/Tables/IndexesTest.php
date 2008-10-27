<?php
 /**
  * Function area:       Table
  * Subfunction area:    Index
  * @author     Augmentum SpikeSource Team 
  * @copyright  2005 by Augmentum, Inc.
  */

// Import the precondition class.
if(is_dir('../Public')) 
{
    require_once('../Public/SetPrecondition.php');
}


/**
 * A test case suite for testing INDEX feature in phpPgAdmin, including cases
 * for creating, clustering, reindexing and dropping indexes.
 */
class IndexesTest extends PreconditionSet{
    
    /**
     * Set up the preconditon. 
     */
    function setUp()
    {
        global $webUrl;
        global $SUPER_USER_NAME;
        global $SUPER_USER_NAME;
        
        $this->login($SUPER_USER_NAME, $SUPER_USER_NAME, 
                     "$webUrl/login.php");
        
        return TRUE;
    }
    
    /**
     * Clean up all the result. 
     */ 
    function tearDown(){
        $this->logout(); 
        
        return TRUE;
    }
    
    /**
     * TestCaseID: TCI01
     * Test creating indexes in a table
     */
    function testCreateIndex(){
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
        // Go to the Indexes page
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			'server' => $SERVER,
			'action' => 'create_index',
			'database' => $DATABASE,
			'schema' => 'public',
			'table' => 'student'))
		);
        
        // Set properties for the new index    
        $this->assertTrue($this->setField('formIndexName', 'stu_name_idx'));
        $this->assertTrue($this->setField('TableColumnList', array('name')));
        $this->assertTrue($this->setField('IndexColumnList[]', 'name'));     
        $this->assertTrue($this->setField('formIndexType', 'BTREE')); 
        $this->assertTrue($this->setField('formUnique', FALSE));
        $this->assertTrue($this->setField('formSpc', 'pg_default'));                
        
        $this->assertTrue($this->clickSubmit($lang['strcreate']));
        
        // Verify if the index is created correctly.
        $this->assertTrue($this->assertWantedText($lang['strindexcreated']));
        
        return TRUE; 
    }
    

    /**
     * TestCaseID: TCI02
     * Cancel creating index
     */
    function testCancelCreateIndex(){
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
        // Go to the Indexes page
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'create_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student'))
					);
        
        // Set properties for the new index    
        $this->assertTrue($this->setField('formIndexName', 'stu_name_idx'));
        $this->assertTrue($this->setField('TableColumnList', array('name')));
        $this->assertTrue($this->setField('IndexColumnList[]', 'name'));        
        $this->assertTrue($this->setField('formIndexType', 'BTREE')); 
        $this->assertTrue($this->setField('formUnique', TRUE));
        $this->assertTrue($this->setField('formSpc', 'pg_default'));                
        
        $this->assertTrue($this->clickSubmit($lang['strcancel']));
        
        return TRUE; 
    }

    /**
     * TestCaseID: TRI01
     * Test reindexing an index in a table
     */
    function testReindex()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
        // Go to the Indexes page
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'reindex',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'index' => 'stu_name_idx'))
					);
        
        // Verify if the index is reindexed correctly.
        $this->assertTrue($this->assertWantedText($lang['strreindexgood']));
        
        return TRUE;  
    }
    
    
    /**
     * TestCaseID: TCP01
     * Test clustering and analyzing the primary key in a table
     */
    function testClusterPrimaryKeyWithAnalyze()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'confirm_cluster_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'index' => 'student_pkey'))
					);
        $this->assertTrue($this->setField('analyze', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strcluster'])); 
        // Verify if the key is clustered correctly. 
        $this->assertTrue($this->assertWantedText($lang['strclusteredgood']));
        $this->assertTrue($this->assertWantedText($lang['stranalyzegood']));
        
        return TRUE; 
    }
    
    
    /**
     * TestCaseID: TCP02
     * Test clustering the primary key without analyzing in a table
     */
    function testClusterPrimaryKeyWithoutAnalyze()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'confirm_cluster_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'index' => 'student_pkey'))
					);
        $this->assertTrue($this->setField('analyze', FALSE));
        $this->assertTrue($this->clickSubmit($lang['strcluster']));
        // Verify if the key is clustered correctly.
        $this->assertTrue($this->assertWantedText($lang['strclusteredgood']));
        
        return TRUE;  
    }
    
    
    /**
     * TestCaseID: TCP03
     * Test cancelling clustering the primary key in a table
     */
    function testCancelCluster()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'confirm_cluster_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'constraint' => 'student_pkey'))
					);
        $this->assertTrue($this->setField('analyze', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strcancel']));
        
        return TRUE; 
    }

    /**
     * TestCaseID: TDI02
     * Cancel dropping an index in a table
     */
    function testCancelDropIndex()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'confirm_drop_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'index' => 'stu_name_idx'))
					);
        $this->assertField($this->setField('cascade', FALSE));
        $this->assertTrue($this->clickSubmit($lang['strcancel']));
        
        return TRUE; 
    }

    /**
     * TestCaseID: TDI01
     * Test dropping an index in a table
     */
    function testDropIndex()
    {
        global $webUrl;
        global $lang, $SERVER, $DATABASE;
        
		$this->assertTrue($this->get("$webUrl/indexes.php", array(
			            'server' => $SERVER,
						'action' => 'confirm_drop_index',
						'database' => $DATABASE,
						'schema' => 'public',
						'table' => 'student',
						'index' => 'stu_name_idx'))
					);
        $this->assertField($this->setField('cascade', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strdrop']));
        // Verify if the index is dropped correctly.
        $this->assertTrue($this->assertWantedText($lang['strindexdropped']));
        
        return TRUE; 
    }
}
