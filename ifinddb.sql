-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 06:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifinddb`
--
CREATE DATABASE IF NOT EXISTS `ifinddb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ifinddb`;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE `building` (
  `buildingId` int(20) NOT NULL,
  `buildingName` text NOT NULL,
  `GPS` int(50) NOT NULL,
  `facultyId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buildingId`, `buildingName`, `GPS`, `facultyId`) VALUES(100, 'Faculty of Science and Technology Building', 0, 'FST');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `courseCode` varchar(20) NOT NULL,
  `courseName` text NOT NULL,
  `sTime` time NOT NULL,
  `fTime` time NOT NULL,
  `day` varchar(20) NOT NULL,
  `departmentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `departmentId` varchar(20) NOT NULL,
  `departmentName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES('DCIT', 'Department of Computing and Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty` (
  `facultyId` varchar(20) NOT NULL,
  `facultyName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyId`, `facultyName`) VALUES('FST', 'Faculty of Science and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_department`
--

DROP TABLE IF EXISTS `faculty_department`;
CREATE TABLE `faculty_department` (
  `facultyId` varchar(20) NOT NULL,
  `departmentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `roomId` varchar(20) NOT NULL,
  `roomName` text NOT NULL,
  `floor` varchar(10) NOT NULL,
  `buildingId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomName`, `floor`, `buildingId`) VALUES('113', 'FST', 'G', 100);
INSERT INTO `room` (`roomId`, `roomName`, `floor`, `buildingId`) VALUES('114', 'FST', 'G', 100);
INSERT INTO `room` (`roomId`, `roomName`, `floor`, `buildingId`) VALUES('412', 'FST', '3', 100);
INSERT INTO `room` (`roomId`, `roomName`, `floor`, `buildingId`) VALUES('CSL1', 'FST ', '2', 100);
INSERT INTO `room` (`roomId`, `roomName`, `floor`, `buildingId`) VALUES('CSL2', 'FST', '2', 100);

-- --------------------------------------------------------

--
-- Table structure for table `room_course`
--

DROP TABLE IF EXISTS `room_course`;
CREATE TABLE `room_course` (
  `roomId` varchar(20) NOT NULL,
  `courseCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userId` int(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `departmentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `fname`, `lname`, `password`, `departmentId`) VALUES(2000, 'Jensen', 'Ackles', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'DCIT');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

DROP TABLE IF EXISTS `user_course`;
CREATE TABLE `user_course` (
  `userId` int(20) NOT NULL,
  `courseCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingId`),
  ADD KEY `facultyId` (`facultyId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`,`sTime`,`day`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `faculty_department`
--
ALTER TABLE `faculty_department`
  ADD PRIMARY KEY (`facultyId`,`departmentId`),
  ADD KEY `facultyId` (`facultyId`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `buildingId` (`buildingId`);

--
-- Indexes for table `room_course`
--
ALTER TABLE `room_course`
  ADD PRIMARY KEY (`roomId`,`courseCode`),
  ADD KEY `roomId` (`roomId`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`userId`,`courseCode`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `userId` (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`);

--
-- Constraints for table `faculty_department`
--
ALTER TABLE `faculty_department`
  ADD CONSTRAINT `faculty_department_ibfk_1` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`),
  ADD CONSTRAINT `faculty_department_ibfk_2` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`buildingId`) REFERENCES `building` (`buildingId`);

--
-- Constraints for table `room_course`
--
ALTER TABLE `room_course`
  ADD CONSTRAINT `room_course_ibfk_1` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`),
  ADD CONSTRAINT `room_course_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`);

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
