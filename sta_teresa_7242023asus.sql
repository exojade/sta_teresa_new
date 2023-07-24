/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.3.16-MariaDB : Database - sta_teresa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sta_teresa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sta_teresa`;

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `announcement_id` varchar(100) DEFAULT NULL,
  `announcement` text DEFAULT NULL,
  `background_image` text DEFAULT NULL,
  `date_added` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `time_added` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `announcements` */

/*Table structure for table `burial_service_contract` */

DROP TABLE IF EXISTS `burial_service_contract`;

CREATE TABLE `burial_service_contract` (
  `contract_id` varchar(100) DEFAULT NULL,
  `client_firstname` varchar(100) DEFAULT NULL,
  `client_middlename` varchar(100) DEFAULT NULL,
  `client_lastname` varchar(100) DEFAULT NULL,
  `client_suffix` varchar(100) DEFAULT NULL,
  `address_home` varchar(100) DEFAULT NULL,
  `address_barangay` varchar(100) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `embalming_cost` varchar(10) DEFAULT NULL,
  `embalming_days` varchar(100) DEFAULT NULL,
  `casket_type` varchar(100) DEFAULT NULL,
  `casket_cost` varchar(10) DEFAULT NULL,
  `arrangement_type` varchar(100) DEFAULT NULL,
  `arrangement_cost` varchar(10) DEFAULT NULL,
  `coach_type` varchar(100) DEFAULT NULL,
  `coach_cost` varchar(100) DEFAULT NULL,
  `extra` varchar(100) DEFAULT NULL,
  `extra_cost` varchar(100) DEFAULT NULL,
  `downpayment` varchar(100) DEFAULT NULL,
  `burial_date` varchar(10) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `burial_time` varchar(100) DEFAULT NULL,
  `deceased_firstname` varchar(100) DEFAULT NULL,
  `deceased_lastname` varchar(100) DEFAULT NULL,
  `deceased_middlename` varchar(100) DEFAULT NULL,
  `deceased_suffix` varchar(100) DEFAULT NULL,
  `death_date` varchar(10) DEFAULT NULL,
  `contract_date` varchar(10) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `place_of_death` varchar(100) DEFAULT NULL,
  `deceased_gender` varchar(100) DEFAULT NULL,
  `client_relationship` varchar(100) DEFAULT NULL,
  `deceased_city` varchar(100) DEFAULT NULL,
  `deceased_address` varchar(100) DEFAULT NULL,
  `deceased_barangay` varchar(100) DEFAULT NULL,
  `deceased_zipcode` varchar(100) DEFAULT NULL,
  `death_address` varchar(100) DEFAULT NULL,
  `obituary_message` text DEFAULT NULL,
  `obituary_image` text DEFAULT NULL,
  `valid_date` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `burial_service_contract` */

insert  into `burial_service_contract`(`contract_id`,`client_firstname`,`client_middlename`,`client_lastname`,`client_suffix`,`address_home`,`address_barangay`,`address_city`,`zipcode`,`branch`,`embalming_cost`,`embalming_days`,`casket_type`,`casket_cost`,`arrangement_type`,`arrangement_cost`,`coach_type`,`coach_cost`,`extra`,`extra_cost`,`downpayment`,`burial_date`,`total_amount`,`burial_time`,`deceased_firstname`,`deceased_lastname`,`deceased_middlename`,`deceased_suffix`,`death_date`,`contract_date`,`remarks`,`place_of_death`,`deceased_gender`,`client_relationship`,`deceased_city`,`deceased_address`,`deceased_barangay`,`deceased_zipcode`,`death_address`,`obituary_message`,`obituary_image`,`valid_date`,`created_by`) values 
('2023040001','JUAN','J','DELA CRUZ','','11','SAN FRANCISCO','PANABO','8105','PANABO','8000','7','OGOY PLAIN','9000','','','','','VIEWING FOR 7 DAYS','9000','10000','2023-04-30','26000',NULL,'MICHAEL','JACKSON','J','','2023-04-23','2023-04-26','PAID',NULL,'MALE','CHILD','PANABO CITY','11','SAN FRANCISCO','8105','HOUSE','asdasdasdasddddddddd','resources/obituary/crop.jpg','2023-07-24',NULL),
('2023050001','LEBRON','S','JAMES','','15','NEW VISAYAS','PANABO CITY','8105','BUNAWAN','7000','9','ORDINARY','8000','COMPLETE','6000','BLACK','15000','VIEWING FOR 12 DAYS','18000',NULL,'2023-05-08','54000',NULL,'FERDINAND','MARCOS','M','','1965-01-01','2023-05-07','UNPAID',NULL,'MALE','BROTHER','PANABO CITY','15','NEW VISAYAS','8105','HOUSE','This is sample obituary',NULL,'2023-07-24',NULL),
('2023050002','vanessa','b','bryant','','11','bunawan','davao','8000','BUNAWAN','15000','7','METAL','20000','complete','20000','black','30000','viewing for 12 days','20000',NULL,'2023-05-08','105000',NULL,'kobe bean','bryant','b','','2020-01-26','2023-05-07','UNPAID',NULL,'MALE','wife','DAVAO CITY','BUNAWAN','BUNAWAN','8000','HOUSE','Another sample obituary please',NULL,'2023-07-24',NULL);

/*Table structure for table `casket` */

DROP TABLE IF EXISTS `casket`;

CREATE TABLE `casket` (
  `casket_id` int(100) NOT NULL AUTO_INCREMENT,
  `casket` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `casket_image` text DEFAULT NULL COMMENT 'image url of the casket',
  KEY `casket_id` (`casket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `casket` */

insert  into `casket`(`casket_id`,`casket`,`amount`,`casket_image`) values 
(1,'ORD. INF','6000','resources/caskets/wagon.jpg'),
(2,'ORD. 3FT',NULL,NULL),
(3,'ORD. 4FT',NULL,NULL),
(4,'OGOY 3FT',NULL,NULL),
(5,'OGOY 4FT',NULL,NULL),
(6,'OGOY 5FT',NULL,NULL),
(7,'JR. 3FT',NULL,NULL),
(8,'JR. 4FT',NULL,NULL),
(9,'JR. 5FT',NULL,NULL),
(10,'ORDINARY',NULL,NULL),
(11,'FLAT',NULL,NULL),
(12,'OGOY PLAIN',NULL,NULL),
(13,'JR. PLAIN',NULL,NULL),
(14,'JR. FG',NULL,NULL),
(15,'OMB XL',NULL,NULL),
(16,'OMB XXL',NULL,NULL),
(17,'TAPIAS HG',NULL,NULL),
(18,'TAPIAS FG',NULL,NULL),
(19,'TAPIAS DE DARRA',NULL,NULL),
(20,'SEE THROUGH',NULL,NULL),
(21,'SLEEPING BEAUTY',NULL,NULL),
(22,'SEMI METAL',NULL,NULL),
(23,'METAL',NULL,NULL),
(24,'New Casket','1500','resources/caskets/Virtual_E-BPLS.png');

/*Table structure for table `chapel` */

DROP TABLE IF EXISTS `chapel`;

CREATE TABLE `chapel` (
  `chapel_id` varchar(100) DEFAULT NULL,
  `chapel_name` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chapel` */

/*Table structure for table `embalmer_certificate` */

DROP TABLE IF EXISTS `embalmer_certificate`;

CREATE TABLE `embalmer_certificate` (
  `contract_id` varchar(100) DEFAULT NULL,
  `issued_client_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `embalmer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `embalmer_certificate` */

insert  into `embalmer_certificate`(`contract_id`,`issued_client_name`,`relationship`,`embalmer`) values 
('2023040001','MICHAEL JORDAN','UNCLE','SKUSTA CLEE');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `employee_id` varchar(100) DEFAULT NULL,
  `employee_name` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `base_salary` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

/*Table structure for table `guarantors` */

DROP TABLE IF EXISTS `guarantors`;

CREATE TABLE `guarantors` (
  `tbl_id` int(100) DEFAULT NULL,
  `guarantor` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guarantors` */

insert  into `guarantors`(`tbl_id`,`guarantor`,`branch`) values 
(1,'DSWD',NULL),
(2,'PSWDO',NULL),
(3,'CSWDO',NULL),
(4,'TAGUM COOP',NULL),
(5,'TLU',NULL),
(6,'DUSU',NULL),
(7,'FUTURE LIFE',NULL),
(8,'COMCARE',NULL),
(10,'MAJAR',NULL),
(11,'CONCEPT CHAIN',NULL),
(12,'ABUNDANT',NULL),
(13,'MPSC',NULL),
(14,'ANGELICA',NULL),
(15,'SEDPI MF',NULL),
(16,'PHIL FUTURE',NULL);

/*Table structure for table `promissory` */

DROP TABLE IF EXISTS `promissory`;

CREATE TABLE `promissory` (
  `promissory_id` varchar(100) DEFAULT NULL,
  `date_valid` varchar(100) DEFAULT NULL,
  `proxy` varchar(100) DEFAULT NULL,
  `contract_id` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `promissory` */

insert  into `promissory`(`promissory_id`,`date_valid`,`proxy`,`contract_id`,`address`,`client_name`) values 
('Promissory01','2023-05-04','MICHAEL JORDAN','2023040001','PANABO CITY',NULL);

/*Table structure for table `promissory_note` */

DROP TABLE IF EXISTS `promissory_note`;

CREATE TABLE `promissory_note` (
  `contract_id` varchar(100) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `client_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `promissory_note` */

/*Table structure for table `site_options` */

DROP TABLE IF EXISTS `site_options`;

CREATE TABLE `site_options` (
  `url` varchar(100) DEFAULT NULL,
  `site_title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `site_options` */

insert  into `site_options`(`url`,`site_title`,`description`) values 
('http://localhost:81/sta_teresa','STA TERESA FUNERAL HOMES',NULL);

/*Table structure for table `soa` */

DROP TABLE IF EXISTS `soa`;

CREATE TABLE `soa` (
  `soa_id` varchar(100) DEFAULT NULL,
  `agency_id` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `soa` */

insert  into `soa`(`soa_id`,`agency_id`,`agency`,`remarks`,`date_created`) values 
('SOA-96a94d93d7f0c-230507','3','CSWDO','UNPAID','2023-05-07 23:05:59'),
('SOA-dc4bd68d81ad3-230507','3','CSWDO','UNPAID','2023-05-07 23:09:42'),
('SOA-790513f583a2b-230507','1','DSWD','UNPAID','2023-05-07 23:10:42');

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `user_id` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `role` enum('staff','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

insert  into `tblusers`(`user_id`,`username`,`password`,`fullname`,`role`) values 
('USER0001','admin','$1$B4s.vIAu$ZSFy4Whr2qXhP9sLwBoHQ1','ADMIN ADMIN','admin');

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `contract_id` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `transaction_type` varchar(100) DEFAULT NULL,
  `transaction_date` varchar(100) DEFAULT NULL,
  `account_status` varchar(100) DEFAULT NULL,
  `soa_id` varchar(100) DEFAULT NULL,
  KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `transaction` */

insert  into `transaction`(`transaction_id`,`contract_id`,`amount`,`payment_type`,`agency`,`transaction_type`,`transaction_date`,`account_status`,`soa_id`) values 
(1,'2023040001','10000','CASH',NULL,'PAYMENT','2023-04-26',NULL,NULL),
(2,'2023040001','5000','CASH',NULL,'PAYMENT','2023-04-27',NULL,NULL),
(3,'2023040001','4000','GUARANTEE','3','PAYMENT','2023-04-26','SETTLED','SOA-96a94d93d7f0c-230507'),
(4,'2023040001','1000','GUARANTEE','1','PAYMENT','2023-05-04','UNSETTLED','SOA-790513f583a2b-230507'),
(9,'2023040001','3000','GUARANTEE','2','PAYMENT','2023-05-07','UNSETTLED',NULL),
(10,'2023050001','15000','CASH','','PAYMENT','2023-05-07','',NULL),
(11,'2023050001','5000','GUARANTEE','3','PAYMENT','2023-05-07','SETTLED','SOA-96a94d93d7f0c-230507'),
(12,'2023050002','20000','CASH','','PAYMENT','2023-05-07','',NULL),
(13,'2023050002','12000','GUARANTEE','3','PAYMENT','2023-05-07','UNSETTLED','SOA-dc4bd68d81ad3-230507'),
(14,'2023040001','3000','CASH','','PAYMENT','2023-05-10','',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
