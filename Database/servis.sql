-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 06:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `status` enum('0','10') NOT NULL,
  `create_at` datetime NOT NULL,
  `id_kategori` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `provinsi`, `kota`, `kecamatan`, `alamat`, `kode_pos`, `latitude`, `longitude`, `status`, `create_at`, `id_kategori`) VALUES
(4, 116, 'Riau', 'Pekanbaru', 'Payung Sekaki', 'Fajar ujung GG. Paweh No: 22', 28292, 987890232, 2323432243, '10', '2023-03-17 04:57:15', 2),
(5, 116, 'Sumatera Barat', 'Kota Padang', 'Padang Utara', 'Jl. Tempua 1', 222121, 67897, 678979787, '10', '2023-03-17 05:10:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alamat_kategori`
--

CREATE TABLE `alamat_kategori` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat_kategori`
--

INSERT INTO `alamat_kategori` (`id`, `nama`) VALUES
(1, 'Kantor'),
(2, 'Rumah'),
(3, 'Kos-Kosan');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `id_order` int(50) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `ulasan` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `point` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_user`, `id_order`, `id_teknisi`, `rating`, `ulasan`, `create_at`, `point`) VALUES
(18, 116, 74, 72, 5, 'Mantap josssss banget kali', '2023-03-29 11:50:11', 10),
(19, 116, 75, 72, 5, 'Mantap josssss banget kali coy', '2023-03-29 11:56:35', 10),
(20, 116, 82, 72, 5, 'Mantap josssss banget kali', '2023-03-31 10:41:27', 10),
(21, 116, 82, 72, 5, 'Mantap josssss banget kali', '2023-03-31 10:41:59', 10);

-- --------------------------------------------------------

--
-- Table structure for table `foto_feedback`
--

CREATE TABLE `foto_feedback` (
  `id` int(50) NOT NULL,
  `id_feedback` int(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_teknisi` int(50) NOT NULL,
  `total` double NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_order`, `id_teknisi`, `total`, `create_at`) VALUES
(4, 84, 72, 190000, '2023-04-01 05:44:19'),
(5, 84, 72, 200000, '2023-04-01 06:05:23'),
(6, 84, 72, 190000, '2023-04-01 06:08:00'),
(7, 84, 72, 190000, '2023-04-01 06:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(50) NOT NULL,
  `id_invoice` int(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `id_kondisi` int(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `id_invoice`, `nama`, `detail`, `harga`, `id_kondisi`, `create_at`) VALUES
(3, 4, 'Service Ac', NULL, 190000, NULL, '2023-04-01 05:44:09'),
(4, 5, 'Service AC', '1. Pendingin (Rp. 200.000)', 200000, NULL, '2023-04-01 06:05:23'),
(5, 6, 'Service AC', 'karakter', 190000, NULL, '2023-04-01 06:08:00'),
(6, 7, 'Service AC', 'wadefsegfsderhgvdbrthfbeygrdfvetgrdfwyegrdfwy54grfdegerdvfwtegrdvftegrdrtgdfcergfdbvcgrdvfegrvdfxegrdfvc', 190000, NULL, '2023-04-01 06:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_ac`
--

CREATE TABLE `kondisi_ac` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(50) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `jenis_layanan`, `deskripsi`) VALUES
(1, 'cuci ac', 'cuci', 'mencuci ac sampai hilang'),
(2, 'service ac', 'service', 'service ac sampai rusak');

-- --------------------------------------------------------

--
-- Table structure for table `merk_ac`
--

CREATE TABLE `merk_ac` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merk_ac`
--

INSERT INTO `merk_ac` (`id`, `nama`) VALUES
(1, 'Panasnibos'),
(2, 'Krisspy'),
(3, 'Mbakpion');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1678159080),
('m130524_201442_init', 1678159083),
('m190124_110200_add_verification_token_column_to_user_table', 1678159083);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_order`
--

CREATE TABLE `notifikasi_order` (
  `id` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_point`
--

CREATE TABLE `notifikasi_point` (
  `id` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `jumlah_point` int(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_display`
--

CREATE TABLE `order_display` (
  `id_order` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `masalah` varchar(50) NOT NULL,
  `id_merk` int(50) DEFAULT NULL,
  `type_ac` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jadwal_pengerjaan` date DEFAULT NULL,
  `status` enum('dipesan','diterima','cancel','selesai') NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `id_teknisi` int(50) DEFAULT NULL,
  `point_teknisi` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_display`
--

INSERT INTO `order_display` (`id_order`, `id_user`, `jumlah`, `jenis_layanan`, `detail`, `masalah`, `id_merk`, `type_ac`, `alamat`, `jadwal_pengerjaan`, `status`, `tgl_pesan`, `id_teknisi`, `point_teknisi`) VALUES
(83, 116, 1, '1', 'dawdwa', 'efsefesf', 2, '2431223', '4', '2023-04-01', 'dipesan', '2023-03-31 11:06:13', NULL, NULL),
(84, 116, 10, '2', 'dawdwa', 'efsefesf', 2, '213123', '4', '2023-03-27', 'diterima', '2023-03-31 11:14:45', 72, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_histori`
--

CREATE TABLE `order_histori` (
  `id_historis` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `id_order` int(50) DEFAULT NULL,
  `id_teknisi` int(50) DEFAULT NULL,
  `jenis_layanan` int(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_histori`
--

INSERT INTO `order_histori` (`id_historis`, `id_user`, `id_order`, `id_teknisi`, `jenis_layanan`, `tanggal`, `status`) VALUES
(110, 116, 74, 72, 1, '2023-03-29 11:50:06', 'Selesai'),
(111, 116, 75, 72, 1, '2023-03-29 11:55:39', 'selesai'),
(112, 116, 76, 72, 2, '2023-03-30 11:41:35', 'selesai'),
(113, 116, 78, NULL, 2, '2023-03-31 06:32:49', 'selesai'),
(114, 116, 82, 72, 1, '2023-03-31 10:37:15', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `order_kondisi`
--

CREATE TABLE `order_kondisi` (
  `id` int(50) NOT NULL,
  `id_order` int(50) DEFAULT NULL,
  `id_kondisi_ac` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` int(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `point` int(200) DEFAULT NULL,
  `status` enum('0','10') NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `kode_otp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama`, `no_hp`, `email`, `point`, `status`, `foto`, `create_at`, `kode_otp`) VALUES
(30, 116, 'amie', 2147483647, 'amie@email.com', 10, '10', 'foto_1679023697.png', '2023-03-17 04:28:17', 893534);

-- --------------------------------------------------------

--
-- Table structure for table `point_history`
--

CREATE TABLE `point_history` (
  `id` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `point` int(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_history`
--

INSERT INTO `point_history` (`id`, `id_user`, `point`, `created_at`) VALUES
(1, 117, 10, '2023-03-31 11:08:39'),
(2, 117, 10, '2023-03-31 11:10:17'),
(3, 117, 200, '2023-03-31 11:13:09'),
(4, 117, 200, '2023-04-01 05:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `point_konversi`
--

CREATE TABLE `point_konversi` (
  `id` int(50) NOT NULL,
  `jumlah_point` int(50) NOT NULL,
  `harga` double NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_konversi`
--

INSERT INTO `point_konversi` (`id`, `jumlah_point`, `harga`, `create_at`) VALUES
(2, 10, 10000, '2023-03-16 08:30:09'),
(3, 20, 20000, '2023-03-28 06:09:33'),
(4, 100, 100000, '2023-03-28 06:09:49'),
(5, 200, 200000, '2023-03-28 11:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `point_master`
--

CREATE TABLE `point_master` (
  `id_point` int(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah_ac` int(50) NOT NULL,
  `jumlah_order` int(50) NOT NULL DEFAULT 1,
  `jumlah_point` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_master`
--

INSERT INTO `point_master` (`id_point`, `keterangan`, `jumlah_ac`, `jumlah_order`, `jumlah_point`) VALUES
(1, 'Orderan', 1, 1, 10),
(2, 'Orderan', 10, 1, 100),
(3, 'Feedback', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nik` int(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` int(50) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `card_idy` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `point` int(50) DEFAULT NULL,
  `foto` varchar(200) NOT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `id_user`, `nama_lengkap`, `nik`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `email`, `cv`, `card_idy`, `status`, `point`, `foto`, `create_at`) VALUES
(21, 65, 'ope1', 2147483647, 'Pekanbaru', '2023-03-13', 2147483647, 'Fajar ujung GG. Paweh No: 22', 'ope1@gmail.com', NULL, '2323', '10', -10, '', '2023-03-13 10:19:27'),
(72, 117, 'teknisi', 2147483647, 'Padang', '2023-03-16', 2147483647, 'Jalan jalan', 'teknisi@email.com', 'cv_1679038405.png', '56768775687897', '10', 950, 'foto_1679038405.png', '2023-03-17 08:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id_topup` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `jumlah_point` int(200) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id_topup`, `id_user`, `jumlah_point`, `keterangan`) VALUES
(58, 117, 200, 'gcorrr'),
(59, 117, 200, 'baru'),
(60, 117, 200, 'baru'),
(61, 117, 100, 'new'),
(62, 117, 200, 'new'),
(63, 117, 200, 'histori'),
(64, 117, 200, 'baru topup');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `role` enum('admin','operator','teknisi','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role`) VALUES
(1, 'admin', 'NM_ZYlG3TpHzspsjE9SRh1QE1OxNl1pb', '$2y$13$2tkPzu3xdWq8PolDMb7eAOuliC7tt0/Yx.ovOs.D3pxTB0JBvsv3y', NULL, 'admin@admin.com', 10, 1678195435, 1678195435, 'qUrBhnIDaZucLI9ft_ssKnnHurE3hg0p_1678195435', 'admin'),
(65, 'ope1', 'ZdY5il7gGWpbsa8XnpUDtCrwP7NZ9qvo', '$2y$13$C4K.MjELnFB1YeHYGkh0/eYogh4N4Ny3b7l5K70CPzi3dxxUVrNTu', NULL, 'ope1@gmail.com', 10, 1678699194, 1678699194, 'Tm2ZVJI_L18AdwOt6pLaA-UmaH3bL4O-_1678699194', 'operator'),
(116, 'ami', 'S_GvXs_rK_SJauoA27pElPGzYoT3BRE4', '$2y$13$xEK/msOYyGBuVOKDFE9fm.PiRSUBKbcw9.mEb3MfsZueVfeJYFMty', NULL, 'amie@email.com', 10, 1679023697, 1679023697, 'WNPXv7_H06wu1C2szFTtjt2c7SmY9txu_1679023697', 'customer'),
(117, 'teknisi', 'JujayN2C1Mh6u5os1KhLMsa9rmO2Hldl', '$2y$13$ONr0LNlG8iSOCc1y1EX/tO2ZV4i/rtXpIGcwmJap5FSq8zRYw7OZ2', NULL, 'teknisi@email.com', 10, 1679038405, 1679038405, 'ZNQ1t-nSyaIaWVdymGhlEmrcz8fSw7Wg_1679038405', 'teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `alamat_ibfk_1` (`id_user`),
  ADD KEY `alamat_ibfk_2` (`id_kategori`);

--
-- Indexes for table `alamat_kategori`
--
ALTER TABLE `alamat_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `feedback_ibfk_3` (`id_user`),
  ADD KEY `feedback_ibfk_5` (`id_teknisi`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `foto_feedback`
--
ALTER TABLE `foto_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_feedback_ibfk_1` (`id_feedback`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_ibfk_1` (`id_order`),
  ADD KEY `invoice_ibfk_2` (`id_teknisi`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_detail_ibfk_1` (`id_invoice`),
  ADD KEY `invoice_detail_ibfk_2` (`id_kondisi`);

--
-- Indexes for table `kondisi_ac`
--
ALTER TABLE `kondisi_ac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `merk_ac`
--
ALTER TABLE `merk_ac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notifikasi_order`
--
ALTER TABLE `notifikasi_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `notifikasi_point`
--
ALTER TABLE `notifikasi_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_point_ibfk_1` (`id_user`),
  ADD KEY `notifikasi_point_ibfk_2` (`id_order`);

--
-- Indexes for table `order_display`
--
ALTER TABLE `order_display`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `order_display_ibfk_1` (`id_user`),
  ADD KEY `order_display_ibfk_2` (`id_teknisi`),
  ADD KEY `order_display_ibfk_3` (`id_merk`);

--
-- Indexes for table `order_histori`
--
ALTER TABLE `order_histori`
  ADD PRIMARY KEY (`id_historis`),
  ADD KEY `historis_order_ibfk_1` (`id_user`),
  ADD KEY `order_histori_ibfk_2` (`id_order`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indexes for table `order_kondisi`
--
ALTER TABLE `order_kondisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_kondisi_ibfk_1` (`id_order`),
  ADD KEY `order_kondisi_ibfk_2` (`id_kondisi_ac`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `point_history`
--
ALTER TABLE `point_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `point_konversi`
--
ALTER TABLE `point_konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_master`
--
ALTER TABLE `point_master`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alamat_kategori`
--
ALTER TABLE `alamat_kategori`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `foto_feedback`
--
ALTER TABLE `foto_feedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kondisi_ac`
--
ALTER TABLE `kondisi_ac`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merk_ac`
--
ALTER TABLE `merk_ac`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi_order`
--
ALTER TABLE `notifikasi_order`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi_point`
--
ALTER TABLE `notifikasi_point`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_display`
--
ALTER TABLE `order_display`
  MODIFY `id_order` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_histori`
--
ALTER TABLE `order_histori`
  MODIFY `id_historis` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `order_kondisi`
--
ALTER TABLE `order_kondisi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `point_konversi`
--
ALTER TABLE `point_konversi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `point_master`
--
ALTER TABLE `point_master`
  MODIFY `id_point` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id_topup` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alamat_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `alamat_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_5` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_6` FOREIGN KEY (`id_order`) REFERENCES `order_histori` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_feedback`
--
ALTER TABLE `foto_feedback`
  ADD CONSTRAINT `foto_feedback_ibfk_1` FOREIGN KEY (`id_feedback`) REFERENCES `feedback` (`id_feedback`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_display` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_ac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi_order`
--
ALTER TABLE `notifikasi_order`
  ADD CONSTRAINT `notifikasi_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_display` (`id_order`);

--
-- Constraints for table `notifikasi_point`
--
ALTER TABLE `notifikasi_point`
  ADD CONSTRAINT `notifikasi_point_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_point_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_display` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_display`
--
ALTER TABLE `order_display`
  ADD CONSTRAINT `order_display_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_display_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_display_ibfk_3` FOREIGN KEY (`id_merk`) REFERENCES `merk_ac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_histori`
--
ALTER TABLE `order_histori`
  ADD CONSTRAINT `order_histori_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_kondisi`
--
ALTER TABLE `order_kondisi`
  ADD CONSTRAINT `order_kondisi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_display` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_kondisi_ibfk_2` FOREIGN KEY (`id_kondisi_ac`) REFERENCES `kondisi_ac` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `point_history`
--
ALTER TABLE `point_history`
  ADD CONSTRAINT `point_history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD CONSTRAINT `teknisi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
