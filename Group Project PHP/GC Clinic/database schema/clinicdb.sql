-- MySQL dump 10.13  Distrib 5.7.17, for osx10.12 (x86_64)
--
-- Host: localhost    Database: clinicdb
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `Login`
--

DROP TABLE IF EXISTS `Login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Login` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Login`
--

LOCK TABLES `Login` WRITE;
/*!40000 ALTER TABLE `Login` DISABLE KEYS */;
INSERT INTO `Login` VALUES ('Noman Sanaullah','nomansanaullah1@gmail.com','$2y$10$d0dh8GDNlPsuTfNhL50wCeRomfrXi0uEKAA.pO3aSWPi8jtea6GWy','735b90b4568125ed6c3f678819b6e058','admin',1),('Locke Lamora','unknown.rebellion1@gmail.com','$2y$10$ZOt..HDw48bZQBG1vg5Y0uAS4Dn3kt3TFlk8rIJhb2YqW6O0A.h1W','c4b31ce7d95c75ca70d50c19aef08bf1','client',1),('Noman Sanaullah','asd@asd.com','$2y$10$r4yiSBH88mlXnadwCJogGu0vM8UarxChEQdFeQ3oFwkdq.l0QOmSu','a3c65c2974270fd093ee8a9bf8ae7d0b','client',0),('Danish Ali','dan@gmail.com','$2y$10$0u.EjoPmdrswz8E7XaOiIuADRJS5lrcsIi13QwvL2qI7hUcYLtAca','0','staff',1),('Gurcharan Singh','gurcharan.singh6662@gmail.com','$2y$10$FZNqnGYa3o4Ef6Rl/c1USOhKMCUu86r4jXa29csZglYSbc1/WYMk2','52720e003547c70561bf5e03b95aa99f','client',1),('Jean Tannen','jean@gmail.com','$2y$10$1cF0X4Mx6.xn/QMNT.VvIuZhiaSJCrz3uXMXT2E8CT8.hka/T8CQ2','bbf94b34eb32268ada57a3be5062fe7d','client',0),('Saujan','saujan@gmail.com','$2y$10$Tq.YBCLlBNdZuhJN1QOPeeI5eEOFWSM6qT/ULuujHjbI8Hcxf2S6G','0','staff',1);
/*!40000 ALTER TABLE `Login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Staff_Signup`
--

DROP TABLE IF EXISTS `Staff_Signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Staff_Signup` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `Staffname` varchar(50) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `position` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Staff_Signup`
--

LOCK TABLES `Staff_Signup` WRITE;
/*!40000 ALTER TABLE `Staff_Signup` DISABLE KEYS */;
INSERT INTO `Staff_Signup` VALUES (4,'Danish Ali','+353834886711','dan@gmail.com','Male','Cleaning & Maintainance','03/10/1994','3, The Barley House. Cork Street. Dublin 8','$2y$10$0u.EjoPmdrswz8E7XaOiIuADRJS5lrcsIi13QwvL2qI7hUcYLtAca','0',1),(5,'Saujan','+353834886711','saujan@gmail.com','Male','Doctor','03/10/1994','3, The Barley House. Cork Street. Dublin 8','$2y$10$Tq.YBCLlBNdZuhJN1QOPeeI5eEOFWSM6qT/ULuujHjbI8Hcxf2S6G','0',1);
/*!40000 ALTER TABLE `Staff_Signup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `appNo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(50) NOT NULL,
  `confirm` varchar(15) NOT NULL DEFAULT 'Not Confirmed',
  PRIMARY KEY (`appNo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,'Noman Sanaullah','+353834886711','nomansanaullah1@gmail.com','24/01/1995','14:00 - 17:00','CONFIRMED'),(2,'Gurcharan Singh','+353834886711','blah@gmail.com','24/01/1995','14:00 - 17:00','CONFIRMED'),(3,'Locke Lamora','+353834886711','unknown.rebellion1@gmail.com','24/04/2017','09:00 - 13:00','Cancelled'),(4,'Locke Lamora','+353834886711','unknown.rebellion1@gmail.com','00/00/0000','14:00 - 17:00','Cancelled'),(5,'asd','123123','asd@asd.com','24/04/2017','14:00 - 17:00','Not Confirmed');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Locke Lamora',' ','unknown.rebellion1@gmail.com','$2y$10$ZOt..HDw48bZQBG1vg5Y0uAS4Dn3kt3TFlk8rIJhb2YqW6O0A.h1W','c4b31ce7d95c75ca70d50c19aef08bf1',1),(8,'Noman Sanaullah','+353834886711','asd@asd.com','$2y$10$r4yiSBH88mlXnadwCJogGu0vM8UarxChEQdFeQ3oFwkdq.l0QOmSu','a3c65c2974270fd093ee8a9bf8ae7d0b',0),(11,'Gurcharan Singh','+353834886711','gurcharan.singh6662@gmail.com','$2y$10$FZNqnGYa3o4Ef6Rl/c1USOhKMCUu86r4jXa29csZglYSbc1/WYMk2','52720e003547c70561bf5e03b95aa99f',1),(13,'Jean Tannen','+353834886711','jean@gmail.com','$2y$10$1cF0X4Mx6.xn/QMNT.VvIuZhiaSJCrz3uXMXT2E8CT8.hka/T8CQ2','bbf94b34eb32268ada57a3be5062fe7d',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 21:17:45
