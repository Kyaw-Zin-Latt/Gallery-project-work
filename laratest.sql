-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:32 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laratest`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_and_settings`
--

CREATE TABLE `about_and_settings` (
  `about_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_on` tinyint(4) NOT NULL DEFAULT 0,
  `ads_client` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_slot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `analyt_on` tinyint(4) NOT NULL DEFAULT 0,
  `analyt_track_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GDPR` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_and_settings`
--

INSERT INTO `about_and_settings` (`about_id`, `about_title`, `about_description`, `about_email`, `about_phone`, `about_website`, `ads_on`, `ads_client`, `ads_slot`, `analyt_on`, `analyt_track_id`, `facebook`, `google_plus`, `instagram`, `youtube`, `pinterest`, `twitter`, `GDPR`, `upload_point`, `created_at`, `updated_at`) VALUES
('abt1', 'MMS ITss', 'MMS မှကြိုးစားမှုများကို အသိအမှတ်ပြု ပြန်လည်ပေးအပ်ခဲ့သော client များရဲ့ ရင်တွင်းစကားများအား ပြန်လည်မျှဝေပေးပါရစေ။', 'kzddl@gmail.com', '+959773926994', 'https://google.co', 1, 'ca-pub-7127831079008160\r\n', '6882887537\r\n', 1, 'UA-79164209-2', 'http://www.facebook.co', 'http://www.google.com', 'http://www.instagram.com', 'http://www.youtube.com', 'http://www.pinterest.com', 'http://www.twitter.com', 'MMS မှကြိုးစားမှုများကို အသိအမှတ်ပြု ပြန်လည်ပေးအပ်ခဲ့သော client များရဲ့ ရင်တွင်းစကားများအား ပြန်လည်မျှဝေပေးပါရစေ။', 50, NULL, '2021-10-24 07:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `backend_configs`
--

CREATE TABLE `backend_configs` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backend_configs`
--

INSERT INTO `backend_configs` (`id`, `created_at`, `updated_at`) VALUES
('be1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `is_publish`, `created_at`, `updated_at`) VALUES
('cat61715a0e30a2f', 'Business', 1, '2021-10-21 12:16:14', '2021-10-30 07:37:39'),
('cat61715a3d7a7a6', 'Travel', 1, '2021-10-21 12:17:01', '2021-10-30 07:37:35'),
('cat61715a567dce5', 'Flowers', 0, '2021-10-21 12:17:26', '2021-10-21 12:17:26'),
('cat61715a7637d8a', 'Fashion', 1, '2021-10-21 12:17:58', '2021-10-30 07:37:32'),
('cat61715a96902fc', 'Arts', 1, '2021-10-21 12:18:30', '2021-10-30 07:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
('color617286d69eab9', 'Red update', '#de0000', '2021-10-22 09:39:34', '2021-10-22 09:49:39'),
('color6172937098140', 'SlateGray', '#07c6bb', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color61729370981d9', 'SaddleBrown', '#65e897', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color6172937098217', 'PaleGoldenRod', '#bd2a5c', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color617293709824e', 'Orchid', '#8d8481', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color6172937098282', 'CadetBlue', '#9c6d61', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color61729370982b4', 'Linen', '#2e542e', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color61729370982e6', 'Brown', '#2a7976', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color6172937098319', 'Violet', '#1d2ae4', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color617293709834c', 'MediumSpringGreen', '#aa7894', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color617293709837f', 'Pink', '#daf01e', '2021-10-22 10:33:20', '2021-10-22 10:33:20'),
('color61729370983b0', 'CadetBlue', '#f3571c', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color61729370983e6', 'Lavender', '#aa2792', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098418', 'Gray', '#9f7b92', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098464', 'NavajoWhite', '#d3bb3a', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color617293709849b', 'CornflowerBlue', '#e5bdd6', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color61729370984ce', 'SeaShell', '#a75064', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098500', 'Indigo', '#b722c3', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098533', 'NavajoWhite', '#aeb22a', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098565', 'DarkSlateGray', '#bdfd41', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color6172937098594', 'OliveDrab', '#7d5247', '2021-10-22 10:33:21', '2021-10-22 10:33:21'),
('color617296661f20d', 'LightCyan', '#11f993', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f272', 'SpringGreen', '#b450df', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f296', 'RosyBrown', '#454a05', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f2b6', 'SaddleBrown', '#e24586', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f2d3', 'DarkOliveGreen', '#1af53b', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f2ee', 'Yellow', '#061a6e', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f309', 'DarkMagenta', '#3831fe', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f324', 'DeepPink', '#af31df', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f340', 'DarkGray', '#fa6958', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f35c', 'PeachPuff', '#f1ac6f', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f377', 'Fuchsia', '#06ab97', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f391', 'BlueViolet', '#ee7f5c', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f3ad', 'PowderBlue', '#b54d24', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f3c7', 'OliveDrab', '#ef40b7', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f3e3', 'Teal', '#524630', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f3fd', 'Cyan', '#b7c48a', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f417', 'CornflowerBlue', '#0ce59d', '2021-10-22 10:45:58', '2021-10-22 10:45:58'),
('color617296661f432', 'Bisque', '#f9a517', '2021-10-22 10:45:59', '2021-10-22 10:45:59'),
('color617296661f467', 'Coral', '#981e1c', '2021-10-22 10:45:59', '2021-10-22 10:45:59');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_18_173213_create_categories_table', 1),
(6, '2021_10_20_141121_create_photos_table', 2),
(7, '2021_10_22_150600_create_colors_table', 3),
(8, '2021_10_23_142035_create_about_and_settings_table', 4),
(9, '2021_10_24_140758_create_backend_configs_table', 5),
(10, '2021_10_24_185221_create_versions_table', 6),
(14, '2021_10_30_154730_create_wallpapers_table', 7),
(15, '2021_11_06_190153_add_role_id_to_users_table', 8),
(16, '2021_11_06_193249_create_roles_table', 9),
(17, '2021_11_07_122501_add_is_ban_to_users_table', 10);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_width` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_height` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `parent_id`, `img_type`, `photo`, `img_width`, `img_height`, `created_at`, `updated_at`) VALUES
('img61715a0e4b800', 'be1', 'favicon', '617525d9d9362_logo.png', '128', '128', NULL, '2021-10-24 09:22:33'),
('img61715a0e4b83e', 'cat61715a0e30a2f', 'category-icon', '61715a0e45574_icon.png', '128', '128', '2021-10-21 12:16:14', '2021-10-21 12:16:14'),
('img61715a0e4b99e\r\n', 'abt1', 'about', '617408c43b556_about.jpg', '840', '564', NULL, '2021-10-23 13:06:12'),
('img61715a0e5756f', 'cat61715a0e30a2f', 'category', '61715a0e45553_cover.jpg', '840', '564', '2021-10-21 12:16:14', '2021-10-21 12:16:14'),
('img61715a0e5be22\r\n', 'be1', 'login-bg', '618640dc5b815_loginBg.jpg', '840', '564', NULL, '2021-11-06 08:46:20'),
('img61715a3d8d4d1', 'cat61715a3d7a7a6', 'category-icon', '61715a3d8a8e4_icon.png', '128', '128', '2021-10-21 12:17:01', '2021-10-21 12:17:01'),
('img61715a3d9ac7a', 'cat61715a3d7a7a6', 'category', '61715a3d8a8cc_cover.png', '1000', '667', '2021-10-21 12:17:01', '2021-10-21 12:17:01'),
('img61715a5697e79', 'cat61715a567dce5', 'category-icon', '61715a5692918_icon.png', '128', '128', '2021-10-21 12:17:26', '2021-10-21 12:17:26'),
('img61715a56a00d4', 'cat61715a567dce5', 'category', '61715a56928f9_cover.png', '225', '225', '2021-10-21 12:17:26', '2021-10-21 12:17:26'),
('img61715a7649cef', 'cat61715a7637d8a', 'category-icon', '61715a7646c7e_icon.png', '128', '128', '2021-10-21 12:17:58', '2021-10-21 12:17:58'),
('img61715a7654ff0', 'cat61715a7637d8a', 'category', '61715a7646c5f_cover.png', '225', '225', '2021-10-21 12:17:58', '2021-10-21 12:17:58'),
('img61715a8e5be55', 'be1', 'logo', '617ceed66c0d6_logo.png', '225', '225', NULL, '2021-10-30 07:05:58'),
('img61715a969e658', 'cat61715a96902fc', 'category-icon', '6171a432b69f2_icon.png', '128', '128', '2021-10-21 12:18:30', '2021-10-21 17:32:34'),
('img61715a96a9fe8', 'cat61715a96902fc', 'category', '61715a969bdf7_cover.jpg', '225', '225', '2021-10-21 12:18:30', '2021-10-21 12:18:30'),
('img617e8c6c10b6a', 'paper617e8c6be5bb2', 'wallpaper', '6180198f2ee45_wallImage.jpg', '2560', '1440', '2021-10-31 12:30:36', '2021-11-01 16:45:03'),
('img617ff4b5d9542', 'paper617ff4b5c33a7', 'wallpaper', '617ff4b5c09fa_wallImage.png', '521', '330', '2021-11-01 14:07:49', '2021-11-01 14:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL),
(2, 'editor', 'Editor', NULL, NULL),
(3, 'author', 'Author', NULL, NULL),
(4, 'normal', 'Normal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT 4,
  `is_ban` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `is_ban`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kyaw Zin Latt', 'kzl@gmail.com', 1, 0, NULL, '$2y$10$4lRgnA782yw6YamIxQG9XOzanfn6cnrzxPjYlpEcJY9rHc0IjxGRq', '6171034b1ce96_photo.jpg', NULL, '2021-10-20 07:07:35', '2021-10-21 06:06:03'),
(2, 'Mg Mg', 'mgmg@gmail.com', 3, 0, NULL, '$2y$10$77RgB9VDaQPI6OzUCfhg0OgIAFngLcERgY3PRJQlZgLOiUg5RY..e', '61750e06e65aa_photo.jpg', NULL, '2021-10-21 12:05:05', '2021-11-07 03:58:29'),
(4, 'Teacher', 'teacher@gmail.com', 2, 0, NULL, '$2y$10$/Xm.Wfp7yfPw5Bk04If2KO8oyWBUBVThf4wzwnLMIz8TOs9d8A3jW', NULL, NULL, '2021-11-07 04:01:46', '2021-11-07 04:03:14'),
(5, 'Eaint Chue Mon', 'eaint@gmail.com', 4, 0, NULL, '$2y$10$78pUsf98XdkL2nB2.xtIxOQAIcAq9wITm4sNzUVQH2Vu1r9L/EALa', NULL, NULL, '2021-11-07 04:22:10', '2021-11-07 06:49:53'),
(6, 'Cydney Kiehn', 'parisian.erna@example.net', 4, 0, '2021-11-07 05:16:11', '$2y$10$UoSUgtqJrBAnN14g79.HNu4GLXUhiz.csiyHMsI98HPQeoUtqyZ0u', NULL, 'ddaZga9Nyw', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(7, 'Raphael Flatley', 'ned94@example.net', 4, 0, '2021-11-07 05:16:11', '$2y$10$eIAL5oCAddAiD2uQ1MddSe4TgitEVTU.lIVW3n5JEpGKBVYF6y02S', NULL, 'CrQzmL8c77', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(8, 'Jay Anderson MD', 'westley.corwin@example.net', 4, 0, '2021-11-07 05:16:11', '$2y$10$eRnuR6EZdsbVeVrSYojWfuf/T6sp3mexROlcx78jJ8c8zzEUBLqza', NULL, 'sQtFAMZLlK', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(9, 'Mrs. Agnes Will', 'von.norwood@example.org', 4, 0, '2021-11-07 05:16:11', '$2y$10$ZfcXW0X5Y/bbuEs1eZDyqeOiA1oAFHSw6Ozz7nDdYSGggNRmIv3JS', NULL, 'UgJ04m9LQH', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(10, 'Kristofer Swift', 'mohammed.wuckert@example.org', 4, 0, '2021-11-07 05:16:11', '$2y$10$TRP8.Mbq8FAn69VcdcxFWOu9BZvf0X3cpOuGuC.08Ex87oe0bh3we', NULL, '6NMooxCC8h', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(11, 'Elfrieda Pouros', 'toby.lubowitz@example.net', 4, 0, '2021-11-07 05:16:11', '$2y$10$EFaWUS03cLPkvXo0hrGEyuLRDFqLy/nDvE1CRL..l3q4Mql0JFWjG', NULL, 'tzYhPSMsfC', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(12, 'Mr. Walton Lowe PhD', 'xdickinson@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$Mn/Kzfyhy2AgCVO3E2qrn.vCFj9GQcUtHO1q4e8FIKLCtJvv8HTVa', NULL, 'vNEUH0xuXQ', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(13, 'Freddie Oberbrunner', 'schaden.seth@example.net', 4, 0, '2021-11-07 05:16:12', '$2y$10$C1zkLJy1YHIu4wTR.0fJYu4C03Oh7AjVRyM6QYG8WNs1q5TqbCTA.', NULL, 'dBWvQ6DjyG', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(14, 'Mitchell Gottlieb', 'williamson.magnus@example.net', 4, 0, '2021-11-07 05:16:12', '$2y$10$VgyFMASFagPW8NSdsrQ4refzYn8cl2NwAxbBl/4BCREz69qZ6.6cS', NULL, 'zZOX3hhKdA', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(15, 'Michelle Emard', 'pjacobi@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$zbHgZGdJtlp8aYW.P/iEZO9X3X9QBJ4ZKAsV6P4uugLbWID805mUy', NULL, '2ulN9D13fC', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(16, 'Rashawn Kreiger IV', 'mayra71@example.org', 4, 0, '2021-11-07 05:16:12', '$2y$10$tuB16mHHL7zvf0a8ur3Ow.o4VPg9HWl7c8rigv/OMDyQUwJS1YYa.', NULL, '7HnO8uqZSL', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(17, 'Mrs. Erica Mueller DDS', 'elvera.marquardt@example.org', 4, 0, '2021-11-07 05:16:12', '$2y$10$tNX9hlWZSFxCUYr4in5CVucZhf5nJv0in1X4voUoBnj2oiKOxRqRa', NULL, 'y87gABQ2a7', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(18, 'Donnell Ernser Sr.', 'mohr.nona@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$pRTmb0tLe6V04RqiusagOeBLlY4efIksiiB2KXoV7Uk8HxVMg8R0i', NULL, '4CdObHFAKS', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(19, 'Francisca Conroy', 'trevor39@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$00R3Ir.fbhoREqHDLk73DuHJYFpaSmHzVgB132TN4V5ySc728CS2i', NULL, '2Q4cbJbDaH', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(20, 'Gabriel Jenkins', 'flatley.kaleb@example.org', 4, 0, '2021-11-07 05:16:12', '$2y$10$8fgU9wPNIhi8FnG.fmY9t.ooAj91Kv8xLIRLo5geLZ0jaYIM4/L5u', NULL, 'OwcJKCXK5O', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(21, 'Amie Jacobi', 'gladys64@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$5PjIR2uVan/vhv/CVK.KpesboNFDfniJHKepUSdeAD7tJAq4J/GRu', NULL, 'CXV9ZtbY8x', '2021-11-07 05:16:13', '2021-11-07 05:16:13'),
(22, 'Palma Becker', 'gillian43@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$mguxaGG1aq5k5O4xInjSAeuVRbEWyRcEHOrosfSzm0A6Q6wr.Fsk2', NULL, 'TZMHcwi9u3', '2021-11-07 05:16:13', '2021-11-07 06:50:26'),
(23, 'Dr. Jorge Hermann', 'ghowe@example.com', 4, 0, '2021-11-07 05:16:12', '$2y$10$41omP3j0BdD3fVZUS6YWkupGnb3lsojJTnXeIzhIxVK6LgdKGdiyS', NULL, '4wWhMwIBj6', '2021-11-07 05:16:13', '2021-11-07 06:50:25'),
(24, 'Roberto Gleason', 'avandervort@example.com', 4, 0, '2021-11-07 05:16:13', '$2y$10$FkYkl2y4puWmVmT0ADfsPupE2WDzzGA/nwGDNesDU7eaT6QIn35WG', NULL, 'ljbv9FBV0x', '2021-11-07 05:16:13', '2021-11-07 06:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_force_update` tinyint(4) NOT NULL,
  `version_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_need_clear_data` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`id`, `version_no`, `version_force_update`, `version_title`, `version_message`, `version_need_clear_data`, `created_at`, `updated_at`) VALUES
('1', '3.3', 0, 'New Version Avaliable', 'New Version Avaliable in google play store', 0, NULL, '2021-10-24 16:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `wallpapers`
--

CREATE TABLE `wallpapers` (
  `wallpaper_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallpaper_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Free,2=Preminum',
  `is_recommended` tinyint(4) NOT NULL DEFAULT 0,
  `is_portrait` tinyint(4) NOT NULL DEFAULT 0,
  `is_landscape` tinyint(4) NOT NULL DEFAULT 0,
  `is_square` tinyint(4) NOT NULL DEFAULT 0,
  `point` int(255) NOT NULL,
  `wallpaper_is_published` tinyint(4) NOT NULL COMMENT '1=pub, 0=unpub',
  `is_gif` tinyint(4) NOT NULL DEFAULT 0,
  `is_wallpaper` tinyint(4) NOT NULL DEFAULT 0,
  `is_video_wallpaper` tinyint(4) NOT NULL DEFAULT 0,
  `wallpaper_search_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallpapers`
--

INSERT INTO `wallpapers` (`wallpaper_id`, `cat_id`, `color_id`, `wallpaper_name`, `types`, `is_recommended`, `is_portrait`, `is_landscape`, `is_square`, `point`, `wallpaper_is_published`, `is_gif`, `is_wallpaper`, `is_video_wallpaper`, `wallpaper_search_tags`, `added_user_id`, `credit`, `recommended_date`, `created_at`, `updated_at`) VALUES
('paper617e8c6be5bb2', 'cat61715a7637d8a', 'color617296661f467', 'Testing', '2', 1, 0, 0, 0, 100, 0, 0, 1, 0, 'sankyi', '2', 'from me', NULL, '2021-10-31 12:30:35', '2021-11-01 17:03:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_and_settings`
--
ALTER TABLE `about_and_settings`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `backend_configs`
--
ALTER TABLE `backend_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallpapers`
--
ALTER TABLE `wallpapers`
  ADD PRIMARY KEY (`wallpaper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
