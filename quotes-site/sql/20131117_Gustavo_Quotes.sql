
CREATE TABLE `dd_customer_enquiry` (
    `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `User` int(11) unsigned DEFAULT NULL,
    `Title` varchar(256) DEFAULT NULL,
    `Description` blob DEFAULT NULL,
    `Priority` enum('UrgentJob','UrgentQuote','Week', 'Month') DEFAULT 'Week',
    -- `Proceed` enum('Yes','No') DEFAULT 'Yes',
    `CommissionPaid` enum('Yes','No') DEFAULT 'No',
    `Feedback` enum('Yes','No') DEFAULT 'No',
    `Active` enum('Yes','No') DEFAULT 'Yes',
    `Created` datetime NOT NULL,
    PRIMARY KEY (`Id`),
    UNIQUE (`User`),
    KEY `K_ce_user` (`User`),
    CONSTRAINT `FK_ce_user` FOREIGN KEY (`User`)
    	REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

CREATE TABLE `dd_customer_enquiry_category` (
    `Enquiry` int(11) unsigned NOT NULL,
    `Category` int(11) unsigned NOT NULL ,
    UNIQUE (`Enquiry`, `Category`),
    KEY `K_cec_enquiry` (`Enquiry`),
    CONSTRAINT `FK_cec_enquiry` FOREIGN KEY (`Enquiry`)
    	REFERENCES `dd_customer_enquiry` (`Id`) ON DELETE CASCADE,
    CONSTRAINT `FK_cec_category` FOREIGN KEY (`Category`)
    	REFERENCES `dd_category` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `dd_business_quote` (
    `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `User` int(11) unsigned DEFAULT NULL,
    `Enquiry` int(11) unsigned NOT NULL,
    `Title` varchar(255) DEFAULT NULL,
    `Description` blob DEFAULT NULL,
    `Price` decimal(10,2) DEFAULT NULL,
    `Tax` decimal(10,2) DEFAULT NULL,
    `Active` enum('Yes','No') DEFAULT 'Yes',
    `Selected` enum('Yes','No') DEFAULT 'No',
    `Created` datetime NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `K_bq_enquiry` (`Enquiry`),
    CONSTRAINT `FK_bq_enquiry` FOREIGN KEY (`Enquiry`)
    	REFERENCES `dd_customer_enquiry` (`Id`) ON DELETE CASCADE,
    KEY `K_be_user` (`User`),
    CONSTRAINT `FK_bq_user` FOREIGN KEY (`User`) REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

ALTER TABLE `dd_business_extra` ADD `ShowOnWebsite` enum('Yes','No') DEFAULT 'No';

ALTER TABLE dd_customer_enquiry DROP KEY `User`;