<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.4 2003/01/08 21:46:57 slubek Exp $
	 */

	$appLang = 'Polish';
	$appCharset = 'ISO-8859-2';

	$strIntro = 'Witaj w WebDB.';
	$strNoFrames = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$strBadConfig = 'Twój plik config.inc.php jest przestarza³y. Musisz go utworzyæ ponownie wykorzystuj±c nowy config.inc.php-dist.';
	$strLogin = '- Zaloguj';
	$strLoginFailed = 'Próba zalogowania nie powiod³a siê';
	$strServer = 'Serwer';
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
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usuñ';
	$strUpdate = 'Zmieñ';
	$strRule = 'Regu³a';
	$strReferences = 'Odno¶niki';
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
	$strUsers = 'U¿ytkownicy';
	$strUsername = 'Nazwa u¿ytkownika';
	$strPassword = 'Has³o';
	$strSuper = 'Administrator?';
	$strCreateDB = 'Tworzenie BD?';
	$strExpires = 'Wygasa';	
	$strNoUsers = 'Nie znaleziono u¿ytkowników.';
	
	// Groups
	$strGroup = 'Grupa';
	$strGroups = 'Grupy';
	$strNoGroups = 'Nie znaleziono grup.';
	$strCreateGroup = 'Utwórz grupê';
        $strShowAllGroups = 'Poka¿ wszystkie grupy';
        $strGroupNeedsName = 'Musisz nazwaæ grupê.';
        $strGroupCreated = 'Grupa utworzona.';
        $strGroupCreatedBad = 'Próba utworzenia grupy siê nie powiod³a.';
        $strConfDropGroup = 'Czy na pewno chcesz utworzyæ grupê "%s"?';
        $strGroupDropped = 'Grupa usuniêta.';
        $strGroupDroppedBad = 'Usuniêcie grupy siê nie powiod³o.';
        $strMembers = 'Cz³onkowie';

	// Privileges
	$strPrivileges = 'Uprawnienia';
	$strGrant = 'Nadaj';
	$strRevoke = 'Zabierz';
	
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
	$strTrigger = 'Trigger';
	$strTriggers = 'Wiêzy integralno¶ci';
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

	// Schemas
	$strSchema = 'Schemat';
	$strSchemas = 'Schematy';
	$strCreateSchema = 'Utwórz schemat';
	$strNoSchemas = 'Nie znaleziono schematów.';
	$strConfDropSchema = 'Czy na pewno chcesz usun±æ schemat "%s"?';
	$strSchemaDropped = 'Schemat usuniêty.';
	$strSchemaDroppedBad = 'Próba usuniêcia schematu siê nie powiod³a.';
	$strSchemaCreated = 'Schemat zosta³ utworzony';
	$strSchemaCreatedBad = 'Próba utworzenia schematu siê nie powiod³a.';
	$strShowAllSchemas = 'Poka¿ wszystkie schematy';
	$strSchemaNeedsName = 'Musisz nadaæ schematowi nazwê.';

?>
