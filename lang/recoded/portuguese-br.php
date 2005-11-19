<?php

	/**
	 * Brazilian Portuguese language file for phpPgAdmin.
	 * @maintainer &#194;ngelo Marcos Rigo (angelo_rigo@yahoo.com.br)
	 *
	 * $Id: portuguese-br.php,v 1.7.2.1 2005/11/19 09:51:27 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Portugu&#234;s-Brasileiro';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'pt_BR';
  	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';
  
	// Basic strings
	$lang['strintro'] = 'Bem-vindo ao phpPgAdmin.';	
$lang['strppahome'] = 'P&#225;gina inicial phpPgAdmin ';
$lang['strpgsqlhome'] = 'P&#225;gina inicial PostgreSQL ';
$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
$lang['strreportbug'] = 'Reportar um Bug';
$lang['strviewfaq'] = 'Visualizar FAQ';
$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	$lang['strlogin'] = 'Identifica&#231;&#227;o';					
	$lang['strloginfailed'] = 'Falha na identifica&#231;&#227;o';		
	$lang['strserver'] = 'Servidor';					
	$lang['strlogout'] = 'Deslogar';					
	$lang['strowner'] = 'Propiet&#225;rio';					
	$lang['straction'] = 'A&#231;&#227;o';					
	$lang['stractions'] = 'A&#231;&#245;es';				
	$lang['strname'] = 'Nome';						
	$lang['strdefinition'] = 'Defini&#231;&#227;o';		
	$lang['stroperators'] = 'Operadores';			
	$lang['straggregates'] = 'Agregados';			
	$lang['strproperties'] = 'Propriedades';			
	$lang['strbrowse'] = 'Navegar';					
	$lang['strdrop'] = 'Deletar';						
	$lang['strdropped'] = 'Deletado';				
	$lang['strnull'] = 'Nulo';						
	$lang['strnotnull'] = 'N&#227;o Nulo';				
	$lang['strprev'] = 'Anterior';						
	$lang['strnext'] = 'Pr&#243;ximo';							
	$lang['strfailed'] = 'Falha';					
	$lang['strcreate'] = 'Criar';					
	$lang['strcreated'] = 'Criado';				
	$lang['strcomment'] = 'Coment&#225;rio';				
	$lang['strlength'] = 'Extens&#227;o';					
	$lang['strdefault'] = 'Padr&#227;o';				
	$lang['stralter'] = 'Alterar';					
	$lang['strok'] = 'OK';							
	$lang['strcancel'] = 'Cancelar';					
	$lang['strsave'] = 'Salvar';						
	$lang['strreset'] = 'Reiniciar';					
	$lang['strinsert'] = 'Inserir';					
	$lang['strselect'] = 'Selecionar';					
	$lang['strdelete'] = 'Deletar';					
	$lang['strupdate'] = 'Atualizar';				
	$lang['strreferences'] = 'Refer&#234;ncias';			
	$lang['stryes'] = 'Sim';						
	$lang['strno'] = 'N&#227;o';							
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
	$lang['strencoding'] = 'Codifica&#231;&#227;o';				
	$lang['strvalue'] = 'Valor';					
	$lang['strunique'] = '&#217;nico';					
	$lang['strprimary'] = 'Prim&#225;rio';				
	$lang['strexport'] = 'Exportar';				
	$lang['strsql'] = 'SQL';						
	$lang['strgo'] = 'Ir';							
$lang['strimport'] = 'Importar';
	$lang['stradmin'] = 'Administrador';					
	$lang['strvacuum'] = 'V&#225;cuo';					
	$lang['stranalyze'] = 'Analiza';				
	$lang['strclusterindex'] = 'Cluster';				
	$lang['strreindex'] = 'Reordenar';				
	$lang['strrun'] = 'Rodar';						
	$lang['stradd'] = 'Adicionar';						
	$lang['strevent'] = 'Evento';					
	$lang['strwhere'] = 'Onde';					
	$lang['strinstead'] = 'Fazer ao inv&#233;s';				
	$lang['strwhen'] = 'Quando';						
	$lang['strformat'] = 'Formato';					

	// Error handling
$lang['strdata'] = 'Data';
$lang['strconfirm'] = 'Confirmar';
$lang['strexpression'] = 'Express&#227;o';
$lang['strellipsis'] = '...';
$lang['strexpand'] = 'Expandir';
$lang['strcollapse'] = 'Diminuir';
	$lang['strbadconfig'] = 'Seu config.inc.php est&#225; desatualizado. Voc&#234; deve ger&#225;-lo novamente a partir do novo config.inc.php-dist.';
	$lang['strnotloaded'] = 'Voc&#234; n&#227;o compilou suporte &#224; banco de dados apropriado em sua instala&#231;&#227;o do PHP.';
	$lang['strbadschema'] = 'Esquema inv&#225;lido especificado.';
	$lang['strbadencoding'] = 'Falha ao definir codifica&#231;&#227;o do cliente no banco de dados.';
	$lang['strsqlerror'] = 'Erro de SQL:';
	$lang['strinstatement'] = 'Indica&#231;&#227;o de entrada :';
	$lang['strinvalidparam'] = 'Par&#226;metros de script inv&#225;lidos.';
	$lang['strnodata'] = 'N&#227;o foram encontradas linhas.';

	// Tables
	$lang['strtable'] = 'Tabela';
	$lang['strtables'] = 'Tabelas';
	$lang['strshowalltables'] = 'Exibir todas as tabelas';
	$lang['strnotables'] = 'Tabelas n&#227;o encontradas .';
	$lang['strnotable'] = 'Tabela n&#227;o encontradas.';
	$lang['strcreatetable'] = 'Criar tabela';
	$lang['strtablename'] = 'Nome da tabela ';
	$lang['strtableneedsname'] = 'Voc&#234; deve dar um nome &#224; sua tabela.';
	$lang['strtableneedsfield'] = 'Voc&#234; deve especificar pelo menos um campo.';
	$lang['strtableneedscols'] = 'Tabelas requerem um n&#250;mero v&#225;lido de colunas.';
	$lang['strtablecreated'] = 'Tabela criada.';
	$lang['strtablecreatedbad'] = 'Falha na cria&#231;&#227;o de tabela.';
	$lang['strconfdroptable'] = 'Tem certeza que quer deletar a tabela &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Tabela deletada.';
	$lang['strtabledroppedbad'] = 'Falha na dele&#231;&#227;o de tabela.';
	$lang['strconfemptytable'] = 'Tem certeza que quer esvaziar a tabela &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Tabela esvaziada.';
	$lang['strtableemptiedbad'] = 'Falha no esvaziamento de tabela.';
	$lang['strinsertrow'] = 'Inserir linha';
	$lang['strrowinserted'] = 'Linha inserida.';
	$lang['strrowinsertedbad'] = 'Falha ao inserir linha.';
	$lang['streditrow'] = 'Editar linha';
	$lang['strrowupdated'] = 'Linha modificada.';
	$lang['strrowupdatedbad'] = 'Falha na modifica&#231;&#227;o de linha.';
	$lang['strdeleterow'] = 'Deletar linha';
	$lang['strconfdeleterow'] = 'Tem certeza que quer deletar esta linha?';
	$lang['strrowdeleted'] = 'Linha deletada.';
	$lang['strrowdeletedbad'] = 'Falha na dele&#231;&#227;o de linha .';
	$lang['strsaveandrepeat'] = 'Salve &amp; Repita';
	$lang['strfield'] = 'Campo';
	$lang['strfields'] = 'Campos';
	$lang['strnumfields'] = 'N&#250;mero de campos';
	$lang['strfieldneedsname'] = 'Voc&#234; deve nomear seu campo';
	$lang['strselectneedscol'] = 'Voc&#234; deve exibir ao menos uma coluna';
	$lang['straltercolumn'] = 'Alterar coluna';
	$lang['strcolumnaltered'] = 'Coluna altereda.';
	$lang['strcolumnalteredbad'] = 'Falha na altera&#231;&#227;o de coluna.';
	$lang['strconfdropcolumn'] = 'Tem certeza que quer deletar a coluna &quot;%s&quot; da tabela &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Coluna deletada.';
	$lang['strcolumndroppedbad'] = 'Dele&#231;&#227;o de coluna falhou.';
	$lang['straddcolumn'] = 'Adicione coluna';
	$lang['strcolumnadded'] = 'Coluna adicionada.';
	$lang['strcolumnaddedbad'] = 'Adi&#231;&#227;o de coluna falhou.';
	$lang['strschemaanddata'] = 'Esquema &amp; Dados';
	$lang['strschemaonly'] = 'Esquema apenas';
	$lang['strdataonly'] = 'Dados apenas';

	// Users
$lang['strcascade'] = 'CASCATA';
	$lang['struseradmin'] = 'Administra&#231;&#227;o de usu&#225;rio ';
	$lang['struser'] = 'Usu&#225;rio';
	$lang['strusers'] = 'Usu&#225;rios';
	$lang['strusername'] = 'Nome de usu&#225;rio';
	$lang['strpassword'] = 'Senha';
	$lang['strsuper'] = 'Superusu&#225;rio?';
	$lang['strcreatedb'] = 'Criar DB?';
	$lang['strexpires'] = 'Expira';
	$lang['strnousers'] = 'Usu&#225;rios n&#227;o encontrados.';
    $lang['struserupdated'] = 'Usu&#225;rio alterado.';
	$lang['struserupdatedbad'] = 'Altera&#231;&#227;o de usu&#225;rio falhou.';
	$lang['strshowallusers'] = 'Exibir todos os usu&#225;rios';
	$lang['strcreateuser'] = 'Criar Usu&#225;rio';
	$lang['strusercreated'] = 'Usu&#225;rio criado.';
	$lang['strusercreatedbad'] = 'Falhou ao criar usu&#225;rio.';
	$lang['strconfdropuser'] = 'Tem certeza que quer deletar o usu&#225;rio &quot;%s&quot;?';
	$lang['struserdropped'] = 'Usu&#225;rio deletado.';
	$lang['struserdroppedbad'] = 'Falha ao deletar usu&#225;rio.';
		
	// Groups
$lang['straccount'] = 'Conta';
$lang['strchangepassword'] = 'Alterar senha';
$lang['strpasswordchanged'] = 'Senha alterada.';
$lang['strpasswordchangedbad'] = 'Falha ao alterar senha.';
$lang['strpasswordshort'] = 'Senha muito curta.';
$lang['strpasswordconfirm'] = 'Senha n&#227;o confere com a confirma&#231;&#227;o.';
	$lang['strgroupadmin'] = 'Administra&#231;&#227;o de Grupo';
	$lang['strgroup'] = 'Grupo';
	$lang['strgroups'] = 'Grupos';
	$lang['strnogroups'] = 'Grupos n&#227;o encotrados.';
	$lang['strshowallgroups'] = 'Exibir todos os grupos';
	$lang['strgroupneedsname'] = 'Voc&#234; deve dar um nome ao seu grupo.';
	$lang['strgroupcreated'] = 'Grupo criado.';
	$lang['strgroupcreatedbad'] = 'Falha na cria&#231;&#227;o de grupo.';	
	$lang['strconfdropgroup'] = 'Tem certeza que quer deletar o grupo &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Grupo deletado.';
	$lang['strgroupdroppedbad'] = 'Falha ao deletar grupo.';
	$lang['strmembers'] = 'Membros';

	// Privilges
	$lang['strprivilege'] = 'Privil&#233;gio';
	$lang['strprivileges'] = 'Privil&#233;gios';
	$lang['strnoprivileges'] = 'Este objeto tem privil&#233;gios padr&#245;es de propriet&#225;rio.';
	$lang['strgrant'] = 'Concede';
	$lang['strrevoke'] = 'Revoga';
	$lang['strgranted'] = 'Privil&#225;gios concedidos.';
	$lang['strgrantfailed'] = 'Falha ao conceder privil&#233;gios.';
$lang['strgrantbad'] = 'Voc&#234; deve especificar ao menos um usu&#225;rio ou grupo e ao menos um privil&#233;gio.';
$lang['stralterprivs'] = 'Alterar privil&#233;gios';

	// Databases
	$lang['strdatabase'] = 'Banco de dados';
	$lang['strdatabases'] = 'Banco de dados';
	$lang['strshowalldatabases'] = 'Exibir todos os banco de dados';
	$lang['strnodatabase'] = 'Banco de dado n&#227;o encontrado.';
	$lang['strnodatabases'] = 'Bancos de dados n&#227;o encontrados.';
	$lang['strcreatedatabase'] = 'Criar banco de dados';
	$lang['strdatabasename'] = 'Nome do banco de dados';
	$lang['strdatabaseneedsname'] = 'Voc&#234; deve dar um nome ao seu banco de dados.';
	$lang['strdatabasecreated'] = 'Banco de dados criado.';
	$lang['strdatabasecreatedbad'] = 'Falhou na cria&#231;&#227;o de Banco de dados.';	
	$lang['strconfdropdatabase'] = 'Tem certeza que quer deletar o banco de dados&quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Banco de dados deletado.';
	$lang['strdatabasedroppedbad'] = 'Falha na dele&#231;&#227;o de banco de dados.';
	$lang['strentersql'] = 'Digite a cl&#225;usula SQL a ser executada abaixo :';
	$lang['strsqlexecuted'] = 'SQL executado.';
	$lang['strvacuumgood'] = 'V&#225;cuo completo.';
	$lang['strvacuumbad'] = 'Falha ao executar v&#225;cuo.';
	$lang['stranalyzegood'] = 'An&#225;lize completa.';
	$lang['stranalyzebad'] = 'Falha ao executar an&#225;lize.';

	// Views
	$lang['strview'] = 'Visualiza&#231;&#227;o';
	$lang['strviews'] = 'Visualiza&#231;&#245;es';
	$lang['strshowallviews'] = 'Exibir todas as visualiza&#231;&#245;es';
	$lang['strnoview'] = 'Visualiza&#231;&#227;o n&#227;o encontrada.';
	$lang['strnoviews'] = 'Visualiza&#231;&#245;es n&#227;o encontradas.';
	$lang['strcreateview'] = 'Criar visualiza&#231;&#227;o';
	$lang['strviewname'] = 'Nome da visualiza&#231;&#227;o';
	$lang['strviewneedsname'] = 'Voc&#234; deve dar um nome a sua visualiza&#231;&#227;o.';
	$lang['strviewneedsdef'] = 'Voc&#234; deve dar uma defini&#231;&#227;o para sua visualiza&#231;&#227;o.';
	$lang['strviewcreated'] = 'Visualiza&#231;&#227;o criada.';
	$lang['strviewcreatedbad'] = 'Falha na cria&#231;&#227;o de visualiza&#231;&#227;o.';
	$lang['strconfdropview'] = 'Tem certeza que quer deletar a visualiza&#231;&#227;o &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Visualiza&#231;&#227;o deletada.';
	$lang['strviewdroppedbad'] = 'Falha na dele&#231;&#227;o de visualiza&#231;&#227;o.';
	$lang['strviewupdated'] = 'Visualiza&#231;&#227;o alterada.';
	$lang['strviewupdatedbad'] = 'Falha ao alterar visualiza&#231;&#227;o.';

	// Sequences
	$lang['strsequence'] = 'Sequ&#234;ncia';
	$lang['strsequences'] = 'Sequ&#234;ncias';
	$lang['strshowallsequences'] = 'Exibir todas as sequ&#234;ncias';
	$lang['strnosequence'] = 'Sequ&#234;ncia n&#227;o encontrada.';
	$lang['strnosequences'] = 'Sequ&#234;ncias n&#227;o encontradas.';
	$lang['strcreatesequence'] = 'Criar sequ&#234;ncia';
	$lang['strlastvalue'] = '&#217;ltimo valor';
	$lang['strincrementby'] = 'Incrementar por';	
	$lang['strstartvalue'] = 'Valor inicial';
	$lang['strmaxvalue'] = 'Valor m&#225;ximo';
	$lang['strminvalue'] = 'Valor m&#237;nimo';
	$lang['strcachevalue'] = 'Valor de cache';
	$lang['strlogcount'] = 'Contador do log';
	$lang['striscycled'] = 'Foi dado um ciclo ?';
	$lang['striscalled'] = 'Foi chamado ?';
	$lang['strsequenceneedsname'] = 'Voc&#234; deve dar um nome a sua sequ&#234;ncia.';
	$lang['strsequencecreated'] = 'Sequ&#234;ncia criada.';
	$lang['strsequencecreatedbad'] = 'Falha na cria&#231;&#227;o de sequ&#234;ncia.'; 
	$lang['strconfdropsequence'] = 'Tem certeza que quer deletar a sequ&#234;ncia &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'Sequ&#234;ncia deletada.';
	$lang['strsequencedroppedbad'] = 'Falha na dele&#231;&#227;o de sequ&#234;ncia.';

	// Indexes
	$lang['strindexes'] = '&#204;ndices';
	$lang['strindexname'] = 'Nome do &#237;ndice';
	$lang['strshowallindexes'] = 'Exibir todos os &#236;ndices';
	$lang['strnoindex'] = '&#204;ndice n&#227;o encontrado.';
	$lang['strnoindexes'] = '&#204;ndices n&#227;o encontrados.';
	$lang['strcreateindex'] = 'Criar &#237;ndice';
	$lang['strindexname'] = 'Nome do &#237;ndice';
	$lang['strtabname'] = 'Nome da tabela';
	$lang['strcolumnname'] = 'Nome da coluna';
	$lang['strindexneedsname'] = 'Voc&#234; deve dar um nome ao seu &#237;ndice';
	$lang['strindexneedscols'] = '&#204;ndices requerem um n&#250;mero v&#225;lido de colunas.';
	$lang['strindexcreated'] = '&#204;ndice criado';
	$lang['strindexcreatedbad'] = 'Falha na cria&#231;&#227;o de &#237;ndice.';
	$lang['strconfdropindex'] = 'Tem certeza que quer deletar o &#236;ndice &quot;%s&quot;?';
	$lang['strindexdropped'] = '&#204;ndice deletado.';
	$lang['strindexdroppedbad'] = 'Falha na dele&#231;&#227;o de &#237;ndice.';
	$lang['strkeyname'] = 'Nome da chave';
	$lang['struniquekey'] = 'Chave &#250;nica';
	$lang['strprimarykey'] = 'Chave prim&#225;ria';
 	$lang['strindextype'] = 'Tipo de &#236;ndice';
	$lang['strindexname'] = 'Nome do &#236;ndice';
	$lang['strtablecolumnlist'] = 'Colunas na tabela';
	$lang['strindexcolumnlist'] = 'Colunas no &#236;ndice';

	// Rules
	$lang['strrules'] = 'Regras';
	$lang['strrule'] = 'Regra';
	$lang['strshowallrules'] = 'Exibir todas as regras';
	$lang['strnorule'] = 'Regra n&#227;o encontrada.';
	$lang['strnorules'] = 'Regras n&#227;o encontradas.';
	$lang['strcreaterule'] = 'Criar regra';
	$lang['strrulename'] = 'Nome da regra';
	$lang['strruleneedsname'] = 'Voc&#234; deve especificar um nome para sua regra.';
	$lang['strrulecreated'] = 'Regra criada.';
	$lang['strrulecreatedbad'] = 'Falha na cria&#231;&#227;o de regra.';
	$lang['strconfdroprule'] = 'Tem certeza que quer deletar a regra &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strruledropped'] = 'Regra deletada.';
	$lang['strruledroppedbad'] = 'Falha na dele&#231;&#227;o de regra.';

	// Constraints
	$lang['strconstraints'] = 'Restri&#231;&#227;o';
	$lang['strshowallconstraints'] = 'Exibir todos as restri&#231;&#245;es';
	$lang['strnoconstraints'] = 'Restri&#231;&#245;es n&#227;o encontradas.';
	$lang['strcreateconstraint'] = 'Criar restri&#231;&#227;o';
	$lang['strconstraintcreated'] = 'Restri&#231;&#227;o criada.';
	$lang['strconstraintcreatedbad'] = 'Falha na cria&#231;&#227;o de restri&#231;&#227;o.';
	$lang['strconfdropconstraint'] = 'Tem certeza que quer deletar a restri&#231;&#227;o &quot;%s&quot; on &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Restri&#231;&#227;o deletada.';
	$lang['strconstraintdroppedbad'] = 'Falha na dele&#231;&#227;o de restri&#231;&#227;o.';
	$lang['straddcheck'] = 'Adicona checagem';
	$lang['strcheckneedsdefinition'] = 'Checagem de regras necessita de uma defini&#231;&#227;o.';
	$lang['strcheckadded'] = 'Checagem de restri&#231;&#227;o adicionada.';
	$lang['strcheckaddedbad'] = 'Falha ao adicionar checagem de restri&#231;&#227;o.';
	$lang['straddpk'] = 'Adicionar chave prim&#225;ria';
	$lang['strpkneedscols'] = 'Chave prim&#225;ria requer pelo menos uma coluna.';
	$lang['strpkadded'] = 'Chave prim&#225;ria adicionada.';
	$lang['strpkaddedbad'] = 'Falha ao adicinoar chave prim&#225;ria.';
	$lang['stradduniq'] = 'Adiciona chave &#250;nica';										
	$lang['struniqneedscols'] = 'Chave &#250;nica requer ao menos uma coluna.';					
	$lang['struniqadded'] = 'Chave &#250;nica adicionada.';										
	$lang['struniqaddedbad'] = 'Falha ao adicionar chave &#250;nica.';								
	$lang['straddfk'] = 'Adicionar chave estrangeira';												
	$lang['strfkneedscols'] = 'Chave estrangeira requer ao menos uma coluna.';				
	$lang['strfkneedstarget'] = 'Chave estrangeira requer uma tabela de refer&#234;ncia.';				
	$lang['strfkadded'] = 'Chave estrangeira adicionada.';										
	$lang['strfkaddedbad'] = 'Falha ao adicionar chave estrangeira.';							
	$lang['strfktarget'] = 'Tabela alvo';											
	$lang['strfkcolumnlist'] = 'Colunas em chaves';									
	$lang['strondelete'] = 'DELETE ATIVO';												
	$lang['stronupdate'] = 'ALTERAR ATIVO';	

	// Functions
	$lang['strfunction'] = 'Fun&#231;&#227;o';
	$lang['strfunctions'] = 'Fun&#231;&#245;es';
	$lang['strshowallfunctions'] = 'Exibir todas as fun&#231;&#245;es';
	$lang['strnofunction'] = 'Fun&#231;&#227;o n&#227;o encontrada.';
	$lang['strnofunctions'] = 'Fun&#231;&#245;es n&#227;o encontradas.';
	$lang['strcreatefunction'] = 'Criar fun&#231;&#245;es';
	$lang['strfunctionname'] = 'Nome da fun&#231;&#227;o';
	$lang['strreturns'] = 'Retorno';
	$lang['strarguments'] = 'Argumentos';
	$lang['strproglanguage'] = 'Linguagem';				
	$lang['strfunctionneedsname'] = 'Voc&#234; deve dar um nome &#224; sua fun&#231;&#227;o.';
	$lang['strfunctionneedsdef'] = 'Voc&#234; deve dar uma defini&#231;&#227;o &#224; sua fun&#231;&#227;o.';
	$lang['strfunctioncreated'] = 'Fun&#231;&#227;o criada.';
	$lang['strfunctioncreatedbad'] = 'Falha na cria&#231;&#227;o de fun&#231;&#227;o.';
	$lang['strconfdropfunction'] = 'Tem certeza que quer deletar a fun&#231;&#227;o &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Fun&#231;&#227;o deletada.';
	$lang['strfunctiondroppedbad'] = 'Falha na dele&#231;&#227;o de fun&#231;&#227;o.';
	$lang['strfunctionupdated'] = 'Fun&#231;&#227;o modificada.';
	$lang['strfunctionupdatedbad'] = 'Falha na modifica&#231;&#227;o de fun&#231;&#227;o.';

	// Triggers
	$lang['strtrigger'] = 'Gatilho';	
	$lang['strtriggers'] = 'Gatilhos';	
	$lang['strshowalltriggers'] = 'Exibir todos os gatilhos';	
	$lang['strnotrigger'] = 'N&#227;o foi encontrado gatilho.';		
	$lang['strnotriggers'] = 'N&#227;o foram encontrados gatilhos.';		
	$lang['strcreatetrigger'] = 'Criar Gatilhos';		
	$lang['strtriggerneedsname'] = 'Voc&#234; deve especificar um nome para seu gatilho.';	
	$lang['strtriggerneedsfunc'] = 'Voc&#234; deve especificar uma fun&#231;&#227;o para seu gatilho.';
	$lang['strtriggercreated'] = 'Gatilho criado.';
	$lang['strtriggercreatedbad'] = 'Falha na cria&#231;&#227;o de gatilho.';			
	$lang['strconfdroptrigger'] = 'Tem certeza que quer deletar o gatilho &quot;%s&quot; em &quot;%s&quot;?';	 
	$lang['strtriggerdropped'] = 'Gatilho deletado.'; 
	$lang['strtriggerdroppedbad'] = 'Falha na dele&#231;&#227;o de gatilho.';	

	// Types
	$lang['strtype'] = 'Tipo';		
	$lang['strtypes'] = 'Tipos';	
	$lang['strshowalltypes'] = 'Exibir todos os tipos';	
	$lang['strnotype'] = 'Tipo n&#227;o encontrado.';			
	$lang['strnotypes'] = 'Tipos n&#227;o encontrados.';		
	$lang['strcreatetype'] = 'Criar tipo';			
	$lang['strtypename'] = 'Nome do tipo';				
	$lang['strinputfn'] = 'Fun&#231;&#227;o de entrada';			
	$lang['stroutputfn'] = 'Fun&#231;&#227;o de sa&#237;da';		
	$lang['strpassbyval'] = 'Passado por valor?';		
	$lang['stralignment'] = 'Alinhamento';			
	$lang['strelement'] = 'Elemento';				
	$lang['strdelimiter'] = 'Delimitador';			
	$lang['strstorage'] = 'Armazenamento';				
	$lang['strtypeneedsname'] = 'Voc&#234; deve dar um nome ao seu tipo.';		
	$lang['strtypeneedslen'] = 'Voce deve dar uma extens&#227;o ao seu tipo.';		
	$lang['strtypecreated'] = 'Tipo criado';								
	$lang['strtypecreatedbad'] = 'Cria&#231;&#227;o de tipo falhou.';					
	$lang['strconfdroptype'] = 'Tem certeza que que deletar o tipo &quot;%s&quot;?';	
	$lang['strtypedropped'] = 'Tipo deletado.';									
	$lang['strtypedroppedbad'] = 'Dele&#231;&#227;o de tipo falhou.';							

	// Schemas
	$lang['strschema'] = 'Esquema';	 
	$lang['strschemas'] = 'Esquemas';		
	$lang['strshowallschemas'] = 'Exibir todos os esquemas';	
	$lang['strnoschema'] = 'Esquema n&#227;o encontado.';		
	$lang['strnoschemas'] = 'N&#227;o foram encontrados esquemas.';	
	$lang['strcreateschema'] = 'Criar esquema';		
	$lang['strschemaname'] = 'Nome do esquema';		
	$lang['strschemaneedsname'] = 'Voc&#234; deve dar um nome ao seu esquema.';		
	$lang['strschemacreated'] = 'Esquema criado';		
	$lang['strschemacreatedbad'] = 'Falha na cria&#231;&#227;o de esquemas.';		
	$lang['strconfdropschema'] = 'Tem certeza que quer deletar o esquema &quot;%s&quot;?';	
	$lang['strschemadropped'] = 'Esquema deletado.';		
	$lang['strschemadroppedbad'] = 'Falha na dele&#231;&#227;o de esquema.';		

	// Reports
	$lang['strreport'] = 'Reporte';			
	$lang['strreports'] = 'Reportes';			
	$lang['strshowallreports'] = 'Exibir todos os reportes';		
	$lang['strnoreports'] = 'Reporte n&#227;o encontrado.';		
	$lang['strcreatereport'] = 'Criar reporte';		
	$lang['strreportdropped'] = 'Reporte deletado.';		
	$lang['strreportdroppedbad'] = 'Falha ao deletar o reporte.';		
	$lang['strconfdropreport'] = 'Tem certeza que voc&#234; quer deletar seu reporte &quot;%s&quot;?';		
	$lang['strreportneedsname'] = 'Voc&#234; deve dar um nome ao seu reporte.';	
	$lang['strreportneedsdef'] = 'Voc&#234; deve adicionar SQL ao seu reporte.';	
	$lang['strreportcreated'] = 'Reporte salvo.';					
	$lang['strreportcreatedbad'] = 'Falha ao salvar o reporte.';		

	// Miscellaneous
	$lang['strtopbar'] = '%s rodando em %s:%s -- Voc&#234; est&#225; logado como usu&#225;rio &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
