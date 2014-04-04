CREATE DATABASE  IF NOT EXISTS `mbeguhal_flip_all` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mbeguhal_flip_all`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: mbeguhal_flip_all
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `FK302BCFE8705BFDF` (`added_by`),
  KEY `FK302BCFE6175C416` (`edited_by`),
  CONSTRAINT `FK302BCFE6175C416` FOREIGN KEY (`edited_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK302BCFE8705BFDF` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'2014-04-04','Animals & Pets',NULL,1,NULL),(2,'2014-04-04','Art and Photography',NULL,1,NULL),(3,'2014-04-04','Auto and Cycles',NULL,1,NULL),(4,'2014-04-04','Business and Finance',NULL,1,NULL),(5,'2014-04-04','Children',NULL,1,NULL),(6,'2014-04-04','Computers and Electronics',NULL,1,NULL),(7,'2014-04-04','Cooking, Food and Beverages',NULL,1,NULL),(8,'2014-04-04','Crafts',NULL,1,NULL),(9,'2014-04-04','Education',NULL,1,NULL),(10,'2014-04-04','Enrichment',NULL,1,NULL),(11,'2014-04-04','Entertainment and TV',NULL,1,NULL),(12,'2014-04-04','Ethnic',NULL,1,NULL),(13,'2014-04-04','Fashion and style',NULL,1,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_role`
--

DROP TABLE IF EXISTS `group_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_role` (
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `FK4C707A3622476622` (`role_id`),
  KEY `FK4C707A3642194AEE` (`group_id`),
  CONSTRAINT `FK4C707A3622476622` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `FK4C707A3642194AEE` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_role`
--

LOCK TABLES `group_role` WRITE;
/*!40000 ALTER TABLE `group_role` DISABLE KEYS */;
INSERT INTO `group_role` VALUES (3,18),(3,21),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(2,15),(2,16),(2,17),(2,18),(2,19),(2,20),(2,21),(2,22);
/*!40000 ALTER TABLE `group_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `group_desc` varchar(80) DEFAULT NULL,
  `group_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'2014-04-04','2014-04-04','has all system permissions','administrator'),(2,'2014-04-04','2014-04-04','has full rights of publishers','publisher'),(3,'2014-04-04',NULL,'can manage own read magazines','reader');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_pages`
--

DROP TABLE IF EXISTS `issue_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_pages` (
  `issue_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_image` text,
  `page_no` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_page_id`),
  KEY `FK6ABC34DECA89C4EE` (`issue_id`),
  CONSTRAINT `FK6ABC34DECA89C4EE` FOREIGN KEY (`issue_id`) REFERENCES `mag_issues` (`issue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_pages`
--

LOCK TABLES `issue_pages` WRITE;
/*!40000 ALTER TABLE `issue_pages` DISABLE KEYS */;
INSERT INTO `issue_pages` VALUES (1,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-0.jpg',1,1),(2,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-1.jpg',2,1),(3,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-10.jpg',3,1),(4,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-100.jpg',4,1),(5,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-101.jpg',5,1),(6,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-102.jpg',6,1),(7,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-103.jpg',7,1),(8,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-104.jpg',8,1),(9,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-105.jpg',9,1),(10,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-106.jpg',10,1),(11,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-107.jpg',11,1),(12,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-108.jpg',12,1),(13,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-109.jpg',13,1),(14,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-11.jpg',14,1),(15,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-110.jpg',15,1),(16,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-111.jpg',16,1),(17,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-112.jpg',17,1),(18,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-113.jpg',18,1),(19,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-114.jpg',19,1),(20,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-115.jpg',20,1),(21,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-116.jpg',21,1),(22,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-117.jpg',22,1),(23,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-118.jpg',23,1),(24,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-119.jpg',24,1),(25,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-12.jpg',25,1),(26,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-120.jpg',26,1),(27,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-121.jpg',27,1),(28,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-122.jpg',28,1),(29,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-123.jpg',29,1),(30,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-124.jpg',30,1),(31,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-125.jpg',31,1),(32,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-126.jpg',32,1),(33,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-127.jpg',33,1),(34,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-128.jpg',34,1),(35,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-129.jpg',35,1),(36,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-13.jpg',36,1),(37,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-130.jpg',37,1),(38,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-131.jpg',38,1),(39,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-132.jpg',39,1),(40,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-133.jpg',40,1),(41,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-134.jpg',41,1),(42,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-135.jpg',42,1),(43,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-136.jpg',43,1),(44,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-137.jpg',44,1),(45,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-138.jpg',45,1),(46,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-139.jpg',46,1),(47,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-14.jpg',47,1),(48,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-15.jpg',48,1),(49,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-16.jpg',49,1),(50,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-17.jpg',50,1),(51,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-18.jpg',51,1),(52,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-19.jpg',52,1),(53,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-2.jpg',53,1),(54,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-20.jpg',54,1),(55,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-21.jpg',55,1),(56,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-22.jpg',56,1),(57,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-23.jpg',57,1),(58,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-24.jpg',58,1),(59,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-25.jpg',59,1),(60,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-26.jpg',60,1),(61,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-27.jpg',61,1),(62,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-28.jpg',62,1),(63,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-29.jpg',63,1),(64,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-3.jpg',64,1),(65,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-30.jpg',65,1),(66,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-31.jpg',66,1),(67,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-32.jpg',67,1),(68,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-33.jpg',68,1),(69,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-34.jpg',69,1),(70,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-35.jpg',70,1),(71,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-36.jpg',71,1),(72,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-37.jpg',72,1),(73,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-38.jpg',73,1),(74,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-39.jpg',74,1),(75,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-4.jpg',75,1),(76,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-40.jpg',76,1),(77,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-41.jpg',77,1),(78,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-42.jpg',78,1),(79,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-43.jpg',79,1),(80,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-44.jpg',80,1),(81,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-45.jpg',81,1),(82,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-46.jpg',82,1),(83,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-47.jpg',83,1),(84,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-48.jpg',84,1),(85,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-49.jpg',85,1),(86,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-5.jpg',86,1),(87,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-50.jpg',87,1),(88,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-51.jpg',88,1),(89,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-52.jpg',89,1),(90,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-53.jpg',90,1),(91,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-54.jpg',91,1),(92,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-55.jpg',92,1),(93,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-56.jpg',93,1),(94,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-57.jpg',94,1),(95,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-58.jpg',95,1),(96,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-59.jpg',96,1),(97,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-6.jpg',97,1),(98,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-60.jpg',98,1),(99,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-61.jpg',99,1),(100,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-62.jpg',100,1),(101,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-63.jpg',101,1),(102,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-64.jpg',102,1),(103,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-65.jpg',103,1),(104,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-66.jpg',104,1),(105,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-67.jpg',105,1),(106,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-68.jpg',106,1),(107,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-69.jpg',107,1),(108,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-7.jpg',108,1),(109,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-70.jpg',109,1),(110,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-71.jpg',110,1),(111,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-72.jpg',111,1),(112,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-73.jpg',112,1),(113,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-74.jpg',113,1),(114,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-75.jpg',114,1),(115,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-76.jpg',115,1),(116,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-77.jpg',116,1),(117,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-78.jpg',117,1),(118,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-79.jpg',118,1),(119,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-8.jpg',119,1),(120,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-80.jpg',120,1),(121,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-81.jpg',121,1),(122,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-82.jpg',122,1),(123,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-83.jpg',123,1),(124,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-84.jpg',124,1),(125,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-85.jpg',125,1),(126,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-86.jpg',126,1),(127,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-87.jpg',127,1),(128,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-88.jpg',128,1),(129,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-89.jpg',129,1),(130,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-9.jpg',130,1),(131,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-90.jpg',131,1),(132,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-91.jpg',132,1),(133,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-92.jpg',133,1),(134,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-93.jpg',134,1),(135,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-94.jpg',135,1),(136,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-95.jpg',136,1),(137,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-96.jpg',137,1),(138,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-97.jpg',138,1),(139,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-98.jpg',139,1),(140,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-99.jpg',140,1);
/*!40000 ALTER TABLE `issue_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mag_issues`
--

DROP TABLE IF EXISTS `mag_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mag_issues` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_publish_status` int(11) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `published_on` date DEFAULT NULL,
  `admin_publish_on` date DEFAULT NULL,
  `suppressed_on` date DEFAULT NULL,
  `description` text,
  `edited_on` date DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `issue_no` int(11) DEFAULT NULL,
  `issue_url` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `admin_publish_id` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `magazine_id` int(11) DEFAULT NULL,
  `issue_published_by` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `issue_suppressed_by` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `FK57F3B72642ACD9D7` (`issue_published_by`),
  KEY `FK57F3B726632AD124` (`admin_publish_id`),
  KEY `FK57F3B72699F83FB9` (`magazine_id`),
  KEY `FK57F3B7268705BFDF` (`added_by`),
  KEY `FK57F3B726BD160EB9` (`status_id`),
  KEY `FK57F3B7263695F86D` (`status_id`),
  KEY `FK57F3B7264E98C965` (`issue_suppressed_by`),
  KEY `FK57F3B7266175C416` (`edited_by`),
  KEY `FK57F3B7261C8405F8` (`tag_id`),
  CONSTRAINT `FK57F3B7261C8405F8` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  CONSTRAINT `FK57F3B7263695F86D` FOREIGN KEY (`status_id`) REFERENCES `mag_status` (`status_id`),
  CONSTRAINT `FK57F3B72642ACD9D7` FOREIGN KEY (`issue_published_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK57F3B7264E98C965` FOREIGN KEY (`issue_suppressed_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK57F3B7266175C416` FOREIGN KEY (`edited_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK57F3B726632AD124` FOREIGN KEY (`admin_publish_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK57F3B7268705BFDF` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK57F3B72699F83FB9` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`magazine_id`),
  CONSTRAINT `FK57F3B726BD160EB9` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mag_issues`
--

LOCK TABLES `mag_issues` WRITE;
/*!40000 ALTER TABLE `mag_issues` DISABLE KEYS */;
INSERT INTO `mag_issues` VALUES (1,0,'2014-04-04','2014-04-03','2014-04-04',NULL,NULL,'The essential tech, talent and cutting-edge gear igniting your world right now',NULL,'jarida_1.pdf','HOT 100',1,'http://localhost/jarida/mag_issues/jarida_1.pdf',2.1,'http://localhost/jarida/mag_issues/jarida_1/jarida_1-0.jpg',2,NULL,NULL,2,2,1,NULL,5);
/*!40000 ALTER TABLE `mag_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mag_status`
--

DROP TABLE IF EXISTS `mag_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mag_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mag_status`
--

LOCK TABLES `mag_status` WRITE;
/*!40000 ALTER TABLE `mag_status` DISABLE KEYS */;
INSERT INTO `mag_status` VALUES (1,'published'),(2,'un published');
/*!40000 ALTER TABLE `mag_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `magazine` (
  `magazine_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `magazine_desc` varchar(255) DEFAULT NULL,
  `magazine_name` varchar(50) DEFAULT NULL,
  `published_on` date DEFAULT NULL,
  `suppressed_on` date DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `published_by` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `suppressed_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`magazine_id`),
  KEY `FKFB6FAB9481C51EF4` (`publisher_id`),
  KEY `FKFB6FAB948705BFDF` (`added_by`),
  KEY `FKFB6FAB94619A3031` (`published_by`),
  KEY `FKFB6FAB941502CF79` (`category_id`),
  KEY `FKFB6FAB94BD160EB9` (`status_id`),
  KEY `FKFB6FAB943695F86D` (`status_id`),
  KEY `FKFB6FAB946175C416` (`edited_by`),
  KEY `FKFB6FAB94D563E4B` (`suppressed_by`),
  CONSTRAINT `FKFB6FAB941502CF79` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  CONSTRAINT `FKFB6FAB943695F86D` FOREIGN KEY (`status_id`) REFERENCES `mag_status` (`status_id`),
  CONSTRAINT `FKFB6FAB946175C416` FOREIGN KEY (`edited_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FKFB6FAB94619A3031` FOREIGN KEY (`published_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FKFB6FAB9481C51EF4` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`),
  CONSTRAINT `FKFB6FAB948705BFDF` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FKFB6FAB94BD160EB9` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `FKFB6FAB94D563E4B` FOREIGN KEY (`suppressed_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazine`
--

LOCK TABLES `magazine` WRITE;
/*!40000 ALTER TABLE `magazine` DISABLE KEYS */;
INSERT INTO `magazine` VALUES (2,'2014-04-04',NULL,'Jarida magazine is a magazine that focuses on entertainment and TV.','jarida','2014-04-04',NULL,2,11,NULL,2,2,1,NULL);
/*!40000 ALTER TABLE `magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationality` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationality`
--

LOCK TABLES `nationality` WRITE;
/*!40000 ALTER TABLE `nationality` DISABLE KEYS */;
INSERT INTO `nationality` VALUES (1,'2044-04-04','Kenya'),(2,'2044-04-04','Uganda'),(3,'2044-04-04','Tanzania'),(4,'2044-04-04','Sudan'),(5,'2044-04-04','Rwanda'),(6,'2044-04-04','Burundi'),(7,'2044-04-04','Germany');
/*!40000 ALTER TABLE `nationality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticeboard` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `notice_details` varchar(255) DEFAULT NULL,
  `notice_title` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `FKD775DF0E8705BFDF` (`added_by`),
  KEY `FKD775DF0E6175C416` (`edited_by`),
  CONSTRAINT `FKD775DF0E6175C416` FOREIGN KEY (`edited_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FKD775DF0E8705BFDF` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticeboard`
--

LOCK TABLES `noticeboard` WRITE;
/*!40000 ALTER TABLE `noticeboard` DISABLE KEYS */;
INSERT INTO `noticeboard` VALUES (1,'2014-04-04','2014-04-07','12:00:00',NULL,'This is the day that flip all first prototype will be launched for demo purposes','Flip all first demo',1,NULL);
/*!40000 ALTER TABLE `noticeboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `permission_desc` varchar(80) DEFAULT NULL,
  `permission_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'2014-04-04',NULL,'can view all permissions','view permissions'),(2,'2014-04-04',NULL,'can add a permission','add permission'),(3,'2014-04-04',NULL,'can edit permissions','edit permission'),(4,'2014-04-04',NULL,'can delete permissions','delete permission'),(5,'2014-04-04',NULL,'can view roles','view roles'),(6,'2014-04-04',NULL,'can add roles','add role'),(7,'2014-04-04',NULL,'can edit roles','edit role'),(8,'2014-04-04',NULL,'can delete roles','delete role'),(9,'2014-04-04',NULL,'can view user groups','view user group'),(10,'2014-04-04',NULL,'can add user groups','add user group'),(11,'2014-04-04',NULL,'can edit user groups','edit user group'),(12,'2014-04-04',NULL,'can delete user groups','delete user group'),(13,'2014-04-04',NULL,'can view noticeboards','view noticeboard'),(14,'2014-04-04',NULL,'can add a notice','add notice'),(15,'2014-04-04',NULL,'can edit notices','edit notice'),(16,'2014-04-04',NULL,'can delete notices','delete notice'),(17,'2014-04-04',NULL,'can view salutations','view salutation'),(18,'2014-04-04',NULL,'can add salutations','add salutation'),(19,'2014-04-04',NULL,'can edit salutations','edit salutation'),(20,'2014-04-04',NULL,'delete salutations','delete salutation'),(21,'2014-04-04',NULL,'can view magazine category','view mag category'),(22,'2014-04-04',NULL,'can add mag category','add mag category'),(23,'2014-04-04',NULL,'can edit mag category','edit mag category'),(24,'2014-04-04',NULL,'can delete mag category','delete mag category'),(25,'2014-04-04','2014-04-04','can view magazine tags','view magazine tags'),(26,'2014-04-04','2014-04-04','can add magazine tags','add magazine tags'),(27,'2014-04-04','2014-04-04','can edit magazine tags','edit magazine tag'),(28,'2014-04-04','2014-04-04','can delete magazine tags','delete magazine tags'),(29,'2014-04-04',NULL,'can view users','view users'),(30,'2014-04-04',NULL,'can add users','add users'),(31,'2014-04-04',NULL,'can edit users information','edit users'),(32,'2014-04-04','2014-04-04','can delete a user from the system','delete users'),(33,'2014-04-04',NULL,'can view publishers information','view publishers'),(34,'2014-04-04',NULL,'can add publishers to the system','add publishers'),(35,'2014-04-04',NULL,'can edit publishers information','edit publishers'),(36,'2014-04-04',NULL,'can delete publishers from the system','delete publishers'),(37,'2014-04-04',NULL,'can perform system data backup','data backup'),(38,'2014-04-04',NULL,'can view publishers report','view publishers report'),(39,'2014-04-04',NULL,'can print publishers report','print publishers report'),(40,'2014-04-04',NULL,'can view users reports','view users reports'),(41,'2014-04-04',NULL,'can print users reports','print users reports'),(42,'2014-04-04',NULL,'can view magazine reports','view magazine reports'),(43,'2014-04-04',NULL,'can print magazine reports','print magazine reports'),(44,'2014-04-04',NULL,'can view magazine issues reports','view magazine issues reports'),(45,'2014-04-04',NULL,'can print magazine issues reports','print magazine issues reports'),(46,'2014-04-04',NULL,'manage own profile','manage my profile'),(47,'2014-04-04',NULL,'can view magazines','view magazines'),(48,'2014-04-04',NULL,'can add a magazine to the system','add magazine'),(49,'2014-04-04',NULL,'can edit a magazine information','edit magazine'),(50,'2014-04-04',NULL,'can delete a magazine from the system','delete magazine'),(51,'2014-04-04',NULL,'can view magazine issue','view issues'),(52,'2014-04-04',NULL,'can add a magazine issue','add issue'),(53,'2014-04-04',NULL,'can edit magazine issue information','edit issue'),(54,'2014-04-04',NULL,'can delete issue information from the system','delete issue'),(55,'2014-04-04',NULL,'can read magazine issue','read magazine'),(56,'2014-04-04',NULL,'can grant permissions to users','grant permissions');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `box_number` varchar(10) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `physical_location` varchar(255) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `publisher_name` varchar(100) DEFAULT NULL,
  `contact_person` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `FK5645A1FCBD160EB9` (`status_id`),
  KEY `FK5645A1FCB893603D` (`contact_person`),
  CONSTRAINT `FK5645A1FCB893603D` FOREIGN KEY (`contact_person`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK5645A1FCBD160EB9` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (2,'1234','info@jarida.com','0200824356','Kenya','0618','Jarida publishers',2,1);
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  KEY `FKEAD9D23B22476622` (`role_id`),
  KEY `FKEAD9D23B331B2F30` (`permission_id`),
  CONSTRAINT `FKEAD9D23B22476622` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `FKEAD9D23B331B2F30` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (6,38),(6,40),(6,42),(6,44),(7,39),(7,41),(7,43),(7,45),(8,1),(8,2),(8,3),(8,4),(9,5),(9,6),(9,7),(9,8),(10,9),(10,10),(10,11),(10,12),(11,13),(11,14),(11,15),(11,16),(12,17),(12,18),(12,19),(12,20),(13,21),(13,22),(13,23),(13,24),(14,25),(14,26),(14,27),(14,28),(15,29),(15,30),(15,31),(15,32),(16,33),(16,34),(16,35),(16,36),(17,38),(17,39),(17,40),(17,41),(17,42),(17,43),(17,44),(17,45),(18,46),(19,47),(19,48),(19,49),(19,50),(20,51),(20,52),(20,53),(20,54),(20,55),(2,1),(2,5),(2,9),(2,13),(2,17),(2,21),(2,25),(2,29),(2,33),(2,38),(2,40),(2,42),(2,44),(2,47),(2,51),(3,2),(3,6),(3,10),(3,14),(3,18),(3,22),(3,26),(3,30),(3,34),(3,48),(3,52),(4,3),(4,7),(4,11),(4,15),(4,19),(4,23),(4,27),(4,31),(4,35),(4,49),(4,53),(5,4),(5,8),(5,12),(5,16),(5,20),(5,24),(5,28),(5,32),(5,36),(5,50),(5,54),(21,47),(21,51),(21,55),(22,29),(22,30),(22,31),(22,56);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `role_desc` varchar(80) DEFAULT NULL,
  `role_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'2014-04-04','2014-04-04','can view all data in the system','view all'),(3,'2014-04-04','2014-04-04','can add any record to the system','add all'),(4,'2014-04-04','2014-04-04','can edit all information in the system','edit all'),(5,'2014-04-04','2014-04-04','can delete any information in the system','delete all'),(6,'2014-04-04',NULL,'can view all reports in the system','view reports'),(7,'2014-04-04',NULL,'can print all reports in the system','print all reports'),(8,'2014-04-04',NULL,'can manage permissions','manage permissions'),(9,'2014-04-04',NULL,'can view, add, edit, delete roles','manage roles'),(10,'2014-04-04',NULL,'can view, add, edit, delete user groups','manage user groups'),(11,'2014-04-04',NULL,'can view, add, edit, delete notices','manage notices'),(12,'2014-04-04',NULL,'can view, add, edit, delete salutations','manage salutation'),(13,'2014-04-04',NULL,'can view, add, edit, delete magazine category','manage magazine category'),(14,'2014-04-04',NULL,'can view, add, edit, delete magazine tags','manage magazine tags'),(15,'2014-04-04',NULL,'can view, add, edit, delete users','manage users'),(16,'2014-04-04',NULL,'can view, add, edit, delete publishers','manage publishers'),(17,'2014-04-04',NULL,'can view and print all reports','manage reports'),(18,'2014-04-04',NULL,'can manage own profile','manage profile'),(19,'2014-04-04',NULL,'can view, add, edit, delete magazine information','manage magazine'),(20,'2014-04-04',NULL,'can view, add, edit and delete magazine issue info','manage magazine issue'),(21,'2014-04-04',NULL,'can view magazine details and read an issue','read issue'),(22,'2014-04-04','2014-04-04','can grant permissions to users','grant permissions');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salutation`
--

DROP TABLE IF EXISTS `salutation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salutation` (
  `salutation_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(10) DEFAULT NULL,
  `salutation_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`salutation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salutation`
--

LOCK TABLES `salutation` WRITE;
/*!40000 ALTER TABLE `salutation` DISABLE KEYS */;
INSERT INTO `salutation` VALUES (1,'mr.','Mister'),(2,'miss','Miss'),(3,'mrs.','Mrs'),(4,'eng','engineer'),(5,'dr.','doctor');
/*!40000 ALTER TABLE `salutation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sex` (
  `sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex`
--

LOCK TABLES `sex` WRITE;
/*!40000 ALTER TABLE `sex` DISABLE KEYS */;
INSERT INTO `sex` VALUES (1,'2044-04-04','male'),(2,'2044-04-04','female');
/*!40000 ALTER TABLE `sex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'active'),(2,'in active');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `tag_name` varchar(50) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `FK1BF9A8705BFDF` (`added_by`),
  KEY `FK1BF9A6175C416` (`edited_by`),
  CONSTRAINT `FK1BF9A6175C416` FOREIGN KEY (`edited_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK1BF9A8705BFDF` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'2014-04-04',NULL,'birds',1,NULL),(2,'2014-04-04',NULL,'dogs',1,NULL),(3,'2014-04-04',NULL,'celebrity',1,NULL),(4,'2014-04-04',NULL,'gaming',1,NULL),(5,'2014-04-04',NULL,'music entertainment',1,NULL),(6,'2014-04-04',NULL,'other entertainment',1,NULL),(7,'2014-04-04',NULL,'TV and Movie',1,NULL);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_on` date DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `edited_on` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `other_names` varchar(50) DEFAULT NULL,
  `password` varchar(48) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `residence` varchar(50) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `salutation_id` int(11) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK6A68E084E225D5B` (`nationality_id`),
  KEY `FK6A68E0881C51EF4` (`publisher_id`),
  KEY `FK6A68E082FBA961B` (`sex_id`),
  KEY `FK6A68E08BD160EB9` (`status_id`),
  KEY `FK6A68E08F7165D79` (`salutation_id`),
  CONSTRAINT `FK6A68E082FBA961B` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`sex_id`),
  CONSTRAINT `FK6A68E084E225D5B` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`nationality_id`),
  CONSTRAINT `FK6A68E0881C51EF4` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`),
  CONSTRAINT `FK6A68E08BD160EB9` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `FK6A68E08F7165D79` FOREIGN KEY (`salutation_id`) REFERENCES `salutation` (`salutation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'2014-04-04','NAIROBI',NULL,'fenicfelix@gmail.com','Felix Ogucha','d033e22ae348aeb5660fc2140aec35850c4da997','254723293349','Kasarani','Nyabwari','fenicfelix',1,NULL,1,1,1),(2,'2014-04-04','NAIROBI',NULL,'kabocha@gmail.com','Byron Kamau','8cb2237d0679ca88db6464eac60da96345513964','0725363782','Kinoo','Kabocha','kabocha',1,2,1,1,1),(3,'2014-04-04','Kisumu',NULL,'lucyanyango@gmail.com','Lucy Anyango','6a904b7425ffb694413416b7174ad14fba26a94d','0908973450','Gem','Otieno','anyangol',1,NULL,2,2,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  KEY `FKD034EFEBC79CBDF8` (`user_id`),
  KEY `FKD034EFEB42194AEE` (`group_id`),
  CONSTRAINT `FKD034EFEB42194AEE` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  CONSTRAINT `FKD034EFEBC79CBDF8` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_publishers`
--

DROP TABLE IF EXISTS `view_publishers`;
/*!50001 DROP VIEW IF EXISTS `view_publishers`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_publishers` (
  `publisher_Id` tinyint NOT NULL,
  `publisher_name` tinyint NOT NULL,
  `box_number` tinyint NOT NULL,
  `postal_code` tinyint NOT NULL,
  `publisher_email` tinyint NOT NULL,
  `publisher_phone` tinyint NOT NULL,
  `physical_location` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `contact_person` tinyint NOT NULL,
  `surname` tinyint NOT NULL,
  `other_names` tinyint NOT NULL,
  `person_phone` tinyint NOT NULL,
  `person_email` tinyint NOT NULL,
  `salutation` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `viewallissues`
--

DROP TABLE IF EXISTS `viewallissues`;
/*!50001 DROP VIEW IF EXISTS `viewallissues`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `viewallissues` (
  `issue_id` tinyint NOT NULL,
  `added_on` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `headline` tinyint NOT NULL,
  `issue_no` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `title_image` tinyint NOT NULL,
  `added_by` tinyint NOT NULL,
  `magazine_id` tinyint NOT NULL,
  `magazine_name` tinyint NOT NULL,
  `status_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `tag_id` tinyint NOT NULL,
  `tag_name` tinyint NOT NULL,
  `published_by` tinyint NOT NULL,
  `suppressed_by` tinyint NOT NULL,
  `created_on` tinyint NOT NULL,
  `published_on` tinyint NOT NULL,
  `suppressed_on` tinyint NOT NULL,
  `issue_url` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `viewallusers`
--

DROP TABLE IF EXISTS `viewallusers`;
/*!50001 DROP VIEW IF EXISTS `viewallusers`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `viewallusers` (
  `user_id` tinyint NOT NULL,
  `city` tinyint NOT NULL,
  `added_on` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `other_names` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `phone_number` tinyint NOT NULL,
  `password` tinyint NOT NULL,
  `residence` tinyint NOT NULL,
  `publisher_id` tinyint NOT NULL,
  `surname` tinyint NOT NULL,
  `nationality` tinyint NOT NULL,
  `sex` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `salutation` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `viewmagazines`
--

DROP TABLE IF EXISTS `viewmagazines`;
/*!50001 DROP VIEW IF EXISTS `viewmagazines`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `viewmagazines` (
  `magazine_id` tinyint NOT NULL,
  `added_on` tinyint NOT NULL,
  `magazine_name` tinyint NOT NULL,
  `magazine_desc` tinyint NOT NULL,
  `published_on` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `category` tinyint NOT NULL,
  `publisher_name` tinyint NOT NULL,
  `no_of_issues` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `user_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_publishers`
--

/*!50001 DROP TABLE IF EXISTS `view_publishers`*/;
/*!50001 DROP VIEW IF EXISTS `view_publishers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_publishers` AS select `a`.`publisher_id` AS `publisher_Id`,`a`.`publisher_name` AS `publisher_name`,`a`.`box_number` AS `box_number`,`a`.`postal_code` AS `postal_code`,`a`.`email_address` AS `publisher_email`,`a`.`phone_number` AS `publisher_phone`,`a`.`physical_location` AS `physical_location`,`b`.`status` AS `status`,`c`.`user_id` AS `contact_person`,`c`.`surname` AS `surname`,`c`.`other_names` AS `other_names`,`c`.`phone_number` AS `person_phone`,`c`.`email` AS `person_email`,`d`.`salutation` AS `salutation` from (((`publisher` `a` join `status` `b` on((`a`.`status_id` = `b`.`status_id`))) join `users` `c` on((`a`.`contact_person` = `c`.`user_id`))) join `salutation` `d` on((`c`.`salutation_id` = `d`.`salutation_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `viewallissues`
--

/*!50001 DROP TABLE IF EXISTS `viewallissues`*/;
/*!50001 DROP VIEW IF EXISTS `viewallissues`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `viewallissues` AS select `a`.`issue_id` AS `issue_id`,`a`.`added_on` AS `added_on`,`a`.`description` AS `description`,`a`.`headline` AS `headline`,`a`.`issue_no` AS `issue_no`,`a`.`price` AS `price`,`a`.`title_image` AS `title_image`,`a`.`added_by` AS `added_by`,`a`.`magazine_id` AS `magazine_id`,`c`.`magazine_name` AS `magazine_name`,`a`.`status_id` AS `status_id`,`d`.`status` AS `status`,`a`.`tag_id` AS `tag_id`,`e`.`tag_name` AS `tag_name`,`a`.`issue_published_by` AS `published_by`,`a`.`issue_suppressed_by` AS `suppressed_by`,`a`.`created_on` AS `created_on`,`a`.`published_on` AS `published_on`,`a`.`suppressed_on` AS `suppressed_on`,`a`.`issue_url` AS `issue_url` from (((`mag_issues` `a` join `magazine` `c` on((`a`.`magazine_id` = `c`.`magazine_id`))) join `mag_status` `d` on((`a`.`status_id` = `d`.`status_id`))) join `tag` `e` on((`a`.`tag_id` = `e`.`tag_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `viewallusers`
--

/*!50001 DROP TABLE IF EXISTS `viewallusers`*/;
/*!50001 DROP VIEW IF EXISTS `viewallusers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `viewallusers` AS select `a`.`user_id` AS `user_id`,`a`.`city` AS `city`,`a`.`added_on` AS `added_on`,`a`.`email` AS `email`,`a`.`other_names` AS `other_names`,`a`.`username` AS `username`,`a`.`phone_number` AS `phone_number`,`a`.`password` AS `password`,`a`.`residence` AS `residence`,`a`.`publisher_id` AS `publisher_id`,`a`.`surname` AS `surname`,`b`.`nationality` AS `nationality`,`c`.`sex` AS `sex`,`d`.`status` AS `status`,`e`.`salutation` AS `salutation` from ((((`users` `a` join `nationality` `b` on((`a`.`nationality_id` = `b`.`nationality_id`))) join `sex` `c` on((`a`.`sex_id` = `c`.`sex_id`))) join `salutation` `e` on((`a`.`salutation_id` = `e`.`salutation_id`))) join `status` `d` on((`a`.`status_id` = `d`.`status_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `viewmagazines`
--

/*!50001 DROP TABLE IF EXISTS `viewmagazines`*/;
/*!50001 DROP VIEW IF EXISTS `viewmagazines`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `viewmagazines` AS select `a`.`magazine_id` AS `magazine_id`,`a`.`added_on` AS `added_on`,`a`.`magazine_name` AS `magazine_name`,`a`.`magazine_desc` AS `magazine_desc`,`a`.`published_on` AS `published_on`,`b`.`category_id` AS `category_id`,`b`.`category` AS `category`,`c`.`publisher_name` AS `publisher_name`,(select count(0) from (`mag_issues` `p` join `magazine` `s` on((`p`.`magazine_id` = `s`.`magazine_id`))) where (`p`.`magazine_id` = `a`.`magazine_id`)) AS `no_of_issues`,`d`.`status` AS `status`,`e`.`user_id` AS `user_id` from ((((`magazine` `a` join `category` `b` on((`a`.`category_id` = `b`.`category_id`))) join `publisher` `c` on((`a`.`publisher_id` = `c`.`publisher_id`))) join `mag_status` `d` on((`a`.`status_id` = `d`.`status_id`))) join `users` `e` on((`e`.`publisher_id` = `c`.`publisher_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-04 15:54:05
