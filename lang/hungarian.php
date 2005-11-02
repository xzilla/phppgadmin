<?php

	/**
	 * Hungarian language file for phpPgAdmin.
	 * maintainer: Sulyok Peti <peti@sulyok.hu>
	 *
	 *
	 */

	// Language and character set
	$lang['applang'] = 'Magyar';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'hu_HU';
	$lang['appdbencoding'] = 'LATIN2';  // It would be good to change this to UNICODE. IMHO
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'Üdvözli a phpPgAdmin!';
	$lang['strppahome'] = 'A phpPgAdmin honlapja';
	$lang['strpgsqlhome'] = 'A PostgreSQL honlapja';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'A PostgreSQL (helyi) dokumentációja';
	$lang['strreportbug'] = 'Hibajelentés feladása';
	$lang['strviewfaq'] = 'GYIK megtekintése';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Bejelentkezés';
	$lang['strloginfailed'] = 'Sikertelen bejelentkezés';
	$lang['strlogindisallowed'] = 'Nem engedélyezett bejelentkezés';
	$lang['strserver'] = 'Kiszolgáló';
	$lang['strservers']  =  'Kiszolgálók';
	$lang['strintroduction']  =  'Bevezető';
	$lang['strhost']  =  'Gazda';
	$lang['strport']  =  'Kapu';
	$lang['strlogout'] = 'Kilépés';
	$lang['strowner'] = 'Tulajdonos';
	$lang['straction'] = 'Művelet';
	$lang['stractions'] = 'Műveletek';
	$lang['strname'] = 'Név';
	$lang['strdefinition'] = 'Definíció';
	$lang['strproperties'] = 'Tulajdonságok';
	$lang['strbrowse'] = 'Tallózás';
	$lang['strdrop'] = 'Törlés';
	$lang['strdropped'] = 'Törlölve';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = '< Előző';
	$lang['strnext'] = 'Következő >';
	$lang['strfirst'] = '<< Első';
	$lang['strlast'] = 'Utolsó >>';
	$lang['strfailed'] = 'Sikertelen';
	$lang['strcreate'] = 'Teremtés';
	$lang['strcreated'] = 'Megteremtve';
	$lang['strcomment'] = 'Megjegyzés';
	$lang['strlength'] = 'Hossz';
	$lang['strdefault'] = 'Alapértelmezés';
	$lang['stralter'] = 'Módosítás';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Mégsem';
	$lang['strsave'] = 'Mentés';
	$lang['strreset'] = 'Újra';
	$lang['strinsert'] = 'Beszúrás';
	$lang['strselect'] = 'Kiválasztás';
	$lang['strdelete'] = 'Törlés';
	$lang['strupdate'] = 'Időszerűsítés';
	$lang['strreferences'] = 'Hivatkozások';
	$lang['stryes'] = 'Igen';
	$lang['strno'] = 'Nem';
	$lang['strtrue'] = 'IGAZ';
	$lang['strfalse'] = 'HAMIS';
	$lang['stredit'] = 'Szerkesztés';
	$lang['strcolumn']  = 'Oszlop';
	$lang['strcolumns'] = 'Oszlopok';
	$lang['strrows'] = 'sor';
	$lang['strrowsaff'] = 'sor érintett.';
	$lang['strobjects'] = 'objektum';
	$lang['strback'] = 'Vissza';
	$lang['strqueryresults'] = 'Lekérdezés eredményei';
	$lang['strshow'] = 'Megjelenítés';
	$lang['strempty'] = 'Ürítés';
	$lang['strlanguage'] = 'Nyelv';
	$lang['strencoding'] = 'Kódolás';
	$lang['strvalue'] = 'Érték';
	$lang['strunique'] = 'egyedi';
	$lang['strprimary'] = 'Elsődleges';
	$lang['strexport'] = 'Exportálás';
	$lang['strimport'] = 'Importálás';
	$lang['strallowednulls']  =  'Engedélyezett NULL betűk';
	$lang['strbackslashn']  =  '\N';
	$lang['strnull']  =  'Null';           //
	$lang['strnull']  =  'NULL (A szó)';   // double??
	$lang['stremptystring']  =  'Üres szöveg/mező';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Gazda';
	$lang['strvacuum'] = 'Takarítás';
	$lang['stranalyze'] = 'Elemzés';
	$lang['strclusterindex'] = 'Fürtözés';
	$lang['strclustered'] = 'Fürtözve?';
	$lang['strreindex'] = 'Újraindexelés';
	$lang['strrun'] = 'Futtatás';
	$lang['stradd'] = 'Bővítés';
	$lang['strremove']  =  'Törlés';
	$lang['strevent'] = 'Esemény';
	$lang['strwhere'] = 'Hol';
	$lang['strinstead'] = 'Inkább';
	$lang['strwhen'] = 'Mikor';
	$lang['strformat'] = 'Alak';
	$lang['strdata'] = 'Adatok';
	$lang['strconfirm'] = 'Megerősítés';
	$lang['strexpression'] = 'Kifejezés';
	$lang['strellipsis'] = '…';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Kinyitás';
	$lang['strcollapse'] = 'Összecsukás';
	$lang['strexplain'] = 'Kifejtés';
	$lang['strexplainanalyze'] = 'Elemzés kifejtése';
	$lang['strfind'] = 'Keresés';
	$lang['stroptions'] = 'Részletek';
	$lang['strrefresh'] = 'Frissítés';
	$lang['strdownload'] = 'Letöltés';
	$lang['strdownloadgzipped'] = 'Gzippel tömörített letöltés';
	$lang['strinfo'] = 'Infó';
	$lang['stroids'] = 'OID-k';
	$lang['stradvanced'] = 'Haladó';
	$lang['strvariables'] = 'Változók';
	$lang['strprocess'] = 'Folyamat';
	$lang['strprocesses'] = 'Folyamatok';
	$lang['strsetting'] = 'Beállítás';
	$lang['streditsql'] = 'SQL-szerkesztés';
	$lang['strruntime'] = 'Teljes futási idő: %s ms';
	$lang['strpaginate'] = 'Oldalakra tördelés';
	$lang['struploadscript'] = 'vagy egy SQL-írás feltöltése:';
	$lang['strstarttime'] = 'Kezdés ideje';
	$lang['strfile'] = 'Fájl';
	$lang['strfileimported'] = 'Fájl behozva.';
	$lang['strtrycred']  =  'Használja minden kiszolgálóhoz e beállításokat';

	// Error handling
	$lang['strnoframes']  =  'Ez alkalmazás legjobban kereteket támogató böngészővel működik, de használható keretek nélkül is az alábbi hivatkozásra kattintva.';
	$lang['strnoframeslink']  =  'Keretek nélküli használat';
	$lang['strbadconfig'] = 'A config.inc.php elavult. Újra kell teremteni az új config.inc.php-dist fájlból.';
	$lang['strnotloaded'] = 'Az ön PHP rendszere nem támogatja a PostgreSQL-t.';
	$lang['strpostgresqlversionnotsupported']  =  'A PostgreSQL e változata nem megfelelő. Kérem telepítse a %s változatot, vagy újabbat!';
	$lang['strbadschema'] = 'A megadott séma érvénytelen.';
	$lang['strbadencoding'] = 'Az ügyfél oldali kódolás beállítása az adatbázisban nem sikerült.';
	$lang['strsqlerror'] = 'SQL hiba:';
	$lang['strinstatement'] = 'A következő kifejezésben:';
	$lang['strinvalidparam'] = 'Érvénytelen írás-paraméterek.';
	$lang['strnodata'] = 'Nincsenek sorok.';
	$lang['strnoobjects'] = 'Nincsenek objektumok.';
	$lang['strrownotunique'] = 'Nincs egyedi azonosító ehhez a sorhoz.';
	$lang['strnoreportsdb'] = 'Ön még nem teremtette meg a jelentések adatbázisát. Olvassa el az INSTALL fájlt további útmutatásért!';
	$lang['strnouploads'] = 'Fájl feltöltése letiltva.';
	$lang['strimporterror'] = 'Behozatali hiba.';
	$lang['strimporterror-fileformat']  =  'Behozatali hiba: nem sikerült automatikusan megállapítani a fájl formátumát.';
	$lang['strimporterrorline'] = 'Behozatali hiba a %s. sorban.';
	$lang['strimporterrorline-badcolumnnum']  =  'Behozatali hiba a(z) %s. számú sorban:  A sor nem tartalmazza a megfelelő számú sort.';
	$lang['strimporterror-uploadedfile']  =  'Behozatali hiba: A fájlt nem sikerült feltülteni a kiszolgálóra.';
	$lang['strcannotdumponwindows']  =  'Összetett tábla ömlesztése és séma nevek Windows-on nem támogatottak.';

	// Tables
	$lang['strtable'] = 'Tábla';
	$lang['strtables'] = 'Táblák';
	$lang['strshowalltables'] = 'Minden tábla megjelenítése';
	$lang['strnotables'] = 'Nincsenek táblák.';
	$lang['strnotable'] = 'Nincs tábla.';
	$lang['strcreatetable'] = 'Tábla teremtése';
	$lang['strtablename'] = 'Tábla neve';
	$lang['strtableneedsname'] = 'Meg kell adni a tábla nevét.';
	$lang['strtableneedsfield'] = 'Legalább egy oszlopot meg kell adni.';
	$lang['strtableneedscols'] = 'A táblának érvényes számú oszlop kell.';
	$lang['strtablecreated'] = 'A tábla megteremtve.';
	$lang['strtablecreatedbad'] = 'Nem sikerült táblát teremteni.';
	$lang['strconfdroptable'] = 'Biztosan törölni kívánja „%s” táblát?';
	$lang['strtabledropped'] = 'A tábla törölve.';
	$lang['strtabledroppedbad'] = 'Nem sikerült a táblát törölni.';
	$lang['strconfemptytable'] = 'Biztosan ki akarja üríteni „%s” táblát?';
	$lang['strtableemptied'] = 'A tábla kiürítve.';
	$lang['strtableemptiedbad'] = 'Nem sikerült a táblát kiüríteni.';
	$lang['strinsertrow'] = 'Sor beszúrása';
	$lang['strrowinserted'] = 'A sor beszúrva.';
	$lang['strrowinsertedbad'] = 'Nem sikerült a sort beszúrni.';
	$lang['strrowduplicate']  =  'Sor beszúrása sikertelen. Dupla beszúrási kísérlet.';
	$lang['streditrow'] = 'Sor szerkesztése';
	$lang['strrowupdated'] = 'A sor időszerűsítve.';
	$lang['strrowupdatedbad'] = 'Nem sikerült a sort időszerűsíteni.';
	$lang['strdeleterow'] = 'Sor törlése';
	$lang['strconfdeleterow'] = 'Biztosan törölni kívánja ezt a sort?';
	$lang['strrowdeleted'] = 'A sor törölve.';
	$lang['strrowdeletedbad'] = 'Nem sikerült a sort törölni.';
	$lang['strinsertandrepeat']  =  'Beszúrás & Ismétlés';
	$lang['strnumcols']  =  'Oszlopok száma';
	$lang['strcolneedsname']  =  'Meg kell adnia az oszlop nevét';
	$lang['strselectallfields'] = 'Minden oszlop kijelölése';
	$lang['strselectneedscol'] = 'Ki kell választani egy oszlopot';
	$lang['strselectunary'] = 'Egyváltozós műveleteknek nem lehetnek értékei';
	$lang['straltercolumn'] = 'Oszlop megváltoztatása';
	$lang['strcolumnaltered'] = 'Az oszlop megváltoztatva.';
	$lang['strcolumnalteredbad'] = 'Nem sikerült az oszlopot megváltoztatni.';
	$lang['strconfdropcolumn'] = 'Biztosan törölni kívánja „%s” oszlopot „%s” táblából?';
	$lang['strcolumndropped'] = 'Az oszlop törölve.';
	$lang['strcolumndroppedbad'] = 'Nem sikerült az oszlopot törölni.';
	$lang['straddcolumn'] = 'Oszloppal bővítés';
	$lang['strcolumnadded'] = 'Oszloppal bővítve.';
	$lang['strcolumnaddedbad'] = 'Nem sikerült az oszloppal bővíteni.';
	$lang['strcascade'] = 'ZUHATAG';
	$lang['strtablealtered'] = 'A tábla megváltoztatva.';
	$lang['strtablealteredbad'] = 'Nem sikerült a táblát megváltoztatni.';
	$lang['strdataonly'] = 'Csak adatok';
	$lang['strstructureonly'] = 'Csak struktúra';
	$lang['strstructureanddata'] = 'Struktúra és adatok';
	$lang['strtabbed'] = 'Füles';
	$lang['strauto'] = 'Autó';
	$lang['strconfvacuumtable']  =  'Biztosan ki akarja takarítani „%s” táblát?';
	$lang['strestimatedrowcount']  =  'Becsült sorok száma';

	// Users
	$lang['struser'] = 'Felhasználó';
	$lang['strusers'] = 'Felhasználók';
	$lang['strusername'] = 'Felhasználónév';
	$lang['strpassword'] = 'Jelszó';
	$lang['strsuper'] = 'Rendszergazda?';
	$lang['strcreatedb'] = 'Létrehozhat AB-t?';
	$lang['strexpires'] = 'Lejár';
	$lang['strsessiondefaults'] = 'Munkamenet alapértékei';
	$lang['strnousers']  =  'Nincsenek felhasználók.';
	$lang['struserupdated'] = 'A felhasználó időszerűsítve.';
	$lang['struserupdatedbad'] = 'Nem sikerült a felhasználót időszerűsíteni.';
	$lang['strshowallusers'] = 'Minden felhasználó megjelenítése';
	$lang['strcreateuser'] = 'Felhasználó teremtése';
	$lang['struserneedsname'] = 'A felhasználónak nevet kell adni.';
	$lang['strusercreated'] = 'A felhasználó megteremtve.';
	$lang['strusercreatedbad'] = 'Nem sikerült a felhasználót megteremteni.';
	$lang['strconfdropuser'] = 'Biztosan törölni akarja „%s” felhasználót?';
	$lang['struserdropped'] = 'A felhasználó törölve.';
	$lang['struserdroppedbad'] = 'Nem sikerült a felhasználót törölni.';
	$lang['straccount'] = 'Számla';
	$lang['strchangepassword'] = 'Jelszó megváltoztatása';
	$lang['strpasswordchanged'] = 'A jelszó megváltoztatva.';
	$lang['strpasswordchangedbad'] = 'Nem sikerült a jelszót megváltoztatni.';
	$lang['strpasswordshort'] = 'A jelszó túl rövid.';
	$lang['strpasswordconfirm'] = 'A jelszó nem egyezik a megerősítéssel.';
	
	// Groups
	$lang['strgroup'] = 'Csoport';
	$lang['strgroups'] = 'Csoportok';
	$lang['strnogroup'] = 'Nincs csoport.';
	$lang['strnogroups'] = 'Nincsenek csoportok.';
	$lang['strcreategroup'] = 'Csoport teremtése';
	$lang['strshowallgroups'] = 'Minden csoport megjelenítése';
	$lang['strgroupneedsname'] = 'A csoportnak nevet kell adni.';
	$lang['strgroupcreated'] = 'A csoport megteremtve.';
	$lang['strgroupcreatedbad'] = 'Nem sikerült a csoportot megteremteni.';	
	$lang['strconfdropgroup'] = 'Biztosan törölni kívánja „%s” csoportot?';
	$lang['strgroupdropped'] = 'A csoport törölve.';
	$lang['strgroupdroppedbad'] = 'Nem sikerült a csoportot törölni.';
	$lang['strmembers'] = 'Tagok';
	$lang['straddmember'] = 'Tag felvétele';
	$lang['strmemberadded'] = 'Tag felvéve.';
	$lang['strmemberaddedbad'] = 'Nem sikerült tagot felvenni.';
	$lang['strdropmember'] = 'Tag kicsapása';
	$lang['strconfdropmember'] = 'Biztosan ki akarja csapni „%s” tagot „%s” csoportból?';
	$lang['strmemberdropped'] = 'A tag kicsapva.';
	$lang['strmemberdroppedbad'] = 'Nem sikerült a tagot kicsapni.';

	// Privileges
	$lang['strprivilege'] = 'Jogosultság';
	$lang['strprivileges'] = 'Jogosultságok';
	$lang['strnoprivileges'] = 'Ez az objektum alap-jogosultságokkal rendelkezik.';
	$lang['strgrant'] = 'Feljogosítás';
	$lang['strrevoke'] = 'Jogosultság megvonása';
	$lang['strgranted'] = 'A jogosultságok megváltoztatva.';
	$lang['strgrantfailed'] = 'Nem sikerült a jogosultságokat megváltoztatni.';
	$lang['strgrantbad'] = 'Legalább egy felhasználót és jogosultságot ki kell választani.';
	$lang['strgrantor'] = 'Jogosító';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Adatbázis';
	$lang['strdatabases'] = 'Adatbázisok';
	$lang['strshowalldatabases'] = 'Minden adatbázis megjelenítése';
	$lang['strnodatabase'] = 'Nincs adatbázis.';
	$lang['strnodatabases'] = 'Nincsenek adatbázisok.';
	$lang['strcreatedatabase'] = 'Adatbázis teremtése';
	$lang['strdatabasename'] = 'Adatbázisnév';
	$lang['strdatabaseneedsname'] = 'Meg kell adni az adatbázisnevet.';
	$lang['strdatabasecreated'] = 'Az adatbázis megteremtve.';
	$lang['strdatabasecreatedbad'] = 'Nem sikerült megteremteni az adatbázist.';
	$lang['strconfdropdatabase'] = 'Biztosan törölni akarja „%s” adatbázist?';
	$lang['strdatabasedropped'] = 'Az adatbázis törölve.';
	$lang['strdatabasedroppedbad'] = 'Nem sikerült törölni az adatbázist.';
	$lang['strentersql'] = 'Írja be a végrehajtandó SQL-kifejezéseket ide:';
	$lang['strsqlexecuted'] = 'Az SQL-kifejezések végrehajtva.';
	$lang['strvacuumgood'] = 'A takarítás kész.';
	$lang['strvacuumbad'] = 'Nem sikerült kitakarítani.';
	$lang['stranalyzegood'] = 'Az elemzés kész.';
	$lang['stranalyzebad'] = 'Nem sikerült kielemezni.';
	$lang['strreindexgood'] = 'Újraindexelés kész.';
	$lang['strreindexbad'] = 'Újraindexelés sikertelen.';
	$lang['strfull'] = 'Teljes';
	$lang['strfreeze'] = 'Befagyasztás';
	$lang['strforce'] = 'Kényszerítés';
	$lang['strsignalsent']  =  'Jelzés elküldve.';
	$lang['strsignalsentbad']  =  'Jelzés elküldése sikertelen.';
	$lang['strallobjects']  =  'Minden objektum';
	$lang['strdatabasealtered']  =  'Adatbázis megváltoztatva.';
	$lang['strdatabasealteredbad']  =  'Adatbázis megváltoztatása sikertelen.';

	// Views
	$lang['strview'] = 'Nézet';
	$lang['strviews'] = 'Nézetek';
	$lang['strshowallviews'] = 'Minden nézet megjelenítése';
	$lang['strnoview'] = 'Nincs nézet.';
	$lang['strnoviews'] = 'Nincsenek nézetek.';
	$lang['strcreateview'] = 'Nézet teremtése';
	$lang['strviewname'] = 'Nézetnév';
	$lang['strviewneedsname'] = 'Meg kell adni a nézetnevet.';
	$lang['strviewneedsdef'] = 'Meg kell adni a nézet definícióját.';
	$lang['strviewneedsfields'] = 'Meg kell adnia a oszlopokat, amiket ki akar jelölni a nézetben.';
	$lang['strviewcreated'] = 'A nézet megteremtve.';
	$lang['strviewcreatedbad'] = 'Nem sikerült megteremteni a nézetet.';
	$lang['strconfdropview'] = 'Biztosan törölni kívánja „%s” nézetet?';
	$lang['strviewdropped'] = 'A nézet törölve.';
	$lang['strviewdroppedbad'] = 'Nem sikerült törölni a nézetet.';
	$lang['strviewupdated'] = 'A nézet időszerűsítve.';
	$lang['strviewupdatedbad'] = 'Nem sikerült időszerűsíteni a nézetet.';
	$lang['strviewlink'] = 'Hivatkozások';
	$lang['strviewconditions'] = 'További feltételek';
	$lang['strcreateviewwiz'] = 'Nézet teremtése varázslóval';

	// Sequences
	$lang['strsequence'] = 'Sorozat';
	$lang['strsequences'] = 'Sorozatok';
	$lang['strshowallsequences'] = 'Minden sorozat megjelenítése';
	$lang['strnosequence'] = 'Nincs sorozat.';
	$lang['strnosequences'] = 'Nincsenek sorozatok.';
	$lang['strcreatesequence'] = 'Sorozat teremtése';
	$lang['strlastvalue'] = 'Utolsó érték';
	$lang['strincrementby'] = 'Növekmény';	
	$lang['strstartvalue'] = 'Kezdőérték';
	$lang['strmaxvalue'] = 'Felső korlát';
	$lang['strminvalue'] = 'Alsó korlát';
	$lang['strcachevalue'] = 'Gyorstár értéke';
	$lang['strlogcount'] = 'Számláló';
	$lang['striscycled'] = 'Ciklikus?';
	$lang['striscalled'] = 'Hivatkozott?';
	$lang['strsequenceneedsname'] = 'Meg kell adni a sorozatnevet.';
	$lang['strsequencecreated'] = 'A sorozat megteremtve.';
	$lang['strsequencecreatedbad'] = 'Nem sikerült megteremteni a sorozatot.'; 
	$lang['strconfdropsequence'] = 'Biztosan törölni kívánja „%s” sorozatot?';
	$lang['strsequencedropped'] = 'A sorozat törölve.';
	$lang['strsequencedroppedbad'] = 'Nem sikerült törölni a sorozatot.';
	$lang['strsequencereset'] = 'Sorozat nullázása.';
	$lang['strsequenceresetbad'] = 'Nem sikerült nullázni a sorozatot.'; 

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes']  =  'Indexek';
	$lang['strindexname'] = 'Indexnév';
	$lang['strshowallindexes'] = 'Minden index megjelenítése';
	$lang['strnoindex'] = 'Nincs index.';
	$lang['strnoindexes'] = 'Nincsenek indexek.';
	$lang['strcreateindex'] = 'Index létrehozása';
	$lang['strtabname'] = 'Táblanév';
	$lang['strcolumnname'] = 'Oszlopnév';
	$lang['strindexneedsname'] = 'Meg kell adni az index nevét.';
	$lang['strindexneedscols'] = 'Meg kell adni az oszlopok (érvényes) számát.';
	$lang['strindexcreated'] = 'Az index megteremtve';
	$lang['strindexcreatedbad'] = 'Nem sikerült megteremteni az indexet.';
	$lang['strconfdropindex'] = 'Biztosan törölni kívánja „%s” indexet?';
	$lang['strindexdropped'] = 'Az index törölve.';
	$lang['strindexdroppedbad'] = 'Nem sikerült törölni az indexet.';
	$lang['strkeyname'] = 'Kulcsnév';
	$lang['struniquekey'] = 'Egyedi kulcs';
	$lang['strprimarykey'] = 'Elsődleges kulcs';
 	$lang['strindextype'] = 'Indextípus';
	$lang['strtablecolumnlist'] = 'A tábla oszlopai';
	$lang['strindexcolumnlist'] = 'Az index oszlopai';
	$lang['strconfcluster'] = 'Biztosan fürtözni kívánja „%s”-t?';
	$lang['strclusteredgood'] = 'Fürtözés kész.';
	$lang['strclusteredbad'] = 'Fürtözés sikertelen.';

	// Rules
	$lang['strrules'] = 'Szabályok';
	$lang['strrule'] = 'Szabály';
	$lang['strshowallrules'] = 'Minden szabály megjelenítése';
	$lang['strnorule'] = 'Nincs szabály.';
	$lang['strnorules'] = 'Nincsenek szabályok.';
	$lang['strcreaterule'] = 'Szabály teremtése';
	$lang['strrulename'] = 'Szabálynév';
	$lang['strruleneedsname'] = 'Meg kell adni a szabálynevet.';
	$lang['strrulecreated'] = 'A szabály megteremtve.';
	$lang['strrulecreatedbad'] = 'Nem sikerült megteremteni a szabályt.';
	$lang['strconfdroprule'] = 'Biztosan törölni kívánja „%s” szabályt „%s” táblában?';
	$lang['strruledropped'] = 'A szabály törölve.';
	$lang['strruledroppedbad'] = 'Nem sikerült törölni a szabályt.';

	// Constraints
	$lang['strconstraint']  =  'Megszorítás';
	$lang['strconstraints'] = 'Megszorítások';
	$lang['strshowallconstraints'] = 'Minden megszorítás megjelenítése';
	$lang['strnoconstraints'] = 'Nincsenek megszorítások.';
	$lang['strcreateconstraint'] = 'Megszorítás teremtése';
	$lang['strconstraintcreated'] = 'A megszorítás megteremtve.';
	$lang['strconstraintcreatedbad'] = 'Nem sikerült megteremteni a megszorítást.';
	$lang['strconfdropconstraint'] = 'Biztosan törölni kívánja „%s” megszorítást „%s” táblában?';
	$lang['strconstraintdropped'] = 'A megszorítás törölve.';
	$lang['strconstraintdroppedbad'] = 'Nem sikerült törölni a megszorítást.';
	$lang['straddcheck'] = 'Ellenőrzés hozzáadása';
	$lang['strcheckneedsdefinition'] = 'Meg kell adni az ellenőrzés definícióját.';
	$lang['strcheckadded'] = 'Az ellenőrzés hozzáadva.';
	$lang['strcheckaddedbad'] = 'Nem sikerült hozzáadni az ellenőrzést.';
	$lang['straddpk'] = 'Elsődleges kulcs hozzáadása';
	$lang['strpkneedscols'] = 'Legalább egy oszlopot meg kell adni elsődleges kulcsnak.';
	$lang['strpkadded'] = 'Elsődleges kulcs hozzáadva.';
	$lang['strpkaddedbad'] = 'Nem sikerült hozzáadni az elsődleges kulcsot.';
	$lang['stradduniq'] = 'egyedi kulcs hozzáadása';
	$lang['struniqneedscols'] = 'Legalább egy oszlopot meg kell adni egyedi kulcsnak.';
	$lang['struniqadded'] = 'Az egyedi kulcs hozzáadva.';
	$lang['struniqaddedbad'] = 'Nem sikerült hozzáadni az egyedi kulcsot.';
	$lang['straddfk'] = 'Külső kulcs hozzáadása';
	$lang['strfkneedscols'] = 'Legalább egy oszlopot meg kell adni külső kulcsnak.';
	$lang['strfkneedstarget'] = 'Meg kell adni a céltáblát a külső kulcsnak.';
	$lang['strfkadded'] = 'A külső kulcs hozzáadva.';
	$lang['strfkaddedbad'] = 'Nem sikerült hozzáadni a külső kulcsot.';
	$lang['strfktarget'] = 'Céltábla';
	$lang['strfkcolumnlist'] = 'Kulcsoszlopok';
	$lang['strondelete'] = 'TÖRLÉSKOR';
	$lang['stronupdate'] = 'IDŐSZERŰSÍTÉSKOR';

	// Functions
	$lang['strfunction'] = 'Függvény';
	$lang['strfunctions'] = 'Függvények';
	$lang['strshowallfunctions'] = 'Minden függvény megjelenítése';
	$lang['strnofunction'] = 'Nincs függvény.';
	$lang['strnofunctions'] = 'Nincsenek függvények.';
	$lang['strcreateplfunction']  =  'SQL/PL függvény teremtése';
	$lang['strcreateinternalfunction']  =  'Belső függvény teremtése';
	$lang['strcreatecfunction']  =  'C függvény teremtése';
	$lang['strfunctionname'] = 'Függvénynév';
	$lang['strreturns'] = 'Visszarérési érték';
	$lang['strarguments'] = 'Argumentumok';
	$lang['strproglanguage'] = 'Programozási nyelv';
	$lang['strfunctionneedsname'] = 'Meg kell adni a függvény nevét.';
	$lang['strfunctionneedsdef'] = 'Meg kell adni a függvény definícióját.';
	$lang['strfunctioncreated'] = 'A függvény megteremtve.';
	$lang['strfunctioncreatedbad'] = 'Nem sikerült megteremteni a függvényt.';
	$lang['strconfdropfunction'] = 'Biztosan törölni kívánja „%s” függvényt?';
	$lang['strfunctiondropped'] = 'A függvény törölve.';
	$lang['strfunctiondroppedbad'] = 'Nem sikerült törölni a függvényt.';
	$lang['strfunctionupdated'] = 'A függvény időszerűsítve.';
	$lang['strfunctionupdatedbad'] = 'Nem sikerült a függvényt időszerűsíteni.';
	$lang['strobjectfile']  =  'Object fájl';
	$lang['strlinksymbol']  =  'Szerkesztési szimbólum';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggerek';
	$lang['strshowalltriggers'] = 'Minden trigger megjelenítése';
	$lang['strnotrigger'] = 'Nincs trigger.';
	$lang['strnotriggers'] = 'Nincsenek triggerek.';
	$lang['strcreatetrigger'] = 'Trigger teremtése';
	$lang['strtriggerneedsname'] = 'Meg kell adni a trigger nevét.';
	$lang['strtriggerneedsfunc'] = 'Meg kell adni egy függvény nevét a triggerhez.';
	$lang['strtriggercreated'] = 'A trigger megteremtve.';
	$lang['strtriggercreatedbad'] = 'Nem sikerült megteremteni a triggert.';
	$lang['strconfdroptrigger'] = 'Biztosan törölni kívánja „%s” triggert „%s” táblában?';
	$lang['strtriggerdropped'] = 'A trigger törölve.';
	$lang['strtriggerdroppedbad'] = 'Nem sikerült törölni a triggert.';
	$lang['strtriggeraltered'] = 'A trigger megváltoztatva.';
	$lang['strtriggeralteredbad'] = 'Nem sikerült megváltoztatni a triggert.';
	$lang['strforeach']  =  'Mindegyik';

	// Types
	$lang['strtype'] = 'Típus';
	$lang['strtypes'] = 'Típusok';
	$lang['strshowalltypes'] = 'Minden típus megjelenítése';
	$lang['strnotype'] = 'Nincs típus.';
	$lang['strnotypes'] = 'Nincsenek típusok.';
	$lang['strcreatetype'] = 'Típus teremtése';
	$lang['strcreatecomptype']  =  'Összetett típus teremtése';
	$lang['strtypeneedsfield']  =  'Legalább egy oszlopot meg kell adnia.';
	$lang['strtypeneedscols']  =  'Érvényes oszlopszámot kell megadnia.';	
	$lang['strtypename'] = 'Típusnév';
	$lang['strinputfn'] = 'Beviteli függvény';
	$lang['stroutputfn'] = 'Kiviteli függvény';
	$lang['strpassbyval'] = 'Érték szerinti átadás?';
	$lang['stralignment'] = 'Igazítás';
	$lang['strelement'] = 'Elem';
	$lang['strdelimiter'] = 'Határoló';
	$lang['strstorage'] = 'Tár';
	$lang['strfield']  =  'Oszlop';
	$lang['strnumfields']  =  'Oszlopok száma';
	$lang['strtypeneedsname'] = 'Meg kell adni a típusnevet.';
	$lang['strtypeneedslen'] = 'Meg kell adni a típus hosszát.';
	$lang['strtypecreated'] = 'A típus megteremtve';
	$lang['strtypecreatedbad'] = 'Nem sikerült megteremteni a típust.';
	$lang['strconfdroptype'] = 'Biztosan törölni kívánja „%s” típust?';
	$lang['strtypedropped'] = 'A típus törölve.';
	$lang['strtypedroppedbad'] = 'Nem sikerült törölni a típust.';
	$lang['strflavor']  =  'Fajta';
	$lang['strbasetype']  =  'Alap';
	$lang['strcompositetype']  =  'Összetett';
	$lang['strpseudotype']  =  'Ál';

	// Schemas
	$lang['strschema'] = 'Séma';
	$lang['strschemas'] = 'Sémák';
	$lang['strshowallschemas'] = 'Minden séma megjelenítése';
	$lang['strnoschema'] = 'Nincs séma.';
	$lang['strnoschemas'] = 'Nincsenek sémák.';
	$lang['strcreateschema'] = 'Séma teremtése';
	$lang['strschemaname'] = 'Sémanév';
	$lang['strschemaneedsname'] = 'Meg kell adni a sémanevet.';
	$lang['strschemacreated'] = 'A séma megteremtve';
	$lang['strschemacreatedbad'] = 'Nem sikerült a sémát megteremteni.';
	$lang['strconfdropschema'] = 'Biztosan törölni kívánja „%s” sémát?';
	$lang['strschemadropped'] = 'A séma törölve.';
	$lang['strschemadroppedbad'] = 'Nem sikerült a sémát törölni.';
	$lang['strschemaaltered'] = 'Séma megváltoztatva.';
	$lang['strschemaalteredbad'] = 'Séma magváltoztatása sikertelen.';
	$lang['strsearchpath']  =  'Séma keresési útvonala';

	// Reports
	$lang['strreport'] = 'Jelentés';
	$lang['strreports'] = 'Jelentések';
	$lang['strshowallreports'] = 'Minden jelentés megjelenítése';
	$lang['strnoreports'] = 'Nincsenek jelentések.';
	$lang['strcreatereport'] = 'Jelentés teremtése';
	$lang['strreportdropped'] = 'A jelentés törölve.';
	$lang['strreportdroppedbad'] = 'Nem sikerült törölni a jelentést.';
	$lang['strconfdropreport'] = 'Biztosan törölni kívánja „%s” jelentést?';
	$lang['strreportneedsname'] = 'Meg kell adni a jelentésnevet.';
	$lang['strreportneedsdef'] = 'SQL kifejezést kell hozzáadni a jelentéshez.';
	$lang['strreportcreated'] = 'A jelentés megteremtve.';
	$lang['strreportcreatedbad'] = 'Nem sikerült megteremteni a jelentést.';

	// Domains
	$lang['strdomain'] = 'Tartomány';
	$lang['strdomains'] = 'Tartományok';
	$lang['strshowalldomains'] = 'Minden tartomány megjelenítése';
	$lang['strnodomains'] = 'Nincsnek tartományok.';
	$lang['strcreatedomain'] = 'Tartomány teremtése';
	$lang['strdomaindropped'] = 'A tartomány törölve.';
	$lang['strdomaindroppedbad'] = 'Nem sikerült törölni a tartományt.';
	$lang['strconfdropdomain'] = 'Biztosan törölni kívánja „%s” tartományt?';
	$lang['strdomainneedsname'] = 'Meg kell adni a tartománynevet.';
	$lang['strdomaincreated'] = 'A tartomány megteremtve.';
	$lang['strdomaincreatedbad'] = 'Nem sikerült megteremteni a tartományt.';	
	$lang['strdomainaltered'] = 'A tartomány megváltoztatva.';
	$lang['strdomainalteredbad'] = 'Nem sikerült megváltoztatni a tartományt.';	

	// Operators
	$lang['stroperator'] = 'Operátor';
	$lang['stroperators'] = 'Operátorok';
	$lang['strshowalloperators'] = 'Minden operátor megjelenítése';
	$lang['strnooperator'] = 'Nincs operátor.';
	$lang['strnooperators'] = 'Nincsenek operátorok.';
	$lang['strcreateoperator'] = 'Operátor teremtése';
	$lang['strleftarg'] = 'Bal arg típus';
	$lang['strrightarg'] = 'Jobb arg típus';
	$lang['strcommutator'] = 'Kommutátor';
	$lang['strnegator'] = 'Tagadó';
	$lang['strrestrict'] = 'Megszorítás';
	$lang['strjoin'] = 'Összekapcsolás';
	$lang['strhashes'] = 'Hasít';
	$lang['strmerges'] = 'Összefésül';
	$lang['strleftsort'] = 'Balrendezés';
	$lang['strrightsort'] = 'Jobbrendezés';
	$lang['strlessthan'] = 'Kisebb mint';
	$lang['strgreaterthan'] = 'Nagyobb mint';
	$lang['stroperatorneedsname'] = 'Meg kell adni az operátornevet.';
	$lang['stroperatorcreated'] = 'Az operátor megteremtve';
	$lang['stroperatorcreatedbad'] = 'Nem sikerült megteremteni az operátort.';
	$lang['strconfdropoperator'] = 'Biztosan törölni kívánja „%s” operátort?';
	$lang['stroperatordropped'] = 'Az operátor törölve.';
	$lang['stroperatordroppedbad'] = 'Nem sikerült törölni az operátort.';

	// Casts
	$lang['strcasts'] = 'Kasztok';
	$lang['strnocasts'] = 'Nincsenek kasztok.';
	$lang['strsourcetype'] = 'Forrástípus';
	$lang['strtargettype'] = 'Céltípus';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'Értékadásban';
	$lang['strbinarycompat'] = '(Binárisan kompatibilis)';
	
	// Conversions
	$lang['strconversions'] = 'Átalakítások';
	$lang['strnoconversions'] = 'Nincsenek átalakítások.';
	$lang['strsourceencoding'] = 'Forráskódolás';
	$lang['strtargetencoding'] = 'Célkódolás';
	
	// Languages
	$lang['strlanguages'] = 'Nyelvek';
	$lang['strnolanguages'] = 'Nincsenek nyelvek.';
	$lang['strtrusted'] = 'Hiteles';
	
	// Info
	$lang['strnoinfo'] = 'Nincs elérhető információ.';
	$lang['strreferringtables'] = 'Kapcsolódó táblák';
	$lang['strparenttables'] = 'Szülőtáblák';
	$lang['strchildtables'] = 'Gyerektáblák';

	// Aggregates
	$lang['straggregates'] = 'Aggregációk';
	$lang['strnoaggregates'] = 'Nincsenek aggregátumok.';
	$lang['stralltypes'] = '(Minden típus)';

	// Operator Classes
	$lang['stropclasses'] = 'Operátor-osztályok';
	$lang['strnoopclasses'] = 'Nincsenek operátor-osztályok.';
	$lang['straccessmethod'] = 'Hozzáférési eljárás';

	// Stats and performance
	$lang['strrowperf'] = 'Sorteljesítmény';
	$lang['strioperf'] = 'I/O-teljesítmény';
	$lang['stridxrowperf'] = 'Indexsor-teljesítmény';
	$lang['stridxioperf'] = 'Index-I/O-teljesítmény';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Szekvenciális';
	$lang['strscan'] = 'Keresés';
	$lang['strread'] = 'Olvasás';
	$lang['strfetch'] = 'Lehívás';
	$lang['strheap'] = 'Kupac';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Gyorstár';
	$lang['strdisk'] = 'Lemez';
	$lang['strrows2'] = 'Sorok';

	// Tablespaces
	$lang['strtablespace']  =  'Táblahely';
	$lang['strtablespaces']  =  'Táblahelyek';
	$lang['strshowalltablespaces']  =  'Minden táblahely megjelenítése';
	$lang['strnotablespaces']  =  'Nincsenek táblahelyek.';
	$lang['strcreatetablespace']  =  'Táblahely teremtése';
	$lang['strlocation']  =  'Hely';
	$lang['strtablespaceneedsname']  =  'Nevet kell adnia a táblahelynek.';
	$lang['strtablespaceneedsloc']  =  'Meg kell adnia egy mappát, ahol a táblahelyet teremti.';
	$lang['strtablespacecreated']  =  'Táblahely teremtve.';
	$lang['strtablespacecreatedbad']  =  'Táblahely teremtése sikertelen.';
	$lang['strconfdroptablespace']  =  'Biztosan ki akarja dobni „%s” táblahelyet?';
	$lang['strtablespacedropped']  =  'Táblahely kidobva.';
	$lang['strtablespacedroppedbad']  =  'Táblahely kidobása sikertelen.';
	$lang['strtablespacealtered']  =  'Táblahely megváltoztatva.';
	$lang['strtablespacealteredbad']  =  'Táblahely megváltoztatása sikertelen.';

	// Slony clusters
	$lang['strcluster']  =  'Fürt';
	$lang['strnoclusters']  =  'Nincs fürt.';
	$lang['strconfdropcluster']  =  'Biztosan el akarja dobni "%s" fürtöt?';
	$lang['strclusterdropped']  =  'Fürt eldobva.';
	$lang['strclusterdroppedbad']  =  'Fürt eldobása sikertelen.';
	$lang['strinitcluster']  =  'Fürt inicializálása';
	$lang['strclustercreated']  =  'Fürt inicializálva.';
	$lang['strclustercreatedbad']  =  'Fürt inicializálása sikertelen.';
	$lang['strclusterneedsname']  =  'Nevet kell adnia a fürtnek.';
	$lang['strclusterneedsnodeid']  =  'Azonosítót kell adnia a helyi csomópontnak.';
	
	// Slony nodes
	$lang['strnodes']  =  'Csomópontok';
	$lang['strnonodes']  =  'Nincs csomópont.';
	$lang['strcreatenode']  =  'Csomópont teremtése';
	$lang['strid']  =  'Az';
	$lang['stractive']  =  'Aktív';
	$lang['strnodecreated']  =  'Csomópont megteremtve.';
	$lang['strnodecreatedbad']  =  'Csomópont teremtése sikertelen.';
	$lang['strconfdropnode']  =  'Biztosan el akarja dobni "%s" csomópontot?';
	$lang['strnodedropped']  =  'Csomópont eldobva.';
	$lang['strnodedroppedbad']  =  'Csomópont eldobása sikertelen';
	$lang['strfailover']  =  'Hibaugrás';
	$lang['strnodefailedover']  =  'Végponti hiba átugorva.';
	$lang['strnodefailedoverbad']  =  'Végponti hiba átugrása sikertelen.';
	
	// Slony paths	
	$lang['strpaths']  =  'Elérési utak';
	$lang['strnopaths']  =  'Nincs elérési út.';
	$lang['strcreatepath']  =  'Út teremtése';
	$lang['strnodename']  =  'Csomópont neve';
	$lang['strnodeid']  =  'Csomópont-azonosító';
	$lang['strconninfo']  =  'Kapcsolati szöveg';
	$lang['strconnretry']  =  'Másodpercek kapcsolódás újrapróbálásáig';
	$lang['strpathneedsconninfo']  =  'Meg kell adnia a kapcsolati szöveget az elérési úthoz.';
	$lang['strpathneedsconnretry']  =  'Meg kell adnia a kapcsolódás újrapróbálásáig történő várakozás idejét másodpercekben.';
	$lang['strpathcreated']  =  'Út megteremtve.';
	$lang['strpathcreatedbad']  =  'Út teremtése sikertelen.';
	$lang['strconfdroppath']  =  'Biztosan el akarja dobni "%s" utat?';
	$lang['strpathdropped']  =  'Út eldobva.';
	$lang['strpathdroppedbad']  =  'Út eldobása sikertelen.';

	// Slony listens
	$lang['strlistens']  =  'Figyelők';
	$lang['strnolistens']  =  'Nincs figyelő.';
	$lang['strcreatelisten']  =  'Figyelő teremtése';
	$lang['strlistencreated']  =  'Figyelő megteremtve.';
	$lang['strlistencreatedbad']  =  'Fegyelő teremtése sikertelen.';
	$lang['strconfdroplisten']  =  'Biztosan törölni akarja „%s” figyelőt?';
	$lang['strlistendropped']  =  'Figyelő törölve.';
	$lang['strlistendroppedbad']  =  'Figyelő törlése sikertelen.';

	// Slony replication sets
	$lang['strrepsets']  =  'Másodlatok';
	$lang['strnorepsets']  =  'Nincs másodlat.';
	$lang['strcreaterepset']  =  'Másodlat teremtése';
	$lang['strrepsetcreated']  =  'Másodlat megteremtve.';
	$lang['strrepsetcreatedbad']  =  'Másodlat teremtése sikertelen.';
	$lang['strconfdroprepset']  =  'Biztosan törölni akarja „%s” másodlatot?';
	$lang['strrepsetdropped']  =  'Másodlat törölve.';
	$lang['strrepsetdroppedbad']  =  'Másodlat törlése sikertelen.';
	$lang['strmerge']  =  'Összefésülés';
	$lang['strmergeinto']  =  'Összefésülés ide';
	$lang['strrepsetmerged']  =  'Másodlatok összefésülve.';
	$lang['strrepsetmergedbad']  =  'Másodlatok összefésülése sikertelen.';
	$lang['strmove']  =  'Mozgatás';
	$lang['strneworigin']  =  'Új eredet';
	$lang['strrepsetmoved']  =  'Másodlat mozgatva.';
	$lang['strrepsetmovedbad']  =  'Másodlat mozgatása sikertelen.';
	$lang['strnewrepset']  =  'Új másodlat';
	$lang['strlock']  =  'Zárolás';
	$lang['strlocked']  =  'Zárolva';
	$lang['strunlock']  =  'Kioldás';
	$lang['strconflockrepset']  =  'Biztosan zárolni akarja „%s” másodlatot?';
	$lang['strrepsetlocked']  =  'Másodlat zárolva.';
	$lang['strrepsetlockedbad']  =  'Másodlat zárolása sikertelen.';
	$lang['strconfunlockrepset']  =  'Biztosan ki akarja oldani „%s” másodlatot?';
	$lang['strrepsetunlocked']  =  'Másodlat kioldva.';
	$lang['strrepsetunlockedbad']  =  'Másodlat kioldása sikertelen.';
	$lang['strexecute']  =  'Végrehajtás';
	$lang['stronlyonnode']  =  'Csak helyben';
	$lang['strddlscript']  =  'DDL-írás';
	$lang['strscriptneedsbody']  =  'Meg kell adnia egy írást, amit minden helyen végrehajtanak.';
	$lang['strscriptexecuted']  =  'Másodlati DDL-írás végrehajtva.';
	$lang['strscriptexecutedbad']  =  'Másodlati DDL-írás végrehajtása sikertelen.';
	$lang['strtabletriggerstoretain']  =  'A következő triggereket Slony NEM tiltja le:';

	// Slony tables in replication sets
	$lang['straddtable']  =  'Tábla felvétele';
	$lang['strtableneedsuniquekey']  =  'Tábla felvételéhez elsődleges vagy egyedi kulcs kell.';
	$lang['strtableaddedtorepset']  =  'Tábla felvéve a másodlatba.';
	$lang['strtableaddedtorepsetbad']  =  'Tábla felvétele a másodlatba sikertelen.';
	$lang['strconfremovetablefromrepset']  =  'Biztosan törölni akarja „%s” táblát „%s” másodlatból?';
	$lang['strtableremovedfromrepset']  =  'Tábla törölve a másodlatból.';
	$lang['strtableremovedfromrepsetbad']  =  'Tábla törlése a másodlatból sikertelen.';

	// Slony sequences in replication sets
	$lang['straddsequence']  =  'Sorozat felvétele';
	$lang['strsequenceaddedtorepset']  =  'Sorozat felvéve a másodlatba.';
	$lang['strsequenceaddedtorepsetbad']  =  'Sorozat felvétele a másodlatba sikertelen.';
	$lang['strconfremovesequencefromrepset']  =  'Biztosan törölni akarja „%s” sorozatot „%s” másodlatból?';
	$lang['strsequenceremovedfromrepset']  =  'Sorozat törölve a másodlatból.';
	$lang['strsequenceremovedfromrepsetbad']  =  'Sorozat törlése a másodlatból sikertelen.';

	// Slony subscriptions
	$lang['strsubscriptions']  =  'Feliratkozások';
	$lang['strnosubscriptions']  =  'Nincs feliratkozás.';

	// Miscellaneous
	$lang['strtopbar'] = '%s fut %s:%s címen — Ön „%s” néven jelentkezett be. %s';
	$lang['strtimefmt'] = 'Y.m.d. H:i';
	$lang['strhelp'] = 'Súgó';
	$lang['strhelpicon']  =  '?';
	$lang['strlogintitle']  =  'Belépés ide: %s';
	$lang['strlogoutmsg']  =  'Kilépve innen: %s';
	$lang['strloading']  =  'Betöltés...';
	$lang['strerrorloading']  =  'Betöltési hiba';
	$lang['strclicktoreload']  =  'Kattintson az újratöltéshez';

?>
