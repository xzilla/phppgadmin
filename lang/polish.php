<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.21 2003/05/20 22:51:04 slubek Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Polski';
	$lang['appcharset'] = 'ISO-8859-2';
	$lang['applocale'] = 'pl_PL';
  
  	// Welcome
	$lang['strintro'] = 'Witaj w phpPgAdmin.';
	$lang['strppahome'] = 'Strona domowa phpPgAdmin';
	$lang['strpgsqlhome'] = 'Strona domowa PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strreportbug'] = 'Zg³o¶ raport o b³êdzie';
	$lang['strviewfaq'] = 'Przejrzyj FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Zaloguj';
	$lang['strloginfailed'] = 'Próba zalogowania nie powiod³a siê';
	$lang['strserver'] = 'Serwer';
	$lang['strlogout'] = 'Wyloguj siê';
	$lang['strowner'] = 'W³a¶ciciel';
	$lang['straction'] = 'Akcja';	
	$lang['stractions'] = 'Akcje';	
	$lang['strname'] = 'Nazwa';
	$lang['strdefinition'] = 'Definicja';
	$lang['stroperators'] = 'Operatory';
	$lang['straggregates'] = 'Funkcje agreguj±ce';
	$lang['strproperties'] = 'W³a¶ciwo¶ci';
	$lang['strbrowse'] = 'Przegl±daj';
	$lang['strdrop'] = 'Usuñ';
	$lang['strdropped'] = 'Usuniêty';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Poprzedni';
	$lang['strnext'] = 'Nastêpny';
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
	$lang['stredit'] = 'Edycja';
	$lang['strcolumns'] = 'Kolumny';
	$lang['strrows'] = 'wiersz(y)';
	$lang['strrowsaff'] = 'wiersz(y) dotyczy.';
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
	$lang['strreindex'] = 'Przeindeksuj';
	$lang['strrun'] = 'Uruchom';
	$lang['stradd'] = 'Dodaj';
        $lang['strevent'] = 'Zdarzenie';
	$lang['strwhere'] = 'Gdzie';
	$lang['strinstead'] = 'Wykonaj zamiast';
	$lang['strdata'] = 'Dane';
	$lang['strconfirm'] = 'Potwierd¼';
	$lang['strwhen'] = 'Kiedy';
	$lang['strformat'] = 'Format';
	$lang['strexpression'] = 'Wyra¿enie';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = 'Rozwiñ';
	$lang['strcollapse'] = 'Zwiñ';
					
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

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabele';
	$lang['strshowalltables'] = 'Poka¿ wszystkie tabele';
	$lang['strnotable'] = 'Nie znaleziono tablicy.';
	$lang['strnotables'] = 'Nie znaleziono tablic.';
	$lang['strcreatetable'] = 'Utwórz tabelê';
	$lang['strtablename'] = 'Nazwa tabeli';
	$lang['strtableneedsname'] = 'Musisz nazwaæ tabelê.';
	$lang['strtableneedsfield'] = 'Musisz podaæ przynajmniej jedno pole.';
	$lang['strtableneedscols'] = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$lang['strtablecreated'] = 'Utworzono tabelê.';
	$lang['strtablecreatedbad'] = 'Operacja utworzenia tabeli siê nie powiod³a.';
	$lang['strconfdroptable'] = 'Czy na pewno chcesz usun±æ tablicê "%s"?';
	$lang['strtabledropped'] = 'Tablica usuniêta.';
	$lang['strtabledroppedbad'] = 'Operacja usuniêcia tablicy siê nie powiod³a.';
	$lang['strconfemptytable'] = 'Czy na pewno chcesz wyczy¶ciæ tablicê "%s"?';
	$lang['strtableemptied'] = 'Tablica wyczyszczona.';
	$lang['strtableemptiedbad'] = 'Operacja wyczyszczenia tablicy siê nie powiod³a.';
	$lang['strinsertrow'] = 'Wstaw wiersz';
	$lang['strrowinserted'] = 'Wiersz wstawiony.';
	$lang['strrowinsertedbad'] = 'Operacja wstawienia wiersza siê nie powiod³a.';
	$lang['streditrow'] = 'Edycja wiersza';
	$lang['strrowupdated'] = 'Wiersz zaktualizowany.';
	$lang['strrowupdatedbad'] = 'Operacja aktalizacji wiersza siê nie powiod³a.';
	$lang['strdeleterow'] = 'Usuñ wiersz';
	$lang['strconfdeleterow'] = 'Czy na pewno chcesz usun±æ ten wiersz?';
	$lang['strrowdeleted'] = 'Wiersz usuniêty.';
	$lang['strrowdeletedbad'] = 'Operacja usuniêcia wiersza siê nie powiod³a.';
	$lang['strsaveandrepeat'] = 'Zapisz i powtórz';
	$lang['strfield'] = 'Pole';
	$lang['strfields'] = 'Pola';
	$lang['strnumfields'] = 'Ilo¶æ pól';
	$lang['strfieldneedsname'] = 'Musisz nazwaæ pole';
        $lang['strselectneedscol'] = 'Musisz wybraæ przynajmniej jedn± kolumnê';
	$lang['straltercolumn'] = 'Zmieñ kolumnê';
	$lang['strcolumnaltered'] = 'Kolumna zmodyfikowana.';
	$lang['strcolumnalteredbad'] = 'Operacja modyfikacji kolumny siê nie powiod³a.';
	$lang['strconfdropcolumn'] = 'Czy na pewno chcesz usun±æ kolumnê "%s" z tablicy "%s"?';
	$lang['strcolumndropped'] = 'Kolumna usuniêta.';
	$lang['strcolumndroppedbad'] = 'Operacja usuniêcia kolumny siê nie powiod³a.';
        $lang['straddcolumn'] = 'Dodaj kolumnê';
	$lang['strcolumnadded'] = 'Kolumna dodana.';
	$lang['strcolumnaddedbad'] = 'Operacja dodania kolumny siê nie powiod³a.';
        $lang['strschemaanddata'] = 'Schemat i Dane';
	$lang['strschemaonly'] = 'Tylko schemat';
	$lang['strdataonly'] = 'Tylko dane';
	$lang['strcascade'] = 'CASCADE';
			
	// Users
	$lang['struseradmin'] = 'Administracja kontami u¿ytkowników';
	$lang['struser'] = 'U¿ytkownik';
	$lang['strusers'] = 'U¿ytkownicy';
	$lang['strusername'] = 'Nazwa u¿ytkownika';
	$lang['strpassword'] = 'Has³o';
	$lang['strsuper'] = 'Administrator?';
	$lang['strcreatedb'] = 'Tworzenie BD?';
	$lang['strexpires'] = 'Wygasa';	
	$lang['strnousers'] = 'Nie znaleziono u¿ytkowników.';
	$lang['struserupdated'] = 'Parametry u¿ytkownika zaktualizowane.';
	$lang['struserupdatedbad'] = 'Operacja aktualizacji parametrów u¿ytkownika siê nie powiod³a.';
        $lang['strshowallusers'] = 'Poka¿ wszystkich u¿ytkowników';
	$lang['strcreateuser'] = 'Utwórz u¿ytkownika';
	$lang['strusercreated'] = 'U¿ytkownik utworzony.';
	$lang['strusercreatedbad'] = 'Operacja utworzenia u¿ytkownika siê nie powiod³a.';
	$lang['strconfdropuser'] = 'Czy na pewno chcesz usun±æ u¿ytkownika "%s"?';
	$lang['struserdropped'] = 'U¿ytkownik usuniêty.';
	$lang['struserdroppedbad'] = 'Operacja usuniêcia u¿ytkownika siê nie powiod³a.';
	$lang['straccount'] = 'Konto';
	$lang['strchangepassword'] = 'Zmieñ has³o';
	$lang['strpasswordchanged'] = 'Has³o zmienione.';
	$lang['strpasswordchangedbad'] = 'Operacja zmiany has³a siê nie powiod³a.';
	$lang['strpasswordshort'] = 'Has³o jest za krótkie.';
	$lang['strpasswordconfirm'] = 'Has³o i potwierdzenie musz± byæ takie same.';
							
	// Groups
	$lang['strgroupadmin'] = 'Administracja grupami u¿ytkowników';
	$lang['strgroup'] = 'Grupa';
	$lang['strgroups'] = 'Grupy';
	$lang['strshowallgroups'] = 'Poka¿ wszystkie grupy';
	$lang['strnogroup'] = 'Nie znaleziono grupy.';
	$lang['strnogroups'] = 'Nie znaleziono grup.';
	$lang['strcreategroup'] = 'Utwórz grupê';
	$lang['strgroupneedsname'] = 'Musisz nazwaæ grupê.';
	$lang['strgroupcreated'] = 'Grupa utworzona.';
	$lang['strgroupcreatedbad'] = 'Próba utworzenia grupy siê nie powiod³a.';
	$lang['strconfdropgroup'] = 'Czy na pewno chcesz utworzyæ grupê "%s"?';
	$lang['strgroupdropped'] = 'Grupa usuniêta.';
	$lang['strgroupdroppedbad'] = 'Usuniêcie grupy siê nie powiod³o.';
	$lang['strmembers'] = 'Cz³onkowie';

	// Privileges
	$lang['strprivilege'] = 'Uprawnienie';
	$lang['strprivileges'] = 'Uprawnienia';
	$lang['strnoprivileges'] = 'Ten obiekt nie ma uprawnieñ.';
	$lang['strgrant'] = 'Nadaj';
	$lang['strrevoke'] = 'Zabierz';
        $lang['strgranted'] = 'Uprawnienia nadane.';
	$lang['strgrantfailed'] = 'Próba nadania uprawnieñ siê nie powiod³a.';
	$lang['strgrantuser'] = 'Nadaj u¿ytkownikowi';
	$lang['strgrantgroup'] = 'Nadaj grupie';
				
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
	$lang['strvacuumgood'] = 'Operacja czyszczenia bazy zakoñczona.';
	$lang['strvacuumbad'] = 'Operacja czyszczenia bazy siê nie powiod³a.';
	$lang['stranalyzegood'] = 'Operacja analizy zakoñczona.';
	$lang['stranalyzebad'] = 'Operacja analizy siê nie powiod³a.';

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
						
	// Indeksy
	$strIndex = 'Indeks';
	$lang['strindexes'] = 'Indeksy';
	$lang['strshowallindexes'] = 'Poka¿ wszystkie indeksy';
	$lang['strnoindex'] = 'Nie znaleziono indeksu.';
	$lang['strnoindexes'] = 'Nie znaleziono indeksów.';
	$lang['strcreateindex'] = 'Utwórz indeks';
	$lang['strindexname'] = 'Nazwa indeksu';
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
	$lang['strindexname'] = 'Nazwa indeksu';
	$lang['strtablecolumnlist'] = 'Kolumny w tablicy';
	$lang['strindexcolumnlist'] = 'Kolumny w indeksie';

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
	$lang['strruledroppedbad'] = 'Operacja usuniêcia regu³y siê nie powiod³a.';
	
	// Wiêzy integralno¶ci
	$lang['strconstraints'] = 'Wiêzy integralno¶ci';
	$lang['strshowallconstraints'] = 'Poka¿ wszystkie wiêzy integralno¶ci';
	$lang['strnoconstraints'] = 'Nie znaleziono wiêzów integralno¶ci.';
	$lang['strcreateconstraint'] = 'Utwórz wiêzy integralno¶ci';
	$lang['strconstraintcreated'] = 'Utworzono wiêzy integralno¶ci.';
	$lang['strconstraintcreatedbad'] = 'Próba utworzenia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['strconfdropconstraint'] = 'Czy na pewno chcesz usun±æ wiêzy integralno¶ci "%s" na "%s"?';
	$lang['strconstraintdropped'] = 'Wiêzy integralno¶ci usuniête.';
	$lang['strconstraintdroppedbad'] = 'Operacja usuniêcia wiêzów integralno¶ci siê nie powiod³a.';
	$lang['straddcheck'] = 'Dodaj warunek';
        $lang['strcheckneedsdefinition'] = 'Musisz zdefiniowaæ warunek.';
	$lang['strcheckadded'] = 'Dodano warunek.';
	$lang['strcheckaddedbad'] = 'peracja dodania warunku siê nie powiod³a.';
	$lang['straddpk'] = 'Dodaj klucz g³ówny';
	$lang['strpkneedscols'] = 'Klucz g³ówny musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strpkadded'] = 'Dodano klucz g³ówny.';
	$lang['strpkaddedbad'] = 'Operacja dodania klucza g³ównego siê nie powiod³a.';
	$lang['stradduniq'] = 'Dodaj klucz unikatowy';
	$lang['struniqneedscols'] = 'Klucz unikatowy musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['struniqadded'] = 'Dodano klucz unikatowy.';
	$lang['struniqaddedbad'] = 'Operacja dodania klucza unikatowego siê nie powiod³a.';
        $lang['straddfk'] = 'Dodaj klucz obcy';
	$lang['strfkneedscols'] = 'Obcy klucz musi zawieraæ przynajmniej jedn± kolumnê.';
	$lang['strfkneedstarget'] = 'Klucz obcy wymaga podania nazwy tablicy docelowej.';
	$lang['strfkadded'] = 'Dodano klucz obcy.';
	$lang['strfkaddedbad'] = 'Operacja dodania klucza obcego siê nie powiod³a.';
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
	$lang['strfunctionneedsname'] = 'Musisz nazwaæ funkcjê.';
	$lang['strfunctionneedsdef'] = 'Musisz zdefiniowaæ funkcjê.';
	$lang['strfunctioncreated'] = 'Utworzono funkcjê.';
	$lang['strfunctioncreatedbad'] = 'Próba utworzenia funkcji siê nie powiod³a';
        $lang['strconfdropfunction'] = 'Czy na pewno chcesz usun±æ funkcjê "%s"?';
	$lang['strfunctiondropped'] = 'Funkcja usuniêta.';
	$lang['strfunctiondroppedbad'] = 'Operacja usuniêcia funkcji siê nie powiod³a.';
	$lang['strfunctionupdated'] = 'Funkcja zaktualizowana.';
	$lang['strfunctionupdatedbad'] = 'Operacja aktualizacji funkcji siê nie powiod³a.';

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
	$lang['strtriggerdroppedbad'] = 'Operacja usuniêcia procedury wyzwalanej siê nie powiod³a.';
		
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
	$lang['strdelimiter'] = 'Znak oddzielaj±cy elementy tablicy';
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
        $lang['strreportneedsname'] = 'Musisz nadaæ raportowi nazwê.';
	$lang['strreportneedsdef'] = 'Musisz zdefiniowaæ zapytanie SQL tworz±ce raport.';
	$lang['strreportcreated'] = 'Raport utworzony.';
	$lang['strreportcreatedbad'] = 'Próba utworzenia raportu siê nie powiod³a.';

	// Miscellaneous
	$lang['strtopbar'] = '%s uruchomiony na %s:%s -- Jeste¶ zalogowany jako "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
