-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `m_article`
--

DROP TABLE IF EXISTS `m_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `slug` text,
  `img_thumbnail` text,
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0=pending, 1=Published, 2=Banned',
  `pageview` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_article`
--

LOCK TABLES `m_article` WRITE;
/*!40000 ALTER TABLE `m_article` DISABLE KEYS */;
INSERT INTO `m_article` VALUES (1,'My Article Number 1.........................','<h3>Hello World</h3>\n<p></p>\n<p>ini Adalah Contoh Artikel nya. Please Share this to your Social media.</p>\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n<p>Invite BBM Channel kami&nbsp;</p>\n<p><img src=\"http://teknosains.com/assets/images/bbm-channel.png\" alt=\"\" width=\"244\" height=\"308\" /></p>\n<p>Best regards</p>','2017-07-24 00:00:00','admin','my-article-number-1','http://teknosains.com/assets/images/bbm-channel.png','1',0),(2,'My Article Number 2.........................','<h3>Hello World</h3>\n<p></p>\n<p>ini Adalah Contoh Artikel nya. Please Share this to your Social media.</p>\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n<p>Invite BBM Channel kami&nbsp;</p>\n<p><img src=\"http://teknosains.com/assets/images/bbm-channel.png\" alt=\"\" width=\"244\" height=\"308\" /></p>\n<p>Best regards</p>','2017-07-24 00:00:00','admin','my-article-number-2','http://teknosains.com/assets/images/apple.jpg','1',0),(3,'My Article Number 3.........................','<h3>Hello World</h3>\n<p></p>\n<p>ini Adalah Contoh Artikel nya. Please Share this to your Social media.</p>\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n<p>Invite BBM Channel kami&nbsp;</p>\n<p><img src=\"http://teknosains.com/assets/images/bbm-channel.png\" alt=\"\" width=\"244\" height=\"308\" /></p>\n<p>Best regards</p>','2017-07-24 00:00:00','admin','my-article-number-3','http://teknosains.com/assets/images/apple.jpg','1',0),(4,'My Article Number 4.........................','<h3>Hello World</h3>\n<p></p>\n<p>ini Adalah Contoh Artikel nya. Please Share this to your Social media.</p>\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n<p>Invite BBM Channel kami&nbsp;</p>\n<p><img src=\"http://teknosains.com/assets/images/bbm-channel.png\" alt=\"\" width=\"244\" height=\"308\" /></p>\n<p>Best regards</p>','2017-07-24 00:00:00','admin','my-article-number-4','http://teknosains.com/assets/images/bbm-channel.png','1',0),(5,'Testing article again so the web will have more article ','<p>ini Adalah Contoh Artikel nya. Please Share this to your <strong>Social media</strong>.</p>\r\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\r\n<p><span><img src=\"http://teknosains.com/assets/images/bbm-channel.png\" alt=\"\" width=\"244\" height=\"308\" style=\"float: right;\" /></span></p>\r\n<p><span>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p></p>\r\n<p><strong>Lorem Ipsum</strong><span> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </span></p>\r\n<p><span>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p><span></span></p>\r\n<p><span>Regards</span></p>\r\n<p><a href=\"/backend/post/edit/teknosains.com\"><span>Teknosains.com</span></a></p>','2017-07-25 12:00:00','admin','testing-article-again-so-the-web-will-have-more-article','http://teknosains.com/assets/images/bbm-channel.png','1',0);
/*!40000 ALTER TABLE `m_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_user`
--

DROP TABLE IF EXISTS `m_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_user`
--

LOCK TABLES `m_user` WRITE;
/*!40000 ALTER TABLE `m_user` DISABLE KEYS */;
INSERT INTO `m_user` VALUES (1,'admin','$2y$10$JztroaZKGVbQ9Bu4RpABcefAmgRdtUg2bp5my2JPaa/ZrHzhZuVPq');
/*!40000 ALTER TABLE `m_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ci_amp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-25 13:59:37
