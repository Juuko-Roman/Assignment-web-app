-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2022 at 09:43 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Kindercare `
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar (20) NOT NULL UNIQUE,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstName`, `lastName`,`username`,`password`,`phoneNo`,`regDate`,`updationDate`,`status`) VALUES
(1, 'Watera', 'Sheilah', 'Watesha','1234','755485538','2022-01-30 14:10:50','2020-05-08 14:16:22', 1);


-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
CREATE TABLE IF NOT EXISTS `pupil` (
  `userCode` varchar(20) NOT NULL ,
  `lName` varchar(10) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone_number` int (20) NOT NULL UNIQUE,
  `Status` VARCHAR(11) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`userCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`userCode`, `lName`, `fName`,`Sex`,`phone_number`) VALUES
('A100', 'Juuko', 'Roman', 'male','0754026504'),
('A101', 'Nagawa', 'Hiratu', 'female','0754026505'),
('A102', 'Nakibuule', 'Elizabeth', 'female','0754026506'),
('A103', 'Ndaula', 'Trevor', 'male','0754026507'),
('A104', 'Kisakye', 'Esther', 'female','0754026508'),
('A105', 'Mugwanya', 'Derrick', 'male','0754026509'),
('A106', 'Asiimwe', 'cathy', 'female','0754026510'),
('A107', 'Kitonsa', 'Elvis', 'male','0774026504');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'nagawa017', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:43', '', 0),
(2, 1, 'mulungi017', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(3, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0),
(4, 1, 'mulungi017', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(5, 1, 'mulungi017', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(6, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0),
(7, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0),
(8, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0),
(9, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0),
(10, 0, 'Watesha', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 0);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '1234', '07-01-2022 01:56:47 PM');

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `assignmentNo` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `noOfChars` int NOT NULL,
  `Characters` varchar(16) NOT NULL,
  `attemptDate` date NOT NULL,
  `dateUploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_time` Time NOT NULL,
  `end_time` Time NOT NULL,
  `duration` int(20) NOT NULL,
  `assignment_status` varchar(20) NOT NULL,
  PRIMARY KEY (`assignmentNo`),
  constraint `fk5` FOREIGN KEY(`teacher_id`) REFERENCES teacher(`teacher_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` VALUES
(1, '1', '5', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(2, '1', '4', 'F,G,H,I','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(3, '1', '6', 'B,C,D,E,F,G','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(4, '1', '4', 'G,H,I,J','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(5, '1', '7', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(6, '1', '5', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(7, '1', '8', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(8, '1', '8', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(9, '1', '6', 'A,B,C,D,E,Z','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired'),
(10, '1', '3', 'A,B,C,D,E','2022-02-03','07-01-2022 01:56:47 PM','10:00:00','10:30:00','30','Expired');

--
-- Table structure for table `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_request`
--

DROP TABLE IF EXISTS `activation_request`;
CREATE TABLE IF NOT EXISTS `activation_request` (
  `request_id` int(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pupil_userCode` varchar(20) NOT NULL ,
  `request` varchar(30),
  constraint `fk2` FOREIGN KEY(`pupil_userCode`) REFERENCES pupil(`userCode`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Dumping data for table `assignment`
--

INSERT INTO `activation_request` VALUES
(001, 'A100', 'plaese activate me'),
(002, 'A101', 'need to be activated');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

DROP TABLE IF EXISTS `attempt`;
CREATE TABLE IF NOT EXISTS `attempt` (
  `attempt_id` int NOT NULL AUTO_INCREMENT,
  `pupil_userCode` varchar(20) NOT NULL,
  `assignmentNo` int NOT NULL,
  `teacher_id` int NOT NULL,
  `duration` int(5) NOT NULL,
  `percentageCompleted` int(3),
  `percentageMissed` int(3),
  PRIMARY KEY (`attempt_id`),
  constraint `fkey2` FOREIGN KEY(`pupil_userCode`) REFERENCES pupil(`userCode`) ,
  constraint `fkey` FOREIGN KEY(`assignmentNo`) REFERENCES assignment(`assignmentNo`) ,
  constraint `fkey6` FOREIGN KEY(`teacher_id`)REFERENCES teacher(`teacher_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` VALUES
(1, 'A100', '1', '1','20','70','30'),
(2, 'A101', '1', '1','14','100','0');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `teacher_id` int NOT NULL,
  `pupil_userCode` varchar(20) NOT NULL,
  `assignmentNo` int NOT NULL AUTO_INCREMENT,
  `score` varchar(10) NOT NULL,
  `comment` varchar(25) NOT NULL,
  PRIMARY KEY (`assignmentNo`,`pupil_userCode`,`teacher_id`),
  constraint `fkey3` FOREIGN KEY(`pupil_userCode`) REFERENCES pupil(`userCode`) ,
  constraint `fkey4` FOREIGN KEY(`assignmentNo`) REFERENCES assignment(`assignmentNo`) ,
  constraint `fke7` FOREIGN KEY(`teacher_id`) REFERENCES teacher(`teacher_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` VALUES
(1, 'A100', '1', '100.0','Excellent'),
(1, 'A101', '1', '87.5','Very Good'),
(1, 'A102', '1', '57.8','More Effort Needed'),
(1, 'A103', '2', '80.5','Good'),
(1, 'A104', '2', '70.3','Fairy Good'),
(1, 'A105', '3', '100.0','Excellent'),
(1, 'A106', '3', '50.0','More Effort Needed'),
(1, 'A107', '4', '97.3','Exccellent'),
(1, 'A108', '5', '100.0','Excellent'),
(1, 'A109', '6', '57.3','More Effort Needed');


-- -------------------------------------------------------- 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
