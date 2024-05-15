-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 mai 2024 à 08:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id22165702_amical`
--

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `description` text,
  `date_depense` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique_user`
--

DROP TABLE IF EXISTS `historique_user`;
CREATE TABLE IF NOT EXISTS `historique_user` (
  `nom_utilisateur` varchar(100) NOT NULL,
  `date_entre` date NOT NULL,
  `heure_ent` time NOT NULL,
  `date_sortie` date NOT NULL,
  `heure_sortie` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `email`, `telephone`) VALUES
(7, 'Ø¯Ø®ÙŠÙ„ Ø³Ù…Ø§Ø­', 'samahdekhilgl@gmail.com', '24045515'),
(6, 'samah dekhil', 'samahdekhilgl@gmail.com', '24045515'),
(5, 'Dekhil', 'samahdekhilgl@gmail.com', '24045515');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `description` text,
  `date_recette` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `membre_id`, `montant`, `description`, `date_recette`) VALUES
(17, 5, '200.00', 'jkjhjh', '2024-05-06'),
(16, 6, '255.00', 'Vente carnets FÃ©v 2024', '2024-05-06'),
(15, 6, '400.00', 'Vente carnets FÃ©v 2024', '2024-05-06'),
(18, 6, '100.00', 'jkgfhgfhg', '2024-05-06'),
(19, 5, '20.00', 'mmmmmmmmmm', '2024-05-06'),
(20, 6, '200.00', 'llllllllllllllll', '2024-05-06'),
(21, 6, '200.00', 'mmmmmmmmmmmmm', '2024-05-06'),
(22, 6, '200.00', 'gfghfhgfhg', '2024-05-06'),
(23, 6, '200.00', 'mmmmmmmmmmmmmmm', '2024-05-06'),
(24, 7, '200.00', 'kkkkkkkk', '2024-05-06'),
(25, 7, '200.00', 'mmmmmmmmmmm', '2024-05-06'),
(26, 6, '500.00', 'mmmmmmmmmmmm', '2024-05-07'),
(27, 6, '200.00', 'mmmmmmmmm', '2024-05-07'),
(28, 6, '200.00', 'fghgfdgfdf', '2024-05-09'),
(29, 6, '200.00', 'fgggg', '2024-05-09'),
(30, 6, '200.00', 'kkhfghgff', '2024-05-09'),
(31, 7, '200.00', 'gcbhfghfh', '2024-05-09'),
(35, 7, '200.00', 'kgjfhfdgdf', '2024-04-13'),
(36, 7, '200.00', 'Ø´Ø±Ø§Ø¡ Ø­Ø§Ø³ÙˆØ¨', '2024-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `solde`
--

DROP TABLE IF EXISTS `solde`;
CREATE TABLE IF NOT EXISTS `solde` (
  `date` date NOT NULL,
  `solde_caisse` decimal(10,2) DEFAULT NULL,
  `total_cheque` decimal(10,2) DEFAULT NULL,
  `total_espece` decimal(10,2) DEFAULT NULL,
  `solde_debut` decimal(10,2) DEFAULT NULL,
  `solde_fin` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_total` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_recette` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_depense` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `solde`
--

INSERT INTO `solde` (`date`, `solde_caisse`, `total_cheque`, `total_espece`, `solde_debut`, `solde_fin`, `solde_mouvement_total`, `solde_mouvement_recette`, `solde_mouvement_depense`) VALUES
('2024-04-30', '1155.27', '0.00', '1155.27', '1155.27', '1155.27', '1155.27', '1155.27', '0.00'),
('2024-05-09', '1555.27', NULL, NULL, '0.00', NULL, '200.00', '200.00', NULL),
('2024-05-13', '1755.27', NULL, NULL, '1555.27', NULL, '200.00', '200.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom_utilisateur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_utilisateur`, `mot_de_passe`, `nb_ent`) VALUES
('med', 'med123', 32),
('me', 'me', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
