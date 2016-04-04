-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 02:52 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzeria_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Crust`
--

CREATE TABLE IF NOT EXISTS `Crust` (
  `CrustId` int(50) NOT NULL AUTO_INCREMENT,
  `CrustType` varchar(255) NOT NULL,
  `CrustCost` int(10) NOT NULL,
  PRIMARY KEY (`CrustId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Crust`
--

INSERT INTO `Crust` (`CrustId`, `CrustType`, `CrustCost`) VALUES
(1, 'Hand-tossed ', 0),
(2, 'Pan ', 0),
(3, 'Stuffed crust', 2),
(4, 'Thin crust', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `OrderId` int(50) NOT NULL,
  `UserId` int(50) NOT NULL,
  `CrustId` int(50) NOT NULL,
  `SizeId` int(50) NOT NULL,
  `Cost` varchar(100) NOT NULL,
  `DateOrdered` datetime NOT NULL,
  `NumberOfPizzas` int(50) NOT NULL,
  `IsOrderCompleted` tinyint(1) NOT NULL,
  `TaxId` int(50) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`OrderId`, `UserId`, `CrustId`, `SizeId`, `Cost`, `DateOrdered`, `NumberOfPizzas`, `IsOrderCompleted`, `TaxId`) VALUES
(338691863, 2103348892, 3, 1, '9.35', '2015-07-15 02:10:27', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `OrderTopping`
--

CREATE TABLE IF NOT EXISTS `OrderTopping` (
  `OrderToppingId` int(50) NOT NULL AUTO_INCREMENT,
  `OrderId` int(50) NOT NULL,
  `ToppingId` int(50) NOT NULL,
  PRIMARY KEY (`OrderToppingId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `OrderTopping`
--

INSERT INTO `OrderTopping` (`OrderToppingId`, `OrderId`, `ToppingId`) VALUES
(1, 1828600631, 1),
(2, 1828600631, 2),
(3, 1828600631, 8),
(4, 1828600631, 9),
(45, 338691863, 1),
(46, 338691863, 2),
(47, 338691863, 8),
(48, 338691863, 9);

-- --------------------------------------------------------

--
-- Table structure for table `PersonalInfo`
--

CREATE TABLE IF NOT EXISTS `PersonalInfo` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `DateCreated` datetime NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ProvinceId` int(10) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2103348893 ;

--
-- Dumping data for table `PersonalInfo`
--

INSERT INTO `PersonalInfo` (`UserId`, `DateCreated`, `FirstName`, `LastName`, `Address`, `City`, `ProvinceId`, `PostalCode`, `Telephone`, `EmailId`) VALUES
(1464535598, '0000-00-00 00:00:00', 'Rana', 'Singh', 'Apartment Building', 'KITCHENER', 3, 'N2P1Z4', '2267921424', 'jaskaransandhu91@gmail.com'),
(2103348892, '0000-00-00 00:00:00', 'Rana', 'Singh', 'Apartment Building', 'KITCHENER', 3, 'N2P1Z4', '2267921424', 'jaskaransandhu91@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `ProvinceId` int(50) NOT NULL AUTO_INCREMENT,
  `ProvinceName` varchar(255) NOT NULL,
  PRIMARY KEY (`ProvinceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Province`
--

INSERT INTO `Province` (`ProvinceId`, `ProvinceName`) VALUES
(1, 'Ontario'),
(2, 'Manitoba'),
(3, 'Saskatchewan'),
(4, 'Quebec');

-- --------------------------------------------------------

--
-- Table structure for table `Size`
--

CREATE TABLE IF NOT EXISTS `Size` (
  `SizeId` int(255) NOT NULL AUTO_INCREMENT,
  `SizeType` varchar(255) NOT NULL,
  `SizeCost` int(10) NOT NULL,
  PRIMARY KEY (`SizeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Size`
--

INSERT INTO `Size` (`SizeId`, `SizeType`, `SizeCost`) VALUES
(1, 'Small', 5),
(2, 'Medium', 10),
(3, 'Large', 15),
(4, 'Extra Large', 20);

-- --------------------------------------------------------

--
-- Table structure for table `Tax`
--

CREATE TABLE IF NOT EXISTS `Tax` (
  `TaxId` int(50) NOT NULL AUTO_INCREMENT,
  `ProvinceId` int(50) NOT NULL,
  `Tax` varchar(100) NOT NULL,
  PRIMARY KEY (`TaxId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Tax`
--

INSERT INTO `Tax` (`TaxId`, `ProvinceId`, `Tax`) VALUES
(1, 1, '13'),
(2, 2, '13'),
(3, 3, '10'),
(4, 4, '14.97');

-- --------------------------------------------------------

--
-- Table structure for table `Topping`
--

CREATE TABLE IF NOT EXISTS `Topping` (
  `ToppingId` int(50) NOT NULL AUTO_INCREMENT,
  `ToppingName` varchar(255) NOT NULL,
  PRIMARY KEY (`ToppingId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Topping`
--

INSERT INTO `Topping` (`ToppingId`, `ToppingName`) VALUES
(1, 'Sausage'),
(2, 'Pepperoni'),
(3, 'Beef'),
(4, 'Bacon'),
(5, 'Chicken'),
(6, 'Ham'),
(7, 'Olive'),
(8, 'Pepper'),
(9, 'Tomato'),
(10, 'Mushroom'),
(11, 'Pineapple');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
