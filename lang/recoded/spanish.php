<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Mart&#237;n Marqu&#233;s (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.31.2.1 2005/11/19 09:51:27 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

        // Bienvenido
	$lang['strintro'] = 'Bienvenido a phpPgAdmin.';
	$lang['strppahome'] = 'P&#225;gina web de phpPgAdmin';
	$lang['strpgsqlhome'] = 'P&#225;gina web de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentaci&#243;n de PostgreSQL (local)';
	$lang['strreportbug'] = 'Reportar problemas';
	$lang['strviewfaq'] = 'Ver Preguntas Frecuentes';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Autenticar';
	$lang['strloginfailed'] = 'Fall&#243; la autenticaci&#243;n';
	$lang['strlogindisallowed'] = 'Ingreso no autorizado';
	$lang['strserver'] = 'Servidor';
        $lang['strservers']  =  'Servidores';
        $lang['strintroduction']  =  'Introducci&#243;n';
        $lang['strhost']  =  'Host';
        $lang['strport']  =  'Puerto';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Due&#241;o';
	$lang['straction'] = 'Acci&#243;n';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definici&#243;n';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Examinar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminado';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'No Nulo';
	$lang['strprev'] = 'Previo';
	$lang['strnext'] = 'Pr&#243;ximo';
        $lang['strfirst'] = '&lt;&lt; Principio';
        $lang['strlast'] = 'Final &gt;&gt;';
	$lang['strfailed'] = 'Fall&#243;';
	$lang['strcreate'] = 'Crear';
	$lang['strcreated'] = 'Creado';
	$lang['strcomment'] = 'Comentario';
	$lang['strlength'] = 'Longitud';
	$lang['strdefault'] = 'Predeterminado';
	$lang['stralter'] = 'Modificar';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Cancelar';
	$lang['strsave'] = 'Guardar';
	$lang['strreset'] = 'Reestablecer';
	$lang['strinsert'] = 'Insertar';
	$lang['strselect'] = 'Seleccionar';
	$lang['strdelete'] = 'Eliminar';
	$lang['strupdate'] = 'Actualizar';
	$lang['strreferences'] = 'Referencia';
	$lang['stryes'] = 'Si';
	$lang['strno'] = 'No';
	$lang['strtrue'] = 'Verdadero';
	$lang['strfalse'] = 'Falso';
	$lang['stredit'] = 'Editar';
        $lang['strcolumn']  =  'Columna';
	$lang['strcolumns'] = 'Columnas';
	$lang['strrows'] = 'fila(s)';
	$lang['strrowsaff'] = 'fila(s) afectadas.';
	$lang['strobjects'] = 'objeto(s)';
	$lang['strback'] = 'Atr&#225;s';
	$lang['strqueryresults'] = 'Resultado de la consulta';
	$lang['strshow'] = 'Mostrar';
	$lang['strempty'] = 'Vaciar';
	$lang['strlanguage'] = 'Idioma';
	$lang['strencoding'] = 'Codificaci&#243;n';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = '&#218;nico';
	$lang['strprimary'] = 'Primaria';
	$lang['strexport'] = 'Exportar';
	$lang['strimport'] = 'Importar';
        $lang['strallowednulls']  =  'Valores Nulos (NULL) Permitidos';
$lang['strbackslashn']  =  '\N';
$lang['strnull']  =  'Null';
$lang['strnull']  =  'NULL (The word)';
        $lang['stremptystring']  =  'Cadena o campo vacio';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Limpiar';
	$lang['stranalyze'] = 'Analizar';
	$lang['strclusterindex'] = 'Ordenar tabla';
	$lang['strclustered'] = '&#191;Tabla Ordenada?';
	$lang['strreindex'] = 'Reindexar';
	$lang['strrun'] = 'Ejecutar';
	$lang['stradd'] = 'Agregar';
        $lang['strremove']  =  'Remover';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'D&#243;nde';
	$lang['strinstead'] = 'Hacer en su lugar';
	$lang['strwhen'] = 'Cu&#225;ndo';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Dato';
	$lang['strconfirm'] = 'Confirmar';
	$lang['strexpression'] = 'Expresi&#243;n';
	$lang['strellipsis'] = '...';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Expandir';
	$lang['strcollapse'] = 'Colapsar';
        $lang['strexplain'] = 'Explicar';
	$lang['strexplainanalyze'] = 'Explicar analizando';
        $lang['strfind'] = 'Buscar';
        $lang['stroptions'] = 'Opciones';
	$lang['strrefresh'] = 'Refrescar';
	$lang['strdownload'] = 'Bajar';
	$lang['strdownloadgzipped'] = 'Bajar comprimido con gzip';
	$lang['strinfo'] = 'Informaci&#243;n';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avanzado';
	$lang['strvariables'] = 'Variables';
	$lang['strprocess'] = 'Proceso';
	$lang['strprocesses'] = 'Procesos';
	$lang['strsetting'] = 'Setear';
	$lang['streditsql'] = 'Editar SQL';
	$lang['strruntime'] = 'Tiempo total de ejecuci&#243;n: %s ms';
	$lang['strpaginate'] = 'Paginar resultados';
	$lang['struploadscript'] = 'o subir un script SQL:';
	$lang['strstarttime'] = 'Hora de comienzo';
	$lang['strfile'] = 'Archivo';
	$lang['strfileimported'] = 'Archivo importado.';
        $lang['strtrycred']  =  'Usar el mismo par usuario/contrase&#241;a para todos los servidores';

	// Error handling
        $lang['strnoframes']  =  'Esta aplicaci&#243;n funciona mejor con un navegador con soporte para marcos, pero puede usarse sin marcos siguiendo el link de abajo.';
        $lang['strnoframeslink']  =  'Usar sin marcos';
	$lang['strbadconfig'] = 'Su archivo config.inc.php est&#225; desactualizado. Deber&#225; regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versi&#243;n de PHP no tiene el soporte correcto de bases de datos.';
        $lang['strpostgresqlversionnotsupported']  =  'Su versi&#243;n de PostgreSQL no est&#225; soportado. Por favor actualice a la versi&#243;n %s o m&#225;s reciente.';
	$lang['strbadschema'] = 'El esquema especificado no es v&#225;lido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificaci&#243;n del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaraci&#243;n:';
	$lang['strinvalidparam'] = 'Par&#225;metros de script no v&#225;lidos.';
	$lang['strnodata'] = 'No se encontraron filas.';
	$lang['strnoobjects'] = 'No se encontraron objetos.';
	$lang['strrownotunique'] = 'No existe un identificador &#250;nico para este registro.';
	$lang['strnoreportsdb'] = 'No ha creado a&#250;n la base de datos para los reportes. Lea las instrucciones del archivo INSTALL.';
	$lang['strnouploads'] = 'Est&#225; deshabilitada la subida de archivos.';
	$lang['strimporterror'] = 'Error de importaci&#243;n.';
        $lang['strimporterror-fileformat']  =  'Error de importacion de datos: Fall&#243; al intentar determinar el formato del archivo.';
	$lang['strimporterrorline'] = 'Error de importaci&#243;n en la l&#237;nea %s.';
        $lang['strimporterrorline-badcolumnnum']  =  'Error de importaci&#243;n en la l&#237;nea %s:  La l&#237;nea no posee la cantidad de columnas correctas.';
        $lang['strimporterror-uploadedfile']  =  'Error de importaci&#243;n: No se ha podido subir el archivo al servidor';
        $lang['strcannotdumponwindows']  =  'Vuelco de datos con nombres complejos de tablas y esquemas no esta soportado en Windows.';

	// Tables
	$lang['strtable'] = 'Tabla';
	$lang['strtables'] = 'Tablas';
	$lang['strshowalltables'] = 'Mostrar Todas las Tablas';
	$lang['strnotables'] = 'No se encontraron tablas.';
	$lang['strnotable'] = 'No se encontr&#243; la tabla.';
	$lang['strcreatetable'] = 'Crear tabla';
	$lang['strtablename'] = 'Nombre de la tabla';
	$lang['strtableneedsname'] = 'Debe darle un nombre a la tabla.';
	$lang['strtableneedsfield'] = 'Debe especificar al menos un campo.';
	$lang['strtableneedscols'] = 'Las tablas requieren un n&#250;mero v&#225;lido de columnas.';
	$lang['strtablecreated'] = 'Tabla creada.';
	$lang['strtablecreatedbad'] = 'Fall&#243; al tratar crear la tabla.';
	$lang['strconfdroptable'] = '&#191;Est&#225; seguro que desea eliminar la tabla &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabla eliminada.';
	$lang['strtabledroppedbad'] = 'Fall&#243; al tratar de eliminar la tabla.';
	$lang['strconfemptytable'] = '&#191;Est&#225; seguro que desea vaciar la tabla &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabla vaciada.';
	$lang['strtableemptiedbad'] = 'Fall&#243; el vaciado de la tabla.';
	$lang['strinsertrow'] = 'Insertar Fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'Fall&#243; la inserci&#243;n de fila.';
        $lang['strrowduplicate']  =  'Inserci&#243;n de fila fall&#243;, intentado hacer una duplicaci&#243;n de inserci&#243;n.';
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Fall&#243; al intentar actualizar la fila.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = '&#191;Est&#225; seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Fall&#243; la eliminaci&#243;n de fila.';
        $lang['strinsertandrepeat']  =  'Insertar y Repite';
        $lang['strnumcols']  =  'Cantidad de columnas';
        $lang['strcolneedsname']  =  'Debe especificar un nombre para la columna';
        $lang['strselectallfields'] = 'Seleccionar todos los campos.';
	$lang['strselectneedscol'] = 'Debe elegir al menos una columna';
	$lang['strselectunary'] = 'Operaciones unitarias no pueden tener valores.';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Fall&#243; la modificaci&#243;n de columna.';
	$lang['strconfdropcolumn'] = '&#191;Est&#225; seguro que quiere eliminar la columna &quot;%s&quot; de la tabla &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Fall&#243; la eliminaci&#243;n de columna.';
        $lang['straddcolumn'] = 'Agregar Columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Fall&#243; el agregado de columna.';
	$lang['strcascade'] = 'EN CASCADA';
	$lang['strtablealtered'] = 'Tabla modificada.';
	$lang['strtablealteredbad'] = 'Fall&#243; la modificaci&#243;n  de la Tabla.';
        $lang['strdataonly'] = 'Datos solamente';
	$lang['strstructureonly'] = 'Solo la estructura';
	$lang['strstructureanddata'] = 'Estructura y datos';
	$lang['strtabbed'] = 'Tabulado';
	$lang['strauto'] = 'Autom&#225;tico';
        $lang['strconfvacuumtable']  =  'Esta seguro que quiere limpiar &quot;%s&quot;?';
        $lang['strestimatedrowcount']  =  'Estimaci&#243;n de filas';

        // Users
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contrase&#241;a';
	$lang['strsuper'] = '&#191;Es administrador?';
	$lang['strcreatedb'] = '&#191;Puede crear BD?';
	$lang['strexpires'] = 'Expira';
	$lang['strsessiondefaults'] = 'Valores predeterminados de la sesi&#243;n.';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Fall&#243; la actualizaci&#243;n del usuario.';
	$lang['strshowallusers'] = 'Mostrar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['struserneedsname'] = 'Debe dar un nombre a su usuario.';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Fall&#243; al crear usuario.';
	$lang['strconfdropuser'] = '&#191;Est&#225; seguro que quiere eliminar el usuario &quot;%s&quot;?';
        $lang['struserdropped'] = 'Usuario eliminado.';
	$lang['struserdroppedbad'] = 'Fall&#243; al eliminar el usuario.';
	$lang['straccount'] = 'Cuenta';
	$lang['strchangepassword'] = 'Cambiar Contrase&#241;a';
	$lang['strpasswordchanged'] = 'Contrase&#241;a modificada.';
	$lang['strpasswordchangedbad'] = 'Fall&#243; al modificar contrase&#241;a.';
	$lang['strpasswordshort'] = 'La contrase&#241;a es muy corta.';
	$lang['strpasswordconfirm'] = 'Las contrase&#241;as no coinciden.';

        // Groups
        $lang['strgroup'] = 'Grupo';
	$lang['strgroups']  =  'Grupos';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Fall&#243; la creaci&#243;n del grupo.';
	$lang['strconfdropgroup'] = '&#191;Est&#225; seguro que quiere eliminar el grupo &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
        $lang['strgroupdroppedbad'] = 'Fall&#243; la eliminaci&#243;n del grupo.';
        $lang['strmembers'] = 'Miembros';
	$lang['straddmember'] = 'Agregar un miembro';
	$lang['strmemberadded'] = 'Miembro agregado.';
	$lang['strmemberaddedbad'] = 'Fall&#243; al intentar agregar nuevo miembro.';
	$lang['strdropmember'] = 'Sacar miembro';
	$lang['strconfdropmember'] = '&#191;Est&#225; seguro que quiere sacra el miembro &quot;%s&quot; del grupo &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Miembro eliminado.';
	$lang['strmemberdroppedbad'] = 'Fall&#243; al intentar sacar un miembro.';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados/revocados.';
	$lang['strgrantfailed'] = 'Fall&#243; al intentar otorgar privilegios.';
	$lang['strgrantbad'] = 'Debe especificar al menos un usuario o grupo y al menos un privilegio.';
	$lang['strgrantor']  =  'Cedente';
	$lang['strasterisk']  =  '*';

	// Databases
	$lang['strdatabase'] = 'Base de Datos';
	$lang['strdatabases'] = 'Bases de Datos';
	$lang['strshowalldatabases'] = 'Mostrar Todas las Bases de Datos';
	$lang['strnodatabase'] = 'No se encontr&#243; la Base de Datos.';
	$lang['strnodatabases'] = 'No se encontraron Bases de Datos.';
	$lang['strcreatedatabase'] = 'Crear base de datos';
	$lang['strdatabasename'] = 'Nombre de la base de datos';
	$lang['strdatabaseneedsname'] = 'Debe darle un nombre a la base de datos.';
	$lang['strdatabasecreated'] = 'Base de Datos creada.';
	$lang['strdatabasecreatedbad'] = 'Fall&#243; la creaci&#243;n de la base de datos.';	
	$lang['strconfdropdatabase'] = '&#191;Est&#225; seguro que quiere eliminar la base de datos &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de datos eliminada.';
	$lang['strdatabasedroppedbad'] = 'Fall&#243; al eliminar la base de datos.';
	$lang['strentersql'] = 'Ingrese la sentencia de SQL para ejecutar:';
	$lang['strsqlexecuted'] = 'SQL ejecutada.';
	$lang['strvacuumgood'] = 'Limpieza completada.';
	$lang['strvacuumbad'] = 'Fall&#243; al intentar limpiar.';
	$lang['stranalyzegood'] = 'An&#225;lisis completado.';
	$lang['stranalyzebad'] = 'Fall&#243; al intentar analizar.';
	$lang['strreindexgood'] = 'Reindexado completo.';
	$lang['strreindexbad'] = 'Fall&#243; el reindexado.';
	$lang['strfull'] = 'Full';
	$lang['strfreeze'] = 'Freeze';
	$lang['strforce'] = 'Force';
        $lang['strsignalsent']  =  'Se&#241;al enviada.';
        $lang['strsignalsentbad']  =  'Fall&#243; el env&#237;o de la se&#241;al.';
        $lang['strallobjects']  =  'Todos los objetos';
        $lang['strdatabasealtered']  =  'Base de Datos alterada.';
        $lang['strdatabasealteredbad']  =  'Fall&#243; al intentar alterar la Base de Datos.';

	// Views
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Vistas';
	$lang['strshowallviews'] = 'Mostrar todas las vistas';
	$lang['strnoview'] = 'No se encontr&#243; la vista.';
	$lang['strnoviews'] = 'No se encontraron vistas.';
	$lang['strcreateview'] = 'Crear Vista';
	$lang['strviewname'] = 'Nombre de Vista';
	$lang['strviewneedsname'] = 'Debe darle un nombre a la vista.';
	$lang['strviewneedsdef'] = 'Debe darle una definici&#243;n a su vista.';
        $lang['strviewneedsfields'] = 'Seleccione por favor los campos que desea en su vista.';
	$lang['strviewcreated'] = 'Vista creada.';
	$lang['strviewcreatedbad'] = 'Fall&#243; al crear la vista.';
	$lang['strconfdropview'] = '&#191;Est&#225; seguro que quiere eliminar la vista &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'Fall&#243; al intentar eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualizada.';
	$lang['strviewupdatedbad'] = 'Fall&#243; al actualizar la vista.';
	$lang['strviewlink'] = 'Linking Keys';
	$lang['strviewconditions'] = 'Additional Conditions';
	$lang['strcreateviewwiz'] = 'Crear vista con Asistente';

	// Sequences
	$lang['strsequence'] = 'Secuencia';
	$lang['strsequences'] = 'Secuencias';
	$lang['strshowallsequences'] = 'Mostrar todas las secuencias';
	$lang['strnosequence'] = 'No se encontr&#243; la secuencia.';
	$lang['strnosequences'] = 'No se encontraron secuencias.';
	$lang['strcreatesequence'] = 'Crear secuencia';
	$lang['strlastvalue'] = '&#218;ltimo Valor';
	$lang['strincrementby'] = 'Incremento';	
	$lang['strstartvalue'] = 'Valor Inicial';
	$lang['strmaxvalue'] = 'Valor M&#225;ximo';
	$lang['strminvalue'] = 'Valor M&#237;nimo';
	$lang['strcachevalue'] = 'Valor de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = '&#191;Rotar?';
	$lang['striscalled'] = '&#191;Nombre?';
	$lang['strsequenceneedsname'] = 'Debe darle un nombre a la secuencia.';
	$lang['strsequencecreated'] = 'Secuencia creada.';
	$lang['strsequencecreatedbad'] = 'Fall&#243; la creaci&#243;n de la secuencia.'; 
	$lang['strconfdropsequence'] = '&#191;Est&#225; seguro que quiere eliminar la secuencia &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Secuencia eliminada.';
	$lang['strsequencedroppedbad'] = 'Fall&#243; la eliminaci&#243;n de la secuencia.';
	$lang['strsequencereset'] = 'Secuencia reiniciada.';
	$lang['strsequenceresetbad'] = 'Fall&#243; al intentar reiniciar la secuencia.'; 

	// Indexes
	$lang['strindex'] = '&#205;ndice';
	$lang['strindexes'] = '&#205;ndices';
	$lang['strindexname'] = 'Nombre del &#205;ndice';
	$lang['strshowallindexes'] = 'Mostrar Todos los &#205;ndices';
	$lang['strnoindex'] = 'No se encontr&#243; el &#237;ndice.';
	$lang['strnoindexes'] = 'No se encontraron &#237;ndices.';
	$lang['strcreateindex'] = 'Crear &#205;ndice';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nombre de Columna';
	$lang['strindexneedsname'] = 'Debe darle un nombre al &#237;ndice';
	$lang['strindexneedscols'] = 'Los &#237;ndices requieren un n&#250;mero v&#225;lido de columnas.';
	$lang['strindexcreated'] = '&#205;ndice creado';
	$lang['strindexcreatedbad'] = 'Fall&#243; al crear el &#237;ndice.';
	$lang['strconfdropindex'] = '&#191;Est&#225; seguro que quiere eliminar el &#237;ndice &quot;%s&quot;?';
	$lang['strindexdropped'] = '&#205;ndice eliminado.';
	$lang['strindexdroppedbad'] = 'Fall&#243; al eliminar el &#237;ndice.';
	$lang['strkeyname'] = 'Nombre de la llave';
	$lang['struniquekey'] = 'Llave &#250;nica';
	$lang['strprimarykey'] = 'Llave primaria';
 	$lang['strindextype'] = 'Tipo de &#237;ndice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en el &#205;ndice';
	$lang['strconfcluster'] = 'Est&#225; seguro que quiere ordenar la tabla &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Ordenado completo.';
	$lang['strclusteredbad'] = 'Fall&#243; al ordenar tabla.';

	// Rules
	$lang['strrules'] = 'Reglas';
	$lang['strrule'] = 'Regla';
	$lang['strshowallrules'] = 'Mostrar todas las reglas';
	$lang['strnorule'] = 'No se encontr&#243; la regla.';
	$lang['strnorules'] = 'No se encontraron reglas.';
	$lang['strcreaterule'] = 'Crear regla';
	$lang['strrulename'] = 'Nombre de regla';
	$lang['strruleneedsname'] = 'Debe darle un nombre a la regla.';
	$lang['strrulecreated'] = 'Regla creada.';
	$lang['strrulecreatedbad'] = 'Fall&#243; al crear la regla.';
	$lang['strconfdroprule'] = '&#191;Est&#225; seguro que quiere eliminar la regla &quot;%s&quot; en &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regla eliminada.';
	$lang['strruledroppedbad'] = 'Fall&#243; al eliminar la regla.';

	// Constraints
        $lang['strconstraint']  =  'Restricci&#243;n';
	$lang['strconstraints'] = 'Restricciones';
	$lang['strshowallconstraints'] = 'Mostrar todas las restricciones';
	$lang['strnoconstraints'] = 'No se encontraron restricciones.';
	$lang['strcreateconstraint'] = 'Crear Restricci&#243;n';
	$lang['strconstraintcreated'] = 'Restricci&#243;n creada.';
	$lang['strconstraintcreatedbad'] = 'Fall&#243; al crear la Restricci&#243;n.';
	$lang['strconfdropconstraint'] = '&#191;Est&#225; seguro que quiere eliminar la restricci&#243;n &quot;%s&quot; de &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Restricci&#243;n eliminada.';
	$lang['strconstraintdroppedbad'] = 'Fall&#243; al eliminar la restricci&#243;n.';
	$lang['straddcheck'] = 'Agregar chequeo';
	$lang['strcheckneedsdefinition'] = 'Restricci&#243;n de chequeo necesita una definici&#243;n.';
	$lang['strcheckadded'] = 'Restricci&#243;n de chequeo agregada.';
	$lang['strcheckaddedbad'] = 'Fall&#243; al intentar agregar restricci&#243;n de chequeo.';
	$lang['straddpk'] = 'Agregar llave primaria';
	$lang['strpkneedscols'] = 'Llave primaria necesita al menos un campo.';
	$lang['strpkadded'] = 'Llave primaria agregada.';
	$lang['strpkaddedbad'] = 'Fall&#243; al intentar crear la llave primaria.';
	$lang['stradduniq'] = 'Agregar llave &#250;nica';
	$lang['struniqneedscols'] = 'Llave &#250;nica necesita al menos un campo.';
	$lang['struniqadded'] = 'Agregar llave &#250;nica.';
	$lang['struniqaddedbad'] = 'Fall&#243; al intentar agregar la llave &#250;nica.';
	$lang['straddfk'] = 'Agregar referencia';
	$lang['strfkneedscols'] = 'Referencia necesita al menos un campo.';
	$lang['strfkneedstarget'] = 'Referencia necesita una tabla para referenciar.';
	$lang['strfkadded'] = 'Referencia agregada.';
	$lang['strfkaddedbad'] = 'Fall&#243; al agregar la referencia.';
	$lang['strfktarget'] = 'Tabla de destino';
	$lang['strfkcolumnlist'] = 'Campos en la llave';
	$lang['strondelete'] = 'AL ELIMINAR';
	$lang['stronupdate'] = 'AL ACTUALIZAR';

	// Functions
	$lang['strfunction'] = 'Funci&#243;n';
	$lang['strfunctions'] = 'Funciones';
	$lang['strshowallfunctions'] = 'Mostrar todas las funciones';
	$lang['strnofunction'] = 'No se encontr&#243; la funci&#243;n.';
	$lang['strnofunctions'] = 'No se encontraron funciones.';
        $lang['strcreateplfunction']  =  'Crear funci&#243;n SQL/PL';
        $lang['strcreateinternalfunction']  =  'Crear funci&#243;n interna';
        $lang['strcreatecfunction']  =  'Crear funci&#243;n en C';
	$lang['strfunctionname'] = 'Nombre de la funci&#243;n';
	$lang['strreturns'] = 'Devuelve';
	$lang['strarguments'] = 'Argumentos';
        $lang['strproglanguage'] = 'Lenguaje de programaci&#243;n';
	$lang['strfunctionneedsname'] = 'Debe darle un nombre a la funci&#243;n.';
	$lang['strfunctionneedsdef'] = 'Debe darle una definici&#243;n a la funci&#243;n.';
	$lang['strfunctioncreated'] = 'Funci&#243;n creada.';
	$lang['strfunctioncreatedbad'] = 'Fall&#243; la creaci&#243;n de la funci&#243;n.';
	$lang['strconfdropfunction'] = '&#191;Est&#225; seguro que quiere eliminar la funci&#243;n &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funci&#243;n eliminada.';
	$lang['strfunctiondroppedbad'] = 'Fall&#243; al eliminar la funci&#243;n.';
	$lang['strfunctionupdated'] = 'Funci&#243;n actualizada.';
	$lang['strfunctionupdatedbad'] = 'Fall&#243; al actualizar la funci&#243;n.';
        $lang['strobjectfile']  =  'Archivo de objeto';
        $lang['strlinksymbol']  =  'Vinculo simb&#243;lico';

	// Triggers
	$lang['strtrigger'] = 'Disparador';
	$lang['strtriggers'] = 'Disparadores';
	$lang['strshowalltriggers'] = 'Mostrar todos los disparadores';
	$lang['strnotrigger'] = 'No se encontr&#243; el disparador.';
	$lang['strnotriggers'] = 'No se encontraron disparadores.';
	$lang['strcreatetrigger'] = 'Crear Disparador';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al disparador.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una funci&#243;n para el disparador.';
	$lang['strtriggercreated'] = 'Disparador creado.';
	$lang['strtriggercreatedbad'] = 'Fall&#243; la creaci&#243;n del disparador.';
	$lang['strconfdroptrigger'] = '&#191;Est&#225; seguro que quiere eliminar el disparador &quot;%s&quot; en &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Disparador eliminado.';
	$lang['strtriggerdroppedbad'] = 'Fall&#243; al eliminar el disparador.';
        $lang['strtriggeraltered'] = 'Disparador modificado.';
        $lang['strtriggeralteredbad'] = 'Fall&#243; la modificaci&#243;n del disparador.';
        $lang['strforeach']  =  'Para cada uno';

	// Types
	$lang['strtype'] = 'Tipo de dato';
	$lang['strtypes'] = 'Tipos de datos';
	$lang['strshowalltypes'] = 'Mostrar todos los tipos';
	$lang['strnotype'] = 'No se encontr&#243; el tipo.';
	$lang['strnotypes'] = 'No se encontraron tipos.';
	$lang['strcreatetype'] = 'Crear Tipo';
        $lang['strcreatecomptype']  =  'Crear tipo compuesto';
        $lang['strtypeneedsfield']  =  'Debe especificar al menos un campo.';
        $lang['strtypeneedscols']  =  'Tipos compuestos requieren de un n&#250;mero valido de columnas.';	
	$lang['strtypename'] = 'Nombre del tipo';
	$lang['strinputfn'] = 'Funci&#243;n de entrada';
	$lang['stroutputfn'] = 'Funci&#243;n de salida';
	$lang['strpassbyval'] = '&#191;Pasar valor?';
	$lang['stralignment'] = 'Alineamiento';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamiento';
        $lang['strfield']  =  'Campo';
        $lang['strnumfields']  =  'Cantidad de campos';
	$lang['strtypeneedsname'] = 'Debe especificar un nombre para el tipo.';
	$lang['strtypeneedslen'] = 'Debe especificar una longitud para el tipo.';
	$lang['strtypecreated'] = 'Tipo creado';
	$lang['strtypecreatedbad'] = 'Fall&#243; al crear el tipo.';
	$lang['strconfdroptype'] = '&#191;Est&#225; seguro que quiere eliminar el tipo &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Tipo eliminado.';
	$lang['strtypedroppedbad'] = 'Fall&#243; al eliminar el tipo.';
        $lang['strflavor']  =  'Tipo';
        $lang['strbasetype']  =  'Base';
        $lang['strcompositetype']  =  'Compuesto';
        $lang['strpseudotype']  =  'Pseudo';

	// Schemas
	$lang['strschema'] = 'Esquema';
	$lang['strschemas'] = 'Esquemas';
	$lang['strshowallschemas'] = 'Mostrar Todos los Esquemas';
	$lang['strnoschema'] = 'No se encontr&#243; el esquema.';
	$lang['strnoschemas'] = 'No se encontraron esquemas.';
	$lang['strcreateschema'] = 'Crear Esquema';
	$lang['strschemaname'] = 'Nombre del esquema';
	$lang['strschemaneedsname'] = 'Debe especificar un nombre para el esquema.';
	$lang['strschemacreated'] = 'Esquema creado';
	$lang['strschemacreatedbad'] = 'Fall&#243; al crear el esquema.';
	$lang['strconfdropschema'] = '&#191;Est&#225; seguro que quiere eliminar el esquema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Esquema eliminado.';
	$lang['strschemadroppedbad'] = 'Fall&#243; al eliminar el esquema.';
	$lang['strschemaaltered'] = 'Esquema modificado.';
	$lang['strschemaalteredbad'] = 'Modificaci&#243;n del esquema fall&#243;.';
        $lang['strsearchpath']  =  'Orden de busqueda en esquemas';

	// Reports
	$lang['strreport'] = 'Reporte';
	$lang['strreports'] = 'Reportes';
	$lang['strshowallreports'] = 'Mostrar todos los reportes';
	$lang['strnoreports'] = 'No se encontr&#243; el reporte.';
	$lang['strcreatereport'] = 'Crear Reporte';
	$lang['strreportdropped'] = 'Reporte eliminado.';
	$lang['strreportdroppedbad'] = 'Fall&#243; al eliminar el Reporte.';
	$lang['strconfdropreport'] = '&#191;Est&#225; seguro que quiere eliminar el reporte &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Debe especificar un nombre para el reporte.';
	$lang['strreportneedsdef'] = 'Debe especificar un SQL para el reporte.';
	$lang['strreportcreated'] = 'Reporte guardado.';
	$lang['strreportcreatedbad'] = 'Fall&#243; al guardar el reporte.';
	$lang['strdomain'] = 'Dominio';
	$lang['strdomains'] = 'Dominios';
	$lang['strshowalldomains'] = 'Mostrar todos los dominios';
	$lang['strnodomains'] = 'No se encontraron dominios.';
	$lang['strcreatedomain'] = 'Crear dominio';
	$lang['strdomaindropped'] = 'Dominio eliminado.';
	$lang['strdomaindroppedbad'] = 'Fall&#243; al intentar eliminar el dominio.';
	$lang['strconfdropdomain'] = 'Esta seguro que quiere eliminar el dominio &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Debe dar un nombre para el dominio.';
	$lang['strdomaincreated'] = 'Dominio creado.';
	$lang['strdomaincreatedbad'] = 'Fall&#243; al intentar crear el dominio.';
	$lang['strdomainaltered'] = 'Dominio modificado.';
	$lang['strdomainalteredbad'] = 'Fall&#243; al intentar modificar el dominio.';

	// Operators
        $lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadores';
	$lang['strshowalloperators'] = 'Mostrar todos los operadores';
	$lang['strnooperator'] = 'No se encontr&#243; el operador.';
	$lang['strnooperators'] = 'No se encontraron operadores.';
	$lang['strcreateoperator'] = 'Crear Operador';
	$lang['strleftarg'] = 'Tipo de datos del arg. izquierdo';
	$lang['strrightarg'] = 'Tipo de datos del arg. derecho';
	$lang['strcommutator'] = 'Conmutador';
	$lang['strnegator'] = 'Negaci&#243;n';
	$lang['strrestrict'] = 'Restringir';
	$lang['strjoin'] = 'Uni&#243;n';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Fusiones';
	$lang['strleftsort'] = 'Ordenado izquierdo';
	$lang['strrightsort'] = 'Ordenado derecho';
	$lang['strlessthan'] = 'Menor que';
	$lang['strgreaterthan'] = 'Mayor que';
	$lang['stroperatorneedsname'] = 'Debe darle un nombre al operador.';
	$lang['stroperatorcreated'] = 'Operador creado';
	$lang['stroperatorcreatedbad'] = 'Fall&#243; al intentar crear el operador.';
	$lang['strconfdropoperator'] = '&#191;Est&#225; seguro que quiere eliminar el operador &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operador eliminado.';
	$lang['stroperatordroppedbad'] = 'Fall&#243; al intentar eliminar el operador.';

	// Casts
	$lang['strcasts'] = 'Conversi&#243;n de tipos';
	$lang['strnocasts'] = 'No se encontraron conversiones.';
	$lang['strsourcetype'] = 'Tipo inicial';
	$lang['strtargettype'] = 'Tipo final';
	$lang['strimplicit'] = 'Impl&#237;cito';
	$lang['strinassignment'] = 'En asignaci&#243;n';
	$lang['strbinarycompat'] = '(Compatible con binario)';

	// Conversions
	$lang['strconversions'] = 'Conversiones';
	$lang['strnoconversions'] = 'No se encontraron conversiones.';
	$lang['strsourceencoding'] = 'Source encoding';
	$lang['strtargetencoding'] = 'Target encoding';

	// Languages
	$lang['strlanguages'] = 'Lenguajes';
	$lang['strnolanguages'] = 'No se encontraron lenguajes.';
	$lang['strtrusted'] = 'Trusted';

	// Info
	$lang['strnoinfo'] = 'No hay informaci&#243;n disponible.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Parent tables';
	$lang['strchildtables'] = 'Child tables';

	// Aggregates
	$lang['straggregates'] = 'Agregadas';
	$lang['strnoaggregates'] = 'No se encontraron agregadas.';
	$lang['stralltypes'] = '(Todos los tipos)';

	// Operator Classes
	$lang['stropclasses'] = 'Clases de operadores';
	$lang['strnoopclasses'] = 'No se encontraron clases de operadores.';
	$lang['straccessmethod'] = 'M&#233;todo de acceso';

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
        $lang['strtablespace']  =  'Tablespace';
        $lang['strtablespaces']  =  'Tablespaces';
        $lang['strshowalltablespaces']  =  'Mostrar todos los tablespaces';
        $lang['strnotablespaces']  =  'No se encontraron tablespaces.';
        $lang['strcreatetablespace']  =  'Crear tablespace';
        $lang['strlocation']  =  'Ubicaci&#243;n';
        $lang['strtablespaceneedsname']  =  'Debe darle un nombre al tablespace.';
        $lang['strtablespaceneedsloc']  =  'Debe dar un directorio en donde crear el tablespace.';
        $lang['strtablespacecreated']  =  'Tablespace creado.';
        $lang['strtablespacecreatedbad']  =  'Fall&#243; la creaci&#243;n del tablespace.';
        $lang['strconfdroptablespace']  =  'Esta seguro que quiere eliminar el tablespace &quot;%s&quot;?';
        $lang['strtablespacedropped']  =  'Tablespace eliminado.';
        $lang['strtablespacedroppedbad']  =  'Fall&#243; al intenta eliminar el tablespace.';
        $lang['strtablespacealtered']  =  'Tablespace modificado.';
        $lang['strtablespacealteredbad']  =  'Fall&#243; la modificaci&#243;n del Tablespace.';

	// Slony clusters
$lang['strcluster']  =  'Cluster';
$lang['strnoclusters']  =  'No clusters found.';
$lang['strconfdropcluster']  =  'Are you sure you want to drop cluster &quot;%s&quot;?';
$lang['strclusterdropped']  =  'Cluster dropped.';
$lang['strclusterdroppedbad']  =  'Cluster drop failed.';
$lang['strinitcluster']  =  'Initialize Cluster';
$lang['strclustercreated']  =  'Cluster initialized.';
$lang['strclustercreatedbad']  =  'Cluster initialization failed.';
$lang['strclusterneedsname']  =  'You must give a name for the cluster.';
$lang['strclusterneedsnodeid']  =  'You must give an ID for the local node.';
	
	// Slony nodes
$lang['strnodes']  =  'Nodes';
$lang['strnonodes']  =  'No nodes found.';
$lang['strcreatenode']  =  'Create node';
$lang['strid']  =  'ID';
$lang['stractive']  =  'Active';
$lang['strnodecreated']  =  'Node created.';
$lang['strnodecreatedbad']  =  'Node creation failed.';
$lang['strconfdropnode']  =  'Are you sure you want to drop node &quot;%s&quot;?';
$lang['strnodedropped']  =  'Node dropped.';
$lang['strnodedroppedbad']  =  'Node drop failed';
$lang['strfailover']  =  'Failover';
$lang['strnodefailedover']  =  'Node failed over.';
$lang['strnodefailedoverbad']  =  'Node fail over fail.';
	
	// Slony paths	
$lang['strpaths']  =  'Paths';
$lang['strnopaths']  =  'No paths found.';
$lang['strcreatepath']  =  'Create path';
$lang['strnodename']  =  'Node name';
$lang['strnodeid']  =  'Node ID';
$lang['strconninfo']  =  'Connection string';
$lang['strconnretry']  =  'Seconds before retry to connect';
$lang['strpathneedsconninfo']  =  'You must give a connection string for the path.';
$lang['strpathneedsconnretry']  =  'You must give the number of seconds to wait before retry to connect.';
$lang['strpathcreated']  =  'Path created.';
$lang['strpathcreatedbad']  =  'Path creation failed.';
$lang['strconfdroppath']  =  'Are you sure you want to drop path &quot;%s&quot;?';
$lang['strpathdropped']  =  'Path dropped.';
$lang['strpathdroppedbad']  =  'Path drop failed.';

	// Slony listens
$lang['strlistens']  =  'Listens';
$lang['strnolistens']  =  'No listens found.';
$lang['strcreatelisten']  =  'Create listen';
$lang['strlistencreated']  =  'Listen created.';
$lang['strlistencreatedbad']  =  'Listen creation failed.';
$lang['strconfdroplisten']  =  'Are you sure you want to drop listen &quot;%s&quot;?';
$lang['strlistendropped']  =  'Listen dropped.';
$lang['strlistendroppedbad']  =  'Listen drop failed.';

	// Slony replication sets
$lang['strrepsets']  =  'Replication sets';
$lang['strnorepsets']  =  'No replication sets found.';
$lang['strcreaterepset']  =  'Create replication set';
$lang['strrepsetcreated']  =  'Replication set created.';
$lang['strrepsetcreatedbad']  =  'Replication set creation failed.';
$lang['strconfdroprepset']  =  'Are you sure you want to drop replication set &quot;%s&quot;?';
$lang['strrepsetdropped']  =  'Replication set dropped.';
$lang['strrepsetdroppedbad']  =  'Replication set drop failed.';
$lang['strmerge']  =  'Merge';
$lang['strmergeinto']  =  'Merge Into';
$lang['strrepsetmerged']  =  'Replication sets merged.';
$lang['strrepsetmergedbad']  =  'Replication sets merge failed.';
$lang['strmove']  =  'Move';
$lang['strneworigin']  =  'New Origin';
$lang['strrepsetmoved']  =  'Replication set moved.';
$lang['strrepsetmovedbad']  =  'Replication set move failed.';
$lang['strnewrepset']  =  'New replication set';
$lang['strlock']  =  'Lock';
$lang['strlocked']  =  'Locked';
$lang['strunlock']  =  'Unlock';
$lang['strconflockrepset']  =  'Are you sure you want to lock replication set &quot;%s&quot;?';
$lang['strrepsetlocked']  =  'Replication set locked.';
$lang['strrepsetlockedbad']  =  'Replication set lock failed.';
$lang['strconfunlockrepset']  =  'Are you sure you want to unlock replication set &quot;%s&quot;?';
$lang['strrepsetunlocked']  =  'Replication set unlocked.';
$lang['strrepsetunlockedbad']  =  'Replication set unlock failed.';
$lang['strexecute']  =  'Execute';
$lang['stronlyonnode']  =  'Only on node';
$lang['strddlscript']  =  'DDL Script';
$lang['strscriptneedsbody']  =  'You must supply a script to be executed on all nodes.';
$lang['strscriptexecuted']  =  'Replication set DDL script executed.';
$lang['strscriptexecutedbad']  =  'Failed executing replication set DDL script.';
$lang['strtabletriggerstoretain']  =  'The following triggers will NOT be disabled by Slony:';

	// Slony tables in replication sets
$lang['straddtable']  =  'Add table';
$lang['strtableneedsuniquekey']  =  'Table to be added requires a primary or unique key.';
$lang['strtableaddedtorepset']  =  'Table added to replication set.';
$lang['strtableaddedtorepsetbad']  =  'Failed adding table to replication set.';
$lang['strconfremovetablefromrepset']  =  'Are you sure you want to remove the table &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strtableremovedfromrepset']  =  'Table removed from replication set.';
$lang['strtableremovedfromrepsetbad']  =  'Failed to remove table from replication set.';

	// Slony sequences in replication sets
$lang['straddsequence']  =  'Add sequence';
$lang['strsequenceaddedtorepset']  =  'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad']  =  'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset']  =  'Are you sure you want to remove the sequence &quot;%s&quot; from replication set &quot;%s&quot;?';
$lang['strsequenceremovedfromrepset']  =  'Sequence removed from replication set.';
$lang['strsequenceremovedfromrepsetbad']  =  'Failed to remove sequence from replication set.';

	// Slony subscriptions
        $lang['strsubscriptions']  =  'Subscripciones';
        $lang['strnosubscriptions']  =  'No se encontraron subscripciones.';

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted est&#225; logueado con usuario &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';
	$lang['strhelp'] = 'Ayuda';
        $lang['strhelpicon']  =  '?';
        $lang['strlogintitle']  =  'Loguearse a %s';
        $lang['strlogoutmsg']  =  'Saliendo de %s';
        $lang['strloading']  =  'Cargando...';
        $lang['strerrorloading']  =  'Error Cargando';
        $lang['strclicktoreload']  =  'Click para recargar';

?>
