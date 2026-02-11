-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 fév. 2026 à 15:42
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arena_fighters`
--

-- --------------------------------------------------------

--
-- Structure de la table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
CREATE TABLE IF NOT EXISTS `monsters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hp` bigint NOT NULL,
  `atk` bigint NOT NULL,
  `def` bigint NOT NULL,
  `mega_attack` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monsters`
--

INSERT INTO `monsters` (`id`, `name`, `hp`, `atk`, `def`, `mega_attack`, `type`) VALUES
(1, 'Orc Grinçant', 55, 12, 5, NULL, 'orc'),
(2, 'Orc Éclaireur', 65, 14, 6, NULL, 'orc'),
(3, 'Orc Berserker', 75, 18, 5, NULL, 'orc'),
(4, 'Golem de Terre', 130, 14, 13, NULL, 'golem'),
(5, 'Golem de Pierre', 120, 12, 12, NULL, 'golem'),
(6, 'Golem Runique', 110, 16, 14, NULL, 'golem'),
(7, 'Dragon Rouge', 140, 18, 9, '1', 'dragon'),
(8, 'Dragons des Cendres', 170, 20, 11, '2', 'dragon'),
(9, 'Dragon Ancien', 200, 22, 12, '3', 'dragon'),
(10, 'Dragon Noir', 190, 25, 11, '2', 'dragon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
