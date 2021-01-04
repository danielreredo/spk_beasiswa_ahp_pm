-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2020 pada 06.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `facs`
--

CREATE TABLE `facs` (
  `id_fac` bigint(20) UNSIGNED NOT NULL,
  `nm_fac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `per` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facs`
--

INSERT INTO `facs` (`id_fac`, `nm_fac`, `persen`, `created_at`, `updated_at`, `per`) VALUES
(1, 'Core Factor', 60, '2020-09-05 17:36:57', '2020-09-05 17:36:57', 1),
(2, 'Secondary Factor', 40, '2020-09-05 17:36:57', '2020-09-05 17:36:57', 1),
(3, 'Core Factor', 55, '2020-09-05 18:00:00', '2020-09-05 18:00:11', 2),
(4, 'Secondary Factor', 45, '2020-09-05 18:00:00', '2020-09-05 18:00:11', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `faks`
--

CREATE TABLE `faks` (
  `id_fak` bigint(20) UNSIGNED NOT NULL,
  `nm_fak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faks`
--

INSERT INTO `faks` (`id_fak`, `nm_fak`, `created_at`, `updated_at`) VALUES
(1, 'TEKNIK', '2020-07-20 18:00:21', '2020-07-20 18:00:21'),
(2, 'FMIPA', '2020-07-22 20:34:34', '2020-07-22 20:34:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keps`
--

CREATE TABLE `keps` (
  `nm_kep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angka` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keps`
--

INSERT INTO `keps` (`nm_kep`, `angka`, `created_at`, `updated_at`) VALUES
('Cukup Penting', 3, NULL, NULL),
('Lebih Penting', 5, NULL, NULL),
('Mendekati Cukup Penting', 2, NULL, NULL),
('Mendekati Lebih Penting', 4, NULL, NULL),
('Mendekati Mutlak Lebih Penting', 8, NULL, NULL),
('Mendekati Sangat Lebih Penting', 6, NULL, NULL),
('Mutlak Lebih Penting', 9, NULL, NULL),
('Sama Penting', 1, NULL, NULL),
('Sangat Lebih Penting', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kets`
--

CREATE TABLE `kets` (
  `k1` bigint(20) UNSIGNED NOT NULL,
  `k2` bigint(20) UNSIGNED NOT NULL,
  `kep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kets`
--

INSERT INTO `kets` (`k1`, `k2`, `kep`, `per`) VALUES
(1, 2, 'Mendekati Cukup Penting', 1),
(1, 3, 'Cukup Penting', 1),
(2, 3, 'Mendekati Cukup Penting', 1),
(1, 4, 'Mendekati Lebih Penting', 1),
(2, 4, 'Cukup Penting', 1),
(3, 4, 'Cukup Penting', 1),
(1, 5, 'Lebih Penting', 1),
(2, 5, 'Mendekati Lebih Penting', 1),
(3, 5, 'Cukup Penting', 1),
(4, 5, 'Mendekati Cukup Penting', 1),
(1, 6, 'Mendekati Sangat Lebih Penting', 1),
(2, 6, 'Lebih Penting', 1),
(3, 6, 'Lebih Penting', 1),
(4, 6, 'Mendekati Cukup Penting', 1),
(5, 6, 'Mendekati Cukup Penting', 1),
(7, 8, 'Cukup Penting', 2),
(7, 9, 'Mendekati Cukup Penting', 2),
(8, 9, 'Cukup Penting', 2),
(7, 10, 'Mendekati Lebih Penting', 2),
(8, 10, 'Mendekati Lebih Penting', 2),
(9, 10, 'Cukup Penting', 2),
(7, 11, 'Lebih Penting', 2),
(8, 11, 'Lebih Penting', 2),
(9, 11, 'Mendekati Lebih Penting', 2),
(10, 11, 'Mendekati Cukup Penting', 2),
(7, 12, 'Sama Penting', 2),
(8, 12, 'Sama Penting', 2),
(9, 12, 'Sama Penting', 2),
(10, 12, 'Sama Penting', 2),
(11, 12, 'Sama Penting', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kris`
--

CREATE TABLE `kris` (
  `id_kri` bigint(20) UNSIGNED NOT NULL,
  `nm_kri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `per` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kris`
--

INSERT INTO `kris` (`id_kri`, `nm_kri`, `fac`, `created_at`, `updated_at`, `per`) VALUES
(1, 'IPK', 1, '2020-09-05 17:38:10', '2020-09-05 17:38:10', 1),
(2, 'Tingkat Prestasi', 1, '2020-09-05 17:38:33', '2020-09-05 17:38:33', 1),
(3, 'Penghasilan Orang Tua', 1, '2020-09-05 17:38:43', '2020-09-05 17:38:43', 1),
(4, 'Aktif Organisasi (Intra Kampus)', 2, '2020-09-05 17:39:44', '2020-09-05 17:39:44', 1),
(5, 'Pekerjaan Orang Tua', 2, '2020-09-05 17:40:13', '2020-09-05 17:40:13', 1),
(6, 'Wawancara', 2, '2020-09-05 17:40:30', '2020-09-05 17:40:30', 1),
(7, 'Dampak Covid', 3, '2020-09-05 18:00:49', '2020-09-05 18:00:49', 2),
(8, 'Semester', 3, '2020-09-05 18:01:01', '2020-09-05 18:01:01', 2),
(9, 'IPK', 3, '2020-09-05 18:01:24', '2020-09-05 18:01:24', 2),
(10, 'Jarak Rumah', 4, '2020-09-05 18:01:43', '2020-09-05 18:01:43', 2),
(11, 'Tanggungan Orang Tua', 4, '2020-09-05 18:01:53', '2020-09-05 18:01:53', 2),
(12, 'Ikut Ormek', 4, '2020-09-06 02:24:52', '2020-09-06 02:24:52', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahs`
--

CREATE TABLE `mahs` (
  `id_mah` bigint(20) UNSIGNED NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_mah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro` bigint(20) UNSIGNED NOT NULL,
  `per` bigint(20) UNSIGNED NOT NULL,
  `jk_mah` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahs`
--

INSERT INTO `mahs` (`id_mah`, `npm`, `nm_mah`, `pro`, `per`, `jk_mah`, `created_at`, `updated_at`) VALUES
(1, '1412160009', 'Daniel Reredo', 1, 1, 'Laki-laki', '2020-09-05 17:45:21', '2020-09-05 17:45:21'),
(2, '1234512345', 'Ach Budi', 1, 1, 'Laki-laki', '2020-09-05 17:48:41', '2020-09-05 17:49:57'),
(3, '1412160031', 'Ita P', 1, 1, 'Perempuan', '2020-09-05 17:50:27', '2020-09-05 17:50:27'),
(4, '1412160026', 'Riska E', 1, 1, 'Perempuan', '2020-09-05 17:51:26', '2020-09-05 17:51:26'),
(5, '1231234121', 'Ratih A', 1, 1, 'Perempuan', '2020-09-05 17:52:59', '2020-09-05 17:53:09'),
(6, '1231231234', 'Kiki L', 1, 1, 'Perempuan', '2020-09-05 17:54:18', '2020-09-05 17:54:18'),
(7, '1234123123', 'Iqbal', 1, 1, 'Laki-laki', '2020-09-05 17:55:56', '2020-09-05 17:55:56'),
(8, '5432112345', 'Aris Eko', 1, 1, 'Laki-laki', '2020-09-05 17:56:55', '2020-09-05 17:56:55'),
(9, '1234561234', 'Jono', 1, 2, 'Laki-laki', '2020-09-05 18:03:35', '2020-09-05 18:03:35'),
(10, '5432160987', 'Joni', 1, 2, 'Laki-laki', '2020-09-05 18:04:42', '2020-09-05 18:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2020_07_16_144620_create_table_faks', 1),
(53, '2020_07_17_121722_create_pros_table', 1),
(54, '2020_07_19_081036_create_facs_table', 1),
(55, '2020_07_19_081128_create_kris_table', 1),
(56, '2020_07_20_232755_create_opes_table', 2),
(57, '2020_07_24_031720_create_pers_table', 3),
(59, '2020_07_24_085646_create_mahs_table', 4),
(60, '2020_07_26_062320_create_skor_kris_table', 5),
(72, '2020_08_03_035047_create_keps_table', 6),
(73, '2020_08_03_035338_create_kets_table', 6),
(75, '2020_08_08_065021_add_persen_on_facs_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opes`
--

CREATE TABLE `opes` (
  `id_ope` bigint(20) UNSIGNED NOT NULL,
  `nm_ope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_ope` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opes`
--

INSERT INTO `opes` (`id_ope`, `nm_ope`, `nidn`, `jk_ope`, `pro`, `user`, `created_at`, `updated_at`) VALUES
(6, 'Andik Adi Suryanto S.kom M.kom', '14121600009', 'Laki-laki', 1, 17, '2020-07-23 08:34:57', '2020-08-22 03:24:08'),
(8, 'Daniel Reredo', '14121600000', 'Laki-laki', 2, 19, '2020-10-15 21:27:34', '2020-10-15 21:27:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pers`
--

CREATE TABLE `pers` (
  `id_per` bigint(20) UNSIGNED NOT NULL,
  `per` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pers`
--

INSERT INTO `pers` (`id_per`, `per`, `created_at`, `updated_at`) VALUES
(1, 2020, '2020-09-05 17:36:57', '2020-09-05 17:36:57'),
(2, 2021, '2020-09-05 18:00:00', '2020-09-05 18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pros`
--

CREATE TABLE `pros` (
  `id_pro` bigint(20) UNSIGNED NOT NULL,
  `nm_pro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fak` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pros`
--

INSERT INTO `pros` (`id_pro`, `nm_pro`, `fak`, `created_at`, `updated_at`) VALUES
(1, 'INFORMATIKA', 1, '2020-07-20 18:04:58', '2020-08-15 21:44:44'),
(2, 'INDUSTRI', 1, '2020-07-22 22:47:29', '2020-07-22 22:47:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_kris`
--

CREATE TABLE `skor_kris` (
  `id_skor_kri` bigint(20) UNSIGNED NOT NULL,
  `kri` bigint(20) UNSIGNED NOT NULL,
  `mah` bigint(20) UNSIGNED NOT NULL,
  `skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skor_kris`
--

INSERT INTO `skor_kris` (`id_skor_kri`, `kri`, `mah`, `skor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 60, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(2, 2, 1, 20, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(3, 3, 1, 100, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(4, 4, 1, 100, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(5, 5, 1, 30, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(6, 6, 1, 70, '2020-09-05 17:45:21', '2020-09-05 17:47:35'),
(7, 1, 2, 60, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(8, 2, 2, 20, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(9, 3, 2, 100, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(10, 4, 2, 40, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(11, 5, 2, 45, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(12, 6, 2, 70, '2020-09-05 17:48:41', '2020-09-06 02:21:52'),
(13, 1, 3, 80, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(14, 2, 3, 20, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(15, 3, 3, 100, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(16, 4, 3, 100, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(17, 5, 3, 30, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(18, 6, 3, 80, '2020-09-05 17:50:27', '2020-09-05 17:51:03'),
(19, 1, 4, 80, '2020-09-05 17:51:26', '2020-09-05 17:52:11'),
(20, 2, 4, 20, '2020-09-05 17:51:26', '2020-09-05 17:52:11'),
(21, 3, 4, 100, '2020-09-05 17:51:27', '2020-09-05 17:52:11'),
(22, 4, 4, 20, '2020-09-05 17:51:27', '2020-09-05 17:52:12'),
(23, 5, 4, 30, '2020-09-05 17:51:27', '2020-09-05 17:52:12'),
(24, 6, 4, 70, '2020-09-05 17:51:27', '2020-09-05 17:52:12'),
(25, 1, 5, 80, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(26, 2, 5, 20, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(27, 3, 5, 100, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(28, 4, 5, 20, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(29, 5, 5, 45, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(30, 6, 5, 80, '2020-09-05 17:52:59', '2020-09-05 17:53:51'),
(31, 1, 6, 60, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(32, 2, 6, 20, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(33, 3, 6, 100, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(34, 4, 6, 40, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(35, 5, 6, 45, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(36, 6, 6, 80, '2020-09-05 17:54:18', '2020-09-05 17:55:00'),
(37, 1, 7, 60, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(38, 2, 7, 20, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(39, 3, 7, 100, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(40, 4, 7, 40, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(41, 5, 7, 45, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(42, 6, 7, 80, '2020-09-05 17:55:57', '2020-09-05 17:56:34'),
(43, 1, 8, 60, '2020-09-05 17:56:55', '2020-09-05 17:57:38'),
(44, 2, 8, 20, '2020-09-05 17:56:56', '2020-09-05 17:57:38'),
(45, 3, 8, 100, '2020-09-05 17:56:56', '2020-09-05 17:57:38'),
(46, 4, 8, 40, '2020-09-05 17:56:56', '2020-09-05 17:57:38'),
(47, 5, 8, 45, '2020-09-05 17:56:56', '2020-09-05 17:57:39'),
(48, 6, 8, 75, '2020-09-05 17:56:56', '2020-09-05 17:57:39'),
(49, 7, 9, 80, '2020-09-05 18:03:35', '2020-09-05 18:04:08'),
(50, 8, 9, 75, '2020-09-05 18:03:35', '2020-09-05 18:04:08'),
(51, 9, 9, 60, '2020-09-05 18:03:35', '2020-09-05 18:04:08'),
(52, 10, 9, 80, '2020-09-05 18:03:35', '2020-09-05 18:04:08'),
(53, 11, 9, 70, '2020-09-05 18:03:35', '2020-09-05 18:04:08'),
(54, 7, 10, 80, '2020-09-05 18:04:42', '2020-09-05 18:05:06'),
(55, 8, 10, 50, '2020-09-05 18:04:42', '2020-09-05 18:05:06'),
(56, 9, 10, 60, '2020-09-05 18:04:42', '2020-09-05 18:05:06'),
(57, 10, 10, 70, '2020-09-05 18:04:42', '2020-09-05 18:05:06'),
(58, 11, 10, 80, '2020-09-05 18:04:42', '2020-09-05 18:05:06'),
(59, 12, 9, 0, '2020-09-06 02:24:53', '2020-09-06 02:24:53'),
(60, 12, 10, 0, '2020-09-06 02:24:53', '2020-09-06 02:24:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `username_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Daniel Reredo', 'admin', NULL, '$2y$10$/sU7TZeZn6FlJFfWqOy4FOgy29glnByHGMmAKG.FFvenwryCaVfFy', NULL, '2020-07-19 21:52:21', '2020-09-06 18:19:12'),
(17, 'operator', 'Andik Adi Suryanto S.kom M.kom', '14121600009', NULL, '$2y$10$yLn6bwloitpBDdx19GQFb.LlS4BmvSWarrqCYmOSP1ZFlOImZNfM.', NULL, '2020-07-23 08:34:57', '2020-08-22 03:24:08'),
(19, 'operator', 'Daniel Reredo', '14121600000', NULL, '$2y$10$B8YDUdqnvRpB/qoOZmkJ0eftaOyvcDIjsg6DIcNHPSC9xGk5HoCXO', NULL, '2020-10-15 21:27:34', '2020-10-15 21:27:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `facs`
--
ALTER TABLE `facs`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `per` (`per`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faks`
--
ALTER TABLE `faks`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indeks untuk tabel `keps`
--
ALTER TABLE `keps`
  ADD PRIMARY KEY (`nm_kep`);

--
-- Indeks untuk tabel `kets`
--
ALTER TABLE `kets`
  ADD KEY `kets_k1_foreign` (`k1`),
  ADD KEY `kets_k2_foreign` (`k2`),
  ADD KEY `kets_kep_foreign` (`kep`),
  ADD KEY `per` (`per`);

--
-- Indeks untuk tabel `kris`
--
ALTER TABLE `kris`
  ADD PRIMARY KEY (`id_kri`),
  ADD KEY `kris_fac_foreign` (`fac`);

--
-- Indeks untuk tabel `mahs`
--
ALTER TABLE `mahs`
  ADD PRIMARY KEY (`id_mah`),
  ADD KEY `mahs_pro_foreign` (`pro`),
  ADD KEY `mahs_per_foreign` (`per`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opes`
--
ALTER TABLE `opes`
  ADD PRIMARY KEY (`id_ope`),
  ADD KEY `opes_pro_foreign` (`pro`),
  ADD KEY `opes_user_foreign` (`user`);

--
-- Indeks untuk tabel `pers`
--
ALTER TABLE `pers`
  ADD PRIMARY KEY (`id_per`);

--
-- Indeks untuk tabel `pros`
--
ALTER TABLE `pros`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `pros_fak_foreign` (`fak`);

--
-- Indeks untuk tabel `skor_kris`
--
ALTER TABLE `skor_kris`
  ADD PRIMARY KEY (`id_skor_kri`),
  ADD KEY `skor_kris_kri_foreign` (`kri`),
  ADD KEY `skor_kris_mah_foreign` (`mah`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `facs`
--
ALTER TABLE `facs`
  MODIFY `id_fac` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faks`
--
ALTER TABLE `faks`
  MODIFY `id_fak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kris`
--
ALTER TABLE `kris`
  MODIFY `id_kri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mahs`
--
ALTER TABLE `mahs`
  MODIFY `id_mah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `opes`
--
ALTER TABLE `opes`
  MODIFY `id_ope` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pers`
--
ALTER TABLE `pers`
  MODIFY `id_per` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pros`
--
ALTER TABLE `pros`
  MODIFY `id_pro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `skor_kris`
--
ALTER TABLE `skor_kris`
  MODIFY `id_skor_kri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `facs`
--
ALTER TABLE `facs`
  ADD CONSTRAINT `facs_ibfk_1` FOREIGN KEY (`per`) REFERENCES `pers` (`id_per`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kets`
--
ALTER TABLE `kets`
  ADD CONSTRAINT `kets_ibfk_1` FOREIGN KEY (`per`) REFERENCES `pers` (`id_per`) ON DELETE CASCADE,
  ADD CONSTRAINT `kets_k1_foreign` FOREIGN KEY (`k1`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  ADD CONSTRAINT `kets_k2_foreign` FOREIGN KEY (`k2`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  ADD CONSTRAINT `kets_kep_foreign` FOREIGN KEY (`kep`) REFERENCES `keps` (`nm_kep`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kris`
--
ALTER TABLE `kris`
  ADD CONSTRAINT `kris_fac_foreign` FOREIGN KEY (`fac`) REFERENCES `facs` (`id_fac`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahs`
--
ALTER TABLE `mahs`
  ADD CONSTRAINT `mahs_per_foreign` FOREIGN KEY (`per`) REFERENCES `pers` (`id_per`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahs_pro_foreign` FOREIGN KEY (`pro`) REFERENCES `pros` (`id_pro`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `opes`
--
ALTER TABLE `opes`
  ADD CONSTRAINT `opes_pro_foreign` FOREIGN KEY (`pro`) REFERENCES `pros` (`id_pro`) ON DELETE CASCADE,
  ADD CONSTRAINT `opes_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pros`
--
ALTER TABLE `pros`
  ADD CONSTRAINT `pros_fak_foreign` FOREIGN KEY (`fak`) REFERENCES `faks` (`id_fak`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_kris`
--
ALTER TABLE `skor_kris`
  ADD CONSTRAINT `skor_kris_kri_foreign` FOREIGN KEY (`kri`) REFERENCES `kris` (`id_kri`) ON DELETE CASCADE,
  ADD CONSTRAINT `skor_kris_mah_foreign` FOREIGN KEY (`mah`) REFERENCES `mahs` (`id_mah`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
