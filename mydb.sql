-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Novembre 2020 à 14:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `dateinscription` datetime NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gendre` varchar(11) CHARACTER SET utf8 NOT NULL,
  `idpublic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `pseudo`, `datenaissance`, `dateinscription`, `mail`, `password`, `gendre`, `idpublic`) VALUES
(16, 'koceilaaas', '2020-11-10', '2020-11-14 17:50:13', 'koceilaa@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eoOhX.a1dfjyjsjQ0mJCHlFXEOgvWu2y', 'H', '5fb00ac5184f8');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `Categorie` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `date_time_publication` datetime NOT NULL,
  `date_time_edition` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `Categorie`, `description`, `contenu`, `date_time_publication`, `date_time_edition`) VALUES
(8, 'L’épidémie de COVID-19 en France', 'Actualité', 'Ratxsxsxsx', 'sxsxsxsxsxsxs', '2020-11-15 00:26:11', '2020-11-15 00:26:11'),
(11, 'L’épidémie de COVID-19 en France', 'Actualité', 'deeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2020-11-15 01:47:57', '2020-11-15 01:47:57'),
(12, 'ecomerce', 'Actualité', 'ccff,,sdsdjkjksdjkjksdds', 'sdklklsdklkldkldkldklklsdklds', '2020-11-15 02:06:56', '2020-11-15 02:06:56');

-- --------------------------------------------------------

--
-- Structure de la table `article_populaire`
--

CREATE TABLE IF NOT EXISTS `article_populaire` (
  `id_article_populaire` int(11) NOT NULL,
  `compteur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article_populaire`
--

INSERT INTO `article_populaire` (`id_article_populaire`, `compteur`) VALUES
(4, 0),
(8, 0),
(11, 0),
(12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `dateinscription` datetime NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gendre` varchar(11) CHARACTER SET utf8 NOT NULL,
  `idpublic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `datenaissance`, `dateinscription`, `mail`, `password`, `gendre`, `idpublic`) VALUES
(1, 'koceila', '2019-09-22', '2019-09-01 15:33:44', 'koucii94@hotmail.fr', '$2a$10$1qAz2wSx3eDc4rFv5tGb5erdlceeQPQg8Lr3y033S2uTjGiydzk3q', 'H', '5d6bc8b81f6a8'),
(2, '', '0000-00-00', '0000-00-00 00:00:00', 'koceila@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eVlWEut0wCimS1HjMXtsHOEUcLy0heMy', 'P', '5fafe103de2de'),
(3, 'koukou', '1997-11-16', '2020-11-14 15:04:41', 'koceilaa@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eoOhX.a1dfjyjsjQ0mJCHlFXEOgvWu2y', 'H', '5fafe3f987207'),
(4, '', '0000-00-00', '0000-00-00 00:00:00', 'dedededd@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eoOhX.a1dfjyjsjQ0mJCHlFXEOgvWu2y', 'P', '5fb0024dabfdd'),
(5, 'koceilaaa', '2020-11-03', '2020-11-14 17:48:10', 'koukou@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eoOhX.a1dfjyjsjQ0mJCHlFXEOgvWu2y', 'H', '5fb00a4a99f82'),
(6, '', '0000-00-00', '0000-00-00 00:00:00', 'koceilaaaa@hotmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eoOhX.a1dfjyjsjQ0mJCHlFXEOgvWu2y', 'P', '5fb13674ba187');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
