<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [rafal@gem.pl]
	 *
	 * $Id: polish.php,v 1.3 2003/01/02 02:27:47 chriskl Exp $
	 */

	$appLang = 'Polish';
	$appCharset = 'ISO-8859-2';

	$strNoFrames = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$strLogin = '- Zaloguj';
	$strLoginFailed = 'Próba zalogowania nie powiod³a siê';
	$strNoTables = 'Nie znaleziono tablic.';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strNoViews = 'Nie znaleziono widoków.';
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strOwner = 'W³a¶ciciel';
	$strAction = 'Akcja';	
	$strActions = 'Akcje';	
	$strName = 'Nazwa';
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strView = 'Widok';
	$strViews = 'Widoki';
	$strDefinition = 'Definicja';
	$strTriggers = 'Wiêzy integralno¶ci';
	$strRules = 'Regu³y';
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strOperators = 'Operatory';
	$strTypes = 'Typy';
	$strAggregates = 'Funkcje agreguj±ce';
	$strIndicies = 'Indeksy';
	$strProperties = 'W³a¶ciwo¶ci';
	$strBrowse = 'Przegl±daj';
	$strDrop = 'Usuñ';
	$strDropped = 'Usuniêty';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = 'Poprzedni';
	$strNext = 'Nastêpny';
	$strFailed = 'Failed';
	$strNotLoaded = 'Nie wkompilowa³e¶ do PHP obs³ugi tej bazy danych.';
	$strCreate = 'Utwórz';
	$strComment = 'Skomentuj';
	$strNext = 'Nastêpny';
	$strLength = 'D³ugo¶æ';
	$strDefault = 'Domy¶lny';
	$strAlter = 'Zmieñ';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strPrivileges = 'Uprawnienia';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usuñ';
	$strUpdate = 'Zmieñ';
	$strRule = 'Regu³a';
	$strReferences = 'Odno¶niki';
	$strTrigger = 'Trigger';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strInvalidScriptParam = 'B³êdny parametr skryptu.';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';

	// Error handling
        $strSQLError = 'B³±d SQL:';
        $strInStatement = 'W poleceniu:';
			
	// Users
	$strUser = 'U¿ytkownik';
	$strGroup = 'Grupa';
	$strUsername = 'Nazwa u¿ytkownika';
	$strPassword = 'Has³o';
	$strSuper = 'Administrator?';
	$strCreateDB = 'Tworzenie BD?';
	$strExpires = 'Wygasa';	
	$strNoUsers = 'Nie znaleziono u¿ytkowników.';
	
	// Databases
	$strDatabase = 'Baza danych';
	$strDatabases = 'Bazy danych';
	$strNoDatabases = 'Nie znaleziono ¿adnej bazy danych.';
	$strDatabaseNeedsName = 'Musisz nazwaæ bazê danych.';
	
	// Views
	$strViewNeedsName = 'Musisz nazwaæ widok.';
	$strViewNeedsDef = 'Musisz zdefiniowaæ widok.';

	// Sequences
	$strNoSequences = 'Nie znaleziono sekwencji.';
	$strSequenceName = 'sequence_name';
	$strLastValue = 'last_value';
	$strIncrementBy = 'increment_by';	
	$strMaxValue = 'max_value';
	$strMinValue = 'min_value';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strReset =	'Wyczy¶æ';

	// Indicies
	$strIndexName = 'Nazwa Indeksu';
	$strTabName = 'Tab Name';
	$strColumnName = 'Nazwa Kolumny';
	$strUniqueKey = 'Klucz Unikatowy';
	$strPrimaryKey = 'Klucz G³ówny';
	$strShowAllIndicies = 'Poka¿ wszystkie indeksy';
	$strCreateIndex = 'Utwórz indeks';
	$strIndexNeedsName = 'Musisz nazwaæ indeks.';
	$strIndexNeedsCols = 'W sk³ad indeksu musi wchodziæ przynajmniej jedna kolumna.';
	$strIndexCreated = 'Indeks utworzony';
	$strIndexCreatedBad = 'Próba utworzenia indeksu siê nie powiod³a.';
	$strConfDropIndex = 'Czy na pewno chcesz usun±æ indeks "%s"?';
	$strIndexDropped = 'Indeks usuniêty.';
	$strIndexDroppedBad = 'Próba usuniêcia indeksu siê nie powiod³a.';
	
	// Tables
	$strField = 'Pole';
	$strFields = 'Pola';
	$strType = 'Typ';
	$strValue = 'Warto¶æ';
	$strShowAllTables = 'Poka¿ wszystkie tablice';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G³ówny';
	$strKeyName = 'Nazwa Klucza';
	$strNumFields = 'Ilo¶æ Pól';
	$strCreateTable = 'Utwórz Tabelê';
	$strTableNeedsName = 'Musisz nazwaæ tabelê.';
	$strTableNeedsCols = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$strExport = 'Eksport';
        $strConstraints = 'Wiêzy integralno¶ci';
        $strColumns = 'Kolumny';
		
	// Functions
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strLanguage = 'Jêzyk';
	$strFunctionNeedsName = 'Musisz nazwaæ funkcjê.';
	$strFunctionNeedsDef = 'Musisz zdefiniowaæ funkcjê.';
	
	// Triggers
	$strTriggers = 'Triggery';
	$strNoTriggers = 'Nie znaleziono triggerów.';
	$strCreateTrigger = 'Utwórz Trigger';

	// Types
	$strType = 'Typ';
	$strTypes = 'Typy';
	$strNoTypes = 'Nie znaleziono typów.';
	$strCreateType = 'Utwórz Typ';
	$strConfDropType = 'Czy na pewno chcesz usun±æ typ "%s"?';
	$strTypeDropped = 'Typ usuniêty.';
	$strTypeDroppedBad = 'Próba usuniêcia typu siê nie powiod³a.';
	$strTypeCreated = 'Typ utworzony';
	$strTypeCreatedBad = 'Próba utworzenia typu siê nie powiod³a.';
	$strShowAllTypes = 'Poka¿ wszystkie typy';
	$strInputFn = 'Funkcja wej¶ciowa';
	$strOutputFn = 'Funkcja wyj¶ciowa';
	$strPassByVal = 'Przekazywany przez warto¶æ?';
	$strAlignment = 'Wyrównanie bajtowe';
	$strElement = 'Typ elementów';
	$strDelimiter = 'Znak oddzielaj±cy elementy tablicy';
	$strStorage = 'Technika przechowywania';
	$strTypeNeedsName = 'Musisz nazwaæ typ.';
	$strTypeNeedsLen = 'Musisz podaæ d³ugo¶æ typu.';
																				
?>
