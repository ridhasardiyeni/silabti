-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Sep 2019 pada 13.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silabti3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gbr_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_barang` enum('Baik','Rusak Ringan','Rusak Sedang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id_barang`, `nama_barang`, `gbr_barang`, `merk`, `stok_barang`, `satuan`, `kondisi_barang`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Mouse', '', 'Lenovo', 1, 'Buah', 'Baik', NULL, '2019-08-24 08:28:19', '2019-09-18 03:53:56'),
(6, 'Keyboard', '', 'logitec', 0, 'Buah', 'Rusak Ringan', NULL, '2019-09-12 06:08:00', '2019-09-17 16:39:16'),
(9, 'Node MCU', '70049-2019-09-18-05-41-12.jpg', 'Node MCU', 3, 'Buah', 'Baik', NULL, '2019-09-17 22:41:12', '2019-09-18 04:05:47'),
(10, 'PC Lenovo', '', 'Lenovo', 15, 'Unit', 'Baik', NULL, '2019-09-17 22:42:22', '2019-09-17 22:42:22'),
(11, 'PC Acer', '', 'Acer', 10, 'Unit', 'Baik', NULL, '2019-09-17 23:34:39', '2019-09-18 04:05:35'),
(12, 'PC HP', '', 'HP', 30, 'Unit', 'Baik', NULL, '2019-09-17 23:37:25', '2019-09-18 04:05:15'),
(13, 'Monitor HP', '', 'HP', 15, 'Unit', 'Baik', NULL, '2019-09-17 23:38:48', '2019-09-17 23:38:48'),
(14, 'Monitor Lenovo', '', 'Lenovo', 15, 'Unit', 'Baik', NULL, '2019-09-17 23:39:12', '2019-09-18 04:05:03'),
(15, 'Monitor ACer', '', 'Acer', 15, 'Unit', 'Baik', NULL, '2019-09-17 23:40:52', '2019-09-17 23:40:52'),
(16, 'Keyboard Acer', '', 'Acer', 10, 'Buah', 'Baik', NULL, '2019-09-17 23:43:20', '2019-09-17 23:43:20'),
(17, 'Keyboard HP', '', 'Acer', 9, 'Buah', 'Baik', NULL, '2019-09-17 23:45:54', '2019-09-18 04:15:11'),
(18, 'Mikrotik', '', 'Mikrotik', 6, 'Unit', 'Baik', NULL, '2019-09-17 23:53:20', '2019-09-18 04:04:49'),
(19, 'Switch', '', 'Switch', 7, 'Unit', 'Baik', NULL, '2019-09-18 00:04:01', '2019-09-18 04:04:37'),
(20, 'Switch 16 Port', '', 'Switch', 1, 'Unit', 'Baik', NULL, '2019-09-18 00:05:50', '2019-09-18 04:04:23'),
(21, 'CPU', '', 'CPU', 2, 'Unit', 'Baik', NULL, '2019-09-18 00:06:39', '2019-09-18 00:06:39'),
(22, 'Acces Point', '', 'Acces Point', 3, 'Unit', 'Baik', NULL, '2019-09-18 00:08:08', '2019-09-18 04:04:07'),
(23, 'Router Cisco', '', 'Router Cisco', 1, 'Unit', 'Baik', NULL, '2019-09-18 00:15:15', '2019-09-18 00:15:15'),
(24, 'Router Mikrotik', '', 'Router mikrotik', 2, 'Unit', 'Baik', NULL, '2019-09-18 00:43:43', '2019-09-18 00:43:43'),
(25, 'Kabel Jumper Male-Famele', '', 'Kabel Jumper Male-famele', 46, 'Buah', 'Baik', NULL, '2019-09-18 00:44:27', '2019-09-18 04:15:11'),
(26, 'Kabel Jumper Male-Male', '', 'Kabel Jumper Male-Male', 47, 'Buah', 'Baik', NULL, '2019-09-18 00:47:07', '2019-09-18 00:47:07'),
(27, 'Kabel Jumper Famele-Famele', '', 'Kabel Jumper Famele-famele', 47, 'Buah', 'Baik', NULL, '2019-09-18 00:48:30', '2019-09-18 00:48:30'),
(28, 'Node MCU', '', 'Node MCU', 2, 'Unit', 'Baik', NULL, '2019-09-18 00:53:59', '2019-09-18 00:53:59'),
(29, 'Project Board', '', 'Project Board', 5, 'Buah', 'Baik', NULL, '2019-09-18 00:55:18', '2019-09-18 00:55:18'),
(30, 'Solder', '', 'Solder', 1, 'Buah', 'Baik', NULL, '2019-09-18 00:57:31', '2019-09-18 00:57:31'),
(31, 'Sensor Ultrasonic', '', 'Sensor Ultrasonic', 3, 'Unit', 'Baik', NULL, '2019-09-18 01:03:05', '2019-09-18 01:03:05'),
(32, 'Arduino Uno', '', 'Arduino Uno', 4, 'Buah', 'Baik', NULL, '2019-09-18 01:03:55', '2019-09-18 01:03:55'),
(33, 'Kabel VGA', '', 'Kabel VGA', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:08:56', '2019-09-18 01:08:56'),
(34, 'Breadboard', '', 'Breadboard', 1, 'Unit', 'Baik', NULL, '2019-09-18 01:13:46', '2019-09-18 04:03:48'),
(35, 'Kabel USB', '', 'Kabel USB', 3, 'Buah', 'Baik', NULL, '2019-09-18 01:17:15', '2019-09-18 01:17:15'),
(36, 'Kabel Power', '', 'Kabel Power', 2, 'Buah', 'Baik', NULL, '2019-09-18 01:17:55', '2019-09-18 01:17:55'),
(37, 'Ethernet Shield', '', 'Ethernet Shield', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:23:58', '2019-09-18 01:23:58'),
(38, 'Raspberry pi', '', 'Respberry pi', 5, 'Buah', 'Baik', NULL, '2019-09-18 01:27:10', '2019-09-18 01:27:10'),
(39, 'Sensor DHT 11', '', 'Sensor DHT 11', 3, 'Buah', 'Baik', NULL, '2019-09-18 01:27:51', '2019-09-18 01:27:51'),
(40, 'Sensor Cahaya LDR', '', 'Sensor Cahaya LDR', 4, 'Buah', 'Baik', NULL, '2019-09-18 01:29:47', '2019-09-18 01:29:47'),
(41, 'Sensor PIR', '', 'Sensor PIR', 2, 'Buah', 'Baik', NULL, '2019-09-18 01:31:46', '2019-09-18 01:31:46'),
(42, 'Relay', '', 'Relay', 4, 'Buah', 'Baik', NULL, '2019-09-18 01:34:18', '2019-09-18 01:34:18'),
(43, 'Coverter VGA to HDMI', '', 'Coverter VGA to HDMI', 3, 'Buah', 'Baik', NULL, '2019-09-18 01:35:55', '2019-09-18 01:35:55'),
(44, 'Memory Card 32 GB', '', 'Memory Card 32 GB', 2, 'Buah', 'Baik', NULL, '2019-09-18 01:38:07', '2019-09-18 01:38:07'),
(45, 'Carmera  PI', '', 'Carmera  PI', 2, 'Buah', 'Baik', NULL, '2019-09-18 01:40:23', '2019-09-18 01:40:23'),
(46, 'Leap Motion', '', 'Leap Motion', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:41:16', '2019-09-18 01:41:16'),
(47, 'Fan Koputer', '', 'Fan Komputer', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:41:56', '2019-09-18 01:41:56'),
(48, 'Sensor Kelembaban Tanah', '', 'Sensor Kelembaban Tanah', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:43:34', '2019-09-18 01:43:34'),
(49, 'Sensor Kelembaban Tanah', '', 'Sensor Kelembaban Tanah', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:43:35', '2019-09-18 01:43:35'),
(50, 'Flow Meter', '', 'Flow Meter', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:44:34', '2019-09-18 01:44:34'),
(51, 'SD Card 32 GB+Adapter', '', 'SD Card 32 GB+Adapter', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:45:58', '2019-09-18 01:45:58'),
(52, 'Led', '', 'Led', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:48:14', '2019-09-18 01:48:14'),
(53, 'Webcam', '', 'Webcam', 1, 'Buah', 'Baik', NULL, '2019-09-18 01:50:20', '2019-09-18 01:50:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `details`
--

CREATE TABLE `details` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_trans` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `details`
--

INSERT INTO `details` (`id_detail`, `id_trans`, `id_barang`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 17, 1, 'pinjam', '2019-09-18 04:08:12', '2019-09-18 04:15:11'),
(6, 4, 25, 1, 'pinjam', '2019-09-18 04:08:12', '2019-09-18 04:15:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_24_052553_create_prodis_table', 2),
(4, '2019_08_24_064548_create_barangs_table', 3),
(5, '2019_08_24_153017_create_transaksis_table', 4),
(6, '2019_08_24_154129_create_transaksis_table', 5),
(7, '2019_08_28_033126_create_temporaries_table', 6),
(8, '2019_08_28_100732_create_temporaries_table', 7),
(9, '2016_06_01_000001_create_oauth_auth_codes_table', 8),
(10, '2016_06_01_000002_create_oauth_access_tokens_table', 8),
(11, '2016_06_01_000003_create_oauth_refresh_tokens_table', 8),
(12, '2016_06_01_000004_create_oauth_clients_table', 8),
(13, '2016_06_01_000005_create_oauth_personal_access_clients_table', 8),
(14, '2019_08_28_145033_create_temporaries_table', 9),
(15, '2019_08_28_155145_create_temps_table', 10),
(16, '2019_09_10_131053_create_trans_table', 11),
(17, '2019_09_10_132343_create_details_table', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('5b5a08956c646659a800ca001e2afb2580c4644aefbce2a69c481561502e947c7d9ca998d9a6ba83', 18, 1, 'nApp', '[]', 0, '2019-08-28 22:31:00', '2019-08-28 22:31:00', '2020-08-29 05:31:00'),
('93afb01e04f5909851a76b8d0aaacbe328734e269b13d72bff8c3b73d5e6ad047ccf04b6631d6f9c', 1, 1, 'nApp', '[]', 0, '2019-08-29 06:38:44', '2019-08-29 06:38:44', '2020-08-29 13:38:44'),
('a870f384f8513798f7c8d28b105b63b294c11dd8b16690f358c77548273bb3fa723904f55ab022ff', 10, 1, 'nApp', '[]', 0, '2019-08-28 22:31:07', '2019-08-28 22:31:07', '2020-08-29 05:31:07'),
('c83c14da04f6b56961d6b65d2f39ec1b6e9e3b574d0f2c2a9ac21fc9b364a714dc8508b59edcf633', 3, 1, 'nApp', '[]', 0, '2019-09-16 05:19:36', '2019-09-16 05:19:36', '2020-09-16 12:19:36'),
('d4d4364e1802e2cfa9a59e43ef989014dea4e9c74764c23b06930f6b8db97fc47e5b2e4085f8fe8e', 20, 1, 'nApp', '[]', 0, '2019-08-28 22:35:17', '2019-08-28 22:35:17', '2020-08-29 05:35:17'),
('e545e48908f1da47b8806325079c16113445dc99ade1d6683eb109a256398908f527d934a044f3e7', 18, 1, 'nApp', '[]', 0, '2019-08-28 21:10:40', '2019-08-28 21:10:40', '2020-08-29 04:10:40'),
('e728945a6174cdc356d70856e5d856578c99ef4fb270aeb6929dccd28b0fa563bc52cbdcc3776629', 18, 1, 'nApp', '[]', 0, '2019-08-28 21:07:18', '2019-08-28 21:07:18', '2020-08-29 04:07:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
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
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Umgzk9aMiI5kjJT9cwU5Avnvrpudif7heswB0OnA', 'http://localhost', 1, 0, 0, '2019-08-28 06:35:10', '2019-08-28 06:35:10'),
(2, NULL, 'Laravel Password Grant Client', 'dlrR0r3SUYE6yKkBlkkHXUrLXDFTejZzCqsVjlpK', 'http://localhost', 0, 1, 0, '2019-08-28 06:35:10', '2019-08-28 06:35:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-28 06:35:10', '2019-08-28 06:35:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id_prodi`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer', '2019-08-23 23:17:33', '2019-08-23 23:17:33'),
(2, 'Manajemen Informatika', '2019-08-23 23:17:44', '2019-08-23 23:17:44'),
(3, 'Teknik Rekayasa Perangkat Lunak', '2019-08-23 23:18:24', '2019-08-23 23:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `id_trans` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `status` enum('pending','pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trans`
--

INSERT INTO `trans` (`id_trans`, `kode_transaksi`, `user_id`, `tgl_pinjam`, `status`, `created_at`, `updated_at`) VALUES
(4, 'P00001', 1, '2019-09-18', 'pinjam', '2019-09-18 04:08:12', '2019-09-18 04:15:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('mahasiswa','dosen','kalab','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `id_prodi`, `gambar`, `aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ridha Sardiyeni', '1601091018', 'rsardiyeni@gmail.com', NULL, '$2y$10$ZGSyS.CMbwyJsf70x8jX4u3GDKWMUQzwCj141M5egKCvBtU2mA2ja', 'mahasiswa', 2, '39294-2019-08-31-07-43-08.jpg', '1', NULL, '2019-08-23 08:00:25', '2019-08-31 00:43:08'),
(3, 'Admin', '123', 'admin@gmail.com', NULL, '$2y$10$SI3Gm6iS3zBPRSJRzUh6EuWhvVLlIGX3LsJCXZMOFazvrwVkY6WJ.', 'admin', 2, '78843-2019-08-27-07-57-07.jpg', '1', NULL, '2019-08-23 08:41:34', '2019-08-27 00:57:07'),
(10, 'Rita Afriyeni', '12345', 'rita@gmail.com', NULL, '$2y$10$NYyMlaUsxzjDJYT7eAP37ukw/Wp.U1MKCCbabQwPzZFEELnePKQgy', 'kalab', 0, NULL, '1', NULL, '2019-08-23 22:19:05', '2019-08-23 22:19:05'),
(14, 'Yuhefizar', '197601132006041002', 'yuhefizar@pnp.ac.id', NULL, '$2y$10$f4JPsw7FzzC3cCFQR/91O.0D45OnWsVIFLRebmah8mjNugKMaNEhW', 'dosen', 2, NULL, '1', NULL, '2019-08-24 21:27:17', '2019-08-24 21:39:59'),
(16, 'Raemon Syaljumairi', '198407172010121002', 'raemon@pnp.ac.id', NULL, '$2y$10$oGO6UysR5zo5VpP43Xil9eR8UmjpkspSV.fM07RPpRaU.toyK5uti', 'admin', 1, '87994-2019-08-27-04-45-30.jpg', '1', NULL, '2019-08-26 21:43:50', '2019-09-17 22:12:37'),
(24, 'Nike Nelma Sari', '1601081015', 'nikenelmasari@gmail.com', NULL, '$2y$10$BSwTeNfZWuitceANDfZcXuj7GACUOmTWmFXtA3.BWNYlikfQ3G0Zm', 'mahasiswa', 1, NULL, '1', NULL, '2019-09-18 02:29:40', '2019-09-18 02:45:32'),
(25, 'Elman Berkat Perlindungan Hulu', '1601081045', 'elmanberkatperlindunganhulu@gamil.com', NULL, '$2y$10$Mt8obgdjfRB9YJcNrA53T.xKlqM2zzvVQM5kMsbIFPoJzBGYpGjlu', 'mahasiswa', 1, NULL, '1', NULL, '2019-09-18 02:32:16', '2019-09-18 02:47:11'),
(26, 'Adhitya Gading Pramana Agus', '1601081018', 'adhityagadingparamanaagus@gmail.com', NULL, '$2y$10$mhTzLItH3EP9H29k67G.MenHMGghzbHXGW/8l/bTy/iaxyV58p8TC', 'mahasiswa', 1, NULL, '1', NULL, '2019-09-18 02:36:07', '2019-09-18 02:46:41'),
(27, 'Riska Pramita', '1601081004', 'riskapramita@gmail.com', NULL, '$2y$10$7rIfgz0R2XVNbz3Z5JntAOLMTTAMPWcaNPKffRmTI/X.C29Qqhn2W', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:37:45', '2019-09-18 02:37:45'),
(28, 'Jansen Rahmadani Putra', '1601081040', 'jansenrahmadaniputra@gmail.com', NULL, '$2y$10$cgz9V926FtVcD9r65m5IzuZCrdX.KhzNsYba528kEkkr6t1MNg3cq', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:38:50', '2019-09-18 02:44:38'),
(29, 'Daniel Alfis', '1601082006', 'danielalfis@gmail.com', NULL, '$2y$10$3dUhsSC96ZcZS7fLbCQx/uw3wWhA2/E5kPZ/Pw6tW9434wvzQy6Yu', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:39:08', '2019-09-18 02:39:08'),
(30, 'Irfan Fahrehan', '1601082029', 'irfanfahreha@gamil.com', NULL, '$2y$10$dvi85/JP65FC5C.qtklSueLIwbqr1FAZ1EgPVLbPm.UloV707E8eK', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:40:41', '2019-09-18 02:40:41'),
(31, 'Mayumi Amanda', '1601081007', 'mayumiamanda@gmail.com', NULL, '$2y$10$CMqBkPkatHQZULkw7bDIhe7S3SZW4X8g2Ap/Xhc3XucpO8PJTpkvy', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:42:24', '2019-09-18 02:43:59'),
(32, 'Randa Audiva', '1601081025', 'randaaudiva@gmail.com', NULL, '$2y$10$6zuLILMdFnwOte8/wVPHc.LT6guwUeiDQqMLRANSnPrcBFHmYGcbC', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:42:28', '2019-09-18 02:42:28'),
(33, 'Oktavia Nirmala Afnelia', '1601082011', 'oktavianirmalaafnelia@gmail.com', NULL, '$2y$10$yrkI5lL9LEZWqr3q5cId1ux6T6KKX46miCEEEGQeP.m531yz25xt6', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:44:26', '2019-09-18 02:44:26'),
(34, 'Warid Alfalah Sawir', '160181017', 'waridalfalahsawir@gmail.com', NULL, '$2y$10$ImJBEa7XaeXV00r1XQxepuDkrTTJuTBuKgb1Dfmo1EPKkLwzAsRfq', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:44:51', '2019-09-18 02:53:54'),
(35, 'Deki Harizon', '1601081041', 'dekiharizon@gmail.com', NULL, '$2y$10$8nORryJt4YrU5yd9UBsiOOIp1yKRL.o6p8l3BCrWyAh8covLAd0eS', 'mahasiswa', 1, NULL, '0', NULL, '2019-09-18 02:45:39', '2019-09-18 02:45:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `details_id_trans_foreign` (`id_trans`),
  ADD KEY `details_id_barang_foreign` (`id_barang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `trans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `details`
--
ALTER TABLE `details`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id_prodi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trans`
--
ALTER TABLE `trans`
  MODIFY `id_trans` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `details_id_trans_foreign` FOREIGN KEY (`id_trans`) REFERENCES `trans` (`id_trans`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `trans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
