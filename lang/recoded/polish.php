<?php

	/**
	 * Polish language file for WebDB.
	 * @maintainer Rafal Slubowski [slubek@users.sourceforge.net]
	 *
	 * $Id: polish.php,v 1.1 2003/01/18 08:23:24 chriskl Exp $
	 */

	$appLang = 'Polish';
	$appCharset = 'ISO-8859-2';

	$strIntro = 'Witaj w WebDB.';
	$strNoFrames = 'Aby u&#380;ywa&#263; tej aplikacji potrzebujesz przegl&#261;darki obs&#322;uguj&#261;cej ramki.';
	$strBadConfig = 'Tw&oacute;j plik config.inc.php jest przestarza&#322;y. Musisz go utworzy&#263; ponownie wykorzystuj&#261;c nowy config.inc.php-dist.';
	$strLogin = '- Zaloguj';
	$strLoginFailed = 'Pr&oacute;ba zalogowania nie powiod&#322;a si&#281;';
	$strServer = 'Serwer';
	$strUserAdmin = 'Administracja kontami u&#380;ytkownik&oacute;w';
	$strGroupAdmin = 'Administracja grupami u&#380;ytkownik&oacute;w';
	$strLogout = 'Wyloguj si&#281;';
	$strNoTables = 'Nie znaleziono tablic.';
	$strNoTable = 'Nie znaleziono tablicy.';
	$strNoViews = 'Nie znaleziono widok&oacute;w.';
	$strNoFunctions = 'Nie znaleziono funkcji.';
	$strOwner = 'W&#322;a&#347;ciciel';
	$strAction = 'Akcja';	
	$strActions = 'Akcje';	
	$strName = 'Nazwa';
	$strTable = 'Tabela';
	$strTables = 'Tabele';
	$strView = 'Widok';
	$strViews = 'Widoki';
	$strDefinition = 'Definicja';
	$strRules = 'Regu&#322;y';
	$strSequence = 'Sekwencja';
	$strSequences = 'Sekwencje';
	$strFunction = 'Funkcja';
	$strFunctions = 'Funkcje';
	$strOperators = 'Operatory';
	$strTypes = 'Typy';
	$strAggregates = 'Funkcje agreguj&#261;ce';
	$strIndicies = 'Indeksy';
	$strProperties = 'W&#322;a&#347;ciwo&#347;ci';
	$strBrowse = 'Przegl&#261;daj';
	$strDrop = 'Usu&#324;';
	$strDropped = 'Usuni&#281;ty';
	$strNull = 'Null';
	$strNotNull = 'Not Null';
	$strPrev = 'Poprzedni';
	$strNext = 'Nast&#281;pny';
	$strFailed = 'Failed';
	$strNotLoaded = 'Nie wkompilowa&#322;e&#347; do PHP obs&#322;ugi tej bazy danych.';
	$strCreate = 'Utw&oacute;rz';
	$strComment = 'Skomentuj';
	$strNext = 'Nast&#281;pny';
	$strLength = 'D&#322;ugo&#347;&#263;';
	$strDefault = 'Domy&#347;lny';
	$strAlter = 'Zmie&#324;';
	$strCancel = 'Anuluj';
	$strSave = 'Zapisz';
	$strInsert = 'Wstaw';
	$strSelect = 'Wybierz';
	$strDelete = 'Usu&#324;';
	$strUpdate = 'Zmie&#324;';
	$strRule = 'Regu&#322;a';
	$strReferences = 'Odno&#347;niki';
	$strYes = 'Tak';
	$strNo = 'Nie';
	$strEdit = 'Edycja';
	$strInvalidScriptParam = 'B&#322;&#281;dny parametr skryptu.';
	$strRows = 'wiersz(y)';
	$strExample = 'np.';

	// Error handling
        $strSQLError = 'B&#322;&#261;d SQL:';
        $strInStatement = 'W poleceniu:';
			
	// Users
	$strUser = 'U&#380;ytkownik';
	$strUsers = 'U&#380;ytkownicy';
	$strUsername = 'Nazwa u&#380;ytkownika';
	$strPassword = 'Has&#322;o';
	$strSuper = 'Administrator?';
	$strCreateDB = 'Tworzenie BD?';
	$strExpires = 'Wygasa';	
	$strNoUsers = 'Nie znaleziono u&#380;ytkownik&oacute;w.';
	
	// Groups
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
	
	// Views
	$strViewNeedsName = 'Musisz nazwa&#263; widok.';
	$strViewNeedsDef = 'Musisz zdefiniowa&#263; widok.';

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

	// Indicies
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
	
	// Tables
	$strField = 'Pole';
	$strFields = 'Pola';
	$strType = 'Typ';
	$strValue = 'Warto&#347;&#263;';
	$strShowAllTables = 'Poka&#380; wszystkie tablice';
	$strUnique = 'Unikatowy';
	$strPrimary = 'G&#322;&oacute;wny';
	$strKeyName = 'Nazwa Klucza';
	$strNumFields = 'Ilo&#347;&#263; P&oacute;l';
	$strCreateTable = 'Utw&oacute;rz Tabel&#281;';
	$strTableNeedsName = 'Musisz nazwa&#263; tabel&#281;.';
	$strTableNeedsCols = 'Musisz poda&#263; prawid&#322;ow&#261; liczb&#281; kolumn.';
	$strExport = 'Eksport';
        $strConstraints = 'Wi&#281;zy integralno&#347;ci';
        $strColumns = 'Kolumny';
		
	// Functions
	$strReturns = 'Zwraca';
	$strArguments = 'Parametry';
	$strLanguage = 'J&#281;zyk';
	$strFunctionNeedsName = 'Musisz nazwa&#263; funkcj&#281;.';
	$strFunctionNeedsDef = 'Musisz zdefiniowa&#263; funkcj&#281;.';
	
	// Triggers
	$strTrigger = 'Trigger';
	$strTriggers = 'Wi&#281;zy integralno&#347;ci';
	$strNoTriggers = 'Nie znaleziono trigger&oacute;w.';
	$strCreateTrigger = 'Utw&oacute;rz Trigger';

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

?>
