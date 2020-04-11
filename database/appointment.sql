-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2020 at 06:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `specialist_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_default_settings`
--

CREATE TABLE `app_default_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_of_months_for_cal` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_default_settings`
--

INSERT INTO `app_default_settings` (`id`, `no_of_months_for_cal`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, '2020-02-15 23:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `available_days`
--

CREATE TABLE `available_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` int(10) UNSIGNED DEFAULT NULL,
  `day_name_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_days`
--

INSERT INTO `available_days` (`id`, `specialist_id`, `day_name_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 0, '2020-02-15 23:08:21', '2020-02-15 23:08:21'),
(2, 1, 6, 0, '2020-02-15 23:08:21', '2020-02-15 23:08:21'),
(3, 2, 1, 0, '2020-02-15 23:08:38', '2020-02-15 23:08:38'),
(4, 2, 2, 0, '2020-02-15 23:08:38', '2020-02-15 23:08:38'),
(5, 2, 4, 0, '2020-02-15 23:08:38', '2020-02-15 23:08:38'),
(6, 3, 4, 0, '2020-02-15 23:08:55', '2020-02-15 23:08:55'),
(7, 3, 7, 0, '2020-02-15 23:08:55', '2020-02-15 23:08:55'),
(8, 4, 2, 0, '2020-02-15 23:09:09', '2020-02-15 23:09:09'),
(9, 4, 3, 0, '2020-02-15 23:09:09', '2020-02-15 23:09:09'),
(10, 4, 4, 0, '2020-02-15 23:09:09', '2020-02-15 23:09:09'),
(11, 4, 6, 0, '2020-02-15 23:09:09', '2020-02-15 23:09:09'),
(12, 4, 7, 0, '2020-02-15 23:09:09', '2020-02-15 23:09:09'),
(13, 5, 2, 0, '2020-02-15 23:09:36', '2020-02-15 23:09:36'),
(14, 5, 4, 0, '2020-02-15 23:09:36', '2020-02-15 23:09:36'),
(15, 5, 5, 0, '2020-02-15 23:09:36', '2020-02-15 23:09:36'),
(16, 5, 7, 0, '2020-02-15 23:09:36', '2020-02-15 23:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `available_times`
--

CREATE TABLE `available_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `available_day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `available_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT 0.00,
  `category_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `amount`, `category_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'psychology', NULL, '0.00', '#40BAEB', NULL, NULL, NULL),
(2, 'stress management', NULL, '0.00', '#40BAEB', NULL, NULL, NULL),
(3, 'accupuncture', NULL, '0.00', '#40BAEB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_names`
--

CREATE TABLE `day_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_names`
--

INSERT INTO `day_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(2, 'Tuesday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(3, 'Wednesday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(4, 'Thursday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(5, 'Friday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(6, 'Saturday', '2020-02-15 22:51:06', '2020-02-15 22:51:06'),
(7, 'Sunday', '2020-02-15 22:51:06', '2020-02-15 22:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `currency`, `site_title`, `site_email`, `site_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '$', 'Ústav dermatopsychologie', 'info@dermatopsychologie.cz', 'Karlovo náměstí 1, Praha 1 lorem', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `landings`
--

CREATE TABLE `landings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_01_20_072011_create_day_names_table', 1),
(8, '2020_01_21_000001_create_media_table', 1),
(9, '2020_01_21_000002_create_permissions_table', 1),
(10, '2020_01_21_000003_create_roles_table', 1),
(11, '2020_01_21_000004_create_users_table', 1),
(12, '2020_01_21_000005_create_categories_table', 1),
(13, '2020_01_21_000006_create_customers_table', 1),
(14, '2020_01_21_000007_create_appointments_table', 1),
(15, '2020_01_21_000008_create_frontend_settings_table', 1),
(16, '2020_01_21_000009_create_references_table', 1),
(17, '2020_01_21_000010_create_specialists_table', 1),
(18, '2020_01_21_000011_create_permission_role_pivot_table', 1),
(19, '2020_01_21_000012_create_role_user_pivot_table', 1),
(20, '2020_01_21_000013_add_relationship_fields_to_users_table', 1),
(21, '2020_01_21_000014_add_relationship_fields_to_appointments_table', 1),
(22, '2020_01_21_000015_add_relationship_fields_to_specialists_table', 1),
(23, '2020_01_22_053104_create_landings_table', 1),
(24, '2020_01_23_061345_create_reservations_table', 1),
(25, '2020_01_23_070730_create_services_table', 1),
(26, '2020_01_30_054350_create_available_days_table', 1),
(27, '2020_02_03_111536_create_app_default_settings_table', 1),
(28, '2020_02_04_093320_create_available_times_table', 1),
(29, '2020_02_08_113054_create_time_settings_table', 1);

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'category_create', NULL, NULL, NULL),
(18, 'category_edit', NULL, NULL, NULL),
(19, 'category_show', NULL, NULL, NULL),
(20, 'category_delete', NULL, NULL, NULL),
(21, 'category_access', NULL, NULL, NULL),
(22, 'customer_create', NULL, NULL, NULL),
(23, 'customer_edit', NULL, NULL, NULL),
(24, 'customer_show', NULL, NULL, NULL),
(25, 'customer_delete', NULL, NULL, NULL),
(26, 'customer_access', NULL, NULL, NULL),
(27, 'appointment_create', NULL, NULL, NULL),
(28, 'appointment_edit', NULL, NULL, NULL),
(29, 'appointment_show', NULL, NULL, NULL),
(30, 'appointment_delete', NULL, NULL, NULL),
(31, 'appointment_access', NULL, NULL, NULL),
(32, 'setup_access', NULL, NULL, NULL),
(33, 'frontend_setting_create', NULL, NULL, NULL),
(34, 'frontend_setting_edit', NULL, NULL, NULL),
(35, 'frontend_setting_show', NULL, NULL, NULL),
(36, 'frontend_setting_delete', NULL, NULL, NULL),
(37, 'frontend_setting_access', NULL, NULL, NULL),
(38, 'reference_create', NULL, NULL, NULL),
(39, 'reference_edit', NULL, NULL, NULL),
(40, 'reference_show', NULL, NULL, NULL),
(41, 'reference_delete', NULL, NULL, NULL),
(42, 'reference_access', NULL, NULL, NULL),
(43, 'specialist_create', NULL, NULL, NULL),
(44, 'specialist_edit', NULL, NULL, NULL),
(45, 'specialist_show', NULL, NULL, NULL),
(46, 'specialist_delete', NULL, NULL, NULL),
(47, 'specialist_access', NULL, NULL, NULL),
(48, 'reservation_create', NULL, NULL, NULL),
(49, 'reservation_edit', NULL, NULL, NULL),
(50, 'reservation_show', NULL, NULL, NULL),
(51, 'reservation_delete', NULL, NULL, NULL),
(52, 'reservation_access', NULL, NULL, NULL),
(53, 'service_create', NULL, NULL, NULL),
(54, 'service_edit', NULL, NULL, NULL),
(55, 'service_show', NULL, NULL, NULL),
(56, 'service_delete', NULL, NULL, NULL),
(57, 'service_access', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31);

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `name`, `designation`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'prof. MUDr. Lorem Ipsum, CSc.', 'Přednosta dermatovenerologické kliniky', 'Dermatopsychologie, text, text, text, text, text, text, text, text, text, text. text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text,', '2020-02-12 11:26:23', '2020-02-12 11:26:23', NULL),
(2, 'doc. PhDr. Dr.phil. Laura Janáčková, CSc.', 'vedoucí oddělení somatopsychiky Všeobecné faktultní nemocnice v Praze, zakladatelka,Institutu partnerských vztahů,prorektorka Vysoké školy aplikované psychologie', '„Dermatopsychologie, text, text, text, text, text, text, text, text, text, text. text, text, text, text, text, text, text, text,                  text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text,                  text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text,                text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text, text.“', '2020-02-12 11:31:59', '2020-02-12 11:31:59', NULL),
(3, 'prof. MUDr. Lorem Ipsum, DrSc., MBA', 'Předseda České dermatovenerologické společnosti', 'Dermatopsychologie, text, text, text, text, text, text, text, text, text, text. text, text, text, text, text, text, text, text,', '2020-02-12 11:34:46', '2020-02-12 11:34:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `footer_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Specialist', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `display_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PSYCHOLOGICKÉ PORADENSTVÍ', '<p>Odborníci ústavu dermatopsychologie dávají důraz na emoční potřeby klienta a jeho blízkých při procesu vyrovnávání se s diagnózou, léčbou a somatopsychickými, či psychosomatickými projevy. Naši terapeuti využívají především směr pozitivní psychoterapie, které využívá silných stránek klienta ke zpracování témat, prvky z kognitivně-behaviorálních směrů a daseinsanalýzy, pracují s technikami zvládání stresu, kladou důraz na empatické a autentické naslouchání, respektují klienta, jeho svobodu a rozhodnutí, nabízí podporu, bezpečí, pracují s aktuálními prožitky a pocity a přijímají ho bez výhrad takového, jaký je.</p>', '1', '2020-02-12 11:37:41', '2020-02-12 11:37:41', NULL),
(2, 'Individuální', '<p>V rámci individuálního poradenství je psycholog věnuje samostatně pouze klientovi. Akceptuje ho jako samostatnou a důstojnou bytost a přijímá ho takového, jaký je. Cíle terapie se individuálně liší, avšak často mezi ně spadá přijetí diagnózy, vytvoření návyků spojených s dermatologickou léčbou, práce na potlačení psychosomatických, či somatopsychických projevů onemocnění, sebepoznávání, znovunalezení vlastní sebedůvěry, práce se stresem, bolestí, pocity svědění, únavou, poruchami spánku, depresí, úzkostmi, nebo též partnerskými, sexuálními problémy.</p><p>&nbsp;</p>', '2', '2020-02-12 11:38:23', '2020-02-12 11:38:23', NULL),
(3, 'Rodinné', '<p>Některá dermatologická onemocnění člena rodiny, jakým je například lupénka, či atopický ekzém, často ovlivní rodinu jako celek. V rámci sezení pracujeme komplexně na řešení problémů spojených s dermatologickým onemocněním spolu s klientem a jeho rodinou. Rodinné poradenstvív našem pojetí je určené především pro děti, adolescenty a jejich rodiče. V průběhu opakovaných sezení terapeut nabízí podporu, vytváří návyky spojené s léčbou, mění maladaptivní kognitivní schémata členů rodiny, soustředí na pocity a potřeby klienta a členů jeho rodiny. Klienti i členové rodiny si tak mohou opět definovat a najít své místo v rodině tak, aby se cítili komfortně a pracují na přijetí diagnózy a jejích důsledků.</p><p>&nbsp;</p><p>&nbsp;</p>', '2', '2020-02-12 11:38:45', '2020-02-12 11:38:45', NULL),
(4, 'TECHNIKY ZVLÁDÁNÍ STRESU', '<p>Dle zahraničních výzkumů má stres a opakované se vystavování stresovým situacím za následek prokazatelné zhoršení projevů atopického ekzému, negativní vliv na vznik akné a dalších kožních onemocnění. V rámci terapeutického sezení si vyzkoušíte pod vedením terapeuta řízené techniky zvládání stresu a budete se je učit aplikovat ve svém běžném životě tak, aby působili preventivně proti zhoršení kožního onemocnění v důsledku stresových situací.</p><p>&nbsp;</p><p>&nbsp;</p>', '1', '2020-02-12 11:39:10', '2020-02-12 11:39:10', NULL),
(5, 'DERMOPORADENSTVÍ', '<p>V Ústavu dermatopsychologie nabízíme dermoporadenství zaměřené na analýzu vaší pleti a doporučení optimální hygieny a péče z oblasti dermokosmetiky. Dermokosmetické přípravky mají klinicky prokázané pozitivní účinky na pleť s akutními, či chronickými dermatologickými problémy.</p><p>&nbsp;</p><p>&nbsp;</p>', '1', '2020-02-12 11:39:31', '2020-02-12 11:39:31', NULL),
(6, 'AKUPUNKTURA', '<p>Akupunktura patří k velmi silným prostředkům, s jehož pomocí můžeme ovlivňovat zdravotní stav pacienta. Spočívá v léčbě pacienta pomocí nabodávání tenkých jehliček do akupunkturních bodů. Zahraniční literatura poukazuje na akupunkturu jako na vhodnou doplňkovou léčbu pacientů s různými kožními problémy. V našem zařízení je prováděna pouze proškolenými doktory medicíny.</p><p>&nbsp;</p><p>&nbsp;</p>', '1', '2020-02-12 11:39:48', '2020-02-12 11:39:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `description`, `opening_time`, `closing_time`, `photo`, `availability`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `category_id`) VALUES
(1, 'Nisi qui dolorem qua', '12:08:17', NULL, NULL, '1', '2020-02-15 23:08:21', '2020-02-15 23:08:21', NULL, 24, 3),
(2, 'Sed voluptate nisi m', '09:08:33', NULL, NULL, '2', '2020-02-15 23:08:38', '2020-02-15 23:08:38', NULL, 50, 3),
(3, 'Nisi dolorem fugit', '07:08:50', NULL, NULL, '1', '2020-02-15 23:08:55', '2020-02-15 23:08:55', NULL, 45, 1),
(4, 'Vel esse qui dolor q', '09:09:02', NULL, NULL, '1', '2020-02-15 23:09:09', '2020-02-15 23:09:09', NULL, 5, 2),
(5, 'Esse aliquip aperiam', '09:09:30', NULL, NULL, '1', '2020-02-15 23:09:36', '2020-02-15 23:09:36', NULL, 44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `time_settings`
--

CREATE TABLE `time_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_settings`
--

INSERT INTO `time_settings` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', NULL, NULL),
(2, '10:00:00', NULL, NULL),
(3, '11:00:00', NULL, NULL),
(4, '12:00:00', NULL, NULL),
(5, '13:00:00', NULL, NULL),
(6, '14:00:00', NULL, NULL),
(7, '15:00:00', NULL, NULL),
(8, '16:00:00', NULL, NULL),
(9, '17:00:00', NULL, NULL),
(10, '18:00:00', NULL, NULL),
(11, '19:00:00', NULL, NULL),
(12, '20:00:00', NULL, NULL),
(13, '21:00:00', NULL, NULL),
(14, '22:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_specialist` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `designation`, `email_verified_at`, `password`, `remember_token`, `description`, `is_specialist`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(1, 'Admin', 'admin@admin.com', '', NULL, '$2y$10$0kbInJQb220B.teMYBM6Fu69D5m0G1NRtPshaws8d3M165Wx7/laK', NULL, '', 0, NULL, NULL, NULL, NULL),
(2, 'Ingr. Mgr. Felix S. Ratzenbeck', 'Felix@admin.com', 'MSc. - leading psychologist', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'Felix Ratzenbeck is a graduate of a one-disciplinary psychology program and a 5-year self-experience psychotherapeutic training, and also studied economics and management. He is the founder and leading psychologist at the Institute of Dermatopsychology. He has been working for a long time at the Institute of Partner Relations, dealing with personal development and stress management. He has published dozens of popular and popular scientific articles and actively participates in Czech and foreign professional conferences on psychological and dermatovenerological topics.', 0, NULL, NULL, NULL, 1),
(3, 'Mgr. Celestýna Kysmanová', 'some1@admin.com', 'stress management', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dignissimos tempora consequuntur, voluptas, accusantium mollitia fuga ad laudantium iusto nesciunt recusandae reiciendis dolores ex, optio incidunt quasi quam! Similique obcaecati doloribus, dolore commodi aspernatur totam. Iste quam magni vero nostrum maiores ut odio ipsum, mollitia eos command facere necessitatibus voluptatem.', 0, NULL, NULL, NULL, 2),
(4, 'MUDr. Barbora Hirnerová', 'some@admin.com', 'accupuncture', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'In 2007 she graduated from the 1st Medical Faculty of Charles University in Prague. In 2012, she attended General Practice Medicine. During her studies she completed a course in sports and reconditioning massage and Hawaiian massage. In 2010-2011 she completed a course in acupuncture and myoskeletal medicine. She is currently attending psychotherapeutic training in family and partner psychotherapy in Liberec and is preparing for attestation in psychosomatic medicine.', 0, NULL, NULL, NULL, 3),
(5, 'Prof. Elroy Senger', 'hahn.lorena@example.org', 'ex', '2020-02-16 04:51:06', '$2y$10$I44MQuA3pb0qGhrF41WIceOzFv2Hu8xh/yBTsYIwaOKvrChp69m/K', 'kBwo3Tvxn0', 'Exercitationem omnis quae enim at. Accusamus suscipit dignissimos quia sed sapiente. Perferendis fugit veniam et odio nisi dignissimos nihil.', 1, '2020-02-15 22:51:06', '2020-02-15 23:09:09', NULL, 1),
(6, 'Darrion Spinka III', 'nathanial24@example.org', 'molestias', '2020-02-16 04:51:06', '$2y$10$hMNKjeR.hsZwcIMqBOnKzeHEAOOO2amuKEE49svkcAbq/Jqm7bfdu', 'SpudYBTCsI', 'Qui non voluptatum possimus soluta magnam iusto. Minus est explicabo repellendus dolores dolorem. Veritatis vel nobis consequatur quis praesentium voluptatibus dolores.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 3),
(7, 'Marcelino Bashirian', 'skye.mueller@example.org', 'error', '2020-02-16 04:51:06', '$2y$10$F9g8dvUD7gni4FZmAaMcVerUfP36jk5/U/5vujmbuIsHyh1Mli4em', 'moPxvm30JQ', 'Qui voluptatibus autem culpa enim. Sit aliquam dolore iste provident doloribus. Quia maiores exercitationem qui sequi. Asperiores dolores minima necessitatibus magni perspiciatis praesentium.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 2),
(8, 'Prof. Flossie Spencer', 'abernathy.sonya@example.net', 'nemo', '2020-02-16 04:51:06', '$2y$10$lwH0nHT.wvbiB2dYdMdOaeq61jEYNmsrRrgABTKPl1AaFiv1vwkne', '2tN1YTv9RQ', 'Expedita esse ipsam dicta accusamus non. Necessitatibus eligendi rerum omnis nisi repudiandae omnis minima. Dicta deleniti a odit delectus enim repellat.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 2),
(9, 'Boris Jacobi', 'greyson.hoppe@example.com', 'voluptatem', '2020-02-16 04:51:06', '$2y$10$qruGwoFbFHZHSPo9WlCCNuyqnLuE0Jnk0qj4P3Rpay0oA.w27YXyS', '360nDR1dXG', 'Molestiae dicta tempore rerum harum amet. Quisquam vitae voluptatem corrupti iusto id rem explicabo. Ipsam qui ab ut voluptate ex non.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 3),
(10, 'Chanelle Hoppe', 'adelia.runolfsdottir@example.com', 'esse', '2020-02-16 04:51:06', '$2y$10$uI.Q6YxWegQBK1VZ9YRkTuPe1cfGvxc.cbUsDX6xt8.8/TOLJnFji', 'q2QxjiBx5T', 'Consequuntur ab vel dolor cupiditate laudantium quaerat earum perspiciatis. Ut eaque repellendus ad qui occaecati magnam consequatur. Nihil quo rerum et autem at iste et maiores.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 2),
(11, 'Johnnie Ritchie Sr.', 'demetrius.rogahn@example.org', 'et', '2020-02-16 04:51:06', '$2y$10$XB5rLY4ZjAwIj4cBRxXFFuW0KmYY3FgEkyY.uHgJ/F/mupp4JoLO.', 'Q4uLsz04YL', 'Tenetur cum amet aliquid nisi excepturi. Ut quibusdam dolorem aut doloribus rerum. Non aspernatur aliquid explicabo sunt dolore illum occaecati. Eum dolor architecto sit harum illo consequatur dignissimos.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 2),
(12, 'Waylon Mayert', 'ollie.volkman@example.net', 'cumque', '2020-02-16 04:51:06', '$2y$10$51sP38396USn/LCRRPPUWOM7m1fXTMAkwcRhiSPliYjKYWhmjm2um', 'xZz1ncY4Ti', 'Sapiente est accusantium necessitatibus ut velit. Dolorem asperiores ab explicabo temporibus odit modi fugit. Aut quae et provident voluptatum ex dolores.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 3),
(13, 'Mrs. Ardella Nicolas', 'lorena.frami@example.com', 'velit', '2020-02-16 04:51:06', '$2y$10$cyfRH08tR2cT2ApPcs1PTOChASC8wIm2TwZ8L8R3oHrerUvpHYLjW', 'v6s13BNtM5', 'Esse et ipsam repudiandae. Occaecati veritatis odio ut quas ab et eius. Odio provident omnis quas quos.', 0, '2020-02-15 22:51:06', '2020-02-15 22:51:06', NULL, 2),
(14, 'Kirsten Funk', 'marilyne43@example.net', 'sint', '2020-02-16 04:51:06', '$2y$10$jdh2yS97l6vyX2pMg1R3aevDzU7HaaZNxDzjWYO20B6ZetL.EF2mK', 'xZ0kBo0OPZ', 'Rerum quibusdam temporibus fugit consequatur perferendis. Ea ut et debitis quasi in. Praesentium eius natus ut voluptatibus et aperiam. Eveniet pariatur voluptatem fugiat voluptatum nemo optio nam.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 1),
(15, 'Dr. Jordi Murazik', 'veronica52@example.org', 'repellat', '2020-02-16 04:51:07', '$2y$10$Re21HfV76Vwb7Qlugt9NRuhdxWNTuZ6wUJaeKKUKB6F8Dznky62G6', 'PFH2yivp6r', 'Nemo beatae placeat iure asperiores facere laborum sit. At repellat eligendi officia molestias expedita in perferendis. Aperiam accusamus nihil ut laboriosam quaerat et.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(16, 'Mr. Cleo Sauer II', 'tiara.hirthe@example.com', 'vel', '2020-02-16 04:51:07', '$2y$10$5QitHSvo85Ey60PeM14Qc.BWBPWD31iSNOt2BmcFovjlXL4jXj3Ma', 'Hkwk2j7S7t', 'Laborum dolore sed temporibus ut pariatur aut autem. Voluptatem exercitationem ut illum iusto. Voluptatem et est rerum numquam laboriosam sunt. Iste eum animi ut nesciunt at accusamus voluptates eveniet.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 1),
(17, 'Grayson Kuphal', 'silas.west@example.com', 'quo', '2020-02-16 04:51:07', '$2y$10$s1suSsdRqulgzpr91xi8F.Kpy8XVfQQJgLqYSzTFiRZRMMqEMshuW', 'xcxUqcBMZU', 'Voluptatem odio doloremque libero sint nesciunt. Voluptatem est ab aut consequuntur. Dolores consequatur consectetur soluta nam aut in. Ipsam natus nihil nam ducimus nisi.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(18, 'Nestor Koelpin', 'bhand@example.com', 'natus', '2020-02-16 04:51:07', '$2y$10$pPbY9r4sMcaLg3cPgj3Lse3ga0XZ3zQq8yWSiiTsKwSCnwlupJdR2', '581FIz9Gm7', 'Magni numquam quisquam fugit magnam et dolor. Vitae nemo et quidem. A fugit ducimus error. Aut non iusto possimus labore voluptas.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(19, 'Dr. Vella Auer Jr.', 'uerdman@example.net', 'odit', '2020-02-16 04:51:07', '$2y$10$KDmZguoUnY0zRpzG/5JVdu.y3Tq4GjNUTUoKx04.2JUiP6KguKaPi', 'X5bmRFmv2o', 'Nihil sint quos unde. Doloribus inventore aliquam porro. Quis tempora provident et quasi quo voluptas ipsam. Dolor id expedita consequatur error earum nulla. Quia quis fugiat nemo eius consequuntur.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(20, 'Horacio Muller', 'corene.botsford@example.net', 'explicabo', '2020-02-16 04:51:07', '$2y$10$7e5iIxY3BfhvmYsrLmdaBObQoToKDW3sYG2A.bw09R6mILnIxxBh2', 'cPtD2ndvIF', 'Dolorem expedita consectetur itaque voluptas architecto corrupti. Perspiciatis neque odio beatae iusto asperiores voluptas consequatur. Nobis dolore tenetur et autem. Eum est aliquid rem dicta sed ratione.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(21, 'Wilbert Keebler', 'michel.luettgen@example.net', 'reprehenderit', '2020-02-16 04:51:07', '$2y$10$K5OlPXRxFXPCjbjaYLv8J.N9tuqRkVxhpGmz8KKIifE7mDYnI0pmC', 'e6FmJZPmdD', 'Id voluptatibus soluta laudantium voluptas iste. Inventore provident ut repellat dolor cupiditate ducimus. Voluptates unde quo dolores molestiae. Voluptatem aliquid consequatur voluptas itaque. Natus est sequi magni vel reprehenderit voluptatem.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 1),
(22, 'Ethelyn Moen', 'kozey.morton@example.net', 'ratione', '2020-02-16 04:51:07', '$2y$10$xIqqWteE7lDKwy8ZmTVi2.URaFIXRrwxDHFev98eIQN3n8pXgzxUC', 'MNuOzZRbL6', 'Eos laudantium error dolorum nihil rerum. Consectetur expedita earum voluptates expedita asperiores fugit. Est eum esse blanditiis illo necessitatibus et rerum.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 1),
(23, 'Clair Leffler', 'mertie42@example.org', 'aspernatur', '2020-02-16 04:51:07', '$2y$10$q91SIo1O6m6K2ZHXGWdtPODRFoIp0Dee6vRQaRTFmZN60jpZmx.PK', 'ipHaL0x5qE', 'Deserunt officia quaerat blanditiis non. Repudiandae a ducimus velit voluptatem ut tenetur. Temporibus aut ut totam sed quia architecto et.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(24, 'Mr. Jerald Thompson', 'olson.muriel@example.com', 'molestiae', '2020-02-16 04:51:07', '$2y$10$w1.e9ihY8OVr0wFt6rkWzOOiiCDkUJZ6wPJTyyxCrYhdiGkZqnkzy', 'M2YBwCq7iU', 'Quod nemo temporibus sit alias voluptas aperiam. Iure eius pariatur numquam veniam illo. Consequatur cumque aliquam similique qui excepturi tenetur. Sequi aperiam sit sunt sit. Minima at minima sequi perspiciatis eius commodi sed.', 1, '2020-02-15 22:51:07', '2020-02-15 23:08:21', NULL, 1),
(25, 'Laurel Wilderman', 'upton.raul@example.net', 'beatae', '2020-02-16 04:51:07', '$2y$10$h/Fm72C.xzDvpk8KhVYrO.mojNi1qSLq9Xu2WhkL59gJW.rv54/6q', '2PtsCrkF94', 'Perferendis enim et rerum est. Aperiam doloremque quibusdam provident molestiae amet rem.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(26, 'Athena Medhurst IV', 'santino.upton@example.org', 'eligendi', '2020-02-16 04:51:07', '$2y$10$dPipiJOenw6hMIbQtr3Tv.n5/v5OCdRkL/i9W34GlhBvbkdFu3APC', 'SVSN1XaQTE', 'Libero ut enim ab consectetur et. Nobis omnis voluptas eum debitis. Et autem voluptas omnis fugit.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(27, 'Nathanael O\'Kon DDS', 'harber.kale@example.net', 'ut', '2020-02-16 04:51:07', '$2y$10$ykKMzGrmOvEO.XJSD7JWheVszcTa7zW/7V1WYlZTISmSjojF3eqBG', 'KrJ5tsEGEv', 'Et sint quo commodi dolores nulla facilis. Suscipit eos expedita officia accusamus facilis minus. Qui tempore similique voluptatem rerum magnam quasi.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(28, 'Rahul Bernhard', 'rmayert@example.org', 'dolor', '2020-02-16 04:51:07', '$2y$10$tj5emIZQIL3mUCb6TGXdWuHDjKfLLsDMhXOlE0eziEHVDY/reVmqi', 'uqakUb0rqg', 'Architecto quia ipsa quasi iusto alias et. Qui ex est magnam. Iure est rerum delectus aspernatur aliquid id repellendus. Eos praesentium placeat non provident qui blanditiis et.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(29, 'Colton Schaefer', 'mswift@example.org', 'aspernatur', '2020-02-16 04:51:07', '$2y$10$5RD8yI6oSKYpE3DmrxwjFuNc/44Kmat6BUjkG.1w59xtSGy4kC8/6', 'TZ33LqAlTw', 'Ut error mollitia et architecto aut aut. Repellendus dolorem molestiae voluptates est molestiae facere et. Fugiat facilis nesciunt qui possimus ipsum sint pariatur animi. Et ut culpa in.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(30, 'Gonzalo Jones I', 'crooks.chris@example.net', 'non', '2020-02-16 04:51:07', '$2y$10$wMjbzEHk0rB7D.rwvoUs7uIKyuIfdY6Td9.NlxaF7GoaEyXzn9hP6', 'OMUbJHAFCo', 'Eaque id doloribus eum asperiores eos. Dolorem velit dolorem assumenda fuga. Necessitatibus omnis ut voluptates architecto laboriosam. Asperiores illum necessitatibus rerum voluptatem et voluptatem consequuntur.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 2),
(31, 'Lucio Lynch', 'mitchell.reina@example.com', 'sunt', '2020-02-16 04:51:07', '$2y$10$EwRjPLI.F9eNknFSNAAMrOnBucVILX4ACl9yM/oM5B0CApM8kT/cG', 'DNkgxDihqk', 'Aliquam corporis soluta natus et itaque molestiae. Expedita cumque beatae quis fuga. Inventore sit dolorem aspernatur dolores aperiam quas. Qui magni at possimus sunt.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(32, 'Dwight Koelpin', 'xkertzmann@example.org', 'sequi', '2020-02-16 04:51:07', '$2y$10$qmChbbJ4maXEv9uEprJDPumB4JfbdsAiVZpEeIttAGQqKBWlOHjJK', '9Z0rqM1SqR', 'Deserunt perspiciatis eaque asperiores cum id illum eaque unde. Quidem provident ea ut dolorem voluptatum et perferendis. Quo iure tempore non. Velit eligendi esse enim ducimus omnis quis et.', 0, '2020-02-15 22:51:07', '2020-02-15 22:51:07', NULL, 3),
(33, 'Miss Rosalinda Thiel', 'johnston.danika@example.org', 'ducimus', '2020-02-16 04:51:07', '$2y$10$fF/BnEcG3.BL/.ygp//eX.nX557bhrwX/SaqPJQDFRzSdqNtJDVS2', 'EggGyoXOIV', 'Velit quia vel accusamus necessitatibus velit sit pariatur. Dignissimos qui accusantium magnam quam. Ad voluptates at recusandae deserunt.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(34, 'Prof. Orpha Ernser Sr.', 'alba.nolan@example.org', 'et', '2020-02-16 04:51:08', '$2y$10$wceoJDi0HgGmqGJCCrao7O8ryoKBiJD5n5XHSASayApH/Ub2J4Z9G', 'WOOU3cBApp', 'Quibusdam laboriosam placeat in beatae adipisci voluptate nisi. Et minus necessitatibus et quod est. Eaque molestias sed voluptatem quis quo. Eius vel velit minus necessitatibus illo est quia.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(35, 'Kenyon Kertzmann III', 'dboyer@example.net', 'iusto', '2020-02-16 04:51:08', '$2y$10$Dh6qPI1gB38yGvpXli6HAulMgV5L/SARUsiO7R7WK1Zkl3lOjnUbu', 'vMUxdkN2PK', 'Pariatur nulla ipsa placeat. Minus porro sit error delectus. Esse magni aut facere quia quia quis. Repudiandae molestiae dolores neque illo veniam iste.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(36, 'Prof. Jaleel Kuvalis', 'maxie.wolf@example.org', 'velit', '2020-02-16 04:51:08', '$2y$10$aTEjbMtTWAWHu5n0VLdE.evYcFllp02ChkGFrrzVt52GWMIF5jAS6', 'NTMxUclHYe', 'Similique est exercitationem sit ut unde velit. Et sed aut dolorum ex ad aut soluta. Voluptas ut consequatur laboriosam commodi maxime.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(37, 'Anjali Legros MD', 'kautzer.chadd@example.com', 'nihil', '2020-02-16 04:51:08', '$2y$10$2B.WHowwiw1WrS9Q/RdLVeX3T6g96tGCPoVKyFpZR0UA2POtfnQZa', 'vKtrswNIRN', 'Animi sapiente qui dolorum enim officia. Explicabo ab ut sint rerum laboriosam quae minus dolores. Et sit iste rerum doloribus ea quis. Velit provident nisi est voluptatem. Qui eius voluptatem doloremque architecto.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(38, 'Madelyn Mante', 'auer.fanny@example.org', 'eum', '2020-02-16 04:51:08', '$2y$10$sFokmEd5/hnLBg2FiN1BZu1yYpnCe9j0eScPSONTiZSKbJ5w4KPsO', 'LmXlmQzqke', 'Cum qui eos quis molestias explicabo. Magni incidunt repellendus architecto autem. Possimus temporibus ut id. In vitae laboriosam delectus et dolor corrupti.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(39, 'Verda Bernier', 'amira99@example.com', 'consequatur', '2020-02-16 04:51:08', '$2y$10$wEj4GUNMQFRudrLM6Foy0uVoE4W2fjlEVFrdKIuooHRgEF4lTKkXS', 'gqY8o6IgFz', 'Dolorem saepe beatae deleniti qui perspiciatis et eos. Consectetur iusto natus provident et ipsa. Aut sunt vero et voluptatem et nam.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(40, 'Miss Catharine Veum', 'mayer.lola@example.net', 'dolore', '2020-02-16 04:51:08', '$2y$10$a.YsofXgcUHZJjg/Cxn6tek725NSVuz7N5PcfVe9OvyHucI3ubttu', 'XAHQWJ0tJS', 'Beatae numquam aliquam quam. Dicta cupiditate rerum facere perspiciatis. Eius hic repellat officia aut voluptatem porro dolores.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(41, 'Fabian Mertz', 'kirstin.purdy@example.net', 'iusto', '2020-02-16 04:51:08', '$2y$10$SqU41/73QyesBwuWdyMxQOLPu.IuOMzuSe2M874bU4WpZ8AvtQJbC', 'WebkOd9LGG', 'Est modi voluptas asperiores accusantium possimus harum reprehenderit sit. Molestiae a dolor autem dignissimos omnis dolor. Ea at qui suscipit ut officiis nesciunt.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(42, 'Alexie Bashirian DVM', 'brekke.nico@example.com', 'ea', '2020-02-16 04:51:08', '$2y$10$mL8GMMfYdpOo0nQk5/Hwl.IrVVZbhk/VWpP5MNvcjXNZrrhVOrQMW', 'uAZNwwLjZT', 'Optio quidem consequatur eum est voluptates sed quae. Et eos autem dolor laboriosam. Ut aspernatur ut similique sunt vitae.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 1),
(43, 'Dr. Carlotta Berge II', 'roma.hoppe@example.net', 'consequatur', '2020-02-16 04:51:08', '$2y$10$Rqga7mhJwUa1WYYCvcVyUelvAAVZtun54xCgt4lqrvwD1ZjvYkBNW', 'dX643Vhoiq', 'Natus ut sunt tempora quos doloribus voluptatibus eum. Incidunt omnis libero omnis omnis. Doloribus maxime id porro in incidunt autem. Dolor aliquam ea ut impedit.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 2),
(44, 'Teagan Schmitt V', 'donnelly.marley@example.com', 'in', '2020-02-16 04:51:08', '$2y$10$WO.I3OhDzhNQ2QS6GCqymOi1H265ZzOK1CoWYAOPjcGujUF6vquFa', 'PLUVmLIaHK', 'Vel nihil accusantium qui vel hic laborum harum eligendi. Unde vel ut aliquam dolorem. Repellat ut et minima.', 1, '2020-02-15 22:51:08', '2020-02-15 23:09:36', NULL, 3),
(45, 'Rupert Ruecker PhD', 'maudie.kirlin@example.net', 'non', '2020-02-16 04:51:08', '$2y$10$bdjHUxtatLgSY6t4e6NToOPlVjuFYwwGmf1DTS5o00yYx3kdeNV9i', '6Ijfprc8BZ', 'Labore tempore impedit cum voluptatum qui quidem. Nihil rerum quod enim eligendi voluptates. In occaecati magni iste fugiat aut enim voluptate.', 1, '2020-02-15 22:51:08', '2020-02-15 23:08:55', NULL, 3),
(46, 'Edward Konopelski', 'triston.howe@example.com', 'id', '2020-02-16 04:51:08', '$2y$10$1fWDuCBJzWmRuX6I3gn57OcdU0IgHrH68.cW4eiwiL1M/HCAg9IAi', '7xxfaRm1pM', 'Placeat mollitia dolorem nihil reiciendis quis molestiae. Voluptatem illo iusto ad repellat sit tempore. Ut commodi veritatis et veniam doloremque magnam.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 2),
(47, 'Abraham O\'Connell', 'stanley41@example.net', 'sed', '2020-02-16 04:51:08', '$2y$10$sP4zsFv74SNDitb1j6ok7Og7pVkVF9Xe1WU5HQK5BbjZQjy2pEImu', 'waupB8BONn', 'Aliquid non et qui fugit quasi mollitia voluptate. Pariatur ut impedit deleniti laudantium est. Quod eum impedit quisquam deserunt. Sint sapiente perspiciatis voluptatibus doloremque laborum. Sed autem et non ipsam.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(48, 'Mr. Alejandrin Boehm', 'xkshlerin@example.com', 'cupiditate', '2020-02-16 04:51:08', '$2y$10$knVACBkksS1Mq.llZju2fuIeRXhh0Wto289fzCViuoG/543J2kq76', 'g3vem8Ybq6', 'Ipsum sed iste minus aliquam dolores id. Similique earum rerum sed unde quia. Est voluptas dicta et laborum adipisci. Molestiae excepturi eligendi quia itaque doloribus.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(49, 'Prof. Nicholaus Yundt V', 'alysson03@example.net', 'explicabo', '2020-02-16 04:51:08', '$2y$10$PohN8ivsEmEO.5XaeQT1RO6bo/qC/qFA0kr60YwjiDCRoZm3sScuO', 'reZpv6F4z9', 'Vitae illum facere nesciunt nemo tenetur quaerat reiciendis. Doloremque qui exercitationem voluptas quo quia ipsa. Ad non atque sed iste.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(50, 'Hershel Wyman', 'wokeefe@example.com', 'facilis', '2020-02-16 04:51:08', '$2y$10$0GXKJiEBJ3NrDiWUI6CYLOVtsb3i8IUMBV1Quz8eyGnONwl1iPCYm', 'aGTpOGuBDF', 'Perferendis architecto ipsa cupiditate. Est ipsa quia minima nesciunt sit quidem. At voluptatum culpa repudiandae eum vitae officia ab.', 1, '2020-02-15 22:51:08', '2020-02-15 23:08:38', NULL, 1),
(51, 'Erwin Daniel', 'brannon.johnston@example.org', 'recusandae', '2020-02-16 04:51:08', '$2y$10$tvbPtMZS3cEQ1IV43lvmGOtCBBZeG2X/uqXOU/I7bBO1ohwgCDwXC', 'CGcjZ0Pv7k', 'Quis voluptatum sequi magnam vel beatae qui magni. Non totam nihil voluptatem provident porro quia enim. Dolores veritatis impedit voluptatem nobis et nemo.', 0, '2020-02-15 22:51:08', '2020-02-15 22:51:08', NULL, 3),
(52, 'Aurelio Homenick', 'kaelyn14@example.com', 'doloremque', '2020-02-16 04:51:08', '$2y$10$pLdE7lIYAWvHiDgA.cIPKOUZl7ce2lgSJqIUsixp4/dsVb6rI98dS', 'FZo4OzQZ4A', 'Sed voluptas accusamus eum quis alias similique debitis qui. Sunt et nemo molestias magni. Aut porro numquam voluptate labore. Cum et distinctio deleniti repellendus earum.', 0, '2020-02-15 22:51:09', '2020-02-15 22:51:09', NULL, 3),
(53, 'Prof. Dayne Mertz', 'casimer22@example.org', 'consectetur', '2020-02-16 04:51:09', '$2y$10$wCs6UHT2O/jey3o5Hy9mA.ODz7RHbwQmqTPt2TWxiNE/9C9UJEL6S', '0y1u7PMHzu', 'Sed sed delectus a aut corrupti molestiae rerum. Tenetur error et maxime quod. Natus omnis nulla dignissimos quo accusamus.', 0, '2020-02-15 22:51:09', '2020-02-15 22:51:09', NULL, 2),
(54, 'Prof. Edyth Runolfsson', 'fernando.hoppe@example.net', 'dolor', '2020-02-16 04:51:09', '$2y$10$iXKDYwkaIBPTmrU/T5Guw.CtTS5/qX2YW.atCAhPu4mUgFOKTzx9O', 'z40BSNvBXL', 'Autem quam dignissimos reiciendis id. Non nulla maxime voluptatem provident quia est omnis. Magni ipsam nam laboriosam reiciendis aperiam laudantium.', 0, '2020-02-15 22:51:09', '2020-02-15 22:51:09', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_894257` (`customer_id`),
  ADD KEY `specialist_fk_894540` (`specialist_id`);

--
-- Indexes for table `app_default_settings`
--
ALTER TABLE `app_default_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_days`
--
ALTER TABLE `available_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_days_specialist_id_foreign` (`specialist_id`),
  ADD KEY `available_days_day_name_id_foreign` (`day_name_id`);

--
-- Indexes for table `available_times`
--
ALTER TABLE `available_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_times_available_day_id_foreign` (`available_day_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_names`
--
ALTER TABLE `day_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landings`
--
ALTER TABLE `landings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_893413` (`role_id`),
  ADD KEY `permission_id_fk_893413` (`permission_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_893422` (`user_id`),
  ADD KEY `role_id_fk_893422` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_899200` (`user_id`),
  ADD KEY `category_fk_899201` (`category_id`);

--
-- Indexes for table `time_settings`
--
ALTER TABLE `time_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `category_fk_894120` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_default_settings`
--
ALTER TABLE `app_default_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_days`
--
ALTER TABLE `available_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `available_times`
--
ALTER TABLE `available_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_names`
--
ALTER TABLE `day_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landings`
--
ALTER TABLE `landings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_settings`
--
ALTER TABLE `time_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `customer_fk_894257` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `specialist_fk_894540` FOREIGN KEY (`specialist_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `available_days`
--
ALTER TABLE `available_days`
  ADD CONSTRAINT `available_days_day_name_id_foreign` FOREIGN KEY (`day_name_id`) REFERENCES `day_names` (`id`),
  ADD CONSTRAINT `available_days_specialist_id_foreign` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`);

--
-- Constraints for table `available_times`
--
ALTER TABLE `available_times`
  ADD CONSTRAINT `available_times_available_day_id_foreign` FOREIGN KEY (`available_day_id`) REFERENCES `available_days` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_893413` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_893413` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_893422` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_893422` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialists`
--
ALTER TABLE `specialists`
  ADD CONSTRAINT `category_fk_899201` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `user_fk_899200` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `category_fk_894120` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
