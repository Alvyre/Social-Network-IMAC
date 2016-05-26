-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Mai 2016 à 10:33
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `imac-network`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCat` int(11) NOT NULL,
  `titleCat` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `category`:
--

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCat`, `titleCat`) VALUES
(1, 'Cours'),
(3, 'CoursDeFolie');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `dateComment` date NOT NULL,
  `contentComment` text NOT NULL,
  `idVote` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `comment`:
--   `idSubject`
--       `subject` -> `idSubject`
--   `idUser`
--       `user` -> `idUser`
--   `idVote`
--       `vote` -> `idVote`
--

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`idComment`, `dateComment`, `contentComment`, `idVote`, `idUser`, `idSubject`) VALUES
(1, '2016-05-18', 'Contenu du commentaire 1', 0, 3, 1),
(2, '2016-05-10', 'Contenu du commentaire 2', 0, 5, 1),
(3, '2016-05-27', 'Commentaire 4', 0, 3, 2),
(4, '2016-05-12', 'Commentaire 4', 0, 3, 2),
(5, '2016-05-10', 'Commentaire 5', 0, 3, 2),
(6, '2016-05-11', 'Commentaire 6', 0, 3, 2),
(7, '2016-05-11', 'Commentaire 7', 0, 5, 4),
(8, '2016-05-03', 'Commentaire 8', 0, 5, 5),
(9, '2016-05-10', 'Commentaire 9', 0, 5, 6),
(10, '2016-05-27', 'Commentaire 10', 0, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `idSubject` int(11) NOT NULL,
  `titleSubject` varchar(30) NOT NULL,
  `contentSubject` text NOT NULL,
  `dateSubject` date NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `subject`:
--   `idCat`
--       `category` -> `idCat`
--   `idUser`
--       `user` -> `idUser`
--

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`idSubject`, `titleSubject`, `contentSubject`, `dateSubject`, `idUser`, `idCat`) VALUES
(1, 'Sujet 1', 'contenu du sujet', '2016-05-20', 3, 1),
(2, 'Sujet 2', 'contenu du sujet 2', '2016-05-27', 5, 1),
(3, 'Sujet 3', 'Contenu du sujet 3', '2016-05-20', 3, 1),
(4, 'Sujet 4', 'Contenu du sujet 4', '2016-05-05', 3, 1),
(5, 'Sujet 5', 'Contenu du sujet 5', '2016-05-28', 5, 1),
(6, 'Sujet 6', 'Contenu du sujet 6', '2016-05-30', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `pseudoUser` varchar(20) NOT NULL,
  `statusUser` varchar(20) DEFAULT NULL,
  `photoUser` varchar(100) DEFAULT NULL,
  `emailUser` varchar(100) NOT NULL,
  `sexUser` enum('Homme','Femme','Autre') NOT NULL,
  `bioUser` text,
  `adminUser` tinyint(1) NOT NULL DEFAULT '0',
  `passUser` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `user`:
--

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudoUser`, `statusUser`, `photoUser`, `emailUser`, `sexUser`, `bioUser`, `adminUser`, `passUser`) VALUES
(3, 'Arthuranus', 'Galaxy', 'www.photoUranus.fr', 'arthur@gmail.com', 'Autre', NULL, 0, ''),
(5, 'Luca', 'statusUser', 'photoUser', 'emailUser', '', 'bioUser', 0, 'passUser');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `idVote` int(11) NOT NULL,
  `upVote` int(11) NOT NULL DEFAULT '0',
  `downVote` int(11) NOT NULL DEFAULT '0',
  `idUser` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `vote`:
--   `idSubject`
--       `subject` -> `idSubject`
--   `idUser`
--       `user` -> `idUser`
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idSubject`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`idVote`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `idSubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT;

--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour category
--

--
-- Métadonnées pour comment
--

--
-- Métadonnées pour subject
--

--
-- Métadonnées pour user
--

--
-- Métadonnées pour vote
--

--
-- Métadonnées pour imac-network
--

--
-- Contenu de la table `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('imac-network', 'comment', 'idSubject', 'imac-network', 'subject', 'idSubject'),
('imac-network', 'comment', 'idUser', 'imac-network', 'user', 'idUser'),
('imac-network', 'comment', 'idVote', 'imac-network', 'vote', 'idVote'),
('imac-network', 'subject', 'idCat', 'imac-network', 'category', 'idCat'),
('imac-network', 'subject', 'idUser', 'imac-network', 'user', 'idUser'),
('imac-network', 'vote', 'idSubject', 'imac-network', 'subject', 'idSubject'),
('imac-network', 'vote', 'idUser', 'imac-network', 'user', 'idUser');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
