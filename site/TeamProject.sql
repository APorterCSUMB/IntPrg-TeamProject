-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 09:42 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TeamProject`
--
CREATE DATABASE IF NOT EXISTS `TeamProject` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TeamProject`;

-- --------------------------------------------------------

--
-- Table structure for table `Producer`
--

DROP TABLE IF EXISTS `Producer`;
CREATE TABLE IF NOT EXISTS `Producer` (
  `producerID` int(5) NOT NULL,
  `producerName` varchar(40) NOT NULL,
  `producerDesc` varchar(200) NOT NULL,
  PRIMARY KEY (`producerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Producer`
--

INSERT INTO `Producer` (`producerID`, `producerName`, `producerDesc`) VALUES
(10010, 'Sysco', 'We make cheap, generic food!'),
(10020, 'Starbucks', 'Provider of coffee and tea products.'),
(10030, 'Subway', 'Provider of pre-packaged sandwiches and chips.'),
(10040, 'CSUMB', 'House brand creations from the campus kitchen.');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE IF NOT EXISTS `Products` (
  `productID` int(10) NOT NULL DEFAULT '0',
  `productName` varchar(40) NOT NULL DEFAULT 'Un-Named Product',
  `productDesc` varchar(100) NOT NULL DEFAULT 'No product description yet!',
  `price` float NOT NULL DEFAULT '0',
  `calories` int(4) NOT NULL DEFAULT '0',
  `healthyChoice` tinyint(1) NOT NULL DEFAULT '0',
  `TypeID` int(5) NOT NULL DEFAULT '0',
  `producerID` int(5) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `productTypeId` (`TypeID`),
  KEY `producerID` (`producerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productID`, `productName`, `productDesc`, `price`, `calories`, `healthyChoice`, `TypeID`, `producerID`) VALUES
(1002358879, 'Chicken Nuggets', 'Five of the best white-meat chicken nuggets you''ve ever had!', 2.5, 350, 0, 10100, 10010),
(1021654984, 'Chicken Ranch', 'A six inch sub with chicken, provolone, and ranch on herbed bread.', 3, 400, 0, 10400, 10030),
(1032156489, 'Italian Trio', 'A six inch sub, with blognoa, saprosetta, and salami.', 3, 400, 1, 10400, 10030),
(1032198765, 'Cheddar Lays', 'Small bag of Lays potato chips with cheddar/parmesan seasoning.', 2.5, 250, 0, 10800, 10030),
(1035498795, 'Iced Tea', 'A 16oz cup of chilled, sweetened tea.', 3, 350, 1, 10900, 10020),
(1216849146, 'Iced Coffee', 'A 16oz cup of cold brewed, iced coffee.', 3, 0, 1, 10900, 10020),
(1223484687, 'Garlic Fries', 'A small basket of our delicious, perfectly seasoned garlic fries.', 3, 350, 0, 10100, 10010),
(1235498497, 'Frappucino', 'A 16oz cup of iced coffee blended with ice and cream.', 4, 400, 0, 10900, 10020),
(1248796582, 'Fries', 'A small basket of our delicious, perfectly golden french fries.', 2, 300, 1, 10100, 10010),
(1285613205, 'Coffee', 'A 16oz cup of hot, black coffee.', 2, 0, 1, 10900, 10020),
(1326549816, 'Meatball Sub', 'A six inch sub, with meatballs, swiss, and marinara.', 3, 350, 1, 10400, 10030),
(1361065128, 'Ruffles', 'A small bag of plain, crinkle cut potato chips - lightly salted.', 2.5, 250, 1, 10800, 10030),
(1466853210, 'Fried Cheese Sticks', 'Five fried mozarella sticks, with a dash of marinara on the side.', 3.5, 425, 0, 10100, 10010),
(1489518465, 'Veggie Delight', 'A six inch sub piled high with veggies and a bit of oil and vinegar dressing.', 3, 350, 1, 10400, 10030),
(1523874568, 'Yogurt', 'A tube of gogurt in strawberry or banana or blue-razz flavors.', 1, 150, 1, 10800, 10010),
(1565484965, 'Americano', 'A 16oz cup of hot coffee, made with espresso and hot water.', 3, 0, 1, 10900, 10020),
(1574632891, 'Chocolate Milkshake', 'A small chocolate milkshake.', 2, 250, 0, 10200, 10040),
(1578245689, 'Strawberry Milkshake', 'A small strawberry milkshake.', 2, 250, 0, 10200, 10040),
(1612476231, 'Taquitos', 'Three delicious beef taquitos that taste straight from the street corners of Mexico.', 3.25, 450, 1, 10300, 10010),
(1616849846, 'Hot Cocoa', 'AA 16oz cup of hot, rich cocoa.', 3, 100, 0, 10900, 10020),
(1651681100, 'Fritos', 'A small bag of frito corn chips - heavy on salt.', 2.5, 250, 0, 10800, 10030),
(1651981654, 'Hot Tea', 'A 16oz cup of hot, black tea.', 2, 0, 1, 10900, 10020),
(1654819565, 'Cheese Burger', 'A half-pound cheese burger with lettuce and tomato, served with a side of fries.', 5.5, 600, 1, 10300, 10010),
(1654911354, 'Coffee Milkshake', 'A small coffee milkshake.', 2, 250, 0, 10200, 10040),
(1654984968, 'Buffalo Lays', 'Small bag of Lays potato chips with buffalo seasoning.', 2.5, 250, 0, 10800, 10030),
(1657985246, 'Taco Plate', 'Three soft tacos, one each of chicken, beef, and pork.', 3.75, 450, 1, 10300, 10040),
(1678234687, 'Fountain Soda', 'A small fountain soda.', 1.5, 200, 0, 10900, 10010),
(1678511235, 'Vanilla Milkshake', 'A small vanilla milkshake.', 2, 250, 0, 10200, 10040);

-- --------------------------------------------------------

--
-- Table structure for table `ProductType`
--

DROP TABLE IF EXISTS `ProductType`;
CREATE TABLE IF NOT EXISTS `ProductType` (
  `TypeID` int(5) NOT NULL DEFAULT '0',
  `TypeDesc` varchar(100) NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProductType`
--

INSERT INTO `ProductType` (`TypeID`, `TypeDesc`) VALUES
(10100, 'Fried Foods'),
(10200, 'Ice Creams'),
(10300, 'Full Meals'),
(10400, 'Sandwiches'),
(10500, 'Breakfast'),
(10600, 'Frozen Item'),
(10800, 'Small Snacks'),
(10900, 'Drinks');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `Producer` FOREIGN KEY (`producerID`) REFERENCES `Producer` (`producerID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Type` FOREIGN KEY (`TypeID`) REFERENCES `ProductType` (`TypeID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
