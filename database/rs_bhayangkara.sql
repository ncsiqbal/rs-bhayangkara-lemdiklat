-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: rs_bhayangkara
-- ------------------------------------------------------
-- Server version	8.4.3

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
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `specialization` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'dr. Ahmad Fauzan, Sp.PD','Spesialis Penyakit Dalam','doctor-default.jpg','Dokter spesialis penyakit dalam.',1,NULL,NULL),(2,'dr. Rina Maharani, Sp.A','Spesialis Anak','doctor-default.jpg','Dokter spesialis anak.',1,NULL,NULL),(3,'dr. Budi Santoso, Sp.B','Spesialis Bedah','doctor-default.jpg','Dokter spesialis bedah.',1,NULL,NULL),(4,'dr. Nadia Putri, Sp.OG','Spesialis Obstetri & Ginekologi','doctor-default.jpg','Dokter spesialis obstetri dan ginekologi.',1,NULL,NULL),(5,'dr. Andi Wijaya, Sp.THT','Spesialis THT','doctor-default.jpg','Dokter spesialis telinga, hidung, dan tenggorokan.',1,NULL,NULL),(7,'drg. Siti Rahma','Dokter Gigi','doctor-default.jpg','Dokter gigi',1,'2026-08-31 23:11:38','2026-08-31 23:11:38');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polyclinics`
--

DROP TABLE IF EXISTS `polyclinics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `polyclinics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `icon` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polyclinics`
--

LOCK TABLES `polyclinics` WRITE;
/*!40000 ALTER TABLE `polyclinics` DISABLE KEYS */;
INSERT INTO `polyclinics` VALUES (2,'Poli Penyakit Dalam','Pelayanan diagnosis dan penanganan berbagai penyakit pada organ dalam.','fa-solid fa-heart-pulse',1,NULL,NULL),(3,'Poli Anak','Pelayanan kesehatan dan tumbuh kembang anak.','fa-solid fa-child',1,NULL,NULL),(4,'Poli Bedah','Pelayanan konsultasi dan tindakan bedah sesuai indikasi medis.','fa-solid fa-user-doctor',1,NULL,NULL),(5,'Poli Gigi','Pelayanan pemeriksaan dan perawatan kesehatan gigi dan mulut.','fa-solid fa-tooth',1,NULL,NULL);
/*!40000 ALTER TABLE `polyclinics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor_schedules`
--

DROP TABLE IF EXISTS `doctor_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_schedules` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int unsigned NOT NULL,
  `polyclinic_id` int unsigned NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_schedules_doctor_id_foreign` (`doctor_id`),
  KEY `doctor_schedules_polyclinic_id_foreign` (`polyclinic_id`),
  CONSTRAINT `doctor_schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `doctor_schedules_polyclinic_id_foreign` FOREIGN KEY (`polyclinic_id`) REFERENCES `polyclinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_schedules`
--

LOCK TABLES `doctor_schedules` WRITE;
/*!40000 ALTER TABLE `doctor_schedules` DISABLE KEYS */;
INSERT INTO `doctor_schedules` VALUES (1,1,2,'Senin','08:00:00','12:00:00',1,NULL,NULL),(2,1,2,'Rabu','08:00:00','12:00:00',1,NULL,NULL),(3,2,3,'Senin','09:00:00','13:00:00',1,NULL,NULL),(4,2,3,'Kamis','09:00:00','13:00:00',1,NULL,NULL),(5,3,4,'Selasa','10:00:00','14:00:00',1,NULL,NULL),(6,3,4,'Jumat','10:00:00','14:00:00',1,NULL,NULL),(13,1,2,'Jumat','12:30:00','15:00:00',1,'2026-08-31 23:28:10','2026-08-31 23:28:10');
/*!40000 ALTER TABLE `doctor_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Kegiatan Pelayanan Kesehatan','Dokumentasi kegiatan pelayanan kesehatan rumah sakit.','gallery-1.jpg','2026-08-01',1,NULL,NULL),(2,'Edukasi Kesehatan','Kegiatan edukasi dan sosialisasi kesehatan.','gallery-2.jpg','2026-08-08',1,NULL,NULL),(3,'Bakti Sosial','Kegiatan pelayanan kesehatan kepada masyarakat.','gallery-3.jpg','2026-08-15',1,NULL,NULL),(4,'Kegiatan Rumah Sakit','Dokumentasi kegiatan internal rumah sakit.','gallery-4.jpg','2026-08-20',1,NULL,NULL),(5,'Pemeriksaan Kesehatan','Kegiatan pemeriksaan kesehatan masyarakat.','gallery-5.jpg','2026-08-25',1,NULL,NULL),(6,'Pelayanan Kesehatan Masyarakat','Dokumentasi pelayanan kesehatan.','gallery-6.jpg','2026-08-28',1,NULL,NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-02 13:47:13
