<?php

    /**
    * German Language file for phpPgAdmin.
    * @maintainer M. Bertheau <twanger@bluetwanger.de>
    *
    * $Id: german.php,v 1.12 2003/09/05 01:24:01 chriskl Exp $
    */

    // Language and character set
    $lang['applang'] = 'Deutsch';
    $lang['appcharset'] = 'UTF-8';
    $lang['applocale'] = 'de_DE';
    $lang['appdbencoding'] = 'LATIN1';

    // Basic strings
    $lang['strintro'] = 'Willkommen bei phpPgAdmin.';
    $lang['strppahome'] = 'phpPgAdmin Homepage';
    $lang['strpgsqlhome'] = 'PostgreSQL Homepage';
    $lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
    $lang['strlocaldocs'] = 'PostgreSQL Dokumentation (lokal)';
    $lang['strreportbug'] = 'Fehler berichten';
    $lang['strviewfaq'] = 'FAQ ansehen';
    $lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
    $lang['strlogin'] = 'Anmelden';
    $lang['strloginfailed'] = 'Anmelden fehlgeschlagen';
    $lang['strserver'] = 'Server';
    $lang['strlogout'] = 'Abmelden';
    $lang['strowner'] = 'Besitzer';
    $lang['straction'] = 'Aktion';
    $lang['stractions'] = 'Aktionen';
    $lang['strname'] = 'Name';
    $lang['strdefinition'] = 'Definition';
    $lang['stroperators'] = 'Operatoren';
    $lang['straggregates'] = 'Aggregate';
    $lang['strproperties'] = 'Eigenschaften';
    $lang['strbrowse'] = 'Durchsuchen';
    $lang['strdrop'] = 'Löschen';
    $lang['strdropped'] = 'Gelöscht';
    $lang['strnull'] = 'Null';
    $lang['strnotnull'] = 'Nicht Null';
    $lang['strprev'] = 'zurück';
    $lang['strnext'] = 'weiter';
    $lang['strfailed'] = 'fehlgeschlagen';
    $lang['strcreate'] = 'Erstellen';
    $lang['strfirst'] = '<< Anfang';
    $lang['strlast'] = 'Ende >>';
    $lang['strcreated'] = 'Erstellt';
    $lang['strcomment'] = 'Kommentar';
    $lang['strlength'] = 'Länge';
    $lang['strdefault'] = 'Vorgabe';
    $lang['stralter'] = 'Ändern';
    $lang['strok'] = 'OK';
    $lang['strcancel'] = 'Abbrechen';
    $lang['strsave'] = 'Speichern';
    $lang['strreset'] = 'Zurücksetzen';
    $lang['strinsert'] = 'Einfügen';
    $lang['strselect'] = 'Abfrage';
    $lang['strdelete'] = 'Löschen';
    $lang['strupdate'] = 'Ändern';
    $lang['strreferences'] = 'Referenzen';
    $lang['stryes'] = 'Ja';
    $lang['strno'] = 'Nein';
    $lang['stredit'] = 'Bearbeiten';
    $lang['strcolumns'] = 'Spalten';
    $lang['strtrue'] = 'Wahr';
    $lang['strfalse'] = 'Falsch';
    $lang['strrows'] = 'Zeile(n)';
    $lang['strexample'] = 'z.B.';
    $lang['strback'] = 'Zurück';
    $lang['strrowsaff'] = 'Spalte(n) betroffen.';
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
    $lang['strgo'] = 'Los';
    $lang['strimport'] = 'Importieren';
    $lang['stradmin'] = 'Admin';
    $lang['strvacuum'] = 'Vacuum';
    $lang['stranalyze'] = 'Analysieren';
    $lang['strcluster'] = 'Cluster';
    $lang['strreindex'] = 'Reindizierung';
    $lang['strrun'] = 'Los';
    $lang['stradd'] = 'Hinzufügen';
    $lang['strevent'] = 'Ereignis';
    $lang['strwhere'] = 'wo';
    $lang['strinstead'] = 'DO INSTEAD';
    $lang['strwhen'] = 'Wann';
    $lang['strformat'] = 'Format';

    // Error handling
    $lang['strdata'] = 'Daten';
    $lang['strconfirm'] = 'Bestätigen';
    $lang['strexpression'] = 'Ausdruck';
    $lang['strellipsis'] = '...';
    $lang['strexpand'] = 'Aufklappen';
    $lang['strcollapse'] = 'Zuklappen';
    $lang['strexplain'] = 'Explain';
    $lang['strfind'] = 'Suchen';
    $lang['stroptions'] = 'Optionen';
    $lang['strrefresh'] = 'Aktualisieren';
    $lang['strtaller'] = 'Größer';
    $lang['strshorter'] = 'Kleiner';
    $lang['strdownload'] = 'Download';
    $lang['strnoframes'] = 'Für dieses Programm wird ein ein Frame-fähiger Browser benötigt.';
    $lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie müssen sie aus der config.inc.php-dist neu erzeugen.';
    $lang['strnotloaded'] = 'Ihre PHP-Installation besitzt keine passende Datenbankunterstützung.';
    $lang['strbadschema'] = 'Unzulässiges Schema angegeben.';
    $lang['strbadencoding'] = 'Abbruch beim Setzen der Clientcodierung in der Datenbank.';
    $lang['strsqlerror'] = 'SQL Fehler:';
    $lang['strinstatement'] = 'In der Anweisung:';
    $lang['strinvalidparam'] = 'Unzulässige Skriptparameter.';
    $lang['strnodata'] = 'Keine Datensätze gefunden.';

    // Tables
    $lang['strtable'] = 'Tabelle';
    $lang['strtables'] = 'Tabellen';
    $lang['strshowalltables'] = 'Zeige alle Tabellen';
    $lang['strnotables'] = 'Keine Tabellen gefunden.';
    $lang['strnotable'] = 'Keine Tabelle gefunden.';
    $lang['strcreatetable'] = 'Neue Tabelle erstellen';
    $lang['strtablename'] = 'Tabellenname';
    $lang['strtableneedsname'] = 'Sie müssen für die Tabelle einen Namen angeben.';
    $lang['strtableneedsfield'] = 'Sie müssen mindestens ein Feld angeben.';
    $lang['strtableneedscols'] = 'Sie müssen eine zulässige Anzahl an Spalten angeben.';
    $lang['strtablecreated'] = 'Tabelle erstellt.';
    $lang['strtablecreatedbad'] = 'Erzeugen der Tabelle fehlgeschlagen.';
    $lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle "%s" löschen möchten?';
    $lang['strtabledropped'] = 'Tabelle gelöscht.';
    $lang['strtabledroppedbad'] = 'Löschen der Tabelle fehlgeschlagen.';
    $lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Inhalt der Tabelle "%s" löschen möchten?';
    $lang['strtableemptied'] = 'Tabelleninhalt gelöscht.';
    $lang['strtableemptiedbad'] = 'Löschen des Tabelleninhaltes fehlgeschlagen.';
    $lang['strinsertrow'] = 'Datensatz einfügen';
    $lang['strrowinserted'] = 'Datensatz eingefügt.';
    $lang['strrowinsertedbad'] = 'Einfügen des Datensatzes fehlgeschlagen.';
    $lang['streditrow'] = 'Datensatz bearbeiten';
    $lang['strrowupdated'] = 'Datensatz geändert.';
    $lang['strrowupdatedbad'] = 'Ändern des Datensatzes fehlgeschlagen.';
    $lang['strdeleterow'] = 'Datensatz löschen';
    $lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diesen Datensatz löschen möchten?';
    $lang['strrowdeleted'] = 'Datensatz gelöscht.';
    $lang['strrowdeletedbad'] = 'Löschen des Datensatzes fehlgeschlagen.';
    $lang['strsaveandrepeat'] = 'Speichern und Wiederholen';
    $lang['strfield'] = 'Feld';
    $lang['strfields'] = 'Felder';
    $lang['strnumfields'] = 'Anzahl der Felder';
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
    $lang['strschemaonly'] = 'nur das Schema';
    $lang['strdataonly'] = 'nur die Daten';

    // Users
    $lang['strcascade'] = 'CASCADE';
    $lang['strtablealtered'] = 'Tabelle geändert.';
    $lang['strtablealteredbad'] = 'Ändern der Tabelle fehlgeschlagen.';
    $lang['struser'] = 'Benutzer';
    $lang['strusers'] = 'Benutzer';
    $lang['strusername'] = 'Benutzername';
    $lang['strpassword'] = 'Passwort';
    $lang['strsuper'] = 'Superuser?';
    $lang['strcreatedb'] = 'Datenbank erstellen?';
    $lang['strexpires'] = 'Gültig bis';
    $lang['strnousers'] = 'Keine Benutzer gefunden.';
    $lang['struserupdated'] = 'Benutzer ändern.';
    $lang['struserupdatedbad'] = 'Ändern des Benutzers fehlgeschlagen.';
    $lang['strshowallusers'] = 'Zeige alle Benutzer';
    $lang['strcreateuser'] = 'Lege Benutzer an';
    $lang['strusercreated'] = 'Benutzer angelegt.';
    $lang['strusercreatedbad'] = 'Anlegen des Benutzers fehlgeschlagen.';
    $lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer "%s" löschen möchten?';
    $lang['struserdropped'] = 'Benutzer gelöscht.';
    $lang['struserdroppedbad'] = 'Löschen des Benutzers fehlgeschlagen.';

    $lang['straccount'] = 'Konto';
    $lang['strchangepassword'] = 'Passwort ändern';
    $lang['strpasswordchanged'] = 'Passwort geändert.';
    $lang['strpasswordchangedbad'] = 'Ändern des Passwortes fehlgeschlagen.';
    $lang['strpasswordshort'] = 'Das Passwort ist zu kurz.';
    $lang['strpasswordconfirm'] = 'Die beiden Passwörter stimmen nicht überein.';
    $lang['strgroups'] = 'Gruppen';
    $lang['strnogroup'] = 'Gruppe nicht gefunden.';
    $lang['strgroup'] = 'Gruppe';
    $lang['strnogroups'] = 'Keine Gruppen gefunden.';
    $lang['strcreategroup'] = 'Gruppe erstellen';
    $lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
    $lang['strgroupneedsname'] = 'Sie müssen für die Gruppe einen Namen angeben.';
    $lang['strgroupcreated'] = 'Gruppe angelegt.';
    $lang['strgroupcreatedbad'] = 'Anlegen der Gruppe fehlgeschlagen.';
    $lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe "%s" löschen möchten?';
    $lang['strgroupdropped'] = 'Gruppe gelöscht.';
    $lang['strgroupdroppedbad'] = 'Löschen der Gruppe fehlgeschlagen.';
    $lang['strmembers'] = 'Mitglieder';
    $lang['straddmember'] = 'Mitglied hinzufügen';
    $lang['strmemberadded'] = 'Mitglied hinzugefügt.';
    $lang['strmemberaddedbad'] = 'Hinzufügen des Mitglieds fehlgeschlagen.';
    $lang['strdropmember'] = 'Mitglied löschen';
    $lang['strconfdropmember'] = 'Sind Sie sicher, dass Sie das Mitglied "%s" aus der Gruppe "%s" löschen wollen?';
    $lang['strmemberdropped'] = 'Mitglied gelöscht.';
    $lang['strmemberdroppedbad'] = 'Löschen des Mitglieds fehlgeschlagen.';

    // Privilges
    $lang['strprivilege'] = 'Privileg';
    $lang['strprivileges'] = 'Privilegien';
    $lang['strnoprivileges'] = 'Dieses Objekt hat die Standard-Eigentümerrechte.';
    $lang['strgrant'] = 'Privilegien vergeben';
    $lang['strrevoke'] = 'Privilegien entziehen';
    $lang['strgranted'] = 'Privilegien vergeben / entzogen.';
    $lang['strgrantfailed'] = 'Vergeben von Privilegien fehlgeschlagen.';
    $lang['strgrantbad'] = 'Sie müssen wenigstens einen Benutzer oder eine Gruppe und wenigstens ein Privileg.';
    $lang['stralterprivs'] = 'Privilegien ändern';
    $lang['strgrantor'] = 'Privilegienvergeber';
    $lang['strasterisk'] = '*';

    // Databases
    $lang['strdatabase'] = 'Datenbank';
    $lang['strdatabases'] = 'Datenbanken';
    $lang['strshowalldatabases'] = 'Zeige alle Datenbanken';
    $lang['strnodatabase'] = 'Keine Datenbank gefunden.';
    $lang['strnodatabases'] = 'Keine Datenbanken gefunden.';
    $lang['strcreatedatabase'] = 'Datenbank erstellen';
    $lang['strdatabasename'] = 'Datenbankname';
    $lang['strdatabaseneedsname'] = 'Sie müssen für die Datenbank einen Namen angeben.';
    $lang['strdatabasecreated'] = 'Datenbank erstellt.';
    $lang['strdatabasecreatedbad'] = 'Erzeugen der Datenbank fehlgeschlagen.';
    $lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank "%s" löschen möchten?';
    $lang['strdatabasedropped'] = 'Datenbank gelöscht.';
    $lang['strdatabasedroppedbad'] = 'Löschen der Datenbank fehlgeschlagen.';
    $lang['strentersql'] = 'Auszuführenden SQL-Code eingeben:';
    $lang['strsqlexecuted'] = 'SQL-Code ausgeführt.';
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
    $lang['strcreateview'] = 'Sicht erstellen';
    $lang['strviewname'] = 'Name der Sicht';
    $lang['strviewneedsname'] = 'Sie müssen für die Sicht einen Namen angeben.';
    $lang['strviewneedsdef'] = 'Sie müssen für die Sicht eine Definition angeben.';
    $lang['strviewcreated'] = 'Sicht erstellt.';
    $lang['strviewcreatedbad'] = 'Erzeugen der Sicht fehlgeschlagen.';
    $lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht "%s" löschen möchten?';
    $lang['strviewdropped'] = 'Sicht gelöscht.';
    $lang['strviewdroppedbad'] = 'Löschen der Sicht fehlgeschlagen.';
    $lang['strviewupdated'] = 'Sicht geändert.';
    $lang['strviewupdatedbad'] = 'Ändern der Sicht fehlgeschlagen.';

    // Sequences
    $lang['strsequence'] = 'Sequenz';
    $lang['strsequences'] = 'Sequenzen';
    $lang['strshowallsequences'] = 'Zeige alle Sequenzen';
    $lang['strnosequence'] = 'Keine Sequenz gefunden.';
    $lang['strnosequences'] = 'Keine Sequenzen gefunden.';
    $lang['strcreatesequence'] = 'Erzeuge Sequenz';
    $lang['strlastvalue'] = 'Letzer Wert';
    $lang['strincrementby'] = 'Erhöhen um';
    $lang['strstartvalue'] = 'Startwert';
    $lang['strmaxvalue'] = 'Maximalwert';
    $lang['strminvalue'] = 'Minimalwert';
    $lang['strcachevalue'] = 'Cachewert';
    $lang['strlogcount'] = 'Log Anzahl';
    $lang['striscycled'] = 'Zyklisch?';
    $lang['striscalled'] = 'Aufgerufen?';
    $lang['strsequenceneedsname'] = 'Sie müssen für die Sequenz einen Namen angeben.';
    $lang['strsequencecreated'] = 'Sequenz erstellt.';
    $lang['strsequencecreatedbad'] = 'Erzeugen der Sequenz fehlgeschlagen.';
    $lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz "%s" löschen möchten?';
    $lang['strsequencedropped'] = 'Sequenz gelöscht.';
    $lang['strsequencedroppedbad'] = 'Löschen der Sequenz fehlgeschlagen.';

    // Indexes
    $lang['strindexes'] = 'Indizes';
    $lang['strindexname'] = 'Name des Index';
    $lang['strshowallindexes'] = 'Zeige alle Indizes';
    $lang['strnoindex'] = 'Keinen Index gefunden.';
    $lang['strnoindexes'] = 'Keine Indizes gefunden.';
    $lang['strcreateindex'] = 'Index erstellen';
    $lang['strtabname'] = 'Tab. Name';
    $lang['strcolumnname'] = 'Spaltenname';
    $lang['strindexneedsname'] = 'Sie müssen für den Index einen Namen angeben.';
    $lang['strindexneedscols'] = 'Sie müssen eine zulässige Anzahl an Spalten angeben.';
    $lang['strindexcreated'] = 'Index erstellt';
    $lang['strindexcreatedbad'] = 'Erzeugen des Index fehlgeschlagen.';
    $lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index "%s" löschen möchten?';
    $lang['strindexdropped'] = 'Index gelöscht.';
    $lang['strindexdroppedbad'] = 'Löschen des Index fehlgeschlagen.';
    $lang['strkeyname'] = 'Schlüsselname';
    $lang['struniquekey'] = 'Eindeutiger Schlüssel';
    $lang['strprimarykey'] = 'Primärerschlüssel';
    $lang['strindextype'] = 'Typ des Index';
    $lang['strindexname'] = 'Name des Index';
    $lang['strtablecolumnlist'] = 'Spalten in der Tabelle';
    $lang['strindexcolumnlist'] = 'Spalten im Index';

    // Rules
    $lang['strrules'] = 'Regeln';
    $lang['strrule'] = 'Regel';
    $lang['strshowallrules'] = 'Zeige alle Regeln';
    $lang['strnorule'] = 'Keine Regel gefunden.';
    $lang['strnorules'] = 'Keine Regeln gefunden.';
    $lang['strcreaterule'] = 'Regel erstellen';
    $lang['strrulename'] = 'Regelname';
    $lang['strruleneedsname'] = 'Sie müssen für die Regel einen Namen angeben.';
    $lang['strrulecreated'] = 'Regel erstellt.';
    $lang['strrulecreatedbad'] = 'Erzeugen der Regel fehlgeschlagen.';
    $lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel "%s" in der Tabelle "%s" löschen möchten?';
    $lang['strruledropped'] = 'Regel gelöscht.';
    $lang['strruledroppedbad'] = 'Löschen der Regel fehlgeschlagen.';

    // Constraints
    $lang['strconstraints'] = 'Constraints';
    $lang['strshowallconstraints'] = 'Zeige alle Constraints';
    $lang['strnoconstraints'] = 'Keine Constraints gefunden.';
    $lang['strcreateconstraint'] = 'Erzeuge Constraint';
    $lang['strconstraintcreated'] = 'Constraint erstellt.';
    $lang['strconstraintcreatedbad'] = 'Erzeugen des Constraints fehlgeschlagen.';
    $lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint "%s" in der Tabelle "%s" löschen möchten?';
    $lang['strconstraintdropped'] = 'Constraint gelöscht.';
    $lang['strconstraintdroppedbad'] = 'Löschen des Constraints fehlgeschlagen.';
    $lang['straddcheck'] = 'Check Constraint hinzufügen';
    $lang['strcheckneedsdefinition'] = 'Check Constraint braucht eine Definition.';
    $lang['strcheckadded'] = 'Check Constraint hinzugefügt.';
    $lang['strcheckaddedbad'] = 'Hinzufügen des Check Constraints fehlgeschlagen.';
    $lang['straddpk'] = 'Primärschlüssel hinzufügen';
    $lang['strpkneedscols'] = 'Ein Primärschlüssel benötigt mindestens eine Spalte.';
    $lang['strpkadded'] = 'Primärschlüssel hinzugefügt.';
    $lang['strpkaddedbad'] = 'Hinzufügen des Primärschlüssels fehlgeschlagen.';
    $lang['stradduniq'] = 'Eindeutigen Schlüssel  hinzufügen';
    $lang['struniqneedscols'] = 'Ein eindeutiger Schlüssel benötigt mindestens eine Spalte.';
    $lang['struniqadded'] = 'Eindeutiger Schlüssel hinzugefügt.';
    $lang['struniqaddedbad'] = 'Hinzufügen eines eindeutigen Schlüssels fehlgeschlagen.';
    $lang['straddfk'] = 'Fremdschlüssel hinzufügen';
    $lang['strfkneedscols'] = 'Ein Fremdschlüssel benötigt mindestens eine Spalte.';
    $lang['strfkadded'] = 'Fremdschlüssel hinzugefügt.';
    $lang['strfkneedstarget'] = 'Ein Fremdschlüssel benötigt eine Zieltabelle.';
    $lang['strfkaddedbad'] = 'Hinzufügen eines Fremdschlüssels fehlgeschlagen.';
    $lang['strfktarget'] = 'Zieltabelle';
    $lang['strondelete'] = 'ON DELETE';
    $lang['strfkcolumnlist'] = 'Spalten im Schlüssel';
    $lang['stronupdate'] = 'ON UPDATE';

    // Functions
    $lang['strfunction'] = 'Funktion';
    $lang['strfunctions'] = 'Funktionen';
    $lang['strshowallfunctions'] = 'Zeige alle Funktionen';
    $lang['strnofunction'] = 'Keine Funktion gefunden.';
    $lang['strnofunctions'] = 'Keine Funktionen gefunden.';
    $lang['strcreatefunction'] = 'Funktion erstellen';
    $lang['strfunctionname'] = 'Name der Funktion';
    $lang['strreturns'] = 'Liefert';
    $lang['strarguments'] = 'Argumente';
    $lang['strfunctionneedsname'] = 'Sie müssen für die Funktion einen Namen angeben.';
    $lang['strfunctionneedsdef'] = 'Sie müssen für die Funktion eine Definition angeben.';
    $lang['strfunctioncreated'] = 'Funktion erstellt.';
    $lang['strfunctioncreatedbad'] = 'Erzeugen der Funktion fehlgeschlagen.';
    $lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion "%s" löschen möchten?';
    $lang['strfunctiondropped'] = 'Funktion gelöscht.';
    $lang['strfunctiondroppedbad'] = 'Löschen der Funktion fehlgeschlagen.';
    $lang['strfunctionupdated'] = 'Funktion geändert.';
    $lang['strfunctionupdatedbad'] = 'Ändern der Funktion fehlgeschlagen.';

    // Triggers
    $lang['strtrigger'] = 'Trigger';
    $lang['strtriggers'] = 'Trigger';
    $lang['strshowalltriggers'] = 'Zeige alle Trigger';
    $lang['strnotrigger'] = 'Kein Trigger gefunden.';
    $lang['strnotriggers'] = 'Keine Trigger gefunden.';
    $lang['strcreatetrigger'] = 'Trigger erstellen';
    $lang['strtriggerneedsname'] = 'Sie müssen für den Trigger einen Namen angeben.';
    $lang['strtriggerneedsfunc'] = 'Sie müssen für den Trigger eine Funktion angeben.';
    $lang['strtriggercreated'] = 'Trigger erstellt.';
    $lang['strtriggercreatedbad'] = 'Erzeugen des Triggers fehlgeschlagen.';
    $lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger "%s" in der Tabelle "%s" löschen möchten?';
    $lang['strtriggerdropped'] = 'Trigger gelöscht.';
    $lang['strtriggerdroppedbad'] = 'Löschen des Triggers fehlgeschlagen.';
    $lang['strtriggeraltered'] = 'Trigger geändert.';
    $lang['strtriggeralteredbad'] = 'Ändern des Triggers fehlgeschlagen.';

    // Types
    $lang['strtype'] = 'Datentyp';
    $lang['strtypes'] = 'Datentypen';
    $lang['strshowalltypes'] = 'Zeige alle Datentypen';
    $lang['strnotype'] = 'Kein Datentyp gefunden.';
    $lang['strnotypes'] = 'Keine Datentypen gefunden.';
    $lang['strcreatetype'] = 'Datentyp erstellen';
    $lang['strtypename'] = 'Name des Datentyps';
    $lang['strinputfn'] = 'Eingabefunktion';
    $lang['stroutputfn'] = 'Ausgabefunktion';
    $lang['strpassbyval'] = 'Übergabe by value?';
    $lang['stralignment'] = 'Alignment';
    $lang['strelement'] = 'Element';
    $lang['strdelimiter'] = 'Trennzeichen';
    $lang['strstorage'] = 'Speicherung';
    $lang['strtypeneedsname'] = 'Sie müssen einen Namen für den Datentyp angeben.';
    $lang['strtypeneedslen'] = 'Sie müssen eine Länge für den Datentyp angeben.';
    $lang['strtypecreated'] = 'Datentyp erstellt.';
    $lang['strtypecreatedbad'] = 'Erzeugen des Datentypen fehlgeschlagen.';
    $lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentyp "%s" löschen möchten?';
    $lang['strtypedropped'] = 'Datentyp gelöscht.';
    $lang['strtypedroppedbad'] = 'Löschen des Datentyps fehlgeschlagen.';

    // Schemas
    $lang['strschema'] = 'Schema';
    $lang['strschemas'] = 'Schemas';
    $lang['strshowallschemas'] = 'Zeige alle Schemas';
    $lang['strnoschema'] = 'Kein Schema gefunden.';
    $lang['strnoschemas'] = 'Keine Schemas gefunden.';
    $lang['strcreateschema'] = 'Schema erstellen';
    $lang['strschemaname'] = 'Name des Schema';
    $lang['strschemaneedsname'] = 'Sie müssen für das Schema einen Namen angeben.';
    $lang['strschemacreated'] = 'Schema erstellt';
    $lang['strschemacreatedbad'] = 'Erzeugen des Schemas fehlgeschlagen.';
    $lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema "%s" löschen möchten?';
    $lang['strschemadropped'] = 'Schema gelöscht.';
    $lang['strschemadroppedbad'] = 'Löschen des Schemas fehlgeschlagen';

    $lang['strreport'] = 'Bericht';
    $lang['strreports'] = 'Berichte';
    $lang['strshowallreports'] = 'Zeige alle Berichte';
    $lang['strnoreports'] = 'Keine Berichte gefunden.';
    $lang['strcreatereport'] = 'Bericht erstellen';
    $lang['strreportdropped'] = 'Bericht gelöscht.';
    $lang['strreportdroppedbad'] = 'Löschen des Berichtes fehlgeschlagen.';
    $lang['strconfdropreport'] = 'Sind Sie sicher, dass Sie den Bericht "%s" löschen wollen?';
    $lang['strreportneedsname'] = 'Sie müssen für den Bericht einen Namen angeben.';
    $lang['strreportneedsdef'] = 'Sie müssen SQL-Code für den Bericht eingeben.';
    $lang['strreportcreated'] = 'Bericht gespeichert.';
    $lang['strreportcreatedbad'] = 'Speichern des Berichtes fehlgeschlagen.';
    $lang['strsaveasreport'] = 'Als Bericht speichern';

    // Miscellaneous
    $lang['strtopbar'] = '%s läuft auf host:%s port:%s -- Sie sind angemeldet als Benutzer "%s", %s';
    $lang['strdomain'] = 'Domain';
    $lang['strdomains'] = 'Domains';
    $lang['strshowalldomains'] = 'Alle Domains zeigen';
    $lang['strnodomains'] = 'Keine Domains gefunden.';
    $lang['strcreatedomain'] = 'Domain erstellen';
    $lang['strdomaindropped'] = 'Domain gelöscht.';
    $lang['strdomaindroppedbad'] = 'Löschen der Domain fehlgeschlagen.';
    $lang['strconfdropdomain'] = 'Sind Sie sicher, dass Sie die Domain "%s" löschen wollen?';
    $lang['strdomainneedsname'] = 'Sie müssen einen Namen für die Domain angeben.';
    $lang['strdomaincreated'] = 'Domain erstellt.';
    $lang['strdomaincreatedbad'] = 'Erstellen der Domain fehlgeschlagen.';
    $lang['strdomainaltered'] = 'Domain geöndert.';
    $lang['strdomainalteredbad'] = 'Ändern der Domain fehlgeschlagen.';
    $lang['strtimefmt'] = 'j. M Y H:i:s';
    $lang['stroperator'] = 'Operator';

    // SQL Editor
    $lang['strshowalloperators'] = 'Alle Operatoren zeigen';
    $lang['strnooperator'] = 'Keinen Operator vorhanden.';
    $lang['strnooperators'] = 'Keine Operatoren vorhanden.';
    $lang['strcreateoperator'] = 'Operator erstellen';
    $lang['stroperatorname'] = 'Name des Operators';
    $lang['strleftarg'] = 'Typ des linken Arguments';
    $lang['strrightarg'] = 'Typ des rechten Arguments';
    $lang['stroperatorneedsname'] = 'Sie müssen einen Namen für den Operator angeben.';
    $lang['stroperatorcreated'] = 'Operator erstellt';
    $lang['stroperatorcreatedbad'] = 'Erstellen des Operators fehlgeschlagen.';
    $lang['strconfdropoperator'] = 'Sind Sie sicher, dass Sie den Operator "%s" löschen wollen?';
    $lang['stroperatordropped'] = 'Operator gelösche.';
    $lang['stroperatordroppedbad'] = 'Löschen des Operators fehlgeschlagen.';

?>
