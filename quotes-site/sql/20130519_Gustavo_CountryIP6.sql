
DROP TABLE IF EXISTS `st4_ip4_country`;

CREATE TABLE `st4_ip4_country` (
  `FromIp` VARCHAR(16) DEFAULT NULL,
  `ToIp` VARCHAR(16) DEFAULT NULL,
  `FromIpInt` int(11) unsigned DEFAULT NULL,
  `ToIpInt` int(11) unsigned DEFAULT NULL,
  `Code` VARCHAR(2) DEFAULT NULL,
  `Country` VARCHAR(50) DEFAULT NULL
) ENGINE=MyIsam DEFAULT CHARSET=latin1;

LOAD DATA INFILE 'GeoIPCountryWhois.csv' INTO TABLE st4_ip4_country FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n';

DROP TABLE IF EXISTS `st4_link_country`;

CREATE TABLE `st4_link_country` (
  `Ip` int(11) unsigned NOT NULL ,
  `Code` VARCHAR(2) NOT NULL,
  UNIQUE KEY `Ip` (`Ip`)
) ENGINE=MyIsam DEFAULT CHARSET=latin1;


/*
 Useful Codes
*/

REPLACE INTO st4_link_country
SELECT DISTINCT Ip, Code
FROM st4_link_view LV
INNER JOIN st4_ip4_country IP ON LV.Ip BETWEEN IP.FromIpInt AND IP.ToIpInt;

update st4_link_view SET Ip = 16777241 LIMIT 4

select INET_ATON('1.0.0.25') 

