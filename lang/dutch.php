<?php

	/**
	 * Dutch Language file for WebDB.
	 * @maintainer Hugo Jonker [hugo@gewis.win.tue.nl]
	 *
	 * $Id: dutch.php,v 1.2 2002/12/24 02:09:52 chriskl Exp $
	 */

	$appLang = 'nederlands';
	$appCharset = 'utf-8';

	$strNoFrames = 'Deze applicatie maakt gebruik van frames. U heeft een browser nodig, die frames ondersteund, om deze applicatie te gebruiken. ';
	$strLogin = 'Login';
	$strNoTables = 'Geen tabellen gevonden.';
	$strNoTable = 'Geen tabel gevonden.';
	$strNoViews = 'Geen views gevonden.';
	$strNoFunctions = 'Geen functies gevonden.';
	$strOwner = 'Eigenaar';
	$strAction = 'Actie';	
	$strActions = 'Acties';	
	$strName = 'Naam';
	$strTable = 'Tabel';
	$strTables = 'Tabellen';
	$strView = 'View';
	$strViews = 'Views';
	$strDefinition = 'Definitie';
	$strTriggers = 'Triggers';
	$strRules = 'Regels';
	$strSequence = 'Sequence';
	$strSequences = 'Sequences';
	$strFunction = 'Functie';
	$strFunctions = 'Functies';
	$strOperators = 'Operatoren';
	$strTypes = 'Types';
	$strAggregates = 'Aggregaten';
	$strIndicies = 'Indices';
	$strProperties = 'Eigenschappen';
	$strBrowse = 'Bekijk';
	$strDrop = 'Verwijder';
	$strDropped = 'Verwijderd';
	$strNull = 'Null';
	$strNotNull = 'Niet Null';
	$strPrev = 'Vorige';
	$strNext = 'Volgende';
	$strFailed = 'mislukt';
	$strNotLoaded = 'Deze PHP-install is zonder ondersteuning dit type database niet gecompileerd.';
	$strCreate = 'Cre&euml;er';
	$strComment = 'Commentaar';

	$strLength = 'Lengte';
	$strDefault = 'Standaard';
	$strAlter = 'Wijzig';
	$strCancel = 'Cancel';
	$strPrivileges = 'Privileges';
	$strInsert = 'Voeg in';
	$strSelect = 'Selecteer';
	$strDelete = 'Verwijder';
	$strUpdate = 'Vernieuw';
	$strRule = 'Regel';
	$strReferences = 'Referenties';
	$strTrigger = 'Triggers';
	$strYes = 'Ja';
	$strNo = 'Nee';
	$strEdit = 'Edit';
	$strInvalidParam = 'Ongeldige parameters.';

	// Error handling
	$strSQLError = 'SQL fout:';
	$strInStatement = 'In statement:';
	
	// Users
	$strUser = 'Gebruiker';
	$strGroup = 'Groep';
	$strUsername = 'Gebruikersnaam';
	$strPassword = 'wachtwoord';
	$strSuper = 'Superuser?';
	$strCreateDB = 'Cre&eumler DB?';
	$strExpires = 'Verloopt';	
	$strNoUsers = 'Geen gebruikers gevonden.';
	
	// Databases
	$strDatabase = 'Database';
	$strDatabases = 'Databases';
	$strNoDatabases = 'Geen Databases gevonden.';
	$strDatabaseNeedsName = 'U dient uw database een naam te geven.';
	
	// Views
	$strViewNeedsName = 'U dient uw view een naam te geven.';
	$strViewNeedsDef = 'U dinet uw view te defini&euml;ren.';

	// Sequences
	$strNoSequences = 'Geen sequences gevonden.';
	$strSequenceName = 'sequence_naam';
	$strLastValue = 'laatste_waarde';
	$strIncrementBy = 'verhoog_met';	
	$strMaxValue = 'max_waarde';
	$strMinValue = 'min_waarde';
	$strCacheValue = 'cache_waarde';
	$strLogCount = 'log_cnt';
	$strIsCycled = 'is_cyclisch';
	$strIsCalled = 'is_aangeroepen';
	$strReset =	'Reset';

	// Indicies
	$strIndexName = 'Index Naam';
	$strTabName = 'Tab Naam';
	$strColumnName = 'Kolom Naam';
	$strUniqueKey = 'Unieke sleutel';
	$strPrimaryKey = 'Primaire sleutel';
	
	// Tables
	$strField = 'veld';
	$strFields = 'velden';
	$strType = 'type';
	$strValue = 'waarde';
	$strShowAllTables = 'Toon alle tabellen';
	$strUnique = 'uniek';
	$strPrimary = 'Primair';
	$strKeyName = 'sleutel naam';
	$strNumFields = 'aantal velden';
	$strCreateTable = 'cre&euml;er tabel';
	$strTableNeedsName = 'U dient uw tabel een naam te geven.';
	$strTableNeedsCols = 'U dient uw tabel een geldig aantal kolommen te geven.';
	$strExport = 'exporteer';
	$strConstraints = 'constraints';
	$strColumns = 'kolommen';
	
	// Functions
	$strReturns = 'Retourneert';
	$strArguments = 'Argumenten';
	$strLanguage = 'taal';
	$strFunctionNeedsName = 'U dient uw functie een naam te geven.';
	$strFunctionNeedsDef = 'U dient uw functie te defini&euml;ren.';
	
	// Triggers
	$strTriggers = 'Triggers';
	$strNoTriggers = 'Geen triggers gevonden.';
	$strCreateTrigger = 'cre&euml;er trigger';
	
	// Types
	$strType = 'Type';
	$strTypes = 'Types';
	$strNoTypes = 'Geen types gevonden.';
	$strCreateType = 'cre&euml;er type';
	$strConfDropType = 'Weet u zeker dat u het type "%s" wilt verwijderen?';
	$strTypeDropped = 'Type verwijderd.';
	$strTypeDroppedBad = 'Verwijdering van het type mislukt.';
	$strTypeCreated = 'Type gecre&euml;erd';
	$strTypeCreatedBad = 'Type creatie mislukt.';
	$strShowAllTypes = 'Toon alle types';
	$strInputFn = 'Invoer functie';
	$strOutputFn = 'Uitvoer functie';
	$strPassByVal = 'Passed by val?';
	$strAlignment = 'Alignment';
	$strElement = 'Element';
	$strDelimiter = 'Scheidingsteken';
	$strStorage = 'Opslag';
	$strTypeNeedsName = 'U dient uw type een naam te geven.';
	$strTypeNeedsLen = 'U dient uw type een lengte te geven.';

?>
