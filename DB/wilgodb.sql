-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 05:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilgodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-07-14 04:19:54', '2021-07-14 04:19:54'),
(2, 'default', 'deleted', 'App\\Permission', 25, 'App\\User', 1, '[]', '2021-07-14 04:20:26', '2021-07-14 04:20:26'),
(3, 'User', 'updated', 'App\\User', 2, 'App\\User', 1, '{\"attributes\":{\"updated_by\":1},\"old\":{\"updated_by\":null}}', '2021-07-14 06:38:43', '2021-07-14 06:38:43'),
(4, 'UserProfile', 'created', 'App\\UserProfile', 2, NULL, NULL, '{\"attributes\":{\"image\":null,\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:00:45', '2021-07-15 08:00:45'),
(5, 'UserProfile', 'created', 'App\\UserProfile', 3, NULL, NULL, '{\"attributes\":{\"image\":null,\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:01:26', '2021-07-15 08:01:26'),
(6, 'UserProfile', 'created', 'App\\UserProfile', 4, 'App\\User', 1, '{\"attributes\":{\"image\":null,\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:07:12', '2021-07-15 08:07:12'),
(7, 'UserProfile', 'created', 'App\\UserProfile', 5, 'App\\User', 1, '{\"attributes\":{\"image\":null,\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:08:23', '2021-07-15 08:08:23'),
(8, 'UserProfile', 'created', 'App\\UserProfile', 6, 'App\\User', 1, '{\"attributes\":{\"image\":\"612298119.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:11:25', '2021-07-15 08:11:25'),
(9, 'UserProfile', 'created', 'App\\UserProfile', 7, 'App\\User', 1, '{\"attributes\":{\"image\":\"75437860.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:12:22', '2021-07-15 08:12:22'),
(10, 'UserProfile', 'created', 'App\\UserProfile', 8, 'App\\User', 1, '{\"attributes\":{\"image\":\"2095369923.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:13:00', '2021-07-15 08:13:00'),
(11, 'UserProfile', 'created', 'App\\UserProfile', 9, 'App\\User', 1, '{\"attributes\":{\"image\":\"361014820.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:14:34', '2021-07-15 08:14:34'),
(12, 'UserProfile', 'created', 'App\\UserProfile', 10, 'App\\User', 1, '{\"attributes\":{\"image\":\"755483864.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:15:51', '2021-07-15 08:15:51'),
(13, 'UserProfile', 'created', 'App\\UserProfile', 11, 'App\\User', 1, '{\"attributes\":{\"image\":\"976127007.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:16:00', '2021-07-15 08:16:00'),
(14, 'UserProfile', 'created', 'App\\UserProfile', 12, 'App\\User', 1, '{\"attributes\":{\"image\":\"1526536549.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 08:16:23', '2021-07-15 08:16:23'),
(15, 'default', 'created', 'App\\DriverDetail', 2, 'App\\User', 1, '[]', '2021-07-15 10:05:47', '2021-07-15 10:05:47'),
(16, 'default', 'created', 'App\\DriverDetail', 3, 'App\\User', 1, '[]', '2021-07-15 10:06:13', '2021-07-15 10:06:13'),
(17, 'default', 'created', 'App\\DriverDetail', 4, 'App\\User', 1, '[]', '2021-07-15 10:06:23', '2021-07-15 10:06:23'),
(18, 'UserProfile', 'created', 'App\\UserProfile', 13, 'App\\User', 1, '{\"attributes\":{\"image\":\"1323201924.jpg\",\"bio\":null,\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 10:40:15', '2021-07-15 10:40:15'),
(19, 'UserProfile', 'created', 'App\\UserProfile', 14, 'App\\User', 1, '{\"attributes\":{\"image\":\"385750562.jpg\",\"bio\":\"This Is for Test\",\"location\":\"London\",\"longitude\":null,\"latitude\":null,\"user_id\":1}}', '2021-07-15 10:40:30', '2021-07-15 10:40:30'),
(20, 'default', 'updated', 'App\\Commission', 1, 'App\\User', 1, '[]', '2021-07-19 05:11:00', '2021-07-19 05:11:00'),
(21, 'default', 'created', 'App\\Rating', 1, 'App\\User', 1, '[]', '2021-07-19 05:39:55', '2021-07-19 05:39:55'),
(22, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-07-20 05:03:34', '2021-07-20 05:03:34'),
(23, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-07-20 05:04:04', '2021-07-20 05:04:04'),
(24, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-07-20 05:04:16', '2021-07-20 05:04:16'),
(25, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-07-20 05:04:32', '2021-07-20 05:04:32'),
(26, 'User', 'created', 'App\\User', 3, NULL, NULL, '{\"attributes\":{\"added_by\":null,\"updated_by\":null,\"name\":\"atif\",\"country_code\":null,\"phone\":\"03423434567\",\"email\":\"atif@gmail.com\",\"type\":null,\"password\":\"$2y$10$1Ohy2o7pjvu0uKnSlaS\\/gOzgqT043N2MUgjUJ7K4CHdwWkWRwZPI.\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-07-28 04:13:29', '2021-07-28 04:13:29'),
(27, 'default', 'updated', 'App\\Ride', 1, 'App\\User', 1, '[]', '2021-07-28 08:44:37', '2021-07-28 08:44:37'),
(28, 'default', 'updated', 'App\\Ride', 1, 'App\\User', 1, '[]', '2021-07-28 08:45:22', '2021-07-28 08:45:22'),
(29, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-28 08:45:58', '2021-07-28 08:45:58'),
(30, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-28 08:52:17', '2021-07-28 08:52:17'),
(31, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-28 09:25:42', '2021-07-28 09:25:42'),
(32, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-28 09:26:11', '2021-07-28 09:26:11'),
(33, 'default', 'updated', 'App\\Ride', 3, 'App\\User', 1, '[]', '2021-07-28 10:04:47', '2021-07-28 10:04:47'),
(34, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-28 10:44:22', '2021-07-28 10:44:22'),
(35, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 08:23:20', '2021-07-29 08:23:20'),
(36, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 08:23:44', '2021-07-29 08:23:44'),
(37, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 08:24:15', '2021-07-29 08:24:15'),
(38, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 08:24:24', '2021-07-29 08:24:24'),
(39, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 08:42:13', '2021-07-29 08:42:13'),
(40, 'default', 'updated', 'App\\Ride', 2, 'App\\User', 1, '[]', '2021-07-29 09:13:52', '2021-07-29 09:13:52'),
(41, 'default', 'updated', 'App\\CarType', 2, 'App\\User', 1, '[]', '2021-07-30 06:39:41', '2021-07-30 06:39:41'),
(42, 'default', 'updated', 'App\\CarType', 1, 'App\\User', 1, '[]', '2021-07-30 06:39:52', '2021-07-30 06:39:52'),
(43, 'default', 'created', 'App\\CarType', 3, 'App\\User', 1, '[]', '2021-07-30 07:26:14', '2021-07-30 07:26:14'),
(44, 'User', 'updated', 'App\\User', 3, 'App\\User', 1, '{\"attributes\":{\"updated_by\":1},\"old\":{\"updated_by\":null}}', '2021-09-10 06:15:27', '2021-09-10 06:15:27'),
(45, 'User', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"email\":\"admin@wilgo.com\"},\"old\":{\"email\":\"admin@reignsol.com\"}}', '2021-09-10 06:15:44', '2021-09-10 06:15:44'),
(46, 'User', 'created', 'App\\User', 4, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver\",\"country_code\":null,\"phone\":null,\"email\":\"driver@yopmail.com\",\"type\":null,\"password\":\"$2y$10$i14T4QridjXgGPuCnsLw2.pmlMSbcPgxmkNXZJwhep4jj0k1\\/920q\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 08:30:58', '2021-09-10 08:30:58'),
(47, 'User', 'created', 'App\\User', 5, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver 1\",\"country_code\":null,\"phone\":null,\"email\":\"driver1@yopmail.com\",\"type\":null,\"password\":\"$2y$10$t\\/oVNi8uTAQKEyGcojWS1.I4R2l15cZ7j.24ac8tsO\\/agft7yc9yG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 08:34:04', '2021-09-10 08:34:04'),
(48, 'User', 'created', 'App\\User', 6, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger\",\"country_code\":null,\"phone\":null,\"email\":\"passenger@yopmail.com\",\"type\":null,\"password\":\"$2y$10$ttC4pat9XEVBDhHL\\/KpUS.5Xq.ADT0LXqyzhNUR1LyQZSBH0D27PS\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 08:38:44', '2021-09-10 08:38:44'),
(49, 'User', 'created', 'App\\User', 7, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger 1\",\"country_code\":null,\"phone\":null,\"email\":\"passenger1@yopmail.com\",\"type\":null,\"password\":\"$2y$10$\\/hng1A4nw45LqngmAbzK5eFl1Qk72Lbys56tJl4BNiFKl2AAWmcym\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 08:39:11', '2021-09-10 08:39:11'),
(50, 'User', 'created', 'App\\User', 8, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger\",\"country_code\":null,\"phone\":null,\"email\":\"passenger2@yopmail.com\",\"type\":null,\"password\":\"$2y$10$2OhXG8qEm\\/RTp.QtXQVBeeEVn\\/Hz5reyJ6H3ZEpSw2ZJ.1E7NlAPG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 08:42:23', '2021-09-10 08:42:23'),
(51, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-10 09:06:25', '2021-09-10 09:06:25'),
(52, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-10 09:06:35', '2021-09-10 09:06:35'),
(53, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-10 09:06:45', '2021-09-10 09:06:45'),
(54, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-10 09:06:56', '2021-09-10 09:06:56'),
(55, 'User', 'created', 'App\\User', 9, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Muhammad Yasir\",\"country_code\":null,\"phone\":null,\"email\":\"muhammadyasir6877@gmail.com\",\"type\":null,\"password\":\"$2y$10$\\/M1mqGMdGx2n8\\/Bj6mOLT.yvA8fXCMPcW9mlPDI2S42YMmRJOpXFW\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-10 09:10:26', '2021-09-10 09:10:26'),
(56, 'User', 'created', 'App\\User', 10, NULL, NULL, '{\"attributes\":{\"added_by\":null,\"updated_by\":null,\"name\":\"Wilgo User\",\"country_code\":null,\"phone\":\"03043167149\",\"email\":\"user@yopmail.com\",\"type\":null,\"password\":\"$2y$10$Am4H3s1Kvd\\/AzzXDCA.zBOL4I09xQphDntl2uHydXhk6dTMojfqNa\",\"otp\":3518,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null}}', '2021-09-14 05:23:00', '2021-09-14 05:23:00'),
(57, 'User', 'updated', 'App\\User', 10, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":3518}}', '2021-09-14 05:23:49', '2021-09-14 05:23:49'),
(58, 'User', 'updated', 'App\\User', 10, 'App\\User', 10, '{\"attributes\":{\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11631624691.jpg\"},\"old\":{\"image\":\"\\/uploads\\/user\\/default.jpg\"}}', '2021-09-14 08:04:51', '2021-09-14 08:04:51'),
(59, 'DriverDetail', 'created', 'App\\DriverDetail', 5, 'App\\User', 10, '{\"attributes\":{\"driver_contact\":\"03043167149\",\"driver_photo\":\"\\/uploads\\/driver_images\\/19b191c03340398b7d822a2a79d1a0c81631806775.jpg\",\"car_photo\":\"\\/uploads\\/car_images\\/62bff45c689a49225c90ce43b8b905281631806775.jpg\",\"car_make\":\"2020\",\"car_registration_number\":\"KKU3834\",\"driver_id\":10,\"car_type\":\"Suzuki\"}}', '2021-09-16 10:39:35', '2021-09-16 10:39:35'),
(60, 'Ride', 'updated', 'App\\Ride', 2, 'App\\User', 10, '{\"attributes\":{\"accepted_at\":\"2021-09-16 16:57:32\",\"status\":\"accepted\"},\"old\":{\"accepted_at\":\"2021-07-29 13:23:20\",\"status\":\"completed\"}}', '2021-09-16 11:57:33', '2021-09-16 11:57:33'),
(61, 'Ride', 'updated', 'App\\Ride', 2, 'App\\User', 10, '{\"attributes\":{\"completed_at\":\"2021-09-16 16:57:58\",\"status\":\"completed\"},\"old\":{\"completed_at\":\"2021-07-29 14:13:52\",\"status\":\"accepted\"}}', '2021-09-16 11:57:59', '2021-09-16 11:57:59'),
(62, 'Ride', 'updated', 'App\\Ride', 2, 'App\\User', 10, '{\"attributes\":{\"accepted_at\":\"2021-09-16 16:58:49\",\"status\":\"accepted\"},\"old\":{\"accepted_at\":\"2021-09-16 16:57:32\",\"status\":\"completed\"}}', '2021-09-16 11:58:49', '2021-09-16 11:58:49'),
(63, 'Ride', 'updated', 'App\\Ride', 2, 'App\\User', 10, '{\"attributes\":{\"accepted_at\":\"2021-09-16 16:58:51\"},\"old\":{\"accepted_at\":\"2021-09-16 16:58:49\"}}', '2021-09-16 11:58:51', '2021-09-16 11:58:51'),
(64, 'Ride', 'updated', 'App\\Ride', 2, 'App\\User', 10, '{\"attributes\":{\"accepted_at\":\"2021-09-17 09:39:56\"},\"old\":{\"accepted_at\":\"2021-09-16 16:58:51\"}}', '2021-09-17 04:39:56', '2021-09-17 04:39:56'),
(65, 'Rating', 'created', 'App\\Rating', 3, 'App\\User', 10, '{\"attributes\":{\"ride_id\":3,\"get_review\":4,\"reviewed_by\":10,\"rating\":2,\"comments\":\"This is testing purpose\"}}', '2021-09-17 06:56:56', '2021-09-17 06:56:56'),
(66, 'User', 'updated', 'App\\User', 10, 'App\\User', 10, '{\"attributes\":{\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11631884259.jpg\"},\"old\":{\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11631624691.jpg\"}}', '2021-09-17 08:10:59', '2021-09-17 08:10:59'),
(67, 'User', 'updated', 'App\\User', 10, 'App\\User', 10, '{\"attributes\":{\"latitude\":\"24.90628280557342\",\"longitude\":\"67.07237028142383\"},\"old\":{\"latitude\":null,\"longitude\":null}}', '2021-09-17 08:19:07', '2021-09-17 08:19:07'),
(68, 'Address', 'created', 'App\\Address', 1, 'App\\User', 10, '{\"attributes\":{\"user_id\":10,\"address\":\"xyz\"}}', '2021-09-17 08:54:42', '2021-09-17 08:54:42'),
(69, 'Address', 'updated', 'App\\Address', 1, 'App\\User', 10, '{\"attributes\":{\"address\":\"abc, xyz\"},\"old\":{\"address\":\"xyz\"}}', '2021-09-17 09:01:14', '2021-09-17 09:01:14'),
(70, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-20 04:32:57', '2021-09-20 04:32:57'),
(71, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-20 04:33:12', '2021-09-20 04:33:12'),
(72, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":6229},\"old\":{\"otp\":null}}', '2021-09-28 06:10:06', '2021-09-28 06:10:06'),
(73, 'User', 'created', 'App\\User', 11, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$eFkNVTElrcTcVMSLqvm3suEq2.NvXlbT1LyQl4.\\/91SpdAVpYRMBW\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null}}', '2021-09-28 06:18:06', '2021-09-28 06:18:06'),
(74, 'User', 'deleted', 'App\\User', 11, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$eFkNVTElrcTcVMSLqvm3suEq2.NvXlbT1LyQl4.\\/91SpdAVpYRMBW\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null}}', '2021-09-28 06:18:56', '2021-09-28 06:18:56'),
(75, 'User', 'created', 'App\\User', 12, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$v8liTczPIG5maHdlI10MuenRHqP10yZsjhSX8.4sJmrAKaXkY0mZS\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null}}', '2021-09-28 06:19:20', '2021-09-28 06:19:20'),
(76, 'User', 'deleted', 'App\\User', 12, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$v8liTczPIG5maHdlI10MuenRHqP10yZsjhSX8.4sJmrAKaXkY0mZS\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null}}', '2021-09-28 06:19:34', '2021-09-28 06:19:34'),
(77, 'User', 'created', 'App\\User', 13, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$MX8aC9rPJRevb4g911Zfuuxc4ltComCeL7RFk10cIXF9b5xAwzkaG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:20:23.000000Z\"}}', '2021-09-28 06:20:23', '2021-09-28 06:20:23'),
(78, 'User', 'deleted', 'App\\User', 13, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Admin\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testadmin@yopmail.com\",\"type\":null,\"password\":\"$2y$10$MX8aC9rPJRevb4g911Zfuuxc4ltComCeL7RFk10cIXF9b5xAwzkaG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:20:23.000000Z\"}}', '2021-09-28 06:20:33', '2021-09-28 06:20:33'),
(79, 'User', 'created', 'App\\User', 14, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test User\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testuser@gmail.com\",\"type\":null,\"password\":\"$2y$10$RfBia7nk4olUVgz\\/Bm7tIe6d5SgS8J3m2.dZAxvm8C48EyEFm6NJ6\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:22:04.000000Z\"}}', '2021-09-28 06:22:04', '2021-09-28 06:22:04'),
(80, 'User', 'deleted', 'App\\User', 14, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test User\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testuser@gmail.com\",\"type\":null,\"password\":\"$2y$10$RfBia7nk4olUVgz\\/Bm7tIe6d5SgS8J3m2.dZAxvm8C48EyEFm6NJ6\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:22:04.000000Z\"}}', '2021-09-28 06:23:02', '2021-09-28 06:23:02'),
(81, 'User', 'created', 'App\\User', 15, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Driver\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testdriver@yopmail.com\",\"type\":null,\"password\":\"$2y$10$4Uikp7x533zk7TVS2viGPu19PAcWfpcW5P7ZcLDUQ662cYuAMp\\/wK\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:23:34.000000Z\"}}', '2021-09-28 06:23:34', '2021-09-28 06:23:34'),
(82, 'User', 'deleted', 'App\\User', 15, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Driver\",\"image\":\"\\/uploads\\/user\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testdriver@yopmail.com\",\"type\":null,\"password\":\"$2y$10$4Uikp7x533zk7TVS2viGPu19PAcWfpcW5P7ZcLDUQ662cYuAMp\\/wK\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:23:34.000000Z\"}}', '2021-09-28 06:23:44', '2021-09-28 06:23:44'),
(83, 'User', 'updated', 'App\\User', 4, 'App\\User', 4, '{\"attributes\":{\"password\":\"$2y$10$8XIzd\\/jWmrDA52M\\/LbU66.qMO5kc51R8GJ1cp0PUpBmq8miVAS2eC\"},\"old\":{\"password\":\"$2y$10$i14T4QridjXgGPuCnsLw2.pmlMSbcPgxmkNXZJwhep4jj0k1\\/920q\"}}', '2021-09-28 06:25:04', '2021-09-28 06:25:04'),
(84, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":3743,\"verified_by\":\"email\"},\"old\":{\"otp\":6229,\"verified_by\":null}}', '2021-09-28 06:27:12', '2021-09-28 06:27:12'),
(85, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":3743}}', '2021-09-28 06:27:42', '2021-09-28 06:27:42'),
(86, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$10$Q.eDEg800PW448TPLhqWK.YEmseXwU9VoDsB6d7glz14lEMh\\/3vei\"},\"old\":{\"password\":\"$2y$10$8XIzd\\/jWmrDA52M\\/LbU66.qMO5kc51R8GJ1cp0PUpBmq8miVAS2eC\"}}', '2021-09-28 06:28:14', '2021-09-28 06:28:14'),
(87, 'User', 'updated', 'App\\User', 4, 'App\\User', 4, '{\"attributes\":{\"password\":\"$2y$10$G49wKFtOqpp3K6v0dYvUgut6rR4v2t4.3DkXEokdSaGUFGyMjQxjW\"},\"old\":{\"password\":\"$2y$10$Q.eDEg800PW448TPLhqWK.YEmseXwU9VoDsB6d7glz14lEMh\\/3vei\"}}', '2021-09-28 06:28:27', '2021-09-28 06:28:27'),
(88, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":1844},\"old\":{\"otp\":null}}', '2021-09-28 08:05:36', '2021-09-28 08:05:36'),
(89, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":1844}}', '2021-09-28 08:12:40', '2021-09-28 08:12:40'),
(90, 'User', 'updated', 'App\\User', 4, 'App\\User', 4, '{\"attributes\":{\"password\":\"$2y$10$6.xFotvk4W.Llzw2a1PxBeqdsNLIEtVSGlCoWriKfDPO7NXE6F9EO\"},\"old\":{\"password\":\"$2y$10$G49wKFtOqpp3K6v0dYvUgut6rR4v2t4.3DkXEokdSaGUFGyMjQxjW\"}}', '2021-09-28 08:25:50', '2021-09-28 08:25:50'),
(91, 'User', 'updated', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$10$9\\/OLGZKWvD26xdhREcN56urIXaPhh3LpcxzJPRlZsKoI0cWzen\\/Nu\"},\"old\":{\"password\":\"$2y$10$6.xFotvk4W.Llzw2a1PxBeqdsNLIEtVSGlCoWriKfDPO7NXE6F9EO\"}}', '2021-09-28 08:28:36', '2021-09-28 08:28:36'),
(92, 'User', 'updated', 'App\\User', 4, 'App\\User', 4, '{\"attributes\":{\"image\":\"\\/uploads\\/driver\\/779b7513263ef185b6d094af290ef5401632836928.png\",\"latitude\":\"24.90628280557342\",\"longitude\":\"67.07237028142383\",\"phone\":\"03043167149\"},\"old\":{\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null}}', '2021-09-28 08:48:48', '2021-09-28 08:48:48'),
(93, 'User', 'updated', 'App\\User', 10, 'App\\User', 10, '{\"attributes\":{\"name\":\"Wilgo User Update\",\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11632838971.jpg\"},\"old\":{\"name\":\"Wilgo User\",\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11631884259.jpg\"}}', '2021-09-28 09:22:51', '2021-09-28 09:22:51'),
(94, 'User', 'deleted', 'App\\User', 6, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"passenger@yopmail.com\",\"type\":null,\"password\":\"$2y$10$ttC4pat9XEVBDhHL\\/KpUS.5Xq.ADT0LXqyzhNUR1LyQZSBH0D27PS\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:43:23', '2021-09-28 11:43:23'),
(95, 'User', 'deleted', 'App\\User', 7, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger 1\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"passenger1@yopmail.com\",\"type\":null,\"password\":\"$2y$10$\\/hng1A4nw45LqngmAbzK5eFl1Qk72Lbys56tJl4BNiFKl2AAWmcym\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:43:27', '2021-09-28 11:43:27'),
(96, 'User', 'deleted', 'App\\User', 8, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Passenger\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"passenger2@yopmail.com\",\"type\":null,\"password\":\"$2y$10$2OhXG8qEm\\/RTp.QtXQVBeeEVn\\/Hz5reyJ6H3ZEpSw2ZJ.1E7NlAPG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:43:31', '2021-09-28 11:43:31'),
(97, 'default', 'updated', 'App\\Permission', 16, 'App\\User', 1, '[]', '2021-09-28 11:46:16', '2021-09-28 11:46:16'),
(98, 'default', 'updated', 'App\\Permission', 15, 'App\\User', 1, '[]', '2021-09-28 11:46:23', '2021-09-28 11:46:23'),
(99, 'default', 'updated', 'App\\Permission', 14, 'App\\User', 1, '[]', '2021-09-28 11:46:28', '2021-09-28 11:46:28'),
(100, 'default', 'updated', 'App\\Permission', 13, 'App\\User', 1, '[]', '2021-09-28 11:46:33', '2021-09-28 11:46:33'),
(101, 'User', 'deleted', 'App\\User', 10, 'App\\User', 1, '{\"attributes\":{\"added_by\":null,\"updated_by\":null,\"name\":\"Wilgo User Update\",\"image\":\"\\/uploads\\/user\\/9df4694a26dbf6b65a6ee9f8473e42e11632838971.jpg\",\"latitude\":\"24.90628280557342\",\"longitude\":\"67.07237028142383\",\"phone\":\"03043167149\",\"email\":\"user@yopmail.com\",\"type\":null,\"password\":\"$2y$10$Am4H3s1Kvd\\/AzzXDCA.zBOL4I09xQphDntl2uHydXhk6dTMojfqNa\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-14T10:23:49.000000Z\"}}', '2021-09-28 11:49:07', '2021-09-28 11:49:07'),
(102, 'User', 'deleted', 'App\\User', 3, 'App\\User', 1, '{\"attributes\":{\"added_by\":null,\"updated_by\":1,\"name\":\"atif\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":\"03423434567\",\"email\":\"atif@gmail.com\",\"type\":null,\"password\":\"$2y$10$1Ohy2o7pjvu0uKnSlaS\\/gOzgqT043N2MUgjUJ7K4CHdwWkWRwZPI.\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:49:11', '2021-09-28 11:49:11'),
(103, 'User', 'deleted', 'App\\User', 2, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":1,\"name\":\"yasir\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"yasir@gmail.com\",\"type\":null,\"password\":\"$2y$10$SuexYFFNwMOzbP9CKcUOGOYmZGNZ1XHcfL91Q610YxTPl3jC4jolO\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-04-26T06:39:34.000000Z\"}}', '2021-09-28 11:49:15', '2021-09-28 11:49:15'),
(104, 'User', 'deleted', 'App\\User', 5, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver 1\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"driver1@yopmail.com\",\"type\":null,\"password\":\"$2y$10$t\\/oVNi8uTAQKEyGcojWS1.I4R2l15cZ7j.24ac8tsO\\/agft7yc9yG\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:49:23', '2021-09-28 11:49:23'),
(105, 'User', 'deleted', 'App\\User', 4, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver\",\"image\":\"\\/uploads\\/driver\\/779b7513263ef185b6d094af290ef5401632836928.png\",\"latitude\":\"24.90628280557342\",\"longitude\":\"67.07237028142383\",\"phone\":\"03043167149\",\"email\":\"driver@yopmail.com\",\"type\":null,\"password\":\"$2y$10$9\\/OLGZKWvD26xdhREcN56urIXaPhh3LpcxzJPRlZsKoI0cWzen\\/Nu\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T11:23:34.000000Z\"}}', '2021-09-28 11:49:26', '2021-09-28 11:49:26'),
(106, 'User', 'deleted', 'App\\User', 9, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Muhammad Yasir\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"muhammadyasir6877@gmail.com\",\"type\":null,\"password\":\"$2y$10$\\/M1mqGMdGx2n8\\/Bj6mOLT.yvA8fXCMPcW9mlPDI2S42YMmRJOpXFW\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":null}}', '2021-09-28 11:49:35', '2021-09-28 11:49:35'),
(107, 'User', 'created', 'App\\User', 16, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Role User\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testroleuser@yopmail.com\",\"type\":null,\"password\":\"$2y$10$zpXXMSeYkdiYOi4rJH4y9uAQ0MYi.gsLGa.diiANd\\/8NS554ttG8.\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:03:47.000000Z\"}}', '2021-09-28 12:03:47', '2021-09-28 12:03:47'),
(108, 'User', 'created', 'App\\User', 17, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"User\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"user@yopmail.com\",\"type\":null,\"password\":\"$2y$10$sS7DirM2Hsz8VtKyzf7Q7eQT7pIjJAbXdlMsGUXPM9K4hpGor552G\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:31:04.000000Z\"}}', '2021-09-28 12:31:04', '2021-09-28 12:31:04'),
(109, 'User', 'created', 'App\\User', 18, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"driver@yopmail.com\",\"type\":null,\"password\":\"$2y$10$66D0L3Ek9W66fBgOXmNLu.0nkJLOkE8HOqdUmtWy\\/UIlqXvPy22P6\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:32:50.000000Z\"}}', '2021-09-28 12:32:50', '2021-09-28 12:32:50'),
(110, 'User', 'updated', 'App\\User', 17, 'App\\User', 1, '{\"attributes\":{\"updated_by\":1,\"name\":\"User Update\"},\"old\":{\"updated_by\":null,\"name\":\"User\"}}', '2021-09-28 12:36:56', '2021-09-28 12:36:56'),
(111, 'User', 'updated', 'App\\User', 18, 'App\\User', 1, '{\"attributes\":{\"updated_by\":1,\"name\":\"Driver Update\"},\"old\":{\"updated_by\":null,\"name\":\"Driver\"}}', '2021-09-28 12:37:08', '2021-09-28 12:37:08'),
(112, 'User', 'created', 'App\\User', 19, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test User 2\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testuserrole2@yopmail.com\",\"type\":null,\"password\":\"$2y$10$Xed0cGBhxU90P.4.ksthb.73EN5rT.Id5GiwFyL5w3Jr8xMsa2g\\/S\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:53:22.000000Z\"}}', '2021-09-28 12:53:22', '2021-09-28 12:53:22'),
(113, 'User', 'deleted', 'App\\User', 19, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test User 2\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testuserrole2@yopmail.com\",\"type\":null,\"password\":\"$2y$10$Xed0cGBhxU90P.4.ksthb.73EN5rT.Id5GiwFyL5w3Jr8xMsa2g\\/S\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:53:22.000000Z\"}}', '2021-09-29 04:15:55', '2021-09-29 04:15:55'),
(114, 'User', 'deleted', 'App\\User', 16, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Test Role User\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"email\":\"testroleuser@yopmail.com\",\"type\":null,\"password\":\"$2y$10$zpXXMSeYkdiYOi4rJH4y9uAQ0MYi.gsLGa.diiANd\\/8NS554ttG8.\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-09-28T17:03:47.000000Z\"}}', '2021-09-29 04:15:59', '2021-09-29 04:15:59'),
(115, 'CarMake', 'created', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2020\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:32:23', '2021-09-29 04:32:23'),
(116, 'CarMake', 'created', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:32:41', '2021-09-29 04:32:41'),
(117, 'CarMake', 'updated', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021 Update\"},\"old\":{\"name\":\"2021\"}}', '2021-09-29 04:32:53', '2021-09-29 04:32:53'),
(118, 'Car Make', 'created', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:38:02', '2021-09-29 04:38:02'),
(119, 'Car Make', 'deleted', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:38:16', '2021-09-29 04:38:16'),
(120, 'Car Make', 'created', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:41:02', '2021-09-29 04:41:02'),
(121, 'Car Make', 'created', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:41:26', '2021-09-29 04:41:26'),
(122, 'Car Make', 'updated', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021 Update\"},\"old\":{\"name\":\"2021\"}}', '2021-09-29 04:41:38', '2021-09-29 04:41:38'),
(123, 'Car Make', 'updated', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"description\":\"This is testing purpose Update\"},\"old\":{\"description\":\"This is testing purpose\"}}', '2021-09-29 04:41:46', '2021-09-29 04:41:46'),
(124, 'Car Make', 'deleted', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021 Update\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:41:51', '2021-09-29 04:41:51'),
(125, 'Car Make', 'deleted', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose Update\",\"capacity\":\"\"}}', '2021-09-29 04:41:56', '2021-09-29 04:41:56'),
(126, 'default', 'updated', 'App\\Permission', 29, 'App\\User', 1, '[]', '2021-09-29 04:42:45', '2021-09-29 04:42:45'),
(127, 'default', 'updated', 'App\\Permission', 28, 'App\\User', 1, '[]', '2021-09-29 04:42:52', '2021-09-29 04:42:52'),
(128, 'default', 'updated', 'App\\Permission', 27, 'App\\User', 1, '[]', '2021-09-29 04:42:58', '2021-09-29 04:42:58'),
(129, 'default', 'updated', 'App\\Permission', 26, 'App\\User', 1, '[]', '2021-09-29 04:43:03', '2021-09-29 04:43:03'),
(130, 'Car Make', 'created', 'App\\CarMake', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"2021\",\"description\":\"This is testing purpose\",\"capacity\":\"\"}}', '2021-09-29 04:46:04', '2021-09-29 04:46:04'),
(131, 'Car Make', 'created', 'App\\CarMake', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"2020\",\"description\":\"Updated\",\"capacity\":\"\"}}', '2021-09-29 04:46:16', '2021-09-29 04:46:16'),
(132, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"image\":\"\\/uploads\\/driver\\/779b7513263ef185b6d094af290ef5401632913064.png\",\"latitude\":\"24.90628280557342\",\"longitude\":\"67.07237028142383\",\"phone\":\"03043167149\"},\"old\":{\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null}}', '2021-09-29 05:57:44', '2021-09-29 05:57:44'),
(133, 'DriverDetail', 'created', 'App\\DriverDetail', 1, 'App\\User', 18, '{\"attributes\":{\"driver_id\":18,\"car_make_id\":1,\"driver_contact\":\"03043167149\",\"driver_photo\":\"\\/public\\/uploads\\/driver_images\\/779b7513263ef185b6d094af290ef5401632913992.png\",\"car_photo\":\"\\/public\\/uploads\\/car_images\\/e7f374292d1dbca27aeb654f0d7d52cc1632913992.jpg\",\"car_registration_number\":\"KKU3834\",\"car_type\":\"Suzuki\"}}', '2021-09-29 06:13:12', '2021-09-29 06:13:12'),
(134, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-29 07:44:24', '2021-09-29 07:44:24'),
(135, 'Commission', 'updated', 'App\\Commission', 1, 'App\\User', 1, '{\"attributes\":{\"value\":\"2\"},\"old\":{\"value\":\"1\"}}', '2021-09-30 06:48:02', '2021-09-30 06:48:02'),
(136, 'Commission', 'updated', 'App\\Commission', 1, 'App\\User', 1, '{\"attributes\":{\"value\":\"1\"},\"old\":{\"value\":\"2\"}}', '2021-09-30 06:48:09', '2021-09-30 06:48:09'),
(137, 'Fare', 'updated', 'App\\Fare', 1, 'App\\User', 1, '{\"attributes\":{\"per_mile\":100},\"old\":{\"per_mile\":10}}', '2021-09-30 06:50:25', '2021-09-30 06:50:25'),
(138, 'Fare', 'updated', 'App\\Fare', 1, 'App\\User', 1, '{\"attributes\":{\"per_mile\":10},\"old\":{\"per_mile\":100}}', '2021-09-30 06:50:33', '2021-09-30 06:50:33'),
(139, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-30 08:34:11', '2021-09-30 08:34:11'),
(140, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-30 08:34:31', '2021-09-30 08:34:31'),
(141, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-30 08:36:42', '2021-09-30 08:36:42'),
(142, 'default', 'created', 'App\\Permission', NULL, 'App\\User', 1, '[]', '2021-09-30 08:37:05', '2021-09-30 08:37:05'),
(143, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1,\"mode\":\"private ride\"},\"old\":{\"status\":0,\"mode\":null}}', '2021-10-01 08:27:11', '2021-10-01 08:27:11'),
(144, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 08:45:07', '2021-10-01 08:45:07'),
(145, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"mode\":\"shared ride\"},\"old\":{\"mode\":\"private ride\"}}', '2021-10-01 08:46:37', '2021-10-01 08:46:37'),
(146, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"mode\":\"private ride\"},\"old\":{\"mode\":\"shared ride\"}}', '2021-10-01 08:54:11', '2021-10-01 08:54:11'),
(147, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 08:54:55', '2021-10-01 08:54:55'),
(148, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":2},\"old\":{\"status\":1}}', '2021-10-01 08:56:13', '2021-10-01 08:56:13'),
(149, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":2}}', '2021-10-01 09:00:46', '2021-10-01 09:00:46'),
(150, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":[],\"old\":[]}', '2021-10-01 09:01:18', '2021-10-01 09:01:18'),
(151, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":[],\"old\":[]}', '2021-10-01 09:02:06', '2021-10-01 09:02:06'),
(152, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":[],\"old\":[]}', '2021-10-01 09:05:10', '2021-10-01 09:05:10'),
(153, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":\"offline\"},\"old\":{\"status\":\"0\"}}', '2021-10-01 09:05:59', '2021-10-01 09:05:59'),
(154, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":\"online\"},\"old\":{\"status\":\"offline\"}}', '2021-10-01 09:06:25', '2021-10-01 09:06:25'),
(155, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:08:41', '2021-10-01 09:08:41'),
(156, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2021-10-01 09:08:53', '2021-10-01 09:08:53'),
(157, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:09:03', '2021-10-01 09:09:03'),
(158, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0,\"mode\":\"shared ride\"},\"old\":{\"status\":1,\"mode\":\"private ride\"}}', '2021-10-01 09:09:30', '2021-10-01 09:09:30'),
(159, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:11:32', '2021-10-01 09:11:32'),
(160, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2021-10-01 09:11:41', '2021-10-01 09:11:41'),
(161, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:11:57', '2021-10-01 09:11:57'),
(162, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2021-10-01 09:19:47', '2021-10-01 09:19:47'),
(163, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"mode\":\"private ride\"},\"old\":{\"mode\":\"shared ride\"}}', '2021-10-01 09:20:33', '2021-10-01 09:20:33'),
(164, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:20:49', '2021-10-01 09:20:49'),
(165, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"mode\":\"shared ride\"},\"old\":{\"mode\":\"private ride\"}}', '2021-10-01 09:21:18', '2021-10-01 09:21:18'),
(166, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2021-10-01 09:22:12', '2021-10-01 09:22:12'),
(167, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1,\"mode\":\"private ride\"},\"old\":{\"status\":0,\"mode\":\"shared ride\"}}', '2021-10-01 09:22:38', '2021-10-01 09:22:38'),
(168, 'Address', 'created', 'App\\Address', 1, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"address\":\"Noor Trade Center\"}}', '2021-10-01 09:37:11', '2021-10-01 09:37:11'),
(169, 'Address', 'updated', 'App\\Address', 1, 'App\\User', 17, '{\"attributes\":{\"address\":\"abc, xyz\"},\"old\":{\"address\":\"Noor Trade Center\"}}', '2021-10-01 09:37:59', '2021-10-01 09:37:59'),
(170, 'Address', 'created', 'App\\Address', 2, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"address\":\"Noor Trade Center\"}}', '2021-10-01 09:38:21', '2021-10-01 09:38:21'),
(171, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2021-10-01 09:45:46', '2021-10-01 09:45:46'),
(172, 'User', 'updated', 'App\\User', 18, 'App\\User', 18, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2021-10-01 09:45:57', '2021-10-01 09:45:57'),
(173, 'Ride', 'created', 'App\\Ride', 1, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"SUV\",\"drop_off\":\"Gulshan\",\"pick_up\":\"Keamari\",\"wheel_chair\":null,\"no_of_passenger\":\"3\",\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"take_ride_now\",\"ride_type\":\"shared\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:48:13', '2021-10-05 05:48:13'),
(174, 'Ride', 'created', 'App\\Ride', 2, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"VAN\",\"drop_off\":\"Sultanabad\",\"pick_up\":\"Layari\",\"wheel_chair\":\"yes\",\"no_of_passenger\":null,\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"take_ride_now\",\"ride_type\":\"private\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:50:50', '2021-10-05 05:50:50'),
(175, 'Ride', 'created', 'App\\Ride', 3, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"VAN\",\"drop_off\":\"Sultanabad\",\"pick_up\":\"Layari\",\"wheel_chair\":\"yes\",\"no_of_passenger\":null,\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"take_ride_now\",\"ride_type\":\"private\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:51:01', '2021-10-05 05:51:01'),
(176, 'Ride', 'created', 'App\\Ride', 1, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"SUV\",\"drop_off\":\"Gulshan\",\"pick_up\":\"Keamari\",\"wheel_chair\":null,\"no_of_passenger\":\"3\",\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"take_ride_now\",\"ride_type\":\"shared\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:51:27', '2021-10-05 05:51:27'),
(177, 'Ride', 'created', 'App\\Ride', 2, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"VAN\",\"drop_off\":\"Sultanabad\",\"pick_up\":\"Layari\",\"wheel_chair\":\"yes\",\"no_of_passenger\":null,\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"take_ride_now\",\"ride_type\":\"private\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:51:31', '2021-10-05 05:51:31'),
(178, 'Ride', 'created', 'App\\Ride', 3, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"SUV\",\"drop_off\":\"Defence\",\"pick_up\":\"Clifton\",\"wheel_chair\":null,\"no_of_passenger\":\"3\",\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"2\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"schedule_a_ride\",\"ride_type\":\"shared\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:52:45', '2021-10-05 05:52:45'),
(179, 'Ride', 'created', 'App\\Ride', 4, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"car_class\":\"VAN\",\"drop_off\":\"Gulshan\",\"pick_up\":\"Keamari\",\"wheel_chair\":\"yes\",\"no_of_passenger\":null,\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"cancell_by\":null,\"type\":\"schedule_a_ride\",\"ride_type\":\"private\",\"fare\":null,\"status\":null,\"parent_id\":null,\"remarks\":null,\"penality\":null}}', '2021-10-05 05:53:21', '2021-10-05 05:53:21'),
(180, 'Ride', 'created', 'App\\Ride', 1, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"cancell_by\":null,\"penality\":null,\"type\":\"take_ride_now\",\"ride_type\":\"shared\",\"car_class\":\"SUV\",\"pick_up\":\"Keamari\",\"drop_off\":\"Gulshan\",\"date\":null,\"time\":null,\"wheel_chair\":null,\"no_of_passenger\":\"3\",\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"fare\":null,\"status\":\"pending\",\"remarks\":null}}', '2021-10-05 06:43:57', '2021-10-05 06:43:57');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(181, 'Ride', 'created', 'App\\Ride', 2, 'App\\User', 17, '{\"attributes\":{\"user_id\":17,\"driver_id\":null,\"cancell_by\":null,\"penality\":null,\"type\":\"schedule_a_ride\",\"ride_type\":\"private\",\"car_class\":\"VAN\",\"pick_up\":\"Keamari\",\"drop_off\":\"Gulshan\",\"date\":\"2021-04-26\",\"time\":\"06:39:34\",\"wheel_chair\":\"yes\",\"no_of_passenger\":null,\"small_luggage_bags\":\"3\",\"large_luggage_bags\":\"3\",\"accepted_at\":null,\"start_at\":null,\"cancell_at\":null,\"completed_at\":null,\"fare\":null,\"status\":\"pending\",\"remarks\":null}}', '2021-10-05 06:55:56', '2021-10-05 06:55:56'),
(182, 'User', 'created', 'App\\User', 20, 'App\\User', 1, '{\"attributes\":{\"added_by\":1,\"updated_by\":null,\"name\":\"Driver 2\",\"image\":\"\\/uploads\\/default.jpg\",\"latitude\":null,\"longitude\":null,\"phone\":null,\"date_of_birth\":null,\"gender\":null,\"email\":\"driver2@yopmail.com\",\"type\":null,\"password\":\"$2y$10$edGnKTxm7pzHdhENOt0tSu4eOZD5VAMt6PEA4BIN2NFYAHaHWuAnS\",\"otp\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"isFirstTime\":null,\"email_verified_at\":\"2021-10-05T13:11:19.000000Z\",\"status\":0,\"mode\":null}}', '2021-10-05 08:11:19', '2021-10-05 08:11:19'),
(183, 'Ride', 'updated', 'App\\Ride', 1, 'App\\User', 18, '{\"attributes\":{\"driver_id\":18,\"accepted_at\":\"2021-10-06 11:35:58\"},\"old\":{\"driver_id\":null,\"accepted_at\":null}}', '2021-10-06 06:35:58', '2021-10-06 06:35:58'),
(184, 'Ride', 'updated', 'App\\Ride', 1, 'App\\User', 18, '{\"attributes\":{\"accepted_at\":\"2021-10-06 11:39:51\"},\"old\":{\"accepted_at\":\"2021-10-06 11:35:58\"}}', '2021-10-06 06:39:51', '2021-10-06 06:39:51'),
(185, 'Ride', 'updated', 'App\\Ride', 1, 'App\\User', 18, '{\"attributes\":{\"accepted_at\":\"2021-10-06 11:40:50\"},\"old\":{\"accepted_at\":\"2021-10-06 11:39:51\"}}', '2021-10-06 06:40:50', '2021-10-06 06:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 17, 'abc, xyz', '2021-10-01 09:37:11', '2021-10-01 09:37:59'),
(2, 17, 'Noor Trade Center', '2021-10-01 09:38:21', '2021-10-01 09:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `car_makes`
--

CREATE TABLE `car_makes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_makes`
--

INSERT INTO `car_makes` (`id`, `name`, `description`, `capacity`, `created_at`, `updated_at`) VALUES
(1, '2021', '2021 Model', '', '2021-09-29 04:46:04', '2021-09-29 04:46:04'),
(2, '2020', '2020 Model', '', '2021-09-29 04:46:16', '2021-09-29 04:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `value`, `percent`, `created_at`, `updated_at`) VALUES
(1, '1', 'percentage', '2021-09-30 11:46:37', '2021-09-30 06:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `value`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'terms_condition_title', 'Terms & Conditions', '16', '2020-05-28 10:06:29', '2021-09-20 05:10:07'),
(2, 'terms_condition_paragraph', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(3, 'question_1', 'Lorem Ipsum is simply dummy text', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(4, 'answer_1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(5, 'question_2', 'Intellectual Property Rights', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(6, 'answer_2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(7, 'question_3', 'Readable content of a page when looking at its layout.', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(8, 'answer_3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '16', '2020-05-28 10:06:30', '2021-03-23 02:32:42'),
(9, 'question_4', 'What is Lorem Ipsum?', '16', '2021-03-10 15:35:38', '2021-03-23 02:32:42'),
(10, 'answer_4', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', '16', NULL, NULL),
(11, 'question_5', 'What is Lorem Ipsum?', '16', NULL, NULL),
(12, 'answer_5', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', '16', NULL, NULL),
(13, 'question_6', 'Lorem Ipsum is simply dummy text', '16', NULL, NULL),
(14, 'answer_6', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '16', NULL, NULL),
(15, 'privacy_policy_title', 'Privacy Policy', '16', NULL, NULL),
(16, 'privacy_policy_paragraph', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `car_make_id` int(11) DEFAULT NULL,
  `driver_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_registration_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `driver_id`, `car_make_id`, `driver_contact`, `driver_photo`, `car_photo`, `car_registration_number`, `car_type`, `created_at`, `updated_at`) VALUES
(1, 18, 1, '03043167149', '/public/uploads/driver_images/779b7513263ef185b6d094af290ef5401632913992.png', '/public/uploads/car_images/e7f374292d1dbca27aeb654f0d7d52cc1632913992.jpg', 'KKU3834', 'Suzuki', '2021-09-29 06:13:12', '2021-09-29 06:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `driver_sessions`
--

CREATE TABLE `driver_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_08_134026_create_permission_tables', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_old_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_old_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_old_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_old_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_old_table', 2),
(12, '2021_07_13_111023_create_orders_table', 3),
(13, '2021_04_30_100430_create_activity_log_table', 4),
(15, '2021_07_14_131734_create_commission_table', 5),
(16, '2021_07_14_140052_create_driver_sessions_table', 6),
(17, '2021_07_15_132732_create_driver_details_table', 7),
(18, '2021_07_16_153229_create_settings_table', 8),
(22, '2021_07_19_133916_create_car_makes_table', 11),
(26, '2021_07_20_115242_create_rate_table', 12),
(27, '2021_07_20_115242_create_reviews_table', 13),
(28, '2021_01_08_134027_create_rides_table', 14),
(29, '2021_07_20_111858_create_address_table', 14),
(30, '2021_07_29_153800_create_payments_table', 15),
(31, '2021_09_20_083725_create_contents_table', 16),
(32, '2016_06_01_000001_create_oauth_auth_codes_table', 17),
(33, '2016_06_01_000002_create_oauth_access_tokens_table', 17),
(34, '2016_06_01_000003_create_oauth_refresh_tokens_table', 17),
(35, '2016_06_01_000004_create_oauth_clients_table', 17),
(36, '2016_06_01_000005_create_oauth_personal_access_clients_table', 17),
(37, '2021_10_05_114504_create_rides_decline_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 17),
(5, 'App\\User', 18),
(5, 'App\\User', 20);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0e8f98797953cb20b2cbc80aedaab0f90434218103717c5e22954872dbed11fc38b6d37be51b13d2', 18, 1, 'Personal Access Token', '[]', 1, '2021-09-29 11:31:39', '2021-09-29 11:31:39', '2022-09-29 16:31:39'),
('3cf00825f46c4c57d68cbcd5a536b2391865e942ceb81e9beb6130f2ed76b5d770012618b287607b', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-04 06:21:56', '2021-10-04 06:21:56', '2022-10-04 11:21:56'),
('459e33c438e482c094db919d25f06b6792867d6e637e5ffad4296b981b72fdb210f84391c41bab7f', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-01 10:57:56', '2021-10-01 10:57:56', '2022-10-01 15:57:56'),
('6720719cb48d21bf27e706e2a5773680a27cda4663a3092948c7be60d4ee2a6709bf929554d5dc44', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-04 06:26:12', '2021-10-04 06:26:12', '2022-10-04 11:26:12'),
('6ae50ab268646ed834a6cbe7e8a73e4b2e11fbc6846f74c8378a975aacd9b3eb5645558e6a3526f3', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-01 11:04:28', '2021-10-01 11:04:28', '2022-10-01 16:04:28'),
('741f351b1948672fe52c244bb259e98b07ace13bd06310414bee434d6685f776d22697bd83cf2437', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-01 06:49:11', '2021-10-01 06:49:11', '2022-10-01 11:49:11'),
('786138e4dcbd544f51173ca5889638d3c747f30db4087a31ebcaf86a029e5fdfb060b66ecf60e304', 17, 1, 'Personal Access Token', '[]', 0, '2021-09-29 11:33:52', '2021-09-29 11:33:52', '2022-09-29 16:33:52'),
('81c534dd0467dc88a9869de10a5e1e0ea90a781fa3a7fa906bbe9b310f72660f7eed103fd66cc959', 17, 1, 'Personal Access Token', '[]', 0, '2021-09-29 11:59:47', '2021-09-29 11:59:47', '2022-09-29 16:59:47'),
('8380e7de6226b2bd0c292f0f362bf68a6c58e7d263ad3cf512a24780032941855a857a32ed80ca13', 17, 1, 'Personal Access Token', '[]', 1, '2021-10-01 09:35:19', '2021-10-01 09:35:19', '2022-10-01 14:35:19'),
('8cc4dcedcb83fc46781f53cf8b4ae29d7c7319de12394cef5ed1e61a4babaf1e3c57958e78a61e1b', 17, 1, 'Personal Access Token', '[]', 1, '2021-09-29 11:09:27', '2021-09-29 11:09:27', '2022-09-29 16:09:27'),
('90f63aa572c1258e27d1b555d48b2f58b5f50636f80b43c342c3c814a638fda6965aa150ab694bed', 10, 1, 'Personal Access Token', '[]', 1, '2021-09-28 10:54:41', '2021-09-28 10:54:41', '2022-09-28 15:54:41'),
('97ef33f16c6c9392d8ed0712a7b93220750030718b468719c44a7b8448b4ace8207b0ef80161673a', 17, 1, 'Personal Access Token', '[]', 0, '2021-10-01 09:46:37', '2021-10-01 09:46:37', '2022-10-01 14:46:37'),
('a67b6be15ff843eb95423ba209382de01cee050c115bb50e86ba239d5257feab44e3ded7d8b4127a', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-01 11:09:11', '2021-10-01 11:09:11', '2022-10-01 16:09:11'),
('a9afee6ef841361dda497c38dae9f30a05230715657ab6537cdf70326d565842c99374aefe697a66', 17, 1, 'Personal Access Token', '[]', 0, '2021-10-05 11:09:36', '2021-10-05 11:09:36', '2022-10-05 16:09:36'),
('b12043f7489fcb766be4ebfab09f8e891ecb399652cca08dbb8a9f9369d672d3b8280ebf18ab0631', 10, 1, 'Personal Access Token', '[]', 1, '2021-09-28 10:25:32', '2021-09-28 10:25:32', '2022-09-28 15:25:32'),
('b13a894c8f315573f6ed6b34ad232a2ed54c1c3efcd591e53cf15f74089b3362a4f2341728d1f32d', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-05 06:58:40', '2021-10-05 06:58:40', '2022-10-05 11:58:40'),
('b9b597d96b8a75ed145a4789212a82c243e10f2f3edc585c94a722f03fa4bc4aaac763a33230c6f4', 4, 1, 'Personal Access Token', '[]', 1, '2021-09-28 10:28:02', '2021-09-28 10:28:02', '2022-09-28 15:28:02'),
('bab3cf4641443c0ab49fea928e8691f09bc4f866afe34bee8d8959f425cacc8910426a796ba186c4', 18, 1, 'Personal Access Token', '[]', 1, '2021-09-29 05:56:51', '2021-09-29 05:56:51', '2022-09-29 10:56:51'),
('bd6076014b17473e23b2fc9bd8a36f7a68b8e3153544366598d7f9796d923ecff3075d46acb5bb4c', 20, 1, 'Personal Access Token', '[]', 1, '2021-10-05 08:33:50', '2021-10-05 08:33:50', '2022-10-05 13:33:50'),
('d623f066baa98c558445c46c380494268a1cbcda94b4beefc4ca1d38e4f453839d255d141999e8ec', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-01 07:38:55', '2021-10-01 07:38:55', '2022-10-01 12:38:55'),
('ddb0dada4b95f63645d2396948f2d457f9573b56b176edbc8062626bdadc2d9db6ff6cd96d65df69', 4, 1, 'Personal Access Token', '[]', 1, '2021-09-28 10:55:15', '2021-09-28 10:55:15', '2022-09-28 15:55:15'),
('e0f4f609c2938234d6743b4e6056079059bc947fa5a1ca22b9eccf6e84551abccddc809a0b5e3829', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-04 06:25:56', '2021-10-04 06:25:56', '2022-10-04 11:25:56'),
('e9f8a329b964bc0b2d268c1270abc2fad21de5f57ade66782ff0b98cf6103f516645492efeba313f', 17, 1, 'Personal Access Token', '[]', 1, '2021-10-04 07:27:31', '2021-10-04 07:27:31', '2022-10-04 12:27:31'),
('ecb9b8fe8f536682b0947b3c9888f23687ce7ad9b2dbd7490fd534ce0b9f3d3919acdc5867a09e0c', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-01 09:42:29', '2021-10-01 09:42:29', '2022-10-01 14:42:29'),
('fb85e7722fa15176a43b107a080b48b61fb14e6aa2dec28cf2fc0d9750a0290f279805152357a831', 18, 1, 'Personal Access Token', '[]', 1, '2021-10-05 08:34:24', '2021-10-05 08:34:24', '2022-10-05 13:34:24'),
('fe5b93abeaa402044d88caeb538314243d0c6bf045e968ae49658b66adf37d302180915a8e88d8b3', 18, 1, 'Personal Access Token', '[]', 0, '2021-10-06 04:23:33', '2021-10-06 04:23:33', '2022-10-06 09:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'hZZctpIi4GWAwwnBnlgkcnURTMOE1ZswqjwA3umz', NULL, 'http://localhost', 1, 0, 0, '2021-09-28 10:24:50', '2021-09-28 10:24:50'),
(2, NULL, 'Laravel Password Grant Client', '5eUt4Ktn0z1QmgqXBVVJX0zjpe6B6pMVGmO6lhai', 'users', 'http://localhost', 0, 1, 0, '2021-09-28 10:24:50', '2021-09-28 10:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-28 10:24:50', '2021-09-28 10:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ride_fare` int(11) NOT NULL,
  `willgo_comm` int(11) NOT NULL,
  `taxes` int(50) NOT NULL,
  `type` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `added_by`, `updated_by`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'role-list', 'web', '2021-07-08 11:49:30', '2021-07-08 11:49:30'),
(2, 1, NULL, 'role-create', 'web', '2021-07-08 11:49:49', '2021-07-08 11:49:49'),
(3, 1, NULL, 'role-edit', 'web', '2021-07-08 11:49:58', '2021-07-08 11:49:58'),
(4, 1, NULL, 'role-delete', 'web', '2021-07-08 11:50:07', '2021-07-08 11:50:07'),
(5, 1, NULL, 'user-list', 'web', '2021-07-08 11:50:28', '2021-07-08 11:50:28'),
(6, 1, NULL, 'user-create', 'web', '2021-07-08 11:50:38', '2021-07-08 11:50:38'),
(7, 1, NULL, 'user-edit', 'web', '2021-07-08 11:50:46', '2021-07-08 11:50:46'),
(8, 1, NULL, 'user-delete', 'web', '2021-07-08 11:50:58', '2021-07-08 11:50:58'),
(9, 1, NULL, 'permission-list', 'web', '2021-07-08 11:51:21', '2021-07-08 11:51:21'),
(10, 1, NULL, 'permission-create', 'web', '2021-07-08 11:51:31', '2021-07-08 11:51:31'),
(11, 1, NULL, 'permission-edit', 'web', '2021-07-08 11:51:39', '2021-07-08 11:51:39'),
(12, 1, NULL, 'permission-delete', 'web', '2021-07-08 11:51:49', '2021-07-08 11:51:49'),
(13, 1, 1, 'carmodel-list', 'web', '2021-07-09 07:35:03', '2021-09-28 11:46:33'),
(14, 1, 1, 'carmodel-delete', 'web', '2021-07-09 07:35:21', '2021-09-28 11:46:28'),
(15, 1, 1, 'carmodel-edit', 'web', '2021-07-09 07:35:34', '2021-09-28 11:46:23'),
(16, 1, 1, 'carmodel-create', 'web', '2021-07-09 07:35:53', '2021-09-28 11:46:16'),
(17, 1, 1, 'driver-list', 'web', '2021-07-09 07:36:58', '2021-07-09 11:24:05'),
(18, 1, NULL, 'driver-delete', 'web', '2021-07-09 07:37:15', '2021-07-09 07:37:15'),
(19, 1, NULL, 'driver-edit', 'web', '2021-07-09 07:37:28', '2021-07-09 07:37:28'),
(20, 1, NULL, 'driver-create', 'web', '2021-07-09 07:37:42', '2021-07-09 07:37:42'),
(21, 1, NULL, 'ride-list', 'web', '2021-07-09 11:30:32', '2021-07-09 11:30:32'),
(22, 1, NULL, 'setting-list', 'web', '2021-07-13 09:22:03', '2021-07-13 09:22:03'),
(23, 1, NULL, 'report-list', 'web', '2021-07-13 09:32:29', '2021-07-13 09:32:29'),
(26, 1, 1, 'car_make-list', 'web', '2021-07-20 05:03:34', '2021-09-29 04:43:03'),
(27, 1, 1, 'car_make-create', 'web', '2021-07-20 05:04:04', '2021-09-29 04:42:58'),
(28, 1, 1, 'car_make-edit', 'web', '2021-07-20 05:04:16', '2021-09-29 04:42:52'),
(29, 1, 1, 'car_make-delete', 'web', '2021-07-20 05:04:32', '2021-09-29 04:42:45'),
(30, 1, NULL, 'admin-list', 'web', '2021-09-10 09:06:25', '2021-09-10 09:06:25'),
(31, 1, NULL, 'admin-create', 'web', '2021-09-10 09:06:35', '2021-09-10 09:06:35'),
(32, 1, NULL, 'admin-edit', 'web', '2021-09-10 09:06:45', '2021-09-10 09:06:45'),
(33, 1, NULL, 'admin-delete', 'web', '2021-09-10 09:06:56', '2021-09-10 09:06:56'),
(34, 1, NULL, 'content-list', 'web', '2021-09-20 04:32:57', '2021-09-20 04:32:57'),
(35, 1, NULL, 'content-edit', 'web', '2021-09-20 04:33:12', '2021-09-20 04:33:12'),
(36, 1, NULL, 'log-list', 'web', '2021-09-29 07:44:24', '2021-09-29 07:44:24'),
(37, 1, NULL, 'driver-detail-list', 'web', '2021-09-30 08:34:11', '2021-09-30 08:34:11'),
(38, 1, NULL, 'driver-detail-view', 'web', '2021-09-30 08:34:31', '2021-09-30 08:34:31'),
(39, 1, NULL, 'driver-session-list', 'web', '2021-09-30 08:36:42', '2021-09-30 08:36:42'),
(40, 1, NULL, 'driver-session-edit', 'web', '2021-09-30 08:37:05', '2021-09-30 08:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_id` bigint(20) UNSIGNED NOT NULL,
  `get_review` bigint(20) UNSIGNED NOT NULL,
  `reviewed_by` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `cancell_by` int(20) DEFAULT NULL,
  `penality` int(50) DEFAULT NULL,
  `type` enum('take_ride_now','schedule_a_ride') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ride_type` enum('shared','private') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_class` enum('SUV','VAN') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `wheel_chair` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_passenger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_luggage_bags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_luggage_bags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `cancell_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `status` enum('accepted','arrived','started','completed','cancelled','pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`id`, `user_id`, `driver_id`, `cancell_by`, `penality`, `type`, `ride_type`, `car_class`, `pick_up`, `drop_off`, `pick_up_latitude`, `pick_up_longitude`, `drop_off_latitude`, `drop_off_longitude`, `date`, `time`, `wheel_chair`, `no_of_passenger`, `small_luggage_bags`, `large_luggage_bags`, `accepted_at`, `start_at`, `cancell_at`, `completed_at`, `fare`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 17, 18, NULL, NULL, 'take_ride_now', 'shared', 'SUV', 'Keamari', 'Gulshan', '24.9049685', '67.077845', '24.8745579', '67.0376244', NULL, NULL, NULL, '3', '3', '3', '2021-10-06 11:40:50', NULL, NULL, NULL, NULL, 'pending', NULL, '2021-10-05 06:43:57', '2021-10-06 06:40:50'),
(2, 17, NULL, NULL, NULL, 'schedule_a_ride', 'private', 'VAN', 'Keamari', 'Gulshan', NULL, NULL, NULL, NULL, '2021-04-26', '06:39:34', 'yes', NULL, '3', '3', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2021-10-05 06:55:56', '2021-10-05 06:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `rides_decline`
--

CREATE TABLE `rides_decline` (
  `ride_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `added_by`, `updated_by`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Admin', 'web', '2021-07-08 11:55:49', '2021-07-08 12:42:27'),
(2, 1, 1, 'User', 'web', '2021-07-08 12:17:58', '2021-07-08 12:42:17'),
(5, 1, NULL, 'Driver', 'web', '2021-07-09 08:13:37', '2021-07-09 08:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 5),
(3, 1),
(3, 5),
(4, 1),
(4, 5),
(5, 1),
(5, 2),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 5),
(8, 1),
(8, 5),
(9, 1),
(9, 2),
(9, 5),
(10, 1),
(10, 5),
(11, 1),
(11, 5),
(12, 1),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 1),
(17, 5),
(18, 1),
(18, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(22, 1),
(23, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Wilgo', '1', '2020-05-28 10:06:29', '2021-10-06 10:14:50'),
(2, 'email', 'admin@wilgo.com', '1', '2020-05-28 10:06:30', '2021-10-06 10:14:50'),
(3, 'secondary_email', 'support@wilgo.com', '1', '2020-05-28 10:06:30', '2021-10-06 10:14:50'),
(4, 'contact_number', '12345678', '1', '2020-05-28 10:06:30', '2021-10-06 10:14:50'),
(6, 'whatsapp_number', '147852369', '1', '2020-05-28 10:06:30', '2021-10-06 10:14:50'),
(7, 'address', 'xyz', '1', '2020-05-28 10:06:30', '2021-10-06 10:14:50'),
(11, 'distance', '50000', '1', '2021-09-30 14:45:36', '2021-10-06 10:14:50'),
(12, 'rate_per_mile', '10', '1', '2021-10-06 15:01:39', '2021-10-06 10:14:50'),
(13, 'rate_per_minute', '5', '1', '2021-10-06 15:01:39', '2021-10-06 10:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_by` enum('email','facebook') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_provider` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isFirstTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `mode` enum('shared','private') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `added_by`, `updated_by`, `name`, `email`, `image`, `latitude`, `longitude`, `phone`, `date_of_birth`, `gender`, `type`, `email_verified_at`, `password`, `remember_token`, `otp`, `device_type`, `device_token`, `verified_by`, `social_provider`, `social_token`, `social_id`, `isFirstTime`, `status`, `mode`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'admin', 'admin@wilgo.com', NULL, NULL, NULL, '03002634456', NULL, NULL, NULL, '2021-04-26 01:39:34', '$2y$10$3TWU8LoWfDo9RuTnyC.mqecOXH.tec3.2XuNWQuBm1v3kA9RJKiOu', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-01-08 09:15:51', '2021-09-10 06:15:44'),
(17, 1, 1, 'User', 'user@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-28 12:31:04', '$2y$10$sS7DirM2Hsz8VtKyzf7Q7eQT7pIjJAbXdlMsGUXPM9K4hpGor552G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-09-28 12:31:04', '2021-09-28 12:36:56'),
(18, 1, 1, 'Driver', 'driver@yopmail.com', '/uploads/driver/779b7513263ef185b6d094af290ef5401632913064.png', '24.90628280557342', '67.07237028142383', '03043167149', NULL, NULL, NULL, '2021-09-28 12:32:50', '$2y$10$66D0L3Ek9W66fBgOXmNLu.0nkJLOkE8HOqdUmtWy/UIlqXvPy22P6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'shared', '2021-09-28 12:32:50', '2021-10-01 09:45:57'),
(20, 1, NULL, 'Driver 2', 'driver2@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-05 08:11:19', '$2y$10$edGnKTxm7pzHdhENOt0tSu4eOZD5VAMt6PEA4BIN2NFYAHaHWuAnS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-05 08:11:19', '2021-10-05 08:11:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_makes`
--
ALTER TABLE `car_makes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_sessions`
--
ALTER TABLE `driver_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rides` (`ride_id`),
  ADD KEY `passengers` (`user_id`),
  ADD KEY `drivers` (`driver_id`),
  ADD KEY `parents` (`parent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ride_id_foreign` (`ride_id`),
  ADD KEY `reviews_get_review_foreign` (`get_review`),
  ADD KEY `reviews_reviewed_by_foreign` (`reviewed_by`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `otp` (`otp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_makes`
--
ALTER TABLE `car_makes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_sessions`
--
ALTER TABLE `driver_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
