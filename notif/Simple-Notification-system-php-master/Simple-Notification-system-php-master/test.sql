-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 04:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `112_noti`
--

CREATE TABLE IF NOT EXISTS `112_noti` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `seen_unseen` varchar(20) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `112_noti`
--

INSERT INTO `112_noti` (`sl`, `type`, `ann`, `seen_unseen`) VALUES
(5, 'task', 'this is a test', 's'),
(6, 'announcement', 'tese', 's'),
(7, 'task', 'tesjhvvva', 's'),
(8, 'announcement', 'this is a test announce', 's'),
(9, 'task', 'mairala', 's');

-- --------------------------------------------------------

--
-- Table structure for table `113_noti`
--

CREATE TABLE IF NOT EXISTS `113_noti` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `seen_unseen` varchar(20) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `113_noti`
--

INSERT INTO `113_noti` (`sl`, `type`, `ann`, `seen_unseen`) VALUES
(1, 'task', 'hey suny', 's'),
(2, 'task', 'this is in cse 102', 's'),
(3, 'announcement', 'its time to rock', 's'),
(4, 'task', 'who the hell are you', 's');

-- --------------------------------------------------------

--
-- Table structure for table `cse101_ann`
--

CREATE TABLE IF NOT EXISTS `cse101_ann` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cse101_ann`
--

INSERT INTO `cse101_ann` (`sl`, `type`, `ann`, `date`) VALUES
(16, 'task', 'this is a test', '23-09-16 11:23:50am'),
(17, 'announcement', 'tese', '23-09-16 11:24:16am'),
(18, 'task', 'tesjhvvva', '23-09-16 11:24:24am'),
(19, 'announcement', 'this is a test announce', '23-09-16 11:37:17am'),
(20, 'task', 'mairala', '06-02-17 11:05:51am');

-- --------------------------------------------------------

--
-- Table structure for table `cse101_student`
--

CREATE TABLE IF NOT EXISTS `cse101_student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse101_student`
--

INSERT INTO `cse101_student` (`id`, `name`) VALUES
('112', 'shohan');

-- --------------------------------------------------------

--
-- Table structure for table `cse102_ann`
--

CREATE TABLE IF NOT EXISTS `cse102_ann` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cse102_ann`
--

INSERT INTO `cse102_ann` (`sl`, `type`, `ann`, `date`) VALUES
(1, 'task', 'hey suny', '23-09-16 11:29:52am'),
(2, 'task', 'this is in cse 102', '23-09-16 11:37:58am'),
(3, 'announcement', 'its time to rock', '23-09-16 12:03:25pm'),
(4, 'task', 'who the hell are you', '23-09-16 12:03:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `cse102_student`
--

CREATE TABLE IF NOT EXISTS `cse102_student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse102_student`
--

INSERT INTO `cse102_student` (`id`, `name`) VALUES
('113', 'suny');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;