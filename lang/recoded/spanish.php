<?php

	/**
	 * Spanish language file for phpPgAdmin.
	 * @maintainer Martin Marques (martin@bugs.unl.edu.ar)
	 *
	 * $Id: spanish.php,v 1.8 2003/05/11 08:40:51 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Spanish';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'es_ES';
  
	// Basic strings
	$lang['strintro'] = 'Bienvenido a phpPgAdmin.';
	$lang['strlogin'] = 'Autenticaci&oacute;n';
	$lang['strloginfailed'] = 'Fall&oacute; la autenticaci&oacute;n';
	$lang['strserver'] = 'Servidor';
	$lang['strlogout'] = 'Salir';
	$lang['strowner'] = 'Propietario';
	$lang['straction'] = 'Acci&oacute;n';
	$lang['stractions'] = 'Acciones';
	$lang['strname'] = 'Nombre';
	$lang['strdefinition'] = 'Definici&oacute;n';
	$lang['stroperators'] = 'Operadores';
	$lang['straggregates'] = 'Agregados';
	$lang['strproperties'] = 'Propiedades';
	$lang['strbrowse'] = 'Examinar';
	$lang['strdrop'] = 'Eliminar';
	$lang['strdropped'] = 'Eliminado';
	$lang['strnull'] = 'Nulo';
	$lang['strnotnull'] = 'No Nulo';
	$lang['strprev'] = 'Previo';
	$lang['strnext'] = 'Pr&oacute;ximo';
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
	$lang['stredit'] = 'Editar';
	$lang['strcolumns'] = 'Columnas';
	$lang['strrows'] = 'fila(s)';
	$lang['strrowsaff'] = 'fila(s) afectadas.';
	$lang['strexample'] = 'ej.';
	$lang['strback'] = 'Atr&aacute;s';
	$lang['strqueryresults'] = 'Resultado de la consulta';
	$lang['strshow'] = 'Mostrar';
	$lang['strempty'] = 'Vaciar';
	$lang['strlanguage'] = 'Lenguaje';
	$lang['strencoding'] = 'Codificaci&oacute;n';
	$lang['strvalue'] = 'Valor';
	$lang['strunique'] = '&Uacute;nico';
	$lang['strprimary'] = 'Primario';
	$lang['strexport'] = 'Exportar';
	$lang['strimport'] = 'Importar';
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
	$lang['strinstead'] = 'Hacer en su lugar';
	$lang['strwhen'] = 'Cuando';
	$lang['strformat'] = 'Formato';
	$lang['strdata'] = 'Dato';
	$lang['strconfirm'] = 'Confirmar';

	// Error handling
	$lang['strnoframes'] = 'Necesitas un navegador con soporte de marcos para usar esta aplicaci&oacute;n.';
	$lang['strbadconfig'] = 'Su archivo config.inc.php est&aacute; desactualizado. Deber&aacute; regenerarlo a partir del archivo nuevo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Su versi&oacute;n de PHP no tiene el soporte correcto de bases de datos.';
	$lang['strbadschema'] = 'El esquema especificado es inv&aacute;lido.';
	$lang['strbadencoding'] = 'No se pudo setear la codificaci&oacute;n del cliente en la base de datos.';
	$lang['strsqlerror'] = 'Error de SQL:';
	$lang['strinstatement'] = 'En la declaraci&oacute;n:';
	$lang['strinvalidparam'] = 'Par&aacute;metros de script inv&aacute;lidos.';
	$lang['strnodata'] = 'No se encontraron filas.';

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
	$lang['strtablecreatedbad'] = 'Creaci&oacute;n de la tabla fall&oacute;.';
	$lang['strconfdroptable'] = '&iquest;Est&aacute; seguro que desea eliminar la tabla &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabla eliminada.';
	$lang['strtabledroppedbad'] = 'La eliminaci&oacute;n tabla fall&oacute;.';
	$lang['strconfemptytable'] = '&iquest;Est&aacute; seguro que desea vaciar la tabla &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabla vaciada.';
	$lang['strtableemptiedbad'] = 'Fall&oacute; el vaciado de la tabla.';
	$lang['strinsertrow'] = 'Insertar Fila';
	$lang['strrowinserted'] = 'Fila insertada.';
	$lang['strrowinsertedbad'] = 'Fall&oacute; la inserci&oacute;n de fila.';
	$lang['streditrow'] = 'Editar fila';
	$lang['strrowupdated'] = 'Fila actualizada.';
	$lang['strrowupdatedbad'] = 'Actualizaci&oacute;n de fila fall&oacute;.';
	$lang['strdeleterow'] = 'Eliminar Fila';
	$lang['strconfdeleterow'] = '&iquest;Est&aacute; seguro que quiere eliminar esta fila?';
	$lang['strrowdeleted'] = 'Fila eliminada.';
	$lang['strrowdeletedbad'] = 'Fall&oacute; la eliminaci&oacute;n de fila.';
	$lang['strsaveandrepeat'] = 'Guardar y Repetir';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'N&uacute;mero de Campos';
	$lang['strfieldneedsname'] = 'Debe darle un nombre al campo';
	$lang['strselectneedscol'] = 'Debe mostrar al menos una columna';
	$lang['straltercolumn'] = 'Modificar Columna';
	$lang['strcolumnaltered'] = 'Columna Modificada.';
	$lang['strcolumnalteredbad'] = 'Fall&oacute; la modificaci&oacute;n de columna.';
	$lang['strconfdropcolumn'] = '&iquest;Est&aacute; seguro que quiere eliminar la columna &quot;%s&quot; de la tabla &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Columna eliminada.';
	$lang['strcolumndroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n de columna.';
	$lang['straddcolumn'] = 'Agregar columna';
	$lang['strcolumnadded'] = 'Columna agregada.';
	$lang['strcolumnaddedbad'] = 'Fall&oacute; el agregado de columna.';
	$lang['strschemaanddata'] = 'Esquema y datos';
	$lang['strschemaonly'] = 'Esquemas solamente';
	$lang['strdataonly'] = 'Datos solamente';
	$lang['strcascade'] = 'CASCADEAR';

	// Users
	$lang['struseradmin'] = 'Administraci&oacute;n de Usuarios';
	$lang['struser'] = 'Usuario';
	$lang['strusers'] = 'Usuarios';
	$lang['strusername'] = 'Nombre de usuario';
	$lang['strpassword'] = 'Contrase&ntilde;a';
	$lang['strsuper'] = '&iquest;Es administrador?';
	$lang['strcreatedb'] = '&iquest;Puede crear BD?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'No se encontraron usuarios.';
        $lang['struserupdated'] = 'Usuario actualizado.';
	$lang['struserupdatedbad'] = 'Fall&oacute; la actualizaci&oacute;n de usuario.';
	$lang['strshowallusers'] = 'Mostrar Todos los Usuarios';
	$lang['strcreateuser'] = 'Crear Usuario';
	$lang['strusercreated'] = 'Usuario creado.';
	$lang['strusercreatedbad'] = 'Fall&oacute; al crear usuario.';
	$lang['strconfdropuser'] = '&iquest;Est&aacute; seguro que quiere eliminar el usuario &quot;%s&quot;?';
	$lang['struserdropped'] = 'Usuario eliminado.';
	$lang['struserdroppedbad'] = 'Fall&oacute; al eliminar el usuario.';
	$lang['straccount'] = 'Cuenta';
	$lang['strchangepassword'] = 'Cambiar Contrase&ntilde;a';
	$lang['strpasswordchanged'] = 'Contrase&ntilde;a modificada.';
	$lang['strpasswordchangedbad'] = 'Fall&oacute; al modificar contrase&ntilde;a.';
	$lang['strpasswordshort'] = 'La contrase&ntilde;a es muy corta.';
	$lang['strpasswordconfirm'] = 'Las contrase&ntilde;as no coinciden.';

	// Groups
	$lang['strgroupadmin'] = 'Administraci&oacute;n de Grupos';
	$lang['strgroup'] = 'Grupo';
	$lang['strgroups'] = 'Grupos';
	$lang['strnogroup'] = 'Grupo no encontrado.';
	$lang['strnogroups'] = 'No se encontraron grupos.';
	$lang['strcreategroup'] = 'Crear Grupo';
	$lang['strshowallgroups'] = 'Mostrar Todos los Grupos';
	$lang['strgroupneedsname'] = 'Debe darle un nombre al grupo.';
	$lang['strgroupcreated'] = 'Grupo creado.';
	$lang['strgroupcreatedbad'] = 'Fall&oacute; la creaci&oacute;n de grupo.';
	$lang['strconfdropgroup'] = '&iquest;Esta seguro que quiere eliminar el grupo &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grupo eliminado.';
	$lang['strgroupdroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n de grupo.';
	$lang['strmembers'] = 'Miembros';

	// Privilges
	$lang['strprivilege'] = 'Privilegio';
	$lang['strprivileges'] = 'Privilegios';
	$lang['strnoprivileges'] = 'Este objeto tiene privilegios de usuario por defecto.';
	$lang['strgrant'] = 'Otorgar';
	$lang['strrevoke'] = 'Revocar';
	$lang['strgranted'] = 'Privilegios otorgados.';
	$lang['strgrantfailed'] = 'Fall&oacute; al intendar otorgar privilegios.';
	$lang['strgrantuser'] = 'Otorgar al Usuario';
	$lang['strgrantgroup'] = 'Otorgar al Grupo';

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
	$lang['strentersql'] = 'Ingrese la sentencia de SQL para ejecutar abajo:';
	$lang['strsqlexecuted'] = 'SQL ejecutada.';
	$lang['strvacuumgood'] = 'Vacuum completado.';
	$lang['strvacuumbad'] = 'Vacuum fall&oacute;.';
	$lang['stranalyzegood'] = 'An&aacute;lisis completado.';
	$lang['stranalyzebad'] = 'An&aacute;lisis fall&oacute;.';

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
	$lang['strviewdroppedbad'] = 'Fall&oacute; a eliminar la vista.';
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
	$lang['strconfdropsequence'] = '&iquest;Esta seguro que quiere eliminar la secuencia &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Secuencia eliminada.';
	$lang['strsequencedroppedbad'] = 'Fall&oacute; la eliminaci&oacute;n de la secuencia.';

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
	$lang['strindexneedsname'] = 'debe darle un nombre al &iacute;ndice';
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
	$lang['strindexname'] = 'Nombre de &iacute;ndice';
	$lang['strtablecolumnlist'] = 'Columnas en Tabla';
	$lang['strindexcolumnlist'] = 'Columnas en &Iacute;ndice';

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
	$lang['strfunctionneedsname'] = 'Debe darle un nombre a la funci&oacute;n.';
	$lang['strfunctionneedsdef'] = 'Debe darle una definici&oacute;n a la funci&oacute;n.';
	$lang['strfunctioncreated'] = 'Funci&oacute;n creada.';
	$lang['strfunctioncreatedbad'] = 'Fall&oacute; la creaci&oacute;n de la funci&oacute;n.';
	$lang['strconfdropfunction'] = '&iquest;Est&aacute; seguro que quiere eliminar la funci&oacute;n &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Funci&oacute;n eliminada.';
	$lang['strfunctiondroppedbad'] = 'Fall&oacute; al eliminar la funci&oacute;n.';
	$lang['strfunctionupdated'] = 'Funci&oacute;n updated.';
	$lang['strfunctionupdatedbad'] = 'Fall&oacute; al actualizar la funci&oacute;n.';

	// Triggers
	$lang['strtrigger'] = 'Gatillo';
	$lang['strtriggers'] = 'Gatillos';
	$lang['strshowalltriggers'] = 'Mostrar todos los gatillos';
	$lang['strnotrigger'] = 'No se encontr&oacute; el gatillo.';
	$lang['strnotriggers'] = 'No se encontraron gatillos.';
	$lang['strcreatetrigger'] = 'Crear Gatillo';
	$lang['strtriggerneedsname'] = 'Debe darle un nombre al gatillo.';
	$lang['strtriggerneedsfunc'] = 'Debe especificar una funci&oacute;n para el gatillo.';
	$lang['strtriggercreated'] = 'Gatillo creado.';
	$lang['strtriggercreatedbad'] = 'Fall&oacute; la creaci&oacute;n del gatillo.';
	$lang['strconfdroptrigger'] = '&iquest;Est&aacute; seguro que quiere eliminar el gatillo &quot;%s&quot; en &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Gatillo eliminado.';
	$lang['strtriggerdroppedbad'] = 'Fall&oacute; al eliminar el gatillo.';

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
	$lang['strpassbyval'] = '&iquest;Pasar por valor?';
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

	// Miscellaneous
	$lang['strtopbar'] = '%s corriendo en %s:%s -- Usted est&aacute; logueado con usuario &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'd/m/Y, G:i:s';

?>
