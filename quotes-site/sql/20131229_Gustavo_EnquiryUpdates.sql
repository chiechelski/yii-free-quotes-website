/* New customer enquiry fields */
ALTER TABLE `dd_customer_enquiry`
    ADD `When` enum('flexible', 'within-48', 'specific-date') DEFAULT 'flexible',
    ADD `UseCustomerAddress` enum('Yes', 'No') DEFAULT 'Yes',
    ADD `ExpectedCompletionDate` DATETIME DEFAULT NULL,
    ADD `ExpectedPaymentDate` DATETIME DEFAULT NULL,
    ADD `Commission` decimal(10,2) DEFAULT NULL,
    ADD `Address1` varchar(100) DEFAULT NULL,
    ADD `Address2` varchar(100) DEFAULT NULL,
    ADD `City` varchar(50) DEFAULT NULL,
    ADD `State` varchar(50) DEFAULT NULL,
    ADD `PostCode` varchar(10) DEFAULT NULL,
    ADD `Country` int(11) unsigned DEFAULT NULL,
    ADD `Phone` varchar(25) DEFAULT NULL,
    ADD `Mobile` varchar(25) DEFAULT NULL;

/* Enquiry Date - Future can load more than one */
CREATE TABLE `dd_customer_enquiry_date` (
    `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `Enquiry` int(11) unsigned NOT NULL,
    `From` DATETIME NOT NULL,
    `To` DATETIME NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `K_ced_enquiry` (`Enquiry`),
    CONSTRAINT `FK_ced_enquiry` FOREIGN KEY (`Enquiry`)
    	REFERENCES `dd_customer_enquiry` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

/* Notes */
CREATE TABLE `dd_customer_enquiry_note` (
    `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `Enquiry` int(11) unsigned NOT NULL,
    `User` int(11) unsigned DEFAULT NULL,
    `Note` varchar(256) DEFAULT NULL,
    PRIMARY KEY (`Id`),
    KEY `K_cen_enquiry` (`Enquiry`),
    CONSTRAINT `FK_cen_enquiry` FOREIGN KEY (`Enquiry`)
    	REFERENCES `dd_customer_enquiry` (`Id`) ON DELETE CASCADE,
    KEY `K_cen_user` (`User`),
    CONSTRAINT `FK_cen_user` FOREIGN KEY (`User`)
        REFERENCES `dd_user` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

ALTER TABLE dd_user MODIFY Username varchar(50) NULL DEFAULT 'not defined';
ALTER TABLE dd_user DROP INDEX `Username`;
