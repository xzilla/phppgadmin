<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Martin Marques (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.7 2003/04/30 01:42:23 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  
	// Basic strings
	$lang['strintro'] = 'Bienvenido a phpPgAdmin.';
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Login falló';
	$lang['strserver'] = 'Servidor';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Propietario';
	$lang['straction'] = 'Acción';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definición';
	$lang['stroperators'] = 'Operadores';
	$lang['straggregates'] = 'Aggregates';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Examinar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminado';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'No Nulo';
	$lang['strprev'] = 'Previo';
	$lang['strnext'] = 'Próximo';
	$lang['strfailed'] = 'Falló';
	$lang['strcreate'] = 'Crear';
	$lang['strcreated'] = 'Creado';
	$lang['strcomment'] = 'Commentario';
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
	$lang['stredit'] = 'Editar';
	$lang['strcolumns'] = 'Columnas';
	$lang['strrows'] = 'fila(s)';
	$lang['strrowsaff'] = 'fila(s) affectadas.';
	$lang['strexample'] = 'eg.';
	$lang['strback'] = 'Atrás';
	$lang['strqueryresults'] = 'Query Results';
	$lang['strshow'] = 'Mostrar';
	$lang['strempty'] = 'Vacío';
	$lang['strlanguage'] = 'Lenguaje';
	$lang['strencoding'] = 'Codificación';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = 'Unico';
	$lang['strprimary'] = 'Primario';
	$lang['strexport'] = 'Exportar';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Ir';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analizar';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindexar';
	$lang['strrun'] = 'Correr';
	$lang['stradd'] = 'Agregar';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'Donde';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'Cuando';
	$lang['strformat'] = 'Formato';

	// Error handling
	$lang['strnoframes'] = 'Necesitas un navegador con soporte de marcos para usar esta aplicación.';
	$lang['strbadconfig'] = 'Su archivo config.inc.php está desactualizado. Deberá regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versión de PHP instalada no tiene el correcto soporte de bases de datos.';
	$lang['strbadschema'] = 'El esquema especificado es invalido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificación del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaración:';
	$lang['strinvalidparam'] = 'Parametros de script invalidos.';
	$lang['strnodata'] = 'No se encontraron filas.';

	// Tables
	$lang['strtable'] = 'Tabla';
	$lang['strtables'] = 'Tablas';
	$lang['strshowalltables'] = 'Mostrar Todas las Tablas';
	$lang['strnotables'] = 'No se encontraron tablas.';
	$lang['strnotable'] = 'No se encontro la tabla.';
	$lang['strcreatetable'] = 'Crear tabla';
	$lang['strtablename'] = 'Nombre de la tabla';
	$lang['strtableneedsname'] = 'Debe darle un nombre a la tabla.';
	$lang['strtableneedsfield'] = 'Debe especificar al menos un campo.';
	$lang['strtableneedscols'] = 'Las tablas requieren un número válido de columnas.';
	$lang['strtablecreated'] = 'Tabla creada.';
	$lang['strtablecreatedbad'] = 'Creación de la tabla falló.';
	$lang['strconfdroptable'] = 'Esta seguro que desea eliminar la tabla "%s"?';
	$lang['strtabledropped'] = 'Tabla eliminada.';
	$lang['strtabledroppedbad'] = 'La eliminación tabla falló.';
	$lang['strconfemptytable'] = 'esta seguro que desea vaciar la tabla "%s"?';
	$lang['strtableemptied'] = 'Tabla vaciada.';
	$lang['strtableemptiedbad'] = 'Vaciado de tabla falló.';
	$lang['strinsertrow'] = 'Insertar Fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'Inserción de fila falló.';
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Actualización de fila falló.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = 'esta seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Eliminación de fila falló.';
	$lang['strsaveandrepeat'] = 'Guardar y Repetir';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'Num. de Campos';
	$lang['strfieldneedsname'] = 'Debe darle un nombre al campo';
	$lang['strselectneedscol'] = 'Debe mostar al menos una columna';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Modificación de columna falló.';
	$lang['strconfdropcolumn'] = 'esta seguro que quiere eliminar la columna "%s" de la tabla "%s"?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Eliminación de columna falló.';
	$lang['straddcolumn'] = 'Agragar columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Agregado de columna falló.';
	$lang['strschemaanddata'] = 'Esquema y datos';
	$lang['strschemaonly'] = 'Esquemas solamente';
	$lang['strdataonly'] = 'Datos solamente';

	// Users
	$lang['struseradmin'] = 'Administración de Usuarios';
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contraseña';
	$lang['strsuper'] = 'Superuser?';
	$lang['strcreatedb'] = 'Crear DB?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Actualización de usuario falló.';
	$lang['strshowallusers'] = 'Mostar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Falló al crear usuario.';
	$lang['strconfdropuser'] = 'Está seguro que quiere eliminar el usuario "%s"?';
	$lang['struserdropped'] = 'Usuario eliminado.';
	$lang['struserdroppedbad'] = 'Falló al eliminar el usuario.';
		
	// Groups
	$lang['strgroupadmin'] = 'Administración de Grupos';
	$lang['strgroup'] = 'Grupo';
	$lang['strgroups'] = 'Grupos';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Creación de grupo falló.';	
	$lang['strconfdropgroup'] = 'Esta seguro que quiere eliminar el grupo "%s"?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
	$lang['strgroupdroppedbad'] = 'Eliminación de grupo falló.';
	$lang['strmembers'] = 'Miembros';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados.';
	$lang['strgrantfailed'] = 'Falló al intendar otorgar privilegios.';
	$lang['strgrantuser'] = 'Otorgar al Usuario';
	$lang['strgrantgroup'] = 'Otorgar al Grupo';

	// Databases
	$lang['strdatabase'] = 'Base de Datos';
	$lang['strdatabases'] = 'Bases de Datos';
	$lang['strshowalldatabases'] = 'Mostrar Todas las Bases de datos';
	$lang['strnodatabase'] = 'No se encontró la Base de Datos.';
	$lang['strnodatabases'] = 'No se encontraron Bases de Datos.';
	$lang['strcreatedatabase'] = 'Crear base de datos';
	$lang['strdatabasename'] = 'Nombre de la base de datos';
	$lang['strdatabaseneedsname'] = 'Debe darle un nombre a la base de datos.';
	$lang['strdatabasecreated'] = 'Base de Datos creada.';
	$lang['strdatabasecreatedbad'] = 'Falló la creación de la base de datos.';	
	$lang['strconfdropdatabase'] = 'Está seguro que quiere eliminar la base de datos "%s"?';
	$lang['strdatabasedropped'] = 'Base de datos eliminada.';
	$lang['strdatabasedroppedbad'] = 'Falló al eliminar la base de datos.';
	$lang['strentersql'] = 'Ingrese la sentencia de SQL para ejecutar abajo:';
	$lang['strsqlexecuted'] = 'SQL ejecutada.';
	$lang['strvacuumgood'] = 'Vacuum completado.';
	$lang['strvacuumbad'] = 'Vacuum falló.';
	$lang['stranalyzegood'] = 'Analisis completado.';
	$lang['stranalyzebad'] = 'Analisis falló.';

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
	$lang['strviewcreated'] = 'Vista creada.';
	$lang['strviewcreatedbad'] = 'Falló al crear la vista.';
	$lang['strconfdropview'] = 'Esta seguro que quiere eliminar la vista "%s"?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'Falló a eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualizada.';
	$lang['strviewupdatedbad'] = 'Falló al actualizar la vista.';

	// Sequences
	$lang['strsequence'] = 'Secuencia';
	$lang['strsequences'] = 'Secuencias';
	$lang['strshowallsequences'] = 'Mostrar todas las secuencias';
	$lang['strnosequence'] = 'No se encontró la secuencia.';
	$lang['strnosequences'] = 'No se encontraron secuencias.';
	$lang['strcreatesequence'] = 'Crear secuencia';
	$lang['strlastvalue'] = 'Ultimo Valor';
	$lang['strincrementby'] = 'Incremento';	
	$lang['strstartvalue'] = 'Valor Inicial';
	$lang['strmaxvalue'] = 'Valor Máximo';
	$lang['strminvalue'] = 'Valor Mínimo';
	$lang['strcachevalue'] = 'Valor de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Rotar?';
	$lang['striscalled'] = 'Nombre?';
	$lang['strsequenceneedsname'] = 'Debe darle un nombre a la secuencia.';
	$lang['strsequencecreated'] = 'Secuencia creada.';
	$lang['strsequencecreatedbad'] = 'Falló la creación de la secuencia.'; 
	$lang['strconfdropsequence'] = 'Esta seguro que quiere eliminar la secuencia "%s"?';
	$lang['strsequencedropped'] = 'Secuencia eliminada.';
	$lang['strsequencedroppedbad'] = 'Falló la eliminación de la secuencia.';

	// Indexes
	$lang['strindexes'] = 'Indices';
	$lang['strindexname'] = 'Nombre del Indice';
	$lang['strshowallindexes'] = 'Mostrar Todos los Indices';
	$lang['strnoindex'] = 'No se encontró el indice.';
	$lang['strnoindexes'] = 'No se encontraron indices.';
	$lang['strcreateindex'] = 'Crear Indice';
	$lang['strindexname'] = 'Nombre del Indice';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nombre de Columna';
	$lang['strindexneedsname'] = 'debe darle un nombre al indice';
	$lang['strindexneedscols'] = 'Los índices requieren un número valido de columnas.';
	$lang['strindexcreated'] = 'Indice creado';
	$lang['strindexcreatedbad'] = 'Falló al crear el índice.';
	$lang['strconfdropindex'] = 'Esta seguro que quiere eliminar el índice "%s"?';
	$lang['strindexdropped'] = 'Indice eliminado.';
	$lang['strindexdroppedbad'] = 'Falló al eliminar el índice.';
	$lang['strkeyname'] = 'Key Name';
	$lang['struniquekey'] = 'Unique Key';
	$lang['strprimarykey'] = 'Primary Key';
 	$lang['strindextype'] = 'Tipo de índice';
	$lang['strindexname'] = 'Nombre de índice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en Indice';

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
	$lang['strconfdroprule'] = 'Esta seguro que quiere eliminar la regla "%s" en "%s"?';
	$lang['strruledropped'] = 'Regla eliminada.';
	$lang['strruledroppedbad'] = 'Falló al eliminar la regla.';

	// Constraints
	$lang['strconstraints'] = 'Restricción';
	$lang['strshowallconstraints'] = 'Mostrar todas las restricciones';
	$lang['strnoconstraints'] = 'No se encontraron restricciones.';
	$lang['strcreateconstraint'] = 'Crear Restricción';
	$lang['strconstraintcreated'] = 'Restricción creada.';
	$lang['strconstraintcreatedbad'] = 'Falló al crear la Restricción.';
	$lang['strconfdropconstraint'] = 'Esta seguro que quiere eliminar la restricción "%s" de "%s"?';
	$lang['strconstraintdropped'] = 'Restricción eliminada.';
	$lang['strconstraintdroppedbad'] = 'Falló al eliminar la restricción.';
	$lang['straddcheck'] = 'Add Check';
	$lang['strcheckneedsdefinition'] = 'Check constraint needs a definition.';
	$lang['strcheckadded'] = 'Check constraint added.';
	$lang['strcheckaddedbad'] = 'Failed to add check constraint.';
	$lang['straddpk'] = 'Add Primary Key';
	$lang['strpkneedscols'] = 'Primary key requires at least one column.';
	$lang['strpkadded'] = 'Primary key added.';
	$lang['strpkaddedbad'] = 'Failed to add primary key.';
	$lang['stradduniq'] = 'Add Unique Key';
	$lang['struniqneedscols'] = 'Unique key requires at least one column.';
	$lang['struniqadded'] = 'Unique key added.';
	$lang['struniqaddedbad'] = 'Failed to add unique key.';
	$lang['straddfk'] = 'Add Foreign Key';
	$lang['strfkneedscols'] = 'Foreign key requires at least one column.';
	$lang['strfkneedstarget'] = 'Foreign key requires a target table.';
	$lang['strfkadded'] = 'Foreign key added.';
	$lang['strfkaddedbad'] = 'Failed to add foreign key.';
	$lang['strfktarget'] = 'Target table';
	$lang['strfkcolumnlist'] = 'Columns in key';
	$lang['strondelete'] = 'AL ELIMINAR';
	$lang['stronupdate'] = 'AL ACTUALIZAR';	

	// Functions
	$lang['strfunction'] = 'Función';
	$lang['strfunctions'] = 'Funciones';
	$lang['strshowallfunctions'] = 'Mostrar todas las funciones';
	$lang['strnofunction'] = 'No se econtró la función.';
	$lang['strnofunctions'] = 'No se encontraron funciones.';
	$lang['strcreatefunction'] = 'Crear función';
	$lang['strfunctionname'] = 'Nombre de la función';
	$lang['strreturns'] = 'Devuelve';
	$lang['strarguments'] = 'Argumentos';
	$lang['strfunctionneedsname'] = 'Debe darle un nombre a la función.';
	$lang['strfunctionneedsdef'] = 'Debe darle una definición a la función.';
	$lang['strfunctioncreated'] = 'Función creada.';
	$lang['strfunctioncreatedbad'] = 'Falló la creación de la función.';
	$lang['strconfdropfunction'] = 'Esta seguro que quiere eliminar la función "%s"?';
	$lang['strfunctiondropped'] = 'Función eliminada.';
	$lang['strfunctiondroppedbad'] = 'Falló al eliminar la función.';
	$lang['strfunctionupdated'] = 'Función updated.';
	$lang['strfunctionupdatedbad'] = 'Falló al actualizar la función.';

	// Triggers
	$lang['strtrigger'] = 'Gatillo';
	$lang['strtriggers'] = 'Gatillos';
	$lang['strshowalltriggers'] = 'Mostrar todos los gatillos';
	$lang['strnotrigger'] = 'No se encontr el gatillo.';
	$lang['strnotriggers'] = 'No se encontraron los gatillos found.';
	$lang['strcreatetrigger'] = 'Crear Gatillo';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al gatillo.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una función para el gatillo.';
	$lang['strtriggercreated'] = 'Gatillo creado.';
	$lang['strtriggercreatedbad'] = 'Falló la creación del gatillo.';
	$lang['strconfdroptrigger'] = 'Esta seguro que quiere eliminar el gatillo "%s" en "%s"?';
	$lang['strtriggerdropped'] = 'Gatillo eliminado.';
	$lang['strtriggerdroppedbad'] = 'Falló al eliminar el gatillo.';

	// Types
	$lang['strtype'] = 'Tipo';
	$lang['strtypes'] = 'Tipos';
	$lang['strshowalltypes'] = 'Mostrar todos los tipos';
	$lang['strnotype'] = 'No se encontro el tipo.';
	$lang['strnotypes'] = 'No se encontraron tipos.';
	$lang['strcreatetype'] = 'Crear Tipo';
	$lang['strtypename'] = 'Nombre del tipo';
	$lang['strinputfn'] = 'Función de entrada';
	$lang['stroutputfn'] = 'Función de salida';
	$lang['strpassbyval'] = 'Pasar por valor?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamiento';
	$lang['strtypeneedsname'] = 'Debe especificar un nombre para el tipo.';
	$lang['strtypeneedslen'] = 'Debe especificar una longitud para el tipo.';
	$lang['strtypecreated'] = 'Tipo creado';
	$lang['strtypecreatedbad'] = 'Falló al crear el tipo.';
	$lang['strconfdroptype'] = 'Esta seguro que quiere eliminar el tipo "%s"?';
	$lang['strtypedropped'] = 'Tipo eliminado.';
	$lang['strtypedroppedbad'] = 'Falló al eliminar el tipo.';

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
	$lang['strconfdropschema'] = 'esta seguro que quiere eliminar el esquema "%s"?';
	$lang['strschemadropped'] = 'Esquema eliminado.';
	$lang['strschemadroppedbad'] = 'Falló al eliminar el esquema.';

	// Reports
	$lang['strreport'] = 'Reporte';
	$lang['strreports'] = 'Reportes';
	$lang['strshowallreports'] = 'Mostrar todos los reportes';
	$lang['strnoreports'] = 'No se encontro el reporte.';
	$lang['strcreatereport'] = 'Crear Reporte';
	$lang['strreportdropped'] = 'Reporte eliminado.';
	$lang['strreportdroppedbad'] = 'Falló al eliminar el Reporte.';
	$lang['strconfdropreport'] = 'Esta seguro que quiere eliminar el reporte "%s"?';
	$lang['strreportneedsname'] = 'Debe especificar un nombre para el reporte.';
	$lang['strreportneedsdef'] = 'Debe especificar un SQL para el reporte.';
	$lang['strreportcreated'] = 'Reporte guardado.';
	$lang['strreportcreatedbad'] = 'Falló al guardar el reporte.';

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted está logueado con usuario "%s", %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';

?>
