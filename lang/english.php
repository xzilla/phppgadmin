<?php

	/**
	 * Language template file for WebDB.  Use this to base language
	 * files.
	 *
	 * $Id: english.php,v 1.44 2003/01/18 09:07:51 chriskl Exp $
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
	$strSequence = 'Sequence';
	$strSequences = 'Sequences';
	$strOperators = 'Operators';
	$strTypes = 'Types';
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
	$strNext = 'Next';
	$strLength = 'Length';
	$strDefault = 'Default';
	$strAlter = 'Alter';
	$strCancel = 'Cancel';
	$strSave = 'Save';
	$strInsert = 'Insert';
	$strSelect = 'Select';
	$strDelete = 'Delete';
	$strUpdate = 'Update';
	$strReferences = 'References';
	$strYes = 'Yes';
	$strNo = 'No';
	$strEdit = 'Edit';
	$strRows = 'row(s)';
	$strExample = 'eg.';
	$strBack = 'Back';
	$strQueryResults = 'Query Results';
	$strShow = 'Show';
	$strEmpty = 'Empty';
	$strLanguage = 'Language';

	// Error handling
	$strNoFrames = 'You need a frames-enabled browser to use this application.';
	$strBadConfig = 'Your config.inc.php is out of date.  You will need to regenerate it from the new config.inc.php-dist.';
	$strNotLoaded = 'You have not compiled proper database support into your PHP installation.';
	$strBadSchema = 'Invalid schema specified.';
	$strBadEncoding = 'Failed to set client encoding in database.';
	$strSQLError = 'SQL error:';
	$strInStatement = 'In statement:';
	$strInvalidParam = 'Invalid script parameters.';
	$strNoData = 'No rows found.';

	// Tables
	$strNoTables = 'No tables found.';
	$strNoTable = 'No table found.';
	$strTable = 'Table';
	$strTables = 'Tables';
	$strTableCreated = 'Table created.';
	$strTableCreatedBad = 'Table creation failed.';
	$strTableNeedsField = 'You must specify at least one field.';
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
	$strConfEmptyTable = 'Are you sure you want to empty the table "%s"?';
	$strTableEmptied = 'Table emptied.';
	$strTableEmptiedBad = 'Table empty failed.';
	$strConfDropTable = 'Are you sure you want to drop the table "%s"?';
	$strTableDropped = 'Table dropped.';
	$strTableDroppedBad = 'Table drop failed.';

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

	// Groups
	$strGroupAdmin = 'Group Admin';
	$strGroup = 'Group';
	$strGroups = 'Groups';
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
	$strPrivileges = 'Privileges';
	$strGrant = 'Grant';
	$strRevoke = 'Revoke';

	// Databases
	$strDatabase = 'Database';
	$strDatabases = 'Databases';
	$strNoDatabases = 'No Databases found.';
	$strDatabaseNeedsName = 'You must give a name for your database.';
	
	// Views
	$strViewNeedsName = 'You must give a name for your view.';
	$strViewNeedsDef = 'You must give a definition for your view.';
	$strCreateView = 'Create View';
	$strNoViews = 'No views found.';
	$strView = 'View';
	$strViews = 'Views';

	// Sequences
	$strNoSequences = 'No sequences found.';
	$strSequenceName = 'sequence_name';
	$strLastValue = 'last_value';
	$strIncrementBy = 'increment_by';	
	$strMaxValue = 'max_value';
	$strMinValue = 'min_value';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strReset =	'Reset';

	// Indexes
	$strIndexes = 'Indexes';
	$strIndexName = 'Index Name';
	$strTabName = 'Tab Name';
	$strColumnName = 'Column Name';
	$strUniqueKey = 'Unique Key';
	$strPrimaryKey = 'Primary Key';
	$strShowAllIndexes = 'Show All Indexes';
	$strCreateIndex = 'Create Index';
	$strIndexNeedsName = 'You must give a name for your index';
	$strIndexNeedsCols = 'You must give a valid number of columns.';
	$strIndexCreated = 'Index created';
	$strIndexCreatedBad = 'Index creation failed.';
	$strConfDropIndex = 'Are you sure you want to drop the index "%s"?';
	$strIndexDropped = 'Index dropped.';
	$strIndexDroppedBad = 'Index drop failed.';

	// Rules
	$strRules = 'Rules';
	$strRule = 'Rule';
	$strNoRules = 'No rules found.';
	$strCreateRule = 'Create Rule';
	$strConfDropRule = 'Are you sure you want to drop the rule "%s" on "%s"?';
	$strRuleDropped = 'Rule dropped.';
	$strRuleDroppedBad = 'Rule drop failed.';

	// Tables
	$strField = 'Field';
	$strFields = 'Fields';
	$strType = 'Type';
	$strValue = 'Value';
	$strShowAllTables = 'Show All Tables';
	$strUnique = 'Unique';
	$strPrimary = 'Primary';
	$strKeyName = 'Key Name';
	$strNumFields = 'Num. Of Fields';
	$strCreateTable = 'Create Table';
	$strTableNeedsName = 'You must give a name for your table.';
	$strTableNeedsCols = 'You must give a valid number of columns.';
	$strExport = 'Export';
	$strColumns = 'Columns';

	// Constraints
	$strConstraints = 'Constraints';
	$strNoConstraints = 'No constraints found.';
	$strCreateConstraint = 'Create Constraint';
	$strConfDropConstraint = 'Are you sure you want to drop the constraint "%s" on "%s"?';
	$strConstraintDropped = 'Constraint dropped.';
	$strConstraintDroppedBad = 'Constraint drop failed.';

	// Functions
	$strNoFunctions = 'No functions found.';
	$strFunction = 'Function';
	$strFunctions = 'Functions';
	$strReturns = 'Returns';
	$strArguments = 'Arguments';
	$strFunctionNeedsName = 'You must give a name for your function.';
	$strFunctionNeedsDef = 'You must give a definition for your function.';
	
	// Triggers
	$strTrigger = 'Trigger';
	$strTriggers = 'Triggers';
	$strNoTriggers = 'No triggers found.';
	$strCreateTrigger = 'Create Trigger';
	
	// Types
	$strType = 'Type';
	$strTypes = 'Types';
	$strNoTypes = 'No types found.';
	$strCreateType = 'Create Type';
	$strConfDropType = 'Are you sure you want to drop the type "%s"?';
	$strTypeDropped = 'Type dropped.';
	$strTypeDroppedBad = 'Type drop failed.';
	$strTypeCreated = 'Type created';
	$strTypeCreatedBad = 'Type creation failed.';
	$strShowAllTypes = 'Show all types';
	$strInputFn = 'Input function';
	$strOutputFn = 'Output function';
	$strPassByVal = 'Passed by val?';
	$strAlignment = 'Alignment';
	$strElement = 'Element';
	$strDelimiter = 'Delimiter';
	$strStorage = 'Storage';
	$strTypeNeedsName = 'You must give a name for your type.';
	$strTypeNeedsLen = 'You must give a length for your type.';

	// Schemas
	$strSchema = 'Schema';
	$strSchemas = 'Schemas';
	$strCreateSchema = 'Create Schema';
	$strNoSchemas = 'No schemas found.';
	$strConfDropSchema = 'Are you sure you want to drop the schema "%s"?';
	$strSchemaDropped = 'Schema dropped.';
	$strSchemaDroppedBad = 'Schema drop failed.';
	$strSchemaCreated = 'Schema created';
	$strSchemaCreatedBad = 'Schema creation failed.';
	$strShowAllSchemas = 'Show All Schemas';
	$strSchemaNeedsName = 'You must give a name for your schema.';
	
	// Miscellaneous
	$strTopBar = '%s running on %s:%s -- You are logged in as user "%s", %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
