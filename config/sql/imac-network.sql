-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 26 Mai 2016 à 22:44
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `IMAC_Talks_BDD`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `titleCat` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idCat`, `titleCat`) VALUES
(1, 'Enseignement'),
(2, 'Logement'),
(4, 'Vie étudiante'),
(5, 'Divers'),
(6, 'Tutos'),
(7, 'Actualités');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `dateComment` date NOT NULL,
  `contentComment` text NOT NULL,
  `idVote` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`idComment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`idComment`, `dateComment`, `contentComment`, `idVote`, `idUser`, `idSubject`) VALUES
(0, '2016-04-16', 'Salut, \r\nAlors pour accéder à l''école, il faut entrer dans le bâtiment Copernic (5 bd Descartes). Puis tu vas à l''étage, on sera là pour t''y accueillir ! :)', 0, 5, 1),
(1, '2016-04-12', 'Ok merci pour toutes ces informations. On se croisera peut être samedi alors !', 0, 3, 1),
(2, '2016-05-10', 'Ouais bonne idée. Mais on doit renvoyer la BDD là alors je vous laisse. bisous', 0, 12, 1),
(3, '2016-05-27', 'Très bonne initiative. Pauline Vivier au fond vous avez compris ?', 0, 16, 2),
(4, '2016-05-12', 'Je serais là aussi pour aider :)', 0, 3, 2),
(5, '2016-05-10', '-_-"', 0, 13, 2),
(6, '2016-05-11', 'Super :D', 0, 3, 2),
(7, '2016-05-11', 'Viens, on est bien bien bien !', 0, 5, 4),
(8, '2016-05-03', 'Merci ! Steeve président ', 0, 5, 5),
(9, '2016-05-10', 'En gros c''est simple, il faut retenir que pour le changement de base : la matrice d''un endomorphisme relative aux bases B et B'' est la matrice dont les coordonnées des colonnes sont les images par l''endomorphisme des éléments de B exprimés dans B''. @+ ', 0, 5, 6),
(11, '2016-05-28', 'Je serais là ! ', 0, 16, 3),
(12, '2016-05-30', 'Non j''ai rien reçu... je me posais la même question ! ', 0, 2, 5),
(13, '2016-05-31', 'C''est demain !! Il faut vite s''inscrire chez Sylvie. Dépéchez vous vite vite vite ! La clé y''a plus de temps !!! ', 0, 5, 5),
(14, '2016-05-27', 'ouais ouais ouais ouais c''est imminent !', 0, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `idSubject` int(11) NOT NULL AUTO_INCREMENT,
  `titleSubject` varchar(30) NOT NULL,
  `contentSubject` text NOT NULL,
  `dateSubject` date NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  PRIMARY KEY (`idSubject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`idSubject`, `titleSubject`, `contentSubject`, `dateSubject`, `idUser`, `idCat`) VALUES
(1, 'Portes ouvertes', 'Bonjour,\r\nJe suis étudiante en MMI. J''aurais voulu venir aux portes ouvertes de l''IMAC ce weekend, mais j''ai du mal à trouver l''adresse... Quelqu''un pour m''éclairer ? --''', '2016-04-15', 3, 7),
(2, 'Tutos polynomes', '[PROJET C POLYNOMES] [IMAC1]\nCoucou à tous, Noémie propose (pour ceux qui veulent) un petit cours de maths sur les polynomes, jeudi après-midi en 1B082.', '2015-12-14', 5, 6),
(3, 'Passation BDI', 'Salut les chevals !\r\nOn vous informe que la passation des membres du BDI aura lieu demain à 10h30 en 1B016. \r\nOn compte sur vous pour venir donner votre soutient à votre BDI préféré <3\r\n', '2016-03-31', 3, 4),
(4, 'Recherche colocation', 'Salut IMACs et futurs IMACs ! J''arrive à Champs sur Marne à la rentrée (ouais !). Je cherche une colocation. L''un d''entre vous connait des bons plans ? \nMerci d''avance !', '2016-05-05', 3, 2),
(5, 'Salle de soutenance synthèse d', 'L''un d''entre vous sait où est ce qu''on fera nos soutenances de synthèse d''images ? Il y a eu un mail ? ', '2016-04-20', 5, 1),
(6, 'Cours de maths', 'Coucou, \nJe voulais avoir quelques infos sur le cours de maths, j''étais absent la dernière fois. Une bonne âme pour me faire un résumé du cours ?', '2016-05-30', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoUser` varchar(20) NOT NULL,
  `statusUser` varchar(20) DEFAULT NULL,
  `photoUser` varchar(100) DEFAULT NULL,
  `emailUser` varchar(100) NOT NULL,
  `sexUser` enum('Homme','Femme','Autre') NOT NULL,
  `bioUser` text,
  `adminUser` tinyint(1) NOT NULL DEFAULT '0',
  `passUser` varchar(16) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudoUser`, `statusUser`, `photoUser`, `emailUser`, `sexUser`, `bioUser`, `adminUser`, `passUser`) VALUES
(3, 'Arthuranus', 'IMAC2018', 'www.photoUranus.fr', 'arthur@gmail.com', 'Autre', 'J''aime Star Wars et faire des photos.', 0, 'anus'),
(5, 'Luca', 'IMAC2018', '', 'lucas@soulet.com', '', 'J''aime l''humour et le cassoulet <3', 0, 'passUser'),
(6, 'Qaurantin', 'Professeur', NULL, 'monsieurporc@déchaumeu.org', 'Homme', 'On m''appelle monsieur porc\r\n#bloutouffe', 0, 'crottin'),
(7, 'Maurène', 'IMAC2018', NULL, 'maumau@imaclove.com', 'Femme', 'Jouer aux jeux vidéo. Faire des tableaux Excel.', 0, 'bidet'),
(12, 'kraliw', 'IMAC2018', NULL, 'coco@caine.com', 'Femme', 'Tim Burton = la vie <3', 0, 'lsd'),
(13, 'Hellowizz', 'IMAC2018', NULL, 'lolo@ferrari.org', 'Autre', 'Kawaii des mangas et des gyozas //3//', 0, 'alexforever'),
(16, 'Mitch', 'Professeur', NULL, 'michel@landschoot.com', 'Homme', 'Enseignant de C, Java.', 0, 'informatique'),
(17, 'vince', 'Professeur', NULL, 'vincent@nozick.com', 'Homme', 'Professeur de synthèse d''images et responsable des IMAC2', 0, 'petitbits');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `idVote` int(11) NOT NULL AUTO_INCREMENT,
  `upVote` int(11) NOT NULL DEFAULT '0',
  `downVote` int(11) NOT NULL DEFAULT '0',
  `idUser` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`idVote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`idVote`, `upVote`, `downVote`, `idUser`, `idSubject`) VALUES
(1, 1, 0, 3, 2),
(2, 1, 0, 5, 2),
(3, 0, 1, 6, 2),
(4, 1, 0, 7, 3),
(5, 1, 0, 7, 4),
(6, 0, 1, 5, 1),
(7, 0, 1, 5, 6),
(8, 1, 0, 13, 6),
(9, 1, 0, 17, 3),
(10, 1, 0, 17, 2),
(11, 1, 0, 17, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
