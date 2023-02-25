-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 01:40 PM
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
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`u_id`, `username`, `email`, `password`, `mobileno`, `created_date`, `last_logintime`, `last_updatetime`, `ipaddress`) VALUES
(48, 'Jay', 'punit@d.com', 'ccd3e079cefdc9bac5f90f78cd4060b8', 987456321, '2017-02-07 18:19:27', '2017-02-09 18:48:01', '2017-02-10 10:36:45', '127.0.0.1'),
(49, 'Jay', 'abc@abc.com', '0897e8c038b94f32d9f104a1ab8f682e', 987456321, '2017-02-09 14:27:56', '2017-02-10 15:05:14', '2017-02-10 10:36:45', '127.0.0.1'),
(50, 'Jay', 'kushalpatadia@gmail.com', '3f14db6cb54d44256ba011281235b8a2', 987456321, '2017-02-09 18:58:30', '2017-02-09 18:58:43', '2017-02-10 10:36:45', '127.0.0.1'),
(51, 'Jay', 'jay@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 987456321, '2017-02-10 10:25:16', '2017-02-10 10:31:08', '2017-02-10 10:36:45', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `c_id` double NOT NULL AUTO_INCREMENT,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `u_id` (`u_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`c_id`, `p_id`, `u_id`) VALUES
(1, 1, 49),
(2, 2, 49),
(3, 3, 49),
(4, 5, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_us` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `replayMessage` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `firstName`, `subject`, `email`, `message`, `replayMessage`, `createdDate`, `ipAddress`) VALUES
(1, 'Kushal', 'test', 'abc.abc@gmail.com', 'te=st', '', '2017-02-06 18:34:07', '127.0.0.1'),
(2, 'Jay', 'Yes    Yahooooooo', 'jay@gmail.com', 'message sucees fully sendddddddddddd\r\n', '', '2017-02-06 18:38:07', '127.0.0.1'),
(3, 'Jay', 'Yes    Yahooooooo', 'jay@gmail.com', 'message sucees fully sendddddddddddd\r\n', '', '2017-02-06 18:45:10', '127.0.0.1'),
(4, 'Jay', 'test', 'jay@gmail.com', 'test', '', '2017-02-07 10:19:48', '127.0.0.1'),
(5, 'Jay', 'test', 'jay@gmail.com', 'test', '', '2017-02-07 10:23:46', '127.0.0.1'),
(6, 'Jay', 'test', 'jay@gmail.com', 'test', '', '2017-02-07 10:38:03', '127.0.0.1'),
(7, 'test', 'test', 'test', 'test', '', '2017-02-07 17:25:09', '127.0.0.1'),
(8, 'Kushal', 'test', 'kushalpatadia@gmail.com', 'sadsd', '', '2017-02-07 17:41:17', '127.0.0.1');

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
  `price` int(11) NOT NULL,
  `qty_available` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviews` varchar(250) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(25) NOT NULL,
  `shortDescription` tinytext NOT NULL,
  `specification` text NOT NULL,
  `additionalinfo` text NOT NULL,
  `pcheck` enum('y','n') NOT NULL DEFAULT 'n' COMMENT 'y=popular;n=new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `imageName`, `image2`, `image3`, `title`, `price`, `qty_available`, `rating`, `reviews`, `size`, `color`, `shortDescription`, `specification`, `additionalinfo`, `pcheck`) VALUES
(1, 'g9.jpg', 'g10.jpg', 'g11.jpg', 'Baby Red Dress', 500, 50, 5, 'this is best product', 'full L -S -XL', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'n'),
(2, 'g10.jpg', 'g10.jpg', '', 'Crocs Sandals', 50, 0, 0, '', '', '', 'testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'n'),
(3, 'g11.jpg', '', '', 'Pink Sip Cup', 150, 0, 0, '', '', '', 'testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'n'),
(4, 'g12.jpg', '', '', 'Child Print Bike', 3020, 0, 0, '', '', '', 'testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'n'),
(5, 'g1.jpg', '', '', 'Baby Girl''s Dress', 100, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(6, 'g2.jpg', '', '', 'Pokemon Onesies', 79, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(7, 'g3.jpg', '', '', 'Doctor Play Set', 30, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(8, 'g4.jpg', '', '', 'Cap & Gloves Set', 15, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(9, 'g5.jpg', '', '', 'Full Sleeves Romper', 60, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(10, 'g6.jpg', '', '', 'Party Wear Frock', 80, 0, 0, '', '', '', 'this is testing', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(11, 'g7.jpg', '', '', 'Bear Diaper Bag', 110, 0, 0, '', '', '', 'test', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(12, 'g8.jpg', '', '', 'Battery Police Bike', 300, 0, 0, '', '', '', 'test', '<table border=''1''><tr><th>first heading</th><th>second headiang</th></tr><tr><td>a</td><td>b</td></tr></table>', 'add info:this is testing', 'y'),
(13, 'mi-mzb4239in-original-imae3z7uqh9gpypz.jpeg', '', '', 'mi-mzb', 10000, 1, 0, '', '5 inch', 'silver', 'This is mi product', 'best proceesor', 'extra wifi', ''),
(14, '81mKtZOvUmL._SL1500_.jpg', '81mKtZOvUmL._SL1500_.jpg', '81mKtZOvUmL._SL1500_.jpg', 'samsung mobile', 9999, 2, 0, '', '5 inch', 'silver', 'smasung phone', 'testing', 'testing', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_site_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `constant` varchar(50) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `required` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `value` mediumtext NOT NULL,
  `hint` varchar(100) DEFAULT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `label`, `type`, `constant`, `class`, `required`, `value`, `hint`, `updated_date`) VALUES
(1, 'Site name', 'textBox', 'SITE_NM', 'logintextbox-bg', 1, 'Market Hub', NULL, '2014-05-07 12:13:16'),
(2, 'Admin Email', 'textbox', 'ADMIN_EMAIL', 'logintextbox-bg', 1, 'ashish.joshi@ncrypted.com', NULL, '2014-05-08 12:05:20'),
(3, 'Site Logo', 'filebox', 'SITE_LOGO', 'logintextbox-bg', 0, 'b98a3f8178d7d91b6050fc3c1cb8fc33.png', NULL, '2014-05-08 00:00:00'),
(10, 'Email From Name', 'textbox', 'FROM_NM', 'logintextbox-bg', 1, 'Nlance - Admin', NULL, '0000-00-00 00:00:00'),
(11, 'From Email', 'textbox', 'FROM_EMAIL', 'logintextbox-bg', 1, 'no-reply@ncryptedprojects.com', NULL, '0000-00-00 00:00:00'),
(18, 'Site Favicon', 'filebox', 'SITE_FAVICON', 'logintextbox-bg', 0, '5586e5ad35ffb16e14654caaaf9bbcae.ico', NULL, '0000-00-00 00:00:00'),
(19, 'Facebook Link', 'textbox', 'FB_LINK', 'logintextbox-bg', 1, 'http://www.facebook.com', NULL, '2015-09-03 15:37:05'),
(20, 'Twitter Link', 'textbox', 'TWIITER_LINK', 'logintextbox-bg', 1, 'http://www.twitter.com', NULL, '2015-09-03 15:37:58'),
(22, 'Google Plus', 'textbox', 'GPLUS_LINK', 'logintextbox-bg', 1, 'http://www.google.com', NULL, '2015-09-03 15:39:32'),
(23, 'Linkedin', 'textbox', 'LINKEDIN_LINK', 'logintextbox-bg', 1, 'https://in.linkedin.com/', NULL, '2015-09-03 15:39:32'),
(24, 'Paypal Email', 'textBox', 'PAYPAL_EMAIL', 'logintextbox-bg', 1, 'ashish.joshi@ncrypted.com', NULL, '0000-00-00 00:00:00'),
(25, 'Paypal Url', 'textBox', 'PAYPAL_URL', 'logintextbox-bg', 1, 'https://www.sandbox.paypal.com/cgi-bin/webscr', NULL, '0000-00-00 00:00:00'),
(28, 'SMTP Host', 'textbox', 'SMTP_HOST', 'logintextbox-bg', 1, 'mail.ncryptedprojects.com', NULL, '2016-07-08 04:00:00'),
(29, 'SMTP Port', 'textbox', 'SMTP_PORT', 'logintextbox-bg', 1, '587', NULL, '0000-00-00 00:00:00'),
(30, 'SMTP Username', 'textbox', 'SMTP_USERNAME', 'logintextbox-bg', 1, 'no-reply@ncryptedprojects.com', NULL, '0000-00-00 00:00:00'),
(31, 'SMTP Password', 'password', 'SMTP_PASSWORD', 'logintextbox-bg', 1, '3}z&@V1z48][', NULL, '0000-00-00 00:00:00'),
(32, 'FB App ID', 'textBox', 'FB_APP_ID', 'logintextbox-bg', 1, '275031756192845', NULL, '0000-00-00 00:00:00'),
(33, 'FB App Secret ID', 'textBox', 'FB_APP_SEC', 'logintextbox-bg', 1, 'a19722dbf54d13f449ac8b5a6f7335fc', NULL, '0000-00-00 00:00:00'),
(34, 'Google Client Id', 'textBox', 'GOOGLE_APP_ID', 'logintextbox-bg', 1, '348138986203-6jdnoej66o1evpdqsf1irjshg6e4e1mk.apps.googleusercontent.com', NULL, '0000-00-00 00:00:00'),
(35, 'Google Client Secret', 'textBox', 'GOOGLE_APP_SEC', 'logintextbox-bg', 1, 'XCANyoSPIy_wM9Vtc4UTC6fr', NULL, '0000-00-00 00:00:00'),
(36, 'Featured Project Price Per Day', 'textBox', 'FEATURED_PROJ_PRICE', 'logintextbox-bg', 1, '25', NULL, '2016-12-08 20:27:50'),
(37, 'Admin Commission Per Project', 'textBox', 'ADMIN_COMMISSION', 'logintextbox-bg', 1, '10', NULL, '2016-12-08 20:27:58'),
(38, 'Escrow Commission Per Milestone', 'textBox', 'ESCROW_COMMISSION', 'logintextbox-bg', 1, '5', NULL, '2016-12-08 20:27:58'),
(39, 'Wallet Balance Per Credit', 'textBox', 'UNIT_CREDIT_BALANCE', 'logintextbox-bg', 1, '20', NULL, '2017-01-09 15:44:46'),
(40, 'Credits Per Unique Bid', 'textBox', 'CREDITS_PER_BID', 'logintextbox-bg', 1, '10', NULL, '2017-01-12 23:05:23');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `imageName`, `title`, `discount`, `isUpDown`, `description`) VALUES
(1, 'b1.png', '', '-30%', 'u', ''),
(2, 'b2.png', '', '-25%', 'u', ''),
(3, 'b3.png', '', '-32%', 'u', ''),
(4, 't1.png', '', 'UPTO 30% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.'),
(5, 't2.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.'),
(6, 't3.png', '', 'FLAT 35% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.'),
(7, 't4.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'facebook', '1876915889259487', 'Jay', 'Parmar', 'jayparmar2711@gmail.com', 'male', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c8.0.50.50/p50x50/10402822_1432282640389483_3823423676287652961_n.jpg?oh=15d1e9f8f1ad4ffb69cecb8c0bebab06&oe=58FE341D', 'https://www.facebook.com/app_scoped_user_id/1876915889259487/', '2017-02-01 08:03:45', '2017-02-02 07:40:30'),
(2, 'google', '106323481452784256222', 'Jay', 'Parmar', 'jayparmar271@gmail.com', '', 'en', 'https://lh5.googleusercontent.com/-iSaAz_XGSgE/AAAAAAAAAAI/AAAAAAAABKo/iK1LWWvsoEY/photo.jpg', 'https://plus.google.com/106323481452784256222', '2017-02-01 08:20:10', '2017-02-02 06:30:37'),
(3, 'facebook', '691041297727005', 'Jay', 'Parmar', 'jayparmar271@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c8.0.50.50/p50x50/12122913_485953974902406_1560288419512109464_n.jpg?oh=26f5412beff88f018445a79bd1da0ef7&oe=590D597F', 'https://www.facebook.com/app_scoped_user_id/691041297727005/', '2017-02-01 08:30:47', '2017-02-01 08:30:47'),
(4, 'google', '117930195195908012366', 'katto', 'kp', 'katto.kp@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-02-02 06:18:25', '2017-02-02 07:04:42'),
(5, 'google', '113446160424964872327', 'Hacker', 'Hate', 'hackerhate55@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/113446160424964872327', '2017-02-02 06:22:14', '2017-02-02 06:23:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `register_users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
