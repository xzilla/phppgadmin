<?php

	/**
	 * German Language file for phpPgAdmin.
	 * @maintainer H. Etzel [hetzel.devel@web.de]
	 *
	 * $Id: german.php,v 1.8 2003/04/28 11:50:16 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Deutsch';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'de_DE';

	// Basic strings
	$lang['strintro'] = 'Willkommen bei phpPgAdmin.';
	$lang['strlogin'] = 'Einloggen';
	$lang['strloginfailed'] = 'Einloggen fehlgeschlagen';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Ausloggen';
	$lang['strowner'] = 'Besitzer';
	$lang['straction'] = 'Aktion';
	$lang['stractions'] = 'Aktionen';
	$lang['strname'] = 'Name';
	$lang['strdefinition'] = 'Definition';
	$lang['stroperators'] = 'Operatoren';
	$lang['straggregates'] = 'Aggregationen';
	$lang['strproperties'] = 'Eigenschaften';
	$lang['strbrowse'] = 'Durchsuchen';
	$lang['strdrop'] = 'Löschen';
	$lang['strdropped'] = 'Gelöscht';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'zurück';
	$lang['strnext'] = 'weiter';
	$lang['strfailed'] = 'misslungen';
	$lang['strcreate'] = 'Erzeugen';
	$lang['strcreated'] = 'Erzeugt';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'Länge';
	$lang['strdefault'] = 'Vorgabe';
	$lang['stralter'] = 'Ändern';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Abbruch';
	$lang['strsave'] = 'Speichern';
	$lang['strreset'] = 'Zurücksetzen';
	$lang['strinsert'] = 'Einfügen';
	$lang['strselect'] = 'Select-Abfrage';
	$lang['strdelete'] = 'Löschen';
	$lang['strupdate'] = 'Aktualisieren';
	$lang['strreferences'] = 'Referenzen';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nein';
	$lang['stredit'] = 'Bearbeiten';
	$lang['strcolumns'] = 'Spalten';
	$lang['strrows'] = 'Zeile(n)';
	$lang['strexample'] = 'z.B.';
	$lang['strback'] = 'Zurück';
	$lang['strqueryresults'] = 'Abfrageergebnis';
	$lang['strshow'] = 'Zeigen';
	$lang['strempty'] = 'Leeren';
	$lang['strlanguage'] = 'Sprache';
	$lang['strencoding'] = 'Codierung';
	$lang['strvalue'] = 'Wert';
	$lang['strunique'] = 'eindeutig';
	$lang['strprimary'] = 'Primär';
	$lang['strexport'] = 'Exportieren';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analysieren';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindizierung';
	$lang['strrun'] = 'Los';
	$lang['stradd'] = 'Hinzufügen';
	$lang['strevent'] = 'Ereignis';
	$lang['strwhere'] = 'wo';
	$lang['strinstead'] = 'mache stattdessen';
	$lang['strwhen'] = 'Wann';
	$lang['strformat'] = 'Format';

        // Error handling
	$lang['strnoframes'] = 'Für dieses Programm wird ein ein Frame-fähiger Browser benötigt.';
	$lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie müssen die aus der config.inc.php-dist neu erzeugen.<br/>(Siehe auch INSTALL im Installationsverzeichnis von phpPgAdmin)';
	$lang['strnotloaded'] = 'Ihre PHP - Installation besitzt keine Datenbankunterstützung.';
	$lang['strbadschema'] = 'Unzulässiges Schema angegeben.';
	$lang['strbadencoding'] = 'Abbruch beim Setzen der Benutzer-Codierung in der Datenbank.';
	$lang['strsqlerror'] = 'SQL Fehler:';
	$lang['strinstatement'] = 'In Anweisung:';
	$lang['strinvalidparam'] = 'Unzülässige Scriptparameter.';
	$lang['strnodata'] = 'Keine Zeilen gefunden.';

	// Tables
	$lang['strtable'] = 'Tabelle';
	$lang['strtables'] = 'Tabellen';
	$lang['strshowalltables'] = 'Zeige alle Tabellen';
	$lang['strnotables'] = 'Keine Tabellen gefunden.';
	$lang['strnotable'] = 'Keine Tabelle gefunden.';
	$lang['strcreatetable'] = 'Neue Tabelle erzeugen';
	$lang['strtablename'] = 'Tabellenname';
	$lang['strtableneedsname'] = 'Sie müssen für die Tabelle einen Namen angeben.';
	$lang['strtableneedsfield'] = 'Sie müssen mindestens ein Feld angeben.';
	$lang['strtableneedscols'] = 'Sie müssen eine zulässige Anzahl an Spalten angeben.';
	$lang['strtablecreated'] = 'Tabelle erzeugt.';
	$lang['strtablecreatedbad'] = 'Ergeugen der Tabelle fehlgeschlagen.';
	$lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle "%s" löschen möchten?';
	$lang['strtabledropped'] = 'Tabelle gelöscht.';
	$lang['strtabledroppedbad'] = 'Löschen der Tabelle fehlgeschlagen.';
	$lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Tabelleninhalt der Tabelle "%s" löschen möchten?';
	$lang['strtableemptied'] = 'Tabelleninhalt gelöscht.';
	$lang['strtableemptiedbad'] = 'Löschen des Tabelleninhaltes fehlgeschlagen.';
	$lang['strinsertrow'] = 'Zeile einfügen';
	$lang['strrowinserted'] = 'Zeile eingefügt.';
	$lang['strrowinsertedbad'] = 'Einfügen der Zeile fehlgeschlagen.';
	$lang['streditrow'] = 'Zeile bearbeiten';
	$lang['strrowupdated'] = 'Zeile aktualisiert.';
	$lang['strrowupdatedbad'] = 'Aktualisieren der Zeile fehlgeschlagen.';
	$lang['strdeleterow'] = 'Zeile löschen';
	$lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diese Zeile löschen möchten?';
	$lang['strrowdeleted'] = 'Zeile gelöscht.';
	$lang['strrowdeletedbad'] = 'Löschen der Zeile fehlgeschlagen.';
	$lang['strsaveandrepeat'] = 'Speichern und Wiederholen';
	$lang['strfield'] = 'Feld';
	$lang['strfields'] = 'Felder';
	$lang['strnumfields'] = 'Anz. der Felder';
	$lang['strfieldneedsname'] = 'Sie müssen für das Feld einen Namen angeben';
	$lang['strselectneedscol'] = 'Sie müssen mindestens eine Spalte anzeigen lassen';
	$lang['straltercolumn'] = 'Spalte ändern';
	$lang['strcolumnaltered'] = 'Spalte geändert.';
	$lang['strcolumnalteredbad'] = 'Ändern der Spalte fehlgeschlagen.';
        $lang['strconfdropcolumn'] = 'Sind Sie sicher, dass Sie die Spalte "%s" aus der Tabelle "%s" löschen möchten?';
	$lang['strcolumndropped'] = 'Spalte gelöscht.';
	$lang['strcolumndroppedbad'] = 'Löschen der Spalte fehlgschlagen.';
	$lang['straddcolumn'] = 'Spalte hinzufügen';
	$lang['strcolumnadded'] = 'Spalte hinzugefügt.';
	$lang['strcolumnaddedbad'] = 'Hinzufügen der Spalte fehlgeschlagen.';
	$lang['strschemaanddata'] = 'Schema  Daten';
	$lang['strschemaonly'] = 'nur Schema';
	$lang['strdataonly'] = 'nur Daten';

	// Users
	$lang['struseradmin'] = 'Benutzer-Administration';
	$lang['struser'] = 'Benutzer';
	$lang['strusers'] = 'Benutzer';
	$lang['strusername'] = 'Benutzername';
	$lang['strpassword'] = 'Password';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'DB erzeugen?';
	$lang['strexpires'] = 'Gültig bis';
	$lang['strnousers'] = 'Keine Benutzer gefunden.';
        $lang['struserupdated'] = 'Benutzer aktualisiert.';
	$lang['struserupdatedbad'] = 'Aktualisieren des Benutzers fehlgeschlagen.';
	$lang['strshowallusers'] = 'Zeige alle Benutzer';
	$lang['strcreateuser'] = 'Erzeuge Benutzer';
	$lang['strusercreated'] = 'Benutzer erzeugt.';
	$lang['strusercreatedbad'] = 'Erzeugen des Benutzers fehlgeschlagen.';
	$lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer "%s" löschen möchten?';
	$lang['struserdropped'] = 'Benutzer gelöscht.';
	$lang['struserdroppedbad'] = 'Löschen des Benutzers fehlgeschlagen.';

	// Groups
	$lang['strgroupadmin'] = 'Gruppen-Administration';
	$lang['strgroup'] = 'Gruppe';
	$lang['strgroups'] = 'Gruppen';
	$lang['strnogroup'] = 'Gruppe nicht gefunden.';
	$lang['strnogroups'] = 'Keine Gruppen gefunden.';
	$lang['strcreategroup'] = 'Gruppe erzeugen';
	$lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
	$lang['strgroupneedsname'] = 'Sie müssen für die Gruppe einen Namen angeben.';
	$lang['strgroupcreated'] = 'Gruppe erzeugt.';
	$lang['strgroupcreatedbad'] = 'Erzeugen der Gruppe fehlgeschlagen.';
	$lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe "%s" löschen möchten?';
	$lang['strgroupdropped'] = 'Gruppe gelöscht.';
	$lang['strgroupdroppedbad'] = 'Löschen der Gruppe fehlgeschlagen.';
	$lang['strmembers'] = 'Mitglieder';

	// Privilges
	$lang['strprivilege'] = 'Privilegie';
	$lang['strprivileges'] = 'Privilegien';
	$lang['strnoprivileges'] = 'Dieses Objekt hat keine Privilegien.';
	$lang['strgrant'] = 'Privilegien geben';
	$lang['strrevoke'] = 'Privilegien entziehen';
	$lang['strgranted'] = 'Privilegien vergeben.';
	$lang['strgrantfailed'] = 'Vergeben von Privilegien fehlgeschlagen.';
	$lang['strgrantuser'] = 'Privilegien Benutzer geben';
	$lang['strgrantgroup'] = 'Privilegien Gruppe geben';

	// Databases
	$lang['strdatabase'] = 'Datenbank';
	$lang['strdatabases'] = 'Datenbanken';
	$lang['strshowalldatabases'] = 'Zeige alle Datenbanken';
	$lang['strnodatabase'] = 'Keine Datenbank gefunden.';
	$lang['strnodatabases'] = 'Keine Datenbanken gefunden.';
	$lang['strcreatedatabase'] = 'Datenbank erzeugen';
	$lang['strdatabasename'] = 'Datenbank Name';
	$lang['strdatabaseneedsname'] = 'Sie müssen für die Datenbank einen Namen angeben.';
	$lang['strdatabasecreated'] = 'Datenbank erzeugt.';
	$lang['strdatabasecreatedbad'] = 'Erzeugen der Datenbank fehlgeschlagen.';
	$lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank "%s" löschen möchten?';
	$lang['strdatabasedropped'] = 'Datenbank gelöscht.';
	$lang['strdatabasedroppedbad'] = 'Löschen der Datenbank fehlgeschlagen.';
	$lang['strentersql'] = 'Auszuführenden SQL-Code eingeben:';
	$lang['strvacuumgood'] = 'Vacuum abgeschlossen.';
	$lang['strvacuumbad'] = 'Vacuum fehlgeschlagen.';
	$lang['stranalyzegood'] = 'Analysieren abgeschlossen.';
	$lang['stranalyzebad'] = 'Analysieren fehlgeschlagen.';

	// Views
	$lang['strview'] = 'Sicht';
	$lang['strviews'] = 'Sichten';
	$lang['strshowallviews'] = 'Zeige alle Sichten';
	$lang['strnoview'] = 'Kein Sicht gefunden.';
	$lang['strnoviews'] = 'Keine Sichten gefunden.';
	$lang['strcreateview'] = 'Sicht erzeugen';
	$lang['strviewname'] = 'Sicht Name';
	$lang['strviewneedsname'] = 'Sie müssen für die Sicht einen Namen angeben.';
	$lang['strviewneedsdef'] = 'Sie müssen für die Sicht eine Definition angeben.';
	$lang['strviewcreated'] = 'Sicht erzeugt.';
	$lang['strviewcreatedbad'] = 'Erzeugen der Sicht fehlgeschlagen.';
	$lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht "%s" löschen möchten?';
	$lang['strviewdropped'] = 'Sicht gelöscht.';
	$lang['strviewdroppedbad'] = 'Löschen der Sicht fehlgeschlagen.';
	$lang['strviewupdated'] = 'Sicht aktualisiert.';
	$lang['strviewupdatedbad'] = 'Aktualisieren der Sicht fehlgeschlagen.';

	// Sequences
	$lang['strsequence'] = 'Sequenz';
	$lang['strsequences'] = 'Sequenzen';
	$lang['strshowallsequences'] = 'Zeige alle Sequenzen';
	$lang['strnosequence'] = 'Keine Sequenz gefunden.';
	$lang['strnosequences'] = 'Keine Sequenzen gefunden.';
	$lang['strcreatesequence'] = 'Erzeuge Sequenz';
	$lang['strlastvalue'] = 'Letzer Wert';
	$lang['strincrementby'] = 'Erhöhung um';
	$lang['strstartvalue'] = 'Startwert';
	$lang['strmaxvalue'] = 'Max. Wert';
	$lang['strminvalue'] = 'Min. Wert';
	$lang['strcachevalue'] = 'Cache Value';
	$lang['strlogcount'] = 'Log Anz.';
	$lang['striscycled'] = 'Zyklisch?';
	$lang['striscalled'] = 'Aufgerufen?';
	$lang['strsequenceneedsname'] = 'Sie müssen für die Sequenz einen Namen angeben.';
	$lang['strsequencecreated'] = 'Sequenz erzeugt.';
	$lang['strsequencecreatedbad'] = 'Erzeugen der Sequenz fehlgeschlagen.';
	$lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz "%s" löschen möchten?';
	$lang['strsequencedropped'] = 'Sequenz gelöscht.';
	$lang['strsequencedroppedbad'] = 'Löschen der Sequenz fehlgeschlagen.';

	// Indexes
	$lang['strindexes'] = 'Indizes';
	$lang['strindexname'] = 'Index Name';
	$lang['strshowallindexes'] = 'Zeige alle Indizes';
	$lang['strnoindex'] = 'Kein Index gefunden.';
	$lang['strnoindexes'] = 'Keine Indizes gefunden.';
	$lang['strcreateindex'] = 'Index erzeugen';
	$lang['strtabname'] = 'Tab. Name';
	$lang['strcolumnname'] = 'Spalten Name';
	$lang['strindexneedsname'] = 'Sie müssen für den Index einen Namen angeben.';
	$lang['strindexneedscols'] = 'Sie müssen eine zulässige Anzahl an Spalten angeben.';
	$lang['strindexcreated'] = 'Index erzeugt';
	$lang['strindexcreatedbad'] = 'Erzeugen des Indizes fehlgeschlagen.';
	$lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index "%s" löschen möchten?';
	$lang['strindexdropped'] = 'Index gelöscht.';
	$lang['strindexdroppedbad'] = 'Löschen des Indizes fehlgeschlagen.';
	$lang['strkeyname'] = 'Schlüssel Name';
	$lang['struniquekey'] = 'Eindeutiger Schlüssel';
	$lang['strprimarykey'] = 'Primärer Schlüssel';
 	$lang['strindextype'] = 'Typ des Indizes';
	$lang['strindexname'] = 'Name des Indizes';
	$lang['strtablecolumnlist'] = 'Spalten in der Tabelle';
	$lang['strindexcolumnlist'] = 'Spalten im Index';

	// Rules
	$lang['strrules'] = 'Regeln';
	$lang['strrule'] = 'Regel';
	$lang['strshowallrules'] = 'Zeige alle Regeln';
	$lang['strnorule'] = 'Keine Regel gefunden.';
	$lang['strnorules'] = 'Keine Regeln gefunden.';
	$lang['strcreaterule'] = 'Regel erzeugen';
	$lang['strrulename'] = 'Regel Name';
	$lang['strruleneedsname'] = 'Sie müssen für die Regel einen Namen angeben.';
	$lang['strrulecreated'] = 'Regel erzeugt.';
	$lang['strrulecreatedbad'] = 'Erzeugen der Regel fehlgeschlagen.';
	$lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel "%s" in der Tabelle "%s" löschen möchten?';
	$lang['strruledropped'] = 'Regel gelöscht.';
	$lang['strruledroppedbad'] = 'Löschen der Regel fehlgeschlagen.';

	// Constraints
	$lang['strconstraints'] = 'Constraints';
	$lang['strshowallconstraints'] = 'Zeige alle Constraints';
	$lang['strnoconstraints'] = 'Keine Constraints gefunden.';
	$lang['strcreateconstraint'] = 'Erzeuge constraint';
	$lang['strconstraintcreated'] = 'Constraint erzeugt.';
	$lang['strconstraintcreatedbad'] = 'Erzeugen des Constraints fehlgeschlagen.';
	$lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint "%s" in der Tabelle "%s" löschen möchten?';
	$lang['strconstraintdropped'] = 'Constraint gelöscht.';
	$lang['strconstraintdroppedbad'] = 'Löschen des Constraint fehlgeschlagen.';
	$lang['straddcheck'] = 'Check Constraint hinzufügen';
	$lang['strcheckneedsdefinition'] = 'Check Constraint braucht eine Definition.';
	$lang['strcheckadded'] = 'CheckCconstraint hinzugefügt.';
	$lang['strcheckaddedbad'] = 'Hinzufügen des Check Constraints fehlgeschlagen.';
	$lang['straddpk'] = 'Primär-Schlüssel hinzufügen';
	$lang['strpkneedscols'] = 'Ein Primär-Schlüssel benötigt mindestens eine Spalte.';
	$lang['strpkadded'] = 'Primär-Schlüssel hinzugefügt.';
	$lang['strpkaddedbad'] = 'Hinzufügen des Primär-Schlüssels fehlgeschlagen.';
	$lang['stradduniq'] = 'Eindeutigen Schlüssel (unique key) hinzufügen';
	$lang['struniqneedscols'] = 'Ein eindeutiger Schlüssel (Unique Key) benötigt mindestens eine Spalte.';
	$lang['struniqadded'] = 'Eindeutiger Schlüssel (Unique Key) hinzugefügt.';
	$lang['struniqaddedbad'] = 'Hinzufügen eines eindeutigen Schlüssels (Unique Key) fehlgeschlagen.';
	$lang['straddfk'] = 'Fremd-Schlüssel hinzufügen';
	$lang['strfkneedscols'] = 'Ein Fremd-Schlüssel benötigt mindestens eine Spalte.';
	$lang['strfkadded'] = 'Fremd-Schlüssel hinzugefügt.';
	$lang['strfkaddedbad'] = 'Hinzufügen eines Fremd-Schlüssels fehlgeschlagen.';
	$lang['strfktarget'] = 'Zieltabelle';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Funktion';
	$lang['strfunctions'] = 'Funktionen';
	$lang['strshowallfunctions'] = 'Zeige alle Funktionen';
	$lang['strnofunction'] = 'Keine Funktion gefunden.';
	$lang['strnofunctions'] = 'Keine Funktionen gefunden.';
	$lang['strcreatefunction'] = 'Funktion erzeugen';
	$lang['strfunctionname'] = 'Funktion Name';
	$lang['strreturns'] = 'Liefert';
	$lang['strarguments'] = 'Argumente';
	$lang['strfunctionneedsname'] = 'Sie müssen für die Funktion einen Namen angeben.';
	$lang['strfunctionneedsdef'] = 'Sie müssen für die Funktion eine Definition angeben.';
	$lang['strfunctioncreated'] = 'Funktion erzeugt.';
	$lang['strfunctioncreatedbad'] = 'Erzeugen der Funktion fehlgeschlagen.';
	$lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion "%s" löschen möchten?';
	$lang['strfunctiondropped'] = 'Funktion gelöscht.';
	$lang['strfunctiondroppedbad'] = 'Löschen der Funktion fehlgeschlagen.';
	$lang['strfunctionupdated'] = 'Funktion aktualisiert.';
	$lang['strfunctionupdatedbad'] = 'Aktualiseren der Funktion fehlgeschlagen.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Trigger';
	$lang['strshowalltriggers'] = 'Zeige alle Trigger';
	$lang['strnotrigger'] = 'Kein Trigger gefunden.';
	$lang['strnotriggers'] = 'Keine Trigger gefunden.';
	$lang['strcreatetrigger'] = 'Trigger erzeugen';
	$lang['strtriggerneedsname'] = 'Sie müssen für den Trigger einen Namen angeben.';
	$lang['strtriggerneedsfunc'] = 'Sie müssen für den Trigger eine Funktion angeben.';
	$lang['strtriggercreated'] = 'Trigger erzeugt.';
	$lang['strtriggercreatedbad'] = 'Erzeugen des Triggers fehlgeschlagen.';
	$lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger "%s" in der Tabelle "%s" löschen möchten?';
	$lang['strtriggerdropped'] = 'Trigger gelöscht.';
	$lang['strtriggerdroppedbad'] = 'Löschen des Triggers fehlgeschlagen.';

	// Types
	$lang['strtype'] = 'Datentyp';
	$lang['strtypes'] = 'Datentypen';
	$lang['strshowalltypes'] = 'Zeige alle Datentypen';
	$lang['strnotype'] = 'Kein Datentyp gefunden.';
	$lang['strnotypes'] = 'Keine Datentypen gefunden.';
	$lang['strcreatetype'] = 'Datentyp erzeugen';
	$lang['strtypename'] = 'Datentyp Name';
	$lang['strinputfn'] = 'Eingabefunktion';
	$lang['stroutputfn'] = 'Ausgabefunktion';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Trennzeichen';
	$lang['strstorage'] = 'Speicherung';
	$lang['strtypeneedsname'] = 'Sie müssen einen Namen für den Datentyp angeben.';
	$lang['strtypeneedslen'] = 'Sie müssen eine Länge für den Datentyp angeben.';
	$lang['strtypecreated'] = 'Datentyp erzeugt.';
	$lang['strtypecreatedbad'] = 'Erzeugen des Datentypen fehlgeschlagen.';
	$lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentypen "%s" löschen möchten?';
	$lang['strtypedropped'] = 'Datentyp gelöscht.';
	$lang['strtypedroppedbad'] = 'Löschen des Datentypen fehlgeschlagen.';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemas';
	$lang['strshowallschemas'] = 'Zeige alle Schemas';
	$lang['strnoschema'] = 'Kein Schema gefunden.';
	$lang['strnoschemas'] = 'Keine Schemas gefunden.';
	$lang['strcreateschema'] = 'Schema erzeugen';
	$lang['strschemaname'] = 'Schema Name';
	$lang['strschemaneedsname'] = 'Sie müssen für das Schema einen Namen angeben.';
	$lang['strschemacreated'] = 'Schema erzeugt';
	$lang['strschemacreatedbad'] = 'Erzeugen des Schemas fehlgeschlagen.';
	$lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema "%s" löschen möchten?';
	$lang['strschemadropped'] = 'Schema gelöscht.';
	$lang['strschemadroppedbad'] = 'Löschen des Schemas fehlgeschlagen';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reporte';
	$lang['strshowallreports'] = 'Zeige alle Reporte';
	$lang['strnoreports'] = 'Keione Reporte gefunden.';
	$lang['strcreatereport'] = 'Report erzeugen';
	$lang['strreportdropped'] = 'Report gelöscht.';
	$lang['strreportdroppedbad'] = 'Löschen des Reports fehlgeschlagen.';
	$lang['strconfdropreport'] = 'Sind Sie sicher, dass Sie den Report "%s" löschen wollen?';
	$lang['strreportneedsname'] = 'Sie müssen für den Report einen Namen angeben.';
	$lang['strreportneedsdef'] = 'Sie müssen SQL-Code für den Report eingeben.';
	$lang['strreportcreated'] = 'Report gespeichert.';
	$lang['strreportcreatedbad'] = 'Speichern des Reports fehlgeschlagen.';

	// Miscellaneous
	$lang['strtopbar'] = '%s läuft auf host:%s port:%s -- Sie sind angemeldet als Benutzer "%s", %s';
	$lang['strtimefmt'] = 'j. M Y H:i:s';


?>
