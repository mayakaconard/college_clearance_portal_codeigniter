-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 08:18 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE IF NOT EXISTS `clearance` (
  `clearance_id` varchar(50) NOT NULL,
  `section_id` varchar(50) NOT NULL,
  `reg_number` varchar(50) NOT NULL,
  `pf_number` varchar(20) NOT NULL,
  `date_cleared` date NOT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  PRIMARY KEY (`clearance_id`),
  KEY `FK_status` (`status`),
  KEY `FK_section` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `faculty_id`, `department_name`) VALUES
(1, 9, 'ACCOUNTING AND FINANCE '),
(2, 10, 'SOLACE'),
(3, 3, 'BIOLOGY SCIENCES'),
(4, 9, 'BUSINESS ADMINISTRATION AND MANAGEMENT SCIENCES'),
(5, 9, 'ECONOMICS'),
(6, 10, 'ODEL'),
(7, 2, 'CRIMINOLOGY AND SOCIAL WORK'),
(8, 7, 'SUGAR TECHNOLOGY'),
(9, 8, 'PEACE AND CONFLICT STUDIES'),
(10, 3, 'BIOLOGICAL SCIENCES'),
(11, 2, 'JOURNALISM AND MASS COMMUNICATION'),
(12, 3, 'CHEMISTRY'),
(13, 8, 'DISASTER MANAGEMENT AND SUSTAINABLE DEVELOPMENT'),
(14, 11, 'COMPUTER SCIENCE'),
(15, 4, 'CIVIL AND STRUCTURAL ENGINEERING'),
(16, 8, 'EMERGENCY MANAGEMENT STUDIES'),
(17, 2, 'LANGUAGE AND LITERATURE'),
(18, 4, 'ELECTRICAL AND COMMUNICATIONS ENGINEERING'),
(19, 2, 'FESS'),
(20, 2, 'SOCIAL SCIENCE EDUCATION'),
(21, 2, 'SCIENCE AND MATHEAMATICS EDUCATION'),
(22, 4, 'MECHANICAL AND INDUSTRIAL ENGINEERING'),
(23, 2, 'EDUCATIONAL PSYCHOLOGY'),
(24, 6, 'PUBLIC HEALTH'),
(25, 5, 'COMMUNITY HEALTH & MANAGEMENT'),
(26, 5, 'NUTRITION AND DIATETICS'),
(27, 6, 'MEDICAL LABORATORY SCIENCES'),
(28, 5, 'MIDWIFERY & CHILD HEALTH'),
(29, 12, 'MEDICINE AND SURGERY'),
(30, 6, 'OPTOMETRY AND VISION SCIENCE'),
(31, 6, 'HEALTH PROMOTION AND SPORTS SCIENCES'),
(32, 4, 'PRODUCTION ENGINEERING'),
(33, 7, 'AGRIBUSINESS MANAGEMENT AND EXTENSION'),
(34, 3, 'PURE AND APPLIED CHEMISTRY'),
(35, 11, 'INFORMATION TECHNOLOGY'),
(36, 3, 'MATHEMATICS'),
(37, 3, 'PHYSICS'),
(38, 5, 'NURSING SCIENCES');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `FK_departments` (`sch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `sch_id`, `department`) VALUES
(1, 9, 'ACCOUNTING AND FINANCE '),
(2, 10, 'SOLACE'),
(3, 3, 'BIOLOGY SCIENCES'),
(4, 9, 'BUSINESS ADMINISTRATION AND MANAGEMENT SCIENCES'),
(5, 9, 'ECONOMICS'),
(6, 10, 'ODEL'),
(7, 2, 'CRIMINOLOGY AND SOCIAL WORK'),
(8, 7, 'SUGAR TECHNOLOGY'),
(9, 8, 'PEACE AND CONFLICT STUDIES'),
(10, 3, 'BIOLOGICAL SCIENCES'),
(11, 2, 'JOURNALISM AND MASS COMMUNICATION'),
(12, 3, 'CHEMISTRY'),
(13, 8, 'DISASTER MANAGEMENT AND SUSTAINABLE DEVELOPMENT'),
(14, 11, 'COMPUTER SCIENCE'),
(15, 4, 'CIVIL AND STRUCTURAL ENGINEERING'),
(16, 8, 'EMERGENCY MANAGEMENT STUDIES'),
(17, 2, 'LANGUAGE AND LITERATURE'),
(18, 4, 'ELECTRICAL AND COMMUNICATIONS ENGINEERING'),
(19, 2, 'FESS'),
(20, 2, 'SOCIAL SCIENCE EDUCATION'),
(21, 2, 'SCIENCE AND MATHEAMATICS EDUCATION'),
(22, 4, 'MECHANICAL AND INDUSTRIAL ENGINEERING'),
(23, 2, 'EDUCATIONAL PSYCHOLOGY'),
(24, 6, 'PUBLIC HEALTH'),
(25, 5, 'COMMUNITY HEALTH & MANAGEMENT'),
(26, 5, 'NUTRITION AND DIATETICS'),
(27, 6, 'MEDICAL LABORATORY SCIENCES'),
(28, 5, 'MIDWIFERY & CHILD HEALTH'),
(29, 12, 'MEDICINE AND SURGERY'),
(30, 6, 'OPTOMETRY AND VISION SCIENCE'),
(31, 6, 'HEALTH PROMOTION AND SPORTS SCIENCES'),
(32, 4, 'PRODUCTION ENGINEERING'),
(33, 7, 'AGRIBUSINESS MANAGEMENT AND EXTENSION'),
(34, 3, 'PURE AND APPLIED CHEMISTRY'),
(35, 11, 'INFORMATION TECHNOLOGY'),
(36, 3, 'MATHEMATICS'),
(37, 3, 'PHYSICS'),
(38, 5, 'NURSING SCIENCES');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `prog_id` varchar(50) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  PRIMARY KEY (`prog_id`),
  KEY `FK_programmes` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL,
  `request` varchar(100) NOT NULL,
  `reg_number` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `sch_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`sch_id`, `school_name`) VALUES
(2, 'FACULTY OF EDUCATION & SOCIAL SCIENCES'),
(3, 'FACULTY OF SCIENCE'),
(4, 'FACULTY OF ENGINEERING'),
(5, 'SCHOOL OF NURSING AND MIDWIFERY'),
(6, 'SCHOOL OF PUBLIC HEALTH, BIOMEDICAL SCIENCES AND TECHNOLOGY'),
(7, 'SHOOOL OF AGRICULTURE, VERTERINARY SCIENCES & TECHNOLOGY (SAVET)'),
(8, 'CENTRE FOR DISASTER MANAGEMENT AND HUMANITARIAN ASSISTANCE (CDMHA)'),
(9, 'SCHOOL OF BUSINESS AND ECONOMICS'),
(10, 'SCHOOL OF OPEN LEARNING AND CONTINUING EDUCATION (SOLACE)'),
(11, 'SCHOOL OF COMPUTING AND INFORMATICS'),
(12, 'SCHOOL OF MEDICINE');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `section_id` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section_arares`
--

CREATE TABLE IF NOT EXISTS `section_arares` (
  `arares_id` int(11) NOT NULL AUTO_INCREMENT,
  `student` varchar(50) NOT NULL,
  `arares` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`arares_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `pf_number` varchar(20) NOT NULL,
  `id_number` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  PRIMARY KEY (`pf_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Cleared'),
(2, 'Not Cleared'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `std_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `id_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_number` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `programme` varchar(100) NOT NULL,
  PRIMARY KEY (`std_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reg_number` (`reg_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `id_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_number` varchar(50) NOT NULL,
  `pf_number` varchar(50) NOT NULL,
  `school` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `program` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_sections` (`section`),
  KEY `FK_roles` (`role_id`),
  KEY `FK_school` (`school`),
  KEY `FK_department` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clearance`
--
ALTER TABLE `clearance`
  ADD CONSTRAINT `FK_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `FK_departments` FOREIGN KEY (`sch_id`) REFERENCES `schools` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `FK_programmes` FOREIGN KEY (`department`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_department` FOREIGN KEY (`department`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_school` FOREIGN KEY (`school`) REFERENCES `schools` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sections` FOREIGN KEY (`section`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
