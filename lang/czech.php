<?php

	/**
	 * Ceska lokalizace phpPgAdmin-u.
	 * Zalozeno na slovenske lokalizaci. Thx.
	 *                                      libor(at)conet.cz
	 */

	// Language and character set
	$lang['applang'] = 'Èesky';
	$lang['appcharset'] = 'windows-1250';
	$lang['applocale'] = 'cs_CZ';

	// Basic strings
	$lang['strintro'] = 'Vítejte v phpPgAdminu.';
	$lang['strlogin'] = 'Pøihlášení';
	$lang['strloginfailed'] = 'Pøihlášení selhalo';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Odhlásit';
	$lang['strowner'] = 'Vlastník';
	$lang['straction'] = 'Akce';
	$lang['stractions'] = 'Akce';
	$lang['strname'] = 'Jméno';
	$lang['strdefinition'] = 'Definice';
	$lang['stroperators'] = 'Operátory';
	$lang['straggregates'] = 'Agregáty';
	$lang['strproperties'] = 'Vlastnosti';
	$lang['strbrowse'] = 'Pøehled';
	$lang['strdrop'] = 'Smazat';
	$lang['strdropped'] = 'Smazaný';
	$lang['strnull'] = 'Nulový';
	$lang['strnotnull'] = 'Nenulový';
	$lang['strprev'] = 'Pøedchozí';
	$lang['strnext'] = 'Další';
	$lang['strfailed'] = 'Selhalo';
	$lang['strcreate'] = 'Vytvoøit';
	$lang['strcreated'] = 'Vytvoøené';
	$lang['strcomment'] = 'Komentáø';
	$lang['strlength'] = 'Délka';
	$lang['strdefault'] = 'Pøedvolené';
	$lang['stralter'] = 'Zmìnit';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Storno';
	$lang['strsave'] = 'Uložit';
	$lang['strreset'] = 'Reset';
	$lang['strinsert'] = 'Vložit';
	$lang['strselect'] = 'Vybrat';
	$lang['strdelete'] = 'Smazat';
	$lang['strupdate'] = 'Aktualizovat';
	$lang['strreferences'] = 'Reference';
	$lang['stryes'] = 'Yo';
	$lang['strno'] = 'Ne';
	$lang['stredit'] = 'Upravit';
	$lang['strcolumns'] = 'Sloupce';
	$lang['strrows'] = 'Øádky';
	$lang['strexample'] = 'napø.';
	$lang['strback'] = 'Zpìt';
	$lang['strqueryresults'] = 'Výsledky dotazu';
	$lang['strshow'] = 'Ukázat';
	$lang['strempty'] = 'Vyprázdnit';
	$lang['strlanguage'] = 'Jazyk';
	$lang['strencoding'] = 'Kódovaní';
	$lang['strvalue'] = 'Hodnota';
	$lang['strunique'] = 'Unikátní';
	$lang['strprimary'] = 'Primární';
	$lang['strexport'] = 'Exportovat';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Vykonej';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyzovt';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Spustit';
	$lang['stradd'] = 'Pøidat';
	$lang['strevent'] = 'Událost';
	$lang['strwhere'] = 'Kde';
	$lang['strinstead'] = 'Udìlat namísto';
	$lang['strwhen'] = 'Když';
	$lang['strformat'] = 'Formát';

	// Error handling
	$lang['strnoframes'] = 'Tato aplikace vyžaduje prohlížec s podporou framù.';
	$lang['strbadconfig'] = 'Your config.inc.php is out of date. You will need to regenerate it from the new config.inc.php-dist.';
	$lang['strnotloaded'] = 'PHP není zakompilováno s podporou PostgreSQL';
	$lang['strbadschema'] = 'Nastaveno špatné schéma.';
	$lang['strbadencoding'] = 'Nastavení kódovaní v databáze selhalo.';
	$lang['strsqlerror'] = 'SQL chyba:';
	$lang['strinstatement'] = 'Ve výrazu:';
	$lang['strinvalidparam'] = 'Chybné parametry skriptu.';
	$lang['strnodata'] = 'Nenalezeny žádné záznamy.';

	// Tables
	$lang['strtable'] = 'Tabulka';
	$lang['strtables'] = 'Tabulky';
	$lang['strshowalltables'] = 'Zobrazit všechny tabulky';
	$lang['strnotables'] = 'Nenalezeny žádné tabulky.';
	$lang['strnotable'] = 'Nenalezena žádná tabulka.';
	$lang['strcreatetable'] = 'Vytvoøit tabulku';
	$lang['strtablename'] = 'Název tabulky';
	$lang['strtableneedsname'] = 'Musíš zadat názov tabulky.';
	$lang['strtableneedsfield'] = 'Musíš zadat aspoò jedno pole.';
	$lang['strtableneedscols'] = 'Tables require a valid number of columns.';
	$lang['strtablecreated'] = 'Tabulka vytvoøená.';
	$lang['strtablecreatedbad'] = 'Tabulka nebola vytvoøená.';
	$lang['strconfdroptable'] = 'Opravdu chceš odstranit tabulku "%s"?';
	$lang['strtabledropped'] = 'Tabulka odstranìná.';
	$lang['strtabledroppedbad'] = 'Tabulka nebyla odstranìná.';
	$lang['strconfemptytable'] = 'Opravdu chceš vyprázdnit tabulku "%s"?';
	$lang['strtableemptied'] = 'Tabulka vyprázdnìna.';
	$lang['strtableemptiedbad'] = 'Tabulka nebyla vyprázdnìna.';
	$lang['strinsertrow'] = 'Vložit øádek';
	$lang['strrowinserted'] = 'Øádek vložen.';
	$lang['strrowinsertedbad'] = 'Øádek nebyl vložen.';
	$lang['streditrow'] = 'Upravit øádek';
	$lang['strrowupdated'] = 'Øádek upraven.';
	$lang['strrowupdatedbad'] = 'Øádek nebyl upraven.';
	$lang['strdeleterow'] = 'Smazat øádek';
	$lang['strconfdeleterow'] = 'Opravdu chceš smazat tento øádek?';
	$lang['strrowdeleted'] = 'Øádek smazán.';
	$lang['strrowdeletedbad'] = 'Øádek nebyl smazán.';
	$lang['strsaveandrepeat'] = 'Uložit & opakovat';
	$lang['strfield'] = 'Pole';
	$lang['strfields'] = 'Pole';
	$lang['strnumfields'] = 'Poèet polí';
	$lang['strfieldneedsname'] = 'Musíš pomenovat pole';
	$lang['strselectneedscol'] = 'Musíš vybrat aspoò jeden stoupec';
	$lang['straltercolumn'] = 'Zmìnit sloupec';
	$lang['strcolumnaltered'] = 'Sloupec zmìnìný.';
	$lang['strcolumnalteredbad'] = 'Sloupec nebyl zmìnìný.';
	$lang['strconfdropcolumn'] = 'Opravdu chceš smazat sloupec "%s" z tabulky "%s"?';
	$lang['strcolumndropped'] = 'Sloupec smazán.';
	$lang['strcolumndroppedbad'] = 'Sloupec nebyl smazán.';
	$lang['straddcolumn'] = 'Pøidat sloupec';
	$lang['strcolumnadded'] = 'Sloupec pøidaný.';
	$lang['strcolumnaddedbad'] = 'Sloupec nebyl pøidaný.';
	$lang['strschemaanddata'] = 'Schéma & Dáta';
	$lang['strschemaonly'] = 'Jen Schéma';
	$lang['strdataonly'] = 'Jen Dáta';

	// Users
	$lang['struseradmin'] = 'Správa uživatelù';
	$lang['struser'] = 'Uživatel';
	$lang['strusers'] = 'Uživatelé';
	$lang['strusername'] = 'Jméno uživatele';
	$lang['strpassword'] = 'Heslo';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Vytváøet DB?';
	$lang['strexpires'] = 'Expiruje';
	$lang['strnousers'] = 'Nenalezen žádný uživatel.';
	$lang['struserupdated'] = 'Uživatel upraven.';
	$lang['struserupdatedbad'] = 'Uživatel nebyl upraven.';
	$lang['strshowallusers'] = 'Zobrazit všechny uživatele';
	$lang['strcreateuser'] = 'Vytvoøit uživatele';
	$lang['strusercreated'] = 'Užívatel vytvoøený.';
	$lang['strusercreatedbad'] = 'Užívatel nebyl vytvoøený.';
	$lang['strconfdropuser'] = 'Opravdu chceš smazat uživatele "%s"?';
	$lang['struserdropped'] = 'Uživatel smazán.';
	$lang['struserdroppedbad'] = 'Uživatel nebyl smazán.';
		
	// Groups
	$lang['strgroupadmin'] = 'Správa skupin';
	$lang['strgroup'] = 'Skupina';
	$lang['strgroups'] = 'Skupiny';
	$lang['strnogroup'] = 'Skupina nenalezena.';
	$lang['strnogroups'] = 'Nebyly nalezeny žádné skupiny.';
	$lang['strcreategroup'] = 'Vytvoøit skupinu';
	$lang['strshowallgroups'] = 'Zobrazit všechny skupiny';
	$lang['strgroupneedsname'] = 'Musíš zadat jméno skupiny.';
	$lang['strgroupcreated'] = 'Skupina vytvoøená.';
	$lang['strgroupcreatedbad'] = 'Skupina nebyla vytvoøená.';
	$lang['strconfdropgroup'] = 'Opravdu chceš smazat skupinu "%s"?';
	$lang['strgroupdropped'] = 'Skupina smazána.';
	$lang['strgroupdroppedbad'] = 'Skupina nebyla smazána.';
	$lang['strmembers'] = 'Èlenové';

	// Privileges
	$lang['strprivilege'] = 'Právo';
	$lang['strprivileges'] = 'Práva';
	$lang['strnoprivileges'] = 'Tento objekt nemá práva.';
	$lang['strgrant'] = 'Povolit';
	$lang['strrevoke'] = 'Odobrat';
	$lang['strgranted'] = 'Právo pøidané.';
	$lang['strgrantfailed'] = 'Právo nebylo pøidané.';
	$lang['strgrantuser'] = 'Povolit uživatele';
	$lang['strgrantgroup'] = 'Povolit skupinu';

	

	// Databases
	$lang['strdatabase'] = 'Databáze';
	$lang['strdatabases'] = 'Databáze';
	$lang['strshowalldatabases'] = 'Zobrazit všechny databáze';
	$lang['strnodatabase'] = 'Nenalezena žádná databáze.';
	$lang['strnodatabases'] = 'Nenalezena žádné databáze.';
	$lang['strcreatedatabase'] = 'Vytvoøit databázi';
	$lang['strdatabasename'] = 'Název databáze';
	$lang['strdatabaseneedsname'] = 'Musíš zadat název pro databázi.';
	$lang['strdatabasecreated'] = 'Databáze vytvoøena.';
	$lang['strdatabasecreatedbad'] = 'Databáze nebyla vytvoøena.';	
	$lang['strconfdropdatabase'] = 'Opravdu chceš smazat databázi "%s"?';
	$lang['strdatabasedropped'] = 'Databáze smazána.';
	$lang['strdatabasedroppedbad'] = 'Databáza nebyla smazána.';
	$lang['strentersql'] = 'Vlož SQL dotaz:';
	$lang['strvacuumgood'] = 'Vyèištìní provedeno.';
	$lang['strvacuumbad'] = 'Vyèištìní selhalo.';
	$lang['stranalyzegood'] = 'Analýza provedena.';
	$lang['stranalyzebad'] = 'Analýza selhala.';

	// Views
	$lang['strview'] = 'Náhled';
	$lang['strviews'] = 'Náhledy';
	$lang['strshowallviews'] = 'Zobrazit všechny náhledy';
	$lang['strnoview'] = 'Nenalezen žádný náhled.';
	$lang['strnoviews'] = 'Nenalezeny žádné náhledy.';
	$lang['strcreateview'] = 'Vytvoøit náhled';
	$lang['strviewname'] = 'Název náhledu';
	$lang['strviewneedsname'] = 'Musíš zadat název náhledu.';
	$lang['strviewneedsdef'] = 'Musíš zadat definici náhledu.';
	$lang['strviewcreated'] = 'Náhled vytvoøen.';
	$lang['strviewcreatedbad'] = 'Náhled nebyl vytvoøen.';
	$lang['strconfdropview'] = 'Opravdu chceš smazat náhled "%s"?';
	$lang['strviewdropped'] = 'Náhled smazán.';
	$lang['strviewdroppedbad'] = 'Náhled nebyl smazán.';
	$lang['strviewupdated'] = 'Náhled upraven.';
	$lang['strviewupdatedbad'] = 'Náhled nebyl upraven.';

	// Sequences
	$lang['strsequence'] = 'Sekvence';
	$lang['strsequences'] = 'Sekvence';
	$lang['strshowallsequences'] = 'Zobrazit všechny sekvence';
	$lang['strnosequence'] = 'Žádná sekvence nenalezena.';
	$lang['strnosequences'] = 'Žádný sekvence nenalezeny.';
	$lang['strcreatesequence'] = 'Vytvorit sekvenci';
	$lang['strlastvalue'] = 'Poslední hodnota';
	$lang['strincrementby'] = 'Inkrementovat od';	
	$lang['strstartvalue'] = 'Poèáteèní hodnota';
	$lang['strmaxvalue'] = 'Max hodnota';
	$lang['strminvalue'] = 'Min hodnota';
	$lang['strcachevalue'] = 'Cache hodnota';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Je cyklická?';
	$lang['striscalled'] = 'Je called?';
	$lang['strsequenceneedsname'] = 'Musíš zadat název sekvence.';
	$lang['strsequencecreated'] = 'Sekvence vytvoøena.';
	$lang['strsequencecreatedbad'] = 'Sekvence nebyla vytvoøena.'; 
	$lang['strconfdropsequence'] = 'Opravdu chceš smazat sekvence "%s"?';
	$lang['strsequencedropped'] = 'Sekvence smazána.';
	$lang['strsequencedroppedbad'] = 'Sekvence nebyla smazána.';

	// Indexes
	$lang['strindexes'] = 'Indexy';
	$lang['strindexname'] = 'Název indexu';
	$lang['strshowallindexes'] = 'Zobrazit všechny indexy';
	$lang['strnoindex'] = 'Nenalezen žádný index.';
	$lang['strnoindexes'] = 'Nenalezeny žádné index.';
	$lang['strcreateindex'] = 'Vytvoøit index';
	$lang['strindexname'] = 'Název indexu';
	$lang['strtabname'] = 'Název tabulky';
	$lang['strcolumnname'] = 'Názov stoupce';
	$lang['strindexneedsname'] = 'Musíš zadat název indexu';
	$lang['strindexneedscols'] = 'Index vyžaduje korektní poèet sloupcù.';
	$lang['strindexcreated'] = 'Index vytvoøen';
	$lang['strindexcreatedbad'] = 'Index nebyl vytvoøen.';
	$lang['strconfdropindex'] = 'Opravdu chceš smazat index "%s"?';
	$lang['strindexdropped'] = 'Index smazán.';
	$lang['strindexdroppedbad'] = 'Index nebyl smazán.';
	$lang['strkeyname'] = 'Název klíèe';
	$lang['struniquekey'] = 'Unikátní klíè';
	$lang['strprimarykey'] = 'Primární klíè';
 	$lang['strindextype'] = 'Typ indexu';
	$lang['strindexname'] = 'Název indexu';
	$lang['strtablecolumnlist'] = 'Sloupce v tabulce';
	$lang['strindexcolumnlist'] = 'Sloupce v indexu';

	// Rules
	$lang['strrules'] = 'Pravidla';
	$lang['strrule'] = 'Pravidlo';
	$lang['strshowallrules'] = 'Zobrazit všechna pravidla';
	$lang['strnorule'] = 'Nenalezeno žádné pravidlo.';
	$lang['strnorules'] = 'Nenalezeny žádná pravidla.';
	$lang['strcreaterule'] = 'Vytvoøit pravidlo';
	$lang['strrulename'] = 'Název pravidla';
	$lang['strruleneedsname'] = 'Musíš zadat název pravidla.';
	$lang['strrulecreated'] = 'Pravidlo vytvoøeno.';
	$lang['strrulecreatedbad'] = 'Pravidlo nebylo vytvoøeno.';
	$lang['strconfdroprule'] = 'Chceš opravdu smazat pravidlo "%s" na "%s"?';
	$lang['strruledropped'] = 'Pravidlo smazáno.';
	$lang['strruledroppedbad'] = 'Pravidlo nebylo smazáno.';

	// Constraints
	$lang['strconstraints'] = 'Omezení';
	$lang['strshowallconstraints'] = 'Zobrazit všechna omezení';
	$lang['strnoconstraints'] = 'Nenalezeny žádné omezení.';
	$lang['strcreateconstraint'] = 'Vytvoøit omezení';
	$lang['strconstraintcreated'] = 'Omezení vytvoøeno.';
	$lang['strconstraintcreatedbad'] = 'Omezení nebylo vytvoøeno.';
	$lang['strconfdropconstraint'] = 'Chceš opravdu smazat omezení "%s" na "%s"?';
	$lang['strconstraintdropped'] = 'Omezení smazáno.';
	$lang['strconstraintdroppedbad'] = 'Omezení nebylo smazáno.';
	$lang['straddcheck'] = 'Pøidat kontrolu';
	$lang['strcheckneedsdefinition'] = 'Je nutné kontrolu omezení definovat.';
	$lang['strcheckadded'] = 'Kontrola omezení pøidána.';
	$lang['strcheckaddedbad'] = 'Kontrola omezení nebyla pøidána.';
	$lang['straddpk'] = 'Pøidat primární klíè';
	$lang['strpkneedscols'] = 'Primární klíè vyžaduje alespoò jeden sloupec.';
	$lang['strpkadded'] = 'Primární klíè pøidán.';
	$lang['strpkaddedbad'] = 'Primární klíè nebyl pøidán.';
	$lang['stradduniq'] = 'Pøidat unikátní klíè';
	$lang['struniqneedscols'] = 'Unikátní klíè vyžaduje alespoò jeden sloupec.';
	$lang['struniqadded'] = 'Unikátní klíè pøidán.';
	$lang['struniqaddedbad'] = 'Unikátní klíè nebyl pøidán.';
	$lang['straddfk'] = 'Pøidat cizí klíè';
	$lang['strfkneedscols'] = 'Cizí klíè vyžaduje alespoò jeden sloupec.';
	$lang['strfkadded'] = 'Cizí klíè pøidán.';
	$lang['strfkaddedbad'] = 'Cizí klíè nebyl pøidán.';
	$lang['strfktarget'] = 'Cílová tabulka';

	// Functions
	$lang['strfunction'] = 'Funkce';
	$lang['strfunctions'] = 'Funkce';
	$lang['strshowallfunctions'] = 'Zobrazit všechny funkce';
	$lang['strnofunction'] = 'Nenalezena žádná funkce.';
	$lang['strnofunctions'] = 'Nenalezeny žádné funkce.';
	$lang['strcreatefunction'] = 'Vytvoøit funkci';
	$lang['strfunctionname'] = 'Název funkce';
	$lang['strreturns'] = 'Vrací';
	$lang['strarguments'] = 'Argumenty';
	$lang['strproglanguage'] = 'Jazyk';
	$lang['strfunctionneedsname'] = 'Musíš zadat název funkce.';
	$lang['strfunctionneedsdef'] = 'Musíš zadat definici funkce.';
	$lang['strfunctioncreated'] = 'Funkce vytvoøena.';
	$lang['strfunctioncreatedbad'] = 'Funkce nebyla vytvoøena.';
	$lang['strconfdropfunction'] = 'Opravdu chceš smazat funkci "%s"?';
	$lang['strfunctiondropped'] = 'Funkce smazána.';
	$lang['strfunctiondroppedbad'] = 'Funkce nebyla smazána.';
	$lang['strfunctionupdated'] = 'Funkce upravena.';
	$lang['strfunctionupdatedbad'] = 'Funkce nebyla upravena.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Zobrazit všechny triggery';
	$lang['strnotrigger'] = 'Nenalezen žádný trigger.';
	$lang['strnotriggers'] = 'Nenalezeny žádné triggery.';
	$lang['strcreatetrigger'] = 'Vytvoøit trigger';
	$lang['strtriggerneedsname'] = 'Musíš zadat název triggeru.';
	$lang['strtriggerneedsfunc'] = 'Musíš zadat funkci triggeru.';
	$lang['strtriggercreated'] = 'Trigger vytvoøen.';
	$lang['strtriggercreatedbad'] = 'Trigger nebyl vytvoøen.';
	$lang['strconfdroptrigger'] = 'Chceš opravdu smazat trigger "%s" na "%s"?';
	$lang['strtriggerdropped'] = 'Trigger smazán.';
	$lang['strtriggerdroppedbad'] = 'Trigger nebyl smazán.';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Zobrazit všechny typy';
	$lang['strnotype'] = 'Nenalezený žádný typ.';
	$lang['strnotypes'] = 'Nenalezeny žádné typy.';
	$lang['strcreatetype'] = 'Vytvoøit typ';
	$lang['strtypename'] = 'Název typu';
	$lang['strinputfn'] = 'Vstupní funkce';
	$lang['stroutputfn'] = 'Výstupní funkce';
	$lang['strpassbyval'] = 'Volán hodnotou?';
	$lang['stralignment'] = 'Zarovnání';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Oddìlovaè';
	$lang['strstorage'] = 'Storage';
	$lang['strtypeneedsname'] = 'Musíš zadat název typu.';
	$lang['strtypeneedslen'] = 'Musíš zadat délku typu.';
	$lang['strtypecreated'] = 'Typ vytvoøen.';
	$lang['strtypecreatedbad'] = 'Typ nebyl vytvoøen.';
	$lang['strconfdroptype'] = 'Chceš opravdu smazat typ "%s"?';
	$lang['strtypedropped'] = 'Typ smazán.';
	$lang['strtypedroppedbad'] = 'Typ nebyl smazán.';

	// Schemas
	$lang['strschema'] = 'Schéma';
	$lang['strschemas'] = 'Schémata';
	$lang['strshowallschemas'] = 'Zobrazit všechny schémata';
	$lang['strnoschema'] = 'Nenalezeno žádné schéma.';
	$lang['strnoschemas'] = 'Nenalezeny žádné schémata.';
	$lang['strcreateschema'] = 'Vytvorit schéma';
	$lang['strschemaname'] = 'Název schématu';
	$lang['strschemaneedsname'] = 'Musíš zadat název schématu.';
	$lang['strschemacreated'] = 'Schéma vytvoøeno.';
	$lang['strschemacreatedbad'] = 'Schéma nebylo vytvoøeno.';
	$lang['strconfdropschema'] = 'Chceš opravdu smazat schéma "%s"?';
	$lang['strschemadropped'] = 'Schéma smazáno.';
	$lang['strschemadroppedbad'] = 'Schéma nebylo smazáno.';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reporty';
	$lang['strshowallreports'] = 'Zobrazit všechny reporty';
	$lang['strnoreports'] = 'Nenalezeny žádné reporty.';
	$lang['strcreatereport'] = 'Vytvoøit report';
	$lang['strreportdropped'] = 'Report smazán.';
	$lang['strreportdroppedbad'] = 'Report nebyl smazán.';
	$lang['strconfdropreport'] = 'Opravdu chceš smazat report "%s"?';
	$lang['strreportneedsname'] = 'Musíš zadat název reportu.';
	$lang['strreportneedsdef'] = 'Musíš zadat SQL dotaz pro report.';
	$lang['strreportcreated'] = 'Report uložen.';
	$lang['strreportcreatedbad'] = 'Report nebyl uložen.';

	// Miscellaneous
	$lang['strtopbar'] = '%s beží na %s:%s -- Jsi pøihlášený jako "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
