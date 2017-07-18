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
  `tanggal` date DEFAULT NULL,
  `materi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistensi`),
  KEY `id_ta` (`id_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistensi`
--

LOCK TABLES `asistensi` WRITE;
/*!40000 ALTER TABLE `asistensi` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang_mk`
--

LOCK TABLES `bidang_mk` WRITE;
/*!40000 ALTER TABLE `bidang_mk` DISABLE KEYS */;
INSERT INTO `bidang_mk` VALUES (1,'Material Inovasi'),(2,'Metalurgi');
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
  PRIMARY KEY (`id_dosen`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,4,'5110100001','RIZKY JANUAR AKBAR','RIZKY JANUAR AKBAR, S.Kom., M.Eng.'),(2,5,'5110100002','WIJAYANTI NURUL K.','WIJAYANTI NURUL K.,S.Kom., M.Sc.'),(3,6,'5110100003','DOSEN 3','DOSEN 3 S.KOM');
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
INSERT INTO `dosen_pembimbing` VALUES (1,1,1,1,0,'2017-07-18 02:14:17','2017-07-18 02:14:17'),(2,2,1,2,1,'2017-07-18 02:14:17','2017-07-18 02:21:02');
/*!40000 ALTER TABLE `dosen_pembimbing` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_seminar`
--

LOCK TABLES `jadwal_seminar` WRITE;
/*!40000 ALTER TABLE `jadwal_seminar` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ujian`
--

LOCK TABLES `jadwal_ujian` WRITE;
/*!40000 ALTER TABLE `jadwal_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketersediaan_seminar`
--

DROP TABLE IF EXISTS `ketersediaan_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketersediaan_seminar` (
  `id_js` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ketersediaan_seminar`
--

LOCK TABLES `ketersediaan_seminar` WRITE;
/*!40000 ALTER TABLE `ketersediaan_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `ketersediaan_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ketersediaan_ujian`
--

DROP TABLE IF EXISTS `ketersediaan_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ketersediaan_ujian` (
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id_dosen` (`id_dosen`)
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
-- Table structure for table `konfirmasi_seminar`
--

DROP TABLE IF EXISTS `konfirmasi_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfirmasi_seminar` (
  `id_penilaian_s` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfirmasi_seminar`
--

LOCK TABLES `konfirmasi_seminar` WRITE;
/*!40000 ALTER TABLE `konfirmasi_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfirmasi_ujian`
--

DROP TABLE IF EXISTS `konfirmasi_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfirmasi_ujian` (
  `id_penilaian_u` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfirmasi_ujian`
--

LOCK TABLES `konfirmasi_ujian` WRITE;
/*!40000 ALTER TABLE `konfirmasi_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_seminar`
--

DROP TABLE IF EXISTS `pengajuan_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan_seminar` (
  `id_ps` int(11) NOT NULL AUTO_INCREMENT,
  `id_js` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_dosbing1` int(11) DEFAULT NULL,
  `id_dosbing2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ps`),
  KEY `id_ta` (`id_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_seminar`
--

LOCK TABLES `pengajuan_seminar` WRITE;
/*!40000 ALTER TABLE `pengajuan_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_ujian`
--

DROP TABLE IF EXISTS `pengajuan_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan_ujian` (
  `id_pu` int(11) NOT NULL AUTO_INCREMENT,
  `id_ju` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_dosbing1` int(11) DEFAULT NULL,
  `id_dosbing2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pu`),
  KEY `id_ta` (`id_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_ujian`
--

LOCK TABLES `pengajuan_ujian` WRITE;
/*!40000 ALTER TABLE `pengajuan_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian_seminar`
--

DROP TABLE IF EXISTS `penilaian_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penilaian_seminar` (
  `id_penilaian_s` int(11) NOT NULL AUTO_INCREMENT,
  `id_ps` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian_s`),
  KEY `id_ps` (`id_ps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian_seminar`
--

LOCK TABLES `penilaian_seminar` WRITE;
/*!40000 ALTER TABLE `penilaian_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian_ujian`
--

DROP TABLE IF EXISTS `penilaian_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penilaian_ujian` (
  `id_penilaian_u` int(11) NOT NULL AUTO_INCREMENT,
  `id_pu` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian_u`),
  KEY `id_pu` (`id_pu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian_ujian`
--

LOCK TABLES `penilaian_ujian` WRITE;
/*!40000 ALTER TABLE `penilaian_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_ujian` ENABLE KEYS */;
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
  `tanggalBuat` date DEFAULT NULL,
  `file` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  KEY `nrp` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_akhir`
--

LOCK TABLES `tugas_akhir` WRITE;
/*!40000 ALTER TABLE `tugas_akhir` DISABLE KEYS */;
INSERT INTO `tugas_akhir` VALUES (1,'3',NULL,2,0,2,'Rancang Bangun Aplikasi e-Learning pada Fitur Manajemen Perkuliahan Berbasis Perangkat Bergerak Android Menggunakan Paradigma Reactive Programming','2017-07-18',NULL),(2,'8',NULL,NULL,0,1,'Sinkronisasi Basis Data Relasional menggunakan Paradigma Publish/Subscribe pada Studi Kasus Sistem Informasi Berbasis Web di ITS','2017-07-18',NULL);
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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','$2y$10$cj0gfEEVI7AG0TO1tih4j.T0z9RxUwwg6i9mJvC.uW6gTdS5QkMwm',1,'Admin'),(3,'5114100109','$2y$10$l73YkuQpTcnbRiVwmyeNbuqTpmFgVKlS5bNtdjjXhlCAp8IEHAVLi',1,'Nafiar Rahmansyah'),(4,'5110100001','$2y$10$VcrpSk5qgk7rA73PQlououx7F8TgRy7YfHC4ME2pr0Xe9kBbzF6xC',2,'RIZKY JANUAR AKBAR'),(5,'5110100002','$2y$10$PbJJo0rzA2neQV.gKEFeguTQbn8IFwI/33QtcdzozzpMxH/A2lV6q',2,'WIJAYANTI NURUL K.'),(6,'5110100003','$2y$10$JNAEF7q43bO7GfRbx5C2JOM34utercBDs/WwTTlzMIyBCqC0RU66m',2,'dosen3'),(7,'naf','$2y$10$vN6d6qcVvU6AkjZ2IRUAeOOjSR1Z/pGFzx2.JwXiSNfqAlF76wKhi',3,'nafiar'),(8,'5114100110','$2y$10$r90OX3LLyZdNIFMH7YUiEuk29xmRzvy.PmpxtBfacjApiKlPKqoTu',1,'Rafiar Rahmansyah');
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

-- Dump completed on 2017-07-18  9:35:45
