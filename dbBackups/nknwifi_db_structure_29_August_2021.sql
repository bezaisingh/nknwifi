-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2021 at 11:36 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nknwifi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `id` int NOT NULL,
  `auth_user` varchar(20) NOT NULL,
  `access_lvl` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_uploads`
--

DROP TABLE IF EXISTS `data_uploads`;
CREATE TABLE IF NOT EXISTS `data_uploads` (
  `slno` int NOT NULL AUTO_INCREMENT,
  `enrollNo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `IdFront` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdBack` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Photo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`slno`,`enrollNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_user`
--

DROP TABLE IF EXISTS `staff_user`;
CREATE TABLE IF NOT EXISTS `staff_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `campus` varchar(30) NOT NULL,
  `staffId` varchar(30) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `mobNo` varchar(30) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `joiningDate` varchar(30) DEFAULT NULL,
  `isPermanent` varchar(10) DEFAULT NULL,
  `contractEndDate` varchar(30) DEFAULT NULL,
  `isApproved` smallint DEFAULT '0',
  PRIMARY KEY (`id`,`staffId`,`email`,`mobNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

DROP TABLE IF EXISTS `student_user`;
CREATE TABLE IF NOT EXISTS `student_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `campus` varchar(30) NOT NULL,
  `enrollNo` varchar(20) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `courseName` varchar(30) DEFAULT NULL,
  `yearOfCompletion` varchar(10) DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobNo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `semester` int DEFAULT NULL,
  `hostelNo` int DEFAULT NULL,
  `isApproved` smallint DEFAULT '0',
  PRIMARY KEY (`id`,`enrollNo`,`email`,`mobNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
