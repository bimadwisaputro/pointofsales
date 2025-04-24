-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2025 pada 11.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sales`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories_bk`
--

CREATE TABLE `categories_bk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories_bk`
--

INSERT INTO `categories_bk` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Buah', NULL, '2025-03-26 21:37:07'),
(2, 'Makanan', NULL, NULL),
(3, 'Minuman', NULL, NULL),
(4, 'Non Alkohol', NULL, NULL),
(5, 'Alkohol', NULL, NULL),
(6, 'App Developing', '2025-03-26 20:13:12', '2025-03-26 20:13:12'),
(7, 'Web Developer', '2025-03-26 20:13:19', '2025-03-26 20:13:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_26_044259_create_categories_table', 2),
(5, '2025_03_26_044311_create_categories_table', 3),
(6, '2025_04_08_012646_create_products_table', 4),
(7, '2025_04_09_021013_create_others_table', 5),
(8, '2025_04_24_014442_create_roles_table', 6),
(9, '2025_04_24_021922_create_user_roles_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `others`
--

CREATE TABLE `others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_amount` decimal(16,2) NOT NULL,
  `order_change` decimal(16,2) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `others`
--

INSERT INTO `others` (`id`, `order_code`, `order_date`, `order_amount`, `order_change`, `order_status`, `created_at`, `updated_at`) VALUES
(21, 'ORD100425001', '2025-04-10', 80000.00, 1.00, 1, '2025-04-10 00:47:20', '2025-04-10 00:47:20'),
(22, 'ORD100425022', '2025-04-10', 190000.00, 1.00, 1, '2025-04-10 00:51:27', '2025-04-10 00:51:27'),
(23, 'ORD100425023', '2025-04-10', 30000.00, 1.00, 1, '2025-04-10 00:52:06', '2025-04-10 00:52:06'),
(24, 'ORD100425024', '2025-04-10', 30000.00, 1.00, 1, '2025-04-10 01:26:23', '2025-04-10 01:26:23'),
(25, 'ORD100425025', '2025-04-10', 39000.00, 1.00, 1, '2025-04-10 01:27:35', '2025-04-10 01:27:35'),
(26, 'ORD110425026', '2025-04-11', 1438000.00, 1.00, 1, '2025-04-10 18:23:34', '2025-04-10 18:23:34'),
(27, 'ORD110425027', '2025-04-11', 100000.00, 1.00, 1, '2025-04-10 18:26:33', '2025-04-10 18:26:33'),
(28, 'ORD110425028', '2025-04-11', 90000.00, 1.00, 1, '2025-04-10 18:27:54', '2025-04-10 18:27:54'),
(30, 'ORD240425029', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:01:41', '2025-04-24 00:01:41'),
(31, 'ORD240425031', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:02:07', '2025-04-24 00:02:07'),
(32, 'ORD240425032', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:02:09', '2025-04-24 00:02:09'),
(33, 'ORD240425033', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:08:39', '2025-04-24 00:08:39'),
(34, 'ORD240425034', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:09:02', '2025-04-24 00:09:02'),
(35, 'ORD240425035', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:09:05', '2025-04-24 00:09:05'),
(36, 'ORD240425036', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:09:15', '2025-04-24 00:09:15'),
(37, 'ORD240425037', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:11:52', '2025-04-24 00:11:52'),
(38, 'ORD240425038', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:12:05', '2025-04-24 00:12:05'),
(39, 'ORD240425039', '2025-04-24', 80000.00, 1.00, 1, '2025-04-24 00:14:38', '2025-04-24 00:14:38'),
(40, 'ORD240425040', '2025-04-24', 100000.00, 1.00, 1, '2025-04-24 00:15:02', '2025-04-24 00:15:02'),
(41, 'ORD240425041', '2025-04-24', 30000.00, 1.00, 1, '2025-04-24 00:36:55', '2025-04-24 00:36:55'),
(42, 'ORD240425042', '2025-04-24', 50000.00, 1.00, 1, '2025-04-24 01:26:13', '2025-04-24 01:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `others_details`
--

CREATE TABLE `others_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `others_details`
--

INSERT INTO `others_details` (`id`, `order_id`, `product_id`, `qty`, `order_price`, `order_subtotal`, `created_at`, `updated_at`) VALUES
(5, 21, 2, 1, 30000.00, 30000.00, NULL, NULL),
(6, 21, 1, 1, 50000.00, 50000.00, NULL, NULL),
(7, 22, 2, 3, 30000.00, 90000.00, NULL, NULL),
(8, 22, 1, 2, 50000.00, 100000.00, NULL, NULL),
(9, 23, 2, 1, 30000.00, 30000.00, NULL, NULL),
(10, 24, 2, 1, 30000.00, 30000.00, '2025-04-10 01:26:23', '2025-04-10 01:26:23'),
(11, 25, 2, 1, 30000.00, 30000.00, '2025-04-10 01:27:35', '2025-04-10 01:27:35'),
(12, 25, 4, 1, 9000.00, 9000.00, '2025-04-10 01:27:35', '2025-04-10 01:27:35'),
(13, 26, 2, 11, 30000.00, 330000.00, '2025-04-10 18:23:34', '2025-04-10 18:23:34'),
(14, 26, 4, 12, 9000.00, 108000.00, '2025-04-10 18:23:34', '2025-04-10 18:23:34'),
(15, 26, 1, 14, 50000.00, 700000.00, '2025-04-10 18:23:34', '2025-04-10 18:23:34'),
(16, 26, 3, 15, 20000.00, 300000.00, '2025-04-10 18:23:34', '2025-04-10 18:23:34'),
(17, 27, 2, 2, 30000.00, 60000.00, '2025-04-10 18:26:33', '2025-04-10 18:26:33'),
(18, 27, 3, 2, 20000.00, 40000.00, '2025-04-10 18:26:33', '2025-04-10 18:26:33'),
(19, 28, 2, 3, 30000.00, 90000.00, '2025-04-10 18:27:54', '2025-04-10 18:27:54'),
(21, 39, 2, 1, 30000.00, 30000.00, '2025-04-24 00:14:38', '2025-04-24 00:14:38'),
(22, 39, 1, 1, 50000.00, 50000.00, '2025-04-24 00:14:38', '2025-04-24 00:14:38'),
(23, 40, 3, 1, 20000.00, 20000.00, '2025-04-24 00:15:02', '2025-04-24 00:15:02'),
(24, 40, 2, 1, 30000.00, 30000.00, '2025-04-24 00:15:02', '2025-04-24 00:15:02'),
(25, 40, 1, 1, 50000.00, 50000.00, '2025-04-24 00:15:02', '2025-04-24 00:15:02'),
(26, 41, 2, 1, 30000.00, 30000.00, '2025-04-24 00:36:55', '2025-04-24 00:36:55'),
(27, 42, 1, 1, 50000.00, 50000.00, '2025-04-24 01:26:13', '2025-04-24 01:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_photo`, `product_price`, `product_description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kue Pancong', 'product/Uu4RMWrArWjnEnqVlTx8fQtbh5MV6esKEDKSRQS5.png', 50000.00, 'Harga untuk 1 paket isi 10', 1, '2025-04-08 19:55:31', '2025-04-23 23:07:46'),
(2, 2, 'Soda Gembira', 'product/MbSlSTtKnyuOGJqAxLeCUITt7JBwBQYsWG1FQ96r.png', 30000.00, 'Minuman Soda', 1, '2025-04-08 20:16:27', '2025-04-23 23:08:02'),
(3, 1, 'Kue Balok', 'product/2F71PUx6ARr1sikDExEkhDNDgtDtiTanVtazJhJJ.png', 20000.00, 'Kue Balok isi 6 pcs', 1, '2025-04-08 23:30:37', '2025-04-23 23:08:46'),
(4, 2, 'Wedang Jahe', 'product/vRGkX4aGZ1Nc1SzJABNcVEAfi7Tlf0pdTHH4gsFF.png', 9000.00, 'Satu gelas air jahe', 1, '2025-04-08 23:34:36', '2025-04-23 23:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_bk`
--

CREATE TABLE `products_bk` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products_bk`
--

INSERT INTO `products_bk` (`id`, `categories_id`, `name`, `description`, `price`, `photo`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 1, 'adwaw\r\n', 'asdaw', 21312, '', 1, '2025-04-09 01:53:03', 0, '2025-04-09 02:05:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2025-04-23 18:55:05', '2025-04-23 18:55:05'),
(2, 'Kasir', '2025-04-23 18:55:53', '2025-04-23 18:55:53'),
(3, 'Pimpinan', '2025-04-23 18:56:07', '2025-04-23 19:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ia03B1FMLWOtfWQJuUUyjkpy7T7WoWsRPZ0JngD1', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibHFBMHFGMXJybmZvZGFPeFZSZ2E4UWQxQ1Z4MkRNeGlZdlJKQUtyaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6ImFsZXJ0IjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1745483173),
('ygszi99eVE8zoHrNyQAXPG8Iq28bUqTCSokBWoG7', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRnU2TGYzQmdnTFNoN1V3YWVxRkFoS3J1T0Vod1o3ZEhJSGlDbTRQQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYXBvcmFuLXBlbmp1YWxhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1745485029);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$ax3SH6QNklZveaYQ9IUiJ.0YLjoQEce3u1S2nx0d3jb9T3yXSVhAm', NULL, '2025-03-25 21:28:16', '2025-04-23 20:08:19'),
(4, 'Bima', 'bima@gmail.com', NULL, '$2y$12$dsy0yay31B4prBmfYf0tBul8dE6PzHNQQGkANdUkxYjZ7aSNu/9Uu', NULL, '2025-04-23 20:05:23', '2025-04-23 20:05:23'),
(5, 'Lukas', 'lukas@gmail.com', NULL, '$2y$12$JAluiYJVNL3DYK6lZlr.fuN2C7hvIv0BXbyi1U8rjRJhhjoGm2moe', NULL, '2025-04-23 20:07:56', '2025-04-23 20:15:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-04-24 02:42:42', NULL),
(2, 4, 2, '2025-04-23 20:05:23', '2025-04-23 20:05:23'),
(3, 5, 3, '2025-04-23 20:07:56', '2025-04-23 20:15:14'),
(4, 5, 3, '2025-04-23 20:13:05', '2025-04-23 20:15:14'),
(5, 5, 3, '2025-04-23 20:13:14', '2025-04-23 20:15:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories_bk`
--
ALTER TABLE `categories_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `others_details`
--
ALTER TABLE `others_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `products_bk`
--
ALTER TABLE `products_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories_bk`
--
ALTER TABLE `categories_bk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `others`
--
ALTER TABLE `others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `others_details`
--
ALTER TABLE `others_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products_bk`
--
ALTER TABLE `products_bk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
