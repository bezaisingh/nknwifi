/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.21 : Database - nknwifi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nknwifi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `nknwifi`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `id` int NOT NULL,
  `auth_user` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `access_lvl` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `admin_table` */

insert  into `admin_table`(`id`,`auth_user`,`uid`,`pwd`,`access_lvl`) values 
(0,'admin','bj','bj','1'),
(1,'MTS','ss','ss','2');

/*Table structure for table `data_uploads` */

DROP TABLE IF EXISTS `data_uploads`;

CREATE TABLE `data_uploads` (
  `slno` int NOT NULL AUTO_INCREMENT,
  `enrollNo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `IdFront` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdBack` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Photo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`slno`,`enrollNo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `data_uploads` */

insert  into `data_uploads`(`slno`,`enrollNo`,`IdFront`,`IdBack`,`Photo`) values 
(1,'AUDCFMS2','../uploads/student/612b680fbef5e9.05819555.jpg','../uploads/student/612b680fbef7b8.41228252.jpg','../uploads/student/612b680fbef8f9.57106906.jpg'),
(2,'AUSDC20210827','../uploads/staff/612b6e1f576337.05811926.jpg','../uploads/staff/612b6e1f576533.51483512.jpg','../uploads/staff/612b6e1f576771.04097860.jpg'),
(3,'AUSDCCHEM002','../uploads/staff/612c885393c0c5.70960411.jpg','../uploads/staff/612c885393c273.41051544.jpg','../uploads/staff/612c885393c392.04459479.jpg');

/*Table structure for table `staff_user` */

DROP TABLE IF EXISTS `staff_user`;

CREATE TABLE `staff_user` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `staff_user` */

insert  into `staff_user`(`id`,`campus`,`staffId`,`firstName`,`lastName`,`fatherName`,`gender`,`email`,`mobNo`,`address`,`dob`,`department`,`designation`,`joiningDate`,`isPermanent`,`contractEndDate`,`isApproved`) values 
(5,'AUS','AUSDC20210826','Mafizur','Rahman','Samin Akab','Male','mafi@gmail.com','9401379674','T.R Phukan Road','2021-08-28','House Keeping','Peon','2021-08-05','NO','2021-08-13',0),
(6,'AUDC','AUSDC20210827','Mafizur','Rahman','Samin Akab','Male','mafizur@gmail.com','9401379676','Abhayapuri Bongaigaon','2021-01-12','House Keeping','Peon','2021-08-06','NO','2021-09-04',0),
(7,'AUS','AUSDCCHEM002','Ramesh','Pokhriyal','Binit Pokhriyal','Male','ramesh@gmail.com','3216549878','Bajali, Barpeta, Assam','2008-01-29','Chemistry','Assistant Proffessor','2000-01-01','YES','',0);

/*Table structure for table `student_user` */

DROP TABLE IF EXISTS `student_user`;

CREATE TABLE `student_user` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `student_user` */

insert  into `student_user`(`id`,`campus`,`enrollNo`,`firstName`,`lastName`,`fatherName`,`gender`,`address`,`dob`,`department`,`courseName`,`yearOfCompletion`,`email`,`mobNo`,`semester`,`hostelNo`,`isApproved`) values 
(1,'AUDC','AUDCFMS2','Ranu','Mondol','Kanu Mondol','Male','Kolkata, West Bengal, Bangladesh','2021-08-10','Music Department','Music','2031','ranu@gmail.com','9874563214',1,2,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
