<?php

	/**
	 * Chinese language file.  UTF-8 encoded.
	 * @maintainer Chan Min Wai [dcmwai@amtb-m.org.my]
	 *
	 * $Id: chinese-tr-utf8.php,v 1.1 2003/01/06 02:16:34 chriskl Exp $
	 */

	$appLang = '繁體中文（萬國碼）';
	$appCharset = 'UTF-8';

	$strIntro = '歡迎使用 WebDB。';
	$strNoFrames = '您必須使用有框架結構的瀏覽器以執行本程式。';
	$strBadConfig = '您的 config.inc.php 已經不適用了。您需要自行的由 config.inc.php-dist 進行修改。';
	$strLogin = '登入';
	$strLoginFailed = '登入失敗';
	$strServer = '伺服器';
	$strNoTables = '資料表不存在。';
	$strNoTable = '資料表不存在。';
	$strNoViews = '觀看不存在。';
	$strNoFunctions = '功能不存在。';
	$strOwner = '所有人';
	$strAction = 'Action';	
	$strActions = 'Actions';	
	$strName = '名字';
	$strTable = '資料表';
	$strTables = '資料表';
	$strView = '觀看';
	$strViews = '觀看';
	$strDefinition = '解說';
	$strRules = '規則';
	$strSequence = '次序';
	$strSequences = '次序';
	$strFunction = '功能';
	$strFunctions = '功能';
	$strOperators = '操作員';
	$strTypes = '類型';
	$strAggregates = 'Aggregates';
	$strIndicies = '索引';
	$strProperties = '內容';
	$strBrowse = '瀏覽';
	$strDrop = '丟棄';
	$strDropped = '已丟棄';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = '前一筆';
	$strNext = '下一筆';
	$strFailed = '失敗';
	$strNotLoaded = '您的 PHP 中並無完整的資料庫字支援。';
	$strCreate = '新增';
	$strComment = '注釋|';
	//$strNext = 'Next'; (Double)
	$strLength = '長度';
	$strDefault = '預置值';
	$strAlter = '更改';
	$strCancel = '取消';
	$strSave = '儲蓄';
	$strInsert = '插入';
	$strSelect = '選擇';
	$strDelete = '刪除';
	$strUpdate = '更新';
	$strRule = '規則';
	$strReferences = '參考';
	$strYes = '是';
	$strNo = '否';
	$strEdit = '編輯';
	$strInvalidParam = 'Invalid script parameters.';
	$strRows = '行';
	$strExample = '如：';
	
	// Error handling
	$strSQLError = 'SQL 錯誤:';
	$strInStatement = 'In statement:';
	
	// Users
	$strUser = '使用者';
	$strGroup = '群組';
	$strUsername = '用戶名稱';
	$strPassword = '密碼';
	$strSuper = '超級用戶？';
	$strCreateDB = '新增資料庫？';
	$strExpires = '過期';	
	$strNoUsers = '查無此使用者';
	
	// Privilges
	$strPrivileges = '特權';
	$strGrant = '準予';
	$strRevoke = '撤回';

	// Databases
	$strDatabase = '資料庫';
	$strDatabases = '資料庫';
	$strNoDatabases = '查無此資料庫。';
	$strDatabaseNeedsName = '您必須給資料庫一固名稱';
	
	// Views
	$strViewNeedsName = '您的觀看必須有一個名稱。';
	$strViewNeedsDef = '您的觀看必須有一個解說。';

	// Sequences
	$strNoSequences = '查無次序。';
	$strSequenceName = '次序名稱';
	$strLastValue = '最後的數目';
	$strIncrementBy = '增量（加／減）';	
	$strMaxValue = '最大值';
	$strMinValue = '最小值';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strReset =	'重設';

	// Indicies
	$strIndexName = '索引名稱';
	$strTabName = 'Tab Name';
	$strColumnName = '行列名稱';
	$strUniqueKey = '唯一';
	$strPrimaryKey = '主鍵';
	$strShowAllIndicies = 'Show All Indicies';
	$strCreateIndex = 'Create Index';
	$strIndexNeedsName = 'You must give a name for your index';
	$strIndexNeedsCols = 'You must give a valid number of columns.';
	$strIndexCreated = 'Index created';
	$strIndexCreatedBad = 'Index creation failed.';
	$strConfDropIndex = 'Are you sure you want to drop the index "%s"?';
	$strIndexDropped = 'Index dropped.';
	$strIndexDroppedBad = 'Index drop failed.';
	
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
	$strConstraints = 'Constraints';
	$strColumns = 'Columns';
	
	// Functions
	$strReturns = 'Returns';
	$strArguments = 'Arguments';
	$strLanguage = 'Language';
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

?>
