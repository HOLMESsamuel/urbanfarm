-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 mai 2019 à 07:36
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`n°Actionneur`, `type`, `etat`, `n°installation`) VALUES
(15, 'lampe', 'off', 23),
(16, 'ventilateur', 'off', 23),
(21, 'moteur', 'off', 27),
(22, 'lampe', 'off', 27),
(23, 'ventilateur', 'off', 28),
(24, 'ventilateur', 'off', 29);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`n°article`, `titre`, `contenu`, `date`) VALUES
(1, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus aliquet orci, eu maximus leo maximus vitae. Aliquam ultricies neque arcu, id commodo ipsum maximus a. Sed arcu augue, volutpat non luctus non, consequat non orci. Sed lacinia efficitur quam, id semper velit pulvinar in.', '2019-03-29'),
(2, 'L\'impact des oeufs frais sur la santé', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2019-03-30'),
(3, 'Potager et legumes', 'Démarrer un potager n’est pas toujours chose facile, surtout lorsqu’on y connait pas grand choses à la culture des légumes.\r\nPourtant, cultiver ses légumes soi-même est beaucoup plus simple que ça en a l’air !', '2019-05-08'),
(4, 'Potager et legumes', 'Démarrer un potager n’est pas toujours chose facile, surtout lorsqu’on y connait pas grand choses à la culture des légumes.\r\nPourtant, cultiver ses légumes soi-même est beaucoup plus simple que ça en a l’air !', '2019-05-08'),
(5, 'ABC', 'un petit test', '2019-05-07');

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `n°installation`) VALUES
(30, 'temperature', 'on', 23),
(31, 'mouvement', 'on', 23),
(37, 'temperature', 'on', 27),
(38, 'mouvement', 'on', 27),
(39, 'temperature', 'on', 28),
(40, 'lumiere', 'on', 28),
(41, 'temperature', 'on', 29),
(42, 'mouvement', 'on', 29);

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `installation`
--

INSERT INTO `installation` (`n°installation`, `nom`, `type`, `adresse`, `email`) VALUES
(10, 'insttion 1', 'serre', 'kjhkjh', 'sam.holmes@live.fr'),
(23, 'poulailler', 'poulailler', '10 rue de vanves', 'samholmes57@gmail.com'),
(27, 'demo', 'poulailler', '10 rue de vanves', 'samholmes57@gmail.co'),
(28, 'Tomate', 'serre', '', 'samholmes57@gmail.com'),
(29, 'installation', 'serre', '', 'anne@gmail.com');

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
  `n°produit` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `description` text COLLATE latin1_bin NOT NULL,
  `prix` decimal(11,2) NOT NULL,
  PRIMARY KEY (`n°produit`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`n°produit`, `type`, `description`, `prix`) VALUES
(1, 'capteur', 'Semper leo. Fusce lectus justo, porta quis felis at, imperdiet elementum libero. Duis nec dignissim lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque venenatis purus eget maximus. Fusce dapibus leo sed sem fringilla, nec convallis arcu egestas. Nullam ut\r\n\r\nNulla facilisi. Etiam euismod tristique ipsum, vitae fringilla orci tempor at. Cras dignissim laoreet ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae aliquet dui, sit amet cursus ante. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sodales porta lacus, eu facilisis justo. Curabitur sed leo dui.', '5.00'),
(2, 'Temperature', 'Un petit capteur banal', '3.00'),
(8, 'Temperature', 'Un joli petit cateur de temperature avec une description sans aucun interet juste pour essayer le text area', '11.00'),
(9, 'Mouvement', 'k,kfv,kf,kvb,fkb,kf,bkf,bk,fkb,fk,bkf,,s d,slc', '6.00'),
(12, 'Lumiere', 'Jour ou nuit', '5.00'),
(13, 'zrudfghjkl', 'sdfghjk', '4.00'),
(14, 'sdfghj', 'sdfghjkjgvcvbnj,k;,nv cvnjk,', '4.00'),
(15, 'dcfvghjk', 'vbnj,k;l:', '3.00'),
(16, 'jhg b', 'hg ghbuyb', '3.50');

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
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`email`),
  KEY `INDEX` (`n°panier`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `administrateur`, `n°panier`, `etat`) VALUES
('anne@gmail.com', 'Laure', 'Anne', 'Mme', '3 rue me', '96657fd33d4351fb0ec777fd7064e03b0adc3a35', 'non', 34, 'confirme'),
('elise@urban.fr', 'gabilly', 'elise', 'Mme', '10 rue de vanves', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'oui', 30, 'confirme'),
('sam.holmes@live.fr', 'holmes', 'samuel', 'M', '27 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'oui', 24, 'confirme'),
('samholmes57@gmail.co', 'Holmes', 'Sam', 'M', '27 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'non', 31, 'confirme'),
('samholmes57@gmail.com', 'Holmes', 'samuel', 'M', '26 Rue Des Volontaires', '43f0af343451be62bc8bdc64c292c7166d48491f', 'non', 1, 'confirme');

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
