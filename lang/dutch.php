<?php

	/**
	 * Dutch Language file for WebDB.
	 * @maintainer Hugo Jonker [hugo@gewis.win.tue.nl]
	 *
	 * $Id: dutch.php,v 1.8 2003/04/13 10:55:58 jmpoure Exp $
	 */

	$lang['applang'] = 'Nederlands';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'nl_NL';
  
	$lang['strnoframes'] = 'Deze applicatie maakt gebruik van frames. U heeft een browser nodig, die frames ondersteund, om deze applicatie te gebruiken. ';
	$lang['strlogin'] = 'Login';
	$lang['strnotables'] = 'Geen tabellen gevonden.';
	$lang['strnotable'] = 'Geen tabel gevonden.';
	$lang['strnoviews'] = 'Geen views gevonden.';
	$lang['strnofunctions'] = 'Geen functies gevonden.';
	$lang['strowner'] = 'Eigenaar';
	$lang['straction'] = 'Actie';	
	$lang['stractions'] = 'Acties';	
	$lang['strname'] = 'Naam';
	$lang['strtable'] = 'Tabel';
	$lang['strtables'] = 'Tabellen';
	$lang['strview'] = 'View';
	$lang['strviews'] = 'Views';
	$lang['strdefinition'] = 'Definitie';
	$lang['strtriggers'] = 'Triggers';
	$lang['strrules'] = 'Regels';
	$lang['strsequence'] = 'Sequence';
	$lang['strsequences'] = 'Sequences';
	$lang['strfunction'] = 'Functie';
	$lang['strfunctions'] = 'Functies';
	$lang['stroperators'] = 'Operatoren';
	$lang['strtypes'] = 'Types';
	$lang['straggregates'] = 'Aggregaten';
	$lang['strproperties'] = 'Eigenschappen';
	$lang['strbrowse'] = 'Bekijk';
	$lang['strdrop'] = 'Verwijder';
	$lang['strdropped'] = 'Verwijderd';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Niet Null';
	$lang['strprev'] = 'Vorige';
	$lang['strnext'] = 'Volgende';
	$lang['strfailed'] = 'mislukt';
	$lang['strnotloaded'] = 'Deze PHP-install is zonder ondersteuning dit type database niet gecompileerd.';
	$lang['strcreate'] = 'Creëer';
	$lang['strcomment'] = 'Commentaar';

	$lang['strlength'] = 'Lengte';
	$lang['strdefault'] = 'Standaard';
	$lang['stralter'] = 'Wijzig';
	$lang['strcancel'] = 'Cancel';
	$lang['strprivileges'] = 'Privileges';
	$lang['strinsert'] = 'Voeg in';
	$lang['strselect'] = 'Selecteer';
	$lang['strdelete'] = 'Verwijder';
	$lang['strupdate'] = 'Vernieuw';
	$lang['strrule'] = 'Regel';
	$lang['strreferences'] = 'Referenties';
	$lang['strtrigger'] = 'Triggers';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nee';
	$lang['stredit'] = 'Edit';
	$lang['strinvalidparam'] = 'Ongeldige parameters.';

	// Error handling
	$lang['strsqlerror'] = 'SQL fout:';
	$lang['strinstatement'] = 'In statement:';
	
	// Users
	$lang['struser'] = 'Gebruiker';
	$lang['strgroup'] = 'Groep';
	$lang['strusername'] = 'Gebruikersnaam';
	$lang['strpassword'] = 'wachtwoord';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Cre&eumler DB?';
	$lang['strexpires'] = 'Verloopt';	
	$lang['strnousers'] = 'Geen gebruikers gevonden.';
	
	// Databases
	$lang['strdatabase'] = 'Database';
	$lang['strdatabases'] = 'Databases';
	$lang['strnodatabases'] = 'Geen Databases gevonden.';
	$lang['strdatabaseneedsname'] = 'U dient uw database een naam te geven.';
	
	// Views
	$lang['strviewneedsname'] = 'U dient uw view een naam te geven.';
	$lang['strviewneedsdef'] = 'U dinet uw view te definiëren.';

	// Sequences
	$lang['strnosequences'] = 'Geen sequences gevonden.';
	//$lang['strsequencename'] = 'sequence_naam';
	$lang['strlastvalue'] = 'laatste_waarde';
	$lang['strincrementby'] = 'verhoog_met';	
	$lang['strmaxvalue'] = 'max_waarde';
	$lang['strminvalue'] = 'min_waarde';
	$lang['strcachevalue'] = 'cache_waarde';
	$lang['strlogcount'] = 'log_cnt';
	$lang['striscycled'] = 'is_cyclisch';
	$lang['striscalled'] = 'is_aangeroepen';
	$lang['strreset'] =	'Reset';

	// Indicies
	$lang['strindexname'] = 'Index Naam';
	$lang['strtabname'] = 'Tab Naam';
	$lang['strcolumnname'] = 'Kolom Naam';
	$lang['struniquekey'] = 'Unieke sleutel';
	$lang['strprimarykey'] = 'Primaire sleutel';
	
	// Tables
	$lang['strfield'] = 'veld';
	$lang['strfields'] = 'velden';
	$lang['strtype'] = 'type';
	$lang['strvalue'] = 'waarde';
	$lang['strshowalltables'] = 'Toon alle tabellen';
	$lang['strunique'] = 'uniek';
	$lang['strprimary'] = 'Primair';
	$lang['strkeyname'] = 'sleutel naam';
	$lang['strnumfields'] = 'aantal velden';
	$lang['strcreatetable'] = 'creëer tabel';
	$lang['strtableneedsname'] = 'U dient uw tabel een naam te geven.';
	$lang['strtableneedscols'] = 'U dient uw tabel een geldig aantal kolommen te geven.';
	$lang['strexport'] = 'exporteer';
	$lang['strconstraints'] = 'constraints';
	$lang['strcolumns'] = 'kolommen';
	
	// Functions
	$lang['strreturns'] = 'Retourneert';
	$lang['strarguments'] = 'Argumenten';
	$lang['strlanguage'] = 'taal';
	$lang['strfunctionneedsname'] = 'U dient uw functie een naam te geven.';
	$lang['strfunctionneedsdef'] = 'U dient uw functie te definiëren.';
	
	// Triggers
	$lang['strtriggers'] = 'Triggers';
	$lang['strnotriggers'] = 'Geen triggers gevonden.';
	$lang['strcreatetrigger'] = 'creëer trigger';
	
	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strnotypes'] = 'Geen types gevonden.';
	$lang['strcreatetype'] = 'creëer type';
	$lang['strconfdroptype'] = 'Weet u zeker dat u het type \"%s\" wilt verwijderen?';
	$lang['strtypedropped'] = 'Type verwijderd.';
	$lang['strtypedroppedbad'] = 'Verwijdering van het type mislukt.';
	$lang['strtypecreated'] = 'Type gecreëerd';
	$lang['strtypecreatedbad'] = 'Type creatie mislukt.';
	$lang['strshowalltypes'] = 'Toon alle types';
	$lang['strinputfn'] = 'Invoer functie';
	$lang['stroutputfn'] = 'Uitvoer functie';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Scheidingsteken';
	$lang['strstorage'] = 'Opslag';
	$lang['strtypeneedsname'] = 'U dient uw type een naam te geven.';
	$lang['strtypeneedslen'] = 'U dient uw type een lengte te geven.';

?>
