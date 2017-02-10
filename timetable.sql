-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 05:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--
CREATE DATABASE IF NOT EXISTS `timetable` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `timetable`;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `classroom` varchar(50) NOT NULL,
  `building` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classroom`, `building`) VALUES('DCIT Office', NULL);
INSERT INTO `class` (`classroom`, `building`) VALUES('FST 113', NULL);
INSERT INTO `class` (`classroom`, `building`) VALUES('FST 114', NULL);
INSERT INTO `class` (`classroom`, `building`) VALUES('FST 412', NULL);
INSERT INTO `class` (`classroom`, `building`) VALUES('FST CSL1', NULL);
INSERT INTO `class` (`classroom`, `building`) VALUES('FST CSL2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO1601', 'Introduction to WWW Programming');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO2400', 'Information Systems Development');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO2405', 'Discrete Mathematics');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO2410', 'Fundamental Data Structure');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO2425', 'Computer Architecture');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO2500', 'Networking Technologies Fundamentals');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO3410', 'Web Systems & Technologies');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO3425', 'Professional Ethics and Law');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO3435', 'E-Commerce');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO3490', 'Project');
INSERT INTO `course` (`coursecode`, `coursename`) VALUES('INFO3510', 'Networking for Professionals');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

DROP TABLE IF EXISTS `friday`;
CREATE TABLE `friday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO1601', 'Introduction to WWW Programming', '15:00:00', '17:00:00', 'FST CSL2');
INSERT INTO `friday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(2, 'INFO2405', 'Discrete Mathematics', '14:00:00', '15:00:00', 'FST 113');
INSERT INTO `friday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(3, 'INFO2410', 'Fundamental Data Structure', '13:00:00', '14:00:00', 'FST 114');

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

DROP TABLE IF EXISTS `monday`;
CREATE TABLE `monday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO1601', 'Introduction to WWW Programming', '08:00:00', '10:00:00', 'FST CSL1');
INSERT INTO `monday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(2, 'INFO2410', 'Fundamental Data Structure', '14:00:00', '16:00:00', 'FST 412');
INSERT INTO `monday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(3, 'INFO2500', 'Networking Technologies Fundamentals', '18:00:00', '20:00:00', 'FST CSL1');
INSERT INTO `monday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(4, 'INFO3435', 'E-Commerce', '12:00:00', '14:00:00', 'FST CSL1');

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

DROP TABLE IF EXISTS `saturday`;
CREATE TABLE `saturday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saturday`
--

INSERT INTO `saturday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO3510', 'Networking for Professionals', '08:00:00', '10:00:00', 'FST CSL1');
INSERT INTO `saturday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(2, 'INFO3510', 'Networking for Professionals', '10:00:00', '12:00:00', 'FST CSL1');

-- --------------------------------------------------------

--
-- Table structure for table `scourse`
--

DROP TABLE IF EXISTS `scourse`;
CREATE TABLE `scourse` (
  `userId` int(11) NOT NULL,
  `course1` varchar(20) NOT NULL,
  `course2` varchar(20) NOT NULL,
  `course3` varchar(20) NOT NULL,
  `course4` varchar(20) NOT NULL,
  `course5` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

DROP TABLE IF EXISTS `thursday`;
CREATE TABLE `thursday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO2405', 'Discrete Mathematics', '09:00:00', '10:00:00', 'FST 113');

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

DROP TABLE IF EXISTS `tuesday`;
CREATE TABLE `tuesday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO1601', 'Introduction to WWW Programming', '08:00:00', '10:00:00', 'FST CSL2');
INSERT INTO `tuesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(2, 'INFO3510', 'Networking for Professionals', '16:00:00', '17:00:00', 'FST 412');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `Fname`, `Lname`, `email`, `password`) VALUES(1, 'Jensen', 'Ackles', 'jackles@gmail.com', 'aa78b4ca8b9bc8319c5ce19f861dea2ad7534007');

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

DROP TABLE IF EXISTS `wednesday`;
CREATE TABLE `wednesday` (
  `dayId` int(10) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `classroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(1, 'INFO1601', 'Introduction to WWW Programming', '14:00:00', '16:00:00', 'FST CSL2');
INSERT INTO `wednesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(2, 'INFO2400', 'Information Systems Development', '13:00:00', '15:00:00', 'FST 113');
INSERT INTO `wednesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(3, 'INFO3410', 'Web Systems & Technologies', '14:00:00', '16:00:00', 'FST CSL1');
INSERT INTO `wednesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(4, 'INFO3435', 'E-Commerce', '14:00:00', '16:00:00', 'FST CSL1');
INSERT INTO `wednesday` (`dayId`, `coursecode`, `coursename`, `Stime`, `Etime`, `classroom`) VALUES(5, 'INFO3490', 'Project', '08:00:00', '10:00:00', 'DCIT Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classroom`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`coursecode`);

--
-- Indexes for table `friday`
--
ALTER TABLE `friday`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `saturday`
--
ALTER TABLE `saturday`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `scourse`
--
ALTER TABLE `scourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thursday`
--
ALTER TABLE `thursday`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`dayId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`dayId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scourse`
--
ALTER TABLE `scourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
