<?php

	/**
	 * German Language file for phpPgAdmin.
	 * @maintainer H. Etzel [hetzel.devel@web.de]
	 *
	 * $Id: german.php,v 1.5 2003/04/28 11:50:18 chriskl Exp $
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
	$lang['strdrop'] = 'L&ouml;schen';
	$lang['strdropped'] = 'Gel&ouml;scht';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'zur&uuml;ck';
	$lang['strnext'] = 'weiter';
	$lang['strfailed'] = 'misslungen';
	$lang['strcreate'] = 'Erzeugen';
	$lang['strcreated'] = 'Erzeugt';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'L&auml;nge';
	$lang['strdefault'] = 'Vorgabe';
	$lang['stralter'] = '&Auml;ndern';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Abbruch';
	$lang['strsave'] = 'Speichern';
	$lang['strreset'] = 'Zur&uuml;cksetzen';
	$lang['strinsert'] = 'Einf&uuml;gen';
	$lang['strselect'] = 'Select-Abfrage';
	$lang['strdelete'] = 'L&ouml;schen';
	$lang['strupdate'] = 'Aktualisieren';
	$lang['strreferences'] = 'Referenzen';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nein';
	$lang['stredit'] = 'Bearbeiten';
	$lang['strcolumns'] = 'Spalten';
	$lang['strrows'] = 'Zeile(n)';
	$lang['strexample'] = 'z.B.';
	$lang['strback'] = 'Zur&uuml;ck';
	$lang['strqueryresults'] = 'Abfrageergebnis';
	$lang['strshow'] = 'Zeigen';
	$lang['strempty'] = 'Leeren';
	$lang['strlanguage'] = 'Sprache';
	$lang['strencoding'] = 'Codierung';
	$lang['strvalue'] = 'Wert';
	$lang['strunique'] = 'eindeutig';
	$lang['strprimary'] = 'Prim&auml;r';
	$lang['strexport'] = 'Exportieren';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analysieren';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindizierung';
	$lang['strrun'] = 'Los';
	$lang['stradd'] = 'Hinzuf&uuml;gen';
	$lang['strevent'] = 'Ereignis';
	$lang['strwhere'] = 'wo';
	$lang['strinstead'] = 'mache stattdessen';
	$lang['strwhen'] = 'Wann';
	$lang['strformat'] = 'Format';

        // Error handling
	$lang['strnoframes'] = 'F&uuml;r dieses Programm wird ein ein Frame-f&auml;higer Browser ben&ouml;tigt.';
	$lang['strbadconfig'] = 'Ihre config.inc.php ist nicht aktuell. Sie m&uuml;ssen die aus der config.inc.php-dist neu erzeugen.<br/>(Siehe auch INSTALL im Installationsverzeichnis von phpPgAdmin)';
	$lang['strnotloaded'] = 'Ihre PHP - Installation besitzt keine Datenbankunterst&uuml;tzung.';
	$lang['strbadschema'] = 'Unzul&auml;ssiges Schema angegeben.';
	$lang['strbadencoding'] = 'Abbruch beim Setzen der Benutzer-Codierung in der Datenbank.';
	$lang['strsqlerror'] = 'SQL Fehler:';
	$lang['strinstatement'] = 'In Anweisung:';
	$lang['strinvalidparam'] = 'Unz&uuml;l&auml;ssige Scriptparameter.';
	$lang['strnodata'] = 'Keine Zeilen gefunden.';

	// Tables
	$lang['strtable'] = 'Tabelle';
	$lang['strtables'] = 'Tabellen';
	$lang['strshowalltables'] = 'Zeige alle Tabellen';
	$lang['strnotables'] = 'Keine Tabellen gefunden.';
	$lang['strnotable'] = 'Keine Tabelle gefunden.';
	$lang['strcreatetable'] = 'Neue Tabelle erzeugen';
	$lang['strtablename'] = 'Tabellenname';
	$lang['strtableneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Tabelle einen Namen angeben.';
	$lang['strtableneedsfield'] = 'Sie m&uuml;ssen mindestens ein Feld angeben.';
	$lang['strtableneedscols'] = 'Sie m&uuml;ssen eine zul&auml;ssige Anzahl an Spalten angeben.';
	$lang['strtablecreated'] = 'Tabelle erzeugt.';
	$lang['strtablecreatedbad'] = 'Ergeugen der Tabelle fehlgeschlagen.';
	$lang['strconfdroptable'] = 'Sind Sie sicher, dass Sie die Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strtabledropped'] = 'Tabelle gel&ouml;scht.';
	$lang['strtabledroppedbad'] = 'L&ouml;schen der Tabelle fehlgeschlagen.';
	$lang['strconfemptytable'] = 'Sind Sie sicher, dass Sie den Tabelleninhalt der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strtableemptied'] = 'Tabelleninhalt gel&ouml;scht.';
	$lang['strtableemptiedbad'] = 'L&ouml;schen des Tabelleninhaltes fehlgeschlagen.';
	$lang['strinsertrow'] = 'Zeile einf&uuml;gen';
	$lang['strrowinserted'] = 'Zeile eingef&uuml;gt.';
	$lang['strrowinsertedbad'] = 'Einf&uuml;gen der Zeile fehlgeschlagen.';
	$lang['streditrow'] = 'Zeile bearbeiten';
	$lang['strrowupdated'] = 'Zeile aktualisiert.';
	$lang['strrowupdatedbad'] = 'Aktualisieren der Zeile fehlgeschlagen.';
	$lang['strdeleterow'] = 'Zeile l&ouml;schen';
	$lang['strconfdeleterow'] = 'Sind Sie sicher, dass Sie diese Zeile l&ouml;schen m&ouml;chten?';
	$lang['strrowdeleted'] = 'Zeile gel&ouml;scht.';
	$lang['strrowdeletedbad'] = 'L&ouml;schen der Zeile fehlgeschlagen.';
	$lang['strsaveandrepeat'] = 'Speichern und Wiederholen';
	$lang['strfield'] = 'Feld';
	$lang['strfields'] = 'Felder';
	$lang['strnumfields'] = 'Anz. der Felder';
	$lang['strfieldneedsname'] = 'Sie m&uuml;ssen f&uuml;r das Feld einen Namen angeben';
	$lang['strselectneedscol'] = 'Sie m&uuml;ssen mindestens eine Spalte anzeigen lassen';
	$lang['straltercolumn'] = 'Spalte &auml;ndern';
	$lang['strcolumnaltered'] = 'Spalte ge&auml;ndert.';
	$lang['strcolumnalteredbad'] = '&Auml;ndern der Spalte fehlgeschlagen.';
        $lang['strconfdropcolumn'] = 'Sind Sie sicher, dass Sie die Spalte &quot;%s&quot; aus der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strcolumndropped'] = 'Spalte gel&ouml;scht.';
	$lang['strcolumndroppedbad'] = 'L&ouml;schen der Spalte fehlgschlagen.';
	$lang['straddcolumn'] = 'Spalte hinzuf&uuml;gen';
	$lang['strcolumnadded'] = 'Spalte hinzugef&uuml;gt.';
	$lang['strcolumnaddedbad'] = 'Hinzuf&uuml;gen der Spalte fehlgeschlagen.';
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
	$lang['strexpires'] = 'G&uuml;ltig bis';
	$lang['strnousers'] = 'Keine Benutzer gefunden.';
        $lang['struserupdated'] = 'Benutzer aktualisiert.';
	$lang['struserupdatedbad'] = 'Aktualisieren des Benutzers fehlgeschlagen.';
	$lang['strshowallusers'] = 'Zeige alle Benutzer';
	$lang['strcreateuser'] = 'Erzeuge Benutzer';
	$lang['strusercreated'] = 'Benutzer erzeugt.';
	$lang['strusercreatedbad'] = 'Erzeugen des Benutzers fehlgeschlagen.';
	$lang['strconfdropuser'] = 'Sind Sie sicher, dass Sie den Benutzer &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['struserdropped'] = 'Benutzer gel&ouml;scht.';
	$lang['struserdroppedbad'] = 'L&ouml;schen des Benutzers fehlgeschlagen.';

	// Groups
	$lang['strgroupadmin'] = 'Gruppen-Administration';
	$lang['strgroup'] = 'Gruppe';
	$lang['strgroups'] = 'Gruppen';
	$lang['strnogroup'] = 'Gruppe nicht gefunden.';
	$lang['strnogroups'] = 'Keine Gruppen gefunden.';
	$lang['strcreategroup'] = 'Gruppe erzeugen';
	$lang['strshowallgroups'] = 'Alle Gruppen anzeigen';
	$lang['strgroupneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Gruppe einen Namen angeben.';
	$lang['strgroupcreated'] = 'Gruppe erzeugt.';
	$lang['strgroupcreatedbad'] = 'Erzeugen der Gruppe fehlgeschlagen.';
	$lang['strconfdropgroup'] = 'Sind Sie sicher, dass Sie die Gruppe &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strgroupdropped'] = 'Gruppe gel&ouml;scht.';
	$lang['strgroupdroppedbad'] = 'L&ouml;schen der Gruppe fehlgeschlagen.';
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
	$lang['strdatabaseneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Datenbank einen Namen angeben.';
	$lang['strdatabasecreated'] = 'Datenbank erzeugt.';
	$lang['strdatabasecreatedbad'] = 'Erzeugen der Datenbank fehlgeschlagen.';
	$lang['strconfdropdatabase'] = 'Sind Sie sicher, dass Sie die Datenbank &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strdatabasedropped'] = 'Datenbank gel&ouml;scht.';
	$lang['strdatabasedroppedbad'] = 'L&ouml;schen der Datenbank fehlgeschlagen.';
	$lang['strentersql'] = 'Auszuf&uuml;hrenden SQL-Code eingeben:';
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
	$lang['strviewneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Sicht einen Namen angeben.';
	$lang['strviewneedsdef'] = 'Sie m&uuml;ssen f&uuml;r die Sicht eine Definition angeben.';
	$lang['strviewcreated'] = 'Sicht erzeugt.';
	$lang['strviewcreatedbad'] = 'Erzeugen der Sicht fehlgeschlagen.';
	$lang['strconfdropview'] = 'Sind Sie sicher, dass Sie die Sicht &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strviewdropped'] = 'Sicht gel&ouml;scht.';
	$lang['strviewdroppedbad'] = 'L&ouml;schen der Sicht fehlgeschlagen.';
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
	$lang['strincrementby'] = 'Erh&ouml;hung um';
	$lang['strstartvalue'] = 'Startwert';
	$lang['strmaxvalue'] = 'Max. Wert';
	$lang['strminvalue'] = 'Min. Wert';
//	$lang['strcachevalue'] = 'Cache Value';
	$lang['strlogcount'] = 'Log Anz.';
	$lang['striscycled'] = 'Zyklisch?';
	$lang['striscalled'] = 'Aufgerufen?';
	$lang['strsequenceneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Sequenz einen Namen angeben.';
	$lang['strsequencecreated'] = 'Sequenz erzeugt.';
	$lang['strsequencecreatedbad'] = 'Erzeugen der Sequenz fehlgeschlagen.';
	$lang['strconfdropsequence'] = 'Sind Sie sicher, dass die die Sequenz &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strsequencedropped'] = 'Sequenz gel&ouml;scht.';
	$lang['strsequencedroppedbad'] = 'L&ouml;schen der Sequenz fehlgeschlagen.';

	// Indexes
	$lang['strindexes'] = 'Indizes';
	$lang['strindexname'] = 'Index Name';
	$lang['strshowallindexes'] = 'Zeige alle Indizes';
	$lang['strnoindex'] = 'Kein Index gefunden.';
	$lang['strnoindexes'] = 'Keine Indizes gefunden.';
	$lang['strcreateindex'] = 'Index erzeugen';
	$lang['strtabname'] = 'Tab. Name';
	$lang['strcolumnname'] = 'Spalten Name';
	$lang['strindexneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Index einen Namen angeben.';
	$lang['strindexneedscols'] = 'Sie m&uuml;ssen eine zul&auml;ssige Anzahl an Spalten angeben.';
	$lang['strindexcreated'] = 'Index erzeugt';
	$lang['strindexcreatedbad'] = 'Erzeugen des Indizes fehlgeschlagen.';
	$lang['strconfdropindex'] = 'Sind Sie sicher, dass sie den Index &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strindexdropped'] = 'Index gel&ouml;scht.';
	$lang['strindexdroppedbad'] = 'L&ouml;schen des Indizes fehlgeschlagen.';
	$lang['strkeyname'] = 'Schl&uuml;ssel Name';
	$lang['struniquekey'] = 'Eindeutiger Schl&uuml;ssel';
	$lang['strprimarykey'] = 'Prim&auml;rer Schl&uuml;ssel';
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
	$lang['strruleneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Regel einen Namen angeben.';
	$lang['strrulecreated'] = 'Regel erzeugt.';
	$lang['strrulecreatedbad'] = 'Erzeugen der Regel fehlgeschlagen.';
	$lang['strconfdroprule'] = 'Sind Sie sicher, dass Sie die Regel &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strruledropped'] = 'Regel gel&ouml;scht.';
	$lang['strruledroppedbad'] = 'L&ouml;schen der Regel fehlgeschlagen.';

	// Constraints
	$lang['strconstraints'] = 'Constraints';
	$lang['strshowallconstraints'] = 'Zeige alle Constraints';
	$lang['strnoconstraints'] = 'Keine Constraints gefunden.';
	$lang['strcreateconstraint'] = 'Erzeuge constraint';
	$lang['strconstraintcreated'] = 'Constraint erzeugt.';
	$lang['strconstraintcreatedbad'] = 'Erzeugen des Constraints fehlgeschlagen.';
	$lang['strconfdropconstraint'] = 'Sind Sie sicher, dass Sie den Constraint &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strconstraintdropped'] = 'Constraint gel&ouml;scht.';
	$lang['strconstraintdroppedbad'] = 'L&ouml;schen des Constraint fehlgeschlagen.';
	$lang['straddcheck'] = 'Check Constraint hinzuf&uuml;gen';
	$lang['strcheckneedsdefinition'] = 'Check Constraint braucht eine Definition.';
	$lang['strcheckadded'] = 'CheckCconstraint hinzugef&uuml;gt.';
	$lang['strcheckaddedbad'] = 'Hinzuf&uuml;gen des Check Constraints fehlgeschlagen.';
	$lang['straddpk'] = 'Prim&auml;r-Schl&uuml;ssel hinzuf&uuml;gen';
	$lang['strpkneedscols'] = 'Ein Prim&auml;r-Schl&uuml;ssel ben&ouml;tigt mindestens eine Spalte.';
	$lang['strpkadded'] = 'Prim&auml;r-Schl&uuml;ssel hinzugef&uuml;gt.';
	$lang['strpkaddedbad'] = 'Hinzuf&uuml;gen des Prim&auml;r-Schl&uuml;ssels fehlgeschlagen.';
	$lang['stradduniq'] = 'Eindeutigen Schl&uuml;ssel (unique key) hinzuf&uuml;gen';
	$lang['struniqneedscols'] = 'Ein eindeutiger Schl&uuml;ssel (Unique Key) ben&ouml;tigt mindestens eine Spalte.';
	$lang['struniqadded'] = 'Eindeutiger Schl&uuml;ssel (Unique Key) hinzugef&uuml;gt.';
	$lang['struniqaddedbad'] = 'Hinzuf&uuml;gen eines eindeutigen Schl&uuml;ssels (Unique Key) fehlgeschlagen.';
	$lang['straddfk'] = 'Fremd-Schl&uuml;ssel hinzuf&uuml;gen';
	$lang['strfkneedscols'] = 'Ein Fremd-Schl&uuml;ssel ben&ouml;tigt mindestens eine Spalte.';
	$lang['strfkadded'] = 'Fremd-Schl&uuml;ssel hinzugef&uuml;gt.';
	$lang['strfkaddedbad'] = 'Hinzuf&uuml;gen eines Fremd-Schl&uuml;ssels fehlgeschlagen.';
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
	$lang['strfunctionneedsname'] = 'Sie m&uuml;ssen f&uuml;r die Funktion einen Namen angeben.';
	$lang['strfunctionneedsdef'] = 'Sie m&uuml;ssen f&uuml;r die Funktion eine Definition angeben.';
	$lang['strfunctioncreated'] = 'Funktion erzeugt.';
	$lang['strfunctioncreatedbad'] = 'Erzeugen der Funktion fehlgeschlagen.';
	$lang['strconfdropfunction'] = 'Sind Sie sicher, dass sie die Funktion &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strfunctiondropped'] = 'Funktion gel&ouml;scht.';
	$lang['strfunctiondroppedbad'] = 'L&ouml;schen der Funktion fehlgeschlagen.';
	$lang['strfunctionupdated'] = 'Funktion aktualisiert.';
	$lang['strfunctionupdatedbad'] = 'Aktualiseren der Funktion fehlgeschlagen.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Trigger';
	$lang['strshowalltriggers'] = 'Zeige alle Trigger';
	$lang['strnotrigger'] = 'Kein Trigger gefunden.';
	$lang['strnotriggers'] = 'Keine Trigger gefunden.';
	$lang['strcreatetrigger'] = 'Trigger erzeugen';
	$lang['strtriggerneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Trigger einen Namen angeben.';
	$lang['strtriggerneedsfunc'] = 'Sie m&uuml;ssen f&uuml;r den Trigger eine Funktion angeben.';
	$lang['strtriggercreated'] = 'Trigger erzeugt.';
	$lang['strtriggercreatedbad'] = 'Erzeugen des Triggers fehlgeschlagen.';
	$lang['strconfdroptrigger'] = 'Sind Sie sicher, dass Sie den Trigger &quot;%s&quot; in der Tabelle &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strtriggerdropped'] = 'Trigger gel&ouml;scht.';
	$lang['strtriggerdroppedbad'] = 'L&ouml;schen des Triggers fehlgeschlagen.';

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
//	$lang['strpassbyval'] = 'Passed by val?';
//	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Trennzeichen';
	$lang['strstorage'] = 'Speicherung';
	$lang['strtypeneedsname'] = 'Sie m&uuml;ssen einen Namen f&uuml;r den Datentyp angeben.';
	$lang['strtypeneedslen'] = 'Sie m&uuml;ssen eine L&auml;nge f&uuml;r den Datentyp angeben.';
	$lang['strtypecreated'] = 'Datentyp erzeugt.';
	$lang['strtypecreatedbad'] = 'Erzeugen des Datentypen fehlgeschlagen.';
	$lang['strconfdroptype'] = 'Sind Sie sicher, dass Sie den Datentypen &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strtypedropped'] = 'Datentyp gel&ouml;scht.';
	$lang['strtypedroppedbad'] = 'L&ouml;schen des Datentypen fehlgeschlagen.';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemas';
	$lang['strshowallschemas'] = 'Zeige alle Schemas';
	$lang['strnoschema'] = 'Kein Schema gefunden.';
	$lang['strnoschemas'] = 'Keine Schemas gefunden.';
	$lang['strcreateschema'] = 'Schema erzeugen';
	$lang['strschemaname'] = 'Schema Name';
	$lang['strschemaneedsname'] = 'Sie m&uuml;ssen f&uuml;r das Schema einen Namen angeben.';
	$lang['strschemacreated'] = 'Schema erzeugt';
	$lang['strschemacreatedbad'] = 'Erzeugen des Schemas fehlgeschlagen.';
	$lang['strconfdropschema'] = 'Sind Sie sicher, dass sie das Schema &quot;%s&quot; l&ouml;schen m&ouml;chten?';
	$lang['strschemadropped'] = 'Schema gel&ouml;scht.';
	$lang['strschemadroppedbad'] = 'L&ouml;schen des Schemas fehlgeschlagen';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reporte';
	$lang['strshowallreports'] = 'Zeige alle Reporte';
	$lang['strnoreports'] = 'Keione Reporte gefunden.';
	$lang['strcreatereport'] = 'Report erzeugen';
	$lang['strreportdropped'] = 'Report gel&ouml;scht.';
	$lang['strreportdroppedbad'] = 'L&ouml;schen des Reports fehlgeschlagen.';
	$lang['strconfdropreport'] = 'Sind Sie sicher, dass Sie den Report &quot;%s&quot; l&ouml;schen wollen?';
	$lang['strreportneedsname'] = 'Sie m&uuml;ssen f&uuml;r den Report einen Namen angeben.';
	$lang['strreportneedsdef'] = 'Sie m&uuml;ssen SQL-Code f&uuml;r den Report eingeben.';
	$lang['strreportcreated'] = 'Report gespeichert.';
	$lang['strreportcreatedbad'] = 'Speichern des Reports fehlgeschlagen.';

	// Miscellaneous
	$lang['strtopbar'] = '%s l&auml;uft auf host:%s port:%s -- Sie sind angemeldet als Benutzer &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'j. M Y H:i:s';


?>
