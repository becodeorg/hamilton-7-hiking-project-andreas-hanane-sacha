-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 21 déc. 2022 à 08:47
-- Version du serveur :  8.0.21-0ubuntu0.20.04.4
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hamilton-7-hiking-ahs`
--

-- --------------------------------------------------------

--
-- Structure de la table `hikes`
--

CREATE TABLE `hikes` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `distance` float NOT NULL,
  `duration` int NOT NULL,
  `elevation_gain` int DEFAULT NULL,
  `description` text NOT NULL,
  `isUpdated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `hikes`
--

INSERT INTO `hikes` (`id`, `id_user`, `name`, `date_creation`, `distance`, `duration`, `elevation_gain`, `description`, `isUpdated`) VALUES
(1, 1, 'Trail des fagnes', '2022-12-16', 10, 120, 100, 'C est joli mais c est long', NULL),
(2, 1, 'Trail de SPA', '2022-12-15', 30, 360, 300, 'C est joli mais c est a SPA', NULL),
(3, 1, 'Rando Tilff', '2022-12-14', 7, 80, 10, 'C est joli mais c est long', NULL),
(4, 1, 'Promenade de Han', '2022-12-13', 10, 120, 100, 'C est joli mais c est long', NULL),
(5, 1, 'Dreilandereck', '2022-12-12', 40, 480, 300, 'C est joli mais c est long', NULL),
(6, 1, 'Montee de Montjoie', '2022-12-11', 10, 120, 200, 'C est joli mais c est long', NULL),
(7, 1, 'Promenade des trois vierges', '2022-12-10', 10, 120, 100, 'C est joli mais c est long', NULL),
(8, 1, 'Route des tros Marets', '2022-12-09', 10, 120, 100, 'C est joli mais c est long', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Hard'),
(2, 'Rocks'),
(3, 'Forest'),
(4, 'Historical'),
(5, 'River');

-- --------------------------------------------------------

--
-- Structure de la table `tags_hikes_links`
--

CREATE TABLE `tags_hikes_links` (
  `id_tag` int NOT NULL,
  `id_hike` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags_hikes_links`
--

INSERT INTO `tags_hikes_links` (`id_tag`, `id_hike`) VALUES
(2, 1),
(1, 2),
(3, 3),
(4, 4),
(1, 5),
(5, 6),
(5, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nickname` varchar(160) NOT NULL,
  `firstname` varchar(160) NOT NULL,
  `lastname` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `firstname`, `lastname`, `email`, `password`, `is_admin`) VALUES
(1, 'Nicktest2', 'Firsttest2', 'Lasttest', 'test2@mail.com', '$2y$10$QFqI7TK3mKnHYB4w3HKKTOC8wUj1SxLH43rCMcoW7oABWHtVgGX7.', 0),
(2, 'admin', 'admin_firstname2222', 'admin_lastname', 'admin222@email.com', '$2y$10$Ls/oDQ73WipfJyXvhohdL.ZASQN3oHZ30F5uA2f37k6KPksp1umuW', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hikes`
--
ALTER TABLE `hikes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
