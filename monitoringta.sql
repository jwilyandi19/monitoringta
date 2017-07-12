-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table monitoringta.asistensi
CREATE TABLE IF NOT EXISTS `asistensi` (
  `id_asistensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_ta` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `materi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.asistensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `asistensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistensi` ENABLE KEYS */;

-- Dumping structure for table monitoringta.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.dosen: ~0 rows (approximately)
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table monitoringta.jadwal_seminar
CREATE TABLE IF NOT EXISTS `jadwal_seminar` (
  `id_js` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_js`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.jadwal_seminar: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_seminar` ENABLE KEYS */;

-- Dumping structure for table monitoringta.jadwal_ujian
CREATE TABLE IF NOT EXISTS `jadwal_ujian` (
  `id_ju` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ju`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.jadwal_ujian: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_ujian` ENABLE KEYS */;

-- Dumping structure for table monitoringta.ketersediaan_seminar
CREATE TABLE IF NOT EXISTS `ketersediaan_seminar` (
  `id_js` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.ketersediaan_seminar: ~0 rows (approximately)
/*!40000 ALTER TABLE `ketersediaan_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `ketersediaan_seminar` ENABLE KEYS */;

-- Dumping structure for table monitoringta.ketersediaan_ujian
CREATE TABLE IF NOT EXISTS `ketersediaan_ujian` (
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.ketersediaan_ujian: ~0 rows (approximately)
/*!40000 ALTER TABLE `ketersediaan_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `ketersediaan_ujian` ENABLE KEYS */;

-- Dumping structure for table monitoringta.konfirmasi_seminar
CREATE TABLE IF NOT EXISTS `konfirmasi_seminar` (
  `id_penilaian_s` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.konfirmasi_seminar: ~0 rows (approximately)
/*!40000 ALTER TABLE `konfirmasi_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi_seminar` ENABLE KEYS */;

-- Dumping structure for table monitoringta.konfirmasi_ujian
CREATE TABLE IF NOT EXISTS `konfirmasi_ujian` (
  `id_penilaian_u` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.konfirmasi_ujian: ~0 rows (approximately)
/*!40000 ALTER TABLE `konfirmasi_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi_ujian` ENABLE KEYS */;

-- Dumping structure for table monitoringta.pengajuan_seminar
CREATE TABLE IF NOT EXISTS `pengajuan_seminar` (
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

-- Dumping data for table monitoringta.pengajuan_seminar: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengajuan_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan_seminar` ENABLE KEYS */;

-- Dumping structure for table monitoringta.pengajuan_ujian
CREATE TABLE IF NOT EXISTS `pengajuan_ujian` (
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

-- Dumping data for table monitoringta.pengajuan_ujian: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengajuan_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan_ujian` ENABLE KEYS */;

-- Dumping structure for table monitoringta.penilaian_seminar
CREATE TABLE IF NOT EXISTS `penilaian_seminar` (
  `id_penilaian_s` int(11) NOT NULL AUTO_INCREMENT,
  `id_ps` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian_s`),
  KEY `id_ps` (`id_ps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.penilaian_seminar: ~0 rows (approximately)
/*!40000 ALTER TABLE `penilaian_seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_seminar` ENABLE KEYS */;

-- Dumping structure for table monitoringta.penilaian_ujian
CREATE TABLE IF NOT EXISTS `penilaian_ujian` (
  `id_penilaian_u` int(11) NOT NULL AUTO_INCREMENT,
  `id_pu` int(11) DEFAULT NULL,
  `nilai` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluasi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian_u`),
  KEY `id_pu` (`id_pu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.penilaian_ujian: ~0 rows (approximately)
/*!40000 ALTER TABLE `penilaian_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian_ujian` ENABLE KEYS */;

-- Dumping structure for table monitoringta.seminar_final
CREATE TABLE IF NOT EXISTS `seminar_final` (
  `id_jadwal` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  KEY `id_dosen_uji` (`id_dosen_uji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.seminar_final: ~0 rows (approximately)
/*!40000 ALTER TABLE `seminar_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar_final` ENABLE KEYS */;

-- Dumping structure for table monitoringta.status_ta
CREATE TABLE IF NOT EXISTS `status_ta` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.status_ta: ~0 rows (approximately)
/*!40000 ALTER TABLE `status_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_ta` ENABLE KEYS */;

-- Dumping structure for table monitoringta.tugas_akhir
CREATE TABLE IF NOT EXISTS `tugas_akhir` (
  `id_ta` int(11) NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrp` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `dosen1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dosen1` int(11) DEFAULT NULL,
  `id_dosen2` int(11) DEFAULT NULL,
  `rmk` int(11) DEFAULT NULL,
  `file` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  KEY `nrp` (`nrp`),
  KEY `id_dosen1` (`id_dosen1`),
  KEY `id_dosen2` (`id_dosen2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.tugas_akhir: ~0 rows (approximately)
/*!40000 ALTER TABLE `tugas_akhir` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugas_akhir` ENABLE KEYS */;

-- Dumping structure for table monitoringta.ujian_final
CREATE TABLE IF NOT EXISTS `ujian_final` (
  `id_ju` int(11) DEFAULT NULL,
  `id_dosen_uji` int(11) DEFAULT NULL,
  KEY `id_dosen_uji` (`id_dosen_uji`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.ujian_final: ~0 rows (approximately)
/*!40000 ALTER TABLE `ujian_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `ujian_final` ENABLE KEYS */;

-- Dumping structure for table monitoringta.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table monitoringta.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id_user`, `username`, `password`, `role`, `nama`) VALUES
	(2, 'admin', '$2y$10$cj0gfEEVI7AG0TO1tih4j.T0z9RxUwwg6i9mJvC.uW6gTdS5QkMwm', 1, 'Admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
