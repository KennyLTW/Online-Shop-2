-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 08:21 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comps356f`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `uname` varchar(50) NOT NULL,
  `prodid` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`uname`, `prodid`, `comment`) VALUES
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('', 0, ''),
('admin', 2, 'try'),
('admin', 2, 'let try');

-- --------------------------------------------------------

--
-- Table structure for table `favourList`
--

CREATE TABLE IF NOT EXISTS `favourList` (
  `userID` varchar(255) NOT NULL,
  `imageID` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourList`
--

INSERT INTO `favourList` (`userID`, `imageID`) VALUES
('KeithP', 22),
('KeithP', 19);

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE IF NOT EXISTS `products_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `uploader` text NOT NULL,
  `Name` text NOT NULL,
  `Price` int(11) NOT NULL,
  `customer` text NOT NULL,
  `status` text NOT NULL,
  `information` text,
  `Path` text NOT NULL,
  `Type` varchar(15) NOT NULL,
  `udate` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`ID`, `uploader`, `Name`, `Price`, `customer`, `status`, `information`, `Path`, `Type`, `udate`) VALUES
(2, 'chriswong', 'quaker', 50, 'dllm123', 'A', 'from Malaysia/Contains gluten', '/pj2/food_picture/quaker.jpg', 'Food', '2019-03-27 17:45:00'),
(3, 'test', 'oil', 2000, 'admin', 'A', 'from Italy/Contains peanuts and/or soy', '/pj2/food_picture/oil.jpg', 'Other', '2019-03-19 09:00:00'),
(4, 'chriswong', 'fish', 60, '', 'P', 'from Hong Kong/Contains pet fish', '/pj2/food_picture/fish.jpg', 'Food', '2019-03-27 08:00:00'),
(5, 'test', 'egg', 60, '', 'P', 'from China/Contains eggs', '/pj2/food_picture/egg.jpg', 'Food', '2019-03-23 07:00:00'),
(6, 'dllm123', 'coca cola', 60, 'test', 'A', 'from Hong Kong/Contains high sugers', '/pj2/food_picture/coca_cola.jpg', 'Drink', '2019-03-27 00:00:00'),
(14, 'iveboy', 'banana', 80, 'dllm123', 'A', 'banana', '/pj2/food_picture/banana.jpeg', 'Food', '2019-03-12 00:00:00'),
(17, 'admin', 'food', 5, '123', 'P', 'i am food', '/pj2/food_picture/pizza-slices-food.jpg', 'Food', '2019-03-18 00:00:00'),
(19, 'cloudbb', 'hello', 4, 'iveboy', 'P', 'hello bb', '/pj2/food_picture/pizza-slices-food.jpg', 'Other', '2019-03-26 00:00:00'),
(20, 'iveboy', 'flower', 444, 'test', 'P', 'good tatse, flower lover must need buy!', '/pj2/food_picture/qq.jpg', 'Other', '2019-03-29 00:00:00'),
(21, '123', '123', 333, '', 'P', '123', '/pj2/food_picture/weka.log', 'Other', '2019-03-29 10:00:00'),
(22, 'test', 'milk', 1234, 'KeithP', 'P', 'milk', '/pj2/food_picture/download.jpg', 'Drink', '2019-03-29 10:00:00'),
(24, 'KeithP', 'hehe', 999, '', 'P', 'nice food', '/pj2/food_picture/download2.jpg', 'Food', '2019-03-29 04:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `reportdata`
--

CREATE TABLE IF NOT EXISTS `reportdata` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rusername` varchar(20) NOT NULL,
  `rreportedname` varchar(20) NOT NULL,
  `rwebsite` varchar(255) NOT NULL,
  `rreason` varchar(255) NOT NULL,
  `rmessage` text NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reportdata`
--

INSERT INTO `reportdata` (`rid`, `rusername`, `rreportedname`, `rwebsite`, `rreason`, `rmessage`) VALUES
(4, 'test', '123', 'http://www.google.com', 'Prohibited item', '123214214141'),
(5, 'k', 'keithP', '', 'Unauthorised Sales', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`username`, `password`, `id`, `email`) VALUES
('test', 'test1', 2, 'test@gamil.com'),
('chriswong', '999', 3, 'chriswong@gmail.com'),
('dllm123', '1234', 4, 'dllm123@gmail.com'),
('iveboy', '999', 5, 'iveboy@gmail.com'),
('admin', 'admin', 6, ''),
('cloudbb', 'cloudbb', 7, '	\ncloudbb@gmail.com'),
('qwe', '123', 8, 'qwe@gmail.com'),
('zxc', '123', 9, 'zxc@gmail.com'),
('123', '123', 10, '123@gmail.com'),
('kennylie', '12345678', 11, 'kennylie1997@gmail.com'),
('KeithP', '12345678', 12, 'keith1997513@gmail.com'),
('abcc', 'TLhKAwx3', 13, 'abc@abc.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
