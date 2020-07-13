-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.12-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ta-denol.auto_numbers
CREATE TABLE IF NOT EXISTS `auto_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.auto_numbers: ~5 rows (approximately)
/*!40000 ALTER TABLE `auto_numbers` DISABLE KEYS */;
REPLACE INTO `auto_numbers` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
	(1, 'fa231719a0df0035d9402eb9f63031df', 3, '2020-07-08 08:28:28', '2020-07-08 08:36:35'),
	(2, 'fbcc06bae5b44c4053ad289fd2487168', 2, '2020-07-08 08:40:30', '2020-07-08 08:51:21'),
	(3, 'ca1018cdfd7f489762f80b434c1cbc64', 5, '2020-07-08 08:40:30', '2020-07-08 08:51:21'),
	(4, '8a552ab80ef08a066047db4d4fcdf253', 5, '2020-07-08 09:00:30', '2020-07-08 09:01:04'),
	(5, '66e8e442cbd64e3a10b02e87606b4d0e', 7, '2020-07-08 09:11:42', '2020-07-08 14:49:50');
/*!40000 ALTER TABLE `auto_numbers` ENABLE KEYS */;

-- Dumping structure for table ta-denol.dasar
CREATE TABLE IF NOT EXISTS `dasar` (
  `kd_dasar` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dasar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_dasar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.dasar: ~4 rows (approximately)
/*!40000 ALTER TABLE `dasar` DISABLE KEYS */;
REPLACE INTO `dasar` (`kd_dasar`, `nama_dasar`, `created_at`, `updated_at`) VALUES
	('dasar', 'listrik', NULL, NULL),
	('Dasar.01', 'Jasa Kerja langsung', '2020-07-08 09:00:30', '2020-07-08 09:00:30'),
	('Dasar.02', 'luas lahan', '2020-07-08 09:00:30', '2020-07-08 09:00:30'),
	('Dasar.03', 'jam mesin', '2020-07-08 09:01:03', '2020-07-08 09:01:03');
/*!40000 ALTER TABLE `dasar` ENABLE KEYS */;

-- Dumping structure for table ta-denol.departemen
CREATE TABLE IF NOT EXISTS `departemen` (
  `kd_dp` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_dp` enum('Jasa','Produksi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_dp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.departemen: ~2 rows (approximately)
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
REPLACE INTO `departemen` (`kd_dp`, `jenis_dp`, `created_at`, `updated_at`) VALUES
	('DP001', 'Jasa', '2020-07-08 08:40:30', '2020-07-08 08:40:30'),
	('DP002', 'Produksi', '2020-07-08 08:51:21', '2020-07-08 08:51:21');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;

-- Dumping structure for table ta-denol.detail_depar
CREATE TABLE IF NOT EXISTS `detail_depar` (
  `kd_detail_dep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_detail_dep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kos_awal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_detail_dep`),
  KEY `detail_depar_kode_foreign` (`kode`),
  CONSTRAINT `detail_depar_kode_foreign` FOREIGN KEY (`kode`) REFERENCES `departemen` (`kd_dp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.detail_depar: ~5 rows (approximately)
/*!40000 ALTER TABLE `detail_depar` DISABLE KEYS */;
REPLACE INTO `detail_depar` (`kd_detail_dep`, `kode`, `nama_detail_dep`, `kos_awal`, `created_at`, `updated_at`) VALUES
	('Dt.DP001', 'DP001', 'jasa a', 80000, '2020-07-08 08:40:30', '2020-07-08 08:40:30'),
	('Dt.DP002', 'DP001', 'jasa b', 61000, '2020-07-08 08:40:30', '2020-07-08 08:40:30'),
	('Dt.DP003', 'DP001', 'jasa c', 70000, '2020-07-08 08:40:30', '2020-07-08 08:40:30'),
	('Dt.DP004', 'DP002', 'produksi 1', 70000, '2020-07-08 08:51:21', '2020-07-08 08:51:21'),
	('Dt.DP005', 'DP002', 'produksi 2', 80000, '2020-07-08 08:51:21', '2020-07-08 08:51:21');
/*!40000 ALTER TABLE `detail_depar` ENABLE KEYS */;

-- Dumping structure for table ta-denol.det_dasar
CREATE TABLE IF NOT EXISTS `det_dasar` (
  `kd_detail_dasar` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beban_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detaildep_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkl` int(11) NOT NULL,
  `lh` int(11) NOT NULL,
  `jm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_detail_dasar`),
  KEY `det_dasar_beban_id_foreign` (`beban_id`),
  KEY `det_dasar_detaildep_id_foreign` (`detaildep_id`),
  KEY `det_dasar_pt_id_foreign` (`pt_id`),
  CONSTRAINT `det_dasar_beban_id_foreign` FOREIGN KEY (`beban_id`) REFERENCES `dasar` (`kd_dasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `det_dasar_detaildep_id_foreign` FOREIGN KEY (`detaildep_id`) REFERENCES `detail_depar` (`kd_detail_dep`) ON DELETE CASCADE,
  CONSTRAINT `det_dasar_pt_id_foreign` FOREIGN KEY (`pt_id`) REFERENCES `pt` (`kd_pt`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.det_dasar: ~5 rows (approximately)
/*!40000 ALTER TABLE `det_dasar` DISABLE KEYS */;
REPLACE INTO `det_dasar` (`kd_detail_dasar`, `beban_id`, `detaildep_id`, `pt_id`, `jkl`, `lh`, `jm`, `created_at`, `updated_at`) VALUES
	('Dt.Ds001', 'Dasar.02', 'Dt.DP001', 'PT.03', 300, 800, 400, '2020-07-08 09:12:50', '2020-07-08 09:12:50'),
	('Dt.Ds002', 'Dasar.01', 'Dt.DP002', 'PT.03', 400, 500, 200, '2020-07-08 09:13:21', '2020-07-08 09:13:21'),
	('Dt.Ds003', 'Dasar.03', 'Dt.DP003', 'PT.03', 500, 600, 400, '2020-07-08 09:14:31', '2020-07-08 09:14:31'),
	('Dt.Ds004', 'Dasar.01', 'Dt.DP004', 'PT.03', 300, 400, 500, '2020-07-08 09:11:42', '2020-07-08 09:11:42'),
	('Dt.Ds005', 'Dasar.03', 'Dt.DP005', 'PT.03', 200, 300, 400, '2020-07-08 09:12:23', '2020-07-08 09:12:23');
/*!40000 ALTER TABLE `det_dasar` ENABLE KEYS */;

-- Dumping structure for table ta-denol.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ta-denol.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(28, '2014_10_12_000000_create_users_table', 1),
	(29, '2014_10_12_100000_create_password_resets_table', 1),
	(30, '2017_08_03_055212_create_auto_numbers', 1),
	(31, '2019_08_19_000000_create_failed_jobs_table', 1),
	(32, '2020_06_09_140632_create_pt_table', 1),
	(33, '2020_06_10_032630_create_departemen_table', 1),
	(34, '2020_06_11_061455_create_dasar_table', 1),
	(35, '2020_06_12_210225_create_detail_depar_table', 1),
	(36, '2020_06_26_211312_create_det_dasar_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ta-denol.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ta-denol.pt
CREATE TABLE IF NOT EXISTS `pt` (
  `kd_pt` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelp_pt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_pt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.pt: ~2 rows (approximately)
/*!40000 ALTER TABLE `pt` DISABLE KEYS */;
REPLACE INTO `pt` (`kd_pt`, `nama_pt`, `alamat_pt`, `noTelp_pt`, `created_at`, `updated_at`) VALUES
	('PT.02', 'budi jaya1', 'bantul', 62358758, '2020-07-08 08:33:36', '2020-07-08 08:33:36'),
	('PT.03', 'budi jaya2', 'bantul', 908765, '2020-07-08 08:36:35', '2020-07-08 08:36:35');
/*!40000 ALTER TABLE `pt` ENABLE KEYS */;

-- Dumping structure for table ta-denol.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ta-denol.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'ganteng', 'kasep@kasep.com', NULL, '$2y$10$XkxnBrjRkQpw.AuBj8Edr.sk4nknLFagJWfHeUo2bRdNlKH2VQbXO', NULL, '2020-07-07 23:35:44', '2020-07-07 23:35:44'),
	(2, 'deni', 'dennyh706@gmail.com', NULL, '$2y$10$9Jhpqn5NgDkAGUeyNazkn.EAytR5pcgMXb0W1oG.CWFhXZ4JUTZSW', NULL, '2020-07-08 08:27:19', '2020-07-08 08:27:19'),
	(3, 'papiyot', 'admin@email.com', NULL, '$2y$10$xw2mhewSPgLCsCsz0ZZblucfC.liCIJlTdWHjE6Yow5egqt9MJ.Ge', NULL, '2020-07-09 16:58:05', '2020-07-09 16:58:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
