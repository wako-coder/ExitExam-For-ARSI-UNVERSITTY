-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 01:31 PM
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
('1256', 'Admin', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'active', 'changed'),
('dept_01', 'dmuithead', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('reg_01', 'dmureg', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('setter_01', 'itsetter', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('TER/4641/08', 'cand_10', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', 'active', 'changed'),
('TER/4642/07', 'cand_11', 'qu53aHiAZZy9VVA6s3XmhP/0OyYOshrqpVrsoEWuf7E=', 'active', 'unchanged'),
('TER/4643/07', 'cand_12', 'iImYGMvYQh+eQBNMG6aULKluLmPGXTIvfGZEWOs0tJI=', 'active', 'unchanged'),
('TER/4644/07', 'cand_13', 'RE5EGuYBpeP0tajwQTv2AowrU9zYfKPum7OXKUJfYOM=', 'active', 'unchanged');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` (`aid`, `status`) VALUES
(37, 'insert'),
(38, 'insert');

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

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `dept`, `colleage`, `unversity`, `rid`, `year`) VALUES
('TER/4641/08', 'Information Technology', 'Technology', 'Debre Markos University', 'reg_01', 2010),
('TER/4642/07', 'Information Technology', 'Technology', 'Debre Markos University', 'reg_01', 2010),
('TER/4643/07', 'Information Technology', 'Technology', 'Debre Markos University', 'reg_01', 2010),
('TER/4644/07', 'Information Technology', 'Technology', 'Debre Markos University', 'reg_01', 2010);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `fname`, `lname`, `Date`, `email`, `content`, `status`) VALUES
(26, '1256', 'muluye', 'alemneh', '2018-05-21', 'abe@gmail.com', 'nn', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `dname` (`dname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `cname`, `dname`) VALUES
(1, 'Technology', 'Information Technology'),
(2, 'Technology', 'Mechanical Enginering'),
(3, 'Business and Economics', 'Management'),
(4, 'Technology', 'Software Engineering '),
(5, 'Agriculture and Natural Resource', 'Plant Science'),
(6, 'Agriculture and Natural Resource', 'Agro Economics');

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

--
-- Dumping data for table `depthead`
--

INSERT INTO `depthead` (`did`, `dept`, `unversity`, `eid`) VALUES
('dept_01', 'Information Technology', 'Debre Markos University', '1111');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`date_id`, `question_type`, `start_date`, `end_date`, `start_time`, `end_time`, `year`) VALUES
(1, 'Regular', '2018-04-23', '2018-06-11', '02:00:00', '12:00:00', 2010),
(2, 'Regular', '2018-04-04', '2018-04-06', '02:00:00', '03:00:00', 2012),
(3, 'Regular', '2018-04-20', '2018-05-21', '02:00:00', '09:00:00', 2011),
(4, 'Regular', '2018-04-03', '2018-04-06', '01:00:00', '01:03:00', 2013),
(5, 'Re_Exam', '2018-05-21', '2018-05-21', '01:00:00', '09:00:00', 2010),
(6, 'Payment', '2018-05-21', '2018-05-24', '02:00:00', '11:00:00', 2010);

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
('90', 'muluken', 'yihun', 'esti', 'm', 1234, 'userphoto/m.jpg', 'mu@gmail.com'),
('editor_01', 'Muluye', 'Fentie', 'Admas', 'm', 2147483647, 'm@gmail.com', 'userphoto/gc.jpg');

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

--
-- Dumping data for table `examsetter`
--

INSERT INTO `examsetter` (`sid`, `dept`, `eid`, `year`) VALUES
('setter_01', 'Information Technology', '1111', 2010),
('setter_02', 'Software Engineering ', '1111', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `exam_passord`
--

CREATE TABLE IF NOT EXISTS `exam_passord` (
  `pw_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`pw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exam_passord`
--

INSERT INTO `exam_passord` (`pw_id`, `password`, `year`) VALUES
(1, 'ff', 34),
(2, 'eeer', 3333);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `logtable`
--

INSERT INTO `logtable` (`lig_id`, `user_id`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(50, '1256', 'Admin', 'Admin', '11:27:16', '11:29:55', '21 May 2018 @ 11:28:58', 'create account', 'created User account Information(userid=dept_01,username=dmuithead,password=r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=,status=active)', '127.0.0.1', '2018-05-21'),
(51, '1256', 'Admin', 'Admin', '11:27:16', '11:29:55', '21 May 2018 @ 11:29:51', 'create account', 'created User account Information(userid=reg_01,username=dmureg,password=r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=,status=active)', '127.0.0.1', '2018-05-21'),
(52, '1256', 'Admin', 'Admin', '11:32:18', '11:34:01', '21 May 2018 @ 11:33:59', 'create account', 'created User account Information(userid=setter_01,username=itsetter,password=r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=,status=active)', '127.0.0.1', '2018-05-21'),
(53, '1256', 'Admin', 'Admin', '05:02:07', '05:07:16', '21 May 2018 @ 05:07:15', 'send comment to exam editor', 'content of comment(nn)', '127.0.0.1', '2018-05-21'),
(54, '1256', 'Admin', 'Candidate', '05:55:21', '05:55:35', '21 May 2018 @ 05:55:33', 'create account', 'created User account Information(userid=TER/4641/08,username=cand_10,password=ZpUt+Mv2QQCxv3x2fWGPbHpgvWncxitxm7kDmRFMgeY=,status=active)', '127.0.0.1', '2018-05-21'),
(55, '1256', 'Admin', 'Candidate', '05:55:21', '05:55:35', '21 May 2018 @ 05:55:33', 'create account', 'created User account Information(userid=TER/4642/07,username=cand_11,password=qu53aHiAZZy9VVA6s3XmhP/0OyYOshrqpVrsoEWuf7E=,status=active)', '127.0.0.1', '2018-05-21'),
(56, '1256', 'Admin', 'Candidate', '05:55:21', '05:55:35', '21 May 2018 @ 05:55:33', 'create account', 'created User account Information(userid=TER/4643/07,username=cand_12,password=iImYGMvYQh+eQBNMG6aULKluLmPGXTIvfGZEWOs0tJI=,status=active)', '127.0.0.1', '2018-05-21'),
(57, '1256', 'Admin', 'Candidate', '05:55:21', '05:55:35', '21 May 2018 @ 05:55:33', 'create account', 'created User account Information(userid=TER/4644/07,username=cand_13,password=RE5EGuYBpeP0tajwQTv2AowrU9zYfKPum7OXKUJfYOM=,status=active)', '127.0.0.1', '2018-05-21'),
(58, 'TER/4641/08', 'cand_10', 'Candidate', '07:05:48', '07:10:41', '21 May 2018 @ 07:06:51', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21'),
(59, 'TER/4641/08', 'cand_10', 'Candidate', '07:11:23', '07:23:37', '21 May 2018 @ 07:11:45', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21'),
(60, 'TER/4641/08', 'cand_10', 'Candidate', '07:11:23', '07:23:37', '21 May 2018 @ 07:13:30', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21'),
(61, 'TER/4641/08', 'cand_10', 'Candidate', '07:11:23', '07:23:37', '21 May 2018 @ 07:16:34', 'Request', 'Candidate Send Requuest To Exaam Editor\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,,Year:2010,Content:hjkkhhj]', '127.0.0.1', '2018-05-21'),
(62, 'TER/4641/08', 'cand_10', 'Candidate', '07:23:44', '07:28:25', '21 May 2018 @ 07:27:21', 'Request', 'Candidate Send Requuest To Exaam Editor\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,,Year:2010,Content:ty]', '127.0.0.1', '2018-05-21'),
(63, 'TER/4641/08', 'cand_10', 'Candidate', '07:35:11', 'empty', '21 May 2018 @ 07:36:35', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21'),
(64, 'TER/4641/08', 'cand_10', 'Candidate', '07:35:11', 'empty', '21 May 2018 @ 07:40:39', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21'),
(65, 'TER/4641/08', 'cand_10', 'Candidate', '07:35:11', 'empty', '21 May 2018 @ 07:43:58', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:TER/4641/08,Department:Information Technology,University:Debre Markos University,Year:2010]', '127.0.0.1', '2018-05-21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`request_id`, `uid`, `dept`, `unvisersity`, `resean`, `year`, `dates`, `editor_status`, `user_status`, `pay_fee`, `check_status`, `image`, `user_last_response`) VALUES
(21, 'TER/4641/08', 'Information Technology', 'Debre Markos University', 'ty', '2010', '2018-05-21', 'read', 'read', 'Yes', 'Yes', '../editor/Bank_Receipt/mf.jpg', 'Yes');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `year`, `dept`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`, `question_type`, `status`, `sid`) VALUES
(1, 2010, 'Information Technology', 'Which one is different?', 'Economics', 'Computer science', 'Information system', 'Information Technology', 'A', 'Regular', 'active', 'setter_01'),
(2, 2010, 'Information Technology', 'which one is not the componenet of Database?', 'Hardware', 'Designer', 'Software', 'None', 'D', 'Re_Exam', 'active', 'setter_01'),
(3, 2010, 'Information Technology', 'How many bits make a byte?', '8 bits', '16 bits', '4 bits', '2 bits', 'A', 'Regular', 'active', 'setter_01'),
(4, 2010, 'Information Technology', 'What is the meaning of (CPU)?', 'Central Processing Unit', 'Crucial Processing Unit', 'Critical Processing Unit.', 'Central Printing Unit', 'A', 'Regular', 'active', 'setter_01'),
(5, 2010, 'Information Technology', 'The process of starting or restarting a computer is called: ', ' Booting', 'Start up point', 'Connecting ', 'Resetting', 'A', 'Regular', 'active', 'setter_01'),
(6, 2010, 'Information Technology', 'Which of the items is an input device?', 'Keyboard', 'Display Board', 'Computer Monitor', 'Overhead Projector', 'A', 'Regular', 'active', 'setter_01'),
(7, 2010, 'Information Technology', 'HTTP stand for _______.', 'Hyper Transport Text Protocol', 'High Text Transport Protocol', 'High Transport Text Protocol', 'Hyper Text Transport Protocol', 'D', 'Regular', 'active', 'setter_01'),
(8, 2010, 'Information Technology', 'A program in which you do your work', 'Application', 'PC', 'CPU', 'None', 'A', 'Re_Exam', 'active', 'setter_01'),
(9, 2010, 'Information Technology', 'copy of a file or disk you make for archiving purposes', 'Backup', 'Save', 'Restore', 'Save as', 'A', 'Re_Exam', 'active', 'setter_01'),
(10, 2010, 'Information Technology', 'a programming error that causes a program to behave in an unexpected way', 'Bug', 'Byte', 'Shut down', 'All', 'A', 'Re_Exam', 'active', 'setter_01'),
(11, 2010, 'Information Technology', 'What is ISP and what is their functions?', 'A company which provide internet connection to other people for a fee.', 'A company provide internal connection to transfer data between two company.', 'A company which provide internet connection for a fee.', 'A company which provide internet connection to other people for a fee.', 'A', 'Re_Exam', 'active', 'setter_01'),
(12, 2010, 'Information Technology', 'program that allows you to change settings in a program or change the way a computer looks and/or behaves', 'Operating system', 'Software', 'Control panel', 'Hardware', 'C', 'Re_Exam', 'active', 'setter_01'),
(13, 2010, 'Information Technology', 'Central Processing Unit. The processing chip that is the "brain" of a computer', 'Operating System', 'RAM', 'CPU', 'ROM', 'C', 'Re_Exam', 'active', 'setter_01'),
(14, 2010, 'Information Technology', 'the system software that controls the computerthe system software that controls the computer', 'Control panel', 'Software', 'Operating software', 'None', 'C', 'Re_Exam', 'active', 'setter_01');

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

--
-- Dumping data for table `registrar`
--

INSERT INTO `registrar` (`rid`, `unversity`, `eid`) VALUES
('reg_01', 'Debre Markos University', '1111');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `set_score`
--

INSERT INTO `set_score` (`score_id`, `dept`, `score`, `year`) VALUES
(7, 'Information Technology', 55, '2010');

-- --------------------------------------------------------

--
-- Table structure for table `takenexam`
--

CREATE TABLE IF NOT EXISTS `takenexam` (
  `uid` varchar(50) NOT NULL,
  `program` varchar(20) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`tid`, `dept`, `question_type`, `hour`, `min`, `year`) VALUES
(6, 'Information Technology', 'Regular', 0, 2, 2010),
(7, 'Information Technology', 'Re_Exam', 1, 2, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
(2, 'Addis Ababa University'),
(3, 'Bahir Dar University'),
(1, 'Debre Markos University'),
(4, 'Hawassa University');

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
('1256', 'muluye', 'alemneh', 'Admas', 'm', '5577', 'abe@gmail.com', 'userphoto/m.jpg', 'Admin'),
('dept_01', 'Nardos', 'Fentie', 'Admas', 'f', '+251936343712', 'na@gmail.com', 'userphoto/nardi.jpg', 'Department Head'),
('editor_01', 'Muluye', 'Fentie', 'Admas', 'm', '+251936343752', 'm@gmail.com', 'userphoto/mf.jpg', 'Exam Editor'),
('reg_01', 'Ayana', 'Muler', 'Abate', 'm', '+25193634372', 'mu@gmail.com', 'userphoto/mf.jpg', 'Registrar'),
('setter_01', 'Abebew', 'Addiss', 'Abebe', 'm', '+251936343752', 'abex@gmail.com', 'userphoto/mf.jpg', 'Exam setter'),
('setter_02', 'Ayana', 'Genet', 'Abate', 'm', '+251936343750', 'ayu@gmail.com', 'userphoto/IMG_20171030_113851.jpg', 'Exam setter'),
('TER/4641/08', 'Abeba', 'Addiss', 'Alemu', 'f', ' ', ' ', ' ', 'Candidate'),
('TER/4642/07', 'Abel ', 'Negash', 'Girum', 'f', ' ', ' ', ' ', 'Candidate'),
('TER/4643/07', 'Alemitu', 'Getachew', 'Admas', 'f', ' ', ' ', ' ', 'Candidate'),
('TER/4644/07', 'Awoke', 'Kerebih', 'Abebe', 'm', ' ', ' ', ' ', 'Candidate');

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
