<?php

	/**
	 * Italian language file, based on the english language file for phpPgAdmin.
	 * Nicola Soranzo [nsoranzo@tiscali.it]
	 *
	 * $Id: italian.php,v 1.46 2007/07/19 03:11:52 xzilla Exp $
	 */

	// Language and character set - Lingua e set di caratteri
	$lang['applang'] = 'Italiano';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'it_IT';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome - Benvenuto
	$lang['strintro'] = 'Benvenuto in phpPgAdmin.';
	$lang['strppahome'] = 'Homepage di phpPgAdmin';
	$lang['strpgsqlhome'] = 'Homepage di PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentazione su PostgreSQL (locale)';
	$lang['strreportbug'] = 'Riferisci un bug';
	$lang['strviewfaq'] = 'Visualizza le FAQ (domande ricorrenti) on line';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings - Stringhe basilari
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Login fallito';
	$lang['strlogindisallowed'] = 'Login disabilitato per ragioni di sicurezza';
	$lang['strserver'] = 'Server';
	$lang['strservers'] = 'Server';
	$lang['strintroduction'] = 'Introduzione';
	$lang['strhost'] = 'Host';
	$lang['strport'] = 'Porta';
	$lang['strlogout'] = 'Logout';
	$lang['strowner'] = 'Proprietario';
	$lang['straction'] = 'Azione';
	$lang['stractions'] = 'Azioni';
	$lang['strname'] = 'Nome';
	$lang['strdefinition'] = 'Definizione';
	$lang['strproperties'] = 'Propriet&#224;';
	$lang['strbrowse'] = 'Visualizza';
	$lang['strenable'] = 'Abilita';
	$lang['strdisable'] = 'Disabilita';
	$lang['strdrop'] = 'Elimina';
	$lang['strdropped'] = 'Eliminato';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Non Nullo';
	$lang['strprev'] = '&lt; Prec.';
	$lang['strnext'] = 'Succ. &gt;';
	$lang['strfirst'] = '&lt;&lt; Primo';
	$lang['strlast'] = 'Ultimo &gt;&gt;';
	$lang['strfailed'] = 'Fallito';
	$lang['strcreate'] = 'Crea';
	$lang['strcreated'] = 'Creato';
	$lang['strcomment'] = 'Commento';
	$lang['strlength'] = 'Lunghezza';
	$lang['strdefault'] = 'Default';
	$lang['stralter'] = 'Modifica';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Annulla';
	$lang['strac'] = 'Abilita autocompletamento';
	$lang['strsave'] = 'Salva';
	$lang['strreset'] = 'Reset';
	$lang['strinsert'] = 'Inserisci';
	$lang['strselect'] = 'Seleziona';
	$lang['strdelete'] = 'Cancella';
	$lang['strupdate'] = 'Aggiorna';
	$lang['strreferences'] = 'Riferimenti';
	$lang['stryes'] = 'Si';
	$lang['strno'] = 'No';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
	$lang['stredit'] = 'Modifica';
	$lang['strcolumn'] = 'Colonna';
	$lang['strcolumns'] = 'Colonne';
	$lang['strrows'] = 'riga(ghe)';
	$lang['strrowsaff'] = 'riga(ghe) interessata(e).';
	$lang['strobjects'] = 'oggetto(i)';
	$lang['strback'] = 'Indietro';
	$lang['strqueryresults'] = 'Risultato Query';
	$lang['strshow'] = 'Mostra';
	$lang['strempty'] = 'Svuota';
	$lang['strlanguage'] = 'Lingua';
	$lang['strencoding'] = 'Codifica';
	$lang['strvalue'] = 'Valore';
	$lang['strunique'] = 'Univoco';
	$lang['strprimary'] = 'Primaria';
	$lang['strexport'] = 'Esporta';
	$lang['strimport'] = 'Importa';
	$lang['strallowednulls'] = 'Caratteri NULL consentiti';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Stringa vuota';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Amministratore';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analizza';
	$lang['strclusterindex'] = 'Clusterizza';
	$lang['strclustered'] = 'Clusterizzato?';
	$lang['strreindex'] = 'Reindicizza';
	$lang['strexecute'] = 'Esegui';
	$lang['stradd'] = 'Aggiungi';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'Condizione';
	$lang['strinstead'] = 'Invece fai';
	$lang['strwhen'] = 'Quando';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Dati';
	$lang['strconfirm'] = 'Conferma';
	$lang['strexpression'] = 'Espressione';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Espandi';
	$lang['strcollapse'] = 'Raccogli';
	$lang['strexplain'] = 'Explain';
	$lang['strexplainanalyze'] = 'Explain Analyze';
	$lang['strfind'] = 'Trova';
	$lang['stroptions'] = 'Opzioni';
	$lang['strrefresh'] = 'Ricarica';
	$lang['strdownload'] = 'Scarica';
	$lang['strdownloadgzipped'] = 'Scarica compresso con gzip';
	$lang['strinfo'] = 'Informazioni';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avanzato';
	$lang['strvariables'] = 'Variabili';
	$lang['strprocess'] = 'Processo';
	$lang['strprocesses'] = 'Processi';
	$lang['strsetting'] = 'Valore';
	$lang['streditsql'] = 'Modifica SQL';
	$lang['strruntime'] = 'Tempo di esecuzione totale: %s ms';
	$lang['strpaginate'] = 'Dividi in pagine i risultati';
	$lang['struploadscript'] = 'oppure esegui l\'upload di uno script SQL:';
	$lang['strstarttime'] = 'Inizio';
	$lang['strfile'] = 'File';
	$lang['strfileimported'] = 'File importato.';
	$lang['strtrycred'] = 'Usa queste credenziali per tutti i server';
	$lang['stractionsonmultiplelines'] = 'Azioni su righe multiple';
	$lang['strselectall'] = 'Seleziona tutti';
	$lang['strunselectall'] = 'Deseleziona tutti';

	// Database sizes - Dimensioni dei database
	$lang['strsize'] = 'Dimensione';
	$lang['strbytes'] = 'byte';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling - Gestione degli errori
	$lang['strnoframes'] = 'Questa applicazione funziona al meglio utilizzando un browser che supporti i frame, ma pu&#242; essere usata senza frame seguendo il link sottostante.';
	$lang['strnoframeslink'] = 'Usa senza frame';
	$lang['strbadconfig'] = 'Il file config.inc.php &#232; obsoleto. &#200; necessario rigenerarlo utilizzando il nuovo file config.inc.php-dist .';
	$lang['strnotloaded'] = 'La tua installazione di PHP non supporta PostgreSQL. &#200; necessario ricompilare PHP usando l\'opzione di configurazione --with-pgsql .';
	$lang['strpostgresqlversionnotsupported'] = 'Versione di PostgreSQL non supportata. &#200; necessario aggiornarlo alla versione %s o successiva.';
	$lang['strbadschema'] = 'Schema specificato non valido.';
	$lang['strbadencoding'] = 'Impostazione della codifica del client nel database fallito.';
	$lang['strsqlerror'] = 'Errore SQL:';
	$lang['strinstatement'] = 'Nel costrutto:';
	$lang['strinvalidparam'] = 'Parametri di script non validi.';
	$lang['strnodata'] = 'Nessuna riga trovata.';
	$lang['strnoobjects'] = 'Nessun oggetto trovato.';
	$lang['strrownotunique'] = 'Nessun identificatore univoco per questa riga.';
	$lang['strnoreportsdb'] = 'Non &#232; stato creato il database dei report. Leggere il file INSTALL per istruzioni.';
	$lang['strnouploads'] = 'L\'upload dei file &#232; disabilitato.';
	$lang['strimporterror'] = 'Errore durante l\'import.';
	$lang['strimporterror-fileformat'] = 'Errore durante l\'import: determinazione automatica del formato del file fallita.';
	$lang['strimporterrorline'] = 'Errore durante l\'import alla linea %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Errore durante l\'import alla linea %s: la linea non possiede il numero corretto di colonne.';
	$lang['strimporterror-uploadedfile'] = 'Errore durante l\'import: non &#232; stato possibile caricare il file sul server';
	$lang['strcannotdumponwindows'] = 'Il dump di nomi complessi di tabelle o schemi sotto Windows non &#232; supportato.';
	$lang['strinvalidserverparam'] = 'Tentativo di connessione al server con parametri non validi, &#232; possibile che qualcuno stia cercando di forzare il sistema.';

	// Tables - Tabelle
	$lang['strtable'] = 'Tabella';
	$lang['strtables'] = 'Tabelle';
	$lang['strshowalltables'] = 'Mostra tutte le tabelle';
	$lang['strnotables'] = 'Nessuna tabella trovata.';
	$lang['strnotable'] = 'Tabella non trovata.';
	$lang['strcreatetable'] = 'Crea tabella';
	$lang['strtablename'] = 'Nome tabella';
	$lang['strtableneedsname'] = '&#200; necessario specificare un nome per la tabella.';
	$lang['strtableneedsfield'] = '&#200; necessario specificare almeno un campo.';
	$lang['strtableneedscols'] = '&#200; necessario specificare un numero di colonne valido.';
	$lang['strtablecreated'] = 'Tabella creata.';
	$lang['strtablecreatedbad'] = 'Creazione della tabella fallita.';
	$lang['strconfdroptable'] = 'Eliminare la tabella &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabella eliminata.';
	$lang['strtabledroppedbad'] = 'Eliminazione della tabella fallita.';
	$lang['strconfemptytable'] = 'Svuotare la tabella &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabella svuotata.';
	$lang['strtableemptiedbad'] = 'Svuotamento della tabella fallito.';
	$lang['strinsertrow'] = 'Inserisci riga';
	$lang['strrowinserted'] = 'Riga inserita.';
	$lang['strrowinsertedbad'] = 'Inserimento della riga fallito.';
	$lang['strrowduplicate'] = 'Inserimento della riga fallito, tentativo di eseguire un inserimento duplicato.';
	$lang['streditrow'] = 'Modifica riga';
	$lang['strrowupdated'] = 'Riga aggiornata.';
	$lang['strrowupdatedbad'] = 'Aggiornamento della riga fallito.';
	$lang['strdeleterow'] = 'Cancella riga';
	$lang['strconfdeleterow'] = 'Cancellare questa riga?';
	$lang['strrowdeleted'] = 'Riga cancellata.';
	$lang['strrowdeletedbad'] = 'Cancellazione della riga fallita.';
	$lang['strinsertandrepeat'] = 'Inserisci e ripeti';
	$lang['strnumcols'] = 'Numero di colonne';
	$lang['strcolneedsname'] = '&#200; necessario specificare un nome per la colonna';
	$lang['strselectallfields'] = 'Seleziona tutti i campi';
	$lang['strselectneedscol'] = '&#200; necessario scegliere almeno una colonna.';
	$lang['strselectunary'] = 'Gli operatori unari non possono avere un valore.';
	$lang['strcolumnaltered'] = 'Colonna modificata.';
	$lang['strcolumnalteredbad'] = 'Modifica della colonna fallita.';
	$lang['strconfdropcolumn'] = 'Eliminare la colonna &quot;%s&quot; dalla tabella &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Colonna eliminata.';
	$lang['strcolumndroppedbad'] = 'Eliminazione della colonna fallita.';
	$lang['straddcolumn'] = 'Aggiungi colonna';
	$lang['strcolumnadded'] = 'Colonna aggiunta.';
	$lang['strcolumnaddedbad'] = 'Aggiunta della colonna fallita.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabella modificata.';
	$lang['strtablealteredbad'] = 'Modifica della tabella fallita.';
	$lang['strdataonly'] = 'Solo i dati';
	$lang['strstructureonly'] = 'Solo la struttura';
	$lang['strstructureanddata'] = 'Struttura e dati';
	$lang['strtabbed'] = 'Tabulato';
	$lang['strauto'] = 'Auto';
	$lang['strconfvacuumtable'] = 'Effettuare il vacuum su &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Numero stimato di righe';
	$lang['strspecifytabletoanalyze'] = '&#200; necessario specificare almeno una tabella da analizzare';

	// Colonne - Columns
	$lang['strcolprop'] = 'Propriet&#224; della colonna';

	// Users - Utenti
	$lang['struser'] = 'Utente';
	$lang['strusers'] = 'Utenti';
	$lang['strusername'] = 'Username';
	$lang['strpassword'] = 'Password';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Pu&#242; creare DB?';
	$lang['strexpires'] = 'Scadenza';
	$lang['strsessiondefaults'] = 'Defaults della sessione';
	$lang['strnousers'] = 'Nessun utente trovato';
	$lang['struserupdated'] = 'Utente aggiornato.';
	$lang['struserupdatedbad'] = 'Aggiornamento utente fallito.';
	$lang['strshowallusers'] = 'Mostra tutti gli utenti';
	$lang['strcreateuser'] = 'Crea utente';
	$lang['struserneedsname'] = '&#200; necessario specificare un nome per l\'utente.';
	$lang['strusercreated'] = 'Utente creato.';
	$lang['strusercreatedbad'] = 'Creazione dell\'utente fallita.';
	$lang['strconfdropuser'] = 'Eliminare l\'utente &quot;%s&quot;?';
	$lang['struserdropped'] = 'Utente eliminato.';
	$lang['struserdroppedbad'] = 'Eliminazione dell\'utente fallita.';
	$lang['straccount'] = 'Account';
	$lang['strchangepassword'] = 'Modifica password';
	$lang['strpasswordchanged'] = 'Password modificata.';
	$lang['strpasswordchangedbad'] = 'Modifica della password fallita.';
	$lang['strpasswordshort'] = 'La password &#232; troppo corta.';
	$lang['strpasswordconfirm'] = 'Le due password non coincidono.';

	// Groups - Gruppi
	$lang['strgroup'] = 'Gruppo';
	$lang['strgroups'] = 'Gruppi';
	$lang['strshowallgroups'] = 'Mostra tutti i gruppi';
	$lang['strnogroup'] = 'Gruppo non trovato.';
	$lang['strnogroups'] = 'Nessun gruppo trovato.';
	$lang['strcreategroup'] = 'Crea gruppo';
	$lang['strgroupneedsname'] = '&#200; necessario specificare un nome per il gruppo.';
	$lang['strgroupcreated'] = 'Gruppo creato.';
	$lang['strgroupcreatedbad'] = 'Creazione del gruppo fallita.';
	$lang['strconfdropgroup'] = 'Eliminare il gruppo &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Gruppo eliminato.';
	$lang['strgroupdroppedbad'] = 'Eliminazione del gruppo fallita.';
	$lang['strmembers'] = 'Membri';
	$lang['strmemberof'] = 'Membro di';
	$lang['stradminmembers'] = 'Membri amministratore';
	$lang['straddmember'] = 'Aggiungi membro';
	$lang['strmemberadded'] = 'Membro aggiunto.';
	$lang['strmemberaddedbad'] = 'Aggiunta del membro fallita.';
	$lang['strdropmember'] = 'Elimina membro';
	$lang['strconfdropmember'] = 'Eliminare il membro &quot;%s&quot; dal gruppo &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Membro eliminato.';
	$lang['strmemberdroppedbad'] = 'Eliminazione del membro fallita.';

	// Ruoli - Roles
	$lang['strrole'] = 'Ruolo';
	$lang['strroles'] = 'Ruoli';
	$lang['strshowallroles'] = 'Mostra tutti i ruoli';
	$lang['strnoroles'] = 'Nessun ruolo trovato.';
	$lang['strinheritsprivs'] = 'Eredita i privilegi?';
	$lang['strcreaterole'] = 'Crea ruolo';
	$lang['strcancreaterole'] = 'Pu&#242; creare ruoli?';
	$lang['strrolecreated'] = 'Ruolo creato.';
	$lang['strrolecreatedbad'] = 'Creazione del ruolo fallita.';
	$lang['strrolealtered'] = 'Ruolo modificato.';
	$lang['strrolealteredbad'] = 'Modifica del ruolo fallita.';
	$lang['strcanlogin'] = 'Pu&#242; effettuare login?';
	$lang['strconnlimit'] = 'Limite alle connessioni';
	$lang['strdroprole'] = 'Elimina ruolo';
	$lang['strconfdroprole'] = 'Eliminare il ruolo &quot;%s&quot;?';
	$lang['strroledropped'] = 'Ruolo eliminato.';
	$lang['strroledroppedbad'] = 'Eliminazione del ruolo fallita.';
	$lang['strnolimit'] = 'Nessun limite';
	$lang['strnever'] = 'Mai';
	$lang['strroleneedsname'] = '&#200; necessario specificare un nome per il ruolo.';

	// Privileges - Privilegi
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegi';
	$lang['strnoprivileges'] = 'Questo oggetto di default ha i privilegi del proprietario.';
	$lang['strgrant'] = 'Concedi';
	$lang['strrevoke'] = 'Revoca';
	$lang['strgranted'] = 'Privilegi concessi.';
	$lang['strgrantfailed'] = 'Concessione dei privilegi fallita.';
	$lang['strgrantbad'] = '&#200; necessario specificare almeno un utente o gruppo ed almeno un privilegio.';
	$lang['strgrantor'] = 'Concedente';
	$lang['strasterisk'] = '*';

	// Databases - Database
	$lang['strdatabase'] = 'Database';
	$lang['strdatabases'] = 'Database';
	$lang['strshowalldatabases'] = 'Mostra tutti i database';
	$lang['strnodatabases'] = 'Nessun database trovato.';
	$lang['strcreatedatabase'] = 'Crea database';
	$lang['strdatabasename'] = 'Nome del database';
	$lang['strdatabaseneedsname'] = '&#200; necessario specificare un nome per il database.';
	$lang['strdatabasecreated'] = 'Database creato.';
	$lang['strdatabasecreatedbad'] = 'Creazione del database fallita.';
	$lang['strconfdropdatabase'] = 'Eliminare il database &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Database eliminato.';
	$lang['strdatabasedroppedbad'] = 'Eliminazione del database fallita.';
	$lang['strentersql'] = 'Inserire la query SQL da eseguire qui sotto:';
	$lang['strsqlexecuted'] = 'SQL eseguito.';
	$lang['strvacuumgood'] = 'Vacuum completato.';
	$lang['strvacuumbad'] = 'Vacuum fallito.';
	$lang['stranalyzegood'] = 'Analyze completato.';
	$lang['stranalyzebad'] = 'Analyze fallito';
	$lang['strreindexgood'] = 'Reindicizzamento completato.';
	$lang['strreindexbad'] = 'Reindicizzamento fallito.';
	$lang['strfull'] = 'Completo';
	$lang['strfreeze'] = 'Freeze';
	$lang['strforce'] = 'Forza';
	$lang['strsignalsent'] = 'Segnale inviato.';
	$lang['strsignalsentbad'] = 'Invio del segnale fallito.';
	$lang['strallobjects'] = 'Tutti gli oggetti';
	$lang['strdatabasealtered'] = 'Database modificato.';
	$lang['strdatabasealteredbad'] = 'Modifica del database fallita.';

	// Views - Viste
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Viste';
	$lang['strshowallviews'] = 'Mostra tutte le viste';
	$lang['strnoview'] = 'Vista non trovata.';
	$lang['strnoviews'] = 'Nessuna vista trovata.';
	$lang['strcreateview'] = 'Crea vista';
	$lang['strviewname'] = 'Nome vista';
	$lang['strviewneedsname'] = '&#200; necessario specificare un nome per la vista.';
	$lang['strviewneedsdef'] = '&#200; necessario specificare una definizione per la vista.';
	$lang['strviewneedsfields'] = '&#200; necessario specificare le colonne da selezionare nella vista.';
	$lang['strviewcreated'] = 'Vista creata.';
	$lang['strviewcreatedbad'] = 'Creazione della vista fallita.';
	$lang['strconfdropview'] = 'Eliminare la vista &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vista eliminata.';
	$lang['strviewdroppedbad'] = 'Eliminazione della vista fallita.';
	$lang['strviewupdated'] = 'Vista aggiornata.';
	$lang['strviewupdatedbad'] = 'Aggiornamento della vista fallito.';
	$lang['strviewlink'] = 'Chiavi collegate';
	$lang['strviewconditions'] = 'Condizioni aggiuntive';
	$lang['strcreateviewwiz'] = 'Crea vista tramite wizard';

	// Sequences - Sequenze
	$lang['strsequence'] = 'Sequenza';
	$lang['strsequences'] = 'Sequenze';
	$lang['strshowallsequences'] = 'Mostra tutte le sequenze';
	$lang['strnosequence'] = 'Sequenza non trovata.';
	$lang['strnosequences'] = 'Nessuna sequenza trovata.';
	$lang['strcreatesequence'] = 'Crea sequenza';
	$lang['strlastvalue'] = 'Ultimo valore';
	$lang['strincrementby'] = 'Incrementa di';
	$lang['strstartvalue'] = 'Valore iniziale';
	$lang['strmaxvalue'] = 'Valore massimo';
	$lang['strminvalue'] = 'Valore minimo';
	$lang['strcachevalue'] = 'Valori in cache';
	$lang['strcancycle'] = 'Pu&#242; ricominciare?';
	$lang['striscalled'] = 'Incrementer&#224; l\'ultimo valore prima di ritornare il prossimo valore (is_called)?';
	$lang['strsequenceneedsname'] = '&#200; necessario specificare un nome per la sequenza.';
	$lang['strsequencecreated'] = 'Sequenza creata.';
	$lang['strsequencecreatedbad'] = 'Creazione della sequenza fallita.';
	$lang['strconfdropsequence'] = 'Eliminare la sequenza &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sequenza eliminata.';
	$lang['strsequencedroppedbad'] = 'Eliminazione della sequenza fallita.';
	$lang['strsequencereset'] = 'Reset della sequenza effettuato.';
	$lang['strsequenceresetbad'] = 'Reset della sequenza fallito.';
 	$lang['strsequencealtered'] = 'Sequenza modificata.';
 	$lang['strsequencealteredbad'] = 'Modifica della sequenza fallita.';
 	$lang['strsetval'] = 'Imposta valore';
 	$lang['strsequencesetval'] = 'Valore della sequenza impostato.';
 	$lang['strsequencesetvalbad'] = 'Impostazione del valore della sequenza fallito.';
 	$lang['strnextval'] = 'Incrementa valore';
 	$lang['strsequencenextval'] = 'Sequenza incrementata.';
 	$lang['strsequencenextvalbad'] = 'Incremento della sequenza fallito.';

	// Indexes - Indici
	$lang['strindex'] = 'Indice';
	$lang['strindexes'] = 'Indici';
	$lang['strindexname'] = 'Nome dell\'indice';
	$lang['strshowallindexes'] = 'Mostra tutti gli indici';
	$lang['strnoindex'] = 'Indice non trovato.';
	$lang['strnoindexes'] = 'Nessun indice trovato.';
	$lang['strcreateindex'] = 'Crea Indice';
	$lang['strtabname'] = 'Nome del tab';
	$lang['strcolumnname'] = 'Nome della colonna';
	$lang['strindexneedsname'] = '&#200; necessario specificare un nome per l\'indice';
	$lang['strindexneedscols'] = 'Gli indici richiedono di un numero valido di colonne.';
	$lang['strindexcreated'] = 'Indice creato';
	$lang['strindexcreatedbad'] = 'Creazione indice fallita.';
	$lang['strconfdropindex'] = 'Eliminare l\'indice &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Indice eliminato.';
	$lang['strindexdroppedbad'] = 'Eliminazione dell\'indice fallita.';
	$lang['strkeyname'] = 'Nome della chiave';
	$lang['struniquekey'] = 'Chiave Univoca';
	$lang['strprimarykey'] = 'Chiave Primaria';
	$lang['strindextype'] = 'Tipo di indice';
	$lang['strtablecolumnlist'] = 'Colonne nella tabella';
	$lang['strindexcolumnlist'] = 'Colonne nell\'indice';
	$lang['strconfcluster'] = 'Clusterizzare &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Clusterizzazione completata.';
	$lang['strclusteredbad'] = 'Clusterizzazione fallita.';

	// Rules - Regole
	$lang['strrules'] = 'Regole';
	$lang['strrule'] = 'Regola';
	$lang['strshowallrules'] = 'Mostra tutte le regole';
	$lang['strnorule'] = 'Regola non trovata.';
	$lang['strnorules'] = 'Nessuna regola trovata.';
	$lang['strcreaterule'] = 'Crea regola';
	$lang['strrulename'] = 'Nome della regola';
	$lang['strruleneedsname'] = '&#200; necessario specificare un nome per la regola.';
	$lang['strrulecreated'] = 'Regola creata.';
	$lang['strrulecreatedbad'] = 'Creazione della regola fallita.';
	$lang['strconfdroprule'] = 'Eliminare la regola &quot;%s&quot; su &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regola eliminata.';
	$lang['strruledroppedbad'] = 'Eliminazione della regola fallita.';

	// Constraints - Vincoli
	$lang['strconstraint'] = 'Vincolo';
	$lang['strconstraints'] = 'Vincoli';
	$lang['strshowallconstraints'] = 'Mostra tutti i vincoli';
	$lang['strnoconstraints'] = 'Nessun vincolo trovato.';
	$lang['strcreateconstraint'] = 'Crea vincolo';
	$lang['strconstraintcreated'] = 'Vincolo creato.';
	$lang['strconstraintcreatedbad'] = 'Creazione del vincolo fallita.';
	$lang['strconfdropconstraint'] = 'Eliminare il vincolo &quot;%s&quot; su &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Vincolo eliminato.';
	$lang['strconstraintdroppedbad'] = 'Eliminazione vincolo fallita.';
	$lang['straddcheck'] = 'Aggiungi un Check';
	$lang['strcheckneedsdefinition'] = 'Il vincolo Check necessita di una definizione.';
	$lang['strcheckadded'] = 'Vincolo Check aggiunto.';
	$lang['strcheckaddedbad'] = 'Inserimento del vincolo Check fallito.';
	$lang['straddpk'] = 'Aggiungi una chiave primaria';
	$lang['strpkneedscols'] = 'La chiave primaria richiede almeno una colonna.';
	$lang['strpkadded'] = 'Chiave primaria aggiunta.';
	$lang['strpkaddedbad'] = 'Aggiunta della chiave primaria fallita.';
	$lang['stradduniq'] = 'Aggiungi una chiave univoca';
	$lang['struniqneedscols'] = 'La chiave univoca richiede almeno una colonna.';
	$lang['struniqadded'] = 'Chiave univoca aggiunta.';
	$lang['struniqaddedbad'] = 'Aggiunta chiave univoca fallita.';
	$lang['straddfk'] = 'Aggiungi una chiave esterna';
	$lang['strfkneedscols'] = 'La chiave esterna richiede almeno una colonna.';
	$lang['strfkneedstarget'] = 'La chiave esterna richiede una tabella obiettivo.';
	$lang['strfkadded'] = 'Chiave esterna aggiunta.';
	$lang['strfkaddedbad'] = 'Aggiunta della chiave esterna fallita.';
	$lang['strfktarget'] = 'Tabella obiettivo';
	$lang['strfkcolumnlist'] = 'Colonne della chiave';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions - Funzioni
	$lang['strfunction'] = 'Funzione';
	$lang['strfunctions'] = 'Funzioni';
	$lang['strshowallfunctions'] = 'Mostra tutte le funzioni';
	$lang['strnofunction'] = 'Funzione non trovata.';
	$lang['strnofunctions'] = 'Nessuna funzione trovata.';
	$lang['strcreateplfunction'] = 'Crea funzione SQL/PL';
	$lang['strcreateinternalfunction'] = 'Crea funzione internal';
	$lang['strcreatecfunction'] = 'Crea funzione C';
	$lang['strfunctionname'] = 'Nome della funzione';
	$lang['strreturns'] = 'Restituisce';
	$lang['strproglanguage'] = 'Linguaggio di programmazione';
	$lang['strfunctionneedsname'] = '&#200; necessario specificare un nome per la funzione.';
	$lang['strfunctionneedsdef'] = '&#200; necessario specificare una definizione per la funzione.';
	$lang['strfunctioncreated'] = 'Funzione creata.';
	$lang['strfunctioncreatedbad'] = 'Creazione funzione fallita.';
	$lang['strconfdropfunction'] = 'Eliminare la funzione &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funzione eliminata.';
	$lang['strfunctiondroppedbad'] = 'Eliminazione della funzione fallita.';
	$lang['strfunctionupdated'] = 'Funzione aggiornata.';
	$lang['strfunctionupdatedbad'] = 'Aggiornamento della funzione fallito.';
	$lang['strobjectfile'] = 'File oggetto';
	$lang['strlinksymbol'] = 'Simbolo di collegamento';
	$lang['strarguments'] = 'Argomenti';

	// Triggers - Trigger
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Trigger';
	$lang['strshowalltriggers'] = 'Mostra tutti i trigger';
	$lang['strnotrigger'] = 'Trigger non trovato.';
	$lang['strnotriggers'] = 'Nessun trigger trovato.';
	$lang['strcreatetrigger'] = 'Crea Trigger';
	$lang['strtriggerneedsname'] = '&#200; necessario specificare un nome per il trigger.';
	$lang['strtriggerneedsfunc'] = '&#200; necessario specificare una funzione per il trigger.';
	$lang['strtriggercreated'] = 'Trigger creato.';
	$lang['strtriggercreatedbad'] = 'Creazione del trigger fallita.';
	$lang['strconfdroptrigger'] = 'Eliminare il trigger &quot;%s&quot; su &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger eliminato.';
	$lang['strtriggerdroppedbad'] = 'Eliminazione del trigger fallita.';
	$lang['strtriggeraltered'] = 'Trigger modificato.';
	$lang['strtriggeralteredbad'] = 'Modifica del trigger fallita.';
	$lang['strforeach'] = 'Per ogni';

	// Types - Tipi
	$lang['strtype'] = 'Tipo';
	$lang['strtypes'] = 'Tipi';
	$lang['strshowalltypes'] = 'Mostra tutti i tipi';
	$lang['strnotype'] = 'Tipo non trovato.';
	$lang['strnotypes'] = 'Nessun tipo trovato.';
	$lang['strcreatetype'] = 'Crea Tipo';
	$lang['strcreatecomptype'] = 'Crea tipo composto';
	$lang['strtypeneedsfield'] = '&#200; necessario specificare almeno un campo.';
	$lang['strtypeneedscols'] = '&#200; necessario specificare un numero di campi valido.';	
	$lang['strtypename'] = 'Nome Tipo';
	$lang['strinputfn'] = 'Funzione di input';
	$lang['stroutputfn'] = 'Funzione di output';
	$lang['strpassbyval'] = 'Passato per valore?';
	$lang['stralignment'] = 'Allineamento';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitatore';
	$lang['strstorage'] = 'Memorizzazione';
	$lang['strfield'] = 'Campo';
	$lang['strnumfields'] = 'Numero di campi';
	$lang['strtypeneedsname'] = '&#200; necessario specificare un nome per il tipo.';
	$lang['strtypeneedslen'] = '&#200; necessario specificare una lunghezza per il tipo.';
	$lang['strtypecreated'] = 'Tipo creato';
	$lang['strtypecreatedbad'] = 'Creazione del tipo fallita.';
	$lang['strconfdroptype'] = 'Eliminare il tipo &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Tipo eliminato.';
	$lang['strtypedroppedbad'] = 'Eliminazione del tipo fallita.';
	$lang['strflavor'] = 'Variet&#224;';
	$lang['strbasetype'] = 'Base';
	$lang['strcompositetype'] = 'Composto';
	$lang['strpseudotype'] = 'Pseudo-tipo';

	// Schemas - Schemi
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemi';
	$lang['strshowallschemas'] = 'Mostra tutti gli schemi';
	$lang['strnoschema'] = 'Schema non trovato.';
	$lang['strnoschemas'] = 'Nessuno schema trovato.';
	$lang['strcreateschema'] = 'Crea schema';
	$lang['strschemaname'] = 'Nome dello schema';
	$lang['strschemaneedsname'] = '&#200; necessario specificare un nome per lo schema.';
	$lang['strschemacreated'] = 'Schema creato';
	$lang['strschemacreatedbad'] = 'Creazione dello schema fallita.';
	$lang['strconfdropschema'] = 'Eliminare lo schema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schema eliminato.';
	$lang['strschemadroppedbad'] = 'Eliminazione dello schema fallita.';
	$lang['strschemaaltered'] = 'Schema modificato.';
	$lang['strschemaalteredbad'] = 'Modifica dello schema fallita.';
	$lang['strsearchpath'] = 'Ordine di ricerca dello schema';

	// Reports - Rapporti
	$lang['strreport'] = 'Rapporto';
	$lang['strreports'] = 'Rapporti';
	$lang['strshowallreports'] = 'Mostra tutti i rapporti';
	$lang['strnoreports'] = 'Nessun rapporto trovato.';
	$lang['strcreatereport'] = 'Crea rapporto';
	$lang['strreportdropped'] = 'Rapporto eliminato.';
	$lang['strreportdroppedbad'] = 'Eliminazione del rapporto fallita.';
	$lang['strconfdropreport'] = 'Eliminare il rapporto &quot;%s&quot;?';
	$lang['strreportneedsname'] = '&#200; necessario specificare un nome per il rapporto.';
	$lang['strreportneedsdef'] = '&#200; necessario inserire il codice SQL per il rapporto.';
	$lang['strreportcreated'] = 'Rapporto salvato';
	$lang['strreportcreatedbad'] = 'Salvataggio del rapporto fallito.';

	// Domains - Domini
	$lang['strdomain'] = 'Dominio';
	$lang['strdomains'] = 'Domini';
	$lang['strshowalldomains'] = 'Mostra tutti i domini';
	$lang['strnodomains'] = 'Nessun dominio trovato.';
	$lang['strcreatedomain'] = 'Crea dominio';
	$lang['strdomaindropped'] = 'Dominio eliminato.';
	$lang['strdomaindroppedbad'] = 'Eliminazione del dominio fallita.';
	$lang['strconfdropdomain'] = 'Eliminare il dominio &quot;%s&quot;?';
	$lang['strdomainneedsname'] = '&#200; necessario specificare un nome per il dominio.';
	$lang['strdomaincreated'] = 'Dominio creato.';
	$lang['strdomaincreatedbad'] = 'Creazione del dominio fallita.';	
	$lang['strdomainaltered'] = 'Dominio modificato.';
	$lang['strdomainalteredbad'] = 'Modifica del dominio fallita.';	

	// Operators - Operatori
	$lang['stroperator'] = 'Operatore';
	$lang['stroperators'] = 'Operatori';
	$lang['strshowalloperators'] = 'Mostra tutti gli operatori';
	$lang['strnooperator'] = 'Operatore non trovato.';
	$lang['strnooperators'] = 'Nessun operatore trovato.';
	$lang['strcreateoperator'] = 'Crea operatore';
	$lang['strleftarg'] = 'Tipo dell\'argomento di sinistra';
	$lang['strrightarg'] = 'Tipo dell\'argomento di destra';
	$lang['strcommutator'] = 'Commutatore';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Supporta hash join';
	$lang['strmerges'] = 'Supporta merge join';
	$lang['strleftsort'] = 'Ordinamento sinistro';
	$lang['strrightsort'] = 'Ordinamento destro';
	$lang['strlessthan'] = 'Minore';
	$lang['strgreaterthan'] = 'Maggiore';
	$lang['stroperatorneedsname'] = '&#200; necessario specificare un nome per l\'operatore.';
	$lang['stroperatorcreated'] = 'Operatore creato';
	$lang['stroperatorcreatedbad'] = 'Creazione dell\'operatore fallita.';
	$lang['strconfdropoperator'] = 'Eliminare l\'operatore &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operatore eliminato.';
	$lang['stroperatordroppedbad'] = 'Eliminazione dell\'operatore fallita.';

	// Casts - Cast
	$lang['strcasts'] = 'Cast';
	$lang['strnocasts'] = 'Nessun cast trovato.';
	$lang['strsourcetype'] = 'Tipo sorgente';
	$lang['strtargettype'] = 'Tipo destinazione';
	$lang['strimplicit'] = 'Implicito';
	$lang['strinassignment'] = 'Negli assegnamenti';
	$lang['strbinarycompat'] = '(Compatibile in binario)';
	
	// Conversions - Conversioni
	$lang['strconversions'] = 'Conversioni';
	$lang['strnoconversions'] = 'Nessuna conversione trovata.';
	$lang['strsourceencoding'] = 'Codifica sorgente';
	$lang['strtargetencoding'] = 'Codifica destinazione';
	
	// Languages - Linguaggi
	$lang['strlanguages'] = 'Linguaggi';
	$lang['strnolanguages'] = 'Nessun linguaggio trovato.';
	$lang['strtrusted'] = 'Trusted';

	// Info
	$lang['strnoinfo'] = 'Nessuna informazione disponibile.';
	$lang['strreferringtables'] = 'Tabelle referenti';
	$lang['strparenttables'] = 'Tabella padre';
	$lang['strchildtables'] = 'Tabella figlia';

	// Aggregates - Aggregati
	$lang['straggregate'] = 'Aggregato';
	$lang['straggregates'] = 'Aggregati';
	$lang['strnoaggregates'] = 'Nessun aggregato trovato.';
	$lang['stralltypes'] = '(Tutti i tipi)';
	$lang['strcreateaggregate'] = 'Crea aggregato';
	$lang['straggrsfunc'] = 'Funzione di transizione di stato';
	$lang['straggrstype'] = 'Tipo di dato per il valore di stato';
	$lang['straggrffunc'] = 'Funzione finale';
	$lang['straggrinitcond'] = 'Condizione iniziale';
	$lang['straggrsortop'] = 'Operatore di ordinamento';
	$lang['strconfdropaggregate'] = 'Eliminare l\'aggregato &quot;%s&quot;?';
	$lang['straggregatedropped'] = 'Aggregato eliminato.';
	$lang['straggregatedroppedbad'] = 'Eliminazione dell\'aggregato fallita.';
	$lang['straggraltered'] = 'Aggregato modificato.';
	$lang['straggralteredbad'] = 'Modifica dell\'aggregato fallita.';
	$lang['straggrneedsname'] = '&#200; necessario specificare un nome per l\'aggregato.';
	$lang['straggrneedssfunc'] = '&#200; necessario specificare il nome della funzione di transizione di stato per l\'aggregato.';
	$lang['straggrneedsstype'] = '&#200; necessario specificare il tipo di dato per il valore di stato dell\'aggregato.';
	$lang['straggrcreated'] = 'Aggregato creato.';
	$lang['straggrcreatedbad'] = 'Creazione dell\'aggregato fallita.';
	$lang['straggrshowall'] = 'Mostra tutti gli aggregati';

	// Operator classes - Classi di operatori
	$lang['stropclasses'] = 'Classi di operatori';
	$lang['strnoopclasses'] = 'Nessuna classe di operatori trovata.';
	$lang['straccessmethod'] = 'Metodo di accesso';

	// Stats and performance - Statistiche e performance
	$lang['strrowperf'] = 'Performance sulle righe';
	$lang['strioperf'] = 'Performance sull\'I/O';
	$lang['stridxrowperf'] = 'Performance sulle righe per gli indici';
	$lang['stridxioperf'] = 'Performance sull\'I/O per gli indici';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequenziale';
	$lang['strscan'] = 'Scan';
	$lang['strread'] = 'Read';
	$lang['strfetch'] = 'Fetch';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disco';
	$lang['strrows2'] = 'Righe';

	// Tablespaces - Tablespace
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespace';
	$lang['strshowalltablespaces'] = 'Mostra tutti i tablespace';
	$lang['strnotablespaces'] = 'Nessun tablespace trovato.';
	$lang['strcreatetablespace'] = 'Crea tablespace';
	$lang['strlocation'] = 'Directory';
	$lang['strtablespaceneedsname'] = '&#200; necessario specificare un nome per il tablespace.';
	$lang['strtablespaceneedsloc'] = '&#200; necessario specificare una directory in cui creare il tablespace.';
	$lang['strtablespacecreated'] = 'Tablespace creato.';
	$lang['strtablespacecreatedbad'] = 'Crezione del tablespace fallita.';
	$lang['strconfdroptablespace'] = 'Eliminare il tablespace &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Tablespace eliminato.';
	$lang['strtablespacedroppedbad'] = 'Eliminazione del tablespace fallita.';
	$lang['strtablespacealtered'] = 'Tablespace modificato.';
	$lang['strtablespacealteredbad'] = 'Modifica del tablespace fallita.';

	// Slony clusters - Cluster Slony
	$lang['strcluster'] = 'Cluster';

	// Slony nodes - Nodi Slony
	$lang['strid'] = 'ID';

	// Miscellaneous - Varie
	$lang['strtopbar'] = '%s in esecuzione su %s:%s -- Utente &quot;%s&quot;';
	$lang['strtimefmt'] = 'j M Y - g:iA';
	$lang['strhelp'] = 'Aiuto';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Browser delle pagine di aiuto';
	$lang['strselecthelppage'] = 'Seleziona una pagina di aiuto';
	$lang['strinvalidhelppage'] = 'Pagina di aiuto non valida.';
	$lang['strlogintitle'] = 'Login su %s';
	$lang['strlogoutmsg'] = 'Logout da %s effettuato';
	$lang['strloading'] = 'Caricamento...';
	$lang['strerrorloading'] = 'Errore nel caricamento di';
	$lang['strclicktoreload'] = 'Clicca per ricaricare';

	// Autovacuum
	$lang['strautovacuum'] = 'Vacuum automatico';

	// Prepared transactions - Transazioni preparate
	$lang['strpreparedxacts'] = 'Transazioni preparate';
	$lang['strxactid'] = 'ID della transazione';
	$lang['strgid'] = 'ID globale';
?>
