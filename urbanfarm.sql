-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2019 at 02:03 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `urbanfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionneur`
--

CREATE TABLE `actionneur` (
  `n°Actionneur` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `actionneur`
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
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `mail_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `sujet`, `mail_utilisateur`) VALUES
(1, 'Je n\'arrive pas a installer mon capteur', 'elise@urban.fr'),
(2, 'Merci a tout l\'equipe d\'urbanfram !', 'panda@gmail.com'),
(9, 'J\'ai un probleme avec mon capteur de temparature', 'elise@urban.fr'),
(10, 'un super sujet', 'bob@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `n°article` int(11) NOT NULL,
  `titre` varchar(255) COLLATE latin1_bin NOT NULL,
  `contenu` text COLLATE latin1_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`n°article`, `titre`, `contenu`, `date`) VALUES
(1, 'Des oeufs dans votre jardin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus aliquet orci, eu maximus leo maximus vitae. Aliquam ultricies neque arcu, id commodo ipsum maximus a. Sed arcu augue, volutpat non luctus non, consequat non orci. Sed lacinia efficitur quam, id semper velit pulvinar in.', '2019-03-29'),
(2, 'L\'impact des oeufs frais sur la santé', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2019-03-30'),
(3, 'Potager et legumes', 'Démarrer un potager n’est pas toujours chose facile, surtout lorsqu’on y connait pas grand choses à la culture des légumes.\r\nPourtant, cultiver ses légumes soi-même est beaucoup plus simple que ça en a l’air !', '2019-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `n°capteur` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `etat` varchar(255) COLLATE latin1_bin NOT NULL,
  `n°installation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `capteur`
--

INSERT INTO `capteur` (`n°capteur`, `type`, `etat`, `n°installation`) VALUES
(43, 'temperature', 'on', 30),
(44, 'mouvement', 'on', 30),
(45, 'temperature', 'off', 31),
(46, 'mouvement', 'off', 31);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `n°commande` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `montant` decimal(11,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `n°produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `mail_utilisateur`, `id_annonce`, `texte`) VALUES
(1, 'jeanclaude@gmail.com', 1, 'Pourrais tu preciser ton probleme ?'),
(3, 'panda@gmail.com', 2, 'Merci a vous d\'avoir choisit notre solution'),
(4, 'panda@gmail.com', 1, 'Je n\'arrive pas a faire le lien entre la passerelle et le capteur.'),
(10, 'elise@urban.fr', 1, 'Lors de cette manipulation il peut etre necessaire de d\'ettaindre la passerelle lors du rajout.'),
(11, 'elise@urban.fr', 9, 'J\'ai eu le meme probleme a cause d\'une lampe qui chauffais juste a coté du cateur');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `n°data` int(11) NOT NULL,
  `n°capteur` int(11) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`n°data`, `n°capteur`, `timestamp`, `valeur`) VALUES
(1, 45, 20190520143532, 23),
(2, 46, 20190519293456, 20),
(4, 45, 20190520160326, 12),
(5, 45, 20190521091652, 35),
(6, 45, 20190522134534, 24),
(7, 45, 20190523134534, 23),
(8, 45, 20190525134534, 20),
(9, 46, 20190604090635, 10);

-- --------------------------------------------------------

--
-- Table structure for table `installation`
--

CREATE TABLE `installation` (
  `n°installation` int(11) NOT NULL,
  `nom` varchar(255) COLLATE latin1_bin NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(255) COLLATE latin1_bin NOT NULL,
  `email` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `installation`
--

INSERT INTO `installation` (`n°installation`, `nom`, `type`, `adresse`, `email`) VALUES
(31, 'Maison', 'poulailler', '', 'bob@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `n°produit` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  `description` text COLLATE latin1_bin NOT NULL,
  `prix` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`n°produit`, `type`, `description`, `prix`) VALUES
(1, 'Capteur', 'Semper leo. Fusce lectus justo, porta quis felis at, imperdiet elementum libero. Duis nec dignissim lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque venenatis purus eget maximus. Fusce dapibus leo sed sem fringilla, nec convallis arcu egestas. Nullam ut\r\n\r\nNulla facilisi. Etiam euismod tristique ipsum, vitae fringilla orci tempor at. Cras dignissim laoreet ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae aliquet dui, sit amet cursus ante. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sodales porta lacus, eu facilisis justo. Curabitur sed leo dui.', '5.00'),
(8, 'Temperature', 'Un joli petit cateur de temperature avec une description sans aucun interet juste pour essayer le text area', '11.00'),
(12, 'Lumiere', 'Jour ou nuit', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `n_question` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`n_question`, `nom`, `contenu`) VALUES
(1, 'Qu\'est-ce que Urbanfarm?', 'Nous sommes le fournisseur de services intelligent sur Internet pour Urbanfarm.'),
(2, 'Que pouvez-vous faire sur notre site?', 'Vous pouvez surveiller en ligne les dernières opérations de Urbanfarm et obtenir la bonne analyse de données, obtenir les dernières nouvelles interactives et participer.'),
(3, 'Que puis-je obtenir en m\'inscrivant sur le site?', 'Vous pouvez obtenir les dernières nouvelles de l\'événement et obtenir des avantages spéciaux qui ne sont ouverts aux membres qu\'en enregistrant votre abonnement, rejoignez-nous!'),
(4, 'J\'ai acheté le site Web environ, combien de temps puis-je le recevoir?', 'Nous expédions les marchandises dans les meilleurs délais pour vous garantir la meilleure expérience d\'achat possible (délai de livraison général: 2 à 5 jours).'),
(5, 'Puis-je participer à des interactions dans d\'autres régions internationales?', 'Nous sommes toujours les bienvenus pour participer à notre interaction hors ligne, mais veuillez noter que nos achats en ligne sont ouverts uniquement à l\'île-de-France.');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  `nom` varchar(255) COLLATE latin1_bin NOT NULL,
  `prenom` varchar(255) COLLATE latin1_bin NOT NULL,
  `civilité` varchar(255) COLLATE latin1_bin NOT NULL,
  `adresse` varchar(255) COLLATE latin1_bin NOT NULL,
  `motdepasse` varchar(255) COLLATE latin1_bin NOT NULL,
  `administrateur` varchar(255) COLLATE latin1_bin NOT NULL,
  `etat` varchar(255) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `civilité`, `adresse`, `motdepasse`, `administrateur`, `etat`) VALUES
('alice@isep.fr', 'Dupond', 'Alice', 'Mme', '3 avenue du champ', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'attente'),
('bob@gmail.com', 'Lennon', 'Bob', 'M', '42 rue du sens de la vie', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'non', 'confirme'),
('g10e@urban.fr', '10E', 'Groupe', 'M', '10 rue Emile Zola', 'd54d5bfdad8b1238a54f6b28599f4dcf6e65867d', 'oui', 'confirme');

-- --------------------------------------------------------

--
-- Table structure for table `visite`
--

CREATE TABLE `visite` (
  `ip` varchar(15) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visite`
--

INSERT INTO `visite` (`ip`, `timestamp`, `time`) VALUES
('::1', 20190604075008, 1559634608),
('::1', 20190606070305, 1559804585),
('::1', 20190606070340, 1559804620),
('::1', 20190606070344, 1559804624),
('::1', 20190606070455, 1559804695),
('::1', 20190606070457, 1559804697),
('::1', 20190606070501, 1559804701),
('::1', 20190606070503, 1559804703),
('::1', 20190606070506, 1559804706),
('::1', 20190606072347, 1559805827),
('::1', 20190606072358, 1559805838),
('::1', 20190606072758, 1559806078),
('::1', 20190606072801, 1559806081),
('::1', 20190606072831, 1559806111),
('::1', 20190606072834, 1559806114),
('::1', 20190606072836, 1559806116),
('::1', 20190606073043, 1559806243),
('::1', 20190606073045, 1559806245),
('::1', 20190606073241, 1559806361),
('::1', 20190606073244, 1559806364),
('::1', 20190606073247, 1559806367),
('::1', 20190606073336, 1559806416),
('::1', 20190606073339, 1559806419),
('::1', 20190606073341, 1559806421),
('::1', 20190606073813, 1559806693),
('::1', 20190606073816, 1559806696),
('::1', 20190606073824, 1559806704),
('::1', 20190606073826, 1559806706),
('::1', 20190606073914, 1559806754),
('::1', 20190606073916, 1559806756),
('::1', 20190606073918, 1559806758),
('::1', 20190606073943, 1559806783),
('::1', 20190606073945, 1559806785),
('::1', 20190606074243, 1559806963),
('::1', 20190606074245, 1559806965),
('::1', 20190606074253, 1559806973),
('::1', 20190606074255, 1559806975),
('::1', 20190606074353, 1559807033),
('::1', 20190606074355, 1559807035),
('::1', 20190606074403, 1559807043),
('::1', 20190606074405, 1559807045),
('::1', 20190606074527, 1559807127),
('::1', 20190606074528, 1559807128),
('::1', 20190606074737, 1559807257),
('::1', 20190606074739, 1559807259),
('::1', 20190606074756, 1559807276),
('::1', 20190606074758, 1559807278),
('::1', 20190606074822, 1559807302),
('::1', 20190606074825, 1559807305),
('::1', 20190606074922, 1559807362),
('::1', 20190606074923, 1559807363),
('::1', 20190606074927, 1559807367),
('::1', 20190606074929, 1559807369),
('::1', 20190606074931, 1559807371),
('::1', 20190606075248, 1559807568),
('::1', 20190606075250, 1559807570),
('::1', 20190606075534, 1559807734),
('::1', 20190606075536, 1559807736),
('::1', 20190606075551, 1559807751),
('::1', 20190606075552, 1559807752),
('::1', 20190606075652, 1559807812),
('::1', 20190606075655, 1559807815),
('::1', 20190606080141, 1559808101),
('::1', 20190606080142, 1559808102),
('::1', 20190606080229, 1559808149),
('::1', 20190606080230, 1559808150),
('::1', 20190606080351, 1559808231),
('::1', 20190606080353, 1559808233),
('::1', 20190606080734, 1559808454),
('::1', 20190606080737, 1559808457),
('::1', 20190606080751, 1559808471),
('::1', 20190606080753, 1559808473),
('::1', 20190606081011, 1559808611),
('::1', 20190606081746, 1559809066),
('::1', 20190606081748, 1559809068),
('::1', 20190606081833, 1559809113),
('::1', 20190606081835, 1559809115),
('::1', 20190606082330, 1559809410),
('::1', 20190606082332, 1559809412),
('::1', 20190606082337, 1559809417),
('::1', 20190606082346, 1559809426),
('::1', 20190606082347, 1559809427),
('::1', 20190606082528, 1559809528),
('::1', 20190606082531, 1559809531),
('::1', 20190606082725, 1559809645),
('::1', 20190606082727, 1559809647),
('::1', 20190606082747, 1559809667),
('::1', 20190606082748, 1559809668),
('::1', 20190606082752, 1559809672),
('::1', 20190606082807, 1559809687),
('::1', 20190606082814, 1559809694),
('::1', 20190606082816, 1559809696),
('::1', 20190606082906, 1559809746),
('::1', 20190606082908, 1559809748),
('::1', 20190606082913, 1559809753),
('::1', 20190606082915, 1559809755),
('::1', 20190606082921, 1559809761),
('::1', 20190606082923, 1559809763),
('::1', 20190606082931, 1559809771),
('::1', 20190606083525, 1559810125),
('::1', 20190606083527, 1559810127),
('::1', 20190606083538, 1559810138),
('::1', 20190606083540, 1559810140),
('::1', 20190606083632, 1559810192),
('::1', 20190606083634, 1559810194),
('::1', 20190606083741, 1559810261),
('::1', 20190606083743, 1559810263),
('::1', 20190606083756, 1559810276),
('::1', 20190606083835, 1559810315),
('::1', 20190606084132, 1559810492),
('::1', 20190606084135, 1559810495),
('::1', 20190606084319, 1559810599),
('::1', 20190606084321, 1559810601),
('::1', 20190606084405, 1559810645),
('::1', 20190606084407, 1559810647),
('::1', 20190606084517, 1559810717),
('::1', 20190606084518, 1559810718),
('::1', 20190606084537, 1559810737),
('::1', 20190606084539, 1559810739),
('::1', 20190606084602, 1559810762),
('::1', 20190606084604, 1559810764),
('::1', 20190606084842, 1559810922),
('::1', 20190606084844, 1559810924),
('::1', 20190606084936, 1559810976),
('::1', 20190606084938, 1559810978),
('::1', 20190606085444, 1559811284),
('::1', 20190606085446, 1559811286),
('::1', 20190606085632, 1559811392),
('::1', 20190606085634, 1559811394),
('::1', 20190606091033, 1559812233),
('::1', 20190606091034, 1559812234),
('::1', 20190606091623, 1559812583),
('::1', 20190606091625, 1559812585),
('::1', 20190606091657, 1559812617),
('::1', 20190606091658, 1559812618),
('::1', 20190606091721, 1559812641),
('::1', 20190606091722, 1559812642),
('::1', 20190606091930, 1559812770),
('::1', 20190606091932, 1559812772),
('::1', 20190606091942, 1559812782),
('::1', 20190606091943, 1559812783),
('::1', 20190606091952, 1559812792),
('::1', 20190606091956, 1559812796),
('::1', 20190606092012, 1559812812),
('::1', 20190606092014, 1559812814),
('::1', 20190606092024, 1559812824),
('::1', 20190606092025, 1559812825),
('::1', 20190606092031, 1559812831),
('::1', 20190606092033, 1559812833),
('::1', 20190606092136, 1559812896),
('::1', 20190606092137, 1559812897),
('::1', 20190606092234, 1559812954),
('::1', 20190606092236, 1559812956),
('::1', 20190606092301, 1559812981),
('::1', 20190606092303, 1559812983),
('::1', 20190606092327, 1559813007),
('::1', 20190606092329, 1559813009),
('::1', 20190606092347, 1559813027),
('::1', 20190606092348, 1559813028),
('::1', 20190606092435, 1559813075),
('::1', 20190606092436, 1559813076),
('::1', 20190606092455, 1559813095),
('::1', 20190606092456, 1559813096),
('::1', 20190606092514, 1559813114),
('::1', 20190606092516, 1559813116),
('::1', 20190606092627, 1559813187),
('::1', 20190606092628, 1559813188),
('::1', 20190606092721, 1559813241),
('::1', 20190606092723, 1559813243),
('::1', 20190606092727, 1559813247),
('::1', 20190606092729, 1559813249),
('::1', 20190606092830, 1559813310),
('::1', 20190606092831, 1559813311),
('::1', 20190606092839, 1559813319),
('::1', 20190606092840, 1559813320),
('::1', 20190606092904, 1559813344),
('::1', 20190606093048, 1559813448),
('::1', 20190606093050, 1559813450),
('::1', 20190606094421, 1559814261),
('::1', 20190606094423, 1559814263),
('::1', 20190606094430, 1559814270),
('::1', 20190606094432, 1559814272),
('::1', 20190606094533, 1559814333),
('::1', 20190606094535, 1559814335),
('::1', 20190606094557, 1559814357),
('::1', 20190606094559, 1559814359),
('::1', 20190606094617, 1559814377),
('::1', 20190606094619, 1559814379),
('::1', 20190606094928, 1559814568),
('::1', 20190606094930, 1559814570),
('::1', 20190606095016, 1559814616),
('::1', 20190606095017, 1559814617),
('::1', 20190606095110, 1559814670),
('::1', 20190606095111, 1559814671),
('::1', 20190606100244, 1559815364),
('::1', 20190606100246, 1559815366),
('::1', 20190606100346, 1559815426),
('::1', 20190606100348, 1559815428),
('::1', 20190606100517, 1559815517),
('::1', 20190606100519, 1559815519),
('::1', 20190606100619, 1559815579),
('::1', 20190606100622, 1559815582),
('::1', 20190606100716, 1559815636),
('::1', 20190606100718, 1559815638),
('::1', 20190606100741, 1559815661),
('::1', 20190606100742, 1559815662),
('::1', 20190606100757, 1559815677),
('::1', 20190606100759, 1559815679),
('::1', 20190606100808, 1559815688),
('::1', 20190606100809, 1559815689),
('::1', 20190606100911, 1559815751),
('::1', 20190606100913, 1559815753),
('::1', 20190606101611, 1559816171),
('::1', 20190606101612, 1559816172),
('::1', 20190606101637, 1559816197),
('::1', 20190606101638, 1559816198),
('::1', 20190606102015, 1559816415),
('::1', 20190606102016, 1559816416),
('::1', 20190606102224, 1559816544),
('::1', 20190606102226, 1559816546),
('::1', 20190606195351, 1559850831),
('::1', 20190606195436, 1559850876),
('::1', 20190606195446, 1559850886),
('::1', 20190606195949, 1559851189),
('::1', 20190606195952, 1559851192),
('::1', 20190606200028, 1559851228),
('::1', 20190606200030, 1559851230),
('::1', 20190606200120, 1559851280),
('::1', 20190606200122, 1559851282),
('::1', 20190606200212, 1559851332),
('::1', 20190606200213, 1559851333),
('::1', 20190606200235, 1559851355),
('::1', 20190606200237, 1559851357),
('::1', 20190606200407, 1559851447),
('::1', 20190606200408, 1559851448),
('::1', 20190606200450, 1559851490),
('::1', 20190606200451, 1559851491),
('::1', 20190606200816, 1559851696),
('::1', 20190606200818, 1559851698),
('::1', 20190606200850, 1559851730),
('::1', 20190606200851, 1559851731),
('::1', 20190606200953, 1559851793),
('::1', 20190606200954, 1559851794),
('::1', 20190606201139, 1559851899),
('::1', 20190606201141, 1559851901),
('::1', 20190606201401, 1559852041),
('::1', 20190606201403, 1559852043),
('::1', 20190606201538, 1559852138),
('::1', 20190606201540, 1559852140),
('::1', 20190606201659, 1559852219),
('::1', 20190606201700, 1559852220),
('::1', 20190606201757, 1559852277),
('::1', 20190606201802, 1559852282),
('::1', 20190606201805, 1559852285),
('::1', 20190606201944, 1559852384),
('::1', 20190606202001, 1559852401),
('::1', 20190607074740, 1559893661),
('::1', 20190607074745, 1559893665),
('::1', 20190607074748, 1559893668),
('::1', 20190607075143, 1559893903),
('::1', 20190607075146, 1559893906),
('::1', 20190607075150, 1559893910),
('::1', 20190607075238, 1559893958),
('::1', 20190607082204, 1559895724),
('::1', 20190607082506, 1559895906),
('::1', 20190607082510, 1559895910),
('::1', 20190607125313, 1559911994),
('::1', 20190607125353, 1559912033),
('::1', 20190607125402, 1559912042);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`n°Actionneur`);

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`n°article`);

--
-- Indexes for table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`n°capteur`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`n°commande`),
  ADD KEY `n°produit` (`n°produit`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_annonce` (`id_annonce`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`n°data`),
  ADD KEY `n°capteur` (`n°capteur`);

--
-- Indexes for table `installation`
--
ALTER TABLE `installation`
  ADD PRIMARY KEY (`n°installation`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`n°produit`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`n_question`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `n°Actionneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `n°article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `n°capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `n°data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `installation`
--
ALTER TABLE `installation`
  MODIFY `n°installation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `n°produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `n_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`n°produit`) REFERENCES `produit` (`n°produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`n°capteur`) REFERENCES `capteur` (`n°capteur`);

--
-- Constraints for table `installation`
--
ALTER TABLE `installation`
  ADD CONSTRAINT `installation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
