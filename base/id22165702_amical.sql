-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 15 mai 2024 à 09:30
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

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

CREATE TABLE `depenses` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_depense` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_user`
--

CREATE TABLE `historique_user` (
  `nom_utilisateur` varchar(100) NOT NULL,
  `date_entre` date NOT NULL,
  `heure_ent` time NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `heure_sortie` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique_user`
--

INSERT INTO `historique_user` (`nom_utilisateur`, `date_entre`, `heure_ent`, `date_sortie`, `heure_sortie`) VALUES
('med', '2024-05-15', '07:34:02', '2024-05-15', '07:34:02'),
('med', '2024-05-15', '07:34:02', '2024-05-15', '07:34:02'),
('med', '2024-05-15', '07:35:38', '2024-05-15', '07:35:38'),
('med', '2024-05-15', '07:35:38', '2024-05-15', '07:35:38'),
('med', '2024-05-15', '08:07:33', '2024-05-15', '08:07:33'),
('med', '2024-05-15', '08:07:33', '2024-05-15', '08:07:33'),
('med', '2024-05-15', '08:18:43', '2024-05-15', '08:18:43'),
('med', '2024-05-15', '08:18:43', '2024-05-15', '08:18:43'),
('med', '2024-05-15', '09:20:44', '2024-05-15', '09:20:44'),
('med', '2024-05-15', '09:20:44', '2024-05-15', '09:20:44'),
('med', '2024-05-15', '09:22:18', '2024-05-15', '09:22:18'),
('med', '2024-05-15', '09:22:18', '2024-05-15', '09:22:18');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `email`, `telephone`, `date_naiss`) VALUES
(10, 'jasser', 'samahdekhilgl@gmail.com', '24045515', '2020-05-15'),
(6, 'samah dekhil', 'samahdekhilgl@gmail.com', '24045515', NULL),
(5, 'Dekhil', 'samahdekhilgl@gmail.com', '24045515', NULL),
(8, 'ahlem', 'samahdekhilgl@gmail.com', '24045515', '1987-05-08'),
(9, 'souhir karwi', 'samahdekhilgl@gmail.com', '24045515', '2000-05-08');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_recette` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `membre_id`, `montant`, `description`, `date_recette`) VALUES
(17, 5, 200.00, 'jkjhjh', '2024-05-06'),
(16, 6, 255.00, 'Vente carnets FÃ©v 2024', '2024-05-06'),
(15, 6, 400.00, 'Vente carnets FÃ©v 2024', '2024-05-06'),
(18, 6, 100.00, 'jkgfhgfhg', '2024-05-06'),
(19, 5, 20.00, 'mmmmmmmmmm', '2024-05-06'),
(20, 6, 200.00, 'llllllllllllllll', '2024-05-06'),
(21, 6, 200.00, 'mmmmmmmmmmmmm', '2024-05-06'),
(22, 6, 200.00, 'gfghfhgfhg', '2024-05-06'),
(23, 6, 200.00, 'mmmmmmmmmmmmmmm', '2024-05-06'),
(24, 7, 200.00, 'kkkkkkkk', '2024-05-06'),
(25, 7, 200.00, 'mmmmmmmmmmm', '2024-05-06'),
(26, 6, 500.00, 'mmmmmmmmmmmm', '2024-05-07'),
(27, 6, 200.00, 'mmmmmmmmm', '2024-05-07'),
(28, 6, 200.00, 'fghgfdgfdf', '2024-05-09'),
(29, 6, 200.00, 'fgggg', '2024-05-09'),
(30, 6, 200.00, 'kkhfghgff', '2024-05-09'),
(31, 7, 200.00, 'gcbhfghfh', '2024-05-09'),
(35, 7, 200.00, 'kgjfhfdgdf', '2024-04-13'),
(36, 7, 200.00, 'Ø´Ø±Ø§Ø¡ Ø­Ø§Ø³ÙˆØ¨', '2024-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `solde`
--

CREATE TABLE `solde` (
  `date` date NOT NULL,
  `solde_caisse` decimal(10,2) DEFAULT NULL,
  `total_cheque` decimal(10,2) DEFAULT NULL,
  `total_espece` decimal(10,2) DEFAULT NULL,
  `solde_debut` decimal(10,2) DEFAULT NULL,
  `solde_fin` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_total` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_recette` decimal(10,2) DEFAULT NULL,
  `solde_mouvement_depense` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `solde`
--

INSERT INTO `solde` (`date`, `solde_caisse`, `total_cheque`, `total_espece`, `solde_debut`, `solde_fin`, `solde_mouvement_total`, `solde_mouvement_recette`, `solde_mouvement_depense`) VALUES
('2024-04-30', 1155.27, 0.00, 1155.27, 1155.27, 1155.27, 1155.27, 1155.27, 0.00),
('2024-05-09', 1555.27, NULL, NULL, 0.00, NULL, 200.00, 200.00, NULL),
('2024-05-13', 1755.27, NULL, NULL, 1555.27, NULL, 200.00, 200.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom_utilisateur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_utilisateur`, `mot_de_passe`, `nb_ent`) VALUES
('med', 'med123', 43),
('me', 'me', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membre_id` (`membre_id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membre_id` (`membre_id`);

--
-- Index pour la table `solde`
--
ALTER TABLE `solde`
  ADD PRIMARY KEY (`date`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
