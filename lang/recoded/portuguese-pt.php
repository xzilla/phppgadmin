<?php

/**
* Portuguese language file for phpPgAdmin.
* @maintainer Francisco Alves Cabrita (include@npf.pt.freebsd.org)
*
*/

// Language and character set
$lang['applang'] = 'Portugu&ecirc;s-Portugu&ecirc;s';
$lang['appcharset'] = 'ISO-8859-15';
$lang['applocale'] = 'pt_PT';
$lang['appdbencoding'] = 'LATIN1';
$lang['applangdir'] = 'ltr';
  
// Basic strings
$lang['strintro'] = 'Bem-vindo ao phpPgAdmin.';	
$lang['strppahome'] = 'P&aacute;gina inicial phpPgAdmin ';
$lang['strpgsqlhome'] = 'P&aacute;gina inicial PostgreSQL ';
$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
$lang['strreportbug'] = 'Relat&oacute;rio de Bug';
$lang['strviewfaq'] = 'Visualizar FAQ';
$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
$lang['strlogin'] = 'Autentica&ccedil;&atilde;o';					
$lang['strloginfailed'] = 'Falha na autentica&ccedil;&atilde;o';		
$lang['strserver'] = 'Servidor';					
$lang['strlogout'] = 'Sair';					
$lang['strowner'] = 'Propiet&aacute;rio';					
$lang['straction'] = 'Ac&ccedil;&atilde;o';					
$lang['stractions'] = 'Ac&ccedil;&otilde;es';				
$lang['strname'] = 'Nome';						
$lang['strdefinition'] = 'Defini&ccedil;&atilde;o';		
$lang['stroperators'] = 'Operadores';			
$lang['straggregates'] = 'Agregados';			
$lang['strproperties'] = 'Propriedades';			
$lang['strbrowse'] = 'Navegar';					
$lang['strdrop'] = 'Eliminar';						
$lang['strdropped'] = 'Eliminado';				
$lang['strnull'] = 'Nulo';						
$lang['strnotnull'] = 'N&atilde;o Nulo';				
$lang['strprev'] = 'Anterior';						
$lang['strnext'] = 'Pr&oacute;ximo';							
$lang['strfailed'] = 'Falha';					
$lang['strcreate'] = 'Criar';					
$lang['strcreated'] = 'Criado';				
$lang['strcomment'] = 'Coment&aacute;rio';				
$lang['strlength'] = 'Extens&atilde;o';					
$lang['strdefault'] = 'Padr&atilde;o';
$lang['stralter'] = 'Alterar';
$lang['strok'] = 'OK';
$lang['strcancel'] = 'Cancelar';					
$lang['strsave'] = 'Gravar';						
$lang['strreset'] = 'Reiniciar';					
$lang['strinsert'] = 'Inserir';					
$lang['strselect'] = 'Seleccionar';					
$lang['strdelete'] = 'Eliminar';					
$lang['strupdate'] = 'Atualizar';				
$lang['strreferences'] = 'Refer&ecirc;ncias';			
$lang['stryes'] = 'Sim';						
$lang['strno'] = 'N&atilde;o';							
$lang['stredit'] = 'Editar';					
$lang['strcolumns'] = 'Colunas';				
$lang['strrows'] = 'Linha(s)';					
$lang['strrowsaff'] = 'Linha(s) afectadas.';		
$lang['strexample'] = 'eg.';					
$lang['strback'] = 'Voltar';						
$lang['strqueryresults'] = 'Resultados da pesquisa';		
$lang['strshow'] = 'Exibir';						
$lang['strempty'] = 'Vazio';					
$lang['strlanguage'] = 'Linguagem';				
$lang['strencoding'] = 'Codifica&ccedil;&atilde;o';				
$lang['strvalue'] = 'Valor';					
$lang['strunique'] = '&Uacute;nico';					
$lang['strprimary'] = 'Prim&aacute;rio';				
$lang['strexport'] = 'Exportar';				
$lang['strsql'] = 'SQL';						
$lang['strgo'] = 'Ir';							
$lang['strimport'] = 'Importar';
$lang['stradmin'] = 'Administrador';					
$lang['strvacuum'] = 'V&aacute;cuo';					
$lang['stranalyze'] = 'Analiza';				
$lang['strcluster'] = 'Cluster';				
$lang['strreindex'] = 'Reordenar';				
$lang['strrun'] = 'Executar';						
$lang['stradd'] = 'Adicionar';						
$lang['strevent'] = 'Evento';					
$lang['strwhere'] = 'Onde';					
$lang['strinstead'] = 'Fazer ao inv&eacute;s';				
$lang['strwhen'] = 'Quando';						
$lang['strformat'] = 'Formato';					

// Error handling
$lang['strdata'] = 'Data';
$lang['strconfirm'] = 'Confirmar';
$lang['strexpression'] = 'Express&atilde;o';
        $lang['strellipsis'] = '...';
$lang['strexpand'] = 'Expandir';
$lang['strcollapse'] = 'Diminuir';
$lang['strnoframes'] = 'Voc&ecirc; necessita de um navegador com suporte de frames para utilizar esta aplica&ccedil;&atilde;o.';
$lang['strbadconfig'] = 'O config.inc.php est&aacute; desatualizado. Voc&ecirc; deve cri&aacute;-lo novamente a partir do novo config.inc.php-dist.';
$lang['strnotloaded'] = 'A sua instala&ccedil;&atilde;o do PHP n&atilde;o suporta chamadas a este tipo de base de dados.';
$lang['strbadschema'] = 'Esquema inv&aacute;lido.';
$lang['strbadencoding'] = 'Falha ao definir codifica&ccedil;&atilde;o do cliente na base de dados.';
$lang['strsqlerror'] = 'Erro de SQL:';
$lang['strinstatement'] = 'Indica&ccedil;&atilde;o de entrada :';
$lang['strinvalidparam'] = 'Par&acirc;metros de script inv&aacute;lidos.';
$lang['strnodata'] = 'N&atilde;o foram encontradas linhas.';

// Tables
$lang['strtable'] = 'Tabela';
$lang['strtables'] = 'Tabelas';
$lang['strshowalltables'] = 'Exibir todas as tabelas';
$lang['strnotables'] = 'Tabelas n&atilde;o encontradas.';
$lang['strnotable'] = 'Tabela n&atilde;o encontradas.';
$lang['strcreatetable'] = 'Criar tabela';
$lang['strtablename'] = 'Nome da tabela ';
$lang['strtableneedsname'] = 'A tabela necessita de um nome.';
$lang['strtableneedsfield'] = 'Especifique pelo menos um campo.';
$lang['strtableneedscols'] = 'As tabelas requerem um n&uacute;mero v&aacute;lido de colunas.';
$lang['strtablecreated'] = 'Tabela criada.';
$lang['strtablecreatedbad'] = 'Falha na cria&ccedil;&atilde;o de tabela.';
$lang['strconfdroptable'] = 'Tem certeza que quer eliminar a tabela &quot;%s&quot;?';
$lang['strtabledropped'] = 'Tabela eliminada.';
$lang['strtabledroppedbad'] = 'Falha ao eliminar a tabela.';
$lang['strconfemptytable'] = 'Tem certeza que quer esvaziar a tabela &quot;%s&quot;?';
$lang['strtableemptied'] = 'Tabela vazia.';
$lang['strtableemptiedbad'] = 'Falha ao esvaziar a tabela.';
$lang['strinsertrow'] = 'Inserir linha';
$lang['strrowinserted'] = 'Linha inserida.';
$lang['strrowinsertedbad'] = 'Falha ao inserir linha.';
$lang['streditrow'] = 'Editar linha';
$lang['strrowupdated'] = 'Linha actualizada.';
$lang['strrowupdatedbad'] = 'Falha na actualiza&ccedil;&atilde;o da linha.';
$lang['strdeleterow'] = 'Eliminar linha';
$lang['strconfdeleterow'] = 'Tem certeza que quer eliminar esta linha?';
$lang['strrowdeleted'] = 'Linha eliminada.';
$lang['strrowdeletedbad'] = 'Falha ao eliminar a linha .';
$lang['strsaveandrepeat'] = 'Gravar &amp; Repetir';
$lang['strfield'] = 'Campo';
$lang['strfields'] = 'Campos';
$lang['strnumfields'] = 'N&uacute;mero de campos';
$lang['strfieldneedsname'] = 'O campo necessita um nome';
$lang['strselectneedscol'] = 'Deve exibir pelo menos uma coluna';
$lang['straltercolumn'] = 'Alterar coluna';
$lang['strcolumnaltered'] = 'Coluna altereda.';
$lang['strcolumnalteredbad'] = 'Falha na altera&ccedil;&atilde;o de coluna.';
$lang['strconfdropcolumn'] = 'Tem certeza que quer eliminar a coluna &quot;%s&quot; da tabela &quot;%s&quot;?';
$lang['strcolumndropped'] = 'Coluna eliminada.';
$lang['strcolumndroppedbad'] = 'Elimina&ccedil;&atilde;o da coluna falhou.';
$lang['straddcolumn'] = 'Adicionar coluna';
$lang['strcolumnadded'] = 'Coluna adicionada.';
$lang['strcolumnaddedbad'] = 'Adi&ccedil;&atilde;o de coluna falhou.';
$lang['strschemaanddata'] = 'Esquema &amp; Dados';
$lang['strschemaonly'] = 'Esquema apenas';
$lang['strdataonly'] = 'Dados apenas';

// Users
$lang['strcascade'] = 'CASCATA';
$lang['struseradmin'] = 'Administra&ccedil;&atilde;o de utilizadores';
$lang['struser'] = 'Utilizador';
$lang['strusers'] = 'Utilizadores';
$lang['strusername'] = 'Nome do utilizador';
$lang['strpassword'] = 'Palavra-chave';
$lang['strsuper'] = 'Super-Utilizador?';
$lang['strcreatedb'] = 'Criar Base de Dados?';
$lang['strexpires'] = 'Expira';
$lang['strnousers'] = 'Utilizadores n&atilde;o encontrados.';
$lang['struserupdated'] = 'Utilizador alterado.';
$lang['struserupdatedbad'] = 'Altera&ccedil;&atilde;o do utilizador falhou.';
$lang['strshowallusers'] = 'Mostra todos os utilizadores';
$lang['strcreateuser'] = 'Criar Utilizador';
$lang['strusercreated'] = 'Utilizador criado.';
$lang['strusercreatedbad'] = 'Falhou ao criar utilizador.';
$lang['strconfdropuser'] = 'Tem certeza que quer eliminar o utilizador &quot;%s&quot;?';
$lang['struserdropped'] = 'Utilizador eliminado.';
$lang['struserdroppedbad'] = 'Falha ao eliminar utilizador.';
		
// Groups
$lang['straccount'] = 'Conta';
$lang['strchangepassword'] = 'Alterar palavra-chave';
$lang['strpasswordchanged'] = 'Palavra-chave alterada.';
$lang['strpasswordchangedbad'] = 'Falha ao alterar palavra-passe.';
$lang['strpasswordshort'] = 'Palavra-chave muito curta.';
$lang['strpasswordconfirm'] = 'Palavra-chave n&atilde;o coincide com a confirma&ccedil;&atilde;o.';
$lang['strgroupadmin'] = 'Administra&ccedil;&atilde;o de Grupo';
$lang['strgroup'] = 'Grupo';
$lang['strgroups'] = 'Grupos';
$lang['strnogroups'] = 'Grupos n&atilde;o encotrados.';
$lang['strshowallgroups'] = 'Exibir todos os grupos';
$lang['strgroupneedsname'] = 'Insira um nome para o seu grupo.';
$lang['strgroupcreated'] = 'Grupo criado.';
$lang['strgroupcreatedbad'] = 'Falha na cria&ccedil;&atilde;o de grupo.';	
$lang['strconfdropgroup'] = 'Tem certeza que quer eliminar o grupo &quot;%s&quot;?';
$lang['strgroupdropped'] = 'Grupo eliminado.';
$lang['strgroupdroppedbad'] = 'Falha ao eliminar grupo.';
$lang['strmembers'] = 'Membros';

// Privilges
$lang['strprivilege'] = 'Privil&eacute;gio';
$lang['strprivileges'] = 'Privil&eacute;gios';
$lang['strnoprivileges'] = 'Este objeto tem privil&eacute;gios padr&otilde;es de propriet&aacute;rio.';
$lang['strgrant'] = 'Concede';
$lang['strrevoke'] = 'Revoga';
$lang['strgranted'] = 'Privil&aacute;gios concedidos.';
$lang['strgrantfailed'] = 'Falha ao conceder privil&eacute;gios.';
$lang['strgrantbad'] = 'Dever&aacute; especificar um utilizador ou grupo e pelo menos um previl&eacute;gio.';
$lang['stralterprivs'] = 'Alterar privil&eacute;gios';

// Databases
$lang['strdatabase'] = 'Base de dados';
$lang['strdatabases'] = 'Base de dados';
$lang['strshowalldatabases'] = 'Exibir todos os base de dados';
$lang['strnodatabase'] = 'Base de dados n&atilde;o encontrada.';
$lang['strnodatabases'] = 'Bases de dados n&atilde;o encontradas.';
$lang['strcreatedatabase'] = 'Criar base de dados';
$lang['strdatabasename'] = 'Nome da base de dados';
$lang['strdatabaseneedsname'] = 'Insira um nome para a sua base de dados.';
$lang['strdatabasecreated'] = 'Base de dados criada.';
$lang['strdatabasecreatedbad'] = 'Falhou na cria&ccedil;&atilde;o da Base de dados.';	
$lang['strconfdropdatabase'] = 'Tem certeza que quer eliminar a base de dados &quot;%s&quot;?';
$lang['strdatabasedropped'] = 'Base de dados eliminada.';
$lang['strdatabasedroppedbad'] = 'Falha ao eliminar a base de dados.';
$lang['strentersql'] = 'Digite abaixo a instru&ccedil;&atilde;o SQL a ser executado:';
$lang['strsqlexecuted'] = 'SQL executado.';
$lang['strvacuumgood'] = 'V&aacute;cuo completo.';
$lang['strvacuumbad'] = 'Falha ao executar v&aacute;cuo.';
$lang['stranalyzegood'] = 'An&aacute;lize completa.';
$lang['stranalyzebad'] = 'Falha ao executar an&aacute;lize.';

// Views
$lang['strview'] = 'Visualiza&ccedil;&atilde;o';
$lang['strviews'] = 'Visualiza&ccedil;&otilde;es';
$lang['strshowallviews'] = 'Exibir todas as visualiza&ccedil;&otilde;es';
$lang['strnoview'] = 'Visualiza&ccedil;&atilde;o n&atilde;o encontrada.';
$lang['strnoviews'] = 'Visualiza&ccedil;&otilde;es n&atilde;o encontradas.';
$lang['strcreateview'] = 'Criar visualiza&ccedil;&atilde;o';
$lang['strviewname'] = 'Nome da visualiza&ccedil;&atilde;o';
$lang['strviewneedsname'] = 'Voc&ecirc; deve dar um nome a sua visualiza&ccedil;&atilde;o.';
$lang['strviewneedsdef'] = 'Crie uma defini&ccedil;&atilde;o para sua visualiza&ccedil;&atilde;o.';
$lang['strviewcreated'] = 'Visualiza&ccedil;&atilde;o criada.';
$lang['strviewcreatedbad'] = 'Falha na cria&ccedil;&atilde;o de visualiza&ccedil;&atilde;o.';
$lang['strconfdropview'] = 'Tem certeza que quer eliminar a visualiza&ccedil;&atilde;o &quot;%s&quot;?';
$lang['strviewdropped'] = 'Visualiza&ccedil;&atilde;o eliminada.';
$lang['strviewdroppedbad'] = 'Falha ao eliminar a visualiza&ccedil;&atilde;o.';
$lang['strviewupdated'] = 'Visualiza&ccedil;&atilde;o alterada.';
$lang['strviewupdatedbad'] = 'Falha ao alterar visualiza&ccedil;&atilde;o.';

// Sequences
$lang['strsequence'] = 'Sequ&ecirc;ncia';
$lang['strsequences'] = 'Sequ&ecirc;ncias';
$lang['strshowallsequences'] = 'Listar todas as sequ&ecirc;ncias';
$lang['strnosequence'] = 'Sequ&ecirc;ncia n&atilde;o encontrada.';
$lang['strnosequences'] = 'Sequ&ecirc;ncias n&atilde;o encontradas.';
$lang['strcreatesequence'] = 'Criar sequ&ecirc;ncia';
$lang['strlastvalue'] = '&Uacute;ltimo valor';
$lang['strincrementby'] = 'Incrementar por';	
$lang['strstartvalue'] = 'Valor inicial';
$lang['strmaxvalue'] = 'Valor m&aacute;ximo';
$lang['strminvalue'] = 'Valor m&iacute;nimo';
$lang['strcachevalue'] = 'Valor de cache';
$lang['strlogcount'] = 'Contador do log';
	$lang['striscycled'] = 'Foi dado um ciclo ?';
	$lang['striscalled'] = 'Foi chamado ?';
$lang['strsequenceneedsname'] = 'D&ecirc; um nome a sua sequ&ecirc;ncia.';
$lang['strsequencecreated'] = 'Sequ&ecirc;ncia criada.';
$lang['strsequencecreatedbad'] = 'Falha na cria&ccedil;&atilde;o da sequ&ecirc;ncia.'; 
$lang['strconfdropsequence'] = 'Tem certeza que quer eliminar a sequ&ecirc;ncia &quot;%s&quot;?';
$lang['strsequencedropped'] = 'Sequ&ecirc;ncia eliminada.';
$lang['strsequencedroppedbad'] = 'Falha ao eliminar a sequ&ecirc;ncia.';

// Indexes
$lang['strindexes'] = '&Iacute;ndices';
$lang['strindexname'] = 'Nome do &iacute;ndice';
$lang['strshowallindexes'] = 'Exibir todos os &iacute;ndices';
$lang['strnoindex'] = '&Iacute;ndice n&atilde;o encontrado.';
$lang['strnoindexes'] = '&Iacute;ndices n&atilde;o encontrados.';
$lang['strcreateindex'] = 'Criar &iacute;ndice';
$lang['strindexname'] = 'Nome do &iacute;ndice';
$lang['strtabname'] = 'Nome da tabela';
$lang['strcolumnname'] = 'Nome da coluna';
$lang['strindexneedsname'] = 'D&ecirc; um nome ao seu &iacute;ndice';
$lang['strindexneedscols'] = '&Iacute;ndices requerem um n&uacute;mero v&aacute;lido de colunas.';
$lang['strindexcreated'] = '&Iacute;ndice criado';
$lang['strindexcreatedbad'] = 'Falha na cria&ccedil;&atilde;o do &iacute;ndice.';
$lang['strconfdropindex'] = 'Tem a certeza que quer eliminar o &iacute;ndice &quot;%s&quot;?';
$lang['strindexdropped'] = 'Indice eliminado.';
$lang['strindexdroppedbad'] = 'Falha ao eliminar o &iacute;ndice.';
$lang['strkeyname'] = 'Nome da chave';
$lang['struniquekey'] = 'Chave &uacute;nica';
$lang['strprimarykey'] = 'Chave prim&aacute;ria';
$lang['strindextype'] = 'Tipo de &iacute;ndice';
$lang['strindexname'] = 'Nome do &iacute;ndice';
$lang['strtablecolumnlist'] = 'Colunas na tabela';
$lang['strindexcolumnlist'] = 'Colunas no &iacute;ndice';

// Rules
$lang['strrules'] = 'Regras';
$lang['strrule'] = 'Regra';
$lang['strshowallrules'] = 'Exibir todas as regras';
$lang['strnorule'] = 'Regra n&atilde;o encontrada.';
$lang['strnorules'] = 'Regras n&atilde;o encontradas.';
$lang['strcreaterule'] = 'Criar regra';
$lang['strrulename'] = 'Nome da regra';
$lang['strruleneedsname'] = 'D&ecirc; um nome para sua regra.';
$lang['strrulecreated'] = 'Regra criada.';
$lang['strrulecreatedbad'] = 'Falha na cria&ccedil;&atilde;o de regra.';
$lang['strconfdroprule'] = 'Tem certeza que quer eliminar a regra &quot;%s&quot; on &quot;%s&quot;?';
$lang['strruledropped'] = 'Regra eliminada.';
$lang['strruledroppedbad'] = 'Falha ao eliminar a regra.';

// Constraints
$lang['strconstraints'] = 'Restri&ccedil;&atilde;o';
$lang['strshowallconstraints'] = 'Exibir todos as restri&ccedil;&otilde;es';
$lang['strnoconstraints'] = 'Restri&ccedil;&otilde;es n&atilde;o encontradas.';
$lang['strcreateconstraint'] = 'Criar restri&ccedil;&atilde;o';
$lang['strconstraintcreated'] = 'Restri&ccedil;&atilde;o criada.';
$lang['strconstraintcreatedbad'] = 'Falha na cria&ccedil;&atilde;o de restri&ccedil;&atilde;o.';
$lang['strconfdropconstraint'] = 'Tem certeza que quer eliminar a restri&ccedil;&atilde;o &quot;%s&quot; on &quot;%s&quot;?';
$lang['strconstraintdropped'] = 'Restri&ccedil;&atilde;o eliminada.';
$lang['strconstraintdroppedbad'] = 'Falha ao eliminar de restri&ccedil;&atilde;o.';
$lang['straddcheck'] = 'Adicona verifica&ccedil;&atilde;o';
$lang['strcheckneedsdefinition'] = 'Verifica&ccedil;&atilde;o de regras necessita de uma defini&ccedil;&atilde;o.';
$lang['strcheckadded'] = 'Verifica&ccedil;&atilde;o de restri&ccedil;&atilde;o adicionada.';
$lang['strcheckaddedbad'] = 'Falha ao adicionar verifica&ccedil;&atilde;o de restri&ccedil;&atilde;o.';
$lang['straddpk'] = 'Adicionar chave prim&aacute;ria';
$lang['strpkneedscols'] = 'Chave prim&aacute;ria requer pelo menos uma coluna.';
$lang['strpkadded'] = 'Chave prim&aacute;ria adicionada.';
$lang['strpkaddedbad'] = 'Falha ao adicinoar chave prim&aacute;ria.';
$lang['stradduniq'] = 'Adiciona chave &uacute;nica';
$lang['struniqneedscols'] = 'Chave &uacute;nica requer ao menos uma coluna.';					
$lang['struniqadded'] = 'Chave &uacute;nica adicionada.';
$lang['struniqaddedbad'] = 'Falha ao adicionar chave &uacute;nica.';
$lang['straddfk'] = 'Adicionar chave estrangeira';
$lang['strfkneedscols'] = 'Chave estrangeira requer ao menos uma coluna.';
$lang['strfkneedstarget'] = 'Chave estrangeira requer uma tabela de refer&ecirc;ncia.';
$lang['strfkadded'] = 'Chave estrangeira adicionada.';
$lang['strfkaddedbad'] = 'Falha ao adicionar chave estrangeira.';
$lang['strfktarget'] = 'Tabela alvo';
$lang['strfkcolumnlist'] = 'Colunas em chaves';									
$lang['strondelete'] = 'ELIMINAR ACTIVO';
$lang['stronupdate'] = 'ALTERAR ACTIVO';

// Functions
$lang['strfunction'] = 'Fun&ccedil;&atilde;o';
$lang['strfunctions'] = 'Fun&ccedil;&otilde;es';
$lang['strshowallfunctions'] = 'Exibir todas as fun&ccedil;&otilde;es';
$lang['strnofunction'] = 'Fun&ccedil;&atilde;o n&atilde;o encontrada.';
$lang['strnofunctions'] = 'Fun&ccedil;&otilde;es n&atilde;o encontradas.';
$lang['strcreatefunction'] = 'Criar fun&ccedil;&otilde;es';
$lang['strfunctionname'] = 'Nome da fun&ccedil;&atilde;o';
$lang['strreturns'] = 'Retorno';
$lang['strarguments'] = 'Argumentos';
$lang['strproglanguage'] = 'Linguagem';				
$lang['strfunctionneedsname'] = 'D&ecirc; um nome &agrave; sua fun&ccedil;&atilde;o.';
$lang['strfunctionneedsdef'] = 'A fun&ccedil;&atilde;o precisa de uma defini&ccedil;&atilde;o.';
$lang['strfunctioncreated'] = 'Fun&ccedil;&atilde;o criada.';
$lang['strfunctioncreatedbad'] = 'Falha na cria&ccedil;&atilde;o de fun&ccedil;&atilde;o.';
$lang['strconfdropfunction'] = 'Tem certeza que quer eliminar a fun&ccedil;&atilde;o &quot;%s&quot;?';
$lang['strfunctiondropped'] = 'Fun&ccedil;&atilde;o eliminada.';
$lang['strfunctiondroppedbad'] = 'Falha ao eliminar de fun&ccedil;&atilde;o.';
$lang['strfunctionupdated'] = 'Fun&ccedil;&atilde;o actualizada';
$lang['strfunctionupdatedbad'] = 'Falha na actualiza&ccedil;&atilde;o da fun&ccedil;&atilde;o.';

// Triggers
$lang['strtrigger'] = 'Gatilho';	
$lang['strtriggers'] = 'Gatilhos';	
$lang['strshowalltriggers'] = 'Exibir todos os gatilhos';	
$lang['strnotrigger'] = 'N&atilde;o foi encontrado gatilho.';		
$lang['strnotriggers'] = 'N&atilde;o foram encontrados gatilhos.';		
$lang['strcreatetrigger'] = 'Criar Gatilhos';		
$lang['strtriggerneedsname'] = 'D&ecirc; um nome ao gatilho.';	
	$lang['strtriggerneedsfunc'] = 'Especifique uma fun&ccedil;&atilde;o para seu gatilho.';
$lang['strtriggercreated'] = 'Gatilho criado.';
$lang['strtriggercreatedbad'] = 'Falha na cria&ccedil;&atilde;o do gatilho.';			
$lang['strconfdroptrigger'] = 'Tem certeza que quer eliminar o gatilho &quot;%s&quot; em &quot;%s&quot;?';	 
$lang['strtriggerdropped'] = 'Gatilho eliminado.'; 
$lang['strtriggerdroppedbad'] = 'Falha ao eliminar o gatilho.';

// Types
$lang['strtype'] = 'Tipo';		
$lang['strtypes'] = 'Tipos';	
$lang['strshowalltypes'] = 'Exibir todos os tipos';	
$lang['strnotype'] = 'Tipo n&atilde;o encontrado.';			
$lang['strnotypes'] = 'Tipos n&atilde;o encontrados.';		
$lang['strcreatetype'] = 'Criar tipo';			
$lang['strtypename'] = 'Nome do tipo';				
$lang['strinputfn'] = 'Fun&ccedil;&atilde;o de entrada';			
$lang['stroutputfn'] = 'Fun&ccedil;&atilde;o de sa&iacute;da';		
	$lang['strpassbyval'] = 'Passado por valor?';		
$lang['stralignment'] = 'Alinhamento';			
$lang['strelement'] = 'Elemento';				
$lang['strdelimiter'] = 'Delimitador';			
$lang['strstorage'] = 'Armazenamento';				
$lang['strtypeneedsname'] = 'D&ecirc; um nome ao seu tipo.';
$lang['strtypeneedslen'] = 'Tipo precisa de exten&ccedil;&atilde;o.';
$lang['strtypecreated'] = 'Tipo criado';								
$lang['strtypecreatedbad'] = 'Cria&ccedil;&atilde;o de tipo falhou.';					
$lang['strconfdroptype'] = 'Tem certeza que que eliminar o tipo &quot;%s&quot;?';	
$lang['strtypedropped'] = 'Tipo eliminado.';									
$lang['strtypedroppedbad'] = 'Elimina&ccedil;&atilde;o de tipo falhou.';							

// Schemas
$lang['strschema'] = 'Esquema';	 
$lang['strschemas'] = 'Esquemas';		
$lang['strshowallschemas'] = 'Exibir todos os esquemas';	
$lang['strnoschema'] = 'Esquema n&atilde;o encontado.';		
$lang['strnoschemas'] = 'N&atilde;o foram encontrados esquemas.';	
$lang['strcreateschema'] = 'Criar esquema';		
$lang['strschemaname'] = 'Nome do esquema';		
$lang['strschemaneedsname'] = 'D&ecirc; um nome ao seu esquema.';
$lang['strschemacreated'] = 'Esquema criado';		
$lang['strschemacreatedbad'] = 'Falha na cria&ccedil;&atilde;o dos esquemas.';		
$lang['strconfdropschema'] = 'Tem a certeza que quer eliminar o esquema &quot;%s&quot;?';	
$lang['strschemadropped'] = 'Esquema eliminado.';
$lang['strschemadroppedbad'] = 'Falha ao eliminar o esquema.';

// Reports
$lang['strreport'] = 'Relat&oacute;rio';			
$lang['strreports'] = 'Relat&oacute;rios';			
$lang['strshowallreports'] = 'Exibir todos os relat&oacute;rios';		
$lang['strnoreports'] = 'Relat&oacute;rio n&atilde;o encontrado.';		
$lang['strcreatereport'] = 'Criar relat&oacute;rio';		
$lang['strreportdropped'] = 'Relat&oacute;rio eliminado.';		
$lang['strreportdroppedbad'] = 'Falha ao eliminar o relat&oacute;rio.';		
$lang['strconfdropreport'] = 'Tem certeza que quer eliminar o relat&oacute;rio &quot;%s&quot;?';		
$lang['strreportneedsname'] = 'D&ecirc; um nome ao seu relat&oacute;rio.';	
$lang['strreportneedsdef'] = 'Adicione a instru&ccedil;&atilde;o SQL ao seu relat&oacute;rio.';	
$lang['strreportcreated'] = 'Relat&oacute;rio salvo.';					
$lang['strreportcreatedbad'] = 'Falha ao salvar o relat&oacute;rio.';		

// Miscellaneous
$lang['strtopbar'] = '%s a correr  em %s:%s -- Voc&ecirc; est&aacute; ligado como &quot;%s&quot;, %s';
$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
