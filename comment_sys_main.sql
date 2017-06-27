-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 05:31 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_sys_main`
--

DROP TABLE IF EXISTS `comment_sys_main`;
CREATE TABLE IF NOT EXISTS `comment_sys_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` text NOT NULL,
  `User_Msg` varchar(255) NOT NULL,
  `commented_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Msg_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_sys_main`
--

INSERT INTO `comment_sys_main` (`id`, `User_Name`, `User_Msg`, `commented_on`, `Msg_id`) VALUES
(1, 'Aairsh', 'hi pagalo kya haal hai\r\n', '2017-06-26 08:19:37', '33a68956ff3'),
(2, 'Zeshan', 'Tell me about your experience.', '2017-06-26 14:34:39', 'fc2682bf4e9'),
(3, 'Fazil', 'Here is my commenting system...', '2017-06-26 14:44:07', 'ae9d219d5be');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
