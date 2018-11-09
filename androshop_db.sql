-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2018 at 01:39 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `androshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(200) DEFAULT NULL,
  `id_user` int(200) DEFAULT NULL,
  `id_product` int(200) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `qty`, `id_user`, `id_product`, `harga`) VALUES
(1, 5, 2, 1, '1500000'),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, 2, 2, 3, '25000000'),
(21, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'admin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategory`
--

CREATE TABLE IF NOT EXISTS `kategory` (
  `id_kategory` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategory` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategory`
--

INSERT INTO `kategory` (`id_kategory`, `nama_kategory`) VALUES
(1, 'SmartPhone'),
(2, 'Komputer PC'),
(3, 'Laptop'),
(5, 'SmartWatch');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(200) DEFAULT NULL,
  `id_user` int(200) DEFAULT NULL,
  `id_product` int(200) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  `total_bayar` varchar(200) DEFAULT NULL,
  `keterangan` text,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(200) DEFAULT NULL,
  `harga` int(200) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(200) DEFAULT NULL,
  `id_kategory` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_product`, `harga`, `deskripsi`, `gambar`, `id_kategory`) VALUES
(1, 'Xiamo 4x', 1500000, 'SmartPhone dari Xiaomi dengan series 4x, elegan, canggih, murah tapi tidak murahan, sangat recommended.', NULL, 1),
(2, 'Asus EeePc', 2500000, 'Laptop kecil tapi super handal, asik buat gaming atau programming', NULL, 3),
(3, 'AlienWare E812', 25000000, 'Personal Computer (PC) yang sangat keren buat para gammer.', NULL, 2),
(4, 'Apple MacBook Pro', 12000000, 'Laptop mahal', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_level`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1541736171, 1, 'Admin', 'istrator', 'ADMIN', '0', 1),
(2, '::1', 'adeandro27', '$2y$08$YY.DdjZZEKtkqAItRWh5oueSVRVMlC2CrEqKd2A5FIWMMe5OSZWDO', NULL, 'andro.ade27@gmail.com', NULL, NULL, NULL, NULL, 1541477918, 1541728976, 1, NULL, NULL, NULL, NULL, 2),
(3, '::1', 'superadmin', '$2y$08$aYBbulhqU2xq71Uoo7WGVOBJlZc60QenmHVm0aI1IUhkqZTt5Sjg2', NULL, 'superadmin@gmail.com', NULL, NULL, NULL, NULL, 1541496378, 1541644721, 1, NULL, NULL, NULL, NULL, 3),
(4, '::1', 'donidamara', '$2y$08$yIko3zIVt8xpUPCpmKcUX./1JrOfxCf9oH2/8NIpo6D.Q4aX/F5Vi', NULL, 'donidamara@gmail.com', NULL, NULL, NULL, NULL, 1541497596, NULL, 1, NULL, NULL, NULL, NULL, 2),
(5, '::1', 'sumargo', '$2y$08$IUG7LRKQB88iN8CpJDg.Z.V3ADUMOAVIKdnJNHU7IPe01be2Lp0bK', NULL, 'sumargo@gmail.com', NULL, NULL, NULL, NULL, 1541497715, 1541497860, 1, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
