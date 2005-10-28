<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Martín Marqués (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.31 2005/10/28 01:57:53 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

        // Bienvenido
	$lang['strintro'] = 'Bienvenido a phpPgAdmin.';
	$lang['strppahome'] = 'Página web de phpPgAdmin';
	$lang['strpgsqlhome'] = 'Página web de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentación de PostgreSQL (local)';
	$lang['strreportbug'] = 'Reportar problemas';
	$lang['strviewfaq'] = 'Ver Preguntas Frecuentes';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Autenticar';
	$lang['strloginfailed'] = 'Falló la autenticación';
	$lang['strlogindisallowed'] = 'Ingreso no autorizado';
	$lang['strserver'] = 'Servidor';
        $lang['strservers']  =  'Servidores';
        $lang['strintroduction']  =  'Introducción';
        $lang['strhost']  =  'Host';
        $lang['strport']  =  'Puerto';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Dueño';
	$lang['straction'] = 'Acción';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definición';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Examinar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminado';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'No Nulo';
	$lang['strprev'] = 'Previo';
	$lang['strnext'] = 'Próximo';
        $lang['strfirst'] = '<< Principio';
        $lang['strlast'] = 'Final >>';
	$lang['strfailed'] = 'Falló';
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
	$lang['strback'] = 'Atrás';
	$lang['strqueryresults'] = 'Resultado de la consulta';
	$lang['strshow'] = 'Mostrar';
	$lang['strempty'] = 'Vaciar';
	$lang['strlanguage'] = 'Idioma';
	$lang['strencoding'] = 'Codificación';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = 'Único';
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
	$lang['strclustered'] = '¿Tabla Ordenada?';
	$lang['strreindex'] = 'Reindexar';
	$lang['strrun'] = 'Ejecutar';
	$lang['stradd'] = 'Agregar';
        $lang['strremove']  =  'Remover';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'Dónde';
	$lang['strinstead'] = 'Hacer en su lugar';
	$lang['strwhen'] = 'Cuándo';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Dato';
	$lang['strconfirm'] = 'Confirmar';
	$lang['strexpression'] = 'Expresión';
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
	$lang['strinfo'] = 'Información';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Avanzado';
	$lang['strvariables'] = 'Variables';
	$lang['strprocess'] = 'Proceso';
	$lang['strprocesses'] = 'Procesos';
	$lang['strsetting'] = 'Setear';
	$lang['streditsql'] = 'Editar SQL';
	$lang['strruntime'] = 'Tiempo total de ejecución: %s ms';
	$lang['strpaginate'] = 'Paginar resultados';
	$lang['struploadscript'] = 'o subir un script SQL:';
	$lang['strstarttime'] = 'Hora de comienzo';
	$lang['strfile'] = 'Archivo';
	$lang['strfileimported'] = 'Archivo importado.';
        $lang['strtrycred']  =  'Usar el mismo par usuario/contraseña para todos los servidores';

	// Error handling
        $lang['strnoframes']  =  'Esta aplicación funciona mejor con un navegador con soporte para marcos, pero puede usarse sin marcos siguiendo el link de abajo.';
        $lang['strnoframeslink']  =  'Usar sin marcos';
	$lang['strbadconfig'] = 'Su archivo config.inc.php está desactualizado. Deberá regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versión de PHP no tiene el soporte correcto de bases de datos.';
        $lang['strpostgresqlversionnotsupported']  =  'Su versión de PostgreSQL no está soportado. Por favor actualice a la versión %s o más reciente.';
	$lang['strbadschema'] = 'El esquema especificado no es válido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificación del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaración:';
	$lang['strinvalidparam'] = 'Parámetros de script no válidos.';
	$lang['strnodata'] = 'No se encontraron filas.';
	$lang['strnoobjects'] = 'No se encontraron objetos.';
	$lang['strrownotunique'] = 'No existe un identificador único para este registro.';
	$lang['strnoreportsdb'] = 'No ha creado aún la base de datos para los reportes. Lea las instrucciones del archivo INSTALL.';
	$lang['strnouploads'] = 'Está deshabilitada la subida de archivos.';
	$lang['strimporterror'] = 'Error de importación.';
        $lang['strimporterror-fileformat']  =  'Error de importacion de datos: Falló al intentar determinar el formato del archivo.';
	$lang['strimporterrorline'] = 'Error de importación en la línea %s.';
        $lang['strimporterrorline-badcolumnnum']  =  'Error de importación en la línea %s:  La línea no posee la cantidad de columnas correctas.';
        $lang['strimporterror-uploadedfile']  =  'Error de importación: No se ha podido subir el archivo al servidor';
        $lang['strcannotdumponwindows']  =  'Vuelco de datos con nombres complejos de tablas y esquemas no esta soportado en Windows.';

	// Tables
	$lang['strtable'] = 'Tabla';
	$lang['strtables'] = 'Tablas';
	$lang['strshowalltables'] = 'Mostrar Todas las Tablas';
	$lang['strnotables'] = 'No se encontraron tablas.';
	$lang['strnotable'] = 'No se encontró la tabla.';
	$lang['strcreatetable'] = 'Crear tabla';
	$lang['strtablename'] = 'Nombre de la tabla';
	$lang['strtableneedsname'] = 'Debe darle un nombre a la tabla.';
	$lang['strtableneedsfield'] = 'Debe especificar al menos un campo.';
	$lang['strtableneedscols'] = 'Las tablas requieren un número válido de columnas.';
	$lang['strtablecreated'] = 'Tabla creada.';
	$lang['strtablecreatedbad'] = 'Falló al tratar crear la tabla.';
	$lang['strconfdroptable'] = '¿Está seguro que desea eliminar la tabla "%s"?';
	$lang['strtabledropped'] = 'Tabla eliminada.';
	$lang['strtabledroppedbad'] = 'Falló al tratar de eliminar la tabla.';
	$lang['strconfemptytable'] = '¿Está seguro que desea vaciar la tabla "%s"?';
	$lang['strtableemptied'] = 'Tabla vaciada.';
	$lang['strtableemptiedbad'] = 'Falló el vaciado de la tabla.';
	$lang['strinsertrow'] = 'Insertar Fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'Falló la inserción de fila.';
        $lang['strrowduplicate']  =  'Inserción de fila falló, intentado hacer una duplicación de inserción.';
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Falló al intentar actualizar la fila.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = '¿Está seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Falló la eliminación de fila.';
        $lang['strinsertandrepeat']  =  'Insertar y Repite';
        $lang['strnumcols']  =  'Cantidad de columnas';
        $lang['strcolneedsname']  =  'Debe especificar un nombre para la columna';
        $lang['strselectallfields'] = 'Seleccionar todos los campos.';
	$lang['strselectneedscol'] = 'Debe elegir al menos una columna';
	$lang['strselectunary'] = 'Operaciones unitarias no pueden tener valores.';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Falló la modificación de columna.';
	$lang['strconfdropcolumn'] = '¿Está seguro que quiere eliminar la columna "%s" de la tabla "%s"?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Falló la eliminación de columna.';
        $lang['straddcolumn'] = 'Agregar Columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Falló el agregado de columna.';
	$lang['strcascade'] = 'EN CASCADA';
	$lang['strtablealtered'] = 'Tabla modificada.';
	$lang['strtablealteredbad'] = 'Falló la modificación  de la Tabla.';
        $lang['strdataonly'] = 'Datos solamente';
	$lang['strstructureonly'] = 'Solo la estructura';
	$lang['strstructureanddata'] = 'Estructura y datos';
	$lang['strtabbed'] = 'Tabulado';
	$lang['strauto'] = 'Automático';
        $lang['strconfvacuumtable']  =  'Esta seguro que quiere limpiar "%s"?';
        $lang['strestimatedrowcount']  =  'Estimación de filas';

        // Users
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contraseña';
	$lang['strsuper'] = '¿Es administrador?';
	$lang['strcreatedb'] = '¿Puede crear BD?';
	$lang['strexpires'] = 'Expira';
	$lang['strsessiondefaults'] = 'Valores predeterminados de la sesión.';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Falló la actualización del usuario.';
	$lang['strshowallusers'] = 'Mostrar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['struserneedsname'] = 'Debe dar un nombre a su usuario.';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Falló al crear usuario.';
	$lang['strconfdropuser'] = '¿Está seguro que quiere eliminar el usuario "%s"?';
        $lang['struserdropped'] = 'Usuario eliminado.';
	$lang['struserdroppedbad'] = 'Falló al eliminar el usuario.';
	$lang['straccount'] = 'Cuenta';
	$lang['strchangepassword'] = 'Cambiar Contraseña';
	$lang['strpasswordchanged'] = 'Contraseña modificada.';
	$lang['strpasswordchangedbad'] = 'Falló al modificar contraseña.';
	$lang['strpasswordshort'] = 'La contraseña es muy corta.';
	$lang['strpasswordconfirm'] = 'Las contraseñas no coinciden.';

        // Groups
        $lang['strgroup'] = 'Grupo';
	$lang['strgroups']  =  'Grupos';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Falló la creación del grupo.';
	$lang['strconfdropgroup'] = '¿Está seguro que quiere eliminar el grupo "%s"?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
        $lang['strgroupdroppedbad'] = 'Falló la eliminación del grupo.';
        $lang['strmembers'] = 'Miembros';
	$lang['straddmember'] = 'Agregar un miembro';
	$lang['strmemberadded'] = 'Miembro agregado.';
	$lang['strmemberaddedbad'] = 'Falló al intentar agregar nuevo miembro.';
	$lang['strdropmember'] = 'Sacar miembro';
	$lang['strconfdropmember'] = '¿Está seguro que quiere sacra el miembro "%s" del grupo "%s"?';
	$lang['strmemberdropped'] = 'Miembro eliminado.';
	$lang['strmemberdroppedbad'] = 'Falló al intentar sacar un miembro.';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados/revocados.';
	$lang['strgrantfailed'] = 'Falló al intentar otorgar privilegios.';
	$lang['strgrantbad'] = 'Debe especificar al menos un usuario o grupo y al menos un privilegio.';
	$lang['strgrantor']  =  'Cedente';
	$lang['strasterisk']  =  '*';

	// Databases
	$lang['strdatabase'] = 'Base de Datos';
	$lang['strdatabases'] = 'Bases de Datos';
	$lang['strshowalldatabases'] = 'Mostrar Todas las Bases de Datos';
	$lang['strnodatabase'] = 'No se encontró la Base de Datos.';
	$lang['strnodatabases'] = 'No se encontraron Bases de Datos.';
	$lang['strcreatedatabase'] = 'Crear base de datos';
	$lang['strdatabasename'] = 'Nombre de la base de datos';
	$lang['strdatabaseneedsname'] = 'Debe darle un nombre a la base de datos.';
	$lang['strdatabasecreated'] = 'Base de Datos creada.';
	$lang['strdatabasecreatedbad'] = 'Falló la creación de la base de datos.';	
	$lang['strconfdropdatabase'] = '¿Está seguro que quiere eliminar la base de datos "%s"?';
	$lang['strdatabasedropped'] = 'Base de datos eliminada.';
	$lang['strdatabasedroppedbad'] = 'Falló al eliminar la base de datos.';
	$lang['strentersql'] = 'Ingrese la sentencia de SQL para ejecutar:';
	$lang['strsqlexecuted'] = 'SQL ejecutada.';
	$lang['strvacuumgood'] = 'Limpieza completada.';
	$lang['strvacuumbad'] = 'Falló al intentar limpiar.';
	$lang['stranalyzegood'] = 'Análisis completado.';
	$lang['stranalyzebad'] = 'Falló al intentar analizar.';
	$lang['strreindexgood'] = 'Reindexado completo.';
	$lang['strreindexbad'] = 'Falló el reindexado.';
	$lang['strfull'] = 'Full';
	$lang['strfreeze'] = 'Freeze';
	$lang['strforce'] = 'Force';
        $lang['strsignalsent']  =  'Señal enviada.';
        $lang['strsignalsentbad']  =  'Falló el envío de la señal.';
        $lang['strallobjects']  =  'Todos los objetos';
        $lang['strdatabasealtered']  =  'Base de Datos alterada.';
        $lang['strdatabasealteredbad']  =  'Falló al intentar alterar la Base de Datos.';

	// Views
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Vistas';
	$lang['strshowallviews'] = 'Mostrar todas las vistas';
	$lang['strnoview'] = 'No se encontró la vista.';
	$lang['strnoviews'] = 'No se encontraron vistas.';
	$lang['strcreateview'] = 'Crear Vista';
	$lang['strviewname'] = 'Nombre de Vista';
	$lang['strviewneedsname'] = 'Debe darle un nombre a la vista.';
	$lang['strviewneedsdef'] = 'Debe darle una definición a su vista.';
        $lang['strviewneedsfields'] = 'Seleccione por favor los campos que desea en su vista.';
	$lang['strviewcreated'] = 'Vista creada.';
	$lang['strviewcreatedbad'] = 'Falló al crear la vista.';
	$lang['strconfdropview'] = '¿Está seguro que quiere eliminar la vista "%s"?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'Falló al intentar eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualizada.';
	$lang['strviewupdatedbad'] = 'Falló al actualizar la vista.';
	$lang['strviewlink'] = 'Linking Keys';
	$lang['strviewconditions'] = 'Additional Conditions';
	$lang['strcreateviewwiz'] = 'Crear vista con Asistente';

	// Sequences
	$lang['strsequence'] = 'Secuencia';
	$lang['strsequences'] = 'Secuencias';
	$lang['strshowallsequences'] = 'Mostrar todas las secuencias';
	$lang['strnosequence'] = 'No se encontró la secuencia.';
	$lang['strnosequences'] = 'No se encontraron secuencias.';
	$lang['strcreatesequence'] = 'Crear secuencia';
	$lang['strlastvalue'] = 'Último Valor';
	$lang['strincrementby'] = 'Incremento';	
	$lang['strstartvalue'] = 'Valor Inicial';
	$lang['strmaxvalue'] = 'Valor Máximo';
	$lang['strminvalue'] = 'Valor Mínimo';
	$lang['strcachevalue'] = 'Valor de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = '¿Rotar?';
	$lang['striscalled'] = '¿Nombre?';
	$lang['strsequenceneedsname'] = 'Debe darle un nombre a la secuencia.';
	$lang['strsequencecreated'] = 'Secuencia creada.';
	$lang['strsequencecreatedbad'] = 'Falló la creación de la secuencia.'; 
	$lang['strconfdropsequence'] = '¿Está seguro que quiere eliminar la secuencia "%s"?';
	$lang['strsequencedropped'] = 'Secuencia eliminada.';
	$lang['strsequencedroppedbad'] = 'Falló la eliminación de la secuencia.';
	$lang['strsequencereset'] = 'Secuencia reiniciada.';
	$lang['strsequenceresetbad'] = 'Falló al intentar reiniciar la secuencia.'; 

	// Indexes
	$lang['strindex'] = 'Índice';
	$lang['strindexes'] = 'Índices';
	$lang['strindexname'] = 'Nombre del Índice';
	$lang['strshowallindexes'] = 'Mostrar Todos los Índices';
	$lang['strnoindex'] = 'No se encontró el índice.';
	$lang['strnoindexes'] = 'No se encontraron índices.';
	$lang['strcreateindex'] = 'Crear Índice';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nombre de Columna';
	$lang['strindexneedsname'] = 'Debe darle un nombre al índice';
	$lang['strindexneedscols'] = 'Los índices requieren un número válido de columnas.';
	$lang['strindexcreated'] = 'Índice creado';
	$lang['strindexcreatedbad'] = 'Falló al crear el índice.';
	$lang['strconfdropindex'] = '¿Está seguro que quiere eliminar el índice "%s"?';
	$lang['strindexdropped'] = 'Índice eliminado.';
	$lang['strindexdroppedbad'] = 'Falló al eliminar el índice.';
	$lang['strkeyname'] = 'Nombre de la llave';
	$lang['struniquekey'] = 'Llave única';
	$lang['strprimarykey'] = 'Llave primaria';
 	$lang['strindextype'] = 'Tipo de índice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en el Índice';
	$lang['strconfcluster'] = 'Está seguro que quiere ordenar la tabla "%s"?';
	$lang['strclusteredgood'] = 'Ordenado completo.';
	$lang['strclusteredbad'] = 'Falló al ordenar tabla.';

	// Rules
	$lang['strrules'] = 'Reglas';
	$lang['strrule'] = 'Regla';
	$lang['strshowallrules'] = 'Mostrar todas las reglas';
	$lang['strnorule'] = 'No se encontró la regla.';
	$lang['strnorules'] = 'No se encontraron reglas.';
	$lang['strcreaterule'] = 'Crear regla';
	$lang['strrulename'] = 'Nombre de regla';
	$lang['strruleneedsname'] = 'Debe darle un nombre a la regla.';
	$lang['strrulecreated'] = 'Regla creada.';
	$lang['strrulecreatedbad'] = 'Falló al crear la regla.';
	$lang['strconfdroprule'] = '¿Está seguro que quiere eliminar la regla "%s" en "%s"?';
	$lang['strruledropped'] = 'Regla eliminada.';
	$lang['strruledroppedbad'] = 'Falló al eliminar la regla.';

	// Constraints
        $lang['strconstraint']  =  'Restricción';
	$lang['strconstraints'] = 'Restricciones';
	$lang['strshowallconstraints'] = 'Mostrar todas las restricciones';
	$lang['strnoconstraints'] = 'No se encontraron restricciones.';
	$lang['strcreateconstraint'] = 'Crear Restricción';
	$lang['strconstraintcreated'] = 'Restricción creada.';
	$lang['strconstraintcreatedbad'] = 'Falló al crear la Restricción.';
	$lang['strconfdropconstraint'] = '¿Está seguro que quiere eliminar la restricción "%s" de "%s"?';
	$lang['strconstraintdropped'] = 'Restricción eliminada.';
	$lang['strconstraintdroppedbad'] = 'Falló al eliminar la restricción.';
	$lang['straddcheck'] = 'Agregar chequeo';
	$lang['strcheckneedsdefinition'] = 'Restricción de chequeo necesita una definición.';
	$lang['strcheckadded'] = 'Restricción de chequeo agregada.';
	$lang['strcheckaddedbad'] = 'Falló al intentar agregar restricción de chequeo.';
	$lang['straddpk'] = 'Agregar llave primaria';
	$lang['strpkneedscols'] = 'Llave primaria necesita al menos un campo.';
	$lang['strpkadded'] = 'Llave primaria agregada.';
	$lang['strpkaddedbad'] = 'Falló al intentar crear la llave primaria.';
	$lang['stradduniq'] = 'Agregar llave única';
	$lang['struniqneedscols'] = 'Llave única necesita al menos un campo.';
	$lang['struniqadded'] = 'Agregar llave única.';
	$lang['struniqaddedbad'] = 'Falló al intentar agregar la llave única.';
	$lang['straddfk'] = 'Agregar referencia';
	$lang['strfkneedscols'] = 'Referencia necesita al menos un campo.';
	$lang['strfkneedstarget'] = 'Referencia necesita una tabla para referenciar.';
	$lang['strfkadded'] = 'Referencia agregada.';
	$lang['strfkaddedbad'] = 'Falló al agregar la referencia.';
	$lang['strfktarget'] = 'Tabla de destino';
	$lang['strfkcolumnlist'] = 'Campos en la llave';
	$lang['strondelete'] = 'AL ELIMINAR';
	$lang['stronupdate'] = 'AL ACTUALIZAR';

	// Functions
	$lang['strfunction'] = 'Función';
	$lang['strfunctions'] = 'Funciones';
	$lang['strshowallfunctions'] = 'Mostrar todas las funciones';
	$lang['strnofunction'] = 'No se encontró la función.';
	$lang['strnofunctions'] = 'No se encontraron funciones.';
        $lang['strcreateplfunction']  =  'Crear función SQL/PL';
        $lang['strcreateinternalfunction']  =  'Crear función interna';
        $lang['strcreatecfunction']  =  'Crear función en C';
	$lang['strfunctionname'] = 'Nombre de la función';
	$lang['strreturns'] = 'Devuelve';
	$lang['strarguments'] = 'Argumentos';
        $lang['strproglanguage'] = 'Lenguaje de programación';
	$lang['strfunctionneedsname'] = 'Debe darle un nombre a la función.';
	$lang['strfunctionneedsdef'] = 'Debe darle una definición a la función.';
	$lang['strfunctioncreated'] = 'Función creada.';
	$lang['strfunctioncreatedbad'] = 'Falló la creación de la función.';
	$lang['strconfdropfunction'] = '¿Está seguro que quiere eliminar la función "%s"?';
	$lang['strfunctiondropped'] = 'Función eliminada.';
	$lang['strfunctiondroppedbad'] = 'Falló al eliminar la función.';
	$lang['strfunctionupdated'] = 'Función actualizada.';
	$lang['strfunctionupdatedbad'] = 'Falló al actualizar la función.';
        $lang['strobjectfile']  =  'Archivo de objeto';
        $lang['strlinksymbol']  =  'Vinculo simbólico';

	// Triggers
	$lang['strtrigger'] = 'Disparador';
	$lang['strtriggers'] = 'Disparadores';
	$lang['strshowalltriggers'] = 'Mostrar todos los disparadores';
	$lang['strnotrigger'] = 'No se encontró el disparador.';
	$lang['strnotriggers'] = 'No se encontraron disparadores.';
	$lang['strcreatetrigger'] = 'Crear Disparador';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al disparador.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una función para el disparador.';
	$lang['strtriggercreated'] = 'Disparador creado.';
	$lang['strtriggercreatedbad'] = 'Falló la creación del disparador.';
	$lang['strconfdroptrigger'] = '¿Está seguro que quiere eliminar el disparador "%s" en "%s"?';
	$lang['strtriggerdropped'] = 'Disparador eliminado.';
	$lang['strtriggerdroppedbad'] = 'Falló al eliminar el disparador.';
        $lang['strtriggeraltered'] = 'Disparador modificado.';
        $lang['strtriggeralteredbad'] = 'Falló la modificación del disparador.';
        $lang['strforeach']  =  'Para cada uno';

	// Types
	$lang['strtype'] = 'Tipo de dato';
	$lang['strtypes'] = 'Tipos de datos';
	$lang['strshowalltypes'] = 'Mostrar todos los tipos';
	$lang['strnotype'] = 'No se encontró el tipo.';
	$lang['strnotypes'] = 'No se encontraron tipos.';
	$lang['strcreatetype'] = 'Crear Tipo';
        $lang['strcreatecomptype']  =  'Crear tipo compuesto';
        $lang['strtypeneedsfield']  =  'Debe especificar al menos un campo.';
        $lang['strtypeneedscols']  =  'Tipos compuestos requieren de un número valido de columnas.';	
	$lang['strtypename'] = 'Nombre del tipo';
	$lang['strinputfn'] = 'Función de entrada';
	$lang['stroutputfn'] = 'Función de salida';
	$lang['strpassbyval'] = '¿Pasar valor?';
	$lang['stralignment'] = 'Alineamiento';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamiento';
        $lang['strfield']  =  'Campo';
        $lang['strnumfields']  =  'Cantidad de campos';
	$lang['strtypeneedsname'] = 'Debe especificar un nombre para el tipo.';
	$lang['strtypeneedslen'] = 'Debe especificar una longitud para el tipo.';
	$lang['strtypecreated'] = 'Tipo creado';
	$lang['strtypecreatedbad'] = 'Falló al crear el tipo.';
	$lang['strconfdroptype'] = '¿Está seguro que quiere eliminar el tipo "%s"?';
	$lang['strtypedropped'] = 'Tipo eliminado.';
	$lang['strtypedroppedbad'] = 'Falló al eliminar el tipo.';
        $lang['strflavor']  =  'Tipo';
        $lang['strbasetype']  =  'Base';
        $lang['strcompositetype']  =  'Compuesto';
        $lang['strpseudotype']  =  'Pseudo';

	// Schemas
	$lang['strschema'] = 'Esquema';
	$lang['strschemas'] = 'Esquemas';
	$lang['strshowallschemas'] = 'Mostrar Todos los Esquemas';
	$lang['strnoschema'] = 'No se encontró el esquema.';
	$lang['strnoschemas'] = 'No se encontraron esquemas.';
	$lang['strcreateschema'] = 'Crear Esquema';
	$lang['strschemaname'] = 'Nombre del esquema';
	$lang['strschemaneedsname'] = 'Debe especificar un nombre para el esquema.';
	$lang['strschemacreated'] = 'Esquema creado';
	$lang['strschemacreatedbad'] = 'Falló al crear el esquema.';
	$lang['strconfdropschema'] = '¿Está seguro que quiere eliminar el esquema "%s"?';
	$lang['strschemadropped'] = 'Esquema eliminado.';
	$lang['strschemadroppedbad'] = 'Falló al eliminar el esquema.';
	$lang['strschemaaltered'] = 'Esquema modificado.';
	$lang['strschemaalteredbad'] = 'Modificación del esquema falló.';
        $lang['strsearchpath']  =  'Orden de busqueda en esquemas';

	// Reports
	$lang['strreport'] = 'Reporte';
	$lang['strreports'] = 'Reportes';
	$lang['strshowallreports'] = 'Mostrar todos los reportes';
	$lang['strnoreports'] = 'No se encontró el reporte.';
	$lang['strcreatereport'] = 'Crear Reporte';
	$lang['strreportdropped'] = 'Reporte eliminado.';
	$lang['strreportdroppedbad'] = 'Falló al eliminar el Reporte.';
	$lang['strconfdropreport'] = '¿Está seguro que quiere eliminar el reporte "%s"?';
	$lang['strreportneedsname'] = 'Debe especificar un nombre para el reporte.';
	$lang['strreportneedsdef'] = 'Debe especificar un SQL para el reporte.';
	$lang['strreportcreated'] = 'Reporte guardado.';
	$lang['strreportcreatedbad'] = 'Falló al guardar el reporte.';
	$lang['strdomain'] = 'Dominio';
	$lang['strdomains'] = 'Dominios';
	$lang['strshowalldomains'] = 'Mostrar todos los dominios';
	$lang['strnodomains'] = 'No se encontraron dominios.';
	$lang['strcreatedomain'] = 'Crear dominio';
	$lang['strdomaindropped'] = 'Dominio eliminado.';
	$lang['strdomaindroppedbad'] = 'Falló al intentar eliminar el dominio.';
	$lang['strconfdropdomain'] = 'Esta seguro que quiere eliminar el dominio "%s"?';
	$lang['strdomainneedsname'] = 'Debe dar un nombre para el dominio.';
	$lang['strdomaincreated'] = 'Dominio creado.';
	$lang['strdomaincreatedbad'] = 'Falló al intentar crear el dominio.';
	$lang['strdomainaltered'] = 'Dominio modificado.';
	$lang['strdomainalteredbad'] = 'Falló al intentar modificar el dominio.';

	// Operators
        $lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadores';
	$lang['strshowalloperators'] = 'Mostrar todos los operadores';
	$lang['strnooperator'] = 'No se encontró el operador.';
	$lang['strnooperators'] = 'No se encontraron operadores.';
	$lang['strcreateoperator'] = 'Crear Operador';
	$lang['strleftarg'] = 'Tipo de datos del arg. izquierdo';
	$lang['strrightarg'] = 'Tipo de datos del arg. derecho';
	$lang['strcommutator'] = 'Conmutador';
	$lang['strnegator'] = 'Negación';
	$lang['strrestrict'] = 'Restringir';
	$lang['strjoin'] = 'Unión';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Fusiones';
	$lang['strleftsort'] = 'Ordenado izquierdo';
	$lang['strrightsort'] = 'Ordenado derecho';
	$lang['strlessthan'] = 'Menor que';
	$lang['strgreaterthan'] = 'Mayor que';
	$lang['stroperatorneedsname'] = 'Debe darle un nombre al operador.';
	$lang['stroperatorcreated'] = 'Operador creado';
	$lang['stroperatorcreatedbad'] = 'Falló al intentar crear el operador.';
	$lang['strconfdropoperator'] = '¿Está seguro que quiere eliminar el operador "%s"?';
	$lang['stroperatordropped'] = 'Operador eliminado.';
	$lang['stroperatordroppedbad'] = 'Falló al intentar eliminar el operador.';

	// Casts
	$lang['strcasts'] = 'Conversión de tipos';
	$lang['strnocasts'] = 'No se encontraron conversiones.';
	$lang['strsourcetype'] = 'Tipo inicial';
	$lang['strtargettype'] = 'Tipo final';
	$lang['strimplicit'] = 'Implícito';
	$lang['strinassignment'] = 'En asignación';
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
	$lang['strnoinfo'] = 'No hay información disponible.';
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
	$lang['straccessmethod'] = 'Método de acceso';

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
        $lang['strlocation']  =  'Ubicación';
        $lang['strtablespaceneedsname']  =  'Debe darle un nombre al tablespace.';
        $lang['strtablespaceneedsloc']  =  'Debe dar un directorio en donde crear el tablespace.';
        $lang['strtablespacecreated']  =  'Tablespace creado.';
        $lang['strtablespacecreatedbad']  =  'Falló la creación del tablespace.';
        $lang['strconfdroptablespace']  =  'Esta seguro que quiere eliminar el tablespace "%s"?';
        $lang['strtablespacedropped']  =  'Tablespace eliminado.';
        $lang['strtablespacedroppedbad']  =  'Falló al intenta eliminar el tablespace.';
        $lang['strtablespacealtered']  =  'Tablespace modificado.';
        $lang['strtablespacealteredbad']  =  'Falló la modificación del Tablespace.';

	// Slony clusters
$lang['strcluster']  =  'Cluster';
$lang['strnoclusters']  =  'No clusters found.';
$lang['strconfdropcluster']  =  'Are you sure you want to drop cluster "%s"?';
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
$lang['strconfdropnode']  =  'Are you sure you want to drop node "%s"?';
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
$lang['strconfdroppath']  =  'Are you sure you want to drop path "%s"?';
$lang['strpathdropped']  =  'Path dropped.';
$lang['strpathdroppedbad']  =  'Path drop failed.';

	// Slony listens
$lang['strlistens']  =  'Listens';
$lang['strnolistens']  =  'No listens found.';
$lang['strcreatelisten']  =  'Create listen';
$lang['strlistencreated']  =  'Listen created.';
$lang['strlistencreatedbad']  =  'Listen creation failed.';
$lang['strconfdroplisten']  =  'Are you sure you want to drop listen "%s"?';
$lang['strlistendropped']  =  'Listen dropped.';
$lang['strlistendroppedbad']  =  'Listen drop failed.';

	// Slony replication sets
$lang['strrepsets']  =  'Replication sets';
$lang['strnorepsets']  =  'No replication sets found.';
$lang['strcreaterepset']  =  'Create replication set';
$lang['strrepsetcreated']  =  'Replication set created.';
$lang['strrepsetcreatedbad']  =  'Replication set creation failed.';
$lang['strconfdroprepset']  =  'Are you sure you want to drop replication set "%s"?';
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
$lang['strconflockrepset']  =  'Are you sure you want to lock replication set "%s"?';
$lang['strrepsetlocked']  =  'Replication set locked.';
$lang['strrepsetlockedbad']  =  'Replication set lock failed.';
$lang['strconfunlockrepset']  =  'Are you sure you want to unlock replication set "%s"?';
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
$lang['strconfremovetablefromrepset']  =  'Are you sure you want to remove the table "%s" from replication set "%s"?';
$lang['strtableremovedfromrepset']  =  'Table removed from replication set.';
$lang['strtableremovedfromrepsetbad']  =  'Failed to remove table from replication set.';

	// Slony sequences in replication sets
$lang['straddsequence']  =  'Add sequence';
$lang['strsequenceaddedtorepset']  =  'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad']  =  'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset']  =  'Are you sure you want to remove the sequence "%s" from replication set "%s"?';
$lang['strsequenceremovedfromrepset']  =  'Sequence removed from replication set.';
$lang['strsequenceremovedfromrepsetbad']  =  'Failed to remove sequence from replication set.';

	// Slony subscriptions
        $lang['strsubscriptions']  =  'Subscripciones';
        $lang['strnosubscriptions']  =  'No se encontraron subscripciones.';

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted está logueado con usuario "%s", %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';
	$lang['strhelp'] = 'Ayuda';
        $lang['strhelpicon']  =  '?';
        $lang['strlogintitle']  =  'Loguearse a %s';
        $lang['strlogoutmsg']  =  'Saliendo de %s';
        $lang['strloading']  =  'Cargando...';
        $lang['strerrorloading']  =  'Error Cargando';
        $lang['strclicktoreload']  =  'Click para recargar';

?>
