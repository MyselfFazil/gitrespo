-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 05:32 AM
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
-- Table structure for table `comment_sys_sub`
--

DROP TABLE IF EXISTS `comment_sys_sub`;
CREATE TABLE IF NOT EXISTS `comment_sys_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` text NOT NULL,
  `User_Msg` varchar(255) NOT NULL,
  `commented_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Msg_id` text NOT NULL,
  `Sub_msg_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_sys_sub`
--

INSERT INTO `comment_sys_sub` (`id`, `User_Name`, `User_Msg`, `commented_on`, `Msg_id`, `Sub_msg_id`) VALUES
(1, 'kittu', 'tu hai pagal', '2017-06-26 08:19:47', '33a68956ff3', '721a458e1a0'),
(2, 'Guest', 'Oh great its a two level commenting system.', '2017-06-27 05:06:44', 'ae9d219d5be', '80d4e07f8f4'),
(3, 'Fazil', 'yeah thanks...', '2017-06-27 05:07:36', 'ae9d219d5be', 'ce0beb685f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
