<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.13 2003/02/27 14:30:09 slubek Exp $
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
	$strOperators = 'Operatory';
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
	$strComment = 'Komentarz';
	$strLength = 'D³ugo¶æ';
	$strDefault = 'Domy¶lny';
	$strAlter = 'Zmieñ';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strReset = 'Wyczy¶æ';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usuñ';
	$strUpdate = 'Zmieñ';
	$strReferences = 'Odno¶niki';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strColumns = 'Kolumny';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';
	$strBack = 'Wstecz';
	$strQueryResults = 'Wyniki zapytania';
	$strShow = 'Poka¿';
 	$strEmpty = 'Wyczy¶æ';
	$strLanguage = 'Jêzyk';
	$strEncoding = 'Kodowanie';
	$strValue = 'Warto¶æ';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G³ówny';
	$strExport = 'Eksport';
	$strSQL = 'SQL';
	$strGo = 'Wykonaj';
		
	// Error handling
	$strNoFrames = 'Aby u¿ywaæ tej aplikacji potrzebujesz przegl±darki obs³uguj±cej ramki.';
	$strBadConfig = 'Twój plik config.inc.php jest przestarza³y. Musisz go utworzyæ ponownie wykorzystuj±c nowy config.inc.php-dist.';
	$strNotLoaded = 'Nie wkompilowa³e¶ do PHP obs³ugi tej bazy danych.';
	$strBadSchema = 'Podano b³êdny schemat.';
	$strBadEncoding = 'B³êdne kodowanie bazy.';
	$strSQLError = 'B³±d SQL:';
	$strInStatement = 'W poleceniu:';
	$strInvalidScriptParam = 'B³êdny parametr skryptu.';
	$strNoData = 'Nie znaleziono danych.';

	// Tables
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strShowAllTables = 'Poka¿ wszystkie tabele';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strNoTables = 'Nie znaleziono tablic.';
	$strCreateTable = 'Utwórz tabelê';
	$strTableName = 'Nazwa tabeli';
	$strTableNeedsName = 'Musisz nazwaæ tabelê.';
	$strTableNeedsField = 'Musisz podaæ przynajmniej jedno pole.';
	$strTableNeedsCols = 'Musisz podaæ prawid³ow± liczbê kolumn.';
	$strTableCreated = 'Utworzono tabelê.';
	$strTableCreatedBad = 'Operacja utworzenia tabeli siê nie powiod³a.';
	$strConfDropTable = 'Czy na pewno chcesz usun±æ tablicê "%s"?';
	$strTableDropped = 'Tablica usuniêta.';
	$strTableDroppedBad = 'Operacja usuniêcia tablicy siê nie powiod³a.';
	$strConfEmptyTable = 'Czy na pewno chcesz wyczy¶ciæ tablicê "%s"?';
	$strTableEmptied = 'Tablica wyczyszczona.';
	$strTableEmptiedBad = 'Operacja wyczyszczenia tablicy siê nie powiod³a.';
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
	$strField = 'Pole';
	$strFields = 'Pola';
	$strNumFields = 'Ilo¶æ pól';
	$strFieldNeedsName = 'Musisz nazwaæ pole';
        $strSelectNeedsCol = 'Musisz wybraæ przynajmniej jedn± kolumnê';
	$strAlterColumn = 'Zmieñ kolumnê';
	$strColumnAltered = 'Kolumna zmodyfikowana.';
	$strColumnAlteredBad = 'Operacja modyfikacji kolumny siê nie powiod³a.';
	$strConfDropColumn = 'Czy na pewno chcesz usun±æ kolumnê "%s" z tablicy "%s"?';
	$strColumnDropped = 'Kolumna usuniêta.';
	$strColumnDroppedBad = 'Operacja usuniêcia kolumny siê nie powiod³a.';

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
	$strUserUpdated = 'Parametry u¿ytkownika zaktualizowane.';
	$strUserUpdatedBad = 'Operacja aktualizacji parametrów u¿ytkownika siê nie powiod³a.';
	
	// Groups
	$strGroupAdmin = 'Administracja grupami u¿ytkowników';
	$strGroup = 'Grupa';
	$strGroups = 'Grupy';
	$strShowAllGroups = 'Poka¿ wszystkie grupy';
	$strNoGroup = 'Nie znaleziono grupy.';
	$strNoGroups = 'Nie znaleziono grup.';
	$strCreateGroup = 'Utwórz grupê';
	$strGroupNeedsName = 'Musisz nazwaæ grupê.';
	$strGroupCreated = 'Grupa utworzona.';
	$strGroupCreatedBad = 'Próba utworzenia grupy siê nie powiod³a.';
	$strConfDropGroup = 'Czy na pewno chcesz utworzyæ grupê "%s"?';
	$strGroupDropped = 'Grupa usuniêta.';
	$strGroupDroppedBad = 'Usuniêcie grupy siê nie powiod³o.';
	$strMembers = 'Cz³onkowie';

	// Privileges
	$strPrivilege = 'Uprawnienie';
	$strPrivileges = 'Uprawnienia';
	$strNoPrivileges = 'Ten obiekt nie ma uprawnieñ.';
	$strGrant = 'Nadaj';
	$strRevoke = 'Zabierz';
        $strGranted = 'Uprawnienia nadane.';
	$strGrantFailed = 'Próba nadania uprawnieñ siê nie powiod³a.';
	$strGrantUser = 'Nadaj u¿ytkownikowi';
	$strGrantGroup = 'Nadaj grupie';
				
	// Databases
	$strDatabase = 'Baza danych';
	$strDatabases = 'Bazy danych';
	$strShowAllDatabases = 'Poka¿ wszystkie bazy danych';
	$strNoDatabase = 'Nie znaleziono bazy danych.';
	$strNoDatabases = 'Nie znaleziono ¿adnej bazy danych.';
	$strCreateDatabase = 'Utwórz bazê danych';
	$strDatabaseName = 'Nazwa bazy danych';
	$strDatabaseNeedsName = 'Musisz nazwaæ bazê danych.';
	$strDatabaseCreated = 'Baza danych utworzona.';
	$strDatabaseCreatedBad = 'Próba utworzenia bazy danych siê nie powiod³a.';
	$strConfDropDatabase = 'Czy na pewno chcesz usun±æ bazê danych "%s"?';
	$strDatabaseDropped = 'Baza danych usuniêta.';
	$strDatabaseDroppedBad = 'Próba usuniêcia bazy danych siê nie powiod³a.';
	$strEnterSQL = 'Podaj polecenie SQL do wykonania:';
	 
	// Views
	$strView = 'Widok';
	$strViews = 'Widoki';
	$strShowAllViews = 'Poka¿ wszystkie widoki';
	$strNoView = 'Nie znaleziono widoku.';
	$strNoViews = 'Nie znaleziono widoków.';
	$strCreateView = 'Utwórz widok';
	$strViewName = 'Nazwa widoku';
	$strViewNeedsName = 'Musisz nazwaæ widok.';
	$strViewNeedsDef = 'Musisz zdefiniowaæ widok.';
	$strViewCreated = 'Widok utworzony.';
	$strViewCreatedBad = 'Próba utworzenia widoku siê nie powiod³a.';
	$strConfDropView = 'Czy na pewno chcesz usun±æ widok "%s"?';
	$strViewDropped = 'Widok usuniêty.';
	$strViewDroppedBad = 'Próba usuniêcia widoku siê nie powiod³a.';
	$strViewUpdated = 'Widok zaktualizowany.';
	$strViewUpdatedBad = 'Próba aktualizacji widoku siê nie powiod³a.';

	// Sequences
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strShowAllSequences = 'Poka¿ wszystkie sekwencje';
	$strNoSequence = 'Nie znaleziono sekwencji.';
	$strNoSequences = 'Nie znaleziono sekwencji.';
	$strCreateSequence = 'Utwórz sekwencjê';
	$strSequenceName = 'Nazwa sekwencji';
	$strLastValue = 'last_value';
	$strIncrementBy = 'increment_by';	
	$strMaxValue = 'max_value';
	$strMinValue = 'min_value';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strSequenceNeedsName = 'Musisz nazwaæ sekwencjê';
	$strSequenceCreated = 'Utworzono sekwencjê';
	$strSequenceCreatedBad = 'Próba utworzenia sekwencji siê nie powiod³a.';
	$strConfDropSequence = 'Czy na pewno chcesz usun±æ sekwencjê "%s"?';
	$strSequenceDropped = 'Sekwencja usuniêta.';
	$strSequenceDroppedBad = 'Próba usuniêcia sekwencji siê nie powiod³a.';
						
	// Indeksy
	$strIndex = 'Indeks';
	$strIndexes = 'Indeksy';
	$strShowAllIndexes = 'Poka¿ wszystkie indeksy';
	$strNoIndex = 'Nie znaleziono indeksu.';
	$strNoIndexes = 'Nie znaleziono indeksów.';
	$strCreateIndex = 'Utwórz indeks';
	$strIndexName = 'Nazwa indeksu';
	$strTabName = 'Tab Name';
	$strColumnName = 'Nazwa kolumny';
	$strIndexNeedsName = 'Musisz nazwaæ indeks.';
	$strIndexNeedsCols = 'W sk³ad indeksu musi wchodziæ przynajmniej jedna kolumna.';
	$strIndexCreated = 'Indeks utworzony';
	$strIndexCreatedBad = 'Próba utworzenia indeksu siê nie powiod³a.';
	$strConfDropIndex = 'Czy na pewno chcesz usun±æ indeks "%s"?';
	$strIndexDropped = 'Indeks usuniêty.';
	$strIndexDroppedBad = 'Próba usuniêcia indeksu siê nie powiod³a.';
	$strKeyName = 'Nazwa klucza';
	$strUniqueKey = 'Klucz Unikatowy';
	$strPrimaryKey = 'Klucz G³ówny';
	
	// Regu³y
	$strRule = 'Regu³a';
	$strRules = 'Regu³y';
	$strShowAllRules = 'Poka¿ wszystkie regu³y';
	$strNoRule = 'Nie znaleziono regu³y.';
	$strNoRules = 'Nie znaleziono regu³.';
	$strCreateRule = 'Utwórz regu³ê';
	$strRuleName = 'Nazwa regu³y';
	$strRuleNeedsName = 'Musisz nazwaæ regu³ê.';
	$strRuleCreated = 'Utworzono regu³ê.';
	$strRuleCreatedBad = 'Próba utworzenia regu³y siê nie powiod³a.';
	$strConfDropRule = 'Czy na pewno chcesz usun±æ regu³ê "%s" na "%s"?';
	$strRuleDropped = 'Regu³a usuniêta.';
	$strRuleDroppedBad = 'Operacja usuniêcia regu³y siê nie powiod³a.';
	
	// Wiêzy integralno¶ci
	$strConstraints = 'Wiêzy integralno¶ci';
	$strShowAllConstraints = 'Poka¿ wszystkie wiêzy integralno¶ci';
	$strNoConstraints = 'Nie znaleziono wiêzów integralno¶ci.';
	$strCreateConstraint = 'Utwórz wiêzy integralno¶ci';
	$strConstraintCreated = 'Utworzono wiêzy integralno¶ci.';
	$strConstraintCreatedBad = 'Próba utworzenia wiêzów integralno¶ci siê nie powiod³a.';
	$strConfDropConstraint = 'Czy na pewno chcesz usun±æ wiêzy integralno¶ci "%s" na "%s"?';
	$strConstraintDropped = 'Wiêzy integralno¶ci usuniête.';
	$strConstraintDroppedBad = 'Operacja usuniêcia wiêzów integralno¶ci siê nie powiod³a.';
		
	// Functions
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strShowAllFunctions = 'Poka¿ wszystkie funkcje';
	$strNoFunction = 'Nie znaleziono funkcji.';
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strCreateFunction = 'Utwórz funkcjê';
	$strFunctionName = 'Nazwa funkcji';
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strFunctionNeedsName = 'Musisz nazwaæ funkcjê.';
	$strFunctionNeedsDef = 'Musisz zdefiniowaæ funkcjê.';
	$strFunctionCreated = 'Utworzono funkcjê.';
	$strFunctionCreatedBad = 'Próba utworzenia funkcji siê nie powiod³a';
        $strConfDropFunction = 'Czy na pewno chcesz usun±æ funkcjê "%s"?';
	$strFunctionDropped = 'Funkcja usuniêta.';
	$strFunctionDroppedBad = 'Operacja usuniêcia funkcji siê nie powiod³a.';
	$strFunctionUpdated = 'Funkcja zaktualizowana.';
	$strFunctionUpdatedBad = 'Operacja aktualizacji funkcji siê nie powiod³a.';

	// Triggers
	$strTrigger = 'Procedura wyzwalana';
	$strTriggers = 'Procedury wyzwalane';
	$strShowAllTriggers = 'Poka¿ wszystkie procedury wyzwalane';
	$strNoTrigger = 'Nie znaleziono procedury wyzwalanej.';
	$strNoTriggers = 'Nie znaleziono procedur wyzwalanych.';
	$strCreateTrigger = 'Utwórz procedurê wyzwalan±';
	$strTriggerName = 'Nazwa procedury wyzwalanej';
	$strTriggerNeedsName = 'Musisz nazwaæ procedurê wyzwalan±';
	$strTriggerCreated = 'Utworzono procedurê wyzwalan±.';
	$strTriggerCreatedBad = 'Próba utworzenia procedury wyzwalanej siê nie powiod³a';
        $strConfDropTrigger = 'Czy na pewno chcesz usun±æ procedurê "%s" wyzwalan± przez "%s"?';
	$strTriggerDropped = 'Procedura wyzwalana usuniêta.';
	$strTriggerDroppedBad = 'Operacja usuniêcia procedury wyzwalanej siê nie powiod³a.';
		
	// Types
	$strType = 'Typ';
	$strTypes = 'Typy';
	$strShowAllTypes = 'Poka¿ wszystkie typy';
	$strNoType = 'Nie znaleziono typu.';
	$strNoTypes = 'Nie znaleziono typów.';
	$strCreateType = 'Utwórz typ';
	$strTypeName = 'Nazwa typu';
	$strInputFn = 'Funkcja wej¶ciowa';
	$strOutputFn = 'Funkcja wyj¶ciowa';
	$strPassByVal = 'Przekazywany przez warto¶æ?';
	$strAlignment = 'Wyrównanie bajtowe';
	$strElement = 'Typ elementów';
	$strDelimiter = 'Znak oddzielaj±cy elementy tablicy';
	$strStorage = 'Technika przechowywania';
	$strTypeNeedsName = 'Musisz nazwaæ typ.';
	$strTypeNeedsLen = 'Musisz podaæ d³ugo¶æ typu.';
	$strTypeCreated = 'Typ utworzony';
	$strTypeCreatedBad = 'Próba utworzenia typu siê nie powiod³a.';
	$strConfDropType = 'Czy na pewno chcesz usun±æ typ "%s"?';
	$strTypeDropped = 'Typ usuniêty.';
	$strTypeDroppedBad = 'Próba usuniêcia typu siê nie powiod³a.';

	// Schemas
	$strSchema = 'Schemat';
	$strSchemas = 'Schematy';
	$strShowAllSchemas = 'Poka¿ wszystkie schematy';
	$strNoSchema = 'Nie znaleziono schematu.';
	$strNoSchemas = 'Nie znaleziono schematów.';
	$strCreateSchema = 'Utwórz schemat';
	$strSchemaName = 'Nazwa schematu';
	$strSchemaNeedsName = 'Musisz nadaæ schematowi nazwê.';
	$strSchemaCreated = 'Schemat zosta³ utworzony';
	$strSchemaCreatedBad = 'Próba utworzenia schematu siê nie powiod³a.';
	$strConfDropSchema = 'Czy na pewno chcesz usun±æ schemat "%s"?';
	$strSchemaDropped = 'Schemat usuniêty.';
	$strSchemaDroppedBad = 'Próba usuniêcia schematu siê nie powiod³a.';

	// Reports
	$strReport = 'Raport';
	$strReports = 'Raporty';
	$strNoReports = 'Nie znaleziono raportów.';
	$strCreateReport = 'Utwórz raport';
	$strReportDropped = 'Raport usuniêty.';
	$strReportDroppedBad = 'Próba usuniêcia raportu siê nie powiod³a.';
	$strConfDropReport = 'Czy na pewno chcesz usun±æ raport "%s"?';
        $strReportNeedsName = 'Musisz nadaæ raportowi nazwê.';
	$strReportNeedsDef = 'Musisz zdefiniowaæ zapytanie SQL tworz±ce raport.';
	$strReportCreated = 'Raport utworzony.';
	$strReportCreatedBad = 'Próba utworzenia raportu siê nie powiod³a.';

	// Miscellaneous
	$strTopBar = '%s uruchomiony na %s:%s -- Jeste¶ zalogowany jako "%s", %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
