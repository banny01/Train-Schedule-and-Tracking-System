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
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TrainID` int(5) NOT NULL,
  `StationID` int(5) NOT NULL,
  `Delay` int(5) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table train.delay: 3 rows
/*!40000 ALTER TABLE `delay` DISABLE KEYS */;
INSERT INTO `delay` (`ID`, `TrainID`, `StationID`, `Delay`, `Date`) VALUES
	(1, 1, 6, 10, '2021-07-27 09:24:48'),
	(4, 1, 1, 5, '2021-07-27 10:13:30'),
	(5, 1, 2, 5, '2021-07-27 10:15:54');
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table train.stopststions: 16 rows
/*!40000 ALTER TABLE `stopststions` DISABLE KEYS */;
INSERT INTO `stopststions` (`ID`, `TrainID`, `StationID`, `A`, `D`) VALUES
	(27, 13, 6, '18:40:00', '18:40:00'),
	(26, 13, 5, '18:20:00', '18:22:00'),
	(25, 13, 1, '17:35:00', '17:40:00'),
	(24, 13, 2, '17:10:00', '17:30:00'),
	(12, 1, 2, '16:40:00', '17:00:00'),
	(13, 1, 1, '17:05:00', '17:10:00'),
	(14, 1, 5, '18:10:00', '18:12:00'),
	(15, 1, 6, '18:32:00', '18:33:00'),
	(16, 1, 7, '19:30:00', '19:35:00'),
	(17, 1, 8, '20:15:00', '20:15:00'),
	(18, 16, 8, '04:50:00', '05:10:00'),
	(19, 16, 7, '05:50:00', '05:55:00'),
	(20, 16, 6, '06:50:00', '06:52:00'),
	(21, 16, 5, '07:10:00', '07:12:00'),
	(22, 16, 1, '08:00:00', '08:05:00'),
	(23, 16, 2, '08:10:00', '08:10:00');
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
  `Cancel` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table train.train: 3 rows
/*!40000 ALTER TABLE `train` DISABLE KEYS */;
INSERT INTO `train` (`ID`, `Number`, `Name`, `Start`, `End`, `TrackID`, `Status`, `Cancel`) VALUES
	(1, 8058, 'Samudra Devi', 2, 8, 0, 'DA', 0),
	(16, 8058, 'Samudra Devi', 8, 2, 0, 'DA', 0),
	(13, 9063, 'Test', 2, 6, 1, 'WD', 0);
/*!40000 ALTER TABLE `train` ENABLE KEYS */;

-- Dumping structure for table train.trainlines
CREATE TABLE IF NOT EXISTS `trainlines` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `LineID` int(3) NOT NULL,
  `TrainID` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table train.trainlines: 1 rows
/*!40000 ALTER TABLE `trainlines` DISABLE KEYS */;
INSERT INTO `trainlines` (`ID`, `LineID`, `TrainID`) VALUES
	(1, 3, 1);
/*!40000 ALTER TABLE `trainlines` ENABLE KEYS */;

-- Dumping structure for table train.user
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `StationID` int(5) DEFAULT '0',
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table train.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`UserID`, `Name`, `Password`, `Role`, `StationID`) VALUES
	('admin', 'Admin', 'admin', 'Admin', 0),
	('aluthgama', 'Aluthgama', 'aluthgama', 'SM', 6),
	('maradana', 'Maradana', 'maradana', 'SM', 2),
	('badulla', 'Badulla', 'badulla', 'SM', 14);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
