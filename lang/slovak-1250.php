<?php

	/**
	 * Slovenska lokalizacia phpPgAdmin-u.
	 *                                      ado(at)nirvanaclub.sk
	 *
	 * $Id: slovak-1250.php,v 1.1 2003/04/17 06:11:42 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Slovensky';
	$lang['appcharset'] = 'windows-1250';
	$lang['applocale'] = 'sk_SK';

	// Basic strings
	$lang['strintro'] = 'Vitaje vo phpPgAdmin-e.';
	$lang['strlogin'] = 'Prihlásenie';
	$lang['strloginfailed'] = 'Prihlásenie zlyhalo';
	$lang['strserver'] = 'Server';
	$lang['strlogout'] = 'Odhlási';
	$lang['strowner'] = 'Vlastník';
	$lang['straction'] = 'Akcia';
	$lang['stractions'] = 'Akcie';
	$lang['strname'] = 'Meno';
	$lang['strdefinition'] = 'Definícia';
	$lang['stroperators'] = 'Operátory';
	$lang['straggregates'] = 'Agregáty';
	$lang['strproperties'] = 'Vlastnosti';
	$lang['strbrowse'] = 'Prehliada';
	$lang['strdrop'] = 'Odstráni';
	$lang['strdropped'] = 'Odstránený';
	$lang['strnull'] = 'Nulový';
	$lang['strnotnull'] = 'Ne-nulový';
	$lang['strprev'] = 'Predchádzajúci';
	$lang['strnext'] = 'Ïa¾ší';
	$lang['strfailed'] = 'Zlihalo';
	$lang['strcreate'] = 'Vytvori';
	$lang['strcreated'] = 'Vytvorené';
	$lang['strcomment'] = 'Komentár';
	$lang['strlength'] = 'Dåžka';
	$lang['strdefault'] = 'Predvolené';
	$lang['stralter'] = 'Zmeni';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Zruši';
	$lang['strsave'] = 'Uloži';
	$lang['strreset'] = 'Reset';
	$lang['strinsert'] = 'Vloži';
	$lang['strselect'] = 'Vybra';
	$lang['strdelete'] = 'Zmaza';
	$lang['strupdate'] = 'Aktualizova';
	$lang['strreferences'] = 'Referencie';
	$lang['stryes'] = 'Áno';
	$lang['strno'] = 'Nie';
	$lang['stredit'] = 'Upravi';
	$lang['strcolumns'] = 'Ståpce';
	$lang['strrows'] = 'riadky';
	$lang['strexample'] = 'napr.';
	$lang['strback'] = 'Spä';
	$lang['strqueryresults'] = 'Výsledky Dotazu';
	$lang['strshow'] = 'Ukáza';
	$lang['strempty'] = 'Vyprázdni';
	$lang['strlanguage'] = 'Jazyk';
	$lang['strencoding'] = 'Kódovanie';
	$lang['strvalue'] = 'Hodnota';
	$lang['strunique'] = 'Unikátny';
	$lang['strprimary'] = 'Primárny';
	$lang['strexport'] = 'Exportova';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Vykonaj';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyzova';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Spusti';
	$lang['stradd'] = 'Prida';
	$lang['strevent'] = 'Prípadne';
	$lang['strwhere'] = 'Kde';
	$lang['strinstead'] = 'Urobi Namiesto';
	$lang['strwhen'] = 'Kedy';
	$lang['strformat'] = 'Formát';

	// Error handling
	$lang['strnoframes'] = 'Potrebuješ prehliadaè podporujúci \"frame-y\" pre túto aplikáciu.';
	$lang['strbadconfig'] = 'Your config.inc.php is out of date. You will need to regenerate it from the new config.inc.php-dist.';
	$lang['strnotloaded'] = 'Tvoje PHP nie je skompilované s potrebnou podporou databáz.';
	$lang['strbadschema'] = 'Špecifikovaná chybná schéma.';
	$lang['strbadencoding'] = 'Nastavenie kódovania v databáze zlyhalo.';
	$lang['strsqlerror'] = 'SQL chyba:';
	$lang['strinstatement'] = 'Vo výraze:';
	$lang['strinvalidparam'] = 'Chybné parametre skriptu.';
	$lang['strnodata'] = 'Nenájdené žiadne záznamy.';

	// Tables
	$lang['strtable'] = 'Tabu¾ka';
	$lang['strtables'] = 'Tabu¾ky';
	$lang['strshowalltables'] = 'Zobrazi Všetky Tabu¾ky';
	$lang['strnotables'] = 'Nenájdené žiadne tabu¾ky.';
	$lang['strnotable'] = 'Nenájdená žiadna tabu¾ka.';
	$lang['strcreatetable'] = 'Vytvori tabu¾ku';
	$lang['strtablename'] = 'Názov tabu¾ky';
	$lang['strtableneedsname'] = 'Musíš zada názov pre tvoju tabu¾ku.';
	$lang['strtableneedsfield'] = 'Musíš špecifikova aspoò jedno pole.';
	$lang['strtableneedscols'] = 'Tabu¾ky vyžadujú a valid number of columns.';
	$lang['strtablecreated'] = 'Tabu¾ka vytvorená.';
	$lang['strtablecreatedbad'] = 'Tabu¾ka nebola vytvorená.';
	$lang['strconfdroptable'] = 'Si si istý, že chceš odstráni tabu¾ku "%s"?';
	$lang['strtabledropped'] = 'Tabu¾ka odstránená.';
	$lang['strtabledroppedbad'] = 'Tabu¾ka nebola odstránená.';
	$lang['strconfemptytable'] = 'Si si istý, že chceš vyprázsni tabu¾ku "%s"?';
	$lang['strtableemptied'] = 'Tabu¾ka vyprázdnená.';
	$lang['strtableemptiedbad'] = 'Tabu¾ka nebola vyprázdnená.';
	$lang['strinsertrow'] = 'Vloži Riadok';
	$lang['strrowinserted'] = 'Riadok vložený.';
	$lang['strrowinsertedbad'] = 'Riadok nebol vložený.';
	$lang['streditrow'] = 'Upravi Riadok';
	$lang['strrowupdated'] = 'Riadok upravený.';
	$lang['strrowupdatedbad'] = 'Riadok nebol upravený.';
	$lang['strdeleterow'] = 'Zmaza Riadok';
	$lang['strconfdeleterow'] = 'Si si istý, že chceš zmaza tento riadok?';
	$lang['strrowdeleted'] = 'Riadok zmazaný.';
	$lang['strrowdeletedbad'] = 'Riadok nebol zmazaný.';
	$lang['strsaveandrepeat'] = 'Uloži & Zopakova';
	$lang['strfield'] = 'Pole';
	$lang['strfields'] = 'Polia';
	$lang['strnumfields'] = 'Poèet Polí';
	$lang['strfieldneedsname'] = 'Musíš pomenova tvoje pole';
	$lang['strselectneedscol'] = 'Musíš vybra aspoò jeden ståpec';
	$lang['straltercolumn'] = 'Zmeni Ståpec';
	$lang['strcolumnaltered'] = 'Ståpec zmenený.';
	$lang['strcolumnalteredbad'] = 'Ståpec nebol zmenený.';
        $lang['strconfdropcolumn'] = 'Si si istý, že chceš zmaza ståpec "%s" z tabu¾ky "%s"?';
	$lang['strcolumndropped'] = 'Ståpec zmazaný.';
	$lang['strcolumndroppedbad'] = 'Ståpec nebol zmazaný.';
	$lang['straddcolumn'] = 'Prida Ståpec';
	$lang['strcolumnadded'] = 'Ståpec pridaný.';
	$lang['strcolumnaddedbad'] = 'Ståpec nebol pridaný.';
	$lang['strschemaanddata'] = 'Schéma & Dáta';
	$lang['strschemaonly'] = 'Iba Schéma';
	$lang['strdataonly'] = 'Iba Dáta';

	// Users
	$lang['struseradmin'] = 'Správa Užívate¾ov';
	$lang['struser'] = 'Užívate¾';
	$lang['strusers'] = 'Užívatelia';
	$lang['strusername'] = 'Meno užívate¾a';
	$lang['strpassword'] = 'Heslo';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Vytváranie DB?';
	$lang['strexpires'] = 'Expiruje';
	$lang['strnousers'] = 'Nenájdený žiadny užívatelia.';
	$lang['struserupdated'] = 'Užívatelia zmenený.';
	$lang['struserupdatedbad'] = 'Užívatelia neboli zmenený.';
	$lang['strshowallusers'] = 'Zobrazi Všetkých Užívate¾ov';
	$lang['strcreateuser'] = 'Vytvori Užívate¾a';
	$lang['strusercreated'] = 'Užívate¾ vytvorený.';
	$lang['strusercreatedbad'] = 'Užívate¾ nebol vytvorený.';
	$lang['strconfdropuser'] = 'Si si istý, že chceš zmaza užívate¾a "%s"?';
	$lang['struserdropped'] = 'Užívate¾ zmazaný.';
	$lang['struserdroppedbad'] = 'Užívate¾ nebol zmazaný.';
		
	// Groups
	$lang['strgroupadmin'] = 'Správa Skupín';
	$lang['strgroup'] = 'Skupina';
	$lang['strgroups'] = 'Skupiny';
	$lang['strnogroup'] = 'Skupina nenájdená.';
	$lang['strnogroups'] = 'Žiadne skupiny nenájdené.';
	$lang['strcreategroup'] = 'Vytvori Skupinu';
	$lang['strshowallgroups'] = 'Zobrazi Všetky Skupiny';
	$lang['strgroupneedsname'] = 'Musíš zada názov pre tvoju skupinu.';
	$lang['strgroupcreated'] = 'Skupina Vytvorená.';
	$lang['strgroupcreatedbad'] = 'Skupina nebola vytvorená.';	
	$lang['strconfdropgroup'] = 'Si si istý, že chceš zmaza skupinu "%s"?';
	$lang['strgroupdropped'] = 'Skupina zmazaná.';
	$lang['strgroupdroppedbad'] = 'Skupina nebola zmazaná.';
	$lang['strmembers'] = 'Èlenovia';

	// Privilges
	$lang['strprivilege'] = 'Privilégiá';
	$lang['strprivileges'] = 'Privilégiá';
	$lang['strnoprivileges'] = 'Tento objekt nemá privilégiá.';
	$lang['strgrant'] = 'Povoli';
	$lang['strrevoke'] = 'Odobra';
	$lang['strgranted'] = 'Privilégiá pridané.';
	$lang['strgrantfailed'] = 'Privilégiá neboli pridané.';
	$lang['strgrantuser'] = 'Povoli Užívate¾a';
	$lang['strgrantgroup'] = 'Povoli Skupinu';

	// Databases
	$lang['strdatabase'] = 'Databáza';
	$lang['strdatabases'] = 'Databázy';
	$lang['strshowalldatabases'] = 'Zobrazi všetky databázy';
	$lang['strnodatabase'] = 'Nenájdená žiadna Databáza.';
	$lang['strnodatabases'] = 'Nenájdené žiadne Databázy.';
	$lang['strcreatedatabase'] = 'Vytvori databázu';
	$lang['strdatabasename'] = 'Názov databázy';
	$lang['strdatabaseneedsname'] = 'Musíš zada názov pre tvoju databázu.';
	$lang['strdatabasecreated'] = 'Databáza vytvorená.';
	$lang['strdatabasecreatedbad'] = 'Databáza nebola vytvorená.';	
	$lang['strconfdropdatabase'] = 'Si si istý, že chceš zmaza databázu "%s"?';
	$lang['strdatabasedropped'] = 'Databáze zmazaná.';
	$lang['strdatabasedroppedbad'] = 'Databáza nebola zmazaná.';
	$lang['strentersql'] = 'Vloži SQL dotaz:';
	$lang['strvacuumgood'] = 'Vyèistenie kompletné.';
	$lang['strvacuumbad'] = 'Vyèistnie zlyhalo.';
	$lang['stranalyzegood'] = 'Analyzovanie kompletné.';
	$lang['stranalyzebad'] = 'Analyzovanie zlyhalo.';

	// Views
	$lang['strview'] = 'Náh¾ady (Views)';
	$lang['strviews'] = 'Náh¾ady';
	$lang['strshowallviews'] = 'Zobrazi Všetky Náh¾ady';
	$lang['strnoview'] = 'Nenájdený žiadny náh¾ad.';
	$lang['strnoviews'] = 'Nenájdené žiadne náh¾ady.';
	$lang['strcreateview'] = 'Vytvori Náh¾ad';
	$lang['strviewname'] = 'Názov náh¾adu';
	$lang['strviewneedsname'] = 'Musíš zada názov pre tvoj náh¾ad.';
	$lang['strviewneedsdef'] = 'Musíš zada definíciu pre tvoj náh¾ad.';
	$lang['strviewcreated'] = 'Náh¾ad vytvorený.';
	$lang['strviewcreatedbad'] = 'Náh¾ad nebol vytvorený.';
	$lang['strconfdropview'] = 'Si si istý, že chceš zmaza náh¾ad "%s"?';
	$lang['strviewdropped'] = 'Náh¾ad zmazaný.';
	$lang['strviewdroppedbad'] = 'Náh¾ad nebol zmazaný.';
	$lang['strviewupdated'] = 'Náh¾ad upravený.';
	$lang['strviewupdatedbad'] = 'Náh¾ad nebol upravený.';

	// Sequences
	$lang['strsequence'] = 'Sekvencie';
	$lang['strsequences'] = 'Sekvencie';
	$lang['strshowallsequences'] = 'Zobrazi Všetky Sekvencie';
	$lang['strnosequence'] = 'Žiadna sekvencia nenájdená.';
	$lang['strnosequences'] = 'Žiadne sekvencie nenájdené.';
	$lang['strcreatesequence'] = 'Vytvori Sekvenciu';
	$lang['strlastvalue'] = 'Posledná Hodnota';
	$lang['strincrementby'] = 'Inkrementova od';	
	$lang['strstartvalue'] = 'Start Hodnota';
	$lang['strmaxvalue'] = 'Max Hodnota';
	$lang['strminvalue'] = 'Min Hodnota';
	$lang['strcachevalue'] = 'Cache Hodnota';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Je Cycled?';
	$lang['striscalled'] = 'Je Called?';
	$lang['strsequenceneedsname'] = 'Musíš zada názov pre tvoju sekvenciu.';
	$lang['strsequencecreated'] = 'Sekvencia vytvorená.';
	$lang['strsequencecreatedbad'] = 'Sekvencia nebola vytvorená.'; 
	$lang['strconfdropsequence'] = 'Si si istý, že chceš zmaza sekvenciu "%s"?';
	$lang['strsequencedropped'] = 'Sekvencia zmazaná.';
	$lang['strsequencedroppedbad'] = 'Sekvencia nebol zmazaná.';

	// Indexes
	$lang['strindexes'] = 'Indexy';
	$lang['strindexname'] = 'Názov Indexu';
	$lang['strshowallindexes'] = 'Zobrazi Všetky Indexy';
	$lang['strnoindex'] = 'Nenájdený žiadny index.';
	$lang['strnoindexes'] = 'Nenájdené žiadne indexy.';
	$lang['strcreateindex'] = 'Vytvori Index';
	$lang['strindexname'] = 'Názov indexu';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Názov ståpca';
	$lang['strindexneedsname'] = 'Musíš zada názov pre tvoj index';
	$lang['strindexneedscols'] = 'Index vyžaduje a valid number of columns.';
	$lang['strindexcreated'] = 'Index vytvorený';
	$lang['strindexcreatedbad'] = 'Index nebol vytvorený.';
	$lang['strconfdropindex'] = 'Si si istý, že chceš zmaza index "%s"?';
	$lang['strindexdropped'] = 'Index zmazaný.';
	$lang['strindexdroppedbad'] = 'Index nebol zmazaný.';
	$lang['strkeyname'] = 'Názov K¾úèu';
	$lang['struniquekey'] = 'Unikátny K¾úè';
	$lang['strprimarykey'] = 'Primárny K¾úè';
 	$lang['strindextype'] = 'Typ indexu';
	$lang['strindexname'] = 'Názov indexu';
	$lang['strtablecolumnlist'] = 'Ståpce v Tabu¾ke';
	$lang['strindexcolumnlist'] = 'St¾pce v Indexe';

	// Rules
	$lang['strrules'] = 'Pravidlá (Rules)';
	$lang['strrule'] = 'Pravidlo';
	$lang['strshowallrules'] = 'Zobrazi Všetky Pravidlá';
	$lang['strnorule'] = 'Nenájdené žiadne pravidlo.';
	$lang['strnorules'] = 'Nenájdené žiadne pravidlá.';
	$lang['strcreaterule'] = 'Vytvori pravidlo';
	$lang['strrulename'] = 'Názov pravidla';
	$lang['strruleneedsname'] = 'Musíš zada názov pre tvoje pravidlo.';
	$lang['strrulecreated'] = 'Pravidlo vytvorené.';
	$lang['strrulecreatedbad'] = 'Pravidlo nebolo vytvorené.';
	$lang['strconfdroprule'] = 'Si si istý, že chceš zmaza pravidlo "%s" na "%s"?';
	$lang['strruledropped'] = 'Pravidlo zmazané.';
	$lang['strruledroppedbad'] = 'Pravidlo nebolo zmazané.';

	// Constraints
	$lang['strconstraints'] = 'Obmedzenia (Constraints)';
	$lang['strshowallconstraints'] = 'Zobrazi Všetky Obmedzenia';
	$lang['strnoconstraints'] = 'Nenájdené žiadne obmedzenie.';
	$lang['strcreateconstraint'] = 'Vytvori Obmedzenie';
	$lang['strconstraintcreated'] = 'Obmedzenie vytvorené.';
	$lang['strconstraintcreatedbad'] = 'Obmedzenie nebolo vytvorené.';
	$lang['strconfdropconstraint'] = 'Si si istý, že chceš zmaza obmedzenie "%s" na "%s"?';
	$lang['strconstraintdropped'] = 'Obmedzenie zmazané.';
	$lang['strconstraintdroppedbad'] = 'Obmedzenie nebolo zmazané.';
	$lang['straddcheck'] = 'Prida Overovanie';
	$lang['strcheckneedsdefinition'] = 'Overovanie Obmedzenia vyžaduje jeho definovanie.';
	$lang['strcheckadded'] = 'Overovanie obmedzenia pridané.';
	$lang['strcheckaddedbad'] = 'Overovanie obmedzenia nebolo pridané.';
	$lang['straddpk'] = 'Prida Primárny K¾úè';
	$lang['strpkneedscols'] = 'Primárny k¾úè vyžaduje aspoò jeden ståpec.';
	$lang['strpkadded'] = 'Primárny k¾úè pridaný.';
	$lang['strpkaddedbad'] = 'Primárny k¾úè nebol pridaný.';
	$lang['stradduniq'] = 'Prida Unikátny K¾úè';
	$lang['struniqneedscols'] = 'Unikátny k¾úè vyžaduje aspoò jeden ståpec.';
	$lang['struniqadded'] = 'Unikátny k¾úè pridaný.';
	$lang['struniqaddedbad'] = 'Unikátny k¾úè nebol pridaný.';
	$lang['straddfk'] = 'Prida Cudzí K¾úè';
	$lang['strfkneedscols'] = 'Cudzí k¾úè vyžaduje aspoò jeden ståpec.';
	$lang['strfkadded'] = 'Cudzí k¾úè pridaný.';
	$lang['strfkaddedbad'] = 'Cudzí k¾úè nebol pridaný.';
	$lang['strfktarget'] = 'Cie¾ová tabu¾ka';

	// Functions
	$lang['strfunction'] = 'Funkcia';
	$lang['strfunctions'] = 'Funkcie';
	$lang['strshowallfunctions'] = 'Zobrazi všetky funkcie';
	$lang['strnofunction'] = 'Nenájdená žiadna funkcia.';
	$lang['strnofunctions'] = 'Nenájdené žiadne funkcie.';
	$lang['strcreatefunction'] = 'Vytvori funkciu';
	$lang['strfunctionname'] = 'Názov funkcie';
	$lang['strreturns'] = 'Vracia';
	$lang['strarguments'] = 'Argumenty';
	$lang['strfunctionneedsname'] = 'Musíš zada názov pre tvoju funkciu.';
	$lang['strfunctionneedsdef'] = 'Musíš zada definíciu pre tvoju funkciu.';
	$lang['strfunctioncreated'] = 'Funkcia vytvorená.';
	$lang['strfunctioncreatedbad'] = 'Funkcia nebola vytvorená.';
	$lang['strconfdropfunction'] = 'Si si istý, že chceš zmaza funkciu "%s"?';
	$lang['strfunctiondropped'] = 'Funkcia zmazaná.';
	$lang['strfunctiondroppedbad'] = 'Funkcia nebola zmazaná.';
	$lang['strfunctionupdated'] = 'Funkcia upravená.';
	$lang['strfunctionupdatedbad'] = 'Funkcia nebola upravená.';

	// Triggers
	$lang['strtrigger'] = 'Medzipravidlá (Trigger)';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Zobrazi Všetky \"Triggers\"';
	$lang['strnotrigger'] = 'Nenájdená žiadna \"Trigger\".';
	$lang['strnotriggers'] = 'Nenájdené žiadne \"Triggers\".';
	$lang['strcreatetrigger'] = 'Vytvori \"Trigger\"';
	$lang['strtriggerneedsname'] = 'Musíš zada názov pre tvoju \"Trigger\".';
	$lang['strtriggerneedsfunc'] = 'Musíš zada funkciu pre tvoju \"Trigger\".';
	$lang['strtriggercreated'] = '\"Trigger\" vytvorená.';
	$lang['strtriggercreatedbad'] = '\"Trigger\" nebola vytvorená.';
	$lang['strconfdroptrigger'] = 'Si si istý, že chceš zmaza \"Trigger\" "%s" na "%s"?';
	$lang['strtriggerdropped'] = '\"Trigger\" zmazaná.';
	$lang['strtriggerdroppedbad'] = '\"Triggers\" nebola zmazaná.';

	// Types
	$lang['strtype'] = 'Typ';
	$lang['strtypes'] = 'Typy';
	$lang['strshowalltypes'] = 'Zobrazi Všetky typy';
	$lang['strnotype'] = 'Nenájdený žiadny typ.';
	$lang['strnotypes'] = 'Nenájdené žiadne typy.';
	$lang['strcreatetype'] = 'Vytvori Typ';
	$lang['strtypename'] = 'Názov typu';
	$lang['strinputfn'] = 'Vstupná funkcia';
	$lang['stroutputfn'] = 'Výstupná funkcia';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Delimiter';
	$lang['strstorage'] = 'Storage';
	$lang['strtypeneedsname'] = 'Musíš zada názov pre tvoj typ.';
	$lang['strtypeneedslen'] = 'Musíš zada dåžku pre tvoj typ.';
	$lang['strtypecreated'] = 'Typ Vytvorený';
	$lang['strtypecreatedbad'] = 'Typ nebol vytvorený.';
	$lang['strconfdroptype'] = 'Si si istý, že chceš zmaza typ "%s"?';
	$lang['strtypedropped'] = 'Typ zmazaný.';
	$lang['strtypedroppedbad'] = 'Typ nebol zmazaný.';

	// Schemas
	$lang['strschema'] = 'Schéma (Schemas)';
	$lang['strschemas'] = 'Schémy';
	$lang['strshowallschemas'] = 'Zobrazi Všetky Schémy';
	$lang['strnoschema'] = 'Nenájdená žiadna schéma.';
	$lang['strnoschemas'] = 'Nenájdené žiadne schémy.';
	$lang['strcreateschema'] = 'Vytvori Schému';
	$lang['strschemaname'] = 'Názov Schémy';
	$lang['strschemaneedsname'] = 'Musíš zada názov pre tvoju schému.';
	$lang['strschemacreated'] = 'Schéma vytvorená';
	$lang['strschemacreatedbad'] = 'Schéma nebola vytvorená.';
	$lang['strconfdropschema'] = 'Si si istý, že chceš zmaza schému "%s"?';
	$lang['strschemadropped'] = 'Schéma zmazaná.';
	$lang['strschemadroppedbad'] = 'Schéma nebola zmazaná.';

	// Reports
	$lang['strreport'] = 'Reporty';
	$lang['strreports'] = 'Reporty';
	$lang['strshowallreports'] = 'Zobrazi Všetky Reporty';
	$lang['strnoreports'] = 'Nenájdené žiadne reporty.';
	$lang['strcreatereport'] = 'Vytvori Report';
	$lang['strreportdropped'] = 'Report zmazaný.';
	$lang['strreportdroppedbad'] = 'Report nebol zmazaný.';
	$lang['strconfdropreport'] = 'Si si istý, že chceš zmaza report "%s"?';
	$lang['strreportneedsname'] = 'Musíš zada názov pre tvoj report.';
	$lang['strreportneedsdef'] = 'Musíš zada SQL dotaz pre tvoj report.';
	$lang['strreportcreated'] = 'Report uložený.';
	$lang['strreportcreatedbad'] = 'Report nebol uložený.';

	// Miscellaneous
	$lang['strtopbar'] = '%s beží na %s:%s -- Si prihlásený ako "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
