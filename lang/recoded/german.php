<?php

    // vim: ts=4 sw=4 et
    /**
    * German Language file for phpPgAdmin.
    * @maintainer M. Bertheau &lt;twanger@bluetwanger.de&gt;
    *
    * $Id: german.php,v 1.22 2005/10/27 01:21:04 chriskl Exp $
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
    $lang['strintroduction']  =  'Einf&uuml;hrung';
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
    $lang['strdrop'] = 'L&ouml;schen';
    $lang['strdropped'] = 'Gel&ouml;scht';
    $lang['strnull'] = 'Null';
    $lang['strnotnull'] = 'Nicht Null';
    $lang['strprev'] = 'zur&uuml;ck';
    $lang['strnext'] = 'weiter';
    $lang['strfirst'] = '&lt;&lt; Anfang';
    $lang['strlast'] = 'Ende &gt;&gt;';
    $lang['strfailed']  =  'Fehlgeschlagen';
    $lang['strcreate']  =  'Erstellen';
    $lang['strcreated'] = 'Erstellt';
    $lang['strcomment'] = 'Kommentar';
    $lang['strlength'] = 'L&auml;nge';
    $lang['strdefault'] = 'Vorgabe';
    $lang['stralter'] = '&Auml;ndern';
    $lang['strok'] = 'OK';
    $lang['strcancel'] = 'Abbrechen';
    $lang['strsave'] = 'Speichern';
    $lang['strreset'] = 'Zur&uuml;cksetzen';
    $lang['strinsert'] = 'Einf&uuml;gen';
    $lang['strselect'] = 'Abfrage';
    $lang['strdelete'] = 'L&ouml;schen';
    $lang['strupdate'] = '&Auml;ndern';
    $lang['strreferences'] = 'Referenzen';
    $lang['stryes'] = 'Ja';
    $lang['strno'] = 'Nein';
    $lang['strtrue'] = 'Wahr';
    $lang['strfalse'] = 'Falsch';
    $lang['stredit']  =  'Bearbeiten';
    $lang['strcolumn']  =  'Spalte';
    $lang['strcolumns']  =  'Spalten';
    $lang['strrows'] = 'Datens&auml;tze';
    $lang['strrowsaff']  =  'Datens&auml;tze betroffen.';
    $lang['strobjects'] = 'Objekt(e)';
    $lang['strback'] = 'Zur&uuml;ck';
    $lang['strqueryresults'] = 'Abfrageergebnis';
    $lang['strshow'] = 'Anzeigen';
    $lang['strempty'] = 'Leeren';
    $lang['strlanguage'] = 'Sprache';
    $lang['strencoding'] = 'Codierung';
    $lang['strvalue'] = 'Wert';
    $lang['strunique'] = 'eindeutig';
    $lang['strprimary'] = 'Prim&auml;r';
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
    $lang['stradd'] = 'Hinzuf&uuml;gen';
    $lang['strremove']  =  'Entfernen';
    $lang['strevent'] = 'Ereignis';
    $lang['strwhere'] = 'wo';
$lang['strinstead'] = 'DO INSTEAD';
    $lang['strwhen'] = 'Wann';
    $lang['strformat'] = 'Format';

    // Error handling
    $lang['strdata'] = 'Daten';
    $lang['strconfirm'] = 'Best&auml;tigen';
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
    $lang['strtrycred']  =  'Diese Anmeldedaten f&uuml;r alle Server benutzen';

	// Error handling
    $lang['strnoframes']  =  'Diese Anwendung funktioniert am besten mit einem Browser, der Frames beherrscht, kann aber auch ohne Frames benutzt werden, indem dem untenstehenden Verweis gefolgt wird.';
    $lang['strnoframeslink']  =  'Ohne Frames benutzen';
    $lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie m&uuml;ssen sie aus der config.inc.php-dist neu erzeugen.';
    $lang['strnotloaded'] = 'Ihre PHP-Installation besitzt keine passende Datenbankunterst&uuml;tzung.';
    $lang['strpostgresqlversionnotsupported']  =  'Ihre PostgreSQL-Version wird nicht unterst&uuml;tzt. Bitte erneuert sie PostgreSQL auf Version %s oder eine neuere Version.';
    $lang['strbadschema'] = 'Unzul&auml;ssiges Schema angegeben.';
    $lang['strbadencoding'] = 'Abbruch beim Setzen der Clientcodierung in der Datenbank.';
    $lang['strsqlerror'] = 'SQL Fehler:';
    $lang['strinstatement'] = 'In der Anweisung:';
    $lang['strinvalidparam'] = 'Unzul&auml;ssige Skriptparameter.';
    $lang['strnodata'] = 'Keine Datens&auml;tze gefunden.';
    $lang['strnoobjects']  =  'Keine Objekte gefunden.';
    $lang['strrownotunique'] = 'F&uuml;r diesen Datensatz ist kein eindeutiges Merkmal vorhanden.';
    $lang['strnoreportsdb']  =  'Sie haben die Berichtsdatenbank nicht angelegt. In der Datei INSTALL befinden sich Anweisungen dazu.';
    $lang['strnouploads']  =  'Das Hochladen von Dateien ist ausgeschaltet.';
    $lang['strimporterror']  =  'Importfehler.';
    $lang['strimporterror-fileformat']  =  'Importfehler: Konnte Dateiformat nicht bestimmen.';
    $lang['strimporterrorline']  =  'Importfehler auf Zeile %s.';
    $lang['strimporterrorline-badcolumnnum']  =  'Importfehler auf Zeile %s: Zeile hat nicht die richtige Anzahl an Spalten.';
    $lang['strimporterror-uploadedfile']  =  'Importfehler: Die Datei konnte nicht auf den Server geladen werden';
    $lang['strcannotdumponwindows']  =  'Das Dumpen von komplexen Tabellen- und Schemanamen unter Windows wird nicht unterst&uuml;tzt.';

    // Tables
    $lang['strtable'] = 'Tabelle';
    $lang['strtables'] = 'Tabellen';
    $lang['strshowalltables'] = 'Zeige alle Tabellen';
    $lang['strnotables'] = 'Keine Tabellen gefunden.';
    $lang['strnotable'] = 'Keine Tabelle gefunden.';
    $lang['strcreatetable'] = 'Neue Tabelle erstellen';
    $lang['strtablename'] = 'Tabellenname';
    $lang['strtableneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Tabelle einen Namen angeben.';
    $lang['strtableneedsfield'] = 'Sie m&uuml;ssen mindestens ein Feld angeben.';
    $lang['strtableneedscols'] = 'Sie m&uuml;ssen eine zul&auml;ssige Anzahl an Spalten angeben.';
    $lang['strtablecreated'] = 'Tabelle erstellt.';
    $lang['strtablecreatedbad'] = 'Erstellen der Tabelle fehlgeschlagen.';
    $lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strtabledropped'] = 'Tabelle gel&ouml;scht.';
    $lang['strtabledroppedbad'] = 'L&ouml;schen der Tabelle fehlgeschlagen.';
    $lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Inhalt der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strtableemptied'] = 'Tabelleninhalt gel&ouml;scht.';
    $lang['strtableemptiedbad'] = 'L&ouml;schen des Tabelleninhaltes fehlgeschlagen.';
    $lang['strinsertrow'] = 'Datensatz einf&uuml;gen';
    $lang['strrowinserted'] = 'Datensatz eingef&uuml;gt.';
    $lang['strrowinsertedbad'] = 'Einf&uuml;gen des Datensatzes fehlgeschlagen.';
    $lang['strrowduplicate']  =  'Einf&uuml;gen des Datensatzes fehlgeschlagen, es wurde versucht, ein Duplikat einzuf&uuml;gen.';
    $lang['streditrow'] = 'Datensatz bearbeiten';
    $lang['strrowupdated'] = 'Datensatz ge&auml;ndert.';
    $lang['strrowupdatedbad'] = '&Auml;ndern des Datensatzes fehlgeschlagen.';
    $lang['strdeleterow'] = 'Datensatz l&ouml;schen';
    $lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diesen Datensatz l&ouml;schen m&ouml;chten?';
    $lang['strrowdeleted'] = 'Datensatz gel&ouml;scht.';
    $lang['strrowdeletedbad'] = 'L&ouml;schen des Datensatzes fehlgeschlagen.';
    $lang['strinsertandrepeat']  =  'Einf&uuml;gen und Wiederholen';
    $lang['strnumcols']  =  'Anzahl Spalten';
    $lang['strcolneedsname']  =  'Sie m&uuml;ssen einen Namen f&uuml;r die Spalte angeben.';
    $lang['strselectallfields']  =  'Alle Felder ausw&auml;hlen';
    $lang['strselectneedscol'] = 'Sie m&uuml;ssen mindestens eine Spalte anzeigen lassen';
    $lang['strselectunary'] = 'Un&auml;re Operatoren k&ouml;nnen keine Werte haben.';
    $lang['straltercolumn'] = 'Spalte &auml;ndern';
    $lang['strcolumnaltered'] = 'Spalte ge&auml;ndert.';
    $lang['strcolumnalteredbad'] = '&Auml;ndern der Spalte fehlgeschlagen.';
    $lang['strconfdropcolumn'] = 'Sind Sie sicher, dass Sie die Spalte &quot;%s&quot; aus der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strcolumndropped'] = 'Spalte gel&ouml;scht.';
    $lang['strcolumndroppedbad'] = 'L&ouml;schen der Spalte fehlgschlagen.';
    $lang['straddcolumn'] = 'Spalte hinzuf&uuml;gen';
    $lang['strcolumnadded'] = 'Spalte hinzugef&uuml;gt.';
    $lang['strcolumnaddedbad'] = 'Hinzuf&uuml;gen der Spalte fehlgeschlagen.';
    $lang['strcascade'] = 'CASCADE';
    $lang['strtablealtered'] = 'Tabelle ge&auml;ndert.';
    $lang['strtablealteredbad'] = '&Auml;ndern der Tabelle fehlgeschlagen.';
    $lang['strdataonly']  =  'Nur Daten';
    $lang['strstructureonly']  =  'Nur die Struktur';
    $lang['strstructureanddata']  =  'Struktur und Daten';
    $lang['strtabbed']  =  'mit Tabluatoren';
    $lang['strauto']  =  'Automatisch';
    $lang['strconfvacuumtable']  =  'Sind sie sicher, dass Sie VACUUM auf &quot;%s&quot; ausf&uuml;hren wollen?';
    $lang['strestimatedrowcount']  =  'Gesch&auml;tzte Anzahl Datens&auml;tze';

	// Users
    $lang['struser'] = 'Benutzer';
    $lang['strusers'] = 'Benutzer';
    $lang['strusername'] = 'Benutzername';
    $lang['strpassword'] = 'Passwort';
    $lang['strsuper'] = 'Superuser?';
    $lang['strcreatedb'] = 'Datenbank erstellen?';
    $lang['strexpires'] = 'G&uuml;ltig bis';
    $lang['strsessiondefaults']  =  'Sitzungsstandards';
    $lang['strnousers'] = 'Keine Benutzer gefunden.';
    $lang['struserupdated'] = 'Benutzer &auml;ndern.';
    $lang['struserupdatedbad'] = '&Auml;ndern des Benutzers fehlgeschlagen.';
    $lang['strshowallusers'] = 'Zeige alle Benutzer';
    $lang['strcreateuser'] = 'Lege Benutzer an';
    $lang['struserneedsname'] = 'Sie m&uuml;ssen einen Namen f&uuml;r den Benutzer angeben.';
    $lang['strusercreated'] = 'Benutzer angelegt.';
    $lang['strusercreatedbad'] = 'Anlegen des Benutzers fehlgeschlagen.';
    $lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['struserdropped'] = 'Benutzer gel&ouml;scht.';
    $lang['struserdroppedbad'] = 'L&ouml;schen des Benutzers fehlgeschlagen.';

    // Groups
    $lang['straccount'] = 'Konto';
    $lang['strchangepassword'] = 'Passwort &auml;ndern';
    $lang['strpasswordchanged'] = 'Passwort ge&auml;ndert.';
    $lang['strpasswordchangedbad'] = '&Auml;ndern des Passwortes fehlgeschlagen.';
    $lang['strpasswordshort'] = 'Das Passwort ist zu kurz.';
    $lang['strpasswordconfirm'] = 'Die beiden Passw&ouml;rter stimmen nicht &uuml;berein.';
	
	// Groups
    $lang['strgroup']  =  'Gruppe';
    $lang['strgroups'] = 'Gruppen';
    $lang['strnogroup'] = 'Gruppe nicht gefunden.';
    $lang['strnogroups'] = 'Keine Gruppen gefunden.';
    $lang['strcreategroup'] = 'Gruppe erstellen';
    $lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
    $lang['strgroupneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Gruppe einen Namen angeben.';
    $lang['strgroupcreated'] = 'Gruppe angelegt.';
    $lang['strgroupcreatedbad'] = 'Anlegen der Gruppe fehlgeschlagen.';
    $lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strgroupdropped'] = 'Gruppe gel&ouml;scht.';
    $lang['strgroupdroppedbad'] = 'L&ouml;schen der Gruppe fehlgeschlagen.';
    $lang['strmembers'] = 'Mitglieder';
    $lang['straddmember'] = 'Mitglied hinzuf&uuml;gen';
    $lang['strmemberadded'] = 'Mitglied hinzugef&uuml;gt.';
    $lang['strmemberaddedbad'] = 'Hinzuf&uuml;gen des Mitglieds fehlgeschlagen.';
    $lang['strdropmember'] = 'Mitglied l&ouml;schen';
    $lang['strconfdropmember'] = 'Sind Sie sicher, dass Sie das Mitglied &quot;%s&quot; aus der Gruppe &quot;%s&quot; l&ouml;schen wollen?';
    $lang['strmemberdropped'] = 'Mitglied gel&ouml;scht.';
    $lang['strmemberdroppedbad'] = 'L&ouml;schen des Mitglieds fehlgeschlagen.';

    // Privilges
    $lang['strprivilege'] = 'Privileg';
    $lang['strprivileges'] = 'Privilegien';
    $lang['strnoprivileges'] = 'Dieses Objekt hat die Standard-Eigent&uuml;merrechte.';
    $lang['strgrant'] = 'Privilegien vergeben';
    $lang['strrevoke'] = 'Privilegien entziehen';
    $lang['strgranted'] = 'Privilegien vergeben / entzogen.';
    $lang['strgrantfailed'] = 'Vergeben von Privilegien fehlgeschlagen.';
    $lang['strgrantbad'] = 'Sie m&uuml;ssen wenigstens einen Benutzer oder eine Gruppe und wenigstens ein Privileg.';
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
    $lang['strdatabaseneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Datenbank einen Namen angeben.';
    $lang['strdatabasecreated'] = 'Datenbank erstellt.';
    $lang['strdatabasecreatedbad'] = 'Erstellen der Datenbank fehlgeschlagen.';
    $lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strdatabasedropped'] = 'Datenbank gel&ouml;scht.';
    $lang['strdatabasedroppedbad'] = 'L&ouml;schen der Datenbank fehlgeschlagen.';
    $lang['strentersql'] = 'Auszuf&uuml;hrenden SQL-Code eingeben:';
    $lang['strsqlexecuted'] = 'SQL-Code ausgef&uuml;hrt.';
    $lang['strvacuumgood'] = 'Vacuum abgeschlossen.';
    $lang['strvacuumbad'] = 'Vacuum fehlgeschlagen.';
    $lang['stranalyzegood'] = 'Analysieren abgeschlossen.';
    $lang['stranalyzebad'] = 'Analysieren fehlgeschlagen.';
    $lang['strreindexgood']  =  'Reindex abgeschlossen.';
    $lang['strreindexbad']  =  'Reindex fehlgeschlagen.';
    $lang['strfull']  =  'Vollst&auml;ndig';
    $lang['strfreeze']  =  'Einfrieren';
    $lang['strforce']  =  'Erzwingen';
    $lang['strsignalsent']  =  'Signal gesendet.';
    $lang['strsignalsentbad']  =  'Senden des Signales fehlgeschlagen.';
    $lang['strallobjects']  =  'Alle Objekte';
    $lang['strdatabasealtered']  =  'Datenbank ge&auml;ndert.';
    $lang['strdatabasealteredbad']  =  '&Auml;ndern der Datenbank fehlgeschlagen.';

    // Views
    $lang['strview'] = 'Sicht';
    $lang['strviews'] = 'Sichten';
    $lang['strshowallviews'] = 'Zeige alle Sichten';
    $lang['strnoview'] = 'Kein Sicht gefunden.';
    $lang['strnoviews'] = 'Keine Sichten gefunden.';
    $lang['strcreateview'] = 'Sicht erstellen';
    $lang['strviewname'] = 'Name der Sicht';
    $lang['strviewneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Sicht einen Namen angeben.';
    $lang['strviewneedsdef'] = 'Sie m&uuml;ssen f&uuml;r die Sicht eine Definition angeben.';
    $lang['strviewneedsfields']  =  'Sie m&uuml;ssen die Spalten angeben, die sie in der Sicht haben wollen.';
    $lang['strviewcreated'] = 'Sicht erstellt.';
    $lang['strviewcreatedbad'] = 'Erstellen der Sicht fehlgeschlagen.';
    $lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strviewdropped'] = 'Sicht gel&ouml;scht.';
    $lang['strviewdroppedbad'] = 'L&ouml;schen der Sicht fehlgeschlagen.';
    $lang['strviewupdated'] = 'Sicht ge&auml;ndert.';
    $lang['strviewupdatedbad'] = '&Auml;ndern der Sicht fehlgeschlagen.';
    $lang['strviewlink']  =  'Verbindende Schl&uuml;ssel';
    $lang['strviewconditions']  =  'Zus&auml;tzliche Bedingungen';
    $lang['strcreateviewwiz']  =  'Sicht mit dem Assistenten erstellen';

    // Sequences
    $lang['strsequence'] = 'Sequenz';
    $lang['strsequences'] = 'Sequenzen';
    $lang['strshowallsequences'] = 'Zeige alle Sequenzen';
    $lang['strnosequence'] = 'Keine Sequenz gefunden.';
    $lang['strnosequences'] = 'Keine Sequenzen gefunden.';
    $lang['strcreatesequence'] = 'Erstelle Sequenz';
    $lang['strlastvalue'] = 'Letzer Wert';
    $lang['strincrementby'] = 'Erh&ouml;hen um';
    $lang['strstartvalue'] = 'Startwert';
    $lang['strmaxvalue'] = 'Maximalwert';
    $lang['strminvalue'] = 'Minimalwert';
    $lang['strcachevalue'] = 'Cachewert';
    $lang['strlogcount'] = 'Log Anzahl';
    $lang['striscycled'] = 'Zyklisch?';
    $lang['striscalled'] = 'Aufgerufen?';
    $lang['strsequenceneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Sequenz einen Namen angeben.';
    $lang['strsequencecreated'] = 'Sequenz erstellt.';
    $lang['strsequencecreatedbad'] = 'Erstellen der Sequenz fehlgeschlagen.';
    $lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strsequencedropped'] = 'Sequenz gel&ouml;scht.';
    $lang['strsequencedroppedbad'] = 'L&ouml;schen der Sequenz fehlgeschlagen.';
    $lang['strsequencereset'] = 'Sequenz zur&uuml;ckgesetzt..';
    $lang['strsequenceresetbad'] = 'R&uuml;cksetzen der Sequenz fehlgeschlagen.';

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
    $lang['strindexneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Index einen Namen angeben.';
    $lang['strindexneedscols'] = 'Sie m&uuml;ssen eine zul&auml;ssige Anzahl an Spalten angeben.';
    $lang['strindexcreated'] = 'Index erstellt';
    $lang['strindexcreatedbad'] = 'Erstellen des Index fehlgeschlagen.';
    $lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strindexdropped'] = 'Index gel&ouml;scht.';
    $lang['strindexdroppedbad'] = 'L&ouml;schen des Index fehlgeschlagen.';
    $lang['strkeyname'] = 'Schl&uuml;sselname';
    $lang['struniquekey'] = 'Eindeutiger Schl&uuml;ssel';
    $lang['strprimarykey'] = 'Prim&auml;rerschl&uuml;ssel';
    $lang['strindextype'] = 'Typ des Index';
    $lang['strtablecolumnlist'] = 'Spalten in der Tabelle';
    $lang['strindexcolumnlist']  =  'Spalten im Index';
    $lang['strconfcluster'] = 'Sind Sie sicher, dass Sie &quot;%s&quot; clustern wollen?';
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
    $lang['strruleneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Regel einen Namen angeben.';
    $lang['strrulecreated'] = 'Regel erstellt.';
    $lang['strrulecreatedbad'] = 'Erstellen der Regel fehlgeschlagen.';
    $lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strruledropped'] = 'Regel gel&ouml;scht.';
    $lang['strruledroppedbad'] = 'L&ouml;schen der Regel fehlgeschlagen.';

    // Constraints
    $lang['strconstraint']  =  'Constraint';
    $lang['strconstraints'] = 'Constraints';
    $lang['strshowallconstraints'] = 'Zeige alle Constraints';
    $lang['strnoconstraints'] = 'Keine Constraints gefunden.';
    $lang['strcreateconstraint'] = 'Constraint erstellen';
    $lang['strconstraintcreated'] = 'Constraint erstellt.';
    $lang['strconstraintcreatedbad'] = 'Erstellen des Constraints fehlgeschlagen.';
    $lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strconstraintdropped'] = 'Constraint gel&ouml;scht.';
    $lang['strconstraintdroppedbad'] = 'L&ouml;schen des Constraints fehlgeschlagen.';
    $lang['straddcheck'] = 'Check Constraint hinzuf&uuml;gen';
    $lang['strcheckneedsdefinition'] = 'Check Constraint braucht eine Definition.';
    $lang['strcheckadded'] = 'Check Constraint hinzugef&uuml;gt.';
    $lang['strcheckaddedbad'] = 'Hinzuf&uuml;gen des Check Constraints fehlgeschlagen.';
    $lang['straddpk'] = 'Prim&auml;rschl&uuml;ssel hinzuf&uuml;gen';
    $lang['strpkneedscols'] = 'Ein Prim&auml;rschl&uuml;ssel ben&ouml;tigt mindestens eine Spalte.';
    $lang['strpkadded'] = 'Prim&auml;rschl&uuml;ssel hinzugef&uuml;gt.';
    $lang['strpkaddedbad'] = 'Hinzuf&uuml;gen des Prim&auml;rschl&uuml;ssels fehlgeschlagen.';
    $lang['stradduniq'] = 'Eindeutigen Schl&uuml;ssel  hinzuf&uuml;gen';
    $lang['struniqneedscols'] = 'Ein eindeutiger Schl&uuml;ssel ben&ouml;tigt mindestens eine Spalte.';
    $lang['struniqadded'] = 'Eindeutiger Schl&uuml;ssel hinzugef&uuml;gt.';
    $lang['struniqaddedbad'] = 'Hinzuf&uuml;gen eines eindeutigen Schl&uuml;ssels fehlgeschlagen.';
    $lang['straddfk'] = 'Fremdschl&uuml;ssel hinzuf&uuml;gen';
    $lang['strfkneedscols'] = 'Ein Fremdschl&uuml;ssel ben&ouml;tigt mindestens eine Spalte.';
    $lang['strfkneedstarget'] = 'Ein Fremdschl&uuml;ssel ben&ouml;tigt eine Zieltabelle.';
    $lang['strfkadded']  =  'Fremdschl&uuml;ssel hinzugef&uuml;gt.';
    $lang['strfkaddedbad'] = 'Hinzuf&uuml;gen eines Fremdschl&uuml;ssels fehlgeschlagen.';
    $lang['strfktarget'] = 'Zieltabelle';
    $lang['strfkcolumnlist'] = 'Spalten im Schl&uuml;ssel';
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
    $lang['strfunctionneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Funktion einen Namen angeben.';
    $lang['strfunctionneedsdef'] = 'Sie m&uuml;ssen f&uuml;r die Funktion eine Definition angeben.';
    $lang['strfunctioncreated'] = 'Funktion erstellt.';
    $lang['strfunctioncreatedbad'] = 'Erstellen der Funktion fehlgeschlagen.';
    $lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strfunctiondropped'] = 'Funktion gel&ouml;scht.';
    $lang['strfunctiondroppedbad'] = 'L&ouml;schen der Funktion fehlgeschlagen.';
    $lang['strfunctionupdated'] = 'Funktion ge&auml;ndert.';
    $lang['strfunctionupdatedbad'] = '&Auml;ndern der Funktion fehlgeschlagen.';
    $lang['strobjectfile']  =  'Objektdatei';
    $lang['strlinksymbol']  =  'Bindesymbol';

    // Triggers
    $lang['strtrigger'] = 'Trigger';
    $lang['strtriggers'] = 'Trigger';
    $lang['strshowalltriggers'] = 'Zeige alle Trigger';
    $lang['strnotrigger'] = 'Kein Trigger gefunden.';
    $lang['strnotriggers'] = 'Keine Trigger gefunden.';
    $lang['strcreatetrigger'] = 'Trigger erstellen';
    $lang['strtriggerneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Trigger einen Namen angeben.';
    $lang['strtriggerneedsfunc'] = 'Sie m&uuml;ssen f&uuml;r den Trigger eine Funktion angeben.';
    $lang['strtriggercreated'] = 'Trigger erstellt.';
    $lang['strtriggercreatedbad'] = 'Erstellen des Triggers fehlgeschlagen.';
    $lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strtriggerdropped'] = 'Trigger gel&ouml;scht.';
    $lang['strtriggerdroppedbad'] = 'L&ouml;schen des Triggers fehlgeschlagen.';
    $lang['strtriggeraltered'] = 'Trigger ge&auml;ndert.';
    $lang['strtriggeralteredbad'] = '&Auml;ndern des Triggers fehlgeschlagen.';
    $lang['strforeach']  =  'F&uuml;r alle';

    // Types
    $lang['strtype'] = 'Datentyp';
    $lang['strtypes'] = 'Datentypen';
    $lang['strshowalltypes'] = 'Zeige alle Datentypen';
    $lang['strnotype'] = 'Kein Datentyp gefunden.';
    $lang['strnotypes'] = 'Keine Datentypen gefunden.';
    $lang['strcreatetype'] = 'Datentyp erstellen';
    $lang['strcreatecomptype']  =  'Zusammengesetzten Typ erstellen';
    $lang['strtypeneedsfield']  =  'Sie m&uuml;ssen wenigstens ein Feld angeben.';
    $lang['strtypeneedscols']  =  'Sie m&uuml;ssen eine g&uuml;ltige Anzahl an Feldern angeben.';	
    $lang['strtypename'] = 'Name des Datentyps';
    $lang['strinputfn'] = 'Eingabefunktion';
    $lang['stroutputfn'] = 'Ausgabefunktion';
    $lang['strpassbyval'] = '&Uuml;bergabe by value?';
    $lang['stralignment'] = 'Alignment';
    $lang['strelement'] = 'Element';
    $lang['strdelimiter'] = 'Trennzeichen';
    $lang['strstorage'] = 'Speicherung';
    $lang['strfield']  =  'Feld';
    $lang['strnumfields']  =  'Anzahl Felder';
    $lang['strtypeneedsname'] = 'Sie m&uuml;ssen einen Namen f&uuml;r den Datentyp angeben.';
    $lang['strtypeneedslen'] = 'Sie m&uuml;ssen eine L&auml;nge f&uuml;r den Datentyp angeben.';
    $lang['strtypecreated'] = 'Datentyp erstellt.';
    $lang['strtypecreatedbad'] = 'Erstellen des Datentypen fehlgeschlagen.';
    $lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentyp &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strtypedropped'] = 'Datentyp gel&ouml;scht.';
    $lang['strtypedroppedbad'] = 'L&ouml;schen des Datentyps fehlgeschlagen.';
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
    $lang['strschemaneedsname'] = 'Sie m&uuml;ssen f&uuml;r das Schema einen Namen angeben.';
    $lang['strschemacreated'] = 'Schema erstellt';
    $lang['strschemacreatedbad'] = 'Erstellen des Schemas fehlgeschlagen.';
    $lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema &quot;%s&quot; l&ouml;schen m&ouml;chten?';
    $lang['strschemadropped'] = 'Schema gel&ouml;scht.';
    $lang['strschemadroppedbad'] = 'L&ouml;schen des Schemas fehlgeschlagen';
    $lang['strschemaaltered']  =  'Schema ge&auml;ndert.';
    $lang['strschemaalteredbad']  =  '&Auml;nderung des Schemas fehlgeschlagen.';
    $lang['strsearchpath']  =  'Schemasuchpfad';

	// Reports
    $lang['strreport']  =  'Bericht';
    $lang['strreports'] = 'Berichte';
    $lang['strshowallreports'] = 'Zeige alle Berichte';
    $lang['strnoreports'] = 'Keine Berichte gefunden.';
    $lang['strcreatereport'] = 'Bericht erstellen';
    $lang['strreportdropped'] = 'Bericht gel&ouml;scht.';
    $lang['strreportdroppedbad'] = 'L&ouml;schen des Berichtes fehlgeschlagen.';
    $lang['strconfdropreport']  =  'Sind Sie sicher, dass Sie den Bericht &quot;%s&quot; l&ouml;schen wollen?';
    $lang['strreportneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Bericht einen Namen angeben.';
    $lang['strreportneedsdef'] = 'Sie m&uuml;ssen SQL-Code f&uuml;r den Bericht eingeben.';
    $lang['strreportcreated'] = 'Bericht gespeichert.';
    $lang['strreportcreatedbad'] = 'Speichern des Berichtes fehlgeschlagen.';

    // Domains
    $lang['strdomain'] = 'Domain';
    $lang['strdomains'] = 'Domains';
    $lang['strshowalldomains'] = 'Alle Domains zeigen';
    $lang['strnodomains'] = 'Keine Domains gefunden.';
    $lang['strcreatedomain'] = 'Domain erstellen';
    $lang['strdomaindropped'] = 'Domain gel&ouml;scht.';
    $lang['strdomaindroppedbad'] = 'L&ouml;schen der Domain fehlgeschlagen.';
    $lang['strconfdropdomain'] = 'Sind Sie sicher, dass Sie die Domain &quot;%s&quot; l&ouml;schen wollen?';
    $lang['strdomainneedsname'] = 'Sie m&uuml;ssen einen Namen f&uuml;r die Domain angeben.';
    $lang['strdomaincreated'] = 'Domain erstellt.';
    $lang['strdomaincreatedbad'] = 'Erstellen der Domain fehlgeschlagen.';
    $lang['strdomainaltered'] = 'Domain ge&auml;ndert.';
    $lang['strdomainalteredbad'] = '&Auml;ndern der Domain fehlgeschlagen.';

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
    $lang['strgreaterthan'] = 'Gr&ouml;&szlig;er als';
    $lang['stroperatorneedsname']  =  'Sie m&uuml;ssen einen Namen f&uuml;r den Operator angeben.';
    $lang['stroperatorcreated']  =  'Operator erstellt';
    $lang['stroperatorcreatedbad']  =  'Erstellen des Operators fehlgeschlagen.';
    $lang['strconfdropoperator']  =  'Sind Sie sicher, dass Sie den Operator &quot;%s&quot; l&ouml;schen wollen?';
    $lang['stroperatordropped']  =  'Operator gel&ouml;scht.';
    $lang['stroperatordroppedbad']  =  'L&ouml;schen des Operators fehlgeschlagen.';

	// Casts
    $lang['strcasts'] = 'Typumwandlungen';
    $lang['strnocasts'] = 'Keine Typumwandlungen gefunden.';
    $lang['strsourcetype'] = 'Quelltyp';
    $lang['strtargettype'] = 'Zieltyp';
    $lang['strimplicit'] = 'Implizit';
    $lang['strinassignment'] = 'W&auml;hrend Zuweisung';
    $lang['strbinarycompat'] = '(bin&auml;rkompatibel)';
	
	// Conversions
    $lang['strconversions'] = 'Konvertierungen';
    $lang['strnoconversions'] = 'Keine Konvertierungen gefunden.';
    $lang['strsourceencoding'] = 'Quellkodierung';
    $lang['strtargetencoding'] = 'Zielkodierung';
	
	// Languages
    $lang['strlanguages'] = 'Sprachen';
    $lang['strnolanguages'] = 'Keine Sprachen gefunden.';
    $lang['strtrusted'] = 'vertrauensw&uuml;rdig';
	
	// Info
    $lang['strnoinfo'] = 'Keine Informationen vorhanden.';
    $lang['strreferringtables'] = 'Tabellen, die sich mit Fremdschl&uuml;sseln auf diese Tabelle beziehen';
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
    $lang['strtablespaceneedsname']  =  'Sie m&uuml;ssen einen Namen f&uuml;r den Tablespace angeben.';
    $lang['strtablespaceneedsloc']  =  'Sie m&uuml;ssen ein Verzeichnis angeben, in dem Sie den Tablespace erstellen m&ouml;chten.';
    $lang['strtablespacecreated']  =  'Tablespace erstellt.';
    $lang['strtablespacecreatedbad']  =  'Erstellen des Tablespace fehlgeschlagen.';
    $lang['strconfdroptablespace']  =  'Sind Sie sicher, dass Sie den Tablespace &quot;%s&quot; l&ouml;schen wollen?';
    $lang['strtablespacedropped']  =  'Tablespace gel&ouml;scht.';
    $lang['strtablespacedroppedbad']  =  'L&ouml;schen des Tablespace fehlgeschlagen.';
    $lang['strtablespacealtered']  =  'Tablespace ge&auml;ndert.';
    $lang['strtablespacealteredbad']  =  '&Auml;ndern des Tablespace fehlgeschlagen.';

	// Slony clusters
$lang['strcluster']  =  'Cluster';
$lang['strnoclusters']  =  'No clusters found.';
$lang['strconfdropcluster']  =  'Are you sure you want to drop cluster &quot;%s&quot;?';
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
$lang['strconfdropnode']  =  'Are you sure you want to drop node &quot;%s&quot;?';
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
$lang['strconfdroppath']  =  'Are you sure you want to drop path &quot;%s&quot;?';
$lang['strpathdropped']  =  'Path dropped.';
$lang['strpathdroppedbad']  =  'Path drop failed.';

	// Slony listens
$lang['strlistens']  =  'Listens';
$lang['strnolistens']  =  'No listens found.';
$lang['strcreatelisten']  =  'Create listen';
$lang['strlistencreated']  =  'Listen created.';
$lang['strlistencreatedbad']  =  'Listen creation failed.';
$lang['strconfdroplisten']  =  'Are you sure you want to drop listen &quot;%s&quot;?';
$lang['strlistendropped']  =  'Listen dropped.';
$lang['strlistendroppedbad']  =  'Listen drop failed.';

	// Slony replication sets
$lang['strrepsets']  =  'Replication sets';
$lang['strnorepsets']  =  'No replication sets found.';
$lang['strcreaterepset']  =  'Create replication set';
$lang['strrepsetcreated']  =  'Replication set created.';
$lang['strrepsetcreatedbad']  =  'Replication set creation failed.';
$lang['strconfdroprepset']  =  'Are you sure you want to drop replication set &quot;%s&quot;?';
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
$lang['strconflockrepset']  =  'Are you sure you want to lock replication set &quot;%s&quot;?';
$lang['strrepsetlocked']  =  'Replication set locked.';
$lang['strrepsetlockedbad']  =  'Replication set lock failed.';
$lang['strconfunlockrepset']  =  'Are you sure you want to unlock replication set &quot;%s&quot;?';
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
$lang['strconfremovetablefromrepset']  =  'Are you sure you want to remove the table &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strtableremovedfromrepset']  =  'Table removed from replication set.';
$lang['strtableremovedfromrepsetbad']  =  'Failed to remove table from replication set.';

	// Slony sequences in replication sets
$lang['straddsequence']  =  'Add sequence';
$lang['strsequenceaddedtorepset']  =  'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad']  =  'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset']  =  'Are you sure you want to remove the sequence &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strsequenceremovedfromrepset']  =  'Sequence removed from replication set.';
$lang['strsequenceremovedfromrepsetbad']  =  'Failed to remove sequence from replication set.';

	// Slony subscriptions
$lang['strsubscriptions']  =  'Subscriptions';
$lang['strnosubscriptions']  =  'No subscriptions found.';

	// Miscellaneous
    $lang['strtopbar'] = '%s l&auml;uft auf %s:%s -- Sie sind als &quot;%s&quot; angemeldet, %s';
    $lang['strtimefmt'] = 'D, j. n. Y, G:i';
    $lang['strhelp'] = 'Hilfe';
    $lang['strhelpicon']  =  '?';
    $lang['strlogintitle']  =  'Auf %s anmelden';
    $lang['strlogoutmsg']  =  'Von %s abgemeldet';
    $lang['strloading']  =  'Lade...';
    $lang['strerrorloading']  =  'Fehler beim Laden';
    $lang['strclicktoreload']  =  'Klicken Sie zum neu laden';

?>
