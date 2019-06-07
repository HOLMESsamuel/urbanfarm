-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 juin 2019 à 14:17
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`n°Actionneur`, `type`, `etat`, `n°installation`) VALUES
(15, 'lampe', 'off', 23),
(16, 'ventilateur', 'off', 23),
(21, 'moteur', 'off', 27),
(22, 'lampe', 'off', 27),
(23, 'ventilateur', 'off', 28),
(24, 'ventilateur', 'off', 29),
(25, 'moteur', 'off', 30),
(26, 'ventilateur', 'off', 31);

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` text NOT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `sujet`, `mail_utilisateur`) VALUES
(1, 'Je n\'arrive pas a installer mon capteur', 'elise@urban.fr'),
(2, 'Merci a tout l\'equipe d\'urbanfram !', 'panda@gmail.com'),
(9, 'J\'ai un probleme avec mon capteur de temparature', 'elise@urban.fr'),
(10, 'un super sujet', 'bob@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`n°article`, `titre`, `contenu`, `date`) VALUES
(1, 'Des oeufs dans votre jardin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus aliquet orci, eu maximus leo maximus vitae. Aliquam ultricies neque arcu, id commodo ipsum maximus a. Sed arcu augue, volutpat non luctus non, consequat non orci. Sed lacinia efficitur quam, id semper velit pulvinar in.', '2019-03-29'),
(2, 'L\'impact des oeufs frais sur la santé', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2019-03-30'),
(3, 'Potager et legumes', 'Démarrer un potager n’est pas toujours chose facile, surtout lorsqu’on y connait pas grand choses à la culture des légumes.\r\nPourtant, cultiver ses légumes soi-même est beaucoup plus simple que ça en a l’air !', '2019-05-08');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `n°installation`) VALUES
(43, 'temperature', 'on', 30),
(44, 'mouvement', 'on', 30),
(45, 'temperature', 'off', 31),
(46, 'mouvement', 'off', 31);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `n°commande` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `montant` decimal(11,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `n°produit` int(11) NOT NULL,
  PRIMARY KEY (`n°commande`),
  KEY `n°produit` (`n°produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_utilisateur` varchar(255) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_annonce` (`id_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `mail_utilisateur`, `id_annonce`, `texte`) VALUES
(1, 'jeanclaude@gmail.com', 1, 'Pourrais tu preciser ton probleme ?'),
(3, 'panda@gmail.com', 2, 'Merci a vous d\'avoir choisit notre solution'),
(4, 'panda@gmail.com', 1, 'Je n\'arrive pas a faire le lien entre la passerelle et le capteur.'),
(10, 'elise@urban.fr', 1, 'Lors de cette manipulation il peut etre necessaire de d\'ettaindre la passerelle lors du rajout.'),
(11, 'elise@urban.fr', 9, 'J\'ai eu le meme probleme a cause d\'une lampe qui chauffais juste a coté du cateur');

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_utilisateur` (`mail_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `mail_utilisateur`) VALUES
(1, 'bob@gmail.com'),
(2, 'elise.gabilly@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `n°data` int(11) NOT NULL AUTO_INCREMENT,
  `n°capteur` int(11) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`n°data`),
  KEY `n°capteur` (`n°capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`n°data`, `n°capteur`, `timestamp`, `valeur`) VALUES
(1, 45, 20190520143532, 23),
(2, 46, 20190519293456, 20),
(4, 45, 20190520160326, 12),
(5, 45, 20190521091652, 35),
(6, 45, 20190522134534, 24),
(7, 45, 20190523134534, 23),
(8, 45, 20190525134534, 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `installation`
--

INSERT INTO `installation` (`n°installation`, `nom`, `type`, `adresse`, `email`) VALUES
(31, 'Maison', 'poulailler', '', 'bob@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `admin` varchar(255) NOT NULL,
  `id_conv` int(11) NOT NULL,
  `lu` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `texte`, `admin`, `id_conv`, `lu`, `date`) VALUES
(1, 'Bonjour et bienvenu dans la communauté UrbanFarm !', 'oui', 1, 'oui', '2019-04-06'),
(2, 'Bonjour et bienvenu dans la communauté UrbanFarm !', 'oui', 2, 'oui', '2019-04-06'),
(3, 'Merci pour votre accueil.', 'non', 2, 'non', '2019-04-06'),
(17, 'Boby', 'oui', 1, 'oui', '2019-06-06'),
(6, 'Yo', 'oui', 1, 'oui', '2019-06-06'),
(18, 'cvhjk', 'oui', 1, 'oui', '2019-06-07'),
(19, 'Kikou', 'non', 2, 'oui', '2019-06-07'),
(15, 'Elise', 'oui', 2, 'oui', '2019-06-06'),
(20, 'Yo', 'non', 2, 'oui', '2019-06-07'),
(21, 'Regarde ca marche', 'non', 2, 'oui', '2019-06-07');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`n°produit`, `type`, `description`, `prix`) VALUES
(1, 'Capteur', 'Semper leo. Fusce lectus justo, porta quis felis at, imperdiet elementum libero. Duis nec dignissim lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque venenatis purus eget maximus. Fusce dapibus leo sed sem fringilla, nec convallis arcu egestas. Nullam ut\r\n\r\nNulla facilisi. Etiam euismod tristique ipsum, vitae fringilla orci tempor at. Cras dignissim laoreet ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae aliquet dui, sit amet cursus ante. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sodales porta lacus, eu facilisis justo. Curabitur sed leo dui.', '5.00'),
(8, 'Temperature', 'Un joli petit cateur de temperature avec une description sans aucun interet juste pour essayer le text area', '11.00'),
(12, 'Lumiere', 'Jour ou nuit', '5.00');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `n_question` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`n_question`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`n_question`, `nom`, `contenu`) VALUES
(1, 'Qu\'est-ce que Urbanfarm?', 'Nous sommes le fournisseur de services intelligent sur Internet pour Urbanfarm.'),
(2, 'Que pouvez-vous faire sur notre site?', 'Vous pouvez surveiller en ligne les dernières opérations de Urbanfarm et obtenir la bonne analyse de données, obtenir les dernières nouvelles interactives et participer.'),
(3, 'Que puis-je obtenir en m\'inscrivant sur le site?', 'Vous pouvez obtenir les dernières nouvelles de l\'événement et obtenir des avantages spéciaux qui ne sont ouverts aux membres qu\'en enregistrant votre abonnement, rejoignez-nous!'),
(4, 'J\'ai acheté le site Web environ, combien de temps puis-je le recevoir?', 'Nous expédions les marchandises dans les meilleurs délais pour vous garantir la meilleure expérience d\'achat possible (délai de livraison général: 2 à 5 jours).'),
(5, 'Puis-je participer à des interactions dans d\'autres régions internationales?', 'Nous sommes toujours les bienvenus pour participer à notre interaction hors ligne, mais veuillez noter que nos achats en ligne sont ouverts uniquement à l\'île-de-France.');

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
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `administrateur`, `etat`) VALUES
('alice@isep.fr', 'Dupond', 'Alice', 'Mme', '3 avenue du champ', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente'),
('bob@gmail.com', 'Lennon', 'Bob', 'M', '42 rue du sens de la vie', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'confirme'),
('elise.gabilly@gmail.com', 'Gabilly', 'Elise', 'M', '7 Avenue voltaire', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'confirme'),
('elise@gmail.com', 'Gabilly', 'Elise', 'M', '7 Avenue voltaire', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente'),
('g10e@urban.fr', '10E', 'Groupe', 'M', '10 rue Emile Zola', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'oui', 'confirme'),
('gabilly@gmail.com', 'Gabilly', 'Elise', 'M', '7 Avenue voltaire', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `ip` varchar(15) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`ip`, `timestamp`, `time`) VALUES
('::1', 20190604083204, 1559637124),
('::1', 20190605200049, 1559764849),
('::1', 20190605200102, 1559764862),
('::1', 20190605200123, 1559764883),
('::1', 20190605200135, 1559764895),
('::1', 20190605200143, 1559764903),
('::1', 20190606065108, 1559803868),
('::1', 20190606065108, 1559803868),
('::1', 20190606065239, 1559803959),
('::1', 20190606065248, 1559803968),
('::1', 20190606065427, 1559804067),
('::1', 20190606065501, 1559804101),
('::1', 20190606065519, 1559804119),
('::1', 20190606065557, 1559804157),
('::1', 20190606065620, 1559804180),
('::1', 20190606065636, 1559804196),
('::1', 20190606065704, 1559804224),
('::1', 20190606065906, 1559804346),
('::1', 20190606070037, 1559804437),
('::1', 20190606070503, 1559804703),
('::1', 20190606070622, 1559804782),
('::1', 20190606070657, 1559804817),
('::1', 20190606070804, 1559804884),
('::1', 20190606070809, 1559804889),
('::1', 20190606071040, 1559805040),
('::1', 20190606071827, 1559805507),
('::1', 20190606071850, 1559805530),
('::1', 20190606071859, 1559805539),
('::1', 20190606071918, 1559805558),
('::1', 20190606073259, 1559806379),
('::1', 20190606073259, 1559806379),
('::1', 20190606073621, 1559806581),
('::1', 20190606073634, 1559806594),
('::1', 20190606074429, 1559807070),
('::1', 20190606074502, 1559807102),
('::1', 20190606074518, 1559807118),
('::1', 20190606074651, 1559807211),
('::1', 20190606074924, 1559807364),
('::1', 20190606074939, 1559807379),
('::1', 20190606075022, 1559807422),
('::1', 20190606075103, 1559807463),
('::1', 20190606075504, 1559807704),
('::1', 20190606075817, 1559807897),
('::1', 20190606075854, 1559807934),
('::1', 20190606075911, 1559807951),
('::1', 20190606075921, 1559807961),
('::1', 20190606080219, 1559808139),
('::1', 20190606080302, 1559808182),
('::1', 20190606080323, 1559808203),
('::1', 20190606080351, 1559808231),
('::1', 20190606080406, 1559808246),
('::1', 20190606084541, 1559810741),
('::1', 20190606084559, 1559810759),
('::1', 20190606084626, 1559810786),
('::1', 20190606084626, 1559810786),
('::1', 20190606084640, 1559810800),
('::1', 20190606084702, 1559810822),
('::1', 20190606084754, 1559810874),
('::1', 20190606084805, 1559810885),
('::1', 20190606084815, 1559810895),
('::1', 20190606084937, 1559810977),
('::1', 20190606085019, 1559811019),
('::1', 20190606085035, 1559811035),
('::1', 20190606085449, 1559811289),
('::1', 20190606085457, 1559811297),
('::1', 20190606085829, 1559811509),
('::1', 20190606085839, 1559811519),
('::1', 20190606090749, 1559812069),
('::1', 20190606091749, 1559812669),
('::1', 20190606093644, 1559813804),
('::1', 20190606093650, 1559813810),
('::1', 20190606093848, 1559813928),
('::1', 20190606093851, 1559813931),
('::1', 20190606095747, 1559815067),
('::1', 20190606100319, 1559815399),
('::1', 20190606100325, 1559815405),
('::1', 20190606100330, 1559815410),
('::1', 20190607121132, 1559909492),
('::1', 20190607121142, 1559909502),
('::1', 20190607121158, 1559909518),
('::1', 20190607121227, 1559909547),
('::1', 20190607121243, 1559909563),
('::1', 20190607123906, 1559911146),
('::1', 20190607123915, 1559911155),
('::1', 20190607123921, 1559911161),
('::1', 20190607123936, 1559911176),
('::1', 20190607123957, 1559911197),
('::1', 20190607124048, 1559911248),
('::1', 20190607124114, 1559911274),
('::1', 20190607124354, 1559911434),
('::1', 20190607124431, 1559911471),
('::1', 20190607124458, 1559911498),
('::1', 20190607124639, 1559911599),
('::1', 20190607124702, 1559911622),
('::1', 20190607124734, 1559911654),
('::1', 20190607124932, 1559911772),
('::1', 20190607124945, 1559911785),
('::1', 20190607133337, 1559914417),
('::1', 20190607133554, 1559914554),
('::1', 20190607133601, 1559914561),
('::1', 20190607133644, 1559914604),
('::1', 20190607133649, 1559914609),
('::1', 20190607133709, 1559914629),
('::1', 20190607133919, 1559914759),
('::1', 20190607134115, 1559914875),
('::1', 20190607134529, 1559915129),
('::1', 20190607134537, 1559915137),
('::1', 20190607134618, 1559915178),
('::1', 20190607134627, 1559915187),
('::1', 20190607134648, 1559915208),
('::1', 20190607134833, 1559915313),
('::1', 20190607134927, 1559915367),
('::1', 20190607134937, 1559915377),
('::1', 20190607134954, 1559915394);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`n°produit`) REFERENCES `produit` (`n°produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`n°capteur`) REFERENCES `capteur` (`n°capteur`);

--
-- Contraintes pour la table `installation`
--
ALTER TABLE `installation`
  ADD CONSTRAINT `installation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
