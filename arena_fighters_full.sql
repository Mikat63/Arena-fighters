-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 fév. 2026 à 12:46
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
-- Structure de la table `heros`
--

DROP TABLE IF EXISTS `heros`;
CREATE TABLE IF NOT EXISTS `heros` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hp` bigint NOT NULL,
  `atk` bigint NOT NULL,
  `def` bigint NOT NULL,
  `mana` bigint DEFAULT NULL,
  `rage` bigint DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `heros`
--

INSERT INTO `heros` (`id`, `name`, `hp`, `atk`, `def`, `mana`, `rage`, `type`) VALUES
(1, 'Ragnar', 110, 16, 12, NULL, 2, 'guerrier'),
(2, 'Bjorn', 95, 18, 10, NULL, 2, 'guerrier'),
(3, 'Elyra', 75, 21, 6, 1, NULL, 'mage'),
(4, 'Solwen', 70, 23, 5, 1, NULL, 'mage'),
(5, 'Kael', 85, 17, 7, NULL, NULL, 'Archer'),
(6, 'Lyria', 80, 19, 6, NULL, NULL, 'archer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
