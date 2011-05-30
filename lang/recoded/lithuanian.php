<?php

	/**
	 * Lithuanian language file for phpPgAdmin.  
	 * @maintainer artvras [artvras@users.sourceforge.net]
	 *
	 * $Id: lithuanian.php,v 1.0 2011/05/25 14:34:33 $
	 */ 

	 // Language and character set
	$lang['applang'] = 'Lietuvi&#371;';
	$lang['appcharset'] = 'UTF-8';//ISO-8859-13
	$lang['applocale'] = 'lt_LT';
	$lang['appdbencoding'] = 'UTF8';//LATIN7
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'Sveiki atvyk&#281; &#303; phpPgAdmin.';
	$lang['strppahome'] = 'phpPgAdmin pradinis puslapis';
	$lang['strpgsqlhome'] = 'PostgreSQL pradinis puslapis';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL dokumentacija (vietin&#279;)';
	$lang['strreportbug'] = 'Prane&#353;ti apie klaid&#261;';
	$lang['strviewfaq'] = 'Per&#382;i&#363;r&#279;ti internetin&#303; DUK';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Prisijungti';
	$lang['strloginfailed'] = 'Nepavyko prisijungti';
	$lang['strlogindisallowed'] = 'Prisijungti neleid&#382;iama saugumo sumetimais.';
	$lang['strserver'] = 'Serveris';
	$lang['strservers'] = 'Serveriai';
	$lang['strgroupservers'] = 'Serveriai grup&#279;je &quot;%s&quot;';
	$lang['strallservers'] = 'Visi serveriai';
	$lang['strintroduction'] = '&#302;&#382;anga';//Prad&#382;ia
$lang['strhost'] = 'Host';//Pagrindinis kompiuteris
	$lang['strport'] = 'Prievadas';
	$lang['strlogout'] = 'Atsijungti';
	$lang['strowner'] = 'Valdytojas';//Savininkas
	$lang['straction'] = 'Veiksmas';
	$lang['stractions'] = 'Veiksmai';
	$lang['strname'] = 'Pavadinimas';
	$lang['strdefinition'] = 'Apibr&#279;&#382;tis';
	$lang['strproperties'] = 'Savyb&#279;s';
	$lang['strbrowse'] = 'Per&#382;i&#363;r&#279;ti';//Nar&#353;yti
	$lang['strenable'] = '&#302;jungti';
	$lang['strdisable'] = 'I&#353;jungti';
	$lang['strdrop'] = '&#352;alinti';
	$lang['strdropped'] = 'Pa&#353;alintas';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Ne Null';
	$lang['strprev'] = '&lt; Ankstesnis';
	$lang['strnext'] = 'Tolesnis &gt;';
	$lang['strfirst'] = '&lt;&lt; Pirmas';
	$lang['strlast'] = 'Paskutinis &gt;&gt;';
	$lang['strfailed'] = 'Nepavyko';
	$lang['strcreate'] = 'Sukurti';
	$lang['strcreated'] = 'Sukurta';
	$lang['strcomment'] = 'Komentaras';
	$lang['strlength'] = 'Ilgis';
	$lang['strdefault'] = 'Numatytoji reik&#353;m&#279;';//Numatytas(-a)
	$lang['stralter'] = 'Pakeisti';
	$lang['strok'] = 'Gerai';
	$lang['strcancel'] = 'Atsisakyti';
	$lang['strkill'] = 'Nutraukti';//Sunaikinti
	$lang['strac'] = '&#302;jungti automatin&#303; baigim&#261;';
	$lang['strsave'] = '&#302;ra&#353;yti';
	$lang['strreset'] = 'Atstatyti &#303; pradin&#281; b&#363;sen&#261;';//Atkurti
	$lang['strrestart'] = 'Paleisti i&#353; naujo';
	$lang['strinsert'] = '&#302;terpti';
	$lang['strselect'] = 'Atrinkti';
	$lang['strdelete'] = '&#352;alinti';
	$lang['strupdate'] = 'Atnaujinti';
	$lang['strreferences'] = 'Rodykl&#279;s';
	$lang['stryes'] = 'Taip';
	$lang['strno'] = 'Ne';
	$lang['strtrue'] = 'TIESA';
	$lang['strfalse'] = 'NETIESA';
	$lang['stredit'] = 'Taisyti';
	$lang['strcolumn'] = 'Stulpelis';
	$lang['strcolumns'] = 'Stulpeliai';
	$lang['strrows'] = '&#303;ra&#353;as(-ai)';
	$lang['strrowsaff'] = '&#303;ra&#353;as(-ai) paveikti.';
	$lang['strobjects'] = 'objektas (-ai)';
	$lang['strback'] = 'Atgal';
	$lang['strqueryresults'] = 'U&#382;klausos rezultatai';
	$lang['strshow'] = 'Rodyti';
	$lang['strempty'] = 'I&#353;valyti';//&#352;alinti turin&#303;
	$lang['strlanguage'] = 'Kalba';
	$lang['strencoding'] = 'Koduot&#279;';
	$lang['strvalue'] = 'Reik&#353;m&#279;';
	$lang['strunique'] = 'Unikalus';
	$lang['strprimary'] = 'Pirminis';
	$lang['strexport'] = 'Eksportuoti';
	$lang['strimport'] = 'Importuoti';
	$lang['strallowednulls'] = 'Leid&#382;iami NULL simboliai';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Tu&#353;&#269;ia eilut&#279;/laukas';
	$lang['strsql'] = 'SQL';
$lang['stradmin'] = 'Admin';//Administratorius
	$lang['strvacuum'] = 'Apvalyti';
	$lang['stranalyze'] = 'Analizuoti';
	$lang['strclusterindex'] = 'Pertvarkyti';
	$lang['strclustered'] = 'Sutvarkyta?';
	$lang['strreindex'] = 'Perindeksuoti';
	$lang['strexecute'] = 'Vykdyti';
	$lang['stradd'] = 'Prid&#279;ti';
	$lang['strevent'] = '&#302;vykis';
	$lang['strwhere'] = 'S&#261;lyga';//Kur
	$lang['strinstead'] = 'Atlikti u&#382;uot';
	$lang['strwhen'] = 'Kai';
	$lang['strformat'] = 'Formatas';
	$lang['strdata'] = 'Duomenys';
	$lang['strconfirm'] = 'Patvirtinti';
	$lang['strexpression'] = 'I&#353;rai&#353;ka';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'I&#353;skleisti';
	$lang['strcollapse'] = 'Suskleisti';
	$lang['strfind'] = 'Ie&#353;koti';
	$lang['stroptions'] = 'Parinktys';
	$lang['strrefresh'] = 'Atnaujinti';
	$lang['strdownload'] = 'Parsisi&#371;sti';
	$lang['strdownloadgzipped'] = 'Parsisi&#371;sti suspaust&#261; su gzip';
	$lang['strinfo'] = 'Informacija';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'I&#353;pl&#279;stinis(-&#279;)';//papildomas(-a),
	$lang['strvariables'] = 'Kintamieji';
	$lang['strprocess'] = 'Procesas';
	$lang['strprocesses'] = 'Procesai';
	$lang['strsetting'] = 'Nuostata';//Parinktis
	$lang['streditsql'] = 'Redaguoti SQL';
	$lang['strruntime'] = 'Visa vykdymo trukm&#279;: %s ms';
	$lang['strpaginate'] = 'Rezultatus skaidyti &#303; puslapius';
	$lang['struploadscript'] = 'arba nusi&#371;sti SQL skript&#261;:';
	$lang['strstarttime'] = 'Prad&#382;ios laikas';
	$lang['strfile'] = 'Failas';
	$lang['strfileimported'] = 'Failas importuotas.';
	$lang['strtrycred'] = 'Naudoti &#353;iuos &#303;galiojimus visiems serveriams';
	$lang['strconfdropcred'] = 'D&#279;l saugumo, ry&#353;io nutraukimas panaikins j&#363;s&#371; bendr&#261; prisijungimo informacij&#261;. Ar tikrai norite nutraukti ry&#353;&#303; ?';
	$lang['stractionsonmultiplelines'] = 'Veiksmai keliose eilut&#279;se';
	$lang['strselectall'] = 'Visi';//Pa&#382;ym&#279;ti visus
	$lang['strunselectall'] = 'Nieko';//Panaikinti &#382;ym&#279;jim&#261; visiems
	$lang['strlocale'] = 'Lokal&#279;';
	$lang['strcollation'] = 'Rikiavimas';
$lang['strctype'] = 'Character Type';//Simboli&#371;(&#382;enkl&#371;) tipas
	$lang['strdefaultvalues'] = 'Numatytosios reik&#353;m&#279;s';
	$lang['strnewvalues'] = 'Naujosios reik&#353;m&#279;s';
	$lang['strstart'] = 'Paleisti';
	$lang['strstop'] = 'Stabdyti';
	$lang['strgotoppage'] = 'atgal &#303; vir&#353;&#371;';
	$lang['strtheme'] = 'Apipavidalinimas';
	
	// Admin
	$lang['stradminondatabase'] = '&#352;ios administracin&#279;s u&#382;duotys taikomos visai %s duomen&#371; bazei.';
	$lang['stradminontable'] = '&#352;ios administracin&#279;s u&#382;duotys taikomos lentelei %s.';
	
	// User-supplied SQL history
	$lang['strhistory'] = 'Praeitis';
	$lang['strnohistory'] = 'N&#279;ra praeities.';
	$lang['strclearhistory'] = 'I&#353;valyti praeit&#303;';
	$lang['strdelhistory'] = '&#352;alinti i&#353; praeities s&#261;ra&#353;o';
	$lang['strconfdelhistory'] = 'Ar tikrai pa&#353;alinti &#353;i&#261; u&#382;klaus&#261; i&#353; preities s&#261;ra&#353;o?';
	$lang['strconfclearhistory'] = 'Ar tikrai i&#353;valyti praeit&#303;?';
	$lang['strnodatabaseselected'] = 'Pra&#353;om pasirinkiti duomen&#371; baz&#281;.';

	// Database sizes
	$lang['strnoaccess'] = 'N&#279;ra prieigos'; 
	$lang['strsize'] = 'Dydis';
	$lang['strbytes'] = 'baitai';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = '&#352;i programa geriausiai veikia su nar&#353;ykle, kurioje palaikomi HTML r&#279;meliai(frames),ta&#269;iau gali b&#363;ti naudojama be r&#279;meli&#371; spustel&#279;jus toliau pateikt&#261; nuorod&#261;.';
	$lang['strnoframeslink'] = 'Naudoti be r&#279;meli&#371;';
	$lang['strbadconfig'] = 'J&#363;s&#371; config.inc.php pasen&#281;s. Reikia atkurti j&#303; i&#353; naujo config.inc.php-dist.';
	$lang['strnotloaded'] = 'J&#363;s&#371; PHP &#303;diegimas nepalaiko PostgreSQL. Reikia perkompiliuoti PHP naudojant --with-pgsql konfig&#363;ravimo parametr&#261;.';
	$lang['strpostgresqlversionnotsupported'] = 'PostgreSQL versija nepalaikoma. Pra&#353;om atnaujinti iki %s arba naujesn&#279;s versijos.';
	$lang['strbadschema'] = 'Nurodyta neteisinga schema.';
	$lang['strbadencoding'] = 'Nepavyko nustatyti kliento koduot&#279;s duomen&#371; baz&#279;je.';
	$lang['strsqlerror'] = 'SQL klaida:';
	$lang['strinstatement'] = 'Sakinyje:';
	$lang['strinvalidparam'] = 'Neteisingi skripto parametrai.';
	$lang['strnodata'] = '&#302;ra&#353;&#371; nerasta.';
	$lang['strnoobjects'] = 'Objekt&#371; nerasta.';
	$lang['strrownotunique'] = '&#352;iame &#303;ra&#353;e n&#279;ra unikalaus identifikatoriaus.';
	$lang['strnoreportsdb'] = 'J&#363;s nesate suk&#363;r&#281; ataskait&#371; duomen&#371; baz&#279;s. Instrukcijas skaitykite INSTALL faile.';
	$lang['strnouploads'] = 'Fail&#371; i&#353;siuntimai - negalimi.';
	$lang['strimporterror'] = 'Importavimo klaida.';
	$lang['strimporterror-fileformat'] = 'Importavimo klaida: Nepavyko automati&#353;kai nustatyti failo formato.';
	$lang['strimporterrorline'] = 'Importavimo klaida eilut&#279;je %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Importavimo klaida eilut&#279;je %s: Eilut&#279;je neteisingas stulpeli&#371; skai&#269;ius.';
	$lang['strimporterror-uploadedfile'] = 'Importavimo klaida: Failas negali b&#363;ti nusi&#371;stas &#303; server&#303;';
	$lang['strcannotdumponwindows'] = 'Atminties i&#353;klotin&#279;s suformavimas su sud&#279;tingais lenteli&#371; ir schem&#371; vardais Windows operacin&#279;je sistemoje nepalaikomas';
	$lang['strinvalidserverparam'] = 'Bandymas prisijungti su negaliojan&#269;iu serverio parametru, galb&#363;t kas nors bando nulau&#382;ti j&#363;s&#371; sistem&#261;.'; 
	$lang['strnoserversupplied'] = 'Nenurodytas serveris!';
	$lang['strbadpgdumppath'] = 'Eksportavimo klaida: nepavyko &#303;vykdyti pg_dump (pateiktas kelias J&#363;s&#371; conf/config.inc.php : %s). Pataisykite &#353;&#303; keli&#261; savo konfig&#363;racijoje ir prisijunkite i&#353; naujo.';
	$lang['strbadpgdumpallpath'] = 'Eksportavimo klaida: nepavyko &#303;vykdyti pg_dumpall (pateiktas kelias J&#363;s&#371; conf/config.inc.php : %s). Pataisykite &#353;&#303; keli&#261; savo konfig&#363;racijoje ir prisijunkite i&#353; naujo.';
	$lang['strconnectionfail'] = 'Nepavyksta prisijungti prie serverio.';

	// Tables
	$lang['strtable'] = 'Lentel&#279;';
	$lang['strtables'] = 'Lentel&#279;s';
	$lang['strshowalltables'] = 'Rodyti visas lenteles';
	$lang['strnotables'] = 'Lenteli&#371; nerasta.';
	$lang['strnotable'] = 'Lentel&#279; nerasta.';
	$lang['strcreatetable'] = 'Sukurti lentel&#281;';
	$lang['strcreatetablelike'] = 'Sukurti lentel&#281; kaip';
	$lang['strcreatetablelikeparent'] = 'Pirmin&#279; lentel&#279;';
	$lang['strcreatelikewithdefaults'] = '&#302;TRAUKTI NUMATYT&#260;SIAS REIK&#352;MES';
	$lang['strcreatelikewithconstraints'] = '&#302;TRAUKTI RIBOJIMUS';
	$lang['strcreatelikewithindexes'] = '&#302;TRAUKTI INDEKSUS';
	$lang['strtablename'] = 'Lentel&#279;s pavadinimas';
	$lang['strtableneedsname'] = 'Turite suteikti lentelei pavadinim&#261;.';
	$lang['strtablelikeneedslike'] = 'Turite nurodyti lentel&#281;, kurios savybes reikia kopijuoti.';
	$lang['strtableneedsfield'] = 'Turite nurodyti bent vien&#261; lauk&#261;.';
	$lang['strtableneedscols'] = 'Turite nurodyti teising&#261; stulpeli&#371; skai&#269;i&#371;.';
	$lang['strtablecreated'] = 'Lentel&#279; sukurta.';
	$lang['strtablecreatedbad'] = 'Nepavyko sukurti lentel&#279;s.';
	$lang['strconfdroptable'] = 'Ar tikrai norite &#353;alinti lentel&#281; &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Lentel&#279; pa&#353;alinta.';
	$lang['strtabledroppedbad'] = 'Nepavyko pa&#353;alinti lentel&#279;s.';
	$lang['strconfemptytable'] = 'Ar tikrai norite i&#353;valyti lentel&#281; &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Lentel&#279; i&#353;valyta.';
	$lang['strtableemptiedbad'] = 'Nepavyko i&#353;valyti lentel&#279;s.';
	$lang['strinsertrow'] = '&#302;terpti &#303;ra&#353;&#261;';
	$lang['strrowinserted'] = '&#302;ra&#353;as &#303;terptas.';
	$lang['strrowinsertedbad'] = 'Nepavyko &#303;terpti &#303;ra&#353;o.';
	$lang['strnofkref'] = 'N&#279;ra atitinkamos reik&#353;m&#279;s i&#353;oriniame rakte %s.';
	$lang['strrowduplicate'] = 'Nepavyko &#303;terpti &#303;ra&#353;o, bandyta dubliuoti &#303;ra&#353;&#261;.';
	$lang['streditrow'] = 'Taisyti &#303;ra&#353;&#261;';
	$lang['strrowupdated'] = '&#302;ra&#353;as atnaujintas.';
	$lang['strrowupdatedbad'] = 'Nepavyko atnaujinti &#303;ra&#353;o.';
	$lang['strdeleterow'] = '&#352;alinti &#303;ra&#353;&#261;';
	$lang['strconfdeleterow'] = 'Ar tikrai norite &#353;alinti &#353;&#303; &#303;ra&#353;&#261;?';
	$lang['strrowdeleted'] = '&#302;ra&#353;as pa&#353;alintas.';
	$lang['strrowdeletedbad'] = 'Nepavyko pa&#353;alinti &#303;ra&#353;o.';
	$lang['strinsertandrepeat'] = '&#302;terpti ir kartoti';
	$lang['strnumcols'] = 'Stulpeli&#371; skai&#269;ius';
	$lang['strcolneedsname'] = 'Turite nurodyti stulpelio pavadinim&#261;';
	$lang['strselectallfields'] = 'Pa&#382;ym&#279;ti visus laukus';
	$lang['strselectneedscol'] = 'Turite rodyti bent vien&#261; stulpel&#303;.';
	$lang['strselectunary'] = 'Vienvie&#269;iai operatoriai negali tur&#279;ti reik&#353;mi&#371;.';
	$lang['strcolumnaltered'] = 'Stulpelis pakeistas.';
	$lang['strcolumnalteredbad'] = 'Nepavyko pakeisti stulpelio.';
	$lang['strconfdropcolumn'] = 'Ar tikrai norite &#353;alinti stulpel&#303; &quot;%s&quot; i&#353; lentel&#279;s &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Stulpelis pa&#353;alintas.';
	$lang['strcolumndroppedbad'] = 'Nepavyko pa&#353;alinti stulpelio.';
	$lang['straddcolumn'] = 'Prid&#279;ti stulpel&#303;';
	$lang['strcolumnadded'] = 'Stulpelis prid&#279;tas.';
	$lang['strcolumnaddedbad'] = 'Nepavyko prid&#279;ti stulpelio.';
$lang['strcascade'] = 'CASCADE';//Pakopinis
	$lang['strtablealtered'] = 'Lentel&#279; pakeista.';
	$lang['strtablealteredbad'] = 'Nepavyko pakeisti lentel&#279;s.';
	$lang['strdataonly'] = 'Tik duomenis';
	$lang['strstructureonly'] = 'Tik strukt&#363;r&#261;';
	$lang['strstructureanddata'] = 'Strukt&#363;r&#261; ir duomenis';
$lang['strtabbed'] = 'Tabbed';//Atskirtas tabuliavimo &#382;ym&#279;mis
$lang['strauto'] = 'Auto';
	$lang['strconfvacuumtable'] = 'Ar tikrai norite apvalyti &quot;%s&quot;?';
	$lang['strconfanalyzetable'] = 'Ar tikrai norite analizuoti &quot;%s&quot;?';
	$lang['strconfreindextable'] = 'Ar tikrai norite perindeksuoti &quot;%s&quot;?';
	$lang['strconfclustertable'] = 'Ar tikrai norite sutvarkyti &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Apskai&#269;iuotasis &#303;ra&#353;&#371; skai&#269;ius';//Apytikris
	$lang['strspecifytabletoanalyze'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti i&#353;analizuota.';
	$lang['strspecifytabletoempty'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti i&#353;valyta.';
	$lang['strspecifytabletodrop'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti pa&#353;alinta.';
	$lang['strspecifytabletovacuum'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti apvalyta.';
	$lang['strspecifytabletoreindex'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti perindeksuota.';
	$lang['strspecifytabletocluster'] = 'Turite nurodyti bent vien&#261; lentel&#281;, kuri turi b&#363;ti sutvarkyta.';
	$lang['strnofieldsforinsert'] = 'Negalite &#303;terpti &#303;ra&#353;o &#303; lentel&#281; be stulpeli&#371;.';

	// Columns
	$lang['strcolprop'] = 'Stulpelio savyb&#279;s';
	$lang['strnotableprovided'] = 'Nenurodyta lentel&#279;!';
		
	// Users
	$lang['struser'] = 'Naudotojas';
	$lang['strusers'] = 'Naudotojai';
	$lang['strusername'] = 'Naudotojo vardas';
	$lang['strpassword'] = 'Slapta&#382;odis';
$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Gali kurti DB?';
	$lang['strexpires'] = 'Baigia galioti';
	$lang['strsessiondefaults'] = 'Seanso numatytosios reik&#353;m&#279;s';
	$lang['strnousers'] = 'Naudotoj&#371; nerasta.';
	$lang['struserupdated'] = 'Naudotojas atnaujintas.';
	$lang['struserupdatedbad'] = 'Nepavyko atnaujinti naudotojo.';
	$lang['strshowallusers'] = 'Rodyti visus naudotojus';
	$lang['strcreateuser'] = 'Kurti naudotoj&#261;';
	$lang['struserneedsname'] = 'Turite suteikti naudotojui vard&#261;.';
	$lang['strusercreated'] = 'Naudotojas sukurtas.';
	$lang['strusercreatedbad'] = 'Nepavyko sukurti naudotojo.';
	$lang['strconfdropuser'] = 'Ar tikrai norite pa&#353;alinti naudotoj&#261; &quot;%s&quot;?';
	$lang['struserdropped'] = 'Naudotojas pa&#353;alintas.';
	$lang['struserdroppedbad'] = 'Nepavyko pa&#353;alinti naudotojo.';
	$lang['straccount'] = 'Paskyra';
	$lang['strchangepassword'] = 'Keisti slapta&#382;od&#303;';
	$lang['strpasswordchanged'] = 'Slapta&#382;odis pakeistas.';
	$lang['strpasswordchangedbad'] = 'Nepavyko pakeisti slapta&#382;od&#382;io.';
	$lang['strpasswordshort'] = 'Slapta&#382;odis per trumpas.';
	$lang['strpasswordconfirm'] = 'Slapta&#382;odis neatitinka patvirtinimo.';
	
	// Groups
	$lang['strgroup'] = 'Grup&#279;';
	$lang['strgroups'] = 'Grup&#279;s';
	$lang['strshowallgroups'] = 'Rodyti visas grupes';
	$lang['strnogroup'] = 'Grup&#279; nerasta.';
	$lang['strnogroups'] = 'Grupi&#371; nerasta.';
	$lang['strcreategroup'] = 'Kurti grup&#281;';
	$lang['strgroupneedsname'] = 'Turite suteikti grupei pavadinim&#261;.';
	$lang['strgroupcreated'] = 'Grup&#279; sukurta.';
	$lang['strgroupcreatedbad'] = 'Nepavyko sukurti grup&#279;s.';	
	$lang['strconfdropgroup'] = 'Ar tikrai norite &#353;alinti grup&#281; &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grup&#279; pa&#353;alinta.';
	$lang['strgroupdroppedbad'] = 'Nepavyko pa&#353;alinti grup&#279;s.';
	$lang['strmembers'] = 'Nariai';
	$lang['strmemberof'] = 'Yra narys';
	$lang['stradminmembers'] = 'Admin nariai';
	$lang['straddmember'] = 'Prid&#279;ti nar&#303;';
	$lang['strmemberadded'] = 'Narys prid&#279;tas.';
	$lang['strmemberaddedbad'] = 'Nepavyko prid&#279;ti nario.';
	$lang['strdropmember'] = '&#352;alinti nar&#303;';
	$lang['strconfdropmember'] = 'Ar tikrai norite &#353;alinti nar&#303; &quot;%s&quot; i&#353; grup&#279;s &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Narys pa&#353;alintas.';
	$lang['strmemberdroppedbad'] = 'Nepavyko pa&#353;alinti nario.';

	// Roles
	$lang['strrole'] = 'Rol&#279;';
	$lang['strroles'] = 'Rol&#279;s';
	$lang['strshowallroles'] = 'Rodyti roles';
	$lang['strnoroles'] = 'Roli&#371; nerasta.';
	$lang['strinheritsprivs'] = 'Paveldi privilegijas?';
	$lang['strcreaterole'] = 'Kurti rol&#281;';
	$lang['strcancreaterole'] = 'Gali kurti rol&#281;?';
	$lang['strrolecreated'] = 'Rol&#279; sukurta.';
	$lang['strrolecreatedbad'] = 'Nepavyko sukurti rol&#279;s.';
	$lang['strrolealtered'] = 'Rol&#279; pakeista.';
	$lang['strrolealteredbad'] = 'Nepavyko pakeisti rol&#279;s.';
	$lang['strcanlogin'] = 'Gali prisijungti?';
	$lang['strconnlimit'] = 'Sujungim&#371; limitas';
	$lang['strdroprole'] = '&#352;alinti rol&#281;';
	$lang['strconfdroprole'] = 'Ar tikrai norite &#353;alinti rol&#281; &quot;%s&quot;?';
	$lang['strroledropped'] = 'Rol&#279; pa&#353;alinta.';
	$lang['strroledroppedbad'] = 'Nepavyko pa&#353;alinti rol&#279;s.';
	$lang['strnolimit'] = 'Be ribojim&#371;';
	$lang['strnever'] = 'Niekada';
	$lang['strroleneedsname'] = 'Turite suteikti rolei pavadinim&#261;.';

	// Privileges
	$lang['strprivilege'] = 'Privilegija';
	$lang['strprivileges'] = 'Privilegijos';
	$lang['strnoprivileges'] = '&#352;iam objektui taikomos numatytosios valdytojo privilegijos.';
	$lang['strgrant'] = 'Suteikti';
	$lang['strrevoke'] = 'Panaikinti';//At&#353;aukti
	$lang['strgranted'] = 'Privilegijos pakeistos.';
	$lang['strgrantfailed'] = 'Nepavyko pakeisti privilegij&#371;.';
	$lang['strgrantbad'] = 'Turite nurodyti bent vien&#261; naudotoj&#261; arba grup&#281; ir bent vien&#261; privilegij&#261;.';
	$lang['strgrantor'] = 'Teik&#279;jas';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Duomen&#371; baz&#279;';
	$lang['strdatabases'] = 'Duomen&#371; baz&#279;s';
	$lang['strshowalldatabases'] = 'Rodyti duomen&#371; bazes';
	$lang['strnodatabases'] = 'Duomen&#371; bazi&#371; nerasta.';
	$lang['strcreatedatabase'] = 'Kurti duomen&#371; baz&#281;';
	$lang['strdatabasename'] = 'Duomen&#371; baz&#279;s pavadinimas';
	$lang['strdatabaseneedsname'] = 'Turite suteikti duomen&#371; bazei pavadinim&#261;.';
	$lang['strdatabasecreated'] = 'Duomen&#371; baz&#279; sukurta.';
	$lang['strdatabasecreatedbad'] = 'Nepavyko sukurti duomen&#371; baz&#279;s.';
	$lang['strconfdropdatabase'] = 'Ar tikrai norite &#353;alinti duomen&#371; baz&#281; &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Duomen&#371; baz&#279; pa&#353;alinta.';
	$lang['strdatabasedroppedbad'] = 'Nepavyko pa&#353;alinti duomen&#371; baz&#279;s.';
	$lang['strentersql'] = '&#302;veskite SQL u&#382;klaus&#261; &#382;emiau:';
	$lang['strsqlexecuted'] = 'SQL u&#382;klausa &#303;vykdyta.';
	$lang['strvacuumgood'] = 'Apvalymas atliktas.';
	$lang['strvacuumbad'] = 'Nepavyko atlikti apvalymo.';
	$lang['stranalyzegood'] = 'Analiz&#279; atlikta.';
	$lang['stranalyzebad'] = 'Nepavyko atlikti analiz&#279;s.';
	$lang['strreindexgood'] = 'Perindeksavimas atliktas.';
	$lang['strreindexbad'] = 'Perindeksavimas nepavyko.';
	$lang['strfull'] = 'Visi&#353;kas';
$lang['strfreeze'] = 'Freeze';
$lang['strforce'] = 'Force';
	$lang['strsignalsent'] = 'Signalas i&#353;si&#371;stas.';
	$lang['strsignalsentbad'] = 'Nepavyko i&#353;si&#371;sti signalo.';
	$lang['strallobjects'] = 'Visi objektai';
	$lang['strdatabasealtered'] = 'Duomen&#371; baz&#279; pakeista.';
	$lang['strdatabasealteredbad'] = 'Nepavyko pakeisti duomen&#371; baz&#279;s.';
	$lang['strspecifydatabasetodrop'] = 'Turite nurodyti bent vien&#261; duomen&#371; baz&#281;, kuri&#261; reikia &#353;alinti.';
	$lang['strtemplatedb'] = '&#352;ablonas';
	$lang['strconfanalyzedatabase'] = 'Ar tikrai norite analizuoti visas lenteles duomen&#371; baz&#279;je &quot;%s&quot;?';
	$lang['strconfvacuumdatabase'] = 'Ar tikrai norite apvalyti visas lenteles duomen&#371; baz&#279;je &quot;%s&quot;?';
	$lang['strconfreindexdatabase'] = 'Ar tikrai norite perindeksuoti visas lenteles duomen&#371; baz&#279;je &quot;%s&quot;?';
	$lang['strconfclusterdatabase'] = 'Ar tikrai norite sutvarkyti visas lenteles duomen&#371; baz&#279;je &quot;%s&quot;?';

	// Views
	$lang['strview'] = 'Rodinys';
	$lang['strviews'] = 'Rodiniai';
	$lang['strshowallviews'] = 'Rodyti visus rodinius';
	$lang['strnoview'] = 'Rodinys nerastas.';
	$lang['strnoviews'] = 'Rodini&#371; nerasta.';
	$lang['strcreateview'] = 'Kurti rodin&#303;';
	$lang['strviewname'] = 'Rodinio pavadinimas';
	$lang['strviewneedsname'] = 'Turite suteikti rodiniui pavadinim&#261;.';
	$lang['strviewneedsdef'] = 'Turite pateikti rodinio apibr&#279;&#382;t&#303;.';
	$lang['strviewneedsfields'] = 'Turite nurodyti stulpelius, kurie turi b&#363;ti rodinyje.';
	$lang['strviewcreated'] = 'Rodinys sukurtas.';
	$lang['strviewcreatedbad'] = 'Nepavyko sukurti rodinio.';
	$lang['strconfdropview'] = 'Ar tikrai norite pa&#353;alinti rodin&#303; &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Rodinys pa&#353;alintas.';
	$lang['strviewdroppedbad'] = 'Nepavyko pa&#353;alinti rodinio.';
	$lang['strviewupdated'] = 'Rodinys atnaujintas.';
	$lang['strviewupdatedbad'] = 'Nepavyko atnaujinti rodinio.';
	$lang['strviewlink'] = 'Saistantys raktai';
	$lang['strviewconditions'] = 'Papildomos s&#261;lygos';
	$lang['strcreateviewwiz'] = 'Kurti rodin&#303; su vedikliu';
	$lang['strrenamedupfields'] = 'Pervadinti dubliuojan&#269;iuosius laukus';
	$lang['strdropdupfields'] = 'Pa&#353;alinti dubliuojan&#269;iuosius laukus';
	$lang['strerrordupfields'] = 'Klaida dubliuojan&#269;iuose laukuose';
	$lang['strviewaltered'] = 'Rodinys pakeistas.';
	$lang['strviewalteredbad'] = 'Nepavyko pakeisti rodinio.';
	$lang['strspecifyviewtodrop'] = 'Turite nurodyti bent vien&#261; rodin&#303;, kur&#303; norite pa&#353;alinti.';

	// Sequences
	$lang['strsequence'] = 'Seka';
	$lang['strsequences'] = 'Sekos';
	$lang['strshowallsequences'] = 'Rodyti visas sekas';
	$lang['strnosequence'] = 'Seka nerasta.';
	$lang['strnosequences'] = 'Sek&#371; nerasta.';
	$lang['strcreatesequence'] = 'Kurti sek&#261;';
	$lang['strlastvalue'] = 'Paskutin&#279; reik&#353;m&#279;';
	$lang['strincrementby'] = 'Prieaugis';	
	$lang['strstartvalue'] = 'Pradin&#279; reik&#353;m&#279;';
	$lang['strrestartvalue'] = 'Paleidimo i&#353; naujo reik&#353;m&#279;';
	$lang['strmaxvalue'] = 'Maks. reik&#353;m&#279;';
	$lang['strminvalue'] = 'Min. reik&#353;m&#279;';
	$lang['strcachevalue'] = 'Reik&#353;m&#279; pod&#279;lyje';
$lang['strlogcount'] = 'Log count';
$lang['strcancycle'] = 'Can cycle?';//Gali kartotis?
	$lang['striscalled'] = 'Padidins paskutin&#281; reik&#353;m&#281; prie&#353; gr&#261;&#382;inant kit&#261; reik&#353;m&#281; (is_called)?';
	$lang['strsequenceneedsname'] = 'Turite suteikti sekai vard&#261;.';
	$lang['strsequencecreated'] = 'Seka sukurta.';
	$lang['strsequencecreatedbad'] = 'Nepavyko sukurti sekos.';
	$lang['strconfdropsequence'] = 'Ar tikrai norite pa&#353;alinti sek&#261; &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Seka pa&#353;alinta.';
	$lang['strsequencedroppedbad'] = 'Nepavyko pa&#353;alinti sekos.';
	$lang['strsequencerestart'] = 'Seka paleista i&#353; naujo.';
	$lang['strsequencerestartbad'] = 'Nepavyko sekos paleist i&#353; naujo.';
	$lang['strsequencereset'] = 'Seka atstatyta &#303; pradin&#281; b&#363;sen&#261;.';
	$lang['strsequenceresetbad'] = 'Nepavyko sekos atstatyti &#303; pradin&#281; b&#363;sen&#261;.';
 	$lang['strsequencealtered'] = 'Seka pakeista.';
 	$lang['strsequencealteredbad'] = 'Nepavyko pakeisti sekos.';
 	$lang['strsetval'] = 'Nustatyti reik&#353;m&#281;';
 	$lang['strsequencesetval'] = 'Sekos reik&#353;m&#279; nustatyta.';
 	$lang['strsequencesetvalbad'] = 'Nepavyko nustatyti sekos reik&#353;m&#279;s.';
 	$lang['strnextval'] = 'Padidinti reik&#353;m&#281;';
 	$lang['strsequencenextval'] = 'Sekos reik&#353;m&#279; padid&#279;jo.';
 	$lang['strsequencenextvalbad'] = 'Sekos reik&#353;m&#279;s padidinti nepavyko.';
	$lang['strspecifysequencetodrop'] = 'Turite nurodyti bent vien&#261; sek&#261;, kuri&#261; norite pa&#353;alinti.';
	
	// Indexes
	$lang['strindex'] = 'Indeksas';
	$lang['strindexes'] = 'Indeksai';
	$lang['strindexname'] = 'Indekso pavadinimas';
	$lang['strshowallindexes'] = 'Rodyti visus indeksus';
	$lang['strnoindex'] = 'Indeksas nerastas.';
	$lang['strnoindexes'] = 'Indeks&#371; nerasta.';
	$lang['strcreateindex'] = 'Kurti indeks&#261;';
	$lang['strtabname'] = 'Lentel&#279;s pavadinimas';
	$lang['strcolumnname'] = 'Stulpelio pavadinimas';
	$lang['strindexneedsname'] = 'Turite suteikti indeksui pavadinim&#261;.';
	$lang['strindexneedscols'] = 'Turite nurodyti teising&#261; stulpeli&#371; skai&#269;i&#371;.';
	$lang['strindexcreated'] = 'Indeksas sukurtas.';
	$lang['strindexcreatedbad'] = 'Nepavyko sukurti indekso.';
	$lang['strconfdropindex'] = 'Ar tikrai norite pa&#353;alinti indeks&#261; &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Indeksas pa&#353;alintas.';
	$lang['strindexdroppedbad'] = 'Nepavyko pa&#353;alinti indekso.';
	$lang['strkeyname'] = 'Rakto pavadinimas';
	$lang['struniquekey'] = 'Unikalus raktas';
	$lang['strprimarykey'] = 'Pirminis raktas';
 	$lang['strindextype'] = 'Indekso tipas';
	$lang['strtablecolumnlist'] = 'Stulpeliai lentel&#279;je';
	$lang['strindexcolumnlist'] = 'Stulpeliai indekse';
	$lang['strconfcluster'] = 'Ar tikrai norite pertvarkyti &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Pertvarka atlikta.';
	$lang['strclusteredbad'] = 'Nepavyko atlikti pertvarkos.';
	$lang['strconcurrently'] = 'Lygiagre&#269;iai';//tuo pat metu
	$lang['strnoclusteravailable'] = 'Lentel&#279; nesutvarkyta pagal indeks&#261;.';

	// Rules
	$lang['strrules'] = 'Taisykl&#279;s';
	$lang['strrule'] = 'Taisykl&#279;';
	$lang['strshowallrules'] = 'Rodyti visas taisykles';
	$lang['strnorule'] = 'Taisykl&#279; nerasta.';
	$lang['strnorules'] = 'Taisykli&#371; nerasta.';
	$lang['strcreaterule'] = 'Kurti taisykl&#281;';
	$lang['strrulename'] = 'Taisykl&#279;s pavadinimas';
	$lang['strruleneedsname'] = 'Turite suteikti taisyklei pavadinim&#261;.';
	$lang['strrulecreated'] = 'Taisykl&#279; sukurta.';
	$lang['strrulecreatedbad'] = 'Nepavyko sukurti taisykl&#279;s.';
	$lang['strconfdroprule'] = 'Ar tikrai norite &#353;alinti taisykl&#281; &quot;%s&quot; taikom&#261; &quot;%s&quot;?';
	$lang['strruledropped'] = 'Taisykl&#279; pa&#353;alinta.';
	$lang['strruledroppedbad'] = 'Nepavyko pa&#353;alinti taisykl&#279;s.';

	// Constraints
	$lang['strconstraint'] = 'Ribojimas';
	$lang['strconstraints'] = 'Ribojimai';
	$lang['strshowallconstraints'] = 'Rodyti visus ribojimus';
	$lang['strnoconstraints'] = 'Ribojim&#371; nerasta.';
	$lang['strcreateconstraint'] = 'Kurti ribojim&#261;';
	$lang['strconstraintcreated'] = 'Ribojimas sukurtas.';
	$lang['strconstraintcreatedbad'] = 'Nepavyko sukurti ribojimo.';
	$lang['strconfdropconstraint'] = 'Ar tikrai norite &#353;alinti ribojim&#261; &quot;%s&quot; lentelei &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Ribojimas pa&#353;alintas.';
	$lang['strconstraintdroppedbad'] = 'Nepavyko pa&#353;alinti ribojimo.';
	$lang['straddcheck'] = 'Prid&#279;ti tikrinim&#261;';
	$lang['strcheckneedsdefinition'] = 'Tikrinimo ribojimui b&#363;tina apibr&#279;&#382;tis.';
	$lang['strcheckadded'] = 'Tikrinimo ribojimas prid&#279;tas.';
	$lang['strcheckaddedbad'] = 'Nepavyko prid&#279;ti tikrinimo ribojimo.';
	$lang['straddpk'] = 'Prid&#279;ti pirmin&#303; rakt&#261;';
	$lang['strpkneedscols'] = 'Pirminiam raktui b&#363;tina priskirti bent vien&#261; stulpel&#303;.';
	$lang['strpkadded'] = 'Pirminis raktas prid&#279;tas.';
	$lang['strpkaddedbad'] = 'Nepavyko prid&#279;ti pirminio rakto.';
	$lang['stradduniq'] = 'Prid&#279;ti unikal&#371; rakt&#261;';
	$lang['struniqneedscols'] = 'Unikaliam raktui b&#363;tina priskirti bent vien&#261; stulpel&#303;.';
	$lang['struniqadded'] = 'Unikalus raktas prid&#279;tas.';
	$lang['struniqaddedbad'] = 'Nepavyko prid&#279;ti unikalaus rakto.';
	$lang['straddfk'] = 'Prid&#279;ti i&#353;orin&#303; rakt&#261;';
	$lang['strfkneedscols'] = 'I&#353;oriniam raktui b&#363;tina priskirti bent vien&#261; stulpel&#303;.';
	$lang['strfkneedstarget'] = 'B&#363;tina nurodyti i&#353;orinio rakto paskirties lentel&#281;.';
	$lang['strfkadded'] = 'I&#353;orinis raktas prid&#279;tas.';
	$lang['strfkaddedbad'] = 'Nepavyko prid&#279;ti i&#353;orinio rakto.';
	$lang['strfktarget'] = 'Paskirties lentel&#279;';
	$lang['strfkcolumnlist'] = 'Rakto stulpeliai';
	$lang['strondelete'] = '&#353;alinant';
	$lang['stronupdate'] = 'atnaujinant';

	// Functions
	$lang['strfunction'] = 'Funkcija';
	$lang['strfunctions'] = 'Funkcijos';
	$lang['strshowallfunctions'] = 'Rodyti visas funkcijas';
	$lang['strnofunction'] = 'Funkcija nerasta.';
	$lang['strnofunctions'] = 'Funkcij&#371; nerasta.';
	$lang['strcreateplfunction'] = 'Kurti SQL/PL funkcij&#261;';
	$lang['strcreateinternalfunction'] = 'Kurti vidin&#281; funkcij&#261;';
	$lang['strcreatecfunction'] = 'Kurti C funkcij&#261;';
	$lang['strfunctionname'] = 'Funkcijos pavadinimas';
	$lang['strreturns'] = 'Gr&#261;&#382;ina';
	$lang['strproglanguage'] = 'Programavimo kalba';
	$lang['strfunctionneedsname'] = 'Turite suteikti funkcijai pavadinim&#261;.';
	$lang['strfunctionneedsdef'] = 'Turite pateikti funkcijos apibr&#279;&#382;t&#303;.';
	$lang['strfunctioncreated'] = 'Funkcija sukurta.';
	$lang['strfunctioncreatedbad'] = 'Nepavyko sukurti funkcijos.';
	$lang['strconfdropfunction'] = 'Ar tikrai norite &#353;alinti funkcij&#261; &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funkcija pa&#353;alinta.';
	$lang['strfunctiondroppedbad'] = 'Nepavyko pa&#353;alinti funkcijos.';
	$lang['strfunctionupdated'] = 'Funkcija atnaujinta.';
	$lang['strfunctionupdatedbad'] = 'Nepavyko atnaujinti funkcijos.';
	$lang['strobjectfile'] = 'Objektinis Failas';
	$lang['strlinksymbol'] = 'S&#261;sajos simbolis (C funkcijos pavadinimas)';
	$lang['strarguments'] = 'Argumentai';
	$lang['strargmode'] = 'Veiksena';
	$lang['strargtype'] = 'Tipas';
	$lang['strargadd'] = 'Prid&#279;ti dar vien&#261; argument&#261;';
	$lang['strargremove'] = 'Pa&#353;alinti &#353;&#303; argument&#261;';
	$lang['strargnoargs'] = '&#352;i funkcija nepriims joki&#371; argument&#371;.';
	$lang['strargenableargs'] = 'Leisti perduoti argumentus &#353;iai funkcijai.';
	$lang['strargnorowabove'] = 'Turi b&#363;ti eilut&#279; vir&#353; &#353;ios eilut&#279;s.';
	$lang['strargnorowbelow'] = 'Turi b&#363;ti eilut&#279; &#382;emiau &#353;ios eilut&#279;s.';
	$lang['strargraise'] = 'Pakelti.';
	$lang['strarglower'] = 'Nuleisti.';
	$lang['strargremoveconfirm'] = 'Ar tikrai norite pa&#353;alinti &#353;&#303; argument&#261;? Pa&#353;alinimas negal&#279;s b&#363;ti at&#353;auktas.';
$lang['strfunctioncosting'] = 'Function Costing';
	$lang['strresultrows'] = 'Eilu&#269;i&#371; rezultate';
	$lang['strexecutioncost'] = 'Vykdymo s&#261;naudos';
	$lang['strspecifyfunctiontodrop'] = 'Turite nurodyti bent vien&#261; funkcij&#261;, kuri&#261; norite pa&#353;alinti.';

	// Triggers
	$lang['strtrigger'] = 'Trigeris';
	$lang['strtriggers'] = 'Trigeriai';
	$lang['strshowalltriggers'] = 'Rodyti visus trigerius';
	$lang['strnotrigger'] = 'Trigeris nerastas.';
	$lang['strnotriggers'] = 'Trigeri&#371; nerasta.';
	$lang['strcreatetrigger'] = 'Kurti triger&#303;';
	$lang['strtriggerneedsname'] = 'Turite nurodyti trigerio pavadinim&#261;.';
	$lang['strtriggerneedsfunc'] = 'Turite priskirti funkcij&#261; trigeriui.';
	$lang['strtriggercreated'] = 'Trigeris sukurtas.';
	$lang['strtriggercreatedbad'] = 'Nepavyko sukurti trigerio.';
	$lang['strconfdroptrigger'] = 'Ar tikrai norite &#353;alinti triger&#303; &quot;%s&quot; lentel&#279;je &quot;%s&quot;?';
	$lang['strconfenabletrigger'] = 'Ar tikrai norite &#303;jungti triger&#303; &quot;%s&quot; lentel&#279;je &quot;%s&quot;?';
	$lang['strconfdisabletrigger'] = 'Ar tikrai norite i&#353;jungti triger&#303; &quot;%s&quot; lentel&#279;je &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigeris pa&#353;alintas.';
	$lang['strtriggerdroppedbad'] = 'Nepavyko pa&#353;alinti trigerio.';
	$lang['strtriggerenabled'] = 'Trigeris &#303;jungtas.';
	$lang['strtriggerenabledbad'] = 'Nepavyko &#303;jungti trigerio.';
	$lang['strtriggerdisabled'] = 'Trigeris i&#353;jungtas.';
	$lang['strtriggerdisabledbad'] = 'Nepavyko i&#353;jungti trigerio.';
	$lang['strtriggeraltered'] = 'Trigeris pakeistas.';
	$lang['strtriggeralteredbad'] = 'Nepavyko pakeisti trigerio.';
	$lang['strforeach'] = 'Kiekvienam(-ai)';

	// Types
	$lang['strtype'] = 'Duomen&#371; tipas';
	$lang['strtypes'] = 'Duomen&#371; tipai';
	$lang['strshowalltypes'] = 'Rodyti visus duomen&#371; tipus';
	$lang['strnotype'] = 'Duomen&#371; tipas nerastas.';
	$lang['strnotypes'] = 'Duomen&#371; tip&#371; nerasta.';
	$lang['strcreatetype'] = 'Kurti duomen&#371; tip&#261;';
	$lang['strcreatecomptype'] = 'Kurti strukt&#363;rin&#303; duomen&#371; tip&#261;';
	$lang['strcreateenumtype'] = 'Kurti enum duomen&#371; tip&#261;';
	$lang['strtypeneedsfield'] = 'Turite nurodyti bent vien&#261; lauk&#261;.';
	$lang['strtypeneedsvalue'] = 'Turite nurodyti bent vien&#261; reik&#353;m&#281;.';
	$lang['strtypeneedscols'] = 'Turite nurodyti teising&#261; lauk&#371; skai&#269;i&#371;.';
	$lang['strtypeneedsvals'] = 'Turite nurodyti teising&#261; reik&#353;mi&#371; skai&#269;i&#371;.';
	$lang['strinputfn'] = '&#302;vesties funkcija';
	$lang['stroutputfn'] = 'I&#353;vesties funkcija';
	$lang['strpassbyval'] = 'Perdavimas reik&#353;me?';
	$lang['stralignment'] = 'Lygiavimas';
	$lang['strelement'] = 'Elementas';
	$lang['strdelimiter'] = 'Skirtukas';
	$lang['strstorage'] = 'Atmintin&#279;';
	$lang['strfield'] = 'Laukas';
	$lang['strnumfields'] = 'Lauk&#371; sk.';
	$lang['strnumvalues'] = 'Reik&#353;mi&#371; sk.';
	$lang['strtypeneedsname'] = 'Turite suteikti duomen&#371; tipui pavadinim&#261;.';
	$lang['strtypeneedslen'] = 'Turite nurodyti duomen&#371; tipo ilg&#303;.';
	$lang['strtypecreated'] = 'Duomen&#371; tipas sukurtas.';
	$lang['strtypecreatedbad'] = 'Nepavyko sukurti duomen&#371; tipo.';
	$lang['strconfdroptype'] = 'Ar tikrai norite &#353;alinti duomen&#371; tip&#261; &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Duomen&#371; tipas pa&#353;alintas.';
	$lang['strtypedroppedbad'] = 'Nepavyko pa&#353;alinti duomen&#371; tipo.';
	$lang['strflavor'] = 'Atmaina';
	$lang['strbasetype'] = 'Bazinis';
	$lang['strcompositetype'] = 'Strukt&#363;rinis';
	$lang['strpseudotype'] = 'Pseudo';
$lang['strenum'] = 'Enum';
	$lang['strenumvalues'] = 'Enum reik&#353;m&#279;s';

	// Schemas
	$lang['strschema'] = 'Schema';
	$lang['strschemas'] = 'Schemos';
	$lang['strshowallschemas'] = 'Rodyti visas schemas';
	$lang['strnoschema'] = 'Schema nerasta.';
	$lang['strnoschemas'] = 'Schem&#371; nerasta.';
	$lang['strcreateschema'] = 'Kurti schem&#261;';
	$lang['strschemaname'] = 'Schemos pavadinimas';
	$lang['strschemaneedsname'] = 'Turite suteikti schemai pavadinim&#261;.';
	$lang['strschemacreated'] = 'Schema sukurta.';
	$lang['strschemacreatedbad'] = 'Nepavyko sukurti schemos.';
	$lang['strconfdropschema'] = 'Ar tikrai norite &#353;alinti schem&#261; &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Schema pa&#353;alinta.';
	$lang['strschemadroppedbad'] = 'Nepavyko pa&#353;alinti schemos.';
	$lang['strschemaaltered'] = 'Schema pakeista.';
	$lang['strschemaalteredbad'] = 'Nepavyko pakeisti schemos.';
	$lang['strsearchpath'] = 'Schem&#371; paie&#353;kos kelias';
	$lang['strspecifyschematodrop'] = 'Turite nurodyti bent vien&#261; schem&#261;, kuri&#261; norite pa&#353;alinti.';

	// Reports
	$lang['strreport'] = 'Ataskaita';
	$lang['strreports'] = 'Ataskaitos';
	$lang['strshowallreports'] = 'Rodyti visas ataskaitas';
	$lang['strnoreports'] = 'Ataskait&#371; nerasta.';
	$lang['strcreatereport'] = 'Kurti ataskait&#261;';
	$lang['strreportdropped'] = 'Ataskaita pa&#353;alinta.';
	$lang['strreportdroppedbad'] = 'Nepavyko pa&#353;alinti ataskaitos.';
	$lang['strconfdropreport'] = 'Ar tikrai norite &#353;alinti ataskait&#261; &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Turite suteikti ataskaitai pavadinim&#261;.';
	$lang['strreportneedsdef'] = 'Turite pateikti ataskaitos SQL apibr&#279;&#382;t&#303;.';
	$lang['strreportcreated'] = 'Ataskaita &#303;ra&#353;yta.';
	$lang['strreportcreatedbad'] = 'Nepavyko &#303;ra&#353;yti ataskaitos.';

	// Domains
	$lang['strdomain'] = 'Domenas';
	$lang['strdomains'] = 'Domenai';
	$lang['strshowalldomains'] = 'Rodyti visus domenus';
	$lang['strnodomains'] = 'Domen&#371; nerasta.';
	$lang['strcreatedomain'] = 'Kurti domen&#261;';
	$lang['strdomaindropped'] = 'Domenas pa&#353;alintas.';
	$lang['strdomaindroppedbad'] = 'Nepavyko pa&#353;alinti domeno.';
	$lang['strconfdropdomain'] = 'Ar tikrai norite &#353;alinti domen&#261; &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Turite suteikti domenui vard&#261;.';
	$lang['strdomaincreated'] = 'Domenas sukurtas.';
	$lang['strdomaincreatedbad'] = 'Nepavyko sukurti domeno.';	
	$lang['strdomainaltered'] = 'Domenas pakeistas.';
	$lang['strdomainalteredbad'] = 'Nepavyko pakeisti domeno.';	

	// Operators
	$lang['stroperator'] = 'Operatorius';
	$lang['stroperators'] = 'Operatoriai';
	$lang['strshowalloperators'] = 'Rodyti visus operatorius';
	$lang['strnooperator'] = 'Operatorius nerastas.';
	$lang['strnooperators'] = 'Operatori&#371; nerasta.';
	$lang['strcreateoperator'] = 'Kurti operatori&#371;';
	$lang['strleftarg'] = 'Kairiojo argumento tipas';
	$lang['strrightarg'] = 'De&#353;iniojo argumento tipas';
$lang['strcommutator'] = 'Commutator';//komutatyvumas, perstatomumas,
$lang['strnegator'] = 'Negator';//inversija,neigimas, neigimo operacija
$lang['strrestrict'] = 'Restrict';//ribojimas
$lang['strjoin'] = 'Join';
$lang['strhashes'] = 'Hashes';
$lang['strmerges'] = 'Merges';
$lang['strleftsort'] = 'Left sort';
$lang['strrightsort'] = 'Right sort';
	$lang['strlessthan'] = 'Ma&#382;iau nei';
	$lang['strgreaterthan'] = 'Daugiau nei';
	$lang['stroperatorneedsname'] = 'Turite suteikti operatoriui pavadinim&#261;.';
	$lang['stroperatorcreated'] = 'Operatorius sukurtas.';
	$lang['stroperatorcreatedbad'] = 'Nepavyko sukurti operatoriaus.';
	$lang['strconfdropoperator'] = 'Ar tikrai norite &#353;alinti operatori&#371; &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operatorius pa&#353;alintas.';
	$lang['stroperatordroppedbad'] = 'Nepavyko pa&#353;alinti operatoriaus.';

	// Casts
$lang['strcasts'] = 'Casts';//duomen&#371; tipo keitimas
$lang['strnocasts'] = 'No casts found.';
$lang['strsourcetype'] = 'Source type';
$lang['strtargettype'] = 'Target type';
$lang['strimplicit'] = 'Implicit';//numanomas(-a)
$lang['strinassignment'] = 'In assignment';
$lang['strbinarycompat'] = '(Binary compatible)';//suderintas(-a) su dvejetain&#279; sistema
	
	// Conversions
	$lang['strconversions'] = 'Konvertavimai';
	$lang['strnoconversions'] = 'Konvertavimai nerasti.';
$lang['strsourceencoding'] = 'Source encoding';//pradin&#279; koduot&#279;
$lang['strtargetencoding'] = 'Target encoding';//galutin&#279; koduot&#279;
	
	// Languages
	$lang['strlanguages'] = 'Programavimo kalbos';
	$lang['strnolanguages'] = 'Kalb&#371; nerasta.';
	$lang['strtrusted'] = 'Patikima';
	
	// Info
	$lang['strnoinfo'] = 'N&#279;ra informacijos.';
	$lang['strreferringtables'] = 'Priklausomos lentel&#279;s';
	$lang['strparenttables'] = 'Vir&#353;lentel&#279;s';
	$lang['strchildtables'] = 'Polentel&#279;s';

	// Aggregates
	$lang['straggregate'] = 'Agregavimo funkcija';
	$lang['straggregates'] = 'Agregavimo funkcijos';
	$lang['strnoaggregates'] = 'Agregavimo funkcij&#371; nerasta.';
	$lang['stralltypes'] = '(Visi tipai)';
	$lang['strcreateaggregate'] = 'Kurti agregavimo funkcij&#261;';
	$lang['straggrbasetype'] = 'Pradini&#371; duomen&#371; tipas';
	$lang['straggrsfunc'] = 'B&#363;senos keitimo funkcija';
	$lang['straggrstype'] = 'B&#363;senos reik&#353;m&#279;s duomen&#371; tipas';
	$lang['straggrffunc'] = 'Galutin&#279; funkcija';
	$lang['straggrinitcond'] = 'Pradin&#279; s&#261;lyga';
	$lang['straggrsortop'] = 'Rikiavimo operatorius';
	$lang['strconfdropaggregate'] = 'Ar tikrai norite &#353;alinti agregavimo funkcij&#261; &quot;%s&quot;?';
	$lang['straggregatedropped'] = 'Agregavimo funkcija pa&#353;alinta.';
	$lang['straggregatedroppedbad'] = 'Nepavyko pa&#353;alinti agregavimo funkcijos.';
	$lang['straggraltered'] = 'Agregavimo funkcija pakeista.';
	$lang['straggralteredbad'] = 'Nepavyko pakeisti agregavimo funkcijos.';
	$lang['straggrneedsname'] = 'Turite suteikti agregavimo funkcijai pavadinim&#261;.';
	$lang['straggrneedsbasetype'] = 'Turite nurodyti agregavimo funkcijos pradini&#371; duomen&#371; tip&#261;.';
	$lang['straggrneedssfunc'] = 'Turite nurodyti agregavimo funkcijos b&#363;senos keitimo funkcijos pavadinim&#261;.';
	$lang['straggrneedsstype'] = 'Turite nurodyti agregavimo funkcijos b&#363;senos reik&#353;m&#279;s duomen&#371; tip&#261;.';
	$lang['straggrcreated'] = 'Agregavimo funkcija sukurta.';
	$lang['straggrcreatedbad'] = 'Nepavyko sukurti agregavimo funkcijos.';
	$lang['straggrshowall'] = 'Rodyti visas agregavimo funkcijas';

	// Operator Classes
	$lang['stropclasses'] = 'Operatori&#371; klas&#279;s';
	$lang['strnoopclasses'] = 'Operatori&#371; klasi&#371; nerasta.';
	$lang['straccessmethod'] = 'Prieigos metodas';

	// Stats and performance
	$lang['strrowperf'] = '&#302;ra&#353;&#371; Na&#353;umas';
	$lang['strioperf'] = 'I/O Na&#353;umas';
	$lang['stridxrowperf'] = 'Indeks&#371; &#302;ra&#353;&#371; Na&#353;umas';
	$lang['stridxioperf'] = 'Indeks&#371; I/O Na&#353;umas';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Nuoseklus';
	$lang['strscan'] = 'Per&#382;i&#363;r&#279;ti';
	$lang['strread'] = 'Skaityti';
	$lang['strfetch'] = 'Paimti';
	$lang['strheap'] = 'Kr&#363;va';
$lang['strtoast'] = 'TOAST';
$lang['strtoastindex'] = 'TOAST Indeksas';
	$lang['strcache'] = 'Pod&#279;lis';
	$lang['strdisk'] = 'Diskas';
	$lang['strrows2'] = '&#302;ra&#353;ai';

	// Tablespaces
	$lang['strtablespace'] = 'Lenteli&#371; erdv&#279;';
	$lang['strtablespaces'] = 'Lenteli&#371; erdv&#279;s';
	$lang['strshowalltablespaces'] = 'Rodyti visas lenteli&#371; erdves';
	$lang['strnotablespaces'] = 'Lenteli&#371; erdvi&#371; nerasta.';
	$lang['strcreatetablespace'] = 'Kurti lenteli&#371; erdv&#281;';
	$lang['strlocation'] = 'Vieta';
	$lang['strtablespaceneedsname'] = 'Turite suteikti lenteli&#371; erdvei pavadinim&#261;.';
	$lang['strtablespaceneedsloc'] = 'Turite nurodyti katalog&#261;, kuriame turi b&#363;ti sukurta lenteli&#371; erdv&#279;.';
	$lang['strtablespacecreated'] = 'Lenteli&#371; erdv&#279; sukurta.';
	$lang['strtablespacecreatedbad'] = 'Nepavyko sukurti lenteli&#371; erdv&#279;s.';
	$lang['strconfdroptablespace'] = 'Ar tikrai norite &#353;alinti lenteli&#371; erdv&#281; &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Lenteli&#371; erdv&#279; pa&#353;alinta.';
	$lang['strtablespacedroppedbad'] = 'Nepavyko pa&#353;alinti lenteli&#371; erdv&#279;s.';
	$lang['strtablespacealtered'] = 'Lenteli&#371; erdv&#279; pakeista.';
	$lang['strtablespacealteredbad'] = 'Nepavyko pakeisti lenteli&#371; erdv&#279;s.';

	// Slony clusters
	$lang['strcluster'] = 'Klasteris';
	$lang['strnoclusters'] = 'Klasteri&#371; nerasta.';
	$lang['strconfdropcluster'] = 'Ar tikrai norite &#353;alinti klaster&#303; &quot;%s&quot;?';
	$lang['strclusterdropped'] = 'Klasteris pa&#353;alintas.';
	$lang['strclusterdroppedbad'] = 'Nepavyko pa&#353;alinti klasterio.';
	$lang['strinitcluster'] = 'Inicijuoti klaster&#303;';
	$lang['strclustercreated'] = 'Klasteris inicijuotas.';
	$lang['strclustercreatedbad'] = 'Nepavyko inicijuoti klasterio.';
	$lang['strclusterneedsname'] = 'Turite suteikti klasteriui pavadinim&#261;.';
	$lang['strclusterneedsnodeid'] = 'Turite nurodyti identifikatori&#371; vietiniam mazgui.';

	// Slony nodes
	$lang['strnodes'] = 'Mazgai';
	$lang['strnonodes'] = 'Mazg&#371; nerasta.';
	$lang['strcreatenode'] = 'Kurti mazg&#261;';
	$lang['strid'] = 'Identifikatorius';
	$lang['stractive'] = 'Aktyvus';
	$lang['strnodecreated'] = 'Mazgas sukurtas.';
	$lang['strnodecreatedbad'] = 'Nepavyko sukurti mazgo.';
	$lang['strconfdropnode'] = 'Ar tikrai norite &#353;alinti mazg&#261; &quot;%s&quot;?';
	$lang['strnodedropped'] = 'Mazgas pa&#353;alintas.';
	$lang['strnodedroppedbad'] = 'Nepavyko pa&#353;alinti mazgo.';
	$lang['strfailover'] = 'Perjungimas';
	$lang['strnodefailedover'] = 'Mazgas perjungtas.';
	$lang['strnodefailedoverbad'] = 'Nepavyko perjungti mazgo.';
	$lang['strstatus'] = 'B&#363;sena';	
	$lang['strhealthy'] = 'Stabili';
	$lang['stroutofsync'] = 'Asinchronin&#279;';
	$lang['strunknown'] = 'Ne&#382;inoma';	

	// Slony paths	
	$lang['strpaths'] = 'Keliai';
	$lang['strnopaths'] = 'Keli&#371; nerasta.';
	$lang['strcreatepath'] = 'Kurti keli&#261;';
	$lang['strnodename'] = 'Mazgo pavadinimas';
	$lang['strnodeid'] = 'Mazgo identifikatorius';
	$lang['strconninfo'] = 'Prisijungimo eilut&#279;';
	$lang['strconnretry'] = 'Sekund&#279;s tarp bandym&#371; prisijungti';
	$lang['strpathneedsconninfo'] = 'Turite pateikti kelio prisijungimo eilut&#281;.';
	$lang['strpathneedsconnretry'] = 'Turite nurodyti kiek sekund&#382;i&#371; laukti prie&#353; bandydant prisijungti i&#353; naujo.';
	$lang['strpathcreated'] = 'Kelias sukurtas.';
	$lang['strpathcreatedbad'] = 'Nepavyko sukurti kelio.';
	$lang['strconfdroppath'] = 'Ar tikrai norite &#353;alinti keli&#261; &quot;%s&quot;?';
	$lang['strpathdropped'] = 'Kelias pa&#353;alintas.';
	$lang['strpathdroppedbad'] = 'Nepavyko pa&#353;alinti kelio.';

	// Slony listens
$lang['strlistens'] = 'Listens';
$lang['strnolistens'] = 'No listens found.';
$lang['strcreatelisten'] = 'Create listen';
$lang['strlistencreated'] = 'Listen created.';
$lang['strlistencreatedbad'] = 'Listen creation failed.';
$lang['strconfdroplisten'] = 'Are you sure you want to drop listen &quot;%s&quot;?';
$lang['strlistendropped'] = 'Listen dropped.';
$lang['strlistendroppedbad'] = 'Listen drop failed.';

	// Slony replication sets
$lang['strrepsets'] = 'Replication sets';
$lang['strnorepsets'] = 'No replication sets found.';
$lang['strcreaterepset'] = 'Create replication set';
$lang['strrepsetcreated'] = 'Replication set created.';
$lang['strrepsetcreatedbad'] = 'Replication set creation failed.';
$lang['strconfdroprepset'] = 'Are you sure you want to drop replication set &quot;%s&quot;?';
$lang['strrepsetdropped'] = 'Replication set dropped.';
$lang['strrepsetdroppedbad'] = 'Replication set drop failed.';
	$lang['strmerge'] = 'Sulieti';
	$lang['strmergeinto'] = '&#302;lieti &#303;';
$lang['strrepsetmerged'] = 'Replication sets merged.';
$lang['strrepsetmergedbad'] = 'Replication sets merge failed.';
	$lang['strmove'] = 'Perkelti';
$lang['strneworigin'] = 'New origin';
$lang['strrepsetmoved'] = 'Replication set moved.';
$lang['strrepsetmovedbad'] = 'Replication set move failed.';
$lang['strnewrepset'] = 'New replication set';
	$lang['strlock'] = 'Blokuoti';
	$lang['strlocked'] = 'U&#382;blokuota';
	$lang['strunlock'] = 'Neblokuoti';
$lang['strconflockrepset'] = 'Are you sure you want to lock replication set &quot;%s&quot;?';
$lang['strrepsetlocked'] = 'Replication set locked.';
$lang['strrepsetlockedbad'] = 'Replication set lock failed.';
$lang['strconfunlockrepset'] = 'Are you sure you want to unlock replication set &quot;%s&quot;?';
$lang['strrepsetunlocked'] = 'Replication set unlocked.';
$lang['strrepsetunlockedbad'] = 'Replication set unlock failed.';
$lang['stronlyonnode'] = 'Only on node';
$lang['strddlscript'] = 'DDL script';
$lang['strscriptneedsbody'] = 'You must supply a script to be executed on all nodes.';
$lang['strscriptexecuted'] = 'Replication set DDL script executed.';
$lang['strscriptexecutedbad'] = 'Failed executing replication set DDL script.';
$lang['strtabletriggerstoretain'] = 'The following triggers will NOT be disabled by Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Prid&#279;ti lentel&#281;';
	$lang['strtableneedsuniquekey'] = 'Pridedama lentel&#279; turi tur&#279;ti pirmin&#303; arba unikal&#371; rakt&#261;.';
$lang['strtableaddedtorepset'] = 'Table added to replication set.';
$lang['strtableaddedtorepsetbad'] = 'Failed adding table to replication set.';
$lang['strconfremovetablefromrepset'] = 'Are you sure you want to drop the table &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strtableremovedfromrepset'] = 'Table dropped from replication set.';
$lang['strtableremovedfromrepsetbad'] = 'Failed to drop table from replication set.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Prid&#279;ti sek&#261;';
$lang['strsequenceaddedtorepset'] = 'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad'] = 'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset'] = 'Are you sure you want to drop the sequence &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strsequenceremovedfromrepset'] = 'Sequence dropped from replication set.';
$lang['strsequenceremovedfromrepsetbad'] = 'Failed to drop sequence from replication set.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Prenumeratos';
	$lang['strnosubscriptions'] = 'Prenumerat&#371; nerasta.';

	// Miscellaneous
	$lang['strtopbar'] = '%s veikia %s:%s -- J&#363;s esate prisijung&#281;s kaip &quot;%s&quot;';
	$lang['strtimefmt'] = 'j M Y - g:iA';
	$lang['strhelp'] = 'Pagalba';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Pagalbos puslapio nar&#353;ykl&#279;';
	$lang['strselecthelppage'] = 'Pasirinkite pagalbos puslap&#303;';
	$lang['strinvalidhelppage'] = 'Netinkamas pagalbos puslapis.';
	$lang['strlogintitle'] = 'Prisijungti prie %s';
	$lang['strlogoutmsg'] = 'Atsijungta nuo %s';
	$lang['strloading'] = '&#302;keliama...';
	$lang['strerrorloading'] = 'Klaida &#303;keliant';
	$lang['strclicktoreload'] = 'Spustel&#279;kite, kad b&#363;t&#371; atsi&#371;sta i&#353; naujo';

	// Autovacuum
	$lang['strautovacuum'] = 'Automatinis apvalymas';
	$lang['strturnedon'] = '&#302;jungta';
	$lang['strturnedoff'] = 'I&#353;jungta';
	$lang['strenabled'] = 'Veiksnus';
	$lang['strnovacuumconf'] = 'Automatinio apvalymo konfig&#363;racij&#371; nerasta.';
	$lang['strvacuumbasethreshold'] = 'Apvalymo bazin&#279; riba';
	$lang['strvacuumscalefactor'] = 'Apvalymo skal&#279;s koeficientas';
	$lang['stranalybasethreshold'] = 'Analiz&#279;s bazin&#279; riba';
	$lang['stranalyzescalefactor'] = 'Analiz&#279;s skal&#279;s koeficientas';
$lang['strvacuumcostdelay'] = 'Apvalymo Cost Delay';
$lang['strvacuumcostlimit'] = 'Apvalymo Cost Limit';
	$lang['strvacuumpertable'] = 'Lenteli&#371; automatinio apvalymo konfig&#363;racijos';
	$lang['straddvacuumtable'] = 'Prid&#279;ti lentel&#279;s automatinio apvalymo konfig&#363;racij&#261;';
	$lang['streditvacuumtable'] = 'Taisyti lentel&#279;s %s automatinio apvalymo konfig&#363;racij&#261;';
	$lang['strdelvacuumtable'] = '&#352;alinti lentel&#279;s %s automatinio apvalymo konfig&#363;racij&#261; ?';
	$lang['strvacuumtablereset'] = 'Lentel&#279;s %s automatinio apvalymo konfig&#363;racijos reik&#353;m&#279;s atstatytos &#303; numatyt&#261;sias';
	$lang['strdelvacuumtablefail'] = 'Nepavyko panaikinti lentel&#279;s %s automatinio apvalymo konfig&#363;racijos';
	$lang['strsetvacuumtablesaved'] = 'Lentel&#279;s %s automatinio apvalymo konfig&#363;racija &#303;ra&#353;yta.';
	$lang['strsetvacuumtablefail'] = 'Nepavyko konfig&#363;ruoti lentel&#279;s %s automatinio apvalymo.';
	$lang['strspecifydelvacuumtable'] = 'Turite nurodyti lentel&#281;, kurios automatinio apvalymo konfig&#363;racij&#261; norite panaikinti.';
	$lang['strspecifyeditvacuumtable'] = 'Turite nurodyti lentel&#281;, kurios automatinio apvalymo konfig&#363;racij&#261; norite taisyti.';
	$lang['strnotdefaultinred'] = 'Reik&#353;m&#279;s, kitokios nei numatytosios, pa&#382;ym&#279;tos raudonai.';

	// Table-level Locks
	$lang['strlocks'] = 'Blokuot&#279;s';
	$lang['strtransaction'] = 'Operacijos Identifikatorius';
	$lang['strvirtualtransaction'] = 'Virtualios Operacijos Identifikatorius';
	$lang['strprocessid'] = 'Proceso Identifikatorius';
	$lang['strmode'] = 'Blokuot&#279;s veiksena';
	$lang['strislockheld'] = 'Ar blokuot&#279; veikia?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Paruo&#353;tos operacijos';
	$lang['strxactid'] = 'Operacijos identifikatorius';
	$lang['strgid'] = 'Globalus identifikatorius';
	
	// Fulltext search
$lang['strfulltext'] = 'Full Text Search';
	$lang['strftsconfig'] = 'FTS konfig&#363;racija';
	$lang['strftsconfigs'] = 'Konfig&#363;racijos';
	$lang['strftscreateconfig'] = 'Kurti FTS konfig&#363;racij&#261;';
	$lang['strftscreatedict'] = 'Kurti &#382;odyn&#261;';
	$lang['strftscreatedicttemplate'] = 'Kurti &#382;odyno &#353;ablon&#261;';
	$lang['strftscreateparser'] = 'Kurti analizatori&#371;';
	$lang['strftsnoconfigs'] = 'FTS konfig&#363;racij&#371; nerasta.';
	$lang['strftsconfigdropped'] = 'FTS konfig&#363;racija pa&#353;alinta.';
	$lang['strftsconfigdroppedbad'] = 'Nepavyko pa&#353;alinti FTS konfig&#363;racijos.';
	$lang['strconfdropftsconfig'] = 'Ar tikrai norite &#353;alinti FTS konfig&#363;racij&#261; &quot;%s&quot;?';
	$lang['strconfdropftsdict'] = 'Ar tikrai norite &#353;alinti FTS &#382;odyn&#261; &quot;%s&quot;?';
	$lang['strconfdropftsmapping'] = 'Ar tikrai norite &#353;alinti atvaizd&#303; &quot;%s&quot; FTS konfig&#363;racijai &quot;%s&quot;?';
	$lang['strftstemplate'] = '&#352;ablonas';
	$lang['strftsparser'] = 'Analizatorius';
	$lang['strftsconfigneedsname'] = 'Turite suteikti FTS konfig&#363;racijai pavadinim&#261;.';
	$lang['strftsconfigcreated'] = 'FTS konfig&#363;racija sukurta.';
	$lang['strftsconfigcreatedbad'] = 'Nepavyko sukurti FTS konfig&#363;racijos.';
	$lang['strftsmapping'] = 'Atvaizdis';
	$lang['strftsdicts'] = '&#381;odynai';
	$lang['strftsdict'] = '&#381;odynas';
	$lang['strftsemptymap'] = 'I&#353;valyti FTS konfig&#363;racijos atvaizd&#303;.';
	$lang['strftsconfigaltered'] = 'FTS konfig&#363;racija pakeista.';
	$lang['strftsconfigalteredbad'] = 'Nepavyko pakeisti FTS konfig&#363;racijos.';
	$lang['strftsconfigmap'] = 'FTS konfig&#363;racijos atvaizdis';
	$lang['strftsparsers'] = 'FTS analizatoriai';
	$lang['strftsnoparsers'] = 'FTS analizatori&#371; n&#279;ra.';
	$lang['strftsnodicts'] = 'FTS &#382;odyn&#371; n&#279;ra.';
	$lang['strftsdictcreated'] = 'FTS &#382;odynas sukurtas.';
	$lang['strftsdictcreatedbad'] = 'Nepavyko sukurti FTS &#382;odyno.';
$lang['strftslexize'] = 'Lexize';
$lang['strftsinit'] = 'Init';
	$lang['strftsoptionsvalues'] = 'Parinktys ir reik&#353;m&#279;s';
	$lang['strftsdictneedsname'] = 'Turite suteikti FTS &#382;odynui pavadinim&#261;.';
	$lang['strftsdictdropped'] = 'FTS &#382;odynas pa&#353;alintas.';
	$lang['strftsdictdroppedbad'] = 'Nepavyko pa&#353;alinti FTS &#382;odyno.';
	$lang['strftsdictaltered'] = 'FTS &#382;odynas pakeistas.';
	$lang['strftsdictalteredbad'] = 'Nepavyko pakeisti FTS &#382;odyno.';
	$lang['strftsaddmapping'] = 'Prid&#279;ti nauj&#261; atvaizd&#303;';
	$lang['strftsspecifymappingtodrop'] = 'Turite nurodyti bent vien&#261; atvaizd&#303;, kur&#303; norite pa&#353;alinti.';
	$lang['strftsspecifyconfigtoalter'] = 'Turite nurodyti bent vien&#261; FTS konfig&#363;racij&#261;, kuri&#261; norite pakeisti.';
	$lang['strftsmappingdropped'] = 'FTS atvaizdis pa&#353;alintas.';
	$lang['strftsmappingdroppedbad'] = 'Nepavyko pa&#353;alinti FTS atvaizd&#382;io.';
	$lang['strftsnodictionaries'] = '&#381;odyn&#371; nerasta.';
	$lang['strftsmappingaltered'] = 'FTS atvaizdis pakeistas.';
	$lang['strftsmappingalteredbad'] = 'Nepavyko pakeisti FTS atvaizd&#382;io.';
	$lang['strftsmappingadded'] = 'FTS atvaizdis prid&#279;tas.';
	$lang['strftsmappingaddedbad'] = 'Nepavyko prid&#279;ti FTS atvaizd&#382;io.';
	$lang['strftstabconfigs'] = 'Konfig&#363;racijos';
	$lang['strftstabdicts'] = '&#381;odynai';
	$lang['strftstabparsers'] = 'Analizatoriai';
	$lang['strftscantparsercopy'] = 'Negalima nurodyti kartu ir analizatoriaus, ir &#353;ablono, teksto paie&#353;kos konfik&#363;racijos k&#363;rimo metu.';
?>
