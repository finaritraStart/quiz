-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 jan. 2021 à 08:05
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `pourcentage`
--

DROP TABLE IF EXISTS `pourcentage`;
CREATE TABLE IF NOT EXISTS `pourcentage` (
  `id_pourcentage` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `participant` int(11) NOT NULL,
  `juste` int(11) NOT NULL,
  `faux` int(11) NOT NULL,
  `resultat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pourcentage`),
  KEY `pourcentage_ibfk_1` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pourcentage`
--

INSERT INTO `pourcentage` (`id_pourcentage`, `id_question`, `question`, `participant`, `juste`, `faux`, `resultat`) VALUES
(1, 1, 'Par qui a été inventée la grande faucheuse ?', 2, 0, 2, '0'),
(2, 2, 'Lequel de ces \"content-type\" n\'existe pas dans un header ?', 2, 1, 2, '50');

-- --------------------------------------------------------

--
-- Structure de la table `presentateur`
--

DROP TABLE IF EXISTS `presentateur`;
CREATE TABLE IF NOT EXISTS `presentateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presentateur`
--

INSERT INTO `presentateur` (`id`, `username`, `password`) VALUES
(1, 'finaritra', 'ef1a9b6abe1ca84a3460a826959a557f');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`) VALUES
(1, 'Par qui a été inventée la grande faucheuse ?'),
(2, 'Lequel de ces \"content-type\" n\'existe pas dans un header ?'),
(3, 'La quantité de sang d’un adulte en bonne santé est d’environ:'),
(4, 'Comment récupérer toutes les sous-balises d\'une balise xml \"livre\" ?'),
(5, 'Le cinéma est né:');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(250) NOT NULL,
  `id_question` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `reponse`, `id_question`, `statut`) VALUES
(1, 'france', 1, 0),
(2, 'italie', 1, 1),
(3, 'L’Allemagne', 1, 0),
(4, 'chine', 1, 0),
(5, 'application/pdf             ', 2, 0),
(6, 'image/png', 2, 0),
(7, 'html/xml', 2, 1),
(8, 'text/csv', 2, 0),
(9, '4,5 à 6 litres', 3, 1),
(10, '4 litres', 3, 0),
(11, '7 litres', 3, 0),
(12, '3 à 4,5 litres            ', 3, 0),
(13, '$XML[\"livre\"]', 4, 0),
(14, '$b->xml(\"livre\")', 4, 0),
(15, '$_XML[\'livre\"]', 4, 0),
(16, '$b->children(\"livre\")', 4, 1),
(17, 'Au début du XX siècle', 5, 0),
(18, 'En 1919', 5, 0),
(19, 'A la fin du XIX', 5, 1),
(20, 'A la moitié du XIX siècle', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_saisie`
--

DROP TABLE IF EXISTS `reponse_saisie`;
CREATE TABLE IF NOT EXISTS `reponse_saisie` (
  `id_saisie` int(11) NOT NULL AUTO_INCREMENT,
  `id_reponse` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_saisie`),
  KEY `reponse_saisie_ibfk_1` (`id_reponse`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse_saisie`
--

INSERT INTO `reponse_saisie` (`id_saisie`, `id_reponse`, `session`, `id_question`) VALUES
(1, 1, 'm0o2gisvddvcqgdsdslq3njb6lu3ge79', 1),
(2, 5, 'm0o2gisvddvcqgdsdslq3njb6lu3ge79', 2),
(3, 5, 'm0o2gisvddvcqgdsdslq3njb6lu3ge79', 2),
(4, 9, 'm0o2gisvddvcqgdsdslq3njb6lu3ge79', 3),
(5, 1, 'mf4e3s39bcb9vd6b0tcorqoqh7h2stai', 1),
(6, 7, 'mf4e3s39bcb9vd6b0tcorqoqh7h2stai', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pourcentage`
--
ALTER TABLE `pourcentage`
  ADD CONSTRAINT `pourcentage_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Contraintes pour la table `reponse_saisie`
--
ALTER TABLE `reponse_saisie`
  ADD CONSTRAINT `reponse_saisie_ibfk_1` FOREIGN KEY (`id_reponse`) REFERENCES `reponse` (`id_reponse`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
