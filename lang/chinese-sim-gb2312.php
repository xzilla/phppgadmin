<?php

/**
* @maintainer He Wei Ping [laser@zhengmai.com.cn] 
*/

// Language and character set
$lang['applang'] = '简体中文（gb2132）';
$lang['appcharset'] = 'gb2132';

// Basic strings
$lang['strintro'] = '迎使用 WebDB。';
$lang['strlogin'] = '登录';
$lang['strloginfailed'] = '登录失败';
$lang['strserver'] = '服务器';
$lang['strlogout'] = '注销';
$lang['strowner'] = '所属人';
$lang['straction'] = '功能';
$lang['stractions'] = '功能';
$lang['strname'] = '名字';
$lang['strdefinition'] = '定义';
$lang['strsequence'] = '序列';
$lang['strsequences'] = '序列';
$lang['stroperators'] = '操作';
$lang['strtypes'] = '类型';
$lang['straggregates'] = '聚集';
$lang['strproperties'] = '属性';
$lang['strbrowse'] = '浏览';
$lang['strdrop'] = '删除';
$lang['strdropped'] = '已删除';
$lang['strnull'] = '空';
$lang['strnotnull'] = '非空';
$lang['strprev'] = '上一个';
$lang['strnext'] = '下一个';
$lang['strfailed'] = '失败';
$lang['strcreate'] = '创建';
$lang['strcomment'] = '注释';
//$lang['strnext'] = 'Next';
$lang['strlength'] = '长度';
$lang['strdefault'] = '默认';
$lang['stralter'] = '更改';
$lang['strcancel'] = '取消';
$lang['strsave'] = '存储';
$lang['strinsert'] = '插入';
$lang['strselect'] = '选取';
$lang['strdelete'] = '删除';
$lang['strupdate'] = '更新';
$lang['strreferences'] = '参考';
$lang['stryes'] = '是';
$lang['strno'] = '否';
$lang['stredit'] = '编辑';
$lang['strrows'] = '行';
$lang['strexample'] = '如：';
$lang['strback'] = '返回';
$lang['strqueryresults'] = '查寻结果';
$lang['strshow'] = '显示';
$lang['strempty'] = '空';
$lang['strlanguage'] = '语言';

// Error handling
$lang['strnoframes'] = '您必使用支持框架的浏览器浏览本程序。';
$lang['strbadconfig'] = '您的 config.inc.php 已失效。您需要自行通过 config.inc.php-ist 修改。';
$lang['strnotloaded'] = '您的 PHP 中没有完整的数据库支持。';
$lang['strsqlerror'] = 'SQL:错误';
$lang['strinstatement'] = 'In statement：';
$lang['strinvalidparam'] = '无效的脚本参数';
$lang['strnodata'] = '查无此行。';

// Tables
$lang['strnotables'] = '查无此表。';
$lang['strnotable'] = '查无此表。';
$lang['strtable'] = '数据表';
$lang['strtables'] = '数据表';
$lang['strtablecreated'] = '建表完成。';
$lang['strtablecreatedbad'] = '建表失败';
$lang['strtableneedsfield'] = '至少需要一个数据段。';
$lang['strinsertrow'] = '插入行';
$lang['strrowinserted'] = '插入行完成。';
$lang['strrowinsertedbad'] = '先插入行。';
$lang['streditrow'] = '更改行';
$lang['strrowupdated'] = '完成行更新。';
$lang['strrowupdatedbad'] = '更新行失败。';
$lang['strdeleterow'] = '删除行';
$lang['strconfdeleterow'] = '真的要除所有的行？';
$lang['strrowdeleted'] = '删除除行完成。';
$lang['strrowdeletedbad'] = '除行失败。';
$lang['strsaveandrepeat'] = '重复存储';
$lang['strconfemptytable'] = '真的要清空"%s"数据表？';
$lang['strtableemptied'] = '数据表清空完成。';
$lang['strtableemptiedbad'] = '数据表清空失败。';
$lang['strconfdroptable'] = '真的要删除除"%s"数据表？';
$lang['strtabledropped'] = '善除数据表完成。';
$lang['strtabledroppedbad'] = '删除数据表失败。';

// Users
$lang['struseradmin'] = '用户管理';
$lang['struser'] = '用户';
$lang['strusers'] = '用户';
$lang['strusername'] = '用名';
$lang['strpassword'] = '密码';
$lang['strsuper'] = '超级用户';
$lang['strcreatedb'] = '建库';
$lang['strexpires'] = '过期';
$lang['strnousers'] = '查无此用户';

// Groups
$lang['strgroupadmin'] = '组管理';
$lang['strgroup'] = '组';
$lang['strgroups'] = '群组';
$lang['strnogroups'] = '查无群组。';
$lang['strcreategroup'] = '创建组';
$lang['strshowallgroups'] = '显示所有群组';
$lang['strgroupneedsname'] = '你必给您组命名。';
$lang['strgroupcreated'] = '建组完成。';
$lang['strgroupcreatedbad'] = '建组失败。';
$lang['strconfdropgroup'] = '真的要删除"%s"组？';
$lang['strgroupdropped'] = '删除组完成。';
$lang['strgroupdroppedbad'] = '删除组失败。';
$lang['strmembers'] = '成员';

// Privilges
$lang['strprivileges'] = '特权';
$lang['strgrant'] = '赋予';
$lang['strrevoke'] = '撤回';

// Databases
$lang['strdatabase'] = '数据库';
$lang['strdatabases'] = '数据库';
$lang['strnodatabases'] = '查无此数据库。';
$lang['strdatabaseneedsname'] = '你必须给您的数据库命名。';

// Views
$lang['strviewneedsname'] = '你必须给您的视图命名。';
$lang['strviewneedsdef'] = '你必须定义您的视图。';
$lang['strcreateview'] = '建立视图';
$lang['strnoviews'] = '查无视图。';
$lang['strview'] = '视图';
$lang['strviews'] = '视图';

// Sequences
$lang['strnosequences'] = '查无序列。';
$lang['strsequencename'] = '序列名称';
$lang['strlastvalue'] = '最後的数目';
$lang['strincrementby'] = '增量（加  减）';
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
$lang['struniquekey'] = '唯一键';
$lang['strprimarykey'] = '主键';
$lang['strshowallindexes'] = '显示所有索引';
$lang['strcreateindex'] = '创建索引';
$lang['strindexneedsname'] = '你必须给您的索引命名。';
$lang['strindexneedscols'] = '你必须给你的字段赋予一个正整数。';
$lang['strindexcreated'] = '创建索引完成';
$lang['strindexcreatedbad'] = '创建索引失败.';
$lang['strconfdropindex'] = '真的要删除"%s"索引？';
$lang['strindexdropped'] = '删除索引完成。';
$lang['strindexdroppedbad'] = '删除除索引失败。';

// Rules
$lang['strrules'] = '规则';
$lang['strrule'] = '规则';
$lang['strnorules'] = '查无此规则';
$lang['strcreaterule'] = '创建规则';

// Tables
$lang['strfield'] = '列';
$lang['strfields'] = '列';
$lang['strtype'] = '类型';
$lang['strvalue'] = '值';
$lang['strshowalltables'] = '示所有表。';
$lang['strunique'] = '唯一';
$lang['strprimary'] = '主';
$lang['strkeyname'] = '键名';
$lang['strnumfields'] = '列数';
$lang['strcreatetable'] = '创建表';
$lang['strtableneedsname'] = '你必您的索引命名。';
$lang['strtableneedscols'] = '你必须给你的字段赋予一个正整数。';
$lang['strexport'] = '导出';
$lang['strconstraints'] = '强制';
$lang['strcolumns'] = '列';

// Functions
$lang['strnofunctions'] = '查无此函数';
$lang['strfunction'] = '函数';
$lang['strfunctions'] = '函数';
$lang['strreturns'] = 'Returns';
$lang['strarguments'] = '参数';
$lang['strfunctionneedsname'] = '你必须给您的函数命名。';
$lang['strfunctionneedsdef'] = '你必须定义您的函数。';

// Triggers
$lang['strtrigger'] = '触发器';
$lang['strtriggers'] = '触发器';
$lang['strnotriggers'] = '查无此触发器。';
$lang['strcreatetrigger'] = '创建触发器';

// Types
$lang['strtype'] = '类型';
$lang['strtypes'] = '类型';
$lang['strnotypes'] = '查无此类型。';
$lang['strcreatetype'] = '创建类型';
$lang['strconfdroptype'] = '真的要删除"%s"类型？';
$lang['strtypedropped'] = '删除类型完成。';
$lang['strtypedroppedbad'] = '删除类型失败。';
$lang['strtypecreated'] = '创建类型完成。';
$lang['strtypecreatedbad'] = '建型失败。';
$lang['strshowalltypes'] = '显示所有的类型';
$lang['strinputfn'] = '输入功能';
$lang['stroutputfn'] = '输出功能';
$lang['strpassbyval'] = 'Passed by val？';
$lang['stralignment'] = 'Alignment';
$lang['strelement'] = '元素';
$lang['strdelimiter'] = '分隔符';
$lang['strstorage'] = '磁盘存储';
$lang['strtypeneedsname'] = '你必给您的类型命名。';
$lang['strtypeneedslen'] = '你必给您的类型定义一个长度。';

// Schemas
$lang['strschema'] = '模式';
$lang['strschemas'] = '模式';
$lang['strcreateschema'] = '创建模式';
$lang['strnoschemas'] = '没有此模式';
$lang['strconfdropschema'] = '你确定要删除"%s"模式麽？';
$lang['strschemadropped'] = '模式已删除';
$lang['strschemadroppedbad'] = '模式删除失败';
$lang['strschemacreated'] = '模式已建立';
$lang['strschemacreatedbad'] = '创建模式失败';
$lang['strshowallschemas'] = '显示所有模式?';
$lang['strschemaneedsname'] = '必须给模式命名';

// Miscellaneous
$lang['strtopbar'] = '%s 架于 %s：%s － 您是 "%s"， %s';
$lang['strtimefmt'] = 'jS M, Y g:iA';

?> 

