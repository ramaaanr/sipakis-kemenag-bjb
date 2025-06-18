-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2025 at 01:22 AM
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
  `nama` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan_staff`
--

INSERT INTO `jabatan_staff` (`id`, `nama`, `created_at`, `deleted_at`) VALUES
(1, 'Kyai/Ustadz', '2025-06-06 16:31:56', NULL),
(2, 'Guru', '2025-06-06 16:31:56', NULL),
(3, 'Senior Research Director', '2025-06-06 16:31:56', '2025-06-06 17:13:05'),
(4, 'Keamanan', '2025-06-06 16:31:56', NULL),
(5, 'Human Quality Director', '2025-06-06 16:31:56', NULL),
(6, 'Technician  baru', '2025-06-06 17:09:18', '2025-06-13 23:19:06'),
(7, 'Direct Research Engineer', '2025-06-06 17:10:44', '2025-06-06 17:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lembaga_pendidikan`
--

CREATE TABLE `jenis_lembaga_pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_lembaga_pendidikan`
--

INSERT INTO `jenis_lembaga_pendidikan` (`id`, `nama`, `created_at`, `deleted_at`) VALUES
(1, 'Pondok Pesantren', '2025-06-06 16:31:56', NULL),
(2, 'Madrasah Ibtidaiyah', '2025-06-06 16:31:56', NULL),
(3, 'Madrasah Tsanawiyah', '2025-06-06 16:31:56', NULL),
(4, 'Madrasah Aliyah', '2025-06-06 16:31:56', NULL),
(5, 'Sekolah Tinggi Agama Islam', '2025-06-06 16:31:56', '2025-06-06 17:37:11'),
(6, 'Sekolah Maggio Stream', '2025-06-06 17:39:39', NULL),
(7, 'Pondok Aniya View 2', '2025-06-06 17:40:06', '2025-06-13 23:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `deleted_at`, `created_at`) VALUES
(1, 'Banjarbaru Utara', NULL, '2025-06-06 16:31:56'),
(2, 'Banjarbaru Selatan', NULL, '2025-06-06 16:31:56'),
(3, 'Cempaka', NULL, '2025-06-06 16:31:56'),
(4, 'Liang Anggang', NULL, '2025-06-06 16:31:56'),
(5, 'Landasan Ulin', NULL, '2025-06-06 16:31:56'),
(6, 'Technician  bRU', '2025-06-13 23:18:24', '2025-06-06 16:35:08'),
(7, 'Lake Reyeston', '2025-06-13 22:55:58', '2025-06-06 16:51:33'),
(8, 'PULAI', '2025-06-13 22:51:54', '2025-06-13 22:51:44'),
(9, 'Pulau Laut Sigam', NULL, '2025-06-13 22:56:17'),
(10, 'Udin', '2025-06-13 23:03:57', '2025-06-13 23:03:46'),
(11, 'Scothaven baru banget', '2025-06-13 23:06:57', '2025-06-13 23:04:49'),
(12, 'Scothaven baru banget lagi 2222', '2025-06-13 23:06:47', '2025-06-13 23:05:55'),
(13, 'Scothaven baru banget lagi 2 2', '2025-06-13 23:06:52', '2025-06-13 23:06:03'),
(14, 'Tes Baru', NULL, '2025-06-18 18:51:38'),
(15, 'asd', NULL, '2025-06-18 18:52:05'),
(16, 'asd', NULL, '2025-06-18 18:52:42'),
(17, 'asd', NULL, '2025-06-18 18:53:07');

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
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga_pendidikan`
--

INSERT INTO `lembaga_pendidikan` (`id`, `kecamatan_id`, `jenis_lembaga_pendidikan_id`, `nama`, `nspp`, `npsn`, `jenjang`, `alamat`, `no_telepon`, `email`, `deleted_at`, `created_at`) VALUES
(1, 3, 1, 'Madrasah Ibtidaiyah Al-Falah', '211234567890', '30123456', 'MI', 'Jl. Pelajar No. 12', '081234567890', 'mi.alfalah@example.com', NULL, '2025-06-06 17:49:19'),
(2, 5, 4, 'Pondok Pesantren Nurul Huda', '211234567891', '30123457', 'Ponpes', 'Jl. Pesantren No. 3', '081234567891', 'pp.nurulhuda@example.com', NULL, '2025-06-06 17:49:19'),
(3, 1, 2, 'MTs Al-Hikmah', '211234567892', '30123458', 'MTs', 'Jl. Merdeka No. 8', '081234567892', 'mts.alhikmah@example.com', NULL, '2025-06-06 17:49:19'),
(4, 7, 5, 'MA Darussalam', '211234567893', '30123459', 'MA', 'Jl. Pendidikan No. 45', '081234567893', 'ma.darussalam@example.com', NULL, '2025-06-06 17:49:19'),
(5, 4, 4, 'Pondok Waelchi Shore Baru', '20667659', '77849417', 'connect', '2017 Shaun Shoals', '4-595-678-2570', 'Myrtie.Collier15@yahoo.com', NULL, '2025-06-06 17:49:19'),
(6, 1, 1, 'TPQ Al-Munawwarah Baru', '211234567895Baru', '30123461Baru', 'TPQBaru', 'Jl. Musholla No. 20Baru', '081234567892', 'tpq.munawwaraBaruh@example.com', '2025-06-18 19:17:30', '2025-06-06 17:49:19'),
(7, 6, 7, 'Madrasah Diniyah Takmiliyah Al-Hidayah', '211234567896', '30123462', 'MDT', 'Jl. Masjid Agung No. 11', '081234567896', 'mdt.alhidayah@example.com', NULL, '2025-06-06 17:49:19'),
(8, 3, 2, 'MI Nurul Ilmi', '211234567897', '30123463', 'MI', 'Jl. Cendana No. 99', '081234567897', 'mi.nurulilmi@example.com', NULL, '2025-06-06 17:49:19'),
(9, 1, 1, 'Pondok Pesantren Miftahul Jannah', '211234567898', '30123464', 'Ponpes', 'Jl. Barokah No. 17', '081234567898', 'pp.miftahul@example.com', NULL, '2025-06-06 17:49:19'),
(10, 5, 6, 'RA Al-Kautsar', '211234567899', '30123465', 'RA', 'Jl. Kemuning No. 22', '081234567899', 'ra.alkautsar@example.com', NULL, '2025-06-06 17:49:19'),
(11, NULL, NULL, 'Pondok Gislason Cove', NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 19:02:22', '2025-06-06 19:22:38'),
(12, NULL, NULL, 'Pondok Jacobs Crossroad', NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 19:02:18', '2025-06-06 19:24:30'),
(13, NULL, NULL, 'Pondok Everardo Spring', NULL, NULL, NULL, '', NULL, NULL, '2025-06-17 19:02:27', '2025-06-06 19:25:14'),
(14, 3, 3, 'Pondok Jordi Circles', '70632270', '99058366', 'parse', '61693 Williamson Knoll', '80-389-633-6563', 'Eric_Wiegand@hotmail.com', NULL, '2025-06-06 19:26:36'),
(15, 16, 4, 'd', 'asd', 'asd', 'asd', 'asd', '', 'asd', NULL, '2025-06-18 18:53:41'),
(16, 4, 4, 'asdasd', 'asd', 'asd', 'asd', 'asd', '', 'asdasd', '2025-06-18 18:55:02', '2025-06-18 18:54:30');

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
  `nisn` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `lembaga_pendidikan_id`, `nama`, `alamat`, `tempat_tanggal_lahir`, `rombel_kelas`, `tingkat`, `nisn`, `jenis_kelamin`, `created_at`, `deleted_at`) VALUES
(1, 1, 'Ahmad Fauzi', 'Jl. Melati No. 5', 'Banjarmasin, 2008-01-12', 'VII-A', 'VII', '0087654321', 'L', '2025-06-08 19:04:54', NULL),
(2, 2, 'Jesse Walker V updated', '647 King Ports', 'Lake Waldo, Tue Nov 05 2024 15:39:40 GMT+0800 (Central Indonesia Time)', 'iu', '364', '76476812', 'L', '2025-06-08 19:04:54', '2025-06-13 21:23:26'),
(3, 3, 'Rizky Maulana', 'Jl. Kamboja No. 3', 'Martapura, 2007-11-30', 'IX-C', 'IX', '0076543210', 'L', '2025-06-08 19:04:54', NULL),
(4, 4, 'Dewi Lestari', 'Jl. Mawar No. 12', 'Banjarmasin, 2010-03-10', 'VI-A', 'VI', '0012345678', 'P', '2025-06-08 19:04:54', NULL),
(5, 2, 'Tyler Lubowitz', '7826 Arvel Ford', 'Jacobiport, Wed Dec 04 2024 11:21:04 GMT+0800 (Central Indonesia Time)', 'kb', '997', '76759201', 'L', '2025-06-08 19:04:54', NULL),
(6, 6, 'Fitri Aulia', 'Jl. Dahlia No. 4', 'Martapura, 2008-08-25', 'VII-B', 'VII', '0023456789', 'P', '2025-06-08 19:04:54', NULL),
(7, 7, 'Fajar Pratama', 'Jl. Teratai No. 2', 'Banjarmasin, 2007-12-01', 'IX-A', 'IX', '0043210987', 'L', '2025-06-08 19:04:54', NULL),
(8, 8, 'Nur Aini', 'Jl. Cemara No. 6', 'Banjarbaru, 2009-07-09', 'VIII-A', 'VIII', '0091234567', 'P', '2025-06-08 19:04:54', NULL),
(9, 9, 'Ilham Saputra', 'Jl. Cendana No. 10', 'Banjarmasin, 2006-05-22', 'X-B', 'X', '0032109876', 'L', '2025-06-08 19:04:54', NULL),
(10, 10, 'Ayu Rahmawati', 'Jl. Jati No. 8', 'Martapura, 2010-02-14', 'VI-B', 'VI', '0019876543', 'P', '2025-06-08 19:04:54', NULL),
(11, 11, 'Rian Hidayat', 'Jl. Pinus No. 15', 'Banjarmasin, 2008-09-03', 'VII-C', 'VII', '0078987654', 'L', '2025-06-08 19:04:54', NULL),
(12, 12, 'Lina Marlina', 'Jl. Akasia No. 11', 'Banjarbaru, 2009-11-29', 'VIII-C', 'VIII', '0089876543', 'P', '2025-06-08 19:04:54', NULL),
(13, 13, 'Yoga Prasetyo', 'Jl. Meranti No. 13', 'Martapura, 2007-04-05', 'IX-B', 'IX', '0067890123', 'L', '2025-06-08 19:04:54', NULL),
(14, 14, 'Dina Safitri', 'Jl. Beringin No. 17', 'Banjarmasin, 2008-12-21', 'VII-A', 'VII', '0021987654', 'P', '2025-06-08 19:04:54', NULL),
(15, 1, 'Aditya Ramadhan', 'Jl. Kemuning No. 20', 'Banjarbaru, 2006-03-15', 'X-C', 'X', '0054321098', 'L', '2025-06-08 19:04:54', NULL),
(16, 2, 'Putri Amelia', 'Jl. Nangka No. 25', 'Banjarmasin, 2010-06-27', 'VI-C', 'VI', '0012340987', 'P', '2025-06-08 19:04:54', NULL),
(17, 3, 'Faisal Hakim', 'Jl. Salak No. 19', 'Martapura, 2007-09-12', 'IX-C', 'IX', '0034567890', 'L', '2025-06-08 19:04:54', NULL),
(18, 4, 'Nadya Ayu', 'Jl. Durian No. 24', 'Banjarbaru, 2009-01-18', 'VIII-B', 'VIII', '0089012345', 'P', '2025-06-08 19:04:54', NULL),
(19, 5, 'Bayu Nugroho', 'Jl. Pisang No. 23', 'Banjarmasin, 2006-12-06', 'X-A', 'X', '0023456781', 'L', '2025-06-08 19:04:54', NULL),
(20, 6, 'Mega Lestari', 'Jl. Jeruk No. 16', 'Martapura, 2008-10-08', 'VII-B', 'VII', '0092345678', 'P', '2025-06-08 19:04:54', NULL),
(21, 7, 'Rifqi Maulana', 'Jl. Sirsak No. 14', 'Banjarbaru, 2007-07-22', 'IX-A', 'IX', '0045678901', 'L', '2025-06-08 19:04:54', NULL),
(22, 8, 'Alifa Nuraini', 'Jl. Pepaya No. 27', 'Banjarmasin, 2009-08-30', 'VIII-A', 'VIII', '0076543209', 'P', '2025-06-08 19:04:54', NULL),
(23, 9, 'Gilang Ramadhan', 'Jl. Rambutan No. 21', 'Martapura, 2006-02-11', 'X-B', 'X', '0019082736', 'L', '2025-06-08 19:04:54', NULL),
(24, 10, 'Salma Putri', 'Jl. Kedondong No. 22', 'Banjarbaru, 2010-11-17', 'VI-B', 'VI', '0034567821', 'P', '2025-06-08 19:04:54', NULL),
(25, 11, 'Tegar Wibowo', 'Jl. Duku No. 30', 'Banjarmasin, 2008-03-25', 'VII-C', 'VII', '0089012765', 'L', '2025-06-08 19:04:54', NULL),
(26, 12, 'Yuni Kartika', 'Jl. Sawo No. 28', 'Martapura, 2009-05-14', 'VIII-C', 'VIII', '0067890312', 'P', '2025-06-08 19:04:54', NULL),
(27, 13, 'Handika Setiawan', 'Jl. Cempedak No. 29', 'Banjarbaru, 2007-06-05', 'IX-B', 'IX', '0023456712', 'L', '2025-06-08 19:04:54', NULL),
(28, 14, 'Laila Khairunnisa', 'Jl. Jambu No. 31', 'Banjarmasin, 2008-01-03', 'VII-A', 'VII', '0056789123', 'P', '2025-06-08 19:04:54', NULL),
(29, 1, 'Ilmi Rahman', 'Jl. Pandan No. 1', 'Banjarmasin, 2009-03-13', 'VII-D', 'VII', '0034537890', 'L', '2025-06-08 19:04:54', NULL),
(30, 2, 'Aisyah Farhana', 'Jl. Pandawa No. 2', 'Banjarbaru, 2010-12-11', 'VI-A', 'VI', '0043215678', 'P', '2025-06-08 19:04:54', NULL),
(31, 3, 'Zulfan Hakim baru', 'sadasd', 'asdasd', 'asdas', 'qqq', 'asd', 'P', '2025-06-08 19:04:54', NULL),
(32, 4, 'Maulida Rachma', 'Jl. Semangka No. 4', 'Banjarbaru, 2008-06-15', 'VIII-D', 'VIII', '0019823456', 'P', '2025-06-08 19:04:54', NULL),
(33, 5, 'Reza Pahlevi', 'Jl. Kawi No. 5', 'Banjarmasin, 2006-10-07', 'X-D', 'X', '0086754321', 'L', '2025-06-08 19:04:54', NULL),
(34, 6, 'Tiara Wulandari', 'Jl. Merpati No. 6', 'Martapura, 2008-04-23', 'VII-D', 'VII', '0071234567', 'P', '2025-06-08 19:04:54', NULL),
(35, 7, 'Andi Ramzi', 'Jl. Rajawali No. 7', 'Banjarbaru, 2007-08-14', 'IX-D', 'IX', '0034567001', 'L', '2025-06-08 19:04:54', NULL),
(36, 8, 'Selvi Mariana', 'Jl. Elang No. 8', 'Banjarmasin, 2009-09-18', 'VIII-D', 'VIII', '0067890098', 'P', '2025-06-08 19:04:54', NULL),
(37, 9, 'Iqbal Dwi Putra', 'Jl. Garuda No. 9', 'Martapura, 2006-11-03', 'X-D', 'X', '0012345566', 'L', '2025-06-08 19:04:54', NULL),
(38, 10, 'Yulianti', 'Jl. Kasuari No. 10', 'Banjarbaru, 2010-01-22', 'VI-D', 'VI', '0023987654', 'P', '2025-06-08 19:04:54', NULL),
(39, 11, 'Sahrul Ramadhan', 'Jl. Alalak No. 11', 'Banjarmasin, 2008-07-04', 'VII-E', 'VII', '0091234765', 'L', '2025-06-08 19:04:54', NULL),
(40, 12, 'Winda Sari', 'Jl. Kayu Manis No. 12', 'Martapura, 2009-10-19', 'VIII-E', 'VIII', '0045671234', 'P', '2025-06-08 19:04:54', NULL),
(41, 13, 'Rahmat Hidayah', 'Jl. Ketapang No. 13', 'Banjarbaru, 2007-02-27', 'IX-E', 'IX', '0031239876', 'L', '2025-06-08 19:04:54', NULL),
(42, 14, 'Indah Prameswari', 'Jl. Kapuk No. 14', 'Banjarmasin, 2008-05-29', 'VII-F', 'VII', '0067123098', 'P', '2025-06-08 19:04:54', NULL),
(43, 1, 'Donny Kurniawan', 'Jl. Belimbing No. 15', 'Banjarbaru, 2006-04-01', 'X-E', 'X', '0023456123', 'L', '2025-06-08 19:04:54', NULL),
(44, 2, 'Sarah Putri', 'Jl. Bengkuang No. 16', 'Banjarmasin, 2010-02-13', 'VI-E', 'VI', '0043218901', 'P', '2025-06-08 19:04:54', NULL),
(45, 3, 'Iqra Syahril', 'Jl. Menteng No. 17', 'Martapura, 2007-05-05', 'IX-F', 'IX', '0098765321', 'L', '2025-06-08 19:04:54', NULL),
(46, 4, 'Annisa Rahmi', 'Jl. Kayu Putih No. 18', 'Banjarbaru, 2008-08-08', 'VIII-F', 'VIII', '0087654332', 'P', '2025-06-08 19:04:54', NULL),
(47, 5, 'Ali Akbar', 'Jl. Bima No. 19', 'Banjarmasin, 2006-09-09', 'X-F', 'X', '0012233445', 'L', '2025-06-08 19:04:54', NULL),
(48, 6, 'Melati Hasanah', 'Jl. Pandega No. 20', 'Martapura, 2008-02-17', 'VII-F', 'VII', '0056789012', 'P', '2025-06-08 19:04:54', NULL),
(49, 7, 'Gani Ramdhan', 'Jl. Kemuning No. 21', 'Banjarbaru, 2007-06-30', 'IX-G', 'IX', '0067892210', 'L', '2025-06-08 19:04:54', NULL),
(50, 8, 'Yolanda Oktaviani', 'Jl. Sempati No. 22', 'Banjarmasin, 2009-03-11', 'VIII-G', 'VIII', '0034567002', 'P', '2025-06-08 19:04:54', NULL),
(51, 1, 'Rendy Saputra', 'Jl. Amandit No. 1', 'Banjarmasin, 2007-02-01', 'VII-A', 'VII', '0076000001', 'L', '2025-06-08 19:07:00', NULL),
(52, 2, 'Zahra Indah', 'Jl. Asam No. 2', 'Banjarbaru, 2008-03-02', 'VIII-A', 'VIII', '0076000002', 'P', '2025-06-08 19:07:00', NULL),
(53, 3, 'Galang Rizki', 'Jl. Pisang No. 3', 'Martapura, 2006-04-03', 'IX-A', 'IX', '0076000003', 'L', '2025-06-08 19:07:00', NULL),
(54, 4, 'Yuliana Fitri', 'Jl. Durian No. 4', 'Banjarmasin, 2009-05-04', 'VII-B', 'VII', '0076000004', 'P', '2025-06-08 19:07:00', NULL),
(55, 5, 'Imam Ghozali', 'Jl. Rambutan No. 5', 'Banjarbaru, 2007-06-05', 'VIII-B', 'VIII', '0076000005', 'L', '2025-06-08 19:07:00', NULL),
(56, 6, 'Kiki Amelia', 'Jl. Mangga No. 6', 'Martapura, 2010-07-06', 'VI-A', 'VI', '0076000006', 'P', '2025-06-08 19:07:00', NULL),
(57, 7, 'Fadil Nurhadi', 'Jl. Duren No. 7', 'Banjarmasin, 2008-08-07', 'VII-C', 'VII', '0076000007', 'L', '2025-06-08 19:07:00', NULL),
(58, 8, 'Mega Surya', 'Jl. Sirsak No. 8', 'Banjarbaru, 2006-09-08', 'IX-B', 'IX', '0076000008', 'P', '2025-06-08 19:07:00', NULL),
(59, 9, 'Ridho Salim', 'Jl. Apel No. 9', 'Martapura, 2007-10-09', 'VIII-C', 'VIII', '0076000009', 'L', '2025-06-08 19:07:00', NULL),
(60, 10, 'Anisa Lutfia', 'Jl. Semangka No. 10', 'Banjarmasin, 2009-11-10', 'VII-D', 'VII', '0076000010', 'P', '2025-06-08 19:07:00', NULL),
(61, 11, 'Reza Fahmi', 'Jl. Jambu No. 11', 'Banjarbaru, 2008-12-11', 'VIII-D', 'VIII', '0076000011', 'L', '2025-06-08 19:07:00', NULL),
(62, 12, 'Nadia Safira', 'Jl. Nangka No. 12', 'Martapura, 2006-01-12', 'IX-C', 'IX', '0076000012', 'P', '2025-06-08 19:07:00', NULL),
(63, 13, 'Ihsan Pradana', 'Jl. Alpukat No. 13', 'Banjarmasin, 2007-02-13', 'X-A', 'X', '0076000013', 'L', '2025-06-08 19:07:00', NULL),
(64, 14, 'Salsabila Nuraini', 'Jl. Kedondong No. 14', 'Banjarbaru, 2009-03-14', 'VI-B', 'VI', '0076000014', 'P', '2025-06-08 19:07:00', NULL),
(65, 1, 'Taufik Hidayat', 'Jl. Duku No. 15', 'Martapura, 2008-04-15', 'VII-E', 'VII', '0076000015', 'L', '2025-06-08 19:07:00', NULL),
(66, 2, 'Citra Ramadhani', 'Jl. Cempedak No. 16', 'Banjarmasin, 2010-05-16', 'VIII-E', 'VIII', '0076000016', 'P', '2025-06-08 19:07:00', NULL),
(67, 3, 'Farhan Rasyid', 'Jl. Belimbing No. 17', 'Banjarbaru, 2006-06-17', 'IX-D', 'IX', '0076000017', 'L', '2025-06-08 19:07:00', NULL),
(68, 4, 'Lidya Ayuningtyas', 'Jl. Melon No. 18', 'Martapura, 2007-07-18', 'X-B', 'X', '0076000018', 'P', '2025-06-08 19:07:00', NULL),
(69, 5, 'Zaki Maulana', 'Jl. Pandan No. 19', 'Banjarmasin, 2009-08-19', 'VII-F', 'VII', '0076000019', 'L', '2025-06-08 19:07:00', NULL),
(70, 6, 'Maura Kurniasih', 'Jl. Bengkuang No. 20', 'Banjarbaru, 2008-09-20', 'VIII-F', 'VIII', '0076000020', 'P', '2025-06-08 19:07:00', NULL),
(71, 7, 'Adnan Wijaya', 'Jl. Kapuk No. 21', 'Martapura, 2006-10-21', 'IX-E', 'IX', '0076000021', 'L', '2025-06-08 19:07:00', NULL),
(72, 8, 'Dian Lestari', 'Jl. Kawi No. 22', 'Banjarmasin, 2007-11-22', 'X-C', 'X', '0076000022', 'P', '2025-06-08 19:07:00', NULL),
(73, 9, 'Rafi Hendra', 'Jl. Meranti No. 23', 'Banjarbaru, 2009-12-23', 'VI-C', 'VI', '0076000023', 'L', '2025-06-08 19:07:00', NULL),
(74, 10, 'Silvi Oktaviani', 'Jl. Salak No. 24', 'Martapura, 2008-01-24', 'VII-G', 'VII', '0076000024', 'P', '2025-06-08 19:07:00', NULL),
(75, 11, 'Ivan Prakoso', 'Jl. Rajawali No. 25', 'Banjarmasin, 2006-02-25', 'IX-F', 'IX', '0076000025', 'L', '2025-06-08 19:07:00', NULL),
(76, 12, 'Devi Yuliani', 'Jl. Elang No. 26', 'Banjarbaru, 2007-03-26', 'VIII-G', 'VIII', '0076000026', 'P', '2025-06-08 19:07:00', NULL),
(77, 13, 'Iqbal Alamsyah', 'Jl. Garuda No. 27', 'Martapura, 2009-04-27', 'X-D', 'X', '0076000027', 'L', '2025-06-08 19:07:00', NULL),
(78, 14, 'Ratna Maharani', 'Jl. Kasuari No. 28', 'Banjarmasin, 2008-05-28', 'VII-H', 'VII', '0076000028', 'P', '2025-06-08 19:07:00', NULL),
(79, 1, 'Ilham Rizky', 'Jl. Pandega No. 29', 'Banjarbaru, 2006-06-29', 'IX-G', 'IX', '0076000029', 'L', '2025-06-08 19:07:00', NULL),
(80, 2, 'Dewi Ramadani', 'Jl. Sempati No. 30', 'Martapura, 2007-07-30', 'VIII-H', 'VIII', '0076000030', 'P', '2025-06-08 19:07:00', NULL),
(81, 3, 'Fikri Nurhuda', 'Jl. Walet No. 31', 'Banjarmasin, 2009-08-31', 'X-E', 'X', '0076000031', 'L', '2025-06-08 19:07:00', NULL),
(82, 4, 'Putri Nirmala', 'Jl. Beo No. 32', 'Banjarbaru, 2008-09-01', 'VI-D', 'VI', '0076000032', 'P', '2025-06-08 19:07:00', NULL),
(83, 5, 'Rizal Ardiansyah', 'Jl. Angsa No. 33', 'Martapura, 2006-10-02', 'VII-I', 'VII', '0076000033', 'L', '2025-06-08 19:07:00', NULL),
(84, 6, 'Aulia Sari', 'Jl. Cendrawasih No. 34', 'Banjarmasin, 2007-11-03', 'VIII-I', 'VIII', '0076000034', 'P', '2025-06-08 19:07:00', NULL),
(85, 7, 'Agus Firmansyah', 'Jl. Cemara No. 35', 'Banjarbaru, 2009-12-04', 'IX-H', 'IX', '0076000035', 'L', '2025-06-08 19:07:00', NULL),
(86, 8, 'Rina Astuti', 'Jl. Kenari No. 36', 'Martapura, 2008-01-05', 'X-F', 'X', '0076000036', 'P', '2025-06-08 19:07:00', NULL),
(87, 9, 'Wahyu Nugroho', 'Jl. Pahlawan No. 37', 'Banjarmasin, 2006-02-06', 'VII-J', 'VII', '0076000037', 'L', '2025-06-08 19:07:00', NULL),
(88, 10, 'Zahra Syakira', 'Jl. Veteran No. 38', 'Banjarbaru, 2007-03-07', 'VIII-J', 'VIII', '0076000038', 'P', '2025-06-08 19:07:00', NULL),
(89, 11, 'Hadi Permana', 'Jl. Merdeka No. 39', 'Martapura, 2009-04-08', 'IX-I', 'IX', '0076000039', 'L', '2025-06-08 19:07:00', NULL),
(90, 12, 'Nisa Khairunisa', 'Jl. Kebangsaan No. 40', 'Banjarmasin, 2008-05-09', 'X-G', 'X', '0076000040', 'P', '2025-06-08 19:07:00', NULL),
(91, 13, 'Rendy Alfarizi', 'Jl. Bahagia No. 41', 'Banjarbaru, 2006-06-10', 'VI-E', 'VI', '0076000041', 'L', '2025-06-08 19:07:00', NULL),
(92, 14, 'Aisyah Ramadhani', 'Jl. Damai No. 42', 'Martapura, 2007-07-11', 'VII-K', 'VII', '0076000042', 'P', '2025-06-08 19:07:00', NULL),
(93, 1, 'Yusuf Hamka', 'Jl. Mufakat No. 43', 'Banjarmasin, 2009-08-12', 'VIII-K', 'VIII', '0076000043', 'L', '2025-06-08 19:07:00', NULL),
(94, 2, 'Dina Azzahra', 'Jl. Bina Rakyat No. 44', 'Banjarbaru, 2008-09-13', 'IX-J', 'IX', '0076000044', 'P', '2025-06-08 19:07:00', NULL),
(95, 3, 'Abdi Negara', 'Jl. Sukamaju No. 45', 'Martapura, 2006-10-14', 'X-H', 'X', '0076000045', 'L', '2025-06-08 19:07:00', NULL),
(96, 4, 'Rika Aprilia', 'Jl. Pusaka No. 46', 'Banjarmasin, 2007-11-15', 'VI-F', 'VI', '0076000046', 'P', '2025-06-08 19:07:00', NULL),
(97, 5, 'Bagas Alamsyah', 'Jl. Cinta Damai No. 47', 'Banjarbaru, 2009-12-16', 'VII-L', 'VII', '0076000047', 'L', '2025-06-08 19:07:00', NULL),
(98, 6, 'Larasati Cahyani', 'Jl. Kemenangan No. 48', 'Martapura, 2008-01-17', 'VIII-L', 'VIII', '0076000048', 'P', '2025-06-08 19:07:00', '2025-06-08 19:08:52'),
(99, 7, 'Yayan Hidayat', 'Jl. Perjuangan No. 49', 'Banjarmasin, 2006-02-18', 'IX-K', 'IX', '0076000049', 'L', '2025-06-08 19:07:00', NULL),
(100, 8, 'Della Rahmania', 'Jl. Pejuang No. 50', 'Banjarbaru, 2007-03-19', 'X-I', 'X', '0076000050', 'P', '2025-06-08 19:07:00', NULL),
(101, 2, 'Cecil Hahn II', '8874 Moen Valleys', 'North Stone, Mon May 12 2025 02:13:42 GMT+0800 (Central Indonesia Time)', '1y', '265', '12520362', 'L', '2025-06-08 19:08:57', NULL),
(102, 2, 'Dustin Buckridge', '575 Violette Court', 'Lelahberg, Tue Feb 25 2025 23:35:07 GMT+0800 (Central Indonesia Time)', 'uf', '341', '30605115', 'L', '2025-06-13 21:23:38', NULL),
(103, 2, 'aaaaaaaaaaaaaaasd', 'aaaaaaaaaaaaaaasd', 'aaaaaaaaaaaaaaasd', 'aaaaaaaaaaaaaaasd', 'aaaaaaaaaaaaaaasd', 'aaaaaaaaaaaaaaasd', 'L', '2025-06-18 22:25:08', '2025-06-18 22:25:40'),
(104, 10, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'P', '2025-06-19 07:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `operator_lembaga_pendidikan`
--

CREATE TABLE `operator_lembaga_pendidikan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lembaga_pendidikan_id` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_lembaga_pendidikan`
--

INSERT INTO `operator_lembaga_pendidikan` (`id`, `user_id`, `lembaga_pendidikan_id`, `deleted_at`, `created_at`) VALUES
(1, 5, 1, NULL, '2025-06-06 19:57:34'),
(2, 6, 2, NULL, '2025-06-06 19:58:58'),
(3, 7, 2, '2025-06-08 09:20:34', '2025-06-08 09:17:33'),
(4, 8, 4, NULL, '2025-06-08 09:17:40');

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
  `nik` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `lembaga_pendidikan_id`, `jabatan_staff_id`, `nama`, `alamat`, `no_hp`, `email`, `jenis_kelamin`, `nik`, `created_at`, `deleted_at`) VALUES
(1, 3, 2, 'Ahmad Fauzi', 'Jl. Merpati No. 4', '081234567890', 'ahmad.fauzi@email.com', 'L', '7305010101010001', '2024-11-10 09:30:00', NULL),
(2, 7, 1, 'Siti Aminah', 'Jl. Melati No. 7', '082233445566', 'siti.aminah@email.com', 'P', '7305010202020002', '2025-01-15 11:20:00', NULL),
(3, 1, 4, 'Dedi Saputra', 'Jl. Cempaka No. 3', '081312345678', 'dedi.saputra@email.com', 'L', '7305010303030003', '2024-12-22 08:10:00', NULL),
(4, 5, 3, 'Nur Aisyah', 'Jl. Dahlia No. 2', '081987654321', 'nur.aisyah@email.com', 'P', '7305010404040004', '2025-03-01 14:45:00', NULL),
(5, 2, 2, 'Dale Legros', '3495 Jana Coves', '313-438-4370', 'Janiya_Kutch@hotmail.com', 'L', '67543022', '2025-02-18 13:25:00', NULL),
(6, 4, 5, 'Lilis Kurniawati', 'Jl. Mawar No. 6', '081245678901', 'lilis.kurnia@email.com', 'P', '7305010606060006', '2024-10-20 15:00:00', NULL),
(7, 2, 7, 'Zulkifli Hasan', 'Jl. Anggrek No. 5', '083145678912', 'zulkifli.hasan@email.com', 'L', '7305010707070007', '2025-04-01 10:00:00', '2025-06-18 21:38:09'),
(8, 9, 5, 'Rina Marlina baru', 'Jl. Teratai No. 1 baru', '082145679013 baru', 'rina.marlina@email.com baru', 'L', '7305010808080008 bar', '2025-05-10 09:10:00', NULL),
(9, 6, 1, 'Andi Prasetyo', 'Jl. Kenanga No. 10', '081312349876', 'andi.prasetyo@email.com', 'L', '7305010909090009', '2025-06-01 16:30:00', NULL),
(10, 8, 4, 'Maya Fitriani', 'Jl. Seroja No. 11', '081298765432', 'maya.fitriani@email.com', 'P', '7305011010100010', '2025-06-07 12:45:00', '2025-06-08 18:33:16'),
(11, 2, 2, 'Olive Nienow', '22347 Melyssa Parkways', '480-424-5051', 'Ida_Maggio@hotmail.com', 'L', '82218084', '2025-06-08 18:37:38', NULL),
(12, 2, 2, 'Harvey Morara', '51354 Baby Road', '357-784-7608', 'Suzanne.Braun43@yahoo.com', '', '08567682', '2025-06-08 19:14:09', NULL),
(13, 2, 5, 'Levi Considinea', '32290 Holly Spurs', '727-446-2674', 'Trent.Zulauf39@hotmail.com', '', '01317755', '2025-06-08 19:15:04', NULL),
(14, 2, 5, 'Kelley Nienowa', '33785 Tad Cliff', '648-590-0866', 'Eliezer79@yahoo.com', 'P', '56092251', '2025-06-18 21:00:12', NULL),
(15, 9, 1, 'udin', 'asdasd', 'asd', 'asd', 'P', 'asd', '2025-06-18 21:43:58', NULL),
(16, 9, 1, 'udin', 'asdasd', 'asd', 'asd', 'L', 'asd', '2025-06-18 21:53:39', NULL),
(17, 9, 1, 'udin baru baru', 'asdasd', 'asd', 'asd', 'L', 'asd', '2025-06-18 21:53:49', NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `deleted_at`, `created_at`) VALUES
(1, 'admin', '$2y$10$6/I3CKV7PM/cQWS4rv3mrOmNjM4CdnSYAyPbygT35BnaoaH3f4a6a', 'admin', NULL, '2025-06-06 13:55:12'),
(2, 'pimpinan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pimpinan', NULL, '2025-06-06 13:55:12'),
(3, 'Penelope.Hermann', '$2y$10$jbbXyiI4wfZYdS7RZppi5eXjTO/NPxpv26F9YSW4Y9NmIRnRqZs.a', '', NULL, '2025-06-06 15:02:52'),
(4, 'Stanton.Lubowitz', '$2y$10$IJJhXnDiyjXtS2YQnrVizugqlrOLBzYlEFW38/fib4uvoT4jUEjJW', 'staff', '2025-06-17 18:47:22', '2025-06-06 16:26:30'),
(5, 'Alexane.Bailey', '$2y$10$aptH5sF3DqwlAXd4hcv73.WiItTTEhn.kNN7rHxihMsqg9h.hf4Ji', 'operator', NULL, '2025-06-06 19:47:26'),
(6, 'Marcelina30', '$2y$10$sbRVjKHUfrJuT6Napnov..wVIlh1BKrNrdz7ePzAQbxmTOBliYQPG', 'operator', NULL, '2025-06-06 19:47:28'),
(7, 'Emiliano_Reinger', '$2y$10$7MjWn0uFPa0Azi0M5LCasuCnAeC85Bx8BPBYVrX4118lQSES8NR.m', 'operator', NULL, '2025-06-06 19:47:30'),
(8, 'Columbus.Pagac2', '$2y$10$SAvOP3DhVovZppFmeAdLpO0JU9F9nKlYeG1.atiVobHC96/tM1gjq', 'operator', NULL, '2025-06-06 19:47:31'),
(9, 'Gisselle30 baru', '$2y$10$Qu5GEeHtTN4wC3tmGlUN2ujFtzOPQICjHpzn7aHbO5MYrUlaVJL2a', 'staff', NULL, '2025-06-06 19:47:33'),
(10, 'Carolina85', '$2y$10$TlkSHbs.Xr/re4G78JilqO2fvsTOwDRB4zVi.HslY72InpLbMcbwe', 'admin', '2025-06-15 18:37:05', '2025-06-15 18:36:08'),
(11, 'udin', '$2y$10$MBSwf3N09b6MUinxplmM4OdQScwRrst0GihNZcCGxJlpqzahFubWO', 'staff', NULL, '2025-06-15 19:06:02'),
(13, 'udinss', '$2y$10$ev80x85CiWy37yZFmnQ2x.32dBkIe8F.Es38YNz0JhySZ/Fc4riQ.', 'operator', NULL, '2025-06-15 19:08:40'),
(14, 'cek', '$2y$10$bbpdg6o2tJUxpHk/NjIuUO.OsK6vVl97ikLGT0OoDzHQb/5SFzTcC', 'staff', NULL, '2025-06-15 19:14:15'),
(15, 'marco', '$2y$10$DI23BbprFYgqle79kaRRWe7KBWj3EsVPgtZUhbnbR50w2kP/7hksi', 'staff', NULL, '2025-06-16 21:30:48'),
(17, 'udin3', '$2y$10$xR4YEsLm5dNQrvpvYGrO/eN31vCvUJ7y9ftP..stCStIB1iFhhqjG', 'staff', NULL, '2025-06-16 21:49:13');

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
  ADD UNIQUE KEY `unique_user_id` (`user_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_lembaga_pendidikan`
--
ALTER TABLE `jenis_lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lembaga_pendidikan`
--
ALTER TABLE `lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `operator_lembaga_pendidikan`
--
ALTER TABLE `operator_lembaga_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
