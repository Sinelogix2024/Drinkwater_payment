-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: jaminet.iad1-mysql-e2-7b.dreamhost.com
-- Generation Time: Jan 17, 2024 at 02:34 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advocates_prod`
--

-- --------------------------------------------------------

--
-- Table structure for table `ach_customers`
--

CREATE TABLE `ach_customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `routing_number` varchar(20) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `ownership_type` varchar(50) NOT NULL,
  `last_order_id` int DEFAULT NULL,
  `next_order_date` date DEFAULT NULL,
  `is_subscribed` tinyint DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ach_customers`
--

INSERT INTO `ach_customers` (`id`, `first_name`, `last_name`, `business_name`, `email`, `phone`, `customer_id`, `account_number`, `routing_number`, `account_type`, `ownership_type`, `last_order_id`, `next_order_date`, `is_subscribed`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jaydeep', 'Khokhar', NULL, 'jaydeep@test.com', '1234567890', '1111', '12345', '1245556', 'savings', 'personal', 51, '2023-04-27', 1, 1, '2023-03-13 23:04:33', '2023-03-27 01:53:52'),
(2, 'Jaydeep', 'Khokhar', NULL, 'jaydeep@test.com', '1234567890', '53552446094', '12345', '1245556', 'savings', 'personal', NULL, NULL, NULL, 1, '2023-03-13 23:17:46', '2023-03-13 23:17:46'),
(3, 'jaydeep', 'Khokhar', NULL, 'jaydeep.khokhar+testmail1421@techqware.com', '345-678-9876', '58539060466', '123456789', '11401533', 'savings', 'personal', 65, '2023-04-15', 1, 1, '2023-03-13 23:38:06', '2023-03-15 05:59:49'),
(4, 'FTest', 'LTest', NULL, 'jaydeep1@yopmail.com', '345-678-9876', '52051528703', '000123456789', '0011401533', 'savings', 'personal', NULL, NULL, NULL, 1, '2023-03-13 23:55:44', '2023-03-13 23:55:44'),
(5, 'jaydeep', 'LTest', NULL, 'jaydeep.khokhar@techqware.com', '987-654-3210', '47794895569', '000123456788', '0011401533', 'savings', 'personal', 54, '2023-04-14', 1, 1, NULL, '2023-03-14 00:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `dw_advocate`
--

CREATE TABLE `dw_advocate` (
  `id` bigint UNSIGNED NOT NULL,
  `adv_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adv_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_type` enum('droplet','droplet-name','droplet-logo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'droplet-name',
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_email_verified_at` timestamp NULL DEFAULT NULL,
  `adv_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_detail_access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_collab` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dw_advocate`
--

INSERT INTO `dw_advocate` (`id`, `adv_first_name`, `adv_last_name`, `adv_email`, `link_type`, `logo_url`, `adv_email_verified_at`, `adv_password`, `adv_detail_access_token`, `is_collab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kenny', 'Raphel', 'kenny.raphel@liquidbold.com', 'droplet-logo', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'kny123rph', 0, '2022-07-17 15:52:09', '2022-10-14 13:53:45', NULL),
(12, 'Kenny', 'Raphael', 'kenny.raphael@liquidbold.com', 'droplet-logo', 'kr-logo.png', NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'kenny-raphael', 0, '2022-09-30 15:52:09', '2022-10-14 14:02:52', NULL),
(13, 'Sergey', 'Novikov', 'sergey.novikov@liquidbold.com', 'droplet-name', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'sergey-novikov', 0, '2022-09-30 15:52:09', '2022-09-30 15:52:09', NULL),
(14, 'Laura', 'Aramburo', 'laura.aramburo@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'laura-aramburo', 0, '2022-09-30 15:52:09', '2022-10-04 13:24:06', NULL),
(15, 'Anthony', 'Bold', 'anthony.bold@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'anthony-bold', 0, '2022-09-30 15:52:09', '2022-10-04 13:24:10', NULL),
(16, 'Aldy', '', 'aldy@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'mother', 0, '2022-09-30 15:52:09', '2022-10-04 13:24:10', NULL),
(17, 'Harold', '', 'harold@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'father', 0, '2022-09-30 15:52:09', '2022-10-04 13:24:10', NULL),
(18, 'Watr', 'Haus', 'watr-haus@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'watr-haus', 0, '2022-10-26 15:52:09', '2022-10-26 13:24:10', NULL),
(19, 'Jake', 'Bordessa', 'jake-bordessa@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'jake-bordessa', 0, '2022-10-26 15:52:09', '2022-10-26 13:24:10', NULL),
(20, 'Jaren', 'Matthews', 'jaren-matthews@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'jaren-matthews', 0, '2022-10-31 15:52:09', '2022-11-01 14:00:13', NULL),
(21, 'Lissy', 'Gomez', 'lissy-gomez@liquidbold.com', 'droplet', NULL, NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'lissy-gomez', 0, '2022-10-31 15:52:09', '2022-10-31 13:24:10', NULL),
(22, 'Sabal', 'Coffee', 'sabal-coffee@liquidbold.com', 'droplet-logo', 'sabal_coffee.png', NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'sabal-coffee', 0, '2022-11-15 16:52:09', '2022-11-15 13:23:04', NULL),
(23, 'Park', 'Grove', 'park-grove@liquidbold.com', 'droplet-logo', 'park_grove.png', NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'park-grove', 1, '2022-11-15 16:52:09', '2023-01-13 11:47:40', NULL),
(24, 'TruBar', 'Equinox', 'trubar-equinox@liquidbold.com', 'droplet-logo', 'trubar.png', NULL, '$2y$10$GURj0K6ufpHZBtGVfU3ZguA1f2ZCJA0hR3v7NthI7YEREn4T6NgjK', 'trubar', 1, '2022-11-30 16:52:09', '2023-01-13 11:47:42', NULL);

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
-- Table structure for table `inventory_stock`
--

CREATE TABLE `inventory_stock` (
  `id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pallet_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_of_cases` int NOT NULL,
  `no_of_bottle` int NOT NULL,
  `stocks` int NOT NULL,
  `inventory_notes` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_stock_mgt`
--

CREATE TABLE `inventory_stock_mgt` (
  `id` int NOT NULL,
  `steptype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inventory_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inv_pro_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_pro_cases` int NOT NULL,
  `inv_material_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_mate_label_detail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_mate_preforms_detail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_mate_boxes_detail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_pro_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_damage_chk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_note` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bil_select_del_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_deli_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_carrier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_pallet_billing` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_pro_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_demage_check` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_state` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_state_region` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_zip` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_of_bottle` int NOT NULL,
  `stocks` int NOT NULL,
  `inventory_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_stock_mgt`
--

INSERT INTO `inventory_stock_mgt` (`id`, `steptype`, `inventory_type`, `inv_pro_name`, `inv_pro_cases`, `inv_material_name`, `inv_mate_label_detail`, `inv_mate_preforms_detail`, `inv_mate_boxes_detail`, `inv_pro_img`, `inv_damage_chk`, `inv_note`, `bil_select_del_type`, `bill_deli_date`, `bill_carrier`, `bill_pallet_billing`, `bill_pro_img`, `bill_demage_check`, `bill_address`, `bill_city`, `bill_state`, `bill_state_region`, `bill_zip`, `no_of_bottle`, `stocks`, `inventory_notes`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 'inventory', 'product', '1', 2, '', '', '', '', '', 'check', 'test rec', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-15 06:15:37', NULL, '2023-06-15 06:15:37'),
(2, 'inventory', 'product', '1', 48, '', '', '', '', '', 'check', 'ddfjh', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-15 09:15:09', NULL, '2023-06-15 09:15:09'),
(3, 'billing', '', '', 0, '', '', '', '', '', '', '', '1', '', 'asas', '6', '', 'check', 'aanand ', 'Delhi', 'Uttar Pradesh', 'UP', '26120', 0, 0, '', '2023-06-15 09:35:40', NULL, '2023-06-15 09:35:40'),
(4, 'inventory', 'product', '2', 3, '', '', '', '', '', 'check', 'test', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-16 09:34:14', NULL, '2023-06-16 09:34:14'),
(5, 'inventory', 'product', '2', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 07:49:26', NULL, '2023-06-20 07:49:26'),
(6, 'inventory', 'product', '2', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 07:51:54', NULL, '2023-06-20 07:51:54'),
(7, 'inventory', 'product', '2', 2, '', '', '', '', '45', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 07:55:40', NULL, '2023-06-20 07:55:40'),
(8, 'inventory', 'product', '1', 88, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 07:57:35', NULL, '2023-06-20 07:57:35'),
(9, 'inventory', 'product', '2', 9, '', '', '', '', 'https://inventory.drinkwatr.com/wp-content/uploads/2023/06/PACKAGE-MGMT-ICON-4.png', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 08:00:09', NULL, '2023-06-20 08:00:09'),
(10, 'inventory', 'product', '1', 38, '', '', '', '', '49', '', ',kmxm,', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-20 08:03:57', NULL, '2023-06-20 08:03:57'),
(11, 'billing', '', '', 0, '', '', '', '', '', '', '', '2', '', 'carrier', '2', '', '', 'anand', 'Delhi', 'Uttar Pradesh', 'UP', '26120', 0, 0, '', '2023-06-20 09:35:42', NULL, '2023-06-20 09:35:42'),
(12, 'billing', '', '', 0, '', '', '', '', '', '', '', '1', '', 'test', '3', '', '', 'anand', 'Bengaluru', 'Karnataka', 'KA', '56000', 0, 0, '', '2023-06-20 09:43:03', NULL, '2023-06-20 09:43:03'),
(13, 'billing', '', '', 0, '', '', '', '', '', '', '', '1', '', 'test', '3', '', '', 'aand', 'Delhi', 'Uttar Pradesh', 'UP', '26120', 0, 0, '', '2023-06-20 09:58:53', NULL, '2023-06-20 09:58:53'),
(14, 'billing', '', '', 0, '', '', '', '', '', '', '', '1', '', 'asas', '3', '50', '', 'andnd', 'Delhi', 'Uttar Pradesh', 'UP', '26120', 0, 0, '', '2023-06-20 13:04:48', NULL, '2023-06-20 13:04:48'),
(15, 'inventory', 'material', '', 0, 'preforms', '', '{\"material_preform\":\"36g\",\"no_of_preform_order\":\"2\"}', '', '53', '', 'test', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-06-30 11:54:17', NULL, '2023-06-30 11:54:17'),
(16, 'inventory', 'material', '', 0, 'boxes', '', '', '{\"material_boxes\":null,\"pallet_boxes\":null,\"pallet_per_boxes\":\"2\"}', '54', 'check', 'test', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2023-07-03 07:42:22', NULL, '2023-07-03 07:42:22'),
(17, 'inventory', 'product', '2', 50, '', '', '', '', '55', '', 'test data', '', '', '', '', '', '', 'anand - 123', 'Delhi', 'Uttar Pradesh', '', '26120', 0, 0, '', '2023-07-04 07:34:58', NULL, '2023-07-04 07:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `odr_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicing_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr_mobile` bigint UNSIGNED DEFAULT NULL,
  `odr_product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_city_state_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int UNSIGNED DEFAULT NULL,
  `odr_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_payment_status` text COLLATE utf8mb4_unicode_ci,
  `delivery_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_tax_amount` text COLLATE utf8mb4_unicode_ci,
  `odr_service_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_subtotal_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `odr_id`, `invoicing_number`, `odr_contact_name`, `odr_company_name`, `odr_email`, `odr_mobile`, `odr_product`, `billing_address`, `billing_address2`, `b_city_state_zip`, `payment_method`, `odr_transaction_id`, `odr_payment_status`, `delivery_fee`, `odr_total_amount`, `odr_tax_amount`, `odr_service_fee`, `odr_subtotal_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '98', NULL, 'invoicing_ttdrfn', 'q QUINOX GABLES', 'jaydeep.khokhar@techqware.com\n', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'q 25, Southwest 9th Street', NULL, '{\"city\":\"q Miami\",\"state\":\"q Florida\",\"region\":\"FL\",\"zip\":\"33131\"}', 5, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/28\\/2022\"}', '12.00', NULL, NULL, NULL, '2022-12-15 13:46:15', '2023-05-17 05:02:47', NULL),
(2, '99', NULL, 'invoicing_ttdrfn', 'q QUINOX GABLES', 'jaydeep.khokhar@techqware.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'q 25, Southwest 9th Street', NULL, '{\"city\":\"q Miami\",\"state\":\"q Florida\",\"zip\":\"33131\"}', 1, '3WBMFQYR', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/28\\/2022\"}', '48.00', NULL, NULL, NULL, '2022-12-21 13:46:32', '2022-12-21 21:58:54', NULL),
(3, '100', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$19.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$5.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/23\\/2022\"}', '288.00', NULL, NULL, NULL, '2022-12-21 14:10:47', '2022-12-21 14:10:47', NULL),
(4, '101', NULL, 'Peter Matos', 'Malloy', 'pmatos@malloylaw.com', 3058588000, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2800, Southwest 3rd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33129\"}', 1, 'ATKHXT8K', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/22\\/2022\"}', '120.00', NULL, NULL, NULL, '2022-12-21 23:19:23', '2023-05-17 05:07:43', NULL),
(5, '102', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/30\\/2022\"}', '12.00', NULL, NULL, NULL, '2022-12-22 07:37:27', '2022-12-22 07:37:27', NULL),
(6, '103', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/29\\/2022\"}', '12.00', NULL, NULL, NULL, '2022-12-22 07:47:21', '2022-12-22 07:47:21', NULL),
(7, '104', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/30\\/2022\"}', '12.00', NULL, NULL, NULL, '2022-12-22 07:49:04', '2022-12-22 07:49:04', NULL),
(8, '105', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/29\\/2022\"}', '12.00', NULL, NULL, NULL, '2022-12-22 07:51:57', '2022-12-22 07:51:57', NULL),
(9, '106', NULL, 'invoicing_ttdrfn', 'Malloy', 'devteam3@liquidbold.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', '2800, Southwest 3rd Avenue', NULL, '{\"city\":\"Miami\",\"state\",\"region\":\"FL\":\"Florida\",\"zip\":\"33129\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/24\\/2023\"}', '24.00', NULL, NULL, NULL, '2023-01-02 13:40:06', '2023-05-17 05:07:53', NULL),
(10, '107', NULL, 'Falisha', 'Thomas', 'bayroad@delraw.com', 2393083993, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, '5TG9MEMD', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/02\\/2023\"}', '220.00', NULL, NULL, NULL, '2023-01-02 18:56:42', '2023-05-17 05:08:04', NULL),
(11, '108', NULL, 'Davide', 'AVO', 'Avomiamigm@gmail.com', 7868991065, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1834, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"3313\"}', 1, 'MTZEXNQN', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/09\\/2023\"}', '240.00', NULL, NULL, NULL, '2023-01-08 20:16:02', '2023-05-17 05:08:16', NULL),
(12, '109', NULL, 'Rocio', 'Park Grove', 'rsicaro@kwpmc.com', 7867143349, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', 1, 'GDQ5KE3Y', 'success', '{\"type\":\"2\",\"fee\":\"$5.00\",\"d_date\":\"01\\/11\\/2023\"}', '125.00', NULL, NULL, NULL, '2023-01-11 18:09:39', '2023-05-17 05:08:52', NULL),
(13, '110', NULL, 'Rocio', 'Park Grove', 'rsicaro@kwpmc.com', 7867143349, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', 1, 'PSS7GY4S', 'success', '{\"type\":\"2\",\"fee\":\"$5.00\",\"d_date\":\"01\\/11\\/2023\"}', '125.00', NULL, NULL, NULL, '2023-01-11 18:13:29', '2023-05-17 05:09:08', NULL),
(14, '111', NULL, 'Rocio', 'Park Grove', 'rsicaro@kwpmc.com', 7867143349, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', 1, 'DCTPP7G5', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/11\\/2023\"}', '48.00', NULL, NULL, NULL, '2023-01-11 20:38:43', '2023-05-17 05:09:18', NULL),
(15, '112', NULL, 'invoicing_ttdrfn', 'Park Grove', 'devteam3@liquidbold.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/24\\/2023\"}', '24.00', NULL, NULL, NULL, '2023-01-16 09:40:39', '2023-05-17 05:09:34', NULL),
(16, '113', NULL, 'invoicing_ttdrfn', 'Park Grove', 'devteam3@liquidbold.com', 3107398607, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$3.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/31\\/2023\"}', '36.00', NULL, NULL, NULL, '2023-01-16 09:44:00', '2023-05-17 05:09:43', NULL),
(17, '114', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$3.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"region\":\"TL\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/31\\/2023\"}', '36.00', NULL, NULL, NULL, '2023-01-17 06:03:25', '2023-05-17 05:09:55', NULL),
(18, '115', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/31\\/2023\"}', '48.00', NULL, NULL, NULL, '2023-01-17 13:14:06', '2023-01-17 13:14:06', NULL),
(19, '116', NULL, 'invoicing_ttdrfn', 'Park Grove', 'devteam3@liquidbold.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"7\\\",\\\"price\\\":\\\"$3.00\\\"}\"]', '2831, South Bayshore Drive', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$1.00\",\"d_date\":\"01\\/26\\/2023\"}', '265.00', NULL, NULL, NULL, '2023-01-18 13:45:49', '2023-05-17 05:10:11', NULL),
(20, '117', NULL, 'Danny', 'Equinox', 'danny@trubarjuicebar.com', 3057331815, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '520, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, '1M439QX3', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/18\\/2023\"}', '192.00', NULL, NULL, NULL, '2023-01-18 14:49:35', '2023-05-17 05:10:32', NULL),
(21, '118', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"$5.00\",\"d_date\":\"01\\/31\\/2023\"}', '17.00', NULL, NULL, NULL, '2023-01-20 06:16:00', '2023-01-20 06:16:00', NULL),
(22, '119', NULL, 'Handric Carino', 'AVO Miami', 'handric84@icloud.com', 7182190154, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1834, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, 'RQF1PS76', 'success', '{\"type\":\"1\",\"fee\":\"$5.00\",\"d_date\":\"01\\/23\\/2023\"}', '245.00', NULL, NULL, NULL, '2023-01-23 00:13:51', '2023-05-17 05:10:54', NULL),
(23, '120', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$5.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"$12.00\",\"d_date\":\"01\\/31\\/2023\"}', '312.00', NULL, NULL, NULL, '2023-01-23 06:47:51', '2023-01-23 06:47:51', NULL),
(24, '124', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$3.00\",\"d_date\":\"02\\/04\\/2023\"}', '27.00', NULL, NULL, NULL, '2023-01-24 07:22:43', '2023-01-24 07:22:43', NULL),
(25, '125', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$9.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$2.00\",\"d_date\":\"02\\/03\\/2023\"}', '218.00', NULL, NULL, NULL, '2023-01-24 07:46:06', '2023-01-24 07:46:06', NULL),
(26, '130', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/01\\/2023\"}', '24.00', NULL, NULL, NULL, '2023-01-25 12:22:34', '2023-01-25 12:22:34', NULL),
(27, '131', NULL, 'Danny Trubar', 'Equinox All', 'danny@trubarjuicebar.com', 3057181815, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '520, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, '627BZE5G', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"01\\/25\\/2023\"}', '84.00', NULL, NULL, NULL, '2023-01-25 17:35:59', '2023-05-17 05:11:21', NULL),
(28, '132', NULL, 'Brandy Coletta', 'Mercato Bakery', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/25\\/2023\"}', '130.00', NULL, NULL, NULL, '2023-01-25 22:12:38', '2023-05-17 05:11:33', NULL),
(29, '133', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$4.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"region\":\"TL\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$5.00\",\"d_date\":\"02\\/04\\/2023\"}', '173.00', NULL, NULL, NULL, '2023-01-27 05:08:54', '2023-05-17 05:11:46', NULL),
(30, '134', NULL, 'rucha parmar', 'agasg', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/28\\/2023\"}', '60.90', NULL, '2.90', '58.00', '2023-01-27 13:08:57', '2023-01-27 13:08:57', NULL),
(31, '135', NULL, 'Brandy Coletta', 'Mercato Bakery', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/28\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-01-28 16:52:16', '2023-05-17 05:11:54', NULL),
(32, '136', NULL, 'invoicing_ttdrfn', 'Mercato Bakery', 'info@mckitchenmiami.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/30\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-01-30 13:55:48', '2023-05-17 05:12:12', NULL),
(33, '137', NULL, 'Faisha', 'Delicious Raw', 'bayroad@delraw.com', 2393083993, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, 'HCBT8H5V', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"02\\/02\\/2023\"}', '231.00', NULL, '11.00', '220.00', '2023-01-30 16:27:04', '2023-05-17 05:12:26', NULL),
(34, '138', NULL, 'Jennifer Peraza', 'Continum', 'jennifer@movefitness.com', 7865124441, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"20\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '100, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, 'QPZP53B6', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/02\\/2023\"}', '504.00', NULL, '24.00', '480.00', '2023-01-30 16:32:36', '2023-05-17 05:12:35', NULL),
(35, '139', NULL, 'rucha parmar', 'agasg', 'sohilsinelogix@gmail.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/03\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-01-31 07:05:42', '2023-01-31 07:05:42', NULL),
(36, '140', NULL, 'Brandy Coletta', 'Mercato Bakery', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"01\\/31\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-01-31 20:46:44', '2023-05-17 05:12:47', NULL),
(37, '141', NULL, 'Danny Trubar', 'Equinox', 'Danny@trubarjuicebar.com', 3057331815, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '520, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/02\\/2023\"}', '264.60', NULL, '12.60', '252.00', '2023-02-02 15:44:59', '2023-05-17 05:12:56', NULL),
(38, '142', NULL, 'rucha parmar', 'company', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$3.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$1.00\",\"d_date\":\"02\\/17\\/2023\"}', '38.85', NULL, '1.85', '37.00', '2023-02-03 05:32:01', '2023-02-03 05:32:01', NULL),
(39, '143', NULL, 'Brandy Coletta', 'MERCATO Design District', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"02\\/15\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-02-14 16:56:47', '2023-05-17 05:13:07', NULL),
(40, '144', NULL, 'rucha parmar', 'company', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/10\\/2023\"}', '25.20', NULL, '1.20', '24.00', '2023-02-15 05:42:01', '2023-02-15 05:42:01', NULL),
(41, '145', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'paraisomarketcafe@gmail.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '3131, Northeast 7th Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/15\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-02-16 03:15:20', '2023-05-17 05:13:36', NULL),
(42, '146', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'paraisomarketcafe@gmail.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '501, Northeast 31st Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 2, 'ESDFQ4S4', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/21\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-02-21 18:47:08', '2023-05-17 05:13:50', NULL),
(43, '147', NULL, 'Elena', 'Rumble Boxing Gym', 'southbeachgm@rumbleboxinggym.com', 5164763441, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"25\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1220, 17th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 2, 'GCD2XMX2', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/24\\/2023\"}', '472.50', NULL, '22.50', '450.00', '2023-02-23 16:17:24', '2023-05-17 05:13:59', NULL),
(44, '148', NULL, 'Clemens Hernandez', 'Market Plus', 'clemens@marketpluscorp.com', 7865669305, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/24\\/2023\"}', '252.00', NULL, '12.00', '240.00', '2023-02-24 22:35:20', '2023-05-17 05:14:09', NULL),
(45, '149', NULL, 'Clemens Hernandez', 'Market Plus Wynwood', 'Clemens@marketpluscorp.com', 7865669305, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/25\\/2023\"}', '252.00', NULL, '12.00', '240.00', '2023-02-25 07:14:19', '2023-05-17 05:14:19', NULL),
(46, '150', NULL, 'Clemens Hernandez', 'Market Plus Wynwood', 'Clemens@marketpluscorp.com', 7865669305, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/26\\/2023\"}', '252.00', NULL, '12.00', '240.00', '2023-02-26 16:39:25', '2023-05-17 05:14:29', NULL),
(47, '151', NULL, 'Clemens Hernandez', 'Market Plus Wynwood', 'founder@watr.world', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', 2, 'BPH3N8WD', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"02\\/26\\/2023\"}', '252.00', NULL, '12.00', '240.00', '2023-02-26 16:41:23', '2023-05-17 05:14:37', NULL),
(48, '152', NULL, 'rucha parmar', 'company', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/10\\/2023\"}', '25.20', NULL, '1.20', '24.00', '2023-03-03 05:05:56', '2023-03-03 05:05:56', NULL),
(49, '153', NULL, 'rucha parmar', 'company', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$0.00\\\"}\"]', 'B/4/1, Street Number 7', NULL, '{\"city\":\"Hyderabad\",\"state\":\"Telangana\",\"zip\":\"50000\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/04\\/2023\"}', '0.00', NULL, '0.00', '0.00', '2023-03-03 06:21:47', '2023-03-03 06:21:47', NULL),
(50, '154', NULL, 'Harold Concepcion', 'Market Plus Wynwood', 'Concep_h@bellsouth.net', 3052971314, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '7190, Southwest 87th Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33156\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"03\\/06\\/2023\"}', '262.50', NULL, '12.50', '250.00', '2023-03-05 17:23:09', '2023-05-17 05:14:49', NULL),
(51, '155', NULL, 'Dilo', 'Avo Miami', 'avomiami@gmail.com', 3055424139, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1834, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"03\\/08\\/2023\"}', '262.50', NULL, '12.50', '250.00', '2023-03-09 00:01:10', '2023-05-17 05:15:20', NULL),
(52, '156', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'paraisomarketcafe@gmail.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '33131, Northeast 7th Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 2, 'DFKREWKP', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/13\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-03-13 15:34:45', '2023-05-31 21:23:46', NULL),
(53, '157', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'anthony@liquidbold.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '3131, Northeast 7th Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 2, '943PTS4Y', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/13\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-03-13 16:39:24', '2023-05-17 05:15:39', NULL),
(54, '158', NULL, 'rucha parmar', 'company', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$5.00\\\"}\"]', 'B-4, 1st Lane', NULL, '{\"city\":\"Karachi\",\"state\":\"Sindh\",\"zip\":\"75340\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/15\\/2023\"}', '315.00', NULL, '15.00', '300.00', '2023-03-14 10:38:13', '2023-03-14 10:38:13', NULL),
(55, '159', NULL, 'Faisha', 'Delicious Raw Bay Road', 'bayroad@delraw.com', 2393083993, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"3313\"}', 2, 'BDR09ZMF', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"03\\/15\\/2023\"}', '237.30', NULL, '11.30', '226.00', '2023-03-15 17:36:14', '2023-05-17 05:15:52', NULL),
(56, '160', NULL, 'test', 'testq', 'test@gmail.com', 1234567890, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'rerdd', NULL, '{\"city\":\"Rome\",\"state\":\"Lazio\",\"region\":\"FL\",\"zip\":\"00153\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"04\\/07\\/2023\"}', '12.00', NULL, '0.00', '12.00', '2023-03-16 06:50:10', '2023-05-17 05:17:01', NULL),
(57, '161', NULL, 'test', 'test', 'rucha.parmar@techqware.com', 1234567890, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'abad', NULL, '{\"city\":\"Aligarh\",\"state\":\"Uttar Pradesh\",\"zip\":\"20200\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"04\\/05\\/2023\"}', '12.00', NULL, '0.00', '12.00', '2023-03-16 06:54:29', '2023-03-16 06:54:29', NULL),
(58, '162', NULL, 'rucha parmar', 'test', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', '888', NULL, '{\"city\":\"New York\",\"state\":\"New York\",\"region\":\"NY\",\"zip\":\"10106\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"04\\/07\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-03-17 05:18:46', '2023-03-17 05:18:46', NULL),
(59, '163', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'aboldstrategy@gmail.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '501, Northeast 31st Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 2, 'Q1AXKJM3', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/24\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-03-24 19:58:09', '2023-03-25 03:33:31', NULL),
(60, '164', NULL, 'Greg Cekay General Manager', 'Portofino Wine Bank', 'Portofinowine@bellsouth.net', 3055321988, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/29\\/2023\"}', '75.60', NULL, '3.60', '72.00', '2023-03-29 21:57:34', '2023-03-29 21:57:34', NULL),
(61, '165', NULL, 'Clemens Hernandez', 'Wynwood Plus Market', 'founder@drinkwatr.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', 2, 'DHK3338T', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"03\\/29\\/2023\"}', '262.50', NULL, '12.50', '250.00', '2023-03-29 22:10:24', '2023-04-01 09:18:41', NULL),
(62, '166', NULL, 'Greg Cekay', 'Portofino Wine Bank', 'haconcepcion@gmail.com', 7864787673, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"03\\/31\\/2023\"}', '75.60', NULL, '3.60', '72.00', '2023-03-31 17:39:27', '2023-03-31 17:39:27', NULL),
(63, '167', NULL, 'test sohil', 'techqware.com', 'sohil.saiyad@techqware.com', 1234567890, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"Anantapur\",\"state\":\"Andhra Pradesh\",\"region\":\"AP\",\"zip\":\"12342\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/06\\/2023\"}', '12.00', NULL, '0.00', '12.00', '2023-04-03 04:13:58', '2023-04-03 04:13:58', NULL),
(64, '168', NULL, 'test sohil', 'techqware.com', 'sohil.saiyad@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"Anantapur\",\"state\":\"Andhra Pradesh\",\"region\":\"AP\",\"zip\":\"12342\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/10\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-04-03 04:17:00', '2023-04-03 04:17:00', NULL),
(65, '169', NULL, 'test dev', 'abcd', 'testerdev0021@gmail.com', 1234567890, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'vihar', NULL, '{\"city\":\"Delhi\",\"state\":\"Uttar Pradesh\",\"region\":\"UP\",\"zip\":\"26120\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"04\\/28\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-04-03 05:01:05', '2023-04-03 05:01:05', NULL),
(66, '170', NULL, 'invoicing_ttdrfn', 'Portofino Wine Bank', 'testerdev0021@gmail.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/03\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-04-14 07:20:48', '2023-04-14 07:20:48', NULL),
(67, '171', NULL, 'Clemens Hernandez', 'Market Plus Wynwood', 'mrbold@boldventures.agency', 7865669305, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"10\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', 1, '301RRBCH', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"04\\/15\\/2023\"}', '262.50', NULL, '12.50', '250.00', '2023-04-15 16:26:29', '2023-04-19 08:23:15', NULL),
(68, '172', NULL, 'testdev', 'test re-api-r-ch', 'testerdev00021@gmail.com', 1234567890, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"New Delhi\",\"state\":\"Delhi\",\"region\":\"DL\",\"zip\":\"12345\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"04\\/05\\/2023\"}', '$12.60', NULL, '$0.60', '$12.00', '2023-04-17 07:02:08', '2023-05-08 17:53:01', NULL),
(69, '173', NULL, 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.coM', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/01\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-05-01 11:28:32', '2023-05-01 11:28:32', NULL),
(70, '174', NULL, 'Brandy Coletta', 'Mercato Bakery Design District', 'info@mckitchenmiami.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/01\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-05-01 12:03:41', '2023-05-01 12:03:41', NULL),
(71, '175', NULL, 'Monica Corvino', 'Mercato Icon Bay', 'monicacorvino12@gmail.com', 3055603088, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '460, Northeast 28th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 1, 'FYGMNEZ7', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/02\\/2023\"}', '75.60', NULL, '3.60', '72.00', '2023-05-02 17:04:25', '2023-05-03 01:46:33', NULL),
(72, '176', NULL, 'Jennifer', 'Perraza', 'thirsty@drinkwatr.com', 7865124431, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"25\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '100, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, '0D6C5GSF', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/05\\/2023\"}', '640.50', NULL, '30.50', '610.00', '2023-05-05 17:20:16', '2023-05-06 00:29:26', NULL),
(73, '177', NULL, 'Brandy', 'Mercato Design District', 'founder@watr.world', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.25\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 1, 'KDMXG5N0', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/10\\/2023\"}', '152.25', NULL, '7.25', '145.00', '2023-05-10 12:44:11', '2023-05-13 03:22:45', NULL),
(74, '178', NULL, 'Faisha', 'Delicious Raw Sunset Harbor', 'Founder@watr.world', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, 'PH22BTQM', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/10\\/2023\"}', '237.30', NULL, '11.30', '226.00', '2023-05-10 12:47:47', '2023-05-11 23:26:10', NULL),
(75, '179', '0026', 'Jaydeep', 'dev', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'anand', NULL, '{\"city\":\"New Delhi\",\"state\":\"Delhi\",\"region\":\"DL\",\"zip\":\"12345\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/15\\/2023\"}', '25.20', NULL, '1.20', '24.00', '2023-05-15 04:46:37', '2023-05-15 05:43:41', NULL),
(76, '180', 'ATC0027', 'jaydeep', 'dev', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', 'anand', NULL, '{\"city\":\"New Delhi\",\"state\":\"Delhi\",\"region\":\"DL\",\"zip\":\"12345\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/15\\/2023\"}', '25.20', NULL, '1.20', '24.00', '2023-05-15 07:20:03', '2023-05-15 07:20:03', NULL),
(77, '181', 'LRP0035', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, 'EB695637', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/19\\/2023\"}', '151.20', NULL, '7.20', '144.00', '2023-05-19 15:28:02', '2023-05-20 03:52:07', NULL),
(78, '182', '0001', 'rucha.parmar', 'dev', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"New Delhi\",\"state\":\"Delhi\",\"region\":\"DL\",\"zip\":\"12345\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/31\\/2023\"}', '12.60', NULL, '0.60', '12.00', '2023-05-23 09:28:42', '2023-05-23 09:28:42', NULL),
(79, '183', '0029', 'rucha.parmar', 'dev', 'rucha.parmar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"New Delhi\",\"state\":\"Delhi\",\"region\":\"DL\",\"zip\":\"12345\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/31\\/2023\"}', '12.00', NULL, '0.00', '12.00', '2023-05-24 07:55:36', '2023-05-24 07:55:36', NULL),
(80, '184', '0001', 'Anthony Bold', 'ST REGIS', 'laura@drinkwatr.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"60\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '2850, Tigertail Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/25\\/2023\"}', '1.00', NULL, '0.00', '1.00', '2023-05-24 17:39:11', '2023-05-24 17:39:11', NULL),
(81, '185', '0001', 'invoicing_ttdrfn', 'ST REGIS', 'laura.aramburo@drinkwatr.com', 3107398607, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"35\\\",\\\"price\\\":\\\"$3.00\\\"}\"]', '2850, Tigertail Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33133\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$2.00\",\"d_date\":\"05\\/26\\/2023\"}', '66.10', NULL, '63.10', '3.00', '2023-05-24 17:42:26', '2023-05-24 17:42:26', NULL),
(82, '186', '0003', 'test sohil', 'techqware.com', 'sohil.saiyad@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$1.00\\\"}\"]', 'anand', NULL, '{\"city\":\"Anantapur\",\"state\":\"Andhra Pradesh\",\"region\":\"AP\",\"zip\":\"12342\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"06\\/10\\/2023\"}', '12.00', NULL, '0.00', '12.00', '2023-05-26 04:46:35', '2023-05-26 04:46:35', NULL),
(83, '187', '0005', 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.coM', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"05\\/27\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-05-27 14:51:34', '2023-05-27 14:51:34', NULL),
(84, '188', '0002', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, 'QW74DMGC', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"05\\/27\\/2023\"}', '151.20', NULL, '7.20', '144.00', '2023-05-27 15:04:04', '2023-05-30 21:41:51', NULL),
(85, '189', '0003', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '1TD0VHQG', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"06\\/06\\/2023\"}', '151.20', NULL, '7.20', '144.00', '2023-06-06 17:35:37', '2023-07-12 21:03:57', NULL),
(86, '190', '0002', 'Greg Cekay General Manager', 'Portofino Wine Bank', 'Portofinowine@bellsouth.net', 3055321988, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"3\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"06\\/09\\/2023\"}', '86.10', NULL, '4.10', '82.00', '2023-06-09 18:03:43', '2023-06-09 18:03:43', NULL),
(87, '191', '0007', 'Jaydeep', 'techqware', 'jaydeep.khokhar@techqware.com', 8866745129, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"1\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '455, Northeast 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"06\\/16\\/2023\"}', '25.20', NULL, '1.20', '24.00', '2023-06-12 04:15:27', '2023-06-12 04:15:27', NULL),
(88, '192', '0004', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '7GHAW0D1', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"06\\/21\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-06-21 12:57:53', '2023-07-12 21:03:03', NULL),
(89, '193', '0004', 'Faisha', 'Delicious Raw Sunset Harbor', 'bayroad@delraw.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"8\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"06\\/22\\/2023\"}', '249.90', NULL, '11.90', '238.00', '2023-06-22 01:43:40', '2023-06-22 01:43:40', NULL),
(90, '194', '0005', 'Faisha', 'Delicious Raw Sunset Harbor', 'bayroad@delraw.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"8\\\",\\\"price\\\":\\\"$2.00\\\"}\",\"{\\\"product_name\\\":\\\"2\\\",\\\"kits\\\":\\\"2\\\",\\\"price\\\":\\\"$1.50\\\"}\"]', '1828, Bay Road', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 5, '3AF2DY2H', 'Settlement Pending', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"06\\/29\\/2023\"}', '249.90', NULL, '11.90', '238.00', '2023-06-29 14:34:59', '2023-07-13 21:05:31', NULL),
(91, '195', '0001', 'Nicolas', 'NATURA EATERY', 'nclichy@naturaeatery.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '75, Northeast 16th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33132\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"06\\/30\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-06-30 19:35:01', '2023-06-30 19:35:01', NULL),
(92, '196', '0002', 'Nicolas', 'NATURA EATERY', 'nclichy@naturaeatery.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '75, Northeast 16th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33132\"}', 1, 'EHEZYAGP', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"07\\/06\\/2023\"}', '111.30', NULL, '5.30', '106.00', '2023-07-06 19:34:53', '2023-07-10 20:17:07', NULL),
(93, '197', '0003', 'Brandy Coletta', 'Mercato Bakery Design District', 'info@mckitchenmiami.com', 3107398607, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 1, '0DRK93WV', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"07\\/14\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-07-13 17:05:18', '2023-07-26 03:17:08', NULL),
(94, '198', '0005', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '4WK1SJP6', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"07\\/18\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-07-18 16:55:00', '2023-07-26 00:40:50', NULL),
(95, '199', '0006', 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.coM', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', 2, 'ERF6J2MR', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"07\\/26\\/2023\"}', '136.50', NULL, '6.50', '130.00', '2023-07-26 16:56:35', '2023-07-27 00:34:30', NULL),
(96, '200', '0006', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '5TDPPSMN', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"07\\/29\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-07-29 11:33:06', '2023-08-04 02:02:07', NULL),
(97, '201', '0001', 'Ellie', 'Pomelo Mia Market', 'ellen@miamarket.com', 5139074658, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"5\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '140, Northeast 39th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 1, 'NH9R81CZ', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"07\\/31\\/2023\"}', '126.00', NULL, '6.00', '120.00', '2023-07-31 13:46:44', '2023-08-01 02:14:22', NULL),
(98, '202', '0002', 'Ellie', 'Pomelo Mia Market', 'ellen@miamarket.com', 5139074658, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '140, Northeast 39th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 1, '3KYB1EWH', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"08\\/13\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-08-13 19:28:07', '2023-08-14 03:08:48', NULL),
(99, '203', '0002', 'Jennifer Peraza', 'Continum', 'jennifer@movefitness.com', 7865124441, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"33\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '100, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"\",\"zip\":\"33139\"}', 1, 'MN2WG70X', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"08\\/25\\/2023\"}', '842.10', NULL, '40.10', '802.00', '2023-08-25 20:53:57', '2023-08-29 19:06:15', NULL),
(100, '204', '0007', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '2R0JJ1KA', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"08\\/27\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-08-27 21:26:06', '2023-08-28 05:09:54', NULL),
(101, '205', '0003', 'Ellie', 'Pomelo Mia Market', 'ellen@miamarket.com', 5139074658, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '140, Northeast 39th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33137\"}', 5, 'E3VEGRS0', 'Settlement Pending', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"08\\/31\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-08-31 13:57:04', '2023-09-01 23:52:06', NULL),
(102, '206', '0001', 'Giselma Balboa', 'Lennox Hotel Miami Beach', 'gbalboa@lennoxhotels.com', 7864060755, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"15\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1900, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$25.00\",\"d_date\":\"09\\/20\\/2023\"}', '404.25', NULL, '19.25', '385.00', '2023-09-20 13:03:59', '2023-09-20 13:03:59', NULL),
(103, '207', '0008', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '3X2JS8X9', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"09\\/20\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-09-20 13:04:54', '2023-10-05 07:50:40', NULL);
INSERT INTO `invoices` (`id`, `odr_id`, `invoicing_number`, `odr_contact_name`, `odr_company_name`, `odr_email`, `odr_mobile`, `odr_product`, `billing_address`, `billing_address2`, `b_city_state_zip`, `payment_method`, `odr_transaction_id`, `odr_payment_status`, `delivery_fee`, `odr_total_amount`, `odr_tax_amount`, `odr_service_fee`, `odr_subtotal_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(104, '208', '0005', 'Brandy Coletta', 'MERCATO Design District', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"\",\"zip\":\"33137\"}', 1, '0V6CDEWQ', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"09\\/20\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-09-20 13:05:51', '2023-09-26 21:37:49', NULL),
(105, '209', '0003', 'Greg Cekay General Manager', 'Portofino Wine Bank', 'Portofinowine@bellsouth.net', 3055321988, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"09\\/29\\/2023\"}', '111.30', NULL, '5.30', '106.00', '2023-09-29 19:34:21', '2023-09-29 19:34:21', NULL),
(106, '210', '0001', 'Michele', 'Merlo and Co (Continuum)', 'michele@merloandco.com', 3057533373, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"14\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '100 South Pointe Dr', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"\",\"zip\":\"33137\"}', NULL, NULL, NULL, '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"09\\/29\\/2023\"}', '352.80', NULL, '16.80', '336.00', '2023-10-02 18:37:41', '2023-10-02 18:37:41', NULL),
(107, '211', '0001', 'Elisa Vallotto', 'The Patio, LLC.', 'elisa@merloandco.com', 3057533373, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"14\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '100, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 1, 'EGNWVGJE', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"10\\/11\\/2023\"}', '352.80', NULL, '16.80', '336.00', '2023-10-11 14:14:53', '2023-10-11 22:29:55', NULL),
(108, '212', '0007', 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.coM', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', 1, 'GH3X0ERM', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"10\\/12\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-10-12 20:34:19', '2023-10-14 00:09:28', NULL),
(109, '213', '0009', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, 'B0XFAV0Z', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"10\\/13\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-10-13 23:27:50', '2023-10-27 22:50:09', NULL),
(110, '214', '0010', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '7YXGY95W', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"11\\/08\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-11-08 20:27:53', '2023-11-16 09:09:46', NULL),
(111, '215', '0006', 'Brandy Coletta', 'MERCATO Design District', 'brandy@mckitchenmiami.com', 2025287722, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"7\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '4141, Northeast 2nd Avenue', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"\",\"zip\":\"33137\"}', 1, 'CNRFTRT6', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"11\\/08\\/2023\"}', '186.90', NULL, '8.90', '178.00', '2023-11-09 15:46:46', '2023-12-09 23:11:17', NULL),
(112, '216', '0002', 'Giselma Balboa', 'Lennox Hotel Miami Beach', 'gbalboa@lennoxhotels.com', 7864060755, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"15\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1900, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$25.00\",\"d_date\":\"11\\/20\\/2023\"}', '404.25', NULL, '19.25', '385.00', '2023-11-20 17:15:10', '2023-11-20 17:15:10', NULL),
(113, '217', '0011', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '1K1TC2T5', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"11\\/21\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-11-20 17:22:50', '2023-12-02 04:01:40', NULL),
(114, '218', '0004', 'Greg Cekay General Manager', 'Portofino Wine Bank', 'Portofinowine@bellsouth.net', 3055321988, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '500, South Pointe Drive', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"11\\/21\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-11-20 17:23:46', '2023-11-20 17:23:46', NULL),
(115, '219', '0001', 'Ray Carter', 'Amelia Island Coffee', 'ray.carter904@gmail.com', 9122884059, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"4\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '207, Centre Street', NULL, '{\"city\":\"Fernandina Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"32034\"}', 1, 'P74RY2PC', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"11\\/24\\/2023\"}', '96.00', NULL, '0.00', '96.00', '2023-11-24 21:16:14', '2023-11-25 05:46:54', NULL),
(116, '220', '0012', 'Tyler', 'Necessary Purveyor', 'Tyler@necessarypurveyor.com', 9802292222, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1222, 16th Street', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', 3, '4CPQ6CPP', 'success', '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"12\\/04\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-12-04 19:15:42', '2023-12-20 22:03:14', NULL),
(117, '221', '0002', 'Ray Carter', 'Amelia Island Coffee', 'ray.carter904@gmail.com', 9122884059, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"36\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '207, Centre Street', NULL, '{\"city\":\"Fernandina Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"32034\"}', 1, '1QXDPFC8', 'success', '{\"type\":\"1\",\"fee\":\"\",\"d_date\":\"12\\/06\\/2023\"}', '864.00', NULL, '0.00', '864.00', '2023-12-05 22:05:50', '2023-12-06 20:44:01', NULL),
(118, '222', '0001', 'Paula Sanchez and Giselma Balboa', 'Lennox Hotel Miami Beach', 'psanchez@dhmhotels.com', 7864060755, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"20\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '1900, Collins Avenue', NULL, '{\"city\":\"Miami Beach\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33139\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$25.00\",\"d_date\":\"12\\/06\\/2023\"}', '530.25', NULL, '25.25', '505.00', '2023-12-20 21:08:33', '2023-12-20 21:08:33', NULL),
(119, '223', '0008', 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"12\\/26\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-12-26 23:17:44', '2023-12-26 23:17:44', NULL),
(120, '224', '0009', 'Andrea Posada', 'Paraiso Market Cafe', 'Paraisomarketcafe@gmail.com', 9544789814, '[\"{\\\"product_name\\\":\\\"1\\\",\\\"kits\\\":\\\"6\\\",\\\"price\\\":\\\"$2.00\\\"}\"]', '261, Northwest 24th Street', NULL, '{\"city\":\"Miami\",\"state\":\"Florida\",\"region\":\"FL\",\"zip\":\"33127\"}', NULL, NULL, NULL, '{\"type\":\"2\",\"fee\":\"$10.00\",\"d_date\":\"12\\/26\\/2023\"}', '161.70', NULL, '7.70', '154.00', '2023-12-26 23:19:52', '2023-12-26 23:19:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_ach_customers`
--

CREATE TABLE `invoice_ach_customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `routing_number` varchar(20) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `ownership_type` varchar(50) NOT NULL,
  `last_order_id` int DEFAULT NULL,
  `next_order_date` date DEFAULT NULL,
  `is_subscribed` tinyint DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice_ach_customers`
--

INSERT INTO `invoice_ach_customers` (`id`, `first_name`, `last_name`, `business_name`, `email`, `phone`, `customer_id`, `account_number`, `routing_number`, `account_type`, `ownership_type`, `last_order_id`, `next_order_date`, `is_subscribed`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'abcd', 'jaydeep.khokhar+123test@techqware.com', '3107398607', '83355745751', '000123456789', '011401533', 'checking', 'business', 1, '2023-04-27', 1, 1, NULL, '2023-03-27 01:57:42'),
(3, NULL, NULL, 'techqware', 'jaydeep.khokhar@techqware.com', '8866745129', '42190162973', '000123456789', '00011401533', 'savings', 'business', NULL, NULL, NULL, 1, NULL, NULL),
(4, NULL, NULL, 'Delicious Raw Sunset Harbor', 'bayroad@delraw.com', '3107398607', '18682986953', '898091174089', '063100277', 'checking', 'business', 90, '2023-08-13', 1, 1, NULL, '2023-07-13 21:05:31'),
(5, NULL, NULL, 'Pomelo Mia Market', 'ellen@miamarket.com', '5139074658', '18145855973', '20002259567', '265270413', 'checking', 'business', 101, '2023-10-01', 1, 1, NULL, '2023-09-01 23:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_users`
--

CREATE TABLE `invoice_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique-code` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(5, '2022_06_12_092930_create_advocate_table', 1),
(6, '2022_06_14_102031_create_order_table', 1),
(7, '2022_09_02_134503_add_odr_product_id_to_order_table', 2),
(8, '2022_09_27_122116_create_invoice_users_table', 3),
(9, '2022_10_04_044709_add_link_type_to_dw_advocates_table', 3),
(10, '2022_10_14_044709_add_logo_link_to_dw_advocates_table', 4),
(11, '2022_10_21_124460_create_invoices_table', 5),
(12, '2023_01_13_246290_add_is_collab_to_dw_advocates_table', 6),
(13, '2023_01_27_063007_add_column_service_fee_in_invoices_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `odr_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odr_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr_mobile` bigint UNSIGNED DEFAULT NULL,
  `odr_product_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `odr_package_id` bigint UNSIGNED NOT NULL,
  `odr_delivery_frequency_id` bigint UNSIGNED NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_city_state_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_city_state_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int UNSIGNED NOT NULL,
  `odr_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr_transaction_amount` double NOT NULL,
  `odr_tax_amount` double NOT NULL,
  `odr_adv_detail_access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `odr_id`, `odr_first_name`, `odr_last_name`, `odr_email`, `odr_mobile`, `odr_product_id`, `odr_package_id`, `odr_delivery_frequency_id`, `billing_address`, `shipping_address`, `billing_address2`, `shipping_address2`, `b_city_state_zip`, `s_city_state_zip`, `payment_method`, `odr_transaction_id`, `odr_transaction_amount`, `odr_tax_amount`, `odr_adv_detail_access_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'ordr_dw_1666887344_2022_10_27', 'Emmanuel', 'Miguelez', 'mannymiguelez@gmail.com', 3054982071, 1, 2, 2, '6812 San Vicente Street', '220 Miracle Mile', NULL, 'Suite 209', 'Miami ,FL,33134', 'Miami ,FL,33134', 1, '90FSFFVD', 275, 15, 'anthony-bold', '2022-10-27 16:15:44', '2022-10-27 16:15:44', NULL),
(9, 'ordr_dw_1667061321_2022_10_29', 'Zayda', 'Hernandez', 'zaydah@aol.com', 3052976555, 2, 1, 2, '8303, Southwest 85th Terrace', '8303, Southwest 85th Terrace', NULL, NULL, 'Miami,Florida,33143', 'Miami,Florida,33143', 1, 'A5RR11M3', 79.96, 3.96, 'watr-haus', '2022-10-29 16:35:21', '2022-10-29 16:35:21', NULL),
(10, 'ordr_dw_1667501550_2022_11_03', 'Frank', 'Carreras', 'fjc19@icloud.com', 3058156452, 1, 1, 2, '8603 South Dixie Highway', '7250 Southwest 102nd Street', '408', NULL, 'Miami,Florida,33156', 'Miami,Florida,33156', 1, 'M17KNFZC', 92.68, 4.68, 'anthony-bold', '2022-11-03 18:52:30', '2022-11-03 18:52:30', NULL),
(11, 'ordr_dw_1668717641_2022_11_17', 'Vinna', 'Katz', 'vinnakatz@gmail.com', 7862803034, 1, 1, 1, '488 NE 18th St', '488 NE 18th St', '3715', NULL, 'Miami,FL,33132', 'Miami,FL,33132', 1, '8GBQ0EE2', 92.68, 4.68, 'watr-haus', '2022-11-17 20:40:41', '2022-11-17 20:40:41', NULL),
(12, 'ordr_dw_1672705945_2023_01_03', 'Jose', 'Davila', 'davilon@bellsouth.net', 3054094902, 1, 2, 2, '12500 Vista Lane', '12500 Vista Lane', NULL, NULL, 'Pinecrest,FL,33156-5746', 'Pinecrest,FL,33156-5746', 1, '7YNNJW8N', 275, 15, 'anthony-bold', '2023-01-03 00:32:25', '2023-01-03 00:32:25', NULL),
(13, 'ordr_dw_1673039125_2023_01_06', 'Jorge A', 'Larrieu', 'jorgelarrieu@gmail.com', 7864938002, 1, 1, 3, NULL, NULL, NULL, NULL, 'Miami,FL,33176', 'Miami,FL,33176', 1, 'BV02SSCN', 92.68, 4.68, 'park-grove', '2023-01-06 21:05:25', '2023-01-06 21:05:25', NULL),
(14, 'ordr_dw_1683260309_2023_05_05', 'jaydeep', 'khokhar', 'jaydeep.khokhar+testmail1421@techqware.com', 3456789876, 1, 2, 3, '455 Northeast 24th Street', '455 Northeast 24th Street', NULL, NULL, 'Miami,Florida,33137', 'Miami,Florida,33137', 2, '5RZNQBXA', 275, 15, 'park-grove', '2023-05-05 04:18:29', '2023-05-05 04:18:29', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ach_customers`
--
ALTER TABLE `ach_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dw_advocate`
--
ALTER TABLE `dw_advocate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dw_advocate_adv_email_unique` (`adv_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory_stock`
--
ALTER TABLE `inventory_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_stock_mgt`
--
ALTER TABLE `inventory_stock_mgt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_ach_customers`
--
ALTER TABLE `invoice_ach_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_users`
--
ALTER TABLE `invoice_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_users_email_unique` (`email`),
  ADD UNIQUE KEY `invoice_users_unique_code_unique` (`unique-code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ach_customers`
--
ALTER TABLE `ach_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dw_advocate`
--
ALTER TABLE `dw_advocate`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_stock`
--
ALTER TABLE `inventory_stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_stock_mgt`
--
ALTER TABLE `inventory_stock_mgt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `invoice_ach_customers`
--
ALTER TABLE `invoice_ach_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_users`
--
ALTER TABLE `invoice_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
