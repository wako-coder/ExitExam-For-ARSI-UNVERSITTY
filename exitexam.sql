-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 09:14 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `password_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `username`, `password`, `status`, `password_status`) VALUES
('admin_01', 'Admin', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('editor_01', 'editor', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('head_01', 'dmuit_head', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('head_02', 'dmusw_head', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('HO_setter01', 'hosetter', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('mekhohead', 'mkho_head', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('mekrreg_01', 'meku_reg', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('R/4641/08', 'cand_10_R/4641/08', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('R/4642/07', 'cand_11_R/4642/07', 'j+6Wm/l9I8kag3FAa+GEeg7QJj/6NVFKnUA6OVYp26g=', 'active', 'unchanged'),
('R/4643/07', 'cand_12_R/4643/07', 'Z+54dthkV0V3P9VNwkyHa8Dy1VcCxAcH29/7JGqQl3s=', 'active', 'unchanged'),
('R/4644/07', 'cand_13_R/4644/07', 'P678gzbMEdzcLRsDAUZkrXIuq+9DnQeUWEZdyLYRv7k=', 'active', 'unchanged'),
('reg_01', 'abenireg', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('reg_02', 'bdureg', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'active', 'unchanged'),
('setter_01', 'itsetter', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('setter_02', 'sw_setter', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('setter_03', 'plant_setter', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'active', 'unchanged'),
('TER/4641/08', 'cand_10_TER/4641/08', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'inactive', 'changed'),
('TER/4642/08', 'cand_11_TER/4642/08', 'Hxmo+JMghveLuUqFAbr5jjUDMUzFUZfSDURCXIYM3Do=', 'inactive', 'unchanged'),
('TER/4643/08', 'cand_12_TER/4643/08', 'gM9usieQ5RQ50bfz1P43hHqGYT3Y4/o/nsSsevPAtOU=', 'inactive', 'unchanged'),
('TER/4644/08', 'cand_13_TER/4644/08', '9rPzaUvg3HA9VskEU9Hkz27u8LcJKSbNWmdlU4QG4Nc=', 'inactive', 'unchanged'),
('TER/4645/08', 'cand_14_TER/4645/08', 'zNf90V2yLO0JO2fnkb2drrFzeHwAgejb6y59t2TwoKo=', 'inactive', 'unchanged'),
('TER/4682/07', 'cand_10', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('TER/4683/08', 'cand_11', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `at_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `cid` varchar(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `colleage` varchar(50) DEFAULT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `rid` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `dept`, `colleage`, `unversity`, `rid`, `year`) VALUES
('R/4641/08', 'HO', 'Health Science', 'Mekelle University', 'mekrreg_01', 2022),
('R/4642/07', 'HO', 'Health Science', 'Mekelle University', 'mekrreg_01', 2022),
('R/4643/07', 'HO', 'Health Science', 'Mekelle University', 'mekrreg_01', 2022),
('R/4644/07', 'HO', 'Health Science', 'Mekelle University', 'mekrreg_01', 2022),
('TER/4641/08', 'Software Engineering ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4642/08', 'Software Engineering ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4643/08', 'Software Engineering ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4644/08', 'Software Engineering ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4645/08', 'Software Engineering ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4682/07', 'Information Technology ', 'Technology', 'Debre Markos University', 'reg_01', 2022),
('TER/4683/08', 'Information Technology ', 'Technology', 'Debre Markos University', 'reg_01', 2022);

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
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `fname`, `lname`, `Date`, `email`, `content`, `status`) VALUES
(22, 'TER/4682/07', 'Muluye', 'Fentie', '2018-05-24', 'ma@gmail.com', 'rre', 'unread'),
(23, 'admin_01', 'Mulur', 'Fentie', '2022-06-07', 'mf@gmail.com', '1234567asdfgh', 'unread'),
(24, 'TER/4682/07', 'Muluye', 'Fentie', '2022-06-07', 'ma@gmail.com', 'qwsxdfcvllughc', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `did` varchar(50) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `cname`, `dname`, `uid`) VALUES
('D01', 'Technology', 'Information Technology ', 'U01'),
('D02', 'Technology', 'Software Engineering ', 'U01'),
('D03', 'Agriculture and Natural Resource', 'Plant Science', 'U01'),
('D04', 'Agriculture and Natural Resource', 'Animal Science', 'U01'),
('D05', 'Health Science', 'Nursing', 'U01'),
('D06', 'Technology', 'Information Technology ', 'U02'),
('D07', 'Agriculture and Natural Resource', 'Plant Science', 'U02'),
('D08', 'Technology', 'Information Technology', 'U04'),
('D09', 'Health Science', 'Nursing', 'U04'),
('D10', 'Health Science', 'HO', 'U04'),
('D11', 'Natural and Computational Sc', 'Computer Science', 'U05');

-- --------------------------------------------------------

--
-- Table structure for table `depthead`
--

CREATE TABLE IF NOT EXISTS `depthead` (
  `did` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depthead`
--

INSERT INTO `depthead` (`did`, `dname`, `uid`, `eid`) VALUES
('head_01', 'Information Technology ', 'U01', 'editor_01'),
('head_02', 'Software Engineering ', 'U01', 'editor_01'),
('mekhohead', 'HO', 'U04', 'editor_01');

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE IF NOT EXISTS `examdate` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`date_id`, `question_type`, `start_date`, `end_date`, `start_time`, `end_time`, `year`) VALUES
(1, 'Regular', '2022-06-07', '2022-06-29', '09:05:00', '12:59:00', 2022),
(2, 'Re_Exam', '2022-06-07', '2022-06-10', '10:32:00', '11:10:00', 2022),
(3, 'Payment', '2022-06-07', '2022-06-09', '10:25:00', '11:00:00', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `exameditor`
--

CREATE TABLE IF NOT EXISTS `exameditor` (
  `eid` varchar(30) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exameditor`
--

INSERT INTO `exameditor` (`eid`) VALUES
('editor_01');

-- --------------------------------------------------------

--
-- Table structure for table `examsetter`
--

CREATE TABLE IF NOT EXISTS `examsetter` (
  `sid` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `dname` (`dname`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examsetter`
--

INSERT INTO `examsetter` (`sid`, `dname`, `eid`, `year`) VALUES
('HO_setter01', 'HO', 'editor_01', 2022),
('setter_01', 'Information Technology ', 'editor_01', 2022),
('setter_02', 'Software Engineering ', 'editor_01', 2022),
('setter_03', 'Plant Science', 'editor_01', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `exam_passord`
--

CREATE TABLE IF NOT EXISTS `exam_passord` (
  `pw_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`pw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `exam_passord`
--

INSERT INTO `exam_passord` (`pw_id`, `password`, `year`) VALUES
(2, 'abebe', 2022),
(3, 'ddd', 2222);

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

CREATE TABLE IF NOT EXISTS `logtable` (
  `lig_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `login_time` varchar(50) DEFAULT NULL,
  `logout_time` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_performed` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`lig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `logtable`
--

INSERT INTO `logtable` (`lig_id`, `user_id`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(84, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '04:11:51', '11:59:16', '30 Apr 2022 @ 04:16:41', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-04-30'),
(85, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '04:11:51', '11:59:16', '30 Apr 2022 @ 04:24:43', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-04-30'),
(86, 'admin_01', 'Admin', 'Admin', '10:13:43', 'empty', '06 May 2022 @ 11:56:01', 'Backup database', 'Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup', '::1', '2022-05-06'),
(87, 'admin_01', 'Admin', 'Admin', '10:13:43', 'empty', '06 May 2022 @ 11:57:23', 'Backup database', 'Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup', '::1', '2022-05-06'),
(88, 'admin_01', 'Admin', 'Admin', '10:13:43', '12:06:34', '07 May 2022 @ 12:01:29', 'Restore database ', 'Admin restore database from  path= C:/wamp/www/WBGEE/admin/backup.sql', '::1', '2022-05-07'),
(89, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '09:46:58', '09:18:38', '12 May 2022 @ 07:57:59', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-12'),
(90, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '09:46:58', '09:18:38', '12 May 2022 @ 08:07:40', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-12'),
(91, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '09:46:58', '09:18:38', '12 May 2022 @ 08:40:33', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-12'),
(92, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '09:46:58', '09:18:38', '12 May 2022 @ 08:46:15', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-12'),
(93, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 02:33:48', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(94, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 02:41:06', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(95, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 09:13:59', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(96, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 10:11:33', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(97, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 10:58:56', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(98, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', 'empty', '15 May 2022 @ 11:17:59', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-15'),
(99, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:46:49', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(100, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:50:37', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(101, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:51:47', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(102, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:53:01', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(103, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:53:58', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(104, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:55:38', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(105, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:57:10', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(106, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:57:37', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(107, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:58:03', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(108, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:59:01', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(109, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:59:24', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(110, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 07:59:44', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(111, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 08:00:54', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(112, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 08:01:12', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(113, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '02:25:20', '09:53:47', '16 May 2022 @ 08:05:31', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(114, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '11:05:35', 'empty', '16 May 2022 @ 11:07:13', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(115, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '11:05:35', 'empty', '16 May 2022 @ 11:08:20', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(116, 'R/4641/08', 'cand_10_R/4641/08', 'Candidate', '11:05:35', 'empty', '16 May 2022 @ 11:09:39', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:R/4641/08,Department:HO,University:Mekelle University,Year:2010]', '::1', '2022-05-16'),
(117, 'TER/4682/07', 'cand_10', 'Candidate', '09:04:43', '09:08:50', '07 Jun 2022 @ 09:06:40', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(118, 'TER/4682/07', 'cand_10', 'Candidate', '09:04:43', '09:08:50', '07 Jun 2022 @ 09:06:49', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4682/07,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(119, 'admin_01', 'Admin', 'Admin', '09:17:27', '09:26:14', '07 Jun 2022 @ 09:18:04', 'View Total Report', 'View Report Of <br>Total candidate Who taken Exit Exam(Female=1,Male=0,total=1),Result(Competent=1,Total Non Competent=0,Total=1)', '::1', '2022-06-07'),
(120, 'admin_01', 'Admin', 'Admin', '09:46:18', '09:55:30', '07 Jun 2022 @ 09:48:53', 'send comment to exam editor', 'content of comment(1234567asdfgh)', '::1', '2022-06-07'),
(121, 'admin_01', 'Admin', 'Admin', '09:46:18', '09:55:30', '07 Jun 2022 @ 09:53:00', 'Backup database', 'Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup', '::1', '2022-06-07'),
(122, 'admin_01', 'Admin', 'Admin', '09:46:18', '09:55:30', '07 Jun 2022 @ 09:54:21', 'View Total Report', 'View Report Of <br>Total candidate Who taken Exit Exam(Female=1,Male=0,total=1),Result(Competent=1,Total Non Competent=0,Total=1)', '::1', '2022-06-07'),
(123, 'TER/4682/07', 'cand_10', 'Candidate', '10:13:37', '10:15:59', '07 Jun 2022 @ 10:13:56', 'send comment to exam editor', 'content of comment(qwsxdfcvllughc)', '::1', '2022-06-07'),
(124, 'TER/4683/08', 'cand_11', 'Candidate', '10:17:28', '10:23:53', '07 Jun 2022 @ 10:19:49', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(125, 'TER/4683/08', 'cand_11', 'Candidate', '10:17:28', '10:23:53', '07 Jun 2022 @ 10:23:41', 'Request', 'Candidate Send Requuest To Exam Editor\r\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,,Year:2010,Content:pls help me]', '::1', '2022-06-07'),
(126, 'TER/4683/08', 'cand_11', 'Candidate', '10:28:31', '09:17:35', '07 Jun 2022 @ 10:34:27', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(127, 'TER/4683/08', 'cand_11', 'Candidate', '10:28:31', '09:17:35', '07 Jun 2022 @ 10:34:43', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(128, 'TER/4683/08', 'cand_11', 'Candidate', '10:28:31', '09:17:35', '07 Jun 2022 @ 10:38:46', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4683/08,Department:Information Technology ,University:Debre Markos University,Year:2010]', '::1', '2022-06-07'),
(129, 'admin_01', 'Admin', 'Admin', '09:51:55', '09:57:50', '07 Jun 2022 @ 09:52:12', 'Backup database', 'Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup', '::1', '2022-06-07'),
(130, 'admin_01', 'Admin', 'Admin', '09:51:55', '09:57:50', '07 Jun 2022 @ 09:54:02', 'Backup database', 'Admin take backup database to path= C:/xamp/www/WBGEE/admin/backup', '::1', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `matching`
--

CREATE TABLE IF NOT EXISTS `matching` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question1` varchar(2000) DEFAULT NULL,
  `question2` varchar(2000) DEFAULT NULL,
  `question3` varchar(2000) DEFAULT NULL,
  `question4` varchar(2000) DEFAULT NULL,
  `question5` varchar(2000) DEFAULT NULL,
  `optiona` varchar(1000) DEFAULT NULL,
  `optionb` varchar(1000) DEFAULT NULL,
  `optionc` varchar(1000) DEFAULT NULL,
  `optiond` varchar(1000) DEFAULT NULL,
  `optione` varchar(1000) DEFAULT NULL,
  `optionf` varchar(1000) DEFAULT NULL,
  `optiong` varchar(1000) DEFAULT NULL,
  `optionh` varchar(1000) DEFAULT NULL,
  `answer1` varchar(1000) DEFAULT NULL,
  `answer2` varchar(1000) DEFAULT NULL,
  `answer3` varchar(1000) DEFAULT NULL,
  `answer4` varchar(1000) DEFAULT NULL,
  `answer5` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `matching`
--

INSERT INTO `matching` (`qid`, `year`, `dept`, `question1`, `question2`, `question3`, `question4`, `question5`, `optiona`, `optionb`, `optionc`, `optiond`, `optione`, `optionf`, `optiong`, `optionh`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `status`, `question_type`, `sid`) VALUES
(3, 2010, 'Information Technology ', '111', '22', '33', '44', '55', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'A', 'B', 'C', 'D', 'E', 'Regular', 'active', 'setter_01');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `notice_number` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Content` varchar(2000) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`notice_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_number`, `status`, `title`, `Dates`, `Ex_Dates`, `Content`, `sender`) VALUES
(1, 'regular', 'Title', '2018-05-24', '2018-06-25', 'Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully"', 'Exam Editor'),
(2, 'reexam', 'Computer', '2018-05-24', '2018-06-26', 'Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully"', 'Exam Editor'),
(3, 'regular', 'About ExitExam', '2018-05-26', '2018-05-27', 'Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully"', 'Exam Editor'),
(4, 'regular', 'About ExitExam', '2018-05-26', '2018-05-29', 'Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully"', 'Exam Editor'),
(5, 'reexam', 'About ExitExam', '2018-05-26', '2018-05-30', 'Before update or editing the Exam setter profile,Frist you must expected to know the ID number of the registerd examsetter .After that we can edit/update the profile by enter the ID number of the Examsetternder below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully"', 'Exam Editor'),
(6, 'regular', 'Exit Exam', '2018-05-31', '2018-06-02', 'exit exam at national level given to candidate from 24/09/2010 up to 25/09/2010 E,C', 'Exam Editor'),
(7, 'regular', 'Wel come', '2022-06-07', '2022-06-08', 'Selam All', 'Exam Editor');

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
  `year` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `editor_status` varchar(20) DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `pay_fee` varchar(20) DEFAULT NULL,
  `check_status` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user_last_response` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`request_id`, `uid`, `dept`, `unvisersity`, `resean`, `year`, `dates`, `editor_status`, `user_status`, `pay_fee`, `check_status`, `image`, `user_last_response`) VALUES
(1, 'TER/4683/08', 'Information Technology ', 'Debre Markos University', 'pls help me', 2022, '2022-06-07', 'read', 'read', 'Yes', 'Yes', '../editor/Bank_Receipt/IMG_20220313_140542.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question` varchar(767) DEFAULT NULL,
  `optiona` varchar(1000) DEFAULT NULL,
  `optionb` varchar(1000) DEFAULT NULL,
  `optionc` varchar(1000) DEFAULT NULL,
  `optiond` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  UNIQUE KEY `question` (`question`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `year`, `dept`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`, `question_type`, `status`, `sid`) VALUES
(1, 2010, 'Information Technology ', 'Which of the following is not an output device?', 'Keyboard', 'Monitor', 'printer', 'speaker', 'A', 'Regular', 'active', 'setter_01'),
(2, 2010, 'Information Technology ', 'Which of the following represents one billion characters?', 'Byte', 'Gigabyte', 'Kilobyte', 'Megabyte', 'B', 'Regular', 'active', 'setter_01'),
(3, 2010, 'Information Technology ', 'Which of the following is not a version of the Windows operating system software for the PC?', '98 and 95', 'Linux', 'ME', 'XP', 'B', 'Regular', 'active', 'setter_01'),
(4, 2010, 'Information Technology ', 'How many bits make a byte?', '16 bits', '8 bits', '4 bits', '24 bits', 'B', 'Regular', 'active', 'setter_01'),
(5, 2010, 'Information Technology ', 'What is the meaning of (CPU)?', 'Central Processing Unit', 'Critical Processing Unit', 'Crucial Processing Unit', 'Central Printing Unit', 'A', 'Re_Exam', 'active', 'setter_01'),
(6, 2010, 'Information Technology ', 'The process of starting or restarting a computer is called:', 'booting', 'Start up point', 'Connecting', 'Resetting', 'B', 'Re_Exam', 'active', 'setter_01'),
(7, 2010, 'Software Engineering ', 'RAD stands for__________', 'Relative Application Development', 'Rapid Application Development', 'Rapid Application Document', 'None of the mentioned', 'B', 'Regular', 'active', 'setter_02'),
(8, 2010, 'Software Engineering ', 'What is the major drawback of using RAD Model?', 'Highly specialized & skilled developers/designers are required', 'Increases re-usability of components', 'Encourages customer/client feedback', 'Increases re-usability of components, Highly specialized & skilled developers/designers are required', 'D', 'Regular', 'active', 'setter_02'),
(9, 2010, 'Software Engineering ', 'SDLC stands for_________', 'Software Development Life Cycle', 'System Development Life cycle', 'Software Design Life Cycle', 'System Design Life Cycle', 'A', 'Regular', 'active', 'setter_02'),
(10, 2010, 'Software Engineering ', 'Which model can be selected if user is involved in all the phases of SDLC?', 'Waterfall Model', 'Prototyping Model', 'RAD Model', 'Prototyping Model & RAD Model', 'C', 'Regular', 'active', 'setter_02'),
(11, 2010, 'Software Engineering ', 'Which one of the following is not a phase of Prototyping Model?', 'Quick Design', 'Coding', 'Prototype Refinement', 'Engineer Product', 'B', 'Regular', 'active', 'setter_02'),
(12, 2010, 'Software Engineering ', 'Production support is the main feature of ---------', 'Maintenance', 'Waterfal', 'Incremental', 'Itrative', 'A', 'Re_Exam', 'active', 'setter_02'),
(13, 2010, 'Software Engineering ', 'Name the stages that SDLC covers in s/w development', 'Requirements, design, testing, coding', 'Requirements, design, testing, coding and maintenance', 'Design, testing, coding and maintenance', 'None', 'C', 'Re_Exam', 'active', 'setter_02'),
(14, 2010, 'Software Engineering ', 'Which of these are characteristics of a strong design?', 'Low Coupling', 'Modular', 'High Cohesion', 'None', 'D', 'Re_Exam', 'active', 'setter_02'),
(15, 2010, 'HO', 'what AIDS', 'AIDS', 'AIDS1', 'HIV', 'AIDS1', 'A', 'Regular', 'active', 'HO_setter01'),
(16, 2010, 'HO', 'The six components of wellness include physical, emotional, intellectual, ____________________.', 'spiritual, social, and environmental health', 'spiritual, medical, and environmental health', 'social, educational, and environmental health', 'endurance, flexibility, and body composition', 'A', 'Regular', 'active', 'HO_setter01'),
(17, 2010, 'HO', 'The state of healthy living achieved by the practice of a healthy lifestyle is known as', 'Health', 'fitness', 'wellness', 'A component of social health', 'A', 'Regular', 'active', 'HO_setter01'),
(18, 2010, 'HO', 'Cardiovascular disease is', 'Any disease of the internal organs', 'Any disease of the respiratory system', '	Any disease of the heart and blood vessels', 'Characterized by high blood glucose levels    ', 'B', 'Re_Exam', 'active', 'HO_setter01'),
(19, 2010, 'HO', '______ is a component of physical fitness.', 'Muscular strength', 'sleep', 'Nutrition', 'Appearance', 'A', 'Re_Exam', 'active', 'HO_setter01'),
(20, 2010, 'HO', 'The amount of body fat and lean tissue in your body is known as', 'Nutrition', 'Muscular strength 	', 'Body composition', 'Wellness', 'B', 'Re_Exam', 'active', 'HO_setter01');

-- --------------------------------------------------------

--
-- Table structure for table `registrar`
--

CREATE TABLE IF NOT EXISTS `registrar` (
  `rid` varchar(20) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `eid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `uid` (`uid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrar`
--

INSERT INTO `registrar` (`rid`, `uid`, `eid`) VALUES
('mekrreg_01', 'U04', 'editor_01'),
('reg_01', 'U01', 'editor_01'),
('reg_02', 'U03', 'editor_01');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `uid` varchar(50) NOT NULL,
  `totalQestion` int(11) DEFAULT NULL,
  `correctanswer` int(11) DEFAULT NULL,
  `wronganswer` int(11) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`uid`, `totalQestion`, `correctanswer`, `wronganswer`, `total`, `status`, `program`) VALUES
('R/4641/08', 8, 6, 2, '75%', 'Competent', 'Regular'),
('TER/4683/08', 2, 0, 2, '0%', 'Not Competent', 'Re_Exam');

-- --------------------------------------------------------

--
-- Table structure for table `set_score`
--

CREATE TABLE IF NOT EXISTS `set_score` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `set_score`
--

INSERT INTO `set_score` (`score_id`, `dept`, `score`, `year`) VALUES
(1, 'Information Technology ', 50, 2022),
(2, 'Software Engineering ', 50, 2022),
(3, 'Plant Science', 50, 2022),
(4, 'Animal Science', 50, 2022),
(5, 'Nursing', 50, 2022),
(6, 'HO', 50, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `takenexam`
--

CREATE TABLE IF NOT EXISTS `takenexam` (
  `uid` varchar(50) NOT NULL,
  `program` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takenexam`
--

INSERT INTO `takenexam` (`uid`, `program`) VALUES
('R/4641/08', 'Regular'),
('TER/4682/07', 'Regular'),
('TER/4683/08', 'Re_Exam');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE IF NOT EXISTS `timer` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(20) DEFAULT NULL,
  `dept` varchar(50) NOT NULL,
  `hour` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`tid`, `question_type`, `dept`, `hour`, `min`, `year`) VALUES
(1, 'Re_Exam', 'Information Technology ', 0, 2, 2022),
(2, 'Regular', 'Information Technology ', 0, 2, 2022),
(3, 'Regular', 'Software Engineering ', 0, 2, 2022),
(4, 'Re_Exam', 'Software Engineering ', 0, 2, 2022),
(5, 'Re_Exam', 'HO', 0, 2, 2022),
(6, 'Regular', 'HO', 0, 2, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
('U02', 'Addiss Abeba  University'),
('U05', 'Arsi University '),
('U03', 'Bahir Dar University'),
('U01', 'Debre Markos University'),
('U04', 'Mekelle University');

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
('admin_01', 'Usman', 'Ahimed', 'Ali', 'm', '0942426150', 'usman@gmail.com', 'userphoto/usman1.jpg', 'Admin'),
('editor_01', 'Dejane ', 'Abera', 'Petros', 'm', '0913344476', 'Deje@gmail.com', 'userphoto/nardi.jpg', 'Exam Editor'),
('head_01', 'Abenezer', 'Godana', 'Gonta', 'm', '0902280858', 'abeni@gmail.com', 'userphoto/Hydrangeas.jpg', 'Department Head'),
('head_02', 'Abeni', 'Godana', 'Gonta', 'm', '0902280858', 'abeni@gmail.com', 'userphoto/IMG_20180417_091921.jpg', 'Department Head'),
('HO_setter01', 'Deje', 'Abera', 'Petros', 'm', '0913344476', 'ho@gmail.com', 'userphoto/Hydrangeas.jpg', 'Exam setter'),
('mekhohead', 'Dame ', 'Getachew', 'Gobana', 'DM', '0936345237', 'ho@gmail.com', 'userphoto/Tulips.jpg', 'Department Head'),
('mekrreg_01', 'Usman', 'Ahimed', 'Ali', 'm', '0942426150', 'ho@gmail.com', 'userphoto/Tulips.jpg', 'Registrar'),
('R/4641/08', 'Abebaw', 'Addiss', 'Tafere', 'f', ' ', ' ', ' ', 'Candidate'),
('R/4642/07', 'Abel ', 'Negash', 'Girum', 'm', ' ', ' ', ' ', 'Candidate'),
('R/4643/07', 'Abayneh', 'Argachew', 'Admas', 'm', ' ', ' ', ' ', 'Candidate'),
('R/4644/07', 'Awoke', 'Kerebih', 'Abebe', 'm', ' ', ' ', ' ', 'Candidate'),
('reg_01', 'Abenezer', 'Godana', 'Gonta', 'm', '0902280858', 'abeni@gmail.com', 'userphoto/Hydrangeas.jpg', 'Registrar'),
('reg_02', 'Memar', 'Solomon', 'Yihun', 'm', '0936343752', 'ma@gmail.com', 'userphoto/Chrysanthemum.jpg', 'Registrar'),
('setter_01', 'Usman', 'Ahimed', 'Ali', 'm', '0942426150', 'usa@gmail.com', 'userphoto/nardi.jpg', 'Exam setter'),
('setter_02', 'Muluye', 'Fentie', 'Admas', 'm', '0936343523', 'mf@gmail.com', 'userphoto/mf.jpg', 'Exam setter'),
('setter_03', 'Memar', 'Alemayehu', 'Admas', 'm', '0936343712', 'ma@gmail.com', 'userphoto/Hydrangeas.jpg', 'Exam setter'),
('setter_04', 'Usman', 'Ahimed', 'Ali', 'm', '0942426150', 'usman@gmail.com', 'userphoto/1650108638029.jpg', 'Exam setter'),
('TER/4641/08', 'Abebaw', 'Addiss', 'Tafere', 'f', ' ', ' ', ' ', 'Candidate'),
('TER/4642/08', 'Abel ', 'Negash', 'Girum', 'm', ' ', ' ', ' ', 'Candidate'),
('TER/4643/08', 'Abayneh', 'Argachew', 'Admas', 'm', ' ', ' ', ' ', 'Candidate'),
('TER/4644/08', 'Awoke', 'Kerebih', 'Abebe', 'm', ' ', ' ', ' ', 'Candidate'),
('TER/4645/08', 'Binalf', 'Debas', 'yihun', 'f', ' ', ' ', ' ', 'Candidate'),
('TER/4682/07', 'Muluye', 'Fentie', 'Admas', 'm', '0936343712', 'ma@gmail.com', 'userphoto/mf.jpg', 'Candidate'),
('TER/4683/08', 'Eden', 'Bogala', 'AB', 'F', '0972973205', 'AB@gmail.com', 'userphoto/Hydrangeas.jpg', 'Candidate');

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
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `registrar` (`rid`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `university` (`uid`);

--
-- Constraints for table `depthead`
--
ALTER TABLE `depthead`
  ADD CONSTRAINT `depthead_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  ADD CONSTRAINT `depthead_ibfk_2` FOREIGN KEY (`did`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `depthead_ibfk_3` FOREIGN KEY (`did`) REFERENCES `user` (`uid`);

--
-- Constraints for table `exameditor`
--
ALTER TABLE `exameditor`
  ADD CONSTRAINT `exameditor_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `examsetter`
--
ALTER TABLE `examsetter`
  ADD CONSTRAINT `examsetter_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  ADD CONSTRAINT `examsetter_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `matching`
--
ALTER TABLE `matching`
  ADD CONSTRAINT `matching_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `examsetter` (`sid`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `examsetter` (`sid`);

--
-- Constraints for table `registrar`
--
ALTER TABLE `registrar`
  ADD CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exameditor` (`eid`),
  ADD CONSTRAINT `registrar_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `takenexam` (`uid`);

--
-- Constraints for table `takenexam`
--
ALTER TABLE `takenexam`
  ADD CONSTRAINT `takenexam_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `candidate` (`cid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
