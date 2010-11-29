<?php

	/**
	 * Galician language file for phpPgAdmin.
	 * Traduci&#243;n ao galego do phpPgAdmin.
	 *
	 * Maintainer:
	 * Mantedor:
	 *	Adri&#225;n Chaves Fern&#225;ndez (Gallaecio) &lt;adriyetichaves@gmail.com&gt;
	 *	Proxecto Trasno, &lt;proxecto@trasno.net&gt;.
	 *
	 *
	 *	Comentarios sobre a traduci&#243;n:
	 *	- Escolleuse &#171;eliminar&#187; como traduci&#243;n para &#8220;drop&#8221;, e &#171;borrar&#187; como traduci&#243;n para
	 *	&#8220;delete&#8221;.
	 *	- Fix&#233;ronse certas escollas de vocabulario: &#8220;vacuum&#8221; &#8594; &#171;aspirado&#187;, &#8220;cluster&#8221; &#8594;
	 *	&#171;contentrado&#187;.
	 *
	 */

	// Language and character set
	$lang['applang'] = 'Galego';
	$lang['appcharset'] = 'UTF-8';
	$lang['applocale'] = 'gl_ES';
	$lang['appdbencoding'] = 'UNICODE';
	$lang['applangdir'] = 'ltr';

	// Welcome
	$lang['strintro'] = 'Benvida ou benvido ao phpPgAdmin.';
	$lang['strppahome'] = 'Sitio web do phpPgAdmin';
	$lang['strpgsqlhome'] = 'Sitio web de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentaci&#243;n de PostgreSQL (local)';
	$lang['strreportbug'] = 'Informar dun erro';
	$lang['strviewfaq'] = 'Ver as preguntas m&#225;is frecuentes en li&#241;a';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Identificarse';
	$lang['strloginfailed'] = 'Non se puido levar a cabo a identificaci&#243;n.';
	$lang['strlogindisallowed'] = 'A identificaci&#243;n est&#225; desactivada por motivos de seguridade.';
	$lang['strserver'] = 'Servidor';
	$lang['strservers'] = 'Servidores';
	$lang['strgroupservers'] = 'Servidores no grupo &#171;%s&#187;';
	$lang['strallservers'] = 'Todos os servidores';
	$lang['strintroduction'] = 'Introduci&#243;n';
	$lang['strhost'] = 'Enderezo IP';
	$lang['strport'] = 'Porto';
	$lang['strlogout'] = 'Sa&#237;r';
	$lang['strowner'] = 'Propietario';
	$lang['straction'] = 'Acci&#243;n';
	$lang['stractions'] = 'Acci&#243;ns';
	$lang['strname'] = 'Nome';
	$lang['strdefinition'] = 'Definici&#243;n';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Navegar';
	$lang['strenable'] = 'Activar';
	$lang['strdisable'] = 'Desactivar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminada';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'Non nulo';
	$lang['strprev'] = '&lt; Anterior';
	$lang['strnext'] = 'Seguinte &gt;';
	$lang['strfirst'] = '&#171; Principio';
	$lang['strlast'] = 'Final &#187;';
	$lang['strfailed'] = 'Fallou';
	$lang['strcreate'] = 'Crear';
	$lang['strcreated'] = 'Creada';
	$lang['strcomment'] = 'Comentario';
	$lang['strlength'] = 'Lonxitude';
	$lang['strdefault'] = 'Predeterminado';
	$lang['stralter'] = 'Cambiar';
	$lang['strok'] = 'Aceptar';
	$lang['strcancel'] = 'Cancelar';
	$lang['strkill'] = 'Matar';
	$lang['strac'] = 'Activar o completado autom&#225;tico';
	$lang['strsave'] = 'Gardar';
	$lang['strreset'] = 'Restablecer';
	$lang['strrestart'] = 'Reiniciar';
	$lang['strinsert'] = 'Inserir';
	$lang['strselect'] = 'Seleccionar';
	$lang['strdelete'] = 'Borrar';
	$lang['strupdate'] = 'Actualizar';
	$lang['strreferences'] = 'Fai referencia a';
	$lang['stryes'] = 'Si';
	$lang['strno'] = 'Non';
	$lang['strtrue'] = 'CERTO';
	$lang['strfalse'] = 'FALSO';
	$lang['stredit'] = 'Editar';
	$lang['strcolumn'] = 'Columna';
	$lang['strcolumns'] = 'Columnas';
	$lang['strrows'] = 'fila(s)';
	$lang['strrowsaff'] = 'fila(s) afectadas.';
	$lang['strobjects'] = 'obxecto(s)';
	$lang['strback'] = 'Volver';
	$lang['strqueryresults'] = 'Resultados da consulta';
	$lang['strshow'] = 'Amosar';
	$lang['strempty'] = 'Baleiro';
	$lang['strlanguage'] = 'Lingua';
	$lang['strencoding'] = 'Codificaci&#243;n';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = '&#218;nico';
	$lang['strprimary'] = 'Primario';
	$lang['strexport'] = 'Exportar';
	$lang['strimport'] = 'Importar';
	$lang['strallowednulls'] = 'Permitir valores nulos';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Cadea ou campo baleiro';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Administraci&#243;n';
	$lang['strvacuum'] = 'Aspirar';
	$lang['stranalyze'] = 'Analizar';
	$lang['strclusterindex'] = 'Concentrar';
	$lang['strclustered'] = 'Concentrada?';
	$lang['strreindex'] = 'Indexar';
	$lang['strexecute'] = 'Executar';
	$lang['stradd'] = 'Engadir';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'Onde';
	$lang['strinstead'] = 'En vez de iso';
	$lang['strwhen'] = 'Cando';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Datos';
	$lang['strconfirm'] = 'Confirmar';
	$lang['strexpression'] = 'Expresi&#243;n';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ': ';
	$lang['strexpand'] = 'Expandir';
	$lang['strcollapse'] = 'Colapsar';
	$lang['strfind'] = 'Buscar';
	$lang['stroptions'] = 'Opci&#243;ns';
	$lang['strrefresh'] = 'Actualizar';
	$lang['strdownload'] = 'Descargar';
	$lang['strdownloadgzipped'] = 'Descargar comprimida con gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avanzado';
	$lang['strvariables'] = 'Variables';
	$lang['strprocess'] = 'Proceso';
	$lang['strprocesses'] = 'Procesos';
	$lang['strsetting'] = 'Configuraci&#243;n';
	$lang['streditsql'] = 'Editar SQL';
	$lang['strruntime'] = 'Tempo total funcionando: %s ms';
	$lang['strpaginate'] = 'Amosar os resultados por p&#225;xinas';
	$lang['struploadscript'] = 'ou cargue un gui&#243;n en SQL:';
	$lang['strstarttime'] = 'Hora de inicio';
	$lang['strfile'] = 'Ficheiro';
	$lang['strfileimported'] = 'Importouse o ficheiro.';
	$lang['strtrycred'] = 'Utilizar estas credenciais para todos os servidores';
	$lang['strconfdropcred'] = 'Por motivos de seguridade, ao desconectarse destruirase a informaci&#243;n compartida sobre a s&#250;a identidade. Est&#225; seguro de que quere desconectarse?';
	$lang['stractionsonmultiplelines'] = 'Acci&#243;ns en varias li&#241;as';
	$lang['strselectall'] = 'Marcar todo';
	$lang['strunselectall'] = 'Desmarcar todo';
	$lang['strlocale'] = 'Configuraci&#243;n rexional';
	$lang['strcollation'] = 'Recompilaci&#243;n';
	$lang['strctype'] = 'Tipo de car&#225;cter';
	$lang['strdefaultvalues'] = 'Valores predeterminados';
	$lang['strnewvalues'] = 'Valores novos';
	$lang['strstart'] = 'Iniciar';
	$lang['strstop'] = 'Deter';
	$lang['strgotoppage'] = 'Volver arriba';
	$lang['strtheme'] = 'Tema visual';

	// Admin
	$lang['stradminondatabase'] = 'As seguintes tarefas administrativas realizaranse en toda a base de datos &#171;%s&#187;.';
	$lang['stradminontable'] = 'As seguintes tarefas administrativas realizaranse na t&#225;boa &#171;%s&#187;.';

	// User-supplied SQL history
	$lang['strhistory'] = 'Historial';
	$lang['strnohistory'] = 'Sen historial.';
	$lang['strclearhistory'] = 'Borrar o historial';
	$lang['strdelhistory'] = 'Borrar do historial';
	$lang['strconfdelhistory'] = 'Seguro que quere borrar esta solicitude do historial?';
	$lang['strconfclearhistory'] = 'Seguro que quere borrar o historial?';
	$lang['strnodatabaseselected'] = 'Escolla unha base de datos.';

	// Database sizes
	$lang['strnoaccess'] = 'Sen acceso';
	$lang['strsize'] = 'Tama&#241;o';
	$lang['strbytes'] = 'bytes';
	$lang['strkb'] = 'kiB';
	$lang['strmb'] = 'MiB';
	$lang['strgb'] = 'GiB';
	$lang['strtb'] = 'TiB';

	// Error handling
	$lang['strnoframes'] = 'Este aplicativo funciona mellor nos navegadores que permiten o uso de marcos, pero pode usalo sen eles premendo na ligaz&#243;n que hai m&#225;is abaixo.';
	$lang['strnoframeslink'] = 'Utilizar sen marcos';
	$lang['strbadconfig'] = 'O seu ficheiro de configuraci&#243;n &#171;config.inc.php&#187; est&#225; obsoleto. Ter&#225; que volvelo crear a partires do novo ficheiro &#171;config.inc.php-dist&#187;.';
	$lang['strnotloaded'] = 'A s&#250;a instalaci&#243;n de PHP non est&#225; preparada para utilizar PostgreSQL. Ter&#225; que compilar PHP de novo utilizando a opci&#243;n de configuraci&#243;n &#171;--with-pgsql&#187;.';
	$lang['strpostgresqlversionnotsupported'] = 'Este aplicativo non &#233; compatible coa versi&#243;n de PostgreSQL que est&#225; a usar. Actual&#237;ceo &#225; versi&#243;n %s ou outra versi&#243;n posterior.';
	$lang['strbadschema'] = 'O esquema especificado non era correcto.';
	$lang['strbadencoding'] = 'Non se deu establecida a codificaci&#243;n do cliente na base de datos.';
	$lang['strsqlerror'] = 'Erro de SQL:';
	$lang['strinstatement'] = 'Na instruci&#243;n:';
	$lang['strinvalidparam'] = 'Os par&#225;metros fornecidos ao gui&#243;n non son correctos.';
	$lang['strnodata'] = 'Non se atopou fila algunha.';
	$lang['strnoobjects'] = 'Non se atopou obxecto alg&#250;n.';
	$lang['strrownotunique'] = 'Esta fila non ten ning&#250;n identificador &#250;nico.';
	$lang['strnoreportsdb'] = 'Non creou a base de datos de informes. Lea o ficheiro &#187;INSTALL&#187; (en ingl&#233;s) para m&#225;is informaci&#243;n.';
	$lang['strnouploads'] = 'A carga de ficheiros est&#225; desactivada.';
	$lang['strimporterror'] = 'Produciuse un erro ao importar.';
	$lang['strimporterror-fileformat'] = 'Produciuse un erro ao importar: non se puido determinar de maneira autom&#225;tica o formato do ficheiro.';
	$lang['strimporterrorline'] = 'Produciuse un erro ao importar, na li&#241;a %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Produciuse un erro ao importar, na li&#241;a %s: a li&#241;a non ten unha cantidade de columnas axeitada.';
	$lang['strimporterror-uploadedfile'] = 'Produciuse un erro ao importar: non se puido cargar o ficheiro no servidor.';
	$lang['strcannotdumponwindows'] = 'O envorcado de t&#225;boas complexas e mais nomes de esquemas non pode efectuarse en sistemas Microsoft Windows.';
	$lang['strinvalidserverparam'] = 'Produciuse un intento de conexi&#243;n cun servidor non permitido como par&#225;metro, &#233; posible que algu&#233;n estea intentando atacar o seu sistema.'; 
	$lang['strnoserversupplied'] = 'Non se forneceu ning&#250;n servidor!';
	$lang['strbadpgdumppath'] = 'Produciuse un erro ao exportar: non se conseguiu executar pg_dump (a ruta indicada no seu ficheiro &#171;conf/config.inc.php&#187; &#233; &#171;%s&#187;). Cambie a ruta no ficheiro de configuraci&#243;n e volva intentalo.';
	$lang['strbadpgdumpallpath'] = 'Produciuse un erro ao exportar: non se conseguiu executar pg_dumpall (a ruta indicada no seu ficheiro &#171;conf/config.inc.php&#187; &#233; &#171;%s&#187;). Cambie a ruta no ficheiro de configuraci&#243;n e volva intentalo.';
	$lang['strconnectionfail'] = 'Non se puido establecer a conexi&#243;n co servidor.';

	// Tables
	$lang['strtable'] = 'T&#225;boa';
	$lang['strtables'] = 'T&#225;boas';
	$lang['strshowalltables'] = 'Amosar todas as t&#225;boas';
	$lang['strnotables'] = 'Non se atopou t&#225;boa algunha.';
	$lang['strnotable'] = 'Non se atopou t&#225;boa algunha.';
	$lang['strcreatetable'] = 'Crear unha t&#225;boa';
	$lang['strcreatetablelike'] = 'Crear unha t&#225;boa coma';
	$lang['strcreatetablelikeparent'] = 'T&#225;boa orixinal';
	$lang['strcreatelikewithdefaults'] = 'INCLU&#205;R OS VALORES PREDETERMINADOS';
	$lang['strcreatelikewithconstraints'] = 'INCLU&#205;R AS RESTRICI&#211;NS';
	$lang['strcreatelikewithindexes'] = 'INCLU&#205;R OS &#205;NDICES';
	$lang['strtablename'] = 'Nome da t&#225;boa';
	$lang['strtableneedsname'] = 'Debe fornecer un nome para a t&#225;boa.';
	$lang['strtablelikeneedslike'] = 'Debe fornecer unha t&#225;boa &#225; que copiarlle as propiedades.';
	$lang['strtableneedsfield'] = 'Debe indicar polo menos un campo.';
	$lang['strtableneedscols'] = 'Debe indicar un n&#250;mero de columnas correcto.';
	$lang['strtablecreated'] = 'Creouse a t&#225;boa.';
	$lang['strtablecreatedbad'] = 'Non se conseguiu crear a t&#225;boa.';
	$lang['strconfdroptable'] = 'Est&#225; seguro de que quere eliminar a t&#225;boa &#171;%s&#187;?';
	$lang['strtabledropped'] = 'Eliminouse a t&#225;boa.';
	$lang['strtabledroppedbad'] = 'Non se conseguiu eliminar a t&#225;boa.';
	$lang['strconfemptytable'] = 'Est&#225; seguro de que quere baleirar a t&#225;boa &#171;%s&#187;?';
	$lang['strtableemptied'] = 'Baleirouse a t&#225;boa.';
	$lang['strtableemptiedbad'] = 'Non se conseguiu baleirar a t&#225;boa.';
	$lang['strinsertrow'] = 'Inserir unha fila';
	$lang['strrowinserted'] = 'Inseriuse unha fila.';
	$lang['strrowinsertedbad'] = 'Non se conseguiu inserir a fila.';
	$lang['strnofkref'] = 'Non existe ning&#250;n valor que coincida na clave externa &#171;%s&#187;.';
	$lang['strrowduplicate'] = 'Non se conseguiu inserir a fila, intentouse facer unha inxecci&#243;n duplicada.';
	$lang['streditrow'] = 'Modificar a fila';
	$lang['strrowupdated'] = 'Actualizouse a fila.';
	$lang['strrowupdatedbad'] = 'Non se conseguiu actualizar a fila.';
	$lang['strdeleterow'] = 'Borrar a fila';
	$lang['strconfdeleterow'] = 'Est&#225; seguro de que quere borrar esta fila?';
	$lang['strrowdeleted'] = 'Borrouse a fila.';
	$lang['strrowdeletedbad'] = 'Non se conseguiu borrar a fila.';
	$lang['strinsertandrepeat'] = 'Inserir e repetir';
	$lang['strnumcols'] = 'N&#250;mero de columnas';
	$lang['strcolneedsname'] = 'Debe especificar un nome para a columna';
	$lang['strselectallfields'] = 'Marcar todos os campos';
	$lang['strselectneedscol'] = 'Debe amosar polo menos unha columna.';
	$lang['strselectunary'] = 'Os operadores dun s&#243; operando non poden ter valores.';
	$lang['strcolumnaltered'] = 'Modificouse a columna.';
	$lang['strcolumnalteredbad'] = 'Non se conseguiu modificar a columna.';
	$lang['strconfdropcolumn'] = 'Est&#225; seguro de que quere eliminar a columna &#171;%s&#187; da t&#225;boa &#171;%s&#187;?';
	$lang['strcolumndropped'] = 'Eliminouse a columna.';
	$lang['strcolumndroppedbad'] = 'Non se conseguiu eliminar a columna.';
	$lang['straddcolumn'] = 'Engadir unha columna';
	$lang['strcolumnadded'] = 'Engadiuse a columna.';
	$lang['strcolumnaddedbad'] = 'Non se conseguiu engadir a columna.';
	$lang['strcascade'] = 'EN CASCADA';
	$lang['strtablealtered'] = 'Modificouse a t&#225;boa.';
	$lang['strtablealteredbad'] = 'Non se conseguiu modificar a t&#225;boa.';
	$lang['strdataonly'] = 'S&#243; datos';
	$lang['strstructureonly'] = 'S&#243; estrutura';
	$lang['strstructureanddata'] = 'Estrutura e datos';
	$lang['strtabbed'] = 'Tabulado';
	$lang['strauto'] = 'Detectar';
	$lang['strconfvacuumtable'] = 'Est&#225; seguro de que quere aspirar &#171;%s&#187;?';
	$lang['strconfanalyzetable'] = 'Est&#225; seguro de que quere analizar &#171;%s&#187;?';
	$lang['strconfreindextable'] = 'Est&#225; seguro de que quere indexar &#171;%s&#187;?';
	$lang['strconfclustertable'] = 'Est&#225; seguro de que quere concentrar &#171;%s&#187;?';
	$lang['strestimatedrowcount'] = 'N&#250;mero estimado de filas';
	$lang['strspecifytabletoanalyze'] = 'Debe especificar polo menos unha t&#225;boa a analizar.';
	$lang['strspecifytabletoempty'] = 'Debe especificar polo menos unha t&#225;boa a baleirar.';
	$lang['strspecifytabletodrop'] = 'Debe especificar polo menos unha t&#225;boa a eliminar.';
	$lang['strspecifytabletovacuum'] = 'Debe especificar polo menos unha t&#225;boa a aspirar.';
	$lang['strspecifytabletoreindex'] = 'Debe especificar polo menos unha t&#225;boa a indexar.';
	$lang['strspecifytabletocluster'] = 'Debe especificar polo menos unha t&#225;boa a concentrar.';
	$lang['strnofieldsforinsert'] = 'Non pode inserir filas nunha t&#225;boa sen columnas.';

	// Columns
	$lang['strcolprop'] = 'Propiedades da columna';
	$lang['strnotableprovided'] = 'Non se forneceu ningunha t&#225;boa!';

	// Users
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nome';
	$lang['strpassword'] = 'Contrasinal';
	$lang['strsuper'] = 'Administrador?';
	$lang['strcreatedb'] = 'Crear bases de datos?';
	$lang['strexpires'] = 'Caducidade';
	$lang['strsessiondefaults'] = 'Valores predeterminados da sesi&#243;n';
	$lang['strnousers'] = 'Non se atopou ning&#250;n usuario.';
	$lang['struserupdated'] = 'Actualizouse o usuario.';
	$lang['struserupdatedbad'] = 'Non se conseguiu actualizar o usuario.';
	$lang['strshowallusers'] = 'Listar todos os usuarios';
	$lang['strcreateuser'] = 'Crear un usuario';
	$lang['struserneedsname'] = 'Debe fornecer un nome para o usuario.';
	$lang['strusercreated'] = 'Creouse o usuario.';
	$lang['strusercreatedbad'] = 'Non se conseguiu crear o usuario.';
	$lang['strconfdropuser'] = 'Est&#225; seguro de que quere eliminar o usuario &#171;%s&#187;?';
	$lang['struserdropped'] = 'Eliminouse o usuario.';
	$lang['struserdroppedbad'] = 'Non se conseguiu eliminar o usuario.';
	$lang['straccount'] = 'Conta';
	$lang['strchangepassword'] = 'Cambiar de contrasinal';
	$lang['strpasswordchanged'] = 'Cambiouse o contrasinal.';
	$lang['strpasswordchangedbad'] = 'Non se conseguiu cambiar o contrasinal.';
	$lang['strpasswordshort'] = 'O contrasinal &#233; curto de m&#225;is.';
	$lang['strpasswordconfirm'] = 'Os contrasinais introducidos son distintos.';

	// Groups
	$lang['strgroup'] = 'Grupo';
	$lang['strgroups'] = 'Grupos';
	$lang['strshowallgroups'] = 'Amosar todos os grupos';
	$lang['strnogroup'] = 'Non se atopou o grupo.';
	$lang['strnogroups'] = 'Non se atopou grupo alg&#250;n.';
	$lang['strcreategroup'] = 'Crear un grupo';
	$lang['strgroupneedsname'] = 'Debe fornecer un nome para o grupo.';
	$lang['strgroupcreated'] = 'Creouse o grupo.';
	$lang['strgroupcreatedbad'] = 'Non se conseguiu crear o grupo.';
	$lang['strconfdropgroup'] = 'est&#225; seguro de que quere eliminar o grupo &#171;%s&#187;?';
	$lang['strgroupdropped'] = 'Eliminouse o grupo.';
	$lang['strgroupdroppedbad'] = 'Non se conseguiu eliminar o grupo.';
	$lang['strmembers'] = 'Membros';
	$lang['strmemberof'] = 'Membros de';
	$lang['stradminmembers'] = 'Membros administradores';
	$lang['straddmember'] = 'Engadir un membro';
	$lang['strmemberadded'] = 'Engadiuse o membro.';
	$lang['strmemberaddedbad'] = 'Non se conseguiu engadir o membro.';
	$lang['strdropmember'] = 'Eliminar o membro';
	$lang['strconfdropmember'] = 'Est&#225; seguro de que quere eliminar o membro &#171;%s&#187; do grupo &#171;%s&#187;?';
	$lang['strmemberdropped'] = 'Eliminouse o membro.';
	$lang['strmemberdroppedbad'] = 'Non se conseguiu eliminar o membro.';

	// Roles
	$lang['strrole'] = 'Rol';
	$lang['strroles'] = 'Roles';
	$lang['strshowallroles'] = 'Amosar todos os roles';
	$lang['strnoroles'] = 'Non se atopou rol alg&#250;n.';
	$lang['strinheritsprivs'] = 'Herdar os privilexios?';
	$lang['strcreaterole'] = 'Crear un rol';
	$lang['strcancreaterole'] = 'Pode crear roles?';
	$lang['strrolecreated'] = 'Creouse o rol.';
	$lang['strrolecreatedbad'] = 'Non se conseguiu crear o rol.';
	$lang['strrolealtered'] = 'Modificouse o rol.';
	$lang['strrolealteredbad'] = 'Non se conseguiu modificar o rol.';
	$lang['strcanlogin'] = 'Pode identificarse?';
	$lang['strconnlimit'] = 'L&#237;mite da conexi&#243;n';
	$lang['strdroprole'] = 'Eliminar o rol';
	$lang['strconfdroprole'] = 'Est&#225; seguro de que quere eliminar o rol &#171;%s&#187;?';
	$lang['strroledropped'] = 'Eliminouse o rol.';
	$lang['strroledroppedbad'] = 'Non se conseguiu eliminar o rol.';
	$lang['strnolimit'] = 'Sen l&#237;mite';
	$lang['strnever'] = 'Nunca';
	$lang['strroleneedsname'] = 'Ten que darlle un nome ao rol.';

	// Privileges
	$lang['strprivilege'] = 'Privilexio';
	$lang['strprivileges'] = 'Privilexios';
	$lang['strnoprivileges'] = 'Este obxecto ten os privilexios predeterminados do propietario.';
	$lang['strgrant'] = 'Conceder';
	$lang['strrevoke'] = 'Revogar';
	$lang['strgranted'] = 'Cambi&#225;ronse os privilexios.';
	$lang['strgrantfailed'] = 'Non se conseguiu cambiar os privilexios.';
	$lang['strgrantbad'] = 'Ten que especificar polo menos un usuario ou grupo e un privilexio.';
	$lang['strgrantor'] = 'Autor da concesi&#243;n';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Base de datos';
	$lang['strdatabases'] = 'Bases de datos';
	$lang['strshowalldatabases'] = 'Amosar todas as bases de datos';
	$lang['strnodatabases'] = 'Non se atopou base de datos algunha.';
	$lang['strcreatedatabase'] = 'Crear unha base de datos';
	$lang['strdatabasename'] = 'Nome da base de datos';
	$lang['strdatabaseneedsname'] = 'Debe darlle un nome &#225; base de datos.';
	$lang['strdatabasecreated'] = 'Creouse a base de datos.';
	$lang['strdatabasecreatedbad'] = 'Non se conseguiu crear a base de datos.';
	$lang['strconfdropdatabase'] = 'Est&#225; seguro de que quere eliminar a base de datos &#171;%s&#187;?';
	$lang['strdatabasedropped'] = 'Eliminouse a base de datos.';
	$lang['strdatabasedroppedbad'] = 'Non se conseguiu eliminar a base de datos.';
	$lang['strentersql'] = 'Introduza a continuaci&#243;n as instruci&#243;ns SQL a executar:';
	$lang['strsqlexecuted'] = 'Execut&#225;ronse as instruci&#243;ns SQL.';
	$lang['strvacuumgood'] = 'Completouse o aspirado.';
	$lang['strvacuumbad'] = 'Non se conseguiu efectuar o aspirado.';
	$lang['stranalyzegood'] = 'Completouse a an&#225;lise.';
	$lang['stranalyzebad'] = 'Non se conseguiu completar a an&#225;lise.';
	$lang['strreindexgood'] = 'Completouse o indexado.';
	$lang['strreindexbad'] = 'Non se conseguiu completar o indexado.';
	$lang['strfull'] = 'Completo';
	$lang['strfreeze'] = 'Agresivo';
	$lang['strforce'] = 'Forzar';
	$lang['strsignalsent'] = 'Enviouse o sinal.';
	$lang['strsignalsentbad'] = 'Non se conseguiu enviar o sinal.';
	$lang['strallobjects'] = 'Todos os obxectos';
	$lang['strdatabasealtered'] = 'Modificouse a base de datos.';
	$lang['strdatabasealteredbad'] = 'Non se conseguiu modificar a base de datos.';
	$lang['strspecifydatabasetodrop'] = 'Debe especificar polo menos unha base de datos a eliminar.';
	$lang['strtemplatedb'] = 'Modelo';
	$lang['strconfanalyzedatabase'] = 'Est&#225; seguro de que quere analizar todas as t&#225;boas da base de datos &#171;%s&#187;?';
	$lang['strconfvacuumdatabase'] = 'Est&#225; seguro de que quere aspirar todas as t&#225;boas da base de datos &#171;%s&#187;?';
	$lang['strconfreindexdatabase'] = 'Est&#225; seguro de que quere indexar todas as t&#225;boas da base de datos &#171;%s&#187;?';
	$lang['strconfclusterdatabase'] = 'Est&#225; seguro de que quere concentrar todas as t&#225;boas da base de datos &#171;%s&#187;?';

	// Views
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Vistas';
	$lang['strshowallviews'] = 'Listar todas as vistas';
	$lang['strnoview'] = 'Non se atopou vista algunha.';
	$lang['strnoviews'] = 'Non se atopou vista algunha.';
	$lang['strcreateview'] = 'Crear unha vista';
	$lang['strviewname'] = 'Nome da vista';
	$lang['strviewneedsname'] = 'Debe fornecer un nome para a vista.';
	$lang['strviewneedsdef'] = 'Debe fornecer unha descrici&#243;n da vista.';
	$lang['strviewneedsfields'] = 'Debe indicar que columnas quere ter na vista.';
	$lang['strviewcreated'] = 'Creouse a vista.';
	$lang['strviewcreatedbad'] = 'Non se conseguiu crear a vista.';
	$lang['strconfdropview'] = 'Est&#225; seguro de que quere eliminar a vista &#171;%s&#187;?';
	$lang['strviewdropped'] = 'Eliminouse a vista.';
	$lang['strviewdroppedbad'] = 'Non se conseguiu eliminar a vista.';
	$lang['strviewupdated'] = 'Actualizouse a vista.';
	$lang['strviewupdatedbad'] = 'Non se conseguiu actualizar a vista.';
	$lang['strviewlink'] = 'Uni&#243;n de claves';
	$lang['strviewconditions'] = 'Condici&#243;ns adicionais';
	$lang['strcreateviewwiz'] = 'Crear unha vista co asistente';
	$lang['strrenamedupfields'] = 'Renomear os campos duplicados';
	$lang['strdropdupfields'] = 'Eliminar os campos duplicados';
	$lang['strerrordupfields'] = 'Non permitir que haxa campos duplicados';
	$lang['strviewaltered'] = 'Modificouse a vista.';
	$lang['strviewalteredbad'] = 'Non se conseguiu modificar a vista.';
	$lang['strspecifyviewtodrop'] = 'Debe especificar polo menos unha vista a borrar.';

	// Sequences
	$lang['strsequence'] = 'Secuencia';
	$lang['strsequences'] = 'Secuencias';
	$lang['strshowallsequences'] = 'Amosar todas as secuencias';
	$lang['strnosequence'] = 'Non se atopou secuencia algunha.';
	$lang['strnosequences'] = 'Non se atopou secuencia algunha.';
	$lang['strcreatesequence'] = 'Crear unha secuencia';
	$lang['strlastvalue'] = '&#218;ltimo valor';
	$lang['strincrementby'] = 'Aumentar en';
	$lang['strstartvalue'] = 'Valor inicial';
	$lang['strrestartvalue'] = 'Valor do reinicio';
	$lang['strmaxvalue'] = 'Valor m&#225;ximo';
	$lang['strminvalue'] = 'Valor m&#237;nimo';
	$lang['strcachevalue'] = 'Valor da cach&#233;';
	$lang['strlogcount'] = 'Conta de rexistros';
	$lang['strcancycle'] = 'Pode repetirse?';
	$lang['striscalled'] = 'Aumentar&#225; o &#250;ltimo valor antes de devolver o seguinte (is_called)?';
	$lang['strsequenceneedsname'] = 'Debe fornecer un nome para a secuencia.';
	$lang['strsequencecreated'] = 'Creouse a secuencia.';
	$lang['strsequencecreatedbad'] = 'Non se conseguiu crear a secuencia.';
	$lang['strconfdropsequence'] = 'Est&#225; seguro de que quere eliminar a secuencia &#171;%s&#187;?';
	$lang['strsequencedropped'] = 'Eliminouse a secuencia.';
	$lang['strsequencedroppedbad'] = 'Non se conseguiu eliminar a secuencia.';
	$lang['strsequencerestart'] = 'Reiniciouse a secuencia.';
	$lang['strsequencerestartbad'] = 'Non se conseguiu reiniciar a secuencia.';
	$lang['strsequencereset'] = 'Restableceuse a secuencia.';
	$lang['strsequenceresetbad'] = 'Non se conseguiu restablecer a secuencia.';
	$lang['strsequencealtered'] = 'Modificouse a secuencia.';
	$lang['strsequencealteredbad'] = 'Non se conseguiu modificar a secuencia.';
	$lang['strsetval'] = 'Establecer o valor';
	$lang['strsequencesetval'] = 'Estableceuse o valor da secuencia.';
	$lang['strsequencesetvalbad'] = 'Non se conseguiu establecer o valor da secuencia.';
	$lang['strnextval'] = 'Aumentar o valor';
	$lang['strsequencenextval'] = 'Aumentouse o valor da secuencia.';
	$lang['strsequencenextvalbad'] = 'Non se conseguiu aumentar o valor da secuencia.';
	$lang['strspecifysequencetodrop'] = 'Debe especificar polo menos unha secuencia a eliminar.';

	// Indexes
	$lang['strindex'] = '&#205;ndice';
	$lang['strindexes'] = '&#205;ndices';
	$lang['strindexname'] = 'Nome do &#237;ndice';
	$lang['strshowallindexes'] = 'Listar todos os &#237;ndices';
	$lang['strnoindex'] = 'Non se atopou &#237;ndice alg&#250;n.';
	$lang['strnoindexes'] = 'Non se atopou &#237;ndice alg&#250;n.';
	$lang['strcreateindex'] = 'Crear un &#237;ndice';
	$lang['strtabname'] = 'Nome da lapela';
	$lang['strcolumnname'] = 'Nome da columna';
	$lang['strindexneedsname'] = 'Debe fornecer un nome para o &#237;ndice.';
	$lang['strindexneedscols'] = 'Os &#237;ndices te&#241;en que ter un n&#250;mero de columnas correcto.';
	$lang['strindexcreated'] = 'Creouse o &#237;ndice.';
	$lang['strindexcreatedbad'] = 'Non se conseguiu crear o &#237;ndice.';
	$lang['strconfdropindex'] = 'Est&#225; seguro de que quere eliminar o &#237;ndice &#171;%s&#187;?';
	$lang['strindexdropped'] = 'Eliminouse o &#237;ndice.';
	$lang['strindexdroppedbad'] = 'Non se conseguiu eliminar o &#237;ndice.';
	$lang['strkeyname'] = 'Nome da clave';
	$lang['struniquekey'] = 'Clave &#250;nica';
	$lang['strprimarykey'] = 'Clave primaria';
	$lang['strindextype'] = 'Tipo de &#237;ndice';
	$lang['strtablecolumnlist'] = 'Columnas na t&#225;boa';
	$lang['strindexcolumnlist'] = 'Columnas no &#237;ndice';
	$lang['strclusteredgood'] = 'Completouse o concentrado.';
	$lang['strclusteredbad'] = 'Non se conseguiu completar o concentrado.';
	$lang['strconcurrently'] = 'Simultaneamente';
	$lang['strnoclusteravailable'] = 'A t&#225;boa non est&#225; concentrada nun &#237;ndice.';

	// Rules
	$lang['strrules'] = 'Regras';
	$lang['strrule'] = 'Regra';
	$lang['strshowallrules'] = 'Listar todas as regras';
	$lang['strnorule'] = 'Non se atopou regra algunha.';
	$lang['strnorules'] = 'Non se atopou regra algunha.';
	$lang['strcreaterule'] = 'Crear unha regra';
	$lang['strrulename'] = 'Nome da regra';
	$lang['strruleneedsname'] = 'Debe fornecer un nome para a regra.';
	$lang['strrulecreated'] = 'Creouse a regra.';
	$lang['strrulecreatedbad'] = 'Non se conseguiu crear a regra.';
	$lang['strconfdroprule'] = 'Est&#225; seguro de que quere eliminar a regra &#171;%s&#187; en &#171;%s&#187;?';
	$lang['strruledropped'] = 'Eliminouse a regra.';
	$lang['strruledroppedbad'] = 'Non se conseguiu eliminar a regra.';

	// Constraints
	$lang['strconstraint'] = 'Restrici&#243;n';
	$lang['strconstraints'] = 'Restrici&#243;ns';
	$lang['strshowallconstraints'] = 'Listar todas as restrici&#243;ns';
	$lang['strnoconstraints'] = 'Non se atopou restrici&#243;n algunha.';
	$lang['strcreateconstraint'] = 'Crear unha restrici&#243;n';
	$lang['strconstraintcreated'] = 'Creouse a restrici&#243;n.';
	$lang['strconstraintcreatedbad'] = 'Non se conseguiu crear a restrici&#243;n.';
	$lang['strconfdropconstraint'] = 'Est&#225; seguro de que quere eliminar a restrici&#243;n &#171;%s&#187; en &#171;%s&#187;?';
	$lang['strconstraintdropped'] = 'Eliminouse a restrici&#243;n.';
	$lang['strconstraintdroppedbad'] = 'Non se conseguiu eliminar a restrici&#243;n.';
	$lang['straddcheck'] = 'Engadir unha comprobaci&#243;n';
	$lang['strcheckneedsdefinition'] = 'A comprobaci&#243;n necesita unha definici&#243;n.';
	$lang['strcheckadded'] = 'Engadiuse a comprobaci&#243;n.';
	$lang['strcheckaddedbad'] = 'Non se conseguiu engadir a comprobaci&#243;n.';
	$lang['straddpk'] = 'Engadir unha clave primaria';
	$lang['strpkneedscols'] = 'A clave primaria necesita polo menos unha columna.';
	$lang['strpkadded'] = 'Engadiuse a clave primaria.';
	$lang['strpkaddedbad'] = 'Non se conseguiu engadir a clave primaria.';
	$lang['stradduniq'] = 'Engadir unha clave &#250;nica';
	$lang['struniqneedscols'] = 'A clave &#250;nica necesita polo menos unha columna.';
	$lang['struniqadded'] = 'Engadiuse a clave &#250;nica.';
	$lang['struniqaddedbad'] = 'Non se conseguiu engadir a clave &#250;nica.';
	$lang['straddfk'] = 'Engadir unha clave externa';
	$lang['strfkneedscols'] = 'A clave externa necesita polo menos unha columna.';
	$lang['strfkneedstarget'] = 'A clave externa necesita unha t&#225;boa externa.';
	$lang['strfkadded'] = 'Engadiuse a clave externa.';
	$lang['strfkaddedbad'] = 'Non se conseguiu engadir a clave externa.';
	$lang['strfktarget'] = 'T&#225;boa externa';
	$lang['strfkcolumnlist'] = 'Columnas na clave';
	$lang['strondelete'] = 'AO ACTUALIZAR'; // Sei que son instruci&#243;ns cando se usa SQL, pero na
	$lang['stronupdate'] = 'AO BORRAR';	// interface par&#233;ceme mellor traducilos.

	// Functions
	$lang['strfunction'] = 'Funci&#243;n';
	$lang['strfunctions'] = 'Funci&#243;ns';
	$lang['strshowallfunctions'] = 'Listar todas as funci&#243;ns';
	$lang['strnofunction'] = 'Non se atopou funci&#243;n algunha.';
	$lang['strnofunctions'] = 'Non se atopou funci&#243;n algunha.';
	$lang['strcreateplfunction'] = 'Crear unha funci&#243;n SQL/PL';
	$lang['strcreateinternalfunction'] = 'Crear unha funci&#243;n interna';
	$lang['strcreatecfunction'] = 'Crear unha funci&#243;n en C';
	$lang['strfunctionname'] = 'Nome da funci&#243;n';
	$lang['strreturns'] = 'Devolve';
	$lang['strproglanguage'] = 'Linguaxe de programaci&#243;n';
	$lang['strfunctionneedsname'] = 'Debe fornecer un nome para a funci&#243;n.';
	$lang['strfunctionneedsdef'] = 'Debe fornecer unha definici&#243;n para a funci&#243;n.';
	$lang['strfunctioncreated'] = 'Creouse a funci&#243;n.';
	$lang['strfunctioncreatedbad'] = 'Non se conseguiu crear a funci&#243;n.';
	$lang['strconfdropfunction'] = 'Est&#225; seguro de que quere eliminar a funci&#243;n &#171;%s&#187;?';
	$lang['strfunctiondropped'] = 'Eliminouse a funci&#243;n.';
	$lang['strfunctiondroppedbad'] = 'Non se conseguiu eliminar a funci&#243;n.';
	$lang['strfunctionupdated'] = 'Actualizouse a funci&#243;n.';
	$lang['strfunctionupdatedbad'] = 'Non se conseguiu actualizar a funci&#243;n.';
	$lang['strobjectfile'] = 'Ficheiro de obxecto';
	$lang['strlinksymbol'] = 'S&#237;mbolo da ligaz&#243;n';
	$lang['strarguments'] = 'Argumentos';
	$lang['strargmode'] = 'Modo';
	$lang['strargtype'] = 'Tipo';
	$lang['strargadd'] = 'Engadir outro argumento';
	$lang['strargremove'] = 'Borrar este argumento';
	$lang['strargnoargs'] = 'Esta funci&#243;n non recibir&#225; argumento ning&#250;n.';
	$lang['strargenableargs'] = 'Permitir que se lle fornezan argumentos &#225; funci&#243;n.';
	$lang['strargnorowabove'] = 'Ten que haber unha fila antes desta.';
	$lang['strargnorowbelow'] = 'Ten que haber unha fila despois desta.';
	$lang['strargraise'] = 'Subir.';
	$lang['strarglower'] = 'Baixar.';
	$lang['strargremoveconfirm'] = 'Est&#225; seguro de que quere borrar este argumento? Esta acci&#243;n non se pode desfacer.';
	$lang['strfunctioncosting'] = 'Custo da funci&#243;n';
	$lang['strresultrows'] = 'Filas resultantes';
	$lang['strexecutioncost'] = 'Custo de execuci&#243;n';
	$lang['strspecifyfunctiontodrop'] = 'Debe especificar polo menos unha funci&#243;n a eliminar.';

	// Triggers
	$lang['strtrigger'] = 'Disparador';
	$lang['strtriggers'] = 'Disparadores';
	$lang['strshowalltriggers'] = 'Listar todos os disparadores';
	$lang['strnotrigger'] = 'Non se atopor disparador alg&#250;n.';
	$lang['strnotriggers'] = 'Non se atopor disparador alg&#250;n.';
	$lang['strcreatetrigger'] = 'Crear un disparador';
	$lang['strtriggerneedsname'] = 'Debe fornecer un nome para o disparador.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar unha funci&#243;n para o disparador.';
	$lang['strtriggercreated'] = 'Creouse o disparador.';
	$lang['strtriggercreatedbad'] = 'Non se conseguiu crear o disparador.';
	$lang['strconfdroptrigger'] = 'Est&#225; seguro de que quere eliminar o disparador &#171;%s&#187; en &#171;%s&#187;?';
	$lang['strconfenabletrigger'] = 'Est&#225; seguro de que quere activar o disparador &#171;%s&#187; en &#171;%s&#187;?';
	$lang['strconfdisabletrigger'] = 'Est&#225; seguro de que quere desactivar o disparador &#171;%s&#187; en &#171;%s&#187;?';
	$lang['strtriggerdropped'] = 'Eliminouse o disparador.';
	$lang['strtriggerdroppedbad'] = 'Non se conseguiu eliminar o disparador.';
	$lang['strtriggerenabled'] = 'Activouse o disparador.';
	$lang['strtriggerenabledbad'] = 'Non se conseguiu activar o disparador.';
	$lang['strtriggerdisabled'] = 'Desactivouse o disparador.';
	$lang['strtriggerdisabledbad'] = 'Non se conseguiu desactivar o disparador.';
	$lang['strtriggeraltered'] = 'Modificouse o disparador.';
	$lang['strtriggeralteredbad'] = 'Non se conseguiu modificar o disparador.';
	$lang['strforeach'] = 'Por cada'; // &#171;For each [row or instruction]&#187;

	// Types
	$lang['strtype'] = 'Tipo';
	$lang['strtypes'] = 'Tipos';
	$lang['strshowalltypes'] = 'Listar todos os tipos';
	$lang['strnotype'] = 'Non se atopou tipo alg&#250;n.';
	$lang['strnotypes'] = 'Non se atopou tipo alg&#250;n.';
	$lang['strcreatetype'] = 'Crear un tipo';
	$lang['strcreatecomptype'] = 'Crear un tipo composto';
	$lang['strcreateenumtype'] = 'Crear un tipo de enumeraci&#243;n';
	$lang['strtypeneedsfield'] = 'Debe especificar polo menos un campo.';
	$lang['strtypeneedsvalue'] = 'Debe especificar polo menos un valor.';
	$lang['strtypeneedscols'] = 'Debe especificar un n&#250;mero correcto de campos.';
	$lang['strtypeneedsvals'] = 'Debe especificar un n&#250;mero correcto de valores.';
	$lang['strinputfn'] = 'Funci&#243;n de entrada';
	$lang['stroutputfn'] = 'Funci&#243;n de sa&#237;da';
	$lang['strpassbyval'] = 'Pasado por valor?';
	$lang['stralignment'] = 'Ali&#241;aci&#243;n';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamento';
	$lang['strfield'] = 'Campo';
	$lang['strnumfields'] = 'Cantidade de campos';
	$lang['strnumvalues'] = 'Cantidade de valores';
	$lang['strtypeneedsname'] = 'Debe fornecer un nome para o tipo.';
	$lang['strtypeneedslen'] = 'Debe fornecer unha lonxitude para o tipo.';
	$lang['strtypecreated'] = 'Creouse o tipo.';
	$lang['strtypecreatedbad'] = 'Non se conseguiu crear o tipo.';
	$lang['strconfdroptype'] = 'Est&#225; seguro de que quere eliminar o tipo &#171;%s&#187;?';
	$lang['strtypedropped'] = 'Eliminouse o tipo.';
	$lang['strtypedroppedbad'] = 'Non se conseguiu eliminar o tipo.';
	$lang['strflavor'] = 'Subtipo';
	$lang['strbasetype'] = 'Base';
	$lang['strcompositetype'] = 'Composto';
	$lang['strpseudotype'] = 'Pseudo';
	$lang['strenum'] = 'Enumeraci&#243;n';
	$lang['strenumvalues'] = 'Valores da enumeraci&#243;n';

	// Schemas
	$lang['strschema'] = 'Esquema';
	$lang['strschemas'] = 'Esquemas';
	$lang['strshowallschemas'] = 'Listar todos os esquemas';
	$lang['strnoschema'] = 'Non se atopou esquema alg&#250;n.';
	$lang['strnoschemas'] = 'Non se atopou esquema alg&#250;n.';
	$lang['strcreateschema'] = 'Crear un esquema';
	$lang['strschemaname'] = 'Nome do esquema';
	$lang['strschemaneedsname'] = 'Debe fornecer un nome para o esquema.';
	$lang['strschemacreated'] = 'Creouse o esquema.';
	$lang['strschemacreatedbad'] = 'Non se conseguiu crear o esquema.';
	$lang['strconfdropschema'] = 'Est&#225; seguro de que quere eliminar o esquema &#171;%s&#187;?';
	$lang['strschemadropped'] = 'Eliminouse o esquema.';
	$lang['strschemadroppedbad'] = 'Non se conseguiu eliminar o esquema.';
	$lang['strschemaaltered'] = 'Modificouse o esquema.';
	$lang['strschemaalteredbad'] = 'Non se conseguiu modificar o esquema.';
	$lang['strsearchpath'] = 'Ruta de busca do esquema';
	$lang['strspecifyschematodrop'] = 'Debe especificar polo menos un esquema a eliminar.';

	// Reports
	$lang['strreport'] = 'Informe';
	$lang['strreports'] = 'Informes';
	$lang['strshowallreports'] = 'Listar todos os informes';
	$lang['strnoreports'] = 'Non se atopou informe alg&#250;n.';
	$lang['strcreatereport'] = 'Crear un informe';
	$lang['strreportdropped'] = 'Eliminouse o informe.';
	$lang['strreportdroppedbad'] = 'Non se conseguiu eliminar o informe.';
	$lang['strconfdropreport'] = 'Est&#225; seguro de que quere eliminar o informe &#171;%s&#187;?';
	$lang['strreportneedsname'] = 'Debe fornecer un nome para o informe.';
	$lang['strreportneedsdef'] = 'Debe fornecer un c&#243;digo SQL para o informe.';
	$lang['strreportcreated'] = 'Gardouse o informe.';
	$lang['strreportcreatedbad'] = 'Non se conseguiu gardar o informe.';

	// Domains
	$lang['strdomain'] = 'Dominio';
	$lang['strdomains'] = 'Dominios';
	$lang['strshowalldomains'] = 'Listar todos os dominios';
	$lang['strnodomains'] = 'Non se atopou dominio alg&#250;n.';
	$lang['strcreatedomain'] = 'Crear un dominio';
	$lang['strdomaindropped'] = 'Eliminouse o dominio.';
	$lang['strdomaindroppedbad'] = 'Non se conseguiu eliminar o dominio.';
	$lang['strconfdropdomain'] = 'Est&#225; seguro de que quere eliminar o dominio &#171;%s&#187;?';
	$lang['strdomainneedsname'] = 'Debe fornecer un nome para o dominio.';
	$lang['strdomaincreated'] = 'Creouse o dominio.';
	$lang['strdomaincreatedbad'] = 'Non se conseguiu crear o dominio.';
	$lang['strdomainaltered'] = 'Modificouse o dominio.';
	$lang['strdomainalteredbad'] = 'Non se conseguiu modificar o dominio.';

	// Operators
	$lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadores';
	$lang['strshowalloperators'] = 'Listar todos os operadores';
	$lang['strnooperator'] = 'Non se atopou operador alg&#250;n.';
	$lang['strnooperators'] = 'Non se atopou operador alg&#250;n.';
	$lang['strcreateoperator'] = 'Crear un operador';
	$lang['strleftarg'] = 'Tipo do argumento esquerdo';
	$lang['strrightarg'] = 'Tipo do argumento dereito';
	$lang['strcommutator'] = 'Conmutador';
	$lang['strnegator'] = 'Negaci&#243;n';
	$lang['strrestrict'] = 'Restrinxir';
	$lang['strjoin'] = 'Unir';
	$lang['strhashes'] = 'Hashes'; // Non sei como traducilo.
	$lang['strmerges'] = 'Mesturas';
	$lang['strleftsort'] = 'Ordenar pola esquerda';
	$lang['strrightsort'] = 'Ordenar pola dereita';
	$lang['strlessthan'] = 'Menor que';
	$lang['strgreaterthan'] = 'Maior que';
	$lang['stroperatorneedsname'] = 'Debe fornecer un nome para o operador.';
	$lang['stroperatorcreated'] = 'Creouse o operador.';
	$lang['stroperatorcreatedbad'] = 'Non se conseguiu crear o operador.';
	$lang['strconfdropoperator'] = 'Est&#225; seguro de que quere eliminar o operador &#171;%s&#187;?';
	$lang['stroperatordropped'] = 'Eliminouse o operador.';
	$lang['stroperatordroppedbad'] = 'Non se conseguiu eliminar o operador.';

	// Casts
	$lang['strcasts'] = 'Molde';
	$lang['strnocasts'] = 'Non se atopou molde alg&#250;n.';
	$lang['strsourcetype'] = 'Tipo orixe';
	$lang['strtargettype'] = 'Tipo obxectivo';
	$lang['strimplicit'] = 'Impl&#237;cito';
	$lang['strinassignment'] = 'Na asignaci&#243;n';
	$lang['strbinarycompat'] = '(Compatible a nivel binario)';

	// Conversions
	$lang['strconversions'] = 'Conversi&#243;ns';
	$lang['strnoconversions'] = 'Non se atopou conversi&#243;n algunha.';
	$lang['strsourceencoding'] = 'Codificaci&#243;n orixinal';
	$lang['strtargetencoding'] = 'Codificaci&#243;n obxectivo';

	// Languages
	$lang['strlanguages'] = 'Linguas';
	$lang['strnolanguages'] = 'Non se atopou lingua algunha.';
	$lang['strtrusted'] = 'De confianza';

	// Info
	$lang['strnoinfo'] = 'Non hai informaci&#243;n dispo&#241;ible.';
	$lang['strreferringtables'] = 'T&#225;boas que fan referencia a esta';
	$lang['strparenttables'] = 'T&#225;boas superiores';
	$lang['strchildtables'] = 'T&#225;boas subordinadas';

	// Aggregates
	$lang['straggregate'] = 'Conxunto';
	$lang['straggregates'] = 'Conxuntos';
	$lang['strnoaggregates'] = 'Non se atopou conxunto alg&#250;n.';
	$lang['stralltypes'] = '(Todos os tipos)';
	$lang['strcreateaggregate'] = 'Crear un conxunto';
	$lang['straggrbasetype'] = 'Tipo de dato de entrada';
	$lang['straggrsfunc'] = 'Funci&#243;n de cambio de estado';
	$lang['straggrstype'] = 'Tipo de dato para o valor do estado';
	$lang['straggrffunc'] = 'Funci&#243;n final';
	$lang['straggrinitcond'] = 'Condici&#243;n inicial';
	$lang['straggrsortop'] = 'Operador de orde';
	$lang['strconfdropaggregate'] = 'Est&#225; seguro de que quere eliminar o conxunto &#171;%s&#187;?';
	$lang['straggregatedropped'] = 'Eliminouse o conxunto.';
	$lang['straggregatedroppedbad'] = 'Non se conseguiu eliminar o conxunto.';
	$lang['straggraltered'] = 'Modificouse o conxunto.';
	$lang['straggralteredbad'] = 'Non se conseguiu eliminar o conxunto.';
	$lang['straggrneedsname'] = 'Debe fornecer un nome para o conxunto.';
	$lang['straggrneedsbasetype'] = 'Debe fornecer un tipo de dato de entrada para o conxunto.';
	$lang['straggrneedssfunc'] = 'Debe fornecer o nome da funci&#243;n de cambio de estado para o conxunto.';
	$lang['straggrneedsstype'] = 'Debe fornecer un tipo de dato para o valor do estado do conxunto.';
	$lang['straggrcreated'] = 'Creouse o conxunto.';
	$lang['straggrcreatedbad'] = 'Non se conseguiu crear o conxunto.';
	$lang['straggrshowall'] = 'Listar todos os conxuntos';

	// Operator Classes
	$lang['stropclasses'] = 'Clases de operador';
	$lang['strnoopclasses'] = 'Non se atopor clase de operador algunha.';
	$lang['straccessmethod'] = 'M&#233;todo de acceso';

	// Stats and performance
	$lang['strrowperf'] = 'Rendemento das filas';
	$lang['strioperf'] = 'Rendemento da entrada e sa&#237;da';
	$lang['stridxrowperf'] = 'Rendemento das filas do &#237;ndice';
	$lang['stridxioperf'] = 'Rendemento da entrada e sa&#237;da do &#237;ndice';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Secuencial';
	$lang['strscan'] = 'Explorar';
	$lang['strread'] = 'Ler';
	$lang['strfetch'] = 'Obter';
	$lang['strheap'] = 'Pila';
	$lang['strtoast'] = 'TOAST'; // Non traduzo por se son siglas, que non o te&#241;o claro.
	$lang['strtoastindex'] = '&#205;ndice TOAST';
	$lang['strcache'] = 'Cach&#233;';
	$lang['strdisk'] = 'Disco';
	$lang['strrows2'] = 'Filas';

	// Tablespaces
	$lang['strtablespace'] = 'Alias de ruta';
	$lang['strtablespaces'] = 'Alias de ruta';
	$lang['strshowalltablespaces'] = 'Listar todos os alias de ruta';
	$lang['strnotablespaces'] = 'Non se atopou alias de ruta alg&#250;n.';
	$lang['strcreatetablespace'] = 'Crear un alias de ruta';
	$lang['strlocation'] = 'Lugar';
	$lang['strtablespaceneedsname'] = 'Debe fornecer un nome para o alias de ruta.';
	$lang['strtablespaceneedsloc'] = 'Debe fornecer unha ruta para a que crear o alias.';
	$lang['strtablespacecreated'] = 'Creouse o alias de ruta.';
	$lang['strtablespacecreatedbad'] = 'non se conseguiu crear o alias de ruta.';
	$lang['strconfdroptablespace'] = 'Est&#225; seguro de que quere borrar o alias de ruta &#171;%s&#187;?';
	$lang['strtablespacedropped'] = 'Eliminouse o alias de ruta.';
	$lang['strtablespacedroppedbad'] = 'Non se conseguiu eliminar o alias de ruta.';
	$lang['strtablespacealtered'] = 'Modificouse o alias de ruta.';
	$lang['strtablespacealteredbad'] = 'Non se conseguiu modificar o alias de ruta.';

	// Slony clusters
	$lang['strcluster'] = 'Concentrador';
	$lang['strnoclusters'] = 'Non se atopou concentrador alg&#250;n.';
	$lang['strconfdropcluster'] = 'Est&#225; seguro de que quere eliminar o concentrador &#171;%s&#187;?';
	$lang['strclusterdropped'] = 'Eliminouse o concentrador.';
	$lang['strclusterdroppedbad'] = 'Non se conseguiu eliminar o concentrador.';
	$lang['strinitcluster'] = 'Inicializar o concentrador';
	$lang['strclustercreated'] = 'Inicializouse o concentrador.';
	$lang['strclustercreatedbad'] = 'Non se conseguiu inicializar o concentrador.';
	$lang['strclusterneedsname'] = 'Debe fornecer un nome para o concentrador.';
	$lang['strclusterneedsnodeid'] = 'Debe fornecer un identificador para o nodo local.';

	// Slony nodes
	$lang['strnodes'] = 'Nodos';
	$lang['strnonodes'] = 'Non se atopou nodo alg&#250;n.';
	$lang['strcreatenode'] = 'Crear un nodo';
	$lang['strid'] = 'Identificador';
	$lang['stractive'] = 'Activo';
	$lang['strnodecreated'] = 'Creouse o nodo.';
	$lang['strnodecreatedbad'] = 'Non se conseguiu crear o nodo.';
	$lang['strconfdropnode'] = 'Est&#225; seguro de que quere eliminar o nodo &#171;%s&#187;?';
	$lang['strnodedropped'] = 'Eliminouse o nodo.';
	$lang['strnodedroppedbad'] = 'Non se conseguiu eliminar o nodo.';
	$lang['strfailover'] = 'Tolerancia de erros';
	$lang['strnodefailedover'] = 'O nodo tolerou o erro.';
	$lang['strnodefailedoverbad'] = 'O nodo non deu tolerado o erro.';
	$lang['strstatus'] = 'Estado';
	$lang['strhealthy'] = 'Sa&#250;de';
	$lang['stroutofsync'] = 'Sen sincronizar';
	$lang['strunknown'] = 'Desco&#241;ecido';

	// Slony paths
	$lang['strpaths'] = 'Rutas';
	$lang['strnopaths'] = 'Non se atopou ruta algunha.';
	$lang['strcreatepath'] = 'Crear unha ruta';
	$lang['strnodename'] = 'Nome do nodo';
	$lang['strnodeid'] = 'Identificador do nodo';
	$lang['strconninfo'] = 'Cadea de conexi&#243;n';
	$lang['strconnretry'] = 'Segundos entre os intentos de conexi&#243;n';
	$lang['strpathneedsconninfo'] = 'Debe fornecer unha cadea de conexi&#243;n para a ruta.';
	$lang['strpathneedsconnretry'] = 'Debe indicar cantos segundos se ha de agardar para volver intentar establecer unha conexi&#243;n.';
	$lang['strpathcreated'] = 'Creouse a ruta.';
	$lang['strpathcreatedbad'] = 'Non se conseguiu crear a ruta.';
	$lang['strconfdroppath'] = 'Est&#225; seguro de que quere eliminar a ruta &#171;%s&#187;?';
	$lang['strpathdropped'] = 'Eliminouse a ruta.';
	$lang['strpathdroppedbad'] = 'Non se conseguiu eliminar a ruta.';

	// Slony listens
	$lang['strlistens'] = 'Escoitas';
	$lang['strnolistens'] = 'Non se atopou escoita algunha.';
	$lang['strcreatelisten'] = 'Crear unha escoita';
	$lang['strlistencreated'] = 'Creouse a escoita.';
	$lang['strlistencreatedbad'] = 'Non se conseguiu crear a escoita.';
	$lang['strconfdroplisten'] = 'Est&#225; seguro de que quere eliminar a escoita &#171;%s&#187;?';
	$lang['strlistendropped'] = 'Eliminouse a escoita.';
	$lang['strlistendroppedbad'] = 'Non se conseguiu eliminar a escoita.';

	// Slony replication sets
	$lang['strrepsets'] = 'Grupos de r&#233;plicas';
	$lang['strnorepsets'] = 'Non se atopou grupo de r&#233;plicas alg&#250;n.';
	$lang['strcreaterepset'] = 'Crear un grupo de r&#233;plicas';
	$lang['strrepsetcreated'] = 'Creouse o grupo de r&#233;plicas.';
	$lang['strrepsetcreatedbad'] = 'Non se conseguiu crear o grupo de r&#233;plicas.';
	$lang['strconfdroprepset'] = 'Est&#225; seguro de que quere borrar o grupo de r&#233;plicas &#171;%s&#187;?';
	$lang['strrepsetdropped'] = 'Eliminouse o grupo de r&#233;plicas.';
	$lang['strrepsetdroppedbad'] = 'Non se conseguiu eliminar o grupo de r&#233;plicas.';
	$lang['strmerge'] = 'Mesturar';
	$lang['strmergeinto'] = 'Mesturar con';
	$lang['strrepsetmerged'] = 'Mestur&#225;ronse os grupos de r&#233;plicas.';
	$lang['strrepsetmergedbad'] = 'Non se conseguiu mesturar os grupos de r&#233;plicas.';
	$lang['strmove'] = 'Mover';
	$lang['strneworigin'] = 'Nova orixe';
	$lang['strrepsetmoved'] = 'Moveuse o grupo de r&#233;plicas.';
	$lang['strrepsetmovedbad'] = 'Non se conseguiu mover o grupo de r&#233;plicas.';
	$lang['strnewrepset'] = 'Novo grupo de r&#233;plicas';
	$lang['strlock'] = 'Bloquear';
	$lang['strlocked'] = 'Bloqueado';
	$lang['strunlock'] = 'Desbloquear';
	$lang['strconflockrepset'] = 'Est&#225; seguro de que quere bloquear o grupo de r&#233;plicas &#171;%s&#187;?';
	$lang['strrepsetlocked'] = 'Bloqueouse o grupo de r&#233;plicas.';
	$lang['strrepsetlockedbad'] = 'Non se conseguiu bloquear o grupo de r&#233;plicas.';
	$lang['strconfunlockrepset'] = 'Est&#225; seguro de que quere desbloquear o grupo de r&#233;plicas &#171;%s&#187;?';
	$lang['strrepsetunlocked'] = 'Desbloqueouse o grupo de r&#233;plicas.';
	$lang['strrepsetunlockedbad'] = 'Non se conseguiu desbloquear o grupo de r&#233;plicas.';
	$lang['stronlyonnode'] = 'S&#243; no nodo';
	$lang['strddlscript'] = 'Gui&#243;n DDL';
	$lang['strscriptneedsbody'] = 'Debe fornecer un gui&#243;n para que se execute en todos os nodos.';
	$lang['strscriptexecuted'] = 'Executouse o gui&#243;n DDL do grupo de r&#233;plicas.';
	$lang['strscriptexecutedbad'] = 'Non se conseguiu executar o gui&#243;n DDL do grupo de r&#233;plicas.';
	$lang['strtabletriggerstoretain'] = 'Slony non vai desactivar o seguintes disparadores::';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Engadir unha t&#225;boa';
	$lang['strtableneedsuniquekey'] = 'A t&#225;boa a engadir necesita dunha clave primaria ou &#250;nica.';
	$lang['strtableaddedtorepset'] = 'Engadiuse a t&#225;boa ao grupo de r&#233;plicas.';
	$lang['strtableaddedtorepsetbad'] = 'Non se conseguiu engadir a t&#225;boa ao grupo de r&#233;plicas.';
	$lang['strconfremovetablefromrepset'] = 'Est&#225; seguro de que quere eliminar a t&#225;boa &#171;%s&#187; do grupo de r&#233;plicas &#171;%s&#187;?';
	$lang['strtableremovedfromrepset'] = 'Eliminouse a t&#225;boa do grupo de r&#233;plicas.';
	$lang['strtableremovedfromrepsetbad'] = 'Non se conseguiu eliminar a t&#225;boa do grupo de r&#233;plicas.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Engadir unha secuencia';
	$lang['strsequenceaddedtorepset'] = 'Engadiuse a secuencia ao grupo de r&#233;plicas.';
	$lang['strsequenceaddedtorepsetbad'] = 'Non se conseguiu engadir a secuencia ao grupo de r&#233;plicas.';
	$lang['strconfremovesequencefromrepset'] = 'Est&#225; seguro de que quere eliminar a secuencia &#171;%s&#187; do grupo de r&#233;plicas &#171;%s&#187;?';
	$lang['strsequenceremovedfromrepset'] = 'Eliminouse a secuencia do grupo de r&#233;plicas.';
	$lang['strsequenceremovedfromrepsetbad'] = 'Non se conseguiu eliminar a secuencia do grupo de r&#233;plicas.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Subscrici&#243;ns';
	$lang['strnosubscriptions'] = 'Non se atopou subscrici&#243;n algunha.';

	// Miscellaneous
	$lang['strtopbar'] = '%s, execut&#225;ndose no enderezo %s:%s. Est&#225; identificado coma &#171;%s&#187;.';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';
	$lang['strhelp'] = 'Axuda';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Navegador das p&#225;xinas de axuda';
	$lang['strselecthelppage'] = 'Escolla unha p&#225;xina de axuda';
	$lang['strinvalidhelppage'] = 'P&#225;xina de axuda incorrecta.';
	$lang['strlogintitle'] = 'Identificarse en %s';
	$lang['strlogoutmsg'] = 'Sa&#237;u de %s';
	$lang['strloading'] = 'Cargando...';
	$lang['strerrorloading'] = 'Produciuse un erro durante o proceso de carga';
	$lang['strclicktoreload'] = 'Prema aqu&#237; para recargar';

	// Autovacuum
	$lang['strautovacuum'] = 'Aspirado autom&#225;tico';
	$lang['strturnedon'] = 'Acendido';
	$lang['strturnedoff'] = 'Apagado';
	$lang['strenabled'] = 'Activado';
	$lang['strnovacuumconf'] = 'Non se atopou configuraci&#243;n para aspirados autom&#225;ticos algunha.';
	$lang['strvacuumbasethreshold'] = 'L&#237;mite da base do aspirado';
	$lang['strvacuumscalefactor'] = 'Factores de escala do aspirado';
	$lang['stranalybasethreshold'] = 'L&#237;mite da base da an&#225;lise';
	$lang['stranalyzescalefactor'] = 'Factores de escala da an&#225;lise';
	$lang['strvacuumcostdelay'] = 'Atraso do custo do aspirado';
	$lang['strvacuumcostlimit'] = 'Custo l&#237;mite do aspirado';
	$lang['strvacuumpertable'] = 'Configuraci&#243;n do aspirado autom&#225;tico por t&#225;boa';
	$lang['straddvacuumtable'] = 'Engadir unha configuraci&#243;n de aspirado autom&#225;tico dunha t&#225;boa';
	$lang['streditvacuumtable'] = 'Modificar a configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187;';
	$lang['strdelvacuumtable'] = 'Est&#225; seguro de que quere eliminar a configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187;?';
	$lang['strvacuumtablereset'] = 'A configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187; restableceuse aos seus valores predeterminados';
	$lang['strdelvacuumtablefail'] = 'Non se conseguiu eliminar a configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187;';
	$lang['strsetvacuumtablesaved'] = 'Gardouse a configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187;.';
	$lang['strsetvacuumtablefail'] = 'Non se conseguiu gardar a configuraci&#243;n de aspirado autom&#225;tico da t&#225;boa &#171;%s&#187;.';
	$lang['strspecifydelvacuumtable'] = 'Debe especificar unha t&#225;boa da que borrar os par&#225;metros de aspirado.';
	$lang['strspecifyeditvacuumtable'] = 'Debe especificar unha t&#225;boa na que modificar os par&#225;metros de aspirado.';
	$lang['strnotdefaultinred'] = 'Os valores que non sexan os predeterminados est&#225;n en cor vermella.';

	// Table-level Locks
	$lang['strlocks'] = 'Bloqueos';
	$lang['strtransaction'] = 'Identificador da transacci&#243;n';
	$lang['strvirtualtransaction'] = 'Identificador da transacci&#243;n virtual';
	$lang['strprocessid'] = 'Identificador do proceso';
	$lang['strmode'] = 'Modo de bloqueo';
	$lang['strislockheld'] = 'Est&#225; activo o bloqueo?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Transacci&#243;ns preparadas';
	$lang['strxactid'] = 'Identificador da transacci&#243;n';
	$lang['strgid'] = 'Identificador global';

	// Fulltext search
	$lang['strfulltext'] = 'Busca de texto completa';
	$lang['strftsconfig'] = 'Configuraci&#243;n de BTC';
	$lang['strftsconfigs'] = 'Configuraci&#243;ns';
	$lang['strftscreateconfig'] = 'Crear unha configuraci&#243;n de BTC';
	$lang['strftscreatedict'] = 'Crear un dicionario';
	$lang['strftscreatedicttemplate'] = 'Crear un modelo de dicionario';
	$lang['strftscreateparser'] = 'Crear un analizador';
	$lang['strftsnoconfigs'] = 'Non se atopou configuraci&#243;n de BTC algunha.';
	$lang['strftsconfigdropped'] = 'Eliminouse a configuraci&#243;n de BTC.';
	$lang['strftsconfigdroppedbad'] = 'Non se conseguiu eliminar a configuraci&#243;n de BTC.';
	$lang['strconfdropftsconfig'] = 'Est&#225; seguro de que quere eliminar a configuraci&#243;n de BTC &#171;%s&#187;?';
	$lang['strconfdropftsdict'] = 'Est&#225; seguro de que quere eliminar o dicionario de BTC &#171;%s&#187;?';
	$lang['strconfdropftsmapping'] = 'Est&#225; seguro de que quere eliminar a aplicaci&#243;n &#171;%s&#187; da configuraci&#243;n de BTC &#171;%s&#187;?';
	$lang['strftstemplate'] = 'Modelo';
	$lang['strftsparser'] = 'Analizador';
	$lang['strftsconfigneedsname'] = 'Debe fornecer un nome para a configuraci&#243;n de BTC.';
	$lang['strftsconfigcreated'] = 'Creouse a configuraci&#243;n de BTC.';
	$lang['strftsconfigcreatedbad'] = 'non se conseguiu crear a configuraci&#243;n de BTC.';
	$lang['strftsmapping'] = 'Aplicaci&#243;n';
	$lang['strftsdicts'] = 'Dicionarios';
	$lang['strftsdict'] = 'Dicionario';
	$lang['strftsemptymap'] = 'Aplicaci&#243;n da configuraci&#243;n de BTC baleira.';
	$lang['strftsconfigaltered'] = 'Modificouse a configuraci&#243;n de BTC.';
	$lang['strftsconfigalteredbad'] = 'Non se conseguiu modificar a configuraci&#243;n de BTC.';
	$lang['strftsconfigmap'] = 'Aplicaci&#243;n da configuraci&#243;n de BTC';
	$lang['strftsparsers'] = 'Analizadores de BTC';
	$lang['strftsnoparsers'] = 'Non hai ning&#250;n analizador de BTC dispo&#241;ible.';
	$lang['strftsnodicts'] = 'Non hai ning&#250;n dicionario de BTC dispo&#241;ible.';
	$lang['strftsdictcreated'] = 'Creouse o dicionario de BTC.';
	$lang['strftsdictcreatedbad'] = 'Non se conseguiu crear o dicionario de BTC.';
	$lang['strftslexize'] = 'An&#225;lise l&#233;xica';
	$lang['strftsinit'] = 'Comezo';
	$lang['strftsoptionsvalues'] = 'Opci&#243;ns e valores';
	$lang['strftsdictneedsname'] = 'Debe fornecer un nome para o dicionario de BTC.';
	$lang['strftsdictdropped'] = 'Eliminouse o dicionario de BTC.';
	$lang['strftsdictdroppedbad'] = 'Non se conseguiu eliminar o dicionario de BTC.';
	$lang['strftsdictaltered'] = 'Modificouse o dicionario de BTC.';
	$lang['strftsdictalteredbad'] = 'Non se conseguiu modifica o dicionario de BTC.';
	$lang['strftsaddmapping'] = 'Engadir unha nova aplicaci&#243;n';
	$lang['strftsspecifymappingtodrop'] = 'Debe especificar polo menos unha aplicaci&#243;n a eliminar.';
	$lang['strftsspecifyconfigtoalter'] = 'Debe especificar polo menos unha configuraci&#243;n de BTC a modificar';
	$lang['strftsmappingdropped'] = 'Eliminouse a aplicaci&#243;n de BTC.';
	$lang['strftsmappingdroppedbad'] = 'Non se conseguiu eliminar a aplicaci&#243;n de BTC.';
	$lang['strftsnodictionaries'] = 'Non se atopou dicionario alg&#250;n.';
	$lang['strftsmappingaltered'] = 'Modificouse a aplicaci&#243;n de BTC.';
	$lang['strftsmappingalteredbad'] = 'Non se conseguiu modificar a aplicaci&#243;n de BTC.';
	$lang['strftsmappingadded'] = 'Engadiuse a aplicaci&#243;n de BTC.';
	$lang['strftsmappingaddedbad'] = 'Non se conseguiu engadir a aplicaci&#243;n de BTC.';
	$lang['strftstabconfigs'] = 'Configuraci&#243;ns';
	$lang['strftstabdicts'] = 'Dicionarios';
	$lang['strftstabparsers'] = 'Analizadores';
	$lang['strftscantparsercopy'] = 'Non se pode especificar tanto un analizador coma un modelo durante a creaci&#243;n dunha configuraci&#243;n de busca de texto.';
?>
