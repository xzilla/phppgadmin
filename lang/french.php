<?php

	/**
	 * French Language file for phpPgAdmin. 
	 * @maintainer Pascal PEYRE [pascal.peyre@cir.fr]
	 *
	 * $Id: french.php,v 1.1 2003/03/27 10:56:27 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Français';
	$lang['appcharset'] = 'ISO-8859-1';

	// Basic strings
	$lang['strintro'] = 'Bienvenue sur phpPgAdmin.';
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Echec à la connexion';
	$lang['strserver'] = 'Serveur';
	$lang['strlogout'] = 'Déconnexion';
	$lang['strowner'] = 'Propriaitaire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'Definition';
	$lang['stroperators'] = 'Operateurs';
	$lang['straggregates'] = 'Aggregats';
	$lang['strproperties'] = 'Propriétées';
	$lang['strbrowse'] = 'Parcourir';
	$lang['strdrop'] = 'Supprimer';
	$lang['strdropped'] = 'Supprimé';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Not Null';
	$lang['strprev'] = 'Précédent';
	$lang['strnext'] = 'Suivant';
	$lang['strfailed'] = 'Echec';
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
	$lang['strinsert'] = 'Inserer';
	$lang['strselect'] = 'Select';
	$lang['strdelete'] = 'Effacer';
	$lang['strupdate'] = 'Modifier';
	$lang['strreferences'] = 'Références';
	$lang['stryes'] = 'Oui';
	$lang['strno'] = 'Non';
	$lang['stredit'] = 'Editer';
	$lang['strcolumns'] = 'Colones';
	$lang['strrows'] = 'ligne(s)';
	$lang['strexample'] = 'Exple.';
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
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strcluster'] = 'Cluster';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Lancer';
	$lang['stradd'] = 'Add';
	$lang['strevent'] = 'Event';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';

	// Error handling
	$lang['strnoframes'] = 'vous avez besoin d activer les frames sur votre navigateur pour utiliser cette application.';
	$lang['strbadconfig'] = 'Votre config.inc.php est obsolète. Vous avez besoin de le regénerer à partirde config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n avez pas compilé correctement le support de la base de données dans votre installation de PHP.';
	$lang['strbadschema'] = 'Schéma spécifié invalide.';
	$lang['strbadencoding'] = 'Failed to set client encoding in database.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'Paramètres de script invalides.';
	$lang['strnodata'] = 'Pas de Résultats.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les Tables';
	$lang['strnotables'] = 'Pas de Tables Trouvées.';
	$lang['strnotable'] = 'Pas de Table trouvée.';
	$lang['strcreatetable'] = 'Créer table';
	$lang['strtablename'] = 'Nom de la Table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtableneedsfield'] = 'Vous devez spécifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez donner un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table crée.';
	$lang['strtablecreatedbad'] = 'Création de Table Echouée.';
	$lang['strconfdroptable'] = 'Etes-vous sur de vouloir supprimer la table "%s"?';
	$lang['strtabledropped'] = 'Table supprimée.';
	$lang['strtabledroppedbad'] = 'Suppresion de Table Echouée.';
	$lang['strconfemptytable'] = 'Etes-vous sur de vouloir vider la table "%s"?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = 'Echec de vidage de la table.';
	$lang['strinsertrow'] = 'Inserer Ligne';
	$lang['strrowinserted'] = 'Ligne Insérée.';
	$lang['strrowinsertedbad'] = 'Echec d insertion de ligne.';
	$lang['streditrow'] = 'Editer Ligne';
	$lang['strrowupdated'] = 'Ligne Mise à Jour.';
	$lang['strrowupdatedbad'] = 'Mise à Jour de la ligne échouée.';
	$lang['strdeleterow'] = 'Effacer Ligne';
	$lang['strconfdeleterow'] = 'Etes-vous s^ur de vouloir supprimer cette ligne?';
	$lang['strrowdeleted'] = 'Ligne Supprimée.';
	$lang['strrowdeletedbad'] = 'Echec de la Suppression de la ligne.';
	$lang['strsaveandrepeat'] = 'Sauvegarder & Répéter';
	$lang['strfield'] = 'Champ';
	$lang['strfields'] = 'Champs';
	$lang['strnumfields'] = 'Nombre de Champs';
	$lang['strfieldneedsname'] = 'Vous devez nommer vos champs';
	$lang['strselectneedscol'] = 'Vous devez montrer au moins une colonne';
	$lang['straltercolumn'] = 'Modifier Colonne';
	$lang['strcolumnaltered'] = 'Colonne Modifiée.';
	$lang['strcolumnalteredbad'] = 'Echec de Modification de Colonne.';
        $lang['strconfdropcolumn'] = 'Etes-vous sur de vouloi supprimer la colonne "%s" de la table "%s"?';
	$lang['strcolumndropped'] = 'Colonne supprimée.';
	$lang['strcolumndroppedbad'] = 'Echec de suppression de Colonne.';
	$lang['straddcolumn'] = 'Ajouter Une Colonne';
	$lang['strcolumnadded'] = 'Colonne Ajoutée.';
	$lang['strcolumnaddedbad'] = 'Echec d Ajout de Colonne.';

	// Users
	$lang['struseradmin'] = 'Administration Utilisateurs';
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de Passe';
	$lang['strsuper'] = 'Super Utilisateur?';
	$lang['strcreatedb'] = 'Créer Base de Données?';
	$lang['strexpires'] = 'Expiration';
	$lang['strnousers'] = 'Pas d utilisateur trouvé.';
        $lang['struserupdated'] = 'Utilisateur mis à jour.';
	$lang['struserupdatedbad'] = 'Mise à jour de l utilisateur échouée.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Créer un Utilisateur';
	$lang['strusercreated'] = 'Utilisateur Créé.';
	$lang['strusercreatedbad'] = 'Création de l Utilisateur Echouée.';
	$lang['strconfdropuser'] = 'Etes-Vous sur de vouloir supprimer l Utilisateur "%s"?';
	$lang['struserdropped'] = 'Utilisateur Supprimé.';
	$lang['struserdroppedbad'] = 'Echec à la suppression de l Utilisateur.';
		
	// Groups
	$lang['strgroupadmin'] = 'Administration des Groupes';
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strnogroup'] = 'Groupe non trouvé.';
	$lang['strnogroups'] = 'Pas de Groupes trouvé.';
	$lang['strcreategroup'] = 'Créer un Groupe';
	$lang['strshowallgroups'] = 'Voir Tous les Groupes';
	$lang['strgroupneedsname'] = 'Vous devez donner un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe créé.';
	$lang['strgroupcreatedbad'] = 'Echec à la création du groupe.';	
	$lang['strconfdropgroup'] = 'Etes vous sur de vouloir supprimer le groupe "%s"?';
	$lang['strgroupdropped'] = 'Groupe supprimé.';
	$lang['strgroupdroppedbad'] = 'Suppression de groupe échouée.';
	$lang['strmembers'] = 'Membres';

	// Privilges
	$lang['strprivilege'] = 'Privilège';
	$lang['strprivileges'] = 'Privilèges';
	$lang['strnoprivileges'] = 'Cet object n a pas de privilèges.';
	$lang['strgrant'] = 'Accorder(Grant)';
	$lang['strrevoke'] = 'Revoquer';
	$lang['strgranted'] = 'Privilèges Accordé.';
	$lang['strgrantfailed'] = 'Echec dans l accord de privilèges.';
	$lang['strgrantuser'] = 'Accorder Utilisateur';
	$lang['strgrantgroup'] = 'Accorder Groupe';

	// Databases
	$lang['strdatabase'] = 'Base de Données';
	$lang['strdatabases'] = 'Bases de Données';
	$lang['strshowalldatabases'] = 'Voir Toutes les Bases de Données';
	$lang['strnodatabase'] = 'Pas de Base de Données trouvée.';
	$lang['strnodatabases'] = 'Pas de Bases de Données trouvées.';
	$lang['strcreatedatabase'] = 'Créer une Base de Données';
	$lang['strdatabasename'] = 'Nom de la Base de Données';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre Base de Données.';
	$lang['strdatabasecreated'] = 'Base de Données créée.';
	$lang['strdatabasecreatedbad'] = 'Création de la Base de Données Echouée.';	
	$lang['strconfdropdatabase'] = 'Etes-vous sur de vouloir supprimer la base de données "%s"?';
	$lang['strdatabasedropped'] = 'Base de Données supprimée.';
	$lang['strdatabasedroppedbad'] = 'Echec à la suppression de la Base de Données.';
	$lang['strentersql'] = 'Entrer la requête SQL à executer dessous:';
	$lang['strvacuumgood'] = 'Vacuum complet.';
	$lang['strvacuumbad'] = 'Vacuum Echoué.';
	$lang['stranalyzegood'] = 'Analyze complet.';
	$lang['stranalyzebad'] = 'Analyze Echoué.';

	// Views
	$lang['strview'] = 'Vue';
	$lang['strviews'] = 'Vues';
	$lang['strshowallviews'] = 'Voir toutes les Vues';
	$lang['strnoview'] = 'Pas de Vue trouvée.';
	$lang['strnoviews'] = 'Pas de Vues trouvées.';
	$lang['strcreateview'] = 'Créer une Vue';
	$lang['strviewname'] = 'Nom de la Vue';
	$lang['strviewneedsname'] = 'Vous devez donner un nom pour votre Vue.';
	$lang['strviewneedsdef'] = 'Vous devez donner une définition pour votre vue.';
	$lang['strviewcreated'] = 'Vue Créée.';
	$lang['strviewcreatedbad'] = 'Echec à la Création de la Vue.';
	$lang['strconfdropview'] = 'Ete-vous sur de vouloir supprimer la Vue "%s"?';
	$lang['strviewdropped'] = 'Vue Supprimée.';
	$lang['strviewdroppedbad'] = 'Echec à la Suppression de la Vue.';
	$lang['strviewupdated'] = 'Vue Mise à Jour.';
	$lang['strviewupdatedbad'] = 'Mise à Jour de la Vue Echouée.';

	// Sequences
	$lang['strsequence'] = 'Séquence';
	$lang['strsequences'] = 'Séquences';
	$lang['strshowallsequences'] = 'Voir toutes les séquences';
	$lang['strnosequence'] = 'Pas de séquence trouvée.';
	$lang['strnosequences'] = 'Pas de séquences trouvées.';
	$lang['strcreatesequence'] = 'Créer une séquence';
	$lang['strlastvalue'] = 'Dernière Valeur';
	$lang['strincrementby'] = 'Incrémenter par ';	
	$lang['strstartvalue'] = 'Valeur de Départ';
	$lang['strmaxvalue'] = 'Valeur Maxilale';
	$lang['strminvalue'] = 'Valeur Minimale';
	$lang['strcachevalue'] = 'Valeur de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Est Cyclée?';
	$lang['striscalled'] = 'Est Appelée?';
	$lang['strsequenceneedsname'] = 'Vous devez spécifier un nom pour votre séquence.';
	$lang['strsequencecreated'] = 'Séquence crée.';
	$lang['strsequencecreatedbad'] = 'Création de la Séquence Echouée.'; 
	$lang['strconfdropsequence'] = 'Etes vous sur de vouloir supprimer la séquence "%s"?';
	$lang['strsequencedropped'] = 'Séquence supprimée.';
	$lang['strsequencedroppedbad'] = 'Echec à la suppression de la séquence.';

	// Indexes
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Nom de l Index';
	$lang['strshowallindexes'] = 'Voir tous les Index';
	$lang['strnoindex'] = 'Pas d index trouvé.';
	$lang['strnoindexes'] = 'Pas d index trouvés.';
	$lang['strcreateindex'] = 'Créer un Index';
	$lang['strindexname'] = 'Nom de l Index';
	$lang['strtabname'] = 'Nom de la Table';
	$lang['strcolumnname'] = 'Nom de la Colonne';
	$lang['strindexneedsname'] = 'Vous devez donner un nom pour votre index';
	$lang['strindexneedscols'] = 'Vous devez donner un nombre valide de colonnes.';
	$lang['strindexcreated'] = 'Index créé';
	$lang['strindexcreatedbad'] = 'Création de l Index Echouée.';
	$lang['strconfdropindex'] = 'Etes-vous sur de vouloir supprimer l index "%s"?';
	$lang['strindexdropped'] = 'Index supprimé.';
	$lang['strindexdroppedbad'] = 'Suppression de l Index Echouée.';
	$lang['strkeyname'] = 'Nom de la Clé';
	$lang['struniquekey'] = 'Clé Unique';
	$lang['strprimarykey'] = 'Clé Primaire';
 	$lang['strindextype'] = 'Type d index';
	$lang['strindexname'] = 'Nom de l index';
	$lang['strtablecolumnlist'] = 'Liste des Colonnes';
	$lang['strindexcolumnlist'] = 'Liste des Colonnes dans l Index';

	// Rules
	$lang['strrules'] = 'Règles';
	$lang['strrule'] = 'Règle';
	$lang['strshowallrules'] = 'Voir Toutes les Règles';
	$lang['strnorule'] = 'Pas de Règle Trouvée.';
	$lang['strnorules'] = 'Pas de Règles Trouvées.';
	$lang['strcreaterule'] = 'Créer une Règle';
	$lang['strrulename'] = 'Nom de la Règle';
	$lang['strruleneedsname'] = 'Vous devez spécifier un nom pour votre règle.';
	$lang['strrulecreated'] = 'Règle crée.';
	$lang['strrulecreatedbad'] = 'Création de la règle Echouée.';
	$lang['strconfdroprule'] = 'Etes-vous sur de vouloir supprimer la règle "%s" sur "%s"?';
	$lang['strruledropped'] = 'Règle Supprimée.';
	$lang['strruledroppedbad'] = 'Suppression de Règle Echouée.';

	// Constraints
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les Contraintes';
	$lang['strnoconstraints'] = 'Pas de Contrainte trouvée.';
	$lang['strcreateconstraint'] = 'Créer une Contrainte';
	$lang['strconstraintcreated'] = 'Création d une contrainte.';
	$lang['strconstraintcreatedbad'] = 'Création de la Contrainte Echouée.';
	$lang['strconfdropconstraint'] = 'Etes vous sur de vouloi supprimer la Contrainte "%s" sur "%s"?';
	$lang['strconstraintdropped'] = 'Contrainte Supprimée.';
	$lang['strconstraintdroppedbad'] = 'Echec de la Contrainte supprimée.';
	$lang['straddcheck'] = 'Ajouter une Contrainte';
	$lang['strcheckneedsdefinition'] = 'La Contrainte a besoin d une définition.';
	$lang['strcheckadded'] = 'Contrainte Ajoutée.';
	$lang['strcheckaddedbad'] = 'Echec à la création de la Contrainte.';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les Fonctions';
	$lang['strnofunction'] = 'Pas de Fonction trouvée.';
	$lang['strnofunctions'] = 'Pas de Fonctions trouvées.';
	$lang['strcreatefunction'] = 'Créer une fonction';
	$lang['strfunctionname'] = 'Nom de la Fonction';
	$lang['strreturns'] = 'Valeur de Sortie';
	$lang['strarguments'] = 'Arguments';
	$lang['strfunctionneedsname'] = 'Vous devez donner un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez donner une définition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction créée.';
	$lang['strfunctioncreatedbad'] = 'Création de la Fonction échouée.';
	$lang['strconfdropfunction'] = 'Etes-vous sur de vouloi supprimer la fonction "%s"?';
	$lang['strfunctiondropped'] = 'Fonction supprimée.';
	$lang['strfunctiondroppedbad'] = 'Suppression de la Fonction supprimée.';
	$lang['strfunctionupdated'] = 'Fonction Mise à Jour.';
	$lang['strfunctionupdatedbad'] = 'Echec à la Mise à Jour de la Fonction.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Voir tous les triggers';
	$lang['strnotrigger'] = 'Pas de Trigger trouvé.';
	$lang['strnotriggers'] = 'Pas de Triggers trouvés.';
	$lang['strcreatetrigger'] = 'Créer un Trigger';
	$lang['strtriggerneedsname'] = 'Vous devez spécifier un nom pour votre Trigger.';
	$lang['strtriggerneedsfunc'] = 'Vous devez spécifier une fonction pour votre trigger.';
	$lang['strtriggercreated'] = 'Trigger créé.';
	$lang['strtriggercreatedbad'] = 'Création de Trigger Echouée.';
	$lang['strconfdroptrigger'] = 'Etes-vous sur de vouloir supprimer le trigger "%s" sur "%s"?';
	$lang['strtriggerdropped'] = 'Trigger supprimé.';
	$lang['strtriggerdroppedbad'] = 'Suppression du Trigger Echouée.';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Pas de Type trouvé.';
	$lang['strnotypes'] = 'Pas de Types trouvés.';
	$lang['strcreatetype'] = 'Créer un Type';
	$lang['strtypename'] = 'Nom du Type';
	$lang['strinputfn'] = 'Fonction d Entrée';
	$lang['stroutputfn'] = 'Fonction de Sortie';
	$lang['strpassbyval'] = 'Passée par valeur?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = 'Elément';
	$lang['strdelimiter'] = 'Delimiteur';
	$lang['strstorage'] = 'Stockage';
	$lang['strtypeneedsname'] = 'Vous devez donner un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez donner une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type créé';
	$lang['strtypecreatedbad'] = 'Echec à la création du Type.';
	$lang['strconfdroptype'] = 'Etes-vous de vouloir supprimé le type "%s"?';
	$lang['strtypedropped'] = 'Type supprimé.';
	$lang['strtypedroppedbad'] = 'Echec à la suppression du Type.';

	// Schemas
	$lang['strschema'] = 'Schéma';
	$lang['strschemas'] = 'Schémas';
	$lang['strshowallschemas'] = 'Voir Tous les Schemas';
	$lang['strnoschema'] = 'Pas de schéma trouvé.';
	$lang['strnoschemas'] = 'Pas de schémas trouvés.';
	$lang['strcreateschema'] = 'Créer un Schéma';
	$lang['strschemaname'] = 'Nom du Schéma';
	$lang['strschemaneedsname'] = 'Vous devez donner un nom pour votre schéma.';
	$lang['strschemacreated'] = 'Schéma créé';
	$lang['strschemacreatedbad'] = 'Echec à la création du Schéma.';
	$lang['strconfdropschema'] = 'Etes-vous sur de vouloir supprimer le schéma "%s"?';
	$lang['strschemadropped'] = 'Schéma supprimé.';
	$lang['strschemadroppedbad'] = 'Echec à la suppression du Schéma.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Pas de Rapport Trouvé.';
	$lang['strcreatereport'] = 'Créer un Rapport';
	$lang['strreportdropped'] = 'Rapport Supprimé.';
	$lang['strreportdroppedbad'] = 'Echec à la suppression du Rapport.';
	$lang['strconfdropreport'] = 'Etes-vous sur de vouloir supprimer le rapport "%s"?';
	$lang['strreportneedsname'] = 'Vous devez donner un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requête SQL pour votre Rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegardé.';
	$lang['strreportcreatedbad'] = 'Echec à la sauvegarde du Rapport.';

	// Miscellaneous
	$lang['strtopbar'] = '%s Lancé sur %s:%s -- Vous êtes connecté sous le nom "%s", %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
