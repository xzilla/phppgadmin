<?php

	/**
	 * Language template file for WebDB. Use this to base language
	 * files.
	 *
	 * $Id: english.php,v 1.53 2003/02/20 23:15:16 slubek Exp $
	 */

	// Language and character set
	$appLang = 'English';
	$appCharset = 'ISO-8859-1';

	// Basic strings
	$strIntro = 'Welcome to phpPgAdmin.';
	$strLogin = 'Login';
	$strLoginFailed = 'Login failed';
	$strServer = 'Server';
	$strLogout = 'Logout';
	$strOwner = 'Owner';
	$strAction = 'Action';	
	$strActions = 'Actions';	
	$strName = 'Name';
	$strDefinition = 'Definition';
	$strOperators = 'Operators';
	$strAggregates = 'Aggregates';
	$strProperties = 'Properties';
	$strBrowse = 'Browse';
	$strDrop = 'Drop';
	$strDropped = 'Dropped';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = 'Prev';
	$strNext = 'Next';
	$strFailed = 'Failed';
	$strCreate = 'Create';
	$strComment = 'Comment';
	$strLength = 'Length';
	$strDefault = 'Default';
	$strAlter = 'Alter';
	$strCancel = 'Cancel';
	$strSave = 'Save';
	$strReset = 'Reset';
	$strInsert = 'Insert';
	$strSelect = 'Select';
	$strDelete = 'Delete';
	$strUpdate = 'Update';
	$strReferences = 'References';
	$strYes = 'Yes';
	$strNo = 'No';
	$strEdit = 'Edit';
	$strColumns = 'Columns';
	$strRows = 'row(s)';
	$strExample = 'eg.';
	$strBack = 'Back';
	$strQueryResults = 'Query Results';
	$strShow = 'Show';
	$strEmpty = 'Empty';
	$strLanguage = 'Language';
	$strEncoding = 'Encoding';
	$strValue = 'Value';
	$strUnique = 'Unique';
	$strPrimary = 'Primary';
	$strExport = 'Export';
	$strSQL = 'SQL';
	$strGo = 'Go';

	// Error handling
	$strNoFrames = 'You need a frames-enabled browser to use this application.';
	$strBadConfig = 'Your config.inc.php is out of date. You will need to regenerate it from the new config.inc.php-dist.';
	$strNotLoaded = 'You have not compiled proper database support into your PHP installation.';
	$strBadSchema = 'Invalid schema specified.';
	$strBadEncoding = 'Failed to set client encoding in database.';
	$strSQLError = 'SQL error:';
	$strInStatement = 'In statement:';
	$strInvalidParam = 'Invalid script parameters.';
	$strNoData = 'No rows found.';

	// Tables
	$strTable = 'Table';
	$strTables = 'Tables';
	$strShowAllTables = 'Show All Tables';
	$strNoTables = 'No tables found.';
	$strNoTable = 'No table found.';
	$strCreateTable = 'Create table';
	$strTableName = 'Table name';
	$strTableNeedsName = 'You must give a name for your table.';
	$strTableNeedsField = 'You must specify at least one field.';
	$strTableNeedsCols = 'You must give a valid number of columns.';
	$strTableCreated = 'Table created.';
	$strTableCreatedBad = 'Table creation failed.';
	$strConfDropTable = 'Are you sure you want to drop the table "%s"?';
	$strTableDropped = 'Table dropped.';
	$strTableDroppedBad = 'Table drop failed.';
	$strConfEmptyTable = 'Are you sure you want to empty the table "%s"?';
	$strTableEmptied = 'Table emptied.';
	$strTableEmptiedBad = 'Table empty failed.';
	$strInsertRow = 'Insert Row';
	$strRowInserted = 'Row inserted.';
	$strRowInsertedBad = 'Row insert failed.';
	$strEditRow = 'Edit Row';
	$strRowUpdated = 'Row updated.';
	$strRowUpdatedBad = 'Row update failed.';
	$strDeleteRow = 'Delete Row';
	$strConfDeleteRow = 'Are you sure you want to delete this row?';
	$strRowDeleted = 'Row deleted.';
	$strRowDeletedBad = 'Row deletion failed.';
	$strSaveAndRepeat = 'Save & Repeat';
	$strField = 'Field';
	$strFields = 'Fields';
	$strNumFields = 'Num. Of Fields';
	$strFieldNeedsName = 'You must name your field';
	$strSelectNeedsCol = 'You must show at least one column';
	$strAlterColumn = 'Alter Column';
	$strColumnAltered = 'Column Altered.';
	$strColumnAlteredBad = 'Column altering failed.';
        $strConfDropColumn = 'Are you sure you want to drop column "%s" from table "%s"?';
	$strColumnDropped = 'Column dropped.';
	$strColumnDroppedBad = 'Column drop failed.';
			
	// Users
	$strUserAdmin = 'User Admin';
	$strUser = 'User';
	$strUsers = 'Users';
	$strUsername = 'Username';
	$strPassword = 'Password';
	$strSuper = 'Superuser?';
	$strCreateDB = 'Create DB?';
	$strExpires = 'Expires';
	$strNoUsers = 'No users found.';
        $strUserUpdated = 'User updated.';
	$strUserUpdatedBad = 'User update failed.';
		
	// Groups
	$strGroupAdmin = 'Group Admin';
	$strGroup = 'Group';
	$strGroups = 'Groups';
	$strNoGroup = 'Group not found.';
	$strNoGroups = 'No groups found.';
	$strCreateGroup = 'Create Group';
	$strShowAllGroups = 'Show All Groups';
	$strGroupNeedsName = 'You must give a name for your group.';
	$strGroupCreated = 'Group created.';
	$strGroupCreatedBad = 'Group creation failed.';	
	$strConfDropGroup = 'Are you sure you want to drop the group "%s"?';
	$strGroupDropped = 'Group dropped.';
	$strGroupDroppedBad = 'Group drop failed.';
	$strMembers = 'Members';

	// Privilges
	$strPrivilege = 'Privilege';
	$strPrivileges = 'Privileges';
	$strNoPrivileges = 'This object has no privileges.';
	$strGrant = 'Grant';
	$strRevoke = 'Revoke';
	$strGranted = 'Privileges granted.';
	$strGrantFailed = 'Failed to grant privileges.';
	$strGrantUser = 'Grant User';
	$strGrantGroup = 'Grant Group';

	// Databases
	$strDatabase = 'Database';
	$strDatabases = 'Databases';
	$strShowAllDatabases = 'Show all databases';
	$strNoDatabase = 'No Database found.';
	$strNoDatabases = 'No Databases found.';
	$strCreateDatabase = 'Create database';
	$strDatabaseName = 'Database name';
	$strDatabaseNeedsName = 'You must give a name for your database.';
	$strDatabaseCreated = 'Database created.';
	$strDatabaseCreatedBad = 'Database creation failed.';	
	$strConfDropDatabase = 'Are you sure you want to drop the database "%s"?';
	$strDatabaseDropped = 'Database dropped.';
	$strDatabaseDroppedBad = 'Database drop failed.';
	$strEnterSQL = 'Enter the SQL to execute below:';

	// Views
	$strView = 'View';
	$strViews = 'Views';
	$strShowAllViews = 'Show all views';
	$strNoView = 'No view found.';
	$strNoViews = 'No views found.';
	$strCreateView = 'Create View';
	$strViewName = 'View name';
	$strViewNeedsName = 'You must give a name for your view.';
	$strViewNeedsDef = 'You must give a definition for your view.';
	$strViewCreated = 'View created.';
	$strViewCreatedBad = 'View creation failed.';
	$strConfDropView = 'Are you sure you want to drop the view "%s"?';
	$strViewDropped = 'View dropped.';
	$strViewDroppedBad = 'View drop failed.';
	$strViewUpdated = 'View updated.';
	$strViewUpdatedBad = 'View update failed.';

	// Sequences
	$strSequence = 'Sequence';
	$strSequences = 'Sequences';
	$strShowAllSequences = 'Show all sequences';
	$strNoSequence = 'No sequence found.';
	$strNoSequences = 'No sequences found.';
	$strCreateSequence = 'Create sequence';
	$strSequenceName = 'sequence_name';
	$strLastValue = 'last_value';
	$strIncrementBy = 'increment_by';	
	$strMaxValue = 'max_value';
	$strMinValue = 'min_value';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strSequenceNeedsName = 'You must specify a name of sequence.';
	$strSequenceCreated = 'Sequence created.';
	$strSequenceCreatedBad = 'Sequence creation failed.'; 
	$strConfDropSequence = 'Are you sure you want to drop sequence "%s"?';
	$strSequenceDropped = 'Sequence dropped.';
	$strSequenceDroppedBad = 'Sequence drop failed.';

	// Indexes
	$strIndexes = 'Indexes';
	$strIndexName = 'Index Name';
	$strShowAllIndexes = 'Show All Indexes';
	$strNoIndex = 'No index found.';
	$strNoIndexes = 'No indexes found.';
	$strCreateIndex = 'Create Index';
	$strIndexName = 'Index name';
	$strTabName = 'Tab Name';
	$strColumnName = 'Column Name';
	$strIndexNeedsName = 'You must give a name for your index';
	$strIndexNeedsCols = 'You must give a valid number of columns.';
	$strIndexCreated = 'Index created';
	$strIndexCreatedBad = 'Index creation failed.';
	$strConfDropIndex = 'Are you sure you want to drop the index "%s"?';
	$strIndexDropped = 'Index dropped.';
	$strIndexDroppedBad = 'Index drop failed.';
	$strKeyName = 'Key Name';
	$strUniqueKey = 'Unique Key';
	$strPrimaryKey = 'Primary Key';

	// Rules
	$strRules = 'Rules';
	$strRule = 'Rule';
	$strShowAllRules = 'Show all Rules';
	$strNoRule = 'No rule found.';
	$strNoRules = 'No rules found.';
	$strCreateRule = 'Create rule';
	$strRuleName = 'Rule name';
	$strRuleNeedsName = 'You must specify a name of rule.';
	$strRuleCreated = 'Rule created.';
	$strRuleCreatedBad = 'Rule creation failed.';
	$strConfDropRule = 'Are you sure you want to drop the rule "%s" on "%s"?';
	$strRuleDropped = 'Rule dropped.';
	$strRuleDroppedBad = 'Rule drop failed.';

	// Constraints
	$strConstraints = 'Constraints';
	$strShowAllConstraints = 'Show all constraints';
	$strNoConstraints = 'No constraints found.';
	$strCreateConstraint = 'Create Constraint';
	$strConstraintCreated = 'Constraint created.';
	$strConstraintCreatedBad = 'Constraint creation failed.';
	$strConfDropConstraint = 'Are you sure you want to drop the constraint "%s" on "%s"?';
	$strConstraintDropped = 'Constraint dropped.';
	$strConstraintDroppedBad = 'Constraint drop failed.';

	// Functions
	$strFunction = 'Function';
	$strFunctions = 'Functions';
	$strShowAllFunctions = 'Show all functions';
	$strNoFunction = 'No function found.';
	$strNoFunctions = 'No functions found.';
	$strCreateFunction = 'Create function';
	$strFunctionName = 'Function name';
	$strReturns = 'Returns';
	$strArguments = 'Arguments';
	$strFunctionNeedsName = 'You must give a name for your function.';
	$strFunctionNeedsDef = 'You must give a definition for your function.';
	$strFunctionCreated = 'Function created.';
	$strFunctionCreatedBad = 'Function creation failed.';
	$strConfDropFunction = 'Are you sure you want to drop the function "%s"?';
	$strFunctionDropped = 'Function dropped.';
	$strFunctionDroppedBad = 'Function drop failed.';
	$strFunctionUpdated = 'Function updated.';
	$strFunctionUpdatedBad = 'Function update failed.';

	// Triggers
	$strTrigger = 'Trigger';
	$strTriggers = 'Triggers';
	$strShowAllTriggers = 'Show all triggers';
	$strNoTrigger = 'No trigger found.';
	$strNoTriggers = 'No triggers found.';
	$strCreateTrigger = 'Create Trigger';
	$strTriggerName = 'Trigger name';
	$strTriggerNeedsName = 'You must specify a name of trigger.';
	$strTriggerCreated = 'Trigger created.';
	$strTriggerCreatedBad = 'Trigger creation failed.';
	$strConfDropTrigger = 'Are you sure you want to drop the trigger "%s" on "%s"?';
	$strTriggerDropped = 'Trigger dropped.';
	$strTriggerDroppedBad = 'Trigger drop failed.';
	
	// Types
	$strType = 'Type';
	$strTypes = 'Types';
	$strShowAllTypes = 'Show all types';
	$strNoType = 'No type found.';
	$strNoTypes = 'No types found.';
	$strCreateType = 'Create Type';
	$strTypeName = 'Type name';
	$strInputFn = 'Input function';
	$strOutputFn = 'Output function';
	$strPassByVal = 'Passed by val?';
	$strAlignment = 'Alignment';
	$strElement = 'Element';
	$strDelimiter = 'Delimiter';
	$strStorage = 'Storage';
	$strTypeNeedsName = 'You must give a name for your type.';
	$strTypeNeedsLen = 'You must give a length for your type.';
	$strTypeCreated = 'Type created';
	$strTypeCreatedBad = 'Type creation failed.';
	$strConfDropType = 'Are you sure you want to drop the type "%s"?';
	$strTypeDropped = 'Type dropped.';
	$strTypeDroppedBad = 'Type drop failed.';

	// Schemas
	$strSchema = 'Schema';
	$strSchemas = 'Schemas';
	$strShowAllSchemas = 'Show All Schemas';
	$strNoSchema = 'No schema found.';
	$strNoSchemas = 'No schemas found.';
	$strCreateSchema = 'Create Schema';
	$strSchemaName = 'Schema name';
	$strSchemaNeedsName = 'You must give a name for your schema.';
	$strSchemaCreated = 'Schema created';
	$strSchemaCreatedBad = 'Schema creation failed.';
	$strConfDropSchema = 'Are you sure you want to drop the schema "%s"?';
	$strSchemaDropped = 'Schema dropped.';
	$strSchemaDroppedBad = 'Schema drop failed.';

	// Reports
	$strReport = 'Report';
	$strReports = 'Reports';
	$strNoReports = 'No reports found.';
	$strCreateReport = 'Create Report';
	$strReportDropped = 'Report dropped.';
	$strReportDroppedBad = 'Report drop failed.';
	$strConfDropReport = 'Are you sure you want to drop the report "%s"?';

	// Miscellaneous
	$strTopBar = '%s running on %s:%s -- You are logged in as user "%s", %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
