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
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `access_lvl` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin_table` */

insert  into `admin_table`(`id`,`auth_user`,`uid`,`pwd`,`access_lvl`) values 
(0,'admin','bj','bj','1'),
(1,'MTS','ss','ss','2');

/*Table structure for table `data_uploads` */

DROP TABLE IF EXISTS `data_uploads`;

CREATE TABLE `data_uploads` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `enrollNo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdFront` varchar(200) CHARACTER SET latin1 NOT NULL,
  `IdBack` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Photo` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`slno`,`enrollNo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `data_uploads` */

insert  into `data_uploads`(`slno`,`enrollNo`,`IdFront`,`IdBack`,`Photo`) values 
(1,'AUDCFMS2','../uploads/student/612b680fbef5e9.05819555.jpg','../uploads/student/612b680fbef7b8.41228252.jpg','../uploads/student/612b680fbef8f9.57106906.jpg'),
(2,'AUSDC20210827','../uploads/staff/612b6e1f576337.05811926.jpg','../uploads/staff/612b6e1f576533.51483512.jpg','../uploads/staff/612b6e1f576771.04097860.jpg'),
(3,'AUSDCCHEM002','../uploads/staff/612c885393c0c5.70960411.jpg','../uploads/staff/612c885393c273.41051544.jpg','../uploads/staff/612c885393c392.04459479.jpg'),
(4,'AUSCC123','../uploads/student/6140494f2c4586.61009056.jpg','../uploads/student/6140494f2c6462.03433281.jpg','../uploads/student/6140494f2c6551.17858347.jpg'),
(5,'Test','../uploads/staff/615417e40b9e46.33051076.png','../uploads/staff/615417e40bb554.24411809.png','../uploads/staff/615417e40bb615.05053835.png'),
(6,'Test1','../uploads/staff/61541b6ea19695.11720422.png','../uploads/staff/61541b6ea19746.01634720.png','../uploads/staff/61541b6ea19766.90515872.png'),
(7,'Audc','../uploads/student/61542242508d49.14468493.png','../uploads/student/61542242508dd5.49385751.png','../uploads/student/61542242508df2.15584050.png'),
(8,'AUDCENG001','../uploads/student/615d39f4192a45.25576411.png','../uploads/student/615d39f462eac3.35229215.png','../uploads/student/615d39f462ec72.37752262.jpg');

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
  `isApproved` smallint(6) DEFAULT 0,
  `appliedOn` date NOT NULL,
  `approvedOn` date DEFAULT NULL,
  `rejectedOn` date DEFAULT NULL,
  PRIMARY KEY (`id`,`staffId`,`email`,`mobNo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `staff_user` */

insert  into `staff_user`(`id`,`campus`,`staffId`,`firstName`,`lastName`,`fatherName`,`gender`,`email`,`mobNo`,`address`,`dob`,`department`,`designation`,`joiningDate`,`isPermanent`,`contractEndDate`,`isApproved`,`appliedOn`,`approvedOn`,`rejectedOn`) values 
(5,'AUS','AUSDC20210826','Mafizur','Rahman','Samin Akab','Male','mafi@gmail.com','9401379674','T.R Phukan Road','2021-08-28','House Keeping','Peon','2021-08-05','NO','2021-08-13',0,'0000-00-00',NULL,NULL),
(6,'AUDC','AUSDC20210827','Mafizur','Rahman','Samin Akab','Male','mafizur@gmail.com','9401379676','Abhayapuri Bongaigaon','2021-01-12','House Keeping','Peon','2021-08-06','NO','2021-09-04',0,'0000-00-00',NULL,NULL),
(7,'AUS','AUSDCCHEM002','Ramesh','Pokhriyal','Binit Pokhriyal','Male','ramesh@gmail.com','3216549878','Bajali, Barpeta, Assam','2008-01-29','Chemistry','Assistant Proffessor','2000-01-01','YES','',0,'0000-00-00',NULL,NULL),
(8,'AUDC','Test','Applied','Date','dasta','Female','xyz@gmail.com','9874563210','Unknown','2021-09-04','Linguistics','Testing','2021-09-25','YES','',0,'0000-00-00',NULL,NULL),
(9,'AUDC','Test1','Applied','Date','dsgfsd','Male','xyz1@gmail.com','9874563211','Digha','2021-09-04','Philosophy','Testing','2021-08-31','YES','',0,'2021-09-29',NULL,NULL);

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
  `department` varchar(30) DEFAULT NULL,
  `courseName` varchar(30) DEFAULT NULL,
  `yearOfCompletion` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `mobNo` varchar(30) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `hostelNo` int(11) DEFAULT NULL,
  `isApproved` smallint(6) DEFAULT 0,
  `appliedOn` date NOT NULL,
  `approvedOn` date DEFAULT NULL,
  `rejectedOn` date DEFAULT NULL,
  PRIMARY KEY (`id`,`enrollNo`,`email`,`mobNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student_user` */

insert  into `student_user`(`id`,`campus`,`enrollNo`,`firstName`,`lastName`,`fatherName`,`gender`,`address`,`dob`,`department`,`courseName`,`yearOfCompletion`,`email`,`mobNo`,`semester`,`hostelNo`,`isApproved`,`appliedOn`,`approvedOn`,`rejectedOn`) values 
(1,'AUDC','AUDCFMS2','Ranu','Mondol','Kanu Mondol','Male','Kolkata, West Bengal, Bangladesh','2021-08-10','Music Department','Music','0000-00-00','ranu@gmail.com','9874563214',1,2,1,'2021-09-29','2021-09-29',NULL),
(2,'AUS','AUSCC123','Sandeepan ','Das','Sushobhan Chandra Das','Male','Assam','2021-10-01','Chemistry','PGDCA','0000-00-00','sandeepan@gmail.com','9954897654',2,0,1,'0000-00-00',NULL,NULL),
(3,'AUDC','Audc','Bhuvan','Bam','Bhuvan ka Baap','Male','Delhi','2021-09-01','Phillosophy','Philosphy','0000-00-00','ayz@rediffmail.com','9874563210',2,0,2,'2021-09-29',NULL,'2021-09-29'),
(4,'AUDC','AUDCENG001','Deizy','Narzary','Khwrwmdaw Narzary','Male','Udalguri, Bodoland, Assam','1990-02-14','English','M.A','2022-12-30','deizy@gmail.com','9987456321',4,0,0,'2021-10-06',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
