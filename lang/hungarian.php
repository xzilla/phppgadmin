<?php

	/**
	 * Hungarian language file for phpPgAdmin.
	 * maintainer: Sulyok Péter <sp@elte.hu>
	 *
	 *
	 */

	// Language and character set
	$lang['applang'] = 'Magyar';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'hu_HU';
	$lang['appdbencoding'] = 'LATIN2';

	// Welcome  
	$lang['strintro'] = 'Üdvözli a phpPgAdmin!';
	$lang['strppahome'] = 'A phpPgAdmin honlapja';
	$lang['strpgsqlhome'] = 'A PostgreSQL honlapja';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'A PostgreSQL (helyi) dokumentációja';
	$lang['strreportbug'] = 'Hibajelentés feladása';
	$lang['strviewfaq'] = 'GYÍK megtekintése';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Bejelentkezés';
	$lang['strloginfailed'] = 'Sikertelen bejelentkezés';
	$lang['strlogindisallowed'] = 'Bejelentkezés nem engedélyezett';
	$lang['strserver'] = 'Kiszolgáló';
	$lang['strlogout'] = 'Kilépés';
	$lang['strowner'] = 'Tulajdonos';
	$lang['straction'] = 'Művelet';
	$lang['stractions'] = 'Műveletek';
	$lang['strname'] = 'Név';
	$lang['strdefinition'] = 'Definíció';
	$lang['straggregates'] = 'Aggregációk';
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
	$lang['strcreate'] = 'Létrehozás';
	$lang['strcreated'] = 'Létrehozva';
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
	$lang['strreferences'] = 'Referenciák';
	$lang['stryes'] = 'Igen';
	$lang['strno'] = 'Nem';
	$lang['strtrue'] = 'IGAZ';
	$lang['strfalse'] = 'HAMIS';
	$lang['stredit'] = 'Szerkesztés';
	$lang['strcolumns'] = 'Oszlopok';
	$lang['strrows'] = 'sor';
	$lang['strrowsaff'] = 'sor érintett.';
	$lang['strobjects'] = 'objektum';
	$lang['strexample'] = 'pl.';
	$lang['strback'] = 'Vissza';
	$lang['strqueryresults'] = 'Lekérdezés-eredmények';
	$lang['strshow'] = 'Megjelenítés';
	$lang['strempty'] = 'Ürítés';
	$lang['strlanguage'] = 'Nyelv';
	$lang['strencoding'] = 'Kódolás';
	$lang['strvalue'] = 'Érték';
	$lang['strunique'] = 'egyedi';
	$lang['strprimary'] = 'Elsődleges';
	$lang['strexport'] = 'Exportálás';
	$lang['strimport'] = 'Importálás';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Végrehajtás';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Takarítás';
	$lang['stranalyze'] = 'Elemzés';
	$lang['strcluster'] = 'Fürtözés';
	$lang['strclustered'] = 'Fürtözve?';
	$lang['strreindex'] = 'Újraindexelés';
	$lang['strrun'] = 'Futtatás';
	$lang['stradd'] = 'Hozzáadás';
	$lang['strevent'] = 'Esemény';
	$lang['strwhere'] = 'Hol';
	$lang['strinstead'] = 'Inkább';
	$lang['strwhen'] = 'Mikor';
	$lang['strformat'] = 'Formátum';
	$lang['strdata'] = 'Adatok';
	$lang['strconfirm'] = 'Megerősítés';
	$lang['strexpression'] = 'Kifejezés';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = 'Növelés';
	$lang['strcollapse'] = 'Csökkentés';
	$lang['strexplain'] = 'Magyarázat';
	$lang['strfind'] = 'Keresés';
	$lang['stroptions'] = 'Beállítások';
	$lang['strrefresh'] = 'Frissítés';
	$lang['strdownload'] = 'Letöltés';
	$lang['strinfo'] = 'Infó';
	$lang['stroids'] = 'OID-k';
	$lang['stradvanced'] = 'Haladó';

	// Error handling
	$lang['strnoframes'] = 'Ezen alkalmazás használatához kereteket támogató böngésző szükséges.';
	$lang['strbadconfig'] = 'A config.inc.php elavult. Újra kell generálni az új config.inc.php-dist fájlból.';
	$lang['strnotloaded'] = 'Az ön PHP rendszere nem támogatja a PostgreSQL-t.';
	$lang['strbadschema'] = 'A megadott séma érvénytelen.';
	$lang['strbadencoding'] = 'Az ügyfél-kódolás beállítása az adatbázisban nem sikerült.';
	$lang['strsqlerror'] = 'SQL hiba:';
	$lang['strinstatement'] = 'A következő kifejezésben:';
	$lang['strinvalidparam'] = 'Érvénytelen script-paraméterek.';
	$lang['strnodata'] = 'Nincs talált sor.';
	$lang['strnoobjects'] = 'Nincs talált objektum.';
	$lang['strrownotunique'] = 'Nincs egyedi azonosító ehhez a sorhoz.';

	// Tables
	$lang['strtable'] = 'Tábla';
	$lang['strtables'] = 'Táblák';
	$lang['strshowalltables'] = 'Minden tábla megjelenítése';
	$lang['strnotables'] = 'Nincsenek táblák.';
	$lang['strnotable'] = 'Nincs tábla.';
	$lang['strcreatetable'] = 'Tábla létrehozása';
	$lang['strtablename'] = 'Táblanév';
	$lang['strtableneedsname'] = 'Meg kell adni a táblanevet.';
	$lang['strtableneedsfield'] = 'Legalább egy mezőt meg kell adni.';
	$lang['strtableneedscols'] = 'A táblához érvényes számú sor kell.';
	$lang['strtablecreated'] = 'A tábla létrehozva.';
	$lang['strtablecreatedbad'] = 'Nem sikerült a táblát létrehozni.';
	$lang['strconfdroptable'] = 'Biztosan törölni kívánja „%s” táblát?';
	$lang['strtabledropped'] = 'A tábla törölve.';
	$lang['strtabledroppedbad'] = 'Nem sikerült a táblát törölni.';
	$lang['strconfemptytable'] = 'Biztosan ki kívánja üríteni „%s” táblát?';
	$lang['strtableemptied'] = 'A tábla kiürítve.';
	$lang['strtableemptiedbad'] = 'Nem sikerült a táblát kiüríteni.';
	$lang['strinsertrow'] = 'Sor beszúrása';
	$lang['strrowinserted'] = 'A sor beszúrva.';
	$lang['strrowinsertedbad'] = 'Nem sikerült a sort beszúrni.';
	$lang['streditrow'] = 'Sor szerkesztése';
	$lang['strrowupdated'] = 'A sor időszerűsítve.';
	$lang['strrowupdatedbad'] = 'Nem sikerült a sort időszerűsíteni.';
	$lang['strdeleterow'] = 'Sor törlése';
	$lang['strconfdeleterow'] = 'Biztosan törölni kívánja ezt a sort?';
	$lang['strrowdeleted'] = 'A sor törölve.';
	$lang['strrowdeletedbad'] = 'Nem sikerült a sort törölni.';
	$lang['strsaveandrepeat'] = 'Beszúrás & ismétlés';
	$lang['strfield'] = 'Mező';
	$lang['strfields'] = 'Mezők';
	$lang['strnumfields'] = 'Mezők száma';
	$lang['strfieldneedsname'] = 'A mezőt el kell nevezni';
	$lang['strselectallfields'] = 'Minden mező kijelölése';
	$lang['strselectneedscol'] = 'Ki kell választani egy oszlopot';
	$lang['strselectunary'] = 'Egyváltozós műveleteknek nem lehetnek értékei';
	$lang['straltercolumn'] = 'Oszlop változtatása';
	$lang['strcolumnaltered'] = 'Az oszlop megváltoztatva.';
	$lang['strcolumnalteredbad'] = 'Nem sikerült az oszlopot megváltoztatni.';
	$lang['strconfdropcolumn'] = 'Biztosan törölni kívánja „%s” oszlopot a(z) „%s” táblából?';
	$lang['strcolumndropped'] = 'Az oszlop törölve.';
	$lang['strcolumndroppedbad'] = 'Nem sikerült az oszlopot törölni.';
	$lang['straddcolumn'] = 'Oszlop hozzáadása';
	$lang['strcolumnadded'] = 'Az oszlop hozzáadva.';
	$lang['strcolumnaddedbad'] = 'Nem sikerült az oszlopot hozzáadni.';
	$lang['strcascade'] = 'KASZKÁD';
	$lang['strtablealtered'] = 'A tábla megváltoztatva.';
	$lang['strtablealteredbad'] = 'Nem sikerült a táblát megváltoztatni.';
	$lang['strdataonly'] = 'Csak adatok';
	$lang['strstructureonly'] = 'Csak struktúra';
	$lang['strstructureanddata'] = 'Struktúra és adatok';

	// Users
	$lang['struser'] = 'Felhasználó';
	$lang['strusers'] = 'Felhasználók';
	$lang['strusername'] = 'Felhasználónév';
	$lang['strpassword'] = 'Jelszó';
	$lang['strsuper'] = 'Adminisztrátor?';
	$lang['strcreatedb'] = 'Létrehozhat AB-t?';
	$lang['strexpires'] = 'Lejár';
	$lang['strnousers'] = 'Nincsenek felhasználók.';
	$lang['struserupdated'] = 'A felhasználó időszerűsítve.';
	$lang['struserupdatedbad'] = 'Nem sikerült a felhasználót időszerűsíteni.';
	$lang['strshowallusers'] = 'Minden felhasználó megjelenítése';
	$lang['strcreateuser'] = 'Felhasználó létrehozása';
	$lang['struserneedsname'] = 'A felhasználónak nevet kell adni.';
	$lang['strusercreated'] = 'A felhasználó létrehozva.';
	$lang['strusercreatedbad'] = 'Nem sikerült a felhasználót létrehozni.';
	$lang['strconfdropuser'] = 'Biztosan törölni kívánja „%s” felhasználót?';
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
	$lang['strcreategroup'] = 'Csoport létrehozása';
	$lang['strshowallgroups'] = 'Minden csoport megjelenítése';
	$lang['strgroupneedsname'] = 'A csoportnak nevet kell adni.';
	$lang['strgroupcreated'] = 'A csoport létrehozva.';
	$lang['strgroupcreatedbad'] = 'Nem sikerült a csoportot létrehozni.';	
	$lang['strconfdropgroup'] = 'Biztosan törölni kívánja „%s” csoportot?';
	$lang['strgroupdropped'] = 'A csoport törölve.';
	$lang['strgroupdroppedbad'] = 'Nem sikerült a csoportot törölni.';
	$lang['strmembers'] = 'Tagok';
	$lang['straddmember'] = 'Tag hozzáadása';
	$lang['strmemberadded'] = 'A tag hozzáadva.';
	$lang['strmemberaddedbad'] = 'Nem sikerült a tagot hozzáadni.';
	$lang['strdropmember'] = 'Tag törlése';
	$lang['strconfdropmember'] = 'Biztosan törölni kívánja „%s” tagot a(z) „%s” csoportból?';
	$lang['strmemberdropped'] = 'A tag törölve.';
	$lang['strmemberdroppedbad'] = 'Nem sikerült a tagot törölni.';

	// Privileges
	$lang['strprivilege'] = 'Jogosultság';
	$lang['strprivileges'] = 'Jogosultságok';
	$lang['strnoprivileges'] = 'Ez az objektum alap-jogosultságokkal rendelkezik.';
	$lang['strgrant'] = 'Feljogosítás';
	$lang['strrevoke'] = 'Jogosultság megvonása';
	$lang['strgranted'] = 'A jogosultságok megváltoztatva.';
	$lang['strgrantfailed'] = 'Nem sikerült a jogosultságokat megváltoztatni.';
	$lang['strgrantbad'] = 'Legalább egy felhasználót és jogosultságot ki kell választani.';
	$lang['stralterprivs'] = 'Jogosultságok megváltoztatása';
	$lang['strgrantor'] = 'Jogosító';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Adatbázis';
	$lang['strdatabases'] = 'Adatbázisok';
	$lang['strshowalldatabases'] = 'Minden adatbázis megjelenítése';
	$lang['strnodatabase'] = 'Nincs adatbázis.';
	$lang['strnodatabases'] = 'Nincsenek adatbázisok.';
	$lang['strcreatedatabase'] = 'Adatbázis létrehozása';
	$lang['strdatabasename'] = 'Adatbázisnév';
	$lang['strdatabaseneedsname'] = 'Meg kell adni az adatbázisnevet.';
	$lang['strdatabasecreated'] = 'Az adatbázis létrehozva.';
	$lang['strdatabasecreatedbad'] = 'Nem sikerült létrehozni az adatbázist.';
	$lang['strconfdropdatabase'] = 'Biztosan törölni kívánja „%s” adatbázist?';
	$lang['strdatabasedropped'] = 'Az adatbázis törölve.';
	$lang['strdatabasedroppedbad'] = 'Nem sikerült törölni az adatbázist.';
	$lang['strentersql'] = 'Írja be a végrehajtandó SQL-kifejezéseket ide:';
	$lang['strsqlexecuted'] = 'Az SQL-kifejezések végrehajtva.';
	$lang['strvacuumgood'] = 'A takarítás kész.';
	$lang['strvacuumbad'] = 'Nem sikerült kitakarítani.';
	$lang['stranalyzegood'] = 'Az elemzés kész.';
	$lang['stranalyzebad'] = 'Nem sikerült kielemezni.';

	// Views
	$lang['strview'] = 'Nézet';
	$lang['strviews'] = 'Nézetek';
	$lang['strshowallviews'] = 'Minden nézet megjelenítése';
	$lang['strnoview'] = 'Nincs nézet.';
	$lang['strnoviews'] = 'Nincsenek nézetek.';
	$lang['strcreateview'] = 'Nézet létrehozása';
	$lang['strviewname'] = 'Nézetnév';
	$lang['strviewneedsname'] = 'Meg kell adni a nézetnevet.';
	$lang['strviewneedsdef'] = 'Meg kell adni a nézet definícióját.';
	$lang['strviewcreated'] = 'A nézet létrehozva.';
	$lang['strviewcreatedbad'] = 'Nem sikerült a létrehozni a nézetet.';
	$lang['strconfdropview'] = 'Biztosan törölni kívánja „%s” nézetet?';
	$lang['strviewdropped'] = 'A nézet törölve.';
	$lang['strviewdroppedbad'] = 'Nem sikerült törölni a nézetet.';
	$lang['strviewupdated'] = 'A nézet időszerűsítve.';
	$lang['strviewupdatedbad'] = 'Nem sikerült időszerűsíteni a nézetet.';

	// Sequences
	$lang['strsequence'] = 'Sorozat';
	$lang['strsequences'] = 'Sorozatok';
	$lang['strshowallsequences'] = 'Minden sorozat megjelenítése';
	$lang['strnosequence'] = 'Nincs sorozat.';
	$lang['strnosequences'] = 'Nincsenek sorozatok.';
	$lang['strcreatesequence'] = 'Sorozat létrehozása';
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
	$lang['strsequencecreated'] = 'A sorozat létrehozva.';
	$lang['strsequencecreatedbad'] = 'Nem sikerült létrehozni a sorozatot.'; 
	$lang['strconfdropsequence'] = 'Biztosan törölni kívánja „%s” sorozatot?';
	$lang['strsequencedropped'] = 'A sorozat törölve.';
	$lang['strsequencedroppedbad'] = 'Nem sikerült törölni a sorozatot.';
	$lang['strsequencereset'] = 'Sorozat nullázása.';
	$lang['strsequenceresetbad'] = 'Nem sikerült nullázni a sorozatot.'; 

	// Indexes
	$lang['strindexes'] = 'Indexek';
	$lang['strindexname'] = 'Indexnév';
	$lang['strshowallindexes'] = 'Minden index megjelenítése';
	$lang['strnoindex'] = 'Nincs index.';
	$lang['strnoindexes'] = 'Nincsenek indexek.';
	$lang['strcreateindex'] = 'Index létrehozása';
	$lang['strtabname'] = 'Táblanév';
	$lang['strcolumnname'] = 'Oszlopnév';
	$lang['strindexneedsname'] = 'Meg kell adni az indexnevet.';
	$lang['strindexneedscols'] = 'Meg kell adni az (érvényes) oszlopszámot.';
	$lang['strindexcreated'] = 'Az index létrehozva';
	$lang['strindexcreatedbad'] = 'Nem sikerült létrehozni az indexet.';
	$lang['strconfdropindex'] = 'Biztosan törölni kívánja „%s” indexet?';
	$lang['strindexdropped'] = 'Az index törölve.';
	$lang['strindexdroppedbad'] = 'Nem sikerült törölni az indexet.';
	$lang['strkeyname'] = 'Kulcsnév';
	$lang['struniquekey'] = 'Egyedi kulcs';
	$lang['strprimarykey'] = 'Szuperkulcs';
 	$lang['strindextype'] = 'Indextípus';
	$lang['strtablecolumnlist'] = 'A tábla oszlopai';
	$lang['strindexcolumnlist'] = 'Az index oszlopai';
	$lang['strconfcluster'] = 'Biztosan fürtözni kívánja „%s”-t?';
	$lang['strclusteredgood'] = 'Fürt kész.';
	$lang['strclusteredbad'] = 'Fürt nem sikerült.';

	// Rules
	$lang['strrules'] = 'Szabályok';
	$lang['strrule'] = 'Szabály';
	$lang['strshowallrules'] = 'Minden szabály megjelenítése';
	$lang['strnorule'] = 'Nincs szabály.';
	$lang['strnorules'] = 'Nincsenek szabályok.';
	$lang['strcreaterule'] = 'Szabály létrehozása';
	$lang['strrulename'] = 'Szabálynév';
	$lang['strruleneedsname'] = 'Meg kell adni a szabálynevet.';
	$lang['strrulecreated'] = 'A szabály létrehozva.';
	$lang['strrulecreatedbad'] = 'Nem sikerült létrehozni a szabályt.';
	$lang['strconfdroprule'] = 'Biztosan törölni kívánja „%s” szabályt a(z) „%s” táblán?';
	$lang['strruledropped'] = 'A szabály törölve.';
	$lang['strruledroppedbad'] = 'Nem sikerült törölni a szabályt.';

	// Constraints
	$lang['strconstraints'] = 'Megszorítások';
	$lang['strshowallconstraints'] = 'Minden megszorítás megjelenítése';
	$lang['strnoconstraints'] = 'Nincsenek megszorítások.';
	$lang['strcreateconstraint'] = 'Megszorítás létrehozása';
	$lang['strconstraintcreated'] = 'A megszorítás létrehozva.';
	$lang['strconstraintcreatedbad'] = 'Nem sikerült létrehozni a megszorítást.';
	$lang['strconfdropconstraint'] = 'Biztosan törölni kívánja „%s” megszorítást a(z) „%s” táblán?';
	$lang['strconstraintdropped'] = 'A megszorítás törölve.';
	$lang['strconstraintdroppedbad'] = 'Nem sikerült törölni a megszorítást.';
	$lang['straddcheck'] = 'Ellenőrzés hozzáadása';
	$lang['strcheckneedsdefinition'] = 'Meg kell adni az ellenőrzés definícióját.';
	$lang['strcheckadded'] = 'Az ellenőrzés hozzáadva.';
	$lang['strcheckaddedbad'] = 'Nem sikerült hozzáadni az ellenőrzést.';
	$lang['straddpk'] = 'Szuperkulcs hozzáadása';
	$lang['strpkneedscols'] = 'Legalább egy oszlopot meg kell adni szuperkulcsnak.';
	$lang['strpkadded'] = 'Szuperkulcs hozzáadva.';
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
	$lang['strcreatefunction'] = 'Függvény létrehozása';
	$lang['strfunctionname'] = 'Függvénynév';
	$lang['strreturns'] = 'Visszarérési érték';
	$lang['strarguments'] = 'Argumentumok';
	$lang['strproglanguage'] = 'Programozási nyelv';
	$lang['strfunctionneedsname'] = 'Meg kell adni a függvény nevét.';
	$lang['strfunctionneedsdef'] = 'Meg kell adni a függvény definícióját.';
	$lang['strfunctioncreated'] = 'A függvény létrehozva.';
	$lang['strfunctioncreatedbad'] = 'Nem sikerült létrehozni a függvényt.';
	$lang['strconfdropfunction'] = 'Biztosan törölni kívánja „%s” függvényt?';
	$lang['strfunctiondropped'] = 'A függvény törölve.';
	$lang['strfunctiondroppedbad'] = 'Nem sikerült törölni a függvényt.';
	$lang['strfunctionupdated'] = 'A függvény időszerűsítve.';
	$lang['strfunctionupdatedbad'] = 'Nem sikerült a függvényt időszerűsíteni.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggerek';
	$lang['strshowalltriggers'] = 'Minden trigger megjelenítése';
	$lang['strnotrigger'] = 'Nincs trigger.';
	$lang['strnotriggers'] = 'Nincsenek triggerek.';
	$lang['strcreatetrigger'] = 'Trigger létrehozása';
	$lang['strtriggerneedsname'] = 'Meg kell adni a triggernevet.';
	$lang['strtriggerneedsfunc'] = 'Meg kell adni egy függvénynevet a triggerhez.';
	$lang['strtriggercreated'] = 'A trigger létrehozva.';
	$lang['strtriggercreatedbad'] = 'Nem sikerült létrehozni a triggert.';
	$lang['strconfdroptrigger'] = 'Biztosan törölni kívánja „%s” triggert a(z) „%s” táblán?';
	$lang['strtriggerdropped'] = 'A trigger törölve.';
	$lang['strtriggerdroppedbad'] = 'Nem sikerült törölni a triggert.';
	$lang['strtriggeraltered'] = 'A trigger megváltoztatva.';
	$lang['strtriggeralteredbad'] = 'Nem sikerült megváltoztatni a triggert.';

	// Types
	$lang['strtype'] = 'Típus';
	$lang['strtypes'] = 'Típusok';
	$lang['strshowalltypes'] = 'Minden típus megjelenítése';
	$lang['strnotype'] = 'Nincs típus.';
	$lang['strnotypes'] = 'Nincsenek típusok.';
	$lang['strcreatetype'] = 'Típus létrehozása';
	$lang['strtypename'] = 'Típusnév';
	$lang['strinputfn'] = 'Beviteli függvény';
	$lang['stroutputfn'] = 'Kiviteli függvény';
	$lang['strpassbyval'] = 'Érték szerinti átadás?';
	$lang['stralignment'] = 'Igazítás';
	$lang['strelement'] = 'Elem';
	$lang['strdelimiter'] = 'Határoló';
	$lang['strstorage'] = 'Tár';
	$lang['strtypeneedsname'] = 'Meg kell adni a típusnevet.';
	$lang['strtypeneedslen'] = 'Meg kell adni a típus hosszát.';
	$lang['strtypecreated'] = 'A típus létrehozva';
	$lang['strtypecreatedbad'] = 'Nem sikerült létrehozni a típust.';
	$lang['strconfdroptype'] = 'Biztosan törölni kívánja "%s" típust?';
	$lang['strtypedropped'] = 'A típus törölve.';
	$lang['strtypedroppedbad'] = 'Nem sikerült törölni a típust.';

	// Schemas
	$lang['strschema'] = 'Séma';
	$lang['strschemas'] = 'Sémák';
	$lang['strshowallschemas'] = 'Minden séma megjelenítése';
	$lang['strnoschema'] = 'Nincs séma.';
	$lang['strnoschemas'] = 'Nincsenek sémák.';
	$lang['strcreateschema'] = 'Séma létrehozása';
	$lang['strschemaname'] = 'Sémanév';
	$lang['strschemaneedsname'] = 'Meg kell adni a sémanevet.';
	$lang['strschemacreated'] = 'A séma létrehozva';
	$lang['strschemacreatedbad'] = 'Nem sikerült a sémát létrehozni.';
	$lang['strconfdropschema'] = 'Biztosan törölni kívánja „%s” sémát?';
	$lang['strschemadropped'] = 'A séma törölve.';
	$lang['strschemadroppedbad'] = 'Nem sikerült a sémát törölni.';

	// Reports
	$lang['strreport'] = 'Jelentés';
	$lang['strreports'] = 'Jelentések';
	$lang['strshowallreports'] = 'Minden jelentés megjelenítése';
	$lang['strnoreports'] = 'Nincsenek jelentések.';
	$lang['strcreatereport'] = 'Jelentés létrehozása';
	$lang['strreportdropped'] = 'A jelentés törölve.';
	$lang['strreportdroppedbad'] = 'Nem sikerült törölni a jelentést.';
	$lang['strconfdropreport'] = 'Biztosan törölni kívánja „%s” jelentést?';
	$lang['strreportneedsname'] = 'Meg kell adni a jelentésnevet.';
	$lang['strreportneedsdef'] = 'SQL kifejezést kell hozzáadni a jelentéshez.';
	$lang['strreportcreated'] = 'A jelentés elmentve.';
	$lang['strreportcreatedbad'] = 'Nem sikerült elmenteni a jelentést.';

	// Domains
	$lang['strdomain'] = 'Tartomány';
	$lang['strdomains'] = 'Tartományok';
	$lang['strshowalldomains'] = 'Minden tartomány megjelenítése';
	$lang['strnodomains'] = 'Nincsnek tartományok.';
	$lang['strcreatedomain'] = 'Tartomány létrehozása';
	$lang['strdomaindropped'] = 'A tartomány törölve.';
	$lang['strdomaindroppedbad'] = 'Nem sikerült törölni a tartományt.';
	$lang['strconfdropdomain'] = 'Biztosan törölni kívánja „%s” tartományt?';
	$lang['strdomainneedsname'] = 'Meg kell adni a tartománynevet.';
	$lang['strdomaincreated'] = 'A tartomány létrehozva.';
	$lang['strdomaincreatedbad'] = 'Nem sikerült létrehozni a tartományt.';	
	$lang['strdomainaltered'] = 'A tartomány megváltoztatva.';
	$lang['strdomainalteredbad'] = 'Nem sikerült megváltoztatni a tartományt.';	

	// Operators
	$lang['stroperator'] = 'Operátor';
	$lang['stroperators'] = 'Operátorok';
	$lang['strshowalloperators'] = 'Minden operátor megjelenítése';
	$lang['strnooperator'] = 'Nincs operátor.';
	$lang['strnooperators'] = 'Nincsenek operátorok.';
	$lang['strcreateoperator'] = 'Operátor létrehozása';
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
	$lang['stroperatorcreated'] = 'Az operátor létrehozva';
	$lang['stroperatorcreatedbad'] = 'Nem sikerült létrehozni az operátort.';
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

	// Miscellaneous
	$lang['strtopbar'] = '%s fut %s:%s címen -- Ön „%s” néven jelentkezett be, %s';
	$lang['strtimefmt'] = 'Y.m.d. H:i';
	$lang['strhelp'] = 'Súgó';

?>
