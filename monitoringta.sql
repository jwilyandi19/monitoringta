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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistensi`
--

LOCK TABLES `asistensi` WRITE;
/*!40000 ALTER TABLE `asistensi` DISABLE KEYS */;
INSERT INTO `asistensi` VALUES (1,1,2,'2017-07-20','Paradigma Reactive Programming','2017-07-20 02:13:56','2017-07-20 02:13:56'),(2,1,1,'2017-07-13','Mobile Programming','2017-07-20 02:17:28','2017-07-20 02:17:28');
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
  `pembimbing1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,4,'5110100001','RIZKY JANUAR AKBAR','RIZKY JANUAR AKBAR, S.Kom., M.Eng.',NULL),(2,5,'5110100002','WIJAYANTI NURUL K.','WIJAYANTI NURUL K.,S.Kom., M.Sc.',NULL),(3,6,'5110100003','DOSEN 3','DOSEN 3 S.KOM',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (1,'Buka Ketersediaan Seminar','2017-07-20 00:01:00'),(2,'Tutup Ketersediaan Seminar','2017-07-25 23:59:00'),(3,'Buka Pengajuan Jadwal Seminar','2017-07-26 00:00:01'),(4,'Tutup Pengajuan Jadwal Seminar','2017-07-30 23:59:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_seminar`
--

LOCK TABLES `jadwal_seminar` WRITE;
/*!40000 ALTER TABLE `jadwal_seminar` DISABLE KEYS */;
INSERT INTO `jadwal_seminar` VALUES (1,'2017-07-29',1,'2017-07-20 07:29:10','2017-07-20 07:29:12');
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
  `id_ks` int(11) NOT NULL AUTO_INCREMENT,
  `id_js` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ks`),
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
  `id_ku` int(11) NOT NULL AUTO_INCREMENT,
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ku`),
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
  KEY `id_seminar_ta` (`id_seminar_ta`)
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
  KEY `id_ujian_ta` (`id_ujian_ta`)
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
  `id_jadwal` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_angka` int(11) DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_seminar_ta`),
  KEY `id_ps` (`id_ta`)
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
  KEY `nrp` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_akhir`
--

LOCK TABLES `tugas_akhir` WRITE;
/*!40000 ALTER TABLE `tugas_akhir` DISABLE KEYS */;
INSERT INTO `tugas_akhir` VALUES (1,'3',2,1,0,1,'Rancang Bangun Aplikasi e-Learning Berbasis Perangkat Bergerak Android pada Fitur Manajemen Quiz dan Tanya Jawab Menggunakan Paradigma Reactive Programming',1,'2017-07-20 02:02:38','2017-07-20 02:16:57'),(2,'8',NULL,NULL,0,1,'Rancang Bangun Simulasi Tertib Lalu Lintas Sesuai Dengan Peraturan Pemerintah Nomor 79 Tahun 2013 Menggunakan Steering Wheel dan Oculus Rift',NULL,'2017-07-20 02:22:59','2017-07-20 02:22:59');
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
  KEY `id_pu` (`id_ta`)
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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin','$2y$10$cj0gfEEVI7AG0TO1tih4j.T0z9RxUwwg6i9mJvC.uW6gTdS5QkMwm',1,'Admin'),(3,'5114100109','$2y$10$l73YkuQpTcnbRiVwmyeNbuqTpmFgVKlS5bNtdjjXhlCAp8IEHAVLi',1,'Nafiar Rahmansyah'),(4,'5110100001','$2y$10$VcrpSk5qgk7rA73PQlououx7F8TgRy7YfHC4ME2pr0Xe9kBbzF6xC',2,'RIZKY JANUAR AKBAR'),(5,'5110100002','$2y$10$PbJJo0rzA2neQV.gKEFeguTQbn8IFwI/33QtcdzozzpMxH/A2lV6q',2,'WIJAYANTI NURUL K.'),(6,'5110100003','$2y$10$JNAEF7q43bO7GfRbx5C2JOM34utercBDs/WwTTlzMIyBCqC0RU66m',2,'dosen3'),(7,'naf','$2y$10$vN6d6qcVvU6AkjZ2IRUAeOOjSR1Z/pGFzx2.JwXiSNfqAlF76wKhi',3,'nafiar'),(8,'5114100110','$2y$10$r90OX3LLyZdNIFMH7YUiEuk29xmRzvy.PmpxtBfacjApiKlPKqoTu',1,'Rafiar Rahmansyah'),(213,'2710100022','$2y$10$Fp1e4KOj/1jJ6oNqNKllx.w01bshKqsO1sLIF4Ht6B.HkgYCQAt/C',1,'MOHAMMAD KHABIBI ALBISTHOMI'),(214,'2710100046','$2y$10$zQ8mBbDZ4DtU.82hxNJTnOm.PQFI0JY9iC2hlV3YBy11at.xupmWy',1,'OLGA LEONEV VASDAZARA'),(215,'2711100108','$2y$10$PVZS4Kz.WMeyVi5k1fHSJug5jMdYfc3zY.8DIX78VzzumfkmHkIYG',1,'GABRIEL FEBRUANDO'),(216,'2711100134','$2y$10$TcESAz0ivYXD3VdjhRFuDuM8m2VZc0hNF5ZC2tZKj6z1RprLyjkpa',1,'DHARMA KIYAT PERKASA'),(217,'2712100048','$2y$10$nqnnMIpzGZOuL6/TIGZ5KOe6iG75R39TAJYMI1TmVl5cbAeeR2Y0e',1,'ANGGA DEA SAPUTRA HIDAYAT'),(218,'2712100094','$2y$10$pH.p4NIRriWHz9PKystQA.dK4gyZc8/CSFUlZYl.FLpJ5mmYmqzGu',1,'DESI SAPANG'),(219,'2712100113','$2y$10$12x0Gb4mZ3D/e6gRCGA76eiTm5We29NK1P9VghwF097jXPhnTjdLa',1,'MUHAMMAD YUSUF BAIHAQI'),(220,'2713100001','$2y$10$Iv9rEJjYXDVcT/iuedUpweg2LZyR4qcz1M7VtnqpCJVc0AGjKWic.',1,'MOHAMMAD RIZKI FEBRIANTO'),(221,'2713100002','$2y$10$dT4iL4KubThWK7VGEb2yMe1ZoWYW1EArevGkdk9H7RGEz5/zhgAO2',1,'MUHAMMAD REZA'),(222,'2713100003','$2y$10$ibJ0wVvx3QdwaIt.G.cZpOMvdIT47U0xg/HstkeVSBtffFGW2M9Ny',1,'PUTU DITHA PRATAMA'),(223,'2713100004','$2y$10$4smTpP2I4utRe.HNmQhulukMjfbUW.WjsXshInuyYuyagqywEdH/2',1,'MUHAMMAD RIZAL PAMBUDI'),(224,'2713100005','$2y$10$e9GnVv6EzKHaVAZa95JaQOpsX0fGTVg0DO3sE/wmu.tMPVtoXtYp2',1,'MAHENDRA KRESNA PUTRA'),(225,'2713100008','$2y$10$8HTdqbmmmYM4aeYXq8jxw.ZCTLEb.ubuIJu.YNCR6o1zlDDi.kAbW',1,'LUTFI IRFAN'),(226,'2713100012','$2y$10$ugjkI/K0VbKWUw/5qZkFku6PDXdEwJsczlsfGEwd6cOzp0zZdTAli',1,'NOVIA DIAJENG ARUMSARI'),(227,'2713100013','$2y$10$kqfqghpGK4UY0.kSrERsB.JaetG4b.LSU0gGI9QYoMrrD0eCe/DCa',1,'SITI ANNISAA BANI PURWANA'),(228,'2713100014','$2y$10$a24JAAYMq2ArjeRM1Rumi.whPXnNPiFQxujzxi1CGbFafq4gbxjSe',1,'INGGIL HANIDYA'),(229,'2713100017','$2y$10$Tm7ABezZ84plpyUrdpjrwu0jumbZY7gckP0gcvtWOhjL8aBD.X8Ey',1,'ROMMEL. T'),(230,'2713100018','$2y$10$YHqOUVeO4/baoM4A7fypAOHIdChK/5TFHO2dUUbPB7lOOsR4qh6gq',1,'IHSAN MAULA'),(231,'2713100020','$2y$10$P7dOYvAHmz5.sJwUUTc1GeFC8pyuKygXwv44QYPQCH9e5pSqi.AcO',1,'MUHAMMAD TAUFIK AKBAR OFRIAL'),(232,'2713100024','$2y$10$AV53E1UomnpBhFj293A8quNlLAiZXmv0/eCpAOk19kVo/QStn0r2a',1,'IGFAR CITA'),(233,'2713100027','$2y$10$zbnBH0a7k..6ZU.Kj0FkG.7oMnajixHHWe96DBkFpP0w//FWWOvtC',1,'HAMZAH SYAIFULLAH'),(234,'2713100028','$2y$10$yqTnMp1lLk58RJiVA7/.lOA4DkNxXGWplQ75A7ZVumf67I/aaSDm.',1,'NURUL LAILATUL MUZAYADAH'),(235,'2713100029','$2y$10$oOnIi.sVXh5LSrqgpMd0oeE9VmpS.GAmLzw/bVRDCcbMS21WQNVJ.',1,'FADLI KURNIAWAN'),(236,'2713100030','$2y$10$obYv8ebEBktYDtrX/UDmN.25tN/PecswYRaGSH4LEZ33ewPladMde',1,'FIKRI ADHI NUGRAHA'),(237,'2713100031','$2y$10$VKVftoDXIB6ETf8VSluMcuKBhDACZDpcwLr7jNLrjvxLv6rvVZo/K',1,'ARDYA ADHITYAMEIDY ANDARU'),(238,'2713100034','$2y$10$j/Fd8V82/ImKk.f/ZXnKG.yssQEud17JtDnxrx/tbvr/yY5DPFg5C',1,'QORY MAGHFIROH'),(239,'2713100038','$2y$10$ulqbvvmgVY/nzOvCaV8rRuJ9na9fZ5a8WhDBEXF4RbwofeLJaIBOa',1,'RIDWAN BAGUS YUWANDONO'),(240,'2713100039','$2y$10$.CMpPKWEPlwzVpTbGOBaN.6b0.LWUj4wQfpr3654y3XyAaoJFBLXu',1,'ANDIKA PRATAMA'),(241,'2713100041','$2y$10$Haq9PPAqubcPMaDCzpjxPuVCX5M3cwWKMYWemZIHJ9WpMq0WCn452',1,'FARID RIZAL'),(242,'2713100042','$2y$10$v.NyTA4BHFv1lvqu1b.An.boI40NOaSkcVK/CCpzH4fcvZ4qlNmm6',1,'RATNA HERMASTUTI'),(243,'2713100044','$2y$10$WbF4zu88AMcp9cZHmTeUJuRcJPmddGyjwGrxZAJ/RIz75hsS4wbUG',1,'MEILATI PASCA MUNA'),(244,'2713100046','$2y$10$3WZXn4MooRnj07a6hpm15eKfI6IJjio6Oas9pU1F.RoZlnhaHBegS',1,'DESHINTA IKASARI'),(245,'2713100047','$2y$10$Eo6/qESSMF4d3ZE8LBUg0.HsVr6YNtjK83FRjl1OCgjrlfK2fS0Ei',1,'FAJAR KURNIAWATI'),(246,'2713100048','$2y$10$fhi3du5vdKyr1CyN7J9l0ejs/kF6Meu7Vo4NCH7tHdZVhvINvQYdu',1,'DYAH AYU KUSUMA HAPSARI'),(247,'2713100050','$2y$10$lbMMSCI1Pq79RNfIaUzgdeFdaViuaiPGEkKtBvA2HXBNvRyZIqhGy',1,'AHMAD PROSCA H'),(248,'2713100052','$2y$10$skNgimOakMhJhmVaJY0fQenM675tu.f8iq/wihsI4W0pt8q2b7Lv2',1,'PRADITYA HADI PRABOWO'),(249,'2713100054','$2y$10$1YO/KidZsIzBzoHwheuXRe2PuyscwPU7Up/awlnAQVx5nEJxsBVrO',1,'ANGGUN NURHAYATI'),(250,'2713100055','$2y$10$MIIoKgeJENOPsj2sCMV3..gNSoNMxXkWUMd3Vs/PZVUaq/SKv5LX2',1,'MOHAMMAD MIFTAH FADLIKA MAKMUR'),(251,'2713100057','$2y$10$LrH4Rq943olz2XlLFtD17.KcxAj6dm2OZrjtl95nohDClXzR65WNm',1,'JONAS MARTUA TAMBUNAN'),(252,'2713100060','$2y$10$sfXTSSkrJAnPgpGUszqK3Oz2a4bRZNsW8g3frCKKydd.KkJKH8y7C',1,'ADVEN F.N. HUTAJULU'),(253,'2713100063','$2y$10$NVWStiglp68b9eXGWIfl5OZIEfNnRx1m0Dq6p.YV5Vbo1khNK/WHC',1,'RACHMADHANI DIAN PRATAMA'),(254,'2713100066','$2y$10$YEpcQVHAj3Y39mr6RjN.duC5uM7jNUHo8clrW4hrW5Z1kfvtzTbmG',1,'ZULFA ILHAM BASYARAHIL'),(255,'2713100067','$2y$10$4IdlQISVrJ6syjkcXj93AumZ5ReCztmpckQeeGXYwP4/yHfA1YYjC',1,'ANGGIAT RAMOS JUNIARTO'),(256,'2713100068','$2y$10$7XxHpVrsqy0i9A0bYSUlqOegwlImHLoxES8E64vDOSSvLxaOPO.YC',1,'HAIRUL WASIK'),(257,'2713100069','$2y$10$VJkzPJ4yhaucSDyKauSpBOi1.ge1gu2JlDHEe8e8KhXUGIDVclDaq',1,'AJI PAMBUDI'),(258,'2713100070','$2y$10$v6alESjmkSiaHo8BBrJNou87a2l9lv4Dc5dGEJITu.A61G6NrQISG',1,'MUHAMMAD ADITYA PRADANA'),(259,'2713100074','$2y$10$q4LRu18tCM3Ar1qjdFfKa.qBRm3o/7Xu9gmL9GVVyX5aJzXo8W6MS',1,'ORLANDO BANJARNAHOR'),(260,'2713100075','$2y$10$SpvlWthqezaE/wd6V2LB6uOUSkYgW.AOwvHntNajQf9J6Jx3P8.GS',1,'RIFKI RACHMAN KHOLID'),(261,'2713100076','$2y$10$KPcbGlIaNrRHpjOZR0EN6u.Yygwlg1I5cFzBhMzmC0EiQiSU7iAJC',1,'MUSTAFID AMNA RAMBEY'),(262,'2713100078','$2y$10$FQK1ydoty9u9.X3.jsjOke2yQ0phZ4cSVISNkkcE3CvpQjHsHHmfq',1,'DWIKI HAFIZHUL OKTORIO'),(263,'2713100080','$2y$10$oROkvTQI4X1H14mCY.8JO.sgLgySSyR.4IORaH71OKjgaQZzS81xC',1,'CANDRA SIMON SEPTYAN'),(264,'2713100081','$2y$10$EQrzQO5TItZV8/AE.7aLA.fxXucsrdfDOrc2QUXRaXV9Dsp1/TQY6',1,'LAURENTIUS BASKORO ADITYA PUTRA'),(265,'2713100082','$2y$10$vDwzmQVABXgkUkUnaWHEDeWZNIE/ep8jm.pxY2HZC/OExS4Sar7LS',1,'RINUSH FEDRIKDO PALTGOR'),(266,'2713100083','$2y$10$3jbDNe9m/SEr2czWuRabJunYS.7elmmwgHRPUN4N.nYom.trG7E6u',1,'MUHAMMAD FARISI'),(267,'2713100084','$2y$10$JdJAtM4DbEOLImaKE5TvLOcE1wiOxQYsf1X64ZQqqfNchNlXz7tUq',1,'DANIEL JANTHINUS KRISTIANTO'),(268,'2713100085','$2y$10$6MAHa1siAKGfDKCeWE/7Y.eXB7h/sejjY/YDNKXW/AnKTkXHg3r5W',1,'PRIBADI RIDZKY MULYONO'),(269,'2713100087','$2y$10$lFS4M2V36dg8fhBnr.lysO.URmcScIYpne2UzrY.1B/57KtVAVUyW',1,'JAN WESLIN SARAGIH'),(270,'2713100089','$2y$10$9CVTvmOFZRXgJb8R0P3LcuUn6uPXMGq7FWSBfvwq6rN.zqWxftfWS',1,'DWIKY OKKA TJAHJANTO'),(271,'2713100090','$2y$10$eEcKp0enQK9jjlv0OaNQEOO4M6x.LuRGBA.Sj.BohCKEVDZo6InCm',1,'HENRY JULIANTO'),(272,'2713100091','$2y$10$MKZRxN2MX3sPZLx/KgTUW.sQeKd.hM.xLAgCit.NPwmIVnD7wnoE2',1,'SAMUEL BUDI UTOMO'),(273,'2713100092','$2y$10$NnNNVdp52eA8EL393wXPCe7Mu1nAAEBEWKJeRhd9qDeo.298zRLky',1,'FIQRI SANUBARI EKAPUTRA'),(274,'2713100094','$2y$10$aEqRDRF2yUpHHfTv4l2uYuBACn5KcGEGn/q0oVlmlelk0Ivgb7buC',1,'STANDLEY MELYAN LAIA'),(275,'2713100095','$2y$10$eO7QagLqBA1Q4rfoeya92ekBWvestTvpFQVek5PvFHUjbLfvSVaYO',1,'PENIEL SIMAREMARE'),(276,'2713100096','$2y$10$ZWhEXY93.rzcbuRDlJbDUOg5MN6tx04Qt33F5qHvbleP16vajXJ2G',1,'HANA MUTIALIF M'),(277,'2713100099','$2y$10$mqpZ0arHzguqPd0NlNg0r.AArio2/8.QrtCQGU2o0Emk8mn7mnQIG',1,'GREGGY PRAISVITO ROMADHONI'),(278,'2713100100','$2y$10$e6ShGDAjDjN/njrOKQq1ou77rjN6HcycZrohmd57cigvfcTF.dzmu',1,'MUHAMMAD FAJAR ISMAIL'),(279,'2713100101','$2y$10$W3Vg5/dGTKNk9RVEO3djje40JGV3aTxeobgE.uGsaDp9e9orViaV2',1,'YUDHISTIRA SURYA ANDIKA K.'),(280,'2713100103','$2y$10$EhGDkw/8xtupK6lZ/WyLm.4zujBHP8TM1vvs4NtOVwrW9Z7aSonEK',1,'M FIQHI DZIKRIANSYAH'),(281,'2713100104','$2y$10$oPu3raLSbYbSA00c0AbNMuSWNcl3HBloPRIGPznLh/6XtXjTayHfe',1,'RANGGA RAMANDANA'),(282,'2713100105','$2y$10$em6kMPmG.JbPKOHQScQRy.67vgUmwHT/ZIm9xFoRMunkCdUZ.auNm',1,'BUDI CHRISTOFER MANIK'),(283,'2713100106','$2y$10$/T6e/gbnqOlr99LrZ018cOoCHZOC8DQyj5ao6tSce/r6butAQLEwy',1,'MAULANA MALIK SADIQUN'),(284,'2713100108','$2y$10$2rF40hilr8Ldm54chWiElOq5Vtt7A2EuITR9d96RXYnby7m0Uw9Xe',1,'FAKHRI AULIA ABDILLAH'),(285,'2713100111','$2y$10$V/EjgEa8Wr3nKb7ZwrYk3uRRQ6YSzYSNMbSKcwVnxMjafSYs7QllO',1,'PETER ANDREAS TIMOTIUS'),(286,'2713100112','$2y$10$I/Me0FhalIEFS2jx67NWFuTrKwQEi5rbpvub/JnUpv4IdS/FYUwi2',1,'BIMA PRAMESWARA'),(287,'2713100119','$2y$10$fE0t3T2GVPbfA61.uTBr0ONvLZsJ8xOFuENHg0Ljpdd/wlLXOg7qe',1,'GEMA RIVALDA RAIS'),(288,'2713100120','$2y$10$/QJ6Qvpedm12VrtyKzZ8DeurO3sq4rbKDV39BV0WXFBeJ1sd2guaW',1,'ARIEF RIZALDI PRASETYA'),(289,'2713100121','$2y$10$O18FqyH8QMnE8VLgqiK8Mey5TTt4s8vtEtE34DbHeQ6r2azr4zX3C',1,'MUHAMMAD YUNUS'),(290,'2713100122','$2y$10$pcYVIiSIiKw.mG5l0QBSM.mY8jQjGoFgolZuE8qldmBhPHQea1wxS',1,'ACHMAD FAJAR FAISAL'),(291,'2713100124','$2y$10$3CAtJwz9XuFUVo46BWlC7OhTiPrGUj3LPtOGYPNnoWAQEq/8rjNCG',1,'MUHAMMAD DIMASYQI'),(292,'2713100125','$2y$10$7eesHpm4YiCVBMamoVW8/eJ1U3Irz8nIsPfA1i1R.RCVjijbKrlry',1,'MAJDI MAULID ADITYO'),(293,'2713100126','$2y$10$f7/K2k7.NPc0hY8sFF3fD.foAHV7W40BrxaLX6YiLCSh0WtLnZM2q',1,'AGNY MUCHAMAD NUREZA'),(294,'2713100127','$2y$10$mmEQVdmSKzpAIMd.UYqXKu.ko.gT8tJv9ORfrQk8J7WBjvlD3NdVa',1,'EVIANTO RIZKY KURNIA'),(295,'2713100128','$2y$10$S7PLghqJoFyR2MSBmFkdrePOqwQ/n2HhTg8T.g5RWxhg4TTBpoVmG',1,'ASAD JABBAR NURU'),(296,'2713100129','$2y$10$AzZ26Blb64rd/NvU6N97X.TfDwVqhNq6nZrdE7yNtKLH69M7ykHui',1,'MUTHIA EGI RAHMASITA'),(297,'2713100130','$2y$10$Qh/0C1ecSheVzUO4BRs3duO0FRaucoT0M0O/QsSu.B7CC7DG26Que',1,'MUHAMMAD ADIYAKSA FEBRIYANTO'),(298,'2713100131','$2y$10$DwRkihn1QeYJIvgjjpDtk.LMmu4X2CSsqx384S3aConQuUr4LYVDC',1,'RYAN TRI KURNIAWAN'),(299,'2713100132','$2y$10$H0D7Es4sc9dWKF6wqGOeLu2hcgaAlCDS9e2RHdIuChRFH/coQklKW',1,'RAHMANIA AGUSTIN ASWIN'),(300,'2713100133','$2y$10$v0P85q93Bi9GW.IVUnw10u62TUs/TZtJJ05UFy113c4Dsg6dBgfyi',1,'BEDRY NURHADI SIMANJUNTAK'),(301,'2713100136','$2y$10$y2WmMm8jIxsZV.3WonCGu..cLlWs6tLdoW/ci75Y/GEXU1k8LfSd.',1,'ILMI MAYUNI BUMI'),(302,'2713100137','$2y$10$Dro1YgRpfuWVM2s7JKzfpepw7EVuaOGe/UbT0I.quhETrCrW3HX7W',1,'AXEL GIAN ADITAMA'),(303,'2713100138','$2y$10$ZaVXIjOBEdYcKuJ4isoYh.TLL5TXuH/oT/lbtQEto7NBRFuOk8AkS',1,'RIFQI TANTYO PUTRA'),(304,'2713100139','$2y$10$qcTVooWj2CPFfnMl9b368eyrrHkCjO5mQOAUowiTnMD0hh7JedY0u',1,'AULIA UR RAHMAN AMINUDDIN'),(305,'2713100140','$2y$10$Ircg2QStOSKoXQdRgk5J6OcnX8d2i7M7By9z1b3HzPA6Q/yUfxYpe',1,'M AFZA NUR HAKIM'),(306,'2713100141','$2y$10$ASRg2taVFJ/dWqRR.lc.wuwbIdL22HqP4dzmPVrxjbe24u8i9DHA.',1,'MUHAMMAD NAUFAL IQBAL'),(307,'2713100142','$2y$10$Z.sBsfGmK5DS1fEQgW6T2e3daopr9ckK0h/INL.ZdeCgVgQgegDlC',1,'FARIDZ MOHAMMAD EDRIE'),(308,'2713100146','$2y$10$CUndNDdShueMt7YxmwVQHOfHoqDz94pWsjQxTDyKs/ly2G9J3gW1K',1,'ADITYA DWIHUTAMA SUMARYANTO'),(309,'2713100147','$2y$10$yMjdwsZ3YMNk8oW.DnJ1COEhO5o1ruptJzh9Z/uzCWdv4ExFhM.wm',1,'M RIFQI MAHENDRA PUTRA'),(310,'2713100149','$2y$10$r10LVNmBDPIEe8cOjVA3Ru83Kucbr6TFf9cHiw08XWZHmH1i7lyju',1,'FAIZAL NUGRAHA RAMADHAN'),(311,'2713100150','$2y$10$usRDYwJvMHl87IHhTr1oe.j5Ea8PCiBmudzWtWWFimimgcNxilVz.',1,'AHLIDIN NURSIDIQ');
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

-- Dump completed on 2017-07-20 20:33:22
