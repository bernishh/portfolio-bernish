-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 juin 2023 à 12:07
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(1, 'emma', 'emma@admin.com', '1234'),
(2, 'emmanuelle', 'emmanuelle@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(1000) NOT NULL,
  `price` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `img`, `price`, `name`) VALUES
(1, 'img1.png', 7, 'Meat Salad'),
(2, 'img2.png', 8, 'Meat Frite'),
(3, 'img3.png', 4, 'Salad');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`) VALUES
(42, '1683416322.jpg', 'robe', 500, '                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae consequatur tempore ut eligendi qui quam? Aliquam nemo ipsam eius doloremque expedita facilis magni, assumenda nobis? Odit libero sed consequuntur molestias?'),
(43, '1683416351.jpg', 'sari', 255, '                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae consequatur tempore ut eligendi qui quam? Aliquam nemo ipsam eius doloremque expedita facilis magni, assumenda nobis? Odit libero sed consequuntur molestias?'),
(44, '1683416376.jpg', 'MOUNGALA', 350, '                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae consequatur tempore ut eligendi qui quam? Aliquam nemo ipsam eius doloremque expedita facilis magni, assumenda nobis? Odit libero sed consequuntur molestias?'),
(45, '1683416445.jpg', 'claverna', 522, '                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae consequatur tempore ut eligendi qui quam? Aliquam nemo ipsam eius doloremque expedita facilis magni, assumenda nobis? Odit libero sed consequuntur molestias?'),
(46, '1683417012.jpg', 'rose4', 5566, '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti enim at similique minus nisi neque culpa quos? Ipsam fugit provident quos voluptate, odio placeat et beatae repellat adipisci nulla quisquam.'),
(47, '1683417030.jpg', 'rose', 45, '    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti enim at similique minus nisi neque culpa quos? Ipsam fugit provident quos voluptate, odio placeat et beatae repellat adipisci nulla quisquam.'),
(49, '1683571158.jpg', 'sac à main', 500, '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quam eaque aliquam consequuntur ullam omnis corporis enim asperiores earum labore, eligendi dolor exercitationem quidem provident modi. Necessitatibus ut ex architecto.'),
(50, '1683796337.jpg', 'sac à main', 500, 'emm\r\nanuelle\r\n'),
(51, '1683865552.jpg', 'sac à main', 5522, 'ljhbgvfcxwcvbn,');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`) VALUES
(1, 'emmanuelle', 'emmanulle@gmail.com', '$2y$10$684cgNajmD4T719FClQj4.g3ay18BLQRA00rlS4Z2z1TGmQZ4zCxW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
