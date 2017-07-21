-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: monitoringta
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistensi`
--

LOCK TABLES `asistensi` WRITE;
/*!40000 ALTER TABLE `asistensi` DISABLE KEYS */;
INSERT INTO `asistensi` VALUES (1,1,2,'2017-07-20','Paradigma Reactive Programming','2017-07-20 02:13:56','2017-07-20 02:13:56'),(2,1,1,'2017-07-13','Mobile Programming','2017-07-20 02:17:28','2017-07-20 02:17:28'),(3,1,1,'2017-07-23','Buku TA bab 3','2017-07-21 00:12:07','2017-07-21 00:12:07');
/*!40000 ALTER TABLE `asistensi` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen_pembimbing`
--

LOCK TABLES `dosen_pembimbing` WRITE;
/*!40000 ALTER TABLE `dosen_pembimbing` DISABLE KEYS */;
INSERT INTO `dosen_pembimbing` VALUES (1,2,1,1,0,'2017-07-20 02:02:38','2017-07-20 02:14:23'),(2,1,1,2,1,'2017-07-20 02:14:56','2017-07-20 02:16:57'),(3,1,2,1,0,'2017-07-20 02:22:59','2017-07-20 02:22:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (1,'Buka Ketersediaan Seminar','2017-07-20 00:01:00'),(2,'Tutup Ketersediaan Seminar','2017-07-25 23:59:00'),(3,'Buka Pengajuan Jadwal Seminar','2017-07-26 00:00:01'),(4,'Tutup Pengajuan Jadwal Seminar','2017-07-30 23:59:00'),(5,'Tutup Ketersediaan Ujian','2017-07-25 00:01:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_seminar`
--

LOCK TABLES `jadwal_seminar` WRITE;
/*!40000 ALTER TABLE `jadwal_seminar` DISABLE KEYS */;
INSERT INTO `jadwal_seminar` VALUES (11,'2017-07-31',1,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(12,'2017-07-31',2,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(13,'2017-07-31',3,'2017-07-20 18:27:26','2017-07-20 18:27:26'),(14,'2017-07-30',1,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(15,'2017-07-30',2,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(16,'2017-07-30',3,'2017-07-20 18:30:23','2017-07-20 18:30:23'),(17,'2017-07-29',1,'2017-07-20 18:30:28','2017-07-20 18:30:28'),(18,'2017-07-29',2,'2017-07-20 18:30:29','2017-07-20 18:30:29'),(19,'2017-07-29',3,'2017-07-20 18:30:29','2017-07-20 18:30:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ujian`
--

LOCK TABLES `jadwal_ujian` WRITE;
/*!40000 ALTER TABLE `jadwal_ujian` DISABLE KEYS */;
INSERT INTO `jadwal_ujian` VALUES (1,'2017-07-29',1,'2017-07-20 18:39:55','2017-07-20 18:39:55'),(2,'2017-07-29',2,'2017-07-20 18:39:55','2017-07-20 18:39:55'),(3,'2017-07-29',3,'2017-07-20 18:39:55','2017-07-20 18:39:55');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketersediaan_seminar`
--

LOCK TABLES `ketersediaan_seminar` WRITE;
/*!40000 ALTER TABLE `ketersediaan_seminar` DISABLE KEYS */;
INSERT INTO `ketersediaan_seminar` VALUES (1,15,2,'2017-07-20 19:56:35','2017-07-20 19:56:37');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketersediaan_ujian`
--

LOCK TABLES `ketersediaan_ujian` WRITE;
/*!40000 ALTER TABLE `ketersediaan_ujian` DISABLE KEYS */;
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
  `tanggal` date DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_seminar_ta`),
  KEY `id_ps` (`id_ta`),
  KEY `id_js` (`id_js`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_ta`
--

LOCK TABLES `seminar_ta` WRITE;
/*!40000 ALTER TABLE `seminar_ta` DISABLE KEYS */;
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
INSERT INTO `status_ta` VALUES (-1,'Ditolak'),(0,'Mengajukan Judul'),(1,'Menunggu Seminar'),(2,'Revisi'),(3,'OK'),(4,'Batal'),(5,'Maju Sidang'),(6,'Lulus'),(7,'Tidak Lulus');
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
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosbing1` int(11) DEFAULT NULL,
  `id_dosbing2` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_bidang_mk` int(11) DEFAULT NULL,
  `judul` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  KEY `nrp` (`id_user`),
  KEY `id_dosbing1` (`id_dosbing1`),
  KEY `id_dosbing2` (`id_dosbing2`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_akhir`
--

LOCK TABLES `tugas_akhir` WRITE;
/*!40000 ALTER TABLE `tugas_akhir` DISABLE KEYS */;
INSERT INTO `tugas_akhir` VALUES (1,'3',2,1,0,1,'Rancang Bangun Aplikasi e-Learning Berbasis Perangkat Bergerak Android pada Fitur Manajemen Quiz dan Tanya Jawab Menggunakan Paradigma Reactive Programming',1,'2017-07-20 02:02:38','2017-07-20 02:16:57'),(2,'8',NULL,NULL,-1,1,'Rancang Bangun Simulasi Tertib Lalu Lintas Sesuai Dengan Peraturan Pemerintah Nomor 79 Tahun 2013 Menggunakan Steering Wheel dan Oculus Rift',NULL,'2017-07-20 02:22:59','2017-07-20 02:22:59');
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
  `tanggal` date DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ujian_ta`),
  KEY `id_pu` (`id_ta`),
  KEY `id_ju` (`id_ju`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ujian_ta`
--

LOCK TABLES `ujian_ta` WRITE;
/*!40000 ALTER TABLE `ujian_ta` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=435 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','$2y$10$cj0gfEEVI7AG0TO1tih4j.T0z9RxUwwg6i9mJvC.uW6gTdS5QkMwm',1,'Admin'),(3,'5114100109','$2y$10$l73YkuQpTcnbRiVwmyeNbuqTpmFgVKlS5bNtdjjXhlCAp8IEHAVLi',1,'Nafiar Rahmansyah'),(4,'5110100001','$2y$10$VcrpSk5qgk7rA73PQlououx7F8TgRy7YfHC4ME2pr0Xe9kBbzF6xC',2,'RIZKY JANUAR AKBAR'),(5,'5110100002','$2y$10$PbJJo0rzA2neQV.gKEFeguTQbn8IFwI/33QtcdzozzpMxH/A2lV6q',2,'WIJAYANTI NURUL K.'),(6,'5110100003','$2y$10$JNAEF7q43bO7GfRbx5C2JOM34utercBDs/WwTTlzMIyBCqC0RU66m',2,'dosen3'),(7,'admin1','$2y$10$vN6d6qcVvU6AkjZ2IRUAeOOjSR1Z/pGFzx2.JwXiSNfqAlF76wKhi',3,'nafiar'),(8,'5114100110','$2y$10$r90OX3LLyZdNIFMH7YUiEuk29xmRzvy.PmpxtBfacjApiKlPKqoTu',1,'Rafiar Rahmansyah'),(411,'196203261987011001','$2y$10$1qjThG1M7O.FXiFz7A/Bae/dom530n3kXvJrE2/fY/pSfkO7glLI6',2,'Prof. Dr. Ir. Sulistijono, DEA'),(412,'195709241986031002','$2y$10$YQIXDU9EaQNIc4oG2fRx3uwM0nqCwO8ytzNXstpuDio8T4BxbqCLm',2,'Ir. Moh. Farid, DEA'),(413,'195809101986031002','$2y$10$RiqRFbjwUItQmd19Bl6RT.cXNgaBalmJDumDeCD5DA.ZsjtGhvnQe',2,'Ir. Rochman Rochiem, MSc.'),(414,'196809302000031001','$2y$10$.WWweNURU3tltoZ4ouSz2uCS7UZqMC69FQrMpk5IwM//XxvVPr4GW',2,'Dr. Sungging Pintowantoro, S.T., M.T.'),(415,'197701162003122007','$2y$10$CcgcegHFX/AY4hF6RyZZMOAzJqn9LNcbjMgsz4fA09ZtDHVqSZIaq',2,'Dr. Diah Susanti, S.T., M.T.'),(416,'197801132002121003','$2y$10$OlmrJJyQadWssFWKJAuB1egsJd.jA3xfD.D6N.G.7YxGiumbcpR12',2,'Dr. Sigit Tri Wicasono, S.Si., M.Si.'),(417,'197605282002121003','$2y$10$qqejXLtkmlPf7v9WQDwxXeKHbsUY4MAtVsrZzo2IC09VHpS64nVA6',2,'Dr. Agung Purniawan, S.T., M.Eng.'),(418,'197604102002121002','$2y$10$.etHTI5xfsbqbyee9OEGgO6O1ZIxJjRjz6urQ9zY9MRu.LzpReew.',2,'Budi Agung Kurniawan, S.T., M.Sc.'),(419,'197703132003121001','$2y$10$BNl3oRD2xwhQ8/7oW85j6.5AWOTSOHKmkftAOrEi8Z61ZfeHV9HWi',2,'Dr. Lukman Neorochiem, S.T., M.Sc.Eng.'),(420,'197610272003121001','$2y$10$5.QJNb8HQO/oqBxK8R.5ZOCD8.WPLCz9.r/FOqauV5UeWYfn8MKe2',2,'Mas Irfan P. Hidayat, S.T., M.Sc., Ph.D.'),(421,'197708172005011004','$2y$10$oJg.f5mbm1WwXK8S80OnTuOvolrf.2uCzA/WhMsiOKyCJs4qobTdm',2,'Sutarsis, S.T., M.Sc.'),(422,'197907242005012003','$2y$10$nGwHmyHNIFkzLn1YodmtpO3ZHTkMWrESVspv7uztANJ79dAvKuH7W',2,'Yuli Setiyorini, S.T., M.Phil.'),(423,'198012072005011004','$2y$10$5YFH.Es0nkBpm/DN5hGVwers.iE2dIs9BeReeu7Yr0y.wALhsibMC',2,'Dr. Eng. Hosta Ardhyananta, S.T., M.Sc.'),(424,'197410172006042001','$2y$10$mkPswMi6tSHt0P08wX2qFOb0ZURoMPOZn9XYIxPfD1lKhzhTEYIoe',2,'Hariyati Purwaningsih, S.Si., M.Si.'),(425,'197906202006042001','$2y$10$/ZFm6OMImOIvu0xqs/Eyv..wB0yTvybxSRDspWg2Af/il/30qzeoe',2,'Dr. Widyastuti, S.Si., M.Si.'),(426,'198302012008122002','$2y$10$JhQqRgWCm.gsESWFdEdofebkI2RxoxFk9XIakbGDdxD4qdtmrU5Wa',2,'Rindang Fajarin, S.Si., M.Si.'),(427,'198205262012121002','$2y$10$1kKLCeh4AV1jJ4e.IWTuLOYhCwpbLXQ1Y.UFURpIPw9S4TT0Qgvxe',2,'Tubagus Noor R., S.T., M.Sc.'),(428,'198303252014042003','$2y$10$wPk3dsuA5piop/YVYCJ39eStCej4InvWywBjZGoTMxQ6kVDPuCZGG',2,'Wikan Jatimurti, S.T., M.Sc.'),(429,'198405152014042003','$2y$10$d9dDXQG5eCZChu3Z//wCh.AbRb4Zv2gl4Jluau2ejAh68SuWYr/vK',2,'Dian Mughni F., S.T., M.Sc.'),(430,'199007262015041002','$2y$10$pkai7BRcSHWF2MgSEsaGm.ZJ5jERevBWdPtzBIY2PCpSChfz5sFi6',2,'Haniffudin Nurdiansah, S.T., M.T.'),(431,'199102172015041002','$2y$10$j8VYBgUo55Npe69vcXcSL.qiY9GHGPByjGswwg/3VeaQjFGQr4C3m',2,'Fakhreza Abdul, S.T., M.T.'),(432,'199106092015041001','$2y$10$DlzXBt3GxmIzur3LdyrT8OTEzxBsAQQOQNer8cELfVnFycIQ.hvvS',2,'Alvian Toto Wibisono, S.T., M.T.'),(433,'dosen01','$2y$10$fX0dstwj35dWkEM/viiV1u8/5B0Upg317ofk1XZUvdFjuTg1lMEvm',2,'Amaliya Rasyida, S.T., M.Sc.'),(434,'dosen02','$2y$10$jR8RUWVcGeZsb05c05jWR.2CpZLQOx4fYkzEvoqXw07GDJr8UZIEq',2,'Vania Mitha Pratiwi, S.T., M.T.');
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

-- Dump completed on 2017-07-21  8:45:19
