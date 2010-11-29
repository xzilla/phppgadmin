<?php

	/**
	 * Afrikaans Language file for WebDB.
	 * @maintainer Petri Jooste [rkwjpj@puk.ac.za]
	 *
	 * $Id: afrikaans.php,v 1.9 2007/04/24 11:42:07 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] =  'Afrikaans';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'af_ZA';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'Welkom by phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmin Tuisblad';
	$lang['strpgsqlhome'] = 'PostgreSQL Tuisblad';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Dokumentasie (lokaal)';
	$lang['strreportbug'] = 'Meld \'n fout aan';
	$lang['strviewfaq'] = 'Bekyk FAQ op internet';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Aanteken';
	$lang['strloginfailed'] = 'Aantekening het misluk';
	$lang['strlogindisallowed'] = 'Aantekening nie toegelaat nie';
	$lang['strserver'] = 'Bediener';
	$lang['strlogout'] = 'Teken af';
	$lang['strowner'] = 'Eienaar';
	$lang['straction'] = 'Aksie';
	$lang['stractions'] = 'Aksies';
	$lang['strname'] = 'Naam';
	$lang['strdefinition'] = 'Definisie';
	$lang['strproperties'] = 'Eienskappe';
	$lang['strbrowse'] = 'Bekyk';
	$lang['strdrop'] = 'Verwyder';
	$lang['strdropped'] = 'Is verwyder';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Nie Null';
	$lang['strprev'] = 'Vorige';
	$lang['strnext'] = 'Volgende';
	$lang['strfirst'] = '&lt;&lt; Eerste';
	$lang['strlast'] = 'Laaste &gt;&gt;';
	$lang['strfailed'] = 'Het misluk';
	$lang['strcreate'] = 'Skep';
	$lang['strcreated'] = 'Geskep';
	$lang['strcomment'] = 'Kommentaar';
	$lang['strlength'] = 'Lengte';
	$lang['strdefault'] = 'Standaard';
	$lang['stralter'] = 'Wysig';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Kanselleer';
	$lang['strsave'] = 'Bewaar';
	$lang['strreset'] = 'Herstel';
	$lang['strinsert'] = 'Voeg in';
	$lang['strselect'] = 'Selekteer';
	$lang['strdelete'] = 'Verwyder';
	$lang['strupdate'] = 'Verfris';
	$lang['strreferences'] = 'Verwysings';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nee';
	$lang['strtrue'] = 'WAAR';
	$lang['strfalse'] = 'VALS';
	$lang['stredit'] = 'Redigeer';
	$lang['strcolumn'] = 'Kolom';
	$lang['strcolumns'] = 'Kolomme';
	$lang['strrows'] = 'ry(e)';
	$lang['strrowsaff'] = 'ry(e) het verander.';
	$lang['strobjects'] = 'objek(te)';
	$lang['strback'] = 'Terug';
	$lang['strqueryresults'] = 'Navraagresultate';
	$lang['strshow'] = 'Wys';
	$lang['strempty'] = 'Leeg';
	$lang['strlanguage'] = 'Taal';
	$lang['strencoding'] = 'Enkodering';
	$lang['strvalue'] = 'Waarde';
	$lang['strunique'] = 'Uniek';
	$lang['strprimary'] = 'Prim&#234;r';
	$lang['strexport'] = 'Eksporteer';
	$lang['strimport'] = 'Importeer';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Stofsuig';
	$lang['stranalyze'] = 'Analiseer';
	$lang['strcluster'] = 'Kluster';
	$lang['strclustered'] = 'In klusters?';
	$lang['strreindex'] = 'Herindekseer';
	$lang['strrun'] = 'Loop';
	$lang['stradd'] = 'Voeg by';
	$lang['strevent'] = 'Gebeurtenis';
	$lang['strwhere'] = 'Waar';
	$lang['strinstead'] = 'Doen eerder';
	$lang['strwhen'] = 'Wanneer';
	$lang['strformat'] = 'Formaat';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Bevestig';
	$lang['strexpression'] = 'Uitdrukking';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Vou oop';
	$lang['strcollapse'] = 'Vou toe';
	$lang['strexplain'] = 'Verduidelik';
	$lang['strexplainanalyze'] = 'Verduidelik Analise';
	$lang['strfind'] = 'Soek';
	$lang['stroptions'] = 'Opsies';
	$lang['strrefresh'] = 'Verfris';
	$lang['strdownload'] = 'Laai af';
	$lang['strdownloadgzipped'] = 'Laai af ... saamgepers met gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Gevorderd';
	$lang['strvariables'] = 'Veranderlikes';
	$lang['strprocess'] = 'Proses';
	$lang['strprocesses'] = 'Prosesse';
	$lang['strsetting'] = 'Instelling';
	$lang['streditsql'] = 'Redigeer SQL';
	$lang['strruntime'] = 'Totale looptyd: %s ms';
	$lang['strpaginate'] = 'Resultate per bladsy';
	$lang['struploadscript'] = 'of laai \'n SQL skrip in:';
	$lang['strstarttime'] = 'Begintyd';
	$lang['strfile'] = 'L&#234;er';
	$lang['strfileimported'] = 'L&#234;er is ingetrek.';

	// Error handling
	$lang['strnoframes'] = 'Hierdie toepassing maak gebruik van HTML-rame. U het \'n blaaier nodig wat rame ondersteun om hierdie toepassing te kan gebruik. ';
	$lang['strbadconfig'] = 'Die l&#234;er config.inc.php is verouderd. Jy kan  verbeterde weergawe aflei van die l&#234;er config.inc.php-dist.';
	$lang['strnotloaded'] = 'Hierdie PHP-installasie is sonder ondersteuning van hierdie tipe database nie gekompileerd.';
	$lang['strpostgresqlversionnotsupported'] = 'Weergawe van  PostgreSQL word nie ondersteun nie. Probeer asb. weergawe %s of later.';
	$lang['strbadschema'] = 'Ongeldige skema gespesifiseer.';
	$lang['strbadencoding'] = 'Die kli&#235;ntenkodering kon nie in die databasis geplaas word nie.';
	$lang['strsqlerror'] = 'SQL-fout:';
	$lang['strinstatement'] = 'In stelling:';
	$lang['strinvalidparam'] = 'Ongeldige parameters.';
	$lang['strnodata'] = 'Geen rye gevind.';
	$lang['strnoobjects'] = 'Geen objekte gevind.';
	$lang['strrownotunique'] = 'Geen unieke identifiseerder vir hierdie ry.';
	$lang['strnoreportsdb'] = 'Jy het nie die verslae-databasis geskep nie. Lees asb. die INSTALL-l&#234;er vir instruksies.';
	$lang['strnouploads'] = 'Oplaaiing van l&#234;ers is afgeskakel.';
	$lang['strimporterror'] = 'Inleesfout.';
	$lang['strimporterrorline'] = 'Inleesfout op re&#235;l %s.';
	$lang['strcannotdumponwindows'] = 'Weergee van komplekse tabel- en skemaname word nie op Windows ondersteun nie.  Kyk asb. in die FAQ.';

	// Tables
	$lang['strtable'] = 'Tabel';
	$lang['strtables'] = 'Tabelle';
	$lang['strshowalltables'] = 'Wys alle tabelle';
	$lang['strnotables'] = 'Geen tabelle gevind.';
	$lang['strnotable'] = 'Geen tabel gevind.';
	$lang['strcreatetable'] = 'Skep tabel';
	$lang['strtablename'] = 'Tabelnaam';
	$lang['strtableneedsname'] = 'Jy moet die tabel \'n naam gee.';
	$lang['strtableneedsfield'] = 'Jy moet ten minste een veld spesifiseer.';
	$lang['strtableneedscols'] = 'Jy moet die tabel \'n geldige aantal kolomme gee.';
	$lang['strtablecreated'] = 'Tabel geskep.';
	$lang['strtablecreatedbad'] = 'Die tabel kon nie geskep word nie.';
	$lang['strconfdroptable'] = 'Is jy seker dat dat jy die tabel &quot;%s&quot; wil verwyder?';
	$lang['strtabledropped'] = 'Tabel is verwyder.';
	$lang['strtabledroppedbad'] = 'Die tabel kon nie verwyder word nie.';
	$lang['strconfemptytable'] = 'Is jy seker dat jy alle rye uit tabel &quot;%s&quot; wil verwyder?';
	$lang['strtableemptied'] = 'Alle ryen is uit die tabel verwyder.';
	$lang['strtableemptiedbad'] = 'Die rye kon nie verwyder word nie.';
	$lang['strinsertrow'] = 'Voeg \'n ry by';
	$lang['strrowinserted'] = 'Ry is bygevoeg.';
	$lang['strrowinsertedbad'] = 'Die ry kon nie bygevoeg word nie.';
	$lang['streditrow'] = 'Wysig ry';
	$lang['strrowupdated'] = 'Ry is opgedateer.';
	$lang['strrowupdatedbad'] = 'Die opdatering van die ry het misluk.';
	$lang['strdeleterow'] = 'Verwyder ry';
	$lang['strconfdeleterow'] = 'Is jy seker dat jy hierdie ry wil verwyder?';
	$lang['strrowdeleted'] = 'Ry is verwyder.';
	$lang['strrowdeletedbad'] = 'Die ry kon nie verwyder word nie.';
	$lang['strinsertandrepeat'] = 'Voeg in &amp; Herhaal';
	$lang['strnumcols'] = 'Aantal kolomme';
	$lang['strcolneedsname'] = 'Jy moet die kolom \'n naam gee';
	$lang['strselectallfields'] = 'Selekteer alle velde';
	$lang['strselectneedscol'] = 'Jy moet ten minste &#233;&#233;n kolom as uitvoer h&#234;';
	$lang['strselectunary'] = 'Un&#234;re operatore kan nie waardes kry nie.';
	$lang['straltercolumn'] = 'Wysig kolom';
	$lang['strcolumnaltered'] = 'Kolom is gewysig.';
	$lang['strcolumnalteredbad'] = 'Die kolom kon nie gewysig word nie.';
	$lang['strconfdropcolumn'] = 'Is jy seker dat jy die kolom &quot;%s&quot; wil verwyder uit tabel &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Kolom is verwyder.';
	$lang['strcolumndroppedbad'] = 'Die kolom kon nie verwyder word nie.';
	$lang['straddcolumn'] = 'Voeg kolom by';
	$lang['strcolumnadded'] = 'Kolom is bygevoeg.';
	$lang['strcolumnaddedbad'] = 'Die kolom kon nie bygevoeg word nie.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabel is gewysig.';
	$lang['strtablealteredbad'] = 'Tabelwysiging het misluk.';
	$lang['strdataonly'] = 'Slegs data';
	$lang['strstructureonly'] = 'Slegs struktuur';
	$lang['strstructureanddata'] = 'Struktuur en data';
	$lang['strtabbed'] = 'Tabbed';
	$lang['strauto'] = 'Auto';
	$lang['strconfvacuumtable'] = 'Is jy seker jy wil VACUUM &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Geskatte aantal rye';

	// Users
	$lang['struser'] = 'Gebruiker';
	$lang['strusers'] = 'Gebruikers';
	$lang['strusername'] = 'Gebruikersnaam';
	$lang['strpassword'] = 'Wagwoord';
	$lang['strsuper'] = 'Supergebruiker?';
	$lang['strcreatedb'] = 'Skep DB?';
	$lang['strexpires'] = 'Verval';
	$lang['strsessiondefaults'] = 'Verstekwaardes van sessie';
	$lang['strnousers'] = 'Geen gebruikers gevind.';
	$lang['struserupdated'] = 'Gebruiker is opgedateer.';
	$lang['struserupdatedbad'] = 'Gebruiker kon nie opgedateer word nie.';
	$lang['strshowallusers'] = 'Wys alle gebruikers';
	$lang['strcreateuser'] = 'Skep gebruiker';
	$lang['struserneedsname'] = 'Jy moet \'n naam gee vir die gebruiker.';
	$lang['strusercreated'] = 'Gebruiker geskep.';
	$lang['strusercreatedbad'] = 'Die gebruiker kon nie geskep word nie.';
	$lang['strconfdropuser'] = 'Is jy seker dat jy die gebruiker &quot;%s&quot; wil verwyder?';
	$lang['struserdropped'] = 'Gebruiker is verwyder.';
	$lang['struserdroppedbad'] = 'Verwydering van die gebruiker het misluk.';
	$lang['straccount'] = 'Gebruiker';
	$lang['strchangepassword'] = 'Verander wagwoord';
	$lang['strpasswordchanged'] = 'Wagwoord is verander.';
	$lang['strpasswordchangedbad'] = 'Wagwoordverandering het misluk.';
	$lang['strpasswordshort'] = 'Wagwoord is te kort.';
	$lang['strpasswordconfirm'] = 'Wagwoord verskil van bevestigings-wagwoord.';

	// Groups
	$lang['strgroup'] = 'Groep';
	$lang['strgroups'] = 'Groepe';
	$lang['strnogroup'] = 'Groep nie gevind.';
	$lang['strnogroups'] = 'Geen groepe gevind.';
	$lang['strcreategroup'] = 'Skep groep';
	$lang['strshowallgroups'] = 'Wys alle groepe';
	$lang['strgroupneedsname'] = 'Jy moet die groep \'n naam gee.';
	$lang['strgroupcreated'] = 'Groep geskep.';
	$lang['strgroupcreatedbad'] = 'Die groep kon nie geskep word nie.';
	$lang['strconfdropgroup'] = 'Is jy seker dat jy die groep &quot;%s&quot; wil verwyder?';
	$lang['strgroupdropped'] = 'Groep is verwyder.';
	$lang['strgroupdroppedbad'] = 'Verwydering van die groep het misluk.';
	$lang['strmembers'] = 'Lede';
	$lang['straddmember'] = 'Voeg \'n groeplid by';
	$lang['strmemberadded'] = 'Groeplid is bygevoeg.';
	$lang['strmemberaddedbad'] = 'Toevoeging van groeplid het misluk.';
	$lang['strdropmember'] = 'Verwyder groeplid';
	$lang['strconfdropmember'] = 'Is jy seker dat jy &quot;%s&quot; uit groep &quot;%s&quot; wil verwyder?';
	$lang['strmemberdropped'] = 'Groeplid is verwyder.';
	$lang['strmemberdroppedbad'] = 'Verwydering van groeplid het misluk.';

	// Privileges
	$lang['strprivilege'] =  'Voorregte';
	$lang['strprivileges'] =  'Voorregte';
	$lang['strnoprivileges'] =  'Hierdie objek het verstekeienaarvoorregte.';
	$lang['strgrant'] =  'Staan toe';
	$lang['strrevoke'] =  'Ontneem';
	$lang['strgranted'] =  'Voorregte is bygevoeg.';
	$lang['strgrantfailed'] =  'Voorregte kon nie bygevoeg word nie.';
	$lang['strgrantbad'] =  'Jy moet minstens een gebruiker of groep en minstens een voorreg aandui.';
	$lang['strgrantor'] =  'Grantor';
	$lang['strasterisk'] =  '*';

	// Databases
	$lang['strdatabase'] =  'Databasis';
	$lang['strdatabases'] =  'Databasisse';
	$lang['strshowalldatabases'] =  'Wys alle databasisse';
	$lang['strnodatabase'] =  'Geen databasis gevind.';
	$lang['strnodatabases'] =  'Geen databasis gevind.';
	$lang['strcreatedatabase'] =  'Skep databasis';
	$lang['strdatabasename'] =  'Databasisnaam';
	$lang['strdatabaseneedsname'] =  'Jy moet die databasis \'n naam gee.';
	$lang['strdatabasecreated'] =  'Databasis is geskep.';
	$lang['strdatabasecreatedbad'] =  'Die databasis kon nie geskep word nie.';
	$lang['strconfdropdatabase'] =  'Is jy seker dat jy die databasis &quot;%s&quot; wil verwyder?';
	$lang['strdatabasedropped'] =  'Databasis is verwyder.';
	$lang['strdatabasedroppedbad'] =  'Databasisverwydering het misluk.';
	$lang['strentersql'] =  'Tik hieronder die SQL in wat uitgevoer moet word:';
	$lang['strsqlexecuted'] =  'SQL uitgevoer.';
	$lang['strvacuumgood'] =  'Vacuum-bewerking is klaar.';
	$lang['strvacuumbad'] =  'Vacuum-bewerking het misluk.';
	$lang['stranalyzegood'] =  'Analise is voltooi.';
	$lang['stranalyzebad'] =  'Analise het misluk.';
	$lang['strreindexgood'] = 'Herindeksering is voltooi.';
	$lang['strreindexbad'] = 'Herindeksering het misluk.';
	$lang['strfull'] = 'Volledig';
	$lang['strfreeze'] = 'Vries';
	$lang['strforce'] = 'Forseer';
	$lang['strsignalsent'] = 'Sein gestuur.';
	$lang['strsignalsentbad'] = 'Stuur van sein het misluk.';
	$lang['strallobjects'] = 'Alle objekte';

	// Views
	$lang['strview'] = 'Aansig';
	$lang['strviews'] = 'Aansigte';
	$lang['strshowallviews'] = 'Wys alle aansigte';
	$lang['strnoview'] = 'Geen aansigte gevind.';
	$lang['strnoviews'] = 'Geen aansigte gevind.';
	$lang['strcreateview'] = 'Skep aansig';
	$lang['strviewname'] = 'Aansignaam';
	$lang['strviewneedsname'] = 'Jy moet die aansig \'n naam gee.';
	$lang['strviewneedsdef'] = 'Jy moet die aansig definieer.';
	$lang['strviewneedsfields'] = 'Jy moet s&#234; watter kolomme gekies moet wees in hierdie aansig.';
	$lang['strviewcreated'] = 'Aansig is geskep.';
	$lang['strviewcreatedbad'] = 'Die aansig kon nie geskep word nie.';
	$lang['strconfdropview'] = 'Is jy seker dat jy die aansig &quot;%s&quot; wil verwyder?';
	$lang['strviewdropped'] = 'Aansig is verwyder.';
	$lang['strviewdroppedbad'] = 'Die aansig kon nie verwyder word nie.';
	$lang['strviewupdated'] = 'Aansig is opgedateer.';
	$lang['strviewupdatedbad'] = 'Opdatering van aansig het misluk.';
	$lang['strviewlink'] = 'Sleutels word verbind';
	$lang['strviewconditions'] = 'Addisionele voorwaardes';
	$lang['strcreateviewwiz'] = 'Skep \'n aansig met behulp van \'n toergids';

	// Sequences
	$lang['strsequence'] = 'Reeks';
	$lang['strsequences'] = 'Reekse';
	$lang['strshowallsequences'] = 'Wys alle reekse';
	$lang['strnosequence'] = 'Geen reeks gevind.';
	$lang['strnosequences'] = 'Geen reekse gevind.';
	$lang['strcreatesequence'] = 'Skep  reeks';
	$lang['strlastvalue'] = 'Laaste waarde';
	$lang['strincrementby'] = 'Verhoog met';	
	$lang['strstartvalue'] = 'Aanvangswaarde';
	$lang['strmaxvalue'] = 'maks_waarde';
	$lang['strminvalue'] = 'min_waarde';
	$lang['strcachevalue'] = 'Kasgeheue-waarde';
	$lang['strlogcount'] = 'Boekstaaftelling';
	$lang['striscycled'] = 'is_siklies ?';
	$lang['strsequenceneedsname'] = 'Jy moet \'n naam gee vir die reeks.';
	$lang['strsequencecreated'] = 'Reeks is geskep.';
	$lang['strsequencecreatedbad'] = 'Die reeks kon nie geskep word nie.';
	$lang['strconfdropsequence'] = 'Is jy seker dat jy die reeks &quot;%s&quot; wil verwyder?';
	$lang['strsequencedropped'] = 'Reeks is verwyder.';
	$lang['strsequencedroppedbad'] = 'Verwydering van die reeks het misluk.';
	$lang['strsequencereset'] = 'Herstel reeks.';
	$lang['strsequenceresetbad'] = 'Herstel van reeks het misluk.';

	// Indexes
	$lang['strindex'] = 'Indeks';
	$lang['strindexes'] = 'Indekse';
	$lang['strindexname'] = 'Indeksnaam';
	$lang['strshowallindexes'] = 'Wys alle indekse';
	$lang['strnoindex'] = 'Geen indeks gevind.';
	$lang['strnoindexes'] = 'Geen indekse gevind.';
	$lang['strcreateindex'] = 'Skep \'n indeks';
	$lang['strtabname'] = 'Tab-naam';
	$lang['strcolumnname'] = 'Kolomnaam';
	$lang['strindexneedsname'] = 'Jy moet \'n naam gee vir die index.';
	$lang['strindexneedscols'] = 'Indekse moet ten minste uit &#233;&#233;n kolom bestaan.';
	$lang['strindexcreated'] = 'Indeks is geskep';
	$lang['strindexcreatedbad'] = 'Die indeks kon nie geskep word nie.';
	$lang['strconfdropindex'] = 'Is jy seker dat jy die indeks &quot;%s&quot; wil verwyder?';
	$lang['strindexdropped'] = 'Indeks is verwyder.';
	$lang['strindexdroppedbad'] = 'Verwydering van die indeks het misluk.';
	$lang['strkeyname'] = 'Sleutelnaam';
	$lang['struniquekey'] = 'Unieke sleutel';
	$lang['strprimarykey'] = 'Prim&#234;re sleutel';
 	$lang['strindextype'] = 'Tipe van die indeks';
	$lang['strtablecolumnlist'] = 'Kolomme in tabel';
	$lang['strindexcolumnlist'] = 'Kolomme in indeks';
	$lang['strconfcluster'] = 'Is jy seker jy wil \'n kluster maak van &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Kluster is voltooi.';
	$lang['strclusteredbad'] = 'Kluster het misluk.';

	// Rules
	$lang['strrules'] = 'Re&#235;ls';
	$lang['strrule'] = 'Re&#235;l';
	$lang['strshowallrules'] = 'Wys alle re&#235;ls';
	$lang['strnorule'] = 'Geen re&#235;l gevind.';
	$lang['strnorules'] = 'Geen re&#235;ls gevind.';
	$lang['strcreaterule'] = 'Skep \'n re&#235;l';
	$lang['strrulename'] = 'Re&#235;lnaam';
	$lang['strruleneedsname'] = 'Jy moet \'n naam gee vir die re&#235;l.';
	$lang['strrulecreated'] = 'Re&#235;l is geskep.';
	$lang['strrulecreatedbad'] = 'Die re&#235;l kon nie geskep word nie.';
	$lang['strconfdroprule'] = 'Is jy seker dat jy die re&#235;l &quot;%s&quot; op &quot;%s&quot; wil verwyder?';
	$lang['strruledropped'] = 'Re&#235;l is verwyder.';
	$lang['strruledroppedbad'] = 'Verwydering van die re&#235;l het misluk.';

	// Constraints
	$lang['strconstraints'] = 'Beperkings';
	$lang['strshowallconstraints'] = 'Wys alle beperkings';
	$lang['strnoconstraints'] = 'Geen beperkings gevind.';
	$lang['strcreateconstraint'] = 'Skep beperking';
	$lang['strconstraintcreated'] = 'Beperking is geskep.';
	$lang['strconstraintcreatedbad'] = 'Die beperking kon nie geskep word nie.';
	$lang['strconfdropconstraint'] = 'Is jy seker dat jy die beperking &quot;%s&quot; op &quot;%s&quot; wil verwyder?';
	$lang['strconstraintdropped'] = 'Beperking is verwyder.';
	$lang['strconstraintdroppedbad'] = 'Verwydering van die beperking het misluk.';
	$lang['straddcheck'] = 'Voeg \'n kontrole by';
	$lang['strcheckneedsdefinition'] = 'Kontrolebeperking moet gedefinieer wees.';
	$lang['strcheckadded'] = 'Kontrolebeperking is bygevoeg.';
	$lang['strcheckaddedbad'] = 'Kontrolebeperking kon nie bygevoeg word nie.';
	$lang['straddpk'] = 'Voeg prim&#234;re sleutel by';
	$lang['strpkneedscols'] = 'Prim&#234;re sleutel moet minstens &#233;&#233;n kolom h&#234;.';
	$lang['strpkadded'] = 'Prim&#234;re sleutel bygevoeg.';
	$lang['strpkaddedbad'] = 'Prim&#234;re sleutel kon nie bygevoeg word nie.';
	$lang['stradduniq'] = 'Voeg unieke sleutel by.';
	$lang['struniqneedscols'] = 'Unieke sleutel moet minstens &#233;&#233;n kolom h&#234;.';
	$lang['struniqadded'] = 'Unieke sleutel is bygevoeg.';
	$lang['struniqaddedbad'] = 'Unieke sleutel kon nie bygevoeg word nie.';
	$lang['straddfk'] = 'Voeg vreemdesleutel toe';
	$lang['strfkneedscols'] = 'Vreemdesleutel moet minstens &#233;&#233;n kolom h&#234;.';
	$lang['strfkneedstarget'] = 'Vreemdesleutel moet \'n doeltabel h&#234;.';
	$lang['strfkadded'] = 'Vreemdesleutel is bygevoeg.';
	$lang['strfkaddedbad'] = 'Vreemdesleutel kon nie bygevoeg word nie.';
	$lang['strfktarget'] = 'Doeltabel';
	$lang['strfkcolumnlist'] = 'Kolomme in sleutel';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';
	
	// Functions
	$lang['strfunction'] =  'Funksie';
	$lang['strfunctions'] =  'Funksies';
	$lang['strshowallfunctions'] =  'Wys alle funksies';
	$lang['strnofunction'] =  'Geen funksies gevind.';
	$lang['strnofunctions'] =  'Geen funksies gevind.';
	$lang['strcreateplfunction'] = 'Skep SQL/PL funksie';
	$lang['strcreateinternalfunction'] = 'Skep interne funksie';
	$lang['strcreatecfunction'] =  'Skep C funksie';
	$lang['strfunctionname'] =  'Funksienaam';
	$lang['strreturns'] =  'Gee terug';
	$lang['strarguments'] =  'Argumente';
	$lang['strproglanguage'] =  'Programmeertaal';
	$lang['strfunctionneedsname'] =  'Jy moet die funksie \'n naam gee.';
	$lang['strfunctionneedsdef'] =  'Jy moet die funksie definieer.';
	$lang['strfunctioncreated'] =  'Funksie is geskep.';
	$lang['strfunctioncreatedbad'] =  'Die funksie kon nie geskep word nie.';
	$lang['strconfdropfunction'] =  'Is jy seker dat jy die funksie &quot;%s&quot; wil verwyder?';
	$lang['strfunctiondropped'] =  'Funksie is verwyder.';
	$lang['strfunctiondroppedbad'] =  'Verwydering van die funksie het misluk.';
	$lang['strfunctionupdated'] =  'Funksie is opgedateer.';
	$lang['strfunctionupdatedbad'] =  'Opdatering van die funksie het misluk.';
	$lang['strobjectfile'] = 'Objekl&#234;er';
	$lang['strlinksymbol'] = 'Skakelsimbool';

	// Triggers
	$lang['strtrigger'] =  'Snellers';
	$lang['strtriggers'] =  'Snellers';
	$lang['strshowalltriggers'] =  'Wys alle snellers';
	$lang['strnotrigger'] =  'Geen sneller gevind.';
	$lang['strnotriggers'] =  'Geen snellers gevind.';
	$lang['strcreatetrigger'] =  'skep trigger';
	$lang['strtriggerneedsname'] =  'Jy moet vir die sneller \'n naam gee.';
	$lang['strtriggerneedsfunc'] =  'Jy moet vir die sneller \'n funksie gee.';
	$lang['strtriggercreated'] =  'Sneller is geskep.';
	$lang['strtriggercreatedbad'] =  'Die sneller kon nie geskep word nie.';
	$lang['strconfdroptrigger'] =  'Is jy seker dat jy die sneller &quot;%s&quot; op &quot;%s&quot; wil verwyder?';
	$lang['strtriggerdropped'] =  'Sneller is verwyder.';
	$lang['strtriggerdroppedbad'] =  'Verwydering van sneller misluk.';
	$lang['strtriggeraltered'] =  'Sneller is gewysig.';
	$lang['strtriggeralteredbad'] =  'Snellerwysiging het misluk.';

	// Types
	$lang['strtype'] =  'Tipe';
	$lang['strtypes'] =  'Tipes';
	$lang['strshowalltypes'] =  'Wys alle tipes';
	$lang['strnotype'] =  'Geen tipe gevind.';
	$lang['strnotypes'] =  'Geen tipes gevind.';
	$lang['strcreatetype'] =  'skep tipe';
	$lang['strcreatecomptype'] = 'Skep saamgestelde tipe';
	$lang['strtypeneedsfield'] = 'Jy moet ten minste een veld spesifiseer.';
	$lang['strtypeneedscols'] = 'Jy \'n geldige aantal velde spesifiseer.';	
	$lang['strtypename'] =  'Tipenaam';
	$lang['strinputfn'] =  'Toevoerfunksie';
	$lang['stroutputfn'] =  'Afvoerfunksie';
	$lang['strpassbyval'] =  'Aangestuur per waarde?';
	$lang['stralignment'] = 'Belyning';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] =  'Skeidingsteken';
	$lang['strstorage'] =  'Berging';
	$lang['strfield'] = 'Veld';
	$lang['strnumfields'] = 'Aantal velde';
	$lang['strtypeneedsname'] =  'Jy moet die tipe \'n naam gee.';
	$lang['strtypeneedslen'] =  'Jy moet die tipe \'n lengte gee.';
	$lang['strtypecreated'] =  'Tipe geskep';
	$lang['strtypecreatedbad'] =  'Tipeskepping het misluk.';
	$lang['strconfdroptype'] =  'Is jy seker dat jy die tipe \&quot;%s\&quot; wil verwyder?';
	$lang['strtypedropped'] =  'Tipe is verwyder.';
	$lang['strtypedroppedbad'] =  'Verwydering van die tipe het misluk.';
	$lang['strflavor'] = 'Geur';
	$lang['strbasetype'] = 'Basis';
	$lang['strcompositetype'] = 'Saamgestel';
	$lang['strpseudotype'] = 'Pseudo';

	// Schemas
	$lang['strschema'] =  'Skema';
	$lang['strschemas'] =  'Skemas';
	$lang['strshowallschemas'] =  'Wys alle skemas';
	$lang['strnoschema'] =  'Geen skema gevind.';
	$lang['strnoschemas'] =  'Geen skemas gevind.';
	$lang['strcreateschema'] =  'Skep skema';
	$lang['strschemaname'] =  'Skemanaam';
	$lang['strschemaneedsname'] =  'Jy moet \'n naam gee vir die skema.';
	$lang['strschemacreated'] =  'Skema is geskep';
	$lang['strschemacreatedbad'] =  'Die skema kon nie geskep word nie.';
	$lang['strconfdropschema'] =  'Is jy seker dat jy die skema &quot;%s&quot; wil verwyder?';
	$lang['strschemadropped'] =  'Skema is verwyder.';
	$lang['strschemadroppedbad'] =  'Verwydering van die skema het misluk.';
	$lang['strschemaaltered'] = 'Skema is gewysig.';
	$lang['strschemaalteredbad'] = 'Skemawysiging het misluk.';
	$lang['strsearchpath'] = 'Skema-soekpad';

	// Reports
	$lang['strreport'] =  'Verslag';
	$lang['strreports'] =  'Verslae';
	$lang['strshowallreports'] =  'Wys alle verslae';
	$lang['strnoreports'] =  'Geen verslae gevind.';
	$lang['strcreatereport'] =  'Skep verslag';
	$lang['strreportdropped'] =  'Verslag is verwyder.';
	$lang['strreportdroppedbad'] =  'Verwydering van verslag het misluk.';
	$lang['strconfdropreport'] =  'Is jy seker dat jy die verslag &quot;%s&quot; wil verwyder?';
	$lang['strreportneedsname'] =  'Jy moet \'n naam gee vir die verslag.';
	$lang['strreportneedsdef'] =  'Jy moet SQL-kode skryf vir die verslag.';
	$lang['strreportcreated'] =  'Verslag is geskep.';
	$lang['strreportcreatedbad'] =  'Die verslag kon nie geskep word nie.';

	// Domains
	$lang['strdomain'] =  'Domein';
	$lang['strdomains'] =  'Domeine';
	$lang['strshowalldomains'] =  'Wys alle domeine';
	$lang['strnodomains'] =  'Geen domeine is gevind nie.';
	$lang['strcreatedomain'] =  'Skep domein';
	$lang['strdomaindropped'] =  'Domein is verwyder.';
	$lang['strdomaindroppedbad'] =  'Verwydering van domein het misluk.';
	$lang['strconfdropdomain'] =  'Is jy seker dat jy die domein &quot;%s&quot; wil verwyder?';
	$lang['strdomainneedsname'] =  'Jy moet \'n naam gee vir die domein.';
	$lang['strdomaincreated'] =  'Domein is geskep.';
	$lang['strdomaincreatedbad'] =  'Domeinskepping het misluk.';
	$lang['strdomainaltered'] =  'Domein is gewysig.';
	$lang['strdomainalteredbad'] =  'Wysiging van die domein het misluk.';

	// Operators
	$lang['stroperator'] =  'Operator';
	$lang['stroperators'] =  'Operatore';
	$lang['strshowalloperators'] =  'Wys alle operators';
	$lang['strnooperator'] =  'Geen operator is gevind nie.';
	$lang['strnooperators'] =  'Geen operators is gevind nie.';
	$lang['strcreateoperator'] =  'Skep operator';
	$lang['strleftarg'] =  'Linkerargumenttipe';
	$lang['strrightarg'] =  'Regterargumenttipe';
	$lang['strcommutator'] = 'Kommutator';
	$lang['strnegator'] = 'Negeerder';
	$lang['strrestrict'] = 'Beperk';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Linkssorteer';
	$lang['strrightsort'] = 'Regssorteer';
	$lang['strlessthan'] = 'Kleiner as';
	$lang['strgreaterthan'] = 'Groter as';
	$lang['stroperatorneedsname'] =  'Jy moet \'n naam gee vir die operator.';
	$lang['stroperatorcreated'] =  'Operator is geskep';
	$lang['stroperatorcreatedbad'] =  'Operatorskepping het misluk.';
	$lang['strconfdropoperator'] =  'Is jy seker dat jy die operator &quot;%s&quot; wil verwyder?';
	$lang['stroperatordropped'] =  'Operator is verwyder.';
	$lang['stroperatordroppedbad'] =  'Verwydering van die operator het misluk.';

	// Casts
	$lang['strcasts'] = 'Ekwivalente';
	$lang['strnocasts'] = 'Geen ekwivalente gevind.';
	$lang['strsourcetype'] = 'Brontipe';
	$lang['strtargettype'] = 'Doeltipe';
	$lang['strimplicit'] = 'Implisiet';
	$lang['strinassignment'] = 'Tydens toekenning';
	$lang['strbinarycompat'] = '(Bin&#234;r-versoenbaar)';

	// Conversions
	$lang['strconversions'] = 'Omskakelings';
	$lang['strnoconversions'] = 'Geen omskakelings gevind.';
	$lang['strsourceencoding'] = 'Bron-enkodering';
	$lang['strtargetencoding'] = 'Doel-enkodering';

	// Languages
	$lang['strlanguages'] = 'Tale';
	$lang['strnolanguages'] = 'Geen tale gevind.';
	$lang['strtrusted'] = 'Betroubaar';

	// Info
	$lang['strnoinfo'] = 'Geen inligting beskikbaar.';
	$lang['strreferringtables'] = 'Verwysende tabelle';
	$lang['strparenttables'] = 'Parent-tabelle';
	$lang['strchildtables'] = 'Child-tabelle';

	// Aggregates
	$lang['straggregates'] = 'Opsommers';
	$lang['strnoaggregates'] = 'Geen opsommers gevind.';
	$lang['stralltypes'] = '(Alle tipes)';

	// Operator Classes
	$lang['stropclasses'] = 'Operatorklasse';
	$lang['strnoopclasses'] = 'Geen operatorklasse gevind.';
	$lang['straccessmethod'] = 'Toegangmetode';

	// Stats and performance
	$lang['strrowperf'] = 'Ry werkverrigting';
	$lang['strioperf'] = 'T/A werkverrigting';
	$lang['stridxrowperf'] = 'Indekseer-ry werkverrigting';
	$lang['stridxioperf'] = 'Indeks T/A werkverrigting';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sekwensieel';
	$lang['strscan'] = 'Deursoek';
	$lang['strread'] = 'Lees';
	$lang['strfetch'] = 'Gaan haal';
	$lang['strheap'] = 'Hoop';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST-indeks';
	$lang['strcache'] = 'Kasgeheue';
	$lang['strdisk'] = 'Skyf';
	$lang['strrows2'] = 'Rye';

	// Tablespaces
	$lang['strtablespace'] = 'Tabelruimte';
	$lang['strtablespaces'] = 'Tabelruimtes';
	$lang['strshowalltablespaces'] = 'Wys alle tabelruimtes';
	$lang['strnotablespaces'] = 'Geen tabelruimtes gevind.';
	$lang['strcreatetablespace'] = 'Skep tabelruimte';
	$lang['strlocation'] = 'Plek';
	$lang['strtablespaceneedsname'] = 'Jy moet \'n naam gee vir jou tabelruimte.';
	$lang['strtablespaceneedsloc'] = 'Jy moet \'n gids gee om jou tabelruimte in te skep.';
	$lang['strtablespacecreated'] = 'Tabelruimte geskep.';
	$lang['strtablespacecreatedbad'] = 'Skep van tabelruimte het misluk.';
	$lang['strconfdroptablespace'] = 'Is jy seker jy wil die tabelruimte &quot;%s&quot; uitvee?';
	$lang['strtablespacedropped'] = 'Tabelruimte is uitgevee.';
	$lang['strtablespacedroppedbad'] = 'Uitvee van tabelruimte het misluk.';
	$lang['strtablespacealtered'] = 'Tabelruimte gewysig.';
	$lang['strtablespacealteredbad'] = 'Wysiging van tabelruimte het misluk.';

	// Miscellaneous
	$lang['strtopbar'] = '%s loop op %s:%s -- Jy is aangeteken as gebruiker &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Hulp';
	$lang['strhelpicon'] = '?';

?>
