<?php
/**
 * Function area     : Database.
 * Sub Function area : SchemaBasic.
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
 * This class is to test the Schema Basic Management of
 * PostgreSql implementation.
 */
class SchemaBasicTest extends PreconditionSet
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
            $webUrl . '/index.php');

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
     * TestCaseId: DCS001
     * This test is used to create one new schema for super user.
     */
    function testCreateBasSchema()
    {
        global $webUrl;
        global $lang;

        $this->assertTrue($this->get($webUrl . '/database.php?database=test' .
                                     '&subject=database'));
        $this->assertTrue($this->get($webUrl . '/database.php?database=test' .
                                     '&action=create'));

        $this->assertTrue($this->setField('formName', 'testSchemaName'));
        $this->assertTrue($this->setField('formAuth', 'super'));
        $this->assertTrue($this->setField('formComment',
                                          'Comment of test schema.'));

        $this->assertTrue($this->clickSubmit($lang['strcreate']));

        $this->assertWantedText($lang['strschemacreated']);

        return TRUE;
    }

    
    /**
     * TestCaseId: DAS001
     * This test is used to modify one existent schema for super user.
     */
    function testAlterBasSchema()
    {
        global $webUrl;
        global $lang;

        $this->assertTrue($this->get($webUrl . '/database.php?database=test' .
                                     '&subject=database'));
        $this->assertTrue($this->get($webUrl . '/redirect.php?section=database' .
                                     '&database=test&'));
        $this->assertTrue($this->get($webUrl . '/database.php?database=test' .
                                     '&subject=database'));
        $this->assertTrue($this->get($webUrl . '/database.php' .
                                     '?action=alter_schema' .
                                     '&database=test&schema=testSchemaName&'));

        $this->assertTrue($this->setField('comment',
                                          'The comment has been changed.'));
        $this->assertTrue($this->clickSubmit('Alter'));

        $this->assertWantedText($lang['strschemaaltered']);

        return TRUE;
    }

    
    /**
     * TestCaseId: DDS001
     * This test is used to drop one existent schema for super user.
     */
    function testDropBasSchema()
    {
        global $webUrl;
        global $lang;

        $this->assertTrue($this->get($webUrl . '/database.php?database=test' .
                                     '&subject=database'));
        $this->assertTrue($this->get($webUrl . '/redirect.php' .
                                     '?section=database&database=test&'));
        $this->assertTrue($this->get($webUrl . '/database.php' .
                                     '?action=confirm_drop&database=test' .
                                     '&schema=testSchemaName&'));

        $this->assertTrue($this->setField('cascade', TRUE));
        $this->assertTrue($this->clickSubmit($lang['strdrop']));

        $this->assertWantedText($lang['strschemadropped']);
        
        return TRUE;
    }
}

?>
