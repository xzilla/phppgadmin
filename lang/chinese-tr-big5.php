<?php

/**
* @maintainer Chan Min Wai [dcmwai@amtb-m.org.my] 
* Direct conver from Simplify Chinese @He Wei Ping [laser@zhengmai.com.cn] 
*/

// Language and character set
$appLang = '繁體中文（big5）'；
$appCharset = 'big5'；

// Basic strings
$strIntro = '迎使用 WebDB。'；
$strLogin = '登錄'；
$strLoginFailed = '登錄失敗'；
$strServer = '服務器'；
$strLogout = '注銷'；
$strOwner = '所屬人'；
$strAction = '功能'；
$strActions = '功能'；
$strName = '名字'；
$strDefinition = '定義'；
$strSequence = '序列'；
$strSequences = '序列'；
$strOperators = '操作'；
$strTypes = '類型'；
$strAggregates = '聚集'；
$strProperties = '屬性'；
$strBrowse = '瀏覽'；
$strDrop = '刪除'；
$strDropped = '已刪除'；
$strNull = '空'；
$strNotNull = '非空'；
$strPrev = '上一個'；
$strNext = '下一個'；
$strFailed = '失敗'；
$strCreate = '創建'；
$strComment = '注釋'；
//$strNext = 'Next'；
$strLength = '長度'；
$strDefault = '默認'；
$strAlter = '更改'；
$strCancel = '取消'；
$strSave = '存儲'；
$strInsert = '插入'；
$strSelect = '選取'；
$strDelete = '刪除'；
$strUpdate = '更新'；
$strReferences = '參考'；
$strYes = '是'；
$strNo = '否'；
$strEdit = '編輯'；
$strRows = '行'；
$strExample = '如：'；
$strBack = '返回'；
$strQueryResults = '查尋結果'；
$strShow = '顯示'；
$strEmpty = '空'；
$strLanguage = '語言'；

// Error handling
$strNoFrames = '您必使用支持框架的瀏覽器瀏覽本程序。'；
$strBadConfig = '您的 config.inc.php 已失效。您需要自行通過 config.inc.php-ist 修改。'；
$strNotLoaded = '您的 PHP 中沒有完整的數據庫支持。'；
$strSQLError = 'SQL:錯誤'；
$strInStatement = 'In statement：'；
$strInvalidParam = '無效的腳本參數'；
$strNoData = '查無此行。'；

// Tables
$strNoTables = '查無此表。'；
$strNoTable = '查無此表。'；
$strTable = '數據表'；
$strTables = '數據表'；
$strTableCreated = '建表完成。'；
$strTableCreatedBad = '建表失敗'；
$strTableNeedsField = '至少需要一個數據段。'；
$strInsertRow = '插入行'；
$strRowInserted = '插入行完成。'；
$strRowInsertedBad = '先插入行。'；
$strEditRow = '更改行'；
$strRowUpdated = '完成行更新。'；
$strRowUpdatedBad = '更新行失敗。'；
$strDeleteRow = '刪除行'；
$strConfDeleteRow = '真的要除所有的行？'；
$strRowDeleted = '刪除除行完成。'；
$strRowDeletedBad = '除行失敗。'；
$strSaveAndRepeat = '重復存儲'；
$strConfEmptyTable = '真的要清空"%s"數據表？'；
$strTableEmptied = '數據表清空完成。'；
$strTableEmptiedBad = '數據表清空失敗。'；
$strConfDropTable = '真的要刪除除"%s"數據表？'；
$strTableDropped = '善除數據表完成。'；
$strTableDroppedBad = '刪除數據表失敗。'；

// Users
$strUserAdmin = '用戶管理'；
$strUser = '用戶'；
$strUsers = '用戶'；
$strUsername = '用名'；
$strPassword = '密碼'；
$strSuper = '超級用戶'；
$strCreateDB = '建庫'；
$strExpires = '過期'；
$strNoUsers = '查無此用戶'；

// Groups
$strGroupAdmin = '組管理'；
$strGroup = '組'；
$strGroups = '群組'；
$strNoGroups = '查無群組。'；
$strCreateGroup = '創建組'；
$strShowAllGroups = '顯示所有群組'；
$strGroupNeedsName = '你必給您組命名。'；
$strGroupCreated = '建組完成。'；
$strGroupCreatedBad = '建組失敗。'；
$strConfDropGroup = '真的要刪除"%s"組？'；
$strGroupDropped = '刪除組完成。'；
$strGroupDroppedBad = '刪除組失敗。'；
$strMembers = '成員'；

// Privilges
$strPrivileges = '特權'；
$strGrant = '賦予'；
$strRevoke = '撤回'；

// Databases
$strDatabase = '數據庫'；
$strDatabases = '數據庫'；
$strNoDatabases = '查無此數據庫。'；
$strDatabaseNeedsName = '你必須給您的數據庫命名。'；

// Views
$strViewNeedsName = '你必須給您的視圖命名。'；
$strViewNeedsDef = '你必須定義您的視圖。'；
$strCreateView = '建立視圖'；
$strNoViews = '查無視圖。'；
$strView = '視圖'；
$strViews = '視圖';

// Sequences
$strNoSequences = '查無序列。'；
$strSequenceName = '序列名稱'；
$strLastValue = '最後的數目'；
$strIncrementBy = '增量（加／減）'；
$strMaxValue = '最大值'；
$strMinValue = '最小值'；
$strCacheValue = 'cache_value'；
$strLogCount = 'log_cnt'；
$strIsCycled = 'is_cycled'；
$strIsCalled = 'is_called'；
$strReset = '重置'；

// Indexes
$strIndexes = '索引'；
$strIndexName = '索引名'；
$strTabName = 'Tab Name'；
$strColumnName = 'Column Name'；
$strUniqueKey = '唯一鍵'；
$strPrimaryKey = '主鍵'；
$strShowAllIndexes = '顯示所有索引'；
$strCreateIndex = '創建索引'；
$strIndexNeedsName = '你必須給您的索引命名。'；
$strIndexNeedsCols = '你必須給你的字段賦予一個正整數。'；
$strIndexCreated = '創建索引完成'；
$strIndexCreatedBad = '創建索引失敗.'；
$strConfDropIndex = '真的要刪除"%s"索引？'；
$strIndexDropped = '刪除索引完成。'；
$strIndexDroppedBad = '刪除除索引失敗。'；

// Rules
$strRules = '規則'；
$strRule = '規則'；
$strNoRules = '查無此規則'；
$strCreateRule = '創建規則'；

// Tables
$strField = '列'；
$strFields = '列'；
$strType = '類型'；
$strValue = '值'；
$strShowAllTables = '示所有表。'；
$strUnique = '唯一'；
$strPrimary = '主'；
$strKeyName = '鍵名'；
$strNumFields = '列數'；
$strCreateTable = '創建表'；
$strTableNeedsName = '你必您的索引命名。'；
$strTableNeedsCols = '你必須給你的字段賦予一個正整數。'；
$strExport = '導出'；
$strConstraints = '強制'；
$strColumns = '列'；

// Functions
$strNoFunctions = '查無此函數'；
$strFunction = '函數'；
$strFunctions = '函數'；
$strReturns = 'Returns'
$strArguments = '參數'；
$strFunctionNeedsName = '你必須給您的函數命名。'；
$strFunctionNeedsDef = '你必須定義您的函數。'；

// Triggers
$strTrigger = '觸發器'；
$strTriggers = '觸發器'；
$strNoTriggers = '查無此觸發器。'；
$strCreateTrigger = '創建觸發器'；

// Types
$strType = '類型'；
$strTypes = '類型'；
$strNoTypes = '查無此類型。'；
$strCreateType = '創建類型'；
$strConfDropType = '真的要刪除"%s"類型？'；
$strTypeDropped = '刪除類型完成。'；
$strTypeDroppedBad = '刪除類型失敗。'；
$strTypeCreated = '創建類型完成。'；
$strTypeCreatedBad = '建型失敗。'；
$strShowAllTypes = '顯示所有的類型'；
$strInputFn = '輸入功能'；
$strOutputFn = '輸出功能'；
$strPassByVal = 'Passed by val？'；
$strAlignment = 'Alignment'；
$strElement = '元素'；
$strDelimiter = '分隔符'；
$strStorage = '磁盤存儲'；
$strTypeNeedsName = '你必給您的類型命名。'；
$strTypeNeedsLen = '你必給您的類型定義一個長度。'；

// Schemas
$strSchema = '模式'；
$strSchemas = '模式'；
$strCreateSchema = '創建模式'；
$strNoSchemas = '沒有此模式'；
$strConfDropSchema = '你確定要刪除"%s"模式麼？'；
$strSchemaDropped = '模式已刪除'；
$strSchemaDroppedBad = '模式刪除失敗'；
$strSchemaCreated = '模式已建立'；
$strSchemaCreatedBad = '創建模式失敗'；
$strShowAllSchemas = '顯示所有模式?'；
$strSchemaNeedsName = '必須給模式命名'；

// Miscellaneous
$strTopBar = '%s 架于 %s：%s － 您是 "%s"， %s'；
$strTimeFmt = 'jS M， Y g：iA'；

?> 
