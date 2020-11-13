-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: internship
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

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
INSERT INTO `admin` VALUES (1,'System','Administrator','hasua.mr@gmail.com','MTIzNDU=','2020-03-13 17:43:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant`
--

LOCK TABLES `applicant` WRITE;
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` VALUES (1,'Hanyurwimfura','Dieudonne','0781233445','hanyudieudonne@gmail.com','Male','MTIz','IPRC Tumba','3','Information Technology','2019-2020','','2020-03-13 21:25:17'),(2,'Musangwa','Pascal','0789543456','mgs@gmail.com','Male','MTIzNDU=','Kist','Level 2','Information Technology','2020-2021','','2020-06-29 12:34:21'),(3,'Manzi ','Asua','07895424332','asua@bufu.rw','Male','MTIzNDY1','IPRC Tumba','Level 3','Information Technology','2017-2020','','2020-06-29 12:35:49'),(4,'Ingabire','Grace','078345443','graceing@gmail.com','Female','MTI0MzU2','Tumba college of Technology','Level 2','Information Technology','2019-2020','','2020-06-29 12:38:02'),(5,'twizeyimana','theo','0728863883','theo@gmail.com','Male','MTIxMg==','IPRC TUMBA','2','IT','2020-2021','','2020-11-13 09:36:55'),(6,'uzabakiriho','vital','0728863888','vital@gmail.com','Male','MTIxMg==','IPRC MUSANZE','3','Agriculture','2022','','2020-11-13 09:41:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (1,1,1,1,'afriregister-payhost.png','kabaka.jpeg','IMG-20191105-WA0008.jpg','timeframe.png','We are glad that you have been selected to participate in our internship','approved','2020-03-13 21:37:24'),(10,1,2,2,'Yvet et Ali Camellia letter.docx','Yvet et Ali Camellia letter.odt','Smart restaurant.docx','asua.png','','pending','2020-07-06 11:03:07'),(11,3,11,2,'family pic.jpeg','asua.png','oneday.png','divorce.jpg','rejected','rejected','2020-07-22 12:11:52'),(12,10,13,5,'cyemezo.jpg','Apple_Developer_Program_License_Agreement_XV2A27GUJ6.pdf','Apple_Developer_Program_License_Agreement_XV2A27GUJ6.pdf','cyemezo.jpg','approved','approved','2020-11-13 09:44:24'),(13,10,13,6,'Apple_Developer_Program_License_Agreement_XV2A27GUJ6.pdf','Apple_Developer_Program_License_Agreement_XV2A27GUJ6.pdf','Apple_Developer_Program_License_Agreement_XV2A27GUJ6.pdf','asua.png','','pending','2020-11-13 10:00:42'),(15,10,13,2,'flutter_tutorial.pdf','World Elite - Invoices October.pdf','BDS - Murika studio contract.pdf','Roger Manzi.png','','pending','2020-11-13 10:27:33'),(16,3,11,5,'Bus boycott.pdf','Regular-Expressions.pdf','01-Introduction to Cryptography.pdf','Designer.png','','pending','2020-11-13 11:28:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'KayKen Ltd','kabaka.jpeg','0726183050','info@kayken.rw','Telecom house','123:1245',11091,'MTIzNDU=','www.kayken.rw','approved','2020-03-13 18:11:29'),(2,'KayKen Ltd','asua.png','0726183040','info@kayken.org','Telecom house','123:1245',110910,'MTIzNDU=','www.kayken.rw','rejected','2020-03-13 18:19:34'),(3,'KayKen Ltd','','0726183049','info@kayken.com','Telecom house','123:1245',110911,'MTIzNDU=','www.kayken.rw','approved','2020-03-13 18:20:05'),(4,'Imenye ltd','','072345689','info@imenye.rw','Telecom house','12:34',12934,'MTIwODk5','www.imenye.rw','approved','2020-06-29 12:59:29'),(5,'Aquasafi','','0783454433','info@aqua.rw','Kigali,Rwanda','23:56',123432,'MTI0NTc4','www.aquasafi.rw','deleted','2020-06-30 07:54:58'),(6,'Inyarwanda Ltd','','0789122332','inyarwanda@info.rw','Kigali,Rwanda','12:34',123543,'MTIzNDU=','www.inyarwanda.com','pending','2020-06-30 11:37:00'),(7,'Igihe ltd','asua.png','078943342','mnzir@igihe.rw','Kigali,Rwanda','12:90',12343,'MTAxMg==','www.igihe.rw','pending','2020-06-30 12:20:08'),(8,'Kajaasi','family pic.jpeg','0784534456','kajasssa@info.rw','Kigali,Rwanda','12:78',334334,'MTIzNDU=','www.inyarwanda.rw','pending','2020-06-30 12:49:17'),(9,'Seveeen Ltd','SOSOMA.jpeg','0785653123','kk@rw.com','kk50st','12',123456789,'MTIzNDU=','seveeen.rw','approved','2020-11-12 10:21:02'),(10,'koraa','SOSOMA.jpeg','0786601223','kora@gmail.com','kigali','',111111111,'MTIxMg==','www.kora.gov.rw','approved','2020-11-13 09:28:45');
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
  `status` enum('pending','open','closed','deleted') DEFAULT 'pending',
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`internship_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `company_internship_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_internship`
--

LOCK TABLES `company_internship` WRITE;
/*!40000 ALTER TABLE `company_internship` DISABLE KEYS */;
INSERT INTO `company_internship` VALUES (1,'HR','For students','Local students','2020-05-04','2020-06-30',4,'2020-03-04','2020-10-30',15,6,'open','2020-03-13 20:59:47'),(2,'Secretariat','Writing and translating','fluent in english and french','2020-07-15','2020-07-30',5,'2020-07-01','2020-11-14',30,1,'pending','2020-06-30 21:30:01'),(3,'IT','Software maintenance','Antivirus installation,data recovery and OS Upgrade','2020-07-01','2020-07-06',1,'2020-07-10','2020-11-15',12,6,'pending','2020-06-30 21:31:25'),(4,'IT','Software maintenance','Antivirus installation,data recovery and OS Upgrade','2020-07-01','2020-07-06',1,'2020-07-10','2020-11-15',12,1,'pending','2020-06-30 21:32:02'),(5,'IT','Software maintenance','Antivirus installation,data recovery and OS Upgrade','2020-07-01','2020-07-06',1,'2020-07-10','2020-11-15',12,1,'pending','2020-06-30 21:32:12'),(6,'IT','Software maintenance','Antivirus installation,data recovery and OS Upgrade','2020-07-01','2020-07-06',1,'2020-07-10','2020-11-15',12,1,'pending','2020-06-30 21:32:29'),(7,'IT','Software maintenance','Antivirus installation,data recovery and OS Upgrade','2020-07-01','2020-07-06',1,'2020-07-10','2020-11-15',12,1,'pending','2020-06-30 21:32:39'),(8,'Data management','data entry','Typing skills','2020-07-31','2020-08-19',5,'2020-07-02','2020-11-11',72,1,'pending','2020-06-30 21:33:37'),(9,'Data management','data entry','Typing skills','2020-07-31','2020-08-19',5,'2020-07-02','2020-11-11',72,6,'pending','2020-06-30 21:33:53'),(10,'Data management','data entry','Typing skills','2020-07-31','2020-08-19',5,'2020-07-02','2020-11-11',72,1,'pending','2020-06-30 21:34:49'),(11,'Engineering',' Data entry','Bachelor degree in Information communication technology','2020-07-30','2020-08-07',15,'2020-07-22','2020-11-28',30,3,'pending','2020-07-22 11:50:09'),(12,'HR','Hiring management','Learning human resource in university','2020-08-01','2020-08-08',1,'2020-08-01','2020-12-05',3,3,'deleted','2020-07-23 20:35:50'),(13,'Agriculture','  crops productions','every one','2020-11-05','2020-11-05',2,'2020-10-27','2020-11-19',3,10,'pending','2020-11-13 09:35:08');
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

-- Dump completed on 2020-11-13 11:31:05
