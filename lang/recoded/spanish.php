<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Mart&iacute;n Marqu&eacute;s (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.21 2004/01/03 07:05:45 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  	$lang['appdbencoding'] = 'LATIN1';

        // Bienvenido
	$lang['strintro'] = 'Bienvenido a phpPgAdmin.';
	$lang['strppahome'] = 'P&aacute;gina web de phpPgAdmin';
	$lang['strpgsqlhome'] = 'P&aacute;gina web de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentaci&oacute;n de PostgreSQL (local)';
	$lang['strreportbug'] = 'Reportar problemas';
	$lang['strviewfaq'] = 'Ver Preguntas Frecuentes';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Autenticar';
	$lang['strloginfailed'] = 'Fall&oacute; la autenticaci&oacute;n';
	$lang['strlogindisallowed'] = 'Ingreso no autorizado';
	$lang['strserver'] = 'Servidor';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Propietario';
	$lang['straction'] = 'Acci&oacute;n';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definici&oacute;n';
	$lang['straggregates'] = 'Agregados';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Examinar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminado';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'No Nulo';
	$lang['strprev'] = 'Previo';
	$lang['strnext'] = 'Pr&oacute;ximo';
        $lang['strfirst'] = '<< Principio';
        $lang['strlast'] = 'Final >>';
	$lang['strfailed'] = 'Fall&oacute;';
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
	$lang['strobjects'] = 'objecto(s)';
	$lang['strexample'] = 'ej.';
	$lang['strback'] = 'Atr&aacute;s';
	$lang['strqueryresults'] = 'Resultado de la consulta';
	$lang['strshow'] = 'Mostrar';
	$lang['strempty'] = 'Vaciar';
	$lang['strlanguage'] = 'Idioma';
	$lang['strencoding'] = 'Codificaci&oacute;n';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = '&Uacute;nico';
	$lang['strprimary'] = 'Primaria';
	$lang['strexport'] = 'Exportar';
	$lang['strimport'] = 'Importar';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Seguir';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Limpiar';
	$lang['stranalyze'] = 'Analizar';
	$lang['strcluster'] = 'Ordenar tabla';
	$lang['strclustered'] = '&iquest;Tabla Ordenada?';
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
	$lang['strexpression'] = 'Expresi&oacute;n';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = 'Expandir';
	$lang['strcollapse'] = 'Colapsar';
        $lang['strexplain'] = 'Explicar';
        $lang['strfind'] = 'Buscar';
        $lang['stroptions'] = 'Opciones';
	$lang['strrefresh'] = 'Refrescar';
	$lang['strdownload'] = 'Bajar';
	$lang['strinfo'] = 'Informaci&oacute;n';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Advanzado';

	// Error handling
	$lang['strnoframes'] = 'Necesit&aacute;s un navegador con soporte de marcos para usar esta aplicaci&oacute;n.';
	$lang['strbadconfig'] = 'Su archivo config.inc.php est&aacute; desactualizado. Deber&aacute; regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versi&oacute;n de PHP no tiene el soporte correcto de bases de datos.';
	$lang['strbadschema'] = 'El esquema especificado no es v&aacute;lido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificaci&oacute;n del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaraci&oacute;n:';
	$lang['strinvalidparam'] = 'Par&aacute;metros de script no v&aacute;lidos.';
	$lang['strnodata'] = 'No se encontraron filas.';
	$lang['strnoobjects'] = 'No se encontraron objectos.';
	$lang['strrownotunique'] = 'No existe un identificador &uacute;nico para este registro.';

	// Tables
	$lang['strtable'] = 'Tabla';
	$lang['strtables'] = 'Tablas';
	$lang['strshowalltables'] = 'Mostrar Todas las Tablas';
	$lang['strnotables'] = 'No se encontraron tablas.';
	$lang['strnotable'] = 'No se encontr&oacute; la tabla.';
	$lang['strcreatetable'] = 'Crear tabla';
	$lang['strtablename'] = 'Nombre de la tabla';
	$lang['strtableneedsname'] = 'Debe darle un nombre a la tabla.';
	$lang['strtableneedsfield'] = 'Debe especificar al menos un campo.';
	$lang['strtableneedscols'] = 'Las tablas requieren un n&uacute;mero v&aacute;lido de columnas.';
	$lang['strtablecreated'] = 'Tabla creada.';
	$lang['strtablecreatedbad'] = 'Fall&oacute; al tratar crear la tabla.';
	$lang['strconfdroptable'] = '&iquest;Est&aacute; seguro que desea eliminar la tabla &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabla eliminada.';
	$lang['strtabledroppedbad'] = 'Fall&oacute; al tratar de eliminar la tabla.';
	$lang['strconfemptytable'] = '&iquest;Est&aacute; seguro que desea vaciar la tabla &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabla vaciada.';
	$lang['strtableemptiedbad'] = 'Fall&oacute; el vaciado de la tabla.';
	$lang['strinsertrow'] = 'Insertar Fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'Fall&oacute; la inserci&oacute;n de fila.';
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Fall&oacute; al intentar actualizar la fila.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = '&iquest;Est&aacute; seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Fall&oacute; la eliminaci&oacute;n de fila.';
	$lang['strsaveandrepeat'] = 'Guardar y Repetir';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'N&uacute;mero de Campos';
	$lang['strfieldneedsname'] = 'Debe darle un nombre al campo';
        $lang['strselectallfields'] = 'Seleccionar todos los campos.';
	$lang['strselectneedscol'] = 'Debe elegir al menos una columna';
	$lang['strselectunary'] = 'Operaciones unitarias no pueden tener valores.';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Fall&oacute; la modificaci&oacute;n de columna.';
	$lang['strconfdropcolumn'] = '&iquest;Est&aacute; seguro que quiere eliminar la columna &quot;%s&quot; de la tabla &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n de columna.';
        $lang['straddcolumn'] = 'Agregar Columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Fall&oacute; el agregado de columna.';
	$lang['strdataonly'] = 'Datos solamente';
	$lang['strcascade'] = 'EN CASCADA';
	$lang['strtablealtered'] = 'Tabla modificada.';
	$lang['strtablealteredbad'] = 'Fall&oacute; la modificaci&oacute;n  de la Tabla.';
	$lang['strstructureonly'] = 'Solo la estructura';
	$lang['strstructureanddata'] = 'Estructura y datos';

        // Users
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contrase&ntilde;a';
	$lang['strsuper'] = '&iquest;Es administrador?';
	$lang['strcreatedb'] = '&iquest;Puede crear BD?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Fall&oacute; la actualizaci&oacute;n del usuario.';
	$lang['strshowallusers'] = 'Mostrar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['struserneedsname'] = 'Debe dar un nombre a su usuario.';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Fall&oacute; al crear usuario.';
        $lang['struserdropped'] = 'Usuario eliminado.';
	$lang['strconfdropuser'] = '&iquest;Est&aacute; seguro que quiere eliminar el usuario &quot;%s&quot;?';
	$lang['struserdroppedbad'] = 'Fall&oacute; al eliminar el usuario.';
	$lang['straccount'] = 'Cuenta';
	$lang['strchangepassword'] = 'Cambiar Contrase&ntilde;a';
	$lang['strpasswordchanged'] = 'Contrase&ntilde;a modificada.';
	$lang['strpasswordchangedbad'] = 'Fall&oacute; al modificar contrase&ntilde;a.';
	$lang['strpasswordshort'] = 'La contrase&ntilde;a es muy corta.';
	$lang['strpasswordconfirm'] = 'Las contrase&ntilde;as no coinciden.';

        // Groups
	$lang['strgroups'] = 'Grupos';
        $lang['strgroup'] = 'Grupo';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Fall&oacute; la creaci&oacute;n del grupo.';
	$lang['strconfdropgroup'] = '&iquest;Est&aacute; seguro que quiere eliminar el grupo &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
	$lang['straddmember'] = 'Agregar un miembro';
	$lang['strmemberadded'] = 'Miembro agregado.';
	$lang['strmemberaddedbad'] = 'Fall&oacute; al intentar agregar nuevo miembro.';
	$lang['strdropmember'] = 'Sacar miembro';
	$lang['strconfdropmember'] = '&iquest;Est&aacute; seguro que quiere sacra el miembro &quot;%s&quot; del grupo &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Miembro eliminado.';
	$lang['strmemberdroppedbad'] = 'Fall&oacute; al intentar sacar un miembro.';
	$lang['strgroupdroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n del grupo.';
	$lang['strmembers'] = 'Miembros';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados/revocados.';
	$lang['strgrantfailed'] = 'Fall&oacute; al intendar otorgar privilegios.';
        $lang['strgrantor'] = 'Cedente';
        $lang['strasterisk'] = '*';
	$lang['strgrantbad'] = 'Debe especificar al menos un usuario o grupo y al menos un privilegio.';
	$lang['stralterprivs'] = 'Cambiar Privilegios';

	// Databases
	$lang['strdatabase'] = 'Base de Datos';
	$lang['strdatabases'] = 'Bases de Datos';
	$lang['strshowalldatabases'] = 'Mostrar Todas las Bases de Datos';
	$lang['strnodatabase'] = 'No se encontr&oacute; la Base de Datos.';
	$lang['strnodatabases'] = 'No se encontraron Bases de Datos.';
	$lang['strcreatedatabase'] = 'Crear base de datos';
	$lang['strdatabasename'] = 'Nombre de la base de datos';
	$lang['strdatabaseneedsname'] = 'Debe darle un nombre a la base de datos.';
	$lang['strdatabasecreated'] = 'Base de Datos creada.';
	$lang['strdatabasecreatedbad'] = 'Fall&oacute; la creaci&oacute;n de la base de datos.';	
	$lang['strconfdropdatabase'] = '&iquest;Est&aacute; seguro que quiere eliminar la base de datos &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de datos eliminada.';
	$lang['strdatabasedroppedbad'] = 'Fall&oacute; al eliminar la base de datos.';
	$lang['strentersql'] = 'Ingrese la sentencia de SQL para ejecutar:';
	$lang['strsqlexecuted'] = 'SQL ejecutada.';
	$lang['strvacuumgood'] = 'Limpieza completada.';
	$lang['strvacuumbad'] = 'Fall&oacute; al intentar limpiar.';
	$lang['stranalyzegood'] = 'An&aacute;lisis completado.';
	$lang['stranalyzebad'] = 'Fall&oacute; al intentar analizar.';

	// Views
	$lang['strview'] = 'Vista';
	$lang['strviews'] = 'Vistas';
	$lang['strshowallviews'] = 'Mostrar todas las vistas';
	$lang['strnoview'] = 'No se encontr&oacute; la vista.';
	$lang['strnoviews'] = 'No se encontraron vistas.';
	$lang['strcreateview'] = 'Crear Vista';
	$lang['strviewname'] = 'Nombre de Vista';
	$lang['strviewneedsname'] = 'Debe darle un nombre a la vista.';
	$lang['strviewneedsdef'] = 'Debe darle una definici&oacute;n a su vista.';
	$lang['strviewcreated'] = 'Vista creada.';
	$lang['strviewcreatedbad'] = 'Fall&oacute; al crear la vista.';
	$lang['strconfdropview'] = '&iquest;Est&aacute; seguro que quiere eliminar la vista &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vista eliminada.';
	$lang['strviewdroppedbad'] = 'Fall&oacute; al intentar eliminar la vista.';
	$lang['strviewupdated'] = 'Vista actualizada.';
	$lang['strviewupdatedbad'] = 'Fall&oacute; al actualizar la vista.';

	// Sequences
	$lang['strsequence'] = 'Secuencia';
	$lang['strsequences'] = 'Secuencias';
	$lang['strshowallsequences'] = 'Mostrar todas las secuencias';
	$lang['strnosequence'] = 'No se encontr&oacute; la secuencia.';
	$lang['strnosequences'] = 'No se encontraron secuencias.';
	$lang['strcreatesequence'] = 'Crear secuencia';
	$lang['strlastvalue'] = '&Uacute;ltimo Valor';
	$lang['strincrementby'] = 'Incremento';	
	$lang['strstartvalue'] = 'Valor Inicial';
	$lang['strmaxvalue'] = 'Valor M&aacute;ximo';
	$lang['strminvalue'] = 'Valor M&iacute;nimo';
	$lang['strcachevalue'] = 'Valor de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = '&iquest;Rotar?';
	$lang['striscalled'] = '&iquest;Nombre?';
	$lang['strsequenceneedsname'] = 'Debe darle un nombre a la secuencia.';
	$lang['strsequencecreated'] = 'Secuencia creada.';
	$lang['strsequencecreatedbad'] = 'Fall&oacute; la creaci&oacute;n de la secuencia.'; 
	$lang['strconfdropsequence'] = '&iquest;Est&aacute; seguro que quiere eliminar la secuencia &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Secuencia eliminada.';
	$lang['strsequencedroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n de la secuencia.';
	$lang['strsequencereset'] = 'Secuencia reiniciada.';
	$lang['strsequenceresetbad'] = 'Fall&oacute; al intentar reiniciar la secuencia.'; 

	// Indexes
	$lang['strindexes'] = '&Iacute;ndices';
	$lang['strindexname'] = 'Nombre del &Iacute;ndice';
	$lang['strshowallindexes'] = 'Mostrar Todos los &Iacute;ndices';
	$lang['strnoindex'] = 'No se encontr&oacute; el &iacute;ndice.';
	$lang['strnoindexes'] = 'No se encontraron &iacute;ndices.';
	$lang['strcreateindex'] = 'Crear &Iacute;ndice';
	$lang['strindexname'] = 'Nombre del &Iacute;ndice';
	$lang['strtabname'] = 'Tab Name';
	$lang['strcolumnname'] = 'Nombre de Columna';
	$lang['strindexneedsname'] = 'Debe darle un nombre al &iacute;ndice';
	$lang['strindexneedscols'] = 'Los &iacute;ndices requieren un n&uacute;mero v&aacute;lido de columnas.';
	$lang['strindexcreated'] = '&Iacute;ndice creado';
	$lang['strindexcreatedbad'] = 'Fall&oacute; al crear el &iacute;ndice.';
	$lang['strconfdropindex'] = '&iquest;Est&aacute; seguro que quiere eliminar el &iacute;ndice &quot;%s&quot;?';
	$lang['strindexdropped'] = '&Iacute;ndice eliminado.';
	$lang['strindexdroppedbad'] = 'Fall&oacute; al eliminar el &iacute;ndice.';
	$lang['strkeyname'] = 'Nombre de la llave';
	$lang['struniquekey'] = 'Llave &uacute;nica';
	$lang['strprimarykey'] = 'Llave primaria';
 	$lang['strindextype'] = 'Tipo de &iacute;ndice';
	$lang['strindexname'] = 'Nombre del &iacute;ndice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en el &Iacute;ndice';
	$lang['strconfcluster'] = 'Est&aacute; seguro que quiere ordenar la tabla &quot;%s&quot;?';
	$lang['strclusteredgood'] = 'Ordenado completo.';
	$lang['strclusteredbad'] = 'Fall&oacute; al ordenar tabla.';

	// Rules
	$lang['strrules'] = 'Reglas';
	$lang['strrule'] = 'Regla';
	$lang['strshowallrules'] = 'Mostrar todas las reglas';
	$lang['strnorule'] = 'No se encontr&oacute; la regla.';
	$lang['strnorules'] = 'No se encontraron reglas.';
	$lang['strcreaterule'] = 'Crear regla';
	$lang['strrulename'] = 'Nombre de regla';
	$lang['strruleneedsname'] = 'Debe darle un nombre a la regla.';
	$lang['strrulecreated'] = 'Regla creada.';
	$lang['strrulecreatedbad'] = 'Fall&oacute; al crear la regla.';
	$lang['strconfdroprule'] = '&iquest;Est&aacute; seguro que quiere eliminar la regla &quot;%s&quot; en &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regla eliminada.';
	$lang['strruledroppedbad'] = 'Fall&oacute; al eliminar la regla.';

	// Constraints
	$lang['strconstraints'] = 'Restricci&oacute;n';
	$lang['strshowallconstraints'] = 'Mostrar todas las restricciones';
	$lang['strnoconstraints'] = 'No se encontraron restricciones.';
	$lang['strcreateconstraint'] = 'Crear Restricci&oacute;n';
	$lang['strconstraintcreated'] = 'Restricci&oacute;n creada.';
	$lang['strconstraintcreatedbad'] = 'Fall&oacute; al crear la Restricci&oacute;n.';
	$lang['strconfdropconstraint'] = '&iquest;Est&aacute; seguro que quiere eliminar la restricci&oacute;n &quot;%s&quot; de &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Restricci&oacute;n eliminada.';
	$lang['strconstraintdroppedbad'] = 'Fall&oacute; al eliminar la restricci&oacute;n.';
	$lang['straddcheck'] = 'Agregar chequeo';
	$lang['strcheckneedsdefinition'] = 'Restricci&oacute;n de chequeo necesita una definici&oacute;n.';
	$lang['strcheckadded'] = 'Restricci&oacute;n de chequeo agregada.';
	$lang['strcheckaddedbad'] = 'Fall&oacute; al intentar agregar restricci&oacute;n de chequeo.';
	$lang['straddpk'] = 'Agregar llave primaria';
	$lang['strpkneedscols'] = 'Llave primaria necesita al menos un campo.';
	$lang['strpkadded'] = 'Llave primaria agregada.';
	$lang['strpkaddedbad'] = 'Fall&oacute; al intentar crear la llave primaria.';
	$lang['stradduniq'] = 'Agregar llave &uacute;nica';
	$lang['struniqneedscols'] = 'Llave &uacute;nica necesita al menos un campo.';
	$lang['struniqadded'] = 'Agregar llave &uacute;nica.';
	$lang['struniqaddedbad'] = 'Fall&oacute; al intentar agregar la llave &uacute;nica.';
	$lang['straddfk'] = 'Agregar referencia';
	$lang['strfkneedscols'] = 'Referencia necesita al menos un campo.';
	$lang['strfkneedstarget'] = 'Referencia necesita una tabla para referenciar.';
	$lang['strfkadded'] = 'Referencia agregada.';
	$lang['strfkaddedbad'] = 'Fall&oacute; al agregar la referencia.';
	$lang['strfktarget'] = 'Tabla de destino';
	$lang['strfkcolumnlist'] = 'Campos en la llave';
	$lang['strondelete'] = 'AL ELIMINAR';
	$lang['stronupdate'] = 'AL ACTUALIZAR';

	// Functions
	$lang['strfunction'] = 'Funci&oacute;n';
	$lang['strfunctions'] = 'Funciones';
	$lang['strshowallfunctions'] = 'Mostrar todas las funciones';
	$lang['strnofunction'] = 'No se encontr&oacute; la funci&oacute;n.';
	$lang['strnofunctions'] = 'No se encontraron funciones.';
	$lang['strcreatefunction'] = 'Crear funci&oacute;n';
	$lang['strfunctionname'] = 'Nombre de la funci&oacute;n';
	$lang['strreturns'] = 'Devuelve';
	$lang['strarguments'] = 'Argumentos';
        $lang['strproglanguage'] = 'Lenguaje de programaci&oacute;n';
	$lang['strfunctionneedsname'] = 'Debe darle un nombre a la funci&oacute;n.';
	$lang['strfunctionneedsdef'] = 'Debe darle una definici&oacute;n a la funci&oacute;n.';
	$lang['strfunctioncreated'] = 'Funci&oacute;n creada.';
	$lang['strfunctioncreatedbad'] = 'Fall&oacute; la creaci&oacute;n de la funci&oacute;n.';
	$lang['strconfdropfunction'] = '&iquest;Est&aacute; seguro que quiere eliminar la funci&oacute;n &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funci&oacute;n eliminada.';
	$lang['strfunctiondroppedbad'] = 'Fall&oacute; al eliminar la funci&oacute;n.';
	$lang['strfunctionupdated'] = 'Funci&oacute;n actualizada.';
	$lang['strfunctionupdatedbad'] = 'Fall&oacute; al actualizar la funci&oacute;n.';

	// Triggers
	$lang['strtrigger'] = 'Disparador';
	$lang['strtriggers'] = 'Disparadores';
	$lang['strshowalltriggers'] = 'Mostrar todos los disparadores';
	$lang['strnotrigger'] = 'No se encontr&oacute; el disparador.';
	$lang['strnotriggers'] = 'No se encontraron disparadores.';
	$lang['strcreatetrigger'] = 'Crear Disparador';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al disparador.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una funci&oacute;n para el disparador.';
	$lang['strtriggercreated'] = 'Disparador creado.';
	$lang['strtriggercreatedbad'] = 'Fall&oacute; la creaci&oacute;n del disparador.';
	$lang['strconfdroptrigger'] = '&iquest;Est&aacute; seguro que quiere eliminar el disparador &quot;%s&quot; en &quot;%s&quot;?';
        $lang['strtriggeraltered'] = 'Disparador modificado.';
        $lang['strtriggeralteredbad'] = 'Fall&oacute; la modificaci&oacute;n del disparador.';
	$lang['strtriggerdropped'] = 'Disparador eliminado.';
	$lang['strtriggerdroppedbad'] = 'Fall&oacute; al eliminar el disparador.';

	// Types
	$lang['strtype'] = 'Tipo';
	$lang['strtypes'] = 'Tipos';
	$lang['strshowalltypes'] = 'Mostrar todos los tipos';
	$lang['strnotype'] = 'No se encontro el tipo.';
	$lang['strnotypes'] = 'No se encontraron tipos.';
	$lang['strcreatetype'] = 'Crear Tipo';
	$lang['strtypename'] = 'Nombre del tipo';
	$lang['strinputfn'] = 'Funci&oacute;n de entrada';
	$lang['stroutputfn'] = 'Funci&oacute;n de salida';
	$lang['strpassbyval'] = '&iquest;Pasar valor?';
	$lang['stralignment'] = 'Alineamiento';
	$lang['strelement'] = 'Elemento';
	$lang['strdelimiter'] = 'Delimitador';
	$lang['strstorage'] = 'Almacenamiento';
	$lang['strtypeneedsname'] = 'Debe especificar un nombre para el tipo.';
	$lang['strtypeneedslen'] = 'Debe especificar una longitud para el tipo.';
	$lang['strtypecreated'] = 'Tipo creado';
	$lang['strtypecreatedbad'] = 'Fall&oacute; al crear el tipo.';
	$lang['strconfdroptype'] = '&iquest;Est&aacute; seguro que quiere eliminar el tipo &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Tipo eliminado.';
	$lang['strtypedroppedbad'] = 'Fall&oacute; al eliminar el tipo.';

	// Schemas
	$lang['strschema'] = 'Esquema';
	$lang['strschemas'] = 'Esquemas';
	$lang['strshowallschemas'] = 'Mostrar Todos los Esquemas';
	$lang['strnoschema'] = 'No se encontr&oacute; el esquema.';
	$lang['strnoschemas'] = 'No se encontraron esquemas.';
	$lang['strcreateschema'] = 'Crear Esquema';
	$lang['strschemaname'] = 'Nombre del esquema';
	$lang['strschemaneedsname'] = 'Debe especificar un nombre para el esquema.';
	$lang['strschemacreated'] = 'Esquema creado';
	$lang['strschemacreatedbad'] = 'Fall&oacute; al crear el esquema.';
	$lang['strconfdropschema'] = '&iquest;Est&aacute; seguro que quiere eliminar el esquema &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Esquema eliminado.';
	$lang['strschemadroppedbad'] = 'Fall&oacute; al eliminar el esquema.';

	// Reports
	$lang['strreport'] = 'Reporte';
	$lang['strreports'] = 'Reportes';
	$lang['strshowallreports'] = 'Mostrar todos los reportes';
	$lang['strnoreports'] = 'No se encontro el reporte.';
	$lang['strcreatereport'] = 'Crear Reporte';
	$lang['strreportdropped'] = 'Reporte eliminado.';
	$lang['strreportdroppedbad'] = 'Fall&oacute; al eliminar el Reporte.';
	$lang['strconfdropreport'] = '&iquest;Est&aacute; seguro que quiere eliminar el reporte &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Debe especificar un nombre para el reporte.';
	$lang['strreportneedsdef'] = 'Debe especificar un SQL para el reporte.';
	$lang['strreportcreated'] = 'Reporte guardado.';
	$lang['strreportcreatedbad'] = 'Fall&oacute; al guardar el reporte.';
	$lang['strdomain'] = 'Dominio';
	$lang['strdomains'] = 'Dominios';
	$lang['strshowalldomains'] = 'Mostrar todos los dominios';
	$lang['strnodomains'] = 'No se encontraron dominios.';
	$lang['strcreatedomain'] = 'Crear dominio';
	$lang['strdomaindropped'] = 'Dominio eliminado.';
	$lang['strdomaindroppedbad'] = 'Fall&oacute; al intentar eliminar el dominio.';
	$lang['strconfdropdomain'] = 'Esta seguro que quiere eliminar el dominio &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Debe dar un nombre para el dominio.';
	$lang['strdomaincreated'] = 'Dominio creado.';
	$lang['strdomaincreatedbad'] = 'Fall&oacute; al intentar crear el dominio.';
	$lang['strdomainaltered'] = 'Dominio modificado.';
	$lang['strdomainalteredbad'] = 'Fall&oacute; al intentar modificar el dominio.';

	// Operators
        $lang['stroperator'] = 'Operador';
	$lang['stroperators'] = 'Operadores';
	$lang['strshowalloperators'] = 'Mostrar todos los operadores';
	$lang['strnooperator'] = 'No se encontr&oacute; el operador.';
	$lang['strnooperators'] = 'No se encontraron operadores.';
	$lang['strcreateoperator'] = 'Crear Operador';
	$lang['strleftarg'] = 'Tipo de datos del arg. izquierdo';
	$lang['strrightarg'] = 'Tipo de datos del arg. derecho';
	$lang['strcommutator'] = 'Conmutador';
	$lang['strnegator'] = 'Negaci&oacute;n';
	$lang['strrestrict'] = 'Restringir';
	$lang['strjoin'] = 'Uni&oacute;n';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Fusiones';
	$lang['strleftsort'] = 'Ordenado izquierdo';
	$lang['strrightsort'] = 'Ordenado derecho';
	$lang['strlessthan'] = 'Menor que';
	$lang['strgreaterthan'] = 'Mayor que';
	$lang['stroperatorneedsname'] = 'Debe darle un nombre al operador.';
	$lang['stroperatorcreated'] = 'Operador creado';
	$lang['stroperatorcreatedbad'] = 'Fall&oacute; al intentar crear el operador.';
	$lang['strconfdropoperator'] = '&iquest;Est&aacute; seguro que quiere eliminar el operador &quot;%s&quot;?';
	$lang['stroperatordropped'] = 'Operador eliminado.';
	$lang['stroperatordroppedbad'] = 'Fall&oacute; al intentar eliminar el operador.';

	// Casts
	$lang['strcasts'] = 'Conversi&oacute;n de tipos';
	$lang['strnocasts'] = 'No se encontraron conversiones.';
	$lang['strsourcetype'] = 'Tipo inicial';
	$lang['strtargettype'] = 'Tipo final';
	$lang['strimplicit'] = 'Impl&iacute;cito';
	$lang['strinassignment'] = 'En asignaci&oacute;n';
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
	$lang['strnoinfo'] = 'No hay informaci&oacute;n disponible.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Parent tables';
	$lang['strchildtables'] = 'Child tables';

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted est&aacute; logueado con usuario &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';
	$lang['strhelp'] = 'Ayuda';

?>
