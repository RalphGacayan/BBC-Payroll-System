-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 07:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astro_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `unit` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) NOT NULL,
  `status` enum('damaged','used','spare') NOT NULL,
  `company` enum('asmi','tibsi','cpn') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`id`, `no`, `date`, `unit`, `item_name`, `model`, `image`, `serial_number`, `status`, `company`, `created_at`, `updated_at`) VALUES
(5, '4', '2023-07-29', 'tertsdf', 'fsfsdf', '45454', '1692676037.jpg', '6464756565646', 'damaged', 'tibsi', '2023-07-20 19:58:50', '2023-08-21 19:47:17'),
(6, '5', '2023-07-27', 'fgdfgdfg', 'fsfsd', 'grtrrgdgd', '1692691855.jpg', '54656464564', 'used', 'tibsi', '2023-07-30 18:37:15', '2023-08-22 00:10:55'),
(7, '6', '2023-08-16', 'hdfhfgh', 'fdsfdsf', '45454', 'no_image', '65464564566', 'used', 'asmi', '2023-08-14 21:18:56', '2023-08-14 21:18:56'),
(9, '8', '2023-08-18', 'dhrutifg', 'dfetruyf', '463464656', 'no_image', '65465645634t', 'damaged', 'cpn', '2023-08-14 22:35:19', '2023-08-14 22:35:19'),
(10, '9', '2023-09-01', 'yreyeryegsdg', 'gdfgf', '523534534535', '1692674344.jpg', '5367670636', 'damaged', 'tibsi', '2023-08-14 22:38:06', '2023-08-21 19:19:04'),
(12, '10', '2023-09-08', 'uffhfgh', 'gyhhfg', '66464', '1692670884.jpg', '756765765', 'damaged', 'asmi', '2023-08-14 23:20:30', '2023-08-21 18:21:24'),
(13, '10', '2023-09-03', 'rytrurur', 'herty', '64645', '1692670835.jpg', 'y554456456456', 'damaged', 'tibsi', '2023-08-14 23:48:08', '2023-08-21 18:20:35'),
(14, '10', '2023-09-06', 'yryryyry', 'fgffhfgfhh', '6546564', '1692671625.jpg', '746744444764575676767', 'spare', 'cpn', '2023-08-15 23:42:19', '2023-08-21 18:33:45'),
(15, '10', '2023-08-24', 'yrtyrtyrty', 'gsdfgdfsg', 'dgdfgdf', '1692775222.jpg', '645645654', 'damaged', 'tibsi', '2023-08-22 23:20:22', '2023-08-22 23:20:22');

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
(12, '2023_06_14_052948_create_computers_table', 1),
(13, '2023_06_19_014346_add_company_column_to_computers', 2),
(15, '2023_06_20_073114_update_user_status_id_values_in_users_table', 4),
(17, '2023_06_22_020332_add_image_to_computers_table', 6),
(18, '2023_06_22_025853_add_created_by_to_computers_table', 7),
(20, '2023_06_22_030913_create_computers_table', 8),
(21, '2023_06_22_060642_create_computers_table', 9),
(23, '2023_06_22_062132_create_computers_table', 10),
(24, '2023_06_22_064152_create_computers_table', 11),
(40, '2014_10_12_000000_create_users_table', 12),
(41, '2014_10_12_100000_create_password_reset_tokens_table', 12),
(42, '2014_10_12_100000_create_password_resets_table', 12),
(43, '2019_08_19_000000_create_failed_jobs_table', 12),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 12),
(45, '2023_06_20_062414_add_role_as_to_users_table', 12),
(46, '2023_06_20_074058_add_user_status_id_to_users_table', 12),
(47, '2023_06_22_064426_create_computers_table', 12),
(48, '2023_06_22_075216_make_image_nullable_in_computers_table', 12),
(49, '2023_06_22_080136_update_status_enum_values_in_computers_table', 12),
(50, '2023_07_10_033832_create_purchase_orders_table', 12),
(51, '2023_07_17_053608_remove_description_items_from_purchase_orders_table', 13),
(52, '2023_07_17_054129_create_purchase_orders_table', 14),
(53, '2023_07_17_061338_create_purchase_orders_table', 15),
(54, '2023_07_17_062438_create_purchased_order_items_table', 16),
(56, '2023_07_17_064235_remove_prepared_by_from_purchase_orders', 17),
(57, '2023_07_18_014415_create_table_items', 18),
(58, '2023_07_18_082408_create_purchase_orders_table', 19),
(59, '2023_07_18_090105_create_purchase_orders_table', 20),
(60, '2023_07_19_090527_create_purchase_orders_table', 21),
(61, '2023_07_19_090826_create_purchase_orders_table', 22),
(62, '2023_07_19_101239_remove_created_by_column_from_computers_table', 23),
(63, '2023_07_19_101433_remove_created_by_column_from_computers_table', 24),
(64, '2023_07_28_072938_create__company_table', 25),
(65, '2023_07_28_073124_create__company_table', 26),
(66, '2023_07_28_074145_create__supplier_table', 27),
(67, '2023_07_31_011340_create__supplier_table', 28),
(68, '2023_07_31_012411_create__company_table', 29),
(69, '2023_07_31_020416_create_suppliers_table', 30),
(70, '2023_07_31_020619_create_companies_table', 30),
(71, '2023_07_31_024157_create_departments_table', 31),
(72, '2023_07_31_024426_create_departments_table', 32),
(73, '2023_07_31_025702_create_companies_table', 33),
(74, '2023_07_31_033003_create_purchase_details_table', 34),
(75, '2023_07_31_065410_create_purchase_items_table', 35),
(76, '2023_08_02_084053_create_purchase_details_table', 36),
(77, '2023_08_03_015347_create_purchase_details_table', 37),
(78, '2023_08_03_015412_create_purchase_items_table', 37),
(79, '2023_08_03_035809_create_purchase_details_table', 38),
(80, '2023_08_03_035839_create_purchase_items_table', 38),
(81, '2023_08_08_064521_remove_department_from_purchase_details', 39),
(82, '2023_08_10_035226_add_position_to_users_table', 40),
(83, '2023_08_10_040014_add_position_to_users_table', 41),
(84, '2023_08_10_051428_remove_position_to_users_table', 42),
(85, '2023_08_10_052840_remove_position_column_from_users', 43),
(86, '2023_08_10_053155_add_position_to_users_table', 44);

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
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `terms_of_payment` enum('cashpayment','cashondelivery','30days','50days') NOT NULL,
  `company` enum('ASMI','TIBSI','CPN','PMCC','ACSFI') NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `withholding_tax` decimal(10,2) NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `po_number`, `supplier_name`, `date`, `delivery_date`, `terms_of_payment`, `company`, `subtotal`, `withholding_tax`, `grandtotal`, `created_at`, `updated_at`) VALUES
(2, 'dadasdasd', '2', '2023-08-03', '2023-08-10', '30days', 'TIBSI', '6300.00', '63.00', '6237.00', '2023-08-03 00:38:18', '2023-08-21 19:10:24'),
(3, 'asmi0001', '1', '2023-08-04', '2023-08-04', 'cashpayment', 'CPN', '3000.00', '30.00', '2970.00', '2023-08-03 00:42:59', '2023-08-03 00:42:59'),
(4, 'tytyhfgh', '2', '2023-08-04', '2023-08-15', '50days', 'ASMI', '100000.00', '1000.00', '99000.00', '2023-08-03 17:20:50', '2023-08-03 17:20:50'),
(5, 'fdsss4rtrryhkjyyuyu', '2', '2023-08-12', '2023-08-24', 'cashondelivery', 'CPN', '168000.00', '1680.00', '166320.00', '2023-08-07 22:07:10', '2023-08-07 22:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_details_id` bigint(20) UNSIGNED NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_details_id`, `item_description`, `quantity`, `unit`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(3, 3, 'mouse', 5, 'fdfd', '300.00', '1500.00', '2023-08-03 00:42:59', '2023-08-03 00:42:59'),
(4, 3, 'ups', 3, 'hghghh', '500.00', '1500.00', '2023-08-03 00:42:59', '2023-08-03 00:42:59'),
(5, 4, 'yrtytry', 5, 'gdfgdfg', '20000.00', '100000.00', '2023-08-03 17:20:50', '2023-08-03 17:20:50'),
(15, 5, 'dgdfgdfgdfg', 6, 'sfsdfsdf', '8000.00', '48000.00', '2023-08-07 22:35:18', '2023-08-07 22:35:18'),
(16, 5, 'fdgfdgujyiuyhgkggj', 4, 'hjhjhj', '12000.00', '48000.00', '2023-08-07 22:35:18', '2023-08-07 22:35:18'),
(17, 5, 'fghrtyreujk,lsdg', 6, 'dhhg', '12000.00', '72000.00', '2023-08-07 22:35:18', '2023-08-07 22:35:18'),
(19, 2, 'asdasdasd', 7, 'gdfgdfg', '900.00', '6300.00', '2023-08-21 19:10:24', '2023-08-21 19:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `attention` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `supplier_name`, `address`, `attention`, `created_at`, `updated_at`) VALUES
(1, '1', 'Acer', 'Cebu City', 'Lebron James', NULL, NULL),
(2, '2', 'Dell', 'Mandaue City', 'Kevin Durant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `user_status_id` tinyint(4) NOT NULL DEFAULT 1,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`, `user_status_id`, `position`) VALUES
(1, 'ralph', 'rgacayan@gmail.com', NULL, '$2y$10$wHLHF8E0JijSgeI7nIfoQO2HR6FrnSd3J5C3M6iA69JTlxiShmdLO', NULL, '2023-07-09 21:59:51', '2023-07-09 21:59:51', 0, 1, ''),
(2, 'Gilfred Petancio', 'gpetancio@astroships.com', NULL, '$2y$10$XKhvgSQszZ4iVvQh0s8tZeJgH4JdnFDRfDMkyXMOBa.VxNzTUekCK', NULL, '2023-08-09 21:06:13', '2023-08-09 21:06:13', 0, 1, ''),
(3, 'Gilfred Petancio', 'gepetancio@astroships.com', NULL, '$2y$10$/E05MW6UXNe0zDVsXTNL0uHfZkvZcr2q46rKvHrVDo9LPTjH3j3xG', NULL, '2023-08-09 21:11:06', '2023-08-09 21:11:06', 0, 1, ''),
(4, 'Gilfred Petancio', 'gilfredpetancio@astroships.com', NULL, '$2y$10$yMAy0Hqu6wjFjvmsS9Fj..x8iDmEz/wYxLSMxX56ftHanXMpo.hqy', NULL, '2023-08-09 21:42:12', '2023-08-09 21:42:12', 0, 1, 'IT Manager'),
(5, 'Ralph Gacayan', 'gacayan@astroships.com', NULL, '$2y$10$xEKJrc5PGaj1bVQGqqHlNei2oETJX62nBK2DqxRImzVuprNvD0.7C', NULL, '2023-08-09 23:03:06', '2023-08-09 23:03:06', 0, 1, 'Software Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
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
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_name_idx` (`supplier_name`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_details_id_foreign` (`purchase_details_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_supplier_id_unique` (`supplier_id`);

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
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `supplier_name` FOREIGN KEY (`supplier_name`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_purchase_details_id_foreign` FOREIGN KEY (`purchase_details_id`) REFERENCES `purchase_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
