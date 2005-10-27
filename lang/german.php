<?php

    // vim: ts=4 sw=4 et
    /**
    * German Language file for phpPgAdmin.
    * @maintainer M. Bertheau <twanger@bluetwanger.de>
    *
    * $Id: german.php,v 1.25 2005/10/27 01:21:04 chriskl Exp $
    */


    // Language and character set
    $lang['applang'] = 'Deutsch';
    $lang['appcharset'] = 'UTF-8';
    $lang['applocale'] = 'de_DE';
    $lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

    // Basic strings
    $lang['strintro'] = 'Willkommen bei phpPgAdmin.';
    $lang['strppahome'] = 'phpPgAdmin Homepage';
    $lang['strpgsqlhome'] = 'PostgreSQL Homepage';
    $lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
    $lang['strlocaldocs'] = 'PostgreSQL Dokumentation (lokal)';
    $lang['strreportbug'] = 'Fehler berichten';
    $lang['strviewfaq'] = 'FAQ ansehen';
    $lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
    $lang['strlogin'] = 'Anmelden';
    $lang['strloginfailed'] = 'Anmelden fehlgeschlagen';
    $lang['strlogindisallowed'] = 'Anmelden nicht erlaubt';
    $lang['strserver'] = 'Server';
    $lang['strservers']  =  'Server';
    $lang['strintroduction']  =  'Einführung';
    $lang['strhost']  =  'Host';
    $lang['strport']  =  'Port';
    $lang['strlogout'] = 'Abmelden';
    $lang['strowner'] = 'Besitzer';
    $lang['straction'] = 'Aktion';
    $lang['stractions'] = 'Aktionen';
    $lang['strname'] = 'Name';
    $lang['strdefinition'] = 'Definition';
    $lang['strproperties'] = 'Eigenschaften';
    $lang['strbrowse'] = 'Durchsuchen';
    $lang['strdrop'] = 'Löschen';
    $lang['strdropped'] = 'Gelöscht';
    $lang['strnull'] = 'Null';
    $lang['strnotnull'] = 'Nicht Null';
    $lang['strprev'] = 'zurück';
    $lang['strnext'] = 'weiter';
    $lang['strfirst'] = '<< Anfang';
    $lang['strlast'] = 'Ende >>';
    $lang['strfailed']  =  'Fehlgeschlagen';
    $lang['strcreate']  =  'Erstellen';
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
    $lang['strtrue'] = 'Wahr';
    $lang['strfalse'] = 'Falsch';
    $lang['stredit']  =  'Bearbeiten';
    $lang['strcolumn']  =  'Spalte';
    $lang['strcolumns']  =  'Spalten';
    $lang['strrows'] = 'Datensätze';
    $lang['strrowsaff']  =  'Datensätze betroffen.';
    $lang['strobjects'] = 'Objekt(e)';
    $lang['strback'] = 'Zurück';
    $lang['strqueryresults'] = 'Abfrageergebnis';
    $lang['strshow'] = 'Anzeigen';
    $lang['strempty'] = 'Leeren';
    $lang['strlanguage'] = 'Sprache';
    $lang['strencoding'] = 'Codierung';
    $lang['strvalue'] = 'Wert';
    $lang['strunique'] = 'eindeutig';
    $lang['strprimary'] = 'Primär';
    $lang['strexport'] = 'Exportieren';
    $lang['strimport']  =  'Importieren';
    $lang['strallowednulls']  =  'Erlaubte NULL-Zeichen';
    $lang['strbackslashn']  =  '\N';
    $lang['strnull']  =  'Null';
    $lang['strnull']  =  'NULL (Das Wort)';
    $lang['stremptystring']  =  'Leere Zeichenkette / Leeres Feld';
    $lang['strsql'] = 'SQL';
    $lang['stradmin'] = 'Admin';
    $lang['strvacuum'] = 'Vacuum';
    $lang['stranalyze'] = 'Analysieren';
    $lang['strclusterindex'] = 'Cluster';
    $lang['strclustered']  =  'Geclustert?';
    $lang['strreindex'] = 'Reindizierung';
    $lang['strrun'] = 'Los';
    $lang['stradd'] = 'Hinzufügen';
    $lang['strremove']  =  'Entfernen';
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
    $lang['strseparator']  =  ': ';
    $lang['strexpand'] = 'Aufklappen';
    $lang['strcollapse'] = 'Zuklappen';
    $lang['strexplain'] = 'Explain';
    $lang['strexplainanalyze']  =  'Explain Analyze';
    $lang['strfind'] = 'Suchen';
    $lang['stroptions']  =  'Optionen';
    $lang['strrefresh']  =  'Aktualisieren';
    $lang['strdownload']  =  'Download';
    $lang['strdownloadgzipped'] = 'gzip-komprimiert herunterladen';
    $lang['strinfo'] = 'Info';
    $lang['stroids'] = 'OIDs';
    $lang['stradvanced'] = 'Erweitert';
    $lang['strvariables'] = 'Variablen';
    $lang['strprocess'] = 'Prozess';
    $lang['strprocesses'] = 'Prozesse';
    $lang['strsetting'] = 'Einstellung';
    $lang['streditsql'] = 'SQL bearbeiten';
    $lang['strruntime']  =  'Laufzeit gesamt: %s ms';
    $lang['strpaginate'] = 'Ergebnisse paginieren';
    $lang['struploadscript']  =  'oder laden Sie ein SQL-Script hoch:';
    $lang['strstarttime'] = 'Startzeitpunkt';
    $lang['strfile']  =  'Datei';
    $lang['strfileimported']  =  'Datei importiert.';
    $lang['strtrycred']  =  'Diese Anmeldedaten für alle Server benutzen';

	// Error handling
    $lang['strnoframes']  =  'Diese Anwendung funktioniert am besten mit einem Browser, der Frames beherrscht, kann aber auch ohne Frames benutzt werden, indem dem untenstehenden Verweis gefolgt wird.';
    $lang['strnoframeslink']  =  'Ohne Frames benutzen';
    $lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie müssen sie aus der config.inc.php-dist neu erzeugen.';
    $lang['strnotloaded'] = 'Ihre PHP-Installation besitzt keine passende Datenbankunterstützung.';
    $lang['strpostgresqlversionnotsupported']  =  'Ihre PostgreSQL-Version wird nicht unterstützt. Bitte erneuert sie PostgreSQL auf Version %s oder eine neuere Version.';
    $lang['strbadschema'] = 'Unzulässiges Schema angegeben.';
    $lang['strbadencoding'] = 'Abbruch beim Setzen der Clientcodierung in der Datenbank.';
    $lang['strsqlerror'] = 'SQL Fehler:';
    $lang['strinstatement'] = 'In der Anweisung:';
    $lang['strinvalidparam'] = 'Unzulässige Skriptparameter.';
    $lang['strnodata'] = 'Keine Datensätze gefunden.';
    $lang['strnoobjects']  =  'Keine Objekte gefunden.';
    $lang['strrownotunique'] = 'Für diesen Datensatz ist kein eindeutiges Merkmal vorhanden.';
    $lang['strnoreportsdb']  =  'Sie haben die Berichtsdatenbank nicht angelegt. In der Datei INSTALL befinden sich Anweisungen dazu.';
    $lang['strnouploads']  =  'Das Hochladen von Dateien ist ausgeschaltet.';
    $lang['strimporterror']  =  'Importfehler.';
    $lang['strimporterror-fileformat']  =  'Importfehler: Konnte Dateiformat nicht bestimmen.';
    $lang['strimporterrorline']  =  'Importfehler auf Zeile %s.';
    $lang['strimporterrorline-badcolumnnum']  =  'Importfehler auf Zeile %s: Zeile hat nicht die richtige Anzahl an Spalten.';
    $lang['strimporterror-uploadedfile']  =  'Importfehler: Die Datei konnte nicht auf den Server geladen werden';
    $lang['strcannotdumponwindows']  =  'Das Dumpen von komplexen Tabellen- und Schemanamen unter Windows wird nicht unterstützt.';

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
    $lang['strtablecreatedbad'] = 'Erstellen der Tabelle fehlgeschlagen.';
    $lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle "%s" löschen möchten?';
    $lang['strtabledropped'] = 'Tabelle gelöscht.';
    $lang['strtabledroppedbad'] = 'Löschen der Tabelle fehlgeschlagen.';
    $lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Inhalt der Tabelle "%s" löschen möchten?';
    $lang['strtableemptied'] = 'Tabelleninhalt gelöscht.';
    $lang['strtableemptiedbad'] = 'Löschen des Tabelleninhaltes fehlgeschlagen.';
    $lang['strinsertrow'] = 'Datensatz einfügen';
    $lang['strrowinserted'] = 'Datensatz eingefügt.';
    $lang['strrowinsertedbad'] = 'Einfügen des Datensatzes fehlgeschlagen.';
    $lang['strrowduplicate']  =  'Einfügen des Datensatzes fehlgeschlagen, es wurde versucht, ein Duplikat einzufügen.';
    $lang['streditrow'] = 'Datensatz bearbeiten';
    $lang['strrowupdated'] = 'Datensatz geändert.';
    $lang['strrowupdatedbad'] = 'Ändern des Datensatzes fehlgeschlagen.';
    $lang['strdeleterow'] = 'Datensatz löschen';
    $lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diesen Datensatz löschen möchten?';
    $lang['strrowdeleted'] = 'Datensatz gelöscht.';
    $lang['strrowdeletedbad'] = 'Löschen des Datensatzes fehlgeschlagen.';
    $lang['strinsertandrepeat']  =  'Einfügen und Wiederholen';
    $lang['strnumcols']  =  'Anzahl Spalten';
    $lang['strcolneedsname']  =  'Sie müssen einen Namen für die Spalte angeben.';
    $lang['strselectallfields']  =  'Alle Felder auswählen';
    $lang['strselectneedscol'] = 'Sie müssen mindestens eine Spalte anzeigen lassen';
    $lang['strselectunary'] = 'Unäre Operatoren können keine Werte haben.';
    $lang['straltercolumn'] = 'Spalte ändern';
    $lang['strcolumnaltered'] = 'Spalte geändert.';
    $lang['strcolumnalteredbad'] = 'Ändern der Spalte fehlgeschlagen.';
    $lang['strconfdropcolumn'] = 'Sind Sie sicher, dass Sie die Spalte "%s" aus der Tabelle "%s" löschen möchten?';
    $lang['strcolumndropped'] = 'Spalte gelöscht.';
    $lang['strcolumndroppedbad'] = 'Löschen der Spalte fehlgschlagen.';
    $lang['straddcolumn'] = 'Spalte hinzufügen';
    $lang['strcolumnadded'] = 'Spalte hinzugefügt.';
    $lang['strcolumnaddedbad'] = 'Hinzufügen der Spalte fehlgeschlagen.';
    $lang['strcascade'] = 'CASCADE';
    $lang['strtablealtered'] = 'Tabelle geändert.';
    $lang['strtablealteredbad'] = 'Ändern der Tabelle fehlgeschlagen.';
    $lang['strdataonly']  =  'Nur Daten';
    $lang['strstructureonly']  =  'Nur die Struktur';
    $lang['strstructureanddata']  =  'Struktur und Daten';
    $lang['strtabbed']  =  'mit Tabluatoren';
    $lang['strauto']  =  'Automatisch';
    $lang['strconfvacuumtable']  =  'Sind sie sicher, dass Sie VACUUM auf "%s" ausführen wollen?';
    $lang['strestimatedrowcount']  =  'Geschätzte Anzahl Datensätze';

	// Users
    $lang['struser'] = 'Benutzer';
    $lang['strusers'] = 'Benutzer';
    $lang['strusername'] = 'Benutzername';
    $lang['strpassword'] = 'Passwort';
    $lang['strsuper'] = 'Superuser?';
    $lang['strcreatedb'] = 'Datenbank erstellen?';
    $lang['strexpires'] = 'Gültig bis';
    $lang['strsessiondefaults']  =  'Sitzungsstandards';
    $lang['strnousers'] = 'Keine Benutzer gefunden.';
    $lang['struserupdated'] = 'Benutzer ändern.';
    $lang['struserupdatedbad'] = 'Ändern des Benutzers fehlgeschlagen.';
    $lang['strshowallusers'] = 'Zeige alle Benutzer';
    $lang['strcreateuser'] = 'Lege Benutzer an';
    $lang['struserneedsname'] = 'Sie müssen einen Namen für den Benutzer angeben.';
    $lang['strusercreated'] = 'Benutzer angelegt.';
    $lang['strusercreatedbad'] = 'Anlegen des Benutzers fehlgeschlagen.';
    $lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer "%s" löschen möchten?';
    $lang['struserdropped'] = 'Benutzer gelöscht.';
    $lang['struserdroppedbad'] = 'Löschen des Benutzers fehlgeschlagen.';

    // Groups
    $lang['straccount'] = 'Konto';
    $lang['strchangepassword'] = 'Passwort ändern';
    $lang['strpasswordchanged'] = 'Passwort geändert.';
    $lang['strpasswordchangedbad'] = 'Ändern des Passwortes fehlgeschlagen.';
    $lang['strpasswordshort'] = 'Das Passwort ist zu kurz.';
    $lang['strpasswordconfirm'] = 'Die beiden Passwörter stimmen nicht überein.';
	
	// Groups
    $lang['strgroup']  =  'Gruppe';
    $lang['strgroups'] = 'Gruppen';
    $lang['strnogroup'] = 'Gruppe nicht gefunden.';
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
    $lang['strdatabasecreatedbad'] = 'Erstellen der Datenbank fehlgeschlagen.';
    $lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank "%s" löschen möchten?';
    $lang['strdatabasedropped'] = 'Datenbank gelöscht.';
    $lang['strdatabasedroppedbad'] = 'Löschen der Datenbank fehlgeschlagen.';
    $lang['strentersql'] = 'Auszuführenden SQL-Code eingeben:';
    $lang['strsqlexecuted'] = 'SQL-Code ausgeführt.';
    $lang['strvacuumgood'] = 'Vacuum abgeschlossen.';
    $lang['strvacuumbad'] = 'Vacuum fehlgeschlagen.';
    $lang['stranalyzegood'] = 'Analysieren abgeschlossen.';
    $lang['stranalyzebad'] = 'Analysieren fehlgeschlagen.';
    $lang['strreindexgood']  =  'Reindex abgeschlossen.';
    $lang['strreindexbad']  =  'Reindex fehlgeschlagen.';
    $lang['strfull']  =  'Vollständig';
    $lang['strfreeze']  =  'Einfrieren';
    $lang['strforce']  =  'Erzwingen';
    $lang['strsignalsent']  =  'Signal gesendet.';
    $lang['strsignalsentbad']  =  'Senden des Signales fehlgeschlagen.';
    $lang['strallobjects']  =  'Alle Objekte';
    $lang['strdatabasealtered']  =  'Datenbank geändert.';
    $lang['strdatabasealteredbad']  =  'Ändern der Datenbank fehlgeschlagen.';

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
    $lang['strviewneedsfields']  =  'Sie müssen die Spalten angeben, die sie in der Sicht haben wollen.';
    $lang['strviewcreated'] = 'Sicht erstellt.';
    $lang['strviewcreatedbad'] = 'Erstellen der Sicht fehlgeschlagen.';
    $lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht "%s" löschen möchten?';
    $lang['strviewdropped'] = 'Sicht gelöscht.';
    $lang['strviewdroppedbad'] = 'Löschen der Sicht fehlgeschlagen.';
    $lang['strviewupdated'] = 'Sicht geändert.';
    $lang['strviewupdatedbad'] = 'Ändern der Sicht fehlgeschlagen.';
    $lang['strviewlink']  =  'Verbindende Schlüssel';
    $lang['strviewconditions']  =  'Zusätzliche Bedingungen';
    $lang['strcreateviewwiz']  =  'Sicht mit dem Assistenten erstellen';

    // Sequences
    $lang['strsequence'] = 'Sequenz';
    $lang['strsequences'] = 'Sequenzen';
    $lang['strshowallsequences'] = 'Zeige alle Sequenzen';
    $lang['strnosequence'] = 'Keine Sequenz gefunden.';
    $lang['strnosequences'] = 'Keine Sequenzen gefunden.';
    $lang['strcreatesequence'] = 'Erstelle Sequenz';
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
    $lang['strsequencecreatedbad'] = 'Erstellen der Sequenz fehlgeschlagen.';
    $lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz "%s" löschen möchten?';
    $lang['strsequencedropped'] = 'Sequenz gelöscht.';
    $lang['strsequencedroppedbad'] = 'Löschen der Sequenz fehlgeschlagen.';
    $lang['strsequencereset'] = 'Sequenz zurückgesetzt..';
    $lang['strsequenceresetbad'] = 'Rücksetzen der Sequenz fehlgeschlagen.';

    // Indexes
    $lang['strindex']  =  'Index';
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
    $lang['strindexcreatedbad'] = 'Erstellen des Index fehlgeschlagen.';
    $lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index "%s" löschen möchten?';
    $lang['strindexdropped'] = 'Index gelöscht.';
    $lang['strindexdroppedbad'] = 'Löschen des Index fehlgeschlagen.';
    $lang['strkeyname'] = 'Schlüsselname';
    $lang['struniquekey'] = 'Eindeutiger Schlüssel';
    $lang['strprimarykey'] = 'Primärerschlüssel';
    $lang['strindextype'] = 'Typ des Index';
    $lang['strtablecolumnlist'] = 'Spalten in der Tabelle';
    $lang['strindexcolumnlist']  =  'Spalten im Index';
    $lang['strconfcluster'] = 'Sind Sie sicher, dass Sie "%s" clustern wollen?';
    $lang['strclusteredgood'] = 'Clustern abgeschlossen.';
    $lang['strclusteredbad'] = 'Clustern fehlgeschlagen.';

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
    $lang['strrulecreatedbad'] = 'Erstellen der Regel fehlgeschlagen.';
    $lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel "%s" in der Tabelle "%s" löschen möchten?';
    $lang['strruledropped'] = 'Regel gelöscht.';
    $lang['strruledroppedbad'] = 'Löschen der Regel fehlgeschlagen.';

    // Constraints
    $lang['strconstraint']  =  'Constraint';
    $lang['strconstraints'] = 'Constraints';
    $lang['strshowallconstraints'] = 'Zeige alle Constraints';
    $lang['strnoconstraints'] = 'Keine Constraints gefunden.';
    $lang['strcreateconstraint'] = 'Constraint erstellen';
    $lang['strconstraintcreated'] = 'Constraint erstellt.';
    $lang['strconstraintcreatedbad'] = 'Erstellen des Constraints fehlgeschlagen.';
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
    $lang['strfkneedstarget'] = 'Ein Fremdschlüssel benötigt eine Zieltabelle.';
    $lang['strfkadded']  =  'Fremdschlüssel hinzugefügt.';
    $lang['strfkaddedbad'] = 'Hinzufügen eines Fremdschlüssels fehlgeschlagen.';
    $lang['strfktarget'] = 'Zieltabelle';
    $lang['strfkcolumnlist'] = 'Spalten im Schlüssel';
    $lang['strondelete']  =  'ON DELETE';
    $lang['stronupdate'] = 'ON UPDATE';

    // Functions
    $lang['strfunction'] = 'Funktion';
    $lang['strfunctions'] = 'Funktionen';
    $lang['strshowallfunctions'] = 'Zeige alle Funktionen';
    $lang['strnofunction'] = 'Keine Funktion gefunden.';
    $lang['strnofunctions'] = 'Keine Funktionen gefunden.';
    $lang['strcreateplfunction']  =  'SQL/PL-Funktion erstellen';
    $lang['strcreateinternalfunction']  =  'Interne Funktion erstellen';
    $lang['strcreatecfunction']  =  'C-Funktion erstellen';
    $lang['strfunctionname'] = 'Name der Funktion';
    $lang['strreturns'] = 'Liefert';
    $lang['strarguments'] = 'Argumente';
    $lang['strproglanguage'] = 'Sprache';
    $lang['strfunctionneedsname'] = 'Sie müssen für die Funktion einen Namen angeben.';
    $lang['strfunctionneedsdef'] = 'Sie müssen für die Funktion eine Definition angeben.';
    $lang['strfunctioncreated'] = 'Funktion erstellt.';
    $lang['strfunctioncreatedbad'] = 'Erstellen der Funktion fehlgeschlagen.';
    $lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion "%s" löschen möchten?';
    $lang['strfunctiondropped'] = 'Funktion gelöscht.';
    $lang['strfunctiondroppedbad'] = 'Löschen der Funktion fehlgeschlagen.';
    $lang['strfunctionupdated'] = 'Funktion geändert.';
    $lang['strfunctionupdatedbad'] = 'Ändern der Funktion fehlgeschlagen.';
    $lang['strobjectfile']  =  'Objektdatei';
    $lang['strlinksymbol']  =  'Bindesymbol';

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
    $lang['strtriggercreatedbad'] = 'Erstellen des Triggers fehlgeschlagen.';
    $lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger "%s" in der Tabelle "%s" löschen möchten?';
    $lang['strtriggerdropped'] = 'Trigger gelöscht.';
    $lang['strtriggerdroppedbad'] = 'Löschen des Triggers fehlgeschlagen.';
    $lang['strtriggeraltered'] = 'Trigger geändert.';
    $lang['strtriggeralteredbad'] = 'Ändern des Triggers fehlgeschlagen.';
    $lang['strforeach']  =  'Für alle';

    // Types
    $lang['strtype'] = 'Datentyp';
    $lang['strtypes'] = 'Datentypen';
    $lang['strshowalltypes'] = 'Zeige alle Datentypen';
    $lang['strnotype'] = 'Kein Datentyp gefunden.';
    $lang['strnotypes'] = 'Keine Datentypen gefunden.';
    $lang['strcreatetype'] = 'Datentyp erstellen';
    $lang['strcreatecomptype']  =  'Zusammengesetzten Typ erstellen';
    $lang['strtypeneedsfield']  =  'Sie müssen wenigstens ein Feld angeben.';
    $lang['strtypeneedscols']  =  'Sie müssen eine gültige Anzahl an Feldern angeben.';	
    $lang['strtypename'] = 'Name des Datentyps';
    $lang['strinputfn'] = 'Eingabefunktion';
    $lang['stroutputfn'] = 'Ausgabefunktion';
    $lang['strpassbyval'] = 'Übergabe by value?';
    $lang['stralignment'] = 'Alignment';
    $lang['strelement'] = 'Element';
    $lang['strdelimiter'] = 'Trennzeichen';
    $lang['strstorage'] = 'Speicherung';
    $lang['strfield']  =  'Feld';
    $lang['strnumfields']  =  'Anzahl Felder';
    $lang['strtypeneedsname'] = 'Sie müssen einen Namen für den Datentyp angeben.';
    $lang['strtypeneedslen'] = 'Sie müssen eine Länge für den Datentyp angeben.';
    $lang['strtypecreated'] = 'Datentyp erstellt.';
    $lang['strtypecreatedbad'] = 'Erstellen des Datentypen fehlgeschlagen.';
    $lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentyp "%s" löschen möchten?';
    $lang['strtypedropped'] = 'Datentyp gelöscht.';
    $lang['strtypedroppedbad'] = 'Löschen des Datentyps fehlgeschlagen.';
    $lang['strflavor']  =  'Art';
    $lang['strbasetype']  =  'Basis';
    $lang['strcompositetype']  =  'Zusammengesetzt';
    $lang['strpseudotype']  =  'Pseudo';

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
    $lang['strschemacreatedbad'] = 'Erstellen des Schemas fehlgeschlagen.';
    $lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema "%s" löschen möchten?';
    $lang['strschemadropped'] = 'Schema gelöscht.';
    $lang['strschemadroppedbad'] = 'Löschen des Schemas fehlgeschlagen';
    $lang['strschemaaltered']  =  'Schema geändert.';
    $lang['strschemaalteredbad']  =  'Änderung des Schemas fehlgeschlagen.';
    $lang['strsearchpath']  =  'Schemasuchpfad';

	// Reports
    $lang['strreport']  =  'Bericht';
    $lang['strreports'] = 'Berichte';
    $lang['strshowallreports'] = 'Zeige alle Berichte';
    $lang['strnoreports'] = 'Keine Berichte gefunden.';
    $lang['strcreatereport'] = 'Bericht erstellen';
    $lang['strreportdropped'] = 'Bericht gelöscht.';
    $lang['strreportdroppedbad'] = 'Löschen des Berichtes fehlgeschlagen.';
    $lang['strconfdropreport']  =  'Sind Sie sicher, dass Sie den Bericht "%s" löschen wollen?';
    $lang['strreportneedsname'] = 'Sie müssen für den Bericht einen Namen angeben.';
    $lang['strreportneedsdef'] = 'Sie müssen SQL-Code für den Bericht eingeben.';
    $lang['strreportcreated'] = 'Bericht gespeichert.';
    $lang['strreportcreatedbad'] = 'Speichern des Berichtes fehlgeschlagen.';

    // Domains
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
    $lang['strdomainaltered'] = 'Domain geändert.';
    $lang['strdomainalteredbad'] = 'Ändern der Domain fehlgeschlagen.';

	// Operators
    $lang['stroperator']  =  'Operator';
    $lang['stroperators']  =  'Operatoren';
    $lang['strshowalloperators']  =  'Alle Operatoren zeigen';
    $lang['strnooperator']  =  'Kein Operator gefunden.';
    $lang['strnooperators']  =  'Keine Operatoren gefunden.';
    $lang['strcreateoperator']  =  'Operator erstellen';
    $lang['strleftarg']  =  'Typ des linken Arguments';
    $lang['strrightarg']  =  'Typ des rechter Arguments';
    $lang['strcommutator'] = 'Commutator';
    $lang['strnegator'] = 'Negator';
    $lang['strrestrict'] = 'Restrict';
    $lang['strjoin'] = 'Join';
    $lang['strhashes'] = 'Hashes';
    $lang['strmerges'] = 'Merges';
    $lang['strleftsort'] = 'Left sort';
    $lang['strrightsort'] = 'Right sort';
    $lang['strlessthan'] = 'Kleiner als';
    $lang['strgreaterthan'] = 'Größer als';
    $lang['stroperatorneedsname']  =  'Sie müssen einen Namen für den Operator angeben.';
    $lang['stroperatorcreated']  =  'Operator erstellt';
    $lang['stroperatorcreatedbad']  =  'Erstellen des Operators fehlgeschlagen.';
    $lang['strconfdropoperator']  =  'Sind Sie sicher, dass Sie den Operator "%s" löschen wollen?';
    $lang['stroperatordropped']  =  'Operator gelöscht.';
    $lang['stroperatordroppedbad']  =  'Löschen des Operators fehlgeschlagen.';

	// Casts
    $lang['strcasts'] = 'Typumwandlungen';
    $lang['strnocasts'] = 'Keine Typumwandlungen gefunden.';
    $lang['strsourcetype'] = 'Quelltyp';
    $lang['strtargettype'] = 'Zieltyp';
    $lang['strimplicit'] = 'Implizit';
    $lang['strinassignment'] = 'Während Zuweisung';
    $lang['strbinarycompat'] = '(binärkompatibel)';
	
	// Conversions
    $lang['strconversions'] = 'Konvertierungen';
    $lang['strnoconversions'] = 'Keine Konvertierungen gefunden.';
    $lang['strsourceencoding'] = 'Quellkodierung';
    $lang['strtargetencoding'] = 'Zielkodierung';
	
	// Languages
    $lang['strlanguages'] = 'Sprachen';
    $lang['strnolanguages'] = 'Keine Sprachen gefunden.';
    $lang['strtrusted'] = 'vertrauenswürdig';
	
	// Info
    $lang['strnoinfo'] = 'Keine Informationen vorhanden.';
    $lang['strreferringtables'] = 'Tabellen, die sich mit Fremdschlüsseln auf diese Tabelle beziehen';
    $lang['strparenttables'] = 'Elterntabellen';
    $lang['strchildtables'] = 'Kindtabellen';
	
	// Aggregates
    $lang['straggregates']  =  'Aggregate';
    $lang['strnoaggregates'] = 'Keine Aggregate gefunden.';
    $lang['stralltypes'] = '(Alle Typen)';

    // Operator Classes
    $lang['stropclasses'] = 'Operatorklassen';
    $lang['strnoopclasses'] = 'Keine Operatorklassen gefunden.';
    $lang['straccessmethod'] = 'Zugriffsmethode';

	// Stats and performance
	$lang['strrowperf'] = 'Zeilenperformance';
	$lang['strioperf'] = 'E/A-Performance';
	$lang['stridxrowperf'] = 'Index-Zeilen-Performance';
	$lang['stridxioperf'] = 'Index-E/A-Performance';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequenziell';
	$lang['strscan'] = 'Scan';
	$lang['strread'] = 'Lesen';
	$lang['strfetch'] = 'Holen';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Festplatte';
	$lang['strrows2'] = 'Zeilen';

	// Tablespaces
    $lang['strtablespace']  =  'Tablespace';
    $lang['strtablespaces']  =  'Tablespaces';
    $lang['strshowalltablespaces']  =  'Alle Tablespaces anzeigen';
    $lang['strnotablespaces']  =  'Keine Tablespaces gefunden.';
    $lang['strcreatetablespace']  =  'Tablespace erstellen';
    $lang['strlocation']  =  'Ort';
    $lang['strtablespaceneedsname']  =  'Sie müssen einen Namen für den Tablespace angeben.';
    $lang['strtablespaceneedsloc']  =  'Sie müssen ein Verzeichnis angeben, in dem Sie den Tablespace erstellen möchten.';
    $lang['strtablespacecreated']  =  'Tablespace erstellt.';
    $lang['strtablespacecreatedbad']  =  'Erstellen des Tablespace fehlgeschlagen.';
    $lang['strconfdroptablespace']  =  'Sind Sie sicher, dass Sie den Tablespace "%s" löschen wollen?';
    $lang['strtablespacedropped']  =  'Tablespace gelöscht.';
    $lang['strtablespacedroppedbad']  =  'Löschen des Tablespace fehlgeschlagen.';
    $lang['strtablespacealtered']  =  'Tablespace geändert.';
    $lang['strtablespacealteredbad']  =  'Ändern des Tablespace fehlgeschlagen.';

	// Slony clusters
$lang['strcluster']  =  'Cluster';
$lang['strnoclusters']  =  'No clusters found.';
$lang['strconfdropcluster']  =  'Are you sure you want to drop cluster "%s"?';
$lang['strclusterdropped']  =  'Cluster dropped.';
$lang['strclusterdroppedbad']  =  'Cluster drop failed.';
$lang['strinitcluster']  =  'Initialize cluster';
$lang['strclustercreated']  =  'Cluster initialized.';
$lang['strclustercreatedbad']  =  'Cluster initialization failed.';
$lang['strclusterneedsname']  =  'You must give a name for the cluster.';
$lang['strclusterneedsnodeid']  =  'You must give an ID for the local node.';
	
	// Slony nodes
$lang['strnodes']  =  'Nodes';
$lang['strnonodes']  =  'No nodes found.';
$lang['strcreatenode']  =  'Create node';
$lang['strid']  =  'ID';
$lang['stractive']  =  'Active';
$lang['strnodecreated']  =  'Node created.';
$lang['strnodecreatedbad']  =  'Node creation failed.';
$lang['strconfdropnode']  =  'Are you sure you want to drop node "%s"?';
$lang['strnodedropped']  =  'Node dropped.';
$lang['strnodedroppedbad']  =  'Node drop failed';
$lang['strfailover']  =  'Failover';
$lang['strnodefailedover']  =  'Node failed over.';
$lang['strnodefailedoverbad']  =  'Node failover failed.';
	
	// Slony paths	
$lang['strpaths']  =  'Paths';
$lang['strnopaths']  =  'No paths found.';
$lang['strcreatepath']  =  'Create path';
$lang['strnodename']  =  'Node name';
$lang['strnodeid']  =  'Node ID';
$lang['strconninfo']  =  'Connection string';
$lang['strconnretry']  =  'Seconds before retry to connect';
$lang['strpathneedsconninfo']  =  'You must give a connection string for the path.';
$lang['strpathneedsconnretry']  =  'You must give the number of seconds to wait before retry to connect.';
$lang['strpathcreated']  =  'Path created.';
$lang['strpathcreatedbad']  =  'Path creation failed.';
$lang['strconfdroppath']  =  'Are you sure you want to drop path "%s"?';
$lang['strpathdropped']  =  'Path dropped.';
$lang['strpathdroppedbad']  =  'Path drop failed.';

	// Slony listens
$lang['strlistens']  =  'Listens';
$lang['strnolistens']  =  'No listens found.';
$lang['strcreatelisten']  =  'Create listen';
$lang['strlistencreated']  =  'Listen created.';
$lang['strlistencreatedbad']  =  'Listen creation failed.';
$lang['strconfdroplisten']  =  'Are you sure you want to drop listen "%s"?';
$lang['strlistendropped']  =  'Listen dropped.';
$lang['strlistendroppedbad']  =  'Listen drop failed.';

	// Slony replication sets
$lang['strrepsets']  =  'Replication sets';
$lang['strnorepsets']  =  'No replication sets found.';
$lang['strcreaterepset']  =  'Create replication set';
$lang['strrepsetcreated']  =  'Replication set created.';
$lang['strrepsetcreatedbad']  =  'Replication set creation failed.';
$lang['strconfdroprepset']  =  'Are you sure you want to drop replication set "%s"?';
$lang['strrepsetdropped']  =  'Replication set dropped.';
$lang['strrepsetdroppedbad']  =  'Replication set drop failed.';
$lang['strmerge']  =  'Merge';
$lang['strmergeinto']  =  'Merge into';
$lang['strrepsetmerged']  =  'Replication sets merged.';
$lang['strrepsetmergedbad']  =  'Replication sets merge failed.';
$lang['strmove']  =  'Move';
$lang['strneworigin']  =  'New origin';
$lang['strrepsetmoved']  =  'Replication set moved.';
$lang['strrepsetmovedbad']  =  'Replication set move failed.';
$lang['strnewrepset']  =  'New replication set';
$lang['strlock']  =  'Lock';
$lang['strlocked']  =  'Locked';
$lang['strunlock']  =  'Unlock';
$lang['strconflockrepset']  =  'Are you sure you want to lock replication set "%s"?';
$lang['strrepsetlocked']  =  'Replication set locked.';
$lang['strrepsetlockedbad']  =  'Replication set lock failed.';
$lang['strconfunlockrepset']  =  'Are you sure you want to unlock replication set "%s"?';
$lang['strrepsetunlocked']  =  'Replication set unlocked.';
$lang['strrepsetunlockedbad']  =  'Replication set unlock failed.';
$lang['strexecute']  =  'Execute';
$lang['stronlyonnode']  =  'Only on node';
$lang['strddlscript']  =  'DDL script';
$lang['strscriptneedsbody']  =  'You must supply a script to be executed on all nodes.';
$lang['strscriptexecuted']  =  'Replication set DDL script executed.';
$lang['strscriptexecutedbad']  =  'Failed executing replication set DDL script.';
$lang['strtabletriggerstoretain']  =  'The following triggers will NOT be disabled by Slony:';

	// Slony tables in replication sets
$lang['straddtable']  =  'Add table';
$lang['strtableneedsuniquekey']  =  'Table to be added requires a primary or unique key.';
$lang['strtableaddedtorepset']  =  'Table added to replication set.';
$lang['strtableaddedtorepsetbad']  =  'Failed adding table to replication set.';
$lang['strconfremovetablefromrepset']  =  'Are you sure you want to remove the table "%s" from replication set "%s"?';
$lang['strtableremovedfromrepset']  =  'Table removed from replication set.';
$lang['strtableremovedfromrepsetbad']  =  'Failed to remove table from replication set.';

	// Slony sequences in replication sets
$lang['straddsequence']  =  'Add sequence';
$lang['strsequenceaddedtorepset']  =  'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad']  =  'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset']  =  'Are you sure you want to remove the sequence "%s" from replication set "%s"?';
$lang['strsequenceremovedfromrepset']  =  'Sequence removed from replication set.';
$lang['strsequenceremovedfromrepsetbad']  =  'Failed to remove sequence from replication set.';

	// Slony subscriptions
$lang['strsubscriptions']  =  'Subscriptions';
$lang['strnosubscriptions']  =  'No subscriptions found.';

	// Miscellaneous
    $lang['strtopbar'] = '%s läuft auf %s:%s -- Sie sind als "%s" angemeldet, %s';
    $lang['strtimefmt'] = 'D, j. n. Y, G:i';
    $lang['strhelp'] = 'Hilfe';
    $lang['strhelpicon']  =  '?';
    $lang['strlogintitle']  =  'Auf %s anmelden';
    $lang['strlogoutmsg']  =  'Von %s abgemeldet';
    $lang['strloading']  =  'Lade...';
    $lang['strerrorloading']  =  'Fehler beim Laden';
    $lang['strclicktoreload']  =  'Klicken Sie zum neu laden';

?>
