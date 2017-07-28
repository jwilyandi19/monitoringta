-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: monitoringta
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `asistensi`
--

DROP TABLE IF EXISTS `asistensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistensi` (
  `id_asistensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_ta` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `materi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistensi`),
  KEY `id_ta` (`id_ta`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistensi`
--

LOCK TABLES `asistensi` WRITE;
/*!40000 ALTER TABLE `asistensi` DISABLE KEYS */;
INSERT INTO `asistensi` VALUES (1,1,2,'2017-07-20','Paradigma Reactive Programming','2017-07-20 02:13:56','2017-07-20 02:13:56'),(2,1,1,'2017-07-13','Mobile Programming','2017-07-20 02:17:28','2017-07-20 02:17:28'),(3,1,1,'2017-07-23','Buku TA bab 3','2017-07-21 00:12:07','2017-07-21 00:12:07'),(4,3,7,'2017-07-21','Judul','2017-07-21 06:49:48','2017-07-21 06:49:48'),(5,3,23,'2017-07-22','Abstrak','2017-07-21 07:06:26','2017-07-21 07:06:26');
/*!40000 ALTER TABLE `asistensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `judul_berita` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_berita` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,7,'Coba Buat','<p>Tambah aja</p>','2017-07-27 08:50:30','2017-07-27 08:50:30');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidang_mk`
--

DROP TABLE IF EXISTS `bidang_mk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bidang_mk` (
  `id_bidang_mk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_bidang_mk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang_mk`
--

LOCK TABLES `bidang_mk` WRITE;
/*!40000 ALTER TABLE `bidang_mk` DISABLE KEYS */;
INSERT INTO `bidang_mk` VALUES (1,'Material Inovatif'),(2,'Metalurgi Manufaktur'),(3,'Korosi dan Kegagalan');
/*!40000 ALTER TABLE `bidang_mk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembimbing1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,4,'5110100001','RIZKY JANUAR AKBAR','RIZKY JANUAR AKBAR, S.Kom., M.Eng.',1),(2,5,'5110100002','WIJAYANTI NURUL K.','WIJAYANTI NURUL K.,S.Kom., M.Sc.',1),(3,6,'5110100003','DOSEN 3','DOSEN 3 S.KOM',NULL),(4,411,'196203261987011001','Sulistijono','Prof. Dr. Ir. Sulistijono, DEA',1),(5,412,'195709241986031002','Moh. Farid','Ir. Moh. Farid, DEA',1),(6,413,'195809101986031002','Rochman Rochiem','Ir. Rochman Rochiem, M.Sc.',1),(7,417,'197605282002121003','Agung Purniawan','Dr. Agung Purniawan, S.T., M.Eng.',1),(8,418,'197604102002121002','Budi Agung Kurniawan','Budi Agung Kurniawan, S.T., M.Sc.',1),(9,414,'196809302000031001','Sungging Pintowantoro','Dr. Sungging Pintowantoro, S.T., M.T.',1),(10,415,'197701162003122007','Diah Susanti','Dr. Diah Susanti, S.T., M.T.',1),(11,416,'197801132002121003','Sigit Tri Wicasono','Dr. Sigit Tri Wicasono, S.Si., M.Si.',1),(12,419,'197703132003121001','Lukman Neorochiem','Dr. Lukman Neorochiem, S.T., M.Sc.Eng.',1),(13,420,'197610272003121001','Mas Irfan P. Hidayat','Mas Irfan P. Hidayat, S.T., M.Sc., Ph.D.',1),(14,421,'197708172005011004','Sutarsis','Sutarsis, S.T., M.Sc.',1),(15,422,'197907242005012003','Yuli Setiyorini','Yuli Setiyorini, S.T., M.Phil.',1),(16,423,'198012072005011004','Hosta Ardhyananta','Dr. Eng. Hosta Ardhyananta, S.T., M.Sc.',1),(17,424,'197410172006042001','Hariyati Purwaningsih','Hariyati Purwaningsih, S.Si., M.Si.',1),(18,425,'198302012008122002','Widyastuti','Dr. Widyastuti, S.Si., M.Si.',1),(19,426,'198302012008122002','Rindang Fajarin','Rindang Fajarin, S.Si., M.Si.',1),(20,427,'198205262012121002','Tubagus Noor R.','Tubagus Noor R., S.T., M.Sc.',1),(21,428,'198303252014042003','Wikan Jatimurti','Wikan Jatimurti, S.T., M.Sc.',NULL),(22,429,'198405152014042003','Dian Mughni F.','Dian Mughni F., S.T., M.Sc.',NULL),(23,430,'199007262015041002','Haniffudin Nurdiansah','Haniffudin Nurdiansah, S.T., M.T.',NULL),(24,431,'199102172015041002','Fakhreza Abdul','Fakhreza Abdul, S.T., M.T.',NULL),(25,432,'199106092015041001','Alvian Toto Wibisono','Alvian Toto Wibisono, S.T., M.T.',NULL),(26,433,'dosen01','Amaliya Rasyida','Amaliya Rasyida, S.T., M.Sc.',NULL),(27,434,'dosen02','Vania Mitha Pratiwi','Vania Mitha Pratiwi, S.T., M.T.',NULL);
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen_pembimbing`
--

DROP TABLE IF EXISTS `dosen_pembimbing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen_pembimbing` (
  `id_dosen_pembimbing` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `peran` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dosen_pembimbing`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_ta` (`id_ta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen_pembimbing`
--

LOCK TABLES `dosen_pembimbing` WRITE;
/*!40000 ALTER TABLE `dosen_pembimbing` DISABLE KEYS */;
INSERT INTO `dosen_pembimbing` VALUES (2,1,1,2,1,'2017-07-20 02:14:56','2017-07-20 02:16:57'),(3,1,2,1,1,'2017-07-20 02:22:59','2017-07-20 02:22:59'),(4,7,3,1,1,'2017-07-21 06:41:50','2017-07-21 06:48:46'),(5,23,3,2,1,'2017-07-21 06:41:50','2017-07-21 07:05:59'),(6,2,2,2,1,'2017-07-25 01:58:41','2017-07-25 01:59:21'),(9,7,5,1,1,'2017-07-26 01:51:17','2017-07-26 01:57:59'),(10,16,5,2,0,'2017-07-26 01:51:17','2017-07-26 01:51:17'),(11,16,6,1,0,'2017-07-27 01:30:50','2017-07-27 01:30:50'),(12,7,6,2,1,'2017-07-27 01:30:50','2017-07-28 01:32:33');
/*!40000 ALTER TABLE `dosen_pembimbing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (1,'Awal Semester','2017-02-08 00:00:00'),(2,'Buka Ketersediaan Seminar','2017-07-25 23:59:00'),(3,'Tutup Ketersediaan Seminar','2017-07-26 00:00:01'),(4,'Buka Pengajuan Jadwal Seminar','2017-07-30 23:59:00'),(5,'Tutup Pengajuan Jadwal Seminar','2017-07-25 00:01:00'),(6,'Buka Ketersediaan Ujian','2017-07-27 13:10:28'),(7,'Tutup Ketersediaan Ujian','2017-07-27 13:13:51'),(8,'Buka Pengajuan Jadwal Ujian','2017-07-27 13:14:34'),(9,'Tutup Pengajuan Jadwal Ujian','2017-07-27 13:14:50');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_seminar`
--

DROP TABLE IF EXISTS `jadwal_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_seminar` (
  `id_js` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_js`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_seminar`
--

LOCK TABLES `jadwal_seminar` WRITE;
/*!40000 ALTER TABLE `jadwal_seminar` DISABLE KEYS */;
INSERT INTO `jadwal_seminar` VALUES (11,'2017-07-31',1,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(12,'2017-07-31',2,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(13,'2017-07-31',3,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(14,'2017-07-30',1,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(15,'2017-07-30',2,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(16,'2017-07-30',3,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(17,'2017-07-29',1,'2017-07-20 18:30:28','2017-07-20 18:30:28'),(18,'2017-07-29',2,'2017-07-20 18:30:29','2017-07-20 18:30:29'),(19,'2017-07-29',3,'2017-07-20 18:30:29','2017-07-20 18:30:29'),(20,'2017-08-01',1,'2017-07-21 02:59:37','2017-07-21 02:59:37'),(21,'2017-08-01',2,'2017-07-21 02:59:37','2017-07-21 02:59:37'),(22,'2017-08-01',3,'2017-07-21 02:59:37','2017-07-21 02:59:37'),(23,'2017-08-02',1,'2017-07-21 02:59:45','2017-07-21 02:59:45'),(24,'2017-08-02',2,'2017-07-21 02:59:45','2017-07-21 02:59:45'),(25,'2017-08-02',3,'2017-07-21 02:59:46','2017-07-21 02:59:46'),(26,'2017-08-05',1,'2017-07-21 07:11:24','2017-07-21 07:11:24'),(27,'2017-08-05',2,'2017-07-21 07:11:24','2017-07-21 07:11:24'),(28,'2017-08-05',3,'2017-07-21 07:11:24','2017-07-21 07:11:24');
/*!40000 ALTER TABLE `jadwal_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_ujian`
--

DROP TABLE IF EXISTS `jadwal_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_ujian` (
  `id_ju` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ju`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ujian`
--

LOCK TABLES `jadwal_ujian` WRITE;
/*!40000 ALTER TABLE `jadwal_ujian` DISABLE KEYS */;
INSERT INTO `jadwal_ujian` VALUES (4,'2017-07-22',1,'2017-07-21 02:47:15','2017-07-21 02:47:15'),(5,'2017-07-22',2,'2017-07-21 02:47:15','2017-07-21 02:47:15'),(6,'2017-07-22',3,'2017-07-21 02:47:15','2017-07-21 02:47:15'),(7,'2017-07-26',1,'2017-07-21 02:53:12','2017-07-21 02:53:12'),(8,'2017-07-26',2,'2017-07-21 02:53:12','2017-07-21 02:53:12'),(9,'2017-07-26',3,'2017-07-21 02:53:12','2017-07-21 02:53:12'),(13,'2017-07-27',1,'2017-07-21 02:57:20','2017-07-21 02:57:20'),(14,'2017-07-27',2,'2017-07-21 02:57:20','2017-07-21 02:57:20'),(15,'2017-07-27',3,'2017-07-21 02:57:20','2017-07-21 02:57:20'),(16,'2017-07-28',1,'2017-07-21 02:57:33','2017-07-21 02:57:33'),(17,'2017-07-28',2,'2017-07-21 02:57:33','2017-07-21 02:57:33'),(18,'2017-07-28',3,'2017-07-21 02:57:33','2017-07-21 02:57:33'),(19,'2017-07-29',1,'2017-07-21 02:58:29','2017-07-21 02:58:29'),(20,'2017-07-29',2,'2017-07-21 02:58:29','2017-07-21 02:58:29'),(21,'2017-07-29',3,'2017-07-21 02:58:29','2017-07-21 02:58:29'),(22,'2017-07-30',1,'2017-07-21 02:58:34','2017-07-21 02:58:34'),(23,'2017-07-30',2,'2017-07-21 02:58:34','2017-07-21 02:58:34'),(24,'2017-07-30',3,'2017-07-21 02:58:34','2017-07-21 02:58:34'),(25,'2017-08-16',1,'2017-07-27 06:06:31','2017-07-27 06:06:31'),(26,'2017-08-16',2,'2017-07-27 06:06:31','2017-07-27 06:06:31'),(27,'2017-08-16',3,'2017-07-27 06:06:31','2017-07-27 06:06:31');
/*!40000 ALTER TABLE `jadwal_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketersediaan_seminar`
--

DROP TABLE IF EXISTS `ketersediaan_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketersediaan_seminar` (
  `id_ks` int(11) NOT NULL AUTO_INCREMENT,
  `id_js` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ks`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_js` (`id_js`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketersediaan_seminar`
--

LOCK TABLES `ketersediaan_seminar` WRITE;
/*!40000 ALTER TABLE `ketersediaan_seminar` DISABLE KEYS */;
INSERT INTO `ketersediaan_seminar` VALUES (1,14,2,'2017-07-21 02:29:18','2017-07-21 02:29:18'),(3,19,2,'2017-07-21 02:29:23','2017-07-21 02:29:23'),(4,11,2,'2017-07-21 02:29:28','2017-07-21 02:29:28'),(5,12,2,'2017-07-21 02:29:29','2017-07-21 02:29:29'),(6,14,1,'2017-07-21 02:29:42','2017-07-21 02:29:42'),(7,15,1,'2017-07-21 02:32:26','2017-07-21 02:32:26'),(8,15,2,'2017-07-21 03:07:40','2017-07-21 03:07:40'),(10,17,23,'2017-07-21 07:14:02','2017-07-21 07:14:02'),(11,14,23,'2017-07-21 07:14:22','2017-07-21 07:14:22'),(12,15,23,'2017-07-21 07:14:23','2017-07-21 07:14:23'),(14,12,23,'2017-07-21 07:14:25','2017-07-21 07:14:25'),(15,26,23,'2017-07-21 07:14:26','2017-07-21 07:14:26'),(16,14,7,'2017-07-27 00:24:36','2017-07-27 00:24:36'),(17,15,7,'2017-07-27 00:24:38','2017-07-27 00:24:38'),(18,12,7,'2017-07-27 00:24:40','2017-07-27 00:24:40'),(19,11,7,'2017-07-27 00:24:40','2017-07-27 00:24:40'),(20,13,7,'2017-07-27 00:24:41','2017-07-27 00:24:41');
/*!40000 ALTER TABLE `ketersediaan_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketersediaan_ujian`
--

DROP TABLE IF EXISTS `ketersediaan_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketersediaan_ujian` (
  `id_ku` int(11) NOT NULL AUTO_INCREMENT,
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ku`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_ju` (`id_ju`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketersediaan_ujian`
--

LOCK TABLES `ketersediaan_ujian` WRITE;
/*!40000 ALTER TABLE `ketersediaan_ujian` DISABLE KEYS */;
INSERT INTO `ketersediaan_ujian` VALUES (1,1,1,'2017-07-21 02:45:20','2017-07-21 02:45:20'),(2,13,2,'2017-07-21 03:00:08','2017-07-21 03:00:08'),(3,19,2,'2017-07-21 03:00:10','2017-07-21 03:00:10'),(4,17,2,'2017-07-21 03:00:10','2017-07-21 03:00:10'),(5,20,2,'2017-07-21 03:00:12','2017-07-21 03:00:12'),(6,16,1,'2017-07-25 06:39:57','2017-07-25 06:39:57'),(7,18,1,'2017-07-25 06:39:59','2017-07-25 06:39:59'),(8,17,1,'2017-07-25 06:40:00','2017-07-25 06:40:00'),(9,19,1,'2017-07-25 06:40:00','2017-07-25 06:40:00'),(10,20,1,'2017-07-25 06:40:01','2017-07-25 06:40:01'),(11,13,1,'2017-07-25 06:40:02','2017-07-25 06:40:02'),(12,14,1,'2017-07-25 06:40:03','2017-07-25 06:40:03'),(13,19,7,'2017-07-27 03:25:32','2017-07-27 03:25:32'),(14,20,7,'2017-07-27 03:25:34','2017-07-27 03:25:34'),(15,16,7,'2017-07-27 03:25:36','2017-07-27 03:25:36'),(16,17,7,'2017-07-27 03:25:39','2017-07-27 03:25:39'),(17,21,7,'2017-07-27 03:25:41','2017-07-27 03:25:41');
/*!40000 ALTER TABLE `ketersediaan_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penguji_seminar`
--

DROP TABLE IF EXISTS `penguji_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penguji_seminar` (
  `id_penguji_s` int(11) NOT NULL AUTO_INCREMENT,
  `id_seminar_ta` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_js` int(11) DEFAULT NULL,
  `peran` int(11) DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penguji_s`),
  KEY `id_seminar_ta` (`id_seminar_ta`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penguji_seminar`
--

LOCK TABLES `penguji_seminar` WRITE;
/*!40000 ALTER TABLE `penguji_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `penguji_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penguji_ujian`
--

DROP TABLE IF EXISTS `penguji_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penguji_ujian` (
  `id_penguji_u` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian_ta` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penguji_u`),
  KEY `id_ujian_ta` (`id_ujian_ta`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penguji_ujian`
--

LOCK TABLES `penguji_ujian` WRITE;
/*!40000 ALTER TABLE `penguji_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `penguji_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rmk_dosen`
--

DROP TABLE IF EXISTS `rmk_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rmk_dosen` (
  `id_rmk_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) DEFAULT NULL,
  `id_rumpun_mk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rmk_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rmk_dosen`
--

LOCK TABLES `rmk_dosen` WRITE;
/*!40000 ALTER TABLE `rmk_dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `rmk_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rumpun_mk`
--

DROP TABLE IF EXISTS `rumpun_mk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rumpun_mk` (
  `id_rumpun_mk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rumpun` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_rumpun_mk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rumpun_mk`
--

LOCK TABLES `rumpun_mk` WRITE;
/*!40000 ALTER TABLE `rumpun_mk` DISABLE KEYS */;
INSERT INTO `rumpun_mk` VALUES (1,'Pengelasan');
/*!40000 ALTER TABLE `rumpun_mk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar_final`
--

DROP TABLE IF EXISTS `seminar_final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar_final` (
  `id_jadwal` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  KEY `id_dosen_uji` (`id_dosen_uji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_final`
--

LOCK TABLES `seminar_final` WRITE;
/*!40000 ALTER TABLE `seminar_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar_final` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar_ta`
--

DROP TABLE IF EXISTS `seminar_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar_ta` (
  `id_seminar_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_ta` int(11) DEFAULT NULL,
  `id_js` int(11) DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL,
  `id_penguji4` int(11) DEFAULT NULL,
  `id_penguji5` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_seminar_ta`),
  KEY `id_ps` (`id_ta`),
  KEY `id_js` (`id_js`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_ta`
--

LOCK TABLES `seminar_ta` WRITE;
/*!40000 ALTER TABLE `seminar_ta` DISABLE KEYS */;
INSERT INTO `seminar_ta` VALUES (1,3,NULL,NULL,NULL,NULL,NULL,NULL,2,'A',NULL,'Sempurna','2017-07-21 06:51:07','2017-07-21 06:51:07'),(4,1,14,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2017-07-25 03:02:39','2017-07-27 05:55:54'),(7,2,14,1,2,7,23,NULL,1,NULL,NULL,NULL,'2017-07-25 03:17:44','2017-07-27 07:36:00');
/*!40000 ALTER TABLE `seminar_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_ta`
--

DROP TABLE IF EXISTS `status_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_ta` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_ta`
--

LOCK TABLES `status_ta` WRITE;
/*!40000 ALTER TABLE `status_ta` DISABLE KEYS */;
INSERT INTO `status_ta` VALUES (-2,'Batal'),(-1,'Ditolak'),(0,'Mengajukan Judul'),(1,'Menunggu Seminar'),(2,'Revisi'),(3,'OK'),(5,'Maju Sidang'),(6,'Lulus'),(7,'Tidak Lulus');
/*!40000 ALTER TABLE `status_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tugas_akhir`
--

DROP TABLE IF EXISTS `tugas_akhir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tugas_akhir` (
  `id_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_dosbing1` int(11) DEFAULT NULL,
  `id_dosbing2` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_bidang_mk` int(11) DEFAULT NULL,
  `id_rumpun_mk` int(11) DEFAULT NULL,
  `judul` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  KEY `nrp` (`id_user`),
  KEY `id_dosbing1` (`id_dosbing1`),
  KEY `id_dosbing2` (`id_dosbing2`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_akhir`
--

LOCK TABLES `tugas_akhir` WRITE;
/*!40000 ALTER TABLE `tugas_akhir` DISABLE KEYS */;
INSERT INTO `tugas_akhir` VALUES (1,3,2,1,1,1,1,'Rancang Bangun Aplikasi e-Learning Berbasis Perangkat Bergerak Android pada Fitur Manajemen Quiz dan Tanya Jawab Menggunakan Paradigma Reactive Programming',1,'2017-07-20 02:02:38','2017-07-27 04:32:53'),(2,8,1,2,5,1,1,'Rancang Bangun Simulasi Tertib Lalu Lintas Sesuai Dengan Peraturan Pemerintah Nomor 79 Tahun 2013 Menggunakan Steering Wheel dan Oculus Rift',NULL,'2017-07-20 02:22:59','2017-07-27 03:23:41'),(3,443,7,23,0,1,1,'Tugas Akhir',1,'2017-07-21 06:41:50','2017-07-21 07:05:59'),(5,442,7,NULL,0,NULL,1,'Implementasi MIR (Musik Information Retrieval) pada Modul Genre Recognition dan Deep Learning Classification untuk Aplikasi Musicmoo',NULL,'2017-07-26 01:51:17','2017-07-26 01:57:59'),(6,444,NULL,7,0,NULL,1,'Coba TA',NULL,'2017-07-27 01:30:50','2017-07-28 01:32:33');
/*!40000 ALTER TABLE `tugas_akhir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ujian_final`
--

DROP TABLE IF EXISTS `ujian_final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ujian_final` (
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  KEY `id_dosen_uji` (`id_dosen_uji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian_final`
--

LOCK TABLES `ujian_final` WRITE;
/*!40000 ALTER TABLE `ujian_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `ujian_final` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ujian_ta`
--

DROP TABLE IF EXISTS `ujian_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ujian_ta` (
  `id_ujian_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_ta` int(11) DEFAULT NULL,
  `id_ju` int(11) DEFAULT NULL,
  `id_penguji1` int(11) DEFAULT NULL,
  `nilai_penguji1` int(11) DEFAULT NULL,
  `id_penguji2` int(11) DEFAULT NULL,
  `nilai_penguji2` int(11) DEFAULT NULL,
  `id_penguji3` int(11) DEFAULT NULL,
  `nilai_penguji3` int(11) DEFAULT NULL,
  `id_penguji4` int(11) DEFAULT NULL,
  `nilai_penguji4` int(11) DEFAULT NULL,
  `id_penguji5` int(11) DEFAULT NULL,
  `nilai_penguji5` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ujian_ta`),
  KEY `id_pu` (`id_ta`),
  KEY `id_ju` (`id_ju`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian_ta`
--

LOCK TABLES `ujian_ta` WRITE;
/*!40000 ALTER TABLE `ujian_ta` DISABLE KEYS */;
INSERT INTO `ujian_ta` VALUES (6,1,19,2,NULL,1,NULL,7,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-07-25 06:52:53','2017-07-27 03:26:11'),(7,2,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2017-07-25 06:53:12','2017-07-27 04:41:29');
/*!40000 ALTER TABLE `ujian_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=534 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','$2y$10$cj0gfEEVI7AG0TO1tih4j.T0z9RxUwwg6i9mJvC.uW6gTdS5QkMwm',1,'Admin'),(3,'5114100109','$2y$10$l73YkuQpTcnbRiVwmyeNbuqTpmFgVKlS5bNtdjjXhlCAp8IEHAVLi',1,'Nafiar Rahmansyah'),(4,'5110100001','$2y$10$VcrpSk5qgk7rA73PQlououx7F8TgRy7YfHC4ME2pr0Xe9kBbzF6xC',2,'RIZKY JANUAR AKBAR'),(5,'5110100002','$2y$10$PbJJo0rzA2neQV.gKEFeguTQbn8IFwI/33QtcdzozzpMxH/A2lV6q',2,'WIJAYANTI NURUL K.'),(6,'5110100003','$2y$10$JNAEF7q43bO7GfRbx5C2JOM34utercBDs/WwTTlzMIyBCqC0RU66m',2,'dosen3'),(7,'admin1','$2y$10$vN6d6qcVvU6AkjZ2IRUAeOOjSR1Z/pGFzx2.JwXiSNfqAlF76wKhi',3,'nafiar'),(8,'5114100110','$2y$10$r90OX3LLyZdNIFMH7YUiEuk29xmRzvy.PmpxtBfacjApiKlPKqoTu',1,'Rafiar Rahmansyah'),(411,'196203261987011001','$2y$10$1qjThG1M7O.FXiFz7A/Bae/dom530n3kXvJrE2/fY/pSfkO7glLI6',2,'Prof. Dr. Ir. Sulistijono, DEA'),(412,'195709241986031002','$2y$10$YQIXDU9EaQNIc4oG2fRx3uwM0nqCwO8ytzNXstpuDio8T4BxbqCLm',2,'Ir. Moh. Farid, DEA'),(413,'195809101986031002','$2y$10$RiqRFbjwUItQmd19Bl6RT.cXNgaBalmJDumDeCD5DA.ZsjtGhvnQe',2,'Ir. Rochman Rochiem, MSc.'),(414,'196809302000031001','$2y$10$.WWweNURU3tltoZ4ouSz2uCS7UZqMC69FQrMpk5IwM//XxvVPr4GW',2,'Dr. Sungging Pintowantoro, S.T., M.T.'),(415,'197701162003122007','$2y$10$CcgcegHFX/AY4hF6RyZZMOAzJqn9LNcbjMgsz4fA09ZtDHVqSZIaq',2,'Dr. Diah Susanti, S.T., M.T.'),(416,'197801132002121003','$2y$10$OlmrJJyQadWssFWKJAuB1egsJd.jA3xfD.D6N.G.7YxGiumbcpR12',2,'Dr. Sigit Tri Wicasono, S.Si., M.Si.'),(417,'197605282002121003','$2y$10$qqejXLtkmlPf7v9WQDwxXeKHbsUY4MAtVsrZzo2IC09VHpS64nVA6',2,'Dr. Agung Purniawan, S.T., M.Eng.'),(418,'197604102002121002','$2y$10$.etHTI5xfsbqbyee9OEGgO6O1ZIxJjRjz6urQ9zY9MRu.LzpReew.',2,'Budi Agung Kurniawan, S.T., M.Sc.'),(419,'197703132003121001','$2y$10$BNl3oRD2xwhQ8/7oW85j6.5AWOTSOHKmkftAOrEi8Z61ZfeHV9HWi',2,'Dr. Lukman Neorochiem, S.T., M.Sc.Eng.'),(420,'197610272003121001','$2y$10$5.QJNb8HQO/oqBxK8R.5ZOCD8.WPLCz9.r/FOqauV5UeWYfn8MKe2',2,'Mas Irfan P. Hidayat, S.T., M.Sc., Ph.D.'),(421,'197708172005011004','$2y$10$oJg.f5mbm1WwXK8S80OnTuOvolrf.2uCzA/WhMsiOKyCJs4qobTdm',2,'Sutarsis, S.T., M.Sc.'),(422,'197907242005012003','$2y$10$nGwHmyHNIFkzLn1YodmtpO3ZHTkMWrESVspv7uztANJ79dAvKuH7W',2,'Yuli Setiyorini, S.T., M.Phil.'),(423,'198012072005011004','$2y$10$5YFH.Es0nkBpm/DN5hGVwers.iE2dIs9BeReeu7Yr0y.wALhsibMC',2,'Dr. Eng. Hosta Ardhyananta, S.T., M.Sc.'),(424,'197410172006042001','$2y$10$mkPswMi6tSHt0P08wX2qFOb0ZURoMPOZn9XYIxPfD1lKhzhTEYIoe',2,'Hariyati Purwaningsih, S.Si., M.Si.'),(425,'197906202006042001','$2y$10$/ZFm6OMImOIvu0xqs/Eyv..wB0yTvybxSRDspWg2Af/il/30qzeoe',2,'Dr. Widyastuti, S.Si., M.Si.'),(426,'198302012008122002','$2y$10$JhQqRgWCm.gsESWFdEdofebkI2RxoxFk9XIakbGDdxD4qdtmrU5Wa',2,'Rindang Fajarin, S.Si., M.Si.'),(427,'198205262012121002','$2y$10$1kKLCeh4AV1jJ4e.IWTuLOYhCwpbLXQ1Y.UFURpIPw9S4TT0Qgvxe',2,'Tubagus Noor R., S.T., M.Sc.'),(428,'198303252014042003','$2y$10$wPk3dsuA5piop/YVYCJ39eStCej4InvWywBjZGoTMxQ6kVDPuCZGG',2,'Wikan Jatimurti, S.T., M.Sc.'),(429,'198405152014042003','$2y$10$d9dDXQG5eCZChu3Z//wCh.AbRb4Zv2gl4Jluau2ejAh68SuWYr/vK',2,'Dian Mughni F., S.T., M.Sc.'),(430,'199007262015041002','$2y$10$pkai7BRcSHWF2MgSEsaGm.ZJ5jERevBWdPtzBIY2PCpSChfz5sFi6',2,'Haniffudin Nurdiansah, S.T., M.T.'),(431,'199102172015041002','$2y$10$j8VYBgUo55Npe69vcXcSL.qiY9GHGPByjGswwg/3VeaQjFGQr4C3m',2,'Fakhreza Abdul, S.T., M.T.'),(432,'199106092015041001','$2y$10$DlzXBt3GxmIzur3LdyrT8OTEzxBsAQQOQNer8cELfVnFycIQ.hvvS',2,'Alvian Toto Wibisono, S.T., M.T.'),(433,'dosen01','$2y$10$fX0dstwj35dWkEM/viiV1u8/5B0Upg317ofk1XZUvdFjuTg1lMEvm',2,'Amaliya Rasyida, S.T., M.Sc.'),(434,'dosen02','$2y$10$jR8RUWVcGeZsb05c05jWR.2CpZLQOx4fYkzEvoqXw07GDJr8UZIEq',2,'Vania Mitha Pratiwi, S.T., M.T.'),(435,'2710100022','$2y$10$9oT1IZVJQStVlPJ7w63EcOHQBIamfZTHy1RrEUqJ7.xoW.L9aNfSm',1,'MOHAMMAD KHABIBI ALBISTHOMI'),(436,'2710100046','$2y$10$x4NP1CWVnPFwrRYuY4DJNuq5akqNVfAvIht1meGKSxwj8Vr4p.GM.',1,'OLGA LEONEV VASDAZARA'),(437,'2711100108','$2y$10$82AawMnAC11kBIyuJNtM9.uEgeLX/Mvu9Jl4msW5VGPuXSoHGXZae',1,'GABRIEL FEBRUANDO'),(438,'2711100134','$2y$10$F0msMzXlIIgOIwjzsRgqEOF5PCNTPxYJAhQUj/T3RvHUhOO1rFIca',1,'DHARMA KIYAT PERKASA'),(439,'2712100048','$2y$10$P77A/1.BbOPAB6dRwL8VjOlXU7gPjPD0wpGKwuHjT2qy7pxrJaqy.',1,'ANGGA DEA SAPUTRA HIDAYAT'),(440,'2712100094','$2y$10$p3BjpqSyhYxZPUHgGA/t9OLC.xf.U/3zMgu3omi4CGsDSEKTA91jK',1,'DESI SAPANG'),(441,'2712100113','$2y$10$IG4PnyKSxO5AxyLGu.nhDu7nA7sQjaAX5AkNhJQ6ZvrbrqW0u2RZq',1,'MUHAMMAD YUSUF BAIHAQI'),(442,'2713100001','$2y$10$AhRCVzy5sQ39i4pmezWGNeLhKo.py4fjfUILrP9iYyH4DJgsAlPO2',1,'MOHAMMAD RIZKI FEBRIANTO'),(443,'2713100002','$2y$10$CttyKTBJbt38Q5FNRR4jF.X7XEODDs4B0lRk/FXNaj.GnWjsAP0Ry',1,'MUHAMMAD REZA'),(444,'2713100003','$2y$10$l44/ypw28fODpIa/fOyDo.rc/4MxEp4NC46xiX9bSOdmReEZvvZJe',1,'PUTU DITHA PRATAMA'),(445,'2713100004','$2y$10$EDpha7BKkEGd9JSM0Qi5zubrXs1BbbJhGXHn94Uc5F0URBHOTLBVq',1,'MUHAMMAD RIZAL PAMBUDI'),(446,'2713100005','$2y$10$ft/91ty8Gie1Rr/EUn1WJ.zjv3RzPiaoN0WKR5vPAnZKKbpBh.ncS',1,'MAHENDRA KRESNA PUTRA'),(447,'2713100008','$2y$10$10YcN96PjEp2OYo0tdi7SuvMuGPsy4QKu2dwb9Wos.WfHHxUeKJUK',1,'LUTFI IRFAN'),(448,'2713100012','$2y$10$w4gKGqZqYkyvnxkjtQQ01uXCEwDCmanEHrAB7G6r1svYQ/sdAU9yu',1,'NOVIA DIAJENG ARUMSARI'),(449,'2713100013','$2y$10$VvZADAR7BcLD/hZv5ok.zu6x3ZToPa51t1na.IPXFQI8nIQGQPAHa',1,'SITI ANNISAA BANI PURWANA'),(450,'2713100014','$2y$10$s0Sok//X1Ham9NixWh6I8e51iPhuHVDd7tubA.8OiYMssFfWS32N6',1,'INGGIL HANIDYA'),(451,'2713100017','$2y$10$sXNKrJOPV1DjXRVFC77VM.KqP1FlmHChtzSJCyoVNOZUs.tVwv7va',1,'ROMMEL. T'),(452,'2713100018','$2y$10$CWJS5Ayyn8f4YEecRGrQ.eRvK4c2DU0UnsKe6XgZsfw7KQowM.X7a',1,'IHSAN MAULA'),(453,'2713100020','$2y$10$034V7qNixwFjUGtGqaI46u.Ld9VmDDXB4K7heB2/dVt26jp3YOB8e',1,'MUHAMMAD TAUFIK AKBAR OFRIAL'),(454,'2713100024','$2y$10$aFMuhDgpkw28H8oNzBoXU.ji4tWrneevAMrDpW6cTTJKel0oGdgHi',1,'IGFAR CITA'),(455,'2713100027','$2y$10$O9VKj9MA9dQdtktD89Ks7.N5bxbhGMXPFOmI1LGvr0u8nZVAIqTBS',1,'HAMZAH SYAIFULLAH'),(456,'2713100028','$2y$10$s1bREDiHaac4rAEixxxuSOaiDV.yqig9z2nkMhDA7nYazQNlFN.MC',1,'NURUL LAILATUL MUZAYADAH'),(457,'2713100029','$2y$10$pmk0QGIIzsUDQ3g2fFfwG.jk862acwgjMcfyDhjHe.T6ndAotKz.2',1,'FADLI KURNIAWAN'),(458,'2713100030','$2y$10$SVBeuHrsYjDoN.bK3awHZ.oxDGi37o4ocGo1oAqt/Q0ugrwIA7WUy',1,'FIKRI ADHI NUGRAHA'),(459,'2713100031','$2y$10$Xs7is51RXZG5YffWj9jqZOmdq4S7VO/kdUgSpWIpSHxicGshQ4nK6',1,'ARDYA ADHITYAMEIDY ANDARU'),(460,'2713100034','$2y$10$cvi.L956NJmtXbH654zTkOAQhP9On7eohj4urs2iOqIw6lhDFp6Zq',1,'QORY MAGHFIROH'),(461,'2713100038','$2y$10$69j/ie.pT5M8/FvKHZT8NOsiP7pz0BR0N32wCD42iIZwcXgTtO43.',1,'RIDWAN BAGUS YUWANDONO'),(462,'2713100039','$2y$10$gopZCF0e87IU6qkNzNuH2OBHuTQVHib4HrMKwkn94csBPHutXuOs.',1,'ANDIKA PRATAMA'),(463,'2713100041','$2y$10$eMtXkjdj6xF9wqP1D28msOLHHF1GUSm6PeR0WRSx0cjs9fh.4aEWi',1,'FARID RIZAL'),(464,'2713100042','$2y$10$bOHy2IYXjc3wrWEgrgQHr.PDtvPsYmvvq7FTMi0QWjJvO8P2QWN9G',1,'RATNA HERMASTUTI'),(465,'2713100044','$2y$10$.EnYFyhgPcVpvaFlm7LOoOPsWPyRUkkygB6EegUQoRL8/oiORi9A2',1,'MEILATI PASCA MUNA'),(466,'2713100046','$2y$10$9qaGuBPCfDMexlCrN/cWZOpMbih31XPase99LGjGsJ1lQZ6HPeAqC',1,'DESHINTA IKASARI'),(467,'2713100047','$2y$10$T/u3nzP3K6YUjuWXUmTace3/MvX56ObQc7DNwEjLBCsXCt2KCE/hy',1,'FAJAR KURNIAWATI'),(468,'2713100048','$2y$10$vVkjp3Yyz/Ot.gow95AyEuo/70pfCVstFpl0.ivfb40ejhB8rwAxK',1,'DYAH AYU KUSUMA HAPSARI'),(469,'2713100050','$2y$10$9Vl2x1aRrgZZ4CXi2w2Ta.eZWqlDwDpeadnVRb/fbb9ld4uiE32e.',1,'AHMAD PROSCA H'),(470,'2713100052','$2y$10$NcgrRruKbEArDOj1iTEWgeb6.zxhIaQYb9P32AsuNFA9Ijsgkho7e',1,'PRADITYA HADI PRABOWO'),(471,'2713100054','$2y$10$WBHRUm1OyAGmVKfxP.hFcOn.D2g81Nm25akR9RVpqMbR6BA.HboXm',1,'ANGGUN NURHAYATI'),(472,'2713100055','$2y$10$XOLik4usrhDwcEtrJanade1qIwjgsYH0tB1Rc3rvWIQvXgo5ukvl.',1,'MOHAMMAD MIFTAH FADLIKA MAKMUR'),(473,'2713100057','$2y$10$A82MGGX.cgLSigLvzY2cAuXKoicIkhLDVNaEChSE1Lfkdp.oASPAa',1,'JONAS MARTUA TAMBUNAN'),(474,'2713100060','$2y$10$cjuTeQI/7Hubd/oMBOenSOuhrHzFZ69iIpGF4qT1fg7vVFfAxfjL2',1,'ADVEN F.N. HUTAJULU'),(475,'2713100063','$2y$10$MTlCQfKTlcpjf05WSlauwev/y8AyH2AO/J1UpSqfwzw/Yn4mPzxya',1,'RACHMADHANI DIAN PRATAMA'),(476,'2713100066','$2y$10$CDgZarDBFtav/b1b0B4TOeQaaRkOH6vZCVMUeK6/exQRKwanKHJIy',1,'ZULFA ILHAM BASYARAHIL'),(477,'2713100067','$2y$10$arXHbAYxSzt5c785UtT0KO7biltCuIl1vFF2axd4DkUnmGs94AjYa',1,'ANGGIAT RAMOS JUNIARTO'),(478,'2713100068','$2y$10$oQT3vDhDjUOcdS56eXztyeVdOLRhZ8J6vzzOnNa1LHiHZj/hCzLGC',1,'HAIRUL WASIK'),(479,'2713100069','$2y$10$og0eSM2RQpc4aCIVMRRd6uNitJgBN9mbP1dpCQpjzTsS8nBZoukSy',1,'AJI PAMBUDI'),(480,'2713100070','$2y$10$25LU5GH08NOn.juwOWmvzOpSAsOfvacnuQAljVU/rgRstzmfhAY/a',1,'MUHAMMAD ADITYA PRADANA'),(481,'2713100074','$2y$10$EGsfL9CoD71EuZvGBUxSNOXYw8w9zN1Q.eN5nY9uEvZbKsSSwnYIG',1,'ORLANDO BANJARNAHOR'),(482,'2713100075','$2y$10$ZdVGGpO7Va8VknfSUlIbEu3cDdXZiAdvjdNRd6mTPhsfR1Mll/deS',1,'RIFKI RACHMAN KHOLID'),(483,'2713100076','$2y$10$WF4tCsyDt9ITbTk0OuqEhO8D7bsuhTcE4dxiP7EJsRzeD0jRC9MAG',1,'MUSTAFID AMNA RAMBEY'),(484,'2713100078','$2y$10$7uyF.eX57NmuX0/NncD4qeO19vDqpb5QtBE.O531jQ7lsOjIq5WFe',1,'DWIKI HAFIZHUL OKTORIO'),(485,'2713100080','$2y$10$iW9h4Cs/V8fdsO436HnP7ejZKMSYppR3dWhDuXULO.8p.lh9/Dmxq',1,'CANDRA SIMON SEPTYAN'),(486,'2713100081','$2y$10$IGbkZONMsGJUYPqaO31TTeC9Untj0bctR6NWNML4bxDoWk0EZD.z6',1,'LAURENTIUS BASKORO ADITYA PUTRA'),(487,'2713100082','$2y$10$DIt/QqMwesM7ehqONxo2OuBpIFm1WhvgdG1f0DmDZP28hFLM0r61e',1,'RINUSH FEDRIKDO PALTGOR'),(488,'2713100083','$2y$10$Jv2KdZsve/Z4elvbwYmawORvNUosVcaxkG4rLi4R52zxMtQDSuSD.',1,'MUHAMMAD FARISI'),(489,'2713100084','$2y$10$ptVV2fqtcCHTWvthjN9DQeuYFedP82LqVfX7nIJ3KUhZ3.B17Z4vK',1,'DANIEL JANTHINUS KRISTIANTO'),(490,'2713100085','$2y$10$GPXAOh/MAroRoJvMTuy9feQ7fNGjKQW.DU4S2BGPcuEvyIvoERFRO',1,'PRIBADI RIDZKY MULYONO'),(491,'2713100087','$2y$10$6jKNG2v6bx2ZmQcRPdol3e8cCCBE.SJkW09MNWrPjGPCJUEv8.WlC',1,'JAN WESLIN SARAGIH'),(492,'2713100089','$2y$10$dj2LDcaQRZ6EO6panu8E.ePJJvgNoVBTOBYFadD702sio8Wy1qiwi',1,'DWIKY OKKA TJAHJANTO'),(493,'2713100090','$2y$10$czqIix36jGVgt1TCk3xTHeJowzfKvKqmT4w6CSiYInUPlMXM4RvEi',1,'HENRY JULIANTO'),(494,'2713100091','$2y$10$Mt4uaT/x4TThPRrGJn2pSObeVwt9qCqKpI8fxq4Dw3wIDKxzoZYFi',1,'SAMUEL BUDI UTOMO'),(495,'2713100092','$2y$10$PV.t1wWZ6v8BAieiRLapr.fphJKuTzQXAEsPUPDnopr4IS.VZVBWW',1,'FIQRI SANUBARI EKAPUTRA'),(496,'2713100094','$2y$10$ILXWyHtMC/h/Xh4eCyk7pOfwJQCtLuGJU0h.9It3nT4DlLeJJTqZ.',1,'STANDLEY MELYAN LAIA'),(497,'2713100095','$2y$10$khman8n4EqauiWSa4FdQmu9UpV.ClVOj.ha9GtZLpMpuIZ2CF3D6u',1,'PENIEL SIMAREMARE'),(498,'2713100096','$2y$10$FdzJJjDvND6Z135fwt1gM.iLfSMPXlVFCeKRQPT/RDm.KtKXbX1pe',1,'HANA MUTIALIF M'),(499,'2713100099','$2y$10$khw4e6i7mxRjFUK3tCRz..P12xOwfGHPY0hdkPCr/7wk0mMnx7jEK',1,'GREGGY PRAISVITO ROMADHONI'),(500,'2713100100','$2y$10$m8uvgR41MeRxyv7nSntyMeNpzcFKESqk/P3VBReBZ8qPucVgJhZke',1,'MUHAMMAD FAJAR ISMAIL'),(501,'2713100101','$2y$10$1wockdYplFaWC/Bz0hX2O.DeIhTo/H7NnccJ.pdKk.vaNgt7WEaii',1,'YUDHISTIRA SURYA ANDIKA K.'),(502,'2713100103','$2y$10$lYMblFIfurg8b2kb/k8bD.2OffTkeccZEIaLHryBkW.V4FEFIE5N6',1,'M FIQHI DZIKRIANSYAH'),(503,'2713100104','$2y$10$m82SlP2vCiMdtW8K.IbZr.Ndd61vV37nD5GHkdQLey6FxdAy3NjJW',1,'RANGGA RAMANDANA'),(504,'2713100105','$2y$10$5STllQ.81/7x3RtLWXYDLeOjtNeBpLRDnilDMcSfZpfGiMJpmQbT2',1,'BUDI CHRISTOFER MANIK'),(505,'2713100106','$2y$10$dM7NeHxIySXlUwJUALe7Beb8l2wxbh2J0sIMWrt03RCmYX.XdhAm2',1,'MAULANA MALIK SADIQUN'),(506,'2713100108','$2y$10$zA2jorKgxg4gUblW2597gexd.yfTbHYMtD2A3ZTabdEGCeNwtLO9G',1,'FAKHRI AULIA ABDILLAH'),(507,'2713100111','$2y$10$DgGHOBXOFMbG3BIflO2tR.cy9hvutFDpX5YrMPCjR/7V5rs4MhU0y',1,'PETER ANDREAS TIMOTIUS'),(508,'2713100112','$2y$10$/7dshmJ/alMSCYCj2ElLbOSR7DRZywi/PBEhC4oxb1HzI/az3BFiC',1,'BIMA PRAMESWARA'),(509,'2713100119','$2y$10$7wW8R9RgNMWZ.FU6u3EpZeDn0OW5wc0Lo8ohIpk.TM2jeNh2ksSeS',1,'GEMA RIVALDA RAIS'),(510,'2713100120','$2y$10$.Baxqk4g3kC/em4zba9Gc.savV7H2nx5J7XYBHfK9wjRce6HQtTu2',1,'ARIEF RIZALDI PRASETYA'),(511,'2713100121','$2y$10$GBwwnZtN8hCsd44CMintCOPelHrjbhRh2juRSUssopHqwTSxiiUIu',1,'MUHAMMAD YUNUS'),(512,'2713100122','$2y$10$FEbZ3PiDPTaaZYKq76FdduewXYxcve59kgf3NO.8Rpybp2Ve5XooC',1,'ACHMAD FAJAR FAISAL'),(513,'2713100124','$2y$10$ZceT/zvCRKD/MRiYbpqg0ODNcbaDHtTzHeO5KUnTJB7BcXK0FKe6.',1,'MUHAMMAD DIMASYQI'),(514,'2713100125','$2y$10$xkvJvhW9DC1rwvzRKnbVUu5wEO4xvepuUTvwwQdPNMKbmdc3AtPd6',1,'MAJDI MAULID ADITYO'),(515,'2713100126','$2y$10$kI/sjCdNywr58Gk4zVCFyurSWgkegxEhJ1UK38zd8PjRG3p0KtL6i',1,'AGNY MUCHAMAD NUREZA'),(516,'2713100127','$2y$10$FwljUHk0XDUI8xJaGwx.YOScN/ki/mOUNIv5pRyH/lsYAYHk9paO2',1,'EVIANTO RIZKY KURNIA'),(517,'2713100128','$2y$10$KMz6xE3IrS4t2MBrBtnD5.eaBH8Tiqw5A1TyXvRXk/arCXT.39psq',1,'ASAD JABBAR NURU'),(518,'2713100129','$2y$10$5PWw4Map7.Y1Ip3fC03gp.C9WeFdngBDsuqBdfnPZum6hGYiZbUqu',1,'MUTHIA EGI RAHMASITA'),(519,'2713100130','$2y$10$t6VWYivmyyfTsIjVUVgEQ.H3Kq6q8wl.HeRXAaT/fvGHb9BIalkJ6',1,'MUHAMMAD ADIYAKSA FEBRIYANTO'),(520,'2713100131','$2y$10$jQ5GnCCSwIaEZw9ALh6qluksshZp3GMYXDNtnN7/.us9LKB8w0pY6',1,'RYAN TRI KURNIAWAN'),(521,'2713100132','$2y$10$vbPIUo4LzW2UqUeFc6Lb.e.Qlw2GuafT.JhZUYcm3.44vFU8g5Ukm',1,'RAHMANIA AGUSTIN ASWIN'),(522,'2713100133','$2y$10$bbWtzZqL5Gm09HQ5SB0GCejwRWtDiQ4BXZFmLcOKjKzot8zLVCQZm',1,'BEDRY NURHADI SIMANJUNTAK'),(523,'2713100136','$2y$10$a.TJIQUhBNDb1BHCvHlBee./dcuqN4Q7yJ04m0MdWZXAjV3U0wrLe',1,'ILMI MAYUNI BUMI'),(524,'2713100137','$2y$10$Xx3siDOLUp12rX8XEcoPRub0lIDPXUWcem6wW7gmkaH93UqHfYWaW',1,'AXEL GIAN ADITAMA'),(525,'2713100138','$2y$10$55DC7tvCQ1R4NieuiuVtB.4lKU9i5Wc0lLxtniCdX58/02SpXPYXi',1,'RIFQI TANTYO PUTRA'),(526,'2713100139','$2y$10$Ev02PayrOePngGJT7glJCuMgK3buoY/mYxs1.8j59fs2DswIAsicS',1,'AULIA UR RAHMAN AMINUDDIN'),(527,'2713100140','$2y$10$DLN5Ces4gBh5TwXgfM13WuSDccuGNaBkqYTBiqF2mi7lJhyLBHOWC',1,'M AFZA NUR HAKIM'),(528,'2713100141','$2y$10$ZgetyLv6cin2qD03ioANOe9U3JMJ/2zxDOJBwO2nD1CQhbCrubyJG',1,'MUHAMMAD NAUFAL IQBAL'),(529,'2713100142','$2y$10$HVLaEI2QUDuYURh9wyv6gekVIKWaOSiZkgvi7twFk8BTZomaWHFja',1,'FARIDZ MOHAMMAD EDRIE'),(530,'2713100146','$2y$10$mgNOY7GeV/a8nq1q/jx42.b5DCZNcCvGNccX9y9YkPY.7yNKprhEi',1,'ADITYA DWIHUTAMA SUMARYANTO'),(531,'2713100147','$2y$10$VBF99VsFYMBlMjCZmDCa6O4Cvv4r8VkNcrwF7byMzLPp0sOdki2ZW',1,'M RIFQI MAHENDRA PUTRA'),(532,'2713100149','$2y$10$Pr5bAnQfq4SmVZpKIOuQyOTIXj8Yp4cLtzXnwqcY885LR91ynBUOK',1,'FAIZAL NUGRAHA RAMADHAN'),(533,'2713100150','$2y$10$PzU266a0BA/SqzJqKHv5je/56hHdWpUK3/7XFQnRIFmcjZj/Hu4KC',1,'AHLIDIN NURSIDIQ');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-28  8:59:55
