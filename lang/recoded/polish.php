<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.2 2003/01/21 23:09:53 slubek Exp $
	 */

	// Language and character set
	$appLang = 'Polish';
	$appCharset = 'ISO-8859-2';

	// Basic strings
	$strIntro = 'Witaj w phpPgAdmin.';
	$strLogin = '- Zaloguj';
	$strLoginFailed = 'Pr&oacute;ba zalogowania nie powiod&#322;a si&#281;';
	$strServer = 'Serwer';
	$strLogout = 'Wyloguj si&#281;';
	$strOwner = 'W&#322;a&#347;ciciel';
	$strAction = 'Akcja';	
	$strActions = 'Akcje';	
	$strName = 'Nazwa';
	$strDefinition = 'Definicja';
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strOperators = 'Operatory';
	$strTypes = 'Typy';
	$strAggregates = 'Funkcje agreguj&#261;ce';
	$strProperties = 'W&#322;a&#347;ciwo&#347;ci';
	$strBrowse = 'Przegl&#261;daj';
	$strDrop = 'Usu&#324;';
	$strDropped = 'Usuni&#281;ty';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = 'Poprzedni';
	$strNext = 'Nast&#281;pny';
	$strFailed = 'Nieudany';
	$strCreate = 'Utw&oacute;rz';
	$strComment = 'Skomentuj';
	$strLength = 'D&#322;ugo&#347;&#263;';
	$strDefault = 'Domy&#347;lny';
	$strAlter = 'Zmie&#324;';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usu&#324;';
	$strUpdate = 'Zmie&#324;';
	$strReferences = 'Odno&#347;niki';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';
	$strBack = 'Wstecz';
	$strQueryResults = 'Wyniki zapytania';
	$strShow = 'Poka&#380;';
 	$strEmpty = 'Pusty';
	$strLanguage = 'J&#281;zyk';
	
	// Error handling
	$strNoFrames = 'Aby u&#380;ywa&#263; tej aplikacji potrzebujesz przegl&#261;darki obs&#322;uguj&#261;cej ramki.';
	$strBadConfig = 'Tw&oacute;j plik config.inc.php jest przestarza&#322;y. Musisz go utworzy&#263; ponownie wykorzystuj&#261;c nowy config.inc.php-dist.';
	$strNotLoaded = 'Nie wkompilowa&#322;e&#347; do PHP obs&#322;ugi tej bazy danych.';
	$strBadSchema = 'Invalid schema specified.';
	$strBadEncoding = 'Failed to set client encoding in database.';
	$strSQLError = 'B&#322;&#261;d SQL:';
	$strInStatement = 'W poleceniu:';
	$strInvalidScriptParam = 'B&#322;&#281;dny parametr skryptu.';
	$strNoData = 'Nie znaleziono danych.';

	// Tables
	$strNoTables = 'Nie znaleziono tablic.';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strTableCreated = 'Utworzono tabel&#281;.';
	$strTableCreatedBad = 'Operacja utworzenia tabeli si&#281; nie powiod&#322;a.';
	$strTableNeedsField = 'Musisz poda&#263; przynajmniej jedno pole.';
	$strInsertRow = 'Wstaw wiersz';
	$strRowInserted = 'Wiersz wstawiony.';
	$strRowInsertedBad = 'Operacja wstawienia wiersza si&#281; nie powiod&#322;a.';
	$strEditRow = 'Edycja wiersza';
	$strRowUpdated = 'Wiersz zaktualizowany.';
	$strRowUpdatedBad = 'Operacja aktalizacji wiersza si&#281; nie powiod&#322;a.';
	$strDeleteRow = 'Usu&#324; wiersz';
	$strConfDeleteRow = 'Czy na pewno chcesz usun&#261;&#263; ten wiersz?';
	$strRowDeleted = 'Wiersz usuni&#281;ty.';
	$strRowDeletedBad = 'Operacja usuni&#281;cia wiersza si&#281; nie powiod&#322;a.';
	$strSaveAndRepeat = 'Zapisz i powt&oacute;rz';
	$strConfEmptyTable = 'Czy na pewno chcesz wyczy&#347;ci&#263; tablic&#281; &quot;%s&quot;?';
	$strTableEmptied = 'Tablica wyczyszczona.';
	$strTableEmptiedBad = 'Operacja wyczyszczenia tablicy si&#281; nie powiod&#322;a.';
	$strConfDropTable = 'Czy na pewno chcesz usun&#261;&#263; tablic&#281; &quot;%s&quot;?';
	$strTableDropped = 'Tablica usuni&#281;ta.';
	$strTableDroppedBad = 'Operacja usuni&#281;cia tablicy si&#281; nie powiod&#322;a.';

	// Users
	$strUserAdmin = 'Administracja kontami u&#380;ytkownik&oacute;w';
	$strUser = 'U&#380;ytkownik';
	$strUsers = 'U&#380;ytkownicy';
	$strUsername = 'Nazwa u&#380;ytkownika';
	$strPassword = 'Has&#322;o';
	$strSuper = 'Administrator?';
	$strCreateDB = 'Tworzenie BD?';
	$strExpires = 'Wygasa';	
	$strNoUsers = 'Nie znaleziono u&#380;ytkownik&oacute;w.';

	// Groups
	$strGroupAdmin = 'Administracja grupami u&#380;ytkownik&oacute;w';
	$strGroup = 'Grupa';
	$strGroups = 'Grupy';
	$strNoGroups = 'Nie znaleziono grup.';
	$strCreateGroup = 'Utw&oacute;rz grup&#281;';
	$strShowAllGroups = 'Poka&#380; wszystkie grupy';
	$strGroupNeedsName = 'Musisz nazwa&#263; grup&#281;.';
	$strGroupCreated = 'Grupa utworzona.';
	$strGroupCreatedBad = 'Pr&oacute;ba utworzenia grupy si&#281; nie powiod&#322;a.';
	$strConfDropGroup = 'Czy na pewno chcesz utworzy&#263; grup&#281; &quot;%s&quot;?';
	$strGroupDropped = 'Grupa usuni&#281;ta.';
	$strGroupDroppedBad = 'Usuni&#281;cie grupy si&#281; nie powiod&#322;o.';
	$strMembers = 'Cz&#322;onkowie';

	// Privileges
	$strPrivileges = 'Uprawnienia';
	$strGrant = 'Nadaj';
	$strRevoke = 'Zabierz';

	// Databases
	$strDatabase = 'Baza danych';
	$strDatabases = 'Bazy danych';
	$strNoDatabases = 'Nie znaleziono &#380;adnej bazy danych.';
	$strDatabaseNeedsName = 'Musisz nazwa&#263; baz&#281; danych.';
	$strDatabaseCreated = 'Baza danych utworzona.';
	$strDatabaseCreatedBad = 'Pr&oacute;ba utworzenia bazy danych si&#281; nie powiod&#322;a.';
	
	// Views
	$strViewNeedsName = 'Musisz nazwa&#263; widok.';
	$strViewNeedsDef = 'Musisz zdefiniowa&#263; widok.';
	$strCreateView = 'Utw&oacute;rz widok';
	$strNoViews = 'Nie znaleziono widok&oacute;w.';
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
	$strReset =	'Wyczy&#347;&#263;';

	// Indeksy
	$strIndexes = 'Indeksy';
	$strIndexName = 'Nazwa Indeksu';
	$strTabName = 'Tab Name';
	$strColumnName = 'Nazwa Kolumny';
	$strUniqueKey = 'Klucz Unikatowy';
	$strPrimaryKey = 'Klucz G&#322;&oacute;wny';
	$strShowAllIndicies = 'Poka&#380; wszystkie indeksy';
	$strCreateIndex = 'Utw&oacute;rz indeks';
	$strIndexNeedsName = 'Musisz nazwa&#263; indeks.';
	$strIndexNeedsCols = 'W sk&#322;ad indeksu musi wchodzi&#263; przynajmniej jedna kolumna.';
	$strIndexCreated = 'Indeks utworzony';
	$strIndexCreatedBad = 'Pr&oacute;ba utworzenia indeksu si&#281; nie powiod&#322;a.';
	$strConfDropIndex = 'Czy na pewno chcesz usun&#261;&#263; indeks &quot;%s&quot;?';
	$strIndexDropped = 'Indeks usuni&#281;ty.';
	$strIndexDroppedBad = 'Pr&oacute;ba usuni&#281;cia indeksu si&#281; nie powiod&#322;a.';
	
	// Regu&#322;y
	$strRule = 'Regu&#322;a';
	$strRules = 'Regu&#322;y';
	$strNoRules = 'Nie znaleziono regu&#322;.';
	$strCreateRule = 'Utw&oacute;rz regu&#322;&#281;';
	$strConfDropRule = 'Czy na pewno chcesz usun&#261;&#263; regu&#322;&#281; &quot;%s&quot; na &quot;%s&quot;?';
	$strRuleDropped = 'Regu&#322;a usuni&#281;ta.';
	$strRuleDroppedBad = 'Operacja usuni&#281;cia regu&#322;y si&#281; nie powiod&#322;a.';
	
	// Tablice
	$strField = 'Pole';
	$strFields = 'Pola';
	$strType = 'Typ';
	$strValue = 'Warto&#347;&#263;';
	$strShowAllTables = 'Poka&#380; wszystkie tablice';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G&#322;&oacute;wny';
	$strKeyName = 'Nazwa klucza';
	$strNumFields = 'Ilo&#347;&#263; p&oacute;l';
	$strCreateTable = 'Utw&oacute;rz tabel&#281;';
	$strTableNeedsName = 'Musisz nazwa&#263; tabel&#281;.';
	$strTableNeedsCols = 'Musisz poda&#263; prawid&#322;ow&#261; liczb&#281; kolumn.';
	$strExport = 'Eksport';
	$strColumns = 'Kolumny';

	// Wi&#281;zy integralno&#347;ci
	$strConstraints = 'Wi&#281;zy integralno&#347;ci';
	$strNoConstraints = 'Nie znaleziono wi&#281;z&oacute;w integralno&#347;ci.';
	$strCreateConstraint = 'Utw&oacute;rz wi&#281;zy integralno&#347;ci';
	$strConfDropConstraint = 'Czy na pewno chcesz usun&#261;&#263; wi&#281;zy integralno&#347;ci &quot;%s&quot; na &quot;%s&quot;?';
	$strConstraintDropped = 'Wi&#281;zy integralno&#347;ci usuni&#281;te.';
	$strConstraintDroppedBad = 'Operacja usuni&#281;cia wi&#281;z&oacute;w integralno&#347;ci si&#281; nie powiod&#322;a.';
		
	// Functions
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strFunctionNeedsName = 'Musisz nazwa&#263; funkcj&#281;.';
	$strFunctionNeedsDef = 'Musisz zdefiniowa&#263; funkcj&#281;.';
	
	// Triggers
	$strTrigger = 'Procedura wyzwalana';
	$strTriggers = 'Procedury wyzwalane';
	$strNoTriggers = 'Nie znaleziono procedur wyzwalanych.';
	$strCreateTrigger = 'Utw&oacute;rz procedur&#281; wyzwalan&#261;';
        $strConfDropTrigger = 'Czy na pewno chcesz usun&#261;&#263; procedur&#281; &quot;%s&quot; wyzwalan&#261; przez &quot;%s&quot;?';
	$strTriggerDropped = 'Procedura wyzwalana usuni&#281;ta.';
	$strTriggerDroppedBad = 'Operacja usuni&#281;cia procedury wyzwalanej si&#281; nie powiod&#322;a.';
		
	// Types
	$strType = 'Typ';
	$strTypes = 'Typy';
	$strNoTypes = 'Nie znaleziono typ&oacute;w.';
	$strCreateType = 'Utw&oacute;rz Typ';
	$strConfDropType = 'Czy na pewno chcesz usun&#261;&#263; typ &quot;%s&quot;?';
	$strTypeDropped = 'Typ usuni&#281;ty.';
	$strTypeDroppedBad = 'Pr&oacute;ba usuni&#281;cia typu si&#281; nie powiod&#322;a.';
	$strTypeCreated = 'Typ utworzony';
	$strTypeCreatedBad = 'Pr&oacute;ba utworzenia typu si&#281; nie powiod&#322;a.';
	$strShowAllTypes = 'Poka&#380; wszystkie typy';
	$strInputFn = 'Funkcja wej&#347;ciowa';
	$strOutputFn = 'Funkcja wyj&#347;ciowa';
	$strPassByVal = 'Przekazywany przez warto&#347;&#263;?';
	$strAlignment = 'Wyr&oacute;wnanie bajtowe';
	$strElement = 'Typ element&oacute;w';
	$strDelimiter = 'Znak oddzielaj&#261;cy elementy tablicy';
	$strStorage = 'Technika przechowywania';
	$strTypeNeedsName = 'Musisz nazwa&#263; typ.';
	$strTypeNeedsLen = 'Musisz poda&#263; d&#322;ugo&#347;&#263; typu.';

	// Schemas
	$strSchema = 'Schemat';
	$strSchemas = 'Schematy';
	$strCreateSchema = 'Utw&oacute;rz schemat';
	$strNoSchemas = 'Nie znaleziono schemat&oacute;w.';
	$strConfDropSchema = 'Czy na pewno chcesz usun&#261;&#263; schemat &quot;%s&quot;?';
	$strSchemaDropped = 'Schemat usuni&#281;ty.';
	$strSchemaDroppedBad = 'Pr&oacute;ba usuni&#281;cia schematu si&#281; nie powiod&#322;a.';
	$strSchemaCreated = 'Schemat zosta&#322; utworzony';
	$strSchemaCreatedBad = 'Pr&oacute;ba utworzenia schematu si&#281; nie powiod&#322;a.';
	$strShowAllSchemas = 'Poka&#380; wszystkie schematy';
	$strSchemaNeedsName = 'Musisz nada&#263; schematowi nazw&#281;.';

	// Miscellaneous
	$strTopBar = '%s uruchomiony na %s:%s -- Jeste&#347; zalogowany jako &quot;%s&quot;, %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
