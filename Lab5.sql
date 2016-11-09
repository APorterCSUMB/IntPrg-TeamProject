-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 08:09 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19


--
-- Database: `Lab5`
--

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `productID` int(10) NOT NULL DEFAULT '0',
  `productName` varchar(40) NOT NULL DEFAULT 'Un-Named Product',
  `productDesc` varchar(100) NOT NULL DEFAULT 'No product description yet!',
  `price` float NOT NULL DEFAULT '0',
  `calories` int(4) NOT NULL DEFAULT '0',
  `healthyChoice` tinyint(1) NOT NULL DEFAULT '0',
  `TypeID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productID`),
  KEY `productTypeId` (`TypeID`),
  KEY `productTypeId_2` (`TypeID`),
  KEY `productTypeId_3` (`TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productID`, `productName`, `productDesc`, `price`, `calories`, `healthyChoice`, `TypeID`) VALUES
(1002358879, 'Chicken Nuggets', 'Five of the best white-meat chicken nuggets you''ve ever had!', 2.5, 350, 0, 10100),
(1223484687, 'Garlic Fries', 'A small basket of our delicious, perfectly seasoned garlic fries.', 3, 350, 0, 10100),
(1248796582, 'Fries', 'A small basket of our delicious, perfectly golden french fries.', 2, 300, 1, 10100),
(1466853210, 'Fried Cheese Sticks', 'Five fried mozarella sticks, with a dash of marinara on the side.', 3.5, 425, 0, 10100),
(1523874568, 'Yogurt', 'A tube of gogurt in strawberry or banana or blue-razz flavors.', 1, 150, 1, 10800),
(1574632891, 'Chocolate Milkshake', 'A small chocolate milkshake.', 2, 250, 0, 10200),
(1578245689, 'Strawberry Milkshake', 'A small strawberry milkshake.', 2, 250, 0, 10200),
(1612476231, 'Taquitos', 'Three delicious beef taquitos that taste straight from the street corners of Mexico.', 3.25, 450, 1, 10300),
(1657985246, 'Taco Plate', 'Three soft tacos, one each of chicken, beef, and pork.', 3.75, 450, 1, 10300),
(1678234687, 'Fountain Soda', 'A small fountain soda.', 1.5, 200, 0, 10900),
(1678511235, 'Vanilla Milkshake', 'A small vanilla milkshake.', 2, 250, 0, 10200),
(1764853125, 'Onion Rings', 'A small basket of our delicious, perfectly golden onion rings.', 3, 350, 0, 10100);

-- --------------------------------------------------------

--
-- Table structure for table `ProductType`
--

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
(10800, 'Small Snacks'),
(10900, 'Drinks');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `Type` FOREIGN KEY (`TypeID`) REFERENCES `ProductType` (`TypeID`) ON DELETE NO ACTION ON UPDATE CASCADE;

