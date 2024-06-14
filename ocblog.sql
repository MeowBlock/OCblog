-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2024 at 02:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `description`, `image`, `datetime`) VALUES
(1, 0, 'Article 1', '<p><strong>Ceci est un article a propos du Ski</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam purus arcu, euismod a semper sit amet, ultricies a ante. Sed dignissim purus vitae erat pharetra tincidunt. Nam nec orci bibendum, tincidunt quam at, pretium orci. Donec lacinia egestas leo, quis aliquam libero consequat nec. Aenean vel neque quis dolor euismod maximus. Pellentesque finibus nunc eget molestie pretium. Fusce at lacinia tellus, nec faucibus sapien. Vestibulum pellentesque elit est, quis hendrerit augue pulvinar ac. Sed sit amet ipsum turpis. Suspendisse id posuere urna. Praesent malesuada metus in mollis consectetur. Donec pretium placerat dictum. Ut et ipsum non sapien pellentesque volutpat. Integer erat nisl, blandit nec tellus et, finibus aliquam ligula.</p>\r\n<p>Curabitur accumsan ipsum nisi, quis interdum lacus pulvinar at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel dui lobortis, malesuada augue sed, congue sem. Sed et elementum nisi. Mauris bibendum vulputate lorem, non lobortis felis sollicitudin in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris efficitur vel lectus eu imperdiet. Aliquam ac massa ante. Praesent rhoncus quis magna sed tristique.</p>\r\n<p>Phasellus luctus ipsum elementum aliquam porta. Pellentesque quis est augue. Mauris nec volutpat lorem. Sed luctus, nisi et maximus iaculis, odio felis ultrices ligula, nec semper dolor arcu a mi. Vivamus finibus, urna eu accumsan imperdiet, massa libero tempus dolor, sit amet tincidunt leo augue venenatis felis. Sed rhoncus pulvinar magna vitae eleifend. Vestibulum eu arcu vitae eros egestas venenatis id vitae lacus. Ut non purus orci. Nunc dapibus risus id dolor lacinia, sed blandit dolor hendrerit. Duis ullamcorper dui non risus aliquet, non efficitur orci sollicitudin. Sed vitae nisi felis. Nunc nibh dui, ornare gravida accumsan ac, porta nec sapien. Aenean vel tortor id justo porta molestie nec eu sapien. Mauris condimentum, turpis in eleifend consequat, eros augue fringilla augue, ut sodales diam purus congue libero. Fusce dignissim libero nec commodo suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', 'Ceci est mon article 1', 'public/images/uploads/6351425208_00c6a9bd47_b-2380821285.jpg', '2024-06-14 14:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `articleID` int NOT NULL,
  `userID` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statut` int NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `articleID`, `userID`, `text`, `statut`, `datetime`) VALUES
(6, 1, 1, 'test admin', -1, '2024-06-14 14:51:29'),
(5, 1, 1, 'test numéro deux', 1, '2024-06-14 14:48:29'),
(4, 1, 2, 'test\r\n', 1, '2024-06-14 14:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `isadmin`) VALUES
(1, 'baralliniloris@gmail.com', '$2y$10$N0Tu4Gfq8LjtQOl0GffwCOEzk8fFv1PBwQSeWAGw5nlipw7kx5rvG', 'Loris', 1),
(2, 'test@gmail.com', '$2y$10$pB7GbNFkpj2f/.AoS7VVa.Y69D8WrtYdlPX3W5MwirxF2EabRVNXC', 'UtilisateurUn', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
