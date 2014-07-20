-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2012 at 01:08 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `doctor_id`, `patient_id`, `status`, `date_of_appointment`, `title`, `link`, `dateCreated`, `location`, `googleEventID`, `starttime`, `endtime`, `chg_reason`, `description`) VALUES
(4, NULL, 11, NULL, 'pending', NULL, 'ddkk', NULL, NULL, NULL, NULL, '2012-10-12T00:59:46-07:00', '2012-10-12T01:29:46-07:00', NULL, 'ddddd');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `speciality`, `qualification`, `folder_id`, `date_of_birth`, `sex`, `photo`, `refresh_token`, `type`) VALUES
(3, 'semakula kraiba', 'krabz01@gmail.com', 'sadsda', '', '0BzOgEdqzJNPAZUd4VnROMVl1dk0', '0000-00-00', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/Td4nT2nDQyzoAYdPm-KqWxZx0TKrgTFHOR0jeHUc5AE', 2),
(8, 'JAMES', 'j@gmail.com', 'kicking', 'that one', NULL, '2012-09-14', 'f', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', NULL, 2),
(9, 'joana', 'j@gmail.com', 'yes', 'kal', NULL, '2012-09-21', 'f', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', NULL, 2),
(10, 'sfdjq', 'FHSKJFSJSD', 'fhsjvh', 'HSFJHJ', '', '0000-00-00', 'JHSF', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', '', 2),
(11, 'sfdjq', 'FHSKJFSJSD', 'fhsjvh', 'HSFJHJ', '', '0000-00-00', 'JHSF', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', '', 2),
(12, 'james', 'm@gmail.com', 'doc', 'msc', '', '1990-09-09', 'm', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', '', 2),
(13, 'ME', 'studydock@gmail.com', 'sfh', 'sdi', '', '0000-00-00', 'fs', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', '', 2),
(14, 'ME', 'studydock@gmail.com', 'sfh', 'sdi', '', '0000-00-00', 'fs', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', '', 2),
(18, 'phillip karamagi', 'pkaramagi1@gmail.com', 'Chilling, Neural Surgery', 'Masters in Chilling', '0B8B8vaNxRldTRjJudUVBbzVnekE', '0000-00-00', 'm', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', '1/YN_WsS5tmYJ5-WJOTNOzvHNnMkJrclfpEg1n3OyuTZM', 2);

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
('JAMES', 'j@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 2, NULL),
('joana', 'j@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 2, NULL),
('sfdjq', 'FHSKJFSJSD', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 2, ''),
('james', 'm@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 2, ''),
('ME', 'studydock@gmail.com', 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 2, ''),
('phillip karamagi', 'pkaramagi1@gmail.com', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', 2, '1/YN_WsS5tmYJ5-WJOTNOzvHNnMkJrclfpEg1n3OyuTZM'),
('smiley katanga', 'smileykatanga@gmail.com', 'assets/img/default_avatar.jpg', 1, '1/njpxLEXMt126uqamsKA0FaJWrApmDNjwDtcfv8CXU54'),
('james john', 'jamesjohn@gmail.com', NULL, 1, NULL),
('naava jane', 'janenaava@gmail.com', NULL, 1, NULL),
('semakula kraiba', 'krabz01@gmail.com', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 1, '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY'),
('phillip karamagi', 'pkaramagi1@gmail.com', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', 1, '1/iVb1fm63gsJuHZWzT56zexWcWaVl1vKnBSLHO6EUFg0');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `location`, `latitude`, `logitude`, `refresh_token`, `photo`, `type`, `folder_id`) VALUES
(1, 'International Hospital Kampala', 'ihk@gmail.com', 'Namuwongo', NULL, NULL, NULL, 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, ''),
(2, 'Mulago Hospital', 'mulagoh@gmail.com', NULL, NULL, NULL, NULL, 'http://digimaxtechs.com/daktari/assets/img/default_avatar.jpg', 3, ''),
(3, 'Mark Lubega', 'lubegamark@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/-SijJQI2AUys/AAAAAAAAAAI/AAAAAAAAACw/46yy18xQhmc/photo.jpg', 3, ''),
(4, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPAZ09yVDlTOHVVcjA'),
(5, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPAR0NjZGJKNkpNTXM'),
(6, 'semakula kraiba', 'krabz01@gmail.com', '', 0, 0, '1/X9Z0ZzO4Rgtp5ABlkp3l6xjW56q4YGoUs4oC6xH5jB0', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', 3, '0BzOgEdqzJNPASHdTcGppMjY1aGc');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hospital_doctor`
--

INSERT INTO `hospital_doctor` (`id`, `hospital_id`, `doctor_id`, `status`) VALUES
(1, 3, 3, 'pending'),
(2, 3, 2, 'approved'),
(3, 1, 8, 'approved'),
(4, 2, 7, 'approved'),
(5, 1, 15, 'pending'),
(6, 2, 15, 'pending'),
(7, 0, 15, 'pending'),
(8, 1, 16, ''),
(9, 2, 16, ''),
(10, 1, 17, ''),
(11, 2, 17, ''),
(12, 1, 18, ''),
(13, 2, 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_patient`
--

CREATE TABLE IF NOT EXISTS `hospital_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(24, 0, 13);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, '3', 'Malaria', 'Bells from  semakula kraiba', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `folder_id`, `date_of_birth`, `sex`, `photo`, `refresh_token`, `date_of_entry`, `type`, `condition`) VALUES
(1, 'smiley katanga', 'smileykatanga@gmail.com', NULL, NULL, NULL, 'assets/img/default_avatar.jpg', '1/njpxLEXMt126uqamsKA0FaJWrApmDNjwDtcfv8CXU54', NULL, 1, ''),
(2, 'james john', 'jamesjohn@gmail.com', NULL, '1995-04-13', 'm', NULL, NULL, '2012-09-27', 1, ''),
(3, 'naava jane', 'janenaava@gmail.com', NULL, '1978-09-07', 'f', NULL, NULL, '2012-09-27', 1, ''),
(7, 'semakula kraiba', 'krabz01@gmail.com', '0BzOgEdqzJNPAV2xvUktiOXVXS00', '1991-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-02', 1, 'Lame, ppliea'),
(8, 'semakula kraiba', 'krabz01@gmail.com', '0BzOgEdqzJNPAbGQzbzRxQUM2U3c', '0000-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-02', 1, 'Lame, ppliea'),
(9, 'semakula kraiba', 'krabz01@gmail.com', '0BzOgEdqzJNPAemFmaXl2cnVITUk', '0000-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-02', 1, 'Lame, ppliea'),
(10, 'semakula kraiba', 'krabz01@gmail.com', '0BzOgEdqzJNPAUlVjZGdtaWd6R1U', '0000-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-02', 1, 'Lame, ppliea'),
(11, 'semakula kraiba', 'krabz01@gmail.com', '', '0000-10-05', 'm', 'https://lh3.googleusercontent.com/-oiRlQjkYh08/AAAAAAAAAAI/AAAAAAAAAGw/tR-47qAK09Y/photo.jpg', '1/uV6vgsppDlpPOo_xtnA5gZkwvHzDusxKMRe3D0zQCaY', '2012-10-03', 1, 'Lame, ppliea'),
(12, 'phillip karamagi', 'pkaramagi1@gmail.com', '0B8B8vaNxRldTQWwzZWxWT3lKdTQ', '1991-01-07', 'm', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', '1/iVb1fm63gsJuHZWzT56zexWcWaVl1vKnBSLHO6EUFg0', '2012-10-03', 1, ''),
(13, 'phillip karamagi', 'pkaramagi1@gmail.com', '', '0000-01-07', 'm', 'https://lh4.googleusercontent.com/-6yx4DRaZXpQ/AAAAAAAAAAI/AAAAAAAAAFQ/SbhC9VLsiaA/photo.jpg', '1/iVb1fm63gsJuHZWzT56zexWcWaVl1vKnBSLHO6EUFg0', '2012-10-03', 1, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`id`, `patient_id`, `doctor_id`, `collab`) VALUES
(1, 7, 0, NULL),
(2, 7, 0, NULL),
(3, 7, 0, NULL),
(4, 7, 0, NULL),
(5, 7, 0, NULL),
(6, 7, 0, NULL),
(7, 7, 0, NULL),
(8, 0, 7, NULL),
(9, 8, 0, NULL),
(10, 8, 0, NULL),
(11, 8, 0, NULL),
(12, 8, 0, NULL),
(13, 8, 0, NULL),
(14, 8, 0, NULL),
(15, 8, 0, NULL),
(16, 8, 0, NULL),
(17, 9, 0, NULL),
(18, 9, 0, NULL),
(19, 9, 0, NULL),
(20, 9, 0, NULL),
(21, 9, 0, NULL),
(22, 9, 0, NULL),
(23, 9, 0, NULL),
(24, 9, 0, NULL),
(25, 10, 12, NULL),
(26, 10, 11, NULL),
(27, 10, 10, NULL),
(28, 10, 8, NULL),
(29, 10, 3, NULL),
(30, 10, 14, NULL),
(31, 10, 9, NULL),
(32, 10, 0, NULL),
(33, 11, 12, NULL),
(34, 11, 11, NULL),
(35, 11, 10, NULL),
(36, 11, 14, NULL),
(37, 11, 9, NULL),
(38, 11, 0, NULL),
(39, 12, 13, NULL),
(40, 12, 9, NULL),
(41, 12, 12, NULL),
(42, 12, 0, NULL),
(43, 13, 10, NULL),
(44, 13, 9, NULL),
(45, 13, 0, NULL);

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
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `doctor_id`, `patient_id`, `title`, `description`, `status`, `description_r`, `path`) VALUES
(1, 3, 7, 'dasd', 'asd', 5, '<h2> Daktari Prescription</h2>\r\n<h3> sad </h3>\r\n<br/>\r\n<br/>\r\nasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349975097.txt.pdf'),
(2, 3, 7, 'asd', 'asdad', 5, '<h2> Daktari Prescription</h2>\r\n<h3> sadasd </h3>\r\n<br/>\r\n<br/>\r\nasdasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349979596d..pdf'),
(3, 3, 12, 'das', 'sdad', 5, '<h2> Daktari Prescription</h2>\r\n<h3> Hos </h3>\r\n<br/>\r\n<br/>\r\nhh\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349988863..pdf'),
(4, 3, 7, 'qwrrtrrrrttt', 'semakula', 5, '<h2> Daktari Prescription</h2>\r\n<h3> Heloo </h3>\r\n<br/>\r\n<br/>\r\nasdasd\r\n<br/>\r\n<br/>\r\nFrom Dr.\r\n', '1349989282..pdf'),
(5, 3, 7, 'Malaria', 'Bells', 5, '\r\n<img src="http://localhost//life///images//logo.jpg" >\r\n<h2> Daktari Prescription</h2>\r\n<h3> help </h3>\r\n<br/>\r\n<br/>\r\nghh\r\n<br/>\r\n<br/>\r\n<h6>From Dr.semakula kraiba</h6>\r\n', '1349990986..pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
