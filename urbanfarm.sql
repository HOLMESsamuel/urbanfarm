-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mars 2019 à 08:30
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`n°Actionneur`, `type`, `etat`, `n°installation`) VALUES
(1, 'moteur', 'on', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `n°article` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`n°article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `n°capteur` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE latin1_bin NOT NULL,
  `etat` varchar(10) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL,
  PRIMARY KEY (`n°capteur`),
  UNIQUE KEY `n°installation` (`n°installation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `n°installation`) VALUES
(1, 'temperature', 'on', 1);

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `n°data` int(11) NOT NULL AUTO_INCREMENT,
  `n°capteur` int(11) NOT NULL,
  `date` date NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`n°data`),
  KEY `n°capteur` (`n°capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`n°data`, `n°capteur`, `date`, `valeur`) VALUES
(1, 1, '2019-03-01', 30),
(2, 1, '2019-03-01', 32),
(3, 1, '2019-03-01', 31),
(4, 1, '2019-03-01', 29),
(5, 1, '2019-03-01', 24),
(6, 1, '2019-03-01', 34);

-- --------------------------------------------------------

--
-- Structure de la table `installation`
--

DROP TABLE IF EXISTS `installation`;
CREATE TABLE IF NOT EXISTS `installation` (
  `n°installation` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_bin NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(255) COLLATE latin1_bin NOT NULL,
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`n°installation`),
  UNIQUE KEY `adresse` (`adresse`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `installation`
--

INSERT INTO `installation` (`n°installation`, `nom`, `type`, `adresse`, `email`) VALUES
(1, 'ferme', 'poulailler', '123 rue isep', 'sam.holmes@live.fr');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  `texte` text COLLATE latin1_bin NOT NULL,
  `date` date NOT NULL,
  `n°message` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`n°message`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  `nom` varchar(255) COLLATE latin1_bin NOT NULL,
  `prenom` varchar(255) COLLATE latin1_bin NOT NULL,
  `civilité` varchar(255) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(255) COLLATE latin1_bin NOT NULL,
  `motdepasse` varchar(255) COLLATE latin1_bin NOT NULL,
  `propriétaire` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°panier` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`email`),
  KEY `INDEX` (`n°panier`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `propriétaire`, `n°panier`) VALUES
('bob@gmail.com', 'bob', 'bob', 'm', 'truc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'oui', 1),
('sam.holmes@live.fr', 'Holmes', 'Samuel', 'm', '123 rue isep', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', 'oui', 2),
('samholmes57@gmail.com', 'Holmes', 'Samuel', 'M', '27 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'oui', 14);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `actionneur_ibfk_1` FOREIGN KEY (`n°installation`) REFERENCES `installation` (`n°installation`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`n°installation`) REFERENCES `installation` (`n°installation`);

--
-- Contraintes pour la table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`n°capteur`) REFERENCES `capteur` (`n°capteur`);

--
-- Contraintes pour la table `installation`
--
ALTER TABLE `installation`
  ADD CONSTRAINT `installation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
