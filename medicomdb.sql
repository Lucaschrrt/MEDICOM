-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 juil. 2024 à 12:20
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medicomdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `quantite` varchar(255) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`id`, `nom`, `description`, `date_expiration`, `prix`, `quantite`, `date_ajout`, `photo`) VALUES
(1, 'Paracétamol', 'Antidouleur et antipyrétique', '2025-05-22', 1.50, '250', '2023-04-18', NULL),
(2, 'Ibuprofène', 'Anti-inflammatoire non stéroïdien', '2024-01-31', 2.00, '300', '2022-02-25', NULL),
(3, 'Amoxicilline', 'Antibiotique', '2023-11-30', 3.00, '155', '2022-07-20', NULL),
(4, 'Cétirizine', 'Antihistaminique', '2024-02-28', 2.50, '360', '2021-05-20', NULL),
(5, 'Doliprane', 'Antidouleur et antipyrétique', '2023-12-31', 1.50, '750', '2020-01-01', NULL),
(6, 'Spasfon', 'Antispasmodique', '2024-01-31', 3.00, '130', '2022-09-09', NULL),
(7, 'Aspirine', 'Anticoagulant', '2023-11-30', 2.00, '100', '2021-08-31', NULL),
(8, 'Ventoline', 'Bronchodilatateur', '2024-02-28', 4.00, '800', '2021-10-10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'root', 'root');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
