-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 05:30 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `watch1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `countno`()
    NO SQL
BEGIN
SELECT order_date,count(*) as count from orders group by order_date;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Titan'),
(2, 'Fasttrack'),
(3, 'Sonata'),
(4, 'Casio'),
(5, 'Luba'),
(6, 'Vision'),
(7, 'Royals'),
(8, 'Timex'),
(9, 'Helix'),
(10, 'Ajanta'),
(11, 'RoyalsCart'),
(12, 'Orpat'),
(13, 'Seiko');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`) VALUES
(7, 10),
(8, 11),
(9, 12),
(10, 13),
(11, 14),
(12, 15),
(13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `cart_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `quantity`) VALUES
(7, 5, 3),
(7, 14, 2),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_copy`
--

CREATE TABLE IF NOT EXISTS `cart_details_copy` (
  `order_id` int(4) NOT NULL,
  `cart_id` int(4) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details_copy`
--

INSERT INTO `cart_details_copy` (`order_id`, `cart_id`, `product_id`, `quantity`) VALUES
(0, 8, '5', 2),
(0, 8, '14', 2),
(0, 8, '5', 2),
(0, 8, '14', 2),
(0, 8, '5', 2),
(0, 8, '14', 2),
(0, 7, '12', 1),
(0, 8, '4', 4),
(0, 8, '12', 1),
(0, 8, '4', 2),
(0, 8, '4', 2),
(0, 8, '4', 1),
(0, 8, '19', 1),
(0, 8, '12', 3),
(0, 8, '39', 4),
(0, 10, '12', 2),
(0, 10, '12', 2),
(0, 11, '9', 3),
(0, 11, '12', 1),
(0, 13, '4', 3),
(0, 8, '4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `catagory_id` int(4) NOT NULL,
  `catagory_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`) VALUES
(1, 'Wrist Watches'),
(2, 'Alarm Clocks'),
(3, 'Wall Clocks');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `name`, `Comment`) VALUES
(3, 'mullaraisa2@gmail.com', 'Raisa Mulla', 'Hii Hello\r\nProduct is too Good');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(4) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` decimal(10,0) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email_id`, `password`, `mobile_no`, `name`) VALUES
(10, 'r@gmail.com', '25d55ad283aa400af464c76d713c07ad', '8308329833', 'Raisa Mulla'),
(11, 'raisa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '7865431290', 'raisa'),
(12, 'gun1@gmail.com', '25d55ad283aa400af464c76d713c07ad', '7770564739', 'Gunjan Manore'),
(13, 'mullaraisa2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '8308329833', 'Raisa Mulla'),
(14, 'girasesanikas2611@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Sanika Girase'),
(15, 'gunjanmanore26@gmail.com', '9e0e7a7a70dbd48fcf42478c082c5e52', '7058774892', 'Gunjan Manore'),
(16, 'ra@gmail.com', 'ff45d45955b2d0a77e75613ff1c41b43', '8308329833', 'Raisa');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `order_id` int(4) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`order_id`, `status`) VALUES
(16, 1),
(17, 1),
(18, 1),
(19, 0),
(20, 0),
(21, 0),
(30, 0),
(31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `description_id` int(4) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `display_type` varchar(255) NOT NULL,
  `dial_shape` varchar(255) NOT NULL,
  `warrenty` int(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`description_id`, `colour`, `material`, `display_type`, `dial_shape`, `warrenty`, `image`) VALUES
(2, 'Silver ', 'Stainless Steel ', 'Analog', 'Round', 12, '1632SM03.png'),
(3, 'Black', 'Stainless Steel ', 'Analog ', 'Rectangular ', 12, 'NE9469NM01J.jpeg'),
(4, 'Black', 'Fibre ', 'Digital ', 'Round', 12, 'NG7982PP02J.jpeg'),
(5, 'Silver ', 'Stainless Steel ', 'Analog', 'Round', 12, 'ND1013SM01.jpeg'),
(6, 'Black', 'Leather ', 'Analog', 'Round', 12, '3099SL02.jpeg'),
(7, 'Silver', 'Stainless Steel ', 'Analog ', 'Round ', 12, '3084SM01.jpeg'),
(8, 'Black ', 'Resin ', 'Digital ', 'Round ', 12, 'GA-100-1A4DR.jpeg'),
(9, 'Black', 'Resin ', 'Digital ', 'Round ', 12, 'EF-130D-1A2VDF.jpeg\r\n'),
(10, 'Silver', 'Stainless Steel ', 'Analog', ' Round ', 12, 'NE2480SM02.jpeg'),
(12, 'Black', 'Leather ', 'Analog ', 'Round ', 12, 'NF8976YL03J.jpeg'),
(13, 'Silver', 'Stainless Steel ', 'Analog ', 'Rectangular ', 12, 'NF8080SM01.jpeg'),
(14, 'Black', 'Resin ', 'Digital ', 'Round ', 12, 'BA-120SP-1ADR.jpeg'),
(15, 'Golden', 'Stainless Steel ', 'Analog ', 'Round ', 12, '3034PG-9AUDR.jpeg'),
(16, 'Silver ', 'Stainless Steel ', 'Analog', 'Rectangular ', 12, 'NE9151SM02A.jpeg\r\n'),
(17, 'Silver', 'Stainless Steel ', 'Analog ', 'Round', 12, 'NE2298SM02.jpeg'),
(18, 'Silver', 'Stainless Steel', 'Analog', 'Round', 12, '11.jpg'),
(19, 'Pink', 'Silicone', 'Analog', 'Round', 12, '22.jpg'),
(20, 'Green', 'Stainless Steel', 'Analog', 'Round', 12, '33.jpg'),
(21, 'Silver', 'Brass', 'Analog', 'Round', 12, '44.jpg'),
(22, 'Black', 'Metal', 'Anlaog', 'Round', 12, '55.jpg'),
(23, 'Black', 'Rubber', 'Analog', 'Round', 12, '66.jpg'),
(24, 'Silver', 'Stainless Steel', 'Analog', 'Round', 12, '77.jpg'),
(25, 'Beige', 'Leather', 'Analog', 'Asymmetrical', 12, '88.jpg'),
(26, 'Red', 'Leather', 'Anlaog', 'Triangular', 12, '99.jpg'),
(27, 'Pink and Blue', 'Patent Leather ', 'Analog', 'Round', 12, 'COMB1.jpg'),
(28, 'Pink', 'Patent Leather ', 'Analog', 'Round', 12, '41bnNS0F-TL._UX425_.jpg'),
(29, 'Red', 'Plastic', 'Digital', 'Round', 4, '41tNWhRHLDL.jpg'),
(30, 'Black', 'Steel', 'Digital', 'Round', 6, 'rg386.jpg'),
(31, 'Pink', 'Stainless Steel', 'Analog', 'Round', 6, '81fR91yocdL._UL1500_.jpg'),
(32, 'Black', 'Silicone', 'Digital ', 'Round', 6, 'VVTBLACKLED11.jpg'),
(33, 'Red', 'Mineral', 'Digital ', 'Round ', 6, 'C3026PP01.jpg'),
(34, 'Black', 'Acrylic', 'Analog', 'Round', 6, '87017PP01J.jpg'),
(35, 'Pink', 'Resin ', 'Analog', 'Round', 6, 'T79081.jpg'),
(36, 'Black', 'Stainless Steel', 'Analog', 'Round', 6, '71LXTMN-1rL._UL1500_(Timex).jpg'),
(37, 'Pink', 'Resin', 'Analog', 'Round', 6, '4006PP02.jpg'),
(38, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(39, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(40, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(41, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(42, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(43, 'white', 'jjfjf', 'analogue', 'square', 5, 'HELLO - WIN_20170211_004752.JPG'),
(44, 'black', 'dscds', 'analogue', 'circle', 23, 'WIN_20170712_03_18_20_Pro.jpg'),
(45, 'Ivory', 'Plastic', 'Analog', 'Round', 6, 'W2.jpeg'),
(46, 'White', 'Plastic', 'Analog', 'Round', 6, 'W1.jpeg'),
(47, 'Ivory', 'Plastic', 'Analog', 'Round', 6, 'W3.jpeg'),
(48, 'Cream', 'Plastic', 'Analog', 'Rectangle', 6, 'w4.jpeg'),
(49, ' Silver', 'Plastic', 'Analog', 'Square', 6, 'W5.jpeg'),
(50, 'Black', 'Plastic', 'Analog', 'Round', 6, 'W6.jpeg'),
(51, 'Black', 'Stainless Steel', 'Analog', 'Round', 12, 'R1.jpeg'),
(52, 'White', 'Wooden', 'Analog', 'Round', 12, 'R2.jpeg'),
(53, 'Metallic', 'Wood', 'Analog', 'Round', 12, 'R3.jpeg'),
(54, 'Golden', 'Metal', 'Analog', 'Round', 12, 'R4.jpeg'),
(55, 'Black', 'Wooden', 'Analog', 'Round', 12, 'R5.jpeg'),
(56, 'White ', 'Glass', 'Analog', 'Square', 6, 'O1.jpeg'),
(57, 'Black', 'Glass', 'Analog', 'Square', 6, 'O2.jpeg'),
(58, 'White and Pink', 'Glass', 'Analog', 'Triangular', 6, 'O3.jpeg'),
(59, 'Black', 'Glass', 'Analog', 'Square', 6, 'O4.jpeg'),
(60, 'Black', 'Glass', 'Analog', 'Oval', 6, 'O5.jpeg'),
(61, 'White', 'Plastic', 'Analog', 'Round', 6, 'B2.jpeg'),
(62, 'Black', 'Plastic', 'Analog', 'Round', 6, 'B3.jpeg'),
(63, 'White', 'Plastic', 'Analog', 'Square', 6, 'B4.jpeg'),
(64, 'Black', 'Plastic', 'Digital', 'Square', 6, 'B1.jpeg'),
(65, 'Black', 'PLastic', 'Digital', 'Round', 6, 'D1.jpeg'),
(66, 'Grey', 'Stainless Steel', 'Digital', 'Rectangular', 6, 'D2.jpeg'),
(67, 'Grey', 'Stainless-Steel', 'Digital', 'Rectangular', 6, 'D3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(4) NOT NULL,
  `cart_id` int(4) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `total_quantity` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` decimal(10,0) NOT NULL,
  `pincode` decimal(6,0) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `order_date`, `delivery_date`, `total_price`, `total_quantity`, `name`, `mobile_no`, `pincode`, `flat`, `landmark`, `city`, `state`) VALUES
(16, 8, '2017-10-10', '2017-10-15', '3000.00', 3, 'raisa', '7865431290', '378638', 'kjdshfj', 'jjkfdk', 'kfkjhk', 'kfkfj'),
(17, 8, '2017-10-10', '2017-10-15', '2200.00', 4, 'raisa', '7865431290', '999999', 'fkjfk', 'kkfkdkf', 'kflfkl', 'djks'),
(18, 10, '2017-10-10', '2017-10-15', '2000.00', 2, 'Raisa Mulla', '8308329833', '415509', 'Sahydri Complex Falt-9', 'Near Reliance Fresh', 'Pune', 'Maharashtra'),
(19, 10, '2017-10-10', '2017-10-15', '2000.00', 2, 'Raisa Mulla', '8308329833', '415509', 'Sahydri Complex Falt-9', 'Reliance Fresh', 'Satara', 'Maharashtra'),
(20, 11, '2017-10-11', '2017-10-16', '4000.00', 4, 'Sanika Girase', '1234567890', '415509', 'Hundai', 'gsga', 'dkjs', 'dnk'),
(21, 11, '2017-10-11', '2017-10-16', '0.00', 0, 'Sanika Girase', '1234567890', '216', '666', 'n', 'uu', 'jkljkl'),
(22, 11, '2017-10-11', '2017-10-16', '0.00', 0, 'Sanika Girase', '1234567890', '415509', 'hhwj', ',sm,', 'lksajljk', 'dms'),
(30, 13, '2017-10-11', '2017-10-16', '5595.00', 3, 'Raisa', '8308329833', '748', 'fdn', 'dm,', 'ksfk', 'mmsfkj'),
(31, 8, '2017-10-11', '2017-10-16', '3730.00', 2, 'raisa', '7865431290', '415509', 'ghd', 'ry', 'utiui', 'kerktjh');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `t1` AFTER INSERT ON `orders`
 FOR EACH ROW BEGIN
insert into cart_details_copy(order_id,cart_id,product_id,quantity) SELECT orders.order_id,cart_details.cart_id,product_id,quantity from cart_details NATURAL JOIN orders WHERE cart_id=new.cart_id and orders.order_id=new.order_id;
delete from cart_details where cart_id=new.cart_id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(4) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `subcatagory_id` int(4) NOT NULL,
  `brand_id` int(4) NOT NULL,
  `brand_cost` decimal(10,2) NOT NULL,
  `store_cost` decimal(10,2) NOT NULL,
  `quantity` int(4) NOT NULL,
  `supplier_id` int(4) NOT NULL,
  `description_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `model_no`, `product_name`, `subcatagory_id`, `brand_id`, `brand_cost`, `store_cost`, `quantity`, `supplier_id`, `description_id`) VALUES
(4, '1632SM03', 'Blue Dial Men''s Watch ', 1, 1, '2100.00', '1865.00', 5, 1, 2),
(5, 'NE9469NM01J ', 'Titan Purple Analog Black Dial Men''s Watch ', 1, 1, '2300.00', '2100.00', 5, 1, 3),
(6, 'NG7982PP02J', 'Sonata Super Fibre Digital Grey Dial Men''s Watch ', 1, 3, '1500.00', '1256.00', 5, 3, 4),
(7, 'ND1013SM01 ', 'Sonata Analog White Dial Men''s Watch ', 1, 3, '1780.00', '1560.00', 5, 3, 5),
(8, '3099SL02 ', 'Fastrack Economy 2013 Analog Black Dial Men''s Watch', 1, 2, '2500.00', '2300.00', 5, 2, 6),
(9, '3084SM01', 'Fastrack Analog Silver Dial Men''s Watch ', 1, 2, '2800.00', '2758.00', 5, 2, 7),
(10, 'GA-100-1A4DR ', 'G-Shock Analog-Digital Black Dial Men''s Watch ', 1, 4, '1800.00', '1560.00', 5, 4, 8),
(11, 'EF-130D-1A2VDF ', 'Casio Edifice Analog Black Dial Men''s Watch ', 1, 4, '3000.00', '2800.00', 5, 4, 9),
(12, 'NE2480SM02', 'Titan Youth Analog Black Dial Women''s Watch ', 2, 1, '2300.00', '2100.00', 5, 1, 10),
(13, 'NE9151SM02A', 'Titan Karishma Analog Black Dial Men''s Watch ', 2, 1, '2564.00', '2400.00', 5, 1, 16),
(14, 'NE2298SM02', 'Fastrack Upgrade-Core Analog White Dial Women''s Watch ', 2, 2, '2600.00', '2569.00', 5, 2, 17),
(16, 'NF8976YL03J', 'Sonata Analog Black Dial Women''s Watch ', 2, 2, '1350.00', '1100.00', 5, 2, 12),
(17, 'NF8080SM01', 'Sonata SFAL Analog Silver Dial Women''s Watch ', 2, 3, '1500.00', '1380.00', 5, 3, 13),
(19, 'NE2298SM02', 'Fastrack Upgrade-Core Analog White Dial Women''s Watch', 2, 2, '1645.00', '1499.00', 5, 2, 18),
(20, 'NE9827PP07J', 'Fastrack Beach Upgrades Analog White Dial Women''s Watch ', 2, 2, '1295.00', '1100.00', 7, 2, 19),
(21, '6078SM01', 'Fastrack Analog Green Dial Women''s Watch', 2, 2, '2495.00', '2199.00', 6, 2, 20),
(22, '6024SM01', 'Fastrack Analog Black Dial Women''s Watch', 2, 2, '2995.00', '2749.00', 7, 2, 21),
(23, '6093SM01', 'Fastrack Fits & Forms Analog Black Dial Women''s Watch', 2, 2, '1995.00', '1865.00', 7, 2, 22),
(24, 'NE9827PP02J', 'Fastrack Beach Analog Black Dial Women''s Watch ', 2, 2, '1795.00', '1667.00', 5, 2, 23),
(25, '6117SM01', 'Fastrack Analog Black Dial Women''s Watc', 2, 2, '3095.00', '2661.00', 5, 2, 24),
(27, 'NE9732QL01J', 'Fastrack New OTS Analog Multi-Color Dial Women''s Watch', 2, 2, '2395.00', '2095.00', 5, 2, 25),
(28, '6095SL03', 'Fastrack Fits & Forms Analog Black Dial Women''s Watch ', 2, 2, '2195.00', '1949.00', 6, 2, 26),
(29, 'COMB1', 'Luba kiddish attractive kids Analog Watch for Boys and Girls Combo Pack Of 2 ', 3, 5, '600.00', '450.00', 5, 5, 27),
(30, 'kid586 ', 'Luba Kiddish Attractive Kids Analog Pink Dial Barbie Watch for Girls ', 3, 5, '499.00', '229.00', 10, 5, 28),
(31, '3Y-V59R-AZ5K', 'Spider Man Projector Watch', 3, 5, '296.00', '200.00', 10, 5, 29),
(32, 'rg386 ', 'Crude Digital Black Dial Watch', 3, 6, '499.00', '284.00', 10, 6, 30),
(33, '8828-3-1 ', 'Vizion Analog Pink Dial (SNOWBELL-The Fluffy Kitty ) Cartoon Character Watch', 3, 6, '995.00', '575.00', 10, 6, 31),
(34, 'Vvtblackled11 ', 'Royals Digital Black Dial Kid''s Watch ', 3, 7, '250.00', '200.00', 10, 7, 32),
(35, 'C3026PP01 ', 'Titan Zoop Digital Grey Dial Children''s Watch ', 3, 1, '879.00', '850.00', 10, 1, 33),
(36, '87017PP01J ', 'Sonata Analog Black Dial Girl''s Watch ', 3, 3, '749.00', '599.00', 10, 3, 34),
(37, 'T79081 ', 'Timex Easy Reader Watch', 3, 8, '789.00', '650.00', 10, 8, 35),
(38, 'TI022HG0300 ', 'Helix X Watch Analog Black Dial Boys Watch', 3, 9, '1200.00', '986.00', 10, 9, 36),
(39, '4006PP02 ', 'Zoop Analog White Dial Kid''s Watch ', 3, 1, '600.00', '550.00', 10, 1, 37),
(45, '411Ivory', 'Ajanta fancy analog wall clock ', 7, 10, '450.00', '400.00', 5, 10, 45),
(46, '456Quartz', 'Ajanta Quartz Round Plastic Wall Clock ', 7, 10, '499.00', '450.00', 5, 10, 46),
(47, 'AQ1937', 'Ajanta Oreva Quartz Golden Ring Plastic Wall Clock', 7, 10, '375.00', '340.00', 5, 10, 47),
(48, '317', 'Ajanta Quartz Fancy Wall Clock Square Shape', 7, 10, '475.00', '430.00', 5, 10, 48),
(49, '677 dx silver', 'Ajanta Quartz Square Wall Clock', 7, 10, '399.00', '365.00', 6, 10, 49),
(50, '1857 DX', 'Ajanta Fancy Sweep Second Clock ', 7, 10, '699.00', '675.00', 6, 10, 50),
(51, 'KTWC47B8', 'RoyalsCart Double Sided Railway Station/Platform Analog Wall Clock', 8, 11, '4796.00', '1135.00', 5, 11, 51),
(52, 'KTWC345', 'RoyalsCart Handcrafted Wooden Analog Wall Clock', 8, 11, '7596.00', '6922.00', 6, 11, 52),
(53, 'KTWC222', 'RoyalsCart Golden Metal Analog Wall Clock', 8, 11, '7596.00', '2099.00', 5, 11, 53),
(54, 'KTWC13', 'RoyalsCart Metal Peacock Analog Wall Clock', 8, 11, '4796.00', '1094.00', 8, 11, 54),
(55, 'KTWC246', 'RoyalsCart Pendulum Vintage Analog Wall Clock', 8, 11, '3996.00', '1249.00', 12, 11, 55),
(56, 'TBB-157', 'Orpat Beep Alarm Clock ', 6, 12, '220.00', '200.00', 10, 12, 56),
(57, 'TBB-127', 'Orpat Beep Alarm Clock', 6, 12, '290.00', '250.00', 10, 12, 57),
(58, 'TBB-337', 'Orpat Beep Alarm Clock ', 6, 12, '300.00', '265.00', 10, 12, 58),
(59, 'TBB-357', 'Orpat Beep Alarm Clock ', 6, 12, '295.00', '265.00', 10, 12, 59),
(60, 'TBSZL-877', 'Orpat Musical Alarm Clock ', 6, 12, '700.00', '585.00', 10, 12, 60),
(61, 'BNC012WHWH ', 'Braun Classic Alarm Quartz Alarm Clock', 6, 12, '315.00', '295.00', 6, 12, 61),
(62, 'BNC012BKBK', 'Braun Classic Alarm Quartz Alarm Clock', 6, 12, '315.00', '295.00', 6, 12, 62),
(63, 'BNC011WHWH', 'Braun  Classic Alarm Quartz Alarm Clock', 6, 12, '330.00', '265.00', 6, 12, 63),
(64, 'BNC009WH-RC ', 'Braun Digital Quartz Alarm Clock', 5, 13, '425.00', '395.00', 10, 13, 64),
(65, 'QHE114KLH', 'Seiko Bedside Alarm Japanese Quartz Clock', 5, 13, '500.00', '465.00', 6, 13, 65),
(66, 'QHR015SLH', 'Seiko Advanced Technology Bedside Alarm ', 5, 13, '400.00', '355.00', 6, 13, 66),
(67, 'QHR024SLH', 'Seiko Classic Digital Travel Clock', 5, 13, '700.00', '550.00', 10, 13, 67),
(68, 'TBB-127', 'Orpat Beep Alarm Clock', 6, 12, '290.00', '250.00', 10, 12, 57),
(69, 'BNC012WHWH ', 'Braun Classic Alarm Quartz Alarm Clock', 6, 12, '315.00', '295.00', 6, 12, 61);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock`
--
CREATE TABLE IF NOT EXISTS `stock` (
`product_name` varchar(255)
,`model_no` varchar(255)
,`quantity` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `subcatagory`
--

CREATE TABLE IF NOT EXISTS `subcatagory` (
  `subcatagory_id` int(4) NOT NULL,
  `catagory_id` int(4) NOT NULL,
  `subcatagory_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcatagory`
--

INSERT INTO `subcatagory` (`subcatagory_id`, `catagory_id`, `subcatagory_name`) VALUES
(1, 1, 'Men''s'),
(2, 1, 'Women''s'),
(3, 1, 'Children''s'),
(4, 1, 'Couple Watches'),
(5, 2, 'Digital'),
(6, 2, 'Analog'),
(7, 3, 'Modern'),
(8, 3, 'Contemporary');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `contact_no` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(4) NOT NULL,
  `brand_id` int(4) DEFAULT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'Nasik'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contact_no`, `quantity`, `total_price`, `brand_id`, `address`) VALUES
(1, 'Raman sharma', '8087331946', 25, 30000, 1, 'Nasik'),
(2, 'Arjun malhotra', '9923132891', 30, 35000, 2, 'Pune'),
(3, 'Siddharth Malhotra', '9273204803', 25, 20000, 3, 'mumbai'),
(4, 'Salman Khan', '8308329833', 30, 50000, 4, 'pune'),
(5, 'Salman Habib', '8409875647', 25, 25000, 5, 'Nagar'),
(6, 'Kunal Manore', '8888887777', 20, 20000, 6, 'Mumbai'),
(7, 'Amit Kulkarni', '9908765434', 25, 25000, 7, 'jalgoan'),
(8, 'Mahesh Rajguru', '7789654321', 25, 25000, 8, 'jalgoan'),
(9, 'Naman Roy', '9456231832', 25, 25000, 9, 'Nasik'),
(10, 'Nirmal Patil', '9684344648', 20, 15000, 10, 'Nasik'),
(11, 'Durgesh Thakor', '8523697412', 50, 60000, 11, 'Nasik'),
(12, 'Aditya Wani', '7542626461', 50, 60000, 12, 'Nasik'),
(13, 'Sharan Sinha', '8563214854', 50, 70000, 13, 'Nasik');

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `supplier_trig` BEFORE INSERT ON `supplier`
 FOR EACH ROW INSERT INTO trigger_table VALUES(NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_backup`
--

CREATE TABLE IF NOT EXISTS `supplier_backup` (
  `supplier_name` varchar(20) NOT NULL,
  `contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `supplier_backup`
--
DELIMITER $$
CREATE TRIGGER `supp_backup` BEFORE DELETE ON `supplier_backup`
 FOR EACH ROW INSERT into supplier_backup VALUES (OLD.supplier_name,OLD.contact_no)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trigger_table`
--

CREATE TABLE IF NOT EXISTS `trigger_table` (
  `exec_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `stock`
--
DROP TABLE IF EXISTS `stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock` AS select `product`.`product_name` AS `product_name`,`product`.`model_no` AS `model_no`,`product`.`quantity` AS `quantity` from `product`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`,`product_id`), ADD KEY `product_id` (`product_id`), ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`), ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`description_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`), ADD KEY `cart_id` (`cart_id`), ADD KEY `cart_id_2` (`cart_id`), ADD KEY `cart_id_3` (`cart_id`), ADD KEY `cart_id1` (`cart_id`), ADD KEY `cart_id_4` (`cart_id`), ADD KEY `cart_id_5` (`cart_id`), ADD KEY `cart_id_6` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`,`model_no`), ADD KEY `catagory_id` (`subcatagory_id`,`supplier_id`,`description_id`), ADD KEY `catagory_id_2` (`subcatagory_id`), ADD KEY `description_id` (`description_id`), ADD KEY `supplier_id` (`supplier_id`), ADD KEY `catagory_id_3` (`subcatagory_id`), ADD KEY `subcatagory_id` (`subcatagory_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `brand_id_2` (`brand_id`), ADD KEY `description_id_2` (`description_id`), ADD KEY `supplier_id_2` (`supplier_id`);

--
-- Indexes for table `subcatagory`
--
ALTER TABLE `subcatagory`
  ADD PRIMARY KEY (`subcatagory_id`), ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `brand_id_2` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `description_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `subcatagory`
--
ALTER TABLE `subcatagory`
  MODIFY `subcatagory_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
ADD CONSTRAINT `Foregin key` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`description_id`) REFERENCES `description` (`description_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`subcatagory_id`) REFERENCES `subcatagory` (`subcatagory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subcatagory`
--
ALTER TABLE `subcatagory`
ADD CONSTRAINT `subcatagory_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
