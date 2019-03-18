-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 mars 2019 à 09:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `urbanfarm`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

DROP TABLE IF EXISTS `actionneur`;
CREATE TABLE IF NOT EXISTS `actionneur` (
  `n°Actionneur` int(11) NOT NULL,
  `type` varchar(10) COLLATE latin1_bin NOT NULL,
  `etat` varchar(10) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL,
  PRIMARY KEY (`n°Actionneur`),
  UNIQUE KEY `n°installation` (`n°installation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`n°Actionneur`, `type`, `etat`, `n°installation`) VALUES
(1, 'moteur', 'on', 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `n°capteur` int(11) NOT NULL,
  `type` varchar(20) COLLATE latin1_bin NOT NULL,
  `etat` varchar(10) COLLATE latin1_bin NOT NULL,
  `date` date NOT NULL,
  `valeur` int(11) NOT NULL,
  `n°installation` int(11) NOT NULL,
  PRIMARY KEY (`n°capteur`),
  UNIQUE KEY `n°installation` (`n°installation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `date`, `valeur`, `n°installation`) VALUES
(1, 'temperature', 'on', '2019-03-12', 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ferme`
--

DROP TABLE IF EXISTS `ferme`;
CREATE TABLE IF NOT EXISTS `ferme` (
  `adresse` varchar(30) COLLATE latin1_bin NOT NULL,
  `email` varchar(20) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `installation`
--

DROP TABLE IF EXISTS `installation`;
CREATE TABLE IF NOT EXISTS `installation` (
  `n°installation` int(11) NOT NULL,
  `type` varchar(20) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(40) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`n°installation`),
  UNIQUE KEY `adresse` (`adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `installation`
--

INSERT INTO `installation` (`n°installation`, `type`, `adresse`) VALUES
(1, 'poulailler', '123 rue isep');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `email` varchar(20) COLLATE latin1_bin NOT NULL,
  `nom` varchar(20) COLLATE latin1_bin NOT NULL,
  `prenom` varchar(20) COLLATE latin1_bin NOT NULL,
  `civilité` varchar(1) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(40) COLLATE latin1_bin NOT NULL,
  `mot de passe` varchar(30) COLLATE latin1_bin NOT NULL,
  `propriétaire` varchar(4) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `mot de passe`, `propriétaire`) VALUES
('bob@thebest.com', 'bob', 'bob', 'M', '123 rue isep', '123', 'oui');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
