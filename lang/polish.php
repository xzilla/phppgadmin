<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.33 2003/12/15 19:56:22 slubek Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Polski';
	$lang['appcharset'] = 'ISO-8859-2';
	$lang['applocale'] = 'pl_PL';
  	$lang['appdbencoding'] = 'LATIN2';
  
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
	$lang['straggregates'] = 'Funkcje agreguj±ce';
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
	$lang['strcluster'] = 'Klaster';
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
	$lang['strexpand'] = 'Rozwiñ';
	$lang['strcollapse'] = 'Zwiñ';
	$lang['strexplain'] = 'Explain';
	$lang['strfind'] = 'Znajd¼';
	$lang['stroptions'] = 'Opcje';
	$lang['strrefresh'] = 'Od¶wie¿';
	$lang['strdownload'] = 'Pobierz';
	$lang['strinfo'] = 'Informacje';
	$lang['stroids'] = 'OIDy';
	$lang['stradvanced'] = 'Zaawansowane';
	$lang['strvariables'] = 'Zmienne';
	$lang['strprocess'] = 'Proces';
	$lang['strprocesses'] = 'Procesy';
	$lang['strsetting'] = 'Ustawienie';

	// Error handling
	$lang['strnoframes'] = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$lang['strbadconfig'] = 'Twój plik config.inc.php jest przestarza³y. Musisz go utworzyæ ponownie wykorzystuj±c nowy config.inc.php-dist.';
	$lang['strnotloaded'] = 'Nie wkompilowa³e¶ do PHP obs³ugi tej bazy danych.';
	$lang['strbadschema'] = 'Podano b³êdny schemat.';
	$lang['strbadencoding'] = 'B³êdne kodowanie bazy.';
	$lang['strsqlerror'] = 'B³±d SQL:';
	$lang['strinstatement'] = 'W poleceniu:';
	$lang['strinvalidparam'] = 'B³êdny parametr.';
	$lang['strnodata'] = 'Nie znaleziono danych.';
	$lang['strnoobjects'] = 'Nie znaleziono obiektów.';
	$lang['strrownotunique'] = 'Brak unikatowego identyfikatora dla tego wiersza.';
	$lang['strnoreportsdb'] = 'Nie utworzy³e¶ bazy raportów. Instrukcjê znajdziesz w pliku INSTALL.';

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabele';
	$lang['strshowalltables'] = 'Poka¿ wszystkie tabele';
	$lang['strnotable'] = 'Nie znaleziono tabeli.';
	$lang['strnotables'] = 'Nie znaleziono tabeli.';
	$lang['strcreatetable'] = 'Utwórz tabelê';
	$lang['strtablename'] = 'Nazwa tabeli';
	$lang['strtableneedsname'] = 'Musisz nazwaæ tabelê.';
	$lang['strtableneedsfield'] = 'Musisz podaæ przynajmniej jedno pole.';
	$lang['strtableneedscols'] = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$lang['strtablecreated'] = 'Utworzono tabelê.';
	$lang['strtablecreatedbad'] = 'Próba utworzenia tabeli siê nie powiod³a.';
	$lang['strconfdroptable'] = 'Czy na pewno chcesz usun±æ tabelê "%s"?';
	$lang['strtabledropped'] = 'Tabela usuniêta.';
	$lang['strtabledroppedbad'] = 'Próba usuniêcia tabeli siê nie powiod³a.';
	$lang['strconfemptytable'] = 'Czy na pewno chcesz wyczy¶ciæ tabelê "%s"?';
	$lang['strtableemptied'] = 'Tabela wyczyszczona.';
	$lang['strtableemptiedbad'] = 'Próba wyczyszczenia tabeli siê nie powiod³a.';
	$lang['strinsertrow'] = 'Wstaw wiersz';
	$lang['strrowinserted'] = 'Wiersz wstawiony.';
	$lang['strrowinsertedbad'] = 'Próba wstawienia wiersza siê nie powiod³a.';
	$lang['streditrow'] = 'Edycja wiersza';
	$lang['strrowupdated'] = 'Wiersz zaktualizowany.';
	$lang['strrowupdatedbad'] = 'Próba aktualizacji wiersza siê nie powiod³a.';
	$lang['strdeleterow'] = 'Usuñ wiersz';
	$lang['strconfdeleterow'] = 'Czy na pewno chcesz usun±æ ten wiersz?';
	$lang['strrowdeleted'] = 'Wiersz usuniêty.';
	$lang['strrowdeletedbad'] = 'Próba usuniêcia wiersza siê nie powiod³a.';
	$lang['strsaveandrepeat'] = 'Zapisz i powtórz';
	$lang['strfield'] = 'Pole';
	$lang['strfields'] = 'Pola';
	$lang['strnumfields'] = 'Ilo¶æ pól';
	$lang['strfieldneedsname'] = 'Musisz nazwaæ pole';
	$lang['strselectallfields'] = 'Wybierz wszystkie pola';
        $lang['strselectneedscol'] = 'Musisz wybraæ przynajmniej jedn± kolumnê';
	$lang['strselectunary'] = 'Operatory bezargumentowe (IS NULL/IS NOT NULL) nie mog± mieæ podanej warto¶ci';
	$lang['straltercolumn'] = 'Zmieñ kolumnê';
	$lang['strcolumnaltered'] = 'Kolumna zmodyfikowana.';
	$lang['strcolumnalteredbad'] = 'Próba modyfikacji kolumny siê nie powiod³a.';
	$lang['strconfdropcolumn'] = 'Czy na pewno chcesz usun±æ kolumnê "%s" z tabeli "%s"?';
	$lang['strcolumndropped'] = 'Kolumna usuniêta.';
	$lang['strcolumndroppedbad'] = 'Próba usuniêcia kolumny siê nie powiod³a.';
        $lang['straddcolumn'] = 'Dodaj kolumnê';
	$lang['strcolumnadded'] = 'Kolumna dodana.';
	$lang['strcolumnaddedbad'] = 'Próba dodania kolumny siê nie powiod³a.';
	$lang['strdataonly'] = 'Tylko dane';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabela zmodyfikowana.';
	$lang['strtablealteredbad'] = 'Próba modyfikacji tabeli siê nie powiod³a.';
	$lang['strdataonly'] = 'Tylko dane';
	$lang['strstructureonly'] = 'Tylko struktura';
	$lang['strstructureanddata'] = 'Struktura i dane';
			
	// Users
	$lang['struser'] = 'U¿ytkownik';
	$lang['strusers'] = 'U¿ytkownicy';
	$lang['strusername'] = 'Nazwa u¿ytkownika';
	$lang['strpassword'] = 'Has³o';
	$lang['strsuper'] = 'Administrator?';
	$lang['strcreatedb'] = 'Tworzenie BD?';
	$lang['strexpires'] = 'Wygasa';	
	$lang['strnousers'] = 'Nie znaleziono u¿ytkowników.';
	$lang['struserupdated'] = 'Parametry u¿ytkownika zaktualizowane.';
	$lang['struserupdatedbad'] = 'Próba aktualizacji parametrów u¿ytkownika siê nie powiod³a.';
        $lang['strshowallusers'] = 'Poka¿ wszystkich u¿ytkowników';
	$lang['strcreateuser'] = 'Utwórz u¿ytkownika';
	$lang['struserneedsname'] = 'Musisz podaæ nazwê u¿ytkownika.';
	$lang['strusercreated'] = 'U¿ytkownik utworzony.';
	$lang['strusercreatedbad'] = 'Próba utworzenia u¿ytkownika siê nie powiod³a.';
	$lang['strconfdropuser'] = 'Czy na pewno chcesz usun±æ u¿ytkownika "%s"?';
	$lang['struserdropped'] = 'U¿ytkownik usuniêty.';
	$lang['struserdroppedbad'] = 'Próba usuniêcia u¿ytkownika siê nie powiod³a.';
	$lang['straccount'] = 'Konto';
	$lang['strchangepassword'] = 'Zmieñ has³o';
	$lang['strpasswordchanged'] = 'Has³o zmienione.';
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
	$lang['strgroupcreated'] = 'Grupa utworzona.';
	$lang['strgroupcreatedbad'] = 'Próba utworzenia grupy siê nie powiod³a.';
	$lang['strconfdropgroup'] = 'Czy na pewno chcesz utworzyæ grupê "%s"?';
	$lang['strgroupdropped'] = 'Grupa usuniêta.';
	$lang['strgroupdroppedbad'] = 'Próba usuniêcia grupy siê nie powiod³a.';
	$lang['strmembers'] = 'Cz³onkowie';
	$lang['straddmember'] = 'Dodaj cz³onka grupy';
	$lang['strmemberadded'] = 'Cz³onek grupy dodany.';
	$lang['strmemberaddedbad'] = 'Próba dodania cz³onka grupy siê nie powiod³a.';
	$lang['strdropmember'] = 'Usuñ cz³onka grupy';
	$lang['strconfdropmember'] = 'Czy na pewno chcesz usun±æ "%s" z grupy "%s"?';
	$lang['strmemberdroppedbad'] = 'Próba usuniêcia cz³onka grupy siê nie powiod³a.';
	$lang['strmemberdropped'] = 'Cz³onek grupy usuniêty.';

	// Privileges
	$lang['strprivilege'] = 'Uprawnienie';
	$lang['strprivileges'] = 'Uprawnienia';
	$lang['strnoprivileges'] = 'Ten obiekt nie ma uprawnieñ.';
	$lang['strgrant'] = 'Nadaj';
	$lang['strrevoke'] = 'Zabierz';
	$lang['strgranted'] = 'Uprawnienia nadane.';
	$lang['strgrantfailed'] = 'Próba nadania uprawnieñ siê nie powiod³a.';
	$lang['strgrantbad'] = 'Musisz podaæ u¿ytkownika lub grupê, a tak¿e uprawnienia, jakie chcesz nadaæ.';
	$lang['stralterprivs'] = 'Zmieñ uprawnienia';
	$lang['strgrantor'] = 'Grantor';
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
	$lang['strdatabasecreated'] = 'Baza danych utworzona.';
	$lang['strdatabasecreatedbad'] = 'Próba utworzenia bazy danych siê nie powiod³a.';
	$lang['strconfdropdatabase'] = 'Czy na pewno chcesz usun±æ bazê danych "%s"?';
	$lang['strdatabasedropped'] = 'Baza danych usuniêta.';
	$lang['strdatabasedroppedbad'] = 'Próba usuniêcia bazy danych siê nie powiod³a.';
	$lang['strentersql'] = 'Podaj polecenie SQL do wykonania:';
	$lang['strsqlexecuted'] = 'Wykonano polecenie SQL.';
	$lang['strvacuumgood'] = 'Czyszczenie bazy zakoñczone.';
	$lang['strvacuumbad'] = 'Próba czyszczenia bazy siê nie powiod³a.';
	$lang['stranalyzegood'] = 'Analiza bazy zakoñczona.';
	$lang['stranalyzebad'] = 'Próba analizy siê nie powiod³a.';

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
	$lang['strviewcreated'] = 'Widok utworzony.';
	$lang['strviewcreatedbad'] = 'Próba utworzenia widoku siê nie powiod³a.';
	$lang['strconfdropview'] = 'Czy na pewno chcesz usun±æ widok "%s"?';
	$lang['strviewdropped'] = 'Widok usuniêty.';
	$lang['strviewdroppedbad'] = 'Próba usuniêcia widoku siê nie powiod³a.';
	$lang['strviewupdated'] = 'Widok zaktualizowany.';
	$lang['strviewupdatedbad'] = 'Próba aktualizacji widoku siê nie powiod³a.';

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
	$lang['strsequencecreated'] = 'Utworzono sekwencjê';
	$lang['strsequencecreatedbad'] = 'Próba utworzenia sekwencji siê nie powiod³a.';
	$lang['strconfdropsequence'] = 'Czy na pewno chcesz usun±æ sekwencjê "%s"?';
	$lang['strsequencedropped'] = 'Sekwencja usuniêta.';
	$lang['strsequencedroppedbad'] = 'Próba usuniêcia sekwencji siê nie powiod³a.';
	$lang['strsequencereset'] = 'Sekwencja zresetowana.';
	$lang['strsequenceresetbad'] = 'Próba zresetowania sekwencji siê nie powiod³a.';
						
	// Indeksy
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
	$lang['strindexcreated'] = 'Indeks utworzony';
	$lang['strindexcreatedbad'] = 'Próba utworzenia indeksu siê nie powiod³a.';
	$lang['strconfdropindex'] = 'Czy na pewno chcesz usun±æ indeks "%s"?';
	$lang['strindexdropped'] = 'Indeks usuniêty.';
	$lang['strindexdroppedbad'] = 'Próba usuniêcia indeksu siê nie powiod³a.';
	$lang['strkeyname'] = 'Nazwa klucza';
	$lang['struniquekey'] = 'Klucz Unikatowy';
	$lang['strprimarykey'] = 'Klucz G³ówny';
	$lang['strindextype'] = 'Typ indeksu';
	$lang['strtablecolumnlist'] = 'Kolumny w tabeli';
	$lang['strindexcolumnlist'] = 'Kolumny w indeksie';
	$lang['strconfcluster'] = 'Czy na pewno chcesz zklastrowaæ "%s"?';
	$lang['strclusteredgood'] = 'Klastrowanie zakoñczone.';
	$lang['strclusteredbad'] = 'Próba klastrowania siê nie powiod³a.';
	
	// Regu³y
	$lang['strrule'] = 'Regu³a';
	$lang['strrules'] = 'Regu³y';
	$lang['strshowallrules'] = 'Poka¿ wszystkie regu³y';
	$lang['strnorule'] = 'Nie znaleziono regu³y.';
	$lang['strnorules'] = 'Nie znaleziono regu³.';
	$lang['strcreaterule'] = 'Utwórz regu³ê';
	$lang['strrulename'] = 'Nazwa regu³y';
	$lang['strruleneedsname'] = 'Musisz nazwaæ regu³ê.';
	$lang['strrulecreated'] = 'Utworzono regu³ê.';
	$lang['strrulecreatedbad'] = 'Próba utworzenia regu³y siê nie powiod³a.';
	$lang['strconfdroprule'] = 'Czy na pewno chcesz usun±æ regu³ê "%s" na "%s"?';
	$lang['strruledropped'] = 'Regu³a usuniêta.';
	$lang['strruledroppedbad'] = 'Próba usuniêcia regu³y siê nie powiod³a.';
	
	// Wiêzy integralno¶ci
	$lang['strconstraints'] = 'Wiêzy integralno¶ci';
	$lang['strshowallconstraints'] = 'Poka¿ wszystkie wiêzy integralno¶ci';
	$lang['strnoconstraints'] = 'Nie znaleziono wiêzów integralno¶ci.';
	$lang['strcreateconstraint'] = 'Utwórz wiêzy integralno¶ci';
	$lang['strconstraintcreated'] = 'Utworzono wiêzy integralno¶ci.';
	$lang['strconstraintcreatedbad'] = 'Próba utworzenia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['strconfdropconstraint'] = 'Czy na pewno chcesz usun±æ wiêzy integralno¶ci "%s" na "%s"?';
	$lang['strconstraintdropped'] = 'Wiêzy integralno¶ci usuniête.';
	$lang['strconstraintdroppedbad'] = 'Próba usuniêcia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['straddcheck'] = 'Dodaj warunek';
        $lang['strcheckneedsdefinition'] = 'Musisz zdefiniowaæ warunek.';
	$lang['strcheckadded'] = 'Dodano warunek.';
	$lang['strcheckaddedbad'] = 'peracja dodania warunku siê nie powiod³a.';
	$lang['straddpk'] = 'Dodaj klucz g³ówny';
	$lang['strpkneedscols'] = 'Klucz g³ówny musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strpkadded'] = 'Dodano klucz g³ówny.';
	$lang['strpkaddedbad'] = 'Próba dodania klucza g³ównego siê nie powiod³a.';
	$lang['stradduniq'] = 'Dodaj klucz unikatowy';
	$lang['struniqneedscols'] = 'Klucz unikatowy musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['struniqadded'] = 'Dodano klucz unikatowy.';
	$lang['struniqaddedbad'] = 'Próba dodania klucza unikatowego siê nie powiod³a.';
        $lang['straddfk'] = 'Dodaj klucz obcy';
	$lang['strfkneedscols'] = 'Obcy klucz musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strfkneedstarget'] = 'Klucz obcy wymaga podania nazwy tabeli docelowej.';
	$lang['strfkadded'] = 'Dodano klucz obcy.';
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
	$lang['strcreatefunction'] = 'Utwórz funkcjê';
	$lang['strfunctionname'] = 'Nazwa funkcji';
	$lang['strreturns'] = 'Zwraca';
	$lang['strarguments'] = 'Parametry';
	$lang['strproglanguage'] = 'Jêzyk';
	$lang['strfunctionneedsname'] = 'Musisz nazwaæ funkcjê.';
	$lang['strfunctionneedsdef'] = 'Musisz zdefiniowaæ funkcjê.';
	$lang['strfunctioncreated'] = 'Utworzono funkcjê.';
	$lang['strfunctioncreatedbad'] = 'Próba utworzenia funkcji siê nie powiod³a';
        $lang['strconfdropfunction'] = 'Czy na pewno chcesz usun±æ funkcjê "%s"?';
	$lang['strfunctiondropped'] = 'Funkcja usuniêta.';
	$lang['strfunctiondroppedbad'] = 'Próba usuniêcia funkcji siê nie powiod³a.';
	$lang['strfunctionupdated'] = 'Funkcja zaktualizowana.';
	$lang['strfunctionupdatedbad'] = 'Próba aktualizacji funkcji siê nie powiod³a.';

	// Triggers
	$lang['strtrigger'] = 'Procedura wyzwalana';
	$lang['strtriggers'] = 'Procedury wyzwalane';
	$lang['strshowalltriggers'] = 'Poka¿ wszystkie procedury wyzwalane';
	$lang['strnotrigger'] = 'Nie znaleziono procedury wyzwalanej.';
	$lang['strnotriggers'] = 'Nie znaleziono procedur wyzwalanych.';
	$lang['strcreatetrigger'] = 'Utwórz procedurê wyzwalan±';
	$lang['strtriggerneedsname'] = 'Musisz nazwaæ procedurê wyzwalan±';
	$lang['strtriggerneedsfunc'] = 'Musisz podac funkcje swojego tragarza.';
	$lang['strtriggercreated'] = 'Utworzono procedurê wyzwalan±.';
	$lang['strtriggercreatedbad'] = 'Próba utworzenia procedury wyzwalanej siê nie powiod³a';
        $lang['strconfdroptrigger'] = 'Czy na pewno chcesz usun±æ procedurê "%s" wyzwalan± przez "%s"?';
	$lang['strtriggerdropped'] = 'Procedura wyzwalana usuniêta.';
	$lang['strtriggerdroppedbad'] = 'Próba usuniêcia procedury wyzwalanej siê nie powiod³a.';
	$lang['strtriggeraltered'] = 'Procedura wyzwalana zmieniona.';
	$lang['strtriggeralteredbad'] = 'Próba modyfikacji procedury wyzwalanej siê nie powiod³a.';
		
	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Poka¿ wszystkie typy';
	$lang['strnotype'] = 'Nie znaleziono typu.';
	$lang['strnotypes'] = 'Nie znaleziono typów.';
	$lang['strcreatetype'] = 'Utwórz typ';
	$lang['strtypename'] = 'Nazwa typu';
	$lang['strinputfn'] = 'Funkcja wej¶ciowa';
	$lang['stroutputfn'] = 'Funkcja wyj¶ciowa';
	$lang['strpassbyval'] = 'Przekazywany przez warto¶æ?';
	$lang['stralignment'] = 'Wyrównanie bajtowe';
	$lang['strelement'] = 'Typ elementów';
	$lang['strdelimiter'] = 'Znak oddzielaj±cy elementy tabeli';
	$lang['strstorage'] = 'Technika przechowywania';
	$lang['strtypeneedsname'] = 'Musisz nazwaæ typ.';
	$lang['strtypeneedslen'] = 'Musisz podaæ d³ugo¶æ typu.';
	$lang['strtypecreated'] = 'Typ utworzony';
	$lang['strtypecreatedbad'] = 'Próba utworzenia typu siê nie powiod³a.';
	$lang['strconfdroptype'] = 'Czy na pewno chcesz usun±æ typ "%s"?';
	$lang['strtypedropped'] = 'Typ usuniêty.';
	$lang['strtypedroppedbad'] = 'Próba usuniêcia typu siê nie powiod³a.';

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
	$lang['strschemadropped'] = 'Schemat usuniêty.';
	$lang['strschemadroppedbad'] = 'Próba usuniêcia schematu siê nie powiod³a.';

	// Reports
	$lang['strreport'] = 'Raport';
	$lang['strreports'] = 'Raporty';
	$lang['strshowallreports'] = 'Poka¿ wszystkie raporty';
	$lang['strnoreports'] = 'Nie znaleziono raportów.';
	$lang['strcreatereport'] = 'Utwórz raport';
	$lang['strreportdropped'] = 'Raport usuniêty.';
	$lang['strreportdroppedbad'] = 'Próba usuniêcia raportu siê nie powiod³a.';
	$lang['strconfdropreport'] = 'Czy na pewno chcesz usun±æ raport "%s"?';
        $lang['strreportneedsname'] = 'Musisz nazwaæ raport.';
	$lang['strreportneedsdef'] = 'Musisz podaæ zapytanie SQL definiuj±ce raport.';
	$lang['strreportcreated'] = 'Raport utworzony.';
	$lang['strreportcreatedbad'] = 'Próba utworzenia raportu siê nie powiod³a.';

	// Domeny
	$lang['strdomain'] = 'Domena';
	$lang['strdomains'] = 'Domeny';
	$lang['strshowalldomains'] = 'Pokar¿ wszystkie domeny';
	$lang['strnodomains'] = 'Nie znaleziono domen.';
	$lang['strcreatedomain'] = 'Utwórz domenê';
	$lang['strdomaindropped'] = 'Domena usuniêta.';
	$lang['strdomaindroppedbad'] = 'Próba usuniêcia domeny siê nie powiod³a.';
	$lang['strconfdropdomain'] = 'Czy na pewno chcesz usun±æ domenê "%s"?';
	$lang['strdomainneedsname'] = 'Musisz nazwaæ domenê.';
	$lang['strdomaincreated'] = 'Domena utworzona.';
	$lang['strdomaincreatedbad'] = 'Próba utworzenia domeny siê nie powiod³a.';
	$lang['strdomainaltered'] = 'Domena zmieniona.';
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
	$lang['stroperatorcreated'] = 'Operator utworzony.';
	$lang['stroperatorcreatedbad'] = 'Próba utworzenia operatora siê nie powiod³a.';
	$lang['strconfdropoperator'] = 'Czy na pewno chcesz usun±æ operator "%s"?';
	$lang['stroperatordropped'] = 'Operator usuniêty.';
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
	
	// Miscellaneous
	$lang['strtopbar'] = '%s uruchomiony na %s:%s -- Jeste¶ zalogowany jako "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Pomoc';

?>
