<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.7 2003/02/27 14:30:10 slubek Exp $
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
	$strOperators = 'Operatory';
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
	$strComment = 'Komentarz';
	$strLength = 'D&#322;ugo&#347;&#263;';
	$strDefault = 'Domy&#347;lny';
	$strAlter = 'Zmie&#324;';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strReset = 'Wyczy&#347;&#263;';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usu&#324;';
	$strUpdate = 'Zmie&#324;';
	$strReferences = 'Odno&#347;niki';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strColumns = 'Kolumny';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';
	$strBack = 'Wstecz';
	$strQueryResults = 'Wyniki zapytania';
	$strShow = 'Poka&#380;';
 	$strEmpty = 'Wyczy&#347;&#263;';
	$strLanguage = 'J&#281;zyk';
	$strEncoding = 'Kodowanie';
	$strValue = 'Warto&#347;&#263;';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G&#322;&oacute;wny';
	$strExport = 'Eksport';
	$strSQL = 'SQL';
	$strGo = 'Wykonaj';
		
	// Error handling
	$strNoFrames = 'Aby u&#380;ywa&#263; tej aplikacji potrzebujesz przegl&#261;darki obs&#322;uguj&#261;cej ramki.';
	$strBadConfig = 'Tw&oacute;j plik config.inc.php jest przestarza&#322;y. Musisz go utworzy&#263; ponownie wykorzystuj&#261;c nowy config.inc.php-dist.';
	$strNotLoaded = 'Nie wkompilowa&#322;e&#347; do PHP obs&#322;ugi tej bazy danych.';
	$strBadSchema = 'Podano b&#322;&#281;dny schemat.';
	$strBadEncoding = 'B&#322;&#281;dne kodowanie bazy.';
	$strSQLError = 'B&#322;&#261;d SQL:';
	$strInStatement = 'W poleceniu:';
	$strInvalidScriptParam = 'B&#322;&#281;dny parametr skryptu.';
	$strNoData = 'Nie znaleziono danych.';

	// Tables
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strShowAllTables = 'Poka&#380; wszystkie tabele';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strNoTables = 'Nie znaleziono tablic.';
	$strCreateTable = 'Utw&oacute;rz tabel&#281;';
	$strTableName = 'Nazwa tabeli';
	$strTableNeedsName = 'Musisz nazwa&#263; tabel&#281;.';
	$strTableNeedsField = 'Musisz poda&#263; przynajmniej jedno pole.';
	$strTableNeedsCols = 'Musisz poda&#263; prawid&#322;ow&#261; liczb&#281; kolumn.';
	$strTableCreated = 'Utworzono tabel&#281;.';
	$strTableCreatedBad = 'Operacja utworzenia tabeli si&#281; nie powiod&#322;a.';
	$strConfDropTable = 'Czy na pewno chcesz usun&#261;&#263; tablic&#281; &quot;%s&quot;?';
	$strTableDropped = 'Tablica usuni&#281;ta.';
	$strTableDroppedBad = 'Operacja usuni&#281;cia tablicy si&#281; nie powiod&#322;a.';
	$strConfEmptyTable = 'Czy na pewno chcesz wyczy&#347;ci&#263; tablic&#281; &quot;%s&quot;?';
	$strTableEmptied = 'Tablica wyczyszczona.';
	$strTableEmptiedBad = 'Operacja wyczyszczenia tablicy si&#281; nie powiod&#322;a.';
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
	$strField = 'Pole';
	$strFields = 'Pola';
	$strNumFields = 'Ilo&#347;&#263; p&oacute;l';
	$strFieldNeedsName = 'Musisz nazwa&#263; pole';
        $strSelectNeedsCol = 'Musisz wybra&#263; przynajmniej jedn&#261; kolumn&#281;';
	$strAlterColumn = 'Zmie&#324; kolumn&#281;';
	$strColumnAltered = 'Kolumna zmodyfikowana.';
	$strColumnAlteredBad = 'Operacja modyfikacji kolumny si&#281; nie powiod&#322;a.';
	$strConfDropColumn = 'Czy na pewno chcesz usun&#261;&#263; kolumn&#281; &quot;%s&quot; z tablicy &quot;%s&quot;?';
	$strColumnDropped = 'Kolumna usuni&#281;ta.';
	$strColumnDroppedBad = 'Operacja usuni&#281;cia kolumny si&#281; nie powiod&#322;a.';

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
	$strUserUpdated = 'Parametry u&#380;ytkownika zaktualizowane.';
	$strUserUpdatedBad = 'Operacja aktualizacji parametr&oacute;w u&#380;ytkownika si&#281; nie powiod&#322;a.';
	
	// Groups
	$strGroupAdmin = 'Administracja grupami u&#380;ytkownik&oacute;w';
	$strGroup = 'Grupa';
	$strGroups = 'Grupy';
	$strShowAllGroups = 'Poka&#380; wszystkie grupy';
	$strNoGroup = 'Nie znaleziono grupy.';
	$strNoGroups = 'Nie znaleziono grup.';
	$strCreateGroup = 'Utw&oacute;rz grup&#281;';
	$strGroupNeedsName = 'Musisz nazwa&#263; grup&#281;.';
	$strGroupCreated = 'Grupa utworzona.';
	$strGroupCreatedBad = 'Pr&oacute;ba utworzenia grupy si&#281; nie powiod&#322;a.';
	$strConfDropGroup = 'Czy na pewno chcesz utworzy&#263; grup&#281; &quot;%s&quot;?';
	$strGroupDropped = 'Grupa usuni&#281;ta.';
	$strGroupDroppedBad = 'Usuni&#281;cie grupy si&#281; nie powiod&#322;o.';
	$strMembers = 'Cz&#322;onkowie';

	// Privileges
	$strPrivilege = 'Uprawnienie';
	$strPrivileges = 'Uprawnienia';
	$strNoPrivileges = 'Ten obiekt nie ma uprawnie&#324;.';
	$strGrant = 'Nadaj';
	$strRevoke = 'Zabierz';
        $strGranted = 'Uprawnienia nadane.';
	$strGrantFailed = 'Pr&oacute;ba nadania uprawnie&#324; si&#281; nie powiod&#322;a.';
	$strGrantUser = 'Nadaj u&#380;ytkownikowi';
	$strGrantGroup = 'Nadaj grupie';
				
	// Databases
	$strDatabase = 'Baza danych';
	$strDatabases = 'Bazy danych';
	$strShowAllDatabases = 'Poka&#380; wszystkie bazy danych';
	$strNoDatabase = 'Nie znaleziono bazy danych.';
	$strNoDatabases = 'Nie znaleziono &#380;adnej bazy danych.';
	$strCreateDatabase = 'Utw&oacute;rz baz&#281; danych';
	$strDatabaseName = 'Nazwa bazy danych';
	$strDatabaseNeedsName = 'Musisz nazwa&#263; baz&#281; danych.';
	$strDatabaseCreated = 'Baza danych utworzona.';
	$strDatabaseCreatedBad = 'Pr&oacute;ba utworzenia bazy danych si&#281; nie powiod&#322;a.';
	$strConfDropDatabase = 'Czy na pewno chcesz usun&#261;&#263; baz&#281; danych &quot;%s&quot;?';
	$strDatabaseDropped = 'Baza danych usuni&#281;ta.';
	$strDatabaseDroppedBad = 'Pr&oacute;ba usuni&#281;cia bazy danych si&#281; nie powiod&#322;a.';
	$strEnterSQL = 'Podaj polecenie SQL do wykonania:';
	 
	// Views
	$strView = 'Widok';
	$strViews = 'Widoki';
	$strShowAllViews = 'Poka&#380; wszystkie widoki';
	$strNoView = 'Nie znaleziono widoku.';
	$strNoViews = 'Nie znaleziono widok&oacute;w.';
	$strCreateView = 'Utw&oacute;rz widok';
	$strViewName = 'Nazwa widoku';
	$strViewNeedsName = 'Musisz nazwa&#263; widok.';
	$strViewNeedsDef = 'Musisz zdefiniowa&#263; widok.';
	$strViewCreated = 'Widok utworzony.';
	$strViewCreatedBad = 'Pr&oacute;ba utworzenia widoku si&#281; nie powiod&#322;a.';
	$strConfDropView = 'Czy na pewno chcesz usun&#261;&#263; widok &quot;%s&quot;?';
	$strViewDropped = 'Widok usuni&#281;ty.';
	$strViewDroppedBad = 'Pr&oacute;ba usuni&#281;cia widoku si&#281; nie powiod&#322;a.';
	$strViewUpdated = 'Widok zaktualizowany.';
	$strViewUpdatedBad = 'Pr&oacute;ba aktualizacji widoku si&#281; nie powiod&#322;a.';

	// Sequences
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strShowAllSequences = 'Poka&#380; wszystkie sekwencje';
	$strNoSequence = 'Nie znaleziono sekwencji.';
	$strNoSequences = 'Nie znaleziono sekwencji.';
	$strCreateSequence = 'Utw&oacute;rz sekwencj&#281;';
	$strSequenceName = 'Nazwa sekwencji';
	$strLastValue = 'last_value';
	$strIncrementBy = 'increment_by';	
	$strMaxValue = 'max_value';
	$strMinValue = 'min_value';
	$strCacheValue = 'cache_value';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cycled';
	$strIsCalled = 'is_called';
	$strSequenceNeedsName = 'Musisz nazwa&#263; sekwencj&#281;';
	$strSequenceCreated = 'Utworzono sekwencj&#281;';
	$strSequenceCreatedBad = 'Pr&oacute;ba utworzenia sekwencji si&#281; nie powiod&#322;a.';
	$strConfDropSequence = 'Czy na pewno chcesz usun&#261;&#263; sekwencj&#281; &quot;%s&quot;?';
	$strSequenceDropped = 'Sekwencja usuni&#281;ta.';
	$strSequenceDroppedBad = 'Pr&oacute;ba usuni&#281;cia sekwencji si&#281; nie powiod&#322;a.';
						
	// Indeksy
	$strIndex = 'Indeks';
	$strIndexes = 'Indeksy';
	$strShowAllIndexes = 'Poka&#380; wszystkie indeksy';
	$strNoIndex = 'Nie znaleziono indeksu.';
	$strNoIndexes = 'Nie znaleziono indeks&oacute;w.';
	$strCreateIndex = 'Utw&oacute;rz indeks';
	$strIndexName = 'Nazwa indeksu';
	$strTabName = 'Tab Name';
	$strColumnName = 'Nazwa kolumny';
	$strIndexNeedsName = 'Musisz nazwa&#263; indeks.';
	$strIndexNeedsCols = 'W sk&#322;ad indeksu musi wchodzi&#263; przynajmniej jedna kolumna.';
	$strIndexCreated = 'Indeks utworzony';
	$strIndexCreatedBad = 'Pr&oacute;ba utworzenia indeksu si&#281; nie powiod&#322;a.';
	$strConfDropIndex = 'Czy na pewno chcesz usun&#261;&#263; indeks &quot;%s&quot;?';
	$strIndexDropped = 'Indeks usuni&#281;ty.';
	$strIndexDroppedBad = 'Pr&oacute;ba usuni&#281;cia indeksu si&#281; nie powiod&#322;a.';
	$strKeyName = 'Nazwa klucza';
	$strUniqueKey = 'Klucz Unikatowy';
	$strPrimaryKey = 'Klucz G&#322;&oacute;wny';
	
	// Regu&#322;y
	$strRule = 'Regu&#322;a';
	$strRules = 'Regu&#322;y';
	$strShowAllRules = 'Poka&#380; wszystkie regu&#322;y';
	$strNoRule = 'Nie znaleziono regu&#322;y.';
	$strNoRules = 'Nie znaleziono regu&#322;.';
	$strCreateRule = 'Utw&oacute;rz regu&#322;&#281;';
	$strRuleName = 'Nazwa regu&#322;y';
	$strRuleNeedsName = 'Musisz nazwa&#263; regu&#322;&#281;.';
	$strRuleCreated = 'Utworzono regu&#322;&#281;.';
	$strRuleCreatedBad = 'Pr&oacute;ba utworzenia regu&#322;y si&#281; nie powiod&#322;a.';
	$strConfDropRule = 'Czy na pewno chcesz usun&#261;&#263; regu&#322;&#281; &quot;%s&quot; na &quot;%s&quot;?';
	$strRuleDropped = 'Regu&#322;a usuni&#281;ta.';
	$strRuleDroppedBad = 'Operacja usuni&#281;cia regu&#322;y si&#281; nie powiod&#322;a.';
	
	// Wi&#281;zy integralno&#347;ci
	$strConstraints = 'Wi&#281;zy integralno&#347;ci';
	$strShowAllConstraints = 'Poka&#380; wszystkie wi&#281;zy integralno&#347;ci';
	$strNoConstraints = 'Nie znaleziono wi&#281;z&oacute;w integralno&#347;ci.';
	$strCreateConstraint = 'Utw&oacute;rz wi&#281;zy integralno&#347;ci';
	$strConstraintCreated = 'Utworzono wi&#281;zy integralno&#347;ci.';
	$strConstraintCreatedBad = 'Pr&oacute;ba utworzenia wi&#281;z&oacute;w integralno&#347;ci si&#281; nie powiod&#322;a.';
	$strConfDropConstraint = 'Czy na pewno chcesz usun&#261;&#263; wi&#281;zy integralno&#347;ci &quot;%s&quot; na &quot;%s&quot;?';
	$strConstraintDropped = 'Wi&#281;zy integralno&#347;ci usuni&#281;te.';
	$strConstraintDroppedBad = 'Operacja usuni&#281;cia wi&#281;z&oacute;w integralno&#347;ci si&#281; nie powiod&#322;a.';
		
	// Functions
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strShowAllFunctions = 'Poka&#380; wszystkie funkcje';
	$strNoFunction = 'Nie znaleziono funkcji.';
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strCreateFunction = 'Utw&oacute;rz funkcj&#281;';
	$strFunctionName = 'Nazwa funkcji';
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strFunctionNeedsName = 'Musisz nazwa&#263; funkcj&#281;.';
	$strFunctionNeedsDef = 'Musisz zdefiniowa&#263; funkcj&#281;.';
	$strFunctionCreated = 'Utworzono funkcj&#281;.';
	$strFunctionCreatedBad = 'Pr&oacute;ba utworzenia funkcji si&#281; nie powiod&#322;a';
        $strConfDropFunction = 'Czy na pewno chcesz usun&#261;&#263; funkcj&#281; &quot;%s&quot;?';
	$strFunctionDropped = 'Funkcja usuni&#281;ta.';
	$strFunctionDroppedBad = 'Operacja usuni&#281;cia funkcji si&#281; nie powiod&#322;a.';
	$strFunctionUpdated = 'Funkcja zaktualizowana.';
	$strFunctionUpdatedBad = 'Operacja aktualizacji funkcji si&#281; nie powiod&#322;a.';

	// Triggers
	$strTrigger = 'Procedura wyzwalana';
	$strTriggers = 'Procedury wyzwalane';
	$strShowAllTriggers = 'Poka&#380; wszystkie procedury wyzwalane';
	$strNoTrigger = 'Nie znaleziono procedury wyzwalanej.';
	$strNoTriggers = 'Nie znaleziono procedur wyzwalanych.';
	$strCreateTrigger = 'Utw&oacute;rz procedur&#281; wyzwalan&#261;';
	$strTriggerName = 'Nazwa procedury wyzwalanej';
	$strTriggerNeedsName = 'Musisz nazwa&#263; procedur&#281; wyzwalan&#261;';
	$strTriggerCreated = 'Utworzono procedur&#281; wyzwalan&#261;.';
	$strTriggerCreatedBad = 'Pr&oacute;ba utworzenia procedury wyzwalanej si&#281; nie powiod&#322;a';
        $strConfDropTrigger = 'Czy na pewno chcesz usun&#261;&#263; procedur&#281; &quot;%s&quot; wyzwalan&#261; przez &quot;%s&quot;?';
	$strTriggerDropped = 'Procedura wyzwalana usuni&#281;ta.';
	$strTriggerDroppedBad = 'Operacja usuni&#281;cia procedury wyzwalanej si&#281; nie powiod&#322;a.';
		
	// Types
	$strType = 'Typ';
	$strTypes = 'Typy';
	$strShowAllTypes = 'Poka&#380; wszystkie typy';
	$strNoType = 'Nie znaleziono typu.';
	$strNoTypes = 'Nie znaleziono typ&oacute;w.';
	$strCreateType = 'Utw&oacute;rz typ';
	$strTypeName = 'Nazwa typu';
	$strInputFn = 'Funkcja wej&#347;ciowa';
	$strOutputFn = 'Funkcja wyj&#347;ciowa';
	$strPassByVal = 'Przekazywany przez warto&#347;&#263;?';
	$strAlignment = 'Wyr&oacute;wnanie bajtowe';
	$strElement = 'Typ element&oacute;w';
	$strDelimiter = 'Znak oddzielaj&#261;cy elementy tablicy';
	$strStorage = 'Technika przechowywania';
	$strTypeNeedsName = 'Musisz nazwa&#263; typ.';
	$strTypeNeedsLen = 'Musisz poda&#263; d&#322;ugo&#347;&#263; typu.';
	$strTypeCreated = 'Typ utworzony';
	$strTypeCreatedBad = 'Pr&oacute;ba utworzenia typu si&#281; nie powiod&#322;a.';
	$strConfDropType = 'Czy na pewno chcesz usun&#261;&#263; typ &quot;%s&quot;?';
	$strTypeDropped = 'Typ usuni&#281;ty.';
	$strTypeDroppedBad = 'Pr&oacute;ba usuni&#281;cia typu si&#281; nie powiod&#322;a.';

	// Schemas
	$strSchema = 'Schemat';
	$strSchemas = 'Schematy';
	$strShowAllSchemas = 'Poka&#380; wszystkie schematy';
	$strNoSchema = 'Nie znaleziono schematu.';
	$strNoSchemas = 'Nie znaleziono schemat&oacute;w.';
	$strCreateSchema = 'Utw&oacute;rz schemat';
	$strSchemaName = 'Nazwa schematu';
	$strSchemaNeedsName = 'Musisz nada&#263; schematowi nazw&#281;.';
	$strSchemaCreated = 'Schemat zosta&#322; utworzony';
	$strSchemaCreatedBad = 'Pr&oacute;ba utworzenia schematu si&#281; nie powiod&#322;a.';
	$strConfDropSchema = 'Czy na pewno chcesz usun&#261;&#263; schemat &quot;%s&quot;?';
	$strSchemaDropped = 'Schemat usuni&#281;ty.';
	$strSchemaDroppedBad = 'Pr&oacute;ba usuni&#281;cia schematu si&#281; nie powiod&#322;a.';

	// Reports
	$strReport = 'Raport';
	$strReports = 'Raporty';
	$strNoReports = 'Nie znaleziono raport&oacute;w.';
	$strCreateReport = 'Utw&oacute;rz raport';
	$strReportDropped = 'Raport usuni&#281;ty.';
	$strReportDroppedBad = 'Pr&oacute;ba usuni&#281;cia raportu si&#281; nie powiod&#322;a.';
	$strConfDropReport = 'Czy na pewno chcesz usun&#261;&#263; raport &quot;%s&quot;?';
        $strReportNeedsName = 'Musisz nada&#263; raportowi nazw&#281;.';
	$strReportNeedsDef = 'Musisz zdefiniowa&#263; zapytanie SQL tworz&#261;ce raport.';
	$strReportCreated = 'Raport utworzony.';
	$strReportCreatedBad = 'Pr&oacute;ba utworzenia raportu si&#281; nie powiod&#322;a.';

	// Miscellaneous
	$strTopBar = '%s uruchomiony na %s:%s -- Jeste&#347; zalogowany jako &quot;%s&quot;, %s';
	$strTimeFmt = 'jS M, Y g:iA';

?>
