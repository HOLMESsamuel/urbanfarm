-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 juin 2019 à 08:28
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `mail_utilisateur`) VALUES
(1, 'bob@gmail.com'),
(2, 'elise.gabilly@gmail.com'),
(3, 'alice@isep.fr');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `texte`, `admin`, `id_conv`, `lu`, `date`) VALUES
(1, 'Bonjour et bienvenu dans la communauté UrbanFarm !', 'oui', 1, 'oui', '2019-04-06'),
(2, 'Bonjour et bienvenu dans la communauté UrbanFarm !', 'oui', 2, 'oui', '2019-04-06'),
(3, 'Merci pour votre accueil.', 'non', 2, 'oui', '2019-04-06'),
(17, 'Boby', 'oui', 1, 'oui', '2019-06-06'),
(6, 'Yo', 'oui', 1, 'non', '2019-06-06'),
(18, 'cvhjk', 'oui', 1, 'non', '2019-06-07'),
(19, 'Kikou', 'non', 2, 'oui', '2019-06-07'),
(15, 'Elise', 'oui', 2, 'non', '2019-06-06'),
(20, 'Yo', 'non', 2, 'oui', '2019-06-07'),
(21, 'Regarde ca marche', 'non', 2, 'oui', '2019-06-07'),
(22, 'Bonjour et bienvenu dans la communauté UrbanFarm !', 'oui', 3, 'non', '2019-06-07'),
(23, 'blop', 'non', 2, 'oui', '2019-06-11'),
(24, 'boby', 'non', 2, 'oui', '2019-06-11'),
(25, 'azertyu', 'non', 2, 'oui', '2019-06-11');

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
  `code_validation` int(11) NOT NULL,
  `is_mail_conf` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `administrateur`, `etat`, `code_validation`, `is_mail_conf`) VALUES
('alice@isep.fr', 'Dupond', 'Alice', 'Mme', '3 avenue du champ', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'confirme', 42, 'oui'),
('bob@gmail.com', 'Lennon', 'Bob', 'M', '42 rue du sens de la vie', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'confirme', 42, 'oui'),
('elise.gabilly@gmail.com', 'Gabilly', 'Elise', 'M', '7 Avenue voltaire', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente', 42, 'non'),
('g10e@urban.fr', '10E', 'Groupe', 'M', '10 rue Emile Zola', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'oui', 'confirme', 42, 'oui'),
('y@gmail.com', 'Gabilly', 'Elise', 'Mme', '7 Avenue voltaire', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente', 42, 'non');

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
('::1', 20190607134954, 1559915394),
('::1', 20190607144226, 1559918546),
('::1', 20190607144509, 1559918709),
('::1', 20190607144512, 1559918712),
('::1', 20190607144514, 1559918714),
('::1', 20190607144518, 1559918718),
('::1', 20190607144525, 1559918725),
('::1', 20190607144528, 1559918728),
('::1', 20190607165016, 1559926216),
('::1', 20190607165016, 1559926216),
('::1', 20190607165020, 1559926220),
('::1', 20190607165050, 1559926250),
('::1', 20190607165056, 1559926256),
('::1', 20190607165207, 1559926327),
('::1', 20190607165209, 1559926329),
('::1', 20190607165213, 1559926333),
('::1', 20190607165214, 1559926334),
('::1', 20190611103655, 1560249415),
('::1', 20190611103656, 1560249416),
('::1', 20190611103702, 1560249422),
('::1', 20190611103708, 1560249428),
('::1', 20190611103715, 1560249435),
('::1', 20190611103722, 1560249442),
('::1', 20190611103729, 1560249449),
('::1', 20190611103740, 1560249460),
('::1', 20190611104416, 1560249856),
('::1', 20190611104432, 1560249872),
('::1', 20190611104727, 1560250047),
('::1', 20190611104736, 1560250056),
('::1', 20190611104738, 1560250058),
('::1', 20190611104741, 1560250061),
('::1', 20190611104745, 1560250065),
('::1', 20190611104746, 1560250066),
('::1', 20190611104811, 1560250091),
('::1', 20190611104813, 1560250093),
('::1', 20190611105128, 1560250288),
('::1', 20190611105130, 1560250290),
('::1', 20190611105147, 1560250307),
('::1', 20190611105154, 1560250314),
('::1', 20190611105158, 1560250318),
('::1', 20190611105246, 1560250366),
('::1', 20190611105248, 1560250368),
('::1', 20190611105252, 1560250372),
('::1', 20190611105353, 1560250433),
('::1', 20190611105355, 1560250435),
('::1', 20190611105358, 1560250438),
('::1', 20190611132231, 1560259351),
('::1', 20190611132241, 1560259361),
('::1', 20190611132452, 1560259492),
('::1', 20190611132558, 1560259558),
('::1', 20190611132610, 1560259570),
('::1', 20190611132614, 1560259574),
('::1', 20190611132632, 1560259592),
('::1', 20190611132639, 1560259599),
('::1', 20190611132733, 1560259653),
('::1', 20190611133041, 1560259841),
('::1', 20190611133043, 1560259843),
('::1', 20190611133046, 1560259846),
('::1', 20190611133111, 1560259871),
('::1', 20190611133113, 1560259873),
('::1', 20190611133203, 1560259923),
('::1', 20190611133302, 1560259982),
('::1', 20190611133324, 1560260004),
('::1', 20190611133359, 1560260039),
('::1', 20190611133403, 1560260043),
('::1', 20190611133410, 1560260050),
('::1', 20190611133428, 1560260068),
('::1', 20190611134206, 1560260526),
('::1', 20190611134303, 1560260583),
('::1', 20190611134342, 1560260622),
('::1', 20190611135250, 1560261170),
('::1', 20190611135301, 1560261181),
('::1', 20190611135304, 1560261184),
('::1', 20190611135310, 1560261190),
('::1', 20190611135314, 1560261194),
('::1', 20190611135830, 1560261510),
('::1', 20190611135835, 1560261515),
('::1', 20190611140526, 1560261926),
('::1', 20190611140553, 1560261953),
('::1', 20190611140556, 1560261956),
('::1', 20190611140836, 1560262116),
('::1', 20190611140944, 1560262184),
('::1', 20190611140959, 1560262199),
('::1', 20190611141014, 1560262214),
('::1', 20190611141038, 1560262238),
('::1', 20190611141041, 1560262241),
('::1', 20190611141133, 1560262293),
('::1', 20190611141601, 1560262561),
('::1', 20190611141619, 1560262579),
('::1', 20190611141718, 1560262638),
('::1', 20190611141751, 1560262671),
('::1', 20190611142119, 1560262879),
('::1', 20190611142156, 1560262916),
('::1', 20190611142310, 1560262990),
('::1', 20190611142314, 1560262994),
('::1', 20190611142520, 1560263120),
('::1', 20190611142528, 1560263128),
('::1', 20190611142533, 1560263133),
('::1', 20190611142535, 1560263135),
('::1', 20190611142537, 1560263137),
('::1', 20190611143308, 1560263588),
('::1', 20190611143337, 1560263617),
('::1', 20190611143424, 1560263664),
('::1', 20190611143428, 1560263668),
('::1', 20190611143550, 1560263750),
('::1', 20190611143556, 1560263756),
('::1', 20190611143621, 1560263781),
('::1', 20190611143627, 1560263787),
('::1', 20190611143954, 1560263994),
('::1', 20190611144031, 1560264031),
('::1', 20190611144033, 1560264033),
('::1', 20190611144414, 1560264254),
('::1', 20190611144417, 1560264257),
('::1', 20190611145730, 1560265050),
('::1', 20190611145842, 1560265122),
('::1', 20190611145854, 1560265134),
('::1', 20190611145905, 1560265145),
('::1', 20190611145911, 1560265151),
('::1', 20190611151801, 1560266281),
('::1', 20190611151803, 1560266283),
('::1', 20190611151824, 1560266304),
('::1', 20190611151904, 1560266344),
('::1', 20190611152032, 1560266432),
('::1', 20190611152036, 1560266436),
('::1', 20190611152055, 1560266455),
('::1', 20190611152109, 1560266469),
('::1', 20190611152115, 1560266475),
('::1', 20190611152155, 1560266515),
('::1', 20190611152157, 1560266517),
('::1', 20190611152159, 1560266519),
('::1', 20190611152220, 1560266540),
('::1', 20190611152254, 1560266574),
('::1', 20190611152313, 1560266593),
('::1', 20190611152401, 1560266641),
('::1', 20190611152408, 1560266648),
('::1', 20190611152452, 1560266692),
('::1', 20190611152515, 1560266715),
('::1', 20190611152531, 1560266731),
('::1', 20190611152534, 1560266734),
('::1', 20190611152742, 1560266862),
('::1', 20190611152749, 1560266869),
('::1', 20190611153057, 1560267057),
('::1', 20190611153108, 1560267068),
('::1', 20190611153133, 1560267093),
('::1', 20190611153239, 1560267159),
('::1', 20190611153242, 1560267162),
('::1', 20190611153320, 1560267200),
('::1', 20190611153448, 1560267288),
('::1', 20190611153450, 1560267290),
('::1', 20190611153456, 1560267296),
('::1', 20190611153500, 1560267300),
('::1', 20190611153546, 1560267346),
('::1', 20190612063907, 1560321547),
('::1', 20190612063927, 1560321567),
('::1', 20190612064217, 1560321737),
('::1', 20190612064228, 1560321748),
('::1', 20190612064232, 1560321752),
('::1', 20190612064237, 1560321757),
('::1', 20190612064242, 1560321762),
('::1', 20190612064420, 1560321860),
('::1', 20190612064659, 1560322019),
('::1', 20190612064703, 1560322023),
('::1', 20190612064733, 1560322053),
('::1', 20190612064928, 1560322168),
('::1', 20190612064936, 1560322176),
('::1', 20190612064948, 1560322188),
('::1', 20190612065626, 1560322586),
('::1', 20190612065628, 1560322588),
('::1', 20190612065629, 1560322589),
('::1', 20190612065651, 1560322611),
('::1', 20190612065743, 1560322663),
('::1', 20190612065754, 1560322674),
('::1', 20190612071116, 1560323476),
('::1', 20190612071119, 1560323479),
('::1', 20190612071130, 1560323490),
('::1', 20190612071136, 1560323496),
('::1', 20190612073447, 1560324887),
('::1', 20190612075632, 1560326192),
('::1', 20190612075918, 1560326358),
('::1', 20190612080138, 1560326498),
('::1', 20190612080241, 1560326561),
('::1', 20190612080242, 1560326562),
('::1', 20190612080252, 1560326572),
('::1', 20190612080325, 1560326605),
('::1', 20190612080417, 1560326657),
('::1', 20190612080425, 1560326665),
('::1', 20190612081353, 1560327233),
('::1', 20190612081759, 1560327479),
('::1', 20190612081836, 1560327516);

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
