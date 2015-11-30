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

CREATE DATABASE donedusted;

--
-- Table structure for table `dd_country`
--

DROP TABLE IF EXISTS `dd_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dd_country` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Currency` varchar(32) NOT NULL,
  `Timezone` varchar(10) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `Active` enum('Yes','No') DEFAULT 'Yes',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st4_country`
--

LOCK TABLES `dd_country` WRITE;
/*!40000 ALTER TABLE `st4_country` DISABLE KEYS */;
INSERT INTO `dd_country` VALUES (1,'New Zealand','New Zealand Dollar',NULL,'2012-10-12 00:47:20','2012-10-12 00:47:20','Yes'),(2,'Australia','Australian Dollar',NULL,'2012-10-12 00:47:20','2012-10-12 00:47:20','Yes'),(3,'United States','US Dollar',NULL,'2012-10-12 00:47:20','2012-10-12 00:47:20','Yes'),(4,'United Kingdom','Pound',NULL,'2012-10-12 00:47:20','2012-10-12 00:47:20','Yes');
/*!40000 ALTER TABLE `st4_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dd_user`
--

DROP TABLE IF EXISTS `dd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dd_user` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `FacebookId` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `UserType` set('administrator','supplier','customer') DEFAULT 'customer',
  `CompanyName` varchar(100) DEFAULT NULL,
  `Address1` varchar(100) DEFAULT NULL,
  `Address2` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostCode` varchar(10) DEFAULT NULL,
  `Country` int(11) unsigned DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `PaymentType` enum('paypal') DEFAULT NULL,
  `PaymentAccount` varchar(32) DEFAULT NULL,
  `GoogleAnalytics` varchar(64) DEFAULT NULL,
  `Lang` enum('en-uk','pt-br','es') DEFAULT 'en-uk',
  `UserVerification` varchar(32) DEFAULT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `Active` enum('Yes','No') DEFAULT 'Yes',
  `Validated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  KEY `FK_users` (`Country`),
  CONSTRAINT `FK_st4_user` FOREIGN KEY (`Country`) REFERENCES `dd_country` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dd_user`
--

LOCK TABLES `dd_user` WRITE;
/*!40000 ALTER TABLE `dd_user` DISABLE KEYS */;
INSERT INTO `dd_user` (Id,Username,Password,FacebookId,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (1,'root','ghU876',NULL,'Gustavo', 'Chiechelski','chiechelski@hotmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);
/*!40000 ALTER TABLE `dd_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

-- Dump completed on 2013-03-07 21:50:36


ALTER TABLE dd_user
DROP COLUMN FacebookId,
ADD COLUMN `ApplicationType` set('dd','facebook','google') DEFAULT 'dd',
ADD COLUMN `ApplicationId` varchar(50) DEFAULT NULL;


ALTER TABLE dd_user
ADD COLUMN `Mobile` varchar(25) DEFAULT NULL AFTER Phone;

--
-- Table structure for table `dd_category`
--

DROP TABLE IF EXISTS `dd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dd_category` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Url` varchar(32) NOT NULL,
  `Parent` int(11) unsigned DEFAULT NULL,
  `Active` enum('Yes','No') DEFAULT 'Yes',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Url` (`Url`),
  KEY `FK_category_parent` (`Parent`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

ALTER TABLE `dd_category` ADD FOREIGN KEY (`Parent`) REFERENCES `dd_category` (`Id`);


DELETE FROM dd_category WHERE Parent IS NOT NULL

INSERT INTO `dd_category` VALUES (1, 'Trade services & Repairs', 'trade-services-and-repairs', null, 'Yes');
INSERT INTO `dd_category` VALUES (2, 'Air Conditioning and Heating ', 'air-conditioning-and-heating', 1, 'Yes');
INSERT INTO `dd_category` VALUES (3, 'Architect', 'architect', 1, 'Yes');
INSERT INTO `dd_category` VALUES (4, 'Building', 'building', 1, 'Yes');
INSERT INTO `dd_category` VALUES (5, 'Carpentry', 'carpentry', 1, 'Yes');
INSERT INTO `dd_category` VALUES (6, 'Ceiling', 'ceiling', 1, 'Yes');
INSERT INTO `dd_category` VALUES (7, 'Electrician', 'electrician', 1, 'Yes');
INSERT INTO `dd_category` VALUES (8, 'Fencing & Gates', 'fencing-and-gates', 1, 'Yes');
INSERT INTO `dd_category` VALUES (9, 'Glass & Windows', 'glass-and-windows', 1, 'Yes');
INSERT INTO `dd_category` VALUES (10, 'Handyman', 'handyman', 1, 'Yes');
INSERT INTO `dd_category` VALUES (11, 'Insulation', 'insulation', 1, 'Yes');
INSERT INTO `dd_category` VALUES (12, 'Interior Design', 'interior-design', 1, 'Yes');
INSERT INTO `dd_category` VALUES (13, 'Locksmith', 'locksmith', 1, 'Yes');
INSERT INTO `dd_category` VALUES (14, 'Outdoor Structures', 'outdoor-structures', 1, 'Yes');
INSERT INTO `dd_category` VALUES (15, 'Others', 'others', 1, 'Yes');
INSERT INTO `dd_category` VALUES (16, 'Painting & Wallpaper', 'painting-and-wallpaper', 1, 'Yes');
INSERT INTO `dd_category` VALUES (17, 'Pest Control', 'pest-control', 1, 'Yes');
INSERT INTO `dd_category` VALUES (18, 'Plastering', 'plastering', 1, 'Yes');
INSERT INTO `dd_category` VALUES (19, 'Plumbing & Gasfitting', 'plumbing-and-gasfitting', 1, 'Yes');
INSERT INTO `dd_category` VALUES (20, 'Removalist', 'removalist', 1, 'Yes');
INSERT INTO `dd_category` VALUES (21, 'Renovations', 'renovations', 1, 'Yes');
INSERT INTO `dd_category` VALUES (22, 'Roofing', 'roofing', 1, 'Yes');
INSERT INTO `dd_category` VALUES (23, 'Rubbish Removal', 'rubbish-removal', 1, 'Yes');
INSERT INTO `dd_category` VALUES (24, 'Security & Safety', 'security-and-safety', 1, 'Yes');
INSERT INTO `dd_category` VALUES (25, 'Tiler', 'tiler', 1, 'Yes');
INSERT INTO `dd_category` VALUES (26, 'Welding', 'welding', 1, 'Yes');

INSERT INTO `dd_category` VALUES (40, 'Business & Consulting', 'business-and-consulting', null, 'Yes');
INSERT INTO `dd_category` VALUES (41, 'Accounting', 'accounting', 40, 'Yes');
INSERT INTO `dd_category` VALUES (42, 'Content Management & Production', 'content-management-production', 40, 'Yes');
INSERT INTO `dd_category` VALUES (43, 'Courier', 'courier', 40, 'Yes');
INSERT INTO `dd_category` VALUES (44, 'Others', 'others-bc', 40, 'Yes');
INSERT INTO `dd_category` VALUES (45, 'Press Support', 'press-support', 40, 'Yes');
INSERT INTO `dd_category` VALUES (46, 'Legal Services', 'legal-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (47, 'Office Support', 'office-support', 40, 'Yes');
INSERT INTO `dd_category` VALUES (48, 'Printing Services', 'printing-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (49, 'Professional Services', 'professional-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (50, 'Property Management', 'property-management', 40, 'Yes');
INSERT INTO `dd_category` VALUES (51, 'Real Estate Agent', 'real-estate-agent', 40, 'Yes');
INSERT INTO `dd_category` VALUES (52, 'Signwriter', 'signwriter', 40, 'Yes');
INSERT INTO `dd_category` VALUES (53, 'Specialised Consulting', 'specialised-consulting', 40, 'Yes');
INSERT INTO `dd_category` VALUES (54, 'Translation', 'translation', 40, 'Yes');

INSERT INTO `dd_category` VALUES (70, 'Events', 'events', null, 'Yes');
INSERT INTO `dd_category` VALUES (71, 'Catering', 'catering', 70, 'Yes');
INSERT INTO `dd_category` VALUES (72, 'Music, Bands, DJ', 'music-bands-dj', 70, 'Yes');
INSERT INTO `dd_category` VALUES (73, 'Party Entertainment', 'party-entertainment', 70, 'Yes');
INSERT INTO `dd_category` VALUES (74, 'Others', 'others-events', 70, 'Yes');
INSERT INTO `dd_category` VALUES (75, 'Party & Event Planning', 'party-and-event-planning', 70, 'Yes');
INSERT INTO `dd_category` VALUES (76, 'Photography and Videography', 'photography-and-videography', 70, 'Yes');
INSERT INTO `dd_category` VALUES (77, 'Security', 'security', 70, 'Yes');
INSERT INTO `dd_category` VALUES (78, 'Venues', 'venues', 70, 'Yes');
INSERT INTO `dd_category` VALUES (79, 'Wedding Services', 'wedding-services', 70, 'Yes');

INSERT INTO `dd_category` VALUES (90, 'Health & Beauty', 'health-and-beauty', null, 'Yes');
INSERT INTO `dd_category` VALUES (91, 'Alternative Services', 'alternative-services', 90, 'Yes');
INSERT INTO `dd_category` VALUES (92, 'Chiropractor/ Osteopath', 'chiropractor-osteopath', 90, 'Yes');
INSERT INTO `dd_category` VALUES (93, 'Clothes Alteration', 'clothes-alteration', 90, 'Yes');
INSERT INTO `dd_category` VALUES (94, 'Esoteric', 'esoteric', 90, 'Yes');
INSERT INTO `dd_category` VALUES (95, 'Hairdresser', 'hairdresser', 90, 'Yes');
INSERT INTO `dd_category` VALUES (96, 'Manicure & Pedicure', 'manicure-and-pedicure', 90, 'Yes');
INSERT INTO `dd_category` VALUES (97, 'Makeup Artist ', 'makeup-artist', 90, 'Yes');
INSERT INTO `dd_category` VALUES (98, 'Massage ', 'massage', 90, 'Yes');
INSERT INTO `dd_category` VALUES (99, 'Personal Trainer', 'personal-trainer', 90, 'Yes');
INSERT INTO `dd_category` VALUES (100, 'Physiotherapy', 'physiotherapy', 90, 'Yes');
INSERT INTO `dd_category` VALUES (101, 'Waxing', 'waxing', 90, 'Yes');
INSERT INTO `dd_category` VALUES (102, 'Nutritionist', 'nutritionist', 90, 'Yes');

INSERT INTO `dd_category` VALUES (120, 'Computer and Technology', 'computer-and-technology', null, 'Yes');
INSERT INTO `dd_category` VALUES (121 'Audio & Video Production', 'audio-and-video-production', 120, 'Yes');
INSERT INTO `dd_category` VALUES (122, 'Computer Repair', 'computer-repair', 120, 'Yes');
INSERT INTO `dd_category` VALUES (123, 'Graphic Design ', 'graphic-design', 120, 'Yes');
INSERT INTO `dd_category` VALUES (124, 'Mobile Apps ', 'mobile-apps', 120, 'Yes');
INSERT INTO `dd_category` VALUES (125, 'Online Marketing ', 'online-marketing', 120, 'Yes');
INSERT INTO `dd_category` VALUES (126, 'Phone Systems', 'phone-systems', 120, 'Yes');
INSERT INTO `dd_category` VALUES (127, 'Web Services', 'web-services', 120, 'Yes');

INSERT INTO `dd_category` VALUES (140, 'Home/Family & Pets', 'home-family-and-pets', null, 'Yes');
INSERT INTO `dd_category` VALUES (141, 'Cleaning', 'cleaning', 140, 'Yes');
INSERT INTO `dd_category` VALUES (142, 'Dog Training', 'dog-training', 140, 'Yes');
INSERT INTO `dd_category` VALUES (143, 'Dog Walker', 'dog-walker', 140, 'Yes');
INSERT INTO `dd_category` VALUES (144, 'Gardening', 'gardening', 140, 'Yes');
INSERT INTO `dd_category` VALUES (145, 'Home Appliances', 'home-appliances', 140, 'Yes');
INSERT INTO `dd_category` VALUES (146, 'Landscaping', 'landscaping', 140, 'Yes');
INSERT INTO `dd_category` VALUES (147, 'Pet Boarding', 'pet-boarding', 140, 'Yes');
INSERT INTO `dd_category` VALUES (148, 'Pet Grooming', 'pet-grooming', 140, 'Yes');
INSERT INTO `dd_category` VALUES (149, 'Pet Sitting', 'pet-sitting', 140, 'Yes');
INSERT INTO `dd_category` VALUES (150, 'Pool & Spa', 'pool-and-spa', 140, 'Yes');
