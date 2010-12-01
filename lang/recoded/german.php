<?php

	/**
	 * German language file for phpPgAdmin.  Use this as a basis
	 *
	 * @maintainer Laurenz Albe &lt;laurenz.albe@wien.gv.at&gt;
	 *
     * $Id: german.php,v 1.30 2008/02/18 23:06:51 ioguix Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Deutsch';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'de_DE';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'Willkommen bei phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmin Homepage';
	$lang['strpgsqlhome'] = 'PostgreSQL Homepage';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Dokumentation (lokal)';
	$lang['strreportbug'] = 'Fehler melden';
	$lang['strviewfaq'] = 'Online-FAQ ansehen';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Anmelden';
	$lang['strloginfailed'] = 'Anmeldung fehlgeschlagen';
	$lang['strlogindisallowed'] = 'Anmeldung aus Sicherheitsgr&#252;nden verweigert.';
	$lang['strserver'] = 'Server';
	$lang['strservers'] = 'Server';
	$lang['strintroduction'] = 'Einf&#252;hrung';
	$lang['strhost'] = 'Host';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'Abmelden';
	$lang['strowner'] = 'Besitzer';
	$lang['straction'] = 'Aktion';
	$lang['stractions'] = 'Aktionen';
	$lang['strname'] = 'Name';
	$lang['strdefinition'] = 'Definition';
	$lang['strproperties'] = 'Eigenschaften';
	$lang['strbrowse'] = 'Durchsuchen';
	$lang['strenable'] = 'Einschalten';
	$lang['strdisable'] = 'Ausschalten';
	$lang['strdrop'] = 'L&#246;schen';
	$lang['strdropped'] = 'Gel&#246;scht';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Nicht Null';
	$lang['strprev'] = '&lt; Zur&#252;ck';
	$lang['strnext'] = 'Weiter &gt;';
	$lang['strfirst'] = '&lt;&lt; Anfang';
	$lang['strlast'] = 'Ende &gt;&gt;';
	$lang['strfailed'] = 'Fehlgeschlagen';
	$lang['strcreate'] = 'Erstellen';
	$lang['strcreated'] = 'Erstellt';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'L&#228;nge';
	$lang['strdefault'] = 'Standardwert';
	$lang['stralter'] = '&#196;ndern';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Abbrechen';
	$lang['strac'] = 'Automatische Vervollst&#228;ndigung einschalten';
	$lang['strsave'] = 'Speichern';
	$lang['strreset'] = 'Zur&#252;cksetzen';
	$lang['strinsert'] = 'Einf&#252;gen';
	$lang['strselect'] = 'Abfrage';
	$lang['strdelete'] = 'L&#246;schen';
	$lang['strupdate'] = '&#196;ndern';
	$lang['strreferences'] = 'Verweise';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nein';
	$lang['strtrue'] = 'WAHR';
	$lang['strfalse'] = 'FALSCH';
	$lang['stredit'] = 'Bearbeiten';
	$lang['strcolumn'] = 'Spalte';
	$lang['strcolumns'] = 'Spalten';
	$lang['strrows'] = 'Datens&#228;tze';
	$lang['strrowsaff'] = 'Datens&#228;tze betroffen.';
	$lang['strobjects'] = 'Objekt(e)';
	$lang['strback'] = 'Zur&#252;ck';
	$lang['strqueryresults'] = 'Abfrageergebnis';
	$lang['strshow'] = 'Anzeigen';
	$lang['strempty'] = 'Leeren';
	$lang['strlanguage'] = 'Sprache';
	$lang['strencoding'] = 'Zeichenkodierung';
	$lang['strvalue'] = 'Wert';
	$lang['strunique'] = 'Eindeutig';
	$lang['strprimary'] = 'Prim&#228;r';
	$lang['strexport'] = 'Exportieren';
	$lang['strimport'] = 'Importieren';
	$lang['strallowednulls'] = 'NULL-Zeichen erlaubt';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Leere Zeichenkette / Leere Spalte';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Bereinigen';
	$lang['stranalyze'] = 'Analysieren';
	$lang['strclusterindex'] = 'Cluster';
	$lang['strclustered'] = 'Geclustert?';
	$lang['strreindex'] = 'Reindexieren';
	$lang['strexecute'] = 'Ausf&#252;hren';
	$lang['stradd'] = 'Hinzuf&#252;gen';
	$lang['strevent'] = 'Ereignis';
	$lang['strwhere'] = 'Bedingung';
	$lang['strinstead'] = 'Tu stattdessen';
	$lang['strwhen'] = 'Wann';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Daten';
	$lang['strconfirm'] = 'Best&#228;tigen';
	$lang['strexpression'] = 'Ausdruck';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Aufklappen';
	$lang['strcollapse'] = 'Zuklappen';
	$lang['strfind'] = 'Suchen';
	$lang['stroptions'] = 'Optionen';
	$lang['strrefresh'] = 'Aktualisieren';
	$lang['strdownload'] = 'Herunterladen';
	$lang['strdownloadgzipped'] = 'gzip-komprimiert herunterladen';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Erweitert';
	$lang['strvariables'] = 'Variable';
	$lang['strprocess'] = 'Prozess';
	$lang['strprocesses'] = 'Prozesse';
	$lang['strsetting'] = 'Einstellung';
	$lang['streditsql'] = 'SQL bearbeiten';
	$lang['strruntime'] = 'Laufzeit gesamt: %s ms';
	$lang['strpaginate'] = 'Ergebnisse seitenweise anzeigen';
	$lang['struploadscript'] = 'oder laden Sie ein SQL-Script hoch:';
	$lang['strstarttime'] = 'Beginnzeitpunkt';
	$lang['strfile'] = 'Datei';
	$lang['strfileimported'] = 'Datei importiert.';
	$lang['strtrycred'] = 'Diese Anmeldedaten f&#252;r alle Server verwenden';
	$lang['strconfdropcred']  = 'Aus Sicherheitsgr&#252;nden werden gemeinsamme Anmeldedaten beim Abmelden gel&#246;scht. Sind Sie sicher, dass sie sich abmelden wollen?';
	$lang['stractionsonmultiplelines'] = 'Mehrzeilige Aktionen';
	$lang['strselectall'] = 'Alle ausw&#228;hlen';
	$lang['strunselectall'] = 'Alle abw&#228;hlen';
	$lang['strlocale'] = 'Spracheinstellung';

	// User-supplied SQL history
	$lang['strhistory'] = 'Befehlsspeicher';
	$lang['strnohistory'] = 'Kein Befehlsspeicher.';
	$lang['strclearhistory'] = 'Befehlsspeicher l&#246;schen';
	$lang['strdelhistory'] = 'Aus dem Befehlsspeicher l&#246;schen';
	$lang['strconfdelhistory'] = 'Diese Abfrage wirklich aus dem Befehlsspeicher l&#246;schen?';
	$lang['strconfclearhistory'] = 'Befehlsspeicher wirklich l&#246;schen?';
	$lang['strnodatabaseselected'] = 'Bitte w&#228;hlen Sie eine Datenbank aus.';

	// Database sizes
	$lang['strsize'] = 'Gr&#246;&#223;e';
	$lang['strbytes'] = 'Bytes';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'Diese Anwendung funktioniert am besten mit einem Browser, der Frames beherrscht, kann aber mit dem untenstehenden Link auch ohne Frames verwendet werden.';
	$lang['strnoframeslink'] = 'Ohne Frames arbeiten';
	$lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie m&#252;ssen sie aus der config.inc.php-dist neu erzeugen.';
	$lang['strnotloaded'] = 'Ihre PHP-Installation unterst&#252;tzt PostgreSQL nicht. Sie m&#252;ssen PHP unter Verwendung der Konfigurationsoption --with-pgsql neu kompilieren.';
	$lang['strpostgresqlversionnotsupported'] = 'Ihre PostgreSQL-Version wird nicht unterst&#252;tzt. Bitte stellen Sie Ihre Datenbank auf Version %s oder eine neuere Version um.';
	$lang['strbadschema'] = 'Ung&#252;ltiges Schema angegeben.';
	$lang['strbadencoding'] = 'Kann die Client-Zeichenkodierung nicht in der Datenbank setzen.';
	$lang['strsqlerror'] = 'SQL-Fehler:';
	$lang['strinstatement'] = 'In der Anweisung:';
	$lang['strinvalidparam'] = 'Unzul&#228;ssige Script-Parameter.';
	$lang['strnodata'] = 'Keine Datens&#228;tze gefunden.';
	$lang['strnoobjects'] = 'Keine Objekte gefunden.';
	$lang['strrownotunique'] = 'Dieser Datensatz hat keine eindeutige Spalte.';
	$lang['strnoreportsdb'] = 'Sie haben die Berichtsdatenbank nicht angelegt. In der Datei INSTALL finden Sie Anweisungen daf&#252;r.';
	$lang['strnouploads'] = 'Das Hochladen von Dateien ist ausgeschaltet.';
	$lang['strimporterror'] = 'Importfehler.';
	$lang['strimporterror-fileformat'] = 'Importfehler: Dateiformat konnte nicht automatisch bestimmt werden.';
	$lang['strimporterrorline'] = 'Importfehler in Zeile %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Importfehler in Zeile %s: die Zeile hat nicht die richtige Anzahl von Spalten.';
	$lang['strimporterror-uploadedfile'] = 'Importfehler: die Datei konnte nicht auf den Server geladen werden';
	$lang['strcannotdumponwindows'] = 'Das Ablegen von komplizierten Tabellen- und Schemanamen wird auf Windows nicht unterst&#252;tzt.';
	$lang['strinvalidserverparam'] = 'Es wurde versucht, mit einem ung&#252;ltigen Server-Parameter eine Verbindung herzustellen. M&#246;glicherweise versucht jemand, in Ihr System einzubrechen.'; 
	$lang['strnoserversupplied'] = 'Kein Server angegeben!';

	// Tables
	$lang['strtable'] = 'Tabelle';
	$lang['strtables'] = 'Tabellen';
	$lang['strshowalltables'] = 'Alle Tabellen anzeigen';
	$lang['strnotables'] = 'Keine Tabellen gefunden.';
	$lang['strnotable'] = 'Keine Tabelle gefunden.';
	$lang['strcreatetable'] = 'Neue Tabelle erstellen';
	$lang['strcreatetablelike'] = 'Neue Tabelle als Kopie einer bestehenden anlegen';
	$lang['strcreatetablelikeparent'] = 'Urspr&#252;ngliche Tabelle';
	$lang['strcreatelikewithdefaults'] = 'DEFAULT-Werte mitkopieren';
	$lang['strcreatelikewithconstraints'] = 'Constraints mitkopieren';
	$lang['strcreatelikewithindexes'] = 'Indizes mitkopieren';
	$lang['strtablename'] = 'Tabellenname';
	$lang['strtableneedsname'] = 'Sie m&#252;ssen f&#252;r die Tabelle einen Namen angeben.';
	$lang['strtablelikeneedslike'] = 'Sie m&#252;ssen eine Tabelle angeben, deren Spaltendefinitionen kopiert werden sollen.';
	$lang['strtableneedsfield'] = 'Sie m&#252;ssen mindestens eine Spalte angeben.';
	$lang['strtableneedscols'] = 'Sie m&#252;ssen eine zul&#228;ssige Anzahl von Spalten angeben.';
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
	$lang['strrowduplicate'] = 'Einf&#252;gen des Datensatzes fehlgeschlagen: es wurde versucht, ein Duplikat einzuf&#252;gen.';
	$lang['streditrow'] = 'Datensatz bearbeiten';
	$lang['strrowupdated'] = 'Datensatz ge&#228;ndert.';
	$lang['strrowupdatedbad'] = '&#196;ndern des Datensatzes fehlgeschlagen.';
	$lang['strdeleterow'] = 'Datensatz l&#246;schen';
	$lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diesen Datensatz l&#246;schen m&#246;chten?';
	$lang['strrowdeleted'] = 'Datensatz gel&#246;scht.';
	$lang['strrowdeletedbad'] = 'L&#246;schen des Datensatzes fehlgeschlagen.';
	$lang['strinsertandrepeat'] = 'Einf&#252;gen und Wiederholen';
	$lang['strnumcols'] = 'Anzahl der Spalten';
	$lang['strcolneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r die Spalte angeben';
	$lang['strselectallfields'] = 'Alle Felder ausw&#228;hlen';
	$lang['strselectneedscol'] = 'Sie m&#252;ssen mindestens eine Spalte anzeigen lassen.';
	$lang['strselectunary'] = 'Un&#228;re Operatoren k&#246;nnen keine Werte haben.';
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
	$lang['strdataonly'] = 'Nur die Daten';
	$lang['strstructureonly'] = 'Nur die Struktur';
	$lang['strstructureanddata'] = 'Struktur und Daten';
	$lang['strtabbed'] = 'Mit Tabluatoren';
	$lang['strauto'] = 'Automatisch';
	$lang['strconfvacuumtable'] = 'Sind sie sicher, dass Sie VACUUM auf &quot;%s&quot; ausf&#252;hren wollen?';
	$lang['strconfanalyzetable'] = 'Sind sie sicher, dass Sie ANALYZE auf &quot;%s&quot; ausf&#252;hren wollen?';
	$lang['strestimatedrowcount'] = 'Gesch&#228;tzte Anzahl von Datens&#228;tzen';
	$lang['strspecifytabletoanalyze'] = 'Sie m&#252;ssen mindestens eine Tabelle angeben, die analysiert werden soll.';
	$lang['strspecifytabletoempty'] = 'Sie m&#252;ssen mindestens eine Tabelle angeben, deren Inhalt gel&#246;scht werden soll.';
	$lang['strspecifytabletodrop'] = 'Sie m&#252;ssen mindestens eine Tabelle angeben, die gel&#246;scht werden soll.';
	$lang['strspecifytabletovacuum'] = 'Sie m&#252;ssen mindestens eine Tabelle angeben, die bereinigt werden soll.';

	// Columns
	$lang['strcolprop'] = 'Spalteneigenschaften';
	$lang['strnotableprovided'] = 'Keine Tabelle angegeben!';
		
	// Users
	$lang['struser'] = 'Benutzer';
	$lang['strusers'] = 'Benutzer';
	$lang['strusername'] = 'Benutzername';
	$lang['strpassword'] = 'Passwort';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Datenbank erstellen?';
	$lang['strexpires'] = 'G&#252;ltig bis';
	$lang['strsessiondefaults'] = 'Standardwerte f&#252;r Datenbanksitzungen';
	$lang['strnousers'] = 'Keine Benutzer gefunden.';
	$lang['struserupdated'] = 'Benutzer ge&#228;ndert.';
	$lang['struserupdatedbad'] = '&#196;ndern des Benutzers fehlgeschlagen.';
	$lang['strshowallusers'] = 'Alle Benutzer anzeigen';
	$lang['strcreateuser'] = 'Benutzer anlegen';
	$lang['struserneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Benutzer angeben.';
	$lang['strusercreated'] = 'Benutzer angelegt.';
	$lang['strusercreatedbad'] = 'Anlegen des Benutzers fehlgeschlagen.';
	$lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['struserdropped'] = 'Benutzer gel&#246;scht.';
	$lang['struserdroppedbad'] = 'L&#246;schen des Benutzers fehlgeschlagen.';
	$lang['straccount'] = 'Benutzerkonto';
	$lang['strchangepassword'] = 'Passwort &#228;ndern';
	$lang['strpasswordchanged'] = 'Passwort ge&#228;ndert.';
	$lang['strpasswordchangedbad'] = '&#196;ndern des Passwortes fehlgeschlagen.';
	$lang['strpasswordshort'] = 'Passwort ist zu kurz.';
	$lang['strpasswordconfirm'] = 'Passwort und Passwortbest&#228;tigung stimmen nicht &#252;berein.';
	
	// Groups
	$lang['strgroup'] = 'Gruppe';
	$lang['strgroups'] = 'Gruppen';
	$lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
	$lang['strnogroup'] = 'Gruppe nicht gefunden.';
	$lang['strnogroups'] = 'Keine Gruppe gefunden.';
	$lang['strcreategroup'] = 'Gruppe anlegen';
	$lang['strgroupneedsname'] = 'Sie m&#252;ssen f&#252;r die Gruppe einen Namen angeben.';
	$lang['strgroupcreated'] = 'Gruppe angelegt.';
	$lang['strgroupcreatedbad'] = 'Anlegen der Gruppe fehlgeschlagen.';	
	$lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strgroupdropped'] = 'Gruppe gel&#246;scht.';
	$lang['strgroupdroppedbad'] = 'L&#246;schen der Gruppe fehlgeschlagen.';
	$lang['strmembers'] = 'Mitglieder';
	$lang['strmemberof'] = 'Mitglied von';
	$lang['stradminmembers'] = 'Administrative Mitglieder';
	$lang['straddmember'] = 'Mitglied hinzuf&#252;gen';
	$lang['strmemberadded'] = 'Mitglied hinzugef&#252;gt.';
	$lang['strmemberaddedbad'] = 'Hinzuf&#252;gen des Mitglieds fehlgeschlagen.';
	$lang['strdropmember'] = 'Mitglied l&#246;schen';
	$lang['strconfdropmember'] = 'Sind Sie sicher, dass Sie das Mitglied &quot;%s&quot; aus der Gruppe &quot;%s&quot; l&#246;schen wollen?';
	$lang['strmemberdropped'] = 'Mitglied gel&#246;scht.';
	$lang['strmemberdroppedbad'] = 'L&#246;schen des Mitglieds fehlgeschlagen.';

	// Roles
	$lang['strrole'] = 'Rolle';
	$lang['strroles'] = 'Rollen';
	$lang['strshowallroles'] = 'Alle Rollen anzeigen';
	$lang['strnoroles'] = 'Keine Rollen gefunden.';
	$lang['strinheritsprivs'] = 'Rechte vererben?';
	$lang['strcreaterole'] = 'Rolle anlegen';
	$lang['strcancreaterole'] = 'Darf Rollen anlegen?';
	$lang['strrolecreated'] = 'Rolle angelegt.';
	$lang['strrolecreatedbad'] = 'Anlegen der Rolle fehlgeschlagen.';
	$lang['strrolealtered'] = 'Rolle ge&#228;ndert.';
	$lang['strrolealteredbad'] = '&#196;ndern der Rolle fehlgeschlagen.';
	$lang['strcanlogin'] = 'Darf sich anmelden?';
	$lang['strconnlimit'] = 'Maximalzahl an Datenbankverbindungen';
	$lang['strdroprole'] = 'Rolle l&#246;schen';
	$lang['strconfdroprole'] = 'Sind Sie sicher, dass Sie die Rolle &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strroledropped'] = 'Rolle gel&#246;scht.';
	$lang['strroledroppedbad'] = 'L&#246;schen der Rolle fehlgeschlagen.';
	$lang['strnolimit'] = 'Unbeschr&#228;nkt';
	$lang['strnever'] = 'Nie';
	$lang['strroleneedsname'] = 'Sie m&#252;ssen f&#252;r die Rolle einen Namen angeben.';

	// Privileges
	$lang['strprivilege'] = 'Recht';
	$lang['strprivileges'] = 'Rechte';
	$lang['strnoprivileges'] = 'F&#252;r dieses Objekt gelten die Standard-Eigent&#252;merrechte.';
	$lang['strgrant'] = 'Rechte erteilen';
	$lang['strrevoke'] = 'Rechte entziehen';
	$lang['strgranted'] = 'Rechte ge&#228;ndert.';
	$lang['strgrantfailed'] = '&#196;ndern der Rechte fehlgeschlagen.';
	$lang['strgrantbad'] = 'Sie m&#252;ssen mindestens einen Benutzer oder eine Gruppe und mindestens ein Recht angeben.';
	$lang['strgrantor'] = 'Recht vergeben von';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Datenbank';
	$lang['strdatabases'] = 'Datenbanken';
	$lang['strshowalldatabases'] = 'Alle Datenbanken anzeigen';
	$lang['strnodatabases'] = 'Keine Datenbanken gefunden.';
	$lang['strcreatedatabase'] = 'Datenbank erstellen';
	$lang['strdatabasename'] = 'Datenbankname';
	$lang['strdatabaseneedsname'] = 'Sie m&#252;ssen f&#252;r die Datenbank einen Namen angeben.';
	$lang['strdatabasecreated'] = 'Datenbank erstellt.';
	$lang['strdatabasecreatedbad'] = 'Erstellen der Datenbank fehlgeschlagen.';
	$lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strdatabasedropped'] = 'Datenbank gel&#246;scht.';
	$lang['strdatabasedroppedbad'] = 'L&#246;schen der Datenbank fehlgeschlagen.';
	$lang['strentersql'] = 'Auszuf&#252;hrende SQL-Anweisungen hier eingeben:';
	$lang['strsqlexecuted'] = 'SQL-Anweisungen ausgef&#252;hrt.';
	$lang['strvacuumgood'] = 'Tabellenbereinigung abgeschlossen.';
	$lang['strvacuumbad'] = 'Tabellenbereinigung fehlgeschlagen.';
	$lang['stranalyzegood'] = 'Analyse abgeschlossen.';
	$lang['stranalyzebad'] = 'Analyse fehlgeschlagen.';
	$lang['strreindexgood'] = 'Neuindexierung abgeschlossen.';
	$lang['strreindexbad'] = 'Neuindexierung fehlgeschlagen.';
	$lang['strfull'] = 'Mit Reorganisation';
	$lang['strfreeze'] = 'Aggressives &quot;Einfrieren&quot;';
	$lang['strforce'] = 'Erzwingen';
	$lang['strsignalsent'] = 'Signal gesendet.';
	$lang['strsignalsentbad'] = 'Senden des Signales fehlgeschlagen.';
	$lang['strallobjects'] = 'Alle Objekte';
	$lang['strdatabasealtered'] = 'Datenbank ge&#228;ndert.';
	$lang['strdatabasealteredbad'] = '&#196;ndern der Datenbank fehlgeschlagen.';
	$lang['strspecifydatabasetodrop'] = 'Sie m&#252;ssen mindestens eine Datenbank angeben, die gel&#246;scht werden soll.';

	// Views
	$lang['strview'] = 'Sicht';
	$lang['strviews'] = 'Sichten';
	$lang['strshowallviews'] = 'Alle Sichten anzeigen';
	$lang['strnoview'] = 'Keine Sicht gefunden.';
	$lang['strnoviews'] = 'Keine Sichten gefunden.';
	$lang['strcreateview'] = 'Sicht erstellen';
	$lang['strviewname'] = 'Name der Sicht';
	$lang['strviewneedsname'] = 'Sie m&#252;ssen f&#252;r die Sicht einen Namen angeben.';
	$lang['strviewneedsdef'] = 'Sie m&#252;ssen f&#252;r die Sicht eine Definition angeben.';
	$lang['strviewneedsfields'] = 'Sie m&#252;ssen die Spalten angeben, die sie in der Sicht haben wollen.';
	$lang['strviewcreated'] = 'Sicht erstellt.';
	$lang['strviewcreatedbad'] = 'Erstellen der Sicht fehlgeschlagen.';
	$lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strviewdropped'] = 'Sicht gel&#246;scht.';
	$lang['strviewdroppedbad'] = 'L&#246;schen der Sicht fehlgeschlagen.';
	$lang['strviewupdated'] = 'Sicht ge&#228;ndert.';
	$lang['strviewupdatedbad'] = '&#196;ndern der Sicht fehlgeschlagen.';
	$lang['strviewlink'] = 'Verbindende Schl&#252;ssel';
	$lang['strviewconditions'] = 'Zus&#228;tzliche Bedingungen';
	$lang['strcreateviewwiz'] = 'Sicht mit dem Assistenten erstellen';
	$lang['strrenamedupfields'] = 'Doppelte Spalten umbenennen';
	$lang['strdropdupfields'] = 'Doppelte Spalten entfernen';
	$lang['strerrordupfields'] = 'Fehler bei den doppelten Spalten';
	$lang['strviewaltered'] = 'Sicht ge&#228;ndert.';
	$lang['strviewalteredbad'] = '&#196;ndern der Sicht fehlgeschlagen.';
	$lang['strspecifyviewtodrop'] = 'Sie m&#252;ssen mindestens eine Sicht angeben, die gel&#246;scht werden soll.';

	// Sequences
	$lang['strsequence'] = 'Sequenz';
	$lang['strsequences'] = 'Sequenzen';
	$lang['strshowallsequences'] = 'Alle Sequenzen anzeigen';
	$lang['strnosequence'] = 'Keine Sequenz gefunden.';
	$lang['strnosequences'] = 'Keine Sequenzen gefunden.';
	$lang['strcreatesequence'] = 'Sequenz erstellen';
	$lang['strlastvalue'] = 'Letzter Wert';
	$lang['strincrementby'] = 'Erh&#246;hen um';	
	$lang['strstartvalue'] = 'Startwert';
	$lang['strmaxvalue'] = 'Maximalwert';
	$lang['strminvalue'] = 'Minimalwert';
	$lang['strcachevalue'] = 'Anzahl Werte im Cache';
	$lang['strlogcount'] = 'WAL-Z&#228;hler (log_cnt)';
	$lang['strcancycle'] = 'Zyklisch?';
	$lang['striscalled'] = 'Wird erh&#246;ht werden, wenn der n&#228;chste Wert angefordert wird (is_called)?';
	$lang['strsequenceneedsname'] = 'Sie m&#252;ssen f&#252;r die Sequenz einen Namen angeben.';
	$lang['strsequencecreated'] = 'Sequenz erstellt.';
	$lang['strsequencecreatedbad'] = 'Erstellen der Sequenz fehlgeschlagen.';
	$lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strsequencedropped'] = 'Sequenz gel&#246;scht.';
	$lang['strsequencedroppedbad'] = 'L&#246;schen der Sequenz fehlgeschlagen.';
	$lang['strsequencereset'] = 'Sequenz zur&#252;ckgesetzt.';
	$lang['strsequenceresetbad'] = 'R&#252;cksetzen der Sequenz fehlgeschlagen.';
 	$lang['strsequencealtered'] = 'Sequenz ge&#228;ndert.';
 	$lang['strsequencealteredbad'] = '&#196;ndern der Sequenz fehlgeschlagen.';
 	$lang['strsetval'] = 'Wert setzen';
 	$lang['strsequencesetval'] = 'Sequenzwert gesetzt.';
 	$lang['strsequencesetvalbad'] = 'Setzen des Sequenzwertes fehlgeschlagen.';
 	$lang['strnextval'] = 'Wert erh&#246;hen';
 	$lang['strsequencenextval'] = 'Sequenzwert erh&#246;ht.';
 	$lang['strsequencenextvalbad'] = 'Erh&#246;hen des Sequenzwertes fehlgeschlagen.';
	$lang['strspecifysequencetodrop'] = 'Sie m&#252;ssen mindestens eine Sequenz angeben, die gel&#246;scht werden soll.';
	
	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Indizes';
	$lang['strindexname'] = 'Indexname';
	$lang['strshowallindexes'] = 'Alle Indizes anzeigen';
	$lang['strnoindex'] = 'Kein Index gefunden.';
	$lang['strnoindexes'] = 'Keine Indizes gefunden.';
	$lang['strcreateindex'] = 'Index erstellen';
	$lang['strtabname'] = 'Tabellenname';
	$lang['strcolumnname'] = 'Spaltenname';
	$lang['strindexneedsname'] = 'Sie m&#252;ssen f&#252;r den Index einen Namen angeben.';
	$lang['strindexneedscols'] = 'Sie m&#252;ssen eine zul&#228;ssige Anzahl an Spalten angeben.';
	$lang['strindexcreated'] = 'Index erstellt.';
	$lang['strindexcreatedbad'] = 'Erstellen des Index fehlgeschlagen.';
	$lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strindexdropped'] = 'Index gel&#246;scht.';
	$lang['strindexdroppedbad'] = 'L&#246;schen des Index fehlgeschlagen.';
	$lang['strkeyname'] = 'Schl&#252;sselname';
	$lang['struniquekey'] = 'Eindeutiger Schl&#252;ssel';
	$lang['strprimarykey'] = 'Prim&#228;rerschl&#252;ssel';
 	$lang['strindextype'] = 'Typ des Index';
	$lang['strtablecolumnlist'] = 'Spalten in der Tabelle';
	$lang['strindexcolumnlist'] = 'Spalten im Index';
	$lang['strconfcluster'] = 'Sind Sie sicher, dass Sie &quot;%s&quot; clustern wollen?';
	$lang['strclusteredgood'] = 'Clustern abgeschlossen.';
	$lang['strclusteredbad'] = 'Clustern fehlgeschlagen.';

	// Rules
	$lang['strrules'] = 'Regeln';
	$lang['strrule'] = 'Regel';
	$lang['strshowallrules'] = 'Alle Regeln anzeigen';
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
	$lang['strconstraint'] = 'Constraint';
	$lang['strconstraints'] = 'Constraints';
	$lang['strshowallconstraints'] = 'Alle Constraints anzeigen';
	$lang['strnoconstraints'] = 'Keine Constraints gefunden.';
	$lang['strcreateconstraint'] = 'Constraint erstellen';
	$lang['strconstraintcreated'] = 'Constraint erstellt.';
	$lang['strconstraintcreatedbad'] = 'Erstellen des Constraints fehlgeschlagen.';
	$lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint &quot;%s&quot; in der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strconstraintdropped'] = 'Constraint gel&#246;scht.';
	$lang['strconstraintdroppedbad'] = 'L&#246;schen des Constraints fehlgeschlagen.';
	$lang['straddcheck'] = 'Check-Constraint hinzuf&#252;gen';
	$lang['strcheckneedsdefinition'] = 'Ein Check-Constraint braucht eine Definition.';
	$lang['strcheckadded'] = 'Check-Constraint hinzugef&#252;gt.';
	$lang['strcheckaddedbad'] = 'Hinzuf&#252;gen des Check-Constraints fehlgeschlagen.';
	$lang['straddpk'] = 'Prim&#228;rschl&#252;ssel hinzuf&#252;gen';
	$lang['strpkneedscols'] = 'Ein Prim&#228;rschl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
	$lang['strpkadded'] = 'Prim&#228;rschl&#252;ssel hinzugef&#252;gt.';
	$lang['strpkaddedbad'] = 'Hinzuf&#252;gen des Prim&#228;rschl&#252;ssels fehlgeschlagen.';
	$lang['stradduniq'] = 'Eindeutigen Schl&#252;ssel hinzuf&#252;gen';
	$lang['struniqneedscols'] = 'Ein eindeutiger Schl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
	$lang['struniqadded'] = 'Eindeutiger Schl&#252;ssel hinzugef&#252;gt.';
	$lang['struniqaddedbad'] = 'Hinzuf&#252;gen eines eindeutigen Schl&#252;ssels fehlgeschlagen.';
	$lang['straddfk'] = 'Fremdschl&#252;ssel hinzuf&#252;gen';
	$lang['strfkneedscols'] = 'Ein Fremdschl&#252;ssel ben&#246;tigt mindestens eine Spalte.';
	$lang['strfkneedstarget'] = 'Ein Fremdschl&#252;ssel ben&#246;tigt eine Zieltabelle.';
	$lang['strfkadded'] = 'Fremdschl&#252;ssel hinzugef&#252;gt.';
	$lang['strfkaddedbad'] = 'Hinzuf&#252;gen eines Fremdschl&#252;ssels fehlgeschlagen.';
	$lang['strfktarget'] = 'Zieltabelle';
	$lang['strfkcolumnlist'] = 'Spalten im Schl&#252;ssel';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Funktion';
	$lang['strfunctions'] = 'Funktionen';
	$lang['strshowallfunctions'] = 'Alle Funktionen anzeigen';
	$lang['strnofunction'] = 'Keine Funktion gefunden.';
	$lang['strnofunctions'] = 'Keine Funktionen gefunden.';
	$lang['strcreateplfunction'] = 'SQL/PL-Funktion erstellen';
	$lang['strcreateinternalfunction'] = 'Interne Funktion erstellen';
	$lang['strcreatecfunction'] = 'C-Funktion erstellen';
	$lang['strfunctionname'] = 'Funktionsname';
	$lang['strreturns'] = 'R&#252;ckgabetyp';
	$lang['strproglanguage'] = 'Programmiersprache';
	$lang['strfunctionneedsname'] = 'Sie m&#252;ssen f&#252;r die Funktion einen Namen angeben.';
	$lang['strfunctionneedsdef'] = 'Sie m&#252;ssen f&#252;r die Funktion eine Definition angeben.';
	$lang['strfunctioncreated'] = 'Funktion erstellt.';
	$lang['strfunctioncreatedbad'] = 'Erstellen der Funktion fehlgeschlagen.';
	$lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strfunctiondropped'] = 'Funktion gel&#246;scht.';
	$lang['strfunctiondroppedbad'] = 'L&#246;schen der Funktion fehlgeschlagen.';
	$lang['strfunctionupdated'] = 'Funktion ge&#228;ndert.';
	$lang['strfunctionupdatedbad'] = '&#196;ndern der Funktion fehlgeschlagen.';
	$lang['strobjectfile'] = 'Objektdatei';
	$lang['strlinksymbol'] = 'Link-Symbol';
	$lang['strarguments'] = 'Funktionsargumente';
	$lang['strargmode'] = 'Richtung';
	$lang['strargtype'] = 'Datentyp';
	$lang['strargadd'] = 'Weiteres Argument hinzuf&#252;gen';
	$lang['strargremove'] = 'Dieses Argument entfernen';
	$lang['strargnoargs'] = 'Diese Funktion kann nur ohne Argumente aufgerufen werden.';
	$lang['strargenableargs'] = 'Diese Funktion kann mit Argumenten aufgerufen werden.';
	$lang['strargnorowabove'] = 'Oberhalb dieser Spalte muss eine weitere Spalte sein.';
	$lang['strargnorowbelow'] = 'Unterhalb dieser Spalte muss eine weitere Spalte sein.';
	$lang['strargraise'] = 'Hinaufschieben.';
	$lang['strarglower'] = 'Hinunterschieben.';
	$lang['strargremoveconfirm'] = 'Sind Sie sicher, dass Sie dieses Argument entfernen wollen? Das kann nicht r&#252;ckg&#228;ngig gemacht werden.';
	$lang['strfunctioncosting'] = 'Ausf&#252;hrungskosten';
	$lang['strresultrows'] = 'Gesch&#228;tzte Anzahl der Ergebniszeilen';
	$lang['strexecutioncost'] = 'Gesch&#228;tzte Ausf&#252;hrungskosten';
	$lang['strspecifyfunctiontodrop'] = 'Sie m&#252;ssen mindestens eine Funktion angeben, die gel&#246;scht werden soll.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Trigger';
	$lang['strshowalltriggers'] = 'Alle Trigger anzeigen';
	$lang['strnotrigger'] = 'Kein Trigger gefunden.';
	$lang['strnotriggers'] = 'Keine Trigger gefunden.';
	$lang['strcreatetrigger'] = 'Trigger erstellen';
	$lang['strtriggerneedsname'] = 'Sie m&#252;ssen f&#252;r den Trigger einen Namen angeben.';
	$lang['strtriggerneedsfunc'] = 'Sie m&#252;ssen f&#252;r den Trigger eine Funktion angeben.';
	$lang['strtriggercreated'] = 'Trigger erstellt.';
	$lang['strtriggercreatedbad'] = 'Erstellen des Triggers fehlgeschlagen.';
	$lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; auf der Tabelle &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strconfenabletrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; auf der Tabelle &quot;%s&quot; aktivieren m&#246;chten?';
	$lang['strconfdisabletrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; auf der Tabelle &quot;%s&quot; deaktivieren m&#246;chten?';
	$lang['strtriggerdropped'] = 'Trigger gel&#246;scht.';
	$lang['strtriggerdroppedbad'] = 'L&#246;schen des Triggers fehlgeschlagen.';
	$lang['strtriggerenabled'] = 'Trigger aktiviert.';
	$lang['strtriggerenabledbad'] = 'Aktivieren des Triggers fehlgeschlagen.';
	$lang['strtriggerdisabled'] = 'Trigger deaktiviert.';
	$lang['strtriggerdisabledbad'] = 'Deaktivieren des Triggers fehlgeschlagen.';
	$lang['strtriggeraltered'] = 'Trigger ge&#228;ndert.';
	$lang['strtriggeralteredbad'] = '&#196;ndern des Triggers fehlgeschlagen.';
	$lang['strforeach'] = 'F&#252;r alle';

	// Types
	$lang['strtype'] = 'Datentyp';
	$lang['strtypes'] = 'Datentypen';
	$lang['strshowalltypes'] = 'Alle Datentypen anzeigen';
	$lang['strnotype'] = 'Kein Datentyp gefunden.';
	$lang['strnotypes'] = 'Keine Datentypen gefunden.';
	$lang['strcreatetype'] = 'Datentyp erstellen';
	$lang['strcreatecomptype'] = 'Zusammengesetzten Typ erstellen';
	$lang['strcreateenumtype'] = 'Aufz&#228;hlungstyp erstellen';
	$lang['strtypeneedsfield'] = 'Sie m&#252;ssen mindestens ein Feld angeben.';
	$lang['strtypeneedsvalue'] = 'Sie m&#252;ssen mindestens einen Wert angeben.';
	$lang['strtypeneedscols'] = 'Sie m&#252;ssen eine g&#252;ltige Anzahl von Spalten angeben.';
	$lang['strtypeneedsvals'] = 'Sie m&#252;ssen eine g&#252;ltige Anzahl von Werten angeben.';
	$lang['strinputfn'] = 'Eingabefunktion';
	$lang['stroutputfn'] = 'Ausgabefunktion';
	$lang['strpassbyval'] = '&#220;bergabe &quot;by value&quot;?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Trennzeichen';
	$lang['strstorage'] = 'Speicherung';
	$lang['strfield'] = 'Spalte';
	$lang['strnumfields'] = 'Anzahl Spalten';
	$lang['strnumvalues'] = 'Anzahl Werte';
	$lang['strtypeneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Datentyp angeben.';
	$lang['strtypeneedslen'] = 'Sie m&#252;ssen eine L&#228;nge f&#252;r den Datentyp angeben.';
	$lang['strtypecreated'] = 'Datentyp erstellt.';
	$lang['strtypecreatedbad'] = 'Erstellen des Datentypen fehlgeschlagen.';
	$lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentyp &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strtypedropped'] = 'Datentyp gel&#246;scht.';
	$lang['strtypedroppedbad'] = 'L&#246;schen des Datentyps fehlgeschlagen.';
	$lang['strflavor'] = 'Art';
	$lang['strbasetype'] = 'Basis-Typ';
	$lang['strcompositetype'] = 'Zusammengesetzt';
	$lang['strpseudotype'] = 'Pseudo';
	$lang['strenum'] = 'Aufz&#228;hlend';
	$lang['strenumvalues'] = 'Wert';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemata';
	$lang['strshowallschemas'] = 'Alle Schemata anzeigen';
	$lang['strnoschema'] = 'Kein Schema gefunden.';
	$lang['strnoschemas'] = 'Keine Schemata gefunden.';
	$lang['strcreateschema'] = 'Schema erstellen';
	$lang['strschemaname'] = 'Name des Schema';
	$lang['strschemaneedsname'] = 'Sie m&#252;ssen f&#252;r das Schema einen Namen angeben.';
	$lang['strschemacreated'] = 'Schema erstellt.';
	$lang['strschemacreatedbad'] = 'Erstellen des Schemas fehlgeschlagen.';
	$lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strschemadropped'] = 'Schema gel&#246;scht.';
	$lang['strschemadroppedbad'] = 'L&#246;schen des Schemas fehlgeschlagen';
	$lang['strschemaaltered'] = 'Schema ge&#228;ndert.';
	$lang['strschemaalteredbad'] = '&#196;ndern des Schemas fehlgeschlagen.';
	$lang['strsearchpath'] = 'Schemasuchpfad';
	$lang['strspecifyschematodrop'] = 'Sie m&#252;ssen mindestens ein Schema angeben, das gel&#246;scht werden soll.';

	// Reports
	$lang['strreport'] = 'Bericht';
	$lang['strreports'] = 'Berichte';
	$lang['strshowallreports'] = 'Alle Berichte anzeigen';
	$lang['strnoreports'] = 'Keine Berichte gefunden.';
	$lang['strcreatereport'] = 'Bericht erstellen.';
	$lang['strreportdropped'] = 'Bericht gel&#246;scht.';
	$lang['strreportdroppedbad'] = 'L&#246;schen des Berichtes fehlgeschlagen.';
	$lang['strconfdropreport'] = 'Sind Sie sicher, dass Sie den Bericht &quot;%s&quot; l&#246;schen wollen?';
	$lang['strreportneedsname'] = 'Sie m&#252;ssen f&#252;r den Bericht einen Namen angeben.';
	$lang['strreportneedsdef'] = 'Sie m&#252;ssen eine SQL-Abfrage f&#252;r den Bericht eingeben.';
	$lang['strreportcreated'] = 'Bericht gespeichert.';
	$lang['strreportcreatedbad'] = 'Speichern des Berichtes fehlgeschlagen.';

	// Domains
	$lang['strdomain'] = 'Dom&#228;ne';
	$lang['strdomains'] = 'Dom&#228;nen';
	$lang['strshowalldomains'] = 'Alle Dom&#228;nen anzeigen';
	$lang['strnodomains'] = 'Keine Dom&#228;nen gefunden.';
	$lang['strcreatedomain'] = 'Dom&#228;ne erstellen';
	$lang['strdomaindropped'] = 'Dom&#228;ne gel&#246;scht.';
	$lang['strdomaindroppedbad'] = 'L&#246;schen der Dom&#228;ne fehlgeschlagen.';
	$lang['strconfdropdomain'] = 'Sind Sie sicher, dass Sie die Dom&#228;ne &quot;%s&quot; l&#246;schen wollen?';
	$lang['strdomainneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r die Dom&#228;ne angeben.';
	$lang['strdomaincreated'] = 'Dom&#228;ne erstellt.';
	$lang['strdomaincreatedbad'] = 'Erstellen der Dom&#228;ne fehlgeschlagen.';
	$lang['strdomainaltered'] = 'Dom&#228;ne ge&#228;ndert.';
	$lang['strdomainalteredbad'] = '&#196;ndern der Dom&#228;ne fehlgeschlagen.';	

	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operatoren';
	$lang['strshowalloperators'] = 'Alle Operatoren anzeigen';
	$lang['strnooperator'] = 'Kein Operator gefunden.';
	$lang['strnooperators'] = 'Keine Operatoren gefunden.';
	$lang['strcreateoperator'] = 'Operator erstellen';
	$lang['strleftarg'] = 'Typ des linken Arguments';
	$lang['strrightarg'] = 'Typ des rechter Arguments';
	$lang['strcommutator'] = 'Kommutator';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Funktion zur Sch&#228;tzung der Restriktions-Selektivit&#228;t';
	$lang['strjoin'] = 'Funktion zur Sch&#228;tzung der Join-Selektivit&#228;t';
	$lang['strhashes'] = 'Unterst&#252;tzt Hash-Joins';
	$lang['strmerges'] = 'Unterst&#252;tzt Merge-Joins';
	$lang['strleftsort'] = 'Kleiner-Operator zum Sortieren der linken Seite';
	$lang['strrightsort'] = 'Kleiner-Operator zum Sortieren der rechten Seite';
	$lang['strlessthan'] = 'Kleiner-Operator';
	$lang['strgreaterthan'] = 'Gr&#246;&#223;er-Operator';
	$lang['stroperatorneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Operator angeben.';
	$lang['stroperatorcreated'] = 'Operator erstellt.';
	$lang['stroperatorcreatedbad'] = 'Erstellen des Operators fehlgeschlagen.';
	$lang['strconfdropoperator'] = 'Sind Sie sicher, dass Sie den Operator &quot;%s&quot; l&#246;schen wollen?';
	$lang['stroperatordropped'] = 'Operator gel&#246;scht.';
	$lang['stroperatordroppedbad'] = 'L&#246;schen des Operators fehlgeschlagen.';

	// Casts
	$lang['strcasts'] = 'Typumwandlungen';
	$lang['strnocasts'] = 'Keine Typumwandlungen gefunden.';
	$lang['strsourcetype'] = 'Ursprungs-Datentyp';
	$lang['strtargettype'] = 'Ziel-Datentyp';
	$lang['strimplicit'] = 'Implizit';
	$lang['strinassignment'] = 'Bei Zuweisungen';
	$lang['strbinarycompat'] = '(Bin&#228;rkompatibel)';
	
	// Conversions
	$lang['strconversions'] = 'Konvertierungen';
	$lang['strnoconversions'] = 'Keine Konvertierungen gefunden.';
	$lang['strsourceencoding'] = 'Ursprungs-Zeichenkodierung';
	$lang['strtargetencoding'] = 'Ziel-Zeichenkodierung';
	
	// Languages
	$lang['strlanguages'] = 'Programmiersprachen';
	$lang['strnolanguages'] = 'Keine Sprachen gefunden.';
	$lang['strtrusted'] = 'Vertrauensw&#252;rdig';
	
	// Info
	$lang['strnoinfo'] = 'Keine Informationen vorhanden.';
	$lang['strreferringtables'] = 'Tabellen, die mit Fremdschl&#252;sseln auf diese Tabelle verweisen';
	$lang['strparenttables'] = 'Elterntabellen';
	$lang['strchildtables'] = 'Kindtabellen';

	// Aggregates
	$lang['straggregate'] = 'Aggregatsfunktion';
	$lang['straggregates'] = 'Aggregatsfunktionen';
	$lang['strnoaggregates'] = 'Keine Aggregatsfunktionen gefunden.';
	$lang['stralltypes'] = '(Alle Typen)';
	$lang['strcreateaggregate'] = 'Aggregatsfunktion erstellen';
	$lang['straggrbasetype'] = 'Eingabedatentyp';
	$lang['straggrsfunc'] = 'Zustands&#252;bergangsfunktion';
	$lang['straggrstype'] = 'Datentyp f&#252;r den Zustandswert';
	$lang['straggrffunc'] = 'Ergebnisfunktion';
	$lang['straggrinitcond'] = 'Zustandswert zu Beginn';
	$lang['straggrsortop'] = 'Operator f&#252;r Sortierung';
	$lang['strconfdropaggregate'] = 'Sind Sie sicher, dass Sie die Aggregatsfunktion &quot;%s&quot; l&#246;schen wollen?';
	$lang['straggregatedropped'] = 'Aggregatsfunktion gel&#246;scht.';
	$lang['straggregatedroppedbad'] = 'L&#246;schen der Aggregatsfunktion fehlgeschlagen.';
	$lang['straggraltered'] = 'Aggregatsfunktion ge&#228;ndert.';
	$lang['straggralteredbad'] = '&#196;ndern der Aggregatsfunktion fehlgeschlagen.';
	$lang['straggrneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r die Aggregatsfunktion angeben.';
	$lang['straggrneedsbasetype'] = 'Sie m&#252;ssen den Eingabedatentyp f&#252;r die Aggregatsfunktion angeben.';
	$lang['straggrneedssfunc'] = 'Sie m&#252;ssen den Namen der Zustands&#252;bergangsfunktion f&#252;r die Aggregatsfunktion angeben.';
	$lang['straggrneedsstype'] = 'Sie m&#252;ssen den Datentyp f&#252;r den Zustandswert der Aggregatsfunktion angeben.';
	$lang['straggrcreated'] = 'Aggregatsfunktion erstellt.';
	$lang['straggrcreatedbad'] = 'Erstellen der Aggregatsfunktion fehlgeschlagen.';
	$lang['straggrshowall'] = 'Alle Aggregatsfunktionen anzeigen';

	// Operator Classes
	$lang['stropclasses'] = 'Operatorklassen';
	$lang['strnoopclasses'] = 'Keine Operatorklassen gefunden.';
	$lang['straccessmethod'] = 'Zugriffsmethode';

	// Stats and performance
	$lang['strrowperf'] = 'Zeilen-Performance';
	$lang['strioperf'] = 'E/A Performance';
	$lang['stridxrowperf'] = 'Index-Zeilen-Performance';
	$lang['stridxioperf'] = 'Index-E/A-Performance';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequentiell';
	$lang['strscan'] = 'Durchsuchen';
	$lang['strread'] = 'Lesen';
	$lang['strfetch'] = 'Holen';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST-Index';
	$lang['strcache'] = 'Zwischenspeicher';
	$lang['strdisk'] = 'Festplatte';
	$lang['strrows2'] = 'Zeilen';

	// Tablespaces
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespaces';
	$lang['strshowalltablespaces'] = 'Alle Tablespaces anzeigen';
	$lang['strnotablespaces'] = 'Keine Tablespaces gefunden.';
	$lang['strcreatetablespace'] = 'Tablespace erstellen';
	$lang['strlocation'] = 'Pfad';
	$lang['strtablespaceneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Tablespace angeben.';
	$lang['strtablespaceneedsloc'] = 'Sie m&#252;ssen ein Verzeichnis angeben, in dem Sie den Tablespace erstellen m&#246;chten.';
	$lang['strtablespacecreated'] = 'Tablespace erstellt.';
	$lang['strtablespacecreatedbad'] = 'Erstellen des Tablespace fehlgeschlagen.';
	$lang['strconfdroptablespace'] = 'Sind Sie sicher, dass Sie den Tablespace &quot;%s&quot; l&#246;schen wollen?';
	$lang['strtablespacedropped'] = 'Tablespace gel&#246;scht.';
	$lang['strtablespacedroppedbad'] = 'L&#246;schen des Tablespace fehlgeschlagen.';
	$lang['strtablespacealtered'] = 'Tablespace ge&#228;ndert.';
	$lang['strtablespacealteredbad'] = '&#196;ndern des Tablespace fehlgeschlagen.';

	// Slony clusters
	$lang['strcluster'] = 'Cluster';
	$lang['strnoclusters'] = 'Keine Cluster gefunden.';
	$lang['strconfdropcluster'] = 'Sind Sie sicher, dass Sie den Cluster &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strclusterdropped'] = 'Cluster gel&#246;scht.';
	$lang['strclusterdroppedbad'] = 'L&#246;schen des Clusters fehlgeschlagen.';
	$lang['strinitcluster'] = 'Cluster initialisieren';
	$lang['strclustercreated'] = 'Cluster initialisiert.';
	$lang['strclustercreatedbad'] = 'Initialisierung des Clusters fehlgeschlagen.';
	$lang['strclusterneedsname'] = 'Sie m&#252;ssen einen Namen f&#252;r den Cluster angeben.';
	$lang['strclusterneedsnodeid'] = 'Sie m&#252;ssen eine ID f&#252;r den lokalen Cluster-Knoten angeben.';

	// Slony nodes
	$lang['strnodes'] = 'Cluster-Knoten';
	$lang['strnonodes'] = 'Keine Cluster-Knoten gefunden.';
	$lang['strcreatenode'] = 'Cluster-Knoten erstellen';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Aktiv';
	$lang['strnodecreated'] = 'Cluster-Knoten erstellt.';
	$lang['strnodecreatedbad'] = 'Erstellen des Cluster-Knotens fehlgeschlagen.';
	$lang['strconfdropnode'] = 'Sind Sie sicher, dass Sie Cluster-Knoten &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strnodedropped'] = 'Cluster-Knoten gel&#246;scht.';
	$lang['strnodedroppedbad'] = 'L&#246;schen des Cluster-Knotens fehlgeschlagen.';
	$lang['strfailover'] = '&#220;bernahme';
	$lang['strnodefailedover'] = 'Cluster-Knoten &#252;bernommen.';
	$lang['strnodefailedoverbad'] = '&#220;bernahme des Cluster-Knotens fehlgeschlagen.';
	$lang['strstatus'] = 'Status';	
	$lang['strhealthy'] = 'Gesund';
	$lang['stroutofsync'] = 'Nicht Synchronisiert';
	$lang['strunknown'] = 'Unbekannt';	

	// Slony paths	
	$lang['strpaths'] = 'Kommunikationspfade';
	$lang['strnopaths'] = 'Keine Kommunikationspfade gefunden.';
	$lang['strcreatepath'] = 'Kommunikationspfad erstellen';
	$lang['strnodename'] = 'Name des Cluster-Knotens';
	$lang['strnodeid'] = 'ID des Cluster-Knotens';
	$lang['strconninfo'] = 'Connection-String';
	$lang['strconnretry'] = 'Wartezeit vor erneutem Verbindungsversuch in Sekunden';
	$lang['strpathneedsconninfo'] = 'Sie m&#252;ssen einen Connection-String f&#252;r den Kommunikationspfad angeben.';
	$lang['strpathneedsconnretry'] = 'Sie m&#252;ssen die Wartezeit vor einem erneuten Verbindungsversuch angeben.';
	$lang['strpathcreated'] = 'Kommunikationspfad erstellt.';
	$lang['strpathcreatedbad'] = 'Erstellen des Kommunikationspfades fehlgeschlagen.';
	$lang['strconfdroppath'] = 'Sind Sie sicher, dass Sie den Kommunikationspfad &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strpathdropped'] = 'Kommunikationspfad gel&#246;scht.';
	$lang['strpathdroppedbad'] = 'L&#246;schen des Kommunikationspfades fehlgeschlagen.';

	// Slony listens
	$lang['strlistens'] = 'Zuh&#246;rer';
	$lang['strnolistens'] = 'Keine Zuh&#246;rer gefunden.';
	$lang['strcreatelisten'] = 'Zuh&#246;rer erstellen';
	$lang['strlistencreated'] = 'Zuh&#246;rer erstellt.';
	$lang['strlistencreatedbad'] = 'Erstellen des Zuh&#246;rers fehlgeschlagen.';
	$lang['strconfdroplisten'] = 'Sind Sie sicher, dass Sie Zuh&#246;rer &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strlistendropped'] = 'Zuh&#246;rer gel&#246;scht.';
	$lang['strlistendroppedbad'] = 'L&#246;schen des Zuh&#246;rers fehlgeschlagen.';

	// Slony replication sets
	$lang['strrepsets'] = 'Replikationsgruppe';
	$lang['strnorepsets'] = 'Keine Replikationsgruppen gefunden.';
	$lang['strcreaterepset'] = 'Replikationsgruppe erstellen';
	$lang['strrepsetcreated'] = 'Replikationsgruppe erstellt.';
	$lang['strrepsetcreatedbad'] = 'Erstellen der Replikationsgruppe fehlgeschlagen.';
	$lang['strconfdroprepset'] = 'Sind Sie sicher, dass Sie Replikationsgruppe &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strrepsetdropped'] = 'Replikationsgruppe gel&#246;scht.';
	$lang['strrepsetdroppedbad'] = 'L&#246;schen der Replikationsgruppe fehlgeschlagen.';
	$lang['strmerge'] = 'Vereinigen';
	$lang['strmergeinto'] = 'Vereinigen mit';
	$lang['strrepsetmerged'] = 'Replikationsgruppen vereinige.';
	$lang['strrepsetmergedbad'] = 'Vereinigung der Replikationsgruppen fehlgeschlagen.';
	$lang['strmove'] = 'Verschieben';
	$lang['strneworigin'] = 'Neuer Usrprung';
	$lang['strrepsetmoved'] = 'Replikationsgruppe verschoben.';
	$lang['strrepsetmovedbad'] = 'Verschieben der Replikationsgruppe fehlgeschlagen.';
	$lang['strnewrepset'] = 'Neue Replikationsgruppe';
	$lang['strlock'] = 'Sperren';
	$lang['strlocked'] = 'Gesperrt';
	$lang['strunlock'] = 'Entsperren';
	$lang['strconflockrepset'] = 'Sind Sie sicher, dass Sie Replikationsgruppe &quot;%s&quot; sperren m&#246;chten?';
	$lang['strrepsetlocked'] = 'Replikationsgruppe gesperrt.';
	$lang['strrepsetlockedbad'] = 'Sperren der Replikationsgruppe fehlgeschlagen.';
	$lang['strconfunlockrepset'] = 'Sind Sie sicher, dass Sie Replikationsgruppe &quot;%s&quot; entsperren m&#246;chten?';
	$lang['strrepsetunlocked'] = 'Replikationsgruppe entsperrt.';
	$lang['strrepsetunlockedbad'] = 'Entsperren der Replikationsgruppe fehlgeschlagen.';
	$lang['stronlyonnode'] = 'Nur auf dem Cluster-Knoten';
	$lang['strddlscript'] = 'DDL-Script';
	$lang['strscriptneedsbody'] = 'Sie m&#252;ssen ein Script angeben, das auf allen Cluster-Knoten ausgef&#252;hrt werden soll.';
	$lang['strscriptexecuted'] = 'DDL-Script f&#252;r die Replikationsgruppe ausgef&#252;hrt.';
	$lang['strscriptexecutedbad'] = 'Ausf&#252;hrung des DDL-Scripts f&#252;r die Replikationsgruppe fehlgeschlagen.';
	$lang['strtabletriggerstoretain'] = 'Die folgenden Trigger werden von Slony NICHT deaktiviert:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Tabelle hinzuf&#252;gen';
	$lang['strtableneedsuniquekey'] = 'Damit eine Tabelle hinzugef&#252;gt werden kann, muss sie einen Prim&#228;rschl&#252;ssel oder einen eindeutigen Schl&#252;ssel besitzen.';
	$lang['strtableaddedtorepset'] = 'Tabelle zu Replikationsgruppe hinzugef&#252;gt.';
	$lang['strtableaddedtorepsetbad'] = 'Hinzuf&#252;gen der Tabelle zur Replikationsgruppe fehlgeschlagen.';
	$lang['strconfremovetablefromrepset'] = 'Sind Sie sicher, dass Sie die Tabelle &quot;%s&quot; aus der Replikationsgruppe &quot;%s&quot; entfernen m&#246;chten?';
	$lang['strtableremovedfromrepset'] = 'Tabelle aus Replikationsgruppe entfernt.';
	$lang['strtableremovedfromrepsetbad'] = 'Entfernen der Tabelle aus der Replikationsgruppe fehlgeschlagen.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Sequenz hinzuf&#252;gen';
	$lang['strsequenceaddedtorepset'] = 'Sequenz zu Replikationsgruppe hinzugef&#252;gt.';
	$lang['strsequenceaddedtorepsetbad'] = 'Hinzuf&#252;gen der Sequenz zur Replikationsgruppe fehlgeschlagen.';
	$lang['strconfremovesequencefromrepset'] = 'Sind Sie sicher, dass Sie die Sequenz &quot;%s&quot; aus der Replikationsgruppe &quot;%s&quot; entfernen m&#246;chten?';
	$lang['strsequenceremovedfromrepset'] = 'Sequenz aus Replikationsgruppe entfernt.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Entfernen der Sequenz aus der Replikationsgruppe fehlgeschlagen.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Abonnements';
	$lang['strnosubscriptions'] = 'Keine Abonnements gefunden.';

	// Miscellaneous
	$lang['strtopbar'] = '%s l&#228;uft auf %s:%s -- Sie sind als &quot;%s&quot; angemeldet';
	$lang['strtimefmt'] = 'D, j. n. Y, G:i';
	$lang['strhelp'] = 'Hilfe';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Browser f&#252;r Hilfeseiten';
	$lang['strselecthelppage'] = 'Hilfeseite ausw&#228;hlen';
	$lang['strinvalidhelppage'] = 'Ung&#252;ltige Hilfeseite.';
	$lang['strlogintitle'] = 'Bei %s anmelden';
	$lang['strlogoutmsg'] = 'Von %s abgemeldet';
	$lang['strloading'] = 'Lade...';
	$lang['strerrorloading'] = 'Fehler beim Laden';
	$lang['strclicktoreload'] = 'Klicken Sie zum Neuladen';

	// Autovacuum
	$lang['strautovacuum'] = 'Autovacuum';
	$lang['strturnedon'] = 'Eingeschaltet';
	$lang['strturnedoff'] = 'Ausgeschaltet';
	$lang['strenabled'] = 'Aktiviert';
	$lang['strvacuumbasethreshold'] = 'Autovacuum-Schwellwert';
	$lang['strvacuumscalefactor'] = 'Autovacuum-Skalierungsfaktor';
	$lang['stranalybasethreshold'] = 'Analyze-Schwellwert';
	$lang['stranalyzescalefactor'] = 'Analyze-Skalierungsfaktor';
	$lang['strvacuumcostdelay'] = 'Pause nach Erreichen des Autovacuum-Kostenlimits';
	$lang['strvacuumcostlimit'] = 'Autovacuum-Kostenlimits';

	// Table-level Locks
	$lang['strlocks'] = 'Sperren';
	$lang['strtransaction'] = 'Transaktions-ID';
	$lang['strvirtualtransaction'] = 'Virtuelle Transaktions-ID';
	$lang['strprocessid'] = 'Prozess-ID';
	$lang['strmode'] = 'Art der Sperre';
	$lang['strislockheld'] = 'Sperre gew&#228;hrt?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Vorbereitete verteilte Transaktionen';
	$lang['strxactid'] = 'Transaktions-ID';
	$lang['strgid'] = 'Globale ID';
	
	// Fulltext search
	$lang['strfulltext'] = 'Volltextsuche';
	$lang['strftsconfig'] = 'Volltextsuch-Konfiguration';
	$lang['strftsconfigs'] = 'Konfigurationen';
	$lang['strftscreateconfig'] = 'Volltextsuch-Konfiguration erstellen';
	$lang['strftscreatedict'] = 'W&#246;rterbuch erstellen';
	$lang['strftscreatedicttemplate'] = 'W&#246;rterbuch-Blaupause erstellen';
	$lang['strftscreateparser'] = 'Parser erstellen';
	$lang['strftsnoconfigs'] = 'Keine Volltextsuch-Konfigurationen gefunden.';
	$lang['strftsconfigdropped'] = 'Volltextsuch-Konfiguration gel&#246;scht.';
	$lang['strftsconfigdroppedbad'] = 'L&#246;schen der Volltextsuch-Konfiguration fehlgeschlagen.';
	$lang['strconfdropftsconfig'] = 'Sind Sie sicher, dass Sie die Volltextsuch-Konfiguration &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strconfdropftsdict'] = 'Sind Sie sicher, dass Sie das W&#246;rterbuch &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strconfdropftsmapping'] = 'Sind Sie sicher, dass Sie die Zuordnung &quot;%s&quot; der Volltextsuch-Konfiguration &quot;%s&quot; l&#246;schen m&#246;chten?';
	$lang['strftstemplate'] = 'Blaupause';
	$lang['strftsparser'] = 'Parser';
	$lang['strftsconfigneedsname'] = 'Sie m&#252;ssen f&#252;r die Volltextsuch-Konfiguration einen Namen angeben.';
	$lang['strftsconfigcreated'] = 'Volltextsuch-Konfiguration erstellt.';
	$lang['strftsconfigcreatedbad'] = 'Erstellen der Volltextsuch-Konfiguration fehlgeschlagen.';
	$lang['strftsmapping'] = 'Zuordnung';
	$lang['strftsdicts'] = 'W&#246;rterb&#252;cher';
	$lang['strftsdict'] = 'W&#246;rterbuch';
	$lang['strftsemptymap'] = 'Leere Zuordnung f&#252;r Volltextsuch-Konfiguration.';
	$lang['strftswithmap'] = 'Mit Zuordnung';
	$lang['strftsmakedefault'] = 'Als Standardwert f&#252;r die angegebene Spracheinstellung festlegen';
	$lang['strftsconfigaltered'] = 'Volltextsuch-Konfiguration ge&#228;ndert.';
	$lang['strftsconfigalteredbad'] = '&#196;ndern der Volltextsuch-Konfiguration fehlgeschlagen.';
	$lang['strftsconfigmap'] = 'Zuordnung f&#252;r Volltextsuch-Konfiguration';
	$lang['strftsparsers'] = 'Parsers f&#252;r Volltextsuch-Konfiguration';
	$lang['strftsnoparsers'] = 'Keine Parsers f&#252;r Volltextsuch-Konfiguration vorhanden';
	$lang['strftsnodicts'] = 'Keine W&#246;rterb&#252;cher f&#252;r die Volltextsuche vorhanden.';
	$lang['strftsdictcreated'] = 'W&#246;rterbuch f&#252;r die Volltextsuche erstellt.';
	$lang['strftsdictcreatedbad'] = 'Erstellen des W&#246;rterbuches f&#252;r die Volltextsuche fehlgeschlagen.';
	$lang['strftslexize'] = 'Funktion zum Zerlegen in Lexeme';
	$lang['strftsinit'] = 'Initialisierungsfunktion';
	$lang['strftsoptionsvalues'] = 'Optionen und Werte';
	$lang['strftsdictneedsname'] = 'Sie m&#252;ssen f&#252;r das Volltextsuch-W&#246;rterbuch einen Namen angeben.';
	$lang['strftsdictdropped'] = 'W&#246;rterbuches f&#252;r die Volltextsuche gel&#246;scht.';
	$lang['strftsdictdroppedbad'] = 'L&#246;schen des W&#246;rterbuches f&#252;r die Volltextsuche fehlgeschlagen.';
	$lang['strftsdictaltered'] = 'W&#246;rterbuches f&#252;r die Volltextsuche ge&#228;ndert.';
	$lang['strftsdictalteredbad'] = '&#196;ndern des W&#246;rterbuches f&#252;r die Volltextsuche fehlgeschlagen.';
	$lang['strftsaddmapping'] = 'Neue Zuordnung hinzuf&#252;gen';
	$lang['strftsspecifymappingtodrop'] = 'Sie m&#252;ssen mindestens eine Zuordnung angeben, die gel&#246;scht werden soll.';
	$lang['strftsspecifyconfigtoalter'] = 'Sie m&#252;ssen eine Volltextsuch-Konfiguration angeben, die ge&#228;ndert werden soll';
	$lang['strftsmappingdropped'] = 'Volltextsuch-Zuordnung gel&#246;scht.';
	$lang['strftsmappingdroppedbad'] = 'L&#246;schen der Volltextsuch-Zuordnung fehlgeschlagen.';
	$lang['strftsnodictionaries'] = 'Keine W&#246;rterb&#252;cher gefunden.';
	$lang['strftsmappingaltered'] = 'Volltextsuch-Zuordnung ge&#228;ndert.';
	$lang['strftsmappingalteredbad'] = '&#196;ndern der Volltextsuch-Zuordnung fehlgeschlagen.';
	$lang['strftsmappingadded'] = 'Volltextsuch-Zuordnung hinzugef&#252;gt.';
	$lang['strftsmappingaddedbad'] = 'Hinzuf&#252;gen der Volltextsuch-Zuordnung fehlgeschlagen.';
	$lang['strftstabconfigs'] = 'Volltextsuch-Konfigurationen';
	$lang['strftstabdicts'] = 'W&#246;rterb&#252;cher';
	$lang['strftstabparsers'] = 'Parser';
?>
