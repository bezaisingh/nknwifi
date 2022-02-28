/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.19 : Database - nknwifi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nknwifi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nknwifi`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `auth_user` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `access_lvl` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Table structure for table `data_uploads` */

DROP TABLE IF EXISTS `data_uploads`;

CREATE TABLE `data_uploads` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `enrollNo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdFront` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdBack` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Photo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ApntLetter` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`slno`,`enrollNo`)
) ENGINE=MyISAM AUTO_INCREMENT=245 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `staff_user` */

DROP TABLE IF EXISTS `staff_user`;

CREATE TABLE `staff_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `isApproved` smallint(6) DEFAULT '0',
  `appliedOn` date NOT NULL,
  `approvedOn` date DEFAULT NULL,
  `rejectedOn` date DEFAULT NULL,
  `remarks` varchar(50) DEFAULT 'na',
  PRIMARY KEY (`id`,`staffId`,`email`,`mobNo`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `student_user` */

DROP TABLE IF EXISTS `student_user`;

CREATE TABLE `student_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus` varchar(30) NOT NULL,
  `enrollNo` varchar(20) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `yearOfCompletion` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobNo` varchar(30) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `hostelNo` int(11) DEFAULT NULL,
  `isApproved` smallint(6) DEFAULT '0',
  `appliedOn` date NOT NULL,
  `approvedOn` date DEFAULT NULL,
  `rejectedOn` date DEFAULT NULL,
  `remarks` varchar(50) DEFAULT 'na',
  PRIMARY KEY (`id`,`enrollNo`,`email`,`mobNo`)
) ENGINE=MyISAM AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
