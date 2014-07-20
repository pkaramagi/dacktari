-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 03:56 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daktari`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_of_appointment` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(300) DEFAULT NULL,
  `dateCreated` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `googleEventID` varchar(200) DEFAULT NULL,
  `starttime` varchar(200) DEFAULT NULL,
  `endtime` varchar(200) DEFAULT NULL,
  `chg_reason` text,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `doctor_id`, `patient_id`, `status`, `date_of_appointment`, `title`, `link`, `dateCreated`, `location`, `googleEventID`, `starttime`, `endtime`, `chg_reason`, `description`) VALUES
(5, NULL, 18, 1, 'pending', NULL, 'to enjoy super with you', 'https://www.google.com/calendar/event?eid=cGEwYXUyOGoxNGdiaGN1MWozYW5ibjBlMW8gcGthcmFtYWdpMUBt', '2012-10-12T18:56:59.000Z', NULL, 'pa0au28j14gbhcu1j3anbn0e1o', '2012-10-13T19:31:02-07:00', '2012-10-13T20:01:02-07:00', NULL, 'need treatment, i have a terrible headache'),
(4, NULL, 18, NULL, 'pending', NULL, 'ddkk', NULL, NULL, NULL, NULL, '2012-10-12T00:59:46-07:00', '2012-10-12T01:29:46-07:00', NULL, 'ddddd'),
(6, NULL, 18, 1, 'pending', NULL, 'fkfkq', NULL, NULL, NULL, NULL, '2012-10-12T20:15:30-07:00', '2012-10-12T20:45:30-07:00', NULL, 'whats up'),
(7, NULL, 3, 1, 'pending', NULL, 'to see slsls', NULL, NULL, NULL, NULL, '2012-10-13T21:04:05-07:00', '2012-10-14T21:34:05-07:00', NULL, 'whhehehe'),
(14, NULL, 18, 7, 'cancelled', NULL, 'dsd', 'https://www.google.com/calendar/event?eid=ajIyanJkMDg1YzdrMWsxdDEwcjFwZThlcGMgcGthcmFtYWdpMUBt', '2012-10-14T13:04:46.000Z', NULL, 'j22jrd085c7k1k1t10r1pe8epc', '2012-10-15T15:14:41-07:00', '2012-10-31T15:44:41-07:00', NULL, 'sdd'),
(15, NULL, 18, 7, 'confirmed', NULL, 'dsd', 'https://www.google.com/calendar/event?eid=aG04ZTVybnNyaHJpaWhvcGhnNWx0aTU1OGMga3JhYnowMUBt', '2012-10-14T13:03:45.000Z', NULL, 'hm8e5rnsrhriihophg5lti558c', '2012-10-30T15:15:01-07:00', '2012-10-31T15:45:01-07:00', 'jjjjjjjjjjjjjjjjjjjjjjj', 'sdsd'),
(16, NULL, 3, 7, 'confirmed', NULL, 'sdsd', 'https://www.google.com/calendar/event?eid=aDgxN21tN2dscGM2bnJxazNxbGVvczZsbTQga3JhYnowMUBt', '2012-10-14T13:04:32.000Z', NULL, 'h817mm7glpc6nrqk3qleos6lm4', '2012-10-22T15:15:36-07:00', '2012-10-31T15:45:36-07:00', 'fffffffffffffffffffffffff', 'd'),
(12, NULL, 18, 7, 'cancelled', NULL, 'ddd', 'https://www.google.com/calendar/event?eid=dmFpNG84M25yNWEzOGk3NDF2MDhsYm1qYzggcGthcmFtYWdpMUBt', '2012-10-14T10:58:11.000Z', NULL, 'vai4o83nr5a38i741v08lbmjc8', '2012-10-15T13:57:18-07:00', '2012-10-15T14:28:18-07:00', 'sssssssssssssssss', 'eweeeeeee'),
(13, NULL, 18, 7, 'confirmed', NULL, 'pHILL', 'https://www.google.com/calendar/event?eid=cmppY2drbXVxOHNmcGd1MzNrZ2RrN2gwcGcgcGthcmFtYWdpMUBt', '2012-10-14T12:12:41.000Z', NULL, 'rjicgkmuq8sfpgu33kgdk7h0pg', '2012-10-15T15:11:06-07:00', '2012-10-31T15:41:06-07:00', NULL, 'DONE'),
(17, NULL, 18, 15, 'pending', NULL, 'ksksk', NULL, NULL, NULL, NULL, '2012-10-14T17:57:29-07:00', '2012-10-14T18:27:29-07:00', NULL, 'wwwwwwwwwwwwwww'),
(18, NULL, 3, NULL, 'pending', NULL, 'xxxxxxxxxxx', NULL, NULL, NULL, NULL, '2012-10-14T19:52:08-07:00', '2012-10-14T20:22:08-07:00', NULL, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `speciality` varchar(250) DEFAULT NULL,
  `qualification` varchar(500) DEFAULT NULL,
  `folder_id` varchar(250) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(8) DEFAULT NULL,
  `photo` varchar(300) NOT NULL,
  `refresh_token` varchar(250) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `speciality`, `qualification`, `folder_id`, `date_of_birth`, `sex`, `photo`, `refresh_token`, `type`) VALUES
(3, 'semakula kraiba', 'krabz01@gmail.com', 'sadsda', '', '0BzOgEdqzJNPAZUd4VnROMVl1dk0', '0000-00-00', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/Td4nT2nDQyzoAYdPm-KqWxZx0TKrgTFHOR0jeHUc5AE', 2),
(18, 'phillip karamagi', 'pkaramagi1@gmail.com', 'Chilling, Neural Surgery', 'Masters in Chilling', '0B8B8vaNxRldTRjJudUVBbzVnekE', '0000-00-00', 'm', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', '1/YN_WsS5tmYJ5-WJOTNOzvHNnMkJrclfpEg1n3OyuTZM', 2),
(19, 'Tyra johnson', 'krabz08@gmail.com', 'Disection', 'Surgeon', '0B6GRGAQTPxWDclhQVXNSd21JM1k', NULL, 'f', 'http://localhost/life/images/default_avatar.jpg', '1/b8FbCkmIWQq6ToywINpmWDOCvUVCpDUDkwhTGhblYbA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `glogin_users`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daktari`.`glogin_users` AS select `daktari`.`hospital`.`name` AS `name`,`daktari`.`hospital`.`email` AS `email`,`daktari`.`hospital`.`photo` AS `photo`,`daktari`.`hospital`.`type` AS `type`,`daktari`.`hospital`.`refresh_token` AS `refresh_token` from `daktari`.`hospital` union select `daktari`.`doctor`.`name` AS `name`,`daktari`.`doctor`.`email` AS `email`,`daktari`.`doctor`.`photo` AS `photo`,`daktari`.`doctor`.`type` AS `type`,`daktari`.`doctor`.`refresh_token` AS `refresh_token` from `daktari`.`doctor` union select `daktari`.`patient`.`name` AS `name`,`daktari`.`patient`.`email` AS `email`,`daktari`.`patient`.`photo` AS `photo`,`daktari`.`patient`.`type` AS `type`,`daktari`.`patient`.`refresh_token` AS `refresh_token` from `daktari`.`patient`;

--
-- Dumping data for table `glogin_users`
--

INSERT INTO `glogin_users` (`name`, `email`, `photo`, `type`, `refresh_token`) VALUES
('International Hospital Kampala', 'ihk@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, NULL),
('Mulago Hospital', 'mulagoh@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, NULL),
('Mark Lubega', 'lubegamark@gmail.com', 'https://lh3.googleusercontent.com/-SijJQI2AUys/AAAAAAAAAAI/AAAAAAAAACw/46yy18xQhmc/photo.jpg', 3, NULL),
('semakula kraiba', 'krabz01@gmail.com', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0'),
('semakula kraiba', 'krabz01@gmail.com', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 2, '1/Td4nT2nDQyzoAYdPm-KqWxZx0TKrgTFHOR0jeHUc5AE'),
('phillip karamagi', 'pkaramagi1@gmail.com', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', 2, '1/YN_WsS5tmYJ5-WJOTNOzvHNnMkJrclfpEg1n3OyuTZM'),
('Tyra johnson', 'krabz08@gmail.com', 'http://localhost/life/images/default_avatar.jpg', 2, '1/b8FbCkmIWQq6ToywINpmWDOCvUVCpDUDkwhTGhblYbA'),
('Mark Lubega', 'lubegamark@gmail.com', 'https://lh3.googleusercontent.com/-SijJQI2AUys/AAAAAAAAAAI/AAAAAAAAACw/46yy18xQhmc/photo.jpg', 1, '1/aJwC_Qx9VcagXgseqRHb7IEXmz8Tvs-_EBr-AhAenVY'),
('semakula kraiba', 'krabz01@gmail.com', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 1, '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY'),
('phillip karamagi', 'pkaramagi1@gmail.com', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', 1, '1/iVb1fm63gsJuHZWzT56zexWcWaVl1vKnBSLHO6EUFg0'),
('smiley katanga', 'smileykatanga@gmail.com', 'http://localhost/life/images/default_avatar.jpg', 1, '1/ZJQJHNaTuDgz_RYM3OksN7Y4a8zowNb7hvIsyFqToJM');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `logitude` double DEFAULT NULL,
  `refresh_token` varchar(250) DEFAULT NULL,
  `photo` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  `folder_id` varchar(250) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `location`, `latitude`, `logitude`, `refresh_token`, `photo`, `type`, `folder_id`, `status`) VALUES
(1, 'International Hospital Kampala', 'ihk@gmail.com', 'Namuwongo', NULL, NULL, NULL, 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, '', 'pending'),
(2, 'Mulago Hospital', 'mulagoh@gmail.com', NULL, NULL, NULL, NULL, 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, '', 'pending'),
(3, 'Mark Lubega', 'lubegamark@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/-SijJQI2AUys/AAAAAAAAAAI/AAAAAAAAACw/46yy18xQhmc/photo.jpg', 3, '', 'pending'),
(4, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPAZ09yVDlTOHVVcjA', 'pending'),
(5, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPAR0NjZGJKNkpNTXM', 'pending'),
(6, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPASHdTcGppMjY1aGc', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_doctor`
--

CREATE TABLE IF NOT EXISTS `hospital_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `status` enum('pending','approved') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hospital_doctor`
--

INSERT INTO `hospital_doctor` (`id`, `hospital_id`, `doctor_id`, `status`) VALUES
(2, 3, 2, 'approved'),
(3, 1, 8, 'approved'),
(4, 2, 7, 'approved'),
(5, 1, 15, 'pending'),
(6, 2, 15, 'pending'),
(7, 0, 15, 'pending'),
(8, 1, 16, ''),
(9, 3, 3, 'approved'),
(11, 2, 17, ''),
(12, 1, 18, ''),
(13, 3, 18, 'pending'),
(14, 3, 19, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_patient`
--

CREATE TABLE IF NOT EXISTS `hospital_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `hospital_patient`
--

INSERT INTO `hospital_patient` (`id`, `hospital_id`, `patient_id`) VALUES
(1, 3, 2),
(2, 3, 1),
(3, 2, 8),
(4, 1, 8),
(5, 3, 8),
(6, 0, 8),
(7, 2, 9),
(8, 1, 9),
(9, 3, 9),
(10, 0, 9),
(11, 2, 10),
(12, 1, 10),
(13, 3, 10),
(14, 0, 10),
(15, 3, 11),
(16, 2, 11),
(17, 0, 11),
(18, 2, 12),
(19, 3, 12),
(20, 0, 12),
(21, 1, 13),
(22, 2, 13),
(23, 3, 13),
(24, 0, 13),
(25, 3, 14),
(26, 1, 15),
(27, 3, 15),
(28, 2, 15),
(29, 1, 16),
(30, 2, 16),
(31, 3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `notification` text,
  `flag` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `title`, `notification`, `flag`) VALUES
(1, 'pkaramagi1@gmail.com', '', 'smiley katanga would like to arrange an appointment with you', NULL),
(2, 'krabz01@gmail.com', '', 'smiley katanga would like to arrange an appointment with you', NULL),
(3, 'krabz01@gmail.com', '', 'smiley katanga would like to arrange an appointment with you', NULL),
(4, '3', 'dasd', 'asdfrom  ', 0),
(5, '3', 'asd', 'asdad from  ', 0),
(6, '3', 'das', 'sdad from  phillip karamagi', 0),
(7, '3', 'qwrrtrrrrttt', 'semakula from  semakula kraiba', 0),
(8, '3', 'Malaria', 'Bells from  semakula kraiba', 0),
(9, '3', 'Stomach Ache', 'My stomach Hearts from  semakula kraiba', 0),
(10, '3', 'hi', 'hi from  semakula kraiba', 0),
(11, '3', 'd', 'd from  semakula kraiba', 0),
(12, '3', 'Fedex', 'descrpiv from  semakula kraiba', 0),
(13, '3', 'Kraiba', 'taseee from  phillip karamagi', 0),
(14, '18', 'Ding', 'Dong from  semakula kraiba', 0),
(15, '18', 'd', 'd from  semakula kraiba', 0),
(16, '18', 'd', 'd from  semakula kraiba', 0),
(17, '18', 'd', 'd from  semakula kraiba', 0),
(18, '18', 'hello', 'k= from  semakula kraiba', 0),
(19, '18', 'ds', 'sds from  semakula kraiba', 0),
(20, '18', 'sd', 'sd from  semakula kraiba', 0),
(21, '18', 'sds', 'sdsd from  semakula kraiba', 0),
(22, '18', 'sds', 'sdsd from  semakula kraiba', 0),
(23, '3', 'sdsd', 'sdsd from  semakula kraiba', 0),
(24, '18', 'sd', 'dsds from  semakula kraiba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `folder_id` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(8) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `refresh_token` varchar(250) DEFAULT NULL,
  `date_of_entry` date DEFAULT NULL,
  `type` int(11) NOT NULL,
  `condition` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `folder_id`, `date_of_birth`, `sex`, `photo`, `refresh_token`, `date_of_entry`, `type`, `condition`) VALUES
(16, 'Mark Lubega', 'lubegamark@gmail.com', '0ByKQ3YjyUAq3cVQ4UUZFUUFJSm8', '1990-07-01', 'm', 'https://lh3.googleusercontent.com/-SijJQI2AUys/AAAAAAAAAAI/AAAAAAAAACw/46yy18xQhmc/photo.jpg', '1/aJwC_Qx9VcagXgseqRHb7IEXmz8Tvs-_EBr-AhAenVY', '2012-10-14', 1, 'eeee'),
(7, 'semakula kraiba', 'krabz01@gmail.com', '0BzOgEdqzJNPAV2xvUktiOXVXS00', '1991-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-02', 1, 'Lame, ppliea'),
(12, 'phillip karamagi', 'pkaramagi1@gmail.com', '0B8B8vaNxRldTQWwzZWxWT3lKdTQ', '1991-01-07', 'm', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', '1/iVb1fm63gsJuHZWzT56zexWcWaVl1vKnBSLHO6EUFg0', '2012-10-03', 1, ''),
(15, 'smiley katanga', 'smileykatanga@gmail.com', '0B-p6OBtyRkSHR1FjUGhVWVV4azQ', '1991-01-07', 'm', 'http://localhost/life/images/default_avatar.jpg', '1/ZJQJHNaTuDgz_RYM3OksN7Y4a8zowNb7hvIsyFqToJM', '2012-10-14', 1, 'asthama');

-- --------------------------------------------------------

--
-- Table structure for table `patient_doctor`
--

CREATE TABLE IF NOT EXISTS `patient_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `collab` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`id`, `patient_id`, `doctor_id`, `collab`) VALUES
(1, 7, 3, 3),
(2, 7, 0, 3),
(3, 7, 0, 3),
(4, 7, 0, 3),
(5, 7, 0, 3),
(6, 7, 0, 3),
(7, 7, 0, 3),
(8, 0, 7, 3),
(9, 8, 0, 3),
(10, 8, 0, 3),
(11, 8, 0, 3),
(12, 8, 0, 3),
(13, 8, 0, 3),
(14, 8, 0, 3),
(15, 8, 0, 3),
(16, 8, 0, 3),
(17, 9, 0, 3),
(18, 9, 0, 3),
(19, 9, 0, 3),
(20, 9, 0, 3),
(21, 9, 0, 3),
(22, 9, 0, 3),
(23, 9, 0, 0),
(24, 12, 3, 0),
(25, 12, 12, 0),
(26, 12, 11, 0),
(27, 12, 19, 4),
(28, 10, 8, 0),
(29, 10, 3, 0),
(30, 10, 13, 0),
(31, 10, 9, 3),
(32, 10, 0, 3),
(33, 12, 12, 3),
(34, 11, 11, 3),
(35, 11, 10, 3),
(36, 11, 14, 3),
(37, 11, 9, 3),
(38, 11, 0, 3),
(39, 12, 13, 3),
(40, 12, 9, 3),
(41, 12, 12, 3),
(42, 12, 0, 3),
(43, 13, 10, 3),
(44, 13, 9, 3),
(45, 13, 0, 3),
(46, 14, 19, 3),
(47, 14, 18, 3),
(48, 14, 3, 3),
(49, 14, 0, 3),
(50, 15, 3, 3),
(51, 15, 18, 3),
(52, 15, 0, 3),
(53, 16, 3, 3),
(54, 16, 18, 3),
(55, 16, 0, 3),
(56, NULL, 3, 3),
(57, 17, 19, 3),
(58, 17, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `description_r` text NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `doctor_id`, `patient_id`, `title`, `description`, `status`, `description_r`, `path`) VALUES
(1, 3, 7, 'dasd', 'asd', 5, '<h2> Daktari Prescription</h2>\r\n<h3> sad </h3>\r\n<br/>\r\n<br/>\r\nasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349975097.txt.pdf'),
(2, 3, 7, 'asd', 'asdad', 5, '<h2> Daktari Prescription</h2>\r\n<h3> sadasd </h3>\r\n<br/>\r\n<br/>\r\nasdasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349979596d..pdf'),
(3, 3, 12, 'das', 'sdad', 5, '<h2> Daktari Prescription</h2>\r\n<h3> Hos </h3>\r\n<br/>\r\n<br/>\r\nhh\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349988863..pdf'),
(4, 3, 7, 'qwrrtrrrrttt', 'semakula', 5, '<h2> Daktari Prescription</h2>\r\n<h3> Heloo </h3>\r\n<br/>\r\n<br/>\r\nasdasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349989282..pdf'),
(5, 3, 7, 'Malaria', 'Bells', 5, '\r\n<img src="http://localhost//life///images//logo.jpg" >\r\n<h2> Daktari Prescription</h2>\r\n<h3> help </h3>\r\n<br/>\r\n<br/>\r\nghh\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1349990986..pdf'),
(6, 3, 7, 'Stomach Ache', 'My stomach Hearts', 5, '\r\n\r\n<h2> Daktari Prescription</h2>\r\n<h3> Abdominal pain </h3>\r\n<br/>\r\n<br/>\r\n<h2 style="color: rgb(0, 0, 0); line-height: 1; margin-top: 24px; margin-bottom: 12px; font-size: 1.6em; font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif;">Home Care</h2><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">If you have mild abdominal pain, the following tips might be helpful:</p><ul style="margin-top: 0.8em; margin-bottom: 0.8em; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px; line-height: 16px;"><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Sip&nbsp;<a href="http://www.drugs.com/cdi/water.html" style="color: rgb(119, 136, 221); text-decoration: underline;">water</a>&nbsp;or other clear fluids.</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Avoid solid food for the first few hours.</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">If you have been vomiting, wait 6 hours, and then eat small amounts of mild foods such as rice, applesauce, or crackers. Avoid dairy products.</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">If the pain is high up in your abdomen and occurs after meals, antacids may help, especially if you feel heartburn or indigestion. Avoid citrus, high-fat foods, fried or greasy foods, tomato products,&nbsp;<a href="http://www.drugs.com/cdi/caffeine-solution.html" style="color: rgb(119, 136, 221); text-decoration: underline;">caffeine</a>, alcohol, and carbonated beverages.</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Avoid&nbsp;<a href="http://www.drugs.com/aspirin.html" style="color: rgb(119, 136, 221); text-decoration: underline;">aspirin</a>,&nbsp;<a href="http://www.drugs.com/ibuprofen.html" style="color: rgb(119, 136, 221); text-decoration: underline;">ibuprofen</a>&nbsp;or other anti-inflammatory medications, and narcotic pain medications unless your health care provider prescribes them. If you know that your pain is not related to your liver, you can try&nbsp;<a href="http://www.drugs.com/acetaminophen.html" style="color: rgb(119, 136, 221); text-decoration: underline;">acetaminophen</a>&nbsp;(<a href="http://www.drugs.com/tylenol.html" style="color: rgb(119, 136, 221); text-decoration: underline;">Tylenol</a>).</li></ul><h2 style="color: rgb(0, 0, 0); line-height: 1; margin-top: 24px; margin-bottom: 12px; font-size: 1.6em; font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif;">When to Contact a Health Professional</h2><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">Seek immediate medical help or call your local emergency number (such as 911) if you:</p><ul style="margin-top: 0.8em; margin-bottom: 0.8em; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px; line-height: 16px;"><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Are currently being treated for cancer</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Are unable to pass stool, especially if you are also vomiting</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Are vomiting blood or have blood in your stool (especially if maroon or dark, tarry black)</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have chest, neck, or shoulder pain</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have sudden, sharp abdominal pain</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have pain in, or between, your shoulder blades with nausea</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have tenderness in your belly, or your belly is rigid and hard to the touch</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Are pregnant or could be pregnant</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Had a recent injury to your abdomen</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have difficulty breathing</li></ul><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">Call your doctor if you have:</p><ul style="margin-top: 0.8em; margin-bottom: 0.8em; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px; line-height: 16px;"><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Abdominal discomfort that lasts 1 week or longer</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Abdominal pain that does not improve in 24 - 48 hours, or becomes more severe and frequent and occurs with nausea and vomiting</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Bloating that persists for more than 2 days</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Burning sensation when you urinate or frequent urination</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Diarrhea for more than 5 days</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Fever (over 100Â°F for adults or 100.4Â°F for children) with your pain</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Prolonged poor appetite</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Prolonged vaginal bleeding</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Unexplained weight loss</li></ul><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">Your health care provider will perform a physical exam and ask questions about your symptoms and medical history. Your specific symptoms, the location of pain and when it occurs will help your health care provider diagnosis the cause.</p><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">You may be asked the following questions:</p><ul style="margin-top: 0.8em; margin-bottom: 0.8em; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px; line-height: 16px;"><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Where do you feel the pain?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Is the pain all over or in a specific location?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Does the pain move into your back, groin, or down your legs?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Is the pain severe, sharp, or cramping?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Do you have it all the time or does it come and go?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Does the pain wake you up at night?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have you had similar pain in the past? How long has each episode lasted?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">When does the pain occur? For example, after meals or during menstruation?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">What makes the pain worse? For example, eating, stress, or lying down?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">What makes the pain better? For example, drinking milk, having a bowel movement, or taking an antacid?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">What medications are you taking?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Have you had a recent injury?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Are you pregnant?</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">What other symptoms do you have?</li></ul><p style="margin-top: 0.8em; margin-bottom: 0.8em; line-height: 1.4; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px;">Tests that may be done include:</p><ul style="margin-top: 0.8em; margin-bottom: 0.8em; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, ''Nimbus Sans L'', sans-serif; font-size: 14px; line-height: 16px;"><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Barium enema</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Blood, urine, and stool tests</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;"><a href="http://www.drugs.com/enc/abdominal-ct-scan.html" style="color: rgb(119, 136, 221); text-decoration: underline;">CT scan</a></li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;"><a href="http://www.drugs.com/enc/colonoscopy.html" style="color: rgb(119, 136, 221); text-decoration: underline;">Colonoscopy</a>&nbsp;or&nbsp;<a href="http://www.drugs.com/enc/sigmoidoscopy.html" style="color: rgb(119, 136, 221); text-decoration: underline;">sigmoidoscopy</a></li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">EKG (electrocardiogram) or heart tracing</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;"><a href="http://www.drugs.com/enc/abdominal-ultrasound.html" style="color: rgb(119, 136, 221); text-decoration: underline;">Ultrasound of the abdomen</a></li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;">Upper GI and small bowel series</li><li style="margin-bottom: 0.6em; margin-left: 2em; list-style: disc; line-height: 1.2;"><a href="http://www.drugs.com/enc/abdominal-x-ray.html" style="color: rgb(119, 136, 221); text-decoration: underline;">X-rays of the abdomen</a></li></ul>\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1350067974inal_pain..pdf'),
(7, 3, 7, 'hi', 'hi', 5, '', ''),
(8, 3, 7, 'HI', 'hello', 1, '\r\n\r\n<h2> Daktari Prescription</h2>\r\n<h3> kkkk </h3>\r\n<br/>\r\n<br/>\r\nkkkkkkkkkkkkkkkkkk\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1350233060..pdf'),
(9, 3, 7, 'he', 'asd', 0, '', ''),
(10, 3, 7, 'd', 'd', 0, '', ''),
(11, 3, 7, 'Fedex', 'descrpiv', 1, '\r\n\r\n<h2> Daktari Prescription</h2>\r\n<h3> km </h3>\r\n<br/>\r\n<br/>\r\n,klkkkkkkkkkkkkk\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1350233090..pdf'),
(12, 3, 12, 'Kraiba', 'taseee', 1, '\r\n\r\n<h2> Daktari Prescription</h2>\r\n<h3> re </h3>\r\n<br/>\r\n<br/>\r\nerrr\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1350232650..pdf'),
(13, 18, 7, 'Ding', 'Dong', 5, '', ''),
(14, 18, 7, 'd', 'd', 5, '', ''),
(15, 18, 7, 'd', 'd', 5, '', ''),
(16, 18, 7, 'd', 'd', 5, '', ''),
(17, 18, 7, 'hello', 'k=', 5, '', ''),
(18, 18, 7, 'ds', 'sds', 5, '', ''),
(19, 18, 7, 'sd', 'sd', 5, '', ''),
(20, 18, 7, 'sds', 'sdsd', 5, '', ''),
(21, 18, 7, 'sds', 'sdsd', 5, '', ''),
(22, 3, 7, 'sdsd', 'sdsd', 0, '', ''),
(23, 18, 7, 'sd', 'dsds', 5, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
