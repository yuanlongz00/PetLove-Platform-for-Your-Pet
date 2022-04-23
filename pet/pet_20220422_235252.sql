-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: pet
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user1id` int(10) DEFAULT NULL,
  `user1name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user2id` int(10) DEFAULT NULL,
  `user2name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,1,'admin1',1,'admin1','<p>1111</p>','2022-04-19 01:09:16'),(2,1,'admin1',1,'admin1','<p>1111</p>','2022-04-19 01:10:48'),(3,1,'admin1',1,'admin1','<p>22222222222</p>','2022-04-19 02:19:39'),(4,1,'admin1',3,'user1','<p>1111111111</p>','2022-04-19 02:27:01'),(5,1,'admin1',1,'admin1','<p>3333333333333</p>','2022-04-19 02:33:55'),(6,1,'admin1',3,'user1','<p>4444444444444444</p>','2022-04-19 02:34:03'),(7,1,'admin1',1,'admin1','<p>555555555555555</p>','2022-04-19 02:34:08'),(8,1,'admin1',3,'user1','<p>6666666666666</p>','2022-04-19 02:34:16'),(9,12,'111',1,'admin1','<p>444</p>','2022-04-21 02:11:09'),(10,12,'111',1,'admin1','<p>55</p>','2022-04-21 02:11:22'),(11,12,'111',1,'admin1','<p>666</p>','2022-04-21 02:13:39'),(12,12,'111',3,'user1','<p>111</p>','2022-04-21 02:14:04'),(13,12,'111',12,'111','<p>111111111</p>','2022-04-21 02:14:12'),(14,12,'111',3,'user1','<p>7777777</p>','2022-04-21 02:14:27'),(15,12,'111',1,'admin1','<figure class=\"image\"><img src=\"../images/20220421/20220421_5909.png\"></figure>','2022-04-21 02:14:44'),(16,12,'111',12,'111','<p>1111</p>','2022-04-21 02:15:06'),(17,12,'111',12,'111','<p>2222222222</p>','2022-04-21 02:15:12'),(18,1,'admin1',3,'user1','<p>777777777</p>','2022-04-21 03:49:39'),(19,12,'111',1,'admin1','<p>111111</p>','2022-04-21 11:13:44'),(20,12,'111',3,'user1','<p>0000000</p>','2022-04-21 11:19:32'),(21,3,'user1',1,'admin1','<p>helllo</p>','2022-04-22 09:56:48');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `reply_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`cid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'admin1','It is a cute dog!','2022-02-05 14:12:10',1,-1),(3,'admin1','1111111','2022-04-19 02:04:49',2,-1),(7,'111','444444444444','2022-04-21 02:04:40',2,-1),(8,'user1','cute','2022-04-22 10:04:17',12,-1),(9,'user1','cute','2022-04-22 10:04:27',1,-1),(10,'111','wwww','2022-04-22 10:04:05',2,-1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `spot` tinyint(11) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` VALUES (1,1,12,1,'2022-04-21 07:26:12'),(2,1,9,0,'2022-04-22 09:38:37'),(3,1,3,1,'2022-04-22 10:02:44'),(4,1,1,1,'2022-04-22 10:35:52'),(5,2,1,0,'2022-04-22 10:36:26'),(6,5,1,1,'2022-04-22 10:36:32'),(7,4,12,1,'2022-04-22 10:51:04'),(8,4,1,1,'2022-04-22 06:17:36');
/*!40000 ALTER TABLE `like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `age` int(3) NOT NULL DEFAULT '0',
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `owner` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `height` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `weight` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `neutered` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'Saderds','Siberian Husky, dog','black white',3,'male','Jack','032-1234567','Geantle character dog, healthy body, obedient, can accompany the master to play, and the general husky is different, not open home, welcome to adopt','../images/img0.jpeg',1,'','','',''),(2,'Taertye','Golden british shorthair, cat','golden, yellow',2,'male','Jack','032-1234567','Naughty lovely cat, lively character, do not open home, can accompany the master to play','../images/img1.jpeg',1,'','','',''),(4,'Ruoeirywq','Golden Retriever, dog','golden, yellow',4,'female','Huyetrwqe','020-72638412','A clever and lovely dog, with a high IQ, cares about his master and is sensible','../images/img3.jpeg',1,'','','',''),(17,'bb','dog','yellow',5,'Female','user1','7038322830','cute','../images/20220422_2119.png',2,'2000','100','15','true'),(15,'lucky','dog','white',5,'Female','admin1','7038322830','cute','../images/20220422_2049.png',1,'2000','18','5','true'),(12,'kate','cat','white',2,'Male','user1','7038322830','cute','../images/20220422_3887.png',2,'1000','100','5','true'),(16,'happy','dog','black',2,'Male','user1','7038322830','cute','../images/20220422_2777.png',1,'2000','100','5','true'),(14,'bambi','dog','black',4,'female','admin1','7038322830','cute','../images/20220422_2849.png',0,'0','','','');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postcomments`
--

DROP TABLE IF EXISTS `postcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postcomments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postid` int(10) DEFAULT NULL,
  `reply_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postcomments`
--

LOCK TABLES `postcomments` WRITE;
/*!40000 ALTER TABLE `postcomments` DISABLE KEYS */;
INSERT INTO `postcomments` VALUES (1,'111','<p>11111111111</p>',4,-1,'2022-04-21 12:52:37'),(2,'111','<p>11111111111111</p>',4,-1,'2022-04-21 12:54:20'),(3,'111','<p>22222222222</p>',4,-1,'2022-04-21 12:54:59'),(4,'111','<p>1</p>',8,-1,'2022-04-22 11:30:21'),(5,'111','<p>11111111111</p>',4,-1,'2022-04-22 01:05:23'),(6,'111','<p>2222222222222</p>',4,-1,'2022-04-22 01:05:35'),(7,'111','<p>3333333333333</p>',4,-1,'2022-04-22 01:05:57'),(8,'111','<p>11111111111</p>',5,-1,'2022-04-22 01:07:47'),(9,'111','<p>222222222222</p>',1,-1,'2022-04-22 01:08:03'),(10,'admin1','<p>1111</p>',1,-1,'2022-04-22 06:42:02');
/*!40000 ALTER TABLE `postcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `like` int(10) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `discript` text COLLATE utf8_unicode_ci,
  `tag` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'user1','Breeding strategy || How to raise a Golden british shorthair？','2022-04-01 12:00:00','<h3>Expelling Parasite</h3><p>It is insect repellent inside body 1 time 3 months commonly, insect repellent outside body 1 time 1 month. It is better to separate internal drive and external drive.\n\nIf the gold layer living environment is clean and tidy, do not eat raw meat, also do not go out, adjust for 3 months to half a year deworming it is ok, if it is free range, eat raw meat cats, it will be 1 month deworming, the specific situation according to their own adjustment.</p><img src=\"../images/1/img0.jpg\" /><h3>vaccine</h3><p>To vaccinate Kim ji-seon, make sure he is healthy and does not have fever, and if the cat is too thin, raise and spank it again.</p>',99,3,'It is insect repellent inside body 1 time 3 months commonly, insect repellent outside body 1 time 1 month. It is better to separate internal drive and external drive.',0),(2,'admin1','1111111111111111111111111111','2022-04-21 04:16:54','<figure class=\"image\"><img src=\"../images/20220421/20220421_4329.png\"></figure>',-1,1,'2222222222222222222222222222',0),(4,'111','111','2022-04-21 11:51:14','<figure class=\"image\"><img src=\"../images/20220421/20220421_2755.png\"></figure>',2,12,'111',0),(5,'111','222','2022-04-21 01:11:59','<figure class=\"image\"><img src=\"../images/20220421/20220421_8957.png\"></figure>',0,12,'222',0),(8,'admin1','b','2022-04-22 11:16:38','<p>h</p>',0,1,'g',0),(9,'111','cc','2022-04-22 11:24:32','<p>cc</p>',0,12,'cc',1),(10,'user1','4444','2022-04-22 11:25:35','<p>44444<img src=\"../images/20220422/20220422_7865.png\"></p>',0,3,'44',1),(11,'user1','ppp','2022-04-22 11:26:15','<p>ppp</p>',0,3,'ppp',2),(12,'admin1','1','2022-04-22 10:41:24','<p>1</p>',0,1,'1',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userfriend`
--

DROP TABLE IF EXISTS `userfriend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userfriend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user1id` int(10) DEFAULT NULL,
  `user1name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user2id` int(10) DEFAULT NULL,
  `user2name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastContact` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userfriend`
--

LOCK TABLES `userfriend` WRITE;
/*!40000 ALTER TABLE `userfriend` DISABLE KEYS */;
INSERT INTO `userfriend` VALUES (1,1,'admin1',1,'admin1','2022-04-19 02:34:08'),(2,1,'admin1',1,'admin1','2022-04-19 02:34:08'),(3,1,'admin1',3,'user1','2022-04-21 03:49:39'),(4,3,'user1',1,'admin1','2022-04-21 03:49:39'),(5,12,'111',1,'admin1','2022-04-21 11:13:44'),(6,1,'admin1',12,'111','2022-04-21 11:13:44'),(7,12,'111',12,'111','2022-04-21 02:15:12'),(8,12,'111',12,'111','2022-04-21 02:15:12'),(9,12,'111',3,'user1','2022-04-21 11:19:32'),(10,3,'user1',12,'111','2022-04-21 11:19:32');
/*!40000 ALTER TABLE `userfriend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `psd` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `flag` int(5) DEFAULT '0',
  `portrait` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin1','123456',1,'../images/img0.jpeg','013-123456789'),(2,'admin2','123456',1,'../images/img1.jpeg','123-123456789'),(3,'user1','123456',0,'../images/img0.jpeg','123-123456789'),(4,'user2','123456',0,'../images/img1.jpeg','123-123456789'),(12,'111','111',0,'../images/20220421_8223.png','111'),(13,'user4','123456',0,'../images/20220422_9374.png','123456789');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pet'
--

--
-- Dumping routines for database 'pet'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-22 23:52:52
