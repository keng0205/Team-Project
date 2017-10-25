-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 10:41 PM
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

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cIC`, `cName`, `cEmail`, `oHID`, `category`, `year`, `schoolID`, `password`, `salt`, `profilePicture`) VALUES
('001221145587', 'Lee Zi Yin', 'paul@gmail.com', 1, 'Primary', 'Standard 1', 8, '7c0c7b1dbdd5f69d978bca7294289ab52dc11490601979d2d1baad41d3f58ec0', '69882197346035b', ''),
('070707007777', 'Cheong Tymm', 'tymmtymm@gmail.com', 1, 'Primary', 'Standard 3', 2, 'f8c9106095152473c0db5e386d3e591b2fdad58ecaeda0488483d17a38a826c6', 'a172e5b2f2f6782', ''),
('091012105585', 'Ali Bin Abu Bakar', 'paul@gmail.com', 1, 'Primary', 'Standard 1', 2, '69bb9bb7e14023ed9f9f570265c9a19cf902d1f975635399cbffb2626010df91', '7fd2b9a0222fd9d7', ''),
('209988001111', 'Hong Hun Jian', 'leeus99@gmail.com', 9, 'upperSecondary', 'Form 4', 5, '1b8882d3666b1a45c322bcfece7af358ddec2b54ac05498ba38c1d8d086c9717', '5339821a3f307e96', ''),
('808080808080', 'Eight Zero', 'paul@gmail.com', 1, 'Upper Secondary', 'Form 6', 7, '1df35e1cc4e253ce9f188eaf6d5a51ce2a35004ab71e9f2b98e2be40dbf524f0', '430ae5a73aa1a2c2', ''),
('881100229999', 'Kang Jun Hao', 'leeus99@gmail.com', 9, 'lowerSecondary', 'Form 3', 7, '19b44a70fc77ab86866b94dcae884f571fc5104642aea6c35ce2d3e476c67620', '36d58a9746f24dbe', ''),
('980011002222', 'Tan Xiao Mei', 'leeus99@gmail.com', 9, 'upperSecondary', 'Standard 3', 9, '43cd0680e61c67c9c140f5aed6bc19dfbae3999725a8fc8a6111124d0e8ce919', '1ee7ec63147df8e1', ''),
('990505112224', 'hehe', 'hehe@gmail.com', 3, 'Primary', 'Standard 1', 3, '', '', ''),
('999999991111', 'Yap Boon Keng', '', 1, 'Upper Secondary', 'Form 5', 1, '', '', '');

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

--
-- Dumping data for table `childrenarchive`
--

INSERT INTO `childrenarchive` (`cIC`, `cName`, `cEmail`, `oHID`, `category`, `year`, `schoolID`, `password`, `salt`, `profilePicture`) VALUES
('999999000000', 'Tan Ai Chia', 'acTan@gmail.com', 1, 'Primary', '2016', 2, 'weweqwe', 'qweqweqwe', ''),
('980000000000', 'Kan Jian Jio', 'kkk@hotmail.com', 1, 'Primary', '2016', 1, '213123', '1323312', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `improvementpoint`
--

INSERT INTO `improvementpoint` (`impID`, `cIC`, `aPoint`, `year`, `category`, `status`) VALUES
(1, '001221145587', '153.330', '2016', 'Primary', 'Disqualified'),
(2, '091012105585', '140.220', '2016', 'Primary', 'Shortlisted'),
(3, '990505112224', '157.700', '2016', 'Primary', 'Finalist'),
(4, '888888888888', '120.220', '2016', 'Primary', 'Finalist'),
(5, '777777777777', '199.000', '2016', 'Primary', 'Finalist'),
(6, '444444444444', '39.200', '2016', 'Primary', 'Disqualified'),
(7, '555555555555', '44.140', '2016', 'Primary', 'Shortlisted'),
(8, '766666557777', '160.330', '2016', 'Primary', 'Finalist'),
(9, '070707007777', '50.280', '2016', 'Primary', 'Shortlisted');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orphanagehome`
--

INSERT INTO `orphanagehome` (`oHID`, `oHName`, `oHAdd1`, `oHAdd2`, `oHPostcode`, `oHState`, `oHCity`, `pEmail`, `pPassword`, `salt`, `pName`, `pIC`, `pPhone`, `oHStatus`) VALUES
(1, 'Pu Ai Handicapped Children Association', 'NO.2&4 JALAN SUNGAI LONG 12/1A', 'TAMAN MAKMUR 2', 43000, 'Selangor', 'Kajang', 'paul@gmail.com', '37b7ccd5412aec826b5eeb54868df221449e83f6c8eae78ac85b58b70e959349', '7e8fe3437e9274c1', 'Mr. Paul Chan', '986574521215', '180-0882222', 'Archive'),
(2, 'Angels’ Home', '126, Jalan Hujan Gerimis 2', 'OUG', 58200, 'Kuala Lumpur', 'WP KL', '123@gmail.com', '1013b52a21fa7e42ea3baa2c44b406012353d78cbb4fe31fcbe41e06362e4a43', '2e23a4c61077a67a', 'Belinda Chew', '791205226588', '016-6292933', 'Active'),
(3, 'House Of Joy', ' 78A, Jalan TK 1/1, Taman Kinrara', 'Batu 7, Jalan Puchong', 47180, 'Selangor', 'Puchong', 'houseofjoy@hotmail.com', '5f0caa4b64fbfdb3e3838b46a8f9a2acb6ca99fc6083ffb6f355719bc0950a54', '7f7d881b7fb0b748', 'Marcus Lim', '870512134457', '012-2154588', 'Active'),
(4, 'House Of Joy', ' 78A, Jalan TK 1/1, Taman Kinrara', 'Batu 7, Jalan Puchong', 47180, 'Selangor', 'Puchong', 'houseofjoy@hotmail.com', '5f0caa4b64fbfdb3e3838b46a8f9a2acb6ca99fc6083ffb6f355719bc0950a54', '7f7d881b7fb0b748', 'Marcus Lim', '870512134457', '012-2154588', 'Active'),
(5, 'rumah baru', 'NO.2&4 JALAN SUNGAI LONG 12/1A', '', 25411, 'Kedah', 'dunno', 'blue@blue.com', '8a195287486534dd57cec034ef6bd452c537cf23baf48a263c087fcbb53ae89c', '930a33a70f1d9ee', 'hello bye', '954145212', '60-163187775', 'Active'),
(6, 'rumah baru', 'NO.2&4 JALAN SUNGAI LONG 12/1A', '', 25411, 'Kedah', 'dunno', 'blue@blue.com', '8a195287486534dd57cec034ef6bd452c537cf23baf48a263c087fcbb53ae89c', '930a33a70f1d9ee', 'hello bye', '954145212', '60-163187775', 'Active'),
(7, 'house', '123', '456', 12345, 'Selangor', 'se', '123@live.com', '1ffd320bfc3992e339d4edcc56954e6df9fa766f8d9a2bb0ca410e2819d27451', '5887d413280742e8', 'se', '880505102251', '12-1231232', 'Active'),
(8, 'house', '123', '', 12345, 'Selangor', 'se', '123@live.com', '1ffd320bfc3992e339d4edcc56954e6df9fa766f8d9a2bb0ca410e2819d27451', '5887d413280742e8', 'se', '1234567', '12-1231232', 'Active'),
(9, 'LeeusHome', '68, Taman Seroja ,06700 Pendang, Kedah', '', 6700, 'Kedah', 'Pendang', 'leeus99@gmail.com', '094b2e66f6c74cd5c301c40a8b0b2a7b9040bee6a8e61c3108b68dc98bb4564d', '64c75fa496ef1a3', 'Lee Jia Hui', '951204025634', '012-6623091', 'Active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rID`, `sID`, `sem1`, `sem2`, `sem3`, `sem4`, `year`, `cID`, `improvementPoint`) VALUES
(77, 33, 33, 44, 55, 0, '2016', '070707007777', 40.00),
(87, 22, 10, 50, 30, 40, '2016', '123456789', 0.00),
(88, 33, NULL, NULL, NULL, NULL, '2016', '123456789', 0.00),
(90, 11, 10, 20, 60, NULL, '2016', '987654321', 15.00),
(91, 22, 52, NULL, NULL, NULL, '2016', '987654321', 0.00),
(92, 1, 20, 50, 60, 5, '2016', '070707007777', 50.33),
(93, 4, 50, 60, 80, 100, '2016', '070707007777', 100.00),
(94, 16, 5, 2, NULL, NULL, '2016', '070707007777', 40.44),
(95, 16, 20, NULL, NULL, NULL, '2015', '070707007777', 0.00),
(96, 2, 5, 6, 7, NULL, '2016', '070707007777', 2.00);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(8, 'SK Bukit Gading', 'Primary School', ' km 6, Jalan Lubok Jong', '', 'Kelantan', 'Tanah Merah', 17500, '09-9550400'),
(9, 'New School lalala', 'Primary School', 'address 1', 'address 2', 'Terengganu', 'KT', 34567, '123-4567890');

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
