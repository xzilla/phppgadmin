<?php

	/**
	* French Language file for phpPgAdmin. 
	* @maintainer Guillaume (ioguix) de Rorthais
	*
	* $Id: french.php,v 1.36 2008/03/27 10:46:32 ioguix Exp $
	*/

	// Language and character set
	$lang['applang'] = 'Fran&#231;ais';
	$lang['appcharset'] = 'ISO-8859-1';
	$lang['applocale'] = 'fr_FR';
	$lang['appdbencoding'] = 'LATIN1';
	$lang['applangdir'] = 'ltr';

	// Basic strings
	$lang['strintro'] = 'Bienvenue sur phpPgAdmin.';
	$lang['strppahome'] = 'Page d\'accueil de phpPgAdmin';
	$lang['strpgsqlhome'] = 'Page d\'accueil de PostgreSQL';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'Documentation PostgreSQL (local)';
	$lang['strreportbug'] = 'Rapporter un bug';
	$lang['strviewfaq'] = 'Lire la FAQ';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';

	// Basic strings
	$lang['strlogin'] = 'Connexion';
	$lang['strloginfailed'] = '&#201;chec de la connexion';
	$lang['strlogindisallowed'] = 'Connexion d&#233;sactiv&#233;e pour raison de s&#233;curit&#233;';
	$lang['strserver'] = 'Serveur';
	$lang['strservers'] = 'Serveurs';
	$lang['strgroupservers'] = 'Serveurs du groupe &quot;%s&quot;';
	$lang['strallservers'] = 'Tous les serveurs';
	$lang['strintroduction'] = 'Introduction';
	$lang['strhost'] = 'H&#244;te';
	$lang['strport'] = 'Port';
	$lang['strlogout'] = 'D&#233;connexion';
	$lang['strowner'] = 'Propri&#233;taire';
	$lang['straction'] = 'Action';
	$lang['stractions'] = 'Actions';
	$lang['strname'] = 'Nom';
	$lang['strdefinition'] = 'D&#233;finition';
	$lang['strproperties'] = 'Propri&#233;t&#233;s';
	$lang['strbrowse'] = 'Parcourir';
	$lang['strenable'] = 'Activer';
	$lang['strdisable'] = 'D&#233;sactiver';
	$lang['strdrop'] = 'Supprimer';
	$lang['strdropped'] = 'Supprim&#233;';
	$lang['strnull'] = 'NULL (le mot)';
	$lang['strnotnull'] = 'NOT NULL';
	$lang['strprev'] = 'Pr&#233;c&#233;dent';
	$lang['strnext'] = 'Suivant';
	$lang['strfirst'] = '&lt;&lt; D&#233;but';
	$lang['strlast'] = 'Fin &gt;&gt;';
	$lang['strfailed'] = '&#201;chec';
	$lang['strcreate'] = 'Cr&#233;er';
	$lang['strcreated'] = 'Cr&#233;&#233;';
	$lang['strcomment'] = 'Commentaire';
	$lang['strlength'] = 'Longueur';
	$lang['strdefault'] = 'D&#233;faut';
	$lang['stralter'] = 'Modifier';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Annuler';
	$lang['strkill'] = 'Tuer';
	$lang['strac'] = 'Activer la compl&#233;tion automatique';
	$lang['strsave'] = 'Sauvegarder';
	$lang['strreset'] = 'R&#233;initialiser';
	$lang['strrestart'] = 'Red&#233;marrer';
	$lang['strinsert'] = 'Ins&#233;rer';
	$lang['strselect'] = 'S&#233;lectionner';
	$lang['strdelete'] = 'Effacer';
	$lang['strupdate'] = 'Modifier';
	$lang['strreferences'] = 'R&#233;f&#233;rences';
	$lang['stryes'] = 'Oui';
	$lang['strno'] = 'Non';
	$lang['strtrue'] = 'TRUE';
	$lang['strfalse'] = 'FALSE';
	$lang['stredit'] = '&#201;diter';
	$lang['strcolumn'] = 'Colonne';
	$lang['strcolumns'] = 'Colonnes';
	$lang['strrows'] = 'ligne(s)';
	$lang['strrowsaff'] = 'ligne(s) affect&#233;e(s).';
	$lang['strobjects'] = 'objet(s)';
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
	$lang['strimport'] = 'Importer';
	$lang['strallowednulls'] = 'Autoriser les caract&#232;res NULL';
	$lang['strbackslashn'] = '\N';
	$lang['stremptystring'] = 'Cha&#238;ne/champ vide';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Admin';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strclusterindex'] = 'Cluster';
	$lang['strclustered'] = 'En Cluster ?';
	$lang['strreindex'] = 'Reindex';
	$lang['strexecute'] = 'Lancer';
	$lang['stradd'] = 'Ajouter';
	$lang['strevent'] = '&#201;v&#233;nement';
	$lang['strwhere'] = 'O&#249;';
	$lang['strinstead'] = 'Faire &#224; la place';
	$lang['strwhen'] = 'Quand';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Donn&#233;e';
	$lang['strconfirm'] = 'Confirmer';
	$lang['strexpression'] = 'Expression';
	$lang['strellipsis'] = '...';
	$lang['strseparator'] = ' :';
	$lang['strexpand'] = '&#201;tendre';
	$lang['strcollapse'] = 'R&#233;duire';
	$lang['strfind'] = 'Rechercher';
	$lang['stroptions'] = 'Options';
	$lang['strrefresh'] = 'Rafraichir';
	$lang['strdownload'] = 'T&#233;l&#233;charger';
	$lang['strdownloadgzipped'] = 'T&#233;l&#233;charger avec compression gzip';
	$lang['strinfo'] = 'Info';
	$lang['stroids'] = 'OID';
	$lang['stradvanced'] = 'Avanc&#233;';
	$lang['strvariables'] = 'Variables';
	$lang['strprocess'] = 'Processus';
	$lang['strprocesses'] = 'Processus';
	$lang['strsetting'] = 'Param&#233;trage';
	$lang['streditsql'] = '&#201;diter SQL';
	$lang['strruntime'] = 'Temps d\'ex&#233;cution total : %s ms';
	$lang['strpaginate'] = 'Paginer les r&#233;sultats';
	$lang['struploadscript'] = 'ou importer un script SQL :';
	$lang['strstarttime'] = 'Heure de d&#233;but';
	$lang['strfile'] = 'Fichier';
	$lang['strfileimported'] = 'Fichier import&#233;.';
	$lang['strtrycred'] = 'Utilisez ces identifiants pour tous les serveurs';
	$lang['strconfdropcred'] = 'For security reason, disconnecting will destroy your shared login information. Are you sure you want to disconnect ?';
	$lang['strconfdropcred'] = 'Par mesure de s&#233;curit&#233;, la d&#233;connexion supprimera le partage de vos identifiants pour tous les serveurs. &#202;tes-vous certain de vouloir vous d&#233;connecter ?';
	$lang['stractionsonmultiplelines'] = 'Actions sur plusieurs lignes';
	$lang['strselectall'] = 'S&#233;lectionner tout';
	$lang['strunselectall'] = 'Des&#233;lectionner tout';
	$lang['strlocale'] = 'Locale';
	$lang['strcollation'] = 'Tri';
	$lang['strctype'] = 'Type de caract&#232;re';
	$lang['strdefaultvalues'] = 'Valeurs par d&#233;faut';
	$lang['strnewvalues'] = 'Nouvelles valeurs';
	$lang['strstart'] = 'D&#233;marrer';
	$lang['strstop'] = 'Arr&#234;ter';
	$lang['strgotoppage'] = 'Haut de la page';
	$lang['strtheme'] = 'Th&#232;me';

	// Admin
	$lang['stradminondatabase'] = 'Les actions d\'administration suivantes s\'appliquent &#224; l\'ensemble de la base de donn&#233;e %s.';
	$lang['stradminontable'] = 'Les actions d\'administration suivantes s\'appliquent &#224; la table %s.';

	// User-supplied SQL history
	$lang['strhistory'] = 'Historique';
	$lang['strnohistory'] = 'Pas d\'historique.';
	$lang['strclearhistory'] = '&#201;ffacer l\'historique';
	$lang['strdelhistory'] = 'Supprimer de l\'historique';
	$lang['strconfdelhistory'] = 'Voulez-vous vraiment supprimer cette requ&#234;te de l\'historique ?';
	$lang['strconfclearhistory'] = 'Voulez-vous vraiment &#233;ffacer l\'historique ?';
	$lang['strnodatabaseselected'] = 'Veuillez s&#233;lectionner une base de donn&#233;es.';

	// Database Sizes
	$lang['strnoaccess'] = 'Pas d\'Acc&#232;s'; 
	$lang['strsize'] = 'Taille';
	$lang['strbytes'] = 'octets';
	$lang['strkb'] = ' Ko';
	$lang['strmb'] = ' Mo';
	$lang['strgb'] = ' Go';
	$lang['strtb'] = ' To';

	// Error handling
	$lang['strnoframes'] = 'Cette application fonctionne mieux avec un navigateur pouvant afficher des frames mais peut &#234;tre utilis&#233;e sans frames en suivant les liens ci-dessous.';
	$lang['strnoframeslink'] = 'Utiliser sans frames';
	$lang['strbadconfig'] = 'Le fichier de configuration config.inc.php est obsol&#232;te. Vous avez besoin de le reg&#233;n&#233;rer &#224; partir de config.inc.php-dist.';
	$lang['strnotloaded'] = 'Vous n\'avez pas compil&#233; correctement le support de la base de donn&#233;es dans votre installation de PHP.';
	$lang['strpostgresqlversionnotsupported'] = 'Cette version de PostgreSQL n\'est pas support&#233;e. Merci de mettre &#224; jour PHP &#224; la version %s ou ult&#233;rieure.';
	$lang['strbadschema'] = 'Sch&#233;ma sp&#233;cifi&#233; invalide.';
	$lang['strbadencoding'] = 'Impossible de sp&#233;cifier l\'encodage de la base de donn&#233;es.';
	$lang['strsqlerror'] = 'Erreur SQL :';
	$lang['strinstatement'] = 'Dans l\'instruction :';
	$lang['strinvalidparam'] = 'Param&#232;tres de script invalides.';
	$lang['strnodata'] = 'Pas de r&#233;sultats.';
	$lang['strnoobjects'] = 'Aucun objet trouv&#233;.';
	$lang['strrownotunique'] = 'Pas d\'identifiant unique pour cette ligne.';
	$lang['strnoreportsdb'] = 'Vous n\'avez pas cr&#233;&#233; la base de donn&#233;es reports. Lisez le fichier INSTALL pour en savoir plus.';
	$lang['strnouploads'] = 'Importation de fichiers d&#233;sactiv&#233;e.';
	$lang['strimporterror'] = 'Erreur d\'importation.';
	$lang['strimporterror-fileformat'] = 'Erreur d\'importation : &#233;chec lors de la d&#233;termination automatique du format de fichier.';
	$lang['strimporterrorline'] = 'Erreur d\'importation &#224; la ligne %s.';
	$lang['strimporterrorline-badcolumnnum'] = 'Erreur d\'importation sur la ligne %s : la ligne ne poss&#232;de pas le bon nombre de colonnes.';
	$lang['strimporterror-uploadedfile'] = 'Erreur d\'importation : le fichier n\'a pas p&#251; &#234;tre r&#233;cup&#233;r&#233; sur le serveur.';
	$lang['strcannotdumponwindows'] = 'La sauvegarde de table complexe et des noms de sch&#233;mas n\'est pas support&#233; sur Windows.';
	$lang['strinvalidserverparam'] = 'Tentative de connexion avec un serveur invalide, il est possible que quelqu\'un essai de pirater votre syst&#232;me.'; 
	$lang['strnoserversupplied'] = 'Aucun serveur fournis !';
	$lang['strbadpgdumppath'] = 'Erreur d\'export : n\'a pu ex&#233;cuter pg_dump (chemin indiqu&#233; dans votre conf/config.inc.php : %s). Merci de corriger le chemin dans votre configuration et de vous reconnecter.';
	$lang['strbadpgdumpallpath'] = 'Erreur d\'export : n\'a pu ex&#233;cuter pg_dumpall (chemin indiqu&#233; dans votre conf/config.inc.php : %s). Merci de corriger le chemin dans votre configuration et de vous reconnecter.';
	$lang['strconnectionfail'] = 'Connexion au serveur &#233;chou&#233;e.';

	// Tables
	$lang['strtable'] = 'Table';
	$lang['strtables'] = 'Tables';
	$lang['strshowalltables'] = 'Voir toutes les tables';
	$lang['strnotables'] = 'Aucune table trouv&#233;e.';
	$lang['strnotable'] = 'Aucune table trouv&#233;e.';
	$lang['strcreatetable'] = 'Cr&#233;er une table';
	$lang['strcreatetablelike'] = 'Cr&#233;er une table d\'apr&#232;s une table existante';
	$lang['strcreatetablelikeparent'] = 'Table mod&#232;le';
	$lang['strcreatelikewithdefaults'] = 'inclure les valeurs par d&#233;faut.';
	$lang['strcreatelikewithconstraints'] = 'inclure les contraintes.';
	$lang['strcreatelikewithindexes'] = 'inclure les indexes.';
	$lang['strtablename'] = 'Nom de la table';
	$lang['strtableneedsname'] = 'Vous devez donner un nom pour votre table.';
	$lang['strtablelikeneedslike'] = 'Vous devez pr&#233;ciser une table mod&#232;le.';
	$lang['strtableneedsfield'] = 'Vous devez sp&#233;cifier au moins un champ.';
	$lang['strtableneedscols'] = 'Vous devez indiquer un nombre valide de colonnes.';
	$lang['strtablecreated'] = 'Table cr&#233;&#233;e.';
	$lang['strtablecreatedbad'] = '&#201;chec de la cr&#233;ation de table.';
	$lang['strconfdroptable'] = '&#202;tes-vous sur de vouloir supprimer la table &#171; %s &#187; ?';
	$lang['strtabledropped'] = 'Table supprim&#233;e.';
	$lang['strtabledroppedbad'] = '&#201;chec lors de la suppression de table.';
	$lang['strconfemptytable'] = '&#202;tes-vous s&#251;r de vouloir vider la table &#171; %s &#187; ?';
	$lang['strtableemptied'] = 'Table vide.';
	$lang['strtableemptiedbad'] = '&#201;chec du vidage de la table.';
	$lang['strinsertrow'] = 'Ins&#233;rer un enregistrement.';
	$lang['strrowinserted'] = 'Enregistrement ins&#233;r&#233;.';
	$lang['strrowinsertedbad'] = '&#201;chec lors de l\'insertion d\'un enregistrement.';
	$lang['strnofkref'] = 'Aucune valeur correspondate pour la cl&#233; &#233;trang&#232;re %s.';
	$lang['strrowduplicate'] = '&#201;chec lors de l\'insertion d\'un enregistrement, a tent&#233; de faire une insertion dupliqu&#233;e.';
	$lang['streditrow'] = '&#201;diter l\'enregistrement.';
	$lang['strrowupdated'] = 'Enregistrement mis &#224; jour.';
	$lang['strrowupdatedbad'] = '&#201;chec de mise &#224; jour de l\'enregistrement.';
	$lang['strdeleterow'] = 'Effacer l\'enregistrement';
	$lang['strconfdeleterow'] = '&#202;tes-vous s&#251;r de vouloir supprimer cet enregistrement ?';
	$lang['strrowdeleted'] = 'Enregistrement supprim&#233;.';
	$lang['strrowdeletedbad'] = '&#201;chec lors de la suppression de l\'enregistrement.';
	$lang['strinsertandrepeat'] = 'Ins&#233;rer et r&#233;p&#233;ter';
	$lang['strnumcols'] = 'Nombre de colonnes';
	$lang['strcolneedsname'] = 'Vous devez sp&#233;cifier un nom pour la colonne';
	$lang['strselectallfields'] = 'S&#233;lectionner tous les champs';
	$lang['strselectneedscol'] = 'Vous devez s&#233;lectionner au moins une colonne.';
	$lang['strselectunary'] = 'Les op&#233;rateurs unaires ne peuvent avoir de valeurs.';
	$lang['strcolumnaltered'] = 'Colonne modifi&#233;e.';
	$lang['strcolumnalteredbad'] = '&#201;chec lors de la modification de la colonne.';
	$lang['strconfdropcolumn'] = '&#202;tes-vous s&#251;r de vouloir supprimer la colonne &#171; %s &#187; de la table &#171; %s &#187; ?';
	$lang['strcolumndropped'] = 'Colonne supprim&#233;e.';
	$lang['strcolumndroppedbad'] = '&#201;chec lors de la suppression de la colonne.';
	$lang['straddcolumn'] = 'Ajouter une colonne';
	$lang['strcolumnadded'] = 'Colonne ajout&#233;e.';
	$lang['strcolumnaddedbad'] = '&#201;chec lors de l\'ajout de la colonne.';
	$lang['strcascade'] = 'CASCADE';
	$lang['strtablealtered'] = 'Table modifi&#233;e.';
	$lang['strtablealteredbad'] = '&#201;chec lors de la modification de la table.';
	$lang['strdataonly'] = 'Donn&#233;es seulement';
	$lang['strstructureonly'] = 'Structure seulement';
	$lang['strstructureanddata'] = 'Structure et donn&#233;es';
	$lang['strtabbed'] = 'Tabul&#233;';
	$lang['strauto'] = 'Auto';
	$lang['strconfvacuumtable'] = '&#202;tes-vous s&#251;r de vouloir faire un vacuum de &#171; %s &#187; ?';
	$lang['strconfanalyzetable'] = '&#202;tes-vous s&#251;r de vouloir &#233;ffectuer un ANALYZE sur &#171; %s &#187; ?';
	$lang['strconfreindextable'] = '&#202;tes-vous s&#251;r de vouloir r&#233;indexer &#171; %s &#187; ?';
	$lang['strconfclustertable'] = '&#202;tes-vous s&#251;r de vouloir lancer un CLUSTER sur &#171;%s &#187; ?';
	$lang['strestimatedrowcount'] = 'Nombre d\'enregistrements estim&#233;s';
	$lang['strspecifytabletoanalyze'] = 'Vous devez sp&#233;cifier au moins une table &#224; analyzer';
	$lang['strspecifytabletoempty'] = 'Vous devez sp&#233;cifier au moins une table &#224; vider';
	$lang['strspecifytabletodrop'] = 'Vous devez sp&#233;cifier au moins une table &#224; supprimer';
	$lang['strspecifytabletovacuum'] = 'Vous devez sp&#233;cifier au moins une table sur laquelle &#233;ffectuer le vacuum';
	$lang['strspecifytabletoreindex'] = 'Vous devez sp&#233;cifier au moins une table &#224; r&#233;indexer.';
	$lang['strspecifytabletocluster'] = 'Vous devez sp&#233;cifier au moins une table sur laquelle &#233;ffectuer la commande CLUSTER.';
	$lang['strnofieldsforinsert'] = 'Vous ne pouvez ins&#233;rer de donn&#233;es dans une table sans champs.';

	// Columns
	$lang['strcolprop'] = 'Propri&#233;t&#233;s de la Colonne';
	$lang['strnotableprovided'] = 'Aucune table fournie !';

	// Users
	$lang['struser'] = 'Utilisateur';
	$lang['strusers'] = 'Utilisateurs';
	$lang['strusername'] = 'Utilisateur';
	$lang['strpassword'] = 'Mot de passe';
	$lang['strsuper'] = 'Super utilisateur ?';
	$lang['strcreatedb'] = 'Cr&#233;er base de donn&#233;es ?';
	$lang['strexpires'] = 'Expiration';
	$lang['strsessiondefaults'] = 'Session par d&#233;faut';
	$lang['strnousers'] = 'Aucun utilisateur trouv&#233;.';
	$lang['struserupdated'] = 'Utilisateur mis &#224; jour.';
	$lang['struserupdatedbad'] = '&#201;chec lors de la mise &#224; jour de l\'utilisateur.';
	$lang['strshowallusers'] = 'Voir tous les utilisateurs';
	$lang['strcreateuser'] = 'Cr&#233;er un utilisateur';
	$lang['struserneedsname'] = 'Vous devez donner un nom pour votre utilisateur.';
	$lang['strusercreated'] = 'Utilisateur cr&#233;&#233;.';
	$lang['strusercreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'utilisateur.';
	$lang['strconfdropuser'] = '&#202;tes-vous s&#251;r de vouloir supprimer l\'utilisateur &#171; %s &#187; ?';
	$lang['struserdropped'] = 'Utilisateur supprim&#233;.';
	$lang['struserdroppedbad'] = '&#201;chec lors de la suppression de l\'utilisateur.';
	$lang['straccount'] = 'Comptes';
	$lang['strchangepassword'] = 'Modifier le mot de passe';
	$lang['strpasswordchanged'] = 'Mot de passe modifi&#233;.';
	$lang['strpasswordchangedbad'] = '&#201;chec lors de la modification du mot de passe.';
	$lang['strpasswordshort'] = 'Le mot de passe est trop court.';
	$lang['strpasswordconfirm'] = 'Le mot de passe de confirmation est diff&#233;rent.';

	// Groups
	$lang['strgroup'] = 'Groupe';
	$lang['strgroups'] = 'Groupes';
	$lang['strshowallgroups'] = 'Afficher tous les groupes';
	$lang['strnogroup'] = 'Groupe introuvable.';
	$lang['strnogroups'] = 'Aucun groupe trouv&#233;.';
	$lang['strcreategroup'] = 'Cr&#233;er un groupe';
	$lang['strgroupneedsname'] = 'Vous devez indiquer un nom pour votre groupe.';
	$lang['strgroupcreated'] = 'Groupe cr&#233;&#233;.';
	$lang['strgroupcreatedbad'] = '&#201;chec lors de la cr&#233;ation du groupe.';
	$lang['strconfdropgroup'] = '&#202;tes-vous s&#251;r de vouloir supprimer le groupe &#171; %s &#187; ?';
	$lang['strgroupdropped'] = 'Groupe supprim&#233;.';
	$lang['strgroupdroppedbad'] = '&#201;chec lors de la suppression du groupe.';
	$lang['strmembers'] = 'Membres';
	$lang['strmemberof'] = 'Membre de';
	$lang['stradminmembers'] = 'Membres admin';
	$lang['straddmember'] = 'Ajouter un membre';
	$lang['strmemberadded'] = 'Membre ajout&#233;.';
	$lang['strmemberaddedbad'] = '&#201;chec lors de l\'ajout du membre.';
	$lang['strdropmember'] = 'Supprimer un membre';
	$lang['strconfdropmember'] = '&#202;tes-vous s&#251;r de vouloir supprimer le membre &#171; %s &#187; du groupe &#171; %s &#187; ?';
	$lang['strmemberdropped'] = 'Membre supprim&#233;.';
	$lang['strmemberdroppedbad'] = '&#201;chec lors de la suppression du membre.';

	// Roles
	$lang['strrole'] = 'R&#244;le';
	$lang['strroles'] = 'R&#244;les';
	$lang['strshowallroles'] = 'Afficher tous les r&#244;les';
	$lang['strnoroles'] = 'Aucun r&#244;le trouv&#233;.';
	$lang['strinheritsprivs'] = 'H&#233;rite des droits ?';
	$lang['strcreaterole'] = 'Cr&#233;er un r&#244;le';
	$lang['strcancreaterole'] = 'Peut cr&#233;er un r&#244;le ?';
	$lang['strrolecreated'] = 'R&#244;le cr&#233;&#233;.';
	$lang['strrolecreatedbad'] = '&#201;chec lors de la cr&#233;ation du r&#244;le.';
	$lang['strrolealtered'] = 'R&#244;le modifi&#233;.';
	$lang['strrolealteredbad'] = '&#201;chec lors de la modification du r&#244;le.';
	$lang['strcanlogin'] = 'Peut se connecter ?';
	$lang['strconnlimit'] = 'Limite de connexion';
	$lang['strdroprole'] = 'Supprimer un r&#244;le';
	$lang['strconfdroprole'] = '&#202;tes-vous s&#251;r de vouloir supprimer le r&#244;le &#171; %s &#187; ?';
	$lang['strroledropped'] = 'R&#244;le supprim&#233;.';
	$lang['strroledroppedbad'] = '&#201;chec lors de la suppression du r&#244;le.';
	$lang['strnolimit'] = 'Aucune limite';
	$lang['strnever'] = 'Jamais';
	$lang['strroleneedsname'] = 'Vous devez donner un nom &#224; ce r&#244;le.';

	// Privileges
	$lang['strprivilege'] = 'Droit';
	$lang['strprivileges'] = 'Droits';
	$lang['strnoprivileges'] = 'Cet objet poss&#232;de les droits par d&#233;fault.';
	$lang['strgrant'] = 'Accorder (GRANT)';
	$lang['strrevoke'] = 'R&#233;voquer (REVOKE)';
	$lang['strgranted'] = 'Droits accord&#233;s.';
	$lang['strgrantfailed'] = '&#201;chec lors de l\'octroi des droits.';
	$lang['strgrantbad'] = 'Vous devez sp&#233;cifier au moins un utilisateur ou groupe et au moins un droit.';
	$lang['strgrantor'] = 'Grantor';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Base de donn&#233;es';
	$lang['strdatabases'] = 'Bases de donn&#233;es';
	$lang['strshowalldatabases'] = 'Voir toutes les bases de donn&#233;es';
	$lang['strnodatabases'] = 'Aucune base de donn&#233;es trouv&#233;e.';
	$lang['strcreatedatabase'] = 'Cr&#233;er une base de donn&#233;es';
	$lang['strdatabasename'] = 'Nom de la base de donn&#233;es';
	$lang['strdatabaseneedsname'] = 'Vous devez donner un nom pour votre base de donn&#233;es.';
	$lang['strdatabasecreated'] = 'Base de donn&#233;es cr&#233;&#233;e.';
	$lang['strdatabasecreatedbad'] = '&#201;chec lors de la cr&#233;ation de la base de donn&#233;es.';
	$lang['strconfdropdatabase'] = '&#202;tes-vous s&#251;r de vouloir supprimer la base de donn&#233;es &#171; %s &#187; ?';
	$lang['strdatabasedropped'] = 'Base de donn&#233;es supprim&#233;e.';
	$lang['strdatabasedroppedbad'] = '&#201;chec lors de la suppression de la base de donn&#233;es.';
	$lang['strentersql'] = 'Veuillez saisir ci-dessous la requ&#234;te SQL &#224; ex&#233;cuter :';
	$lang['strsqlexecuted'] = 'Requ&#234;te SQL ex&#233;cut&#233;e.';
	$lang['strvacuumgood'] = 'Vacuum ex&#233;cut&#233;.';
	$lang['strvacuumbad'] = '&#201;chec du Vacuum.';
	$lang['stranalyzegood'] = 'Analyse effectu&#233;e.';
	$lang['stranalyzebad'] = '&#201;chec de l\'analyse.';
	$lang['strreindexgood'] = 'R&#233;indexation ex&#233;cut&#233;e.';
	$lang['strreindexbad'] = '&#201;chec de la r&#233;indexation.';
	$lang['strfull'] = 'Int&#233;gral (FULL)';
	$lang['strfreeze'] = 'Freeze';
	$lang['strforce'] = 'Forcer';
	$lang['strsignalsent'] = 'Signal envoy&#233;.';
	$lang['strsignalsentbad'] = '&#201;chec lors de l\'envoi du signal.';
	$lang['strallobjects'] = 'Tous les objets';
	$lang['strdatabasealtered'] = 'Base de donn&#233;es modifi&#233;e.';
	$lang['strdatabasealteredbad'] = '&#201;chec lors de la modification de la base de donn&#233;es.';
	$lang['strspecifydatabasetodrop'] = 'Vous devez sp&#233;cifier au moins une base de donn&#233;es &#224; supprimer';
	$lang['strtemplatedb'] = 'Mod&#232;le';
	$lang['strconfanalyzedatabase'] = '&#202;tes vous s&#251;r de vouloir &#233;ffectuer un ANALYZE sur toutes les tables de la base de donn&#233;es &#171; %s &#187; ?';
	$lang['strconfvacuumdatabase'] = '&#202;tes vous s&#251;r de vouloir &#233;ffectuer un VACUUM sur toutes les tables de la base de donn&#233;es &#171; %s &#187; ?';
	$lang['strconfreindexdatabase'] = '&#202;tes vous s&#251;r de vouloir r&#233;indexer toutes les tables de la base de donn&#233;es &#171; %s &#187; ?';
	$lang['strconfclusterdatabase'] = '&#202;tes vous s&#251;r de vouloir &#233;ffectuer un CLUSTER sur toutes les tables de la base de donn&#233;es &#171; %s &#187; ?';

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
	$lang['strviewneedsfields'] = 'Vous devez pr&#233;ciser les colonnes que vous voulez s&#233;lectionner dans votre vue.';
	$lang['strviewcreated'] = 'Vue cr&#233;&#233;e.';
	$lang['strviewcreatedbad'] = '&#201;chec lors de la cr&#233;ation de la vue.';
	$lang['strconfdropview'] = '&#202;tes-vous s&#251;r de vouloir supprimer la vue &#171; %s &#187; ?';
	$lang['strviewdropped'] = 'Vue supprim&#233;e.';
	$lang['strviewdroppedbad'] = '&#201;chec lors de la suppression de la vue.';
	$lang['strviewupdated'] = 'Vue mise &#224; jour.';
	$lang['strviewupdatedbad'] = '&#201;chec lors de la mise &#224; jour de la vue.';
	$lang['strviewlink'] = 'Cl&#233;s li&#233;es';
	$lang['strviewconditions'] = 'Conditions suppl&#233;mentaires';
	$lang['strcreateviewwiz'] = 'Cr&#233;er une vue avec l\'assistant';
	$lang['strrenamedupfields'] = 'Renommer les champs dupliqu&#233;s';
	$lang['strdropdupfields'] = 'Ignorer les champs dupliqu&#233;s';
	$lang['strerrordupfields'] = 'Erreur en cas de champs dupliqu&#233;s';
	$lang['strviewaltered'] = 'Vue modifi&#233;e.';
	$lang['strviewalteredbad'] = '&#201;chec lors de la modification de la vue.';
	$lang['strspecifyviewtodrop'] = 'Vous devez sp&#233;cifier au moins une vue &#224; supprimer.';

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
	$lang['strrestartvalue'] = 'Valeur de red&#233;marrage';
	$lang['strmaxvalue'] = 'Valeur maximale';
	$lang['strminvalue'] = 'Valeur minimale';
	$lang['strcachevalue'] = 'Valeur de cache';
	$lang['strlogcount'] = 'Comptage';
	$lang['strcancycle'] = 'Peut boucler?';
	$lang['striscalled'] = 'Incr&#233;mentera la derni&#232;re valeur avant de retourner la prochaine valeur (is_called) ?';
	$lang['strsequenceneedsname'] = 'Vous devez sp&#233;cifier un nom pour votre s&#233;quence.';
	$lang['strsequencecreated'] = 'S&#233;quence cr&#233;&#233;e.';
	$lang['strsequencecreatedbad'] = '&#201;chec lors de la cr&#233;ation de la s&#233;quence.'; 
	$lang['strconfdropsequence'] = '&#202;tes-vous s&#251;r de vouloir supprimer la s&#233;quence &#171; %s &#187; ?';
	$lang['strsequencedropped'] = 'S&#233;quence supprim&#233;e.';
	$lang['strsequencedroppedbad'] = '&#201;chec lors de la suppression de la s&#233;quence.';
	$lang['strsequencerestart'] = 'S&#233;quence red&#233;marr&#233;e.';
	$lang['strsequencerestartbad'] = '&#201;chec tu red&#233;marrage de la s&#233;quence.';
	$lang['strsequencereset'] = 'S&#233;quence initialis&#233;e.';
	$lang['strsequenceresetbad'] = '&#201;chec lors de l\'initialisation de la s&#233;quence.';
	$lang['strsequencealtered'] = 'S&#233;quence modifi&#233;e.';
	$lang['strsequencealteredbad'] = '&#201;chec lors de la modification de la s&#233;quence.';
	$lang['strsetval'] = 'Initialiser &#224; une valeur';
	$lang['strsequencesetval'] = 'S&#233;quence initialis&#233;e.';
	$lang['strsequencesetvalbad'] = '&#201;chec lors de l\'initialisation de la s&#233;quence.';
	$lang['strnextval'] = 'Incr&#233;menter la valeur';
	$lang['strsequencenextval'] = 'S&#233;quence incr&#233;ment&#233;e.';
	$lang['strsequencenextvalbad'] = '&#201;chec lors de l\'incr&#233;mentation de la valeur.';
	$lang['strspecifysequencetodrop'] = 'Vous devez sp&#233;cifier au moins une s&#233;quence &#224; supprimer.';

	// Indexes
	$lang['strindex'] = 'Index';
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
	$lang['strindexcreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'index.';
	$lang['strconfdropindex'] = '&#202;tes-vous s&#251;r de vouloir supprimer l\'index &#171; %s &#187; ?';
	$lang['strindexdropped'] = 'Index supprim&#233;.';
	$lang['strindexdroppedbad'] = '&#201;chec lors de la suppression de l\'index.';
	$lang['strkeyname'] = 'Nom de la cl&#233;';
	$lang['struniquekey'] = 'Cl&#233; unique';
	$lang['strprimarykey'] = 'Cl&#233; primaire';
	$lang['strindextype'] = 'Type d\'index';
	$lang['strtablecolumnlist'] = 'Liste des colonnes';
	$lang['strindexcolumnlist'] = 'Liste des colonnes dans l\'index';
	$lang['strclusteredgood'] = 'Cluster effectu&#233;.';
	$lang['strclusteredbad'] = '&#201;chec du cluster.';
	$lang['strconcurrently'] = 'En parall&#232;le';
	$lang['strnoclusteravailable'] = 'La table n\'est pas encore ordonn&#233;e selon un index.';

	// Rules
	$lang['strrules'] = 'R&#232;gles';
	$lang['strrule'] = 'R&#232;gle';
	$lang['strshowallrules'] = 'Voir toutes les r&#232;gles';
	$lang['strnorule'] = 'Aucune r&#232;gle trouv&#233;e.';
	$lang['strnorules'] = 'Aucune r&#232;gle trouv&#233;e.';
	$lang['strcreaterule'] = 'Cr&#233;er une r&#232;gle';
	$lang['strrulename'] = 'Nom de la r&#232;gle';
	$lang['strruleneedsname'] = 'Vous devez indiquer un nom pour votre r&#232;gle.';
	$lang['strrulecreated'] = 'R&#232;gle cr&#233;&#233;e.';
	$lang['strrulecreatedbad'] = '&#201;chec lors de la cr&#233;ation de la r&#232;gle.';
	$lang['strconfdroprule'] = '&#202;tes-vous s&#251;r de vouloir supprimer la r&#232;gle &#171; %s &#187; sur &#171; %s &#187; ?';
	$lang['strruledropped'] = 'R&#232;gle supprim&#233;e.';
	$lang['strruledroppedbad'] = '&#201;chec lors de la suppression de la r&#232;gle.';

	// Constraints
	$lang['strconstraint'] = 'Contrainte';
	$lang['strconstraints'] = 'Contraintes';
	$lang['strshowallconstraints'] = 'Voir toutes les contraintes';
	$lang['strnoconstraints'] = 'Aucune contrainte trouv&#233;e.';
	$lang['strcreateconstraint'] = 'Cr&#233;er une contrainte';
	$lang['strconstraintcreated'] = 'Cr&#233;ation d\'une contrainte.';
	$lang['strconstraintcreatedbad'] = '&#201;chec lors de la cr&#233;ation de la contrainte.';
	$lang['strconfdropconstraint'] = '&#202;tes-vous s&#251;r de vouloir supprimer la contrainte &#171; %s &#187; sur &#171; %s &#187; ?';
	$lang['strconstraintdropped'] = 'Contrainte supprim&#233;e.';
	$lang['strconstraintdroppedbad'] = '&#201;chec lors de la suppression de la contrainte.';
	$lang['straddcheck'] = 'Ajouter une contrainte';
	$lang['strcheckneedsdefinition'] = 'La contrainte a besoin d\'une d&#233;finition.';
	$lang['strcheckadded'] = 'Contrainte ajout&#233;e.';
	$lang['strcheckaddedbad'] = '&#201;chec lors de l\'ajout d\'une contrainte de v&#233;rification (CHECK).';
	$lang['straddpk'] = 'Ajouter une cl&#233; primaire';
	$lang['strpkneedscols'] = 'La cl&#233; primaire n&#233;cessite au moins une colonne.';
	$lang['strpkadded'] = 'Cl&#233; primaire ajout&#233;e.';
	$lang['strpkaddedbad'] = '&#201;chec lors de l\'ajout de la cl&#233; primaire.';
	$lang['stradduniq'] = 'Ajouter une cl&#233; unique';
	$lang['struniqneedscols'] = 'Une cl&#233; unique n&#233;cessite au moins une colonne.';
	$lang['struniqadded'] = 'La cl&#233; unique a &#233;t&#233; ajout&#233;e.';
	$lang['struniqaddedbad'] = '&#201;chec lors de la cr&#233;ation de la cl&#233; unique.';
	$lang['straddfk'] = 'Ajouter une cl&#233; &#233;trang&#232;re';
	$lang['strfkneedscols'] = 'Une cl&#233; &#233;trang&#232;re n&#233;cessite au moins une colonne.';
	$lang['strfkneedstarget'] = 'Une cl&#233; &#233;trang&#232;re n&#233;cessite une table cible.';
	$lang['strfkadded'] = 'La cl&#233; &#233;trang&#232;re a &#233;t&#233; ajout&#233;e.';
	$lang['strfkaddedbad'] = '&#201;chec lors de la cr&#233;ation de la cl&#233; &#233;trang&#232;re.';
	$lang['strfktarget'] = 'Table cible';
	$lang['strfkcolumnlist'] = 'Liste des colonnes de la cl&#233;';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';

	// Functions
	$lang['strfunction'] = 'Fonction';
	$lang['strfunctions'] = 'Fonctions';
	$lang['strshowallfunctions'] = 'Voir toutes les fonctions';
	$lang['strnofunction'] = 'Aucune fonction trouv&#233;e.';
	$lang['strnofunctions'] = 'Aucune fonction trouv&#233;e.';
	$lang['strcreateplfunction'] = 'Cr&#233;er une fonction PL/SQL';
	$lang['strcreateinternalfunction'] = 'Cr&#233;er une fonction interne';
	$lang['strcreatecfunction'] = 'Cr&#233;er une fonction C';
	$lang['strfunctionname'] = 'Nom de la fonction';
	$lang['strreturns'] = 'Valeur de sortie';
	$lang['strproglanguage'] = 'Langage';
	$lang['strfunctionneedsname'] = 'Vous devez indiquer un nom pour votre fonction.';
	$lang['strfunctionneedsdef'] = 'Vous devez indiquer une d&#233;finition pour votre fonction.';
	$lang['strfunctioncreated'] = 'Fonction cr&#233;&#233;e.';
	$lang['strfunctioncreatedbad'] = '&#201;chec lors de la cr&#233;ation de la fonction.';
	$lang['strconfdropfunction'] = '&#202;tes-vous s&#251;r de vouloir supprimer la fonction &#171; %s &#187; ?';
	$lang['strfunctiondropped'] = 'Fonction supprim&#233;e.';
	$lang['strfunctiondroppedbad'] = '&#201;chec lors de la suppression de la fonction.';
	$lang['strfunctionupdated'] = 'Fonction mise &#224; jour.';
	$lang['strfunctionupdatedbad'] = '&#201;chec lors de la mise &#224; jour de la fonction.';
	$lang['strobjectfile'] = 'Fichier objet';
	$lang['strlinksymbol'] = 'Symbole lien';
	$lang['strarguments'] = 'Arguments';
	$lang['strargmode'] = 'Mode';
	$lang['strargtype'] = 'Type';
	$lang['strargadd'] = 'Ajouter un autre argument';
	$lang['strargremove'] = 'Supprimer cet argument';
	$lang['strargnoargs'] = 'Cet fonction ne prend pas d\'arguments.';
	$lang['strargenableargs'] = 'Active les arguments pass&#233;s &#224; cette fonction.';
	$lang['strargnorowabove'] = 'Il doit y avoir une ligne au-dessus de cette ligne.';
	$lang['strargnorowbelow'] = 'Il doit y avoir une ligne en-dessous de cette ligne.';
	$lang['strargraise'] = 'Monter.';
	$lang['strarglower'] = 'Descendre.';
	$lang['strargremoveconfirm'] = '&#202;tes-vous s&#251;r de vouloir supprimer cet argument ? cette op&#233;ration ne peut pas &#234;tre annul&#233;e.';
	$lang['strfunctioncosting'] = 'Co&#251;t de la function';
	$lang['strresultrows'] = 'Lignes de r&#233;sultat';
	$lang['strexecutioncost'] = 'Co&#251;t d\'ex&#233;cution';
	$lang['strspecifyfunctiontodrop'] = 'Vous devez sp&#233;cifier au moins une fonction &#224; supprimer.';

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
	$lang['strtriggercreatedbad'] = '&#201;chec lors de la cr&#233;ation du trigger.';
	$lang['strconfdroptrigger'] = '&#202;tes-vous s&#251;r de vouloir supprimer le trigger &#171; %s &#187; sur &#171; %s &#187; ?';
	$lang['strconfenabletrigger'] = '&#202;tes-vous s&#251;r de vouloir activer le trigger &#171; %s &#187; sur &#171; %s&#187; ?';
	$lang['strconfdisabletrigger'] = '&#202;tes-vous s&#251;r de vouloir d&#233;sactiver le trigger &#171; %s &#187; sur &#171; %s&#187; ?';
	$lang['strtriggerdropped'] = 'Trigger supprim&#233;.';
	$lang['strtriggerdroppedbad'] = '&#201;chec lors de la suppression du trigger.';
	$lang['strtriggerenabled'] = 'Trigger activ&#233;.';
	$lang['strtriggerenabledbad'] = '&#201;chec lors de l\'activation du trigger.';
	$lang['strtriggerdisabled'] = 'Trigger d&#233;sactiv&#233;.';
	$lang['strtriggerdisabledbad'] = '&#201;chec lors de la d&#233;sactivation du trigger.';
	$lang['strtriggeraltered'] = 'Trigger modifi&#233;.';
	$lang['strtriggeralteredbad'] = '&#201;chec lors de la modification du trigger.';
	$lang['strforeach'] = 'Pour chaque';

	// Types
	$lang['strtype'] = 'Type';
	$lang['strtypes'] = 'Types';
	$lang['strshowalltypes'] = 'Voir tous les types';
	$lang['strnotype'] = 'Aucun type trouv&#233;.';
	$lang['strnotypes'] = 'Aucun type trouv&#233;.';
	$lang['strcreatetype'] = 'Cr&#233;er un type';
	$lang['strcreatecomptype'] = 'Cr&#233;er un type compos&#233;';
	$lang['strcreateenumtype'] = 'Cr&#233;er un type enum';
	$lang['strtypeneedsfield'] = 'Vous devez sp&#233;cifier au moins un champ.';
	$lang['strtypeneedsvalue'] = 'Vous devez sp&#233;cifier au moins une valeur.';
	$lang['strtypeneedscols'] = 'Vous devez sp&#233;cifier un nombre valide de champs.';
	$lang['strtypeneedsvals'] = 'Vous devez sp&#233;cifier un nombre valide de valeurs.';
	$lang['strinputfn'] = 'Fonction d\'entr&#233;e';
	$lang['stroutputfn'] = 'Fonction de sortie';
	$lang['strpassbyval'] = 'Pass&#233;e par valeur ?';
	$lang['stralignment'] = 'Alignement';
	$lang['strelement'] = '&#201;l&#233;ment';
	$lang['strdelimiter'] = 'D&#233;limiteur';
	$lang['strstorage'] = 'Stockage';
	$lang['strfield'] = 'Champ';
	$lang['strnumfields'] = 'Nombre de champs';
	$lang['strnumvalues'] = 'Nombre de valeurs';
	$lang['strtypeneedsname'] = 'Vous devez indiquer un nom pour votre type.';
	$lang['strtypeneedslen'] = 'Vous devez indiquer une longueur pour votre type.';
	$lang['strtypecreated'] = 'Type cr&#233;&#233;';
	$lang['strtypecreatedbad'] = '&#201;chec lors de la cr&#233;ation du type.';
	$lang['strconfdroptype'] = '&#202;tes-vous s&#251;r de vouloir supprimer le type &#171; %s &#187; ?';
	$lang['strtypedropped'] = 'Type supprim&#233;.';
	$lang['strtypedroppedbad'] = '&#201;chec lors de la suppression du type.';
	$lang['strflavor'] = 'Genre';
	$lang['strbasetype'] = 'Base';
	$lang['strcompositetype'] = 'Composite';
	$lang['strpseudotype'] = 'Pseudo';
	$lang['strenum'] = 'Enum';
	$lang['strenumvalues'] = 'Valeurs de l\'enum';

	// Schemas
	$lang['strschema'] = 'Sch&#233;ma';
	$lang['strschemas'] = 'Sch&#233;mas';
	$lang['strshowallschemas'] = 'Voir tous les sch&#233;mas';
	$lang['strnoschema'] = 'Aucun sch&#233;ma trouv&#233;.';
	$lang['strnoschemas'] = 'Aucun sch&#233;ma trouv&#233;.';
	$lang['strcreateschema'] = 'Cr&#233;er un sch&#233;ma';
	$lang['strschemaname'] = 'Nom du sch&#233;ma';
	$lang['strschemaneedsname'] = 'Vous devez indiquer un nom pour votre sch&#233;ma.';
	$lang['strschemacreated'] = 'Sch&#233;ma cr&#233;&#233;';
	$lang['strschemacreatedbad'] = '&#201;chec lors de la cr&#233;ation du sch&#233;ma.';
	$lang['strconfdropschema'] = '&#202;tes-vous s&#251;r de vouloir supprimer le sch&#233;ma &#171; %s &#187; ?';
	$lang['strschemadropped'] = 'Sch&#233;ma supprim&#233;.';
	$lang['strschemadroppedbad'] = '&#201;chec lors de la suppression du sch&#233;ma.';
	$lang['strschemaaltered'] = 'Schema modifi&#233;.';
	$lang['strschemaalteredbad'] = '&#201;chec lors de la modification du sch&#233;ma.';
	$lang['strsearchpath'] = 'Chemin de recherche du sch&#233;ma';
	$lang['strspecifyschematodrop'] = 'Vous devez sp&#233;cifier au moins un sch&#233;ma &#224; supprimer.';

	// Reports
	$lang['strreport'] = 'Rapport';
	$lang['strreports'] = 'Rapports';
	$lang['strshowallreports'] = 'Voir tous les rapports';
	$lang['strnoreports'] = 'Aucun rapport trouv&#233;.';
	$lang['strcreatereport'] = 'Cr&#233;er un rapport';
	$lang['strreportdropped'] = 'Rapport supprim&#233;.';
	$lang['strreportdroppedbad'] = '&#201;chec lors de la suppression du rapport.';
	$lang['strconfdropreport'] = '&#202;tes-vous s&#251;r de vouloir supprimer le rapport &#171; %s &#187; ?';
	$lang['strreportneedsname'] = 'Vous devez indiquer un nom pour votre rapport.';
	$lang['strreportneedsdef'] = 'Vous devez fournir une requ&#234;te SQL pour votre rapport.';
	$lang['strreportcreated'] = 'Rapport sauvegard&#233;.';
	$lang['strreportcreatedbad'] = '&#201;chec lors de la sauvegarde du rapport.';

	// Domains
	$lang['strdomain'] = 'Domaine';
	$lang['strdomains'] = 'Domaines';
	$lang['strshowalldomains'] = 'Voir tous les domaines';
	$lang['strnodomains'] = 'Pas de domaine trouv&#233;.';
	$lang['strcreatedomain'] = 'Cr&#233;er un domaine';
	$lang['strdomaindropped'] = 'Domaine supprim&#233;.';
	$lang['strdomaindroppedbad'] = '&#201;chec lors de la suppression.';
	$lang['strconfdropdomain'] = '&#202;tes-vous sur de vouloir supprimer le domaine &#171; %s &#187; ?';
	$lang['strdomainneedsname'] = 'Vous devez donner un nom pour votre domaine.';
	$lang['strdomaincreated'] = 'Domaine cr&#233;&#233;.';
	$lang['strdomaincreatedbad'] = '&#201;chec lors de la cr&#233;ation du domaine.';
	$lang['strdomainaltered'] = 'Domaine modifi&#233;.';
	$lang['strdomainalteredbad'] = '&#201;chec lors de la modification du domaine.';

	// Operators
	$lang['stroperator'] = 'Op&#233;rateur';
	$lang['stroperators'] = 'Op&#233;rateurs';
	$lang['strshowalloperators'] = 'Voir tous les op&#233;rateurs';
	$lang['strnooperator'] = 'Pas d\'op&#233;rateur trouv&#233;.';
	$lang['strnooperators'] = 'Pas d\'op&#233;rateur trouv&#233;.';
	$lang['strcreateoperator'] = 'Cr&#233;er un op&#233;rateur';
	$lang['strleftarg'] = 'Type de l\'argument de gauche';
	$lang['strrightarg'] = 'Type de l\'argument de droite';
	$lang['strcommutator'] = 'Commutateur';
	$lang['strnegator'] = 'N&#233;gation';
	$lang['strrestrict'] = 'Restriction';
	$lang['strjoin'] = 'Jointure';
	$lang['strhashes'] = 'Hachages';
	$lang['strmerges'] = 'Assemblages';
	$lang['strleftsort'] = 'Tri gauche';
	$lang['strrightsort'] = 'Tri droite';
	$lang['strlessthan'] = 'Plus petit que';
	$lang['strgreaterthan'] = 'Plus grand que';
	$lang['stroperatorneedsname'] = 'Vous devez donner un nom pour votre op&#233;rateur.';
	$lang['stroperatorcreated'] = 'Op&#233;rateur cr&#233;&#233;';
	$lang['stroperatorcreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'op&#233;rateur.';
	$lang['strconfdropoperator'] = '&#202;tes-vous sur de vouloir supprimer l\'op&#233;rateur &#171; %s &#187; ?';
	$lang['stroperatordropped'] = 'Op&#233;rateur supprim&#233;.';
	$lang['stroperatordroppedbad'] = '&#201;chec lors de la suppression de l\'op&#233;rateur.';

	// Casts
	$lang['strcasts'] = 'Conversions';
	$lang['strnocasts'] = 'Aucune conversion trouv&#233;e.';
	$lang['strsourcetype'] = 'Type source';
	$lang['strtargettype'] = 'Type cible';
	$lang['strimplicit'] = 'Implicite';
	$lang['strinassignment'] = 'En affectation';
	$lang['strbinarycompat'] = '(binaire compatible)';

	// Conversions
	$lang['strconversions'] = 'Conversions';
	$lang['strnoconversions'] = 'Aucune conversion trouv&#233;e.';
	$lang['strsourceencoding'] = 'Codage source';
	$lang['strtargetencoding'] = 'Codage cible';

	// Languages
	$lang['strlanguages'] = 'Langages';
	$lang['strnolanguages'] = 'Pas de langage trouv&#233;.';
	$lang['strtrusted'] = 'De confiance';

	// Info
	$lang['strnoinfo'] = 'Pas d\'information disponible.';
	$lang['strreferringtables'] = 'Tables r&#233;f&#233;rentes';
	$lang['strparenttables'] = 'Tables parents';
	$lang['strchildtables'] = 'Tables enfants';

	// Aggregates
	$lang['straggregate'] = 'Agr&#233;gat';
	$lang['straggregates'] = 'Agr&#233;gats';
	$lang['strnoaggregates'] = 'Aucun agr&#233;gat trouv&#233;.';
	$lang['stralltypes'] = '(tous les types)';
	$lang['strcreateaggregate'] = 'Cr&#233;er un agr&#233;gat';
	$lang['straggrbasetype'] = 'Type de donn&#233;es en entr&#233;e';
	$lang['straggrsfunc'] = 'Fonction de transition de l\'&#233;tat';
	$lang['straggrstype'] = 'Type de la valeur de transition';
	$lang['straggrffunc'] = 'Fonction finale';
	$lang['straggrinitcond'] = 'Condition initiale';
	$lang['straggrsortop'] = 'Op&#233;rateur de tri';
	$lang['strconfdropaggregate'] = '&#202;tes-vous s&#251;r de vouloir supprimer l\'agr&#233;gat &#171; %s &#187;?';
	$lang['straggregatedropped'] = 'Agr&#233;gat supprim&#233;.';
	$lang['straggregatedroppedbad'] = '&#201;chec lors de la suppression de l\'agr&#233;gat.';
	$lang['straggraltered'] = 'Agr&#233;gat modifi&#233;.';
	$lang['straggralteredbad'] = '&#201;chec lors de la modification de l\'agr&#233;gat.';
	$lang['straggrneedsname'] = 'Vous devez indiquer un nom pour l\'agr&#233;gat';
	$lang['straggrneedsbasetype'] = 'Vous devez indiquer le type de donn&#233;es en entr&#233;e pour l\'agr&#233;gat';
	$lang['straggrneedssfunc'] = 'Vous devez indiquer le nom de la fonction de transition de l\'agr&#233;gat';
	$lang['straggrneedsstype'] = 'Vous devez indiquer le type de donn&#233;e pour la valeur d\'&#233;tat pour l\'agr&#233;gat';
	$lang['straggrcreated'] = 'Agr&#233;gat cr&#233;&#233;.';
	$lang['straggrcreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'agr&#233;gat.';
	$lang['straggrshowall'] = 'Afficher tous les agr&#233;gats';

	// Operator Classes
	$lang['stropclasses'] = 'Classes d\'op&#233;rateur';
	$lang['strnoopclasses'] = 'Aucune classe d\'op&#233;rateur trouv&#233;e.';
	$lang['straccessmethod'] = 'M&#233;thode d\'acc&#232;s';

	// Stats and performance
	$lang['strrowperf'] = 'Performance des enregistrements';
	$lang['strioperf'] = 'Performance en entr&#233;e/sortie';
	$lang['stridxrowperf'] = 'Performance des index';
	$lang['stridxioperf'] = 'Performance des index en entr&#233;es/sortie';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'S&#233;quentiel';
	$lang['strscan'] = 'Parcours';
	$lang['strread'] = 'Lecture';
	$lang['strfetch'] = 'R&#233;cup&#233;ration';
	$lang['strheap'] = 'En-t&#234;te';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'Index TOAST';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disque';
	$lang['strrows2'] = 'Enregistrements';

	// Tablespaces
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespaces';
	$lang['strshowalltablespaces'] = 'Voir tous les tablespaces';
	$lang['strnotablespaces'] = 'Aucun tablespace trouv&#233;.';
	$lang['strcreatetablespace'] = 'Cr&#233;er un tablespace';
	$lang['strlocation'] = 'Emplacement';
	$lang['strtablespaceneedsname'] = 'Vous devez donner un nom &#224; votre tablespace.';
	$lang['strtablespaceneedsloc'] = 'Vous devez pr&#233;ciser un r&#233;pertoire dans lequel sera cr&#233;&#233; le tablespace.';
	$lang['strtablespacecreated'] = 'Tablespace cr&#233;&#233;.';
	$lang['strtablespacecreatedbad'] = '&#201;chec lors de la cr&#233;ation du tablespace.';
	$lang['strconfdroptablespace'] = '&#202;tes-vous s&#251;r de vouloir supprimer le tablespace &#171; %s &#187; ?';
	$lang['strtablespacedropped'] = 'Tablespace supprim&#233;.';
	$lang['strtablespacedroppedbad'] = '&#201;chec lors de la suppression du tablespace.';
	$lang['strtablespacealtered'] = 'Tablespace modifi&#233;.';
	$lang['strtablespacealteredbad'] = '&#201;chec lors de la modification du tablespace.';

	// Slony clusters
	$lang['strcluster'] = 'Cluster';
	$lang['strnoclusters'] = 'Aucun cluster trouv&#233;.';
	$lang['strconfdropcluster'] = '&#202;tesvous s&#251;r de vouloir supprimer le cluster &#171; %s &#187; ?';
	$lang['strclusterdropped'] = 'Cluster supprim&#233;.';
	$lang['strclusterdroppedbad'] = '&#201;chec lors de la suppression du cluster.';
	$lang['strinitcluster'] = 'Initialiser le cluster';
	$lang['strclustercreated'] = 'Cluster initialis&#233;.';
	$lang['strclustercreatedbad'] = '&#201;chec lors de l\'initialisation du cluster.';
	$lang['strclusterneedsname'] = 'Vous devez donner un nom au cluster.';
	$lang['strclusterneedsnodeid'] = 'Vous devez donner un ID au noeud local.';

	// Slony nodes
	$lang['strnodes'] = 'Noeuds';
	$lang['strnonodes'] = 'Aucun noeud trouv&#233;.';
	$lang['strcreatenode'] = 'Cr&#233;er un noeud';
	$lang['strid'] = 'ID';
	$lang['stractive'] = 'Actif';
	$lang['strnodecreated'] = 'Noeud cr&#233;&#233;.';
	$lang['strnodecreatedbad'] = '&#201;chec lors de la cr&#233;ation du noeud.';
	$lang['strconfdropnode'] = '&#202;tes-vous s&#251;r de vouloir supprimer le noeud &#171; %s &#187; ?';
	$lang['strnodedropped'] = 'Noeud supprim&#233;.';
	$lang['strnodedroppedbad'] = '&#201;chec lors de la suppression du noeud';
	$lang['strfailover'] = 'Basculer (failover)';
	$lang['strnodefailedover'] = 'Node bascul&#233;.';
	$lang['strnodefailedoverbad'] = '&#201;chec lors du basculement du noeud.';
	$lang['strstatus'] = 'Statut';	
	$lang['strhealthy'] = '&#201;tat';
	$lang['stroutofsync'] = 'Hors synchro';
	$lang['strunknown'] = 'Inconnu';

	// Slony paths 
	$lang['strpaths'] = 'Chemins';
	$lang['strnopaths'] = 'Aucun chemin trouv&#233;.';
	$lang['strcreatepath'] = 'Cr&#233;er un chemin';
	$lang['strnodename'] = 'Nom du noeud';
	$lang['strnodeid'] = 'ID du noeud';
	$lang['strconninfo'] = 'Cha&#238;ne de connexion';
	$lang['strconnretry'] = 'Secondes avant une nouvelle tentative de connexion';
	$lang['strpathneedsconninfo'] = 'Vous devez donner une cha&#238;ne de connexion pour le chemin.';
	$lang['strpathneedsconnretry'] = 'Vous devez donner le nombre de secondes d\'attente avant une nouvelle tentative de connexion.';
	$lang['strpathcreated'] = 'Chemin cr&#233;&#233;.';
	$lang['strpathcreatedbad'] = '&#201;chec lors de la cr&#233;ation du chemin.';
	$lang['strconfdroppath'] = '&#202;tes-vous s&#251;r de vouloir supprimer le chemin &#171; %s &#187; ?';
	$lang['strpathdropped'] = 'Chemin supprim&#233;.';
	$lang['strpathdroppedbad'] = '&#201;chec lors de la suppression du chemin.';

	// Slony listens
	$lang['strlistens'] = '&#201;coutes';
	$lang['strnolistens'] = 'Aucune &#233;coute trouv&#233;e.';
	$lang['strcreatelisten'] = 'Cr&#233;er une &#233;coute';
	$lang['strlistencreated'] = '&#201;coute cr&#233;&#233;e.';
	$lang['strlistencreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'&#233;coute.';
	$lang['strconfdroplisten'] = '&#202;tes-vous s&#251;r de vouloir supprimer l\'&#233;coute &#171; %s &#187; ?';
	$lang['strlistendropped'] = '&#201;coute supprim&#233;.';
	$lang['strlistendroppedbad'] = '&#201;chec lors de la suppression de l\'&#233;coute.';

	// Slony replication sets
	$lang['strrepsets'] = 'Ensembles de r&#233;plication';
	$lang['strnorepsets'] = 'Aucun ensemble de r&#233;plication trouv&#233;.';
	$lang['strcreaterepset'] = 'Cr&#233;er un ensemble de r&#233;plication';
	$lang['strrepsetcreated'] = 'Ensemble de r&#233;plication cr&#233;&#233;.';
	$lang['strrepsetcreatedbad'] = '&#201;chec lors de la cr&#233;ation de l\'ensemble de r&#233;plication.';
	$lang['strconfdroprepset'] = '&#202;tes-vous s&#251;r de vouloir supprimer l\'ensemble de r&#233;plication &#171; %s &#187; ?';
	$lang['strrepsetdropped'] = 'Ensemble de r&#233;plication supprim&#233;.';
	$lang['strrepsetdroppedbad'] = '&#201;chec lors de la suppression de l\'ensemble de r&#233;plication.';
	$lang['strmerge'] = 'Assemblage';
	$lang['strmergeinto'] = 'Assembler dans';
	$lang['strrepsetmerged'] = 'Ensembles de r&#233;plication assembl&#233;s.';
	$lang['strrepsetmergedbad'] = '&#201;chec lors de l\'assemblage des ensembles de r&#233;plication.';
	$lang['strmove'] = 'D&#233;placement';
	$lang['strneworigin'] = 'Nouvelle origine';
	$lang['strrepsetmoved'] = 'Ensemble de r&#233;plication d&#233;plac&#233;.';
	$lang['strrepsetmovedbad'] = '&#201;chec lors du d&#233;placement de l\'ensemble de r&#233;plication.';
	$lang['strnewrepset'] = 'Nouvel ensemble de r&#233;plication';
	$lang['strlock'] = 'Verrou';
	$lang['strlocked'] = 'Verrouill&#233;';
	$lang['strunlock'] = 'D&#233;verrouill&#233;';
	$lang['strconflockrepset'] = '&#202;tes-vous s&#251;r de vouloir verrouiller l\'ensemble de r&#233;plication &#171; %s &#187; ?';
	$lang['strrepsetlocked'] = 'Ensemble de r&#233;plication verrouill&#233;.';
	$lang['strrepsetlockedbad'] = '&#201;chec lors du verrouillage de l\'ensemble de r&#233;plication.';
	$lang['strconfunlockrepset'] = '&#202;tes-vous s&#251;r de vouloir d&#233;verrouiller l\'ensemble de r&#233;plication &#171; %s &#187; ?';
	$lang['strrepsetunlocked'] = 'Ensemble de r&#233;plication d&#233;verrouill&#233;.';
	$lang['strrepsetunlockedbad'] = '&#201;chec lors du d&#233;verrouillage de l\'ensemble de r&#233;plication.';
	$lang['stronlyonnode'] = 'Seulement sur le noeud';
	$lang['strddlscript'] = 'Script DDL';
	$lang['strscriptneedsbody'] = 'Vous devez fournir un script &#224; ex&#233;cuter sur tous les noeuds.';
	$lang['strscriptexecuted'] = 'Script DDL de l\'ensemble de r&#233;plication ex&#233;cut&#233;.';
	$lang['strscriptexecutedbad'] = '&#201;chec lors de l\'ex&#233;cution du script DDL de l\'ensemble de r&#233;plication.';
	$lang['strtabletriggerstoretain'] = 'Les triggers suivants ne seront PAS d&#233;sactiv&#233;s par Slony:';

	// Slony tables in replication sets
	$lang['straddtable'] = 'Ajouter une table';
	$lang['strtableneedsuniquekey'] = 'La table &#224; ajouter doit avoir une cl&#233; primaire ou une cl&#233; unique.';
	$lang['strtableaddedtorepset'] = 'Table ajouter &#224; l\'ensemble de r&#233;plication.';
	$lang['strtableaddedtorepsetbad'] = '&#201;chec lors de l\'ajout de la table dans l\'ensemble de r&#233;plication.';
	$lang['strconfremovetablefromrepset'] = '&#202;tes-vous s&#251;r de vouloir supprimer la table &#171; %s &#187; de l\'ensemble de r&#233;plication &#171; %s &#187; ?';
	$lang['strtableremovedfromrepset'] = 'Table supprim&#233;e de l\'ensemble de r&#233;plication.';
	$lang['strtableremovedfromrepsetbad'] = '&#201;chec lors de la suppression de la table de l\'ensemble de r&#233;plication.';

	// Slony sequences in replication sets
	$lang['straddsequence'] = 'Ajouter une s&#233;quence';
	$lang['strsequenceaddedtorepset'] = 'S&#233;quence ajout&#233;e &#224; l\'ensemble de r&#233;plication.';
	$lang['strsequenceaddedtorepsetbad'] = '&#201;chec lors de l\'ajout de la s&#233;quence &#224; l\'ensemble de r&#233;plication.';
	$lang['strconfremovesequencefromrepset'] = '&#202;tes-vous s&#251;r de vouloir supprimer la s&#233;quence &#171; %s &#187; de l\'ensemble de r&#233;plication &#171; %s &#187;?';
	$lang['strsequenceremovedfromrepset'] = 'S&#233;quence supprim&#233;e de l\'ensemble de r&#233;plication.';
	$lang['strsequenceremovedfromrepsetbad'] = '&#201;chec lors de la suppression de la s&#233;quence &#224; partir de l\'ensemble de r&#233;plication.';

	// Slony subscriptions
	$lang['strsubscriptions'] = 'Souscriptions';
	$lang['strnosubscriptions'] = 'Aucune souscription trouv&#233;e.';

	// Miscellaneous
	$lang['strtopbar'] = '%s lanc&#233; sur %s:%s -- Vous &#234;tes connect&#233; avec le profil &#171; %s &#187;';
	$lang['strtimefmt'] = 'j M Y, H:i';
	$lang['strhelp'] = 'Aide';
	$lang['strhelpicon'] = '?';
	$lang['strhelppagebrowser'] = 'Navigateur pour l\'aide';
	$lang['strselecthelppage'] = 'S&#233;lectionner une page d\'aide';
	$lang['strinvalidhelppage'] = 'Page d\'aide invalide.';
	$lang['strlogintitle'] = 'Se connecter &#224; %s';
	$lang['strlogoutmsg'] = 'D&#233;connect&#233; de %s';
	$lang['strloading'] = 'Chargement...';
	$lang['strerrorloading'] = 'Erreur lors du chargement';
	$lang['strclicktoreload'] = 'Cliquer pour recharger';

	//Autovacuum
	$lang['strautovacuum'] = 'Autovacuum';
	$lang['strturnedon'] = 'Activ&#233;'; 
	$lang['strturnedoff'] = 'D&#233;sactiv&#233;'; 
	$lang['strenabled'] = 'activ&#233;';
	$lang['strnovacuumconf'] = 'Aucune configuration autovacuum trouv&#233;e.';
	$lang['strvacuumbasethreshold'] = 'Limite de base pour le Vacuum';
	$lang['strvacuumscalefactor'] = 'Facteur d\'&#233;chelle pour le Vacuum';
	$lang['stranalybasethreshold'] = 'Limite de base pour le Analyze';
	$lang['stranalyzescalefactor'] = 'Facteur d\'&#233;chelle pour le Analyze';
	$lang['strvacuumcostdelay'] = 'D&#233;lai du co&#251;t du Vacuum';
	$lang['strvacuumcostlimit'] = 'Limite du co&#251;t du Vacuum';
	$lang['strvacuumpertable'] = 'Configuration autovacuum par table';
	$lang['straddvacuumtable'] = 'Configurer autovacuum pour cette table';
	$lang['streditvacuumtable'] = 'Modifier la configuration autovacuum pour la table &#171; %s &#187;';
	$lang['strdelvacuumtable'] = 'Supprimer la configuration autovacuum pour la table &#171; %s &#187; ?';
	$lang['strvacuumtablereset'] = 'Configuration autovacuum par d&#233;faut pour la table &#171; %s &#187;.';
	$lang['strdelvacuumtablefail'] = '&#201;chec lors de la suppression de la configuration autovacuumpour la table &#171; %s &#187;';
	$lang['strsetvacuumtablesaved'] = 'Configuration autovacuum pour la table &#171; %s &#187; enregistr&#233;e.';
	$lang['strsetvacuumtablefail'] = '&#201;chec de la configuration autovacuum pour la table &#171; %s &#187;.';
	$lang['strspecifydelvacuumtable'] = 'Vous devez sp&#233;cifier la table o&#249; supprimer les param&#232;tres autovacuum.';
	$lang['strspecifyeditvacuumtable'] = 'Vous devez sp&#233;cifier la table o&#249; &#233;diter les param&#232;tres autovacuum.';
	$lang['strnotdefaultinred'] = 'Valeurs diff&#233;rentes de celles par d&#233;faut en rouge.';

	//Table-level Locks
	$lang['strlocks'] = 'Verrous';
	$lang['strtransaction'] = 'ID de transaction';
	$lang['strvirtualtransaction'] = 'ID Virtuel de Transaction';
	$lang['strprocessid'] = 'ID du processus';
	$lang['strmode'] = 'Mode du verrou';
	$lang['strislockheld'] = 'Verrou d&#233;tenu ?';

	// Prepared transactions
	$lang['strpreparedxacts'] = 'Transactions pr&#233;par&#233;es';
	$lang['strxactid'] = 'ID de transaction';
	$lang['strgid'] = 'ID global';

	// Fulltext search
	$lang['strfulltext'] = 'Recherche textuelle';
	$lang['strftsconfig'] = 'Configuration FTS';
	$lang['strftsconfigs'] = 'Configurations';
	$lang['strftscreateconfig'] = 'Cr&#233;er une configuration FTS';
	$lang['strftscreatedict'] = 'Cr&#233;er un dictionnaire';
	$lang['strftscreatedicttemplate'] = 'Cr&#233;er un mod&#232;le de dictionnaire';
	$lang['strftscreateparser'] = 'Cr&#233;er un analyseur syntaxique';
	$lang['strftsnoconfigs'] = 'Aucune configuration FTS trouv&#233;e.';
	$lang['strftsconfigdropped'] = 'Configuration FTS supprim&#233;e.';
	$lang['strftsconfigdroppedbad'] = '&#201;chec lors de la suppression de la configuration FTS.';
	$lang['strconfdropftsconfig'] = '&#202;tes-vous s&#251;r de vouloir supprimer la configuration FTS &#171; %s &#187; ?';
	$lang['strconfdropftsdict'] = '&#202;tes-vous s&#251;r de vouloir supprimer le dictionnaire FTS &#171; %s &#187; ?';
	$lang['strconfdropftsmapping'] = '&#202;tes-vous s&#251;r de vouloir supprimer le mapping &#171; %s &#187; de la configuration FTS &#171; %s &#187; ?';
	$lang['strftstemplate'] = 'Mod&#232;le';
	$lang['strftsparser'] = 'Analyseur syntaxique';
	$lang['strftsconfigneedsname'] = 'Vous devez donner un nom pour votre configuration FTS.';
	$lang['strftsconfigcreated'] = 'Configuration FTS cr&#233;&#233;e';
	$lang['strftsconfigcreatedbad'] = '&#201;chec lors de la cr&#233;ation de la configuration FTS.';
	$lang['strftsmapping'] = 'Type de jeton';
	$lang['strftsdicts'] = 'Dictionaires';
	$lang['strftsdict'] = 'Dictionaire';
	$lang['strftsemptymap'] = 'Aucune liaisons configur&#233;e.';
	$lang['strftsconfigaltered'] = 'Configuration FTS modifi&#233;e.';
	$lang['strftsconfigalteredbad'] = '&#201;chec lors de l\'&#233;dition de la configuration FTS.';
	$lang['strftsconfigmap'] = 'Configuration des liaisons type de jeton / dictionnaires';
	$lang['strftsparsers'] = 'Analyseurs syntaxique FTS';
	$lang['strftsnoparsers'] = 'Aucun analyseur syntaxique FTS disponnible.';
	$lang['strftsnodicts'] = 'Aucun dictionnaire FTS disponible.';
	$lang['strftsdictcreated'] = 'Dictionnaire FTS cr&#233;&#233;';
	$lang['strftsdictcreatedbad'] = '&#201;chec lors de la cr&#233;ation du dictionnaire FTS.';
	$lang['strftslexize'] = 'Lexize';
	$lang['strftsinit'] = 'Init';
	$lang['strftsoptionsvalues'] = 'Options et Valeurs';
	$lang['strftsdictneedsname'] = 'Vous devez donner un nom pour votre dictionnaire FTS.';
	$lang['strftsdictdropped'] = 'Dictionnaire FTS supprim&#233;.';
	$lang['strftsdictdroppedbad'] = '&#201;chec lors de la suppression du dictionnaire FTS.';
	$lang['strftsdictaltered'] = 'Dictionnaire FTS modifi&#233;.';
	$lang['strftsdictalteredbad'] = '&#201;chec lors de l\'&#233;dition du dictionnaire FTS.';
	$lang['strftsaddmapping'] = 'Ajouter une nouvelle liaison';
	$lang['strftsspecifymappingtodrop'] = 'Vous devez sp&#233;cifier au moins une liaison &#224; suppimer.';
	$lang['strftsspecifyconfigtoalter'] = 'Vous devez sp&#233;cifier une configuration FTS &#224; modifier';
	$lang['strftsmappingdropped'] = 'Laison supprim&#233;e.';
	$lang['strftsmappingdroppedbad'] = '&#201;chec lors de la suppression de la liaison.';
	$lang['strftsnodictionaries'] = 'Aucun dictionnaire trouv&#233;.';
	$lang['strftsmappingaltered'] = 'Liaison modifi&#233;e.';
	$lang['strftsmappingalteredbad'] = '&#201;chec lors de la modification de la liaison.';
	$lang['strftsmappingadded'] = 'Liaison ajout&#233;e.';
	$lang['strftsmappingaddedbad'] = '&#201;chec lors de la suppression de la liaison.';
	$lang['strftstabconfigs'] = 'Configurations';
	$lang['strftstabdicts'] = 'Dictionaires';
	$lang['strftstabparsers'] = 'Analyseurs syntaxique';
	$lang['strftscantparsercopy'] = 'Vous ne pouvez sp&#233;cifier en m&#234;me temps un mod&#232;le et un analyseur lors de la cr&#233;ation d\'une configuration FTS.';
?>
