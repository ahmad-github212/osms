-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: osms_db
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB

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
-- Table structure for table `adminlogin_tb`
--

DROP TABLE IF EXISTS `adminlogin_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`a_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlogin_tb`
--

LOCK TABLES `adminlogin_tb` WRITE;
/*!40000 ALTER TABLE `adminlogin_tb` DISABLE KEYS */;
INSERT INTO `adminlogin_tb` VALUES (1,'Admin Kumar','admin@gmail.com','123456');
/*!40000 ALTER TABLE `adminlogin_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_tb`
--

DROP TABLE IF EXISTS `assets_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets_tb` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_tb`
--

LOCK TABLES `assets_tb` WRITE;
/*!40000 ALTER TABLE `assets_tb` DISABLE KEYS */;
INSERT INTO `assets_tb` VALUES (3,'Mouse','2018-10-02',16,30,500,600),(4,'Rode Mic','2018-10-20',7,10,15000,18000),(5,'boat','2021-05-23',100,100,500,600);
/*!40000 ALTER TABLE `assets_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignwork_tb`
--

DROP TABLE IF EXISTS `assignwork_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignwork_tb`
--

LOCK TABLES `assignwork_tb` WRITE;
/*!40000 ALTER TABLE `assignwork_tb` DISABLE KEYS */;
INSERT INTO `assignwork_tb` VALUES (15,52,'Rode Mic Note Working','my rode mic is not working properly','Sam','house no 234','Sec 3','Kolkata','West Bengal',674534,'user@gmail.com',1234566782,'khan','2021-05-30'),(16,53,'lenovo k8 note not working','dropped into water','ahmad','h.n. 91','bunkar colony','mau','u.p.',275101,'as@shadab.com',8112988295,'shahrukh','2021-05-30'),(17,51,'asdsadsa','asdsadsa','dasdsad','asdasd','sdsadsa','asdsad','sadasd',1413123,'dsadas@gmail.com',4131323,'sohan','2021-05-30');
/*!40000 ALTER TABLE `assignwork_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_tb`
--

DROP TABLE IF EXISTS `customer_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_tb` (
  `custid` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_tb`
--

LOCK TABLES `customer_tb` WRITE;
/*!40000 ALTER TABLE `customer_tb` DISABLE KEYS */;
INSERT INTO `customer_tb` VALUES (1,'Shukla','Bokaro','Mouse',1,600,600,'2018-10-13'),(2,'Pandey ji','Ranchi','Mouse',2,600,600,'2018-10-13'),(3,'Musaddi Lal','Bokaro','Mouse',5,600,3000,'2018-10-13'),(4,'Jay Ho','Ranchi','Mouse',2,600,1200,'2018-10-13'),(5,'something','somethingadd','Mouse',1,600,600,'2018-10-13'),(6,'someone','someoneadd','Keyboard',1,500,500,'2018-10-13'),(7,'jay','jay ho','Keyboard',1,500,500,'2018-10-09'),(8,'Jay','Bokaro','Keyboard',2,500,1000,'2018-10-21'),(9,'Kumar','Bokaro','Keyboard',1,500,500,'2018-10-20'),(10,'kkk','asdsa','Keyboard',1,500,500,'2018-10-20'),(11,'Shukla Ji','Ranchi','Samsung LCD',1,12000,12000,'2018-10-20'),(19,'sdsads','dasdsa','Keyboard',1,500,500,'2018-10-20'),(20,'asdas','asdsad','Keyboard',1,500,500,'2018-10-20'),(21,'dsadas','asdasd','Samsung LCD',1,12000,12000,'2018-10-20'),(22,'sdfsdf','dfsdf','Samsung LCD',1,12000,12000,'2018-10-20'),(23,'Ramu','sadsad','Samsung LCD',1,12000,12000,'2018-10-20'),(24,'gfdgfdg','fgfdgfdg','Samsung LCD',1,12000,12000,'2018-10-20'),(25,'rrr','fgdf','Mouse',1,600,600,'2018-10-20'),(26,'Jay','ranchi','Samsung LCD',1,12000,12000,'2018-10-20'),(27,'dfsdfsd','sdfdsf','Mouse',1,600,600,'2018-10-20'),(28,'Kunal','Ranchi','Rode Mic',1,18000,18000,'2018-10-20'),(29,'khan sir','patna','monitor',2,500,1000,'2021-05-30'),(30,'hello hye','nalanda','monitor',1,500,500,'2021-05-30'),(31,'ahmad','h.n. 91','Mouse',2,600,1200,'2021-05-30'),(32,'Aman Singh','mardah','monitor',0,500,0,'2021-05-23'),(33,'director iiitu','una','Rode Mic',2,18000,36000,'2021-05-30');
/*!40000 ALTER TABLE `customer_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positivefeedback_tb`
--

DROP TABLE IF EXISTS `positivefeedback_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positivefeedback_tb` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `service` varchar(60) COLLATE utf8_bin NOT NULL,
  `rate` int(11) NOT NULL,
  `experience` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positivefeedback_tb`
--

LOCK TABLES `positivefeedback_tb` WRITE;
/*!40000 ALTER TABLE `positivefeedback_tb` DISABLE KEYS */;
INSERT INTO `positivefeedback_tb` VALUES (9,'ahmad ',' 123@gmail.com','Excellent',5,'cheaper and efficient work'),(10,'ahmad ',' 124@gmail.com','Very Good',4,'awesome awesome'),(11,'ahmad taib',' 125@gmail.com','Excellent',5,'mashallah'),(12,'shadab',' 126@gmail.com','Good',3,'keep it up'),(13,'shadab',' 126@gmail.com','Good',3,'keep it up'),(14,'khan',' asa@gmail.com','Excellent',5,'koi jawab nahi'),(15,'krk',' krk@gmail.com','Excellent',5,'best review');
/*!40000 ALTER TABLE `positivefeedback_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requesterfeedback`
--

DROP TABLE IF EXISTS `requesterfeedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requesterfeedback` (
  `fbd_id` int(11) NOT NULL AUTO_INCREMENT,
  `fbd_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `fbd_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `fbd_service` varchar(60) COLLATE utf8_bin NOT NULL,
  `fbd_rate` int(11) NOT NULL,
  `fbd_experience` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`fbd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requesterfeedback`
--

LOCK TABLES `requesterfeedback` WRITE;
/*!40000 ALTER TABLE `requesterfeedback` DISABLE KEYS */;
INSERT INTO `requesterfeedback` VALUES (11,'ahmad ',' 123@gmail.com','Excellent',5,'cheaper and efficient work'),(12,'ahmad ',' 124@gmail.com','Very Good',4,'awesome awesome'),(13,'ahmad taib',' 125@gmail.com','Excellent',5,'mashallah'),(14,'shadab',' 126@gmail.com','Good',3,'keep it up'),(15,'khan',' asa@gmail.com','Excellent',5,'koi jawab nahi'),(16,'krk',' krk@gmail.com','Excellent',5,'best review'),(17,'salemon',' salemon@gmail.com','Excellent',5,'shabaash');
/*!40000 ALTER TABLE `requesterfeedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requesterlogin_tb`
--

DROP TABLE IF EXISTS `requesterlogin_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_imageName` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`r_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requesterlogin_tb`
--

LOCK TABLES `requesterlogin_tb` WRITE;
/*!40000 ALTER TABLE `requesterlogin_tb` DISABLE KEYS */;
INSERT INTO `requesterlogin_tb` VALUES (9,'  Rajesh','raj@gmail.com','user',''),(10,'  User','user@gmail.com','user',''),(11,'Jay','jay@gmail.com','jay123',''),(12,'ahmad','asa@gmail.com','123456ahmad','avtar1.jpeg'),(13,'shadab','18212@gmail.com','12345','avtar2.jpeg'),(14,'ahmad','123@gmail.com','$2y$10$1We2jIHb3QebhiwqlJJzcO/3eyt3F3j.JZt.fLfd2/z4ATFfOtTzq','avtar3.jpeg'),(15,'jain','jain@gmail.com','$2y$10$gtCAMUP36pxARygE7C2USuyk20v6O/b7xMwrFCPeykIkGmRIJEzES','avtar2.jpeg');
/*!40000 ALTER TABLE `requesterlogin_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submitrequest_tb`
--

DROP TABLE IF EXISTS `submitrequest_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submitrequest_tb`
--

LOCK TABLES `submitrequest_tb` WRITE;
/*!40000 ALTER TABLE `submitrequest_tb` DISABLE KEYS */;
INSERT INTO `submitrequest_tb` VALUES (51,'asdsadsa','asdsadsa','dasdsad','asdasd','sdsadsa','asdsad','sadasd',1413123,'dsadas@gmail.com',4131323,'2018-10-20'),(52,'Rode Mic Note Working','my rode mic is not working properly','Sam','house no 234','Sec 3','Kolkata','West Bengal',674534,'user@gmail.com',1234566782,'2018-10-20'),(53,'lenovo k8 note not working','dropped into water','ahmad','h.n. 91','bunkar colony','mau','u.p.',275101,'as@shadab.com',8112988295,'2021-05-29');
/*!40000 ALTER TABLE `submitrequest_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technician_tb`
--

DROP TABLE IF EXISTS `technician_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technician_tb` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(11) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technician_tb`
--

LOCK TABLES `technician_tb` WRITE;
/*!40000 ALTER TABLE `technician_tb` DISABLE KEYS */;
INSERT INTO `technician_tb` VALUES (12,'Tech1','Delhi 4',9876543210,'tech@gmail.com'),(14,'shadab','mau',8112988295,'18212@iiitu.ac.in');
/*!40000 ALTER TABLE `technician_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-30 11:18:13
