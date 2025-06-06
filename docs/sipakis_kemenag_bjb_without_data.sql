-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2025 at 10:30 AM
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
-- Database: `sipakis_kemenag_bjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_staff`
--

CREATE TABLE `jabatan_staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lembaga_pendidikan`
--

CREATE TABLE `jenis_lembaga_pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lembaga_pendidikan`
--

CREATE TABLE `lembaga_pendidikan` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `jenis_lembaga_pendidikan_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nspp` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `jenjang` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `lembaga_pendidikan_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_tanggal_lahir` varchar(255) NOT NULL,
  `rombel_kelas` varchar(100) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operator_lembaga_pendidikan`
--

CREATE TABLE `operator_lembaga_pendidikan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lembaga_pendidikan_id` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `lembaga_pendidikan_id` int(11) DEFAULT NULL,
  `jabatan_staff_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pimpinan','staff','operator') NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan_staff`
--
ALTER TABLE `jabatan_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_lembaga_pendidikan`
--
ALTER TABLE `jenis_lembaga_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga_pendidikan`
--
ALTER TABLE `lembaga_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `jenis_lembaga_pendidikan_id` (`jenis_lembaga_pendidikan_id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_pendidikan_id` (`lembaga_pendidikan_id`);

--
-- Indexes for table `operator_lembaga_pendidikan`
--
ALTER TABLE `operator_lembaga_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lembaga_pendidikan_id` (`lembaga_pendidikan_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_pendidikan_id` (`lembaga_pendidikan_id`),
  ADD KEY `jabatan_staff_id` (`jabatan_staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan_staff`
--
ALTER TABLE `jabatan_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_lembaga_pendidikan`
--
ALTER TABLE `jenis_lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lembaga_pendidikan`
--
ALTER TABLE `lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator_lembaga_pendidikan`
--
ALTER TABLE `operator_lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lembaga_pendidikan`
--
ALTER TABLE `lembaga_pendidikan`
  ADD CONSTRAINT `lembaga_pendidikan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`),
  ADD CONSTRAINT `lembaga_pendidikan_ibfk_2` FOREIGN KEY (`jenis_lembaga_pendidikan_id`) REFERENCES `jenis_lembaga_pendidikan` (`id`);

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`lembaga_pendidikan_id`) REFERENCES `lembaga_pendidikan` (`id`);

--
-- Constraints for table `operator_lembaga_pendidikan`
--
ALTER TABLE `operator_lembaga_pendidikan`
  ADD CONSTRAINT `operator_lembaga_pendidikan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operator_lembaga_pendidikan_ibfk_2` FOREIGN KEY (`lembaga_pendidikan_id`) REFERENCES `lembaga_pendidikan` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`lembaga_pendidikan_id`) REFERENCES `lembaga_pendidikan` (`id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`jabatan_staff_id`) REFERENCES `jabatan_staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
