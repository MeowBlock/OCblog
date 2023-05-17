-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 mai 2023 à 15:24
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aa`
--

-- --------------------------------------------------------

--
-- Structure de la table `articleimages`
--

DROP TABLE IF EXISTS `articleimages`;
CREATE TABLE IF NOT EXISTS `articleimages` (
  `articleID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`articleID`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articleimages`
--

INSERT INTO `articleimages` (`articleID`, `position`, `name`) VALUES
(1, 1, 'HF.jpg'),
(1, 4, 'smile.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `templateID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `templateID`) VALUES
(1, 'bonjour', 1);

-- --------------------------------------------------------

--
-- Structure de la table `articletexts`
--

DROP TABLE IF EXISTS `articletexts`;
CREATE TABLE IF NOT EXISTS `articletexts` (
  `articleID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`articleID`,`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articletexts`
--

INSERT INTO `articletexts` (`articleID`, `position`, `text`) VALUES
(1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in nisl vel eros auctor interdum quis sed mi. Suspendisse cursus velit at diam posuere, eu ultricies leo suscipit. Nulla eu ornare nibh. Etiam quis elementum magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur facilisis urna a luctus ullamcorper. Vestibulum sodales neque ut est rutrum porta. Morbi odio dolor, laoreet sed semper pretium, tristique nec nibh.\n\nNam sapien dui, tempor sed sollicitudin et, tempus nec dolor. Vivamus porttitor ex et neque fermentum iaculis. Vivamus eget neque ullamcorper, interdum massa non, faucibus mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer at risus leo. Fusce eget scelerisque lorem. Fusce id ipsum justo. Ut commodo facilisis magna sit amet pharetra. Pellentesque finibus, libero vitae dictum varius, eros nisl ullamcorper neque, at mollis purus nunc quis nisl. Nam sed ipsum ac quam interdum vestibulum. Phasellus consectetur nulla non euismod sagittis. Curabitur in interdum elit. Donec mollis velit id dignissim porttitor. Maecenas non condimentum nibh. Mauris fringilla ipsum eget sapien rutrum, nec ultrices turpis convallis.\n\nDonec varius est sed lacus euismod eleifend. Integer congue porttitor ultrices. In congue mauris eget felis sollicitudin consequat. Vivamus dapibus nisi dolor, ac pharetra lectus volutpat id. Suspendisse potenti. Aliquam erat volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque in lectus mattis, ornare quam ut, pharetra tortor. Ut imperdiet, eros a ultrices mattis, orci nibh ultricies nulla, id sodales est magna non ex. Mauris at efficitur eros, non vestibulum mi. Curabitur aliquet, libero ac ornare bibendum, erat sem feugiat ligula, vitae vehicula urna turpis at ligula. Mauris tempor non ex vitae commodo.'),
(1, 3, 'Nulla venenatis felis sit amet ornare consequat. In ac aliquam ipsum, aliquet ultricies libero. Nam in hendrerit ante. Ut ullamcorper nulla id dui rhoncus, consequat tempor turpis aliquet. Aliquam tristique, enim ut condimentum rhoncus, sem felis hendrerit neque, sed cursus felis ex at tortor. Quisque a eros at felis fermentum mollis et eget lorem. Vivamus eget velit viverra, molestie ex vitae, pulvinar metus. Proin in nibh in odio mollis egestas. Mauris in dignissim felis. In dolor nunc, accumsan quis malesuada in, ultricies vel sapien.\r\n\r\nQuisque sem nunc, aliquet ut laoreet non, auctor sed neque. Sed ornare, lectus sit amet ullamcorper accumsan, dolor augue pretium lorem, vel viverra neque lorem ac leo. Suspendisse vulputate sit amet metus sed tincidunt. Maecenas eu varius lorem. Aliquam eget velit urna. Suspendisse accumsan elementum laoreet. Vestibulum lobortis sit amet magna et mattis. Proin non molestie tellus. Fusce sagittis finibus lectus, id dignissim tellus aliquam id. Aliquam aliquet neque non sapien blandit, et auctor dui mattis.');

-- --------------------------------------------------------

--
-- Structure de la table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` int(11) NOT NULL,
  `texts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `template`
--

INSERT INTO `template` (`id`, `images`, `texts`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `templateimages`
--

DROP TABLE IF EXISTS `templateimages`;
CREATE TABLE IF NOT EXISTS `templateimages` (
  `templateID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  PRIMARY KEY (`templateID`,`position`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `templateimages`
--

INSERT INTO `templateimages` (`templateID`, `position`, `width`) VALUES
(1, 1, 50),
(1, 4, 50);

-- --------------------------------------------------------

--
-- Structure de la table `templatetexts`
--

DROP TABLE IF EXISTS `templatetexts`;
CREATE TABLE IF NOT EXISTS `templatetexts` (
  `templateID` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  PRIMARY KEY (`templateID`,`position`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `templatetexts`
--

INSERT INTO `templatetexts` (`templateID`, `position`, `width`) VALUES
(1, 2, 50),
(1, 3, 50);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articleimages`
--
ALTER TABLE `articleimages`
  ADD CONSTRAINT `articleimages-articleid` FOREIGN KEY (`articleID`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `articletexts`
--
ALTER TABLE `articletexts`
  ADD CONSTRAINT `articletexts-articleid` FOREIGN KEY (`articleID`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `templateimages`
--
ALTER TABLE `templateimages`
  ADD CONSTRAINT `imagetemplateid` FOREIGN KEY (`templateID`) REFERENCES `template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `templatetexts`
--
ALTER TABLE `templatetexts`
  ADD CONSTRAINT `texttemplateid` FOREIGN KEY (`templateID`) REFERENCES `template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
