--
-- Table structure for table `dd_user_password_reset`
--

CREATE TABLE `dd_user_password_reset` (
	`Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 	`User` int(11) unsigned DEFAULT NULL,
	`Hash` varchar(50) DEFAULT NULL,
	`ExpireDate`  datetime DEFAULT NULL,
    `IpAddress` int(11) unsigned DEFAULT NULL,
	PRIMARY KEY (`Id`),
    UNIQUE (`User`, `Hash`),
    KEY `K_upr_user` (`User`),
    CONSTRAINT `FK_upr_user` FOREIGN KEY (`User`) REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

ALTER TABLE dd_user MODIFY Password varchar(64) NOT NULL;
