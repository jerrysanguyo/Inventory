-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 06:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', 1, 1, '2024-04-08 07:47:01', '2024-04-08 07:47:01'),
(2, 'Human Resource', 1, 1, '2024-04-08 07:47:09', '2024-04-08 08:58:00'),
(6, 'City Health Office', 1, 1, '2024-04-08 21:30:57', '2024-04-08 21:30:57'),
(7, 'Treasury Office', 1, 1, '2024-04-08 21:31:03', '2024-04-08 21:31:03'),
(8, 'Accounting Office', 1, 1, '2024-04-08 21:31:14', '2024-04-08 21:31:14'),
(9, 'Nutrition Office', 1, 1, '2024-04-08 21:32:18', '2024-04-08 21:32:18'),
(10, 'Civil Registry Office', 1, 1, '2024-04-08 21:32:34', '2024-04-08 21:32:34'),
(11, 'Assessor Office', 1, 1, '2024-04-08 21:32:41', '2024-04-08 21:32:41'),
(12, 'Engineering Office', 1, 1, '2024-04-08 21:32:51', '2024-04-08 21:32:51'),
(13, 'Events', 1, 1, '2024-04-08 21:32:58', '2024-04-08 21:32:58'),
(14, 'Public Information Office', 1, 1, '2024-04-08 21:33:10', '2024-04-08 21:33:10'),
(15, 'Local School Board', 1, 1, '2024-04-08 21:33:17', '2024-04-08 21:33:17'),
(16, 'Local Utility Office', 1, 1, '2024-04-08 21:33:24', '2024-04-08 21:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deployments`
--

CREATE TABLE `tbl_deployments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_to` varchar(255) DEFAULT NULL,
  `issued_by` bigint(20) UNSIGNED NOT NULL,
  `deploy_by` bigint(20) UNSIGNED NOT NULL,
  `deploy_date` date DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `return_by` varchar(255) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `received_by_return` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_deployments`
--

INSERT INTO `tbl_deployments` (`id`, `inventory_id`, `department_id`, `assigned_to`, `issued_by`, `deploy_by`, `deploy_date`, `received_by`, `status`, `return_by`, `return_date`, `received_by_return`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 17, 1, 'Someone', 1, 1, '2024-04-10', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-10 01:56:41', '2024-04-10 01:56:41', 1, 1),
(2, 5, 2, 'Someones', 1, 1, '2024-04-10', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-10 04:02:00', '2024-04-11 21:46:32', 1, 1),
(4, 6, 9, 'Someone', 1, 1, '2024-04-11', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-10 21:05:36', '2024-04-10 21:05:36', 1, 1),
(5, 18, 6, 'Someone', 1, 1, '2024-04-11', 'Someone', 'Returned', 'return Someone', '2024-04-15', 1, '2024-04-10 21:47:19', '2024-04-14 17:52:03', 1, 1),
(6, 7, 1, 'Someone', 1, 1, '2024-04-11', 'Someone', 'Returned', 'return Someone', '2024-04-13', 1, '2024-04-10 21:53:04', '2024-04-12 23:10:04', 1, 1),
(7, 8, 14, 'Someone', 1, 1, '2024-04-11', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-10 21:53:57', '2024-04-10 21:53:57', 1, 1),
(8, 18, 1, 'Borrow 2', 1, 1, '2024-04-15', 'someone', 'Borrowed', NULL, NULL, NULL, '2024-04-14 17:52:28', '2024-04-14 17:52:28', 1, 1),
(9, 21, 1, 'Someone', 1, 1, '2024-04-19', 'Someone receive', 'Returned', 'return Someone', '2024-04-19', 1, '2024-04-18 21:24:20', '2024-04-18 21:25:59', 1, 1),
(10, 21, 1, 'Someone 2', 1, 1, '2024-04-19', 'Someone 2', 'Borrowed', NULL, NULL, NULL, '2024-04-18 21:26:58', '2024-04-18 21:26:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipments`
--

CREATE TABLE `tbl_equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_equipments`
--

INSERT INTO `tbl_equipments` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 1, 1, '2024-04-08 10:43:50', '2024-04-08 10:44:16'),
(3, 'Printer', 1, 1, '2024-04-08 21:26:52', '2024-04-08 21:26:52'),
(4, 'Postek', 1, 1, '2024-04-08 21:27:02', '2024-04-08 21:27:12'),
(5, 'Monitor', 1, 1, '2024-04-08 21:27:27', '2024-04-08 21:27:27'),
(6, 'CPU', 1, 1, '2024-04-08 21:27:33', '2024-04-08 21:27:33'),
(7, 'HDMI', 1, 1, '2024-04-08 21:27:47', '2024-04-08 21:27:47'),
(8, 'All in one PC', 1, 1, '2024-04-08 21:27:53', '2024-04-08 21:27:53'),
(9, 'Radio', 1, 1, '2024-04-08 21:28:20', '2024-04-08 21:28:24'),
(10, 'UPS', 1, 1, '2024-04-08 21:28:38', '2024-04-08 21:28:38'),
(11, 'Keyboard', 1, 1, '2024-04-08 21:28:44', '2024-04-08 21:28:44'),
(12, 'Mouse', 1, 1, '2024-04-08 21:28:48', '2024-04-08 21:28:48'),
(13, 'SSD', 1, 1, '2024-04-08 21:29:00', '2024-04-08 21:29:00'),
(14, 'Memory Card', 1, 1, '2024-04-08 21:29:10', '2024-04-08 21:29:10'),
(15, 'Starlink', 1, 1, '2024-04-08 21:29:28', '2024-04-08 21:29:28'),
(16, 'Lenovo Desktop', 3, 3, '2024-04-18 21:45:52', '2024-04-18 21:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_failed_jobs`
--

CREATE TABLE `tbl_failed_jobs` (
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
-- Table structure for table `tbl_inventories`
--

CREATE TABLE `tbl_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remark` longtext DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pk_os` varchar(255) DEFAULT NULL,
  `pk_ms_office` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_inventories`
--

INSERT INTO `tbl_inventories` (`id`, `unit_id`, `name`, `equipment_id`, `serial_number`, `quantity`, `remark`, `created_by`, `updated_by`, `created_at`, `updated_at`, `pk_os`, `pk_ms_office`, `email`, `password`) VALUES
(5, 1, 'ThinkVision Monitor', 5, '1S61C9KAR1WWV5YT3193', 1, 'Brandnew', 1, 1, '2024-04-08 21:36:02', '2024-04-08 21:36:02', NULL, NULL, NULL, NULL),
(6, 1, 'ThinkStation', 6, 'S61C9KAR1WWV5YT3194', 1, 'Brandnew', 1, 1, '2024-04-08 21:36:25', '2024-04-08 21:36:25', NULL, NULL, NULL, NULL),
(7, 1, 'Ugreen', 7, '1S61C9KAR1WWV5YT3195', 1, 'Brandnew', 1, 1, '2024-04-08 21:36:49', '2024-04-08 21:36:49', NULL, NULL, NULL, NULL),
(8, 1, 'Acer All in one PC', 8, '1S61C9KAR1WWV5YT3195', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:12', '2024-04-08 21:37:12', NULL, NULL, NULL, NULL),
(9, 1, 'Motorola Radio', 9, '1S61C9KAR1WWV5YT3197', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:34', '2024-04-08 21:37:34', NULL, NULL, NULL, NULL),
(10, 1, 'UPS', 10, '1S61C9KAR1WWV5YT3198', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:53', '2024-04-08 21:37:53', NULL, NULL, NULL, NULL),
(11, 1, 'Lenovo Keyboard', 11, '1S61C9KAR1WWV5YT3199', 1, 'Brandnew', 1, 1, '2024-04-08 21:38:17', '2024-04-08 21:38:17', NULL, NULL, NULL, NULL),
(16, 1, 'Lenovo laptop', 1, '1S61C9KAR1WWV5YT34124', 1, 'Brandnew', 1, 1, '2024-04-10 01:16:34', '2024-04-10 01:17:40', NULL, NULL, NULL, NULL),
(17, 1, 'Acer All in one PC', 8, '1S61C9KAR1WWV5YT5124', 1, 'Brandnew', 1, 1, '2024-04-10 01:24:48', '2024-04-10 01:24:48', NULL, NULL, NULL, NULL),
(18, 1, 'Samsung 8gb', 14, '1S61C9KAR1WWV5YT3241', 1, 'Brandnew', 1, 1, '2024-04-10 21:46:53', '2024-04-10 21:46:53', NULL, NULL, NULL, NULL),
(19, 1, 'Acer', 1, '1S61C9KAR1WWV5YTd1231', 1, 'Brandnew', 1, 1, '2024-04-10 22:56:56', '2024-04-10 22:56:56', NULL, NULL, NULL, NULL),
(20, 1, 'Acer All in one PC 2', 8, '1S61C9KAR1WWV5YTp9812', 1, 'Brandnew', 1, 1, '2024-04-10 22:57:45', '2024-04-10 22:57:45', 'S94128908900', 'Shkjh12412', 'sample@gmail.com', 'sample'),
(21, 1, 'Acer', 8, 'DQVZQSP00E33801C8D3000', 1, 'Brandnew', 1, 1, '2024-04-18 21:21:25', '2024-04-18 21:21:25', 'N/A', 'N/A', 'sample@gmail.com', 'sample'),
(22, 1, 'Motorola Radio', 9, '12345678', 1, 'brand new', 3, 3, '2024-04-18 21:43:14', '2024-04-18 21:43:14', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_06_070628_create_equipment_table', 1),
(7, '2024_04_06_070639_create_departments_table', 1),
(8, '2024_04_06_070645_create_categories_table', 1),
(9, '2024_04_06_070652_create_units_table', 1),
(10, '2024_04_06_070659_create_inventories_table', 1),
(11, '2024_04_08_212558_add_quantity_column', 2),
(12, '2024_04_08_224117_make_updated_nullable', 3),
(13, '2024_04_10_090517_create_deployments_table', 4),
(14, '2024_04_10_094017_add_created_updated_by_deployment', 5),
(15, '2024_04_11_061820_add_column_additional_inventory', 6),
(16, '2024_04_12_160634_add_column_return', 7),
(17, '2024_04_12_182535_make_received_return_foreign', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_reset_tokens`
--

CREATE TABLE `tbl_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_access_tokens`
--

CREATE TABLE `tbl_personal_access_tokens` (
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
-- Table structure for table `tbl_units`
--

CREATE TABLE `tbl_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PC/S', 1, 1, '2024-04-08 10:28:56', '2024-04-08 10:29:09'),
(3, 'SET', 1, 1, '2024-04-08 21:30:21', '2024-04-08 21:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jerry Gonzaga Sanguyo', 'jsanguyo1624@gmail.com', NULL, '$2y$10$98VDmqEhIpsMCVJyDGcsYuU9XldfDP6fYxz9.yrJmu.OlamyOlxsy', 'admin', NULL, '2024-04-05 23:13:17', '2024-04-05 23:13:17'),
(2, 'users', 'user@gmail.com', NULL, '$2y$10$44V/EPCz6nZMkIovHflz1uudwsiLqMNOwZ87cscmDwS839mavp5nO', 'user', NULL, '2024-04-15 21:52:23', '2024-04-15 21:53:12'),
(3, 'Patrick James Resultay', 'pjames.resultay93@gmail.com', NULL, '$2y$10$RAHpWRlWmmxKVPNkagyBPOVfoVPOKJRHFay/04pccRS3dZtdV8x0e', 'admin', NULL, '2024-04-18 21:37:17', '2024-04-18 21:41:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_categories_created_by_foreign` (`created_by`),
  ADD KEY `tbl_categories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_departments_created_by_foreign` (`created_by`),
  ADD KEY `tbl_departments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_deployments`
--
ALTER TABLE `tbl_deployments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_deployments_department_id_foreign` (`department_id`),
  ADD KEY `tbl_deployments_issued_by_foreign` (`issued_by`),
  ADD KEY `tbl_deployments_deploy_by_foreign` (`deploy_by`),
  ADD KEY `tbl_deployments_created_by_foreign` (`created_by`),
  ADD KEY `tbl_deployments_updated_by_foreign` (`updated_by`),
  ADD KEY `tbl_deployments_received_by_return_foreign` (`received_by_return`);

--
-- Indexes for table `tbl_equipments`
--
ALTER TABLE `tbl_equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_equipments_created_by_foreign` (`created_by`),
  ADD KEY `tbl_equipments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_failed_jobs`
--
ALTER TABLE `tbl_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `tbl_inventories`
--
ALTER TABLE `tbl_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_inventories_unit_id_foreign` (`unit_id`),
  ADD KEY `tbl_inventories_equipment_id_foreign` (`equipment_id`),
  ADD KEY `tbl_inventories_created_by_foreign` (`created_by`),
  ADD KEY `tbl_inventories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `tbl_password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_password_reset_tokens`
--
ALTER TABLE `tbl_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_personal_access_tokens`
--
ALTER TABLE `tbl_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_personal_access_tokens_token_unique` (`token`),
  ADD KEY `tbl_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_units`
--
ALTER TABLE `tbl_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_units_created_by_foreign` (`created_by`),
  ADD KEY `tbl_units_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_deployments`
--
ALTER TABLE `tbl_deployments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_equipments`
--
ALTER TABLE `tbl_equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_failed_jobs`
--
ALTER TABLE `tbl_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventories`
--
ALTER TABLE `tbl_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_personal_access_tokens`
--
ALTER TABLE `tbl_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_units`
--
ALTER TABLE `tbl_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD CONSTRAINT `tbl_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD CONSTRAINT `tbl_departments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_departments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_deployments`
--
ALTER TABLE `tbl_deployments`
  ADD CONSTRAINT `tbl_deployments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_deployments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `tbl_departments` (`id`),
  ADD CONSTRAINT `tbl_deployments_deploy_by_foreign` FOREIGN KEY (`deploy_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_deployments_issued_by_foreign` FOREIGN KEY (`issued_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_deployments_received_by_return_foreign` FOREIGN KEY (`received_by_return`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_deployments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_equipments`
--
ALTER TABLE `tbl_equipments`
  ADD CONSTRAINT `tbl_equipments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_equipments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_inventories`
--
ALTER TABLE `tbl_inventories`
  ADD CONSTRAINT `tbl_inventories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_inventories_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `tbl_equipments` (`id`),
  ADD CONSTRAINT `tbl_inventories_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `tbl_units` (`id`),
  ADD CONSTRAINT `tbl_inventories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_units`
--
ALTER TABLE `tbl_units`
  ADD CONSTRAINT `tbl_units_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_units_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
