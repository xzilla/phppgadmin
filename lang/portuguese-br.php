<?php

	/**
	 * Brazilian Portuguese language file for phpPgAdmin.
	 * @maintainer Ângelo Marcos Rigo (angelo_rigo@yahoo.com.br)
	 *
	 * $Id: portuguese-br.php,v 1.7 2005/08/11 23:01:44 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Português-Brasileiro';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'pt_BR';
  	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';
  
	// Basic strings
	$lang['strintro'] = 'Bem-vindo ao phpPgAdmin.';	
$lang['strppahome'] = 'Página inicial phpPgAdmin ';
$lang['strpgsqlhome'] = 'Página inicial PostgreSQL ';
$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
$lang['strreportbug'] = 'Reportar um Bug';
$lang['strviewfaq'] = 'Visualizar FAQ';
$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	$lang['strlogin'] = 'Identificação';					
	$lang['strloginfailed'] = 'Falha na identificação';		
	$lang['strserver'] = 'Servidor';					
	$lang['strlogout'] = 'Deslogar';					
	$lang['strowner'] = 'Propietário';					
	$lang['straction'] = 'Ação';					
	$lang['stractions'] = 'Ações';				
	$lang['strname'] = 'Nome';						
	$lang['strdefinition'] = 'Definição';		
	$lang['stroperators'] = 'Operadores';			
	$lang['straggregates'] = 'Agregados';			
	$lang['strproperties'] = 'Propriedades';			
	$lang['strbrowse'] = 'Navegar';					
	$lang['strdrop'] = 'Deletar';						
	$lang['strdropped'] = 'Deletado';				
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
	$lang['strsave'] = 'Salvar';						
	$lang['strreset'] = 'Reiniciar';					
	$lang['strinsert'] = 'Inserir';					
	$lang['strselect'] = 'Selecionar';					
	$lang['strdelete'] = 'Deletar';					
	$lang['strupdate'] = 'Atualizar';				
	$lang['strreferences'] = 'Referências';			
	$lang['stryes'] = 'Sim';						
	$lang['strno'] = 'Não';							
	$lang['stredit'] = 'Editar';					
	$lang['strcolumns'] = 'Colunas';				
	$lang['strrows'] = 'Linha(s)';					
	$lang['strrowsaff'] = 'Linha(s) afetadas.';		
	$lang['strexample'] = 'eg.';					
	$lang['strback'] = 'Voltar';						
	$lang['strqueryresults'] = 'Resultados da pesquisa';		
	$lang['strshow'] = 'Exibir';						
	$lang['strempty'] = 'Vazio';					
	$lang['strlanguage'] = 'Linguagem';				
	$lang['strencoding'] = 'Codificação';				
	$lang['strvalue'] = 'Valor';					
	$lang['strunique'] = 'Ùnico';					
	$lang['strprimary'] = 'Primário';				
	$lang['strexport'] = 'Exportar';				
	$lang['strsql'] = 'SQL';						
	$lang['strgo'] = 'Ir';							
$lang['strimport'] = 'Importar';
	$lang['stradmin'] = 'Administrador';					
	$lang['strvacuum'] = 'Vácuo';					
	$lang['stranalyze'] = 'Analiza';				
	$lang['strclusterindex'] = 'Cluster';				
	$lang['strreindex'] = 'Reordenar';				
	$lang['strrun'] = 'Rodar';						
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
	$lang['strbadconfig'] = 'Seu config.inc.php está desatualizado. Você deve gerá-lo novamente a partir do novo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Você não compilou suporte à banco de dados apropriado em sua instalação do PHP.';
	$lang['strbadschema'] = 'Esquema inválido especificado.';
	$lang['strbadencoding'] = 'Falha ao definir codificação do cliente no banco de dados.';
	$lang['strsqlerror'] = 'Erro de SQL:';
	$lang['strinstatement'] = 'Indicação de entrada :';
	$lang['strinvalidparam'] = 'Parâmetros de script inválidos.';
	$lang['strnodata'] = 'Não foram encontradas linhas.';

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabelas';
	$lang['strshowalltables'] = 'Exibir todas as tabelas';
	$lang['strnotables'] = 'Tabelas não encontradas .';
	$lang['strnotable'] = 'Tabela não encontradas.';
	$lang['strcreatetable'] = 'Criar tabela';
	$lang['strtablename'] = 'Nome da tabela ';
	$lang['strtableneedsname'] = 'Você deve dar um nome à sua tabela.';
	$lang['strtableneedsfield'] = 'Você deve especificar pelo menos um campo.';
	$lang['strtableneedscols'] = 'Tabelas requerem um número válido de colunas.';
	$lang['strtablecreated'] = 'Tabela criada.';
	$lang['strtablecreatedbad'] = 'Falha na criação de tabela.';
	$lang['strconfdroptable'] = 'Tem certeza que quer deletar a tabela "%s"?';
	$lang['strtabledropped'] = 'Tabela deletada.';
	$lang['strtabledroppedbad'] = 'Falha na deleção de tabela.';
	$lang['strconfemptytable'] = 'Tem certeza que quer esvaziar a tabela "%s"?';
	$lang['strtableemptied'] = 'Tabela esvaziada.';
	$lang['strtableemptiedbad'] = 'Falha no esvaziamento de tabela.';
	$lang['strinsertrow'] = 'Inserir linha';
	$lang['strrowinserted'] = 'Linha inserida.';
	$lang['strrowinsertedbad'] = 'Falha ao inserir linha.';
	$lang['streditrow'] = 'Editar linha';
	$lang['strrowupdated'] = 'Linha modificada.';
	$lang['strrowupdatedbad'] = 'Falha na modificação de linha.';
	$lang['strdeleterow'] = 'Deletar linha';
	$lang['strconfdeleterow'] = 'Tem certeza que quer deletar esta linha?';
	$lang['strrowdeleted'] = 'Linha deletada.';
	$lang['strrowdeletedbad'] = 'Falha na deleção de linha .';
	$lang['strsaveandrepeat'] = 'Salve & Repita';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'Número de campos';
	$lang['strfieldneedsname'] = 'Você deve nomear seu campo';
	$lang['strselectneedscol'] = 'Você deve exibir ao menos uma coluna';
	$lang['straltercolumn'] = 'Alterar coluna';
	$lang['strcolumnaltered'] = 'Coluna altereda.';
	$lang['strcolumnalteredbad'] = 'Falha na alteração de coluna.';
	$lang['strconfdropcolumn'] = 'Tem certeza que quer deletar a coluna "%s" da tabela "%s"?';
	$lang['strcolumndropped'] = 'Coluna deletada.';
	$lang['strcolumndroppedbad'] = 'Deleção de coluna falhou.';
	$lang['straddcolumn'] = 'Adicione coluna';
	$lang['strcolumnadded'] = 'Coluna adicionada.';
	$lang['strcolumnaddedbad'] = 'Adição de coluna falhou.';
	$lang['strschemaanddata'] = 'Esquema & Dados';
	$lang['strschemaonly'] = 'Esquema apenas';
	$lang['strdataonly'] = 'Dados apenas';

	// Users
$lang['strcascade'] = 'CASCATA';
	$lang['struseradmin'] = 'Administração de usuário ';
	$lang['struser'] = 'Usuário';
	$lang['strusers'] = 'Usuários';
	$lang['strusername'] = 'Nome de usuário';
	$lang['strpassword'] = 'Senha';
	$lang['strsuper'] = 'Superusuário?';
	$lang['strcreatedb'] = 'Criar DB?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'Usuários não encontrados.';
    $lang['struserupdated'] = 'Usuário alterado.';
	$lang['struserupdatedbad'] = 'Alteração de usuário falhou.';
	$lang['strshowallusers'] = 'Exibir todos os usuários';
	$lang['strcreateuser'] = 'Criar Usuário';
	$lang['strusercreated'] = 'Usuário criado.';
	$lang['strusercreatedbad'] = 'Falhou ao criar usuário.';
	$lang['strconfdropuser'] = 'Tem certeza que quer deletar o usuário "%s"?';
	$lang['struserdropped'] = 'Usuário deletado.';
	$lang['struserdroppedbad'] = 'Falha ao deletar usuário.';
		
	// Groups
$lang['straccount'] = 'Conta';
$lang['strchangepassword'] = 'Alterar senha';
$lang['strpasswordchanged'] = 'Senha alterada.';
$lang['strpasswordchangedbad'] = 'Falha ao alterar senha.';
$lang['strpasswordshort'] = 'Senha muito curta.';
$lang['strpasswordconfirm'] = 'Senha não confere com a confirmação.';
	$lang['strgroupadmin'] = 'Administração de Grupo';
	$lang['strgroup'] = 'Grupo';
	$lang['strgroups'] = 'Grupos';
	$lang['strnogroups'] = 'Grupos não encotrados.';
	$lang['strshowallgroups'] = 'Exibir todos os grupos';
	$lang['strgroupneedsname'] = 'Você deve dar um nome ao seu grupo.';
	$lang['strgroupcreated'] = 'Grupo criado.';
	$lang['strgroupcreatedbad'] = 'Falha na criação de grupo.';	
	$lang['strconfdropgroup'] = 'Tem certeza que quer deletar o grupo "%s"?';
	$lang['strgroupdropped'] = 'Grupo deletado.';
	$lang['strgroupdroppedbad'] = 'Falha ao deletar grupo.';
	$lang['strmembers'] = 'Membros';

	// Privilges
	$lang['strprivilege'] = 'Privilégio';
	$lang['strprivileges'] = 'Privilégios';
	$lang['strnoprivileges'] = 'Este objeto tem privilégios padrões de proprietário.';
	$lang['strgrant'] = 'Concede';
	$lang['strrevoke'] = 'Revoga';
	$lang['strgranted'] = 'Privilágios concedidos.';
	$lang['strgrantfailed'] = 'Falha ao conceder privilégios.';
$lang['strgrantbad'] = 'Você deve especificar ao menos um usuário ou grupo e ao menos um privilégio.';
$lang['stralterprivs'] = 'Alterar privilégios';

	// Databases
	$lang['strdatabase'] = 'Banco de dados';
	$lang['strdatabases'] = 'Banco de dados';
	$lang['strshowalldatabases'] = 'Exibir todos os banco de dados';
	$lang['strnodatabase'] = 'Banco de dado não encontrado.';
	$lang['strnodatabases'] = 'Bancos de dados não encontrados.';
	$lang['strcreatedatabase'] = 'Criar banco de dados';
	$lang['strdatabasename'] = 'Nome do banco de dados';
	$lang['strdatabaseneedsname'] = 'Você deve dar um nome ao seu banco de dados.';
	$lang['strdatabasecreated'] = 'Banco de dados criado.';
	$lang['strdatabasecreatedbad'] = 'Falhou na criação de Banco de dados.';	
	$lang['strconfdropdatabase'] = 'Tem certeza que quer deletar o banco de dados"%s"?';
	$lang['strdatabasedropped'] = 'Banco de dados deletado.';
	$lang['strdatabasedroppedbad'] = 'Falha na deleção de banco de dados.';
	$lang['strentersql'] = 'Digite a cláusula SQL a ser executada abaixo :';
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
	$lang['strviewneedsdef'] = 'Você deve dar uma definição para sua visualização.';
	$lang['strviewcreated'] = 'Visualização criada.';
	$lang['strviewcreatedbad'] = 'Falha na criação de visualização.';
	$lang['strconfdropview'] = 'Tem certeza que quer deletar a visualização "%s"?';
	$lang['strviewdropped'] = 'Visualização deletada.';
	$lang['strviewdroppedbad'] = 'Falha na deleção de visualização.';
	$lang['strviewupdated'] = 'Visualização alterada.';
	$lang['strviewupdatedbad'] = 'Falha ao alterar visualização.';

	// Sequences
	$lang['strsequence'] = 'Sequência';
	$lang['strsequences'] = 'Sequências';
	$lang['strshowallsequences'] = 'Exibir todas as sequências';
	$lang['strnosequence'] = 'Sequência não encontrada.';
	$lang['strnosequences'] = 'Sequências não encontradas.';
	$lang['strcreatesequence'] = 'Criar sequência';
	$lang['strlastvalue'] = 'Ùltimo valor';
	$lang['strincrementby'] = 'Incrementar por';	
	$lang['strstartvalue'] = 'Valor inicial';
	$lang['strmaxvalue'] = 'Valor máximo';
	$lang['strminvalue'] = 'Valor mínimo';
	$lang['strcachevalue'] = 'Valor de cache';
	$lang['strlogcount'] = 'Contador do log';
	$lang['striscycled'] = 'Foi dado um ciclo ?';
	$lang['striscalled'] = 'Foi chamado ?';
	$lang['strsequenceneedsname'] = 'Você deve dar um nome a sua sequência.';
	$lang['strsequencecreated'] = 'Sequência criada.';
	$lang['strsequencecreatedbad'] = 'Falha na criação de sequência.'; 
	$lang['strconfdropsequence'] = 'Tem certeza que quer deletar a sequência "%s"?';
	$lang['strsequencedropped'] = 'Sequência deletada.';
	$lang['strsequencedroppedbad'] = 'Falha na deleção de sequência.';

	// Indexes
	$lang['strindexes'] = 'Ìndices';
	$lang['strindexname'] = 'Nome do índice';
	$lang['strshowallindexes'] = 'Exibir todos os ìndices';
	$lang['strnoindex'] = 'Ìndice não encontrado.';
	$lang['strnoindexes'] = 'Ìndices não encontrados.';
	$lang['strcreateindex'] = 'Criar índice';
	$lang['strindexname'] = 'Nome do índice';
	$lang['strtabname'] = 'Nome da tabela';
	$lang['strcolumnname'] = 'Nome da coluna';
	$lang['strindexneedsname'] = 'Você deve dar um nome ao seu índice';
	$lang['strindexneedscols'] = 'Ìndices requerem um número válido de colunas.';
	$lang['strindexcreated'] = 'Ìndice criado';
	$lang['strindexcreatedbad'] = 'Falha na criação de índice.';
	$lang['strconfdropindex'] = 'Tem certeza que quer deletar o ìndice "%s"?';
	$lang['strindexdropped'] = 'Ìndice deletado.';
	$lang['strindexdroppedbad'] = 'Falha na deleção de índice.';
	$lang['strkeyname'] = 'Nome da chave';
	$lang['struniquekey'] = 'Chave única';
	$lang['strprimarykey'] = 'Chave primária';
 	$lang['strindextype'] = 'Tipo de ìndice';
	$lang['strindexname'] = 'Nome do ìndice';
	$lang['strtablecolumnlist'] = 'Colunas na tabela';
	$lang['strindexcolumnlist'] = 'Colunas no ìndice';

	// Rules
	$lang['strrules'] = 'Regras';
	$lang['strrule'] = 'Regra';
	$lang['strshowallrules'] = 'Exibir todas as regras';
	$lang['strnorule'] = 'Regra não encontrada.';
	$lang['strnorules'] = 'Regras não encontradas.';
	$lang['strcreaterule'] = 'Criar regra';
	$lang['strrulename'] = 'Nome da regra';
	$lang['strruleneedsname'] = 'Você deve especificar um nome para sua regra.';
	$lang['strrulecreated'] = 'Regra criada.';
	$lang['strrulecreatedbad'] = 'Falha na criação de regra.';
	$lang['strconfdroprule'] = 'Tem certeza que quer deletar a regra "%s" on "%s"?';
	$lang['strruledropped'] = 'Regra deletada.';
	$lang['strruledroppedbad'] = 'Falha na deleção de regra.';

	// Constraints
	$lang['strconstraints'] = 'Restrição';
	$lang['strshowallconstraints'] = 'Exibir todos as restrições';
	$lang['strnoconstraints'] = 'Restrições não encontradas.';
	$lang['strcreateconstraint'] = 'Criar restrição';
	$lang['strconstraintcreated'] = 'Restrição criada.';
	$lang['strconstraintcreatedbad'] = 'Falha na criação de restrição.';
	$lang['strconfdropconstraint'] = 'Tem certeza que quer deletar a restrição "%s" on "%s"?';
	$lang['strconstraintdropped'] = 'Restrição deletada.';
	$lang['strconstraintdroppedbad'] = 'Falha na deleção de restrição.';
	$lang['straddcheck'] = 'Adicona checagem';
	$lang['strcheckneedsdefinition'] = 'Checagem de regras necessita de uma definição.';
	$lang['strcheckadded'] = 'Checagem de restrição adicionada.';
	$lang['strcheckaddedbad'] = 'Falha ao adicionar checagem de restrição.';
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
	$lang['strondelete'] = 'DELETE ATIVO';												
	$lang['stronupdate'] = 'ALTERAR ATIVO';	

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
	$lang['strfunctionneedsname'] = 'Você deve dar um nome à sua função.';
	$lang['strfunctionneedsdef'] = 'Você deve dar uma definição à sua função.';
	$lang['strfunctioncreated'] = 'Função criada.';
	$lang['strfunctioncreatedbad'] = 'Falha na criação de função.';
	$lang['strconfdropfunction'] = 'Tem certeza que quer deletar a função "%s"?';
	$lang['strfunctiondropped'] = 'Função deletada.';
	$lang['strfunctiondroppedbad'] = 'Falha na deleção de função.';
	$lang['strfunctionupdated'] = 'Função modificada.';
	$lang['strfunctionupdatedbad'] = 'Falha na modificação de função.';

	// Triggers
	$lang['strtrigger'] = 'Gatilho';	
	$lang['strtriggers'] = 'Gatilhos';	
	$lang['strshowalltriggers'] = 'Exibir todos os gatilhos';	
	$lang['strnotrigger'] = 'Não foi encontrado gatilho.';		
	$lang['strnotriggers'] = 'Não foram encontrados gatilhos.';		
	$lang['strcreatetrigger'] = 'Criar Gatilhos';		
	$lang['strtriggerneedsname'] = 'Você deve especificar um nome para seu gatilho.';	
	$lang['strtriggerneedsfunc'] = 'Você deve especificar uma função para seu gatilho.';
	$lang['strtriggercreated'] = 'Gatilho criado.';
	$lang['strtriggercreatedbad'] = 'Falha na criação de gatilho.';			
	$lang['strconfdroptrigger'] = 'Tem certeza que quer deletar o gatilho "%s" em "%s"?';	 
	$lang['strtriggerdropped'] = 'Gatilho deletado.'; 
	$lang['strtriggerdroppedbad'] = 'Falha na deleção de gatilho.';	

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
	$lang['strtypeneedsname'] = 'Você deve dar um nome ao seu tipo.';		
	$lang['strtypeneedslen'] = 'Voce deve dar uma extensão ao seu tipo.';		
	$lang['strtypecreated'] = 'Tipo criado';								
	$lang['strtypecreatedbad'] = 'Criação de tipo falhou.';					
	$lang['strconfdroptype'] = 'Tem certeza que que deletar o tipo "%s"?';	
	$lang['strtypedropped'] = 'Tipo deletado.';									
	$lang['strtypedroppedbad'] = 'Deleção de tipo falhou.';							

	// Schemas
	$lang['strschema'] = 'Esquema';	 
	$lang['strschemas'] = 'Esquemas';		
	$lang['strshowallschemas'] = 'Exibir todos os esquemas';	
	$lang['strnoschema'] = 'Esquema não encontado.';		
	$lang['strnoschemas'] = 'Não foram encontrados esquemas.';	
	$lang['strcreateschema'] = 'Criar esquema';		
	$lang['strschemaname'] = 'Nome do esquema';		
	$lang['strschemaneedsname'] = 'Você deve dar um nome ao seu esquema.';		
	$lang['strschemacreated'] = 'Esquema criado';		
	$lang['strschemacreatedbad'] = 'Falha na criação de esquemas.';		
	$lang['strconfdropschema'] = 'Tem certeza que quer deletar o esquema "%s"?';	
	$lang['strschemadropped'] = 'Esquema deletado.';		
	$lang['strschemadroppedbad'] = 'Falha na deleção de esquema.';		

	// Reports
	$lang['strreport'] = 'Reporte';			
	$lang['strreports'] = 'Reportes';			
	$lang['strshowallreports'] = 'Exibir todos os reportes';		
	$lang['strnoreports'] = 'Reporte não encontrado.';		
	$lang['strcreatereport'] = 'Criar reporte';		
	$lang['strreportdropped'] = 'Reporte deletado.';		
	$lang['strreportdroppedbad'] = 'Falha ao deletar o reporte.';		
	$lang['strconfdropreport'] = 'Tem certeza que você quer deletar seu reporte "%s"?';		
	$lang['strreportneedsname'] = 'Você deve dar um nome ao seu reporte.';	
	$lang['strreportneedsdef'] = 'Você deve adicionar SQL ao seu reporte.';	
	$lang['strreportcreated'] = 'Reporte salvo.';					
	$lang['strreportcreatedbad'] = 'Falha ao salvar o reporte.';		

	// Miscellaneous
	$lang['strtopbar'] = '%s rodando em %s:%s -- Você está logado como usuário "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
