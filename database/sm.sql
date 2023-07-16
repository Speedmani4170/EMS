-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2023 at 02:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('mani95@gmail.com', 'mani1234');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

DROP TABLE IF EXISTS `country_tbl`;
CREATE TABLE IF NOT EXISTS `country_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country_name`) VALUES
(1, 'Afanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andora'),
(5, 'Antigua'),
(6, 'USA'),
(7, 'Africa'),
(8, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

DROP TABLE IF EXISTS `department_tbl`;
CREATE TABLE IF NOT EXISTS `department_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `added_on`) VALUES
(1, 'MARKETING', '2023-03-29 13:49:48'),
(2, 'DEVOPS', '2023-03-29 13:50:02'),
(3, 'UI/UX ', '2023-03-29 13:48:06'),
(4, 'WEB DEVELOPMENT', '2023-03-29 13:48:35'),
(5, 'APP DEVELOPMENT', '2023-03-29 13:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

DROP TABLE IF EXISTS `leave_tbl`;
CREATE TABLE IF NOT EXISTS `leave_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `reason`, `start_date`, `end_date`, `status`, `request_date`) VALUES
(1, 11, 'fever', '2023-04-11', '2023-04-13', 'approved', '2023-04-10'),
(2, 14, 'stress relief', '2023-04-21', '2023-04-23', 'Pending', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

DROP TABLE IF EXISTS `project_tbl`;
CREATE TABLE IF NOT EXISTS `project_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `last_date` date NOT NULL,
  `added_on` date NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_tbl`
--

INSERT INTO `project_tbl` (`id`, `staff_id`, `project_name`, `last_date`, `added_on`, `status`) VALUES
(5, 1, ' advertisement', '2023-04-30', '2023-04-16', 'pending'),
(3, 11, ' sleep', '2023-05-07', '2023-04-13', 'pending'),
(4, 12, ' ai', '2023-06-01', '2023-04-13', 'approved'),
(6, 10, ' ai', '2023-05-04', '2023-04-16', 'pending'),
(7, 10, ' ai', '2023-04-21', '2023-04-16', 'pending'),
(8, 14, ' website creation', '2023-05-07', '2023-04-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

DROP TABLE IF EXISTS `salary_tbl`;
CREATE TABLE IF NOT EXISTS `salary_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `salary_amount` decimal(11,0) NOT NULL,
  `update_by` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `salary_amount`, `update_by`) VALUES
(1, 11, '150000', '2023-04-07'),
(2, 8, '15000', '2023-04-07'),
(3, 11, '20000', '2023-04-07'),
(4, 8, '15000', '2023-04-07'),
(5, 15, '15000', '2023-04-22'),
(6, 11, '25000', '2023-04-22'),
(7, 14, '50000', '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

DROP TABLE IF EXISTS `staff_tbl`;
CREATE TABLE IF NOT EXISTS `staff_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `name`, `gender`, `email`, `mobile`, `dob`, `doj`, `address`, `city`, `state`, `country`, `department`, `picture`) VALUES
(14, 'P.sudalaimani', 'Male', 'mani959750@gmail.com', '8610588081', '2002-01-01', '2023-08-01', '65/46 south street\r\nchettimedu\r\nambai', 'Tirunelveli', 'TamilNadu', '8', '5', '../uploads/b6bda9d4-181c-432d-97a9-6f110667267a.jpg'),
(15, 'govinda', 'Male', 'govinda@gmail.com', '8765432101', '2004-12-27', '2023-05-07', 'iyifwwyreiqwwyrfuwiqwq', 'rtiqywweryieyi', 'tamilnadu', '8', '2', ''),
(16, 'sudalai', 'Male', 'mani95@gmail.com', '6686567686', '2005-02-03', '2023-07-09', 'dddffd,rytyrtyr', 'tenkasi', 'tamilnadu', '8', '1', '../uploads/32840.jpg'),
(11, 'anand audu', 'Male', 'anand@gmail.com', '9843867799', '2002-07-11', '2023-04-05', 'tenkasi', 'tenkasi', 'Tamilnadu', '8', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbln`
--

DROP TABLE IF EXISTS `staff_tbln`;
CREATE TABLE IF NOT EXISTS `staff_tbln` (
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `department` varchar(30) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbln`
--

INSERT INTO `staff_tbln` (`name`, `email`, `phone`, `department`, `Id`) VALUES
('mani', 'mani95@gmail.com', '9843867799', 'it', 1),
('mani001', 'mani95@gmail.com', '8610588081', 'it', 2),
('suresh', 'mani9597@gmail.com', '6666677777', 'sales', 3),
('mani', 'yyrxtatud', '9843867799', 'marketing', 4),
('speed', 'mani959750@gmail.com', '8888899999', 'it', 5),
('mani', 'mani@gmail.com', '9999944444', 'it', 6),
('mani', 'mani876@gmail.com', '9843867788', 'sales', 7),
('sjsgjgjhgAJ', 'SSDADGAJGDJAG', 'JAJDGAJGDJAG', 'marketing', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`) VALUES
('vimal95@gmail.com', 'vimal123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
