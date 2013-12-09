-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 06:05 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bachelor`
--

-- --------------------------------------------------------

--
-- Table structure for table `bc_animals`
--

CREATE TABLE `bc_animals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `bc_animals`
--

INSERT INTO `bc_animals` (`id`, `name`) VALUES
(1, 'Søkøer'),
(2, 'Næsebjørne'),
(3, 'Tropiske dyr'),
(4, 'Tropiske fisk'),
(5, 'Rovfisk'),
(6, 'Colobusaber'),
(7, 'Giftslanger'),
(8, 'Komodovaran'),
(9, 'Alligatorer'),
(10, 'Ålemaller'),
(11, 'Slanger'),
(12, 'Røde piratfisk'),
(13, 'Ikke angivet');

-- --------------------------------------------------------

--
-- Table structure for table `bc_areas`
--

CREATE TABLE `bc_areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `visitors` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bc_areas`
--

INSERT INTO `bc_areas` (`id`, `name`, `visitors`) VALUES
(1, 'Sydamerika', NULL),
(2, 'Afrika', NULL),
(3, 'Asien', NULL),
(4, 'Saltvandsakvariet', NULL),
(5, 'Slangetemplet', NULL),
(6, 'Dioramahallen', NULL),
(7, 'Danmarksparken', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_feedings`
--

CREATE TABLE `bc_feedings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `animalID` int(11) DEFAULT NULL,
  `description` text,
  `placeID` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  `type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `bc_feedings`
--

INSERT INTO `bc_feedings` (`id`, `animalID`, `description`, `placeID`, `time`, `type`) VALUES
(11, 5, 'go go go2', 11, '2013-11-28 14:30:00', 'feeding'),
(12, 1, '(y) :D', 1, '2013-11-26 19:15:00', 'feeding'),
(5, 2, '111', 3, '2013-11-25 16:15:00', 'showing'),
(10, 9, 'go go go', 10, '2013-11-26 14:45:00', 'showing'),
(13, 1, 'før på dato', 1, '2013-11-25 14:15:00', 'feeding'),
(14, 1, 'før på tid', 1, '2013-11-26 14:00:00', 'feeding'),
(16, 1, 'hej', 1, '2013-11-26 15:10:00', 'feeding'),
(17, 7, 'Det bliver sygt', 6, '2013-11-26 15:15:00', 'showing'),
(18, 1, '', 1, '2013-11-27 18:00:00', 'feeding'),
(19, 1, 'hej', 10, '2013-11-27 19:35:00', 'feeding'),
(21, 5, 'Det bliver crazy :D Sanne tager den.', 10, '2013-11-27 19:40:00', 'Fremvisning'),
(27, 1, '', 1, '2013-11-29 16:00:00', 'Fodring'),
(28, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(29, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(30, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(31, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(32, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(33, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(34, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(35, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(36, 1, '', 1, '2013-12-03 09:00:00', 'Fodring'),
(37, 1, '', 1, '2013-12-03 13:40:00', 'Fodring'),
(38, 1, '', 1, '2013-12-03 13:45:00', 'Fodring'),
(39, 6, 'Hej', 5, '2013-12-09 12:45:00', 'Fodring'),
(43, 8, '', 7, '2013-12-09 13:40:00', 'Fodring'),
(42, 6, '', 5, '2013-12-09 13:45:00', 'Fodring'),
(44, 1, '', 1, '2013-12-09 13:50:00', 'Fodring'),
(45, 2, '', 2, '2013-12-09 13:55:00', 'Fodring'),
(46, 9, '', 8, '2013-12-09 14:00:00', 'Fodring'),
(47, 11, '', 10, '2013-12-09 14:15:00', 'Fodring'),
(48, 13, '', 1, '2013-12-09 14:45:00', 'Fremvisning');

-- --------------------------------------------------------

--
-- Table structure for table `bc_places`
--

CREATE TABLE `bc_places` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `areaID` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `x` int(10) NOT NULL,
  `y` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bc_places`
--

INSERT INTO `bc_places` (`id`, `areaID`, `name`, `x`, `y`) VALUES
(1, 1, 'Søkobassinet', 320, 525),
(2, 1, 'Næsebjørne', 210, 130),
(5, 2, 'Colobusaber', 320, 215),
(7, 3, 'Komodovaran', 320, 180),
(8, 3, 'Alligatorer', 90, 200),
(9, 2, 'Ålemaller', 0, 0),
(10, 1, 'Templet', 470, 140),
(11, 1, 'Piratfisk', 205, 525);
