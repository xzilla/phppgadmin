<?php

/**
* @maintainer Chan Min Wai [dcmwai@amtb-m.org.my] 
* Direct convert from Simplify Chinese @He Wei Ping [laser@zhengmai.com.cn] 
*/

// Language and character set
$lang['applang'] = '繁體中文（big5）';
$lang['appcharset'] = 'big5';
$lang['applocale'] = 'zh_CN';
  
// Basic strings
$lang['strintro'] = '迎使用 WebDB。';
$lang['strlogin'] = '登錄';
$lang['strloginfailed'] = '登錄失敗';
$lang['strserver'] = '服務器';
$lang['strlogout'] = '注銷';
$lang['strowner'] = '所屬人';
$lang['straction'] = '功能';
$lang['stractions'] = '功能';
$lang['strname'] = '名字';
$lang['strdefinition'] = '定義';
$lang['strsequence'] = '序列';
$lang['strsequences'] = '序列';
$lang['stroperators'] = '操作';
$lang['strtypes'] = '類型';
$lang['straggregates'] = '聚集';
$lang['strproperties'] = '屬性';
$lang['strbrowse'] = '瀏覽';
$lang['strdrop'] = '刪除';
$lang['strdropped'] = '已刪除';
$lang['strnull'] = '空';
$lang['strnotnull'] = '非空';
$lang['strprev'] = '上一個';
$lang['strnext'] = '下一個';
$lang['strfailed'] = '失敗';
$lang['strcreate'] = '創建';
$lang['strcomment'] = '注釋';
//$lang['strnext'] = 'Next';
$lang['strlength'] = '長度';
$lang['strdefault'] = '默認';
$lang['stralter'] = '更改';
$lang['strcancel'] = '取消';
$lang['strsave'] = '存儲';
$lang['strinsert'] = '插入';
$lang['strselect'] = '選取';
$lang['strdelete'] = '刪除';
$lang['strupdate'] = '更新';
$lang['strreferences'] = '參考';
$lang['stryes'] = '是';
$lang['strno'] = '否';
$lang['stredit'] = '編輯';
$lang['strrows'] = '行';
$lang['strexample'] = '如：';
$lang['strback'] = '返回';
$lang['strqueryresults'] = '查尋結果';
$lang['strshow'] = '顯示';
$lang['strempty'] = '空';
$lang['strlanguage'] = '語言';

// Error handling
$lang['strnoframes'] = '您必使用支持框架的瀏覽器瀏覽本程序。';
$lang['strbadconfig'] = '您的 config.inc.php 已失效。您需要自行通過 config.inc.php-ist 修改。';
$lang['strnotloaded'] = '您的 PHP 中沒有完整的數據庫支持。';
$lang['strsqlerror'] = 'SQL:錯誤';
$lang['strinstatement'] = 'In statement：';
$lang['strinvalidparam'] = '無效的腳本參數';
$lang['strnodata'] = '查無此行。';

// Tables
$lang['strnotables'] = '查無此表。';
$lang['strnotable'] = '查無此表。';
$lang['strtable'] = '數據表';
$lang['strtables'] = '數據表';
$lang['strtablecreated'] = '建表完成。';
$lang['strtablecreatedbad'] = '建表失敗';
$lang['strtableneedsfield'] = '至少需要一個數據段。';
$lang['strinsertrow'] = '插入行';
$lang['strrowinserted'] = '插入行完成。';
$lang['strrowinsertedbad'] = '先插入行。';
$lang['streditrow'] = '更改行';
$lang['strrowupdated'] = '完成行更新。';
$lang['strrowupdatedbad'] = '更新行失敗。';
$lang['strdeleterow'] = '刪除行';
$lang['strconfdeleterow'] = '真的要除所有的行？';
$lang['strrowdeleted'] = '刪除除行完成。';
$lang['strrowdeletedbad'] = '除行失敗。';
$lang['strsaveandrepeat'] = '重復存儲';
$lang['strconfemptytable'] = '真的要清空"%s"數據表？';
$lang['strtableemptied'] = '數據表清空完成。';
$lang['strtableemptiedbad'] = '數據表清空失敗。';
$lang['strconfdroptable'] = '真的要刪除除"%s"數據表？';
$lang['strtabledropped'] = '善除數據表完成。';
$lang['strtabledroppedbad'] = '刪除數據表失敗。';

// Users
$lang['struseradmin'] = '用戶管理';
$lang['struser'] = '用戶';
$lang['strusers'] = '用戶';
$lang['strusername'] = '用名';
$lang['strpassword'] = '密碼';
$lang['strsuper'] = '超級用戶';
$lang['strcreatedb'] = '建庫';
$lang['strexpires'] = '過期';
$lang['strnousers'] = '查無此用戶';

// Groups
$lang['strgroupadmin'] = '組管理';
$lang['strgroup'] = '組';
$lang['strgroups'] = '群組';
$lang['strnogroups'] = '查無群組。';
$lang['strcreategroup'] = '創建組';
$lang['strshowallgroups'] = '顯示所有群組';
$lang['strgroupneedsname'] = '你必給您組命名。';
$lang['strgroupcreated'] = '建組完成。';
$lang['strgroupcreatedbad'] = '建組失敗。';
$lang['strconfdropgroup'] = '真的要刪除"%s"組？';
$lang['strgroupdropped'] = '刪除組完成。';
$lang['strgroupdroppedbad'] = '刪除組失敗。';
$lang['strmembers'] = '成員';

// Privilges
$lang['strprivileges'] = '特權';
$lang['strgrant'] = '賦予';
$lang['strrevoke'] = '撤回';

// Databases
$lang['strdatabase'] = '數據庫';
$lang['strdatabases'] = '數據庫';
$lang['strnodatabases'] = '查無此數據庫。';
$lang['strdatabaseneedsname'] = '你必須給您的數據庫命名。';

// Views
$lang['strviewneedsname'] = '你必須給您的視圖命名。';
$lang['strviewneedsdef'] = '你必須定義您的視圖。';
$lang['strcreateview'] = '建立視圖';
$lang['strnoviews'] = '查無視圖。';
$lang['strview'] = '視圖';
$lang['strviews'] = '視圖';

// Sequences
$lang['strnosequences'] = '查無序列。';
$lang['strsequencename'] = '序列名稱';
$lang['strlastvalue'] = '最後的數目';
$lang['strincrementby'] = '增量（加╱減）';
$lang['strmaxvalue'] = '最大值';
$lang['strminvalue'] = '最小值';
$lang['strcachevalue'] = 'cache_value';
$lang['strlogcount'] = 'log_cnt';
$lang['striscycled'] = 'is_cycled';
$lang['striscalled'] = 'is_called';
$lang['strreset'] = '重置';

// Indexes
$lang['strindexes'] = '索引';
$lang['strindexname'] = '索引名';
$lang['strtabname'] = 'Tab Name';
$lang['strcolumnname'] = 'Column Name';
$lang['struniquekey'] = '唯一鍵';
$lang['strprimarykey'] = '主鍵';
$lang['strshowallindexes'] = '顯示所有索引';
$lang['strcreateindex'] = '創建索引';
$lang['strindexneedsname'] = '你必須給您的索引命名。';
$lang['strindexneedscols'] = '你必須給你的字段賦予一個正整數。';
$lang['strindexcreated'] = '創建索引完成';
$lang['strindexcreatedbad'] = '創建索引失敗.';
$lang['strconfdropindex'] = '真的要刪除"%s"索引？';
$lang['strindexdropped'] = '刪除索引完成。';
$lang['strindexdroppedbad'] = '刪除除索引失敗。';

// Rules
$lang['strrules'] = '規則';
$lang['strrule'] = '規則';
$lang['strnorules'] = '查無此規則';
$lang['strcreaterule'] = '創建規則';

// Tables
$lang['strfield'] = '列';
$lang['strfields'] = '列';
$lang['strtype'] = '類型';
$lang['strvalue'] = '值';
$lang['strshowalltables'] = '示所有表。';
$lang['strunique'] = '唯一';
$lang['strprimary'] = '主';
$lang['strkeyname'] = '鍵名';
$lang['strnumfields'] = '列數';
$lang['strcreatetable'] = '創建表';
$lang['strtableneedsname'] = '你必您的索引命名。';
$lang['strtableneedscols'] = '你必須給你的字段賦予一個正整數。';
$lang['strexport'] = '導出';
$lang['strconstraints'] = '強制';
$lang['strcolumns'] = '列';

// Functions
$lang['strnofunctions'] = '查無此函數';
$lang['strfunction'] = '函數';
$lang['strfunctions'] = '函數';
$lang['strreturns'] = 'Returns';
$lang['strarguments'] = '參數';
$lang['strfunctionneedsname'] = '你必須給您的函數命名。';
$lang['strfunctionneedsdef'] = '你必須定義您的函數。';

// Triggers
$lang['strtrigger'] = '觸發器';
$lang['strtriggers'] = '觸發器';
$lang['strnotriggers'] = '查無此觸發器。';
$lang['strcreatetrigger'] = '創建觸發器';

// Types
$lang['strtype'] = '類型';
$lang['strtypes'] = '類型';
$lang['strnotypes'] = '查無此類型。';
$lang['strcreatetype'] = '創建類型';
$lang['strconfdroptype'] = '真的要刪除"%s"類型？';
$lang['strtypedropped'] = '刪除類型完成。';
$lang['strtypedroppedbad'] = '刪除類型失敗。';
$lang['strtypecreated'] = '創建類型完成。';
$lang['strtypecreatedbad'] = '建型失敗。';
$lang['strshowalltypes'] = '顯示所有的類型';
$lang['strinputfn'] = '輸入功能';
$lang['stroutputfn'] = '輸出功能';
$lang['strpassbyval'] = 'Passed by val？';
$lang['stralignment'] = 'Alignment';
$lang['strelement'] = '元素';
$lang['strdelimiter'] = '分隔符';
$lang['strstorage'] = '磁盤存儲';
$lang['strtypeneedsname'] = '你必給您的類型命名。';
$lang['strtypeneedslen'] = '你必給您的類型定義一個長度。';

// Schemas
$lang['strschema'] = '模式';
$lang['strschemas'] = '模式';
$lang['strcreateschema'] = '創建模式';
$lang['strnoschemas'] = '沒有此模式';
$lang['strconfdropschema'] = '你確定要刪除"%s"模式麼？';
$lang['strschemadropped'] = '模式已刪除';
$lang['strschemadroppedbad'] = '模式刪除失敗';
$lang['strschemacreated'] = '模式已建立';
$lang['strschemacreatedbad'] = '創建模式失敗';
$lang['strshowallschemas'] = '顯示所有模式?';
$lang['strschemaneedsname'] = '必須給模式命名';

// Miscellaneous
$lang['strtopbar'] = '%s 架于 %s：%s － 您是 "%s"， %s';
$lang['strtimefmt'] = 'jS M, Y g:iA';

?> 
