-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2024 at 08:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul_buku_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `rak_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `isbn`, `tahun`, `sampul_buku`, `sampul_buku_belakang`, `stok`, `rak_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Architecto voluptati', '32', '74', 'img-foto-sampul-buku/lXzBMm8q10vB19MiwvQApVLjf7rpAdaqmIr4KDnu.jpg', 'img-foto-sampul-buku/PFFmHaGwo5BTavMAV7GOBncagoVEDDc6phpfDIOi.jpg', 87, 1, 2, '2024-05-17 03:19:23', '2024-06-12 12:50:52', NULL),
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Blanditiis ducimus', '100', '62', 'img-foto-sampul-buku/drCRw2jw3P861rgCM9Bqv9qzF0gcf8NKnqGqJ2JK.jpg', '', 2, 1, 2, '2024-05-17 03:20:59', '2024-05-30 07:21:05', NULL),
(3, 'Marmut Merah Jambu', 'Raditya Dika', 'Esse sit alias mole', '33', '79', 'img-foto-sampul-buku/ZiVqIaK4vqpSupEytC1fNmIzlHx35xzgGjiL3VTo.jpg', '', 48, 1, 3, '2024-05-22 15:58:51', '2024-05-30 07:24:41', NULL),
(4, 'Orang-Orang Biasa', 'Andrea Hirata', 'Fugit temporibus nu', '87', '39', 'img-foto-sampul-buku/8rTXzTSVEGk4fWV9WXZgv0cT1LzKlGJTxDCaFUGC.jpg', '', 69, 1, 3, '2024-05-22 15:59:11', '2024-05-30 07:24:58', NULL),
(5, '9 Summers 10 Autumns', 'Iwan Setyawan', 'Provident est ipsa', '96', '42', 'img-foto-sampul-buku/q58NxiuDQlFp0lDV78orshsPBVpbdvMj5seYFcgy.jpg', '', 31, 1, 2, '2024-05-22 15:59:30', '2024-05-30 07:25:18', NULL),
(6, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Delectus non est re', '27', '43', 'img-foto-sampul-buku/1Gis449oSY9n9F0pWcrC06FF4SOlr0kzvPRt62dv.jpg', '', 48, 2, 2, '2024-05-23 07:10:12', '2024-05-30 07:21:48', NULL),
(7, 'Hujan', 'Tere Liye', 'Maxime quidem beatae', '38', '42', 'img-foto-sampul-buku/myFgduNA10AObQlP1lQjOcqKG7SMNe8YaLZWz89I.jpg', '', 97, 1, 3, '2024-05-23 07:10:37', '2024-05-30 07:22:06', NULL),
(8, 'Dilan: Dia adalah Dilanku Tahun 1990', 'Pidi Baiq', 'Consequatur Sit dol', '21', '12', 'img-foto-sampul-buku/AnqwsJO6nA7X3stv3H4RyOuts9Ax0ztKvutDd3sO.jpg', '', 66, 3, 3, '2024-05-23 07:11:13', '2024-05-30 07:22:30', NULL),
(9, 'Filosofi Kopi', 'Dewi Lestari (Dee)', 'Veniam cum et iure', '14', '64', 'img-foto-sampul-buku/la90lKcPeUJMXZFpLjrlATVtTUQg8GLT8eftsUt3.jpg', '', 29, 3, 3, '2024-05-23 07:14:18', '2024-05-30 07:22:53', NULL),
(10, 'Perahu Kertas', 'Dewi Lestari (Dee)', 'Excepteur distinctio', '80', '89', 'img-foto-sampul-buku/0TTgIhWXR6CeUIRnxBnrdHMp6y3abhpbVXbpkgk6.jpg', '', 69, 1, 3, '2024-05-23 07:14:28', '2024-05-30 07:23:19', NULL),
(11, 'Manjali dan Cakrabirawa', 'Ayu Utami', 'Corporis dignissimos', '9', '26', 'img-foto-sampul-buku/iiasA6Y3KAmCuN58NNWZT06ORcpUaUKVX9dsmjEg.jpg', '', 72, 1, 3, '2024-05-23 07:14:41', '2024-05-30 07:26:11', NULL),
(12, 'Raja, Penyair dan Tiga Perempuan', 'Kuntowijoyo', 'Cupidatat aliquip co', '37', '83', 'img-foto-sampul-buku/8lfkqPpZKs8H1FvtqNUGJ1BNWUVA6bsCAaMukeMu.jpg', '', 94, 2, 3, '2024-05-23 07:14:52', '2024-05-30 07:27:45', NULL),
(13, 'Galaksi Kinanthi', 'Tasaro GK', 'Eaque cillum consequ', '45', '1', 'img-foto-sampul-buku/tHFRUBVohWBKrB793dcRCQVF4h5jS8l04RnStvM9.jpg', '', 10, 1, 3, '2024-05-23 07:15:04', '2024-05-30 07:27:23', NULL),
(14, 'Rahvayana: Aku Lala Padamu', 'Sujiwo Tejo', 'Ut nihil similique e', '21', '86', 'img-foto-sampul-buku/Vun1BDY20oe2UyHrjlhs68IRUmYreZ4loFpqnTj4.jpg', '', 77, 3, 3, '2024-05-23 07:15:17', '2024-05-30 07:27:03', NULL),
(15, 'Kerumunan Terakhir', 'Okky Madasari', 'Quo reprehenderit eo', '97', '30', 'img-foto-sampul-buku/YK4RNt5dRrgUQFzg88zpP70Aab3pv7yKc4jB59t4.jpg', '', 67, 2, 1, '2024-05-23 07:15:59', '2024-05-30 07:26:33', NULL),
(16, '22', '22', '22', '22', '222', 'img-foto-sampul-buku/xkZVeRyW3Cq2Ghdh9lXVWWHhEWMgSM8WometewFh.jpg', '', 22, 1, 1, '2024-06-12 12:40:16', '2024-06-12 12:41:04', NULL),
(17, 'Similique nostrud om', 'Est ut ipsa similiq', 'Sed irure officia do', '39', '19', 'img-foto-sampul-buku/AnCmNHEW6rIAzdqvCeN5rVSC9bK9g6dvyyDCKhGa.jpg', '', 3, 2, 1, '2024-06-12 12:41:28', '2024-06-12 12:41:28', NULL),
(18, 'Molestias do commodo', 'Sed assumenda et ull', 'Amet neque nesciunt', '69', '16', 'img-foto-sampul-buku/0Kz7D636wFvCquXtLImSnewBwUZknfabxDdH5TUQ.jpg', 'img-foto-sampul-buku/OJZa2KENRgmuDFGPcMf3sGUrBUvvu6nvoaaaGZe4.jpg', 80, 3, 3, '2024-06-12 12:51:56', '2024-06-12 12:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Novel', '2024-05-17 03:18:45', '2024-05-30 07:28:18', NULL),
(2, 'Misteri', '2024-05-17 03:18:56', '2024-05-30 07:28:31', NULL),
(3, 'Sains dan Teknologi', '2024-05-22 15:58:26', '2024-05-30 07:28:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_21_160558_create_rak_table', 1),
(6, '2024_03_21_160613_create_category_table', 1),
(7, '2024_03_21_160743_create_buku_table', 1),
(8, '2024_03_24_081429_create_murid_table', 1),
(9, '2024_04_20_204811_create_pinjam_buku_table', 1),
(10, '2024_05_22_192639_create_pengembalian_buku_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama`, `no_telepon`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Budi Santoso', '38363383729', 'Voluptates sed proid', '1985-04-04', 'Laki-Laki', 4, '2024-05-17 03:21:15', '2024-05-30 07:19:25', NULL),
(2, 'Taufik Hidayat', '627287282287', 'Duis id quas ipsa s', '1973-08-27', 'Perempuan', 5, '2024-05-22 16:02:51', '2024-05-30 07:18:54', NULL),
(3, 'Siti Nurhaliza', '6829027262728290', 'Eos maiores labore u', '1970-02-15', 'Laki-Laki', 3, '2024-05-22 16:02:57', '2024-05-30 07:19:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `murid_id` bigint UNSIGNED NOT NULL,
  `jumlah_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_di_kembalikan` date NOT NULL,
  `jumlah_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id`, `buku_id`, `murid_id`, `jumlah_pinjam`, `tanggal_pinjam`, `tanggal_di_kembalikan`, `jumlah_denda`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 1, 1, '17', '1976-05-17', '1976-05-24', '17532000', '0', '2024-05-22 15:00:58', '2024-05-23 13:32:57', NULL),
(16, 15, 3, '30', '2024-10-25', '2024-11-01', '0', '0', '2024-05-23 13:33:58', '2024-05-23 13:33:58', NULL),
(17, 3, 2, '39', '2016-02-17', '2016-02-24', '3012000', '17', '2024-05-23 13:34:07', '2024-05-23 14:56:57', NULL),
(18, 11, 1, '77', '2002-11-14', '2002-11-21', '7855000', '0', '2024-05-23 13:34:19', '2024-05-23 14:57:56', NULL),
(19, 11, 1, '42', '2024-05-24', '2024-05-31', '0', '0', '2024-05-23 13:34:30', '2024-05-23 13:34:30', NULL),
(20, 13, 3, '77', '2024-05-01', '2024-05-08', '19000', '0', '2024-05-23 14:16:26', '2024-05-27 00:17:11', NULL),
(23, 4, 2, '2', '2023-12-01', '2023-12-08', '0', '0', '2024-05-30 07:09:56', '2024-05-30 07:09:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `murid_id` bigint UNSIGNED NOT NULL,
  `jumlah_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_di_kembalikan` date NOT NULL,
  `jumlah_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id`, `buku_id`, `murid_id`, `jumlah_pinjam`, `tanggal_pinjam`, `tanggal_di_kembalikan`, `jumlah_denda`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 1, 1, '17', '1976-05-17', '1976-05-24', '0', '1', '2024-05-22 15:00:48', '2024-05-22 15:00:57', NULL),
(16, 15, 3, '30', '2024-10-25', '2024-11-01', '0', '1', '2024-05-23 13:33:10', '2024-05-23 13:33:57', NULL),
(17, 3, 2, '39', '2016-02-17', '2016-02-24', '0', '1', '2024-05-23 13:33:27', '2024-05-23 13:34:07', NULL),
(18, 11, 1, '77', '2002-11-14', '2002-11-21', '0', '1', '2024-05-23 13:33:32', '2024-05-23 13:34:18', NULL),
(19, 11, 1, '42', '2024-05-24', '2024-05-31', '0', '1', '2024-05-23 13:33:42', '2024-05-23 13:34:30', NULL),
(20, 13, 3, '77', '2024-05-01', '2024-05-08', '0', '1', '2024-05-23 14:16:19', '2024-05-23 14:16:26', NULL),
(21, 1, 2, '90', '2024-05-24', '2024-05-31', '0', '0', '2024-05-23 14:34:36', '2024-05-24 12:36:03', '2024-05-24 12:36:03'),
(22, 1, 1, '83', '2024-05-25', '2024-06-01', '0', '0', '2024-05-24 12:33:48', '2024-05-24 12:33:48', NULL),
(23, 4, 2, '2', '2023-12-01', '2023-12-08', '0', '1', '2024-05-30 07:09:46', '2024-05-30 07:09:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `nama`, `lantai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rak 1', '1', '2024-05-17 03:18:23', '2024-05-17 03:18:23', NULL),
(2, 'rak 2', '2', '2024-05-17 03:18:30', '2024-05-17 03:18:30', NULL),
(3, 'rak 3', '3', '2024-05-22 15:58:14', '2024-05-22 15:58:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$2Bx6qztdYPwhW.Dllh/6DuDcOObtCwbEcrF1eCXRBSv0M8gj2oztS', NULL, '2024-05-17 03:14:41', '2024-05-17 03:14:41', NULL),
(2, 'User', 'user@gmail.com', 0, NULL, '$2y$10$AS/B.3Ksq.Qul.JCxzN7xOUZx2ho.fZPk.7EoUtmrJPHCEUhCovDu', NULL, '2024-05-17 03:14:41', '2024-05-17 03:14:41', NULL),
(3, 'Siti Nurhaliza', 'fanagylatu@mailinator.com', 0, NULL, '$2y$10$LqRefl8K2OXkjWHzwcj7AO5SebahmC54bLFE4gR1KAzw7SDz9O1W.', NULL, '2024-05-22 16:00:18', '2024-05-30 07:17:18', NULL),
(4, 'Budi Santoso', 'jolum@mailinator.com', 0, NULL, '$2y$10$HSP4UWT8eW.6TeNPL7LGUOuLEp1H1k8EOVmWVOitzLKK0Q7EJvb7y', NULL, '2024-05-22 16:00:31', '2024-05-30 07:17:35', NULL),
(5, 'Taufik Hidayat', 'teny@mailinator.com', 0, NULL, '$2y$10$z.JeqZ2UqB/ug13Fq.MuJ.zHxirDy1JE6ve/XBua2jiVG2isNAyNC', NULL, '2024-05-22 16:00:39', '2024-05-30 07:17:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_rak_id_foreign` (`rak_id`),
  ADD KEY `buku_category_id_foreign` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murid_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengembalian_buku_buku_id_foreign` (`buku_id`),
  ADD KEY `pengembalian_buku_murid_id_foreign` (`murid_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjam_buku_buku_id_foreign` (`buku_id`),
  ADD KEY `pinjam_buku_murid_id_foreign` (`murid_id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buku_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD CONSTRAINT `pengembalian_buku_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengembalian_buku_murid_id_foreign` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD CONSTRAINT `pinjam_buku_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjam_buku_murid_id_foreign` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
