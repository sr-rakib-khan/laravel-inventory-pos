-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 03:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory-pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_salaries`
--

CREATE TABLE `advanced_salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `employe_id` bigint UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advanced_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced_salaries`
--

INSERT INTO `advanced_salaries` (`id`, `employe_id`, `month`, `year`, `advanced_salary`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'april', '2024', '10000', 'lorem ipsum', NULL, NULL),
(2, 5, 'january', '2024', '10000', NULL, NULL, NULL),
(3, 5, 'march', '2024', '10000', 'there is a close relation between body and mind.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Asus', 'Asus is the global brand of computer accesscories', 'files/brand/66b7ad0dcc0d1.jpg', '2024-08-11 00:10:21', '2024-08-11 00:10:21'),
(2, 'A4 tech', 'A4 tech is the best global brand of computer keyboad and comoputer mouse', 'files/brand/66b7ad42dab61.png', '2024-08-11 00:11:15', '2024-08-11 00:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `cartinfos`
--

CREATE TABLE `cartinfos` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartinfos`
--

INSERT INTO `cartinfos` (`id`, `sale_id`, `reference`, `payment_status`, `tax`, `tax_amount`, `discount`, `discount_amount`, `due`, `total`, `created_at`, `updated_at`) VALUES
(44, 76, 'SNO-0001', 'Paid', '10', '230', '5', '115', '0', '2415', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(45, 77, 'SNO-0002', 'Paid', '0', '0', '0', '0', '0', '0', '2024-09-03 10:25:56', '2024-09-03 10:25:56'),
(46, 78, 'SNO-0003', 'Paid', '0', '0', '0', '0', '0', '650', '2024-09-03 11:01:45', '2024-09-03 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_code`, `category_description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mouse', 'MOU-0001', 'This is computer mouse', 'files/category/66b7959f88c18.png', 1, '2024-08-10 21:39:10', '2024-08-10 22:30:23'),
(2, 'Keyboard', 'KEY-0002', 'this is a computer keyboard', 'files/category/66b78a028439c.png', 1, '2024-08-10 21:40:50', '2024-08-10 22:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfos`
--

CREATE TABLE `companyinfos` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyinfos`
--

INSERT INTO `companyinfos` (`id`, `company_name`, `company_address`, `company_phone`, `company_email`, `company_logo`, `created_at`, `updated_at`) VALUES
(1, 'S R Traders', 'Sadar Road Barishal', '01749436376', 'srrakibkhan4@gmail.com', 'files/logo/66bb88034be78.jpg', NULL, '2024-08-13 22:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brance_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `city`, `company_name`, `bank_name`, `account_holder`, `account_no`, `brance_name`, `routing_no`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Rakib Khan', 'srrakibkhan4@gmail.com', '01749436376', 'baligram', 'barishal', 'SR Traders', 'Pubali bank limited', 'md Rakib khan', '1000254234', 'Rapatoli Barisahl', '124', 'files/customer/66afb05e31968.JPG', 1, '2024-08-04 19:43:15', '2024-08-04 22:52:49'),
(47, 'Samima', 'info@gmail.com', '01760906608', 'Barishal, Sadar', 'Barishal', 'Green Cafe', 'Islami', 'samima', '0213546', 'Barisahl sadar', '4321', NULL, 1, '2024-09-03 10:21:06', '2024-09-03 10:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` int DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `vacation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `email`, `phone`, `address`, `nid_no`, `experience`, `photo`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(5, 'Rakib Khan', 'srrakibkhan4@gmail.com', '01749436376', 'baligram', 254654, '1 years', '66ae51c10b76f.JPG', 15000, '20 days', 'Barishal', '2024-08-02 23:28:15', '2024-08-03 21:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `date`, `expense_for`, `description`, `created_at`, `updated_at`) VALUES
(1, '500', '12-08-24', 'tea', 'employe sobai ajk sondhay ca khaici', '2024-08-12 14:41:36', '2024-08-14 10:55:34'),
(2, '500', '13-08-24', 'buying chair', 'dui ta chair kena hoyce officer jonno', '2024-08-13 11:45:46', '2024-08-14 10:56:04');

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
-- Table structure for table `invoiceitems`
--

CREATE TABLE `invoiceitems` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoiceitems`
--

INSERT INTO `invoiceitems` (`id`, `invoice_id`, `product_name`, `qty`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(12, 18, 'A4tech OP-720 Wired Mouse', '2', '500', '1000', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(13, 18, 'ComfortKey FN Keyboard(KR-85)', '2', '650', '1300', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(14, 20, 'ComfortKey FN Keyboard(KR-85)', '1', '650', '650', '2024-09-03 11:01:45', '2024-09-03 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `total_amount`, `created_at`, `updated_at`) VALUES
(18, '2415', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(19, '0', '2024-09-03 10:25:56', '2024-09-03 10:25:56'),
(20, '650', '2024-09-03 11:01:45', '2024-09-03 11:01:45');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_02_123707_create_employes_table', 2),
(6, '2024_08_04_120753_create_customers_table', 3),
(7, '2024_08_04_173018_create_suppliers_table', 4),
(8, '2024_08_07_143814_create_salaries_table', 5),
(9, '2024_08_07_165243_rename_old_table_to_new_table', 6),
(10, '2024_08_10_142506_create_categories_table', 7),
(11, '2024_08_10_173453_create_brands_table', 8),
(12, '2024_08_11_040038_create_products_table', 9),
(13, '2024_08_11_074037_create_warehouses_table', 10),
(14, '2024_08_11_141524_create_units_table', 11),
(15, '2024_08_11_150855_create_storage_spots_table', 12),
(16, '2024_08_12_075322_create_expenses_table', 13),
(17, '2024_08_13_150509_create_companyinfos_table', 14),
(18, '2024_08_23_232254_create_sales_table', 15),
(19, '2024_08_27_025615_create_salesdetails_table', 16),
(20, '2024_08_28_021349_create_cartinfos_table', 17),
(21, '2024_09_03_021607_create_invoices_table', 18),
(22, '2024_09_03_021700_create_invoiceitems_table', 18),
(23, '2024_09_04_183812_create_purchases_table', 19),
(24, '2024_09_04_183913_create_purchaseitems_table', 19),
(25, '2024_09_11_160502_create_payhistories_table', 20),
(26, '2024_09_11_164531_add_columns_to_suppliers_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('srrakibkhan4@gmail.com', '$2y$12$dvN19MOSjPi23qC/1/lBk.zFGEvhJh5HKYtBX5PLtA3P4uUzYa8we', '2024-08-03 10:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `payhistories`
--

CREATE TABLE `payhistories` (
  `id` bigint UNSIGNED NOT NULL,
  `suppllier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_amount` decimal(15,2) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payhistories`
--

INSERT INTO `payhistories` (`id`, `suppllier_id`, `purchase_id`, `invoice_no`, `pay_amount`, `date`, `created_at`, `updated_at`) VALUES
(2, '3', '5', '254687', 1000.00, '11-09-2024', '2024-09-12 00:17:08', '2024-09-12 00:17:08'),
(3, '3', '7', '4587', 1000.00, '11-09-2024', '2024-09-12 00:37:43', '2024-09-12 00:37:43');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `Product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_spot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reorder_lavel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `Product_name`, `unit`, `purchase_price`, `selling_price`, `warehouse`, `storage_spot`, `min_qty`, `qty`, `reorder_lavel`, `description`, `supplier`, `status`, `photo`, `sku`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'A4tech OP-720 Wired Mouse', 'pcs', '450', '500', 'warehouse-1', 'Rack-1', '2', '7', '2', 'this is computer mouse', 'Rakib Khan', '1', 'files/product/66b9a008d7b9a.jpg', 'A4T-0002', '2024-08-11 23:48:00', '2024-09-03 10:24:23'),
(4, 2, 2, 'ComfortKey FN Keyboard(KR-85)', 'pcs', '500', '650', 'warehouse-2', 'Rack-2', '2', '6', '2', 'this is computer keyboard', 'Rakib Khan', '1', 'files/product/2506554385885761.jpg', 'A4T-0003', '2024-08-17 11:02:39', '2024-09-03 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems`
--

CREATE TABLE `purchaseitems` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `purchase_price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaseitems`
--

INSERT INTO `purchaseitems` (`id`, `purchase_id`, `product_id`, `quantity`, `purchase_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5, 200.00, 1000.00, '2024-09-05 01:26:41', '2024-09-06 23:00:36'),
(2, 2, 4, 2, 900.00, 1800.00, '2024-09-05 01:28:22', '2024-09-05 01:28:22'),
(3, 2, 1, 5, 500.00, 2500.00, '2024-09-05 01:28:22', '2024-09-05 01:28:22'),
(4, 3, 1, 5, 500.00, 2500.00, '2024-09-05 01:39:09', '2024-09-05 01:39:09'),
(6, 5, 4, 2, 500.00, 1000.00, '2024-09-11 21:48:25', '2024-09-11 21:48:25'),
(9, 7, 1, 2, 500.00, 1000.00, '2024-09-12 00:37:08', '2024-09-12 00:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `purchase_date`, `invoice_number`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 3, '06-09-2024', '12345', 1000.00, 'pending', '2024-09-05 01:26:41', '2024-09-06 23:00:36'),
(2, 1, '04-09-2024', '54321', 4300.00, 'pending', '2024-09-05 01:28:22', '2024-09-05 01:28:22'),
(3, 1, '04-09-2024', '12345', 2500.00, 'Unpaid', '2024-09-05 01:39:09', '2024-09-05 01:39:09'),
(5, 3, '11-09-2024', '254687', 1000.00, '1', '2024-09-11 21:48:25', '2024-09-12 00:17:08'),
(7, 3, '11-09-2024', '4587', 1000.00, '1', '2024-09-12 00:37:08', '2024-09-12 00:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `employe_id` bigint UNSIGNED NOT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `reference`, `status`, `payment`, `total`, `paid`, `due`, `tax`, `discount`, `shipping`, `biller`, `date`, `created_at`, `updated_at`) VALUES
(76, 47, 'SNO-0001', NULL, 'Paid', '2415', '2415', NULL, '10', '5', NULL, 'Rakib Khan', '03-09-2024', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(77, 47, 'SNO-0002', NULL, 'Paid', '0', '2415', NULL, '0', '0', NULL, 'Rakib Khan', '03-09-2024', '2024-09-03 10:25:56', '2024-09-03 10:25:56'),
(78, 0, 'SNO-0003', NULL, 'Paid', '650', '650', NULL, '0', '0', NULL, 'Rakib Khan', '03-09-2024', '2024-09-03 11:01:45', '2024-09-03 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesdetails`
--

INSERT INTO `salesdetails` (`id`, `sale_id`, `product_id`, `qty`, `price`, `subtotal`, `tax`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(87, 76, '1', '2', '500', '1000', '10', '5', '2415', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(88, 76, '4', '2', '650', '1300', '10', '5', '2415', '2024-09-03 10:24:23', '2024-09-03 10:24:23'),
(89, 78, '4', '1', '650', '650', '0', '0', '650', '2024-09-03 11:01:45', '2024-09-03 11:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `storage_spots`
--

CREATE TABLE `storage_spots` (
  `id` bigint UNSIGNED NOT NULL,
  `spot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_spots`
--

INSERT INTO `storage_spots` (`id`, `spot`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rack-1', 1, '2024-08-11 21:14:12', '2024-08-11 21:14:12'),
(2, 'Rack-2', 1, '2024-08-11 21:33:07', '2024-08-11 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brance_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_purchase_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_due` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `city`, `company_name`, `bank_name`, `account_holder`, `account_no`, `brance_name`, `routing_no`, `total_purchase_amount`, `total_due`, `total_paid`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rakib Khan', 'admin@gmail.com', '01749436376', 'baligram', 'barishal', 'S R Traders', 'Islami bank  Ltd', 'md Rakib khan', '1000254234', '500', '124', 0.00, 0.00, NULL, 'files/supplier/66afc279c2c84.JPG', 1, '2024-08-05 00:03:37', '2024-08-11 23:02:27'),
(3, 'Samima', 'info@gmail.com', '01760906608', 'Barishal, Sadar', 'Barishal', 'Green Cafe', 'Islami', 'samima', '0213546', 'Barisahl sadar', '4321', 1000.00, 0.00, '1000', NULL, 1, '2024-09-05 11:16:10', '2024-09-12 00:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pcs', 1, '2024-08-11 20:23:05', '2024-08-11 20:23:05'),
(2, 'kg', 0, '2024-08-11 20:25:11', '2024-08-11 20:47:52');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rakib Khan', 'srrakibkhan4@gmail.com', NULL, '$2y$12$riJvaynG2.hnZXSp7wFdueKATKU6dFQacBsplkfcF8fg1F9y5CdLy', NULL, '2024-08-01 22:44:19', '2024-08-01 22:44:19'),
(3, 'Shamima', 'admin@gmail.com', NULL, '$2y$12$QmLTpuH64V04PgkrOQCdDeM71Oq7ttRtr/NtAgZADqHQsUrQ6j4Wm', NULL, '2024-08-03 10:29:47', '2024-08-03 10:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'warehouse-1', 1, '2024-08-11 16:55:41', '2024-08-11 20:04:14'),
(2, 'warehouse-2', 1, '2024-08-11 17:20:18', '2024-08-11 20:03:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced_salaries`
--
ALTER TABLE `advanced_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employe_id_foreign` (`employe_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartinfos`
--
ALTER TABLE `cartinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartinfos_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyinfos`
--
ALTER TABLE `companyinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceitems_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payhistories`
--
ALTER TABLE `payhistories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaseitems_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchaseitems_product_id_foreign` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesdetails_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `storage_spots`
--
ALTER TABLE `storage_spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advanced_salaries`
--
ALTER TABLE `advanced_salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cartinfos`
--
ALTER TABLE `cartinfos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companyinfos`
--
ALTER TABLE `companyinfos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payhistories`
--
ALTER TABLE `payhistories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `storage_spots`
--
ALTER TABLE `storage_spots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advanced_salaries`
--
ALTER TABLE `advanced_salaries`
  ADD CONSTRAINT `salaries_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cartinfos`
--
ALTER TABLE `cartinfos`
  ADD CONSTRAINT `cartinfos_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoiceitems`
--
ALTER TABLE `invoiceitems`
  ADD CONSTRAINT `invoiceitems_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD CONSTRAINT `purchaseitems_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchaseitems_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD CONSTRAINT `salesdetails_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
