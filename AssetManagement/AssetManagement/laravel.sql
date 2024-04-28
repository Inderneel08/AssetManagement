-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `asset_history`
--

DROP TABLE IF EXISTS `asset_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_history` (
  `asset_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignedTo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `id` bigint NOT NULL AUTO_INCREMENT,
  `delete_flag` int NOT NULL DEFAULT '0',
  `action_performed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `serviceId` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_history`
--

LOCK TABLES `asset_history` WRITE;
/*!40000 ALTER TABLE `asset_history` DISABLE KEYS */;
INSERT INTO `asset_history` VALUES ('HAL/DPIT/2019/40/01','default','2024-02-12','2024-02-12',66,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/01','default','2024-02-12',NULL,67,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/01','Pritam Sharma','2024-02-12',NULL,68,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/02','default','2024-02-12','2024-02-12',69,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/02','default','2024-02-12',NULL,70,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/02','H Ashish','2024-02-12',NULL,71,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/03','default','2024-02-12','2024-02-12',72,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/03','default','2024-02-12',NULL,73,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/03','Gaurav Kumar Joshi','2024-02-12',NULL,74,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/04','default','2024-02-12','2024-02-12',75,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/04','default','2024-02-12',NULL,76,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/04','Bhupinder Garg','2024-02-12',NULL,77,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/05','default','2024-02-12','2024-02-12',78,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/05','default','2024-02-12',NULL,79,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/05','Anita Pandita','2024-02-12',NULL,80,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/06','default','2024-02-12','2024-02-12',81,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/06','default','2024-02-12',NULL,82,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/06','Priyankul','2024-02-12',NULL,83,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/07','default','2024-02-12','2024-02-12',84,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/07','default','2024-02-12',NULL,85,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/07','Niranjan Kumar Pandey','2024-02-12',NULL,86,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/08','default','2024-02-12','2024-02-12',87,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/08','default','2024-02-12',NULL,88,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/08','Umashankar','2024-02-12',NULL,89,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/09','default','2024-02-12','2024-02-12',90,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/09','default','2024-02-12',NULL,91,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/09','Gopal','2024-02-12',NULL,92,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/10','default','2024-02-12','2024-02-12',93,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/10','default','2024-02-12',NULL,94,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/10','Pallavi','2024-02-12',NULL,95,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/11','default','2024-02-12','2024-02-12',96,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/11','default','2024-02-12',NULL,97,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/11','HAL-PC','2024-02-12',NULL,98,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/12','default','2024-02-12','2024-02-12',99,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/12','default','2024-02-12',NULL,100,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/12','Pooja Pandey','2024-02-12',NULL,101,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/13','default','2024-02-12','2024-02-12',102,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/13','default','2024-02-12',NULL,103,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/13','Pankaj','2024-02-12',NULL,104,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/14','default','2024-02-12','2024-02-12',105,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/14','default','2024-02-12',NULL,106,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/14','Manisha Kumari','2024-02-12',NULL,107,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/15','default','2024-02-12','2024-02-12',108,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/15','default','2024-02-12',NULL,109,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/15','Share-PC','2024-02-12',NULL,110,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/16','default','2024-02-12','2024-02-12',111,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/16','default','2024-02-12',NULL,112,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/16','Abhishek Kumar','2024-02-12',NULL,113,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/17','default','2024-02-12','2024-02-12',114,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/17','default','2024-02-12',NULL,115,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/17','Sumit Kumar','2024-02-12',NULL,116,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/18','default','2024-02-12','2024-02-12',117,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/18','default','2024-02-12',NULL,118,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/18','Sughanda','2024-02-12',NULL,119,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/19','default','2024-02-12','2024-02-12',120,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/19','default','2024-02-12',NULL,121,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/19','Shivam','2024-02-12',NULL,122,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/20','default','2024-02-12','2024-02-12',123,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/20','default','2024-02-12',NULL,124,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/20','Furkan','2024-02-12',NULL,125,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/21','default','2024-02-12','2024-02-12',126,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/21','default','2024-02-12',NULL,127,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/21','VC-Room','2024-02-12',NULL,128,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/22','default','2024-02-12','2024-02-12',129,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/22','default','2024-02-12',NULL,130,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/22','Akansha Adlakha','2024-02-12',NULL,131,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/23','default','2024-02-12','2024-02-12',132,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/23','default','2024-02-12',NULL,133,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/23','Geetajali Nigam','2024-02-12',NULL,134,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/24','default','2024-02-12','2024-02-12',135,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/25','default','2024-02-12','2024-02-12',136,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/25','default','2024-02-12',NULL,137,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/25','Abhishek Gaur','2024-02-12',NULL,138,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/26','default','2024-02-12','2024-02-12',139,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/26','default','2024-02-12',NULL,140,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/26','Suman','2024-02-12',NULL,141,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/27','default','2024-02-12','2024-02-12',142,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/27','default','2024-02-12',NULL,143,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/27','Deepak Kumar','2024-02-12',NULL,144,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/28','default','2024-02-12','2024-02-12',145,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/28','default','2024-02-12',NULL,146,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/28','Priyanka','2024-02-12',NULL,147,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/29','default','2024-02-12','2024-02-12',148,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/30','default','2024-02-12','2024-02-12',149,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/30','default','2024-02-12',NULL,150,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/30','Dushyant','2024-02-12',NULL,151,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/31','default','2024-02-12','2024-02-12',152,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/31','default','2024-02-12',NULL,153,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/31','Pratibha','2024-02-12',NULL,154,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/32','default','2024-02-12','2024-02-12',155,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/32','default','2024-02-12',NULL,156,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/32','Dileep Singh','2024-02-12',NULL,157,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/33','default','2024-02-12','2024-02-12',158,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/33','default','2024-02-12',NULL,159,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/33','Pankaj','2024-02-12',NULL,160,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/34','default','2024-02-12','2024-02-12',161,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/34','default','2024-02-12',NULL,162,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/34','Amiya Kumar Das','2024-02-12',NULL,163,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/35','default','2024-02-12','2024-02-12',164,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/35','default','2024-02-12',NULL,165,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/35','Swati Sharma','2024-02-12',NULL,166,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/36','default','2024-02-12','2024-02-12',167,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/36','default','2024-02-12',NULL,168,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/36','Gurpreet Singh','2024-02-12',NULL,169,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/37','default','2024-02-12','2024-02-12',170,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/37','default','2024-02-12',NULL,171,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/37','Piyush','2024-02-12',NULL,172,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/40/38','default','2024-02-12','2024-02-12',173,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/40/38','default','2024-02-12',NULL,174,0,'ACTIVATED',NULL),('HAL/DPIT/2019/40/38','Mohd Shehzad','2024-02-12',NULL,175,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/39','default','2024-02-12','2024-02-12',176,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/39','default','2024-02-12',NULL,177,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/39','Jai','2024-02-12',NULL,178,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/40','default','2024-02-12','2024-02-12',179,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/40','default','2024-02-12',NULL,180,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/40','Amit Gupta','2024-02-12',NULL,181,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/41','default','2024-02-12','2024-02-12',182,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/41','default','2024-02-12',NULL,183,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/41','Manisha Kumari','2024-02-12',NULL,184,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/42','default','2024-02-12','2024-02-12',185,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/42','default','2024-02-12',NULL,186,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/42','Ravi','2024-02-12',NULL,187,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/43','default','2024-02-12','2024-02-12',188,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/43','default','2024-02-12',NULL,189,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/43','Palak','2024-02-12',NULL,190,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/44','default','2024-02-12','2024-02-12',191,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/44','default','2024-02-12',NULL,192,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/44','Rakhi','2024-02-12','2024-02-21',193,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/45','default','2024-02-12','2024-02-12',194,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/45','default','2024-02-12',NULL,195,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-12',NULL,196,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/46','default','2024-02-12','2024-02-12',197,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/46','default','2024-02-12',NULL,198,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/46','Mahesh Yadav','2024-02-12',NULL,199,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/47','default','2024-02-12','2024-02-12',200,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/47','default','2024-02-12',NULL,201,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/47','Sushant','2024-02-12',NULL,202,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/48','default','2024-02-12','2024-02-12',203,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/48','default','2024-02-12',NULL,204,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/48','Dhananjay kumar','2024-02-12',NULL,205,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/49','default','2024-02-12','2024-02-12',206,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/49','default','2024-02-12',NULL,207,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/49','Ajay Yadav','2024-02-12',NULL,208,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/50','default','2024-02-12','2024-02-12',209,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/40/50','default','2024-02-12',NULL,210,0,'ACTIVATED',NULL),('HAL/DPIT/2023/40/50','syslog','2024-02-12',NULL,211,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/IMAC27/2018/1','default','2024-02-12','2024-02-12',212,0,'ASSET CREATED',NULL),('HAL/DPIT/IMAC27/2018/1','default','2024-02-12',NULL,213,0,'ACTIVATED',NULL),('HAL/DPIT/IMAC27/2018/1','Devesh Sharma','2024-02-12',NULL,214,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/168/01','default','2024-02-12','2024-02-12',215,0,'ASSET CREATED',NULL),('HAL/DPIT/168/01','default','2024-02-12',NULL,216,0,'ACTIVATED',NULL),('HAL/DPIT/168/01','Jai','2024-02-12',NULL,217,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/229/01','default','2024-02-12','2024-02-12',218,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/229/01','default','2024-02-12',NULL,219,0,'ACTIVATED',NULL),('HAL/DPIT/2019/229/01','Sharing','2024-02-12',NULL,220,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/229/02','default','2024-02-12','2024-02-12',221,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/229/02','default','2024-02-12',NULL,222,0,'ACTIVATED',NULL),('HAL/DPIT/2019/229/02','Amiya Kumar Das','2024-02-12',NULL,223,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2019/229/03','default','2024-02-12','2024-02-12',224,0,'ASSET CREATED',NULL),('HAL/DPIT/2019/229/03','default','2024-02-12',NULL,225,0,'ACTIVATED',NULL),('HAL/DPIT/2019/229/03','Amit Gupta','2024-02-12',NULL,226,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/229/01','default','2024-02-12','2024-02-12',227,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/229/01','default','2024-02-12',NULL,228,0,'ACTIVATED',NULL),('HAL/DPIT/2023/229/01','Gaurav Kumar Joshi','2024-02-12',NULL,229,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/229/02','default','2024-02-12','2024-02-12',230,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/229/02','default','2024-02-12',NULL,231,0,'ACTIVATED',NULL),('HAL/DPIT/2023/229/02','VC-Room','2024-02-12',NULL,232,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/229/03','default','2024-02-12','2024-02-12',233,0,'ASSET CREATED',NULL),('HAL/DPIT/2023/229/03','default','2024-02-12',NULL,234,0,'ACTIVATED',NULL),('HAL/DPIT/2023/229/03','Anita Pandita','2024-02-12',NULL,235,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/42/2022/01','default','2024-02-12','2024-02-12',236,0,'ASSET CREATED',NULL),('HAL/DPIT/42/2022/01','default','2024-02-12',NULL,237,0,'ACTIVATED',NULL),('HAL/DPIT/42/2022/02','default','2024-02-12','2024-02-12',238,0,'ASSET CREATED',NULL),('HAL/DPIT/42/2022/02','default','2024-02-12',NULL,239,0,'ACTIVATED',NULL),('HAL/DPIT/42/2022/03','default','2024-02-12','2024-02-12',240,0,'ASSET CREATED',NULL),('HAL/DPIT/42/2022/03','default','2024-02-12',NULL,241,0,'ACTIVATED',NULL),('HAL/DPIT/43/2021/01','default','2024-02-12','2024-02-12',242,0,'ASSET CREATED',NULL),('HAL/DPIT/43/2021/01','default','2024-02-12',NULL,243,0,'ACTIVATED',NULL),('HAL/DPIT/44/2023/01','default','2024-02-12','2024-02-12',244,0,'ASSET CREATED',NULL),('HAL/DPIT/44/2023/01','default','2024-02-12',NULL,245,0,'ACTIVATED',NULL),('HAL/DPIT/44/2023/02','default','2024-02-12','2024-02-12',246,0,'ASSET CREATED',NULL),('HAL/DPIT/44/2023/02','default','2024-02-12',NULL,247,0,'ACTIVATED',NULL),('HAL/DPIT/41/2021/01','default','2024-02-12','2024-02-12',248,0,'ASSET CREATED',NULL),('HAL/DPIT/41/2021/01','default','2024-02-12',NULL,249,0,'ACTIVATED',NULL),('HAL/DPIT/41/2021/02','default','2024-02-12','2024-02-12',250,0,'ASSET CREATED',NULL),('HAL/DPIT/41/2021/02','default','2024-02-12',NULL,251,0,'ACTIVATED',NULL),('HAL/DPIT/NetGearSwitch/195/01/2024/01','default','2024-02-12','2024-02-12',252,0,'ASSET CREATED',NULL),('HAL/DPIT/NetGearSwitch/195/01/2024/01','default','2024-02-12',NULL,253,0,'ACTIVATED',NULL),('HAL/DPIT/Firewall/76/2020/01','default','2024-02-12','2024-02-12',254,0,'ASSET CREATED',NULL),('HAL/DPIT/Firewall/76/2020/01','default','2024-02-12',NULL,255,0,'ACTIVATED',NULL),('HAL/DPIT/EPABX/61/2019/01','default','2024-02-12','2024-02-12',256,0,'ASSET CREATED',NULL),('HAL/DPIT/EPABX/61/2019/01','default','2024-02-12',NULL,257,0,'ACTIVATED',NULL),('HAL/DPIT/VCSYSTEM/316/2019/01','default','2024-02-12','2024-02-12',258,0,'ASSET CREATED',NULL),('HAL/DPIT/VCSYSTEM/316/2019/01','default','2024-02-12',NULL,259,0,'ACTIVATED',NULL),('HAL/DPIT/107/01/2024/01','default','2024-02-12','2024-02-12',260,0,'ASSET CREATED',NULL),('HAL/DPIT/107/01/2024/01','default','2024-02-12','2024-02-19',261,0,'ACTIVATED',NULL),('HAL/DPIT/107/01/2024/01','Piyush','2024-02-12',NULL,262,0,'ASSIGN OPERATION',NULL),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-13',NULL,263,0,'UNDER SERVICE',7),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-13','2024-02-13',264,0,'REQUEST TERMINATED',8),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-13','2024-02-21',265,0,'REQUEST TERMINATED',9),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-13','2024-02-13',266,0,'REQUEST RESOLVED',10),('HAL/DPIT/2023/229/03','Anita Pandita','2024-02-13',NULL,267,0,'UNDER SERVICE',11),('HAL/DPIT/2019/40/05','Anita Pandita','2024-02-13',NULL,268,0,'UNDER SERVICE',12),('HAL/DPIT/2019/40/05','Anita Pandita','2024-02-13',NULL,269,0,'UNDER SERVICE',13),('HAL/DPIT/2019/40/05','Anita Pandita','2024-02-13','2024-02-13',270,0,'REQUEST RESOLVED',14),('TestID','default','2024-02-13','2024-02-13',271,1,'ASSET CREATED',NULL),('TestAsset1','default','2024-02-13','2024-02-13',272,1,'ASSET CREATED',NULL),('TestAsset1','default','2024-02-13',NULL,273,1,'ACTIVATED',NULL),('TestAsset1','TestUser1','2024-02-13',NULL,274,1,'ASSIGN OPERATION',NULL),('PrinterAsset1','default','2024-02-13','2024-02-13',275,1,'ASSET CREATED',NULL),('PrinterAsset1','default','2024-02-13',NULL,276,1,'ACTIVATED',NULL),('PrinterAsset1','TestUser1','2024-02-13',NULL,277,1,'ASSIGN OPERATION',NULL),('TestAsset1','TestUser1','2024-02-13',NULL,278,1,'UNDER SERVICE',15),('PrinterAsset1','TestUser1','2024-02-13','2024-02-13',279,1,'REQUEST RESOLVED',16),('PrinterAsset1','TestUser1','2024-02-13','2024-02-13',280,1,'REQUEST RESOLVED',17),('HAL/PrinnterCartridge/111','default','2024-02-19','2024-02-19',281,0,'ASSET CREATED',NULL),('HAL/PrinnterCartridge/111','default','2024-02-19','2024-02-19',282,0,'ACTIVATED',NULL),('HAL/PrinnterCartridge/111','default','2024-02-19','2024-02-19',283,0,'INACTIVATED',NULL),('HAL/DPIT/107/01/2024/01','Piyush','2024-02-19','2024-02-19',284,0,'INACTIVATED',NULL),('HAL/DPIT/107/01/2024/01','Piyush','2024-02-19',NULL,285,0,'ACTIVATED',NULL),('HAL/PrinnterCartridge/111','default','2024-02-19','2024-02-19',286,0,'ACTIVATED',NULL),('HAL/PrinnterCartridge/111','default','2024-02-19','2024-02-19',287,0,'INACTIVATED',NULL),('HAL/PrinnterCartridge/111','default','2024-02-19',NULL,288,0,'ACTIVATED',NULL),('HAL/Mouse&Keyboard111991','default','2024-02-19','2024-02-19',289,1,'ASSET CREATED',NULL),('HAL/Mouse&Keyboard111991','default','2024-02-19',NULL,290,1,'ACTIVATED',NULL),('HAL/PrinnterCartridge/111','Bhupinder Garg','2024-02-19',NULL,291,0,'ASSIGN OPERATION',NULL),('TestAsset12345','default','2024-02-21','2024-02-21',292,0,'ASSET CREATED',NULL),('TestAsset12345','default','2024-02-21','2024-02-21',293,0,'ACTIVATED',NULL),('TestAsset12345','Rakhi','2024-02-21','2024-02-21',294,0,'ASSIGN OPERATION',NULL),('TestAsset12345','default','2024-02-21',NULL,295,0,'ASSIGN OPERATION',NULL),('TestAsset12345','default','2024-02-21',NULL,296,0,'INACTIVATED',NULL),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-21',NULL,297,0,'UNDER SERVICE',18),('HAL/DPIT/2023/40/45','Inderneel Minhas','2024-02-21',NULL,298,0,'UNDER SERVICE',19);
/*!40000 ALTER TABLE `asset_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedTo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `delete_flag` int NOT NULL DEFAULT '0',
  `consumable` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (157,'HAL/DPIT/2019/40/01','Desktop','Pritam Sharma',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(158,'HAL/DPIT/2019/40/02','Desktop','H Ashish',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(159,'HAL/DPIT/2019/40/03','Desktop','Gaurav Kumar Joshi',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(160,'HAL/DPIT/2019/40/04','Desktop','Bhupinder Garg',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(161,'HAL/DPIT/2019/40/05','Desktop','Anita Pandita',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(162,'HAL/DPIT/2019/40/06','Desktop','Priyankul',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(163,'HAL/DPIT/2019/40/07','Desktop','Niranjan Kumar Pandey',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(164,'HAL/DPIT/2019/40/08','Desktop','Umashankar',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(165,'HAL/DPIT/2019/40/09','Desktop','Gopal',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(166,'HAL/DPIT/2019/40/10','Desktop','Pallavi',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(167,'HAL/DPIT/2019/40/11','Desktop','HAL-PC',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(168,'HAL/DPIT/2019/40/12','Desktop','Pooja Pandey',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(169,'HAL/DPIT/2019/40/13','Desktop','Pankaj',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(170,'HAL/DPIT/2019/40/14','Desktop','Manisha Kumari',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(171,'HAL/DPIT/2019/40/15','Desktop','Share-PC',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(172,'HAL/DPIT/2019/40/16','Desktop','Abhishek Kumar',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(173,'HAL/DPIT/2019/40/17','Desktop','Sumit Kumar',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(174,'HAL/DPIT/2019/40/18','Desktop','Sughanda',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(175,'HAL/DPIT/2019/40/19','Desktop','Shivam',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(176,'HAL/DPIT/2019/40/20','Desktop','Furkan',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(177,'HAL/DPIT/2019/40/21','Desktop','VC-Room',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(178,'HAL/DPIT/2019/40/22','Desktop','Akansha Adlakha',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(179,'HAL/DPIT/2019/40/23','Desktop','Geetajali Nigam',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(180,'HAL/DPIT/2019/40/24','Desktop','default',NULL,NULL,NULL,NULL,0,'Acer',NULL,'2024-02-12',0,0),(181,'HAL/DPIT/2019/40/25','Desktop','Abhishek Gaur',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(182,'HAL/DPIT/2019/40/26','Desktop','Suman',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(183,'HAL/DPIT/2019/40/27','Desktop','Deepak Kumar',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(184,'HAL/DPIT/2019/40/28','Desktop','Priyanka',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-12',0,0),(185,'HAL/DPIT/2019/40/29','Desktop','default',NULL,NULL,NULL,NULL,0,'Acer',NULL,'2024-02-12',0,0),(186,'HAL/DPIT/2019/40/30','Desktop','Dushyant',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(187,'HAL/DPIT/2019/40/31','Desktop','Pratibha',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(188,'HAL/DPIT/2019/40/32','Desktop','Dileep Singh',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(189,'HAL/DPIT/2019/40/33','Desktop','Pankaj',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(190,'HAL/DPIT/2019/40/34','Desktop','Amiya Kumar Das',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(191,'HAL/DPIT/2019/40/35','Desktop','Swati Sharma',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(192,'HAL/DPIT/2019/40/36','Desktop','Gurpreet Singh',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(193,'HAL/DPIT/2019/40/37','Desktop','Piyush',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(194,'HAL/DPIT/2019/40/38','Desktop','Mohd Shehzad',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(195,'HAL/DPIT/2023/40/39','Desktop','Jai',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(196,'HAL/DPIT/2023/40/40','Desktop','Amit Gupta',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(197,'HAL/DPIT/2023/40/41','Desktop','Manisha Kumari',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(198,'HAL/DPIT/2023/40/42','Desktop','Ravi',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(199,'HAL/DPIT/2023/40/43','Desktop','Palak',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(200,'HAL/DPIT/2023/40/44','Desktop','Rakhi',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(201,'HAL/DPIT/2023/40/45','Desktop','Inderneel Minhas',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(202,'HAL/DPIT/2023/40/46','Desktop','Mahesh Yadav',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(203,'HAL/DPIT/2023/40/47','Desktop','Sushant',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(204,'HAL/DPIT/2023/40/48','Desktop','Dhananjay kumar',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(205,'HAL/DPIT/2023/40/49','Desktop','Ajay Yadav',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(206,'HAL/DPIT/2023/40/50','Desktop','syslog',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(207,'HAL/DPIT/IMAC27/2018/1','Desktop','Devesh Sharma',NULL,NULL,NULL,NULL,1,'IMAC',NULL,'2024-02-12',0,0),(208,'HAL/DPIT/168/01','Laptop','Jai',NULL,NULL,NULL,NULL,1,NULL,NULL,'2024-02-12',0,0),(209,'HAL/DPIT/2019/229/01','Printer','Sharing',NULL,NULL,NULL,NULL,1,'Brother',NULL,'2024-02-12',0,0),(210,'HAL/DPIT/2019/229/02','Printer','Amiya Kumar Das',NULL,NULL,NULL,NULL,1,'Canon',NULL,'2024-02-12',0,0),(211,'HAL/DPIT/2019/229/03','Printer','Amit Gupta',NULL,NULL,NULL,NULL,1,'Canon',NULL,'2024-02-12',0,0),(212,'HAL/DPIT/2023/229/01','Printer','Gaurav Kumar Joshi',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(213,'HAL/DPIT/2023/229/02','Printer','VC-Room',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(214,'HAL/DPIT/2023/229/03','Printer','Anita Pandita',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-12',0,0),(215,'HAL/DPIT/42/2022/01','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(216,'HAL/DPIT/42/2022/02','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(217,'HAL/DPIT/42/2022/03','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(218,'HAL/DPIT/43/2021/01','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(219,'HAL/DPIT/44/2023/01','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(220,'HAL/DPIT/44/2023/02','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(221,'HAL/DPIT/41/2021/01','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(222,'HAL/DPIT/41/2021/02','Switch','default',NULL,NULL,'Switch',NULL,1,'D-Link',NULL,'2024-02-12',0,0),(223,'HAL/DPIT/NetGearSwitch/195/01/2024/01','Switch','default',NULL,NULL,'Switch',NULL,1,'NetGear',NULL,'2024-02-12',0,0),(224,'HAL/DPIT/Firewall/76/2020/01','Firewall','default',NULL,NULL,'Firewall123',NULL,1,'AnexGate',NULL,'2024-02-19',0,0),(225,'HAL/DPIT/EPABX/61/2019/01','EPABX','default',NULL,NULL,NULL,NULL,1,'Intellicon',NULL,'2024-02-12',0,0),(226,'HAL/DPIT/VCSYSTEM/316/2019/01','VC System','default',NULL,NULL,NULL,NULL,1,'CISCO',NULL,'2024-02-12',0,0),(227,'HAL/DPIT/107/01/2024/01','HardDisk','Piyush',NULL,NULL,NULL,NULL,1,'WD',NULL,'2024-02-12',0,0),(228,'TestID','Desktop','default',NULL,NULL,NULL,NULL,0,'Acer',NULL,'2024-02-13',1,0),(229,'TestAsset1','Desktop','TestUser1',NULL,NULL,NULL,NULL,1,'Acer',NULL,'2024-02-13',1,0),(230,'PrinterAsset1','Printer','TestUser1',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-13',1,0),(231,'HAL/PrinnterCartridge/111','Printer Cartridge','Bhupinder Garg',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-19',0,1),(232,'HAL/Mouse&Keyboard111991','Mouse+Keyboard','default',NULL,NULL,NULL,NULL,1,'HP',NULL,'2024-02-19',1,1),(233,'TestAsset12345','Desktop','default',NULL,NULL,NULL,NULL,0,'HP',NULL,'2024-02-21',0,0);
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_insertInassets` AFTER INSERT ON `assets` FOR EACH ROW INSERT INTO asset_history(asset_id,assignedTo,date_from,date_to,action_performed) VALUES(NEW.asset_id,NEW.assignedTo,NEW.created_on,NEW.created_on,'ASSET CREATED') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `onAssignUpdate` AFTER UPDATE ON `assets` FOR EACH ROW IF NEW.assignedTo <> OLD.assignedTo THEN

	INSERT INTO asset_history(asset_id,assignedTo,date_from,action_performed) 
    VALUES(OLD.asset_id,NEW.assignedTo,CURRENT_DATE,'ASSIGN OPERATION');
    
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `onStatusUpdate` AFTER UPDATE ON `assets` FOR EACH ROW IF NEW.status <> OLD.status THEN 

    IF NEW.status = 0 THEN

    INSERT INTO asset_history(asset_id,assignedTo,date_from,action_performed)
    VALUES(OLD.asset_id,OLD.assignedTo,CURRENT_DATE,'INACTIVATED');

    ELSEIF NEW.status = 1 THEN

    INSERT INTO asset_history(asset_id,assignedTo,date_from,action_performed)
    VALUES(OLD.asset_id,OLD.assignedTo,CURRENT_DATE,'ACTIVATED');

	END IF;

END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_record` AFTER DELETE ON `assets` FOR EACH ROW DELETE FROM asset_history WHERE asset_id = OLD.asset_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_id` bigint unsigned NOT NULL,
  `image_upload_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `raisedby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `resolvedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_escalation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_flag` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `issues_asset_id_foreign` (`asset_id`),
  CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (7,'Camera not working. Camera app not opening also inside the computer.','2024-02-13 04:02:42',NULL,201,NULL,2,'Inderneel Minhas',1,NULL,NULL,NULL,'System built in camera will be replaced by the laptop technician. The technician will come after one week. Till now request has been suspended.',0),(8,NULL,'2024-02-13 04:07:55','2024-02-13 04:08:00',201,NULL,1,'Inderneel Minhas',0,NULL,NULL,NULL,NULL,1),(9,'System software is not updated the system is laging to much.','2024-02-13 04:12:28','2024-02-21 10:36:34',201,NULL,1,'Inderneel Minhas',0,NULL,NULL,NULL,NULL,1),(10,'System heating too much. Making noise from the CPU.','2024-02-13 04:23:05','2024-02-13 04:25:32',201,NULL,0,'Inderneel Minhas',2,'Bhupinder Garg',NULL,NULL,'Issue resolved the installation disk has been removed.',0),(11,'Printer not printing color. Only black and white printing is done. Looks like either the colored ink is less or that there is some defect in the printer.','2024-02-13 04:34:16',NULL,214,NULL,1,'Anita Pandita',1,NULL,NULL,NULL,NULL,0),(12,'System needs update but update through windows update feature is failing.','2024-02-13 04:36:18',NULL,161,NULL,1,'Anita Pandita',0,NULL,NULL,NULL,NULL,0),(13,'System camera is giving blury image.','2024-02-13 04:37:34',NULL,161,NULL,1,'Anita Pandita',0,NULL,NULL,NULL,NULL,0),(14,'MYSQL service in the system ie the MYSQL workbench is not connecting. Showing password as incorrect.','2024-02-13 04:38:36','2024-02-13 07:36:11',161,NULL,0,'Anita Pandita',0,'Bhupinder Garg',NULL,NULL,'Connection made and password has been changed and stored in the vault.',0),(15,'Not opening... heating issue is seen with a lot of heating.','2024-02-13 09:02:32',NULL,229,NULL,1,'TestUser1',0,NULL,NULL,NULL,NULL,1),(16,'Broken printer with upper pan is broken from the top.','2024-02-13 09:03:15','2024-02-13 09:25:27',230,NULL,0,'TestUser1',1,'Bhupinder Garg',NULL,NULL,'This asset will be deleted. We no longer require it.',1),(17,'Black and White printing less of black and white like very less. The image formed is very blury.','2024-02-13 09:04:24','2024-02-13 09:25:56',230,NULL,0,'TestUser1',1,'Bhupinder Garg',NULL,NULL,'This asset will be deleted. We no longer require it.',1),(18,'The PC is becoming too hot and abruptly closing after sometime.','2024-02-21 10:36:11',NULL,201,NULL,1,'Inderneel Minhas',1,NULL,NULL,NULL,NULL,0),(19,'PC update is not happening everytime the PC updates the update option is still visible. Tried doing the update more than 5 times but still the same issue and the driver is also not installed.','2024-02-21 10:38:07',NULL,201,NULL,1,'Inderneel Minhas',0,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `insert` AFTER INSERT ON `issues` FOR EACH ROW INSERT INTO 
asset_history(asset_id,assignedTo,date_from,action_performed,serviceId)
VALUES((SELECT asset_id FROM assets WHERE assets.id = NEW.asset_id),NEW.raisedby,NEW.start_date,'UNDER SERVICE',NEW.id) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_update_trigger` AFTER UPDATE ON `issues` FOR EACH ROW BEGIN

	IF  NEW.delete_flag <> OLD.delete_flag THEN
	
    UPDATE asset_history SET asset_history.action_performed='REQUEST TERMINATED' WHERE asset_history.serviceId = OLD.id AND asset_history.delete_flag = 0;
    
    UPDATE asset_history SET asset_history.date_to=CURRENT_DATE WHERE asset_history.serviceId = OLD.id AND asset_history.delete_flag = 0; 
	
    END IF;
    
    IF NEW.resolvedBy IS NOT NULL AND (OLD.resolvedBy IS null OR NEW.resolvedBy <> OLD.resolvedBy) THEN
	
    UPDATE asset_history SET asset_history.action_performed='REQUEST RESOLVED' WHERE asset_history.serviceId = OLD.id;
   
    UPDATE asset_history SET asset_history.date_to=CURRENT_DATE WHERE asset_history.serviceId = OLD.id;
    
    END IF;
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'2023_10_23_050636_create_users',1),(7,'2023_11_09_072229_create_issue_table',2),(8,'2023_11_09_072229_create_issue_table_1',3),(9,'2023_11_09_072229_create_issue_table_2',4),(10,'2023_11_09_072229_create_issue_table_3',5),(21,'2023_10_23_050636_create_users_1',6),(55,'2014_10_12_100000_create_password_reset_tokens_table',7),(56,'2014_10_12_100000_create_password_resets_table',7),(57,'2019_08_19_000000_create_failed_jobs_table',7),(58,'2019_12_14_000001_create_personal_access_tokens_table',7),(59,'2023_10_23_050333_create_assets',7),(60,'2023_10_23_050636_create_users_2',7),(61,'2023_11_09_072229_create_issue_table_5',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_flag` int NOT NULL DEFAULT '0',
  `issues_watched_latest` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Inderneel Minhas','inderneel.minhas@gmail.com','$2y$10$KzCDXuQSH.IQ.NmcsqUxpO07BvxXH/Tm2yYNghS.ih93qx4lhYXJq','USER',1,'INTERN',0,0),(51,'Pritam Sharma','pritam.sharma@dpit.com','$2y$10$MWaToqvQHKR/kLzyZ3pWouaNoGap4D0TiSwXgED59eLd6RocQTAqy','USER',1,'Staff',0,0),(52,'H Ashish','h.ashish@dpit.com','$2y$10$Tscm6ZB49mgJYiMKnvG.w.1UiCFdRA1yYzpUbhX6Y6US6sXHwoVmC','USER',1,'Staff',0,0),(53,'Gaurav Kumar Joshi','gaurav.kumar.joshi@dpit.com','$2y$10$cPPUI9W60XrUrBgs/UF84eUsSJ0rsAztOxMhMfBW.7hjxbF444bxC','ADMIN',1,'Staff',0,0),(54,'Bhupinder Garg','bhupinder.garg@dpit.com','$2y$10$nVNBrBEQYcQu3K5SSwOpl.o9.JRLXBUIA3kwbM6rFPazmjAMt6al.','ADMIN',1,'Staff',0,8),(55,'Anita Pandita','anita.pandita@dpit.com','$2y$10$UiE9ZRwquAWWxVyWqTz.4.ut9oxSFG8FUC1kdoBS.uc9ioJlrlqd.','USER',1,'Staff',0,0),(56,'Priyankul','priyankul@dpit.com','$2y$10$KiabspEprllYv2VXzY7U9O.3ymO208reiKd.ADCk6GsDGd06ljEgO','USER',1,'Staff',0,0),(57,'Niranjan Kumar Pandey','niranjan.kumar.pandey@dpit.com','$2y$10$wxf1mNTXaS.vlnLOBncpXO.L8DAUbln8Fjdt0tpi3ilg1zkNa./2u','USER',1,'Staff',0,0),(58,'Umashankar','umaShankar@dpit.com','$2y$10$GEMktqVgAoDBEEjKANZnnOBbA7la1VSxDuFopqYoXx3N1voUsHGme','USER',1,'Staff',0,0),(59,'Gopal','gopal@dpit.com','$2y$10$y2gIjK3o8MGs1qRMLCj68uvfroB1U4UvDyt8cZtQYVISw/DgOI35u','USER',1,'Staff',0,0),(60,'Pallavi','pallavi@dpit.com','$2y$10$GO0KANEDpicCFNBm91BgVeUTbKr8dTwpzk/xzhb2SRHhQw0om0Pq2','USER',1,'Staff',0,0),(61,'HAL-PC','hal-pc@dpit.com','$2y$10$2BlB7Vzuvo3rQ9D/kt2An.9DnbEndho1.Ig7RUFw86wxjYZIrDPOW','USER',1,'Staff',0,0),(62,'Pooja Pandey','pooja.pandey@dpit.com','$2y$10$9bE3GFmX8lPC4dnKmEKbFOLRzR3RhFcmbN9YHFXMjVbsq5l7NCIb6','USER',1,'Staff',0,0),(63,'Pankaj','pankaj@dpit.com','$2y$10$n3mWrdWeeFJMyjUYNX9/kOK0WdTTc6GLeytGfeYuMVT8jbSoKyBY2','USER',1,'Staff',0,0),(64,'Manisha Kumari','manisha.kumari@dpit.com','$2y$10$lszsptHE5nDmWQHjWDiPIOam2rXGKW25vCVM.WtNiqHV2kOQwpMi6','USER',1,'Staff',0,0),(65,'Share-PC','share-pc@dpit.com','$2y$10$Hdjfh954aOFZhmhirAg4NOcpvLOAfBgQr.s65LgFtoNo8duw9moMq','USER',1,'Staff',0,0),(66,'Abhishek Kumar','abhishek.kumar@dpit.com','$2y$10$ChMJovX85pebwZAgo7wGlupUVQ6dX6v2YBzyC/3YjibcMf5yDFxu2','USER',1,'Staff',0,0),(67,'Sumit Kumar','sumit.kumar@dpit.com','$2y$10$5T4MhKwW/oocHqFbcwb3aufxwsfBoCBS7Qq1APJo26WmQQ1IC.UEG','USER',1,'Staff',0,0),(68,'Sughanda','sughanda@dpit.com','$2y$10$5M77lFQMtV6IVb20XxhMxuzqZxKiN294H1SEWbQyDillCJh77NEAm','USER',1,'Staff',0,0),(69,'Shivam','shivam@dpit.com','$2y$10$EzqEFgBZro4beQaRcvxHQe5TfeN1luYzTnwrZOP.AJpIy65v8rUGO','USER',1,'Staff',0,0),(70,'Furkan','furkan@dpit.com','$2y$10$aYaYgv4GfJfSXQG0pR5o0.AIUM5YDFM4gOVQ2QjLbZr7nmL.drxRa','USER',1,'Staff',0,0),(71,'VC-Room','vc-room@dpit.com','$2y$10$YA2h/vepGhzLHt2lROjSPO/LymSSUQsdba.WzTlGaiOIVb0W6/JYu','USER',1,'Staff',0,0),(72,'Akansha Adlakha','akansha.adlakha@dpit.com','$2y$10$5O/0G9pjhrAcF67kz8XNNeD5Y4wCeu1lUb3c4nXp4mJlxQ219c8lG','USER',1,'Staff',0,0),(73,'Geetajali Nigam','geetajali.nigam@dpit.com','$2y$10$AKyDiNkjkGp18qvbLWSMneNRrA2inpwC9WPKNoqyI.DzACXCFMWm.','USER',1,'Staff',0,0),(74,'Not In Use(Faculty)','not.in.use-faculty@dpit.com','$2y$10$2zM43M0COSa.3vjWCBRrVOhruUUieXHcMJ.HxoOuOPEnPgbr6Dbb6','USER',1,'Staff',1,0),(75,'Abhishek Gaur','abhishek.gaur@dpit.com','$2y$10$SFdoHJeW.CgL86qCxagsT.KbX7tdDDRrwxcm29bVjkroq7Xu5Rl2.','USER',1,'Staff',0,0),(76,'Suman','suman.dpit@gmail.com','$2y$10$pNPVmu3h60JRiU4oFMLgfeCWUMerlU2SGinQqSsGeOLPdnlQ88uEK','USER',1,'Staff',0,0),(77,'Deepak Kumar','deepak.kumar@dpit.com','$2y$10$YD0DYyQUzpTHx7Ngv6y66uML39lGP02OMk7fpMHDs6eS9to/dTtoO','USER',1,'Staff',0,0),(78,'Priyanka','priyanka@dpit.com','$2y$10$tEetfzP8t8zbq5yQPtleNumUUGKoe7/YTnRitZWJEEC7ziNAIBZa2','USER',1,'Staff',0,0),(79,'Not In Use (Faculty-2)','not-in-use-faculty-2@gmail.com','$2y$10$HormEOA056/iG6ukf0LUu.7/kXvP9by6ByFZXq1SnSpkW9ZqWncR6','USER',1,'Staff',1,0),(80,'Dushyant','dushyant@dpit.com','$2y$10$Ii9heNc.bQSE1If9Wpf7t.qu.vadcTB1n7EneVxHKmh9PMCY4aHoa','USER',1,'Staff',0,0),(81,'Pratibha','pratibha@dpit.com','$2y$10$UeWOF6SPcYP8DAkMpy8CKOiwCh5fwBtHreG.LWKvUMQhcfqNBieji','USER',1,'Staff',0,0),(82,'Dileep Singh','dileep.singh@dpit.com','$2y$10$kUFufdawCmJnUPSCdIpej.HMwXo5JMu0xmNTSbSbPojQD6sPUxUlO','USER',1,'Staff',0,0),(83,'Amiya Kumar Das','amiya.kumar.das@dpit.com','$2y$10$zJkaLYlv5Vuj9G6oc0lQRu7kdS/wuAfBUSah.aKff5OYs.rqQzb92','ADMIN',1,'CEO',0,0),(84,'Swati Sharma','swati.sharma@dpit.com','$2y$10$c.8xqE4zkbx25V37TCk0sui008KqvxA3JAd9sQ0kjuboWz3YwJlp6','USER',1,'Staff',0,0),(85,'Gurpreet Singh','gurpreet.singh@dpit.com','$2y$10$B5Xgg/TOjHaYLSE0JKX5IuIZErkq223yAfRczv1rW/7sFHhHOZRP.','USER',1,'Staff',0,0),(86,'Piyush','piyush@dpit.com','$2y$10$0f3tinUedbXACHLFGqbaROExCeGj4febJcrhjpFDh.Vt0gLoDfnM2','USER',1,'Staff',0,0),(87,'Mohd Shehzad','mohd.shehazad@dpit.com','$2y$10$4ku7Etz2lrv9N9qxtC288.vvZcEqqSlH9/.Qk3zEomfQMeUa7sRYa','USER',1,'Staff',0,0),(88,'Jai','jai@dpit.com','$2y$10$2vcoPDMFgyMANFDpvKbzEe7oblhl.kdjvXxHhDThE1M8SfD1NJVpK','USER',1,'Staff',0,0),(89,'Amit Gupta','amit.gupta@dpit.com','$2y$10$KJOplcP5C4GWwT.p.QbXq.I9e/g9Yx7EL/qQmZFv.kuZLYYmLEMw6','USER',1,'Staff',0,0),(90,'Ravi','ravi@dpit.com','$2y$10$hnnhI.keKHSuIJz56YNTDepV7bvg0b5ye6AedUj7.xQ4OaiZ1JLTy','USER',1,'Staff',0,0),(91,'Palak','palak@dpit.com','$2y$10$xM/EI05sRowPpz7FUJzPmeoUl8R.gW5sCYBtMQ5JRgPWFMYbQ6566','USER',1,'Staff',0,0),(92,'Rakhi','rakhi@dpit.com','$2y$10$WF37a5hoMT5Wwl/kMN30XewsVxe22pRnTAVXYjd4Rz0rkLl/UpsoO','USER',1,'Staff',0,0),(93,'Mahesh Yadav','mahesh.yadav@dpit.com','$2y$10$HTvXnB.Djdps.mHM2Mf1iuhoYR5cl1hOGmdEdU3bGxeqIvi3Nf.Rm','USER',1,'Staff',0,0),(94,'Sushant','sushant@dpit.com','$2y$10$HLccnFhFlD.tdTNc11Vg1uRKTBNa6xP0GdHyGhOLp8wsvAMKxSpuS','USER',1,'Staff',0,0),(95,'Dhananjay kumar','dhananjay.kumar@dpit.com','$2y$10$IyS5l6w0nE8s8Y.menL8u.M9iUBHdoPaZVX6YsQLl.Ww3zXjzPIsW','USER',1,'Staff',0,0),(96,'Ajay Yadav','ajay.yadav@dpit.com','$2y$10$7EdjRLqJ.lAF8jPaoHW5OueDKrfyD9g8lmjmDaRB.0ZYmOhGTkE.C','USER',1,'Staff',0,0),(97,'syslog','syslog@dpit.com','$2y$10$nUFt4gZOsi9jwdnqSxh15OwTItzBNEiOwbAZsm1tvMjhhILYTL5P6','USER',1,'Staff',0,0),(98,'Devesh Sharma','devesh.sharma@dpit.com','$2y$10$4Gwt3ux/nLy035QwFnno3eTcUMNcC/Rw8bAWWzSD5Vo3Gp9gQ/1me','USER',1,'Staff',0,0),(99,'Sharing','sharing@dpit.com','$2y$10$qVCDaFUq8xbwbFSZRX06k.1qjHCxXU1oNDxgR8ukk5XyEN3eI9wXe','USER',1,'Staff',0,0),(100,'TestUser1','testuser1@dpit.com','$2y$10$4b6QZZzSDvggHB/HuCC7LOgfflXu1t8k3HerTyt59c9OviuUzpBES','USER',1,'Staff Employee',0,0),(101,'TestUser12345','testUser12345@gmail.com','$2y$10$EQP84E4ufbOivCEog3hOA.olAHcSatvqjRWkSDv8hw2TZYcUjrHGq','ADMIN',1,'Intern',1,0),(102,'TestUser123@91132','TestUser12391132@gmail.com','$2y$10$6O8aasrk7uK/d3fpvvkYNusmtGvij0.uunsoaZARQrMtk7EJhLoEu','USER',1,'Tester',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-29 16:07:08
