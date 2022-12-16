-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: spryrr1myu6oalwl.chr7pe7iynqr.eu-west-1.rds.amazonaws.com    Database: zt8bhfo1tcz5g9xf
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Temporary view structure for view `all_history`
--

DROP TABLE IF EXISTS `all_history`;
/*!50001 DROP VIEW IF EXISTS `all_history`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_history` AS SELECT 
 1 AS `id`,
 1 AS `mide_id`,
 1 AS `component_code`,
 1 AS `code`,
 1 AS `diagramName`,
 1 AS `packageName`,
 1 AS `moduleName`,
 1 AS `componentName`,
 1 AS `note`,
 1 AS `date_time`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `components` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `package_id` int NOT NULL,
  `module_id` int NOT NULL,
  `component_code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_id_idx` (`package_id`),
  KEY `module_id_idx` (`module_id`),
  CONSTRAINT `module_id` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  CONSTRAINT `package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'Fixed Shunt Reactor',3,1,'FSR-'),(2,'Harmonic Filter',3,1,'HF-'),(3,'HV Switchgear GIS',3,1,'HVS-'),(4,'Inter-Array Cable',2,3,'IAC-'),(5,'Offshore Export Cable',2,3,'OEC-'),(6,'MV Switchgear',3,5,'MVS-'),(7,'Power Transformer',3,1,'PT-'),(8,'Statcom',3,4,'STC-'),(9,'Wind Turbine',1,1,'WTG-'),(10,'HVAC',4,2,'HVAC-'),(11,'CCTV',4,2,'CCTV-'),(12,'Diesel Gen',4,2,'DG-'),(13,'Waste Water Collection System',4,2,'WWCS-'),(14,'LV MV Aux Power Transformer',4,2,'APT-'),(15,'Earthing Resistor',4,2,'ER-'),(16,'Battery& Charger',4,2,'BC-'),(17,'Land Cable',2,3,'LC-'),(18,'Offshore HDD Punch-out ',2,3,'HDD-');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagram`
--

DROP TABLE IF EXISTS `diagram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diagram` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  `diagram_code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagram`
--

LOCK TABLES `diagram` WRITE;
/*!40000 ALTER TABLE `diagram` DISABLE KEYS */;
INSERT INTO `diagram` VALUES (1,'Single Line Diagram',1,'SLD-1');
/*!40000 ALTER TABLE `diagram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `note` varchar(45) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_mide_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mide_id_idx` (`history_mide_id`),
  CONSTRAINT `history_mide_id` FOREIGN KEY (`history_mide_id`) REFERENCES `mide` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (2,'Looks Good.','2022-12-01 12:51:17',1),(3,'Oiling required.','2022-12-01 12:51:17',2),(4,'Fixed.','2022-12-01 12:51:17',3),(5,'Looks Good.','2022-12-01 12:51:17',4),(6,'Everything is fine.','2022-12-01 12:51:17',5),(7,'Very Good.','2022-12-01 12:51:17',6),(8,'Problems solved.','2022-12-01 12:51:17',7),(9,'Oiling required.','2022-12-01 12:51:17',8),(10,'Looks Good','2022-12-01 12:51:17',9),(11,'Looks Good','2022-12-01 12:51:17',10),(12,'Excellent.','2022-12-01 12:51:17',11),(13,'Looks Good.','2022-12-01 12:51:17',12),(14,'Oiling required.','2022-12-01 12:51:17',13),(15,'Remember to solve FFR problems.','2022-12-01 12:51:17',14),(16,'Not bad.','2022-12-01 12:51:17',15),(17,'Very Good.','2022-12-01 12:51:17',16),(18,'Looks Good.','2022-12-01 12:51:17',17),(19,'No problem found.','2022-12-01 12:51:17',18),(20,'Inspection done.','2022-12-01 12:51:17',19),(21,'Everything is fine.','2022-12-01 12:51:17',20),(22,'Had some problems, fixed now.','2022-12-01 12:51:17',21),(23,'Remember to solve RQ problems.','2022-12-01 12:51:17',22),(24,'Looks Good','2022-12-01 12:51:17',23),(25,'Not bad.','2022-12-01 12:51:17',24),(26,'Everything is fine.','2022-12-01 12:51:17',25),(27,'Looks Good','2022-12-01 12:51:17',26),(28,'Excellent.','2022-12-01 12:51:17',27),(29,'Looks Good','2022-12-01 12:51:17',28),(30,'Oiling required.','2022-12-01 12:51:17',29),(31,'Looks Good.','2022-12-01 12:51:17',30),(32,'Excellent.','2022-12-01 12:51:17',31),(33,'No problem found.','2022-12-01 12:51:17',32),(34,'Very Good.','2022-12-01 12:51:17',33),(35,'Inspection done.','2022-12-01 12:51:17',34),(36,'Oiling required.','2022-12-01 12:51:17',35),(37,'Problems fixed now.','2022-12-01 12:51:17',36),(38,'Not bad.','2022-12-01 12:51:17',37),(39,'Excellent.','2022-12-01 13:02:50',1),(40,'Looks Good.','2022-12-01 13:02:50',2),(41,'Oiling required.','2022-12-01 13:02:50',3),(42,'Remember to solve FFR problems.','2022-12-01 13:02:50',4),(43,'Not bad.','2022-12-01 13:02:50',5),(44,'Problems fixed now.','2022-12-01 13:02:50',6),(45,'Not bad.','2022-12-01 13:02:50',7),(46,'No problem found.','2022-12-01 13:02:50',8),(47,'Inspection done.','2022-12-01 13:02:50',9),(48,'Everything is fine.','2022-12-01 13:02:50',10),(49,'Had some problems, fixed now.','2022-12-01 13:02:50',11),(50,'Remember to solve RQ problems.','2022-12-01 13:02:50',12),(51,'Looks Good','2022-12-01 13:02:50',13),(52,'Not bad.','2022-12-01 13:02:50',14),(53,'Everything is fine.','2022-12-01 13:02:50',15),(54,'Very Good.','2022-12-01 13:02:50',16),(55,'Problems solved.','2022-12-01 13:02:50',17),(56,'Oiling required.','2022-12-01 13:02:50',18),(57,'Looks Good','2022-12-01 13:02:50',19),(58,'Looks Good','2022-12-01 13:02:50',20),(59,'Excellent.','2022-12-01 13:02:50',21),(60,'No problem found.','2022-12-01 13:02:50',22),(61,'Very Good.','2022-12-01 13:02:50',23),(62,'Inspection done.','2022-12-01 13:02:50',24),(63,'Oiling required.','2022-12-01 13:02:50',25),(64,'Very Good.','2022-12-01 13:02:50',26),(65,'Looks Good.','2022-12-01 13:02:50',27),(66,'Looks Good.','2022-12-01 13:02:50',28),(67,'Oiling required.','2022-12-01 13:02:50',29),(68,'Fixed.','2022-12-01 13:02:50',30),(69,'Looks Good.','2022-12-01 13:02:50',31),(70,'Everything is fine.','2022-12-01 13:02:50',32),(71,'Looks Good','2022-12-01 13:02:50',33),(72,'Excellent.','2022-12-01 13:02:50',34),(73,'Looks Good','2022-12-01 13:02:50',35),(74,'Oiling required.','2022-12-01 13:02:50',36),(75,'Looks Good.','2022-12-01 13:02:50',37),(76,'It is a new Note','2022-12-05 02:56:41',37),(77,'Testing History','2022-12-05 03:02:29',37),(78,'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr','2022-12-06 00:56:09',25),(79,'It is good','2022-12-06 09:28:33',11),(80,'Test2','2022-12-08 11:19:14',37),(81,'Test2','2022-12-08 15:46:02',37),(82,'Test 3','2022-12-08 15:51:01',37),(83,'Test 1','2022-12-11 18:32:00',48),(84,'Test 2','2022-12-11 18:32:57',48),(85,'Very Good','2022-12-11 18:54:11',30),(86,'Very Good','2022-12-11 18:54:50',35),(87,'It is Ok','2022-12-11 18:56:25',3),(88,'rrrr','2022-12-12 12:49:30',38),(89,'Good','2022-12-14 12:42:20',4),(90,'Test 3','2022-12-16 01:07:34',48);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mide`
--

DROP TABLE IF EXISTS `mide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `component_id` int NOT NULL,
  `diagram_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `diagram_id_idx` (`diagram_id`),
  KEY `component_id_idx` (`component_id`),
  CONSTRAINT `component_id` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  CONSTRAINT `diagram_id` FOREIGN KEY (`diagram_id`) REFERENCES `diagram` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mide`
--

LOCK TABLES `mide` WRITE;
/*!40000 ALTER TABLE `mide` DISABLE KEYS */;
INSERT INTO `mide` VALUES (1,'01',1,1),(2,'01',2,1),(3,'01',8,1),(4,'01',3,1),(5,'02',3,1),(6,'03',3,1),(7,'04',3,1),(8,'05',3,1),(9,'01',5,1),(10,'02',1,1),(11,'01',6,1),(12,'02',6,1),(13,'03',6,1),(14,'01',7,1),(15,'02',7,1),(16,'01',4,1),(17,'02',4,1),(18,'03',4,1),(19,'04',4,1),(20,'05',4,1),(21,'06',4,1),(22,'07',4,1),(23,'08',4,1),(24,'09',4,1),(25,'10',4,1),(26,'A01',9,1),(27,'A02',9,1),(28,'A03',9,1),(29,'A04',9,1),(30,'A05',9,1),(31,'A06',9,1),(32,'B01',9,1),(33,'B02',9,1),(34,'B03',9,1),(35,'B04',9,1),(36,'B05',9,1),(37,'B06',9,1),(38,'03',7,1),(39,'04',6,1),(40,'05',6,1),(41,'06',6,1),(42,'07',6,1),(43,'08',6,1),(44,'09',6,1),(45,'10',6,1),(46,'11',6,1),(47,'01',10,1),(48,'01',11,1),(49,'01',12,1),(50,'01',13,1),(51,'01',14,1),(52,'01',15,1),(53,'01',16,1),(54,'01',17,1),(55,'01',18,1);
/*!40000 ALTER TABLE `mide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'HV'),(2,'LV'),(3,'Service'),(4,'STAT'),(5,'MV');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation`
--

DROP TABLE IF EXISTS `operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ope_comp_id` int NOT NULL,
  `Operation_Description` varchar(1000) NOT NULL,
  `Maintenance_Frequency` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ope_comp_id_idx` (`ope_comp_id`),
  CONSTRAINT `ope_comp_id` FOREIGN KEY (`ope_comp_id`) REFERENCES `components` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation`
--

LOCK TABLES `operation` WRITE;
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
INSERT INTO `operation` VALUES (1,3,'Overhaul, performed by supplier.','25Y'),(2,3,'Switchgear in service bays isolated one after the other.','2Y'),(3,3,'Check earthing and coating. Repair if necessary.','2Y'),(4,3,'Visual inspection of anti-condensation heaters, disconnectors, earthing switch, current and voltage transformers, circuit breakers, SF6 density gauges, surge arrestors, including earthing connections.','6M'),(21,3,'Visual inspection (General)','2W'),(22,3,'Cleaning and Dusting','2W'),(24,3,'Check the tank, welding seams, cover, conservator, cable boxes, current transformer boxes, pipe connection, flanges, valves etc for leakages\r Check positions of maximum temperature indicator\r Check fo','1Y'),(25,1,'	\"Visual inspection of electrical connections via thermal imaging\r\nVisual inspection of oil level, dehydrating breathers, expansions bellows, surface damage, tank for leakages, valve positions, contacts and relays, bucholz relay, pressure relief valve, earthing system, maximum temperature indicator\"	 ','	1Y	'),(26,1,'	Take oil sample and send to lab for testing	 ','	1Y	'),(27,1,'	\"Visual inspection of electrical connections via thermal imaging\r\nVisual inspection of oil level, dehydrating breathers, expansions bellows, surface damage, tank for leakages, valve positions, contacts and relays, bucholz relay, pressure relief valve, earthing system, maximum temperature indicator\"	 ','	1Y	'),(28,1,'	Take oil sample and send to lab for testing	 ','	1Y	'),(29,1,'	Check all electrical connections by means of thermal imaging	 ','	6M	'),(30,1,'	\"Check surface for damages, check earthing of trf, tank cabinets etc\r\nCheck all valves and lids\r\nCheck ventilation systems, door sealings, contactors and replays\r\nCheck earthing\r\nCheck protection devices, bucholz, thermometer, pressure relief valves, etc\"	 ','	2Y	'),(31,1,'	Visual inspection (General)	 ','	2W	'),(32,1,'	Cleaning and Dusting	 ','	2W	'),(33,2,'	\"Inspection of insulators, earth connections, abnormal sounds, surge arrestors, current transformer, reactors, resistors, capacitor banks and steel works.\r\nInspect all surfaces for pollution.\r\nEnsure ventilation for resisitors is free of obstructions\"	 ','	1Y	'),(34,2,'	Repeat commissioning capacitance measurements on all capacitor in banks, check with HMI.	 ','	1Y	'),(35,2,'	Check all electrical connections by means of thermal imaging	 ','	6M	'),(36,2,'	\"Inspection of insulators, earth connections, abnormal sounds, surge arrestors, current transformer, reactors, resistors, capacitor banks and steel works.\r\nInspect all surfaces for pollution.\r\nEnsure ventilation for resisitors is free of obstructions\"	 ','	1Y	'),(37,2,'	Visual inspection (General)	 ','	2W	'),(38,2,'	Cleaning and Dusting	 ','	2W	'),(39,4,'	Visual inspection (General)	 ','	2W	'),(40,4,'	Cleaning and Dusting	 ','	2W	'),(41,5,'	Visual inspection (General)	 ','	2W	'),(42,5,'	Cleaning and Dusting	 ','	2W	'),(43,6,'	Visual inspection of anti-condensation heaters, disconnectors, earthing switch, current and voltage transformers, circuit breakers, SF6 density gauges, surge arrestors, access platforms, etc	 ','	1Y	'),(44,6,'	Overhaul, performed by supplier	 ','	20Y	'),(45,6,'	Check earthing and coating. Repair if necessary	 ','	2Y	'),(46,6,'	Minor maintenance, performed by supplier	 ','	4Y	'),(47,6,'	Major maintenance, performed by supplier	 ','	12Y	'),(48,6,'	Log # of SA discharges, and switching operations. If close to 5000 switches has occurred, external maintenance is required	 ','	1Y	'),(49,6,'	Cleaning and Dusting	 ','	2W	'),(50,7,'	Check all electrical connections by means of thermal imaging	 ','	6M	'),(51,7,'	\"Verify the operation and trip of Bucholz relay\r\nDiverter switch protection\"	 ','	3Y	'),(52,7,'	\"Visual inspection of DGA, oil level indicators, for both main tank, bushings, coolers, thermometer indicators, as well as the maximum temperature indicator, the pressure relief device.\r\nEnsure no corrosion is present at bushing terminations, and the gas accumulating indicator\"	 ','	1Y	'),(53,7,'	Take oil sample and send to lab for testing	 ','	1Y	'),(54,7,'	\"Ensure dehydrating breather is functional, and verify with HMI.\r\nOil level monitors, and verify with HMI\r\nDial thermometers and resistance thermometers, verify with HMI\r\nAll pressure relief devices\r\nCTs and earthing\r\nVent bleding screws\r\nVisual inspection of Hydrocal, oil level indicators, for both main tank, bushings, coolers, thermometer indicators, as well as the maximum temperature indicator, the pressure relief device.\r\nEnsure no corrosion is present at bushing terminations, and the gas accumulating indicator\"	 ','	1Y	'),(55,7,'	Visual inspection (General)	 ','	2W	'),(56,7,'	Cleaning and Dusting	 ','	2W	'),(57,8,'	Visual inspection (General)	 ','	2W	'),(58,8,'	Cleaning and Dusting	 ','	2W	'),(59,9,'	Visual inspection (General)	 ','	2W	'),(60,9,'	Cleaning and Dusting	 ','	2W'),(61,10,'	Blower assembly is checked and cleaned.','1Y'),(62,10,'	Clean ignition system.','1Y'),(63,10,'	Clean combustion blower housing.	','1Y'),(64,10,'	Clean/clear condensate lines, evaporator coil and drip pan.','1Y'),(65,10,'	Clean burner assembly.','1Y'),(66,10,'	Change Filters.','	1Y'),(67,10,'	Lubricate moving parts.','2Y'),(68,10,'	Changes bolts if needed	.','2Y'),(69,11,'	Check that the cameras are securely attached to the wall.','6M'),(70,11,'	Check camera housings for deterioration (environmental conditions).','6M'),(71,11,'	Clean housing and free from dust	.','	6M'),(72,11,'	Check lens focus and adjust as appropriate.','	6M'),(73,11,'	Check field of view is as agreed at installation.','6M'),(74,11,'	Check operation of night vision monitors (Playback last night recording)','6M'),(75,11,'	Check connectors and cable entry points for loose wiring','	1Y'),(76,11,'	Check cable are transmitting an adequate video signal to control room.','1Y'),(77,11,'	Check Wiring for any wear and tear or exposed wires.	 ','1Y'),(78,11,'	Check hard disk for possible errors.	 ','2Y'),(79,11,'	Check operation of NVR/DVR cooling fans (if applicable) clean as necessary.','	2Y'),(80,11,'	Check time, date stamp is correct and adjust as necessary.','	2Y'),(81,11,'	Check Monitors are free from picture burn-in and distortion.','2Y'),(82,11,'	Check Monitors have proper contrast and brightness.','2Y'),(83,12,'	Change oil.','1Y'),(84,12,'	Change oil filter, fuel filter, and air filter.','	1Y'),(85,12,'	Flush cooling system.	','	1Y'),(86,12,'	Inspect wiring/electrical system. ','1Y'),(87,12,'	Change spark plugs.	 ','	1Y'),(88,12,'	Test transfer switch.	 ','	1Y'),(89,13,'	Clean	 ','	6M'),(90,13,'	wrenching pumps	 ','	6M'),(91,13,'	visula inspection	 ','	6M'),(92,14,'	visula inspetion	 ','	6M'),(93,14,'	check for oil leakages	 ','	6M'),(94,14,'	check tempratures	 ','	6M'),(95,14,'	check for loose connections	 ','	6M'),(96,15,'Visual Inspection	 ','	6M'),(97,16,'Battery Specific Gravity Checks	 ','	1Y'),(98,16,'Battery voltage Checks	 ','	1Y'),(99,16,'Float Voltage Level checks	 ','	1Y'),(100,16,'7.5 Battery Impedance Test	 ','	1Y'),(101,16,'Perform visual and mechanical Inspection of the charger to ensure all wiring and components are in good condition and electrical connections are tight	 ','	1Y	 '),(102,4,'	General visual Inspection of;\r\nHV array cables integrity and routing, check if array cables are dispaced by sea bed movements.\r\nCheck accessories and assure there is no loose connection or cable distress.\r\nCheck for corrosion in cable hang-offs, cleats or fixings.\r\nCheck FO cable integrityincluding FO connection box . ','1Y'),(103,4,'	\"General visual inspection\r\nInside switchgear cable compartment for HV array cable terminations integrity\"	 ','	6Y'),(104,4,'	\"Routine 12Y interval (Outage) in addition to the WTG Gen BOP & 6Y checks.\r\nVisual inspection and perform test of HV cable earth Link (low resistance ohmeter).\"	 ','	12Y'),(105,5,'	Routine 6M Inspection.\r\nOffshore Substation Visual check pn Terminations,  Link Box, Fibre  Optic Boxes, and other connections. Check if there are any loose connection or damage/distress.	 ','	6M'),(106,5,'	1#Conduct tests as per manufacturers proposal	 ','	1Y'),(107,5,'	2#Conduct tests as per manufacturers proposal	 ','	2Y'),(108,5,'	3#Conduct tests as per manufacturers proposal	 ','5Y'),(109,5,'	Consider optional OTDR and TDR of the onshore and offshore submarine export cables to investigate if there have been any damage.	 ','	12Y	'),(110,17,'	\"Routine 6M Inspection of HV Terminations at Onshore substation.\r\nVisual check on Terminations and Surge Arrestors. Check if there are leakages, discharge, or hotspots.  \"	 ','	6M	'),(111,17,'	Routine 1Y Annual Inspection of HV Accessories at cable connection at substation, land cable routes and Transition Joint.\r\nVisual check  on Terminations / , Earth Link Box, Fibre Optic boxes, connections to HV earthing system, cleats and  support structures. Check if there are leakages, discharge, or hotspots.    \"	 ','	1Y	'),(112,17,'	Routine 5Y interval Test (Outage) as per CIGRE TB797.\r\nLow resistance test of Earthing arrangements and link box. Check for moisture ingress, corrosion.  Clean if necessary.\r\nDo tests as per manufacturers proposal.','5Y'),(113,18,'bathymetry checks','2Y');
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'Turbine'),(2,'Cable'),(3,'Substation'),(4,'HV/LV');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_mide_id` int NOT NULL,
  `last_date` date DEFAULT NULL,
  `next_date` date DEFAULT NULL,
  `task_ope_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_mide_id_idx` (`task_mide_id`),
  KEY `task_ope_id_idx` (`task_ope_id`),
  CONSTRAINT `task_mide_id` FOREIGN KEY (`task_mide_id`) REFERENCES `mide` (`id`),
  CONSTRAINT `task_ope_id` FOREIGN KEY (`task_ope_id`) REFERENCES `operation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=508 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,26,'2022-12-11','2022-12-25',59),(2,27,'2022-12-09','2022-12-23',59),(3,28,'2022-12-09','2022-12-23',59),(4,29,'2022-12-11','2022-12-25',59),(5,30,'2022-12-12','2022-12-26',59),(6,31,'2022-12-16','2022-12-30',59),(7,32,'2022-12-01','2022-12-15',59),(8,33,'2022-12-01','2022-12-15',59),(9,34,'2022-12-01','2022-12-15',59),(10,35,'2022-12-01','2022-12-15',59),(11,36,'2022-12-01','2022-12-15',59),(12,37,'2022-12-01','2022-12-15',59),(13,26,'2022-12-01','2022-12-15',60),(14,27,'2022-12-01','2022-12-15',60),(15,28,'2022-12-01','2022-12-15',60),(16,29,'2022-12-01','2022-12-15',60),(17,30,'2022-12-01','2022-12-15',60),(18,31,'2022-12-01','2022-12-15',60),(19,32,'2022-12-01','2022-12-15',60),(20,33,'2022-12-01','2022-12-15',60),(21,34,'2022-12-01','2022-12-15',60),(22,35,'2022-12-01','2022-12-15',60),(23,36,'2022-12-01','2022-12-15',60),(24,37,'2022-12-09','2022-12-23',60),(25,16,'2022-12-01','2022-12-15',39),(26,17,'2022-12-01','2022-12-15',39),(27,18,'2022-12-01','2022-12-15',39),(28,19,'2022-12-01','2022-12-15',39),(29,20,'2022-12-01','2022-12-15',39),(30,21,'2022-12-01','2022-12-15',39),(31,22,'2022-12-01','2022-12-15',39),(32,23,'2022-12-01','2022-12-15',39),(33,24,'2022-12-01','2022-12-15',39),(34,25,'2022-12-01','2022-12-15',39),(35,16,'2022-12-01','2022-12-15',40),(36,17,'2022-12-01','2022-12-15',40),(37,18,'2022-12-01','2022-12-15',40),(38,19,'2022-12-01','2022-12-15',40),(39,20,'2022-12-01','2022-12-15',40),(40,21,'2022-12-01','2022-12-15',40),(41,22,'2022-12-01','2022-12-15',40),(42,23,'2022-12-01','2022-12-15',40),(43,24,'2022-12-01','2022-12-15',40),(44,25,'2022-12-01','2022-12-15',40),(45,9,'2022-12-01','2022-12-15',41),(46,9,'2022-12-01','2022-12-15',42),(47,1,'2022-12-01','2023-12-01',25),(48,10,'2022-12-01','2023-12-01',25),(49,1,'2022-12-01','2023-12-01',26),(50,10,'2022-12-01','2023-12-01',26),(51,1,'2022-12-01','2023-12-01',27),(52,10,'2022-12-01','2023-12-01',27),(53,1,'2022-12-01','2023-12-01',28),(54,10,'2022-12-01','2023-12-01',28),(55,1,'2022-12-01','2023-05-31',29),(56,10,'2022-12-01','2023-05-31',29),(57,1,'2022-12-01','2024-12-01',30),(58,10,'2022-12-01','2024-12-01',30),(59,1,'2022-12-01','2022-12-15',31),(60,10,'2022-12-01','2022-12-15',31),(61,1,'2022-12-01','2022-12-15',32),(62,10,'2022-12-09','2022-12-23',32),(63,2,'2022-12-01','2023-12-01',33),(64,2,'2022-12-01','2023-12-01',34),(65,2,'2022-12-11','2023-06-11',35),(66,2,'2022-12-01','2023-12-01',36),(67,2,'2022-12-09','2022-12-23',37),(68,2,'2022-12-09','2022-12-23',38),(69,4,'2022-12-01','2047-12-01',1),(70,5,'2022-12-01','2047-12-01',1),(71,6,'2022-12-01','2047-12-01',1),(72,7,'2022-12-01','2047-12-01',1),(73,8,'2022-12-01','2047-12-01',1),(74,4,'2022-12-01','2024-12-01',2),(75,5,'2022-12-01','2024-12-01',2),(76,6,'2022-12-01','2024-12-01',2),(77,7,'2022-12-01','2024-12-01',2),(78,8,'2022-12-01','2024-12-01',2),(79,4,'2022-12-01','2024-12-01',3),(80,5,'2022-12-01','2024-12-01',3),(81,6,'2022-12-01','2024-12-01',3),(82,7,'2022-12-01','2024-12-01',3),(83,8,'2022-12-01','2024-12-01',3),(84,4,'2022-12-01','2023-05-31',4),(85,5,'2022-12-01','2023-05-31',4),(86,6,'2022-12-01','2023-05-31',4),(87,7,'2022-12-01','2023-05-31',4),(88,8,'2022-12-01','2023-05-31',4),(89,4,'2022-12-01','2022-12-15',21),(90,5,'2022-12-01','2022-12-15',21),(91,6,'2022-12-01','2022-12-15',21),(92,7,'2022-12-09','2022-12-23',21),(93,8,'2022-12-01','2022-12-15',21),(94,4,'2022-12-01','2022-12-15',22),(95,5,'2022-12-01','2022-12-15',22),(96,6,'2022-12-09','2022-12-23',22),(97,7,'2022-12-09','2022-12-23',22),(98,8,'2022-12-09','2022-12-23',22),(99,4,'2022-12-01','2023-12-01',24),(100,5,'2022-12-01','2023-12-01',24),(101,6,'2022-12-01','2023-12-01',24),(102,7,'2022-12-01','2023-12-01',24),(103,8,'2022-12-01','2023-12-01',24),(104,11,'2022-12-01','2023-12-01',43),(105,12,'2022-12-01','2023-12-01',43),(106,13,'2022-12-01','2023-12-01',43),(107,11,'2022-12-01','2042-12-01',44),(108,12,'2022-12-01','2042-12-01',44),(109,13,'2022-12-01','2042-12-01',44),(110,11,'2022-12-01','2024-12-01',45),(111,12,'2022-12-01','2024-12-01',45),(112,13,'2022-12-01','2024-12-01',45),(113,11,'2022-12-01','2026-12-01',46),(114,12,'2022-12-01','2026-12-01',46),(115,13,'2022-12-01','2026-12-01',46),(116,11,'2022-12-01','2034-12-01',47),(117,12,'2022-12-01','2034-12-01',47),(118,13,'2022-12-01','2034-12-01',47),(119,11,'2022-12-01','2023-12-01',48),(120,12,'2022-12-01','2023-12-01',48),(121,13,'2022-12-01','2023-12-01',48),(122,11,'2022-12-01','2022-12-15',49),(123,12,'2022-12-01','2022-12-15',49),(124,13,'2022-12-09','2022-12-23',49),(125,14,'2022-12-01','2023-05-31',50),(126,15,'2022-12-01','2023-05-31',50),(127,14,'2022-12-01','2025-12-01',51),(128,15,'2022-12-01','2025-12-01',51),(129,14,'2022-12-01','2023-12-01',52),(130,15,'2022-12-01','2023-12-01',52),(131,14,'2022-12-01','2023-12-01',53),(132,15,'2022-12-01','2023-12-01',53),(133,14,'2022-12-01','2023-12-01',54),(134,15,'2022-12-01','2023-12-01',54),(135,14,'2022-12-09','2022-12-23',55),(136,15,'2022-12-09','2022-12-23',55),(137,14,'2022-12-09','2022-12-23',56),(138,15,'2022-12-14','2022-12-28',56),(139,3,'2022-12-09','2022-12-23',57),(140,3,'2022-12-09','2022-12-23',58),(197,38,'2022-12-01','2023-05-31',50),(198,38,'2022-12-01','2025-12-01',51),(199,38,'2022-12-01','2023-12-01',52),(200,38,'2022-12-01','2023-12-01',53),(201,38,'2022-12-01','2023-12-01',54),(202,38,'2022-12-09','2022-12-23',55),(203,38,'2022-12-09','2022-12-23',56),(261,39,'2022-12-01','2023-12-01',43),(262,39,'2022-12-01','2042-12-01',44),(263,39,'2022-12-01','2024-12-01',45),(264,39,'2022-12-01','2026-12-01',46),(268,40,'2022-12-01','2023-12-01',43),(269,40,'2022-12-01','2042-12-01',44),(270,40,'2022-12-01','2024-12-01',45),(271,40,'2022-12-01','2026-12-01',46),(272,40,'2022-12-01','2034-12-01',47),(273,40,'2022-12-01','2023-12-01',48),(274,40,'2022-12-01','2022-12-15',49),(275,41,'2022-12-01','2023-12-01',43),(276,41,'2022-12-01','2042-12-01',44),(277,41,'2022-12-01','2024-12-01',45),(278,41,'2022-12-01','2026-12-01',46),(279,41,'2022-12-01','2034-12-01',47),(280,41,'2022-12-01','2023-12-01',48),(281,41,'2022-12-01','2022-12-15',49),(282,42,'2022-12-01','2023-12-01',43),(283,42,'2022-12-01','2042-12-01',44),(284,42,'2022-12-01','2024-12-01',45),(285,42,'2022-12-01','2026-12-01',46),(289,43,'2022-12-01','2023-12-01',43),(290,43,'2022-12-01','2042-12-01',44),(291,43,'2022-12-01','2024-12-01',45),(292,43,'2022-12-01','2026-12-01',46),(293,43,'2022-12-01','2034-12-01',47),(294,43,'2022-12-01','2023-12-01',48),(295,43,'2022-12-01','2022-12-15',49),(296,44,'2022-12-01','2023-12-01',43),(297,44,'2022-12-01','2042-12-01',44),(298,44,'2022-12-01','2024-12-01',45),(299,44,'2022-12-01','2026-12-01',46),(300,44,'2022-12-01','2034-12-01',47),(301,44,'2022-12-01','2023-12-01',48),(302,44,'2022-12-01','2022-12-15',49),(303,45,'2022-12-01','2023-12-01',43),(304,45,'2022-12-01','2042-12-01',44),(305,45,'2022-12-01','2024-12-01',45),(306,45,'2022-12-01','2026-12-01',46),(307,45,'2022-12-01','2034-12-01',47),(308,45,'2022-12-01','2023-12-01',48),(309,45,'2022-12-01','2022-12-15',49),(310,46,'2022-12-01','2023-12-01',43),(311,46,'2022-12-01','2042-12-01',44),(312,46,'2022-12-01','2024-12-01',45),(313,46,'2022-12-01','2026-12-01',46),(314,46,'2022-12-01','2034-12-01',47),(315,46,'2022-12-01','2023-12-01',48),(316,46,'2022-12-01','2022-12-15',49),(328,39,'2022-12-12','2034-12-12',47),(329,39,'2022-12-12','2023-12-12',48),(330,39,'2022-12-12','2022-12-26',49),(349,42,'2022-12-12','2034-12-12',47),(350,42,'2022-12-12','2023-12-12',48),(351,42,'2022-12-12','2022-12-26',49),(380,47,'2022-12-12','2023-12-12',61),(381,47,'2022-12-12','2023-12-12',62),(382,47,'2022-12-12','2023-12-12',63),(383,47,'2022-12-12','2023-12-12',64),(384,47,'2022-12-12','2023-12-12',65),(385,47,'2022-12-12','2023-12-12',66),(386,47,'2022-12-12','2024-12-12',67),(387,47,'2022-12-12','2024-12-12',68),(388,48,'2022-12-12','2023-06-11',69),(389,48,'2022-12-12','2023-06-11',70),(390,48,'2022-12-12','2023-06-11',71),(391,48,'2022-12-12','2023-06-11',72),(392,48,'2022-12-12','2023-06-11',73),(393,48,'2022-12-12','2023-06-11',74),(394,48,'2022-12-12','2023-12-12',75),(395,48,'2022-12-12','2023-12-12',76),(396,48,'2022-12-12','2023-12-12',77),(397,48,'2022-12-12','2024-12-12',78),(398,48,'2022-12-12','2024-12-12',79),(399,48,'2022-12-12','2024-12-12',80),(400,48,'2022-12-12','2024-12-12',81),(401,48,'2022-12-12','2024-12-12',82),(402,49,'2022-12-12','2023-12-12',83),(403,49,'2022-12-12','2023-12-12',84),(404,49,'2022-12-12','2023-12-12',85),(405,49,'2022-12-12','2023-12-12',86),(406,49,'2022-12-12','2023-12-12',87),(407,49,'2022-12-12','2023-12-12',88),(408,50,'2022-12-12','2023-06-11',89),(409,50,'2022-12-12','2023-06-11',90),(410,50,'2022-12-12','2023-06-11',91),(411,51,'2022-12-12','2023-06-11',92),(412,51,'2022-12-12','2023-06-11',93),(413,51,'2022-12-12','2023-06-11',94),(414,51,'2022-12-12','2023-06-11',95),(415,52,'2022-12-12','2023-06-11',96),(416,53,'2022-12-12','2023-12-12',97),(417,53,'2022-12-12','2023-12-12',98),(418,53,'2022-12-12','2023-12-12',99),(419,53,'2022-12-12','2023-12-12',100),(420,53,'2022-12-12','2023-12-12',101),(421,54,'2022-12-12','2023-06-11',110),(422,54,'2022-12-12','2023-12-12',111),(423,54,'2022-12-12','2027-12-12',112),(468,16,'2022-12-12','2023-12-12',102),(469,17,'2022-12-12','2023-12-12',102),(470,18,'2022-12-12','2023-12-12',102),(471,19,'2022-12-12','2023-12-12',102),(472,20,'2022-12-12','2023-12-12',102),(473,21,'2022-12-12','2023-12-12',102),(474,22,'2022-12-12','2023-12-12',102),(475,23,'2022-12-12','2023-12-12',102),(476,24,'2022-12-12','2023-12-12',102),(477,25,'2022-12-12','2023-12-12',102),(478,16,'2022-12-12','2028-12-12',103),(479,17,'2022-12-12','2028-12-12',103),(480,18,'2022-12-12','2028-12-12',103),(481,19,'2022-12-12','2028-12-12',103),(482,20,'2022-12-12','2028-12-12',103),(483,21,'2022-12-12','2028-12-12',103),(484,22,'2022-12-12','2028-12-12',103),(485,23,'2022-12-12','2028-12-12',103),(486,24,'2022-12-12','2028-12-12',103),(487,25,'2022-12-12','2028-12-12',103),(488,16,'2022-12-12','2034-12-12',104),(489,17,'2022-12-12','2034-12-12',104),(490,18,'2022-12-12','2034-12-12',104),(491,19,'2022-12-12','2034-12-12',104),(492,20,'2022-12-12','2034-12-12',104),(493,21,'2022-12-12','2034-12-12',104),(494,22,'2022-12-12','2034-12-12',104),(495,23,'2022-12-12','2034-12-12',104),(496,24,'2022-12-12','2034-12-12',104),(497,25,'2022-12-12','2034-12-12',104),(498,9,'2022-12-12','2023-06-11',105),(499,9,'2022-12-12','2023-12-12',106),(500,9,'2022-12-12','2024-12-12',107),(501,9,'2022-12-12','2027-12-12',108),(502,9,'2022-12-12','2034-12-12',109),(506,18,'2022-12-12','2024-12-12',113),(507,55,'2022-12-12','2024-12-12',113);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upcoming`
--

DROP TABLE IF EXISTS `upcoming`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upcoming` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_id_UNIQUE` (`task_id`),
  KEY `task_id_idx` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upcoming`
--

LOCK TABLES `upcoming` WRITE;
/*!40000 ALTER TABLE `upcoming` DISABLE KEYS */;
INSERT INTO `upcoming` VALUES (23,7),(18,8),(25,9),(26,10),(27,11),(28,12),(29,13),(30,14),(31,15),(32,16),(33,17),(34,18),(35,19),(36,20),(37,21),(38,22),(39,23),(40,25),(41,26),(42,27),(43,28),(44,29),(45,30),(46,31),(47,32),(48,33),(49,34),(50,35),(51,36),(52,37),(53,38),(54,39),(55,40),(56,41),(57,42),(58,43),(59,44),(60,45),(61,46),(62,59),(63,60),(64,61),(66,89),(67,90),(68,91),(69,93),(70,94),(71,95),(72,122),(73,123),(74,267),(75,274),(76,281),(77,288),(78,295),(79,302),(80,309),(81,316);
/*!40000 ALTER TABLE `upcoming` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upcommonth`
--

DROP TABLE IF EXISTS `upcommonth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upcommonth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_id_UNIQUE` (`task_id`),
  CONSTRAINT `task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=676 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upcommonth`
--

LOCK TABLES `upcommonth` WRITE;
/*!40000 ALTER TABLE `upcommonth` DISABLE KEYS */;
INSERT INTO `upcommonth` VALUES (595,1),(596,2),(598,3),(597,4),(599,5),(600,6),(601,7),(602,8),(603,9),(604,10),(605,11),(606,12),(607,13),(608,14),(609,15),(610,16),(611,17),(612,18),(613,19),(614,20),(615,21),(616,22),(617,23),(618,24),(619,25),(620,26),(621,27),(622,28),(623,29),(624,30),(625,31),(626,32),(627,33),(628,34),(629,35),(630,36),(631,37),(632,38),(633,39),(634,40),(635,41),(636,42),(637,43),(638,44),(639,45),(640,46),(641,59),(642,60),(643,61),(644,62),(645,67),(646,68),(647,89),(648,90),(649,91),(650,92),(651,93),(652,94),(653,95),(654,96),(655,97),(656,98),(657,122),(658,123),(659,124),(660,135),(661,136),(662,137),(663,138),(664,139),(665,140),(666,202),(667,203),(668,274),(669,281),(670,295),(671,302),(672,309),(673,316),(674,330),(675,351);
/*!40000 ALTER TABLE `upcommonth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'wind','abc1234');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `all_history`
--

/*!50001 DROP VIEW IF EXISTS `all_history`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`niyjbh33piou15dg`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `all_history` AS select `ht`.`id` AS `id`,`ht`.`history_mide_id` AS `mide_id`,`c`.`component_code` AS `component_code`,`m`.`code` AS `code`,`d`.`name` AS `diagramName`,`p`.`name` AS `packageName`,`md`.`name` AS `moduleName`,`c`.`name` AS `componentName`,`ht`.`note` AS `note`,`ht`.`date_time` AS `date_time` from (((((`history` `ht` join `mide` `m` on((`m`.`id` = `ht`.`history_mide_id`))) join `components` `c` on((`c`.`id` = `m`.`component_id`))) join `diagram` `d` on((`d`.`id` = `m`.`diagram_id`))) join `packages` `p` on((`p`.`id` = `c`.`package_id`))) join `module` `md` on((`c`.`module_id` = `md`.`id`))) order by `ht`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-16  2:47:27
