<?php

    // vim: ts=4 sw=4 et
    /**
    * German Language file for phpPgAdmin.
    * @maintainer M. Bertheau &lt;twanger@bluetwanger.de&gt;
    *
    * $Id: german.php,v 1.19.2.1 2005/03/09 10:14:29 jollytoad Exp $
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
    $lang['strlogout'] = 'Abmelden';
    $lang['strowner'] = 'Besitzer';
    $lang['straction'] = 'Aktion';
    $lang['stractions'] = 'Aktionen';
    $lang['strname'] = 'Name';
    $lang['strdefinition'] = 'Definition';
    $lang['strproperties'] = 'Eigenschaften';
    $lang['strbrowse'] = 'Durchsuchen';
    $lang['strdrop'] = 'L&#246;schen';
    $lang['strdropped'] = 'Gel&#246;scht';
    $lang['strnull'] = 'Null';
    $lang['strnotnull'] = 'Nicht Null';
    $lang['strprev'] = 'zur&#252;ck';
    $lang['strnext'] = 'weiter';
    $lang['strfirst'] = '&lt;&lt; Anfang';
    $lang['strlast'] = 'Ende &gt;&gt;';
    $lang['strfailed']  =  'Fehlgeschlagen';
    $lang['strcreate']  =  'Erstellen';
    $lang['strcreated'] = 'Erstellt';
    $lang['strcomment'] = 'Kommentar';
    $lang['strlength'] = 'L&#228;nge';
    $lang['strdefault'] = 'Vorgabe';
    $lang['stralter'] = '&#196;ndern';
    $lang['strok'] = 'OK';
    $lang['strcancel'] = 'Abbrechen';
    $lang['strsave'] = 'Speichern';
    $lang['strreset'] = 'Zur&#252;cksetzen';
    $lang['strinsert'] = 'Einf&#252;gen';
    $lang['strselect'] = 'Abfrage';
    $lang['strdelete'] = 'L&#246;schen';
    $lang['strupdate'] = '&#196;ndern';
    $lang['strreferences'] = 'Referenzen';
    $lang['stryes'] = 'Ja';
    $lang['strno'] = 'Nein';
    $lang['strtrue'] = 'Wahr';
    $lang['strfalse'] = 'Falsch';
    $lang['stredit']  =  'Bearbeiten';
    $lang['strcolumn']  =  'Spalte';
    $lang['strcolumns']  =  'Spalten';
    $lang['strrows'] = 'Datens&#228;tze';
    $lang['strrowsaff']  =  'Datens&#228;tze betroffen.';
    $lang['strobjects'] = 'Objekt(e)';
    $lang['strexample'] = 'z.B.';
    $lang['strback'] = 'Zur&#252;ck';
    $lang['strqueryresults'] = 'Abfrageergebnis';
    $lang['strshow'] = 'Anzeigen';
    $lang['strempty'] = 'Leeren';
    $lang['strlanguage'] = 'Sprache';
    $lang['strencoding'] = 'Codierung';
    $lang['strvalue'] = 'Wert';
    $lang['strunique'] = 'eindeutig';
    $lang['strprimary'] = 'Prim&#228;r';
    $lang['strexport'] = 'Exportieren';
    $lang['strimport']  =  'Importieren';
    $lang['strsql'] = 'SQL';
    $lang['strgo'] = 'Los';
    $lang['stradmin'] = 'Admin';
    $lang['strvacuum'] = 'Vacuum';
    $lang['stranalyze'] = 'Analysieren';
    $lang['strcluster'] = 'Cluster';
    $lang['strclustered']  =  'Geclustert?';
    $lang['strreindex'] = 'Reindizierung';
    $lang['strrun'] = 'Los';
    $lang['stradd'] = 'Hinzuf&#252;gen';
    $lang['strevent'] = 'Ereignis';
    $lang['strwhere'] = 'wo';
    $lang['strinstead'] = 'DO INSTEAD';
    $lang['strwhen'] = 'Wann';
    $lang['strformat'] = 'Format';

    // Error handling
    $lang['strdata'] = 'Daten';
    $lang['strconfirm'] = 'Best&#228;tigen';
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

	// Error handling
    $lang['strnoframes'] = 'F&#252;r dieses Programm wird ein ein Frame-f&#228;higer Browser ben&#246;tigt.';
    $lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie m&#252;ssen sie aus der config.inc.php-dist neu erzeugen.';
    $lang['strnotloaded'] = 'Ihre PHP-Installation besitzt keine passende Datenbankunterst&#252;tzung.';
    $lang['strphpversionnotsupported']  =  'PHP-Version wird nicht unterst&#252;tzt. Bitte erneuert sie PHP auf die Version %s oder eine neuere Version.';
    $lang['strpostgresqlversionnotsupported']  =  'PostgreSQL-Version wird nicht unterst&#252;tzt. Bitte erneuert sie PostgreSQL auf Version %s oder eine neuere Version.';
    $lang['strbadschema'] = 'Unzul&#228;ssiges Schema angegeben.';
    $lang['strbadencoding'] = 'Abbruch beim Setzen der Clientcodierung in der Datenbank.';
    $lang['strsqlerror'] = 'SQL Fehler:';
    $lang['strinstatement'] = 'In der Anweisung:';
    $lang['strinvalidparam'] = 'Unzul&#228;ssige Skriptparameter.';
    $lang['strnodata'] = 'Keine Datens&#228;tze gefunden.';
    $lang['strnoobjects']  =  'Keine Objekte gefunden.';
    $lang['strrownotunique'] = 'F&#252;r diesen Datensatz ist kein eindeutiges Merkmal vorhanden.';
    $lang['strnoreportsdb']  =  'Sie haben die Berichtsdatenbank nicht angelegt. In der Datei INSTALL befinden sich Anweisungen dazu.';
    $lang['strnouploads']  =  'Das Hochladen von Dateien ist ausgeschaltet.';
    $lang['strimporterror']  =  'Importfehler.';
    $lang['strimporterrorline']  =  'Importfehler auf Zeile %s.';

    // Tables
    $lang['strtable'] = 'Tabelle';
    $lang['strtables'] = 'Tabellen';
    $lang['strshowalltables'] = 'Zeige alle Tabellen';
    $lang['strnotables'] = 'Keine Tabellen gefunden.';
    $lang['strnotable'] = 'Keine Tabelle gefunden.';
    $lang['strcreatetable'] = 'Neue Tabelle erstellen';
    $lang['strtablename'] = 'Tabellenname';
    $lang['strtableneedsname'] = 'Sie m&#252;ssen f&#252;r die Tabelle einen Namen angeben.';
    $lang['strtableneedsfield'] = 'Sie m&#252;ssen mindestens ein Feld angeben.';
    $lang['strtableneedscols'] = 'Sie m&#252;ssen eine zul&#228;ssige Anzahl an Spalten angeben.';
    $lang['strtablecreated'] = 'Tabelle erstellt.';
    $lang['strtablecreatedbad'] = 'Erstellen der Tabelle fehlgeschlagen.';
    $lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strtabledropped'] = 'Tabelle gel&#246;scht.';
    $lang['strtabledroppedbad'] = 'L&#246;schen der Tabelle fehlgeschlagen.';
    $lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Inhalt der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strtableemptied'] = 'Tabelleninhalt gel&#246;scht.';
    $lang['strtableemptiedbad'] = 'L&#246;schen des Tabelleninhaltes fehlgeschlagen.';
    $lang['strinsertrow'] = 'Datensatz einf&#252;gen';
    $lang['strrowinserted'] = 'Datensatz eingef&#252;gt.';
    $lang['strrowinsertedbad'] = 'Einf&#252;gen des Datensatzes fehlgeschlagen.';
    $lang['streditrow'] = 'Datensatz bearbeiten';
    $lang['strrowupdated'] = 'Datensatz ge&#228;ndert.';
    $lang['strrowupdatedbad'] = '&#196;ndern des Datensatzes fehlgeschlagen.';
    $lang['strdeleterow'] = 'Datensatz l&#246;schen';
    $lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diesen Datensatz l&#246;schen m&#246;chten?';
    $lang['strrowdeleted'] = 'Datensatz gel&#246;scht.';
    $lang['strrowdeletedbad'] = 'L&#246;schen des Datensatzes fehlgeschlagen.';
    $lang['strinsertandrepeat']  =  'Einf&#252;gen und Wiederholen';
    $lang['strnumcols']  =  'Anzahl Spalten';
    $lang['strcolneedsname']  =  'Sie m&#252;ssen einen Namen f&#252;r die Spalte angeben.';
    $lang['strselectallfields']  =  'Alle Felder ausw&#228;hlen';
    $lang['strselectneedscol'] = 'Sie m&#252;ssen mindestens eine Spalte anzeigen lassen';
    $lang['strselectunary'] = 'Un&#228;re Operatoren k&#246;nnen keine Werte haben.';
    $lang['straltercolumn'] = 'Spalte &#228;ndern';
    $lang['strcolumnaltered'] = 'Spalte ge&#228;ndert.';
    $lang['strcolumnalteredbad'] = '&#196;ndern der Spalte fehlgeschlagen.';
    $lang['strconfdropcolumn'] = 'Sind Sie sicher, dass Sie die Spalte &quot;%s&quot; aus der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strcolumndropped'] = 'Spalte gel&#246;scht.';
    $lang['strcolumndroppedbad'] = 'L&#246;schen der Spalte fehlgschlagen.';
    $lang['straddcolumn'] = 'Spalte hinzuf&#252;gen';
    $lang['strcolumnadded'] = 'Spalte hinzugef&#252;gt.';
    $lang['strcolumnaddedbad'] = 'Hinzuf&#252;gen der Spalte fehlgeschlagen.';
    $lang['strcascade'] = 'CASCADE';
    $lang['strtablealtered'] = 'Tabelle ge&#228;ndert.';
    $lang['strtablealteredbad'] = '&#196;ndern der Tabelle fehlgeschlagen.';
    $lang['strdataonly']  =  'Nur Daten';
    $lang['strstructureonly']  =  'Nur die Struktur';
    $lang['strstructureanddata']  =  'Struktur und Daten';
    $lang['strtabbed']  =  'mit Tabluatoren';
    $lang['strauto']  =  'Automatisch';
    $lang['strconfvacuumtable']  =  'Sind sie sicher, dass Sie VACUUM auf &quot;%s&quot; ausf&#252;hren wollen?';
    $lang['strestimatedrowcount']  =  'Gesch&#228;tzte Anzahl Datens&#228;tze';

	// Users
    $lang['struser'] = 'Benutzer';
    $lang['strusers'] = 'Benutzer';
    $lang['strusername'] = 'Benutzername';
    $lang['strpassword'] = 'Passwort';
    $lang['strsuper'] = 'Superuser?';
    $lang['strcreatedb'] = 'Datenbank erstellen?';
    $lang['strexpires'] = 'G&#252;ltig bis';
    $lang['strsessiondefaults']  =  'Sitzungsstandards';
    $lang['strnousers'] = 'Keine Benutzer gefunden.';
    $lang['struserupdated'] = 'Benutzer &#228;ndern.';
    $lang['struserupdatedbad'] = '&#196;ndern des Benutzers fehlgeschlagen.';
    $lang['strshowallusers'] = 'Zeige alle Benutzer';
    $lang['strcreateuser'] = 'Lege Benutzer an';
    $lang['struserneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Benutzer angeben.';
    $lang['strusercreated'] = 'Benutzer angelegt.';
    $lang['strusercreatedbad'] = 'Anlegen des Benutzers fehlgeschlagen.';
    $lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['struserdropped'] = 'Benutzer gel&#246;scht.';
    $lang['struserdroppedbad'] = 'L&#246;schen des Benutzers fehlgeschlagen.';

    // Groups
    $lang['straccount'] = 'Konto';
    $lang['strchangepassword'] = 'Passwort &#228;ndern';
    $lang['strpasswordchanged'] = 'Passwort ge&#228;ndert.';
    $lang['strpasswordchangedbad'] = '&#196;ndern des Passwortes fehlgeschlagen.';
    $lang['strpasswordshort'] = 'Das Passwort ist zu kurz.';
    $lang['strpasswordconfirm'] = 'Die beiden Passw&#246;rter stimmen nicht &#252;berein.';
	
	// Groups
    $lang['strgroup']  =  'Gruppe';
    $lang['strgroups'] = 'Gruppen';
    $lang['strnogroup'] = 'Gruppe nicht gefunden.';
    $lang['strnogroups'] = 'Keine Gruppen gefunden.';
    $lang['strcreategroup'] = 'Gruppe erstellen';
    $lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
    $lang['strgroupneedsname'] = 'Sie m&#252;ssen f&#252;r die Gruppe einen Namen angeben.';
    $lang['strgroupcreated'] = 'Gruppe angelegt.';
    $lang['strgroupcreatedbad'] = 'Anlegen der Gruppe fehlgeschlagen.';
    $lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strgroupdropped'] = 'Gruppe gel&#246;scht.';
    $lang['strgroupdroppedbad'] = 'L&#246;schen der Gruppe fehlgeschlagen.';
    $lang['strmembers'] = 'Mitglieder';
    $lang['straddmember'] = 'Mitglied hinzuf&#252;gen';
    $lang['strmemberadded'] = 'Mitglied hinzugef&#252;gt.';
    $lang['strmemberaddedbad'] = 'Hinzuf&#252;gen des Mitglieds fehlgeschlagen.';
    $lang['strdropmember'] = 'Mitglied l&#246;schen';
    $lang['strconfdropmember'] = 'Sind Sie sicher, dass Sie das Mitglied &quot;%s&quot; aus der Gruppe &quot;%s&quot; l&#246;schen wollen?';
    $lang['strmemberdropped'] = 'Mitglied gel&#246;scht.';
    $lang['strmemberdroppedbad'] = 'L&#246;schen des Mitglieds fehlgeschlagen.';

    // Privilges
    $lang['strprivilege'] = 'Privileg';
    $lang['strprivileges'] = 'Privilegien';
    $lang['strnoprivileges'] = 'Dieses Objekt hat die Standard-Eigent&#252;merrechte.';
    $lang['strgrant'] = 'Privilegien vergeben';
    $lang['strrevoke'] = 'Privilegien entziehen';
    $lang['strgranted'] = 'Privilegien vergeben / entzogen.';
    $lang['strgrantfailed'] = 'Vergeben von Privilegien fehlgeschlagen.';
    $lang['strgrantbad'] = 'Sie m&#252;ssen wenigstens einen Benutzer oder eine Gruppe und wenigstens ein Privileg.';
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
    $lang['strdatabaseneedsname'] = 'Sie m&#252;ssen f&#252;r die Datenbank einen Namen angeben.';
    $lang['strdatabasecreated'] = 'Datenbank erstellt.';
    $lang['strdatabasecreatedbad'] = 'Erstellen der Datenbank fehlgeschlagen.';
    $lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strdatabasedropped'] = 'Datenbank gel&#246;scht.';
    $lang['strdatabasedroppedbad'] = 'L&#246;schen der Datenbank fehlgeschlagen.';
    $lang['strentersql'] = 'Auszuf&#252;hrenden SQL-Code eingeben:';
    $lang['strsqlexecuted'] = 'SQL-Code ausgef&#252;hrt.';
    $lang['strvacuumgood'] = 'Vacuum abgeschlossen.';
    $lang['strvacuumbad'] = 'Vacuum fehlgeschlagen.';
    $lang['stranalyzegood'] = 'Analysieren abgeschlossen.';
    $lang['stranalyzebad'] = 'Analysieren fehlgeschlagen.';
    $lang['strreindexgood']  =  'Reindex abgeschlossen.';
    $lang['strreindexbad']  =  'Reindex fehlgeschlagen.';
    $lang['strfull']  =  'Vollst&#228;ndig';
    $lang['strfreeze']  =  'Einfrieren';
    $lang['strforce']  =  'Erzwingen';
    $lang['strsignalsent']  =  'Signal gesendet.';
    $lang['strsignalsentbad']  =  'Senden des Signales fehlgeschlagen.';
    $lang['strallobjects']  =  'Alle Objekte';

    // Views
    $lang['strview'] = 'Sicht';
    $lang['strviews'] = 'Sichten';
    $lang['strshowallviews'] = 'Zeige alle Sichten';
    $lang['strnoview'] = 'Kein Sicht gefunden.';
    $lang['strnoviews'] = 'Keine Sichten gefunden.';
    $lang['strcreateview'] = 'Sicht erstellen';
    $lang['strviewname'] = 'Name der Sicht';
    $lang['strviewneedsname'] = 'Sie m&#252;ssen f&#252;r die Sicht einen Namen angeben.';
    $lang['strviewneedsdef'] = 'Sie m&#252;ssen f&#252;r die Sicht eine Definition angeben.';
    $lang['strviewneedsfields']  =  'Sie m&#252;ssen die Spalten angeben, die sie in der Sicht haben wollen.';
    $lang['strviewcreated'] = 'Sicht erstellt.';
    $lang['strviewcreatedbad'] = 'Erstellen der Sicht fehlgeschlagen.';
    $lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strviewdropped'] = 'Sicht gel&#246;scht.';
    $lang['strviewdroppedbad'] = 'L&#246;schen der Sicht fehlgeschlagen.';
    $lang['strviewupdated'] = 'Sicht ge&#228;ndert.';
    $lang['strviewupdatedbad'] = '&#196;ndern der Sicht fehlgeschlagen.';
    $lang['strviewlink']  =  'Verbindende Schl&#252;ssel';
    $lang['strviewconditions']  =  'Zus&#228;tzliche Bedingungen';
    $lang['strcreateviewwiz']  =  'Sicht mit dem Assistenten erstellen';

    // Sequences
    $lang['strsequence'] = 'Sequenz';
    $lang['strsequences'] = 'Sequenzen';
    $lang['strshowallsequences'] = 'Zeige alle Sequenzen';
    $lang['strnosequence'] = 'Keine Sequenz gefunden.';
    $lang['strnosequences'] = 'Keine Sequenzen gefunden.';
    $lang['strcreatesequence'] = 'Erstelle Sequenz';
    $lang['strlastvalue'] = 'Letzer Wert';
    $lang['strincrementby'] = 'Erh&#246;hen um';
    $lang['strstartvalue'] = 'Startwert';
    $lang['strmaxvalue'] = 'Maximalwert';
    $lang['strminvalue'] = 'Minimalwert';
    $lang['strcachevalue'] = 'Cachewert';
    $lang['strlogcount'] = 'Log Anzahl';
    $lang['striscycled'] = 'Zyklisch?';
    $lang['striscalled'] = 'Aufgerufen?';
    $lang['strsequenceneedsname'] = 'Sie m&#252;ssen f&#252;r die Sequenz einen Namen angeben.';
    $lang['strsequencecreated'] = 'Sequenz erstellt.';
    $lang['strsequencecreatedbad'] = 'Erstellen der Sequenz fehlgeschlagen.';
    $lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strsequencedropped'] = 'Sequenz gel&#246;scht.';
    $lang['strsequencedroppedbad'] = 'L&#246;schen der Sequenz fehlgeschlagen.';
    $lang['strsequencereset'] = 'Sequenz zur&#252;ckgesetzt..';
    $lang['strsequenceresetbad'] = 'R&#252;cksetzen der Sequenz fehlgeschlagen.';

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
    $lang['strindexneedsname'] = 'Sie m&#252;ssen f&#252;r den Index einen Namen angeben.';
    $lang['strindexneedscols'] = 'Sie m&#252;ssen eine zul&#228;ssige Anzahl an Spalten angeben.';
    $lang['strindexcreated'] = 'Index erstellt';
    $lang['strindexcreatedbad'] = 'Erstellen des Index fehlgeschlagen.';
    $lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strindexdropped'] = 'Index gel&#246;scht.';
    $lang['strindexdroppedbad'] = 'L&#246;schen des Index fehlgeschlagen.';
    $lang['strkeyname'] = 'Schl&#252;sselname';
    $lang['struniquekey'] = 'Eindeutiger Schl&#252;ssel';
    $lang['strprimarykey'] = 'Prim&#228;rerschl&#252;ssel';
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
    $lang['strruleneedsname'] = 'Sie m&#252;ssen f&#252;r die Regel einen Namen angeben.';
    $lang['strrulecreated'] = 'Regel erstellt.';
    $lang['strrulecreatedbad'] = 'Erstellen der Regel fehlgeschlagen.';
    $lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel &quot;%s&quot; in der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strruledropped'] = 'Regel gel&#246;scht.';
    $lang['strruledroppedbad'] = 'L&#246;schen der Regel fehlgeschlagen.';

    // Constraints
    $lang['strconstraint']  =  'Constraint';
    $lang['strconstraints'] = 'Constraints';
    $lang['strshowallconstraints'] = 'Zeige alle Constraints';
    $lang['strnoconstraints'] = 'Keine Constraints gefunden.';
    $lang['strcreateconstraint'] = 'Constraint erstellen';
    $lang['strconstraintcreated'] = 'Constraint erstellt.';
    $lang['strconstraintcreatedbad'] = 'Erstellen des Constraints fehlgeschlagen.';
    $lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint &quot;%s&quot; in der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strconstraintdropped'] = 'Constraint gel&#246;scht.';
    $lang['strconstraintdroppedbad'] = 'L&#246;schen des Constraints fehlgeschlagen.';
    $lang['straddcheck'] = 'Check Constraint hinzuf&#252;gen';
    $lang['strcheckneedsdefinition'] = 'Check Constraint braucht eine Definition.';
    $lang['strcheckadded'] = 'Check Constraint hinzugef&#252;gt.';
    $lang['strcheckaddedbad'] = 'Hinzuf&#252;gen des Check Constraints fehlgeschlagen.';
    $lang['straddpk'] = 'Prim&#228;rschl&#252;ssel hinzuf&#252;gen';
    $lang['strpkneedscols'] = 'Ein Prim&#228;rschl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
    $lang['strpkadded'] = 'Prim&#228;rschl&#252;ssel hinzugef&#252;gt.';
    $lang['strpkaddedbad'] = 'Hinzuf&#252;gen des Prim&#228;rschl&#252;ssels fehlgeschlagen.';
    $lang['stradduniq'] = 'Eindeutigen Schl&#252;ssel  hinzuf&#252;gen';
    $lang['struniqneedscols'] = 'Ein eindeutiger Schl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
    $lang['struniqadded'] = 'Eindeutiger Schl&#252;ssel hinzugef&#252;gt.';
    $lang['struniqaddedbad'] = 'Hinzuf&#252;gen eines eindeutigen Schl&#252;ssels fehlgeschlagen.';
    $lang['straddfk'] = 'Fremdschl&#252;ssel hinzuf&#252;gen';
    $lang['strfkneedscols'] = 'Ein Fremdschl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
    $lang['strfkneedstarget'] = 'Ein Fremdschl&#252;ssel ben&#246;tigt eine Zieltabelle.';
    $lang['strfkadded']  =  'Fremdschl&#252;ssel hinzugef&#252;gt.';
    $lang['strfkaddedbad'] = 'Hinzuf&#252;gen eines Fremdschl&#252;ssels fehlgeschlagen.';
    $lang['strfktarget'] = 'Zieltabelle';
    $lang['strfkcolumnlist'] = 'Spalten im Schl&#252;ssel';
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
    $lang['strfunctionneedsname'] = 'Sie m&#252;ssen f&#252;r die Funktion einen Namen angeben.';
    $lang['strfunctionneedsdef'] = 'Sie m&#252;ssen f&#252;r die Funktion eine Definition angeben.';
    $lang['strfunctioncreated'] = 'Funktion erstellt.';
    $lang['strfunctioncreatedbad'] = 'Erstellen der Funktion fehlgeschlagen.';
    $lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strfunctiondropped'] = 'Funktion gel&#246;scht.';
    $lang['strfunctiondroppedbad'] = 'L&#246;schen der Funktion fehlgeschlagen.';
    $lang['strfunctionupdated'] = 'Funktion ge&#228;ndert.';
    $lang['strfunctionupdatedbad'] = '&#196;ndern der Funktion fehlgeschlagen.';
    $lang['strobjectfile']  =  'Objektdatei';
    $lang['strlinksymbol']  =  'Bindesymbol';

    // Triggers
    $lang['strtrigger'] = 'Trigger';
    $lang['strtriggers'] = 'Trigger';
    $lang['strshowalltriggers'] = 'Zeige alle Trigger';
    $lang['strnotrigger'] = 'Kein Trigger gefunden.';
    $lang['strnotriggers'] = 'Keine Trigger gefunden.';
    $lang['strcreatetrigger'] = 'Trigger erstellen';
    $lang['strtriggerneedsname'] = 'Sie m&#252;ssen f&#252;r den Trigger einen Namen angeben.';
    $lang['strtriggerneedsfunc'] = 'Sie m&#252;ssen f&#252;r den Trigger eine Funktion angeben.';
    $lang['strtriggercreated'] = 'Trigger erstellt.';
    $lang['strtriggercreatedbad'] = 'Erstellen des Triggers fehlgeschlagen.';
    $lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; in der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strtriggerdropped'] = 'Trigger gel&#246;scht.';
    $lang['strtriggerdroppedbad'] = 'L&#246;schen des Triggers fehlgeschlagen.';
    $lang['strtriggeraltered'] = 'Trigger ge&#228;ndert.';
    $lang['strtriggeralteredbad'] = '&#196;ndern des Triggers fehlgeschlagen.';

    // Types
    $lang['strtype'] = 'Datentyp';
    $lang['strtypes'] = 'Datentypen';
    $lang['strshowalltypes'] = 'Zeige alle Datentypen';
    $lang['strnotype'] = 'Kein Datentyp gefunden.';
    $lang['strnotypes'] = 'Keine Datentypen gefunden.';
    $lang['strcreatetype'] = 'Datentyp erstellen';
    $lang['strcreatecomptype']  =  'Zusammengesetzten Typ erstellen';
    $lang['strtypeneedsfield']  =  'Sie m&#252;ssen wenigstens ein Feld angeben.';
    $lang['strtypeneedscols']  =  'Sie m&#252;ssen eine g&#252;ltige Anzahl an Feldern angeben.';	
    $lang['strtypename'] = 'Name des Datentyps';
    $lang['strinputfn'] = 'Eingabefunktion';
    $lang['stroutputfn'] = 'Ausgabefunktion';
    $lang['strpassbyval'] = '&#220;bergabe by value?';
    $lang['stralignment'] = 'Alignment';
    $lang['strelement'] = 'Element';
    $lang['strdelimiter'] = 'Trennzeichen';
    $lang['strstorage'] = 'Speicherung';
    $lang['strfield']  =  'Feld';
    $lang['strnumfields']  =  'Anzahl Felder';
    $lang['strtypeneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Datentyp angeben.';
    $lang['strtypeneedslen'] = 'Sie m&#252;ssen eine L&#228;nge f&#252;r den Datentyp angeben.';
    $lang['strtypecreated'] = 'Datentyp erstellt.';
    $lang['strtypecreatedbad'] = 'Erstellen des Datentypen fehlgeschlagen.';
    $lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentyp &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strtypedropped'] = 'Datentyp gel&#246;scht.';
    $lang['strtypedroppedbad'] = 'L&#246;schen des Datentyps fehlgeschlagen.';
    $lang['strflavor']  =  'Art';
$lang['strbasetype']  =  'Base';
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
    $lang['strschemaneedsname'] = 'Sie m&#252;ssen f&#252;r das Schema einen Namen angeben.';
    $lang['strschemacreated'] = 'Schema erstellt';
    $lang['strschemacreatedbad'] = 'Erstellen des Schemas fehlgeschlagen.';
    $lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema &quot;%s&quot; l&#246;schen m&#246;chten?';
    $lang['strschemadropped'] = 'Schema gel&#246;scht.';
    $lang['strschemadroppedbad'] = 'L&#246;schen des Schemas fehlgeschlagen';
    $lang['strschemaaltered']  =  'Schema ge&#228;ndert.';
    $lang['strschemaalteredbad']  =  '&#196;nderung des Schemas fehlgeschlagen.';
    $lang['strsearchpath']  =  'Schemasuchpfad';

	// Reports
    $lang['strreport']  =  'Bericht';
    $lang['strreports'] = 'Berichte';
    $lang['strshowallreports'] = 'Zeige alle Berichte';
    $lang['strnoreports'] = 'Keine Berichte gefunden.';
    $lang['strcreatereport'] = 'Bericht erstellen';
    $lang['strreportdropped'] = 'Bericht gel&#246;scht.';
    $lang['strreportdroppedbad'] = 'L&#246;schen des Berichtes fehlgeschlagen.';
    $lang['strconfdropreport']  =  'Sind Sie sicher, dass Sie den Bericht &quot;%s&quot; l&#246;schen wollen?';
    $lang['strreportneedsname'] = 'Sie m&#252;ssen f&#252;r den Bericht einen Namen angeben.';
    $lang['strreportneedsdef'] = 'Sie m&#252;ssen SQL-Code f&#252;r den Bericht eingeben.';
    $lang['strreportcreated'] = 'Bericht gespeichert.';
    $lang['strreportcreatedbad'] = 'Speichern des Berichtes fehlgeschlagen.';

    // Domains
    $lang['strdomain'] = 'Domain';
    $lang['strdomains'] = 'Domains';
    $lang['strshowalldomains'] = 'Alle Domains zeigen';
    $lang['strnodomains'] = 'Keine Domains gefunden.';
    $lang['strcreatedomain'] = 'Domain erstellen';
    $lang['strdomaindropped'] = 'Domain gel&#246;scht.';
    $lang['strdomaindroppedbad'] = 'L&#246;schen der Domain fehlgeschlagen.';
    $lang['strconfdropdomain'] = 'Sind Sie sicher, dass Sie die Domain &quot;%s&quot; l&#246;schen wollen?';
    $lang['strdomainneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r die Domain angeben.';
    $lang['strdomaincreated'] = 'Domain erstellt.';
    $lang['strdomaincreatedbad'] = 'Erstellen der Domain fehlgeschlagen.';
    $lang['strdomainaltered'] = 'Domain ge&#228;ndert.';
    $lang['strdomainalteredbad'] = '&#196;ndern der Domain fehlgeschlagen.';

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
    $lang['strgreaterthan'] = 'Gr&#246;&#223;er als';
    $lang['stroperatorneedsname']  =  'Sie m&#252;ssen einen Namen f&#252;r den Operator angeben.';
    $lang['stroperatorcreated']  =  'Operator erstellt';
    $lang['stroperatorcreatedbad']  =  'Erstellen des Operators fehlgeschlagen.';
    $lang['strconfdropoperator']  =  'Sind Sie sicher, dass Sie den Operator &quot;%s&quot; l&#246;schen wollen?';
    $lang['stroperatordropped']  =  'Operator gel&#246;scht.';
    $lang['stroperatordroppedbad']  =  'L&#246;schen des Operators fehlgeschlagen.';

	// Casts
    $lang['strcasts'] = 'Typumwandlungen';
    $lang['strnocasts'] = 'Keine Typumwandlungen gefunden.';
    $lang['strsourcetype'] = 'Quelltyp';
    $lang['strtargettype'] = 'Zieltyp';
    $lang['strimplicit'] = 'Implizit';
    $lang['strinassignment'] = 'W&#228;hrend Zuweisung';
    $lang['strbinarycompat'] = '(bin&#228;rkompatibel)';
	
	// Conversions
    $lang['strconversions'] = 'Konvertierungen';
    $lang['strnoconversions'] = 'Keine Konvertierungen gefunden.';
    $lang['strsourceencoding'] = 'Quellkodierung';
    $lang['strtargetencoding'] = 'Zielkodierung';
	
	// Languages
    $lang['strlanguages'] = 'Sprachen';
    $lang['strnolanguages'] = 'Keine Sprachen gefunden.';
    $lang['strtrusted'] = 'vertrauensw&#252;rdig';
	
	// Info
    $lang['strnoinfo'] = 'Keine Informationen vorhanden.';
    $lang['strreferringtables'] = 'Tabellen, die sich mit Fremdschl&#252;sseln auf diese Tabelle beziehen';
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
    $lang['strtablespaceneedsname']  =  'Sie m&#252;ssen einen Namen f&#252;r den Tablespace angeben.';
    $lang['strtablespaceneedsloc']  =  'Sie m&#252;ssen ein Verzeichnis angeben, in dem Sie den Tablespace erstellen m&#246;chten.';
    $lang['strtablespacecreated']  =  'Tablespace erstellt.';
    $lang['strtablespacecreatedbad']  =  'Erstellen des Tablespace fehlgeschlagen.';
    $lang['strconfdroptablespace']  =  'Sind Sie sicher, dass Sie den Tablespace &quot;%s&quot; l&#246;schen wollen?';
    $lang['strtablespacedropped']  =  'Tablespace gel&#246;scht.';
    $lang['strtablespacedroppedbad']  =  'L&#246;schen des Tablespace fehlgeschlagen.';
    $lang['strtablespacealtered']  =  'Tablespace ge&#228;ndert.';
    $lang['strtablespacealteredbad']  =  '&#196;ndern des Tablespace fehlgeschlagen.';

	// Miscellaneous
    $lang['strtopbar'] = '%s l&#228;uft auf %s:%s -- Sie sind als &quot;%s&quot; angemeldet, %s';
    $lang['strtimefmt'] = 'D, j. n. Y, G:i';
    $lang['strhelp'] = 'Hilfe';
    $lang['strhelpicon']  =  '?';

?>
