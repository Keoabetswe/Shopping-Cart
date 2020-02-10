-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2018 at 08:49 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `CustomerNum` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `PhoneNum` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`CustomerNum`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerNum`, `Name`, `Surname`, `PhoneNum`, `Email`, `Address`) VALUES
(1, 'Simon', 'Ford', 113111587, 'Ford@gmail.com', '123 Rose Street Lynwood\r'),
(2, 'Clay', 'Swanson', 733920667, 'cSwan@gmail.com', '14 Curch Street Atterbury\r'),
(3, 'Mercedes', 'Rice', 485588788, 'rice@gmail.com', '23 Jordan Street Hatfield\r'),
(4, 'John', 'Hill', 948967044, 'jHIll@gmail.com', '24 Kobe Street Lynwood\r'),
(5, 'Paul', 'Berry', 804492866, 'berry@gmail.com', '54 Jefferson Avenue Faerie Glen\r'),
(6, 'Abraham', 'Griffith', 193954378, 'griff@gmail.com', '70 Andover street Lynwood\r'),
(7, 'Damon', 'Fleming', 245030822, 'damonF@gmail.com', '543 Market street Hatfield\r'),
(8, 'Ivan', 'Klein', 221115523, 'klein@gmail.com', '43 Roberts street Faerie Glen\r'),
(9, 'Bernadette', 'King', 996907643, 'king@yahoo.com', '94 Willow street Centurion\r'),
(10, 'Leslie', 'Garner', 341802414, 'garner@yahoo.com', '66 Maple street Midrand\r'),
(11, 'Spencer', 'Mills', 525099088, 'mill@hotmail.com', '41 Monroe Pretoria North\r'),
(12, 'Jessie', 'Edwards', 513516449, 'edwards@gmail.com', '10 West Lynwood Glen\r'),
(13, 'Sylvester', 'Collins', 708767701, 'collins@gmail.com', '12 Parkstreet Arcadia\r'),
(14, 'Rufus', 'Williamson', 828077124, 'rufus@yahoo.com', '91 Eagle street Midrand\r'),
(15, 'Shelley', 'Barnes', 985554657, 'barnes@gmail.com', '126 Spruce street Centurion\r'),
(16, 'Becky', 'Willis', 794929942, 'becky@gmail.com', '321 Water street Hatfield\r'),
(17, 'Lorenzo', 'Abbott', 211747493, 'enzo@gmail.com', '5378 Adams Pretoria East\r'),
(18, 'Willie', 'Mason', 871923269, 'mason@hotmail.com', '74 Homestead Drive Waterkloof\r'),
(19, 'Robin', 'Murphy', 614830861, 'robinM@gmail.com', '87 Kirnkney street Amandasig\r'),
(20, 'Anthony', 'Marshall', 566325552, 'marshall@gmail.com', '803 South street Karenpark\r'),
(21, 'Nick', 'Newton', 274315665, 'newtonNick@gmail.com', '316 Lame street Orchards\r'),
(22, 'Ida', 'Poole', 394974035, 'poole@gmail.com', '619 Rey street Chantelle\r'),
(23, 'Ellen', 'Spencer', 961310029, 'spencer@gmail.com', '316 Austin street Theresapark\r'),
(24, 'Eunice', 'Holt', 107444565, 'holt@gmail.com', '419 Square street Gezina\r'),
(25, 'Cristina', 'Blair', 553557585, 'blair@gmail.com', '710 Queen street Riviera\r'),
(26, 'Martin', 'Barrett', 434769541, 'martin@yahoo.com', '910 Ville street Silverton\r'),
(27, 'Isabel', 'Jimenez', 267289192, 'isabel@gmail.com', '215 Wavery Hatfield\r'),
(28, 'Benny', 'Gonzales', 873648244, 'benny@gmail.com', '300 Spartan street Menlyn\r'),
(29, 'Shelly', 'Jennings', 298206490, 'shelly@gmail.com', '765 Walt street Wonderboom\r'),
(30, 'Brenda', 'Day', 404226405, 'day@gmail.com', '3428 Weaver street Montana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  `CostPrice` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SellPrice` decimal(10,2) NOT NULL,
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`ItemID`, `Description`, `CostPrice`, `Quantity`, `SellPrice`, `Image`) VALUES
(1, 'Nokia 3310', '500.00', 10, '899.00', '1.jpg\r'),
(2, 'Huawei P10', '3000.00', 5, '3999.00', '2.jpg\r'),
(3, 'Apple iPad Pro', '8000.00', 5, '8999.00', '3.jpg\r'),
(4, 'Samsung Galaxy Tab', '5999.00', 10, '7000.00', '4.jpg\r'),
(5, 'Sony PlayStation4', '2999.00', 4, '3900.00', '5.jpg\r'),
(6, 'Redragon Mouse', '599.00', 5, '799.00', '6.jpg\r'),
(7, 'Kotion Headset', '399.00', 10, '699.00', '7.jpg\r'),
(8, 'JBL Speaker', '599.00', 5, '799.00', '8.jpg\r'),
(9, 'Dell Monitor 22.5\"', '1500.00', 3, '2200.00', '9.jpg\r'),
(10, 'Hisense 40\" TV', '3500.00', 5, '4200.00', '10.jpg\r'),
(11, 'Sony Digital Camera', '699.00', 10, '1000.00', '11.jpg\r'),
(12, 'SanDisk 8GB USB', '50.00', 10, '99.00', '12.jpg\r'),
(13, 'HP Celeron Notebook', '2999.00', 4, '3500.00', '13.jpg\r'),
(14, 'External Drive 500GB', '499.00', 5, '799.00', '14.jpg\r'),
(15, 'Xbox One 1TB', '3100.00', 5, '3800.00', '15.jpg'),
(16, 'Fitbit Loop Band', '150.00', 10, '400.00', '16.jpg\r'),
(17, 'Logitech Keyboard', '99.00', 5, '229.00', '17.jpg\r'),
(18, 'Ellies HDMI Cable', '20.00', 10, '55.00', '18.jpg\r'),
(19, 'VR Headset', '199.00', 5, '300.00', '19.jpg\r'),
(20, 'Phillips Electric Shave', '600.00', 3, '799.00', '20.jpg\r'),
(21, 'Dual-Band WiFi Router', '899.00', 5, '1199.00', '21.jpg\r'),
(22, 'Wireless Charging pad', '499.00', 5, '699.00', '22.jpg\r'),
(23, 'Nintendo Switch Console', '399.00', 4, '5200.00', '23.jpg\r'),
(24, 'DSTV Explora2', '699.00', 7, '999.00', '24.jpg\r'),
(25, 'Samsubg Blu-ray player', '899.00', 3, '1200.00', '25.jpg\r'),
(26, 'Digital Photo Frame', '325.00', 6, '599.00', '26.jpg\r'),
(27, 'Kindle 7\" Tablet', '550.00', 10, '899.00', '27.jpg\r'),
(28, 'SanDisk 64GB Memory Card', '250.00', 10, '399.00', '28.jpg\r'),
(29, 'Canon Digital Camera', '1999.00', 5, '2599.00', '29.jpg\r'),
(30, 'Huawei 3G Dongle', '399.00', 10, '560.00', '30.jpg\r');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `OrderNum` int(11) NOT NULL AUTO_INCREMENT,
  `OrderDate` varchar(50) NOT NULL,
  `CustomerNum` int(11) NOT NULL,
  PRIMARY KEY (`OrderNum`),
  KEY `CustomerNum` (`CustomerNum`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`OrderNum`, `OrderDate`, `CustomerNum`) VALUES
(1, '2018/03/16', 1),
(2, '2018/03/16', 2),
(3, '2018/03/16', 3),
(4, '2018/03/17', 4),
(5, '2018/03/17', 5),
(6, '2018/03/18', 6),
(7, '2018/03/20', 7),
(8, '2018/03/21', 8),
(9, '2018/03/23', 9),
(10, '2018/03/25', 10),
(11, '2018/03/27', 11),
(12, '2018/03/28', 12),
(13, '2018/04/2', 13),
(14, '2018/04/5', 14),
(15, '2018/04/5', 15),
(16, '2018/04/6', 16),
(17, '2018/04/7', 1),
(18, '2018/04/7', 18),
(19, '2018/04/8', 19),
(20, '2018/04/8', 20),
(21, '2018/04/8', 21),
(22, '2018/04/11', 22),
(23, '2018/04/12', 23),
(24, '2018/04/13', 24),
(25, '2018/04/16', 25),
(26, '2018/04/18', 26),
(27, '2018/05/1', 27),
(28, '2018/05/2', 28),
(29, '2018/05/3', 29),
(30, '2018/05/4', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordered_item`
--

DROP TABLE IF EXISTS `tbl_ordered_item`;
CREATE TABLE IF NOT EXISTS `tbl_ordered_item` (
  `OrderItemID` varchar(50) NOT NULL,
  `OrderNum` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  PRIMARY KEY (`OrderItemID`),
  KEY `OrderNum` (`OrderNum`),
  KEY `ItemID` (`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ordered_item`
--

INSERT INTO `tbl_ordered_item` (`OrderItemID`, `OrderNum`, `ItemID`) VALUES
('OT_1', 2, 1),
('OT_2', 5, 4),
('OT_3', 3, 2),
('OT_4', 6, 3),
('OT_5', 24, 6),
('OT_6', 30, 7),
('OT_7', 1, 9),
('OT_8', 9, 10),
('OT_9', 12, 8),
('OT_10', 20, 5),
('OT_11', 25, 11),
('OT_12', 14, 14),
('OT_13', 29, 13),
('OT_14', 27, 12),
('OT_15', 21, 16),
('OT_16', 28, 17),
('OT_17', 22, 20),
('OT_18', 7, 22),
('OT_19', 8, 19),
('OT_20', 11, 18),
('OT_21', 10, 15),
('OT_22', 13, 21),
('OT_23', 15, 24),
('OT_24', 16, 23),
('OT_25', 18, 27),
('OT_26', 19, 26),
('OT_27', 26, 28),
('OT_28', 23, 29),
('OT_29', 4, 30),
('OT_30', 17, 25);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
