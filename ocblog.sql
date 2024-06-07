-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2024 at 11:35 AM
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
(1, 0, 'Article 1', '<p><strong>Cecci est un article a propos du Snowboard</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam purus arcu, euismod a semper sit amet, ultricies a ante. Sed dignissim purus vitae erat pharetra tincidunt. Nam nec orci bibendum, tincidunt quam at, pretium orci. Donec lacinia egestas leo, quis aliquam libero consequat nec. Aenean vel neque quis dolor euismod maximus. Pellentesque finibus nunc eget molestie pretium. Fusce at lacinia tellus, nec faucibus sapien. Vestibulum pellentesque elit est, quis hendrerit augue pulvinar ac. Sed sit amet ipsum turpis. Suspendisse id posuere urna. Praesent malesuada metus in mollis consectetur. Donec pretium placerat dictum. Ut et ipsum non sapien pellentesque volutpat. Integer erat nisl, blandit nec tellus et, finibus aliquam ligula.</p>\r\n<p>Curabitur accumsan ipsum nisi, quis interdum lacus pulvinar at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel dui lobortis, malesuada augue sed, congue sem. Sed et elementum nisi. Mauris bibendum vulputate lorem, non lobortis felis sollicitudin in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris efficitur vel lectus eu imperdiet. Aliquam ac massa ante. Praesent rhoncus quis magna sed tristique.</p>\r\n<p>Phasellus luctus ipsum elementum aliquam porta. Pellentesque quis est augue. Mauris nec volutpat lorem. Sed luctus, nisi et maximus iaculis, odio felis ultrices ligula, nec semper dolor arcu a mi. Vivamus finibus, urna eu accumsan imperdiet, massa libero tempus dolor, sit amet tincidunt leo augue venenatis felis. Sed rhoncus pulvinar magna vitae eleifend. Vestibulum eu arcu vitae eros egestas venenatis id vitae lacus. Ut non purus orci. Nunc dapibus risus id dolor lacinia, sed blandit dolor hendrerit. Duis ullamcorper dui non risus aliquet, non efficitur orci sollicitudin. Sed vitae nisi felis. Nunc nibh dui, ornare gravida accumsan ac, porta nec sapien. Aenean vel tortor id justo porta molestie nec eu sapien. Mauris condimentum, turpis in eleifend consequat, eros augue fringilla augue, ut sodales diam purus congue libero. Fusce dignissim libero nec commodo suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', 'Ceci est mon article 1', 'public/images/uploads/6351425208_00c6a9bd47_b-2380821285.jpg', '2024-06-06 15:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL,
  `articleID` int NOT NULL,
  `userID` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statut` int NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `articleID`, `userID`, `text`, `statut`, `datetime`) VALUES
(1, 1, 0, 'Entrez votre commentaire ici', 1, '2024-06-06 15:25:21'),
(2, 1, 0, 'mon deuxieme commentaire', -1, '2024-06-06 21:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `isadmin`) VALUES
(0, 'baralliniloris@gmail.com', '$2y$10$N0Tu4Gfq8LjtQOl0GffwCOEzk8fFv1PBwQSeWAGw5nlipw7kx5rvG', 'Loris', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
