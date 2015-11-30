-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: donedusted
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dd_user`
--

DROP TABLE IF EXISTS `dd_category_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dd_category_user` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Category` int(11) unsigned DEFAULT NULL,
  `User` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Unique_cu` (`Category`, `User`),
  KEY `K_cu_category` (`Category`),
  CONSTRAINT `FK_cu_category` FOREIGN KEY (`Category`) REFERENCES `dd_category` (`Id`) ON DELETE CASCADE,
  KEY `K_cu_user` (`User`),
  CONSTRAINT `FK_cu_user` FOREIGN KEY (`User`) REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

