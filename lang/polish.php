<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.44 2005/04/01 21:02:36 slubek Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Polski';
	$lang['appcharset'] = 'ISO-8859-2';
	$lang['applocale'] = 'pl_PL';
	$lang['appdbencoding'] = 'LATIN2';
	$lang['applangdir'] = 'ltr';
 
	// Welcome
	$lang['strintro'] = 'Witaj w phpPgAdmin.';
	$lang['strppahome'] = 'Strona domowa phpPgAdmin';
	$lang['strpgsqlhome'] = 'Strona domowa PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Dokumentacja PostgreSQL (lokalna)';
	$lang['strreportbug'] = 'Zg³o¶ raport o b³êdzie';
	$lang['strviewfaq'] = 'Przejrzyj FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Zaloguj';
	$lang['strloginfailed'] = 'Próba zalogowania nie powiod³a siê';
	$lang['strlogindisallowed'] = 'Logowanie niedozwolone';
	$lang['strserver'] = 'Serwer';
	$lang['strlogout'] = 'Wyloguj siê';
	$lang['strowner'] = 'W³a¶ciciel';
	$lang['straction'] = 'Akcja';	
	$lang['stractions'] = 'Akcje';	
	$lang['strname'] = 'Nazwa';
	$lang['strdefinition'] = 'Definicja';
	$lang['strproperties'] = 'W³a¶ciwo¶ci';
	$lang['strbrowse'] = 'Przegl±daj';
	$lang['strdrop'] = 'Usuñ';
	$lang['strdropped'] = 'Usuniêty';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Poprzedni';
	$lang['strnext'] = 'Nastêpny';
	$lang['strfirst'] = '<< Pierwszy';
	$lang['strlast'] = 'Ostatni >>';
	$lang['strfailed'] = 'Nieudany';
	$lang['strcreate'] = 'Utwórz';
	$lang['strcreated'] = 'Utworzony';
	$lang['strcomment'] = 'Komentarz';
	$lang['strlength'] = 'D³ugo¶æ';
	$lang['strdefault'] = 'Domy¶lny';
	$lang['stralter'] = 'Zmieñ';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Anuluj';
	$lang['strsave'] = 'Zapisz';
	$lang['strreset'] = 'Wyczy¶æ';
	$lang['strinsert'] = 'Wstaw';
	$lang['strselect'] = 'Wybierz';
	$lang['strdelete'] = 'Usuñ';
	$lang['strupdate'] = 'Zmieñ';
	$lang['strreferences'] = 'Odno¶niki';
	$lang['stryes'] = 'Tak';
	$lang['strno'] = 'Nie';
	$lang['strtrue'] = 'Prawda';
	$lang['strfalse'] = 'Fa³sz';
	$lang['stredit'] = 'Edycja';
	$lang['strcolumn']  =  'Kolumna';
	$lang['strcolumns'] = 'Kolumny';
	$lang['strrows'] = 'wiersz(y)';
	$lang['strrowsaff'] = 'wiersz(y) dotyczy.';
	$lang['strobjects'] = 'obiekty';
	$lang['strexample'] = 'np.';
	$lang['strback'] = 'Wstecz';
	$lang['strqueryresults'] = 'Wyniki zapytania';
	$lang['strshow'] = 'Poka¿';
 	$lang['strempty'] = 'Wyczy¶æ';
	$lang['strlanguage'] = 'Jêzyk';
	$lang['strencoding'] = 'Kodowanie';
	$lang['strvalue'] = 'Warto¶æ';
	$lang['strunique'] = 'Unikatowy';
	$lang['strprimary'] = 'G³ówny';
	$lang['strexport'] = 'Eksport';
	$lang['strimport'] = 'Import';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Wykonaj';
	$lang['stradmin'] = 'Administruj';
	$lang['strvacuum'] = 'Przeczy¶æ';
	$lang['stranalyze'] = 'Analizuj';
	$lang['strcluster'] = 'Klastruj';
	$lang['strclustered'] = 'Klastrowany?';
	$lang['strreindex'] = 'Przeindeksuj';
	$lang['strrun'] = 'Uruchom';
	$lang['stradd'] = 'Dodaj';
	$lang['strevent'] = 'Zdarzenie';
	$lang['strwhere'] = 'Gdzie';
	$lang['strinstead'] = 'Wykonaj zamiast';
	$lang['strwhen'] = 'Kiedy';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Dane';
	$lang['strconfirm'] = 'Potwierd¼';
	$lang['strexpression'] = 'Wyra¿enie';
	$lang['strellipsis'] = '...';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Rozwiñ';
	$lang['strcollapse'] = 'Zwiñ';
	$lang['strexplain'] = 'Explain';
	$lang['strexplainanalyze'] = 'Explain Analyze';
	$lang['strfind'] = 'Znajd¼';
	$lang['stroptions'] = 'Opcje';
	$lang['strrefresh'] = 'Od¶wie¿';
	$lang['strdownload'] = 'Pobierz';
	$lang['strdownloadgzipped'] = 'Pobierz skompresowane gzip-em';
	$lang['strinfo'] = 'Informacje';
	$lang['stroids'] = 'OIDy';
	$lang['stradvanced'] = 'Zaawansowane';
	$lang['strvariables'] = 'Zmienne';
	$lang['strprocess'] = 'Proces';
	$lang['strprocesses'] = 'Procesy';
	$lang['strsetting'] = 'Ustawienie';
	$lang['streditsql'] = 'Edycja zapytania SQL';
	$lang['strruntime']  =  'Ca³kowity czas pracy: %s ms.';
	$lang['strpaginate'] = 'Wy¶wietl wyniki stronami';
	$lang['struploadscript'] = 'lub za³aduj skrypt SQL:';
	$lang['strstarttime'] = 'Czas pocz±tku';
	$lang['strfile'] = 'Plik';
	$lang['strfileimported']  = 'Plik zosta³ zaimportowany.';

	// Error handling
	$lang['strnoframes'] = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$lang['strbadconfig'] = 'Twój plik config.inc.php jest przestarza³y. Musisz go utworzyæ ponownie wykorzystuj±c nowy config.inc.php-dist.';
	$lang['strnotloaded'] = 'Nie wkompilowa³e¶ do PHP obs³ugi tej bazy danych.';
	$lang['strpostgresqlversionnotsupported']  =  'Nieobs³ugiwana wersja PostgreSQL. Uaktualnij do wersji %s lub nowszej.';
	$lang['strbadschema'] = 'Podano b³êdny schemat.';
	$lang['strbadencoding'] = 'B³êdne kodowanie bazy.';
	$lang['strsqlerror'] = 'B³±d SQL:';
	$lang['strinstatement'] = 'W poleceniu:';
	$lang['strinvalidparam'] = 'B³êdny parametr.';
	$lang['strnodata'] = 'Nie znaleziono danych.';
	$lang['strnoobjects'] = 'Nie znaleziono obiektów.';
	$lang['strrownotunique'] = 'Brak unikatowego identyfikatora dla tego wiersza.';
	$lang['strnoreportsdb'] = 'Nie utworzy³e¶ bazy raportów. Instrukcjê znajdziesz w pliku INSTALL.';
	$lang['strnouploads']  =  '£adowanie plików wy³±czone.';
	$lang['strimporterror']  =  'B³±d importu.';
	$lang['strimporterrorline']  =  'B³±d importu w linii %s.';

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabele';
	$lang['strshowalltables'] = 'Poka¿ wszystkie tabele';
	$lang['strnotables'] = 'Nie znaleziono tabel.';
	$lang['strnotable']  =  'Nie znaleziono tabeli.';
	$lang['strcreatetable'] = 'Utwórz tabelê';
	$lang['strtablename'] = 'Nazwa tabeli';
	$lang['strtableneedsname'] = 'Musisz nazwaæ tabelê.';
	$lang['strtableneedsfield'] = 'Musisz podaæ przynajmniej jedno pole.';
	$lang['strtableneedscols'] = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$lang['strtablecreated'] = 'Tabela zosta³a utworzona.';
	$lang['strtablecreatedbad'] = 'Próba utworzenia tabeli siê nie powiod³a.';
	$lang['strconfdroptable'] = 'Czy na pewno chcesz usun±æ tabelê "%s"?';
	$lang['strtabledropped'] = 'Tabela zosta³a usuniêta.';
	$lang['strtabledroppedbad'] = 'Próba usuniêcia tabeli siê nie powiod³a.';
	$lang['strconfemptytable'] = 'Czy na pewno chcesz wyczy¶ciæ tabelê "%s"?';
	$lang['strtableemptied'] = 'Tabela zosta³a wyczyszczona.';
	$lang['strtableemptiedbad'] = 'Próba wyczyszczenia tabeli siê nie powiod³a.';
	$lang['strinsertrow'] = 'Wstaw wiersz';
	$lang['strrowinserted'] = 'Wiersz zosta³ wstawiony.';
	$lang['strrowinsertedbad'] = 'Próba wstawienia wiersza siê nie powiod³a.';
	$lang['strrowduplicate']  =  'Próba wstawienia zduplikowanego wiersza.';
	$lang['streditrow'] = 'Edycja wiersza';
	$lang['strrowupdated'] = 'Wiersz zosta³ zaktualizowany.';
	$lang['strrowupdatedbad'] = 'Próba aktualizacji wiersza siê nie powiod³a.';
	$lang['strdeleterow'] = 'Usuñ wiersz';
	$lang['strconfdeleterow'] = 'Czy na pewno chcesz usun±æ ten wiersz?';
	$lang['strrowdeleted'] = 'Wiersz zosta³ usuniêty.';
	$lang['strrowdeletedbad'] = 'Próba usuniêcia wiersza siê nie powiod³a.';
	$lang['strinsertandrepeat']  =  'Wstaw i powtórz';
	$lang['strnumcols']  =  'Ilo¶æ kolumn';
	$lang['strcolneedsname']  =  'Musisz podaæ nazwê kolumny';
	$lang['strselectallfields'] = 'Wybierz wszystkie pola';
	$lang['strselectneedscol'] = 'Musisz wybraæ przynajmniej jedn± kolumnê';
	$lang['strselectunary'] = 'Operatory bezargumentowe (IS NULL/IS NOT NULL) nie mog± mieæ podanej warto¶ci';
	$lang['straltercolumn'] = 'Zmieñ kolumnê';
	$lang['strcolumnaltered'] = 'Kolumna zosta³a zmodyfikowana.';
	$lang['strcolumnalteredbad'] = 'Próba modyfikacji kolumny siê nie powiod³a.';
	$lang['strconfdropcolumn'] = 'Czy na pewno chcesz usun±æ kolumnê "%s" z tabeli "%s"?';
	$lang['strcolumndropped'] = 'Kolumna zosta³a usuniêta.';
	$lang['strcolumndroppedbad'] = 'Próba usuniêcia kolumny siê nie powiod³a.';
	$lang['straddcolumn'] = 'Dodaj kolumnê';
	$lang['strcolumnadded'] = 'Kolumna zosta³a dodana.';
	$lang['strcolumnaddedbad'] = 'Próba dodania kolumny siê nie powiod³a.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabela zosta³a zmodyfikowana.';
	$lang['strtablealteredbad'] = 'Próba modyfikacji tabeli siê nie powiod³a.';
	$lang['strdataonly'] = 'Tylko dane';
	$lang['strstructureonly'] = 'Tylko struktura';
	$lang['strstructureanddata'] = 'Struktura i dane';
	$lang['strtabbed']  =  'Z tabulacjami';
	$lang['strauto']  =  'Automatyczny';
	$lang['strconfvacuumtable']  =  'Czy na pewno chcesz wykonaæ vacuum "%s"?';
	$lang['strestimatedrowcount']  =  'Przybli¿ona ilo¶æ wierszy';
			
	// Users
	$lang['struser'] = 'U¿ytkownik';
	$lang['strusers'] = 'U¿ytkownicy';
	$lang['strusername'] = 'Nazwa u¿ytkownika';
	$lang['strpassword'] = 'Has³o';
	$lang['strsuper'] = 'Administrator?';
	$lang['strcreatedb'] = 'Tworzenie BD?';
	$lang['strexpires'] = 'Wygasa';	
	$lang['strsessiondefaults'] = 'Warto¶ci domy¶lne sesji';
	$lang['strnousers'] = 'Nie znaleziono u¿ytkowników.';
	$lang['struserupdated'] = 'Parametry u¿ytkownika zosta³y zaktualizowane.';
	$lang['struserupdatedbad'] = 'Próba aktualizacji parametrów u¿ytkownika siê nie powiod³a.';
	$lang['strshowallusers'] = 'Poka¿ wszystkich u¿ytkowników';
	$lang['strcreateuser'] = 'Utwórz u¿ytkownika';
	$lang['struserneedsname'] = 'Musisz podaæ nazwê u¿ytkownika.';
	$lang['strusercreated'] = 'U¿ytkownik zosta³ utworzony.';
	$lang['strusercreatedbad'] = 'Próba utworzenia u¿ytkownika siê nie powiod³a.';
	$lang['strconfdropuser'] = 'Czy na pewno chcesz usun±æ u¿ytkownika "%s"?';
	$lang['struserdropped'] = 'U¿ytkownik zosta³ usuniêty.';
	$lang['struserdroppedbad'] = 'Próba usuniêcia u¿ytkownika siê nie powiod³a.';
	$lang['straccount'] = 'Konto';
	$lang['strchangepassword'] = 'Zmieñ has³o';
	$lang['strpasswordchanged'] = 'Has³o zosta³o zmienione.';
	$lang['strpasswordchangedbad'] = 'Próba zmiany has³a siê nie powiod³a.';
	$lang['strpasswordshort'] = 'Has³o jest za krótkie.';
	$lang['strpasswordconfirm'] = 'Has³o i potwierdzenie musz± byæ takie same.';
							
	// Groups
	$lang['strgroup'] = 'Grupa';
	$lang['strgroups'] = 'Grupy';
	$lang['strnogroup'] = 'Nie znaleziono grupy.';
	$lang['strnogroups'] = 'Nie znaleziono grup.';
	$lang['strcreategroup'] = 'Utwórz grupê';
	$lang['strshowallgroups'] = 'Poka¿ wszystkie grupy';
	$lang['strgroupneedsname'] = 'Musisz nazwaæ grupê.';
	$lang['strgroupcreated'] = 'Grupa zosta³a utworzona.';
	$lang['strgroupcreatedbad'] = 'Próba utworzenia grupy siê nie powiod³a.';
	$lang['strconfdropgroup'] = 'Czy na pewno chcesz utworzyæ grupê "%s"?';
	$lang['strgroupdropped'] = 'Grupa zosta³a usuniêta.';
	$lang['strgroupdroppedbad'] = 'Próba usuniêcia grupy siê nie powiod³a.';
	$lang['strmembers'] = 'Cz³onkowie';
	$lang['straddmember'] = 'Dodaj cz³onka grupy';
	$lang['strmemberadded'] = 'Cz³onek grupy zosta³ dodany.';
	$lang['strmemberaddedbad'] = 'Próba dodania cz³onka grupy siê nie powiod³a.';
	$lang['strdropmember'] = 'Usuñ cz³onka grupy';
	$lang['strconfdropmember'] = 'Czy na pewno chcesz usun±æ "%s" z grupy "%s"?';
	$lang['strmemberdropped'] = 'Cz³onek grupy zosta³ usuniêty.';
	$lang['strmemberdroppedbad']  =  'Próba usuniêcia cz³onka grupy siê nie powiod³a.';

	// Privileges
	$lang['strprivilege'] = 'Uprawnienie';
	$lang['strprivileges'] = 'Uprawnienia';
	$lang['strnoprivileges'] = 'Ten obiekt nie ma uprawnieñ.';
	$lang['strgrant'] = 'Nadaj';
	$lang['strrevoke'] = 'Zabierz';
	$lang['strgranted'] = 'Uprawnienia zosta³y nadane.';
	$lang['strgrantfailed'] = 'Próba nadania uprawnieñ siê nie powiod³a.';
	$lang['strgrantbad'] = 'Musisz podaæ u¿ytkownika lub grupê, a tak¿e uprawnienia, jakie chcesz nadaæ.';
	$lang['strgrantor'] = 'Kto nada³';
	$lang['strasterisk'] = '*';
				
	// Databases
	$lang['strdatabase'] = 'Baza danych';
	$lang['strdatabases'] = 'Bazy danych';
	$lang['strshowalldatabases'] = 'Poka¿ wszystkie bazy danych';
	$lang['strnodatabase'] = 'Nie znaleziono bazy danych.';
	$lang['strnodatabases'] = 'Nie znaleziono ¿adnej bazy danych.';
	$lang['strcreatedatabase'] = 'Utwórz bazê danych';
	$lang['strdatabasename'] = 'Nazwa bazy danych';
	$lang['strdatabaseneedsname'] = 'Musisz nazwaæ bazê danych.';
	$lang['strdatabasecreated'] = 'Baza danych zosta³a utworzona.';
	$lang['strdatabasecreatedbad'] = 'Próba utworzenia bazy danych siê nie powiod³a.';
	$lang['strconfdropdatabase'] = 'Czy na pewno chcesz usun±æ bazê danych "%s"?';
	$lang['strdatabasedropped'] = 'Baza danych zosta³a usuniêta.';
	$lang['strdatabasedroppedbad'] = 'Próba usuniêcia bazy danych siê nie powiod³a.';
	$lang['strentersql'] = 'Podaj polecenie SQL do wykonania:';
	$lang['strsqlexecuted'] = 'Polecenie SQL zosta³o wykonane.';
	$lang['strvacuumgood'] = 'Czyszczenie bazy zosta³o zakoñczone.';
	$lang['strvacuumbad'] = 'Próba czyszczenia bazy siê nie powiod³a.';
	$lang['stranalyzegood'] = 'Analiza bazy zosta³a zakoñczona.';
	$lang['stranalyzebad'] = 'Próba analizy siê nie powiod³a.';
	$lang['strreindexgood']  =  'Reindeksacja zosta³a zakoñczona.';
	$lang['strreindexbad']  =  'Próba reindeksacji siê nie powiod³a.';
	$lang['strfull']  =  'Pe³ne';
	$lang['strfreeze']  =  'Zamro¿enie';
	$lang['strforce']  =  'Wymuszenie';
	$lang['strsignalsent']  =  'Sygna³ zosta³ wys³any.';
	$lang['strsignalsentbad']  =  'Próba wys³ania sygna³u siê nie powiod³a.';
	$lang['strallobjects']  =  'Wszystkie obiekty';

	// Views
	$lang['strview'] = 'Widok';
	$lang['strviews'] = 'Widoki';
	$lang['strshowallviews'] = 'Poka¿ wszystkie widoki';
	$lang['strnoview'] = 'Nie znaleziono widoku.';
	$lang['strnoviews'] = 'Nie znaleziono widoków.';
	$lang['strcreateview'] = 'Utwórz widok';
	$lang['strviewname'] = 'Nazwa widoku';
	$lang['strviewneedsname'] = 'Musisz nazwaæ widok.';
	$lang['strviewneedsdef'] = 'Musisz zdefiniowaæ widok.';
	$lang['strviewneedsfields']  =  'Musisz podaæ kolumny, które maj± byæ widoczne w widoku.';
	$lang['strviewcreated'] = 'Widok zosta³ utworzony.';
	$lang['strviewcreatedbad'] = 'Próba utworzenia widoku siê nie powiod³a.';
	$lang['strconfdropview'] = 'Czy na pewno chcesz usun±æ widok "%s"?';
	$lang['strviewdropped'] = 'Widok zosta³ usuniêty.';
	$lang['strviewdroppedbad'] = 'Próba usuniêcia widoku siê nie powiod³a.';
	$lang['strviewupdated'] = 'Widok zosta³ zaktualizowany.';
	$lang['strviewupdatedbad'] = 'Próba aktualizacji widoku siê nie powiod³a.';
	$lang['strviewlink'] = 'Klucze ³±cz±ce';
	$lang['strviewconditions'] = 'Dodatkowe warunki';
	$lang['strcreateviewwiz']  =  'Utwórz widok przy u¿yciu kreatora widoków';

	// Sequences
	$lang['strsequence'] = 'Sekwencja';
	$lang['strsequences'] = 'Sekwencje';
	$lang['strshowallsequences'] = 'Poka¿ wszystkie sekwencje';
	$lang['strnosequence'] = 'Nie znaleziono sekwencji.';
	$lang['strnosequences'] = 'Nie znaleziono sekwencji.';
	$lang['strcreatesequence'] = 'Utwórz sekwencjê';
	$lang['strlastvalue'] = 'Ostatnia warto¶æ';
	$lang['strincrementby'] = 'Zwiêkszana o';	
	$lang['strstartvalue'] = 'Warto¶æ pocz±tkowa';
	$lang['strmaxvalue'] = 'Warto¶æ maks.';
	$lang['strminvalue'] = 'Warto¶æ min.';
	$lang['strcachevalue'] = 'cache_value';
	$lang['strlogcount'] = 'log_cnt';
	$lang['striscycled'] = 'is_cycled';
	$lang['striscalled'] = 'is_called';
	$lang['strsequenceneedsname'] = 'Musisz nazwaæ sekwencjê';
	$lang['strsequencecreated'] = 'Sekwencja zosta³a utworzona.';
	$lang['strsequencecreatedbad'] = 'Próba utworzenia sekwencji siê nie powiod³a.';
	$lang['strconfdropsequence'] = 'Czy na pewno chcesz usun±æ sekwencjê "%s"?';
	$lang['strsequencedropped'] = 'Sekwencja zosta³a usuniêta.';
	$lang['strsequencedroppedbad'] = 'Próba usuniêcia sekwencji siê nie powiod³a.';
	$lang['strsequencereset'] = 'Sekwencja zosta³a wyzerowana.';
	$lang['strsequenceresetbad'] = 'Próba zerowania sekwencji siê nie powiod³a.';
						
	// Indeksy
	$lang['strindex'] = 'Indeks';
	$lang['strindexes'] = 'Indeksy';
	$lang['strindexname'] = 'Nazwa indeksu';
	$lang['strshowallindexes'] = 'Poka¿ wszystkie indeksy';
	$lang['strnoindex'] = 'Nie znaleziono indeksu.';
	$lang['strnoindexes'] = 'Nie znaleziono indeksów.';
	$lang['strcreateindex'] = 'Utwórz indeks';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nazwa kolumny';
	$lang['strindexneedsname'] = 'Musisz nazwaæ indeks.';
	$lang['strindexneedscols'] = 'W sk³ad indeksu musi wchodziæ przynajmniej jedna kolumna.';
	$lang['strindexcreated'] = 'Indeks zosta³ utworzony';
	$lang['strindexcreatedbad'] = 'Próba utworzenia indeksu siê nie powiod³a.';
	$lang['strconfdropindex'] = 'Czy na pewno chcesz usun±æ indeks "%s"?';
	$lang['strindexdropped'] = 'Indeks zosta³ usuniêty.';
	$lang['strindexdroppedbad'] = 'Próba usuniêcia indeksu siê nie powiod³a.';
	$lang['strkeyname'] = 'Nazwa klucza';
	$lang['struniquekey'] = 'Klucz Unikatowy';
	$lang['strprimarykey'] = 'Klucz G³ówny';
	$lang['strindextype'] = 'Typ indeksu';
	$lang['strtablecolumnlist'] = 'Kolumny w tabeli';
	$lang['strindexcolumnlist'] = 'Kolumny w indeksie';
	$lang['strconfcluster'] = 'Czy na pewno chcesz zklastrowaæ "%s"?';
	$lang['strclusteredgood'] = 'Klastrowanie zosta³o zakoñczone.';
	$lang['strclusteredbad'] = 'Próba klastrowania siê nie powiod³a.';
	
	// Rules
	$lang['strrules'] = 'Regu³y';
	$lang['strrule']  =  'Regu³a';
	$lang['strshowallrules'] = 'Poka¿ wszystkie regu³y';
	$lang['strnorule'] = 'Nie znaleziono regu³y.';
	$lang['strnorules'] = 'Nie znaleziono regu³.';
	$lang['strcreaterule'] = 'Utwórz regu³ê';
	$lang['strrulename'] = 'Nazwa regu³y';
	$lang['strruleneedsname'] = 'Musisz nazwaæ regu³ê.';
	$lang['strrulecreated'] = 'Regu³a zosta³a utworzona.';
	$lang['strrulecreatedbad'] = 'Próba utworzenia regu³y siê nie powiod³a.';
	$lang['strconfdroprule'] = 'Czy na pewno chcesz usun±æ regu³ê "%s" na "%s"?';
	$lang['strruledropped'] = 'Regu³a zosta³a usuniêta.';
	$lang['strruledroppedbad'] = 'Próba usuniêcia regu³y siê nie powiod³a.';
	
	// Constraints
	$lang['strconstraint']  =  'Wiêz integralno¶ci';
	$lang['strconstraints'] = 'Wiêzy integralno¶ci';
	$lang['strshowallconstraints'] = 'Poka¿ wszystkie wiêzy integralno¶ci';
	$lang['strnoconstraints'] = 'Nie znaleziono wiêzów integralno¶ci.';
	$lang['strcreateconstraint'] = 'Utwórz wiêzy integralno¶ci';
	$lang['strconstraintcreated'] = 'Wiêzy integralno¶ci zosta³y utworzone.';
	$lang['strconstraintcreatedbad'] = 'Próba utworzenia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['strconfdropconstraint'] = 'Czy na pewno chcesz usun±æ wiêzy integralno¶ci "%s" na "%s"?';
	$lang['strconstraintdropped'] = 'Wiêzy integralno¶ci zosta³y usuniête.';
	$lang['strconstraintdroppedbad'] = 'Próba usuniêcia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['straddcheck'] = 'Dodaj warunek';
	$lang['strcheckneedsdefinition'] = 'Musisz zdefiniowaæ warunek.';
	$lang['strcheckadded'] = 'Warunek zosta³ dodany.';
	$lang['strcheckaddedbad'] = 'Operacja dodania warunku siê nie powiod³a.';
	$lang['straddpk'] = 'Dodaj klucz g³ówny';
	$lang['strpkneedscols'] = 'Klucz g³ówny musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strpkadded'] = 'Klucz g³ówny zosta³ dodany.';
	$lang['strpkaddedbad'] = 'Próba dodania klucza g³ównego siê nie powiod³a.';
	$lang['stradduniq'] = 'Dodaj klucz unikatowy';
	$lang['struniqneedscols'] = 'Klucz unikatowy musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['struniqadded'] = 'Klucz unikatowy zosta³ dodany.';
	$lang['struniqaddedbad'] = 'Próba dodania klucza unikatowego siê nie powiod³a.';
	$lang['straddfk'] = 'Dodaj klucz obcy';
	$lang['strfkneedscols'] = 'Obcy klucz musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strfkneedstarget'] = 'Klucz obcy wymaga podania nazwy tabeli docelowej.';
	$lang['strfkadded'] = 'Klucz obcy zosta³ dodany.';
	$lang['strfkaddedbad'] = 'Próba dodania klucza obcego siê nie powiod³a.';
	$lang['strfktarget'] = 'Tabela docelowa';
	$lang['strfkcolumnlist'] = 'Kolumna w kluczu';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';
					
	// Functions
	$lang['strfunction'] = 'Funkcja';
	$lang['strfunctions'] = 'Funkcje';
	$lang['strshowallfunctions'] = 'Poka¿ wszystkie funkcje';
	$lang['strnofunction'] = 'Nie znaleziono funkcji.';
	$lang['strnofunctions'] = 'Nie znaleziono funkcji.';
	$lang['strcreateplfunction']  =  'Utwórz funkcjê SQL/PL';
	$lang['strcreateinternalfunction']  =  'Utwórz funkcjê wewnêtrzn±';
	$lang['strcreatecfunction']  =  'Utwórz funkcjê C';
	$lang['strfunctionname'] = 'Nazwa funkcji';
	$lang['strreturns'] = 'Zwraca';
	$lang['strarguments'] = 'Parametry';
	$lang['strproglanguage'] = 'Jêzyk';
	$lang['strfunctionneedsname'] = 'Musisz nazwaæ funkcjê.';
	$lang['strfunctionneedsdef'] = 'Musisz zdefiniowaæ funkcjê.';
	$lang['strfunctioncreated'] = 'Funkcja zosta³a utworzona.';
	$lang['strfunctioncreatedbad'] = 'Próba utworzenia funkcji siê nie powiod³a';
	$lang['strconfdropfunction'] = 'Czy na pewno chcesz usun±æ funkcjê "%s"?';
	$lang['strfunctiondropped'] = 'Funkcja zosta³a usuniêta.';
	$lang['strfunctiondroppedbad'] = 'Próba usuniêcia funkcji siê nie powiod³a.';
	$lang['strfunctionupdated'] = 'Funkcja zosta³a zaktualizowana.';
	$lang['strfunctionupdatedbad'] = 'Próba aktualizacji funkcji siê nie powiod³a.';
    $lang['strobjectfile']  =  'Plik objektów';
    $lang['strlinksymbol']  =  '£±cz symbol';

	// Triggers
	$lang['strtrigger'] = 'Procedura wyzwalana';
	$lang['strtriggers'] = 'Procedury wyzwalane';
	$lang['strshowalltriggers'] = 'Poka¿ wszystkie procedury wyzwalane';
	$lang['strnotrigger'] = 'Nie znaleziono procedury wyzwalanej.';
	$lang['strnotriggers'] = 'Nie znaleziono procedur wyzwalanych.';
	$lang['strcreatetrigger'] = 'Utwórz procedurê wyzwalan±';
	$lang['strtriggerneedsname'] = 'Musisz nazwaæ procedurê wyzwalan±';
	$lang['strtriggerneedsfunc'] = 'Musisz podaæ funkcjê procedury wyzwalanej.';
	$lang['strtriggercreated'] = 'Procedura wyzwalana zosta³a utworzona.';
	$lang['strtriggercreatedbad'] = 'Próba utworzenia procedury wyzwalanej siê nie powiod³a';
	$lang['strconfdroptrigger'] = 'Czy na pewno chcesz usun±æ procedurê "%s" wyzwalan± przez "%s"?';
	$lang['strtriggerdropped'] = 'Procedura wyzwalana zosta³a usuniêta.';
	$lang['strtriggerdroppedbad'] = 'Próba usuniêcia procedury wyzwalanej siê nie powiod³a.';
	$lang['strtriggeraltered'] = 'Procedura wyzwalana zosta³a zmieniona.';
	$lang['strtriggeralteredbad'] = 'Próba modyfikacji procedury wyzwalanej siê nie powiod³a.';
		
	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Poka¿ wszystkie typy';
	$lang['strnotype'] = 'Nie znaleziono typu.';
	$lang['strnotypes'] = 'Nie znaleziono typów.';
	$lang['strcreatetype'] = 'Utwórz typ';
	$lang['strcreatecomptype']  =  'Utwórz typ z³o¿ony';
	$lang['strtypeneedsfield']  =  'Musisz podaæ przynajmniej jedno pole.';
	$lang['strtypeneedscols']  =  'Musisz podaæ poprawn± ilo¶æ pól.';	
	$lang['strtypename'] = 'Nazwa typu';
	$lang['strinputfn'] = 'Funkcja wej¶ciowa';
	$lang['stroutputfn'] = 'Funkcja wyj¶ciowa';
	$lang['strpassbyval'] = 'Przekazywany przez warto¶æ?';
	$lang['stralignment'] = 'Wyrównanie bajtowe';
	$lang['strelement'] = 'Typ elementów';
	$lang['strdelimiter'] = 'Znak oddzielaj±cy elementy tabeli';
	$lang['strstorage'] = 'Technika przechowywania';
	$lang['strfield']  =  'Pole';
	$lang['strnumfields']  =  'Ilo¶æ pól';
	$lang['strtypeneedsname'] = 'Musisz nazwaæ typ.';
	$lang['strtypeneedslen'] = 'Musisz podaæ d³ugo¶æ typu.';
	$lang['strtypecreated'] = 'Typ zosta³ utworzony';
	$lang['strtypecreatedbad'] = 'Próba utworzenia typu siê nie powiod³a.';
	$lang['strconfdroptype'] = 'Czy na pewno chcesz usun±æ typ "%s"?';
	$lang['strtypedropped'] = 'Typ zosta³ usuniêty.';
	$lang['strtypedroppedbad'] = 'Próba usuniêcia typu siê nie powiod³a.';
    $lang['strflavor']  =  'Flavor';
	$lang['strbasetype']  =  'podstawowy';
	$lang['strcompositetype']  =  'z³o¿ony';
	$lang['strpseudotype']  =  'pseudo';

	// Schemas
	$lang['strschema'] = 'Schemat';
	$lang['strschemas'] = 'Schematy';
	$lang['strshowallschemas'] = 'Poka¿ wszystkie schematy';
	$lang['strnoschema'] = 'Nie znaleziono schematu.';
	$lang['strnoschemas'] = 'Nie znaleziono schematów.';
	$lang['strcreateschema'] = 'Utwórz schemat';
	$lang['strschemaname'] = 'Nazwa schematu';
	$lang['strschemaneedsname'] = 'Musisz nadaæ schematowi nazwê.';
	$lang['strschemacreated'] = 'Schemat zosta³ utworzony';
	$lang['strschemacreatedbad'] = 'Próba utworzenia schematu siê nie powiod³a.';
	$lang['strconfdropschema'] = 'Czy na pewno chcesz usun±æ schemat "%s"?';
	$lang['strschemadropped'] = 'Schemat zosta³ usuniêty.';
	$lang['strschemadroppedbad'] = 'Próba usuniêcia schematu siê nie powiod³a.';
	$lang['strschemaaltered']  =  'Schemat zosta³ zmieniony.';
	$lang['strschemaalteredbad']  =  'Próba zmiany schematu siê nie powiod³a';
	$lang['strsearchpath']  =  '¦cie¿ka wyszukiwania schematu';

	// Reports
	$lang['strreport'] = 'Raport';
	$lang['strreports'] = 'Raporty';
	$lang['strshowallreports'] = 'Poka¿ wszystkie raporty';
	$lang['strnoreports'] = 'Nie znaleziono raportów.';
	$lang['strcreatereport'] = 'Utwórz raport';
	$lang['strreportdropped'] = 'Raport zosta³ usuniêty.';
	$lang['strreportdroppedbad'] = 'Próba usuniêcia raportu siê nie powiod³a.';
	$lang['strconfdropreport'] = 'Czy na pewno chcesz usun±æ raport "%s"?';
	$lang['strreportneedsname'] = 'Musisz nazwaæ raport.';
	$lang['strreportneedsdef'] = 'Musisz podaæ zapytanie SQL definiuj±ce raport.';
	$lang['strreportcreated'] = 'Raport zosta³ utworzony.';
	$lang['strreportcreatedbad'] = 'Próba utworzenia raportu siê nie powiod³a.';

	// Domeny
	$lang['strdomain'] = 'Domena';
	$lang['strdomains'] = 'Domeny';
	$lang['strshowalldomains'] = 'Poka¿ wszystkie domeny';
	$lang['strnodomains'] = 'Nie znaleziono domen.';
	$lang['strcreatedomain'] = 'Utwórz domenê';
	$lang['strdomaindropped'] = 'Domena zosta³a usuniêta.';
	$lang['strdomaindroppedbad'] = 'Próba usuniêcia domeny siê nie powiod³a.';
	$lang['strconfdropdomain'] = 'Czy na pewno chcesz usun±æ domenê "%s"?';
	$lang['strdomainneedsname'] = 'Musisz nazwaæ domenê.';
	$lang['strdomaincreated'] = 'Domena zosta³a utworzona.';
	$lang['strdomaincreatedbad'] = 'Próba utworzenia domeny siê nie powiod³a.';
	$lang['strdomainaltered'] = 'Domena zosta³a zmieniona.';
	$lang['strdomainalteredbad'] = 'Próba modyfikacji domeny siê nie powiod³a.';

	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operatory';
	$lang['strshowalloperators'] = 'Poka¿ wszystkie operatory';
	$lang['strnooperator'] = 'Nie znaleziono operatora.';
	$lang['strnooperators'] = 'Nie znaleziono operatorów.';
	$lang['strcreateoperator'] = 'Utwórz operator';
	$lang['strleftarg'] = 'Typ lewego argumentu';
	$lang['strrightarg'] = 'Typ prawego argumentu';
    $lang['strcommutator'] = 'Commutator';
	$lang['strnegator'] = 'Negacja';
	$lang['strrestrict'] = 'Zastrze¿enie';
	$lang['strjoin'] = 'Po³±czenie';
    $lang['strhashes'] = 'Hashes';
    $lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Lewe sortowanie';
	$lang['strrightsort'] = 'Prawe sortowanie';
	$lang['strlessthan'] = 'Mniej ni¿';
	$lang['strgreaterthan'] = 'Wiêcej ni¿';
	$lang['stroperatorneedsname'] = 'Musisz nazwaæ operator.';
	$lang['stroperatorcreated'] = 'Operator zosta³ utworzony.';
	$lang['stroperatorcreatedbad'] = 'Próba utworzenia operatora siê nie powiod³a.';
	$lang['strconfdropoperator'] = 'Czy na pewno chcesz usun±æ operator "%s"?';
	$lang['stroperatordropped'] = 'Operator zosta³ usuniêty.';
	$lang['stroperatordroppedbad'] = 'Próba usuniêcia operatora siê nie powiod³a.';

	// Casts
	$lang['strcasts'] = 'Rzutowania';
	$lang['strnocasts'] = 'Nie znaleziono rzutowañ.';
	$lang['strsourcetype'] = 'Typ ¼ród³owy';
	$lang['strtargettype'] = 'Typ docelowy';
	$lang['strimplicit'] = 'Niezaprzeczalny';
	$lang['strinassignment'] = 'W przydziale';
	$lang['strbinarycompat'] = '(Kompatybilny binarnie)';

	// Conversions
	$lang['strconversions'] = 'Konwersje';
	$lang['strnoconversions'] = 'Nie znaleziono konwersji.';
	$lang['strsourceencoding'] = 'Kodowanie ¼ród³owe';
	$lang['strtargetencoding'] = 'Kodowanie docelowe';

	// Languages
	$lang['strlanguages'] = 'Jêzyki';
	$lang['strnolanguages'] = 'Nie znaleziono jêzyków.';
	$lang['strtrusted'] = 'Zaufany';

	// Info
	$lang['strnoinfo'] = 'Brak informacji na ten temat';
	$lang['strreferringtables'] = 'Tabele zale¿ne';
	$lang['strparenttables'] = 'Tabela nadrzêdne';
	$lang['strchildtables'] = 'Tabela podrzêdna';

	// Aggregates
	$lang['straggregates'] = 'Funkcje agreguj±ce';
	$lang['strnoaggregates'] = 'Nie znaleziono funkcji agreguj±cych.';
	$lang['stralltypes'] = '(Wszystkie typy)';

	// Operator Classes
	$lang['stropclasses'] = 'Klasy operatorów';
	$lang['strnoopclasses'] = 'Nie znaleziono klas operatorów.';
	$lang['straccessmethod'] = 'Metoda dostêpu';

	// Stats and performance
	$lang['strrowperf'] = 'Wydajno¶æ wierszowa';
	$lang['strioperf'] = 'Wydajno¶æ I/O';
	$lang['stridxrowperf'] = 'Wydajno¶æ indeksu wierszowego';
	$lang['stridxioperf'] = 'Wydajno¶æ indeksu We/Wy';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sekwencyjny';
	$lang['strscan'] = 'Skanuj';
	$lang['strread'] = 'Czytaj';
	$lang['strfetch'] = 'Pobierz';
	$lang['strheap'] = 'Sterta';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'Indeks TOAST';
	$lang['strcache'] = 'Kesz';
	$lang['strdisk'] = 'Dysk';
	$lang['strrows2'] = 'Wiersze';

	// Tablespaces
	$lang['strtablespace']  =  'Przestrzeñ tabel';
	$lang['strtablespaces']  =  'Przestrzenie tabel';
	$lang['strshowalltablespaces']  =  'Poka¿ wszystkie przestrzenie tabel';
	$lang['strnotablespaces']  =  'Nie znaleziono przestrzeni tabel.';
	$lang['strcreatetablespace']  =  'Utwórz przestrzeñ tabel';
	$lang['strlocation']  =  'Po³o¿enie';
	$lang['strtablespaceneedsname']  =  'Musisz podaæ nazwê przestrzeni tabel.';
	$lang['strtablespaceneedsloc']  =  'Musisz podaæ nazwê katalogu, w którym chcesz utworzyæ przestrzeñ tabel.';
	$lang['strtablespacecreated']  =  'Przestrzeñ tabel zosta³a utworzona.';
	$lang['strtablespacecreatedbad']  =  'Próba utworzenia przestrzeni tabel siê nie powiod³a.';
	$lang['strconfdroptablespace']  =  'Czy na pewno chcesz usun±æ przestrzeñ tabel "%s"?';
	$lang['strtablespacedropped']  =  'Przestrzeñ tabel zosta³a usuniêta.';
	$lang['strtablespacedroppedbad']  =  'Próba usuniêcia przestrzeni tabel siê nie powiod³a.';
	$lang['strtablespacealtered']  =  'Przestrzeñ tabel zosta³a zmieniona.';
	$lang['strtablespacealteredbad']  =  'Próba modyfikacji przestrzeni tabel siê nie powiod³a.';

	// Miscellaneous
	$lang['strtopbar'] = '%s uruchomiony na %s:%s -- Jeste¶ zalogowany jako "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Pomoc';
	$lang['strhelpicon']  =  '?';

?>
