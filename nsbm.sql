-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 08:13 PM
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintID` int(11) NOT NULL,
  `complaintText` varchar(500) NOT NULL,
  `complaintAssignedTo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintID`, `complaintText`, `complaintAssignedTo`) VALUES
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '');

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
(17, 'IEEE', '2020-05-15', '08:00:00', '12:00:00', 'IEEE Day', 'ieeeday2019.png', 1, NULL),
(18, 'AARC', '2020-05-20', '15:00:00', '16:00:00', 'AAARC Gathering', 'aarc.jpg', 1, NULL);

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
-- Stand-in structure for view `hallview`
-- (See below for the actual view)
--
CREATE TABLE `hallview` (
`reservOwner` varchar(20)
,`reservDate` date
,`reservFrom` time
,`reservTo` time
,`reservHall` varchar(30)
);

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
(5, '18.1', '2020-05-13', '09:00:00', '12:00:00', 'Introduction to IoT', 'Dr. Chandana Perera', 1, 'C001'),
(6, '18.1', '2020-05-13', '14:00:00', '17:00:00', 'Servers, Datacenters and Cloud', 'Mr. Chamindra Attanayake', 1, 'C001'),
(7, '18.1', '2020-05-12', '09:00:00', '12:00:00', 'Integrating Project', 'Ms. Dileeka Alwis', 1, 'C001'),
(8, '18.1', '2020-05-12', '14:00:00', '17:00:00', 'Human Computer Interaction', 'Ms. Pavithra Subhashini', 1, 'C001'),
(9, '19.1', '2020-05-12', '09:00:00', '12:00:00', 'Network & System Administration', 'Dr. Lasith Gunawardena', 1, NULL),
(10, '19.1', '2020-05-12', '14:00:00', '17:00:00', 'Computer Networks', 'Mr. Chamindra Attanayake', 1, NULL),
(11, '19.1', '2020-05-13', '09:00:00', '12:00:00', 'Network and Security Programming', 'Mr. Harshapriya Rajakaruna', 1, NULL),
(13, '19.1', '2020-05-13', '14:00:00', '17:00:00', 'Distributed Systems', 'Mr. Rasika Alahakoon', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shuttles`
--

CREATE TABLE `shuttles` (
  `shuttleID` int(11) NOT NULL,
  `shuttleFrom` varchar(20) NOT NULL,
  `shuttleTime` time NOT NULL,
  `shuttleNo` varchar(20) NOT NULL,
  `shuttleIcon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shuttles`
--

INSERT INTO `shuttles` (`shuttleID`, `shuttleFrom`, `shuttleTime`, `shuttleNo`, `shuttleIcon`) VALUES
(4, 'NSBM', '09:00:00', 'NB-1200', 'sh1.png'),
(5, 'NSBM', '12:00:00', 'NA-1450', 'sh2.png'),
(6, 'Makubura', '09:00:00', 'NH-8723', 'sh3.png'),
(7, 'Makubura', '12:00:00', 'NA-8621', 'sh4.png'),
(8, 'NSBM', '07:00:00', 'NH-8723', 'sh3.png'),
(9, 'NSBM', '14:00:00', 'NA-8621', 'sh4.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(10) NOT NULL,
  `studentName` varchar(40) NOT NULL,
  `studentEmail` varchar(60) NOT NULL,
  `studentBatch` varchar(5) NOT NULL,
  `studentPassword` varchar(200) NOT NULL,
  `studentDP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `studentEmail`, `studentBatch`, `studentPassword`, `studentDP`) VALUES
(10023517, 'Ransara Wijayasundara', 'ransarajey@gmail.com', '18.1', '202cb962ac59075b964b07152d234b70', ''),
(10026021, 'Hasith Gunathilake', 'hasith@gmail.com', '19.1', '202cb962ac59075b964b07152d234b70', 'hasith.jpg'),
(10026026, 'Kasun Rukmaldeniya', 'kasun@gmail.com', '18.1', '202cb962ac59075b964b07152d234b70', 'ruk.jpg');

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
(1, 'C104', 0),
(2, 'C105', 1),
(3, 'C106', 1),
(4, 'C203', 1),
(5, 'C204', 0),
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
(7, '2020-05-05 20:27:12', 'C104', 10023517, 0.5),
(8, '2020-05-12 07:36:27', 'C104', 10023517, 0.5),
(9, '2020-05-12 07:47:41', 'C104', 10023517, 0.5),
(10, '2020-05-12 17:45:34', 'C204', 10023517, 0.5);

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

-- --------------------------------------------------------

--
-- Structure for view `hallview`
--
DROP TABLE IF EXISTS `hallview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hallview`  AS  select distinct `lectures`.`lectureBatch` AS `reservOwner`,`lectures`.`lectureDate` AS `reservDate`,`lectures`.`lectureFrom` AS `reservFrom`,`lectures`.`lectureTo` AS `reservTo`,`lectures`.`lectureHall` AS `reservHall` from `lectures` union select distinct `events`.`eventClub` AS `reservOwner`,`events`.`eventDate` AS `reservDate`,`events`.`eventFrom` AS `reservFrom`,`events`.`eventTo` AS `reservTo`,`events`.`eventHall` AS `reservHall` from `events` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintID`);

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
-- Indexes for table `shuttles`
--
ALTER TABLE `shuttles`
  ADD PRIMARY KEY (`shuttleID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shuttles`
--
ALTER TABLE `shuttles`
  MODIFY `shuttleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studyroomsreservations`
--
ALTER TABLE `studyroomsreservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
