-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2025 at 10:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemenag_pai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lembaga_mdt`
--

CREATE TABLE `lembaga_mdt` (
  `id` int(11) NOT NULL,
  `lembaga` varchar(255) NOT NULL,
  `nomor_statistik` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kepala` varchar(255) DEFAULT NULL,
  `jumlah_murid` int(11) NOT NULL,
  `jumlah_pengajar` int(11) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('DISETUJUI','DITOLAK','DIPROSES','') NOT NULL DEFAULT 'DIPROSES',
  `keterangan` text NOT NULL DEFAULT 'TANPA KETERANGAN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lembaga_pontren`
--

CREATE TABLE `lembaga_pontren` (
  `id` int(11) NOT NULL,
  `nspp` varchar(20) NOT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nama_lembaga` varchar(255) NOT NULL,
  `grup` varchar(50) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_santri_pria` int(11) NOT NULL,
  `jumlah_santri_wanita` int(11) NOT NULL,
  `jumlah_keseluruhan` int(11) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('DISETUJUI','DIPROSES','DITOLAK','') NOT NULL DEFAULT 'DIPROSES',
  `keterangan` text DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `murid_mdt`
--

CREATE TABLE `murid_mdt` (
  `id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` date DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','Perempuan') NOT NULL,
  `rombel_kelas` varchar(5) NOT NULL,
  `tingkat` varchar(25) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('DISETUJUI','DITOLAK','DIPROSES','') NOT NULL DEFAULT 'DIPROSES',
  `keterangan` text NOT NULL DEFAULT 'TANPA KETERANGAN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_mdt`
--

CREATE TABLE `staff_mdt` (
  `id` int(11) NOT NULL,
  `lembaga_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('DISETUJUI','DITOLAK','DIPROSES','') NOT NULL DEFAULT 'DIPROSES',
  `keterangan` text NOT NULL DEFAULT 'TANPA KETERANGAN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kecamatan_user` (`user_id`);

--
-- Indexes for table `lembaga_mdt`
--
ALTER TABLE `lembaga_mdt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lembaga_mdt_user` (`user_id`);

--
-- Indexes for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `fk_lembaga_pontren_user` (`user_id`);

--
-- Indexes for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_id` (`lembaga_id`),
  ADD KEY `fk_murid_mdt_user` (`user_id`);

--
-- Indexes for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_id` (`lembaga_id`),
  ADD KEY `fk_staff_mdt_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lembaga_mdt`
--
ALTER TABLE `lembaga_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `fk_kecamatan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lembaga_mdt`
--
ALTER TABLE `lembaga_mdt`
  ADD CONSTRAINT `fk_lembaga_mdt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  ADD CONSTRAINT `fk_lembaga_pontren_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lembaga_pontren_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  ADD CONSTRAINT `fk_murid_mdt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_mdt_ibfk_1` FOREIGN KEY (`lembaga_id`) REFERENCES `lembaga_mdt` (`id`);

--
-- Constraints for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  ADD CONSTRAINT `fk_staff_mdt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_mdt_ibfk_1` FOREIGN KEY (`lembaga_id`) REFERENCES `lembaga_mdt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
