<?php

/**
* @maintainer He Wei Ping [laser@zhengmai.com.cn] 
*/

// Language and character set
$appLang = '简体中文（统一码）'；
$appCharset = 'utf8'；

// Basic strings
$strIntro = '迎使用 WebDB。'；
$strLogin = '登录'；
$strLoginFailed = '登录失败'；
$strServer = '服务器'；
$strLogout = '注销'；
$strOwner = '所属人'；
$strAction = '功能'；
$strActions = '功能'；
$strName = '名字'；
$strDefinition = '定义'；
$strSequence = '序列'；
$strSequences = '序列'；
$strOperators = '操作'；
$strTypes = '类型'；
$strAggregates = '聚集'；
$strProperties = '属性'；
$strBrowse = '浏览'；
$strDrop = '删除'；
$strDropped = '已删除'；
$strNull = '空'；
$strNotNull = '非空'；
$strPrev = '上一个'；
$strNext = '下一个'；
$strFailed = '失败'；
$strCreate = '创建'；
$strComment = '注释'；
//$strNext = 'Next'；
$strLength = '长度'；
$strDefault = '默认'；
$strAlter = '更改'；
$strCancel = '取消'；
$strSave = '存储'；
$strInsert = '插入'；
$strSelect = '选取'；
$strDelete = '删除'；
$strUpdate = '更新'；
$strReferences = '参考'；
$strYes = '是'；
$strNo = '否'；
$strEdit = '编辑'；
$strRows = '行'；
$strExample = '如：'；
$strBack = '返回'；
$strQueryResults = '查寻结果'；
$strShow = '显示'；
$strEmpty = '空'；
$strLanguage = '语言'；

// Error handling
$strNoFrames = '您必使用支持框架的浏览器浏览本程序。'；
$strBadConfig = '您的 config.inc.php 已失效。您需要自行通过 config.inc.php-ist 修改。'；
$strNotLoaded = '您的 PHP 中没有完整的数据库支持。'；
$strSQLError = 'SQL:错误'；
$strInStatement = 'In statement：'；
$strInvalidParam = '无效的脚本参数'；
$strNoData = '查无此行。'；

// Tables
$strNoTables = '查无此表。'；
$strNoTable = '查无此表。'；
$strTable = '数据表'；
$strTables = '数据表'；
$strTableCreated = '建表完成。'；
$strTableCreatedBad = '建表失败'；
$strTableNeedsField = '至少需要一个数据段。'；
$strInsertRow = '插入行'；
$strRowInserted = '插入行完成。'；
$strRowInsertedBad = '先插入行。'；
$strEditRow = '更改行'；
$strRowUpdated = '完成行更新。'；
$strRowUpdatedBad = '更新行失败。'；
$strDeleteRow = '删除行'；
$strConfDeleteRow = '真的要除所有的行？'；
$strRowDeleted = '删除除行完成。'；
$strRowDeletedBad = '除行失败。'；
$strSaveAndRepeat = '重复存储'；
$strConfEmptyTable = '真的要清空"%s"数据表？'；
$strTableEmptied = '数据表清空完成。'；
$strTableEmptiedBad = '数据表清空失败。'；
$strConfDropTable = '真的要删除除"%s"数据表？'；
$strTableDropped = '善除数据表完成。'；
$strTableDroppedBad = '删除数据表失败。'；

// Users
$strUserAdmin = '用户管理'；
$strUser = '用户'；
$strUsers = '用户'；
$strUsername = '用名'；
$strPassword = '密码'；
$strSuper = '超级用户'；
$strCreateDB = '建库'；
$strExpires = '过期'；
$strNoUsers = '查无此用户'；

// Groups
$strGroupAdmin = '组管理'；
$strGroup = '组'；
$strGroups = '群组'；
$strNoGroups = '查无群组。'；
$strCreateGroup = '创建组'；
$strShowAllGroups = '显示所有群组'；
$strGroupNeedsName = '你必给您组命名。'；
$strGroupCreated = '建组完成。'；
$strGroupCreatedBad = '建组失败。'；
$strConfDropGroup = '真的要删除"%s"组？'；
$strGroupDropped = '删除组完成。'；
$strGroupDroppedBad = '删除组失败。'；
$strMembers = '成员'；

// Privilges
$strPrivileges = '特权'；
$strGrant = '赋予'；
$strRevoke = '撤回'；

// Databases
$strDatabase = '数据库'；
$strDatabases = '数据库'；
$strNoDatabases = '查无此数据库。'；
$strDatabaseNeedsName = '你必须给您的数据库命名。'；

// Views
$strViewNeedsName = '你必须给您的视图命名。'；
$strViewNeedsDef = '你必须定义您的视图。'；
$strCreateView = '建立视图'；
$strNoViews = '查无视图。'；
$strView = '视图'；
$strViews = '视图';

// Sequences
$strNoSequences = '查无序列。'；
$strSequenceName = '序列名称'；
$strLastValue = '最后的数目'；
$strIncrementBy = '增量（加／减）'；
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
$strUniqueKey = '唯一键'；
$strPrimaryKey = '主键'；
$strShowAllIndexes = '显示所有索引'；
$strCreateIndex = '创建索引'；
$strIndexNeedsName = '你必须给您的索引命名。'；
$strIndexNeedsCols = '你必须给你的字段赋予一个正整数。'；
$strIndexCreated = '创建索引完成'；
$strIndexCreatedBad = '创建索引失败.'；
$strConfDropIndex = '真的要删除"%s"索引？'；
$strIndexDropped = '删除索引完成。'；
$strIndexDroppedBad = '删除除索引失败。'；

// Rules
$strRules = '规则'；
$strRule = '规则'；
$strNoRules = '查无此规则'；
$strCreateRule = '创建规则'；

// Tables
$strField = '列'；
$strFields = '列'；
$strType = '类型'；
$strValue = '值'；
$strShowAllTables = '示所有表。'；
$strUnique = '唯一'；
$strPrimary = '主'；
$strKeyName = '键名'；
$strNumFields = '列数'；
$strCreateTable = '创建表'；
$strTableNeedsName = '你必您的索引命名。'；
$strTableNeedsCols = '你必须给你的字段赋予一个正整数。'；
$strExport = '导出'；
$strConstraints = '强制'；
$strColumns = '列'；

// Functions
$strNoFunctions = '查无此函数'；
$strFunction = '函数'；
$strFunctions = '函数'；
$strReturns = 'Returns'
$strArguments = '参数'；
$strFunctionNeedsName = '你必须给您的函数命名。'；
$strFunctionNeedsDef = '你必须定义您的函数。'；

// Triggers
$strTrigger = '触发器'；
$strTriggers = '触发器'；
$strNoTriggers = '查无此触发器。'；
$strCreateTrigger = '创建触发器'；

// Types
$strType = '类型'；
$strTypes = '类型'；
$strNoTypes = '查无此类型。'；
$strCreateType = '创建类型'；
$strConfDropType = '真的要删除"%s"类型？'；
$strTypeDropped = '删除类型完成。'；
$strTypeDroppedBad = '删除类型失败。'；
$strTypeCreated = '创建类型完成。'；
$strTypeCreatedBad = '建型失败。'；
$strShowAllTypes = '显示所有的类型'；
$strInputFn = '输入功能'；
$strOutputFn = '输出功能'；
$strPassByVal = 'Passed by val？'；
$strAlignment = 'Alignment'；
$strElement = '元素'；
$strDelimiter = '分隔符'；
$strStorage = '磁盘存储'；
$strTypeNeedsName = '你必给您的类型命名。'；
$strTypeNeedsLen = '你必给您的类型定义一个长度。'；

// Schemas
$strSchema = '模式'；
$strSchemas = '模式'；
$strCreateSchema = '创建模式'；
$strNoSchemas = '没有此模式'；
$strConfDropSchema = '你确定要删除"%s"模式么？'；
$strSchemaDropped = '模式已删除'；
$strSchemaDroppedBad = '模式删除失败'；
$strSchemaCreated = '模式已建立'；
$strSchemaCreatedBad = '创建模式失败'；
$strShowAllSchemas = '显示所有模式?'；
$strSchemaNeedsName = '必须给模式命名'；

// Miscellaneous
$strTopBar = '%s 架于 %s：%s － 您是 "%s"， %s'；
$strTimeFmt = 'jS M， Y g：iA'；

?> 
