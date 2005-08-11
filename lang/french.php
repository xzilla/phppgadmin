<?php

	/**
	 * French Language file for phpPgAdmin. 
	 * @maintainer Pascal PEYRE [pascal.peyre@cir.fr]
	 *
	 * $Id: french.php,v 1.16 2005/08/11 23:01:44 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Français';
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
        $lang['strlogindisallowed']  =  'Login désactivé pour sécurité';
	$lang['strserver'] = 'Serveur';
	$lang['strlogout'] = 'Déconnexion';
	$lang['strowner'] = 'Propriétaire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'Définition';
	$lang['strproperties'] = 'Propriétés';
	$lang['strbrowse'] = 'Parcourir';
	$lang['strdrop'] = 'Supprimer';
	$lang['strdropped'] = 'Supprimé';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Précédent';
	$lang['strnext'] = 'Suivant';
        $lang['strfirst'] = '<< Début';
	$lang['strlast'] = 'Fin >>';
        $lang['strfailed']  =  'Echec';
	$lang['strcreate'] = 'Créer';
	$lang['strcreated'] = 'Créé';
	$lang['strcomment'] = 'Commentaire';
	$lang['strlength'] = 'Longueur';
	$lang['strdefault'] = 'Defaut';
	$lang['stralter'] = 'Modifier';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Annuler';
	$lang['strsave'] = 'Sauvegarder';
	$lang['strreset'] = 'Réinitialiser';
	$lang['strinsert'] = 'Insérer';
	$lang['strselect'] = 'Selectionner';
	$lang['strdelete'] = 'Effacer';
	$lang['strupdate'] = 'Modifier';
	$lang['strreferences'] = 'Références';
	$lang['stryes'] = 'Oui';
	$lang['strno'] = 'Non';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
        $lang['stredit']  =  'Editer';
        $lang['strcolumn']  =  'Colonne';
	$lang['strcolumns'] = 'Colonnes';
	$lang['strrows'] = 'ligne(s)';
	$lang['strrowsaff'] = 'ligne(s) affectée(s).';
        $lang['strobjects']  =  'objet(s)';
        $lang['strexample']  =  'exple.';
	$lang['strback'] = 'Retour';
	$lang['strqueryresults'] = 'Résultats de la requête';
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
	$lang['strevent'] = 'Evènement';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Donnée';
	$lang['strconfirm'] = 'Confirmer';
	$lang['strexpression'] = 'Expression';
	$lang['strellipsis'] = '...';
        $lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Etendre';
	$lang['strcollapse'] = 'Réduire';
	$lang['strexplain'] = 'Explain';
        $lang['strexplainanalyze']  =  'Explain Analyze';
	$lang['strfind'] = 'Rechercher';
	$lang['stroptions'] = 'Options';
	$lang['strrefresh'] = 'Raffraichir';
	$lang['strdownload'] = 'Télécharger';
        $lang['strdownloadgzipped']  =  'Télécharger avec compression gzip';
        $lang['strinfo']  =  'Info';
        $lang['stroids']  =  'OIDs';
        $lang['stradvanced']  =  'Avancé';
        $lang['strvariables']  =  'Variables';
        $lang['strprocess']  =  'Processus';
        $lang['strprocesses']  =  'Processus';
        $lang['strsetting']  =  'Paramétrage';
        $lang['streditsql']  =  'Editer SQL';
        $lang['strruntime']  =  'Temps d\'execution Total: %s ms';
        $lang['strpaginate']  =  'Paginer les résultats';
        $lang['struploadscript']  =  'ou importer un script SQL :';
        $lang['strstarttime']  =  'Heure de Départ';
        $lang['strfile']  =  'Fichier';
        $lang['strfileimported']  =  'Fichier importé.';

	// Error handling
	$lang['strbadconfig'] = 'Le fichier de configuration config.inc.php est obsolète. Vous avez besoin de le regénerer à partir de config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n\'avez pas compilé correctement le support de la base de données dans votre installation de PHP.';
        $lang['strphpversionnotsupported']  =  'Cette version de PHP n\'est pas supportée. Merci de mettre à jour PHP à la  version  %s ou ultérieure.';
        $lang['strpostgresqlversionnotsupported']  =  'Cette Version de PostgreSQL n\'est pas supportée. Merci de mettre à jour PHP à la version %s ou ultérieure.';
	$lang['strbadschema'] = 'Schéma spécifié invalide.';
	$lang['strbadencoding'] = 'Impossible de spécifier l\'encodage de la base de données.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'Paramètres de script invalides.';
	$lang['strnodata'] = 'Pas de Résultats.';
        $lang['strnoobjects']  =  'Aucun objet trouvé.';
	$lang['strrownotunique'] = 'Pas d\identifiant unique pour cette ligne.';
        $lang['strnoreportsdb']  =  'Vous n\'avez pas créer des rapports de la base de Données. Lisez le fichier INSTALL pour voir les directives.';
        $lang['strnouploads']  =  'Importation de fichiers désactivé.';
        $lang['strimporterror']  =  'Erreur d\'importation.';
        $lang['strimporterrorline']  =  'Erreur d\'importation à la ligne %s.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les tables';
	$lang['strnotables'] = 'Aucune table trouvée.';
	$lang['strnotable'] = 'Aucune table trouvée.';
	$lang['strcreatetable'] = 'Créer une table';
	$lang['strtablename'] = 'Nom de la table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtableneedsfield'] = 'Vous devez spécifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table crée.';
	$lang['strtablecreatedbad'] = 'Echec de la création de table.';
	$lang['strconfdroptable'] = 'Etes-vous sur de vouloir supprimer la table "%s"?';
	$lang['strtabledropped'] = 'Table supprimée.';
	$lang['strtabledroppedbad'] = 'Echec de la suppresion de table.';
	$lang['strconfemptytable'] = 'Etes-vous sûr de vouloir vider la table "%s"?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = 'Echec du vidage de la table.';
	$lang['strinsertrow'] = 'Inserer enregistrement.';
	$lang['strrowinserted'] = 'Enregistrement inséré.';
	$lang['strrowinsertedbad'] = 'Echec d\'insertion d\'un enregistrement.';
	$lang['streditrow'] = 'Editer enregistrement.';
	$lang['strrowupdated'] = 'Enregistrement mis à jour.';
	$lang['strrowupdatedbad'] = 'Echec de mise à jour de l\'enregistrement.';
	$lang['strdeleterow'] = 'Effacer enregistrement';
	$lang['strconfdeleterow'] = 'Etes-vous sûr de vouloir supprimer cet enregistrement ?';
	$lang['strrowdeleted'] = 'Enregistrement Supprimé.';
	$lang['strrowdeletedbad'] = 'Echec de suppression de l\'enregistrement.';
        $lang['strinsertandrepeat']  =  'Inserer & Repeter';
        $lang['strnumcols']  =  'Nombre de colonnes';
        $lang['strcolneedsname']  =  'Vous devez spécifier un nom pour la colonne';
	$lang['strselectallfields'] = 'Sélectionner tous les champs';
        $lang['strselectneedscol']  =  'Vous devez sélectionner au moins une colonne.';
        $lang['strselectunary']  =  'Opérateurs unaires ne peuvent avoir de valeurs.';
	$lang['straltercolumn'] = 'Modifier colonne';
	$lang['strcolumnaltered'] = 'Colonne modifiée.';
	$lang['strcolumnalteredbad'] = 'Echec de modification de la colonne.';
        $lang['strconfdropcolumn'] = 'Etes-vous sûr de vouloir supprimer la colonne "%s" de la table "%s"?';
	$lang['strcolumndropped'] = 'Colonne supprimée.';
	$lang['strcolumndroppedbad'] = 'Echec de suppression de la colonne.';
	$lang['straddcolumn'] = 'Ajouter une colonne';
	$lang['strcolumnadded'] = 'Colonne ajoutée.';
	$lang['strcolumnaddedbad'] = 'Echec d\'ajout de colonne.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Table modifiée.';
	$lang['strtablealteredbad'] = 'Echec à la modification de la table.';
        $lang['strdataonly']  =  'Données seulement';
        $lang['strstructureonly']  =  'Structure seulement';
        $lang['strstructureanddata']  =  'Structure et données';
        $lang['strtabbed']  =  'Tabulé';
        $lang['strauto']  =  'Auto';
        $lang['strconfvacuumtable']  =  'Etes-vous sur de vouloir faire un  vacuum "%s"?';
        $lang['strestimatedrowcount']  =  'Nombre d\'enregistrements estimés';

	// Users
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de passe';
	$lang['strsuper'] = 'Super Utilisateur ?';
	$lang['strcreatedb'] = 'Créer base de données?';
	$lang['strexpires'] = 'Expiration';
        $lang['strsessiondefaults']  =  'Session par défaut';
	$lang['strnousers'] = 'Aucun utilisateur trouvé.';
	$lang['struserupdated'] = 'Utilisateur mis à jour.';
	$lang['struserupdatedbad'] = 'Echec de mise à jour de l\'utilisateur.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Créer un utilisateur';
        $lang['struserneedsname']  =  'Vous devez donner un nom pour votre utilisateur.';
	$lang['strusercreated'] = 'Utilisateur Créé.';
	$lang['strusercreatedbad'] = 'Echec de création de l\'utilisateur.';
	$lang['strconfdropuser'] = 'Etes-vous sûr de vouloir supprimer l\'utilisateur "%s"?';
	$lang['struserdropped'] = 'Utilisateur supprimé.';
	$lang['struserdroppedbad'] = 'Echec de suppression de l\'utilisateur.';
	$lang['straccount'] = 'Comptes';
        $lang['strchangepassword'] = 'Modifier le mot de passe';
	$lang['strpasswordchanged'] = 'Mot de passe modifié.';
	$lang['strpasswordchangedbad'] = 'Echec à la modification du mot de passe.';
	$lang['strpasswordshort'] = 'Le mot de passe est trop court.';
	$lang['strpasswordconfirm'] = 'Le mot de passe de confirmation est différent.';
	
	// Groups
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strnogroup'] = 'Groupe non trouvé.';
	$lang['strnogroups'] = 'Aucun groupe trouvé.';
	$lang['strcreategroup'] = 'Créer un groupe';
	$lang['strshowallgroups'] = 'Voir tous les groupes';
	$lang['strgroupneedsname'] = 'Vous devez indiquer un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe créé.';
	$lang['strgroupcreatedbad'] = 'Echec de création du groupe.';	
	$lang['strconfdropgroup'] = 'Etes vous sûr de vouloir supprimer le groupe "%s"?';
	$lang['strgroupdropped'] = 'Groupe supprimé.';
	$lang['strgroupdroppedbad'] = 'Echec de suppression du groupe.';
	$lang['strmembers'] = 'Membres';
	$lang['straddmember'] = 'Ajouter un membre';
	$lang['strmemberadded'] = 'Membre ajouté.';
	$lang['strmemberaddedbad'] = 'Echec pendant l\'ajout de membre.';
	$lang['strdropmember'] = 'Supprimer un membre';
	$lang['strconfdropmember'] = 'Etes-vous sur de vouloir supprimer le membre "%s" pour le groupe "%s"?';
	$lang['strmemberdropped'] = 'Membre supprimé.';
	$lang['strmemberdroppedbad'] = 'Echec à la suppression de membre.';
	// Privilges
	$lang['strprivilege'] = 'Privilège';
	$lang['strprivileges'] = 'Privilèges';
	$lang['strnoprivileges'] = 'Cet objet n\'a pas de privilèges.';
	$lang['strgrant'] = 'Accorder(Grant)';
	$lang['strrevoke'] = 'Révoquer';
	$lang['strgranted'] = 'Privilèges accordés.';
	$lang['strgrantfailed'] = 'Echec de l\'octroi de privilèges.';

	$lang['strgrantbad'] = 'Vous devez spécifier au moins un utilisateur ou groupe et au moins un privilège.';
	$lang['strgrantor'] = 'Grantor';
	$lang['strasterisk'] = '*';
	// Databases
	$lang['strdatabase'] = 'Base de Données';
	$lang['strdatabases'] = 'Bases de Données';
	$lang['strshowalldatabases'] = 'Voir toutes les bases de données';
	$lang['strnodatabase'] = 'Aucune base de données trouvée.';
	$lang['strnodatabases'] = 'Aucune base de données trouvée.';
	$lang['strcreatedatabase'] = 'Créer une base de données';
	$lang['strdatabasename'] = 'Nom de la base de données';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre base de données.';
	$lang['strdatabasecreated'] = 'Base de Données créée.';
	$lang['strdatabasecreatedbad'] = 'Echec de création de la base de données.';	
	$lang['strconfdropdatabase'] = 'Etes-vous sûr de vouloir supprimer la base de données "%s"?';
	$lang['strdatabasedropped'] = 'Base de données supprimée.';
	$lang['strdatabasedroppedbad'] = 'Echec de suppression de la base de données.';
	$lang['strentersql'] = 'Veuillez saisir ci-dessous la requête SQL à exécuter :';
	$lang['strsqlexecuted'] = 'Reguete SQL exécutée.';
        $lang['strvacuumgood']  =  'Vacuum exécuté.';
	$lang['strvacuumbad'] = 'Echec du Vacuum.';
	$lang['stranalyzegood'] = 'Analyse effectuée.';
	$lang['stranalyzebad'] = 'Echec de l\'analyse.';
        $lang['strreindexgood']  =  'Réindexation exécutée.';
        $lang['strreindexbad']  =  'Echec de la Réindexation.';
        $lang['strfull']  =  'Intégral(Full)';
        $lang['strfreeze']  =  'Freeze';
        $lang['strforce']  =  'Forcer';
        $lang['strsignalsent']  =  'Signal envoyé.';
        $lang['strsignalsentbad']  =  'Echec à l\'Envoi du signal.';
        $lang['strallobjects']  =  'Tous les objets';

	// Views
	$lang['strview'] = 'Vue';
	$lang['strviews'] = 'Vues';
	$lang['strshowallviews'] = 'Voir toutes les vues';
	$lang['strnoview'] = 'Aucne vue trouvée.';
	$lang['strnoviews'] = 'Aucune vue trouvée.';
	$lang['strcreateview'] = 'Créer une vue';
	$lang['strviewname'] = 'Nom de la vue';
	$lang['strviewneedsname'] = 'Vous devez indiquer un nom pour votre vue.';
	$lang['strviewneedsdef'] = 'Vous devez indiquer une définition pour votre vue.';
        $lang['strviewneedsfields']  =  'Vous devez préciser les colonnes que vous voulez sélectionner dans votre vue.';
	$lang['strviewcreated'] = 'Vue créée.';
	$lang['strviewcreatedbad'] = 'Echec de création de la vue.';
	$lang['strconfdropview'] = 'Ete-vous sûr de vouloir supprimer la vue "%s"?';
	$lang['strviewdropped'] = 'Vue supprimée.';
	$lang['strviewdroppedbad'] = 'Echec de suppression de la vue.';
	$lang['strviewupdated'] = 'Vue mise à jour.';
	$lang['strviewupdatedbad'] = 'Echec de mise à jour de la vue.';
        $lang['strviewlink']  =  'Clés Liées';
        $lang['strviewconditions']  =  'Conditions Additionnelles';
        $lang['strcreateviewwiz']  =  'Créer une vue avec l\'assistant';

	// Sequences
	$lang['strsequence'] = 'Séquence';
	$lang['strsequences'] = 'Séquences';
	$lang['strshowallsequences'] = 'Voir toutes les séquences';
	$lang['strnosequence'] = 'Aucune séquence trouvée.';
	$lang['strnosequences'] = 'Aucune séquence trouvée.';
	$lang['strcreatesequence'] = 'Créer une séquence';
	$lang['strlastvalue'] = 'Dernière valeur';
	$lang['strincrementby'] = 'Incrémenter par ';	
	$lang['strstartvalue'] = 'Valeur de départ';
	$lang['strmaxvalue'] = 'Valeur maxilale';
	$lang['strminvalue'] = 'Valeur minimale';
	$lang['strcachevalue'] = 'Valeur de cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Est Cyclée?';
	$lang['striscalled'] = 'Est Appelée?';
	$lang['strsequenceneedsname'] = 'Vous devez spécifier un nom pour votre séquence.';
	$lang['strsequencecreated'] = 'Séquence crée.';
	$lang['strsequencecreatedbad'] = 'Echec de création de la séquence.'; 
	$lang['strconfdropsequence'] = 'Etes vous sur de vouloir supprimer la séquence "%s"?';
	$lang['strsequencedropped'] = 'Séquence supprimée.';
	$lang['strsequencedroppedbad'] = 'Echec de suppression de la séquence.';

	$lang['strsequencereset'] = 'Sequence initialisée.';
	$lang['strsequenceresetbad'] = 'Echec de l\'initialisation de la séquence.';
	// Indexes
	$lang['strindex']  =  'Index';
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Nom de l\'index';
	$lang['strshowallindexes'] = 'Voir tous les index';
	$lang['strnoindex'] = 'Aucun index trouvé.';
	$lang['strnoindexes'] = 'Aucun index trouvé.';
	$lang['strcreateindex'] = 'Créer un index';
	$lang['strtabname'] = 'Nom de la table';
	$lang['strcolumnname'] = 'Nom de la colonne';
	$lang['strindexneedsname'] = 'Vous devez indiquer un nom pour votre index';
	$lang['strindexneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strindexcreated'] = 'Index créé';
	$lang['strindexcreatedbad'] = 'Echec de création de l\'index.';
	$lang['strconfdropindex'] = 'Etes-vous sûr de vouloir supprimer l\'index "%s"?';
	$lang['strindexdropped'] = 'Index supprimé.';
	$lang['strindexdroppedbad'] = 'Echec de suppression de l\'index.';
	$lang['strkeyname'] = 'Nom de la clé';
	$lang['struniquekey'] = 'Clé unique';
	$lang['strprimarykey'] = 'Clé primaire';
 	$lang['strindextype'] = 'Type d\'index';
	$lang['strtablecolumnlist'] = 'Liste des colonnes';
	$lang['strindexcolumnlist'] = 'Liste des colonnes dans l\'index';
        $lang['strconfcluster']  =  'Etes vous sur de vouloir mettre en cluster "%s"?';
        $lang['strclusteredgood']  =  'Cluster effectué.';
        $lang['strclusteredbad']  =  'Echec du Cluster.';

	// Rules
	$lang['strrules'] = 'Règles';
	$lang['strrule'] = 'Règle';
	$lang['strshowallrules'] = 'Voir toutes les règles';
	$lang['strnorule'] = 'Aucune règle trouvée.';
	$lang['strnorules'] = 'Aucune règle trouvée.';
	$lang['strcreaterule'] = 'Créer une règle';
	$lang['strrulename'] = 'Nom de la règle';
	$lang['strruleneedsname'] = 'Vous devez indiquer un nom pour votre règle.';
	$lang['strrulecreated'] = 'Règle crée.';
	$lang['strrulecreatedbad'] = 'Echec de création de la règle.';
	$lang['strconfdroprule'] = 'Etes-vous sûr de vouloir supprimer la règle "%s" sur "%s"?';
	$lang['strruledropped'] = 'Règle supprimée.';
	$lang['strruledroppedbad'] = 'Echec de suppression de règle.';

	// Constraints
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les contraintes';
	$lang['strnoconstraints'] = 'Aucune contrainte trouvée.';
	$lang['strcreateconstraint'] = 'Créer une contrainte';
	$lang['strconstraintcreated'] = 'Création d\'une contrainte.';
	$lang['strconstraintcreatedbad'] = 'Echec de création de la contrainte.';
	$lang['strconfdropconstraint'] = 'Etes vous sûr de vouloir supprimer la contrainte "%s" sur "%s"?';
	$lang['strconstraintdropped'] = 'Contrainte supprimée.';
	$lang['strconstraintdroppedbad'] = 'Echec de suppression de la contrainte.';
	$lang['straddcheck'] = 'Ajouter une Contrainte';
	$lang['strcheckneedsdefinition'] = 'La Contrainte a besoin d\'une définition.';
	$lang['strcheckadded'] = 'Contrainte ajoutée.';
        $lang['strcheckaddedbad']  =  'Echec pour l\'ajout d\une contrainte check.';
	$lang['straddpk'] = 'Ajouter une clé primaire';
	$lang['strpkneedscols'] = 'La clé primaire nécessite au moins une colonne.';
	$lang['strpkadded'] = 'Primary key added.';
	$lang['strpkaddedbad'] = 'Echec lors de l\'ajout de la clé primaire.';
	$lang['stradduniq'] = 'Ajouter une clé Unique';
	$lang['struniqneedscols'] = 'Une Clé Unique nécessite au moins une colonne.';
	$lang['struniqadded'] = 'La Clé unique a été rajoutée.';
	$lang['struniqaddedbad'] = 'Echec lors de la création de la clé Unique.';
	$lang['straddfk'] = 'Ajouter une clé Etrangère';
	$lang['strfkneedscols'] = 'Une Clé Etrangère nécessite au moins une colonne.';
	$lang['strfkneedstarget'] = 'Une clé Etrangère nécessite une table Cible.';
	$lang['strfkadded'] = 'La Clé Etrangère a été rajoutée.';
	$lang['strfkaddedbad'] = 'Echec lors de la création de la clé Etrangère.';
	$lang['strfktarget'] = 'Table Cible';
	$lang['strfkcolumnlist'] = 'Liste des Colonnes de la clé';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les fonctions';
	$lang['strnofunction'] = 'Aucune fonction trouvée.';
	$lang['strnofunctions'] = 'Aucune Fonction trouvée.';
	$lang['strcreateplfunction']  =  'Créer une fonction PL/SQL';
        $lang['strcreateinternalfunction']  =  'Créer une fonction interne';
        $lang['strcreatecfunction']  =  'Créer une fonction C';
	$lang['strfunctionname'] = 'Nom de la fonction';
	$lang['strreturns'] = 'Valeur de sortie';
	$lang['strarguments'] = 'Arguments';
	$lang['strproglanguage'] = 'Langage';
	$lang['strfunctionneedsname'] = 'Vous devez indiquer un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez indiquer une définition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction créée.';
	$lang['strfunctioncreatedbad'] = 'Echec de création de la fonction.';
	$lang['strconfdropfunction'] = 'Etes-vous sûr de vouloir supprimer la fonction "%s"?';
	$lang['strfunctiondropped'] = 'Fonction supprimée.';
	$lang['strfunctiondroppedbad'] = 'Echech de suppression de la fonction.';
	$lang['strfunctionupdated'] = 'Fonction mise à jour.';
	$lang['strfunctionupdatedbad'] = 'Echec de mise à jour de la fonction.';
        $lang['strobjectfile']  =  'Fichier Objet';
        $lang['strlinksymbol']  =  'Symbole Lien';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Voir tous les triggers';
	$lang['strnotrigger'] = 'Aucun trigger trouvé.';
	$lang['strnotriggers'] = 'Aucun trigger trouvé.';
	$lang['strcreatetrigger'] = 'Créer un trigger';
	$lang['strtriggerneedsname'] = 'Vous devez indiquer un nom pour votre trigger.';
	$lang['strtriggerneedsfunc'] = 'Vous devez indiquer une fonction pour votre trigger.';
	$lang['strtriggercreated'] = 'Trigger créé.';
	$lang['strtriggercreatedbad'] = 'Echec de création du trigger.';
	$lang['strconfdroptrigger'] = 'Etes-vous sûr de vouloir supprimer le trigger "%s" sur "%s"?';
	$lang['strtriggerdropped'] = 'Trigger supprimé.';
        $lang['strtriggerdroppedbad']  =  'Echec lors de la suppression du trigger.';
	$lang['strtriggeraltered'] = 'Trigger modifié.';
	$lang['strtriggeralteredbad'] = 'Echec lors de la modification du Trigger.';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Aucun type trouvé.';
	$lang['strnotypes'] = 'Aucun type trouvé.';
	$lang['strcreatetype'] = 'Créer un type';
        $lang['strcreatecomptype']  =  'Créer un type composé';
        $lang['strtypeneedsfield']  =  'Vous devez spécifier au moins un champ.';
        $lang['strtypeneedscols']  =  'Vous devez spécifier un nombre valide de champs.';	
	$lang['strtypename'] = 'Nom du type';
	$lang['strinputfn'] = 'Fonction d\'entrée';
	$lang['stroutputfn'] = 'Fonction de sortie';
	$lang['strpassbyval'] = 'Passée par valeur?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = 'Elément';
	$lang['strdelimiter'] = 'Délimiteur';
	$lang['strstorage'] = 'Stockage';
        $lang['strfield']  =  'Champ';
        $lang['strnumfields']  =  'Nbre. de Champs';
	$lang['strtypeneedsname'] = 'Vous devez indiquer un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez indiquer une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type créé';
	$lang['strtypecreatedbad'] = 'Echec de création du type.';
	$lang['strconfdroptype'] = 'Etes-vous sûr de vouloir supprimé le type "%s"?';
	$lang['strtypedropped'] = 'Type supprimé.';
	$lang['strtypedroppedbad'] = 'Echec de suppression du type.';
        $lang['strflavor']  =  'Flavor';
	$lang['strbasetype']  =  'Base';
	$lang['strcompositetype']  =  'Composite';
	$lang['strpseudotype']  =  'Pseudo';

	// Schemas
	$lang['strschema'] = 'Schéma';
	$lang['strschemas'] = 'Schémas';
	$lang['strshowallschemas'] = 'Voir Tous les schémas';
	$lang['strnoschema'] = 'Aucun schéma trouvé.';
	$lang['strnoschemas'] = 'Aucun schéma trouvé.';
	$lang['strcreateschema'] = 'Créer un schéma';
	$lang['strschemaname'] = 'Nom du schéma';
	$lang['strschemaneedsname'] = 'Vous devez indiquer un nom pour votre schéma.';
	$lang['strschemacreated'] = 'Schéma créé';
	$lang['strschemacreatedbad'] = 'Echec de création du schéma.';
	$lang['strconfdropschema'] = 'Etes-vous sûr de vouloir supprimer le schéma "%s"?';
	$lang['strschemadropped'] = 'Schéma supprimé.';
	$lang['strschemadroppedbad'] = 'Echec de suppression du schéma.';
        $lang['strschemaaltered']  =  'Schema altered.';
        $lang['strschemaalteredbad']  =  'Schema alter failed.';
        $lang['strsearchpath']  =  'Chemin de Recherche du Schema';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Aucun rapport trouvé.';
	$lang['strcreatereport'] = 'Créer un rapport';
	$lang['strreportdropped'] = 'Rapport supprimé.';
	$lang['strreportdroppedbad'] = 'Echec de suppression du rapport.';
	$lang['strconfdropreport'] = 'Etes-vous sur de vouloir supprimer le rapport "%s"?';
	$lang['strreportneedsname'] = 'Vous devez indiquer un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requête SQL pour votre rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegardé.';
	$lang['strreportcreatedbad'] = 'Echec de sauvegarde du rapport.';

        // Domains
	$lang['strdomain'] = 'Domaine';
	$lang['strdomains'] = 'Domaines';
	$lang['strshowalldomains'] = 'Voir tous les domaines';
	$lang['strnodomains'] = 'Pas de domaine trouvé.';
	$lang['strcreatedomain'] = 'Créer un domaine';
	$lang['strdomaindropped'] = 'Domaine supprimé.';
	$lang['strdomaindroppedbad'] = 'Echec de la suppression.';
	$lang['strconfdropdomain'] = 'Etes vous sur de vouloir supprimer le domaine "%s"?';
	$lang['strdomainneedsname'] = 'Vous devez donner un nom pour votre domaine.';
	$lang['strdomaincreated'] = 'Domaine créé.';
	$lang['strdomaincreatedbad'] = 'Echec à la création du domaine.';	
	$lang['strdomainaltered'] = 'Domaine modifié.';
	$lang['strdomainalteredbad'] = 'Echec à la modification du domaine.';	

	// Operators
	$lang['stroperator'] = 'Operateur';
	$lang['stroperators'] = 'Operateurs';
	$lang['strshowalloperators'] = 'Voir tous les opérateurs';
	$lang['strnooperator'] = 'Pas d\'opérateur trouvé.';
	$lang['strnooperators'] = 'Pas d\'opérateur trouvé.';
	$lang['strcreateoperator'] = 'Créer un opérateur';
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
        $lang['stroperatorneedsname']  =  'Vous devez donner un nom pour votre opérateur.';
        $lang['stroperatorcreated']  =  'Operateur créé';
        $lang['stroperatorcreatedbad']  =  'Echec lors de la création de l\'opérateur.';
        $lang['strconfdropoperator']  =  'Etes vous sur de vouloir supprimer l\'opérateur "%s"?';
        $lang['stroperatordropped']  =  'Opérateur supprimé.';
        $lang['stroperatordroppedbad']  =  'Echec lors de la suppression de l\'opérateur.';

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
	$lang['strnoconversions'] = 'Pas de Conversion trouvé.';
	$lang['strsourceencoding'] = 'Source encoding';
	$lang['strtargetencoding'] = 'Target encoding';
	
	// Languages
	$lang['strlanguages'] = 'Langages';
	$lang['strnolanguages'] = 'Pas de langage trouvé.';
	$lang['strtrusted'] = 'Trusted';
	
	// Info
	$lang['strnoinfo'] = 'Pas d\'information disponible.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Tables Parents';
	$lang['strchildtables'] = 'Tables Enfants';
	
	// Aggregates
	$lang['straggregates']  =  'Aggregats';
	$lang['strnoaggregates']  =  'Pas d\'aggregat trouvé.';
        $lang['stralltypes']  =  '(Tous les types)';

	// Operator Classes
        $lang['stropclasses']  =  'Classes d\'opérateur';
     	$lang['strnoopclasses']  =  'Aucune classe d\'opérateur trouvée.';
	$lang['straccessmethod']  =  'Méthode d\'accès';

	// Stats and performance
	$lang['strrowperf']  =  'Performance de l\'Enregistrement';
	$lang['strioperf']  =  'Performance Entrée/Sortie';
	$lang['stridxrowperf']  =  'Performance Index';
	$lang['stridxioperf']  =  'Performance Index Entrées/Sortie';
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
	$lang['strnotablespaces']  =  'Pas de tablespaces trouvé.';
	$lang['strcreatetablespace']  =  'Créer un tablespace';
	$lang['strlocation']  =  'Location';
	$lang['strtablespaceneedsname']  =  'Vous devez donner un nom à votre tablespace.';
	$lang['strtablespaceneedsloc']  =  'Vous devez préciser un répertoire dans lequel sera créé le tablespace.';
	$lang['strtablespacecreated']  =  'Tablespace créé.';
	$lang['strtablespacecreatedbad']  =  'Echec à la création du Tablespace.';
	$lang['strconfdroptablespace']  =  'Etes vous sur de vouloir supprimer le tablespace "%s"?';
	$lang['strtablespacedropped']  =  'Tablespace supprimé.';
	$lang['strtablespacedroppedbad']  =  'Echec à la suppression du tablespace.';
	$lang['strtablespacealtered']  =  'Tablespace modifié.';
	$lang['strtablespacealteredbad']  =  'Echec à la modification du Tablespace.';

	// Miscellaneous
	$lang['strtopbar']  =  '%s lancé sur %s:%s -- Vous êtes connecté avec le profil  "%s", %s';
	$lang['strtimefmt']  =  'jS M, Y g:iA';
	$lang['strhelp']  =  'Aide';
$lang['strhelpicon']  =  '?';

?>
