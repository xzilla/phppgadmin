<?php

/**
* Portuguese language file for phpPgAdmin.
* @maintainer Francisco Alves Cabrita (include@npf.pt.freebsd.org)
*
*/

// Language and character set
$lang['applang'] = 'Português-Português';
$lang['appcharset'] = 'ISO-8859-15';
$lang['applocale'] = 'pt_PT';
$lang['appdbencoding'] = 'LATIN9';
$lang['applangdir'] = 'ltr';
  
// Basic strings
$lang['strintro'] = 'Bem-vindo ao phpPgAdmin.';	
$lang['strppahome'] = 'Página inicial phpPgAdmin ';
$lang['strpgsqlhome'] = 'Página inicial PostgreSQL ';
$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
$lang['strreportbug'] = 'Relatório de Bug';
$lang['strviewfaq'] = 'Visualizar FAQ';
$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
$lang['strlogin'] = 'Autenticação';					
$lang['strloginfailed'] = 'Falha na autenticação';		
$lang['strserver'] = 'Servidor';					
$lang['strlogout'] = 'Sair';					
$lang['strowner'] = 'Propietário';					
$lang['straction'] = 'Acção';					
$lang['stractions'] = 'Acções';				
$lang['strname'] = 'Nome';						
$lang['strdefinition'] = 'Definição';		
$lang['stroperators'] = 'Operadores';			
$lang['straggregates'] = 'Agregados';			
$lang['strproperties'] = 'Propriedades';			
$lang['strbrowse'] = 'Navegar';					
$lang['strdrop'] = 'Eliminar';						
$lang['strdropped'] = 'Eliminado';				
$lang['strnull'] = 'Nulo';						
$lang['strnotnull'] = 'Não Nulo';				
$lang['strprev'] = 'Anterior';						
$lang['strnext'] = 'Próximo';							
$lang['strfailed'] = 'Falha';					
$lang['strcreate'] = 'Criar';					
$lang['strcreated'] = 'Criado';				
$lang['strcomment'] = 'Comentário';				
$lang['strlength'] = 'Extensão';					
$lang['strdefault'] = 'Padrão';
$lang['stralter'] = 'Alterar';
$lang['strok'] = 'OK';
$lang['strcancel'] = 'Cancelar';					
$lang['strsave'] = 'Gravar';						
$lang['strreset'] = 'Reiniciar';					
$lang['strinsert'] = 'Inserir';					
$lang['strselect'] = 'Seleccionar';					
$lang['strdelete'] = 'Eliminar';					
$lang['strupdate'] = 'Atualizar';				
$lang['strreferences'] = 'Referências';			
$lang['stryes'] = 'Sim';						
$lang['strno'] = 'Não';							
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
$lang['strencoding'] = 'Codificação';				
$lang['strvalue'] = 'Valor';					
$lang['strunique'] = 'Único';					
$lang['strprimary'] = 'Primário';				
$lang['strexport'] = 'Exportar';				
$lang['strsql'] = 'SQL';						
$lang['strgo'] = 'Ir';							
$lang['strimport'] = 'Importar';
$lang['stradmin'] = 'Administrador';					
$lang['strvacuum'] = 'Vácuo';					
$lang['stranalyze'] = 'Analiza';				
$lang['strcluster'] = 'Cluster';				
$lang['strreindex'] = 'Reordenar';				
$lang['strrun'] = 'Executar';						
$lang['stradd'] = 'Adicionar';						
$lang['strevent'] = 'Evento';					
$lang['strwhere'] = 'Onde';					
$lang['strinstead'] = 'Fazer ao invés';				
$lang['strwhen'] = 'Quando';						
$lang['strformat'] = 'Formato';					

// Error handling
$lang['strdata'] = 'Data';
$lang['strconfirm'] = 'Confirmar';
$lang['strexpression'] = 'Expressão';
        $lang['strellipsis'] = '...';
$lang['strexpand'] = 'Expandir';
$lang['strcollapse'] = 'Diminuir';
$lang['strnoframes'] = 'Você necessita de um navegador com suporte de frames para utilizar esta aplicação.';
$lang['strbadconfig'] = 'O config.inc.php está desatualizado. Você deve criá-lo novamente a partir do novo config.inc.php-dist.';
$lang['strnotloaded'] = 'A sua instalação do PHP não suporta chamadas a este tipo de base de dados.';
$lang['strbadschema'] = 'Esquema inválido.';
$lang['strbadencoding'] = 'Falha ao definir codificação do cliente na base de dados.';
$lang['strsqlerror'] = 'Erro de SQL:';
$lang['strinstatement'] = 'Indicação de entrada :';
$lang['strinvalidparam'] = 'Parâmetros de script inválidos.';
$lang['strnodata'] = 'Não foram encontradas linhas.';

// Tables
$lang['strtable'] = 'Tabela';
$lang['strtables'] = 'Tabelas';
$lang['strshowalltables'] = 'Exibir todas as tabelas';
$lang['strnotables'] = 'Tabelas não encontradas.';
$lang['strnotable'] = 'Tabela não encontradas.';
$lang['strcreatetable'] = 'Criar tabela';
$lang['strtablename'] = 'Nome da tabela ';
$lang['strtableneedsname'] = 'A tabela necessita de um nome.';
$lang['strtableneedsfield'] = 'Especifique pelo menos um campo.';
$lang['strtableneedscols'] = 'As tabelas requerem um número válido de colunas.';
$lang['strtablecreated'] = 'Tabela criada.';
$lang['strtablecreatedbad'] = 'Falha na criação de tabela.';
$lang['strconfdroptable'] = 'Tem certeza que quer eliminar a tabela "%s"?';
$lang['strtabledropped'] = 'Tabela eliminada.';
$lang['strtabledroppedbad'] = 'Falha ao eliminar a tabela.';
$lang['strconfemptytable'] = 'Tem certeza que quer esvaziar a tabela "%s"?';
$lang['strtableemptied'] = 'Tabela vazia.';
$lang['strtableemptiedbad'] = 'Falha ao esvaziar a tabela.';
$lang['strinsertrow'] = 'Inserir linha';
$lang['strrowinserted'] = 'Linha inserida.';
$lang['strrowinsertedbad'] = 'Falha ao inserir linha.';
$lang['streditrow'] = 'Editar linha';
$lang['strrowupdated'] = 'Linha actualizada.';
$lang['strrowupdatedbad'] = 'Falha na actualização da linha.';
$lang['strdeleterow'] = 'Eliminar linha';
$lang['strconfdeleterow'] = 'Tem certeza que quer eliminar esta linha?';
$lang['strrowdeleted'] = 'Linha eliminada.';
$lang['strrowdeletedbad'] = 'Falha ao eliminar a linha .';
$lang['strsaveandrepeat'] = 'Gravar & Repetir';
$lang['strfield'] = 'Campo';
$lang['strfields'] = 'Campos';
$lang['strnumfields'] = 'Número de campos';
$lang['strfieldneedsname'] = 'O campo necessita um nome';
$lang['strselectneedscol'] = 'Deve exibir pelo menos uma coluna';
$lang['straltercolumn'] = 'Alterar coluna';
$lang['strcolumnaltered'] = 'Coluna altereda.';
$lang['strcolumnalteredbad'] = 'Falha na alteração de coluna.';
$lang['strconfdropcolumn'] = 'Tem certeza que quer eliminar a coluna "%s" da tabela "%s"?';
$lang['strcolumndropped'] = 'Coluna eliminada.';
$lang['strcolumndroppedbad'] = 'Eliminação da coluna falhou.';
$lang['straddcolumn'] = 'Adicionar coluna';
$lang['strcolumnadded'] = 'Coluna adicionada.';
$lang['strcolumnaddedbad'] = 'Adição de coluna falhou.';
$lang['strschemaanddata'] = 'Esquema & Dados';
$lang['strschemaonly'] = 'Esquema apenas';
$lang['strdataonly'] = 'Dados apenas';

// Users
$lang['strcascade'] = 'CASCATA';
$lang['struseradmin'] = 'Administração de utilizadores';
$lang['struser'] = 'Utilizador';
$lang['strusers'] = 'Utilizadores';
$lang['strusername'] = 'Nome do utilizador';
$lang['strpassword'] = 'Palavra-chave';
$lang['strsuper'] = 'Super-Utilizador?';
$lang['strcreatedb'] = 'Criar Base de Dados?';
$lang['strexpires'] = 'Expira';
$lang['strnousers'] = 'Utilizadores não encontrados.';
$lang['struserupdated'] = 'Utilizador alterado.';
$lang['struserupdatedbad'] = 'Alteração do utilizador falhou.';
$lang['strshowallusers'] = 'Mostra todos os utilizadores';
$lang['strcreateuser'] = 'Criar Utilizador';
$lang['strusercreated'] = 'Utilizador criado.';
$lang['strusercreatedbad'] = 'Falhou ao criar utilizador.';
$lang['strconfdropuser'] = 'Tem certeza que quer eliminar o utilizador "%s"?';
$lang['struserdropped'] = 'Utilizador eliminado.';
$lang['struserdroppedbad'] = 'Falha ao eliminar utilizador.';
		
// Groups
$lang['straccount'] = 'Conta';
$lang['strchangepassword'] = 'Alterar palavra-chave';
$lang['strpasswordchanged'] = 'Palavra-chave alterada.';
$lang['strpasswordchangedbad'] = 'Falha ao alterar palavra-passe.';
$lang['strpasswordshort'] = 'Palavra-chave muito curta.';
$lang['strpasswordconfirm'] = 'Palavra-chave não coincide com a confirmação.';
$lang['strgroupadmin'] = 'Administração de Grupo';
$lang['strgroup'] = 'Grupo';
$lang['strgroups'] = 'Grupos';
$lang['strnogroups'] = 'Grupos não encotrados.';
$lang['strshowallgroups'] = 'Exibir todos os grupos';
$lang['strgroupneedsname'] = 'Insira um nome para o seu grupo.';
$lang['strgroupcreated'] = 'Grupo criado.';
$lang['strgroupcreatedbad'] = 'Falha na criação de grupo.';	
$lang['strconfdropgroup'] = 'Tem certeza que quer eliminar o grupo "%s"?';
$lang['strgroupdropped'] = 'Grupo eliminado.';
$lang['strgroupdroppedbad'] = 'Falha ao eliminar grupo.';
$lang['strmembers'] = 'Membros';

// Privilges
$lang['strprivilege'] = 'Privilégio';
$lang['strprivileges'] = 'Privilégios';
$lang['strnoprivileges'] = 'Este objeto tem privilégios padrões de proprietário.';
$lang['strgrant'] = 'Concede';
$lang['strrevoke'] = 'Revoga';
$lang['strgranted'] = 'Privilágios concedidos.';
$lang['strgrantfailed'] = 'Falha ao conceder privilégios.';
$lang['strgrantbad'] = 'Deverá especificar um utilizador ou grupo e pelo menos um previlégio.';
$lang['stralterprivs'] = 'Alterar privilégios';

// Databases
$lang['strdatabase'] = 'Base de dados';
$lang['strdatabases'] = 'Base de dados';
$lang['strshowalldatabases'] = 'Exibir todos os base de dados';
$lang['strnodatabase'] = 'Base de dados não encontrada.';
$lang['strnodatabases'] = 'Bases de dados não encontradas.';
$lang['strcreatedatabase'] = 'Criar base de dados';
$lang['strdatabasename'] = 'Nome da base de dados';
$lang['strdatabaseneedsname'] = 'Insira um nome para a sua base de dados.';
$lang['strdatabasecreated'] = 'Base de dados criada.';
$lang['strdatabasecreatedbad'] = 'Falhou na criação da Base de dados.';	
$lang['strconfdropdatabase'] = 'Tem certeza que quer eliminar a base de dados "%s"?';
$lang['strdatabasedropped'] = 'Base de dados eliminada.';
$lang['strdatabasedroppedbad'] = 'Falha ao eliminar a base de dados.';
$lang['strentersql'] = 'Digite abaixo a instrução SQL a ser executado:';
$lang['strsqlexecuted'] = 'SQL executado.';
$lang['strvacuumgood'] = 'Vácuo completo.';
$lang['strvacuumbad'] = 'Falha ao executar vácuo.';
$lang['stranalyzegood'] = 'Análize completa.';
$lang['stranalyzebad'] = 'Falha ao executar análize.';

// Views
$lang['strview'] = 'Visualização';
$lang['strviews'] = 'Visualizações';
$lang['strshowallviews'] = 'Exibir todas as visualizações';
$lang['strnoview'] = 'Visualização não encontrada.';
$lang['strnoviews'] = 'Visualizações não encontradas.';
$lang['strcreateview'] = 'Criar visualização';
$lang['strviewname'] = 'Nome da visualização';
$lang['strviewneedsname'] = 'Você deve dar um nome a sua visualização.';
$lang['strviewneedsdef'] = 'Crie uma definição para sua visualização.';
$lang['strviewcreated'] = 'Visualização criada.';
$lang['strviewcreatedbad'] = 'Falha na criação de visualização.';
$lang['strconfdropview'] = 'Tem certeza que quer eliminar a visualização "%s"?';
$lang['strviewdropped'] = 'Visualização eliminada.';
$lang['strviewdroppedbad'] = 'Falha ao eliminar a visualização.';
$lang['strviewupdated'] = 'Visualização alterada.';
$lang['strviewupdatedbad'] = 'Falha ao alterar visualização.';

// Sequences
$lang['strsequence'] = 'Sequência';
$lang['strsequences'] = 'Sequências';
$lang['strshowallsequences'] = 'Listar todas as sequências';
$lang['strnosequence'] = 'Sequência não encontrada.';
$lang['strnosequences'] = 'Sequências não encontradas.';
$lang['strcreatesequence'] = 'Criar sequência';
$lang['strlastvalue'] = 'Último valor';
$lang['strincrementby'] = 'Incrementar por';	
$lang['strstartvalue'] = 'Valor inicial';
$lang['strmaxvalue'] = 'Valor máximo';
$lang['strminvalue'] = 'Valor mínimo';
$lang['strcachevalue'] = 'Valor de cache';
$lang['strlogcount'] = 'Contador do log';
	$lang['striscycled'] = 'Foi dado um ciclo ?';
	$lang['striscalled'] = 'Foi chamado ?';
$lang['strsequenceneedsname'] = 'Dê um nome a sua sequência.';
$lang['strsequencecreated'] = 'Sequência criada.';
$lang['strsequencecreatedbad'] = 'Falha na criação da sequência.'; 
$lang['strconfdropsequence'] = 'Tem certeza que quer eliminar a sequência "%s"?';
$lang['strsequencedropped'] = 'Sequência eliminada.';
$lang['strsequencedroppedbad'] = 'Falha ao eliminar a sequência.';

// Indexes
$lang['strindexes'] = 'Índices';
$lang['strindexname'] = 'Nome do índice';
$lang['strshowallindexes'] = 'Exibir todos os índices';
$lang['strnoindex'] = 'Índice não encontrado.';
$lang['strnoindexes'] = 'Índices não encontrados.';
$lang['strcreateindex'] = 'Criar índice';
$lang['strindexname'] = 'Nome do índice';
$lang['strtabname'] = 'Nome da tabela';
$lang['strcolumnname'] = 'Nome da coluna';
$lang['strindexneedsname'] = 'Dê um nome ao seu índice';
$lang['strindexneedscols'] = 'Índices requerem um número válido de colunas.';
$lang['strindexcreated'] = 'Índice criado';
$lang['strindexcreatedbad'] = 'Falha na criação do índice.';
$lang['strconfdropindex'] = 'Tem a certeza que quer eliminar o índice "%s"?';
$lang['strindexdropped'] = 'Indice eliminado.';
$lang['strindexdroppedbad'] = 'Falha ao eliminar o índice.';
$lang['strkeyname'] = 'Nome da chave';
$lang['struniquekey'] = 'Chave única';
$lang['strprimarykey'] = 'Chave primária';
$lang['strindextype'] = 'Tipo de índice';
$lang['strindexname'] = 'Nome do índice';
$lang['strtablecolumnlist'] = 'Colunas na tabela';
$lang['strindexcolumnlist'] = 'Colunas no índice';

// Rules
$lang['strrules'] = 'Regras';
$lang['strrule'] = 'Regra';
$lang['strshowallrules'] = 'Exibir todas as regras';
$lang['strnorule'] = 'Regra não encontrada.';
$lang['strnorules'] = 'Regras não encontradas.';
$lang['strcreaterule'] = 'Criar regra';
$lang['strrulename'] = 'Nome da regra';
$lang['strruleneedsname'] = 'Dê um nome para sua regra.';
$lang['strrulecreated'] = 'Regra criada.';
$lang['strrulecreatedbad'] = 'Falha na criação de regra.';
$lang['strconfdroprule'] = 'Tem certeza que quer eliminar a regra "%s" on "%s"?';
$lang['strruledropped'] = 'Regra eliminada.';
$lang['strruledroppedbad'] = 'Falha ao eliminar a regra.';

// Constraints
$lang['strconstraints'] = 'Restrição';
$lang['strshowallconstraints'] = 'Exibir todos as restrições';
$lang['strnoconstraints'] = 'Restrições não encontradas.';
$lang['strcreateconstraint'] = 'Criar restrição';
$lang['strconstraintcreated'] = 'Restrição criada.';
$lang['strconstraintcreatedbad'] = 'Falha na criação de restrição.';
$lang['strconfdropconstraint'] = 'Tem certeza que quer eliminar a restrição "%s" on "%s"?';
$lang['strconstraintdropped'] = 'Restrição eliminada.';
$lang['strconstraintdroppedbad'] = 'Falha ao eliminar de restrição.';
$lang['straddcheck'] = 'Adicona verificação';
$lang['strcheckneedsdefinition'] = 'Verificação de regras necessita de uma definição.';
$lang['strcheckadded'] = 'Verificação de restrição adicionada.';
$lang['strcheckaddedbad'] = 'Falha ao adicionar verificação de restrição.';
$lang['straddpk'] = 'Adicionar chave primária';
$lang['strpkneedscols'] = 'Chave primária requer pelo menos uma coluna.';
$lang['strpkadded'] = 'Chave primária adicionada.';
$lang['strpkaddedbad'] = 'Falha ao adicinoar chave primária.';
$lang['stradduniq'] = 'Adiciona chave única';
$lang['struniqneedscols'] = 'Chave única requer ao menos uma coluna.';					
$lang['struniqadded'] = 'Chave única adicionada.';
$lang['struniqaddedbad'] = 'Falha ao adicionar chave única.';
$lang['straddfk'] = 'Adicionar chave estrangeira';
$lang['strfkneedscols'] = 'Chave estrangeira requer ao menos uma coluna.';
$lang['strfkneedstarget'] = 'Chave estrangeira requer uma tabela de referência.';
$lang['strfkadded'] = 'Chave estrangeira adicionada.';
$lang['strfkaddedbad'] = 'Falha ao adicionar chave estrangeira.';
$lang['strfktarget'] = 'Tabela alvo';
$lang['strfkcolumnlist'] = 'Colunas em chaves';									
$lang['strondelete'] = 'ELIMINAR ACTIVO';
$lang['stronupdate'] = 'ALTERAR ACTIVO';

// Functions
$lang['strfunction'] = 'Função';
$lang['strfunctions'] = 'Funções';
$lang['strshowallfunctions'] = 'Exibir todas as funções';
$lang['strnofunction'] = 'Função não encontrada.';
$lang['strnofunctions'] = 'Funções não encontradas.';
$lang['strcreatefunction'] = 'Criar funções';
$lang['strfunctionname'] = 'Nome da função';
$lang['strreturns'] = 'Retorno';
$lang['strarguments'] = 'Argumentos';
$lang['strproglanguage'] = 'Linguagem';				
$lang['strfunctionneedsname'] = 'Dê um nome à sua função.';
$lang['strfunctionneedsdef'] = 'A função precisa de uma definição.';
$lang['strfunctioncreated'] = 'Função criada.';
$lang['strfunctioncreatedbad'] = 'Falha na criação de função.';
$lang['strconfdropfunction'] = 'Tem certeza que quer eliminar a função "%s"?';
$lang['strfunctiondropped'] = 'Função eliminada.';
$lang['strfunctiondroppedbad'] = 'Falha ao eliminar de função.';
$lang['strfunctionupdated'] = 'Função actualizada';
$lang['strfunctionupdatedbad'] = 'Falha na actualização da função.';

// Triggers
$lang['strtrigger'] = 'Gatilho';	
$lang['strtriggers'] = 'Gatilhos';	
$lang['strshowalltriggers'] = 'Exibir todos os gatilhos';	
$lang['strnotrigger'] = 'Não foi encontrado gatilho.';		
$lang['strnotriggers'] = 'Não foram encontrados gatilhos.';		
$lang['strcreatetrigger'] = 'Criar Gatilhos';		
$lang['strtriggerneedsname'] = 'Dê um nome ao gatilho.';	
	$lang['strtriggerneedsfunc'] = 'Especifique uma função para seu gatilho.';
$lang['strtriggercreated'] = 'Gatilho criado.';
$lang['strtriggercreatedbad'] = 'Falha na criação do gatilho.';			
$lang['strconfdroptrigger'] = 'Tem certeza que quer eliminar o gatilho "%s" em "%s"?';	 
$lang['strtriggerdropped'] = 'Gatilho eliminado.'; 
$lang['strtriggerdroppedbad'] = 'Falha ao eliminar o gatilho.';

// Types
$lang['strtype'] = 'Tipo';		
$lang['strtypes'] = 'Tipos';	
$lang['strshowalltypes'] = 'Exibir todos os tipos';	
$lang['strnotype'] = 'Tipo não encontrado.';			
$lang['strnotypes'] = 'Tipos não encontrados.';		
$lang['strcreatetype'] = 'Criar tipo';			
$lang['strtypename'] = 'Nome do tipo';				
$lang['strinputfn'] = 'Função de entrada';			
$lang['stroutputfn'] = 'Função de saída';		
	$lang['strpassbyval'] = 'Passado por valor?';		
$lang['stralignment'] = 'Alinhamento';			
$lang['strelement'] = 'Elemento';				
$lang['strdelimiter'] = 'Delimitador';			
$lang['strstorage'] = 'Armazenamento';				
$lang['strtypeneedsname'] = 'Dê um nome ao seu tipo.';
$lang['strtypeneedslen'] = 'Tipo precisa de extenção.';
$lang['strtypecreated'] = 'Tipo criado';								
$lang['strtypecreatedbad'] = 'Criação de tipo falhou.';					
$lang['strconfdroptype'] = 'Tem certeza que que eliminar o tipo "%s"?';	
$lang['strtypedropped'] = 'Tipo eliminado.';									
$lang['strtypedroppedbad'] = 'Eliminação de tipo falhou.';							

// Schemas
$lang['strschema'] = 'Esquema';	 
$lang['strschemas'] = 'Esquemas';		
$lang['strshowallschemas'] = 'Exibir todos os esquemas';	
$lang['strnoschema'] = 'Esquema não encontado.';		
$lang['strnoschemas'] = 'Não foram encontrados esquemas.';	
$lang['strcreateschema'] = 'Criar esquema';		
$lang['strschemaname'] = 'Nome do esquema';		
$lang['strschemaneedsname'] = 'Dê um nome ao seu esquema.';
$lang['strschemacreated'] = 'Esquema criado';		
$lang['strschemacreatedbad'] = 'Falha na criação dos esquemas.';		
$lang['strconfdropschema'] = 'Tem a certeza que quer eliminar o esquema "%s"?';	
$lang['strschemadropped'] = 'Esquema eliminado.';
$lang['strschemadroppedbad'] = 'Falha ao eliminar o esquema.';

// Reports
$lang['strreport'] = 'Relatório';			
$lang['strreports'] = 'Relatórios';			
$lang['strshowallreports'] = 'Exibir todos os relatórios';		
$lang['strnoreports'] = 'Relatório não encontrado.';		
$lang['strcreatereport'] = 'Criar relatório';		
$lang['strreportdropped'] = 'Relatório eliminado.';		
$lang['strreportdroppedbad'] = 'Falha ao eliminar o relatório.';		
$lang['strconfdropreport'] = 'Tem certeza que quer eliminar o relatório "%s"?';		
$lang['strreportneedsname'] = 'Dê um nome ao seu relatório.';	
$lang['strreportneedsdef'] = 'Adicione a instrução SQL ao seu relatório.';	
$lang['strreportcreated'] = 'Relatório salvo.';					
$lang['strreportcreatedbad'] = 'Falha ao salvar o relatório.';		

// Miscellaneous
$lang['strtopbar'] = '%s a correr  em %s:%s -- Você está ligado como "%s", %s';
$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
