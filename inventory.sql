-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 05:11 PM
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
(16, 'Local Utility Office', 1, 1, '2024-04-08 21:33:24', '2024-04-08 21:33:24'),
(17, 'Mayor\'s Office', 1, 1, '2024-04-08 21:33:32', '2024-04-08 21:33:32');

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
(2, 5, 2, 'Someone', 1, 1, '2024-04-10', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-10 04:02:00', '2024-04-10 04:02:00', 1, 1),
(4, 8, 1, 'Someone', 1, 1, '2024-04-12', 'Jerry Sanguyo', 'Returned', 'Someone', '2024-04-13', 1, '2024-04-12 07:58:21', '2024-04-12 10:36:46', 1, 1),
(5, 8, 9, 'Pedro Agnosio', 1, 1, '2024-04-13', 'Pedro Agnosio', 'Borrowed', NULL, NULL, NULL, '2024-04-12 10:42:25', '2024-04-12 10:42:25', 1, 1),
(6, 6, 1, 'Someone', 1, 1, '2024-04-13', 'Someone', 'Returned', 'return Someone', '2024-04-13', 1, '2024-04-12 11:13:17', '2024-04-12 11:13:31', 1, 1),
(7, 7, 11, 'Someone', 1, 1, '2024-04-13', 'Someone', 'Borrowed', NULL, NULL, NULL, '2024-04-12 22:44:45', '2024-04-12 22:44:45', 1, 1),
(8, 9, 12, 'Someone', 1, 1, '2024-04-13', 'Someone', 'Returned', 'return Someone', '2024-04-13', 1, '2024-04-12 22:45:18', '2024-04-12 22:46:46', 1, 1);

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
(15, 'Starlink', 1, 1, '2024-04-08 21:29:28', '2024-04-08 21:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `venue_time_start` varchar(255) NOT NULL,
  `venue_time_end` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `point_person` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `venue`, `event_date`, `venue_time_start`, `venue_time_end`, `address`, `point_person`, `mobile_number`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Embo Event', '2024-12-31', '08:00', '17:00', 'West Rembo', 'Someone', '09271852710', 'Talk', 1, 1, '2024-04-22 03:49:41', '2024-04-22 03:56:38'),
(3, 'Lakeshore', '2024-12-31', '08:00', '15:00', 'Lakeshore', 'Person 1', '09271852710', 'Lakeshore event', 1, 1, '2024-04-22 07:05:30', '2024-04-22 07:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_participants`
--

CREATE TABLE `tbl_event_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_event_participants`
--

INSERT INTO `tbl_event_participants` (`id`, `event_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Pedro', 1, 1, '2024-04-22 05:36:10', '2024-04-22 06:54:26'),
(8, 1, 'Juan', 1, 1, '2024-04-22 05:53:43', '2024-04-22 06:54:20'),
(10, 3, 'Pedra', 1, NULL, '2024-04-22 07:06:35', '2024-04-22 07:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_services`
--

CREATE TABLE `tbl_event_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_event_services`
--

INSERT INTO `tbl_event_services` (`id`, `event_id`, `driver_name`, `mobile_number`, `plate_number`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, 'Juanita', '09271852711', '542', 1, 1, '2024-04-22 06:47:32', '2024-04-22 06:57:53'),
(3, 3, 'Driver sample', '09271852711', '540', 1, 1, '2024-04-22 07:06:11', '2024-04-22 07:06:21');

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
(8, 1, 'Acer All in one PC', 8, '1S61C9KAR1WWV5YT3195', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:12', '2024-04-12 07:58:06', 'S94128908900', 'Shkjh12412', 'sample@gmail.com', 'sample1234'),
(9, 1, 'Motorola Radio', 9, '1S61C9KAR1WWV5YT3197', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:34', '2024-04-08 21:37:34', NULL, NULL, NULL, NULL),
(10, 1, 'UPS', 10, '1S61C9KAR1WWV5YT3198', 1, 'Brandnew', 1, 1, '2024-04-08 21:37:53', '2024-04-08 21:37:53', NULL, NULL, NULL, NULL),
(11, 1, 'Lenovo Keyboard', 11, '1S61C9KAR1WWV5YT3199', 1, 'Brandnew', 1, 1, '2024-04-08 21:38:17', '2024-04-08 21:38:17', NULL, NULL, NULL, NULL),
(16, 1, 'Lenovo laptop', 1, '1S61C9KAR1WWV5YT34124', 1, 'Brandnew', 1, 1, '2024-04-10 01:16:34', '2024-04-10 01:17:40', NULL, NULL, NULL, NULL),
(17, 1, 'Acer All in one PC', 8, '1S61C9KAR1WWV5YT5124', 1, 'Brandnew', 1, 1, '2024-04-10 01:24:48', '2024-04-10 01:24:48', NULL, NULL, NULL, NULL),
(18, 1, 'Sample Laptop', 1, '1S61C9KAR1WWV5YT41241', 1, 'Brandnew', 1, 1, '2024-04-12 11:59:53', '2024-04-12 11:59:53', 'S94128908212', 'Shkjh125151', 'sample@gmail.com', 'sample1234');

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
(17, '2024_04_12_182341_make_received_return_foreign', 8),
(18, '2024_04_12_182535_make_received_return_foreign', 9),
(19, '2024_04_22_092547_create_events_table', 10),
(20, '2024_04_22_110206_create_events_table', 11),
(21, '2024_04_22_110255_create_event_services_table', 12),
(22, '2024_04_22_111043_create_event_participants_table', 12);

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
(3, 'SET', 1, 1, '2024-04-08 21:30:21', '2024-04-08 21:30:21'),
(4, 'BOX', 1, 1, '2024-04-08 21:30:46', '2024-04-08 21:30:46');

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
(1, 'Jerry Gonzaga Sanguyo', 'jsanguyo1624@gmail.com', NULL, '$2y$10$L6m8bObZB/jF79bYiK.4Ju9SLKekHRH9jVcG4YXy38HbRv1XmOMJ2', 'admin', NULL, '2024-04-05 23:13:17', '2024-04-15 06:21:31'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$YkKgMCARePELHU/Svs9ceehB/E6ekOWN.iU0/0vbAP9Q7u8yO2FHa', 'user', NULL, '2024-04-15 05:13:54', '2024-04-15 06:25:42');

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
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_events_created_by_foreign` (`created_by`),
  ADD KEY `tbl_events_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_event_participants`
--
ALTER TABLE `tbl_event_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_event_participants_event_id_foreign` (`event_id`),
  ADD KEY `tbl_event_participants_created_by_foreign` (`created_by`),
  ADD KEY `tbl_event_participants_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tbl_event_services`
--
ALTER TABLE `tbl_event_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_event_services_event_id_foreign` (`event_id`),
  ADD KEY `tbl_event_services_created_by_foreign` (`created_by`),
  ADD KEY `tbl_event_services_updated_by_foreign` (`updated_by`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_deployments`
--
ALTER TABLE `tbl_deployments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_equipments`
--
ALTER TABLE `tbl_equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_event_participants`
--
ALTER TABLE `tbl_event_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_event_services`
--
ALTER TABLE `tbl_event_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_failed_jobs`
--
ALTER TABLE `tbl_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventories`
--
ALTER TABLE `tbl_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_events_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_event_participants`
--
ALTER TABLE `tbl_event_participants`
  ADD CONSTRAINT `tbl_event_participants_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_event_participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`),
  ADD CONSTRAINT `tbl_event_participants_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_event_services`
--
ALTER TABLE `tbl_event_services`
  ADD CONSTRAINT `tbl_event_services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_event_services_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`),
  ADD CONSTRAINT `tbl_event_services_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `tbl_users` (`id`);

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
