<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Martín Marqués (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.19 2003/09/19 01:56:34 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  	$lang['appdbencoding'] = 'LATIN1';

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
	$lang['strserver'] = 'Servidor';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Propietario';
	$lang['straction'] = 'Acción';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definición';
	$lang['straggregates'] = 'Agregados';
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
	$lang['strcolumns'] = 'Columnas';
	$lang['strrows'] = 'fila(s)';
	$lang['strrowsaff'] = 'fila(s) afectadas.';
	$lang['strexample'] = 'ej.';
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
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Ir';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Limpiar';
	$lang['stranalyze'] = 'Analizar';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindexar';
	$lang['strrun'] = 'Ejecutar';
	$lang['stradd'] = 'Agregar';
	$lang['strevent'] = 'Evento';
	$lang['strwhere'] = 'Donde';
	$lang['strinstead'] = 'Hacer en su lugar';
	$lang['strwhen'] = 'Cuando';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Dato';
	$lang['strconfirm'] = 'Confirmar';
	$lang['strexpression'] = 'Expresión';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = 'Expandir';
	$lang['strcollapse'] = 'Colapsar';
        $lang['strexplain'] = 'Explicar';
        $lang['strfind'] = 'Buscar';
        $lang['stroptions'] = 'Opciones';
	$lang['strrefresh'] = 'Refrescar';
	$lang['strdownload'] = 'Bajar';

	// Error handling
	$lang['strnoframes'] = 'Necesitás un navegador con soporte de marcos para usar esta aplicación.';
	$lang['strbadconfig'] = 'Su archivo config.inc.php está desactualizado. Deberá regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versión de PHP no tiene el soporte correcto de bases de datos.';
	$lang['strbadschema'] = 'El esquema especificado no es válido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificación del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaración:';
	$lang['strinvalidparam'] = 'Parámetros de script no válidos.';
	$lang['strnodata'] = 'No se encontraron filas.';
	$lang['strrownotunique'] = 'No existe un identificador único para este registro.';

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
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Falló al intentar actualizar la fila.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = '¿Está seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Falló la eliminación de fila.';
	$lang['strsaveandrepeat'] = 'Guardar y Repetir';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'Número de Campos';
	$lang['strfieldneedsname'] = 'Debe darle un nombre al campo';
        $lang['strselectallfields'] = 'Seleccionar todos los campos.';
	$lang['strselectneedscol'] = 'Debe elegir al menos una columna';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Falló la modificación de columna.';
	$lang['strconfdropcolumn'] = '¿Está seguro que quiere eliminar la columna "%s" de la tabla "%s"?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Falló la eliminación de columna.';
        $lang['straddcolumn'] = 'Agregar Columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Falló el agregado de columna.';
	$lang['strschemaanddata'] = 'Esquema y datos';
	$lang['strschemaonly'] = 'Esquemas solamente';
	$lang['strdataonly'] = 'Datos solamente';
	$lang['strcascade'] = 'CASCADEAR';
	$lang['strtablealtered'] = 'Tabla modificada.';
	$lang['strtablealteredbad'] = 'Falló la modificación  de la Tabla.';

        // Users
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contraseña';
	$lang['strsuper'] = '¿Es administrador?';
	$lang['strcreatedb'] = '¿Puede crear BD?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Falló la actualización del usuario.';
	$lang['strshowallusers'] = 'Mostrar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Falló al crear usuario.';
        $lang['struserdropped'] = 'Usuario eliminado.';
	$lang['strconfdropuser'] = '¿Está seguro que quiere eliminar el usuario "%s"?';
	$lang['struserdroppedbad'] = 'Falló al eliminar el usuario.';
	$lang['straccount'] = 'Cuenta';
	$lang['strchangepassword'] = 'Cambiar Contraseña';
	$lang['strpasswordchanged'] = 'Contraseña modificada.';
	$lang['strpasswordchangedbad'] = 'Falló al modificar contraseña.';
	$lang['strpasswordshort'] = 'La contraseña es muy corta.';
	$lang['strpasswordconfirm'] = 'Las contraseñas no coinciden.';

        // Groups
	$lang['strgroups'] = 'Grupos';
        $lang['strgroup'] = 'Grupo';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Falló la creación del grupo.';
	$lang['strconfdropgroup'] = '¿Está seguro que quiere eliminar el grupo "%s"?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
	$lang['straddmember'] = 'Agregar un miembro';
	$lang['strmemberadded'] = 'Miembro agregado.';
	$lang['strmemberaddedbad'] = 'Falló al intentar agregar nuevo miembro.';
	$lang['strdropmember'] = 'Sacar miembro';
	$lang['strconfdropmember'] = '¿Está seguro que quiere sacra el miembro "%s" del grupo "%s"?';
	$lang['strmemberdropped'] = 'Miembro eliminado.';
	$lang['strmemberdroppedbad'] = 'Falló al inytentar sacar un miembro.';
	$lang['strgroupdroppedbad'] = 'Falló la eliminación del grupo.';
	$lang['strmembers'] = 'Miembros';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados/revocados.';
	$lang['strgrantfailed'] = 'Falló al intendar otorgar privilegios.';
        $lang['strgrantor'] = 'Cedente';
        $lang['strasterisk'] = '*';
	$lang['strgrantbad'] = 'Debe especificar al menos un usuario o grupo y al menos un privilegio.';
	$lang['stralterprivs'] = 'Cambiar Privilegios';

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
	$lang['strconfdropview'] = '¿Está seguro que quiere eliminar la vista "%s"?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'Falló al intentar eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualizada.';
	$lang['strviewupdatedbad'] = 'Falló al actualizar la vista.';

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
	$lang['strindexes'] = 'Índices';
	$lang['strindexname'] = 'Nombre del Índice';
	$lang['strshowallindexes'] = 'Mostrar Todos los Índices';
	$lang['strnoindex'] = 'No se encontró el índice.';
	$lang['strnoindexes'] = 'No se encontraron índices.';
	$lang['strcreateindex'] = 'Crear Índice';
	$lang['strindexname'] = 'Nombre del Índice';
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
	$lang['strindexname'] = 'Nombre del índice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en el Índice';

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
	$lang['strconstraints'] = 'Restricción';
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
	$lang['strcreatefunction'] = 'Crear función';
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

	// Triggers
	$lang['strtrigger'] = 'Gatillo';
	$lang['strtriggers'] = 'Gatillos';
	$lang['strshowalltriggers'] = 'Mostrar todos los gatillos';
	$lang['strnotrigger'] = 'No se encontró el gatillo.';
	$lang['strnotriggers'] = 'No se encontraron gatillos.';
	$lang['strcreatetrigger'] = 'Crear Gatillo';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al gatillo.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una función para el gatillo.';
	$lang['strtriggercreated'] = 'Gatillo creado.';
	$lang['strtriggercreatedbad'] = 'Falló la creación del gatillo.';
	$lang['strconfdroptrigger'] = '¿Está seguro que quiere eliminar el gatillo "%s" en "%s"?';
        $lang['strtriggeraltered'] = 'Gatillo modificado.';
        $lang['strtriggeralteredbad'] = 'Falló la modificación del gatillo.';
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
	$lang['strpassbyval'] = '¿Pasar valor?';
	$lang['stralignment'] = 'Alineamiento';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamiento';
	$lang['strtypeneedsname'] = 'Debe especificar un nombre para el tipo.';
	$lang['strtypeneedslen'] = 'Debe especificar una longitud para el tipo.';
	$lang['strtypecreated'] = 'Tipo creado';
	$lang['strtypecreatedbad'] = 'Falló al crear el tipo.';
	$lang['strconfdroptype'] = '¿Está seguro que quiere eliminar el tipo "%s"?';
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
	$lang['strconfdropschema'] = '¿Está seguro que quiere eliminar el esquema "%s"?';
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
	$lang['strconfdropreport'] = '¿Está seguro que quiere eliminar el reporte "%s"?';
	$lang['strreportneedsname'] = 'Debe especificar un nombre para el reporte.';
	$lang['strreportneedsdef'] = 'Debe especificar un SQL para el reporte.';
	$lang['strreportcreated'] = 'Reporte guardado.';
	$lang['strreportcreatedbad'] = 'Falló al guardar el reporte.';
	$lang['strdomain'] = 'Domain';
	$lang['strdomains'] = 'Domains';
	$lang['strshowalldomains'] = 'Show all domains';
	$lang['strnodomains'] = 'No domains found.';
	$lang['strcreatedomain'] = 'Create Domain';
	$lang['strdomaindropped'] = 'Domain dropped.';
	$lang['strdomaindroppedbad'] = 'Domain drop failed.';
	$lang['strconfdropdomain'] = 'Are you sure you want to drop the domain "%s"?';
	$lang['strdomainneedsname'] = 'You must give a name for your domain.';
	$lang['strdomaincreated'] = 'Domain created.';
	$lang['strdomaincreatedbad'] = 'Failed to create domain.';
	$lang['strdomainaltered'] = 'Domain altered.';
	$lang['strdomainalteredbad'] = 'Failed to alter domain.';

	// Operators
        $lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadores';
	$lang['strshowalloperators'] = 'Mostrar todos los operadoress';
	$lang['strnooperator'] = 'No se encontró el operador.';
	$lang['strnooperators'] = 'No se encontraron operadores.';
	$lang['strcreateoperator'] = 'Crear Operador';
	$lang['stroperatorname'] = 'Nombre del operador';
	$lang['strleftarg'] = 'Tipo de datos del arg. izquierdo';
	$lang['strrightarg'] = 'Tipo de datos del arg. derecho';
	$lang['stroperatorneedsname'] = 'Debe darle un nombre al operador.';
	$lang['stroperatorcreated'] = 'Operador creado';
	$lang['stroperatorcreatedbad'] = 'Falló al intentar crear el operador.';
	$lang['strconfdropoperator'] = '¿Está seguro que quiere eliminar el operador "%s"?';
	$lang['stroperatordropped'] = 'Operador eliminado.';
	$lang['stroperatordroppedbad'] = 'Falló al intentar eliminar el operador.';

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted está logueado con usuario "%s", %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';
	$lang['strhelp'] = 'Ayuda';

?>
