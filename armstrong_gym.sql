-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: armstrong_gym
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'jake','$2y$10$YWE1Y2U3M2E4ZjI3ZjRkNeABfvPGlnla4NRylySPm1pg8w7mJu/QO','Trainer'),(2,'hassan','$2y$10$ZmUxNzQwZWFiMTBhZmM0OOOU.BC1nexOCgUBgH6Io4JVxYm2n10b.','Receptionist'),(3,'shannon','$2y$10$Yjg0MjdmZmJkNGNkYTZkM.4gt0XMRArqf2U5t9Jr.RKQ7/C0cFB0i','Trainer'),(4,'joakim','$2y$10$OTFjMWEwZTI0ZDFjYjNhMuDQ9.WyZDlQQlzjc8UMqfvFUXG1v8Cs.','Receptionist'),(6,'sediqa','$2y$10$ZWJjNTQ0YTY0MGIyNzllMeLxjbXSjnT.AOOZVVMcCWdcUllwBb6ym','Receptionist'),(31,'zilvi','$2y$10$YTk3NjhjM2UzNDYzYWVhN.KrT.VNsxZShpojNsBY6qKnXbyE.dDJW','Trainer'),(32,'milad','$2y$10$ZGE5NjE4YjA5OTVlOWYzZO7Nwp0ArPKtH5nxQuLR0AdDw5VDrwhjy','Receptionist');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `availability` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL,
  `saturday` varchar(255) DEFAULT NULL,
  `sunday` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_id` (`admin_id`) USING BTREE,
  CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability`
--

LOCK TABLES `availability` WRITE;
/*!40000 ALTER TABLE `availability` DISABLE KEYS */;
INSERT INTO `availability` VALUES (6,1,'09:00 - 11:00<br />','09:00 - 11:00<br />11:00 - 13:00<br />13:00 - 15:00<br />','Not Available!<br />','07:00 - 09:00<br />09:00 - 11:00<br />15:00 - 17:00<br />17:00 - 19:00<br />','07:00 - 09:00<br />19:00 - 21:00<br />','07:00 - 09:00<br />09:00 - 11:00<br />','Not Available!<br />');
/*!40000 ALTER TABLE `availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_char`
--

DROP TABLE IF EXISTS `health_char`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `health_char` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `height` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `bmi` double(11,2) DEFAULT NULL,
  `cholesterol` double(11,2) DEFAULT NULL,
  `heart_rate` double(11,2) DEFAULT NULL,
  `blood_pressure` double(11,2) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `health_char_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_char`
--

LOCK TABLES `health_char` WRITE;
/*!40000 ALTER TABLE `health_char` DISABLE KEYS */;
INSERT INTO `health_char` VALUES (3,3,180,75,22.00,3.00,127.00,13.00,'2014-03-31 14:46:15'),(17,1,23,234,3.00,2.50,120.00,13.00,'2014-03-31 20:44:50'),(18,1,123123,123,123.00,123.00,123.00,123.00,'2014-04-03 16:27:38'),(19,9,180,75,17.80,2.00,75.00,13.00,'2014-04-15 21:11:01');
/*!40000 ALTER TABLE `health_char` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,1,'Working hours',1,1,'Monday - Friday:\r\n07:00 - 22:00\r\n\r\nSaturday:\r\n08:00 - 20:00\r\n\r\nSunday:\r\n09:00 - 17:00\r\n\r\nBank Holidays:\r\n09:00 - 17:00\r\n\r\nChristmas Boxing Day:\r\n09:00 - 17:00\r\n\r\nNew Year:\r\n09:00 - 17:00\r\n'),(3,1,'Our Equipment',2,1,'We recently upgraded our equipment by buying some new staff...'),(4,2,'New Personal Trainers',1,1,'We have a few new personal trainers with a good background...'),(5,2,'All Personal Trainers',2,1,'The current personal trainers are...');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `program` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `program` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (2,1,'Shannon\'s Program:\r\n\r\nOk Shannon on Mondays you do...\r\nOn Tuesday you do...\r\nWednesday you do...\r\nThursday you do...\r\nand Fridays you do...\r\n\r\nOn Saturday..\r\nOn Sunday..','2014-04-03 16:14:24'),(3,3,'Joakim Programs...','2014-04-03 14:31:14'),(4,4,'Sediqa Program','2014-03-18 23:54:15'),(5,5,'Hassan Program','2014-03-18 23:54:24'),(6,6,'Jake Program','2014-03-18 23:54:38'),(7,9,'On monday I went to the gym...','2014-04-16 13:40:35');
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_and_a`
--

DROP TABLE IF EXISTS `q_and_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `q_and_a` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question` text,
  `answer` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `q_and_a_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_and_a`
--

LOCK TABLES `q_and_a` WRITE;
/*!40000 ALTER TABLE `q_and_a` DISABLE KEYS */;
INSERT INTO `q_and_a` VALUES (1,1,'How many minutes should I exercise?','45 minutes till 1 hour because studies shows that if you exercise more than 1 hour, you body will start producing cortisol which is not good for your body','2014-03-22 12:15:50'),(4,4,'Do I need post-workout supplement?',NULL,'2014-03-13 21:43:09'),(5,5,'Should I workout in the morning or in the afternoon?',NULL,'2014-03-13 21:43:59'),(6,6,'Why should I sleep early at nights?',NULL,'2014-03-31 13:53:51'),(7,1,'how many days i can be off','It depends on what do you call off days?','2014-04-22 20:25:22'),(8,1,'How long should i exercise ???','45 minutes\r\n','2014-04-22 20:24:57'),(9,3,'Do you think I should buy a pre-workout supplement?',NULL,'2014-04-21 20:50:45');
/*!40000 ALTER TABLE `q_and_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `session_entry` text,
  `comment` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,1,'Monday:\r\n\r\nI exercised really hard even though...','Ok good so you will need to do a little more and be careful about ...','2014-04-23 13:48:54'),(3,3,'Wednesday:\r\n\r\n4 set leg press\r\n3 set bench press\r\n','You should not mix leg days with pec days. The both are big muscles and you should choose one and take a break for a day between them.','2014-03-27 21:17:54'),(6,6,'Saturday',NULL,'2014-03-20 16:45:50'),(14,5,'Friday I did back and biceps. I started with 3 sets of chin ups. After that i did 3 sets of bent over rows which was until failure. Then again, I did 3 sets of pull down. So this was my back. For biceps I started with 3 sets of barbell curl and then 4 sets of dumbbell curl. After that, I did 4 sets of pull ups and I finished after 1 hour exercising.',NULL,'2014-04-05 14:01:34'),(20,1,'On Wednesday i did back and biceps...','Good job!','2014-05-01 16:30:51'),(21,1,'On Friday I did chests and triceps...',NULL,'2014-04-30 22:11:45'),(22,1,'On Sunday I did a little of light cardio',NULL,'2014-04-30 22:12:10'),(23,3,'Based on the program you\'ve given me I did a light cardio at the weekends...',NULL,'2014-04-30 22:15:52');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `position` int NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_name` (`menu_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Website\'s News',1,1),(2,'Personal Trainers',2,1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `goal` text,
  `picture` longblob,
  `admin` varchar(50) DEFAULT NULL,
  `freeze` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `admin` (`admin`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admins` (`username`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shann','$2y$10$N2RiYTU5MTQzMTIyMWI3MOlan8QhOS8ser7e4APJe6aiZGpjvlO72','Shannon','Greene','Female','1992-04-02','USA','Virginia','1234','shann@gmail.com','07912431667','I want to get fit for my Karate classes. My dojo sensei says I\'m doing well...','','jake',1),(3,'joakim','$2y$10$NGFiMGE2NDQyYWFjOGI0Nu7MhbjJVTxNSL0J40jjS.GAlr6J42116','Joakim','Randy','Male','1990-06-07','UK','London','W5 7OP','joakim@gmail.com','0793457234','I want to improve my \"beach bum\" ready for bikini season.',_binary '�\��\�\0JFIF\0\0\0\0\0\0��\0*\0�\�ICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \�\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\�\�\0\0\0\0\0\�-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0�\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0�\0\0\0gXYZ\0\0�\0\0\0bXYZ\0\0�\0\0\0rTRC\0\0\�\0\0\0@gTRC\0\0\�\0\0\0@bTRC\0\0\�\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\�\�\0\0\0\0\0\�-XYZ \0\0\0\0\0\0\0\03\0\0�XYZ \0\0\0\0\0\0o�\0\08\�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0\�XYZ \0\0\0\0\0\0$�\0\0�\0\0�\�curv\0\0\0\0\0\0\0\Z\0\0\0\�\�c�k\�?Q4!\�)�2;�FQw]\�kpz���|�i�}\�\�\�0���\�\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(�\�\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((�\�\0\0�\0�\0\"\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0쉝�E�Ȍ\0d�.A��#fb@�D�4]FL\�$\���*c\0\0��&\0Ĥ�Ǘ�\�\"�aBl�$0��j)9y\���\�V\�5� h\0\nI�\"@\�e�d[k\�\�k\�\�WI��ƄB�j)Đj��a6\�RB\�U[\��td�\�\"�D&EĜ�\�\�D���V�Ǎ\�ϧ��]���ay�c��\�_7��ڬ�\�y\�3Y\�\'�4P\�rR\�\�\�-\�\�\�\�¾\�M|��\�<޿N\��\���֢5�dId 8]�{:\�|\�$\�\�ϸ�QbMo���\�\�s\�\�}w\�\�\�\�EU�\�\�Lm�52\�h\�\�kH�\�N���_H\�-8�x�\�S��w�w\�ٔ%/�\��W\�\�\��\�\0+\0\0\0\0\0\0\0\0\0 0@!\"$13#%42�\�\0\0\0\�\�\�:)eA\n!P�\�b��\�\n�z+�\�[\�tWo�\���\��\����\�\�m����l�?�*+9��\�k=\�)-�\�\�\��z��\�X\�\�c��\�\�jս\�ٚ\�f�Y�\�\�$Xj\�H\�g�ύ ��\�@\�.2P\�B6��\�8\�_\��\�De\�	lTX��·ë�\rF\�\�\�O�*\�heB����[Ȼ�\�h4^F\�6\�\�o�i\�,T�\�q�\�-0i\�r�W\�-�=�ժ\�v�\��\�\�\�B� \�u1h��\�qtu\�I\Z~#�٨\�<\�x�Ue[�\�G���\�i&�\�\��\�Dԍ\\ՙ\�u���\��9\�R��i\\?+[�v�\�	t[�\��\02�(�_Qɮ��=k�Hf�g<ߏЕ\n3\�X�A�(-VG�w��*)�\�\�˜\��\\\�cWTOj���+�\�\0\"\0\0\0\0\0\0\0\0\0\0\0! 0AB1�\�\0?\�uz\�z\�\��\�S\�\\a\\_0X\��ET�,�FݞlncB�\�|�]?�ťR\�\ZM�-l\"�	8_-��K�W�\�\0\0\0\0\0\0\0\0\0\0\0\0\0 !01AB�\�\0?\�9\�\��\�L�o���S\�\�\�k�Xh*\�#Gf�\�D�Ar��*¿�\�\01\0\0\0\0\0\0\0\0!1A 2@Qq\"Ra#03Br����\��\�\0\0\0?\��\Z\�fsu��lx:^\\M�w��\�c\�_�\r��=x:b\�\�\�ٖH\�m&@\�#�.\r׿�[�}\�Y~�\�\�\�M\�\�o�hM\���`M\��L\�r\�s\�a�J�ٛ\�y�\�W�\\\�\�&�đ�\�\�yx \�:\�5\�\�B\�L\�٪=P\�\�0\�\��Wxa�@7&�~KX\�\�>!\�\�L,\�\�\�\�\���J.�C~�F�s���\�P��\�.1�^,�=\'f�w\�\���\�_|���G��¤a.:\�\���Zl�Q�.��ۓ���@��)јQ\�]I��ĩ�Q\�>罷E\��\�N�l\�k���ڀ^\ZUǪi܌d�=،\�\�\�u�J�g\�\�I\�\0�͑�\�u{mH��\���-෗�N�\�\�JíB\�\�\�\�:�,\��Lw	<\�br�	^w��E\�}��\�\'	�u����b\0y�\�X\�\r\�p�r: uiE\�hT���h�z\'\�Dwp�L&N5\r\�\�_�\�\0(\0\0\0\0\0\0\0\0!1A 0Qaq����@�\�\�\��\�\0\0\0?!Qj�4UP�\�&�!���V�<�mT\�b\�E��a�N7\��\�(��\�\�+��QE�\�\�\�\�=�E^:���(A��6<D����\�t\�\�~�;�	X娢\�Z�\rGe��2rWi�bTJuE\�2�����\��u!�\�Pb5(�\\z-EɔQE�\�\�P�\�1�ѣpq\���OK�+�\�b\�&\�<\n(\�\�K\�\n�\�%\�\��\�\�,\�%Ɇ*\"ɫ\�oPDc\�\nX\�zGz)R^�?\��Q\�\�\�\�*}���\r\�DCt\�\�Lc2�\0\�\�\�xCK�:�a	�[��v\r۔j\n�e�\�Nqo��\0�!]�3\�zy��\�\�xkY\�f(���\�)\�M�6ו\�3\�cc\���E���k 0w\�~ޢ\����\�^����\'yA`ԭ1L�\�<\�,��e�\'�\Z`@\r��F0\�o$Oτ\�!ȣv\�\0\�h?����&R\0�ϴPg\"$Yx(�~\�\\&ӄ�$�%`n��\� \�\'\"�\���\� �V\�C*��fz7\'\�ga0\r\��L�u(�\�S�\��4�؆\0\�	I�\n{�� 93	�\0\�\�tT] \0\�u\��\�WD���.[g\�\�0\�\0+\�l�\0Y��o\���Pf���oX>Q\�s�\�\���\�\�{�Iv�;t�\�\0\0\0\0\0I�-\0�\�k\�\�^L\�\�\�t\�t��\�\�Z\�~�hZ�\�K\�r\�\�Q;(��\����\��]\�\��\n�\�xcD\�^巶�Ġ�\�\0\0\0\0\0\0\0\0\0\0\0\0\0!1 Aq0\��\�\0?\�\�g�!��IO8�2\�\�\n\"&,�HB$px�(��\n\�\�[��\�\"\�6X\�5!\�\n2\�A6B�4o\�9�\�Bn�\�J\�WL���zQbb\�#�]\�\�\�\��weo\����\�\0\0\0\0\0\0\0\0\0\0\0\0\0! 1AQa0�\�\0?��\�JQ����\�x)\Z+\�\�Ґ\\&!�dd!�6�+N�\��UGC�\�qF\�5h\�(\��\�R.�PL�p\Z*\�NC\�G��l�E؉�Ķ)��G�\�\0&\0\0\0\0\0\0\0!1AQaq��� �\�\��\��\�\0\0\0?\���q\�,��.g3xC9̣��J\�R�0�%A��_%\�ebT��J��W2\�T���b�kB�\��,�p\�*�b��Jh;F�%F�XD�to_\�E\�\"U\�	��qV�jFƯQ�A\�\�/�XZ\�\�ڍ1P4UJ�*T�iP#��\�\�6�\0��p�YL�\�ƁqЩR�J�/J\�%^�J�m�_�\�P҇B\�QQ�\�S�#�\�<h\�\rZ���\�0ꖌ\�\�[��YW�\�1\�,K@�C�D\�v\'&~��������^\�r\��	R��2���\0\�\�\�c%)l	\��\�mx~��$�Q�\�+�\�\�iP!\�P�\�]�.\�L\�Wz \rRKn\��\0�=\�牜���ʮg\�1(�s\�-�9\�\�lı�(\�vT\�\�\��*��\��S\�)֖o/���\\�\\}D\�/�\n�\��\0��@\�A�\�3\�\Z!<\�M�\"`���R��er�\�\r1�\�y\�L�*T�@\�Q\�`N m24\�\�-\Z\���\0TDTf\�\�EX��Ն\��w+�K-\�a�\�T{}�F��\n)\�$\�\n]p���\0�/Z:B����ޢ��`�_\��\0�}n�\�m\�y�4\�I��Z\�j��\�$q\�Re.�\�S���Մ4.\�\�\�vZDj��\�ڏj\�\�e�\0 �\�\�_\�@c*uk\�̊x\��e\��Į�\np\�}���[\�Y��)�B[�\�&T�}�\�\�[Cr\�\�L\�\�\�\�|5�u���z\\�r\�\rLo	�vl�xtAH\�<n4?A)Xty.�\�\Z\�\"~r\�\��@Y\�\�\�1\�t\�l>�3e\"�\�b%�٧�9\���\n;\�~2�\�e˗7��ʗ�]m0*�[o_�Qx&�1R�	l�@+F�rws���\n���q�Y@���)w|X}\�\�l!\�\�\�4#�\�2J���\0�G���D\�\���\�\�\'Զ�Am��\�˗-^F\�\�}\�\0o^�\n*��P	�6n\�;�Y��[�`	\���TPw�\�r�\�\\[�Qہk��\0!\�>V!�\�J\��\�\�\�\�{\0^*d�\�2�#�`��:��/5�u���Gf���\�\�K��:���\�.\�v�?�3\�)i\�#\�aK�\n\�O\�\�ZZ��r9\�#(%\\[e47�\�[�\r\�\�j\�\�\�[m`\�\�Wq�\0Y�\�\���Y\�\����\\\�V\r\�ǰn`�\�\�i\�ă/.2�2�Q\�,�}�\�F�[G�\�^O�\�','jake',1),(4,'Srez','$2y$10$Mjc2NDFmYzdiZGUwMjc4Yui.7jHirVPd8.Rerrc1djVlO12hngTIm','Sediqa','Rezaee','Female','1996-07-19','1 The Road','London','NW1 500','Szres@gmail.com','07123456789','I want to run longer distances so I don\'t have to take the bus everyday.','',NULL,1),(5,'Hassan','$2y$10$YzJmYjI1NzYyYzhjYzUwNer4b6ZEVW4Kf66XaNmZ.CEjQpsy60dvG','Hassan','Azimi','Male','1986-06-13','54 Kensington lane','Essex','PR3 A33','hasan_azimi0@yahoo.com','07912431667','I want to strengthen my wrists and forearms.',_binary '�\��\�\0JFIF\0\0\0\0\0\0��\0*\0�\�ICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \�\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\�\�\0\0\0\0\0\�-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0�\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0�\0\0\0gXYZ\0\0�\0\0\0bXYZ\0\0�\0\0\0rTRC\0\0\�\0\0\0@gTRC\0\0\�\0\0\0@bTRC\0\0\�\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\�\�\0\0\0\0\0\�-XYZ \0\0\0\0\0\0\0\03\0\0�XYZ \0\0\0\0\0\0o�\0\08\�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0\�XYZ \0\0\0\0\0\0$�\0\0�\0\0�\�curv\0\0\0\0\0\0\0\Z\0\0\0\�\�c�k\�?Q4!\�)�2;�FQw]\�kpz���|�i�}\�\�\�0���\�\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(�\�\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((�\�\0\0�\0�\0\"\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\�4j�eׂ�a\�+&p��J@\�T��B\0\�Q��w�[eݔ\�\�I\�\�H��\�}L�N�w+4\�\�\�V:�p0 $X�S^{�\\\\U8��c�F\�\�\�2ƹ�*\�[�e��(T��\�F^p((^\�E~hTIKQ�\�1Ц�NO+\�B�].Y\�\�B�qd>|�#Q�ւ����\�\�\�J@\��_S�c*�E`\�\Z�Y\�\�\"R	cn�*\�hg��\�C\�ɻ���6�w���)\�+ĉ\�p3~�P�hGC2��TQt\���q\� `\�\�n\�9l\�\�\�P�\�\\\�&\\b�xx�d\�\�i㱍GN��c\�pF(\�1\�\n�h�\�E\npp5\nPK\�;Q��蠐�<p�@\����C%®3*�\�äD\�%8D��\��:)}��gz4i\�,5\�;��\�\0\'\0\0\0\0\0\0\0\0! \"1#02$�\�\0\0\0�^\�\���o&��*\����%\�56P\�f{\';\�\�񝰧?��%wu�\�_Bd�<�\�ڋdXAS\�*���\�\�\�5�f>�V\�\���眘\�3�\�X�\�Z\�\�a\�Z\�\�Xct-m\��\�\�\\M\�\�8U\�\�g_`Y��|O\�Z��u\�;F\�7ݮo���lݫݯ\�݉+�Z�u�7�\�I�OR\�5�	�Q\�?�sI\�O�u\�\�6d+�`�H,lC�������ʾ�����/ְ\�vU\�\�Y\�H�aSq�mr\Z�1>CT|\�Ԙ�F\�\\��kY���i}{�v�	.�\0\�_��t-\�Oh\�1lmKN29�\�\�S~�$�<U�N�p\�\�\�|Iv\�Jz/\�\�a\�\�f\��\�(_:G�3�z���\�ղ��w\�j`\�\�w�\�g\�bY\�)��]��P�`_v7�\�Q\���RnՍ��U^������Xc\��\�dpq\��bY��\����l\�\�92=q*��\�\�\�ɷ:��~\�\\`��?�;,\�\�Ȝ��G\�[�oF\�Y�\�ka�V�I\\��\��h\�Yٱ\�eOP\r\�ha�@��}���\�\�dO�>@�\�C\�Uqv�\�>�Bz��}r+�\��U)��ÜPG=z�g\'\Z�1>\��\�\�%GCe\�v>\�lR����\�\����V@|\�\�3\�\�;�\����\�\�\�\��\�,�h�fv�r{\�憟^?T\�\'���yT�\�8M�P�w���z\�\�\�qE\r�\��\�q�\�\\\rֆX�j\�\�\�\�g\�kj�\�R��=X\�gZ\���\�0LdK\"\"1R�\�\�Fv�\�y\��\�-�>\�g�\�,�mBN\�BG�Ĕg9�\03\�L\�\�s��\�?�i�9\�fa~\�Ϙ���9\�8\�\�\��gl\�\'\"r~!\�\�e�/\�\�R6��Q23?�\���\�\�P\Z���&7�јh\�/1>\'�?L\�\�ю#Ũ\�ut��\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`�\�\0?I�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`�\�\0?I�\�\06\0\0\0\0\0\0\0\0!\"1AQa 2Bq#03@Rb����\�\�C���\�\0\0\0?SEe8Y\r\�*�>vꖩ�p�U3ʫ��\�\�c\"CdT��\�Q����\��TԊ5�|�\�ǢTT\�\�\�\�XO�f�\0ҸX�<L1�\�\��\0*�\�p\�\�kƠ��\�,\�\�Bau�2\�\�\��20\"74�gS۲łjd\�H\�\�r��x\�SZ\�f5X�\�ǆs�ZG�Sx\�\�\��F�\0n���\��b\r\�\�\�\"VU\�0��\�\��!\n@\�\�ڤ�\�D�Yr�\�t}�\�w�yʆ\�f�\�c;\��\�+�K=�i��W	P\�p\��\�\�.ҧ\n��3�;�|F\�\�A��Po�b�\�\�\'lF\�D\�At�J1��=�N\�\�3�\�d\�$IɰƁ\�\�7a�\�\�\�Q>�!\�>\�\�L�\�\�\�u7l�e\��T@�� �c鳺\"Ҵ*E�.=U�|V�\�\�ed\�}\�\�*��\�.��(p\�	��\�RuP\'�8}	>Oe�\�S�\�8�}\�ßm�O`��\�uE�d>��\��ݐ-\�.�\�\�TJ�\����\�MCF>\�\���K\�n7j��\�~bo?�ʚstB$Kv���Է\�C�\�Ci�M\�\Z���8L�\��\Z\�DԘr\�R�����G�\�h&Qۡ\����{\�\�EٽVpG�)\�\n5��\�ԇʘ\�\�#7u�H��\�\'a����r�+�S\��K�ث\� ؒ\�\Z\�5\�̢z��QoE\�g\Z^F=�m�,�0�\�L\�\\�\"\�\�\�ת6�)�t�]�0B#X�~jQ&\Z�s	tX`V\�)9\�q?�t7leee�\�e7X\"\�\�Ϝ��Ӝ���b\�\�\�\���p�sN��FkA��\�OlXys\n�Y��\�o\�.�}s�祹R\�l�\�Ms�\�{\�\�@G�\�h	\�\�#�\�q_\�h�&�_)9H\�\�5�_�=�6\�\��\Z\�\�\�\�X\�K9Iʒ%\�*_�_�H��R��\�\�thY�6\���!\�\��@4]g>c\�轁K\�\�^4\��AF^�\�\0%\0\0\0\0\0\0\0\0!1AQaq���\� �\���\�\0\0\0?!z\�Yu\�Y�\"\n�na\�}K�\�`�\Zlc\�q\�\�Y\�\'�2G˃�G2(d�\�s.3��k�O�\�*�f�\�\�\� Ǣ\�I}��I>A(gL[�S�1�,c\� !|,�\�c�8���@����\�Ņ\����)]D�|!ĥʺ�\��\n#5�\�q`V�!`F�5\�+w\Z\�M#\�5Ĳ�;��\�q�.��:N)R�*y���\�\�̫8?�\�\�`��m\�q}qNƹx[mG;7Dɉl�\�u���\�\��=\�\� �O\�\\Υ~}�P�\�g\����E4c��\�\�\�\��\0\�\�\�R\�\�01\��\�F\nA\�\�8w>	P_\�ܯ\rQ�2�\�\�j`��J��\�>3{�\\Zq\Z�&\�P\�Vv\�|9�f\�\�B\�e\��c��\�U����>�\�\�\�Ŕٛ ��d���0W\�t�\�R�\�o\�\�\�R�.�*�r�_prU\�8#k\"i;�\�\�7d.\n�\�\�I\�\\#0�\�%&\�\��m],c\�.&L7\�\r�m}�߀	r{~b�\�i�\�=�̭.a�>v�\�BQ\��>_O�l\n\�\�<XTR�g\�_$n\�\���6\����\�yMɹ;�Q\�Gm\\?j\�>=^\�g5��jX�\'o\�\�%�u�`�\��o2���\�ǍMZ&����=zK�\�)�\���y\��z\���\�����u��&SV�MBM�Yk�`\�q(\�/�f�\�c1G1ؚ�\�n�Yj���M��\"�_Ze��=\�[?`\� +����\�\'�u��@7\� �\�\���\�r\�G$¸]�_��\�W�Pp��P\�N\�C\�_�\�\�m��dG��[�\�\�,}ϴWR�(�\\�$Whۦ$�є`ٛƕ\��\�!M\�^^�\'\�`�\�\n�I)\�7\�-.+���U�¸KAXg�\�E�˽\�\�S��ՌС1V\�\�T}\ZtV�%\�G\�ʞ9g�\�\�Zcj)�L\rS\��\0\�/\0^#\�CL+�����������C\�48{I�\�%#\�	�J�\�\��\0��\�\\d�Gi\�\�=\\:|�-\�\���o�>\��\����$Y�����9\�\"��\�\���s�\�\�8����\�&�d��z��	�q2\�\�\�\nͷn�\���\�w4G��\�*m�XY��\�\"\�\�rJ\���\n�2�6h!NG��5?H[y�3\�x\�I�\�_^+i�\�\�0X9!C�^88c�a�o\�\�����W�Si��Y5�l\�ю%\�\�h�G�\�r\��\�ʹ^)\�+.|Z����\�MR\�����	R�.q\�2\��g0x��\0*\n\0\�\�\���\�\0\0\0\0\0\�\0B \�O<J	\��,\"�01I4\�C(�  �c4�ObI(p\��@<0N,B �O<J<\�L4#\�0�0P�<�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`�\�\0?I�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`�\�\0?I�\�\0\'\0\0\0\0\0\0\0!1AQaq���� �\�\�\�\��\�\0\0\0?˂5aqc`R\�s���,�\�\":!���e\�\��%мB\�\�\\\�1\�e\�bg��Ԡc�u���7r\�%KI\�\0T:$X7��\�-\"V\�lk��L�6�\�>\�6�ڸ2�ek:�\�N%&\�\�\����\�\�\�\�bŗL��,�T�\�L�\���DD����p�\�j�\�3��9v��l\��Tw]\�\�a@d>���\�+i[\�xDt\�\�@E�vРg\"����(	�Nk\�C\�(\� �\�X�\0\�!\�k\Z\�bWiDçk�\�1zA\�T�\�ZSuc�Ν��\�\��+m@Z�0���9�6\�\�%h>r\�J2?\�V�	\�\�\�])\�\n%�1cAx�\�e\��SȈ$�;\�<<=�\'%fg\�o_\�\�j���唷3���`��l��\0A�T£fv\�/�R\�D%�w\�\nI-\�7T\�˾|G0\�\�\�\�\n[-�RU��\���;k� ��\��E:\�.��\�;�Z�,չ��P\�Q4\Z0o\�$��#��١v	\��\�͎�\�\�\�$�@p��`\�\'d2J^<�G\0\�x��=zM$e�O�`\�\��R\��\0�\�]e\�\Z�=��&hR��vFAa��\�m\n�8�F�\�*�6z�\�0�7\�aN\"��h�r\�\�Q��R-�I�U�*\�\�\"\�@;|\�J\�In�|,|kV\�\�p���Z�\�7\�dCh7\�\�a�\�4M�*��\�qeC^4S\�\��\r3�;\�\���\"�j<ap�\�|p<Z\nW�TjhN��\�:��G\�\�\�x�\�\�\Z�dN��/J��sƾkG�M�҇X�\�& �?\n�`�\"���Zg(�\�{v��U\��\\l\�@Z\�\�\Zk�\�e\�5M�N�L?�Q͜����.�L\�\�\�ǁ�bF�ST�_f\�\�y�\n\�\�F�uŷ;\�)K�s`o��SlH�\Z\'�ُ\�\�*8\"�ò[�y�\�+qb���bś�\�\\\�\�1:Ϙ�Z�\�\�i��.����\nZ�x�0\�u��&HB\�\�-w��\�~\�,�b��4\rWܷ �m\�\���0\0�e�\�QD�`\�\\\�;�\�R�G$4�W_�5\'\�-	S�X�h^�?\�`�)F��\0ơ\�^�]�?\�\rQ��~D�mQ�s�\"�\����\�wJ\�\�\�\�Z\0���r\nm+=\�pUK �\�9C�\0lf_\�jጒ�Vc�\�1\�f�\�z�i+\�J��\�P\�\�\�\�H�c\�f��\�EX��\�3\�\�a`Y}	h8\�H��A\�v�dLZ\����T(v9\����Vߔ벯��.�JX|K0ֿ�D�VK\�\�2\�\Z�,\�Q��^�\�V+\�\�N`֠E���\�1\�\�\Z�,�rJ�\�\�\�\�\'c3ÚeT���\�r\�\�SXS��\�$:M\�ѥrq\�|���cX�o=�\��\0]�\�q(彯�p\n\'�p\\UW�k\�\�C`�\�\���\��\�\0*\�#��\�2c/X\0�v9\�=\�T\�%�9�d\0��f\Zz��1[\�)\��%l埢SR��$G9�\Z~�Y!�V%\�Ƌ\�\�m�/�\�E@�5��P\"U�\�g7a\�5)\�i\�	\0��\r\�k|\�_\�@�\�gdf���[��j\���\�Ȕ{\�	\�ٗ\�\���\'feJ\�J s�ϳ\�QcҵO7�J�\n�\�\�){�\�\�	LP\�ݠ%�Ogsx\�`_\Z?0 ^��}K\�\�m��2?m�c�X��\�_�쪉\\Z\��\0o���$]\',\'>��\�_?�\�,�#\� ��;\�U�RD\��=\�Y��\�`\�5���.s��ۙb�q\�,\�R\�^��\�\�z\"�S�70�ȹ\�\�~\�4�\�\�T�\� _^��\�~4\rN\�ޟ	5�gC����ٷ\�\�\�=\���\�w\�¹N�8�^u9-���(�[0²#\�Ǎ���3\�\�yq2f�\�~\�N���H1\�A�Ƀ\�A)\�_�\�\�ɉ�O\�a�\�O3*\�\��\�P\�t \���\r\���,@��	qo\�z��2	��$(\n��P�\Z+�?�\�','shannon',0),(6,'JakeB','$2y$10$OTZiMzczMDczOGRhZWIzOOMr3BoUmr1Bpiv1Lgwb6PiJPL.cQ3TdG','Jake','Berry','Male','1990-10-11','12 Baker Street','Peterborough','PE14 IXT','Jake@yahoo.com','07989139133','I don\'t really need to do much more,  just a tune up every now and then.',_binary '�\��\�\0JFIF\0\0\0\0\0\0��\0*\0�\�ICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \�\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\�\�\0\0\0\0\0\�-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0�\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0�\0\0\0gXYZ\0\0�\0\0\0bXYZ\0\0�\0\0\0rTRC\0\0\�\0\0\0@gTRC\0\0\�\0\0\0@bTRC\0\0\�\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\�\�\0\0\0\0\0\�-XYZ \0\0\0\0\0\0\0\03\0\0�XYZ \0\0\0\0\0\0o�\0\08\�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0\�XYZ \0\0\0\0\0\0$�\0\0�\0\0�\�curv\0\0\0\0\0\0\0\Z\0\0\0\�\�c�k\�?Q4!\�)�2;�FQw]\�kpz���|�i�}\�\�\�0���\�\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(�\�\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((�\�\0\0�\0�\0\"\0�\�\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0\0\0\0\0\0\0\0�\�\0\0\0\0\0�\'\�\�Fɒ�\�XB�r��6�l\�\"\��\�A\�\�#\�\�L�=�<�_,\�N�\�\�fN\�!I[Q\��j��?�\�=\�����n+�c\'^NC;\�-m\�~\"%�h2NE�\�+u\"\�:�#�Δ��\�D�&���9\�\�)��\�}\�їۍ\�\�t\�;��\�*>�aY:\�*\�ē��ϟ\���̄}O�te\�\�8ME�\"��=�L�\�\�	\��h7ɭa�|�\0`��7��X�\�\�\�0�\�)z\�a-\�ԙ\�\�xHmg��5/�*O\�\Z\0n/*��ζ�?\��lhZRꩫBHh�nk8�\�[<\�^\�\�gz���:�m\�	\�j^M--�(\�z[\�2��e�\�~\�\�E�Ж\�J�>|�\�٠\�{��6F\�,Z!��\�^�\�>�\Z$TN�hƪ�\�>�e����\��q�(�\�ߔj*�7}[C�Z!\�R��\'\Z��\�\0(\0\0\0\0\0\0\0! \"120AD�\�\0\0\0�\�jjk鯶���f��Y�\�\�\�\���\�_]|����mN\��\0\�Z牧\�\�=�1\�2�o\�j*\�X\0�P\"5^Fl$Y\��\�\�9|zWmp�\�mL#\��x\\\�\�c,�됯\�FMUW_\�\��\�[D\�\�za`����\�1�,�\0n�\�񀁚#n+\�]�>\�_:�� ��Й���\0�\�ئ�\��5��\�[��\�jjjjj~0�\�BX\�W�eu?�j\�k\�\�\�{r8\�\�\�\�FY�����\�u�k\�˹:{a�\�*u�?d\'��jQM/VEY@[E]|;Sf��W\\\�̽�8\Z&ju�&\�\�r.ʳ\�\�\�W��)\�]\�\��\�\�\�-\\�VP\�\�\�vA9\�[X�\�#Q\�%�\������e��\�v��c�F[)�\�;[�Okȟ/�2�k��ݒ\�Ū\�::J��]Y���\�\�\�<��<�P\�VV\�_j+D��7v\�q\��\0G��\�*\�,cO�*\�	\rNg�*\�&i+\�\�3\�;׋�\�2�\�\�-�K�VX�\��\�ib�\�|nE��z�\�)ǬYP�?\Z�����\�t\�T\�\�\�\�VJ\�\�s8\�W\�\�*\�������1jv�aK;\�8\�_\"��j\�\�\�ǀEN?\��\���~-�6-�S��k\�\�\�V�5S\��#\�\�;~��KG#���~r=\r\�\�v�jr+��%t�+Tjǜ	���<�\��\�vZ\�އ�\�\�\�gv�E\�\�&E\�J\�|��/Ѡ�~\�\�$𠚚�\�\\ k�\�Q�\�\�n-�\�?\�[e�\�\�֜V��@96׊0\�,�\�D֌F�F�\�\0!\0\0\0\0\0\0\0\0\0\0\0\0 !01@q�\�\0?\�\'\�\�L\�F\�I\�\rtT�\�qi���*C\�7�#��Be�!\�Nю��:\n\�.4�\'΋\��\�\0!\0\0\0\0\0\0\0\0\0\0\0\0 !10AQ�\�\0?��wg1�u~\�{\�TB\�U.Y �\�٣uH\��l](رui9��&R��\�\�S\�ƽ\�\�\�\"�\�\�$<��\�k�\�1\��?�\�\06\0\0\0\0\0\0\0\0!1\"AQ02Raq Br�#����@Pb�\�\�\��\�\0\0\0?�[o\�\�\�+���(\����Ɨ6D��i\�\\`��\�\�z+e_BG.\�%K\�Ӻ:���m\�\r\�c	\�7\�t�\�q\�4R\�\��SCm̬��\�r�\�\�v�;T\�lz��f\�\�g�qv�\�\�\�O���\�\�KtXO�\�׵{M:~(\�H���z0���\�\�r��T\"�<�`UZv2\" \�hNg1}\�\\	ѡ�\�i�]\�Oe\�3f�m\"	@�������x�\�N*�*85��\��\�0;O{\�6RzBn\�6�^s2�\�ܧC� N�YO7�\��;\�\�\'�\".�m\�)�Ap\�-��\�r�xrC�({H\�\n\�4ʪ\�o�Q�\�]S\�K�\�\�y\�N�\�\�\�RBkE�\�)y�\�8Bq\�\�\�X\\4\�\�\��.4}\�U�`����\'GU&\�\�6p\�e6��\�Hf�ac2�\�\Zݧ���\��֦<�q	ʳGgI\�s�\�E)ʑ\�\�\�\�\�Y�Nٷt�0�r�\�R��\�}3�\�6\nNr�\�1\�D=�8s\�\�/$#��6\�\��\�p�\�9\�>v~c���\�\�+����\\�&�\�\�b\�\�}���-.~хV��Lp\�%ŅY�o\0u�\�\�>\�7��ߑ���»�w�\�Y�X:aw\\�\r�O\��\��\0�\�ʮ\�Y�\\\�\Z\�̪ϫ�k�v�oE�^\�p\�\��]�OcR\\3K\0<\�+�\�\�\�yz@\�\Z�*g\�\�\�\��<4ź�,DYN��N}�Ӫ\�p�rj�\�ɭ�\�F\�.���aF\�9�Bk�:?�\�\0\'\0\0\0\0\0\0\0\0!1AQaq��� ��\�\�\�\��\�\0\0\0?!�$�\�\'EJ�*T:5ҥG\�D�WZ�׸�:Քp0&�C0D�$�R���Б%toN�c�%u�ΥYe�\�\�\�\�b$zY�ˆ�Th�FWD�*n\�h��%\�>0đ׈�m\�K\Z\�$YVL�$\\\�\�\n�\�1jE�J�)	Es�\�B)(\\!xQ\�MD�,�\�\�\�\�9,2Sf&�\�\�\\B�\����T�:T#9�ɛ�Y9�\�E�\�0Pm�iX~\�w.\�G��e\�Gh\�tT��CQ\r5,mX\�q�\�Y���Q�5\�c\�Qh��n\�\�?ib{B\�8v�\0�\�\��\Zh:G�.C\n���G\�\�[�\0�q*X�aJ�.e\�o\�ԧ�?5.\��l�Fw)|�\�^���.X�\�<s\�\r�����cPW��#_R�\�7\�뼾�F�\�.\�K�YpWf��\\C�2�\����K��\�!	�3�beJܭK=�\��\�\�*��ў\�8\�\�0\�\0I�\�\�\��ު[���\�C-H��	\�gЉ�xK\�Gx\��A\n�0o��9(�\�v(�\�\�Hy0���\�S�\� vj \�\�\�\�\n��\�\�C�\�Ԡ/s�\�0T*>�\r�b�F\�O�QOW�\"�\�\n\�3^\\��XU\��\�\����\�\�\�\�;;5\�\�\�a\��\�\�Q�W\�(TC5\�\\��8˩EJ)\��x#�\"7�K\�M����}1/��\��c�\�Zg\�@|M;�\0��ˊ\�cD!\�W\�\�{\��A\�h~�D\�\�\�׿\�>ao���f��kŘ_�O��\�\�R�\�\�q�0uu\�\�\"\��\0��\��\r\�X\�⼻�����j+@[�\0۵�\n[9�k�\�B���+6�f\�/SZ��\�tT�/Ŀ3\�\�\�\�\�L\\ųmK���`���9�\�,dn�I�N[<\�PP\�C�\�1p[\no�\�o\��\0_�\�s\�#�f!\�\�)[�\�4\���/%@\�X�}�\0\�ss\��s)C\�dp�N*\�y\�\"�=�a\�ɷ\�FFz\�\�r\�^>b2*U�\�\�\�a�\�fKxq=>e\�/ܤf{@\�k\�ˆ���\�D�\�jEz\�0�/(\�\�\�1���\�\�\\������\�p?\���{�\�\�*r9.`@��\�bS0|\�AY\��0�\\�.e}���g�\�\�0�\�0\�G�`�\0S,u9b\�a\�Y�\�y��%�\�\���}\�1��T�� c>�2\\ھ\"S�yD��ʈ\�~�L�\�\�\��6yaM\�\��\�\0\0\0\0\0}\r��hO��T9q�z(j�(�8�\�%\�[ׄx#Y ���Y\n��4Y��\���\�]S\�9��\�\�\�8I2\�sY�\�\���\�\�\��\�\0\0\0\0\0\0\0\0\0\0\0\0\0!1 AQa�\�\0?\�q�J\�\r��(�d{c��n�E�3Ue\�l{�C�\�\�e\�.Px҄;tb1D\�j\�\��G\�\�\�͋�\�Ζ\�8�\�*\�~F��!!>Nl�\�\�\�\�VrrB\"#�\�\0\0\0\0\0\0\0\0\0\0\0\0\0!1 AQaq�\�\0?\�)E\�\�}��B\�\"�,#�De\Z\'�\�dAU\�=�N%zt�#\�XA\�6l�\'h��\�\rT8\�>\�V\�\�=t�H�Б�*\"�\�C�g���9G�4A�\��v�$\\\\G��\�%\�1~e�J�?�5\��Q�\�\0\'\0\0\0\0\0\0!1AQaq����� \�\�\�\��\�\0\0\0?O\��zG(ǜ\�%�\��w�\0f��\�$\nd�Xᅸ�x�\0%Q%K,\��`\�0~�s\0��0B)\�\"\�٩�[+�,1�\"�c\�+/?�?��&פSt\�\�)\�w�(n\�J�0%fޡB\����R\0.f�\�\�\\+���Y||\�\n��	���F�X@�\��k����R\�Dؖ3\�4\���\��\�`X��\�\�gn���8�5�Hո*.+`o3�\�f\�%,X�\�SLJ_1�L\�2\�\Z�ڱ\�/\�\�E��%B�間+\�S\�Rѹ\\5�\��^*�\�̰$�W�=\0�9�p�\�\�J)ؽ�9�g�@j\0�IE��?�m�4���\�e�eP.\�p\���\�x\�Y\�FnҸ.\�~f\\]\�|\�\��B-�\Z;\�*�m\�\�(\��\�F\�;��Vl\�\��K�����	\�\���\"��^��\Z�\�d*�{�\0pq�v\�\�gz��/3i�7T,R\�b\�\�\� \�d\�\r\�\�F��ߘv�\�S��\�0�G��T,1^\'\0/qx\�.�\�R�;�SJrV���\�\'UO\�\0K��\�\�L�(XC�\�d��\�h�C\�r\�C�u��ڀ\�`eO\�׸��ʠM��bʰ�B&9\�\�\��`\�Fȹ�ܬR��t3\�Z�cH\�nU���\�n*\�\\m\�]׌AX\�mD-��X0PQ�l���\�\'\�34\��l\������h�J\\�l\�3)\�Z\0\�\�\0jw�\�C5�\�\�TZ+\�\'	��\0�Fp/��3�j���\�6\�\�O\0\�\�\��,A�X-ϙ�H\�\0\�wnYif�\�\"@\�דԳl�\�����JUӸގ\�GR\�f1� ꫟��\�W\0\�ߣ\�����QJ��m��\�#��]��S�\�\�B�O\�~\�yh\�\��\�ٓ�{ܢ\"f�M_�\�\�G���2\r�,U��\�\�$�����c4s\�\�P@\�\�&/�\�\\�Ό)G\��JȏM\\)W\�,Ƀ\Z]�\�\�(��H�\�\���\�\�w\�y\��\�]\�Sp�l\�Y��(Du��5X!(�\���\�\�s1d\�0\���6\"�\�<ۗ�ӿ�Jm�Vc\�\���\�\�Xѻ:���\�-td��pM^ϯ\�[R\�≠l�-\�U�x�aV�\�\�H\�Z`�\0�pi/\"�>Ib3EU>\��\�,\�t\� 0{\���W\0\���~.��D}\��\"7`\�\�@�\�nE\�S,6\�\r|1`�\\Y\�{�ՂCǉj	\r\�C����c\�6g\�r��Je:;\��9��\�d��6�k�\n\�db��l{�\0݌\�\�:�C\0JK�Y\�!J�2�\��Q�\"�iEi�t�݇\�Q\�TU\�\�Y\��D*�3\�=\�\�\�\"9+�c2ŬN\�Kf\�\�,�e��SM�\0^f%\�b\�r^H\Z\0�\�+Cg\�\Z\�z�!�\�Q����Ij\�\�y�&�y��\���Mh\�\�NFa4i����\�F\�\�7�K�̙>M\�.��\�\�\"�x�PU�\�E C��A\�au\�t>��h \�F��ud��\�j�cs*\�`	�s~b#�C&sZ\�D�\�\Z\��9\�1VM&\�\��\�\r\�e�e�`�\\�\��rP;Н\�\\�\�P��n\�0\']Cl\�\�<\�2\�\�q\�\Z����\Z�J\�\�\r\\�1�J�UA�\�-�8,}\�\�Fóew\�\�,w\"@eyX��lP��h\�ω��Q�<\�r\�-�V��søj�}AR֕k��(\�nσ)��c��,�넭B���8>`��f\r|a�a�\�>\�\np~\�P̀1^f�\��noXe��F�D���=n\�5Ĕ�y�\�[�\�fD�\�{�=ƿx,�N\n8F>\�Ef�p\�~\�h(o\�Wr�إ3\�\0l�\Z��J%E��\��\�J6���\�\�\�W6oL\�.�Ղ�I{�\0i��\�$&+�w\�7x\�#(.\�ɿ�0u�\�U����.\0W�Y\��eb�ѫ�c\�Y��\�]�\\PPqP\nHm[\\\�\�\�\�\�u\�\�\�\rR٦���Ȍ�E_E��A\�\�\����0H_�oб|2��\�n��֢>�\�\��\n��\��.\�W\�U\�t\�W���G�6:\�\'\�\��\�','shannon',1),(9,'zilvi','$2y$10$MmIxMWNmNjM5MzY1ZjFiNOAQp2hpi7Zn2oxSCfViEMRo.MpbBLp3G','Zilvinas','Pikelis','Male','1990-06-02','12 Baker Street','Peterborough','PR3 A33','info@mrzilvi.net','07989139133','I want to be able to run a marathon by the end of year.\r\n',NULL,'jake',1),(10,'milad','$2y$10$ZGE5NjE4YjA5OTVlOWYzZO7Nwp0ArPKtH5nxQuLR0AdDw5VDrwhjy','milad','milad','Male','2021-08-19','asdas asd as','sads','W5 7OP','miladpegah1999@gmail.com','2323123123','want to improve my \"beach bum\" ready for bikini season. ',NULL,'jake',1);
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

-- Dump completed on 2021-08-27 19:31:34
