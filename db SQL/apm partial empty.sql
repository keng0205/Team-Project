-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 08:43 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apm`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `cIC` varchar(12) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `oHID` int(5) NOT NULL,
  `category` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `schoolID` int(3) NOT NULL,
  `password` char(64) NOT NULL,
  `salt` char(16) NOT NULL,
  `profilePicture` varchar(30) NOT NULL,
  PRIMARY KEY (`cIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `childrenarchive`
--

CREATE TABLE IF NOT EXISTS `childrenarchive` (
  `cIC` varchar(12) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `oHID` int(5) NOT NULL,
  `category` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `schoolID` int(3) NOT NULL,
  `password` char(64) NOT NULL,
  `salt` char(16) NOT NULL,
  `profilePicture` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE IF NOT EXISTS `deadline` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `year` varchar(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`id`, `date`, `year`, `category`, `status`) VALUES
(20, '2015-05-13', '2015', 'Primary', 'Active'),
(21, '2016-09-30', '2016', 'Primary', 'Archive'),
(22, '2014-09-16', '2014', 'Primary', 'Active'),
(23, '2015-10-16', '2015', 'Upper secondary', 'Active'),
(24, '2015-11-16', '2015', 'Lower secondary', 'Active'),
(26, '2016-07-29', '2016', 'Lower secondary', 'Active'),
(29, '2016-10-16', '2016', 'Upper secondary', 'Active'),
(37, '2014-08-16', '2014', 'Lower secondary', 'Active'),
(38, '2014-09-16', '2014', 'Upper secondary', 'Active'),
(42, '2017-07-13', '2017', 'Primary', 'Active'),
(43, '2017-03-28', '2017', 'Lower secondary', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `improvementpoint`
--

CREATE TABLE IF NOT EXISTS `improvementpoint` (
  `impID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cIC` varchar(12) NOT NULL,
  `aPoint` decimal(7,3) NOT NULL,
  `year` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`impID`),
  KEY `cIC` (`cIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orphanagehome`
--

CREATE TABLE IF NOT EXISTS `orphanagehome` (
  `oHID` int(5) NOT NULL AUTO_INCREMENT,
  `oHName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `oHAdd1` text CHARACTER SET latin1 NOT NULL,
  `oHAdd2` text CHARACTER SET latin1 NOT NULL,
  `oHPostcode` int(5) NOT NULL,
  `oHState` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `oHCity` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pEmail` varchar(45) CHARACTER SET latin1 NOT NULL,
  `pPassword` char(64) CHARACTER SET latin1 NOT NULL,
  `salt` char(16) CHARACTER SET latin1 NOT NULL,
  `pName` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pIC` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `pPhone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `oHStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`oHID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `rID` int(10) NOT NULL AUTO_INCREMENT,
  `sID` int(10) NOT NULL,
  `sem1` int(3) DEFAULT NULL,
  `sem2` int(3) DEFAULT NULL,
  `sem3` int(3) DEFAULT NULL,
  `sem4` int(3) DEFAULT NULL,
  `year` varchar(5) NOT NULL,
  `cID` varchar(12) NOT NULL,
  `improvementPoint` float(100,2) DEFAULT '0.00',
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `schoolID` int(3) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(50) NOT NULL,
  `schoolType` varchar(20) NOT NULL,
  `schoolAddress1` varchar(50) NOT NULL,
  `schoolAddress2` varchar(50) NOT NULL,
  `schoolState` varchar(30) NOT NULL,
  `schoolCity` varchar(20) NOT NULL,
  `schoolPoscode` int(5) NOT NULL,
  `schoolContact` varchar(15) NOT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `schoolName`, `schoolType`, `schoolAddress1`, `schoolAddress2`, `schoolState`, `schoolCity`, `schoolPoscode`, `schoolContact`) VALUES
(1, 'SMK Seri Saujana', 'Secondary School', 'Jalan Radin 2', 'Bandar Baru Seri Petaling', 'Kuala Lumpur', 'KL', 57000, '03-95241252'),
(2, 'SK Bukit Jalil', 'Primary School', 'Jalan 3/155a', 'Bukit Jalil Golf & Country Resort', 'Kuala Lumpur', 'KL', 57000, '03-90556688'),
(3, 'Sekolah Kebangsaan Seri Setia', 'Primary School', 'Jalan Kuchai Lama', '', 'Kuala Lumpur', 'KL', 58100, '03-66589565'),
(4, 'Sekolah Kebangsaan Sri Subang Jaya', 'Primary School', 'Jalan SS 14/8, Ss 14', '', 'Selangor', 'Petaling Jaya', 47500, '016-3121227'),
(5, 'Sekolah Menengah Kebangsaan Bandar Baru Ampang', 'Secondary School', 'Bandar Baru Ampang', '', 'Selangor', 'Ampang', 68000, '03-42957800'),
(6, 'Smk Sultan Abu Bakar', 'Secondary School', 'Smk Sultan Abu Bakar', ' Jalan Beserah', 'Pahang', 'Kuantan', 25300, '09-5601272'),
(7, 'SMK Tunku Abdul Rahman Putra', 'Secondary School', 'No. 1, Jalan Kalabakan', 'Sabak Bernam', 'Selangor', 'Sabak Bernam', 45200, '03-32161394'),
(8, 'SK Bukit Gading', 'Primary School', ' km 6, Jalan Lubok Jong', '', 'Kelantan', 'Tanah Merah', 17500, '09-9550400');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `admin_username` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `admin_password` char(64) CHARACTER SET utf16 NOT NULL,
  `salt` char(16) NOT NULL,
  `admin_Name` varchar(50) CHARACTER SET ucs2 NOT NULL,
  `rights` int(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`admin_username`, `admin_password`, `salt`, `admin_Name`, `rights`, `status`) VALUES
('aaa', '17fea06bccdebfe017ca712f9de3b7fdb79fbb1129372e7eee16a7ddb0439cdb', '252075d6543ee9c9', 'sasassss', 29, 'Archive'),
('aaa@hotmail.com', '6b723e8cad40f438a1bdfa994a61f18608b5a9b62702fc6a7b367878634fc19f', '4cc99d855513e984', 'aaaaaaa', 3, 'Active'),
('bbb', '308b6fdcffc7beeacb238c94777e8fa93a713a2d7ea391642e4f95b279277a61', '36ab2ab72a65a48c', 'bbb', 15, 'Archive'),
('ccc', 'd7b6f3045b1d56cddb69da1daca8ae852caa509d5393ef8d3b33664cb50fdafc', '412c40bf42ef2a05', 'ccc', 5, 'Active'),
('Leeus99', '68bbeffb9eb9c77038726b37424ea26e6a015cd8ef7ec42ccf17316e7b719d36', '734bddb15e474845', 'Lee Jia Hui', 11, 'Active'),
('leeusss', '70bba947ee5efb9efad36c11476c8d9c9ac94ab4f9063257ad2ed86a9d8de007', '397dbeda30149ed', 'leeusss', 25, 'Active'),
('ssssss', '4bdbbeb85b2f43b4a7e6e26d34469ade46be8252673798eb73a5819a66073732', '311b19a8113d7b0a', 'ssssss', 3, 'Active'),
('superAdmin', 'e7c8cceb44d629a544108dc155f85897da073fee9f2f8938b5a6ff848931f05b', '7d9c6069593a7cdc', 'superAdmin', 31, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sName` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `coreSubject` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`sID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sID`, `sName`, `category`, `coreSubject`, `status`) VALUES
(1, 'Malay(1)', 'Primary', 1, 'Active'),
(2, 'Malay(2)', 'Primary', 1, 'Active'),
(3, 'Chinese(1)', 'Primary', 2, 'Active'),
(4, 'Chinese(2)', 'Primary', 2, 'Active'),
(5, 'Mathematic', 'Primary', 1, 'Active'),
(6, 'English', 'Primary', 1, 'Active'),
(7, 'Science', 'Primary', 1, 'Active'),
(13, 'Malay(1)', 'Lower secondary', 1, 'Active'),
(15, 'English', 'Lower secondary', 1, 'Active'),
(16, 'Science(2)', 'Primary', 1, 'Archive'),
(17, 'Malay(2)', 'Lower secondary', 1, 'Active'),
(18, 'aaa', 'Primary', 1, 'Archive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
