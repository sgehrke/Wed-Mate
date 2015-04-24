# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: wedmate_db
# Generation Time: 2015-04-22 20:16:10 +0000
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
	(6,'April 10, 2015','Brookes Day','Today is Great! Well, its ok',2);

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
	(2,'Slideshow',99,'Custom made slideshow of Bride and Groom',2);

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
	(1,'Platinum Package',8,1199,50,400,'This is our top package. Everything you need and more! ',2);

/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
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
	(1,'sgehrke','5f4dcc3b5aa765d61d8327deb882cf99','djshaun@thenewdancemachine.com','The New Dance Machine','http://yourdjcompanyname.com/image.jpg','http://thenewdancemachine.com'),
	(2,'shaun','37b4e2d82900d5e94b8da524fbeb33c0','shaungehrke@fullsail.edu','TNDM','http://yourdjcompanyname.com/image.jpg','http://thenewdancemachine.com'),
	(3,'student','5f4dcc3b5aa765d61d8327deb882cf99','example@1.com','New Company','http://yourdjcompanyname.com/image.jpg','http://website.com'),
	(4,'elite','bd0e6da36e55f57ddd98b6af62f6e617','dj@elite.com','Elite DJ Service','http://yourdjcompanyname.com/image.jpg','http://website.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
