-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 05 Mai 2016 à 08:20
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_site_prixy`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `ref_form` varchar(4) NOT NULL DEFAULT '',
  `id_categ` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`ref_form`, `id_categ`) VALUES
('B200', 'CA01'),
('B201', 'CA01'),
('B202', 'CA01'),
('B203', 'CA01'),
('B204', 'CA01'),
('C001', 'CA02'),
('CPP1', 'CA02'),
('CSH1', 'CA02'),
('DEV0', 'CA02'),
('OB01', 'CA02'),
('PY01', 'CA02'),
('BOSX', 'CA03'),
('BW08', 'CA03'),
('BW10', 'CA03'),
('TUX1', 'CA03'),
('SQL1', 'CA04'),
('SQL2', 'CA04');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categ` varchar(4) NOT NULL DEFAULT '',
  `nom_categ` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categ`, `nom_categ`) VALUES
('CA00', 'Toutes Catégories'),
('CA01', 'Bureautique'),
('CA02', 'Langages de programmation'),
('CA03', 'Systèmes d''exploitation'),
('CA04', 'Bases de données'),
('CA05', 'Le développement web');

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE IF NOT EXISTS `certification` (
  `id_certif` varchar(4) NOT NULL DEFAULT '',
  `lib_certif` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `certification`
--

INSERT INTO `certification` (`id_certif`, `lib_certif`) VALUES
('C000', 'Aucune certification'),
('C001', 'TOSA Excel - Niveau Basique'),
('C002', 'TOSA Excel – Niveau Avancé (en option au prix de 70 euros)'),
('C003', 'TOSA Excel – Niveau Opérationnel (en option au prix de 70€)'),
('C004', 'LPI100 (Linux Professional Institute 101)');

-- --------------------------------------------------------

--
-- Structure de la table `delivrer`
--

CREATE TABLE IF NOT EXISTS `delivrer` (
  `ref_form` varchar(4) NOT NULL DEFAULT '',
  `id_certif` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `delivrer`
--

INSERT INTO `delivrer` (`ref_form`, `id_certif`) VALUES
('B200', 'C000'),
('B202', 'C000'),
('BOSX', 'C000'),
('BW08', 'C000'),
('BW10', 'C000'),
('C001', 'C000'),
('CPP1', 'C000'),
('CSH1', 'C000'),
('DEV0', 'C000'),
('OB01', 'C000'),
('PY01', 'C000'),
('SQL1', 'C000'),
('SQL2', 'C000'),
('B201', 'C001'),
('B203', 'C002'),
('B204', 'C003'),
('TUX1', 'C004');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `ref_form` varchar(4) NOT NULL DEFAULT '',
  `nom_from` varchar(200) DEFAULT NULL,
  `tarif` float DEFAULT NULL,
  `duree_form` float DEFAULT NULL,
  `type_public` varchar(180) DEFAULT NULL,
  `logo_form` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`ref_form`, `nom_from`, `tarif`, `duree_form`, `type_public`, `logo_form`) VALUES
('B200', 'FORMATION EXCEL - INITIATION : LES BASES POUR DÉBUTER EXCEL', 260, 1, 'Débutant désirant utiliser Excel pour construire des tableaux et réaliser des calculs', 'images/excel.png'),
('B201', 'FORMATION EXCEL - LES BASES : TABLEAUX, GRAPHIQUES ET CALCULS FONDAMENTAUX', 620, 2, 'Amateur souhaitant devenir autonome sur Excel', 'images/excel.png'),
('B202', 'FORMATION EXCEL - GRAPHIQUES AVANCÉS', 260, 1, 'Pro qui souhaitent visualiser des données chiffrées sous forme graphique', 'images/excel.png'),
('B203', 'FORMATION EXCEL - EXPLOITATION DE DONNÉES ET TCD', 520, 2, 'Pro Avancé d’Excel qui souhaitent maîtriser les fonctions avancées d’exploitation de données', 'images/excel.png'),
('B204', 'FORMATION EXCEL - CALCULS AVANCÉS ET STATISTIQUES', 520, 2, 'Expert amené à exploiter des résultats chiffrés dans le cadre de leur fonction', 'images/excel.png'),
('BOSX', 'FORMATION PRISE EN MAIN DE MAC OS X (sur Paris :D)', 1275, 2, 'Débutant utilisant régulièrement le Macintosh dans un environnement professionnel et souhaitant acquérir les connaissances de base', 'images/macosx.jpg'),
('BW08', 'FORMATION PRISE EN MAIN DE WINDOWS 8.1', 260, 1, 'Débutant souhaitant travailler de manière efficace avec l''environnement Windows 8.1', 'images/w8.1.png'),
('BW10', 'FORMATION PRISE EN MAIN DE WINDOWS 10 ', 260, 1, 'Débutant souhaitant travailler de manière efficace avec l''environnement Windows 10', 'images/w10.png'),
('C001', 'FORMATION DÉVELOPPER AVEC AVEC LE LANGAGE C (sur Paris :D)', 2370, 5, 'Amateur : développeur d''applications et ingénieur systèmes Unix', 'images/c.png'),
('CPP1', 'FORMATION DÉVELOPPER PROGRAMMATION EN C++ (sur Paris :D)', 2390, 5, 'Amateur : développeur ou concepteur de programmes', 'images/cpp.jpg'),
('CSH1', 'FORMATION L''ESSENTIEL DU C# ET DE L''ACCES AUX DONNÉES AVEC VISUAL STUDIO 2010 (sur Paris :D)', 4690, 10, 'Pro : développeur .Net connaissant le C, C++, Java, VB...', 'images/csharp.png'),
('DEV0', 'FORMATION INITIATION A LA PROGRAMMATION', 1550, 3, 'Débutant désirant se préparer à l’apprentissage d’un langage de programmation ou disposer tout simplement d’une vue générale sur la programmation', 'images/langages.jpg'),
('OB01', 'FORMATION LA CONCEPTION ORIENTÉ OBJET (sur Paris :D)', 1830, 3, 'Amateur développeur et analyste programmeur souhaitant évoluer vers l''Objet ou chefs de projets', 'images/orienteobjet.jpg'),
('PY01', 'FORMATION DÉVELOPPER AVEC PYTHON (sur Paris :D)', 2040, 4, 'Amateur : développeur ou administrateur système et réseau avec connaissance an algorithme', 'images/python.png'),
('SQL1', 'FORMATION L''ESSSENTIEL DES BASES DE DONNÉES', 1330, 2, 'Débutant désirant comprendre le monde des bases de données', 'images/sql.png'),
('SQL2', 'FORMATION INTERROGER DES BASES DE DONNÉES AVEC LE LANGAGE SQL', 1630, 3, 'Amateur intervenant sur un serveur de bases de données ou futurs administrateurs de bases de données', 'images/sql.png'),
('TUX1', 'FORMATION LINUX - COMMANDES DE BASE', 1690, 3, 'Débutant amené à utiliser cet environnement ou développeur en environnement Unix ou Linux', 'images/tux.png');

-- --------------------------------------------------------

--
-- Structure de la table `necessiter`
--

CREATE TABLE IF NOT EXISTS `necessiter` (
  `ref_form` varchar(4) NOT NULL DEFAULT '',
  `ref_form_FORMATION` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `necessiter`
--

INSERT INTO `necessiter` (`ref_form`, `ref_form_FORMATION`) VALUES
('B201', 'B200'),
('B202', 'B201'),
('B203', 'B201'),
('B204', 'B201'),
('CPP1', 'C001'),
('CSH1', 'OB01');

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

CREATE TABLE IF NOT EXISTS `objectif` (
  `id_objectif` varchar(5) NOT NULL DEFAULT '',
  `lib_objectif` varchar(180) DEFAULT NULL,
  `ref_form` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `objectif`
--

INSERT INTO `objectif` (`id_objectif`, `lib_objectif`, `ref_form`) VALUES
('O001', 'Etre à l''aise avec l''environnement de travail', 'B200'),
('O001', 'Savoir construire des tableaux en soignant leur mise en forme d’une façon immédiate', 'B201'),
('O001', 'Savoir présenter des données chiffrées en utilisant les graphiques les plus adaptés', 'B202'),
('O001', 'Savoir utiliser des filtres avancés pour extraire des données ou éliminer les doublons', 'B203'),
('O001', 'Savoir réaliser des calculs conditionnels (Si, Et/Ou)', 'B204'),
('O001', 'Acquérir les connaissances nécessaires à l''utilisation du système OS X (El Capitan) en contexte professionnel', 'BOSX'),
('O001', 'Découvrir les nouveautés de l''interface "Metro"', 'BW08'),
('O001', 'Comprendre comment configurer et organiser son espace de travail', 'BW10'),
('O001', 'Acquérir les principes de base de la programmation structurée', 'C001'),
('O001', 'Acquérir les principes de base de la programmation Objet (polymorphisme, héritage, encapsulation)', 'CPP1'),
('O001', 'Disposer de solides bases pour développer des applications en C#', 'CSH1'),
('O001', 'Disposer du vocabulaire (source, bibliothèque, compilation, exécution, bug...)', 'DEV0'),
('O001', 'Disposer des connaissances générales nécessaires à l''apprentissage du développement Objet', 'OB01'),
('O001', 'Maîtriser les arcanes d''un développement Python', 'PY01'),
('O001', 'Disposer d''une vision claire de ce qu''est un SGBD', 'SQL1'),
('O001', 'Savoir interroger le contenu des tables sous divers aspects', 'SQL2'),
('O001', 'Acquérir la connaissance des commandes fondamentales des systèmes d''exploitation Unix et Linux à travers des exercices modulaires de difficulté progressive', 'TUX1'),
('O002', 'Savoir construire des tableaux en soignant rapidement leur mise en forme', 'B200'),
('O002', 'Comprendre comment analyser vos résultats à l''aide de différents calculs', 'B201'),
('O002', 'Comprendre comment améliorer la lisibilité d''un graphique', 'B202'),
('O002', 'Être capable de faire des rapprochements de données via le module Query ou en recourant aux différentes fonctions de recherches (Recherche, RechercheV, Index, Equiv)', 'B203'),
('O002', 'Maîtriser la consolidation d’informations (Multi-feuilles, Multi-classeurs)', 'B204'),
('O002', 'Savoir exploiter un logiciel dans cet environnement', 'BOSX'),
('O002', 'Savoir utiliser la "Charm Bar"', 'BW08'),
('O002', 'S''approprier les nouveautés de Windows 10 (vignettes, bureaux virtuels...)', 'BW10'),
('O002', 'Apprendre la syntaxe et les principales fonctions du langage C', 'C001'),
('O002', 'Maîtriser le langage C++', 'CPP1'),
('O002', 'Comprendre comment tirer parti de la puissance du Framework avec C#', 'CSH1'),
('O002', 'Savoir traduire des besoins fonctionnels en algorithmes (boucle, test...)', 'DEV0'),
('O002', 'Comprendre la notion d''Objet et les concepts associés', 'OB01'),
('O002', 'Maîtriser les mécanismes de développement Python', 'PY01'),
('O002', 'Comprendre l''intérêt de modéliser correctement une base de données pour garantir l''intégrité et les performances', 'SQL1'),
('O002', 'Pratiquer le langage interactif SQL dans tout environnement relationnel', 'SQL2'),
('O002', 'Devenir autonome pour une première prise en main d''un système', 'TUX1'),
('O003', 'Comprendre comment réaliser des calculs de base', 'B200'),
('O003', 'Gagner du temps en modifiant simultanément plusieurs tableaux', 'B201'),
('O003', 'Pouvoir créer des modèles de graphiques et de classeur pour gagner du temps', 'B202'),
('O003', 'Comprendre comment créer des tableaux de synthèse (Tableaux Croisés Dynamiques) pour analyser rapidement et facilement des informations', 'B203'),
('O003', 'Comprendre comment créer des formulaires de saisie (case à cocher, liste déroulante etc...)', 'B204'),
('O003', 'Être capable de paramétrer sa barre des tâches', 'BW08'),
('O003', 'Être capable de gérer efficacement ses fichiers', 'BW10'),
('O003', 'Savoir utiliser les mécanismes de gestion de la mémoire', 'C001'),
('O003', 'Savoir réaliser des applications réutilisables', 'CPP1'),
('O003', 'Savoir mettre en oeuvre la programmation orientée objet (POO) avec C#', 'CSH1'),
('O003', 'Savoir concevoir globalement une application (programme, modules, procédures, fonctions)', 'DEV0'),
('O003', 'Identifier les apports de la modélisation UML', 'OB01'),
('O003', 'Découvrir la puissance du langage SQL pour manipuler les données', 'SQL1'),
('O003', 'Être en mesure d''écrire des requêtes compatibles avec plusieurs SGBD', 'SQL2'),
('O003', 'Passer l''étape importante de la maîtrise de l''éditeur "vi"', 'TUX1'),
('O004', 'Etre en mesure de créer, modifier, sauvegarder et imprimer ses documents', 'B200'),
('O004', 'Savoir trier et filtrer des données dans une table', 'B201'),
('O004', 'Savoir repérer des données par l’intermédiaire de couleurs ou d’icônes (mise en forme conditionnelle)', 'B203'),
('O004', 'Pouvoir effectuer des calculs de dates et heures ou des calculs matriciels', 'B204'),
('O004', 'Appréhender les apports du nouvel explorateur', 'BW08'),
('O004', 'Découvrir les principales applications de Windows 10', 'BW10'),
('O004', 'Être capable de concevoir de petites applications respectant la norme ANSI', 'C001'),
('O004', 'Connaître les meilleures pratiques de tests de qualité en C++', 'CPP1'),
('O004', 'Savoir se connecter à une base de données', 'CSH1'),
('O004', 'Comprendre comment accéder aux données (fichiers, bases "SQL")', 'DEV0'),
('O004', 'Disposer d''un premier point de vue sur les approches Java et .Net', 'OB01'),
('O004', 'Identifier les principaux acteurs du marché ainsi que les forces et faiblesses de leurs solutions', 'SQL1'),
('O005', 'Pouvoir présenter vos données sous forme de graphiques simples', 'B201'),
('O005', 'Pouvoir créer des listes déroulantes pour imposer une saisie (Validation des données)', 'B203'),
('O005', 'Savoir tirer parti des fonctionnalités de simulations (valeur cible, solveur, gestionnaire de scénario)', 'B204'),
('O005', 'Comprendre comment organiser et gérer ses documents dans l''environnement Windows', 'BW08'),
('O005', 'Connaître les différents types de langage (procédural, objet, événementiel)', 'DEV0'),
('O006', 'Savoir personnaliser son environnement de travail', 'BW08'),
('O006', 'Apprendre à exécuter des requêtes via un objet de commande', 'CSH1'),
('O006', 'Comprendre l’importance des types de données', 'DEV0'),
('O007', 'Découvrir les fonctionnalités de requêtage intégrées aux langages de programmation (LINQ) pour manipuler des objets', 'CSH1'),
('O007', 'Savoir écrire des programmes simples en Basic et en Java', 'DEV0'),
('O008', 'Être capable d''écrire des requêtes LINQ', 'CSH1');

-- --------------------------------------------------------

--
-- Structure de la table `prog_etape`
--

CREATE TABLE IF NOT EXISTS `prog_etape` (
  `id_etape` varchar(5) NOT NULL DEFAULT '',
  `lib_etape` varchar(100) DEFAULT NULL,
  `ref_form` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prog_etape`
--

INSERT INTO `prog_etape` (`id_etape`, `lib_etape`, `ref_form`) VALUES
('PE01', 'Description de l''ecran d''Ecxel', 'B200'),
('PE01', 'Insérer des formules de calcul', 'B201'),
('PE01', 'Suggestion des graphiques par rapport aux tableaux de données', 'B202'),
('PE01', 'Analyse rapide d''un tableau dans Excel', 'B203'),
('PE01', 'Calculer selon des conditions', 'B204'),
('PE01', 'Découvrir la machine', 'BOSX'),
('PE01', 'Utilisation de l''interface "Metro"', 'BW08'),
('PE01', 'S''approprier l''interface de Windows 10', 'BW10'),
('PE01', 'Introduction du langage C', 'C001'),
('PE01', 'Du procédural à l''objet', 'CPP1'),
('PE01', '> 1ÈRE PARTIE : VISUAL STUDIO 2010 - PROGRAMMATION C# AVEC MICROSOFT .NET FRAMEWORK 4', 'CSH1'),
('PE01', '> 1ÈRE PARTIE : CONCEVOIR UN PROGRAMME', 'DEV0'),
('PE01', '> 1ÈRE PARTIE : DU BESOIN UTILISATEUR AU PROGRAMME', 'OB01'),
('PE01', 'Introduction', 'PY01'),
('PE01', 'Historique', 'SQL1'),
('PE01', 'Introduction', 'SQL2'),
('PE01', 'Introduction', 'TUX1'),
('PE02', 'Action sur les documents', 'B200'),
('PE02', 'Soigner la mise en forme de vos tableaux', 'B201'),
('PE02', 'Créer des graphiques adaptés aux données', 'B202'),
('PE02', 'Utiliser les filtres pour extraire des données', 'B203'),
('PE02', 'Arrondir les chiffres', 'B204'),
('PE02', 'Utiliser le Finder', 'BOSX'),
('PE02', 'Utilisation de la "Charm Bar"', 'BW08'),
('PE02', 'Personnaliser le menu démarrer et le bureau', 'BW10'),
('PE02', 'Structure des programmes', 'C001'),
('PE02', 'Les concepts objet', 'CPP1'),
('PE02', 'Introdution à C# et au .NET Framework', 'CSH1'),
('PE02', 'Qu''est-ce qu''un programme informatique', 'DEV0'),
('PE02', 'La chaîne globale', 'OB01'),
('PE02', 'Types élémentaires', 'PY01'),
('PE02', 'Le système de gestion de bases de données', 'SQL1'),
('PE02', 'Le langage d''interrogation des données (LID)', 'SQL2'),
('PE02', 'Une session', 'TUX1'),
('PE03', 'Créer des tableaux et modifier le contenu', 'B200'),
('PE03', 'Améliorer la présentation d''un tableau dans une page', 'B201'),
('PE03', 'Améliorer la mise en forme d''un graphique', 'B202'),
('PE03', 'Réaliser des calculs statistiques sur une base de données', 'B203'),
('PE03', 'Réaliser des calculs matriciels', 'B204'),
('PE03', 'Manipuler les fichiers', 'BOSX'),
('PE03', 'Les options de la barre de tâches', 'BW08'),
('PE03', 'Paramétrer la barre des tâches', 'BW10'),
('PE03', 'Instruction de contrôle', 'C001'),
('PE03', 'Syntaxe C++', 'CPP1'),
('PE03', 'Structures de programmation du C#', 'CSH1'),
('PE03', 'Algorithme', 'DEV0'),
('PE03', 'Algorithme', 'OB01'),
('PE03', 'Les structures de contrôles', 'PY01'),
('PE03', 'La modélisation des données', 'SQL1'),
('PE03', 'Utilisation des fonctions', 'SQL2'),
('PE03', 'Les fichiers et les répertoires', 'TUX1'),
('PE04', 'Insérer des formules de calcul', 'B200'),
('PE04', 'Saisir et trier les données ''une base', 'B201'),
('PE04', 'Améliorer la lisibilité des données d''un graphique', 'B202'),
('PE04', 'Exploiter des bases de données provenant d''autres application avec Query', 'B203'),
('PE04', 'Faciliter l''analyse des résultats à l''aide de différentes fonctions', 'B204'),
('PE04', 'Travailler en réseau', 'BOSX'),
('PE04', 'Les gadgets', 'BW08'),
('PE04', 'Gérer ses fichiers avec l''explorateur Windows', 'BW10'),
('PE04', 'Opérateurs et expressions', 'C001'),
('PE04', 'Traitement des exeptions', 'CPP1'),
('PE04', 'Déclaration et appael de méthodes', 'CSH1'),
('PE04', 'Programmation structurée et programmation orientée objet', 'DEV0'),
('PE04', '> 2ÈME PARTIE : LES COMPOSANTS D''UN PROGRAMME', 'OB01'),
('PE04', 'Les fonctions', 'PY01'),
('PE04', 'Types de SGBD', 'SQL1'),
('PE04', 'Utilisation des opérateurs ensemblistes', 'SQL2'),
('PE04', 'Le Shell', 'TUX1'),
('PE05', 'Soigner la mise en forme de vos tableaux', 'B200'),
('PE05', 'Créer des graphiques adaptés aux données', 'B201'),
('PE05', 'Utiliser différentes sources de données pour construire le graphique', 'B202'),
('PE05', 'Créer des tableaux de synthèse (tableau croisé dynamique)', 'B203'),
('PE05', 'Utiliser la commande collage spécial', 'B204'),
('PE05', 'Exploitater les applications de base', 'BOSX'),
('PE05', 'Gérer l''archivage des fichiers dans l''explorateur Windows', 'BW08'),
('PE05', 'Effectuer des recherches', 'BW10'),
('PE05', 'Constantes', 'C001'),
('PE05', 'Surcharge', 'CPP1'),
('PE05', 'Gestion d''exeptions', 'CSH1'),
('PE05', 'Choisir son langage', 'DEV0'),
('PE05', 'Variables et types de données', 'OB01'),
('PE05', 'Programmation objet', 'PY01'),
('PE05', 'Administration des SGBD', 'SQL1'),
('PE05', 'Utilisation de sous-interrogations', 'SQL2'),
('PE05', 'Les droits', 'TUX1'),
('PE06', 'Améliorer la présentation d''un tableau dans une page', 'B200'),
('PE06', 'Améliorer la mise en forme d''un graphique', 'B201'),
('PE06', 'Modifier la source de données du graphique', 'B202'),
('PE06', 'Remanier les données d''une base provenant d''une autre application', 'B203'),
('PE06', 'Consolider plusieurs feuilles ou plusieurs tableaux', 'B204'),
('PE06', 'Effectuer des recherches', 'BW08'),
('PE06', 'Créer des raccourcis', 'BW10'),
('PE06', 'Variables', 'C001'),
('PE06', 'Patrons - "Templates"', 'CPP1'),
('PE06', 'Lire et écrire dans des fichiers', 'CSH1'),
('PE06', '> 2ÈME PARTIE : ÉCRIRE SON PROGRAMME', 'DEV0'),
('PE06', 'La "Grammaire" d''un langage', 'OB01'),
('PE06', 'Les modules', 'PY01'),
('PE06', 'Les acteurs', 'SQL1'),
('PE06', 'Le langage de manipulation de données (LMD)', 'SQL2'),
('PE06', 'L''impression', 'TUX1'),
('PE07', 'Gagner du temps en travaillant sur plusieurs feuilles de calcul', 'B200'),
('PE07', 'Utiliser des modèles pour gagner du temps', 'B202'),
('PE07', 'Mettre en relief les données d''une base', 'B203'),
('PE07', 'Créer des liens hypertextes', 'B204'),
('PE07', 'Gérer des raccourcis', 'BW08'),
('PE07', 'Configurer son environnement de travail', 'BW10'),
('PE07', 'Types de données', 'C001'),
('PE07', 'Points clé de la STL', 'CPP1'),
('PE07', 'Créer de nouveaux types de données', 'CSH1'),
('PE07', 'Manipuler les données du programme', 'DEV0'),
('PE07', 'Un premier programme', 'OB01'),
('PE07', 'Module système', 'PY01'),
('PE07', 'Présentation des langages de requêtage', 'SQL1'),
('PE07', 'Notions sur le langage de défintion de données (LDD)', 'SQL2'),
('PE07', 'Les filtres', 'TUX1'),
('PE08', 'Insérer un graphique Excel dans un document Word', 'B202'),
('PE08', 'Faciliter la saisie dans une base de données et limiter le nombre d''erreurs', 'B203'),
('PE08', 'Utiliser la fonction financière VPM', 'B204'),
('PE08', 'Personnaliser son environnement de travail (Panneau de configuration)', 'BW08'),
('PE08', 'Les principales applications de Windows 10', 'BW10'),
('PE08', 'Fichiers et entrées/sorties', 'C001'),
('PE08', 'Introduction aux design Pattern', 'CPP1'),
('PE08', 'Encapsulation de données et de méthodes', 'CSH1'),
('PE08', 'Les structures de programme', 'DEV0'),
('PE08', '> 3ÈME PARTIE : BIEN ÉCRIRE SES PROGRAMMES', 'OB01'),
('PE08', 'Qualité de code', 'PY01'),
('PE08', 'État de l''art', 'SQL1'),
('PE08', 'La sauvegarde', 'TUX1'),
('PE09', 'Réaliser un calcul exact entre deux dates', 'B203'),
('PE09', 'Réaliser des calculs sur des dates et des heures', 'B204'),
('PE09', 'Allocation dynamique de mémoire', 'C001'),
('PE09', 'Qualité logicielle', 'CPP1'),
('PE09', 'Héritages de classes et implémentation d''interfaces', 'CSH1'),
('PE09', 'Passer à la pratique', 'DEV0'),
('PE09', 'Structurer son programme', 'OB01'),
('PE09', 'Les interfaces graphiques', 'PY01'),
('PE09', 'Les outils de communication', 'TUX1'),
('PE10', 'Optimiser la recherche d''information', 'B203'),
('PE10', 'Utiliser des outils de simulation', 'B204'),
('PE10', 'Le pré-processeur', 'C001'),
('PE10', 'Gestion de la durée de vie des objets et contrôler les ressources', 'CSH1'),
('PE10', '> 3ÈME PARTIE : LES BONNES PRATIQUES DE LA PROGRAMMATION', 'DEV0'),
('PE10', 'Les bibliothèques', 'OB01'),
('PE10', 'Interfaçage Python / C', 'PY01'),
('PE10', 'Les liens', 'TUX1'),
('PE11', 'Création de formulaire de saisie', 'B204'),
('PE11', 'Encapsuler des données et définir des surchages d''opérateurs', 'CSH1'),
('PE11', 'Modularisation du code', 'DEV0'),
('PE11', 'L''importance de la présentation', 'OB01'),
('PE11', 'La gestion des processus', 'TUX1'),
('PE12', 'Modifier le recalcul d''une cellule, l''itération ou la précision', 'B204'),
('PE12', 'Découplage de méthodes et gestion d''événements', 'CSH1'),
('PE12', 'Partager son code', 'DEV0'),
('PE12', 'L''approche objet', 'OB01'),
('PE12', 'L''éditeur VI', 'TUX1'),
('PE13', 'Utilisation des collections et construction de types génériques', 'CSH1'),
('PE13', 'Bien écrire son programme', 'DEV0'),
('PE13', 'Analyse et conception', 'OB01'),
('PE13', 'Unix et les réseaux', 'TUX1'),
('PE14', 'Construction et énumération de classes de collection personnalisées', 'CSH1'),
('PE14', '> 4ÈME PARTIE : GESTION DES DONNÉES EXTERNES', 'DEV0'),
('PE14', 'UML', 'OB01'),
('PE15', 'Utilisation de LINQ pour interroger des données', 'CSH1'),
('PE15', 'Les SGBD', 'DEV0'),
('PE16', 'Intégration de langages dynamiques et de composant COM au code Visual C#', 'CSH1'),
('PE16', 'SQL: Le langage des SGBD', 'DEV0'),
('PE17', '2ÈME PARTIE : VISUAL STUDIO 2010 - DÉVELOPPER UNE SOLUTION D''ACCÈS AUX DONNÉES AVEC ADO .NET 4 ', 'CSH1'),
('PE17', 'Gérer ses données à l''aide de fichier', 'DEV0'),
('PE18', 'Architecture et technologies d''accès au données', 'CSH1'),
('PE18', '> 5ÈME PARTIE : LES OUTILS POUR MIEUX CODER', 'DEV0'),
('PE19', 'Construire les modèles de données d''intité (Entity Data Models)', 'CSH1'),
('PE19', 'Les environnements de développement', 'DEV0'),
('PE20', 'Interroger des données d''entité', 'CSH1'),
('PE20', 'Corriger son code à l''aide de l''éditeur', 'DEV0'),
('PE21', 'Création, misa à jour et suppression de données d''entité', 'CSH1'),
('PE22', 'Gestion de scénarios multi-utilisateurs en utilisant les services d''objet', 'CSH1'),
('PE23', 'Construire des solutions optimisées en utilisant les services d''objet', 'CSH1'),
('PE24', 'Personnalisation d''entités et construction de classes d''entités personnalisées', 'CSH1'),
('PE25', 'Utilisation des classes Poco ("Plain Old" CLR Objetcs) avec Entity Framework', 'CSH1'),
('PE26', 'Construire une solution N-Tiers en utilisant Entity Framework', 'CSH1'),
('PE27', 'Gestion des mise à jour dans une solution N-Tier en utilisant Entity Framework', 'CSH1'),
('PE28', 'Construire des solutions occasionnellement connectées', 'CSH1'),
('PE29', 'Interroger des données en utilisant les services de données WCF', 'CSH1'),
('PE30', 'Misa àjour de données en utilisant les services de données WCF', 'CSH1'),
('PE31', 'Utilisation d''ADO.NET', 'CSH1'),
('PE32', 'Utilisation de LINQ TO SQL', 'CSH1');

-- --------------------------------------------------------

--
-- Structure de la table `prog_sous_etape`
--

CREATE TABLE IF NOT EXISTS `prog_sous_etape` (
  `id_sous_etape` varchar(5) NOT NULL DEFAULT '',
  `lib_sous_etape` varchar(250) DEFAULT NULL,
  `id_etape` varchar(5) NOT NULL DEFAULT '',
  `ref_form` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prog_sous_etape`
--

INSERT INTO `prog_sous_etape` (`id_sous_etape`, `lib_sous_etape`, `id_etape`, `ref_form`) VALUES
('SE01', 'Ouverture sur des modèles d’Excel', 'PE01', 'B200'),
('SE01', 'Insérer les fonctions statistiques (somme cumulée, max, min, nb, moyenne...)', 'PE01', 'B201'),
('SE01', 'Créer un graphique à partir de l’outil d’Analyse rapide', 'PE01', 'B202'),
('SE01', 'Mise en forme conditionnelle', 'PE01', 'B203'),
('SE01', 'Utiliser la fonction "Si" pour réaliser des calculs conditionnels', 'PE01', 'B204'),
('SE01', 'Mise en route ; principes de base du système', 'PE01', 'BOSX'),
('SE01', 'Lancer des applications par les vignettes (ou "tuiles dynamiques")', 'PE01', 'BW08'),
('SE01', 'Démarrer Windows 10', 'PE01', 'BW10'),
('SE01', 'Historique', 'PE01', 'C001'),
('SE01', 'Bref historique des langages', 'PE01', 'CPP1'),
('SE01', 'Le langage de script interprété', 'PE01', 'PY01'),
('SE01', 'Le "tout fichier"', 'PE01', 'SQL1'),
('SE01', 'Rappel sur le modèle relationnel', 'PE01', 'SQL2'),
('SE01', 'Les caractéristiques des systèmes Unix et Linux', 'PE01', 'TUX1'),
('SE01', 'Enregistrer un classeur (différence entre enregistrer et enregistrer sous)', 'PE02', 'B200'),
('SE01', 'Renvoyer à la ligne automatiquement dans une cellule', 'PE02', 'B201'),
('SE01', 'Créer un graphique combiné (histogramme + courbe)', 'PE02', 'B202'),
('SE01', 'Appliquer un filtre élaboré pour extraire des données qui répondent à de nombreux critères', 'PE02', 'B203'),
('SE01', 'Arrondir un chiffre (Arrondi.inf, Arrondi sup)', 'PE02', 'B204'),
('SE01', 'Présentation des menus déroulants du Finder ; raccourcis claviers', 'PE02', 'BOSX'),
('SE01', 'Réaliser une recherche (applications, paramètres, fichiers)', 'PE02', 'BW08'),
('SE01', 'Modifier le contenu du menu Démarrer', 'PE02', 'BW10'),
('SE01', 'Forme générale', 'PE02', 'C001'),
('SE01', 'Classes, objets (constructeurs et paramètres par défaut)', 'PE02', 'CPP1'),
('SE01', 'Introduction au .Net Framework', 'PE02', 'CSH1'),
('SE01', 'Traduire la pensée en langage machine', 'PE02', 'DEV0'),
('SE01', 'Nécessité de paliers entre la pensée humaine et les séquences binaires 01010001...', 'PE02', 'OB01'),
('SE01', 'Les nombres', 'PE02', 'PY01'),
('SE01', 'Les briques constitutives', 'PE02', 'SQL1'),
('SE01', 'La sélection de données', 'PE02', 'SQL2'),
('SE01', 'Comment démarrer une session ?', 'PE02', 'TUX1'),
('SE01', 'Saisir les données d''un tableau sur une feuille de calcul (texte, numérique, date)', 'PE03', 'B200'),
('SE01', 'Savoir répéter automatiquement les titres d’un tableau lors d’une impression', 'PE03', 'B201'),
('SE01', 'Différentes façons de modifier un graphique :', 'PE03', 'B202'),
('SE01', 'Nommer une base de données', 'PE03', 'B203'),
('SE01', 'Traiter en une seule opération des plages de cellules ou des collections de valeurs', 'PE03', 'B204'),
('SE01', 'Présentation de l''organisation des fichiers sur OS X El Capitan', 'PE03', 'BOSX'),
('SE01', 'Mini fenêtre dans la barre des tâches', 'PE03', 'BW08'),
('SE01', 'Verrouiller et/ou masquer la barre des tâches', 'PE03', 'BW10'),
('SE01', 'Généralités', 'PE03', 'C001'),
('SE01', 'Fonctions "Friends"', 'PE03', 'CPP1'),
('SE01', 'Formaliser les étapes du programme', 'PE03', 'DEV0'),
('SE01', 'Les "atomes" pour s''exprimer', 'PE03', 'OB01'),
('SE01', 'Les conditions', 'PE03', 'PY01'),
('SE01', 'Besoin de normalisation', 'PE03', 'SQL1'),
('SE01', 'Fonctions arithmétiques', 'PE03', 'SQL2'),
('SE01', 'L''arborescence des fichiers', 'PE03', 'TUX1'),
('SE01', 'Réaliser des opérations de base (somme, soustraire, diviser, multiplier)', 'PE04', 'B200'),
('SE01', 'Réaliser des tris multicritères (64 ordres de tri', 'PE04', 'B201'),
('SE01', 'Réorganiser l''ordre des séries dans un histogramme', 'PE04', 'B202'),
('SE01', 'Ouvrir Query à partir d''Excel', 'PE04', 'B203'),
('SE01', 'Utiliser des fonctions statistiques : moyenne, médiane', 'PE04', 'B204'),
('SE01', 'Présentation de la configuration d''un réseau', 'PE04', 'BOSX'),
('SE01', 'Utiliser les gadgets (calculatrice, horloge, météo, calendrier, notes...)', 'PE04', 'BW08'),
('SE01', 'Lancer l''explorateur de fichier', 'PE04', 'BW10'),
('SE01', 'Généralités', 'PE04', 'C001'),
('SE01', 'Traitement des erreurs dans les programmes', 'PE04', 'CPP1'),
('SE01', 'Pourquoi travailler avec des objets', 'PE04', 'DEV0'),
('SE01', 'Les prototypes, les arguments', 'PE04', 'PY01'),
('SE01', 'Les SGBD relationnels', 'PE04', 'SQL1'),
('SE01', 'GROUP BY et HAVING', 'PE04', 'SQL2'),
('SE01', 'Les jokers', 'PE04', 'TUX1'),
('SE01', 'Mettre en forme rapidement des caractères (taille, couleur...)', 'PE05', 'B200'),
('SE01', 'Suggestion des meilleurs graphiques par rapport à la structure des tableaux', 'PE05', 'B201'),
('SE01', 'Créer un graphique croisé dynamique à partir d''une base de données', 'PE05', 'B202'),
('SE01', 'Suggestion pour aider à la création de TCD', 'PE05', 'B203'),
('SE01', 'Copier / coller un tableau avec liaisons', 'PE05', 'B204'),
('SE01', 'La messagerie avec Mail', 'PE05', 'BOSX'),
('SE01', 'Lancer l''explorateur Windows 8.1', 'PE05', 'BW08'),
('SE01', 'Lancer une recherche à partir du bureau', 'PE05', 'BW10'),
('SE01', 'Généralités', 'PE05', 'C001'),
('SE01', 'Surcharge des fonctions', 'PE05', 'CPP1'),
('SE01', 'Langages de script', 'PE05', 'DEV0'),
('SE01', 'Pourquoi typer les variables ?', 'PE05', 'OB01'),
('SE01', 'Classe, objets', 'PE05', 'PY01'),
('SE01', 'Un besoin fondamental', 'PE05', 'SQL1'),
('SE01', 'Dans le WHERE', 'PE05', 'SQL2'),
('SE01', 'Connaître les droits', 'PE05', 'TUX1'),
('SE01', 'Aperçu avant impression', 'PE06', 'B200'),
('SE01', 'Modifier les couleurs', 'PE06', 'B201'),
('SE01', 'Afficher ou masquer une partie des données en utilisant le mode plan', 'PE06', 'B202'),
('SE01', 'Remplissage instantané', 'PE06', 'B203'),
('SE01', 'Réaliser une consolidation inter-feuilles par des formules ou par l’onglet Données', 'PE06', 'B204'),
('SE01', 'Réaliser des recherches à partir de la zone de recherche de l''explorateur', 'PE06', 'BW08'),
('SE01', 'Créer un raccourci sur le bureau', 'PE06', 'BW10'),
('SE01', 'Définition', 'PE06', 'C001'),
('SE01', 'Définitions de patrons, syntaxe et instanciation', 'PE06', 'CPP1'),
('SE01', 'Les blocs de programme (début ... fin)', 'PE06', 'OB01'),
('SE01', 'Les principes', 'PE06', 'PY01'),
('SE01', 'Les professionnels : Oracle, SQL Server, IBM DB2', 'PE06', 'SQL1'),
('SE01', 'L''insertion de données (INSERT)', 'PE06', 'SQL2'),
('SE01', 'L''impression, le principe', 'PE06', 'TUX1'),
('SE01', 'Renommer une feuille de calcul', 'PE07', 'B200'),
('SE01', 'Créer un modèle de graphique pour enregistrer les paramètres de mise en forme', 'PE07', 'B202'),
('SE01', 'Modifier la mise en forme selon le contenu des cellules', 'PE07', 'B203'),
('SE01', 'WAAAAAAAAAHHHHHHHHHHOOOOOOUUUUUUUUU !!!!!!!!!', 'PE07', 'B204'),
('SE01', 'Créer un raccourci sur le bureau', 'PE07', 'BW08'),
('SE01', 'Modifier son écran de verrouillage', 'PE07', 'BW10'),
('SE01', 'Types simples', 'PE07', 'C001'),
('SE01', 'Présentation des principaux conteneurs (vector, list, set, map, deque)', 'PE07', 'CPP1'),
('SE01', 'Déclaration des variables', 'PE07', 'DEV0'),
('SE01', 'Présentation de l’environnement de développement', 'PE07', 'OB01'),
('SE01', 'Arguments passés sur la ligne de commande', 'PE07', 'PY01'),
('SE01', 'SQL du monde relationnel', 'PE07', 'SQL1'),
('SE01', 'Création de tables : syntaxe', 'PE07', 'SQL2'),
('SE01', 'Présentation des filtres', 'PE07', 'TUX1'),
('SE01', 'Copier un tableau Excel dans un document Word', 'PE08', 'B202'),
('SE01', 'Créer une liste déroulante pour saisir des informations redondantes', 'PE08', 'B203'),
('SE01', 'Calculer le montant des remboursements d''un prêt grâce à la fonction VPM', 'PE08', 'B204'),
('SE01', 'Afficher soit le panneau de contrôle ou le panneau de configuration', 'PE08', 'BW08'),
('SE01', 'Consulter ses images avec la visionneuse de photos', 'PE08', 'BW10'),
('SE01', 'Principes d''utilisation', 'PE08', 'C001'),
('SE01', 'Pattern singleton', 'PE08', 'CPP1'),
('SE01', 'Structures de test', 'PE08', 'DEV0'),
('SE01', 'Outils d''analyse statique de code (pylint, pychecker)', 'PE08', 'PY01'),
('SE01', 'Les "grilles" de SGBD', 'PE08', 'SQL1'),
('SE01', 'La commande tar', 'PE08', 'TUX1'),
('SE01', 'Fonction datedif', 'PE09', 'B203'),
('SE01', 'Effectuer des calculs sur des heures', 'PE09', 'B204'),
('SE01', 'Allocation dynamique', 'PE09', 'C001'),
('SE01', 'Les best practices en C++', 'PE09', 'CPP1'),
('SE01', 'Création d''un programme simple en Java', 'PE09', 'DEV0'),
('SE01', 'La nécessité d’utiliser des procédures ou des fonctions', 'PE09', 'OB01'),
('SE01', 'Principes de programmation des interfaces graphiques', 'PE09', 'PY01'),
('SE01', 'La communication en direct, les commandes write et talk', 'PE09', 'TUX1'),
('SE01', 'Utiliser la fonction Recherche', 'PE10', 'B203'),
('SE01', 'Définir une valeur cible', 'PE10', 'B204'),
('SE01', 'Notion de pré-processeur', 'PE10', 'C001'),
('SE01', 'Ne pas réécrire ce qui existe déjà (librairies)', 'PE10', 'OB01'),
('SE01', 'Utilisation du profileur de code', 'PE10', 'PY01'),
('SE01', 'Les liens, les commandes', 'PE10', 'TUX1'),
('SE01', 'Utilisation de cases à cocher ou de case d’options', 'PE11', 'B204'),
('SE01', 'Notion de sous-programmes : les fonctions et les procédures', 'PE11', 'DEV0'),
('SE01', 'Les bonnes habitudes pour anticiper les erreurs', 'PE11', 'OB01'),
('SE01', 'Présentation des commandes de gestion des processus', 'PE11', 'TUX1'),
('SE01', 'Calcul : contrôler quand et comment Excel recalcule les formules', 'PE12', 'B204'),
('SE01', 'Trouver et utiliser les bibliothèques d''un langage', 'PE12', 'DEV0'),
('SE01', 'Rappel sur l''algorithmie', 'PE12', 'OB01'),
('SE01', 'Les commandes indispensables', 'PE12', 'TUX1'),
('SE01', 'L''importance des commentaires', 'PE13', 'DEV0'),
('SE01', 'Comprendre le besoin du client', 'PE13', 'OB01'),
('SE01', 'Les mots-clés pour comprendre TCP/IP', 'PE13', 'TUX1'),
('SE01', 'Spécification', 'PE14', 'OB01'),
('SE01', 'Que sont les Systèmes de Gestion de Bases de données ?', 'PE15', 'DEV0'),
('SE01', 'La norme SQL', 'PE16', 'DEV0'),
('SE01', 'Comprendre les étapes de manipulation d''un fichier', 'PE17', 'DEV0'),
('SE01', 'De l''éditeur de texte simple à l''IDE', 'PE19', 'DEV0'),
('SE01', 'Mise en oeuvre des techniques de débogage', 'PE20', 'DEV0'),
('SE02', 'Menu Fichier (enregistrer, ouvrir, imprimer...)', 'PE01', 'B200'),
('SE02', 'Visualiser les formules dans une feuille de calcul', 'PE01', 'B201'),
('SE02', 'Liste de graphiques recommandés par Excel pour représenter au mieux vos informations ou choisir dans tous les graphiques', 'PE01', 'B202'),
('SE02', 'Graphiques', 'PE01', 'B203'),
('SE02', 'Définir plusieurs conditions en imbriquant des fonctions "Si"', 'PE01', 'B204'),
('SE02', 'Connexion des périphériques (imprimantes, disques...)', 'PE01', 'BOSX'),
('SE02', 'Personnaliser son écran d''accueil', 'PE01', 'BW08'),
('SE02', 'Ouvrir, activer ou fermer une session', 'PE01', 'BW10'),
('SE02', 'Description du langage', 'PE01', 'C001'),
('SE02', 'Critères de qualité dans un développement logiciel', 'PE01', 'CPP1'),
('SE02', 'Prise en main de l''interpréteur', 'PE01', 'PY01'),
('SE02', 'Le besoin de centraliser les traitements des fichiers', 'PE01', 'SQL1'),
('SE02', 'Les normes et caractéristiques du langage SQL', 'PE01', 'SQL2'),
('SE02', 'Arborescence et système de fichiers', 'PE01', 'TUX1'),
('SE02', 'Récupérer un document pour le modifier (ouvrir)', 'PE02', 'B200'),
('SE02', 'Utiliser les formats personnalisés', 'PE02', 'B201'),
('SE02', 'Visualiser une répartition avec un graphique en secteur (secteur de secteur et barre de secteurs)', 'PE02', 'B202'),
('SE02', 'Possibilité de mettre le résultat sur une autre feuille et aussi d’éliminer les doublons dans une liste de données', 'PE02', 'B203'),
('SE02', 'Garder la partie entière d’un chiffre (Ent, Tronque)', 'PE02', 'B204'),
('SE02', 'Utiliser le Dock et LaunchPad', 'PE02', 'BOSX'),
('SE02', 'Paramétrer son environnement (son, luminosité, modifier les paramètres de l''ordinateur)', 'PE02', 'BW08'),
('SE02', 'Épingler une application en tant que vignette', 'PE02', 'BW10'),
('SE02', 'Fonctions', 'PE02', 'C001'),
('SE02', 'Encapsulation (visibilité public-private-protected, namespaces)', 'PE02', 'CPP1'),
('SE02', 'Création de projets avec Visual Studio 2010', 'PE02', 'CSH1'),
('SE02', 'Langages compilés et langages interprétés', 'PE02', 'DEV0'),
('SE02', 'Les différentes phases : sources, compilation, binaire', 'PE02', 'OB01'),
('SE02', 'Les séquences', 'PE02', 'PY01'),
('SE02', 'Le(s) langage(s) de requêtage', 'PE02', 'SQL1'),
('SE02', 'Les restrictions ou conditions', 'PE02', 'SQL2'),
('SE02', 'Quelques commandes', 'PE02', 'TUX1'),
('SE02', 'Sélectionner dans une feuille de calcul (une zone, toute la feuille, une colonne, une ligne)', 'PE03', 'B200'),
('SE02', 'Définir des zones d’impression', 'PE03', 'B201'),
('SE02', '> Éléments de graphique, styles de graphiques, filtre du graphique', 'PE03', 'B202'),
('SE02', 'Réaliser des calculs statistiques sur des données groupées (moyenne CA;an)', 'PE03', 'B203'),
('SE02', 'Possibilité aussi de protéger ces données sous forme matricielle', 'PE03', 'B204'),
('SE02', 'Copier, organiser et compresser des fichiers', 'PE03', 'BOSX'),
('SE02', 'Activer l''Aéro Peek dans Windows 8.1', 'PE03', 'BW08'),
('SE02', 'Épingler ou détacher une application de la barre des tâches', 'PE03', 'BW10'),
('SE02', 'Instructions et blocs', 'PE03', 'C001'),
('SE02', 'Fonctions "Inline"', 'PE03', 'CPP1'),
('SE02', 'Comprendre ce que va faire le programme', 'PE03', 'DEV0'),
('SE02', 'Apprendre à formuler un traitement (rien ne s’invente)', 'PE03', 'OB01'),
('SE02', 'Les boucles while et for', 'PE03', 'PY01'),
('SE02', 'Modèles conceptuels', 'PE03', 'SQL1'),
('SE02', 'Fonctions de chaînes de caractères', 'PE03', 'SQL2'),
('SE02', 'Les chemins', 'PE03', 'TUX1'),
('SE02', 'Explication de la structure des formules simples', 'PE04', 'B200'),
('SE02', 'Créer un format personnalisé pour trier des cellules alphanumériques', 'PE04', 'B201'),
('SE02', 'Afficher les données chiffrées dans un graphique', 'PE04', 'B202'),
('SE02', 'Trier et filtrer des fichiers provenant de l''application Access', 'PE04', 'B203'),
('SE02', 'Afficher la énième plus grande valeur d’une série (Grande.valeur)', 'PE04', 'B204'),
('SE02', 'Exploiter iCloud pour échanger des données Paramétrer et activer le partage de fichiers', 'PE04', 'BOSX'),
('SE02', 'Modifier, déplacer, supprimer les gadgets', 'PE04', 'BW08'),
('SE02', 'Utilisation du ruban avec ces menus contextuels', 'PE04', 'BW10'),
('SE02', 'Expression " LVALUE "', 'PE04', 'C001'),
('SE02', 'Traitement des erreurs en C++', 'PE04', 'CPP1'),
('SE02', 'Concepts de classe, héritage, polymorphisme', 'PE04', 'DEV0'),
('SE02', 'Sémantique des appels', 'PE04', 'PY01'),
('SE02', 'Les SGBD objets', 'PE04', 'SQL1'),
('SE02', 'Opérateur UNION', 'PE04', 'SQL2'),
('SE02', 'La protection des caractères spéciaux', 'PE04', 'TUX1'),
('SE02', 'Améliorer la présentation (bordures, remplissage...)', 'PE05', 'B200'),
('SE02', 'Comparer des résultats en créant un histogramme', 'PE05', 'B201'),
('SE02', 'Créer un graphique croisé dynamique à partir d''un tableau croisé dynamique', 'PE05', 'B202'),
('SE02', 'Créer un tableau de synthèse pour analyser les données d''une base', 'PE05', 'B203'),
('SE02', 'Inverser les lignes et les colonnes d’un tableau (Transposer)', 'PE05', 'B204'),
('SE02', 'Naviguer sur Internet avec Safari', 'PE05', 'BOSX'),
('SE02', 'Utilisation du ruban avec ces menus contextuels', 'PE05', 'BW08'),
('SE02', 'Rechercher à partir de l''explorateur de Windows', 'PE05', 'BW10'),
('SE02', 'Types de constantes', 'PE05', 'C001'),
('SE02', 'Surcharge d''opérateurs', 'PE05', 'CPP1'),
('SE02', 'Langages objets', 'PE05', 'DEV0'),
('SE02', 'Exemples de type (entier, réel, caractères...)', 'PE05', 'OB01'),
('SE02', 'Méthodes, instances', 'PE05', 'PY01'),
('SE02', 'La sécurité des données', 'PE05', 'SQL1'),
('SE02', 'Dans la clause FROM', 'PE05', 'SQL2'),
('SE02', 'Modifier les droits', 'PE05', 'TUX1'),
('SE02', 'Changer l’orientation d’une page (portrait, paysage)', 'PE06', 'B200'),
('SE02', 'Insérer une image dans le graphique', 'PE06', 'B201'),
('SE02', 'Ajouter ou supprimer des séries à la source de données', 'PE06', 'B202'),
('SE02', 'Répartir les données d''une cellule dans plusieurs colonnes', 'PE06', 'B203'),
('SE02', 'Insérer une formule faisant référence à des cellules de plusieurs classeurs', 'PE06', 'B204'),
('SE02', 'Utiliser le menu contextuel du ruban pour affiner une recherche', 'PE06', 'BW08'),
('SE02', 'Utiliser les raccourcis', 'PE06', 'BW10'),
('SE02', 'Durée de vie', 'PE06', 'C001'),
('SE02', 'Patrons de fonctions', 'PE06', 'CPP1'),
('SE02', 'Le test d’une expression (si ... alors ... sinon ...)', 'PE06', 'OB01'),
('SE02', 'Module re : expressions rationnelles', 'PE06', 'PY01'),
('SE02', 'Les puissants : MySQL, PostgreSQL', 'PE06', 'SQL1'),
('SE02', 'La mise à jour (UPDATE)', 'PE06', 'SQL2'),
('SE02', 'L''impression, les commandes', 'PE06', 'TUX1'),
('SE02', 'Mettre une couleur dans un onglet', 'PE07', 'B200'),
('SE02', 'Utiliser le modèle personnalisé pour créer un nouveau graphique', 'PE07', 'B202'),
('SE02', 'Possibilités de placer plusieurs règles pour la même zone', 'PE07', 'B203'),
('SE02', 'Utiliser les raccourcis', 'PE07', 'BW08'),
('SE02', 'Changer le paramétrage de ces chiffres, dates (Région)', 'PE07', 'BW10'),
('SE02', 'Agrégats', 'PE07', 'C001'),
('SE02', 'Critères de choix pour un conteneur STL', 'PE07', 'CPP1'),
('SE02', 'Mise en oeuvre des types de données', 'PE07', 'DEV0'),
('SE02', 'Un premier programme simple en Java', 'PE07', 'OB01'),
('SE02', 'Gestion des fichiers', 'PE07', 'PY01'),
('SE02', 'OQL de EyeDB', 'PE07', 'SQL1'),
('SE02', 'Les types de données', 'PE07', 'SQL2'),
('SE02', 'La commande grep', 'PE07', 'TUX1'),
('SE02', 'Copier un tableau Excel dans un document Word avec liaison', 'PE08', 'B202'),
('SE02', 'Définir des critères de validation pour limiter les erreurs de saisie', 'PE08', 'B203'),
('SE02', 'Créer une table d''hypothèses pour connaître le montant des mensualités en fonction des variations du taux et du nombre de mensualités', 'PE08', 'B204'),
('SE02', 'Accessoires de Windows (Paint, outils de capture, Wordpad, calculatrice etc...)', 'PE08', 'BW08'),
('SE02', 'Utiliser le lecteur Windows Media', 'PE08', 'BW10'),
('SE02', 'Type de fichiers', 'PE08', 'C001'),
('SE02', 'Modèle observateur MVC avec exemple d''implémentation en C++', 'PE08', 'CPP1'),
('SE02', 'Structures de répétition', 'PE08', 'DEV0'),
('SE02', 'Extraction automatique de documentation', 'PE08', 'PY01'),
('SE02', 'Les proxy de SGBD', 'PE08', 'SQL1'),
('SE02', 'La commande cpio', 'PE08', 'TUX1'),
('SE02', 'Formater les dates et les heures (fonctions année, mois et jour)', 'PE09', 'B204'),
('SE02', 'Fonction d''allocation', 'PE09', 'C001'),
('SE02', 'Règles de conception et astuces de codage', 'PE09', 'CPP1'),
('SE02', 'Écrire son premier script VBScript', 'PE09', 'DEV0'),
('SE02', 'Différences conceptuelles et syntaxiques entre les deux', 'PE09', 'OB01'),
('SE02', 'Présentation de la bibliothèque GTK', 'PE09', 'PY01'),
('SE02', 'Le courrier électronique, la commande mail', 'PE09', 'TUX1'),
('SE02', 'Rechercher des données à partir d''un critère avec RECHERCHEV() (avec une valeur exacte ou proche)', 'PE10', 'B203'),
('SE02', 'Utiliser le solveur', 'PE10', 'B204'),
('SE02', 'Pré-processeur de C', 'PE10', 'C001'),
('SE02', 'Écrire ses propres librairies', 'PE10', 'OB01'),
('SE02', 'Réécriture d''une fonction Python en C', 'PE10', 'PY01'),
('SE02', 'Les liens symboliques', 'PE10', 'TUX1'),
('SE02', 'Création de Liste déroulante', 'PE11', 'B204'),
('SE02', 'Gestion des paramètres', 'PE11', 'DEV0'),
('SE02', 'Les commentaires utiles et efficaces', 'PE11', 'OB01'),
('SE02', 'La commande kill', 'PE11', 'TUX1'),
('SE02', 'L''itération est le recalcul répété d’une feuille de calcul, qui se produit jusqu’à ce qu’une condition numérique particulière soit remplie', 'PE12', 'B204'),
('SE02', 'Savoir mettre à profit le travail déjà effectué', 'PE12', 'DEV0'),
('SE02', 'Les objectifs du monde Objet, les classes et les objets', 'PE12', 'OB01'),
('SE02', 'Les modes de vi', 'PE12', 'TUX1'),
('SE02', 'Les conventions de nommage', 'PE13', 'DEV0'),
('SE02', 'Savoir imaginer une architecture logicielle adaptée', 'PE13', 'OB01'),
('SE02', 'Les commandes Internet', 'PE13', 'TUX1'),
('SE02', 'Dans quel cas utiliser UML', 'PE14', 'OB01'),
('SE02', 'Comment communiquer avec un SGBD ?', 'PE15', 'DEV0'),
('SE02', 'Les verbes du langage', 'PE16', 'DEV0'),
('SE02', 'Le format CSV', 'PE17', 'DEV0'),
('SE02', 'Un outil pour un langage', 'PE19', 'DEV0'),
('SE02', 'Découvrir Visual Basic Editor', 'PE20', 'DEV0'),
('SE03', 'Utiliser les onglets et le ruban', 'PE01', 'B200'),
('SE03', 'Calculer des pourcentages dans une facture', 'PE01', 'B201'),
('SE03', 'Totaux (Somme, Moyenne, Nbval, % du total, résultat cumulé)', 'PE01', 'B203'),
('SE03', 'Calculer une somme suivant une ou plusieurs conditions (Somme.si, Somme.si.ens)', 'PE01', 'B204'),
('SE03', 'Présentation des outils logiciels de base intégrés à OS X El Capitan', 'PE01', 'BOSX'),
('SE03', 'Passer d''une application à une autre', 'PE01', 'BW08'),
('SE03', 'Arrêter ou mettre en veille son ordinateur', 'PE01', 'BW10'),
('SE03', 'Aperçu général des langages orientés Objet', 'PE01', 'CPP1'),
('SE03', 'Un langage interprété mais pas multi OS facilement', 'PE01', 'PY01'),
('SE03', 'L''avènement des systèmes de gestion centralisés', 'PE01', 'SQL1'),
('SE03', 'Noyau et processus', 'PE01', 'TUX1'),
('SE03', 'Créer un nouveau document', 'PE02', 'B200'),
('SE03', 'Masquer l’affichage des zéros dans un tableau', 'PE02', 'B201'),
('SE03', 'Mettre en relief une évolution avec un graphique en courbe', 'PE02', 'B202'),
('SE03', 'Manipuler les fenêtres ; naviguer dans l''arborescence', 'PE02', 'BOSX'),
('SE03', 'Arrêter, mettre en veille, mettre à jour et redémarrer son ordinateur', 'PE02', 'BW08'),
('SE03', 'Déplacer, redimensionner ou supprimer une vignette', 'PE02', 'BW10'),
('SE03', 'Membres et méthodes de classes (static)', 'PE02', 'CPP1'),
('SE03', 'Ecrire une application C#', 'PE02', 'CSH1'),
('SE03', 'Réutiliser ce qui a déjà été fait', 'PE02', 'DEV0'),
('SE03', 'Le cas particulier d’un interpréteur', 'PE02', 'OB01'),
('SE03', 'Les listes', 'PE02', 'PY01'),
('SE03', 'Les contraintes d''utilisation', 'PE02', 'SQL1'),
('SE03', 'Les tris', 'PE02', 'SQL2'),
('SE03', 'La documentation', 'PE02', 'TUX1'),
('SE03', 'Corriger ou supprimer des informations dans un tableau', 'PE03', 'B200'),
('SE03', 'Mettre à l’échelle un tableau', 'PE03', 'B201'),
('SE03', '> Menu contextuel en se plaçant toujours dans le graphique', 'PE03', 'B202'),
('SE03', 'Assistant somme conditionnelle, Fonction SOMMEPROD', 'PE03', 'B204'),
('SE03', 'Rechercher des documents avec Spotlight', 'PE03', 'BOSX'),
('SE03', 'Manipulation des fenêtres', 'PE03', 'BW08'),
('SE03', 'Sélectionner les icônes à afficher dans la barre des tâches', 'PE03', 'BW10'),
('SE03', 'Tests et boucles', 'PE03', 'C001'),
('SE03', 'Paramètre caché this', 'PE03', 'CPP1'),
('SE03', 'Utilisation d''un pseudo langage', 'PE03', 'OB01'),
('SE03', 'Modèle physique', 'PE03', 'SQL1'),
('SE03', 'Fonctions de statistiques', 'PE03', 'SQL2'),
('SE03', 'La syntaxe d''une ligne de commande', 'PE03', 'TUX1'),
('SE03', 'Gagner du temps en recopiant une formule de calcul', 'PE04', 'B200'),
('SE03', 'Trier selon un ordre personnalisé ', 'PE04', 'B201'),
('SE03', 'Expliciter les résultats grâce à des commentaires', 'PE04', 'B202'),
('SE03', 'Renvoyer les données dans Excel', 'PE04', 'B203'),
('SE03', 'Extraire la valeur la plus fréquente d’une série (Mode)', 'PE04', 'B204'),
('SE03', 'Se connecter à des postes Mac et Windows', 'PE04', 'BOSX'),
('SE03', 'Gérer la liste rapide', 'PE04', 'BW10'),
('SE03', 'Opérateurs unaires', 'PE04', 'C001'),
('SE03', 'Traitement des exceptions imbriquées', 'PE04', 'CPP1'),
('SE03', 'Les avantages de l''encapsulation', 'PE04', 'DEV0'),
('SE03', 'Arguments variables, optionnels', 'PE04', 'PY01'),
('SE03', 'Place de XML/XSL', 'PE04', 'SQL1'),
('SE03', 'Opérateur INTERSECT', 'PE04', 'SQL2'),
('SE03', 'La redirection des entrées/sorties standards, les tubes', 'PE04', 'TUX1'),
('SE03', 'Modifier les largeurs de colonnes ou de lignes', 'PE05', 'B200'),
('SE03', 'Visualiser une répartition avec un graphique en secteur (camembert)', 'PE05', 'B201'),
('SE03', 'Modifier l''organisation des données dans le tableau', 'PE05', 'B203'),
('SE03', 'Enlever les formules dans un tableau (Valeurs)', 'PE05', 'B204'),
('SE03', 'Exploiter son agenda avec iCal', 'PE05', 'BOSX'),
('SE03', 'Réorganiser les volets dans l''explorateur Windows', 'PE05', 'BW08'),
('SE03', 'Affiner sa recherche par date, mot-clé ou type de fichier', 'PE05', 'BW10'),
('SE03', 'Exemples de constantes', 'PE05', 'C001'),
('SE03', 'Surcharge de l’opérateur new (avec nothrow) et set-new_handler', 'PE05', 'CPP1'),
('SE03', 'Exemples de problèmes liés aux types', 'PE05', 'OB01'),
('SE03', 'Encapsulation', 'PE05', 'PY01'),
('SE03', 'Réplication ou répartition ?', 'PE05', 'SQL1'),
('SE03', 'Sous requête synchronisée', 'PE05', 'SQL2'),
('SE03', 'Droits sur les répertoires', 'PE05', 'TUX1'),
('SE03', 'Modifier les marges d’un document', 'PE06', 'B200'),
('SE03', 'Insérer des titre', 'PE06', 'B201'),
('SE03', 'Afficher le contenu d''une cellule en majuscule ou en minuscule', 'PE06', 'B203'),
('SE03', 'Gérer les liaisons entre plusieurs classeurs', 'PE06', 'B204'),
('SE03', 'Enregistrer une recherche', 'PE06', 'BW08'),
('SE03', 'Renommer, supprimer un raccourci', 'PE06', 'BW10'),
('SE03', 'Propriétés', 'PE06', 'C001'),
('SE03', 'Template de classes (exemple avec la classe smart pointer)', 'PE06', 'CPP1'),
('SE03', 'La boucle (tant que ...)', 'PE06', 'OB01'),
('SE03', 'Module os : services du système d''exploitation', 'PE06', 'PY01'),
('SE03', 'Un vrai SGBD Objet : EyeDB', 'PE06', 'SQL1'),
('SE03', 'La suppression d''informations (DELETE)', 'PE06', 'SQL2'),
('SE03', 'Insérer ou supprimer des feuilles de calcul', 'PE07', 'B200'),
('SE03', 'Enregistrer vos tableaux standards dans un modèle de classeur', 'PE07', 'B202'),
('SE03', 'Appliquer une mise en forme à des cellules en fonction du résultat d''un calcul (présenter toute une ligne en couleur, mettre certains jours en couleur)', 'PE07', 'B203'),
('SE03', 'Renommer, supprimer un raccourci', 'PE07', 'BW08'),
('SE03', 'Définir une imprimante par défaut', 'PE07', 'BW10'),
('SE03', 'Définition de nouveaux types', 'PE07', 'C001'),
('SE03', 'Les itérateurs', 'PE07', 'CPP1'),
('SE03', 'Les opérateurs de la programmation', 'PE07', 'DEV0'),
('SE03', 'Compilation et exécution', 'PE07', 'OB01'),
('SE03', 'Gestion des threads', 'PE07', 'PY01'),
('SE03', 'Les types de contraintes', 'PE07', 'SQL2'),
('SE03', 'La commande cut', 'PE07', 'TUX1'),
('SE03', 'Afficher dans une zone les valeurs non valides', 'PE08', 'B203'),
('SE03', 'Modifier les propriétés de sa souris', 'PE08', 'BW08'),
('SE03', 'Naviguer sur Ie web avec Edge', 'PE08', 'BW10'),
('SE03', 'Niveaux d''accès', 'PE08', 'C001'),
('SE03', 'Le débogueur de Python', 'PE08', 'PY01'),
('SE03', 'XSQL', 'PE08', 'SQL1'),
('SE03', 'Calculer le nombre d''années entre deux dates (Datedif)', 'PE09', 'B204'),
('SE03', 'Fonction de libération', 'PE09', 'C001'),
('SE03', 'Conclusion avec comparatif Java / C++', 'PE09', 'CPP1'),
('SE03', 'Passer des arguments à une fonction (prototype, code retour)', 'PE09', 'OB01'),
('SE03', 'Présentation de la bibliothèque TKinter', 'PE09', 'PY01'),
('SE03', 'Gérer l’affichage des erreurs dans une cellule (Estna, Esterreur)', 'PE10', 'B203'),
('SE03', 'Garder les solutions du solveur grâce au gestionnaire de scénario', 'PE10', 'B204'),
('SE03', 'Macro Substitutions', 'PE10', 'C001'),
('SE03', 'Comment les utiliser dans d’autres programmes ?', 'PE10', 'OB01'),
('SE03', 'Appeler du code C depuis Python, et inversement', 'PE10', 'PY01'),
('SE03', 'Récupération des données dans une feuille de calcul et traitement des informations (fonction Si, choisir)', 'PE11', 'B204'),
('SE03', 'Les architectures de code (couches, séparation clients/serveur, etc.)', 'PE11', 'OB01'),
('SE03', 'La commande ps', 'PE11', 'TUX1'),
('SE03', 'Précision est une mesure du degré de précision nécessaire pour un calcul', 'PE12', 'B204'),
('SE03', 'Travailler avec les attributs et les méthodes (fonctions de classes, constructeurs, destructeurs et accesseurs)', 'PE12', 'OB01'),
('SE03', 'Le couper/coller', 'PE12', 'TUX1'),
('SE03', 'Imaginer les acteurs de l''application', 'PE13', 'OB01'),
('SE03', 'La connexion à distance (telnet)', 'PE13', 'TUX1'),
('SE03', 'Diagrammes de cas d''utilisation : que fait notre application ?', 'PE14', 'OB01'),
('SE03', 'Les API de base de données', 'PE15', 'DEV0'),
('SE03', 'L''interrogation des données par le SELECT', 'PE16', 'DEV0'),
('SE03', 'Similarité du modèle d''entrée-sortie standard', 'PE17', 'DEV0'),
('SE04', 'Individualiser sa barre d''outils "Accès Rapide"', 'PE01', 'B200'),
('SE04', 'Gagner du temps en recopiant une formule de calcul', 'PE01', 'B201'),
('SE04', 'Tableaux ou tableaux croisé dynamiques', 'PE01', 'B203'),
('SE04', 'Utiliser les fonctions NBval, NB.si, NB.si.ens pour compter des cellules textes ou numériques', 'PE01', 'B204'),
('SE04', 'Calcul : contrôler quand et comment Excel recalcule les formules', 'PE01', 'BW08'),
('SE04', 'Découvrir le bureau (bouton démarrer, zone de recherche, barre des tâches, vignettes)', 'PE01', 'BW10'),
('SE04', 'L''externalisation des processus métiers', 'PE01', 'SQL1'),
('SE04', 'Les principales normes', 'PE01', 'TUX1'),
('SE04', 'Fermer un document', 'PE02', 'B200'),
('SE04', 'Créer des mini-graphiques dans des cellules (graphiques "Sparkline")', 'PE02', 'B202'),
('SE04', 'Régler les préférences système (bureau, affichage, son, langues, dictée...)', 'PE02', 'BOSX'),
('SE04', 'Gérer les groupes de vignettes', 'PE02', 'BW10'),
('SE04', 'Héritage simple', 'PE02', 'CPP1'),
('SE04', 'Construire une application graphique', 'PE02', 'CSH1'),
('SE04', 'Ne pas tout réécrire (bibliothèques, éditions de liens, et exécutables)', 'PE02', 'OB01'),
('SE04', 'Les chaînes, les tuples', 'PE02', 'PY01'),
('SE04', 'Les jointures', 'PE02', 'SQL2'),
('SE04', 'Insérer ou supprimer les colonnes et les lignes', 'PE03', 'B200'),
('SE04', 'Afficher les sauts de page', 'PE03', 'B201'),
('SE04', '> Clic droit de la souris sur l’objet à modifier (légende, série de données, axe etc...)', 'PE03', 'B202'),
('SE04', 'Sauvegarder efficacement avec Time Machine', 'PE03', 'BOSX'),
('SE04', 'Verrouiller la barre des tâches', 'PE03', 'BW08'),
('SE04', 'Point d’entrée main avec arguments', 'PE03', 'CPP1'),
('SE04', 'Exemples d’algorithme bien conçu, "mal" conçu, et ... faux !', 'PE03', 'OB01'),
('SE04', 'Les relations et leurs éléments', 'PE03', 'SQL1'),
('SE04', 'Les commandes de gestion de fichiers', 'PE03', 'TUX1'),
('SE04', 'Rappel sur la priorité des opérations et l’utilisation des parenthèses', 'PE04', 'B200'),
('SE04', 'Modifier l''échelle de valeurs de l''axe des ordonnées', 'PE04', 'B202'),
('SE04', 'Compter le nombre de fois qu’un chiffre est le plus fréquent (NB.SI)', 'PE04', 'B204'),
('SE04', 'Echanger des fichiers avec AirPlay', 'PE04', 'BOSX'),
('SE04', 'Afficher les différents volets', 'PE04', 'BW10'),
('SE04', 'Opérateurs binaires', 'PE04', 'C001'),
('SE04', 'Classes d’exception applicatives', 'PE04', 'CPP1'),
('SE04', 'Opérateur MINUS', 'PE04', 'SQL2'),
('SE04', 'La redirection des erreurs', 'PE04', 'TUX1'),
('SE04', 'Modifier le format des nombres', 'PE05', 'B200'),
('SE04', 'Grouper des informations (texte, date, numérique)', 'PE05', 'B203'),
('SE04', 'Faire un calcul à l’aide du collage spécial', 'PE05', 'B204'),
('SE04', 'Gérer ses contacts avec le Carnet d''Adresses', 'PE05', 'BOSX'),
('SE04', 'Naviguer dans l''arborescence', 'PE05', 'BW08'),
('SE04', 'Enregistrer le résultat d''une recherche', 'PE05', 'BW10'),
('SE04', 'Les opérateurs disponibles (+, -, /, */ % ...)', 'PE05', 'OB01'),
('SE04', 'Héritage simple', 'PE05', 'PY01'),
('SE04', 'Les grappes de SGBD', 'PE05', 'SQL1'),
('SE04', 'Droits par défaut', 'PE05', 'TUX1'),
('SE04', 'Mode d’affichage "Mise en page"', 'PE06', 'B200'),
('SE04', 'Afficher les données chiffrées dans un graphique', 'PE06', 'B201'),
('SE04', 'Faire une distinction entre majuscule et minuscule (fonction Exact)', 'PE06', 'B203'),
('SE04', 'Modifier les options de recherche (options d''indexation)', 'PE06', 'BW08'),
('SE04', 'Portée', 'PE06', 'C001'),
('SE04', 'Les conforts syntaxiques', 'PE06', 'OB01'),
('SE04', 'Module csv : traitement de fichiers structurés par séparateurs', 'PE06', 'PY01'),
('SE04', 'Comment choisir son SGBD ?', 'PE06', 'SQL1'),
('SE04', 'Réorganiser l''ordre des feuilles de calcul', 'PE07', 'B200'),
('SE04', 'Créer un nouveau classeur à partir du modèle', 'PE07', 'B202'),
('SE04', 'Les algorithmes génériques', 'PE07', 'CPP1'),
('SE04', 'Les tableaux', 'PE07', 'DEV0'),
('SE04', 'Avantage d''une interface de développement (IDE)', 'PE07', 'OB01'),
('SE04', 'Modification de la définition d''une table', 'PE07', 'SQL2'),
('SE04', 'La commande sed', 'PE07', 'TUX1'),
('SE04', 'Empêcher la saisie de doublons dans une zone (fonction NB.Si)', 'PE08', 'B203'),
('SE04', 'Changer le paramétrage de ces chiffres, dates (Région)', 'PE08', 'BW08'),
('SE04', 'Lire des fichiers PDF avec le lecteur PDF de Windows', 'PE08', 'BW10'),
('SE04', 'Les tests avec Python', 'PE08', 'PY01'),
('SE04', 'Calculer le nombre de jours ouvrés entre deux dates', 'PE09', 'B204'),
('SE04', 'Principe de fonctionnement', 'PE09', 'C001'),
('SE04', 'Passage par valeur et par adresse dans une fonction', 'PE09', 'OB01'),
('SE04', 'Création d’une liste déroulante combinée avec la fonction de RechercheV', 'PE10', 'B203'),
('SE04', 'Compilation conditionnelle', 'PE10', 'C001'),
('SE04', 'La gestion des travaux', 'PE11', 'TUX1'),
('SE04', 'Comprendre et savoir utiliser efficacement l''encapsulation, l''instanciation', 'PE12', 'OB01'),
('SE04', 'Le paramétrage de vi', 'PE12', 'TUX1'),
('SE04', 'Le transfert de fichiers (ftp)', 'PE13', 'TUX1'),
('SE04', 'Diagrammes de classe : adapter ses connaissances objets aux diagrammes', 'PE14', 'OB01'),
('SE04', 'Utiliser les API de base de données', 'PE16', 'DEV0'),
('SE05', 'Masquer ou afficher le ruban ou les onglets', 'PE01', 'B200'),
('SE05', 'Nommer une zone pour faciliter la lecture d’une formule', 'PE01', 'B201'),
('SE05', 'Graphique Sparklines', 'PE01', 'B203'),
('SE05', 'Combiner des "Si" avec des conditions Et/Ou', 'PE01', 'B204'),
('SE05', 'Fermer une application', 'PE01', 'BW08'),
('SE05', 'Afficher toutes les applications', 'PE01', 'BW10'),
('SE05', 'Le client-serveur applicatif', 'PE01', 'SQL1'),
('SE05', 'Les systèmes du marché', 'PE01', 'TUX1'),
('SE05', 'Quitter le logiciel Excel', 'PE02', 'B200'),
('SE05', 'Créer un graphique à barres (ex : pyramide des âges)', 'PE02', 'B202'),
('SE05', 'Mettre à jour le système et exploiter l''App Store', 'PE02', 'BOSX'),
('SE05', 'Personnaliser l''arrière-plan du bureau', 'PE02', 'BW10'),
('SE05', 'Héritage multiple (classe de base virtuelle)', 'PE02', 'CPP1'),
('SE05', 'Documenter une application', 'PE02', 'CSH1'),
('SE05', 'Les dictionnaires', 'PE02', 'PY01'),
('SE05', 'Recopier ou déplacer des données', 'PE03', 'B200'),
('SE05', '> Double clic pour obtenir un volet sur le côté de l’écran', 'PE03', 'B202'),
('SE05', 'Gérer les versions avec Auto Save', 'PE03', 'BOSX'),
('SE05', 'Modification des paramètres de la barre des tâches', 'PE03', 'BW08'),
('SE05', 'Type références', 'PE03', 'CPP1'),
('SE05', 'Les limites de Merise', 'PE03', 'SQL1'),
('SE05', 'Lire les attributs d''un fichier, la commande ls', 'PE03', 'TUX1'),
('SE05', 'Saisie semi-automatique des formules', 'PE04', 'B200'),
('SE05', 'Afficher/masquer le quadrillage et la légende', 'PE04', 'B202'),
('SE05', 'Connaître le rang d’une valeur (Rang)', 'PE04', 'B204'),
('SE05', 'Accéder aux imprimantes du réseau', 'PE04', 'BOSX'),
('SE05', 'Naviguer dans l''arborescence (notions de lecteurs, dossiers, sous-dossiers, fichiers)', 'PE04', 'BW10'),
('SE05', 'Opérateurs particuliers', 'PE04', 'C001'),
('SE05', 'L''historique des commandes (mode vi)', 'PE04', 'TUX1'),
('SE05', 'Créer des segments chronologiques', 'PE05', 'B203'),
('SE05', 'Utiliser Notes et Rappels', 'PE05', 'BOSX'),
('SE05', 'Créer des dossiers pour ranger ses fichiers', 'PE05', 'BW08'),
('SE05', 'Le confort des tableaux et des structures', 'PE05', 'OB01'),
('SE05', 'Héritage multiple', 'PE05', 'PY01'),
('SE05', 'Gestion des groupes', 'PE05', 'TUX1'),
('SE05', 'Création d’en-tête et de pied de page', 'PE06', 'B200'),
('SE05', 'Expliciter les résultats grâce à des zones de texte', 'PE06', 'B201'),
('SE05', 'Extraire certains caractères du contenu d''une cellule', 'PE06', 'B203'),
('SE05', 'Module sql : gestion des bases de données', 'PE06', 'PY01'),
('SE05', 'Présentation des acteurs majeurs pour les langages objet', 'PE07', 'OB01'),
('SE05', 'Suppression d''une table', 'PE07', 'SQL2'),
('SE05', 'La commande sort', 'PE07', 'TUX1'),
('SE05', 'Obtenir la position d’un élément dans une liste de donnée (fonction Equiv)', 'PE10', 'B203'),
('SE05', 'Inclusion de fichier', 'PE10', 'C001'),
('SE05', 'Traduction des concepts Objet en langage : les packages et les espaces de noms, les classes, les méthodes et leur visibilité, les attributs et leur visibilité, l''instanciation, l''appel de méthodes et la référence aux variables', 'PE12', 'OB01'),
('SE05', 'Présentation d''un montage NFS', 'PE13', 'TUX1'),
('SE05', 'Diagramme de séquence : modéliser les interactions de nos applications', 'PE14', 'OB01'),
('SE06', 'Utiliser le lanceur de boîte de dialogue', 'PE01', 'B200'),
('SE06', 'Zoomer sur une fenêtre', 'PE01', 'BW08'),
('SE06', 'Lancer et fermer des applications', 'PE01', 'BW10'),
('SE06', 'Utiliser un graphique en nuage de points', 'PE02', 'B202'),
('SE06', 'Créer des bureaux virtuels', 'PE02', 'BW10'),
('SE06', 'Polymorphisme (virtuel), Classes abstraites (virtuel pures)', 'PE02', 'CPP1'),
('SE06', 'Exécuter et déboguer des applications avec Visual Studio 2010', 'PE02', 'CSH1'),
('SE06', 'Les expressions lambdas', 'PE02', 'PY01'),
('SE06', 'Insérer une image dans le graphique', 'PE03', 'B202'),
('SE06', 'Classes imbriquées (Inner class)', 'PE03', 'CPP1'),
('SE06', 'Copier, détruire, renommer un fichier', 'PE03', 'TUX1'),
('SE06', 'Notion de référence absolue', 'PE04', 'B200'),
('SE06', 'Afficher un deuxième axe des ordonnées dans un graphique combiné', 'PE04', 'B202'),
('SE06', 'Réorganiser l''affichage des fichiers (dispositions, tris, filtres, regroupements)', 'PE04', 'BW10'),
('SE06', 'Arithmétique sur les pointeurs', 'PE04', 'C001'),
('SE06', 'Les alias', 'PE04', 'TUX1'),
('SE06', 'Calculer une répartition', 'PE05', 'B203'),
('SE06', 'Communiquer en direct avec Messages', 'PE05', 'BOSX'),
('SE06', 'Créer des sous-dossiers dans un dossier', 'PE05', 'BW08'),
('SE06', 'Ne pas numéroter la première page', 'PE06', 'B200'),
('SE06', 'Assemblage de plusieurs cellules en une seule (concaténer)', 'PE06', 'B203'),
('SE06', 'Notions sur les vues, les séquences, les index et les synonymes', 'PE07', 'SQL2'),
('SE06', 'Les commandes more et pg', 'PE07', 'TUX1'),
('SE06', 'Renvoyer une référence ou une valeur de cellule à l’intersection d’une ligne ou d’une colonne dans une plage de données (Index)', 'PE10', 'B203'),
('SE06', 'Contrôle de log', 'PE10', 'C001'),
('SE06', 'Mise en pratique', 'PE12', 'OB01'),
('SE06', 'Les commandes "remote"', 'PE13', 'TUX1'),
('SE06', 'Utilisation d''UML dans le monde réel', 'PE14', 'OB01'),
('SE07', 'Connaître la terminologie d’un tableur (classeur, feuille, colonne, ligne, cellule)', 'PE01', 'B200'),
('SE07', 'Épingler des applications dans la barre d''accueil "Démarrer"', 'PE01', 'BW08'),
('SE07', 'Passer d''une application à une autre', 'PE01', 'BW10'),
('SE07', 'Créer un graphique bulle', 'PE02', 'B202'),
('SE07', 'Interfaces', 'PE02', 'CPP1'),
('SE07', 'Inclusion des headers et références multiples', 'PE03', 'CPP1'),
('SE07', 'Visualiser un fichier, la commande cat', 'PE03', 'TUX1'),
('SE07', 'Gérer les cellules vides dans une courbe', 'PE04', 'B202'),
('SE07', 'Créer des dossiers et des sous-dossiers pour ranger ses fichiers', 'PE04', 'BW10'),
('SE07', 'L''environnement', 'PE04', 'TUX1'),
('SE07', 'Modifier le calcul (moyenne, pourcentage)', 'PE05', 'B203'),
('SE07', 'Exploiter le centre de notifications', 'PE05', 'BOSX'),
('SE07', 'Modifier le mode d''affichage de vos fichiers', 'PE05', 'BW08'),
('SE07', 'Imprimer un tableau', 'PE06', 'B200'),
('SE07', 'Supprimer les espaces dans une cellule (supprespace)', 'PE06', 'B203'),
('SE07', 'Présentation des expressions régulières et mise en oeuvre', 'PE07', 'TUX1'),
('SE07', 'Le mode graphique : X-Window', 'PE13', 'TUX1'),
('SE08', 'L’importance de la barre de formule dans les calculs', 'PE01', 'B200'),
('SE08', 'Afficher côte à côte deux applications', 'PE01', 'BW10'),
('SE08', 'Utilisation du qualificateur const', 'PE03', 'CPP1'),
('SE08', 'La commande file', 'PE03', 'TUX1'),
('SE08', 'Protéger un graphique', 'PE04', 'B202'),
('SE08', 'Renommer un fichier ou un dossier', 'PE04', 'BW10'),
('SE08', 'Le fichier .profile', 'PE04', 'TUX1'),
('SE08', 'Créer une formule personnalisée (champ calculé, élément calculé)', 'PE05', 'B203'),
('SE08', 'Partager des informations depuis une App', 'PE05', 'BOSX'),
('SE08', 'Trier les fichiers par date ou par nom', 'PE05', 'BW08'),
('SE08', 'Convertir une valeur en format texte, en nombre (Cnum)', 'PE06', 'B203'),
('SE09', 'Description de la feuille de calcul', 'PE01', 'B200'),
('SE09', 'Gérer les fenêtres (déplacer, redimensionner, réduire ou fermer)', 'PE01', 'BW10'),
('SE09', 'Bibliothèque standard d’E/S', 'PE03', 'CPP1'),
('SE09', 'Les commandes de gestion de répertoires', 'PE03', 'TUX1'),
('SE09', 'Insérer une courbe de tendance pour visualiser les résultats futurs', 'PE04', 'B202'),
('SE09', 'Copier ou déplacer des fichiers ou des dossiers', 'PE04', 'BW10'),
('SE09', 'Réaliser un script élémentaire', 'PE04', 'TUX1'),
('SE09', 'Actualiser les données', 'PE05', 'B203'),
('SE09', 'Regrouper des fichiers et les filtrer', 'PE05', 'BW08'),
('SE09', 'Compter le nombre de caractères d’une chaine (NbCar)', 'PE06', 'B203'),
('SE10', 'La barre d’état avec les affichages d’Excel', 'PE01', 'B200'),
('SE10', 'Gestion dynamique de la mémoire', 'PE03', 'CPP1'),
('SE10', 'Copie et suppression d''arborescence', 'PE03', 'TUX1'),
('SE10', 'Supprimer un élément et le récupérer dans la corbeille', 'PE04', 'BW10'),
('SE10', 'Trier des données dans un tableau croisé dynamique', 'PE05', 'B203'),
('SE10', 'Renommer un fichier ou un dossier', 'PE05', 'BW08'),
('SE10', 'Afficher une valeur numérique en respectant un format de texte (Texte)', 'PE06', 'B203'),
('SE11', 'Utiliser le zoom pour mieux visualiser vos données dans la feuille de calcul', 'PE01', 'B200'),
('SE11', 'Destructeurs virtuels', 'PE03', 'CPP1'),
('SE11', 'La commande find', 'PE03', 'TUX1'),
('SE11', 'Compresser et décompresser des fichiers', 'PE04', 'BW10'),
('SE11', 'Mise en forme conditionnelle', 'PE05', 'B203'),
('SE11', 'Copier ou déplacer des fichiers ou des dossiers', 'PE05', 'BW08'),
('SE11', 'Effectuer une recherche sur du texte (Trouve, Cherche)', 'PE06', 'B203'),
('SE12', 'Typage dynamique avec RTTI', 'PE03', 'CPP1'),
('SE12', 'Mettre deux tables en relation sous forme d’un tableau croisé', 'PE05', 'B203'),
('SE12', 'Supprimer un document et le récupérer dans la corbeille', 'PE05', 'BW08'),
('SE13', 'Transformer un tableau croisé dynamique en graphique', 'PE05', 'B203');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id_session` varchar(4) NOT NULL DEFAULT '',
  `date_debut_session` date DEFAULT NULL,
  `ref_form` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`id_session`, `date_debut_session`, `ref_form`) VALUES
('S001', '2016-04-06', 'B200'),
('S001', '2016-02-02', 'B201'),
('S001', '2016-04-28', 'B202'),
('S001', '2016-04-21', 'B203'),
('S001', '2016-04-14', 'B204'),
('S001', '2016-06-13', 'BOSX'),
('S001', '2016-06-23', 'BW08'),
('S001', '2016-05-13', 'BW10'),
('S001', '2016-07-04', 'C001'),
('S001', '2016-05-30', 'CPP1'),
('S001', '2016-06-20', 'CSH1'),
('S001', '2016-04-18', 'DEV0'),
('S001', '2016-07-11', 'OB01'),
('S001', '2016-04-25', 'PY01'),
('S001', '2016-05-02', 'SQL1'),
('S001', '2016-04-11', 'SQL2'),
('S001', '2016-05-17', 'TUX1'),
('S002', '2016-05-02', 'B200'),
('S002', '2016-02-07', 'B201'),
('S002', '2016-06-09', 'B202'),
('S002', '2016-05-19', 'B203'),
('S002', '2016-05-26', 'B204'),
('S002', '2016-09-19', 'BOSX'),
('S002', '2016-09-28', 'BW08'),
('S002', '2016-08-30', 'BW10'),
('S002', '2016-10-10', 'C001'),
('S002', '2016-09-12', 'CPP1'),
('S002', '2016-10-03', 'CSH1'),
('S002', '2016-10-03', 'DEV0'),
('S002', '2016-10-17', 'OB01'),
('S002', '2016-08-29', 'PY01'),
('S002', '2016-09-08', 'SQL1'),
('S002', '2016-07-04', 'SQL2'),
('S002', '2016-09-26', 'TUX1'),
('S003', '2016-06-06', 'B200'),
('S003', '2016-03-03', 'B201'),
('S003', '2016-09-22', 'B202'),
('S003', '2016-06-16', 'B203'),
('S003', '2016-06-23', 'B204'),
('S003', '2016-11-28', 'BOSX'),
('S003', '2016-11-23', 'BW08'),
('S003', '2016-10-21', 'BW10'),
('S003', '2016-12-19', 'C001'),
('S003', '2016-11-14', 'CPP1'),
('S003', '2016-11-28', 'CSH1'),
('S003', '2016-12-05', 'OB01'),
('S003', '2016-11-07', 'PY01'),
('S003', '2016-11-03', 'SQL1'),
('S003', '2016-09-26', 'SQL2'),
('S003', '2016-11-14', 'TUX1'),
('S004', '2016-07-11', 'B200'),
('S004', '2016-03-14', 'B201'),
('S004', '2016-11-02', 'B202'),
('S004', '2016-07-12', 'B203'),
('S004', '2016-07-21', 'B204'),
('S004', '2016-12-21', 'BW10'),
('S004', '2016-12-05', 'SQL2'),
('S005', '2016-09-07', 'B200'),
('S005', '2016-03-29', 'B201'),
('S005', '2016-12-19', 'B202'),
('S005', '2016-08-25', 'B203'),
('S005', '2016-09-08', 'B204'),
('S006', '2016-10-05', 'B200'),
('S006', '2016-04-13', 'B201'),
('S006', '2016-09-15', 'B203'),
('S006', '2016-10-06', 'B204'),
('S007', '2016-11-02', 'B200'),
('S007', '2016-04-28', 'B201'),
('S007', '2016-10-13', 'B203'),
('S007', '2016-11-03', 'B204'),
('S008', '2016-05-09', 'B201'),
('S008', '2016-11-09', 'B203'),
('S008', '2016-12-01', 'B204'),
('S009', '2016-05-24', 'B201'),
('S009', '2016-12-08', 'B203'),
('S010', '2016-06-08', 'B201'),
('S011', '2016-06-23', 'B201'),
('S012', '2016-07-04', 'B201'),
('S013', '2016-07-19', 'B201'),
('S014', '2016-08-24', 'B201'),
('S015', '2016-09-08', 'B201'),
('S016', '2016-09-18', 'B201');


# Ajout des nouvelles tables pour les inscriptions #

#------------------------------------------------------------
# Table: MEMBRE
#------------------------------------------------------------

CREATE TABLE MEMBRE(
        id_membre               int (25) Auto_increment  NOT NULL ,
        login                   Varchar (30) UNIQUE ,
        password                Varchar (100) ,
        nom                     Varchar (30) ,
        prenom                  Varchar (30) ,
        date_naissance          Date ,
        email                   Varchar (50) ,
        tel                     Varchar(15),
        sexe                    boolean,
        adr                     Varchar (50) ,
        cp                      Varchar (10) ,
        ville                   Varchar (50) ,
        date_inscription        Date ,
        PRIMARY KEY (id_membre )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: INSCRIRE
#------------------------------------------------------------

CREATE TABLE INSCRIRE(
        etat_inscription    INT(2) ,
        session_inscription Varchar (25) ,
        id_membre           Varchar (25) NOT NULL ,
        ref_form            Varchar (4) NOT NULL ,
        PRIMARY KEY (id_membre ,ref_form )
)ENGINE=InnoDB;


ALTER TABLE INSCRIRE ADD CONSTRAINT FK_INSCRIRE_id_membre FOREIGN KEY (id_membre) REFERENCES MEMBRE(id_membre);
ALTER TABLE INSCRIRE ADD CONSTRAINT FK_INSCRIRE_ref_form_insc FOREIGN KEY (ref_form) REFERENCES FORMATION(ref_form);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
 ADD PRIMARY KEY (`ref_form`,`id_categ`), ADD KEY `FK_APPARTENIR_id_categ` (`id_categ`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id_categ`);

--
-- Index pour la table `certification`
--
ALTER TABLE `certification`
 ADD PRIMARY KEY (`id_certif`);

--
-- Index pour la table `delivrer`
--
ALTER TABLE `delivrer`
 ADD PRIMARY KEY (`ref_form`,`id_certif`), ADD KEY `FK_DELIVRER_id_certif` (`id_certif`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
 ADD PRIMARY KEY (`ref_form`);

--
-- Index pour la table `necessiter`
--
ALTER TABLE `necessiter`
 ADD PRIMARY KEY (`ref_form`,`ref_form_FORMATION`), ADD KEY `FK_NECESSITER_ref_form_FORMATION` (`ref_form_FORMATION`);

--
-- Index pour la table `objectif`
--
ALTER TABLE `objectif`
 ADD PRIMARY KEY (`id_objectif`,`ref_form`), ADD KEY `FK_OBJECTIF_ref_form` (`ref_form`);

--
-- Index pour la table `prog_etape`
--
ALTER TABLE `prog_etape`
 ADD PRIMARY KEY (`id_etape`,`ref_form`), ADD KEY `FK_PROG_ETAPE_ref_form` (`ref_form`);

--
-- Index pour la table `prog_sous_etape`
--
ALTER TABLE `prog_sous_etape`
 ADD PRIMARY KEY (`id_sous_etape`,`id_etape`,`ref_form`), ADD KEY `FK_PROG_SOUS_ETAPE_id_etape` (`id_etape`), ADD KEY `FK_PROG_SOUS_ETAPE_ref_form` (`ref_form`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id_session`,`ref_form`), ADD KEY `FK_SESSION_ref_form` (`ref_form`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
ADD CONSTRAINT `FK_APPARTENIR_id_categ` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id_categ`),
ADD CONSTRAINT `FK_APPARTENIR_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `delivrer`
--
ALTER TABLE `delivrer`
ADD CONSTRAINT `FK_DELIVRER_id_certif` FOREIGN KEY (`id_certif`) REFERENCES `certification` (`id_certif`),
ADD CONSTRAINT `FK_DELIVRER_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `necessiter`
--
ALTER TABLE `necessiter`
ADD CONSTRAINT `FK_NECESSITER_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`),
ADD CONSTRAINT `FK_NECESSITER_ref_form_FORMATION` FOREIGN KEY (`ref_form_FORMATION`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `objectif`
--
ALTER TABLE `objectif`
ADD CONSTRAINT `FK_OBJECTIF_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `prog_etape`
--
ALTER TABLE `prog_etape`
ADD CONSTRAINT `FK_PROG_ETAPE_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `prog_sous_etape`
--
ALTER TABLE `prog_sous_etape`
ADD CONSTRAINT `FK_PROG_SOUS_ETAPE_id_etape` FOREIGN KEY (`id_etape`) REFERENCES `prog_etape` (`id_etape`),
ADD CONSTRAINT `FK_PROG_SOUS_ETAPE_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
ADD CONSTRAINT `FK_SESSION_ref_form` FOREIGN KEY (`ref_form`) REFERENCES `formation` (`ref_form`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
