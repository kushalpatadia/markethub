-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2017 at 02:22 PM
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
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_logintime` datetime NOT NULL,
  `last_updatetime` datetime NOT NULL,
  `ipaddress` varchar(25) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `status` enum('a','d') DEFAULT 'a' COMMENT 'a=active,d=deactive',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`u_id`, `username`, `email`, `password`, `mobileno`, `created_date`, `last_logintime`, `last_updatetime`, `ipaddress`, `oauth_provider`, `oauth_uid`, `status`) VALUES
(1, 'jay parmar', 'jay@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 9741458745, '2017-02-20 17:41:35', '2017-03-02 18:11:07', '2017-03-01 18:41:46', '192.168.1.4', '', '', 'a'),
(2, 'Javed', 'javedmansuri136@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 9988774455, '2017-03-02 12:54:04', '2017-03-02 12:58:29', '0000-00-00 00:00:00', '192.168.1.133', '', '', 'a'),
(3, 'Punit', 'p@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 1234567890, '2017-03-02 18:23:55', '2017-03-02 18:24:13', '0000-00-00 00:00:00', '192.168.1.4', '', '', 'a'),
(4, 'kushal', 'kushal@gmail.com', 'd338ab0e48864e762820ec4ef6cd4811', 7600779534, '2017-03-03 14:48:08', '2017-03-04 18:22:11', '0000-00-00 00:00:00', '192.168.1.124', '', '', 'a');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `status`, `priority`) VALUES
(1, 'kushal', 'admin123', 'a', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `c_id` double NOT NULL AUTO_INCREMENT,
  `p_id` double NOT NULL,
  `u_id` double NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`),
  KEY `fk_register_users_tbl_cart` (`u_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`),
  KEY `p_id_3` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_us` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(64) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `replayMessage` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `firstName`, `subject`, `email`, `message`, `replayMessage`, `createdDate`, `ipAddress`) VALUES
(1, 'fdh', 'dfg', 'fdg', 'dfg', '', '2017-03-04 17:11:31', '192.168.1.124');

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
  `status` enum('v','b','d','c') NOT NULL DEFAULT 'v' COMMENT 'v=view,b=purchased,d=deliverd,c=cancle',
  `purchase_date` datetime NOT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `imageName`, `image2`, `image3`, `title`, `category`, `subcategory`, `brand`, `price`, `qty_available`, `rating`, `reviews`, `size`, `color`, `shortDescription`, `specification`, `additionalinfo`) VALUES
(1, 'mi-redmi-3s-prime-na-original-imaeh6beckzjqeza.jpeg', 'mi-redmi-3s-prime-na-original-imaeh6beysanfhyr.jpeg', 'mi-redmi-3s-prime-na-original-imaeh7y7e968kajk.jpeg', 'Redmi 3S Prime (Gold, 32 GB)', 'Electronics', 'Mobiles', 'MI', 8999, 0, 0, '', '5 inch', 'Gold', '    3 GB RAM | 32 GB ROM | Expandable Upto 128 GB\r\n    5 inch HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    4100 mAh Li-Ion Polymer Battery\r\n    Qualcomm Snapdragon 430 64-bit Processor', 'testing', 'sss'),
(2, 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9vnxnvzhd  price-7850.jpeg', 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9jxuzuxbh.jpeg', 'samsung-galaxy-j2-dual-sim-black-j200g-original-imaebfn9f49xzwve.jpeg', 'SAMSUNG Galaxy J2 (Black, 8 GB)', 'Electronics', 'Mobiles', 'Samsung', 7850, 150, 0, '', '4.7 inch', 'Black', 'SAMSUNG Galaxy J2 - 2016 Smartphone | Key Features include Android Marshmallow 6, Quad Core Processor, mAh\r\n', '<ul>\n<li>Sales Package: Handset, Battery, Travel Adapter, Stereo Headset</li>\n<li>Model Number:SM-J200GZKDINS/SM-J200GZKHINS</li>\n<li>Model Name: Galaxy J2</li>\n<li>Color :Black</li>\n<li>Browse Type:Smartphones</li>\n<li>SIM Type:Dual Sim</li>\n<li>Hybrid Sim Slot:No</li>\n<li>Touchscreen:Yes</li>\n<li>OTG Compatible:No</li>\n</ul>\n', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(3, 'mi-mi-4i-mzb4430in-original-imaebagndxhhvnyk.jpeg', 'mi-mi-4i-mzb4430in-original-imaebagzafwdh6mh.jpeg', 'mi-mi-4i-mzb4430in-original-imaebagzvzcagadg.jpeg', 'Mi 4i (Blue, 16 GB)', 'Electronics', 'Mobiles', 'MI', 11999, 25, 0, '', '5 inch', 'Blue', 'To achieve flagship status, a phone must have more than a 1080p resolution. Instead, the Mi 4i comes with a 12.7 cm (5) Sharp / JDI display, with up to 95% of colors from the NTSC palette. It is also powered by an octa-core Qualcomm Snapdragon 615 process', '    2 GB RAM | 16 GB ROM |\r\n    5 inch Full HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    3030 mAh Li-ion Polymer Battery\r\n    2nd-gen Snapdragon 615 64-bit octa-core Processor', 'Powered by a 64-bit, 2nd Gen Qualcomm Snapdragon 615 octa-core processor, the Mi 4i is not only the leader for quality smartphones, but also the benchmark for extreme performance. It has 4 performance cores clocking at 1.7 GHz and 4 power-saving cores at 1.1 GHz to ensure quicker multitasking between applications.\r\n'),
(4, 'samsung-galaxy-on7-sm-g600f-original-imaecqkgzeuz9ebn price-7490.jpeg', 'samsung-galaxy-on5-sm-g550fzddins-original-imaecjy92yrm4mfr.jpeg', 'samsung-galaxy-on5-sm-g550fzddins-original-imaecjy9jkpzuxvn.jpeg', 'SAMSUNG Galaxy On5(White, 8 GB)', 'Electronics', 'Mobiles', 'Samsung', 7490, 11, 0, '', '5 Inch', 'White', '    1.5 GB RAM | 8 GB ROM | Expandable Upto 128 GB\r\n    5 inch HD Display\r\n    8MP Primary Camera | 5MP Front\r\n    2600 mAh Li-Ion Battery\r\n    Exynos 3475 Processor', '<ul>\r\n<li>Sales Package:    Handset, Stereo Headset, Travel Adaptor, Data Cable, Product User Guide, Battery</li>\r\n<li>Model Number:    SM-G550FZKDINS/SM-G550FZDDINS</li>\r\n<li>Model Name:    Galaxy On5</li>\r\n<li>Color:    Gold</li>\r\n<li>Browse Type:Smartphones</li>\r\n<li>SIM Type:Dual Sim</li>\r\n<li>Hybrid Sim Slot:	No</li>\r\n<li>Touchscreen:	Yes</li>\r\n<li>OTG Compatible:	 Yes</li>\r\n<li>Sound Enhancements:   Integrated Hands-free Speakers, Noise Cancellation</li>\r\n</ul>', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(5, 'mi-5-na-original-imaejfhg2fjszfs5.jpeg', 'mi-5-na-original-imaejfhggbuhdtmz.jpeg', 'mi-5-na-original-imaejfhghhxnrgyj.jpeg', 'Mi 5 (White, 32 GB)', 'Electronics', 'Mobiles', 'MI', 22999, 10, 0, '', '5.15 inch', 'white', 'Featuring a sharp profile and a lightweight body and powered by the Snapdragon 820 processor, the MI 5 is perfect for your fast lifestyle. Now you can game even faster with the Adreno 530 graphics processor.\r\n If you are on a lookout for an insanely fast ', '       3 GB RAM | 32 GB ROM |\r\n    5.15 inch Full HD Display\r\n    16MP Primary Camera | 4MP Front\r\n    3000 mAh Li-Ion Polymer Battery\r\n    Snapdragon 820 Kryo Processor', 'test'),
(6, 'micromax-canvas-6-e485-na-original-imaeghswtheyvry7.jpeg', 'micromax-canvas-6-e485-na-original-imaeghswwjrswkzb.jpeg', 'micromax-canvas-6-e485-na-original-imaegnwqcfhbdsm9â‚¹9,499.jpeg', 'Micromax Canvas 6 (Champagne, 32 GB)', 'Electronics', 'Mobiles', 'Micromax', 9499, 100, 0, '', '5.5 inch', 'Champagne', ' With a slim metal body, the Micromax Canvas 6 has a stylish look. Designed with a fingerprint scanner, the phone helps you keep all your personal data secure. If you are someone who needs to multitask, this phone comes with an octa core processor to let ', '    3 GB RAM | 32 GB ROM | Expandable Upto 128 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 8MP Front\r\n    3000 mAh Li-Polymer Battery\r\n    MT6753 Processor', 'test'),
(7, 'dell-inspiron-15-notebook-original-imaemgzbjaepeuwe.jpeg', 'dell-inspiron-15-notebook-original-imaemgnwq6zhhbrdâ‚¹26,990.jpeg', 'dell-inspiron-15-notebook-original-imaeg7gngszhszj6â‚¹26,990.jpeg', 'Dell Inspiron Core i3 5th Gen', 'Electronics', 'Laptops', 'Dell', 26490, 63, 0, '', '15.6 inch Display', 'Black', '    Sales Package\r\n        Laptop, Battery, Power Adaptor, User Guide and Warranty Document\r\n    Model Number\r\n        3558\r\n    Part Number\r\n        Z565155HIN9/Z565155UIN9\r\n    Model Name\r\n        Inspiron 15\r\n    Series\r\n        Inspiron\r\n    Color\r\n  ', '    Intel Core i3 Processor ( 5th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Linux/Ubuntu Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'test'),
(8, 'mi-redmi-note-3-na-original-imaegcryhxs4vteu.jpeg', 'mi-redmi-note-3-na-original-imaegcrftpz4hahj.jpeg', 'mi-redmi-note-3-na-original-imaegcrfahfzsvgp.jpeg', 'Redmi Note 3 (Dark Grey, 16 GB)', 'Electronics', 'Mobiles', 'MI', 9999, 5, 0, '', '5.5 inch', 'Dark Grey', ' The Redmi 3 mobile phone is designed for millennials. Its high-speed performance lets you switch between apps without any fuss, supports fluid movements so your online gaming experience is enhanced, and supports fingerprint sensor so your sense of privac', '    2 GB RAM | 16 GB ROM | Expandable Upto 32 GB\r\n    5.5 inch Full HD Display\r\n    16MP Primary Camera | 5MP Front\r\n    4050 mAh Li-Polymer Battery Battery\r\n    Qualcomm Snapdragon 650 64-bit Processor', 'test'),
(9, 'kaka.jpg', 'bg_img.jpg', 'wallpaper.jpg', 'Redmi Note 4 (Pink, 128 GB)  (With 10 GB RAM)', 'Electronics', 'Mobiles', 'MI', 1, 21, 0, '', '5.5 inch', 'white', 'Upgrade to the Redmi Note 4 and experience power like never before. The Redmi Note 4 offers high-speed performance along with a long battery life. ', '    10 GB RAM | 128 GB ROM | Expandable Upto 256 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    9100 mAh Li-Polymer Battery\r\n    Qualcomm Snapdragon 625 64-bit Processor', 'Switching between apps or launching apps wonâ€™t take forever with the Redmi Note 4, thanks to the octa-core Snapdragon 625 processor. To add more power to you, the Redmi Note 4 is 20% more power efficient than the Redmi Note 3.'),
(10, 'micromax-canvas-6-pro-e484-original-imaeg59pf9q8ypv4.jpeg', 'micromax-canvas-6-pro-e484-original-imaeg59pnjzddkb4â‚¹10,440.jpeg', 'micromax-canvas-6-pro-e484-original-imaeg64jh8npf87eâ‚¹10,440.jpeg', 'Micromax Canvas 6 Pro (Black, 16 GB)', 'Electronics', 'Mobiles', 'Micromax', 10440, 12, 0, '', '5.5 inch', 'Black', ' The Micromax Canvas 6 Pro is powered by a 2.0GHz Helio x10 Octa Core processor to let you enjoy a smooth and fast performance. If you are the kind that enjoys action packed games, this phone gives you an immersive experience. With a 4GB RAM, this phone l', '    4 GB RAM | 16 GB ROM | Expandable Upto 64 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    3000 mAh Li-Polymer Battery\r\n    MT6795M Processor', '1 Year Manufacturer Warranty'),
(11, 'micromax-canvas-knight-2-canvas-knight-2-e471-original-imaepz9t8jyngjez.jpeg', 'micromax-canvas-knight-2-canvas-knight-2-e471-original-imaeppnmsv7fc6uzâ‚¹7,499.jpeg', 'micromax-canvas-knight-2-canvas-knight-2-e471-original-imaepphwzz2hkbpuâ‚¹7,499.jpeg', 'Micromax Canvas Knight 2 (White & Silver, 16 GB)', 'Electronics', 'Mobiles', 'Micromax', 7499, 50, 0, '', '5 inch', 'White & Silver', 'The Micromax Canvas Knight 2 is your source of entertainment and style. Carry this Android smartphone with you wherever you go and kick boredom out in style. ', '    2 GB RAM | 16 GB ROM | Expandable Upto 32 GB\r\n    5 inch HD Display\r\n    13MP Primary Camera | 5MP Front\r\n    2280 mAh Battery', '1 Year Manufacturer Warranty'),
(12, 'hp-notebook-original-imaem34tdkryayb6  price-25490.jpeg', 'hp-notebook-original-imaem34tyzqvpmgu.jpeg', 'hp-notebook-original-imaem34tjbebgruz.jpeg', 'HP APU Quad Core A8', 'Electronics', 'Laptops', 'HP', 25490, 7, 0, '', '15.6 inch Display', 'Black', '    AMD APU Quad Core A8 Processor ( 6th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Windows 10 Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(13, 'hp-notebook-original-imaemw4tq9v2pfwy.jpeg', 'hp-notebook-original-imaem34tvsgbvzf8.jpeg', 'hp-notebook-original-imaem34tjbebgruz.jpeg', 'HP APU Quad Core E2', 'Electronics', 'Laptops', 'HP', 20980, 4, 0, '', '15.6 inch Display', 'Black', '     AMD APU Quad Core E2 Processor ( 6th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit DOS Operating System\r\n    500 GB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(14, 'hp-notebook-original-imaeprzxabum9r6j.jpeg', 'hp-notebook-original-imaeprzvja5wszz2  price-30990.jpeg', 'hp-notebook-original-imaeprzr3zkjng64.jpeg', 'HP Core i3 5th Gen  X5Q18PA#ACJ 15-BE006TU Noteboo', 'Electronics', 'Laptops', 'HP', 29990, 6, 0, '', '15.6 inch Display', 'Black', '    Intel Core i3 Processor ( 5th Gen )\r\n    4 GB DDR3 RAM\r\n    64 bit Windows 10 Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(15, 'hp-notebook-original-imaequgyqvnrzccd  price-30990.jpeg', 'hp-notebook-original-imaequg4wzdutwra.jpeg', 'hp-notebook-original-imaequg4tdwsphzs.jpeg', 'HP Core i3 6th Gen  1DF78PA#ACJ BE015TU Notebook  ', 'Electronics', 'Laptops', 'HP', 30990, 10, 0, '', '15.6 inch Display', 'Black', '    Intel Core i3 Processor ( 6th Gen )\r\n    8 GB DDR4 RAM\r\n    DOS Operating System\r\n    1 TB HDD\r\n    15.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(16, 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektngxhuvzhek.jpeg', 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektnhhyzffxg2 price-5189.jpeg', 'samsung-galaxy-j1-ace-sm-j110hzwdins-original-imaektnhhyzffxg2 price-5189.jpeg', 'SAMSUNG Galaxy J1 Ace (White, 4 GB)', 'Electronics', 'Mobiles', 'Samsung', 5190, 6, 0, '', '4.3 Inch', 'White', '    512 MB RAM | 4 GB ROM | Expandable Upto 128 GB\r\n    4.3 inch WVGA Display\r\n    5MP Primary Camera | 2MP Front\r\n    1800 mAh Li-Ion Battery', '<li>Sales Package:    Handset, Stereo Headset, Charger, Product User Guide, Battery</li>\r\n<li>Model Number:    SM-J110HZWDINS</li>\r\n<li>Model Name:Galaxy J1 Ace</li>\r\n<li>Color:White</li>\r\n<li>Browse Type:Smartphones</li>\r\n<li>SIM Type:Dual Sim</li>\r\n<li>Hybrid Sim Slot:No</li>\r\n<li>Touchscreen:Yes</li>\r\n<li>Additional Content:microSD</li>\r\n</ul>', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(17, 'hp-pavilion-notebook-original-imaemqnah4yv8vy6  price 15490.jpeg', 'hp-pavilion-notebook-original-imaemqnauauzsm88.jpeg', 'hp-pavilion-original-imaeg59gydguax9b.jpeg', 'HP Pavilion Celeron Dual Core-W0H99PA 11-S003TU', 'Electronics', 'Laptops', 'HP', 15490, 12, 0, '', '15.6 inch Display', 'Black', '    Intel Celeron Dual Core Processor \r\n    2 GB DDR3 RAM\r\n    DOS Operating System\r\n    500 GB HDD\r\n    11.6 inch Display', 'Testing', '1 Year Onsite Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(18, 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff7bqnsgm9 price 16900.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsff2czfvf7r.jpeg', 'samsung-galaxy-j7-prime-sm-g610fzddins-original-imaemsfepzhsungt.jpeg', 'SAMSUNG Galaxy J7 Prime (Black, 16 GB)', 'Electronics', 'Mobiles', 'Samsung', 16900, -11, 0, '', '5.5 Inch', 'Black', '    3 GB RAM | 16 GB ROM | Expandable Upto 256 GB\r\n    5.5 inch Full HD Display\r\n    13MP Primary Camera | 8MP Front\r\n    3300 mAh Battery\r\n    Exynos 7870 Processor', '<ul>\r\n<li>Sales Package:Handset, Charger, Data Cable, Earphone, Ejector Pin</li>\r\n<li>Model Number:SM-G610FZDDINS</li>\r\n<li>Model Name: Galaxy J7 Prime</li>\r\n<li>Color :Black</li>\r\n<li>Browse Type:Smartphones</li>\r\n<li>SIM Type:Dual Sim</li>\r\n<li>Hybrid Sim Slot:No</li>\r\n<li>Touchscreen:Yes</li>\r\n<li>OTG Compatible:Yes</li>\r\n</ul>', '1 Year Manufacturer Warranty\r\n10 Days Replacement Policy\r\nCash on Delivery available'),
(19, 'black-orange-ai110-aero-8-original-imaemvf3ra5xrkhj.jpeg', 'black-orange-ai110-aero-9-original-imaehg2tqqerfhna.jpeg', 'black-orange-ai110-aero-9-original-imaehg2tsxcrbkbh.jpeg', 'Aero Power Play Running Shoes  (Black, Orange)', 'Men', 'Sport Shoes', 'Aeropower', 474, 12, 0, '', '6', 'Black, Orange', 'Testing', 'Testing', 'Testing'),
(20, 'blue-ai110-aero-7-original-imaeavxdkzagp2s3.jpeg', 'blue-ai110-aero-7-original-imaeavxdw5frbjcz.jpeg', 'blue-ai110-aero-7-original-imaeavxdhypzb2hy.jpeg', 'Aero Power Play Running Shoes  (Blue)', 'Men', 'Sport Shoes', 'Aeropower', 464, 10, 0, '', '9', 'Blue', 'Testing', 'Testing', 'Testing'),
(21, 'bruton-4g-1-10-bruton-multi-color-original-imaequka7cgceznc.jpeg', 'bruton-4g-1-10-bruton-multi-color-original-imaequk9x7jweysz.jpeg', 'aircum-4g-1-8-aircum-multi-color-original-imaequkbuwsqtsrz.jpeg', 'BRUTON 4G-1 Running Shoes  (Black, Blue)', 'Men', 'Sport Shoes', 'BRUTON', 389, 4, 0, '', '9', 'Blue', 'Testing', 'Testing', 'Testing'),
(22, 'black-821933-bata-9-original-imaez2hqxsfebbzn.jpeg', 'black-821933-bata-9-original-imaez2hqsczeergh.jpeg', 'black-821933-bata-9-original-imaez2hqdgmeafbm.jpeg', 'Bata SANATH Lace Up Shoes', 'Men', 'Formal Shoes', 'Bata', 768, 11, 0, '', '9', 'Black', 'Testing', 'Testing', 'Testing'),
(23, 'black-k-914-kraasa-6-original-imaemwjkmrkzbzrb.jpeg', 'black-k-914-kraasa-7-original-imaeax7v6uvq5yww.jpeg', 'black-k-914-kraasa-9-original-imaeax7v2nkvyys2.jpeg', 'Kraasa High Ankle Lace Up Shoes  (Black)', 'Men', 'Formal Shoes', 'Kraasa', 799, 2, 0, '', ' 7 , 8 , 9', 'Black', 'Testing', 'Testing', 'Testing'),
(24, 'brown-supf00001-mr-cl-8-original-imaeppvzayzzw5hx.jpeg', 'brown-supf00001-mr-cl-8-original-imaeppu5btnhpzrt.jpeg', 'brown-supf00001-mr-cl-8-original-imaeppvzayzzw5hx.jpeg', 'Provogue Lace up shoes  (Brown)', 'Men', 'Formal Shoes', 'Provogue', 999, 999, 0, '', ' 7 , 9 , 10', 'Brown', 'Testing', 'Testing', 'Testing');

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
  `country` varchar(25) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_shipping_details`
--

INSERT INTO `tbl_shipping_details` (`id`, `u_id`, `username`, `email`, `addressline1`, `addressline2`, `area`, `city`, `pincode`, `country`, `mobilenumber`) VALUES
(2, 4, 'kushal', 'kushal@gmail.com', '1/6 Ami Appartment', 'Nr. Naranpura Telephone Exchange', 'Naranpura', 'Ahmedabad', 380063, 'India', 7600779534);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `imageName`, `title`, `discount`, `isUpDown`, `description`, `isActive`) VALUES
(1, 'b1.png', 'my first ', '-30%""', 'u', 'test123', 'a'),
(2, 'b2.png', 'my second', '-25%"', 'u', 'test', 'a'),
(3, 'b3.png', '', '-32%', 'u', '', 'a'),
(4, 't1.png', '', 'FLAT', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(5, 't2.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(6, 't3.png', '', 'FLAT 35% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a'),
(7, 't4.png', '', 'FLAT 25% OFF', 'd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.', 'a');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(3, 'facebook', '691041297727005', 'Jay', 'Parmar', 'jayparmar271@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c8.0.50.50/p50x50/12122913_485953974902406_1560288419512109464_n.jpg?oh=26f5412beff88f018445a79bd1da0ef7&oe=590D597F', 'https://www.facebook.com/app_scoped_user_id/691041297727005/', '2017-02-01 08:30:47', '2017-02-01 08:30:47'),
(4, 'google', '117930195195908012366', 'katto', 'kp', 'katto.kp@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-02-02 06:18:25', '2017-02-02 07:04:42'),
(5, 'google', '113446160424964872327', 'Hacker', 'Hate', 'hackerhate55@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/113446160424964872327', '2017-02-02 06:22:14', '2017-02-02 06:23:04'),
(6, 'facebook', '1876915889259487', 'Jay', 'Parmar', 'jayparmar2711@gmail.com', 'male', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c50.0.300.300/10402822_1432282640389483_3823423676287652961_n.jpg?oh=91413ceb1a138469c058f8ea734364d6&oe=59310665', 'https://www.facebook.com/app_scoped_user_id/1876915889259487/', '2017-02-20 12:43:40', '2017-02-20 17:14:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `fk_register_users_tbl_cart` FOREIGN KEY (`u_id`) REFERENCES `register_users` (`u_id`),
  ADD CONSTRAINT `fk_tbl_products_tbl_cart` FOREIGN KEY (`p_id`) REFERENCES `tbl_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
