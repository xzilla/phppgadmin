<?php

	/**
	 * Swedish language file for phpPgAdmin.
	 * maintainer S. Malmqvist <samoola@slak.nu>
	 * Due to lack of SQL knowledge som translations may be wrong, mail me the correct one and ill fix it
	 *
	 * $Id: swedish.php,v 1.1 2003/08/28 01:29:33 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Svenska';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'sv_SV';

	// Welcome  
	$lang['strintro'] = 'Välkommen till phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmins Hemsida';
	$lang['strpgsqlhome'] = 'PostgreSQLs Hemsida';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Dokumentation (lokal)';
	$lang['strreportbug'] = 'Rapportera ett fel';
	$lang['strviewfaq'] = 'Visa Frågor & Svar';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Logga in';
	$lang['strloginfailed'] = 'Inloggningen misslyckades';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Logga ut';
	$lang['strowner'] = 'Ägare';
	$lang['straction'] = 'Åtgärd';
	$lang['stractions'] = 'Åtgärder';
	$lang['strname'] = 'Namn';
	$lang['strdefinition'] = 'Definition';
	$lang['stroperators'] = 'Operatörer';
	$lang['straggregates'] = 'Sammanslagningar';
	$lang['strproperties'] = 'Egenskaper';
	$lang['strbrowse'] = 'Bläddra';
	$lang['strdrop'] = 'Ta bort';
	$lang['strdropped'] = 'Borttagen';
	$lang['strnull'] = 'Ingenting';
	$lang['strnotnull'] = 'Inte Ingenting';
	$lang['strprev'] = 'Föregående';
	$lang['strnext'] = 'Nästa';
	$lang['strfailed'] = 'Misslyckades';
	$lang['strcreate'] = 'Skapa';
	$lang['strcreated'] = 'Skapad';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'Längd';
	$lang['strdefault'] = 'Standardvärde';
	$lang['stralter'] = 'Ändra';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Ångra';
	$lang['strsave'] = 'Spara';
	$lang['strreset'] = 'Nollställ';
	$lang['strinsert'] = 'Infoga';
	$lang['strselect'] = 'Välj';
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
	$lang['strrowsaff'] = 'Rad(er) Påverkade.';
	$lang['strexample'] = 't. ex.';
	$lang['strback'] = 'Bakåt';
	$lang['strqueryresults'] = 'Sökresultat';
	$lang['strshow'] = 'Visa';
	$lang['strempty'] = 'Tom';
	$lang['strlanguage'] = 'Språk';
	$lang['strencoding'] = 'Kodning';
	$lang['strvalue'] = 'Värde';
	$lang['strunique'] = 'Unik';
	$lang['strprimary'] = 'Primär';
	$lang['strexport'] = 'Exportera';
	$lang['strimport'] = 'Importera';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Kör';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Städa upp';
	$lang['stranalyze'] = 'Analysera';
	$lang['strcluster'] = 'Kluster';
	$lang['strreindex'] = 'Återindexera';
	$lang['strrun'] = 'Kör';
	$lang['stradd'] = 'Lägg till';
	$lang['strevent'] = 'Händelse';
	$lang['strwhere'] = 'När';
	$lang['strinstead'] = 'Gör istället';
	$lang['strwhen'] = 'När';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Bekräfta';
	$lang['strexpression'] = 'Uttryck';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = 'Utvidga';
	$lang['strcollapse'] = 'Kollapsa';

	// Error handling
	$lang['strnoframes'] = 'Du behöver en webläsare som stöder frames för att använda detta program.';
	$lang['strbadconfig'] = 'Din config.inc.php är för gammal. Du behöver skapa en ny från den nya config.inc.php-dist.';
	$lang['strnotloaded'] = 'Du har inte kompilerat in korrekt databasstöd i din PHP-installation.';
	$lang['strbadschema'] = 'Otillåtet schema angivet.';
	$lang['strbadencoding'] = 'Misslyckades att sätta klientkodning i databasen.';
	$lang['strsqlerror'] = 'SQL fel:';
	$lang['strinstatement'] = 'I påstående:';
	$lang['strinvalidparam'] = 'Otillåtna scriptparametrar.';
	$lang['strnodata'] = 'Hittade inga rader.';

	// Tables
	$lang['strtable'] = 'Tabell';
	$lang['strtables'] = 'Tabeller';
	$lang['strshowalltables'] = 'Visa alla tabeller';
	$lang['strnotables'] = 'Hittade inga tabeller.';
	$lang['strnotable'] = 'Hittade ingen tabell.';
	$lang['strcreatetable'] = 'Skapa tabell';
	$lang['strtablename'] = 'Tabellnamn';
	$lang['strtableneedsname'] = 'Du måste ge ett namn till din tabell.';
	$lang['strtableneedsfield'] = 'Du måste ange minst ett fält.';
	$lang['strtableneedscols'] = 'tabeller kräver ett tillåtet antal kolumner.';
	$lang['strtablecreated'] = 'Tabell skapad.';
	$lang['strtablecreatedbad'] = 'Misslyckades med att skapa Tabell.';
	$lang['strconfdroptable'] = 'Är du säker på att du vill ta bort tabellen "%s"?';
	$lang['strtabledropped'] = 'Tabellen borttagen.';
	$lang['strtabledroppedbad'] = 'Misslyckades med att ta bort tabellen.';
	$lang['strconfemptytable'] = 'Är du säker på att du vill tömma tabellen "%s"?';
	$lang['strtableemptied'] = 'Tabellen tömd.';
	$lang['strtableemptiedbad'] = 'Misslyckades med att tömma tabellen';
	$lang['strinsertrow'] = 'Ifoga rad';
	$lang['strrowinserted'] = 'Rad infogad.';
	$lang['strrowinsertedbad'] = 'Misslyckades att infoga rad.';
	$lang['streditrow'] = 'Redigera Rad';
	$lang['strrowupdated'] = 'Rad Uppdaterad.';
	$lang['strrowupdatedbad'] = 'Misslyckades att uppdatera rad.';
	$lang['strdeleterow'] = 'Radera rad';
	$lang['strconfdeleterow'] = 'Är du säker på att du vill radera denna rad?';
	$lang['strrowdeleted'] = 'Raden raderad.';
	$lang['strrowdeletedbad'] = 'Misslyckades att radera rad.';
	$lang['strsaveandrepeat'] = 'Spara & upprepa';
	$lang['strfield'] = 'Fält';
	$lang['strfields'] = 'Fält';
	$lang['strnumfields'] = 'Antal Fält';
	$lang['strfieldneedsname'] = 'Du måste namnge fältet';
	$lang['strselectneedscol'] = 'Du måste visa minst en kolumn';
	$lang['straltercolumn'] = 'Ändra kolumn';
	$lang['strcolumnaltered'] = 'Kolumn ändrad.';
	$lang['strcolumnalteredbad'] = 'Misslyckades att ändra kolumn.';
	$lang['strconfdropcolumn'] = 'Är du säker på att du vill radera kolumn "%s" från tabell "%s"?';
	$lang['strcolumndropped'] = 'Kolumn raderad.';
	$lang['strcolumndroppedbad'] = 'Misslyckades att radera kolumn.';
	$lang['straddcolumn'] = 'Lägg till kolumn';
	$lang['strcolumnadded'] = 'Kolumn inlagd.';
	$lang['strcolumnaddedbad'] = 'Misslyckades att lägga till kolumne.';
	$lang['strschemaanddata'] = 'Schema & Data';
	$lang['strschemaonly'] = 'Endast Schema';
	$lang['strdataonly'] = 'Endast Data';
	$lang['strcascade'] = 'KASKAD';

	// Users
	$lang['struseradmin'] = 'Användar Admin';
	$lang['struser'] = 'Användare';
	$lang['strusers'] = 'Användare';
	$lang['strusername'] = 'Användarnamn';
	$lang['strpassword'] = 'Lösenord';
	$lang['strsuper'] = 'Superanvändare?';
	$lang['strcreatedb'] = 'Skapa Databas?';
	$lang['strexpires'] = 'Utgångsdatum';
	$lang['strnousers'] = 'Hittade inga användare.';
	$lang['struserupdated'] = 'Användare uppdaterad.';
	$lang['struserupdatedbad'] = 'Misslyckades att uppdatera användare.';
	$lang['strshowallusers'] = 'Visa alla användare';
	$lang['strcreateuser'] = 'Skapa användare';
	$lang['strusercreated'] = 'Användare skapad.';
	$lang['strusercreatedbad'] = 'Misslyckades att skapa användare.';
	$lang['strconfdropuser'] = 'Är du säker på att du vill radera användare "%s"?';
	$lang['struserdropped'] = 'Användare raderad.';
	$lang['struserdroppedbad'] = 'Misslyckades att radera användare.';
	$lang['straccount'] = 'Konton';
	$lang['strchangepassword'] = 'Ändra lösenord';
	$lang['strpasswordchanged'] = 'Lösenord ändrat.';
	$lang['strpasswordchangedbad'] = 'Misslyckades att ändra lösenord.';
	$lang['strpasswordshort'] = 'För få tecken i lösenordet.';
	$lang['strpasswordconfirm'] = 'Lösenordet är inte samma som bekräftelsen.';
	
	// Groups
	$lang['strgroupadmin'] = 'Grupp Admin';
	$lang['strgroup'] = 'Grupp';
	$lang['strgroups'] = 'Grupper';
	$lang['strnogroup'] = 'Hittade ej grupp.';
	$lang['strnogroups'] = 'Hittade inga grupper.';
	$lang['strcreategroup'] = 'Skapa grupp';
	$lang['strshowallgroups'] = 'Visa alla grupper';
	$lang['strgroupneedsname'] = 'Du måste namnge din grupp.';
	$lang['strgroupcreated'] = 'Grupp skapad.';
	$lang['strgroupcreatedbad'] = 'Misslyckades att skapa grupp.';	
	$lang['strconfdropgroup'] = 'Är du säker på att du vill radera grupp "%s"?';
	$lang['strgroupdropped'] = 'Grupp raderad.';
	$lang['strgroupdroppedbad'] = 'Misslyckades att radera grupp.';
	$lang['strmembers'] = 'Medlemmar';

	// Privilges
	$lang['strprivilege'] = 'Rättighet';
	$lang['strprivileges'] = 'Rättigheter';
	$lang['strnoprivileges'] = 'Detta objekt har standard ägarrättigheter.';
	$lang['strgrant'] = 'Tillåt';
	$lang['strrevoke'] = 'Ta tillbaka';
	$lang['strgranted'] = 'Rättigheter ändrade.';
	$lang['strgrantfailed'] = 'Misslyckades att ändra rättigheter.';
	$lang['strgrantbad'] = 'Du måste ange minst en användare eller grupp och minst en rättighet.';
	$lang['stralterprivs'] = 'Ändra rättigheter';

	// Databases
	$lang['strdatabase'] = 'Databas';
	$lang['strdatabases'] = 'Databaser';
	$lang['strshowalldatabases'] = 'Visa alla databaser';
	$lang['strnodatabase'] = 'Hittade ingen databas.';
	$lang['strnodatabases'] = 'Hittade inga databaser.';
	$lang['strcreatedatabase'] = 'Skapa databas';
	$lang['strdatabasename'] = 'Databasnamn';
	$lang['strdatabaseneedsname'] = 'Du måste namnge databasen.';
	$lang['strdatabasecreated'] = 'Databas skapad.';
	$lang['strdatabasecreatedbad'] = 'Misslyckades att skapa databas.';	
	$lang['strconfdropdatabase'] = 'Är du säker på att du vill radera databas "%s"?';
	$lang['strdatabasedropped'] = 'Databas raderad.';
	$lang['strdatabasedroppedbad'] = 'Misslyckades att radera databas.';
	$lang['strentersql'] = 'Skriv in SQL-kommando att köra nedan:';
	$lang['strsqlexecuted'] = 'SQL-kommando utfört.';
	$lang['strvacuumgood'] = 'Uppstädning utförd.';
	$lang['strvacuumbad'] = 'Uppstädning misslyckades.';
	$lang['stranalyzegood'] = 'Analysen lyckades.';
	$lang['stranalyzebad'] = 'Analysen misslyckades.';

	// Views
	$lang['strview'] = 'Vy';
	$lang['strviews'] = 'Vyer';
	$lang['strshowallviews'] = 'Visa alla vyer';
	$lang['strnoview'] = 'Hittade ingen vy.';
	$lang['strnoviews'] = 'Hittade inga vyer.';
	$lang['strcreateview'] = 'Skapa vy';
	$lang['strviewname'] = 'Vynamn';
	$lang['strviewneedsname'] = 'Du måste namnge Vy.';
	$lang['strviewneedsdef'] = 'Du måste ange en definition för din vy.';
	$lang['strviewcreated'] = 'Vy skapad.';
	$lang['strviewcreatedbad'] = 'Misslyckades att skapa vy.';
	$lang['strconfdropview'] = 'Är du säker på att du vill radera vyn "%s"?';
	$lang['strviewdropped'] = 'Vy raderad.';
	$lang['strviewdroppedbad'] = 'Misslyckades att radera vy.';
	$lang['strviewupdated'] = 'Vy uppdaterad.';
	$lang['strviewupdatedbad'] = 'Misslyckades att uppdatera vy.';

	// Sequences
	$lang['strsequence'] = 'Följd';
	$lang['strsequences'] = 'Följder';
	$lang['strshowallsequences'] = 'Visa alla följder';
	$lang['strnosequence'] = 'Hittade ingen följd.';
	$lang['strnosequences'] = 'Hittade inga följder.';
	$lang['strcreatesequence'] = 'Skapa följd';
	$lang['strlastvalue'] = 'Sista värde';
	$lang['strincrementby'] = 'Öka med';
	$lang['strstartvalue'] = 'Startvärde';
	$lang['strmaxvalue'] = 'Största värde';
	$lang['strminvalue'] = 'Minsta värde';
	$lang['strcachevalue'] = 'Värde på cache';
	$lang['strlogcount'] = 'Räkna log';
	$lang['striscycled'] = 'Är upprepad?';
	$lang['striscalled'] = 'Är kallad?';
	$lang['strsequenceneedsname'] = 'Du måste ge ett namn till din följd.';
	$lang['strsequencecreated'] = 'Följd skapad.';
	$lang['strsequencecreatedbad'] = 'Misslyckades att skapa följd.'; 
	$lang['strconfdropsequence'] = 'Är du säker på att du vill radera följden "%s"?';
	$lang['strsequencedropped'] = 'Följden borrtagen.';
	$lang['strsequencedroppedbad'] = 'Misslyckades att radera följd.';

	// Indexes
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strshowallindexes'] = 'Visa alla index';
	$lang['strnoindex'] = 'Hittade inget index.';
	$lang['strnoindexes'] = 'Hittade inga index.';
	$lang['strcreateindex'] = 'Skapa index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtabname'] = 'Tabellnamn';
	$lang['strcolumnname'] = 'Kolumnnamn';
	$lang['strindexneedsname'] = 'Du måste ge ett namn för ditt index';
	$lang['strindexneedscols'] = 'Det krävs ett giltigt antal kolumner för index.';
	$lang['strindexcreated'] = 'Index skapat';
	$lang['strindexcreatedbad'] = 'Misslyckades att skapa index.';
	$lang['strconfdropindex'] = 'Är du säker på att du vill radera index "%s"?';
	$lang['strindexdropped'] = 'Index raderat.';
	$lang['strindexdroppedbad'] = 'Misslyckades att radera index.';
	$lang['strkeyname'] = 'Nyckelvärdesnamn';
	$lang['struniquekey'] = 'Unikt nyckelvärde';
	$lang['strprimarykey'] = 'Primärnyckel';
 	$lang['strindextype'] = 'Typ av index';
	$lang['strindexname'] = 'Indexnamn';
	$lang['strtablecolumnlist'] = 'Tabellkolumner';
	$lang['strindexcolumnlist'] = 'Indexkolumner';

	// Rules
	$lang['strrules'] = 'Regler';
	$lang['strrule'] = 'Regel';
	$lang['strshowallrules'] = 'Visa alla regler';
	$lang['strnorule'] = 'Hittade ingen regel.';
	$lang['strnorules'] = 'Hittade inga regler.';
	$lang['strcreaterule'] = 'Skapa regel';
	$lang['strrulename'] = 'Regelnamn';
	$lang['strruleneedsname'] = 'Du måste ge ett namn till din regel.';
	$lang['strrulecreated'] = 'Regel skapad.';
	$lang['strrulecreatedbad'] = 'Misslyckades att skapa regel.';
	$lang['strconfdroprule'] = 'Är du säker på att du vill radera regel "%s" för "%s"?';
	$lang['strruledropped'] = 'Regel raderat.';
	$lang['strruledroppedbad'] = 'Misslyckades att radera regel.';

	// Constraints
	$lang['strconstraints'] = 'Begränsningar';
	$lang['strshowallconstraints'] = 'Visa alla begränsningar';
	$lang['strnoconstraints'] = 'Hittade inga begränsningar.';
	$lang['strcreateconstraint'] = 'Skapa begränsning';
	$lang['strconstraintcreated'] = 'Begränsning skapad.';
	$lang['strconstraintcreatedbad'] = 'Misslyckades att skapa begränsning.';
	$lang['strconfdropconstraint'] = 'Är du säker på att du vill radera begränsning "%s" för "%s"?';
	$lang['strconstraintdropped'] = 'Begränsning raderad.';
	$lang['strconstraintdroppedbad'] = 'Misslyckades att radera begränsning.';
	$lang['straddcheck'] = 'Lägg till en koll';
	$lang['strcheckneedsdefinition'] = 'En kollbegränsning behöver definieras.';
	$lang['strcheckadded'] = 'Kollbegränsning inlagd.';
	$lang['strcheckaddedbad'] = 'Misslyckades att lägga till en koll.';
	$lang['straddpk'] = 'Lägg till primärnyckel';
	$lang['strpkneedscols'] = 'Primärnyckel behöver minst en kolumn.';
	$lang['strpkadded'] = 'Primärnyckel inlagd.';
	$lang['strpkaddedbad'] = 'Misslyckades att lägga till primärnyckel.';
	$lang['stradduniq'] = 'Lägg till Unikt nyckelvärde';
	$lang['struniqneedscols'] = 'Unikt nyckelvärde behöver minst en kolumn.';
	$lang['struniqadded'] = 'Unikt nyckelvärde inlagt.';
	$lang['struniqaddedbad'] = 'Misslyckades att lägga till unikt nyckelvärde.';
	$lang['straddfk'] = 'Lägg till utomstående nyckel';
	$lang['strfkneedscols'] = 'Utomstående nyckel behöver minst en kolumn.';
	$lang['strfkneedstarget'] = 'Utomstående nycket behöver en måltabell.';
	$lang['strfkadded'] = 'Utomstående nyckel inlagd.';
	$lang['strfkaddedbad'] = 'Misslyckades att lägga till utomstående nyckel.';
	$lang['strfktarget'] = 'Måltabell';
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
	$lang['strreturns'] = 'Återger';
	$lang['strarguments'] = 'Argument';
	$lang['strfunctionneedsname'] = 'Du måste namnge din funktion.';
	$lang['strfunctionneedsdef'] = 'Du måste definiera din funktion.';
	$lang['strfunctioncreated'] = 'Funktion skapad.';
	$lang['strfunctioncreatedbad'] = 'Misslyckades att skapa funktion.';
	$lang['strconfdropfunction'] = 'Är du säker på att du vill radera funktionen "%s"?';
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
	$lang['strtriggerneedsname'] = 'Du måste namnge din mekanism.';
	$lang['strtriggerneedsfunc'] = 'Du måste specificera en funktion för din mekanism.';
	$lang['strtriggercreated'] = 'Mekanism skapad.';
	$lang['strtriggercreatedbad'] = 'Misslyckades att skapa mekanism.';
	$lang['strconfdroptrigger'] = 'Är du säker på att du vill radera mekanismen "%s" för "%s"?';
	$lang['strtriggerdropped'] = 'Mekanism raderad.';
	$lang['strtriggerdroppedbad'] = 'Misslyckades att radera mekanism.';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typer';
	$lang['strshowalltypes'] = 'Visa alla typer';
	$lang['strnotype'] = 'Hittade ingen typ.';
	$lang['strnotypes'] = 'Hittade inga typer.';
	$lang['strcreatetype'] = 'Skapa typ';
	$lang['strtypename'] = 'Namn på typen';
	$lang['strinputfn'] = 'Infogande funktion';
	$lang['stroutputfn'] = 'Funktion för utvärden';
	$lang['strpassbyval'] = 'Genomgått utvärdering?';
	$lang['stralignment'] = 'Justering';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Avgränsare';
	$lang['strstorage'] = 'Lagringstyp';
	$lang['strtypeneedsname'] = 'Du måste namnge din typ.';
	$lang['strtypeneedslen'] = 'Du måste ge din typ en längd.';
	$lang['strtypecreated'] = 'Typ skapad';
	$lang['strtypecreatedbad'] = 'Misslyckades att skapa typ.';
	$lang['strconfdroptype'] = 'Är du säker på att du vill radera typen "%s"?';
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
	$lang['strschemaneedsname'] = 'Du måste namnge ditt Schema.';
	$lang['strschemacreated'] = 'Schema skapat';
	$lang['strschemacreatedbad'] = 'Misslyckades att skapa schema.';
	$lang['strconfdropschema'] = 'Är du säker på att du vill radera schemat "%s"?';
	$lang['strschemadropped'] = 'Schema raderat.';
	$lang['strschemadroppedbad'] = 'Misslyckades att radera schema.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapporter';
	$lang['strshowallreports'] = 'Visa alla rapporter';
	$lang['strnoreports'] = 'Hittade inga rapporter.';
	$lang['strcreatereport'] = 'Skapa rapport';
	$lang['strreportdropped'] = 'Rapport skapad.';
	$lang['strreportdroppedbad'] = 'Misslyckades att skapa rapport.';
	$lang['strconfdropreport'] = 'Är du säker på att du vill radera rapporten "%s"?';
	$lang['strreportneedsname'] = 'Du måste namnge din rapport.';
	$lang['strreportneedsdef'] = 'Du måste ange din SQL-fråga.';
	$lang['strreportcreated'] = 'Rapport sparad.';
	$lang['strreportcreatedbad'] = 'Misslyckades att spara rapport.';

	// Miscellaneous
	$lang['strtopbar'] = '%s på port %s:%s -- Du är inloggad som "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
