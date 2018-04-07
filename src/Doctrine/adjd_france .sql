-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 23 mars 2018 à 15:24
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adjd_france`
--

-- --------------------------------------------------------

--
-- Structure de la table `adjd_gallery`
--

DROP TABLE IF EXISTS `adjd_gallery`;
CREATE TABLE IF NOT EXISTS `adjd_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `legend` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adjd_member`
--

DROP TABLE IF EXISTS `adjd_member`;
CREATE TABLE IF NOT EXISTS `adjd_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adjd_partner`
--

DROP TABLE IF EXISTS `adjd_partner`;
CREATE TABLE IF NOT EXISTS `adjd_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adjd_project`
--

DROP TABLE IF EXISTS `adjd_project`;
CREATE TABLE IF NOT EXISTS `adjd_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adjd_user`
--

DROP TABLE IF EXISTS `adjd_user`;
CREATE TABLE IF NOT EXISTS `adjd_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_538720A0F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `adjd_user`
--

INSERT INTO `adjd_user` (`id`, `username`, `password`) VALUES
(4, 'admin_guillaume2', '$2y$13$0Qe9Ulzm0vGbnDxh5m4E3Oc/Lr3fPAunQ7oO6nyASdFv3Fmcl.z8e'),
(5, 'morrel', '$2y$13$//0AcHaCZcSAjDvxjDeHnOeMLziojZexUm1vZxIWbPwzFohvlMmFy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
