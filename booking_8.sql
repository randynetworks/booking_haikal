-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 09:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_8`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_nip` int(11) NOT NULL,
  `installation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrant` int(11) NOT NULL,
  `type_meeting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reject_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `username`, `staff_nip`, `installation`, `date`, `time_start`, `time_end`, `topic`, `entrant`, `type_meeting`, `room_id`, `approved`, `created_at`, `updated_at`, `reject_note`) VALUES
(1, 'Aif', 23456783, 'farmasi', '2022-01-12', '12:00', '14:00', 'Meeting Bulanan', 20, 'Internal', 1, 1, '2022-01-10 22:35:40', '2022-01-10 23:48:53', NULL),
(2, 'era', 21213, 'coba', '2022-01-12', '14:30', '15:00', 'Meeting Bulanan', 12, 'Internal', 1, 1, '2022-01-11 00:56:24', '2022-01-11 01:04:41', NULL),
(3, 'rama', 33442131, 'Gizi', '2022-01-12', '00:00', '00:30', 'Meeting Bulanan', 23, 'Internal', 3, 1, '2022-01-11 00:57:23', '2022-01-11 01:04:48', NULL),
(4, 'eta', 23321, 'Makanan', '2022-01-12', '01:00', '01:30', 'Meeting Harian', 23, 'Eksternal', 3, 1, '2022-01-11 00:58:03', '2022-01-11 01:04:54', NULL),
(5, 'Dara', 8899272, 'IGD', '2022-01-12', '02:00', '02:30', 'Meeting Bulanan', 33, 'Eksternal', 3, 1, '2022-01-11 00:58:52', '2022-01-11 01:04:58', NULL),
(6, 'Kami', 9900883, 'Test', '2022-01-12', '03:00', '03:30', 'Meeting Harian', 33, 'Internal', 3, 1, '2022-01-11 00:59:37', '2022-01-11 01:05:04', NULL),
(7, 'Tata', 99000288, 'Makanan', '2022-01-12', '04:00', '04:30', 'Meeting Bulanan', 44, 'Internal', 3, 1, '2022-01-11 01:00:45', '2022-01-11 01:05:11', NULL),
(8, 'Kami', 8877464, 'Kita', '2022-01-12', '05:00', '05:30', 'Meeting Harian', 55, 'Eksternal', 3, 1, '2022-01-11 01:01:24', '2022-01-11 01:05:16', NULL),
(9, 'Juju', 6475329, 'kita', '2022-01-12', '06:00', '06:30', 'Meeting Harian', 43, 'Eksternal', 3, 1, '2022-01-11 01:02:11', '2022-01-11 01:05:22', NULL),
(10, 'Rara', 77886623, 'farmasi', '2022-01-12', '07:00', '07:30', 'Meeting Harian', 22, 'Internal', 3, 1, '2022-01-11 01:02:51', '2022-01-11 01:05:27', NULL),
(11, 'Oma', 2121212, 'Coba', '2022-01-12', '08:00', '08:30', 'Meeting Bulanan', 90, 'Eksternal', 3, 0, '2022-01-11 01:03:31', '2022-01-11 01:03:31', NULL),
(12, 'dani', 4455321, 'Mie', '2022-01-12', '09:00', '09:30', 'Meeting Bulanan', 22, 'Internal', 3, 0, '2022-01-11 01:04:11', '2022-01-11 01:04:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2021_12_23_223847_create_books_tables', 1),
(37, '2021_12_23_224348_create_rooms_table', 1),
(38, '2022_01_03_043157_add_img_to_rooms_table', 1),
(39, '2022_01_03_052910_add_reject_to_books_table', 1),
(40, '2022_01_03_221715_update_date_in_books_table', 1),
(41, '2022_01_11_033811_add_img2_to_rooms_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`, `updated_at`, `img`, `img2`, `img3`) VALUES
(1, 'Rapat', '2022-01-10 22:31:13', '2022-01-10 22:34:48', '202201110531131.jpg', NULL, NULL),
(3, 'Aula', '2022-01-10 22:32:21', '2022-01-10 22:32:21', '202201110532211.jpg', NULL, NULL);

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
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$J2MlVlC/YoEIwBg4n9MHwuxLpq7BqcFxT3Q8FBJ4AjuWm5QKWwjxC', 1, NULL, '2022-01-10 22:11:02', '2022-01-10 22:11:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
