-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 07 avr. 2019 à 15:10
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
  `n°Actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL,
  PRIMARY KEY (`n°Actionneur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`n°Actionneur`, `type`, `etat`, `n°installation`) VALUES
(6, 'lampe', 'off', 10),
(7, 'ventilateur', 'off', 10);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `n°article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE latin1_bin NOT NULL,
  `contenu` text COLLATE latin1_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`n°article`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`n°article`, `titre`, `contenu`, `date`) VALUES
(1, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus aliquet orci, eu maximus leo maximus vitae. Aliquam ultricies neque arcu, id commodo ipsum maximus a. Sed arcu augue, volutpat non luctus non, consequat non orci. Sed lacinia efficitur quam, id semper velit pulvinar in. Morbi vitae ligula eget metus consequat dapibus ac at ante. Aenean risus ipsum, pellentesque ac luctus vel, ornare ac nibh. Integer id magna commodo, facilisis purus eget, vehicula diam. Morbi sit amet nibh id enim sodales commodo eu a massa. Sed ac tortor eget felis pellentesque euismod. Praesent in maximus tellus.\r\n\r\nEtiam vitae lectus iaculis, posuere sapien quis, commodo nulla. Ut in mauris fermentum, efficitur urna a, scelerisque quam. Sed dolor magna, dictum et velit non, sagittis lacinia elit. Duis sem justo, efficitur id arcu sit amet, faucibus varius tortor. Suspendisse faucibus risus non ipsum suscipit congue. Duis sodales tempus enim a ornare. Aliquam interdum sodales metus, fermentum euismod nunc tristique ut. Aenean id ornare turpis, vitae suscipit metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean efficitur ligula lectus, a rutrum nisl lobortis in.\r\n\r\nIn eget turpis viverra, efficitur nisi quis, elementum massa. Integer turpis mi, consequat eu massa hendrerit, malesuada suscipit magna. Ut ultrices blandit ligula, at pellentesque nisl pulvinar maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus tempor, purus id aliquam semper, nunc orci fringilla eros, ut lobortis purus sapien sit amet nisi. Pellentesque vitae est et purus elementum mollis. Aenean et feugiat elit. Donec rhoncus congue sagittis. Aliquam metus ipsum, consectetur a porta quis, euismod ac ipsum. Curabitur rhoncus, tortor ac vestibulum pretium, libero elit dignissim dui, ut vehicula eros felis id nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean placerat condimentum sem vitae vehicula. Curabitur tellus nisl, bibendum finibus nisl eget, placerat ullamcorper erat. Vestibulum in efficitur dolor. Nam elementum sed dolor et fermentum. Suspendisse vulputate lacus a turpis lobortis posuere.\r\n\r\nMauris dignissim ligula eu erat hendrerit posuere non vitae libero. Cras molestie ac nibh in eleifend. Mauris vulputate ante sed quam sollicitudin vulputate ut et tortor. Nullam et sem sit amet nibh rutrum facilisis eget ut tellus. Duis sit amet ultrices ipsum. Vivamus vel lorem gravida velit aliquet aliquet. Quisque in felis justo.\r\n\r\nVivamus eu pulvinar arcu. Morbi vestibulum, lacus molestie ultrices placerat, est eros iaculis est, sed sollicitudin augue erat eget mauris. Proin eu nisl quam. In ligula massa, suscipit in dignissim nec, imperdiet ac neque. Sed suscipit tellus sapien, sit amet ullamcorper massa molestie pulvinar. Donec libero ligula, cursus ac lobortis id, pretium id dolor. Integer venenatis leo quis nunc consectetur, sed finibus est posuere.', '2019-03-29'),
(2, 'L\'impact des oeufs frais sur la santé', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus aliquet orci, eu maximus leo maximus vitae. Aliquam ultricies neque arcu, id commodo ipsum maximus a. Sed arcu augue, volutpat non luctus non, consequat non orci. Sed lacinia efficitur quam, id semper velit pulvinar in. Morbi vitae ligula eget metus consequat dapibus ac at ante. Aenean risus ipsum, pellentesque ac luctus vel, ornare ac nibh. Integer id magna commodo, facilisis purus eget, vehicula diam. Morbi sit amet nibh id enim sodales commodo eu a massa. Sed ac tortor eget felis pellentesque euismod. Praesent in maximus tellus.\r\n\r\n\r\n\r\n\r\n\r\n', '2019-03-30');

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `n°capteur` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL,
  PRIMARY KEY (`n°capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `n°installation`) VALUES
(16, 'temperature', 'on', 10),
(17, 'mouvement', 'on', 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `installation`
--

DROP TABLE IF EXISTS `installation`;
CREATE TABLE IF NOT EXISTS `installation` (
  `n°installation` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE latin1_bin NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(255) COLLATE latin1_bin NOT NULL,
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`n°installation`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `installation`
--

INSERT INTO `installation` (`n°installation`, `nom`, `type`, `adresse`, `email`) VALUES
(10, 'insttion 1', 'serre', 'kjhkjh', 'sam.holmes@live.fr');

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
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `n°produit` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`n°produit`)
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
  `administrateur` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°panier` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`email`),
  KEY `INDEX` (`n°panier`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `administrateur`, `n°panier`) VALUES
('sam.holmes@live.fr', 'holmes', 'samuel', 'M', '27 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'oui', 24),
('samholmes57@gmail.com', 'Holmes', 'Samuel', 'M', '26 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'non', 1);

--
-- Contraintes pour les tables déchargées
--

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
