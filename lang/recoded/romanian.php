<?php
/**
	* Romanian language file, based on the english language file for phpPgAdmin.
	* Alin Vaida [alin.vaida@gmail.com]
	*
	* $Id: romanian.php,v 1.7 2007/04/24 11:42:07 soranzo Exp $
	*/

	// Language and character set
	$lang['applang'] = 'Rom&#226;n&#259;';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'ro_RO';
	$lang['appdbencoding'] = 'LATIN2';
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'Bun venit &#238;n phpPgAdmin.';
	$lang['strppahome'] = 'Pagina phpPgAdmin';
	$lang['strpgsqlhome'] = 'Pagina PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documenta&#355;ie local&#259; PostgreSQL';
	$lang['strreportbug'] = 'Raporta&#355;i o eroare';
	$lang['strviewfaq'] = '&#206;ntreb&#259;ri frecvente online';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Autentificare';
	$lang['strloginfailed'] = 'Autentificare e&#351;uat&#259;';
	$lang['strlogindisallowed'] = 'Autentificare nepermis&#259; din motive de securitate.';
	$lang['strserver'] = 'Server';
	$lang['strservers'] = 'Servere';
	$lang['strintroduction'] = 'Introducere';
	$lang['strhost'] = 'Gazd&#259;';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'Ie&#351;ire';
	$lang['strowner'] = 'Proprietar';
	$lang['straction'] = 'Ac&#355;iune';
	$lang['stractions'] = 'Ac&#355;iuni';
	$lang['strname'] = 'Nume';
	$lang['strdefinition'] = 'Defini&#355;ie';
	$lang['strproperties'] = 'Propriet&#259;&#355;i';
	$lang['strbrowse'] = 'Vizualizare';
	$lang['strenable'] = 'Activare';
	$lang['strdisable'] = 'Dezactivare';
	$lang['strdrop'] = '&#350;tergere';
	$lang['strdropped'] = '&#350;ters';
	$lang['strnull'] = 'Nul';
	$lang['strnotnull'] = 'Ne-nul';
	$lang['strprev'] = '&lt; &#206;napoi';
	$lang['strnext'] = '&#206;nainte &gt;';
	$lang['strfirst'] = '&lt;&lt; &#206;nceput';
	$lang['strlast'] = 'Sf&#226;r&#351;it &gt;&gt;';
	$lang['strfailed'] = 'E&#351;uat';
	$lang['strcreate'] = 'Creare';
	$lang['strcreated'] = 'Creat';
	$lang['strcomment'] = 'Comentariu';
	$lang['strlength'] = 'Lungime';
	$lang['strdefault'] = 'Implicit';
	$lang['stralter'] = 'Modificare';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Anulare';
	$lang['strac'] = 'Activare Auto-completare';
	$lang['strsave'] = 'Salvare';
	$lang['strreset'] = 'Reini&#355;ializare';
	$lang['strinsert'] = 'Inserare';
	$lang['strselect'] = 'Selectare';
	$lang['strdelete'] = '&#350;tergere';
	$lang['strupdate'] = 'Actualizare';
	$lang['strreferences'] = 'Referin&#355;e';
	$lang['stryes'] = 'Da';
	$lang['strno'] = 'Nu';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
	$lang['stredit'] = 'Editare';
	$lang['strcolumn'] = 'Coloan&#259;';
	$lang['strcolumns'] = 'Coloane';
	$lang['strrows'] = 'r&#226;nd(uri)';
	$lang['strrowsaff'] = 'r&#226;nd(uri) afectate.';
	$lang['strobjects'] = 'obiect(e)';
	$lang['strback'] = '&#206;napoi';
	$lang['strqueryresults'] = 'Rezultatele interog&#259;rii';
	$lang['strshow'] = 'Afi&#351;are';
	$lang['strempty'] = 'Golire';
	$lang['strlanguage'] = 'Limb&#259;';
	$lang['strencoding'] = 'Codificare';
	$lang['strvalue'] = 'Valoare';
	$lang['strunique'] = 'Unic';
	$lang['strprimary'] = 'Primar';
	$lang['strexport'] = 'Export';
	$lang['strimport'] = 'Import';
	$lang['strallowednulls'] = 'Caractere NULL permise';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = '&#350;ir/c&#226;mp gol';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Administrare';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analiz&#259;';
	$lang['strclusterindex'] = 'Grupare';
	$lang['strclustered'] = 'Grupat?';
	$lang['strreindex'] = 'Re-indexare';
	$lang['strrun'] = 'Executare';
	$lang['stradd'] = 'Ad&#259;ugare';
	$lang['strevent'] = 'Eveniment';
	$lang['strwhere'] = '&#206;n schimb';
	$lang['strinstead'] = 'Execut&#259; &#238;n schimb';
	$lang['strwhen'] = 'C&#226;nd';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Dat&#259;';
	$lang['strconfirm'] = 'Confirmare';
	$lang['strexpression'] = 'Expresie';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Expandare';
	$lang['strcollapse'] = 'Restr&#226;ngere';
	$lang['strexplain'] = 'Explicare';
	$lang['strexplainanalyze'] = 'Explicare &amp; Analiz&#259;';
	$lang['strfind'] = 'C&#259;utare';
	$lang['stroptions'] = 'Op&#355;iuni';
	$lang['strrefresh'] = 'Re&#238;mprosp&#259;tare';
	$lang['strdownload'] = 'Transfer';
	$lang['strdownloadgzipped'] = 'Transfer comprimat cu gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OID-uri';
	$lang['stradvanced'] = 'Avansat';
	$lang['strvariables'] = 'Variabile';
	$lang['strprocess'] = 'Proces';
	$lang['strprocesses'] = 'Procese';
	$lang['strsetting'] = 'Valoare';
	$lang['streditsql'] = 'Editare SQL';
	$lang['strruntime'] = 'Timp total de rulare:%s ms';
	$lang['strpaginate'] = 'Paginare rezultate';
	$lang['struploadscript'] = 'sau &#238;nc&#259;rcare script SQL:';
	$lang['strstarttime'] = 'Timp start';
	$lang['strfile'] = 'Fi&#351;ier';
	$lang['strfileimported'] = 'Fi&#351;ier importat';
	$lang['strtrycred'] = 'Folosi&#355;i aceste acredit&#259;ri pentru toate serverele';

	// Database sizes
	$lang['strsize'] = 'Dimensiune';
	$lang['strbytes'] = 'octe&#355;i';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'Aceast&#259; aplica&#355;ie func&#355;ioneaz&#259; cel mai bine &#238;ntr-un browser ce suport&#259; frame-uri , dar poate fi folosit&#259; &#351;i f&#259;r&#259; frame-uri, urm&#226;nd leg&#259;tura de mai jos.';
	$lang['strnoframeslink'] = 'F&#259;r&#259; frame-uri';
	$lang['strbadconfig'] = 'Fi&#351;ierul config.inc.php este &#238;nvechit. Trebuie s&#259;-l re-genera&#355;i folosind noul fi&#351;ier config.inc.php-dist.';
	$lang['strnotloaded'] = 'Instalarea de PHP nu suport&#259; PostgreSQL. Trebuie s&#259; re-compila&#355;i PHP folosind op&#355;iunea --with-pgsql la configurare.';
	$lang['strpostgresqlversionnotsupported'] = 'Versiune de PostgreSQL ne-suportat&#259;. Actualiza&#355;i la versiunea %s sau ulterioar&#259;.';
	$lang['strbadschema'] = 'Schem&#259; specificat&#259; incorect&#259;.';
	$lang['strbadencoding'] = 'Imposibil de setat codificarea client &#238;n baza de date.';
	$lang['strsqlerror'] = 'Eroare SQL:';
	$lang['strinstatement'] = '&#206;n instruc&#355;iunea:';
	$lang['strinvalidparam'] = 'Parametrii scriptului sunt incorec&#355;i.';
	$lang['strnodata'] = 'Nici un r&#226;nd g&#259;sit.';
	$lang['strnoobjects'] = 'Nici un obiect g&#259;sit.';
	$lang['strrownotunique'] = 'Nici un identificator unic pentru acest r&#226;nd.';
	$lang['strnoreportsdb'] = 'Nu a&#355;i creat baza de date pentru rapoarte. Citi&#355;i fi&#351;ierul INSTALL pentru instruc&#355;iuni.';
	$lang['strnouploads'] = '&#206;nc&#259;rcarea de fi&#351;iere este dezactivat&#259;.';
	$lang['strimporterror'] = 'Eroare la importare.';
	$lang['strimporterror-fileformat'] = 'Eroare la importare: Imposibil de determinat &#238;n mod automat formatul fi&#351;ierului.';
	$lang['strimporterrorline'] = 'Eroare la importare pe linia %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Eroare la importare pe linia %s:  Linia nu are num&#259;rul corect de coloane.';
	$lang['strimporterror-uploadedfile'] = 'Eroare la importare: Fi&#351;ierul nu a putut fi &#238;nc&#259;rcat pe server';
	$lang['strcannotdumponwindows'] = 'Desc&#259;rcarea de tabele complexe &#351;i nume de scheme &#238;n Windows nu este suportat&#259;.';

	// Tables
	$lang['strtable'] = 'Tabel&#259;';
	$lang['strtables'] = 'Tabele';
	$lang['strshowalltables'] = 'Afi&#351;are toate tabelele';
	$lang['strnotables'] = 'Nici o tabel&#259; g&#259;sit&#259;.';
	$lang['strnotable'] = 'Nici o tabel&#259; g&#259;sit&#259;.';
	$lang['strcreatetable'] = 'Creare tabel&#259;.';
	$lang['strtablename'] = 'Nume tabel&#259;';
	$lang['strtableneedsname'] = 'Specifica&#355;i un nume pentru tabel&#259;.';
	$lang['strtableneedsfield'] = 'Specifica&#355;i cel pu&#355;in un c&#226;mp.';
	$lang['strtableneedscols'] = 'Specifica&#355;i un num&#259;r corect de coloane.';
	$lang['strtablecreated'] = 'Tabel&#259; creat&#259;.';
	$lang['strtablecreatedbad'] = 'Creare tabel&#259; e&#351;uat&#259;.';
	$lang['strconfdroptable'] = 'Sigur &#351;terge&#355;i tabela &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabel&#259; &#351;tears&#259;.';
	$lang['strtabledroppedbad'] = '&#350;tergere tabel&#259; e&#351;uat&#259;.';
	$lang['strconfemptytable'] = 'Sigur goli&#355;i tabela &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabel&#259; golit&#259;.';
	$lang['strtableemptiedbad'] = 'Golire tabel&#259; e&#351;uat&#259;.';
	$lang['strinsertrow'] = 'Inserare r&#226;nd';
	$lang['strrowinserted'] = 'R&#226;nd inserat';
	$lang['strrowinsertedbad'] = 'Inserare r&#226;nd e&#351;uat&#259;.';
	$lang['strrowduplicate'] = 'Inserare de r&#226;nd e&#351;uat&#259;, s-a &#238;ncercat inserarea unui duplicat.';
	$lang['streditrow'] = 'Editare r&#226;nd';
	$lang['strrowupdated'] = 'R&#226;nd actualizat.';
	$lang['strrowupdatedbad'] = 'Actualizare r&#226;nd e&#351;uat&#259;.';
	$lang['strdeleterow'] = '&#350;tergere r&#226;nd.';
	$lang['strconfdeleterow'] = 'Sigur &#351;terge&#355;i acest r&#226;nd?';
	$lang['strrowdeleted'] = 'R&#226;nd &#351;ters.';
	$lang['strrowdeletedbad'] = '&#350;tergere r&#226;nd e&#351;uat&#259;.';
	$lang['strinsertandrepeat'] = 'Inserare &amp; Repetare';
	$lang['strnumcols'] = 'Num&#259;r de coloane';
	$lang['strcolneedsname'] = 'Specifica&#355;i un nume pentru coloan&#259;';
	$lang['strselectallfields'] = 'Selectare toate c&#226;mpurile';
	$lang['strselectneedscol'] = 'Afi&#351;a&#355;i cel pu&#355;in o coloan&#259;.';
	$lang['strselectunary'] = 'Operatorii unari nu pot avea valori.';
	$lang['straltercolumn'] = 'Modificare coloan&#259;';
	$lang['strcolumnaltered'] = 'Coloan&#259; modificat&#259;.';
	$lang['strcolumnalteredbad'] = 'Modificare coloan&#259; e&#351;uat&#259;.';
	$lang['strconfdropcolumn'] = 'Sigur &#351;terge&#355;i coloana &quot;%s&quot; din tabela &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Coloan&#259; &#351;tears&#259;.';
	$lang['strcolumndroppedbad'] = '&#350;tergere coloan&#259; e&#351;uat&#259;.';
	$lang['straddcolumn'] = 'Ad&#259;ugare coloan&#259;';
	$lang['strcolumnadded'] = 'Coloan&#259; ad&#259;ugat&#259;.';
	$lang['strcolumnaddedbad'] = 'Ad&#259;ugare coloan&#259; e&#351;uat&#259;.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Tabel&#259; modificat&#259;.';
	$lang['strtablealteredbad'] = 'Modificare tabel&#259; e&#351;uat&#259;.';
	$lang['strdataonly'] = 'Numai date';
	$lang['strstructureonly'] = 'Numai structur&#259;';
	$lang['strstructureanddata'] = 'Structur&#259; &#351;i date';
	$lang['strtabbed'] = 'Cu tab-uri';
	$lang['strauto'] = 'Automat';
	$lang['strconfvacuumtable'] = 'Sigur executa&#355;i &quot;vacuum&quot; pe &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Num&#259;r estimat de r&#226;nduri';

	// Columns
	$lang['strcolprop'] = 'Propriet&#259;&#355;i coloan&#259;';

	// Users
	$lang['struser'] = 'Utilizator';
	$lang['strusers'] = 'Utilizatori';
	$lang['strusername'] = 'Nume utilizator';
	$lang['strpassword'] = 'Parol&#259;';
	$lang['strsuper'] = 'Utilizator privilegiat?';
	$lang['strcreatedb'] = 'Creeaz&#259; BD?';
	$lang['strexpires'] = 'Expir&#259; la';
	$lang['strsessiondefaults'] = 'Valori implicite pentru sesiune';
	$lang['strnousers'] = 'Nici un utilizator g&#259;sit.';
	$lang['struserupdated'] = 'Utilizator actualizat.';
	$lang['struserupdatedbad'] = 'Actualizare utilizator e&#351;uat&#259;.';
	$lang['strshowallusers'] = 'Afi&#351;are to&#355;i utilizatorii';
	$lang['strcreateuser'] = 'Creare utilizator';
	$lang['struserneedsname'] = 'Specifica&#355;i un nume pentru utilizator.';
	$lang['strusercreated'] = 'Utilizator creat.';
	$lang['strusercreatedbad'] = 'Creare utilizator e&#351;uat&#259;.';
	$lang['strconfdropuser'] = 'Sigur &#351;terge&#355;i utilizatorul &quot;%s&quot;?';
	$lang['struserdropped'] = 'Utilizator &#351;ters.';
	$lang['struserdroppedbad'] = '&#350;tergere utilizator e&#351;uat&#259;.';
	$lang['straccount'] = 'Cont';
	$lang['strchangepassword'] = 'Schimbare parol&#259;';
	$lang['strpasswordchanged'] = 'Parol&#259; schimbat&#259;.';
	$lang['strpasswordchangedbad'] = 'Schimbare parol&#259; e&#351;uat&#259;.';
	$lang['strpasswordshort'] = 'Parola este prea scurt&#259;.';
	$lang['strpasswordconfirm'] = 'Parola nu se confirm&#259;.';

	// Groups
	$lang['strgroup'] = 'Grup';
	$lang['strgroups'] = 'Grupuri';
	$lang['strshowallgroups'] = 'Afi&#351;are toate grupurile';
	$lang['strnogroup'] = 'Grup neg&#259;sit.';
	$lang['strnogroups'] = 'Nici un grup g&#259;sit.';
	$lang['strcreategroup'] = 'Creare grup';
	$lang['strgroupneedsname'] = 'Specifica&#355;i un nume pentru grup.';
	$lang['strgroupcreated'] = 'Grup creat.';
	$lang['strgroupcreatedbad'] = 'Creare grup e&#351;uat&#259;.';
	$lang['strconfdropgroup'] = 'Sigur &#351;terge&#355;i grupul &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grup &#351;ters.';
	$lang['strgroupdroppedbad'] = '&#350;tergere grup e&#351;uat&#259;.';
	$lang['strmembers'] = 'Membri';
	$lang['strmemberof'] = 'Membru al';
	$lang['stradminmembers'] = 'Membri administratori';
	$lang['straddmember'] = 'Ad&#259;ugare membru';
	$lang['strmemberadded'] = 'Membru ad&#259;ugat.';
	$lang['strmemberaddedbad'] = 'Ad&#259;ugare membru e&#351;uat&#259;.';
	$lang['strdropmember'] = '&#350;tergere membru';
	$lang['strconfdropmember'] = 'Sigur &#351;terge&#355;i membrul &quot;%s&quot; din grupul &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Membru &#351;ters.';
	$lang['strmemberdroppedbad'] = '&#350;tergere membru e&#351;uat&#259;.';

	// Roles
	$lang['strrole'] = 'Rol';
	$lang['strroles'] = 'Roluri';
	$lang['strshowallroles'] = 'Afi&#351;are toate rolurile';
	$lang['strnoroles'] = 'Nici un rol g&#259;sit';
	$lang['strinheritsprivs'] = 'Mo&#351;tenire privilegii?';
	$lang['strcreaterole'] = 'Creare rol';
	$lang['strcancreaterole'] = 'Creare rol posibil&#259;?';
	$lang['strrolecreated'] = 'Rol creat';
	$lang['strrolecreatedbad'] = 'Creare rol e&#351;uat&#259;';
	$lang['stralterrole'] = 'Modificare rol';
	$lang['strrolealtered'] = 'Rol modificat';
	$lang['strrolealteredbad'] = 'Modificare rol e&#351;uat&#259;';
	$lang['strcanlogin'] = 'Autentificare posibil&#259;?';
	$lang['strconnlimit'] = 'Limit&#259; conectare';
	$lang['strdroprole'] = '&#350;tergere rol';
	$lang['strconfdroprole'] = 'Sigur &#351;terge&#355;i rolul &quot;%s&quot;?';
	$lang['strroledropped'] = 'Rol &#351;ters';
	$lang['strroledroppedbad'] = '&#350;tergere rol e&#351;uat&#259;';
	$lang['strnolimit'] = 'F&#259;r&#259; limit&#259;';
	$lang['strnever'] = 'Niciodat&#259;';
	$lang['strroleneedsname'] = 'Specifica&#355;i un nume pentru rol';

	// Privileges
	$lang['strprivilege'] = 'Privilegiu';
	$lang['strprivileges'] = 'Privilegii';
	$lang['strnoprivileges'] = 'Acest obiect are privilegiile implicite ale proprietarului.';
	$lang['strgrant'] = 'Acordare';
	$lang['strrevoke'] = 'Revocare';
	$lang['strgranted'] = 'Privilegii schimbate.';
	$lang['strgrantfailed'] = 'Schimbare privilegii e&#351;uat&#259;.';
	$lang['strgrantbad'] = 'Specifica&#355;i cel pu&#355;in un utilizator sau grup &#351;i cel pu&#355;in un privilegiu.';
	$lang['strgrantor'] = 'Acordat de';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Baz&#259; de date';
	$lang['strdatabases'] = 'Baze de date';
	$lang['strshowalldatabases'] = 'Afi&#351;are toate bazele de date';
	$lang['strnodatabases'] = 'Nici o baz&#259; de date g&#259;sit&#259;.';
	$lang['strcreatedatabase'] = 'Creare baz&#259; de date';
	$lang['strdatabasename'] = 'Nume baz&#259; de date';
	$lang['strdatabaseneedsname'] = 'Specifica&#355;i un nume pentru baza de date.';
	$lang['strdatabasecreated'] = 'Baz&#259; de date creat&#259;.';
	$lang['strdatabasecreatedbad'] = 'Creare baz&#259; de date e&#351;uat&#259;.';
	$lang['strconfdropdatabase'] = 'Sigur &#351;terge&#355;i baza de date &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Baz&#259; de date &#351;tears&#259;.';
	$lang['strdatabasedroppedbad'] = '&#350;tergere baz&#259; de date e&#351;uat&#259;.';
	$lang['strentersql'] = 'Introduce&#355;i instruc&#355;iunea SQL de executat:';
	$lang['strsqlexecuted'] = 'Instruc&#355;iune SQL executat&#259;.';
	$lang['strvacuumgood'] = 'Vacuum terminat.';
	$lang['strvacuumbad'] = 'Vacuum e&#351;uat.';
	$lang['stranalyzegood'] = 'Analiz&#259; terminat&#259;.';
	$lang['stranalyzebad'] = 'Analiz&#259; e&#351;uat&#259;.';
	$lang['strreindexgood'] = 'Re-indexare terminat&#259;.';
	$lang['strreindexbad'] = 'Re-indexare e&#351;uat&#259;.';
	$lang['strfull'] = 'Complet';
	$lang['strfreeze'] = '&#206;nghe&#355;are';
	$lang['strforce'] = 'For&#355;are';
	$lang['strsignalsent'] = 'Semnal trimis.';
	$lang['strsignalsentbad'] = 'Trimitere semnal e&#351;uat&#259;.';
	$lang['strallobjects'] = 'Toate obiectele';
	$lang['strdatabasealtered'] = 'Baz&#259; de date modificat&#259;.';
	$lang['strdatabasealteredbad'] = 'Modificarea bazei de date a e&#351;uat.';

	// Views
	$lang['strview'] = 'Vizualizare';
	$lang['strviews'] = 'Vizualiz&#259;ri';
	$lang['strshowallviews'] = 'Afi&#351;are toate vizualiz&#259;rile';
	$lang['strnoview'] = 'Nici o vizualizare g&#259;sit&#259;.';
	$lang['strnoviews'] = 'Nici o vizualizare g&#259;sit&#259;.';
	$lang['strcreateview'] = 'Creare vizualizare';
	$lang['strviewname'] = 'Nume vizualizare';
	$lang['strviewneedsname'] = 'Specifica&#355;i un nume pentru vizualizare.';
	$lang['strviewneedsdef'] = 'Specifica&#355;i o defini&#355;ie pentru vizualizare.';
	$lang['strviewneedsfields'] = 'Specifica&#355;i coloanele pe care le dori&#355;i selectate &#238;n vizualizare.';
	$lang['strviewcreated'] = 'Vizualizare creat&#259;.';
	$lang['strviewcreatedbad'] = 'Creare vizualizare e&#351;uat&#259;.';
	$lang['strconfdropview'] = 'Sigur &#351;terge&#355;i vizualizarea &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vizualizare &#351;tears&#259;.';
	$lang['strviewdroppedbad'] = '&#350;tergere vizualizare e&#351;uat&#259;.';
	$lang['strviewupdated'] = 'Vizualizare actualizat&#259;';
	$lang['strviewupdatedbad'] = 'Actualizare vizualizare e&#351;uat&#259;.';
	$lang['strviewlink'] = 'Chei de leg&#259;tur&#259;';
	$lang['strviewconditions'] = 'Condi&#355;ii suplimentare';
	$lang['strcreateviewwiz'] = 'Creare vizualizare folosind expertul';

	// Sequences
	$lang['strsequence'] = 'Secven&#355;&#259;';
	$lang['strsequences'] = 'Secven&#355;e';
	$lang['strshowallsequences'] = 'Afi&#351;are toate secven&#355;ele';
	$lang['strnosequence'] = 'Nici o secven&#355;&#259; g&#259;sit&#259;.';
	$lang['strnosequences'] = 'Nici o secven&#355;&#259; g&#259;sit&#259;.';
	$lang['strcreatesequence'] = 'Creare secven&#355;&#259;';
	$lang['strlastvalue'] = 'Ultima valoare';
	$lang['strincrementby'] = 'Incrementare cu';
	$lang['strstartvalue'] = 'Valoare de start';
	$lang['strmaxvalue'] = 'Valoare maxim&#259;';
	$lang['strminvalue'] = 'Valoare minim&#259;';
	$lang['strcachevalue'] = 'Valoare cache';
	$lang['strlogcount'] = 'Log count';
	$lang['striscycled'] = 'Ciclic&#259;?';
	$lang['strsequenceneedsname'] = 'Specifica&#355;i un nume pentru secven&#355;&#259;.';
	$lang['strsequencecreated'] = 'Secven&#355;&#259; creat&#259;.';
	$lang['strsequencecreatedbad'] = 'Creare secven&#355;&#259; e&#351;uat&#259;.';
	$lang['strconfdropsequence'] = 'Sigur &#351;terge&#355;i secven&#355;a &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Secven&#355;&#259; &#351;tears&#259;.';
	$lang['strsequencedroppedbad'] = '&#350;tergere secven&#355;&#259; e&#351;uat&#259;.';
	$lang['strsequencereset'] = 'Reini&#355;ializare secven&#355;&#259;.';
	$lang['strsequenceresetbad'] = 'Reini&#355;ializare secven&#355;&#259; e&#351;uat&#259;.';
	$lang['straltersequence'] = 'Modificare secven&#355;&#259;';
	$lang['strsequencealtered'] = 'Secven&#355;&#259; modificat&#259;';
	$lang['strsequencealteredbad'] = 'Modificare secven&#355;&#259; e&#351;uat&#259;';
	$lang['strsetval'] = 'Setare valoare';
	$lang['strsequencesetval'] = 'Valoare secven&#355;&#259; setat&#259;';
	$lang['strsequencesetvalbad'] = 'Setare valoare secven&#355;&#259; e&#351;uat&#259;';
	$lang['strnextval'] = 'Valoare increment';
	$lang['strsequencenextval'] = 'Secven&#355;&#259; incrementat&#259;';
	$lang['strsequencenextvalbad'] = 'Incremetare secven&#355;&#259; e&#351;uat&#259;';

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes'] = 'Indexuri';
	$lang['strindexname'] = 'Nume index';
	$lang['strshowallindexes'] = 'Afi&#351;are toate indexurile';
	$lang['strnoindex'] = 'Nici un index g&#259;sit.';
	$lang['strnoindexes'] = 'Nici un index g&#259;sit.';
	$lang['strcreateindex'] = 'Creare index';
	$lang['strtabname'] = 'Nume tabel&#259;';
	$lang['strcolumnname'] = 'Nume coloan&#259;';
	$lang['strindexneedsname'] = 'Specifica&#355;i un nume pentru index.';
	$lang['strindexneedscols'] = 'Indexurile necesit&#259; un num&#259;r corect de coloane.';
	$lang['strindexcreated'] = 'Index creat';
	$lang['strindexcreatedbad'] = 'Creare index e&#351;uat&#259;.';
	$lang['strconfdropindex'] = 'Sigur &#351;terge&#355;i indexul &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index &#351;ters.';
	$lang['strindexdroppedbad'] = '&#350;tergere index e&#351;uat&#259;.';
	$lang['strkeyname'] = 'Nume cheie';
	$lang['struniquekey'] = 'Cheie unic&#259;';
	$lang['strprimarykey'] = 'Cheie primar&#259;';
	$lang['strindextype'] = 'Tip de index';
	$lang['strtablecolumnlist'] = 'Coloane &#238;n tabel&#259;';
	$lang['strindexcolumnlist'] = 'Coloane &#238;n index';
	$lang['strconfcluster'] = 'Sigur grupa&#355;i &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Grupare complet&#259;.';
	$lang['strclusteredbad'] = 'Grupare e&#351;uat&#259;.';

	// Rules
	$lang['strrules'] = 'Reguli';
	$lang['strrule'] = 'Regul&#259;';
	$lang['strshowallrules'] = 'Afi&#351;are toate regulile';
	$lang['strnorule'] = 'Nici o regul&#259; g&#259;sit&#259;.';
	$lang['strnorules'] = 'Nici o regul&#259; g&#259;sit&#259;.';
	$lang['strcreaterule'] = 'Creare regul&#259;';
	$lang['strrulename'] = 'Nume regul&#259;';
	$lang['strruleneedsname'] = 'Specifica&#355;i un nume pentru regul&#259;.';
	$lang['strrulecreated'] = 'Regul&#259; creat&#259;.';
	$lang['strrulecreatedbad'] = 'Creare regul&#259; e&#351;uat&#259;.';
	$lang['strconfdroprule'] = 'Sigur &#351;terge&#355;i regula &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regul&#259; &#351;tears&#259;.';
	$lang['strruledroppedbad'] = '&#350;tergere regul&#259; e&#351;uat&#259;.';

	// Constraints
	$lang['strconstraint'] = 'Restric&#355;ie';
	$lang['strconstraints'] = 'Restric&#355;ii';
	$lang['strshowallconstraints'] = 'Afi&#351;are toate restric&#355;iile';
	$lang['strnoconstraints'] = 'Nici o restric&#355;ie g&#259;sit&#259;.';
	$lang['strcreateconstraint'] = 'Creare restric&#355;ie';
	$lang['strconstraintcreated'] = 'Restric&#355;ie creat&#259;.';
	$lang['strconstraintcreatedbad'] = 'Creare restric&#355;ie e&#351;uat&#259;.';
	$lang['strconfdropconstraint'] = 'Sigur &#351;terge&#355;i restric&#355;ia &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Restric&#355;ie &#351;tears&#259;.';
	$lang['strconstraintdroppedbad'] = '&#350;tergere restric&#355;ie e&#351;uat&#259;.';
	$lang['straddcheck'] = 'Ad&#259;ugare verificare';
	$lang['strcheckneedsdefinition'] = 'Verificarea de restric&#355;ie necesit&#259; o defini&#355;ie.';
	$lang['strcheckadded'] = 'Verificare de restric&#355;ie ad&#259;ugat&#259;.';
	$lang['strcheckaddedbad'] = 'Ad&#259;ugare verificare de restric&#355;ie e&#351;uat&#259;.';
	$lang['straddpk'] = 'Ad&#259;ugare cheie primar&#259;';
	$lang['strpkneedscols'] = 'Cheia primar&#259; necesit&#259; cel pu&#355;in o coloan&#259;.';
	$lang['strpkadded'] = 'Cheie primar&#259; ad&#259;ugat&#259;.';
	$lang['strpkaddedbad'] = 'Ad&#259;ugare cheie primar&#259; e&#351;uat&#259;.';
	$lang['stradduniq'] = 'Ad&#259;ugare cheie unic&#259;';
	$lang['struniqneedscols'] = 'Cheia unic&#259; necesit&#259; cel pu&#355;in o coloan&#259;.';
	$lang['struniqadded'] = 'Cheie unic&#259; ad&#259;ugat&#259;.';
	$lang['struniqaddedbad'] = 'Ad&#259;ugare cheie unic&#259; e&#351;uat&#259;.';
	$lang['straddfk'] = 'Ad&#259;ugare cheie str&#259;in&#259;';
	$lang['strfkneedscols'] = 'Cheia str&#259;in&#259; necesit&#259; cel pu&#355;in o coloan&#259;.';
	$lang['strfkneedstarget'] = 'Cheia str&#259;in&#259; necesit&#259; o tabel&#259; de destina&#355;ie.';
	$lang['strfkadded'] = 'Cheie str&#259;in&#259; ad&#259;ugat&#259;.';
	$lang['strfkaddedbad'] = 'Ad&#259;ugare cheie str&#259;in&#259; e&#351;uat&#259;.';
	$lang['strfktarget'] = 'Tabel&#259; de destina&#355;ie';
	$lang['strfkcolumnlist'] = 'Coloane &#238;n cheie';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Func&#355;ie';
	$lang['strfunctions'] = 'Func&#355;ii';
	$lang['strshowallfunctions'] = 'Afi&#351;are toate func&#355;iile';
	$lang['strnofunction'] = 'Nici o functie g&#259;sit&#259;.';
	$lang['strnofunctions'] = 'Nici o functie g&#259;sit&#259;.';
	$lang['strcreateplfunction'] = 'Creare func&#355;ie SQL/PL';
	$lang['strcreateinternalfunction'] = 'Creare func&#355;ie intern&#259;';
	$lang['strcreatecfunction'] = 'Creare func&#355;ie C';
	$lang['strfunctionname'] = 'Nume func&#355;ie';
	$lang['strreturns'] = '&#206;ntoarce';
	$lang['strproglanguage'] = 'Limbaj de programare';
	$lang['strfunctionneedsname'] = 'Specifica&#355;i un nume pentru func&#355;ie.';
	$lang['strfunctionneedsdef'] = 'Specifica&#355;i o defini&#355;ie pentru functie.';
	$lang['strfunctioncreated'] = 'Func&#355;ie creat&#259;.';
	$lang['strfunctioncreatedbad'] = 'Creare func&#355;ie e&#351;uat&#259;.';
	$lang['strconfdropfunction'] = 'Sigur &#351;terge&#355;i func&#355;ia &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Func&#355;ie &#351;tears&#259;.';
	$lang['strfunctiondroppedbad'] = '&#350;tergere func&#355;ie e&#351;uat&#259;.';
	$lang['strfunctionupdated'] = 'Func&#355;ie actualizat&#259;.';
	$lang['strfunctionupdatedbad'] = 'Actualizare func&#355;ie e&#351;uat&#259;.';
	$lang['strobjectfile'] = 'Fi&#351;ier obiect';
	$lang['strlinksymbol'] = 'Simbol de leg&#259;tur&#259;';
	$lang['strarguments'] = 'Argumente';
	$lang['strargmode'] = 'Mod';
	$lang['strargtype'] = 'Tip';
	$lang['strargadd'] = 'Ad&#259;ugare alt argument';
	$lang['strargremove'] = 'Eliminare argument';
	$lang['strargnoargs'] = 'Aceast&#259; func&#355;ie nu accept&#259; nici un argument';
	$lang['strargenableargs'] = 'Activare argumente pasate acestei func&#355;ii';
	$lang['strargnorowabove'] = 'Trebuie s&#259; existe un r&#226;nd deasupra acestui r&#226;nd';
	$lang['strargnorowbelow'] = 'Trebuie s&#259; existe un r&#226;nd dedesubtul acestui r&#226;nd';
	$lang['strargraise'] = 'Mutare &#238;n sus';
	$lang['strarglower'] = 'Mutare &#238;n jos';
	$lang['strargremoveconfirm'] = 'Sigur elimina&#355;i acest argument? Aceast&#259; ac&#355;iune NU poate fi revocat&#259;.';

	// Triggers
	$lang['strtrigger'] = 'Declan&#351;ator';
	$lang['strtriggers'] = 'Declan&#351;atori';
	$lang['strshowalltriggers'] = 'Afi&#351;are toate declan&#351;atoarele';
	$lang['strnotrigger'] = 'Nici un declan&#351;ator g&#259;sit.';
	$lang['strnotriggers'] = 'Nici un declan&#351;ator g&#259;sit.';
	$lang['strcreatetrigger'] = 'Creare declan&#351;ator';
	$lang['strtriggerneedsname'] = 'Specifica&#355;i un nume pentru declan&#351;ator.';
	$lang['strtriggerneedsfunc'] = 'Specifica&#355;i o func&#355;ie pentru declan&#351;ator.';
	$lang['strtriggercreated'] = 'Declan&#351;ator creat.';
	$lang['strtriggercreatedbad'] = 'Creare declan&#351;ator e&#351;uat&#259;.';
	$lang['strconfdroptrigger'] = 'Sigur &#351;terge&#355;i declan&#351;atorul &quot;%s&quot; de pe &quot;%s&quot;?';
	$lang['strconfenabletrigger'] = 'Sigur activa&#355;i declan&#351;atorul &quot;%s&quot; pentru &quot;%s&quot;?';
	$lang['strconfdisabletrigger'] = 'Sigur dezactiva&#355;i declan&#351;atorul &quot;%s&quot; pentru &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Declan&#351;ator &#351;ters.';
	$lang['strtriggerdroppedbad'] = '&#350;tergere declan&#351;ator e&#351;uat&#259;.';
	$lang['strtriggerenabled'] = 'Declan&#351;ator activat';
	$lang['strtriggerenabledbad'] = 'Activare declan&#351;ator e&#351;uat&#259;';
	$lang['strtriggerdisabled'] = 'Declan&#351;ator dezactivat';
	$lang['strtriggerdisabledbad'] = 'Dezactivare declan&#351;ator e&#351;uat&#259;';
	$lang['strtriggeraltered'] = 'Declan&#351;ator modificat.';
	$lang['strtriggeralteredbad'] = 'Modificare declan&#351;ator e&#351;uat&#259;.';
	$lang['strforeach'] = 'Pentru fiecare';

	// Types
	$lang['strtype'] = 'Tip';
	$lang['strtypes'] = 'Tipuri';
	$lang['strshowalltypes'] = 'Afi&#351;are toate tipurile';
	$lang['strnotype'] = 'Nici un tip g&#259;sit.';
	$lang['strnotypes'] = 'Nici un tip g&#259;sit.';
	$lang['strcreatetype'] = 'Creare tip';
	$lang['strcreatecomptype'] = 'Creare tip compus';
	$lang['strtypeneedsfield'] = 'Specifica&#355;i cel pu&#355;in un c&#226;mp.';
	$lang['strtypeneedscols'] = 'Specifica&#355;i un num&#259;r corect de c&#259;mpuri.';
	$lang['strtypename'] = 'Nume tip';
	$lang['strinputfn'] = 'Func&#355;ie de intrare';
	$lang['stroutputfn'] = 'Func&#355;ie de ie&#351;ire';
	$lang['strpassbyval'] = 'Transmis prin valoare?';
	$lang['stralignment'] = 'Aliniere';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Delimitator';
	$lang['strstorage'] = 'Stocare';
	$lang['strfield'] = 'C&#226;mp';
	$lang['strnumfields'] = 'Num&#259;r de c&#226;mpuri';
	$lang['strtypeneedsname'] = 'Specifica&#355;i un nume pentru tip.';
	$lang['strtypeneedslen'] = 'Specifica&#355;i o lungime pentru tip.';
	$lang['strtypecreated'] = 'Tip creat.';
	$lang['strtypecreatedbad'] = 'Creare tip e&#351;uat&#259;.';
	$lang['strconfdroptype'] = 'Sigur &#351;terge&#355;i tipul &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Tip &#351;ters.';
	$lang['strtypedroppedbad'] = '&#350;tergere tip e&#351;uat&#259;.';
	$lang['strflavor'] = 'Flavor';
	$lang['strbasetype'] = 'Baz&#259;';
	$lang['strcompositetype'] = 'Compus';
	$lang['strpseudotype'] = 'Pseudo';

	// Schemas
	$lang['strschema'] = 'Schem&#259;';
	$lang['strschemas'] = 'Scheme';
	$lang['strshowallschemas'] = 'Afi&#351;are toate schemele';
	$lang['strnoschema'] = 'Nici o schem&#259; g&#259;sit&#259;.';
	$lang['strnoschemas'] = 'Nici o schem&#259; g&#259;sit&#259;.';
	$lang['strcreateschema'] = 'Creare schem&#259;';
	$lang['strschemaname'] = 'Nume schem&#259;';
	$lang['strschemaneedsname'] = 'Specifica&#355;i un nume pentru schem&#259;.';
	$lang['strschemacreated'] = 'Schem&#259; creat&#259;.';
	$lang['strschemacreatedbad'] = 'Creare schem&#259; e&#351;uat&#259;.';
	$lang['strconfdropschema'] = 'Sigur &#351;terge&#355;i schema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schem&#259; &#351;tears&#259;.';
	$lang['strschemadroppedbad'] = '&#350;tergere schem&#259; e&#351;uat&#259;.';
	$lang['strschemaaltered'] = 'Schem&#259; modificat&#259;.';
	$lang['strschemaalteredbad'] = 'Modificare schem&#259; e&#351;uat&#259;.';
	$lang['strsearchpath'] = 'Cale de c&#259;utare pentru schem&#259;';

	// Reports
	$lang['strreport'] = 'Raport';
	$lang['strreports'] = 'Rapoarte';
	$lang['strshowallreports'] = 'Afi&#351;are toate rapoartele';
	$lang['strnoreports'] = 'Nici un raport g&#259;sit.';
	$lang['strcreatereport'] = 'Creare raport';
	$lang['strreportdropped'] = 'Report dropped.';
	$lang['strreportdroppedbad'] = '&#350;tergere raport e&#351;uat&#259;.';
	$lang['strconfdropreport'] = 'Sigur &#351;terge&#355;i raportul &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Specifica&#355;i un nume pentru raport.';
	$lang['strreportneedsdef'] = 'Specifica&#355;i o instruc&#355;iune SQL pentru raport.';
	$lang['strreportcreated'] = 'Raport salvat.';
	$lang['strreportcreatedbad'] = 'Salvare raport e&#351;uat&#259;.';

	// Domains
	$lang['strdomain'] = 'Domeniu';
	$lang['strdomains'] = 'Domenii';
	$lang['strshowalldomains'] = 'Afi&#351;are toate domeniile';
	$lang['strnodomains'] = 'Nici un domeniu g&#259;sit.';
	$lang['strcreatedomain'] = 'Creare domeniu';
	$lang['strdomaindropped'] = 'Domeniu &#351;ters.';
	$lang['strdomaindroppedbad'] = '&#350;tergere domeniu e&#351;uat&#259;.';
	$lang['strconfdropdomain'] = 'Sigur &#351;terge&#355;i domeniul &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Specifica&#355;i un nume pentru domeniu.';
	$lang['strdomaincreated'] = 'Domeniu creat.';
	$lang['strdomaincreatedbad'] = 'Creare domeniu e&#351;uat&#259;.';
	$lang['strdomainaltered'] = 'Domeniu modificat.';
	$lang['strdomainalteredbad'] = 'Modificare domeniu e&#351;uat&#259;.';

	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operatori';
	$lang['strshowalloperators'] = 'Afi&#351;are to&#355;i operatorii';
	$lang['strnooperator'] = 'Nici un operator g&#259;sit.';
	$lang['strnooperators'] = 'Nici un operator g&#259;sit.';
	$lang['strcreateoperator'] = 'Creare operator';
	$lang['strleftarg'] = 'Tipul argumentului st&#226;ng';
	$lang['strrightarg'] = 'Tipul argumentului drept';
	$lang['strcommutator'] = 'Comutator';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Rela&#355;ionare';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = '&#206;mbin&#259;';
	$lang['strleftsort'] = 'Sortare st&#226;nga';
	$lang['strrightsort'] = 'Sortare dreapta';
	$lang['strlessthan'] = 'Mai mic dec&#259;t';
	$lang['strgreaterthan'] = 'Mai mare dec&#259;t';
	$lang['stroperatorneedsname'] = 'Specifica&#355;i un nume pentru operator.';
	$lang['stroperatorcreated'] = 'Operator creat.';
	$lang['stroperatorcreatedbad'] = 'Creare operator e&#351;uat&#259;.';
	$lang['strconfdropoperator'] = 'Sigur &#351;terge&#355;i operatorul &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operator &#351;ters.';
	$lang['stroperatordroppedbad'] = '&#350;tergere operator e&#351;uat&#259;.';

	// Casts
	$lang['strcasts'] = 'Conversii de tip';
	$lang['strnocasts'] = 'Nici o conversie de tip g&#259;sit&#259;.';
	$lang['strsourcetype'] = 'Tip surs&#259;';
	$lang['strtargettype'] = 'Tip destina&#355;ie';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = '&#206;n alocare';
	$lang['strbinarycompat'] = '(Compatibil binar)';

	// Conversions
	$lang['strconversions'] = 'Conversii';
	$lang['strnoconversions'] = 'Nici o conversie g&#259;sit&#259;.';
	$lang['strsourceencoding'] = 'Codificare surs&#259;';
	$lang['strtargetencoding'] = 'Codificare destina&#355;ie';

	// Languages
	$lang['strlanguages'] = 'Limbaje';
	$lang['strnolanguages'] = 'Nici un limbaj g&#259;sit.';
	$lang['strtrusted'] = 'Sigur';

	// Info
	$lang['strnoinfo'] = 'Nici o informa&#355;ie disponibil&#259;.';
	$lang['strreferringtables'] = 'Tabele referite';
	$lang['strparenttables'] = 'Tabele p&#259;rinte';
	$lang['strchildtables'] = 'Tabele copii';

	// Aggregates
	$lang['straggregate'] = 'Agregare';
	$lang['straggregates'] = 'Agreg&#259;ri';
	$lang['strnoaggregates'] = 'Nici o agregare g&#259;sit&#259;.';
	$lang['stralltypes'] = '(Toate tipurile)';
	$lang['straggrtransfn'] = 'Func&#355;ie de tranzi&#355;ie';
	$lang['strcreateaggregate'] = 'Creare agregare';
	$lang['straggrbasetype'] = 'Tip dat&#259; de intrare';
	$lang['straggrsfunc'] = 'Func&#355;ie tranzi&#355;ie de stare';
	$lang['straggrffunc'] = 'Func&#355;ie final&#259;';
	$lang['straggrinitcond'] = 'Condi&#355;ie ini&#355;ial&#259;';
	$lang['straggrsortop'] = 'Operator sortare';
	$lang['strdropaggregate'] = '&#350;tergere agregare';
	$lang['strconfdropaggregate'] = 'Sigur &#351;terge&#355;i agregarea &quot;%s&quot;?';
	$lang['straggregatedropped'] = 'Agregare &#351;tears&#259;.';
	$lang['straggregatedroppedbad'] = '&#350;tergere agregare e&#351;uat&#259;.';
	$lang['stralteraggregate'] = 'Modificare agregare';
	$lang['straggraltered'] = 'Agregare modificat&#259;.';
	$lang['straggralteredbad'] = 'Modificare agregare e&#351;uat&#259;.';
	$lang['straggrneedsname'] = 'Specifica&#355;i un nume pentru agregare';
	$lang['straggrneedsbasetype'] = 'Specifica&#355;i tipul de dat&#259; de intrare pentru agregare';
	$lang['straggrneedssfunc'] = 'Specifica&#355;i numele func&#355;iei tranzi&#355;iei de stare pentru agregare';
	$lang['straggrneedsstype'] = 'Specifica&#355;i tipul datei pentru valoarea st&#259;rii agreg&#259;rii';
	$lang['straggrcreated'] = 'Agregare creat&#259;.';
	$lang['straggrcreatedbad'] = 'Creare agregare e&#351;uat&#259;.';
	$lang['straggrshowall'] = 'Afi&#351;are toate agreg&#259;rile';

	// Operator Classes
	$lang['stropclasses'] = 'Clase de operatori';
	$lang['strnoopclasses'] = 'Nici o clas&#259; de operatori g&#259;sit&#259;.';
	$lang['straccessmethod'] = 'Metod&#259; de acces';

	// Stats and performance
	$lang['strrowperf'] = 'Performan&#355;&#259; r&#226;nd';
	$lang['strioperf'] = 'Performan&#355;&#259; I/O';
	$lang['stridxrowperf'] = 'Performan&#355;&#259; index/r&#226;nd';
	$lang['stridxioperf'] = 'Performan&#355;&#259; index I/O';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Secven&#355;ial';
	$lang['strscan'] = 'Scanare';
	$lang['strread'] = 'Citire';
	$lang['strfetch'] = 'Transfer';
	$lang['strheap'] = 'Stiv&#259;';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'Index TOAST';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disc';
	$lang['strrows2'] = 'R&#226;nduri';

	// Tablespaces
	$lang['strtablespace'] = 'Spa&#355;iu de tabele';
	$lang['strtablespaces'] = 'Spa&#355;ii de tabele';
	$lang['strshowalltablespaces'] = 'Afi&#351;are toate spa&#355;iile de tabele';
	$lang['strnotablespaces'] = 'Nici un spa&#355;iu de tabele g&#259;sit.';
	$lang['strcreatetablespace'] = 'Creare spa&#355;iu de tabele';
	$lang['strlocation'] = 'Loca&#355;ie';
	$lang['strtablespaceneedsname'] = 'Specifica&#355;i un nume pentru spa&#355;iul de tabele.';
	$lang['strtablespaceneedsloc'] = 'Specifica&#355;i directorul &#238;n care va fi creat spa&#355;iul de tabele.';
	$lang['strtablespacecreated'] = 'Spa&#355;iu de tabele creat.';
	$lang['strtablespacecreatedbad'] = 'Creare spa&#355;iu de tabele e&#351;uat&#259;.';
	$lang['strconfdroptablespace'] = 'Sigur &#351;terge&#355;i spa&#355;iul de tabele &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Spa&#355;iu de tabele &#351;ters.';
	$lang['strtablespacedroppedbad'] = '&#350;tergere &#351;pa&#355;iu de tabele e&#351;uat&#259;.';
	$lang['strtablespacealtered'] = 'Spa&#355;iu de tabele modificat.';
	$lang['strtablespacealteredbad'] = 'Modificare &#351;pa&#355;iu de tabele e&#351;uat&#259;.';

	// Slony clusters
	$lang['strcluster'] = 'Grupare';
	$lang['strnoclusters'] = 'Nici o grupare g&#259;sit&#259;.';
	$lang['strconfdropcluster'] = 'Sigur &#351;terge&#355;i gruparea &quot;%s&quot;?';
	$lang['strclusterdropped'] = 'Grupare &#351;tears&#259;.';
	$lang['strclusterdroppedbad'] = '&#350;tergere grupare e&#351;uat&#259;.';
	$lang['strinitcluster'] = 'Ini&#355;ializare grupare';
	$lang['strclustercreated'] = 'Grupare ini&#355;ializat&#259;.';
	$lang['strclustercreatedbad'] = 'Ini&#355;ializare grupare e&#351;uat&#259;.';
	$lang['strclusterneedsname'] = 'Trebuie s&#259; da&#355;i un nume grup&#259;rii.';
	$lang['strclusterneedsnodeid'] = 'Trebuie s&#259; da&#355;i un identificator nodului local.';

	// Slony nodes
	$lang['strnodes'] = 'Noduri';
	$lang['strnonodes'] = 'Nici un nod g&#259;sit.';
	$lang['strcreatenode'] = 'Creare nod';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Activ(&#259;)';
	$lang['strnodecreated'] = 'Nod creat.';
	$lang['strnodecreatedbad'] = 'Creare nod e&#351;uat&#259;.';
	$lang['strconfdropnode'] = 'Sigur &#351;terge&#355;i nodul &quot;%s&quot;?';
	$lang['strnodedropped'] = 'Nod &#351;ters.';
	$lang['strnodedroppedbad'] = '&#350;tergere nod e&#351;uat&#259;';
	$lang['strfailover'] = 'Failover';
	$lang['strnodefailedover'] = 'Node failed over.';
	$lang['strnodefailedoverbad'] = 'Node failover failed.';
	$lang['strstatus'] = 'Stare';
	$lang['strhealthy'] = 'Intact';
	$lang['stroutofsync'] = 'Desincronizat';
	$lang['strunknown'] = 'Necunoscut';

	// Slony paths
	$lang['strpaths'] = 'C&#259;i';
	$lang['strnopaths'] = 'Nici o cale g&#259;sit&#259;.';
	$lang['strcreatepath'] = 'Creare cale';
	$lang['strnodename'] = 'Nume nod';
	$lang['strnodeid'] = 'ID nod';
	$lang['strconninfo'] = '&#350;ir pentru conectare';
	$lang['strconnretry'] = 'Secunde p&#226;n&#259; la o nou&#259; &#238;ncercare de conectare';
	$lang['strpathneedsconninfo'] = 'Trebuie s&#259; da&#355;i un &#351;ir de conectare pentru cale.';
	$lang['strpathneedsconnretry'] = 'Trebuie s&#259; da&#355;i num&#259;rul de secunde p&#226;n&#259; la o nou&#259; &#238;ncercare de conectare.';
	$lang['strpathcreated'] = 'Cale creat&#259;.';
	$lang['strpathcreatedbad'] = 'Creare cale e&#351;uat&#259;.';
	$lang['strconfdroppath'] = 'Sigur &#351;terge&#355;i calea &quot;%s&quot;?';
	$lang['strpathdropped'] = 'Cale &#351;tears&#259;.';
	$lang['strpathdroppedbad'] = '&#350;tergere cale e&#351;uat&#259;.';

	// Slony listens
	$lang['strlistens'] = 'Ascult&#259;ri';
	$lang['strnolistens'] = 'Nici o ascultare g&#259;sit&#259;.';
	$lang['strcreatelisten'] = 'Creare ascultare';
	$lang['strlistencreated'] = 'Ascultare creat&#259;.';
	$lang['strlistencreatedbad'] = 'Creare ascultare e&#351;uat&#259;.';
	$lang['strconfdroplisten'] = 'Sigur &#351;terge&#355;i ascultarea &quot;%s&quot;?';
	$lang['strlistendropped'] = 'Ascultare &#351;tears&#259;.';
	$lang['strlistendroppedbad'] = '&#350;tergere ascultare e&#351;uat&#259;.';

	// Slony replication sets
	$lang['strrepsets'] = 'Seturi de replicare';
	$lang['strnorepsets'] = 'Nici un set de replicare g&#259;sit.';
	$lang['strcreaterepset'] = 'Creare set de replicare';
	$lang['strrepsetcreated'] = 'Set de replicare creat';
	$lang['strrepsetcreatedbad'] = 'Creare set de replicare e&#351;uat&#259;';
	$lang['strconfdroprepset'] = 'Sigur &#351;terge&#355;i setul de replicare &quot;%s&quot;?';
	$lang['strrepsetdropped'] = 'Set de replicare &#351;ters';
	$lang['strrepsetdroppedbad'] = '&#350;tergere set de replicare e&#351;uat&#259;.';
	$lang['strmerge'] = 'Contopire';
	$lang['strmergeinto'] = 'Contopire &#238;n';
	$lang['strrepsetmerged'] = 'Seturi de replicare contopite';
	$lang['strrepsetmergedbad'] = 'Contopire seturi de replicare e&#351;uat&#259;.';
	$lang['strmove'] = 'Mutare';
	$lang['strneworigin'] = 'Origine nou&#259;';
	$lang['strrepsetmoved'] = 'Set de replicare mutat';
	$lang['strrepsetmovedbad'] = 'Mutare set de replicare e&#351;uat&#259;.';
	$lang['strnewrepset'] = 'Set de replicare nou';
	$lang['strlock'] = 'Blocare';
	$lang['strlocked'] = 'Blocat';
	$lang['strunlock'] = 'Deblocare';
	$lang['strconflockrepset'] = 'Siguri bloca&#355;i setul de replicare &quot;%s&quot;?';
	$lang['strrepsetlocked'] = 'Set de replicare blocat';
	$lang['strrepsetlockedbad'] = 'Blocare set de replicare e&#351;uat&#259;.';
	$lang['strconfunlockrepset'] = 'Sigur debloca&#355;i setul de replicare &quot;%s&quot;?';
	$lang['strrepsetunlocked'] = 'Set de replicare deblocat';
	$lang['strrepsetunlockedbad'] = 'Deblocare set de replicare e&#351;uat&#259;.';
	$lang['strexecute'] = 'Executare';
	$lang['stronlyonnode'] = 'Numai pentru nodul';
	$lang['strddlscript'] = 'Script DDL';
	$lang['strscriptneedsbody'] = 'Trebuie s&#259; furniza&#355;i un script care s&#259; fie executat pentru toate nodurile.';
	$lang['strscriptexecuted'] = 'Scriptul DDL pentru setul de replicare a fost executat.';
	$lang['strscriptexecutedbad'] = 'Executare script DDL pentru setul de replicare e&#351;uat&#259;.';
	$lang['strtabletriggerstoretain'] = 'Urm&#259;toarele declan&#351;atoare NU vor fi dezactivate de Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Ad&#259;ugare tabel&#259;';
	$lang['strtableneedsuniquekey'] = 'Tabela ad&#259;ugat&#259; necesit&#259; o cheie primar&#259; sau unic&#259;.';
	$lang['strtableaddedtorepset'] = 'Tabel&#259; ad&#259;ugat&#259; setului de replicare.';
	$lang['strtableaddedtorepsetbad'] = 'Ad&#259;ugare tabel&#259; la setul de replicare e&#351;uat&#259;.';
	$lang['strconfremovetablefromrepset'] = 'Sigur elimina&#355;i tabela &quot;%s&quot; din setul de replicare &quot;%s&quot;?';
	$lang['strtableremovedfromrepset'] = 'Tabel&#259; eliminat&#259; din setul de replicare.';
	$lang['strtableremovedfromrepsetbad'] = 'Eliminare tabel&#259; din setul de replicare e&#351;uat&#259;.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Ad&#259;ugare secven&#355;&#259;';
	$lang['strsequenceaddedtorepset'] = 'Secven&#355;&#259; ad&#259;ugat&#259; setului de replicare.';
	$lang['strsequenceaddedtorepsetbad'] = 'Ad&#259;ugare secven&#355;&#259; la setul de replicare e&#351;uat&#259;.';
	$lang['strconfremovesequencefromrepset'] = 'Sigur elimina&#355;i secven&#355;a &quot;%s&quot; din setul de replicare &quot;%s&quot;?';
	$lang['strsequenceremovedfromrepset'] = 'Secven&#355;&#259; eliminat&#259; din setul de replicare.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Eliminare secven&#355;&#259; din setul de replicare e&#351;uat&#259;.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Subscriere';
	$lang['strnosubscriptions'] = 'Nici o subscriere g&#259;sit&#259;.';

	// Miscellaneous
	$lang['strtopbar'] = '%s rul&#226;nd pe %s:%s -- Sunte&#355;i autentificat ca utilizator &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Ajutor';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Pagini de ajutor';
	$lang['strselecthelppage'] = 'Selecta&#355;i o pagin&#259; de ajutor';
	$lang['strinvalidhelppage'] = 'Pagin&#259; de ajutor incorect&#259;.';
	$lang['strlogintitle'] = 'Autentificare la %s';
	$lang['strlogoutmsg'] = 'Ie&#351;ire din %s';
	$lang['strloading'] = '&#206;nc&#259;rcare...';
	$lang['strerrorloading'] = 'Eroare la &#238;nc&#259;rcare';
	$lang['strclicktoreload'] = 'Face&#355;i clic pentru re&#238;nc&#259;rcare';

	// Autovacuum
	$lang['strautovacuum'] = 'Autovacuum';
	$lang['strturnedon'] = 'Pornit';
	$lang['strturnedoff'] = 'Oprit';
	$lang['strenabled'] = 'Activat';
	$lang['strvacuumbasethreshold'] = 'Vacuum Base Threshold';
	$lang['strvacuumscalefactor'] = 'Vacuum Scale Factor';
	$lang['stranalybasethreshold'] = 'Analyze Base Threshold';
	$lang['stranalyzescalefactor'] = 'Analyze Scale Factor';
	$lang['strvacuumcostdelay'] = 'Vacuum Cost Delay';
	$lang['strvacuumcostlimit'] = 'Vacuum Cost Limit';

	// Table-level Locks
	$lang['strlocks'] = 'Bloc&#259;ri';
	$lang['strtransaction'] = 'ID tranzac&#355;ie';
	$lang['strprocessid'] = 'ID proces';
	$lang['strmode'] = 'Mod blocare';
	$lang['strislockheld'] = 'Blocaj re&#355;inut?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Tranzac&#355;ii preparate';
	$lang['strxactid'] = 'ID tranzac&#355;ie';
	$lang['strgid'] = 'ID global';



?>
