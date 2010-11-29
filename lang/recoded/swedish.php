<?php

	/**
	 * Swedish language file for phpPgAdmin.
	 * maintainer S. Malmqvist &lt;samoola@slak.nu&gt;
	 * Due to lack of SQL knowledge som translations may be wrong, mail me the correct one and ill fix it
	 *
	 * $Id: swedish.php,v 1.11 2007/04/24 11:42:07 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Swedish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'sv_SE';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'V&#228;lkommen till phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmins Hemsida';
	$lang['strpgsqlhome'] = 'PostgreSQLs Hemsida';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQLs Dokumentation (lokalt)';
	$lang['strreportbug'] = 'Rapportera ett fel';
	$lang['strviewfaq'] = 'Visa Fr&#229;gor &amp; Svar';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Logga in';
	$lang['strloginfailed'] = 'Inloggningen misslyckades';
	$lang['strlogindisallowed'] = 'Inloggningen ej till&#229;ten';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Logga ut';
	$lang['strowner'] = '&#196;gare';
	$lang['straction'] = '&#197;tg&#228;rd';
	$lang['stractions'] = '&#197;tg&#228;rder';
	$lang['strname'] = 'Namn';
	$lang['strdefinition'] = 'Definition';
	$lang['strproperties'] = 'Egenskaper';
	$lang['strbrowse'] = 'Bl&#228;ddra';
	$lang['strdrop'] = 'Ta bort';
	$lang['strdropped'] = 'Borttagen';
	$lang['strnull'] = 'Ingenting';
	$lang['strnotnull'] = 'Inte Ingenting';
	$lang['strfirst'] = '&lt;&lt; F&#246;rsta';
	$lang['strlast'] = 'Sista &gt;&gt;';
	$lang['strprev'] = 'F&#246;reg&#229;ende';
	$lang['strfailed'] = 'Misslyckades';
	$lang['strnext'] = 'N&#228;sta';
	$lang['strcreate'] = 'Skapa';
	$lang['strcreated'] = 'Skapad';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'L&#228;ngd';
	$lang['strdefault'] = 'Standardv&#228;rde';
	$lang['stralter'] = '&#196;ndra';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = '&#197;ngra';
	$lang['strsave'] = 'Spara';
	$lang['strreset'] = 'Nollst&#228;ll';
	$lang['strinsert'] = 'Infoga';
	$lang['strselect'] = 'V&#228;lj';
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
	$lang['strrowsaff'] = 'Rad(er) P&#229;verkade.';
	$lang['strobjects'] = 'Objekt';
	$lang['strexample'] = 't. ex.';
	$lang['strback'] = 'Bak&#229;t';
	$lang['strqueryresults'] = 'S&#246;kresultat';
	$lang['strshow'] = 'Visa';
	$lang['strempty'] = 'Tom';
	$lang['strlanguage'] = 'Spr&#229;k';
	$lang['strencoding'] = 'Kodning';
	$lang['strvalue'] = 'V&#228;rde';
	$lang['strunique'] = 'Unik';
	$lang['strprimary'] = 'Prim&#228;r';
	$lang['strexport'] = 'Exportera';
	$lang['strimport'] = 'Importera';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'K&#246;r';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'St&#228;da upp';
	$lang['stranalyze'] = 'Analysera';
	$lang['strclusterindex'] = 'Kluster';
	$lang['strclustered'] = 'Klustrat?';
	$lang['strreindex'] = '&#197;terindexera';
	$lang['strrun'] = 'K&#246;r';
	$lang['stradd'] = 'L&#228;gg till';
	$lang['strinstead'] = 'G&#246;r Ist&#228;llet';
	$lang['strevent'] = 'H&#228;ndelse';
	$lang['strformat'] = 'Format';
	$lang['strwhen'] = 'N&#228;r';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Bekr&#228;fta';
	$lang['strexpression'] = 'Uttryck';
	$lang['strellipsis'] = '...';
	$lang['strwhere'] = 'N&#228;r';
	$lang['strexplain'] = 'F&#246;rklara';
	$lang['strfind'] = 'S&#246;k';
	$lang['stroptions'] = 'Alternativ';
	$lang['strrefresh'] = 'Uppdatera';
	$lang['strcollapse'] = 'F&#246;rminska';
	$lang['strexpand'] = 'Ut&#246;ka';
	$lang['strdownload'] = 'Ladda ner';
	$lang['strdownloadgzipped'] = 'Ladda ner komprimerat med gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avancerat';
	$lang['strvariables'] = 'Variabler';
	$lang['strprocess'] = 'Process';
	$lang['strprocesses'] = 'Processer';
	$lang['strsetting'] = 'Inst&#228;llning';
	$lang['strparameters'] = 'Parametrar';

	// Error handling
	$lang['strnotloaded'] = 'Du har inte kompilerat in korrekt databasst&#246;d i din PHP-installation.';
	$lang['strbadconfig'] = 'Din config.inc.php &#228;r ej uppdaterad. Du m&#229;ste &#229;terskapa den fr&#229;n den nya config.inc.php-dist.';
	$lang['strbadencoding'] = 'Misslyckades att s&#228;tta klientkodning i databasen.';
	$lang['strbadschema'] = 'Otill&#229;tet schema angett.';
	$lang['strinstatement'] = 'I p&#229;st&#229;ende:';
	$lang['strsqlerror'] = 'SQL fel:';
	$lang['strinvalidparam'] = 'Otill&#229;tna scriptparametrar.';
	$lang['strnodata'] = 'Hittade inga rader.';
	$lang['strnoobjects'] = 'Hittade inga objekt.';
	$lang['strrownotunique'] = 'Ingen unik nyckel f&#246;r denna rad.';
	$lang['strnoreportsdb'] = 'Du har inte skapat n&#229;gon rapportdatabas. L&#228;s filen INSTALL f&#246;r instruktioner.';

	// Tables
	$lang['strtable'] = 'Tabell';
	$lang['strtables'] = 'Tabeller';
	$lang['strshowalltables'] = 'Visa alla tabeller';
	$lang['strnotables'] = 'Hittade inga tabeller.';
	$lang['strnotable'] = 'Hittade ingen tabell.';
	$lang['strcreatetable'] = 'Skapa tabell';
	$lang['strtablename'] = 'Tabellnamn';
	$lang['strtableneedsname'] = 'Du m&#229;ste ge ett namn till din tabell.';
	$lang['strtableneedsfield'] = 'Du m&#229;ste ange minst ett f&#228;lt.';
	$lang['strtableneedscols'] = 'tabeller kr&#228;ver ett till&#229;tet antal kolumner.';
	$lang['strtablecreated'] = 'Tabell skapad.';
	$lang['strtablecreatedbad'] = 'Misslyckades med att skapa Tabell.';
	$lang['strconfdroptable'] = '&#196;r du s&#228;ker p&#229; att du vill ta bort tabellen &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabellen borttagen.';
	$lang['strinsertrow'] = 'Infoga rad';
	$lang['strtabledroppedbad'] = 'Misslyckades med att ta bort tabellen.';
	$lang['strrowinserted'] = 'Rad infogad.';
	$lang['strconfemptytable'] = '&#196;r du s&#228;ker p&#229; att du vill t&#246;mma tabellen &quot;%s&quot;?';
	$lang['strrowupdated'] = 'Rad uppdaterad.';
	$lang['strrowinsertedbad'] = 'Misslyckades att infoga rad.';
	$lang['strtableemptied'] = 'Tabellen t&#246;md.';
	$lang['strrowupdatedbad'] = 'Misslyckades att uppdatera rad.';
	$lang['streditrow'] = '&#196;ndra rad';
	$lang['strrowdeleted'] = 'Rad raderad.';
	$lang['strrowdeletedbad'] = 'Misslyckades att radera rad.';
	$lang['strfield'] = 'F&#228;lt';
	$lang['strconfdeleterow'] = '&#196;r du s&#228;ker p&#229; att du vill ta bort denna rad?';
	$lang['strnumfields'] = 'Antal f&#228;lt';
	$lang['strsaveandrepeat'] = 'Infoga &amp; Upprepa';
	$lang['strtableemptiedbad'] = 'Misslyckades med att t&#246;mma tabellen';
	$lang['strdeleterow'] = 'Radera rad';
	$lang['strfields'] = 'F&#228;lt';
	$lang['strfieldneedsname'] = 'Du m&#229;ste namnge f&#228;ltet';
	$lang['strcolumndropped'] = 'Kolumn raderad.';
	$lang['strselectallfields'] = 'V&#228;lj alla f&#228;lt';
	$lang['strselectneedscol'] = 'Du m&#229;ste visa minst en kolumn';
	$lang['strselectunary'] = 'Un&#228;ra operander kan ej ha v&#228;rden.';
	$lang['strcolumnaltered'] = 'Kolumn &#228;ndrad.';
	$lang['straltercolumn'] = '&#196;ndra kolumn';
	$lang['strcolumnalteredbad'] = 'Misslyckades att &#228;ndra kolumn.';
	$lang['strconfdropcolumn'] = '&#196;r du s&#228;ker p&#229; att du vill radera kolumn &quot;%s&quot; fr&#229;n tabell &quot;%s&quot;?';
	$lang['strcolumndroppedbad'] = 'Misslyckades att radera kolumn.';
	$lang['straddcolumn'] = 'L&#228;gg till kolumn';
	$lang['strcolumnadded'] = 'Kolumn inlagd.';
	$lang['strcolumnaddedbad'] = 'Misslyckades att l&#228;gga till kolumne.';
	$lang['strcascade'] = 'KASKAD';
	$lang['strdataonly'] = 'Endast Data';
	$lang['strtablealtered'] = 'Tabell &#228;ndrad.';
	$lang['strtablealteredbad'] = 'Misslyckades att &#228;ndra tabell.';
	
	// Users
	$lang['struser'] = 'Anv&#228;ndare';
	$lang['strusers'] = 'Anv&#228;ndare';
	$lang['strusername'] = 'Anv&#228;ndarnamn';
	$lang['strpassword'] = 'L&#246;senord';
	$lang['strsuper'] = 'Superanv&#228;ndare?';
	$lang['strcreatedb'] = 'Skapa Databas?';
	$lang['strexpires'] = 'Utg&#229;ngsdatum';
	$lang['strsessiondefaults'] = 'Sessionsinst&#228;llningar';
	$lang['strnewname'] = 'Nytt namn';
	$lang['strnousers'] = 'Hittade inga anv&#228;ndare.';
	$lang['strrename'] = 'D&#246;p om';
	$lang['struserrenamed'] = 'Anv&#228;ndarnamn &#228;ndrat.';
	$lang['struserrenamedbad'] = 'Misslyckades att d&#246;pa om anv&#228;ndare.';
	$lang['struserupdated'] = 'Anv&#228;ndare uppdaterad.';
	$lang['struserupdatedbad'] = 'Misslyckades att uppdatera anv&#228;ndare.';
	$lang['strshowallusers'] = 'Visa alla anv&#228;ndare';
	$lang['strcreateuser'] = 'Skapa anv&#228;ndare';
	$lang['struserneedsname'] = 'Du m&#229;ste namnge anv&#228;ndaren.';
	$lang['strconfdropuser'] = '&#196;r du s&#228;ker p&#229; att du vill radera anv&#228;ndaren &quot;%s&quot;?';
	$lang['strusercreated'] = 'Anv&#228;ndare skapad.';
	$lang['strusercreatedbad'] = 'Misslyckades att skapa anv&#228;ndare.';
	$lang['struserdropped'] = 'Anv&#228;ndare raderad.';
	$lang['struserdroppedbad'] = 'Misslyckades att radera anv&#228;ndare.';
	$lang['straccount'] = 'Konton';
	$lang['strchangepassword'] = '&#196;ndra l&#246;senord';
	$lang['strpasswordchanged'] = 'L&#246;senord &#228;ndrat.';
	$lang['strpasswordchangedbad'] = 'Misslyckades att &#228;ndra l&#246;senord.';
	$lang['strpasswordshort'] = 'F&#246;r f&#229; tecken i l&#246;senordet.';
	$lang['strpasswordconfirm'] = 'L&#246;senordet &#228;r inte samma som bekr&#228;ftelsen.';
	$lang['strgroup'] = 'Grupp';
	$lang['strgroups'] = 'Grupper';
	$lang['strnogroup'] = 'Hittade ej grupp.';
	$lang['strnogroups'] = 'Hittade inga grupper.';
	$lang['strcreategroup'] = 'Skapa grupp';
	$lang['strshowallgroups'] = 'Visa alla grupper';
	$lang['strgroupneedsname'] = 'Du m&#229;ste namnge din grupp.';
	$lang['strgroupcreated'] = 'Grupp skapad.';
	$lang['strgroupdropped'] = 'Grupp raderad.';
	$lang['strgroupcreatedbad'] = 'Misslyckades att skapa grupp.';	
	$lang['strconfdropgroup'] = '&#196;r du s&#228;ker p&#229; att du vill radera grupp &quot;%s&quot;?';
	$lang['strprivileges'] = 'R&#228;ttigheter';
	$lang['strgrant'] = 'Till&#229;t';
	$lang['strgranted'] = 'R&#228;ttigheter &#228;ndrade.';
	$lang['strgroupdroppedbad'] = 'Misslyckades att radera grupp.';
	$lang['straddmember'] = 'L&#228;gg till medlem';
	$lang['strmemberadded'] = 'Medlem inlagd.';
	$lang['strmemberaddedbad'] = 'Misslyckades att l&#228;gga till medlem.';
	$lang['strdropmember'] = 'Radera medlem';
	$lang['strconfdropmember'] = '&#196;r du s&#228;ker p&#229; att du vill radera medlem &quot;%s&quot; fr&#229;n gruppen &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Medlem raderad.';
	$lang['strmemberdroppedbad'] = 'Misslyckades att radera medlem.';
	$lang['strprivilege'] = 'R&#228;ttighet';
	$lang['strnoprivileges'] = 'Detta objekt har standard &#228;garr&#228;ttigheter.';
	$lang['strmembers'] = 'Medelemmar';
	$lang['strrevoke'] = 'Ta tillbaka';
	$lang['strgrantbad'] = 'Du m&#229;ste ange minst en anv&#228;ndare eller grupp och minst en r&#228;ttighet.';
	$lang['strgrantfailed'] = 'Misslyckades att &#228;ndra r&#228;ttigheter.';
	$lang['stralterprivs'] = '&#196;ndra r&#228;ttigheter';
	$lang['strdatabase'] = 'Databas';
	$lang['strdatabasedropped'] = 'Databas raderad.';
	$lang['strdatabases'] = 'Databaser';
	$lang['strentersql'] = 'Ange SQL att k&#246;ra:';
	$lang['strgrantor'] = 'Tillst&#229;ndsgivare';
	$lang['strasterisk'] = '*';
	$lang['strshowalldatabases'] = 'Visa alla databaser';
	$lang['strnodatabase'] = 'Hittade ingen databas.';
	$lang['strnodatabases'] = 'Hittade inga databaser.';
	$lang['strcreatedatabase'] = 'Skapa databas';
	$lang['strdatabasename'] = 'Databasnamn';
	$lang['strdatabaseneedsname'] = 'Du m&#229;ste namnge databasen.';
	$lang['strdatabasecreated'] = 'Databas skapad.';
	$lang['strdatabasecreatedbad'] = 'Misslyckades att skapa databas.';	
	$lang['strconfdropdatabase'] = '&#196;r du s&#228;ker p&#229; att du vill radera databas &quot;%s&quot;?';
	$lang['strdatabasedroppedbad'] = 'Misslyckades att radera databas.';
	$lang['strsqlexecuted'] = 'SQL-kommando utf&#246;rt.';
	$lang['strvacuumgood'] = 'Uppst&#228;dning utf&#246;rd.';
	$lang['strvacuumbad'] = 'Uppst&#228;dning misslyckades.';
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
	$lang['strviewneedsname'] = 'Du m&#229;ste namnge Vy.';
	$lang['strviewneedsdef'] = 'Du m&#229;ste ange en definition f&#246;r din vy.';
	$lang['strviewcreated'] = 'Vy skapad.';
	$lang['strviewcreatedbad'] = 'Misslyckades att skapa vy.';
	$lang['strconfdropview'] = '&#196;r du s&#228;ker p&#229; att du vill radera vyn &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vy raderad.';
	$lang['strviewdroppedbad'] = 'Misslyckades att radera vy.';
	$lang['strviewupdated'] = 'Vy uppdaterad.';
	$lang['strviewupdatedbad'] = 'Misslyckades att uppdatera vy.';
	$lang['strviewlink'] = 'L&#228;nkade nycklar';
	$lang['strviewconditions'] = 'Ytterligare villkor';

	// Sequences
	$lang['strsequence'] = 'Sekvens';
	$lang['strsequences'] = 'Sekvenser';
	$lang['strshowallsequences'] = 'Visa alla sekvenser';
	$lang['strnosequence'] = 'Hittade ingen sekvens.';
	$lang['strnosequences'] = 'Hittade inga sekvenser.';
	$lang['strcreatesequence'] = 'Skapa sekvens';
	$lang['strlastvalue'] = 'Senaste v&#228;rde';
	$lang['strincrementby'] = '&#214;ka med';
	$lang['strstartvalue'] = 'Startv&#228;rde';
	$lang['strmaxvalue'] = 'St&#246;rsta v&#228;rde';
	$lang['strminvalue'] = 'Minsta v&#228;rde';
	$lang['strcachevalue'] = 'V&#228;rde p&#229; cache';
	$lang['strlogcount'] = 'R&#228;kna log';
	$lang['striscycled'] = '&#196;r upprepad?';
	$lang['strsequenceneedsname'] = 'Du m&#229;ste ge ett namn till din sekvens.';
	$lang['strsequencecreated'] = 'Sekvens skapad.';
	$lang['strsequencecreatedbad'] = 'Misslyckades att skapa sekvens.'; 
	$lang['strconfdropsequence'] = '&#196;r du s&#228;ker p&#229; att du vill radera sekvensen &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sekvensen borrtagen.';
	$lang['strsequencedroppedbad'] = 'Misslyckades att radera sekvens.';

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strshowallindexes'] = 'Visa alla index';
	$lang['strnoindex'] = 'Hittade inget index.';
	$lang['strsequencereset'] = 'Nollst&#228;ll sekvens.';
	$lang['strsequenceresetbad'] = 'Misslyckades att nollst&#228;lla sekvens.';
	$lang['strnoindexes'] = 'Hittade inga index.';
	$lang['strcreateindex'] = 'Skapa index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtabname'] = 'Tabellnamn';
	$lang['strcolumnname'] = 'Kolumnnamn';
	$lang['strindexneedsname'] = 'Du m&#229;ste ge ett namn f&#246;r ditt index';
	$lang['strindexneedscols'] = 'Det kr&#228;vs ett giltigt antal kolumner f&#246;r index.';
	$lang['strindexcreated'] = 'Index skapat';
	$lang['strindexcreatedbad'] = 'Misslyckades att skapa index.';
	$lang['strconfdropindex'] = '&#196;r du s&#228;ker p&#229; att du vill radera index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index raderat.';
	$lang['strindexdroppedbad'] = 'Misslyckades att radera index.';
	$lang['strkeyname'] = 'Nyckelv&#228;rdesnamn';
	$lang['struniquekey'] = 'Unikt nyckelv&#228;rde';
	$lang['strprimarykey'] = 'Prim&#228;rnyckel';
 	$lang['strindextype'] = 'Typ av index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtablecolumnlist'] = 'Tabellkolumner';
	$lang['strindexcolumnlist'] = 'Indexkolumner';
	$lang['strconfcluster'] = '&#196;r du s&#228;ker p&#229; att du vill klustra &quot;%s&quot;?';
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
	$lang['strruleneedsname'] = 'Du m&#229;ste ge ett namn till din regel.';
	$lang['strrulecreated'] = 'Regel skapad.';
	$lang['strrulecreatedbad'] = 'Misslyckades att skapa regel.';
	$lang['strconfdroprule'] = '&#196;r du s&#228;ker p&#229; att du vill radera regel &quot;%s&quot; f&#246;r &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regel raderat.';
	$lang['strruledroppedbad'] = 'Misslyckades att radera regel.';

	// Constraints
	$lang['strconstraints'] = 'Begr&#228;nsningar';
	$lang['strshowallconstraints'] = 'Visa alla begr&#228;nsningar';
	$lang['strnoconstraints'] = 'Hittade inga begr&#228;nsningar.';
	$lang['strcreateconstraint'] = 'Skapa begr&#228;nsning';
	$lang['strconstraintcreated'] = 'Begr&#228;nsning skapad.';
	$lang['strconstraintcreatedbad'] = 'Misslyckades att skapa begr&#228;nsning.';
	$lang['strconfdropconstraint'] = '&#196;r du s&#228;ker p&#229; att du vill radera begr&#228;nsning &quot;%s&quot; f&#246;r &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Begr&#228;nsning raderad.';
	$lang['strconstraintdroppedbad'] = 'Misslyckades att radera begr&#228;nsning.';
	$lang['straddcheck'] = 'L&#228;gg till en koll';
	$lang['strcheckneedsdefinition'] = 'En kollbegr&#228;nsning beh&#246;ver definieras.';
	$lang['strcheckadded'] = 'Kollbegr&#228;nsning inlagd.';
	$lang['strcheckaddedbad'] = 'Misslyckades att l&#228;gga till en koll.';
	$lang['straddpk'] = 'L&#228;gg till prim&#228;rnyckel';
	$lang['strpkneedscols'] = 'Prim&#228;rnyckel beh&#246;ver minst en kolumn.';
	$lang['strpkadded'] = 'Prim&#228;rnyckel inlagd.';
	$lang['strpkaddedbad'] = 'Misslyckades att l&#228;gga till prim&#228;rnyckel.';
	$lang['stradduniq'] = 'L&#228;gg till Unikt nyckelv&#228;rde';
	$lang['struniqneedscols'] = 'Unikt nyckelv&#228;rde beh&#246;ver minst en kolumn.';
	$lang['struniqadded'] = 'Unikt nyckelv&#228;rde inlagt.';
	$lang['struniqaddedbad'] = 'Misslyckades att l&#228;gga till unikt nyckelv&#228;rde.';
	$lang['straddfk'] = 'L&#228;gg till utomst&#229;ende nyckel';
	$lang['strfkneedscols'] = 'Utomst&#229;ende nyckel beh&#246;ver minst en kolumn.';
	$lang['strfkneedstarget'] = 'Utomst&#229;ende nycket beh&#246;ver en m&#229;ltabell.';
	$lang['strfkadded'] = 'Utomst&#229;ende nyckel inlagd.';
	$lang['strfkaddedbad'] = 'Misslyckades att l&#228;gga till utomst&#229;ende nyckel.';
	$lang['strfktarget'] = 'M&#229;ltabell';
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
	$lang['strreturns'] = '&#197;terger';
	$lang['strarguments'] = 'Argument';
	$lang['strfunctionneedsname'] = 'Du m&#229;ste namnge din funktion.';
	$lang['strfunctionneedsdef'] = 'Du m&#229;ste definiera din funktion.';
	$lang['strfunctioncreated'] = 'Funktion skapad.';
	$lang['strfunctioncreatedbad'] = 'Misslyckades att skapa funktion.';
	$lang['strconfdropfunction'] = '&#196;r du s&#228;ker p&#229; att du vill radera funktionen &quot;%s&quot;?';
	$lang['strproglanguage'] = 'Programmeringsspr&#229;k';
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
	$lang['strtriggerneedsname'] = 'Du m&#229;ste namnge din mekanism.';
	$lang['strtriggerneedsfunc'] = 'Du m&#229;ste specificera en funktion f&#246;r din mekanism.';
	$lang['strtriggercreated'] = 'Mekanism skapad.';
	$lang['strtriggerdropped'] = 'Mekanism raderad.';
	$lang['strtriggercreatedbad'] = 'Misslyckades att skapa mekanism.';
	$lang['strconfdroptrigger'] = '&#196;r du s&#228;ker p&#229; att du vill radera mekanismen &quot;%s&quot; p&#229; &quot;%s&quot;?';
	$lang['strtriggerdroppedbad'] = 'Misslyckades att radera mekanism.';
	
	// Types
	$lang['strtype'] = 'Typ';
	$lang['strstorage'] = 'Lagring';
	$lang['strtriggeraltered'] = 'Mekanism &#228;ndrad.';
	$lang['strtriggeralteredbad'] = 'Misslyckades att &#228;ndra mekanism.';
	$lang['strtypes'] = 'Typer';
	$lang['strtypeneedslen'] = 'Du m&#229;ste ange typens l&#228;ngd.';
	$lang['strshowalltypes'] = 'Visa alla typer';
	$lang['strnotype'] = 'Hittade ingen typ.';
	$lang['strnotypes'] = 'Hittade inga typer.';
	$lang['strcreatetype'] = 'Skapa typ';
	$lang['strtypename'] = 'Namn p&#229; typen';
	$lang['strinputfn'] = 'Infogande funktion';
	$lang['stroutputfn'] = 'Funktion f&#246;r utv&#228;rden';
	$lang['strpassbyval'] = 'Genomg&#229;tt utv&#228;rdering?';
	$lang['stralignment'] = 'Justering';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Avgr&#228;nsare';
	$lang['strtypeneedsname'] = 'Du m&#229;ste namnge din typ.';
	$lang['strtypecreated'] = 'Typ skapad';
	$lang['strtypecreatedbad'] = 'Misslyckades att skapa typ.';
	$lang['strconfdroptype'] = '&#196;r du s&#228;ker p&#229; att du vill radera typen &quot;%s&quot;?';
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
	$lang['strschemaneedsname'] = 'Du m&#229;ste namnge ditt Schema.';
	$lang['strschemacreated'] = 'Schema skapat';
	$lang['strschemacreatedbad'] = 'Misslyckades att skapa schema.';
	$lang['strconfdropschema'] = '&#196;r du s&#228;ker p&#229; att du vill radera schemat &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schema raderat.';
	$lang['strschemadroppedbad'] = 'Misslyckades att radera schema.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapporter';
	$lang['strshowallreports'] = 'Visa alla rapporter';
	$lang['strtopbar'] = '%s k&#246;rs p&#229; %s:%s -- Du &#228;r inloggad som anv&#228;ndare &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strnoreports'] = 'Hittade inga rapporter.';
	$lang['strcreatereport'] = 'Skapa rapport';
	$lang['strreportdropped'] = 'Rapport skapad.';
	$lang['strreportcreated'] = 'Rapport sparad.';
	$lang['strreportneedsname'] = 'Du m&#229;ste namnge din rapport.';
	$lang['strreportcreatedbad'] = 'Misslyckades att spara rapport.';
	$lang['strreportdroppedbad'] = 'Misslyckades att skapa rapport.';
	$lang['strconfdropreport'] = '&#196;r du s&#228;ker p&#229; att du vill radera rapporten &quot;%s&quot;?';
	$lang['strreportneedsdef'] = 'Du m&#229;ste ange din SQL-fr&#229;ga.';
	
	// Domains
	$lang['strdomain'] = 'Dom&#228;n';
	$lang['strdomains'] = 'Dom&#228;ner';
	$lang['strshowalldomains'] = 'Visa alla dom&#228;ner';
	$lang['strnodomains'] = 'Hittade inga dom&#228;ner.';
	$lang['strcreatedomain'] = 'Skapa dom&#228;n';
	$lang['strdomaindropped'] = 'Dom&#228;n raderad.';
	$lang['strdomaindroppedbad'] = 'Misslyckades att radera dom&#228;n.';
	$lang['strconfdropdomain'] = '&#196;r du s&#228;ker p&#229; att du vill radera dom&#228;nen &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Du m&#229;ste ange ett dom&#228;nnamn.';
	$lang['strdomaincreated'] = 'Dom&#228;n skapad.';
	$lang['strdomaincreatedbad'] = 'Misslyckades att skapa dom&#228;n.';
	$lang['strdomainaltered'] = 'Dom&#228;n &#228;ndrad.';
	$lang['strdomainalteredbad'] = 'Misslyckades att &#228;ndra dom&#228;n.';
	
	// Operators
	$lang['stroperator'] = 'Operand';
	$lang['stroperators'] = 'Operander';
	$lang['strshowalloperators'] = 'Visa alla operander';
	$lang['strnooperator'] = 'Hittade ingen operand.';
	$lang['strnooperators'] = 'Hittade inga operander.';
	$lang['strcreateoperator'] = 'Skapa operand';
	$lang['strleftarg'] = 'Arg Typ V&#228;nster';
	$lang['strrightarg'] = 'Arg Typ H&#246;ger';
	$lang['strcommutator'] = 'V&#228;xlare';
	$lang['strnegator'] = 'Negerande';
	$lang['strrestrict'] = 'Sp&#228;rra';
	$lang['strjoin'] = 'Sl&#229; ihop';
	$lang['strhashes'] = 'Hashtabeller';
	$lang['strmerges'] = 'Sammanslagningar';
	$lang['strleftsort'] = 'Sortera v&#228;nster';
	$lang['strrightsort'] = 'Sortera h&#246;ger';
	$lang['strlessthan'] = 'Mindre &#228;n';
	$lang['strgreaterthan'] = 'St&#246;rre &#228;n';
	$lang['stroperatorneedsname'] = 'Du m&#229;ste namnge operanden.';
	$lang['stroperatorcreated'] = 'Operand skapad';
	$lang['stroperatorcreatedbad'] = 'Misslyckades att skapa operand.';
	$lang['strconfdropoperator'] = '&#196;r du s&#228;ker p&#229; att du vill radera operanden &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operand raderad.';
	$lang['stroperatordroppedbad'] = 'Misslyckades att radera operand.';

	// Casts
	$lang['strcasts'] = 'Typomvandlingar';
	$lang['strnocasts'] = 'Hittade inga typomvandlingar.';
	$lang['strsourcetype'] = 'K&#228;lltyp';
	$lang['strtargettype'] = 'M&#229;ltyp';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'Tilldelat i';
	$lang['strbinarycompat'] = '(Bin&#228;rt kompatibel)';
	
	// Conversions
	$lang['strconversions'] = 'Omkodningar';
	$lang['strnoconversions'] = 'Hittade inga omkodningar.';
	$lang['strsourceencoding'] = 'K&#228;llkodning';
	$lang['strtargetencoding'] = 'M&#229;lkodning';
	
	// Languages
	$lang['strlanguages'] = 'Spr&#229;k';
	$lang['strnolanguages'] = 'Hittade inga spr&#229;k.';
	$lang['strtrusted'] = 'P&#229;litlig(a)';
	
	// Info
	$lang['strnoinfo'] = 'Ingen information tillg&#228;nglig.';
	$lang['strreferringtables'] = 'Refererande tabeller';
	$lang['strparenttables'] = 'Ovanst&#229;ende tabeller';
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
	$lang['strread'] = 'L&#228;s';
	$lang['strfetch'] = 'H&#228;mta';
	$lang['strheap'] = 'Bunt';
	$lang['strtoast'] = 'Br&#228;nn';
	$lang['strtoastindex'] = 'Br&#228;nn Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = 'Rader';

	// Miscellaneous
	$lang['strtopbar'] = '%s K&#246;rs p&#229; %s:%s -- Du &#228;r inloggad som anv&#228;ndare &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Hj&#228;lp';

?>
