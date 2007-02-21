<?php

	/**
	 * Chinese-utf8-zh_TW language file for phpPgAdmin.  Use this as a basis
	 * for new translations.
	 *
	 *Translated by 郭朝益 ChaoYi, Kuo [kuo.chaoyi@gmail.com]
	 * $Id: chinese-utf8-zh_CN.php,v 1.2 2007/02/21 04:33:32 xzilla Exp $
	 */

	// Language and character set
	$lang['applang'] = '简体中文（UTF-8）';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'zh_CN';
	$lang['appdbencoding'] = 'UTF8';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = '欢迎使用 phpPgAdmin。';
	$lang['strppahome'] = 'phpPgAdmin 首页';
	$lang['strpgsqlhome'] = 'PostgreSQL 首页';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL 文件 (本机)';
	$lang['strreportbug'] = '通报程式 Bug';
	
	$lang['strviewfaq'] = '观看线上 FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = '登入';
	$lang['strloginfailed'] = '登入失败';
	$lang['strlogindisallowed'] = '出于安全原因拒绝登入。';
	$lang['strserver'] = '服务器';
	$lang['strservers'] = '服务器';
	$lang['strintroduction'] = '序页';
	$lang['strhost'] = '主机';
	$lang['strport'] = '埠号';
	$lang['strlogout'] = '登出';
	$lang['strowner'] = '拥有者';
	$lang['straction'] = '动作';
	$lang['stractions'] = '动作';
	$lang['strname'] = '名称';
	$lang['strdefinition'] = '定义';
	$lang['strproperties'] = '属性';
	$lang['strbrowse'] = '浏览';
	$lang['strenable'] = '启用';
	$lang['strdisable'] = '停用';
	$lang['strdrop'] = '移除';
	$lang['strdropped'] = '已移除';
	$lang['strnull'] = '空值';
	$lang['strnotnull'] = '不允许空值';
	$lang['strprev'] = '< 上一步';
	$lang['strnext'] = '下一步 >';
	$lang['strfirst'] = '<< 最前一步';
	$lang['strlast'] = '最后一步 >>';
	$lang['strfailed'] = '失败';
	$lang['strcreate'] = '建立';
	$lang['strcreated'] = '已建立';
	$lang['strcomment'] = '注释';
	$lang['strlength'] = '长度';
	$lang['strdefault'] = '预设值';
	$lang['stralter'] = '修改';
	$lang['strok'] = '确定';
	$lang['strcancel'] = '取消';
	$lang['strac'] = '启用自动完成';
	$lang['strsave'] = '储存';
	$lang['strreset'] = '重设';
	$lang['strinsert'] = '插入';
	$lang['strselect'] = '选取';
	$lang['strdelete'] = '删除';
	$lang['strupdate'] = '更新';
	$lang['strreferences'] = '参考';
	$lang['stryes'] = '是';
	$lang['strno'] = '否';
	$lang['strtrue'] = '真(TRUE)';
	$lang['strfalse'] = '假(FALSE)';
	$lang['stredit'] = '编辑';
	$lang['strcolumn'] = '字段';
	$lang['strcolumns'] = '字段';
	$lang['strrows'] = '数据列';
	$lang['strrowsaff'] = '数据列受影响。';
	$lang['strobjects'] = '对象';
	$lang['strback'] = '返回';
	$lang['strqueryresults'] = '查询结果';
	$lang['strshow'] = '显示';
	$lang['strempty'] = '清空';
	$lang['strlanguage'] = '语言';
	$lang['strencoding'] = '字元编码';
	$lang['strvalue'] = '值';
	$lang['strunique'] = '唯一值';
	$lang['strprimary'] = '主键(pkey)';
	$lang['strexport'] = '汇出';
	$lang['strimport'] = '汇入';
	$lang['strallowednulls'] = '已允许空字元';
	$lang['strbackslashn'] = '\N';
	$lang['strnull'] = 'NULL (字)';
	$lang['stremptystring'] = '空 字串/字段';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = '管理';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strclusterindex'] = '集群';
	$lang['strclustered'] = '已集群?';
	$lang['strreindex'] = '重建索引';
	$lang['strrun'] = '执行';
	$lang['stradd'] = '新增';
	$lang['strevent'] = '事件';
	$lang['strwhere'] = '在那里';
	$lang['strinstead'] = '这样反而';
	$lang['strwhen'] = '然后';
	$lang['strformat'] = '格式';
	$lang['strdata'] = '数据';
	$lang['strconfirm'] = '确认';
	$lang['strexpression'] = '表达式';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = '：';
	$lang['strexpand'] = '展开';
	$lang['strcollapse'] = '摺叠';
	$lang['strexplain'] = '阐明';
	$lang['strexplainanalyze'] = '阐明分析';
	$lang['strfind'] = '寻找';
	$lang['stroptions'] = '选项';
	$lang['strrefresh'] = '刷新';
	$lang['strdownload'] = '下载';
	$lang['strdownloadgzipped'] = '以 gzip 压缩后下载';
	$lang['strinfo'] = '信息';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = '进阶';
	$lang['strvariables'] = '变数';
	$lang['strprocess'] = '进程';
	$lang['strprocesses'] = '进程';
	$lang['strsetting'] = '设定';
	$lang['streditsql'] = '编辑 SQL';
	$lang['strruntime'] = '总共执行时间：%s ms';
	$lang['strpaginate'] = '分页显示结果';
	$lang['struploadscript'] = '或是上传一个 SQL 脚本档：';
	$lang['strstarttime'] = '开始时间';
	$lang['strfile'] = '文件';
	$lang['strfileimported'] = '文件已汇入。';
	$lang['strtrycred'] = '为全部服务器使用这些证件';

	// Database sizes
	$lang['strsize'] = '容量';
	$lang['strbytes'] = 'bytes';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	
	$lang['strnoframes'] = '这个应用最好以一个能启用页框的浏览器运作, 但也能够被使用在没有页框下接继运作。';
	$lang['strnoframeslink'] = '使用不包括框架';
	$lang['strbadconfig'] = '您的 config.inc.php 是过时的。您将需要从新的 config.inc.php-dist 再生它 。';
	$lang['strnotloaded'] = '您的 PHP 环境未安装 PostgreSQL 必要的支持。您必需重新编译 PHP 使用 --with-pgsql configure 选项。';
	$lang['strpostgresqlversionnotsupported'] = 'PostgreSQL 版本未被支持。请升级版本到 %s 或是更高者。';
	$lang['strbadschema'] = '指定了无效的纲要模式。';
	$lang['strbadencoding'] = '数据库无法设定用户端的编码方式。';
	$lang['strsqlerror'] = 'SQL 错误：';
	$lang['strinstatement'] = '在表达方式内：';
	$lang['strinvalidparam'] = '无效的脚本变数。';
	$lang['strnodata'] = '找不到数据列。';
	$lang['strnoobjects'] = '找不到对象。';
	$lang['strrownotunique'] = '这数据列无唯一值识别项。';
	$lang['strnoreportsdb'] = '您尚未建立报表数据库。请参阅指导 INSTALL 档帮助。';
	$lang['strnouploads'] = '上传文件功能已停用。';
	$lang['strimporterror'] = '汇入错误。';
	$lang['strimporterror-fileformat'] = '汇入错误：自动地确定文件格式已失败。';
	$lang['strimporterrorline'] = '汇入错误发生在第 %s 行。';
	$lang['strimporterrorline-badcolumnnum'] = '汇入错误发生在第 %s 行： 行不具备正确的字段数量。';
	$lang['strimporterror-uploadedfile'] = '汇入错误：文件无法被上传到这服务器';
	$lang['strcannotdumponwindows'] = '倾覆复杂数据表与网要模式名称在 Windows 是未被支持的。';

	// Tables
	$lang['strtable'] = '数据表';
	$lang['strtables'] = '数据表';
	$lang['strshowalltables'] = '显示全部数据表';
	$lang['strnotables'] = '找不到数据表。';
	$lang['strnotable'] = '找不到任何数据表。';
	$lang['strcreatetable'] = '建立新数据表';
	$lang['strtablename'] = '数据表名';
	$lang['strtableneedsname'] = '您必需为您的数据表命名。';
	$lang['strtableneedsfield'] = '您至少应指定一个字段。';
	$lang['strtableneedscols'] = '您必需指定一个合法的字段数量。';
	$lang['strtablecreated'] = '数据表已建立。';
	$lang['strtablecreatedbad'] = '建立数据表作业失败。';
	$lang['strconfdroptable'] = '您确定要移除数据表 "%s"?';
	$lang['strtabledropped'] = '数据表已移除。';
	$lang['strtabledroppedbad'] = '数据表移除失败。';
	$lang['strconfemptytable'] = '您确定要清空数据表 "%s"?';
	$lang['strtableemptied'] = '数据表已清空。';
	$lang['strtableemptiedbad'] = '数据表清空失败。';
	$lang['strinsertrow'] = '插入数据列';
	$lang['strrowinserted'] = '数据列已插入。';
	$lang['strrowinsertedbad'] = '数据列插入失败。';
	$lang['strrowduplicate'] = '数据列插入失败, 试图做复制品插入。';
	$lang['streditrow'] = '编辑数据列';
	$lang['strrowupdated'] = '数据列已更新。';
	$lang['strrowupdatedbad'] = '数据列更新失败。';
	$lang['strdeleterow'] = '删除数据列';
	$lang['strconfdeleterow'] = '您确定要删除这些数据列??';
	$lang['strrowdeleted'] = '数据列已删除。';
	$lang['strrowdeletedbad'] = '数据列删除失败。';
	$lang['strinsertandrepeat'] = '插入与重作';
	$lang['strnumcols'] = '字段数量';
	$lang['strcolneedsname'] = '您必需为这个字段特定一个名称';
	$lang['strselectallfields'] = '选择全部字段';
	$lang['strselectneedscol'] = '您必需至少显示一数据列。';
	$lang['strselectunary'] = '一元运算子不能有值。';
	$lang['straltercolumn'] = '修改数据列';
	$lang['strcolumnaltered'] = '数据列已修改。';
	$lang['strcolumnalteredbad'] = '数据列修改失败。';
	$lang['strconfdropcolumn'] = '您确定要移除字段 "%s" 从数据表 "%s"?';
	$lang['strcolumndropped'] = '字段已移除。';
	$lang['strcolumndroppedbad'] = '字段移除失败。';
	$lang['straddcolumn'] = '新增字段';
	$lang['strcolumnadded'] = '字段已新增。';
	$lang['strcolumnaddedbad'] = '字段新增失败。';
	$lang['strcascade'] = '附属串联';
	$lang['strtablealtered'] = '数据表已修改。';
	$lang['strtablealteredbad'] = '数据表修改失败。';
	$lang['strdataonly'] = '只有数据';
	$lang['strstructureonly'] = '只有结构';
	$lang['strstructureanddata'] = '结构和数据';
	$lang['strtabbed'] = 'Tabbed';
	$lang['strauto'] = '自动';
	$lang['strconfvacuumtable'] = '您确定将要 vacuum "%s"?';
	$lang['strestimatedrowcount'] = '估计数据列数量';

	// Columns
	$lang['strcolprop'] = '字段属性';
		
	// Users
	$lang['struser'] = '用户';
	$lang['strusers'] = '用户';
	$lang['strusername'] = '用户名称';
	$lang['strpassword'] = '密码';
	$lang['strsuper'] = '超级用户?';
	$lang['strcreatedb'] = '能建立数据库?';
	$lang['strexpires'] = '失效到期';
	$lang['strsessiondefaults'] = '会议预设';
	$lang['strnousers'] = '找不到此用户。';
	$lang['struserupdated'] = '用户已更新。';
	$lang['struserupdatedbad'] = '用户更新失败。';
	$lang['strshowallusers'] = '显示所有用户';
	$lang['strcreateuser'] = '建立新用户';
	$lang['struserneedsname'] = '您必需为您的用户命名。';
	$lang['strusercreated'] = '用户已建立。';
	$lang['strusercreatedbad'] = '用户建立失败。';
	$lang['strconfdropuser'] = '您确定您要移除这个用户 "%s"?';
	$lang['struserdropped'] = '用户已移除。';
	$lang['struserdroppedbad'] = '用户移除失败。';
	$lang['straccount'] = '帐户';
	$lang['strchangepassword'] = '变更密码';
	$lang['strpasswordchanged'] = '密码已变更。';
	$lang['strpasswordchangedbad'] = '密码变更失败。';
	$lang['strpasswordshort'] = '密码太简短。';
	$lang['strpasswordconfirm'] = '所输入的确认密码不符。';
	
	// Groups
	$lang['strgroup'] = '群组';
	$lang['strgroups'] = '群组';
	$lang['strshowallgroups'] = '显示全部群组';
	$lang['strnogroup'] = '找不到群组。';
	$lang['strnogroups'] = '找不到任何群组。';
	$lang['strcreategroup'] = '建立群组';
	$lang['strgroupneedsname'] = '您必需为您的群组命名。';
	$lang['strgroupcreated'] = '群组已建立。';
	$lang['strgroupcreatedbad'] = '群组建立失败。';
	$lang['strconfdropgroup'] = '您确定您要移除这个群组 "%s"?';
	$lang['strgroupdropped'] = '群组已移除。';
	$lang['strgroupdroppedbad'] = '群组移除失败。';
	$lang['strmembers'] = '成员';
	$lang['strmemberof'] = '成员属于';
	$lang['stradminmembers'] = '管理员成员';
	$lang['straddmember'] = '增加成员';
	$lang['strmemberadded'] = '成员已加入。';
	$lang['strmemberaddedbad'] = '成员加入失败。';
	$lang['strdropmember'] = '移除成员';
	$lang['strconfdropmember'] = '您确定您要移除这个成员 "%s" 从这个群组 "%s"?';
	$lang['strmemberdropped'] = '成员已移除。';
	$lang['strmemberdroppedbad'] = '成员移除失败。';

	// Roles
	$lang['strrole'] = '角色';
	$lang['strroles'] = '角色';
	$lang['strshowallroles'] = '显示全部角色';
	$lang['strnoroles'] = '找不到任何角色。';
	$lang['strinheritsprivs'] = '继承特权?';
	$lang['strcreaterole'] = '建立角色';
	$lang['strcancreaterole'] = '能建立角色?';
	$lang['strrolecreated'] = '角色已建立。';
	$lang['strrolecreatedbad'] = '角色建立失败。';
	$lang['stralterrole'] = '修改角色';
	$lang['strrolealtered'] = '角色被修改。';
	$lang['strrolealteredbad'] = '角色修改失败。';
	$lang['strcanlogin'] = '能登入?';
	$lang['strconnlimit'] = '连线限制';
	$lang['strdroprole'] = '移除角色';
	$lang['strconfdroprole'] = '您确定您要移除这个角色 "%s"?';
	$lang['strroledropped'] = '角色已移除。';
	$lang['strroledroppedbad'] = '角色移除失败。';
	$lang['strnolimit'] = '不限制';
	$lang['strnever'] = '从末';
	$lang['strroleneedsname'] = '您必需为这个角色命名。';

	// Privileges
	$lang['strprivilege'] = '特权';
	$lang['strprivileges'] = '特权';
	$lang['strnoprivileges'] = '这个对象有预设的拥有者特权。';
	$lang['strgrant'] = '赋予';
	$lang['strrevoke'] = '撤回';
	$lang['strgranted'] = '特权已变更。';
	$lang['strgrantfailed'] = '特权变更失败。';
	$lang['strgrantbad'] = '您应为一名用户或群组指定至少一项特权。';
	$lang['strgrantor'] = '授权者';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = '数据库';
	$lang['strdatabases'] = '数据库';
	$lang['strshowalldatabases'] = '显示全部数据库';
	$lang['strnodatabases'] = '找不到任何数据库。';
	$lang['strcreatedatabase'] = '建立数据库';
	$lang['strdatabasename'] = '数据库名称';
	$lang['strdatabaseneedsname'] = '您必需为您的数据库给一个名称。';
	$lang['strdatabasecreated'] = '数据库已建立。';
	$lang['strdatabasecreatedbad'] = '数据库建立失败。';
	$lang['strconfdropdatabase'] = '您确定您要移除这个数据库 "%s"?';
	$lang['strdatabasedropped'] = '数据库已移除。';
	$lang['strdatabasedroppedbad'] = '数据库移除失败。';
	$lang['strentersql'] = '在下方输入 SQL 来执行：';
	$lang['strsqlexecuted'] = 'SQL 已执行。';
	$lang['strvacuumgood'] = 'Vacuum 完成。';
	$lang['strvacuumbad'] = 'Vacuum 失败。';
	$lang['stranalyzegood'] = 'Analyze 完成。';
	$lang['stranalyzebad'] = 'Analyze 失败。';
	$lang['strreindexgood'] = '重建索引完成。';
	$lang['strreindexbad'] = '重建索引失败。';
	$lang['strfull'] = '完整';
	$lang['strfreeze'] = '冻结(Freeze)';
	$lang['strforce'] = '强制';
	$lang['strsignalsent'] = '讯号传递。';
	$lang['strsignalsentbad'] = '传递讯号失败。';
	$lang['strallobjects'] = '全部对象';
	$lang['strdatabasealtered'] = '数据库已修改。';
	$lang['strdatabasealteredbad'] = '数据库修改失败。';

	// Views
	$lang['strview'] = '视图';
	$lang['strviews'] = '视图';
	$lang['strshowallviews'] = '显示全部视图';
	$lang['strnoview'] = '找不到视图。';
	$lang['strnoviews'] = '找不到任何视图。';
	$lang['strcreateview'] = '建立视图';
	$lang['strviewname'] = '视图名称';
	$lang['strviewneedsname'] = '您必需为您的视图给一个名称。';
	$lang['strviewneedsdef'] = '您必需为你的视图给一个定义。';
	$lang['strviewneedsfields'] = '您必需在您的视图中选择给这个字段。';
	$lang['strviewcreated'] = '视图已建立。';
	$lang['strviewcreatedbad'] = '视图建立失败。';
	$lang['strconfdropview'] = '您确定您要移除这个视图 "%s"?';
	$lang['strviewdropped'] = '视图已移除。';
	$lang['strviewdroppedbad'] = '视图移除失败。';
	$lang['strviewupdated'] = '视图已更新。';
	$lang['strviewupdatedbad'] = '视图更新失败。';
	$lang['strviewlink'] = '连结键';
	$lang['strviewconditions'] = '附加的条件限制';
	$lang['strcreateviewwiz'] = '建立视图精灵';

	// Sequences
	$lang['strsequence'] = '序列数';
	$lang['strsequences'] = '序列数';
	$lang['strshowallsequences'] = '显示全部序列数';
	$lang['strnosequence'] = '找不到序列数。';
	$lang['strnosequences'] = '找不到任何序列数。';
	$lang['strcreatesequence'] = '建立序列数';
	$lang['strlastvalue'] = '最后值';
	$lang['strincrementby'] = '递增量';	
	$lang['strstartvalue'] = '初始值';
	$lang['strmaxvalue'] = '最大值';
	$lang['strminvalue'] = '最小值';
	$lang['strcachevalue'] = '缓存值';
	$lang['strlogcount'] = '日志计数';
	$lang['striscycled'] = '循环?';
	$lang['striscalled'] = '已呼叫?';
	$lang['strsequenceneedsname'] = '您必需为您的序列数给一个名称。';
	$lang['strsequencecreated'] = '序列数已建立。';
	$lang['strsequencecreatedbad'] = '序列数建立失败。'; 
	$lang['strconfdropsequence'] = '您确定您要移除这个序列数 "%s"?';
	$lang['strsequencedropped'] = '序列数已移除。';
	$lang['strsequencedroppedbad'] = '序列数移除失败。';
	$lang['strsequencereset'] = '序列数重置。';
	$lang['strsequenceresetbad'] = '序列数重置失败。'; 
 	$lang['straltersequence'] = '修改序列数';
 	$lang['strsequencealtered'] = '序列数已修改。';
 	$lang['strsequencealteredbad'] = '序列数修改失败。';
 	$lang['strsetval'] = '设定值';
 	$lang['strsequencesetval'] = '序列数值设定。';
 	$lang['strsequencesetvalbad'] = '序列数值设定失败。';
 	$lang['strnextval'] = '递增量';
 	$lang['strsequencenextval'] = '序列数已递增。';
 	$lang['strsequencenextvalbad'] = '序列数已递增失败。';

	// Indexes
	$lang['strindex'] = '索引';
	$lang['strindexes'] = '索引';
	$lang['strindexname'] = '索引名称';
	$lang['strshowallindexes'] = '显示全部索引';
	$lang['strnoindex'] = '找不到索引。';
	$lang['strnoindexes'] = '找不到任何索引。';
	$lang['strcreateindex'] = '建立索引';
	$lang['strtabname'] = 'Tab 名称';
	$lang['strcolumnname'] = '字段名称';
	$lang['strindexneedsname'] = '您必需为您的索引给一个名称。';
	$lang['strindexneedscols'] = '索引要求一个有效字段数量。';
	$lang['strindexcreated'] = '索引已建立';
	$lang['strindexcreatedbad'] = '索引建立失败。';
	$lang['strconfdropindex'] = '您确定您要移除这个索引 "%s"?';
	$lang['strindexdropped'] = '索引已移除。';
	$lang['strindexdroppedbad'] = '索引移除失败。';
	$lang['strkeyname'] = '键名';
	$lang['struniquekey'] = '唯一键';
	$lang['strprimarykey'] = '主键(pkey)';
 	$lang['strindextype'] = '索引类型';
	$lang['strtablecolumnlist'] = '数据表字段';
	$lang['strindexcolumnlist'] = '索引字段';
	$lang['strconfcluster'] = '您确定您要到集群 "%s"?';
	$lang['strclusteredgood'] = '集群完成。';
	$lang['strclusteredbad'] = '集群失败。';

	// Rules
	$lang['strrules'] = '规则';
	$lang['strrule'] = '规则';
	$lang['strshowallrules'] = '显示全部规则';
	$lang['strnorule'] = '找不到规则。';
	$lang['strnorules'] = '找不到任何规则。';
	$lang['strcreaterule'] = '建立规则';
	$lang['strrulename'] = '规则名称';
	$lang['strruleneedsname'] = '您必需为您的规则给一个名称。';
	$lang['strrulecreated'] = '规则已建立。';
	$lang['strrulecreatedbad'] = '规则建立失败。';
	$lang['strconfdroprule'] = '您确定您要移除这个规则 "%s" 在 "%s"上?';
	$lang['strruledropped'] = '规则规则已移除。';
	$lang['strruledroppedbad'] = '规则移除失败。';

	// Constraints
	$lang['strconstraint'] = '限制约束';
	$lang['strconstraints'] = '限制约束';
	$lang['strshowallconstraints'] = '显示全部限制约束';
	$lang['strnoconstraints'] = '找不到任何限制约束。';
	$lang['strcreateconstraint'] = '建立限制约束';
	$lang['strconstraintcreated'] = '限制约束已建立。';
	$lang['strconstraintcreatedbad'] = '限制约束建立失败。';
	$lang['strconfdropconstraint'] = '您确定您要移除这限制约束 "%s" 在 "%s" 上?';
	$lang['strconstraintdropped'] = '限制约束已移除。';
	$lang['strconstraintdroppedbad'] = '限制约束移除失败。';
	$lang['straddcheck'] = '增加检查(Check)';
	$lang['strcheckneedsdefinition'] = '检查(Check)限制需要定义。';
	$lang['strcheckadded'] = '检查限制已增加。';
	$lang['strcheckaddedbad'] = '增加检查限制失败。';
	$lang['straddpk'] = '增加主键(pkey)';
	$lang['strpkneedscols'] = '主键(pkey)要求最少一个字段。';
	$lang['strpkadded'] = '主键(pkey)已增加。';
	$lang['strpkaddedbad'] = '增加主键(pkey)失败。';
	$lang['stradduniq'] = '增加唯一键';
	$lang['struniqneedscols'] = '唯一键要求最少一个字段。';
	$lang['struniqadded'] = '唯一键已增加。';
	$lang['struniqaddedbad'] = '增加唯一键失败。';
	$lang['straddfk'] = '增加外部键(fkey)';
	$lang['strfkneedscols'] = '外部键(fkey)要求最少一个字段。';
	$lang['strfkneedstarget'] = '外部键(fkey)要求一个数据表。';
	$lang['strfkadded'] = '外部键(fkey)已增加。';
	$lang['strfkaddedbad'] = '增加外部键(fkey)失败。';
	$lang['strfktarget'] = '目标数据表';
	$lang['strfkcolumnlist'] = '键字段';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = '函数';
	$lang['strfunctions'] = '函数';
	$lang['strshowallfunctions'] = '显示全部函数';
	$lang['strnofunction'] = '找不到函数。';
	$lang['strnofunctions'] = '找不到任何函数。';
	$lang['strcreateplfunction'] = '建立 SQL/PL 函数';
	$lang['strcreateinternalfunction'] = '建立内部函数';
	$lang['strcreatecfunction'] = '建立 C 函数';
	$lang['strfunctionname'] = '函数名称';
	$lang['strreturns'] = '递回';
	$lang['strproglanguage'] = '程序语言';
	$lang['strfunctionneedsname'] = '您必需为您的函数给一个名称。';
	$lang['strfunctionneedsdef'] = '您必需为您的函数给一个定义。';
	$lang['strfunctioncreated'] = '函数已建立。';
	$lang['strfunctioncreatedbad'] = '函数建立失败。';
	$lang['strconfdropfunction'] = '您确定您要移除这个函数 "%s"?';
	$lang['strfunctiondropped'] = '函数已移除。';
	$lang['strfunctiondroppedbad'] = '函数移除失败。';
	$lang['strfunctionupdated'] = '函数已更新。';
	$lang['strfunctionupdatedbad'] = '函数更新失败。';
	$lang['strobjectfile'] = '对象文件';
	$lang['strlinksymbol'] = '连结符号';
	$lang['strarguments'] = '引数';
	$lang['strargmode'] = '方式';
	$lang['strargtype'] = '类型';
	$lang['strargadd'] = '增加作者引数';
	$lang['strargremove'] = '移除这个引数';
	$lang['strargnoargs'] = '这个函数将不能工作任何引数。';
	$lang['strargenableargs'] = '启用引数已被传递到这个函数。';
	$lang['strargnorowabove'] = '需要数据列在这数据列之上。';
	$lang['strargnorowbelow'] = '需要数据列在这数据列之前。';
	$lang['strargraise'] = '向上移。';
	$lang['strarglower'] = '向下移。';
	$lang['strargremoveconfirm'] = '您确定你要移除这个引数? 这个 CANNOT 未被完成的。';

	// Triggers
	$lang['strtrigger'] = '触发器';
	$lang['strtriggers'] = '触发器';
	$lang['strshowalltriggers'] = '显示全部触发器';
	$lang['strnotrigger'] = '找不到 触发器。';
	$lang['strnotriggers'] = '找不到任何触发器。';
	$lang['strcreatetrigger'] = '建立触发器';
	$lang['strtriggerneedsname'] = '您必需为您的触发器明确指定一个名称。';
	$lang['strtriggerneedsfunc'] = '您必需为您的触发器明确指定一个函数。';
	$lang['strtriggercreated'] = '触发器已建立。';
	$lang['strtriggercreatedbad'] = '触发器建立失败。';
	$lang['strconfdroptrigger'] = '您确定您要移除这个触发器 "%s" on "%s"?';
	$lang['strconfenabletrigger'] = '您确定您要启用这个触发器触发器 "%s" 在 "%s" 上?';
	$lang['strconfdisabletrigger'] = '您确定您要停用这个触发器触发器 "%s" on "%s" 上?';
	$lang['strtriggerdropped'] = '触发器已移除。';
	$lang['strtriggerdroppedbad'] = '触发器移除失败。';
	$lang['strtriggerenabled'] = '触发器启用。';
	$lang['strtriggerenabledbad'] = '触发器启用失败。';
	$lang['strtriggerdisabled'] = '触发器停用。';
	$lang['strtriggerdisabledbad'] = '触发器停用失败。';
	$lang['strtriggeraltered'] = '触发器已修改。';
	$lang['strtriggeralteredbad'] = '触发器修改失败。';
	$lang['strforeach'] = '在每个';

	// Types
	$lang['strtype'] = '类型';
	$lang['strtypes'] = '类型';
	$lang['strshowalltypes'] = '显示全部类型';
	$lang['strnotype'] = '找不到类型。';
	$lang['strnotypes'] = '找不到任何类型。';
	$lang['strcreatetype'] = '建立类型';
	$lang['strcreatecomptype'] = '建立合成类型';
	$lang['strtypeneedsfield'] = '您必需明确指定最少一个字段。';
	$lang['strtypeneedscols'] = '您必需明确指定有效字段数字。';	
	$lang['strtypename'] = '类型名称';
	$lang['strinputfn'] = '输入类型';
	$lang['stroutputfn'] = '输出类型';
	$lang['strpassbyval'] = '以值传送?';
	$lang['stralignment'] = '排列';
	$lang['strelement'] = '元素';
	$lang['strdelimiter'] = '分隔符号';
	$lang['strstorage'] = '储藏所';
	$lang['strfield'] = '字段';
	$lang['strnumfields'] = '字段 Num. ';
	$lang['strtypeneedsname'] = '您必需为您的类型给一个名称。';
	$lang['strtypeneedslen'] = '您必需为您的类型给一个长度。';
	$lang['strtypecreated'] = '类型已建立';
	$lang['strtypecreatedbad'] = '类型建立失败。';
	$lang['strconfdroptype'] = '您确定您要移除这个类型 "%s"?';
	$lang['strtypedropped'] = '类型已移除。';
	$lang['strtypedroppedbad'] = '类型移除失败。';
	$lang['strflavor'] = '特色';
	$lang['strbasetype'] = '基础';
	$lang['strcompositetype'] = '合成';
	$lang['strpseudotype'] = '假冒';

	// Schemas
	$lang['strschema'] = '网要模式';
	$lang['strschemas'] = '网要模式';
	$lang['strshowallschemas'] = '显示全部网要模式';
	$lang['strnoschema'] = '找不到网要模式。';
	$lang['strnoschemas'] = '找不到任何网要模式。';
	$lang['strcreateschema'] = '建立网要模式';
	$lang['strschemaname'] = '网要模式名称';
	$lang['strschemaneedsname'] = '您必需为您的网要模式给一个名称。';
	$lang['strschemacreated'] = '网要模式已建立';
	$lang['strschemacreatedbad'] = '网要模式建立失败。';
	$lang['strconfdropschema'] = '您确定您要移除这个网要模式 "%s"?';
	$lang['strschemadropped'] = '网要模式已移除。';
	$lang['strschemadroppedbad'] = '网要模式移除失败。';
	$lang['strschemaaltered'] = '网要模式已修改。';
	$lang['strschemaalteredbad'] = '网要模式修改失败。';
	$lang['strsearchpath'] = '网要模式搜寻路径';

	// Reports
	$lang['strreport'] = '报表';
	$lang['strreports'] = '报表';
	$lang['strshowallreports'] = '显示全部报表';
	$lang['strnoreports'] = '找不到任何报表。';
	$lang['strcreatereport'] = '建立报表';
	$lang['strreportdropped'] = '报表已移除。';
	$lang['strreportdroppedbad'] = '报表移除失败。';
	$lang['strconfdropreport'] = '您确定您要移除这个报表 "%s"?';
	$lang['strreportneedsname'] = '您必需为您的报表给一个名称。';
	$lang['strreportneedsdef'] = '您必需为您的报表给 SQL。';
	$lang['strreportcreated'] = '报表已储存。';
	$lang['strreportcreatedbad'] = '报表储存失败。';

	// Domains
	$lang['strdomain'] = '领域';
	$lang['strdomains'] = '领域';
	$lang['strshowalldomains'] = '显示全部领域';
	$lang['strnodomains'] = '找不到任何领域。';
	$lang['strcreatedomain'] = '建立领域';
	$lang['strdomaindropped'] = '领域已移除。';
	$lang['strdomaindroppedbad'] = '领域移除失败。';
	$lang['strconfdropdomain'] = '您确定您要移除这个领域 "%s"?';
	$lang['strdomainneedsname'] = '您必需为您的领域给一个名称。。';
	$lang['strdomaincreated'] = '领域已建立。';
	$lang['strdomaincreatedbad'] = '领域建立失败。';	
	$lang['strdomainaltered'] = '领域已修改。';
	$lang['strdomainalteredbad'] = '领域修改失败。';	

	// Operators
	$lang['stroperator'] = '运算子';
	$lang['stroperators'] = '运算子';
	$lang['strshowalloperators'] = '显示全部运算子';
	$lang['strnooperator'] = '找不到运算子。';
	$lang['strnooperators'] = '找不到任何运算子。';
	$lang['strcreateoperator'] = '建立运算子';
	$lang['strleftarg'] = '左引数(Arg)类型';
	$lang['strrightarg'] = '右引数(Arg)类型';
	$lang['strcommutator'] = '转换器';
	$lang['strnegator'] = '否定器';
	$lang['strrestrict'] = '限制';
	$lang['strjoin'] = '结合';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = '合并';
	$lang['strleftsort'] = '左排序';
	$lang['strrightsort'] = '右排序';
	$lang['strlessthan'] = '小于';
	$lang['strgreaterthan'] = '大于';
	$lang['stroperatorneedsname'] = '您必需为您的运算子给一个名称。';
	$lang['stroperatorcreated'] = '运算子已建立';
	$lang['stroperatorcreatedbad'] = '运算子建立失败。';
	$lang['strconfdropoperator'] = '您确定您要移除这个运算子 "%s"?';
	$lang['stroperatordropped'] = '运算子已移除。';
	$lang['stroperatordroppedbad'] = '运算子移除失败。';

	// Casts
	$lang['strcasts'] = '类型转换';
	$lang['strnocasts'] = '找不到任何类型转换。';
	$lang['strsourcetype'] = '来源类型';
	$lang['strtargettype'] = '目标类型';
	$lang['strimplicit'] = '隐含';
	$lang['strinassignment'] = '指派中';
	$lang['strbinarycompat'] = '(二进制码相容)';
	
	// Conversions
	$lang['strconversions'] = '编码转换';
	$lang['strnoconversions'] = '找不到任何编码转换。';
	$lang['strsourceencoding'] = '来源编码';
	$lang['strtargetencoding'] = '目标编码';
	
	// Languages
	$lang['strlanguages'] = '程序语言';
	$lang['strnolanguages'] = '找不到任何程序语言。';
	$lang['strtrusted'] = '已信任';
	
	// Info
	$lang['strnoinfo'] = '无信息可用。';
	$lang['strreferringtables'] = '参照中数据表';
	$lang['strparenttables'] = '父数据表';
	$lang['strchildtables'] = '子数据表';

	// Aggregates
	$lang['straggregate'] = '聚集函数';
	$lang['straggregates'] = '聚集函数';
	$lang['strnoaggregates'] = '找不到任何聚集函数。';
	$lang['stralltypes'] = '(全部类型)';
	$lang['straggrtransfn'] = '过渡函数';
	$lang['strcreateaggregate'] = '建立聚集函数';
	$lang['straggrbasetype'] = '输入数据类型';
	$lang['straggrsfunc'] = '状态过渡函数';
	$lang['straggrstype'] = '状态数据类型';
	$lang['straggrffunc'] = '最终函数';
	$lang['straggrinitcond'] = '最初身份';
	$lang['straggrsortop'] = '排序运算子';
	$lang['strdropaggregate'] = '移除聚集函数';
	$lang['strconfdropaggregate'] = '您确定您要移除这个聚集函数 "%s"?';
	$lang['straggregatedropped'] = '聚集函数已移除。';
	$lang['straggregatedroppedbad'] = '聚集函数移除失败。';
	$lang['stralteraggregate'] = '修改聚集函数';
	$lang['straggraltered'] = '聚集函数已修改。';
	$lang['straggralteredbad'] = '聚集函数修改失败。';
	$lang['straggrneedsname'] = '您必需具体指定一个名称给这个聚集函数。';
	$lang['straggrneedsbasetype'] = '您必需具体指定这聚集函数的进入数据类型。';
	$lang['straggrneedssfunc'] = '您必需具体指定这这聚集函数的状态过渡函数名称。';
	$lang['straggrneedsstype'] = '您必需具体指定这聚集函数群状态值的数据类型';
	$lang['straggrcreated'] = '聚集函数已建立。';
	$lang['straggrcreatedbad'] = '聚集函数建立失败。';
	$lang['straggrshowall'] = '显示全部聚集函数';

	// Operator Classes
	$lang['stropclasses'] = '运算子类别';
	$lang['strnoopclasses'] = '找不到任何运算子类别。';
	$lang['straccessmethod'] = '存取方法';

	// Stats and performance
	$lang['strrowperf'] = '数据列性能';
	$lang['strioperf'] = 'I/O 性能';
	$lang['stridxrowperf'] = '索引数据列性能';
	$lang['stridxioperf'] = '索引 I/O 性能';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = '连续性';
	$lang['strscan'] = '扫描';
	$lang['strread'] = '读';
	$lang['strfetch'] = '取得';
	$lang['strheap'] = '堆叠';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST 索引';
	$lang['strcache'] = '缓存';
	$lang['strdisk'] = '磁碟';
	$lang['strrows2'] = '数据列';

	// Tablespaces
	$lang['strtablespace'] = '表空间';
	$lang['strtablespaces'] = '表空间';
	$lang['strshowalltablespaces'] = '显示全部表空间';
	$lang['strnotablespaces'] = '找不到任何表空间。';
	$lang['strcreatetablespace'] = '建立表空间';
	$lang['strlocation'] = '所在位置';
	$lang['strtablespaceneedsname'] = '您必需为您的表空间给一个名称。';
	$lang['strtablespaceneedsloc'] = '您必需给一个目录夹来建立表空间。';
	$lang['strtablespacecreated'] = '表空间已建立。';
	$lang['strtablespacecreatedbad'] = '表空间建立失败。';
	$lang['strconfdroptablespace'] = '您确定您要移除这个表空间 "%s"?';
	$lang['strtablespacedropped'] = '表空间已移除。';
	$lang['strtablespacedroppedbad'] = '表空间移除失败。';
	$lang['strtablespacealtered'] = '表空间已修改。';
	$lang['strtablespacealteredbad'] = '表空间修改失败。';

	// Slony clusters
	$lang['strcluster'] = '集群';
	$lang['strnoclusters'] = '找不到任何集群。';
	$lang['strconfdropcluster'] = '您确定您要移除这个集群 "%s"?';
	$lang['strclusterdropped'] = '集群已移除。';
	$lang['strclusterdroppedbad'] = '集群移除失败。';
	$lang['strinitcluster'] = '初始化集群';
	$lang['strclustercreated'] = '集群已初始化。';
	$lang['strclustercreatedbad'] = '集群初始化失败。';
	$lang['strclusterneedsname'] = '您必需为这个集群给一个名称。';
	$lang['strclusterneedsnodeid'] = '您必需给这个本地节点给一个 ID。';
	
	// Slony nodes
	$lang['strnodes'] = '节点';
	$lang['strnonodes'] = '找不到任何节点。';
	$lang['strcreatenode'] = '建立节点';
	$lang['strid'] = 'ID';
	$lang['stractive'] = '活跃';
	$lang['strnodecreated'] = '节点已建立。';
	$lang['strnodecreatedbad'] = '节点建立失败。';
	$lang['strconfdropnode'] = '您确定你要移除节点 "%s"?';
	$lang['strnodedropped'] = '节点已移除。';
	$lang['strnodedroppedbad'] = '节点移除失败。';
	$lang['strfailover'] = '灾难复原';
	$lang['strnodefailedover'] = '节点受灾难失败。';
	$lang['strnodefailedoverbad'] = '节点灾难复原失败。';
	$lang['strstatus'] = '状态';	
	$lang['strhealthy'] = '健全';
	$lang['stroutofsync'] = '非同步(Out of Sync)';
	$lang['strunknown'] = '未知';	

	
	// Slony paths	
	$lang['strpaths'] = '路径';
	$lang['strnopaths'] = '找不到任何路径。';
	$lang['strcreatepath'] = '建立路径';
	$lang['strnodename'] = '节点名称';
	$lang['strnodeid'] = '节点 ID';
	$lang['strconninfo'] = '连线字串';
	$lang['strconnretry'] = '秒之前重试连线';
	$lang['strpathneedsconninfo'] = '您必需给这个路径一个连线字串。';
	$lang['strpathneedsconnretry'] = '您必需在连线之前给一个等待重试的秒数字。';
	$lang['strpathcreated'] = '路径已建立。';
	$lang['strpathcreatedbad'] = '路径建立失败。';
	$lang['strconfdroppath'] = '您确定您要移除路径 "%s"?';
	$lang['strpathdropped'] = '路径已移除。';
	$lang['strpathdroppedbad'] = '路径移除失败。';

	// Slony listens
	$lang['strlistens'] = '监听';
	$lang['strnolistens'] = '找不到任何监听。';
	$lang['strcreatelisten'] = '建立监听';
	$lang['strlistencreated'] = '监听已建立。';
	$lang['strlistencreatedbad'] = '监听建立失败。';
	$lang['strconfdroplisten'] = '您确定你要移除监听 "%s"?';
	$lang['strlistendropped'] = '监听已移除。';
	$lang['strlistendroppedbad'] = '监听移除失败。';

	// Slony replication sets
	$lang['strrepsets'] = '复写集群设定';
	$lang['strnorepsets'] = '找不到任何复写集群设定。';
	$lang['strcreaterepset'] = '建立复写集群设定';
	$lang['strrepsetcreated'] = '复写集群设定已建立。';
	$lang['strrepsetcreatedbad'] = '复写集群设定建立失败。';
	$lang['strconfdroprepset'] = '您确定您要移除复写集群设定 "%s"?';
	$lang['strrepsetdropped'] = '复写集群设定已移除。';
	$lang['strrepsetdroppedbad'] = '复写集群设定移除失败。';
	$lang['strmerge'] = '合并';
	$lang['strmergeinto'] = '合并成为';
	$lang['strrepsetmerged'] = '复写集群设定已合并。';
	$lang['strrepsetmergedbad'] = '复写集群设定合并失败。';
	$lang['strmove'] = '迁移';
	$lang['strneworigin'] = '新起点';
	$lang['strrepsetmoved'] = '复写集群设定已迁移。';
	$lang['strrepsetmovedbad'] = '复写集群设定迁移失败。';
	$lang['strnewrepset'] = '新复写集群设定';
	$lang['strlock'] = '锁定';
	$lang['strlocked'] = '已锁定';
	$lang['strunlock'] = '未锁定';
	$lang['strconflockrepset'] = '您确定您要锁定复写集群设定 "%s"?';
	$lang['strrepsetlocked'] = '复写集群设定已锁定。';
	$lang['strrepsetlockedbad'] = '复写集群设定锁定失败。';
	$lang['strconfunlockrepset'] = '您确定您要解锁复写集群设定 "%s"?';
	$lang['strrepsetunlocked'] = '复写集群设定未锁定。';
	$lang['strrepsetunlockedbad'] = '复写集群设定解锁失败。';
	$lang['strexecute'] = '执行';
	$lang['stronlyonnode'] = '仅在节点上';
	$lang['strddlscript'] = '数据定义语言(DDL)脚本';
	$lang['strscriptneedsbody'] = '您必需提供一个脚本在这全部节点上被执行。';
	$lang['strscriptexecuted'] = '复写集群设定 DDL 脚本已执行。';
	$lang['strscriptexecutedbad'] = '执行复写集群设定 DDL 脚本中失败。';
	$lang['strtabletriggerstoretain'] = '这将随着触发器不会停用 Slony 在以下：';

	// Slony tables in replication sets
	$lang['straddtable'] = '增加数据表';
	$lang['strtableneedsuniquekey'] = '数据表的增加要求一个主建(pkey)或唯一键。';
	$lang['strtableaddedtorepset'] = '数据表已增加到复写集群设定。';
	$lang['strtableaddedtorepsetbad'] = '数据表增加到复写集群设定失败。';
	$lang['strconfremovetablefromrepset'] = '您确定您要从复写集群设定 "%s" 移除这数据表 "%s" ?';
	$lang['strtableremovedfromrepset'] = '数据表已从复写集群设定移除。';
	$lang['strtableremovedfromrepsetbad'] = '数据表从复写集群设定移除失败。';

	// Slony sequences in replication sets
	$lang['straddsequence'] = '增加序列号';
	$lang['strsequenceaddedtorepset'] = '序列号增加到复写集群设定。';
	$lang['strsequenceaddedtorepsetbad'] = '增加序列号到复写集群设定失败。';
	$lang['strconfremovesequencefromrepset'] = '您确定您要从复写集群设定 "%s" 移除序列号 "%s" ?';
	$lang['strsequenceremovedfromrepset'] = '序列号已从复写集群设定移除。';
	$lang['strsequenceremovedfromrepsetbad'] = '序列号从复写集群设定移除失败。';

	// Slony subscriptions
	$lang['strsubscriptions'] = '订阅';
	$lang['strnosubscriptions'] = '找不到任何订阅。';

	// Miscellaneous
	$lang['strtopbar'] = '%s 运作于 %s：%s -- 您是已登入的用户 "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g：iA';
	$lang['strhelp'] = '帮助';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = '帮助页浏览器';
	$lang['strselecthelppage'] = '选择一个帮助页';
	$lang['strinvalidhelppage'] = '无效帮助页。';
	$lang['strlogintitle'] = '登入到 %s';
	$lang['strlogoutmsg'] = '登出 %s';
	$lang['strloading'] = '载入中...';
	$lang['strerrorloading'] = '载入中错误';
	$lang['strclicktoreload'] = '点击重新载入';

	// Autovacuum
	$lang['strautovacuum'] = 'Autovacuum'; 
	$lang['strturnedon'] = '转动 - 打开'; 
	$lang['strturnedoff'] = '转动 - 关闭'; 
	$lang['strenabled'] = '启用'; 
	$lang['strvacuumbasethreshold'] = 'Vacuum 基本门槛'; 
	$lang['strvacuumscalefactor'] = 'Vacuum 换算系数';  
	$lang['stranalybasethreshold'] = 'Analyze 基本门槛';  
	$lang['stranalyzescalefactor'] = 'Analyze 换算系数'; 
	$lang['strvacuumcostdelay'] = 'Vacuum 成本延迟'; 
	$lang['strvacuumcostlimit'] = 'Vacuum 成本限制';  

	// Table-level Locks
	$lang['strlocks'] = '锁定';
	$lang['strtransaction'] = '事务交易 ID';
	$lang['strprocessid'] = '进程 ID';
	$lang['strmode'] = '锁定方式';
	$lang['strislockheld'] = '是锁定执(held)?';

	// Prepared transactions
	$lang['strpreparedxacts'] = '已准备事务交易';
	$lang['strxactid'] = '事务交易 ID';
	$lang['strgid'] = 'Global ID';
?>
