<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.8 2003/01/21 23:09:53 slubek Exp $
	 */

	// Language and character set
	$appLang = 'Polish';
	$appCharset = 'ISO-8859-2';

	// Basic strings
	$strIntro = 'Witaj w phpPgAdmin.';
	$strLogin = '- Zaloguj';
	$strLoginFailed = 'Próba zalogowania nie powiod³a siê';
	$strServer = 'Serwer';
	$strLogout = 'Wyloguj siê';
	$strOwner = 'W³a¶ciciel';
	$strAction = 'Akcja';	
	$strActions = 'Akcje';	
	$strName = 'Nazwa';
	$strDefinition = 'Definicja';
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strOperators = 'Operatory';
	$strTypes = 'Typy';
	$strAggregates = 'Funkcje agreguj±ce';
	$strProperties = 'W³a¶ciwo¶ci';
	$strBrowse = 'Przegl±daj';
	$strDrop = 'Usuñ';
	$strDropped = 'Usuniêty';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = 'Poprzedni';
	$strNext = 'Nastêpny';
	$strFailed = 'Nieudany';
	$strCreate = 'Utwórz';
	$strComment = 'Skomentuj';
	$strLength = 'D³ugo¶æ';
	$strDefault = 'Domy¶lny';
	$strAlter = 'Zmieñ';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usuñ';
	$strUpdate = 'Zmieñ';
	$strReferences = 'Odno¶niki';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';
	$strBack = 'Wstecz';
	$strQueryResults = 'Wyniki zapytania';
	$strShow = 'Poka¿';
 	$strEmpty = 'Pusty';
	$strLanguage = 'Jêzyk';
	
	// Error handling
	$strNoFrames = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$strBadConfig = 'Twój plik config.inc.php jest przestarza³y. Musisz go utworzyæ ponownie wykorzystuj±c nowy config.inc.php-dist.';
	$strNotLoaded = 'Nie wkompilowa³e¶ do PHP obs³ugi tej bazy danych.';
	$strBadSchema = 'Invalid schema specified.';
	$strBadEncoding = 'Failed to set client encoding in database.';
	$strSQLError = 'B³±d SQL:';
	$strInStatement = 'W poleceniu:';
	$strInvalidScriptParam = 'B³êdny parametr skryptu.';
	$strNoData = 'Nie znaleziono danych.';

	// Tables
	$strNoTables = 'Nie znaleziono tablic.';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strTableCreated = 'Utworzono tabelê.';
	$strTableCreatedBad = 'Operacja utworzenia tabeli siê nie powiod³a.';
	$strTableNeedsField = 'Musisz podaæ przynajmniej jedno pole.';
	$strInsertRow = 'Wstaw wiersz';
	$strRowInserted = 'Wiersz wstawiony.';
	$strRowInsertedBad = 'Operacja wstawienia wiersza siê nie powiod³a.';
	$strEditRow = 'Edycja wiersza';
	$strRowUpdated = 'Wiersz zaktualizowany.';
	$strRowUpdatedBad = 'Operacja aktalizacji wiersza siê nie powiod³a.';
	$strDeleteRow = 'Usuñ wiersz';
	$strConfDeleteRow = 'Czy na pewno chcesz usun±æ ten wiersz?';
	$strRowDeleted = 'Wiersz usuniêty.';
	$strRowDeletedBad = 'Operacja usuniêcia wiersza siê nie powiod³a.';
	$strSaveAndRepeat = 'Zapisz i powtórz';
	$strConfEmptyTable = 'Czy na pewno chcesz wyczy¶ciæ tablicê "%s"?';
	$strTableEmptied = 'Tablica wyczyszczona.';
	$strTableEmptiedBad = 'Operacja wyczyszczenia tablicy siê nie powiod³a.';
	$strConfDropTable = 'Czy na pewno chcesz usun±æ tablicê "%s"?';
	$strTableDropped = 'Tablica usuniêta.';
	$strTableDroppedBad = 'Operacja usuniêcia tablicy siê nie powiod³a.';

	// Users
	$strUserAdmin = 'Administracja kontami u¿ytkowników';
	$strUser = 'U¿ytkownik';
	$strUsers = 'U¿ytkownicy';
	$strUsername = 'Nazwa u¿ytkownika';
	$strPassword = 'Has³o';
	$strSuper = 'Administrator?';
	$strCreateDB = 'Tworzenie BD?';
	$strExpires = 'Wygasa';	
	$strNoUsers = 'Nie znaleziono u¿ytkowników.';

	// Groups
	$strGroupAdmin = 'Administracja grupami u¿ytkowników';
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
	$strDatabaseCreated = 'Baza danych utworzona.';
	$strDatabaseCreatedBad = 'Próba utworzenia bazy danych siê nie powiod³a.';
	
	// Views
	$strViewNeedsName = 'Musisz nazwaæ widok.';
	$strViewNeedsDef = 'Musisz zdefiniowaæ widok.';
	$strCreateView = 'Utwórz widok';
	$strNoViews = 'Nie znaleziono widoków.';
	$strView = 'Widok';
	$strViews = 'Widoki';

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

	// Indeksy
	$strIndexes = 'Indeksy';
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
	
	// Regu³y
	$strRule = 'Regu³a';
	$strRules = 'Regu³y';
	$strNoRules = 'Nie znaleziono regu³.';
	$strCreateRule = 'Utwórz regu³ê';
	$strConfDropRule = 'Czy na pewno chcesz usun±æ regu³ê "%s" na "%s"?';
	$strRuleDropped = 'Regu³a usuniêta.';
	$strRuleDroppedBad = 'Operacja usuniêcia regu³y siê nie powiod³a.';
	
	// Tablice
	$strField = 'Pole';
	$strFields = 'Pola';
	$strType = 'Typ';
	$strValue = 'Warto¶æ';
	$strShowAllTables = 'Poka¿ wszystkie tablice';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G³ówny';
	$strKeyName = 'Nazwa klucza';
	$strNumFields = 'Ilo¶æ pól';
	$strCreateTable = 'Utwórz tabelê';
	$strTableNeedsName = 'Musisz nazwaæ tabelê.';
	$strTableNeedsCols = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$strExport = 'Eksport';
	$strColumns = 'Kolumny';

	// Wiêzy integralno¶ci
	$strConstraints = 'Wiêzy integralno¶ci';
	$strNoConstraints = 'Nie znaleziono wiêzów integralno¶ci.';
	$strCreateConstraint = 'Utwórz wiêzy integralno¶ci';
	$strConfDropConstraint = 'Czy na pewno chcesz usun±æ wiêzy integralno¶ci "%s" na "%s"?';
	$strConstraintDropped = 'Wiêzy integralno¶ci usuniête.';
	$strConstraintDroppedBad = 'Operacja usuniêcia wiêzów integralno¶ci siê nie powiod³a.';
		
	// Functions
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strFunctionNeedsName = 'Musisz nazwaæ funkcjê.';
	$strFunctionNeedsDef = 'Musisz zdefiniowaæ funkcjê.';
	
	// Triggers
	$strTrigger = 'Procedura wyzwalana';
	$strTriggers = 'Procedury wyzwalane';
	$strNoTriggers = 'Nie znaleziono procedur wyzwalanych.';
	$strCreateTrigger = 'Utwórz procedurê wyzwalan±';
        $strConfDropTrigger = 'Czy na pewno chcesz usun±æ procedurê "%s" wyzwalan± przez "%s"?';
	$strTriggerDropped = 'Procedura wyzwalana usuniêta.';
	$strTriggerDroppedBad = 'Operacja usuniêcia procedury wyzwalanej siê nie powiod³a.';
		
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

	// Miscellaneous
	$strTopBar = '%s uruchomiony na %s:%s -- Jeste¶ zalogowany jako "%s", %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
