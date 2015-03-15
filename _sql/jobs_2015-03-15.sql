-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2015 at 02:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tj_administrators`
--

CREATE TABLE IF NOT EXISTS `tj_administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `verifi_code` int(11) NOT NULL,
  `verifi_exp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tj_categories`
--

CREATE TABLE IF NOT EXISTS `tj_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tj_categories`
--

INSERT INTO `tj_categories` (`id`, `name`, `description`, `parent`, `status`) VALUES
(1, 'Information Technology', '', 0, 0),
(18, 'Management', 'Management-Main Category', 1, 1),
(19, 'Engineering', 'Engineering is a root category', 0, 1),
(24, 'Health', 'Root Category', 0, 1),
(26, 'Law', 'Root Category', 0, 1),
(27, 'Accountancy', 'Root Category', 0, 1),
(28, 'Agriculture', 'Root Caetgory', 0, 1),
(29, 'Security', 'Root Catgory', 0, 1),
(30, 'Senior Positions', 'Root Category', 0, 1),
(31, 'NGO', 'Root Category', 0, 1),
(32, 'Foriegn Employement', 'Root Category', 0, 1),
(33, 'Tourism', 'Root Category', 0, 1),
(34, 'Sports', 'Root Category', 0, 1),
(35, 'Academic/Teaching', 'Root Category', 29, 1),
(36, 'Science & Reaseach', 'Root Category', 0, 1),
(37, 'Administration', 'Root Category', 0, 1),
(38, 'Manufacturing', 'Root Category', 0, 1),
(39, 'Printing', 'Root Category', 0, 1),
(40, 'Advertising', 'Root Category', 0, 1),
(41, 'Insurance', 'Root Category', 0, 1),
(42, 'Others', 'Root Category', 0, 0),
(43, 'Network Engineer', 'n', 1, 1),
(46, 'Graphic Designing', 's', 1, 1),
(47, 'Accounts Assistants', 'a', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tj_employers`
--

CREATE TABLE IF NOT EXISTS `tj_employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `company` varchar(250) NOT NULL,
  `address_line_1` varchar(250) DEFAULT NULL,
  `address_line_2` varchar(250) DEFAULT NULL,
  `city` varchar(200) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `record_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `record_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tj_employers`
--

INSERT INTO `tj_employers` (`id`, `name`, `company`, `address_line_1`, `address_line_2`, `city`, `telephone`, `email`, `record_created`, `record_modified`, `status`) VALUES
(1, 'Manjula', 'Comtech', '173, Yakkala Park', 'Kandy Rd', 'Yakkala', '773263191', 'manjula@comtechlanka.com', '2014-10-19 13:06:51', '2014-10-19 13:06:51', 1),
(2, 'Sunil', 'Singer Sri Lanka', '123,', 'Galle Rd', 'Colombo', '776565656', 'sunil@singer.lk', '2014-10-19 13:32:26', '2014-10-19 13:32:26', 1),
(3, 'Thissa', 'Dialog Sri Lanka', '456,', 'Dupplication Rd,', 'Colombo 3', '77676767', 'thissa@dialog.lk', '2014-10-19 13:35:33', '2014-10-19 13:35:33', 1),
(4, 'Sanduni', 'Mobitel Sri Lanka', '989', 'Parakum Park', 'Kiribathgoda', '0712345678', 'sanduni@mobitel.lk', '2014-10-19 13:41:26', '2014-10-19 13:41:26', 1),
(5, 'Jane', 'Mc Donalds', '45', 'Galle Rd,', 'Bambalapitiya', '077654321', 'jane@yahoo.com', '2014-10-19 13:47:00', '2014-10-19 13:47:00', 1),
(6, 'Chaminda', 'Abans', 'No 498,', 'Galle Road, ', 'Colombo 03', '+94 11 2565265', 'chami234@buyabans.lk', '2014-10-19 15:43:50', '2014-10-19 15:43:50', 1),
(7, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2015-03-15 06:20:03', '2015-03-15 06:20:03', 1),
(8, 'v', 'v', 'v', 'v', 'v', 'v', 'v', '2015-03-15 06:29:53', '2015-03-15 06:29:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tj_jobs`
--

CREATE TABLE IF NOT EXISTS `tj_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `publish_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `salary` double NOT NULL,
  `negot_salary` double NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `company` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company` (`company`),
  KEY `company_2` (`company`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tj_jobs`
--

INSERT INTO `tj_jobs` (`id`, `category`, `title`, `description`, `publish_date`, `exp_date`, `status`, `salary`, `negot_salary`, `keywords`, `company`) VALUES
(1, 1, 'Network Administrator', 'aaaa', '0000-00-00', '0000-00-00', 1, 12000, 12000, '', 0),
(2, 1, 's', 's', '0000-00-00', '0000-00-00', 1, 0, 0, '', 1),
(3, 0, 'ssss', 'ssss', '0000-00-00', '0000-00-00', 1, 0, 0, '', 1),
(4, 0, 'a', 'a', '0000-00-00', '0000-00-00', 1, 0, 0, '', 0),
(5, 26, 'z', 'z', '0000-00-00', '0000-00-00', 1, 0, 0, '', 0),
(6, 33, 'c', 'c', '0000-00-00', '0000-00-00', 1, 0, 0, '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tj_vacancies`
--

CREATE TABLE IF NOT EXISTS `tj_vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `publish_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `salary` double NOT NULL,
  `negot_salary` double NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `company` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company` (`company`),
  KEY `company_2` (`company`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tj_vacancies`
--

INSERT INTO `tj_vacancies` (`id`, `category`, `title`, `description`, `publish_date`, `exp_date`, `status`, `salary`, `negot_salary`, `keywords`, `company`) VALUES
(1, 1, 'Network Administrator', 'aaaa', '0000-00-00', '0000-00-00', 1, 12000, 12000, '', 0),
(2, 1, 's', 's', '0000-00-00', '0000-00-00', 1, 0, 0, '', 1),
(3, 0, 'ssss', 'ssss', '0000-00-00', '0000-00-00', 1, 0, 0, '', 1),
(4, 0, 'a', 'a', '0000-00-00', '0000-00-00', 1, 0, 0, '', 0),
(5, 26, 'z', 'z', '0000-00-00', '0000-00-00', 1, 0, 0, '', 0),
(6, 33, 'c', 'c', '0000-00-00', '0000-00-00', 1, 0, 0, '', 8),
(7, 18, 'Managers', 'zzzzzzzzz', '0000-00-00', '0000-00-00', 1, 12000, 15000, '', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
