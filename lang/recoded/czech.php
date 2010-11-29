<?php

	/**
	 * Czech language file for phpPgAdmin. Based on Englis file.
	 * Translators: marek@manet.cz
	 *
	 * $Id: czech.php,v 1.232 2010/08/27 16:34:33 ioguix Exp $
	 */

	// Language and character set
	$lang['applang'] = '&#268;esky';
	$lang['appcharset'] = 'utf-8';
	$lang['applocale'] = 'cs_CZ';
	$lang['appdbencoding'] = 'UNICODE';
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'V&#237;tejte v phpPgAdmin.';
	$lang['strppahome'] = 'Domovsk&#225; str&#225;nka phpPgAdmin';
	$lang['strpgsqlhome'] = 'Domovsk&#225; str&#225;nka PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Lok&#225;ln&#237; dokumentace k PostgreSQL';
	$lang['strreportbug'] = 'Nahl&#225;sit chybu';
	$lang['strviewfaq'] = 'P&#345;e&#269;&#237;st si &#269;ast&#233; dotazy a odpov&#283;di';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'P&#345;ihl&#225;sit';
	$lang['strloginfailed'] = 'P&#345;ihl&#225;&#353;en&#237; se nezda&#345;ilo';
	$lang['strlogindisallowed'] = 'Z bezpe&#269;nostn&#237;ch d&#367;vod&#367; nen&#237; p&#345;ihl&#225;&#353;en&#237; povoleno.';
	$lang['strserver'] = 'Server';
	$lang['strservers'] = 'Servery';
	$lang['strgroupservers'] = 'Servery ve skupin&#283; &#8222;%s&#8220;';
	$lang['strallservers'] = 'V&#353;echny servery';
	$lang['strintroduction'] = '&#218;vodn&#237; str&#225;nka';
	$lang['strhost'] = 'Hostitel';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'Odhl&#225;sit';
	$lang['strowner'] = 'Vlastn&#237;k';
	$lang['straction'] = 'Akce';
	$lang['stractions'] = 'Akce';
	$lang['strname'] = 'N&#225;zev';
	$lang['strdefinition'] = 'Definice';
	$lang['strproperties'] = 'Vlastnosti';
	$lang['strbrowse'] = 'Proch&#225;zet';
	$lang['strenable'] = 'Povolit';
	$lang['strdisable'] = 'Zak&#225;zat';
	$lang['strdrop'] = 'Odstranit';
	$lang['strdropped'] = 'Odstran&#283;no';
	$lang['strnull'] = 'Pr&#225;zdn&#253;';
	$lang['strnotnull'] = 'Nepr&#225;zdn&#253;';
	$lang['strprev'] = '&lt; P&#345;edchoz&#237;';
	$lang['strnext'] = 'N&#225;sleduj&#237;c&#237; &gt;';
	$lang['strfirst'] = '&lt;&lt; Prvn&#237;';
	$lang['strlast'] = 'Posledn&#237; &gt;&gt;';
	$lang['strfailed'] = 'Nezda&#345;ilo se';
	$lang['strcreate'] = 'Vytvo&#345;it';
	$lang['strcreated'] = 'Vytvo&#345;eno';
	$lang['strcomment'] = 'Koment&#225;&#345;';
	$lang['strlength'] = 'D&#233;lka';
	$lang['strdefault'] = 'V&#253;choz&#237;';
	$lang['stralter'] = 'Zm&#283;nit';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Storno';
	$lang['strkill'] = 'Zab&#237;t';
	$lang['strac'] = 'Povolit automatick&#233; dokon&#269;en&#237;';
	$lang['strsave'] = 'Ulo&#382;it';
	$lang['strreset'] = 'Resetovat';
	$lang['strrestart'] = 'Restartovat';
	$lang['strinsert'] = 'Vlo&#382;it';
	$lang['strselect'] = 'Vybrat';
	$lang['strdelete'] = 'Smazat';
	$lang['strupdate'] = 'Aktualizovat';
	$lang['strreferences'] = 'Odkazy';
	$lang['stryes'] = 'Ano';
	$lang['strno'] = 'Ne';
	$lang['strtrue'] = 'PRAVDA';
	$lang['strfalse'] = 'NEPRAVDA';
	$lang['stredit'] = 'Upravit';
	$lang['strcolumn'] = 'Sloupec';
	$lang['strcolumns'] = 'Sloupce';
	$lang['strrows'] = '&#345;&#225;dk&#367;';
	$lang['strrowsaff'] = '&#345;&#225;dk&#367; zm&#283;n&#283;no.';
	$lang['strobjects'] = 'objekt&#367;';
	$lang['strback'] = 'Zp&#283;t';
	$lang['strqueryresults'] = 'V&#253;sledky dotazu';
	$lang['strshow'] = 'Zobrazit';
	$lang['strempty'] = 'Vypr&#225;zdnit';
	$lang['strlanguage'] = 'Jazyk';
	$lang['strencoding'] = 'K&#243;dov&#225;n&#237;';
	$lang['strvalue'] = 'Hodnota';
	$lang['strunique'] = 'Jedine&#269;n&#253;';
	$lang['strprimary'] = 'Prim&#225;rn&#237;';
	$lang['strexport'] = 'Export';
	$lang['strimport'] = 'Import';
	$lang['strallowednulls'] = 'Povolen&#233; nulov&#233; znaky';
	$lang['strbackslashn'] = '\n';
	$lang['stremptystring'] = 'Pr&#225;zdn&#233; &#345;et&#283;zce/pole';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Spr&#225;va';
	$lang['strvacuum'] = 'Uklidit';
	$lang['stranalyze'] = 'Analyzovat';
	$lang['strclusterindex'] = 'P&#345;eskupit';
	$lang['strclustered'] = 'P&#345;eskupeno?';
	$lang['strreindex'] = 'P&#345;eindexovat';
	$lang['strexecute'] = 'Prov&#233;st';
	$lang['stradd'] = 'P&#345;idat';
	$lang['strevent'] = 'Ud&#225;lost';
	$lang['strwhere'] = 'Kde';
	$lang['strinstead'] = 'M&#237;sto p&#367;vodn&#237;ho';
	$lang['strwhen'] = 'Kdy';
	$lang['strformat'] = 'Form&#225;t';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Potvrzen&#237;';
	$lang['strexpression'] = 'V&#253;raz';
	$lang['strellipsis'] = '&#8230;';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Rozbalit';
	$lang['strcollapse'] = 'Sbalit';
	$lang['strfind'] = 'Hledat';
	$lang['stroptions'] = 'Volby';
	$lang['strrefresh'] = 'Ob&#269;erstvit';
	$lang['strdownload'] = 'St&#225;hnout';
	$lang['strdownloadgzipped'] = 'St&#225;hnout komprimovan&#233; pomoc&#237; gzip';
	$lang['strinfo'] = 'Informace';
	$lang['stroids'] = 'OID';
	$lang['stradvanced'] = 'Pokro&#269;il&#233;';
	$lang['strvariables'] = 'Prom&#283;nn&#233;';
	$lang['strprocess'] = 'Proces';
	$lang['strprocesses'] = 'Procesy';
	$lang['strsetting'] = 'Nastaven&#237;';
	$lang['streditsql'] = 'Upravit SQL';
	$lang['strruntime'] = 'Celkov&#225; doba b&#283;hu: %s ms';
	$lang['strpaginate'] = 'Str&#225;nkovat v&#253;sledky';
	$lang['struploadscript'] = 'nebo nahrajte skript SQL:';
	$lang['strstarttime'] = '&#268;as spu&#353;t&#283;n&#237;';
	$lang['strfile'] = 'Soubor';
	$lang['strfileimported'] = 'Soubor byl importov&#225;n.';
	$lang['strtrycred'] = 'Pou&#382;&#237;t tato prov&#283;&#345;en&#237; pro v&#353;echny servery';
	$lang['strconfdropcred'] = 'Odpojen&#237;m se z bezpe&#269;nostn&#237;ch d&#367;vod&#367; sma&#382;ou va&#353;e sd&#237;len&#233; p&#345;ipojovac&#237; informace. Opravdu se chcete odpojit?';
	$lang['stractionsonmultiplelines'] = 'Akce pro v&#237;c &#345;&#225;dk&#367;';
	$lang['strselectall'] = 'Vybrat v&#353;e';
	$lang['strunselectall'] = 'Zru&#353;it v&#253;b&#283;r';
	$lang['strlocale'] = 'M&#237;stn&#237; nastaven&#237;';
	$lang['strcollation'] = '&#344;azen&#237;';
	$lang['strctype'] = 'Typ znaku';
	$lang['strdefaultvalues'] = 'V&#253;choz&#237; hodnoty';
	$lang['strnewvalues'] = 'Nov&#233; hodnoty';
	$lang['strstart'] = 'Spustit';
	$lang['strstop'] = 'Zastavit';
	$lang['strgotoppage'] = 'zp&#283;t nahoru';
	$lang['strtheme'] = 'Motiv';
	
	// Admin
	$lang['stradminondatabase'] = 'N&#225;sleduj&#237;c&#237; &#250;lohy spr&#225;vy pou&#382;&#237;t na celou datab&#225;zi %s.';
	$lang['stradminontable'] = 'N&#225;sleduj&#237;c&#237; &#250;lohy spr&#225;vy pou&#382;&#237;t na tabulku %s.';
	
	// User-supplied SQL history
	$lang['strhistory'] = 'Historie';
	$lang['strnohistory'] = 'Bez historie.';
	$lang['strclearhistory'] = 'Smazat historii';
	$lang['strdelhistory'] = 'Odebrat z historie';
	$lang['strconfdelhistory'] = 'Opravdu tento po&#382;adavek odebrat z historie?';
	$lang['strconfclearhistory'] = 'Skute&#269;n&#283; smazat historii?';
	$lang['strnodatabaseselected'] = 'Zvolte pros&#237;m datab&#225;zi.';

	// Database sizes
	$lang['strnoaccess'] = 'Bez p&#345;&#237;stupu'; 
	$lang['strsize'] = 'Velikost';
	$lang['strbytes'] = 'B';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'Tato aplikace pracuje nejl&#233;pe, pokud jsou v prohl&#237;&#382;e&#269;i povolen&#233; r&#225;my. M&#367;&#382;e ale pracovat i bez r&#225;m&#367;, sta&#269;&#237; kliknout na n&#225;sleduj&#237;c&#237; odkaz.';
	$lang['strnoframeslink'] = 'Pou&#382;&#237;t bez r&#225;m&#367;';
	$lang['strbadconfig'] = 'V&#225;&#353; config.inc.php je zastaral&#253;. Pot&#345;ebujete jej vygenerovat znovu z nov&#233;ho config.inc.php-dist.';
	$lang['strnotloaded'] = 'Va&#353;e instalace PHP nepodporuje PostgreSQL. Pot&#345;ebujete znovu p&#345;elo&#382;it PHP s pou&#382;it&#237;m volby --with-pgsql.';
	$lang['strpostgresqlversionnotsupported'] = 'Verze PostgreSQL nen&#237; podporovan&#225;. P&#345;ejd&#283;te pros&#237;m na verzi %s nebo nov&#283;j&#353;&#237;.';
	$lang['strbadschema'] = 'Zad&#225;no neplatn&#233; sch&#233;ma.';
	$lang['strbadencoding'] = 'Nezda&#345;ilo se nastavit k&#243;dov&#225;n&#237; klienta v datab&#225;zi.';
	$lang['strsqlerror'] = 'Chyba SQL:';
	$lang['strinstatement'] = 'Ve v&#253;razu:';
	$lang['strinvalidparam'] = 'Neplatn&#233; parametry skriptu.';
	$lang['strnodata'] = 'Nenalezen &#382;&#225;dn&#253; &#345;&#225;dek.';
	$lang['strnoobjects'] = 'Nenalezen &#382;&#225;dn&#253; objekt.';
	$lang['strrownotunique'] = 'Pro tento &#345;&#225;dek neexistuje jedine&#269;n&#253; identifik&#225;tor.';
	$lang['strnoreportsdb'] = 'Nem&#225;te vytvo&#345;enou datab&#225;zi v&#253;stupn&#237;ch sestav. P&#345;e&#269;t&#283;te si soubor INSTALL s instrukcemi.';
	$lang['strnouploads'] = 'Je zak&#225;zan&#233; nahr&#225;v&#225;n&#237; soubor&#367;.';
	$lang['strimporterror'] = 'Chyba p&#345;i importu.';
	$lang['strimporterror-fileformat'] = 'Chyba p&#345;i importu: Nezda&#345;ilo se automaticky zjistit form&#225;t souboru.';
	$lang['strimporterrorline'] = 'Chyba p&#345;i importu na &#345;&#225;dku %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Chyba p&#345;i importu na &#345;&#225;dku %s: &#344;&#225;dek nem&#225; spr&#225;vn&#253; po&#269;et sloupc&#367;.';
	$lang['strimporterror-uploadedfile'] = 'Chyba p&#345;i importu: Soubor nelze nahr&#225;t na server';
	$lang['strcannotdumponwindows'] = 'Ve Windows nen&#237; podporovan&#253; v&#253;pis n&#225;zv&#367; komplexn&#237;ch tabulek a sch&#233;mat.';
	$lang['strinvalidserverparam'] = 'Pokus o p&#345;ipojen&#237; s neplatn&#253;mi parametry serveru, mo&#382;n&#225; se n&#283;kdo sna&#382;&#237; neopr&#225;vn&#283;n&#283; napojit do va&#353;eho syst&#233;mu.'; 
	$lang['strnoserversupplied'] = 'Nen&#237; nab&#237;zen &#382;&#225;dn&#253; server!';
	$lang['strbadpgdumppath'] = 'Chyba p&#345;i exportu: Nezda&#345;ilo se spustit pg_dump (s cestou danou ve va&#353;em conf/config.inc.php: %s). Opravte pros&#237;m cestu ve sv&#233;m nastaven&#237; a zkuste to znovu.';
	$lang['strbadpgdumpallpath'] = 'Chyba p&#345;i exportu: Nezda&#345;ilo se spustit pg_dumpall (s cestou danou ve va&#353;em conf/config.inc.php: %s). Opravte pros&#237;m cestu ve sv&#233;m nastaven&#237; a zkuste to znovu.';
	$lang['strconnectionfail'] = 'Nelze se p&#345;ipojit k serveru.';

	// Tables
	$lang['strtable'] = 'Tabulka';
	$lang['strtables'] = 'Tabulky';
	$lang['strshowalltables'] = 'Zobrazit v&#353;echny tabulky';
	$lang['strnotables'] = 'Nenalezeny &#382;&#225;dn&#233; tabulky.';
	$lang['strnotable'] = 'Nenalezena &#382;&#225;dn&#225; tabulka.';
	$lang['strcreatetable'] = 'Vytvo&#345;it tabulku';
	$lang['strcreatetablelike'] = 'Vytvo&#345;it tabulku podle';
	$lang['strcreatetablelikeparent'] = 'Zdrojov&#225; tabulka';
	$lang['strcreatelikewithdefaults'] = 'V&#269;etn&#283; v&#253;choz&#237;ch';
	$lang['strcreatelikewithconstraints'] = 'V&#269;etn&#283; omezen&#237;';
	$lang['strcreatelikewithindexes'] = 'V&#269;etn&#283; index&#367;';
	$lang['strtablename'] = 'N&#225;zev tabulky';
	$lang['strtableneedsname'] = 'Mus&#237;te zadat n&#225;zev pro tabulku.';
	$lang['strtablelikeneedslike'] = 'Mus&#237;te zvolit, z kter&#233; tabulky se budou vlastnosti kop&#237;rovat.';
	$lang['strtableneedsfield'] = 'Mus&#237;te zadat nejm&#233;n&#283; jedno pole.';
	$lang['strtableneedscols'] = 'Mus&#237;te zadat platn&#253; po&#269;et sloupc&#367;.';
	$lang['strtablecreated'] = 'Tabulka byla vytvo&#345;ena.';
	$lang['strtablecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it tabulku.';
	$lang['strconfdroptable'] = 'Opravdu chcete odstranit tabulku &#8222;%s&#8220;?';
	$lang['strtabledropped'] = 'Tabulka byla odstran&#283;na.';
	$lang['strtabledroppedbad'] = 'Nezda&#345;ilo se odstranit tabulku.';
	$lang['strconfemptytable'] = 'Opravdu chcete vypr&#225;zdnit tabulku &#8222;%s&#8220;?';
	$lang['strtableemptied'] = 'Tabulka byla vypr&#225;zdn&#283;na.';
	$lang['strtableemptiedbad'] = 'Nezda&#345;ilo se vypr&#225;zdnit tabulku.';
	$lang['strinsertrow'] = 'Vlo&#382;it &#345;&#225;dek';
	$lang['strrowinserted'] = '&#344;&#225;dek byl vlo&#382;en.';
	$lang['strrowinsertedbad'] = 'Nezda&#345;ilo se vlo&#382;it &#345;&#225;dek.';
	$lang['strnofkref'] = 'Ciz&#237;mu kl&#237;&#269;i %s neodpov&#237;d&#225; &#382;&#225;dn&#225; hodnota.';
	$lang['strrowduplicate'] = 'Nezda&#345;ilo se vlo&#382;en&#237; &#345;&#225;dku, pokus o duplicitn&#237; vlo&#382;en&#237;.';
	$lang['streditrow'] = 'Upravit &#345;&#225;dek';
	$lang['strrowupdated'] = '&#344;&#225;dek byl aktualizov&#225;n.';
	$lang['strrowupdatedbad'] = 'Nezda&#345;ilo se aktualizovat &#345;&#225;dek.';
	$lang['strdeleterow'] = 'Smazat &#345;&#225;dek';
	$lang['strconfdeleterow'] = 'Opravdu chcete smazat tento &#345;&#225;dek?';
	$lang['strrowdeleted'] = '&#344;&#225;dek byl smaz&#225;n.';
	$lang['strrowdeletedbad'] = 'Nezda&#345;ilo se smazat &#345;&#225;dek.';
	$lang['strinsertandrepeat'] = 'Vlo&#382;i a opakovat';
	$lang['strnumcols'] = 'Po&#269;et sloupc&#367;';
	$lang['strcolneedsname'] = 'Mus&#237;te zadat n&#225;zev pro sloupec';
	$lang['strselectallfields'] = 'Vybrat v&#353;echna pole';
	$lang['strselectneedscol'] = 'Mus&#237;te zvolit alespo&#328; jeden sloupec, kter&#253; se m&#225; zobrazit.';
	$lang['strselectunary'] = 'Un&#225;rn&#237; oper&#225;tory nemohou m&#237;t hodnoty.';
	$lang['strcolumnaltered'] = 'Zm&#283;ny v sloupci byly provedeny.';
	$lang['strcolumnalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v sloupci.';
	$lang['strconfdropcolumn'] = 'Opravdu chcete odstranit sloupec &#8222;%s&#8220; z tabulky &#8222;%s&#8220;?';
	$lang['strcolumndropped'] = 'Sloupec byl odstran&#283;n.';
	$lang['strcolumndroppedbad'] = 'Nezda&#345;ilo se odstranit sloupec.';
	$lang['straddcolumn'] = 'P&#345;idat sloupec';
	$lang['strcolumnadded'] = 'Sloupec byl p&#345;id&#225;n.';
	$lang['strcolumnaddedbad'] = 'Nezda&#345;ilo se p&#345;idat sloupec.';
	$lang['strcascade'] = 'Kask&#225;dovit&#283;';
	$lang['strtablealtered'] = 'Zm&#283;ny v tabulce byly provedeny.';
	$lang['strtablealteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v tabulce.';
	$lang['strdataonly'] = 'Pouze data';
	$lang['strstructureonly'] = 'Pouze strukturu';
	$lang['strstructureanddata'] = 'Strukturu a data';
	$lang['strtabbed'] = 'S tabul&#225;tory';
	$lang['strauto'] = 'Automaticky';
	$lang['strconfvacuumtable'] = 'Opravdu chcete prov&#233;st &#250;klid &#8222;%s&#8220;?';
	$lang['strconfanalyzetable'] = 'Opravdu chcete analyzovat &#8222;%s&#8220;?';
	$lang['strconfreindextable'] = 'Opravdu chcete p&#345;eindexovat &#8222;%s&#8220;?';
	$lang['strconfclustertable'] = 'Opravdu chcete p&#345;eskupit &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Odhadnut&#253; po&#269;et &#345;&#225;dk&#367;';
	$lang['strspecifytabletoanalyze'] = 'Pokud chcete analyzovat tabulky, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strspecifytabletoempty'] = 'Pokud chcete vypr&#225;zdnit tabulky, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strspecifytabletodrop'] = 'Pokud chcete odstranit tabulky, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strspecifytabletovacuum'] = 'Pokud chcete prov&#233;st &#250;klid tabulek, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strspecifytabletoreindex'] = 'Pokud chcete p&#345;eindexovat tabulku, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strspecifytabletocluster'] = 'Pokud chcete p&#345;eskupit tabulku, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strnofieldsforinsert'] = 'Nem&#367;&#382;ete vlo&#382;it &#345;&#225;dek do tabulky, kter&#225; nem&#225; &#382;&#225;dn&#233; sloupce.';

	// Columns
	$lang['strcolprop'] = 'Vlastnosti sloupce';
	$lang['strnotableprovided'] = 'Nen&#237; k dispozici &#382;&#225;dn&#225; tabulka!';
		
	// Users
	$lang['struser'] = 'U&#382;ivatel';
	$lang['strusers'] = 'U&#382;ivatel&#233;';
	$lang['strusername'] = 'Jm&#233;no u&#382;ivatele';
	$lang['strpassword'] = 'Heslo';
	$lang['strsuper'] = 'Superu&#382;ivatel?';
	$lang['strcreatedb'] = 'Vytv&#225;&#345;et DB?';
	$lang['strexpires'] = 'Ztrat&#237; platnost';
	$lang['strsessiondefaults'] = 'V&#253;choz&#237; hodnoty sezen&#237;';
	$lang['strnousers'] = 'Nenalezeni &#382;&#225;dn&#237; u&#382;ivatel&#233;.';
	$lang['struserupdated'] = 'U&#382;ivatel byl aktualizov&#225;n';
	$lang['struserupdatedbad'] = 'Nezda&#345;ilo se aktualizovat u&#382;ivatele.';
	$lang['strshowallusers'] = 'Zobrazit v&#353;echny u&#382;ivatele';
	$lang['strcreateuser'] = 'Vytvo&#345;it u&#382;ivatele';
	$lang['struserneedsname'] = 'Mus&#237;te zadat jm&#233;no u&#382;ivatele.';
	$lang['strusercreated'] = 'U&#382;ivatel byl vytvo&#345;en.';
	$lang['strusercreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it u&#382;ivatele.';
	$lang['strconfdropuser'] = 'Opravdu chcete odstranit u&#382;ivatele &#8222;%s&#8220;?';
	$lang['struserdropped'] = 'U&#382;ivatel byl odstran&#283;n.';
	$lang['struserdroppedbad'] = 'Nezda&#345;ilo se odstranit u&#382;ivatele.';
	$lang['straccount'] = '&#218;&#269;et';
	$lang['strchangepassword'] = 'Zm&#283;nit heslo';
	$lang['strpasswordchanged'] = 'Heslo bylo zm&#283;n&#283;no.';
	$lang['strpasswordchangedbad'] = 'Nezda&#345;ilo se zm&#283;nit heslo.';
	$lang['strpasswordshort'] = 'Heslo je p&#345;&#237;li&#353; kr&#225;tk&#233;.';
	$lang['strpasswordconfirm'] = 'Heslo a jeho potvrzen&#237; nejsou shodn&#233;.';
	
	// Groups
	$lang['strgroup'] = 'Skupina';
	$lang['strgroups'] = 'Skupiny';
	$lang['strshowallgroups'] = 'Zobrazit v&#353;echny skupiny';
	$lang['strnogroup'] = 'Skupina nebyla nalezena.';
	$lang['strnogroups'] = 'Nebyly nalezeny &#382;&#225;dn&#233; skupiny.';
	$lang['strcreategroup'] = 'Vytvo&#345;it skupinu';
	$lang['strgroupneedsname'] = 'Mus&#237;te zadat n&#225;zev pro skupinu.';
	$lang['strgroupcreated'] = 'Skupina byly vytvo&#345;ena.';
	$lang['strgroupcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it skupinu.';	
	$lang['strconfdropgroup'] = 'Opravdu chcete odstranit skupinu &#8222;%s&#8220;?';
	$lang['strgroupdropped'] = 'Skupiny byla odstran&#283;na.';
	$lang['strgroupdroppedbad'] = 'Nezda&#345;ilo se odstranit skupinu.';
	$lang['strmembers'] = '&#268;lenov&#233;';
	$lang['strmemberof'] = '&#268;lenem v';
	$lang['stradminmembers'] = '&#268;lenov&#233; spr&#225;vci';
	$lang['straddmember'] = 'P&#345;idat &#269;lena';
	$lang['strmemberadded'] = '&#268;len byl p&#345;id&#225;n.';
	$lang['strmemberaddedbad'] = 'Nezda&#345;ilo se p&#345;idat &#269;lena.';
	$lang['strdropmember'] = 'Odebrat &#269;lena';
	$lang['strconfdropmember'] = 'Opravdu chcete odebrat &#269;lena &#8222;%s&#8220; ze skupiny &#8222;%s&#8220;?';
	$lang['strmemberdropped'] = '&#268;len byl odebr&#225;n.';
	$lang['strmemberdroppedbad'] = 'Nezda&#345;ilo se odebrat &#269;lena.';

	// Roles
	$lang['strrole'] = 'Role';
	$lang['strroles'] = 'Role';
	$lang['strshowallroles'] = 'Zobrazit v&#353;echny role';
	$lang['strnoroles'] = 'Nenalezena &#382;&#225;dn&#225; role.';
	$lang['strinheritsprivs'] = 'D&#283;dit opr&#225;vn&#283;n&#237;?';
	$lang['strcreaterole'] = 'Vytvo&#345;it roli';
	$lang['strcancreaterole'] = 'Vytv&#225;&#345;et role?';
	$lang['strrolecreated'] = 'Role byl vytvo&#345;ena.';
	$lang['strrolecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it roli.';
	$lang['strrolealtered'] = 'Zm&#283;ny v roli byly provedeny.';
	$lang['strrolealteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v roli.';
	$lang['strcanlogin'] = 'P&#345;ihla&#353;ovat se?';
	$lang['strconnlimit'] = 'Omezen&#237; p&#345;ipojen&#237;';
	$lang['strdroprole'] = 'Odstranit roli';
	$lang['strconfdroprole'] = 'Opravdu chcete odstranit roli &#8222;%s&#8220;?';
	$lang['strroledropped'] = 'Role byla odstran&#283;na.';
	$lang['strroledroppedbad'] = 'Nezda&#345;ilo se odstranit roli.';
	$lang['strnolimit'] = 'Bez omezen&#237;';
	$lang['strnever'] = 'Nikdy';
	$lang['strroleneedsname'] = 'Mus&#237;te zadat n&#225;zev pro roli.';

	// Privileges
	$lang['strprivilege'] = 'Opr&#225;vn&#283;n&#237;';
	$lang['strprivileges'] = 'Opr&#225;vn&#283;n&#237;';
	$lang['strnoprivileges'] = 'Tento objekt m&#225; opr&#225;vn&#283;n&#237; v&#253;choz&#237;ho vlastn&#237;ka.';
	$lang['strgrant'] = 'P&#345;id&#283;lit';
	$lang['strrevoke'] = 'Odep&#345;&#237;t';
	$lang['strgranted'] = 'Opr&#225;vn&#283;n&#237; byla zm&#283;n&#283;na.';
	$lang['strgrantfailed'] = 'Nezda&#345;ilo se zm&#283;nit opr&#225;vn&#283;n&#237;.';
	$lang['strgrantbad'] = 'Mus&#237;te zvolit nejm&#233;n&#283; jednoho u&#382;ivatele nebo skupinu a nejm&#233;n&#283; jedno opr&#225;vn&#283;n&#237;.';
	$lang['strgrantor'] = 'P&#345;id&#283;lil';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Datab&#225;ze';
	$lang['strdatabases'] = 'Datab&#225;ze';
	$lang['strshowalldatabases'] = 'Zobrazit v&#353;echny datab&#225;ze';
	$lang['strnodatabases'] = '&#381;&#225;dn&#233; datab&#225;ze nenalezeny.';
	$lang['strcreatedatabase'] = 'Vytvo&#345;it datab&#225;zi';
	$lang['strdatabasename'] = 'N&#225;zev datab&#225;ze';
	$lang['strdatabaseneedsname'] = 'Mus&#237;te zadat n&#225;zev pro datab&#225;zi.';
	$lang['strdatabasecreated'] = 'Datab&#225;ze byla vytvo&#345;ena.';
	$lang['strdatabasecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it datab&#225;zi.';
	$lang['strconfdropdatabase'] = 'Opravdu chcete odstranit datab&#225;zi &#8222;%s&#8220;?';
	$lang['strdatabasedropped'] = 'Datab&#225;ze byla odstran&#283;na.';
	$lang['strdatabasedroppedbad'] = 'Nezda&#345;ilo se odstranit datab&#225;zi.';
	$lang['strentersql'] = 'Zadejte dotaz SQL, kter&#253; chcete prov&#233;st:';
	$lang['strsqlexecuted'] = 'Dotaz SQL byl proveden.';
	$lang['strvacuumgood'] = '&#218;klid byl dokon&#269;en.';
	$lang['strvacuumbad'] = '&#218;klid se nezda&#345;il.';
	$lang['stranalyzegood'] = 'Anal&#253;za byla dokon&#269;ena.';
	$lang['stranalyzebad'] = 'Anal&#253;za se nezda&#345;ila.';
	$lang['strreindexgood'] = 'P&#345;eindexace byla dokon&#269;ena.';
	$lang['strreindexbad'] = 'P&#345;eindexace se nezda&#345;ila.';
	$lang['strfull'] = '&#218;pln&#253;';
	$lang['strfreeze'] = 'Zmrazit';
	$lang['strforce'] = 'Vynutit';
	$lang['strsignalsent'] = 'Sign&#225;l byl odesl&#225;n.';
	$lang['strsignalsentbad'] = 'Sign&#225;l se nezda&#345;ilo odeslat.';
	$lang['strallobjects'] = 'V&#353;echny objekty';
	$lang['strdatabasealtered'] = 'Zm&#283;ny v datab&#225;zi byly provedeny.';
	$lang['strdatabasealteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v datab&#225;zi.';
	$lang['strspecifydatabasetodrop'] = 'Pokud chcete odstranit datab&#225;ze, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	$lang['strtemplatedb'] = '&#352;ablona';
	$lang['strconfanalyzedatabase'] = 'Opravdu chcete analyzovat v&#353;echny tabulky v datab&#225;zi &#8222;%s&#8220;?';
	$lang['strconfvacuumdatabase'] = 'Opravdu chcete uklidit v&#353;echny tabulky v datab&#225;zi &#8222;%s&#8220;?';
	$lang['strconfreindexdatabase'] = 'Opravdu chcete p&#345;eindexovat v&#353;echny tabulky v datab&#225;zi &#8222;%s&#8220;?';
	$lang['strconfclusterdatabase'] = 'Opravdu chcete p&#345;eskupit v&#353;echny tabulky v datab&#225;zi &#8222;%s&#8220;?';

	// Views
	$lang['strview'] = 'Pohled';
	$lang['strviews'] = 'Pohledy';
	$lang['strshowallviews'] = 'Zobrazit v&#353;echny pohledy';
	$lang['strnoview'] = 'Nenalezen &#382;&#225;dn&#253; pohled.';
	$lang['strnoviews'] = 'Nenalezeny &#382;&#225;dn&#233; pohledy.';
	$lang['strcreateview'] = 'Vytvo&#345;it pohled';
	$lang['strviewname'] = 'N&#225;zev pohledu';
	$lang['strviewneedsname'] = 'Mus&#237;te zadat n&#225;zev pro pohled.';
	$lang['strviewneedsdef'] = 'Mus&#237;te zadat definici pro pohled.';
	$lang['strviewneedsfields'] = 'Mus&#237;te zvolit, kter&#233; sloupce chcete v pohledu m&#237;t.';
	$lang['strviewcreated'] = 'Pohled vytvo&#345;en.';
	$lang['strviewcreatedbad'] = 'Pohled se nezda&#345;ilo vytvo&#345;it.';
	$lang['strconfdropview'] = 'Opravdu chcete odstranit pohled &#8222;%s&#8220;?';
	$lang['strviewdropped'] = 'Pohled byl odstran&#283;n.';
	$lang['strviewdroppedbad'] = 'Pohled se nezda&#345;ilo odstranit.';
	$lang['strviewupdated'] = 'Pohled byl aktualizov&#225;n.';
	$lang['strviewupdatedbad'] = 'Pohled se nezda&#345;ilo aktualizovat.';
	$lang['strviewlink'] = 'Propojovac&#237; kl&#237;&#269;e';
	$lang['strviewconditions'] = 'Dopl&#328;uj&#237;c&#237; podm&#237;nky';
	$lang['strcreateviewwiz'] = 'Vytvo&#345;it pohled pomoc&#237; pr&#367;vodce';
	$lang['strrenamedupfields'] = 'Duplicitn&#237; pole p&#345;ejmenovat';
	$lang['strdropdupfields'] = 'Duplicitn&#237; pole odstranit';
	$lang['strerrordupfields'] = 'V p&#345;&#237;pad&#283; duplicitn&#237;ch pol&#237; ohl&#225;sit chybu';
	$lang['strviewaltered'] = 'Zm&#283;ny v pohledu byly provedeny.';
	$lang['strviewalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v pohledu.';
	$lang['strspecifyviewtodrop'] = 'Pokud chcete odstranit pohledy, tak mus&#237;te nejm&#233;n&#283; jeden vybrat.';

	// Sequences
	$lang['strsequence'] = 'Sekvence';
	$lang['strsequences'] = 'Sekvence';
	$lang['strshowallsequences'] = 'Zobrazit v&#353;echny sekvence';
	$lang['strnosequence'] = 'Nenalezena &#382;&#225;dn&#225; sekvence.';
	$lang['strnosequences'] = 'Nenalezeny &#382;&#225;dn&#233; sekvence.';
	$lang['strcreatesequence'] = 'Vytvo&#345;it sekvenci';
	$lang['strlastvalue'] = 'Posledn&#237; hodnota';
	$lang['strincrementby'] = 'P&#345;&#237;r&#367;stek';	
	$lang['strstartvalue'] = 'Po&#269;&#225;te&#269;n&#237; hodnota';
	$lang['strrestartvalue'] = 'Nov&#225; po&#269;&#225;te&#269;n&#237; hodnota';
	$lang['strmaxvalue'] = 'Max. hodnota';
	$lang['strminvalue'] = 'Min. hodnota';
	$lang['strcachevalue'] = 'P&#345;ipraveno dop&#345;edu';
	$lang['strlogcount'] = 'Dostupn&#253;ch hodnot bez z&#225;pisu (log_cnt)';
	$lang['strcancycle'] = 'Cyklicky?';
	$lang['striscalled'] = 'Zv&#253;&#353;it p&#345;ed vr&#225;cen&#237;m n&#225;sleduj&#237;c&#237; (is_called)?';
	$lang['strsequenceneedsname'] = 'Mus&#237;te zadat n&#225;zev pro sekvenci.';
	$lang['strsequencecreated'] = 'Sekvence byla vytvo&#345;ena.';
	$lang['strsequencecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it sekvenci.';
	$lang['strconfdropsequence'] = 'Opravdu chcete odstranit sekvenci &#8222;%s&#8220;?';
	$lang['strsequencedropped'] = 'Sekvence byla odstran&#283;na.';
	$lang['strsequencedroppedbad'] = 'Nezda&#345;ilo se odstranit sekvenci.';
	$lang['strsequencerestart'] = 'Sekvence nastavena na novou po&#269;&#225;te&#269;n&#237; hodnotu.';
	$lang['strsequencerestartbad'] = 'Nezda&#345;ilo se nastavit novou po&#269;&#225;te&#269;n&#237; hodnotu sekvence.';
	$lang['strsequencereset'] = 'Sekvence byla nastavena na po&#269;&#225;te&#269;n&#237; hodnotu.';
	$lang['strsequenceresetbad'] = 'Nezda&#345;ilo se nastavit po&#269;&#225;te&#269;n&#237; hodnotu sekvence.';
 	$lang['strsequencealtered'] = 'Zm&#283;ny v sekvenci byly provedeny.';
 	$lang['strsequencealteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v sekvenci.';
 	$lang['strsetval'] = 'Nastavit hodnotu';
 	$lang['strsequencesetval'] = 'Hodnota sekvence byla nastavena.';
 	$lang['strsequencesetvalbad'] = 'Nezda&#345;ilo se zm&#283;nit hodnotu sekvence.';
 	$lang['strnextval'] = 'Zv&#253;&#353;it hodnotu';
 	$lang['strsequencenextval'] = 'Hodnota sekvence byla zv&#253;&#353;ena.';
 	$lang['strsequencenextvalbad'] = 'Nezda&#345;ilo se zv&#253;&#353;it hodnotu sekvence.';
	$lang['strspecifysequencetodrop'] = 'Pokud chcete odstranit sekvence, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';
	
	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Indexy';
	$lang['strindexname'] = 'N&#225;zev indexu';
	$lang['strshowallindexes'] = 'Zobrazit v&#353;echny indexy';
	$lang['strnoindex'] = 'Nenalezen &#382;&#225;dn&#253; index.';
	$lang['strnoindexes'] = 'Nenalezeny &#382;&#225;dn&#233; indexy.';
	$lang['strcreateindex'] = 'Vytvo&#345;it index';
	$lang['strtabname'] = 'N&#225;zev tabulky';
	$lang['strcolumnname'] = 'N&#225;zev sloupce';
	$lang['strindexneedsname'] = 'Mus&#237;te zadat n&#225;zev pro index.';
	$lang['strindexneedscols'] = 'Index mus&#237; obsahovat nejm&#233;n&#283; jeden sloupec.';
	$lang['strindexcreated'] = 'Index byl vytvo&#345;en.';
	$lang['strindexcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it index.';
	$lang['strconfdropindex'] = 'Opravdu chcete odstranit index &#8222;%s&#8220;?';
	$lang['strindexdropped'] = 'Index byl odstran&#283;n.';
	$lang['strindexdroppedbad'] = 'Nezda&#345;ilo se odstranit index.';
	$lang['strkeyname'] = 'N&#225;zev kl&#237;&#269;e';
	$lang['struniquekey'] = 'Jedine&#269;n&#253; kl&#237;&#269;';
	$lang['strprimarykey'] = 'Prim&#225;rn&#237; kl&#237;&#269;';
 	$lang['strindextype'] = 'Typ indexu';
	$lang['strtablecolumnlist'] = 'Sloupce v tabulce';
	$lang['strindexcolumnlist'] = 'Sloupce v indexu';
	$lang['strclusteredgood'] = 'P&#345;eskupen&#237; dokon&#269;eno.';
	$lang['strclusteredbad'] = 'P&#345;eskupen&#237; se nezda&#345;ilo.';
	$lang['strconcurrently'] = 'Soub&#283;&#382;n&#283;';
	$lang['strnoclusteravailable'] = 'Tabulka nen&#237; p&#345;eskupena podle indexu.';

	// Rules
	$lang['strrules'] = 'Pravidla';
	$lang['strrule'] = 'Pravidlo';
	$lang['strshowallrules'] = 'Zobrazit v&#353;echna pravidla';
	$lang['strnorule'] = 'Nenalezeno &#382;&#225;dn&#233; pravidlo.';
	$lang['strnorules'] = 'Nenalezena &#382;&#225;dn&#225; pravidla.';
	$lang['strcreaterule'] = 'Vytvo&#345;it pravidlo';
	$lang['strrulename'] = 'N&#225;zev pravidla';
	$lang['strruleneedsname'] = 'Mus&#237;te zadat n&#225;zev pro pravidlo.';
	$lang['strrulecreated'] = 'Pravidlo bylo vytvo&#345;eno.';
	$lang['strrulecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it pravidlo.';
	$lang['strconfdroprule'] = 'Opravdu chcete odstranit pravidlo &#8222;%s&#8220; na &#8222;%s&#8220;?';
	$lang['strruledropped'] = 'Pravidlo bylo odstran&#283;no.';
	$lang['strruledroppedbad'] = 'Nezda&#345;ilo se odstranit pravidlo.';

	// Constraints
	$lang['strconstraint'] = 'Omezen&#237;';
	$lang['strconstraints'] = 'Omezen&#237;';
	$lang['strshowallconstraints'] = 'Zobrazit v&#353;echna omezen&#237;';
	$lang['strnoconstraints'] = 'Nenalezena &#382;&#225;dn&#225; omezen&#237;.';
	$lang['strcreateconstraint'] = 'Vytvo&#345;it omezen&#237;';
	$lang['strconstraintcreated'] = 'Omezen&#237; bylo vytvo&#345;eno.';
	$lang['strconstraintcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it omezen&#237;.';
	$lang['strconfdropconstraint'] = 'Opravdu chcete odstranit omezen&#237; &#8222;%s&#8220; na &#8222;%s&#8220;?';
	$lang['strconstraintdropped'] = 'Omezen&#237; bylo odstran&#283;no.';
	$lang['strconstraintdroppedbad'] = 'Nezda&#345;ilo se odstranit omezen&#237;.';
	$lang['straddcheck'] = 'P&#345;idat kontrolu';
	$lang['strcheckneedsdefinition'] = 'Mus&#237;te zadat definici kontroly.';
	$lang['strcheckadded'] = 'Kontrola byla p&#345;id&#225;na.';
	$lang['strcheckaddedbad'] = 'Nezda&#345;ilo se p&#345;idat kontrolu.';
	$lang['straddpk'] = 'P&#345;idat prim&#225;rn&#237; kl&#237;&#269;';
	$lang['strpkneedscols'] = 'Prim&#225;rn&#237; kl&#237;&#269; mus&#237; obsahovat nejm&#233;n&#283; jeden sloupec.';
	$lang['strpkadded'] = 'Prim&#225;rn&#237; kl&#237;&#269; byl p&#345;id&#225;n.';
	$lang['strpkaddedbad'] = 'Nezda&#345;ilo se p&#345;idat prim&#225;rn&#237; kl&#237;&#269;.';
	$lang['stradduniq'] = 'P&#345;idat jedine&#269;n&#253; kl&#237;&#269;';
	$lang['struniqneedscols'] = 'Jedine&#269;n&#253; kl&#237;&#269; mus&#237; obsahovat nejm&#233;n&#283; jeden sloupec.';
	$lang['struniqadded'] = 'Jedine&#269;n&#253; kl&#237;&#269; byl p&#345;id&#225;n.';
	$lang['struniqaddedbad'] = 'Nezda&#345;ilo se p&#345;idat jedine&#269;n&#253; kl&#237;&#269;.';
	$lang['straddfk'] = 'P&#345;idat ciz&#237; kl&#237;&#269;';
	$lang['strfkneedscols'] = 'Ciz&#237; kl&#237;&#269; mus&#237; obsahovat nejm&#233;n&#283; jeden sloupec.';
	$lang['strfkneedstarget'] = 'Mus&#237;te zadat c&#237;lovou tabulku, na kterou se ciz&#237; kl&#237;&#269; odkazuje.';
	$lang['strfkadded'] = 'Ciz&#237; kl&#237;&#269; byl p&#345;id&#225;n.';
	$lang['strfkaddedbad'] = 'Nezda&#345;ilo se p&#345;idat ciz&#237; kl&#237;&#269;.';
	$lang['strfktarget'] = 'C&#237;lov&#225; tabulka';
	$lang['strfkcolumnlist'] = 'Sloupce v kl&#237;&#269;i';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Funkce';
	$lang['strfunctions'] = 'Funkce';
	$lang['strshowallfunctions'] = 'Zobrazit v&#353;echny funkce';
	$lang['strnofunction'] = 'Nenalezena &#382;&#225;dn&#225; funkce.';
	$lang['strnofunctions'] = 'Nenalezeny &#382;&#225;dn&#233; funkce.';
	$lang['strcreateplfunction'] = 'Vytvo&#345;it funkci SQL/PL';
	$lang['strcreateinternalfunction'] = 'Vytvo&#345;it intern&#237; funkci';
	$lang['strcreatecfunction'] = 'Vytvo&#345;it funkci C';
	$lang['strfunctionname'] = 'N&#225;zev funkce';
	$lang['strreturns'] = 'Vrac&#237;';
	$lang['strproglanguage'] = 'Programovac&#237; jazyk';
	$lang['strfunctionneedsname'] = 'Mus&#237;te zadat n&#225;zev pro funkci.';
	$lang['strfunctionneedsdef'] = 'Mus&#237;te zadat definici pro funkci.';
	$lang['strfunctioncreated'] = 'Funkce byl vytvo&#345;ena.';
	$lang['strfunctioncreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it funkci.';
	$lang['strconfdropfunction'] = 'Opravdu chcete odstranit funkci &#8222;%s&#8220;?';
	$lang['strfunctiondropped'] = 'Funkce byla odstran&#283;na.';
	$lang['strfunctiondroppedbad'] = 'Nezda&#345;ilo se odstranit funkci.';
	$lang['strfunctionupdated'] = 'Funkce byla aktualizov&#225;na.';
	$lang['strfunctionupdatedbad'] = 'Nezda&#345;ilo se aktualizovat funkci.';
	$lang['strobjectfile'] = 'Soubor s objektem';
	$lang['strlinksymbol'] = 'Napojen&#253; symbol';
	$lang['strarguments'] = 'Argumenty';
	$lang['strargmode'] = 'Re&#382;im';
	$lang['strargtype'] = 'Typ';
	$lang['strargadd'] = 'P&#345;idat dal&#353;&#237; argument';
	$lang['strargremove'] = 'Odebrat tento argument';
	$lang['strargnoargs'] = 'Tato funkce nep&#345;eb&#237;r&#225; &#382;&#225;dn&#233; argumenty.';
	$lang['strargenableargs'] = 'Povolit argument&#367;m pr&#367;chod do t&#233;to funkce.';
	$lang['strargnorowabove'] = 'Nad t&#237;mto &#345;&#225;dkem ji&#382; &#382;&#225;dn&#253; nen&#237;.';
	$lang['strargnorowbelow'] = 'Pod t&#237;mto &#345;&#225;dkem ji&#382; &#382;&#225;dn&#253; nen&#237;.';
	$lang['strargraise'] = 'P&#345;esunout v&#253;&#353;e.';
	$lang['strarglower'] = 'P&#345;esunout n&#237;&#382;e.';
	$lang['strargremoveconfirm'] = 'Opravdu chcete odebrat tento argument? Operaci nelze vr&#225;tit zp&#283;t.';
	$lang['strfunctioncosting'] = 'Cena funkc&#237;';
	$lang['strresultrows'] = 'Po&#269;et &#345;&#225;dk&#367;';
	$lang['strexecutioncost'] = 'Cena prov&#225;d&#283;n&#237;';
	$lang['strspecifyfunctiontodrop'] = 'Pokud chcete odstranit funkce, tak mus&#237;te nejm&#233;n&#283; jednu vybrat.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggery';
	$lang['strshowalltriggers'] = 'Zobrazit v&#353;echny triggery';
	$lang['strnotrigger'] = 'Nenalezen &#382;&#225;dn&#253; trigger.';
	$lang['strnotriggers'] = 'Nenalezeny &#382;&#225;dn&#233; triggery.';
	$lang['strcreatetrigger'] = 'Vytvo&#345;it trigger';
	$lang['strtriggerneedsname'] = 'Mus&#237;te zadat n&#225;zev pro trigger.';
	$lang['strtriggerneedsfunc'] = 'Mus&#237;te zvolit funkci pro trigger.';
	$lang['strtriggercreated'] = 'Trigger byl vytvo&#345;en.';
	$lang['strtriggercreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it trigger.';
	$lang['strconfdroptrigger'] = 'Opravdu chcete odstranit trigger &#8222;%s&#8220; v &#8222;%s&#8220;?';
	$lang['strconfenabletrigger'] = 'Opravdu chcete povolit trigger &#8222;%s&#8220; v &#8222;%s&#8220;?';
	$lang['strconfdisabletrigger'] = 'Opravdu chcete zak&#225;zat trigger &#8222;%s&#8220; v &#8222;%s&#8220;?';
	$lang['strtriggerdropped'] = 'Trigger byl odstran&#283;n.';
	$lang['strtriggerdroppedbad'] = 'Nezda&#345;ilo se odstranit trigger.';
	$lang['strtriggerenabled'] = 'Trigger byl povolen.';
	$lang['strtriggerenabledbad'] = 'Nezda&#345;ilo se povolit trigger.';
	$lang['strtriggerdisabled'] = 'Trigger byl zak&#225;z&#225;n.';
	$lang['strtriggerdisabledbad'] = 'Nezda&#345;ilo se zak&#225;zat trigger.';
	$lang['strtriggeraltered'] = 'Zm&#283;ny v triggeru byly provedeny.';
	$lang['strtriggeralteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v triggeru.';
	$lang['strforeach'] = 'Pro ka&#382;d&#253;';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Zobrazit v&#353;echny typy';
	$lang['strnotype'] = 'Nenalezen &#382;&#225;dn&#253; typ.';
	$lang['strnotypes'] = 'Nenalezeny &#382;&#225;dn&#233; typy.';
	$lang['strcreatetype'] = 'Vytvo&#345;it extern&#237; typ';
	$lang['strcreatecomptype'] = 'Vytvo&#345;it slo&#382;en&#253; typ';
	$lang['strcreateenumtype'] = 'Vytvo&#345;it v&#253;&#269;tov&#253; typ';
	$lang['strtypeneedsfield'] = 'Mus&#237;te zadat nejm&#233;n&#283; jedno pole.';
	$lang['strtypeneedsvalue'] = 'Mus&#237;te zadat nejm&#233;n&#283; jednu hodnotu.';
	$lang['strtypeneedscols'] = 'Mus&#237;te zadat platn&#253; po&#269;et pol&#237;.';
	$lang['strtypeneedsvals'] = 'Mus&#237;te zadat platn&#253; po&#269;et hodnot.';
	$lang['strinputfn'] = 'Vstupn&#237; funkce';
	$lang['stroutputfn'] = 'V&#253;stupn&#237; funkce';
	$lang['strpassbyval'] = 'P&#345;ed&#225;van&#253; hodnotou?';
	$lang['stralignment'] = 'Zarovn&#225;n&#237;';
	$lang['strelement'] = 'Prvek';
	$lang['strdelimiter'] = 'Odd&#283;lova&#269;';
	$lang['strstorage'] = 'Ulo&#382;en&#237;';
	$lang['strfield'] = 'Pole';
	$lang['strnumfields'] = 'Po&#269;et pol&#237;';
	$lang['strnumvalues'] = 'Po&#269;et hodnot';
	$lang['strtypeneedsname'] = 'Mus&#237;te zadat n&#225;zev pro typ.';
	$lang['strtypeneedslen'] = 'Mus&#237;te zadat d&#233;lku pro typ.';
	$lang['strtypecreated'] = 'Typ byl vytvo&#345;en.';
	$lang['strtypecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it typ.';
	$lang['strconfdroptype'] = 'Opravdu chcete odstranit typ &#8222;%s&#8220;?';
	$lang['strtypedropped'] = 'Typ byl odstran&#283;n.';
	$lang['strtypedroppedbad'] = 'Nezda&#345;ilo se odstranit typ.';
	$lang['strflavor'] = 'Druh';
	$lang['strbasetype'] = 'Z&#225;kladn&#237;';
	$lang['strcompositetype'] = 'Slo&#382;en&#253;';
	$lang['strpseudotype'] = 'Pseudo';
	$lang['strenum'] = 'V&#253;&#269;tov&#253;';
	$lang['strenumvalues'] = 'V&#253;&#269;tov&#233; hodnoty';

	// Schemas
	$lang['strschema'] = 'Sch&#233;ma';
	$lang['strschemas'] = 'Sch&#233;mata';
	$lang['strshowallschemas'] = 'Zobrazit v&#353;echna sch&#233;mata';
	$lang['strnoschema'] = 'Nebylo nalezeno &#382;&#225;dn&#233; sch&#233;ma.';
	$lang['strnoschemas'] = 'Nebyla nalezena &#382;&#225;dn&#225; sch&#233;mata.';
	$lang['strcreateschema'] = 'Vytvo&#345;it sch&#233;ma';
	$lang['strschemaname'] = 'N&#225;zev sch&#233;matu';
	$lang['strschemaneedsname'] = 'Mus&#237;te zadat n&#225;zev pro sch&#233;ma.';
	$lang['strschemacreated'] = 'Sch&#233;ma bylo vytvo&#345;eno.';
	$lang['strschemacreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it sch&#233;ma.';
	$lang['strconfdropschema'] = 'Opravdu chcete odstranit sch&#233;ma &#8222;%s&#8220;?';
	$lang['strschemadropped'] = 'Sch&#233;ma bylo odstran&#283;no.';
	$lang['strschemadroppedbad'] = 'Nezda&#345;ilo se odstranit sch&#233;ma.';
	$lang['strschemaaltered'] = 'Zm&#283;ny ve sch&#233;matu byly provedeny.';
	$lang['strschemaalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny ve sch&#233;matu.';
	$lang['strsearchpath'] = 'Prohled&#225;van&#225; sch&#233;mata';
	$lang['strspecifyschematodrop'] = 'Pokud chcete odstranit sch&#233;mata, tak mus&#237;te nejm&#233;n&#283; jedno vybrat.';

	// Reports
	$lang['strreport'] = 'V&#253;stupn&#237; sestava';
	$lang['strreports'] = 'V&#253;stupn&#237; sestavy';
	$lang['strshowallreports'] = 'Zobrazit v&#353;echny v&#253;stupn&#237; sestavy';
	$lang['strnoreports'] = 'Nebyly nalezeny &#382;&#225;dn&#233; v&#253;stupn&#237; sestava.';
	$lang['strcreatereport'] = 'Vytvo&#345;it v&#253;stupn&#237; sestavu';
	$lang['strreportdropped'] = 'V&#253;stupn&#237; sestava byla odstran&#283;na.';
	$lang['strreportdroppedbad'] = 'Nezda&#345;ilo se odstranit v&#253;stupn&#237; sestavu.';
	$lang['strconfdropreport'] = 'Opravdu chcete odstranit v&#253;stupn&#237; sestavu &#8222;%s&#8220;?';
	$lang['strreportneedsname'] = 'Mus&#237;te zadat n&#225;zev pro v&#253;stupn&#237; sestavu.';
	$lang['strreportneedsdef'] = 'Mus&#237;te zadat dotaz SQL pro v&#253;stupn&#237; sestavu.';
	$lang['strreportcreated'] = 'V&#253;stupn&#237; sestava byla ulo&#382;ena.';
	$lang['strreportcreatedbad'] = 'Nezda&#345;ilo se ulo&#382;it v&#253;stupn&#237; sestavu.';

	// Domains
	$lang['strdomain'] = 'Dom&#233;na';
	$lang['strdomains'] = 'Dom&#233;ny';
	$lang['strshowalldomains'] = 'Zobrazit v&#353;echny dom&#233;ny';
	$lang['strnodomains'] = 'Nebyly nalezeny &#382;&#225;dn&#233; dom&#233;ny.';
	$lang['strcreatedomain'] = 'Vytvo&#345;it dom&#233;nu';
	$lang['strdomaindropped'] = 'Dom&#233;na byla odstran&#283;na.';
	$lang['strdomaindroppedbad'] = 'Nezda&#345;ilo se odstranit dom&#233;nu.';
	$lang['strconfdropdomain'] = 'Opravdu chcete odstranit dom&#233;nu &#8222;%s&#8220;?';
	$lang['strdomainneedsname'] = 'Mus&#237;te zadat n&#225;zev pro dom&#233;nu.';
	$lang['strdomaincreated'] = 'Dom&#233;na byla vytvo&#345;ena.';
	$lang['strdomaincreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it dom&#233;nu.';	
	$lang['strdomainaltered'] = 'Zm&#283;ny v dom&#233;n&#283; byly provedeny.';
	$lang['strdomainalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v dom&#233;n&#283;.';	

	// Operators
	$lang['stroperator'] = 'Oper&#225;tor';
	$lang['stroperators'] = 'Oper&#225;tory';
	$lang['strshowalloperators'] = 'Zobrazit v&#353;echny oper&#225;tory';
	$lang['strnooperator'] = 'Nebyl nalezen &#382;&#225;dn&#253; oper&#225;tor.';
	$lang['strnooperators'] = 'Nebyly nalezeny &#382;&#225;dn&#233; oper&#225;tory.';
	$lang['strcreateoperator'] = 'Vytvo&#345;it oper&#225;tor';
	$lang['strleftarg'] = 'Lev&#253; operand';
	$lang['strrightarg'] = 'Prav&#253; operand';
	$lang['strcommutator'] = 'Komut&#225;tor';
	$lang['strnegator'] = 'Neg&#225;tor';
	$lang['strrestrict'] = 'Omezen&#237;';
	$lang['strjoin'] = 'Propojen&#237;';
	$lang['strhashes'] = 'He&#353;e';
	$lang['strmerges'] = 'Slu&#269;ov&#225;n&#237;';
	$lang['strleftsort'] = 'Lev&#233; &#345;azen&#237;';
	$lang['strrightsort'] = 'Prav&#233; &#345;azen&#237;';
	$lang['strlessthan'] = 'Oper&#225;tor &lt;';
	$lang['strgreaterthan'] = 'Oper&#225;tor &gt;';
	$lang['stroperatorneedsname'] = 'Mus&#237;te zadat n&#225;zev pro oper&#225;tor.';
	$lang['stroperatorcreated'] = 'Oper&#225;tor byl vytvo&#345;en.';
	$lang['stroperatorcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it oper&#225;tor.';
	$lang['strconfdropoperator'] = 'Opravdu chcete odstranit oper&#225;tor &#8222;%s&#8220;?';
	$lang['stroperatordropped'] = 'Oper&#225;tor byl odstran&#283;n.';
	$lang['stroperatordroppedbad'] = 'Nezda&#345;ilo se odstranit oper&#225;tor.';

	// Casts
	$lang['strcasts'] = 'P&#345;etypov&#225;n&#237;';
	$lang['strnocasts'] = 'Nenalezena &#382;&#225;dn&#225; p&#345;etypov&#225;n&#237;.';
	$lang['strsourcetype'] = 'Zdrojov&#253; typ';
	$lang['strtargettype'] = 'C&#237;lov&#253; typ';
	$lang['strimplicit'] = 'Implicitn&#237;';
	$lang['strinassignment'] = 'V p&#345;i&#345;azen&#237;';
	$lang['strbinarycompat'] = '(Bin&#225;rn&#283; zam&#283;niteln&#233;)';
	
	// Conversions
	$lang['strconversions'] = 'Konverze';
	$lang['strnoconversions'] = 'Nenalezeny &#382;&#225;dn&#233; konverze.';
	$lang['strsourceencoding'] = 'Zdrojov&#233; k&#243;dov&#225;n&#237;';
	$lang['strtargetencoding'] = 'C&#237;lov&#233; k&#243;dov&#225;n&#237;';
	
	// Languages
	$lang['strlanguages'] = 'Jazyky';
	$lang['strnolanguages'] = 'Nenalezeny &#382;&#225;dn&#233; jazyky.';
	$lang['strtrusted'] = 'D&#367;v&#283;ryhodn&#253;';
	
	// Info
	$lang['strnoinfo'] = 'Nejsou dostupn&#233; &#382;&#225;dn&#233; informace.';
	$lang['strreferringtables'] = 'Odkazuj&#237;c&#237; tabulky';
	$lang['strparenttables'] = 'Rodi&#269;ovsk&#233; tabulky';
	$lang['strchildtables'] = 'Dce&#345;in&#233; tabulky';

	// Aggregates
	$lang['straggregate'] = 'Agrega&#269;n&#237; funkce';
	$lang['straggregates'] = 'Agrega&#269;n&#237; funkce';
	$lang['strnoaggregates'] = 'Nebyly nalezeny &#382;&#225;dn&#233; agrega&#269;n&#237; funkce.';
	$lang['stralltypes'] = '(V&#353;echny typy)';
	$lang['strcreateaggregate'] = 'Vytvo&#345;it agrega&#269;n&#237; funkci';
	$lang['straggrbasetype'] = 'Typ vstupn&#237;ch dat';
	$lang['straggrsfunc'] = 'Funkce stavov&#233;ho p&#345;echodu';
	$lang['straggrstype'] = 'Datov&#253; typ stavov&#233; hodnoty';
	$lang['straggrffunc'] = 'Fin&#225;ln&#237; funkce';
	$lang['straggrinitcond'] = 'Po&#269;&#225;te&#269;n&#237; podm&#237;nka';
	$lang['straggrsortop'] = 'Oper&#225;tor &#345;azen&#237;';
	$lang['strconfdropaggregate'] = 'Opravdu chcete odstranit agrega&#269;n&#237; funkci &#8222;%s&#8220;?';
	$lang['straggregatedropped'] = 'Agrega&#269;n&#237; funkce byla odstran&#283;na.';
	$lang['straggregatedroppedbad'] = 'Nezda&#345;ilo se odstranit agrega&#269;n&#237; funkci.';
	$lang['straggraltered'] = 'Zm&#283;ny v agrega&#269;n&#237; funkci byly provedeny.';
	$lang['straggralteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v agrega&#269;n&#237; funkci.';
	$lang['straggrneedsname'] = 'Mus&#237;te zadat n&#225;zev pro agrega&#269;n&#237; funkci.';
	$lang['straggrneedsbasetype'] = 'Mus&#237;te zadat typ vstupn&#237;ch dat pro agrega&#269;n&#237; funkci.';
	$lang['straggrneedssfunc'] = 'Mus&#237;te zadat n&#225;zev funkce stavov&#233;ho p&#345;echodu pro agrega&#269;n&#237; funkci.';
	$lang['straggrneedsstype'] = 'Mus&#237;te zadat datov&#253; typ stavov&#233; hodnoty pro agrega&#269;n&#237; funkci.';
	$lang['straggrcreated'] = 'Agrega&#269;n&#237; funkce byla vytvo&#345;ena.';
	$lang['straggrcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it agrega&#269;n&#237; funkci.';
	$lang['straggrshowall'] = 'Zobrazit v&#353;echny agrega&#269;n&#237; funkce';

	// Operator Classes
	$lang['stropclasses'] = 'T&#345;&#237;dy oper&#225;tor&#367;';
	$lang['strnoopclasses'] = 'Nebely nalezeny &#382;&#225;dn&#233; t&#345;&#237;dy oper&#225;tor&#367;.';
	$lang['straccessmethod'] = 'Metoda p&#345;&#237;stupu';

	// Stats and performance
	$lang['strrowperf'] = 'Souhrn &#345;&#225;dkov&#253;ch operac&#237;';
	$lang['strioperf'] = 'Souhrn V/V operac&#237;';
	$lang['stridxrowperf'] = 'Souhrn Indexov&#253;ch &#345;&#225;dkov&#253;ch operac&#237;';
	$lang['stridxioperf'] = 'Souhrn Indexov&#253;ch V/V operac&#237;';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sekven&#269;n&#283;';
	$lang['strscan'] = 'Prohled&#225;no';
	$lang['strread'] = '&#268;teno';
	$lang['strfetch'] = 'Na&#269;teno';
	$lang['strheap'] = 'Hromada';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Mezipam&#283;&#357;';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = '&#344;&#225;dk&#367;';

	// Tablespaces
	$lang['strtablespace'] = 'Prostor tabulek';
	$lang['strtablespaces'] = 'Prostory tabulek';
	$lang['strshowalltablespaces'] = 'Zobrazit v&#353;echny prostory tabulek';
	$lang['strnotablespaces'] = 'Nebyly nalezeny &#382;&#225;dn&#233; prostory tabulek.';
	$lang['strcreatetablespace'] = 'Vytvo&#345;it prostor tabulek';
	$lang['strlocation'] = 'Um&#237;st&#283;n&#237;';
	$lang['strtablespaceneedsname'] = 'Mus&#237;te zadat n&#225;zev pro prostor tabulek.';
	$lang['strtablespaceneedsloc'] = 'Mus&#237;te zadat slo&#382;ku, ve kter&#233; se m&#225; prostor tabulek vytvo&#345;it.';
	$lang['strtablespacecreated'] = 'Prostor tabulek byl vytvo&#345;en.';
	$lang['strtablespacecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it prostor tabulek.';
	$lang['strconfdroptablespace'] = 'Opravdu chcete odstranit prostor tabulek &#8222;%s&#8220;?';
	$lang['strtablespacedropped'] = 'Prostor tabulek byl odstran&#283;n.';
	$lang['strtablespacedroppedbad'] = 'Nezda&#345;ilo se odstranit prostor tabulek.';
	$lang['strtablespacealtered'] = 'Zm&#283;ny v prostoru tabulek byly provedeny.';
	$lang['strtablespacealteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny v prostoru tabulek.';

	// Slony clusters
	$lang['strcluster'] = 'Klastr';
	$lang['strnoclusters'] = 'Nebyly nalezeny &#382;&#225;dn&#233; klastry.';
	$lang['strconfdropcluster'] = 'Opravdu chcete odstranit klastr &#8222;%s&#8220;?';
	$lang['strclusterdropped'] = 'Klastr byl odstran&#283;n.';
	$lang['strclusterdroppedbad'] = 'Nezda&#345;ilo se odstranit klastr.';
	$lang['strinitcluster'] = 'Inicializovat klastr';
	$lang['strclustercreated'] = 'Klastr byl inicializov&#225;n.';
	$lang['strclustercreatedbad'] = 'Nezda&#345;ilo se inicializovat klastr.';
	$lang['strclusterneedsname'] = 'Mus&#237;te zadat n&#225;zev pro klastr.';
	$lang['strclusterneedsnodeid'] = 'Mus&#237;te zadat ID pro lok&#225;ln&#237; uzel.';

	// Slony nodes
	$lang['strnodes'] = 'Uzly';
	$lang['strnonodes'] = 'Nenalezeny &#382;&#225;dn&#233; uzly.';
	$lang['strcreatenode'] = 'Vytvo&#345;it uzel';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Aktivn&#237;';
	$lang['strnodecreated'] = 'Uzel byl vytvo&#345;en.';
	$lang['strnodecreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it uzel.';
	$lang['strconfdropnode'] = 'Opravdu chcete odstranit uzel &#8222;%s&#8220;?';
	$lang['strnodedropped'] = 'Uzel byl odstran&#283;n.';
	$lang['strnodedroppedbad'] = 'Nezda&#345;ilo se odstranit uzel.';
	$lang['strfailover'] = 'P&#345;eklenout v&#253;padek';
	$lang['strnodefailedover'] = 'Uzel p&#345;eklenul v&#253;padek.';
	$lang['strnodefailedoverbad'] = 'Uzlu se nezda&#345;ilo p&#345;eklenout v&#253;padek.';
	$lang['strstatus'] = 'Stav';	
	$lang['strhealthy'] = 'V po&#345;&#225;dku';
	$lang['stroutofsync'] = 'Neslad&#283;no';
	$lang['strunknown'] = 'Nezn&#225;mo';	

	// Slony paths	
	$lang['strpaths'] = 'Cesty';
	$lang['strnopaths'] = 'Nenalezeny &#382;&#225;dn&#233; cesty.';
	$lang['strcreatepath'] = 'Vytvo&#345;it cestu';
	$lang['strnodename'] = 'N&#225;zev uzlu';
	$lang['strnodeid'] = 'ID uzlu';
	$lang['strconninfo'] = 'P&#345;ipojovac&#237; &#345;et&#283;zec';
	$lang['strconnretry'] = '&#268;ek&#225;n&#237; v sekund&#225;ch p&#345;ed nov&#253;m pokusem p&#345;ipojen&#237;';
	$lang['strpathneedsconninfo'] = 'Mus&#237;te zadat p&#345;ipojovac&#237; &#345;et&#283;zec pro cestu.';
	$lang['strpathneedsconnretry'] = 'Mus&#237;te zadat dobu v sekund&#225;ch, po kterou se bude &#269;ekat, ne&#382; se zkus&#237; znovu p&#345;ipojit.';
	$lang['strpathcreated'] = 'Cesta byla vytvo&#345;ena.';
	$lang['strpathcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it cestu.';
	$lang['strconfdroppath'] = 'Opravdu chcete odstranit cestu &#8222;%s&#8220;?';
	$lang['strpathdropped'] = 'Cesta byla odstran&#283;na.';
	$lang['strpathdroppedbad'] = 'Nezda&#345;ilo se odstranit cestu.';

	// Slony listens
	$lang['strlistens'] = 'Naslouch&#225;n&#237;';
	$lang['strnolistens'] = 'Nebyla nalezena &#382;&#225;dn&#225; naslouch&#225;n&#237;.';
	$lang['strcreatelisten'] = 'Vytvo&#345;it naslouch&#225;n&#237;';
	$lang['strlistencreated'] = 'Naslouch&#225;n&#237; bylo vytvo&#345;eno.';
	$lang['strlistencreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it naslouch&#225;n&#237;.';
	$lang['strconfdroplisten'] = 'Opravdu chcete odstranit naslouch&#225;n&#237; &#8222;%s&#8220;?';
	$lang['strlistendropped'] = 'Naslouch&#225;n&#237; bylo odstran&#283;no.';
	$lang['strlistendroppedbad'] = 'Nezda&#345;ilo se odstranit naslouch&#225;n&#237;.';

	// Slony replication sets
	$lang['strrepsets'] = 'Replika&#269;n&#237; sady';
	$lang['strnorepsets'] = 'Nebyly nalezeny &#382;&#225;dn&#233; replika&#269;n&#237; sady.';
	$lang['strcreaterepset'] = 'Vytvo&#345;it replika&#269;n&#237; sadu';
	$lang['strrepsetcreated'] = 'Replika&#269;n&#237; sada byla vytvo&#345;ena.';
	$lang['strrepsetcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it replika&#269;n&#237; sadu.';
	$lang['strconfdroprepset'] = 'Opravdu chcete odstranit replika&#269;n&#237; sadu &#8222;%s&#8220;?';
	$lang['strrepsetdropped'] = 'Replika&#269;n&#237; sada byla odstran&#283;na.';
	$lang['strrepsetdroppedbad'] = 'Nezda&#345;ilo se odstranit replika&#269;n&#237; sadu.';
	$lang['strmerge'] = 'Slou&#269;it';
	$lang['strmergeinto'] = 'Slou&#269;it s';
	$lang['strrepsetmerged'] = 'Replika&#269;n&#237; sady byly slou&#269;eny.';
	$lang['strrepsetmergedbad'] = 'Nezda&#345;ilo se slou&#269;it replika&#269;n&#237; sady.';
	$lang['strmove'] = 'P&#345;esunout';
	$lang['strneworigin'] = 'Nov&#253; po&#269;&#225;tek';
	$lang['strrepsetmoved'] = 'Replika&#269;n&#237; sada byla p&#345;esunuta.';
	$lang['strrepsetmovedbad'] = 'Nezda&#345;ilo se p&#345;esunout replika&#269;n&#237; sadu.';
	$lang['strnewrepset'] = 'Nov&#225; replika&#269;n&#237; sada';
	$lang['strlock'] = 'Zamknout';
	$lang['strlocked'] = 'Zamknuto';
	$lang['strunlock'] = 'Odemknout';
	$lang['strconflockrepset'] = 'Opravdu chcete zamknout replika&#269;n&#237; sadu &#8222;%s&#8220;?';
	$lang['strrepsetlocked'] = 'Replika&#269;n&#237; sada byla zamknuta.';
	$lang['strrepsetlockedbad'] = 'Nezda&#345;ilo se zamknout replika&#269;n&#237; sadu.';
	$lang['strconfunlockrepset'] = 'Opravdu chcete odemknout replika&#269;n&#237; sadu &#8222;%s&#8220;?';
	$lang['strrepsetunlocked'] = 'Replika&#269;n&#237; sada byla odemknuta.';
	$lang['strrepsetunlockedbad'] = 'Nezda&#345;ilo se odemknout replika&#269;n&#237; sadu.';
	$lang['stronlyonnode'] = 'Poze v uzlu';
	$lang['strddlscript'] = 'Skript DDL';
	$lang['strscriptneedsbody'] = 'Mus&#237;te zajistit, aby se skript spustil na v&#353;ech uzlech.';
	$lang['strscriptexecuted'] = 'Skript DDL replika&#269;n&#237; sady byl vykon&#225;n.';
	$lang['strscriptexecutedbad'] = 'Nezda&#345;ilo se vykonat skript DDL replika&#269;n&#237; sady.';
	$lang['strtabletriggerstoretain'] = 'N&#225;sleduj&#237;c&#237; triggery NEBUDOU replika&#269;n&#237;m syst&#233;mem Slony zak&#225;z&#225;ny:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'P&#345;idat tabulku';
	$lang['strtableneedsuniquekey'] = 'P&#345;id&#225;van&#225; tabulka mus&#237; obsahovat prim&#225;rn&#237; nebo jedine&#269;n&#253; kl&#237;&#269;.';
	$lang['strtableaddedtorepset'] = 'Tabulka byla p&#345;id&#225;na do replika&#269;n&#237; sady.';
	$lang['strtableaddedtorepsetbad'] = 'Tabulku se nezda&#345;ilo p&#345;idat do replika&#269;n&#237; sady.';
	$lang['strconfremovetablefromrepset'] = 'Opravdu chcete odebrat tabulku &#8222;%s&#8220; z replika&#269;n&#237; sady &#8222;%s&#8220;?';
	$lang['strtableremovedfromrepset'] = 'Tabulka byla odebr&#225;na z replika&#269;n&#237; sady.';
	$lang['strtableremovedfromrepsetbad'] = 'Tabulku se nezda&#345;ilo odebrat z replika&#269;n&#237; sady.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'P&#345;idat sekvenci';
	$lang['strsequenceaddedtorepset'] = 'Sekvence byla p&#345;id&#225;na do replika&#269;n&#237; sady.';
	$lang['strsequenceaddedtorepsetbad'] = 'Sekvenci se nezda&#345;ilo p&#345;idat do replika&#269;n&#237; sady.';
	$lang['strconfremovesequencefromrepset'] = 'Opravdu chcete odebrat sekvenci &#8222;%s&#8220; z replika&#269;n&#237; sady &#8222;%s&#8220;?';
	$lang['strsequenceremovedfromrepset'] = 'Sekvence byla odebr&#225;na z replika&#269;n&#237; sady.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Sekvenci se nezda&#345;ilo odebrat z replika&#269;n&#237; sady.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Odb&#283;ry';
	$lang['strnosubscriptions'] = 'Nebyly nalezeny &#382;&#225;dn&#233; odb&#283;ry.';

	// Miscellaneous
	$lang['strtopbar'] = '%s b&#283;&#382;&#237;c&#237; na %s:%s -- Jste p&#345;ihl&#225;&#353;en&#253; jako u&#382;ivatel &#8222;%s&#8220;';
	$lang['strtimefmt'] = 'j. M Y G:i';
	$lang['strhelp'] = 'N&#225;pov&#283;da';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'V&#253;b&#283;r str&#225;nky s n&#225;pov&#283;dou';
	$lang['strselecthelppage'] = 'Zvolte str&#225;nku s n&#225;pov&#283;dou';
	$lang['strinvalidhelppage'] = 'Neplatn&#225; str&#225;nka s n&#225;pov&#283;dou.';
	$lang['strlogintitle'] = 'P&#345;ihl&#225;&#353;en&#237; k %s';
	$lang['strlogoutmsg'] = 'Odhl&#225;&#353;en&#237; od %s';
	$lang['strloading'] = 'Na&#269;&#237;t&#225; se&#8230;';
	$lang['strerrorloading'] = 'Chyba p&#345;i na&#269;&#237;t&#225;n&#237;';
	$lang['strclicktoreload'] = 'Klikn&#283;te pro op&#283;tovn&#233; na&#269;ten&#237;';

	// Autovacuum
	$lang['strautovacuum'] = 'Automatick&#253; &#250;klid';
	$lang['strturnedon'] = 'Zapnuto';
	$lang['strturnedoff'] = 'Vypnuto';
	$lang['strenabled'] = 'Povoleno';
	$lang['strnovacuumconf'] = 'Nebylo nalezeno &#382;&#225;dn&#233; nastaven&#237; automatick&#233;ho &#250;klidu.';
	$lang['strvacuumbasethreshold'] = 'VACUUM - z&#225;kladn&#237; pr&#225;h';
	$lang['strvacuumscalefactor'] = 'VACUUM - &#353;k&#225;lovac&#237; faktor';
	$lang['stranalybasethreshold'] = 'ANALYZE - z&#225;kladn&#237; pr&#225;h';
	$lang['stranalyzescalefactor'] = 'ANALYZE - &#353;k&#225;lovac&#237; faktor';
	$lang['strvacuumcostdelay'] = 'VACUUM - d&#233;lka p&#345;est&#225;vky';
	$lang['strvacuumcostlimit'] = 'VACUUM - cenov&#253; limit';
	$lang['strvacuumpertable'] = 'Nastaven&#237; automatick&#233;ho uklidu jednotliv&#253;ch tabulek';
	$lang['straddvacuumtable'] = 'P&#345;idat nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku';
	$lang['streditvacuumtable'] = 'Upravit nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku %s';
	$lang['strdelvacuumtable'] = 'Smazat nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku %s ?';
	$lang['strvacuumtablereset'] = 'Autovacuum setup for table %s reset to default values';
	$lang['strdelvacuumtablefail'] = 'Nezda&#345;ilo se odebrat nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku %s';
	$lang['strsetvacuumtablesaved'] = 'Nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku %s bylo ulo&#382;eno.';
	$lang['strsetvacuumtablefail'] = 'Nezda&#345;ilo se nastaven&#237; automatick&#233;ho &#250;klidu pro tabulku %s.';
	$lang['strspecifydelvacuumtable'] = 'Mus&#237;te zadat tabulku, ze kter&#233; chcete odebrat parametry automatick&#233;ho &#250;klidu.';
	$lang['strspecifyeditvacuumtable'] = 'Mus&#237;te zadat tabulku, ze kter&#233; chcete upravit parametry automatick&#233;ho &#250;klidu.';
	$lang['strnotdefaultinred'] = 'V &#250;&#269;tu nejsou &#382;&#225;dn&#233; v&#253;choz&#237; hodnoty.';

	// Table-level Locks
	$lang['strlocks'] = 'Z&#225;mky';
	$lang['strtransaction'] = 'ID transakce';
	$lang['strvirtualtransaction'] = 'ID virtu&#225;ln&#237; transakce';
	$lang['strprocessid'] = 'ID procesu';
	$lang['strmode'] = 'Re&#382;im z&#225;mku';
	$lang['strislockheld'] = 'Je z&#225;mek dr&#382;en&#253;?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'P&#345;ipraven&#233; transakce';
	$lang['strxactid'] = 'Transak&#269;n&#237; ID';
	$lang['strgid'] = 'Glob&#225;ln&#237; ID';
	
	// Fulltext search
	$lang['strfulltext'] = 'Pln&#283; textov&#233; vyhled&#225;v&#225;n&#237;';
	$lang['strftsconfig'] = 'Nastaven&#237; FTS';
	$lang['strftsconfigs'] = 'Nastaven&#237;';
	$lang['strftscreateconfig'] = 'Vytvo&#345;it nastaven&#237; FTS';
	$lang['strftscreatedict'] = 'Vytvo&#345;it slovn&#237;k';
	$lang['strftscreatedicttemplate'] = 'Vytvo&#345;it &#353;ablonu slovn&#237;ku';
	$lang['strftscreateparser'] = 'Vytvo&#345;it analyz&#225;tor';
	$lang['strftsnoconfigs'] = 'Nebylo nalezeno &#382;&#225;dn&#233; nastaven&#237; FTS.';
	$lang['strftsconfigdropped'] = 'Nastaven&#237; FTS bylo odstran&#283;no.';
	$lang['strftsconfigdroppedbad'] = 'Nezda&#345;ilo se odstranit nastaven&#237; FTS.';
	$lang['strconfdropftsconfig'] = 'Opravdu chcete odstranit nastaven&#237; FTS &#8222;%s&#8220;?';
	$lang['strconfdropftsdict'] = 'Opravdu chcete odstranit slovn&#237;k FTS &#8222;%s&#8220;?';
	$lang['strconfdropftsmapping'] = 'Opravdu chcete odstranit mapov&#225;n&#237; &#8222;%s&#8220; nastaven&#237; FTS &#8222;%s&#8220;?';
	$lang['strftstemplate'] = '&#352;ablona';
	$lang['strftsparser'] = 'Analyz&#225;tor';
	$lang['strftsconfigneedsname'] = 'Mus&#237;te zadat n&#225;zev pro nastaven&#237; FTS.';
	$lang['strftsconfigcreated'] = 'Nastaven&#237; FTS bylo vytvo&#345;eno.';
	$lang['strftsconfigcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it nastaven&#237; FTS.';
	$lang['strftsmapping'] = 'Mapov&#225;n&#237;';
	$lang['strftsdicts'] = 'Slovn&#237;ky';
	$lang['strftsdict'] = 'Slovn&#237;k';
	$lang['strftsemptymap'] = 'Vypr&#225;zdnit mapu nastaven&#237; FTS.';
	$lang['strftsconfigaltered'] = 'Byly provedeny zm&#283;ny nastaven&#237; FTS.';
	$lang['strftsconfigalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny nastaven&#237; FTS.';
	$lang['strftsconfigmap'] = 'Mapa nastaven&#237; FTS';
	$lang['strftsparsers'] = 'Analyz&#225;tory FTS';
	$lang['strftsnoparsers'] = 'Nejsou dostupn&#233; &#382;&#225;dn&#233; analyz&#225;tory FTS.';
	$lang['strftsnodicts'] = 'Nejsou dostupn&#233; &#382;&#225;dn&#233; slovn&#237;ky FTS.';
	$lang['strftsdictcreated'] = 'Slovn&#237;k FTS byl vytvo&#345;en.';
	$lang['strftsdictcreatedbad'] = 'Nezda&#345;ilo se vytvo&#345;it slovn&#237;k FTS.';
	$lang['strftslexize'] = 'Lexik&#225;ln&#237; funkce';
	$lang['strftsinit'] = 'Inicializa&#269;n&#237; funkce';
	$lang['strftsoptionsvalues'] = 'Volby a hodnoty';
	$lang['strftsdictneedsname'] = 'Mus&#237;te zadat n&#225;zev pro slovn&#237;k FTS.';
	$lang['strftsdictdropped'] = 'Slovn&#237;k FTS byl odstran&#283;n.';
	$lang['strftsdictdroppedbad'] = 'Nezda&#345;ilo se odstranit slovn&#237;k FTS.';
	$lang['strftsdictaltered'] = 'Byly provedeny zm&#283;ny slovn&#237;ku FTS.';
	$lang['strftsdictalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny slovn&#237;ku FTS.';
	$lang['strftsaddmapping'] = 'P&#345;idat nov&#233; mapov&#225;n&#237;';
	$lang['strftsspecifymappingtodrop'] = 'Pokud chcete odstranit mapov&#225;n&#237;, tak mus&#237;te nejm&#233;n&#283; jedno vybrat.';
	$lang['strftsspecifyconfigtoalter'] = 'Mus&#237;te vybrat, kter&#233; nastaven&#237; FTS chcete zm&#283;nit.';
	$lang['strftsmappingdropped'] = 'Mapov&#225;n&#237; FTS bylo odstran&#283;no.';
	$lang['strftsmappingdroppedbad'] = 'Nezda&#345;ilo se odstranit mapov&#225;n&#237; FTS.';
	$lang['strftsnodictionaries'] = 'Nebyly nalezeny &#382;&#225;dn&#233; slovn&#237;ky.';
	$lang['strftsmappingaltered'] = 'Byly provedeny zm&#283;ny mapov&#225;n&#237; FTS.';
	$lang['strftsmappingalteredbad'] = 'Nezda&#345;ilo se prov&#233;st zm&#283;ny mapov&#225;n&#237; FTS.';
	$lang['strftsmappingadded'] = 'Mapov&#225;n&#237; FTS bylo p&#345;id&#225;no.';
	$lang['strftsmappingaddedbad'] = 'Nezda&#345;ilo se p&#345;idat mapov&#225;n&#237; FTS.';
	$lang['strftstabconfigs'] = 'Nastaven&#237;';
	$lang['strftstabdicts'] = 'Slovn&#237;ky';
	$lang['strftstabparsers'] = 'Analyz&#225;tory';
	$lang['strftscantparsercopy'] = 'P&#345;i vytv&#225;&#345;en&#237; nastaven&#237; textov&#233;ho vyhled&#225;v&#225;n&#237; nem&#367;&#382;ete nar&#225;z zadat analyz&#225;tor i &#353;ablonu.';
?>
