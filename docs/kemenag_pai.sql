-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2025 at 04:02 PM
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

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `user_id`) VALUES
(1, 'BANJARBARU SELATAN', 0),
(2, 'LIANG ANGGANG', 0),
(3, 'CEMPAKA', 0),
(4, 'LANDASAN ULIN', 0),
(5, 'BANJARBARU UTARA', 0);

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

--
-- Dumping data for table `lembaga_mdt`
--

INSERT INTO `lembaga_mdt` (`id`, `lembaga`, `nomor_statistik`, `alamat`, `nama_kepala`, `jumlah_murid`, `jumlah_pengajar`, `deleted_at`, `user_id`, `status`, `keterangan`) VALUES
(1, 'AL-KHAIRIYAH', '311263720010', 'Jl.Paramuan', 'Syahran', 68, 12, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(2, 'NURUL HASANAH', '311263720001', 'Jl.H. Mistar Cokrokusumo', 'Nairul Fahmi', 26, 9, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(3, 'ROUDHOTUL MUTAALLIMIN', '311263720009', 'Jl.Batu Ampar', 'Sabidin', 73, 13, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(4, 'USHULUDDIN', '311263720011', 'Jl.Kuranji RT 32RW 05', 'Ali Hanafiah', 28, 5, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(5, 'SYAFAATUL MUMININ', '311263720006', 'JL.Kampung baru,Cempaka ,RT.026/09', 'Agus Supian', 32, 4, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(6, 'BAITUL HIKAM', '311263720012', 'Jl.Sinar Baru RT.24 RW.06 Kelurahan Sungai Ulin', 'Abdul Muthalib,S.HI', 39, 12, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(7, 'QURROTA \'AINIL HABIIB', '311263720017', 'JL. Trisakti Pumpung RT 031 RW 010 Kelurahan Sungai Tiung Kecamatan Cempaka Banjarbaru Kalimantan Selatan', NULL, 72, 7, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(8, 'MAU\'IZHATUL MU\'MININ', '311263720014', 'Jl. Mr. Cokrokusumo, Bangkal', NULL, 31, 8, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(9, 'MISBAHUL MUNIR', '311263720008', 'Batu Ampar Cempaka', 'Saifullah', 32, 8, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(10, 'IRSYADUL AULAD', '311263720005', 'Jl.Mistar Cokrokusumo Bangkal', 'Hormansyah', 27, 5, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(11, 'NURUL MUJAHIDINSSSSSSSS', '311263720007', 'Jl.Transpol,Beruntung Jaya,Rt 34/Rw 11', 'asd', 81, 9, NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(12, 'AL-AMANAHSSSSSSsssss', '321263720015', 'Jl. Balitan Komp. Tumut Hijau No. 07 Rt. 034 Rw. 011 Kel. Loktabat Utara', 'Mahfuzh', 104, 8, NULL, 0, 'DIPROSES', 'TANPA KETERANGAN'),
(13, 'Al-Test Tambah', '123', 'Jl. A. Yani Km. 23 Pondok Pesantren Al Falah Puteri', 'Udin Tambah', 123, 231, '2024-10-26', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(14, 'Al-AEDITEDIT', '6969', 'Jl. Veteran GangEDIT', 'Udin EditnEDIT', 234, 456, '2024-10-26', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(15, 'AAAAAAAAAAAAAAAA', 'asdsad', 'asdasd', 'asdasd', 123, 12312312, '2025-02-03', 0, 'DIPROSES', 'TANPA KETERANGAN'),
(16, 'AAAAAAAAAAAAAAAAAAA', 'aa', 'a', 'a', 12, 12000, '2025-02-03', 0, 'DISETUJUI', 'DATA DISETUJUI PERBIKI NAMA'),
(17, 'AAAAaaaasdddddddddsssssss', 'asdsad', 'asd', 'asda', 123, 123, NULL, 0, 'DIPROSES', 'Disetujui tanpa keterangan'),
(18, 'Data TEStsssssssssss', 'asd', 'asd', 'ads', 12, 12, NULL, 0, 'DIPROSES', 'Disetujui tanpa keterangan'),
(19, 'DAta test 23', 'asd', 'ads', 'asd', 12, 12, NULL, 0, 'DIPROSES', 'Disetujui tanpa keterangan');

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

--
-- Dumping data for table `lembaga_pontren`
--

INSERT INTO `lembaga_pontren` (`id`, `nspp`, `npsn`, `nama_lembaga`, `grup`, `jenjang`, `kecamatan_id`, `alamat`, `jumlah_santri_pria`, `jumlah_santri_wanita`, `jumlah_keseluruhan`, `deleted_at`, `user_id`, `status`, `keterangan`, `tanggal`) VALUES
(97, '510363720010', NULL, 'WARASATUL FUQAHA', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 1, 'JL. SUMBER ILMU , GUNTUNG PINANG', 147, 0, 147, NULL, 0, 'DISETUJUI', 'asd', '2025-02-06'),
(98, '510363720002', NULL, 'AL FALAH PUTERI', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'Jl. A. Yani Km. 23 Pondok Pesantren Al Falah Puteri', 0, 1959, 1959, NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06'),
(99, '510363720013', '69951836', 'SULLAMUL KHAIRIYAH', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 3, 'JL. H. MISTAR COKROKUSUMO CEMPAKA HULU', 226, 229, 455, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(100, '510363720019', NULL, 'Darul Hijrah 2 Banjarbaru', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 4, 'JL. HANDIL ARYA BIMA GUNTUNG HARAPAN RT 18 RW 003 BELAKANG AQUATICA WATERPARK KEL. GUNTUNG MANGGIS KEC. LANDASAN ULIN KOTA BANJARBARU', 50, 0, 50, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(101, '510363720017', NULL, 'RAUDHATUN NASYI`IN', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 1, 'JALAN BUMI BERKAT 7', 227, 0, 227, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(102, '510363720004', NULL, 'Nurul Ma`ad Putera', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'JL. GOLF', 125, 0, 125, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(103, '510063720033', NULL, 'DA\'WATUL ARSYADIAH', 'PONTREN', 'Kitab Kuning', 2, 'Jl. A. Yani KM. 17,5 Kota Citra graha', 250, 0, 250, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(104, '510363720024', NULL, 'NURUL MA\'AD PUTERI', 'PONTREN', 'Kitab Kuning', 2, 'JL. GOLF RT 10 RW 04', 0, 180, 180, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(105, '510063720030', NULL, 'PONDOK PESANTREN SALAFIYAH SYAIKH ABDUL QADIR AL JILANI', 'PONTREN', 'Kitab Kuning', 5, 'Jl. Guntung Manggis, Komp Raudhatul Muhibbin', 42, 73, 115, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(106, '510063720032', NULL, 'BAYTAL HIKMAH AL-HAMIDI AL-HASANI', 'PONTREN', 'Kitab Kuning', 2, 'Jl. Gubernur Syarkawi (Lingkar Utara)', 135, 80, 215, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(107, '510363720008', NULL, 'MIFTAHUL FALAH', 'PONTREN', 'Kitab Kuning', 1, 'JL. H. MR. COKROKUSUMO (BUMI BERKAT I) RT. 01 RW. 02 SUNGAI BESAR', 101, 0, 101, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(108, '510063720028', NULL, 'KARAMATUL AULIA', 'PONTREN', 'Kitab Kuning', 2, 'JL. Kelurahan Kel.Landasan Ulin', 250, 0, 250, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(109, '510363720023', NULL, 'Wali Songo Fiddarissalam Puteri', 'PONTREN', 'Kitab Kuning', 4, 'JL. ABADI III (PALM) RT/RW. 06/07', 0, 110, 110, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(110, '502363720022', NULL, 'MUHAMMADIYAH BOARDING SCHOOL (MBS) BANJARBARU', 'PONTREN', 'Kitab Kuning', 1, 'JL. SOEKARNO HATTA /TRIKORA NO 12 RT.02/04', 52, 43, 95, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(111, '510063720034', NULL, 'NURUL IMAN MA\'HAD BA\'ABUD', 'PONTREN', 'Kitab Kuning', 1, 'Jl. Amanah RT.04 RW.02', 70, 0, 70, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(112, '510063720016', NULL, 'Al-Bidayah', 'PONTREN', 'Kitab Kuning', 3, 'JL. AL-BIDAYAH KAMPUNG HANYAR', 87, 48, 135, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(113, '512363720020', NULL, 'Shafwatul qur\'aniyyah', 'PONTREN', 'Kitab Kuning', 2, 'PERUMAHAN KAMPOENG SHAFWAH ASRI LANDASAN ULIN', 76, 48, 124, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(114, '510063720026', NULL, 'PONDOK PESANTREN NURUL FIKRI BANJARBARU', 'PONTREN', 'Kitab Kuning', 4, 'JL. GUNTUNG PARING RT. 36 RW. 07', 226, 220, 446, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(115, '500363720021', NULL, 'DAARUL IHSAN ISLAMIC BOARDING SCHOOL', 'PONTREN', 'Kitab Kuning', 2, 'JLN. A. YANI KM. 24', 64, 23, 87, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(116, '510063720025', NULL, 'AL-MUHAJIRIN III', 'PONTREN', 'Kitab Kuning', 4, 'JL. KURANJI RT 32 RW 05', 465, 0, 465, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(117, '510063720031', NULL, 'QALBUN SALIM', 'PONTREN', 'Kitab Kuning', 4, 'Jl. Akasia II', 29, 9, 38, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(118, '510063720027', NULL, 'PONDOK PESANTREN TAHFIDZUL QURAN RAUDLATUL MUTAALLIMIN ANNAHDLIYAH', 'PONTREN', 'Kitab Kuning', 4, 'Jl. Guntung Manggis No.40 Rt.18/Rw.03', 20, 19, 39, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(119, '510063720029', NULL, 'PONDOK PESANTREN AL HIDAYAH BANJARBARU', 'PONTREN', 'Kitab Kuning', 1, 'Jalan Sidodadi II RT 4 RW 5', 67, 73, 140, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(120, '510263720035', NULL, 'Darul Karim', 'PONTREN', 'Kitab Kuning', 5, 'Jl. Hijrah Jaya RT.013 RW.003', 61, 0, 61, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(121, '510363726011', NULL, 'WALI SONGO FIDDARISSALAM PUTERA', 'PONTREN', 'Kitab Kuning', 4, 'JL. PESANTREN GUNTUNG MANGGIS', 98, 0, 98, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(122, '510263720036', NULL, 'Daarul Ghuroba', 'PONTREN', 'Kitab Kuning', 4, 'Jln Palm Raya Banjarbaru', 25, 19, 44, NULL, 0, 'DISETUJUI', NULL, '2025-02-06'),
(123, '510263720037', '', 'Nurul Azhar Kalimantan', 'PONTREN', 'Kitab Kuning', 3, 'Jl. Gajah Mada Rt.033 Rw.010', 73, 16, 89, NULL, 0, 'DIPROSES', NULL, '2025-02-06'),
(124, '510263720038', '', 'Darul Ilmi Puterisssssss', 'PONTREN', 'Kitab Kuning', 2, 'JL. A. YANI KM. 19.200', 0, 884, 884, NULL, 0, 'DIPROSES', NULL, '2025-02-06'),
(125, '510363720003', '', 'DARUL ILMISSS', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'JL. A. YANI KM. 19.200 KEL. LANDASAN ULIN BARAT', 1313, 0, 1313, NULL, 0, 'DIPROSES', NULL, '2025-02-06'),
(126, '510363720018', '', 'Sulaimaniyah Gaming', 'PONTREN', 'Kitab Kuning', 1, 'Jl. Sidodadi No.1 RT.01 RW.01', 13, 0, 13, NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06'),
(127, '123', '123', 'Test Add', 'j12', '123', 1, '4', 4, 4, 8, '2024-10-26', 0, 'DISETUJUI', NULL, '2025-02-06'),
(128, '123', '123', '123', '123', '123', 2, '123', 123, 123, 123, '2024-10-26', 0, 'DISETUJUI', NULL, '2025-02-06'),
(129, '1234', '4321', '234234234', '324', '234', 4, '234', 234, 234, 234, '2024-10-26', 0, 'DISETUJUI', NULL, '2025-02-06'),
(130, 'test-delete', 'test-delete', 'test-delete', 'test-delete', 'test-delete', 2, 'test-delete', 123, 123, 123, '2024-10-02', 0, 'DISETUJUI', NULL, '2025-02-06'),
(131, '99', '99', 'AA EDIT EDIT', '99', '99', 5, '99', 99, 99, 99, '2024-10-26', 0, 'DISETUJUI', NULL, '2025-02-06'),
(132, 'ASDSAD', 'ASDASD', 'ASDASD', 'ASDASD', 'ASDASD', 3, 'ASDASD', 12, 12, 12, '2025-02-03', 0, 'DIPROSES', NULL, '2025-02-06'),
(133, 'testttt', 'asdasd', 'asdasd', 'asdsad', 'asdsad', 2, 'asdsasd', 12, 12, 12, '2025-02-03', 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06'),
(134, 'asda', 'asda', 'asdasd', 'asdasd', 'asdsad', 4, 'asdasd', 1213, 12, 1111111, '2025-02-03', 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06'),
(135, 'Data Tester', 'Data Tester', 'AAAAAAAAA', 'Data Tester', 'Data Tester', 1, 'Data Tester', 123, 12, 135, '2025-02-03', 0, 'DISETUJUI', 'dietuji', '2025-02-06'),
(136, 'AAAAAAAaaasdddddd', 'asdddsssssssssssssss', 'asddd', 'asd', 'asd', 4, 'asd', 123, 12, 123, NULL, 0, 'DIPROSES', 'Disetujui tanpa keterangan', '2025-02-06'),
(137, '123123', '', 'asdasdssssssssssssss', 'asdasd', 'adsasd', 1, 'asdasd', 1212, 12, 1212, NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06'),
(138, 'asd', '', 'Data BarussssssSSSSSSsss', 'asd', 'asd', 1, '12', 1212, 1212, 2147483647, NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan', '2025-02-06');

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

--
-- Dumping data for table `murid_mdt`
--

INSERT INTO `murid_mdt` (`id`, `lembaga_id`, `nama`, `ttl`, `nisn`, `jenis_kelamin`, `rombel_kelas`, `tingkat`, `deleted_at`, `user_id`, `status`, `keterangan`) VALUES
(89, 2, 'FATIAH', '2014-08-25', NULL, 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(90, 2, 'Muhammad Nur Ilmi', '2015-10-17', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(91, 2, 'NAZIFA', '2014-09-25', NULL, 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(92, 2, 'ABDILLAH', '2014-11-03', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(93, 2, 'KHOLILURRAHMAN', '2014-05-06', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(94, 2, 'AHMAD RIPA`I', '2014-08-12', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(95, 2, 'AHMAD RIZAL MALIK HADRIAN', '2015-12-23', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(96, 2, 'IRSAL BAQIA', '2012-12-22', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(97, 2, 'MUHAMMAD HIZBALLOH', '2014-11-02', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(98, 2, 'MUHAMMAD NAJIB MUBAROK', '2015-01-06', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(99, 2, 'MUHAMMAD RIZQI', '2011-06-27', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(100, 2, 'MUHAMMAD SAJAD', '2014-09-05', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(101, 2, 'MUHAMMD RISWAN', '2012-11-06', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(102, 2, 'AHMAD RIZQON', '2014-04-01', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(103, 2, 'SUBER MUNTASAR', '2010-11-20', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(104, 2, 'AHMAD RIZQI', '2011-10-18', NULL, 'laki-laki', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(105, 2, 'MUHAMMAD ALVIAN SYAPUTRA', '2010-11-28', NULL, 'laki-laki', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(106, 2, 'MUHAMMAD HAFI', '2012-01-03', NULL, 'laki-laki', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(107, 2, 'MUHAMMAD ROSYID HAMIDI', '2013-01-11', NULL, 'laki-laki', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(108, 2, 'MUTIA RIZQI', '2012-05-13', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(109, 2, 'MUTIARA SHOLEHAH', NULL, NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(110, 2, 'NAJWA NUR AZKIA', '2012-01-26', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(111, 2, 'RISYDA KHOIRO', '2012-04-07', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(112, 2, 'YASMIN AZWA', '2012-07-17', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(113, 2, 'YAUMI FITRI', '2012-02-02', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(114, 2, 'YUMNA FAZIRA', '2013-04-14', NULL, 'Perempuan', '4', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(115, 3, 'MUHAMMAD RIZKI', '2015-10-27', NULL, 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(116, 3, 'ZAINATUL INAYAH', '2016-09-25', '3168869481', 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(117, 3, 'SITI KHOTIJAH', '2018-06-06', NULL, 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(118, 3, 'SHAFA SALSABILA', '2018-02-09', '3177164628', 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(119, 3, 'MUHAMMAD ASYRAF NAQIB', '2016-12-12', '3164908742', 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(120, 3, 'HIKMATUN NAZILA', '2017-10-24', '3178400155', 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(121, 3, 'AVIV SAIFULLAH', '2017-11-19', NULL, 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(122, 3, 'AQILLA SYIFA RAHAYU', '2016-12-30', '3168232653', 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(123, 3, 'MUHAMMAD ATO\'ILLAH', '2016-05-17', '3158973514', 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(124, 3, 'AFRIN ANISA', '2016-05-17', NULL, 'Perempuan', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(125, 3, 'ARSYIL ROHMAN', '2015-12-20', '3150791149', 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(126, 3, 'MUHAMMAD ZAKKY', '2017-08-10', NULL, 'laki-laki', '1A', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(127, 3, 'UMAR FADIL', '2016-05-08', '3163802030', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(128, 3, 'SEYTUNNUFUS', '2017-06-05', '3179340692', 'Perempuan', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(129, 3, 'MUHAMMAD FAJAR TRIARDIANSYAH', '2014-12-08', '3142023592', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(130, 3, 'REZA FIRDAUSA MUBAROK', '2015-03-20', '3158343617', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(131, 3, 'ANISATUL MAGFIROH', '2015-06-11', NULL, 'Perempuan', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(132, 3, 'SULAIMAN', '2012-07-09', '3126303895', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(133, 3, 'ALFIA', '2016-09-17', '3168818692', 'Perempuan', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(134, 3, 'MUHAMMAD AKBAR PRAMONO', '2015-08-22', '3150684694', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(135, 3, 'MUHAMMAD HAFIDZ ROMADHONI', '2016-06-16', '3163691630', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(136, 3, 'M. AZKAL WALID', '2016-09-04', '3162984384', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(137, 3, 'MUHAMMAD FIKRI RAMADHANI', '2016-03-22', '3165989468', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(138, 3, 'MUHAMMAD BADALI', '2010-12-29', '3141916037', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(139, 3, 'MUHAMMAD FAIRUZ NADIL AMRULLAH', '2015-05-01', '3152929351', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(140, 3, 'ARSYA MUHAMMAD NUR', '2014-12-18', '3142484078', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(141, 3, 'MUHAMMAD RIFKI ZIDANI', '2016-09-18', '3168030260', 'laki-laki', '1B', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(142, 3, 'FATIN AZKIA', '2016-08-20', '3163134364', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(143, 3, 'MUHAMMAD GUFRON', '2014-02-18', '3147915000', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(144, 3, 'YUNITA YUSRO', '2015-07-08', '3157980225', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(145, 3, 'NAJWATUL KHOIR', '2014-05-29', '3144205251', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(146, 3, 'ZAINATUN NASYFA', '2015-03-06', '3154710934', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(147, 3, 'LITA TALITA RISMA', '2015-07-01', '3157505762', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(148, 3, 'HOLIVA', '2015-02-13', '3153789773', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(149, 3, 'TAUFIK HIDAYATULLAH', '2011-11-11', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(150, 3, 'MUHAMMAD SUHDI', '2013-03-17', '3133904056', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(151, 3, 'MUHAMMAD RIJALUL MAHBUB', '2013-03-27', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(152, 3, 'AFIKAH ZAHROTUN', '2013-12-22', '3132260110', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(153, 3, 'SHOFIATUL MASRUROH', '2014-02-25', '3148511841', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(154, 3, 'FERDIYANSYAH', '2012-10-15', '3126736466', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(155, 3, 'NAILA AINUN TASYA', '2015-02-20', '3156319034', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(156, 3, 'SAFINATUN NAJA', '2013-05-01', '3138954677', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(157, 3, 'YASMIN ANISA FITRI', '2013-01-17', '3135251784', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(158, 3, 'ALIA ROSALINA', '2015-04-28', '3152153507', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(159, 3, 'IQBAL MAULANA', '2014-08-28', '3143804063', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(160, 3, 'ACHMAD BERIZI', '2014-09-10', '3140285261', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(161, 3, 'ARIA SAPUTRA', '2009-02-05', NULL, 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(162, 3, 'M. FAIZ', '2011-12-12', '3117250571', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(163, 3, 'RISKA AMILLIYA', '2014-01-06', '3141939382', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(164, 3, 'RIZQI HIDAYATULLO', '2014-02-14', '3147945948', 'laki-laki', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(165, 3, 'NURI RAMADANI', '2015-04-09', '3157430222', 'Perempuan', '2', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(166, 3, 'HANANIAH', '2013-01-22', '3139767792', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(167, 3, 'HARIYANA AZZAHRA', '2013-09-07', '3138032071', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(168, 3, 'RIDOLLA', '2012-05-17', '3120216133', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(169, 3, 'MUHAMMAD RIFATUL', '2014-03-27', '3148604851', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(170, 3, 'NURUL AZIZAH', '2015-05-08', NULL, 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(171, 3, 'YAZID DHIYAULHAQ', '2013-03-04', '3133637669', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(172, 3, 'INDAH ARINA', '2013-07-12', '3132751588', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(173, 3, 'ADIB AHMED', '2012-01-01', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(174, 3, 'NABILAH', '2014-05-16', '3145765453', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(175, 3, 'JUMINTA', '2014-03-24', '3145004727', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(176, 3, 'DIAH KENCANA', '2012-12-06', '3128091798', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(177, 3, 'GIVANT MAULANA', '2014-05-09', '3143123683', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(178, 3, 'ALISHA', '2014-09-10', '3140921888', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(179, 3, 'NADYA YAHYA', '2014-10-01', '3141121977', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(180, 3, 'TATANG', '2011-06-15', '3115758855', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(181, 3, 'HAZELIA', '2012-05-29', '3120482874', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(182, 3, 'MUFID SULTAN', '2012-01-21', '3111306237', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(183, 3, 'SITI RAHMAH', '2012-01-16', NULL, 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(184, 3, 'LEILA FARIDA', '2012-11-11', NULL, 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(185, 3, 'RIZQI PRADANA', '2013-09-10', '3138627068', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(186, 3, 'TAUFIK NUR', '2012-09-03', '3123380303', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(187, 3, 'FAYLA SALMA', '2012-12-24', NULL, 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(188, 3, 'DANNY', '2012-06-04', '3113255652', 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(189, 3, 'DINA HAFIZAH', '2013-06-09', NULL, 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(190, 3, 'ADINDA NURUL', '2014-07-22', '3142893888', 'Perempuan', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(191, 3, 'MUHAMMAD FAUZAN', '2015-10-11', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(192, 3, 'MUHAMMAD ILYAS', '2015-11-01', NULL, 'laki-laki', '3', 'ula', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(193, 4, 'Asyira AzahrAzahra Alfahm', '2017-05-10', NULL, 'Perempuan', '1', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(194, 4, 'M. Nazmi', '2017-10-08', NULL, 'laki-laki', '1', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(195, 4, 'M. RasyiRasyid ZuhZuhri', '2018-06-24', NULL, 'laki-laki', '1', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(196, 4, 'Rafassya', '2017-10-08', NULL, 'Perempuan', '1', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(197, 4, 'M. Sandy Arkan', '2017-03-24', NULL, 'laki-laki', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(198, 4, 'M. Rasyid Alfahm', '2012-11-16', NULL, 'laki-laki', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(199, 4, 'M. Nur Arif Bintang', '2016-11-17', NULL, 'laki-laki', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(200, 4, 'M. Walid', '2017-04-28', NULL, 'laki-laki', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(201, 4, 'Nur Hafiza', '2017-04-23', NULL, 'Perempuan', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(202, 4, 'Aurellia', '2016-01-05', NULL, 'Perempuan', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(203, 4, 'M. Romeo', '2016-10-06', NULL, 'laki-laki', '2', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(204, 4, 'M. Nazmi', '2014-10-20', NULL, 'laki-laki', '3', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(205, 4, 'Salma IzzatunIzzatunnisa', '2016-01-11', NULL, 'Perempuan', '3', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(206, 4, 'Adzkia Fazzila', '2015-01-12', NULL, 'Perempuan', '3', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(207, 4, 'Aprilia Wija', '2014-01-15', NULL, 'Perempuan', '3', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(208, 4, 'Aqila Kanza Salsabila', '2014-04-21', NULL, 'Perempuan', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(209, 4, 'Nafisah Azzahro', '2013-09-26', NULL, 'Perempuan', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(210, 4, 'Nayra Nb Afila Zahra', '2013-08-21', NULL, 'Perempuan', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(211, 4, 'M. Hatta Dinata', NULL, NULL, 'laki-laki', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(212, 4, 'M. Rusli Akhir', NULL, NULL, 'laki-laki', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(213, 4, 'M. Amin', NULL, NULL, 'laki-laki', '4', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(214, 4, 'M. Nabil', '2013-01-01', NULL, 'laki-laki', '5', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(215, 4, 'M. Alfi', '2014-01-01', NULL, 'laki-laki', '5', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(216, 4, 'Nazwa', NULL, NULL, 'Perempuan', '5', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(217, 4, 'Ghifari Akbar', '2013-10-28', NULL, 'laki-laki', '6', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(218, 4, 'Usman', '2013-10-26', NULL, 'laki-laki', '6', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(219, 4, 'Nijam', '2013-04-25', NULL, 'laki-laki', '6', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(220, 4, 'M. Iqbal', '2012-06-18', NULL, 'laki-laki', '6', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(221, 4, 'M. Naufal', '2013-10-01', NULL, 'laki-laki', '6', 'awwaliyah', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(222, 1, 'AA Tambah', '2024-10-28', '123', 'laki-laki', '13B', 'awaiyah', '2024-10-27', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(223, 3, 'AA EDIT EDIT LAGI', '2024-10-16', '123', 'Perempuan', '2A', 'UMY', '2024-10-27', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(224, 1, 'AAAAAAAAAA', '2025-01-27', 'aasd', 'laki-laki', 'asd', 'asd', '2025-02-03', 0, 'DISETUJUI', 'Disetujui tanpa keterangan'),
(225, 1, 'AAAAAAAAAAAAAasdasd', '2025-02-07', 'asd', 'laki-laki', 'asd', 'asdasd', '2025-02-03', 0, 'DISETUJUI', 'Disetujui tanpa keterangan'),
(226, 1, 'asd SSSS', '2025-02-06', 'asd', 'laki-laki', 'asd', 'asd', NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan');

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

--
-- Dumping data for table `staff_mdt`
--

INSERT INTO `staff_mdt` (`id`, `lembaga_id`, `nama`, `nik`, `jabatan`, `alamat`, `deleted_at`, `user_id`, `status`, `keterangan`) VALUES
(1, 2, 'NAIRUL FAHMI', '6372030312740001', 'Kepala', 'Sungai tiung RT.06 Rw.02 Kel.Sungai tiung Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(2, 2, 'M.ZARKASYI', '63720301503550001', 'Guru', 'Sungai tiung RT.04 Rw.02 Kel.Sungai tiung Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(3, 2, 'FAUZAN MUHTADI', '6372031505840002', 'Guru', 'Cempaka, Rt.07 Rw.03 Kel,Cempaka Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(4, 2, 'AHYANI', '63732031705770002', 'Guru', 'Sungai tiung RT.02 Rw.01 Kel.Sungai tiung Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(5, 2, 'SLAMET NOOR SODIK', '6372030707830002', 'Guru', 'Sungai tiung RT.05 Rw.02 Kel.Sungai tiung Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(6, 2, 'HELMI AZHAR', '6372031010870003', 'Guru', 'PESAYANGAN MARTAPURA', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(7, 2, 'BADARUDDIN', '6303050606730013', 'Guru', 'SEKUMPUL MARTAPURA', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(8, 2, 'LAILA SURAIYA', '6372034110740002', 'Guru', 'Cempaka, Rt.14 Rw.05 Kel,Cempaka Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(9, 2, 'HJ.NORMAKIAH', '6372034511770001', 'Guru', 'Sungai tiung RT.02 Rw.01 Kel.Sungai tiung Kec.Cempaka', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(10, 3, 'MOH YANTO', '3526100904970004', 'GURU', 'BATU AMPAR', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(11, 3, 'M. RIZQIE MUBARHOK', '6303060107810087', 'GURU', 'JL. P. SURYANATA DESA KIRAM RT 001 Rw.001 KEL. KIRAM KEC. KARANG INTAN', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(12, 3, 'RUSLAN', '6372030512750001', 'GURU', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(13, 3, 'MUHAMMAD NASIR', '6372030301960006', 'GURU', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(14, 3, 'ABD. WAHID', '6372031005830004', 'GURU', 'SEI. ABIT', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(15, 3, 'NURDIN', '6372031401890001', 'GURU', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(16, 3, 'KHOIRUDDIN', '6372030107880113', 'GURU', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(17, 3, 'BAHRUDIN', '6372031407890001', 'GURU', 'JL. MANGGARAYA SUNGAI ABIT', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(18, 3, 'ABDUL MALIK', '3527080107930774', 'GURU & BENDAHARA', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(19, 3, 'SALADIN', '6372030406900001', 'GURU', 'BATU AMPAR', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(20, 3, 'SABIDIN', '6372031112680004', 'GURU & KEPALA', 'BATU AMPAR', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(21, 3, 'JAKFAR SODIK', '6372031704960001', 'GURU & SEKETARIS', 'Jl. Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(22, 3, 'SYAMSUL ARIFIN', '3527093005890002', 'GURU', 'Sungai Abit', NULL, 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(23, 11, 'AA TAMBAHA', '123', 'Kepala', 'Jl Setan', '2024-10-27', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(24, 10, 'AA EDIT EDIT LAGI', '345', 'Wakil Presiden', 'Jl Tortiar', '2024-10-27', 0, 'DISETUJUI', 'TANPA KETERANGAN'),
(25, 1, 'AAAAAAAAAAA', 'asd Edit', 'asd Edit', 'asdasda Edit', '2025-02-03', 0, 'DISETUJUI', 'data disetujui'),
(26, 1, 'AAAAAAAAAAaaaaa', 'asd', 'asd', 'asdasda', NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan'),
(27, 1, 'Udin Lama', 'asd', 'asd', 'asdasd', NULL, 0, 'DISETUJUI', 'Disetujui tanpa keterangan');

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(0, 'admin', '$2y$10$CdVqR6jHJom3GEy9OwC7v.kcDJsA6lFbRHxptt0X4.OkfdLF.R9g.', 'admin'),
(2, 'operator', '$2y$10$oSVZbudQh2XGovxtIBfLPeKfa8tsq66FvDgddhqrIqsWD7fYXwH4i', 'operator');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lembaga_mdt`
--
ALTER TABLE `lembaga_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
