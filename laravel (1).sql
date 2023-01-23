-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 09:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tahun_pelajaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `kode_rombel` int(11) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `nis`, `tanggal_absen`, `semester`, `tahun_pelajaran`, `created_at`, `updated_at`, `status`, `kode_rombel`, `keterangan`) VALUES
(327, '15804', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(328, '20610', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(329, '25340', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(330, '30548', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(331, '32930', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(332, '34408', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(333, '36345', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(334, '39567', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(335, '40026', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(336, '41083', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(337, '41200562', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(338, '43446', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(339, '47927', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(340, '49179', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(341, '52711', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(342, '56980', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(343, '61846', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(344, '68516', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(345, '71132', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(346, '71826', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(347, '78661', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(348, '81028', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(349, '82738', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(350, '89974', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(351, '91361', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(352, '91791', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(353, '95688', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(354, '97930', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok'),
(355, '99748', '2023-01-22', 'II', '2022/2023', NULL, NULL, 'Hadir', 1, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`nip`, `nama`, `jk`, `alamat`, `no_telpon`, `email`, `created_at`, `updated_at`) VALUES
(4111083, 'Adi', 'L', 'Tasikmalaya', '083153444251', 'Adi58826@mail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `izins`
--

CREATE TABLE `izins` (
  `id_izin` bigint(20) UNSIGNED NOT NULL,
  `izin` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `keterangan_izin` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `izins`
--

INSERT INTO `izins` (`id_izin`, `izin`, `nis`, `nip`, `keterangan_izin`, `waktu`, `created_at`, `updated_at`) VALUES
(2, 'Izin Pulang', '138087', '4111083', 'xzxzx', '2023-01-23 04:00:59', NULL, NULL),
(3, 'Izin Pulang', '138087', '4111083', 'Sakit', '2023-01-23 04:07:54', NULL, NULL),
(4, 'Izin Keluar', '15804', '4111083', 'Beli Baju', '2023-01-23 04:10:33', NULL, NULL),
(5, 'Izin Pulang', '20610', '4111083', 'Sakit', '2023-01-23 10:20:21', NULL, NULL),
(6, 'Izin Keluar', '138087', '4111083', 'xzxzx', '2023-01-23 13:14:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kinerjas`
--

CREATE TABLE `kinerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kode_kinerja` varchar(255) NOT NULL,
  `saksi` varchar(255) NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kinerjas`
--

INSERT INTO `kinerjas` (`id`, `nis`, `kode_kinerja`, `saksi`, `tanggal_kejadian`, `created_at`, `updated_at`) VALUES
(5, '71132', '5', 'Adi', '2023-01-23', NULL, NULL),
(6, '25340', '2', 'Adi', '2023-01-23', NULL, NULL),
(7, '25340', '2', 'Adi', '2023-01-23', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_penghargaan_siswa`
-- (See below for the actual view)
--
CREATE TABLE `laporan_penghargaan_siswa` (
`nis` varchar(255)
,`kode_kinerja` varchar(255)
,`jumlah_peringatan` decimal(32,0)
,`id` bigint(20) unsigned
,`saksi` varchar(255)
,`tanggal_kejadian` date
,`nama` varchar(100)
,`jk` varchar(1)
,`alamat` text
,`kode_rombel` int(11)
,`nama_kinerja` varchar(255)
,`kelompok_kerja` varchar(255)
,`poin` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_peringatan`
-- (See below for the actual view)
--
CREATE TABLE `laporan_peringatan` (
`nis` varchar(255)
,`kode_kinerja` varchar(255)
,`id` bigint(20) unsigned
,`saksi` varchar(255)
,`tanggal_kejadian` date
,`nama` varchar(100)
,`jk` varchar(1)
,`alamat` text
,`kode_rombel` int(11)
,`nama_kinerja` varchar(255)
,`kelompok_kerja` varchar(255)
,`poin` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_peringatan_siswa`
-- (See below for the actual view)
--
CREATE TABLE `laporan_peringatan_siswa` (
`nis` varchar(255)
,`kode_kinerja` varchar(255)
,`jumlah_peringatan` decimal(32,0)
,`id` bigint(20) unsigned
,`saksi` varchar(255)
,`tanggal_kejadian` date
,`nama` varchar(100)
,`jk` varchar(1)
,`alamat` text
,`kode_rombel` int(11)
,`nama_kinerja` varchar(255)
,`kelompok_kerja` varchar(255)
,`poin` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_01_20_175516_create_siswas_table', 1),
(11, '2023_01_20_192226_create_rombels_table', 2),
(12, '2023_01_20_193516_create_absens_table', 3),
(13, '2023_01_20_204124_create_poins_table', 4),
(14, '2023_01_20_204711_create_kinerjas_table', 5),
(15, '2023_01_22_190913_create_gurus_table', 6),
(16, '2023_01_22_200300_create_izins_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poins`
--

CREATE TABLE `poins` (
  `kode_kinerja` bigint(20) UNSIGNED NOT NULL,
  `nama_kinerja` varchar(255) NOT NULL,
  `kelompok_kerja` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poins`
--

INSERT INTO `poins` (`kode_kinerja`, `nama_kinerja`, `kelompok_kerja`, `poin`, `created_at`, `updated_at`) VALUES
(2, 'Reward Juara', 'REWARD', 100, '2023-01-20 21:18:17', '2023-01-20 21:18:17'),
(4, 'Juara 1', 'Reward', 1, NULL, NULL),
(5, 'Terlambat Ke Sekolah', 'PUNISHMENT', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rombels`
--

CREATE TABLE `rombels` (
  `kode_rombel` bigint(20) UNSIGNED NOT NULL,
  `tahun_pelajaran` varchar(255) NOT NULL,
  `rombel` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombels`
--

INSERT INTO `rombels` (`kode_rombel`, `tahun_pelajaran`, `rombel`, `tingkat`, `jurusan`, `jumlah_siswa`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 'XII TKJ 1', 'XII', 'TEKNIK KOMPUTER JARINGAN', 33, '2023-01-20 19:31:58', '2023-01-21 20:58:47'),
(33, '2022/2023', 'XII TBSM 2', 'XII', 'TEKNIK SPEDA MOTOR', 33, NULL, NULL),
(34, '2022/2023', 'XII TBSM 1', 'XII', 'TEKNIK SEPEDA MOTOR', 35, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nis` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `kode_rombel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nis`, `nama`, `jk`, `alamat`, `kode_rombel`, `email`, `tanggal_lahir`, `tahun_masuk`, `created_at`, `updated_at`) VALUES
('138087', 'Yulia Pertiwi S.T.', 'P', 'cicalengka', 33, 'Yulia Pertiwi S.T.712@mail.com', '2023-01-13', 2022, NULL, '2023-01-21 22:08:58'),
('15804', 'Asirwanda Samosir M.Kom.', 'L', 'cicalengka', 1, 'darman.siregar@gmail.com', '2023-01-21', 2022, NULL, NULL),
('20610', 'Banawi Bagiya Sihotang S.Pt', 'L', 'cicalengka', 1, 'xuyainah@utama.biz.id', '2023-01-21', 2022, NULL, NULL),
('25340', 'Nyoman Mangunsong', 'L', 'cicalengka', 1, 'sudiati.hardana@fujiati.name', '2023-01-21', 2022, NULL, NULL),
('30548', 'Elma Hasanah', 'L', 'cicalengka', 1, 'waluyo66@usamah.net', '2023-01-21', 2022, NULL, NULL),
('32930', 'Nabila Siska Handayani S.Psi', 'L', 'cicalengka', 1, 'dtamba@prabowo.info', '2023-01-21', 2022, NULL, NULL),
('34408', 'Eka Titi Wijayanti', 'L', 'cicalengka', 1, 'dnovitasari@saptono.co.id', '2023-01-21', 2022, NULL, NULL),
('36345', 'Danang Maryadi', 'L', 'cicalengka', 1, 'lrahimah@hartati.asia', '2023-01-21', 2022, NULL, NULL),
('36635', 'Maya Hariyah', 'L', 'cicalengka', 34, 'Maya Hariyah13449@mail.com', '2023-01-21', 2022, NULL, '2023-01-21 22:08:45'),
('39567', 'Estiawan Setiawan', 'L', 'cicalengka', 1, 'icha96@yahoo.com', '2023-01-21', 2022, NULL, NULL),
('40026', 'Aisyah Pertiwi', 'L', 'cicalengka', 1, 'npermata@nasyidah.asia', '2023-01-21', 2022, NULL, NULL),
('41083', 'Tugiman Hardiansyah S.Ked', 'L', 'cicalengka', 1, 'ganjaran29@yahoo.com', '2023-01-21', 2022, NULL, NULL),
('41200562', 'Rizki Fahrezi Maulana', 'L', 'Cicalengka', 1, 'ortu@mail.com', '2023-01-21', 2020, '2023-01-20 18:49:30', '2023-01-20 18:49:23'),
('41200568', 'test', 'L', 'cicalengka', 34, 'test58928@mail.com', '2002-01-20', 2020, NULL, NULL),
('41200569', 'test', 'L', 'cicalengka', 34, 'test36414@mail.com', '2002-01-20', 2020, NULL, NULL),
('43446', 'Hasim Irawan', 'L', 'cicalengka', 1, 'pranata.yulianti@nasyiah.desa.id', '2023-01-21', 2022, NULL, NULL),
('47927', 'Artanto Natsir', 'L', 'cicalengka', 1, 'safina.hariyah@gmail.co.id', '2023-01-21', 2022, NULL, NULL),
('49179', 'Aris Pratama', 'L', 'cicalengka', 1, 'dhardiansyah@gmail.com', '2023-01-21', 2022, NULL, NULL),
('52711', 'Harsanto Firmansyah', 'L', 'cicalengka', 1, 'hasna41@yahoo.co.id', '2023-01-21', 2022, NULL, NULL),
('56980', 'Panca Marbun', 'L', 'cicalengka', 1, 'cakrajiya86@gmail.co.id', '2023-01-21', 2022, NULL, NULL),
('61846', 'Restu Padmasari', 'L', 'cicalengka', 1, 'usamah.paulin@gmail.co.id', '2023-01-21', 2022, NULL, NULL),
('68516', 'Usyi Nadine Lestari S.Pd', 'L', 'cicalengka', 1, 'eva.yulianti@novitasari.id', '2023-01-21', 2022, NULL, NULL),
('71132', 'Galih Bahuwarna Pratama M.TI.', 'L', 'cicalengka', 1, 'edison07@yuliarti.my.id', '2023-01-21', 2022, NULL, NULL),
('71826', 'Mahesa Manullang', 'L', 'cicalengka', 1, 'kpradipta@wibisono.mil.id', '2023-01-21', 2022, NULL, NULL),
('78661', 'Tasdik Wasis Wacana', 'L', 'cicalengka', 1, 'hanggraini@gmail.co.id', '2023-01-21', 2022, NULL, NULL),
('81028', 'Yono Maulana', 'L', 'cicalengka', 1, 'setiawan.salimah@rahimah.in', '2023-01-21', 2022, NULL, NULL),
('82738', 'Prakosa Mahdi Salahudin S.Gz', 'L', 'cicalengka', 1, 'mursita82@gmail.com', '2023-01-21', 2022, NULL, NULL),
('89974', 'Tri Nainggolan S.E.', 'L', 'cicalengka', 1, 'nilam14@narpati.ac.id', '2023-01-21', 2022, NULL, NULL),
('91361', 'Kenari Setiawan S.Ked', 'L', 'cicalengka', 1, 'hamima47@aryani.name', '2023-01-21', 2022, NULL, NULL),
('91791', 'Soleh Hutagalung', 'L', 'cicalengka', 1, 'luwes05@megantara.go.id', '2023-01-21', 2022, NULL, NULL),
('95688', 'Soleh Edi Saputra S.T.', 'L', 'cicalengka', 1, 'cinthia17@yahoo.com', '2023-01-21', 2022, NULL, NULL),
('97930', 'Kajen Tarihoran', 'L', 'cicalengka', 1, 'lestari.ratna@damanik.mil.id', '2023-01-21', 2022, NULL, NULL),
('99748', 'Gina Jelita Fujiati M.Farm', 'L', 'cicalengka', 1, 'sudiati.saiful@rahimah.web.id', '2023-01-21', 2022, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','ortu','guru') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$efATwYhAO6SC/Z6WmPuJhO06cPMaiO1QmyLVImoH5lilx6n1/ttQS', 'admin', NULL, '2023-01-20 11:47:18', '2023-01-20 11:47:18'),
(2, 'ortu', 'ortu@mail.com', NULL, '$2y$10$E1M1FHewUeGmeNXJZ9EiuuHrSDCDLTUT.G3u7sqtaFsVlHOWz.CKO', 'ortu', NULL, '2023-01-20 11:47:48', '2023-01-20 11:47:48'),
(3, 'Adi', 'guru@mail.com', NULL, '$2y$10$IXFA81cpsyReJriSmjKUw.LZDhVoY7l8yUwGz.gTDBOtgyDUgkaSG', 'guru', NULL, '2023-01-20 11:48:21', '2023-01-20 11:48:21'),
(4, 'test', 'test36414@mail.com', NULL, '$2y$10$wOaYRDEZ8sE70Nu5gEaXXOaPl4jpPkNo8Dav3xJcx4U4jr9neLeoq', 'ortu', NULL, '2023-01-21 21:39:24', '2023-01-21 21:39:24'),
(5, 'Rizki Fahrezi Maulana M.kom', 'Rizki Fahrezi Maulana M.kom49028@mail.com', NULL, '$2y$10$Z9uWsxZpxz4tHAVIB5i1/ezj93o3zhRxzes20/.hs0nIMkIt8KSWS', 'ortu', NULL, '2023-01-22 12:26:43', '2023-01-22 12:26:43'),
(6, 'Rizki Fahrezi Maulana M.kom', '', NULL, '', 'admin', NULL, '2023-01-22 12:33:55', '2023-01-22 12:33:55'),
(7, 'Adi', 'Adi58826@mail.com', NULL, '$2y$10$45/UnETZjjQ.mY3caEmXpOrR0ZOkrrzfKmSPP8qhEmWB1bmCAtDDG', 'guru', NULL, '2023-01-22 13:46:48', '2023-01-22 13:46:48');

-- --------------------------------------------------------

--
-- Structure for view `laporan_penghargaan_siswa`
--
DROP TABLE IF EXISTS `laporan_penghargaan_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_penghargaan_siswa`  AS SELECT `kinerjas`.`nis` AS `nis`, `kinerjas`.`kode_kinerja` AS `kode_kinerja`, sum(`poins`.`poin`) AS `jumlah_peringatan`, `kinerjas`.`id` AS `id`, `kinerjas`.`saksi` AS `saksi`, `kinerjas`.`tanggal_kejadian` AS `tanggal_kejadian`, `siswas`.`nama` AS `nama`, `siswas`.`jk` AS `jk`, `siswas`.`alamat` AS `alamat`, `siswas`.`kode_rombel` AS `kode_rombel`, `poins`.`nama_kinerja` AS `nama_kinerja`, `poins`.`kelompok_kerja` AS `kelompok_kerja`, `poins`.`poin` AS `poin` FROM ((`kinerjas` join `siswas` on(`siswas`.`nis` = `kinerjas`.`nis`)) join `poins` on(`poins`.`kode_kinerja` = `poins`.`kode_kinerja`)) WHERE `poins`.`kelompok_kerja` = 'Reward' GROUP BY `siswas`.`nis``nis`  ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_peringatan`
--
DROP TABLE IF EXISTS `laporan_peringatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_peringatan`  AS SELECT `kinerjas`.`nis` AS `nis`, `kinerjas`.`kode_kinerja` AS `kode_kinerja`, `kinerjas`.`id` AS `id`, `kinerjas`.`saksi` AS `saksi`, `kinerjas`.`tanggal_kejadian` AS `tanggal_kejadian`, `siswas`.`nama` AS `nama`, `siswas`.`jk` AS `jk`, `siswas`.`alamat` AS `alamat`, `siswas`.`kode_rombel` AS `kode_rombel`, `poins`.`nama_kinerja` AS `nama_kinerja`, `poins`.`kelompok_kerja` AS `kelompok_kerja`, `poins`.`poin` AS `poin` FROM ((`kinerjas` join `siswas` on(`siswas`.`nis` = `kinerjas`.`nis`)) join `poins` on(`poins`.`kode_kinerja` = `kinerjas`.`kode_kinerja`))  ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_peringatan_siswa`
--
DROP TABLE IF EXISTS `laporan_peringatan_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_peringatan_siswa`  AS SELECT `kinerjas`.`nis` AS `nis`, `kinerjas`.`kode_kinerja` AS `kode_kinerja`, sum(`poins`.`poin`) AS `jumlah_peringatan`, `kinerjas`.`id` AS `id`, `kinerjas`.`saksi` AS `saksi`, `kinerjas`.`tanggal_kejadian` AS `tanggal_kejadian`, `siswas`.`nama` AS `nama`, `siswas`.`jk` AS `jk`, `siswas`.`alamat` AS `alamat`, `siswas`.`kode_rombel` AS `kode_rombel`, `poins`.`nama_kinerja` AS `nama_kinerja`, `poins`.`kelompok_kerja` AS `kelompok_kerja`, `poins`.`poin` AS `poin` FROM ((`kinerjas` join `siswas` on(`siswas`.`nis` = `kinerjas`.`nis`)) join `poins` on(`poins`.`kode_kinerja` = `kinerjas`.`kode_kinerja`)) WHERE `poins`.`kelompok_kerja` = 'Punishment' GROUP BY `siswas`.`nis``nis`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `izins`
--
ALTER TABLE `izins`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `kinerjas`
--
ALTER TABLE `kinerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `poins`
--
ALTER TABLE `poins`
  ADD PRIMARY KEY (`kode_kinerja`);

--
-- Indexes for table `rombels`
--
ALTER TABLE `rombels`
  ADD PRIMARY KEY (`kode_rombel`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nis`);

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
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izins`
--
ALTER TABLE `izins`
  MODIFY `id_izin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kinerjas`
--
ALTER TABLE `kinerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poins`
--
ALTER TABLE `poins`
  MODIFY `kode_kinerja` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rombels`
--
ALTER TABLE `rombels`
  MODIFY `kode_rombel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
