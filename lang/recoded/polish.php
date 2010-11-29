<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.55 2007/04/24 11:42:07 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Polski';
	$lang['appcharset'] = 'utf-8';
	$lang['applocale'] = 'pl_PL';
	$lang['appdbencoding'] = 'UNICODE';
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'Witaj w phpPgAdmin.';
	$lang['strppahome'] = 'Strona domowa phpPgAdmin';
	$lang['strpgsqlhome'] = 'Strona domowa PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Dokumentacja PostgreSQL (lokalna)';
	$lang['strreportbug'] = 'Zg&#322;o&#347; raport o b&#322;&#281;dzie';
	$lang['strviewfaq'] = 'Przejrzyj FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Zaloguj';
	$lang['strloginfailed'] = 'Pr&#243;ba zalogowania nie powiod&#322;a si&#281;.';
	$lang['strlogindisallowed'] = 'Logowanie niedozwolone';
	$lang['strserver'] = 'Serwer';
	$lang['strservers'] = 'Serwery';
	$lang['strintroduction'] = 'Wprowadzenie';
	$lang['strhost'] = 'Host';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'Wyloguj si&#281;';
	$lang['strowner'] = 'W&#322;a&#347;ciciel';
	$lang['straction'] = 'Akcja';	
	$lang['stractions'] = 'Akcje';	
	$lang['strname'] = 'Nazwa';
	$lang['strdefinition'] = 'Definicja';
	$lang['strproperties'] = 'W&#322;a&#347;ciwo&#347;ci';
	$lang['strbrowse'] = 'Przegl&#261;daj';
	$lang['strenable']  =  'Aktywuj';
	$lang['strdisable']  =  'Deaktywuj';
	$lang['strdrop'] = 'Usu&#324;';
	$lang['strdropped'] = 'Usuni&#281;ty';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Poprzedni';
	$lang['strnext'] = 'Nast&#281;pny';
	$lang['strfirst'] = '&lt;&lt; Pierwszy';
	$lang['strlast'] = 'Ostatni &gt;&gt;';
	$lang['strfailed'] = 'Nieudany';
	$lang['strcreate'] = 'Utw&#243;rz';
	$lang['strcreated'] = 'Utworzony';
	$lang['strcomment'] = 'Komentarz';
	$lang['strlength'] = 'D&#322;ugo&#347;&#263;';
	$lang['strdefault'] = 'Domy&#347;lny';
	$lang['stralter'] = 'Zmie&#324;';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Anuluj';
	$lang['strac']  =  'W&#322;&#261;cz autouzupe&#322;nianie';
	$lang['strsave'] = 'Zapisz';
	$lang['strreset'] = 'Wyczy&#347;&#263;';
	$lang['strinsert'] = 'Wstaw';
	$lang['strselect'] = 'Wybierz';
	$lang['strdelete'] = 'Usu&#324;';
	$lang['strupdate'] = 'Zmie&#324;';
	$lang['strreferences'] = 'Odno&#347;niki';
	$lang['stryes'] = 'Tak';
	$lang['strno'] = 'Nie';
	$lang['strtrue'] = 'Prawda';
	$lang['strfalse'] = 'Fa&#322;sz';
	$lang['stredit'] = 'Edycja';
	$lang['strcolumn'] = 'Kolumna';
	$lang['strcolumns'] = 'Kolumny';
	$lang['strrows'] = 'wiersz(y)';
	$lang['strrowsaff'] = 'wiersz(y) dotyczy.';
	$lang['strobjects'] = 'obiekty';
	$lang['strback'] = 'Wstecz';
	$lang['strqueryresults'] = 'Wyniki zapytania';
	$lang['strshow'] = 'Poka&#380;';
	$lang['strempty'] = 'Wyczy&#347;&#263;';
	$lang['strlanguage'] = 'J&#281;zyk';
	$lang['strencoding'] = 'Kodowanie';
	$lang['strvalue'] = 'Warto&#347;&#263;';
	$lang['strunique'] = 'Unikatowy';
	$lang['strprimary'] = 'G&#322;&#243;wny';
	$lang['strexport'] = 'Eksport';
	$lang['strimport'] = 'Import';
	$lang['strallowednulls'] = 'Dozwolone znaki NULL';
	$lang['strbackslashn'] = '\N';
	$lang['strnull'] = 'Null';
	$lang['stremptystring'] = 'Pusty ci&#261;g znak&#243;w/pole';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Administruj';
	$lang['strvacuum'] = 'Przeczy&#347;&#263;';
	$lang['stranalyze'] = 'Analizuj';
	$lang['strclusterindex'] = 'Klastruj';
	$lang['strclustered'] = 'Klastrowany?';
	$lang['strreindex'] = 'Przeindeksuj';
	$lang['strrun'] = 'Uruchom';
	$lang['stradd'] = 'Dodaj';
	$lang['strremove'] = 'Usu&#324;';
	$lang['strevent'] = 'Zdarzenie';
	$lang['strwhere'] = 'Gdzie';
	$lang['strinstead'] = 'Wykonaj zamiast';
	$lang['strwhen'] = 'Kiedy';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Dane';
	$lang['strconfirm'] = 'Potwierd&#378;';
	$lang['strexpression'] = 'Wyra&#380;enie';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Rozwi&#324;';
	$lang['strcollapse'] = 'Zwi&#324;';
	$lang['strexplain'] = 'Explain';
	$lang['strexplainanalyze'] = 'Explain Analyze';
	$lang['strfind'] = 'Znajd&#378;';
	$lang['stroptions'] = 'Opcje';
	$lang['strrefresh'] = 'Od&#347;wie&#380;';
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
	$lang['strruntime'] = 'Ca&#322;kowity czas pracy: %s ms.';
	$lang['strpaginate'] = 'Wy&#347;wietl wyniki stronami';
	$lang['struploadscript'] = 'lub za&#322;aduj skrypt SQL:';
	$lang['strstarttime'] = 'Czas pocz&#261;tku';
	$lang['strfile'] = 'Plik';
	$lang['strfileimported'] = 'Plik zosta&#322; zaimportowany.';
	$lang['strtrycred'] = 'U&#380;yj tych parametr&#243;w dla wszystkich serwer&#243;w';

	// Database Sizes
	$lang['strsize'] = 'Rozmiar';
	$lang['strbytes'] = 'bajt&#243;w';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'Ta aplikacja najlepiej dzia&#322;a w przegl&#261;darce obs&#322;uguj&#261;cej ramki, ale mo&#380;esz jej u&#380;y&#263; r&#243;wnie&#380; bez ramek, klikaj&#261;c poni&#380;szy link.';
	$lang['strnoframeslink'] = 'Otw&#243;rz bez ramek';
	$lang['strbadconfig'] = 'Tw&#243;j plik config.inc.php jest przestarza&#322;y. Musisz go utworzy&#263; ponownie wykorzystuj&#261;c nowy config.inc.php-dist.';
	$lang['strnotloaded'] = 'Nie wkompilowa&#322;e&#347; do PHP obs&#322;ugi tej bazy danych.';
	$lang['strpostgresqlversionnotsupported'] = 'Nieobs&#322;ugiwana wersja PostgreSQL. Uaktualnij do wersji %s lub nowszej.';
	$lang['strbadschema'] = 'Podano b&#322;&#281;dny schemat.';
	$lang['strbadencoding'] = 'B&#322;&#281;dne kodowanie bazy.';
	$lang['strsqlerror'] = 'B&#322;&#261;d SQL:';
	$lang['strinstatement'] = 'W poleceniu:';
	$lang['strinvalidparam'] = 'B&#322;&#281;dny parametr.';
	$lang['strnodata'] = 'Nie znaleziono danych.';
	$lang['strnoobjects'] = 'Nie znaleziono obiekt&#243;w.';
	$lang['strrownotunique'] = 'Brak unikatowego identyfikatora dla tego wiersza.';
	$lang['strnoreportsdb'] = 'Nie utworzy&#322;e&#347; bazy raport&#243;w. Instrukcj&#281; znajdziesz w pliku INSTALL.';
	$lang['strnouploads'] = '&#321;adowanie plik&#243;w wy&#322;&#261;czone.';
	$lang['strimporterror'] = 'B&#322;&#261;d importu.';
	$lang['strimporterror-fileformat'] = 'B&#322;&#261;d importu: Nie mo&#380;na automatycznie okre&#347;li&#263; formatu pliku.';
	$lang['strimporterrorline'] = 'B&#322;&#261;d importu w linii %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'B&#322;&#261;d importu w linii %s: Linia nie ma w&#322;a&#347;ciwej liczby kolumn.';
	$lang['strimporterror-uploadedfile'] = 'B&#322;&#261;d importu: plik nie mo&#380;e by&#263; za&#322;adowany na serwer.';
	$lang['strcannotdumponwindows'] = 'Zrzucanie z&#322;o&#380;onych nazw tabel i schemat&#243;w pod Windows jest nie wspierane.';

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabele';
	$lang['strshowalltables'] = 'Poka&#380; wszystkie tabele';
	$lang['strnotables'] = 'Nie znaleziono tabel.';
	$lang['strnotable'] = 'Nie znaleziono tabeli.';
	$lang['strcreatetable'] = 'Utw&#243;rz tabel&#281;';
	$lang['strtablename'] = 'Nazwa tabeli';
	$lang['strtableneedsname'] = 'Musisz nazwa&#263; tabel&#281;.';
	$lang['strtableneedsfield'] = 'Musisz poda&#263; przynajmniej jedno pole.';
	$lang['strtableneedscols'] = 'Musisz poda&#263; prawid&#322;ow&#261; liczb&#281; kolumn.';
	$lang['strtablecreated'] = 'Tabela zosta&#322;a utworzona.';
	$lang['strtablecreatedbad'] = 'Pr&#243;ba utworzenia tabeli si&#281; nie powiod&#322;a.';
	$lang['strconfdroptable'] = 'Czy na pewno chcesz usun&#261;&#263; tabel&#281; &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabela zosta&#322;a usuni&#281;ta.';
	$lang['strtabledroppedbad'] = 'Pr&#243;ba usuni&#281;cia tabeli si&#281; nie powiod&#322;a.';
	$lang['strconfemptytable'] = 'Czy na pewno chcesz wyczy&#347;ci&#263; tabel&#281; &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabela zosta&#322;a wyczyszczona.';
	$lang['strtableemptiedbad'] = 'Pr&#243;ba wyczyszczenia tabeli si&#281; nie powiod&#322;a.';
	$lang['strinsertrow'] = 'Wstaw wiersz';
	$lang['strrowinserted'] = 'Wiersz zosta&#322; wstawiony.';
	$lang['strrowinsertedbad'] = 'Pr&#243;ba wstawienia wiersza si&#281; nie powiod&#322;a.';
	$lang['strrowduplicate'] = 'Pr&#243;ba wstawienia zduplikowanego wiersza.';
	$lang['streditrow'] = 'Edycja wiersza';
	$lang['strrowupdated'] = 'Wiersz zosta&#322; zaktualizowany.';
	$lang['strrowupdatedbad'] = 'Pr&#243;ba aktualizacji wiersza si&#281; nie powiod&#322;a.';
	$lang['strdeleterow'] = 'Usu&#324; wiersz';
	$lang['strconfdeleterow'] = 'Czy na pewno chcesz usun&#261;&#263; ten wiersz?';
	$lang['strrowdeleted'] = 'Wiersz zosta&#322; usuni&#281;ty.';
	$lang['strrowdeletedbad'] = 'Pr&#243;ba usuni&#281;cia wiersza si&#281; nie powiod&#322;a.';
	$lang['strinsertandrepeat'] = 'Wstaw i powt&#243;rz';
	$lang['strnumcols'] = 'Ilo&#347;&#263; kolumn';
	$lang['strcolneedsname'] = 'Musisz poda&#263; nazw&#281; kolumny.';
	$lang['strselectallfields'] = 'Wybierz wszystkie pola';
	$lang['strselectneedscol'] = 'Musisz wybra&#263; przynajmniej jedn&#261; kolumn&#281;.';
	$lang['strselectunary'] = 'Operatory bezargumentowe (IS NULL/IS NOT NULL) nie mog&#261; mie&#263; podanej warto&#347;ci.';
	$lang['straltercolumn'] = 'Zmie&#324; kolumn&#281;';
	$lang['strcolumnaltered'] = 'Kolumna zosta&#322;a zmodyfikowana.';
	$lang['strcolumnalteredbad'] = 'Pr&#243;ba modyfikacji kolumny si&#281; nie powiod&#322;a.';
	$lang['strconfdropcolumn'] = 'Czy na pewno chcesz usun&#261;&#263; kolumn&#281; &quot;%s&quot; z tabeli &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Kolumna zosta&#322;a usuni&#281;ta.';
	$lang['strcolumndroppedbad'] = 'Pr&#243;ba usuni&#281;cia kolumny si&#281; nie powiod&#322;a.';
	$lang['straddcolumn'] = 'Dodaj kolumn&#281;';
	$lang['strcolumnadded'] = 'Kolumna zosta&#322;a dodana.';
	$lang['strcolumnaddedbad'] = 'Pr&#243;ba dodania kolumny si&#281; nie powiod&#322;a.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabela zosta&#322;a zmodyfikowana.';
	$lang['strtablealteredbad'] = 'Pr&#243;ba modyfikacji tabeli si&#281; nie powiod&#322;a.';
	$lang['strdataonly'] = 'Tylko dane';
	$lang['strstructureonly'] = 'Tylko struktura';
	$lang['strstructureanddata'] = 'Struktura i dane';
	$lang['strtabbed'] = 'Z tabulacjami';
	$lang['strauto'] = 'Automatyczny';
	$lang['strconfvacuumtable'] = 'Czy na pewno chcesz wykona&#263; vacuum &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Przybli&#380;ona ilo&#347;&#263; wierszy';

	// Columns
	$lang['strcolprop']  =  'W&#322;a&#347;ciwo&#347;ci kolumny';
		
	// Users
	$lang['struser'] = 'U&#380;ytkownik';
	$lang['strusers'] = 'U&#380;ytkownicy';
	$lang['strusername'] = 'Nazwa u&#380;ytkownika';
	$lang['strpassword'] = 'Has&#322;o';
	$lang['strsuper'] = 'Administrator?';
	$lang['strcreatedb'] = 'Tworzenie BD?';
	$lang['strexpires'] = 'Wygasa';	
	$lang['strsessiondefaults'] = 'Warto&#347;ci domy&#347;lne sesji';
	$lang['strnousers'] = 'Nie znaleziono u&#380;ytkownik&#243;w.';
	$lang['struserupdated'] = 'Parametry u&#380;ytkownika zosta&#322;y zaktualizowane.';
	$lang['struserupdatedbad'] = 'Pr&#243;ba aktualizacji parametr&#243;w u&#380;ytkownika si&#281; nie powiod&#322;a.';
	$lang['strshowallusers'] = 'Poka&#380; wszystkich u&#380;ytkownik&#243;w';
	$lang['strcreateuser'] = 'Utw&#243;rz u&#380;ytkownika';
	$lang['struserneedsname'] = 'Musisz poda&#263; nazw&#281; u&#380;ytkownika.';
	$lang['strusercreated'] = 'U&#380;ytkownik zosta&#322; utworzony.';
	$lang['strusercreatedbad'] = 'Pr&#243;ba utworzenia u&#380;ytkownika si&#281; nie powiod&#322;a.';
	$lang['strconfdropuser'] = 'Czy na pewno chcesz usun&#261;&#263; u&#380;ytkownika &quot;%s&quot;?';
	$lang['struserdropped'] = 'U&#380;ytkownik zosta&#322; usuni&#281;ty.';
	$lang['struserdroppedbad'] = 'Pr&#243;ba usuni&#281;cia u&#380;ytkownika si&#281; nie powiod&#322;a.';
	$lang['straccount'] = 'Konto';
	$lang['strchangepassword'] = 'Zmie&#324; has&#322;o';
	$lang['strpasswordchanged'] = 'Has&#322;o zosta&#322;o zmienione.';
	$lang['strpasswordchangedbad'] = 'Pr&#243;ba zmiany has&#322;a si&#281; nie powiod&#322;a.';
	$lang['strpasswordshort'] = 'Has&#322;o jest za kr&#243;tkie.';
	$lang['strpasswordconfirm'] = 'Has&#322;o i potwierdzenie musz&#261; by&#263; takie same.';
	
	// Groups
	$lang['strgroup'] = 'Grupa';
	$lang['strgroups'] = 'Grupy';
	$lang['strnogroup'] = 'Nie znaleziono grupy.';
	$lang['strnogroups'] = 'Nie znaleziono grup.';
	$lang['strcreategroup'] = 'Utw&#243;rz grup&#281;';
	$lang['strshowallgroups'] = 'Poka&#380; wszystkie grupy';
	$lang['strgroupneedsname'] = 'Musisz nazwa&#263; grup&#281;.';
	$lang['strgroupcreated'] = 'Grupa zosta&#322;a utworzona.';
	$lang['strgroupcreatedbad'] = 'Pr&#243;ba utworzenia grupy si&#281; nie powiod&#322;a.';
	$lang['strconfdropgroup'] = 'Czy na pewno chcesz utworzy&#263; grup&#281; &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grupa zosta&#322;a usuni&#281;ta.';
	$lang['strgroupdroppedbad'] = 'Pr&#243;ba usuni&#281;cia grupy si&#281; nie powiod&#322;a.';
	$lang['strmembers'] = 'Cz&#322;onkowie';
	$lang['straddmember'] = 'Dodaj cz&#322;onka grupy';
	$lang['strmemberadded'] = 'Cz&#322;onek grupy zosta&#322; dodany.';
	$lang['strmemberaddedbad'] = 'Pr&#243;ba dodania cz&#322;onka grupy si&#281; nie powiod&#322;a.';
	$lang['strdropmember'] = 'Usu&#324; cz&#322;onka grupy';
	$lang['strconfdropmember'] = 'Czy na pewno chcesz usun&#261;&#263; &quot;%s&quot; z grupy &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Cz&#322;onek grupy zosta&#322; usuni&#281;ty.';
	$lang['strmemberdroppedbad'] = 'Pr&#243;ba usuni&#281;cia cz&#322;onka grupy si&#281; nie powiod&#322;a.';

	// Roles
	$lang['strrole'] = 'Rola';
	$lang['strroles'] = 'Role';
	$lang['strinheritsprivs'] = 'Dziedziczy&#263; uprawnienia?';
	$lang['strcreaterole'] = 'Utw&#243;rz rol&#281;';
	$lang['strcatupdate'] = 'Modyfikacja katalog&#243;w?';
	$lang['strcanlogin'] = 'Mo&#380;e si&#281; logowa&#263;?';
	$lang['strmaxconnections'] = 'Maks. ilo&#347;&#263; po&#322;&#261;cze&#324;';
	$lang['strconfdroprole'] = 'Czy na pewno chcesz usun&#261;&#263; rol&#281; &quot;%s&quot;?';
	$lang['strroledropped'] = 'Rola zosta&#322;a usuni&#281;ta.';
	$lang['strroledroppedbad'] = 'Pr&#243;ba usuni&#281;cia roli si&#281; nie powiod&#322;a.';
	
	// Privileges
	$lang['strprivilege'] = 'Uprawnienie';
	$lang['strprivileges'] = 'Uprawnienia';
	$lang['strnoprivileges'] = 'Ten obiekt nie ma uprawnie&#324;.';
	$lang['strgrant'] = 'Nadaj';
	$lang['strrevoke'] = 'Zabierz';
	$lang['strgranted'] = 'Uprawnienia zosta&#322;y nadane.';
	$lang['strgrantfailed'] = 'Pr&#243;ba nadania uprawnie&#324; si&#281; nie powiod&#322;a.';
	$lang['strgrantbad'] = 'Musisz poda&#263; u&#380;ytkownika lub grup&#281;, a tak&#380;e uprawnienia, jakie chcesz nada&#263;.';
	$lang['strgrantor'] = 'Kto nada&#322;';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Baza danych';
	$lang['strdatabases'] = 'Bazy danych';
	$lang['strshowalldatabases'] = 'Poka&#380; wszystkie bazy danych';
	$lang['strnodatabase'] = 'Nie znaleziono bazy danych.';
	$lang['strnodatabases'] = 'Nie znaleziono &#380;adnej bazy danych.';
	$lang['strcreatedatabase'] = 'Utw&#243;rz baz&#281; danych';
	$lang['strdatabasename'] = 'Nazwa bazy danych';
	$lang['strdatabaseneedsname'] = 'Musisz nazwa&#263; baz&#281; danych.';
	$lang['strdatabasecreated'] = 'Baza danych zosta&#322;a utworzona.';
	$lang['strdatabasecreatedbad'] = 'Pr&#243;ba utworzenia bazy danych si&#281; nie powiod&#322;a.';
	$lang['strconfdropdatabase'] = 'Czy na pewno chcesz usun&#261;&#263; baz&#281; danych &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Baza danych zosta&#322;a usuni&#281;ta.';
	$lang['strdatabasedroppedbad'] = 'Pr&#243;ba usuni&#281;cia bazy danych si&#281; nie powiod&#322;a.';
	$lang['strentersql'] = 'Podaj polecenie SQL do wykonania:';
	$lang['strsqlexecuted'] = 'Polecenie SQL zosta&#322;o wykonane.';
	$lang['strvacuumgood'] = 'Czyszczenie bazy zosta&#322;o zako&#324;czone.';
	$lang['strvacuumbad'] = 'Pr&#243;ba czyszczenia bazy si&#281; nie powiod&#322;a.';
	$lang['stranalyzegood'] = 'Analiza bazy zosta&#322;a zako&#324;czona.';
	$lang['stranalyzebad'] = 'Pr&#243;ba analizy si&#281; nie powiod&#322;a.';
	$lang['strreindexgood'] = 'Reindeksacja zosta&#322;a zako&#324;czona.';
	$lang['strreindexbad'] = 'Pr&#243;ba reindeksacji si&#281; nie powiod&#322;a.';
	$lang['strfull'] = 'Pe&#322;ne';
	$lang['strfreeze'] = 'Zamro&#380;enie';
	$lang['strforce'] = 'Wymuszenie';
	$lang['strsignalsent'] = 'Sygna&#322; zosta&#322; wys&#322;any.';
	$lang['strsignalsentbad'] = 'Pr&#243;ba wys&#322;ania sygna&#322;u si&#281; nie powiod&#322;a.';
	$lang['strallobjects'] = 'Wszystkie obiekty';
	$lang['strdatabasealtered'] = 'Baza danych zosta&#322;a zmieniona.';
	$lang['strdatabasealteredbad'] = 'Pr&#243;ba modyfikacji bazy danych si&#281; nie powiod&#322;a.';

	// Views
	$lang['strview'] = 'Widok';
	$lang['strviews'] = 'Widoki';
	$lang['strshowallviews'] = 'Poka&#380; wszystkie widoki';
	$lang['strnoview'] = 'Nie znaleziono widoku.';
	$lang['strnoviews'] = 'Nie znaleziono widok&#243;w.';
	$lang['strcreateview'] = 'Utw&#243;rz widok';
	$lang['strviewname'] = 'Nazwa widoku';
	$lang['strviewneedsname'] = 'Musisz nazwa&#263; widok.';
	$lang['strviewneedsdef'] = 'Musisz zdefiniowa&#263; widok.';
	$lang['strviewneedsfields'] = 'Musisz poda&#263; kolumny, kt&#243;re maj&#261; by&#263; widoczne w widoku.';
	$lang['strviewcreated'] = 'Widok zosta&#322; utworzony.';
	$lang['strviewcreatedbad'] = 'Pr&#243;ba utworzenia widoku si&#281; nie powiod&#322;a.';
	$lang['strconfdropview'] = 'Czy na pewno chcesz usun&#261;&#263; widok &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Widok zosta&#322; usuni&#281;ty.';
	$lang['strviewdroppedbad'] = 'Pr&#243;ba usuni&#281;cia widoku si&#281; nie powiod&#322;a.';
	$lang['strviewupdated'] = 'Widok zosta&#322; zaktualizowany.';
	$lang['strviewupdatedbad'] = 'Pr&#243;ba aktualizacji widoku si&#281; nie powiod&#322;a.';
	$lang['strviewlink'] = 'Klucze &#322;&#261;cz&#261;ce';
	$lang['strviewconditions'] = 'Dodatkowe warunki';
	$lang['strcreateviewwiz'] = 'Utw&#243;rz widok przy u&#380;yciu kreatora widok&#243;w';

	// Sequences
	$lang['strsequence'] = 'Sekwencja';
	$lang['strsequences'] = 'Sekwencje';
	$lang['strshowallsequences'] = 'Poka&#380; wszystkie sekwencje';
	$lang['strnosequence'] = 'Nie znaleziono sekwencji.';
	$lang['strnosequences'] = 'Nie znaleziono sekwencji.';
	$lang['strcreatesequence'] = 'Utw&#243;rz sekwencj&#281;';
	$lang['strlastvalue'] = 'Ostatnia warto&#347;&#263;';
	$lang['strincrementby'] = 'Zwi&#281;kszana o';	
	$lang['strstartvalue'] = 'Warto&#347;&#263; pocz&#261;tkowa';
	$lang['strmaxvalue'] = 'Warto&#347;&#263; maks.';
	$lang['strminvalue'] = 'Warto&#347;&#263; min.';
	$lang['strcachevalue'] = 'Warto&#347;&#263; keszowana';
	$lang['strlogcount'] = 'log_cnt';
	$lang['striscycled'] = 'czy cykliczna';
	$lang['strsequenceneedsname'] = 'Musisz nazwa&#263; sekwencj&#281;.';
	$lang['strsequencecreated'] = 'Sekwencja zosta&#322;a utworzona.';
	$lang['strsequencecreatedbad'] = 'Pr&#243;ba utworzenia sekwencji si&#281; nie powiod&#322;a.';
	$lang['strconfdropsequence'] = 'Czy na pewno chcesz usun&#261;&#263; sekwencj&#281; &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sekwencja zosta&#322;a usuni&#281;ta.';
	$lang['strsequencedroppedbad'] = 'Pr&#243;ba usuni&#281;cia sekwencji si&#281; nie powiod&#322;a.';
	$lang['strsequencereset'] = 'Sekwencja zosta&#322;a wyzerowana.';
	$lang['strsequenceresetbad'] = 'Pr&#243;ba zerowania sekwencji si&#281; nie powiod&#322;a.';
 	$lang['straltersequence']  =  'Zmie&#324; sekwencj&#281;';
 	$lang['strsequencealtered']  =  'Sekwencja zosta&#322;a zmieniona.';
 	$lang['strsequencealteredbad']  =  'Pr&#243;ba modyfikacji sekwencji si&#281; nie powiod&#322;a.';
 	$lang['strsetval']  =  'Ustaw warto&#347;&#263;';
 	$lang['strsequencesetval']  =  'Warto&#347;&#263; sekwencji zosta&#322;a ustawiona.';
 	$lang['strsequencesetvalbad']  =  'Pr&#243;ba ustawienia warto&#347;ci sekwencji si&#281; nie powiod&#322;a.';
 	$lang['strnextval']  =  'Zwi&#281;ksz warto&#347;&#263; sekwencj&#281;';
 	$lang['strsequencenextval']  =  'Warto&#347;&#263; sekwencji zosta&#322;a zwi&#281;kszona.';
 	$lang['strsequencenextvalbad']  =  'Pr&#243;ba zwi&#281;kszenia warto&#347;ci sekwencji si&#281; nie powiod&#322;a.';

	// Indeksy
	$lang['strindex'] = 'Indeks';
	$lang['strindexes'] = 'Indeksy';
	$lang['strindexname'] = 'Nazwa indeksu';
	$lang['strshowallindexes'] = 'Poka&#380; wszystkie indeksy';
	$lang['strnoindex'] = 'Nie znaleziono indeksu.';
	$lang['strnoindexes'] = 'Nie znaleziono indeks&#243;w.';
	$lang['strcreateindex'] = 'Utw&#243;rz indeks';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nazwa kolumny';
	$lang['strindexneedsname'] = 'Musisz nazwa&#263; indeks.';
	$lang['strindexneedscols'] = 'W sk&#322;ad indeksu musi wchodzi&#263; przynajmniej jedna kolumna.';
	$lang['strindexcreated'] = 'Indeks zosta&#322; utworzony.';
	$lang['strindexcreatedbad'] = 'Pr&#243;ba utworzenia indeksu si&#281; nie powiod&#322;a.';
	$lang['strconfdropindex'] = 'Czy na pewno chcesz usun&#261;&#263; indeks &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Indeks zosta&#322; usuni&#281;ty.';
	$lang['strindexdroppedbad'] = 'Pr&#243;ba usuni&#281;cia indeksu si&#281; nie powiod&#322;a.';
	$lang['strkeyname'] = 'Nazwa klucza';
	$lang['struniquekey'] = 'Klucz Unikatowy';
	$lang['strprimarykey'] = 'Klucz G&#322;&#243;wny';
	$lang['strindextype'] = 'Typ indeksu';
	$lang['strtablecolumnlist'] = 'Kolumny w tabeli';
	$lang['strindexcolumnlist'] = 'Kolumny w indeksie';
	$lang['strconfcluster'] = 'Czy na pewno chcesz zklastrowa&#263; &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Klastrowanie zosta&#322;o zako&#324;czone.';
	$lang['strclusteredbad'] = 'Pr&#243;ba klastrowania si&#281; nie powiod&#322;a.';

	// Rules
	$lang['strrules'] = 'Regu&#322;y';
	$lang['strrule'] = 'Regu&#322;a';
	$lang['strshowallrules'] = 'Poka&#380; wszystkie regu&#322;y';
	$lang['strnorule'] = 'Nie znaleziono regu&#322;y.';
	$lang['strnorules'] = 'Nie znaleziono regu&#322;.';
	$lang['strcreaterule'] = 'Utw&#243;rz regu&#322;&#281;';
	$lang['strrulename'] = 'Nazwa regu&#322;y';
	$lang['strruleneedsname'] = 'Musisz nazwa&#263; regu&#322;&#281;.';
	$lang['strrulecreated'] = 'Regu&#322;a zosta&#322;a utworzona.';
	$lang['strrulecreatedbad'] = 'Pr&#243;ba utworzenia regu&#322;y si&#281; nie powiod&#322;a.';
	$lang['strconfdroprule'] = 'Czy na pewno chcesz usun&#261;&#263; regu&#322;&#281; &quot;%s&quot; na &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regu&#322;a zosta&#322;a usuni&#281;ta.';
	$lang['strruledroppedbad'] = 'Pr&#243;ba usuni&#281;cia regu&#322;y si&#281; nie powiod&#322;a.';

	// Constraints
	$lang['strconstraint'] = 'Wi&#281;z integralno&#347;ci';
	$lang['strconstraints'] = 'Wi&#281;zy integralno&#347;ci';
	$lang['strshowallconstraints'] = 'Poka&#380; wszystkie wi&#281;zy integralno&#347;ci';
	$lang['strnoconstraints'] = 'Nie znaleziono wi&#281;z&#243;w integralno&#347;ci.';
	$lang['strcreateconstraint'] = 'Utw&#243;rz wi&#281;zy integralno&#347;ci';
	$lang['strconstraintcreated'] = 'Wi&#281;zy integralno&#347;ci zosta&#322;y utworzone.';
	$lang['strconstraintcreatedbad'] = 'Pr&#243;ba utworzenia wi&#281;z&#243;w integralno&#347;ci si&#281; nie powiod&#322;a.';
	$lang['strconfdropconstraint'] = 'Czy na pewno chcesz usun&#261;&#263; wi&#281;zy integralno&#347;ci &quot;%s&quot; na &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Wi&#281;zy integralno&#347;ci zosta&#322;y usuni&#281;te.';
	$lang['strconstraintdroppedbad'] = 'Pr&#243;ba usuni&#281;cia wi&#281;z&#243;w integralno&#347;ci si&#281; nie powiod&#322;a.';
	$lang['straddcheck'] = 'Dodaj warunek';
	$lang['strcheckneedsdefinition'] = 'Musisz zdefiniowa&#263; warunek.';
	$lang['strcheckadded'] = 'Warunek zosta&#322; dodany.';
	$lang['strcheckaddedbad'] = 'Pr&#243;ba dodania warunku si&#281; nie powiod&#322;a.';
	$lang['straddpk'] = 'Dodaj klucz g&#322;&#243;wny';
	$lang['strpkneedscols'] = 'Klucz g&#322;&#243;wny musi zawiera&#263; przynajmniej jedn&#261; kolumn&#281;.';
	$lang['strpkadded'] = 'Klucz g&#322;&#243;wny zosta&#322; dodany.';
	$lang['strpkaddedbad'] = 'Pr&#243;ba dodania klucza g&#322;&#243;wnego si&#281; nie powiod&#322;a.';
	$lang['stradduniq'] = 'Dodaj klucz unikatowy';
	$lang['struniqneedscols'] = 'Klucz unikatowy musi zawiera&#263; przynajmniej jedn&#261; kolumn&#281;.';
	$lang['struniqadded'] = 'Klucz unikatowy zosta&#322; dodany.';
	$lang['struniqaddedbad'] = 'Pr&#243;ba dodania klucza unikatowego si&#281; nie powiod&#322;a.';
	$lang['straddfk'] = 'Dodaj klucz obcy';
	$lang['strfkneedscols'] = 'Obcy klucz musi zawiera&#263; przynajmniej jedn&#261; kolumn&#281;.';
	$lang['strfkneedstarget'] = 'Klucz obcy wymaga podania nazwy tabeli docelowej.';
	$lang['strfkadded'] = 'Klucz obcy zosta&#322; dodany.';
	$lang['strfkaddedbad'] = 'Pr&#243;ba dodania klucza obcego si&#281; nie powiod&#322;a.';
	$lang['strfktarget'] = 'Tabela docelowa';
	$lang['strfkcolumnlist'] = 'Kolumna w kluczu';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Funkcja';
	$lang['strfunctions'] = 'Funkcje';
	$lang['strshowallfunctions'] = 'Poka&#380; wszystkie funkcje';
	$lang['strnofunction'] = 'Nie znaleziono funkcji.';
	$lang['strnofunctions'] = 'Nie znaleziono funkcji.';
	$lang['strcreateplfunction'] = 'Utw&#243;rz funkcj&#281; SQL/PL';
	$lang['strcreateinternalfunction'] = 'Utw&#243;rz funkcj&#281; wewn&#281;trzn&#261;';
	$lang['strcreatecfunction'] = 'Utw&#243;rz funkcj&#281; C';
	$lang['strfunctionname'] = 'Nazwa funkcji';
	$lang['strreturns'] = 'Zwraca';
	$lang['strproglanguage'] = 'J&#281;zyk';
	$lang['strfunctionneedsname'] = 'Musisz nazwa&#263; funkcj&#281;.';
	$lang['strfunctionneedsdef'] = 'Musisz zdefiniowa&#263; funkcj&#281;.';
	$lang['strfunctioncreated'] = 'Funkcja zosta&#322;a utworzona.';
	$lang['strfunctioncreatedbad'] = 'Pr&#243;ba utworzenia funkcji si&#281; nie powiod&#322;a.';
	$lang['strconfdropfunction'] = 'Czy na pewno chcesz usun&#261;&#263; funkcj&#281; &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funkcja zosta&#322;a usuni&#281;ta.';
	$lang['strfunctiondroppedbad'] = 'Pr&#243;ba usuni&#281;cia funkcji si&#281; nie powiod&#322;a.';
	$lang['strfunctionupdated'] = 'Funkcja zosta&#322;a zaktualizowana.';
	$lang['strfunctionupdatedbad'] = 'Pr&#243;ba aktualizacji funkcji si&#281; nie powiod&#322;a.';
  $lang['strobjectfile'] = 'Plik obiekt&#243;w';
  $lang['strlinksymbol'] = '&#321;&#261;cz symbol';
	$lang['strarguments']  =  'Argumenty';
	$lang['strargname']  =  'Nazwa';
	$lang['strargmode']  =  'Tryb';
	$lang['strargtype']  =  'Typ';
	$lang['strargadd']  =  'Dodaj nowy argument';
	$lang['strargremove']  =  'Usu&#324; ten argument';
	$lang['strargnoargs']  =  'Ta funkcja nie b&#281;dzie wymaga&#322;a &#380;adnych argument&#243;w.';
	$lang['strargenableargs']  =  'W&#322;&#261;cz podawanie argument&#243;w tej funkcji.';
	$lang['strargnorowabove']  =  'Nad tym wierszem musi by&#263; wiersz.';
	$lang['strargnorowbelow']  =  'Pod tym wierszem musi by&#263; inny wiersz.';
	$lang['strargraise']  =  'Przesu&#324; w g&#243;r&#281;.';
	$lang['strarglower']  =  'Przesu&#324; w d&#243;&#322;.';
	$lang['strargremoveconfirm']  =  'Czy na pewno chcesz usun&#261;&#263; ten argument? Tej operacji nie b&#281;dzie mo&#380;na cofn&#261;&#263;.';


	// Triggers
	$lang['strtrigger'] = 'Procedura wyzwalana';
	$lang['strtriggers'] = 'Procedury wyzwalane';
	$lang['strshowalltriggers'] = 'Poka&#380; wszystkie procedury wyzwalane';
	$lang['strnotrigger'] = 'Nie znaleziono procedury wyzwalanej.';
	$lang['strnotriggers'] = 'Nie znaleziono procedur wyzwalanych.';
	$lang['strcreatetrigger'] = 'Utw&#243;rz procedur&#281; wyzwalan&#261;';
	$lang['strtriggerneedsname'] = 'Musisz nazwa&#263; procedur&#281; wyzwalan&#261;.';
	$lang['strtriggerneedsfunc'] = 'Musisz poda&#263; funkcj&#281; procedury wyzwalanej.';
	$lang['strtriggercreated'] = 'Procedura wyzwalana zosta&#322;a utworzona.';
	$lang['strtriggercreatedbad'] = 'Pr&#243;ba utworzenia procedury wyzwalanej si&#281; nie powiod&#322;a.';
	$lang['strconfdroptrigger'] = 'Czy na pewno chcesz usun&#261;&#263; procedur&#281; &quot;%s&quot; wyzwalan&#261; przez &quot;%s&quot;?';
	$lang['strconfenabletrigger']  =  'Czy na pewno chcesz w&#322;&#261;czy&#263; procedur&#281; wyzwalan&#261; &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strconfdisabletrigger']  =  'Czy na pewno chcesz wy&#322;&#261;czy&#263; procedur&#281; wyzwalan&#261; &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Procedura wyzwalana zosta&#322;a usuni&#281;ta.';
	$lang['strtriggerdroppedbad'] = 'Pr&#243;ba usuni&#281;cia procedury wyzwalanej si&#281; nie powiod&#322;a.';
	$lang['strtriggerenabled']  =  'Procedura wyzwalana zosta&#322;a w&#322;&#261;czona.';
	$lang['strtriggerenabledbad']  =  'Pr&#243;ba w&#322;&#261;czenia procedury wyzwalanej si&#281; nie powiod&#322;a.';
	$lang['strtriggerdisabled']  =  'Procedura wyzwalana zosta&#322;a wy&#322;&#261;czona.';
	$lang['strtriggerdisabledbad']  =  'Pr&#243;ba wy&#322;&#261;czenia procedury wyzwalanej si&#281; nie powiod&#322;a.';
	$lang['strtriggeraltered'] = 'Procedura wyzwalana zosta&#322;a zmieniona.';
	$lang['strtriggeralteredbad'] = 'Pr&#243;ba modyfikacji procedury wyzwalanej si&#281; nie powiod&#322;a.';
	$lang['strforeach'] = 'Dla wszystkich';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Poka&#380; wszystkie typy';
	$lang['strnotype'] = 'Nie znaleziono typu.';
	$lang['strnotypes'] = 'Nie znaleziono typ&#243;w.';
	$lang['strcreatetype'] = 'Utw&#243;rz typ';
	$lang['strcreatecomptype'] = 'Utw&#243;rz typ z&#322;o&#380;ony';
	$lang['strtypeneedsfield'] = 'Musisz poda&#263; przynajmniej jedno pole.';
	$lang['strtypeneedscols'] = 'Musisz poda&#263; poprawn&#261; ilo&#347;&#263; p&#243;l.';	
	$lang['strtypename'] = 'Nazwa typu';
	$lang['strinputfn'] = 'Funkcja wej&#347;ciowa';
	$lang['stroutputfn'] = 'Funkcja wyj&#347;ciowa';
	$lang['strpassbyval'] = 'Przekazywany przez warto&#347;&#263;?';
	$lang['stralignment'] = 'Wyr&#243;wnanie bajtowe';
	$lang['strelement'] = 'Typ element&#243;w';
	$lang['strdelimiter'] = 'Znak oddzielaj&#261;cy elementy tabeli';
	$lang['strstorage'] = 'Technika przechowywania';
	$lang['strfield'] = 'Pole';
	$lang['strnumfields'] = 'Ilo&#347;&#263; p&#243;l';
	$lang['strtypeneedsname'] = 'Musisz nazwa&#263; typ.';
	$lang['strtypeneedslen'] = 'Musisz poda&#263; d&#322;ugo&#347;&#263; typu.';
	$lang['strtypecreated'] = 'Typ zosta&#322; utworzony.';
	$lang['strtypecreatedbad'] = 'Pr&#243;ba utworzenia typu si&#281; nie powiod&#322;a.';
	$lang['strconfdroptype'] = 'Czy na pewno chcesz usun&#261;&#263; typ &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Typ zosta&#322; usuni&#281;ty.';
	$lang['strtypedroppedbad'] = 'Pr&#243;ba usuni&#281;cia typu si&#281; nie powiod&#322;a.';
  $lang['strflavor'] = 'Flavor';
	$lang['strbasetype'] = 'podstawowy';
	$lang['strcompositetype'] = 'z&#322;o&#380;ony';
	$lang['strpseudotype'] = 'pseudo';

	// Schemas
	$lang['strschema'] = 'Schemat';
	$lang['strschemas'] = 'Schematy';
	$lang['strshowallschemas'] = 'Poka&#380; wszystkie schematy';
	$lang['strnoschema'] = 'Nie znaleziono schematu.';
	$lang['strnoschemas'] = 'Nie znaleziono schemat&#243;w.';
	$lang['strcreateschema'] = 'Utw&#243;rz schemat';
	$lang['strschemaname'] = 'Nazwa schematu';
	$lang['strschemaneedsname'] = 'Musisz nada&#263; schematowi nazw&#281;.';
	$lang['strschemacreated'] = 'Schemat zosta&#322; utworzony.';
	$lang['strschemacreatedbad'] = 'Pr&#243;ba utworzenia schematu si&#281; nie powiod&#322;a.';
	$lang['strconfdropschema'] = 'Czy na pewno chcesz usun&#261;&#263; schemat &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schemat zosta&#322; usuni&#281;ty.';
	$lang['strschemadroppedbad'] = 'Pr&#243;ba usuni&#281;cia schematu si&#281; nie powiod&#322;a.';
	$lang['strschemaaltered'] = 'Schemat zosta&#322; zmieniony.';
	$lang['strschemaalteredbad'] = 'Pr&#243;ba zmiany schematu si&#281; nie powiod&#322;a.';
	$lang['strsearchpath'] = '&#346;cie&#380;ka wyszukiwania schematu';

	// Reports
	$lang['strreport'] = 'Raport';
	$lang['strreports'] = 'Raporty';
	$lang['strshowallreports'] = 'Poka&#380; wszystkie raporty';
	$lang['strnoreports'] = 'Nie znaleziono raport&#243;w.';
	$lang['strcreatereport'] = 'Utw&#243;rz raport';
	$lang['strreportdropped'] = 'Raport zosta&#322; usuni&#281;ty.';
	$lang['strreportdroppedbad'] = 'Pr&#243;ba usuni&#281;cia raportu si&#281; nie powiod&#322;a.';
	$lang['strconfdropreport'] = 'Czy na pewno chcesz usun&#261;&#263; raport &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Musisz nazwa&#263; raport.';
	$lang['strreportneedsdef'] = 'Musisz poda&#263; zapytanie SQL definiuj&#261;ce raport.';
	$lang['strreportcreated'] = 'Raport zosta&#322; utworzony.';
	$lang['strreportcreatedbad'] = 'Pr&#243;ba utworzenia raportu si&#281; nie powiod&#322;a.';

	// Domeny
	$lang['strdomain'] = 'Domena';
	$lang['strdomains'] = 'Domeny';
	$lang['strshowalldomains'] = 'Poka&#380; wszystkie domeny';
	$lang['strnodomains'] = 'Nie znaleziono domen.';
	$lang['strcreatedomain'] = 'Utw&#243;rz domen&#281;';
	$lang['strdomaindropped'] = 'Domena zosta&#322;a usuni&#281;ta.';
	$lang['strdomaindroppedbad'] = 'Pr&#243;ba usuni&#281;cia domeny si&#281; nie powiod&#322;a.';
	$lang['strconfdropdomain'] = 'Czy na pewno chcesz usun&#261;&#263; domen&#281; &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Musisz nazwa&#263; domen&#281;.';
	$lang['strdomaincreated'] = 'Domena zosta&#322;a utworzona.';
	$lang['strdomaincreatedbad'] = 'Pr&#243;ba utworzenia domeny si&#281; nie powiod&#322;a.';
	$lang['strdomainaltered'] = 'Domena zosta&#322;a zmieniona.';
	$lang['strdomainalteredbad'] = 'Pr&#243;ba modyfikacji domeny si&#281; nie powiod&#322;a.';

	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operatory';
	$lang['strshowalloperators'] = 'Poka&#380; wszystkie operatory';
	$lang['strnooperator'] = 'Nie znaleziono operatora.';
	$lang['strnooperators'] = 'Nie znaleziono operator&#243;w.';
	$lang['strcreateoperator'] = 'Utw&#243;rz operator';
	$lang['strleftarg'] = 'Typ lewego argumentu';
	$lang['strrightarg'] = 'Typ prawego argumentu';
	$lang['strcommutator'] = 'Komutator';
	$lang['strnegator'] = 'Negacja';
	$lang['strrestrict'] = 'Zastrze&#380;enie';
	$lang['strjoin'] = 'Po&#322;&#261;czenie';
  $lang['strhashes'] = 'Hashes';
  $lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Lewe sortowanie';
	$lang['strrightsort'] = 'Prawe sortowanie';
	$lang['strlessthan'] = 'Mniej ni&#380;';
	$lang['strgreaterthan'] = 'Wi&#281;cej ni&#380;';
	$lang['stroperatorneedsname'] = 'Musisz nazwa&#263; operator.';
	$lang['stroperatorcreated'] = 'Operator zosta&#322; utworzony.';
	$lang['stroperatorcreatedbad'] = 'Pr&#243;ba utworzenia operatora si&#281; nie powiod&#322;a.';
	$lang['strconfdropoperator'] = 'Czy na pewno chcesz usun&#261;&#263; operator &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operator zosta&#322; usuni&#281;ty.';
	$lang['stroperatordroppedbad'] = 'Pr&#243;ba usuni&#281;cia operatora si&#281; nie powiod&#322;a.';

	// Casts
	$lang['strcasts'] = 'Rzutowania';
	$lang['strnocasts'] = 'Nie znaleziono rzutowa&#324;.';
	$lang['strsourcetype'] = 'Typ &#378;r&#243;d&#322;owy';
	$lang['strtargettype'] = 'Typ docelowy';
	$lang['strimplicit'] = 'Domniemany';
	$lang['strinassignment'] = 'W przydziale';
	$lang['strbinarycompat'] = '(Kompatybilny binarnie)';
	
	// Conversions
	$lang['strconversions'] = 'Konwersje';
	$lang['strnoconversions'] = 'Nie znaleziono konwersji.';
	$lang['strsourceencoding'] = 'Kodowanie &#378;r&#243;d&#322;owe';
	$lang['strtargetencoding'] = 'Kodowanie docelowe';
	
	// Languages
	$lang['strlanguages'] = 'J&#281;zyki';
	$lang['strnolanguages'] = 'Nie znaleziono j&#281;zyk&#243;w.';
	$lang['strtrusted'] = 'Zaufany';
	
	// Info
	$lang['strnoinfo'] = 'Brak informacji na ten temat';
	$lang['strreferringtables'] = 'Tabele zale&#380;ne';
	$lang['strparenttables'] = 'Tabela nadrz&#281;dne';
	$lang['strchildtables'] = 'Tabela podrz&#281;dna';
	
	// Aggregates
	$lang['straggregate']  = 'Funkcja agreguj&#261;ca';
	$lang['straggregates'] = 'Funkcje agreguj&#261;ce';
	$lang['strnoaggregates'] = 'Nie znaleziono funkcji agreguj&#261;cych.';
	$lang['stralltypes'] = '(Wszystkie typy)';
$lang['straggrtransfn']  =  'Transition function';
	$lang['strcreateaggregate']  =  'Utw&#243;rz funkcj&#281; agreguj&#261;c&#261;';
	$lang['straggrbasetype']  =  'Typ danych wej&#347;ciowych';
$lang['straggrsfunc']  =  'State transition function';
$lang['straggrffunc']  =  'Final function';
	$lang['straggrinitcond']  =  'Warunek pocz&#261;tkowy';
	$lang['straggrsortop']  =  'Operator sortowania';
	$lang['strconfdropaggregate']  =  'Czy na pewno chcesz usun&#261;&#263; funkcj&#281; agreguj&#261;c&#261; &quot;%s&quot;?';
	$lang['straggregatedropped']  =  'Funkcja agreguj&#261;ca zosta&#322;a usuni&#281;ta.';
	$lang['straggregatedroppedbad']  =  'Pr&#243;ba usuni&#281;cia funkcji agreguj&#261;cej si&#281; nie powiod&#322;a.';
	$lang['stralteraggregate']  =  'Zmie&#324; funkcj&#281; agreguj&#261;c&#261;';
	$lang['straggraltered']  =  'Funkcja agreguj&#261;ca zosta&#322;a zmieniona.';
	$lang['straggralteredbad']  =  'Pr&#243;ba zmiany funkcji agreguj&#261;cej si&#281; nie powiod&#322;a.';
	$lang['straggrneedsname']  =  'Musisz poda&#263; nazw&#281; funkcji agreguj&#261;cej';
	$lang['straggrneedsbasetype']  =  'Musisz poda&#263; typ danych wej&#347;ciowych funkcji agreguj&#261;cej';
$lang['straggrneedssfunc']  =  'You must specify the name of the state transition function for the aggregate';
$lang['straggrneedsstype']  =  'You must specify the data type for the aggregate\'s state value';
	$lang['straggrcreated']  =  'Funkcja agreguj&#261;ca zosta&#322;a utworzona.';
	$lang['straggrcreatedbad']  =  'Pr&#243;ba utworzenia funkcji agreguj&#261;cej si&#281; nie powiod&#322;a.';
	$lang['straggrshowall']  =  'Poka&#380; wszystkie funkcje agreguj&#261;ce';

	// Operator Classes
	$lang['stropclasses'] = 'Klasy operator&#243;w';
	$lang['strnoopclasses'] = 'Nie znaleziono klas operator&#243;w.';
	$lang['straccessmethod'] = 'Metoda dost&#281;pu';

	// Stats and performance
	$lang['strrowperf'] = 'Wydajno&#347;&#263; wierszowa';
	$lang['strioperf'] = 'Wydajno&#347;&#263; I/O';
	$lang['stridxrowperf'] = 'Wydajno&#347;&#263; indeksu wierszowego';
	$lang['stridxioperf'] = 'Wydajno&#347;&#263; indeksu We/Wy';
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
	$lang['strtablespace'] = 'Przestrze&#324; tabel';
	$lang['strtablespaces'] = 'Przestrzenie tabel';
	$lang['strshowalltablespaces'] = 'Poka&#380; wszystkie przestrzenie tabel';
	$lang['strnotablespaces'] = 'Nie znaleziono przestrzeni tabel.';
	$lang['strcreatetablespace'] = 'Utw&#243;rz przestrze&#324; tabel';
	$lang['strlocation'] = 'Po&#322;o&#380;enie';
	$lang['strtablespaceneedsname'] = 'Musisz poda&#263; nazw&#281; przestrzeni tabel.';
	$lang['strtablespaceneedsloc'] = 'Musisz poda&#263; nazw&#281; katalogu, w kt&#243;rym chcesz utworzy&#263; przestrze&#324; tabel.';
	$lang['strtablespacecreated'] = 'Przestrze&#324; tabel zosta&#322;a utworzona.';
	$lang['strtablespacecreatedbad'] = 'Pr&#243;ba utworzenia przestrzeni tabel si&#281; nie powiod&#322;a.';
	$lang['strconfdroptablespace'] = 'Czy na pewno chcesz usun&#261;&#263; przestrze&#324; tabel &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Przestrze&#324; tabel zosta&#322;a usuni&#281;ta.';
	$lang['strtablespacedroppedbad'] = 'Pr&#243;ba usuni&#281;cia przestrzeni tabel si&#281; nie powiod&#322;a.';
	$lang['strtablespacealtered'] = 'Przestrze&#324; tabel zosta&#322;a zmieniona.';
	$lang['strtablespacealteredbad'] = 'Pr&#243;ba modyfikacji przestrzeni tabel si&#281; nie powiod&#322;a.';

	// Slony clusters
	$lang['strcluster'] = 'Klaster';
	$lang['strnoclusters'] = 'Nie znaleziono klastr&#243;w.';
	$lang['strconfdropcluster'] = 'Czy na pewno chcesz usun&#261;&#263; klaster &quot;%s&quot;?';
	$lang['strclusterdropped'] = 'Klaster zosta&#322; usuni&#281;ty.';
	$lang['strclusterdroppedbad'] = 'Pr&#243;ba usuni&#281;cia klastra si&#281; nie powiod&#322;a.';
	$lang['strinitcluster'] = 'Utw&#243;rz klaster';	
	$lang['strclustercreated'] = 'Klaster zosta&#322; utworzony.';
	$lang['strclustercreatedbad'] = 'Pr&#243;ba utworzenia klastra si&#281; nie powiod&#322;a.';
	$lang['strclusterneedsname'] = 'Musisz poda&#263; nazw&#281; klastra.';
	$lang['strclusterneedsnodeid'] = 'Musisz poda&#263; identyfikator lokalnego w&#281;z&#322;a.';
	
	// Slony nodes
	$lang['strnodes'] = 'W&#281;z&#322;y';
	$lang['strnonodes'] = 'Nie znaleziono w&#281;z&#322;&#243;w.';
	$lang['strcreatenode'] = 'Utw&#243;rz w&#281;ze&#322;';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Aktywny';
	$lang['strnodecreated'] = 'W&#281;ze&#322; zosta&#322; utworzony.';
	$lang['strnodecreatedbad'] = 'Pr&#243;ba utworzenia w&#281;z&#322;a si&#281; nie powiod&#322;a.';
	$lang['strconfdropnode'] = 'Czy na pewno chcesz usun&#261;&#263; w&#281;ze&#322; &quot;%s&quot;?';
	$lang['strnodedropped'] = 'W&#281;ze&#322; zosta&#322; usuni&#281;ty.';
	$lang['strnodedroppedbad'] = 'Pr&#243;ba usuni&#281;cia w&#281;z&#322;a si&#281; nie powiod&#322;a.';
	$lang['strfailover'] = 'Prze&#322;&#261;czenie awaryjne';
	$lang['strnodefailedover'] = 'W&#281;ze&#322; zosta&#322; prze&#322;&#261;czony awaryjnie.';
	$lang['strnodefailedoverbad'] = 'Pr&#243;ba awaryjnego prze&#322;&#261;czenia w&#281;z&#322;a si&#281; nie powiod&#322;a.';
	$lang['strstatus']  =  'Stan';	
	$lang['strhealthy']  =  'Poprawny';
	$lang['stroutofsync']  =  'Niezsynchronizowany';
	$lang['strunknown']  =  'Nieznany';	

	
	// Slony paths	
	$lang['strpaths'] = '&#346;cie&#380;ki';
	$lang['strnopaths'] = 'Nie znaleziono &#347;cie&#380;ek.';
	$lang['strcreatepath'] = 'Utw&#243;rz &#347;cie&#380;k&#281;';
	$lang['strnodename'] = 'Nazwa w&#281;z&#322;a';
	$lang['strnodeid'] = 'Identyfikator w&#281;z&#322;a';
	$lang['strconninfo'] = 'Parametry po&#322;&#261;czenia';
	$lang['strconnretry'] = 'Czas przed pr&#243;b&#261; ponownego po&#322;&#261;czenia';
	$lang['strpathneedsconninfo'] = 'Musisz poda&#263; parametry po&#322;&#261;czenia.';
	$lang['strpathneedsconnretry'] = 'Musisz okre&#347;li&#263; ilo&#347;&#263; sekund, kt&#243;r&#261; nale&#380;y odczeka&#263; przed ponowieniem po&#322;&#261;czenia.';
	$lang['strpathcreated'] = '&#346;cie&#380;ka zosta&#322;a utworzona.';
	$lang['strpathcreatedbad'] = 'Pr&#243;ba utworzenia &#347;cie&#380;ki si&#281; nie powiod&#322;a.';
	$lang['strconfdroppath'] = 'Czy na pewno chcesz usun&#261;&#263; &#347;cie&#380;k&#281; &quot;%s&quot;?';
	$lang['strpathdropped'] = '&#346;cie&#380;ka zosta&#322;a usuni&#281;ta.';
	$lang['strpathdroppedbad'] = 'Pr&#243;ba usuni&#281;cia &#347;cie&#380;ki si&#281; nie powiod&#322;a.';

	// Slony listens
	$lang['strlistens'] = 'Nas&#322;uchy';
	$lang['strnolistens'] = 'Nie znaleziono nas&#322;uch&#243;w.';
	$lang['strcreatelisten'] = 'Utw&#243;rz nas&#322;uch';
	$lang['strlistencreated'] = 'Nas&#322;uch zosta&#322; utworzony.';
	$lang['strlistencreatedbad'] = 'Pr&#243;ba usuni&#281;cia nas&#322;uchu si&#281; nie powiod&#322;a.';
	$lang['strconfdroplisten'] = 'Czy na pewno chcesz usun&#261;&#263; nas&#322;uch &quot;%s&quot;?';
	$lang['strlistendropped'] = 'Nas&#322;uch zosta&#322; usuni&#281;ty.';
	$lang['strlistendroppedbad'] = 'Pr&#243;ba usuni&#281;cia nas&#322;uchu si&#281; nie powiod&#322;a.';

	// Slony replication sets
	$lang['strrepsets'] = 'Zbiory replikacji';
	$lang['strnorepsets'] = 'Nie znaleziono zbior&#243;w replikacji.';
	$lang['strcreaterepset'] = 'Utw&#243;rz zbi&#243;r replikacji';
	$lang['strrepsetcreated'] = 'Zbi&#243;r replikacji zosta&#322; utworzony.';
	$lang['strrepsetcreatedbad'] = 'Pr&#243;ba utworzenia zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strconfdroprepset'] = 'Czy na pewno chcesz usun&#261;&#263; zbi&#243;r replikacji &quot;%s&quot;?';
	$lang['strrepsetdropped'] = 'Zbi&#243;r replikacji zosta&#322; usuni&#281;ty.';
	$lang['strrepsetdroppedbad'] = 'Pr&#243;ba usuni&#281;cia zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strmerge'] = 'Po&#322;&#261;cz';
	$lang['strmergeinto'] = 'Po&#322;&#261;cz w';
	$lang['strrepsetmerged'] = 'Zbiory replikacji zosta&#322;y po&#322;&#261;czone.';
	$lang['strrepsetmergedbad'] = 'Pr&#243;ba po&#322;&#261;czenia zbior&#243;w replikacji si&#281; nie powiod&#322;a.';
	$lang['strmove'] = 'Przenie&#347;';
	$lang['strneworigin'] = 'Nowe po&#322;o&#380;enie';
	$lang['strrepsetmoved'] = 'Zbi&#243;r replikacji zosta&#322; przeniesiony.';
	$lang['strrepsetmovedbad'] = 'Pr&#243;ba przeniesienia zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strnewrepset'] = 'Nowy zbi&#243;r replikacji';
	$lang['strlock'] = 'Zablokuj';
	$lang['strlocked'] = 'Zablokowany';
	$lang['strunlock'] = 'Odblokuj';
	$lang['strconflockrepset'] = 'Czy na pewno chcesz zablokowa&#263; zbi&#243;r replikacji &quot;%s&quot;?';
	$lang['strrepsetlocked'] = 'Zbi&#243;r replikacji zosta&#322; zablokowany.';
	$lang['strrepsetlockedbad'] = 'Pr&#243;ba zablokowania zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strconfunlockrepset'] = 'Czy na pewno chcesz odblokowa&#263; zbi&#243;r replikacji &quot;%s&quot;?';
	$lang['strrepsetunlocked'] = 'Zbi&#243;r replikacji zosta&#322; odblokowany.';
	$lang['strrepsetunlockedbad'] = 'Pr&#243;ba odblokowania zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strexecute'] = 'Wykonaj';
	$lang['stronlyonnode'] = 'Tylko w w&#281;&#378;le';
	$lang['strddlscript'] = 'Skrypt DDL';
	$lang['strscriptneedsbody'] = 'Musisz poda&#263; skrypt, kt&#243;ry nale&#380;y wykona&#263; na wszystkich w&#281;z&#322;ach.';
	$lang['strscriptexecuted'] = 'Skrypt DDL zosta&#322; wykonany w zbiorze replikacji.';
	$lang['strscriptexecutedbad'] = 'Pr&#243;ba wykonania skryptu DDL w zbiorze replikacji si&#281; nie powiod&#322;a.';
	$lang['strtabletriggerstoretain'] = 'Nast&#281;puj&#261;ce wyzwalacze NIE zostan&#261; wy&#322;&#261;czone przez Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Dodaj tabel&#281;';
	$lang['strtableneedsuniquekey'] = 'Dodawana tabela musi mie&#263; klucz g&#322;&#243;wny lub unikatowy.';
	$lang['strtableaddedtorepset'] = 'Tabela zosta&#322;a dodana do zbioru replikacji.';
	$lang['strtableaddedtorepsetbad'] = 'Pr&#243;ba dodania tabeli do zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strconfremovetablefromrepset'] = 'Czy na pewno chcesz usun&#261;&#263; tabel&#281; &quot;%s&quot; ze zbioru replikacji &quot;%s&quot;?';
	$lang['strtableremovedfromrepset'] = 'Tabela zosta&#322;a usuni&#281;ta ze zbioru replikacji.';
	$lang['strtableremovedfromrepsetbad'] = 'Pr&#243;ba usuni&#281;cia tabeli ze zbioru replikacji si&#281; nie powiod&#322;a.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Dodaj sekwencj&#281;';
	$lang['strsequenceaddedtorepset'] = 'Sekwencja zosta&#322;a dodana do zbioru replikacji.';
	$lang['strsequenceaddedtorepsetbad'] = 'Pr&#243;ba dodania sekwencji do zbioru replikacji si&#281; nie powiod&#322;a.';
	$lang['strconfremovesequencefromrepset'] = 'Czy na pewno chcesz usun&#261;&#263; sekwencj&#281; &quot;%s&quot; ze zbioru replikacji &quot;%s&quot;?';
	$lang['strsequenceremovedfromrepset'] = 'Sekwencja zosta&#322;a usuni&#281;ta ze zbioru replikacji.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Pr&#243;ba usuni&#281;cia sekwencji ze zbioru replikacji si&#281; nie powiod&#322;a.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Subskrypcje';
	$lang['strnosubscriptions'] = 'Nie znaleziono subskrypcji.';

	// Miscellaneous
	$lang['strtopbar'] = '%s uruchomiony na %s:%s -- Jeste&#347; zalogowany jako &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Pomoc';
	$lang['strhelpicon'] = '?';
	$lang['strlogintitle'] = 'Zaloguj do %s';
	$lang['strlogoutmsg'] = 'Wylogowano z %s';
	$lang['strloading'] = '&#321;aduj&#281;...';
	$lang['strerrorloading'] = 'B&#322;&#261;d &#322;adowania';
	$lang['strclicktoreload'] = 'Kliknij aby od&#347;wie&#380;y&#263;';

	//Autovacuum
	$lang['strautovacuum'] = 'Czyszczenie automatyczne'; 
	$lang['strturnedon']  =  'W&#322;&#261;czone'; 
	$lang['strturnedoff']  =  'Wy&#322;&#261;czone'; 
	$lang['strenabled'] = 'Aktywne'; 
	$lang['strvacuumbasethreshold'] = 'Podstawowy pr&#243;g czyszczenia'; 
	$lang['strvacuumscalefactor'] = 'Wsp&#243;&#322;czynnik czyszczenia'; 
	$lang['stranalybasethreshold'] = 'Podstawowy pr&#243;g analizy'; 
	$lang['stranalyzescalefactor'] = 'Wsp&#243;&#322;czynnik analizy'; 
	$lang['strvacuumcostdelay'] = 'Op&#243;&#378;nienie po przekroczeniu kosztu czyszczenia'; 
	$lang['strvacuumcostlimit'] = 'Limit kosztu czyszczenia'; 

        //Table-level Locks
	$lang['strlocks']  =  'Blokady';
	$lang['strtransaction']  =  'ID transakcji';
	$lang['strprocessid']  =  'ID procesu';
	$lang['strmode']  =  'Tryb blokowania';
	$lang['strislockheld']  =  'Czy blokada obowi&#261;zuje?';

	// Prepared transactions
	$lang['strpreparedxacts']  =  'Przygotowane transakcje';
	$lang['strxactid']  =  'ID transakcji';
	$lang['strgid']  =  'Globalny ID';
?>
