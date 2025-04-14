-- MySQL dump 10.13  Distrib 5.7.39, for osx11.0 (x86_64)
--
-- Host: 127.0.0.1    Database: gerobak_listrik
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `ArticleID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateTimeOfPublication` datetime DEFAULT NULL,
  `CategoryArticle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AuthorID` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ArticleID`),
  KEY `articles_authorid_foreign` (`AuthorID`),
  CONSTRAINT `articles_authorid_foreign` FOREIGN KEY (`AuthorID`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@email.com|127.0.0.1','i:3;',1744439356),('admin@email.com|127.0.0.1:timer','i:1744439356;',1744439356);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `CategoryID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Paket Franchise','2024-12-17 07:53:13','2024-12-17 07:53:15'),(2,'Hasil Jadi','2024-12-17 07:53:25','2024-12-17 07:53:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (8,'2024_09_05_081856_create_orders_table',2),(15,'2024_11_21_060308_create_pembayaran_table',3),(22,'2024_12_08_162735_add_status_to_pembayaran_table',5),(55,'0001_01_01_000000_create_users_table',6),(56,'0001_01_01_000001_create_cache_table',6),(57,'0001_01_01_000002_create_admins_table',6),(58,'2024_09_05_080930_create_peta_franchise_table',6),(59,'2024_09_05_080931_create_mitra_table',6),(60,'2024_09_05_080932_create_calon_mitra_table',6),(61,'2024_09_05_080934_create_categories_table',6),(62,'2024_09_05_081857_create_invoices_table',6),(63,'2024_09_05_082431_create_articles_table',6),(64,'2024_09_05_082614_create_products_table',6),(65,'2024_09_05_082742_create_order_details_table',6),(66,'2024_09_05_083146_create_sales_reports_table',6),(67,'2024_11_16_151358_add_columns_to_calon_mitra_table',6),(68,'2024_12_08_144912_create_pembayaran_table',6),(69,'2024_12_09_032046_add_status_to_pembayaran_table',6),(70,'2024_12_09_034101_add_status_to_pembayaran_table',7),(71,'2024_12_09_041952_create_orders_table',8),(72,'2024_12_09_050909_update_total_column_in_orders_table',9),(73,'2024_12_09_061137_create_orders_table',10),(74,'2024_12_09_061814_create_orders_table',11),(75,'2024_12_09_061924_update_total_column_in_orders_table',12),(76,'2024_12_10_073842_add_tanggal_to_orders_table',13),(77,'2024_12_10_074426_modify_tanggal_nullable_in_orders_table',14),(81,'2024_12_10_111047_add_payment_id_to_orders_table',15),(87,'2024_12_05_073424_add_status_to_products_table',16),(88,'2024_12_10_123543_add_nomor_to_mitra_table',16),(89,'2024_12_11_061458_create_pembayaran_produk_table',16),(90,'2024_12_11_070248_update_pembayaran_produk_table',16),(91,'2024_12_16_073424_add_product_image_to_products_table',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_mitra` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_approver` text COLLATE utf8mb4_unicode_ci,
  `status` enum('belum diproses','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum diproses',
  `kategori` enum('mitra','non-mitra') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mitra',
  `aktif` enum('aktif','non-aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES (1,'JAK001','Dadang Suradang Awa','468','2025-01-21','your.email+fakedata10162@gmail.com','414-186-8544','Laki-laki','Iste libero expedita quod doloribus officia.','Magni dolorem similique saepe cumque nisi dolorum.','Repellendus dolorem cum quasi adipisci modi suscipit eum.','DKI Jakarta','Jakarta Selatan','Kebayoran Baru','Selong','DKI Jakarta','Jakarta Selatan','Kebayoran Baru','Selong','04885','-6.262528','106.736737','ktp/Bw0XCJem0OeHhMkCOvaRtbr7l5i5XIAI9VpfijOj.png','foto/yPHMN73mNE03HSQvoeNRgCDY3UDWFHjuR8Z0OShF.png',NULL,'diterima','mitra','aktif','2025-04-12 07:34:47','2025-04-14 08:59:41'),(2,'JAK002','Dolor Sit','336','2026-01-31','your.email+fakedata94249@gmail.com','248-750-2463','Wanita','Recusandae omnis nam.','Accusantium doloremque asperiores error odio.','Reiciendis iure animi laboriosam aliquam iusto at quibusdam voluptates ipsum.','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','79749-1037','-6.397112','106.907586','ktp/5HFAbzAxAwUqxNhNOYV3vH7KOH99KXjgq5TKYqWO.png','foto/odgcrpBSBpmMvcXUGkfwwypeEM6ahE6u3L7F34mk.png',NULL,'diterima','mitra','non-aktif','2025-04-12 07:35:34','2025-04-12 07:35:34'),(3,'JAK003','Amet Nur','276','2025-09-03','your.email+fakedata20740@gmail.com','223-610-2931','Laki-laki','Suscipit iusto ad qui assumenda laboriosam maxime.','Modi aut nihil a praesentium sed.','Eligendi facilis unde ea animi.','DKI Jakarta','Jakarta Pusat','Menteng','Menteng','DKI Jakarta','Jakarta Pusat','Menteng','Menteng','26964-6365','-6.262528','106.736737','ktp/4w2TvyFBbTHYXwCeuOVqsSqI4jdWLAn2hnBr2xq5.png','foto/WJbi4TjeROx1lHQLQPxhohPf0GNF4mT9maYz7p82.png','gerobak lu jelekkkk','ditolak','mitra','aktif','2025-04-12 07:38:00','2025-04-14 07:39:43'),(4,'JAK004','Jane Doe','521','2024-12-28','your.email+fakedata21544@gmail.com','094-562-0592','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','15764','-6.397112','106.736737','ktp/qNMQyKH5U9Ahn5PWSYiIwlfSqU1pssZnUhceY3A9.png','foto/YI6ATbln5P4q9sLtYbvv9az4orCr0Ol5rSdMLksK.jpg',NULL,'belum diproses','mitra','aktif','2025-04-14 07:38:25','2025-04-14 07:38:25'),(5,'JAK005','Dean Tristan','521','2024-07-27','your.email+fakedata77801@gmail.com','406-611-6265','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Pusat','Menteng','Kebon Sirih','DKI Jakarta','Jakarta Pusat','Menteng','Kebon Sirih','52779-4819','-6.262528','106.907586','ktp/OklfpzE50AJtc2Xv5rfdXjNxGyIc5sCRSB8U9ALz.jpg','foto/7xW03NPvTy0REAdAopRbaV0MguYGcWNcJExrdimQ.jpg',NULL,'belum diproses','mitra','aktif','2025-04-14 07:38:48','2025-04-14 07:38:48'),(6,'JAK006','Epon Gimang','521','2025-11-05','your.email+fakedata46217@gmail.com','714-378-5288','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Pusat','Menteng','Gondangdia','DKI Jakarta','Jakarta Pusat','Menteng','Gondangdia','82112-4351','-6.277063','106.732577','ktp/n4rWxAQtseBeIY8cQU5kbbj9m2vTGyie0rScRAhV.jpg','foto/lnTF96VZd4XCTwYk1Fjg1wpfgYno4gtMc0HBMl9q.jpg',NULL,'belum diproses','mitra','aktif','2025-04-14 07:39:13','2025-04-14 07:39:13'),(7,'JAK007','Devi Februari','521','2025-11-05','your.email+fakedata46217@gmail.com','714-378-5288','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Utara','Tanjung Priok','Sungai Bambu','DKI Jakarta','Jakarta Utara','Tanjung Priok','Sungai Bambu','82112-4351','-6.277063','106.732577','ktp/LpZimgd5zUslFvG9QjKMMSUkxdS9rrVvuW8opDBt.jpg','foto/HAv6OKfW2UMXxPqms8X1OoYRkMhBOkB5QHTPX6nS.jpg',NULL,'belum diproses','mitra','aktif','2025-04-14 07:39:35','2025-04-14 07:39:35');
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `payment_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('mitra','non mitra') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `pickup_method` enum('delivery','pickup') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('menunggu','sudah diambil') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_id_unique` (`order_id`),
  KEY `orders_payment_id_foreign` (`payment_id`),
  CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (38,'DEM001','2025-03-13',20,'Devi Fedrianingsih','mitra',21000000.00,'delivery','menunggu','2025-03-13 06:27:25','2025-03-13 06:27:25');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_delivery` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_bukti` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (20,'Devi Fedrianingsih','Jl. Cipinang Lontar 1 No. 25','Jakarta Timur','13240','081918999460','bca','delivery','21000000','bukti-transfers/IOBnrlywSCwnFNtHjdUK0PHHRBSrAI7uYadTKKYu.jpg','2025-03-13 06:27:05','2025-03-13 06:27:25','approved');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran_produk`
--

DROP TABLE IF EXISTS `pembayaran_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pembayaran_id` bigint unsigned NOT NULL,
  `nama_produk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `kuantitas` int NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_produk_pembayaran_id_foreign` (`pembayaran_id`),
  CONSTRAINT `pembayaran_produk_pembayaran_id_foreign` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran_produk`
--

LOCK TABLES `pembayaran_produk` WRITE;
/*!40000 ALTER TABLE `pembayaran_produk` DISABLE KEYS */;
INSERT INTO `pembayaran_produk` VALUES (1,20,'Paket Hemat B',12000000,1,12000000.00,'2025-03-13 06:27:05','2025-03-13 06:27:05'),(2,20,'Paket Super C',9000000,1,9000000.00,'2025-03-13 06:27:05','2025-03-13 06:27:05');
/*!40000 ALTER TABLE `pembayaran_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Price` double DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `ProductRating` double DEFAULT NULL,
  `CategoryID` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `ProductImage` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `products_categoryid_foreign` (`CategoryID`),
  CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Telur Puyuh Rebus','Telur Puyuh Rebus',4000,3000,NULL,2,'2024-12-17 01:20:51','2024-12-17 01:20:51','published','img/product_image/6761346392fff.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_reports`
--

DROP TABLE IF EXISTS `sales_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_reports` (
  `ReportID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ReportDate` date DEFAULT NULL,
  `TotalSales` double DEFAULT NULL,
  `AdminID` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ReportID`),
  KEY `sales_reports_adminid_foreign` (`AdminID`),
  CONSTRAINT `sales_reports_adminid_foreign` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_reports`
--

LOCK TABLES `sales_reports` WRITE;
/*!40000 ALTER TABLE `sales_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
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
INSERT INTO `sessions` VALUES ('9Vh0o95kQNfySgPVNSJnRZaQRTkdRcOkgaqouKsd',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoic0hxTmp4Unl4UlBvd3dmWmZWeEZXTkZzcDBtZnoyVHYwZ3VsV2tDRCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWFwcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQ0NjE1ODIzO319',1744623465);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$12$kFrIJoo9dsvbowDC9t3ck.W61Vpkx9wrVOXe8Ehc2UsC2lNAG0FVi',NULL,'2024-12-08 20:50:30','2024-12-08 20:50:30'),(2,'Devi Fedrianingsih','devifedrianingsih@gmail.com',NULL,'$2y$12$WFAwLweGhWGc4tzqetBilOPeS6d/e8Ph4/gFPmzK50/89ETMj6ssW',NULL,'2024-12-19 17:32:41','2024-12-19 17:32:41'),(3,'Dean','dean@mail.com',NULL,'$2y$12$CjoPSkAlv495s429JAM8heVaVjneGNcKp/R0TjioeqVgLClfQuyq6',NULL,'2024-12-08 20:50:30','2024-12-08 20:50:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gerobak_listrik'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-14 16:38:13
