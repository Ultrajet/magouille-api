-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 mars 2020 à 10:02
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magouille`
--

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`id`, `nom`, `budget`) VALUES
(1, 'Milan AC', 15),
(2, 'Paris-Saint-Germain', 185);

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `club_id`, `nom`, `prenom`, `prix`) VALUES
(1, 2, 'Shevchenko', 'Andreï', 45),
(2, 1, 'Meunier', 'Thomas', 40);

-- --------------------------------------------------------

--
-- Structure de la table `transferts`
--

CREATE TABLE `transferts` (
  `id` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `club_vendeur_id` int(11) NOT NULL,
  `club_acheteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transferts`
--

INSERT INTO `transferts` (`id`, `joueur_id`, `club_vendeur_id`, `club_acheteur_id`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 1, 1, 2),
(4, 1, 2, 1),
(5, 1, 1, 2),
(6, 1, 1, 2),
(7, 1, 1, 2),
(8, 1, 2, 1),
(9, 1, 2, 1),
(10, 1, 2, 1),
(11, 1, 2, 1),
(12, 1, 1, 2),
(13, 1, 2, 1),
(14, 2, 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F0FD889D61190A32` (`club_id`);

--
-- Index pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_47A3EBA3A9E2D76C` (`joueur_id`),
  ADD KEY `IDX_47A3EBA3CC4A48B3` (`club_vendeur_id`),
  ADD KEY `IDX_47A3EBA34855E3D4` (`club_acheteur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transferts`
--
ALTER TABLE `transferts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD CONSTRAINT `FK_F0FD889D61190A32` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Contraintes pour la table `transferts`
--
ALTER TABLE `transferts`
  ADD CONSTRAINT `FK_47A3EBA34855E3D4` FOREIGN KEY (`club_acheteur_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `FK_47A3EBA3A9E2D76C` FOREIGN KEY (`joueur_id`) REFERENCES `joueurs` (`id`),
  ADD CONSTRAINT `FK_47A3EBA3CC4A48B3` FOREIGN KEY (`club_vendeur_id`) REFERENCES `clubs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
