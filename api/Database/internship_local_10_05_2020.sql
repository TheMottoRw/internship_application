-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: internship
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'System','Administrator','hasua.mr@gmail.com','MTIz','2020-03-13 17:43:20');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant` (
  `applicant_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `institution` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `faculty_dept` varchar(50) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `status` varchar(15) DEFAULT '',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant`
--

LOCK TABLES `applicant` WRITE;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` VALUES (1,'Hanyurwimfura','Dieudonne','0781233445','hanyudieudonne@gmail.com','Male','MTIz','IPRC Tumba','3','Information Technology','2019-2020','','2020-03-13 21:25:17');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `internship_id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `application_letter` varchar(500) DEFAULT '',
  `recommendation` varchar(500) DEFAULT '',
  `transcript` varchar(500) DEFAULT '',
  `photo` varchar(500) DEFAULT '',
  `response` varchar(500) DEFAULT '',
  `status` enum('pending','approved','rejected','deleted') DEFAULT 'pending',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`application_id`),
  KEY `company_id` (`company_id`),
  KEY `internship_id` (`internship_id`),
  KEY `applicant_id` (`applicant_id`),
  CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`internship_id`) REFERENCES `company_internship` (`internship_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (1,1,1,1,'afriregister-payhost.png','kabaka.jpeg','IMG-20191105-WA0008.jpg','timeframe.png','We are glad that you have been selected to participate in our internship','approved','2020-03-13 21:37:24');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `company_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `gps_location` varchar(500) NOT NULL,
  `tin_number` int NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `website` varchar(30) NOT NULL,
  `status` enum('pending','approved','rejected','deleted') DEFAULT 'pending',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'KayKen Ltd','kabaka.jpeg','0726183049','info@kayken.rw','Telecom house','123:1245',11091,'12345','www.kayken.rw','approved','2020-03-13 18:11:29'),(2,'KayKen Ltd','kabaka.jpeg','0726183040','info@kayken.org','Telecom house','123:1245',110910,'12345','www.kayken.rw','pending','2020-03-13 18:19:34'),(3,'KayKen Ltd','','0726183041','info@kayken.com','Telecom house','123:1245',110911,'12345','www.kayken.rw','pending','2020-03-13 18:20:05');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_internship`
--

DROP TABLE IF EXISTS `company_internship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_internship` (
  `internship_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `eligibility` varchar(500) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `needed_number` int NOT NULL,
  `application_start` date NOT NULL,
  `application_end` date NOT NULL,
  `application_limit` int NOT NULL,
  `company_id` int NOT NULL,
  `status` enum('pending','open','closed') DEFAULT 'pending',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`internship_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `company_internship_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_internship`
--

LOCK TABLES `company_internship` WRITE;
/*!40000 ALTER TABLE `company_internship` DISABLE KEYS */;
INSERT INTO `company_internship` VALUES (1,'HR','For students','Local students','2020-05-04','2020-06-30',4,'2020-03-04','2020-04-30',15,1,'open','2020-03-13 20:59:47');
/*!40000 ALTER TABLE `company_internship` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-10 12:34:44
