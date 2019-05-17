-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 17, 2019 at 02:34 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

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
(9, 'J\'ai un probleme avec mon capteur de temparature', 'elise@urban.fr');

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
(45, 'temperature', 'on', 31),
(46, 'mouvement', 'on', 31);

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
  `date` date NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

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
  MODIFY `n°article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `n°capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `n°data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installation`
--
ALTER TABLE `installation`
  MODIFY `n°installation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `n°produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `n_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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