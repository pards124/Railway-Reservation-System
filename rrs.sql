-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: rrs
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `ticket` int(200) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fare`
--

DROP TABLE IF EXISTS `fare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fare` (
  `ticket` int(200) NOT NULL,
  `fare` varchar(50) DEFAULT NULL,
  `class` int(200) DEFAULT NULL,
  PRIMARY KEY (`ticket`),
  KEY `class` (`class`),
  CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fare`
--

LOCK TABLES `fare` WRITE;
/*!40000 ALTER TABLE `fare` DISABLE KEYS */;
INSERT INTO `fare` VALUES (23,'',NULL),(24,'',NULL),(27,'540',NULL),(28,'540',NULL);
/*!40000 ALTER TABLE `fare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `id` int(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `ticket` int(200) DEFAULT NULL,
  `seat_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket` (`ticket`),
  CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`ticket`) REFERENCES `ticket` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES (1,'mofiqul','adult',24,'male',1,NULL),(2,'mofiqul','adult',24,'male',3,NULL),(3,'someone','adult',22,'female',3,NULL),(4,'my kid','child',3,'male',3,NULL),(5,'mofiqul','adult',24,'male',4,NULL),(6,'someone','adult',22,'female',4,NULL),(7,'my kid','child',3,'male',4,NULL),(8,'this is test','adult',12,'male',5,NULL),(9,'mofiqul','adult',2,'male',6,NULL),(10,'someone','adult',2,'male',6,NULL),(11,'mofiqul','adult',24,'male',7,NULL),(12,'mofiqul','adult',24,'male',8,NULL),(13,'mofiqul','adult',24,'male',9,NULL),(14,'mofiqul','adult',24,'male',10,NULL),(15,'mofiqul','adult',24,'male',11,NULL),(16,'mofiqul','adult',24,'male',12,NULL),(17,'mofiqul','adult',24,'male',13,NULL),(18,'mofiqul','adult',24,'male',14,NULL),(19,'mofiqul','adult',24,'male',15,NULL),(20,'mofiqul','adult',34,'male',16,NULL),(21,'someone','adult',45,'male',16,NULL),(22,'mofiqul','adult',34,'male',17,NULL),(23,'someone','adult',45,'male',17,NULL),(24,'mofiqul','adult',34,'male',18,'S1,10'),(25,'someone','adult',45,'male',18,'B3,34'),(26,'mofiqul','adult',24,'male',19,'S3,76'),(27,'someone','adult',20,'female',19,'S4,88'),(28,'my kid','child',5,'male',19,'S5,63'),(29,'mofiqul','adult',40,'male',20,'S3,60'),(30,'someone','adult',20,'male',20,'S4,57'),(31,'someone else','adult',35,'female',20,'S2,12'),(32,'mofiqul','adult',23,'male',21,'S1,77'),(33,'someone','adult',45,'male',21,'S4,74'),(34,'my kid','child',56,'male',21,'S1,63'),(35,'mofiqul','adult',24,'male',22,'S4,7'),(36,'someone','adult',20,'female',22,'S3,14'),(37,'my kid','child',2,'male',22,'S2,11'),(38,'mofiqul','adult',24,'male',23,'S5,51'),(39,'someone','adult',20,'female',23,'S2,45'),(40,'my kid','child',2,'male',23,'S5,81'),(41,'mofiqul','adult',24,'male',24,'S4,74'),(42,'someone','adult',20,'female',24,'S2,63'),(43,'my kid','child',2,'male',24,'S1,28'),(44,'mofiqul','adult',24,'male',25,'S5,37'),(45,'someone','adult',20,'female',25,'S3,8'),(46,'my kid','child',2,'male',25,'S1,26'),(47,'mofiqul','adult',23,'male',26,'S4,87'),(48,'someone','adult',19,'female',26,'S4,84'),(49,'my kid','child',1,'male',26,'S5,62'),(50,'mofiqul','adult',23,'male',27,'S4,80'),(51,'someone','adult',19,'female',27,'S4,76'),(52,'my kid','child',1,'male',27,'S4,54'),(53,'mofiqul','adult',23,'male',28,'S1,72'),(54,'someone','adult',19,'female',28,'S5,17'),(55,'my kid','child',1,'male',28,'S4,39');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `ticket` int(200) DEFAULT NULL,
  `card_no` varchar(200) DEFAULT NULL,
  `ccv` int(10) DEFAULT NULL,
  `valid_till` date DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(200) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `a_time` varchar(10) DEFAULT NULL,
  `d_time` varchar(10) DEFAULT NULL,
  `no_of_passenger` int(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pnr` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','7110347573'),(2,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','7335404879'),(3,'GUWAHATI (GHY)','DIMAPUR (DMV)','05:00','23:35',3,'mofiqul','3330493939'),(4,'GUWAHATI (GHY)','DIMAPUR (DMV)','05:00','23:35',3,'mofiqul','1626015794'),(5,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',1,'Guest','1019885285'),(6,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','4893849395'),(7,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','4952714587'),(8,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','6404784688'),(9,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','5740508720'),(10,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','3482585751'),(11,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','9967683220'),(12,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','4584583474'),(13,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','6956928566'),(14,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','8644533604'),(15,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','5614241363'),(16,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','1623512191'),(17,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','4602753123'),(18,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',2,'mofiqul','2298288057'),(19,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','1018684863'),(20,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','9159217981'),(21,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','8696570802'),(22,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','1920511553'),(23,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','2552696684'),(24,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','8305067183'),(25,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','6124706474'),(26,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','1247368557'),(27,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','2012578972'),(28,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','4249626912');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','e8caa8d36922be22f32e083011c0efbc','System','Admin','1991-12-01','admin@email.com','2017-06-16'),('guest','guest','Guest','','2017-05-18','guest@emil.com','2017-05-18'),('injamul','aac49a85ee25f10c6fb9e1d4c1e93e25','Injamul','Islam','2017-05-18','injamul@email.com','2017-05-18'),('kangkan','ebe66bac2c5a9d9aa02e3fb3557fbf2e','kangkan','rajkhoa','2017-05-18','kang@gmail.com','2017-05-18'),('mofiqul','7b772509da5bc36174cd1ce59eec3a75','Mofiqul','Islam','2017-05-10','mofi0islam@gmail.com','2017-05-18'),('mofiqul_ayaz','7b772509da5bc36174cd1ce59eec3a75','Mofiqul','Islam','2017-05-18','mofi0islam@gmail.com','2017-05-18');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-21 17:17:40
