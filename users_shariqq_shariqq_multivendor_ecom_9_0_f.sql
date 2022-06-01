-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2022 at 10:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_shariqq_shariqq_multivendor_ecom_9_0_f`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_role_id` bigint(20) NOT NULL DEFAULT 2,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `admin_role_id`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '9876543210', 1, 'def.png', 'admin@email.com', NULL, '$2y$10$HO2mXMmAFnnGhpkGhtwI7uxy.TyOAsIuDUbucAfBLoQA6XdJ2vl2q', 'r9n2r58SnzzVnRdZ5ZQCNiannOoR3HjS1I9T9I6F5wrxIVXFnVV0FiCIu5dV', '2022-03-06 07:23:20', '2022-03-06 07:23:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_access` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `module_access`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets`
--

CREATE TABLE `admin_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `inhouse_earning` double NOT NULL DEFAULT 0,
  `withdrawn` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commission_earned` double(8,2) NOT NULL DEFAULT 0.00,
  `delivery_charge_earned` double(8,2) NOT NULL DEFAULT 0.00,
  `pending_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `total_tax_collected` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_wallets`
--

INSERT INTO `admin_wallets` (`id`, `admin_id`, `inhouse_earning`, `withdrawn`, `created_at`, `updated_at`, `commission_earned`, `delivery_charge_earned`, `pending_amount`, `total_tax_collected`) VALUES
(1, 1, 214.8, 0, NULL, NULL, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallet_histories`
--

CREATE TABLE `admin_wallet_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CPU', '2022-05-24 22:50:53', '2022-05-24 22:50:53'),
(2, 'Ram', '2022-05-24 22:50:57', '2022-05-24 22:50:57'),
(3, 'Hard Disk', '2022-05-24 22:51:03', '2022-05-24 22:51:03'),
(4, 'Driver', '2022-05-24 22:51:09', '2022-05-24 22:51:09'),
(5, 'Color', '2022-05-24 22:51:15', '2022-05-24 22:51:15'),
(6, 'Model', '2022-05-24 22:51:23', '2022-05-24 22:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `photo`, `banner_type`, `published`, `created_at`, `updated_at`, `url`, `resource_type`, `resource_id`) VALUES
(3, '2022-05-25-628dfee5cb440.png', 'Main Banner', 1, '2022-05-25 04:33:17', '2022-05-25 04:33:52', '#', 'category', 1),
(4, '2022-05-25-628dff00b8b32.png', 'Main Banner', 1, '2022-05-25 04:33:44', '2022-05-25 04:33:53', '#', 'category', 1),
(5, '2022-05-25-628dff2d43b46.png', 'Main Banner', 1, '2022-05-25 04:34:29', '2022-05-25 04:34:41', '#', 'category', 1),
(8, '2022-05-25-628e03721f315.png', 'Main Section Banner', 1, '2022-05-25 04:52:42', '2022-05-25 04:53:37', '#', 'product', 82),
(9, '2022-05-25-628e0389576c5.png', 'Main Section Banner', 1, '2022-05-25 04:53:05', '2022-05-25 04:53:36', '#', 'category', 1),
(10, '2022-05-25-628e03a49e0c5.png', 'Main Section Banner', 1, '2022-05-25 04:53:32', '2022-05-25 04:53:36', '#', 'category', 3);

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2022-03-06-62245e494afae.png', 1, '2022-03-06 07:40:01', '2022-03-06 07:40:01'),
(2, 'HP', '2022-05-25-628dac63c7e2f.png', 1, '2022-05-24 22:41:15', '2022-05-24 22:41:15'),
(3, 'Dell', '2022-05-25-628dac7e2d8c1.png', 1, '2022-05-24 22:41:42', '2022-05-24 22:41:42'),
(4, 'Asus', '2022-05-25-628daca2b3917.png', 1, '2022-05-24 22:42:18', '2022-05-24 22:42:18'),
(5, 'Boat', '2022-05-25-628dad066c6f1.png', 1, '2022-05-24 22:43:58', '2022-05-24 22:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'system_default_currency', '3', '2020-10-11 07:43:44', '2022-05-24 23:46:31'),
(2, 'language', '[{\"id\":\"1\",\"name\":\"english\",\"code\":\"en\",\"status\":1},{\"id\":4,\"name\":\"Hindi\",\"code\":\"hn\",\"status\":0}]', '2020-10-11 07:53:02', '2021-06-10 21:16:25'),
(3, 'mail_config', '{\"status\":0,\"name\":\"demo\",\"host\":\"mail.demo.com\",\"driver\":\"SMTP\",\"port\":\"587\",\"username\":\"info@demo.com\",\"email_id\":\"info@demo.com\",\"encryption\":\"TLS\",\"password\":\"demo\"}', '2020-10-12 10:29:18', '2021-07-06 12:32:01'),
(4, 'cash_on_delivery', '{\"status\":\"1\"}', NULL, '2021-05-25 21:21:15'),
(6, 'ssl_commerz_payment', '{\"status\":\"0\",\"environment\":\"sandbox\",\"store_id\":\"\",\"store_password\":\"\"}', '2020-11-09 08:36:51', '2022-05-18 08:41:45'),
(7, 'paypal', '{\"status\":\"0\",\"environment\":\"sandbox\",\"paypal_client_id\":\"\",\"paypal_secret\":\"\"}', '2020-11-09 08:51:39', '2022-05-18 08:41:45'),
(8, 'stripe', '{\"status\":\"0\",\"api_key\":null,\"published_key\":null}', '2020-11-09 09:01:47', '2021-07-06 12:30:05'),
(9, 'paytm', '{\"status\":\"0\",\"environment\":\"sandbox\",\"paytm_merchant_key\":\"sdfbsdfb\",\"paytm_merchant_mid\":\"\",\"paytm_merchant_website\":\"dsfbsdf\",\"paytm_refund_url\":\"\"}', '2020-11-09 09:19:08', '2022-05-18 08:41:45'),
(10, 'company_phone', '+91 0258841693', NULL, '2020-12-08 14:15:01'),
(11, 'company_name', 'Multi Vendor', NULL, '2021-02-27 18:11:53'),
(12, 'company_web_logo', '2022-05-28-629198e2a482e.png', NULL, '2022-05-27 22:07:06'),
(13, 'company_mobile_logo', '2022-05-28-629198e2a72de.png', NULL, '2022-05-27 22:07:06'),
(14, 'terms_condition', '<p>eeverferfervtsS</p>', NULL, '2021-06-11 01:51:36'),
(15, 'about_us', '<p>this is about us page. hello and hi from about page description..</p>', NULL, '2021-06-11 01:42:53'),
(16, 'sms_nexmo', '{\"status\":\"0\",\"nexmo_key\":\"custo5cc042f7abf4c\",\"nexmo_secret\":\"custo5cc042f7abf4c@ssl\"}', NULL, NULL),
(17, 'company_email', 'Copy@XXXX.com', NULL, '2021-03-15 12:29:51'),
(18, 'colors', '{\"primary\":\"#0006ad\",\"secondary\":\"#ff0088\"}', '2020-10-11 13:53:02', '2022-05-27 22:07:06'),
(19, 'company_footer_logo', '2022-05-28-629198e2ad8b6.png', NULL, '2022-05-27 22:07:06'),
(20, 'company_copyright_text', 'CopyRight XXXX@2021', NULL, '2021-03-15 12:30:47'),
(21, 'download_app_apple_stroe', '{\"status\":\"1\",\"link\":\"https:\\/\\/www.target.com\\/s\\/apple+store++now?ref=tgt_adv_XS000000&AFID=msn&fndsrc=tgtao&DFA=71700000012505188&CPNG=Electronics_Portable+Computers&adgroup=Portable+Computers&LID=700000001176246&LNM=apple+store+near+me+now&MT=b&network=s&device=c&location=12&targetid=kwd-81913773633608:loc-12&ds_rl=1246978&ds_rl=1248099&gclsrc=ds\"}', NULL, '2020-12-08 12:54:53'),
(22, 'download_app_google_stroe', '{\"status\":\"1\",\"link\":\"https:\\/\\/play.google.com\\/store?hl=en_US&gl=US\"}', NULL, '2020-12-08 12:54:48'),
(23, 'company_fav_icon', '2022-05-28-629198e2b078b.png', '2020-10-11 13:53:02', '2022-05-27 22:07:06'),
(24, 'fcm_topic', '', NULL, NULL),
(25, 'fcm_project_id', '', NULL, NULL),
(26, 'push_notification_key', 'Put your firebase server key here.', NULL, NULL),
(27, 'order_pending_message', '{\"status\":\"1\",\"message\":\"order pen message\"}', NULL, NULL),
(28, 'order_confirmation_msg', '{\"status\":\"1\",\"message\":\"Order con Message\"}', NULL, NULL),
(29, 'order_processing_message', '{\"status\":\"1\",\"message\":\"Order pro Message\"}', NULL, NULL),
(30, 'out_for_delivery_message', '{\"status\":\"1\",\"message\":\"Order ouut Message\"}', NULL, NULL),
(31, 'order_delivered_message', '{\"status\":\"1\",\"message\":\"Order del Message\"}', NULL, NULL),
(32, 'razor_pay', '{\"status\":\"0\",\"razor_key\":null,\"razor_secret\":null}', NULL, '2021-07-06 12:30:14'),
(33, 'sales_commission', '0', NULL, '2021-06-11 18:13:13'),
(34, 'seller_registration', '1', NULL, '2021-06-04 21:02:48'),
(35, 'pnc_language', '[\"en\",\"af\"]', NULL, NULL),
(36, 'order_returned_message', '{\"status\":\"1\",\"message\":\"Order hh Message\"}', NULL, NULL),
(37, 'order_failed_message', '{\"status\":null,\"message\":\"Order fa Message\"}', NULL, NULL),
(40, 'delivery_boy_assign_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL),
(41, 'delivery_boy_start_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL),
(42, 'delivery_boy_delivered_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL),
(43, 'terms_and_conditions', '', NULL, NULL),
(44, 'minimum_order_value', '1', NULL, NULL),
(45, 'privacy_policy', '<p>my privacy policy</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-07-06 11:09:07'),
(46, 'paystack', '{\"status\":\"0\",\"publicKey\":null,\"secretKey\":null,\"paymentUrl\":\"https:\\/\\/api.paystack.co\",\"merchantEmail\":null}', NULL, '2021-07-06 12:30:35'),
(47, 'senang_pay', '{\"status\":\"0\",\"secret_key\":null,\"merchant_id\":null}', NULL, '2021-07-06 12:30:23'),
(48, 'shop_banner', 'def.png', NULL, NULL),
(49, 'paymob_accept', '{\"status\":\"0\",\"api_key\":\"\",\"iframe_id\":\"\",\"integration_id\":\"\",\"hmac\":\"\"}', NULL, NULL),
(50, 'bkash', '{\"status\":\"0\",\"environment\":\"sandbox\",\"api_key\":\"\",\"api_secret\":\"\",\"username\":\"\",\"password\":\"\"}', NULL, '2022-05-18 08:41:45'),
(51, 'social_login', '[{\"login_medium\":\"google\",\"client_id\":null,\"client_secret\":null,\"status\":\"1\"},{\"login_medium\":\"facebook\",\"client_id\":null,\"client_secret\":null,\"status\":\"1\"}]', NULL, '2022-05-25 11:35:22'),
(52, 'digital_payment', '{\"status\":\"1\"}', NULL, NULL),
(53, 'currency_model', 'multi_currency', NULL, NULL),
(54, 'phone_verification', '0', NULL, NULL),
(55, 'email_verification', '0', NULL, NULL),
(56, 'order_verification', '0', NULL, NULL),
(57, 'country_code', 'IN', NULL, NULL),
(58, 'pagination_limit', '10', NULL, NULL),
(59, 'shipping_method', 'inhouse_shipping', NULL, NULL),
(60, 'forgot_password_verification', 'email', NULL, NULL),
(61, 'paytabs', '{\"status\":0,\"profile_id\":\"\",\"server_key\":\"\",\"base_url\":\"https:\\/\\/secure-egypt.paytabs.com\\/\"}', NULL, '2022-03-12 13:09:46'),
(62, 'timezone', 'UTC', NULL, NULL),
(63, 'stock_limit', '10', NULL, NULL),
(64, 'seller_pos', '0', NULL, NULL),
(65, 'refund_day_limit', '0', NULL, NULL),
(66, 'business_mode', 'multi', NULL, NULL),
(67, 'decimal_point_settings', '2', NULL, NULL),
(68, 'shop_address', 'example street', NULL, NULL),
(69, 'billing_input_by_customer', '1', NULL, NULL),
(70, 'flutterwave', '{\"status\":1,\"public_key\":\"\",\"secret_key\":\"\",\"hash\":\"\"}', NULL, NULL),
(71, 'mercadopago', '{\"status\":1,\"public_key\":\"\",\"access_token\":\"\"}', NULL, NULL),
(72, 'announcement', '{\"status\":\"0\",\"color\":\"#000000\",\"text_color\":\"#000000\",\"announcement\":null}', NULL, NULL),
(73, 'mail_config_sendgrid', '{\"status\":0,\"name\":\"\",\"host\":\"\",\"driver\":\"\",\"port\":\"\",\"username\":\"\",\"email_id\":\"\",\"encryption\":\"\",\"password\":\"\"}', NULL, NULL),
(74, 'fawry_pay', '{\"status\":0,\"merchant_code\":\"\",\"security_key\":\"\"}', NULL, '2022-05-18 08:41:45'),
(75, 'recaptcha', '{\"status\":0,\"site_key\":\"\",\"secret_key\":\"\"}', NULL, '2022-05-18 08:41:45'),
(76, 'liqpay', '{\"status\":0,\"public_key\":\"\",\"private_key\":\"\"}', NULL, NULL),
(77, 'loader_gif', '2022-05-28-629198e2b31a6.png', NULL, NULL),
(78, 'default_location', '{\"lat\":null,\"lng\":null}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `cart_group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choices` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 1,
  `tax` double NOT NULL DEFAULT 1,
  `discount` double NOT NULL DEFAULT 1,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `seller_is` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `shipping_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_shippings`
--

CREATE TABLE `cart_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method_id` bigint(20) DEFAULT NULL,
  `shipping_cost` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_status` tinyint(1) NOT NULL DEFAULT 0,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `parent_id`, `position`, `created_at`, `updated_at`, `home_status`, `priority`) VALUES
(1, 'Computers', 'computers', '2022-05-25-628dad2de04d2.png', 0, 0, '2022-05-24 22:44:37', '2022-05-25 04:35:48', 1, 0),
(2, 'Laptops', 'laptops', '2022-05-25-628dad59826ff.png', 0, 0, '2022-05-24 22:45:21', '2022-05-25 04:35:48', 1, 0),
(3, 'Headphones', 'headphones', '2022-05-25-628dada7b02e7.png', 0, 0, '2022-05-24 22:46:39', '2022-05-25 04:35:47', 1, 0),
(4, 'Keyboards', 'keyboards', '2022-05-25-628dadff874cb.png', 0, 0, '2022-05-24 22:48:07', '2022-05-25 04:35:46', 1, 0),
(5, 'Gaming Pc\'s', 'gaming-pcs', NULL, 1, 1, '2022-05-24 22:48:40', '2022-05-24 22:48:40', 0, 0),
(6, 'Office Computers', 'office-computers', NULL, 1, 1, '2022-05-24 22:48:51', '2022-05-24 22:48:51', 0, 0),
(7, 'Custom Pc\'s', 'custom-pcs', NULL, 1, 1, '2022-05-24 22:49:02', '2022-05-24 22:49:02', 0, 0),
(8, 'Notebooks', 'notebooks', NULL, 2, 1, '2022-05-24 22:49:12', '2022-05-24 22:49:12', 0, 0),
(9, 'Gaming Laptops', 'gaming-laptops', NULL, 2, 1, '2022-05-24 22:49:20', '2022-05-24 22:49:20', 0, 0),
(10, 'Earphones', 'earphones', NULL, 3, 1, '2022-05-24 22:49:37', '2022-05-24 22:49:37', 0, 0),
(11, 'Over ear heaphones', 'over-ear-heaphones', NULL, 3, 1, '2022-05-24 22:49:45', '2022-05-24 22:49:45', 0, 0),
(12, 'Gaming Headphones', 'gaming-headphones', NULL, 3, 1, '2022-05-24 22:49:53', '2022-05-24 22:49:53', 0, 0),
(13, 'Bluetooth Headphones', 'bluetooth-headphones', NULL, 3, 1, '2022-05-24 22:50:04', '2022-05-24 22:50:04', 0, 0),
(14, 'Mechanical keyboards', 'mechanical-keyboards', NULL, 4, 1, '2022-05-24 22:50:14', '2022-05-24 22:50:14', 0, 0),
(15, 'Butterfly Keyboards', 'butterfly-keyboards', NULL, 4, 1, '2022-05-24 22:50:22', '2022-05-24 22:50:22', 0, 0),
(16, 'Intel PC\'s', 'intel-pcs', NULL, 7, 2, '2022-05-31 14:02:43', '2022-05-31 14:02:43', 0, 0),
(17, 'AMD Ryzen PC\'s', 'amd-ryzen-pcs', NULL, 5, 2, '2022-05-31 14:02:51', '2022-05-31 14:02:51', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_shipping_costs`
--

CREATE TABLE `category_shipping_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `multiply_qty` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chattings`
--

CREATE TABLE `chattings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `seller_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_by_customer` tinyint(1) NOT NULL DEFAULT 0,
  `sent_by_seller` tinyint(1) NOT NULL DEFAULT 0,
  `seen_by_customer` tinyint(1) NOT NULL DEFAULT 1,
  `seen_by_seller` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'IndianRed', '#CD5C5C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(2, 'LightCoral', '#F08080', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(3, 'Salmon', '#FA8072', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(4, 'DarkSalmon', '#E9967A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(5, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(6, 'Crimson', '#DC143C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(7, 'Red', '#FF0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(8, 'FireBrick', '#B22222', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(9, 'DarkRed', '#8B0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(10, 'Pink', '#FFC0CB', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(11, 'LightPink', '#FFB6C1', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(12, 'HotPink', '#FF69B4', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(13, 'DeepPink', '#FF1493', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(14, 'MediumVioletRed', '#C71585', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(15, 'PaleVioletRed', '#DB7093', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(16, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(17, 'Coral', '#FF7F50', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(18, 'Tomato', '#FF6347', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(19, 'OrangeRed', '#FF4500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(20, 'DarkOrange', '#FF8C00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(21, 'Orange', '#FFA500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(22, 'Gold', '#FFD700', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(23, 'Yellow', '#FFFF00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(24, 'LightYellow', '#FFFFE0', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(25, 'LemonChiffon', '#FFFACD', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(26, 'LightGoldenrodYellow', '#FAFAD2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(27, 'PapayaWhip', '#FFEFD5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(28, 'Moccasin', '#FFE4B5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(29, 'PeachPuff', '#FFDAB9', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(30, 'PaleGoldenrod', '#EEE8AA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(31, 'Khaki', '#F0E68C', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(32, 'DarkKhaki', '#BDB76B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(33, 'Lavender', '#E6E6FA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(34, 'Thistle', '#D8BFD8', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(35, 'Plum', '#DDA0DD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(36, 'Violet', '#EE82EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(37, 'Orchid', '#DA70D6', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(38, 'Fuchsia', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(39, 'Magenta', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(40, 'MediumOrchid', '#BA55D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(41, 'MediumPurple', '#9370DB', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(42, 'Amethyst', '#9966CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(43, 'BlueViolet', '#8A2BE2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(44, 'DarkViolet', '#9400D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(45, 'DarkOrchid', '#9932CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(46, 'DarkMagenta', '#8B008B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(47, 'Purple', '#800080', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(48, 'Indigo', '#4B0082', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(49, 'SlateBlue', '#6A5ACD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(50, 'DarkSlateBlue', '#483D8B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(51, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(52, 'GreenYellow', '#ADFF2F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(53, 'Chartreuse', '#7FFF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(54, 'LawnGreen', '#7CFC00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(55, 'Lime', '#00FF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(56, 'LimeGreen', '#32CD32', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(57, 'PaleGreen', '#98FB98', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(58, 'LightGreen', '#90EE90', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(59, 'MediumSpringGreen', '#00FA9A', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(60, 'SpringGreen', '#00FF7F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(61, 'MediumSeaGreen', '#3CB371', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(62, 'SeaGreen', '#2E8B57', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(63, 'ForestGreen', '#228B22', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(64, 'Green', '#008000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(65, 'DarkGreen', '#006400', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(66, 'YellowGreen', '#9ACD32', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(67, 'OliveDrab', '#6B8E23', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(68, 'Olive', '#808000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(69, 'DarkOliveGreen', '#556B2F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(70, 'MediumAquamarine', '#66CDAA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(71, 'DarkSeaGreen', '#8FBC8F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(72, 'LightSeaGreen', '#20B2AA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(73, 'DarkCyan', '#008B8B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(74, 'Teal', '#008080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(75, 'Aqua', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(77, 'LightCyan', '#E0FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(78, 'PaleTurquoise', '#AFEEEE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(79, 'Aquamarine', '#7FFFD4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(80, 'Turquoise', '#40E0D0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(81, 'MediumTurquoise', '#48D1CC', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(82, 'DarkTurquoise', '#00CED1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(83, 'CadetBlue', '#5F9EA0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(84, 'SteelBlue', '#4682B4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(85, 'LightSteelBlue', '#B0C4DE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(86, 'PowderBlue', '#B0E0E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(87, 'LightBlue', '#ADD8E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(88, 'SkyBlue', '#87CEEB', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(89, 'LightSkyBlue', '#87CEFA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(90, 'DeepSkyBlue', '#00BFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(91, 'DodgerBlue', '#1E90FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(92, 'CornflowerBlue', '#6495ED', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(93, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(94, 'RoyalBlue', '#4169E1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(95, 'Blue', '#0000FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(96, 'MediumBlue', '#0000CD', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(97, 'DarkBlue', '#00008B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(98, 'Navy', '#000080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(99, 'MidnightBlue', '#191970', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(100, 'Cornsilk', '#FFF8DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(101, 'BlanchedAlmond', '#FFEBCD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(102, 'Bisque', '#FFE4C4', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(103, 'NavajoWhite', '#FFDEAD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(104, 'Wheat', '#F5DEB3', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(105, 'BurlyWood', '#DEB887', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(106, 'Tan', '#D2B48C', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(107, 'RosyBrown', '#BC8F8F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(108, 'SandyBrown', '#F4A460', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(109, 'Goldenrod', '#DAA520', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(110, 'DarkGoldenrod', '#B8860B', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(111, 'Peru', '#CD853F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(112, 'Chocolate', '#D2691E', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(113, 'SaddleBrown', '#8B4513', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(114, 'Sienna', '#A0522D', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(115, 'Brown', '#A52A2A', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(116, 'Maroon', '#800000', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(117, 'White', '#FFFFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(118, 'Snow', '#FFFAFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(119, 'Honeydew', '#F0FFF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(120, 'MintCream', '#F5FFFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(121, 'Azure', '#F0FFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(122, 'AliceBlue', '#F0F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(123, 'GhostWhite', '#F8F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(124, 'WhiteSmoke', '#F5F5F5', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(125, 'Seashell', '#FFF5EE', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(126, 'Beige', '#F5F5DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(127, 'OldLace', '#FDF5E6', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(128, 'FloralWhite', '#FFFAF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(129, 'Ivory', '#FFFFF0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(130, 'AntiqueWhite', '#FAEBD7', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(131, 'Linen', '#FAF0E6', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(132, 'LavenderBlush', '#FFF0F5', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(133, 'MistyRose', '#FFE4E1', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(134, 'Gainsboro', '#DCDCDC', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(135, 'LightGrey', '#D3D3D3', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(136, 'Silver', '#C0C0C0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(137, 'DarkGray', '#A9A9A9', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(138, 'Gray', '#808080', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(139, 'DimGray', '#696969', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(140, 'LightSlateGray', '#778899', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(141, 'SlateGray', '#708090', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(142, 'DarkSlateGray', '#2F4F4F', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(143, 'Black', '#000000', '2018-11-05 02:12:30', '2018-11-05 02:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` decimal(8,2) NOT NULL DEFAULT 0.00,
  `max_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `code`, `exchange_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'USD', 'USD', '0.016666666666667', 1, NULL, '2022-05-24 23:46:38'),
(2, 'BDT', '৳', 'BDT', '1.4', 0, NULL, '2022-05-24 23:46:31'),
(3, 'Indian Rupi', '₹', 'INR', '1', 1, '2020-10-15 17:23:04', '2022-05-24 23:46:31'),
(4, 'Euro', '€', 'EUR', '1.6666666666667', 0, '2021-05-25 21:00:23', '2022-05-24 23:46:31'),
(5, 'YEN', '¥', 'JPY', '1.8333333333333', 0, '2021-06-10 22:08:31', '2022-05-24 23:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallets`
--

CREATE TABLE `customer_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `royality_points` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallet_histories`
--

CREATE TABLE `customer_wallet_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `transaction_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `transaction_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_method` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_of_the_days`
--

CREATE TABLE `deal_of_the_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'amount',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_of_the_days`
--

INSERT INTO `deal_of_the_days` (`id`, `title`, `product_id`, `discount`, `discount_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'May Day', 83, '20.82', 'flat', 1, '2022-05-31 08:22:33', '2022-05-31 08:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_histories`
--

CREATE TABLE `delivery_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `deliveryman_id` bigint(20) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CJwzcFGdbklifPd15BArwqDvUycTSmzTFDQ8yXrN',
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
-- Table structure for table `feature_deals`
--

CREATE TABLE `feature_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deals`
--

CREATE TABLE `flash_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `deal_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_deals`
--

INSERT INTO `flash_deals` (`id`, `title`, `start_date`, `end_date`, `status`, `featured`, `background_color`, `text_color`, `banner`, `slug`, `created_at`, `updated_at`, `product_id`, `deal_type`) VALUES
(1, 'FLash Deal example', '2022-05-31', '2022-06-05', 1, 0, NULL, NULL, '2022-05-25-628dafea4a4b2.png', 'flash-deal-example', '2022-05-24 22:56:18', '2022-05-31 08:22:36', NULL, 'flash_deal');

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_products`
--

CREATE TABLE `flash_deal_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_deal_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_deal_products`
--

INSERT INTO `flash_deal_products` (`id`, `flash_deal_id`, `product_id`, `discount`, `discount_type`, `created_at`, `updated_at`) VALUES
(1, 1, 83, '0.00', NULL, '2022-05-30 04:57:07', '2022-05-30 04:57:07'),
(2, 1, 82, '0.00', NULL, '2022-05-31 08:19:26', '2022-05-31 08:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `help_topics`
--

CREATE TABLE `help_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(4, '2020_09_08_105159_create_admins_table', 1),
(5, '2020_09_08_111837_create_admin_roles_table', 1),
(6, '2020_09_16_142451_create_categories_table', 2),
(7, '2020_09_16_181753_create_categories_table', 3),
(8, '2020_09_17_134238_create_brands_table', 4),
(9, '2020_09_17_203054_create_attributes_table', 5),
(10, '2020_09_19_112509_create_coupons_table', 6),
(11, '2020_09_19_161802_create_curriencies_table', 7),
(12, '2020_09_20_114509_create_sellers_table', 8),
(13, '2020_09_23_113454_create_shops_table', 9),
(14, '2020_09_23_115615_create_shops_table', 10),
(15, '2020_09_23_153822_create_shops_table', 11),
(16, '2020_09_21_122817_create_products_table', 12),
(17, '2020_09_22_140800_create_colors_table', 12),
(18, '2020_09_28_175020_create_products_table', 13),
(19, '2020_09_28_180311_create_products_table', 14),
(20, '2020_10_04_105041_create_search_functions_table', 15),
(21, '2020_10_05_150730_create_customers_table', 15),
(22, '2020_10_08_133548_create_wishlists_table', 16),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 17),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 17),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 17),
(26, '2016_06_01_000004_create_oauth_clients_table', 17),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 17),
(28, '2020_10_06_133710_create_product_stocks_table', 17),
(29, '2020_10_06_134636_create_flash_deals_table', 17),
(30, '2020_10_06_134719_create_flash_deal_products_table', 17),
(31, '2020_10_08_115439_create_orders_table', 17),
(32, '2020_10_08_115453_create_order_details_table', 17),
(33, '2020_10_08_121135_create_shipping_addresses_table', 17),
(34, '2020_10_10_171722_create_business_settings_table', 17),
(35, '2020_09_19_161802_create_currencies_table', 18),
(36, '2020_10_12_152350_create_reviews_table', 18),
(37, '2020_10_12_161834_create_reviews_table', 19),
(38, '2020_10_12_180510_create_support_tickets_table', 20),
(39, '2020_10_14_140130_create_transactions_table', 21),
(40, '2020_10_14_143553_create_customer_wallets_table', 21),
(41, '2020_10_14_143607_create_customer_wallet_histories_table', 21),
(42, '2020_10_22_142212_create_support_ticket_convs_table', 21),
(43, '2020_10_24_234813_create_banners_table', 22),
(44, '2020_10_27_111557_create_shipping_methods_table', 23),
(45, '2020_10_27_114154_add_url_to_banners_table', 24),
(46, '2020_10_28_170308_add_shipping_id_to_order_details', 25),
(47, '2020_11_02_140528_add_discount_to_order_table', 26),
(48, '2020_11_03_162723_add_column_to_order_details', 27),
(49, '2020_11_08_202351_add_url_to_banners_table', 28),
(50, '2020_11_10_112713_create_help_topic', 29),
(51, '2020_11_10_141513_create_contacts_table', 29),
(52, '2020_11_15_180036_add_address_column_user_table', 30),
(53, '2020_11_18_170209_add_status_column_to_product_table', 31),
(54, '2020_11_19_115453_add_featured_status_product', 32),
(55, '2020_11_21_133302_create_deal_of_the_days_table', 33),
(56, '2020_11_20_172332_add_product_id_to_products', 34),
(57, '2020_11_27_234439_add__state_to_shipping_addresses', 34),
(58, '2020_11_28_091929_create_chattings_table', 35),
(59, '2020_12_02_011815_add_bank_info_to_sellers', 36),
(60, '2020_12_08_193234_create_social_medias_table', 37),
(61, '2020_12_13_122649_shop_id_to_chattings', 37),
(62, '2020_12_14_145116_create_seller_wallet_histories_table', 38),
(63, '2020_12_14_145127_create_seller_wallets_table', 38),
(64, '2020_12_15_174804_create_admin_wallets_table', 39),
(65, '2020_12_15_174821_create_admin_wallet_histories_table', 39),
(66, '2020_12_15_214312_create_feature_deals_table', 40),
(67, '2020_12_17_205712_create_withdraw_requests_table', 41),
(68, '2021_02_22_161510_create_notifications_table', 42),
(69, '2021_02_24_154706_add_deal_type_to_flash_deals', 43),
(70, '2021_03_03_204349_add_cm_firebase_token_to_users', 44),
(71, '2021_04_17_134848_add_column_to_order_details_stock', 45),
(72, '2021_05_12_155401_add_auth_token_seller', 46),
(73, '2021_06_03_104531_ex_rate_update', 47),
(74, '2021_06_03_222413_amount_withdraw_req', 48),
(75, '2021_06_04_154501_seller_wallet_withdraw_bal', 49),
(76, '2021_06_04_195853_product_dis_tax', 50),
(77, '2021_05_27_103505_create_product_translations_table', 51),
(78, '2021_06_17_054551_create_soft_credentials_table', 51),
(79, '2021_06_29_212549_add_active_col_user_table', 52),
(80, '2021_06_30_212619_add_col_to_contact', 53),
(81, '2021_07_01_160828_add_col_daily_needs_products', 54),
(82, '2021_07_04_182331_add_col_seller_sales_commission', 55),
(83, '2021_08_07_190655_add_seo_columns_to_products', 56),
(84, '2021_08_07_205913_add_col_to_category_table', 56),
(85, '2021_08_07_210808_add_col_to_shops_table', 56),
(86, '2021_08_14_205216_change_product_price_col_type', 56),
(87, '2021_08_16_201505_change_order_price_col', 56),
(88, '2021_08_16_201552_change_order_details_price_col', 56),
(89, '2021_08_17_213934_change_col_type_seller_earning_history', 57),
(90, '2021_08_17_214109_change_col_type_admin_earning_history', 57),
(91, '2021_08_17_214232_change_col_type_admin_wallet', 57),
(92, '2021_08_17_214405_change_col_type_seller_wallet', 57),
(93, '2021_01_24_205114_create_paytabs_invoices_table', 58),
(94, '2021_08_22_184834_add_publish_to_products_table', 58),
(95, '2021_09_08_211832_add_social_column_to_users_table', 58),
(96, '2021_09_13_165535_add_col_to_user', 58),
(97, '2021_09_19_061647_add_limit_to_coupons_table', 58),
(98, '2021_09_20_020716_add_coupon_code_to_orders_table', 58),
(99, '2021_09_23_003059_add_gst_to_sellers_table', 58),
(100, '2021_09_28_025411_create_order_transactions_table', 58),
(101, '2021_10_02_185124_create_carts_table', 58),
(102, '2021_10_02_190207_create_cart_shippings_table', 58),
(103, '2021_10_03_194334_add_col_order_table', 58),
(104, '2021_10_03_200536_add_shipping_cost', 58),
(105, '2021_10_04_153201_add_col_to_order_table', 58),
(106, '2021_10_07_172701_add_col_cart_shop_info', 58),
(107, '2021_10_07_184442_create_phone_or_email_verifications_table', 58),
(108, '2021_10_07_185416_add_user_table_email_verified', 58),
(109, '2021_10_11_192739_add_transaction_amount_table', 58),
(110, '2021_10_11_200850_add_order_verification_code', 58),
(111, '2021_10_12_083241_add_col_to_order_transaction', 58),
(112, '2021_10_12_084440_add_seller_id_to_order', 58),
(113, '2021_10_12_102853_change_col_type', 58),
(114, '2021_10_12_110434_add_col_to_admin_wallet', 58),
(115, '2021_10_12_110829_add_col_to_seller_wallet', 58),
(116, '2021_10_13_091801_add_col_to_admin_wallets', 58),
(117, '2021_10_13_092000_add_col_to_seller_wallets_tax', 58),
(118, '2021_10_13_165947_rename_and_remove_col_seller_wallet', 58),
(119, '2021_10_13_170258_rename_and_remove_col_admin_wallet', 58),
(120, '2021_10_14_061603_column_update_order_transaction', 58),
(121, '2021_10_15_103339_remove_col_from_seller_wallet', 58),
(122, '2021_10_15_104419_add_id_col_order_tran', 58),
(123, '2021_10_15_213454_update_string_limit', 58),
(124, '2021_10_16_234037_change_col_type_translation', 58),
(125, '2021_10_16_234329_change_col_type_translation_1', 58),
(126, '2021_10_27_091250_add_shipping_address_in_order', 58),
(127, '2021_11_20_043814_change_pass_reset_email_col', 58),
(128, '2019_12_14_000001_create_personal_access_tokens_table', 59),
(129, '2021_11_25_043109_create_delivery_men_table', 59),
(130, '2021_11_25_062242_add_auth_token_delivery_man', 59),
(131, '2021_11_27_043405_add_deliveryman_in_order_table', 59),
(132, '2021_11_27_051432_create_delivery_histories_table', 59),
(133, '2021_11_27_051512_add_fcm_col_for_delivery_man', 59),
(134, '2021_12_15_123216_add_columns_to_banner', 59),
(135, '2022_01_04_100543_add_order_note_to_orders_table', 59),
(136, '2022_01_10_034952_add_lat_long_to_shipping_addresses_table', 59),
(137, '2022_01_10_045517_create_billing_addresses_table', 59),
(138, '2022_01_11_040755_add_is_billing_to_shipping_addresses_table', 59),
(139, '2022_01_11_053404_add_billing_to_orders_table', 59),
(140, '2022_01_11_234310_add_firebase_toke_to_sellers_table', 59),
(141, '2022_01_16_121801_change_colu_type', 59),
(142, '2022_01_22_101601_change_cart_col_type', 59),
(143, '2022_01_23_031359_add_column_to_orders_table', 59),
(144, '2022_01_28_235054_add_status_to_admins_table', 59),
(145, '2022_02_01_214654_add_pos_status_to_sellers_table', 59),
(146, '2022_02_11_225355_add_checked_to_orders_table', 59),
(147, '2022_02_14_114359_create_refund_requests_table', 59),
(148, '2022_02_14_115757_add_refund_request_to_order_details_table', 59),
(149, '2022_02_15_092604_add_order_details_id_to_transactions_table', 59),
(150, '2022_02_15_121410_create_refund_transactions_table', 59),
(151, '2022_02_24_091236_add_multiple_column_to_refund_requests_table', 59),
(152, '2022_02_24_103827_create_refund_statuses_table', 59),
(153, '2022_03_01_121420_add_refund_id_to_refund_transactions_table', 59),
(154, '2022_03_10_091943_add_priority_to_categories_table', 59),
(155, '2022_03_13_111914_create_shipping_types_table', 59),
(156, '2022_03_13_121514_create_category_shipping_costs_table', 59),
(157, '2022_03_14_074413_add_four_column_to_products_table', 59),
(158, '2022_03_15_105838_add_shipping_to_carts_table', 59),
(159, '2022_03_16_070327_add_shipping_type_to_orders_table', 59),
(160, '2022_03_17_070200_add_delivery_info_to_orders_table', 59),
(161, '2022_03_18_143339_add_shipping_type_to_carts_table', 59),
(162, '2022_04_06_020313_create_subscriptions_table', 59),
(163, '2022_04_12_233704_change_column_to_products_table', 59),
(164, '2022_04_19_095926_create_jobs_table', 59);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
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
('5c67183374bb5c765cf98f8cff6fa42c424ed66b833811a3bf1408e877cfada1c883ed3d42fe9dab', 1, 1, 'LaravelAuthApp', '[]', 0, '2022-03-12 13:13:27', '2022-03-12 13:13:27', '2023-03-12 18:43:27'),
('6840b7d4ed685bf2e0dc593affa0bd3b968065f47cc226d39ab09f1422b5a1d9666601f3f60a79c1', 98, 1, 'LaravelAuthApp', '[]', 1, '2021-07-05 09:25:41', '2021-07-05 09:25:41', '2022-07-05 15:25:41'),
('c42cdd5ae652b8b2cbac4f2f4b496e889e1a803b08672954c8bbe06722b54160e71dce3e02331544', 98, 1, 'LaravelAuthApp', '[]', 1, '2021-07-05 09:24:36', '2021-07-05 09:24:36', '2022-07-05 15:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Shariqq', 'GEUx5tqkviM6AAQcz4oi1dcm1KtRdJPgw41lj0eI', 'http://localhost', 1, 0, 0, '2020-10-21 18:27:22', '2020-10-21 18:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-21 18:27:23', '2020-10-21 18:27:23');

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
  `customer_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_ref` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_amount` double NOT NULL DEFAULT 0,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_amount` double NOT NULL DEFAULT 0,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method_id` bigint(20) NOT NULL DEFAULT 0,
  `shipping_cost` double(8,2) NOT NULL DEFAULT 0.00,
  `order_group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def-order-group',
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `seller_id` bigint(20) DEFAULT NULL,
  `seller_is` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_man_id` bigint(20) DEFAULT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_address_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_type',
  `extra_discount` double(8,2) NOT NULL DEFAULT 0.00,
  `extra_discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_service_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_delivery_tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_type`, `payment_status`, `order_status`, `payment_method`, `transaction_ref`, `order_amount`, `shipping_address`, `created_at`, `updated_at`, `discount_amount`, `discount_type`, `coupon_code`, `shipping_method_id`, `shipping_cost`, `order_group_id`, `verification_code`, `seller_id`, `seller_is`, `shipping_address_data`, `delivery_man_id`, `order_note`, `billing_address`, `billing_address_data`, `order_type`, `extra_discount`, `extra_discount_type`, `checked`, `shipping_type`, `delivery_type`, `delivery_service_name`, `third_party_delivery_tracking_id`) VALUES
(100001, '3', 'customer', 'unpaid', 'pending', 'cash_on_delivery', '', 42814, '1', '2022-05-24 23:08:18', '2022-05-24 23:08:25', 0, NULL, '0', 4, 10.00, '3144-jpqjj-1653453498', '387552', 1, 'admin', '{\"id\":1,\"customer_id\":3,\"contact_person_name\":\"john\",\"address_type\":\"permanent\",\"address\":\"doctor street\",\"city\":\"Hyd\",\"zip\":\"404004\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-25T04:38:12.000000Z\",\"updated_at\":\"2022-05-25T04:38:12.000000Z\",\"state\":null,\"country\":null,\"latitude\":\"0\",\"longitude\":\"0\",\"is_billing\":0}', NULL, NULL, NULL, NULL, 'default_type', 0.00, NULL, 1, 'order_wise', NULL, NULL, NULL),
(100002, '11', 'customer', 'unpaid', 'pending', 'cash_on_delivery', '', 42904, '2', '2022-05-31 04:31:53', '2022-05-31 04:32:01', 0, NULL, '0', 5, 100.00, '1020-57oOm-1653991313', '274032', 1, 'admin', '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T09:29:08.000000Z\",\"updated_at\":\"2022-05-31T09:29:08.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', NULL, NULL, 2, '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T09:29:08.000000Z\",\"updated_at\":\"2022-05-31T09:29:08.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', 'default_type', 0.00, NULL, 1, 'order_wise', NULL, NULL, NULL),
(100003, '11', 'customer', 'unpaid', 'pending', 'cash_on_delivery', '', 929.55033333334, '2', '2022-05-31 04:31:58', '2022-05-31 04:32:01', 0, NULL, '0', 5, 100.00, '1020-57oOm-1653991313', '840761', 1, 'seller', '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T09:29:08.000000Z\",\"updated_at\":\"2022-05-31T09:29:08.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', NULL, NULL, 2, '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T09:29:08.000000Z\",\"updated_at\":\"2022-05-31T09:29:08.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', 'default_type', 0.00, NULL, 1, 'order_wise', NULL, NULL, NULL),
(100004, '11', 'customer', 'unpaid', 'pending', 'cash_on_delivery', '', 42904, '2', '2022-05-31 14:30:02', '2022-05-31 14:30:59', 0, NULL, '0', 5, 100.00, '1652-WNrWa-1654027202', '846852', 1, 'admin', '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T12:59:03.000000Z\",\"updated_at\":\"2022-05-31T12:59:03.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', NULL, NULL, 2, '{\"id\":2,\"customer_id\":11,\"contact_person_name\":\"john doe\",\"address_type\":\"permanent\",\"address\":\"john str streetm block 34\",\"city\":\"mumbai\",\"zip\":\"5050002\",\"phone\":\"9874563210\",\"created_at\":\"2022-05-31T12:59:03.000000Z\",\"updated_at\":\"2022-05-31T12:59:03.000000Z\",\"state\":null,\"country\":null,\"latitude\":null,\"longitude\":null,\"is_billing\":0}', 'default_type', 0.00, NULL, 1, 'order_wise', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `delivery_status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_method_id` bigint(20) DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_stock_decreased` tinyint(1) NOT NULL DEFAULT 1,
  `refund_request` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `seller_id`, `product_details`, `qty`, `price`, `tax`, `discount`, `delivery_status`, `payment_status`, `created_at`, `updated_at`, `shipping_method_id`, `variant`, `variation`, `discount_type`, `is_stock_decreased`, `refund_request`) VALUES
(1, 100001, 82, 1, '{\"id\":82,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti\",\"slug\":\"hp-15s-ryzen-3-5300u-8gb-sdram256gb-ssd-156-inch396cm-fhd-micro-edge-anti-glare-displayamd-radeon-graphicsdual-speakersw\",\"category_ids\":\"[{\\\"id\\\":\\\"2\\\",\\\"position\\\":1},{\\\"id\\\":\\\"8\\\",\\\"position\\\":2}]\",\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2022-05-25-628db1138c0ea.png\\\",\\\"2022-05-25-628db1138d2a1.png\\\",\\\"2022-05-25-628db1138d3ee.png\\\",\\\"2022-05-25-628db1138d509.png\\\"]\",\"thumbnail\":\"2022-05-25-628db1138d758.png\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[\\\"#000000\\\",\\\"#C0C0C0\\\"]\",\"variant_product\":0,\"attributes\":\"[\\\"3\\\",\\\"2\\\"]\",\"choice_options\":\"[{\\\"name\\\":\\\"choice_3\\\",\\\"title\\\":\\\"HardDisk\\\",\\\"options\\\":[\\\"1TB\\\"]},{\\\"name\\\":\\\"choice_2\\\",\\\"title\\\":\\\"Ram\\\",\\\"options\\\":[\\\"8GB\\\"]}]\",\"variation\":\"[{\\\"type\\\":\\\"Black-1TB-8GB\\\",\\\"price\\\":36900,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Black-1TB-8GB\\\",\\\"qty\\\":100},{\\\"type\\\":\\\"Silver-1TB-8GB\\\",\\\"price\\\":36800,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Silver-1TB-8GB\\\",\\\"qty\\\":100}]\",\"published\":0,\"unit_price\":36800,\"purchase_price\":32000,\"tax\":18,\"tax_type\":\"percent\",\"discount\":2,\"discount_type\":\"percent\",\"current_stock\":200,\"details\":\"<h1>About this item<\\/h1>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Do Check Partner offer section for Exciting offers from HP.<\\/li>\\r\\n\\t<li>Processor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory &amp; Storage: 8 GB DDR4-3200 SDRAM (1 x 8 GB), Upto 16 GB DDR4-3200 MHz RAM (2 x 8 GB)| Storage: 256 GB PCIe NVMe M.2 SSD<\\/li>\\r\\n\\t<li>Display &amp; Graphics: (15.6&quot;) diagonal FHD, micro-edge, anti-glare, 250 nits, 141 ppi, 45%NTSC |Graphics: AMD Radeon Graphics<\\/li>\\r\\n\\t<li>Operating System &amp; Pre-installed Software: Pre-loaded Windows 11 Home 64 Single Language| Microsoft Office 2019 &amp; Office 365|McAfee LiveSafe (30 days free trial as default)<\\/li>\\r\\n\\t<li>Ports: 1 SuperSpeed USB Type-C 5Gbps signaling rate, 2 SuperSpeed USB Type-A 5Gbps signaling rate,1 Headphone\\/microphone Combo,1 AC Smart pin, 1 HDMI 1.4b<\\/li>\\r\\n\\t<li>Features: Camera: HP True Vision 720p HD camera with integrated dual array digital microphones| Audio: Dual Speakers| Keyboard: Full-size island-style natural silver keyboard with numeric keypad,HP Imagepad with multi-touch gesture support, Precision Touchpad Support | Alexa Built In| Battery: 3-cell, 41 Wh Li-ion, Support battery fast charge| Networking: Realtek RTL8821CE 802.11b\\/g\\/n\\/ac (1x1) and Bluetooth 4.2 combo<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2022-05-25T04:31:15.000000Z\",\"updated_at\":\"2022-05-25T04:31:24.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti-Glare Display\\/AMD Radeon Graphics\\/Dual Speakers\\/Win 11\\/Alexa\\/MS Office\\/Fast Charge\\/Silver\\/1.69Kg, 15s-ey2000au\",\"meta_description\":\"About this item\\r\\nDo Check Partner offer section for Exciting offers from HP.\\r\\nProcessor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory & Stor\",\"meta_image\":\"def.png\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":250,\"multiply_qty\":1,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"reviews_count\":0,\"translations\":[],\"reviews\":[]}', 1, 36900, 6642, 738, 'pending', 'unpaid', '2022-05-24 23:08:19', '2022-05-24 23:08:19', NULL, 'Black-1TB-8GB', '{\"color\":\"Black\",\"HardDisk\":\"1TB\",\"Ram\":\"8GB\"}', 'discount_on_product', 1, 0),
(2, 100002, 82, 1, '{\"id\":82,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti\",\"slug\":\"hp-15s-ryzen-3-5300u-8gb-sdram256gb-ssd-156-inch396cm-fhd-micro-edge-anti-glare-displayamd-radeon-graphicsdual-speakersw\",\"category_ids\":\"[{\\\"id\\\":\\\"2\\\",\\\"position\\\":1},{\\\"id\\\":\\\"8\\\",\\\"position\\\":2}]\",\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2022-05-25-628db1138c0ea.png\\\",\\\"2022-05-25-628db1138d2a1.png\\\",\\\"2022-05-25-628db1138d3ee.png\\\",\\\"2022-05-25-628db1138d509.png\\\"]\",\"thumbnail\":\"2022-05-25-628db1138d758.png\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[\\\"#000000\\\",\\\"#C0C0C0\\\"]\",\"variant_product\":0,\"attributes\":\"[\\\"3\\\",\\\"2\\\"]\",\"choice_options\":\"[{\\\"name\\\":\\\"choice_3\\\",\\\"title\\\":\\\"HardDisk\\\",\\\"options\\\":[\\\"1TB\\\"]},{\\\"name\\\":\\\"choice_2\\\",\\\"title\\\":\\\"Ram\\\",\\\"options\\\":[\\\"8GB\\\"]}]\",\"variation\":\"[{\\\"type\\\":\\\"Black-1TB-8GB\\\",\\\"price\\\":36900,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Black-1TB-8GB\\\",\\\"qty\\\":99},{\\\"type\\\":\\\"Silver-1TB-8GB\\\",\\\"price\\\":36800,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Silver-1TB-8GB\\\",\\\"qty\\\":100}]\",\"published\":0,\"unit_price\":36800,\"purchase_price\":32000,\"tax\":18,\"tax_type\":\"percent\",\"discount\":2,\"discount_type\":\"percent\",\"current_stock\":199,\"details\":\"<h1>About this item<\\/h1>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Do Check Partner offer section for Exciting offers from HP.<\\/li>\\r\\n\\t<li>Processor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory &amp; Storage: 8 GB DDR4-3200 SDRAM (1 x 8 GB), Upto 16 GB DDR4-3200 MHz RAM (2 x 8 GB)| Storage: 256 GB PCIe NVMe M.2 SSD<\\/li>\\r\\n\\t<li>Display &amp; Graphics: (15.6&quot;) diagonal FHD, micro-edge, anti-glare, 250 nits, 141 ppi, 45%NTSC |Graphics: AMD Radeon Graphics<\\/li>\\r\\n\\t<li>Operating System &amp; Pre-installed Software: Pre-loaded Windows 11 Home 64 Single Language| Microsoft Office 2019 &amp; Office 365|McAfee LiveSafe (30 days free trial as default)<\\/li>\\r\\n\\t<li>Ports: 1 SuperSpeed USB Type-C 5Gbps signaling rate, 2 SuperSpeed USB Type-A 5Gbps signaling rate,1 Headphone\\/microphone Combo,1 AC Smart pin, 1 HDMI 1.4b<\\/li>\\r\\n\\t<li>Features: Camera: HP True Vision 720p HD camera with integrated dual array digital microphones| Audio: Dual Speakers| Keyboard: Full-size island-style natural silver keyboard with numeric keypad,HP Imagepad with multi-touch gesture support, Precision Touchpad Support | Alexa Built In| Battery: 3-cell, 41 Wh Li-ion, Support battery fast charge| Networking: Realtek RTL8821CE 802.11b\\/g\\/n\\/ac (1x1) and Bluetooth 4.2 combo<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2022-05-25T04:31:15.000000Z\",\"updated_at\":\"2022-05-25T04:38:19.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti-Glare Display\\/AMD Radeon Graphics\\/Dual Speakers\\/Win 11\\/Alexa\\/MS Office\\/Fast Charge\\/Silver\\/1.69Kg, 15s-ey2000au\",\"meta_description\":\"About this item\\r\\nDo Check Partner offer section for Exciting offers from HP.\\r\\nProcessor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory & Stor\",\"meta_image\":\"def.png\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":250,\"multiply_qty\":1,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"reviews_count\":0,\"translations\":[],\"reviews\":[]}', 1, 36900, 6642, 738, 'pending', 'unpaid', '2022-05-31 04:31:53', '2022-05-31 04:31:53', NULL, 'Black-1TB-8GB', '{\"color\":\"Black\",\"HardDisk\":\"1TB\",\"Ram\":\"8GB\"}', 'discount_on_product', 1, 0),
(3, 100003, 83, 1, '{\"id\":83,\"added_by\":\"seller\",\"user_id\":1,\"name\":\"Dell New Vostro 3401 Laptop Intel i3-1115G4, 8GB DDR4, 256GB SSD, 14\\\" (35.56Cms)\",\"slug\":\"dell-new-vostro-3401-laptop-intel-i3-1115g4-8gb-ddr4-256gb-ssd-14-3556cms-fhd-display-integrated-graphics-win-10-mso-bla\",\"category_ids\":\"[{\\\"id\\\":\\\"2\\\",\\\"position\\\":1},{\\\"id\\\":\\\"8\\\",\\\"position\\\":2}]\",\"brand_id\":3,\"unit\":\"pc\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2022-05-30-6294946e12821.png\\\",\\\"2022-05-30-6294946e1563c.png\\\",\\\"2022-05-30-6294946e1573e.png\\\",\\\"2022-05-30-6294946e1584e.png\\\",\\\"2022-05-30-6294946e15946.png\\\",\\\"2022-05-30-6294946e15a2b.png\\\"]\",\"thumbnail\":\"2022-05-30-6294946e15b3c.png\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[\\\"#000000\\\",\\\"#0000FF\\\",\\\"#CD5C5C\\\",\\\"#C0C0C0\\\"]\",\"variant_product\":0,\"attributes\":\"[\\\"1\\\",\\\"3\\\"]\",\"choice_options\":\"[{\\\"name\\\":\\\"choice_1\\\",\\\"title\\\":\\\"CPU\\\",\\\"options\\\":[\\\"i3 7th\\\",\\\"i3 3rd\\\",\\\"i3 9th\\\",\\\"i5 3rd\\\",\\\"i5 7th\\\",\\\"i5 9th\\\"]},{\\\"name\\\":\\\"choice_3\\\",\\\"title\\\":\\\"HardDisk\\\",\\\"options\\\":[\\\"1TB\\\",\\\"2TB\\\",\\\"3TB\\\"]}]\",\"variation\":\"[{\\\"type\\\":\\\"Black-i37th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i37th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i37th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i33rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i33rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i33rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i39th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i39th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i39th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i53rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i53rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i53rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i57th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i57th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i57th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i59th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i59th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Black-i59th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i37th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i37th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i37th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i33rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i33rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i33rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i39th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i39th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i39th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i53rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i53rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i53rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i57th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i57th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i57th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i59th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i59th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Blue-i59th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i37th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i37th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i37th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i33rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i33rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i33rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i39th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i39th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i39th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i53rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i53rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i53rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i57th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i57th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i57th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i59th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i59th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"IndianRed-i59th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i37th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i37th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i37th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i33rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i33rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i33rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i39th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i39th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i39th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i53rd-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i53rd-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i53rd-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i57th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i57th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i57th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-3TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i59th-1TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-1TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i59th-2TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-2TB\\\",\\\"qty\\\":1},{\\\"type\\\":\\\"Silver-i59th-3TB\\\",\\\"price\\\":720.650000000014415491023100912570953369140625,\\\"sku\\\":\\\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-3TB\\\",\\\"qty\\\":1}]\",\"published\":0,\"unit_price\":720.6500000000099817043519578874111175537109375,\"purchase_price\":553.9833333333400560150039382278919219970703125,\"tax\":18,\"tax_type\":\"percent\",\"discount\":20.816666666667000384904895327053964138031005859375,\"discount_type\":\"flat\",\"current_stock\":72,\"details\":\"<table>\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Brand<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Dell<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Manufacturer<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Dell India Pvt Ltd, Dell India Pvt Ltd<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Series<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Vostro 3400<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Colour<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Black<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Form Factor<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Traditional Laptop<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Item Height<\\/th>\\r\\n\\t\\t\\t<td>&lrm;20 Millimeters<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Item Width<\\/th>\\r\\n\\t\\t\\t<td>&lrm;23.9 Centimeters<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Standing screen display size<\\/th>\\r\\n\\t\\t\\t<td>&lrm;14<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Resolution<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1920 x 1080 Pixels<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Product Dimensions<\\/th>\\r\\n\\t\\t\\t<td>&lrm;32.8 x 23.9 x 2 cm; 1.59 Kilograms<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Batteries<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1 Lithium ion batteries required. (included)<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Item model number<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Vostro 3400<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Processor Brand<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Intel<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Processor Type<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Core i3 Family<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Processor Speed<\\/th>\\r\\n\\t\\t\\t<td>&lrm;4.1 GHz<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Processor Count<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>RAM Size<\\/th>\\r\\n\\t\\t\\t<td>&lrm;8 GB<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Memory Technology<\\/th>\\r\\n\\t\\t\\t<td>&lrm;DDR4<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Computer Memory Type<\\/th>\\r\\n\\t\\t\\t<td>&lrm;DDR4 SDRAM<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Maximum Memory Supported<\\/th>\\r\\n\\t\\t\\t<td>&lrm;16 GB<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Memory Clock Speed<\\/th>\\r\\n\\t\\t\\t<td>&lrm;2666 MHz<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Hard Drive Size<\\/th>\\r\\n\\t\\t\\t<td>&lrm;256 GB<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Hard Disk Description<\\/th>\\r\\n\\t\\t\\t<td>&lrm;SSD<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Hard Drive Interface<\\/th>\\r\\n\\t\\t\\t<td>&lrm;USB 3.2<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Graphics Coprocessor<\\/th>\\r\\n\\t\\t\\t<td>&lrm;AMD Radeon 520<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Graphics Chipset Brand<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Intel<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Graphics Card Description<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Integrated<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Graphics RAM Type<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Shared<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Graphics Card Interface<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Integrated<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Number of USB 2.0 Ports<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Number of USB 3.0 Ports<\\/th>\\r\\n\\t\\t\\t<td>&lrm;2<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Number of HDMI Ports<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Optical Drive Type<\\/th>\\r\\n\\t\\t\\t<td>&lrm;DVD<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Operating System<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Windows 10<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Average Battery Life (in hours)<\\/th>\\r\\n\\t\\t\\t<td>&lrm;4 Hours<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Are Batteries Included<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Yes<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Lithium Battery Energy Content<\\/th>\\r\\n\\t\\t\\t<td>&lrm;2.6 Watt Hours<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Number Of Lithium Ion Cells<\\/th>\\r\\n\\t\\t\\t<td>&lrm;3<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Included Components<\\/th>\\r\\n\\t\\t\\t<td>&lrm;&lrm;Laptop, Power Cable, Adaptor<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Manufacturer<\\/th>\\r\\n\\t\\t\\t<td>&lrm;Dell India Pvt Ltd<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Country of Origin<\\/th>\\r\\n\\t\\t\\t<td>&lrm;China<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Item Weight<\\/th>\\r\\n\\t\\t\\t<td>&lrm;1 kg 590 g<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<hr \\/>\\r\\n<h2>From the manufacturer<\\/h2>\\r\\n\\r\\n<p><img alt=\\\"Module 1\\\" src=\\\"https:\\/\\/m.media-amazon.com\\/images\\/S\\/aplus-media-library-service-media\\/1b565cd9-f3fb-4b0a-b06b-410dffe8b31b.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<h3>Experience Uninterrupted Productivity<\\/h3>\\r\\n\\r\\n<p>Amplified display: A brilliant FHD panel offers more brightness and vivid color for an enhanced front-of-screen experience, and a 2-sided narrow border emphasizes your screen while helping minimize distractions.<\\/p>\\r\\n\\r\\n<p>Express Charge: Take your battery charge level from 0% up to 80% within an hour1 so you&rsquo;re not tied down to an outlet while working on the go.<\\/p>\\r\\n\\r\\n<p>Dell Mobile Connect: Experience seamless wireless integration between your laptop and Android or iOS smartphone. Dell Mobile Connect allows you to access multiple devices and applications without dividing your attention.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"Module 2\\\" src=\\\"https:\\/\\/m.media-amazon.com\\/images\\/S\\/aplus-media-library-service-media\\/bc119930-660c-43be-9e6d-d27e21b56417.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<h3>Powerful processing and Ample Storage<\\/h3>\\r\\n\\r\\n<p>Tackle your workday with the power of the Intel processors. Store all your important documents for easy access to 256GB SSD of storage<\\/p>\\r\\n\\r\\n<p><img alt=\\\"Module 3\\\" src=\\\"https:\\/\\/m.media-amazon.com\\/images\\/S\\/aplus-media-library-service-media\\/657ae646-26c9-45f9-9455-464d96aa463a.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<h3>Design You Can Depend On<\\/h3>\\r\\n\\r\\n<p>Ports galore: Your laptop is equipped with an array of ports and an SD card reader to keep you connected to what matters most.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"Module 4\\\" src=\\\"https:\\/\\/m.media-amazon.com\\/images\\/S\\/aplus-media-library-service-media\\/6deb9779-6fee-48d1-9530-43ad77211131.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\\\" \\/><\\/p>\\r\\n\\r\\n<h3>Serious Security<\\/h3>\\r\\n\\r\\n<p>TPM 2.0: The Trusted Platform Module 2.0 is a commercial-grade security chip installed on the motherboard that creates and stores passwords and encryption keys. It verifies that the computer has not been tampered with before booting up and protects your data against external software attacks.<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Free upgrade to Windows 11 when available. Disclaimer-Upgrade rollout plan is being finalized and is scheduled to begin late in 2021 and continue into 2022. Specific timing will vary by device<\\/li>\\r\\n\\t<li>Processor: 11th Generation Intel Core i3-1115G4 Processor (6MB Cache, up to 4.1 GHz), Memory &amp; Storage:8GB, 4Gx1, DDR4, 2666MHz |256GB M.2 PCIe NVMe Solid State Drive (Boot)<\\/li>\\r\\n\\t<li>Display:14.0-inch FHD (1920 x 1080) Anti-glare LED Backlight Narrow Border WVA Display<\\/li>\\r\\n\\t<li>Graphics:Intel UHD Graphics with shared graphics memory<\\/li>\\r\\n\\t<li>Operating System &amp; Software:Windows 10 Home Single Language | Microsoft Office Home and Student 2019<\\/li>\\r\\n\\t<li>I\\/O ports: 2x USB 3.2 Gen-1, 1xUSB 2.0, 1xHDMI port, 1xEthernet port,1x Headset jack, 1xSD Media Card Reader<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2022-05-30T09:54:54.000000Z\",\"updated_at\":\"2022-05-30T09:55:24.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":\"Dell New Vostro 3401 Laptop Intel i3-1115G4, 8GB DDR4, 256GB SSD, 14\\\" (35.56Cms) FHD Display, Integrated Graphics, Win 10 + MSO, Black (D552190WIN9BE), 1.59Kg\",\"meta_description\":\"Free upgrade to Windows 11 when available. Disclaimer-Upgrade rollout plan is being finalized and is scheduled to begin late in 2021 and continue into 2022. \\r\\n\\r\\nSpecific timing will vary by d\",\"meta_image\":\"2022-05-30-6294946e15ce3.png\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":9.3699999999999992184029906638897955417633056640625,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"reviews_count\":0,\"translations\":[],\"reviews\":[]}', 1, 720.65000000001, 129.717, 20.816666666667, 'pending', 'unpaid', '2022-05-31 04:31:58', '2022-05-31 04:31:58', NULL, 'Black-i37th-1TB', '{\"color\":\"Black\",\"CPU\":\"i3 7th\",\"HardDisk\":\"1TB\"}', 'discount_on_product', 1, 0),
(4, 100004, 82, 1, '{\"id\":82,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti\",\"slug\":\"hp-15s-ryzen-3-5300u-8gb-sdram256gb-ssd-156-inch396cm-fhd-micro-edge-anti-glare-displayamd-radeon-graphicsdual-speakersw\",\"category_ids\":\"[{\\\"id\\\":\\\"2\\\",\\\"position\\\":1},{\\\"id\\\":\\\"8\\\",\\\"position\\\":2}]\",\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2022-05-25-628db1138c0ea.png\\\",\\\"2022-05-25-628db1138d2a1.png\\\",\\\"2022-05-25-628db1138d3ee.png\\\",\\\"2022-05-25-628db1138d509.png\\\"]\",\"thumbnail\":\"2022-05-25-628db1138d758.png\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[\\\"#000000\\\",\\\"#C0C0C0\\\"]\",\"variant_product\":0,\"attributes\":\"[\\\"3\\\",\\\"2\\\"]\",\"choice_options\":\"[{\\\"name\\\":\\\"choice_3\\\",\\\"title\\\":\\\"HardDisk\\\",\\\"options\\\":[\\\"1TB\\\"]},{\\\"name\\\":\\\"choice_2\\\",\\\"title\\\":\\\"Ram\\\",\\\"options\\\":[\\\"8GB\\\"]}]\",\"variation\":\"[{\\\"type\\\":\\\"Black-1TB-8GB\\\",\\\"price\\\":36900,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Black-1TB-8GB\\\",\\\"qty\\\":98},{\\\"type\\\":\\\"Silver-1TB-8GB\\\",\\\"price\\\":36800,\\\"sku\\\":\\\"H1358SS1iFMADRGS1OC1-Silver-1TB-8GB\\\",\\\"qty\\\":100}]\",\"published\":0,\"unit_price\":36800,\"purchase_price\":32000,\"tax\":18,\"tax_type\":\"percent\",\"discount\":2,\"discount_type\":\"percent\",\"current_stock\":198,\"details\":\"<h1>About this item<\\/h1>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Do Check Partner offer section for Exciting offers from HP.<\\/li>\\r\\n\\t<li>Processor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory &amp; Storage: 8 GB DDR4-3200 SDRAM (1 x 8 GB), Upto 16 GB DDR4-3200 MHz RAM (2 x 8 GB)| Storage: 256 GB PCIe NVMe M.2 SSD<\\/li>\\r\\n\\t<li>Display &amp; Graphics: (15.6&quot;) diagonal FHD, micro-edge, anti-glare, 250 nits, 141 ppi, 45%NTSC |Graphics: AMD Radeon Graphics<\\/li>\\r\\n\\t<li>Operating System &amp; Pre-installed Software: Pre-loaded Windows 11 Home 64 Single Language| Microsoft Office 2019 &amp; Office 365|McAfee LiveSafe (30 days free trial as default)<\\/li>\\r\\n\\t<li>Ports: 1 SuperSpeed USB Type-C 5Gbps signaling rate, 2 SuperSpeed USB Type-A 5Gbps signaling rate,1 Headphone\\/microphone Combo,1 AC Smart pin, 1 HDMI 1.4b<\\/li>\\r\\n\\t<li>Features: Camera: HP True Vision 720p HD camera with integrated dual array digital microphones| Audio: Dual Speakers| Keyboard: Full-size island-style natural silver keyboard with numeric keypad,HP Imagepad with multi-touch gesture support, Precision Touchpad Support | Alexa Built In| Battery: 3-cell, 41 Wh Li-ion, Support battery fast charge| Networking: Realtek RTL8821CE 802.11b\\/g\\/n\\/ac (1x1) and Bluetooth 4.2 combo<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2022-05-25T04:31:15.000000Z\",\"updated_at\":\"2022-05-31T10:01:53.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":\"HP 15s-Ryzen 3 5300U 8GB SDRAM\\/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti-Glare Display\\/AMD Radeon Graphics\\/Dual Speakers\\/Win 11\\/Alexa\\/MS Office\\/Fast Charge\\/Silver\\/1.69Kg, 15s-ey2000au\",\"meta_description\":\"About this item\\r\\nDo Check Partner offer section for Exciting offers from HP.\\r\\nProcessor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory & Stor\",\"meta_image\":\"def.png\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":250,\"multiply_qty\":1,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"reviews_count\":0,\"translations\":[],\"reviews\":[]}', 1, 36900, 6642, 738, 'pending', 'unpaid', '2022-05-31 14:30:02', '2022-05-31 14:30:02', NULL, 'Black-1TB-8GB', '{\"color\":\"Black\",\"HardDisk\":\"1TB\",\"Ram\":\"8GB\"}', 'discount_on_product', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `seller_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `order_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `seller_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `admin_commission` decimal(8,2) NOT NULL DEFAULT 0.00,
  `received_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `seller_is` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `identity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytabs_invoices`
--

CREATE TABLE `paytabs_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_code` int(10) UNSIGNED NOT NULL,
  `pt_invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_first_six_digits` int(10) UNSIGNED DEFAULT NULL,
  `card_last_four_digits` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_or_email_verifications`
--

CREATE TABLE `phone_or_email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_or_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ids` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_qty` int(11) NOT NULL DEFAULT 1,
  `refundable` tinyint(1) NOT NULL DEFAULT 1,
  `images` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_deal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_provider` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_product` tinyint(1) NOT NULL DEFAULT 0,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `unit_price` double NOT NULL DEFAULT 0,
  `purchase_price` double NOT NULL DEFAULT 0,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `tax_type` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `discount_type` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured_status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT 0,
  `denied_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `multiply_qty` tinyint(1) DEFAULT NULL,
  `temp_shipping_cost` double(8,2) DEFAULT NULL,
  `is_shipping_cost_updated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `added_by`, `user_id`, `name`, `slug`, `category_ids`, `brand_id`, `unit`, `min_qty`, `refundable`, `images`, `thumbnail`, `featured`, `flash_deal`, `video_provider`, `video_url`, `colors`, `variant_product`, `attributes`, `choice_options`, `variation`, `published`, `unit_price`, `purchase_price`, `tax`, `tax_type`, `discount`, `discount_type`, `current_stock`, `details`, `free_shipping`, `attachment`, `created_at`, `updated_at`, `status`, `featured_status`, `meta_title`, `meta_description`, `meta_image`, `request_status`, `denied_note`, `shipping_cost`, `multiply_qty`, `temp_shipping_cost`, `is_shipping_cost_updated`) VALUES
(82, 'admin', 1, 'HP 15s-Ryzen 3 5300U 8GB SDRAM/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti', 'hp-15s-ryzen-3-5300u-8gb-sdram256gb-ssd-156-inch396cm-fhd-micro-edge-anti-glare-displayamd-radeon-graphicsdual-speakersw', '[{\"id\":\"2\",\"position\":1},{\"id\":\"8\",\"position\":2}]', 2, 'kg', 1, 1, '[\"2022-05-25-628db1138c0ea.png\",\"2022-05-25-628db1138d2a1.png\",\"2022-05-25-628db1138d3ee.png\",\"2022-05-25-628db1138d509.png\"]', '2022-05-25-628db1138d758.png', '1', NULL, 'youtube', NULL, '[\"#000000\",\"#C0C0C0\"]', 0, '[\"3\",\"2\"]', '[{\"name\":\"choice_3\",\"title\":\"HardDisk\",\"options\":[\"1TB\"]},{\"name\":\"choice_2\",\"title\":\"Ram\",\"options\":[\"8GB\"]}]', '[{\"type\":\"Black-1TB-8GB\",\"price\":36900,\"sku\":\"H1358SS1iFMADRGS1OC1-Black-1TB-8GB\",\"qty\":97},{\"type\":\"Silver-1TB-8GB\",\"price\":36800,\"sku\":\"H1358SS1iFMADRGS1OC1-Silver-1TB-8GB\",\"qty\":100}]', 0, 36800, 32000, '18', 'percent', '2', 'percent', 197, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Do Check Partner offer section for Exciting offers from HP.</li>\r\n	<li>Processor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory &amp; Storage: 8 GB DDR4-3200 SDRAM (1 x 8 GB), Upto 16 GB DDR4-3200 MHz RAM (2 x 8 GB)| Storage: 256 GB PCIe NVMe M.2 SSD</li>\r\n	<li>Display &amp; Graphics: (15.6&quot;) diagonal FHD, micro-edge, anti-glare, 250 nits, 141 ppi, 45%NTSC |Graphics: AMD Radeon Graphics</li>\r\n	<li>Operating System &amp; Pre-installed Software: Pre-loaded Windows 11 Home 64 Single Language| Microsoft Office 2019 &amp; Office 365|McAfee LiveSafe (30 days free trial as default)</li>\r\n	<li>Ports: 1 SuperSpeed USB Type-C 5Gbps signaling rate, 2 SuperSpeed USB Type-A 5Gbps signaling rate,1 Headphone/microphone Combo,1 AC Smart pin, 1 HDMI 1.4b</li>\r\n	<li>Features: Camera: HP True Vision 720p HD camera with integrated dual array digital microphones| Audio: Dual Speakers| Keyboard: Full-size island-style natural silver keyboard with numeric keypad,HP Imagepad with multi-touch gesture support, Precision Touchpad Support | Alexa Built In| Battery: 3-cell, 41 Wh Li-ion, Support battery fast charge| Networking: Realtek RTL8821CE 802.11b/g/n/ac (1x1) and Bluetooth 4.2 combo</li>\r\n</ul>', 0, NULL, '2022-05-24 23:01:15', '2022-05-31 14:30:02', 1, 1, 'HP 15s-Ryzen 3 5300U 8GB SDRAM/256GB SSD 15.6 inch(39.6cm) FHD, Micro-Edge, Anti-Glare Display/AMD Radeon Graphics/Dual Speakers/Win 11/Alexa/MS Office/Fast Charge/Silver/1.69Kg, 15s-ey2000au', 'About this item\r\nDo Check Partner offer section for Exciting offers from HP.\r\nProcessor: AMD Ryzen 3 5300U (up to 3.8 GHz max boost clock(2i),4 MB L3 cache, 4 cores, 8 threads)| Memory & Stor', 'def.png', 1, NULL, 250.00, 1, NULL, NULL),
(83, 'seller', 1, 'Dell New Vostro 3401 Laptop Intel i3-1115G4, 8GB DDR4, 256GB SSD, 14\" (35.56Cms)', 'dell-new-vostro-3401-laptop-intel-i3-1115g4-8gb-ddr4-256gb-ssd-14-3556cms-fhd-display-integrated-graphics-win-10-mso-bla', '[{\"id\":\"2\",\"position\":1},{\"id\":\"8\",\"position\":2}]', 3, 'pc', 1, 1, '[\"2022-05-30-6294946e12821.png\",\"2022-05-30-6294946e1563c.png\",\"2022-05-30-6294946e1573e.png\",\"2022-05-30-6294946e1584e.png\",\"2022-05-30-6294946e15946.png\",\"2022-05-30-6294946e15a2b.png\"]', '2022-05-30-6294946e15b3c.png', '1', NULL, 'youtube', NULL, '[\"#000000\",\"#0000FF\",\"#CD5C5C\",\"#C0C0C0\"]', 0, '[\"1\",\"3\"]', '[{\"name\":\"choice_1\",\"title\":\"CPU\",\"options\":[\"i3 7th\",\"i3 3rd\",\"i3 9th\",\"i5 3rd\",\"i5 7th\",\"i5 9th\"]},{\"name\":\"choice_3\",\"title\":\"HardDisk\",\"options\":[\"1TB\",\"2TB\",\"3TB\"]}]', '[{\"type\":\"Black-i37th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-1TB\",\"qty\":0},{\"type\":\"Black-i37th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-2TB\",\"qty\":1},{\"type\":\"Black-i37th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i37th-3TB\",\"qty\":1},{\"type\":\"Black-i33rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-1TB\",\"qty\":1},{\"type\":\"Black-i33rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-2TB\",\"qty\":1},{\"type\":\"Black-i33rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i33rd-3TB\",\"qty\":1},{\"type\":\"Black-i39th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-1TB\",\"qty\":1},{\"type\":\"Black-i39th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-2TB\",\"qty\":1},{\"type\":\"Black-i39th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i39th-3TB\",\"qty\":1},{\"type\":\"Black-i53rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-1TB\",\"qty\":1},{\"type\":\"Black-i53rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-2TB\",\"qty\":1},{\"type\":\"Black-i53rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i53rd-3TB\",\"qty\":1},{\"type\":\"Black-i57th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-1TB\",\"qty\":1},{\"type\":\"Black-i57th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-2TB\",\"qty\":1},{\"type\":\"Black-i57th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i57th-3TB\",\"qty\":1},{\"type\":\"Black-i59th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-1TB\",\"qty\":1},{\"type\":\"Black-i59th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-2TB\",\"qty\":1},{\"type\":\"Black-i59th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Black-i59th-3TB\",\"qty\":1},{\"type\":\"Blue-i37th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-1TB\",\"qty\":1},{\"type\":\"Blue-i37th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-2TB\",\"qty\":1},{\"type\":\"Blue-i37th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i37th-3TB\",\"qty\":1},{\"type\":\"Blue-i33rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-1TB\",\"qty\":1},{\"type\":\"Blue-i33rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-2TB\",\"qty\":1},{\"type\":\"Blue-i33rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i33rd-3TB\",\"qty\":1},{\"type\":\"Blue-i39th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-1TB\",\"qty\":1},{\"type\":\"Blue-i39th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-2TB\",\"qty\":1},{\"type\":\"Blue-i39th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i39th-3TB\",\"qty\":1},{\"type\":\"Blue-i53rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-1TB\",\"qty\":1},{\"type\":\"Blue-i53rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-2TB\",\"qty\":1},{\"type\":\"Blue-i53rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i53rd-3TB\",\"qty\":1},{\"type\":\"Blue-i57th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-1TB\",\"qty\":1},{\"type\":\"Blue-i57th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-2TB\",\"qty\":1},{\"type\":\"Blue-i57th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i57th-3TB\",\"qty\":1},{\"type\":\"Blue-i59th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-1TB\",\"qty\":1},{\"type\":\"Blue-i59th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-2TB\",\"qty\":1},{\"type\":\"Blue-i59th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Blue-i59th-3TB\",\"qty\":1},{\"type\":\"IndianRed-i37th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-1TB\",\"qty\":1},{\"type\":\"IndianRed-i37th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-2TB\",\"qty\":1},{\"type\":\"IndianRed-i37th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i37th-3TB\",\"qty\":1},{\"type\":\"IndianRed-i33rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-1TB\",\"qty\":1},{\"type\":\"IndianRed-i33rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-2TB\",\"qty\":1},{\"type\":\"IndianRed-i33rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i33rd-3TB\",\"qty\":1},{\"type\":\"IndianRed-i39th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-1TB\",\"qty\":1},{\"type\":\"IndianRed-i39th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-2TB\",\"qty\":1},{\"type\":\"IndianRed-i39th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i39th-3TB\",\"qty\":1},{\"type\":\"IndianRed-i53rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-1TB\",\"qty\":1},{\"type\":\"IndianRed-i53rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-2TB\",\"qty\":1},{\"type\":\"IndianRed-i53rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i53rd-3TB\",\"qty\":1},{\"type\":\"IndianRed-i57th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-1TB\",\"qty\":1},{\"type\":\"IndianRed-i57th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-2TB\",\"qty\":1},{\"type\":\"IndianRed-i57th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i57th-3TB\",\"qty\":1},{\"type\":\"IndianRed-i59th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-1TB\",\"qty\":1},{\"type\":\"IndianRed-i59th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-2TB\",\"qty\":1},{\"type\":\"IndianRed-i59th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-IndianRed-i59th-3TB\",\"qty\":1},{\"type\":\"Silver-i37th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-1TB\",\"qty\":1},{\"type\":\"Silver-i37th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-2TB\",\"qty\":1},{\"type\":\"Silver-i37th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i37th-3TB\",\"qty\":1},{\"type\":\"Silver-i33rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-1TB\",\"qty\":1},{\"type\":\"Silver-i33rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-2TB\",\"qty\":1},{\"type\":\"Silver-i33rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i33rd-3TB\",\"qty\":1},{\"type\":\"Silver-i39th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-1TB\",\"qty\":1},{\"type\":\"Silver-i39th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-2TB\",\"qty\":1},{\"type\":\"Silver-i39th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i39th-3TB\",\"qty\":1},{\"type\":\"Silver-i53rd-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-1TB\",\"qty\":1},{\"type\":\"Silver-i53rd-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-2TB\",\"qty\":1},{\"type\":\"Silver-i53rd-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i53rd-3TB\",\"qty\":1},{\"type\":\"Silver-i57th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-1TB\",\"qty\":1},{\"type\":\"Silver-i57th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-2TB\",\"qty\":1},{\"type\":\"Silver-i57th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i57th-3TB\",\"qty\":1},{\"type\":\"Silver-i59th-1TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-1TB\",\"qty\":1},{\"type\":\"Silver-i59th-2TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-2TB\",\"qty\":1},{\"type\":\"Silver-i59th-3TB\",\"price\":720.650000000014415491023100912570953369140625,\"sku\":\"DNV3LIi8D2S1(FDIGW1+MB(1-Silver-i59th-3TB\",\"qty\":1}]', 0, 720.65000000001, 553.98333333334, '18', 'percent', '20.816666666667', 'flat', 71, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>&lrm;Dell</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>&lrm;Dell India Pvt Ltd, Dell India Pvt Ltd</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Series</th>\r\n			<td>&lrm;Vostro 3400</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Colour</th>\r\n			<td>&lrm;Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Form Factor</th>\r\n			<td>&lrm;Traditional Laptop</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Height</th>\r\n			<td>&lrm;20 Millimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Width</th>\r\n			<td>&lrm;23.9 Centimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Standing screen display size</th>\r\n			<td>&lrm;14</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Resolution</th>\r\n			<td>&lrm;1920 x 1080 Pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>&lrm;32.8 x 23.9 x 2 cm; 1.59 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>&lrm;1 Lithium ion batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>&lrm;Vostro 3400</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Brand</th>\r\n			<td>&lrm;Intel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Type</th>\r\n			<td>&lrm;Core i3 Family</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Speed</th>\r\n			<td>&lrm;4.1 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Count</th>\r\n			<td>&lrm;1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM Size</th>\r\n			<td>&lrm;8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memory Technology</th>\r\n			<td>&lrm;DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Computer Memory Type</th>\r\n			<td>&lrm;DDR4 SDRAM</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Maximum Memory Supported</th>\r\n			<td>&lrm;16 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memory Clock Speed</th>\r\n			<td>&lrm;2666 MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hard Drive Size</th>\r\n			<td>&lrm;256 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hard Disk Description</th>\r\n			<td>&lrm;SSD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hard Drive Interface</th>\r\n			<td>&lrm;USB 3.2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Coprocessor</th>\r\n			<td>&lrm;AMD Radeon 520</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Chipset Brand</th>\r\n			<td>&lrm;Intel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Card Description</th>\r\n			<td>&lrm;Integrated</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics RAM Type</th>\r\n			<td>&lrm;Shared</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Card Interface</th>\r\n			<td>&lrm;Integrated</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of USB 2.0 Ports</th>\r\n			<td>&lrm;1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of USB 3.0 Ports</th>\r\n			<td>&lrm;2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of HDMI Ports</th>\r\n			<td>&lrm;1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Optical Drive Type</th>\r\n			<td>&lrm;DVD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Operating System</th>\r\n			<td>&lrm;Windows 10</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Average Battery Life (in hours)</th>\r\n			<td>&lrm;4 Hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Are Batteries Included</th>\r\n			<td>&lrm;Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Lithium Battery Energy Content</th>\r\n			<td>&lrm;2.6 Watt Hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number Of Lithium Ion Cells</th>\r\n			<td>&lrm;3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Included Components</th>\r\n			<td>&lrm;&lrm;Laptop, Power Cable, Adaptor</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>&lrm;Dell India Pvt Ltd</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>&lrm;China</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>&lrm;1 kg 590 g</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<h2>From the manufacturer</h2>\r\n\r\n<p><img alt=\"Module 1\" src=\"https://m.media-amazon.com/images/S/aplus-media-library-service-media/1b565cd9-f3fb-4b0a-b06b-410dffe8b31b.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\" /></p>\r\n\r\n<h3>Experience Uninterrupted Productivity</h3>\r\n\r\n<p>Amplified display: A brilliant FHD panel offers more brightness and vivid color for an enhanced front-of-screen experience, and a 2-sided narrow border emphasizes your screen while helping minimize distractions.</p>\r\n\r\n<p>Express Charge: Take your battery charge level from 0% up to 80% within an hour1 so you&rsquo;re not tied down to an outlet while working on the go.</p>\r\n\r\n<p>Dell Mobile Connect: Experience seamless wireless integration between your laptop and Android or iOS smartphone. Dell Mobile Connect allows you to access multiple devices and applications without dividing your attention.</p>\r\n\r\n<p><img alt=\"Module 2\" src=\"https://m.media-amazon.com/images/S/aplus-media-library-service-media/bc119930-660c-43be-9e6d-d27e21b56417.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\" /></p>\r\n\r\n<h3>Powerful processing and Ample Storage</h3>\r\n\r\n<p>Tackle your workday with the power of the Intel processors. Store all your important documents for easy access to 256GB SSD of storage</p>\r\n\r\n<p><img alt=\"Module 3\" src=\"https://m.media-amazon.com/images/S/aplus-media-library-service-media/657ae646-26c9-45f9-9455-464d96aa463a.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\" /></p>\r\n\r\n<h3>Design You Can Depend On</h3>\r\n\r\n<p>Ports galore: Your laptop is equipped with an array of ports and an SD card reader to keep you connected to what matters most.</p>\r\n\r\n<p><img alt=\"Module 4\" src=\"https://m.media-amazon.com/images/S/aplus-media-library-service-media/6deb9779-6fee-48d1-9530-43ad77211131.__CR0,0,1000,1000_PT0_SX135_V1___.jpg\" /></p>\r\n\r\n<h3>Serious Security</h3>\r\n\r\n<p>TPM 2.0: The Trusted Platform Module 2.0 is a commercial-grade security chip installed on the motherboard that creates and stores passwords and encryption keys. It verifies that the computer has not been tampered with before booting up and protects your data against external software attacks.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Free upgrade to Windows 11 when available. Disclaimer-Upgrade rollout plan is being finalized and is scheduled to begin late in 2021 and continue into 2022. Specific timing will vary by device</li>\r\n	<li>Processor: 11th Generation Intel Core i3-1115G4 Processor (6MB Cache, up to 4.1 GHz), Memory &amp; Storage:8GB, 4Gx1, DDR4, 2666MHz |256GB M.2 PCIe NVMe Solid State Drive (Boot)</li>\r\n	<li>Display:14.0-inch FHD (1920 x 1080) Anti-glare LED Backlight Narrow Border WVA Display</li>\r\n	<li>Graphics:Intel UHD Graphics with shared graphics memory</li>\r\n	<li>Operating System &amp; Software:Windows 10 Home Single Language | Microsoft Office Home and Student 2019</li>\r\n	<li>I/O ports: 2x USB 3.2 Gen-1, 1xUSB 2.0, 1xHDMI port, 1xEthernet port,1x Headset jack, 1xSD Media Card Reader</li>\r\n</ul>', 0, NULL, '2022-05-30 04:24:54', '2022-05-31 04:31:58', 1, 1, 'Dell New Vostro 3401 Laptop Intel i3-1115G4, 8GB DDR4, 256GB SSD, 14\" (35.56Cms) FHD Display, Integrated Graphics, Win 10 + MSO, Black (D552190WIN9BE), 1.59Kg', 'Free upgrade to Windows 11 when available. Disclaimer-Upgrade rollout plan is being finalized and is scheduled to begin late in 2021 and continue into 2022. \r\n\r\nSpecific timing will vary by d', '2022-05-30-6294946e15ce3.png', 1, NULL, 9.37, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `refund_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund_statuses`
--

CREATE TABLE `refund_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refund_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `change_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund_transactions`
--

CREATE TABLE `refund_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `transaction_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refund_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_id`, `comment`, `attachment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 23, 97, 'good', '[\"review\\/GZznygozmDapxWtpb1jmFucm51aoRTzAVu4iQyDK.jpg\"]', 5, 1, '2021-06-04 11:55:16', '2021-06-04 11:55:16'),
(2, 34, 97, 'good', '[]', 1, 1, '2021-06-04 16:47:53', '2021-06-04 16:47:53'),
(3, 34, 97, 'okay', '[]', 5, 1, '2021-06-04 21:24:51', '2021-06-04 21:24:51'),
(4, 41, 97, 'oka', '[]', 1, 1, '2021-06-04 21:34:09', '2021-06-04 21:34:09'),
(5, 40, 97, 'great', '[\"review\\/pqXIjC40O8rYU7WFBwQaMUD32ObIObvKCRssLdF6.jpg\"]', 1, 1, '2021-06-04 21:36:56', '2021-06-04 21:36:56'),
(6, 1, 101, 'Nice', '[\"review\\/DQh9xsD7fiyjheN9qOI6gXmFwEXrRebHzuliR4lY.jpg\"]', 1, 1, '2021-06-04 21:42:05', '2021-06-04 21:42:05'),
(7, 40, 97, 'very 5', '[]', 5, 1, '2021-06-04 21:42:41', '2021-06-04 21:42:41'),
(8, 40, 97, 'okaaaa', '[]', 4, 1, '2021-06-04 22:27:09', '2021-06-04 22:27:09'),
(9, 41, 97, 'abcd123', '[]', 4, 1, '2021-06-04 22:28:31', '2021-06-04 22:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `search_functions`
--

CREATE TABLE `search_functions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_functions`
--

INSERT INTO `search_functions` (`id`, `key`, `url`, `visible_for`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'admin/dashboard', 'admin', NULL, NULL),
(2, 'Order All', 'admin/orders/list/all', 'admin', NULL, NULL),
(3, 'Order Pending', 'admin/orders/list/pending', 'admin', NULL, NULL),
(4, 'Order Processed', 'admin/orders/list/processed', 'admin', NULL, NULL),
(5, 'Order Delivered', 'admin/orders/list/delivered', 'admin', NULL, NULL),
(6, 'Order Returned', 'admin/orders/list/returned', 'admin', NULL, NULL),
(7, 'Order Failed', 'admin/orders/list/failed', 'admin', NULL, NULL),
(8, 'Brand Add', 'admin/brand/add-new', 'admin', NULL, NULL),
(9, 'Brand List', 'admin/brand/list', 'admin', NULL, NULL),
(10, 'Banner', 'admin/banner/list', 'admin', NULL, NULL),
(11, 'Category', 'admin/category/view', 'admin', NULL, NULL),
(12, 'Sub Category', 'admin/category/sub-category/view', 'admin', NULL, NULL),
(13, 'Sub sub category', 'admin/category/sub-sub-category/view', 'admin', NULL, NULL),
(14, 'Attribute', 'admin/attribute/view', 'admin', NULL, NULL),
(15, 'Product', 'admin/product/list', 'admin', NULL, NULL),
(16, 'Coupon', 'admin/coupon/add-new', 'admin', NULL, NULL),
(17, 'Custom Role', 'admin/custom-role/create', 'admin', NULL, NULL),
(18, 'Employee', 'admin/employee/add-new', 'admin', NULL, NULL),
(19, 'Seller', 'admin/sellers/seller-list', 'admin', NULL, NULL),
(20, 'Contacts', 'admin/contact/list', 'admin', NULL, NULL),
(21, 'Flash Deal', 'admin/deal/flash', 'admin', NULL, NULL),
(22, 'Deal of the day', 'admin/deal/day', 'admin', NULL, NULL),
(23, 'Language', 'admin/business-settings/language', 'admin', NULL, NULL),
(24, 'Mail', 'admin/business-settings/mail', 'admin', NULL, NULL),
(25, 'Shipping method', 'admin/business-settings/shipping-method/add', 'admin', NULL, NULL),
(26, 'Currency', 'admin/currency/view', 'admin', NULL, NULL),
(27, 'Payment method', 'admin/business-settings/payment-method', 'admin', NULL, NULL),
(28, 'SMS Gateway', 'admin/business-settings/sms-gateway', 'admin', NULL, NULL),
(29, 'Support Ticket', 'admin/support-ticket/view', 'admin', NULL, NULL),
(30, 'FAQ', 'admin/helpTopic/list', 'admin', NULL, NULL),
(31, 'About Us', 'admin/business-settings/about-us', 'admin', NULL, NULL),
(32, 'Terms and Conditions', 'admin/business-settings/terms-condition', 'admin', NULL, NULL),
(33, 'Web Config', 'admin/business-settings/web-config', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_commission_percentage` double(8,2) DEFAULT NULL,
  `gst` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `f_name`, `l_name`, `phone`, `image`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `bank_name`, `branch`, `account_no`, `holder_name`, `auth_token`, `sales_commission_percentage`, `gst`, `cm_firebase_token`, `pos_status`) VALUES
(1, 'john', 'doe', '9874563210', '2022-05-29-6293878a08085.png', 'john@email.com', '$2y$10$KHrDxLwHohqBz7OpfagBGuLLYGR4smKGslseIMmD8rekYfSBpcRv6', 'approved', '5vhxMEUxynH8BSRloL1IKF3Ly5jblXQI3KVjpCrR4sDwcTDTolZcj2PAyIey', '2022-05-29 09:17:38', '2022-05-30 04:14:50', 'Kotak mahindra', 'hyderabad', '8080523611', 'John doe', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_wallets`
--

CREATE TABLE `seller_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `total_earning` double NOT NULL DEFAULT 0,
  `withdrawn` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commission_given` double(8,2) NOT NULL DEFAULT 0.00,
  `pending_withdraw` double(8,2) NOT NULL DEFAULT 0.00,
  `delivery_charge_earned` double(8,2) NOT NULL DEFAULT 0.00,
  `collected_cash` double(8,2) NOT NULL DEFAULT 0.00,
  `total_tax_collected` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_wallets`
--

INSERT INTO `seller_wallets` (`id`, `seller_id`, `total_earning`, `withdrawn`, `created_at`, `updated_at`, `commission_given`, `pending_withdraw`, `delivery_charge_earned`, `collected_cash`, `total_tax_collected`) VALUES
(1, 1, 0, 0, '2022-05-29 09:17:38', '2022-05-29 09:17:38', 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `seller_wallet_histories`
--

CREATE TABLE `seller_wallet_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `order_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_billing` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `customer_id`, `contact_person_name`, `address_type`, `address`, `city`, `zip`, `phone`, `created_at`, `updated_at`, `state`, `country`, `latitude`, `longitude`, `is_billing`) VALUES
(1, '3', 'john', 'permanent', 'doctor street', 'Hyd', '404004', '9874563210', '2022-05-24 23:08:12', '2022-05-24 23:08:12', NULL, NULL, '0', '0', 0),
(2, '11', 'john doe', 'permanent', 'john str streetm block 34', 'mumbai', '5050002', '9874563210', '2022-05-31 07:29:03', '2022-05-31 07:29:03', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `creator_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `creator_id`, `creator_type`, `title`, `cost`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Courier', '0.00', '4-6 days', 0, '2020-10-27 14:44:01', '2020-12-21 14:01:29'),
(2, 1, 'admin', 'Company Vehicle', '5.00', '2 Week', 1, '2021-05-25 20:57:04', '2021-05-25 20:57:04'),
(4, 1, 'admin', 'Slow shipping', '10.00', '40 days', 1, '2020-12-14 12:43:46', '2021-02-27 19:17:48'),
(5, 1, 'admin', 'by air', '100.00', '2 days', 1, '2021-05-25 20:57:40', '2021-05-25 20:57:40'),
(6, 10, 'seller', 'by air', '100.00', '4 days', 1, '2021-05-29 16:12:40', '2021-05-29 16:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `seller_id`, `name`, `address`, `contact`, `image`, `created_at`, `updated_at`, `banner`) VALUES
(1, 1, 'John Electronics', 'John City\r\nStreet 3444', '9874563210', '2022-05-29-6293878a1f5bb.png', '2022-05-29 09:17:38', '2022-05-29 09:17:38', '2022-05-29-6293878a1f877.png');

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `name`, `link`, `icon`, `active_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'twitter', 'https://www.w3schools.com/howto/howto_css_table_responsive.asp', 'fa fa-twitter', 1, 1, '2020-12-31 21:18:03', '2020-12-31 21:18:25'),
(2, 'linkedin', 'https://dev.shariqq.com/', 'fa fa-linkedin', 1, 1, '2021-02-27 16:23:01', '2021-02-27 16:23:05'),
(3, 'google-plus', 'https://dev.shariqq.com/', 'fa fa-google-plus-square', 1, 1, '2021-02-27 16:23:30', '2021-02-27 16:23:33'),
(4, 'pinterest', 'https://dev.shariqq.com/', 'fa fa-pinterest', 1, 1, '2021-02-27 16:24:14', '2021-02-27 16:24:26'),
(5, 'instagram', 'https://dev.shariqq.com/', 'fa fa-instagram', 1, 1, '2021-02-27 16:24:36', '2021-02-27 16:24:41'),
(6, 'facebook', 'facebook.com', 'fa fa-facebook', 1, 1, '2021-02-27 19:19:42', '2021-06-11 17:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `soft_credentials`
--

CREATE TABLE `soft_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `subject` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'low',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_convs`
--

CREATE TABLE `support_ticket_convs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `customer_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `payment_for` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` bigint(20) DEFAULT NULL,
  `payment_receiver_id` bigint(20) DEFAULT NULL,
  `paid_by` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `transaction_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `translationable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translationable_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `street_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `login_medium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `temporary_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `f_name`, `l_name`, `phone`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `street_address`, `country`, `city`, `zip`, `house_no`, `apartment_no`, `cm_firebase_token`, `is_active`, `login_medium`, `social_id`, `is_phone_verified`, `temporary_token`, `is_email_verified`) VALUES
(11, NULL, 'john', 'doe', '9874563210', 'def.png', 'john@email.com', NULL, '$2y$10$SQC2GUX5USuFZxdYWkloPels/rAoI8bDfc7eI31TYUldNZ9oqDCAu', 'Bxb2h8N2MyiZlponfgJYw6jCG0fwLRVT6RBVDXGww2AkTLnxpqBSsR4GC7Lm', '2022-05-29 07:30:48', '2022-05-29 07:30:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 11, 82, '2022-05-29 07:45:23', '2022-05-29 07:45:23'),
(2, 11, 83, '2022-05-30 04:59:23', '2022-05-30 04:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `transaction_note` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_wallet_histories`
--
ALTER TABLE `admin_wallet_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_shippings`
--
ALTER TABLE `cart_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_shipping_costs`
--
ALTER TABLE `category_shipping_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chattings`
--
ALTER TABLE `chattings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_wallet_histories`
--
ALTER TABLE `customer_wallet_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_of_the_days`
--
ALTER TABLE `deal_of_the_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_histories`
--
ALTER TABLE `delivery_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_men_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_deals`
--
ALTER TABLE `feature_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deals`
--
ALTER TABLE `flash_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_topics`
--
ALTER TABLE `help_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`identity`);

--
-- Indexes for table `paytabs_invoices`
--
ALTER TABLE `paytabs_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_or_email_verifications`
--
ALTER TABLE `phone_or_email_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_statuses`
--
ALTER TABLE `refund_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_transactions`
--
ALTER TABLE `refund_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_functions`
--
ALTER TABLE `search_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `seller_wallets`
--
ALTER TABLE `seller_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_wallet_histories`
--
ALTER TABLE `seller_wallet_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soft_credentials`
--
ALTER TABLE `soft_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_convs`
--
ALTER TABLE `support_ticket_convs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `transactions_id_unique` (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_translationable_id_index` (`translationable_id`),
  ADD KEY `translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_wallet_histories`
--
ALTER TABLE `admin_wallet_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_shippings`
--
ALTER TABLE `cart_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category_shipping_costs`
--
ALTER TABLE `category_shipping_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chattings`
--
ALTER TABLE `chattings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_wallet_histories`
--
ALTER TABLE `customer_wallet_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deal_of_the_days`
--
ALTER TABLE `deal_of_the_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_histories`
--
ALTER TABLE `delivery_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_deals`
--
ALTER TABLE `feature_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_deals`
--
ALTER TABLE `flash_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `help_topics`
--
ALTER TABLE `help_topics`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paytabs_invoices`
--
ALTER TABLE `paytabs_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_or_email_verifications`
--
ALTER TABLE `phone_or_email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_statuses`
--
ALTER TABLE `refund_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_transactions`
--
ALTER TABLE `refund_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `search_functions`
--
ALTER TABLE `search_functions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_wallets`
--
ALTER TABLE `seller_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_wallet_histories`
--
ALTER TABLE `seller_wallet_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soft_credentials`
--
ALTER TABLE `soft_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_ticket_convs`
--
ALTER TABLE `support_ticket_convs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
