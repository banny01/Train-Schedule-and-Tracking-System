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

-- Dumping structure for table train.gpslocations
CREATE TABLE IF NOT EXISTS `gpslocations` (
  `GPSLocationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` decimal(10,7) NOT NULL DEFAULT '0.0000000',
  `longitude` decimal(10,7) NOT NULL DEFAULT '0.0000000',
  `phoneNumber` varchar(50) NOT NULL DEFAULT '',
  `userName` varchar(50) NOT NULL DEFAULT '',
  `sessionID` varchar(50) NOT NULL DEFAULT '',
  `speed` int(10) unsigned NOT NULL DEFAULT '0',
  `direction` int(10) unsigned NOT NULL DEFAULT '0',
  `distance` decimal(10,1) NOT NULL DEFAULT '0.0',
  `gpsTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locationMethod` varchar(50) NOT NULL DEFAULT '',
  `accuracy` int(10) unsigned NOT NULL DEFAULT '0',
  `extraInfo` varchar(255) NOT NULL DEFAULT '',
  `eventType` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`GPSLocationID`),
  KEY `sessionIDIndex` (`sessionID`),
  KEY `phoneNumberIndex` (`phoneNumber`),
  KEY `userNameIndex` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table train.gpslocations: ~8 rows (approximately)
/*!40000 ALTER TABLE `gpslocations` DISABLE KEYS */;
INSERT INTO `gpslocations` (`GPSLocationID`, `lastUpdate`, `latitude`, `longitude`, `phoneNumber`, `userName`, `sessionID`, `speed`, `direction`, `distance`, `gpsTime`, `locationMethod`, `accuracy`, `extraInfo`, `eventType`) VALUES
	(12, '2021-08-18 22:47:02', 6.4460595, 80.0251287, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Samudra-Devi', '0cb6ae9e-2b01-42dd-a285-890da63215b8', 0, 0, 0.0, '2021-08-18 22:48:08', 'fused', 823, '-348', 'android'),
	(18, '2021-08-18 22:55:21', 6.4460661, 80.0149650, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Galu-Kumari', '0cb6ae9e-2b01-42dd-a285-890da63215b9', 0, 0, 0.0, '2021-08-18 22:57:49', 'fused', 40, '-208', 'android'),
	(19, '2021-08-18 23:06:01', 6.4460146, 80.0170616, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Samudra-Devi', 'b304c8a9-6205-454f-af89-3124f3e03be4', 0, 0, 0.0, '2021-08-18 23:10:43', 'fused', 35, '-252', 'android'),
	(20, '2021-08-18 23:06:54', 6.4460146, 80.0150616, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Ruhunu-Kumari', 'b304c8a9-6205-454f-af89-3124f3e03be4', 0, 0, 0.0, '2021-08-18 23:10:43', 'fused', 35, '-252', 'android'),
	(21, '2021-08-19 11:57:22', 6.4433104, 80.0187332, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Ruhunu-Kumari', 'b304c8a9-6205-454f-af89-3124f3e03be4', 0, 0, 1.1, '2021-08-19 12:01:59', 'fused', 983, '-323', 'android'),
	(22, '2021-08-19 13:23:30', 6.4462529, 80.0150717, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Ruhunu-Kumari', 'b304c8a9-6205-454f-af89-3124f3e03be4', 0, 13, 1.4, '2021-08-19 13:28:11', 'fused', 71, '-153', 'android'),
	(23, '2021-08-19 13:24:01', 6.4461024, 80.0151504, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Ruhunu-Kumari', 'b304c8a9-6205-454f-af89-3124f3e03be4', 1, 150, 1.4, '2021-08-19 13:28:43', 'fused', 13, '-321', 'android'),
	(24, '2021-08-19 13:25:13', 6.4461047, 80.0151498, '80120450-a92c-48e6-8cfc-b4bf8839a0c7', 'Ruhunu-Kumari', 'b304c8a9-6205-454f-af89-3124f3e03be4', 0, 149, 1.4, '2021-08-19 13:29:55', 'fused', 32, '-323', 'android');
/*!40000 ALTER TABLE `gpslocations` ENABLE KEYS */;

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

-- Dumping structure for procedure train.prcDeleteRoute
DELIMITER //
CREATE PROCEDURE `prcDeleteRoute`(
_sessionID VARCHAR(50))
BEGIN
  DELETE FROM gpslocations
  WHERE sessionID = _sessionID;
END//
DELIMITER ;

-- Dumping structure for procedure train.prcGetAllRoutesForMap
DELIMITER //
CREATE PROCEDURE `prcGetAllRoutesForMap`()
BEGIN
SELECT sessionId, gpsTime, CONCAT('{ "latitude":"', CAST(latitude AS CHAR),'", "longitude":"', CAST(longitude AS CHAR), '", "speed":"', CAST(speed AS CHAR), '", "direction":"', CAST(direction AS CHAR), '", "distance":"', CAST(distance AS CHAR), '", "locationMethod":"', locationMethod, '", "gpsTime":"', DATE_FORMAT(gpsTime, '%b %e %Y %h:%i%p'), '", "userName":"', userName, '", "phoneNumber":"', phoneNumber, '", "sessionID":"', CAST(sessionID AS CHAR), '", "accuracy":"', CAST(accuracy AS CHAR), '", "extraInfo":"', extraInfo, '" }') json
FROM (SELECT MAX(GPSLocationID) ID
      FROM gpslocations
      WHERE userName != '0' && CHAR_LENGTH(userName) != 0 && gpstime != '0000-00-00 00:00:00'
      GROUP BY sessionID) AS MaxID
JOIN gpslocations ON gpslocations.GPSLocationID = MaxID.ID
ORDER BY gpsTime;
END//
DELIMITER ;

-- Dumping structure for procedure train.prcGetRouteForMap
DELIMITER //
CREATE PROCEDURE `prcGetRouteForMap`(
	IN `_sessionID` VARCHAR(50)
)
BEGIN
  SELECT CONCAT('{ "latitude":"', CAST(latitude AS CHAR),'", "longitude":"', CAST(longitude AS CHAR), '", "speed":"', CAST(speed AS CHAR), '", "direction":"', CAST(direction AS CHAR), '", "distance":"', CAST(distance AS CHAR), '", "locationMethod":"', locationMethod, '", "gpsTime":"', DATE_FORMAT(gpsTime, '%b %e %Y %h:%i%p'), '", "userName":"', userName, '", "phoneNumber":"', phoneNumber, '", "sessionID":"', CAST(sessionID AS CHAR), '", "accuracy":"', CAST(accuracy AS CHAR), '", "extraInfo":"', extraInfo, '" }') json
  FROM gpslocations
  WHERE userName = _sessionID
  ORDER BY lastupdate DESC
  LIMIT 1;
END//
DELIMITER ;

-- Dumping structure for procedure train.prcGetRoutes
DELIMITER //
CREATE PROCEDURE `prcGetRoutes`()
BEGIN
  CREATE TEMPORARY TABLE tempRoutes (
    sessionID VARCHAR(50),
    userName VARCHAR(50),
    startTime DATETIME,
    endTime DATETIME)
  ENGINE = MEMORY;

  INSERT INTO tempRoutes (sessionID, userName)
  SELECT DISTINCT sessionID, userName
  FROM gpslocations;

  UPDATE tempRoutes tr
  SET startTime = (SELECT MIN(gpsTime) FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.userName = tr.userName);

  UPDATE tempRoutes tr
  SET endTime = (SELECT MAX(gpsTime) FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.userName = tr.userName);

  SELECT

  CONCAT('{ "sessionID": "', CAST(sessionID AS CHAR),  '", "userName": "', userName, '", "times": "(', DATE_FORMAT(startTime, '%b %e %Y %h:%i%p'), ' - ', DATE_FORMAT(endTime, '%b %e %Y %h:%i%p'), ')" }') json
  FROM tempRoutes
  ORDER BY startTime DESC;

  DROP TABLE tempRoutes;
END//
DELIMITER ;

-- Dumping structure for procedure train.prcSaveGPSLocation
DELIMITER //
CREATE PROCEDURE `prcSaveGPSLocation`(
_latitude DECIMAL(10,7),
_longitude DECIMAL(10,7),
_speed INT(10),
_direction INT(10),
_distance DECIMAL(10,1),
_date TIMESTAMP,
_locationMethod VARCHAR(50),
_userName VARCHAR(50),
_phoneNumber VARCHAR(50),
_sessionID VARCHAR(50),
_accuracy INT(10),
_extraInfo VARCHAR(255),
_eventType VARCHAR(50)
)
BEGIN
   INSERT INTO gpslocations (latitude, longitude, speed, direction, distance, gpsTime, locationMethod, userName, phoneNumber,  sessionID, accuracy, extraInfo, eventType)
   VALUES (_latitude, _longitude, _speed, _direction, _distance, _date, _locationMethod, _userName, _phoneNumber, _sessionID, _accuracy, _extraInfo, _eventType);
   SELECT NOW();
END//
DELIMITER ;

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
  `TrackID` varchar(50) DEFAULT NULL,
  `Status` varchar(2) NOT NULL DEFAULT 'DA',
  `Cancel` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table train.train: 3 rows
/*!40000 ALTER TABLE `train` DISABLE KEYS */;
INSERT INTO `train` (`ID`, `Number`, `Name`, `Start`, `End`, `TrackID`, `Status`, `Cancel`) VALUES
	(1, 8058, 'Samudra Devi', 2, 8, 'Samudra-Devi', 'DA', 0),
	(16, 8058, 'Samudra Devi', 8, 2, 'Samudra-Devi', 'DA', 0),
	(13, 9063, 'Ruhunu Kumari', 2, 6, 'Ruhunu-Kumari', 'WD', 0);
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
