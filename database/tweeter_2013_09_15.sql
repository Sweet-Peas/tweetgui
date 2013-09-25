-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2013 at 09:17 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tweeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `hashTag` char(32) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='A table of different hastags that can be insterted into messages' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`index`, `hashTag`) VALUES
(1, 'Arduino'),
(2, 'Raspberry_Pi'),
(3, 'RaspberryPi'),
(4, 'Electronics'),
(5, 'Cubieboard');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `consumerKey` char(255) NOT NULL,
  `consumerSecret` char(255) NOT NULL,
  `accessToken` char(255) NOT NULL,
  `accessSecret` char(255) NOT NULL,
  `minTime` int(11) NOT NULL,
  `maxTime` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Settings table for the twitter spitter' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`index`, `consumerKey`, `consumerSecret`, `accessToken`, `accessSecret`, `minTime`, `maxTime`) VALUES
(1, 'UByDevGW8XBPLTvSaTzNg', 'ezmGA0rGsQRgsA52mPYtMqqdDYBAOeXgLcseGXErERg', '1177022642-WtUtDIvWxoBZWm6x58f6lsFM4Lod6cBPgpMgTL0', 'jgjKWRlflGV2xcG4XD31Rz4nU3lHp22bol09LgXs', 1000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `tweetID` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '0',
  `tweetMgs` text NOT NULL,
  `numIterations` int(11) NOT NULL DEFAULT '0',
  `maxIterations` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tweetID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Basic table for tweets' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`tweetID`, `sort`, `tweetMgs`, `numIterations`, `maxIterations`, `enabled`) VALUES
(3, 0, 'Turning your #RaspberryPi into a #LAMP server. Check it out here http://info.sweetpeas.se/?p=67 <C>', 0, 0, 1),
(4, 0, 'Help our Indiegogo campaign for an Electronic Sensors Breakout Kit for <T1> and <T2> http://igg.me/p/503202/twtr/3767351', 0, 0, 1),
(5, 0, 'I just wanted to give you a heads up on our #RaspberryPi #Raspberry_Pi #LAMP blog entry. Check it out here http://bit.ly/17DMvu7 <C>', 0, 0, 1),
(6, 0, 'Check out this great #RaspberryPi kit with 8GB SD Card and #Wifi http://shop.invector.se/product.php?id_product=226 <C>', 0, 0, 1),
(7, 0, '<T1> <T2> makers, help us make our affordable sensor kit campaign on Indiegogo a hit http://igg.me/at/sensor-kit/x/3767351', 0, 0, 1),
(8, 0, '<T1> <T2> makers, help us increase our Gogofactor on http://igg.me/at/sensor-kit/x/3767351 by giving us a facebook like.', 0, 0, 1),
(9, 0, 'The robot guy has put eyes on his #Arduino #robot. Check out the latest developments on http://info.sweetpeas.se/?p=119 <C>', 0, 0, 1),
(10, 0, 'Check out our new #Arduino #Wifi #Shield that we got from the factory today http://on.fb.me/17i9V7V, they look absolutely awesome <C>', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
