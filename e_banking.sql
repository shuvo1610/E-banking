-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2022 at 01:17 PM
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
-- Database: `e_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logout_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `user_name`, `date`, `login_time`, `logout_time`, `created_at`, `updated_at`, `total_hour`) VALUES
(27, '2', 'Tanvir', '2022-11-30', '12:30:00', '18:36:05', '2022-11-30 06:30:00', '2022-11-30 06:36:05', NULL),
(29, '2', 'Tanvir', '2022-11-30', '13:36:45', NULL, '2022-11-30 07:36:45', '2022-11-30 07:36:45', NULL),
(30, '2', 'Tanvir', '2022-11-30', '13:37:39', '13:39:24', '2022-11-30 07:37:39', '2022-11-30 07:39:24', NULL),
(31, '2', 'Tanvir', '2022-11-30', '13:45:04', '13:45:19', '2022-11-30 07:45:04', '2022-11-30 07:45:19', NULL),
(32, '2', 'Tanvir', '2022-11-30', '16:05:24', NULL, '2022-11-30 10:05:24', '2022-11-30 10:05:24', NULL),
(33, '2', 'Tanvir', '2022-11-30', '16:06:12', '16:07:38', '2022-11-30 10:06:12', '2022-11-30 10:07:38', NULL),
(34, '2', 'Tanvir', '2022-12-01', '10:18:50', NULL, '2022-12-01 04:18:50', '2022-12-01 04:18:50', NULL),
(35, '2', 'Tanvir', '2022-12-01', '10:32:38', '10:32:50', '2022-12-01 04:32:38', '2022-12-01 04:32:50', NULL),
(36, '3', 'Leo', '2022-12-01', '10:55:07', '10:56:03', '2022-12-01 04:55:07', '2022-12-01 04:56:03', NULL),
(37, '2', 'Tanvir', '2022-12-03', '18:37:53', NULL, '2022-12-03 12:37:53', '2022-12-03 12:37:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `first_name`, `salary`, `date_of_birth`, `designation`, `created_at`, `updated_at`) VALUES
(2, '1', 'Mashuir', '100000', '1998-03-05', 'admin', '2022-11-15 22:36:47', '2022-11-15 22:36:47'),
(3, '2', 'Tanvir', '44444', '1999-01-06', 'employee', '2022-11-15 22:41:40', '2022-11-15 22:41:40'),
(5, '51', 'Kane', '34', '2010-02-26', 'Sunt recusandae Cul', '2022-11-17 11:49:31', '2022-11-17 11:49:31'),
(6, '5', 'Erich', '39', '1972-12-11', 'Ab facere in et dolo', '2022-11-21 11:15:37', '2022-11-21 11:15:37'),
(7, '3', 'Abdulla', '50000', '1999-02-02', 'security', '2022-11-23 10:18:29', '2022-11-23 10:18:29'),
(27, '23', 'Lenore', '30', '1989-06-19', 'Aliquid earum ea mol', '2022-11-24 08:26:26', '2022-11-24 08:26:26'),
(28, '99', 'Jamal', '91', '1993-06-20', 'Rerum dolorum aliqui', '2022-11-24 08:27:01', '2022-11-24 08:27:01'),
(29, '25', 'Charissa', '90', '2005-12-07', 'Eligendi mollitia si', '2022-11-24 08:28:17', '2022-11-24 08:28:17'),
(30, '69', 'Mannix', '50', '2005-02-19', 'Perferendis et ut pa', '2022-11-24 08:28:31', '2022-11-24 08:28:31'),
(39, '3', 'Leo', '100000', '1984-06-12', 'Accountant', '2022-12-01 04:51:34', '2022-12-01 04:51:34');

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
(5, '2022_11_09_093951_create_employees_table', 1),
(6, '2022_11_12_062424_create_users_table', 2),
(7, '2022_11_12_063056_create_employees_table', 2),
(8, '2022_11_12_090316_change', 3),
(9, '2022_11_12_105947_employee', 4),
(10, '2022_11_14_030020_create_attendances_table', 5),
(11, '2022_11_15_091706_users', 6),
(12, '2022_11_15_095711_employees', 7),
(13, '2022_11_16_040029_employees', 8),
(14, '2022_11_16_043326_employees', 9),
(15, '2022_11_21_124030_add_verified_at_after_last_name_to_users', 10),
(16, '2022_11_22_142529_attendances', 11),
(17, '2022_11_24_094753_user', 12),
(18, '2022_11_29_152103_create_salaries_table', 13),
(19, '2022_12_05_175046_attendance', 14);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `amount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(339, '1', '100000', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(340, '2', '44444', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(341, '51', '34', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(342, '5', '39', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(343, '3', '50000', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(344, '23', '30', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(345, '99', '91', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(346, '25', '90', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(347, '69', '50', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(348, '3', '100000', '2021-12-01', '1', '2022-12-07 09:05:01', '2022-12-07 09:05:01'),
(349, '1', '100000', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(350, '2', '44444', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(351, '51', '34', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(352, '5', '39', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(353, '3', '50000', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(354, '23', '30', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(355, '99', '91', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(356, '25', '90', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(357, '69', '50', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(358, '3', '100000', '2022-12-01', '1', '2022-12-07 09:11:34', '2022-12-07 09:11:34'),
(359, '1', '100000', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(360, '2', '44444', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(361, '51', '34', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(362, '5', '39', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(363, '3', '50000', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(364, '23', '30', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(365, '99', '91', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(366, '25', '90', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(367, '69', '50', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(368, '3', '100000', '2022-11-01', '1', '2022-12-07 09:12:44', '2022-12-07 09:12:44'),
(369, '1', '100000', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(370, '2', '44444', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(371, '51', '34', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(372, '5', '39', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(373, '3', '50000', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(374, '23', '30', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(375, '99', '91', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(376, '25', '90', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(377, '69', '50', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(378, '3', '100000', '2022-02-01', '1', '2022-12-07 09:14:44', '2022-12-07 09:14:44'),
(379, '1', '100000', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(380, '2', '44444', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(381, '51', '34', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(382, '5', '39', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(383, '3', '50000', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(384, '23', '30', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(385, '99', '91', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(386, '25', '90', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(387, '69', '50', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(388, '3', '100000', '2022-03-01', '1', '2022-12-07 09:16:12', '2022-12-07 09:16:12'),
(389, '1', '100000', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(390, '2', '44444', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(391, '51', '34', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(392, '5', '39', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(393, '3', '50000', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(394, '23', '30', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(395, '99', '91', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(396, '25', '90', '2020-01-01', '1', '2022-12-07 09:18:07', '2022-12-07 09:18:07'),
(397, '69', '50', '2020-01-01', '1', '2022-12-07 09:18:08', '2022-12-07 09:18:08'),
(398, '3', '100000', '2020-01-01', '1', '2022-12-07 09:18:08', '2022-12-07 09:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_type`, `address`, `image`, `created_at`, `updated_at`, `verified_at`, `email_verification`) VALUES
(20, '1', 'Mashuir', 'Rahman', 1754943428, 'mashiurrahmanshuvo@gmail.com', '$2y$10$N/.FhayaQwxFEGH2QxbWeee8vrW4wwpK/2QPnvwJ1sh4FgYRl4RCa', 'admin', 'Mirpur-10', 'image/20221123155741.png', '2022-11-15 22:36:47', '2022-11-27 10:51:55', '2022-11-24 17:52:57', NULL),
(22, '2', 'Tanvir', 'Ahmed', 1727787981, '16103358@iubat.edu', '$2y$10$HAhlUxbUJz8f4HvTIK4jxuLeR34AAmlttgSBhLG6bDDBlr9ILXeqm', 'employee', 'dhaka', 'image/20221117174631.png', '2022-11-17 11:46:31', '2022-11-27 10:36:44', '2022-11-24 16:43:55', NULL),
(57, '3', 'Leo', 'Messi', 1631102838, 'qepi@mailinator.com', '$2y$10$7s0RkjWmSWIIB5U0VpMumuthbsBLB.t1ynV6nagQ/gcO.5NyhABCG', 'employee', 'Argentina', 'image/20221201105134.jfif', '2022-12-01 04:51:34', '2022-12-01 04:52:39', '2022-12-01 10:52:39', '10:52:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
