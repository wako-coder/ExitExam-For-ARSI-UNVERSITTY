-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 11:46 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bank`;

-- --------------------------------------------------------

--
-- Table structure for table `editor_account`
--

CREATE TABLE IF NOT EXISTS `editor_account` (
  `Ac_ID` int(50) NOT NULL AUTO_INCREMENT,
  `Email_Address` varchar(100) NOT NULL,
  `Phone_Number` int(50) NOT NULL,
  `Account_Number` int(90) NOT NULL,
  `Balance` double NOT NULL,
  `Recieved_Amount` double NOT NULL,
  `Date_of_Recieved` date NOT NULL,
  `Transfered_Amount` double NOT NULL,
  `Date_of_Transfered` date NOT NULL,
  PRIMARY KEY (`Ac_ID`),
  UNIQUE KEY `Account_Number` (`Account_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `editor_account`
--

INSERT INTO `editor_account` (`Ac_ID`, `Email_Address`, `Phone_Number`, `Account_Number`, `Balance`, `Recieved_Amount`, `Date_of_Recieved`, `Transfered_Amount`, `Date_of_Transfered`) VALUES
(7, 'muler@gmail.com', 936343752, 10000, 19600, 50, '0000-00-00', 0, '2018-04-22'),
(9, 'sol@gmail.com', 5677, 300, 500, 200, '0000-00-00', 0, '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `Ac_ID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `Account_Number` int(35) NOT NULL,
  `PIN` int(4) NOT NULL,
  `Balance` double NOT NULL,
  `Transfered_Amount` double NOT NULL,
  `Date_of_Transfered` date NOT NULL,
  `Recieved_Amount` double NOT NULL,
  `Date_of_Recieved` date NOT NULL,
  PRIMARY KEY (`Ac_ID`),
  UNIQUE KEY `Account_Number` (`Account_Number`),
  UNIQUE KEY `Account_Number_2` (`Account_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`Ac_ID`, `FirstName`, `LastName`, `Address`, `Nationality`, `Account_Number`, `PIN`, `Balance`, `Transfered_Amount`, `Date_of_Transfered`, `Recieved_Amount`, `Date_of_Recieved`) VALUES
(12, 'Muluye', 'Fentie', 'DMU', 'Ethiopia', 20000, 0, 300, 200, '2018-04-22', 0, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
