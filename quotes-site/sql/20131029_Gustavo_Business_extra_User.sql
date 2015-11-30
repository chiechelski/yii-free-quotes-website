--
-- Table structure for table `dd_business_extra`
--

DROP TABLE IF EXISTS `dd_business_extra`;

CREATE TABLE `dd_business_extra` (
    `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `User` int(11) unsigned DEFAULT NULL,
    `Title` varchar(255) DEFAULT NULL,
    `Description` blob DEFAULT NULL,
    `Logo` varchar(255) DEFAULT NULL,
    `Url` varchar(255) DEFAULT NULL,
    `Path` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`Id`),
    UNIQUE (`User`),
    KEY `K_be_user` (`User`),
    CONSTRAINT `FK_be_user` FOREIGN KEY (`User`) REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;


INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (2,'leny_hf','DustingNZ2014','Helena', 'Pontes','hfrickpontes@gmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (3,'ryan_dd','RDDNZ2014A','Ryan', 'DD','chiennambinh@gmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (4,'azyz_dd','ADUSTNZ2014A','Azyz', 'DD','aj33@ymail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (5,'david_dd','DAVNZ2014A','David', 'DD','blomfield1@gmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (6,'peggy_dd','PEGNZ2014A','Peggy', 'Yao','peggy1991168@gmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (7,'akini_dd','AEGNZ2d444A','Akini', 'Alfredo','akinialfredo@yahoo.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (8,'fernando_dd','9EGAZ2d44dA','Fernando', 'DD','sales@donedusted.co.nz','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (10,'sudeen_dd','9EGA23Z2d44dA','Sudeen', 'DD','info@donedusted.co.nz','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);

INSERT INTO `dd_user` (Id,Username,Password,FirstName,LastName,Email,UserType,CompanyName,Address1,Address2,City,State,PostCode,Country,Phone,PaymentType,PaymentAccount,GoogleAnalytics,Lang,UserVerification,Created,Modified,Active,Validated)
VALUES (11,'jade_dd','9EGA23Z2d44dA','Jade', 'Kallian','myweddingquotesnz@gmail.com','administrator',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'en-uk',NULL, NOW(), NOW(),'Yes',1);