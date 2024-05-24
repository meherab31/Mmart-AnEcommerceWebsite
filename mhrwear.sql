-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 08:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(56, 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Cargo Pant', '2', '1400', '1705349337.png', '3', '3', '2024-05-17 14:15:55', '2024-05-17 14:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2024-01-10 12:41:37', '2024-01-10 12:41:37'),
(2, 'Pants', '2024-01-10 12:45:54', '2024-01-10 12:45:54'),
(7, 'Shoes', '2024-01-11 14:10:01', '2024-01-11 14:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(256) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form', 'aiden', 'get.fans.ug@outlook.com', 'Hello', 'Test', '2024-05-24 06:57:10', '2024-05-24 06:57:10'),
(2, 'Contact Form', 'mhr', '19303049@iubat.edu', 'Urgent', 'Discussion', '2024-05-24 06:59:54', '2024-05-24 06:59:54'),
(4, 'discount', NULL, '19303049@iubat.edu', NULL, NULL, '2024-05-24 07:31:22', '2024-05-24 07:31:22');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_08_100414_create_sessions_table', 1),
(7, '2024_01_10_182329_create_categories_table', 2),
(8, '2024_01_13_170939_create_products_table', 3),
(9, '2024_02_08_051222_create_carts_table', 4),
(10, '2024_04_14_105511_create_orders_table', 5),
(11, '2024_05_04_061422_create_notifications_table', 6),
(12, '2024_05_15_191552_create_reviews_table', 7),
(13, '2024_05_24_124437_create_contacts_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `track_id` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `track_id`, `created_at`, `updated_at`) VALUES
(1, '2', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Cargo Pant', '3', '2100', '1705349337.png', '3', 'cash on delivery', 'delivered', '', '2024-04-14 05:31:11', '2024-04-25 12:30:13'),
(2, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'dadas', '2', '642', '1706818466.png', '9', 'cash on delivery', 'delivered', '', '2024-04-14 05:31:11', '2024-04-25 12:37:36'),
(3, '4', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Nikey Sports 69', '2', '4000', '1706386299.png', '4', 'Paid', 'delivered', '', '2024-04-14 05:31:11', '2024-04-25 12:46:27'),
(4, '5', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'sad', '1', '32', '1706818343.png', '8', 'cash on delivery', 'processing', '', '2024-04-14 05:31:11', '2024-04-14 05:31:11'),
(5, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Nikey Sports 69', '1', '2000', '1706386299.png', '4', 'paid', 'delivered', 'ORDER661bc32e66647', '2024-04-14 05:51:10', '2024-05-13 20:18:49'),
(6, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Nikey Sports 69', '1', '2000', '1706386299.png', '4', 'cash on delivery', 'processing', 'ORDER661bc35c7d408', '2024-04-14 05:51:56', '2024-04-14 05:51:56'),
(7, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Full Sleeve Shirt', '1', '565', '1711732960.jpg', '10', 'cash on delivery', 'processing', 'ORDER661bc35c7d408', '2024-04-14 05:51:56', '2024-04-14 05:51:56'),
(8, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'dadas', '1', '321', '1706818466.png', '9', 'cash on delivery', 'processing', 'ORDER661bc35c7d408', '2024-04-14 05:51:56', '2024-04-14 05:51:56'),
(9, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Cargo Pant', '1', '700', '1705349337.png', '3', 'paid', 'delivered', 'tr661bc4a4f1ea4', '2024-04-14 05:57:24', '2024-05-17 12:46:57'),
(10, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'sad', '1', '32', '1706818343.png', '8', 'cash on delivery', 'processing', 'tr661bc4ff4a553', '2024-04-14 05:58:55', '2024-04-14 05:58:55'),
(11, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Cargo Pant', '1', '700', '1705349337.png', '3', 'paid', 'delivered', 'tr661bc559b925b', '2024-04-14 06:00:25', '2024-05-09 23:32:51'),
(12, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Full Sleeve Shirt', '1', '565', '1711732960.jpg', '10', 'cash on delivery', 'processing', 'tr66226a3c10033', '2024-04-19 06:57:32', '2024-04-19 06:57:32'),
(13, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Full Sleeve Shirt', '1', '565', '1711732960.jpg', '10', 'paid', 'processing', 'tr66256d760ec5e', '2024-04-21 13:48:06', '2024-04-21 13:48:06'),
(14, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'dadas', '1', '321', '1706818466.png', '9', 'paid', 'processing', 'tr66256f6a1b0a9', '2024-04-21 13:56:26', '2024-04-21 13:56:26'),
(15, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'Cargo Pant', '1', '700', '1705349337.png', '3', 'paid', 'delivered', 'tr662570a6a51ba', '2024-04-21 14:01:42', '2024-05-17 12:46:43'),
(16, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'sad', '3', '96', '1706818343.png', '8', 'paid', 'delivered', 'tr6625884c1026d', '2024-04-21 15:42:36', '2024-05-09 23:32:16'),
(17, '3', 'mhr', 'meherabhassan42@gmail.com', '01621749628', 'UK', 'dadas', '1', '321', '1706818466.png', '9', 'paid', 'cancelled', 'tr662eace301f85', '2024-04-28 14:09:07', '2024-05-09 06:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('meherabhassan42@gmail.com', '$2y$10$X5EAcqnxrkc9PYWxGvNGq.Ive0uG3.VSrs18QH4cV4nKA6j7TbdNC', '2024-05-09 23:47:39');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `discount_price` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `quantity`, `category`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(3, 'Cargo Pant', 'Nice Baggy Cargo Pant', '1705349337.png', '8', 'Pants', 750, 700, '2024-01-15 14:08:57', '2024-05-17 12:46:57'),
(4, 'Nikey Sports XXC', 'The Special Sports shoe', '1706386299.png', '19', 'Shoes', 2000, NULL, '2024-01-27 14:11:39', '2024-05-24 06:37:10'),
(8, 'Black Plain Shirt', 'Formal Shirt for meetings and all', '1706818343.png', '32', 'Shirt', 321, 32, '2024-02-01 14:12:23', '2024-05-24 06:36:31'),
(9, 'Plain Formal Shirt', 'Formal Shirt for meetings and all', '1706818466.png', '12', 'Shirt', 3123, 321, '2024-02-01 14:14:26', '2024-05-24 06:36:49'),
(10, 'Full Sleeve Shirt', 'Adasdfasdfasd', '1711732960.jpg', '3', 'Shirt', 565, NULL, '2024-03-29 11:22:40', '2024-03-29 11:23:07'),
(11, 'Richman Men’s Dark Indigo Color Denim Pant', 'Slim-fit jeans. Five pockets. Faded effect. Zip fly and button fastening on the front', '1716553225.png', '23', 'Pants', 2540, NULL, '2024-05-24 06:20:25', '2024-05-24 06:20:25'),
(12, 'Premium Slim Fit twill Pant', 'Slim fit pant made of stretchy cotton fabric. Featuring front pockets, rear pockets and zip fly and top button fastening.', '1716553295.png', '55', 'Pants', 2628, 2210, '2024-05-24 06:21:35', '2024-05-24 06:21:35'),
(13, 'Richman Men’s Black Color Denim Pant', 'Slim-fit jeans. Five pockets. Faded effect. Zip fly and button fastening on the front', '1716553487.png', '32', 'Pants', 2188, NULL, '2024-05-24 06:24:47', '2024-05-24 06:24:47'),
(14, 'MENS S/S SHIRT-BLUE/WHITE', 'Stay cool and stylish in our men\'s short sleeve shirt. The classic blue and white design will elevate any outfit. With its breathable fabric, you\'ll stay comfortable.', '1716553832.png', '12', 'Shirt', 1479, NULL, '2024-05-24 06:30:32', '2024-05-24 06:30:32'),
(15, 'Men Tree Leaves Casual Shirt', 'Stay cool and stylish in our men\'s short sleeve shirt. The classic blue and white design will elevate any outfit. With its breathable fabric, you\'ll stay comfortable.', '1716553897.png', '11', 'Shirt', 1050, 1000, '2024-05-24 06:31:37', '2024-05-24 06:31:37'),
(16, 'Black Embroidered Genuine Leather Nagras', 'Black, Contrast Stitching, Genuine Leather, Genuine Leather Lining, Genuine Leather Sole.', '1716554052.png', '16', 'Shoes', 2130, 2100, '2024-05-24 06:34:12', '2024-05-24 06:34:12'),
(17, 'All Season Retro Breathable Casual Shoe – Khaki', 'Casual Shoes,  Genuine Leather & Mesh', '1716554121.png', '14', 'Shoes', 4260, NULL, '2024-05-24 06:35:21', '2024-05-24 06:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 4, 'nice', '2024-05-15 14:22:24', '2024-05-15 14:22:24'),
(4, 9, 3, 3, 'dasdad', '2024-05-15 14:43:16', '2024-05-15 14:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('al7Yx71J6XuW1tPWODTpZD9PYEqCYZn9o0BPjbCX', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY2RRV0x4YThkRjB1b3M4dUlTYmdweVhTbThmU0ZFblduNVNEcGM4QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSmRaMUNhWS9kMU9LZlBoeXJXYVFwT3VYTFN5US84YkRoMzdIV2dWMDBOU3VRLmxMdXhaUGkiO30=', 1716557829);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'aiden2', 'aiden696900@gmail.com', '1', '1140075969', 'UK', '2024-05-02 05:23:38', '$2y$10$JdZ1CaY/d1OKfPhyrWaQpOuXLSyQ/8bDh37HWgV00NSuQ.lLuxZPi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 04:21:11', '2024-05-02 05:23:38'),
(3, 'mhr', 'meherabhassan42@gmail.com', '0', '01621749628', 'UK', '2024-05-07 12:33:53', '$2y$10$bLbNyD0jMsX/nRcsn43egOJlk.gcS2eH6ybdTEYUDRvYfjlcRHgz2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-08 06:21:53', '2024-05-07 12:33:53'),
(6, 'Meherab', '19303049@iubat.edu', '0', '1140075969', 'Uttara, Dhaka-1230', NULL, '$2y$10$chZBoHCC2l6UKPoJ474iduLMnnN371Bi/B5ccLutNurN0/B1wdHlm', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 11:12:49', '2024-05-15 11:12:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
