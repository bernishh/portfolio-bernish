-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 24 nov. 2022 à 08:18
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create database chat2;
use chat2;
--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `destinataire` varchar(100) NOT NULL DEFAULT 'tous',
  PRIMARY KEY (`idm`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`idm`, `pseudo`, `message`, `date`, `destinataire`) VALUES
(1, 'Fred', 'il fait beau', '2022-11-14 15:02:58', 'tous'),
(2, 'Paul', 'Pas du tout', '2022-11-14 15:02:58', 'tous'),
(3, 'Stephane', 'Ca fonctionne plutot bien', '2022-11-15 15:32:33', 'tous'),
(4, 'Elsa', 'Qui veut sortir', '2022-11-21 15:43:40', 'tous'),
(5, 'Elsa', 'Qui veut sortir', '2022-11-21 15:50:13', 'tous'),
(6, 'Louis', 'Salut', '2022-11-21 16:23:22', 'prof');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `niveau` int(1) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idu`, `pseudo`, `mdp`, `mail`, `niveau`) VALUES
(1, 'prof', 'prof', 'prof@prof.fr', 2),
(2, 'eleve', 'eleve', 'eleve@eleve.fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
