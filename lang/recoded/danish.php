<?php

	/**
	 * Danish language file for phpPgAdmin.
	 * created by Arne Eckmann &lt;bananstat@users.sourceforge.net&gt;
	 *
	 */

	// Language and character set
	$lang['applang'] = 'Danish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'da_DK';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'Velkommen til phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmins Hjemmeside';
	$lang['strpgsqlhome'] = 'PostgreSQLs Hjemmeside';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Dokumentation (lokalt)';
	$lang['strreportbug'] = 'Rapporter fejl';
	$lang['strviewfaq'] = 'Ofte stillede sp&#248;rgsm&#229;l';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Login mislykkedes';
	$lang['strlogindisallowed'] = 'Login forbudt';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Log ud';
	$lang['strowner'] = 'Ejer';
	$lang['straction'] = 'Handling';
	$lang['stractions'] = 'Handlinger';
	$lang['strname'] = 'Navn';
	$lang['strdefinition'] = 'Definition';
	$lang['strproperties'] = 'Egenskaber';
	$lang['strbrowse'] = 'Bladre';
	$lang['strdrop'] = 'Fjern';
	$lang['strdropped'] = 'Fjernet';
	$lang['strnull'] = 'Ingenting';
	$lang['strnotnull'] = 'Ikke ingenting';
	$lang['strfirst'] = '&lt;&lt; F&#248;rste';
	$lang['strlast'] = 'Sidste &gt;&gt;';
	$lang['strprev'] = 'Forg&#229;ende';
	$lang['strfailed'] = 'Mislykkedes';
	$lang['strnext'] = 'N&#230;ste';
	$lang['strcreate'] = 'Opret';
	$lang['strcreated'] = 'Oprettet';
	$lang['strcomment'] = 'Kommentar';
	$lang['strlength'] = 'L&#230;ngde';
	$lang['strdefault'] = 'Standardv&#230;rdi';
	$lang['stralter'] = '&#198;ndre';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Fortryd';
	$lang['strsave'] = 'Gem';
	$lang['strreset'] = 'Nulstil';
	$lang['strinsert'] = 'Inds&#230;t';
	$lang['strselect'] = 'V&#230;lg';
	$lang['strdelete'] = 'Slet';
	$lang['strupdate'] = 'Opdater';
	$lang['strreferences'] = 'Referencer';
	$lang['stryes'] = 'Ja';
	$lang['strno'] = 'Nej';
	$lang['strtrue'] = 'Sand';
	$lang['strfalse'] = 'Falsk';
	$lang['stredit'] = 'Redigere';
	$lang['strcolumn'] = 'Kolonne';
	$lang['strcolumns'] = 'Kolonner';
	$lang['strrows'] = 'R&#230;kke(r)';
	$lang['strrowsaff'] = 'R&#230;kke(r) ber&#248;rt.';
	$lang['strobjects'] = 'Objekt';
	$lang['strexample'] = 'f.eks.';
	$lang['strback'] = 'Tilbage';
	$lang['strqueryresults'] = 'S&#248;geresultat';
	$lang['strshow'] = 'Vise';
	$lang['strempty'] = 'T&#248;m';
	$lang['strlanguage'] = 'Sprog';
	$lang['strencoding'] = 'Kodning';
	$lang['strvalue'] = 'V&#230;rdi';
	$lang['strunique'] = 'Unik';
	$lang['strprimary'] = 'Prim&#230;r';
	$lang['strexport'] = 'Eksportere';
	$lang['strimport'] = 'Importere';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Udf&#248;r';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Ryd op';
	$lang['stranalyze'] = 'Analysere';
	$lang['strclusterindex'] = 'Klynge';
	$lang['strclustered'] = 'Klynget?';
	$lang['strreindex'] = 'Genindekser';
	$lang['strrun'] = 'Udf&#248;r';
	$lang['stradd'] = 'Tilf&#248;j';
	$lang['strevent'] = 'H&#230;ndelse';
	$lang['strwhere'] = 'Hvor';
	$lang['strinstead'] = 'G&#248;r i stedet';
	$lang['strwhen'] = 'N&#229;r';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Data';
	$lang['strconfirm'] = 'Bekr&#230;ft';
	$lang['strexpression'] = 'Udtryk';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Udvid';
	$lang['strcollapse'] = 'Klap sammen';
	$lang['strexplain'] = 'Forklar';
	$lang['strexplainanalyze'] = 'Forklar analyze';
	$lang['strfind'] = 'S&#248;g';
	$lang['stroptions'] = 'Alternativ';
	$lang['strrefresh'] = 'Opdater';
	$lang['strdownload'] = 'Download';
	$lang['strdownloadgzipped'] = 'Download komprimeret som gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OID&#180;er';
	$lang['stradvanced'] = 'Avanceret';
	$lang['strvariables'] = 'Variable';
	$lang['strprocess'] = 'Proces';
	$lang['strprocesses'] = 'Processer';
	$lang['strsetting'] = 'Indstilling';
	$lang['streditsql'] = 'Rediger SQL';
	$lang['strruntime'] = 'Total runtime: %s ms';
	$lang['strpaginate'] = 'Paginere resultater';
	$lang['struploadscript'] = 'eller upload et SQL script:';
	$lang['strstarttime'] = 'Starttid';
	$lang['strfile'] = 'Fil';
	$lang['strfileimported'] = 'Fil importeret.';
	$lang['strparameters'] = 'Parametrer';

	// Error handling
	$lang['strnotloaded'] = 'Du har ikke ikke indlagt korrekt databaseunderst&#248;ttelse i din PHP-installation.';
	$lang['strbadconfig'] = 'Din config.inc.php er ikke opdateret. Du er n&#248;dt til at genetablere den fra den nye config.inc.php-dist.';
	$lang['strbadencoding'] = 'Det lykkedes ikke at s&#230;tte klientkodning i databasen.';
	$lang['strbadSchema'] = 'Forkert Skema angivet.';
	$lang['strinstatement'] = 'I p&#229;standen:';
	$lang['strsqlerror'] = 'SQL fejl:';
	$lang['strinvalidparam'] = 'Ugyldig scriptparam.';
	$lang['strnodata'] = 'Ingen r&#230;kker fundet.';
	$lang['strnoobjects'] = 'Ingen objekter fundet.';
	$lang['strrownotunique'] = 'Denne r&#230;kke har ingen unik n&#248;gle.';
	$lang['strnoreportsdb'] = 'Du har ikke oprettet nogen rapportdatabase. For instruktioner l&#230;s filen INSTALL.';

	// Tables
	$lang['strtable'] = 'Tabel';
	$lang['strtables'] = 'Tabeller';
	$lang['strshowalltables'] = 'Vis alle tabeller';
	$lang['strnotables'] = 'Fandt ingen tabeller.';
	$lang['strnotable'] = 'Fandt ingen tabel.';
	$lang['strcreatetable'] = 'Opret tabel';
	$lang['strtablename'] = 'Tabelnavn';
	$lang['strtableneedsname'] = 'Tabel skal have et navn.';
	$lang['strtableneedsfield'] = 'Der skal mindst v&#230;re et felt.';
	$lang['strtableneedscols'] = 'tabeller kr&#230;ver et tilladeligt antal kolonner.';
	$lang['strtablecreated'] = 'Tabel oprettet.';
	$lang['strtablecreatedbad'] = 'Tabeloprettelse mislykkedes.';
	$lang['strconfdroptable'] = 'Er du sikker p&#229; at du vil fjerne tabellen &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabel fjernet.';
	$lang['strinsertrow'] = 'Inds&#230;t r&#230;kke';
	$lang['strtabledroppedbad'] = 'Det lykkedes ikke at fjerne tabellen.';
	$lang['strrowinserted'] = 'R&#230;kke indsat.';
	$lang['strconfemptytable'] = 'Er du sikker p&#229; at du vil t&#248;mme tabellen &quot;%s&quot;?';
	$lang['strrowupdated'] = 'R&#230;kke opdateret.';
	$lang['strrowinsertedbad'] = 'Det lykkedes ikke inds&#230;tte r&#230;kke.';
	$lang['strtableemptied'] = 'Tabellen t&#248;mt.';
	$lang['strrowupdatedbad'] = 'Opdatering af r&#230;kke mislykkedes.';
	$lang['streditrow'] = 'Rediger r&#230;kke';
	$lang['strrowdeleted'] = 'R&#230;kke slettet.';
	$lang['strrowdeletedbad'] = 'Sletning af r&#230;kke mislykkedes.';
	$lang['strfield'] = 'Felt';
	$lang['strconfdeleterow'] = 'Er du sikker p&#229; at du vil slette denne r&#230;kke?';
	$lang['strnumfields'] = 'Antal felter';
	$lang['strsaveandrepeat'] = 'Gem &amp; Forts&#230;t';
	$lang['strtableemptiedbad'] = 'Det lykkedes ikke at t&#248;mme tabellen';
	$lang['strdeleterow'] = 'Slet r&#230;kke';
	$lang['strfields'] = 'Felt';
	$lang['strfieldneedsname'] = 'Feltet skal have et navn';
	$lang['strcolumndropped'] = 'Kolonne fjernet.';
	$lang['strselectallfields'] = 'V&#230;lg alle felter';
	$lang['strselectneedscol'] = 'Der skal v&#230;lges mindst een kolonne';
	$lang['strselectunary'] = 'Unary operander kan ikke have v&#230;rdien.';
	$lang['strcolumnaltered'] = 'Kolonne &#230;ndret.';
	$lang['straltercolumn'] = '&#198;ndre kolonne';
	$lang['strcolumnalteredbad'] = 'Det lykkes ikke at &#230;ndre kolonne.';
	$lang['strconfdropcolumn'] = 'Er du sikker p&#229; at du vil fjerne kolonne &quot;%s&quot; fra tabel &quot;%s&quot;?';
	$lang['strcolumndroppedbad'] = 'Det lykkedes ikke at fjerne kolonne.';
	$lang['straddcolumn'] = 'Tilf&#248;j kolonne';
	$lang['strcolumnadded'] = 'Kolonne tif&#248;jet.';
	$lang['strcolumnaddedbad'] = 'Det lykkedes ikke at tilf&#248;je kolonne.';
	$lang['strcascade'] = 'KASKAD';
	$lang['strdataonly'] = 'Udelukkende data';
	$lang['strtablealtered'] = 'Tabel &#230;ndret.';
	$lang['strtablealteredbad'] = 'Det lykkedes ikke at &#230;ndre tabel.';
	$lang['strestimatedrowcount'] = 'Ansl&#229;et antal r&#230;kker';
	
	// Users
	$lang['struser'] = 'Bruger';
	$lang['strusers'] = 'Brugere';
	$lang['strusername'] = 'Brugernavn';
	$lang['strpassword'] = 'Password';
	$lang['strsuper'] = 'Superbruger?';
	$lang['strcreatedb'] = 'Opret database?';
	$lang['strexpires'] = 'Udl&#248;ber';
	$lang['strsessiondefaults'] = 'Sessionsindstillinger';
	$lang['strnewname'] = 'Nyt navn';
	$lang['strnousers'] = 'Der blev ikke fundet nogen brugere.';
	$lang['strrename'] = 'Omd&#248;b';
	$lang['struserrenamed'] = 'Brugernavn &#230;ndret.';
	$lang['struserrenamedbad'] = 'Det lykkedes ikke at omd&#248;be bruger.';
	$lang['struserupdated'] = 'Bruger opdateret.';
	$lang['struserupdatedbad'] = 'Opdatering af bruger mislykkedes.';
	$lang['strshowallusers'] = 'Vis alle brugere';
	$lang['strcreateuser'] = 'Opret bruger';
	$lang['struserneedsname'] = 'Bruger beh&#248;ver et navn.';
	$lang['strconfdropuser'] = 'Er du sikker p&#229; at du vil slette brugeren &quot;%s&quot;?';
	$lang['strusercreated'] = 'Bruger oprettet.';
	$lang['strusercreatedbad'] = 'Oprettelse af bruger mislykkedes.';
	$lang['struserdropped'] = 'Bruger slettet.';
	$lang['struserdroppedbad'] = 'Sletning af bruger mislykkedes.';
	$lang['straccount'] = 'Konto';
	$lang['strchangepassword'] = '&#198;ndre password';
	$lang['strpasswordchanged'] = 'Password &#230;ndret.';
	$lang['strpasswordchangedbad'] = '&#198;ndring af password mislykkedes.';
	$lang['strpasswordshort'] = 'Password er for kort.';
	$lang['strpasswordconfirm'] = 'Password er forskellig fra bekr&#230;ftelsen.';

	// Groups
	$lang['strgroup'] = 'Gruppe';
	$lang['strgroups'] = 'Grupper';
	$lang['strnogroup'] = 'Gruppe blev ikke fundet.';
	$lang['strnogroups'] = 'Ingen grupper blev fundet.';
	$lang['strcreategroup'] = 'Opret gruppe';
	$lang['strshowallgroups'] = 'Vis alle grupper';
	$lang['strgroupneedsname'] = 'Gruppen skal have et navn.';
	$lang['strgroupcreated'] = 'Gruppe oprettet.';
	$lang['strgroupdropped'] = 'Gruppe slettet.';
	$lang['strgroupcreatedbad'] = 'Oprettelse af gruppe mislykkedes.';	
	$lang['strconfdropgroup'] = 'Er du sikker p&#229; at du vil slette gruppe &quot;%s&quot;?';
	$lang['strgrant'] = 'Tildel';
	$lang['strgranted'] = 'Privilegier &#230;ndret.';
	$lang['strgroupdroppedbad'] = 'Det lykkedes ikke at fjerne gruppe.';
	$lang['straddmember'] = 'Tilf&#248;j medlem';
	$lang['strmemberadded'] = 'Medlem tilf&#248;jet.';
	$lang['strmemberaddedbad'] = 'Det lykkedes ikke at tilf&#248;je medlem.';
	$lang['strdropmember'] = 'Fjern medlem';
	$lang['strconfdropmember'] = 'Er du sikker p&#229; at du vil fjerne medlem &quot;%s&quot; fra gruppen &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Medlem fjernet.';
	$lang['strmemberdroppedbad'] = 'Det lykkedes ikke at fjerne medlem.';
	
	// Privileges	
	$lang['strprivilege'] = 'Rettighed';
	$lang['strprivileges'] = 'Rettigheder';
	$lang['strnoprivileges'] = 'Dette objekt har standard ejerrettigheder.';
	$lang['strmembers'] = 'Medlemmer';
	$lang['strrevoke'] = 'Inddrag';
	$lang['strgrantbad'] = 'Du skal angive mindst en bruger eller gruppe og mindst et privilegie.';
	$lang['strgrantfailed'] = '&#198;ndring af rettigheder mislykkedes.';
	$lang['stralterprivs'] = '&#198;ndre rettigheder';
	$lang['strdatabase'] = 'Database';
	$lang['strdatabasedropped'] = 'Database fjernet.';
	$lang['strdatabases'] = 'Databaser';
	$lang['strentersql'] = 'Indtast SQL til eksekvering :';
	$lang['strgrantor'] = 'Tilladelsesudsteder';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Database';
	$lang['strdatabases'] = 'Databaser';		
	$lang['strshowalldatabases'] = 'Vis alle databaser';
	$lang['strnodatabase'] = 'Database blev ikke fundet.';
	$lang['strnodatabases'] = 'Der blev ikke fundet nogen databaser.';
	$lang['strcreatedatabase'] = 'Opret database';
	$lang['strdatabasename'] = 'Databasenavn';
	$lang['strdatabaseneedsname'] = 'Databasen skal have et navn.';
	$lang['strdatabasecreated'] = 'Database oprettet.';
	$lang['strdatabasecreatedbad'] = 'Oprettelse af database mislykkedes.';	
	$lang['strconfdropdatabase'] = 'Er du sikker p&#229; at du vil fjerne database &quot;%s&quot;?';
	$lang['strdatabasedroppedbad'] = 'Fjernelse af database mislykkedes.';
	$lang['strentersql'] = 'Enter the SQL to execute below:';
	$lang['strsqlexecuted'] = 'SQL-kommando udf&#248;rt.';
	$lang['strvacuumgood'] = 'Vacuum udf&#248;rt.';
	$lang['strvacuumbad'] = 'Vacuum mislykkedes.';
	$lang['stranalyzegood'] = 'Analysen lykkedes.';
	$lang['stranalyzebad'] = 'Analysen mislykkedes.';
	$lang['strreindexgood'] = 'Reindeksering komplet.';
	$lang['strreindexbad'] = 'Reindeksering slog fejl.';
	$lang['strfull'] = 'Fuld';
	$lang['strfreeze'] = 'Fastfrys';
	$lang['strforce'] = 'Force';
	$lang['strsignalsent'] = 'Signal sendt.';
	$lang['strsignalsentbad'] = 'Afsendelse af signal mislykkedes.';
	$lang['strallobjects'] = 'Alle objekter';
	$lang['strstructureonly'] = 'Kun struktur';
	$lang['strstructureanddata'] = 'Struktur og data';
	
	// Views
	$lang['strview'] = 'View';
	$lang['strviews'] = 'Views';
	$lang['strshowallviews'] = 'Vis alle views';
	$lang['strnoview'] = 'Ingen view blev fundet.';
	$lang['strnoviews'] = 'Ingen views blev fundet.';
	$lang['strcreateview'] = 'Opret view';
	$lang['strviewname'] = 'Navn p&#229; view';
	$lang['strviewneedsname'] = 'View skal have et navn.';
	$lang['strviewneedsdef'] = 'Du skal angive en defintion for view.';
	$lang['strviewcreated'] = 'View oprettet.';
	$lang['strviewcreatedbad'] = 'Oprettelse af View mislykkedes.';
	$lang['strconfdropview'] = 'Er du sikker p&#229; at du vil fjerne view &quot;%s&quot;?';
	$lang['strviewdropped'] = 'View fjernet.';
	$lang['strviewdroppedbad'] = 'Fjernelse af view mislykkedes.';
	$lang['strviewupdated'] = 'View opdateret.';
	$lang['strviewupdatedbad'] = 'Opdatering af view mislykkedes.';
	$lang['strviewlink'] = 'Linking Keys';
	$lang['strviewconditions'] = 'Yderligere vilk&#229;r';
	$lang['strcreateviewwiz'] = 'Opret view med hj&#230;lp af wizard';

	// Sequences
	$lang['strsequence'] = 'Sekvens';
	$lang['strsequences'] = 'Sekvenser';
	$lang['strshowallsequences'] = 'Vis alle sekvenser';
	$lang['strnosequence'] = 'Sekvens blev ikke fundet.';
	$lang['strnosequences'] = 'Ingen sekvenser blev fundet.';
	$lang['strcreatesequence'] = 'Opret sekvens';
	$lang['strlastvalue'] = 'Seneste v&#230;rdi';
	$lang['strincrementby'] = '&#216;g med';
	$lang['strstartvalue'] = 'Startv&#230;rdi';
	$lang['strmaxvalue'] = 'St&#248;rste v&#230;rdi';
	$lang['strminvalue'] = 'Mindste v&#230;rdi';
	$lang['strcachevalue'] = 'Cachens v&#230;rdi';
	$lang['strlogcount'] = 'Log count';
	$lang['striscycled'] = 'Is cycled?';
	$lang['strsequenceneedsname'] = 'Sekvens skal have et navn.';
	$lang['strsequencecreated'] = 'Sekvens oprettet.';
	$lang['strsequencecreatedbad'] = 'Oprettelse af sekvens mislykkedes.'; 
	$lang['strconfdropsequence'] = 'Er du sikker p&#229; at du vil fjerne sekvensen &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sekvensen fjernet.';
	$lang['strsequencedroppedbad'] = 'Fjernelse af sekvens mislykkedes.';

	// Indexes
	$lang['strindex'] = 'Indeks';
	$lang['strindexes'] = 'Indekser';
	$lang['strindexname'] = 'Indeksnavn';
	$lang['strshowallindexes'] = 'Vis alle indeks';
	$lang['strnoindex'] = 'Ingen indeks blev fundet.';
	$lang['strsequencereset'] = 'Nulstil sekvens.';
	$lang['strsequenceresetbad'] = 'Nulstilling af sekvens mislykkedes.';
	$lang['strnoindexes'] = 'Ingen indeks blev fundet.';
	$lang['strcreateindex'] = 'Opret indeks';
	$lang['strindexname'] = 'Indeksnavn';
	$lang['strtabname'] = 'Tabelnavn';
	$lang['strcolumnname'] = 'Kolonnenavn';
	$lang['strindexneedsname'] = 'Indeks skal have et navn';
	$lang['strindexneedscols'] = 'Indeks kr&#230;veret gyldigt antal kolonner.';
	$lang['strindexcreated'] = 'Indeks oprettet';
	$lang['strindexcreatedbad'] = 'Oprettelse af indeks mislykkedes.';
	$lang['strconfdropindex'] = 'Er du sikker p&#229; at du vil fjerne indeks &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Indeks fjernet.';
	$lang['strindexdroppedbad'] = 'Det lykkedes ikke at fjerne indeks.';
	$lang['strkeyname'] = 'N&#248;glebetegnelse';
	$lang['struniquekey'] = 'Unik n&#248;gle';
	$lang['strprimarykey'] = 'Prim&#230;rn&#248;gle';
 	$lang['strindextype'] = 'Indekstype';
	$lang['strindexname'] = 'Indeksnavn';
	$lang['strtablecolumnlist'] = 'Tabelkolonner';
	$lang['strindexcolumnlist'] = 'Indekskolonner';
	$lang['strconfcluster'] = 'Are you sure you want to cluster &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Cluster complete.';
	$lang['strclusteredbad'] = 'Cluster failed.';

	// Rules
	$lang['strrules'] = 'Regler';
	$lang['strrule'] = 'Regel';
	$lang['strshowallrules'] = 'Vis alle regler';
	$lang['strnorule'] = 'Regel blev ikke fundet.';
	$lang['strnorules'] = 'Ingen regler blev fundet.';
	$lang['strcreaterule'] = 'Opret regel';
	$lang['strrulename'] = 'Regelnavn';
	$lang['strruleneedsname'] = 'Regel skal have et navn.';
	$lang['strrulecreated'] = 'Regel oprettet.';
	$lang['strrulecreatedbad'] = 'Oprettelse af regel mislykkedes.';
	$lang['strconfdroprule'] = 'Er du sikker p&#229; at du fjerne regel &quot;%s&quot; for &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regel fjernet.';
	$lang['strruledroppedbad'] = 'Det lykkedes ikke at fjerne regel.';

	// Constraints
	$lang['strconstraints'] = 'Afgr&#230;nsninger';
	$lang['strshowallconstraints'] = 'Vis alle afgr&#230;nsninger';
	$lang['strnoconstraints'] = 'Der blev ikke fundet nogen afgr&#230;nsninger.';
	$lang['strcreateconstraint'] = 'Opret afgr&#230;nsning';
	$lang['strconstraintcreated'] = 'Afgr&#230;nsning oprettet.';
	$lang['strconstraintcreatedbad'] = 'Det lykkedes ikke at oprette afgr&#230;nsning.';
	$lang['strconfdropconstraint'] = 'Er du sikker p&#229; at du vil fjerne afgr&#230;nsning &quot;%s&quot; for &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Afgr&#230;nsning fjernet.';
	$lang['strconstraintdroppedbad'] = 'Det lykkedes ikke at fjerne afgr&#230;nsning.';
	$lang['straddcheck'] = 'Tilf&#248;j check';
	$lang['strcheckneedsdefinition'] = 'Check afgr&#230;nsning skal defineres.';
	$lang['strcheckadded'] = 'Check tilf&#248;jet.';
	$lang['strcheckaddedbad'] = 'Det lykkedes ikke at tilf&#248;je check.';
	$lang['straddpk'] = 'Tilf&#248;j prim&#230;rn&#248;gle';
	$lang['strpkneedscols'] = 'Prim&#230;rn&#248;gle kr&#230;ver mindst en kolonne.';
	$lang['strpkadded'] = 'Prim&#230;rn&#248;gle tilf&#248;jet.';
	$lang['strpkaddedbad'] = 'Tilf&#248;jelse af prim&#230;rn&#248;gle mislykkedes.';
	$lang['stradduniq'] = 'Tilf&#248;j unik n&#248;gle';
	$lang['struniqneedscols'] = 'Unik n&#248;gle kr&#230;ver mindst een kolonne.';
	$lang['struniqadded'] = 'Unik n&#248;gle tilf&#248;jet.';
	$lang['struniqaddedbad'] = 'Tilf&#248;jelse af unik n&#248;gle mislykkedes.';
	$lang['straddfk'] = 'Tilf&#248;j ekstern n&#248;gle';
	$lang['strfkneedscols'] = 'Ekstern n&#248;gle kr&#230;ver mindst een kolonne.';
	$lang['strfkneedstarget'] = 'Ekstern n&#248;gle kr&#230;ver en m&#229;ltabel.';
	$lang['strfkadded'] = 'Ekstern n&#248;gle tilf&#248;jet.';
	$lang['strfkaddedbad'] = 'Tilf&#248;jelse af ekstern n&#248;gle mislykkedes.';
	$lang['strfktarget'] = 'M&#229;ltabel';
	$lang['strfkcolumnlist'] = 'Kolonner i n&#248;gle';
	$lang['strondelete'] = 'VED SLETNING';
	$lang['stronupdate'] = 'VED OPDATERING';

	// Functions
	$lang['strfunction'] = 'Funktion';
	$lang['strfunctions'] = 'Funktioner';
	$lang['strshowallfunctions'] = 'Vis alle funktioner';
	$lang['strnofunction'] = 'Hittade ingen funktion.';
	$lang['strnofunctions'] = 'Hittade inga funktioner.';
	$lang['strcreatefunction'] = 'Opret funktion';
	$lang['strcreateplfunction'] = 'Opret SQL/PL funktion';
	$lang['strcreateinternalfunction'] = 'Opret intern funktion';
	$lang['strcreatecfunction'] = 'Opret C funktion';
	$lang['strfunctionname'] = 'Funktionsnavn';
	$lang['strreturns'] = 'Tilbage';
	$lang['strarguments'] = 'Argumenter';
	$lang['strfunctionneedsname'] = 'Funktionen skal have et navn.';
	$lang['strfunctionneedsdef'] = 'Funktionen skal defineres.';
	$lang['strfunctioncreated'] = 'Funktion oprettet.';
	$lang['strfunctioncreatedbad'] = 'Oprettelse af funktion mislykkedes.';
	$lang['strconfdropfunction'] = 'Er du sikker p&#229; at du vil slette funktionen &quot;%s&quot;?';
	$lang['strproglanguage'] = 'Programmeringssprog';
	$lang['strfunctiondropped'] = 'Funktionen fjernet.';
	$lang['strfunctiondroppedbad'] = 'Fjernelse af funktionen mislykkedes.';
	$lang['strfunctionupdated'] = 'Funktion opdateret.';
	$lang['strfunctionupdatedbad'] = 'Opdatering af funktion mislykkedes.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggere';
	$lang['strshowalltriggers'] = 'Vis alle triggere';
	$lang['strnotrigger'] = 'Hittede ingen trigger.';
	$lang['strnotriggers'] = 'Hittede ingen trigger.';
	$lang['strcreatetrigger'] = 'Opret trigger';
	$lang['strtriggerneedsname'] = 'Trigger skal have et navn.';
	$lang['strtriggerneedsfunc'] = 'Du skal specificere en funktion for trigger.';
	$lang['strtriggercreated'] = 'Trigger oprettet.';
	$lang['strtriggerdropped'] = 'Trigger fjernet.';
	$lang['strtriggercreatedbad'] = 'Det lykkedes ikke at oprette trigger.';
	$lang['strconfdroptrigger'] = 'Er du sikker p&#229; at du vil fjerne trigger &quot;%s&quot; p&#229; &quot;%s&quot;?';
	$lang['strtriggerdroppedbad'] = 'Det lykkedes ikke at fjerne trigger.';
	

	
	$lang['strstorage'] = 'Lagring';
	$lang['strtriggeraltered'] = 'Trigger &#230;ndret.';
	$lang['strtriggeralteredbad'] = 'Det lykkedes ikke at &#230;ndre trigger.';
	
	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Typer';
	$lang['strshowalltypes'] = 'Vis alle typer';
	$lang['strnotype'] = 'Typen blev ikke fundet.';
	$lang['strnotypes'] = 'Ingen typer fundet.';

	$lang['strtypeneedslen'] = 'Du skal angive typens l&#230;ngde.';	
	
	$lang['strcreatetype'] = 'Opret type';
	$lang['strtypename'] = 'Navn p&#229; typen';
	$lang['strinputfn'] = 'Input funktion';
	$lang['stroutputfn'] = 'Output funktion';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Justering';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Begr&#230;nser';
	$lang['strtypeneedsname'] = 'Typen skal have et navn.';
	$lang['strtypecreated'] = 'Type oprettet';
	$lang['strtypecreatedbad'] = 'Det lykkedes ikke at oprette type.';
	$lang['strconfdroptype'] = 'Er du sikker p&#229; at du vil fjerne typen &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Typen fjernet.';
	$lang['strtypedroppedbad'] = 'Det lykkedes ikke at fjerne typen.';

	// Schemas
	$lang['strschema'] = 'Skema';
	$lang['strschemas'] = 'Skemaer';
	$lang['strshowallschemas'] = 'Vis alle skemaer';
	$lang['strnoschema'] = 'Der blev ikke fundet noget skema.';
	$lang['strnoschemas'] = 'Der blev ikke fundet nogen skemaer.';
	$lang['strcreateschema'] = 'Opret skema';
	$lang['strschemaname'] = 'Skemanavn';
	$lang['strschemaneedsname'] = 'Skema skal have et navn.';
	$lang['strschemacreated'] = 'Skema oprettet';
	$lang['strschemacreatedbad'] = 'Det lykkedes ikke at oprette skema.';
	$lang['strconfdropschema'] = 'Er du sikker p&#229;, at du vil fjerne skemaet &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Skema fjernet.';
	$lang['strschemadroppedbad'] = 'Det lykkedes ikka at fjerne skema.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapporter';
	$lang['strshowallreports'] = 'Vis alle rapporter';
	$lang['strtopbar'] = '%s k&#248;rer p&#229; %s:%s -- Du er logged ind som bruger &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strnoreports'] = 'Ingen rapporter fundet.';
	$lang['strcreatereport'] = 'Opret rapport';
	$lang['strreportdropped'] = 'Rapport fjernet.';
	$lang['strreportcreated'] = 'Rapport oprettet.';
	$lang['strreportneedsname'] = 'Rapport skal have et navn.';
	$lang['strreportcreatedbad'] = 'Det lykkedes ikke at oprette rapport.';
	$lang['strreportdroppedbad'] = 'Det lykkedes ikke at fjerne rapport.';
	$lang['strconfdropreport'] = 'Er du sikker p&#229;, at du vil fjerne rapporten &quot;%s&quot;?';
	$lang['strreportneedsdef'] = 'Du skal angive en SQL-foresp&#248;rgsel.';
	
	// Domains
	$lang['strdomain'] = 'Dom&#230;ne';
	$lang['strdomains'] = 'Dom&#230;ner';
	$lang['strshowalldomains'] = 'Vis alle dom&#230;ner';
	$lang['strnodomains'] = 'Ingen dom&#230;ner blev fundet.';
	$lang['strcreatedomain'] = 'Opret dom&#230;ne';
	$lang['strdomaindropped'] = 'Dom&#230;ne fjernet.';
	$lang['strdomaindroppedbad'] = 'Det lykkedes ikke at fjerne dom&#230;ne.';
	$lang['strconfdropdomain'] = 'Er du sikker p&#229; at du vil fjerne dom&#230;net &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Du skal indtaste et dom&#230;nenavn.';
	$lang['strdomaincreated'] = 'Dom&#230;ne oprettet.';
	$lang['strdomaincreatedbad'] = 'Det lykkedes ikke at oprette et dom&#230;ne.';
	$lang['strdomainaltered'] = 'Dom&#230;ne &#230;ndret.';
	$lang['strdomainalteredbad'] = 'Det lykkedes ikke at &#230;ndre dom&#230;ne.';
	
	// Operators
	$lang['stroperator'] = 'Operator';
	$lang['stroperators'] = 'Operatorer';
	$lang['strshowalloperators'] = 'Vis alle operatorer';
	$lang['strnooperator'] = 'Operator blev ikke.';
	$lang['strnooperators'] = 'Der blev ikke fundet nogen operatorer.';
	$lang['strcreateoperator'] = 'Opret operator';
	$lang['strleftarg'] = 'Left Arg Type';
	$lang['strrightarg'] = 'Right Arg Type';
	$lang['strcommutator'] = 'Commutator';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Left sort';
	$lang['strrightsort'] = 'Right sort';
	$lang['strlessthan'] = 'Less than';
	$lang['strgreaterthan'] = 'Greater than';
	$lang['stroperatorneedsname'] = 'Operator skal have et navn.';
	$lang['stroperatorcreated'] = 'Operator oprettet';
	$lang['stroperatorcreatedbad'] = 'Oprettelse af operator mislykkedes.';
	$lang['strconfdropoperator'] = 'Er du sikker p&#229;, at du vil fjerne operator &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operator fjernet.';
	$lang['stroperatordroppedbad'] = 'Fjernelse af operator mislykkedes.';

	// Casts
	$lang['strcasts'] = 'Typekonverteringer';
	$lang['strnocasts'] = 'Ingen typekonverteringer fundet.';
	$lang['strsourcetype'] = 'Kildetype';
	$lang['strtargettype'] = 'M&#229;ltype';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'Tildelt i';
	$lang['strbinarycompat'] = '(Bin&#230;rt kompatibel)';
	
	// Conversions
	$lang['strconversions'] = 'Konverteringer';
	$lang['strnoconversions'] = 'Ingen konverteringer fundet.';
	$lang['strsourceencoding'] = 'Kildekodning';
	$lang['strtargetencoding'] = 'M&#229;lkodning';
	
	// Languages
	$lang['strlanguages'] = 'Sprog';
	$lang['strnolanguages'] = 'Der blev ikke fundet noget sprog.';
	$lang['strtrusted'] = 'P&#229;lidelig(e)';
	
	// Info
	$lang['strnoinfo'] = 'Ingen tilg&#230;ngelig information.';
	$lang['strreferringtables'] = 'Refererende tabeller';
	$lang['strparenttables'] = 'Overordnede tabeller';
	$lang['strchildtables'] = 'Underordnede tabeller';

	// Aggregates
	$lang['straggregates'] = 'Sammenl&#230;gninger';
	$lang['strnoaggregates'] = 'Ingen sammenl&#230;gninger fundet.';
	$lang['stralltypes'] = '(Alle typer)';
	
	// Operator Classes
	$lang['stropclasses'] = 'Operatorklasser';
	$lang['strnoopclasses'] = 'Ingen Operatorklasser fundet.';
	$lang['straccessmethod'] = 'Tilgangsmetode';
	
	// Stats and performance
	$lang['strrowperf'] = 'Row Performance';
	$lang['strioperf'] = 'I/O Performance';
	$lang['stridxrowperf'] = 'Index Row Performance';
	$lang['stridxioperf'] = 'Index I/O Performance';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequential';
	$lang['strscan'] = 'Scan';
	$lang['strread'] = 'Read';
	$lang['strfetch'] = 'Fetch';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = 'Rows';

		// Tablespaces
	$lang['strtablespace'] = 'Tabelomr&#229;de';
	$lang['strtablespaces'] = 'Tabelomr&#229;der';
	$lang['strshowalltablespaces'] = 'Vis alle tabelomr&#229;der';
	$lang['strnotablespaces'] = 'Ingen tabelomr&#229;der fundet.';
	$lang['strcreatetablespace'] = 'Opret tabelomr&#229;der';
	$lang['strlocation'] = 'Location';
	$lang['strtablespaceneedsname'] = 'Tabelomr&#229;det skal have et navn.';
	$lang['strtablespaceneedsloc'] = 'Du skal angive hvilken mappe tabelomr&#229;det skal oprettes i.';
	$lang['strtablespacecreated'] = 'Tabelomr&#229;de oprettet.';
	$lang['strtablespacecreatedbad'] = 'Oprettelse af tabelomr&#229;de lykkedes ikke.';
	$lang['strconfdroptablespace'] = 'Er du sikker p&#229;, at du vil fjerne tabelomr&#229;de &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Tabelomr&#229;de fjernet.';
	$lang['strtablespacedroppedbad'] = 'Fjernelse af tabelomr&#229;de lykkedes ikke.';
	$lang['strtablespacealtered'] = 'Tabelomr&#229;de &#230;ndret.';
	$lang['strtablespacealteredbad'] = '&#198;ndring af tabelomr&#229;de lykkedes ikke.';
	
	// Miscellaneous
	$lang['strtopbar'] = '%s K&#248;rer p&#229; %s:%s -- Du er logged ind som bruger &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Hj&#230;lp';
	$lang['strhelpicon'] = '?';

?>
