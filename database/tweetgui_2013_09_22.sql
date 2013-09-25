-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 22 sep 2013 kl 19:50
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `tweetgui`
--
CREATE DATABASE IF NOT EXISTS `tweetgui` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tweetgui`;

-- --------------------------------------------------------

--
-- Tabellstruktur `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `hashtagID` int(11) NOT NULL AUTO_INCREMENT,
  `hashTag` char(32) NOT NULL,
  `description` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `tag` varchar(10) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`hashtagID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='A table of different hastags that can be insterted into messages' AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `settings`
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
-- Dumpning av Data i tabell `settings`
--

INSERT INTO `settings` (`index`, `consumerKey`, `consumerSecret`, `accessToken`, `accessSecret`, `minTime`, `maxTime`) VALUES
(1, 'UByDevGW8XBPLTvSaTzNg', 'ezmGA0rGsQRgsA52mPYtMqqdDYBAOeXgLcseGXErERg', '1177022642-WtUtDIvWxoBZWm6x58f6lsFM4Lod6cBPgpMgTL0', 'jgjKWRlflGV2xcG4XD31Rz4nU3lHp22bol09LgXs', 1000, 8000);

-- --------------------------------------------------------

--
-- Tabellstruktur `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `tweetID` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT '999',
  `tweetMgs` text NOT NULL,
  `numIterations` int(11) NOT NULL DEFAULT '0',
  `maxIterations` int(11) NOT NULL DEFAULT '25',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tweetID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Basic table for tweets' AUTO_INCREMENT=49 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
