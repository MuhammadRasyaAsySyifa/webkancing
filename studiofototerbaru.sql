-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 09:38 AM
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
(2, 'public/gambar/uD4ztbPjqHZ5wCxvl1SvUMP3nWA87LPL51zbofyO.jpg', '2023-10-10 20:03:28', '2024-07-21 04:25:50'),
(8, 'public/gambar/6vNgY7ca0LnU0R6E7tBzuEAFkRgjC3ZPUMBTxAub.jpg', '2023-11-17 18:31:19', '2024-07-21 04:27:13'),
(19, 'public/gambar/pmjqVwPctuIq66gck8eGxgPgCO6mu4L2NIapjg7v.jpg', '2024-07-21 04:35:54', '2024-07-21 04:35:54'),
(21, 'public/gambar/4QikVgvmSt4XfI4iz4gr9silXzyE5ltIynF58oz8.jpg', '2024-09-08 07:59:33', '2024-09-08 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jasa` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `durasi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_jasa`, `tanggal`, `jam`, `durasi`, `created_at`, `updated_at`) VALUES
(29, 4, '2024-09-20', '06:30:00', 40, '2024-09-01 06:26:25', '2024-09-14 01:57:21'),
(30, 4, '2024-09-06', '03:38:00', 20, '2024-09-03 03:37:10', '2024-09-06 12:08:28'),
(34, 4, '2024-09-28', '02:00:00', 20, '2024-09-22 11:45:13', '2024-09-22 11:45:13'),
(35, 4, '2024-10-22', '12:00:00', 20, '2024-09-23 08:23:49', '2024-09-23 08:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `jasas`
--

CREATE TABLE `jasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jasa` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `deskripsilayanan` text DEFAULT NULL,
  `include` text DEFAULT NULL,
  `penting` text DEFAULT NULL,
  `durasi` time DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasas`
--

INSERT INTO `jasas` (`id`, `id_jasa`, `gambar`, `nama`, `deskripsi`, `harga`, `date`, `time`, `deskripsilayanan`, `include`, `penting`, `durasi`, `kategori`, `created_at`, `updated_at`) VALUES
(4, 1, '1727009999.png', 'Foto Group', 'Berfoto dengan\r\nteman teman mu dengan seru!', 5000.00, NULL, NULL, 'Dive into a photoshoot experience like no other with Ketemu Studio. With this package, you’ll get a photoshoot time with a professional photographer to capture the perfect shots of you. Our photographer will guide you throughout the session to ensure you get the best results and help you feel your most confident. Get ready to shine!', '- UNTUK SATU ORANG\r\n- 20 menit\r\n- 1 set background\r\n- 15 foto edit\r\n- semua softfile original (flashdisc)', 'Dimohon untuk datang 15 menit sebelum waktu pemesanan, karena waktu yang diberikan sudah termasuk persiapan dan photoshoot', NULL, 'Self Photo Studio', '2024-08-19 12:01:57', '2024-09-23 02:27:57'),
(5, 2, '1727011101.jpg', 'Foto Keluarga', 'Ayo foto dengan keluarga\r\nagar mendapat kenangan yang bagus!', 5000.00, NULL, NULL, 'a', '-\r\n-\r\n-\r\n-\r\n-', NULL, NULL, 'Photo Studio', '2024-08-19 12:01:57', '2024-09-23 02:28:04'),
(6, 3, '1727011316.png', 'Foto Sendirian', 'Berfoto sendirian dengan\r\nharga yang terjangkau', 5000.00, NULL, NULL, 'a', '-\r\n-\r\n-\r\n-\r\n-', NULL, NULL, 'Photo Studio', '2024-08-19 12:01:57', '2024-09-23 02:28:16');

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
(15, '2024_04_13_123824_create_jasas_table', 10),
(16, '2024_04_17_131818_create_orders_table', 11),
(17, '2024_04_18_125018_add_nama_jasa_to_orders_table', 12),
(18, '2024_08_15_081441_add_description_to_jasa_table', 13),
(19, '2024_08_19_024223_create_jadwals_table', 14),
(20, '2024_09_03_122907_add_unique_code_to_orders_table', 15),
(21, '2024_09_03_123320_add_unique_code_to_orders_table', 16),
(22, '2024_09_17_092744_add_google_id_to_users_table', 17),
(23, '2024_09_19_093342_create_promosis_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` enum('Unpaid','Paid') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_jasa` varchar(255) NOT NULL,
  `jasa_id` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `unique_code`, `name`, `phone`, `instagram`, `email`, `time`, `date`, `total_price`, `status`, `created_at`, `updated_at`, `nama_jasa`, `jasa_id`, `durasi`, `bukti_pembayaran`) VALUES
(138, 'CODE Unik -WEMD3LD0F2', 'Rasya', '08977575807', '@rasyaaa', 'rasyaaaaaaa@gmail.com', '14:30:00', '2024-09-06', 5000, 'Paid', '2024-09-03 04:44:53', '2024-09-09 12:50:39', 'Foto Group', '4', 40, '1725431617_ss.png'),
(139, 'CODE Unik -T7YW4LN60H', 'Rasya', '08977575807', '@rasyaaa', 'rasyaaaaaaa@gmail.com', '11:38:00', '2024-09-06', 5000, 'Paid', '2024-09-05 02:16:24', '2024-09-09 05:11:45', 'Foto Group', '4', 40, '1725586656_ss.png'),
(162, 'CODE Unik -ZEDWUIWAE7', 'pengguna', '08977575807', '@pengguna', 'pengguna@gmail.com', '14:30:00', '2024-09-20', 5000, 'Unpaid', '2024-09-19 04:09:36', '2024-09-19 04:09:36', 'Foto Group', '4', 40, NULL),
(166, 'CODE Unik -79R0LAH1CV', 'muti', '085332282805', '@muti', 'nmmfbajh', '10:00:00', '2024-09-28', 5000, 'Unpaid', '2024-09-23 05:50:45', '2024-09-23 05:50:45', 'Foto Group', '4', 40, NULL),
(167, 'CODE Unik -EVUFT8IZQH', 'pengguna', '08977575807', '@pengguna', 'pengguna@gmail.com', '20:00:00', '2024-10-22', 5000, 'Unpaid', '2024-09-23 08:24:55', '2024-09-23 08:24:55', 'Foto Group', '4', 40, NULL),
(168, 'CODE Unik -BM1HU8DKXO', 'pengguna', '08977575807', '@pengguna', 'pengguna@gmail.com', '08:00:00', '2024-09-27', 5000, 'Unpaid', '2024-09-24 05:18:14', '2024-09-24 05:18:14', 'Foto Group', '4', 40, NULL);

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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('pengguna@gmail.com', '$2y$10$JdgVg/ADG01G/R5c9mZ7Y.V6ditI6zpa5/LJkzGgq68ImDukrnsDC', '2024-09-19 04:05:07');

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
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'lmfWeKHYK6nclgqn5YSe0pKmW5NRTfVvsItgADm6.jpg', '2024-09-19 02:52:58', '2024-09-19 02:52:58'),
(2, 'ZgX5rea5cN3nUk2BHbw4drudgcLTIkQz6zhANNIw.jpg', '2024-09-19 03:02:12', '2024-09-19 03:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `username`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Muhammad Rasya Asy-Syifa', 'muhammadrasyaasysyifa@gmail.com', NULL, 'Rasya', '', NULL, '$2y$10$Wn/b9heHOw2zOgLSk0LX6.A0QxBWw081xvOHptSF7XyfyxIr/yUNG', '9QdnZ92u7atC2flIjoonaea9c226MDrUAjL0MBrHcgvzJ1txwEcGB8KG7KAa', '2023-09-29 18:18:12', '2023-10-02 01:11:47', 'admin'),
(4, 'rasya', 'muhammadrasya@gmail.com', NULL, NULL, '', NULL, '$2y$10$0hhlI3eWiqXK0ZiTAZ5XQeQJRK3zvPLwBsml.VFSTvCyK/K.n27Mq', NULL, '2024-03-25 17:17:34', '2024-03-25 17:17:34', 'user'),
(5, 'pengguna', 'pengguna@gmail.com', NULL, NULL, '', NULL, '$2y$10$Gkq5ctwX1hB80RscKXvJYuP5HqR0S6VJ0emI4xQ3zia1QFzQkNJOC', 'qAAQFSjVwJDOm3MkfnQfXZgLWJYXtWihzwpCdUtUR1FX6v8yXz5FStSpCc4D', '2024-03-29 05:26:53', '2024-05-26 05:15:53', 'user'),
(6, 'admin', 'admin@gmail.com', NULL, NULL, 'banjar', NULL, '$2y$10$.1rQ3w74tXJqCFFZpRepeOvQBxe.kvgkTi8tiTYhSH9FOrEumS4JO', 'M7zJg4sFLm86IdAaWSi4ldhLORu431Qocnn4esAtailGvcH6HEJCAd0WpUIN', '2024-03-29 05:27:49', '2024-07-21 04:20:09', 'admin'),
(7, 'Basket', 'basketball@gmail.com', NULL, NULL, '', NULL, '$2y$10$DoKl3iwdrISf0.biJG4obOfeHIOe.X4CSUovwIO3xNR/9lETzZFAC', NULL, '2024-05-26 05:09:41', '2024-05-26 05:09:41', 'user'),
(8, 'pengguna2', 'pengguna2@gmail.com', NULL, NULL, '', NULL, '$2y$10$o/P./13XTiHe73cnAhTbWuoQX7JKUCEpoHZSq6DlqqYqU.ycA6Z9G', NULL, '2024-05-26 06:02:02', '2024-05-26 06:02:02', 'user'),
(9, 'pengguna3', 'pengguna3@gmail.com', NULL, NULL, '', NULL, '$2y$10$9ou4LeXKtWXXM.IUr9GlMOD8ul6dMeb0BJJNzt/g9YNTCD0Uhfu9W', NULL, '2024-05-26 06:05:21', '2024-05-26 06:06:01', 'user'),
(10, 'pengguna5', 'pengguna4@gmail.com', NULL, NULL, '', NULL, '$2y$10$wMo.Gl2V7CRieCO4Oo1bU.3RLb.CDgjzjRXP.ryHXVTKW0Sx2zBlO', NULL, '2024-05-26 06:07:41', '2024-05-26 06:08:00', 'user'),
(13, 'Muhammad Rasya Asy Syifa', 'lakatanlolbjm7576@gmail.com', '110102646937247131086', NULL, NULL, NULL, '$2y$10$AoU.oVaHowy6kkp1wpdt8eeQxm0uKueUc2PAUX77TXHcZ6o208e5W', NULL, '2024-09-17 01:37:39', '2024-09-17 01:37:39', 'user');

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
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_id_jasa_foreign` (`id_jasa`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_unique_code_unique` (`unique_code`);

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
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `jasas`
--
ALTER TABLE `jasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_id_jasa_foreign` FOREIGN KEY (`id_jasa`) REFERENCES `jasas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
