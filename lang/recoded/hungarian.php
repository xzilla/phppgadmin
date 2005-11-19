<?php

	/**
	 * Hungarian language file for phpPgAdmin.
	 * maintainer: Sulyok Peti &lt;peti@sulyok.hu&gt;
	 *
	 *
	 */

	// Language and character set
	$lang['applang'] = 'Magyar';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'hu_HU';
	$lang['appdbencoding'] = 'LATIN2';  // It would be good to change this to UNICODE. IMHO
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = '&#220;dv&#246;zli a phpPgAdmin!';
	$lang['strppahome'] = 'A phpPgAdmin honlapja';
	$lang['strpgsqlhome'] = 'A PostgreSQL honlapja';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'A PostgreSQL (helyi) dokument&#225;ci&#243;ja';
	$lang['strreportbug'] = 'Hibajelent&#233;s felad&#225;sa';
	$lang['strviewfaq'] = 'GYIK megtekint&#233;se';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Bejelentkez&#233;s';
	$lang['strloginfailed'] = 'Sikertelen bejelentkez&#233;s';
	$lang['strlogindisallowed'] = 'Nem enged&#233;lyezett bejelentkez&#233;s';
	$lang['strserver'] = 'Kiszolg&#225;l&#243;';
	$lang['strservers']  =  'Kiszolg&#225;l&#243;k';
	$lang['strintroduction']  =  'Bevezet&#337;';
	$lang['strhost']  =  'Gazda';
	$lang['strport']  =  'Kapu';
	$lang['strlogout'] = 'Kil&#233;p&#233;s';
	$lang['strowner'] = 'Tulajdonos';
	$lang['straction'] = 'M&#369;velet';
	$lang['stractions'] = 'M&#369;veletek';
	$lang['strname'] = 'N&#233;v';
	$lang['strdefinition'] = 'Defin&#237;ci&#243;';
	$lang['strproperties'] = 'Tulajdons&#225;gok';
	$lang['strbrowse'] = 'Tall&#243;z&#225;s';
	$lang['strdrop'] = 'T&#246;rl&#233;s';
	$lang['strdropped'] = 'T&#246;rl&#246;lve';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = '&lt; El&#337;z&#337;';
	$lang['strnext'] = 'K&#246;vetkez&#337; &gt;';
	$lang['strfirst'] = '&lt;&lt; Els&#337;';
	$lang['strlast'] = 'Utols&#243; &gt;&gt;';
	$lang['strfailed'] = 'Sikertelen';
	$lang['strcreate'] = 'Teremt&#233;s';
	$lang['strcreated'] = 'Megteremtve';
	$lang['strcomment'] = 'Megjegyz&#233;s';
	$lang['strlength'] = 'Hossz';
	$lang['strdefault'] = 'Alap&#233;rtelmez&#233;s';
	$lang['stralter'] = 'M&#243;dos&#237;t&#225;s';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'M&#233;gsem';
	$lang['strsave'] = 'Ment&#233;s';
	$lang['strreset'] = '&#218;jra';
	$lang['strinsert'] = 'Besz&#250;r&#225;s';
	$lang['strselect'] = 'Kiv&#225;laszt&#225;s';
	$lang['strdelete'] = 'T&#246;rl&#233;s';
	$lang['strupdate'] = 'Id&#337;szer&#369;s&#237;t&#233;s';
	$lang['strreferences'] = 'Hivatkoz&#225;sok';
	$lang['stryes'] = 'Igen';
	$lang['strno'] = 'Nem';
	$lang['strtrue'] = 'IGAZ';
	$lang['strfalse'] = 'HAMIS';
	$lang['stredit'] = 'Szerkeszt&#233;s';
	$lang['strcolumn']  = 'Oszlop';
	$lang['strcolumns'] = 'Oszlopok';
	$lang['strrows'] = 'sor';
	$lang['strrowsaff'] = 'sor &#233;rintett.';
	$lang['strobjects'] = 'objektum';
	$lang['strback'] = 'Vissza';
	$lang['strqueryresults'] = 'Lek&#233;rdez&#233;s eredm&#233;nyei';
	$lang['strshow'] = 'Megjelen&#237;t&#233;s';
	$lang['strempty'] = '&#220;r&#237;t&#233;s';
	$lang['strlanguage'] = 'Nyelv';
	$lang['strencoding'] = 'K&#243;dol&#225;s';
	$lang['strvalue'] = '&#201;rt&#233;k';
	$lang['strunique'] = 'egyedi';
	$lang['strprimary'] = 'Els&#337;dleges';
	$lang['strexport'] = 'Export&#225;l&#225;s';
	$lang['strimport'] = 'Import&#225;l&#225;s';
	$lang['strallowednulls']  =  'Enged&#233;lyezett NULL bet&#369;k';
	$lang['strbackslashn']  =  '\N';
	$lang['strnull']  =  'Null';           //
	$lang['strnull']  =  'NULL (A sz&#243;)';   // double??
	$lang['stremptystring']  =  '&#220;res sz&#246;veg/mez&#337;';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Gazda';
	$lang['strvacuum'] = 'Takar&#237;t&#225;s';
	$lang['stranalyze'] = 'Elemz&#233;s';
	$lang['strclusterindex'] = 'F&#252;rt&#246;z&#233;s';
	$lang['strclustered'] = 'F&#252;rt&#246;zve?';
	$lang['strreindex'] = '&#218;jraindexel&#233;s';
	$lang['strrun'] = 'Futtat&#225;s';
	$lang['stradd'] = 'B&#337;v&#237;t&#233;s';
	$lang['strremove']  =  'T&#246;rl&#233;s';
	$lang['strevent'] = 'Esem&#233;ny';
	$lang['strwhere'] = 'Hol';
	$lang['strinstead'] = 'Ink&#225;bb';
	$lang['strwhen'] = 'Mikor';
	$lang['strformat'] = 'Alak';
	$lang['strdata'] = 'Adatok';
	$lang['strconfirm'] = 'Meger&#337;s&#237;t&#233;s';
	$lang['strexpression'] = 'Kifejez&#233;s';
	$lang['strellipsis'] = '&#8230;';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Kinyit&#225;s';
	$lang['strcollapse'] = '&#214;sszecsuk&#225;s';
	$lang['strexplain'] = 'Kifejt&#233;s';
	$lang['strexplainanalyze'] = 'Elemz&#233;s kifejt&#233;se';
	$lang['strfind'] = 'Keres&#233;s';
	$lang['stroptions'] = 'R&#233;szletek';
	$lang['strrefresh'] = 'Friss&#237;t&#233;s';
	$lang['strdownload'] = 'Let&#246;lt&#233;s';
	$lang['strdownloadgzipped'] = 'Gzippel t&#246;m&#246;r&#237;tett let&#246;lt&#233;s';
	$lang['strinfo'] = 'Inf&#243;';
	$lang['stroids'] = 'OID-k';
	$lang['stradvanced'] = 'Halad&#243;';
	$lang['strvariables'] = 'V&#225;ltoz&#243;k';
	$lang['strprocess'] = 'Folyamat';
	$lang['strprocesses'] = 'Folyamatok';
	$lang['strsetting'] = 'Be&#225;ll&#237;t&#225;s';
	$lang['streditsql'] = 'SQL-szerkeszt&#233;s';
	$lang['strruntime'] = 'Teljes fut&#225;si id&#337;: %s ms';
	$lang['strpaginate'] = 'Oldalakra t&#246;rdel&#233;s';
	$lang['struploadscript'] = 'vagy egy SQL-&#237;r&#225;s felt&#246;lt&#233;se:';
	$lang['strstarttime'] = 'Kezd&#233;s ideje';
	$lang['strfile'] = 'F&#225;jl';
	$lang['strfileimported'] = 'F&#225;jl behozva.';
	$lang['strtrycred']  =  'Haszn&#225;lja minden kiszolg&#225;l&#243;hoz e be&#225;ll&#237;t&#225;sokat';

	// Error handling
	$lang['strnoframes']  =  'Ez alkalmaz&#225;s legjobban kereteket t&#225;mogat&#243; b&#246;ng&#233;sz&#337;vel m&#369;k&#246;dik, de haszn&#225;lhat&#243; keretek n&#233;lk&#252;l is az al&#225;bbi hivatkoz&#225;sra kattintva.';
	$lang['strnoframeslink']  =  'Keretek n&#233;lk&#252;li haszn&#225;lat';
	$lang['strbadconfig'] = 'A config.inc.php elavult. &#218;jra kell teremteni az &#250;j config.inc.php-dist f&#225;jlb&#243;l.';
	$lang['strnotloaded'] = 'Az &#246;n PHP rendszere nem t&#225;mogatja a PostgreSQL-t.';
	$lang['strpostgresqlversionnotsupported']  =  'A PostgreSQL e v&#225;ltozata nem megfelel&#337;. K&#233;rem telep&#237;tse a %s v&#225;ltozatot, vagy &#250;jabbat!';
	$lang['strbadschema'] = 'A megadott s&#233;ma &#233;rv&#233;nytelen.';
	$lang['strbadencoding'] = 'Az &#252;gyf&#233;l oldali k&#243;dol&#225;s be&#225;ll&#237;t&#225;sa az adatb&#225;zisban nem siker&#252;lt.';
	$lang['strsqlerror'] = 'SQL hiba:';
	$lang['strinstatement'] = 'A k&#246;vetkez&#337; kifejez&#233;sben:';
	$lang['strinvalidparam'] = '&#201;rv&#233;nytelen &#237;r&#225;s-param&#233;terek.';
	$lang['strnodata'] = 'Nincsenek sorok.';
	$lang['strnoobjects'] = 'Nincsenek objektumok.';
	$lang['strrownotunique'] = 'Nincs egyedi azonos&#237;t&#243; ehhez a sorhoz.';
	$lang['strnoreportsdb'] = '&#214;n m&#233;g nem teremtette meg a jelent&#233;sek adatb&#225;zis&#225;t. Olvassa el az INSTALL f&#225;jlt tov&#225;bbi &#250;tmutat&#225;s&#233;rt!';
	$lang['strnouploads'] = 'F&#225;jl felt&#246;lt&#233;se letiltva.';
	$lang['strimporterror'] = 'Behozatali hiba.';
	$lang['strimporterror-fileformat']  =  'Behozatali hiba: nem siker&#252;lt automatikusan meg&#225;llap&#237;tani a f&#225;jl form&#225;tum&#225;t.';
	$lang['strimporterrorline'] = 'Behozatali hiba a %s. sorban.';
	$lang['strimporterrorline-badcolumnnum']  =  'Behozatali hiba a(z) %s. sz&#225;m&#250; sorban:  A sor nem tartalmazza a megfelel&#337; sz&#225;m&#250; sort.';
	$lang['strimporterror-uploadedfile']  =  'Behozatali hiba: A f&#225;jlt nem siker&#252;lt felt&#252;lteni a kiszolg&#225;l&#243;ra.';
	$lang['strcannotdumponwindows']  =  '&#214;sszetett t&#225;bla &#246;mleszt&#233;se &#233;s s&#233;ma nevek Windows-on nem t&#225;mogatottak.';

	// Tables
	$lang['strtable'] = 'T&#225;bla';
	$lang['strtables'] = 'T&#225;bl&#225;k';
	$lang['strshowalltables'] = 'Minden t&#225;bla megjelen&#237;t&#233;se';
	$lang['strnotables'] = 'Nincsenek t&#225;bl&#225;k.';
	$lang['strnotable'] = 'Nincs t&#225;bla.';
	$lang['strcreatetable'] = 'T&#225;bla teremt&#233;se';
	$lang['strtablename'] = 'T&#225;bla neve';
	$lang['strtableneedsname'] = 'Meg kell adni a t&#225;bla nev&#233;t.';
	$lang['strtableneedsfield'] = 'Legal&#225;bb egy oszlopot meg kell adni.';
	$lang['strtableneedscols'] = 'A t&#225;bl&#225;nak &#233;rv&#233;nyes sz&#225;m&#250; oszlop kell.';
	$lang['strtablecreated'] = 'A t&#225;bla megteremtve.';
	$lang['strtablecreatedbad'] = 'Nem siker&#252;lt t&#225;bl&#225;t teremteni.';
	$lang['strconfdroptable'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strtabledropped'] = 'A t&#225;bla t&#246;r&#246;lve.';
	$lang['strtabledroppedbad'] = 'Nem siker&#252;lt a t&#225;bl&#225;t t&#246;r&#246;lni.';
	$lang['strconfemptytable'] = 'Biztosan ki akarja &#252;r&#237;teni &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strtableemptied'] = 'A t&#225;bla ki&#252;r&#237;tve.';
	$lang['strtableemptiedbad'] = 'Nem siker&#252;lt a t&#225;bl&#225;t ki&#252;r&#237;teni.';
	$lang['strinsertrow'] = 'Sor besz&#250;r&#225;sa';
	$lang['strrowinserted'] = 'A sor besz&#250;rva.';
	$lang['strrowinsertedbad'] = 'Nem siker&#252;lt a sort besz&#250;rni.';
	$lang['strrowduplicate']  =  'Sor besz&#250;r&#225;sa sikertelen. Dupla besz&#250;r&#225;si k&#237;s&#233;rlet.';
	$lang['streditrow'] = 'Sor szerkeszt&#233;se';
	$lang['strrowupdated'] = 'A sor id&#337;szer&#369;s&#237;tve.';
	$lang['strrowupdatedbad'] = 'Nem siker&#252;lt a sort id&#337;szer&#369;s&#237;teni.';
	$lang['strdeleterow'] = 'Sor t&#246;rl&#233;se';
	$lang['strconfdeleterow'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja ezt a sort?';
	$lang['strrowdeleted'] = 'A sor t&#246;r&#246;lve.';
	$lang['strrowdeletedbad'] = 'Nem siker&#252;lt a sort t&#246;r&#246;lni.';
	$lang['strinsertandrepeat']  =  'Besz&#250;r&#225;s &amp; Ism&#233;tl&#233;s';
	$lang['strnumcols']  =  'Oszlopok sz&#225;ma';
	$lang['strcolneedsname']  =  'Meg kell adnia az oszlop nev&#233;t';
	$lang['strselectallfields'] = 'Minden oszlop kijel&#246;l&#233;se';
	$lang['strselectneedscol'] = 'Ki kell v&#225;lasztani egy oszlopot';
	$lang['strselectunary'] = 'Egyv&#225;ltoz&#243;s m&#369;veleteknek nem lehetnek &#233;rt&#233;kei';
	$lang['straltercolumn'] = 'Oszlop megv&#225;ltoztat&#225;sa';
	$lang['strcolumnaltered'] = 'Az oszlop megv&#225;ltoztatva.';
	$lang['strcolumnalteredbad'] = 'Nem siker&#252;lt az oszlopot megv&#225;ltoztatni.';
	$lang['strconfdropcolumn'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; oszlopot &#8222;%s&#8221; t&#225;bl&#225;b&#243;l?';
	$lang['strcolumndropped'] = 'Az oszlop t&#246;r&#246;lve.';
	$lang['strcolumndroppedbad'] = 'Nem siker&#252;lt az oszlopot t&#246;r&#246;lni.';
	$lang['straddcolumn'] = 'Oszloppal b&#337;v&#237;t&#233;s';
	$lang['strcolumnadded'] = 'Oszloppal b&#337;v&#237;tve.';
	$lang['strcolumnaddedbad'] = 'Nem siker&#252;lt az oszloppal b&#337;v&#237;teni.';
	$lang['strcascade'] = 'ZUHATAG';
	$lang['strtablealtered'] = 'A t&#225;bla megv&#225;ltoztatva.';
	$lang['strtablealteredbad'] = 'Nem siker&#252;lt a t&#225;bl&#225;t megv&#225;ltoztatni.';
	$lang['strdataonly'] = 'Csak adatok';
	$lang['strstructureonly'] = 'Csak strukt&#250;ra';
	$lang['strstructureanddata'] = 'Strukt&#250;ra &#233;s adatok';
	$lang['strtabbed'] = 'F&#252;les';
	$lang['strauto'] = 'Aut&#243;';
	$lang['strconfvacuumtable']  =  'Biztosan ki akarja takar&#237;tani &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strestimatedrowcount']  =  'Becs&#252;lt sorok sz&#225;ma';

	// Users
	$lang['struser'] = 'Felhaszn&#225;l&#243;';
	$lang['strusers'] = 'Felhaszn&#225;l&#243;k';
	$lang['strusername'] = 'Felhaszn&#225;l&#243;n&#233;v';
	$lang['strpassword'] = 'Jelsz&#243;';
	$lang['strsuper'] = 'Rendszergazda?';
	$lang['strcreatedb'] = 'L&#233;trehozhat AB-t?';
	$lang['strexpires'] = 'Lej&#225;r';
	$lang['strsessiondefaults'] = 'Munkamenet alap&#233;rt&#233;kei';
	$lang['strnousers']  =  'Nincsenek felhaszn&#225;l&#243;k.';
	$lang['struserupdated'] = 'A felhaszn&#225;l&#243; id&#337;szer&#369;s&#237;tve.';
	$lang['struserupdatedbad'] = 'Nem siker&#252;lt a felhaszn&#225;l&#243;t id&#337;szer&#369;s&#237;teni.';
	$lang['strshowallusers'] = 'Minden felhaszn&#225;l&#243; megjelen&#237;t&#233;se';
	$lang['strcreateuser'] = 'Felhaszn&#225;l&#243; teremt&#233;se';
	$lang['struserneedsname'] = 'A felhaszn&#225;l&#243;nak nevet kell adni.';
	$lang['strusercreated'] = 'A felhaszn&#225;l&#243; megteremtve.';
	$lang['strusercreatedbad'] = 'Nem siker&#252;lt a felhaszn&#225;l&#243;t megteremteni.';
	$lang['strconfdropuser'] = 'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; felhaszn&#225;l&#243;t?';
	$lang['struserdropped'] = 'A felhaszn&#225;l&#243; t&#246;r&#246;lve.';
	$lang['struserdroppedbad'] = 'Nem siker&#252;lt a felhaszn&#225;l&#243;t t&#246;r&#246;lni.';
	$lang['straccount'] = 'Sz&#225;mla';
	$lang['strchangepassword'] = 'Jelsz&#243; megv&#225;ltoztat&#225;sa';
	$lang['strpasswordchanged'] = 'A jelsz&#243; megv&#225;ltoztatva.';
	$lang['strpasswordchangedbad'] = 'Nem siker&#252;lt a jelsz&#243;t megv&#225;ltoztatni.';
	$lang['strpasswordshort'] = 'A jelsz&#243; t&#250;l r&#246;vid.';
	$lang['strpasswordconfirm'] = 'A jelsz&#243; nem egyezik a meger&#337;s&#237;t&#233;ssel.';
	
	// Groups
	$lang['strgroup'] = 'Csoport';
	$lang['strgroups'] = 'Csoportok';
	$lang['strnogroup'] = 'Nincs csoport.';
	$lang['strnogroups'] = 'Nincsenek csoportok.';
	$lang['strcreategroup'] = 'Csoport teremt&#233;se';
	$lang['strshowallgroups'] = 'Minden csoport megjelen&#237;t&#233;se';
	$lang['strgroupneedsname'] = 'A csoportnak nevet kell adni.';
	$lang['strgroupcreated'] = 'A csoport megteremtve.';
	$lang['strgroupcreatedbad'] = 'Nem siker&#252;lt a csoportot megteremteni.';	
	$lang['strconfdropgroup'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; csoportot?';
	$lang['strgroupdropped'] = 'A csoport t&#246;r&#246;lve.';
	$lang['strgroupdroppedbad'] = 'Nem siker&#252;lt a csoportot t&#246;r&#246;lni.';
	$lang['strmembers'] = 'Tagok';
	$lang['straddmember'] = 'Tag felv&#233;tele';
	$lang['strmemberadded'] = 'Tag felv&#233;ve.';
	$lang['strmemberaddedbad'] = 'Nem siker&#252;lt tagot felvenni.';
	$lang['strdropmember'] = 'Tag kicsap&#225;sa';
	$lang['strconfdropmember'] = 'Biztosan ki akarja csapni &#8222;%s&#8221; tagot &#8222;%s&#8221; csoportb&#243;l?';
	$lang['strmemberdropped'] = 'A tag kicsapva.';
	$lang['strmemberdroppedbad'] = 'Nem siker&#252;lt a tagot kicsapni.';

	// Privileges
	$lang['strprivilege'] = 'Jogosults&#225;g';
	$lang['strprivileges'] = 'Jogosults&#225;gok';
	$lang['strnoprivileges'] = 'Ez az objektum alap-jogosults&#225;gokkal rendelkezik.';
	$lang['strgrant'] = 'Feljogos&#237;t&#225;s';
	$lang['strrevoke'] = 'Jogosults&#225;g megvon&#225;sa';
	$lang['strgranted'] = 'A jogosults&#225;gok megv&#225;ltoztatva.';
	$lang['strgrantfailed'] = 'Nem siker&#252;lt a jogosults&#225;gokat megv&#225;ltoztatni.';
	$lang['strgrantbad'] = 'Legal&#225;bb egy felhaszn&#225;l&#243;t &#233;s jogosults&#225;got ki kell v&#225;lasztani.';
	$lang['strgrantor'] = 'Jogos&#237;t&#243;';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Adatb&#225;zis';
	$lang['strdatabases'] = 'Adatb&#225;zisok';
	$lang['strshowalldatabases'] = 'Minden adatb&#225;zis megjelen&#237;t&#233;se';
	$lang['strnodatabase'] = 'Nincs adatb&#225;zis.';
	$lang['strnodatabases'] = 'Nincsenek adatb&#225;zisok.';
	$lang['strcreatedatabase'] = 'Adatb&#225;zis teremt&#233;se';
	$lang['strdatabasename'] = 'Adatb&#225;zisn&#233;v';
	$lang['strdatabaseneedsname'] = 'Meg kell adni az adatb&#225;zisnevet.';
	$lang['strdatabasecreated'] = 'Az adatb&#225;zis megteremtve.';
	$lang['strdatabasecreatedbad'] = 'Nem siker&#252;lt megteremteni az adatb&#225;zist.';
	$lang['strconfdropdatabase'] = 'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; adatb&#225;zist?';
	$lang['strdatabasedropped'] = 'Az adatb&#225;zis t&#246;r&#246;lve.';
	$lang['strdatabasedroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni az adatb&#225;zist.';
	$lang['strentersql'] = '&#205;rja be a v&#233;grehajtand&#243; SQL-kifejez&#233;seket ide:';
	$lang['strsqlexecuted'] = 'Az SQL-kifejez&#233;sek v&#233;grehajtva.';
	$lang['strvacuumgood'] = 'A takar&#237;t&#225;s k&#233;sz.';
	$lang['strvacuumbad'] = 'Nem siker&#252;lt kitakar&#237;tani.';
	$lang['stranalyzegood'] = 'Az elemz&#233;s k&#233;sz.';
	$lang['stranalyzebad'] = 'Nem siker&#252;lt kielemezni.';
	$lang['strreindexgood'] = '&#218;jraindexel&#233;s k&#233;sz.';
	$lang['strreindexbad'] = '&#218;jraindexel&#233;s sikertelen.';
	$lang['strfull'] = 'Teljes';
	$lang['strfreeze'] = 'Befagyaszt&#225;s';
	$lang['strforce'] = 'K&#233;nyszer&#237;t&#233;s';
	$lang['strsignalsent']  =  'Jelz&#233;s elk&#252;ldve.';
	$lang['strsignalsentbad']  =  'Jelz&#233;s elk&#252;ld&#233;se sikertelen.';
	$lang['strallobjects']  =  'Minden objektum';
	$lang['strdatabasealtered']  =  'Adatb&#225;zis megv&#225;ltoztatva.';
	$lang['strdatabasealteredbad']  =  'Adatb&#225;zis megv&#225;ltoztat&#225;sa sikertelen.';

	// Views
	$lang['strview'] = 'N&#233;zet';
	$lang['strviews'] = 'N&#233;zetek';
	$lang['strshowallviews'] = 'Minden n&#233;zet megjelen&#237;t&#233;se';
	$lang['strnoview'] = 'Nincs n&#233;zet.';
	$lang['strnoviews'] = 'Nincsenek n&#233;zetek.';
	$lang['strcreateview'] = 'N&#233;zet teremt&#233;se';
	$lang['strviewname'] = 'N&#233;zetn&#233;v';
	$lang['strviewneedsname'] = 'Meg kell adni a n&#233;zetnevet.';
	$lang['strviewneedsdef'] = 'Meg kell adni a n&#233;zet defin&#237;ci&#243;j&#225;t.';
	$lang['strviewneedsfields'] = 'Meg kell adnia a oszlopokat, amiket ki akar jel&#246;lni a n&#233;zetben.';
	$lang['strviewcreated'] = 'A n&#233;zet megteremtve.';
	$lang['strviewcreatedbad'] = 'Nem siker&#252;lt megteremteni a n&#233;zetet.';
	$lang['strconfdropview'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; n&#233;zetet?';
	$lang['strviewdropped'] = 'A n&#233;zet t&#246;r&#246;lve.';
	$lang['strviewdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a n&#233;zetet.';
	$lang['strviewupdated'] = 'A n&#233;zet id&#337;szer&#369;s&#237;tve.';
	$lang['strviewupdatedbad'] = 'Nem siker&#252;lt id&#337;szer&#369;s&#237;teni a n&#233;zetet.';
	$lang['strviewlink'] = 'Hivatkoz&#225;sok';
	$lang['strviewconditions'] = 'Tov&#225;bbi felt&#233;telek';
	$lang['strcreateviewwiz'] = 'N&#233;zet teremt&#233;se var&#225;zsl&#243;val';

	// Sequences
	$lang['strsequence'] = 'Sorozat';
	$lang['strsequences'] = 'Sorozatok';
	$lang['strshowallsequences'] = 'Minden sorozat megjelen&#237;t&#233;se';
	$lang['strnosequence'] = 'Nincs sorozat.';
	$lang['strnosequences'] = 'Nincsenek sorozatok.';
	$lang['strcreatesequence'] = 'Sorozat teremt&#233;se';
	$lang['strlastvalue'] = 'Utols&#243; &#233;rt&#233;k';
	$lang['strincrementby'] = 'N&#246;vekm&#233;ny';	
	$lang['strstartvalue'] = 'Kezd&#337;&#233;rt&#233;k';
	$lang['strmaxvalue'] = 'Fels&#337; korl&#225;t';
	$lang['strminvalue'] = 'Als&#243; korl&#225;t';
	$lang['strcachevalue'] = 'Gyorst&#225;r &#233;rt&#233;ke';
	$lang['strlogcount'] = 'Sz&#225;ml&#225;l&#243;';
	$lang['striscycled'] = 'Ciklikus?';
	$lang['striscalled'] = 'Hivatkozott?';
	$lang['strsequenceneedsname'] = 'Meg kell adni a sorozatnevet.';
	$lang['strsequencecreated'] = 'A sorozat megteremtve.';
	$lang['strsequencecreatedbad'] = 'Nem siker&#252;lt megteremteni a sorozatot.'; 
	$lang['strconfdropsequence'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; sorozatot?';
	$lang['strsequencedropped'] = 'A sorozat t&#246;r&#246;lve.';
	$lang['strsequencedroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a sorozatot.';
	$lang['strsequencereset'] = 'Sorozat null&#225;z&#225;sa.';
	$lang['strsequenceresetbad'] = 'Nem siker&#252;lt null&#225;zni a sorozatot.'; 

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes']  =  'Indexek';
	$lang['strindexname'] = 'Indexn&#233;v';
	$lang['strshowallindexes'] = 'Minden index megjelen&#237;t&#233;se';
	$lang['strnoindex'] = 'Nincs index.';
	$lang['strnoindexes'] = 'Nincsenek indexek.';
	$lang['strcreateindex'] = 'Index l&#233;trehoz&#225;sa';
	$lang['strtabname'] = 'T&#225;blan&#233;v';
	$lang['strcolumnname'] = 'Oszlopn&#233;v';
	$lang['strindexneedsname'] = 'Meg kell adni az index nev&#233;t.';
	$lang['strindexneedscols'] = 'Meg kell adni az oszlopok (&#233;rv&#233;nyes) sz&#225;m&#225;t.';
	$lang['strindexcreated'] = 'Az index megteremtve';
	$lang['strindexcreatedbad'] = 'Nem siker&#252;lt megteremteni az indexet.';
	$lang['strconfdropindex'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; indexet?';
	$lang['strindexdropped'] = 'Az index t&#246;r&#246;lve.';
	$lang['strindexdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni az indexet.';
	$lang['strkeyname'] = 'Kulcsn&#233;v';
	$lang['struniquekey'] = 'Egyedi kulcs';
	$lang['strprimarykey'] = 'Els&#337;dleges kulcs';
 	$lang['strindextype'] = 'Indext&#237;pus';
	$lang['strtablecolumnlist'] = 'A t&#225;bla oszlopai';
	$lang['strindexcolumnlist'] = 'Az index oszlopai';
	$lang['strconfcluster'] = 'Biztosan f&#252;rt&#246;zni k&#237;v&#225;nja &#8222;%s&#8221;-t?';
	$lang['strclusteredgood'] = 'F&#252;rt&#246;z&#233;s k&#233;sz.';
	$lang['strclusteredbad'] = 'F&#252;rt&#246;z&#233;s sikertelen.';

	// Rules
	$lang['strrules'] = 'Szab&#225;lyok';
	$lang['strrule'] = 'Szab&#225;ly';
	$lang['strshowallrules'] = 'Minden szab&#225;ly megjelen&#237;t&#233;se';
	$lang['strnorule'] = 'Nincs szab&#225;ly.';
	$lang['strnorules'] = 'Nincsenek szab&#225;lyok.';
	$lang['strcreaterule'] = 'Szab&#225;ly teremt&#233;se';
	$lang['strrulename'] = 'Szab&#225;lyn&#233;v';
	$lang['strruleneedsname'] = 'Meg kell adni a szab&#225;lynevet.';
	$lang['strrulecreated'] = 'A szab&#225;ly megteremtve.';
	$lang['strrulecreatedbad'] = 'Nem siker&#252;lt megteremteni a szab&#225;lyt.';
	$lang['strconfdroprule'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; szab&#225;lyt &#8222;%s&#8221; t&#225;bl&#225;ban?';
	$lang['strruledropped'] = 'A szab&#225;ly t&#246;r&#246;lve.';
	$lang['strruledroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a szab&#225;lyt.';

	// Constraints
	$lang['strconstraint']  =  'Megszor&#237;t&#225;s';
	$lang['strconstraints'] = 'Megszor&#237;t&#225;sok';
	$lang['strshowallconstraints'] = 'Minden megszor&#237;t&#225;s megjelen&#237;t&#233;se';
	$lang['strnoconstraints'] = 'Nincsenek megszor&#237;t&#225;sok.';
	$lang['strcreateconstraint'] = 'Megszor&#237;t&#225;s teremt&#233;se';
	$lang['strconstraintcreated'] = 'A megszor&#237;t&#225;s megteremtve.';
	$lang['strconstraintcreatedbad'] = 'Nem siker&#252;lt megteremteni a megszor&#237;t&#225;st.';
	$lang['strconfdropconstraint'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; megszor&#237;t&#225;st &#8222;%s&#8221; t&#225;bl&#225;ban?';
	$lang['strconstraintdropped'] = 'A megszor&#237;t&#225;s t&#246;r&#246;lve.';
	$lang['strconstraintdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a megszor&#237;t&#225;st.';
	$lang['straddcheck'] = 'Ellen&#337;rz&#233;s hozz&#225;ad&#225;sa';
	$lang['strcheckneedsdefinition'] = 'Meg kell adni az ellen&#337;rz&#233;s defin&#237;ci&#243;j&#225;t.';
	$lang['strcheckadded'] = 'Az ellen&#337;rz&#233;s hozz&#225;adva.';
	$lang['strcheckaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az ellen&#337;rz&#233;st.';
	$lang['straddpk'] = 'Els&#337;dleges kulcs hozz&#225;ad&#225;sa';
	$lang['strpkneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni els&#337;dleges kulcsnak.';
	$lang['strpkadded'] = 'Els&#337;dleges kulcs hozz&#225;adva.';
	$lang['strpkaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az els&#337;dleges kulcsot.';
	$lang['stradduniq'] = 'egyedi kulcs hozz&#225;ad&#225;sa';
	$lang['struniqneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni egyedi kulcsnak.';
	$lang['struniqadded'] = 'Az egyedi kulcs hozz&#225;adva.';
	$lang['struniqaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az egyedi kulcsot.';
	$lang['straddfk'] = 'K&#252;ls&#337; kulcs hozz&#225;ad&#225;sa';
	$lang['strfkneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni k&#252;ls&#337; kulcsnak.';
	$lang['strfkneedstarget'] = 'Meg kell adni a c&#233;lt&#225;bl&#225;t a k&#252;ls&#337; kulcsnak.';
	$lang['strfkadded'] = 'A k&#252;ls&#337; kulcs hozz&#225;adva.';
	$lang['strfkaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni a k&#252;ls&#337; kulcsot.';
	$lang['strfktarget'] = 'C&#233;lt&#225;bla';
	$lang['strfkcolumnlist'] = 'Kulcsoszlopok';
	$lang['strondelete'] = 'T&#214;RL&#201;SKOR';
	$lang['stronupdate'] = 'ID&#336;SZER&#368;S&#205;T&#201;SKOR';

	// Functions
	$lang['strfunction'] = 'F&#252;ggv&#233;ny';
	$lang['strfunctions'] = 'F&#252;ggv&#233;nyek';
	$lang['strshowallfunctions'] = 'Minden f&#252;ggv&#233;ny megjelen&#237;t&#233;se';
	$lang['strnofunction'] = 'Nincs f&#252;ggv&#233;ny.';
	$lang['strnofunctions'] = 'Nincsenek f&#252;ggv&#233;nyek.';
	$lang['strcreateplfunction']  =  'SQL/PL f&#252;ggv&#233;ny teremt&#233;se';
	$lang['strcreateinternalfunction']  =  'Bels&#337; f&#252;ggv&#233;ny teremt&#233;se';
	$lang['strcreatecfunction']  =  'C f&#252;ggv&#233;ny teremt&#233;se';
	$lang['strfunctionname'] = 'F&#252;ggv&#233;nyn&#233;v';
	$lang['strreturns'] = 'Visszar&#233;r&#233;si &#233;rt&#233;k';
	$lang['strarguments'] = 'Argumentumok';
	$lang['strproglanguage'] = 'Programoz&#225;si nyelv';
	$lang['strfunctionneedsname'] = 'Meg kell adni a f&#252;ggv&#233;ny nev&#233;t.';
	$lang['strfunctionneedsdef'] = 'Meg kell adni a f&#252;ggv&#233;ny defin&#237;ci&#243;j&#225;t.';
	$lang['strfunctioncreated'] = 'A f&#252;ggv&#233;ny megteremtve.';
	$lang['strfunctioncreatedbad'] = 'Nem siker&#252;lt megteremteni a f&#252;ggv&#233;nyt.';
	$lang['strconfdropfunction'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; f&#252;ggv&#233;nyt?';
	$lang['strfunctiondropped'] = 'A f&#252;ggv&#233;ny t&#246;r&#246;lve.';
	$lang['strfunctiondroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a f&#252;ggv&#233;nyt.';
	$lang['strfunctionupdated'] = 'A f&#252;ggv&#233;ny id&#337;szer&#369;s&#237;tve.';
	$lang['strfunctionupdatedbad'] = 'Nem siker&#252;lt a f&#252;ggv&#233;nyt id&#337;szer&#369;s&#237;teni.';
	$lang['strobjectfile']  =  'Object f&#225;jl';
	$lang['strlinksymbol']  =  'Szerkeszt&#233;si szimb&#243;lum';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggerek';
	$lang['strshowalltriggers'] = 'Minden trigger megjelen&#237;t&#233;se';
	$lang['strnotrigger'] = 'Nincs trigger.';
	$lang['strnotriggers'] = 'Nincsenek triggerek.';
	$lang['strcreatetrigger'] = 'Trigger teremt&#233;se';
	$lang['strtriggerneedsname'] = 'Meg kell adni a trigger nev&#233;t.';
	$lang['strtriggerneedsfunc'] = 'Meg kell adni egy f&#252;ggv&#233;ny nev&#233;t a triggerhez.';
	$lang['strtriggercreated'] = 'A trigger megteremtve.';
	$lang['strtriggercreatedbad'] = 'Nem siker&#252;lt megteremteni a triggert.';
	$lang['strconfdroptrigger'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; triggert &#8222;%s&#8221; t&#225;bl&#225;ban?';
	$lang['strtriggerdropped'] = 'A trigger t&#246;r&#246;lve.';
	$lang['strtriggerdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a triggert.';
	$lang['strtriggeraltered'] = 'A trigger megv&#225;ltoztatva.';
	$lang['strtriggeralteredbad'] = 'Nem siker&#252;lt megv&#225;ltoztatni a triggert.';
	$lang['strforeach']  =  'Mindegyik';

	// Types
	$lang['strtype'] = 'T&#237;pus';
	$lang['strtypes'] = 'T&#237;pusok';
	$lang['strshowalltypes'] = 'Minden t&#237;pus megjelen&#237;t&#233;se';
	$lang['strnotype'] = 'Nincs t&#237;pus.';
	$lang['strnotypes'] = 'Nincsenek t&#237;pusok.';
	$lang['strcreatetype'] = 'T&#237;pus teremt&#233;se';
	$lang['strcreatecomptype']  =  '&#214;sszetett t&#237;pus teremt&#233;se';
	$lang['strtypeneedsfield']  =  'Legal&#225;bb egy oszlopot meg kell adnia.';
	$lang['strtypeneedscols']  =  '&#201;rv&#233;nyes oszlopsz&#225;mot kell megadnia.';	
	$lang['strtypename'] = 'T&#237;pusn&#233;v';
	$lang['strinputfn'] = 'Beviteli f&#252;ggv&#233;ny';
	$lang['stroutputfn'] = 'Kiviteli f&#252;ggv&#233;ny';
	$lang['strpassbyval'] = '&#201;rt&#233;k szerinti &#225;tad&#225;s?';
	$lang['stralignment'] = 'Igaz&#237;t&#225;s';
	$lang['strelement'] = 'Elem';
	$lang['strdelimiter'] = 'Hat&#225;rol&#243;';
	$lang['strstorage'] = 'T&#225;r';
	$lang['strfield']  =  'Oszlop';
	$lang['strnumfields']  =  'Oszlopok sz&#225;ma';
	$lang['strtypeneedsname'] = 'Meg kell adni a t&#237;pusnevet.';
	$lang['strtypeneedslen'] = 'Meg kell adni a t&#237;pus hossz&#225;t.';
	$lang['strtypecreated'] = 'A t&#237;pus megteremtve';
	$lang['strtypecreatedbad'] = 'Nem siker&#252;lt megteremteni a t&#237;pust.';
	$lang['strconfdroptype'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; t&#237;pust?';
	$lang['strtypedropped'] = 'A t&#237;pus t&#246;r&#246;lve.';
	$lang['strtypedroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a t&#237;pust.';
	$lang['strflavor']  =  'Fajta';
	$lang['strbasetype']  =  'Alap';
	$lang['strcompositetype']  =  '&#214;sszetett';
	$lang['strpseudotype']  =  '&#193;l';

	// Schemas
	$lang['strschema'] = 'S&#233;ma';
	$lang['strschemas'] = 'S&#233;m&#225;k';
	$lang['strshowallschemas'] = 'Minden s&#233;ma megjelen&#237;t&#233;se';
	$lang['strnoschema'] = 'Nincs s&#233;ma.';
	$lang['strnoschemas'] = 'Nincsenek s&#233;m&#225;k.';
	$lang['strcreateschema'] = 'S&#233;ma teremt&#233;se';
	$lang['strschemaname'] = 'S&#233;man&#233;v';
	$lang['strschemaneedsname'] = 'Meg kell adni a s&#233;manevet.';
	$lang['strschemacreated'] = 'A s&#233;ma megteremtve';
	$lang['strschemacreatedbad'] = 'Nem siker&#252;lt a s&#233;m&#225;t megteremteni.';
	$lang['strconfdropschema'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; s&#233;m&#225;t?';
	$lang['strschemadropped'] = 'A s&#233;ma t&#246;r&#246;lve.';
	$lang['strschemadroppedbad'] = 'Nem siker&#252;lt a s&#233;m&#225;t t&#246;r&#246;lni.';
	$lang['strschemaaltered'] = 'S&#233;ma megv&#225;ltoztatva.';
	$lang['strschemaalteredbad'] = 'S&#233;ma magv&#225;ltoztat&#225;sa sikertelen.';
	$lang['strsearchpath']  =  'S&#233;ma keres&#233;si &#250;tvonala';

	// Reports
	$lang['strreport'] = 'Jelent&#233;s';
	$lang['strreports'] = 'Jelent&#233;sek';
	$lang['strshowallreports'] = 'Minden jelent&#233;s megjelen&#237;t&#233;se';
	$lang['strnoreports'] = 'Nincsenek jelent&#233;sek.';
	$lang['strcreatereport'] = 'Jelent&#233;s teremt&#233;se';
	$lang['strreportdropped'] = 'A jelent&#233;s t&#246;r&#246;lve.';
	$lang['strreportdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a jelent&#233;st.';
	$lang['strconfdropreport'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; jelent&#233;st?';
	$lang['strreportneedsname'] = 'Meg kell adni a jelent&#233;snevet.';
	$lang['strreportneedsdef'] = 'SQL kifejez&#233;st kell hozz&#225;adni a jelent&#233;shez.';
	$lang['strreportcreated'] = 'A jelent&#233;s megteremtve.';
	$lang['strreportcreatedbad'] = 'Nem siker&#252;lt megteremteni a jelent&#233;st.';

	// Domains
	$lang['strdomain'] = 'Tartom&#225;ny';
	$lang['strdomains'] = 'Tartom&#225;nyok';
	$lang['strshowalldomains'] = 'Minden tartom&#225;ny megjelen&#237;t&#233;se';
	$lang['strnodomains'] = 'Nincsnek tartom&#225;nyok.';
	$lang['strcreatedomain'] = 'Tartom&#225;ny teremt&#233;se';
	$lang['strdomaindropped'] = 'A tartom&#225;ny t&#246;r&#246;lve.';
	$lang['strdomaindroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a tartom&#225;nyt.';
	$lang['strconfdropdomain'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; tartom&#225;nyt?';
	$lang['strdomainneedsname'] = 'Meg kell adni a tartom&#225;nynevet.';
	$lang['strdomaincreated'] = 'A tartom&#225;ny megteremtve.';
	$lang['strdomaincreatedbad'] = 'Nem siker&#252;lt megteremteni a tartom&#225;nyt.';	
	$lang['strdomainaltered'] = 'A tartom&#225;ny megv&#225;ltoztatva.';
	$lang['strdomainalteredbad'] = 'Nem siker&#252;lt megv&#225;ltoztatni a tartom&#225;nyt.';	

	// Operators
	$lang['stroperator'] = 'Oper&#225;tor';
	$lang['stroperators'] = 'Oper&#225;torok';
	$lang['strshowalloperators'] = 'Minden oper&#225;tor megjelen&#237;t&#233;se';
	$lang['strnooperator'] = 'Nincs oper&#225;tor.';
	$lang['strnooperators'] = 'Nincsenek oper&#225;torok.';
	$lang['strcreateoperator'] = 'Oper&#225;tor teremt&#233;se';
	$lang['strleftarg'] = 'Bal arg t&#237;pus';
	$lang['strrightarg'] = 'Jobb arg t&#237;pus';
	$lang['strcommutator'] = 'Kommut&#225;tor';
	$lang['strnegator'] = 'Tagad&#243;';
	$lang['strrestrict'] = 'Megszor&#237;t&#225;s';
	$lang['strjoin'] = '&#214;sszekapcsol&#225;s';
	$lang['strhashes'] = 'Has&#237;t';
	$lang['strmerges'] = '&#214;sszef&#233;s&#252;l';
	$lang['strleftsort'] = 'Balrendez&#233;s';
	$lang['strrightsort'] = 'Jobbrendez&#233;s';
	$lang['strlessthan'] = 'Kisebb mint';
	$lang['strgreaterthan'] = 'Nagyobb mint';
	$lang['stroperatorneedsname'] = 'Meg kell adni az oper&#225;tornevet.';
	$lang['stroperatorcreated'] = 'Az oper&#225;tor megteremtve';
	$lang['stroperatorcreatedbad'] = 'Nem siker&#252;lt megteremteni az oper&#225;tort.';
	$lang['strconfdropoperator'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; oper&#225;tort?';
	$lang['stroperatordropped'] = 'Az oper&#225;tor t&#246;r&#246;lve.';
	$lang['stroperatordroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni az oper&#225;tort.';

	// Casts
	$lang['strcasts'] = 'Kasztok';
	$lang['strnocasts'] = 'Nincsenek kasztok.';
	$lang['strsourcetype'] = 'Forr&#225;st&#237;pus';
	$lang['strtargettype'] = 'C&#233;lt&#237;pus';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = '&#201;rt&#233;kad&#225;sban';
	$lang['strbinarycompat'] = '(Bin&#225;risan kompatibilis)';
	
	// Conversions
	$lang['strconversions'] = '&#193;talak&#237;t&#225;sok';
	$lang['strnoconversions'] = 'Nincsenek &#225;talak&#237;t&#225;sok.';
	$lang['strsourceencoding'] = 'Forr&#225;sk&#243;dol&#225;s';
	$lang['strtargetencoding'] = 'C&#233;lk&#243;dol&#225;s';
	
	// Languages
	$lang['strlanguages'] = 'Nyelvek';
	$lang['strnolanguages'] = 'Nincsenek nyelvek.';
	$lang['strtrusted'] = 'Hiteles';
	
	// Info
	$lang['strnoinfo'] = 'Nincs el&#233;rhet&#337; inform&#225;ci&#243;.';
	$lang['strreferringtables'] = 'Kapcsol&#243;d&#243; t&#225;bl&#225;k';
	$lang['strparenttables'] = 'Sz&#252;l&#337;t&#225;bl&#225;k';
	$lang['strchildtables'] = 'Gyerekt&#225;bl&#225;k';

	// Aggregates
	$lang['straggregates'] = 'Aggreg&#225;ci&#243;k';
	$lang['strnoaggregates'] = 'Nincsenek aggreg&#225;tumok.';
	$lang['stralltypes'] = '(Minden t&#237;pus)';

	// Operator Classes
	$lang['stropclasses'] = 'Oper&#225;tor-oszt&#225;lyok';
	$lang['strnoopclasses'] = 'Nincsenek oper&#225;tor-oszt&#225;lyok.';
	$lang['straccessmethod'] = 'Hozz&#225;f&#233;r&#233;si elj&#225;r&#225;s';

	// Stats and performance
	$lang['strrowperf'] = 'Sorteljes&#237;tm&#233;ny';
	$lang['strioperf'] = 'I/O-teljes&#237;tm&#233;ny';
	$lang['stridxrowperf'] = 'Indexsor-teljes&#237;tm&#233;ny';
	$lang['stridxioperf'] = 'Index-I/O-teljes&#237;tm&#233;ny';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Szekvenci&#225;lis';
	$lang['strscan'] = 'Keres&#233;s';
	$lang['strread'] = 'Olvas&#225;s';
	$lang['strfetch'] = 'Leh&#237;v&#225;s';
	$lang['strheap'] = 'Kupac';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Gyorst&#225;r';
	$lang['strdisk'] = 'Lemez';
	$lang['strrows2'] = 'Sorok';

	// Tablespaces
	$lang['strtablespace']  =  'T&#225;blahely';
	$lang['strtablespaces']  =  'T&#225;blahelyek';
	$lang['strshowalltablespaces']  =  'Minden t&#225;blahely megjelen&#237;t&#233;se';
	$lang['strnotablespaces']  =  'Nincsenek t&#225;blahelyek.';
	$lang['strcreatetablespace']  =  'T&#225;blahely teremt&#233;se';
	$lang['strlocation']  =  'Hely';
	$lang['strtablespaceneedsname']  =  'Nevet kell adnia a t&#225;blahelynek.';
	$lang['strtablespaceneedsloc']  =  'Meg kell adnia egy mapp&#225;t, ahol a t&#225;blahelyet teremti.';
	$lang['strtablespacecreated']  =  'T&#225;blahely teremtve.';
	$lang['strtablespacecreatedbad']  =  'T&#225;blahely teremt&#233;se sikertelen.';
	$lang['strconfdroptablespace']  =  'Biztosan ki akarja dobni &#8222;%s&#8221; t&#225;blahelyet?';
	$lang['strtablespacedropped']  =  'T&#225;blahely kidobva.';
	$lang['strtablespacedroppedbad']  =  'T&#225;blahely kidob&#225;sa sikertelen.';
	$lang['strtablespacealtered']  =  'T&#225;blahely megv&#225;ltoztatva.';
	$lang['strtablespacealteredbad']  =  'T&#225;blahely megv&#225;ltoztat&#225;sa sikertelen.';

	// Slony clusters
	$lang['strcluster']  =  'F&#252;rt';
	$lang['strnoclusters']  =  'Nincs f&#252;rt.';
	$lang['strconfdropcluster']  =  'Biztosan el akarja dobni &quot;%s&quot; f&#252;rt&#246;t?';
	$lang['strclusterdropped']  =  'F&#252;rt eldobva.';
	$lang['strclusterdroppedbad']  =  'F&#252;rt eldob&#225;sa sikertelen.';
	$lang['strinitcluster']  =  'F&#252;rt inicializ&#225;l&#225;sa';
	$lang['strclustercreated']  =  'F&#252;rt inicializ&#225;lva.';
	$lang['strclustercreatedbad']  =  'F&#252;rt inicializ&#225;l&#225;sa sikertelen.';
	$lang['strclusterneedsname']  =  'Nevet kell adnia a f&#252;rtnek.';
	$lang['strclusterneedsnodeid']  =  'Azonos&#237;t&#243;t kell adnia a helyi csom&#243;pontnak.';
	
	// Slony nodes
	$lang['strnodes']  =  'Csom&#243;pontok';
	$lang['strnonodes']  =  'Nincs csom&#243;pont.';
	$lang['strcreatenode']  =  'Csom&#243;pont teremt&#233;se';
	$lang['strid']  =  'Az';
	$lang['stractive']  =  'Akt&#237;v';
	$lang['strnodecreated']  =  'Csom&#243;pont megteremtve.';
	$lang['strnodecreatedbad']  =  'Csom&#243;pont teremt&#233;se sikertelen.';
	$lang['strconfdropnode']  =  'Biztosan el akarja dobni &quot;%s&quot; csom&#243;pontot?';
	$lang['strnodedropped']  =  'Csom&#243;pont eldobva.';
	$lang['strnodedroppedbad']  =  'Csom&#243;pont eldob&#225;sa sikertelen';
	$lang['strfailover']  =  'Hibaugr&#225;s';
	$lang['strnodefailedover']  =  'V&#233;gponti hiba &#225;tugorva.';
	$lang['strnodefailedoverbad']  =  'V&#233;gponti hiba &#225;tugr&#225;sa sikertelen.';
	
	// Slony paths	
	$lang['strpaths']  =  'El&#233;r&#233;si utak';
	$lang['strnopaths']  =  'Nincs el&#233;r&#233;si &#250;t.';
	$lang['strcreatepath']  =  '&#218;t teremt&#233;se';
	$lang['strnodename']  =  'Csom&#243;pont neve';
	$lang['strnodeid']  =  'Csom&#243;pont-azonos&#237;t&#243;';
	$lang['strconninfo']  =  'Kapcsolati sz&#246;veg';
	$lang['strconnretry']  =  'M&#225;sodpercek kapcsol&#243;d&#225;s &#250;jrapr&#243;b&#225;l&#225;s&#225;ig';
	$lang['strpathneedsconninfo']  =  'Meg kell adnia a kapcsolati sz&#246;veget az el&#233;r&#233;si &#250;thoz.';
	$lang['strpathneedsconnretry']  =  'Meg kell adnia a kapcsol&#243;d&#225;s &#250;jrapr&#243;b&#225;l&#225;s&#225;ig t&#246;rt&#233;n&#337; v&#225;rakoz&#225;s idej&#233;t m&#225;sodpercekben.';
	$lang['strpathcreated']  =  '&#218;t megteremtve.';
	$lang['strpathcreatedbad']  =  '&#218;t teremt&#233;se sikertelen.';
	$lang['strconfdroppath']  =  'Biztosan el akarja dobni &quot;%s&quot; utat?';
	$lang['strpathdropped']  =  '&#218;t eldobva.';
	$lang['strpathdroppedbad']  =  '&#218;t eldob&#225;sa sikertelen.';

	// Slony listens
	$lang['strlistens']  =  'Figyel&#337;k';
	$lang['strnolistens']  =  'Nincs figyel&#337;.';
	$lang['strcreatelisten']  =  'Figyel&#337; teremt&#233;se';
	$lang['strlistencreated']  =  'Figyel&#337; megteremtve.';
	$lang['strlistencreatedbad']  =  'Fegyel&#337; teremt&#233;se sikertelen.';
	$lang['strconfdroplisten']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; figyel&#337;t?';
	$lang['strlistendropped']  =  'Figyel&#337; t&#246;r&#246;lve.';
	$lang['strlistendroppedbad']  =  'Figyel&#337; t&#246;rl&#233;se sikertelen.';

	// Slony replication sets
	$lang['strrepsets']  =  'M&#225;sodlatok';
	$lang['strnorepsets']  =  'Nincs m&#225;sodlat.';
	$lang['strcreaterepset']  =  'M&#225;sodlat teremt&#233;se';
	$lang['strrepsetcreated']  =  'M&#225;sodlat megteremtve.';
	$lang['strrepsetcreatedbad']  =  'M&#225;sodlat teremt&#233;se sikertelen.';
	$lang['strconfdroprepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetdropped']  =  'M&#225;sodlat t&#246;r&#246;lve.';
	$lang['strrepsetdroppedbad']  =  'M&#225;sodlat t&#246;rl&#233;se sikertelen.';
	$lang['strmerge']  =  '&#214;sszef&#233;s&#252;l&#233;s';
	$lang['strmergeinto']  =  '&#214;sszef&#233;s&#252;l&#233;s ide';
	$lang['strrepsetmerged']  =  'M&#225;sodlatok &#246;sszef&#233;s&#252;lve.';
	$lang['strrepsetmergedbad']  =  'M&#225;sodlatok &#246;sszef&#233;s&#252;l&#233;se sikertelen.';
	$lang['strmove']  =  'Mozgat&#225;s';
	$lang['strneworigin']  =  '&#218;j eredet';
	$lang['strrepsetmoved']  =  'M&#225;sodlat mozgatva.';
	$lang['strrepsetmovedbad']  =  'M&#225;sodlat mozgat&#225;sa sikertelen.';
	$lang['strnewrepset']  =  '&#218;j m&#225;sodlat';
	$lang['strlock']  =  'Z&#225;rol&#225;s';
	$lang['strlocked']  =  'Z&#225;rolva';
	$lang['strunlock']  =  'Kiold&#225;s';
	$lang['strconflockrepset']  =  'Biztosan z&#225;rolni akarja &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetlocked']  =  'M&#225;sodlat z&#225;rolva.';
	$lang['strrepsetlockedbad']  =  'M&#225;sodlat z&#225;rol&#225;sa sikertelen.';
	$lang['strconfunlockrepset']  =  'Biztosan ki akarja oldani &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetunlocked']  =  'M&#225;sodlat kioldva.';
	$lang['strrepsetunlockedbad']  =  'M&#225;sodlat kiold&#225;sa sikertelen.';
	$lang['strexecute']  =  'V&#233;grehajt&#225;s';
	$lang['stronlyonnode']  =  'Csak helyben';
	$lang['strddlscript']  =  'DDL-&#237;r&#225;s';
	$lang['strscriptneedsbody']  =  'Meg kell adnia egy &#237;r&#225;st, amit minden helyen v&#233;grehajtanak.';
	$lang['strscriptexecuted']  =  'M&#225;sodlati DDL-&#237;r&#225;s v&#233;grehajtva.';
	$lang['strscriptexecutedbad']  =  'M&#225;sodlati DDL-&#237;r&#225;s v&#233;grehajt&#225;sa sikertelen.';
	$lang['strtabletriggerstoretain']  =  'A k&#246;vetkez&#337; triggereket Slony NEM tiltja le:';

	// Slony tables in replication sets
	$lang['straddtable']  =  'T&#225;bla felv&#233;tele';
	$lang['strtableneedsuniquekey']  =  'T&#225;bla felv&#233;tel&#233;hez els&#337;dleges vagy egyedi kulcs kell.';
	$lang['strtableaddedtorepset']  =  'T&#225;bla felv&#233;ve a m&#225;sodlatba.';
	$lang['strtableaddedtorepsetbad']  =  'T&#225;bla felv&#233;tele a m&#225;sodlatba sikertelen.';
	$lang['strconfremovetablefromrepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; t&#225;bl&#225;t &#8222;%s&#8221; m&#225;sodlatb&#243;l?';
	$lang['strtableremovedfromrepset']  =  'T&#225;bla t&#246;r&#246;lve a m&#225;sodlatb&#243;l.';
	$lang['strtableremovedfromrepsetbad']  =  'T&#225;bla t&#246;rl&#233;se a m&#225;sodlatb&#243;l sikertelen.';

	// Slony sequences in replication sets
	$lang['straddsequence']  =  'Sorozat felv&#233;tele';
	$lang['strsequenceaddedtorepset']  =  'Sorozat felv&#233;ve a m&#225;sodlatba.';
	$lang['strsequenceaddedtorepsetbad']  =  'Sorozat felv&#233;tele a m&#225;sodlatba sikertelen.';
	$lang['strconfremovesequencefromrepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; sorozatot &#8222;%s&#8221; m&#225;sodlatb&#243;l?';
	$lang['strsequenceremovedfromrepset']  =  'Sorozat t&#246;r&#246;lve a m&#225;sodlatb&#243;l.';
	$lang['strsequenceremovedfromrepsetbad']  =  'Sorozat t&#246;rl&#233;se a m&#225;sodlatb&#243;l sikertelen.';

	// Slony subscriptions
	$lang['strsubscriptions']  =  'Feliratkoz&#225;sok';
	$lang['strnosubscriptions']  =  'Nincs feliratkoz&#225;s.';

	// Miscellaneous
	$lang['strtopbar'] = '%s fut %s:%s c&#237;men &#8212; &#214;n &#8222;%s&#8221; n&#233;ven jelentkezett be. %s';
	$lang['strtimefmt'] = 'Y.m.d. H:i';
	$lang['strhelp'] = 'S&#250;g&#243;';
	$lang['strhelpicon']  =  '?';
	$lang['strlogintitle']  =  'Bel&#233;p&#233;s ide: %s';
	$lang['strlogoutmsg']  =  'Kil&#233;pve innen: %s';
	$lang['strloading']  =  'Bet&#246;lt&#233;s...';
	$lang['strerrorloading']  =  'Bet&#246;lt&#233;si hiba';
	$lang['strclicktoreload']  =  'Kattintson az &#250;jrat&#246;lt&#233;shez';

?>
