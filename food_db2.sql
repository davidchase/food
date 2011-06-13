-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2011 at 03:34 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `search`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakfast`
--

DROP TABLE IF EXISTS `breakfast`;
CREATE TABLE `breakfast` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_serving` varchar(20) NOT NULL,
  `food_calories` varchar(20) NOT NULL,
  `food_carbs` varchar(20) NOT NULL,
  `food_lipid` varchar(20) NOT NULL,
  `food_sodium` varchar(20) NOT NULL,
  `food_cholesterol` varchar(20) NOT NULL,
  `food_protein` varchar(20) NOT NULL,
  `food_sugars` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `breakfast`
--


-- --------------------------------------------------------

--
-- Table structure for table `dinner`
--

DROP TABLE IF EXISTS `dinner`;
CREATE TABLE `dinner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_serving` varchar(20) NOT NULL,
  `food_calories` varchar(20) NOT NULL,
  `food_carbs` varchar(20) NOT NULL,
  `food_lipid` varchar(20) NOT NULL,
  `food_sodium` varchar(20) NOT NULL,
  `food_cholesterol` varchar(20) NOT NULL,
  `food_protein` varchar(20) NOT NULL,
  `food_sugars` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `dinner`
--


-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE `exercises` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `exercise` varchar(20) NOT NULL,
  `cbh` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` VALUES(1, 'Aerobic Low Impact', '374');
INSERT INTO `exercises` VALUES(2, 'Aerobic High Impact', '524');
INSERT INTO `exercises` VALUES(3, 'Archery', '262');
INSERT INTO `exercises` VALUES(4, 'Jumping Rope', '752');
INSERT INTO `exercises` VALUES(5, 'Dancing General', '337');
INSERT INTO `exercises` VALUES(6, 'Paddle Boating', '299');
INSERT INTO `exercises` VALUES(7, 'Ice Skating', '455');
INSERT INTO `exercises` VALUES(8, 'Golf Driving Range', '225');
INSERT INTO `exercises` VALUES(9, 'Beach Volleyball', '599');
INSERT INTO `exercises` VALUES(10, 'Rock Climbing Up', '823');

-- --------------------------------------------------------

--
-- Table structure for table `fitness`
--

DROP TABLE IF EXISTS `fitness`;
CREATE TABLE `fitness` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `eid` varchar(20) NOT NULL,
  `fitness` varchar(20) NOT NULL,
  `calories` varchar(20) NOT NULL,
  `minutes` varchar(20) NOT NULL,
  `miles` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `fitness`
--


-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods` (
  `food_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(25) NOT NULL,
  `food_serving` int(11) NOT NULL,
  `food_calories` int(11) NOT NULL,
  `food_carbs` int(11) NOT NULL,
  `food_lipid` int(11) NOT NULL,
  `food_sodium` int(11) NOT NULL,
  `food_cholesterol` int(11) NOT NULL,
  `food_protein` int(11) NOT NULL,
  `food_sugars` int(11) NOT NULL,
  `food_type` varchar(25) NOT NULL,
  PRIMARY KEY (`food_ID`),
  KEY `food_name` (`food_name`),
  KEY `food_serving` (`food_serving`),
  KEY `food_calories` (`food_calories`),
  KEY `food_lipid` (`food_lipid`),
  KEY `food_sodium` (`food_sodium`),
  KEY `food_cholestrol` (`food_cholesterol`),
  KEY `food_protein` (`food_protein`),
  KEY `food_sugars` (`food_sugars`),
  KEY `food_type` (`food_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` VALUES(1, 'Apple Jacks', 1, 366, 88, 2, 433, 0, 2, 44, 'cereal');
INSERT INTO `foods` VALUES(2, '100 Grand Bar', 1, 468, 71, 19, 203, 12, 3, 52, 'candy');
INSERT INTO `foods` VALUES(3, 'Oscar Mayer Hot Dog', 1, 327, 2, 30, 1025, 56, 11, 2, 'beef frank');
INSERT INTO `foods` VALUES(4, 'Soft Pretzel', 1, 338, 69, 3, 1404, 3, 8, 0, 'pretzel');
INSERT INTO `foods` VALUES(5, 'Cheeseburger Plain', 1, 303, 30, 14, 589, 41, 15, 5, 'fast food');
INSERT INTO `foods` VALUES(6, 'Beef Chimichanga', 1, 244, 25, 11, 523, 5, 11, 0, 'fast food');
INSERT INTO `foods` VALUES(7, 'Egg Bagel', 1, 278, 53, 2, 505, 24, 11, 0, 'bread');
INSERT INTO `foods` VALUES(8, 'Orange Juice', 1, 45, 10, 0, 1, 0, 1, 8, 'fruit juice');
INSERT INTO `foods` VALUES(9, 'Fat Free Cream Cheese', 1, 105, 8, 1, 702, 12, 16, 5, 'cheese');
INSERT INTO `foods` VALUES(10, 'Plain Yogurt', 1, 61, 5, 3, 46, 13, 3, 5, 'milk products');
INSERT INTO `foods` VALUES(13, 'Honey Nut Cheerios', 1, 150, 50, 1, 5, 0, 4, 20, 'cereal');
INSERT INTO `foods` VALUES(14, 'Blue Berry Muffin', 1, 300, 10, 5, 4, 0, 12, 15, 'bread');
INSERT INTO `foods` VALUES(15, 'Apple', 1, 120, 0, 0, 0, 0, 0, 3, 'fruits');
INSERT INTO `foods` VALUES(16, 'McDonalds Whopper', 1, 350, 90, 20, 10, 0, 15, 5, 'fast food');
INSERT INTO `foods` VALUES(17, 'Honey Ham', 1, 120, 1, 2, 25, 0, 16, 15, 'beef');
INSERT INTO `foods` VALUES(18, 'Strawberry', 1, 90, 10, 5, 2, 0, 1, 10, 'fruits');
INSERT INTO `foods` VALUES(19, 'Cherry', 1, 90, 1, 0, 1, 0, 0, 10, 'fruits');
INSERT INTO `foods` VALUES(20, 'Whole Egg', 1, 71, 0, 5, 70, 211, 6, 0, 'meat');
INSERT INTO `foods` VALUES(21, 'Baby Carrot', 1, 5, 1, 0, 12, 0, 0, 1, 'vegetable');
INSERT INTO `foods` VALUES(22, 'Fruity Loops', 1, 210, 25, 5, 5, 0, 6, 15, 'ceral');
INSERT INTO `foods` VALUES(23, 'Fish', 1, 150, 2, 6, 10, 100, 15, 1, 'meat');
INSERT INTO `foods` VALUES(24, 'Whole Milk', 1, 246, 13, 8, 98, 24, 8, 13, 'diary');
INSERT INTO `foods` VALUES(25, 'Buffalo Wings', 1, 210, 4, 12, 900, 130, 22, 0, 'fast food');
INSERT INTO `foods` VALUES(26, 'Banana', 1, 120, 5, 0, 3, 0, 1, 6, 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `lunch`
--

DROP TABLE IF EXISTS `lunch`;
CREATE TABLE `lunch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_serving` varchar(20) NOT NULL,
  `food_calories` varchar(20) NOT NULL,
  `food_carbs` varchar(20) NOT NULL,
  `food_lipid` varchar(20) NOT NULL,
  `food_sodium` varchar(20) NOT NULL,
  `food_cholesterol` varchar(20) NOT NULL,
  `food_protein` varchar(20) NOT NULL,
  `food_sugars` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `lunch`
--


-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

DROP TABLE IF EXISTS `snacks`;
CREATE TABLE `snacks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_serving` varchar(20) NOT NULL,
  `food_calories` varchar(20) NOT NULL,
  `food_carbs` varchar(20) NOT NULL,
  `food_lipid` varchar(20) NOT NULL,
  `food_sodium` varchar(20) NOT NULL,
  `food_cholesterol` varchar(20) NOT NULL,
  `food_protein` varchar(20) NOT NULL,
  `food_sugars` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `snacks`
--

