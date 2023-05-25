-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_kpop
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `grup`
--

DROP TABLE IF EXISTS `grup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grup` (
  `grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`grup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grup`
--

LOCK TABLES `grup` WRITE;
/*!40000 ALTER TABLE `grup` DISABLE KEYS */;
INSERT INTO `grup` VALUES (1,'Twice'),(4,'StrayKids'),(6,'GOT7'),(7,'Itzy');
/*!40000 ALTER TABLE `grup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idol`
--

DROP TABLE IF EXISTS `idol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idol` (
  `idol_id` int(11) NOT NULL AUTO_INCREMENT,
  `idol_nama` varchar(100) DEFAULT NULL,
  `idol_foto` varchar(100) DEFAULT NULL,
  `idol_lahir` date DEFAULT NULL,
  `idol_nationality` varchar(100) DEFAULT NULL,
  `grup_id` int(11) DEFAULT NULL,
  `posisi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idol_id`),
  KEY `grup_id` (`grup_id`),
  KEY `posisi_id` (`posisi_id`),
  CONSTRAINT `idol_ibfk_1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`grup_id`),
  CONSTRAINT `idol_ibfk_2` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`posisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idol`
--

LOCK TABLES `idol` WRITE;
/*!40000 ALTER TABLE `idol` DISABLE KEYS */;
INSERT INTO `idol` VALUES (2,'Minatozaki Sana','6620556174fcdf30050ab7027fe5a5dc.jpg','1996-12-29','Japanese',1,6),(4,'Park Jihyo','Jihyo.jpg','1997-02-01','Korean',1,1),(6,'Jackson Wang','jackson.jpg','1994-03-28','Chinese',6,7),(7,'Chou Tzuyu','tzuyu.jpg','1999-06-14','Chinese',1,10),(8,'Park Jinyoung','Jinyoung.jpg','1994-09-22','Korean',6,5),(9,'Bang Christopher Chan','Bangchan.jpeg','1997-10-03','Australian',4,1),(12,'Kim Seungmin','Seungmin.jpg','2000-09-22','Korean',4,6),(13,'Hwang Yeji','Yeji.jpg','2000-05-26','Korean',7,1),(14,'Lee Know','Lee Know.jpg','1998-10-25','Korean',4,11);
/*!40000 ALTER TABLE `idol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posisi`
--

DROP TABLE IF EXISTS `posisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posisi` (
  `posisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`posisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posisi`
--

LOCK TABLES `posisi` WRITE;
/*!40000 ALTER TABLE `posisi` DISABLE KEYS */;
INSERT INTO `posisi` VALUES (1,'Leader'),(5,'Center'),(6,'Vocalist'),(7,'Rapper'),(10,'Visual'),(11,'Dancer');
/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-25 14:47:04
