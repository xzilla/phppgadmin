<?php

	/**
	 * Chinese-utf8-zh_TW language file for phpPgAdmin.  Use this as a basis
	 * for new translations.
	 *
	 *Translated by &#37101;&#26397;&#30410; ChaoYi, Kuo [kuo.chaoyi@gmail.com]
	 * $Id: chinese-utf8-zh_TW.php,v 1.1 2007/02/10 03:48:35 xzilla Exp $
	 */

	// Language and character set
	$lang['applang'] = '&#27491;&#39636;&#20013;&#25991;&#65288;UTF-8&#65289;';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'zh_TW';
	$lang['appdbencoding'] = 'UTF8';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = '&#27489;&#36814;&#20351;&#29992; phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmin &#39318;&#38913;';
	$lang['strpgsqlhome'] = 'PostgreSQL &#39318;&#38913;';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL &#25991;&#20214; (&#26412;&#27231;)';
	$lang['strreportbug'] = '&#36890;&#22577;&#31243;&#24335;&#33261;&#34802;';
	$lang['strviewfaq'] = '&#35264;&#30475;&#32218;&#19978; FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = '&#30331;&#20837;';
	$lang['strloginfailed'] = '&#30331;&#20837;&#22833;&#25943;';
	$lang['strlogindisallowed'] = '&#20986;&#26044;&#23433;&#20840;&#21407;&#22240;&#25298;&#32085;&#30331;&#20837;.';
	$lang['strserver'] = '&#20282;&#26381;&#22120;';
	$lang['strservers'] = '&#20282;&#26381;&#22120;&#38598;';
	$lang['strintroduction'] = 'Introduction';
	$lang['strhost'] = '&#20027;&#27231;';
	$lang['strport'] = '&#22496;&#34399;';
	$lang['strlogout'] = '&#30331;&#20986;';
	$lang['strowner'] = '&#25793;&#26377;&#32773;';
	$lang['straction'] = '&#21205;&#20316;';
	$lang['stractions'] = '&#21205;&#20316;s';
	$lang['strname'] = '&#21517;&#31281;';
	$lang['strdefinition'] = '&#23450;&#32681;';
	$lang['strproperties'] = '&#23660;&#24615;';
	$lang['strbrowse'] = '&#28687;&#35261;';
	$lang['strenable'] = '&#21855;&#29992;';
	$lang['strdisable'] = '&#20572;&#29992;';
	$lang['strdrop'] = '&#21034;&#38500;';
	$lang['strdropped'] = '&#24050;&#21034;&#38500;';
	$lang['strnull'] = '&#31354;&#20540;';
	$lang['strnotnull'] = '&#19981;&#20801;&#35377;&#31354;&#20540;';
	$lang['strprev'] = '&lt; &#19978;&#19968;&#27493;';
	$lang['strnext'] = 'Next &gt;';
	$lang['strfirst'] = '&lt;&lt; &#19979;&#19968;&#27493;';
	$lang['strlast'] = '&#26368;&#24460;&#19968;&#27493; &gt;&gt;';
	$lang['strfailed'] = '&#22833;&#25943;';
	$lang['strcreate'] = '&#24314;&#31435;';
	$lang['strcreated'] = '&#24050;&#24314;&#31435;';
	$lang['strcomment'] = '&#35387;&#37323;';
	$lang['strlength'] = '&#38263;&#24230;';
	$lang['strdefault'] = '&#38928;&#35373;&#20540;';
	$lang['stralter'] = '&#20462;&#25913;';
	$lang['strok'] = '&#30906;&#23450;';
	$lang['strcancel'] = '&#21462;&#28040;';
	$lang['strac'] = 'Enable AutoComplete';
	$lang['strsave'] = '&#20786;&#23384;';
	$lang['strreset'] = '&#37325;&#35373;';
	$lang['strinsert'] = '&#25554;&#20837;';
	$lang['strselect'] = '&#36984;&#21462;';
	$lang['strdelete'] = '&#21034;&#38500;';
	$lang['strupdate'] = '&#26356;&#26032;';
	$lang['strreferences'] = '&#21443;&#32771;';
	$lang['stryes'] = '&#26159;';
	$lang['strno'] = '&#21542;';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
	$lang['stredit'] = '&#32232;&#36655;';
	$lang['strcolumn'] = '&#27396;&#20301;';
	$lang['strcolumns'] = '&#27396;&#20301;';
	$lang['strrows'] = '&#36039;&#26009;&#21015;';
	$lang['strrowsaff'] = '&#36039;&#26009;&#21015;&#21463;&#24433;&#38911;&#12290;';
	$lang['strobjects'] = '&#29289;&#20214;&#32676;';
	$lang['strback'] = '&#36820;&#22238;';
	$lang['strqueryresults'] = '&#26597;&#35426;&#32080;&#26524;';
	$lang['strshow'] = '&#39023;&#31034;';
	$lang['strempty'] = '&#31354;&#20540;';
	$lang['strlanguage'] = '&#35486;&#35328;';
	$lang['strencoding'] = '&#32232;&#30908;';
	$lang['strvalue'] = '&#20540;';
	$lang['strunique'] = '&#21807;&#19968;&#20540;';
	$lang['strprimary'] = '&#20027;&#37749;(PK)';
	$lang['strexport'] = '&#21295;&#20986;';
	$lang['strimport'] = '&#21295;&#20837;';
	$lang['strallowednulls'] = 'Allowed NULL characters';
	$lang['strbackslashn'] = '\N';
	$lang['strnull'] = 'NULL (The word)';
	$lang['stremptystring'] = 'Empty string/field';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = '&#31649;&#29702;&#32773;';
	$lang['strvacuum'] = '&#28165;&#29702;(Vacuum)';
	$lang['stranalyze'] = '&#20998;&#26512;';
	$lang['strclusterindex'] = '&#38598;&#32676;';
	$lang['strclustered'] = '&#24050;&#38598;&#32676;?';
	$lang['strreindex'] = '&#37325;&#24314;&#32034;&#24341;';
	$lang['strrun'] = '&#22519;&#34892;';
	$lang['stradd'] = '&#26032;&#22686;';
	$lang['strevent'] = '&#20107;&#20214;';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = '&#26684;&#24335;';
	$lang['strdata'] = '&#36039;&#26009;';
	$lang['strconfirm'] = '&#30906;&#35469;';
	$lang['strexpression'] = '&#34920;&#36948;&#24335;';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = '&#23637;&#38283;';
	$lang['strcollapse'] = '&#25722;&#30090;';
	$lang['strexplain'] = '&#38369;&#26126;';
	$lang['strexplainanalyze'] = '&#38369;&#26126;&#20998;&#26512;';
	$lang['strfind'] = '&#23563;&#25214;';
	$lang['stroptions'] = '&#36984;&#38917;';
	$lang['strrefresh'] = '&#37325;&#26032;&#25972;&#29702;';
	$lang['strdownload'] = '&#19979;&#36617;';
	$lang['strdownloadgzipped'] = '&#20197;gzip&#22739;&#32302;&#24460;&#19979;&#36617;';
	$lang['strinfo'] = '&#36039;&#35338;';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = '&#36914;&#38542;';
	$lang['strvariables'] = '&#35722;&#25976;';
	$lang['strprocess'] = '&#36914;&#31243;';
	$lang['strprocesses'] = '&#36914;&#31243;&#38598;';
	$lang['strsetting'] = '&#35373;&#23450;';
	$lang['streditsql'] = '&#32232;&#36655; SQL';
	$lang['strruntime'] = '&#32317;&#20849;&#22519;&#34892;&#26178;&#38291;: %s ms';
	$lang['strpaginate'] = '&#20998;&#38913;&#39023;&#31034;&#32080;&#26524;';
	$lang['struploadscript'] = '&#25110;&#26159;&#19978;&#20659;&#19968;&#20491;SQL&#33139;&#26412;&#27284;:';
	$lang['strstarttime'] = '&#38283;&#22987;&#26178;&#38291;';
	$lang['strfile'] = '&#27284;&#26696;';
	$lang['strfileimported'] = '&#27284;&#26696;&#24050;&#21295;&#20837;&#12290;';
	$lang['strtrycred'] = 'Use these credentials for all servers';

	// Database sizes
	$lang['strsize'] = '&#23481;&#37327;';
	$lang['strbytes'] = 'bytes';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'This application works best with a frames-enabled browser, but can be used without frames by following the link below.';
	$lang['strnoframeslink'] = 'Use without frames';
	$lang['strbadconfig'] = 'Your config.inc.php is out of date. You will need to regenerate it from the new config.inc.php-dist.';
	$lang['strnotloaded'] = '&#24744;&#30340; PHP &#29872;&#22659;&#26410;&#23433;&#35037; PostgreSQL &#24517;&#35201;&#30340;&#25903;&#25345;&#12290;&#24744;&#24517;&#38656;&#37325;&#26032;&#32232;&#35695; PHP &#20351;&#29992;&#36889; --with-pgsql configure &#36984;&#38917;&#12290;';
	$lang['strpostgresqlversionnotsupported'] = 'PostgreSQL &#29256;&#26412;&#26410;&#34987;&#25903;&#25345;&#12290;&#35531;&#21319;&#32026;&#29256;&#26412;&#21040; %s &#25110;&#26159;&#26356;&#39640;&#32773;&#12290;';
	$lang['strbadschema'] = '&#25351;&#23450;&#20102;&#28961;&#25928;&#30340;&#32177;&#35201;&#27169;&#24335;(schema)&#12290;';
	$lang['strbadencoding'] = '&#36039;&#26009;&#24235;&#28961;&#27861;&#35373;&#23450;&#29992;&#25142;&#31471;&#30340;&#32232;&#30908;&#26041;&#24335;&#12290;';
	$lang['strsqlerror'] = 'SQL &#37679;&#35492;&#65306;';
	$lang['strinstatement'] = '&#26044;&#38515;&#36848;&#20839;&#65306;';
	$lang['strinvalidparam'] = '&#28961;&#25928;&#30340;&#33139;&#26412;&#35722;&#25976;&#12290;';
	$lang['strnodata'] = '&#25214;&#19981;&#21040;&#36039;&#26009;&#21015;&#12290;';
	$lang['strnoobjects'] = '&#25214;&#19981;&#21040;&#29289;&#20214;&#12290;';
	$lang['strrownotunique'] = '&#36889;&#36039;&#26009;&#21015;&#28961;&#21807;&#19968;&#20540;&#35672;&#21029;&#38917;&#12290;';
	$lang['strnoreportsdb'] = '&#24744;&#23578;&#26410;&#24314;&#31435;&#22577;&#34920;&#36039;&#26009;&#24235;&#12290;&#35531;&#21443;&#38321;&#25351;&#23566; INSTALL &#27284;&#35498;&#26126;&#12290;';
	$lang['strnouploads'] = '&#19978;&#20659;&#27284;&#26696;&#21151;&#33021;&#24050;&#20572;&#29992;&#12290;';
	$lang['strimporterror'] = '&#21295;&#20837;&#37679;&#35492;.';
	$lang['strimporterror-fileformat'] = 'Import error: Failed to automatically determine the file format.';
	$lang['strimporterrorline'] = '&#21295;&#20837;&#37679;&#35492;&#30332;&#29983;&#22312;&#31532; %s &#34892;&#12290;';
	$lang['strimporterrorline-badcolumnnum'] = '&#21295;&#20837;&#37679;&#35492;&#30332;&#29983;&#22312;&#31532; %s &#34892;: Line does not possess the correct number of columns.';
	$lang['strimporterror-uploadedfile'] = '&#21295;&#20837;&#37679;&#35492;:&#27284;&#26696;&#28961;&#27861;&#34987;&#19978;&#20659;&#21040;&#36889;&#20282;&#26381;&#22120;';
	$lang['strcannotdumponwindows'] = 'Dumping of complex table and schema names on Windows is not supported.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Show all tables';
	$lang['strnotables'] = 'No tables found.';
	$lang['strnotable'] = 'No table found.';
	$lang['strcreatetable'] = 'Create table';
	$lang['strtablename'] = 'Table name';
	$lang['strtableneedsname'] = 'You must give a name for your table.';
	$lang['strtableneedsfield'] = 'You must specify at least one field.';
	$lang['strtableneedscols'] = 'You must specify a valid number of columns.';
	$lang['strtablecreated'] = 'Table created.';
	$lang['strtablecreatedbad'] = 'Table creation failed.';
	$lang['strconfdroptable'] = 'Are you sure you want to drop the table &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Table dropped.';
	$lang['strtabledroppedbad'] = 'Table drop failed.';
	$lang['strconfemptytable'] = 'Are you sure you want to empty the table &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Table emptied.';
	$lang['strtableemptiedbad'] = 'Table empty failed.';
	$lang['strinsertrow'] = 'Insert row';
	$lang['strrowinserted'] = 'Row inserted.';
	$lang['strrowinsertedbad'] = 'Row insert failed.';
	$lang['strrowduplicate'] = 'Row insert failed, attempted to do duplicate insert.';
	$lang['streditrow'] = 'Edit row';
	$lang['strrowupdated'] = 'Row updated.';
	$lang['strrowupdatedbad'] = 'Row update failed.';
	$lang['strdeleterow'] = 'Delete Row';
	$lang['strconfdeleterow'] = 'Are you sure you want to delete this row?';
	$lang['strrowdeleted'] = 'Row deleted.';
	$lang['strrowdeletedbad'] = 'Row deletion failed.';
	$lang['strinsertandrepeat'] = 'Insert &amp; Repeat';
	$lang['strnumcols'] = 'Number of columns';
	$lang['strcolneedsname'] = 'You must specify a name for the column';
	$lang['strselectallfields'] = 'Select all fields';
	$lang['strselectneedscol'] = 'You must show at least one column.';
	$lang['strselectunary'] = 'Unary operators cannot have values.';
	$lang['straltercolumn'] = 'Alter column';
	$lang['strcolumnaltered'] = 'Column altered.';
	$lang['strcolumnalteredbad'] = 'Column alteration failed.';
	$lang['strconfdropcolumn'] = 'Are you sure you want to drop column &quot;%s&quot; from table &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Column dropped.';
	$lang['strcolumndroppedbad'] = 'Column drop failed.';
	$lang['straddcolumn'] = 'Add column';
	$lang['strcolumnadded'] = 'Column added.';
	$lang['strcolumnaddedbad'] = 'Column add failed.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Table altered.';
	$lang['strtablealteredbad'] = 'Table alteration failed.';
	$lang['strdataonly'] = 'Data only';
	$lang['strstructureonly'] = 'Structure only';
	$lang['strstructureanddata'] = 'Structure and data';
	$lang['strtabbed'] = 'Tabbed';
	$lang['strauto'] = 'Auto';
	$lang['strconfvacuumtable'] = 'Are you sure you want to vacuum &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Estimated row count';

	// Columns
	$lang['strcolprop'] = 'Column properties';
		
	// Users
	$lang['struser'] = 'User';
	$lang['strusers'] = 'Users';
	$lang['strusername'] = 'Username';
	$lang['strpassword'] = 'Password';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Create DB?';
	$lang['strexpires'] = 'Expires';
	$lang['strsessiondefaults'] = 'Session defaults';
	$lang['strnousers'] = 'No users found.';
	$lang['struserupdated'] = 'User updated.';
	$lang['struserupdatedbad'] = 'User update failed.';
	$lang['strshowallusers'] = 'Show all users';
	$lang['strcreateuser'] = 'Create user';
	$lang['struserneedsname'] = 'You must give a name for your user.';
	$lang['strusercreated'] = 'User created.';
	$lang['strusercreatedbad'] = 'Failed to create user.';
	$lang['strconfdropuser'] = 'Are you sure you want to drop the user &quot;%s&quot;?';
	$lang['struserdropped'] = 'User dropped.';
	$lang['struserdroppedbad'] = 'Failed to drop user.';
	$lang['straccount'] = 'Account';
	$lang['strchangepassword'] = 'Change password';
	$lang['strpasswordchanged'] = 'Password changed.';
	$lang['strpasswordchangedbad'] = 'Failed to change password.';
	$lang['strpasswordshort'] = 'Password is too short.';
	$lang['strpasswordconfirm'] = 'Password does not match confirmation.';
	
	// Groups
	$lang['strgroup'] = 'Group';
	$lang['strgroups'] = 'Groups';
	$lang['strshowallgroups'] = 'Show all groups';
	$lang['strnogroup'] = 'Group not found.';
	$lang['strnogroups'] = 'No groups found.';
	$lang['strcreategroup'] = 'Create group';
	$lang['strgroupneedsname'] = 'You must give a name for your group.';
	$lang['strgroupcreated'] = 'Group created.';
	$lang['strgroupcreatedbad'] = 'Group creation failed.';	
	$lang['strconfdropgroup'] = 'Are you sure you want to drop the group &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Group dropped.';
	$lang['strgroupdroppedbad'] = 'Group drop failed.';
	$lang['strmembers'] = 'Members';
	$lang['strmemberof'] = 'Member of';
	$lang['stradminmembers'] = 'Admin members';
	$lang['straddmember'] = 'Add member';
	$lang['strmemberadded'] = 'Member added.';
	$lang['strmemberaddedbad'] = 'Member add failed.';
	$lang['strdropmember'] = 'Drop member';
	$lang['strconfdropmember'] = 'Are you sure you want to drop the member &quot;%s&quot; from the group &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Member dropped.';
	$lang['strmemberdroppedbad'] = 'Member drop failed.';

	// Roles
	$lang['strrole'] = 'Role';
	$lang['strroles'] = 'Roles';
	$lang['strshowallroles'] = 'Show all roles';
	$lang['strnoroles'] = 'No roles found.';
	$lang['strinheritsprivs'] = 'Inherits privileges?';
	$lang['strcreaterole'] = 'Create role';
	$lang['strcancreaterole'] = 'Can create role?';
	$lang['strrolecreated'] = 'Role created.';
	$lang['strrolecreatedbad'] = 'Create role failed.';
	$lang['stralterrole'] = 'Alter role';
	$lang['strrolealtered'] = 'Role altered.';
	$lang['strrolealteredbad'] = 'Role alter failed.';
	$lang['strcanlogin'] = 'Can login?';
	$lang['strconnlimit'] = 'Connection limit';
	$lang['strdroprole'] = 'Drop role';
	$lang['strconfdroprole'] = 'Are you sure you want to drop the role &quot;%s&quot;?';
	$lang['strroledropped'] = 'Role dropped.';
	$lang['strroledroppedbad'] = 'Role drop failed.';
	$lang['strnolimit'] = 'No limit';
	$lang['strnever'] = 'Never';
	$lang['strroleneedsname'] = 'You must give a name for the role.';

	// Privileges
	$lang['strprivilege'] = 'Privilege';
	$lang['strprivileges'] = 'Privileges';
	$lang['strnoprivileges'] = 'This object has default owner privileges.';
	$lang['strgrant'] = 'Grant';
	$lang['strrevoke'] = 'Revoke';
	$lang['strgranted'] = 'Privileges changed.';
	$lang['strgrantfailed'] = 'Failed to change privileges.';
	$lang['strgrantbad'] = 'You must specify at least one user or group and at least one privilege.';
	$lang['strgrantor'] = 'Grantor';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Database';
	$lang['strdatabases'] = 'Databases';
	$lang['strshowalldatabases'] = 'Show all databases';
	$lang['strnodatabases'] = 'No databases found.';
	$lang['strcreatedatabase'] = 'Create database';
	$lang['strdatabasename'] = 'Database name';
	$lang['strdatabaseneedsname'] = 'You must give a name for your database.';
	$lang['strdatabasecreated'] = 'Database created.';
	$lang['strdatabasecreatedbad'] = 'Database creation failed.';
	$lang['strconfdropdatabase'] = 'Are you sure you want to drop the database &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Database dropped.';
	$lang['strdatabasedroppedbad'] = 'Database drop failed.';
	$lang['strentersql'] = 'Enter the SQL to execute below:';
	$lang['strsqlexecuted'] = 'SQL executed.';
	$lang['strvacuumgood'] = 'Vacuum complete.';
	$lang['strvacuumbad'] = 'Vacuum failed.';
	$lang['stranalyzegood'] = 'Analyze complete.';
	$lang['stranalyzebad'] = 'Analyze failed.';
	$lang['strreindexgood'] = 'Reindex complete.';
	$lang['strreindexbad'] = 'Reindex failed.';
	$lang['strfull'] = 'Full';
	$lang['strfreeze'] = 'Freeze';
	$lang['strforce'] = 'Force';
	$lang['strsignalsent'] = 'Signal sent.';
	$lang['strsignalsentbad'] = 'Sending signal failed.';
	$lang['strallobjects'] = 'All objects';
	$lang['strdatabasealtered'] = 'Database altered.';
	$lang['strdatabasealteredbad'] = 'Database alter failed.';

	// Views
	$lang['strview'] = 'View';
	$lang['strviews'] = 'Views';
	$lang['strshowallviews'] = 'Show all views';
	$lang['strnoview'] = 'No view found.';
	$lang['strnoviews'] = 'No views found.';
	$lang['strcreateview'] = 'Create view';
	$lang['strviewname'] = 'View name';
	$lang['strviewneedsname'] = 'You must give a name for your view.';
	$lang['strviewneedsdef'] = 'You must give a definition for your view.';
	$lang['strviewneedsfields'] = 'You must give the columns you want selected in your view.';
	$lang['strviewcreated'] = 'View created.';
	$lang['strviewcreatedbad'] = 'View creation failed.';
	$lang['strconfdropview'] = 'Are you sure you want to drop the view &quot;%s&quot;?';
	$lang['strviewdropped'] = 'View dropped.';
	$lang['strviewdroppedbad'] = 'View drop failed.';
	$lang['strviewupdated'] = 'View updated.';
	$lang['strviewupdatedbad'] = 'View update failed.';
	$lang['strviewlink'] = 'Linking keys';
	$lang['strviewconditions'] = 'Additional conditions';
	$lang['strcreateviewwiz'] = 'Create view with wizard';

	// Sequences
	$lang['strsequence'] = 'Sequence';
	$lang['strsequences'] = 'Sequences';
	$lang['strshowallsequences'] = 'Show all sequences';
	$lang['strnosequence'] = 'No sequence found.';
	$lang['strnosequences'] = 'No sequences found.';
	$lang['strcreatesequence'] = 'Create sequence';
	$lang['strlastvalue'] = 'Last value';
	$lang['strincrementby'] = 'Increment by';	
	$lang['strstartvalue'] = 'Start value';
	$lang['strmaxvalue'] = 'Max value';
	$lang['strminvalue'] = 'Min value';
	$lang['strcachevalue'] = 'Cache value';
	$lang['strlogcount'] = 'Log count';
	$lang['striscycled'] = 'Is cycled?';
	$lang['striscalled'] = 'Is called?';
	$lang['strsequenceneedsname'] = 'You must specify a name for your sequence.';
	$lang['strsequencecreated'] = 'Sequence created.';
	$lang['strsequencecreatedbad'] = 'Sequence creation failed.'; 
	$lang['strconfdropsequence'] = 'Are you sure you want to drop sequence &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sequence dropped.';
	$lang['strsequencedroppedbad'] = 'Sequence drop failed.';
	$lang['strsequencereset'] = 'Sequence reset.';
	$lang['strsequenceresetbad'] = 'Sequence reset failed.'; 
 	$lang['straltersequence'] = 'Alter sequence';
 	$lang['strsequencealtered'] = 'Sequence altered.';
 	$lang['strsequencealteredbad'] = 'Sequence alteration failed.';
 	$lang['strsetval'] = 'Set value';
 	$lang['strsequencesetval'] = 'Sequence value set.';
 	$lang['strsequencesetvalbad'] = 'Sequence value set failed.';
 	$lang['strnextval'] = 'Increment value';
 	$lang['strsequencenextval'] = 'Sequence incremented.';
 	$lang['strsequencenextvalbad'] = 'Sequence increment failed.';

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Indexes';
	$lang['strindexname'] = 'Index name';
	$lang['strshowallindexes'] = 'Show all indexes';
	$lang['strnoindex'] = 'No index found.';
	$lang['strnoindexes'] = 'No indexes found.';
	$lang['strcreateindex'] = 'Create index';
	$lang['strtabname'] = 'Tab name';
	$lang['strcolumnname'] = 'Column name';
	$lang['strindexneedsname'] = 'You must give a name for your index.';
	$lang['strindexneedscols'] = 'Indexes require a valid number of columns.';
	$lang['strindexcreated'] = 'Index created';
	$lang['strindexcreatedbad'] = 'Index creation failed.';
	$lang['strconfdropindex'] = 'Are you sure you want to drop the index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index dropped.';
	$lang['strindexdroppedbad'] = 'Index drop failed.';
	$lang['strkeyname'] = 'Key name';
	$lang['struniquekey'] = 'Unique key';
	$lang['strprimarykey'] = 'Primary key';
 	$lang['strindextype'] = 'Type of index';
	$lang['strtablecolumnlist'] = 'Columns in table';
	$lang['strindexcolumnlist'] = 'Columns in index';
	$lang['strconfcluster'] = 'Are you sure you want to cluster &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Cluster complete.';
	$lang['strclusteredbad'] = 'Cluster failed.';

	// Rules
	$lang['strrules'] = 'Rules';
	$lang['strrule'] = 'Rule';
	$lang['strshowallrules'] = 'Show all rules';
	$lang['strnorule'] = 'No rule found.';
	$lang['strnorules'] = 'No rules found.';
	$lang['strcreaterule'] = 'Create rule';
	$lang['strrulename'] = 'Rule name';
	$lang['strruleneedsname'] = 'You must specify a name for your rule.';
	$lang['strrulecreated'] = 'Rule created.';
	$lang['strrulecreatedbad'] = 'Rule creation failed.';
	$lang['strconfdroprule'] = 'Are you sure you want to drop the rule &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strruledropped'] = 'Rule dropped.';
	$lang['strruledroppedbad'] = 'Rule drop failed.';

	// Constraints
	$lang['strconstraint'] = 'Constraint';
	$lang['strconstraints'] = 'Constraints';
	$lang['strshowallconstraints'] = 'Show all constraints';
	$lang['strnoconstraints'] = 'No constraints found.';
	$lang['strcreateconstraint'] = 'Create constraint';
	$lang['strconstraintcreated'] = 'Constraint created.';
	$lang['strconstraintcreatedbad'] = 'Constraint creation failed.';
	$lang['strconfdropconstraint'] = 'Are you sure you want to drop the constraint &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Constraint dropped.';
	$lang['strconstraintdroppedbad'] = 'Constraint drop failed.';
	$lang['straddcheck'] = 'Add check';
	$lang['strcheckneedsdefinition'] = 'Check constraint needs a definition.';
	$lang['strcheckadded'] = 'Check constraint added.';
	$lang['strcheckaddedbad'] = 'Failed to add check constraint.';
	$lang['straddpk'] = 'Add primary key';
	$lang['strpkneedscols'] = 'Primary key requires at least one column.';
	$lang['strpkadded'] = 'Primary key added.';
	$lang['strpkaddedbad'] = 'Failed to add primary key.';
	$lang['stradduniq'] = 'Add unique key';
	$lang['struniqneedscols'] = 'Unique key requires at least one column.';
	$lang['struniqadded'] = 'Unique key added.';
	$lang['struniqaddedbad'] = 'Failed to add unique key.';
	$lang['straddfk'] = 'Add foreign key';
	$lang['strfkneedscols'] = 'Foreign key requires at least one column.';
	$lang['strfkneedstarget'] = 'Foreign key requires a target table.';
	$lang['strfkadded'] = 'Foreign key added.';
	$lang['strfkaddedbad'] = 'Failed to add foreign key.';
	$lang['strfktarget'] = 'Target table';
	$lang['strfkcolumnlist'] = 'Columns in key';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Function';
	$lang['strfunctions'] = 'Functions';
	$lang['strshowallfunctions'] = 'Show all functions';
	$lang['strnofunction'] = 'No function found.';
	$lang['strnofunctions'] = 'No functions found.';
	$lang['strcreateplfunction'] = 'Create SQL/PL function';
	$lang['strcreateinternalfunction'] = 'Create internal function';
	$lang['strcreatecfunction'] = 'Create C function';
	$lang['strfunctionname'] = 'Function name';
	$lang['strreturns'] = 'Returns';
	$lang['strproglanguage'] = 'Programming language';
	$lang['strfunctionneedsname'] = 'You must give a name for your function.';
	$lang['strfunctionneedsdef'] = 'You must give a definition for your function.';
	$lang['strfunctioncreated'] = 'Function created.';
	$lang['strfunctioncreatedbad'] = 'Function creation failed.';
	$lang['strconfdropfunction'] = 'Are you sure you want to drop the function &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Function dropped.';
	$lang['strfunctiondroppedbad'] = 'Function drop failed.';
	$lang['strfunctionupdated'] = 'Function updated.';
	$lang['strfunctionupdatedbad'] = 'Function update failed.';
	$lang['strobjectfile'] = 'Object File';
	$lang['strlinksymbol'] = 'Link Symbol';
	$lang['strarguments'] = 'Arguments';
	$lang['strargmode'] = 'Mode';
	$lang['strargtype'] = 'Type';
	$lang['strargadd'] = 'Add another argument';
	$lang['strargremove'] = 'Remove this argument';
	$lang['strargnoargs'] = 'This function will not take any arguments.';
	$lang['strargenableargs'] = 'Enable arguments being passed to this function.';
	$lang['strargnorowabove'] = 'There needs to be a row above this row.';
	$lang['strargnorowbelow'] = 'There needs to be a row below this row.';
	$lang['strargraise'] = 'Move up.';
	$lang['strarglower'] = 'Move down.';
	$lang['strargremoveconfirm'] = 'Are you sure you want to remove this argument? This CANNOT be undone.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Show all triggers';
	$lang['strnotrigger'] = 'No trigger found.';
	$lang['strnotriggers'] = 'No triggers found.';
	$lang['strcreatetrigger'] = 'Create trigger';
	$lang['strtriggerneedsname'] = 'You must specify a name for your trigger.';
	$lang['strtriggerneedsfunc'] = 'You must specify a function for your trigger.';
	$lang['strtriggercreated'] = 'Trigger created.';
	$lang['strtriggercreatedbad'] = 'Trigger creation failed.';
	$lang['strconfdroptrigger'] = 'Are you sure you want to drop the trigger &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strconfenabletrigger'] = 'Are you sure you want to enable the trigger &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strconfdisabletrigger'] = 'Are you sure you want to disable the trigger &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger dropped.';
	$lang['strtriggerdroppedbad'] = 'Trigger drop failed.';
	$lang['strtriggerenabled'] = 'Trigger enabled.';
	$lang['strtriggerenabledbad'] = 'Trigger enable failed.';
	$lang['strtriggerdisabled'] = 'Trigger disabled.';
	$lang['strtriggerdisabledbad'] = 'Trigger disable failed.';
	$lang['strtriggeraltered'] = 'Trigger altered.';
	$lang['strtriggeralteredbad'] = 'Trigger alteration failed.';
	$lang['strforeach'] = 'For each';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Show all types';
	$lang['strnotype'] = 'No type found.';
	$lang['strnotypes'] = 'No types found.';
	$lang['strcreatetype'] = 'Create type';
	$lang['strcreatecomptype'] = 'Create composite type';
	$lang['strtypeneedsfield'] = 'You must specify at least one field.';
	$lang['strtypeneedscols'] = 'You must specify a valid number of fields.';	
	$lang['strtypename'] = 'Type name';
	$lang['strinputfn'] = 'Input function';
	$lang['stroutputfn'] = 'Output function';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Delimiter';
	$lang['strstorage'] = 'Storage';
	$lang['strfield'] = 'Field';
	$lang['strnumfields'] = 'Num. of fields';
	$lang['strtypeneedsname'] = 'You must give a name for your type.';
	$lang['strtypeneedslen'] = 'You must give a length for your type.';
	$lang['strtypecreated'] = 'Type created';
	$lang['strtypecreatedbad'] = 'Type creation failed.';
	$lang['strconfdroptype'] = 'Are you sure you want to drop the type &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Type dropped.';
	$lang['strtypedroppedbad'] = 'Type drop failed.';
	$lang['strflavor'] = 'Flavor';
	$lang['strbasetype'] = 'Base';
	$lang['strcompositetype'] = 'Composite';
	$lang['strpseudotype'] = 'Pseudo';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemas';
	$lang['strshowallschemas'] = 'Show all schemas';
	$lang['strnoschema'] = 'No schema found.';
	$lang['strnoschemas'] = 'No schemas found.';
	$lang['strcreateschema'] = 'Create schema';
	$lang['strschemaname'] = 'Schema name';
	$lang['strschemaneedsname'] = 'You must give a name for your schema.';
	$lang['strschemacreated'] = 'Schema created';
	$lang['strschemacreatedbad'] = 'Schema creation failed.';
	$lang['strconfdropschema'] = 'Are you sure you want to drop the schema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schema dropped.';
	$lang['strschemadroppedbad'] = 'Schema drop failed.';
	$lang['strschemaaltered'] = 'Schema altered.';
	$lang['strschemaalteredbad'] = 'Schema alteration failed.';
	$lang['strsearchpath'] = 'Schema search path';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reports';
	$lang['strshowallreports'] = 'Show all reports';
	$lang['strnoreports'] = 'No reports found.';
	$lang['strcreatereport'] = 'Create report';
	$lang['strreportdropped'] = 'Report dropped.';
	$lang['strreportdroppedbad'] = 'Report drop failed.';
	$lang['strconfdropreport'] = 'Are you sure you want to drop the report &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'You must give a name for your report.';
	$lang['strreportneedsdef'] = 'You must give SQL for your report.';
	$lang['strreportcreated'] = 'Report saved.';
	$lang['strreportcreatedbad'] = 'Failed to save report.';

	// Domains
	$lang['strdomain'] = 'Domain';
	$lang['strdomains'] = 'Domains';
	$lang['strshowalldomains'] = 'Show all domains';
	$lang['strnodomains'] = 'No domains found.';
	$lang['strcreatedomain'] = 'Create domain';
	$lang['strdomaindropped'] = 'Domain dropped.';
	$lang['strdomaindroppedbad'] = 'Domain drop failed.';
	$lang['strconfdropdomain'] = 'Are you sure you want to drop the domain &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'You must give a name for your domain.';
	$lang['strdomaincreated'] = 'Domain created.';
	$lang['strdomaincreatedbad'] = 'Domain creation failed.';	
	$lang['strdomainaltered'] = 'Domain altered.';
	$lang['strdomainalteredbad'] = 'Domain alteration failed.';	

	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operators';
	$lang['strshowalloperators'] = 'Show all operators';
	$lang['strnooperator'] = 'No operator found.';
	$lang['strnooperators'] = 'No operators found.';
	$lang['strcreateoperator'] = 'Create operator';
	$lang['strleftarg'] = 'Left Arg Type';
	$lang['strrightarg'] = 'Right Arg Type';
	$lang['strcommutator'] = 'Commutator';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Left sort';
	$lang['strrightsort'] = 'Right sort';
	$lang['strlessthan'] = 'Less than';
	$lang['strgreaterthan'] = 'Greater than';
	$lang['stroperatorneedsname'] = 'You must give a name for your operator.';
	$lang['stroperatorcreated'] = 'Operator created';
	$lang['stroperatorcreatedbad'] = 'Operator creation failed.';
	$lang['strconfdropoperator'] = 'Are you sure you want to drop the operator &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operator dropped.';
	$lang['stroperatordroppedbad'] = 'Operator drop failed.';

	// Casts
	$lang['strcasts'] = 'Casts';
	$lang['strnocasts'] = 'No casts found.';
	$lang['strsourcetype'] = 'Source type';
	$lang['strtargettype'] = 'Target type';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'In assignment';
	$lang['strbinarycompat'] = '(Binary compatible)';
	
	// Conversions
	$lang['strconversions'] = 'Conversions';
	$lang['strnoconversions'] = 'No conversions found.';
	$lang['strsourceencoding'] = 'Source encoding';
	$lang['strtargetencoding'] = 'Target encoding';
	
	// Languages
	$lang['strlanguages'] = 'Languages';
	$lang['strnolanguages'] = 'No languages found.';
	$lang['strtrusted'] = 'Trusted';
	
	// Info
	$lang['strnoinfo'] = 'No information available.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Parent tables';
	$lang['strchildtables'] = 'Child tables';

	// Aggregates
	$lang['straggregate'] = 'Aggregate';
	$lang['straggregates'] = 'Aggregates';
	$lang['strnoaggregates'] = 'No aggregates found.';
	$lang['stralltypes'] = '(All types)';
	$lang['straggrtransfn'] = 'Transition function';
	$lang['strcreateaggregate'] = 'Create aggregate';
	$lang['straggrbasetype'] = 'Input data type';
	$lang['straggrsfunc'] = 'State transition function';
	$lang['straggrstype'] = 'State data type';
	$lang['straggrffunc'] = 'Final function';
	$lang['straggrinitcond'] = 'Initial condition';
	$lang['straggrsortop'] = 'Sort operator';
	$lang['strdropaggregate'] = 'Drop aggregate';
	$lang['strconfdropaggregate'] = 'Are you sure you want to drop the aggregate &quot;%s&quot;?';
	$lang['straggregatedropped'] = 'Aggregate dropped.';
	$lang['straggregatedroppedbad'] = 'Aggregate drop failed.';
	$lang['stralteraggregate'] = 'Alter aggregate';
	$lang['straggraltered'] = 'Aggregate altered.';
	$lang['straggralteredbad'] = 'Aggregate alteration failed.';
	$lang['straggrneedsname'] = 'You must specify a name for the aggregate';
	$lang['straggrneedsbasetype'] = 'You must specify the input data type for the aggregate';
	$lang['straggrneedssfunc'] = 'You must specify the name of the state transition function for the aggregate';
	$lang['straggrneedsstype'] = 'You must specify the data type for the aggregate\'s state value';
	$lang['straggrcreated'] = 'Aggregate created.';
	$lang['straggrcreatedbad'] = 'Aggregate creation failed.';
	$lang['straggrshowall'] = 'Show all aggregates';

	// Operator Classes
	$lang['stropclasses'] = 'Op Classes';
	$lang['strnoopclasses'] = 'No operator classes found.';
	$lang['straccessmethod'] = 'Access method';

	// Stats and performance
	$lang['strrowperf'] = 'Row Performance';
	$lang['strioperf'] = 'I/O Performance';
	$lang['stridxrowperf'] = 'Index Row Performance';
	$lang['stridxioperf'] = 'Index I/O Performance';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequential';
	$lang['strscan'] = 'Scan';
	$lang['strread'] = 'Read';
	$lang['strfetch'] = 'Fetch';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = 'Rows';

	// Tablespaces
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespaces';
	$lang['strshowalltablespaces'] = 'Show all tablespaces';
	$lang['strnotablespaces'] = 'No tablespaces found.';
	$lang['strcreatetablespace'] = 'Create tablespace';
	$lang['strlocation'] = 'Location';
	$lang['strtablespaceneedsname'] = 'You must give a name for your tablespace.';
	$lang['strtablespaceneedsloc'] = 'You must give a directory in which to create the tablespace.';
	$lang['strtablespacecreated'] = 'Tablespace created.';
	$lang['strtablespacecreatedbad'] = 'Tablespace creation failed.';
	$lang['strconfdroptablespace'] = 'Are you sure you want to drop the tablespace &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Tablespace dropped.';
	$lang['strtablespacedroppedbad'] = 'Tablespace drop failed.';
	$lang['strtablespacealtered'] = 'Tablespace altered.';
	$lang['strtablespacealteredbad'] = 'Tablespace alteration failed.';

	// Slony clusters
	$lang['strcluster'] = 'Cluster';
	$lang['strnoclusters'] = 'No clusters found.';
	$lang['strconfdropcluster'] = 'Are you sure you want to drop cluster &quot;%s&quot;?';
	$lang['strclusterdropped'] = 'Cluster dropped.';
	$lang['strclusterdroppedbad'] = 'Cluster drop failed.';
	$lang['strinitcluster'] = 'Initialize cluster';
	$lang['strclustercreated'] = 'Cluster initialized.';
	$lang['strclustercreatedbad'] = 'Cluster initialization failed.';
	$lang['strclusterneedsname'] = 'You must give a name for the cluster.';
	$lang['strclusterneedsnodeid'] = 'You must give an ID for the local node.';
	
	// Slony nodes
	$lang['strnodes'] = 'Nodes';
	$lang['strnonodes'] = 'No nodes found.';
	$lang['strcreatenode'] = 'Create node';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Active';
	$lang['strnodecreated'] = 'Node created.';
	$lang['strnodecreatedbad'] = 'Node creation failed.';
	$lang['strconfdropnode'] = 'Are you sure you want to drop node &quot;%s&quot;?';
	$lang['strnodedropped'] = 'Node dropped.';
	$lang['strnodedroppedbad'] = 'Node drop failed';
	$lang['strfailover'] = 'Failover';
	$lang['strnodefailedover'] = 'Node failed over.';
	$lang['strnodefailedoverbad'] = 'Node failover failed.';
	$lang['strstatus'] = 'Status';	
	$lang['strhealthy'] = 'Healthy';
	$lang['stroutofsync'] = 'Out of Sync';
	$lang['strunknown'] = 'Unknown';	

	
	// Slony paths	
	$lang['strpaths'] = 'Paths';
	$lang['strnopaths'] = 'No paths found.';
	$lang['strcreatepath'] = 'Create path';
	$lang['strnodename'] = 'Node name';
	$lang['strnodeid'] = 'Node ID';
	$lang['strconninfo'] = 'Connection string';
	$lang['strconnretry'] = 'Seconds before retry to connect';
	$lang['strpathneedsconninfo'] = 'You must give a connection string for the path.';
	$lang['strpathneedsconnretry'] = 'You must give the number of seconds to wait before retry to connect.';
	$lang['strpathcreated'] = 'Path created.';
	$lang['strpathcreatedbad'] = 'Path creation failed.';
	$lang['strconfdroppath'] = 'Are you sure you want to drop path &quot;%s&quot;?';
	$lang['strpathdropped'] = 'Path dropped.';
	$lang['strpathdroppedbad'] = 'Path drop failed.';

	// Slony listens
	$lang['strlistens'] = 'Listens';
	$lang['strnolistens'] = 'No listens found.';
	$lang['strcreatelisten'] = 'Create listen';
	$lang['strlistencreated'] = 'Listen created.';
	$lang['strlistencreatedbad'] = 'Listen creation failed.';
	$lang['strconfdroplisten'] = 'Are you sure you want to drop listen &quot;%s&quot;?';
	$lang['strlistendropped'] = 'Listen dropped.';
	$lang['strlistendroppedbad'] = 'Listen drop failed.';

	// Slony replication sets
	$lang['strrepsets'] = 'Replication sets';
	$lang['strnorepsets'] = 'No replication sets found.';
	$lang['strcreaterepset'] = 'Create replication set';
	$lang['strrepsetcreated'] = 'Replication set created.';
	$lang['strrepsetcreatedbad'] = 'Replication set creation failed.';
	$lang['strconfdroprepset'] = 'Are you sure you want to drop replication set &quot;%s&quot;?';
	$lang['strrepsetdropped'] = 'Replication set dropped.';
	$lang['strrepsetdroppedbad'] = 'Replication set drop failed.';
	$lang['strmerge'] = 'Merge';
	$lang['strmergeinto'] = 'Merge into';
	$lang['strrepsetmerged'] = 'Replication sets merged.';
	$lang['strrepsetmergedbad'] = 'Replication sets merge failed.';
	$lang['strmove'] = 'Move';
	$lang['strneworigin'] = 'New origin';
	$lang['strrepsetmoved'] = 'Replication set moved.';
	$lang['strrepsetmovedbad'] = 'Replication set move failed.';
	$lang['strnewrepset'] = 'New replication set';
	$lang['strlock'] = 'Lock';
	$lang['strlocked'] = 'Locked';
	$lang['strunlock'] = 'Unlock';
	$lang['strconflockrepset'] = 'Are you sure you want to lock replication set &quot;%s&quot;?';
	$lang['strrepsetlocked'] = 'Replication set locked.';
	$lang['strrepsetlockedbad'] = 'Replication set lock failed.';
	$lang['strconfunlockrepset'] = 'Are you sure you want to unlock replication set &quot;%s&quot;?';
	$lang['strrepsetunlocked'] = 'Replication set unlocked.';
	$lang['strrepsetunlockedbad'] = 'Replication set unlock failed.';
	$lang['strexecute'] = 'Execute';
	$lang['stronlyonnode'] = 'Only on node';
	$lang['strddlscript'] = 'DDL script';
	$lang['strscriptneedsbody'] = 'You must supply a script to be executed on all nodes.';
	$lang['strscriptexecuted'] = 'Replication set DDL script executed.';
	$lang['strscriptexecutedbad'] = 'Failed executing replication set DDL script.';
	$lang['strtabletriggerstoretain'] = 'The following triggers will NOT be disabled by Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Add table';
	$lang['strtableneedsuniquekey'] = 'Table to be added requires a primary or unique key.';
	$lang['strtableaddedtorepset'] = 'Table added to replication set.';
	$lang['strtableaddedtorepsetbad'] = 'Failed adding table to replication set.';
	$lang['strconfremovetablefromrepset'] = 'Are you sure you want to drop the table &quot;%s&quot; from replication set &quot;%s&quot;?';
	$lang['strtableremovedfromrepset'] = 'Table dropped from replication set.';
	$lang['strtableremovedfromrepsetbad'] = 'Failed to drop table from replication set.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Add sequence';
	$lang['strsequenceaddedtorepset'] = 'Sequence added to replication set.';
	$lang['strsequenceaddedtorepsetbad'] = 'Failed adding sequence to replication set.';
	$lang['strconfremovesequencefromrepset'] = 'Are you sure you want to drop the sequence &quot;%s&quot; from replication set &quot;%s&quot;?';
	$lang['strsequenceremovedfromrepset'] = 'Sequence dropped from replication set.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Failed to drop sequence from replication set.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Subscriptions';
	$lang['strnosubscriptions'] = 'No subscriptions found.';

	// Miscellaneous
	$lang['strtopbar'] = '%s running on %s:%s -- You are logged in as user &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Help';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Help page browser';
	$lang['strselecthelppage'] = 'Select a help page';
	$lang['strinvalidhelppage'] = 'Invalid help page.';
	$lang['strlogintitle'] = 'Login to %s';
	$lang['strlogoutmsg'] = 'Logged out of %s';
	$lang['strloading'] = 'Loading...';
	$lang['strerrorloading'] = 'Error Loading';
	$lang['strclicktoreload'] = 'Click to reload';

	// Autovacuum
	$lang['strautovacuum'] = 'Autovacuum'; 
	$lang['strturnedon'] = 'Turned On'; 
	$lang['strturnedoff'] = 'Turned Off'; 
	$lang['strenabled'] = 'Enabled'; 
	$lang['strvacuumbasethreshold'] = 'Vacuum Base Threshold'; 
	$lang['strvacuumscalefactor'] = 'Vacuum Scale Factor';  
	$lang['stranalybasethreshold'] = 'Analyze Base Threshold';  
	$lang['stranalyzescalefactor'] = 'Analyze Scale Factor'; 
	$lang['strvacuumcostdelay'] = 'Vacuum Cost Delay'; 
	$lang['strvacuumcostlimit'] = 'Vacuum Cost Limit';  

        // Table-level Locks
	$lang['strlocks'] = 'Locks';
	$lang['strtransaction'] = 'Transaction ID';
	$lang['strprocessid'] = 'Process ID';
	$lang['strmode'] = 'Lock mode';
	$lang['strislockheld'] = 'Is lock held?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Prepared transactions';
	$lang['strxactid'] = 'Transaction ID';
	$lang['strgid'] = 'Global ID';
?>
