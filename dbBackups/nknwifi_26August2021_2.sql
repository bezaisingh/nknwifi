/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - nknwifi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nknwifi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nknwifi`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `auth_user` varchar(20) NOT NULL,
  `access_lvl` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin_table` */

insert  into `admin_table`(`id`,`auth_user`,`access_lvl`,`uid`,`pwd`) values 
(1,'bj','4','bj','bj');

/*Table structure for table `staff_user` */

DROP TABLE IF EXISTS `staff_user`;

CREATE TABLE `staff_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus` varchar(30) NOT NULL,
  `staffId` varchar(30) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobNo` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `joiningDate` varchar(30) DEFAULT NULL,
  `isPermanent` varchar(10) DEFAULT NULL,
  `contractEndDate` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `staff_user` */

insert  into `staff_user`(`id`,`campus`,`staffId`,`firstName`,`lastName`,`fatherName`,`motherName`,`gender`,`email`,`mobNo`,`address`,`dob`,`department`,`designation`,`joiningDate`,`isPermanent`,`contractEndDate`) values 
(1,'AUS','AUSCC123','Mafizur','Rahman',NULL,NULL,NULL,'mafi@gmail.com','9401379678',NULL,NULL,'House Keeping','Peon','2021',NULL,'2022'),
(2,'AUDC','AUSDC20200524','Purshauttam','Rai',NULL,NULL,NULL,'mafi@gmail.com','9954878769',NULL,NULL,'Physics','Assistant Professor','2021-08-01',NULL,'2021-08-30'),
(3,'AUDC','AUSDC20200524','Purshauttam','Rai',NULL,NULL,NULL,'rai@gmail.com','9954878725',NULL,NULL,'Physics','Assistant Professor','2021-08-05',NULL,'2021-08-25');

/*Table structure for table `student_user` */

DROP TABLE IF EXISTS `student_user`;

CREATE TABLE `student_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campus` varchar(30) DEFAULT NULL,
  `enrollNo` varchar(20) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `courseName` varchar(30) DEFAULT NULL,
  `yearOfCompletion` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobNo` varchar(30) DEFAULT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `hostelNo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`,`address`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student_user` */

insert  into `student_user`(`id`,`campus`,`enrollNo`,`firstName`,`lastName`,`fatherName`,`motherName`,`gender`,`address`,`dob`,`department`,`courseName`,`yearOfCompletion`,`email`,`mobNo`,`semester`,`hostelNo`) values 
(1,'AUDC','AUDC20210824','Bijay Kumar','Singh',NULL,NULL,NULL,'',NULL,'Computer Center','MCA','2022','bijay611@gmail.com','9401379674','5','2'),
(2,'AUS','AUS20210825','Anshuman','Singh',NULL,NULL,NULL,'',NULL,'Computer Center','BSc','2021','anshumansingh@gmail.com','9954897946','4','3'),
(3,'AUDC','AUDC1123','Sandeepan','Nath',NULL,NULL,NULL,'',NULL,'CC','BSc. IT','2022','sandy@gmail.com','9478564545','6','3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
