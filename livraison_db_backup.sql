-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: zed_logistics
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `account_types`
--

DROP TABLE IF EXISTS `account_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `possible` int DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_types`
--

LOCK TABLES `account_types` WRITE;
/*!40000 ALTER TABLE `account_types` DISABLE KEYS */;
INSERT INTO `account_types` VALUES (1,'AGS','Agent Suisse',1,'Agence Suisse'),(2,'AGC','Agent Cameroun',1,'Agence Cameroun'),(3,'ADM','Administrateur',2,NULL),(4,'CLT','Client',0,NULL),(6,'BEL','Agent Belgique',1,'Agence Belgique'),(7,'FRA','Agent France',1,'Agence France'),(8,'ALL','Agent Allemagne',1,'Agence Allemagne');
/*!40000 ALTER TABLE `account_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `cni` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (2,'Dabs','Du 93','Homme','452145','698674513','dabsdu93@gmail.com','Paris 93','2019-09-18 02:46:48','2019-09-18 02:50:44'),(3,'Kalash','Criminel','Homme','451245022','678451245','kalash.crimi@gmail.com','93 Rue d\'Evry','2019-09-27 10:54:44','2019-09-27 10:54:44'),(4,'toto','toto','Homme','4154515485415','695432166','toto@gmail.com','monti','2019-09-27 22:30:56','2019-09-27 22:30:56'),(5,'Bikoe','Geordane','Homme','656213264562','698465213','caro@gmail.com','Paris 18','2019-09-27 22:31:42','2019-09-27 22:31:42');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colis`
--

DROP TABLE IF EXISTS `colis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `nature` varchar(500) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `contenance` text,
  `poids` double DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `valeur_euro` double DEFAULT NULL,
  `date_entree` date DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `fragilite` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `statut` varchar(50) DEFAULT 'En attente',
  `tarif_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `hauteur` double DEFAULT NULL,
  `longueur` double DEFAULT NULL,
  `largeur` double DEFAULT NULL,
  `who` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_colis_clients` (`user_id`) USING BTREE,
  CONSTRAINT `FK_colis_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colis`
--

LOCK TABLES `colis` WRITE;
/*!40000 ALTER TABLE `colis` DISABLE KEYS */;
INSERT INTO `colis` VALUES (42,39,40,NULL,'Sac de riz','Contient sac de riz',2,1,NULL,'2024-06-06','2024-06-08','6','Normale','Retiré',7,'2024-06-06 21:59:25','2024-06-06 22:16:06',6,5,4,37),(43,40,39,NULL,'Acte de naissance','Contient un document',3,1,NULL,'2024-06-07','2024-06-09','1','Fragile','Envoyé',5,'2024-06-07 11:50:22','2024-06-11 18:41:02',1,3,5,38),(44,40,39,NULL,'Carton de sucre','Contient du sucre',24,1,604.8,'2024-06-07','2024-06-10','1','Fragile','En attente',7,'2024-06-07 11:57:33','2024-06-07 11:57:33',42,32,30,38),(45,39,40,NULL,'Acte de naissance','contient un document',1,1,0.5399999999999999,'2024-06-11','2024-06-12','6','Fragile','Retiré',5,'2024-06-11 18:36:22','2024-06-11 18:41:44',5,6,3,37);
/*!40000 ALTER TABLE `colis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text,
  `state` int DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (2,'Test','test@email.com','Test','test',1,'2019-09-19 16:34:49','2019-09-19 16:34:51'),(3,'moi','ecole@gmail.com','qualité','je suis fier',1,'2019-09-28 00:21:17','2019-09-28 00:21:17'),(4,'hfgfgv','toto@gmail.com','jgfjgv','chgc',1,'2019-10-02 13:39:16','2019-10-02 13:39:16'),(5,'guy','junior@gmail.com','perte de colis','Je ne retrouve pas mon colis envoyé il y a de cela deux ans',1,'2024-05-06 17:34:58','2024-05-06 17:34:58');
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(500) DEFAULT NULL,
  `colis_id` int DEFAULT NULL,
  `motif` text,
  `statut` varchar(50) DEFAULT 'En attente',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `message` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incidents_colis` (`colis_id`),
  CONSTRAINT `FK_incidents_colis` FOREIGN KEY (`colis_id`) REFERENCES `colis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidents`
--

LOCK TABLES `incidents` WRITE;
/*!40000 ALTER TABLE `incidents` DISABLE KEYS */;
INSERT INTO `incidents` VALUES (11,'perte de mon colis',42,'perte de colis','Résolu','2024-06-11 18:43:46','2024-06-11 18:44:24',0);
/*!40000 ALTER TABLE `incidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` double DEFAULT '0',
  `libelle` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifs`
--

LOCK TABLES `tarifs` WRITE;
/*!40000 ALTER TABLE `tarifs` DISABLE KEYS */;
INSERT INTO `tarifs` VALUES (1,150,'Véhicules ','2019-09-18 05:19:54','2019-10-06 17:04:20'),(4,50,'Appareils','2019-10-06 16:54:37','2019-10-06 17:04:34'),(5,40,'Documents','2019-10-06 16:55:29','2019-10-06 17:04:47'),(6,50,'Produits textiles ','2019-10-06 16:57:01','2019-10-06 17:04:05'),(7,35,'Produits alimentaires','2019-10-06 16:57:54','2019-10-06 17:05:06');
/*!40000 ALTER TABLE `tarifs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_eph` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cni` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_account_types` (`account_id`),
  CONSTRAINT `FK_users_account_types` FOREIGN KEY (`account_id`) REFERENCES `account_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','admin','Suisse',NULL,'$2y$10$z5mdwLWOtmsfMzykOxyDtuOLSYt5pQHkj6jt9HtAZmHVocfGKYnbG','',NULL,3,'2019-09-18 02:33:00','2019-09-18 02:33:01',NULL,NULL,NULL,NULL),(37,'guy','guy','guy','Suisse',NULL,'$2y$10$57WSGWG5QiM4r0OEA.ZYJe8zJ/Gpg6nH7L9xcGOEkPphTlZ3cabby','123456',NULL,1,NULL,NULL,'045879616','guy@gmail.com','04565179','Charleroi'),(38,'marc','jordan','marc','Belgique',NULL,'$2y$10$mTCAAYWrqc5Tqyx393OyK.DppVeBfGBhKJ7df0715VC9szjcD2hHq','123456',NULL,6,NULL,NULL,'014786985','marc@gmail.com','046879613','Brugges'),(39,'kezy','muzz','kezy','Suisse',NULL,'$2y$10$r/hVIZH5UqhiGgYM92caKu4ZeaBec4cocmBPOo73XZrcO8yyaaL6.','123456',NULL,4,NULL,NULL,'053987123','nkom.takeu.guyjr@gmail.com','014678216','Suisse'),(40,'naomi','stara','naomi','Belgique',NULL,'$2y$10$exFzOaHpMlOkCYY9U5YUWOmn5opohzoKhaVDzf9znCcXvjkVvOLsy','123456',NULL,4,NULL,NULL,'478956213','nkom.takeu.guyjr@gmail.com','045976136','Belgique');
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

-- Dump completed on 2024-06-13 15:29:33
