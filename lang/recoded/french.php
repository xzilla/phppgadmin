<?php

	/**
	 * French Language file for phpPgAdmin. 
	 * @maintainer Pascal PEYRE [pascal.peyre@cir.fr]
	 *
	 * $Id: french.php,v 1.1 2003/03/27 10:56:27 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Fran&ccedil;ais';
	$lang['appcharset'] = 'ISO-8859-1';

	// Basic strings
	$lang['strintro'] = 'Bienvenue sur phpPgAdmin.';
	$lang['strlogin'] = 'Login';
	$lang['strloginfailed'] = 'Echec &agrave; la connexion';
	$lang['strserver'] = 'Serveur';
	$lang['strlogout'] = 'D&eacute;connexion';
	$lang['strowner'] = 'Propriaitaire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'Definition';
	$lang['stroperators'] = 'Operateurs';
	$lang['straggregates'] = 'Aggregats';
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
	$lang['strinsert'] = 'Inserer';
	$lang['strselect'] = 'Select';
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
	$lang['stradd'] = 'Add';
	$lang['strevent'] = 'Event';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';

	// Error handling
	$lang['strnoframes'] = 'vous avez besoin d activer les frames sur votre navigateur pour utiliser cette application.';
	$lang['strbadconfig'] = 'Votre config.inc.php est obsol&egrave;te. Vous avez besoin de le reg&eacute;nerer &agrave; partirde config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n avez pas compil&eacute; correctement le support de la base de donn&eacute;es dans votre installation de PHP.';
	$lang['strbadschema'] = 'Sch&eacute;ma sp&eacute;cifi&eacute; invalide.';
	$lang['strbadencoding'] = 'Failed to set client encoding in database.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'Param&egrave;tres de script invalides.';
	$lang['strnodata'] = 'Pas de R&eacute;sultats.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les Tables';
	$lang['strnotables'] = 'Pas de Tables Trouv&eacute;es.';
	$lang['strnotable'] = 'Pas de Table trouv&eacute;e.';
	$lang['strcreatetable'] = 'Cr&eacute;er table';
	$lang['strtablename'] = 'Nom de la Table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtableneedsfield'] = 'Vous devez sp&eacute;cifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez donner un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table cr&eacute;e.';
	$lang['strtablecreatedbad'] = 'Cr&eacute;ation de Table Echou&eacute;e.';
	$lang['strconfdroptable'] = 'Etes-vous sur de vouloir supprimer la table &quot;%s&quot;?';
	$lang['strtabledropped'] = 'Table supprim&eacute;e.';
	$lang['strtabledroppedbad'] = 'Suppresion de Table Echou&eacute;e.';
	$lang['strconfemptytable'] = 'Etes-vous sur de vouloir vider la table &quot;%s&quot;?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = 'Echec de vidage de la table.';
	$lang['strinsertrow'] = 'Inserer Ligne';
	$lang['strrowinserted'] = 'Ligne Ins&eacute;r&eacute;e.';
	$lang['strrowinsertedbad'] = 'Echec d insertion de ligne.';
	$lang['streditrow'] = 'Editer Ligne';
	$lang['strrowupdated'] = 'Ligne Mise &agrave; Jour.';
	$lang['strrowupdatedbad'] = 'Mise &agrave; Jour de la ligne &eacute;chou&eacute;e.';
	$lang['strdeleterow'] = 'Effacer Ligne';
	$lang['strconfdeleterow'] = 'Etes-vous s^ur de vouloir supprimer cette ligne?';
	$lang['strrowdeleted'] = 'Ligne Supprim&eacute;e.';
	$lang['strrowdeletedbad'] = 'Echec de la Suppression de la ligne.';
	$lang['strsaveandrepeat'] = 'Sauvegarder &amp; R&eacute;p&eacute;ter';
	$lang['strfield'] = 'Champ';
	$lang['strfields'] = 'Champs';
	$lang['strnumfields'] = 'Nombre de Champs';
	$lang['strfieldneedsname'] = 'Vous devez nommer vos champs';
	$lang['strselectneedscol'] = 'Vous devez montrer au moins une colonne';
	$lang['straltercolumn'] = 'Modifier Colonne';
	$lang['strcolumnaltered'] = 'Colonne Modifi&eacute;e.';
	$lang['strcolumnalteredbad'] = 'Echec de Modification de Colonne.';
        $lang['strconfdropcolumn'] = 'Etes-vous sur de vouloi supprimer la colonne &quot;%s&quot; de la table &quot;%s&quot;?';
	$lang['strcolumndropped'] = 'Colonne supprim&eacute;e.';
	$lang['strcolumndroppedbad'] = 'Echec de suppression de Colonne.';
	$lang['straddcolumn'] = 'Ajouter Une Colonne';
	$lang['strcolumnadded'] = 'Colonne Ajout&eacute;e.';
	$lang['strcolumnaddedbad'] = 'Echec d Ajout de Colonne.';

	// Users
	$lang['struseradmin'] = 'Administration Utilisateurs';
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de Passe';
	$lang['strsuper'] = 'Super Utilisateur?';
	$lang['strcreatedb'] = 'Cr&eacute;er Base de Donn&eacute;es?';
	$lang['strexpires'] = 'Expiration';
	$lang['strnousers'] = 'Pas d utilisateur trouv&eacute;.';
        $lang['struserupdated'] = 'Utilisateur mis &agrave; jour.';
	$lang['struserupdatedbad'] = 'Mise &agrave; jour de l utilisateur &eacute;chou&eacute;e.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Cr&eacute;er un Utilisateur';
	$lang['strusercreated'] = 'Utilisateur Cr&eacute;&eacute;.';
	$lang['strusercreatedbad'] = 'Cr&eacute;ation de l Utilisateur Echou&eacute;e.';
	$lang['strconfdropuser'] = 'Etes-Vous sur de vouloir supprimer l Utilisateur &quot;%s&quot;?';
	$lang['struserdropped'] = 'Utilisateur Supprim&eacute;.';
	$lang['struserdroppedbad'] = 'Echec &agrave; la suppression de l Utilisateur.';
		
	// Groups
	$lang['strgroupadmin'] = 'Administration des Groupes';
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strnogroup'] = 'Groupe non trouv&eacute;.';
	$lang['strnogroups'] = 'Pas de Groupes trouv&eacute;.';
	$lang['strcreategroup'] = 'Cr&eacute;er un Groupe';
	$lang['strshowallgroups'] = 'Voir Tous les Groupes';
	$lang['strgroupneedsname'] = 'Vous devez donner un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe cr&eacute;&eacute;.';
	$lang['strgroupcreatedbad'] = 'Echec &agrave; la cr&eacute;ation du groupe.';	
	$lang['strconfdropgroup'] = 'Etes vous sur de vouloir supprimer le groupe &quot;%s&quot;?';
	$lang['strgroupdropped'] = 'Groupe supprim&eacute;.';
	$lang['strgroupdroppedbad'] = 'Suppression de groupe &eacute;chou&eacute;e.';
	$lang['strmembers'] = 'Membres';

	// Privilges
	$lang['strprivilege'] = 'Privil&egrave;ge';
	$lang['strprivileges'] = 'Privil&egrave;ges';
	$lang['strnoprivileges'] = 'Cet object n a pas de privil&egrave;ges.';
	$lang['strgrant'] = 'Accorder(Grant)';
	$lang['strrevoke'] = 'Revoquer';
	$lang['strgranted'] = 'Privil&egrave;ges Accord&eacute;.';
	$lang['strgrantfailed'] = 'Echec dans l accord de privil&egrave;ges.';
	$lang['strgrantuser'] = 'Accorder Utilisateur';
	$lang['strgrantgroup'] = 'Accorder Groupe';

	// Databases
	$lang['strdatabase'] = 'Base de Donn&eacute;es';
	$lang['strdatabases'] = 'Bases de Donn&eacute;es';
	$lang['strshowalldatabases'] = 'Voir Toutes les Bases de Donn&eacute;es';
	$lang['strnodatabase'] = 'Pas de Base de Donn&eacute;es trouv&eacute;e.';
	$lang['strnodatabases'] = 'Pas de Bases de Donn&eacute;es trouv&eacute;es.';
	$lang['strcreatedatabase'] = 'Cr&eacute;er une Base de Donn&eacute;es';
	$lang['strdatabasename'] = 'Nom de la Base de Donn&eacute;es';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre Base de Donn&eacute;es.';
	$lang['strdatabasecreated'] = 'Base de Donn&eacute;es cr&eacute;&eacute;e.';
	$lang['strdatabasecreatedbad'] = 'Cr&eacute;ation de la Base de Donn&eacute;es Echou&eacute;e.';	
	$lang['strconfdropdatabase'] = 'Etes-vous sur de vouloir supprimer la base de donn&eacute;es &quot;%s&quot;?';
	$lang['strdatabasedropped'] = 'Base de Donn&eacute;es supprim&eacute;e.';
	$lang['strdatabasedroppedbad'] = 'Echec &agrave; la suppression de la Base de Donn&eacute;es.';
	$lang['strentersql'] = 'Entrer la requ&ecirc;te SQL &agrave; executer dessous:';
	$lang['strvacuumgood'] = 'Vacuum complet.';
	$lang['strvacuumbad'] = 'Vacuum Echou&eacute;.';
	$lang['stranalyzegood'] = 'Analyze complet.';
	$lang['stranalyzebad'] = 'Analyze Echou&eacute;.';

	// Views
	$lang['strview'] = 'Vue';
	$lang['strviews'] = 'Vues';
	$lang['strshowallviews'] = 'Voir toutes les Vues';
	$lang['strnoview'] = 'Pas de Vue trouv&eacute;e.';
	$lang['strnoviews'] = 'Pas de Vues trouv&eacute;es.';
	$lang['strcreateview'] = 'Cr&eacute;er une Vue';
	$lang['strviewname'] = 'Nom de la Vue';
	$lang['strviewneedsname'] = 'Vous devez donner un nom pour votre Vue.';
	$lang['strviewneedsdef'] = 'Vous devez donner une d&eacute;finition pour votre vue.';
	$lang['strviewcreated'] = 'Vue Cr&eacute;&eacute;e.';
	$lang['strviewcreatedbad'] = 'Echec &agrave; la Cr&eacute;ation de la Vue.';
	$lang['strconfdropview'] = 'Ete-vous sur de vouloir supprimer la Vue &quot;%s&quot;?';
	$lang['strviewdropped'] = 'Vue Supprim&eacute;e.';
	$lang['strviewdroppedbad'] = 'Echec &agrave; la Suppression de la Vue.';
	$lang['strviewupdated'] = 'Vue Mise &agrave; Jour.';
	$lang['strviewupdatedbad'] = 'Mise &agrave; Jour de la Vue Echou&eacute;e.';

	// Sequences
	$lang['strsequence'] = 'S&eacute;quence';
	$lang['strsequences'] = 'S&eacute;quences';
	$lang['strshowallsequences'] = 'Voir toutes les s&eacute;quences';
	$lang['strnosequence'] = 'Pas de s&eacute;quence trouv&eacute;e.';
	$lang['strnosequences'] = 'Pas de s&eacute;quences trouv&eacute;es.';
	$lang['strcreatesequence'] = 'Cr&eacute;er une s&eacute;quence';
	$lang['strlastvalue'] = 'Derni&egrave;re Valeur';
	$lang['strincrementby'] = 'Incr&eacute;menter par ';	
	$lang['strstartvalue'] = 'Valeur de D&eacute;part';
	$lang['strmaxvalue'] = 'Valeur Maxilale';
	$lang['strminvalue'] = 'Valeur Minimale';
	$lang['strcachevalue'] = 'Valeur de Cache';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Est Cycl&eacute;e?';
	$lang['striscalled'] = 'Est Appel&eacute;e?';
	$lang['strsequenceneedsname'] = 'Vous devez sp&eacute;cifier un nom pour votre s&eacute;quence.';
	$lang['strsequencecreated'] = 'S&eacute;quence cr&eacute;e.';
	$lang['strsequencecreatedbad'] = 'Cr&eacute;ation de la S&eacute;quence Echou&eacute;e.'; 
	$lang['strconfdropsequence'] = 'Etes vous sur de vouloir supprimer la s&eacute;quence &quot;%s&quot;?';
	$lang['strsequencedropped'] = 'S&eacute;quence supprim&eacute;e.';
	$lang['strsequencedroppedbad'] = 'Echec &agrave; la suppression de la s&eacute;quence.';

	// Indexes
	$lang['strindexes'] = 'Index';
	$lang['strindexname'] = 'Nom de l Index';
	$lang['strshowallindexes'] = 'Voir tous les Index';
	$lang['strnoindex'] = 'Pas d index trouv&eacute;.';
	$lang['strnoindexes'] = 'Pas d index trouv&eacute;s.';
	$lang['strcreateindex'] = 'Cr&eacute;er un Index';
	$lang['strindexname'] = 'Nom de l Index';
	$lang['strtabname'] = 'Nom de la Table';
	$lang['strcolumnname'] = 'Nom de la Colonne';
	$lang['strindexneedsname'] = 'Vous devez donner un nom pour votre index';
	$lang['strindexneedscols'] = 'Vous devez donner un nombre valide de colonnes.';
	$lang['strindexcreated'] = 'Index cr&eacute;&eacute;';
	$lang['strindexcreatedbad'] = 'Cr&eacute;ation de l Index Echou&eacute;e.';
	$lang['strconfdropindex'] = 'Etes-vous sur de vouloir supprimer l index &quot;%s&quot;?';
	$lang['strindexdropped'] = 'Index supprim&eacute;.';
	$lang['strindexdroppedbad'] = 'Suppression de l Index Echou&eacute;e.';
	$lang['strkeyname'] = 'Nom de la Cl&eacute;';
	$lang['struniquekey'] = 'Cl&eacute; Unique';
	$lang['strprimarykey'] = 'Cl&eacute; Primaire';
 	$lang['strindextype'] = 'Type d index';
	$lang['strindexname'] = 'Nom de l index';
	$lang['strtablecolumnlist'] = 'Liste des Colonnes';
	$lang['strindexcolumnlist'] = 'Liste des Colonnes dans l Index';

	// Rules
	$lang['strrules'] = 'R&egrave;gles';
	$lang['strrule'] = 'R&egrave;gle';
	$lang['strshowallrules'] = 'Voir Toutes les R&egrave;gles';
	$lang['strnorule'] = 'Pas de R&egrave;gle Trouv&eacute;e.';
	$lang['strnorules'] = 'Pas de R&egrave;gles Trouv&eacute;es.';
	$lang['strcreaterule'] = 'Cr&eacute;er une R&egrave;gle';
	$lang['strrulename'] = 'Nom de la R&egrave;gle';
	$lang['strruleneedsname'] = 'Vous devez sp&eacute;cifier un nom pour votre r&egrave;gle.';
	$lang['strrulecreated'] = 'R&egrave;gle cr&eacute;e.';
	$lang['strrulecreatedbad'] = 'Cr&eacute;ation de la r&egrave;gle Echou&eacute;e.';
	$lang['strconfdroprule'] = 'Etes-vous sur de vouloir supprimer la r&egrave;gle &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strruledropped'] = 'R&egrave;gle Supprim&eacute;e.';
	$lang['strruledroppedbad'] = 'Suppression de R&egrave;gle Echou&eacute;e.';

	// Constraints
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les Contraintes';
	$lang['strnoconstraints'] = 'Pas de Contrainte trouv&eacute;e.';
	$lang['strcreateconstraint'] = 'Cr&eacute;er une Contrainte';
	$lang['strconstraintcreated'] = 'Cr&eacute;ation d une contrainte.';
	$lang['strconstraintcreatedbad'] = 'Cr&eacute;ation de la Contrainte Echou&eacute;e.';
	$lang['strconfdropconstraint'] = 'Etes vous sur de vouloi supprimer la Contrainte &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strconstraintdropped'] = 'Contrainte Supprim&eacute;e.';
	$lang['strconstraintdroppedbad'] = 'Echec de la Contrainte supprim&eacute;e.';
	$lang['straddcheck'] = 'Ajouter une Contrainte';
	$lang['strcheckneedsdefinition'] = 'La Contrainte a besoin d une d&eacute;finition.';
	$lang['strcheckadded'] = 'Contrainte Ajout&eacute;e.';
	$lang['strcheckaddedbad'] = 'Echec &agrave; la cr&eacute;ation de la Contrainte.';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les Fonctions';
	$lang['strnofunction'] = 'Pas de Fonction trouv&eacute;e.';
	$lang['strnofunctions'] = 'Pas de Fonctions trouv&eacute;es.';
	$lang['strcreatefunction'] = 'Cr&eacute;er une fonction';
	$lang['strfunctionname'] = 'Nom de la Fonction';
	$lang['strreturns'] = 'Valeur de Sortie';
	$lang['strarguments'] = 'Arguments';
	$lang['strfunctionneedsname'] = 'Vous devez donner un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez donner une d&eacute;finition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction cr&eacute;&eacute;e.';
	$lang['strfunctioncreatedbad'] = 'Cr&eacute;ation de la Fonction &eacute;chou&eacute;e.';
	$lang['strconfdropfunction'] = 'Etes-vous sur de vouloi supprimer la fonction &quot;%s&quot;?';
	$lang['strfunctiondropped'] = 'Fonction supprim&eacute;e.';
	$lang['strfunctiondroppedbad'] = 'Suppression de la Fonction supprim&eacute;e.';
	$lang['strfunctionupdated'] = 'Fonction Mise &agrave; Jour.';
	$lang['strfunctionupdatedbad'] = 'Echec &agrave; la Mise &agrave; Jour de la Fonction.';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggers';
	$lang['strshowalltriggers'] = 'Voir tous les triggers';
	$lang['strnotrigger'] = 'Pas de Trigger trouv&eacute;.';
	$lang['strnotriggers'] = 'Pas de Triggers trouv&eacute;s.';
	$lang['strcreatetrigger'] = 'Cr&eacute;er un Trigger';
	$lang['strtriggerneedsname'] = 'Vous devez sp&eacute;cifier un nom pour votre Trigger.';
	$lang['strtriggerneedsfunc'] = 'Vous devez sp&eacute;cifier une fonction pour votre trigger.';
	$lang['strtriggercreated'] = 'Trigger cr&eacute;&eacute;.';
	$lang['strtriggercreatedbad'] = 'Cr&eacute;ation de Trigger Echou&eacute;e.';
	$lang['strconfdroptrigger'] = 'Etes-vous sur de vouloir supprimer le trigger &quot;%s&quot; sur &quot;%s&quot;?';
	$lang['strtriggerdropped'] = 'Trigger supprim&eacute;.';
	$lang['strtriggerdroppedbad'] = 'Suppression du Trigger Echou&eacute;e.';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Pas de Type trouv&eacute;.';
	$lang['strnotypes'] = 'Pas de Types trouv&eacute;s.';
	$lang['strcreatetype'] = 'Cr&eacute;er un Type';
	$lang['strtypename'] = 'Nom du Type';
	$lang['strinputfn'] = 'Fonction d Entr&eacute;e';
	$lang['stroutputfn'] = 'Fonction de Sortie';
	$lang['strpassbyval'] = 'Pass&eacute;e par valeur?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = 'El&eacute;ment';
	$lang['strdelimiter'] = 'Delimiteur';
	$lang['strstorage'] = 'Stockage';
	$lang['strtypeneedsname'] = 'Vous devez donner un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez donner une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type cr&eacute;&eacute;';
	$lang['strtypecreatedbad'] = 'Echec &agrave; la cr&eacute;ation du Type.';
	$lang['strconfdroptype'] = 'Etes-vous de vouloir supprim&eacute; le type &quot;%s&quot;?';
	$lang['strtypedropped'] = 'Type supprim&eacute;.';
	$lang['strtypedroppedbad'] = 'Echec &agrave; la suppression du Type.';

	// Schemas
	$lang['strschema'] = 'Sch&eacute;ma';
	$lang['strschemas'] = 'Sch&eacute;mas';
	$lang['strshowallschemas'] = 'Voir Tous les Schemas';
	$lang['strnoschema'] = 'Pas de sch&eacute;ma trouv&eacute;.';
	$lang['strnoschemas'] = 'Pas de sch&eacute;mas trouv&eacute;s.';
	$lang['strcreateschema'] = 'Cr&eacute;er un Sch&eacute;ma';
	$lang['strschemaname'] = 'Nom du Sch&eacute;ma';
	$lang['strschemaneedsname'] = 'Vous devez donner un nom pour votre sch&eacute;ma.';
	$lang['strschemacreated'] = 'Sch&eacute;ma cr&eacute;&eacute;';
	$lang['strschemacreatedbad'] = 'Echec &agrave; la cr&eacute;ation du Sch&eacute;ma.';
	$lang['strconfdropschema'] = 'Etes-vous sur de vouloir supprimer le sch&eacute;ma &quot;%s&quot;?';
	$lang['strschemadropped'] = 'Sch&eacute;ma supprim&eacute;.';
	$lang['strschemadroppedbad'] = 'Echec &agrave; la suppression du Sch&eacute;ma.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Pas de Rapport Trouv&eacute;.';
	$lang['strcreatereport'] = 'Cr&eacute;er un Rapport';
	$lang['strreportdropped'] = 'Rapport Supprim&eacute;.';
	$lang['strreportdroppedbad'] = 'Echec &agrave; la suppression du Rapport.';
	$lang['strconfdropreport'] = 'Etes-vous sur de vouloir supprimer le rapport &quot;%s&quot;?';
	$lang['strreportneedsname'] = 'Vous devez donner un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requ&ecirc;te SQL pour votre Rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegard&eacute;.';
	$lang['strreportcreatedbad'] = 'Echec &agrave; la sauvegarde du Rapport.';

	// Miscellaneous
	$lang['strtopbar'] = '%s Lanc&eacute; sur %s:%s -- Vous &ecirc;tes connect&eacute; sous le nom &quot;%s&quot;, %s';
	$lang['strtimefmt'] = 'jS M, Y g:iA';

?>
