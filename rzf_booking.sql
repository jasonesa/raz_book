-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2013 at 01:31 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rzf_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`idreservation`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `start_date`, `end_date`, `description`, `user_id`) VALUES
(60, '2013-01-02 08:00:00', '2013-01-08 08:00:00', 'ATTPROD-79', 1),
(61, '2013-01-02 08:00:00', '2013-01-23 08:00:00', 'APOLLO-35', 1),
(62, '2013-01-01 08:00:00', '2013-01-02 08:00:00', 'ATTPROD-79', 1),
(64, '2013-02-05 08:00:00', '2013-02-28 08:00:00', 'fredito', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `idresource` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `skype` varchar(64) DEFAULT NULL,
  `position` varchar(56) NOT NULL,
  `table_id_team` int(11) NOT NULL,
  `email_alt` varchar(64) NOT NULL,
  `aim` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`idresource`),
  KEY `table_id_table` (`table_id_team`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`idresource`, `name`, `username`, `password`, `skype`, `position`, `table_id_team`, `email_alt`, `aim`, `description`) VALUES
(7, 'Fred Aponte', 'frederick.sosa@boszdigital.com', '1a0724f298366a3e16de1bf2d26bceb39a5f7be9', 'busy', 'PLD', 1, 'frederick.sosa@razorfish.com', '', ''),
(8, 'Mariana Santamaria', 'mariana.santamaria@boszdigital.com', '1a0724f298366a3e16de1bf2d26bceb39a5f7be9', 'busy', 'Sr. Software Engineer', 2, '', '', ''),
(9, 'Pablo Montero', 'pablo.montero@boszdigital.com', '5c5b40b9e97090946ed98ea7c27c140f65020540', 'standby', 'PLD', 1, 'pablo.montero@razorfish.com', '', ''),
(10, 'Roberto Melendez', 'roberto.melendez@boszdigital.com', '9d500263e1a3252bc63faaca4e2bd9b72da439c3', 'busy', 'Flash Developer', 1, '', '', ''),
(11, 'Eduardo Cuadra', 'eduardo.cuadra@boszdigital.com', '23aae9925d3629eeff19d28347941e4ad3dcea98', 'available', 'Sr. Flash Designer', 1, '', '', ''),
(12, 'Joshua Flores', 'joshua.flores@boszdigital.com', 'cd48c9ad359844b0c6bdf77d6890980fe2d594ce', 'joshua.flores', 'Sr. Flash Developer', 1, 'joshua.flores@razorfish.com', 'josh.fl', 'Sr flash developer, AS2, AS3, OOP'),
(13, 'Jorge Paiz', 'jorge.paiz@boszdigital.com', 'ae33405d9e597600497df5de694d8d7a6d861775', 'available', 'iOS developer', 3, '', '', ''),
(14, 'Jose Castro', 'jose.castro@boszdigital.com', '3e9228ed919756e507130740c0499d1193c61884', 'busy', 'Sr. Software Engineer', 2, '', '', ''),
(15, 'Edison Mora', 'edison.mora@boszdigital.com', '2202064d2e3081757642084bc1fa790bae32b19f', 'available', 'Sr. Flash Developer', 1, '', '', ''),
(16, 'Laurens Ortiz', 'laurens.ortiz@boszdigital.com', '15bcf9737a622253d4bffa77655cb33ee3f84cc2', 'standby', 'Sr. PLD', 1, '', '', ''),
(17, 'Jason Zumbado', 'jason.zumbado@boszdigital.com', 'a6aed89fae802415eb7128453d2d5b361d28f674', 'available', 'PLD', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resource_has_reservation`
--

CREATE TABLE `resource_has_reservation` (
  `resource_idresource` int(11) NOT NULL,
  `reservation_idreservation` int(11) NOT NULL,
  PRIMARY KEY (`resource_idresource`,`reservation_idreservation`),
  KEY `resource_idresource` (`resource_idresource`,`reservation_idreservation`),
  KEY `reservation_idreservation` (`reservation_idreservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_has_reservation`
--

INSERT INTO `resource_has_reservation` (`resource_idresource`, `reservation_idreservation`) VALUES
(7, 60),
(8, 60),
(9, 60),
(10, 60),
(11, 60),
(12, 60),
(13, 60),
(14, 60),
(17, 61),
(15, 62),
(7, 64),
(9, 64),
(13, 64),
(17, 64);

-- --------------------------------------------------------

--
-- Table structure for table `resource_has_skill`
--

CREATE TABLE `resource_has_skill` (
  `resource_idresource` int(11) NOT NULL,
  `skill_idskill` int(11) NOT NULL,
  PRIMARY KEY (`resource_idresource`,`skill_idskill`),
  KEY `fk_resource_has_skill_skill1_idx` (`skill_idskill`),
  KEY `fk_resource_has_skill_resource_idx` (`resource_idresource`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_has_skill`
--

INSERT INTO `resource_has_skill` (`resource_idresource`, `skill_idskill`) VALUES
(7, 3),
(7, 4),
(8, 6),
(8, 7),
(12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `idskill` int(11) NOT NULL AUTO_INCREMENT,
  `skillname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idskill`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`idskill`, `skillname`) VALUES
(1, 'PHP'),
(2, 'Javascript'),
(3, 'css3'),
(4, 'Web Design'),
(5, 'Photoshop'),
(6, 'JAVA'),
(7, 'CQ5'),
(8, 'As3');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(64) NOT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `team_name`) VALUES
(1, 'Digital Studio'),
(2, 'CQ5'),
(3, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `username`, `password`) VALUES
(1, 'jason', 'jasonesa@hotmail.com', '68c46a606457643eab92053c1c05574abb26f861'),
(2, 'Bruce Wayne', 'batman@boszdigital.com', '5c6d9edc3a951cda763f650235cfc41a3fc23fe8');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`table_id_team`) REFERENCES `team` (`id_team`);

--
-- Constraints for table `resource_has_reservation`
--
ALTER TABLE `resource_has_reservation`
  ADD CONSTRAINT `resource_has_reservation_ibfk_1` FOREIGN KEY (`resource_idresource`) REFERENCES `resource` (`idresource`),
  ADD CONSTRAINT `resource_has_reservation_ibfk_2` FOREIGN KEY (`reservation_idreservation`) REFERENCES `reservation` (`idreservation`);

--
-- Constraints for table `resource_has_skill`
--
ALTER TABLE `resource_has_skill`
  ADD CONSTRAINT `fk_resource_has_skill_resource` FOREIGN KEY (`resource_idresource`) REFERENCES `resource` (`idresource`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resource_has_skill_skill1` FOREIGN KEY (`skill_idskill`) REFERENCES `skill` (`idskill`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
