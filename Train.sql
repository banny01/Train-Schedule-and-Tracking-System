-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.31 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table train.delay
CREATE TABLE IF NOT EXISTS `delay` (
  `ID` int(10) NOT NULL,
  `TrainID` int(5) NOT NULL,
  `Delay` int(5) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.delay: 0 rows
/*!40000 ALTER TABLE `delay` DISABLE KEYS */;
/*!40000 ALTER TABLE `delay` ENABLE KEYS */;

-- Dumping structure for table train.line
CREATE TABLE IF NOT EXISTS `line` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL DEFAULT 'Unnamed',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table train.line: 6 rows
/*!40000 ALTER TABLE `line` DISABLE KEYS */;
INSERT INTO `line` (`ID`, `Name`) VALUES
	(1, 'Badulla'),
	(2, 'Kandy'),
	(3, 'Matara'),
	(4, 'Negambo'),
	(5, 'Avissawella'),
	(6, 'Anuradhapura');
/*!40000 ALTER TABLE `line` ENABLE KEYS */;

-- Dumping structure for table train.linestations
CREATE TABLE IF NOT EXISTS `linestations` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `LineID` int(3) NOT NULL,
  `StationID` int(5) NOT NULL,
  `Order` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table train.linestations: 31 rows
/*!40000 ALTER TABLE `linestations` DISABLE KEYS */;
INSERT INTO `linestations` (`ID`, `LineID`, `StationID`, `Order`) VALUES
	(1, 3, 1, 1),
	(2, 3, 5, 2),
	(3, 3, 6, 3),
	(4, 3, 7, 4),
	(5, 3, 8, 5),
	(6, 4, 1, 1),
	(7, 4, 2, 2),
	(8, 4, 3, 3),
	(9, 4, 4, 4),
	(10, 5, 1, 1),
	(11, 5, 2, 2),
	(12, 5, 9, 3),
	(13, 6, 1, 1),
	(14, 6, 2, 2),
	(15, 6, 3, 3),
	(16, 6, 10, 4),
	(17, 6, 15, 5),
	(18, 1, 1, 1),
	(19, 1, 2, 2),
	(20, 1, 3, 3),
	(21, 1, 10, 4),
	(22, 1, 11, 5),
	(23, 1, 12, 6),
	(24, 1, 14, 7),
	(25, 2, 1, 1),
	(26, 2, 2, 2),
	(27, 2, 3, 3),
	(28, 2, 10, 4),
	(29, 2, 11, 5),
	(30, 2, 12, 6),
	(31, 2, 13, 7);
/*!40000 ALTER TABLE `linestations` ENABLE KEYS */;

-- Dumping structure for table train.station
CREATE TABLE IF NOT EXISTS `station` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table train.station: 15 rows
/*!40000 ALTER TABLE `station` DISABLE KEYS */;
INSERT INTO `station` (`ID`, `Name`) VALUES
	(1, 'Colombo Fort'),
	(2, 'Maradana'),
	(3, 'Ragama'),
	(4, 'Negambo'),
	(5, 'Kalutara'),
	(6, 'Aluthgama'),
	(7, 'Galle'),
	(8, 'Matara'),
	(9, 'Avissawella'),
	(10, 'Polgahawela'),
	(11, 'Kurunegala'),
	(12, 'Peradeniya'),
	(13, 'Kandy'),
	(14, 'Badulla'),
	(15, 'Anuradhapura');
/*!40000 ALTER TABLE `station` ENABLE KEYS */;

-- Dumping structure for table train.stopststions
CREATE TABLE IF NOT EXISTS `stopststions` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TrainID` int(5) NOT NULL,
  `StationID` int(5) NOT NULL,
  `A` time NOT NULL DEFAULT '00:00:00',
  `D` time NOT NULL DEFAULT '00:00:00',
  `UpDown` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.stopststions: 0 rows
/*!40000 ALTER TABLE `stopststions` DISABLE KEYS */;
/*!40000 ALTER TABLE `stopststions` ENABLE KEYS */;

-- Dumping structure for table train.train
CREATE TABLE IF NOT EXISTS `train` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Number` int(5) NOT NULL DEFAULT '0',
  `Name` varchar(50) NOT NULL,
  `Start` int(5) NOT NULL,
  `End` int(5) NOT NULL,
  `TrackID` int(10) DEFAULT NULL,
  `Status` varchar(2) NOT NULL DEFAULT 'DA',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.train: 0 rows
/*!40000 ALTER TABLE `train` DISABLE KEYS */;
/*!40000 ALTER TABLE `train` ENABLE KEYS */;

-- Dumping structure for table train.trainlines
CREATE TABLE IF NOT EXISTS `trainlines` (
  `ID` int(5) NOT NULL,
  `LineID` int(3) NOT NULL,
  `TrainID` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.trainlines: 0 rows
/*!40000 ALTER TABLE `trainlines` DISABLE KEYS */;
/*!40000 ALTER TABLE `trainlines` ENABLE KEYS */;

-- Dumping structure for table train.user
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `StationID` int(5) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`UserID`, `Name`, `Password`, `Role`, `StationID`) VALUES
	('admin', 'Admin', 'admin', 'Admin', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
