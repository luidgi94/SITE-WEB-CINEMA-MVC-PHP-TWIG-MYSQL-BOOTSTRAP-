-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 mars 2020 à 17:16
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `idActeur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idActeur`),
  UNIQUE KEY `acteur` (`nom`,`prenom`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`idActeur`, `nom`, `prenom`) VALUES
(1, 'Allen', 'Alfie'),
(2, 'Brando', 'Marlon'),
(3, 'Brasseur', 'Claude'),
(15, 'De Funes', 'Louis'),
(4, 'De Niro', 'Robert'),
(5, 'Fishburne', 'Laurence'),
(6, 'Keaton', 'Diane'),
(7, 'L. Jackson', 'Samuel'),
(8, 'Moss', 'Carrie-Anne'),
(9, 'Pacino', 'Al'),
(10, 'Ratinier', 'Claude'),
(11, 'Reeves', 'Keanu'),
(12, 'Rich', 'Claude'),
(13, 'Thurman', 'Uma'),
(14, 'Travolta', 'John'),
(42, 'Woodley', 'Shailene');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `idFilm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `realisateur` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `affiche` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idFilm`, `titre`, `realisateur`, `affiche`, `annee`) VALUES
(1, 'Matrix', 'Les Wachowski', 'http://fr.web.img6.acsta.net/r_1920_1080/medias/04/34/49/043449_af.jpg', 1999),
(2, 'La soupe aux choux', 'Jean Girault', 'http://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/36/11/21/18478117.jpg', 1981),
(3, 'John Wick', 'David Leitch', 'http://fr.web.img4.acsta.net/pictures/14/10/08/11/49/255061.jpg', 2014),
(4, 'Le Parrain', 'Francis Ford Coppola', 'http://fr.web.img4.acsta.net/medias/nmedia/18/35/57/73/18660716.jpg', 1972),
(5, 'Le souper', 'Edouard Molinaro', 'http://www.cinemapassion.com/lesaffiches/Le-Souper-affiche-12388.jpg', 1992),
(6, 'Pulp Fiction', 'Quentin Tarantino', 'http://fr.web.img4.acsta.net/r_1920_1080/medias/nmedia/18/36/02/52/18686501.jpg', 1994),
(7, 'Le Parrain, 2eme Partie', 'Francis Ford Coppola', 'http://images.fan-de-cinema.com/affiches/large/79/37071.jpg', 1974),
(22, 'Divergente 1', 'Nil Burger', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTC27vudu78glG6MoWqve8sBBh5khqeueFdYrW3zcsMYEdJjTXB', 2014);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idActeur` int(10) UNSIGNED NOT NULL,
  `idFilm` int(10) UNSIGNED NOT NULL,
  `personnage` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idRole`),
  KEY `fk_film_idx` (`idFilm`),
  KEY `fk_acteur_idx` (`idActeur`),
  KEY `unique` (`idActeur`,`idFilm`,`personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idActeur`, `idFilm`, `personnage`, `idRole`) VALUES
(2, 4, 'Vito Corleone', 32),
(3, 5, 'Joseph Fouché', 26),
(4, 4, 'Vito Corleone', 21),
(5, 1, 'Morpheus', 19),
(6, 3, 'Iosef Tarasov', 24),
(6, 7, 'Kay Adams-Corleone', 31),
(8, 1, 'Trinity ', 25),
(9, 4, 'Mickael Corleone', 22),
(9, 7, 'Mickael Corleone', 23),
(11, 1, 'Neo', 17),
(11, 3, 'John Wick', 18),
(11, 6, 'Jules Winnfield', 29),
(12, 5, 'Talleyrand', 27),
(13, 6, 'Mia Wallace', 30),
(14, 6, 'Vincent Vega', 28),
(15, 2, 'Le Glaude', 20),
(42, 22, 'Béatrice Prior', 39);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`) VALUES
(8, 'julia.lav@gmail.com', '$2y$12$2fH.wB46wL1m2eqIBjtGO.tJxW/eJ9.rwupmpNd3Zhm2UNYw4SfR6'),
(6, 'julia.lrgg@mgn.com', '$2y$12$aTDlr.1Y7DnLA4m0gx4DUu8823pHQVoDSGt2QHyCU9xRBY3..AQH6'),
(9, 'julialav@gmail.com', '$2y$12$9lsN2/Yhy6ZPVhG4NgvQruCqbwUS6iNK9SMvxMUjQXjft4gPcRd62'),
(10, 'aaa@a.fr', '$2y$12$xNiVzg1iMkcfEFb8xQMRlufvh47WQVgUBBm1vpb1Gtne8E24wJ.4G');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_acteur` FOREIGN KEY (`idActeur`) REFERENCES `acteurs` (`idActeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
