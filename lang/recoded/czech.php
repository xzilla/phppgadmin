<?php

	/**
	 * Ceska lokalizace phpPgAdmin-u.
	 * Zalozeno na slovenske lokalizaci. Thx.
	 *                                      libor(at)conet.cz
	 */

	// Language and character set
	$lang['applang'] = '&#268;esky';
	$lang['appcharset'] = 'windows-1250';
	$lang['applocale'] = 'cs_CZ';

	// Basic strings
	$lang['strintro'] = 'V&iacute;tejte v phpPgAdminu.';
	$lang['strlogin'] = 'P&#345;ihl&aacute;&scaron;en&iacute;';
	$lang['strloginfailed'] = 'P&#345;ihl&aacute;&scaron;en&iacute; selhalo';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Odhl&aacute;sit';
	$lang['strowner'] = 'Vlastn&iacute;k';
	$lang['straction'] = 'Akce';
	$lang['stractions'] = 'Akce';
	$lang['strname'] = 'Jm&eacute;no';
	$lang['strdefinition'] = 'Definice';
	$lang['stroperators'] = 'Oper&aacute;tory';
	$lang['straggregates'] = 'Agreg&aacute;ty';
	$lang['strproperties'] = 'Vlastnosti';
	$lang['strbrowse'] = 'P&#345;ehled';
	$lang['strdrop'] = 'Smazat';
	$lang['strdropped'] = 'Smazan&yacute;';
	$lang['strnull'] = 'Nulov&yacute;';
	$lang['strnotnull'] = 'Nenulov&yacute;';
	$lang['strprev'] = 'P&#345;edchoz&iacute;';
	$lang['strnext'] = 'Dal&scaron;&iacute;';
	$lang['strfailed'] = 'Selhalo';
	$lang['strcreate'] = 'Vytvo&#345;it';
	$lang['strcreated'] = 'Vytvo&#345;en&eacute;';
	$lang['strcomment'] = 'Koment&aacute;&#345;';
	$lang['strlength'] = 'D&eacute;lka';
	$lang['strdefault'] = 'P&#345;edvolen&eacute;';
	$lang['stralter'] = 'Zm&#283;nit';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Storno';
	$lang['strsave'] = 'Ulo&#382;it';
	$lang['strreset'] = 'Reset';
	$lang['strinsert'] = 'Vlo&#382;it';
	$lang['strselect'] = 'Vybrat';
	$lang['strdelete'] = 'Smazat';
	$lang['strupdate'] = 'Aktualizovat';
	$lang['strreferences'] = 'Reference';
	$lang['stryes'] = 'Yo';
	$lang['strno'] = 'Ne';
	$lang['stredit'] = 'Upravit';
	$lang['strcolumns'] = 'Sloupce';
	$lang['strrows'] = '&#344;&aacute;dky';
	$lang['strexample'] = 'nap&#345;.';
	$lang['strback'] = 'Zp&#283;t';
	$lang['strqueryresults'] = 'V&yacute;sledky dotazu';
	$lang['strshow'] = 'Uk&aacute;zat';
	$lang['strempty'] = 'Vypr&aacute;zdnit';
	$lang['strlanguage'] = 'Jazyk';
	$lang['strencoding'] = 'K&oacute;dovan&iacute;';
	$lang['strvalue'] = 'Hodnota';
	$lang['strunique'] = 'Unik&aacute;tn&iacute;';
	$lang['strprimary'] = 'Prim&aacute;rn&iacute;';
	$lang['strexport'] = 'Exportovat';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Vykonej';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyzovt&#357;';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Spustit';
	$lang['stradd'] = 'P&#345;idat';
	$lang['strevent'] = 'Ud&aacute;lost';
	$lang['strwhere'] = 'Kde';
	$lang['strinstead'] = 'Ud&#283;lat nam&iacute;sto';
	$lang['strwhen'] = 'Kdy&#382;';
	$lang['strformat'] = 'Form&aacute;t';

	// Error handling
	$lang['strnoframes'] = 'Tato aplikace vy&#382;aduje prohl&iacute;&#382;ec s podporou fram&#367;.';
	$lang['strbadconfig'] = 'Your config.inc.php is out of date. You will need to regenerate it from the new config.inc.php-dist.';
	$lang['strnotloaded'] = 'PHP nen&iacute; zakompilov&aacute;no s podporou PostgreSQL';
	$lang['strbadschema'] = 'Nastaveno &scaron;patn&eacute; sch&eacute;ma.';
	$lang['strbadencoding'] = 'Nastaven&iacute; k&oacute;dovan&iacute; v datab&aacute;ze selhalo.';
	$lang['strsqlerror'] = 'SQL chyba:';
	$lang['strinstatement'] = 'Ve v&yacute;razu:';
	$lang['strinvalidparam'] = 'Chybn&eacute; parametry skriptu.';
	$lang['strnodata'] = 'Nenalezeny &#382;&aacute;dn&eacute; z&aacute;znamy.';

	// Tables
	$lang['strtable'] = 'Tabulka';
	$lang['strtables'] = 'Tabulky';
	$lang['strshowalltables'] = 'Zobrazit v&scaron;echny tabulky';
	$lang['strnotables'] = 'Nenalezeny &#382;&aacute;dn&eacute; tabulky.';
	$lang['strnotable'] = 'Nenalezena &#382;&aacute;dn&aacute; tabulka.';
	$lang['strcreatetable'] = 'Vytvo&#345;it tabulku';
	$lang['strtablename'] = 'N&aacute;zev tabulky';
	$lang['strtableneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zov tabulky.';
	$lang['strtableneedsfield'] = 'Mus&iacute;&scaron; zadat aspo&#328; jedno pole.';
	$lang['strtableneedscols'] = 'Tables require a valid number of columns.';
	$lang['strtablecreated'] = 'Tabulka vytvo&#345;en&aacute;.';
	$lang['strtablecreatedbad'] = 'Tabulka nebola vytvo&#345;en&aacute;.';
	$lang['strconfdroptable'] = 'Opravdu chce&scaron; odstranit tabulku &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabulka odstran&#283;n&aacute;.';
	$lang['strtabledroppedbad'] = 'Tabulka nebyla odstran&#283;n&aacute;.';
	$lang['strconfemptytable'] = 'Opravdu chce&scaron; vypr&aacute;zdnit tabulku &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabulka vypr&aacute;zdn&#283;na.';
	$lang['strtableemptiedbad'] = 'Tabulka nebyla vypr&aacute;zdn&#283;na.';
	$lang['strinsertrow'] = 'Vlo&#382;it &#345;&aacute;dek';
	$lang['strrowinserted'] = '&#344;&aacute;dek vlo&#382;en.';
	$lang['strrowinsertedbad'] = '&#344;&aacute;dek nebyl vlo&#382;en.';
	$lang['streditrow'] = 'Upravit &#345;&aacute;dek';
	$lang['strrowupdated'] = '&#344;&aacute;dek upraven.';
	$lang['strrowupdatedbad'] = '&#344;&aacute;dek nebyl upraven.';
	$lang['strdeleterow'] = 'Smazat &#345;&aacute;dek';
	$lang['strconfdeleterow'] = 'Opravdu chce&scaron; smazat tento &#345;&aacute;dek?';
	$lang['strrowdeleted'] = '&#344;&aacute;dek smaz&aacute;n.';
	$lang['strrowdeletedbad'] = '&#344;&aacute;dek nebyl smaz&aacute;n.';
	$lang['strsaveandrepeat'] = 'Ulo&#382;it &amp; opakovat';
	$lang['strfield'] = 'Pole';
	$lang['strfields'] = 'Pole';
	$lang['strnumfields'] = 'Po&#269;et pol&iacute;';
	$lang['strfieldneedsname'] = 'Mus&iacute;&scaron; pomenovat pole';
	$lang['strselectneedscol'] = 'Mus&iacute;&scaron; vybrat aspo&#328; jeden stoupec';
	$lang['straltercolumn'] = 'Zm&#283;nit sloupec';
	$lang['strcolumnaltered'] = 'Sloupec zm&#283;n&#283;n&yacute;.';
	$lang['strcolumnalteredbad'] = 'Sloupec nebyl zm&#283;n&#283;n&yacute;.';
	$lang['strconfdropcolumn'] = 'Opravdu chce&scaron; smazat sloupec &quot;%s&quot; z tabulky &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Sloupec smaz&aacute;n.';
	$lang['strcolumndroppedbad'] = 'Sloupec nebyl smaz&aacute;n.';
	$lang['straddcolumn'] = 'P&#345;idat sloupec';
	$lang['strcolumnadded'] = 'Sloupec p&#345;idan&yacute;.';
	$lang['strcolumnaddedbad'] = 'Sloupec nebyl p&#345;idan&yacute;.';
	$lang['strschemaanddata'] = 'Sch&eacute;ma &amp; D&aacute;ta';
	$lang['strschemaonly'] = 'Jen Sch&eacute;ma';
	$lang['strdataonly'] = 'Jen D&aacute;ta';

	// Users
	$lang['struseradmin'] = 'Spr&aacute;va u&#382;ivatel&#367;';
	$lang['struser'] = 'U&#382;ivatel';
	$lang['strusers'] = 'U&#382;ivatel&eacute;';
	$lang['strusername'] = 'Jm&eacute;no u&#382;ivatele';
	$lang['strpassword'] = 'Heslo';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Vytv&aacute;&#345;et DB?';
	$lang['strexpires'] = 'Expiruje';
	$lang['strnousers'] = 'Nenalezen &#382;&aacute;dn&yacute; u&#382;ivatel.';
	$lang['struserupdated'] = 'U&#382;ivatel upraven.';
	$lang['struserupdatedbad'] = 'U&#382;ivatel nebyl upraven.';
	$lang['strshowallusers'] = 'Zobrazit v&scaron;echny u&#382;ivatele';
	$lang['strcreateuser'] = 'Vytvo&#345;it u&#382;ivatele';
	$lang['strusercreated'] = 'U&#382;&iacute;vatel vytvo&#345;en&yacute;.';
	$lang['strusercreatedbad'] = 'U&#382;&iacute;vatel nebyl vytvo&#345;en&yacute;.';
	$lang['strconfdropuser'] = 'Opravdu chce&scaron; smazat u&#382;ivatele &quot;%s&quot;?';
	$lang['struserdropped'] = 'U&#382;ivatel smaz&aacute;n.';
	$lang['struserdroppedbad'] = 'U&#382;ivatel nebyl smaz&aacute;n.';
		
	// Groups
	$lang['strgroupadmin'] = 'Spr&aacute;va skupin';
	$lang['strgroup'] = 'Skupina';
	$lang['strgroups'] = 'Skupiny';
	$lang['strnogroup'] = 'Skupina nenalezena.';
	$lang['strnogroups'] = 'Nebyly nalezeny &#382;&aacute;dn&eacute; skupiny.';
	$lang['strcreategroup'] = 'Vytvo&#345;it skupinu';
	$lang['strshowallgroups'] = 'Zobrazit v&scaron;echny skupiny';
	$lang['strgroupneedsname'] = 'Mus&iacute;&scaron; zadat jm&eacute;no skupiny.';
	$lang['strgroupcreated'] = 'Skupina vytvo&#345;en&aacute;.';
	$lang['strgroupcreatedbad'] = 'Skupina nebyla vytvo&#345;en&aacute;.';
	$lang['strconfdropgroup'] = 'Opravdu chce&scaron; smazat skupinu &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Skupina smaz&aacute;na.';
	$lang['strgroupdroppedbad'] = 'Skupina nebyla smaz&aacute;na.';
	$lang['strmembers'] = '&#268;lenov&eacute;';

	// Privileges
	$lang['strprivilege'] = 'Pr&aacute;vo';
	$lang['strprivileges'] = 'Pr&aacute;va';
	$lang['strnoprivileges'] = 'Tento objekt nem&aacute; pr&aacute;va.';
	$lang['strgrant'] = 'Povolit';
	$lang['strrevoke'] = 'Odobrat';
	$lang['strgranted'] = 'Pr&aacute;vo p&#345;idan&eacute;.';
	$lang['strgrantfailed'] = 'Pr&aacute;vo nebylo p&#345;idan&eacute;.';
	$lang['strgrantuser'] = 'Povolit u&#382;ivatele';
	$lang['strgrantgroup'] = 'Povolit skupinu';

	

	// Databases
	$lang['strdatabase'] = 'Datab&aacute;ze';
	$lang['strdatabases'] = 'Datab&aacute;ze';
	$lang['strshowalldatabases'] = 'Zobrazit v&scaron;echny datab&aacute;ze';
	$lang['strnodatabase'] = 'Nenalezena &#382;&aacute;dn&aacute; datab&aacute;ze.';
	$lang['strnodatabases'] = 'Nenalezena &#382;&aacute;dn&eacute; datab&aacute;ze.';
	$lang['strcreatedatabase'] = 'Vytvo&#345;it datab&aacute;zi';
	$lang['strdatabasename'] = 'N&aacute;zev datab&aacute;ze';
	$lang['strdatabaseneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev pro datab&aacute;zi.';
	$lang['strdatabasecreated'] = 'Datab&aacute;ze vytvo&#345;ena.';
	$lang['strdatabasecreatedbad'] = 'Datab&aacute;ze nebyla vytvo&#345;ena.';	
	$lang['strconfdropdatabase'] = 'Opravdu chce&scaron; smazat datab&aacute;zi &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Datab&aacute;ze smaz&aacute;na.';
	$lang['strdatabasedroppedbad'] = 'Datab&aacute;za nebyla smaz&aacute;na.';
	$lang['strentersql'] = 'Vlo&#382; SQL dotaz:';
	$lang['strvacuumgood'] = 'Vy&#269;i&scaron;t&#283;n&iacute; provedeno.';
	$lang['strvacuumbad'] = 'Vy&#269;i&scaron;t&#283;n&iacute; selhalo.';
	$lang['stranalyzegood'] = 'Anal&yacute;za provedena.';
	$lang['stranalyzebad'] = 'Anal&yacute;za selhala.';

	// Views
	$lang['strview'] = 'N&aacute;hled';
	$lang['strviews'] = 'N&aacute;hledy';
	$lang['strshowallviews'] = 'Zobrazit v&scaron;echny n&aacute;hledy';
	$lang['strnoview'] = 'Nenalezen &#382;&aacute;dn&yacute; n&aacute;hled.';
	$lang['strnoviews'] = 'Nenalezeny &#382;&aacute;dn&eacute; n&aacute;hledy.';
	$lang['strcreateview'] = 'Vytvo&#345;it n&aacute;hled';
	$lang['strviewname'] = 'N&aacute;zev n&aacute;hledu';
	$lang['strviewneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev n&aacute;hledu.';
	$lang['strviewneedsdef'] = 'Mus&iacute;&scaron; zadat definici n&aacute;hledu.';
	$lang['strviewcreated'] = 'N&aacute;hled vytvo&#345;en.';
	$lang['strviewcreatedbad'] = 'N&aacute;hled nebyl vytvo&#345;en.';
	$lang['strconfdropview'] = 'Opravdu chce&scaron; smazat n&aacute;hled &quot;%s&quot;?';
	$lang['strviewdropped'] = 'N&aacute;hled smaz&aacute;n.';
	$lang['strviewdroppedbad'] = 'N&aacute;hled nebyl smaz&aacute;n.';
	$lang['strviewupdated'] = 'N&aacute;hled upraven.';
	$lang['strviewupdatedbad'] = 'N&aacute;hled nebyl upraven.';

	// Sequences
	$lang['strsequence'] = 'Sekvence';
	$lang['strsequences'] = 'Sekvence';
	$lang['strshowallsequences'] = 'Zobrazit v&scaron;echny sekvence';
	$lang['strnosequence'] = '&#381;&aacute;dn&aacute; sekvence nenalezena.';
	$lang['strnosequences'] = '&#381;&aacute;dn&yacute; sekvence nenalezeny.';
	$lang['strcreatesequence'] = 'Vytvorit sekvenci';
	$lang['strlastvalue'] = 'Posledn&iacute; hodnota';
	$lang['strincrementby'] = 'Inkrementovat od';	
	$lang['strstartvalue'] = 'Po&#269;&aacute;te&#269;n&iacute; hodnota';
	$lang['strmaxvalue'] = 'Max hodnota';
	$lang['strminvalue'] = 'Min hodnota';
	$lang['strcachevalue'] = 'Cache hodnota';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Je cyklick&aacute;?';
	$lang['striscalled'] = 'Je called?';
	$lang['strsequenceneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev sekvence.';
	$lang['strsequencecreated'] = 'Sekvence vytvo&#345;ena.';
	$lang['strsequencecreatedbad'] = 'Sekvence nebyla vytvo&#345;ena.'; 
	$lang['strconfdropsequence'] = 'Opravdu chce&scaron; smazat sekvence &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sekvence smaz&aacute;na.';
	$lang['strsequencedroppedbad'] = 'Sekvence nebyla smaz&aacute;na.';

	// Indexes
	$lang['strindexes'] = 'Indexy';
	$lang['strindexname'] = 'N&aacute;zev indexu';
	$lang['strshowallindexes'] = 'Zobrazit v&scaron;echny indexy';
	$lang['strnoindex'] = 'Nenalezen &#382;&aacute;dn&yacute; index.';
	$lang['strnoindexes'] = 'Nenalezeny &#382;&aacute;dn&eacute; index.';
	$lang['strcreateindex'] = 'Vytvo&#345;it index';
	$lang['strindexname'] = 'N&aacute;zev indexu';
	$lang['strtabname'] = 'N&aacute;zev tabulky';
	$lang['strcolumnname'] = 'N&aacute;zov stoupce';
	$lang['strindexneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev indexu';
	$lang['strindexneedscols'] = 'Index vy&#382;aduje korektn&iacute; po&#269;et sloupc&#367;.';
	$lang['strindexcreated'] = 'Index vytvo&#345;en';
	$lang['strindexcreatedbad'] = 'Index nebyl vytvo&#345;en.';
	$lang['strconfdropindex'] = 'Opravdu chce&scaron; smazat index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index smaz&aacute;n.';
	$lang['strindexdroppedbad'] = 'Index nebyl smaz&aacute;n.';
	$lang['strkeyname'] = 'N&aacute;zev kl&iacute;&#269;e';
	$lang['struniquekey'] = 'Unik&aacute;tn&iacute; kl&iacute;&#269;';
	$lang['strprimarykey'] = 'Prim&aacute;rn&iacute; kl&iacute;&#269;';
 	$lang['strindextype'] = 'Typ indexu';
	$lang['strindexname'] = 'N&aacute;zev indexu';
	$lang['strtablecolumnlist'] = 'Sloupce v tabulce';
	$lang['strindexcolumnlist'] = 'Sloupce v indexu';

	// Rules
	$lang['strrules'] = 'Pravidla';
	$lang['strrule'] = 'Pravidlo';
	$lang['strshowallrules'] = 'Zobrazit v&scaron;echna pravidla';
	$lang['strnorule'] = 'Nenalezeno &#382;&aacute;dn&eacute; pravidlo.';
	$lang['strnorules'] = 'Nenalezeny &#382;&aacute;dn&aacute; pravidla.';
	$lang['strcreaterule'] = 'Vytvo&#345;it pravidlo';
	$lang['strrulename'] = 'N&aacute;zev pravidla';
	$lang['strruleneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev pravidla.';
	$lang['strrulecreated'] = 'Pravidlo vytvo&#345;eno.';
	$lang['strrulecreatedbad'] = 'Pravidlo nebylo vytvo&#345;eno.';
	$lang['strconfdroprule'] = 'Chce&scaron; opravdu smazat pravidlo &quot;%s&quot; na &quot;%s&quot;?';
	$lang['strruledropped'] = 'Pravidlo smaz&aacute;no.';
	$lang['strruledroppedbad'] = 'Pravidlo nebylo smaz&aacute;no.';

	// Constraints
	$lang['strconstraints'] = 'Omezen&iacute;';
	$lang['strshowallconstraints'] = 'Zobrazit v&scaron;echna omezen&iacute;';
	$lang['strnoconstraints'] = 'Nenalezeny &#382;&aacute;dn&eacute; omezen&iacute;.';
	$lang['strcreateconstraint'] = 'Vytvo&#345;it omezen&iacute;';
	$lang['strconstraintcreated'] = 'Omezen&iacute; vytvo&#345;eno.';
	$lang['strconstraintcreatedbad'] = 'Omezen&iacute; nebylo vytvo&#345;eno.';
	$lang['strconfdropconstraint'] = 'Chce&scaron; opravdu smazat omezen&iacute; &quot;%s&quot; na &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Omezen&iacute; smaz&aacute;no.';
	$lang['strconstraintdroppedbad'] = 'Omezen&iacute; nebylo smaz&aacute;no.';
	$lang['straddcheck'] = 'P&#345;idat kontrolu';
	$lang['strcheckneedsdefinition'] = 'Je nutn&eacute; kontrolu omezen&iacute; definovat.';
	$lang['strcheckadded'] = 'Kontrola omezen&iacute; p&#345;id&aacute;na.';
	$lang['strcheckaddedbad'] = 'Kontrola omezen&iacute; nebyla p&#345;id&aacute;na.';
	$lang['straddpk'] = 'P&#345;idat prim&aacute;rn&iacute; kl&iacute;&#269;';
	$lang['strpkneedscols'] = 'Prim&aacute;rn&iacute; kl&iacute;&#269; vy&#382;aduje alespo&#328; jeden sloupec.';
	$lang['strpkadded'] = 'Prim&aacute;rn&iacute; kl&iacute;&#269; p&#345;id&aacute;n.';
	$lang['strpkaddedbad'] = 'Prim&aacute;rn&iacute; kl&iacute;&#269; nebyl p&#345;id&aacute;n.';
	$lang['stradduniq'] = 'P&#345;idat unik&aacute;tn&iacute; kl&iacute;&#269;';
	$lang['struniqneedscols'] = 'Unik&aacute;tn&iacute; kl&iacute;&#269; vy&#382;aduje alespo&#328; jeden sloupec.';
	$lang['struniqadded'] = 'Unik&aacute;tn&iacute; kl&iacute;&#269; p&#345;id&aacute;n.';
	$lang['struniqaddedbad'] = 'Unik&aacute;tn&iacute; kl&iacute;&#269; nebyl p&#345;id&aacute;n.';
	$lang['straddfk'] = 'P&#345;idat ciz&iacute; kl&iacute;&#269;';
	$lang['strfkneedscols'] = 'Ciz&iacute; kl&iacute;&#269; vy&#382;aduje alespo&#328; jeden sloupec.';
	$lang['strfkadded'] = 'Ciz&iacute; kl&iacute;&#269; p&#345;id&aacute;n.';
	$lang['strfkaddedbad'] = 'Ciz&iacute; kl&iacute;&#269; nebyl p&#345;id&aacute;n.';
	$lang['strfktarget'] = 'C&iacute;lov&aacute; tabulka';

	// Functions
	$lang['strfunction'] = 'Funkce';
	$lang['strfunctions'] = 'Funkce';
	$lang['strshowallfunctions'] = 'Zobrazit v&scaron;echny funkce';
	$lang['strnofunction'] = 'Nenalezena &#382;&aacute;dn&aacute; funkce.';
	$lang['strnofunctions'] = 'Nenalezeny &#382;&aacute;dn&eacute; funkce.';
	$lang['strcreatefunction'] = 'Vytvo&#345;it funkci';
	$lang['strfunctionname'] = 'N&aacute;zev funkce';
	$lang['strreturns'] = 'Vrac&iacute;';
	$lang['strarguments'] = 'Argumenty';
	$lang['strproglanguage'] = 'Jazyk';
	$lang['strfunctionneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev funkce.';
	$lang['strfunctionneedsdef'] = 'Mus&iacute;&scaron; zadat definici funkce.';
	$lang['strfunctioncreated'] = 'Funkce vytvo&#345;ena.';
	$lang['strfunctioncreatedbad'] = 'Funkce nebyla vytvo&#345;ena.';
	$lang['strconfdropfunction'] = 'Opravdu chce&scaron; smazat funkci &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funkce smaz&aacute;na.';
	$lang['strfunctiondroppedbad'] = 'Funkce nebyla smaz&aacute;na.';
	$lang['strfunctionupdated'] = 'Funkce upravena.';
	$lang['strfunctionupdatedbad'] = 'Funkce nebyla upravena.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Zobrazit v&scaron;echny triggery';
	$lang['strnotrigger'] = 'Nenalezen &#382;&aacute;dn&yacute; trigger.';
	$lang['strnotriggers'] = 'Nenalezeny &#382;&aacute;dn&eacute; triggery.';
	$lang['strcreatetrigger'] = 'Vytvo&#345;it trigger';
	$lang['strtriggerneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev triggeru.';
	$lang['strtriggerneedsfunc'] = 'Mus&iacute;&scaron; zadat funkci triggeru.';
	$lang['strtriggercreated'] = 'Trigger vytvo&#345;en.';
	$lang['strtriggercreatedbad'] = 'Trigger nebyl vytvo&#345;en.';
	$lang['strconfdroptrigger'] = 'Chce&scaron; opravdu smazat trigger &quot;%s&quot; na &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger smaz&aacute;n.';
	$lang['strtriggerdroppedbad'] = 'Trigger nebyl smaz&aacute;n.';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Zobrazit v&scaron;echny typy';
	$lang['strnotype'] = 'Nenalezen&yacute; &#382;&aacute;dn&yacute; typ.';
	$lang['strnotypes'] = 'Nenalezeny &#382;&aacute;dn&eacute; typy.';
	$lang['strcreatetype'] = 'Vytvo&#345;it typ';
	$lang['strtypename'] = 'N&aacute;zev typu';
	$lang['strinputfn'] = 'Vstupn&iacute; funkce';
	$lang['stroutputfn'] = 'V&yacute;stupn&iacute; funkce';
	$lang['strpassbyval'] = 'Vol&aacute;n hodnotou?';
	$lang['stralignment'] = 'Zarovn&aacute;n&iacute;';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Odd&#283;lova&#269;';
	$lang['strstorage'] = 'Storage';
	$lang['strtypeneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev typu.';
	$lang['strtypeneedslen'] = 'Mus&iacute;&scaron; zadat d&eacute;lku typu.';
	$lang['strtypecreated'] = 'Typ vytvo&#345;en.';
	$lang['strtypecreatedbad'] = 'Typ nebyl vytvo&#345;en.';
	$lang['strconfdroptype'] = 'Chce&scaron; opravdu smazat typ &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Typ smaz&aacute;n.';
	$lang['strtypedroppedbad'] = 'Typ nebyl smaz&aacute;n.';

	// Schemas
	$lang['strschema'] = 'Sch&eacute;ma';
	$lang['strschemas'] = 'Sch&eacute;mata';
	$lang['strshowallschemas'] = 'Zobrazit v&scaron;echny sch&eacute;mata';
	$lang['strnoschema'] = 'Nenalezeno &#382;&aacute;dn&eacute; sch&eacute;ma.';
	$lang['strnoschemas'] = 'Nenalezeny &#382;&aacute;dn&eacute; sch&eacute;mata.';
	$lang['strcreateschema'] = 'Vytvorit sch&eacute;ma';
	$lang['strschemaname'] = 'N&aacute;zev sch&eacute;matu';
	$lang['strschemaneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev sch&eacute;matu.';
	$lang['strschemacreated'] = 'Sch&eacute;ma vytvo&#345;eno.';
	$lang['strschemacreatedbad'] = 'Sch&eacute;ma nebylo vytvo&#345;eno.';
	$lang['strconfdropschema'] = 'Chce&scaron; opravdu smazat sch&eacute;ma &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Sch&eacute;ma smaz&aacute;no.';
	$lang['strschemadroppedbad'] = 'Sch&eacute;ma nebylo smaz&aacute;no.';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reporty';
	$lang['strshowallreports'] = 'Zobrazit v&scaron;echny reporty';
	$lang['strnoreports'] = 'Nenalezeny &#382;&aacute;dn&eacute; reporty.';
	$lang['strcreatereport'] = 'Vytvo&#345;it report';
	$lang['strreportdropped'] = 'Report smaz&aacute;n.';
	$lang['strreportdroppedbad'] = 'Report nebyl smaz&aacute;n.';
	$lang['strconfdropreport'] = 'Opravdu chce&scaron; smazat report &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Mus&iacute;&scaron; zadat n&aacute;zev reportu.';
	$lang['strreportneedsdef'] = 'Mus&iacute;&scaron; zadat SQL dotaz pro report.';
	$lang['strreportcreated'] = 'Report ulo&#382;en.';
	$lang['strreportcreatedbad'] = 'Report nebyl ulo&#382;en.';

	// Miscellaneous
	$lang['strtopbar'] = '%s be&#382;&iacute; na %s:%s -- Jsi p&#345;ihl&aacute;&scaron;en&yacute; jako &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
