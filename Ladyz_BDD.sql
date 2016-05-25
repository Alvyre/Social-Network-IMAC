-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Mai 2016 à 10:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ladyz_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `IdCat` int(5) NOT NULL AUTO_INCREMENT,
  `TitleCat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdCat`),
  UNIQUE KEY `IdCat` (`IdCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`IdCat`, `TitleCat`) VALUES
(1, 'Enseignement'),
(2, 'Logement'),
(3, 'Vie étudiante'),
(4, 'Tutos'),
(5, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `IdComment` int(5) NOT NULL AUTO_INCREMENT,
  `DateComment` date NOT NULL,
  `ContentComment` text,
  `IdUser` int(5) DEFAULT NULL,
  `IdSubject` int(5) DEFAULT NULL,
  PRIMARY KEY (`IdComment`),
  KEY `IdVote` (`IdUser`,`IdSubject`),
  KEY `IdVote_2` (`IdUser`,`IdSubject`),
  KEY `IdUser` (`IdUser`),
  KEY `IdUser_2` (`IdUser`),
  KEY `IdSubject` (`IdSubject`),
  KEY `IdUser_3` (`IdUser`,`IdSubject`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`IdComment`, `DateComment`, `ContentComment`, `IdUser`, `IdSubject`) VALUES
(1, '2016-05-24', 'Oh trop sympa !', 4, 9),
(2, '2016-05-25', 'Je suis intéressé moi !', 1, 1),
(4, '2016-05-25', 'C''est vraiment cool !', 4, 9),
(6, '2016-05-25', 'Je crois que c''est le jeudi 26.', 2, 10),
(7, '2016-05-25', 'Non, c''est jeudi prochain !', 3, 10),
(8, '2016-05-25', 'Ahh bon ? J''étais pas sur !', 3, 10),
(9, '2016-05-25', 'Si tu veux on se voit demain pour régler le problème.', 1, 5),
(10, '2016-05-25', 'C''est bon, on m''a aidé aujourd''hui !', 3, 5),
(11, '2016-05-25', 'Je te conseille de réviser, ce n''était pas super simple l''an dernier.', 1, 3),
(12, '2016-05-25', 'Mais je peux t''aider aussi , si tu veux. Ca te va ce jeudi ?', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`IdSubject`, `TitleSubject`, `ContentSubject`, `DateSubject`, `IdVote`, `IdUser`, `IdCat`) VALUES
(1, 'Logement à Champs', 'Bonjour, je cherche une coloc à Champs sur Marne', '2016-05-24', 1, 1, 2),
(2, 'Coloc à Noisy-le-Grand', 'Bonjour,\r\nJ''ai mon appartement à Noisy-Le-Grand et je cherche un colocataire pour l''année 2017. Quelqu''un est intéressé ?', '2016-05-24', 1, 2, 2),
(3, 'Partiel de maths', 'Salut,\r\nEst-ce que le partiel de maths du S2 est difficile ? J''ai du mal à comprendre les matrices, je peux quand même y arriver ?\r\nMerci d''avance !', '2016-05-24', 1, 2, 1),
(4, 'Histoire de l''art : cours', 'Coucou ! \r\nVous avez un site sympa pour réviser les cours d''histoire de l''art ?', '2016-05-24', 1, 1, 1),
(5, 'Projet de C - IMAC', 'Quelqu''un peut m''aider à débuguer mon projet de C ? J''ai vraiment des difficultés.', '2016-05-24', 1, 3, 1),
(6, 'Semaine de projet web', 'Salut !\r\n\r\nUn groupe a compris comment fonctionne le framework Slim ? Mon équipe a vraiment besoin d''aide rapidement !', '2016-05-24', 1, 3, 1),
(7, 'Manger à Copernic', 'Salut, je suis un futur étudiant d''IMAC et j''aimerais savoir ce qu''il y a sur le campus pour manger le midi (cantine, micro-ondes, etc..).', '2016-05-24', 1, 4, 3),
(8, 'Tutos PHP', 'Regardez ce tuto PHP / MySQL, il est super bien fait ! \r\nhttps://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql', '2016-05-24', 1, 2, 4),
(9, 'Ressources en ligne', 'Site web cool pour trouver des ressources gratuites en ligne :\r\n\r\nhttp://www.blogdumoderateur.com/liste-ressources-gratuites-blue-vertigo/', '2016-05-24', 1, 2, 4),
(10, 'JeudIMAC', 'C''est quand le prochain jeudIMAC ?', '2016-05-24', 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int(5) NOT NULL AUTO_INCREMENT,
  `PSeudoUser` varchar(30) DEFAULT NULL,
  `StatusUser` varchar(15) DEFAULT NULL,
  `PhotoUser` varchar(200) DEFAULT NULL,
  `EmailUser` text,
  `SexUser` varchar(10) DEFAULT NULL,
  `BioUser` text,
  `AdminUser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`IdUser`, `PSeudoUser`, `StatusUser`, `PhotoUser`, `EmailUser`, `SexUser`, `BioUser`, `AdminUser`) VALUES
(1, 'Pauline', 'IMAC2018', NULL, 'test@pauline.com', 'femme', 'Coucou !', 0),
(2, 'Maureen', 'autre', NULL, 'maureen@roche.com', 'femme', 'Je suis Maureen !', 0),
(3, 'Coralie', 'prof', NULL, 'coralie@gold.com', NULL, 'Coralie', 0),
(4, 'Hellowizz', 'prof', NULL, NULL, 'femme', 'Test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `IdVote` int(5) NOT NULL AUTO_INCREMENT,
  `UpVote` tinyint(1) DEFAULT NULL,
  `DownVote` tinyint(1) DEFAULT NULL,
  `IdUser` int(5) NOT NULL,
  `IdComment` int(5) NOT NULL,
  PRIMARY KEY (`IdVote`),
  KEY `IdUser` (`IdUser`,`IdComment`),
  KEY `IdComment` (`IdComment`),
  KEY `IdComment_2` (`IdComment`),
  KEY `IdComment_3` (`IdComment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`IdVote`, `UpVote`, `DownVote`, `IdUser`, `IdComment`) VALUES
(1, 0, 1, 3, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `COMMENT_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`),
  ADD CONSTRAINT `COMMENT_ibfk_3` FOREIGN KEY (`IdSubject`) REFERENCES `subject` (`IdSubject`);

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `SUBJECT_ibfk_3` FOREIGN KEY (`IdCat`) REFERENCES `category` (`IdCat`),
  ADD CONSTRAINT `SUBJECT_ibfk_1` FOREIGN KEY (`IdVote`) REFERENCES `vote` (`IdVote`),
  ADD CONSTRAINT `SUBJECT_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`IdComment`) REFERENCES `comment` (`IdComment`),
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
