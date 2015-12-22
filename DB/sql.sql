-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.33-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4206
-- Date/time:                    2015-12-21 19:56:19
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table google_maps.geocodes
CREATE TABLE IF NOT EXISTS `geocodes` (
  `address` varchar(255) NOT NULL DEFAULT '',
  `lon` float DEFAULT NULL,
  `lat` float DEFAULT NULL,
  PRIMARY KEY (`address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table google_maps.geocodes: 3 rows
/*!40000 ALTER TABLE `geocodes` DISABLE KEYS */;
INSERT INTO `geocodes` (`address`, `lon`, `lat`) VALUES
	('826 P St Lincoln NE 68502', -96.7091, 40.8151),
	('3457 Holdrege St Lincoln NE 68502', -96.6699, 40.8276),
	('621 N 48th St # 6 Lincoln NE 68502', -96.6548, 40.8197);
/*!40000 ALTER TABLE `geocodes` ENABLE KEYS */;


-- Dumping structure for table google_maps.markers
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table google_maps.markers: 2 rows
/*!40000 ALTER TABLE `markers` DISABLE KEYS */;
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
	(16, 'YES YES', 'Address', 27.058718, 20.295898, 'Health'),
	(17, 'Mish Mesh', 'Marsafa', 29.151760, 16.357300, 'Software');
/*!40000 ALTER TABLE `markers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
