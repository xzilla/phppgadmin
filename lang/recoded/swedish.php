<?php

	/**
	 * Swedish language file for phpPgAdmin.
	 * maintainer S. Malmqvist &lt;samoola@slak.nu&gt;
	 * Due to lack of SQL knowledge som translations may be wrong, mail me the correct one and ill fix it
	 *
	 * $Id: swedish.php,v 1.8 2004/07/12 04:18:44 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Swedish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'sv_SE';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'V&auml;lkommen till phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmins Hemsida';
	$lang['strpgsqlhome'] = 'PostgreSQLs Hemsida';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQLs Dokumentation (lokalt)';
	$lang['strreportbug'] = 'Rapportera ett fel';
	$lang['strviewfaq'] = 'Visa Fr&aring;gor &amp; Svar';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Logga in';
	$lang['strloginfailed'] = 'Inloggningen misslyckades';
	$lang['strlogindisallowed'] = 'Inloggningen ej till&aring;ten';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Logga ut';
	$lang['strowner'] = '&Auml;gare';
	$lang['straction'] = '&Aring;tg&auml;rd';
	$lang['stractions'] = '&Aring;tg&auml;rder';
	$lang['strname'] = 'Namn';
	$lang['strdefinition'] = 'Definition';
	$lang['strproperties'] = 'Egenskaper';
	$lang['strbrowse'] = 'Bl&auml;ddra';
	$lang['strdrop'] = 'Ta bort';
	$lang['strdropped'] = 'Borttagen';
	$lang['strnull'] = 'Ingenting';
	$lang['strnotnull'] = 'Inte Ingenting';
	$lang['strfirst'] = '&lt;&lt; F&ouml;rsta';
	$lang['strlast'] = 'Sista &gt;&gt;';
	$lang['strprev'] = 'F&ouml;reg&aring;ende';
	$lang['strfailed'] = 'Misslyckades';
	$lang['strnext'] = 'N&auml;sta';
	$lang['strcreate'] = 'Skapa';
	$lang['strcreated'] = 'Skapad';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'L&auml;ngd';
	$lang['strdefault'] = 'Standardv&auml;rde';
	$lang['stralter'] = '&Auml;ndra';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = '&Aring;ngra';
	$lang['strsave'] = 'Spara';
	$lang['strreset'] = 'Nollst&auml;ll';
	$lang['strinsert'] = 'Infoga';
	$lang['strselect'] = 'V&auml;lj';
	$lang['strdelete'] = 'Radera';
	$lang['strupdate'] = 'Uppdatera';
	$lang['strreferences'] = 'Referencer';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nej';
	$lang['strtrue'] = 'Sant';
	$lang['strfalse'] = 'Falskt';
	$lang['stredit'] = 'Redigera';
	$lang['strcolumns'] = 'Kolumner';
	$lang['strrows'] = 'Rad(er)';
	$lang['strrowsaff'] = 'Rad(er) P&aring;verkade.';
	$lang['strobjects'] = 'Objekt';
	$lang['strexample'] = 't. ex.';
	$lang['strback'] = 'Bak&aring;t';
	$lang['strqueryresults'] = 'S&ouml;kresultat';
	$lang['strshow'] = 'Visa';
	$lang['strempty'] = 'Tom';
	$lang['strlanguage'] = 'Spr&aring;k';
	$lang['strencoding'] = 'Kodning';
	$lang['strvalue'] = 'V&auml;rde';
	$lang['strunique'] = 'Unik';
	$lang['strprimary'] = 'Prim&auml;r';
	$lang['strexport'] = 'Exportera';
	$lang['strimport'] = 'Importera';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'K&ouml;r';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'St&auml;da upp';
	$lang['stranalyze'] = 'Analysera';
	$lang['strcluster'] = 'Kluster';
	$lang['strclustered'] = 'Klustrat?';
	$lang['strreindex'] = '&Aring;terindexera';
	$lang['strrun'] = 'K&ouml;r';
	$lang['stradd'] = 'L&auml;gg till';
	$lang['strinstead'] = 'G&ouml;r Ist&auml;llet';
	$lang['strevent'] = 'H&auml;ndelse';
	$lang['strformat'] = 'Format';
	$lang['strwhen'] = 'N&auml;r';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Bekr&auml;fta';
	$lang['strexpression'] = 'Uttryck';
	$lang['strellipsis'] = '...';
	$lang['strwhere'] = 'N&auml;r';
	$lang['strexplain'] = 'F&ouml;rklara';
	$lang['strfind'] = 'S&ouml;k';
	$lang['stroptions'] = 'Alternativ';
	$lang['strrefresh'] = 'Uppdatera';
	$lang['strcollapse'] = 'F&ouml;rminska';
	$lang['strexpand'] = 'Ut&ouml;ka';
	$lang['strdownload'] = 'Ladda ner';
	$lang['strdownloadgzipped'] = 'Ladda ner komprimerat med gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avancerat';
	$lang['strvariables'] = 'Variabler';
	$lang['strprocess'] = 'Process';
	$lang['strprocesses'] = 'Processer';
	$lang['strsetting'] = 'Inst&auml;llning';
	$lang['strparameters'] = 'Parametrar';

	// Error handling
	$lang['strnoframes'] = 'Du beh&ouml;ver en webl&auml;sare som st&ouml;der frames f&ouml;r att anv&auml;nda detta program.';
	$lang['strnotloaded'] = 'Du har inte kompilerat in korrekt databasst&ouml;d i din PHP-installation.';
	$lang['strbadconfig'] = 'Din config.inc.php &auml;r ej uppdaterad. Du m&aring;ste &aring;terskapa den fr&aring;n den nya config.inc.php-dist.';
	$lang['strbadencoding'] = 'Misslyckades att s&auml;tta klientkodning i databasen.';
	$lang['strbadschema'] = 'Otill&aring;tet schema angett.';
	$lang['strinstatement'] = 'I p&aring;st&aring;ende:';
	$lang['strsqlerror'] = 'SQL fel:';
	$lang['strinvalidparam'] = 'Otill&aring;tna scriptparametrar.';
	$lang['strnodata'] = 'Hittade inga rader.';
	$lang['strnoobjects'] = 'Hittade inga objekt.';
	$lang['strrownotunique'] = 'Ingen unik nyckel f&ouml;r denna rad.';
	$lang['strnoreportsdb'] = 'Du har inte skapat n&aring;gon rapportdatabas. L&auml;s filen INSTALL f&ouml;r instruktioner.';

	// Tables
	$lang['strtable'] = 'Tabell';
	$lang['strtables'] = 'Tabeller';
	$lang['strshowalltables'] = 'Visa alla tabeller';
	$lang['strnotables'] = 'Hittade inga tabeller.';
	$lang['strnotable'] = 'Hittade ingen tabell.';
	$lang['strcreatetable'] = 'Skapa tabell';
	$lang['strtablename'] = 'Tabellnamn';
	$lang['strtableneedsname'] = 'Du m&aring;ste ge ett namn till din tabell.';
	$lang['strtableneedsfield'] = 'Du m&aring;ste ange minst ett f&auml;lt.';
	$lang['strtableneedscols'] = 'tabeller kr&auml;ver ett till&aring;tet antal kolumner.';
	$lang['strtablecreated'] = 'Tabell skapad.';
	$lang['strtablecreatedbad'] = 'Misslyckades med att skapa Tabell.';
	$lang['strconfdroptable'] = '&Auml;r du s&auml;ker p&aring; att du vill ta bort tabellen &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabellen borttagen.';
	$lang['strinsertrow'] = 'Infoga rad';
	$lang['strtabledroppedbad'] = 'Misslyckades med att ta bort tabellen.';
	$lang['strrowinserted'] = 'Rad infogad.';
	$lang['strconfemptytable'] = '&Auml;r du s&auml;ker p&aring; att du vill t&ouml;mma tabellen &quot;%s&quot;?';
	$lang['strrowupdated'] = 'Rad uppdaterad.';
	$lang['strrowinsertedbad'] = 'Misslyckades att infoga rad.';
	$lang['strtableemptied'] = 'Tabellen t&ouml;md.';
	$lang['strrowupdatedbad'] = 'Misslyckades att uppdatera rad.';
	$lang['streditrow'] = '&Auml;ndra rad';
	$lang['strrowdeleted'] = 'Rad raderad.';
	$lang['strrowdeletedbad'] = 'Misslyckades att radera rad.';
	$lang['strfield'] = 'F&auml;lt';
	$lang['strconfdeleterow'] = '&Auml;r du s&auml;ker p&aring; att du vill ta bort denna rad?';
	$lang['strnumfields'] = 'Antal f&auml;lt';
	$lang['strsaveandrepeat'] = 'Infoga &amp; Upprepa';
	$lang['strtableemptiedbad'] = 'Misslyckades med att t&ouml;mma tabellen';
	$lang['strdeleterow'] = 'Radera rad';
	$lang['strfields'] = 'F&auml;lt';
	$lang['strfieldneedsname'] = 'Du m&aring;ste namnge f&auml;ltet';
	$lang['strcolumndropped'] = 'Kolumn raderad.';
	$lang['strselectallfields'] = 'V&auml;lj alla f&auml;lt';
	$lang['strselectneedscol'] = 'Du m&aring;ste visa minst en kolumn';
	$lang['strselectunary'] = 'Un&auml;ra operander kan ej ha v&auml;rden.';
	$lang['strcolumnaltered'] = 'Kolumn &auml;ndrad.';
	$lang['straltercolumn'] = '&Auml;ndra kolumn';
	$lang['strcolumnalteredbad'] = 'Misslyckades att &auml;ndra kolumn.';
	$lang['strconfdropcolumn'] = '&Auml;r du s&auml;ker p&aring; att du vill radera kolumn &quot;%s&quot; fr&aring;n tabell &quot;%s&quot;?';
	$lang['strcolumndroppedbad'] = 'Misslyckades att radera kolumn.';
	$lang['straddcolumn'] = 'L&auml;gg till kolumn';
	$lang['strcolumnadded'] = 'Kolumn inlagd.';
	$lang['strcolumnaddedbad'] = 'Misslyckades att l&auml;gga till kolumne.';
	$lang['strcascade'] = 'KASKAD';
	$lang['strdataonly'] = 'Endast Data';
	$lang['strtablealtered'] = 'Tabell &auml;ndrad.';
	$lang['strtablealteredbad'] = 'Misslyckades att &auml;ndra tabell.';
	
	// Users
	$lang['struser'] = 'Anv&auml;ndare';
	$lang['strusers'] = 'Anv&auml;ndare';
	$lang['strusername'] = 'Anv&auml;ndarnamn';
	$lang['strpassword'] = 'L&ouml;senord';
	$lang['strsuper'] = 'Superanv&auml;ndare?';
	$lang['strcreatedb'] = 'Skapa Databas?';
	$lang['strexpires'] = 'Utg&aring;ngsdatum';
	$lang['strsessiondefaults'] = 'Sessionsinst&auml;llningar';
	$lang['strnewname'] = 'Nytt namn';
	$lang['strnousers'] = 'Hittade inga anv&auml;ndare.';
	$lang['strrename'] = 'D&ouml;p om';
	$lang['struserrenamed'] = 'Anv&auml;ndarnamn &auml;ndrat.';
	$lang['struserrenamedbad'] = 'Misslyckades att d&ouml;pa om anv&auml;ndare.';
	$lang['struserupdated'] = 'Anv&auml;ndare uppdaterad.';
	$lang['struserupdatedbad'] = 'Misslyckades att uppdatera anv&auml;ndare.';
	$lang['strshowallusers'] = 'Visa alla anv&auml;ndare';
	$lang['strcreateuser'] = 'Skapa anv&auml;ndare';
	$lang['struserneedsname'] = 'Du m&aring;ste namnge anv&auml;ndaren.';
	$lang['strconfdropuser'] = '&Auml;r du s&auml;ker p&aring; att du vill radera anv&auml;ndaren &quot;%s&quot;?';
	$lang['strusercreated'] = 'Anv&auml;ndare skapad.';
	$lang['strusercreatedbad'] = 'Misslyckades att skapa anv&auml;ndare.';
	$lang['struserdropped'] = 'Anv&auml;ndare raderad.';
	$lang['struserdroppedbad'] = 'Misslyckades att radera anv&auml;ndare.';
	$lang['straccount'] = 'Konton';
	$lang['strchangepassword'] = '&Auml;ndra l&ouml;senord';
	$lang['strpasswordchanged'] = 'L&ouml;senord &auml;ndrat.';
	$lang['strpasswordchangedbad'] = 'Misslyckades att &auml;ndra l&ouml;senord.';
	$lang['strpasswordshort'] = 'F&ouml;r f&aring; tecken i l&ouml;senordet.';
	$lang['strpasswordconfirm'] = 'L&ouml;senordet &auml;r inte samma som bekr&auml;ftelsen.';
	$lang['strgroup'] = 'Grupp';
	$lang['strgroups'] = 'Grupper';
	$lang['strnogroup'] = 'Hittade ej grupp.';
	$lang['strnogroups'] = 'Hittade inga grupper.';
	$lang['strcreategroup'] = 'Skapa grupp';
	$lang['strshowallgroups'] = 'Visa alla grupper';
	$lang['strgroupneedsname'] = 'Du m&aring;ste namnge din grupp.';
	$lang['strgroupcreated'] = 'Grupp skapad.';
	$lang['strgroupdropped'] = 'Grupp raderad.';
	$lang['strgroupcreatedbad'] = 'Misslyckades att skapa grupp.';	
	$lang['strconfdropgroup'] = '&Auml;r du s&auml;ker p&aring; att du vill radera grupp &quot;%s&quot;?';
	$lang['strprivileges'] = 'Privilegier';
	$lang['strgrant'] = 'Till&aring;t';
	$lang['strgranted'] = 'Privilegier &auml;ndrade.';
	$lang['strgroupdroppedbad'] = 'Misslyckades att radera grupp.';
	$lang['straddmember'] = 'L&auml;gg till medlem';
	$lang['strmemberadded'] = 'Medlem inlagd.';
	$lang['strmemberaddedbad'] = 'Misslyckades att l&auml;gga till medlem.';
	$lang['strdropmember'] = 'Radera medlem';
	$lang['strconfdropmember'] = '&Auml;r du s&auml;ker p&aring; att du vill radera medlem &quot;%s&quot; fr&aring;n gruppen &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Medlem raderad.';
	$lang['strmemberdroppedbad'] = 'Misslyckades att radera medlem.';
	$lang['strprivilege'] = 'R&auml;ttighet';
	$lang['strnoprivileges'] = 'Detta objekt har standard &auml;garr&auml;ttigheter.';
	$lang['strmembers'] = 'Medelemmar';
	$lang['strrevoke'] = 'Ta tillbaka';
	$lang['strgrantbad'] = 'Du m&aring;ste ange minst en anv&auml;ndare eller grupp och minst ett privilegium.';
	$lang['strgrantfailed'] = 'Misslyckades att &auml;ndra r&auml;ttigheter.';
	$lang['stralterprivs'] = '&Auml;ndra r&auml;ttigheter';
	$lang['strdatabase'] = 'Databas';
	$lang['strdatabasedropped'] = 'Databas raderad.';
	$lang['strdatabases'] = 'Databaser';
	$lang['strentersql'] = 'Ange SQL att k&ouml;ra:';
	$lang['strgrantor'] = 'Tillst&aring;ndsgivare';
	$lang['strasterisk'] = '*';
	$lang['strshowalldatabases'] = 'Visa alla databaser';
	$lang['strnodatabase'] = 'Hittade ingen databas.';
	$lang['strnodatabases'] = 'Hittade inga databaser.';
	$lang['strcreatedatabase'] = 'Skapa databas';
	$lang['strdatabasename'] = 'Databasnamn';
	$lang['strdatabaseneedsname'] = 'Du m&aring;ste namnge databasen.';
	$lang['strdatabasecreated'] = 'Databas skapad.';
	$lang['strdatabasecreatedbad'] = 'Misslyckades att skapa databas.';	
	$lang['strconfdropdatabase'] = '&Auml;r du s&auml;ker p&aring; att du vill radera databas &quot;%s&quot;?';
	$lang['strdatabasedroppedbad'] = 'Misslyckades att radera databas.';
	$lang['strsqlexecuted'] = 'SQL-kommando utf&ouml;rt.';
	$lang['strvacuumgood'] = 'Uppst&auml;dning utf&ouml;rd.';
	$lang['strvacuumbad'] = 'Uppst&auml;dning misslyckades.';
	$lang['stranalyzegood'] = 'Analysen lyckades.';
	$lang['stranalyzebad'] = 'Analysen misslyckades.';
	$lang['strstructureonly'] = 'Endast struktur';
	$lang['strstructureanddata'] = 'Struktur och data';

	// Views
	$lang['strview'] = 'Vy';
	$lang['strviews'] = 'Vyer';
	$lang['strshowallviews'] = 'Visa alla vyer';
	$lang['strnoview'] = 'Hittade ingen vy.';
	$lang['strnoviews'] = 'Hittade inga vyer.';
	$lang['strcreateview'] = 'Skapa vy';
	$lang['strviewname'] = 'Vynamn';
	$lang['strviewneedsname'] = 'Du m&aring;ste namnge Vy.';
	$lang['strviewneedsdef'] = 'Du m&aring;ste ange en definition f&ouml;r din vy.';
	$lang['strviewcreated'] = 'Vy skapad.';
	$lang['strviewcreatedbad'] = 'Misslyckades att skapa vy.';
	$lang['strconfdropview'] = '&Auml;r du s&auml;ker p&aring; att du vill radera vyn &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vy raderad.';
	$lang['strviewdroppedbad'] = 'Misslyckades att radera vy.';
	$lang['strviewupdated'] = 'Vy uppdaterad.';
	$lang['strviewupdatedbad'] = 'Misslyckades att uppdatera vy.';
	$lang['strviewlink'] = 'L&auml;nkade nycklar';
	$lang['strviewconditions'] = 'Ytterligare villkor';

	// Sequences
	$lang['strsequence'] = 'F&ouml;ljd';
	$lang['strsequences'] = 'F&ouml;ljder';
	$lang['strshowallsequences'] = 'Visa alla f&ouml;ljder';
	$lang['strnosequence'] = 'Hittade ingen f&ouml;ljd.';
	$lang['strnosequences'] = 'Hittade inga f&ouml;ljder.';
	$lang['strcreatesequence'] = 'Skapa f&ouml;ljd';
	$lang['strlastvalue'] = 'Sista v&auml;rde';
	$lang['strincrementby'] = '&Ouml;ka med';
	$lang['strstartvalue'] = 'Startv&auml;rde';
	$lang['strmaxvalue'] = 'St&ouml;rsta v&auml;rde';
	$lang['strminvalue'] = 'Minsta v&auml;rde';
	$lang['strcachevalue'] = 'V&auml;rde p&aring; cache';
	$lang['strlogcount'] = 'R&auml;kna log';
	$lang['striscycled'] = '&Auml;r upprepad?';
	$lang['striscalled'] = '&Auml;r kallad?';
	$lang['strsequenceneedsname'] = 'Du m&aring;ste ge ett namn till din f&ouml;ljd.';
	$lang['strsequencecreated'] = 'F&ouml;ljd skapad.';
	$lang['strsequencecreatedbad'] = 'Misslyckades att skapa f&ouml;ljd.'; 
	$lang['strconfdropsequence'] = '&Auml;r du s&auml;ker p&aring; att du vill radera f&ouml;ljden &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'F&ouml;ljden borrtagen.';
	$lang['strsequencedroppedbad'] = 'Misslyckades att radera f&ouml;ljd.';

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strshowallindexes'] = 'Visa alla index';
	$lang['strnoindex'] = 'Hittade inget index.';
	$lang['strsequencereset'] = 'Nollst&auml;ll f&ouml;ljd.';
	$lang['strsequenceresetbad'] = 'Misslyckades att nollst&auml;lla f&ouml;ljd.';
	$lang['strnoindexes'] = 'Hittade inga index.';
	$lang['strcreateindex'] = 'Skapa index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtabname'] = 'Tabellnamn';
	$lang['strcolumnname'] = 'Kolumnnamn';
	$lang['strindexneedsname'] = 'Du m&aring;ste ge ett namn f&ouml;r ditt index';
	$lang['strindexneedscols'] = 'Det kr&auml;vs ett giltigt antal kolumner f&ouml;r index.';
	$lang['strindexcreated'] = 'Index skapat';
	$lang['strindexcreatedbad'] = 'Misslyckades att skapa index.';
	$lang['strconfdropindex'] = '&Auml;r du s&auml;ker p&aring; att du vill radera index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index raderat.';
	$lang['strindexdroppedbad'] = 'Misslyckades att radera index.';
	$lang['strkeyname'] = 'Nyckelv&auml;rdesnamn';
	$lang['struniquekey'] = 'Unikt nyckelv&auml;rde';
	$lang['strprimarykey'] = 'Prim&auml;rnyckel';
 	$lang['strindextype'] = 'Typ av index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtablecolumnlist'] = 'Tabellkolumner';
	$lang['strindexcolumnlist'] = 'Indexkolumner';
	$lang['strconfcluster'] = '&Auml;r du s&auml;ker p&aring; att du vill klustra &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Klustring avslutad.';
	$lang['strclusteredbad'] = 'Klustring misslyckades.';

	// Rules
	$lang['strrules'] = 'Regler';
	$lang['strrule'] = 'Regel';
	$lang['strshowallrules'] = 'Visa alla regler';
	$lang['strnorule'] = 'Hittade ingen regel.';
	$lang['strnorules'] = 'Hittade inga regler.';
	$lang['strcreaterule'] = 'Skapa regel';
	$lang['strrulename'] = 'Regelnamn';
	$lang['strruleneedsname'] = 'Du m&aring;ste ge ett namn till din regel.';
	$lang['strrulecreated'] = 'Regel skapad.';
	$lang['strrulecreatedbad'] = 'Misslyckades att skapa regel.';
	$lang['strconfdroprule'] = '&Auml;r du s&auml;ker p&aring; att du vill radera regel &quot;%s&quot; f&ouml;r &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regel raderat.';
	$lang['strruledroppedbad'] = 'Misslyckades att radera regel.';

	// Constraints
	$lang['strconstraints'] = 'Begr&auml;nsningar';
	$lang['strshowallconstraints'] = 'Visa alla begr&auml;nsningar';
	$lang['strnoconstraints'] = 'Hittade inga begr&auml;nsningar.';
	$lang['strcreateconstraint'] = 'Skapa begr&auml;nsning';
	$lang['strconstraintcreated'] = 'Begr&auml;nsning skapad.';
	$lang['strconstraintcreatedbad'] = 'Misslyckades att skapa begr&auml;nsning.';
	$lang['strconfdropconstraint'] = '&Auml;r du s&auml;ker p&aring; att du vill radera begr&auml;nsning &quot;%s&quot; f&ouml;r &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Begr&auml;nsning raderad.';
	$lang['strconstraintdroppedbad'] = 'Misslyckades att radera begr&auml;nsning.';
	$lang['straddcheck'] = 'L&auml;gg till en koll';
	$lang['strcheckneedsdefinition'] = 'En kollbegr&auml;nsning beh&ouml;ver definieras.';
	$lang['strcheckadded'] = 'Kollbegr&auml;nsning inlagd.';
	$lang['strcheckaddedbad'] = 'Misslyckades att l&auml;gga till en koll.';
	$lang['straddpk'] = 'L&auml;gg till prim&auml;rnyckel';
	$lang['strpkneedscols'] = 'Prim&auml;rnyckel beh&ouml;ver minst en kolumn.';
	$lang['strpkadded'] = 'Prim&auml;rnyckel inlagd.';
	$lang['strpkaddedbad'] = 'Misslyckades att l&auml;gga till prim&auml;rnyckel.';
	$lang['stradduniq'] = 'L&auml;gg till Unikt nyckelv&auml;rde';
	$lang['struniqneedscols'] = 'Unikt nyckelv&auml;rde beh&ouml;ver minst en kolumn.';
	$lang['struniqadded'] = 'Unikt nyckelv&auml;rde inlagt.';
	$lang['struniqaddedbad'] = 'Misslyckades att l&auml;gga till unikt nyckelv&auml;rde.';
	$lang['straddfk'] = 'L&auml;gg till utomst&aring;ende nyckel';
	$lang['strfkneedscols'] = 'Utomst&aring;ende nyckel beh&ouml;ver minst en kolumn.';
	$lang['strfkneedstarget'] = 'Utomst&aring;ende nycket beh&ouml;ver en m&aring;ltabell.';
	$lang['strfkadded'] = 'Utomst&aring;ende nyckel inlagd.';
	$lang['strfkaddedbad'] = 'Misslyckades att l&auml;gga till utomst&aring;ende nyckel.';
	$lang['strfktarget'] = 'M&aring;ltabell';
	$lang['strfkcolumnlist'] = 'Kolumner i nyckel';
	$lang['strondelete'] = 'VID RADERING';
	$lang['stronupdate'] = 'VID UPPDATERING';

	// Functions
	$lang['strfunction'] = 'Funktion';
	$lang['strfunctions'] = 'Funktioner';
	$lang['strshowallfunctions'] = 'Visa alla funktioner';
	$lang['strnofunction'] = 'Hittade ingen funktion.';
	$lang['strnofunctions'] = 'Hittade inga funktioner.';
	$lang['strcreatefunction'] = 'Skapa funktion';
	$lang['strfunctionname'] = 'Funktionsnamn';
	$lang['strreturns'] = '&Aring;terger';
	$lang['strarguments'] = 'Argument';
	$lang['strfunctionneedsname'] = 'Du m&aring;ste namnge din funktion.';
	$lang['strfunctionneedsdef'] = 'Du m&aring;ste definiera din funktion.';
	$lang['strfunctioncreated'] = 'Funktion skapad.';
	$lang['strfunctioncreatedbad'] = 'Misslyckades att skapa funktion.';
	$lang['strconfdropfunction'] = '&Auml;r du s&auml;ker p&aring; att du vill radera funktionen &quot;%s&quot;?';
	$lang['strproglanguage'] = 'Programmeringsspr&aring;k';
	$lang['strfunctiondropped'] = 'Funktionen raderad.';
	$lang['strfunctiondroppedbad'] = 'Misslyckades att radera funktion.';
	$lang['strfunctionupdated'] = 'Funktion uppdaterad.';
	$lang['strfunctionupdatedbad'] = 'Misslyckades att uppdatera funktion.';

	// Triggers
	$lang['strtrigger'] = 'Mekanism';
	$lang['strtriggers'] = 'Mekanismer';
	$lang['strshowalltriggers'] = 'Visa alla Mekanismer';
	$lang['strnotrigger'] = 'Hittade ingen mekanism.';
	$lang['strnotriggers'] = 'Hittade inga mekanismer.';
	$lang['strcreatetrigger'] = 'Skapa mekanism';
	$lang['strtriggerneedsname'] = 'Du m&aring;ste namnge din mekanism.';
	$lang['strtriggerneedsfunc'] = 'Du m&aring;ste specificera en funktion f&ouml;r din mekanism.';
	$lang['strtriggercreated'] = 'Mekanism skapad.';
	$lang['strtriggerdropped'] = 'Mekanism raderad.';
	$lang['strtriggercreatedbad'] = 'Misslyckades att skapa mekanism.';
	$lang['strconfdroptrigger'] = '&Auml;r du s&auml;ker p&aring; att du vill radera mekanismen &quot;%s&quot; p&aring; &quot;%s&quot;?';
	$lang['strtriggerdroppedbad'] = 'Misslyckades att radera mekanism.';
	
	// Types
	$lang['strtype'] = 'Typ';
	$lang['strstorage'] = 'Lagring';
	$lang['strtriggeraltered'] = 'Mekanism &auml;ndrad.';
	$lang['strtriggeralteredbad'] = 'Misslyckades att &auml;ndra mekanism.';
	$lang['strtypes'] = 'Typer';
	$lang['strtypeneedslen'] = 'Du m&aring;ste ange typens l&auml;ngd.';
	$lang['strshowalltypes'] = 'Visa alla typer';
	$lang['strnotype'] = 'Hittade ingen typ.';
	$lang['strnotypes'] = 'Hittade inga typer.';
	$lang['strcreatetype'] = 'Skapa typ';
	$lang['strtypename'] = 'Namn p&aring; typen';
	$lang['strinputfn'] = 'Infogande funktion';
	$lang['stroutputfn'] = 'Funktion f&ouml;r utv&auml;rden';
	$lang['strpassbyval'] = 'Genomg&aring;tt utv&auml;rdering?';
	$lang['stralignment'] = 'Justering';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Avgr&auml;nsare';
	$lang['strtypeneedsname'] = 'Du m&aring;ste namnge din typ.';
	$lang['strtypecreated'] = 'Typ skapad';
	$lang['strtypecreatedbad'] = 'Misslyckades att skapa typ.';
	$lang['strconfdroptype'] = '&Auml;r du s&auml;ker p&aring; att du vill radera typen &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Typ raderad.';
	$lang['strtypedroppedbad'] = 'Misslyckades att radera typ.';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Scheman';
	$lang['strshowallschemas'] = 'Visa alla scheman';
	$lang['strnoschema'] = 'Hittade inget schema.';
	$lang['strnoschemas'] = 'Hittade inga scheman.';
	$lang['strcreateschema'] = 'Skapa Schema';
	$lang['strschemaname'] = 'Schemanamn';
	$lang['strschemaneedsname'] = 'Du m&aring;ste namnge ditt Schema.';
	$lang['strschemacreated'] = 'Schema skapat';
	$lang['strschemacreatedbad'] = 'Misslyckades att skapa schema.';
	$lang['strconfdropschema'] = '&Auml;r du s&auml;ker p&aring; att du vill radera schemat &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schema raderat.';
	$lang['strschemadroppedbad'] = 'Misslyckades att radera schema.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapporter';
	$lang['strshowallreports'] = 'Visa alla rapporter';
	$lang['strtopbar'] = '%s k&ouml;rs p&aring; %s:%s -- Du &auml;r inloggad som anv&auml;ndare &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strnoreports'] = 'Hittade inga rapporter.';
	$lang['strcreatereport'] = 'Skapa rapport';
	$lang['strreportdropped'] = 'Rapport skapad.';
	$lang['strreportcreated'] = 'Rapport sparad.';
	$lang['strreportneedsname'] = 'Du m&aring;ste namnge din rapport.';
	$lang['strreportcreatedbad'] = 'Misslyckades att spara rapport.';
	$lang['strreportdroppedbad'] = 'Misslyckades att skapa rapport.';
	$lang['strconfdropreport'] = '&Auml;r du s&auml;ker p&aring; att du vill radera rapporten &quot;%s&quot;?';
	$lang['strreportneedsdef'] = 'Du m&aring;ste ange din SQL-fr&aring;ga.';
	
	// Domains
	$lang['strdomain'] = 'Dom&auml;n';
	$lang['strdomains'] = 'Dom&auml;ner';
	$lang['strshowalldomains'] = 'Visa alla dom&auml;ner';
	$lang['strnodomains'] = 'Hittade inga dom&auml;ner.';
	$lang['strcreatedomain'] = 'Skapa dom&auml;n';
	$lang['strdomaindropped'] = 'Dom&auml;n raderad.';
	$lang['strdomaindroppedbad'] = 'Misslyckades att radera dom&auml;n.';
	$lang['strconfdropdomain'] = '&Auml;r du s&auml;ker p&aring; att du vill radera dom&auml;nen &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Du m&aring;ste ange ett dom&auml;nnamn.';
	$lang['strdomaincreated'] = 'Dom&auml;n skapad.';
	$lang['strdomaincreatedbad'] = 'Misslyckades att skapa dom&auml;n.';
	$lang['strdomainaltered'] = 'Dom&auml;n &auml;ndrad.';
	$lang['strdomainalteredbad'] = 'Misslyckades att &auml;ndra dom&auml;n.';
	
	// Operators
	$lang['stroperator'] = 'Operand';
	$lang['stroperators'] = 'Operander';
	$lang['strshowalloperators'] = 'Visa alla operander';
	$lang['strnooperator'] = 'Hittade ingen operand.';
	$lang['strnooperators'] = 'Hittade inga operander.';
	$lang['strcreateoperator'] = 'Skapa operand';
	$lang['strleftarg'] = 'Arg Typ V&auml;nster';
	$lang['strrightarg'] = 'Arg Typ H&ouml;ger';
	$lang['strcommutator'] = 'V&auml;xlare';
	$lang['strnegator'] = 'Negerande';
	$lang['strrestrict'] = 'Sp&auml;rra';
	$lang['strjoin'] = 'Sl&aring; ihop';
	$lang['strhashes'] = 'Hashtabeller';
	$lang['strmerges'] = 'Sammanslagningar';
	$lang['strleftsort'] = 'Sortera v&auml;nster';
	$lang['strrightsort'] = 'Sortera h&ouml;ger';
	$lang['strlessthan'] = 'Mindre &auml;n';
	$lang['strgreaterthan'] = 'St&ouml;rre &auml;n';
	$lang['stroperatorneedsname'] = 'Du m&aring;ste namnge operanden.';
	$lang['stroperatorcreated'] = 'Operand skapad';
	$lang['stroperatorcreatedbad'] = 'Misslyckades att skapa operand.';
	$lang['strconfdropoperator'] = '&Auml;r du s&auml;ker p&aring; att du vill radera operanden &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operand raderad.';
	$lang['stroperatordroppedbad'] = 'Misslyckades att radera operand.';

	// Casts
	$lang['strcasts'] = 'Typomvandlingar';
	$lang['strnocasts'] = 'Hittade inga typomvandlingar.';
	$lang['strsourcetype'] = 'K&auml;lltyp';
	$lang['strtargettype'] = 'M&aring;ltyp';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'Tilldelat i';
	$lang['strbinarycompat'] = '(Bin&auml;rt kompatibel)';
	
	// Conversions
	$lang['strconversions'] = 'Omkodningar';
	$lang['strnoconversions'] = 'Hittade inga omkodningar.';
	$lang['strsourceencoding'] = 'K&auml;llkodning';
	$lang['strtargetencoding'] = 'M&aring;lkodning';
	
	// Languages
	$lang['strlanguages'] = 'Spr&aring;k';
	$lang['strnolanguages'] = 'Hittade inga spr&aring;k.';
	$lang['strtrusted'] = 'P&aring;litlig(a)';
	
	// Info
	$lang['strnoinfo'] = 'Ingen information tillg&auml;nglig.';
	$lang['strreferringtables'] = 'Refererande tabeller';
	$lang['strparenttables'] = 'Ovanst&aring;ende tabeller';
	$lang['strchildtables'] = 'Underliggande tabeller';

	// Aggregates
	$lang['straggregates'] = 'Sammanslagningar';
	$lang['strnoaggregates'] = 'Hittade inga sammanslagningar.';
	$lang['stralltypes'] = '(Alla typer)';
	
	// Operator Classes
	$lang['stropclasses'] = 'Op Klasser';
	$lang['strnoopclasses'] = 'Hittade inga operandklasser.';
	$lang['straccessmethod'] = 'Kopplingsmetod';
	
	// Stats and performance
	$lang['strrowperf'] = 'Radprestanda';
	$lang['strioperf'] = 'I/O Prestanda';
	$lang['stridxrowperf'] = 'Index Radprestanda';
	$lang['stridxioperf'] = 'Index I/O Prestanda';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sekventiell';
	$lang['strscan'] = 'Scanna';
	$lang['strread'] = 'L&auml;s';
	$lang['strfetch'] = 'H&auml;mta';
	$lang['strheap'] = 'Bunt';
	$lang['strtoast'] = 'Br&auml;nn';
	$lang['strtoastindex'] = 'Br&auml;nn Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = 'Rader';

	// Miscellaneous
	$lang['strtopbar'] = '%s K&ouml;rs p&aring; %s:%s -- Du &auml;r inloggad som anv&auml;ndare &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Hj&auml;lp';

?>
