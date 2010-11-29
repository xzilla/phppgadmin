<?php

	/**
	 * Catalan language file for phpPgAdmin.
	 * mantainer: Bernat Pegueroles &lt;bpf@pegueroles.com&gt;
	 *
	 * $Id: catalan.php,v 1.4 2008/03/14 03:31:43 xzilla Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Catal&#224;';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'ca_ES';
	$lang['appdbencoding'] = 'UNICODE';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'Benvingut a phpPgAdmin.';
	$lang['strppahome'] = 'P&#224;gina web de phpPgAdmin';
	$lang['strpgsqlhome'] = 'P&#224;gina web de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentaci&#243; PostgreSQL (local)';
	$lang['strreportbug'] = 'Reportar un Bug';
	$lang['strviewfaq'] = 'Veure FAQ online';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Entrada';
	$lang['strloginfailed'] = 'Entrada fallida';
	$lang['strlogindisallowed'] = 'Entrada rebutjada per raons de seguretat.';
	$lang['strserver'] = 'Servidor';
	$lang['strservers'] = 'Servidors';
        $lang['strgroupservers']  =  'Servidors en el grup &quot;%s&quot;';
        $lang['strallservers']  =  'Tots els servidors';
	$lang['strintroduction'] = 'Introducci&#243;';
	$lang['strhost'] = 'Host';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'Sortida';
	$lang['strowner'] = 'Propietari';
	$lang['straction'] = 'Acci&#243;';
	$lang['stractions'] = 'Accions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'Definici&#243;';
	$lang['strproperties'] = 'Propietats';
	$lang['strbrowse'] = 'Navega';
	$lang['strenable'] = 'Habilita';
	$lang['strdisable'] = 'Inhabilita';
	$lang['strdrop'] = 'Elimina';
	$lang['strdropped'] = 'Eliminat';
	$lang['strnull'] = 'Nul';
	$lang['strnotnull'] = 'No Nul';
	$lang['strprev'] = '&lt; Previ';
	$lang['strnext'] = 'Seg&#252;ent &gt;';
	$lang['strfirst'] = '&lt;&lt; Primer';
	$lang['strlast'] = '&#218;ltim &gt;&gt;';
	$lang['strfailed'] = 'Fallat';
	$lang['strcreate'] = 'Crea';
	$lang['strcreated'] = 'Creat';
	$lang['strcomment'] = 'Comentari';
	$lang['strlength'] = 'Longitud';
	$lang['strdefault'] = 'Predeterminat';
	$lang['stralter'] = 'Modifica';
	$lang['strok'] = 'D\'acord';
	$lang['strcancel'] = 'Cancel&#183;la';
        $lang['strkill']  =  'Mata';
	$lang['strac'] = 'Habilita AutoCompletat';
	$lang['strsave'] = 'Desa';
	$lang['strreset'] = 'Restableix';
        $lang['strrestart']  =  'Reinicia';
	$lang['strinsert'] = 'Inserta';
	$lang['strselect'] = 'Selecciona';
	$lang['strdelete'] = 'Elimina';
	$lang['strupdate'] = 'Actualitza';
	$lang['strreferences'] = 'Refer&#232;ncies';
	$lang['stryes'] = 'S&#237;';
	$lang['strno'] = 'No';
	$lang['strtrue'] = 'Cert';
	$lang['strfalse'] = 'Fals';
	$lang['stredit'] = 'Edita';
	$lang['strcolumn'] = 'Columna';
	$lang['strcolumns'] = 'Columnes';
	$lang['strrows'] = 'fila(es)';
	$lang['strrowsaff'] = 'fila/es afectada/es.';
	$lang['strobjects'] = 'objecte(s)';
	$lang['strback'] = 'Enrere';
	$lang['strqueryresults'] = 'Resultat de la Consulta';
	$lang['strshow'] = 'Mostra';
	$lang['strempty'] = 'Buida';
	$lang['strlanguage'] = 'Idioma';
	$lang['strencoding'] = 'Codificaci&#243;';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = '&#218;nic';
	$lang['strprimary'] = 'Primari';
	$lang['strexport'] = 'Exporta';
	$lang['strimport'] = 'Importa';
	$lang['strallowednulls'] = 'Car&#224;cters NULL Permesos';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Cadena o camp buit';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strclusterindex'] = 'Cl&#250;ster';
	$lang['strclustered'] = 'Clusteritzat?';
	$lang['strreindex'] = 'Reindex';
	$lang['strexecute'] = 'Executa';
	$lang['stradd'] = 'Agrega';
	$lang['strevent'] = 'Event';
	$lang['strwhere'] = 'On';
	$lang['strinstead'] = 'Fes en el seu lloc';
	$lang['strwhen'] = 'Quan';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Dades';
	$lang['strconfirm'] = 'Confirma';
	$lang['strexpression'] = 'Expressi&#243;';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Expandeix';
	$lang['strcollapse'] = 'Colapsa';
	$lang['strfind'] = 'Cerca';
	$lang['stroptions'] = 'Opcions';
	$lang['strrefresh'] = 'Refresca';
	$lang['strdownload'] = 'Baixa';
	$lang['strdownloadgzipped'] = 'Baixa comprimit amb gzip';
	$lang['strinfo'] = 'Informaci&#243;';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avan&#231;at';
	$lang['strvariables'] = 'Variables';
	$lang['strprocess'] = 'Proc&#233;s';
	$lang['strprocesses'] = 'Processos';
	$lang['strsetting'] = 'Ajustament';
	$lang['streditsql'] = 'Edita SQL';
	$lang['strruntime'] = 'Total temps d\'execuci&#243;: %s ms';
	$lang['strpaginate'] = 'Pagina els resultats';
	$lang['struploadscript'] = 'o carrega un script SQL:';
	$lang['strstarttime'] = 'Hora d\'Inici';
	$lang['strfile'] = 'Fitxer';
	$lang['strfileimported'] = 'Fitxer importat.';
	$lang['strtrycred'] = 'Usa aquestes credencials a tots els servidors';
        $lang['strconfdropcred']  =  'Per raons de seguretat, la desconnexi&#243; eliminar&#224; la informaci&#243; d\'entrada compartida. Est&#224; segur de voler desconnectar ?';
	$lang['stractionsonmultiplelines'] = 'Accions a m&#250;ltiples l&#237;nies';
	$lang['strselectall'] = 'Seleccina\'ls tots';
	$lang['strunselectall'] = 'No en seleccionis cap';
	$lang['strlocale'] = 'Local';
        $lang['strcollation']  =  'Col&#183;laci&#243;';
        $lang['strctype']  =  'Tipus de car&#224;cter';
        $lang['strdefaultvalues']  =  'Valors per defecte';
        $lang['strnewvalues']  =  'Valors nous';
        $lang['strstart']  =  'Comen&#231;a';
        $lang['strstop']  =  'Para';
        $lang['strgotoppage']  =  'Torna al principi';
        $lang['strtheme']  =  'Tema';
	
	// Admin
        $lang['stradminondatabase']  =  'Les seg&#252;ents tasques administratives s\'apliquen a tota la base de dades %s.';
        $lang['stradminontable']  =  'Les seg&#252;ents tasques administratives s\'apliquen a la taula %s.';

	// User-supplied SQL history
	$lang['strhistory'] = 'Hist&#242;ria';
	$lang['strnohistory'] = 'No hi ha hist&#242;ria.';
	$lang['strclearhistory'] = 'Neteja la hist&#242;ria';
	$lang['strdelhistory'] = 'Elimina de la hist&#242;ria';
	$lang['strconfdelhistory'] = 'Realment vol eliminar aquesta petici&#243; de la hist&#242;ria?';
	$lang['strconfclearhistory'] = 'Realment vol elimnar la hist&#242;ria?';
	$lang['strnodatabaseselected'] = 'Si us plau, seleccioni una base de dades.';

	// Database Sizes
        $lang['strnoaccess']  =  'Sense Acc&#233;s'; 
	$lang['strsize'] = 'Tamany';
	$lang['strbytes'] = 'bytes';
	$lang['strkb'] = 'kB';
	$lang['strmb'] = 'MB';
	$lang['strgb'] = 'GB';
	$lang['strtb'] = 'TB';

	// Error handling
	$lang['strnoframes'] = 'Aquesta aplicaci&#243; treballa millor en un navegador amb suport per frames, per&#242; es pot usar sense seguint el link de sota.';
	$lang['strnoframeslink'] = 'Usa sense frames';
	$lang['strbadconfig'] = 'El seu config.inc.php no est&#224; actualitzat. Necessitar&#224; regenerar-lo a partir del nou config.inc.php-dist.';
	$lang['strnotloaded'] = 'La seva instal&#183;laci&#243; de PHP no suporta la PostgreSQL. Necessita recompilar el PHP usant la opci&#243; de configuraci&#243; --with-pgsql.';
	$lang['strpostgresqlversionnotsupported'] = 'Versi&#243; de PostgreSQL no suportada. Si su plau actualitzi a la versi&#243; %s o posterior.';
	$lang['strbadschema'] = 'Esquema especificat inv&#224;lid.';
	$lang['strbadencoding'] = 'Error al fixar la codificaci&#243; del client a la base de dades.';
	$lang['strsqlerror'] = 'Error SQL:';
	$lang['strinstatement'] = 'En la sent&#232;ncia:';
	$lang['strinvalidparam'] = 'Par&#224;metres del script inv&#224;lids.';
	$lang['strnodata'] = 'No s\'han trobat files.';
	$lang['strnoobjects'] = 'No s\'han trobat objectes.';
	$lang['strrownotunique'] = 'No hi ha un identificador &#250;nic per aquesta fila.';
	$lang['strnoreportsdb'] = 'La base de dades dels reports no est&#224; creada. Llegeixi el fitxer INSTALL per fer-ho.';
	$lang['strnouploads'] = 'La pujada de fitxers est&#224; deshabilitada.';
	$lang['strimporterror'] = 'Error d\'importaci&#243;.';
	$lang['strimporterror-fileformat'] = 'Error d\'importaci&#243;: Error al determinar autom&#224;ticament el format del fitxer.';
	$lang['strimporterrorline'] = 'Error d\'importaci&#243; a la l&#237;nia %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Error d\'importaci&#243; a la l&#237;nia %s:  La l&#237;nia no t&#233; el n&#250;mero correcte de columnes.';
	$lang['strimporterror-uploadedfile'] = 'Error d\'importaci&#243;: El fitxer no s\'ha pogut pujar al servidor';
	$lang['strcannotdumponwindows'] = 'El volcat de dades amb noms complexos de taules i esquemes en Windows no &#233;s suportada.';
	$lang['strinvalidserverparam'] = 'Intent de connexi&#243; amb un par&#224;metre del servidor inv&#224;lid, possiblement alg&#250; est&#224; provant d\'entrar al sistema.'; 
	$lang['strnoserversupplied'] = 'No s\'ha proporcionat cap servidor!';
        $lang['strbadpgdumppath']  =  'Error d\'exportaci&#243;: Fallada en l\'execuci&#243; de pg_dump (path definit a conf/config.inc.php : %s ). Sisplau, arregli el path en la configuraci&#243;.';
        $lang['strbadpgdumpallpath']  =  'Error d\'exportaci&#243;: Fallada en l\'execuci&#243; de pg_dumpall (path definit a conf/config.inc.php : %s ). Sisplau, arregli el path en la configuraci&#243;.';
        $lang['strconnectionfail']  =  'No hi ha connexi&#243; amb el servidor.';

	// Tables
	$lang['strtable'] = 'Taula';
	$lang['strtables'] = 'Taules';
	$lang['strshowalltables'] = 'Mostra totes les taules';
	$lang['strnotables'] = 'No s\'han trobat taules.';
	$lang['strnotable'] = 'No s\'ha trobat la taula.';
	$lang['strcreatetable'] = 'Crea una taula';
	$lang['strcreatetablelike'] = 'Crea una taula com a';
	$lang['strcreatetablelikeparent'] = 'Taula origen';
	$lang['strcreatelikewithdefaults'] = 'INCLUDE DEFAULTS';
	$lang['strcreatelikewithconstraints'] = 'INCLUDE CONSTRAINTS';
	$lang['strcreatelikewithindexes'] = 'INCLUDE INDEXES';
	$lang['strtablename'] = 'Nom de la taula';
	$lang['strtableneedsname'] = 'Ha d\'anomenar la taula.';
	$lang['strtablelikeneedslike'] = 'Ha de donar una taula d\'on copiar les propietats.';
	$lang['strtableneedsfield'] = 'Ha d\'especificar almenys un camp.';
	$lang['strtableneedscols'] = 'Ha d\'especificar un n&#250;mero v&#224;lid de columnes.';
	$lang['strtablecreated'] = 'Taula creada.';
	$lang['strtablecreatedbad'] = 'No s\'ha pogut crear la taula.';
	$lang['strconfdroptable'] = 'Est&#224; segur de voler eliminar la taula &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Taula eliminada.';
	$lang['strtabledroppedbad'] = 'No s\'ha pogut eliminar la taula.';
	$lang['strconfemptytable'] = 'Est&#224; segur que vol buidar la taula &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Taula buidada.';
	$lang['strtableemptiedbad'] = 'No s\'ha pogut buidar la taula.';
	$lang['strinsertrow'] = 'Inserta una fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'No s\'ha pogut insertar la taula.';
        $lang['strnofkref']  =  'No hi ha cap valor coincident en la foreign key %s.';
	$lang['strrowduplicate'] = 'Inserci&#243; de la taula fallada, intentant fer una inserci&#243; duplicada.';
	$lang['streditrow'] = 'Edita la fila';
	$lang['strrowupdated'] = 'Fila actualitzada.';
	$lang['strrowupdatedbad'] = 'No s\'ha pogut actualitzar la fila.';
	$lang['strdeleterow'] = 'Elimina la fila';
	$lang['strconfdeleterow'] = 'Est&#224; segur que vol eliminar aquesta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'No s\'ha pogut eliminar la fila.';
	$lang['strinsertandrepeat'] = 'Inserta &amp; Repeteix';
	$lang['strnumcols'] = 'Nombre de columnes';
	$lang['strcolneedsname'] = 'Ha d\'especificar un nom per la columna';
	$lang['strselectallfields'] = 'Selecciona tots els camps';
	$lang['strselectneedscol'] = 'Ha de mostrar almenys una columna.';
	$lang['strselectunary'] = 'Els operadors unaris no poden tenir valors.';
	$lang['strcolumnaltered'] = 'Columna modificada.';
	$lang['strcolumnalteredbad'] = 'No s\'ha pogut modificar la columna.';
	$lang['strconfdropcolumn'] = 'Est&#224; segur d\'eliminar la columna &quot;%s&quot; de la taula &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'No s\'ha pogut eliminar la columna.';
	$lang['straddcolumn'] = 'Agrega una columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'No s\'ha pogut agregar la columna.';
	$lang['strcascade'] = 'EN CASCADA';
	$lang['strtablealtered'] = 'Taula modificada.';
	$lang['strtablealteredbad'] = 'No s\'ha pogut modificar la columna.';
	$lang['strdataonly'] = 'Nom&#233;s dades';
	$lang['strstructureonly'] = 'Nomes estructura';
	$lang['strstructureanddata'] = 'Estructura i dades';
	$lang['strtabbed'] = 'Tabulat';
	$lang['strauto'] = 'Autom&#224;tic';
	$lang['strconfvacuumtable'] = 'Est&#224; segur de voler un vacuum &quot;%s&quot;?';
	$lang['strconfanalyzetable'] = 'Est&#224; segur de voler un analyze &quot;%s&quot;?';
        $lang['strconfreindextable']  =  'Est&#224; segur de voler un reindex &quot;%s&quot;?';
        $lang['strconfclustertable']  =  'Est&#224; sergur de voler un cluster &quot;%s&quot;?';
	$lang['strestimatedrowcount'] = 'Nombre estimat de files';
	$lang['strspecifytabletoanalyze'] = 'Ha d\'especificar almenys una taula per l\'analyze.';
	$lang['strspecifytabletoempty'] = 'Ha d\'especificar almenys una taula per buidar.';
	$lang['strspecifytabletodrop'] = 'Ha d\'especificar almenys una taula per eliminar.';
	$lang['strspecifytabletovacuum'] = 'Ha d\'especificar almenys una taula pel vacuum.';
        $lang['strspecifytabletoreindex']  =  'Ha d\'especifiar almenys una taula pel reindex.';
        $lang['strspecifytabletocluster']  =  'Ha d\'especificar almenys una taula pel cluster.';
        $lang['strnofieldsforinsert']  =  'No es pot insertar una fila a una taula sense cap columna.';

	// Columns
	$lang['strcolprop'] = 'Propietats de la Columna';
	$lang['strnotableprovided'] = 'No s\'ha proporcionat cap taula!';
		
	// Users
	$lang['struser'] = 'Usuari';
	$lang['strusers'] = 'Usuaris';
	$lang['strusername'] = 'Usuari';
	$lang['strpassword'] = 'Contrasenya';
	$lang['strsuper'] = 'Superusuari?';
	$lang['strcreatedb'] = 'Crear DB?';
	$lang['strexpires'] = 'Expira';
	$lang['strsessiondefaults'] = 'Valors predeterminats de la sessi&#243;';
	$lang['strnousers'] = 'No s\'han trobat usuaris.';
	$lang['struserupdated'] = 'Usuari actualitzat.';
	$lang['struserupdatedbad'] = 'L\'actualitzaci&#243; de l\'usuari ha fallat.';
	$lang['strshowallusers'] = 'Mostra tots els usuaris';
	$lang['strcreateuser'] = 'Crea un usuari';
	$lang['struserneedsname'] = 'Ha de donar un nom a l\'usuari.';
	$lang['strusercreated'] = 'Usuari creat.';
	$lang['strusercreatedbad'] = 'Error al crear l\'usuari.';
	$lang['strconfdropuser'] = 'Est&#224; segur de voler eliminar l\'usuari &quot;%s&quot;?';
	$lang['struserdropped'] = 'Usuari eliminat.';
	$lang['struserdroppedbad'] = 'Error a l\'eliminar l\'usuari.';
	$lang['straccount'] = 'Compte';
	$lang['strchangepassword'] = 'Canvia la contrasenya';
	$lang['strpasswordchanged'] = 'Contrasenya canviada.';
	$lang['strpasswordchangedbad'] = 'Error al canviar la contrasenya.';
	$lang['strpasswordshort'] = 'Contrasenya massa curta.';
	$lang['strpasswordconfirm'] = 'La contrasenya no coincideix amb la confirmaci&#243;.';
	
	// Groups
	$lang['strgroup'] = 'Grup';
	$lang['strgroups'] = 'Grups';
	$lang['strshowallgroups'] = 'Mostra tots els grups';
	$lang['strnogroup'] = 'Grup no trobat.';
	$lang['strnogroups'] = 'No s\'han trobat grups.';
	$lang['strcreategroup'] = 'Crea un grup';
	$lang['strgroupneedsname'] = 'Ha de donar un nom al grup.';
	$lang['strgroupcreated'] = 'Grup creat.';
	$lang['strgroupcreatedbad'] = 'No s\'ha pogut crear el grup.';	
	$lang['strconfdropgroup'] = 'Est&#224; segur de voler eliminar el grup &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grup eliminat.';
	$lang['strgroupdroppedbad'] = 'No s\'ha pogut eliminar el grup.';
	$lang['strmembers'] = 'Membres';
	$lang['strmemberof'] = 'Membre de';
	$lang['stradminmembers'] = 'Membres administradors';
	$lang['straddmember'] = 'Afegeix un membre';
	$lang['strmemberadded'] = 'Membre afegit.';
	$lang['strmemberaddedbad'] = 'No s\'ha pogut afegir el membre.';
	$lang['strdropmember'] = 'Elimina el membre';
	$lang['strconfdropmember'] = 'Est&#224; segur de voler eliminar el membre &quot;%s&quot; del grup &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Membre eliminat.';
	$lang['strmemberdroppedbad'] = 'No s\'ha pogut eliminar el membre.';
	
	// Roles
	$lang['strrole'] = 'Rol';
	$lang['strroles'] = 'Rols';
	$lang['strshowallroles'] = 'Mostra tots els rols';
	$lang['strnoroles'] = 'No s\'han trobat rols.';
	$lang['strinheritsprivs'] = 'Hereda privilegis?';
	$lang['strcreaterole'] = 'Crea un rol';
	$lang['strcancreaterole'] = 'Crear el rol?';
	$lang['strrolecreated'] = 'Rol creat.';
	$lang['strrolecreatedbad'] = 'No s\'ha pogut crear el rol.';
	$lang['strrolealtered'] = 'Rol modificat.';
	$lang['strrolealteredbad'] = 'No s\ha pogut modificar el rol.';
	$lang['strcanlogin'] = 'Pot entrar?';
	$lang['strconnlimit'] = 'L&#237;mit de la connexi&#243;';
	$lang['strdroprole'] = 'Elimina el rol';
	$lang['strconfdroprole'] = 'Est&#224; segur de voler eliminar el rol \'%s\'?';
	$lang['strroledropped'] = 'Rol eliminat.';
	$lang['strroledroppedbad'] = 'No s\'ha pogut eliminar el rol.';
	$lang['strnolimit'] = 'Sense l&#237;mit';
	$lang['strnever'] = 'Mai';
	$lang['strroleneedsname'] = 'Ha de donar un nom al rol.';

	// Privileges
	$lang['strprivilege'] = 'Privilegi';
	$lang['strprivileges'] = 'Privilegis';
	$lang['strnoprivileges'] = 'Aquest objecte t&#233; els privilegis predeterminats.';
	$lang['strgrant'] = 'Concedeix';
	$lang['strrevoke'] = 'Revoca';
	$lang['strgranted'] = 'Privilegis canviats.';
	$lang['strgrantfailed'] = 'Ha fallat el canvi de privilegis.';
	$lang['strgrantbad'] = 'Ha d\'especificar almenys un usuari o grup i almenys un privilegi.';
	$lang['strgrantor'] = 'Cedent';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Base de dades';
	$lang['strdatabases'] = 'Bases de dades';
	$lang['strshowalldatabases'] = 'Mostra totes les bases de dades';
	$lang['strnodatabases'] = 'No s\'han trobat bases de dades.';
	$lang['strcreatedatabase'] = 'Crea una base de dades';
	$lang['strdatabasename'] = 'Nom de la base de dades';
	$lang['strdatabaseneedsname'] = 'Ha de donar un nom a la base de dades.';
	$lang['strdatabasecreated'] = 'Base de dades creada.';
	$lang['strdatabasecreatedbad'] = 'No s\'ha pogut crear la base de dades.';
	$lang['strconfdropdatabase'] = 'Est&#224; segur de voler eliminar la base de dades &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de dades eliminada.';
	$lang['strdatabasedroppedbad'] = 'No s\'ha pogut eliminar la base de dades.';
	$lang['strentersql'] = 'Entri la sent&#232;ncia SQL per executar a sota:';
	$lang['strsqlexecuted'] = 'SQL executat.';
	$lang['strvacuumgood'] = 'Vacuum completat.';
	$lang['strvacuumbad'] = 'Vacuum ha fallat.';
	$lang['stranalyzegood'] = 'Analyze completat.';
	$lang['stranalyzebad'] = 'Analyze ha fallat.';
	$lang['strreindexgood'] = 'Reindex completat.';
	$lang['strreindexbad'] = 'Reindex ha fallat.';
	$lang['strfull'] = 'Ple';
	$lang['strfreeze'] = 'Congelat';
	$lang['strforce'] = 'For&#231;a';
	$lang['strsignalsent'] = 'Senyal enviat.';
	$lang['strsignalsentbad'] = 'L\'enviament del senyal ha fallat.';
	$lang['strallobjects'] = 'Tots els objectes';
	$lang['strdatabasealtered'] = 'Base de dades modificada.';
	$lang['strdatabasealteredbad'] = 'No s\'ha pogut modificar la base de dades.';
	$lang['strspecifydatabasetodrop'] = 'Ha d\'especificar almenys una base de dades per eliminar.';
        $lang['strtemplatedb']  =  'Plantilla';
        $lang['strconfanalyzedatabase']  =  'Est&#224; segur de voler un analyze de totes les taules de la base de dades &quot;%s&quot;?';
        $lang['strconfvacuumdatabase']  =  'Est&#224; segur de voler un vacuum de totes les taules de la base de dades &quot;%s&quot;?';
        $lang['strconfreindexdatabase']  =  'Est&#224; segur de voler un reindex de totes les taules de la base de dades &quot;%s&quot;?';
        $lang['strconfclusterdatabase']  =  'Est&#224; segur de voler un cl&#250;ster de totes les taules de la base de dades &quot;%s&quot;?';

	// Views
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Vistes';
	$lang['strshowallviews'] = 'Mostra totes les vistes';
	$lang['strnoview'] = 'No s\'ha trobat la vista.';
	$lang['strnoviews'] = 'No s\'han trobat vistes.';
	$lang['strcreateview'] = 'Crea una vista';
	$lang['strviewname'] = 'Nom de la vista';
	$lang['strviewneedsname'] = 'Ha d\'anomenar la vista.';
	$lang['strviewneedsdef'] = 'Ha de donar una definici&#243; a la vista.';
	$lang['strviewneedsfields'] = 'Ha de seleccionar les columnes de la vista.';
	$lang['strviewcreated'] = 'Vista creada.';
	$lang['strviewcreatedbad'] = 'No s\'ha pogut crear la vista.';
	$lang['strconfdropview'] = 'Est&#224; segur de voler eliminar la vista &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'No s\'ha pogut eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualitzada.';
	$lang['strviewupdatedbad'] = 'No s\'ha pogut actualitzar la vista.';
	$lang['strviewlink'] = 'Enlla&#231;ant claus';
	$lang['strviewconditions'] = 'Condicions addicionals';
	$lang['strcreateviewwiz'] = 'Crea una vista amb l\'assistent';
	$lang['strrenamedupfields'] = 'Reanomena els camps duplicats';
	$lang['strdropdupfields'] = 'Elimina els camps duplicats';
	$lang['strerrordupfields'] = 'Error en els camps duplicats';
	$lang['strviewaltered'] = 'Vista modificada.';
	$lang['strviewalteredbad'] = 'No s\'ha pogut modificar la vista.';
	$lang['strspecifyviewtodrop'] = 'Ha d\'especificar almenys una vista per eliminar.';

	// Sequences
	$lang['strsequence'] = 'Seq&#252;&#232;ncia';
	$lang['strsequences'] = 'Seq&#252;&#232;ncies';
	$lang['strshowallsequences'] = 'Mostra totes les seq&#252;&#232;ncies';
	$lang['strnosequence'] = 'No s\'ha trobat la seq&#252;encia.';
	$lang['strnosequences'] = 'No s\'han trobat seq&#252;encies.';
	$lang['strcreatesequence'] = 'Crea una seq&#252;&#232;ncia';
	$lang['strlastvalue'] = '&#218;ltim valor';
	$lang['strincrementby'] = 'Incrementar en';	
	$lang['strstartvalue'] = 'Valor inicial';
        $lang['strrestartvalue']  =  'Valor al reiniciar';
	$lang['strmaxvalue'] = 'Valor m&#224;xim';
	$lang['strminvalue'] = 'Valor m&#237;nim';
	$lang['strcachevalue'] = 'Valor de cache';
	$lang['strlogcount'] = 'Compte del registre';
	$lang['strcancycle'] = 'Pot completar un cicle?';
	$lang['striscalled'] = 'Vol incrementar l\&#250;ltim valor abans de retornar el seg&#252;ent valor (is_called)?';
	$lang['strsequenceneedsname'] = 'Ha d\'especificar un nom per la seq&#252;&#232;ncia.';
	$lang['strsequencecreated'] = 'Seq&#252;&#232;ncia creada.';
	$lang['strsequencecreatedbad'] = 'No s\'ha pogut crear la seq&#252;&#232;ncia.'; 
	$lang['strconfdropsequence'] = 'Est&#224; segur de voler eliminar la seq&#252;&#232;ncia &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Seq&#252;&#232;ncia eliminada.';
	$lang['strsequencedroppedbad'] = 'No s\'ha pogut eliminar la seq&#252;&#232;ncia.';
        $lang['strsequencerestart']  =  'Seq&#252;&#232;ncia reiniciada.';
        $lang['strsequencerestartbad']  =  'No s\'ha pogut reiniciar la seq&#252;&#232;ncia.';
	$lang['strsequencereset'] = 'Seq&#252;&#232;ncia reiniciada.';
	$lang['strsequenceresetbad'] = 'No s\'ha pogut reiniciar la seq&#252;&#232;ncia.'; 
 	$lang['strsequencealtered'] = 'Seq&#252;&#232;ncia modificada.';
 	$lang['strsequencealteredbad'] = 'No s\'ha pogut modificar la seq&#252;&#232;ncia.';
 	$lang['strsetval'] = 'Fixa el valor';
 	$lang['strsequencesetval'] = 'Valor de la seq&#252;&#232;ncia fixat.';
 	$lang['strsequencesetvalbad'] = 'No s\'ha pogut fixar el valor de la seq&#252;encia.';
 	$lang['strnextval'] = 'Valor incremental';
 	$lang['strsequencenextval'] = 'Seq&#252;&#232;ncia incrementada.';
 	$lang['strsequencenextvalbad'] = 'No s\'ha pogut incrementar la seq&#252;&#232;ncia.';
	$lang['strspecifysequencetodrop'] = 'Ha d\'especificar almenys una seq&#252;&#232;ncia per eliminar.';

	// Indexes
	$lang['strindex'] = '&#205;ndex';
	$lang['strindexes'] = '&#205;ndexs';
	$lang['strindexname'] = 'Nom de l\'&#237;ndex';
	$lang['strshowallindexes'] = 'Mostra tots els &#237;ndexs';
	$lang['strnoindex'] = 'No s\'ha trobat l\'&#237;ndex';
	$lang['strnoindexes'] = 'No s\'han trobat &#237;ndexs.';
	$lang['strcreateindex'] = 'Crea un &#237;ndex';
	$lang['strtabname'] = 'Nom de la pestanya';
	$lang['strcolumnname'] = 'Nom de la columna';
	$lang['strindexneedsname'] = 'Ha d\'anomenar l\'&#237;ndex.';
	$lang['strindexneedscols'] = 'Els &#237;ndexs requereixen un n&#250;mero v&#224;lid de columnes.';
	$lang['strindexcreated'] = '&#205;ndex creat';
	$lang['strindexcreatedbad'] = 'No s\'ha pogut crear l\'&#237;ndex.';
	$lang['strconfdropindex'] = 'Est&#224; segur de voler eliminar l\'&#237;ndex &quot;%s&quot;?';
	$lang['strindexdropped'] = '&#205;ndex eliminat.';
	$lang['strindexdroppedbad'] = 'No s\'ha pogut eliminar l\'&#237;ndex.';
	$lang['strkeyname'] = 'Nom de la clau';
	$lang['struniquekey'] = 'Clau &#250;nica';
	$lang['strprimarykey'] = 'Clau prim&#224;ria';
 	$lang['strindextype'] = 'Tipus d\'&#237;ndex';
	$lang['strtablecolumnlist'] = 'Columnes a la taula';
	$lang['strindexcolumnlist'] = 'Columnes a l\'&#237;ndex';
	$lang['strclusteredgood'] = 'Cl&#250;ster completat.';
	$lang['strclusteredbad'] = 'No s\'ha pogut crear el cl&#250;ster.';
        $lang['strconcurrently']  =  'Actualment';
        $lang['strnoclusteravailable']  =  'No hi ha el cl&#250;ster disponible en l\'&#237;ndex.';

	// Rules
	$lang['strrules'] = 'Regles';
	$lang['strrule'] = 'Regla';
	$lang['strshowallrules'] = 'Mostra totes les regles';
	$lang['strnorule'] = 'No s\'ha trobat la regla.';
	$lang['strnorules'] = 'No s\'han trobat regles.';
	$lang['strcreaterule'] = 'Crea una regla';
	$lang['strrulename'] = 'Nom de la regla';
	$lang['strruleneedsname'] = 'Ha d\'especificar un nom per la regla';
	$lang['strrulecreated'] = 'Regla creada.';
	$lang['strrulecreatedbad'] = 'No s\'ha pogut crear la regla.';
	$lang['strconfdroprule'] = 'Est&#224; segur de voler eliminar la regla &quot;%s&quot; a &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regla eliminada.';
	$lang['strruledroppedbad'] = 'No s\'ha pogut eliminar la regla.';

	// Constraints
	$lang['strconstraint'] = 'Restricci&#243;';
	$lang['strconstraints'] = 'Restriccions';
	$lang['strshowallconstraints'] = 'Mostra totes les restriccions';
	$lang['strnoconstraints'] = 'No s\'han trobat restriccions.';
	$lang['strcreateconstraint'] = 'Crea una restricci&#243;';
	$lang['strconstraintcreated'] = 'Restricci&#243; creada.';
	$lang['strconstraintcreatedbad'] = 'No s\'ha pogut crear la restricci&#243;.';
	$lang['strconfdropconstraint'] = 'Est&#224; segur de voler eliminar la restricci&#243; &quot;%s&quot; de &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Restricci&#243; eliminada.';
	$lang['strconstraintdroppedbad'] = 'No s\'ha pogut eliminar la restricci&#243;.';
	$lang['straddcheck'] = 'Agrega un control';
	$lang['strcheckneedsdefinition'] = 'La restricci&#243; de control necessita una definici&#243;.';
	$lang['strcheckadded'] = 'Restricci&#243; de control agregada.';
	$lang['strcheckaddedbad'] = 'No s\'ha pogut agregar la restricci&#243; de control.';
	$lang['straddpk'] = 'Agrega una clau prim&#224;ria';
	$lang['strpkneedscols'] = 'La clau prim&#224;ria requereix almenys una columna.';
	$lang['strpkadded'] = 'Clau prim&#224;ria agregada.';
	$lang['strpkaddedbad'] = 'No s\'ha pogut agregar la clau prim&#224;ria.';
	$lang['stradduniq'] = 'Agrega una clau &#250;nica';
	$lang['struniqneedscols'] = 'La clau &#250;nica requereix almenys una columna.';
	$lang['struniqadded'] = 'Clau &#250;nica agregada.';
	$lang['struniqaddedbad'] = 'No s\'ha pogut agregar la clau &#250;nica.';
	$lang['straddfk'] = 'Agrega una clau externa';
	$lang['strfkneedscols'] = 'La clau externa requereix almenys una columna.';
	$lang['strfkneedstarget'] = 'La clau externa requereix una taula de refer&#232;ncia.';
	$lang['strfkadded'] = 'Clau externa agregada.';
	$lang['strfkaddedbad'] = 'No s\'ha pogut agregar la clau externa.';
	$lang['strfktarget'] = 'Taula de dest&#237;';
	$lang['strfkcolumnlist'] = 'Columnes a la clau';
	$lang['strondelete'] = 'A L\'ELIMINAR';
	$lang['stronupdate'] = 'A L\'ACTUALITZAR';

	// Functions
	$lang['strfunction'] = 'Funci&#243;';
	$lang['strfunctions'] = 'Funcions';
	$lang['strshowallfunctions'] = 'Mostra totes les funcions';
	$lang['strnofunction'] = 'No s\'ha trobat la funci&#243;.';
	$lang['strnofunctions'] = 'No s\'han trobat funcions';
	$lang['strcreateplfunction'] = 'Crea una funci&#243; SQL/PL';
	$lang['strcreateinternalfunction'] = 'Crea una funci&#243; interna';
	$lang['strcreatecfunction'] = 'Crea una funci&#243; C';
	$lang['strfunctionname'] = 'Nom de la funci&#243;';
	$lang['strreturns'] = 'Retorna';
	$lang['strproglanguage'] = 'Llenguatge de programaci&#243;';
	$lang['strfunctionneedsname'] = 'Ha de donar un nom a la funci&#243;.';
	$lang['strfunctionneedsdef'] = 'Ha de donar una definici&#243; a la funci&#243;.';
	$lang['strfunctioncreated'] = 'Funci&#243; creada.';
	$lang['strfunctioncreatedbad'] = 'No s\'ha pogut crear la funci&#243;.';
	$lang['strconfdropfunction'] = 'Est&#224; segur de voler eliminar la funci&#243; &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funci&#243; eliminada.';
	$lang['strfunctiondroppedbad'] = 'No s\'ha pogut eliminar la funci&#243;.';
	$lang['strfunctionupdated'] = 'Funci&#243; actualitzada.';
	$lang['strfunctionupdatedbad'] = 'No s\'ha pogut actualitzar la funci&#243;.';
	$lang['strobjectfile'] = 'Fitxer objecte';
	$lang['strlinksymbol'] = 'Enlla&#231; simb&#242;lic';
	$lang['strarguments'] = 'Arguments';
	$lang['strargmode'] = 'Mode';
	$lang['strargtype'] = 'Tipus';
	$lang['strargadd'] = 'Afegeix un altre argument';
	$lang['strargremove'] = 'Elimina aquest argument';
	$lang['strargnoargs'] = 'Aquesta funci&#243; no tindr&#224; arguments.';
	$lang['strargenableargs'] = 'Habilita els arguments passats a aquesta funci&#243;.';
	$lang['strargnorowabove'] = 'Hi ha d\'haver una fila sobre aquesta fila.';
	$lang['strargnorowbelow'] = 'Hi ha d\'haver una fila sota aquesta fila.';
	$lang['strargraise'] = 'Mou amunt.';
	$lang['strarglower'] = 'Mou avall.';
	$lang['strargremoveconfirm'] = 'Est&#224; segur de voler eliminar aquest argument? Aix&#242; NO es pot desfer.';
	$lang['strfunctioncosting'] = 'Funci&#243; de Cost';
	$lang['strresultrows'] = 'Files Resultants';
	$lang['strexecutioncost'] = 'Cost de l\'Execuci&#243;';
	$lang['strspecifyfunctiontodrop'] = 'Ha d\'especificar almenys una funci&#243; per eliminar.';

	// Triggers
	$lang['strtrigger'] = 'Disparador';
	$lang['strtriggers'] = 'Disparadors';
	$lang['strshowalltriggers'] = 'Mostrar tots els disparadors';
	$lang['strnotrigger'] = 'No s\'ha trobat el disparador.';
	$lang['strnotriggers'] = 'No s\'han trobat disparadors.';
	$lang['strcreatetrigger'] = 'Crea un disparador';
	$lang['strtriggerneedsname'] = 'Ha de donar un nom al disparador.';
	$lang['strtriggerneedsfunc'] = 'Ha d\'especificar una funci&#243; pel disparador.';
	$lang['strtriggercreated'] = 'Disparador creat.';
	$lang['strtriggercreatedbad'] = 'No s\'ha pogut crear el disparador.';
	$lang['strconfdroptrigger'] = 'Est&#224; segur de voler eliminar el disparador &quot;%s&quot; de &quot;%s&quot;?';
	$lang['strconfenabletrigger'] = 'Est&#224; segur de voler habilitar el disparador &quot;%s&quot; a &quot;%s&quot;?';
	$lang['strconfdisabletrigger'] = 'Est&#224; segur de voler inhabilitar el disparador &quot;%s&quot; a &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Disparador eliminat.';
	$lang['strtriggerdroppedbad'] = 'No s\'ha pogut eliminar el disparador.';
	$lang['strtriggerenabled'] = 'Disparador habilitat.';
	$lang['strtriggerenabledbad'] = 'No s\'ha pogut habilitar el disparador.';
	$lang['strtriggerdisabled'] = 'Disparador inhabilitat.';
	$lang['strtriggerdisabledbad'] = 'No s\'ha pogut inhabilitar el disparador.';
	$lang['strtriggeraltered'] = 'Disparador modificat.';
	$lang['strtriggeralteredbad'] = 'No s\'ha pogut modificar el disparador.';
	$lang['strforeach'] = 'Per cada';

	// Types
	$lang['strtype'] = 'Tipus';
	$lang['strtypes'] = 'Tipus';
	$lang['strshowalltypes'] = 'Mostrar tots els tipus';
	$lang['strnotype'] = 'No s\'ha trobat el tipus.';
	$lang['strnotypes'] = 'No s\'han trobat els tipus.';
	$lang['strcreatetype'] = 'Crea un tipus';
	$lang['strcreatecomptype'] = 'Crea un tipus compost';
	$lang['strcreateenumtype'] = 'Crea un tipus d\'enumeraci&#243;';
	$lang['strtypeneedsfield'] = 'Ha d\'especificar almenys un camp.';
	$lang['strtypeneedsvalue'] = 'Ha d\'especificar almenys un valor.';
	$lang['strtypeneedscols'] = 'Ha d\'especificar un n&#250;mero v&#224;lid de camps.';	
	$lang['strtypeneedsvals'] = 'Ha d\'especificar un n&#250;mero v&#224;lid de valors.';
	$lang['strinputfn'] = 'Funci&#243; d\'entrada';
	$lang['stroutputfn'] = 'Funci&#243; de sortida';
	$lang['strpassbyval'] = 'Passat per valor?';
	$lang['stralignment'] = 'Alineament';
	$lang['strelement'] = 'Element';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Emmagatzemament';
	$lang['strfield'] = 'Camp';
	$lang['strnumfields'] = 'Num. de camps';
	$lang['strnumvalues'] = 'Num. de valors';
	$lang['strtypeneedsname'] = 'Ha de donar un nom al tipus.';
	$lang['strtypeneedslen'] = 'Ha de donar una longitud al tipus.';
	$lang['strtypecreated'] = 'Tipus creat';
	$lang['strtypecreatedbad'] = 'No s\'ha pogut crear el tipus.';
	$lang['strconfdroptype'] = 'Est&#224; segur de voler eliminar el tipus &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Tipus eliminat.';
	$lang['strtypedroppedbad'] = 'No s\'ha pogut eliminar el tipus.';
	$lang['strflavor'] = 'Varietat';
	$lang['strbasetype'] = 'Base';
	$lang['strcompositetype'] = 'Compost';
	$lang['strpseudotype'] = 'Pseudo';
	$lang['strenum'] = 'Enumeraci&#243;';
	$lang['strenumvalues'] = 'Valors de l\'enumeraci&#243;';

	// Schemas
	$lang['strschema'] = 'Esquema';
	$lang['strschemas'] = 'Esquemes';
	$lang['strshowallschemas'] = 'Mostra tots els esquemes';
	$lang['strnoschema'] = 'No s\'ha trobat l\'esquema.';
	$lang['strnoschemas'] = 'No s\'han trobat esquemes.';
	$lang['strcreateschema'] = 'Crea un esquema';
	$lang['strschemaname'] = 'Nom de l\'esquema';
	$lang['strschemaneedsname'] = 'Ha d\'anomenar l\'esquema.';
	$lang['strschemacreated'] = 'Esquema creat';
	$lang['strschemacreatedbad'] = 'No s\'ha pogut crear l\'esquema.';
	$lang['strconfdropschema'] = 'Est&#224; segur de voler eliminar l\'esquema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Esquema eliminat.';
	$lang['strschemadroppedbad'] = 'No s\'ha pogut eliminar l\'esquema.';
	$lang['strschemaaltered'] = 'Esquema modificat.';
	$lang['strschemaalteredbad'] = 'No s\'ha pogut modificar l\'esquema.';
	$lang['strsearchpath'] = 'Cam&#237; de cerca de l\'esquema';
	$lang['strspecifyschematodrop'] = 'Ha d\especificar almenys un esquema per eliminar.';

	// Reports
	$lang['strreport'] = 'Report';
	$lang['strreports'] = 'Reports';
	$lang['strshowallreports'] = 'Mostra tots els reports';
	$lang['strnoreports'] = 'No s\'han trobat reports';
	$lang['strcreatereport'] = 'Crea un report';
	$lang['strreportdropped'] = 'Report eliminat.';
	$lang['strreportdroppedbad'] = 'No s\'ha pogut eliminar el report.';
	$lang['strconfdropreport'] = 'Est&#224; segur de voler eliminar el report &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Ha de donar un nom al report.';
	$lang['strreportneedsdef'] = 'Ha de donar un SQL al report.';
	$lang['strreportcreated'] = 'Report desat.';
	$lang['strreportcreatedbad'] = 'No s\'ha pogut desar el report.';

	// Domains
	$lang['strdomain'] = 'Domini';
	$lang['strdomains'] = 'Dominis';
	$lang['strshowalldomains'] = 'Mostrar tots els dominis';
	$lang['strnodomains'] = 'No s\'han trobat dominis.';
	$lang['strcreatedomain'] = 'Crea un domini';
	$lang['strdomaindropped'] = 'Domini eliminat.';
	$lang['strdomaindroppedbad'] = 'No s\'ha pogut eliminar el domini.';
	$lang['strconfdropdomain'] = 'Est&#224; segur de voler eliminar el domini &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Ha d\'anomenar el domini.';
	$lang['strdomaincreated'] = 'Domini creat.';
	$lang['strdomaincreatedbad'] = 'No s\'ha pogut crear el domini.';	
	$lang['strdomainaltered'] = 'Domini modificat.';
	$lang['strdomainalteredbad'] = 'No s\'ha pogut modificar el domini.';	

	// Operators
	$lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadors';
	$lang['strshowalloperators'] = 'Mostra tots els operadors';
	$lang['strnooperator'] = 'No s\'ha trobat l\'operador.';
	$lang['strnooperators'] = 'No s\'han trobat operadors.';
	$lang['strcreateoperator'] = 'Crea un operador';
	$lang['strleftarg'] = 'Tipus de l\'arg. esquerre';
	$lang['strrightarg'] = 'Tipus de l\'arg. dret';
	$lang['strcommutator'] = 'Commutador';
	$lang['strnegator'] = 'Negaci&#243;';
	$lang['strrestrict'] = 'Restringeix';
	$lang['strjoin'] = 'Unieix';
	$lang['strhashes'] = 'Hash';
	$lang['strmerges'] = 'Fussiona';
	$lang['strleftsort'] = 'Sort esquerre';
	$lang['strrightsort'] = 'Sort dret';
	$lang['strlessthan'] = 'Menor que';
	$lang['strgreaterthan'] = 'Major que';
	$lang['stroperatorneedsname'] = 'Ha d\'anomenar l\'operador.';
	$lang['stroperatorcreated'] = 'Operador creat';
	$lang['stroperatorcreatedbad'] = 'No s\'ha pogut crear l\'operador.';
	$lang['strconfdropoperator'] = 'Est&#224; segur de voler eliminar l\'operador &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operador eliminat.';
	$lang['stroperatordroppedbad'] = 'No s\'ha pogut eliminar l\'operador.';

	// Casts
	$lang['strcasts'] = 'Conversi&#243; de tipus';
	$lang['strnocasts'] = 'No s\'han trobat conversions.';
	$lang['strsourcetype'] = 'Tipus inicial';
	$lang['strtargettype'] = 'Tipus final';
	$lang['strimplicit'] = 'Impl&#237;cit';
	$lang['strinassignment'] = 'En assignaci&#243;';
	$lang['strbinarycompat'] = '(Compatible amb binari)';
	
	// Conversions
	$lang['strconversions'] = 'Conversions';
	$lang['strnoconversions'] = 'No s\'han trobat conversions.';
	$lang['strsourceencoding'] = 'Codificaci&#243; inicial';
	$lang['strtargetencoding'] = 'Codificaci&#243; final';
	
	// Languages
	$lang['strlanguages'] = 'Llenguatges';
	$lang['strnolanguages'] = 'No s\'han trobat llenguatges.';
	$lang['strtrusted'] = 'Fiable';
	
	// Info
	$lang['strnoinfo'] = 'No hi ha informaci&#243; disponible.';
	$lang['strreferringtables'] = 'Referent a les taules';
	$lang['strparenttables'] = 'Taules pare';
	$lang['strchildtables'] = 'Taules fill';
	
	// Aggregates
	$lang['straggregate'] = 'Agregat';
	$lang['straggregates'] = 'Agregats';
	$lang['strnoaggregates'] = 'No s\'han trobat agregats';
	$lang['stralltypes'] = '(Tots els tipus)';
	$lang['strcreateaggregate'] = 'Crea un agregat';
	$lang['straggrbasetype'] = 'Tipus de dades d\'entrada';
	$lang['straggrsfunc'] = 'Funci&#243; de la transici&#243; de l\'estat';
	$lang['straggrstype'] = 'Tipus de dades pel valor de l\'estat';
	$lang['straggrffunc'] = 'Funci&#243; final';
	$lang['straggrinitcond'] = 'Condici&#243; inicial';
	$lang['straggrsortop'] = 'Operador ordre';
	$lang['strconfdropaggregate'] = 'Est&#224; segur de voler elimnar l\'agregat \'%s\'?';
	$lang['straggregatedropped'] = 'Agregat eliminat.';
	$lang['straggregatedroppedbad'] = 'No s\'ha pogut eliminar l\'agregat.';
	$lang['straggraltered'] = 'Agregat modificat.';
	$lang['straggralteredbad'] = 'No s\'ha pogut modificar l\'agregat.';
	$lang['straggrneedsname'] = 'Ha d\'especificar un nom per l\'agregat';
	$lang['straggrneedsbasetype'] = 'Ha d\'especificar el tipus de dades d\'entrada per l\'agregat';
	$lang['straggrneedssfunc'] = 'Ha d\'especificar el nom de la funci&#243; de transici&#243; de l\'estat per l\'agregat';
	$lang['straggrneedsstype'] = 'Ha d\'especificar el tipus de dades pel valor de l\'estat de l\'agregat';
	$lang['straggrcreated'] = 'Agregat creat.';
	$lang['straggrcreatedbad'] = 'No s\'ha pogut crear l\agregat.';
	$lang['straggrshowall'] = 'Mostra tots els agregats';

	// Operator Classes
	$lang['stropclasses'] = 'Classes d\'operadors';
	$lang['strnoopclasses'] = 'No s\'han trobat classes d\'operadors.';
	$lang['straccessmethod'] = 'M&#232;tode d\'acc&#233;s';

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
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespaces';
	$lang['strshowalltablespaces'] = 'Mostrar tots els tablespaces';
	$lang['strnotablespaces'] = 'No s\'han trobat tablespaces';
	$lang['strcreatetablespace'] = 'Crea un tablespace';
	$lang['strlocation'] = 'Localitzaci&#243;';
	$lang['strtablespaceneedsname'] = 'Ha de donar un nom al tablespace.';
	$lang['strtablespaceneedsloc'] = 'Ha de donar un directori on crear el tablespace.';
	$lang['strtablespacecreated'] = 'Tablespace creat.';
	$lang['strtablespacecreatedbad'] = 'No s\'ha pogut crear el Tablespace.';
	$lang['strconfdroptablespace'] = 'Est&#224; segur de voler eliminar el tablespace &quot;%s&quot;?';
	$lang['strtablespacedropped'] = 'Tablespace eliminat.';
	$lang['strtablespacedroppedbad'] = 'No s\'ha pogut eliminar el tablespace.';
	$lang['strtablespacealtered'] = 'Tablespace modificat.';
	$lang['strtablespacealteredbad'] = 'No s\'ha pogut modifcar el tablespace.';

	// Slony clusters
	$lang['strcluster'] = 'Cl&#250;ster';
	$lang['strnoclusters'] = 'No s\'han trobat cl&#250;sters';
	$lang['strconfdropcluster'] = 'Est&#224; segur de voler eliminar el cl&#250;ster &quot;%s&quot;?';
	$lang['strclusterdropped'] = 'Cl&#250;ster eliminat.';
	$lang['strclusterdroppedbad'] = 'No s\'ha pogut eliminar el cl&#250;ster.';
	$lang['strinitcluster'] = 'Inicialitza el cl&#250;ster';
	$lang['strclustercreated'] = 'Cl&#250;ster inicialitzat.';
	$lang['strclustercreatedbad'] = 'No s\'ha pogut inicialitzar el cl&#250;ster.';
	$lang['strclusterneedsname'] = 'Ha de donar un nom al cl&#250;ster.';
	$lang['strclusterneedsnodeid'] = 'Ha de donar una ID al node local.';
	
	// Slony nodes
	$lang['strnodes'] = 'Nodes';
	$lang['strnonodes'] = 'No s\'han trobat nodes.';
	$lang['strcreatenode'] = 'Crea un node';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Activa';
	$lang['strnodecreated'] = 'Node creat.';
	$lang['strnodecreatedbad'] = 'No s\'ha pogut crear el node.';
	$lang['strconfdropnode'] = 'Est&#224; segur de voler eliminar el node &quot;%s&quot;?';
	$lang['strnodedropped'] = 'Node eliminat.';
	$lang['strnodedroppedbad'] = 'No s\'ha pogut eliminar el node';
	$lang['strfailover'] = 'Filtra';
	$lang['strnodefailedover'] = 'Node filtrat.';
	$lang['strnodefailedoverbad'] = 'No s\'ha pogut filtrar el node.';
	$lang['strstatus'] = 'Estat';	
	$lang['strhealthy'] = 'Saludable';
	$lang['stroutofsync'] = 'Fora de sincronisme';
	$lang['strunknown'] = 'Desconegut';	
	
	// Slony paths	
	$lang['strpaths'] = 'Rutes';
	$lang['strnopaths'] = 'No s\'han trobat rutes.';
	$lang['strcreatepath'] = 'Crea una ruta';
	$lang['strnodename'] = 'Nom del node';
	$lang['strnodeid'] = 'ID del node';
	$lang['strconninfo'] = 'Cadena de connexi&#243;';
	$lang['strconnretry'] = 'Segons abans de reintentar la connexi&#243;';
	$lang['strpathneedsconninfo'] = 'Ha de donar una cadena de connexi&#243; per a la ruta.';
	$lang['strpathneedsconnretry'] = 'Ha de donar el num. de seg. d\'espera abans de reintentar la connexi&#243;.';
	$lang['strpathcreated'] = 'Ruta creada.';
	$lang['strpathcreatedbad'] = 'La creaci&#243; de la ruta ha fallat.';
	$lang['strconfdroppath'] = 'Est&#224; segur de voler eliminar la ruta &quot;%s&quot;?';
	$lang['strpathdropped'] = 'Ruta eliminada.';
	$lang['strpathdroppedbad'] = 'No s\ha pogut eliminar la ruta.';

	// Slony listens
	$lang['strlistens'] = 'Escoltes';
	$lang['strnolistens'] = 'No s\'han trobat escoltes.';
	$lang['strcreatelisten'] = 'Crea una escolta';
	$lang['strlistencreated'] = 'Escolta creada.';
	$lang['strlistencreatedbad'] = 'La creaci&#243; de l\'escolta ha fallat.';
	$lang['strconfdroplisten'] = 'Est&#224; segur de voler eliminar l\'escolta &quot;%s&quot;?';
	$lang['strlistendropped'] = 'Escolta eliminada.';
	$lang['strlistendroppedbad'] = 'No s\'ha pogut eliminar l\'escolta.';

	// Slony replication sets
	$lang['strrepsets'] = 'Conjunts de replicaci&#243;';
	$lang['strnorepsets'] = 'No s\'han trobat conjunts de replicaci&#243;.';
	$lang['strcreaterepset'] = 'Crea un conjunt de replicaci&#243;';
	$lang['strrepsetcreated'] = 'Conjunt de replicaci&#243; creat.';
	$lang['strrepsetcreatedbad'] = 'No s\'ha pogut crear el conjunt de replicaci&#243;.';
	$lang['strconfdroprepset'] = 'Est&#224; segur de voler eliminar el conjunt de replicaci&#243; &quot;%s&quot;?';
	$lang['strrepsetdropped'] = 'Conjunt de replicaci&#243; eliminat.';
	$lang['strrepsetdroppedbad'] = 'No s\'ha pogut eliminar el conjunt de replicaci&#243;.';
	$lang['strmerge'] = 'Uneix';
	$lang['strmergeinto'] = 'Uneix a';
	$lang['strrepsetmerged'] = 'Conjunts de replicaci&#243; units.';
	$lang['strrepsetmergedbad'] = 'No s\'han pogut unir els conjunts de replicaci&#243;.';
	$lang['strmove'] = 'Mou';
	$lang['strneworigin'] = 'Nou origen';
	$lang['strrepsetmoved'] = 'Conjunt de replicaci&#243; traslladat.';
	$lang['strrepsetmovedbad'] = 'No s\'ha pogut traslladar el conjunt de replicaci&#243;.';
	$lang['strnewrepset'] = 'Nou conjunt de replicaci&#243;';
	$lang['strlock'] = 'Bloqueja';
	$lang['strlocked'] = 'Bloquejat';
	$lang['strunlock'] = 'Desbloqueja';
	$lang['strconflockrepset'] = 'Est&#224; segur de voler bloquejar el conjunt de replicaci&#243; &quot;%s&quot;?';
	$lang['strrepsetlocked'] = 'Conjunt de replicaci&#243; bloquejat.';
	$lang['strrepsetlockedbad'] = 'No s\'ha pogut bloquejar el conjunt de replicaci&#243;.';
	$lang['strconfunlockrepset'] = 'Est&#224; segur de voler desbloquejar el conjunt de replicaci&#243; &quot;%s&quot;?';
	$lang['strrepsetunlocked'] = 'Conjunt de replicaci&#243; desbloquejat.';
	$lang['strrepsetunlockedbad'] = 'No s\'ha pogut desbloquejar el conjunt de replicaci&#243;.';
	$lang['stronlyonnode'] = 'Nom&#233;s en el node';
	$lang['strddlscript'] = 'Script DDL';
	$lang['strscriptneedsbody'] = 'Ha de subministrar un script per ser executat a tots els nodes.';
	$lang['strscriptexecuted'] = 'Script DDL del conjunt de replicaci&#243; executat.';
	$lang['strscriptexecutedbad'] = 'Fallada executant l\'script DDL del conjunt de replicaci&#243;.';
	$lang['strtabletriggerstoretain'] = 'Els seg&#252;ents disparadors NO seran inhabilitats per l\'Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Afegeix una taula';
	$lang['strtableneedsuniquekey'] = 'La taula que s\'ha d\'afegir requereix una clau prim&#224;ria o &#250;nica.';
	$lang['strtableaddedtorepset'] = 'Taula afegida al conjunt de replicaci&#243;.';
	$lang['strtableaddedtorepsetbad'] = 'No s\'ha pogut afegir la taula al conjunt de replicaci&#243;.';
	$lang['strconfremovetablefromrepset'] = 'Est&#224; segur de voler eliminar la taula &quot;%s&quot; del conjunt de replicaci&#243; &quot;%s&quot;?';
	$lang['strtableremovedfromrepset'] = 'Taula eliminada del conjunt de replicaci&#243;.';
	$lang['strtableremovedfromrepsetbad'] = 'No s\'ha pogut eliminar la taula del conjunt de replicaci&#243;.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Afegeix una seq&#252;&#232;ncia';
	$lang['strsequenceaddedtorepset'] = 'Seq&#252;&#232;ncia afegida al conjunt de replicaci&#243;.';
	$lang['strsequenceaddedtorepsetbad'] = 'No s\'ha pogut afegir la seq&#252;&#232;ncia al conjunt de replicaci&#243;.';
	$lang['strconfremovesequencefromrepset'] = 'Est&#224; segur de voler eliminar la seq&#252;&#232;ncia &quot;%s&quot; del conjunt de replicaci&#243; &quot;%s&quot;?';
	$lang['strsequenceremovedfromrepset'] = 'Seq&#252;&#232;ncia eliminada del conjunt de replicaci&#243;.';
	$lang['strsequenceremovedfromrepsetbad'] = 'No s\'ha pogut eliminar la seq&#252;&#232;ncia del conjunt de replicaci&#243;.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Subscripcions';
	$lang['strnosubscriptions'] = 'No s\'han trobat subscripcions.';

	// Miscellaneous
	$lang['strtopbar'] = '%s corrent a %s:%s -- Ha entrat com a usuari &quot;%s&quot;';
	$lang['strtimefmt'] = 'jS M, Y g:iA';
	$lang['strhelp'] = 'Ajuda';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Cercador de p&#224;gines d\'ajuda';
	$lang['strselecthelppage'] = 'Selecciona una p&#224;gina d\'ajuda';
	$lang['strinvalidhelppage'] = 'P&#224;gina d\'ajuda inv&#224;lida.';
	$lang['strlogintitle'] = 'Entrar a %s';
	$lang['strlogoutmsg'] = 'Sortir de %s';
	$lang['strloading'] = 'Carregant...';
	$lang['strerrorloading'] = 'Error Carregant';
	$lang['strclicktoreload'] = 'Clicar per recarregar';

	// Autovacuum
	$lang['strautovacuum'] = 'Autovacuum'; 
	$lang['strturnedon'] = 'Activat'; 
	$lang['strturnedoff'] = 'Desactivat'; 
	$lang['strenabled'] = 'Habilitat'; 
        $lang['strnovacuumconf']  =  'No s\'ha trobat la configuraci&#243; de l\'autovacuum.';
	$lang['strvacuumbasethreshold'] = 'Llindar Base del Vacuum'; 
	$lang['strvacuumscalefactor'] = 'Factor d\'Escala del Vacuum';  
	$lang['stranalybasethreshold'] = 'Llindar Base de l\'Analyze';  
	$lang['stranalyzescalefactor'] = 'Factor d\'Escala de l\'Analyze'; 
	$lang['strvacuumcostdelay'] = 'Cost del Retard del Vacuum'; 
	$lang['strvacuumcostlimit'] = 'L&#237;mit de Cost del Vacuum';  
        $lang['strvacuumpertable']  =  'Configuraci&#243; de l\'autovacuum per taula';
        $lang['straddvacuumtable']  =  'Afegeix la configuraci&#243; de l\'autovacuum per una taula';
        $lang['streditvacuumtable']  =  'Edita la configuraci&#243; de l\'autovacuum de la taula %s';
        $lang['strdelvacuumtable']  =  'Vol eliminar la configuraci&#243; de l\'autovacuum de la taula %s ?';
        $lang['strvacuumtablereset']  =  'S\'ha inicialitzat la configuraci&#243; de l\'autovacuum de la taula %s als valors per defecte';
        $lang['strdelvacuumtablefail']  =  'No s\'ha pogut eliminar la configuraci&#243; de l\'autovacuum de la taula %s';
        $lang['strsetvacuumtablesaved']  =  'Configuraci&#243; de l\'autovacuum de la taula %s desada.';
        $lang['strsetvacuumtablefail']  =  'Ha fallat la configuraci&#243; de l\'autovacuum de la taula %s.';
        $lang['strspecifydelvacuumtable']  =  'Ha d\'especificar la taula d\'on vol eliminar els par&#224;metres de l\'autovacuum.';
        $lang['strspecifyeditvacuumtable']  =  'Ha d\'especificar la taula d\'on vol editar els par&#224;metres de l\'autovacuum.';
        $lang['strnotdefaultinred']  =  'Els par&#224;metres no per defecte en vermell.';

	// Table-level Locks
	$lang['strlocks'] = 'Bloquejos';
	$lang['strtransaction'] = 'ID de la Transacci&#243;';
	$lang['strvirtualtransaction'] = 'ID de la Transacci&#243; Virtual';
	$lang['strprocessid'] = 'ID del Proc&#233;s';
	$lang['strmode'] = 'Mode de Bloqueig';
	$lang['strislockheld'] = 'S\'aguanta el bloqueig?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Transaccions preparades';
	$lang['strxactid'] = 'ID de la Transacci&#243;';
	$lang['strgid'] = 'ID Global';
	
	// Fulltext search
	$lang['strfulltext'] = 'Cerca del Text Completa (FTS)';
	$lang['strftsconfig'] = 'Configuraci&#243; FTS';
	$lang['strftsconfigs'] = 'Configuracions';
	$lang['strftscreateconfig'] = 'Crea una configuraci&#243; FTS';
	$lang['strftscreatedict'] = 'Crea un diccionari';
	$lang['strftscreatedicttemplate'] = 'Crea una plantilla d\'un diccionari';
	$lang['strftscreateparser'] = 'Crea un analitzador';
	$lang['strftsnoconfigs'] = 'No s\'ha trobat cap configuraci&#243; FTS.';
	$lang['strftsconfigdropped'] = 'Configuraci&#243; FTS eliminada.';
	$lang['strftsconfigdroppedbad'] = 'No s\'ha pogut eliminar la configuraci&#243; FTS.';
	$lang['strconfdropftsconfig'] = 'Est&#224; segur de voler eliminar la configuraci&#243; FTS &quot;%s&quot;?';
	$lang['strconfdropftsdict'] = 'Est&#224; segur de voler eliminar el diccionari FTS &quot;%s&quot;?';
	$lang['strconfdropftsmapping'] = 'Est&#224; segur de voler eliminar el tra&#231;at &quot;%s&quot; de la configuraci&#243; FTS &quot;%s&quot;?';
	$lang['strftstemplate'] = 'Plantilla';
	$lang['strftsparser'] = 'Analitzador';
	$lang['strftsconfigneedsname'] = 'Ha de donar un nom a la configuraci&#243; FTS.';
	$lang['strftsconfigcreated'] = 'Configuraci&#243; FTS creada.';
	$lang['strftsconfigcreatedbad'] = 'No s\'ha pogut crear la configuraci&#243; FTS.';
	$lang['strftsmapping'] = 'Tra&#231;at';
	$lang['strftsdicts'] = 'Diccionaris';
	$lang['strftsdict'] = 'Diccionari';
	$lang['strftsemptymap'] = 'Mapa de la configuraci&#243; FTS buida.';
	$lang['strftsconfigaltered'] = 'Configuraci&#243; FTS modificada.';
	$lang['strftsconfigalteredbad'] = 'No s\'ha pogut modificar la configuraci&#243; FTS.';
	$lang['strftsconfigmap'] = 'Mapa de la configuraci&#243; FTS';
	$lang['strftsparsers'] = 'Analitzadors FTS';
	$lang['strftsnoparsers'] = 'No hi ha analitzadors FTS disponibles.';
	$lang['strftsnodicts'] = 'No hi ha diccionaris FTS disponibles.';
	$lang['strftsdictcreated'] = 'Diccionari FTS creat.';
	$lang['strftsdictcreatedbad'] = 'No s\ha pogut crear el diccionari FTS.';
	$lang['strftslexize'] = 'Lexize';
	$lang['strftsinit'] = 'Inicialitzador';
	$lang['strftsoptionsvalues'] = 'Opcions i valors';
	$lang['strftsdictneedsname'] = 'Ha de donar un nom al diccionari FTS.';
	$lang['strftsdictdropped'] = 'Diccionari FTS eliminat.';
	$lang['strftsdictdroppedbad'] = 'No s\'ha pogut eliminar el diccionari FTS.';
	$lang['strftsdictaltered'] = 'Diccionari FTS modificat.';
	$lang['strftsdictalteredbad'] = 'No s\'ha pogut modificar el diccionari FTS.';
	$lang['strftsaddmapping'] = 'Afegeix un nou tra&#231;at';
	$lang['strftsspecifymappingtodrop'] = 'Ha d\'especificar almenys un tra&#231;at per eliminar.';
	$lang['strftsspecifyconfigtoalter'] = 'Ha d\'especificar la configuraci&#243; FTS per modificar';
	$lang['strftsmappingdropped'] = 'Tra&#231;at FTS eliminat.';
	$lang['strftsmappingdroppedbad'] = 'No s\'ha pogut eliminar el tra&#231;at FTS.';
	$lang['strftsnodictionaries'] = 'No s\'han trobat diccionaris.';
	$lang['strftsmappingaltered'] = 'Tra&#231;at FTS modificat.';
	$lang['strftsmappingalteredbad'] = 'No s\'ha pogut modificar el tra&#231;at FTS.';
	$lang['strftsmappingadded'] = 'Tra&#231;at FTS afegit.';
	$lang['strftsmappingaddedbad'] = 'No s\'ha pogut afegir el tra&#231;at FTS.';
	$lang['strftstabconfigs'] = 'Configuracions';
	$lang['strftstabdicts'] = 'Diccionaris';
	$lang['strftstabparsers'] = 'Analitzadors';
	$lang['strftscantparsercopy'] = 'No es pot especificar alhora un analitzador i una plantilla durant la creaci&#243; de la configuraci&#243; de la cerca de text.';
?>
