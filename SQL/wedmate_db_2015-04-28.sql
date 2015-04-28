# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: wedmate_db
# Generation Time: 2015-04-28 05:00:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventDate` varchar(50) NOT NULL DEFAULT '',
  `eventTitle` varchar(100) DEFAULT '',
  `eventDesc` text,
  `eventCreator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventCreator` (`eventCreator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `eventDate`, `eventTitle`, `eventDesc`, `eventCreator`)
VALUES
	(1,'April 17, 2015','First Date Test','First test date blackout',2),
	(5,'April 23, 2015','Another Event','Another Event',2),
	(6,'April 10, 2015','Brookes Day','Today is Great! Well, its ok',2),
	(15,'April 01, 2015','ADDED DATE','',3),
	(17,'April 12, 2015','Vacation','',3),
	(18,'April 18, 2015','Setup @ Lambeau','Tundra Tailgate events',10);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `optionName` text,
  `optionPrice` int(11) DEFAULT NULL,
  `optionDesc` text,
  `optionCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `optionCreator` (`optionCreator`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;

INSERT INTO `options` (`id`, `optionName`, `optionPrice`, `optionDesc`, `optionCreator`)
VALUES
	(1,'Uplighting',499,'Accent lighting through your entire venue.',2),
	(2,'Slideshow',99,'Custom made slideshow of Bride and Groom',2),
	(3,'Photobooth',599,'4 hours of crazy fun!',2);

/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table packages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `packageName` text,
  `packageHours` int(11) DEFAULT NULL,
  `packagePrice` int(11) DEFAULT NULL,
  `overRate` int(11) DEFAULT NULL,
  `packageDeposit` int(11) DEFAULT NULL,
  `packageDesc` text,
  `packageCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packageCreator` (`packageCreator`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;

INSERT INTO `packages` (`id`, `packageName`, `packageHours`, `packagePrice`, `overRate`, `packageDeposit`, `packageDesc`, `packageCreator`)
VALUES
	(3,'Pearl Package',8,899,50,200,'',2),
	(2,'Diamond Package',4,999,50,200,'This package is the second tier package',2),
	(1,'Platinum Package',8,1199,50,200,'This is our top package. Everything you need and more! ',2),
	(7,'sgehrke',0,0,0,0,'just a test while connecting the calendar',1),
	(8,'Student Package',2,200,200,200,'',3),
	(9,'The Platinum Plus Package',6,2000,100,400,'The Platinum Plus Package Includes:\r\nState of the art JBL Sound System\r\n4 Hours of Entertainment\r\n2 Hours of Dinner Entertainment\r\n4 Hour Photo Booth rental (With props if requested)\r\n8-14 Up-lights included. Just pick a color!\r\nExperienced Entertainer\r\nUpgraded Exceptional light show\r\nCustom made Slide Show\r\nProfessional Sennheiser Wireless microphone\r\nNew Moving Head Lighting Available upon request\r\nPhone or in person consultation before the event\r\nSet Up and take down all Equipment',10);

/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quoteDate` varchar(50) DEFAULT NULL,
  `quoteName` varchar(50) NOT NULL DEFAULT '',
  `quoteEmail` varchar(100) NOT NULL DEFAULT '',
  `quotePhone` varchar(25) DEFAULT NULL,
  `quoteLocation` varchar(50) DEFAULT NULL,
  `startTime` varchar(11) NOT NULL DEFAULT '',
  `endTime` varchar(11) NOT NULL,
  `quotePackage` varchar(100) NOT NULL,
  `quoteOption` varchar(100) DEFAULT NULL,
  `overTime` int(50) DEFAULT NULL,
  `quotePrice` int(25) DEFAULT NULL,
  `quoteSubmitted` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `quoteCreator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quoteCreator` (`quoteCreator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;

INSERT INTO `quotes` (`id`, `quoteDate`, `quoteName`, `quoteEmail`, `quotePhone`, `quoteLocation`, `startTime`, `endTime`, `quotePackage`, `quoteOption`, `overTime`, `quotePrice`, `quoteSubmitted`, `quoteCreator`)
VALUES
	(1,'April 17, 2015','Mary','mary@email.com','(234) 234-1123','Tundra Lodge','12','24','Platinum Package','Uplighting',NULL,2098,'2015-04-23 15:48:39',2),
	(4,'April 24, 2015','New','email@email.com','(340) 898-2302','Here','12','17.5','Pearl Package','',NULL,899,'2015-04-27 11:46:10',2),
	(5,'April 17, 2015','Greg','greg@email.com','(464) 564-3572','Green Bay','14','17.5','Platinum Package','',NULL,1199,'2015-04-27 11:46:11',2),
	(6,'April 22, 2015','Shaun C Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','12','24','Pearl Package','',NULL,1299,'2015-04-27 11:46:12',2),
	(7,'April 29, 2015','Shaun C Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','11','18.5','Platinum Package','',NULL,1199,'2015-04-27 11:46:15',2),
	(8,'April 28, 2015','Mom','mom@mommy.com','(911) 042-5223','Crib','12','19','Platinum Package','Uplighting',NULL,1698,'2015-04-23 17:05:00',2),
	(9,'April 27, 2015','Mom','mary@email.com','(567) 564-7657','rthsfgb','14','19.5','Diamond Package','Slideshow',NULL,1248,'2015-04-23 17:07:26',2),
	(11,'April 28, 2015','Shaun Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','12.5','19','Platinum Package','',NULL,1199,'2015-04-27 11:46:16',2),
	(12,'April 05, 2015','Brooke','email@email.com','(453) 463-2564','Mulberry Lane','11.5','20.5','Pearl Package','Slideshow',NULL,1098,'2015-04-23 17:17:18',2),
	(13,'April 28, 2015','Shaun Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','12','18.5','Pearl Package','Slideshow',0,998,'2015-04-23 17:39:57',2),
	(14,'September 02, 2015','Shaun Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','Rock Garden','11','End Time','NULL','',500,1898,'2015-04-27 11:46:17',2),
	(16,'November 06, 2015','Shaun Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','Start Time','End Time','NULL','',0,1298,'2015-04-27 11:46:18',2),
	(18,'April 05, 2015','Using AJAX','ajax@javascript.com','dsghsdhdafh','sdhfgsdfgdf','12.5','18.5','Diamond Package','Photobooth',200,1798,'2015-04-23 23:41:43',2),
	(19,'April 23, 2015','Test for Creator 1','email@email.com','','','Start Time','End Time','NULL','',0,0,'2015-04-27 11:46:20',2),
	(20,'April 30, 2015','Test for Creator 1','email@email.com','22342342','Todaw','11','18','NULL','',0,0,'2015-04-27 11:46:22',1),
	(21,'April 30, 2015','Shaun Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','14','19','Diamond Package','Slideshow',0,1398,'2015-04-27 08:16:46',2),
	(22,'April 21, 2015','Shaun C Gehrke','djshaun@thenewdancemachine.com','(920) 819-8098','United States','11.5','18','Platinum Package','Photobooth',0,1398,'2015-04-27 08:18:45',2),
	(23,'April 25, 2015','Testing quote header','','','','15','21.5','NULL','',0,0,'2015-04-27 11:46:23',2),
	(24,'April 18, 2015','Testing quote peristance','','','','12.5','19.5','Platinum Package','Slideshow',0,1398,'2015-04-27 18:28:20',2),
	(25,'April 25, 2015','Platinum Choice','','','','11','23.5','Platinum Package','Photobooth',0,1398,'2015-04-27 18:57:33',2),
	(26,'April 24, 2015','New Quote testing math','','','','12','17','Diamond Package','Uplighting',0,1398,'2015-04-27 20:05:57',2),
	(29,'April 16, 2015','Social feed Test','','','','21','22.5','Pearl Package','Uplighting',0,1398,'2015-04-28 02:20:18',2),
	(30,'April 16, 2015','Modified Name','','','','12','17.5','Diamond Package','Not Needed',150,1149,'2015-04-28 02:35:39',2);

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` char(64) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `companyname` char(32) DEFAULT NULL,
  `logourl` text,
  `website` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `companyname`, `logourl`, `website`)
VALUES
	(1,'sgehrke','5f4dcc3b5aa765d61d8327deb882cf99','djshaun@thenewdancemachine.com','The New Dance Machine','\n','http://thenewdancemachine.com'),
	(2,'shaun','37b4e2d82900d5e94b8da524fbeb33c0','shaungehrke@fullsail.edu','TNDM','http://i1355.photobucket.com/albums/q715/TNDM_DJservice/bth_viewlogo.png','http://thenewdancemachine.com'),
	(3,'student','5f4dcc3b5aa765d61d8327deb882cf99','example@1.com','DJ Cobra','http://upload.wikimedia.org/wikipedia/commons/c/cb/DJ_Cobra_Logo.png','http://website.com'),
	(4,'elite','bd0e6da36e55f57ddd98b6af62f6e617','dj@elite.com','Elite DJ Service','http://yourdjcompanyname.com/image.jpg','http://website.com'),
	(5,'ShaunG','5f4dcc3b5aa765d61d8327deb882cf99','Email@1.com','TEST','http://yourdjcompanyname.com/image.jpg','http://website.com'),
	(9,'Username','dc647eb65e6711e155375218212b3964','example@1.com','This Will Work','http://yourdjcompanyname.com/image.jpg','http://website.com'),
	(10,'Matt','5f4dcc3b5aa765d61d8327deb882cf99','pam@mattsdjservice.com','Matts DJ Service','http://www.mattsdjservice.com/img/nav-logo.png','http://www.mattsdjservice.com/');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
