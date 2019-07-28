-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 12:01 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facetech`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `descr` text NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `comdate` datetime DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `descr`, `uid`, `comdate`, `pid`, `cid`, `remq`) VALUES
(93, 'J\'ai beaucoup appris en lisant ce cours, merci !', 52, '2017-07-07 11:46:48', NULL, 52, NULL),
(92, 'Bravo pour votre projet, il utilise\r\nbien les fondamentaux !', 50, '2017-07-07 11:41:57', 95, NULL, NULL),
(91, 'Beau travail, ça va faire beaucoup de changements !', 48, '2017-07-07 11:39:12', 90, NULL, NULL),
(90, 'J\'ai beaucoup aimé votre projet, bravo les gars :)', 43, '2017-07-07 11:35:53', 93, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `theme` varchar(45) NOT NULL,
  `cdate` datetime NOT NULL,
  `classe` varchar(3) NOT NULL,
  `descr` text,
  `fichier` varchar(5000) DEFAULT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `uid`, `theme`, `cdate`, `classe`, `descr`, `fichier`, `remq`) VALUES
(53, 52, 'Réseau : TCP / IP', '2017-07-07 11:49:15', '2', 'Ce cours vous permettra de connaître\r\nles bases du réseau, du TCP / IP\r\net plus encore !', 'https://openclassrooms.com/courses/apprenez-le-fonctionnement-des-reseaux-tcp-ip', NULL),
(52, 50, 'Node JavaScript', '2017-07-07 11:41:25', '1', 'Ce cours vous permettra d\'asseoir\r\nles bases du JavaScript côté serveur.', 'http://itinet.fr/thire/cours/cours_nodejs_variables/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `uid`, `pid`, `remq`) VALUES
(71, 39, 90, NULL),
(70, 38, 90, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jaime`
--

CREATE TABLE `jaime` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jaime`
--

INSERT INTO `jaime` (`id`, `uid`, `pid`, `remq`) VALUES
(18, 32, 90, NULL),
(19, 47, 90, NULL),
(20, 47, 91, NULL),
(21, 43, 93, NULL),
(22, 48, 96, NULL),
(23, 50, 95, NULL),
(24, 52, 95, NULL),
(25, 52, 90, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `descr` varchar(2500) DEFAULT NULL,
  `mdate` datetime NOT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `uid`, `descr`, `mdate`, `remq`) VALUES
(159, 41, 'Super :)', '2017-07-07 11:59:15', NULL),
(158, 32, 'Du coup, on pourra même discuter avec les élèves d\\\'Agen !', '2017-07-07 11:58:47', NULL),
(157, 32, 'Ça servira de moyen de communication instantané entre tous les membres du site', '2017-07-07 11:58:29', NULL),
(156, 39, 'Oui, on s\\\'est dit que ça pouvait être utile pour tous !', '2017-07-07 11:57:46', NULL),
(155, 40, 'C\\\'est sympa comme système, ça va nous être utile', '2017-07-07 11:55:47', NULL),
(154, 52, 'Merci, si vous avez besoin d\\\'aide n\\\'hésitez pas !', '2017-07-07 11:55:30', NULL),
(153, 32, 'Amusez-vous bien :D', '2017-07-07 11:51:28', NULL),
(152, 32, 'Bienvenue à tous ! Voici les débuts de notre chat :)', '2017-07-07 11:51:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `chef` varchar(20) DEFAULT NULL,
  `type` enum('PI','PFH') NOT NULL COMMENT 'PI ou PFH',
  `pdate` datetime DEFAULT NULL,
  `membre` int(11) NOT NULL,
  `statut` enum('encours','fini') NOT NULL COMMENT 'fini ou en cours',
  `niveau` varchar(3) DEFAULT NULL,
  `descr` text,
  `logo` varchar(5000) NOT NULL DEFAULT '../Images/LogosP/Defaut/Defaut.png',
  `fichier` varchar(5000) DEFAULT NULL,
  `nblike` int(11) DEFAULT '0',
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `chef`, `type`, `pdate`, `membre`, `statut`, `niveau`, `descr`, `logo`, `fichier`, `nblike`, `remq`) VALUES
(94, 'Vision Touch', '41', 'PI', '2017-07-07 11:32:05', 3, 'fini', '2', 'Vision Touch est une plateforme\r\nde création de sites web.', '../Images/LogosP/41/logo.png', 'https://', 0, NULL),
(95, 'Checkmate', '43', 'PI', '2017-07-07 11:35:30', 3, 'fini', '1', 'Checkmate est une adaptation sous forme\r\nde site web du jeu d\'échecks qui\r\nvous permet de rencontrer des\r\nadversaires en ligne.', '../Images/LogosP/43/Chess-Logo.png', 'https://', 2, NULL),
(96, 'Cargo', '48', 'PI', '2017-07-07 11:38:12', 2, 'encours', '5', 'Cargo facilite l\'utilisation du téléphone\r\nau volant via une application mobile Androïd.', '../Images/LogosP/48/logo-cargo-pi.png', 'https://', 1, NULL),
(91, 'M.A.W.E.P', '47', 'PI', '2017-07-07 11:18:48', 4, 'encours', '4', 'M.A.W.E.P est un prototype pour l\'entreprise Executive\r\nProfiler. Le projet est une plateforme collaborative \r\npermettant de suivre, en temps réel, le niveau \r\nd\'autonomie des  collaborateurs \r\ndans des domaines de compétences \r\nclés pour l\'organisation.', '../Images/LogosP/47/LogoMawep-3-.png', 'https://', 1, NULL),
(93, 'Futur\'Âge', '32', 'PFH', '2017-07-07 11:27:15', 5, 'encours', '2', 'Aider les personnes âgées est notre priorité,\r\naméliorer leur quotidien est notre but,\r\npour Futur’Age nous communiquons.', '../Images/LogosP/32/futurage-logo-cmjn-bleu-01.png', 'https://', 1, NULL),
(90, 'Face\'Tech', '32', 'PI', '2017-07-07 10:55:54', 3, 'encours', '2', 'Face’Tech est un réseau social dédié à In’Tech\r\ndans lequel les utilisateurs, en fonction de leur rang,\r\npeuvent poster, commenter des cours et des projets\r\ntout en communicant entre eux.', '../Images/LogosP/32/Logo.png', '', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` text NOT NULL,
  `statut` enum('ON','OFF') NOT NULL,
  `rang` varchar(10) DEFAULT NULL,
  `udate` date NOT NULL,
  `classe` varchar(3) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT '../Images/Avatars/Default/Default.gif',
  `descr` text,
  `email` varchar(75) DEFAULT NULL,
  `Mdp` varchar(500) DEFAULT NULL,
  `remq` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `statut`, `rang`, `udate`, `classe`, `avatar`, `descr`, `email`, `Mdp`, `remq`) VALUES
(42, 'Loiseau', 'Hugo', 'OFF', 'Eleve', '1997-05-06', '2', '../Images/Avatars/Default/Default.gif', NULL, 'loiseau@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(32, 'Epifanic', 'Tanguy', 'OFF', 'Admin', '1998-01-27', '1', '../Images/Avatars/32/jedi.jpeg', 'Hey !', 'epifanic@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(39, 'Nimaga', 'Mahamadou', 'OFF', 'Admin', '1998-11-21', '2', '../Images/Avatars/Default/Default.gif', NULL, 'nimaga@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(40, 'Audinet', 'Denis', 'OFF', 'Eleve', '1996-06-06', '2', '../Images/Avatars/Default/Default.gif', NULL, 'audinet@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(41, 'Ly', 'Mélodie', 'OFF', 'Eleve', '1997-06-10', '2', '../Images/Avatars/Default/Default.gif', NULL, 'ly@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(38, 'Elbaz', 'Jean-Baptiste', 'OFF', 'Admin', '1998-07-01', '2', '../Images/Avatars/Default/Default.gif', NULL, 'jelbaz@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(43, 'Bouallegue', 'Anis', 'OFF', 'Eleve', '1997-10-27', '1', '../Images/Avatars/Default/Default.gif', NULL, 'bouallegue@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(44, 'Muller', 'Robin', 'OFF', 'Eleve', '1994-12-28', '1', '../Images/Avatars/Default/Default.gif', NULL, 'muller@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(45, 'Lacognata', 'Julie', 'OFF', 'Eleve', '1995-11-07', '5', '../Images/Avatars/Default/Default.gif', NULL, 'lacognata@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(46, 'Sochet', 'Nino', 'OFF', 'Eleve', '1997-04-07', '4', '../Images/Avatars/Default/Default.gif', NULL, 'sochet@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(47, 'Richer', 'Baptiste', 'OFF', 'Eleve', '1995-06-02', '4', '../Images/Avatars/Default/Default.gif', NULL, 'richer@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(48, 'Roger', 'Marvin', 'OFF', 'Eleve', '1995-08-01', '4', '../Images/Avatars/Default/Default.gif', NULL, 'roger@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(49, 'Barot', 'Quentin', 'OFF', 'Eleve', '1996-09-05', '3', '../Images/Avatars/Default/Default.gif', NULL, 'barot@intechinfo.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(50, 'Thire', 'Patrice', 'OFF', 'Prof', '1957-09-08', '1', '../Images/Avatars/Default/Default.gif', NULL, 'thire@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(51, 'Thomas', 'Corinne', 'OFF', 'Prof', '1963-04-04', '2', '../Images/Avatars/Default/Default.gif', NULL, 'corinne@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(52, 'Huet', 'David', 'OFF', 'Prof', '1973-03-03', '3', '../Images/Avatars/Default/Default.gif', NULL, 'huet@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(53, 'Lalitte', 'Eric', 'OFF', 'Prof', '1965-05-03', '3', '../Images/Avatars/Default/Default.gif', NULL, 'lalitte@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(54, 'Raquillet', 'Antoine', 'OFF', 'Prof', '1980-05-04', '3', '../Images/Avatars/Default/Default.gif', NULL, 'raquillet@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(55, 'Got', 'Valérie', 'OFF', 'Prof', '1969-07-20', '5', '../Images/Avatars/Default/Default.gif', NULL, 'got@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(56, 'Danesi', 'Emanuelle', 'OFF', 'Prof', '1970-03-27', '1', '../Images/Avatars/Default/Default.gif', NULL, 'danesi@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(57, 'Sanchez', 'Arnaud', 'OFF', 'Prof', '1965-10-13', '1', '../Images/Avatars/Default/Default.gif', NULL, 'sanchez@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(58, 'Barbin le Bourhis', 'Elizabeth', 'OFF', 'Prof', '1982-07-04', '1', '../Images/Avatars/Default/Default.gif', NULL, 'elisabethbarbinlebourhis@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL),
(59, 'Brouste', 'Christine', 'OFF', 'Prof', '1970-12-09', '1', '../Images/Avatars/Default/Default.gif', NULL, 'brouste@esiea.fr', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaime`
--
ALTER TABLE `jaime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `jaime`
--
ALTER TABLE `jaime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
