CREATE TABLE `dd_business_quote_file` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Quote` int(11) unsigned NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `FileType` varchar(255) DEFAULT NULL,
  `FileSize` int unsigned DEFAULT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `K_bq_enquiry` (`Quote`),
  CONSTRAINT `FK_bqf_quote` FOREIGN KEY (`Quote`) REFERENCES `dd_business_quote` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
