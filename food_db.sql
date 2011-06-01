-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2011 at 09:10 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordpress_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_foods`
--

DROP TABLE IF EXISTS `wp_foods`;
CREATE TABLE `wp_foods` (
  `food_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `food_name` varchar(25) NOT NULL,
  `food_serving` int(11) NOT NULL,
  `food_calories` int(11) NOT NULL,
  `food_carbs` int(11) NOT NULL,
  `food_lipid` int(11) NOT NULL,
  `food_sodium` int(11) NOT NULL,
  `food_cholestrol` int(11) NOT NULL,
  `food_protein` int(11) NOT NULL,
  `food_sugars` int(11) NOT NULL,
  `food_type` varchar(25) NOT NULL,
  PRIMARY KEY (`food_ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `wp_foods`
--

INSERT INTO `wp_foods` VALUES(1, 1, 'Apple Jacks', 1, 366, 88, 2, 433, 0, 2, 44, 'cereal');
INSERT INTO `wp_foods` VALUES(2, 1, '100 Grand Bar', 1, 468, 71, 19, 203, 12, 3, 52, 'candy');
INSERT INTO `wp_foods` VALUES(3, 1, 'Oscar Mayer Hot Dog', 1, 327, 2, 30, 1025, 56, 11, 2, 'beef frank');
INSERT INTO `wp_foods` VALUES(4, 1, 'Soft Pretzel', 1, 338, 69, 3, 1404, 3, 8, 0, 'pretzel');
INSERT INTO `wp_foods` VALUES(5, 1, 'Chessburger Plain', 1, 303, 30, 14, 589, 41, 15, 5, 'fast food');
INSERT INTO `wp_foods` VALUES(6, 1, 'Beef Chimichanga', 1, 244, 25, 11, 523, 5, 11, 0, 'fast food');
INSERT INTO `wp_foods` VALUES(7, 1, 'Egg Bagel', 1, 278, 53, 2, 505, 24, 11, 0, 'bread');
INSERT INTO `wp_foods` VALUES(8, 1, 'Orange Juice', 1, 45, 10, 0, 1, 0, 1, 8, 'fruit juice');
INSERT INTO `wp_foods` VALUES(9, 1, 'Fat Free Cream Cheese', 1, 105, 8, 1, 702, 12, 16, 5, 'cheese');
INSERT INTO `wp_foods` VALUES(10, 1, 'Plain Yogurt', 1, 61, 5, 3, 46, 13, 3, 5, 'milk products');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wp_foods`
--
ALTER TABLE `wp_foods`
  ADD CONSTRAINT `wp_foods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `wp_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
