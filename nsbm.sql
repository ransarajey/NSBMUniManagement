-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 10:24 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventClub` varchar(20) NOT NULL,
  `eventDate` date NOT NULL,
  `eventFrom` time NOT NULL,
  `eventTo` time NOT NULL,
  `eventName` varchar(40) NOT NULL,
  `eventImage` varchar(200) NOT NULL,
  `eventStatus` tinyint(1) NOT NULL DEFAULT '1',
  `eventHall` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventClub`, `eventDate`, `eventFrom`, `eventTo`, `eventName`, `eventImage`, `eventStatus`, `eventHall`) VALUES
(1, '', '2020-05-08', '13:45:00', '15:45:00', 'Test', '', 1, NULL),
(2, '', '2020-05-08', '13:50:00', '15:50:00', 'test', '', 1, NULL),
(3, '', '2020-05-15', '12:12:00', '21:12:00', '12', '', 1, NULL),
(4, '', '2020-05-15', '12:12:00', '21:12:00', '12', '', 1, NULL),
(5, 'IEEE', '2020-05-15', '12:00:00', '14:00:00', 'adada', '', 1, NULL),
(6, 'IEEE', '2020-05-16', '01:00:00', '02:00:00', 'sfsf', 'tickdesgin13.png', 1, NULL),
(7, 'IEEE', '2020-05-16', '01:00:00', '02:00:00', 'sfsf', 'tickdesgin13.png', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `hallID` int(11) NOT NULL,
  `hallName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`hallID`, `hallName`) VALUES
(1, 'C001'),
(2, 'C002'),
(3, 'C003'),
(4, 'C004'),
(5, 'C005');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lectureID` int(11) NOT NULL,
  `lectureBatch` varchar(20) NOT NULL,
  `lectureDate` date NOT NULL,
  `lectureFrom` time NOT NULL,
  `lectureTo` time NOT NULL,
  `lectureName` varchar(40) NOT NULL,
  `lectureLecturer` varchar(30) NOT NULL,
  `lectureStatus` tinyint(1) NOT NULL DEFAULT '1',
  `lectureHall` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lectureID`, `lectureBatch`, `lectureDate`, `lectureFrom`, `lectureTo`, `lectureName`, `lectureLecturer`, `lectureStatus`, `lectureHall`) VALUES
(33, '18.1', '2020-05-03', '07:00:00', '11:00:00', 'Test 1', 'Test 1', 1, 'C002'),
(34, '18.1', '2020-05-03', '06:00:00', '07:00:00', 'Test 2', 'Test 2', 1, 'C001'),
(43, '18.1', '2020-05-03', '07:00:00', '11:00:00', 'duplicate', 'Test 1', 1, NULL),
(45, '18.1', '2020-05-05', '12:21:00', '15:12:00', 'adad', 'dad', 1, NULL),
(46, '18.1', '2020-05-07', '13:13:00', '15:13:00', '131', '13', 1, 'C001'),
(47, '19.1', '2020-05-07', '15:00:00', '14:00:00', 'adad', 'a', 1, 'C002');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(10) NOT NULL,
  `studentName` varchar(40) NOT NULL,
  `studentEmail` varchar(60) NOT NULL,
  `studentBatch` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `studentEmail`, `studentBatch`) VALUES
(10023517, 'Ransara Wijayasundara', 'ransarajey@mail.com', '18.1');

-- --------------------------------------------------------

--
-- Table structure for table `studyrooms`
--

CREATE TABLE `studyrooms` (
  `studyRoomID` int(11) NOT NULL,
  `studyRoomName` varchar(20) NOT NULL,
  `studyRoomAvailability` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studyrooms`
--

INSERT INTO `studyrooms` (`studyRoomID`, `studyRoomName`, `studyRoomAvailability`) VALUES
(1, 'C104', 1),
(2, 'C105', 0),
(3, 'C106', 1),
(4, 'C203', 1),
(5, 'C204', 1),
(6, 'C205', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studyroomsreservations`
--

CREATE TABLE `studyroomsreservations` (
  `reservationID` int(11) NOT NULL,
  `reservationDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservationStudyRoom` varchar(20) NOT NULL,
  `reservationStudentID` int(10) NOT NULL,
  `reservationPeriod` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studyroomsreservations`
--

INSERT INTO `studyroomsreservations` (`reservationID`, `reservationDateTime`, `reservationStudyRoom`, `reservationStudentID`, `reservationPeriod`) VALUES
(3, '2020-05-01 18:19:08', 'C106', 10023517, 0.5),
(4, '2020-05-01 18:44:21', 'C104', 10023517, 0.5),
(5, '2020-05-01 18:58:23', 'C105', 10023517, 0.5),
(6, '2020-05-01 19:02:40', 'C105', 10023517, 1),
(7, '2020-05-05 20:27:12', 'C104', 10023517, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, 'tickdesgin13.png'),
(5, 'tickdesgin13.png'),
(6, 'BG.jpg'),
(7, 'BG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userDP` varchar(50) DEFAULT NULL,
  `userEmail` varchar(20) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userDP`, `userEmail`, `userPassword`) VALUES
(1, 'Ransara Wijayasundara', NULL, 'ransarajey@gmail.com', 'e6e061838856bf47e1de730719fb2609');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hallName`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lectureID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studyrooms`
--
ALTER TABLE `studyrooms`
  ADD PRIMARY KEY (`studyRoomName`);

--
-- Indexes for table `studyroomsreservations`
--
ALTER TABLE `studyroomsreservations`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `reservationStudentID` (`reservationStudentID`),
  ADD KEY `reservationStudyRoom` (`reservationStudyRoom`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `studyroomsreservations`
--
ALTER TABLE `studyroomsreservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studyroomsreservations`
--
ALTER TABLE `studyroomsreservations`
  ADD CONSTRAINT `studyroomsreservations_ibfk_1` FOREIGN KEY (`reservationStudentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `studyroomsreservations_ibfk_2` FOREIGN KEY (`reservationStudyRoom`) REFERENCES `studyrooms` (`studyRoomName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
