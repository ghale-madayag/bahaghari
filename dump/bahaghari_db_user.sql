-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 182.50.133.84    Database: bahaghari_db
-- ------------------------------------------------------
-- Server version	5.5.43-37.2-log

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) DEFAULT NULL,
  `user_pword` varchar(45) DEFAULT NULL,
  `user_fname` varchar(45) DEFAULT NULL,
  `user_mname` varchar(45) DEFAULT NULL,
  `user_lname` varchar(45) DEFAULT NULL,
  `user_lvl` int(1) DEFAULT NULL,
  `user_indate` datetime DEFAULT NULL,
  `user_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (41,'ccs_ghale08@yahoo.com','808abb613b930c5633aecb887473a526f43e5b49','Juan','D. ','Dela Cruz',1,'2019-02-12 09:53:52',1),(45,'icahbaun@gmail.com','1972af70edb0497c252b0c02d9bb66769e15ba68','Danica','B','Baun',0,'2019-02-13 18:46:32',0),(46,'nat_deafrocker@yahoo.com','f98f0dbaac9dcace32daeb5eb3641d113264f022','Nathaniel','Q.','Mallari',1,'2019-02-15 23:48:01',1),(47,'regina@laxamanalaw.com','2b3364a47c43b228e45943c9bb362b8db754ad29','Regina','','Laxamana',1,'2019-02-20 15:52:58',1),(44,'azanaandrea14@gmail.com','d51d9fe0a4980a4e708a73b85779c9fe04a2d491','Andrea','S','Azana',1,'2019-02-13 18:43:06',0),(42,'ghale.madayag@gmail.com','c37b21d7b1bf162762f6ae37557845bec766b228','Abegail','L.','Madayag',1,'2019-02-12 18:13:57',1),(40,'cpfloresjr@tsu.edu.ph','457efdc11626581b58ebd3eb0c3560bab62bafa3','Carlos','P.','Flores',1,'2019-02-12 09:53:52',0);
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

-- Dump completed on 2019-03-30 10:14:11
