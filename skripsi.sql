-- MySQL dump 10.17  Distrib 10.3.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: skripsi
-- ------------------------------------------------------
-- Server version	10.3.23-MariaDB-1

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
-- Table structure for table `facs`
--

DROP TABLE IF EXISTS `facs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facs` (
  `id_fac` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_fac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fac`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facs`
--

LOCK TABLES `facs` WRITE;
/*!40000 ALTER TABLE `facs` DISABLE KEYS */;
INSERT INTO `facs` VALUES (1,'Faktor Utama',60,NULL,'2020-08-09 06:47:21'),(2,'Faktor Pendukung',40,NULL,'2020-08-09 06:47:21');
/*!40000 ALTER TABLE `facs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
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
-- Table structure for table `faks`
--

DROP TABLE IF EXISTS `faks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faks` (
  `id_fak` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_fak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faks`
--

LOCK TABLES `faks` WRITE;
/*!40000 ALTER TABLE `faks` DISABLE KEYS */;
INSERT INTO `faks` VALUES (1,'TEKNIK','2020-07-20 18:00:21','2020-07-20 18:00:21'),(2,'FMIPA','2020-07-22 20:34:34','2020-07-22 20:34:34');
/*!40000 ALTER TABLE `faks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keps`
--

DROP TABLE IF EXISTS `keps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keps` (
  `nm_kep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angka` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nm_kep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keps`
--

LOCK TABLES `keps` WRITE;
/*!40000 ALTER TABLE `keps` DISABLE KEYS */;
INSERT INTO `keps` VALUES ('Cukup Penting',3,NULL,NULL),('Lebih Penting',5,NULL,NULL),('Mendekati Cukup Penting',2,NULL,NULL),('Mendekati Lebih Penting',4,NULL,NULL),('Mendekati Mutlak Lebih Penting',8,NULL,NULL),('Mendekati Sangat Lebih Penting',6,NULL,NULL),('Mutlak Lebih Penting',9,NULL,NULL),('Sama Penting',1,NULL,NULL),('Sangat Lebih Penting',7,NULL,NULL);
/*!40000 ALTER TABLE `keps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kets`
--

DROP TABLE IF EXISTS `kets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kets` (
  `k1` bigint(20) unsigned NOT NULL,
  `k2` bigint(20) unsigned NOT NULL,
  `kep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `kets_k1_foreign` (`k1`),
  KEY `kets_k2_foreign` (`k2`),
  KEY `kets_kep_foreign` (`kep`),
  CONSTRAINT `kets_k1_foreign` FOREIGN KEY (`k1`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  CONSTRAINT `kets_k2_foreign` FOREIGN KEY (`k2`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  CONSTRAINT `kets_kep_foreign` FOREIGN KEY (`kep`) REFERENCES `keps` (`nm_kep`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kets`
--

LOCK TABLES `kets` WRITE;
/*!40000 ALTER TABLE `kets` DISABLE KEYS */;
INSERT INTO `kets` VALUES (17,18,'Mendekati Cukup Penting'),(17,19,'Cukup Penting'),(17,20,'Mendekati Lebih Penting'),(17,21,'Lebih Penting'),(17,22,'Mendekati Sangat Lebih Penting'),(18,19,'Mendekati Cukup Penting'),(18,20,'Cukup Penting'),(18,21,'Mendekati Lebih Penting'),(18,22,'Lebih Penting'),(19,20,'Cukup Penting'),(19,21,'Cukup Penting'),(19,22,'Lebih Penting'),(20,21,'Mendekati Cukup Penting'),(20,22,'Mendekati Cukup Penting'),(21,22,'Mendekati Cukup Penting');
/*!40000 ALTER TABLE `kets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kris`
--

DROP TABLE IF EXISTS `kris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kris` (
  `id_kri` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kri`),
  KEY `kris_fac_foreign` (`fac`),
  CONSTRAINT `kris_fac_foreign` FOREIGN KEY (`fac`) REFERENCES `facs` (`id_fac`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kris`
--

LOCK TABLES `kris` WRITE;
/*!40000 ALTER TABLE `kris` DISABLE KEYS */;
INSERT INTO `kris` VALUES (17,'Jumlah IPK',1,'2020-07-28 05:27:01','2020-07-28 05:28:41'),(18,'Tingkat Prestasi',1,'2020-07-28 05:27:46','2020-07-28 05:27:46'),(19,'Surat Keterangan Tidak Mampu',1,'2020-07-28 05:29:12','2020-07-28 05:29:12'),(20,'Surat Keterangan Aktif Organisasi (Intra Kampus)',2,'2020-07-28 05:31:40','2020-07-28 05:31:48'),(21,'Pekerjaan Orang Tua',2,'2020-07-28 05:34:24','2020-08-08 01:01:44'),(22,'Wawancara',2,'2020-08-02 21:53:16','2020-08-02 21:53:16');
/*!40000 ALTER TABLE `kris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahs`
--

DROP TABLE IF EXISTS `mahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahs` (
  `id_mah` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_mah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro` bigint(20) unsigned NOT NULL,
  `per` bigint(20) unsigned NOT NULL,
  `jk_mah` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mah`),
  KEY `mahs_pro_foreign` (`pro`),
  KEY `mahs_per_foreign` (`per`),
  CONSTRAINT `mahs_per_foreign` FOREIGN KEY (`per`) REFERENCES `pers` (`id_per`) ON DELETE CASCADE,
  CONSTRAINT `mahs_pro_foreign` FOREIGN KEY (`pro`) REFERENCES `pros` (`id_pro`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahs`
--

LOCK TABLES `mahs` WRITE;
/*!40000 ALTER TABLE `mahs` DISABLE KEYS */;
INSERT INTO `mahs` VALUES (38,'1412160009','Daniel Reredo',1,6,'Laki-laki','2020-07-25 23:41:10','2020-08-15 20:48:47'),(41,'1412160030','Budi Nur Hasan',1,6,'Laki-laki','2020-08-03 00:43:42','2020-08-15 20:49:14'),(42,'1412160020','Yayang Heldi Julian',1,6,'Laki-laki','2020-08-15 20:49:40','2020-08-15 20:49:40');
/*!40000 ALTER TABLE `mahs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (50,'2014_10_12_000000_create_users_table',1),(51,'2019_08_19_000000_create_failed_jobs_table',1),(52,'2020_07_16_144620_create_table_faks',1),(53,'2020_07_17_121722_create_pros_table',1),(54,'2020_07_19_081036_create_facs_table',1),(55,'2020_07_19_081128_create_kris_table',1),(56,'2020_07_20_232755_create_opes_table',2),(57,'2020_07_24_031720_create_pers_table',3),(59,'2020_07_24_085646_create_mahs_table',4),(60,'2020_07_26_062320_create_skor_kris_table',5),(72,'2020_08_03_035047_create_keps_table',6),(73,'2020_08_03_035338_create_kets_table',6),(75,'2020_08_08_065021_add_persen_on_facs_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opes`
--

DROP TABLE IF EXISTS `opes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opes` (
  `id_ope` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_ope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_ope` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro` bigint(20) unsigned NOT NULL,
  `user` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ope`),
  KEY `opes_pro_foreign` (`pro`),
  KEY `opes_user_foreign` (`user`),
  CONSTRAINT `opes_pro_foreign` FOREIGN KEY (`pro`) REFERENCES `pros` (`id_pro`) ON DELETE CASCADE,
  CONSTRAINT `opes_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opes`
--

LOCK TABLES `opes` WRITE;
/*!40000 ALTER TABLE `opes` DISABLE KEYS */;
INSERT INTO `opes` VALUES (6,'Andik Adi Suryanto S.kom M.kom','14121600009','Laki-laki',1,17,'2020-07-23 08:34:57','2020-08-22 03:24:08');
/*!40000 ALTER TABLE `opes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pers`
--

DROP TABLE IF EXISTS `pers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pers` (
  `id_per` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `per` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pers`
--

LOCK TABLES `pers` WRITE;
/*!40000 ALTER TABLE `pers` DISABLE KEYS */;
INSERT INTO `pers` VALUES (6,2018,'2020-07-24 07:43:18','2020-08-22 03:21:18');
/*!40000 ALTER TABLE `pers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pros`
--

DROP TABLE IF EXISTS `pros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pros` (
  `id_pro` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nm_pro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fak` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `pros_fak_foreign` (`fak`),
  CONSTRAINT `pros_fak_foreign` FOREIGN KEY (`fak`) REFERENCES `faks` (`id_fak`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pros`
--

LOCK TABLES `pros` WRITE;
/*!40000 ALTER TABLE `pros` DISABLE KEYS */;
INSERT INTO `pros` VALUES (1,'INFORMATIKA',1,'2020-07-20 18:04:58','2020-08-15 21:44:44'),(2,'INDUSTRI',1,'2020-07-22 22:47:29','2020-07-22 22:47:29');
/*!40000 ALTER TABLE `pros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skor_kris`
--

DROP TABLE IF EXISTS `skor_kris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skor_kris` (
  `id_skor_kri` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kri` bigint(20) unsigned NOT NULL,
  `mah` bigint(20) unsigned NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_skor_kri`),
  KEY `skor_kris_kri_foreign` (`kri`),
  KEY `skor_kris_mah_foreign` (`mah`),
  CONSTRAINT `skor_kris_kri_foreign` FOREIGN KEY (`kri`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  CONSTRAINT `skor_kris_mah_foreign` FOREIGN KEY (`mah`) REFERENCES `mahs` (`id_mah`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skor_kris`
--

LOCK TABLES `skor_kris` WRITE;
/*!40000 ALTER TABLE `skor_kris` DISABLE KEYS */;
INSERT INTO `skor_kris` VALUES (32,17,38,80,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(33,18,38,20,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(34,19,38,100,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(35,20,38,100,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(36,21,38,30,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(37,22,38,70,'2020-08-07 21:20:54','2020-08-15 20:50:33'),(38,17,41,60,'2020-08-07 21:20:54','2020-08-15 20:52:10'),(39,18,41,60,'2020-08-07 21:20:54','2020-08-15 20:52:10'),(40,19,41,100,'2020-08-07 21:20:54','2020-08-15 20:52:11'),(41,20,41,40,'2020-08-07 21:20:54','2020-08-15 20:52:11'),(42,21,41,45,'2020-08-07 21:20:55','2020-08-15 20:52:11'),(43,22,41,80,'2020-08-07 21:20:55','2020-08-15 20:52:11'),(50,17,42,80,'2020-08-15 20:49:40','2020-08-15 20:51:35'),(51,18,42,80,'2020-08-15 20:49:40','2020-08-15 20:51:35'),(52,19,42,80,'2020-08-15 20:49:40','2020-08-15 20:51:35'),(53,20,42,60,'2020-08-15 20:49:40','2020-08-15 20:51:35'),(54,21,42,30,'2020-08-15 20:49:40','2020-08-15 20:51:35'),(55,22,42,70,'2020-08-15 20:49:41','2020-08-15 20:51:35');
/*!40000 ALTER TABLE `skor_kris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','Daniel Reredo','admin',NULL,'$2y$10$1rnOBgwUXK1KSQG0pnuDiOOWz.atAb89J0B2U/hMOcZ560FktWvsW',NULL,'2020-07-19 21:52:21','2020-08-01 00:08:13'),(17,'operator','Andik Adi Suryanto S.kom M.kom','14121600009',NULL,'$2y$10$yLn6bwloitpBDdx19GQFb.LlS4BmvSWarrqCYmOSP1ZFlOImZNfM.',NULL,'2020-07-23 08:34:57','2020-08-22 03:24:08');
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

-- Dump completed on 2020-08-27 23:14:58
