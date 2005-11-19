<?php

	/**
	 * French Language file for phpPgAdmin. 
	 * @maintainer Pascal PEYRE [pascal.peyre@cir.fr]
	 *
	 * $Id: french.php,v 1.14.2.1 2005/11/19 09:51:27 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Fran&#231;ais';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'fr_FR';
  	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Basic strings
	$lang['strintro'] = 'Bienvenue sur phpPgAdmin.';
	$lang['strppahome'] = 'Page d\'accueil phpPgAdmin';
	$lang['strpgsqlhome'] = 'Page d\'accueil PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Documentation (local)';
	$lang['strreportbug'] = 'Rapporter un Bug';
	$lang['strviewfaq'] = 'Voir la FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Echec de la connexion';
        $lang['strlogindisallowed']  =  'Login d&#233;sactiv&#233; pour s&#233;curit&#233;';
	$lang['strserver'] = 'Serveur';
	$lang['strlogout'] = 'D&#233;connexion';
	$lang['strowner'] = 'Propri&#233;taire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'D&#233;finition';
	$lang['strproperties'] = 'Propri&#233;t&#233;s';
	$lang['strbrowse'] = 'Parcourir';
	$lang['strdrop'] = 'Supprimer';
	$lang['strdropped'] = 'Supprim&#233;';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Pr&#233;c&#233;dent';
	$lang['strnext'] = 'Suivant';
        $lang['strfirst'] = '&lt;&lt; D&#233;but';
	$lang['strlast'] = 'Fin &gt;&gt;';
        $lang['strfailed']  =  'Echec';
	$lang['strcreate'] = 'Cr&#233;er';
	$lang['strcreated'] = 'Cr&#233;&#233;';
	$lang['strcomment'] = 'Commentaire';
	$lang['strlength'] = 'Longueur';
	$lang['strdefault'] = 'Defaut';
	$lang['stralter'] = 'Modifier';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Annuler';
	$lang['strsave'] = 'Sauvegarder';
	$lang['strreset'] = 'R&#233;initialiser';
	$lang['strinsert'] = 'Ins&#233;rer';
	$lang['strselect'] = 'Selectionner';
	$lang['strdelete'] = 'Effacer';
	$lang['strupdate'] = 'Modifier';
	$lang['strreferences'] = 'R&#233;f&#233;rences';
	$lang['stryes'] = 'Oui';
	$lang['strno'] = 'Non';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
        $lang['stredit']  =  'Editer';
        $lang['strcolumn']  =  'Colonne';
	$lang['strcolumns'] = 'Colonnes';
	$lang['strrows'] = 'ligne(s)';
	$lang['strrowsaff'] = 'ligne(s) affect&#233;e(s).';
        $lang['strobjects']  =  'objet(s)';
        $lang['strexample']  =  'exple.';
	$lang['strback'] = 'Retour';
	$lang['strqueryresults'] = 'R&#233;sultats de la requ&#234;te';
	$lang['strshow'] = 'Voir';
	$lang['strempty'] = 'Vider';
	$lang['strlanguage'] = 'Langage';
	$lang['strencoding'] = 'Codage';
	$lang['strvalue'] = 'Valeur';
	$lang['strunique'] = 'Unique';
	$lang['strprimary'] = 'Primaire';
	$lang['strexport'] = 'Exporter';
	$lang['strimport'] = 'Import';
        $lang['strsql']  =  'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strclusterindex'] = 'Cluster';
        $lang['strclustered']  =  'En Cluster ?';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Lancer';
	$lang['stradd'] = 'Ajouter';
	$lang['strevent'] = 'Ev&#232;nement';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Donn&#233;e';
	$lang['strconfirm'] = 'Confirmer';
	$lang['strexpression'] = 'Expression';
	$lang['strellipsis'] = '...';
        $lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Etendre';
	$lang['strcollapse'] = 'R&#233;duire';
	$lang['strexplain'] = 'Explain';
        $lang['strexplainanalyze']  =  'Explain Analyze';
	$lang['strfind'] = 'Rechercher';
	$lang['stroptions'] = 'Options';
	$lang['strrefresh'] = 'Raffraichir';
	$lang['strdownload'] = 'T&#233;l&#233;charger';
        $lang['strdownloadgzipped']  =  'T&#233;l&#233;charger avec compression gzip';
        $lang['strinfo']  =  'Info';
        $lang['stroids']  =  'OIDs';
        $lang['stradvanced']  =  'Avanc&#233;';
        $lang['strvariables']  =  'Variables';
        $lang['strprocess']  =  'Processus';
        $lang['strprocesses']  =  'Processus';
        $lang['strsetting']  =  'Param&#233;trage';
        $lang['streditsql']  =  'Editer SQL';
        $lang['strruntime']  =  'Temps d\'execution Total: %s ms';
        $lang['strpaginate']  =  'Paginer les r&#233;sultats';
        $lang['struploadscript']  =  'ou importer un script SQL :';
        $lang['strstarttime']  =  'Heure de D&#233;part';
        $lang['strfile']  =  'Fichier';
        $lang['strfileimported']  =  'Fichier import&#233;.';

	// Error handling
	$lang['strbadconfig'] = 'Le fichier de configuration config.inc.php est obsol&#232;te. Vous avez besoin de le reg&#233;nerer &#224; partir de config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n\'avez pas compil&#233; correctement le support de la base de donn&#233;es dans votre installation de PHP.';
        $lang['strphpversionnotsupported']  =  'Cette version de PHP n\'est pas support&#233;e. Merci de mettre &#224; jour PHP &#224; la  version  %s ou ult&#233;rieure.';
        $lang['strpostgresqlversionnotsupported']  =  'Cette Version de PostgreSQL n\'est pas support&#233;e. Merci de mettre &#224; jour PHP &#224; la version %s ou ult&#233;rieure.';
	$lang['strbadschema'] = 'Sch&#233;ma sp&#233;cifi&#233; invalide.';
	$lang['strbadencoding'] = 'Impossible de sp&#233;cifier l\'encodage de la base de donn&#233;es.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'Param&#232;tres de script invalides.';
	$lang['strnodata'] = 'Pas de R&#233;sultats.';
        $lang['strnoobjects']  =  'Aucun objet trouv&#233;.';
	$lang['strrownotunique'] = 'Pas d\identifiant unique pour cette ligne.';
        $lang['strnoreportsdb']  =  'Vous n\'avez pas cr&#233;er des rapports de la base de Donn&#233;es. Lisez le fichier INSTALL pour voir les directives.';
        $lang['strnouploads']  =  'Importation de fichiers d&#233;sactiv&#233;.';
        $lang['strimporterror']  =  'Erreur d\'importation.';
        $lang['strimporterrorline']  =  'Erreur d\'importation &#224; la ligne %s.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les tables';
	$lang['strnotables'] = 'Aucune table trouv&#233;e.';
	$lang['strnotable'] = 'Aucune table trouv&#233;e.';
	$lang['strcreatetable'] = 'Cr&#233;er une table';
	$lang['strtablename'] = 'Nom de la table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtableneedsfield'] = 'Vous devez sp&#233;cifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table cr&#233;e.';
	$lang['strtablecreatedbad'] = 'Echec de la cr&#233;ation de table.';
	$lang['strconfdroptable'] = 'Etes-vous sur de vouloir supprimer la table &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Table supprim&#233;e.';
	$lang['strtabledroppedbad'] = 'Echec de la suppresion de table.';
	$lang['strconfemptytable'] = 'Etes-vous s&#251;r de vouloir vider la table &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = 'Echec du vidage de la table.';
	$lang['strinsertrow'] = 'Inserer enregistrement.';
	$lang['strrowinserted'] = 'Enregistrement ins&#233;r&#233;.';
	$lang['strrowinsertedbad'] = 'Echec d\'insertion d\'un enregistrement.';
	$lang['streditrow'] = 'Editer enregistrement.';
	$lang['strrowupdated'] = 'Enregistrement mis &#224; jour.';
	$lang['strrowupdatedbad'] = 'Echec de mise &#224; jour de l\'enregistrement.';
	$lang['strdeleterow'] = 'Effacer enregistrement';
	$lang['strconfdeleterow'] = 'Etes-vous s&#251;r de vouloir supprimer cet enregistrement ?';
	$lang['strrowdeleted'] = 'Enregistrement Supprim&#233;.';
	$lang['strrowdeletedbad'] = 'Echec de suppression de l\'enregistrement.';
        $lang['strinsertandrepeat']  =  'Inserer &amp; Repeter';
        $lang['strnumcols']  =  'Nombre de colonnes';
        $lang['strcolneedsname']  =  'Vous devez sp&#233;cifier un nom pour la colonne';
	$lang['strselectallfields'] = 'S&#233;lectionner tous les champs';
        $lang['strselectneedscol']  =  'Vous devez s&#233;lectionner au moins une colonne.';
        $lang['strselectunary']  =  'Op&#233;rateurs unaires ne peuvent avoir de valeurs.';
	$lang['straltercolumn'] = 'Modifier colonne';
	$lang['strcolumnaltered'] = 'Colonne modifi&#233;e.';
	$lang['strcolumnalteredbad'] = 'Echec de modification de la colonne.';
        $lang['strconfdropcolumn'] = 'Etes-vous s&#251;r de vouloir supprimer la colonne &quot;%s&quot; de la table &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Colonne supprim&#233;e.';
	$lang['strcolumndroppedbad'] = 'Echec de suppression de la colonne.';
	$lang['straddcolumn'] = 'Ajouter une colonne';
	$lang['strcolumnadded'] = 'Colonne ajout&#233;e.';
	$lang['strcolumnaddedbad'] = 'Echec d\'ajout de colonne.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Table modifi&#233;e.';
	$lang['strtablealteredbad'] = 'Echec &#224; la modification de la table.';
        $lang['strdataonly']  =  'Donn&#233;es seulement';
        $lang['strstructureonly']  =  'Structure seulement';
        $lang['strstructureanddata']  =  'Structure et donn&#233;es';
        $lang['strtabbed']  =  'Tabul&#233;';
        $lang['strauto']  =  'Auto';
        $lang['strconfvacuumtable']  =  'Etes-vous sur de vouloir faire un  vacuum &quot;%s&quot;?';
        $lang['strestimatedrowcount']  =  'Nombre d\'enregistrements estim&#233;s';

	// Users
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de passe';
	$lang['strsuper'] = 'Super Utilisateur ?';
	$lang['strcreatedb'] = 'Cr&#233;er base de donn&#233;es?';
	$lang['strexpires'] = 'Expiration';
        $lang['strsessiondefaults']  =  'Session par d&#233;faut';
	$lang['strnousers'] = 'Aucun utilisateur trouv&#233;.';
	$lang['struserupdated'] = 'Utilisateur mis &#224; jour.';
	$lang['struserupdatedbad'] = 'Echec de mise &#224; jour de l\'utilisateur.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Cr&#233;er un utilisateur';
        $lang['struserneedsname']  =  'Vous devez donner un nom pour votre utilisateur.';
	$lang['strusercreated'] = 'Utilisateur Cr&#233;&#233;.';
	$lang['strusercreatedbad'] = 'Echec de cr&#233;ation de l\'utilisateur.';
	$lang['strconfdropuser'] = 'Etes-vous s&#251;r de vouloir supprimer l\'utilisateur &quot;%s&quot;?';
	$lang['struserdropped'] = 'Utilisateur supprim&#233;.';
	$lang['struserdroppedbad'] = 'Echec de suppression de l\'utilisateur.';
	$lang['straccount'] = 'Comptes';
        $lang['strchangepassword'] = 'Modifier le mot de passe';
	$lang['strpasswordchanged'] = 'Mot de passe modifi&#233;.';
	$lang['strpasswordchangedbad'] = 'Echec &#224; la modification du mot de passe.';
	$lang['strpasswordshort'] = 'Le mot de passe est trop court.';
	$lang['strpasswordconfirm'] = 'Le mot de passe de confirmation est diff&#233;rent.';
	
	// Groups
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strnogroup'] = 'Groupe non trouv&#233;.';
	$lang['strnogroups'] = 'Aucun groupe trouv&#233;.';
	$lang['strcreategroup'] = 'Cr&#233;er un groupe';
	$lang['strshowallgroups'] = 'Voir tous les groupes';
	$lang['strgroupneedsname'] = 'Vous devez indiquer un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe cr&#233;&#233;.';
	$lang['strgroupcreatedbad'] = 'Echec de cr&#233;ation du groupe.';	
	$lang['strconfdropgroup'] = 'Etes vous s&#251;r de vouloir supprimer le groupe &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Groupe supprim&#233;.';
	$lang['strgroupdroppedbad'] = 'Echec de suppression du groupe.';
	$lang['strmembers'] = 'Membres';
	$lang['straddmember'] = 'Ajouter un membre';
	$lang['strmemberadded'] = 'Membre ajout&#233;.';
	$lang['strmemberaddedbad'] = 'Echec pendant l\'ajout de membre.';
	$lang['strdropmember'] = 'Supprimer un membre';
	$lang['strconfdropmember'] = 'Etes-vous sur de vouloir supprimer le membre &quot;%s&quot; pour le groupe &quot;%s&quot;?';
	$lang['strmemberdropped'] = 'Membre supprim&#233;.';
	$lang['strmemberdroppedbad'] = 'Echec &#224; la suppression de membre.';
	// Privilges
	$lang['strprivilege'] = 'Privil&#232;ge';
	$lang['strprivileges'] = 'Privil&#232;ges';
	$lang['strnoprivileges'] = 'Cet objet n\'a pas de privil&#232;ges.';
	$lang['strgrant'] = 'Accorder(Grant)';
	$lang['strrevoke'] = 'R&#233;voquer';
	$lang['strgranted'] = 'Privil&#232;ges accord&#233;s.';
	$lang['strgrantfailed'] = 'Echec de l\'octroi de privil&#232;ges.';

	$lang['strgrantbad'] = 'Vous devez sp&#233;cifier au moins un utilisateur ou groupe et au moins un privil&#232;ge.';
	$lang['strgrantor'] = 'Grantor';
	$lang['strasterisk'] = '*';
	// Databases
	$lang['strdatabase'] = 'Base de Donn&#233;es';
	$lang['strdatabases'] = 'Bases de Donn&#233;es';
	$lang['strshowalldatabases'] = 'Voir toutes les bases de donn&#233;es';
	$lang['strnodatabase'] = 'Aucune base de donn&#233;es trouv&#233;e.';
	$lang['strnodatabases'] = 'Aucune base de donn&#233;es trouv&#233;e.';
	$lang['strcreatedatabase'] = 'Cr&#233;er une base de donn&#233;es';
	$lang['strdatabasename'] = 'Nom de la base de donn&#233;es';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre base de donn&#233;es.';
	$lang['strdatabasecreated'] = 'Base de Donn&#233;es cr&#233;&#233;e.';
	$lang['strdatabasecreatedbad'] = 'Echec de cr&#233;ation de la base de donn&#233;es.';	
	$lang['strconfdropdatabase'] = 'Etes-vous s&#251;r de vouloir supprimer la base de donn&#233;es &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de donn&#233;es supprim&#233;e.';
	$lang['strdatabasedroppedbad'] = 'Echec de suppression de la base de donn&#233;es.';
	$lang['strentersql'] = 'Veuillez saisir ci-dessous la requ&#234;te SQL &#224; ex&#233;cuter :';
	$lang['strsqlexecuted'] = 'Reguete SQL ex&#233;cut&#233;e.';
        $lang['strvacuumgood']  =  'Vacuum ex&#233;cut&#233;.';
	$lang['strvacuumbad'] = 'Echec du Vacuum.';
	$lang['stranalyzegood'] = 'Analyse effectu&#233;e.';
	$lang['stranalyzebad'] = 'Echec de l\'analyse.';
        $lang['strreindexgood']  =  'R&#233;indexation ex&#233;cut&#233;e.';
        $lang['strreindexbad']  =  'Echec de la R&#233;indexation.';
        $lang['strfull']  =  'Int&#233;gral(Full)';
        $lang['strfreeze']  =  'Freeze';
        $lang['strforce']  =  'Forcer';
        $lang['strsignalsent']  =  'Signal envoy&#233;.';
        $lang['strsignalsentbad']  =  'Echec &#224; l\'Envoi du signal.';
        $lang['strallobjects']  =  'Tous les objets';

	// Views
	$lang['strview'] = 'Vue';
	$lang['strviews'] = 'Vues';
	$lang['strshowallviews'] = 'Voir toutes les vues';
	$lang['strnoview'] = 'Aucne vue trouv&#233;e.';
	$lang['strnoviews'] = 'Aucune vue trouv&#233;e.';
	$lang['strcreateview'] = 'Cr&#233;er une vue';
	$lang['strviewname'] = 'Nom de la vue';
	$lang['strviewneedsname'] = 'Vous devez indiquer un nom pour votre vue.';
	$lang['strviewneedsdef'] = 'Vous devez indiquer une d&#233;finition pour votre vue.';
        $lang['strviewneedsfields']  =  'Vous devez pr&#233;ciser les colonnes que vous voulez s&#233;lectionner dans votre vue.';
	$lang['strviewcreated'] = 'Vue cr&#233;&#233;e.';
	$lang['strviewcreatedbad'] = 'Echec de cr&#233;ation de la vue.';
	$lang['strconfdropview'] = 'Ete-vous s&#251;r de vouloir supprimer la vue &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vue supprim&#233;e.';
	$lang['strviewdroppedbad'] = 'Echec de suppression de la vue.';
	$lang['strviewupdated'] = 'Vue mise &#224; jour.';
	$lang['strviewupdatedbad'] = 'Echec de mise &#224; jour de la vue.';
        $lang['strviewlink']  =  'Cl&#233;s Li&#233;es';
        $lang['strviewconditions']  =  'Conditions Additionnelles';
        $lang['strcreateviewwiz']  =  'Cr&#233;er une vue avec l\'assistant';

	// Sequences
	$lang['strsequence'] = 'S&#233;quence';
	$lang['strsequences'] = 'S&#233;quences';
	$lang['strshowallsequences'] = 'Voir toutes les s&#233;quences';
	$lang['strnosequence'] = 'Aucune s&#233;quence trouv&#233;e.';
	$lang['strnosequences'] = 'Aucune s&#233;quence trouv&#233;e.';
	$lang['strcreatesequence'] = 'Cr&#233;er une s&#233;quence';
	$lang['strlastvalue'] = 'Derni&#232;re valeur';
	$lang['strincrementby'] = 'Incr&#233;menter par ';	
	$lang['strstartvalue'] = 'Valeur de d&#233;part';
	$lang['strmaxvalue'] = 'Valeur maxilale';
	$lang['strminvalue'] = 'Valeur minimale';
	$lang['strcachevalue'] = 'Valeur de cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Est Cycl&#233;e?';
	$lang['striscalled'] = 'Est Appel&#233;e?';
	$lang['strsequenceneedsname'] = 'Vous devez sp&#233;cifier un nom pour votre s&#233;quence.';
	$lang['strsequencecreated'] = 'S&#233;quence cr&#233;e.';
	$lang['strsequencecreatedbad'] = 'Echec de cr&#233;ation de la s&#233;quence.'; 
	$lang['strconfdropsequence'] = 'Etes vous sur de vouloir supprimer la s&#233;quence &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'S&#233;quence supprim&#233;e.';
	$lang['strsequencedroppedbad'] = 'Echec de suppression de la s&#233;quence.';

	$lang['strsequencereset'] = 'Sequence initialis&#233;e.';
	$lang['strsequenceresetbad'] = 'Echec de l\'initialisation de la s&#233;quence.';
	// Indexes
	$lang['strindex']  =  'Index';
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Nom de l\'index';
	$lang['strshowallindexes'] = 'Voir tous les index';
	$lang['strnoindex'] = 'Aucun index trouv&#233;.';
	$lang['strnoindexes'] = 'Aucun index trouv&#233;.';
	$lang['strcreateindex'] = 'Cr&#233;er un index';
	$lang['strtabname'] = 'Nom de la table';
	$lang['strcolumnname'] = 'Nom de la colonne';
	$lang['strindexneedsname'] = 'Vous devez indiquer un nom pour votre index';
	$lang['strindexneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strindexcreated'] = 'Index cr&#233;&#233;';
	$lang['strindexcreatedbad'] = 'Echec de cr&#233;ation de l\'index.';
	$lang['strconfdropindex'] = 'Etes-vous s&#251;r de vouloir supprimer l\'index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index supprim&#233;.';
	$lang['strindexdroppedbad'] = 'Echec de suppression de l\'index.';
	$lang['strkeyname'] = 'Nom de la cl&#233;';
	$lang['struniquekey'] = 'Cl&#233; unique';
	$lang['strprimarykey'] = 'Cl&#233; primaire';
 	$lang['strindextype'] = 'Type d\'index';
	$lang['strtablecolumnlist'] = 'Liste des colonnes';
	$lang['strindexcolumnlist'] = 'Liste des colonnes dans l\'index';
        $lang['strconfcluster']  =  'Etes vous sur de vouloir mettre en cluster &quot;%s&quot;?';
        $lang['strclusteredgood']  =  'Cluster effectu&#233;.';
        $lang['strclusteredbad']  =  'Echec du Cluster.';

	// Rules
	$lang['strrules'] = 'R&#232;gles';
	$lang['strrule'] = 'R&#232;gle';
	$lang['strshowallrules'] = 'Voir toutes les r&#232;gles';
	$lang['strnorule'] = 'Aucune r&#232;gle trouv&#233;e.';
	$lang['strnorules'] = 'Aucune r&#232;gle trouv&#233;e.';
	$lang['strcreaterule'] = 'Cr&#233;er une r&#232;gle';
	$lang['strrulename'] = 'Nom de la r&#232;gle';
	$lang['strruleneedsname'] = 'Vous devez indiquer un nom pour votre r&#232;gle.';
	$lang['strrulecreated'] = 'R&#232;gle cr&#233;e.';
	$lang['strrulecreatedbad'] = 'Echec de cr&#233;ation de la r&#232;gle.';
	$lang['strconfdroprule'] = 'Etes-vous s&#251;r de vouloir supprimer la r&#232;gle &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strruledropped'] = 'R&#232;gle supprim&#233;e.';
	$lang['strruledroppedbad'] = 'Echec de suppression de r&#232;gle.';

	// Constraints
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les contraintes';
	$lang['strnoconstraints'] = 'Aucune contrainte trouv&#233;e.';
	$lang['strcreateconstraint'] = 'Cr&#233;er une contrainte';
	$lang['strconstraintcreated'] = 'Cr&#233;ation d\'une contrainte.';
	$lang['strconstraintcreatedbad'] = 'Echec de cr&#233;ation de la contrainte.';
	$lang['strconfdropconstraint'] = 'Etes vous s&#251;r de vouloir supprimer la contrainte &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Contrainte supprim&#233;e.';
	$lang['strconstraintdroppedbad'] = 'Echec de suppression de la contrainte.';
	$lang['straddcheck'] = 'Ajouter une Contrainte';
	$lang['strcheckneedsdefinition'] = 'La Contrainte a besoin d\'une d&#233;finition.';
	$lang['strcheckadded'] = 'Contrainte ajout&#233;e.';
        $lang['strcheckaddedbad']  =  'Echec pour l\'ajout d\une contrainte check.';
	$lang['straddpk'] = 'Ajouter une cl&#233; primaire';
	$lang['strpkneedscols'] = 'La cl&#233; primaire n&#233;cessite au moins une colonne.';
	$lang['strpkadded'] = 'Primary key added.';
	$lang['strpkaddedbad'] = 'Echec lors de l\'ajout de la cl&#233; primaire.';
	$lang['stradduniq'] = 'Ajouter une cl&#233; Unique';
	$lang['struniqneedscols'] = 'Une Cl&#233; Unique n&#233;cessite au moins une colonne.';
	$lang['struniqadded'] = 'La Cl&#233; unique a &#233;t&#233; rajout&#233;e.';
	$lang['struniqaddedbad'] = 'Echec lors de la cr&#233;ation de la cl&#233; Unique.';
	$lang['straddfk'] = 'Ajouter une cl&#233; Etrang&#232;re';
	$lang['strfkneedscols'] = 'Une Cl&#233; Etrang&#232;re n&#233;cessite au moins une colonne.';
	$lang['strfkneedstarget'] = 'Une cl&#233; Etrang&#232;re n&#233;cessite une table Cible.';
	$lang['strfkadded'] = 'La Cl&#233; Etrang&#232;re a &#233;t&#233; rajout&#233;e.';
	$lang['strfkaddedbad'] = 'Echec lors de la cr&#233;ation de la cl&#233; Etrang&#232;re.';
	$lang['strfktarget'] = 'Table Cible';
	$lang['strfkcolumnlist'] = 'Liste des Colonnes de la cl&#233;';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les fonctions';
	$lang['strnofunction'] = 'Aucune fonction trouv&#233;e.';
	$lang['strnofunctions'] = 'Aucune Fonction trouv&#233;e.';
	$lang['strcreateplfunction']  =  'Cr&#233;er une fonction PL/SQL';
        $lang['strcreateinternalfunction']  =  'Cr&#233;er une fonction interne';
        $lang['strcreatecfunction']  =  'Cr&#233;er une fonction C';
	$lang['strfunctionname'] = 'Nom de la fonction';
	$lang['strreturns'] = 'Valeur de sortie';
	$lang['strarguments'] = 'Arguments';
	$lang['strproglanguage'] = 'Langage';
	$lang['strfunctionneedsname'] = 'Vous devez indiquer un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez indiquer une d&#233;finition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction cr&#233;&#233;e.';
	$lang['strfunctioncreatedbad'] = 'Echec de cr&#233;ation de la fonction.';
	$lang['strconfdropfunction'] = 'Etes-vous s&#251;r de vouloir supprimer la fonction &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Fonction supprim&#233;e.';
	$lang['strfunctiondroppedbad'] = 'Echech de suppression de la fonction.';
	$lang['strfunctionupdated'] = 'Fonction mise &#224; jour.';
	$lang['strfunctionupdatedbad'] = 'Echec de mise &#224; jour de la fonction.';
        $lang['strobjectfile']  =  'Fichier Objet';
        $lang['strlinksymbol']  =  'Symbole Lien';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Voir tous les triggers';
	$lang['strnotrigger'] = 'Aucun trigger trouv&#233;.';
	$lang['strnotriggers'] = 'Aucun trigger trouv&#233;.';
	$lang['strcreatetrigger'] = 'Cr&#233;er un trigger';
	$lang['strtriggerneedsname'] = 'Vous devez indiquer un nom pour votre trigger.';
	$lang['strtriggerneedsfunc'] = 'Vous devez indiquer une fonction pour votre trigger.';
	$lang['strtriggercreated'] = 'Trigger cr&#233;&#233;.';
	$lang['strtriggercreatedbad'] = 'Echec de cr&#233;ation du trigger.';
	$lang['strconfdroptrigger'] = 'Etes-vous s&#251;r de vouloir supprimer le trigger &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger supprim&#233;.';
        $lang['strtriggerdroppedbad']  =  'Echec lors de la suppression du trigger.';
	$lang['strtriggeraltered'] = 'Trigger modifi&#233;.';
	$lang['strtriggeralteredbad'] = 'Echec lors de la modification du Trigger.';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Aucun type trouv&#233;.';
	$lang['strnotypes'] = 'Aucun type trouv&#233;.';
	$lang['strcreatetype'] = 'Cr&#233;er un type';
        $lang['strcreatecomptype']  =  'Cr&#233;er un type compos&#233;';
        $lang['strtypeneedsfield']  =  'Vous devez sp&#233;cifier au moins un champ.';
        $lang['strtypeneedscols']  =  'Vous devez sp&#233;cifier un nombre valide de champs.';	
	$lang['strtypename'] = 'Nom du type';
	$lang['strinputfn'] = 'Fonction d\'entr&#233;e';
	$lang['stroutputfn'] = 'Fonction de sortie';
	$lang['strpassbyval'] = 'Pass&#233;e par valeur?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = 'El&#233;ment';
	$lang['strdelimiter'] = 'D&#233;limiteur';
	$lang['strstorage'] = 'Stockage';
        $lang['strfield']  =  'Champ';
        $lang['strnumfields']  =  'Nbre. de Champs';
	$lang['strtypeneedsname'] = 'Vous devez indiquer un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez indiquer une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type cr&#233;&#233;';
	$lang['strtypecreatedbad'] = 'Echec de cr&#233;ation du type.';
	$lang['strconfdroptype'] = 'Etes-vous s&#251;r de vouloir supprim&#233; le type &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Type supprim&#233;.';
	$lang['strtypedroppedbad'] = 'Echec de suppression du type.';
        $lang['strflavor']  =  'Flavor';
	$lang['strbasetype']  =  'Base';
	$lang['strcompositetype']  =  'Composite';
	$lang['strpseudotype']  =  'Pseudo';

	// Schemas
	$lang['strschema'] = 'Sch&#233;ma';
	$lang['strschemas'] = 'Sch&#233;mas';
	$lang['strshowallschemas'] = 'Voir Tous les sch&#233;mas';
	$lang['strnoschema'] = 'Aucun sch&#233;ma trouv&#233;.';
	$lang['strnoschemas'] = 'Aucun sch&#233;ma trouv&#233;.';
	$lang['strcreateschema'] = 'Cr&#233;er un sch&#233;ma';
	$lang['strschemaname'] = 'Nom du sch&#233;ma';
	$lang['strschemaneedsname'] = 'Vous devez indiquer un nom pour votre sch&#233;ma.';
	$lang['strschemacreated'] = 'Sch&#233;ma cr&#233;&#233;';
	$lang['strschemacreatedbad'] = 'Echec de cr&#233;ation du sch&#233;ma.';
	$lang['strconfdropschema'] = 'Etes-vous s&#251;r de vouloir supprimer le sch&#233;ma &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Sch&#233;ma supprim&#233;.';
	$lang['strschemadroppedbad'] = 'Echec de suppression du sch&#233;ma.';
        $lang['strschemaaltered']  =  'Schema altered.';
        $lang['strschemaalteredbad']  =  'Schema alter failed.';
        $lang['strsearchpath']  =  'Chemin de Recherche du Schema';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Aucun rapport trouv&#233;.';
	$lang['strcreatereport'] = 'Cr&#233;er un rapport';
	$lang['strreportdropped'] = 'Rapport supprim&#233;.';
	$lang['strreportdroppedbad'] = 'Echec de suppression du rapport.';
	$lang['strconfdropreport'] = 'Etes-vous sur de vouloir supprimer le rapport &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Vous devez indiquer un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requ&#234;te SQL pour votre rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegard&#233;.';
	$lang['strreportcreatedbad'] = 'Echec de sauvegarde du rapport.';

        // Domains
	$lang['strdomain'] = 'Domaine';
	$lang['strdomains'] = 'Domaines';
	$lang['strshowalldomains'] = 'Voir tous les domaines';
	$lang['strnodomains'] = 'Pas de domaine trouv&#233;.';
	$lang['strcreatedomain'] = 'Cr&#233;er un domaine';
	$lang['strdomaindropped'] = 'Domaine supprim&#233;.';
	$lang['strdomaindroppedbad'] = 'Echec de la suppression.';
	$lang['strconfdropdomain'] = 'Etes vous sur de vouloir supprimer le domaine &quot;%s&quot;?';
	$lang['strdomainneedsname'] = 'Vous devez donner un nom pour votre domaine.';
	$lang['strdomaincreated'] = 'Domaine cr&#233;&#233;.';
	$lang['strdomaincreatedbad'] = 'Echec &#224; la cr&#233;ation du domaine.';	
	$lang['strdomainaltered'] = 'Domaine modifi&#233;.';
	$lang['strdomainalteredbad'] = 'Echec &#224; la modification du domaine.';	

	// Operators
	$lang['stroperator'] = 'Operateur';
	$lang['stroperators'] = 'Operateurs';
	$lang['strshowalloperators'] = 'Voir tous les op&#233;rateurs';
	$lang['strnooperator'] = 'Pas d\'op&#233;rateur trouv&#233;.';
	$lang['strnooperators'] = 'Pas d\'op&#233;rateur trouv&#233;.';
	$lang['strcreateoperator'] = 'Cr&#233;er un op&#233;rateur';
	$lang['strleftarg'] = 'Type de l\'argument de gauche';
	$lang['strrightarg'] = 'Type de l\'argument de droite';
	$lang['strcommutator'] = 'Commutateur';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Left sort';
	$lang['strrightsort'] = 'Right sort';
	$lang['strlessthan'] = 'Plus petit que';
	$lang['strgreaterthan'] = 'Plus grand que';
        $lang['stroperatorneedsname']  =  'Vous devez donner un nom pour votre op&#233;rateur.';
        $lang['stroperatorcreated']  =  'Operateur cr&#233;&#233;';
        $lang['stroperatorcreatedbad']  =  'Echec lors de la cr&#233;ation de l\'op&#233;rateur.';
        $lang['strconfdropoperator']  =  'Etes vous sur de vouloir supprimer l\'op&#233;rateur &quot;%s&quot;?';
        $lang['stroperatordropped']  =  'Op&#233;rateur supprim&#233;.';
        $lang['stroperatordroppedbad']  =  'Echec lors de la suppression de l\'op&#233;rateur.';

	// Casts
	$lang['strcasts'] = 'Casts';
	$lang['strnocasts'] = 'No casts found.';
	$lang['strsourcetype'] = 'Source type';
	$lang['strtargettype'] = 'Target type';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'In assignment';
	$lang['strbinarycompat'] = '(Binary compatible)';
	
	// Conversions
	$lang['strconversions'] = 'Conversions';
	$lang['strnoconversions'] = 'Pas de Conversion trouv&#233;.';
	$lang['strsourceencoding'] = 'Source encoding';
	$lang['strtargetencoding'] = 'Target encoding';
	
	// Languages
	$lang['strlanguages'] = 'Langages';
	$lang['strnolanguages'] = 'Pas de langage trouv&#233;.';
	$lang['strtrusted'] = 'Trusted';
	
	// Info
	$lang['strnoinfo'] = 'Pas d\'information disponible.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Tables Parents';
	$lang['strchildtables'] = 'Tables Enfants';
	
	// Aggregates
	$lang['straggregates']  =  'Aggregats';
	$lang['strnoaggregates']  =  'Pas d\'aggregat trouv&#233;.';
        $lang['stralltypes']  =  '(Tous les types)';

	// Operator Classes
        $lang['stropclasses']  =  'Classes d\'op&#233;rateur';
     	$lang['strnoopclasses']  =  'Aucune classe d\'op&#233;rateur trouv&#233;e.';
	$lang['straccessmethod']  =  'M&#233;thode d\'acc&#232;s';

	// Stats and performance
	$lang['strrowperf']  =  'Performance de l\'Enregistrement';
	$lang['strioperf']  =  'Performance Entr&#233;e/Sortie';
	$lang['stridxrowperf']  =  'Performance Index';
	$lang['stridxioperf']  =  'Performance Index Entr&#233;es/Sortie';
	$lang['strpercent']  =  '%';
	$lang['strsequential']  =  'Sequentiel';
	$lang['strscan']  =  'Scan';
	$lang['strread']  =  'Lire';
	$lang['strfetch']  =  'Fetch';
	$lang['strheap']  =  'Heap';
        $lang['strtoast']  =  'TOAST';
	$lang['strtoastindex']  =  'TOAST Index';
	$lang['strcache']  =  'Cache';
	$lang['strdisk']  =  'Disque';
	$lang['strrows2']  =  'Enregistrements';

	// Tablespaces
	$lang['strtablespace']  =  'Tablespace';
	$lang['strtablespaces']  =  'Tablespaces';
	$lang['strshowalltablespaces']  =  'Voir tous les tablespaces';
	$lang['strnotablespaces']  =  'Pas de tablespaces trouv&#233;.';
	$lang['strcreatetablespace']  =  'Cr&#233;er un tablespace';
	$lang['strlocation']  =  'Location';
	$lang['strtablespaceneedsname']  =  'Vous devez donner un nom &#224; votre tablespace.';
	$lang['strtablespaceneedsloc']  =  'Vous devez pr&#233;ciser un r&#233;pertoire dans lequel sera cr&#233;&#233; le tablespace.';
	$lang['strtablespacecreated']  =  'Tablespace cr&#233;&#233;.';
	$lang['strtablespacecreatedbad']  =  'Echec &#224; la cr&#233;ation du Tablespace.';
	$lang['strconfdroptablespace']  =  'Etes vous sur de vouloir supprimer le tablespace &quot;%s&quot;?';
	$lang['strtablespacedropped']  =  'Tablespace supprim&#233;.';
	$lang['strtablespacedroppedbad']  =  'Echec &#224; la suppression du tablespace.';
	$lang['strtablespacealtered']  =  'Tablespace modifi&#233;.';
	$lang['strtablespacealteredbad']  =  'Echec &#224; la modification du Tablespace.';

	// Miscellaneous
	$lang['strtopbar']  =  '%s lanc&#233; sur %s:%s -- Vous &#234;tes connect&#233; avec le profil  &quot;%s&quot;, %s';
	$lang['strtimefmt']  =  'jS M, Y g:iA';
	$lang['strhelp']  =  'Aide';
$lang['strhelpicon']  =  '?';

?>
