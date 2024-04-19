-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 02:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studiofoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'public/gambar/AzQs91PMSKosYeE9bEF0Y0e1VdO7BZjOF458LKfW.jpg', '2023-10-10 20:03:28', '2023-10-10 20:19:00'),
(8, 'public/gambar/PqwAp3tcBcntjGe9dp5JVkcnIj6qlPI6j1WFciQu.jpg', '2023-11-17 18:31:19', '2023-11-17 18:31:19'),
(9, 'public/gambar/cIaseSaHSPkEPkcS2VSTE9wB0EEr2ntvdZvcCVEN.jpg', '2023-11-17 18:31:40', '2023-11-17 18:31:40'),
(10, 'public/gambar/b0s3VLh5Akcn5wUjDza5GdAmlvApB13LbskvXJlZ.jpg', '2023-11-17 18:31:48', '2023-11-17 18:31:48'),
(11, 'public/gambar/SU7f0qe6X9M4h2JIblBfcSaGGTTOWWuOPq8AqjFf.jpg', '2023-11-17 18:32:00', '2023-11-17 18:32:00'),
(12, 'public/gambar/SFhE0gWp4nrWkQ9hLFwvCuHVNlQhFI2j5DAS5ma2.jpg', '2023-11-17 18:32:17', '2023-11-17 18:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `jasas`
--

CREATE TABLE `jasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasas`
--

INSERT INTO `jasas` (`id`, `gambar`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(4, '1713169861.jpg', 'Foto Group', 'Berfoto dengan\r\nteman teman mu dengan seru!', 45000.00, '2024-04-15 00:31:01', '2024-04-15 16:22:20'),
(5, '1713169931.jpg', 'Foto Keluarga', 'Ayo foto dengan keluarga\r\nagar mendapat kenangan yang bagus!', 50000.00, '2024-04-15 00:32:12', '2024-04-15 00:32:20'),
(6, '1713169966.jpg', 'Foto Sendirian', 'Berfoto sendirian dengan\r\nharga yang terjangkau', 15000.00, '2024-04-15 00:32:46', '2024-04-15 00:32:46'),
(7, '1713169992.jpg', 'Foto untuk bisnis', 'Foto untuk produk bisnis anda\r\natau keperluan bisnis lainnya', 60000.00, '2024-04-15 00:33:12', '2024-04-15 00:33:12'),
(8, '1713228517.jpg', 'Foto Keluarga 2', 'Foto Keluarga 2', 20000.00, '2024-04-15 16:48:37', '2024-04-15 16:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_02_083002_add_username_to_users', 2),
(7, '2023_10_02_095208_create_images_table', 3),
(8, '2023_10_10_030537_add_role_to_users', 4),
(9, '2023_10_10_133411_add_role_to_users', 5),
(10, '2023_10_10_134712_create_galleries_table', 6),
(11, '2023_10_11_030602_create_galleries_table', 7),
(12, '2023_10_11_043315_add_role_to_users', 8),
(13, '2024_03_30_123941_create_contents_table', 9),
(15, '2024_04_13_123824_create_jasas_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Muhammad Rasya Asy-Syifa', 'muhammadrasyaasysyifa@gmail.com', 'Rasya', NULL, '$2y$10$Wn/b9heHOw2zOgLSk0LX6.A0QxBWw081xvOHptSF7XyfyxIr/yUNG', 'a69zGyz3BkgEXLIVEXZFlzMdxt5cKUava3nKvwUSmnL1nJ9SNuGm4jjknYIo', '2023-09-29 18:18:12', '2023-10-02 01:11:47', 'admin'),
(4, 'rasya', 'muhammadrasya@gmail.com', NULL, NULL, '$2y$10$0hhlI3eWiqXK0ZiTAZ5XQeQJRK3zvPLwBsml.VFSTvCyK/K.n27Mq', NULL, '2024-03-25 17:17:34', '2024-03-25 17:17:34', 'user'),
(5, 'pengguna', 'pengguna@gmail.com', NULL, NULL, '$2y$10$epXL.bv2XgaAPo9iPQAaiOdPnmmSKPAudupv8NmKCOqJeiQ/iF8uS', '9c5m6esWXyDYsnziVtIoeZdZ5rWFgNmelvKAc2sYUkfa0zPgYT6lJ3tlcxvt', '2024-03-29 05:26:53', '2024-03-30 04:20:44', 'user'),
(6, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$.1rQ3w74tXJqCFFZpRepeOvQBxe.kvgkTi8tiTYhSH9FOrEumS4JO', NULL, '2024-03-29 05:27:49', '2024-04-15 16:46:36', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasas`
--
ALTER TABLE `jasas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jasas`
--
ALTER TABLE `jasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
