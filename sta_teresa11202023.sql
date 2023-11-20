/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.20-MariaDB : Database - sta_teresa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sta_teresa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sta_teresa`;

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `announcement_id` int(100) NOT NULL AUTO_INCREMENT,
  `announcement` text DEFAULT NULL,
  `background_image` text DEFAULT NULL,
  `date_added` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `time_added` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  KEY `announcement_id` (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `announcements` */

insert  into `announcements`(`announcement_id`,`announcement`,`background_image`,`date_added`,`timestamp`,`time_added`,`status`,`title`) values 
(2,'Christmas Promo 50% sa tanang lungon!','resources/announcements/xxss_trendy_ideas_christmas_promotions.png','2023-07-28','1690529094','03:24:54 pm','INACTIVE','Christmas Promo'),
(3,'Halloween Trick or Treat! 50% Discount sa tanang lungon','resources/announcements/halloween_party_tarpaulin_by_maztabotin-d4pke79.jpg','2023-11-05','1699117195','12:59:55 am','ACTIVE','For Halloween Discount');

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `branch` varchar(100) DEFAULT NULL,
  `branch_id` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `branch` */

insert  into `branch`(`branch`,`branch_id`,`address`) values 
('PANABO CITY','BRANCH-4c06b30b6bdab-231014','Km. 31 Gredu, Panabo City'),
('BUNAWAN, DAVAO CITY','BRANCH-54790972d4f40-231014','Km. 24 Bunawan, Davao City'),
('TAGUM CITY','BRANCH-1474cefce8f82-231014','Km. 35, Apokon, Tagum City (SAMPLE)');

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
  `contact_number` varchar(100) DEFAULT NULL,
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
  `created_by` varchar(100) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `burial_service_contract` */

insert  into `burial_service_contract`(`contract_id`,`client_firstname`,`client_middlename`,`client_lastname`,`client_suffix`,`address_home`,`address_barangay`,`address_city`,`zipcode`,`contact_number`,`branch`,`embalming_cost`,`embalming_days`,`casket_type`,`casket_cost`,`arrangement_type`,`arrangement_cost`,`coach_type`,`coach_cost`,`extra`,`extra_cost`,`downpayment`,`burial_date`,`total_amount`,`burial_time`,`deceased_firstname`,`deceased_lastname`,`deceased_middlename`,`deceased_suffix`,`death_date`,`contract_date`,`remarks`,`place_of_death`,`deceased_gender`,`client_relationship`,`deceased_city`,`deceased_address`,`deceased_barangay`,`deceased_zipcode`,`death_address`,`obituary_message`,`obituary_image`,`valid_date`,`created_by`,`plan`) values 
('2023040001','JUAN','J','DELA CRUZ','','11','SAN FRANCISCO','PANABO','8105','09912021547','PANABO CITY','8000','7','OGOY PLAIN','9000','','','','','VIEWING FOR 7 DAYS','9000','10000','2023-04-30','26000',NULL,'MICHAEL','JACKSON','J','','2023-04-23','2023-04-26','PAID',NULL,'MALE','CHILD','PANABO CITY','11','SAN FRANCISCO','8105','HOUSE','asdasdasdasddddddddd','resources/obituary/731282.jpg','2023-11-14','USERS-7b3d39b198c80-230730','TAGUM COOPERATIVE'),
('2023050001','LEBRON','S','JAMES','','15','NEW VISAYAS','PANABO CITY','8105','','BUNAWAN, DAVAO CITY','7000','9','ORDINARY','8000','COMPLETE','6000','BLACK','15000','VIEWING FOR 12 DAYS','18000',NULL,'2023-05-08','54000',NULL,'FERDINAND','MARCOS','M','','2023-04-21','2023-05-07','PAID',NULL,'MALE','BROTHER','PANABO CITY','15','NEW VISAYAS','8105','HOUSE','This is sample obituary',NULL,'2023-07-31','USERS-7b3d39b198c80-230730','NONE'),
('2023050002','vanessa','b','bryant','','11','bunawan','davao','8000','','BUNAWAN, DAVAO CITY','15000','7','METAL','20000','complete','20000','black','30000','viewing for 12 days','20000',NULL,'2023-05-08','105000',NULL,'kobe bean','bryant','b','','2020-01-26','2023-05-07','UNPAID',NULL,'MALE','wife','DAVAO CITY','BUNAWAN','BUNAWAN','8000','HOUSE','Another sample obituary please',NULL,'2023-07-31','USERS-7b3d39b198c80-230730','PHIL FUTURE'),
('2023070002','KEVIN','D','DURANT','','11','SAN FRANCISCO','PANABO CITY','8105',NULL,'PANABO','5000','5','OGOY PLAIN','4500','','','','','VIEWING 7 DAYS','5000',NULL,'2023-07-31','14500',NULL,'MARK','DURANT','D','','2023-07-01','2023-07-30','PAID',NULL,'MALE','FATHER','PANABO CITY','11','SAN FRANCISCO','8105','SAN VICENTE','SA TANANG MGA KAPARENTIHAN NI DURANT PWEDE MO MUBISITA DIRI SA STA TERESA ANG IYANG LUBONG KAY SA ETERNAL GARDEN','resources/obituary/photo2.png','2023-08-11','USERS-7b3d39b198c80-230730',NULL),
('2023100002','RAJON','R','RONDO','','PUROK 12','KIOTOY','PANABO CITY','8105','09912021599','PANABO','8000','7','TAPIAS DE DARRA','12000','','','','','','',NULL,'2023-10-25','20000',NULL,'ALLEN','IVERSON','I','','2023-10-01','2023-10-11','UNPAID',NULL,'MALE','SON','PANABO CITY','PUROK 12','KIOTOY','8105','KIOTOY PANABO CITY',NULL,NULL,NULL,'USERS-7b3d39b198c80-230730',NULL),
('2023100003','KEVIN','G','GARNET','','PUROK 11','SOUTHERN DAVAO','PANABO CITY','8105','0991202020202','PANABO','25000','8','OMB XL','15000','','','SUITE','5000','','',NULL,'2023-10-30','45000',NULL,'PAUL','PIERCE','P','','2023-10-10','2023-10-11','UNPAID',NULL,'MALE','UNCLE','PANABO CITY','PUROK 10','SAN ROQUE','8105','SOUTHERN DAVAO',NULL,NULL,NULL,'USERS-7b3d39b198c80-230730',NULL),
('2023100004','ANT','D','DAVIS','','PUROK 11','SAN VICENTE','PANABO CITY','8105','099120219902','PANABO CITY','5000','','OGOY 4FT','12000','','','','','','',NULL,'2023-10-20','17000',NULL,'CARMELO','ANTHONY','D','','2023-09-10','2023-10-15','PAID',NULL,'FEMALE','FATHER','PANABO CITY','PUROK 2','MABUNAO','8105','MABUNAO',NULL,NULL,NULL,'USER0001','DUSU'),
('2023110001','NARUTO','','UZUMAKI','','PUROK 2','DATU ABDUL','PANABO CITY','8105','09910101112','PANABO CITY','5000','7','JR. PLAIN','2500','','','','','','',NULL,'2023-11-03','7500',NULL,'BORUTO','UZUMAKI','','','2023-10-31','2023-11-04','UNPAID',NULL,'MALE','FATHER','PANABO CITY','PUROK 2','DATU ABDUL','8105','DATU ABDUL HOUSE',NULL,NULL,NULL,'USER0001','TAGUM COOPERATIVE'),
('2023110003','SASUKE','','UCHIHA','','PUROK 2','BUNAWAN','DAVAO CITY','8000','0913028592','BUNAWAN, DAVAO CITY','5000','3','JR. PLAIN','5000','','','COACH','7000','','',NULL,'2023-11-03','17000',NULL,'SARADA','UCHIHA','','','2023-10-31','2023-11-04','UNPAID',NULL,'FEMALE','FATHER','DAVAO CITY','PUROK 2','BUNAWAN','8000','ROAD HIGHWAY',NULL,NULL,NULL,'USER0001','CONCEPT CHAIN'),
('2023110002','AUSTIN','','REAVES','','NARTATEZ SUBD','CAGANGOHAN','PANABO CITY','8105','09151233121','PANABO CITY','5000','10','JR. PLAIN','5000','FLOWER','2000','COACH','3000','','',NULL,'2023-11-10','15000',NULL,'ALEX','CARUSO','','','2023-11-01','2023-11-04','UNPAID',NULL,'MALE','FATHER','PANABO CITY','NARTATEZ SUBD','CAGANGOHAN','8105','HOUSE ARREST',NULL,NULL,NULL,'USER0001','TAGUM COOPERATIVE'),
('P-2023110005','LUKA','','DONCIC','','PUROK 3','JP LAUREL','PANABO CITY','8105','09224233121','PANABO CITY','5000','4','TAPIAS HG','9000','','','','','','',NULL,'2023-11-04','14000',NULL,'kyrie','irving','','','2023-10-31','2023-11-04','UNPAID',NULL,'MALE','UNCLE','PANABO CITY','PUROK 3','JP LAUREL','8105','road',NULL,NULL,NULL,'USER0001','NONE'),
('P-2023110006','nikola','','jokic','','1','manay','panabo','8105','09125687621','PANABO CITY','6000','4','OGOY 5FT','6000','','','','','','',NULL,'2023-11-10','12000',NULL,'jared','jackson','','jr','2023-11-06','2023-11-06','UNPAID',NULL,'MALE','father','panabo','1','manay','8105','road',NULL,NULL,NULL,'USER0001','TAGUM COOPERATIVE');

/*Table structure for table `casket` */

DROP TABLE IF EXISTS `casket`;

CREATE TABLE `casket` (
  `casket_id` int(100) NOT NULL AUTO_INCREMENT,
  `casket` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `casket_image` text DEFAULT NULL COMMENT 'image url of the casket',
  KEY `casket_id` (`casket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `casket` */

insert  into `casket`(`casket_id`,`casket`,`amount`,`casket_image`) values 
(1,'ORD. INF','6000','resources/caskets/wagon.jpg'),
(2,'ORD. 3FT','3000',NULL),
(3,'ORD. 4FT','4000',NULL),
(4,'OGOY 3FT',NULL,NULL),
(5,'OGOY 4FT',NULL,NULL),
(6,'OGOY 5FT',NULL,NULL),
(7,'JR. 3FT','2000',NULL),
(8,'JR. 4FT',NULL,NULL),
(9,'JR. 5FT',NULL,NULL),
(10,'ORDINARY',NULL,NULL),
(11,'FLAT','3400',NULL),
(12,'OGOY PLAIN',NULL,NULL),
(13,'JR. PLAIN',NULL,NULL),
(14,'JR. FG',NULL,NULL),
(15,'OMB XL',NULL,NULL),
(16,'OMB XXL',NULL,NULL),
(17,'TAPIAS HG',NULL,NULL),
(18,'TAPIAS FG',NULL,NULL),
(19,'TAPIAS DE DARRA',NULL,NULL),
(20,'SEE THROUGH','4500',NULL),
(21,'SLEEPING BEAUTY',NULL,NULL),
(22,'SEMI METAL',NULL,NULL),
(23,'METAL',NULL,NULL),
(24,'New Casket','1500','resources/caskets/Virtual_E-BPLS.png'),
(32,'AWIT','4500',NULL);

/*Table structure for table `casket_image` */

DROP TABLE IF EXISTS `casket_image`;

CREATE TABLE `casket_image` (
  `casket_image_id` varchar(100) DEFAULT NULL,
  `casket_id` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `casket_image` */

insert  into `casket_image`(`casket_image_id`,`casket_id`,`image_url`) values 
('CASKETIMAGE-702d9c84ce3e5-230728','1','resources/caskets/1. ORDINARY.jpg'),
('CASKETIMAGE-567b307f40a99-230728','4','resources/caskets/3. OGOY.jpg'),
('CASKETIMAGE-4756f90294c8a-230728','5','resources/caskets/4. OGOY PLAIN.jpg'),
('CASKETIMAGE-d45067da99e21-230728','6','resources/caskets/3. OGOY.jpg'),
('CASKETIMAGE-9148cd93c6658-230728','7','resources/caskets/5. JR. PLAIN.jpg'),
('CASKETIMAGE-a3af038d4eb40-230728','8','resources/caskets/5. JR. PLAIN.jpg'),
('CASKETIMAGE-2751853bde66d-230728','9','resources/caskets/5. JR. PLAIN.jpg'),
('CASKETIMAGE-c03975f44f634-230728','17','resources/caskets/6. TAPIAS HG.png'),
('CASKETIMAGE-4ce25da994c6d-230728','20','resources/caskets/7. SEE THRU.jpg'),
('CASKETIMAGE-944a5adc20d89-230728','2','resources/caskets/1. ORDINARY.jpg'),
('CASKETIMAGE-191d04a0e043d-230728','3','resources/caskets/1. ORDINARY.jpg'),
('CASKETIMAGE-01a74553f9788-230728','18','resources/caskets/6. TAPIAS HG.png'),
('CASKETIMAGE-189de8a020291-230728','19','resources/caskets/6. TAPIAS HG.png'),
('CASKETIMAGE-b555d584a09dd-230728','11','resources/caskets/262305552_624787351979952_438564749251766153_n-removebg-preview.png'),
('CASKETIMAGE-b5e23867fa179-231114','1','resources/caskets/panabo-logo.png');

/*Table structure for table `chapel` */

DROP TABLE IF EXISTS `chapel`;

CREATE TABLE `chapel` (
  `chapel_id` int(100) NOT NULL AUTO_INCREMENT,
  `chapel_name` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `price_amount` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  KEY `chapel_id` (`chapel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `chapel` */

insert  into `chapel`(`chapel_id`,`chapel_name`,`image_url`,`price_amount`,`branch`) values 
(2,'St Francis Chapel',NULL,'4500','PANABO CITY'),
(3,'St. Elijah',NULL,'12000','PANABO CITY'),
(4,'St. Benedict',NULL,'15000','BUNAWAN, DAVAO CITY'),
(5,'St. Catherine',NULL,'12000','TAGUM CITY'),
(6,'awi',NULL,'9000','PANABO CITY');

/*Table structure for table `chapel_image` */

DROP TABLE IF EXISTS `chapel_image`;

CREATE TABLE `chapel_image` (
  `chapel_image_id` varchar(100) DEFAULT NULL,
  `chapel_id` varchar(100) DEFAULT NULL,
  `chapel_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `chapel_image` */

insert  into `chapel_image`(`chapel_image_id`,`chapel_id`,`chapel_image`) values 
('CHAPELIMAGE-7c37cf67102db-230728','2','resources/chapels/IMG_20230708_114549.jpg'),
('CHAPELIMAGE-2ae95ebe61ef5-230728','2','resources/chapels/IMG_20230708_114617.jpg'),
('CHAPELIMAGE-8b33d4435f35f-230728','2','resources/chapels/IMG_20230708_114635.jpg'),
('CHAPELIMAGE-2ee3b6319eb90-230728','2','resources/chapels/IMG_20230708_114644.jpg'),
('CHAPELIMAGE-96baef03b2bfd-230728','2','resources/chapels/IMG_20230708_114702.jpg'),
('CHAPELIMAGE-155e5c288e16c-230728','2','resources/chapels/IMG_20230708_114943.jpg'),
('CHAPELIMAGE-00527d436f370-230728','2','resources/chapels/IMG_20230708_114950.jpg'),
('CHAPELIMAGE-65533453a77a8-230728','2','resources/chapels/IMG_20230708_115024.jpg'),
('CHAPELIMAGE-ef31bfe29aedc-230728','3','resources/chapels/IMG_20230708_114437.jpg'),
('CHAPELIMAGE-0fdbcf34b4e65-230728','3','resources/chapels/IMG_20230708_114447.jpg'),
('CHAPELIMAGE-169a8def2eac5-230728','3','resources/chapels/IMG_20230708_114500.jpg'),
('CHAPELIMAGE-a0746aed2bc02-230728','3','resources/chapels/IMG_20230708_115047.jpg'),
('CHAPELIMAGE-5aa77d4d093e0-230728','4','resources/chapels/2.jpg'),
('CHAPELIMAGE-91dfddfb0c466-230728','4','resources/chapels/3.jpg'),
('CHAPELIMAGE-d8b64038b2f44-230728','4','resources/chapels/IMG_20230708_113812 (1).jpg'),
('CHAPELIMAGE-071e89c4a3928-230728','5','resources/chapels/IMG_20230708_113812.jpg'),
('CHAPELIMAGE-0d8fc6d0e0d41-230728','5','resources/chapels/IMG_20230708_113854.jpg'),
('CHAPELIMAGE-82955f8305689-230728','5','resources/chapels/IMG_20230708_113919.jpg'),
('CHAPELIMAGE-8dfdba0413106-230728','5','resources/chapels/IMG_20230708_113953.jpg'),
('CHAPELIMAGE-b17e9717ccd7b-230728','5','resources/chapels/IMG_20230708_114008.jpg'),
('CHAPELIMAGE-04cff67f42532-230728','5','resources/chapels/IMG_20230708_114133.jpg'),
('CHAPELIMAGE-f892a25197ad9-231113','6','resources/chapels/HR-LOGO-fin.png');

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
  `base_salary` varchar(100) DEFAULT NULL,
  `profile` tinytext DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

insert  into `employees`(`employee_id`,`employee_name`,`branch`,`base_salary`,`profile`,`position`) values 
('EMP-62b2e81c77d4d-230730','CONOR MCGREGOR','PANABO','410','resources/employees/biometric_machine.jpg','MANAGER'),
('EMP-95ad1bc9f2409-231012','JOSE ALDO','PANABO CITY','410','resources/employees/wp9463658.jpg','EMBALMER'),
('EMP-a2a0928af2ae3-231012','KABIB','BUNAWAN','410','resources/employees/GARCIA, BRIAN JADE A-1.png','EMBALMER'),
('EMP-f2c42911dd701-231114','JON JONES','PANABO CITY','450','resources/employees/howtogethere.png','MANAGER');

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

/*Table structure for table `overdue` */

DROP TABLE IF EXISTS `overdue`;

CREATE TABLE `overdue` (
  `invoice_number` varchar(100) DEFAULT NULL,
  `contract_id` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `deadline` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `client` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `overdue` */

insert  into `overdue`(`invoice_number`,`contract_id`,`date_created`,`deadline`,`amount_paid`,`balance`,`client`) values 
('INV2023040001-1','2023040001','2023-08-07','2023-08-12','26000','0',NULL),
('INV2023110002-1','2023110002','2023-11-05','2023-11-10',NULL,'15000',NULL);

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(100) DEFAULT NULL,
  `partner_image` text DEFAULT NULL,
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `partners` */

insert  into `partners`(`partner_id`,`partner_name`,`partner_image`) values 
(2,'DSWD','resources/partners/DSWD Logo.png'),
(3,'CSWDO PANABO','resources/partners/CSWDO Panabo.png'),
(4,'FUTURE LIFE CARE','resources/partners/Future Life Care Logo.png'),
(5,'Abundant Mortuary','resources/partners/Abundant Mortuary Logo.png'),
(6,'Majar','resources/partners/Majar Logo.png'),
(7,'Tagum Cooperative','resources/partners/TagumCooplogo-removebg-preview.png');

/*Table structure for table `payroll` */

DROP TABLE IF EXISTS `payroll`;

CREATE TABLE `payroll` (
  `payroll_id` varchar(100) DEFAULT NULL,
  `from_date` varchar(100) DEFAULT NULL,
  `to_date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `benefits` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payroll` */

insert  into `payroll`(`payroll_id`,`from_date`,`to_date`,`status`,`benefits`) values 
('PYR-972573f8a5d3b-231012','2023-10-01','2023-10-15','pending',NULL),
('PYR-b5583d07ced0d-231012','2023-10-16','2023-10-31','pending',NULL),
('PYR-02be3a4befab0-231012','2023-11-01','2023-11-15','pending',NULL),
('PYR-40c24477c615d-231114','2023-11-01','2023-11-15','pending',NULL);

/*Table structure for table `payroll_employee` */

DROP TABLE IF EXISTS `payroll_employee`;

CREATE TABLE `payroll_employee` (
  `payroll_id` varchar(100) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `number_days` varchar(100) DEFAULT NULL,
  `base_salary` varchar(100) DEFAULT NULL,
  `cash_advance` varchar(100) DEFAULT NULL,
  `benefits` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payroll_id`,`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payroll_employee` */

insert  into `payroll_employee`(`payroll_id`,`employee_id`,`number_days`,`base_salary`,`cash_advance`,`benefits`,`fullname`,`position`,`branch`) values 
('PYR-02be3a4befab0-231012','EMP-62b2e81c77d4d-230730','12','410','','488',NULL,NULL,NULL),
('PYR-02be3a4befab0-231012','EMP-95ad1bc9f2409-231012','11','410','1340','488',NULL,NULL,NULL),
('PYR-972573f8a5d3b-231012','EMP-62b2e81c77d4d-230730','15','410','1000','488',NULL,NULL,NULL),
('PYR-972573f8a5d3b-231012','EMP-95ad1bc9f2409-231012','6','410',NULL,'488',NULL,NULL,NULL),
('PYR-972573f8a5d3b-231012','EMP-a2a0928af2ae3-231012','12','410','500','488',NULL,NULL,NULL),
('PYR-b5583d07ced0d-231012','EMP-62b2e81c77d4d-230730','7','410','500','488',NULL,NULL,NULL),
('PYR-b5583d07ced0d-231012','EMP-95ad1bc9f2409-231012','8','410',NULL,'488',NULL,NULL,NULL),
('PYR-b5583d07ced0d-231012','EMP-a2a0928af2ae3-231012','6','410',NULL,'488',NULL,NULL,NULL);

/*Table structure for table `plans` */

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `plan_id` varchar(100) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `plans` */

insert  into `plans`(`plan_id`,`plan`) values 
('PLAN-f74ab90837f6f-231014','TAGUM COOPERATIVE'),
('PLAN-533ed947e2370-231014','TLU'),
('PLAN-1fe1cb067c11d-231014','DUSU'),
('PLAN-c12caa7ec5e50-231014','FUTURE LIFE CARE'),
('PLAN-b579443de8b9d-231014','COMCARE'),
('PLAN-18a24dd98df53-231014','MAJAR'),
('PLAN-816e5706015d3-231014','CONCEPT CHAIN'),
('PLAN-dfc42d57c5096-231014','ABUNDANT'),
('PLAN-dbd44ce222f37-231014','MPSC'),
('PLAN-fbde4a84daf44-231014','ANGELICA'),
('PLAN-42f614b1912da-231014','SEDPI MF'),
('PLAN-2a2727074cbe6-231014','PHIL FUTURE'),
('PLAN-122fe8c095082-231104','SAMPLE PLAN');

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
('SOA-96a94d93d7f0c-230507','3','CSWDO','PAID','2023-05-07 23:05:59'),
('SOA-dc4bd68d81ad3-230507','3','CSWDO','PAID','2023-05-07 23:09:42'),
('SOA-790513f583a2b-230507','1','DSWD','PAID','2023-05-07 23:10:42'),
('SOA-9d7ca6507cd85-231011','7','FUTURE LIFE','PAID','2023-10-11 16:40:41'),
('SOA-094b30f231fff-231014','3','CSWDO','PAID','2023-10-14 19:47:39'),
('SOA-2b87aeff49e84-231014','2','PSWDO','PAID','2023-10-14 20:07:03'),
('SOA-4a0aec3be9bad-231014','4','TAGUM COOP','UNPAID','2023-10-14 20:10:01'),
('SOA-bc0d6f186ec4d-231015','4','TAGUM COOP','UNPAID','2023-10-15 08:39:52'),
('SOA-a2a9d2cb21275-231015','3','CSWDO','PAID','2023-10-15 08:40:03'),
('SOA-2cb15a6deaa41-231015','7','FUTURE LIFE','PAID','2023-10-15 08:44:22'),
('SOA-6171971a476dc-231104','1','DSWD','UNPAID','2023-11-04 22:33:45'),
('SOA-aecdda5bc8c0d-231104','4','TAGUM COOP','UNPAID','2023-11-04 23:47:07');

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `user_id` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblusers` */

insert  into `tblusers`(`user_id`,`username`,`password`,`fullname`,`role`,`image_url`,`position`) values 
('USER0001','admin','$1$rlllLkoP$MRPo.Sn9e0SEX9faCNQ2A1','ADMIN ADMIN','admin','resources/users/avatar5.png','SAMPLE POSITION'),
('USERS-7b3d39b198c80-230730','acenito','$1$KIpv0zww$Y0nEw.9ZbyVXXK21gryQ9.','ALICE UNO CENITO','USER','resources/users/Alice Uno Cenita - Office Staff.jpg','MANAGER'),
('USERS-844564145ed73-230730','aelao','$1$3IyuJeO8$4EKxQXIHgZ3r7/7I2YMrT/','ANGELIQUE ENAD LAO','USER','resources/users/Angelique Enad Lao - Funeral Manager.jpg',NULL),
('USERS-531e5cf06f58c-231012','JOSE ALDO','$1$MZc05L8o$tGprsuxWd1ugWy22zJlvV0','PANABO','USER','resources/users/howtogethere.png',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `transaction` */

insert  into `transaction`(`transaction_id`,`contract_id`,`amount`,`payment_type`,`agency`,`transaction_type`,`transaction_date`,`account_status`,`soa_id`) values 
(1,'2023040001','10000','CASH',NULL,'PAYMENT','2023-04-26',NULL,NULL),
(2,'2023040001','5000','CASH',NULL,'PAYMENT','2023-04-27',NULL,NULL),
(3,'2023040001','4000','GUARANTEE','3','PAYMENT','2023-04-26','SETTLED','SOA-96a94d93d7f0c-230507'),
(4,'2023040001','1000','GUARANTEE','1','PAYMENT','2023-05-04','SETTLED','SOA-790513f583a2b-230507'),
(9,'2023040001','3000','GUARANTEE','2','PAYMENT','2023-05-07','SETTLED','SOA-2b87aeff49e84-231014'),
(10,'2023050001','15000','CASH','','PAYMENT','2023-05-07','',NULL),
(11,'2023050001','5000','GUARANTEE','3','PAYMENT','2023-05-07','SETTLED','SOA-96a94d93d7f0c-230507'),
(12,'2023050002','20000','CASH','','PAYMENT','2023-05-07','',NULL),
(13,'2023050002','12000','GUARANTEE','3','PAYMENT','2023-05-07','SETTLED','SOA-dc4bd68d81ad3-230507'),
(14,'2023040001','3000','CASH','','PAYMENT','2023-05-10','',NULL),
(15,'2023050001','34000','CASH','','PAYMENT','2023-07-30','',NULL),
(16,'2023050002','10000','GUARANTEE','3','PAYMENT','2023-10-11','SETTLED','SOA-094b30f231fff-231014'),
(17,'2023050002','5000','GUARANTEE','3','PAYMENT','2023-10-11','SETTLED','SOA-094b30f231fff-231014'),
(18,'2023050002','7000','CASH','','PAYMENT','2023-10-11','',NULL),
(19,'2023050002','6500','GUARANTEE','7','PAYMENT','2023-10-11','SETTLED','SOA-9d7ca6507cd85-231011'),
(20,'2023070002','14500','GUARANTEE','4','PAYMENT','2023-10-11','UNSETTLED','SOA-4a0aec3be9bad-231014'),
(21,'2023100003','17000','CASH','','PAYMENT','2023-10-11','',NULL),
(22,'2023100003','10000','GUARANTEE','3','PAYMENT','2023-10-11','SETTLED','SOA-094b30f231fff-231014'),
(23,'2023100003','12000','GUARANTEE','4','PAYMENT','2023-10-15','SETTLED','SOA-bc0d6f186ec4d-231015'),
(24,'2023100002','2000','GUARANTEE','4','PAYMENT','2023-10-15','UNSETTLED','SOA-bc0d6f186ec4d-231015'),
(25,'2023100002','5000','GUARANTEE','3','PAYMENT','2023-10-15','SETTLED','SOA-a2a9d2cb21275-231015'),
(26,'2023100004','5000','CASH','','PAYMENT','2023-10-15','',NULL),
(27,'2023100004','7000','GUARANTEE','7','PAYMENT','2023-10-15','SETTLED','SOA-2cb15a6deaa41-231015'),
(28,'2023100004','5000','CASH','','PAYMENT','2023-10-15','',NULL),
(29,'2023100003','3000','GUARANTEE','5','PAYMENT','2023-10-15','UNSETTLED',NULL),
(30,'2023110001','2000','GUARANTEE','4','PAYMENT','2023-11-04','UNSETTLED','SOA-aecdda5bc8c0d-231104'),
(31,'2023110001','1000','GUARANTEE','1','PAYMENT','2023-11-04','UNSETTLED','SOA-6171971a476dc-231104'),
(32,'2023110003','5000','GUARANTEE','1','PAYMENT','2023-11-04','UNSETTLED','SOA-6171971a476dc-231104');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
