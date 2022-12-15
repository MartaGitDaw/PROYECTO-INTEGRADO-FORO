-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto_integrado_foro
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Programming','2022-12-14 09:26:37','2022-12-14 09:26:37'),(2,'Systems','2022-12-14 09:26:37','2022-12-14 09:26:37'),(3,'Big Data','2022-12-14 09:26:37','2022-12-14 09:26:37'),(4,'AI','2022-12-14 09:26:37','2022-12-14 09:26:37'),(5,'IoT','2022-12-14 09:26:37','2022-12-14 09:26:37'),(6,'Robotics','2022-12-14 09:26:37','2022-12-14 09:26:37');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `thread_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_thread_id_foreign` (`thread_id`),
  CONSTRAINT `comments_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'A consectetur voluptatem aperiam. Iure accusantium animi aut sed modi. Quia non corrupti repudiandae sapiente est vel. Tempore inventore laudantium odio consequatur sed illo laborum consequuntur.',1,27,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(2,'Nihil aspernatur aut et ullam minus. Commodi nihil quos quibusdam incidunt provident voluptatum. Culpa blanditiis sunt sed.',4,4,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(3,'Iure aliquam est distinctio blanditiis suscipit. Hic suscipit ex voluptas. Sit quasi sit et aut id.',5,2,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(5,'Vel ut eos quas adipisci alias omnis. Quasi id et ullam corporis dolorem consequuntur sequi.',8,2,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(6,'Sunt eos voluptatem qui reiciendis sequi suscipit est. Est dolorum neque occaecati. Recusandae error consequatur magni nesciunt excepturi ex.',8,8,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(8,'Non modi laborum et fuga ad. Reprehenderit et sint aut explicabo veniam. Nihil eligendi laudantium debitis aspernatur excepturi sequi nesciunt labore.',1,3,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(9,'Ea deleniti sint ipsam. Sunt consectetur omnis occaecati. Doloremque sed in porro neque nam aspernatur nihil qui. Quod voluptas aperiam optio. Iste velit quia autem odit.',9,16,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(10,'Quidem mollitia laudantium voluptate autem. Aliquam voluptatum voluptatum a. Sit esse in qui non at. Vel expedita ipsum quasi est.',3,12,'2022-12-14 09:26:50','2022-12-14 09:26:50'),(14,'hola',1,30,'2022-12-14 16:53:58','2022-12-14 16:53:58'),(15,'hola',1,9,'2022-12-14 16:57:42','2022-12-14 16:57:42'),(17,'que tal',1,29,'2022-12-14 17:00:29','2022-12-14 17:00:29');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `likeable_id` int(10) unsigned NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,6,12,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(2,1,10,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(3,4,28,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(4,11,21,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(5,10,19,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(6,4,4,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(7,1,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(8,2,4,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(9,10,29,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(10,5,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(11,6,10,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(12,6,27,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(13,2,9,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(14,9,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(15,10,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(16,11,13,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(17,10,1,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(18,9,22,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(19,9,22,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(20,4,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(21,7,23,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(22,1,20,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(23,2,24,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(24,7,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(25,5,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(27,9,4,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(28,7,22,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(29,6,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(31,5,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(32,10,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(33,1,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(34,5,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(35,7,19,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(36,2,2,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(37,2,7,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(38,9,12,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(39,8,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(40,2,17,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(41,9,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(42,5,19,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(43,1,30,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(44,7,26,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(45,11,27,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(46,6,29,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(47,7,16,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(48,9,4,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(49,4,12,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(50,9,30,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(51,8,9,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(52,1,11,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(53,2,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(54,6,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(55,6,22,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(56,4,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(57,4,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(58,1,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(59,8,30,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(60,9,10,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(61,9,4,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(62,6,7,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(63,8,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(64,10,9,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(65,3,5,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(66,1,15,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(67,9,2,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(68,8,23,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(69,1,28,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(70,9,9,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(71,10,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(72,6,1,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(73,8,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(74,8,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(75,4,12,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(76,9,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(77,1,29,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(78,4,11,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(79,11,2,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(80,10,15,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(81,6,12,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(82,6,6,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(83,6,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(84,3,15,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(85,2,20,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(86,4,29,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(87,8,11,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(88,11,7,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(89,3,17,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(90,9,1,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(91,9,20,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(92,2,27,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(93,11,22,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(94,9,1,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(95,11,21,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(96,4,3,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(97,10,25,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(98,2,26,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(99,8,29,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49'),(100,11,23,'threads','2022-12-14 09:26:49','2022-12-14 09:26:49');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2022_11_30_040558_create_sessions_table',1),(7,'2022_11_30_041317_create_permission_tables',1),(8,'2022_12_01_152623_create_categories_table',1),(9,'2022_12_01_202948_create_threads_table',1),(10,'2022_12_13_102812_create_likes_table',1),(11,'2022_12_14_093840_create_comments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'users',1),(2,'users',1),(2,'users',2),(2,'users',3),(2,'users',4),(2,'users',5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2022-12-14 09:26:37','2022-12-14 09:26:37'),(2,'moderator','web','2022-12-14 09:26:37','2022-12-14 09:26:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('ceyY86fjN2pW3se7BJ82hu8sSS29AKghkF2mrtt9',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHd0UzE2NW8yUlVGU1Q5ZUN0ek1BRXF4YU5iS1RjVFdVQk0zNHFLVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1671056787),('U27R33Rt9R0qNanzkY7KOuxJuOZ7NJsbUzdfwozL',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlV0NFdFVG5aSGp1RUI5Ym1vOVBSaVZWWnE4M2ZLVFBCSFhOR1lpUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1671056776),('VuvtLqRnMhaHHBEIcr4VDPq3qF7pcHe1fFXOf8gw',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYll6UXFVSDZrQkhvajBRYUpMaFVDTE90YnNTT3gxdWVHZWtrY0hySyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXRlZ29yaWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==',1671059092);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `threads_title_unique` (`title`),
  KEY `threads_user_id_foreign` (`user_id`),
  KEY `threads_category_id_foreign` (`category_id`),
  CONSTRAINT `threads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `threads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (1,'Recusandae necessitatibus nemo unde et','Qui consequatur eius doloremque porro et. Ut consequatur et qui qui. Totam tenetur dolores deserunt labore fugiat qui et veniam. Nobis iusto nihil perspiciatis totam aut voluptate.','images-threads/4a07a0bf2fb48a0f6eec264141590c13.jpg',8,4,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(2,'Impedit iusto aliquam odit ratione','Aliquam vel est distinctio sit ipsa ea officia. Accusantium nihil error eum beatae.','images-threads/223e623c61a3ca922d91164b0b7551d4.jpg',7,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(3,'Aperiam illum quis optio esse','Qui voluptatem voluptas assumenda rem nihil quo. Tenetur porro et quibusdam veniam et. Cumque et dolorem autem asperiores eos voluptatem. Et aut voluptas sit quidem.','images-threads/fec74fe3dbd8267ce99c87b6fe882d95.jpg',9,2,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(4,'Repudiandae dolores quibusdam rerum modi','Ut a repellendus et. Ea esse vel tenetur explicabo. Fugiat quia dolor labore eius.','images-threads/34f9b00b761f7d3bdc2c9691638a2b2a.jpg',7,3,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(5,'Et qui necessitatibus fuga quia','Enim sit amet dolore qui aut aliquid necessitatibus minus. Et laudantium quisquam eum sed perspiciatis facere. Velit atque rem sapiente eligendi. Numquam quis in perferendis.','images-threads/9f880cf8e9932487d1ae72577b189992.jpg',6,6,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(6,'Consectetur tenetur unde accusantium quasi','Harum praesentium facere sequi ducimus soluta perferendis. Iusto ab ipsam velit omnis ut ea deserunt qui. Maiores est quis temporibus rerum quod suscipit. Sunt eos incidunt sit odio.','images-threads/cbd3f1c91b6dda44748ab74b69725d3c.jpg',8,4,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(7,'Est eaque laudantium porro dolore','Velit saepe assumenda aliquam aperiam ea hic. Minima labore a dignissimos delectus vel ducimus ab. Blanditiis quis facilis quas quia.','images-threads/63e118c6e6efb95fc9f06653d315527b.jpg',7,3,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(8,'Qui deleniti error eius ut','Voluptatem ullam dolorem possimus necessitatibus libero qui ut ex. Quibusdam cum minus aut quod voluptatem qui voluptatem.','images-threads/bed385037b7224e10132399a3b78cc7b.jpg',9,6,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(9,'Voluptas tenetur debitis fugiat provident','Minima nihil dolor non. Atque cumque doloribus et maiores et qui dolores. Esse illo dignissimos voluptas.','images-threads/b18e84d6e68e9e7a9b8c659d9ccc895e.jpg',7,1,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(10,'Voluptatum delectus quis eum cum','Sunt non quis molestias. Sequi consequuntur in impedit sit. Pariatur error quos aperiam dolores pariatur.','images-threads/76240059ef60c5d24922a519d219137a.jpg',8,3,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(11,'Dicta labore velit et aliquam','Tempore impedit voluptas nemo magni et molestiae. Dignissimos voluptatem mollitia ut ullam. Unde explicabo necessitatibus amet quae a.','images-threads/b69c8a7201c86f505c8cc26ed8a1c52b.jpg',10,6,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(12,'Ad voluptatibus similique quas itaque','Ea mollitia debitis deserunt quos et aut provident. Qui autem voluptas odit esse eum quisquam ullam. Sed doloribus ut provident eius. Rerum aut est exercitationem illum.','images-threads/86a4c48f0eff0e32ff39c84b9df5e6c1.jpg',7,1,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(13,'Veritatis qui expedita laudantium aperiam','Ad quos laboriosam ea iure. Quos praesentium et recusandae sed dolor. Sint harum aliquid enim unde eligendi.','images-threads/8fc4859595ba4436d5eb6f6482be410f.jpg',11,2,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(15,'Numquam ea voluptatem molestias nobis','In aut veniam distinctio non facilis optio ut. Iure fuga sint possimus tempore magni voluptatibus praesentium et.','images-threads/8a0f87ddd551ffac6ac8f3883bc22a4a.jpg',11,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(16,'Quis vitae sint enim culpa','Quia ut nulla et autem. Occaecati consectetur consequatur aut sit repellendus unde nulla. Officiis minima expedita sequi omnis fuga maxime. Nemo corrupti rerum rerum eligendi.','images-threads/4a8cbc40c41d0536101a18d155970ca8.jpg',2,4,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(17,'Ut eaque quod eius repudiandae','Illum non ea a explicabo quia qui maiores. Quia id qui quia fugiat officiis. Enim atque voluptatem velit qui vitae vero quam.','images-threads/1835d77351c1d6f18cd9cb7b21e7ba91.jpg',11,1,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(18,'Quia rerum id et corporis','Quis nulla necessitatibus nobis debitis. Officia iusto dolorem qui expedita ea id et. Tenetur tempora recusandae ut dolorum. Voluptatem sunt quisquam omnis incidunt.','images-threads/b60218a7aa93ba5f937fc8c27241101f.jpg',11,3,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(19,'Sit nihil tempora aut iure','Possimus quia qui aut aut et iusto tenetur. Molestias error quo ab magni molestiae omnis et et. Aspernatur aperiam in reprehenderit rerum a et. Repudiandae magnam non neque sit fugit doloremque.','images-threads/ae9266afbe528eb38e65944d9fa28b7d.jpg',9,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(20,'Reprehenderit dolores quo quo amet','Odio reiciendis voluptate blanditiis autem. Ut sint voluptatibus consequuntur iusto occaecati dicta aut. Repellendus enim consequatur et eius.','images-threads/a2a3edeb68ad092e0a8d04f8651414d2.jpg',1,4,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(21,'Est earum quis consequatur doloremque','Explicabo sit deleniti quia molestiae nostrum voluptatem reiciendis laboriosam. Architecto et itaque aut ut minus et exercitationem esse. Iste corporis non iusto eveniet.','images-threads/0be535ca1644bbc6c8af135cdd344e40.jpg',2,2,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(22,'Ut nostrum odio eos dolores','Porro dolore est voluptas dolores sit eum enim quisquam. Doloremque quibusdam eligendi rerum voluptatem ut. Veniam sint fuga magni a excepturi molestiae error.','images-threads/29c7f465cad3de536cdfd6a337373699.jpg',4,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(23,'In nesciunt fugiat recusandae rerum','Fugit ut et quia quasi modi. Tenetur rerum modi sunt ut voluptatem quis odio. Magni qui dolorum quos veritatis perspiciatis sed veniam. Aut blanditiis incidunt veniam earum qui occaecati.','images-threads/172bbc25cd32b910275f8524e027b58b.jpg',1,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(24,'Ut laboriosam eum perspiciatis enim','Cum et et sunt sunt modi rerum. Quia voluptas laboriosam assumenda earum error dolorem. Voluptatem et molestiae iusto eos praesentium deleniti.','images-threads/2365bad8a44907c3f2779093a5b2cedc.jpg',4,2,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(25,'Recusandae eaque officia excepturi nemo','Praesentium magni optio molestias inventore. Soluta atque eaque omnis odio. Qui facere aliquam et omnis et ipsa.','images-threads/be2497d8b1ad93782d6be11a5907086e.jpg',8,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(26,'Nobis iste illo quia beatae','Harum qui alias sed quia. Et consequuntur aperiam praesentium veniam illo aut et. Quo et eligendi minus odit itaque omnis. Ut totam nostrum explicabo.','images-threads/0eba6c1423b45b1b2b202a9edea8357e.jpg',4,2,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(27,'Sint non hic provident est','Laboriosam sint ad esse qui architecto ipsa est id. Deserunt rerum quis excepturi nihil et porro.','images-threads/79d3d97e2dcb6d21fa5e47cb15c99767.jpg',5,5,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(28,'Aut est odit est vero','Hic ut itaque dolores distinctio consequuntur. Quos aperiam voluptas labore debitis eaque. Commodi reiciendis sed sapiente. Perferendis laborum fuga ratione explicabo qui rerum.','images-threads/a813a3a4693310445731e94466679ae8.jpg',5,3,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(29,'Esse numquam illum et nemo','Voluptatibus et et dolor enim odit facilis. Veniam ab molestiae saepe velit rerum dolores at rem. Amet reprehenderit id voluptatem qui delectus.','images-threads/0068177a171ed8daf9121c9e073db8ab.jpg',10,6,'2022-12-14 09:26:49','2022-12-14 09:26:49'),(30,'Quam fugit deleniti aspernatur amet','Labore modi deserunt similique occaecati. Dolorem exercitationem qui sequi quibusdam nostrum debitis dolores. Earum est in vero explicabo officia. Totam repellendus est enim non cupiditate.','images-threads/5d63aa1f5f72bb48efc4eb9335c47079.jpg',4,4,'2022-12-14 09:26:49','2022-12-14 09:26:49');
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ADMIN','Yo soy el usuario administrador :) ','admin@gmail.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'stjgYA5HHX2qv54M96I5S123b4yb9wFF8ChBapNpxqdHgQr4zTKXlsq2pEvX',NULL,'profile-photos/tHYPe1STgv8PAcmo4O9a8eEfjjdFpv0LUjIPbr5A.jpg','2022-12-14 09:26:37','2022-12-14 11:06:55'),(2,'Rosario Terán Téllez','Quibusdam eius necessitatibus dolorem assumenda nihil.','rosarioterantellez@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'WPNxzgplOs',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(3,'Marco Rolón Toro','Quisquam nostrum sed id ipsum nemo itaque quas et.','marcorolontoro@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'25NN45aQ4WUWVzJNcyOy0lB9YCVFEMwm8yBTMEXkaRwfMoi65Wn7Jp8ahb36',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(4,'Samuel Escobedo Carrasquillo','Debitis nobis hic cupiditate optio quasi alias aut.','samuelescobedocarrasquillo@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'WFIQcAo2x3',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(5,'Zoe Curiel Mojica','Ut aperiam molestias est a.','zoecurielmojica@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'UdCYxEe25w',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(6,'Nayara Loya Mena','Autem est enim cupiditate expedita.','nayaraloyamena@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'fM9G3jRvIlI4WAvLdh93wAalQ4qqU29XSj8y2F7BSr9oukv2ilNA1j4CGdZz',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(7,'Patricia Dueñas Llorente','Cum ipsum beatae voluptatem aperiam.','patriciaduenasllorente@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'BTrQIOxvSG',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(8,'Ariadna Zamora Cavazos','Explicabo expedita quis accusamus possimus commodi fugit.','ariadnazamoracavazos@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'hQrddHzmFq',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(9,'Leire Olmos Carranza','Animi rerum velit temporibus.','leireolmoscarranza@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'oJ3tZiSuMS',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(10,'Esther Godínez Galarza','Rem eum culpa dolor repellendus alias.','esthergodinezgalarza@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'O6MbrZDk8V',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37'),(11,'Mar Vega Mondragón','Eos sunt ut quaerat sit doloribus et molestias.','marvegamondragon@gmail.com','2022-12-14 09:26:37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,'bkD1PjQ3em01IB5pA67xRboSMunxq6HM7xRFnsahjoMLQpwZ7VscsO2PQJwJ',NULL,NULL,'2022-12-14 09:26:37','2022-12-14 09:26:37');
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

-- Dump completed on 2022-12-15  2:46:38
