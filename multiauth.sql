-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 09.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

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
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KodeJabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaJabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `KodeJabatan`, `NamaJabatan`, `Deskripsi`, `created_at`, `updated_at`) VALUES
(25, 'KJ001', 'Ketua BPH', 'Ketua BPH : Louis Frederick, S.E., S.H., M.M.', NULL, NULL),
(26, 'KJ002', 'Ketua STMIK Bandung', 'Ketua STMIK Bandung : Dr. Abdurrahman, S.Kom., M.T.', NULL, NULL),
(27, 'KJ003', 'Wakil Ketua I', 'Wakil Ketua I : Dr. Cecep Wahyu Hoerudin, M.Pd', NULL, NULL),
(28, 'KJ004', 'Wakil Ketua II', 'Wakil Ketua II : Linda Apriyanti, S.Kom., M.T.', NULL, NULL),
(29, 'KJ005', 'Wakil Ketua III', 'Wakil Ketua III : Yus Jayusman, S.Kom., M.T.', NULL, NULL),
(30, 'KJ006', 'Ketua Prodi IF', 'Ketua Prodi IF : Dadi Permadi, S.T., M.T.', NULL, NULL),
(31, 'KJ007', 'Ketua Prodi SI', 'Ketua Prodi SI : Siti Yulianti S.T., M.Kom', NULL, NULL),
(32, 'KJ008', 'Ketua SPMI', 'Ketua SPMI : Mina Ismu Rahayu, S.T., M.T.', NULL, NULL),
(33, 'KJ009', 'Staff SPMI', 'Staff SPMI : Dedy Apriadi, M.Si.', NULL, NULL),
(34, 'KJ0010', 'Ketua LPPM', 'Ketua LPPM : Rini Nuraini Sukmana, S.T., M.T', NULL, NULL),
(35, 'KJ0011', 'Wk. LPPM', 'Wk. LPPM : Dani Pradana, M.T.', NULL, NULL),
(36, 'KJ0012', 'Ketua PSDI', 'Ketua PSDI : Indra Maulana Yusuf K, S.T., M.Kom.', NULL, NULL),
(37, 'KJ0013', 'Staff PSDI', 'Staff PSDI : Mujiwanto, S.T. ,  Agus Riyadi, S.T', NULL, NULL),
(38, 'KJ0014', 'Kabag. Perpustakaan', 'Kabag. Perpustakaan : Subhan, S.Ag.', NULL, NULL),
(39, 'KJ0015', 'Staff Keuangan', 'Staff Keuangan : Siti Fatimah, S.Kom. : Salsabila Audina', NULL, NULL),
(40, 'KJ0016', 'Customer Service', 'Customer Service : Indriyani Shufyanti (FO) : Kafi Rohman Syahid (Akademik)', NULL, NULL),
(41, 'KJ0017', 'Ka. Building Maintenance', 'Ka. Building Maintenance', NULL, NULL),
(42, 'KJ0018', 'Building Maintenance', 'Building Maintenance : Sumaedi, S.Kom., Ermaya, Supardi', NULL, NULL),
(43, 'KJ0019', 'Keamanan', 'Keamanan : Hanafi, Bambang', NULL, NULL),
(44, 'KJ0020', 'Pembantu Umum', 'Pembantu Umum : M. Fahmi Nurul Huda', NULL, NULL),
(45, 'KJ0021', 'Lainnya', 'Ini untuk karyawan atau dosen yang tidak mempunyai jabatan struktural', NULL, NULL),
(46, 'KJ0022', 'Dosen', 'Dosen STMIK Bandung', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_models`
--

CREATE TABLE `jabatan_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobdesks`
--

CREATE TABLE `jobdesks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KodeJobdesk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaJobdesk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jobdesks`
--

INSERT INTO `jobdesks` (`id`, `KodeJobdesk`, `NamaJobdesk`, `created_at`, `updated_at`) VALUES
(7, 'Job00', 'Lainnya', NULL, NULL),
(8, 'Job001', 'Pengajaran', NULL, NULL),
(9, 'Job002', 'Penelitan', NULL, NULL),
(10, 'Job003', 'PKM', NULL, NULL),
(11, 'Job004', 'Pengelolaan Data Akademik', NULL, NULL),
(12, 'Job005', 'Pengelolaan Data Mahasiswa', NULL, NULL),
(13, 'Job006', 'Pengelolaan Data Alumni', NULL, NULL),
(14, 'Job007', 'Pengelolaan Keuangan', NULL, NULL),
(15, 'Job008', 'Pengelolaan Sistem Informasi', NULL, NULL),
(16, 'Job009', 'Pengelolaan Infrastruktur', NULL, NULL),
(17, 'Job0010', 'Pengelolaan SDM', NULL, NULL),
(18, 'Job0011', 'Pengelolaan Penjaminan Mutu', NULL, NULL),
(19, 'Job0012', 'Administrasi Akademik (Sidang/Skripsi/KRS/dll)', NULL, NULL),
(20, 'Job0013', 'Kepanitiaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NoKaryawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKaryawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobdesk` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `NoKaryawan`, `NamaKaryawan`, `alamat`, `JenisKelamin`, `foto`, `created_at`, `updated_at`, `jabatan`, `jobdesk`) VALUES
(10, '1219002', 'Gerry Skom', 'cipacing', 'Laki-Laki', '1620466183.jpg', NULL, NULL, 'Ketua LPPM', 'Penelitan'),
(11, '1219016', 'Muhamad Rizaludin', 'cipacing', 'Laki-Laki', '1629555600.png', NULL, NULL, 'Wakil Ketua I', 'Administrasi Akademik (Sidang/Skripsi/KRS/dll)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_models`
--

CREATE TABLE `karyawan_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2021_04_01_032653_laratrust_setup_tables', 2),
(13, '2021_04_02_074802_create_karyawans_table', 3),
(14, '2021_04_02_080359_create_karyawan_models_table', 3),
(15, '2021_04_02_171555_create_jabatans_table', 3),
(16, '2021_04_02_171934_create_jabatan_models_table', 3),
(17, '2021_04_04_065254_create_jobdesks_table', 4),
(18, '2021_04_06_124554_create__reports_table', 5);

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
(1, 'users-create', 'Create Users', 'Create Users', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(5, 'karyawans-create', 'Create Karyawans', 'Create Karyawans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(6, 'karyawans-read', 'Read Karyawans', 'Read Karyawans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(7, 'karyawans-update', 'Update Karyawans', 'Update Karyawans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(8, 'karyawans-delete', 'Delete Karyawans', 'Delete Karyawans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(9, 'jabatans-create', 'Create Jabatans', 'Create Jabatans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(10, 'jabatans-read', 'Read Jabatans', 'Read Jabatans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(11, 'jabatans-update', 'Update Jabatans', 'Update Jabatans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(12, 'jabatans-delete', 'Delete Jabatans', 'Delete Jabatans', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(13, 'jobdesks-create', 'Create Jobdesks', 'Create Jobdesks', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(14, 'jobdesks-read', 'Read Jobdesks', 'Read Jobdesks', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(15, 'jobdesks-update', 'Update Jobdesks', 'Update Jobdesks', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(16, 'jobdesks-delete', 'Delete Jobdesks', 'Delete Jobdesks', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(17, 'jobdeskdetails-create', 'Create Jobdeskdetails', 'Create Jobdeskdetails', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(18, 'jobdeskdetails-read', 'Read Jobdeskdetails', 'Read Jobdeskdetails', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(19, 'jobdeskdetails-update', 'Update Jobdeskdetails', 'Update Jobdeskdetails', '2021-03-31 20:53:52', '2021-03-31 20:53:52'),
(20, 'jobdeskdetails-delete', 'Delete Jobdeskdetails', 'Delete Jobdeskdetails', '2021-03-31 20:53:52', '2021-03-31 20:53:52'),
(21, 'profile-read', 'Read Profile', 'Read Profile', '2021-03-31 20:53:52', '2021-03-31 20:53:52'),
(22, 'profile-update', 'Update Profile', 'Update Profile', '2021-03-31 20:53:52', '2021-03-31 20:53:52');

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
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(16, 4),
(17, 1),
(17, 2),
(17, 4),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(19, 1),
(19, 2),
(19, 4),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 3),
(22, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Kesalahan membaca data untuk tabel multiauth.permission_user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `multiauth`.`permission_user`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `NamaKaryawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaJabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaJobdesk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JobdeskDetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `KegiatanHarian` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `tanggal`, `NamaKaryawan`, `NamaJabatan`, `NamaJobdesk`, `JobdeskDetail`, `status`, `created_at`, `updated_at`, `KegiatanHarian`) VALUES
(10, '2021-05-08', 'Gerry Skom', 'Ketua LPPM', 'Penelitan', 'peneliatan agile', 'Laporan Diterima', NULL, NULL, 'membuat daftar pustaka di jurnal penelitian'),
(11, '2021-07-25', 'Gerry Skom', 'Ketua LPPM', 'Penelitan', 'penelitian OOP', 'Laporan Diterima', NULL, NULL, 'menganalisis OOP untuk jam pintar'),
(13, '2021-07-26', 'Gerry Skom', 'Ketua LPPM', 'Penelitan', 'penilitian mengenai OOP', 'Laporan Diterima', NULL, NULL, 'membuat program dengan konsep OOP');

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
(1, 'admin', 'Admin', 'Admin', '2021-03-31 20:53:51', '2021-03-31 20:53:51'),
(2, 'karyawan', 'Karyawan', 'Karyawan', '2021-03-31 20:53:53', '2021-03-31 20:53:53'),
(3, 'pimpinan', 'Pimpinan', 'Pimpinan', '2021-03-31 20:53:54', '2021-03-31 20:53:54'),
(4, 'spmi', 'Spmi', 'Spmi', '2021-03-31 20:53:55', '2021-03-31 20:53:55');

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
(3, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(4, 3, 'App\\Models\\User'),
(1, 4, ''),
(1, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(2, 7, 'App\\Models\\User'),
(3, 8, 'App\\Models\\User'),
(2, 9, 'App\\Models\\User'),
(4, 10, 'App\\Models\\User'),
(4, 11, 'App\\Models\\User'),
(2, 12, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_karyawan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_karyawan`) VALUES
(5, 'Admin', 'admin@app.com', NULL, '$2y$10$T3A4yHbzUE.kFIIs4Gi6Hei/pQQAcx1DYRnw/N.At.AL5gR2fpJDW', 'G2SLLLOt1sbOA8EoR32uxeIxWOUfC9HBt0QAXGTQeciM8A2i1aUvFreNsn4x', '2021-04-01 00:59:21', '2021-04-01 00:59:21', ''),
(8, 'surya skom', 'surya@gmail.com', NULL, '$2y$10$8vGqkoiqS6gs/AZyf8S1v.SOcy9/BfN5QWlgozzrKoWS/4Z6uTkJK', NULL, '2021-05-08 01:05:42', '2021-05-08 01:05:42', '1219001'),
(9, 'Gerry Skom', 'gerry@gmail.com', NULL, '$2y$10$JY1Pio/Uyb1JS4kNJWCEjupFjQxSYox9faOf0JF19qGlvEOOxJiKi', NULL, '2021-05-08 02:12:29', '2021-05-08 02:12:29', '1219002'),
(11, 'spmi', 'spmi@gmail.com', NULL, '$2y$10$JJ5JcBV9f4tVJD50txPDt.lY04YInP3F249IIWaz9nWOmzQd/9Kce', NULL, '2021-05-08 09:16:39', '2021-05-08 09:16:39', '1210000'),
(12, 'Muhamad Rizaludin', 'muhamadrizaludin24@gmail.com', NULL, '$2y$10$ubk3Rupdh80EJWvfidujzeIwmU6CLDqWVk0bnUQnJY30cfIFZd.4q', NULL, '2021-07-26 09:54:59', '2021-07-26 09:54:59', '1219016');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_namajabatan_unique` (`NamaJabatan`);

--
-- Indeks untuk tabel `jabatan_models`
--
ALTER TABLE `jabatan_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobdesks`
--
ALTER TABLE `jobdesks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawans_nokaryawan_unique` (`NoKaryawan`);

--
-- Indeks untuk tabel `karyawan_models`
--
ALTER TABLE `karyawan_models`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `jabatan_models`
--
ALTER TABLE `jabatan_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobdesks`
--
ALTER TABLE `jobdesks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `karyawan_models`
--
ALTER TABLE `karyawan_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
