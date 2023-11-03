-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2023 at 06:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppb`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'Harnik'),
(2, 'Maintenance'),
(3, 'Proses'),
(4, 'Lab/ERADING'),
(5, 'Kantor'),
(7, 'Kebun');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Manajer'),
(3, 'KTU'),
(4, 'Gudang'),
(5, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `id_master_item` int NOT NULL,
  `nama_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`id_master_item`, `nama_item`) VALUES
(1, 'PERALATAN / PERLENGKAPAN KERJA'),
(2, 'WTP ( WATER TREATMENT PLANT )');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int NOT NULL,
  `id_users` int NOT NULL,
  `nomor_sppb` varchar(255) NOT NULL,
  `id_divisi` int NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Diajukan','Diperiksa','Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd_pemohon` varchar(500) NOT NULL,
  `ttd_ktu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_manajer` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `id_users`, `nomor_sppb`, `id_divisi`, `nama_pemohon`, `tanggal`, `status`, `ttd_pemohon`, `ttd_ktu`, `ttd_manajer`) VALUES
(1, 5, '01/SPPB-HARNIK/X/2023', 4, 'Saul Membi Sembiring', '2023-11-02', 'Disetujui', 'ttd_mama1.png', 'ttd1.png', '1167645.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_item`
--

CREATE TABLE `sub_item` (
  `id_sub_item` int NOT NULL,
  `id_master_item` int NOT NULL,
  `nama_sub_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_item`
--

INSERT INTO `sub_item` (`id_sub_item`, `id_master_item`, `nama_sub_item`) VALUES
(1, 1, 'PERLENGKAPAN / PERALATAN KERJA HARNIK'),
(3, 1, 'FEED PUM BOILER 1');

-- --------------------------------------------------------

--
-- Table structure for table `trans_item`
--

CREATE TABLE `trans_item` (
  `id_trans_item` int NOT NULL,
  `id_permohonan` int NOT NULL,
  `id_master_item` int NOT NULL,
  `id_sub_item` int NOT NULL,
  `kode` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int NOT NULL,
  `fisik` int NOT NULL,
  `uraian` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trans_item`
--

INSERT INTO `trans_item` (`id_trans_item`, `id_permohonan`, `id_master_item`, `id_sub_item`, `kode`, `satuan`, `stok`, `fisik`, `uraian`, `keterangan`) VALUES
(1, 1, 1, 1, 'AA.A4.48.742.010', 'PCS', 3, 45, 'SEAL TAPE (ISOLATIP)', 'PERLENGKAPAN KERJA HARNIK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `id_level` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `gambar_ttd` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `id_level`, `nama`, `nip`, `id_divisi`, `username`, `password`, `gambar`, `gambar_ttd`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ruby', '12312', 4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'spongebob_png_vector_2_by_carlosoof10_df88x1u-pre.png', 'ttd.png', '2023-10-31 16:12:54', '2023-10-31 16:12:54'),
(2, 3, 'Kristeli', '12345', 4, 'kristeli', 'a61c180885b13b558ae49eca94bcb75d', 'CA_BARU.png', 'ttd1.png', '2023-10-31 18:38:04', '2023-10-31 18:38:04'),
(3, 4, 'Rizka', '123545', 3, 'rizka', 'aef2c231d5e776c0e0656eaf68767848', 'icon.png', 'ttd_mama.png', '2023-10-31 22:32:09', '2023-10-31 22:32:09'),
(4, 2, 'Irsan', '2314567', 5, 'irsan', '8a97fb7c04a7a82eb7aca56c8a27934a', 'olseller.jpg', '1167645.png', '2023-10-31 22:48:28', '2023-10-31 22:48:28'),
(5, 5, 'Saul Membi Sembiring', '2314567', 4, 'saulmembi', '865cafd58dfc1cbfecb28316a33c2393', '2.jpg', 'ttd_mama1.png', '2023-11-01 15:58:19', '2023-11-01 15:58:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`id_master_item`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `sub_item`
--
ALTER TABLE `sub_item`
  ADD PRIMARY KEY (`id_sub_item`),
  ADD KEY `id_item` (`id_master_item`);

--
-- Indexes for table `trans_item`
--
ALTER TABLE `trans_item`
  ADD PRIMARY KEY (`id_trans_item`),
  ADD KEY `id_permohonan` (`id_permohonan`),
  ADD KEY `id_master_item` (`id_master_item`),
  ADD KEY `id_sub_item` (`id_sub_item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `id_master_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id_sub_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_item`
--
ALTER TABLE `trans_item`
  MODIFY `id_trans_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `permohonan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `sub_item`
--
ALTER TABLE `sub_item`
  ADD CONSTRAINT `sub_item_ibfk_1` FOREIGN KEY (`id_master_item`) REFERENCES `master_item` (`id_master_item`);

--
-- Constraints for table `trans_item`
--
ALTER TABLE `trans_item`
  ADD CONSTRAINT `trans_item_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`),
  ADD CONSTRAINT `trans_item_ibfk_2` FOREIGN KEY (`id_master_item`) REFERENCES `master_item` (`id_master_item`),
  ADD CONSTRAINT `trans_item_ibfk_3` FOREIGN KEY (`id_sub_item`) REFERENCES `sub_item` (`id_sub_item`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
