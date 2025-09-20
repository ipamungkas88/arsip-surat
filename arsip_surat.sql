-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2025 at 03:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pengarsipan` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `nomor_surat`, `kategori`, `judul`, `file_path`, `waktu_pengarsipan`, `created_at`, `updated_at`) VALUES
(9, 'no/coba/2025', 'Pengumuman', 'undangan Tasyakuran', 'arsip/1757904812_TGS.pdf', '2025-09-14 19:53:32', '2025-09-14 19:53:32', '2025-09-14 19:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman', 'Surat-surat yang terkait dengan pengumuman', '2025-09-14 04:45:41', '2025-09-14 06:30:55'),
(2, 'Undangan', 'Undangan rapat, koordinasi, dlsb.', '2025-09-14 04:45:41', '2025-09-14 18:16:36'),
(3, 'Nota Dinas', 'Nota dinas internal dan eksternal', '2025-09-14 04:45:41', '2025-09-14 04:45:41'),
(4, 'Pemberitahuan', 'Surat pemberitahuan resmi', '2025-09-14 04:45:41', '2025-09-14 04:45:41'),
(5, 'Surat Masuk', 'Kategori untuk surat masuk ke kantor desa', '2025-09-14 06:29:38', '2025-09-14 06:29:38'),
(6, 'Surat Keluar', 'Kategori untuk surat keluar dari kantor desa', '2025-09-14 06:29:38', '2025-09-14 06:29:38'),
(7, 'Surat Keputusan', 'Kategori untuk surat keputusan kepala desa', '2025-09-14 06:29:38', '2025-09-14 06:29:38'),
(8, 'Surat Masuk', 'Kategori untuk surat masuk ke kantor desa', '2025-09-14 19:43:47', '2025-09-14 19:43:47'),
(9, 'Surat Keluar', 'Kategori untuk surat keluar dari kantor desa', '2025-09-14 19:43:47', '2025-09-14 19:43:47'),
(10, 'Surat Keputusan', 'Kategori untuk surat keputusan kepala desa', '2025-09-14 19:43:47', '2025-09-14 19:43:47');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_14_112441_create_arsip_table', 1),
(5, '2025_09_14_114039_create_categories_table', 2),
(6, '2025_09_14_114057_create_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0xkB3uf6izFM9yRbibl1NyOFXeeXjDe14eLE8mUx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXNHbzJaSzVqMDFTdXV0blFpODRZVUQ3QVNTV2JuNHhFZ05INmx2TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcz9pZD1iMzU4MWFhZS00MzQyLTQ1YWUtODg4Zi1mYzhkZTk4OGUwZjImdnNjb2RlQnJvd3NlclJlcUlkPTE3NTc5MDI1MTQ0NzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757902514),
('39Y6wNNmWvH4mJvhU1GI8Nl0iqTF4rfImmjCvj2i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHJwOHhhYURKakxEeVIwZk5maFpUN0RIZDBoTWFPY3B4eEZRdlpCNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcy9jcmVhdGU/aWQ9MzJhZjZkOGYtNDNmMS00NDViLWJhNzUtNzUxODkwNWQ5ZTM4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3ODk3NTg2NDk4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757897586),
('6TgTeibj9u72kGWXVx9vuqMIGWQbRJ535gF1G8Jj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDZ3ZGE0S3BIcFdSYzFuMW1XQVpyeDNjWEVYMTN4VTVBR3ZnZEwxSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcz9pZD0zMmFmNmQ4Zi00M2YxLTQ0NWItYmE3NS03NTE4OTA1ZDllMzgmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTc4OTc2MjE4MzIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757897622),
('6YiLrGLswpHtlvvgzwnlz9jNzRyMuStzxyaz7Gy6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkJISEo2bG5uQlVhZFM2RXVVU0lWb2w1cUJIc3ZtZzhnZVVxSFhSRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAwOTk4NjI5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757900999),
('7iafCWMVzKi4DeqEcj5knnhjDd1extVAEtraBshG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk8zZngwc3hLalBjT2huQm9LSGx1WEhWc09sOXRPZGVuTTNBZ3VTVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757905603),
('7s5f8uUUc1xOeYxa02ITYV8ouGihIIcEHkQuEP8K', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXQ2SlhrQ0JxSzBZcE9yQ0dzMU1UYUpITENKdjhVRjdlNWl5WXZqUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvMT9pZD1jYTU1NTIyMS01MWNlLTQ5NmYtOGVjNi0wOGVmODZlYzRhNDYmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTc5MDExNzM0MDUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757901173),
('8r4ugKxcMqaufOrL4ZFKetml6SyObvpiE2EDLMdy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0tSVTBzNmxtMkRqRDg4WlFHVEFLS25QMG55dDlPTUowMHhOT0FqMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAwMTA2Njc4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757900107),
('9SqUyWS7fUoJoZJgbD25APFb8AZAGl8AX6wFACLy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVVJSm5FV2ZBZ1JPNjlUcDJXNmdhSk83Q1dCOUNpSDN4d1JvNFdjNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcy9jcmVhdGU/aWQ9MzJhZjZkOGYtNDNmMS00NDViLWJhNzUtNzUxODkwNWQ5ZTM4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3ODk3NTI4MTc3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757897528),
('BfGDTuKjkQtHnPJiSmxXlZmXWMKjz1gcurAAs33s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2lqT1diWmtISXBtdFl2RFVyeXhVZzNmTnQ4bDlRQzR6SzBHakVQciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvY3JlYXRlP2lkPWIzNTgxYWFlLTQzNDItNDVhZS04ODhmLWZjOGRlOTg4ZTBmMiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1NzkwMjUxODI0MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757902518),
('eJa7QLdCteHUcCMmFZDc9XFrOjj9sMPn1PIyYlYN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnBGRWhJVkRpZ0ZCZzVwYTh5a3dNUHhpRnJrR2VoZEtLZlA1bXJkeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcy9jcmVhdGU/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAxMTYzNjQ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757901164),
('EWZInrMbzC98wfSl9Trm0Ab02ViXCXAdmT6Vb3PN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTlPSjRrSWNkSVFXbTRINloyRUtsQlVjMlVHNXlNUmMzdVV5SDl2aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9YjM1ODFhYWUtNDM0Mi00NWFlLTg4OGYtZmM4ZGU5ODhlMGYyJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAxOTIxODU0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757901922),
('GRsOJFKGB4NPsHkwj6zOw4vKcTqzWWmfiaaE2HVi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTE1ZZEdwaHNOSUM2aEQxY2NuNzJRTUlMV0FnajNZT3djY3JDWXgyeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvMS9lZGl0P2lkPWNhNTU1MjIxLTUxY2UtNDk2Zi04ZWM2LTA4ZWY4NmVjNGE0NiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1NzkwMDExNDQ4MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757900114),
('IeJtlYFngYB6qGu3FJg9tKBu37qKPziWR3KPBBGx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGd0TWgxN2x0emhWZDUwNjFCa3AyVGR2QklVVllRUDJodWZOYkxMTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvMS9lZGl0P2lkPWNhNTU1MjIxLTUxY2UtNDk2Zi04ZWM2LTA4ZWY4NmVjNGE0NiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1NzkwMDA0MDAyMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757900040),
('L0XFpoL3auE4yzvSOzzjfB0RDUtJjK8gx5lawvEy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVNVTlduMkQwVXRiUHh6cnZoanVETUs5WWp0UFV5RVR0RFBPa2I5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcy8xL2VkaXQ/aWQ9MzJhZjZkOGYtNDNmMS00NDViLWJhNzUtNzUxODkwNWQ5ZTM4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3ODk3NTMxNDIwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757897532),
('lDWBrCg1sm74KBC9EJYOjX8CnLdN7WxtEf2tTDay', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3dZdXc3TEFPMnBKWEJ1MFN5TWZIaWNzNWVjOFhGVGRKZkEzT2phZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvMT9pZD1jYTU1NTIyMS01MWNlLTQ5NmYtOGVjNi0wOGVmODZlYzRhNDYmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTc5MDAwNTAzNDUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757900050),
('LIiMTBPWOYCfJA9HdYQYUMzYluZtVDtLpVnHw5wl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXFwYU9hQWtLa0twRWgxazd2bDB2QVpVZDZXUHMzNzBKVGZjcUlYVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWJvdXQ/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAxMTc3ODUyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757901178),
('LLWJnlWN2VbAJmx939fHYzv3eudhpIS7g4ox5dYb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUFLanB6NERvRGJQQUJ2MWdGOTdRZDRlbzE2Mkp4NGxMU0NPanB2QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvY3JlYXRlP2lkPWNhNTU1MjIxLTUxY2UtNDk2Zi04ZWM2LTA4ZWY4NmVjNGE0NiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1NzkwMDAyNTI5OCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757900025),
('LOGrvRTYy1aPhFo7vd0LiUhLUwyUReGgdMSfjCxH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVZoeFFFZ2NnTk0xZkd6bUFlZVlmRHdOOFVLNEQySjFGd1AxZ3dwTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9YjM1ODFhYWUtNDM0Mi00NWFlLTg4OGYtZmM4ZGU5ODhlMGYyJnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAyNTA4NTM3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757902509),
('NEri91dspFj9PDfclvtjwDNbKkP7RrnQh4SGxD86', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiems3SjZRN0p6ZzNSU1htSktzR0Z0dFlmUmJPNEVBSVA1R3BoUVpwVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAwMDIwNjM3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757900021),
('wC6IbKq0RfQjqLHNXf0HO4dhPjDn0pvIKEm4VRSj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2lpUWEzaUt0bThLdmxpMVF6YXRXbXUyZWhKR1BwdDU2aUNCVU9rMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/aWQ9Y2E1NTUyMjEtNTFjZS00OTZmLThlYzYtMDhlZjg2ZWM0YTQ2JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3OTAwMDM2MDg1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757900036),
('wEqR7936sedd86bLKUHIgqnISewAo95eaOd2WiGm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYW15TkNYU2lsTEpTSjhUb3Bpb2ZwdkZ0ZFlHd3R2UXQ1TmZMMHYwbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcz9pZD1jYTU1NTIyMS01MWNlLTQ5NmYtOGVjNi0wOGVmODZlYzRhNDYmdnNjb2RlQnJvd3NlclJlcUlkPTE3NTc5MDEwMDIyMjYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757901002),
('yebvU7qomTzbbcFPhr0WZD6gi74nOiTzm8p2Z2m3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnFCMXR6YVRIb3haU0FhOGFhWHFOZ1V3VllxOTJIM2xjOERCeDB5eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2F0ZWdvcmllcy9jcmVhdGU/aWQ9MzJhZjZkOGYtNDNmMS00NDViLWJhNzUtNzUxODkwNWQ5ZTM4JnZzY29kZUJyb3dzZXJSZXFJZD0xNzU3ODk3NjA3NDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757897608),
('Z1JlaNw4hBnDqIrmtqvQBM6W2mt4EbFApy3AZ2LH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.104.0 Chrome/138.0.7204.235 Electron/37.3.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFVyRlBDd3pLVTBQSzRJYlBQWnUwMmRwbmw3M0tIdWtmVjNuYmVhWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXJzaXAvY3JlYXRlP2lkPWNhNTU1MjIxLTUxY2UtNDk2Zi04ZWM2LTA4ZWY4NmVjNGE0NiZ2c2NvZGVCcm93c2VyUmVxSWQ9MTc1NzkwMTE3MDE5MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757901170),
('zkXB1SlpiWDxrAnn6cxuAZFJmQI9dik2dvSRE6Sx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjN4UmNRZEoyUVpQQVFrR2lsUTRORUw0U3FCS0pzejR6emI4T2NKMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757902597);

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
(1, 'Test User', 'test@example.com', '2025-09-14 19:41:56', '$2y$12$oEPI/hcMOnYb59O8fjLqpeJNorLs7rFTqIZdwtsLLEjHGD0.XM8w6', 'BjRC480Ocw', '2025-09-14 19:41:56', '2025-09-14 19:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `arsip_nomor_surat_unique` (`nomor_surat`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
