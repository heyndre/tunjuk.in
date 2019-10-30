-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 09:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunjuk_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `created_at`, `updated_at`, `category_name`) VALUES
(1, '2019-10-17 14:01:59', '2019-10-17 14:06:44', 'KategoriBaru2'),
(2, '2019-10-18 01:59:21', '2019-10-18 01:59:21', 'Kategori 2');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_atas` int(11) NOT NULL,
  `tarif_bawah` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `created_at`, `updated_at`, `nama`, `image`, `alamat`, `kecamatan`, `kode_pos`, `kota`, `latitude`, `longitude`, `tarif_atas`, `tarif_bawah`, `deskripsi`, `verified`) VALUES
(1, '2019-10-16 13:02:08', '2019-10-16 13:02:08', 'Bandung Permai', '1571230928bp.jpg', 'Jl. Hayam Wuruk 38', 'Kaliwates', '66184', 'Jember', '-8.1840401', '113.6666162', 500000, 170000, 'Bandung Permai merupakan salah satu hotel yang terlah berdiri sejak awal perkembangan Jember menjadi kota.', 1),
(2, '2019-10-16 14:33:24', '2019-10-16 14:38:25', 'AAA', '1571236404hotel-1.jpg', 'A', 'Ambulu', 'A', 'Jember', 'A', 'A', 1, 0, 'iafbafoaulwbjf;oalfjawfbj', 1),
(3, '2019-10-18 06:33:39', '2019-10-18 06:33:39', 'Hotel Baru', '1571380418hotel-3.jpg', 'Jl. Hayam Wuruk 38', 'Kencong', '68131', 'Jember', '-118', '116', 500000, 100000, 'Deskripsi hotel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_comments`
--

CREATE TABLE `hotel_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `tanggal_visitasi` date NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_comments`
--

INSERT INTO `hotel_comments` (`id`, `created_at`, `updated_at`, `user_id`, `hotel_id`, `approved`, `tanggal_visitasi`, `judul`, `detail`) VALUES
(1, '2019-10-27 15:55:12', '2019-10-29 17:36:12', 2, 3, 0, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru'),
(2, '2019-10-27 15:55:49', '2019-10-29 19:31:57', 2, 3, 1, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru'),
(3, '2019-10-27 15:59:54', '2019-10-29 17:39:23', 2, 3, 0, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru'),
(4, '2019-10-27 16:00:07', '2019-10-27 16:00:07', 2, 3, 1, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru'),
(5, '2019-10-27 16:07:07', '2019-10-27 16:07:07', 2, 3, 1, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru'),
(7, '2019-10-27 16:08:20', '2019-10-29 19:37:16', 2, 3, 1, '2019-10-08', 'Cukup memuaskan', 'Saya mendapat pengalaman baru di hotel baru');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `created_at`, `updated_at`, `nama_kecamatan`) VALUES
(1, NULL, NULL, 'Ajung'),
(2, NULL, NULL, 'Ambulu'),
(3, NULL, NULL, 'Arjasa'),
(4, NULL, NULL, 'Bangsalsari'),
(5, NULL, NULL, 'Balung'),
(6, NULL, NULL, 'Gumukmas'),
(7, NULL, NULL, 'Jelbuk'),
(8, NULL, NULL, 'Jengawah'),
(9, NULL, NULL, 'Jombang'),
(10, NULL, NULL, 'Kalisat'),
(11, NULL, NULL, 'Kaliwates'),
(12, NULL, NULL, 'Kencong'),
(13, NULL, NULL, 'Ledokombo'),
(14, NULL, NULL, 'Mayang'),
(15, NULL, NULL, 'Mumbulsari'),
(16, NULL, NULL, 'Panti'),
(17, NULL, NULL, 'Pakusari'),
(18, NULL, NULL, 'Patrang'),
(19, NULL, NULL, 'Puger'),
(20, NULL, NULL, 'Rambipuji'),
(21, NULL, NULL, 'Semboro'),
(22, NULL, NULL, 'Sumberbaru'),
(23, NULL, NULL, 'Sumberjambe'),
(24, NULL, NULL, 'Sumbersari'),
(25, NULL, NULL, 'Tanggul'),
(26, NULL, NULL, 'Tempurejo'),
(27, NULL, NULL, 'Umbulsari'),
(28, NULL, NULL, 'Wuluhan');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_atas` int(11) NOT NULL,
  `tarif_bawah` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id`, `created_at`, `updated_at`, `nama`, `image`, `alamat`, `kecamatan`, `kode_pos`, `kota`, `latitude`, `longitude`, `tarif_atas`, `tarif_bawah`, `deskripsi`, `verified`) VALUES
(1, NULL, NULL, 'Rumah Makan', NULL, 'Alamat', 'Kecamatan', 'Kode Pos', 'Kota', 'Latitude', 'Longitude', 1, 0, 'Deskripsi', 0),
(2, '2019-10-16 14:57:14', '2019-10-17 04:46:53', 'Rumah Makan A', '1571237834restaurant-1.jpg', 'A', 'Arjasa', 'A', 'Jember', 'A', 'A', 500000, 170000, 'aifkanfljabfna;ojl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kuliner_comments`
--

CREATE TABLE `kuliner_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kuliner_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `tanggal_visitasi` date NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_10_16_140449_create_kecamatan_table', 1),
(10, '2019_10_08_091120_create_hotel_table', 1),
(11, '2019_10_12_093731_hotel_images', 1),
(12, '2019_10_16_122403_create_kuliner_table', 1),
(13, '2019_10_16_215610_kuliner_images', 2),
(14, '2019_10_17_124410_create_category_table', 3),
(15, '2019_10_17_125136_create_wisata_table', 4),
(16, '2019_10_18_082435_wisata_images', 5),
(18, '2019_10_27_115332_create_hotel_comments_table', 6),
(19, '2019_10_30_024313_create_wisata_comments_table', 7),
(20, '2019_10_30_024526_create_kuliner_comments_table', 7);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privileged` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `privileged`) VALUES
(1, 'Andreas', 'andre@tunjuk.in', NULL, '$2y$10$daTEwBn0fH3t2mRoEcUWlOw5sNs65cEJIBZZa5gpafifWO7MX8iI2', NULL, '2019-10-08 00:58:22', '2019-10-08 00:58:22', 1),
(2, 'User Utama', 'User@tunjuk.in', NULL, '$2y$10$aXpyP1zPyb8J2Vx10O5UjujIuF4g0HqzTxf94ahdxWasiKF7Hhs5S', NULL, '2019-10-08 01:41:58', '2019-10-08 01:41:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_atas` int(11) NOT NULL,
  `tarif_bawah` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `created_at`, `updated_at`, `nama`, `image`, `alamat`, `kecamatan`, `kode_pos`, `kota`, `latitude`, `longitude`, `tarif_atas`, `tarif_bawah`, `deskripsi`, `category_id`, `verified`) VALUES
(1, '2019-10-18 01:41:13', '2019-10-18 02:06:01', 'Wisata A', '1571362873image_6.jpg', 'Wisata A', 'Gumukmas', '68131', 'Jember', '-118.22235', '8.12225', 5000, 1000, 'wisata a murah', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wisata_comments`
--

CREATE TABLE `wisata_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `tanggal_visitasi` date NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_comments_user_id_foreign` (`user_id`),
  ADD KEY `hotel_comments_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuliner_comments`
--
ALTER TABLE `kuliner_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuliner_comments_user_id_foreign` (`user_id`),
  ADD KEY `kuliner_comments_kuliner_id_foreign` (`kuliner_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_comments`
--
ALTER TABLE `wisata_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisata_comments_user_id_foreign` (`user_id`),
  ADD KEY `wisata_comments_wisata_id_foreign` (`wisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kuliner_comments`
--
ALTER TABLE `kuliner_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisata_comments`
--
ALTER TABLE `wisata_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD CONSTRAINT `hotel_comments_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuliner_comments`
--
ALTER TABLE `kuliner_comments`
  ADD CONSTRAINT `kuliner_comments_kuliner_id_foreign` FOREIGN KEY (`kuliner_id`) REFERENCES `kuliner` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kuliner_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wisata_comments`
--
ALTER TABLE `wisata_comments`
  ADD CONSTRAINT `wisata_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wisata_comments_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
