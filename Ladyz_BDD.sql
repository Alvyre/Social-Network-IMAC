-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 23 Mai 2016 à 17:05
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Ladyz_BDD`
--

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORY`
--

CREATE TABLE IF NOT EXISTS `CATEGORY` (
  `IdCat` int(5) NOT NULL AUTO_INCREMENT,
  `TitleCat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdCat`),
  UNIQUE KEY `IdCat` (`IdCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `COMMENT`
--

CREATE TABLE IF NOT EXISTS `COMMENT` (
  `IdComment` int(5) NOT NULL AUTO_INCREMENT,
  `DateComment` date NOT NULL,
  `ContentComment` text,
  `IdVote` int(5) DEFAULT NULL,
  `IdUser` int(5) DEFAULT NULL,
  `IdSubject` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdComment`),
  KEY `IdVote` (`IdVote`,`IdUser`,`IdSubject`),
  KEY `IdVote_2` (`IdVote`,`IdUser`,`IdSubject`),
  KEY `IdUser` (`IdUser`),
  KEY `IdUser_2` (`IdUser`),
  KEY `IdSubject` (`IdSubject`),
  KEY `IdUser_3` (`IdUser`,`IdSubject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS POUR LA TABLE `COMMENT`:
--   `IdSubject`
--       `SUBJECT` -> `IdSubject`
--   `IdVote`
--       `VOTE` -> `IdVote`
--   `IdUser`
--       `USER` -> `IdUser`
--

-- --------------------------------------------------------

--
-- Structure de la table `SUBJECT`
--

CREATE TABLE IF NOT EXISTS `SUBJECT` (
  `IdSubject` int(5) NOT NULL AUTO_INCREMENT,
  `TitleSubject` varchar(100) DEFAULT NULL,
  `ContentSubject` text,
  `DateSubject` date NOT NULL,
  `IdVote` int(5) DEFAULT NULL,
  `IdUser` int(5) DEFAULT NULL,
  `IdCat` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdSubject`),
  KEY `IdVote` (`IdVote`),
  KEY `IdVote_2` (`IdVote`),
  KEY `IdUser` (`IdUser`),
  KEY `IdCat` (`IdCat`),
  KEY `IdVote_3` (`IdVote`,`IdUser`,`IdCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS POUR LA TABLE `SUBJECT`:
--   `IdCat`
--       `CATEGORY` -> `IdCat`
--   `IdVote`
--       `VOTE` -> `IdVote`
--   `IdUser`
--       `USER` -> `IdUser`
--

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `IdUser` int(5) NOT NULL AUTO_INCREMENT,
  `PSeudoUser` varchar(30) DEFAULT NULL,
  `StatusUser` varchar(15) DEFAULT NULL,
  `PhotoUser` varchar(200) DEFAULT NULL,
  `EmailUser` text,
  `SexUser` varchar(10) DEFAULT NULL,
  `BioUser` text,
  `AdminUser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `VOTE`
--

CREATE TABLE IF NOT EXISTS `VOTE` (
  `IdVote` int(5) NOT NULL AUTO_INCREMENT,
  `UpVote` tinyint(1) DEFAULT NULL,
  `DownVote` tinyint(1) DEFAULT NULL,
  `IdUser` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdVote`),
  KEY `IdUser` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS POUR LA TABLE `VOTE`:
--   `IdUser`
--       `USER` -> `IdUser`
--

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD CONSTRAINT `COMMENT_ibfk_3` FOREIGN KEY (`IdSubject`) REFERENCES `SUBJECT` (`IdSubject`),
  ADD CONSTRAINT `COMMENT_ibfk_1` FOREIGN KEY (`IdVote`) REFERENCES `VOTE` (`IdVote`),
  ADD CONSTRAINT `COMMENT_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `USER` (`IdUser`);

--
-- Contraintes pour la table `SUBJECT`
--
ALTER TABLE `SUBJECT`
  ADD CONSTRAINT `SUBJECT_ibfk_3` FOREIGN KEY (`IdCat`) REFERENCES `CATEGORY` (`IdCat`),
  ADD CONSTRAINT `SUBJECT_ibfk_1` FOREIGN KEY (`IdVote`) REFERENCES `VOTE` (`IdVote`),
  ADD CONSTRAINT `SUBJECT_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `USER` (`IdUser`);

--
-- Contraintes pour la table `VOTE`
--
ALTER TABLE `VOTE`
  ADD CONSTRAINT `VOTE_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `USER` (`IdUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
