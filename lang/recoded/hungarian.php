<?php

	/**
	 * Hungarian language file for phpPgAdmin.
	 * maintainer: Sulyok Peti &lt;sulyokpeti@gmail.com&gt;
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
	$lang['strloginfailed'] = 'Nem siker&#252;lt bejelentkezni';
	$lang['strlogindisallowed'] = 'Biztons&#225;gi okb&#243;l enged&#233;lyezettlen a bejelentkez&#233;s.';
	$lang['strserver'] = 'Szolg&#225;l&#243;';
	$lang['strservers']  =  'Szolg&#225;l&#243;k';
	$lang['strgroupservers'] = 'Szolg&#225;l&#243;k &#8222;%s&#8221; csoportban';
	$lang['strallservers'] = 'Minden szolg&#225;l&#243;';
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
	$lang['strbrowse'] = 'Tall&#243;z';
	$lang['strenable']  =  'Enged';
	$lang['strdisable']  =  'Tilt';
	$lang['strdrop'] = 'T&#246;r&#246;l';
	$lang['strdropped'] = 'T&#246;rl&#246;lve';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = '&lt; El&#337;z&#337;';
	$lang['strnext'] = 'K&#246;vetkez&#337; &gt;';
	$lang['strfirst'] = '&lt;&lt; Els&#337;';
	$lang['strlast'] = 'Utols&#243; &gt;&gt;';
	$lang['strfailed'] = 'Sikertelen';
	$lang['strcreate'] = 'Teremt';
	$lang['strcreated'] = 'Megteremtve';
	$lang['strcomment'] = 'Megjegyz&#233;s';
	$lang['strlength'] = 'Hossz';
	$lang['strdefault'] = 'Alap&#233;rtelmez&#233;s';
	$lang['stralter'] = 'M&#243;dos&#237;t';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'M&#233;gsem';
	$lang['strkill'] = '&#214;l';
	$lang['strac']  =  '&#214;nm&#369;k&#246;d&#337; kieg&#233;sz&#237;t&#233;s enged&#233;lyez&#233;se';
	$lang['strsave'] = 'Ment';
	$lang['strreset'] = '&#218;jra';
	$lang['strrestart'] = '&#218;jraind&#237;t';
	$lang['strinsert'] = 'Besz&#250;r';
	$lang['strselect'] = 'Kiv&#225;laszt';
	$lang['strdelete'] = 'T&#246;r&#246;l';
	$lang['strupdate'] = 'Id&#337;szer&#369;s&#237;t';
	$lang['strreferences'] = 'Hivatkoz&#225;sok';
	$lang['stryes'] = 'Igen';
	$lang['strno'] = 'Nem';
	$lang['strtrue'] = 'IGAZ';
	$lang['strfalse'] = 'HAMIS';
	$lang['stredit'] = 'Szerkeszt';
	$lang['strcolumn']  = 'Oszlop';
	$lang['strcolumns'] = 'Oszlopok';
	$lang['strrows'] = 'sor';
	$lang['strrowsaff'] = 'sor &#233;rintett.';
	$lang['strobjects'] = 'objektum';
	$lang['strback'] = 'Vissza';
	$lang['strqueryresults'] = 'Lek&#233;rdez&#233;s eredm&#233;nyei';
	$lang['strshow'] = 'Megjelen&#237;t';
	$lang['strempty'] = '&#220;r&#237;t';
	$lang['strlanguage'] = 'Nyelv';
	$lang['strencoding'] = 'K&#243;dol&#225;s';
	$lang['strvalue'] = '&#201;rt&#233;k';
	$lang['strunique'] = 'egyedi';
	$lang['strprimary'] = 'Els&#337;dleges';
	$lang['strexport'] = 'Kivisz';
	$lang['strimport'] = 'Behoz';
	$lang['strallowednulls']  =  'Enged&#233;lyezett NULL bet&#369;k';
	$lang['strbackslashn']  =  '\N';
	$lang['stremptystring']  =  '&#220;res sz&#246;veg/mez&#337;';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Gazda';
	$lang['strvacuum'] = 'Takar&#237;t';
	$lang['stranalyze'] = 'Elemez';
	$lang['strclusterindex'] = 'F&#252;rt&#246;z';
	$lang['strclustered'] = 'F&#252;rt&#246;zve?';
	$lang['strreindex'] = '&#218;jraindexel';
	$lang['strexecute']  =  'V&#233;grehajt';
	$lang['stradd'] = 'B&#337;v&#237;t';
	$lang['strevent'] = 'Esem&#233;ny';
	$lang['strwhere'] = 'Hol';
	$lang['strinstead'] = 'Ink&#225;bb';
	$lang['strwhen'] = 'Mikor';
	$lang['strformat'] = 'Alak';
	$lang['strdata'] = 'Adatok';
	$lang['strconfirm'] = 'Meger&#337;s&#237;t';
	$lang['strexpression'] = 'Kifejez&#233;s';
	$lang['strellipsis'] = '&#8230;';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Kinyit';
	$lang['strcollapse'] = '&#214;sszecsuk';
	$lang['strfind'] = 'Keres';
	$lang['stroptions'] = 'R&#233;szletek';
	$lang['strrefresh'] = 'Friss&#237;t';
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
	$lang['strconfdropcred'] = 'Biztons&#225;g ok&#225;n a sz&#233;tv&#225;l&#225;s megsz&#252;nteti a megosztott bejelentkez&#337; adatait. Biztosan sz&#233;t akar v&#225;lni?';
	$lang['stractionsonmultiplelines']  =  'T&#246;bb soros m&#369;veletek';
	$lang['strselectall']  =  'Mindent kiv&#225;laszt';
	$lang['strunselectall']  =  'Semmit sem v&#225;laszt ki';
	$lang['strlocale']  =  'Helysz&#237;n';
	$lang['strcollation'] = '&#214;sszerak&#225;s';
	$lang['strctype'] = 'Bet&#369;t&#237;pus';
	$lang['strdefaultvalues'] = 'Alap&#233;rt&#233;kek';
	$lang['strnewvalues'] = '&#218;j &#233;rt&#233;kek';
	$lang['strstart'] = 'Ind&#237;t';
	$lang['strstop'] = 'Le&#225;ll&#237;t';
	$lang['strgotoppage'] = 'vissza a tetej&#233;re';
	$lang['strtheme'] = 'T&#233;ma';
	
	// Admin
	$lang['stradminondatabase'] = 'A k&#246;vetkez&#337; adminisztrat&#237;v feladatok %s adatb&#225;zis eg&#233;sz&#233;re vonatkoznak.';
	$lang['stradminontable'] = 'A k&#246;vetkez&#337; adminisztrat&#237;v feladatok %s t&#225;bl&#225;ra vonatkoznak.';

	// User-supplied SQL history
	$lang['strhistory']  =  'El&#337;zm&#233;nyek';
	$lang['strnohistory']  =  'Nincs el&#337;zm&#233;ny.';
	$lang['strclearhistory']  =  'El&#337;zm&#233;nyeket t&#246;r&#246;l';
	$lang['strdelhistory']  =  'El&#337;zm&#233;nyekb&#337;l t&#246;r&#246;l';
	$lang['strconfdelhistory']  =  'T&#233;nyleg t&#246;r&#246;li e k&#233;relmet az el&#337;zm&#233;nyekb&#337;l?';
	$lang['strconfclearhistory']  =  'T&#233;nyleg t&#246;r&#246;li az el&#337;zm&#233;nyeket?';
	$lang['strnodatabaseselected']  =  'Ki kell v&#225;lasztani az adatb&#225;zist.';

	// Database sizes
	$lang['strnoaccess'] = 'Nincs hozz&#225;f&#233;r&#233;s'; 
	$lang['strsize']  =  'M&#233;ret';
	$lang['strbytes']  =  'b&#225;jt';
	$lang['strkb']  =  'kB';
	$lang['strmb']  =  'MB';
	$lang['strgb']  =  'GB';
	$lang['strtb']  =  'TB';

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
	$lang['strinvalidparam'] = '&#201;rv&#233;nytelen param&#233;terek.';
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
	$lang['strinvalidserverparam']  =  '&#201;rv&#233;nytelen kiszolg&#225;l&#243; param&#233;terrel pr&#243;b&#225;ltak csatlakozni. Lehet, hogy valaki bet&#246;rni pr&#243;b&#225;l a rendszerbe.'; 
	$lang['strnoserversupplied']  =  'Nincs megadva kiszolg&#225;l&#243;!';
	$lang['strbadpgdumppath'] = 'Kiviteli hiba: Elbukott a pg_dump v&#233;grehajt&#225;sa (conf/config.inc.php f&#225;jlban megadott &#246;sv&#233;ny: %s). K&#233;rem, jav&#237;tsa ki ezt a be&#225;ll&#237;t&#225;sban, &#233;s ism&#233;teljen.';
	$lang['strbadpgdumpallpath'] = 'Kiviteli hiba: Elbukott a pg_dumpall v&#233;grehajt&#225;sa (conf/config.inc.php f&#225;jlban megadott &#246;sv&#233;ny: %s). K&#233;rem, jav&#237;tsa ki ezt a be&#225;ll&#237;t&#225;sban, &#233;s ism&#233;teljen.';
	$lang['strconnectionfail'] = 'Nem csatlakozhatok a szolg&#225;l&#243;hoz.';

	// Tables
	$lang['strtable'] = 'T&#225;bla';
	$lang['strtables'] = 'T&#225;bl&#225;k';
	$lang['strshowalltables'] = 'Minden t&#225;bla megjelen&#237;t&#233;se';
	$lang['strnotables'] = 'Nincsenek t&#225;bl&#225;k.';
	$lang['strnotable'] = 'Nincs t&#225;bla.';
	$lang['strcreatetable'] = 'T&#225;bl&#225;t teremt';
	$lang['strcreatetablelike']  =  'T&#225;bl&#225;t teremt mint';
	$lang['strcreatetablelikeparent']  =  'Forr&#225;s t&#225;bla';
	$lang['strcreatelikewithdefaults']  =  'ALAP&#201;RTELMEZ&#201;SEKKEL';
	$lang['strcreatelikewithconstraints']  =  'MEGSZOR&#205;T&#193;SOKKAL';
	$lang['strcreatelikewithindexes']  =  'INDEXEKKEL';
	$lang['strtablename'] = 'T&#225;bla neve';
	$lang['strtableneedsname'] = 'Meg kell adni a t&#225;bla nev&#233;t.';
	$lang['strtablelikeneedslike']  =  'Meg kell adni a t&#225;bla nev&#233;t, ahonnan tulajdons&#225;gokat lehet m&#225;solni.';
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
	$lang['strnofkref'] = 'Nincs %s idegen kulcshoz ill&#337; &#233;rt&#233;k.';
	$lang['strrowduplicate']  =  'Nem siker&#252;lt sort besz&#250;rni. Dupla besz&#250;r&#225;si k&#237;s&#233;rlet.';
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
	$lang['strconfanalyzetable']  =  'Biztosan elemezz&#252;k &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strconfreindextable'] = 'Biztosan &#250;jra akarja indexelni &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strconfclustertable'] = 'Biztosan f&#252;rt&#246;zni akarja &#8222;%s&#8221; t&#225;bl&#225;t?';
	$lang['strestimatedrowcount']  =  'Becs&#252;lt sorok sz&#225;ma';
	$lang['strspecifytabletoanalyze']  =  'Legal&#225;bb egy elemzend&#337; t&#225;bl&#225;t meg kell adni.';
	$lang['strspecifytabletoempty']  =  'Legal&#225;bb egy &#252;r&#237;tend&#337; t&#225;bl&#225;t meg kell adni.';
	$lang['strspecifytabletodrop']  =  'Legal&#225;bb egy t&#246;rlend&#337; t&#225;bl&#225;t meg kell adni.';
	$lang['strspecifytabletovacuum']  =  'Legal&#225;bb egy takar&#237;tand&#243; t&#225;bl&#225;t meg kell adni.';
	$lang['strspecifytabletoreindex'] = 'Legal&#225;bb egy indexelend&#337; t&#225;bl&#225;t meg kell adni.';
	$lang['strspecifytabletocluster'] = 'Legal&#225;bb egy f&#252;rt&#246;zend&#337; t&#225;bl&#225;t meg kell adni.';
	$lang['strnofieldsforinsert'] = 'Oszloptalan t&#225;bl&#225;ba nem sz&#250;rhat be sort.';

	// Columns
	$lang['strcolprop']  =  'T&#225;bla tulajdons&#225;gai';
    $lang['strnotableprovided']  =  'Nincs t&#225;bla megadva!';

	// Users
	$lang['struser'] = 'Haszn&#225;l&#243;';
	$lang['strusers'] = 'Haszn&#225;l&#243;k';
	$lang['strusername'] = 'Haszn&#225;l&#243; neve';
	$lang['strpassword'] = 'Jelsz&#243;';
	$lang['strsuper'] = 'Rendszergazda?';
	$lang['strcreatedb'] = 'L&#233;trehozhat AB-t?';
	$lang['strexpires'] = 'Lej&#225;r';
	$lang['strsessiondefaults'] = 'Munkamenet alap&#233;rt&#233;kei';
	$lang['strnousers']  =  'Nincsenek haszn&#225;l&#243;k.';
	$lang['struserupdated'] = 'Haszn&#225;l&#243; id&#337;szer&#369;s&#237;tve.';
	$lang['struserupdatedbad'] = 'Nem siker&#252;lt a haszn&#225;l&#243;t id&#337;szer&#369;s&#237;teni.';
	$lang['strshowallusers'] = 'Minden haszn&#225;l&#243; megjelen&#237;t&#233;se';
	$lang['strcreateuser'] = 'Haszn&#225;l&#243; teremt&#233;se';
	$lang['struserneedsname'] = 'A haszn&#225;l&#243;nak nevet kell adni.';
	$lang['strusercreated'] = 'A haszn&#225;l&#243; megteremtve.';
	$lang['strusercreatedbad'] = 'Nem siker&#252;lt a haszn&#225;l&#243;t megteremteni.';
	$lang['strconfdropuser'] = 'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; haszn&#225;l&#243;t?';
	$lang['struserdropped'] = 'A haszn&#225;l&#243; t&#246;r&#246;lve.';
	$lang['struserdroppedbad'] = 'Nem siker&#252;lt a haszn&#225;l&#243;t t&#246;r&#246;lni.';
	$lang['straccount'] = 'Sz&#225;mla';
	$lang['strchangepassword'] = 'Jelsz&#243; megv&#225;ltoztat&#225;sa';
	$lang['strpasswordchanged'] = 'A jelsz&#243; megv&#225;ltoztatva.';
	$lang['strpasswordchangedbad'] = 'Nem siker&#252;lt a jelsz&#243;t megv&#225;ltoztatni.';
	$lang['strpasswordshort'] = 'A jelsz&#243; t&#250;l r&#246;vid.';
	$lang['strpasswordconfirm'] = 'A jelsz&#243; nem egyezik a meger&#337;s&#237;t&#233;ssel.';
	
	// Groups
	$lang['strgroup'] = 'Csoport';
	$lang['strgroups'] = 'Csoportok';
	$lang['strshowallgroups']  =  'Minden csoportot megjelen&#237;t';
	$lang['strnogroup'] = 'Nincs csoport.';
	$lang['strnogroups'] = 'Nincsenek csoportok.';
	$lang['strcreategroup'] = 'Csoportot teremt';
	$lang['strgroupneedsname'] = 'A csoportnak nevet kell adni.';
	$lang['strgroupcreated'] = 'A csoport megteremtve.';
	$lang['strgroupcreatedbad'] = 'Nem siker&#252;lt a csoportot megteremteni.';	
	$lang['strconfdropgroup'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; csoportot?';
	$lang['strgroupdropped'] = 'A csoport t&#246;r&#246;lve.';
	$lang['strgroupdroppedbad'] = 'Nem siker&#252;lt a csoportot t&#246;r&#246;lni.';
	$lang['strmembers'] = 'Tagok';
	$lang['strmemberof']  =  'Tagja ';
	$lang['stradminmembers']  =  'Admin tagok';
	$lang['straddmember'] = 'Tagot vesz fel';
	$lang['strmemberadded'] = 'Tag felv&#233;ve.';
	$lang['strmemberaddedbad'] = 'Nem siker&#252;lt tagot felvenni.';
	$lang['strdropmember'] = 'Tag kicsap&#225;sa';
	$lang['strconfdropmember'] = 'Biztosan ki akarja csapni &#8222;%s&#8221; tagot &#8222;%s&#8221; csoportb&#243;l?';
	$lang['strmemberdropped'] = 'A tag kicsapva.';
	$lang['strmemberdroppedbad'] = 'Nem siker&#252;lt a tagot kicsapni.';

	// Roles
	$lang['strrole']  =  'Szerep';
	$lang['strroles']  =  'Szerepek';
	$lang['strshowallroles']  =  'Minden szerepet megjelen&#237;t';
	$lang['strnoroles']  =  'Nincs szerep.';
	$lang['strinheritsprivs']  =  'Jogosults&#225;gokat &#246;r&#246;k&#246;l?';
	$lang['strcreaterole']  =  'Szerepet teremt';
	$lang['strcancreaterole']  =  'Teremthet szerepet?';
	$lang['strrolecreated']  =  'Szerep megteremtve.';
	$lang['strrolecreatedbad']  =  'Nem siker&#252;lt szerepet teremteni.';
	$lang['strrolealtered']  =  'Szerep megv&#225;ltoztatva.';
	$lang['strrolealteredbad']  =  'Nem siker&#252;lt szerepet v&#225;ltoztatni.';
	$lang['strcanlogin']  =  'Bel&#233;phet?';
	$lang['strconnlimit']  =  'Kapcsolat korl&#225;tja';
	$lang['strdroprole']  =  'Szerepet t&#246;r&#246;l';
	$lang['strconfdroprole']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; szerepet?';
	$lang['strroledropped']  =  'Szerep t&#246;r&#246;lve.';
	$lang['strroledroppedbad']  =  'Nem siker&#252;lt szerepet t&#246;r&#246;lni.';
	$lang['strnolimit']  =  'Nincs korl&#225;t';
	$lang['strnever']  =  'Soha';
	$lang['strroleneedsname']  =  'Nevet kell adni a szerepnek.';

	// Privileges
	$lang['strprivilege'] = 'Jogosults&#225;g';
	$lang['strprivileges'] = 'Jogosults&#225;gok';
	$lang['strnoprivileges'] = 'Ez objektum alap-jogosults&#225;gokkal rendelkezik.';
	$lang['strgrant'] = 'Feljogos&#237;t';
	$lang['strrevoke'] = 'Jogosults&#225;got megvon';
	$lang['strgranted'] = 'A jogosults&#225;gok megv&#225;ltoztatva.';
	$lang['strgrantfailed'] = 'Nem siker&#252;lt a jogosults&#225;gokat megv&#225;ltoztatni.';
	$lang['strgrantbad'] = 'Legal&#225;bb egy felhaszn&#225;l&#243;t &#233;s jogosults&#225;got ki kell v&#225;lasztani.';
	$lang['strgrantor'] = 'Jogos&#237;t&#243;';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Adatb&#225;zis';
	$lang['strdatabases'] = 'Adatb&#225;zisok';
	$lang['strshowalldatabases'] = 'Minden adatb&#225;zist megjelen&#237;t';
	$lang['strnodatabases'] = 'Nincs adatb&#225;zis.';
	$lang['strcreatedatabase'] = 'Adatb&#225;zist teremt';
	$lang['strdatabasename'] = 'Adatb&#225;zisn&#233;v';
	$lang['strdatabaseneedsname'] = 'Meg kell adni az adatb&#225;zis nev&#233;t.';
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
	$lang['strreindexbad'] = 'Nem siker&#252;lt az &#250;jraindexel&#233;s.';
	$lang['strfull'] = 'Teljes';
	$lang['strfreeze'] = 'Befagyaszt';
	$lang['strforce'] = 'K&#233;nyszer&#237;t';
	$lang['strsignalsent']  =  'Jelz&#233;s elk&#252;ldve.';
	$lang['strsignalsentbad']  =  'Nem siker&#252;lt jelz&#233;st k&#252;ldeni.';
	$lang['strallobjects']  =  'Minden objektum';
	$lang['strdatabasealtered']  =  'Adatb&#225;zis megv&#225;ltoztatva.';
	$lang['strdatabasealteredbad']  =  'Nem siker&#252;lt az adatb&#225;zist megv&#225;ltoztatni.';
	$lang['strspecifydatabasetodrop']  =  'Meg kell adni a t&#246;rlend&#337; adatb&#225;zist';
	$lang['strtemplatedb'] = 'Sablon';
	$lang['strconfanalyzedatabase'] = 'Biztosan elemezni akarja &#8222;%s&#8221; adatb&#225;zis minden t&#225;bl&#225;j&#225;t?';
	$lang['strconfvacuumdatabase'] = 'Biztosan takar&#237;tani akarja &#8222;%s&#8221; adatb&#225;zis minden t&#225;bl&#225;j&#225;t?';
	$lang['strconfreindexdatabase'] = 'Biztosan indexelni akarja &#8222;%s&#8221; adatb&#225;zis minden t&#225;bl&#225;j&#225;t?';
	$lang['strconfclusterdatabase'] = 'Biztosan f&#252;rt&#246;zni akarja &#8222;%s&#8221; adatb&#225;zis minden t&#225;bl&#225;j&#225;t?';

	// Views
	$lang['strview'] = 'N&#233;zet';
	$lang['strviews'] = 'N&#233;zetek';
	$lang['strshowallviews'] = 'Minden n&#233;zetet megjelen&#237;t';
	$lang['strnoview'] = 'Nincs n&#233;zet.';
	$lang['strnoviews'] = 'Nincsenek n&#233;zetek.';
	$lang['strcreateview'] = 'N&#233;zetet teremt';
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
	$lang['strcreateviewwiz'] = 'N&#233;zetet teremt var&#225;zsl&#243;val';
	$lang['strrenamedupfields']  =  'M&#225;solt mez&#337;ket nevez &#225;t';
	$lang['strdropdupfields']  =  'M&#225;solt mez&#337;ket t&#246;r&#246;l';
	$lang['strerrordupfields']  =  'Hiba a m&#225;solt mez&#337;kben';
	$lang['strviewaltered']  =  'N&#233;zet megv&#225;ltoztatva.';
	$lang['strviewalteredbad']  =  'Nem siker&#252;lt megv&#225;ltoztatni a n&#233;zetet.';
	$lang['strspecifyviewtodrop']  =  'Meg kell adni a t&#246;rlend&#337; n&#233;zetet';

	// Sequences
	$lang['strsequence'] = 'Sorozat';
	$lang['strsequences'] = 'Sorozatok';
	$lang['strshowallsequences'] = 'Minden sorozatot megjelen&#237;t';
	$lang['strnosequence'] = 'Nincs sorozat.';
	$lang['strnosequences'] = 'Nincsenek sorozatok.';
	$lang['strcreatesequence'] = 'Sorozatot teremt';
	$lang['strlastvalue'] = 'Utols&#243; &#233;rt&#233;k';
	$lang['strincrementby'] = 'N&#246;vekm&#233;ny';	
	$lang['strstartvalue'] = 'Kezd&#337; &#233;rt&#233;k';
	$lang['strrestartvalue'] = '&#218;jrakezd&#337; &#233;rt&#233;k';
	$lang['strmaxvalue'] = 'Fels&#337; korl&#225;t';
	$lang['strminvalue'] = 'Als&#243; korl&#225;t';
	$lang['strcachevalue'] = 'Gyorst&#225;r &#233;rt&#233;ke';
	$lang['strlogcount'] = 'Sz&#225;ml&#225;l&#243;';
	$lang['strcancycle']  =  'K&#246;rbej&#225;rhat?';
	$lang['striscalled']  =  'N&#246;vekedj&#233;k miel&#337;tt visszat&#233;r a k&#246;vetkez&#337; &#233;rt&#233;kkel (is_called)?';
	$lang['strsequenceneedsname'] = 'Meg kell adni a sorozatnevet.';
	$lang['strsequencecreated'] = 'A sorozat megteremtve.';
	$lang['strsequencecreatedbad'] = 'Nem siker&#252;lt megteremteni a sorozatot.'; 
	$lang['strconfdropsequence'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; sorozatot?';
	$lang['strsequencedropped'] = 'A sorozat t&#246;r&#246;lve.';
	$lang['strsequencedroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a sorozatot.';
	$lang['strsequencerestart'] = 'Sorozat &#250;jrakezdve.';
	$lang['strsequencerestartbad'] = 'Nem siker&#252;lt &#250;jrakezdeni a sorozatot.';
	$lang['strsequencereset'] = 'Sorozat null&#225;z&#225;sa.';
	$lang['strsequenceresetbad'] = 'Nem siker&#252;lt null&#225;zni a sorozatot.'; 
 	$lang['strsequencealtered']  =  'Sorozat megv&#225;ltoztatva.';
 	$lang['strsequencealteredbad']  =  'Nem siker&#252;lt megv&#225;ltoztatni a sorozatot.';
 	$lang['strsetval']  =  '&#201;rt&#233;ket ad';
 	$lang['strsequencesetval']  =  '&#201;rt&#233;k megadva.';
 	$lang['strsequencesetvalbad']  =  'Nem siker&#252;lt az &#233;rt&#233;kad&#225;s.';
 	$lang['strnextval']  =  'N&#246;vekm&#233;ny';
 	$lang['strsequencenextval']  =  'Sorozat megn&#246;velve.';
 	$lang['strsequencenextvalbad']  =  'Nem siker&#252;lt megn&#246;velni a sorozatot.';
	$lang['strspecifysequencetodrop']  =  'Meg kell adnia a t&#246;rlend&#337; sorozatot';

	// Indexes
	$lang['strindex'] = 'Index';
	$lang['strindexes']  =  'Indexek';
	$lang['strindexname'] = 'Indexn&#233;v';
	$lang['strshowallindexes'] = 'Minden indexet megjelen&#237;t';
	$lang['strnoindex'] = 'Nincs index.';
	$lang['strnoindexes'] = 'Nincsenek indexek.';
	$lang['strcreateindex'] = 'Indexet teremt';
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
	$lang['strclusteredgood'] = 'F&#252;rt&#246;z&#233;s k&#233;sz.';
	$lang['strclusteredbad'] = 'Nem siker&#252;lt f&#252;rt&#246;zni.';
	$lang['strconcurrently'] = 'Egyszerre';
	$lang['strnoclusteravailable'] = 'A t&#225;bla nincs indexre f&#252;rt&#246;zve.';

	// Rules
	$lang['strrules'] = 'Szab&#225;lyok';
	$lang['strrule'] = 'Szab&#225;ly';
	$lang['strshowallrules'] = 'Minden szab&#225;lyt megjelen&#237;t';
	$lang['strnorule'] = 'Nincs szab&#225;ly.';
	$lang['strnorules'] = 'Nincsenek szab&#225;lyok.';
	$lang['strcreaterule'] = 'Szab&#225;lyt teremt';
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
	$lang['strshowallconstraints'] = 'Minden megszor&#237;t&#225;st megjelen&#237;t';
	$lang['strnoconstraints'] = 'Nincsenek megszor&#237;t&#225;sok.';
	$lang['strcreateconstraint'] = 'Megszor&#237;t&#225;st teremt';
	$lang['strconstraintcreated'] = 'A megszor&#237;t&#225;s megteremtve.';
	$lang['strconstraintcreatedbad'] = 'Nem siker&#252;lt megteremteni a megszor&#237;t&#225;st.';
	$lang['strconfdropconstraint'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; megszor&#237;t&#225;st &#8222;%s&#8221; t&#225;bl&#225;ban?';
	$lang['strconstraintdropped'] = 'A megszor&#237;t&#225;s t&#246;r&#246;lve.';
	$lang['strconstraintdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a megszor&#237;t&#225;st.';
	$lang['straddcheck'] = 'Ellen&#337;rz&#233;st ad hozz&#225;';
	$lang['strcheckneedsdefinition'] = 'Meg kell adni az ellen&#337;rz&#233;s defin&#237;ci&#243;j&#225;t.';
	$lang['strcheckadded'] = 'Az ellen&#337;rz&#233;s hozz&#225;adva.';
	$lang['strcheckaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az ellen&#337;rz&#233;st.';
	$lang['straddpk'] = 'Els&#337;dleges kulcsot ad hozz&#225;';
	$lang['strpkneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni els&#337;dleges kulcsnak.';
	$lang['strpkadded'] = 'Els&#337;dleges kulcs hozz&#225;adva.';
	$lang['strpkaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az els&#337;dleges kulcsot.';
	$lang['stradduniq'] = 'Egyedi kulcsot ad hozz&#225;';
	$lang['struniqneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni egyedi kulcsnak.';
	$lang['struniqadded'] = 'Az egyedi kulcs hozz&#225;adva.';
	$lang['struniqaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni az egyedi kulcsot.';
	$lang['straddfk'] = 'K&#252;ls&#337; kulcsot ad hozz&#225;';
	$lang['strfkneedscols'] = 'Legal&#225;bb egy oszlopot meg kell adni k&#252;ls&#337; kulcsnak.';
	$lang['strfkneedstarget'] = 'Meg kell adni a c&#233;lt&#225;bl&#225;t a k&#252;ls&#337; kulcsnak.';
	$lang['strfkadded'] = 'A k&#252;ls&#337; kulcs hozz&#225;adva.';
	$lang['strfkaddedbad'] = 'Nem siker&#252;lt hozz&#225;adni a k&#252;ls&#337; kulcsot.';
	$lang['strfktarget'] = 'C&#233;lt&#225;bla';
	$lang['strfkcolumnlist'] = 'Kulcsoszlopok';
	$lang['strondelete'] = 'T&#214;RL&#201;SKOR';
	$lang['stronupdate'] = 'V&#193;LTOZTAT&#193;SKOR';

	// Functions
	$lang['strfunction'] = 'F&#252;ggv&#233;ny';
	$lang['strfunctions'] = 'F&#252;ggv&#233;nyek';
	$lang['strshowallfunctions'] = 'Minden f&#252;ggv&#233;nyt megjelen&#237;t';
	$lang['strnofunction'] = 'Nincs f&#252;ggv&#233;ny.';
	$lang['strnofunctions'] = 'Nincsenek f&#252;ggv&#233;nyek.';
	$lang['strcreateplfunction']  =  'SQL/PL f&#252;ggv&#233;nyt teremt';
	$lang['strcreateinternalfunction']  =  'Bels&#337; f&#252;ggv&#233;nyt teremt';
	$lang['strcreatecfunction']  =  'C f&#252;ggv&#233;nyt teremt';
	$lang['strfunctionname'] = 'F&#252;ggv&#233;nyn&#233;v';
	$lang['strreturns'] = 'Visszat&#233;r&#337; &#233;rt&#233;k';
	$lang['strproglanguage'] = 'Programnyelv';
	$lang['strfunctionneedsname'] = 'Meg kell adni a f&#252;ggv&#233;ny nev&#233;t.';
	$lang['strfunctionneedsdef'] = 'Meg kell adni a f&#252;ggv&#233;ny defin&#237;ci&#243;j&#225;t.';
	$lang['strfunctioncreated'] = 'A f&#252;ggv&#233;ny megteremtve.';
	$lang['strfunctioncreatedbad'] = 'Nem siker&#252;lt megteremteni a f&#252;ggv&#233;nyt.';
	$lang['strconfdropfunction'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; f&#252;ggv&#233;nyt?';
	$lang['strfunctiondropped'] = 'A f&#252;ggv&#233;ny t&#246;r&#246;lve.';
	$lang['strfunctiondroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a f&#252;ggv&#233;nyt.';
	$lang['strfunctionupdated'] = 'A f&#252;ggv&#233;ny id&#337;szer&#369;s&#237;tve.';
	$lang['strfunctionupdatedbad'] = 'Nem siker&#252;lt a f&#252;ggv&#233;nyt id&#337;szer&#369;s&#237;teni.';
	$lang['strobjectfile']  =  'C&#233;lk&#243;d f&#225;jl';
	$lang['strlinksymbol']  =  'Szerkeszt&#337; szimb&#243;lum';
	$lang['strarguments']  =  'Argumentumok';
	$lang['strargmode']  =  'M&#243;d';
	$lang['strargtype']  =  'T&#237;pus';
	$lang['strargadd']  =  'M&#225;s argumentumot ad hozz&#225;';
	$lang['strargremove']  =  'Argumentumot t&#246;r&#246;l';
	$lang['strargnoargs']  =  'E f&#252;ggv&#233;nynek nincsenek argumentumai.';
	$lang['strargenableargs']  =  'E f&#252;ggv&#233;nynek &#225;tadott argumentumok enged&#233;lyez&#233;se.';
	$lang['strargnorowabove']  =  'Egy sornak kell lennie e f&#246;l&#246;tt.';
	$lang['strargnorowbelow']  =  'Egy sornak kell lennie ez alatt.';
	$lang['strargraise']  =  'Mozg&#225;s fel.';
	$lang['strarglower']  =  'Mozg&#225;s le.';
	$lang['strargremoveconfirm']  =  'Biztosan t&#246;r&#246;lj&#252;k ez argumentumot? Ez VISSZAVONHATATLAN.';
	$lang['strfunctioncosting']  =  'F&#252;ggv&#233;ny k&#246;lts&#233;gei';
	$lang['strresultrows']  =  'Eredm&#233;ny sorok';
	$lang['strexecutioncost']  =  'V&#233;grehajt&#225;s k&#246;lts&#233;ge';
	$lang['strspecifyfunctiontodrop']  =  'Legal&#225;bb egy t&#246;rlend&#337; f&#252;ggv&#233;nyt meg kell adni';

	// Triggers
	$lang['strtrigger'] = 'Ravasz';
	$lang['strtriggers'] = 'Ravaszok';
	$lang['strshowalltriggers'] = 'Minden ravaszt megjelen&#237;t';
	$lang['strnotrigger'] = 'Nincs ravasz.';
	$lang['strnotriggers'] = 'Nincsenek ravaszok.';
	$lang['strcreatetrigger'] = 'Ravaszt teremt';
	$lang['strtriggerneedsname'] = 'Meg kell adni a ravasz nev&#233;t.';
	$lang['strtriggerneedsfunc'] = 'Meg kell adni egy f&#252;ggv&#233;ny nev&#233;t a ravaszhoz.';
	$lang['strtriggercreated'] = 'Ravasz megteremtve.';
	$lang['strtriggercreatedbad'] = 'Nem siker&#252;lt megteremteni a ravaszt.';
	$lang['strconfdroptrigger'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; ravaszt &#8222;%s&#8221; t&#225;bl&#225;ban?';
	$lang['strconfenabletrigger']  =  'Biztosan enged&#233;lyezz&#252;k &#8222;%s&#8221; ravaszt &#8222;%s&#8221; elemre?';
	$lang['strconfdisabletrigger']  =  'Biztosan letiltsuk &#8222;%s&#8221; ravaszt &#8222;%s&#8221; elemre?';
	$lang['strtriggerdropped'] = 'Ravasz t&#246;r&#246;lve.';
	$lang['strtriggerdroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a ravaszt.';
	$lang['strtriggerenabled']  =  'Ravasz enged&#233;lyezve.';
	$lang['strtriggerenabledbad']  =  'Nem siker&#252;lt a ravaszt enged&#233;lyezni.';
	$lang['strtriggerdisabled']  =  'Ravasz letiltva.';
	$lang['strtriggerdisabledbad']  =  'Nem siker&#252;lt a ravaszt letiltani.';
	$lang['strtriggeraltered'] = 'Ravasz megv&#225;ltoztatva.';
	$lang['strtriggeralteredbad'] = 'Nem siker&#252;lt megv&#225;ltoztatni a triggert.';
	$lang['strforeach']  =  'Mindegyik';

	// Types
	$lang['strtype'] = 'T&#237;pus';
	$lang['strtypes'] = 'T&#237;pusok';
	$lang['strshowalltypes'] = 'Minden t&#237;pust megjelen&#237;t';
	$lang['strnotype'] = 'Nincs t&#237;pus.';
	$lang['strnotypes'] = 'Nincsenek t&#237;pusok.';
	$lang['strcreatetype'] = 'T&#237;pust teremt';
	$lang['strcreatecomptype']  =  '&#214;sszetett t&#237;pust teremt';
	$lang['strcreateenumtype']  =  'Felsorol&#225;s t&#237;pust teremt';
	$lang['strtypeneedsfield']  =  'Legal&#225;bb egy oszlopot meg kell adnia.';
	$lang['strtypeneedsvalue']  =  'Legal&#225;bb egy &#233;rt&#233;ket meg kell adni.';
	$lang['strtypeneedscols']  =  '&#201;rv&#233;nyes oszlopsz&#225;mot kell megadnia.';	
	$lang['strtypeneedsvals']  =  '&#201;rv&#233;nyes &#233;rt&#233;ksz&#225;mot kell megadni.';
	$lang['strinputfn'] = 'Beviteli f&#252;ggv&#233;ny';
	$lang['stroutputfn'] = 'Kiviteli f&#252;ggv&#233;ny';
	$lang['strpassbyval'] = '&#201;rt&#233;k szerinti &#225;tad&#225;s?';
	$lang['stralignment'] = 'Igaz&#237;t';
	$lang['strelement'] = 'Elem';
	$lang['strdelimiter'] = 'Hat&#225;rol&#243;';
	$lang['strstorage'] = 'T&#225;r';
	$lang['strfield']  =  'Oszlop';
	$lang['strnumfields']  =  'Oszlopok sz&#225;ma';
	$lang['strnumvalues']  =  '&#201;rt&#233;kek sz&#225;ma';
	$lang['strtypeneedsname'] = 'T&#237;pusnevet kell megadni.';
	$lang['strtypeneedslen'] = 'Meg kell adni a t&#237;pus hossz&#225;t.';
	$lang['strtypecreated'] = 'T&#237;pus megteremtve';
	$lang['strtypecreatedbad'] = 'Nem siker&#252;lt megteremteni a t&#237;pust.';
	$lang['strconfdroptype'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; t&#237;pust?';
	$lang['strtypedropped'] = 'T&#237;pus t&#246;r&#246;lve.';
	$lang['strtypedroppedbad'] = 'Nem siker&#252;lt t&#246;r&#246;lni a t&#237;pust.';
	$lang['strflavor']  =  'Fajta';
	$lang['strbasetype']  =  'Alap';
	$lang['strcompositetype']  =  '&#214;sszetett';
	$lang['strpseudotype']  =  '&#193;l';
	$lang['strenum']  =  'Felsorol&#225;s';
	$lang['strenumvalues']  =  'Felsorol&#225;s &#233;rt&#233;kei';

	// Schemas
	$lang['strschema'] = 'S&#233;ma';
	$lang['strschemas'] = 'S&#233;m&#225;k';
	$lang['strshowallschemas'] = 'Minden s&#233;m&#225;t megjelen&#237;t';
	$lang['strnoschema'] = 'Nincs s&#233;ma.';
	$lang['strnoschemas'] = 'Nincsenek s&#233;m&#225;k.';
	$lang['strcreateschema'] = 'S&#233;m&#225;t teremt';
	$lang['strschemaname'] = 'S&#233;man&#233;v';
	$lang['strschemaneedsname'] = 'Meg kell adni a s&#233;manevet.';
	$lang['strschemacreated'] = 'A s&#233;ma megteremtve';
	$lang['strschemacreatedbad'] = 'Nem siker&#252;lt a s&#233;m&#225;t megteremteni.';
	$lang['strconfdropschema'] = 'Biztosan t&#246;r&#246;lni k&#237;v&#225;nja &#8222;%s&#8221; s&#233;m&#225;t?';
	$lang['strschemadropped'] = 'A s&#233;ma t&#246;r&#246;lve.';
	$lang['strschemadroppedbad'] = 'Nem siker&#252;lt a s&#233;m&#225;t t&#246;r&#246;lni.';
	$lang['strschemaaltered'] = 'S&#233;ma megv&#225;ltoztatva.';
	$lang['strschemaalteredbad'] = 'Nem siker&#252;lt a s&#233;m&#225;t megv&#225;ltoztatni.';
	$lang['strsearchpath']  =  'S&#233;ma keres&#233;si &#250;tvonala';
	$lang['strspecifyschematodrop']  =  'Meg kell adni a t&#246;rlend&#337; s&#233;m&#225;t';

	// Reports
	$lang['strreport'] = 'Jelent&#233;s';
	$lang['strreports'] = 'Jelent&#233;sek';
	$lang['strshowallreports'] = 'Minden jelent&#233;st megjelen&#237;t';
	$lang['strnoreports'] = 'Nincsenek jelent&#233;sek.';
	$lang['strcreatereport'] = 'Jelent&#233;st teremt';
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
	$lang['strshowalldomains'] = 'Minden tartom&#225;nyt megjelen&#237;t';
	$lang['strnodomains'] = 'Nincsnek tartom&#225;nyok.';
	$lang['strcreatedomain'] = 'Tartom&#225;nyt teremt';
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
	$lang['strshowalloperators'] = 'Minden oper&#225;tort megjelen&#237;t';
	$lang['strnooperator'] = 'Nincs oper&#225;tor.';
	$lang['strnooperators'] = 'Nincsenek oper&#225;torok.';
	$lang['strcreateoperator'] = 'Oper&#225;tort teremt';
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
	$lang['straggregate']  =  'Aggreg&#225;l&#225;s';
	$lang['straggregates'] = 'Aggreg&#225;l&#225;sok';
	$lang['strnoaggregates'] = 'Nincsenek aggreg&#225;l&#225;sok.';
	$lang['stralltypes'] = '(Minden t&#237;pus)';
	$lang['strcreateaggregate']  =  'Aggreg&#225;l&#225;st teremt';
	$lang['straggrbasetype']  =  'Bemen&#337; adatt&#237;pus';
	$lang['straggrsfunc']  =  '&#193;llapot&#225;tmeneti f&#252;ggv&#233;ny';
	$lang['straggrstype']  =  '&#193;llapot&#233;rt&#233;k adatt&#237;pusa';
	$lang['straggrffunc']  =  'V&#233;gs&#337; f&#252;ggv&#233;ny';
	$lang['straggrinitcond']  =  'Kezd&#337; felt&#233;tel';
	$lang['straggrsortop']  =  'Rendez&#337; m&#369;velet';
	$lang['strconfdropaggregate']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; aggreg&#225;l&#225;st?';
	$lang['straggregatedropped']  =  'Aggreg&#225;l&#225;s t&#246;r&#246;lve.';
	$lang['straggregatedroppedbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni az aggreg&#225;l&#225;st.';
	$lang['straggraltered']  =  'Aggreg&#225;l&#225;s megv&#225;ltoztatva.';
	$lang['straggralteredbad']  =  'Nem siker&#252;lt az aggreg&#225;l&#225;st megv&#225;ltoztatni.';
	$lang['straggrneedsname']  =  'Meg kell adni az aggreg&#225;l&#225;s nev&#233;t.';
	$lang['straggrneedsbasetype']  =  'Meg kell adni az aggreg&#225;l&#225;s bemen&#337; adatt&#237;pus&#225;t.';
	$lang['straggrneedssfunc']  =  'Meg kell adni az aggreg&#225;l&#225;s &#225;llapot&#225;tmeneti f&#252;ggv&#233;ny&#233;nek nev&#233;t.';
	$lang['straggrneedsstype']  =  'Meg kell adni az aggreg&#225;l&#225;s &#225;llapot&#233;rt&#233;k&#233;nek adatt&#237;pus&#225;t.';
	$lang['straggrcreated']  =  'Aggreg&#225;l&#225;s megteremtve.';
	$lang['straggrcreatedbad']  =  'Nem siker&#252;lt megteremteni az aggreg&#225;l&#225;st.';
	$lang['straggrshowall']  =  'Minden aggreg&#225;l&#225;s megjelen&#237;t&#233;se';

	// Operator Classes
	$lang['stropclasses'] = 'Oper&#225;tor-oszt&#225;lyok';
	$lang['strnoopclasses'] = 'Nincsenek oper&#225;tor-oszt&#225;lyok.';
	$lang['straccessmethod'] = 'Hozz&#225;f&#233;r&#233;s m&#243;dja';

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
	$lang['strshowalltablespaces']  =  'Minden t&#225;blahelyet megjelen&#237;t';
	$lang['strnotablespaces']  =  'Nincsenek t&#225;blahelyek.';
	$lang['strcreatetablespace']  =  'T&#225;blahelyet teremt';
	$lang['strlocation']  =  'Hely';
	$lang['strtablespaceneedsname']  =  'Nevet kell adnia a t&#225;blahelynek.';
	$lang['strtablespaceneedsloc']  =  'Meg kell adnia egy mapp&#225;t, ahol a t&#225;blahelyet teremti.';
	$lang['strtablespacecreated']  =  'T&#225;blahely teremtve.';
	$lang['strtablespacecreatedbad']  =  'Nem siker&#252;lt t&#225;blahelyet teremteni.';
	$lang['strconfdroptablespace']  =  'Biztosan ki akarja dobni &#8222;%s&#8221; t&#225;blahelyet?';
	$lang['strtablespacedropped']  =  'T&#225;blahely kidobva.';
	$lang['strtablespacedroppedbad']  =  'Nem siker&#252;lt kidobni a t&#225;blahelyet.';
	$lang['strtablespacealtered']  =  'T&#225;blahely megv&#225;ltoztatva.';
	$lang['strtablespacealteredbad']  =  'Nem siker&#252;lt megv&#225;ltoztatni a t&#225;blahelyet.';

	// Slony clusters
	$lang['strcluster']  =  'F&#252;rt';
	$lang['strnoclusters']  =  'Nincs f&#252;rt.';
	$lang['strconfdropcluster']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; f&#252;rt&#246;t?';
	$lang['strclusterdropped']  =  'F&#252;rt t&#246;r&#246;lve.';
	$lang['strclusterdroppedbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a f&#252;rt&#246;t.';
	$lang['strinitcluster']  =  'F&#252;rt&#246;t k&#233;sz&#237;t';
	$lang['strclustercreated']  =  'F&#252;rt k&#233;sz.';
	$lang['strclustercreatedbad']  =  'Nem siker&#252;lt f&#252;rt&#246;t k&#233;sz&#237;teni.';
	$lang['strclusterneedsname']  =  'Nevet kell adnia a f&#252;rtnek.';
	$lang['strclusterneedsnodeid']  =  'Azonos&#237;t&#243;t kell adnia a helyi csom&#243;pontnak.';
	
	// Slony nodes
	$lang['strnodes']  =  'Csom&#243;pontok';
	$lang['strnonodes']  =  'Nincs csom&#243;pont.';
	$lang['strcreatenode']  =  'Csom&#243;pontot teremt';
	$lang['strid']  =  'Az';
	$lang['stractive']  =  'Akt&#237;v';
	$lang['strnodecreated']  =  'Csom&#243;pont megteremtve.';
	$lang['strnodecreatedbad']  =  'Nem siker&#252;lt csom&#243;pontot teremteni.';
	$lang['strconfdropnode']  =  'Biztosan el akarja dobni &#8222;%s&#8221; csom&#243;pontot?';
	$lang['strnodedropped']  =  'Csom&#243;pont eldobva.';
	$lang['strnodedroppedbad']  =  'Nem siker&#252;lt eldobni a csom&#243;pontot.';
	$lang['strfailover']  =  '&#193;thidal';
	$lang['strnodefailedover']  =  'V&#233;gponti hiba &#225;thidalva.';
	$lang['strnodefailedoverbad']  =  'Nem siker&#252;lt &#225;thidalni a v&#233;gpont hib&#225;j&#225;t.';
	$lang['strstatus']  =  '&#193;llapot';	
	$lang['strhealthy']  =  '&#201;p';
	$lang['stroutofsync']  =  'Lemarad&#225;s';
	$lang['strunknown']  =  'Ismeretlen';	
	
	// Slony paths	
	$lang['strpaths']  =  '&#214;sv&#233;nyek';
	$lang['strnopaths']  =  'Nincs &#246;sv&#233;ny.';
	$lang['strcreatepath']  =  '&#214;sv&#233;nyt teremt';
	$lang['strnodename']  =  'Csom&#243;pont neve';
	$lang['strnodeid']  =  'Csom&#243;pont-azonos&#237;t&#243;';
	$lang['strconninfo']  =  'Csatlakoz&#225;s t&#225;j&#233;koztat&#243;';
	$lang['strconnretry']  =  'M&#225;sodpercek a csatlakoz&#225;s ism&#233;tl&#233;s&#233;ig';
	$lang['strpathneedsconninfo']  =  'Meg kell adnia a kapcsolati sz&#246;veget az &#246;sv&#233;nyhez.';
	$lang['strpathneedsconnretry']  =  'Meg kell adnia a csatlakoz&#225;s ism&#233;tl&#233;s&#233;ig t&#246;rt&#233;n&#337; v&#225;rakoz&#225;s idej&#233;t m&#225;sodpercekben.';
	$lang['strpathcreated']  =  '&#214;sv&#233;ny megteremtve.';
	$lang['strpathcreatedbad']  =  'Nem siker&#252;lt &#246;sv&#233;nyt teremteni.';
	$lang['strconfdroppath']  =  'Biztosan el akarja dobni &#8222;%s&#8221; &#246;sv&#233;nyt?';
	$lang['strpathdropped']  =  '&#214;sv&#233;ny eldobva.';
	$lang['strpathdroppedbad']  =  'Nem siker&#252;lt az &#246;sv&#233;nyt eldobni.';

	// Slony listens
	$lang['strlistens']  =  'Figyel&#337;k';
	$lang['strnolistens']  =  'Nincs figyel&#337;.';
	$lang['strcreatelisten']  =  'Figyel&#337;t teremt';
	$lang['strlistencreated']  =  'Figyel&#337; megteremtve.';
	$lang['strlistencreatedbad']  =  'Nem siker&#252;lt figyel&#337;t teremteni.';
	$lang['strconfdroplisten']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; figyel&#337;t?';
	$lang['strlistendropped']  =  'Figyel&#337; t&#246;r&#246;lve.';
	$lang['strlistendroppedbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a figyel&#337;t.';

	// Slony replication sets
	$lang['strrepsets']  =  'M&#225;sodlatok';
	$lang['strnorepsets']  =  'Nincs m&#225;sodlat.';
	$lang['strcreaterepset']  =  'M&#225;sodlatot teremt';
	$lang['strrepsetcreated']  =  'M&#225;sodlat megteremtve.';
	$lang['strrepsetcreatedbad']  =  'Nem siker&#252;lt m&#225;sodlatot teremteni.';
	$lang['strconfdroprepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetdropped']  =  'M&#225;sodlat t&#246;r&#246;lve.';
	$lang['strrepsetdroppedbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a m&#225;sodlatot.';
	$lang['strmerge']  =  '&#214;sszef&#233;s&#252;l';
	$lang['strmergeinto']  =  '&#214;sszef&#233;s&#252;l ide';
	$lang['strrepsetmerged']  =  'M&#225;sodlatok &#246;sszef&#233;s&#252;lve.';
	$lang['strrepsetmergedbad']  =  'Nem siker&#252;lt &#246;sszef&#233;s&#252;lni a m&#225;sodlatokat.';
	$lang['strmove']  =  'Mozgat';
	$lang['strneworigin']  =  '&#218;j eredet';
	$lang['strrepsetmoved']  =  'M&#225;sodlat mozgatva.';
	$lang['strrepsetmovedbad']  =  'Nem siker&#252;lt elmozgatni a m&#225;sodlatot.';
	$lang['strnewrepset']  =  '&#218;j m&#225;sodlat';
	$lang['strlock']  =  'Z&#225;rol';
	$lang['strlocked']  =  'Z&#225;rolva';
	$lang['strunlock']  =  'Kiold&#225;s';
	$lang['strconflockrepset']  =  'Biztosan z&#225;rolni akarja &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetlocked']  =  'M&#225;sodlat z&#225;rolva.';
	$lang['strrepsetlockedbad']  =  'Nem siker&#252;lt z&#225;rolni a m&#225;sodlatot.';
	$lang['strconfunlockrepset']  =  'Biztosan ki akarja oldani &#8222;%s&#8221; m&#225;sodlatot?';
	$lang['strrepsetunlocked']  =  'M&#225;sodlat kioldva.';
	$lang['strrepsetunlockedbad']  =  'Nem siker&#252;lt kioldani a m&#225;sodlatot.';
	$lang['stronlyonnode']  =  'Csak helyben';
	$lang['strddlscript']  =  'DDL-&#237;r&#225;s';
	$lang['strscriptneedsbody']  =  'Meg kell adnia egy &#237;r&#225;st, amit minden helyen v&#233;grehajtanak.';
	$lang['strscriptexecuted']  =  'M&#225;sodlati DDL-&#237;r&#225;s v&#233;grehajtva.';
	$lang['strscriptexecutedbad']  =  'Nem siker&#252;lt v&#233;grehajtani a m&#225;sodlati DDL-&#237;r&#225;st.';
	$lang['strtabletriggerstoretain']  =  'A k&#246;vetkez&#337; triggereket Slony NEM tiltja le:';

	// Slony tables in replication sets
	$lang['straddtable']  =  'T&#225;bl&#225;t felvesz';
	$lang['strtableneedsuniquekey']  =  'T&#225;bla felv&#233;tel&#233;hez els&#337;dleges vagy egyedi kulcs kell.';
	$lang['strtableaddedtorepset']  =  'T&#225;bla felv&#233;ve a m&#225;sodlatba.';
	$lang['strtableaddedtorepsetbad']  =  'Nem siker&#252;lt felvenni a t&#225;bl&#225;t a m&#225;sodlatba.';
	$lang['strconfremovetablefromrepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; t&#225;bl&#225;t &#8222;%s&#8221; m&#225;sodlatb&#243;l?';
	$lang['strtableremovedfromrepset']  =  'T&#225;bla t&#246;r&#246;lve a m&#225;sodlatb&#243;l.';
	$lang['strtableremovedfromrepsetbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a t&#225;bl&#225;t a m&#225;sodlatb&#243;l.';

	// Slony sequences in replication sets
	$lang['straddsequence']  =  'Sorozatot felvesz';
	$lang['strsequenceaddedtorepset']  =  'Sorozat felv&#233;ve a m&#225;sodlatba.';
	$lang['strsequenceaddedtorepsetbad']  =  'Nem siker&#252;lt felvenni a sorozatot a m&#225;sodlatba.';
	$lang['strconfremovesequencefromrepset']  =  'Biztosan t&#246;r&#246;lni akarja &#8222;%s&#8221; sorozatot &#8222;%s&#8221; m&#225;sodlatb&#243;l?';
	$lang['strsequenceremovedfromrepset']  =  'Sorozat t&#246;r&#246;lve a m&#225;sodlatb&#243;l.';
	$lang['strsequenceremovedfromrepsetbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a sorozatot a m&#225;sodlatb&#243;l.';

	// Slony subscriptions
	$lang['strsubscriptions']  =  'Feliratkoz&#225;sok';
	$lang['strnosubscriptions']  =  'Nincs feliratkoz&#225;s.';

	// Miscellaneous
	$lang['strtopbar'] = '%s fut %s:%s c&#237;men &#8212; &#214;n &#8222;%s&#8221; n&#233;ven jelentkezett be.';
	$lang['strtimefmt'] = 'Y.m.d. H:i';
	$lang['strhelp'] = 'S&#250;g&#243;';
	$lang['strhelpicon']  =  '?';
	$lang['strhelppagebrowser']  =  'S&#250;g&#243;lap b&#246;ng&#233;sz&#337;';
	$lang['strselecthelppage']  =  'S&#250;g&#243;lapot v&#225;laszt';
	$lang['strinvalidhelppage']  =  '&#201;rv&#233;nytelen s&#250;g&#243;lap.';
	$lang['strlogintitle']  =  'Bel&#233;pett %s helyre';
	$lang['strlogoutmsg']  =  'Kil&#233;pett %s helyr&#337;l';
	$lang['strloading']  =  'Bet&#246;lt&#246;k...';
	$lang['strerrorloading']  =  'Bet&#246;lt&#233;si hiba';
	$lang['strclicktoreload']  =  'Kattintson az &#250;jrat&#246;lt&#233;shez';

	// Autovacuum
	$lang['strautovacuum']  =  '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;s';
	$lang['strturnedon']  =  'Bekapcsolva';
	$lang['strturnedoff']  =  'Kikapcsolva';
	$lang['strenabled']  =  'Enged&#233;lyezve';
	$lang['strnovacuumconf'] = 'Nem tal&#225;ltam &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;st be&#225;ll&#237;tva.';
	$lang['strvacuumbasethreshold']  =  'Takar&#237;t&#225;s alap k&#252;szb&#233;rt&#233;ke';
	$lang['strvacuumscalefactor']  =  'Takar&#237;t&#225;s m&#233;retez&#337; t&#233;nyez&#337;je';
	$lang['stranalybasethreshold']  =  'Alap k&#252;sz&#246;b&#233;rt&#233;ket elemez';
	$lang['stranalyzescalefactor']  =  'M&#233;retez&#337; t&#233;nyez&#337;t elemez';
	$lang['strvacuumcostdelay']  =  'Takar&#237;t&#225;s k&#246;lts&#233;g&#233;nek k&#233;s&#233;se';
	$lang['strvacuumcostlimit']  =  'Takar&#237;t&#225;s k&#246;lts&#233;g&#233;nek korl&#225;tja';
	$lang['strvacuumpertable'] = '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;s be&#225;ll&#237;t&#225;sa t&#225;bl&#225;nk&#233;nt';
	$lang['straddvacuumtable'] = '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;st &#225;ll&#237;t be egy t&#225;bl&#225;ra';
	$lang['streditvacuumtable'] = '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;st szerkeszt %s t&#225;bl&#225;ra';
	$lang['strdelvacuumtable'] = 'T&#246;rli az &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;st %s t&#225;bl&#225;r&#243;l?';
	$lang['strvacuumtablereset'] = 'Az &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;st %s t&#225;bl&#225;ra vissza&#225;ll&#237;tja az alap &#233;rt&#233;kekre';
	$lang['strdelvacuumtablefail'] = 'Nem siker&#252;lt t&#246;r&#246;lni az &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;st %s t&#225;bl&#225;r&#243;l';
	$lang['strsetvacuumtablesaved'] = '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;s %s t&#225;bl&#225;ra mentve.';
	$lang['strsetvacuumtablefail'] = '&#214;nm&#369;k&#246;d&#337; takar&#237;t&#225;st %s t&#225;bl&#225;ra nem siker&#252;lt be&#225;ll&#237;tani.';
	$lang['strspecifydelvacuumtable'] = 'Meg kell adni a t&#225;bl&#225;t, amir&#337;l t&#246;r&#246;lni akarja az &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;s param&#233;tereit.';
	$lang['strspecifyeditvacuumtable'] = 'Meg kell adni a t&#225;bl&#225;t, amin szerkeszteni akarja az &#246;nm&#369;k&#246;d&#337; takar&#237;t&#225;s param&#233;tereit.';
	$lang['strnotdefaultinred'] = 'A nem alap &#233;rt&#233;kek pirosak.';

	// Table-level Locks
	$lang['strlocks']  =  'Z&#225;rak';
	$lang['strtransaction']  =  'Tranzakci&#243; AZ';
	$lang['strvirtualtransaction']  =  'L&#225;tsz&#243;lagos tranzakci&#243; AZ';
	$lang['strprocessid']  =  'Folyamat AZ';
	$lang['strmode']  =  'Z&#225;rm&#243;d';
	$lang['strislockheld']  =  'Z&#225;r tartva?';

	// Prepared transactions
	$lang['strpreparedxacts']  =  'El&#337;k&#233;sz&#237;tett tranzakci&#243;k';
	$lang['strxactid']  =  'Tranzakci&#243; AZ';
	$lang['strgid']  =  'Glob&#225;lis AZ';
	
	// Fulltext search
	$lang['strfulltext']  =  'Teljes sz&#246;vegben keres';
	$lang['strftsconfig']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;s';
	$lang['strftsconfigs']  =  '&#214;ssze&#225;ll&#237;t&#225;sok';
	$lang['strftscreateconfig']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;st teremt';
	$lang['strftscreatedict']  =  'Sz&#243;t&#225;rt teremt';
	$lang['strftscreatedicttemplate']  =  'Sz&#243;t&#225;rsablont teremt';
	$lang['strftscreateparser']  =  'Elemz&#337;t teremt';
	$lang['strftsnoconfigs']  =  'Nincs TSzK &#246;ssze&#225;ll&#237;t&#225;s.';
	$lang['strftsconfigdropped']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;s t&#246;r&#246;lve.';
	$lang['strftsconfigdroppedbad']  =  'Nem siker&#252;lt t&#246;r&#246;lni a TSzK &#246;ssze&#225;ll&#237;t&#225;st.';
	$lang['strconfdropftsconfig']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; TSzK &#246;ssze&#225;ll&#237;t&#225;st?';
	$lang['strconfdropftsdict']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; TSzK sz&#243;t&#225;rt?';
	$lang['strconfdropftsmapping']  =  'Biztosan t&#246;r&#246;lj&#252;k &#8222;%s&#8221; hozz&#225;rendel&#233;st &#8222;%s&#8221; TSzK &#246;ssze&#225;ll&#237;t&#225;sb&#243;l?';
	$lang['strftstemplate']  =  'Sablon';
	$lang['strftsparser']  =  'Elemz&#337;';
	$lang['strftsconfigneedsname']  =  'Meg kell adni a TSzK &#246;ssze&#225;ll&#237;t&#225;s nev&#233;t.';
	$lang['strftsconfigcreated']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;s megteremtve.';
	$lang['strftsconfigcreatedbad']  =  'Nem siker&#252;lt megteremteni a TSzK &#246;ssze&#225;ll&#237;t&#225;st.';
	$lang['strftsmapping']  =  'Hozz&#225;rendel';
	$lang['strftsdicts']  =  'Sz&#243;t&#225;rak';
	$lang['strftsdict']  =  'Sz&#243;t&#225;r';
	$lang['strftsemptymap']  =  '&#220;res hozz&#225;rendel&#233;s a TSzK &#246;ssze&#225;ll&#237;t&#225;sban.';
	$lang['strftsconfigaltered']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;s megv&#225;ltoztatva.';
	$lang['strftsconfigalteredbad']  =  'Nem siker&#252;lt a TSzK &#246;ssze&#225;ll&#237;t&#225;st megv&#225;ltoztatni.';
	$lang['strftsconfigmap']  =  'TSzK &#246;ssze&#225;ll&#237;t&#225;s hozz&#225;rendel&#233;se';
	$lang['strftsparsers']  =  'TSzK elemz&#337;k';
	$lang['strftsnoparsers']  =  'Nincs TSzK elemz&#337;.';
	$lang['strftsnodicts']  =  'Nincs TSzK sz&#243;t&#225;r.';
	$lang['strftsdictcreated']  =  'TSzK sz&#243;t&#225;r megteremtve.';
	$lang['strftsdictcreatedbad']  =  'Nem siker&#252;lt a TSzK sz&#243;t&#225;rt megteremteni.';
  $lang['strftslexize']  =  'Sz&#243;kincs';
	$lang['strftsinit']  =  'Kezd&#233;s';
	$lang['strftsoptionsvalues']  =  'Opci&#243;k &#233;s &#233;rt&#233;kek';
	$lang['strftsdictneedsname']  =  'Meg kell adni a TSzK sz&#243;t&#225;r nev&#233;t.';
	$lang['strftsdictdropped']  =  'TSzK sz&#243;t&#225;r t&#246;r&#246;lve.';
	$lang['strftsdictdroppedbad']  =  'Nem siker&#252;lt a TSzK sz&#243;t&#225;rt t&#246;r&#246;lni.';
	$lang['strftsdictaltered']  =  'TSzK sz&#243;t&#225;r megv&#225;ltoztatva.';
	$lang['strftsdictalteredbad']  =  'Nem siker&#252;lt a TSzK sz&#243;t&#225;rt megv&#225;ltoztatni.';
	$lang['strftsaddmapping']  =  '&#218;j hozz&#225;rendel&#233;s hozz&#225;ad&#225;sa';
	$lang['strftsspecifymappingtodrop']  =  'Meg kell adni legal&#225;bb egy t&#246;rlend&#337; TSzK hozz&#225;rendel&#233;st.';
	$lang['strftsspecifyconfigtoalter']  =  'Meg kell adni a megv&#225;ltoztatand&#243; TSzK &#246;ssze&#225;ll&#237;t&#225;st';
	$lang['strftsmappingdropped']  =  'TSzK hozz&#225;rendel&#233;s t&#246;r&#246;lve.';
	$lang['strftsmappingdroppedbad']  =  'Nem siker&#252;lt a TSzK hozz&#225;rendel&#233;st t&#246;r&#246;lni.';
	$lang['strftsnodictionaries']  =  'Nincs sz&#243;t&#225;r.';
	$lang['strftsmappingaltered']  =  'TSzK hozz&#225;rendel&#233;s megv&#225;ltoztatva.';
	$lang['strftsmappingalteredbad']  =  'Nem siker&#252;lt a TSzK hozz&#225;rendel&#233;st megv&#225;ltoztatni.';
	$lang['strftsmappingadded']  =  'TSzK hozz&#225;rendel&#233;s hozz&#225;adva.';
	$lang['strftsmappingaddedbad']  =  'Nem siker&#252;lt hozz&#225;adni a TSzK hozz&#225;rendel&#233;shez.';
	$lang['strftsmappingdropped']  =  'TSzK hozz&#225;rendel&#233;s t&#246;r&#246;lve.';
	$lang['strftsmappingdroppedbad']  =  'Nem siker&#252;lt a TSzK hozz&#225;rendel&#233;st t&#246;r&#246;lni.';
	$lang['strftstabconfigs']  =  '&#214;ssze&#225;ll&#237;t&#225;sok';
	$lang['strftstabdicts']  =  'Sz&#243;t&#225;rak';
	$lang['strftstabparsers']  =  'Elemz&#337;k';
	$lang['strftscantparsercopy'] = 'Nem &#225;ll&#237;that be egy&#252;tt elemz&#337;t &#233;s sablont sz&#246;vegkeres&#337; be&#225;ll&#237;t&#225;s k&#246;zben.';
    
    
?>
