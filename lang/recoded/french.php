<?php

	/**
	 * French Language file for phpPgAdmin. 
	 * @maintainer Pascal PEYRE [pascal.peyre@cir.fr]
	 *
	 * $Id: french.php,v 1.4 2003/04/09 08:32:04 jmpoure Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Fran&ccedil;ais';
	$lang['appcharset'] = 'ISO-8859-1';

	// Basic strings
	$lang['strintro'] = 'Bienvenue sur phpPgAdmin.';
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Echec de la connexion';
	$lang['strserver'] = 'Serveur';
	$lang['strlogout'] = 'D&eacute;connexion';
	$lang['strowner'] = 'Propri&eacute;taire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'D&eacute;finition';
	$lang['stroperators'] = 'Op&eacute;rateurs';
	$lang['straggregates'] = 'Aggr&eacute;gats';
	$lang['strproperties'] = 'Propri&eacute;t&eacute;es';
	$lang['strbrowse'] = 'Parcourir';
	$lang['strdrop'] = 'Supprimer';
	$lang['strdropped'] = 'Supprim&eacute;';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Pr&eacute;c&eacute;dent';
	$lang['strnext'] = 'Suivant';
	$lang['strfailed'] = 'Echec';
	$lang['strcreate'] = 'Cr&eacute;er';
	$lang['strcreated'] = 'Cr&eacute;&eacute;';
	$lang['strcomment'] = 'Commentaire';
	$lang['strlength'] = 'Longueur';
	$lang['strdefault'] = 'Defaut';
	$lang['stralter'] = 'Modifier';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Annuler';
	$lang['strsave'] = 'Sauvegarder';
	$lang['strreset'] = 'R&eacute;initialiser';
	$lang['strinsert'] = 'Ins&eacute;rer';
	$lang['strselect'] = 'Selectionner';
	$lang['strdelete'] = 'Effacer';
	$lang['strupdate'] = 'Modifier';
	$lang['strreferences'] = 'R&eacute;f&eacute;rences';
	$lang['stryes'] = 'Oui';
	$lang['strno'] = 'Non';
	$lang['stredit'] = 'Editer';
	$lang['strcolumns'] = 'Colones';
	$lang['strrows'] = 'ligne(s)';
	$lang['strexample'] = 'Exple.';
	$lang['strback'] = 'Retour';
	$lang['strqueryresults'] = 'R&eacute;sultats de la requ&ecirc;te';
	$lang['strshow'] = 'Voir';
	$lang['strempty'] = 'Vider';
	$lang['strlanguage'] = 'Langage';
	$lang['strencoding'] = 'Codage';
	$lang['strvalue'] = 'Valeur';
	$lang['strunique'] = 'Unique';
	$lang['strprimary'] = 'Primaire';
	$lang['strexport'] = 'Exporter';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Lancer';
	$lang['stradd'] = 'Ajouter';
	$lang['strevent'] = 'Event';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = 'Format';
  
	// Error handling
	$lang['strnoframes'] = 'Vous avez besoin d\'activer les frames de votre navigateur pour utiliser cette application.';
	$lang['strbadconfig'] = 'Le fichier de configuration config.inc.php est obsol&egrave;te. Vous avez besoin de le reg&eacute;nerer &agrave; partir de config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n\'avez pas compil&eacute; correctement le support de la base de donn&eacute;es dans votre installation de PHP.';
	$lang['strbadschema'] = 'Sch&eacute;ma sp&eacute;cifi&eacute; invalide.';
	$lang['strbadencoding'] = 'Impossible de sp&eacute;cifier l\'encodage de la base de donn&eacute;es.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'Param&egrave;tres de script invalides.';
	$lang['strnodata'] = 'Pas de R&eacute;sultats.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les tables';
	$lang['strnotables'] = 'Aucune table trouv&eacute;e.';
	$lang['strnotable'] = 'Aucune table trouv&eacute;e.';
	$lang['strcreatetable'] = 'Cr&eacute;er table';
	$lang['strtablename'] = 'Nom de la table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtableneedsfield'] = 'Vous devez sp&eacute;cifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table cr&eacute;e.';
	$lang['strtablecreatedbad'] = 'Echec de la cr&eacute;ation de table.';
	$lang['strconfdroptable'] = 'Etes-vous sur de vouloir supprimer la table &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Table supprim&eacute;e.';
	$lang['strtabledroppedbad'] = 'Echec de la suppresion de table.';
	$lang['strconfemptytable'] = 'Etes-vous s&ucirc;r de vouloir vider la table &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = 'Echec du vidage de la table.';
	$lang['strinsertrow'] = 'Inserer enregistrement.';
	$lang['strrowinserted'] = 'Enregistrement ins&eacute;r&eacute;.';
	$lang['strrowinsertedbad'] = 'Echec d\'insertion d\'un enregistrement.';
	$lang['streditrow'] = 'Editer enregistrement.';
	$lang['strrowupdated'] = 'Enregistrement mis &agrave; jour.';
	$lang['strrowupdatedbad'] = 'Echec de mise &agrave; jour de l\'enregistrement.';
	$lang['strdeleterow'] = 'Effacer enregistrement';
	$lang['strconfdeleterow'] = 'Etes-vous s&ucirc;r de vouloir supprimer cet enregistrement ?';
	$lang['strrowdeleted'] = 'Enregistrement Supprim&eacute;.';
	$lang['strrowdeletedbad'] = 'Echec de suppression de l\'enregistrement.';
	$lang['strsaveandrepeat'] = 'Sauvegarder &amp; R&eacute;p&eacute;ter';
	$lang['strfield'] = 'Champ';
	$lang['strfields'] = 'Champs';
	$lang['strnumfields'] = 'Nombre de Champs';
	$lang['strfieldneedsname'] = 'Vous devez choisir un nom pour le champ.';
	$lang['strselectneedscol'] = 'Vous devez montrer au moins une colonne';
	$lang['straltercolumn'] = 'Modifier colonne';
	$lang['strcolumnaltered'] = 'Colonne modifi&eacute;e.';
	$lang['strcolumnalteredbad'] = 'Echec de modification de la colonne.';
        $lang['strconfdropcolumn'] = 'Etes-vous s&ucirc;r de vouloir supprimer la colonne &quot;%s&quot; de la table &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Colonne supprim&eacute;e.';
	$lang['strcolumndroppedbad'] = 'Echec de suppression de la colonne.';
	$lang['straddcolumn'] = 'Ajouter une colonne';
	$lang['strcolumnadded'] = 'Colonne ajout&eacute;e.';
	$lang['strcolumnaddedbad'] = 'Echec d\'ajout de colonne.';
	$lang['strschemaanddata'] = 'Schema &amp; Donn&eacute;es';
	$lang['strschemaonly'] = 'Schema seul';
	$lang['strdataonly'] = 'Donn&eacute;es seules';

	// Users
	$lang['struseradmin'] = 'Administration Utilisateurs';
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de passe';
	$lang['strsuper'] = 'Super Utilisateur ?';
	$lang['strcreatedb'] = 'Cr&eacute;er base de donn&eacute;es?';
	$lang['strexpires'] = 'Expiration';
	$lang['strnousers'] = 'Aucun utilisateur trouv&eacute;.';
  $lang['struserupdated'] = 'Utilisateur mis &agrave; jour.';
	$lang['struserupdatedbad'] = 'Echec de mise &agrave; jour de l\'utilisateur.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Cr&eacute;er un utilisateur';
	$lang['strusercreated'] = 'Utilisateur Cr&eacute;&eacute;.';
	$lang['strusercreatedbad'] = 'Echec de cr&eacute;ation de l\'utilisateur.';
	$lang['strconfdropuser'] = 'Etes-Vous s&ucirc;r de vouloir supprimer l\utilisateur \&quot;%s\&quot;?';
	$lang['struserdropped'] = 'Utilisateur supprim&eacute;.';
	$lang['struserdroppedbad'] = 'Echec de suppression de l\'utilisateur.';
		
	// Groups
	$lang['strgroupadmin'] = 'Administration des Groupes';
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strnogroup'] = 'Groupe non trouv&eacute;.';
	$lang['strnogroups'] = 'Aucun groupe trouv&eacute;.';
	$lang['strcreategroup'] = 'Cr&eacute;er un groupe';
	$lang['strshowallgroups'] = 'Voir tous les groupes';
	$lang['strgroupneedsname'] = 'Vous devez indiquer un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe cr&eacute;&eacute;.';
	$lang['strgroupcreatedbad'] = 'Echec de cr&eacute;ation du groupe.';	
	$lang['strconfdropgroup'] = 'Etes vous s&ucirc;r de vouloir supprimer le groupe &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Groupe supprim&eacute;.';
	$lang['strgroupdroppedbad'] = 'Echec de suppression du groupe.';
	$lang['strmembers'] = 'Membres';

	// Privilges
	$lang['strprivilege'] = 'Privil&egrave;ge';
	$lang['strprivileges'] = 'Privil&egrave;ges';
	$lang['strnoprivileges'] = 'Cet object n\'a pas de privil&egrave;ges.';
	$lang['strgrant'] = 'Accorder(Grant)';
	$lang['strrevoke'] = 'R&eacute;voquer';
	$lang['strgranted'] = 'Privil&egrave;ges accord&eacute;s.';
	$lang['strgrantfailed'] = 'Echec de l\'octroi de privil&egrave;ges.';
	$lang['strgrantuser'] = 'Octroyer &agrave; l\'utilisateur (Grant user)';
	$lang['strgrantgroup'] = 'Octroyer au groupe (grant group)';

	// Databases
	$lang['strdatabase'] = 'Base de Donn&eacute;es';
	$lang['strdatabases'] = 'Bases de Donn&eacute;es';
	$lang['strshowalldatabases'] = 'Voir toutes les bases de donn&eacute;es';
	$lang['strnodatabase'] = 'Aucune base de donn&eacute;es trouv&eacute;e.';
	$lang['strnodatabases'] = 'Aucune base de donn&eacute;es trouv&eacute;e.';
	$lang['strcreatedatabase'] = 'Cr&eacute;er une base de donn&eacute;es';
	$lang['strdatabasename'] = 'Nom de la base de donn&eacute;es';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre base de donn&eacute;es.';
	$lang['strdatabasecreated'] = 'Base de Donn&eacute;es cr&eacute;&eacute;e.';
	$lang['strdatabasecreatedbad'] = 'Echec de cr&eacute;ation de la base de donn&eacute;es.';	
	$lang['strconfdropdatabase'] = 'Etes-vous s&ucirc;r de vouloir supprimer la base de donn&eacute;es &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de donn&eacute;es supprim&eacute;e.';
	$lang['strdatabasedroppedbad'] = 'Echec de suppression de la base de donn&eacute;es.';
	$lang['strentersql'] = 'Veuillez saisir ci-dessous la requ&ecirc;te SQL &agrave; ex&eacute;cuter :';
	$lang['strvacuumgood'] = 'Vacuum effectu&eacute;.';
	$lang['strvacuumbad'] = 'Echec du Vacuum.';
	$lang['stranalyzegood'] = 'Analyse effectu&eacute;e.';
	$lang['stranalyzebad'] = 'Echec de l\'analyse.';

	// Views
	$lang['strview'] = 'Vue';
	$lang['strviews'] = 'Vues';
	$lang['strshowallviews'] = 'Voir toutes les vues';
	$lang['strnoview'] = 'Aucne vue trouv&eacute;e.';
	$lang['strnoviews'] = 'Aucune vue trouv&eacute;e.';
	$lang['strcreateview'] = 'Cr&eacute;er une vue';
	$lang['strviewname'] = 'Nom de la vue';
	$lang['strviewneedsname'] = 'Vous devez indiquer un nom pour votre vue.';
	$lang['strviewneedsdef'] = 'Vous devez indiquer une d&eacute;finition pour votre vue.';
	$lang['strviewcreated'] = 'Vue cr&eacute;&eacute;e.';
	$lang['strviewcreatedbad'] = 'Echec de cr&eacute;ation de la vue.';
	$lang['strconfdropview'] = 'Ete-vous s&ucirc;r de vouloir supprimer la vue &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vue supprim&eacute;e.';
	$lang['strviewdroppedbad'] = 'Echec de suppression de la vue.';
	$lang['strviewupdated'] = 'Vue mise &agrave; jour.';
	$lang['strviewupdatedbad'] = 'Echec de mise &agrave; jour de la vue.';

	// Sequences
	$lang['strsequence'] = 'S&eacute;quence';
	$lang['strsequences'] = 'S&eacute;quences';
	$lang['strshowallsequences'] = 'Voir toutes les s&eacute;quences';
	$lang['strnosequence'] = 'Aucune s&eacute;quence trouv&eacute;e.';
	$lang['strnosequences'] = 'Aucune s&eacute;quence trouv&eacute;e.';
	$lang['strcreatesequence'] = 'Cr&eacute;er une s&eacute;quence';
	$lang['strlastvalue'] = 'Derni&egrave;re valeur';
	$lang['strincrementby'] = 'Incr&eacute;menter par ';	
	$lang['strstartvalue'] = 'Valeur de d&eacute;part';
	$lang['strmaxvalue'] = 'Valeur maxilale';
	$lang['strminvalue'] = 'Valeur minimale';
	$lang['strcachevalue'] = 'Valeur de cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Est Cycl&eacute;e?';
	$lang['striscalled'] = 'Est Appel&eacute;e?';
	$lang['strsequenceneedsname'] = 'Vous devez sp&eacute;cifier un nom pour votre s&eacute;quence.';
	$lang['strsequencecreated'] = 'S&eacute;quence cr&eacute;e.';
	$lang['strsequencecreatedbad'] = 'Echec de cr&eacute;ation de la s&eacute;quence.'; 
	$lang['strconfdropsequence'] = 'Etes vous sur de vouloir supprimer la s&eacute;quence &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'S&eacute;quence supprim&eacute;e.';
	$lang['strsequencedroppedbad'] = 'Echec de suppression de la s&eacute;quence.';

	// Indexes
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Nom de l\'index';
	$lang['strshowallindexes'] = 'Voir tous les index';
	$lang['strnoindex'] = 'Aucun index trouv&eacute;.';
	$lang['strnoindexes'] = 'Aucun index trouv&eacute;.';
	$lang['strcreateindex'] = 'Cr&eacute;er un index';
	$lang['strindexname'] = 'Nom de l\'index';
	$lang['strtabname'] = 'Nom de la table';
	$lang['strcolumnname'] = 'Nom de la colonne';
	$lang['strindexneedsname'] = 'Vous devez indiquer un nom pour votre index';
	$lang['strindexneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strindexcreated'] = 'Index cr&eacute;&eacute;';
	$lang['strindexcreatedbad'] = 'Echec de cr&eacute;ation de l\'index.';
	$lang['strconfdropindex'] = 'Etes-vous s&ucirc;r de vouloir supprimer l\'index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index supprim&eacute;.';
	$lang['strindexdroppedbad'] = 'Echec de suppression de l\'index.';
	$lang['strkeyname'] = 'Nom de la cl&eacute;';
	$lang['struniquekey'] = 'Cl&eacute; unique';
	$lang['strprimarykey'] = 'Cl&eacute; primaire';
 	$lang['strindextype'] = 'Type d\'index';
	$lang['strindexname'] = 'Nom de l\'index';
	$lang['strtablecolumnlist'] = 'Liste des colonnes';
	$lang['strindexcolumnlist'] = 'Liste des colonnes dans l\'index';

	// Rules
	$lang['strrules'] = 'R&egrave;gles';
	$lang['strrule'] = 'R&egrave;gle';
	$lang['strshowallrules'] = 'Voir toutes les r&egrave;gles';
	$lang['strnorule'] = 'Aucune r&egrave;gle trouv&eacute;e.';
	$lang['strnorules'] = 'Aucune r&egrave;gle trouv&eacute;e.';
	$lang['strcreaterule'] = 'Cr&eacute;er une r&egrave;gle';
	$lang['strrulename'] = 'Nom de la r&egrave;gle';
	$lang['strruleneedsname'] = 'Vous devez indiquer un nom pour votre r&egrave;gle.';
	$lang['strrulecreated'] = 'R&egrave;gle cr&eacute;e.';
	$lang['strrulecreatedbad'] = 'Echec de cr&eacute;ation de la r&egrave;gle.';
	$lang['strconfdroprule'] = 'Etes-vous s&ucirc;r de vouloir supprimer la r&egrave;gle &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strruledropped'] = 'R&egrave;gle supprim&eacute;e.';
	$lang['strruledroppedbad'] = 'Echec de suppression de r&egrave;gle.';

	// Constraints
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les contraintes';
	$lang['strnoconstraints'] = 'Aucune contrainte trouv&eacute;e.';
	$lang['strcreateconstraint'] = 'Cr&eacute;er une contrainte';
	$lang['strconstraintcreated'] = 'Cr&eacute;ation d\'une contrainte.';
	$lang['strconstraintcreatedbad'] = 'Echec de cr&eacute;ation de la contrainte.';
	$lang['strconfdropconstraint'] = 'Etes vous s&ucirc;r de vouloir supprimer la contrainte &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Contrainte supprim&eacute;e.';
	$lang['strconstraintdroppedbad'] = 'Echec de suppression de la contrainte.';
	$lang['straddcheck'] = 'Ajouter une Contrainte';
	$lang['strcheckneedsdefinition'] = 'La Contrainte a besoin d\'une d&eacute;finition.';
	$lang['strcheckadded'] = 'Contrainte ajout&eacute;e.';
	$lang['strcheckaddedbad'] = 'Echec de la cr&eacute;ation de la contrainte.';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les fonctions';
	$lang['strnofunction'] = 'Aucune fonction trouv&eacute;e.';
	$lang['strnofunctions'] = 'Aucune Fonction trouv&eacute;e.';
	$lang['strcreatefunction'] = 'Cr&eacute;er une fonction';
	$lang['strfunctionname'] = 'Nom de la fonction';
	$lang['strreturns'] = 'Valeur de sortie';
	$lang['strarguments'] = 'Arguments';
	$lang['strfunctionneedsname'] = 'Vous devez indiquer un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez indiquer une d&eacute;finition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction cr&eacute;&eacute;e.';
	$lang['strfunctioncreatedbad'] = 'Echec de cr&eacute;ation de la fonction.';
	$lang['strconfdropfunction'] = 'Etes-vous s&ucirc;r de vouloir supprimer la fonction &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Fonction supprim&eacute;e.';
	$lang['strfunctiondroppedbad'] = 'Echech de suppression de la fonction.';
	$lang['strfunctionupdated'] = 'Fonction mise &agrave; jour.';
	$lang['strfunctionupdatedbad'] = 'Echec de mise &agrave; jour de la fonction.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Voir tous les triggers';
	$lang['strnotrigger'] = 'Aucun trigger trouv&eacute;.';
	$lang['strnotriggers'] = 'Aucun trigger trouv&eacute;.';
	$lang['strcreatetrigger'] = 'Cr&eacute;er un trigger';
	$lang['strtriggerneedsname'] = 'Vous devez indiquer un nom pour votre trigger.';
	$lang['strtriggerneedsfunc'] = 'Vous devez indiquer une fonction pour votre trigger.';
	$lang['strtriggercreated'] = 'Trigger cr&eacute;&eacute;.';
	$lang['strtriggercreatedbad'] = 'Echec de cr&eacute;ation du trigger.';
	$lang['strconfdroptrigger'] = 'Etes-vous s&ucirc;r de vouloir supprimer le trigger &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger supprim&eacute;.';
	$lang['strtriggerdroppedbad'] = 'Echec de suppression du trigger.';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Aucun type trouv&eacute;.';
	$lang['strnotypes'] = 'Aucun type trouv&eacute;.';
	$lang['strcreatetype'] = 'Cr&eacute;er un type';
	$lang['strtypename'] = 'Nom du type';
	$lang['strinputfn'] = 'Fonction d\'entr&eacute;e';
	$lang['stroutputfn'] = 'Fonction de sortie';
	$lang['strpassbyval'] = 'Pass&eacute;e par valeur?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = 'El&eacute;ment';
	$lang['strdelimiter'] = 'D&eacute;limiteur';
	$lang['strstorage'] = 'Stockage';
	$lang['strtypeneedsname'] = 'Vous devez indiquer un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez indiquer une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type cr&eacute;&eacute;';
	$lang['strtypecreatedbad'] = 'Echec de cr&eacute;ation du type.';
	$lang['strconfdroptype'] = 'Etes-vous s&ucirc;r de vouloir supprim&eacute; le type &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Type supprim&eacute;.';
	$lang['strtypedroppedbad'] = 'Echec de suppression du type.';

	// Schemas
	$lang['strschema'] = 'Sch&eacute;ma';
	$lang['strschemas'] = 'Sch&eacute;mas';
	$lang['strshowallschemas'] = 'Voir Tous les sch&eacute;mas';
	$lang['strnoschema'] = 'Aucun sch&eacute;ma trouv&eacute;.';
	$lang['strnoschemas'] = 'Aucun sch&eacute;ma trouv&eacute;.';
	$lang['strcreateschema'] = 'Cr&eacute;er un sch&eacute;ma';
	$lang['strschemaname'] = 'Nom du sch&eacute;ma';
	$lang['strschemaneedsname'] = 'Vous devez indiquer un nom pour votre sch&eacute;ma.';
	$lang['strschemacreated'] = 'Sch&eacute;ma cr&eacute;&eacute;';
	$lang['strschemacreatedbad'] = 'Echec de cr&eacute;ation du sch&eacute;ma.';
	$lang['strconfdropschema'] = 'Etes-vous s&ucirc;r de vouloir supprimer le sch&eacute;ma &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Sch&eacute;ma supprim&eacute;.';
	$lang['strschemadroppedbad'] = 'Echec de suppression du sch&eacute;ma.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Aucun rapport trouv&eacute;.';
	$lang['strcreatereport'] = 'Cr&eacute;er un rapport';
	$lang['strreportdropped'] = 'Rapport supprim&eacute;.';
	$lang['strreportdroppedbad'] = 'Echec de suppression du rapport.';
	$lang['strconfdropreport'] = 'Etes-vous sur de vouloir supprimer le rapport &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Vous devez indiquer un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requ&ecirc;te SQL pour votre rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegard&eacute;.';
	$lang['strreportcreatedbad'] = 'Echec de sauvegarde du rapport.';

	// Miscellaneous
	$lang['strtopbar'] = '%s Lanc&eacute; sur %s:%s -- Vous &ecirc;tes connect&eacute; sous le nom &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
