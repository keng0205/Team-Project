-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 10:03 AM
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
  `profilePicture` varchar(100) NOT NULL,
  PRIMARY KEY (`cIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cIC`, `cName`, `cEmail`, `oHID`, `category`, `year`, `schoolID`, `password`, `salt`, `profilePicture`) VALUES
('000405126765', 'Chen Hou Tian', 'houTian@gmail.com', 2, 'upperSecondary', 'Form 4', 5, 'f5058bada7e8093f248b5c1b7065f4f7e18cfb19687c1c4d3b3b22f583bc3350', '537ad0981297eba3', ''),
('040305026766', 'Lee Shu Jing', 'bahagia123@gmail.com', 3, 'primary', 'Standard 6', 4, 'a3bb689b0e392d78e4513f308a9b63f2a8df0432e1142f383ed9be20605fb00f', '658ae143ebbc4bc', ''),
('040506054433', 'Lee Hui Min', 'setia123@gmail.com', 4, 'primary', 'Standard 6', 4, '02e5e9873198f3d7f7e8cacd101fda96bf82cd7e6c25437c3eab4009e823cb87', '4b0b0ba83ba4d53c', ''),
('050218024556', 'Yap Yee Mun', 'bahagia123@gmail.com', 3, 'primary', 'Standard 5', 9, '94940898d249e91e5df7d0458c48f685f08b5dfd2e9e4405a37e86e0ccd225c8', '22b82cc16797c2dc', ''),
('050720026677', 'Lim Chang Yik', 'bahagia123@gmail.com', 3, 'primary', 'Standard 5', 9, '4c1b7c72e560a7afbc99e4ad93eeb0b4852336bbccb3cde796e3ff2642751345', '1401aa3e22bfd098', ''),
('060706052245', 'Shafiq Bin Hamid', 'setia123@gmail.com', 4, 'primary', 'Standard 4', 4, 'b524a0a23fb95c7515e4423f3ead9ce5a886d34fd0f6912595049afa571605b7', '2c6e9311108803a9', ''),
('060908025577', 'Tan Boon Hao', 'bahagia123@gmail.com', 3, 'primary', 'Standard 4', 9, '8a170616f7a3fd1a68880abac65b6479e0c631699e5cc9a13e0a3ef8f3808de0', '5d12097f6be002af', ''),
('061120025566', 'Lim Jia Xin', 'joy_123@gmail.com', 2, 'primary', 'Standard 4', 4, '514e440125c5e935f62a66e773909f0ed8baf7fd09bb9918cccd55eb8cfcd1f6', '6988d2cc7b5a9be4', ''),
('070707145585', 'Cheong Tymm', 'tymm@gmail.com', 1, 'primary', 'Standard 3', 2, 'caddb597b7b06e59b0921cf726624a0a7798ada971176ae5d573de4533fcaf5c', '13536883b5241a4', 'images/208650_2016-01-07_00013 (2).png'),
('070907054455', 'Kang Wei Hao', 'setia123@gmail.com', 4, 'primary', 'Standard 1', 4, '549bb9a51fdc8dc07f55c7f4864fe77570175aeb7e06b6671b3430dafa7c3b2f', '379ee5e5fb44f88', ''),
('080402056655', 'Yap Jun Jian', 'setia123@gmail.com', 4, 'primary', 'Standard 2', 4, '2f08eb5b4836365f43536c86f504350e997d9a74c28b815f0a1d4bb123d0ac23', '24f6dc32aba42fa', ''),
('080808008888', 'Lee Jia Hui', 'leeus@gmail.com', 1, 'primary', 'Standard 2', 3, 'fb690f348a4726097c22f506b73e7cefc42f6fda4de6de2c183c64ec5366f037', '41d575b192189e8', ''),
('080918025656', 'Chuah Ji Ying', 'bahagia123@gmail.com', 3, 'primary', 'Standard 2', 9, '3f2cce8925e4dfea84a93cdefe9c6e8e5a2dcef4b7f4e4b1181fa16f3675e605', '27c4b0044b9af38', ''),
('990204025774', 'Tan Xian Rou', 'joy_123@gmail.com', 2, 'upperSecondary', 'Form 5', 1, '5cde25bf3ee45914ea6464b7a4b9e4ae7e7805a7b1816ebc534c433d74fce626', '75d0fdf623483f66', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`id`, `date`, `year`, `category`) VALUES
(20, '2015-05-13', '2015', 'primary'),
(21, '2016-11-16', '2016', 'primary'),
(22, '2014-09-16', '2014', 'primary'),
(23, '2015-10-16', '2015', 'upperSecondary'),
(24, '2015-11-16', '2015', 'lowerSecondary'),
(26, '2016-11-12', '2016', 'lowerSecondary'),
(29, '2016-10-16', '2016', 'upperSecondary'),
(37, '2014-08-16', '2014', 'lowerSecondary'),
(38, '2014-09-16', '2014', 'upperSecondary'),
(44, '2017-09-12', '2017', 'primary');

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
  `status` varchar(20) NOT NULL DEFAULT 'shortlisted',
  PRIMARY KEY (`impID`),
  KEY `cIC` (`cIC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `improvementpoint`
--

INSERT INTO `improvementpoint` (`impID`, `cIC`, `aPoint`, `year`, `category`, `status`) VALUES
(1, '070707145585', '16.500', '2016', 'primary', 'Shortlisted'),
(2, '080808008888', '33.990', '2016', 'primary', 'Shortlisted'),
(3, '040305026766', '15.750', '2016', 'primary', 'Shortlisted'),
(4, '040506054433', '4.830', '2016', 'primary', 'Shortlisted'),
(5, '050218024556', '20.250', '2016', 'primary', 'Shortlisted'),
(7, '050720026677', '17.580', '2016', 'primary', 'Shortlisted'),
(8, '060706052245', '-28.910', '2016', 'primary', 'Shortlisted'),
(9, '060908025577', '31.500', '2016', 'primary', 'Shortlisted'),
(10, '061120025566', '11.580', '2016', 'primary', 'Shortlisted'),
(11, '070907054455', '26.830', '2016', 'primary', 'Shortlisted'),
(12, '080402056655', '30.080', '2016', 'primary', 'Shortlisted'),
(13, '080918025656', '15.990', '2016', 'primary', 'Shortlisted');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orphanagehome`
--

INSERT INTO `orphanagehome` (`oHID`, `oHName`, `oHAdd1`, `oHAdd2`, `oHPostcode`, `oHState`, `oHCity`, `pEmail`, `pPassword`, `salt`, `pName`, `pIC`, `pPhone`, `oHStatus`) VALUES
(1, 'Pu Ai Handicapped Children Association', 'Jalan SS 14/8, Ss 14', '', 47500, 'Selangor', 'Sungai Long', 'paul@gmail.com', '32ac2f886f7629236e868747f50c4ca7235ae38756a84325be32c6a1bef25786', '2b3012ef3c35d453', 'Paul Chan', '771017145585', '012-3456789', 'Active'),
(2, 'Rumah Joy', 'No 65, Lorong 5/1', 'Jalan Keringi', 43000, 'Johor', 'Johor Bahru', 'joy_123@gmail.com', '7f309f484de2dca1a9484cdc255e5b46d2440abc7e34a2dc51f7ae7f6f502adc', '4c3350aa1ac89c14', 'Chin Hao Jie', '650904043355', '013-1768777', 'Active'),
(3, 'Rumah Bahagia', '03-4A, Taman Bahagia', '', 6700, 'Kedah', 'Pendang', 'bahagia123@gmail.com', '323e696ca05a9bf1534f0b6482a2383395e92c833cc9900081fccb27022ff719', '1723db793f25684a', 'Ali Bin Abu', '600908025645', '012-3383377', 'Active'),
(4, 'Rumah Setia Alam', 'no 14/2, Jalan Setia', '', 52000, 'Selangor', 'Petaling Jaya', 'setia123@gmail.com', 'a73b8ba6e6c9ec6202157d344b88718f6d9e1993301445d662370cf720389738', '507f67f25d795611', 'Afiqah Binti Abu Bakar', '560807056768', '010-1144335777', 'Active'),
(5, 'House of Happy', '55, Taman Homie', 'Jalan Happy', 43000, 'Selangor', 'Kajang', 'happy123@gmail.com', '9eec9baac11f24068a5c0d86704b4ad1102ec14393e4f6a56468baf1100fae32', '613235f1377696a5', 'Kang Hun Jun', '670908024567', '013-4556547', 'Archive'),
(6, 'Columbia Home for Needs', '67, Lorong 6/3', 'Jalan Coco', 43000, 'Selangor', 'Kajang', 'coco123@gmail.com', 'd56a8098a903ce96405e48271542e0fef109fca13ffca12559a0aaf612db2445', '53b3c00d4e0feb6c', 'Lim Guan Shi', '650902046765', '013-4667898', 'Archive'),
(7, 'St. Vincent De Paul', '68, Jalan st. Vincent', '', 43000, 'Selangor', 'Kajang', 'vincent123@gmail.com', 'a26bd0ddcc41dac0def87385e29e8dda71e0cc27cdc2e4c96e53577c4280372d', '107a67c172f8f83d', 'Tan Siew Hean', '640723025774', '017-5993091', 'Archive'),
(8, 'Rumah Sejahtera', '78, Jalan Setia', '', 34000, 'Perlis', 'Kayang', 'sejahtera123@gmail.com', 'bf84c3e3ec7c3153108f84b35686f91f6509c1f3ffb00f6759073ce08c125152', '5e8f9c355a94c3ea', 'Teh Siew chu', '620908026774', '014-5667898', 'Archive'),
(9, 'House of Alam', '67, Lorong 6/3', 'Jalan Alam', 6700, 'Kedah', 'Kayang', 'alam123@gmail.com', 'e34c4bc8bd7b31164a5ec952d12c30b1856ec641a01902b1ca02103b14ecd50d', '6cfc1dcb38d0c07b', 'How Hew Xuan', '700907024336', '014-6789987', 'Archive');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rID`, `sID`, `sem1`, `sem2`, `sem3`, `sem4`, `year`, `cID`, `improvementPoint`) VALUES
(2, 1, 20, 30, 40, 50, '2016', '070707145585', 5.00),
(3, 2, 10, 20, 99, 88, '2016', '070707145585', 11.25),
(4, 3, 99, 98, 97, 99, '2016', '070707145585', 0.25),
(9, 1, 66, 56, 45, 88, '2016', '080808008888', 8.08),
(10, 2, 55, 65, 77, 66, '2016', '080808008888', 0.08),
(11, 3, 44, 55, 66, 77, '2016', '080808008888', 5.50),
(12, 4, 23, 45, 66, 87, '2016', '080808008888', 10.58),
(13, 5, 67, 66, 44, 87, '2016', '080808008888', 7.00),
(14, 6, 44, 66, 88, 99, '2016', '080808008888', 8.25),
(15, 7, 66, 55, 44, 33, '2016', '080808008888', -5.50),
(16, 1, 45, 55, 56, 70, '2016', '040305026766', 4.50),
(17, 2, 76, 77, 45, 80, '2016', '040305026766', 3.50),
(18, 3, 55, 66, 37, 85, '2016', '040305026766', 8.08),
(19, 4, 77, 54, 66, 55, '2016', '040305026766', -2.67),
(20, 5, 67, 66, 77, 78, '2016', '040305026766', 2.00),
(21, 6, 59, 59, 66, 59, '2016', '040305026766', -0.58),
(22, 7, 67, 77, 85, 80, '2016', '040305026766', 0.92),
(23, 1, 79, 77, 57, 87, '2016', '040506054433', 4.00),
(24, 2, 78, 77, 98, 93, '2016', '040506054433', 2.17),
(25, 3, 87, 88, 88, 90, '2016', '040506054433', 0.58),
(26, 4, 87, 67, 87, 80, '2016', '040506054433', -0.08),
(27, 5, 76, 88, 99, 89, '2016', '040506054433', 0.33),
(28, 6, 68, 77, 67, 66, '2016', '040506054433', -1.17),
(29, 7, 89, 98, 86, 87, '2016', '040506054433', -1.00),
(30, 1, 45, 66, 77, 56, '2016', '050218024556', -1.67),
(31, 2, 57, 67, 88, 99, '2016', '050218024556', 7.08),
(32, 3, 65, 76, 55, 76, '2016', '050218024556', 2.67),
(33, 4, 44, 33, 55, 56, '2016', '050218024556', 3.00),
(34, 5, 45, 75, 67, 58, '2016', '050218024556', -1.08),
(35, 6, 46, 76, 55, 46, '2016', '050218024556', -3.25),
(36, 7, 34, 78, 44, 76, '2016', '050218024556', 6.00),
(37, 20, 76, 86, 45, 99, '2016', '050218024556', 7.50),
(38, 1, 54, 66, 54, 77, '2016', '050720026677', 4.75),
(39, 2, 67, 45, 76, 77, '2016', '050720026677', 3.58),
(40, 3, 65, 66, 76, 58, '2016', '050720026677', -2.75),
(41, 4, 66, 45, 76, 77, '2016', '050720026677', 3.67),
(42, 5, 65, 45, 66, 77, '2016', '050720026677', 4.58),
(43, 6, 56, 71, 87, 76, '2016', '050720026677', 1.17),
(44, 7, 56, 87, 93, 89, '2016', '050720026677', 2.58),
(46, 1, 23, 44, 54, 34, '2016', '060706052245', -1.58),
(47, 2, 76, 45, 65, 33, '2016', '060706052245', -7.25),
(48, 3, 56, 76, 44, 57, '2016', '060706052245', -0.42),
(49, 4, 66, 67, 75, 23, '2016', '060706052245', -11.58),
(50, 5, 54, 65, 76, 44, '2016', '060706052245', -5.25),
(51, 6, 65, 76, 33, 22, '2016', '060706052245', -9.00),
(52, 7, 45, 67, 45, 77, '2016', '060706052245', 6.17),
(53, 1, 65, 77, 66, 98, '2016', '060908025577', 7.17),
(54, 2, 65, 44, 76, 78, '2016', '060908025577', 4.08),
(55, 3, 56, 57, 55, 87, '2016', '060908025577', 7.75),
(56, 4, 67, 56, 66, 55, '2016', '060908025577', -2.00),
(57, 5, 56, 67, 77, 67, '2016', '060908025577', 0.08),
(58, 6, 45, 34, 54, 67, '2016', '060908025577', 5.67),
(59, 7, 34, 57, 65, 87, '2016', '060908025577', 8.75),
(60, 1, 55, 44, 66, 54, '2016', '061120025566', -0.25),
(61, 2, 55, 43, 55, 65, '2016', '061120025566', 3.50),
(62, 3, 34, 56, 54, 65, '2016', '061120025566', 4.25),
(63, 4, 34, 43, 34, 45, '2016', '061120025566', 2.00),
(64, 5, 34, 65, 23, 54, '2016', '061120025566', 3.33),
(65, 6, 22, 65, 32, 12, '2016', '061120025566', -6.92),
(66, 7, 54, 65, 74, 87, '2016', '061120025566', 5.67),
(67, 1, 33, 45, 34, 65, '2016', '070907054455', 6.92),
(68, 2, 76, 45, 76, 87, '2016', '070907054455', 5.33),
(69, 3, 67, 78, 97, 76, '2016', '070907054455', -1.17),
(70, 4, 87, 67, 88, 99, '2016', '070907054455', 4.58),
(71, 5, 87, 78, 90, 93, '2016', '070907054455', 2.00),
(72, 6, 76, 76, 56, 87, '2016', '070907054455', 4.42),
(73, 7, 56, 76, 87, 92, '2016', '070907054455', 4.75),
(74, 1, 12, 43, 53, 34, '2016', '080402056655', -0.50),
(75, 2, 45, 65, 76, 87, '2016', '080402056655', 6.25),
(76, 3, 34, 54, 56, 43, '2016', '080402056655', -1.25),
(77, 4, 43, 56, 76, NULL, '2016', '080402056655', 8.83),
(78, 5, 54, 76, 87, 87, '2016', '080402056655', 3.67),
(79, 6, 56, 65, 76, 87, '2016', '080402056655', 5.33),
(80, 7, 54, 35, 46, 76, '2016', '080402056655', 7.75),
(81, 1, 45, 55, 66, 45, '2016', '080918025656', -2.58),
(82, 2, 56, 76, 56, 86, '2016', '080918025656', 5.83),
(83, 3, 54, 56, 76, 78, '2016', '080918025656', 4.00),
(84, 4, 76, 56, 77, 86, '2016', '080918025656', 4.08),
(85, 5, 46, 46, 76, 58, '2016', '080918025656', 0.50),
(86, 6, 65, 75, 45, 76, '2016', '080918025656', 3.58),
(87, 7, 87, 56, 78, 76, '2016', '080918025656', 0.58);

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
(6, 'Smk Sultan Abu Bakar', 'Secondary School', 'Smk Sultan Abu Bakar', 'Jalan Beserah', 'Pahang', 'Kuantan', 25300, '09-5601272'),
(7, 'SMK Tunku Abdul Rahman Putra', 'Secondary School', 'No. 1, Jalan Kalabakan', 'Sabak Bernam', 'Selangor', 'Sabak Bernam', 45200, '03-32161394'),
(8, 'SK Bukit Gading', 'Primary School', ' km 6, Jalan Lubok Jong', '', 'Kelantan', 'Tanah Merah', 17500, '09-9550400'),
(9, 'SJK(C) Yeang Cheng', 'Primary School', 'SJK(C) Yeang Cheng, Jalan Pendang', '', 'Kedah', 'Pendang', 6700, '04-7596223');

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
('abc123', '3a2a5fbb8d927359f80e8b9461b470baea49a4f4637fc9787edadd5e196bca34', '143162cf33ad5d01', 'William Siah', 7, 'Active'),
('jackson_ooi', '14fd0e34b177bb5412717f21b8b64ac0a00de6a552ede432f6a310432c0b1da6', '54e1856bba92d0', 'Jackson Ooi', 30, 'Active'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sID`, `sName`, `category`, `coreSubject`, `status`) VALUES
(1, 'Malay(1)', 'primary', 1, 'Active'),
(2, 'Malay(2)', 'primary', 1, 'Active'),
(3, 'Chinese(1)', 'primary', 2, 'Active'),
(4, 'Chinese(2)', 'primary', 2, 'Active'),
(5, 'Mathematic', 'primary', 1, 'Active'),
(6, 'English', 'primary', 1, 'Active'),
(7, 'Science', 'primary', 1, 'Active'),
(13, 'Malay', 'lowerSecondary', 1, 'Active'),
(15, 'English', 'lowerSecondary', 1, 'Active'),
(16, 'Science(2)', 'primary', 1, 'Archive'),
(18, 'Sejarah', 'lowerSecondary', 1, 'Active'),
(19, 'Pendidikan Moral', 'lowerSecondary', 2, 'Active'),
(20, 'pendidikan moral', 'primary', 2, 'Active'),
(21, 'Geography', 'lowerSecondary', 1, 'Active'),
(22, 'Science', 'lowerSecondary', 1, 'Active'),
(23, 'Chinese', 'lowerSecondary', 2, 'Active'),
(24, 'Mathematic', 'lowerSecondary', 1, 'Active'),
(25, 'Pendidikan Islam', 'lowerSecondary', 2, 'Active'),
(26, 'hasa', 'primary', 1, 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
