-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampul_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul_buku_belakang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `rak_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buku_rak_id_foreign` (`rak_id`),
  KEY `buku_category_id_foreign` (`category_id`),
  CONSTRAINT `buku_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `buku_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `isbn`, `tahun`, `sampul_buku`, `sampul_buku_belakang`, `stok`, `rak_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19,	'Prakitan Komputer Kelas X',	NULL,	'MEDIATAM',	'9766023992621',	'2016',	'img-foto-sampul-buku/IUhPIM5HMBYEcp918iR7r08U7mIvGyo4GJKPm0u3.jpg',	'img-foto-sampul-buku/8qOh2zif9Qzz5TDfQGpsKz5pQ4da4yXkZLFjPOOi.jpg',	12,	3,	1,	'2024-07-02 04:23:45',	'2024-07-02 04:23:45',	NULL),
(20,	'Administrasi Sistem Jaringan Kelas XII',	NULL,	'ERLANGGA',	'9786023992768',	'2013',	'img-foto-sampul-buku/lIpm2MqwChUIFPugPyhMvTzcUSLK90zDfnbnOUIs.jpg',	'img-foto-sampul-buku/vjKF7HhTt1HxvlyLiU9PWclBB78HT3TrRuDKIiVA.jpg',	12,	1,	1,	'2024-07-02 06:19:47',	'2024-07-02 06:19:47',	NULL),
(21,	'Jaringan Dasar Kelas X',	NULL,	'MEDIATAMA',	'9786063992768',	'2016',	'img-foto-sampul-buku/ADeNU9DRGFmFTt4YjzmNdZ07E0aNHQsn3FX5TgnQ.jpg',	'img-foto-sampul-buku/Ug4QTtGpdT6fQN77jz8z2P2wpHkWANhWw9CroREI.jpg',	12,	1,	1,	'2024-07-02 07:12:58',	'2024-07-02 07:12:58',	NULL),
(22,	'Simulasi digital Kelas X',	NULL,	'MEDIATAMA',	'9786023992553',	'2016',	'img-foto-sampul-buku/zKJYd51Juvd6OUAh7aFfNpZMPgyjMwmNdx2BcP9W.jpg',	'img-foto-sampul-buku/hnH4zga8ODbrDHK2SOF66gSl9LzLUfPIBuscKdxu.jpg',	12,	1,	1,	'2024-07-02 07:15:06',	'2024-07-02 07:15:06',	NULL),
(23,	'Keterampilan Komputer dan Pengelolahan Informasi XII',	NULL,	'ERLANGGA',	'139786022416661',	'2006',	'img-foto-sampul-buku/516iJEaB1Bj9498jK6xuydCSFbmGx8pYKaf4fvg2.jpg',	'img-foto-sampul-buku/NdxXvn4yK8ebvadJTLXRPuH151PW6nGMS5jInfGH.jpg',	12,	1,	1,	'2024-07-02 07:17:09',	'2024-07-02 07:17:09',	NULL),
(24,	'Dasar Desain Grafis kelas X',	NULL,	'ERLANGGA',	NULL,	'2013',	'img-foto-sampul-buku/gqupU4mVOy2FD34oqr3bKwHqmUIzr3wTtJsXaWGa.jpg',	'img-foto-sampul-buku/5Ra7Lbga845Ck5GAJjHRgOcbZxpHqrEzYVLZkLWn.jpg',	12,	1,	1,	'2024-07-02 09:15:49',	'2024-07-02 09:23:54',	NULL),
(25,	'Etika Profesi Kelas X',	NULL,	'MEDIATAMA',	NULL,	NULL,	'img-foto-sampul-buku/P5j1ijwcf5SonqZTmGGPN4AVbO1wJe4wtC3tfuOc.jpg',	'img-foto-sampul-buku/Z9LeEcC4p6ThN3GF44XxVoaBnIxCRLe0SrEkFCjk.jpg',	12,	2,	2,	'2024-07-02 09:16:42',	'2024-07-02 09:16:42',	NULL);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Teknik Informasi',	'2024-05-17 03:18:45',	'2024-07-02 04:14:37',	NULL),
(2,	'Bisnis dan Manajemen',	'2024-05-17 03:18:56',	'2024-07-02 04:14:56',	NULL),
(3,	'Umum',	'2024-05-22 15:58:26',	'2024-07-02 04:15:02',	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_03_21_160558_create_rak_table',	1),
(6,	'2024_03_21_160613_create_category_table',	1),
(7,	'2024_03_21_160743_create_buku_table',	1),
(8,	'2024_03_24_081429_create_murid_table',	1),
(9,	'2024_04_20_204811_create_pinjam_buku_table',	1),
(10,	'2024_05_22_192639_create_pengembalian_buku_table',	2);

DROP TABLE IF EXISTS `murid`;
CREATE TABLE `murid` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `murid_user_id_foreign` (`user_id`),
  CONSTRAINT `murid_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `murid` (`id`, `nama`, `no_telepon`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Budi Santoso',	'38363383729',	'Voluptates sed proid',	'1985-04-04',	'Laki-Laki',	4,	'2024-05-17 03:21:15',	'2024-05-30 07:19:25',	NULL),
(2,	'Taufik Hidayat',	'627287282287',	'Duis id quas ipsa s',	'1973-08-27',	'Perempuan',	5,	'2024-05-22 16:02:51',	'2024-05-30 07:18:54',	NULL),
(3,	'Siti Nurhaliza',	'6829027262728290',	'Eos maiores labore u',	'1970-02-15',	'Laki-Laki',	3,	'2024-05-22 16:02:57',	'2024-05-30 07:19:18',	NULL),
(6,	'Ibrahim',	'08969696',	'asdasdadas',	'2005-09-09',	'Laki-Laki',	7,	'2024-07-02 22:39:12',	'2024-07-02 22:39:12',	NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pengembalian_buku`;
CREATE TABLE `pengembalian_buku` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `buku_id` bigint unsigned NOT NULL,
  `murid_id` bigint unsigned NOT NULL,
  `jumlah_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_di_kembalikan` date NOT NULL,
  `jumlah_denda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengembalian_buku_buku_id_foreign` (`buku_id`),
  KEY `pengembalian_buku_murid_id_foreign` (`murid_id`),
  CONSTRAINT `pengembalian_buku_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengembalian_buku_murid_id_foreign` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pengembalian_buku` (`id`, `buku_id`, `murid_id`, `jumlah_pinjam`, `tanggal_pinjam`, `tanggal_di_kembalikan`, `jumlah_denda`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24,	19,	3,	'1',	'2024-06-30',	'2024-07-07',	'0',	'0',	'2024-07-02 06:36:29',	'2024-07-02 06:36:29',	NULL),
(25,	20,	2,	'1',	'2024-06-19',	'2024-06-26',	'6000',	'0',	'2024-07-02 06:35:33',	'2024-07-02 06:35:51',	NULL),
(26,	20,	1,	'1',	'2024-06-21',	'2024-06-28',	'0',	'0',	'2024-07-02 06:36:44',	'2024-07-02 06:36:44',	NULL),
(27,	20,	2,	'1',	'2024-06-18',	'2024-06-25',	'0',	'0',	'2024-07-02 06:36:51',	'2024-07-02 06:36:51',	NULL);

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pinjam_buku`;
CREATE TABLE `pinjam_buku` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `buku_id` bigint unsigned NOT NULL,
  `murid_id` bigint unsigned NOT NULL,
  `jumlah_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_di_kembalikan` date NOT NULL,
  `jumlah_denda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pinjam_buku_buku_id_foreign` (`buku_id`),
  KEY `pinjam_buku_murid_id_foreign` (`murid_id`),
  CONSTRAINT `pinjam_buku_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pinjam_buku_murid_id_foreign` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pinjam_buku` (`id`, `buku_id`, `murid_id`, `jumlah_pinjam`, `tanggal_pinjam`, `tanggal_di_kembalikan`, `jumlah_denda`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24,	19,	3,	'1',	'2024-06-30',	'2024-07-07',	'0',	'1',	'2024-07-02 06:34:47',	'2024-07-02 06:36:29',	NULL),
(25,	20,	2,	'1',	'2024-06-19',	'2024-06-26',	'0',	'1',	'2024-07-02 06:35:11',	'2024-07-02 06:35:33',	NULL),
(26,	20,	1,	'1',	'2024-06-21',	'2024-06-28',	'0',	'1',	'2024-07-02 06:36:06',	'2024-07-02 06:36:43',	NULL),
(27,	20,	2,	'1',	'2024-06-18',	'2024-06-25',	'0',	'1',	'2024-07-02 06:36:18',	'2024-07-02 06:36:51',	NULL),
(29,	25,	3,	'1',	'2024-06-28',	'2024-07-05',	'0',	'0',	'2024-07-02 10:52:42',	'2024-07-02 10:52:42',	NULL),
(30,	21,	2,	'1',	'2024-06-16',	'2024-06-23',	'0',	'0',	'2024-07-02 10:52:55',	'2024-07-02 10:52:55',	NULL),
(33,	21,	6,	'1',	'2024-07-01',	'2024-07-08',	'0',	'0',	'2024-07-02 22:39:29',	'2024-07-02 22:39:29',	NULL),
(34,	25,	6,	'1',	'2024-06-17',	'2024-06-24',	'0',	'0',	'2024-07-02 22:39:44',	'2024-07-02 22:39:44',	NULL);

DROP TABLE IF EXISTS `rak`;
CREATE TABLE `rak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rak` (`id`, `nama`, `lantai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'rak 1',	'1',	'2024-05-17 03:18:23',	'2024-05-17 03:18:23',	NULL),
(2,	'rak 2',	'2',	'2024-05-17 03:18:30',	'2024-05-17 03:18:30',	NULL),
(3,	'rak 3',	'3',	'2024-05-22 15:58:14',	'2024-05-22 15:58:14',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Admin',	'admin@gmail.com',	1,	NULL,	'$2y$10$2Bx6qztdYPwhW.Dllh/6DuDcOObtCwbEcrF1eCXRBSv0M8gj2oztS',	NULL,	'2024-05-17 03:14:41',	'2024-05-17 03:14:41',	NULL),
(3,	'Siti Nurhaliza',	'fanagylatu@mailinator.com',	0,	NULL,	'$2y$10$LqRefl8K2OXkjWHzwcj7AO5SebahmC54bLFE4gR1KAzw7SDz9O1W.',	NULL,	'2024-05-22 16:00:18',	'2024-05-30 07:17:18',	NULL),
(4,	'Budi Santoso',	'jolum@mailinator.com',	0,	NULL,	'$2y$10$HSP4UWT8eW.6TeNPL7LGUOuLEp1H1k8EOVmWVOitzLKK0Q7EJvb7y',	NULL,	'2024-05-22 16:00:31',	'2024-05-30 07:17:35',	NULL),
(5,	'Taufik Hidayat',	'teny@mailinator.com',	0,	NULL,	'$2y$10$z.JeqZ2UqB/ug13Fq.MuJ.zHxirDy1JE6ve/XBua2jiVG2isNAyNC',	NULL,	'2024-05-22 16:00:39',	'2024-05-30 07:17:55',	NULL),
(7,	'Ibrahim',	'user1@gmail.com',	0,	NULL,	'$2y$10$lwnqDh7k.U7nsRS7DXqO5ecyBYi6Ti0s9ZkCE.WUdHpIu7N2Mz.f2',	NULL,	'2024-07-02 22:38:43',	'2024-07-02 22:38:43',	NULL);

-- 2024-07-04 05:22:32
