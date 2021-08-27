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
INSERT INTO `users` VALUES (1,'shann','$2y$10$N2RiYTU5MTQzMTIyMWI3MOlan8QhOS8ser7e4APJe6aiZGpjvlO72','Shannon','Greene','Female','1992-04-02','USA','Virginia','1234','shann@gmail.com','07912431667','I want to get fit for my Karate classes. My dojo sensei says I\'m doing well...','','jake',1),(3,'joakim','$2y$10$NGFiMGE2NDQyYWFjOGI0Nu7MhbjJVTxNSL0J40jjS.GAlr6J42116','Joakim','Randy','Male','1990-06-07','UK','London','W5 7OP','joakim@gmail.com','0793457234','I want to improve my \"beach bum\" ready for bikini season.',_binary 'ÿ\Øÿ\à\0JFIF\0\0\0\0\0\0ÿş\0*\0ÿ\âICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \Ü\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0ü\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0¤\0\0\0bXYZ\0\0¸\0\0\0rTRC\0\0\Ì\0\0\0@gTRC\0\0\Ì\0\0\0@bTRC\0\0\Ì\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-XYZ \0\0\0\0\0\0\0\03\0\0¤XYZ \0\0\0\0\0\0o¢\0\08\õ\0\0XYZ \0\0\0\0\0\0b™\0\0·…\0\0\ÚXYZ \0\0\0\0\0\0$ \0\0„\0\0¶\Ïcurv\0\0\0\0\0\0\0\Z\0\0\0\Ë\Éc’k\ö?Q4!\ñ)2;’FQw]\íkpz‰±š|¬i¿}\Ó\Ã\é0ÿÿÿ\Û\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(ÿ\Û\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((ÿ\Â\0\0 \0 \0\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ú\0\0\0\0\0ì‰ùEŒÈŒ\0d¢.A‰²#fb@˜Dš4]FL\ï $\õˆ¶*c\0\0˜„&\0Ä¤³Ç—¶\Ö\"¦aBl‰$0”’j)9y\Üø³\çV\ì5† h\0\nI–\"@\Ôed[k\Ê\îk\ì\ãWI®œÆ„B’j)Äj¹­a6\åRB\ó›U[\Üútdù\É\"¤D&EÄœ›\Æ\ÜD‘ªV¢Ç\ÏÏ§¤½]œšay¨c”½\â»_7«¢Ú¬µ\ôy\â3Y\Æ\'4P\ßrR\ó\ï¦\Ç-\ö\õ\İ\ËÂ¾\ÃM|‹¨\ä¯<Ş¿N\ÍÁ\ôıüÖ¢5œdId 8]®{:\ô|\ö$\ß\ë¼Ï¸«QbMo¹©\ê\ös\é\Ş}w\Ó\ç\Ñ\ìEU\ç„\ÖLm¬52\Óh\Â\ÎkH¶\ÚN¥«¦_H\ç-8‹xù\ãS´´w«w\åÙ”%/£\÷W\Ø\ã\Ùÿ\Ä\0+\0\0\0\0\0\0\0\0\0 0@!\"$13#%42ÿ\Ú\0\0\0\ê—\É\Í:)eA\n!P¢\æb±¶\ñª­\nºz+§\ó[\ÛtWo¦\Ùüı\Ûü\ÚşŠ\é\ómúù¸¬l»?¶*+9™¬\Ök=\÷)-¸\Ñ\Ë\Æùzø–\íX\ï\Åc‘Š\Æ\ÙjÕ½\ÍÙš\Íf³Y¬\òŒ\â$Xj\íH\æŒg¾Ï £\ê@\ò.2P\×B6—€\Í8\ö_\õ‘\ßDe\Ö	lTXœ‹Â·Ã«\rF\Â\Ó\á¶O*\ÇheBˆ»º[È»¿\×h4^F\Ö6\Ò\ïo²i\Ò,T\Æq®\è±-0i\ñ¤¿r®W\ä-¹=­Õª\èv§\àı\ó\Ü\öB™ \Çu1h©\öqtu\ÖI\Z~#²Ù¨\Ô<\Åx˜Ue[Š\ãG¢‘¢\Âi&•\â\â„\ÊDÔ\\Õ™\Øu½ú£\í”ş9\ÕR”i\\?+[ıv”\í	t[™\òÿ\02»(‚_QÉ®«·=k‰Hf­g<ßĞ•\n3\ä°X­A‰(-VG¢w½£*)“\å\ëËœ\Ôù\\\äcWTOj¯¸µ+ÿ\Ä\0\"\0\0\0\0\0\0\0\0\0\0\0! 0AB1ÿ\Ú\0?\í¬uz\õz\ó\Äø\çS\á\\a\\_0X\Ğ›ET,«FİlncB‰\Ú|­]?­Å¥R\Û\ZM·-l\"š	8_-…»K¿Wÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0 !01ABÿ\Ú\0?\Û9\Õ\õ«\ëL¯ošû¶S\Ü\é\Âk¤Xh*\àî€#Gf\ÂD®Ar°”*Â¿ÿ\Ä\01\0\0\0\0\0\0\0\0!1A 2@Qq\"Ra#03Br‘¡Á\áÿ\Ú\0\0\0?\âÁ\Z\ğfsu‚›lx:^\\Mºw“¼\ğc\ò_¾\rŸ’=x:b\È\õ\àÙ–H\ğm&@\ó#‡.\r×¿•[ƒ}\ÆY~•\È\Ö\ÜM\é\Æo¢hM\ïÁ²`M\ãıL\Ğr\Ús\Şa­JÁÙ›\áy”\çWª\\\á\Ì&¼Ä‘§\É\Ãyx \õ:\Ù5\Å\ÒB\ÇL\ÈÙª=P\Ô\ß0\é\ôŸWxa¸@7&ù~KX\ã¼\ä>!\æ‡\ÄL,\Ë\Ø\İ\ì\Â“·J.ÀC~£Fs›ü˜\ĞP¹€\ä.1 ^,‹=\'f¥w\ä\Ñü”\ã_|™›G³µÂ¤a.:\á\öš¤Zl°Q©.‰ˆÛ“¢³§@ú‰)Ñ˜Q\ê]IÁ¯Ä©­Q\ï>ç½·E\ö\ÒNƒl\Òk€§…Ú€^\ZUÇªiÜŒd±=ØŒ\ç\Ü\ç¿u¢J—g\Ú\ŞI\×\0Í‘“\Úu{mHŒ‚\Â‘œ-à·—üN¥\Ê\áJÃ­B\è\Ñ\é\İ:„,\à¼ùLw	<\Öbr„	^wŸE\â}¬ş\Ö\'	‡uº•ˆŠb\0y§\ËX\ë\r\Ôp›r: uiE\ßhT©´˜h”z\'\õDwpªL&N5\r\Ş\÷_ÿ\Ä\0(\0\0\0\0\0\0\0\0!1A 0Qaq‘¡±@Á\Ñ\ğ\áÿ\Ú\0\0\0?!Qj´4UPª\à&€!¸V›<’mT\èb\å½EªŠa½N7\ä·\à(¢ƒ\Õ\Æ+¬¼QEª\æ\à\Ö\ë=¥E^:¨¹ª(A£‘6<D¬¾¤¿\èt\æ\Î~¡;	Xå¨¢\ÔZ»\rGešŠ2rWi¤bTJuE\Ó2«’Á³½\Ãøu!ˆ\îPb5(»\\z-EÉ”QE±\Å\èP·\ã1˜Ñ£pq\Ç¤ OKˆ+ˆ\Úb\à&\Ë<\n(\Ç\ØK\×\n¿\È%\È\ö½\à\Õ,\Ç%É†*\"É«\ÄoPDc\Ò\nX\ìzGz)R^?\òšQ\Í\É\Ü\Ë*}œ• \r\ÄDCt\Ì\õLc2½\0\Ê\Ü\îxCK :a	±[ v\rÛ”j\n£eº\òNqo»ÿ\0Œ!]›3\÷zyø\ïˆ\èxkY\Æf(‹¾¢\ó)\ÉM°6×•\Æ3\àcc\äıüEŸ‰k 0w\ë~Ş¢\Ãı€ş\Í^‘Á€š\'yA`Ô­1Lú\ã<\Ğ,ı e‹\'´\Z`@\r£F0\æo$OÏ„\Ğ!È£v\ì\0\Òh?°ˆ“‰&R\0†Ï´Pg\"$Yx(ş~\Ä\\&Ó„$ %`n¡¯\Õ \æ\'\"€\à€\á V\ÒC*º–fz7\'\êga0\r\ÑøLÀu(\ïS’\áÁ4Ø†\0\Æ	I½\n{ª£ 93	¹\0\ñ\âtT] \0\Åu\èş\ÊWDƒü.[g\Ø\à0\ê\0+\ßlÿ\0Y°…o\ç±†Pfú˜—oX>Q\àsš\Ì\Ç¨€\ä\Ö{ Iv;tÿ\Ú\0\0\0\0\0I¤-\0±\Îk\ë\Û^L\Æ\ë\ï¦t\Öt»À\ñ\éZ\Ï~ÀhZ¼\éK\ír\Ò\ĞQ;(µü\Äı´®\İø]\ñ\à¼\n›\õxcD\Î^å·¶˜Ä ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0!1 Aq0\ñÿ\Ú\0?\Ì\Ög„!›şIO8™2\Ğ\ñ\n\"&,§HB$pxª(‚¢\n\Ê\Å[„ª\Ó\"\Ü6X\Å5!\á\n2\îA6B™4o\Â9º\ğBn‰\ìJ\éWL¹†zQbb\ê#]\à\Ñ\Î\Ò¡weo\êşŸÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0! 1AQa0ÿ\Ú\0?¹»\çJQ¶¿•¼\éx)\Z+\Â\ñÒ\\&!³dd!¬6’+N\íUGC’\ÙqF\Ñ5h\Ú(\ö \ë‚R.—PL¢p\Z*\ğNC\èGûlŸEØ‰¡Ä¶)¶—Gÿ\Ä\0&\0\0\0\0\0\0\0!1AQaq‘¡ ±\ğ\áÁ\Ñÿ\Ú\0\0\0?\Ğ©¶q\é,² .g3xC9Ì£¸¥J\ÑR±0„%A·ˆ_%\ÇebT¥¥J„©W2\ŞT¨¥¦bÀkB\å±À,€p\ó¢³*¨b†›Jh;F°%F©XD•to_\ÔE\ğ\"U\Ö	‡œqV€jFÆ¯Q€A\É\Ù/†XZ\ä\ì¤Ú1P4UJ•*T¨iP# °\ï\à6ÿ\0¯¨p²YL†\×ÆqĞ©R¥J‹/J\Ğ%^‹J˜m¬_ù\ÃPÒ‡B\ŞQQ«\ì¢S¢#¨\Ô<h\Ô\rZ¹‘·\Ó0ê–Œ\à\ó[—üYW \Ê1\ë,K@¨C¯D\çv\'&~¡†À£‹¼¹^\ér\ô½	R²¥2»\0\ó\Ğ\Êc%)l	\í²ı\ómx~¯$©Qƒ\Ü+\Ò\á™iP!\ëP®\à]˜.\âL\ÒWz \rRKn\ñÿ\0³=\Èç‰œ¶‚¼Ê®g\æ1(Ÿs\Ã-£9\óƒ½\ÙlÄ±‚(\ívT\í£\Ï\î´*“\Ò¿S\Ñ)Ö–o/¦¬²\\¶\\}D\Ä/¼\n¡\Îÿ\0º@\õA‚\å®3\æ\Z!<\ËM±\"`‡§R„¨er\Å\r1\ày\äL­*T§@\öQ\Ğ`N m24\Ù\ñ-\Z\Ğ¶ÿ\0TDTf\×\ÄEX’½Õ†\×­w+ŒK-\Ôa¦\ÜT{}ÀF€±\n)\Ş$\Æ\n]p»ÿ\0—/Z:B…¡ººŞ¢”€`´_\áÿ\0}nÁ\ï™m\áy®4\õI‰‰Z\ç·j«\÷$q\İRe.ı\×S’—Õ„4.\Æ\Ø\ÌvZDj­¶\ØÚj\å\Ëeÿ\0 ¸\Ò\É_\ó¼@c*uk\öÌŠx\ÔÁe\Ú›Ä®‰\np\ô}—­[\ÂY½)¨B[ \â¶&Tù}«\Ù\Ú[Cr\Ã\ÃL\á\Ú\ã\é|5ƒu²‰z\\¹r\â\rLo	†vlˆxtAH\Ó<n4?A)Xty.Ÿ\Ó\Z\ñ´\"~r\å\Ç…@Y\Å\ã\Ä1\á°t\òl>ˆ3e\"Š\Íb%Ù§¤9\ö«¹\n;\Î~2ú\ĞeË—7§ƒÊ—Š]m0*¡[o_–Qx&ƒ1RŒ	lü@+FÀrwsûù\n¢¼¹qšY@¶½ƒ)w|X}\ì\Ël!\ê­\à\æ4#”\Ê2J«†ÿ\0‘G¡¬D\Ù\ö¢±\ß\ì\'Ô¶„Am ’\åË—-^F\Ş\ò}\ó\0o^…\n*“ıP	š6n\îŸ;…Y«¾[ˆ`	\÷“üTPw¢\ßrı\î\\[¹QÛk§ÿ\0!\÷>V!\İJ\ğª\ê\Û\Â\Ş{\0^*dø\í2«#’`­£:û¸/5½u¼¹‡Gf‚•¿\Ì\ËK¥’:•…•\ò.\Óv·?†3\î)i\ñ‘#\ÆaK‹\n\ÖO\ß\îZZ–…r9\æ#(%\\[e47\ò[´\r\Ú\Çj\á\Ï\ê [m`\Í\ìWq³\0Y…\Æ\Ş¹ƒY\æ\ÈÀ‚¤\\\âV\r\ÂÇ°n`²\å\Ôi\çÄƒ/.2£2´Q\Ë,”}—\ğF[GŒ\ï^Oÿ\Ù','jake',1),(4,'Srez','$2y$10$Mjc2NDFmYzdiZGUwMjc4Yui.7jHirVPd8.Rerrc1djVlO12hngTIm','Sediqa','Rezaee','Female','1996-07-19','1 The Road','London','NW1 500','Szres@gmail.com','07123456789','I want to run longer distances so I don\'t have to take the bus everyday.','',NULL,1),(5,'Hassan','$2y$10$YzJmYjI1NzYyYzhjYzUwNer4b6ZEVW4Kf66XaNmZ.CEjQpsy60dvG','Hassan','Azimi','Male','1986-06-13','54 Kensington lane','Essex','PR3 A33','hasan_azimi0@yahoo.com','07912431667','I want to strengthen my wrists and forearms.',_binary 'ÿ\Øÿ\à\0JFIF\0\0\0\0\0\0ÿş\0*\0ÿ\âICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \Ü\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0ü\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0¤\0\0\0bXYZ\0\0¸\0\0\0rTRC\0\0\Ì\0\0\0@gTRC\0\0\Ì\0\0\0@bTRC\0\0\Ì\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-XYZ \0\0\0\0\0\0\0\03\0\0¤XYZ \0\0\0\0\0\0o¢\0\08\õ\0\0XYZ \0\0\0\0\0\0b™\0\0·…\0\0\ÚXYZ \0\0\0\0\0\0$ \0\0„\0\0¶\Ïcurv\0\0\0\0\0\0\0\Z\0\0\0\Ë\Éc’k\ö?Q4!\ñ)2;’FQw]\íkpz‰±š|¬i¿}\Ó\Ã\é0ÿÿÿ\Û\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(ÿ\Û\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((ÿ\Â\0\0 \0 \0\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ú\0\0\0\0\0\Î4j´e×‚½a\Ğ+&pµ°J@\èT’B\0\ÙQ„§w´[eİ”\Î\êI\è¢\ÇH”¨\Ë}L”N±w+4\Ë\â\æV:¾p0 $X S^{\\\\U8‘¹c’F\ç„\ì\Ù2Æ¹¡*\Ã[‰e«¸(Tıú\ÄF^p((^\ÏE~hTIKQ˜\ë1Ğ¦­NO+\ËB¢].Y\Û\ãB§qd>|¹#Q²Ö‚œ†¢‹\Ñ\Ì\İJ@\Ô¥_S´c*“E`\Ï\Z®Y\á\Ë\"R	cn·*\Èhgˆˆ\ÆC\ÖÉ»–­¹6»wµ’)\Ğ+Ä‰\Ïp3~‹P–hGC2¦TQt\Èœ»q\Â `\ò\ğn\Í9l\ä\æ\ÇP¤\Ç\\\Æ&\\b xx´d\Ø\Êiã±GN¥c\×pF(\á1\ñ£\n‚h\ØE\npp5\nPK\Ü;Q¡‡è º<p„@\à³›‰C%Â®3*©\İÃ¤D\â%8D¡‹\Üº:)}³‚gz4i\ç,5\à;¸ÿ\Ä\0\'\0\0\0\0\0\0\0\0! \"1#02$ÿ\Ú\0\0\0°^\Æ\ê—¯±o&„°*\ô˜¦·%\È56P\Ñf{\';\ó“\óœñ°§?³…%wu†\ô_Bdı<ˆ\ìÚ‹dXAS\Ë*‡†ª\Ğ\Ì\ì5ªf>“V\Ã\ä™Œçœ˜\Î3\ÇX\ØZ\ñ•\Åa\×Z\Ú\äXct-m\éÀ\æª\Ü\\M\Ê\ñ8U\â\òg_`Yı|O\ãZ˜€u\ê;F\Î7İ®o² —lİ«İ¯\Õİ‰+€Zûuœ7ª\ØIOR\Ê5·	¿Q\ô?®sI\äOu\Ü\Ù6d+±`¯H,lC­¶µšÊ¾Á›·««/Ö°\ÅvU\Ô\ëY\ã¤H§aSq¨mr\Z¯1>CT|\ÆÔ˜˜F\íƒ\\»kY™´›i}{¤v­	.ÿ\0\Ë_­¶t-\ÙOh\ï1lmKN29½\ö\öS~´$²<U¾N½p\íª\õ\Ô|Iv\ĞJz/\í\ëa\Ù\ëf\óı\ö(_:G°3²z½—´\ê•Õ²ù²w\Öj`\ò\Üwş\äg\ÌbY\Æ)¸ƒ]´µP§`_v7¡\áµQ\ÕÂŸŒ°RnÕ’¬U^²½‚ª¶Xc\÷ş\ädpq\ò¦bY•\ö³­l\Â\Ù92=q*‚ù\Ê\å\ìÉ·:€¸~\õ\\`´”?ú;,\ç’\ÈÈœ‰†G\È[‹oF\ÔY‹\îkašVI\\„‰\õÁh\ÕYÙ±\íeOP\r\Úha©@˜´}²˜\ç\ÄdO¶>@–\ÌC\äUqv£\ç>¦Bz¸¿}r+û\ØÀU)˜’ÃœPG=z¶g\'\Z¯1>\Èù\Ê\Ö%GCe\ï­v>\êlR•¶’\İ\Ú¾¤²V@|\à\ñ3\ë\ã;°\äü­˜\õ\ñ\ç\ñü\È,¥h’fvr{\Åæ†Ÿ^?T\É\'²ˆ•yT°\ñ8M‚Pw‰šz\Ö\Ø\ÎqE\r…\ãû\âq\ï\\\rÖ†X¹j\È\õ\É\ëœg\Ækjƒ\æ­R¨=X\ÍgZ\Ñú\Ì0LdK\"\"1R±\É\ëœFvŒ\ï’y\Ìş\Ì-ƒ>\ÎgŸ\ï,“mBN\èBGûÄ”g9ÿ\03\ÎL\ä\Îs‘œ\ç?ŸiÁ9\Ïfa~\ÑÏ˜œŸ9\×8\É\ç\ñşgl\ç\'\"r~!\Ê\Èe–/\é\ËR6´¶Q23?Œ\Çú’\Ã\ÒP\Z•°¢&7ºÑ˜h\õ/1>\'ı?L\Ğ\îÑ#Å¨\ìutŸÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`ÿ\Ú\0?Iÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`ÿ\Ú\0?Iÿ\Ä\06\0\0\0\0\0\0\0\0!\"1AQa 2Bq#03@Rb‚‘±Á\Ñ\ğC¡¢ÿ\Ú\0\0\0?SEe8Y\r\Õ*©>vê–©•p´U3Ê«œŸ\é\î°c\"CdT™›\İQ¥›™\ÕªTÔŠ5´|\ÆÇ¢TT\Ä\Ï\ß\öXOúfÿ\0Ò¸XÀ<L1”\î\æÿ\0*˜\çp\İ\ÑkÆ «ø\ò,\È\á BauŠ2\Ú\É\ò§20\"74©gSÛ²Å‚jd\æH\ò\Ãr­¶x\óSZ\àf5X°\òÇ†s´ZG¨Sx\Â\â\ÛşFÿ\0n°ø¶\Øùb\r\Ê\ç\Ã\"VU\ñ›0±¡\Â\Ëú!\n@\Ù\êÚ¤™\ÃD´YrŒ\Ğt}Š\ÂwyÊ†\÷f†\ñc;\Ñ²\ì+ƒK=¿i©œW	P\İp\è¥\Ğ\Ş.Ò§\n¨¼3´;µ|F\Ï\ÃA¼•Po§b°\òª\ç\'lF\ÈD\âAt®J1 ¼= N\É\ï£3¶\Ûd\ç“$IÉ°Æ\É\Ü7a¿\ò²\Ê\êQ>†!\Î>\Ï\ŞL†\Ğ\Ü\Ëu7l­e\ÓÁT@¦Á °cé³º\"Ò´*E­.=U¢|V†\Ö\Âed\è’}\Ú\â*±’\Å.›¶(p\ñ¿	ı“\âºRuP\'¤8}	>Oe†\ó›¡Sø\ğ8}\è³ÃŸm•O`²ˆ\ÛuEÀd>¡û\òî¨‰¦İ-\Ô.“\õ\îTJ‰\ÄúŸ°\öMCF>\à»\Íù­K\án7j©§\Ã~bo?¥ÊšstB$Kv•…şÔ·\çC®\í»¡Ci¬M\Î\Z£‡˜8L¦\áù\Z\ÚDÔ˜r\õRˆŸªG”\Âh&QÛ¡\ê°À§²{\Ø\éEÙ½VpG¿)\ê\n5º€\ÛÔ‡Ê˜\É\è#7uHª¡\ä\'a¢¶ªr³+¸S\×ÁKµØ«\ò Ø’\Å\Z\Ù5\ğÌ¢z¿½QoE\òŠg\Z^F=¾mº,³0\ÊL\Ñ\\«\"\æ\Ü\èª×ª6¿)t»]0B#X ~jQ&\Z¦s	tX`V\Û)9\Äq?¢t7leee¬\Ïe7X\"\Ş\ì³ÏœŠ˜Óœ¼Áb\ğ\ò\Ä\õ³¯psN›§FkA‰ \÷OlXys\n¹Yœ²\Äo\ä.²}s·ç¥¹R\ïl¾\êMs—\Ã{\Ç\â@GŠ\ç´h	\ñ\å#º\Îq_\Ğh¾&…_)9H\ò\Ï5”_¯=6\ğ\ìŒ\Z\Ó\ê\÷\æX\ôK9IÊ’%\Ü*_§_ªH©¿Rº„\Â\âthYŒ6\öš!\Ã\î«ı@4]g>c\Êè½K\ç\ñ^4\ÓÀAF^ÿ\Ä\0%\0\0\0\0\0\0\0\0!1AQaq¡±\ğ ‘\ÑÁÿ\Ú\0\0\0?!z\ÎYu\á¨Y»\"\n na\Õ}K–\á`–\Zlc\ßq\î\ñY\Ê\'2GËƒ˜G2(dˆ\Æs.3™¾k‰O\Â*f…\á\ê\ğ Ç¢\ãI}µƒI>A(gL[¸Sø1‡,c\à !|,ª\Äc±8¾®Š@½¯‡¢\å Å…\áş‡)]D€|!Ä¥Êºı\âœ\n#5ƒ\ñq`V“!`F€5\Ù+w\Z\ÍM#\Ü5Ä²Š;”©\ëqŒ.·«:N)R½*y‚µ©\ì\ôÌ«8?§\Ä\Ö`®·m\ïq}qNÆ¹x[mG;7DÉ‰l¸\Êu«·œ\Ö\æû=\Æ\Ê ¬O\ö\\Î¥~}øP”\Êg\Ùù…E4cŒş\ï\Ş\ß\öÿ\0\ö\Î\ÏR\Ş\Ò01\Õû\ÌF\nA\ã\Û8w>	P_\÷Ü¯\rQı2•\â—\àj`‹–J±˜\ò®>3{†\\Zq\Zš&\ÓP\ÉVv\ë™|9’f\á\î­B\Íe\åøcŒ\ÕU¢ƒ€>Š\ñ\è\ÌÅ”Ù› ´¯dı¸—0W\àt\ïR¹\Îo\ì\ç\ÔRı.¼*ƒrª_prU\ó8#k\"i;\Æ\à¬7d.\n£\è\ËI\Ğ\\#0\Í%&\ô\ô m],c\é.&L7\ë\rƒm}“ß€	r{~b\×i“\é=‡Ì­.a¤>v´\ÌBQ\Ì”>_O‰l\n\ò\Ú<XTR¦g\Í_$n\Ó\éŸ¸6\Şø …\öyMÉ¹;Q\ŞGm\\?j\Ê>=^\âg5jX¸\'o\Ù\Ô%“uù`\Íšo2°Á³\ğÇMZ&”ˆŸ¸=zK”\Ï)£\Óø˜y\ã¥z\õ†´\íû±ø…u¤¸&SV¡MBMşYk™`\ğq(\Í/f§\ñc1G1Øš„\ÃnûYj½½ÀM±û\"û_Ze¢=\ê[?`\â +”®º¨\ä\' u¤º@7\î ¹\Ö\ì‘€\ír\îG$Â¸]©_ù®\àW…Ppµ‚P\ğN\ÙC\Ì_€\İ\îm¶²dG–†[¸\Õ\×,}Ï´WR¿(”\\£$WhÛ¦$»Ñ”`Ù›Æ•\õ°\Õ!M\ß^^Ÿ\'\Æ`”\ß\nÁI)\Î7\ğ™-.+™—U©Â¸KAXgƒ\İE›Ë½\Ó\êS‚µÕŒĞ¡1V\ê\ÊT}\ZtV%\ÌG\ÉÊ9g“\ç\ÔZcj)±L\rS\óÿ\0\Ù/\0^#\åCL+Á¾¿‡ı—C\Ù48{Iø\Â%#\ï	’J®\Ï\Òÿ\0¹²\Ü\\d®Gi\Æ\Æ=\\:|¯-\Ê\ÍŒŸoù>\Ò›\òù‰™$Y»ºúúŸ9\ó\"‰…\à\ö°™s‡\õ\æ8£½—–\ê&§dşz¼	úq2\Ë\î\Ë\nÍ·n¾\òƒ„\è©w4Gû•\Û*m‰XY®—\Ü\"\Ë\â„rJ\ä¦ˆ€\n­2­6h!NG®“5?H[y†3\Üx\ÏI­\Ë_^+i€\Ü\×0X9!C‚^88c†a¦o\ä\Ìø‰ªWøSi‘®Y5†l\ÏÑ%\÷\â„h‘G\Ùr\Øş\ñÊ¹^)\ó+.|Z›•£Ÿ\äMR\Õ™û¾	R”.q\æ¢2\Ùüg0x¸ÿ\0*\n\0\ğ\Ã\Ó»ÿ\Ú\0\0\0\0\0\ñ„\0B \ÒO<J	\à,\"01I4\áC(ƒ  ƒc4ƒObI(p\É°@<0N,B “O<J<\òL4#\Ì0³0PŠ<ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`ÿ\Ú\0?Iÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0`ÿ\Ú\0?Iÿ\Ä\0\'\0\0\0\0\0\0\0!1AQaq‘¡± Á\Ñ\á\ğ\ñÿ\Ú\0\0\0?Ë‚5aqc`R\÷s†ª,°\È\":!­¢ºe\Õ\ËÁ%Ğ¼B\Ø\è\\\á1\îe\Übg¢œÔ c±uÁ‹•7r\Ä%KI\å\0T:$X7¡–\Ê-Â”\"V\Úlk¥L6¾\×>\Û6ƒÚ¸2ek:¾\áN%&\Ç\â\ßûœ \Ê\ò\ë\âbÅ—L¤‰,ºT®\à¼LÁ\ÕÀşDD¸»ûüp±\Èjü\Ü3«ª9v«Àl\ÃœTw]\à¿\Ìa@d>ûø–\Ì+i[\ÓxDt\Ë\Ì@E vĞ g\"¬¨–‹(	„Nk\óC\Ã(\æ \ÜXü\0\Í!\Äk\Z\ábWiDÃ§k¬\Â1zA\îT†\ÊZSucùÎ´±\ô\ôø+m@Z¼ï€0½¯„9¨6\æ\é%h>r\ÎJ2?\âVƒ	\Ù\Ù\Ã])\Õ\n%„1cAx¼\÷e\à°SÈˆ$ª;\Ó<<=\'%fg\ño_\ë\Ìj¾å”·3Š€û`•”l„‡\0A·TÂ£fv\ó/¹R\ÃD%¼w\Ò\nI-\Å7T\ÕË¾|G0\Ü\Õ\Ù\å\n[-™RUüÁ\Øø•;k §€\Ö¼E:\É.“•\Ò;–Z§,Õ¹®¼P\ê¢Q4\Z0o\Ï$¨À#¶«Ù¡v	\æÀ\àÍ„\Ã\á\Ø$ş@pø±`\Ç\'d2J^<ÁG\0\İx”–=zM$e˜OŠ`\Å\õ„R\âÿ\0€\Å]e\ò\Zƒ=Âš…”&hRùvFAa——\Èm\n‰8F¯\ß*­6z—\ï“0Ÿ7\äaN\" ˜hør\ì\ÎQº’R-¯IŒUš*\ğ\Ä\"\Ş@;|\ÊJ\ì±Inù|,|kV\Æ\épœ•–Z‡\õ7\×dCh7\Ğ\ìa\é¼4M¾*¢®\ÄqeC^4S\Õ\Ì†\r3„;\İ\÷˜‚\"ùj<ap°\ì‡|p<Z\nWˆTjhN¯\ò:€˜G\à\è\öx¬\Í\ñ\Z¦dN/J sÆ¾kG¯MÒ‡X®\Ò& ?\n£`µ\"ˆ•¯Zg(†\å{vºU\Õú\\l\÷@Z\ñ\ï˜\Zk¬\ìe\È5MµNúL?©QÍœµ™ª.½L\Ğ\í\ÙÇşbF˜ST½_f\Ç\Äy\n\Í\ôF¥uÅ·;\ñ)Kƒs`o–ƒSlHø\Z\'©Ù\Õ\æ*8\"°Ã²[¹yø\Ú+qb¤¦›bÅ›¸\ñ“\\\ß\í1:Ï˜•Z”\Â\íiûƒ.£­‡±\nZüx„0\×u•ş&HB\Ş\É-w»¬\ö~\à,“b½€4\rWÜ· ·m\Ñ\Òº±0\0µe½\ÊQD—`\Í\\\È;\ÍRøG$4‹W_¾5\'\î-	S¥XŒh^Á?\ì`·)F¨ÿ\0Æ¡\ò¬^‘]?\æ\rQÁ§~D–mQµs¬\"û\ßùŠš\ÙwJ\Ø\Û\ô\ÊZ\0” ¥r\nm+=\ÍpUK ‚\Ú9Cÿ\0lf_\êjáŒ’ Vcı\Ä1\Íf€\ózŠi+\ÄJŠ¹\ì§P\ë\ö\Ä\ÅHşc\Õf¿ˆ\ÉEXŒ¬\Ğ3\á\îa`Y}	h8\ñH¯¹A\ÜvødLZ\òÀš²T(v9\ğ†ª¨Vß”ë²¯˜Á.½JX|K0Ö¿™DÁVK\Ú\Ş2\Å\Z«,\ÔQ†³^„\ÉV+\É\ñ‰N`Ö E¸®\÷1\Õ\Ó\Zº,¦rJ„\Ù\å\Ü\Â\'c3ÃšeT¡ –\ãr\Ä\ÛSXS‡ü\Ê$:M\âÑ¥rq\Ä|•¥cXŠo=ª\Êÿ\0]¿\Ôq(å½¯¸p\n\'–p\\UW€k\ô\ÊC`°\Ü\äü£\×À\Ó\0*\í#„†\Å2c/X\0‹v9\Ü=\å‘T\Ş%•9»d\0¾»f\ZzŠ·1[\Ú)\âş%låŸ¢SRü$G9º\Z~ŒY!³V%\ÓÆ‹\â\î¾m³/•\ĞE@¿5¸«P\"U˜\åg7a\ğ5)\õi\î	\0© \r\Åk|\Ù_\÷@³\Ìgdf¯‹ƒ[¶©j\Ù«ü\ÍÈ”{\ó	\ÏÙ—\é\õŒ·\'feJ\ÆJ sªÏ³\ÌQcÒµO7¬J…\n£\ò\Ê){ı\Ä\ö	LP\Şİ %“Ogsx\Â`_\Z?0 ^À¬}K\Ô\ë¶mµ2?mšcûX®ƒ\ê_Àìª‰\\Z\í™ÿ\0oª™±$]\',\'>¹—\æ_?€\Ğ,¬#\Ş ú´;\âU¢RD\ê±=\÷Y¹»\Ø`\İ5±¤€.søšÛ™b­q\Ü,\×R\Î^ƒ˜\Ò\İz\"­S‚70ùÈ¹\÷\É~\æ4¤\Ñ\âTª\â _^¼“\Ê~4\rN\á²ŞŸ	5·gC”•¬¹Ù·\Õ\Ä\ó=\æ€œ\Éw\óÂ¹N‘8¢^u9-¶¦(€[0Â²#\ÈÇ³³˜3\Ø\Ğyq2f\ğ~\æNªŸH1\ÓAªÉƒ\óA)\É_‘\â‡\ÌÉ‰‘O\Èa«\ÄO3*\ç\Èú\ï˜P\Ät \Êş¢\r\ô•ı,@ø¥	qo\çz™2	§¸$(\nø‡P¢\Z+ú?ÿ\Ù','shannon',0),(6,'JakeB','$2y$10$OTZiMzczMDczOGRhZWIzOOMr3BoUmr1Bpiv1Lgwb6PiJPL.cQ3TdG','Jake','Berry','Male','1990-10-11','12 Baker Street','Peterborough','PE14 IXT','Jake@yahoo.com','07989139133','I don\'t really need to do much more,  just a tune up every now and then.',_binary 'ÿ\Øÿ\à\0JFIF\0\0\0\0\0\0ÿş\0*\0ÿ\âICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ \Ü\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0ü\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0¤\0\0\0bXYZ\0\0¸\0\0\0rTRC\0\0\Ì\0\0\0@gTRC\0\0\Ì\0\0\0@bTRC\0\0\Ì\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0\ö\Ö\0\0\0\0\0\Ó-XYZ \0\0\0\0\0\0\0\03\0\0¤XYZ \0\0\0\0\0\0o¢\0\08\õ\0\0XYZ \0\0\0\0\0\0b™\0\0·…\0\0\ÚXYZ \0\0\0\0\0\0$ \0\0„\0\0¶\Ïcurv\0\0\0\0\0\0\0\Z\0\0\0\Ë\Éc’k\ö?Q4!\ñ)2;’FQw]\íkpz‰±š|¬i¿}\Ó\Ã\é0ÿÿÿ\Û\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(ÿ\Û\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((ÿ\Â\0\0 \0 \0\"\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0ÿ\Ú\0\0\0\0\0’\'\Ò\ñFÉ’ \âXB„rŒ„6 l\Ì\"\é™\ÎA\îˆ\İ#\à\ÖL‘=¶<°_,\ìN–\È\İfN\Ë!I[Q\óøjªª?Š\Í=\Ûøü½°n+úc\'^NC;\Û-m\ï~\"%h2NE•\É+u\"\é:›#‰Î”¡¢\ç¿D‚&øû´9\ë\÷)³ú\Ê}\ÑÑ—Û\ä\Út\Ê;«À\à*>üaY:\Æ*\ğÄ“·ÏŸ\ì‹ŒÌ„}Ote\Ø\î8ME¤\"ƒ·=ƒL\Õ\ç	\ê‰h7É­a‘|ÿ\0`¹½7›—Xœ\ö\Ù\Ã0½\é)z\ó²Ÿa-\ØÔ™\í\çxHmg–›5/£*O\×\Z\0n/*£Î¶?\éølhZRê©«BHhšnk8›\ë[<\Î^\ê\ògz¤‡:†m\à	\Ñj^M--Œ(\õz[\ë2še\Î~\Ê\ÜE•Ğ–\ÔJş>|\ÉÙ \É{¥³6F\ç,Z!·µ\ã^\ç>“\Z$TN‘hÆª‰\ö>¥e«¢¢\Ö•q›(‹\İß”j*©7}[C©Â‘Z!\òRš¨\'\Z§ÿ\Ä\0(\0\0\0\0\0\0\0! \"120ADÿ\Ú\0\0\0ú\êjjké¯¶¦¾½f¦§Y¯\ô\ë\î§\Ùš‡\ã_]|‰©¯¨mN\ó¶ÿ\0\ÖZç‰§\í\Ş=‚1\ê2–o\õj*\ÅX\0P\"5^Fl$Y\Ê¨\é¡\Ç9|zWmpµ\èmL#\è§x\\\Î\ğ´c,°ë¯\ÉFMUW_\ã\Õø\Ï[D\ò\Çza`ü¾›ù\Ü1£,°\0n«\ññ€š#n+\ß]Œ>\á_:šù ‘©Ğ™“ıÿ\0´\ÙØ¦¢\Ùù5ˆ™\à[©©\Öjjjjj~0\ÏBX\àW±eu?új\õk\Ñ\ì\Ö{r8\å\ñ\Ó\ÇFY©©©©©\Öu„k\àË¹:{a\å*u?d\'±“jQM/VEY@[E]|;Sf¥·W\\\ÔÌ½“8\Z&ju–&\Ñ\ğr.Ê³\ö\á\ÊW«²)\Ç]\Õ\Îú\Ã\á\ò‘-\\“VP\Í\ñ\ÙvA9\æ[X¾\ï#Q\È%\İøü‘‰eª©\Şv¥c¶F[)¡\ë;[„OkÈŸ/˜2úk½Œİ’\äÅª\Í::J™„]Y™–…\Ä\ã\ò<˜¹<‹P\ÙVV\õ_j+D±»7v\íq\÷ÿ\0G²¸\ï*\ã,cO‹*\Å	\rNg‚*\Ú&i+\Ë\é3\ó;×‹\á2\ïª\İ-ûK­VX”\õ­\Çib\Ø|nE£z‹\â)Ç¬YP­?\Zšš›ü\Öt\âºT\â\äŠ\Ê\ÑVJ\×\âs8\ÕW\Ğ\Ñ*\ñø·ü•¡1jv”aK;\Ñ8\ê_\"üŒj\è\Ç\öÇ€EN?\çú\åü‚~-¤6-¢Sƒk\Ç\â\ÕV¼5S\Ì“#\ô\İ;~»¥KG#Á®°~r=\r\Ã\îvjr+–%t¨+TjÇœ	©ú<³\ô±\ÔvZ\ÔŞ‡“\Â\Î\ğgvE\ä\Ô&E\ŞJ\ë|½/Ñ ³~\İ\ñ$ğ ššŸ\Î\\ k•\ÈQ“\Å\ßn-¸\ï“?\Å[e¯\Ä\ÙÖœV‰‡@96×Š0\ó,¶\ØDÖŒF‡Fÿ\Ä\0!\0\0\0\0\0\0\0\0\0\0\0\0 !01@qÿ\Ú\0?\ö\'\è\íL\ÇF\ãI\æ\rtT·\Óqiù¨ı*C\ã7‹#¶ˆBe¼!\ÑNÑœù:\n\Ä.4¥\'Î‹\éÿ\Ä\0!\0\0\0\0\0\0\0\0\0\0\0\0 !10AQÿ\Ú\0?üwg1§u~\Í{\óTB\ÕU.Y \ØÙ£uH\Ëül](Ø±ui9›ø&R”£\Í\ôS\ÎÆ½\Û\ğ\å\"ş\á\æ$<¾\ğk¼\é1\ë¥?ÿ\Ä\06\0\0\0\0\0\0\0\0!1\"AQ02Raq Br#‘¡±Á@Pb‚\Ñ\á\ñÿ\Ú\0\0\0?ş[o\á¯\Ú\à¬+ƒ¤œ(\İ£¶ºÆ—6D’ƒi\÷\\`¢¯\ğ\Ùz+e_BG.\Ò%K\âÓº:ª…­m\Ç\r\Ñc	\İ7\Òt\Øq\Ñ4R\É\çşSCmÌ¬û—\ír¶\ó\Êv€;T\ïlz­­f\æ\âg´qv›\ñ\ò\óOùŠş\Ï\ßKtXOµ\Å×µ{M:~(\íH‡ú¢z0£·\Ö\árŠ§T\"Á<`UZv2\" \ÛhNg1}\ç\\	Ñ¡†\Âi]\èOe\æ3f¦m\"	@¼†­¢¨’£x”\ŞN*«*85®…\ö­\å0;O{\Õ6RzBn\à6„^s2\æÜ§C› N—YO7³\Éı;\ğ¥\Ó\'ª\".¦m\â)¢Ap\æ-¶\âršxrCø({H\õ\n\Æ4Êª\àoµQ\ô]S\ñK\Õ\Ìy\ôN¨\î\İ\âRBkE¶\à)y\Ğ8Bq\è¸\Ú\çX\\4\Ø\Õ\×ú.4}\ÏU´`‹­€ú\'GU&\ğ·\Ò6p\ïe6±¼\áHf—ac2\í\Zİ§«“š\Ø¶Ö¦<—q	Ê³GgI\Îsº\İE)Ê‘\İ\å\ä¬\ç\ÏYˆNÙ·tÁ0¿rº\éRŸ\ä}3û\ö6\nNr¾\÷1\âD=¶8s\Æ\Ğ/$#¸À6\æ\Ş\Íp™\â9\÷>v~cşû˜\Ò\÷+»ø¡À\\¤&±\í\Úb\ê\â}©ª-.~Ñ…V¨¨Lp\Ç%Å…Yo\0u‚\İ\â>\å7ß‘¶–ºÂ»¡w‡\ÑY…X:aw\\¨\r½O\åş\õ\0†\õÊ®\ÎY”\\\ò\Z\ÑÌªÏ«»k²vÁoE´^\èp\Ñ\ç§€]ùOcR\\3K\0<\É+¾\Ñ\è\Öyz@\Ó\Z*g\õ\Ò\é\Ìû<4Åº§,DYN›œN}¥Óª\Öp—rj‰\ÎÉ­©\í¡¶F\Í.ù—ÀaF\Ç9¾Bkª:?ÿ\Ä\0\'\0\0\0\0\0\0\0\0!1AQaq‘¡ ±Á\Ñ\á\ğ\ñÿ\Ú\0\0\0?!‰$¯\â\'EJ•*T:5Ò¥G\ÂD‰WZ„×¸‘:Õ”p0&£C0DŒ$©Rº¨³Ğ‘%toNŒc‘%u¨Î¥Ye¥\â\õ\Ò\àb$zYšË†‚ThFWD•*n\á†h¢ %\Å>0Ä‘×ˆ¹m\à¸K\Z\Ü$YVLı$\\\Ì\Å\n’\ã1jE¥J)	Esı\ÎB)(\\!xQ\ÈMDš,²\Ë\É\ç\Ô9,2Sf&·\Â\ó\\BÀ\à•³‚T¨:T#9¤É›…Y9¦\àE¥\Ï0PmªiX~\Ãw.\ÑG´³e\ò“ŒGh\ìtT®¥CQ\r5,mX\ñq¸\ì¥Y°˜ Q”5\ác\ÄQhú‚n\à\æ?ib{B\Ê8vÿ\0¨\ç\Ö\Zh:G±.C\n”ƒ†G\ê¦\ö[ÿ\0¬q*X–aJ–.e\Úo\ñÔ§¸?5.\òÀl¯Fw)|Ÿ\Ä^¶„¶.Xš\Ø<s\ç´\r•Š¾ø–cPW¨ #_R¹\å„7\Ôë¼¾µFş\á.\×K½YpWf ¹\\C…2\ÂÀŒ¥Kø’\î!	§3ƒbeJÜ­K=½\ö¦\å\÷*½¾Ñ\Ë8\ä\ï0\Ï\0I\ì\Ä\Æ°Şª[€€®\ğC-H—ù	\ógĞ‰½xK\ÃGx\Ì·A\n‰0o‘9(À\Åv(¹\ä¾\ÇHy0¶ ©\ÆS½\Ê vj \ó«\Â\Ó\Æ\nıˆ\ç\ÌC\âºÔ /s¸\ñ0T*>£\r‚büF\âOœQOW¢\"\Ì\n\ï3^\\¤§XU\î­\à\ö•™–\Í\Ò\ñ\õ;;5\à\Î\ïa\Ú³\Ú\æQ—W\Ş(TC5\Ş\\³¨8Â‰Ë©EJ)\ö™x#\"7ÀK\æ¼M¬ı™š}1/¶œ\÷Àc¦\ÙZg\Ì@|M;\0‡…ËŠ\æcD!\òW\Ì\Û{\ÖşA\Ùh~¥D\å\ï\ò×¿\ê>ao›…¥f«ÀkÅ˜_©O± \Í\óRÀ\ç\Øq–0uu\óŸ\Ø\"\àÿ\0¤©\é‡\r\óX\Öâ¼»¼ù‚£j+@[¨\0Ûµ·\n[9k½\áB˜¦…+6úf\ã/SZ¸\ØtT¢/Ä¿3\á\ö\Ë\Ë\ÜL\\Å³mKµª˜`ù„ˆ9\õ,dn¹IN[<\ÇPP\åC§\Ä1p[\no£\Óo\Ùÿ\0_‰\îs\ãˆ#‡f!\ã\Ñ)[´\Ò4\ğ„‘/%@\ĞX±}ÿ\0\Äss\ã€s)C\õdpªN*\åy\æ\" =a\áÉ·\æ¥FFz\íŠ\ér\Ü^>b2*Uù\ß\ä\Çaº\ÆfKxq=>e\Õ/Ü¤f{@\ïk\ÅË†™¦·\÷D§\ïjEz\Ñ0Š/(\è\åª\æ1¡µ¬\ì\Ì\\ …‚ À—\ãp?\Éø¢{™\Õ\ó*r9.`@ù¢\âbS0|\ÔAY\ï¤0€\\†.e}ø˜²gŠ\Ç\ä0ª\Ô0\ÇGş`ÿ\0S,u9b\ë²a\îY°\Øy¸%´\è\ÌÀ¦}\Û1‹œT œ c>³2\\Ú¾\"S²yD«Êˆ\Ş~ÀLˆ\Ö\ö\öˆ6yaM\ï\Üÿ\Ú\0\0\0\0\0}\r¼ÀhO¶–T9q–z(j²(¾8ù\à%\ä[×„x#Y ¯úY\nù‰4Y–\÷•\å]S\ã9‹¬\Æ\Î\Õ8I2\ôsY»\Ğ\ô¹«\Â\ï\Åÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0!1 AQaÿ\Ú\0?\ò¹q¬J\á•\r”¥(“d{c½´n¬EÁ3Ue\ä£l{“C\ô\Õe\È.PxÒ„;tb1D\Ùj\Î\ĞøG\Ğ\í\ËÍ‹²\àÎ–\×8’\ï*\Õ~F–‰!!>Nl\Ç\Ø\İ\ñ¨›VrrB\"#ÿ\Ä\0\0\0\0\0\0\0\0\0\0\0\0\0!1 AQaqÿ\Ú\0?\Å)E\à\Ş}¨ŒB\Ë\"ı,#ˆDe\Z\'°\ÌdAU\Ù=‘N%zt#\ÄXA\é6lŠ\'h´’\É\rT8\Ê>\ÈV\ë\ò=t¶H—Ğ‘«*\"”\ÓCŒgÁ‘±9Gú4A¶\Ô”v‚$\\\\G‚…\È%\á±1~e¿J“?¡5\èüQÿ\Ä\0\'\0\0\0\0\0\0!1AQaq‘¡±Á \á\ğ\Ñ\ñÿ\Ú\0\0\0?O\ğüzG(Çœ\ê%±\ğüwÿ\0f‰—\Â$\nd®Xá…¸Šxÿ\0%Q%K,\îü`\í0~…s\0°¯0B)\Ü\"\òÙ©’[+ü,1¼\"ˆc\Ô+/?…?…¤&×¤St\Õ\ó)\Êwø(n\ğJü0%fŞ¡B\Ô”¡‘R\0.f©\Æ\É\\+±ÁšY||\Æ\n®ˆ	˜F¿X@‡\îµk©‹§’R\ğDØ–3\ñ4\ÃÁ\ö…\à`XƒŒ\÷\âgnµ•º8«5©HÕ¸*.+`o3¥\òf\å%,X¥\éSLJ_1†L\â2\â\Z¯Ú±\Õ/\Ü\òE³„%B‰é–“+\æS\ÆRÑ¹\\5§\Ä€^*º\ëÌ°$‹W£=\0¬9‰p\Æ\ÆJ)Ø½º9„g°@j\0ŠIE””?Àm¢4û‰…\ñe™eP.\âp\æ°Á\Èx\ÙY\ñFnÒ¸.\õ~f\\]\Û|\æ\öıB-€\Z;\õ*˜m\ç—\Ó(\àµ\ÜF\İ;”Vl\Ş\àşKùŒ´ÀŠ	\å\Üş\"–°^¥¬\Z¹\Èd*•{ÿ\0pq†v\Ö\Õgz‰œ/3iŒ7T,R\éµb\Ç\Ö\Â \ã³d\÷\r\Ô\ÎFÀ·ß˜vŒ\ÒSø´\â0øG’µT,1^\'\0/qx\Ø.¯\îR–;ƒSJrVº€¦\ä\'UO\ê\0KŠ±\è\ìL°(XC»\â¡dŒ–\Õh¾C\Ìr\ÅC uûÚ€\È`eO\Å×¸ù°Ê M¥©bÊ°–B&9\Ì\Ï\õ`\İFÈ¹³Ü¬R€µt3\ËZƒcH\änUú“\Ón*\â\\m\â]×ŒAX\æmD-¸½X0PQ”l¿ıœ\à\'\Î34\Âúl\èù–ŸŠ—h²J\\Šl\İ3)\âZ\0\Û\Ë\0jwƒ\ÈC5¨\è\ÎTZ+\Î\'	”±\0´Fp/™œ3™j™ø€\æ6\ò\ÊO\0\à\ëˆ\ğ‡,A•X-Ï™¸H\ì\0\ãwnYif€\è\"@\ò‚×“Ô³l´\Ù«—¡JUÓ¸Ş\âGR\èf1¨ ê«Ÿüš\ÅW\0\âß£\÷»ı–¿QJ®mµŸ\Ö#­¼]§S¼\Û\çB§O\ì~\âyh\ï\İÁ\æ£Ù“›{Ü¢\"f®M_¨\Ø\ĞG¸ˆ³2\rº,UƒÀ\Ó\õ$¨·±•„c4s\Í\çP@\Ú\Ğ&/ \Ó\\ÁÎŒ)G\ŞıJÈM\\)W\ó,Éƒ\Z]—\Ï\õ(’°Hº\Õ\ğ‰À\ò\ëŸw\÷y\Âû\Ä]\ÖSp´l\ï¨YÀ±(Duˆš5X!(‚\Å¨š\ì­\Üs1d\é0\Ìû6\"\æ<Û—¼Ó¿ˆJm©Vc\Æ\ÔÁª\Î\áXÑ»:”ø¤\ç-tdûŒpM^Ï¯\Ô[R\ï=Ì¸lÀ-\ëUŒx–aV½\Õ\ÎH\éZ`”\0³pi/\">Ib3EU>\èı\î,\Ét\Ç 0{\÷©˜W\0\Ûú†~.ş¦D}\äş\"7`\Ø\İ@\ËnE\õS,6\Ê\r|1`£\\Y\ã{•Õ‚CÇ‰j	\r\ËCú‚±c\ç6g\çr ÁJe:;\ó‡9©„\éd½À6¿k \n\îdb§l{€\0İŒ\Ö\ß:ŠC\0JK¼Y\á!J¤2²\ö‚Q²\"©iEi²t…İ‡\å•Q\àTU\ë\îY\çüD*©3\İ=\ó\÷\è\"9+c2Å¬N\ÍKf\êµ\í,ˆe˜SMÿ\0^f%\éb\Ær^H\Z\0ˆ\Ş+Cg\Ë\Z\ÛzŸ!«\ÏQ†‡‘Ij\ö\ïy¢&“yÀú\Ëû”Mh\ä\êNFa4iŸùÀ§\ÄF\ô\×7™KÌ™>M\Ê.Ÿ¥\É\ì\"¾xˆPUœ\ÄE C•ÀA\èau\Öt>ø›h \×F‚®ud²Š\Şj–cs*\Ã`	‹s~b#£C&sZ\İD¥\ğ”\Z\Â»9\Ì1VM&\ğ\Ğü\Ë\r\æe»e¼`–\\Á\ßørP;Ğ\î­\\ \ŞP¶•n\à0\']Cl\ä\Í<\Ø2\ã\Òq\Å\Z¼¹€–\ZıJ\Ç\ğ\r\\¹1úJ€UA›\ó-ƒ8,}\Ì\ÏFÃ³ew\Í\â,w\"@eyX›£lP„h\ãÏ‰²¤Q€<\×r\ñ-‹V€¦sÃ¸j‹}ARÖ•k©•(\ÆnÏƒ)ˆ“cª€,šë„­B¹Á»8>`‰f\r|a„a®\Õ>\ê\np~\á¶PÍ€1^f©\ÜùnoXe€F¥D»Š=n\Ö5Ä”«yª\Ô[¾\ífD¾\ğ¯{¶=Æ¿x,‹N\n8F>\ÖEf p\÷~\îh(o\ÃWr†Ø¥3\Ì\0l¯\Z¸J%E”®\æ§\ÉJ6ø»\Ë\ğ\ÄW6oL\æ.«Õ‚¾I{—\0i‘›\é¢$&+§w\æ7x\Ö#(.\çÉ¿‡0uı\ÄU µ»¾.\0W©Y\îøeb‰Ñ«ƒc\îY€°\å]µ\\PPqP\nHm[\\\Ñ\Å\İ\Ö\à²u\Í\â\ï\rRÙ¦Œ³ÈŒ E_E€ŒA\ç\Ú\ñû‚—0H_¡oĞ±|2­ƒ\Ùn·¿Ö¢>°\ó\ÔÁ\n¸±\õ˜.\ÅW\ÌU\Ùt\ë²W¤¼†G–6:\Ø\'\ò\æÿ\Ù','shannon',1),(9,'zilvi','$2y$10$MmIxMWNmNjM5MzY1ZjFiNOAQp2hpi7Zn2oxSCfViEMRo.MpbBLp3G','Zilvinas','Pikelis','Male','1990-06-02','12 Baker Street','Peterborough','PR3 A33','info@mrzilvi.net','07989139133','I want to be able to run a marathon by the end of year.\r\n',NULL,'jake',1),(10,'milad','$2y$10$ZGE5NjE4YjA5OTVlOWYzZO7Nwp0ArPKtH5nxQuLR0AdDw5VDrwhjy','milad','milad','Male','2021-08-19','asdas asd as','sads','W5 7OP','miladpegah1999@gmail.com','2323123123','want to improve my \"beach bum\" ready for bikini season. ',NULL,'jake',1);
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
