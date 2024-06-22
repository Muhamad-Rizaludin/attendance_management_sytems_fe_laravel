-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 07.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `kode_dosen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dosen` varchar(225) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `nama_dosen`, `created_at`, `updated_at`) VALUES
('12345', 'bachtiar', '2023-08-31 23:55:06.000000', '2023-08-31 23:55:06.000000'),
('kd_123', 'admin', '2023-09-21 11:42:20.000000', '2023-09-21 11:42:20.000000'),
('kd_1234', 'dadang', '2023-08-10 08:41:58.000000', '2023-08-10 08:41:58.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `kd_jadwal` varchar(225) NOT NULL,
  `kode_kelas` varchar(225) NOT NULL,
  `kode_mk` varchar(225) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `wajib_sks` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time(6) NOT NULL,
  `selesai` time(6) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`kd_jadwal`, `kode_kelas`, `kode_mk`, `nama_mk`, `wajib_sks`, `tanggal`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
('23_01_IF_001', 'K_001', 'IF_001', 'Pemrograman 1', '3', '2023-09-01', '14:43:00.000000', '14:43:00.000000', '2023-09-21 11:58:08.000000', '2023-09-21 11:58:08.000000'),
('23_01_IF_0013', 'K_003', 'IF_003', 'Pemrograman 3', '3', '2023-09-22', '13:00:00.000000', '15:10:00.000000', '2023-09-21 12:05:14.000000', '2023-09-21 12:05:14.000000'),
('23_01_IF_002', 'K_002', 'IF_002', 'Pemrograman 2', '3', '2023-09-01', '18:44:00.000000', '19:44:00.000000', '2023-09-21 11:57:27.000000', '2023-09-21 11:57:27.000000'),
('23_07_KD_0013', 'K_004', 'KD_0013', 'Metodelogi Penelitian', '3', '2023-09-22', '07:50:00.000000', '09:00:00.000000', '2023-09-21 12:03:56.000000', '2023-09-21 12:03:56.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `nama_mk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_dosen` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `kode_dosen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_mk`, `kode_mk`, `created_at`, `updated_at`, `nama_dosen`, `kode_dosen`) VALUES
('K_001', 'Pemrograman 1', 'IF_001', '2023-09-21 11:23:37', '2023-09-21 11:23:37', 'dadang', 'kd_1234'),
('K_002', 'Pemrograman 2', 'IF_002', '2023-09-21 11:24:28', '2023-09-21 11:24:28', 'dadang', 'kd_1234'),
('K_003', 'Pemrograman 3', 'IF_003', '2023-09-21 11:24:48', '2023-09-21 11:24:48', 'bachtiar', '12345'),
('K_004', 'Metodelogi Penelitian', 'KD_0013', '2023-09-21 12:03:35', '2023-09-21 12:03:35', 'dadang', 'kd_1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `kode_mk` varchar(225) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `sks` varchar(255) NOT NULL,
  `semester` varchar(225) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`kode_mk`, `nama_mk`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
('IF_001', 'Pemrograman 1', '3', '1', '2023-08-10 08:01:59.000000', '2023-08-10 08:01:59.000000'),
('IF_002', 'Pemrograman 2', '3', '1', '2023-09-21 11:25:08.000000', '2023-09-21 11:25:08.000000'),
('IF_003', 'Pemrograman 3', '3', '1', '2023-08-10 15:07:47.000000', '2023-08-10 15:07:47.000000'),
('KD_0012', 'Bahasa Indonesia', '2', '1', '2023-09-21 11:25:47.000000', '2023-09-21 11:25:47.000000'),
('KD_0013', 'Metodelogi Penelitian', '3', '7', '2023-09-21 11:26:19.000000', '2023-09-21 11:26:19.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(225) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `prodi` varchar(225) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `prodi`, `created_at`, `updated_at`) VALUES
('1219002', 'Handy', 'Teknik Informatika', '2023-08-31 23:43:41.000000', '2023-08-31 23:43:41.000000'),
('1219010', 'Muhamad Ardhan Hadina', 'Teknik Informatika', '2023-09-21 11:53:38.000000', '2023-09-21 11:53:38.000000'),
('1219016', 'Muhamad Rizaludin', 'Teknik Informatika', '2023-08-10 07:22:43.000000', '2023-08-10 07:22:43.000000'),
('1219019', 'Deva', 'Teknik Informatika', '2023-08-10 10:41:55.000000', '2023-08-10 10:41:55.000000'),
('3219004', 'Dwi Aprianti', 'Sistem Informasi', '2023-09-21 11:53:13.000000', '2023-09-21 11:53:13.000000'),
('3219017', 'Puput', 'Sistem Informasi', '2023-09-21 11:52:50.000000', '2023-09-21 11:52:50.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_matakuliah`
--

CREATE TABLE `mahasiswa_matakuliah` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_matakuliah`
--

INSERT INTO `mahasiswa_matakuliah` (`id`, `nim`, `nama_mhs`, `kode_mk`, `nama_mk`, `created_at`, `updated_at`) VALUES
(9, '1219016', 'Muhamad Rizaludin', 'IF_002', 'Pemrograman 2', '2023-09-01 04:43:46.000000', '2023-09-01 04:43:46.000000'),
(10, '3219004', 'Dwi Aprianti', 'IF_002', 'Pemrograman 2', '2023-09-22 20:20:13.000000', '2023-09-22 20:20:13.000000'),
(11, '3219017', 'Puput', 'KD_0013', 'Metodelogi Penelitian', '2023-09-21 11:54:36.000000', '2023-09-21 11:54:36.000000'),
(12, '3219004', 'Dwi Aprianti', 'IF_001', 'Pemrograman 1', '2023-09-21 12:29:51.000000', '2023-09-21 12:29:51.000000');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_01_032653_laratrust_setup_tables', 1),
(5, '2021_04_02_074802_create_karyawans_table', 1),
(6, '2021_04_02_080359_create_karyawan_models_table', 1),
(7, '2021_04_02_171555_create_jabatans_table', 1),
(8, '2021_04_02_171934_create_jabatan_models_table', 1),
(9, '2021_04_04_065254_create_jobdesks_table', 1),
(10, '2021_04_06_124554_create__reports_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(5, 'karyawans-create', 'Create Karyawans', 'Create Karyawans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(6, 'karyawans-read', 'Read Karyawans', 'Read Karyawans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(7, 'karyawans-update', 'Update Karyawans', 'Update Karyawans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(8, 'karyawans-delete', 'Delete Karyawans', 'Delete Karyawans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(9, 'jabatans-create', 'Create Jabatans', 'Create Jabatans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(10, 'jabatans-read', 'Read Jabatans', 'Read Jabatans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(11, 'jabatans-update', 'Update Jabatans', 'Update Jabatans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(12, 'jabatans-delete', 'Delete Jabatans', 'Delete Jabatans', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(13, 'jobdesks-create', 'Create Jobdesks', 'Create Jobdesks', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(14, 'jobdesks-read', 'Read Jobdesks', 'Read Jobdesks', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(15, 'jobdesks-update', 'Update Jobdesks', 'Update Jobdesks', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(16, 'jobdesks-delete', 'Delete Jobdesks', 'Delete Jobdesks', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(17, 'jobdeskdetails-create', 'Create Jobdeskdetails', 'Create Jobdeskdetails', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(18, 'jobdeskdetails-read', 'Read Jobdeskdetails', 'Read Jobdeskdetails', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(19, 'jobdeskdetails-update', 'Update Jobdeskdetails', 'Update Jobdeskdetails', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(20, 'jobdeskdetails-delete', 'Delete Jobdeskdetails', 'Delete Jobdeskdetails', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(21, 'profile-read', 'Read Profile', 'Read Profile', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(22, 'profile-update', 'Update Profile', 'Update Profile', '2023-08-06 22:32:34', '2023-08-06 22:32:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(6) NOT NULL,
  `nim` varchar(225) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `nama_mk` varchar(225) NOT NULL,
  `waktu_absen` timestamp(6) NULL DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nim`, `nama_mhs`, `nama_mk`, `waktu_absen`, `status`, `created_at`, `updated_at`) VALUES
(98, '1219016', 'Muhamad Rizaludin', 'Pemrograman 2', '2023-09-23 03:19:14.975851', 'Hadir', '2023-09-22 20:23:17.000000', '2023-09-22 20:23:17.000000'),
(99, '3219004', 'Dwi Aprianti', 'Pemrograman 2', NULL, 'Tidak Hadir', '2023-09-22 20:23:17.000000', '2023-09-22 20:23:17.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2023-08-06 22:32:34', '2023-08-06 22:32:34'),
(2, 'karyawan', 'Karyawan', 'Karyawan', '2023-08-06 22:32:34', '2023-08-06 22:32:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(2, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(2, 9, 'App\\Models\\User'),
(1, 10, 'App\\Models\\User'),
(2, 11, 'App\\Models\\User'),
(2, 12, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User'),
(2, 14, 'App\\Models\\User'),
(1, 16, 'App\\Models\\User'),
(1, 18, 'App\\Models\\User'),
(2, 19, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_dosen` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `kode_dosen`) VALUES
(3, 'dadang', 'dadang@gmail.com', '$2y$10$.v/PF7O8v.hNVfZS//yDDODAlCV/O055nLsDo2meSgI0vId6gPNsW', 'kJiWhAYeFyhirLxdMSosFqWisOFo4l32atRDI2TvjJQ8qtLxmmYYmDoXKcb1', '2023-08-07 05:28:34', '2023-08-07 05:28:34', 'kd_1234'),
(18, 'admin', 'admin@gmail.com', '$2y$10$yaDhypG/ygpaJmhQiWTv0e6Yp5IboYlWnh5ud/c2jkjrZWRiP3xAa', NULL, '2023-08-31 15:35:22', '2023-08-31 15:35:22', 'kd_123'),
(19, 'bachtiar', 'bachtiar@gmail.com', '$2y$10$Dp8487inN1p8F1X1xDCUkO/8T96o/MRgqNDjmDLhGLH9F5Ko9/3lq', NULL, '2023-08-31 23:55:36', '2023-08-31 23:55:36', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kode_dosen`) USING BTREE,
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `mahasiswa_matakuliah`
--
ALTER TABLE `mahasiswa_matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_matakuliah`
--
ALTER TABLE `mahasiswa_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `kurikulum` (`kode_mk`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`kode_mk`) REFERENCES `kurikulum` (`kode_mk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`kode_dosen`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa_matakuliah`
--
ALTER TABLE `mahasiswa_matakuliah`
  ADD CONSTRAINT `mahasiswa_matakuliah_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `mahasiswa_matakuliah_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `kurikulum` (`kode_mk`);

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`kode_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
