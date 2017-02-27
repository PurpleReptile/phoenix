-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel_db
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Авто',NULL,NULL),(2,'Природа',NULL,NULL),(3,'Интернет',NULL,NULL),(4,'Спорт',NULL,NULL),(5,'Наука',NULL,NULL),(6,'Слоны','2017-02-11 10:33:13','2017-02-11 10:33:13'),(7,'Не слоны','2017-02-11 10:33:21','2017-02-11 10:33:21');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_04_174916_create_posts_table',1),(4,'2017_02_08_091946_add_slug_to_posts',1),(5,'2017_02_11_121329_create_categories_table',2),(6,'2017_02_11_121711_add_category_id_to_posts',2),(7,'2017_02_12_120031_create_tags_table',3),(8,'2017_02_12_122059_create_post_tag_table',4),(9,'2017_02_18_120219_add_image_col_to_posts',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (1,14,3),(2,14,5),(3,6,5),(4,6,6),(5,15,2),(6,15,4),(7,16,2),(8,16,6);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Post number 1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-1',NULL,1,'2017-02-10 12:57:44','2017-02-15 09:56:42'),(2,'Post number 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-2',NULL,2,'2017-02-10 16:31:02','2017-02-15 09:56:18'),(3,'Post number 3','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-3',NULL,1,'2017-02-12 07:30:03','2017-02-15 09:55:36'),(4,'Post number 4','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-4',NULL,5,'2017-02-12 07:31:14','2017-02-15 09:54:49'),(5,'Post number 5','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-5',NULL,2,'2017-02-12 12:44:16','2017-02-15 09:55:14'),(6,'Post number 6','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!</p>','post-6',NULL,7,'2017-02-15 09:57:06','2017-02-18 09:22:13'),(7,'Post number 7','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-7',NULL,3,'2017-02-15 09:57:39','2017-02-15 09:57:39'),(8,'Post number 8','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-8',NULL,3,'2017-02-15 09:57:40','2017-02-15 09:57:40'),(9,'Post number 9','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-9',NULL,3,'2017-02-15 09:57:41','2017-02-15 09:57:41'),(10,'Post number 10','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-10',NULL,3,'2017-02-15 09:57:42','2017-02-15 09:57:42'),(11,'Post number 11','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-11',NULL,4,'2017-02-15 09:57:43','2017-02-15 09:57:43'),(12,'Post number 12','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post-12',NULL,5,'2017-02-15 09:57:45','2017-02-15 09:57:45'),(13,'Post number 13','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit culpa aliquam laboriosam, impedit perspiciatis atque. Sunt ipsam quae, voluptatum repudiandae, accusamus mollitia porro. Provident, dignissimos accusamus voluptate, atque suscipit aspernatur!','post777',NULL,5,'2017-02-15 09:57:47','2017-02-16 09:06:33'),(14,'new post','<p><strong>Welcome!</strong></p>\r\n<p>This adskf lsjdf lksjd&nbsp;<em>sdljfklsdj fkljds f.</em></p>\r\n<p>&nbsp;</p>','new-post',NULL,1,'2017-02-18 08:26:37','2017-02-18 08:29:46'),(15,'fdsgfdsagag','<p>Image <strong>downloaded</strong>. sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdf dsf asd wqer v ewrv re sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdf dsf asd wqer v ewrv re sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdf dsf asd wqer v ewrv re sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdf dsf asd wqer v ewrv re sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdfsdg dsaf sdf dsf asd wqer v ewrv re&nbsp;</p>','sdagsdag',NULL,3,'2017-02-18 09:33:14','2017-02-18 09:33:14'),(16,'New post ','<p><strong>Welcome!</strong></p>\r\n<p><em>sdkljflksdj dkls;j fkjr frekl; jgdfkjs gdsj klg;jdsfkljg kl;dsfk gj fdskl;jg erjwiotj ieowvn erklwjf kdsjf jklj;dsf kjsdiaf j/ fkdsj dsf.d sf d.sf ds.f&nbsp;</em></p>','kdsljg-dsklgjdklg','1487427625.jpg',6,'2017-02-18 11:20:25','2017-02-18 11:20:25');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Авто','2017-02-12 11:03:16','2017-02-12 11:03:16'),(2,'Цветы','2017-02-12 12:04:39','2017-02-12 12:04:39'),(3,'Природа','2017-02-12 11:03:37','2017-02-17 17:32:00'),(4,'Интернет','2017-02-12 11:04:23','2017-02-12 11:04:23'),(5,'Спорт','2017-02-12 11:04:30','2017-02-12 11:04:30'),(6,'Наука','2017-02-12 11:04:34','2017-02-12 11:04:34'),(7,'Слоны','2017-02-12 11:04:39','2017-02-12 11:04:39');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Igor Poyarkov','poyarkoff@yandex.ru','$2y$10$ix3ckWDlI0Cy/XuC08TqBuVm13L3H1aGGfvtKSsrP0Lx.6GrI7jX.','guM2C8JUoWQoYs4vHtooKOxCyw9rBetmQvWBrJIda9FLRCJtDxbiqstz5fx8','2017-02-10 10:46:41','2017-02-18 12:38:20'),(2,'kpa','kpa@kpa.ru','$2y$10$.8XKIzpWn7XTjBM/uWZWb.PlGeqfV1BsOxZEjbKZ37ZqXXIOKmVbm','vI7kqacVGDhrzwGUDR5GgQdNJJLDPoN0giGUL0PafS80l092d35q6oocUhmo','2017-02-10 16:12:47','2017-02-10 16:16:22');
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

-- Dump completed on 2017-02-27  9:59:32
