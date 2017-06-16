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
INSERT INTO `passenger` VALUES (1,'mofiqul','adult',24,'male',1),(2,'mofiqul','adult',24,'male',3),(3,'someone','adult',22,'female',3),(4,'my kid','child',3,'male',3),(5,'mofiqul','adult',24,'male',4),(6,'someone','adult',22,'female',4),(7,'my kid','child',3,'male',4),(8,'this is test','adult',12,'male',5);
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
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
INSERT INTO `ticket` VALUES (1,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','7110347573'),(2,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',3,'mofiqul','7335404879'),(3,'GUWAHATI (GHY)','DIMAPUR (DMV)','05:00','23:35',3,'mofiqul','3330493939'),(4,'GUWAHATI (GHY)','DIMAPUR (DMV)','05:00','23:35',3,'mofiqul','1626015794'),(5,'GUWAHATI (GHY)','DIMAPUR (DMV)','08:55','03:20',1,'Guest','1019885285');
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

-- Dump completed on 2017-06-16 10:28:19
