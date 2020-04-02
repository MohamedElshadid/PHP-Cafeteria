-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2020 at 09:42 PM
-- Server version: 5.7.20-log
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
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Cid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cid`, `Name`) VALUES
(1, 'Drinks'),
(2, 'Soft');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Oid` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Notes` varchar(100) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Room` int(11) NOT NULL,
  PRIMARY KEY (`Oid`),
  KEY `Uid` (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `Date`, `Status`, `TotalPrice`, `Notes`, `Uid`, `Room`) VALUES
(9, '2020-03-15', '0', 246, 'notes', 1, 404),
(10, '2020-03-15', '0', 246, 'notes', 1, 404),
(11, '2020-03-15', '0', 246, 'notes', 1, 404),
(12, '2020-03-15', '0', 1362, 'notes', 1, 404),
(13, '2020-03-15', '0', 2270, '45desc', 1, 404),
(14, '2020-03-15', '0', 123, '', 1, 404),
(15, '2020-03-15', '0', 123, '', 1, 404),
(16, '2020-03-15', '0', 123, 'description', 1, 404),
(17, '2020-03-15', '0', 123, '', 1, 404),
(18, '2020-03-15', '0', 123, '', 1, 404),
(19, '2020-03-15', '0', 123, '', 1, 404),
(20, '2020-03-15', '0', 454, '', 1, 404),
(21, '2020-03-15', '0', 454, 'notes', 1, 404),
(22, '2020-03-15', '0', 454, 'notes', 1, 404),
(23, '2020-03-15', '0', 454, 'notes', 1, 404),
(24, '2020-03-15', '0', 2270, '', 1, 404),
(25, '2020-03-15', '0', 1476, 'desc', 1, 404),
(26, '2020-03-15', '0', 1476, 'desc', 1, 404),
(27, '2020-03-15', '0', 1476, 'desc', 1, 404),
(28, '2020-03-15', '0', 1599, '', 1, 404),
(29, '2020-03-15', '0', 1722, '', 1, 404),
(30, '2020-03-15', '0', 1845, 'desc', 1, 404);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Pid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Product_Picture` varchar(200) NOT NULL,
  PRIMARY KEY (`Pid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pid`, `Name`, `Price`, `Category`, `Product_Picture`) VALUES
(2, 'product One', 123, '1', 'logo.png'),
(3, 'product Two', 454, '2', 'udacity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
CREATE TABLE IF NOT EXISTS `product_order` (
  `Pid` int(11) NOT NULL,
  `Oid` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`Pid`, `Oid`, `Amount`) VALUES
(2, 9, 13),
(2, 9, 14),
(2, 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_Name` varchar(20) NOT NULL,
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Profile_Picture` varchar(200) NOT NULL,
  `Ext` int(11) NOT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Name`, `Uid`, `Email`, `Password`, `Room_No`, `Profile_Picture`, `Ext`) VALUES
('user', 1, 'user@os.com', '123', 404, 'img.jpg', 405);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `user` (`Uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
