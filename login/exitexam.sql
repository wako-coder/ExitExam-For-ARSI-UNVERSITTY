-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 07:14 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exitexam`
--
CREATE DATABASE IF NOT EXISTS `exitexam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exitexam`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `uid` varchar(50) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password_status` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `username`, `password`, `status`, `password_status`) VALUES
('1111', 'editor', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('1256', 'Admin', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'active', 'changed');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `cid` char(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `colleage` varchar(50) DEFAULT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `rid` varchar(20) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `did` varchar(20) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `dname` (`dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `depthead`
--

CREATE TABLE IF NOT EXISTS `depthead` (
  `did` varchar(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE IF NOT EXISTS `examdate` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`date_id`, `question_type`, `start_date`, `end_date`, `start_time`, `end_time`, `year`) VALUES
(1, 'Regular', '2018-04-23', '2018-06-11', '02:00:00', '12:00:00', 2010),
(2, 'Regular', '2018-04-04', '2018-04-06', '02:00:00', '03:00:00', 2012),
(3, 'Regular', '2018-04-20', '2018-05-21', '02:00:00', '09:00:00', 2011),
(4, 'Regular', '2018-04-03', '2018-04-06', '01:00:00', '01:03:00', 2013),
(5, 'Re_Exam', '2018-04-23', '2018-05-05', '01:00:00', '21:00:00', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `exameditor`
--

CREATE TABLE IF NOT EXISTS `exameditor` (
  `eid` varchar(30) NOT NULL,
  `efname` varchar(50) DEFAULT NULL,
  `emname` varchar(50) DEFAULT NULL,
  `elname` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exameditor`
--

INSERT INTO `exameditor` (`eid`, `efname`, `emname`, `elname`, `sex`, `mobile`, `photo`, `Email`) VALUES
('11', 'bayaneh', 'alemu', 'Admas', 'f', 5577, 'userphoto/m.jpg', 'wwwww@gmail.com'),
('1111', 'muluye', 'fentie', 'abat', 'm', 67787, 'userphoto/m.jpg', 'abe@gmail.com'),
('90', 'muluken', 'yihun', 'esti', 'm', 1234, 'userphoto/m.jpg', 'mu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `examsetter`
--

CREATE TABLE IF NOT EXISTS `examsetter` (
  `sid` varchar(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

CREATE TABLE IF NOT EXISTS `logtable` (
  `lig_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `login_time` varchar(50) NOT NULL,
  `logout_time` varchar(50) NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_performed` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`lig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_number` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Content` varchar(2000) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`notice_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `unvisersity` varchar(50) DEFAULT NULL,
  `resean` varchar(2000) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `editor_status` varchar(20) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `pay_fee` varchar(50) NOT NULL,
  `check_status` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `user_last_response` varchar(50) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question` varchar(2000) DEFAULT NULL,
  `optiona` varchar(1000) DEFAULT NULL,
  `optionb` varchar(1000) DEFAULT NULL,
  `optionc` varchar(1000) DEFAULT NULL,
  `optiond` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `question_type` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `registrar`
--

CREATE TABLE IF NOT EXISTS `registrar` (
  `rid` char(20) NOT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `uid` varchar(50) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `totalQestion` int(11) DEFAULT NULL,
  `correctanswer` int(11) DEFAULT NULL,
  `wronganswer` int(11) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `program` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_score`
--

CREATE TABLE IF NOT EXISTS `set_score` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `takenexam`
--

CREATE TABLE IF NOT EXISTS `takenexam` (
  `uid` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `program` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE IF NOT EXISTS `timer` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(100) DEFAULT NULL,
  `question_type` varchar(20) NOT NULL,
  `hour` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uid` char(20) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(50) NOT NULL,
  `ufname` varchar(50) DEFAULT NULL,
  `umname` varchar(50) DEFAULT NULL,
  `ulname` varchar(50) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `ufname`, `umname`, `ulname`, `sex`, `mobile`, `email`, `photo`, `role`) VALUES
('1111', 'muluye', 'fentie', 'abat', 'm', '67787', 'abe@gmail.com', 'userphoto/m.jpg', 'Exam Editor'),
('1256', 'muluye', 'alemneh', 'Admas', 'm', '5577', 'abe@gmail.com', 'userphoto/m.jpg', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `registrar` (`rid`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`);

--
-- Constraints for table `depthead`
--
ALTER TABLE `depthead`
  ADD CONSTRAINT `depthead_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`);

--
-- Constraints for table `examsetter`
--
ALTER TABLE `examsetter`
  ADD CONSTRAINT `examsetter_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `examsetter` (`sid`);

--
-- Constraints for table `registrar`
--
ALTER TABLE `registrar`
  ADD CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
