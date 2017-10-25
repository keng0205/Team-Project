-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 01:19 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apm`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
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
-- Dumping data for table `children`
--

INSERT INTO `children` (`cIC`, `cName`, `cEmail`, `oHID`, `category`, `year`, `schoolID`, `password`, `salt`, `profilePicture`) VALUES
('001221145587', 'Lee Zi Yin', 'paul@gmail.com', 1, '', 'Standard 1', 8, '7c0c7b1dbdd5f69d978bca7294289ab52dc11490601979d2d1baad41d3f58ec0', '69882197346035b', ''),
('070707007777', 'Cheong Tymm', 'tymmtymm@gmail.com', 1, '', 'Standard 3', 2, 'f8c9106095152473c0db5e386d3e591b2fdad58ecaeda0488483d17a38a826c6', 'a172e5b2f2f6782', ''),
('091012105585', 'Ali Bin Abu Bakar', 'paul@gmail.com', 1, '', 'Standard 1', 2, '69bb9bb7e14023ed9f9f570265c9a19cf902d1f975635399cbffb2626010df91', '7fd2b9a0222fd9d7', ''),
('123456789', 'Yap Boon Keng', 'boonkeng025@hotmail.com', 1, 'primary', 'Form 5', 1, '6e2bb4371958d6eb5621c3cc344c54d818c69e758ea97659b3dd4d82697bff29', '74edc606011feb1', 'images/facebook-avatar.jpg'),
('808080808080', 'Eight Zero', 'paul@gmail.com', 1, '', 'Form 6', 7, '1df35e1cc4e253ce9f188eaf6d5a51ce2a35004ab71e9f2b98e2be40dbf524f0', '430ae5a73aa1a2c2', ''),
('990505112224', 'hehe', 'hehe@gmail.com', 3, '', 'Standard 1', 3, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `childrenarchive`
--

CREATE TABLE `childrenarchive` (
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

CREATE TABLE `deadline` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `year` varchar(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`id`, `date`, `year`, `category`, `status`) VALUES
(20, '2015-05-13', '2015', 'Primary', 'Active'),
(21, '2016-08-23', '2016', 'Primary', 'Active'),
(22, '2014-09-16', '2014', 'Primary', 'Active'),
(23, '2015-10-16', '2015', 'Upper secondary', 'Active'),
(24, '2015-11-16', '2015', 'Lower secondary', 'Active'),
(26, '2016-06-16', '2016', 'Lower secondary', 'Active'),
(29, '2016-10-16', '2016', 'Upper secondary', 'Active'),
(37, '2014-08-16', '2014', 'Lower secondary', 'Active'),
(38, '2014-09-16', '2014', 'Upper secondary', 'Active'),
(42, '2017-07-13', '2017', 'Primary', 'Active'),
(43, '2017-03-28', '2017', 'Lower secondary', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `improvementpoint`
--

CREATE TABLE `improvementpoint` (
  `impID` int(10) UNSIGNED NOT NULL,
  `cIC` varchar(12) NOT NULL,
  `aPoint` decimal(7,3) NOT NULL,
  `year` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Shortlisted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `improvementpoint`
--

INSERT INTO `improvementpoint` (`impID`, `cIC`, `aPoint`, `year`, `category`, `status`) VALUES
(1, '123456789', '10.000', '2016', 'Primary', 'Shortlisted'),
(2, '999999999999', '140.220', '2015', 'Primary', 'Shortlisted'),
(3, '951204025634', '157.700', '2016', 'Primary', 'Shortlisted'),
(4, '888888888888', '120.220', '2016', 'Primary', 'Finalist'),
(5, '777777777777', '199.000', '2016', 'Primary', 'Finalist'),
(6, '444444444444', '39.200', '2016', 'Primary', 'Disqualified'),
(7, '555555555555', '44.140', '2016', 'Primary', 'Shortlisted'),
(8, '766666557777', '160.330', '2016', 'Primary', 'Finalist'),
(9, '070707007777', '50.280', '2016', 'Primary', 'Finalist');

-- --------------------------------------------------------

--
-- Table structure for table `orphanagehome`
--

CREATE TABLE `orphanagehome` (
  `oHID` int(5) NOT NULL,
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
  `oHStatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orphanagehome`
--

INSERT INTO `orphanagehome` (`oHID`, `oHName`, `oHAdd1`, `oHAdd2`, `oHPostcode`, `oHState`, `oHCity`, `pEmail`, `pPassword`, `salt`, `pName`, `pIC`, `pPhone`, `oHStatus`) VALUES
(1, 'Pu Ai Handicapped Children Association', 'NO.2&4 JALAN SUNGAI LONG 12/1A', 'TAMAN MAKMUR 2', 43000, 'Selangor', 'Kajang', 'paul@gmail.com', '37b7ccd5412aec826b5eeb54868df221449e83f6c8eae78ac85b58b70e959349', '7e8fe3437e9274c1', 'Mr. Paul Chan', '986574521215', '180-0882222', ''),
(2, 'Angels’ Home', '126, Jalan Hujan Gerimis 2', 'OUG', 58200, 'Kuala Lumpur', 'WP KL', '123@gmail.com', '1013b52a21fa7e42ea3baa2c44b406012353d78cbb4fe31fcbe41e06362e4a43', '2e23a4c61077a67a', 'Belinda Chew', '791205226588', '016-6292933', ''),
(3, 'House Of Joy', ' 78A, Jalan TK 1/1, Taman Kinrara', 'Batu 7, Jalan Puchong', 47180, 'Selangor', 'Puchong', 'houseofjoy@hotmail.com', '5f0caa4b64fbfdb3e3838b46a8f9a2acb6ca99fc6083ffb6f355719bc0950a54', '7f7d881b7fb0b748', 'Marcus Lim', '870512134457', '012-2154588', ''),
(4, 'House Of Joy', ' 78A, Jalan TK 1/1, Taman Kinrara', 'Batu 7, Jalan Puchong', 47180, 'Selangor', 'Puchong', 'houseofjoy@hotmail.com', '5f0caa4b64fbfdb3e3838b46a8f9a2acb6ca99fc6083ffb6f355719bc0950a54', '7f7d881b7fb0b748', 'Marcus Lim', '870512134457', '012-2154588', ''),
(5, 'rumah baru', 'NO.2&4 JALAN SUNGAI LONG 12/1A', '', 25411, 'Kedah', 'dunno', 'blue@blue.com', '8a195287486534dd57cec034ef6bd452c537cf23baf48a263c087fcbb53ae89c', '930a33a70f1d9ee', 'hello bye', '954145212', '60-163187775', ''),
(6, 'rumah baru', 'NO.2&4 JALAN SUNGAI LONG 12/1A', '', 25411, 'Kedah', 'dunno', 'blue@blue.com', '8a195287486534dd57cec034ef6bd452c537cf23baf48a263c087fcbb53ae89c', '930a33a70f1d9ee', 'hello bye', '954145212', '60-163187775', ''),
(7, 'house', '123', '456', 12345, 'Selangor', 'se', '123@live.com', '1ffd320bfc3992e339d4edcc56954e6df9fa766f8d9a2bb0ca410e2819d27451', '5887d413280742e8', 'se', '880505102251', '12-1231232', ''),
(8, 'house', '123', '', 12345, 'Selangor', 'se', '123@live.com', '1ffd320bfc3992e339d4edcc56954e6df9fa766f8d9a2bb0ca410e2819d27451', '5887d413280742e8', 'se', '1234567', '12-1231232', '');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rID` int(10) NOT NULL,
  `sID` int(10) NOT NULL,
  `sem1` int(3) DEFAULT NULL,
  `sem2` int(3) DEFAULT NULL,
  `sem3` int(3) DEFAULT NULL,
  `sem4` int(3) DEFAULT NULL,
  `year` varchar(5) NOT NULL,
  `cID` varchar(12) NOT NULL,
  `improvementPoint` float(100,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rID`, `sID`, `sem1`, `sem2`, `sem3`, `sem4`, `year`, `cID`, `improvementPoint`) VALUES
(87, 22, 10, 50, 30, 40, '2016', '123456789', 0.00),
(88, 33, NULL, NULL, NULL, NULL, '2016', '123456789', 0.00),
(90, 11, 10, 20, 60, NULL, '2016', '987654321', 15.00),
(91, 22, 52, NULL, NULL, NULL, '2016', '987654321', 0.00),
(92, 1, 20, 50, 60, 5, '2016', '070707007777', 50.33),
(93, 4, 50, 60, 80, 100, '2016', '070707007777', 100.00),
(94, 16, 5, 2, NULL, NULL, '2016', '070707007777', 40.44),
(95, 16, 20, NULL, NULL, NULL, '2015', '070707007777', 0.00),
(96, 2, 5, 6, 7, NULL, '2016', '070707007777', 2.00),
(107, 1, 10, 20, 30, NULL, '2016', '123456789', 5.00),
(108, 2, 10, 20, 30, NULL, '2016', '123456789', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolID` int(3) NOT NULL,
  `schoolName` varchar(50) NOT NULL,
  `schoolType` varchar(20) NOT NULL,
  `schoolAddress1` varchar(50) NOT NULL,
  `schoolAddress2` varchar(50) NOT NULL,
  `schoolState` varchar(30) NOT NULL,
  `schoolCity` varchar(20) NOT NULL,
  `schoolPoscode` int(5) NOT NULL,
  `schoolContact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `staff` (
  `admin_username` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `admin_password` char(64) CHARACTER SET utf16 NOT NULL,
  `salt` char(16) NOT NULL,
  `admin_Name` varchar(50) CHARACTER SET ucs2 NOT NULL,
  `right` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`admin_username`, `admin_password`, `salt`, `admin_Name`, `right`) VALUES
('Leeus99', '68bbeffb9eb9c77038726b37424ea26e6a015cd8ef7ec42ccf17316e7b719d36', '734bddb15e474845', 'Lee Jia Hui', 12),
('superAdmin', 'e7c8cceb44d629a544108dc155f85897da073fee9f2f8938b5a6ff848931f05b', '7d9c6069593a7cdc', 'superAdmin', 31);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sID` int(5) UNSIGNED NOT NULL,
  `sName` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `coreSubject` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(13, 'Malay', 'Lower secondary', 1, 'Active'),
(15, 'English', 'Lower secondary', 1, 'Active'),
(16, 'Science(2)', 'Primary', 1, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`cIC`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `improvementpoint`
--
ALTER TABLE `improvementpoint`
  ADD PRIMARY KEY (`impID`),
  ADD KEY `cIC` (`cIC`);

--
-- Indexes for table `orphanagehome`
--
ALTER TABLE `orphanagehome`
  ADD PRIMARY KEY (`oHID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deadline`
--
ALTER TABLE `deadline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `improvementpoint`
--
ALTER TABLE `improvementpoint`
  MODIFY `impID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orphanagehome`
--
ALTER TABLE `orphanagehome`
  MODIFY `oHID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
