-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorindo`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `uid` varchar(40) NOT NULL,
  `action` enum('create','update','delete','login','logout','resetpassword','changepassword') DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2024_11_14_999999_add_active_status_to_users', 2),
(6, '2024_11_14_999999_add_avatar_to_users', 2),
(7, '2024_11_14_999999_add_dark_mode_to_users', 2),
(8, '2024_11_14_999999_add_messenger_color_to_users', 2),
(9, '2024_11_14_999999_create_chatify_favorites_table', 2),
(10, '2024_11_14_999999_create_chatify_messages_table', 2),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(12, '2024_12_17_022434_create_places_table', 3),
(13, '2024_12_17_022859_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `uid` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`uid`, `description`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('10aa1d11-270c-47ab-8c03-d20bc20225e8', 'Role', 'Role', '2024-10-17 07:29:42', NULL, '2024-10-17 07:29:42', NULL),
('146f3092-79e4-4865-9cba-d963b9079ca9', 'Tour', 'Tour', '2024-10-17 04:28:52', NULL, '2025-01-30 10:32:17', NULL),
('3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', 'User', 'User', '2024-10-17 07:29:49', NULL, '2024-10-17 07:29:49', NULL),
('42634834-66e0-45bf-8835-99f2004a3b05', 'Dashboard', 'Dashboard', '2024-10-17 03:56:14', NULL, '2024-10-17 03:57:23', NULL),
('78eefbc3-b248-4d7c-a355-a83ed0103c4b', 'Module', 'Module', '2024-10-17 07:29:38', NULL, '2024-10-17 07:29:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `uid` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `module_uid` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`uid`, `description`, `name`, `slug`, `module_uid`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('1e65f1cc-4a52-4a25-949f-18e436984511', 'Module List View Permit', 'Module List View', 'module.list', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:30:45', NULL, '2024-10-17 07:30:45', NULL),
('4b4a3ae2-ce54-47a5-b682-0ef8e86ae0f6', 'User Create Permit', 'User Create', 'user.create', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:20', NULL, '2024-10-17 07:34:20', NULL),
('54932999-cc85-4131-a857-107714f4edc5', 'Role Update Permit', 'Role Update', 'role.update', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:33:04', NULL, '2024-10-17 07:33:04', NULL),
('55c3c286-5727-44cc-8693-ab369406fd1d', 'User List View Permit', 'User List View', 'user.list', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:33:47', NULL, '2024-10-17 07:33:47', NULL),
('5851c5a8-325b-434e-a36c-75ba0f2e2bd6', 'Module Create Permit', 'Module Create', 'module.create', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:30:57', NULL, '2024-10-17 07:30:57', NULL),
('96803e1a-f019-4518-a8fb-12334d079922', 'Module Update Permit', 'Module Update', 'module.update', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:31:15', NULL, '2024-10-17 07:31:15', NULL),
('aa1f7900-4741-4f75-8854-9506cc4bacc9', 'Role Delete Permit', 'Role Delete', 'role.delete', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:33:15', NULL, '2024-10-17 07:33:15', NULL),
('bd8adad1-15ad-47ff-b7c7-8b6d9045f884', 'Tour Create Permit', 'Tour Create', 'tour.create', '146f3092-79e4-4865-9cba-d963b9079ca9', '2024-10-17 04:35:46', NULL, '2025-01-30 10:33:09', NULL),
('bdfaa6be-f0f6-4a3e-a9d5-08f5d1ce55cf', 'Tour Update Permit', 'Tour Update', 'tour.update', '146f3092-79e4-4865-9cba-d963b9079ca9', '2024-10-17 04:42:54', NULL, '2025-01-30 10:32:36', NULL),
('be784f9b-9c10-409d-ae84-21f270d680de', 'Module Delete Permit', 'Module Delete', 'module.delete', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:31:53', NULL, '2024-10-17 07:31:53', NULL),
('c4114751-4829-45a2-88f9-96b07f8c3ff8', 'Dashboard View Permit', 'Dashboard View', 'dashboard.view', '42634834-66e0-45bf-8835-99f2004a3b05', '2024-10-17 04:28:31', NULL, '2024-10-17 04:32:15', NULL),
('ca64c1af-3bd1-4804-9181-7f4b325d2368', 'User Delete Permit', 'User Delete', 'user.delete', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:46', NULL, '2024-10-17 07:34:46', NULL),
('cd7e7337-b2f6-4ad2-bd0f-c27d2de0cc96', 'User Update Permit', 'User Update', 'user.update', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:36', NULL, '2024-10-17 07:34:36', NULL),
('e798f494-f933-4c2a-ac04-781dc4fc24a7', 'Tour Delete Permit', 'Tour Delete', 'tour.delete', '146f3092-79e4-4865-9cba-d963b9079ca9', '2024-10-17 04:43:18', NULL, '2025-01-30 10:32:59', NULL),
('f2238d3b-9cc8-4cba-ae56-1abe592c990e', 'Role List View Permit', 'Role List View', 'role.list', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:32:37', NULL, '2024-10-17 07:32:37', NULL),
('f2b06d1d-3b53-4010-9b82-eed65486fc09', 'Tour List View Permit', 'Tour List View', 'tour.list', '146f3092-79e4-4865-9cba-d963b9079ca9', '2024-10-17 04:34:31', NULL, '2025-01-30 10:32:48', NULL),
('f99117e0-ba23-4a96-8aef-b428916a7001', 'Role Create Permit', 'Role Create', 'role.create', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:32:52', NULL, '2024-10-17 07:32:52', NULL);

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
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `uid` varchar(40) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`uid`, `name`, `address`, `gallery`, `description`, `price`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('21222752-338d-4a3b-99c2-3ee91f80e2b9', 'asd', 'asd', '3791bcc0-4818-4415-b043-7b8f7b81f2481738237963.png,4525d647-42aa-44c0-beee-872d830b078f1738237963.png,f75b2f89-8c62-4e3c-8437-68df2c9111181738237963.png,60e05b19-9c95-4911-b35b-37f5e488a6641738237963.png', 'asd', NULL, '2025-01-30 04:52:43', NULL, '2025-01-30 04:52:43', NULL),
('92ec62a1-4d3b-4e9d-9823-3649a9305a3e', 'asd', 'asd', 'a08f6e59-5139-45d6-b00d-87f237e6aa261738237985.png,72fc05c3-8d22-490f-995c-5f0c595947c21738237985.png,2ca28eb6-df88-4483-b51c-90b926707b121738237985.png,c3f7cc33-236d-441f-a724-f24c74a9bf721738237985.png', 'asd', NULL, '2025-01-30 04:53:05', NULL, '2025-01-30 04:53:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `uid` varchar(40) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `name`, `slug`, `description`) VALUES
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'Super Admin', 'super_admin', 'Being a super admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_uid` varchar(40) NOT NULL,
  `permission_uid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_uid`, `permission_uid`) VALUES
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '1e65f1cc-4a52-4a25-949f-18e436984511'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '4b4a3ae2-ce54-47a5-b682-0ef8e86ae0f6'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '54932999-cc85-4131-a857-107714f4edc5'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '55c3c286-5727-44cc-8693-ab369406fd1d'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '5851c5a8-325b-434e-a36c-75ba0f2e2bd6'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '96803e1a-f019-4518-a8fb-12334d079922'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'aa1f7900-4741-4f75-8854-9506cc4bacc9'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'bd8adad1-15ad-47ff-b7c7-8b6d9045f884'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'bdfaa6be-f0f6-4a3e-a9d5-08f5d1ce55cf'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'be784f9b-9c10-409d-ae84-21f270d680de'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'c4114751-4829-45a2-88f9-96b07f8c3ff8'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'ca64c1af-3bd1-4804-9181-7f4b325d2368'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'cd7e7337-b2f6-4ad2-bd0f-c27d2de0cc96'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'e798f494-f933-4c2a-ac04-781dc4fc24a7'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'f2238d3b-9cc8-4cba-ae56-1abe592c990e'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'f2b06d1d-3b53-4010-9b82-eed65486fc09'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'f99117e0-ba23-4a96-8aef-b428916a7001');

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
('FObRuouRR6zazM1l5V4r9zyglAOGXF6bkXm5bVNC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjhLMlJXTWFtY0lYemtTd1JjMFlWM3V4M3h0NGZhbklTUTc2WGtlZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731547014),
('I5kGvl0De1BaMuEpRJdYuZ0sLmkzlr1i1F61QwPs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2hyajN5czdCQThQV2VsN1pDMkJIMjdiNXV0ZllzeDU2dzVWcDFncyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731547233);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(40) NOT NULL,
  `id` bigint(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `role_uid` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `id`, `name`, `profile_picture`, `username`, `password`, `active`, `role_uid`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
('a9467865-37c1-4104-bd63-b26a33c915db', 5, 'Administrator', NULL, 'admin', '$2y$12$ZW/e7ChmDQjTZ5S04FD9ZuGlnSkFxPcLplevfGfcrIYTLQNDDU6hm', 1, '731f53cb-5c48-4b5f-add6-bb5e6abc9698', '2024-10-18 06:52:21', NULL, '2024-11-14 18:22:45', NULL, 0, 'avatar.png', 0, '#2180f3');

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `module_uid` (`module_uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique_uid` (`uid`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_uid`,`permission_uid`),
  ADD KEY `permission_uid` (`permission_uid`);

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
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique_uid` (`uid`),
  ADD UNIQUE KEY `user_id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_uid` (`role_uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`module_uid`) REFERENCES `modules` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `permissions_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_uid`) REFERENCES `roles` (`uid`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_uid`) REFERENCES `permissions` (`uid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_uid`) REFERENCES `roles` (`uid`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
