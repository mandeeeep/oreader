/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.16-log : Database - openlib
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `openlib`;

USE `openlib`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `do_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `do_title` varchar(255) DEFAULT NULL,
  `do_author` varchar(255) DEFAULT NULL,
  `do_su_id` int(11) unsigned NOT NULL,
  `do_tags` varchar(250) DEFAULT NULL,
  `do_desc` text,
  `do_up_id` int(11) unsigned DEFAULT NULL,
  `do_filepath` varchar(255) DEFAULT NULL,
  `do_status` int(1) DEFAULT '1',
  PRIMARY KEY (`do_id`),
  KEY `FK_document_sub` (`do_su_id`),
  KEY `FK_document` (`do_up_id`),
  CONSTRAINT `FK_document` FOREIGN KEY (`do_up_id`) REFERENCES `uploader` (`up_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_document_sub` FOREIGN KEY (`do_su_id`) REFERENCES `subject` (`su_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `document` */

/*Table structure for table `semester` */

DROP TABLE IF EXISTS `semester`;

CREATE TABLE `semester` (
  `se_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `se_name` varchar(25) NOT NULL,
  `se_status` int(1) DEFAULT '1',
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `semester` */

insert  into `semester`(`se_id`,`se_name`,`se_status`) values (1,'First',1),(2,'Second',1),(3,'Third',1),(4,'Fourth',1),(5,'Fifth',1),(6,'Sixth',1),(7,'Seventh',1),(8,'Eighth',1);

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `su_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `su_name` varchar(255) NOT NULL,
  `su_abbr` varchar(10) DEFAULT NULL,
  `su_se_id` int(11) unsigned DEFAULT NULL,
  `su_status` int(1) DEFAULT '1',
  PRIMARY KEY (`su_id`),
  KEY `FK_subject` (`su_se_id`),
  CONSTRAINT `FK_subject` FOREIGN KEY (`su_se_id`) REFERENCES `semester` (`se_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `subject` */

/*Table structure for table `uploader` */

DROP TABLE IF EXISTS `uploader`;

CREATE TABLE `uploader` (
  `up_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `up_uname` varchar(20) NOT NULL,
  `up_pwd` varchar(32) NOT NULL,
  `up_name` varchar(100) DEFAULT NULL,
  `up_status` int(1) DEFAULT '1',
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `uploader` */

insert  into `uploader`(`up_id`,`up_uname`,`up_pwd`,`up_name`,`up_status`) values (1,'mandeep','mandeep','mandeep',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
