-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 01:31 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `markethub`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE IF NOT EXISTS `register_users` (
  `u_id` double NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_logintime` datetime NOT NULL,
  `last_updatetime` datetime NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `status` enum('a','d') DEFAULT 'd' COMMENT 'a=active,d=deactive',
  `con_key` varchar(250) NOT NULL,
  `paypal_email` varchar(250) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`u_id`, `username`, `email`, `password`, `mobileno`, `created_date`, `last_logintime`, `last_updatetime`, `ipaddress`, `oauth_provider`, `oauth_uid`, `status`, `con_key`, `paypal_email`) VALUES
(1, 'jay parmar', 'jay@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 9741458745, '2017-02-20 17:41:35', '2017-05-22 11:17:06', '2017-03-01 18:41:46', '127.0.0.1', '', '', 'a', '', 'jayparmar271@gmail.com'),
(3, 'Punit', 'p@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 1234567890, '2017-03-02 18:23:55', '2017-05-10 15:58:27', '0000-00-00 00:00:00', '127.0.0.1', '', '', 'a', '', ''),
(4, 'kushal', 'kushal@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 7600779534, '2017-03-03 14:48:08', '2017-05-11 15:37:32', '2017-04-01 11:22:36', '192.168.1.132', '', '', 'a', '', 'kushal@paypal.com'),
(11, 'Mansuri Javed', 'javedmansuri128@gmail.com', '', 0, '2017-03-09 11:08:17', '2017-03-09 16:07:52', '0000-00-00 00:00:00', '127.0.0.1', 'Facebook', '837412699743973', 'a', '', ''),
(13, 'Javed', 'javedmansuri128@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 7451241178, '2017-03-09 16:07:43', '2017-03-09 16:07:52', '2017-03-09 16:10:24', '127.0.0.1', '', '', 'a', '', ''),
(15, 'Jay Parmar', 'jayparmar2711@gmail.com', '', 0, '2017-03-20 16:15:19', '2017-03-22 16:15:50', '0000-00-00 00:00:00', '127.0.0.1', 'Facebook', '1876915889259487', 'a', '', ''),
(17, 'Jay Parmar', 'jayparmar271@gmail.com', '', 0, '2017-03-31 12:10:41', '2017-03-31 12:42:50', '0000-00-00 00:00:00', '103.11.119.146', 'Google', '106323481452784256222', 'a', '', ''),
(18, 'Javed Mansuri', 'javedmansuri136@gmail.com', '', 0, '2017-03-31 12:12:35', '2017-03-31 12:12:35', '0000-00-00 00:00:00', '103.11.119.146', 'Google', '102066194337400255222', 'a', '', ''),
(19, 'KUSHAL PATADIA', 'kushalpatadia@gmail.com', 'b0aa6232bd31b9e1f225cb33932c0423', 0, '2017-03-31 12:53:43', '2017-05-10 14:30:50', '0000-00-00 00:00:00', '192.168.1.132', 'Google', '118430064703601938553', 'a', '939939844', ''),
(42, 'kushal', 'kushal.patadia@ncrypted.com', 'b0aa6232bd31b9e1f225cb33932c0423', 7600779534, '2017-04-24 16:31:30', '2017-04-24 16:58:05', '0000-00-00 00:00:00', '192.168.1.132', '', '', 'a', '873517657', ''),
(44, 'kushal', 'katto.kp@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 8182745896, '2017-05-04 14:27:37', '2017-05-04 14:28:34', '0000-00-00 00:00:00', '192.168.1.132', '', '', 'a', '1861698723', ''),
(54, 'jp', 'jay.parmar@ncrypted.com', 'f7401eefcf281da436bee3c2310c19ba', 760045120, '2017-05-10 14:40:23', '2017-05-10 18:51:35', '0000-00-00 00:00:00', '127.0.0.1', '', '', 'a', '1842856041', ''),
(55, 'jay parmar', 'jayp2866@gmail.com', '', 0, '2017-05-19 17:17:36', '2017-05-22 10:52:37', '0000-00-00 00:00:00', '127.0.0.1', 'Google', '111108085168615201486', 'd', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` double NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'd' COMMENT 'a=active,d=disactive',
  `priority` enum('f','s','t') NOT NULL DEFAULT 't' COMMENT 'f=first,s=second,t=third',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `status`, `priority`) VALUES
(1, 'kushal', 'admin123', 'a', 'f'),
(2, 'jay', 'admin@12345', 'a', 'f'),
(3, 'tester', '123456', 'a', 's'),
(4, 'tester2', '123456', 'a', 's'),
(5, 'pritesh', 'pritesh', 'a', 't');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_menu` (
  `id` double NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `svg_class` varchar(50) NOT NULL,
  `use_xlink` varchar(50) NOT NULL,
  `isActive` enum('y','n') NOT NULL DEFAULT 'y' COMMENT 'y=active,n=disactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_admin_menu`
--

INSERT INTO `tbl_admin_menu` (`id`, `title`, `link`, `svg_class`, `use_xlink`, `isActive`) VALUES
(1, 'Dashboard', 'dashboard-nct/', 'dashboard-dial', '#stroked-dashboard-dial', 'y'),
(2, 'Manage Site', 'managesite-nct/', 'gear', '#stroked-gear', 'y'),
(3, 'Manage Static Pages', 'managestaticpages-nct/', 'table', '#stroked-table', 'y'),
(4, 'Manage Products', 'manageproduct-nct/', 'table', '#stroked-table', 'y'),
(5, 'Seller Product', 'sellerproduct-nct/', 'flag', '#stroked-flag', 'y'),
(6, 'Approve Seller Products Update', 'updatesellerproduct-nct/', 'flag', '#stroked-flag', 'y'),
(7, 'Manage Order', 'manageorder-nct/', 'table', '#stroked-table', 'y'),
(8, 'Pay to Seller', 'payseller-nct/', 'table', '#stroked-table', 'y'),
(9, 'Manage Shipping', 'manageshipping-nct/', 'table', '#stroked-table', 'y'),
(10, 'Manage Slider', 'manageslider-nct/', 'table', '#stroked-table', 'y'),
(11, 'Manage Contactus', 'managecontactus-nct/', 'email', '#stroked-email', 'y'),
(12, 'Manage Category', 'managecategory-nct/', 'table', '#stroked-table', 'y'),
(13, 'Manage Subcategory', 'managesubcategory-nct/', 'table', '#stroked-table', 'y'),
(14, 'Manage Brand', 'managebrand-nct/', 'table', '#stroked-table', 'y'),
(15, 'Manage Users', 'manageuser-nct/', 'table', '#stroked-table', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `w_id` double NOT NULL AUTO_INCREMENT,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`w_id`),
  KEY `fk_register_users_tbl_cart` (`u_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`),
  KEY `p_id_3` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`w_id`, `p_id`, `u_id`, `qty`) VALUES
(48, 46, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confirm_user`
--

CREATE TABLE IF NOT EXISTS `tbl_confirm_user` (
  `con_id` double NOT NULL AUTO_INCREMENT,
  `con_key` varchar(250) NOT NULL,
  `con_u_id` double NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_confirm_user`
--

INSERT INTO `tbl_confirm_user` (`con_id`, `con_key`, `con_u_id`) VALUES
(8, '1839832333', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_us` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(64) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `replyMessage` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `firstName`, `subject`, `email`, `message`, `replyMessage`, `createdDate`, `ipAddress`) VALUES
(1, 'Kushal', 'About Your Web', 'jayp2866@gmail.com', 'Hey I like your Web and i want work at your development team please give me proper contact', 'ohhhh that''s good so meet me tomorrow at shapat hexa B-704 at 2:00pm sharp', '2017-03-10 12:43:23', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menubar`
--

CREATE TABLE IF NOT EXISTS `tbl_menubar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('c','s','b','o') NOT NULL COMMENT 'c=category,s=subcategory,b=brand,o=other',
  `status` enum('a','d') NOT NULL COMMENT 'a=active,d=disactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tbl_menubar`
--

INSERT INTO `tbl_menubar` (`id`, `menu`, `link`, `parent_id`, `type`, `status`) VALUES
(1, 'Home', '{SITE_URL}', 0, 'o', 'a'),
(2, 'Electronics', '{SITE_MOD}products-nct/?cata=''Electronics''', 0, 'c', 'a'),
(3, 'Appliances', '{SITE_MOD}products-nct/?cata=''Appliances''', 0, 'c', 'a'),
(4, 'Men', '{SITE_MOD}products-nct/?cata=''Men''', 0, 'c', 'a'),
(5, 'Women', '{SITE_MOD}products-nct/?cata=''Women''', 0, 'c', 'a'),
(6, 'Kids', '{SITE_MOD}products-nct/?cata=''Kids''', 0, 'c', 'a'),
(7, 'Special Offers', '{SITE_MOD}specialoffer-nct/', 0, 'o', 'a'),
(8, 'Mobiles', '{SITE_MOD}products-nct/?cata=''Electronics''&sub=''Mobiles''', 2, 's', 'a'),
(10, 'Laptops', '{SITE_MOD}products-nct/?cata=''Electronics''&sub=''Laptops''', 2, 's', 'a'),
(12, 'Tv', '{SITE_MOD}products-nct/?cata=''Appliances''&sub=''Tv''', 3, 's', 'a'),
(13, 'Washing Machine', '{SITE_MOD}products-nct/?cata=''Appliances''&sub=''Washing Machine''', 3, 's', 'a'),
(14, 'Air Conditioners', '{SITE_MOD}products-nct/?cata=''Appliances''&sub=''Air Conditioners''', 3, 's', 'a'),
(15, 'Refrigerators', '{SITE_MOD}products-nct/?cata=''Appliances''&sub=''Refrigerators''', 3, 's', 'a'),
(20, 'Clothing', '#', 5, 's', 'a'),
(21, 'Footwear', '#', 5, 's', 'a'),
(22, 'Personal Care Appliances', '#', 5, 's', 'a'),
(23, 'New Arrivals', '#', 6, 's', 'a'),
(24, 'Boys', '#', 6, 's', 'a'),
(25, 'Girls', '#', 6, 's', 'a'),
(26, 'Kids Special', '#', 6, 's', 'a'),
(27, 'Samsung', '{SITE_MOD}products-nct/?search=''Samsung''&sub=''Mobiles''', 8, 'b', 'a'),
(28, 'Apple', '{SITE_MOD}products-nct/?search=''Apple''&sub=''Mobiles''', 8, 'b', 'a'),
(29, 'Motorola', '{SITE_MOD}products-nct/?search=''Motorola''&sub=''Mobiles''', 8, 'b', 'a'),
(30, 'Micromax', '{SITE_MOD}products-nct/?search=''Micromax''&sub=''Mobiles''', 8, 'b', 'a'),
(31, 'Asus', '{SITE_MOD}products-nct/?search=''Asus''&sub=''Mobiles''', 8, 'b', 'a'),
(32, 'Lenovo', '{SITE_MOD}products-nct/?search=''Lenovo''&sub=''Mobiles''', 8, 'b', 'a'),
(33, 'MI', '{SITE_MOD}products-nct/?search=''MI''&sub=''Mobiles''', 8, 'b', 'a'),
(34, 'Headphones', '{SITE_MOD}products-nct/?sub=''Headphones''', 9, 'b', 'a'),
(35, 'Power Banks', '{SITE_MOD}products-nct/?sub=''Power Banks''', 9, 'b', 'a'),
(36, 'Chargers', '{SITE_MOD}products-nct/?sub=''Chargers''', 9, 'b', 'a'),
(37, 'Memory Cards', '{SITE_MOD}products-nct/?sub=''Memory Cards''', 9, 'b', 'a'),
(38, 'Pendrives', '{SITE_MOD}products-nct/?sub=''Pendrives''', 9, 'b', 'a'),
(39, 'Screenguards', '{SITE_MOD}products-nct/?sub=''Screenguards''', 9, 'b', 'a'),
(40, 'Hp', '{SITE_MOD}products-nct/?search=''Hp''&sub=''Laptops''', 10, 'b', 'a'),
(41, 'Dell', '{SITE_MOD}products-nct/?search=''Dell''&sub=''Laptops''', 10, 'b', 'a'),
(42, 'Micromax', '{SITE_MOD}products-nct/?search=''Micromax''&sub=''Laptops''', 10, 'b', 'a'),
(43, 'Lenovo', '{SITE_MOD}products-nct/?search=''Lenovo''&sub=''Laptops''', 10, 'b', 'a'),
(44, 'Apple', '{SITE_MOD}products-nct/?search=''Apple''&sub=''Laptops''', 10, 'b', 'a'),
(45, 'Acer', '{SITE_MOD}products-nct/?search=''Acer''&sub=''Laptops''', 10, 'b', 'a'),
(46, 'Hard Disk', '{SITE_MOD}products-nct/?sub=''Hard Disk''', 11, 'b', 'a'),
(47, 'Mouse', '{SITE_MOD}products-nct/?sub=''Mouse''', 11, 'b', 'a'),
(48, 'Pendrives', '{SITE_MOD}products-nct/?sub=''Pendrives''', 11, 'b', 'a'),
(49, 'Monitor', '{SITE_MOD}products-nct/?sub=''Monitor''', 11, 'b', 'a'),
(50, 'Keyboards', '{SITE_MOD}products-nct/?sub=''Keyboards''', 11, 'b', 'a'),
(51, 'Sony', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(52, 'Samsung', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(53, 'Lg', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(54, 'Vu', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(55, 'BPL', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(56, 'Videocon', '{SITE_MOD}products-nct/?search=''''&sub=''Tv''', 12, 'b', 'a'),
(57, 'Lg', '#', 13, 'b', 'a'),
(58, 'IFB', '#', 13, 'b', 'a'),
(59, 'Whirlpool', '#', 13, 'b', 'a'),
(60, 'Panasonoic', '#', 13, 'b', 'a'),
(61, 'BPL', '#', 13, 'b', 'a'),
(62, 'Voltas', '#', 14, 'b', 'a'),
(63, 'Lg', '#', 14, 'b', 'a'),
(64, 'Hitachi', '#', 14, 'b', 'a'),
(65, 'Samsung', '#', 14, 'b', 'a'),
(66, 'Blue Star', '#', 14, 'b', 'a'),
(67, 'Godrej', '#', 14, 'b', 'a'),
(68, 'Lg', '#', 15, 'b', 'a'),
(69, 'Samsung', '#', 15, 'b', 'a'),
(70, 'Sansui', '#', 15, 'b', 'a'),
(71, 'Godrej', '#', 15, 'b', 'a'),
(72, 'Kelvinator', '#', 15, 'b', 'a'),
(73, 'Philips', '#', 15, 'b', 'a'),
(87, 'SportShoes', '{SITE_MOD}products-nct/?cata=''Men''&sub=''SportShoes''', 4, 's', 'a'),
(88, 'FormalShoes', '{SITE_MOD}products-nct/?cata=''Men''&sub=''FormalShoes''', 4, 's', 'a'),
(89, 'Aeropower', '{SITE_MOD}products-nct/?search=''Aeropower''&sub=''SportShoes''', 87, 'b', 'a'),
(90, 'BRUTON', '{SITE_MOD}products-nct/?search=''BRUTON''&sub=''SportShoes''', 87, 'b', 'a'),
(91, 'Bata', '{SITE_MOD}products-nct/?search=''Bata''&sub=''FormalShoes''', 88, 'b', 'a'),
(92, 'Kraasa', '{SITE_MOD}products-nct/?search=''Kraasa''&sub=''FormalShoes''', 88, 'b', 'a'),
(93, 'Provogue', '{SITE_MOD}products-nct/?search=''Provogue''&sub=''FormalShoes''', 88, 'b', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `n_id` double NOT NULL AUTO_INCREMENT,
  `u_id` double NOT NULL,
  `p_id` double NOT NULL,
  `message` text NOT NULL,
  `n_date` datetime NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`n_id`, `u_id`, `p_id`, `message`, `n_date`) VALUES
(9, 1, 29, 'is approved. So please update with you order status.', '2017-03-27 16:44:37'),
(10, 1, 33, 'is approved. So please update with you order status.', '2017-03-27 16:55:46'),
(11, 1, 34, 'is approved. So please update with you order status.', '2017-03-28 15:46:08'),
(12, 1, 34, 'is approved. So please update with you order status.', '2017-03-28 16:17:43'),
(13, 1, 36, 'is approved. So please update with you order status.', '2017-03-30 16:32:13'),
(14, 1, 37, 'is approved. So please update with you order status.', '2017-03-30 16:34:22'),
(15, 1, 38, 'is approved. So please update with you order status.', '2017-03-30 16:37:08'),
(16, 1, 39, 'is approved. So please update with you order status.', '2017-03-30 16:40:54'),
(17, 1, 40, 'is approved. So please update with you order status.', '2017-03-30 16:52:26'),
(18, 4, 41, 'is approved. So please update with you order status.', '2017-03-30 17:05:50'),
(19, 8, 35, 'is approved. So please update with you order status.', '2017-03-30 17:06:28'),
(20, 1, 34, 'is approved. So please update with you order status.', '2017-03-30 17:06:30'),
(21, 1, 42, 'is approved. So please update with you order status.', '2017-03-30 18:20:50'),
(22, 1, 43, 'is approved. So please update with you order status.', '2017-03-31 11:37:15'),
(23, 1, 42, 'is approved. So please update with you order status.', '2017-03-31 11:37:19'),
(24, 1, 44, 'is approved. So please update with you order status.', '2017-03-31 11:49:18'),
(25, 1, 29, 'is approved. So please update with you order status.', '2017-03-31 15:25:11'),
(26, 1, 33, 'is approved. So please update with you order status.', '2017-03-31 15:30:05'),
(27, 1, 34, 'is approved. So please update with you order status.', '2017-03-31 15:32:54'),
(28, 1, 33, 'is approved. So please update with you order status.', '2017-03-31 15:51:01'),
(29, 1, 33, 'is approved. So please update with you order status.', '2017-03-31 15:56:06'),
(30, 1, 34, 'is updated', '2017-03-31 15:58:53'),
(31, 1, 29, 'is updated', '2017-03-31 17:44:17'),
(32, 1, 45, 'is approved. So please update with you order status.', '2017-04-05 10:31:00'),
(33, 1, 46, 'is approved. So please update with you order status.', '2017-04-05 10:41:39'),
(34, 1, 33, 'is updated', '2017-04-11 13:31:27'),
(35, 1, 29, 'is updated', '2017-04-20 15:23:30'),
(36, 1, 29, 'is updated', '2017-04-21 14:19:01'),
(37, 1, 29, 'is updated', '2017-04-21 14:20:02'),
(38, 1, 29, 'is updated', '2017-04-21 14:21:17'),
(39, 1, 52, 'is approved. So please update with you order status.', '2017-04-21 15:19:39'),
(40, 1, 29, 'is updated', '2017-04-21 18:33:39'),
(41, 1, 46, 'is approved. So please update with you order status.', '2017-04-21 19:05:35'),
(42, 1, 33, 'is updated', '2017-05-03 11:21:54'),
(43, 1, 34, 'is updated', '2017-05-03 11:21:56'),
(44, 1, 34, 'is updated', '2017-05-03 11:22:35'),
(45, 1, 33, 'is updated', '2017-05-03 12:16:45'),
(46, 1, 34, 'is updated', '2017-05-03 12:28:21'),
(47, 1, 33, 'is updated', '2017-05-03 12:28:21'),
(48, 1, 33, 'is updated', '2017-05-06 11:52:39'),
(49, 1, 33, 'is updated', '2017-05-06 11:53:03'),
(50, 1, 33, 'is updated', '2017-05-06 12:10:44'),
(51, 1, 33, 'is updated', '2017-05-06 12:11:23'),
(52, 1, 33, 'is updated', '2017-05-06 12:14:31'),
(53, 1, 33, 'is updated', '2017-05-06 12:15:15'),
(54, 1, 33, 'is updated', '2017-05-06 12:15:39'),
(55, 1, 33, 'is updated', '2017-05-06 12:15:49'),
(56, 1, 33, 'is updated', '2017-05-06 12:17:29'),
(57, 1, 33, 'is updated', '2017-05-06 12:17:44'),
(58, 1, 33, 'is updated', '2017-05-06 12:21:21'),
(59, 1, 33, 'is updated', '2017-05-06 12:22:32'),
(60, 1, 33, 'is updated', '2017-05-06 12:23:25'),
(61, 1, 34, 'is updated', '2017-05-06 12:24:49'),
(62, 1, 46, 'is updated', '2017-05-06 12:25:16'),
(63, 1, 46, 'is updated', '2017-05-06 12:25:23'),
(64, 1, 46, 'is updated', '2017-05-06 12:25:24'),
(65, 1, 46, 'is updated', '2017-05-06 12:25:26'),
(66, 1, 46, 'is updated', '2017-05-06 12:25:26'),
(67, 1, 46, 'is updated', '2017-05-06 12:25:27'),
(68, 1, 46, 'is updated', '2017-05-06 12:25:27'),
(69, 1, 46, 'is updated', '2017-05-06 12:25:28'),
(70, 1, 33, 'is updated', '2017-05-06 12:26:52'),
(71, 1, 46, 'is updated', '2017-05-06 12:27:29'),
(72, 1, 46, 'is updated', '2017-05-06 12:28:22'),
(73, 1, 46, 'is updated', '2017-05-06 12:29:00'),
(74, 1, 46, 'is updated', '2017-05-06 12:29:28'),
(75, 1, 46, 'is updated', '2017-05-06 12:30:23'),
(76, 1, 46, 'is updated', '2017-05-06 12:31:20'),
(77, 1, 46, 'is updated', '2017-05-06 12:31:48'),
(78, 1, 46, 'is updated', '2017-05-06 12:35:41'),
(79, 1, 46, 'is updated', '2017-05-06 12:38:31'),
(80, 1, 46, 'is updated', '2017-05-06 12:39:41'),
(81, 1, 33, 'is updated', '2017-05-06 12:40:30'),
(82, 4, 47, 'is approved. So please update with you order status.', '2017-05-09 11:55:29'),
(83, 1, 50, 'is approved. So please update with you order status.', '2017-05-09 17:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `id` double NOT NULL AUTO_INCREMENT,
  `address_id` double NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` enum('p','b','d','c','sent') NOT NULL DEFAULT 'p' COMMENT 'p=pending,b=purchased,d=deliverd,c=cancle',
  `purchase_date` datetime NOT NULL,
  `ip` varchar(25) NOT NULL,
  `alldetails` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `address_id`, `order_id`, `p_id`, `u_id`, `qty`, `price`, `status`, `purchase_date`, `ip`, `alldetails`) VALUES
(77, 8, 'p27091184', 5, 1, 1, 22999, 'd', '2017-05-05 18:07:23', '103.11.119.146', ''),
(78, 2, 'p44924322', 50, 4, 1, 1, 'd', '2017-05-05 18:12:26', '173.0.82.126', ''),
(79, 1, 'p94424717', 50, 4, 1, 1, 'd', '2017-05-05 18:17:29', '173.0.82.126', '1.00 India Ahmedabad kushalpatadia-buyer@gmail.com test 97DZB4HKC6SEE verified'),
(80, 1, 'p82744859', 50, 4, 1, 1, 'd', '2017-05-05 18:25:33', '173.0.82.126', '{"mc_gross":"1.00","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"97DZB4HKC6SEE","address_street":"1/6 Ami Appartment\r\nNr. Naranpura Telephone Exchange","payment_date":"05:55:25 May 05, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"380063","first_name":"test","mc_fee":"0.33","address_country_code":"IN","address_name":"kushalpatadia","notify_version":"3.8","custom":"p82744859","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"A.7n6Acd75CB8FdbeZyRGF.BoVPlAPl2Av-5t5AyC74eF7BojtTq.W5m","payer_email":"kushalpatadia-buyer@gmail.com","txn_id":"828714051H2576049","payment_type":"instant","last_name":"buyer","item_name1":"BRUTON 4G-1 Shoes","address_state":"Gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.33","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"1.00","ipn_track_id":"44acfb35373d2"}'),
(88, 4, 'p96218532', 5, 8, 1, 22999, 'd', '2017-05-05 18:36:06', '103.11.119.146', ''),
(89, 4, 'p71468747', 5, 8, 1, 22999, 'd', '2017-05-05 18:36:41', '103.11.119.146', ''),
(90, 4, 'p49998606', 5, 8, 1, 22999, 'd', '2017-05-05 18:36:58', '103.11.119.146', ''),
(91, 4, 'p99328809', 5, 8, 1, 22999, 'd', '2017-05-05 18:37:10', '103.11.119.146', ''),
(92, 4, 'p27548568', 5, 8, 1, 22999, 'd', '2017-05-05 18:37:20', '103.11.119.146', ''),
(93, 4, 'p71898614', 5, 8, 1, 22999, 'd', '2017-05-05 18:37:30', '103.11.119.146', ''),
(94, 1, 'p42964725', 50, 4, 1, 1, 'd', '2017-05-05 18:40:09', '173.0.82.126', '{"mc_gross":"1.00","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"97DZB4HKC6SEE","address_street":"1/6 Ami Appartment\r\nNr. Naranpura Telephone Exchange","payment_date":"06:09:58 May 05, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"380063","first_name":"test","mc_fee":"0.33","address_country_code":"IN","address_name":"kushalpatadia","notify_version":"3.8","custom":"p42964725","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"AtCwNs8cUsdXgFVtexU-GW8qyi7oAkF-Gcl1lOmo66DaAyRuY2JDcFmc","payer_email":"kushalpatadia-buyer@gmail.com","txn_id":"44J98244SB432442E","payment_type":"instant","last_name":"buyer","item_name1":"BRUTON 4G-1 Shoes","address_state":"Gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.33","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"1.00","ipn_track_id":"f73263905fa1f"}'),
(95, 4, 'p73588360', 5, 8, 1, 22999, 'd', '2017-05-05 18:41:10', '103.11.119.146', ''),
(96, 4, 'p30398903', 5, 8, 1, 22999, 'd', '2017-05-05 18:41:30', '103.11.119.146', ''),
(97, 4, 'p72968142', 5, 8, 1, 22999, 'd', '2017-05-05 18:41:32', '103.11.119.146', ''),
(98, 4, 'p71928574', 47, 8, 1, 200, 'd', '2017-05-05 18:41:53', '103.11.119.146', ''),
(99, 12, 'p26683244', 50, 3, 1, 60, 'd', '2017-05-05 18:43:51', '103.11.119.146', ''),
(100, 12, 'p26853118', 50, 3, 1, 1, 'd', '2017-05-05 18:48:09', '173.0.82.126', '{"mc_gross":"1.00","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"NU4R7UFMA99T6","address_street":"p1\r\nramukaka","payment_date":"06:17:45 May 05, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"380045","first_name":"Prince","mc_fee":"0.33","address_country_code":"IN","address_name":"punit","notify_version":"3.8","custom":"p26853118","payer_status":"unverified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"ahmedabad","verify_sign":"A3a1nKXGdVr68tqqQ8tFCgXJxlpxABhjiHo9vTS-LXjHogoKsfrvhzYv","payer_email":"priteshvadhiya@hotmail.com","txn_id":"6Y810364KL518974K","payment_type":"instant","last_name":"Patel","item_name1":"BRUTON 4G-1 Shoes","address_state":"gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.33","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"1.00","ipn_track_id":"e3266d97aa0be"}'),
(101, 4, 'p59498337', 5, 8, 1, 22999, 'd', '2017-05-05 18:50:46', '103.11.119.146', ''),
(102, 4, 'p50058597', 5, 8, 1, 22999, 'd', '2017-05-05 18:50:49', '103.11.119.146', ''),
(103, 4, 'p45328725', 5, 8, 1, 22999, 'd', '2017-05-08 10:51:27', '103.11.119.146', ''),
(104, 4, 'p43868136', 5, 8, 1, 22999, 'd', '2017-05-08 10:51:52', '103.11.119.146', ''),
(105, 4, 'p85728190', 5, 8, 1, 22999, 'd', '2017-05-08 10:51:52', '103.11.119.146', ''),
(106, 4, 'p10698337', 5, 8, 1, 22999, 'd', '2017-05-08 10:51:52', '103.11.119.146', ''),
(107, 4, 'p26378577', 5, 8, 1, 22999, 'd', '2017-05-08 10:52:06', '103.11.119.146', ''),
(108, 4, 'p79998493', 5, 8, 1, 22999, 'd', '2017-05-08 10:52:06', '103.11.119.146', ''),
(112, 8, 'p60731432', 24, 1, 1, 999, 'd', '2017-05-08 11:33:34', '173.0.82.126', '{"mc_gross":"16.65","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"F5B8USRJG75H6","address_street":"A-105,Aditya Appartment\r\nNew C.G Road,","payment_date":"23:03:18 May 07, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"382424","first_name":"test","mc_fee":"0.87","address_country_code":"IN","address_name":"JayParmar","notify_version":"3.8","custom":"p60731432","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"An7H3kH8.DY56ocyWs9pEuVQUM5wA7sr3zdfabB48TGyUUmZ5-d2F7Mf","payer_email":"jayparmar271-buyer@gmail.com","txn_id":"4KA39782VL508484Y","payment_type":"instant","last_name":"buyer","item_name1":"Provogue Lace up shoes","address_state":"Gujarat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.87","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"16.65","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"16.65","ipn_track_id":"bc7243cf571e8"}'),
(119, 4, 'p80138909', 5, 8, 1, 22999, 'd', '2017-05-08 11:59:53', '103.11.119.146', ''),
(120, 4, 'p80138909', 3, 8, 1, 11999, 'd', '2017-05-08 11:59:53', '103.11.119.146', ''),
(121, 4, 'p80138909', 1, 8, 1, 8999, 'd', '2017-05-08 11:59:53', '103.11.119.146', ''),
(122, 4, 'p80138909', 4, 8, 1, 7490, 'd', '2017-05-08 11:59:53', '103.11.119.146', ''),
(123, 4, 'p80138909', 6, 8, 1, 9499, 'd', '2017-05-08 11:59:53', '103.11.119.146', ''),
(124, 1, 'p40444591', 50, 4, 1, 60, 'd', '2017-05-08 12:01:21', '103.11.119.146', ''),
(125, 2, 'p99264650', 50, 4, 1, 60, 'd', '2017-05-08 12:26:29', '173.0.82.126', '{"mc_gross":"217.65","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","item_number2":"","payer_id":"F5B8USRJG75H6","address_street":"A-105 Aditya Appartment\r\nNew C.G Road","payment_date":"23:56:18 May 07, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"382424","first_name":"test","mc_fee":"7.70","address_country_code":"IN","address_name":"jay","notify_version":"3.8","custom":"order_id=p99264650&u_id=4","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"2","address_city":"Ahmedabad","verify_sign":"A0KTMB4-ZjjK-X-NYRBS6h0mNzW.AIWwRgnrp4pZiOF-nHCAFIx0EyOs","payer_email":"jayparmar271-buyer@gmail.com","txn_id":"1SX1591704254384C","payment_type":"instant","last_name":"buyer","address_state":"Gujrat","item_name1":"BRUTON 4G-1 Shoes","receiver_email":"kushalpatadia-facilitator@gmail.com","item_name2":"Redmi Note 4 (Gold, 64 GB)","payment_fee":"7.70","quantity1":"1","quantity2":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","mc_gross_2":"216.65","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"217.65","ipn_track_id":"3c4a73124494"}'),
(126, 2, 'p99264650', 9, 4, 1, 12999, 'd', '2017-05-08 12:26:29', '173.0.82.126', '{"mc_gross":"217.65","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","item_number2":"","payer_id":"F5B8USRJG75H6","address_street":"A-105 Aditya Appartment\r\nNew C.G Road","payment_date":"23:56:18 May 07, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"382424","first_name":"test","mc_fee":"7.70","address_country_code":"IN","address_name":"jay","notify_version":"3.8","custom":"order_id=p99264650&u_id=4","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"2","address_city":"Ahmedabad","verify_sign":"A0KTMB4-ZjjK-X-NYRBS6h0mNzW.AIWwRgnrp4pZiOF-nHCAFIx0EyOs","payer_email":"jayparmar271-buyer@gmail.com","txn_id":"1SX1591704254384C","payment_type":"instant","last_name":"buyer","address_state":"Gujrat","item_name1":"BRUTON 4G-1 Shoes","receiver_email":"kushalpatadia-facilitator@gmail.com","item_name2":"Redmi Note 4 (Gold, 64 GB)","payment_fee":"7.70","quantity1":"1","quantity2":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","mc_gross_2":"216.65","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"217.65","ipn_track_id":"3c4a73124494"}'),
(127, 1, 'p60644719', 2, 4, 1, 8999, 'd', '2017-05-08 12:40:35', '103.11.119.146', ''),
(128, 1, 'p84654164', 2, 4, 1, 8999, 'd', '2017-05-08 12:42:53', '173.0.82.126', '{"mc_gross":"149.98","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"F5B8USRJG75H6","address_street":"1/6 Ami Appartment\r\nNr. Naranpura Telephone Exchange","payment_date":"00:12:34 May 08, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"380063","first_name":"test","mc_fee":"5.40","address_country_code":"IN","address_name":"kushalpatadia","notify_version":"3.8","custom":"order_id=p84654164&u_id=4","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"AOh0tu.5JUQyG2Aao4MpntBA2sFjAJWLdej5hR6V9uJW.wF.-tinLUya","payer_email":"jayparmar271-buyer@gmail.com","txn_id":"2ND727298J4494116","payment_type":"instant","last_name":"buyer","item_name1":"SAMSUNG Galaxy J2","address_state":"Gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"5.40","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"149.98","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"149.98","ipn_track_id":"ca1ba15bd9fb"}'),
(129, 2, 'p69944758', 50, 4, 1, 60, 'd', '2017-05-09 11:11:17', '173.0.82.126', '{"mc_gross":"1.00","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"97DZB4HKC6SEE","address_street":"A-105 Aditya Appartment\r\nNew C.G Road","payment_date":"22:41:09 May 08, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"382424","first_name":"test","mc_fee":"0.33","address_country_code":"IN","address_name":"jay","notify_version":"3.8","custom":"order_id=p69944758&u_id=4","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"ALKy1VlP4TTkO-p7z.xyaShsSLyKA3O5ELj4Lq4Tb74Wayh9UUlq0HuN","payer_email":"kushalpatadia-buyer@gmail.com","txn_id":"53Y63487XY819122J","payment_type":"instant","last_name":"buyer","item_name1":"BRUTON 4G-1 Shoes","address_state":"Gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.33","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"1.00","ipn_track_id":"4c2f7e6614d4a"}'),
(130, 1, 'p93604265', 50, 4, 1, 60, 'd', '2017-05-09 11:22:35', '173.0.82.126', '{"mc_gross":"1.00","protection_eligibility":"Eligible","address_status":"confirmed","item_number1":"","payer_id":"97DZB4HKC6SEE","address_street":"1/6 Ami Appartment\r\nNr. Naranpura Telephone Exchange","payment_date":"22:52:16 May 08, 2017 PDT","payment_status":"Completed","charset":"windows-1252","address_zip":"380063","first_name":"test","mc_fee":"0.33","address_country_code":"IN","address_name":"kushalpatadia","notify_version":"3.8","custom":"order_id=p93604265&u_id=4","payer_status":"verified","business":"kushalpatadia-facilitator@gmail.com","address_country":"India","num_cart_items":"1","address_city":"Ahmedabad","verify_sign":"AZsMAD7lpF53UaZFve4baDUmTCMDADNACkgMlpZOXwaRM1TTuBa1d6AU","payer_email":"kushalpatadia-buyer@gmail.com","txn_id":"23M3242403476471F","payment_type":"instant","last_name":"buyer","item_name1":"BRUTON 4G-1 Shoes","address_state":"Gujrat","receiver_email":"kushalpatadia-facilitator@gmail.com","payment_fee":"0.33","quantity1":"1","receiver_id":"Q9K7XPL7AQHEY","txn_type":"cart","mc_gross_1":"1.00","mc_currency":"USD","residence_country":"IN","test_ipn":"1","transaction_subject":"","payment_gross":"1.00","ipn_track_id":"b919489280d12"}'),
(131, 4, 'p42208279', 1, 8, 1, 8999, 'd', '2017-05-09 16:30:36', '103.11.119.146', ''),
(132, 4, 'p32908501', 1, 8, 1, 8999, 'd', '2017-05-09 16:30:54', '103.11.119.146', ''),
(133, 4, 'p98648270', 1, 8, 1, 8999, 'd', '2017-05-09 16:30:58', '103.11.119.146', ''),
(192, 8, 'p64011868', 47, 1, 3, 2000, 'd', '2017-05-18 11:55:22', '127.0.0.1', ''),
(193, 8, '30981992', 33, 1, 1, 25000, 'd', '2017-05-20 13:10:47', '127.0.0.1', ''),
(195, 8, 'p50021917', 46, 1, 1, 15000, 'sent', '2017-05-20 16:02:53', '127.0.0.1', ''),
(196, 8, 'p50021917', 24, 1, 1, 999, 'd', '2017-05-20 16:02:53', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_history`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_history` (
  `id` double NOT NULL AUTO_INCREMENT,
  `address_id` double NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` enum('p','b','d','c') NOT NULL DEFAULT 'p' COMMENT 'p=pending,b=purchased,d=deliverd,c=cancle',
  `purchase_date` datetime NOT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_payment_history`
--

INSERT INTO `tbl_payment_history` (`id`, `address_id`, `order_id`, `p_id`, `u_id`, `qty`, `price`, `status`, `purchase_date`, `ip`) VALUES
(1, 8, 'p34421716', 46, 1, 1, 15000, 'p', '2017-05-04 16:54:40', '127.0.0.1'),
(2, 8, 'p95171268', 46, 1, 1, 15000, 'p', '2017-05-04 17:01:41', '127.0.0.1'),
(3, 8, 'p36871849', 46, 1, 1, 15000, 'p', '2017-05-04 17:06:09', '127.0.0.1'),
(4, 8, 'p28411884', 46, 1, 1, 15000, 'p', '2017-05-04 17:08:03', '127.0.0.1'),
(5, 8, 'p88081525', 46, 1, 1, 15000, 'p', '2017-05-05 09:57:27', '127.0.0.1'),
(6, 8, 'p71741866', 46, 1, 1, 15000, 'p', '2017-05-05 09:57:38', '127.0.0.1'),
(7, 8, 'p70281979', 46, 1, 1, 15000, 'p', '2017-05-05 09:58:05', '127.0.0.1'),
(8, 8, 'p83921593', 34, 1, 1, 58888, 'p', '2017-05-05 16:06:57', '127.0.0.1'),
(9, 8, 'p82671307', 33, 1, 1, 1500, 'p', '2017-05-06 18:17:46', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` double NOT NULL AUTO_INCREMENT,
  `imageName` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `qty_available` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviews` varchar(250) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(25) NOT NULL,
  `shortDescription` tinytext NOT NULL,
  `specification` text NOT NULL,
  `additionalinfo` text NOT NULL,
  `purchased` double NOT NULL DEFAULT '0',
  `isActive` enum('y','n','u') NOT NULL DEFAULT 'n' COMMENT 'y=yes;n=no;u=updated',
  `upload_by` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `imageName`, `image2`, `image3`, `title`, `category`, `subcategory`, `brand`, `price`, `qty_available`, `rating`, `reviews`, `size`, `color`, `shortDescription`, `specification`, `additionalinfo`, `purchased`, `isActive`, `upload_by`) VALUES
(1, 'redmi-3s-prime_bcf79.jpeg', 'mi-redmi-3s-prime-na-original-imaeh6beckzjqeza_048cf.jpeg', 'mi-redmi-3s-prime-na-original-imaeh6beckzjqeza_f9476.jpeg', 'Redmi 3S Prime (Gold, 32 GB)', 'Electronics', 'Mobiles', 'MI', 8999, 1, 0, '', '5 inch', 'Others', '<li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB\r</li><li>5 inch HD Display\r</li><li>13MP Primary Camera | 5MP Front\r</li><li>4100 mAh Li-Ion Polymer Battery\r</li><li>Qualcomm Snapdragon 430 64-bit Processor</li>', '<li>testing</li>', '<li>testing\r</li><li>test\r</li><li>testtt123</li>', 0, 'y', ''),
(2, 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9vnxnvzhd  price-7850_e2e9d.jpeg', 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9jxuzuxbh_f4386.jpeg', 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9f49xzwve_ee213.jpeg', 'SAMSUNG Galaxy J2', 'Electronics', 'Mobiles', 'Samsung', 8999, 2, 0, '', '4.7 inch', 'Others', '<li>SAMSUNG Galaxy J2 - 2016 Smartphone | Key Features include Android Marshmallow 6, Quad Core Processor, mAh\r</li><li></li>', '<li><ul>\r</li><li>Sales Package: Handset, Battery, Travel Adapter, Stereo Headset\r</li><li>Model Number:SM-J200GZKDINS/SM-J200GZKHINS\r</li><li>Model Name: Galaxy J2\r</li><li>Color :Black\r</li><li>Browse Type:Smartphones\r</li><li>SIM Type:Dual Sim\r</li><li>Hybrid Sim Slot:No\r</li><li>Touchscreen:Yes\r</li><li>OTG Compatible:No\r</li><li></ul>\r</li><li></li>', '<li>1 Year Manufacturer Warranty\r</li><li>10 Days Replacement Policy\r</li><li>Cash on Delivery available</li>', 17, 'y', ''),
(3, 'mi-mi-4i-mzb4430in-original-imaebagndxhhvnyk.jpeg', 'mi-mi-4i-mzb4430in-original-imaebagzvzcagadg.jpeg', 'mi-mi-4i-mzb4430in-original-imaebagzvzcagadg.jpeg', 'Mi 4i (Blue, 16 GB)', 'Electronics', 'Mobiles', 'MI', 11999, 5, 0, '', '5 inch', 'Blue', 'To achieve flagship status, a phone must have more than a 1080p resolution. Instead, the Mi 4i comes with a 12.7 cm (5) Sharp / JDI display, with up to 95% of colors from the NTSC palette. It is also powered by an octa-core Qualcomm Snapdragon 615 process', '    2 GB RAM | 16 GB ROM |\r\n    5 inch Full HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    3030 mAh Li-ion Polymer Battery\r\n    2nd-gen Snapdragon 615 64-bit octa-core Processor', 'Powered by a 64-bit, 2nd Gen Qualcomm Snapdragon 615 octa-core processor, the Mi 4i is not only the leader for quality smartphones, but also the benchmark for extreme performance. It has 4 performance cores clocking at 1.7 GHz and 4 power-saving cores at 1.1 GHz to ensure quicker multitasking between applications.\r\n', 0, 'y', ''),
(4, 'samsung-galaxy-on7-sm-g600f-original-imaecqkgzeuz9ebn price-7490.jpeg', 'samsung-galaxy-on5-sm-g550fzddins-original-imaecjy92yrm4mfr.jpeg', 'samsung-galaxy-on5-sm-g550fzddins-original-imaecjy9jkpzuxvn.jpeg', 'SAMSUNG Galaxy On5', 'Electronics', 'Mobiles', 'Samsung', 7490, 5, 0, '', '5 Inch', 'White', '    1.5 GB RAM | 8 GB ROM | Expandable Upto 128 GB\r\n    5 inch HD Display\r\n    8MP Primary Camera | 5MP Front\r\n    2600 mAh Li-Ion Battery\r\n    Exynos 3475 Processor', 'Sales Package:    Handset, Stereo Headset, Travel Adaptor, Data Cable, Product User Guide, Battery\r\nModel Number:    SM-G550FZKDINS/SM-G550FZDDINS\r\nModel Name:    Galaxy On5\r\nColor:    Gold\r\nBrowse Type:Smartphones\r\nSIM Type:Dual Sim\r\nHybrid Sim Slot:	No\r\nTouchscreen:	Yes\r\nOTG Compatible:	 Yes\r\nSound Enhancements:   Integrated Hands-free Speakers, Noise Cancellation', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 1, 'y', ''),
(5, 'mi-5-na-original-imaejfhg2fjszfs5.jpeg', 'mi-5-na-original-imaejfhggbuhdtmz.jpeg', 'mi-5-na-original-imaejfhghhxnrgyj.jpeg', 'Mi 5 (White, 32 GB)', 'Electronics', 'Mobiles', 'MI', 22999, 2, 0, '', '5.15 inch', 'white', 'Featuring a sharp profile and a lightweight body and powered by the Snapdragon 820 processor, the MI 5 is perfect for your fast lifestyle. Now you can game even faster with the Adreno 530 graphics processor.\r\n If you are on a lookout for an insanely fast ', '       3 GB RAM | 32 GB ROM |\r\n    5.15 inch Full HD Display\r\n    16MP Primary Camera | 4MP Front\r\n    3000 mAh Li-Ion Polymer Battery\r\n    Snapdragon 820 Kryo Processor', 'test', 12, 'y', ''),
(7, 'hp-notebook-original-imaem34tyzqvpmgu_39467.jpeg', 'hp-notebook-original-imaem34tvsgbvzf8_53abd.jpeg', 'hp-notebook-original-imaem34tdkryayb6  price-25490_2ce58.jpeg', 'Dell Inspiron Core i3 5th Gen', 'Electronics', 'Laptops', 'Dell', 26490, 5, 0, '', '15.6 inch Display', 'Black', '    Sales Package\r\n        Laptop, Battery, Power Adaptor, User Guide and Warranty Document\r\n    Model Number\r\n        3558\r\n    Part Number\r\n        Z565155HIN9/Z565155UIN9\r\n    Model Name\r\n        Inspiron 15\r\n    Series\r\n        Inspiron\r\n    Color\r\n  ', '    Intel Core i3 Processor ( 5th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Linux/Ubuntu Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'test', 0, 'y', ''),
(8, 'mi-redmi-note-3-na-original-imaegcryhxs4vteu.jpeg', 'mi-redmi-note-3-na-original-imaegcrftpz4hahj.jpeg', 'mi-redmi-note-3-na-original-imaegcrfahfzsvgp.jpeg', 'Redmi Note 3', 'Electronics', 'Mobiles', 'MI', 9999, 5, 0, '', '5.5 inch', 'Dark Grey', ' The Redmi 3 mobile phone is designed for millennials. Its high-speed performance lets you switch between apps without any fuss, supports fluid movements so your online gaming experience is enhanced, and supports fingerprint sensor so your sense of privac', '    2 GB RAM | 16 GB ROM | Expandable Upto 32 GB\r\n    5.5 inch Full HD Display\r\n    16MP Primary Camera | 5MP Front\r\n    4050 mAh Li-Polymer Battery Battery\r\n    Qualcomm Snapdragon 650 64-bit Processor', 'test', 0, 'y', ''),
(9, 'mi-redmi-note-4-na-original-imaeqdxgrdhxgkcx.jpeg', 'mi-redmi-note-4-na-original-imaeqdxzsw54nyuf.jpeg', 'mi-redmi-note-4-mzb5298in-original-imaery4rn5pwdmxn.jpeg', 'Redmi Note 4 (Gold, 64 GB)', 'Electronics', 'Mobiles', 'MI', 12999, 5, 0, '', '5.5 inch', 'white', '<li>Upgrade to the Redmi Note 4 and experience power like never before. The Redmi Note 4 offers high-speed performance along with a long battery life. </li>', '<li>    4 GB RAM | 64 GB ROM | Expandable Upto 128 GB\r</li><li>    5.5 inch Full HD Display\r</li><li>    13MP Primary Camera | 5MP Front\r</li><li>    4100 mAh Li-Polymer Battery\r</li><li>    Qualcomm Snapdragon 625 64-bit Processor</li>', '<li>Switching between apps or launching apps wonâ€™t take forever with the Redmi Note 4, thanks to the octa-core Snapdragon 625 processor. To add more power to you, the Redmi Note 4 is 20% more power efficient than the Redmi Note 3.</li>', 0, 'y', ''),
(10, 'micromax-canvas-6-pro-e484-original-imaeg59pf9q8ypv4.jpeg', 'noimage.jpeg', 'noimage.jpeg', 'Micromax Canvas 6 Pro', 'Electronics', 'Mobiles', 'Micromax', 10440, 5, 0, '', '5.5 inch', 'Black', ' The Micromax Canvas 6 Pro is powered by a 2.0GHz Helio x10 Octa Core processor to let you enjoy a smooth and fast performance. If you are the kind that enjoys action packed games, this phone gives you an immersive experience. With a 4GB RAM, this phone l', '    4 GB RAM | 16 GB ROM | Expandable Upto 64 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    3000 mAh Li-Polymer Battery\r\n    MT6795M Processor', '1 Year Manufacturer Warranty', 0, 'y', ''),
(11, 'micromax-canvas-knight-2-canvas-knight-2-e471-original-imaepz9t8jyngjez.jpeg', 'noimage.jpeg', 'noimage.jpeg', 'Micromax Canvas Knight 2', 'Electronics', 'Mobiles', 'Micromax', 7499, 4, 0, '', '5 inch', 'White & Silver', 'The Micromax Canvas Knight 2 is your source of entertainment and style. Carry this Android smartphone with you wherever you go and kick boredom out in style. ', '    2 GB RAM | 16 GB ROM | Expandable Upto 32 GB\r\n    5 inch HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    2280 mAh Battery', '1 Year Manufacturer Warranty', 9, 'y', ''),
(12, 'hp-notebook-original-imaem34tdkryayb6  price-25490.jpeg', 'hp-notebook-original-imaem34tyzqvpmgu.jpeg', 'hp-notebook-original-imaem34tjbebgruz.jpeg', 'HP APU Quad Core A8', 'Electronics', 'Laptops', 'HP', 25490, 5, 0, '', '15.6 inch Display', 'Black', '    AMD APU Quad Core A8 Processor ( 6th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Windows 10 Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(13, 'hp-notebook-original-imaemw4tq9v2pfwy.jpeg', 'hp-notebook-original-imaem34tvsgbvzf8.jpeg', 'hp-notebook-original-imaem34tjbebgruz.jpeg', 'HP APU Quad Core E2', 'Electronics', 'Laptops', 'HP', 20980, 5, 0, '', '15.6 inch Display', 'Black', '     AMD APU Quad Core E2 Processor ( 6th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit DOS Operating System\r\n    500 GB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(14, 'hp-notebook-original-imaeprzxabum9r6j.jpeg', 'hp-notebook-original-imaeprzvja5wszz2  price-30990.jpeg', 'hp-notebook-original-imaeprzr3zkjng64.jpeg', 'HP Core i3 5th Gen  X5Q18PA#ACJ 15-BE006TU Noteboo', 'Electronics', 'Laptops', 'HP', 29990, 5, 0, '', '15.6 inch Display', 'Black', '    Intel Core i3 Processor ( 5th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Windows 10 Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(15, 'hp-notebook-original-imaequgyqvnrzccd  price-30990.jpeg', 'hp-notebook-original-imaequg4wzdutwra.jpeg', 'hp-notebook-original-imaequg4tdwsphzs.jpeg', 'HP Core i3 6th Gen  1DF78PA#ACJ BE015TU Notebook  ', 'Electronics', 'Laptops', 'HP', 30990, 5, 0, '', '15.6 inch Display', 'Black', '    Intel Core i3 Processor ( 6th Gen )\r\n    8 GB DDR4 RAM\r\n    DOS Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(16, 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektngxhuvzhek.jpeg', 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektnhhyzffxg2 price-5189.jpeg', 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektnhhyzffxg2 price-5189.jpeg', 'SAMSUNG Galaxy J1 Ace', 'Electronics', 'Mobiles', 'Samsung', 5190, 3, 0, '', '4.3 Inch', 'White', '    512 MB RAM | 4 GB ROM | Expandable Upto 128 GB\r\n    4.3 inch WVGA Display\r\n    5MP Primary Camera | 2MP Front\r\n    1800 mAh Li-Ion Battery', '<li>Sales Package:    Handset, Stereo Headset, Charger, Product User Guide, Battery</li>\r\n<li>Model Number:    SM-J110HZWDINS</li>\r\n<li>Model Name:Galaxy J1 Ace</li>\r\n<li>Color:White</li>\r\n<li>Browse Type:Smartphones</li>\r\n<li>SIM Type:Dual Sim</li>\r\n<li>Hybrid Sim Slot:No</li>\r\n<li>Touchscreen:Yes</li>\r\n<li>Additional Content:microSD</li>\r\n</ul>', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 4, 'y', ''),
(17, 'hp-pavilion-notebook-original-imaemqnah4yv8vy6  price 15490.jpeg', 'hp-pavilion-notebook-original-imaemqnauauzsm88.jpeg', 'hp-pavilion-original-imaeg59gydguax9b.jpeg', 'HP Pavilion Celeron Dual Core-W0H99PA 11-S003TU', 'Electronics', 'Laptops', 'HP', 15490, 5, 0, '', '15.6 inch Display', 'Black', '    Intel Celeron Dual Core Processor \r\n    2 GB DDR3 RAM\r\n    DOS Operating System\r\n    500 GB HDD\r\n    11.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(18, 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff7bqnsgm9 price 16900.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff2czfvf7r.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsfepzhsungt.jpeg', 'SAMSUNG Galaxy J7 Prime', 'Electronics', 'Mobiles', 'Samsung', 16900, 5, 0, '', '5.5 Inch', 'Black', '    3 GB RAM | 16 GB ROM | Expandable Upto 256 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 8MP Front\r\n    3300 mAh Battery\r\n    Exynos 7870 Processor', '<ul>\r\n<li>Sales Package:Handset, Charger, Data Cable, Earphone, Ejector Pin</li>\r\n<li>Model Number:SM-G610FZDDINS</li>\r\n<li>Model Name: Galaxy J7 Prime</li>\r\n<li>Color :Black</li>\r\n<li>Browse Type:Smartphones</li>\r\n<li>SIM Type:Dual Sim</li>\r\n<li>Hybrid Sim Slot:No</li>\r\n<li>Touchscreen:Yes</li>\r\n<li>OTG Compatible:Yes</li>\r\n</ul>', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available', 0, 'y', ''),
(19, 'black-orange-ai110-aero-8-original-imaemvf3ra5xrkhj.jpeg', 'black-orange-ai110-aero-9-original-imaehg2tqqerfhna.jpeg', 'black-orange-ai110-aero-9-original-imaehg2tsxcrbkbh.jpeg', 'Aero Power Play Running Shoes  (Black, Orange)', 'Men', 'SportShoes', 'Aeropower', 474, 5, 0, '', '6', 'Black, Orange', 'Testing', 'Testing', 'Testing', 2, 'y', ''),
(20, 'blue-ai110-aero-7-original-imaeavxdkzagp2s3.jpeg', 'blue-ai110-aero-7-original-imaeavxdw5frbjcz.jpeg', 'blue-ai110-aero-7-original-imaeavxdhypzb2hy.jpeg', 'Aero Power Play Running Shoes  (Blue)', 'Men', 'SportShoes', 'Aeropower', 464, 4, 0, '', '9', 'Blue', 'Testing', 'Testing', 'Testing', 5, 'y', ''),
(21, 'bruton-4g-1-10-bruton-multi-color-original-imaequka7cgceznc.jpeg', 'bruton-4g-1-10-bruton-multi-color-original-imaequk9x7jweysz.jpeg', 'aircum-4g-1-8-aircum-multi-color-original-imaequkbuwsqtsrz.jpeg', 'BRUTON 4G-1 Shoes', 'Men', 'SportShoes', 'BRUTON', 400, 5, 0, '', '9', 'Blue', '<li>Testing</li>', '<li>Testing</li>', '<li>Testing</li>', 2, 'y', ''),
(22, 'black-821933-bata-9-original-imaez2hqxsfebbzn.jpeg', 'black-821933-bata-9-original-imaez2hqsczeergh.jpeg', 'black-821933-bata-9-original-imaez2hqdgmeafbm.jpeg', 'Bata SANATH Lace Up Shoes', 'Men', 'FormalShoes', 'Bata', 768, 5, 0, '', '9', 'Black', 'Testing', 'Testing', 'Testing', 10, 'y', ''),
(23, 'black-k-914-kraasa-6-original-imaemwjkmrkzbzrb.jpeg', 'black-k-914-kraasa-7-original-imaeax7v6uvq5yww.jpeg', 'black-k-914-kraasa-9-original-imaeax7v2nkvyys2.jpeg', 'Kraasa High Ankle(Black)', 'Men', 'FormalShoes', 'Kraasa', 799, 5, 0, '', ' 7', 'Black', '<li>Testing</li>', '<li>Testing</li>', '<li>Testing</li>', 12, 'y', ''),
(24, 'brown-supf00001-mr-cl-8-original-imaeppvzayzzw5hx.jpeg', 'brown-supf00001-mr-cl-8-original-imaeppu5btnhpzrt.jpeg', 'brown-supf00001-mr-cl-8-original-imaeppvzayzzw5hx.jpeg', 'Provogue Lace up shoes', 'Men', 'FormalShoes', 'Provogue', 999, 15, 0, '', ' 9', 'Brown', '<li>Testing</li>', '<li>Testing</li>', '<li>Testing</li>', 14, 'y', ''),
(46, 'Redmi-3S-Prime.jpeg', 'Redmi-3S-Prime.jpeg', 'Redmi-3S-Prime.jpeg', 'Redmi Note 4', 'Electronics', 'Mobiles', 'MI', 15000, 5, 0, '', '5.5 Inch', 'Others', '<li>4 gb ram\r</li><li> 128 gb expandable memory</li>', '<li>4 gb ram\r</li><li> 128 gb expandable memory</li>', '<li>4 gb ram\r</li><li> 128 gb expandable memory</li>', 1, 'y', 'U1'),
(51, 'dell-inspiron-notebook-original-imaegtgwehxsp99zâ‚¹81,000_e6e75.jpeg', 'dell-inspiron-notebook-original-imaemuxyywb4csa3â‚¹1,17,390_52888.jpeg', 'hp-notebook-original-imaequg4wzdutwra_8665f.jpeg', 'Hp', 'Electronics', 'Laptops', 'Hp', 50000, 10, 0, '', '14.5 Inch', 'Black', '<li>Tetsttsttst</li>', '<li>etttststksla\r</li><li>adam;dm</li>', '<li>sakdnsd\r</li><li>asn;d</li>', 5, 'y', 'U1'),
(54, 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsfepzhsungt_c9b2f.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff2czfvf7r_d5ab3.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff7bqnsgm9 price 16900_2d7e0.jpeg', 'Samsung J9', 'Electronics', 'Laptops', 'Hp', 5000, 5, 0, '', '5.5 inch', 'Pink', '<li>teSt</li>', '<li>teSt</li>', '<li>teSt</li>', 0, 'y', 'U1'),
(55, 'hp-notebook-original-imaequgyqvnrzccd  price-30990_57897.jpeg', 'hp-notebook-original-imaequg4xst8z2s3_e1eee.jpeg', 'hp-notebook-original-imaequgyqvnrzccd  price-30990_ab962.jpeg', 'Te123', 'Electronics', 'Laptops', 'Hp', 500, 5, 0, '', '5 inch', 'White', '<li>test</li>', '<li>testtt</li>', '<li>testttt</li>', 0, 'n', 'U1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_seller_payment` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_email` varchar(250) NOT NULL,
  `payment_details` text NOT NULL,
  `orderid_details` text NOT NULL,
  `last_payment` datetime NOT NULL,
  `status` enum('p','c') NOT NULL DEFAULT 'p' COMMENT 'p=pending,c=completed',
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_seller_payment`
--

INSERT INTO `tbl_seller_payment` (`sp_id`, `seller_email`, `payment_details`, `orderid_details`, `last_payment`, `status`) VALUES
(1, 'jayparmar271@gmail.com', '{"email":"jayparmar271@gmail.com","total":15000,"result":[{"productname":"Redmi Note 4","price":225,"qty":"1"}],"custom":"done"}', '{"result":[{"orderid":"195"}]}', '2017-05-23 16:58:00', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_details`
--

CREATE TABLE IF NOT EXISTS `tbl_shipping_details` (
  `id` double NOT NULL AUTO_INCREMENT,
  `u_id` double NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `area` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_shipping_details`
--

INSERT INTO `tbl_shipping_details` (`id`, `u_id`, `username`, `email`, `addressline1`, `addressline2`, `area`, `city`, `pincode`, `state`, `country`, `mobilenumber`) VALUES
(1, 4, 'kushalpatadia', 'kushal@gmail.com', '1/6 Ami Appartment', 'Nr. Naranpura Telephone Exchange', 'Naranpura', 'Ahmedabad', 380063, 'Gujrat', 'India', 7600779534),
(2, 4, 'jay', 'jay@gmail.com', 'A-105 Aditya Appartment', 'New C.G Road', 'Chandkheda', 'Ahmedabad', 382424, 'Gujrat', 'India', 7445458212),
(3, 7, 'Brijesh', 'b1@gmail.com', 'ncrypted', 'sola road', 'Sola', 'Ahmedabad', 380013, 'Gujrat', 'India', 7845120215),
(4, 8, 'Android', 'android@gmail.com', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 0, 'assdasd', 'asdasd', 9850066650),
(5, 10, 'KATTO', 'katto.kp@gmail.com', 'B-66, Katto Banglow', 'Katta Gali', 'Don', 'Ahmedabad', 991105, 'Gujrat', 'India', 7878282945),
(6, 10, 'Tipendra', 'tipendratapu@gmail.com', 'Gokuldham society', 'Nr. Power Gali', 'Thane', 'Mumbai', 766150, 'Maharastra', 'India', 8810324578),
(7, 13, 'Javed', 'javedmansuri128@gmail.com', 'A-105 Aditya Appartment', 'New C.G Road', 'Chandkheda', 'Ahmedabad', 382424, 'Gujrat', 'India', 7600779545),
(8, 1, 'Jay', 'jay@gmail.com', 'A-105,Aditya Appartment', 'New C.G Road', 'Chandkheda', 'Ahmedabad', 382424, 'Gujarat', 'India', 8941475685),
(9, 16, 'Brihe', 'baaaaa@gmail.com', '1', '2', '3', '4', 5, '6', '7', 9873216540),
(10, 20, 'Kishan', 'kishan@gmail.com', 'Test', 'Test', 'Test', 'Ahmedabad', 382000, 'Gujarat', 'India', 7464636446),
(14, 0, 'j', 'jay@gmail.com', '2', '2', '2', '2', 2, '2', '2', 2222222222);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE IF NOT EXISTS `tbl_site` (
  `s_id` double NOT NULL AUTO_INCREMENT,
  `site_name` varchar(25) NOT NULL,
  `site_tagline` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `fb_link` varchar(100) NOT NULL,
  `pinterest_link` varchar(100) NOT NULL,
  `linkedin_link` varchar(100) NOT NULL,
  `behance_link` varchar(100) NOT NULL,
  `youtube_link` varchar(100) NOT NULL,
  `vimeo_link` varchar(100) NOT NULL,
  `map` text NOT NULL,
  `contact_address` varchar(250) NOT NULL,
  `contact_officeno` varchar(25) NOT NULL,
  `contact_mob` varchar(25) NOT NULL,
  `contact_mail1` varchar(50) NOT NULL,
  `contact_mail2` varchar(50) NOT NULL,
  `site_copyrights` varchar(50) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`s_id`, `site_name`, `site_tagline`, `email`, `phoneno`, `fb_link`, `pinterest_link`, `linkedin_link`, `behance_link`, `youtube_link`, `vimeo_link`, `map`, `contact_address`, `contact_officeno`, `contact_mob`, `contact_mail1`, `contact_mail2`, `site_copyrights`) VALUES
(1, 'Market Hub', 'Youngistan''s First Choice', 'info@ncrypted.com', '079-40397001', 'https://www.facebook.com/ncryptedtechnologies/', 'https://www.ncrypted.net/pinterest-clone', 'https://www.linkedin.com/company/ncrypted-technologies', 'https://www.behance.net/', 'https://www.youtube.com/channel/UCVFm7I5BU9yojamjRA0l-GA', 'https://vimeo.com/channels/ncryptedtechnologies', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14681.330223857065!2d72.5235874!3d23.084919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x70ba63ac3c15564e!2sNCrypted+Technologies+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1486041650026', 'B-704, Shapath Hexa, Opposite Gujarat High Court, Sola Road, S G Highway, Ahmedabad, 380060', '079-40397001', '+91 281 3918880', 'info@ncrypted.com', 'job@ncrypted.com', '2017 Market Hub . All rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` double NOT NULL AUTO_INCREMENT,
  `imageName` text NOT NULL,
  `title` varchar(20) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `isUpDown` enum('u','d') NOT NULL DEFAULT 'd' COMMENT 'u=up,d=down',
  `description` text NOT NULL,
  `isActive` enum('a','d') NOT NULL DEFAULT 'd' COMMENT 'a=active,d=deactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `imageName`, `title`, `discount`, `isUpDown`, `description`, `isActive`) VALUES
(1, 'b1.png', 'my first ', '-30%', 'u', 'test123', 'd'),
(2, 'b2.png', 'my second', '-25%', 'u', 'test', 'd'),
(3, 'b3.png', '', '-32%', 'u', '', 'd'),
(4, 't1.png', '', 'FLAT', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(5, 't2.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(6, 't3.png', '', 'FLAT 35% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(7, 't4.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(8, 'cvarwwwclientsclient1web2tmpphp40mc2E.png', 'Sony-USB-Pen-Drive', '5%', 'u', '', 'a'),
(9, 'cvarwwwclientsclient1web2tmpphp9SZYg6.jpg', 'helicopter', '10%', 'u', '', 'a'),
(10, 'cvarwwwclientsclient1web2tmpphpCBXkbT.jpg', 'watches', '15%', 'u', '', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_static_pages`
--

CREATE TABLE IF NOT EXISTS `tbl_static_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(25) NOT NULL,
  `page_link` varchar(250) NOT NULL,
  `page_content` text NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'd' COMMENT 'a=active,d=disactive',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_static_pages`
--

INSERT INTO `tbl_static_pages` (`page_id`, `page_title`, `page_link`, `page_content`, `status`) VALUES
(2, 'neww123', 'http://localhost/markethub/modules-nct/staticpages-nct/?page=link123', '<p>helloooowwww123</p>\r\n', 'd'),
(3, 'testtt', 'http://localhost/markethub/modules-nct/staticpages-nct/?page=newwwwww', '<p><br />\r\ntestttt</p>\r\n', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_todo_list`
--

CREATE TABLE IF NOT EXISTS `tbl_todo_list` (
  `td_id` double NOT NULL AUTO_INCREMENT,
  `u_id` double NOT NULL,
  `message` varchar(35) NOT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tbl_todo_list`
--

INSERT INTO `tbl_todo_list` (`td_id`, `u_id`, `message`) VALUES
(1, 2, 'Add Kids Products Before 6 pm'),
(2, 2, 'OK..bye'),
(3, 2, 'OK..bye'),
(4, 2, 'Hello'),
(5, 2, 'hii'),
(6, 1, 'hello'),
(7, 2, 'Good evening..'),
(8, 1, 'hey android avyo k nai???'),
(9, 5, 'hello boys'),
(10, 1, 'hey taru id nathi rah jo'),
(11, 5, 'ok'),
(12, 5, 'thx jay'),
(13, 2, 'Bye..'),
(14, 5, 'android is best'),
(15, 5, 'android is best'),
(16, 1, 'su maja avi k nai???'),
(17, 5, 'android is best'),
(18, 5, 'thodo problem 6e'),
(19, 1, 'without PHP you are nothing'),
(20, 2, 'Bye..'),
(21, 1, 'without PHP you are nothing'),
(22, 1, 'without PHP you are nothing'),
(23, 5, '.'),
(24, 5, 'ok kushal'),
(25, 2, 'Type 15 words only..'),
(26, 1, 'k'),
(27, 5, 'where is jaylo'),
(28, 2, 'aa rahyo'),
(29, 5, '.'),
(30, 2, 'aa rahyo'),
(31, 1, ':)~~~~`'),
(32, 2, ':-)'),
(33, 5, 'ok ok good work both of you'),
(34, 2, 'ty'),
(35, 1, 'k bye see you'),
(36, 1, 'tata'),
(37, 2, 'bye..timesheet mokli dau'),
(38, 5, '5 star(*****)'),
(39, 2, 'bye..timesheet mokli dau'),
(40, 5, 'ha fast'),
(41, 2, 'bye..timesheet mokli dau'),
(42, 5, 'hiii'),
(43, 2, 'Hello...How r u Guyz?'),
(45, 2, 'Good Afternoon..'),
(46, 2, 'hiii'),
(47, 1, 'be band kar'),
(49, 1, 'hmmmmmmm'),
(50, 1, ':)~~~~`'),
(51, 2, 'haha'),
(52, 1, 'yaaaaa hoooooooooooo'),
(53, 1, 'chahe koi muje jangali kahe'),
(54, 1, 'sdsdd'),
(55, 2, 'hello'),
(56, 2, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `c_id` double NOT NULL AUTO_INCREMENT,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `fk_register_users_tbl_cart` (`u_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`),
  KEY `p_id_3` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`c_id`, `p_id`, `u_id`) VALUES
(3, 41, 4),
(4, 0, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
