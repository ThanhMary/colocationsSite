-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Mars 2018 à 14:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `colocation`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `Num_Annonce` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_annonce` varchar(255) NOT NULL,
  `Adresse` text NOT NULL,
  `Complement_adresse` text,
  `Ville` varchar(100) NOT NULL,
  `Code_postal` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Photo1` varchar(255) DEFAULT NULL,
  `Photo2` varchar(255) DEFAULT NULL,
  `Photo3` varchar(255) DEFAULT NULL,
  `Prix` int(11) NOT NULL,
  `Surface` int(11) NOT NULL,
  `Nb_Personne` int(11) NOT NULL,
  `Date_Disponibilite` date NOT NULL,
  `Date_Fin` date DEFAULT NULL,
  `Date_Annonce` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Num_Annonce`),
  KEY `FOREIGN KEY` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`Num_Annonce`, `Titre_annonce`, `Adresse`, `Complement_adresse`, `Ville`, `Code_postal`, `Description`, `Photo1`, `Photo2`, `Photo3`, `Prix`, `Surface`, `Nb_Personne`, `Date_Disponibilite`, `Date_Fin`, `Date_Annonce`, `Email`) VALUES
(1, 'logement de T2', '10 boulevard Jean Bérha', NULL, 'Nice', '06100', 'atazetpjazeptja', '8.PNG', '2.PNG', '7.PNG', 452, 20, 3, '2018-03-17', '2018-06-21', '2018-03-17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `Email` varchar(100) NOT NULL,
  `Num_Demande` int(11) NOT NULL,
  `Date_Demande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `Email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Ecole` varchar(100) DEFAULT NULL,
  `Tel` int(11) NOT NULL,
  `Etude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`Email`, `password`, `Nom`, `Prenom`, `Ecole`, `Tel`, `Etude`) VALUES
('alexandre.tomasia@outlook.fr', 'a', 'TOMASIA', 'alexandre', 'ILEC ', 0, NULL),
('anna@hotmail.com', 'anna1078', 'anna', 'Mai', 'fafa', 46646464, 'afaf'),
('annadurant@yahoo.fr', 'anna107', 'anna', 'Durant', 'ete', 0, 'tet'),
('nguyenhoa@yahoo.fr', 'hoa107', 'NGUYEN', 'Hoa', 'Ilec', 683760285, 'BTS'),
('nguyenhuy@yahoo.com', 'huy107', 'Huy', 'SU', 'fefef', 0, 'fefef'),
('nguyenthanhmary@yahoo.fr', 'colo107', 'Nguyen', 'Thanh', 'ilec', 1234567, 'SIO');

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE IF NOT EXISTS `recherche` (
  `Num_Demande` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_recherche` varchar(255) NOT NULL,
  `Ville` text NOT NULL,
  `Code_postal` int(11) DEFAULT NULL,
  `Description` text,
  `Prix_max` int(11) NOT NULL,
  `Surface_min` int(11) NOT NULL,
  `Date_Disponibilite` date NOT NULL,
  `Date_Depart` date NOT NULL,
  PRIMARY KEY (`Num_Demande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
