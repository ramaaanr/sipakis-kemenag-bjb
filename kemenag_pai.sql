-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2024 at 08:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'BANJARBARU SELATAN'),
(2, 'LIANG ANGGANG'),
(3, 'CEMPAKA'),
(4, 'LANDASAN ULIN'),
(5, 'BANJARBARU UTARA');

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
  `jumlah_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga_mdt`
--

INSERT INTO `lembaga_mdt` (`id`, `lembaga`, `nomor_statistik`, `alamat`, `nama_kepala`, `jumlah_murid`, `jumlah_pengajar`) VALUES
(1, 'AL-KHAIRIYAH', '311263720010', 'Jl.Paramuan', 'Syahran', 68, 12),
(2, 'NURUL HASANAH', '311263720001', 'Jl.H. Mistar Cokrokusumo', 'Nairul Fahmi', 26, 9),
(3, 'ROUDHOTUL MUTAALLIMIN', '311263720009', 'Jl.Batu Ampar', 'Sabidin', 73, 13),
(4, 'USHULUDDIN', '311263720011', 'Jl.Kuranji RT 32RW 05', 'Ali Hanafiah', 28, 5),
(5, 'SYAFAATUL MUMININ', '311263720006', 'JL.Kampung baru,Cempaka ,RT.026/09', 'Agus Supian', 32, 4),
(6, 'BAITUL HIKAM', '311263720012', 'Jl.Sinar Baru RT.24 RW.06 Kelurahan Sungai Ulin', 'Abdul Muthalib,S.HI', 39, 12),
(7, 'QURROTA \'AINIL HABIIB', '311263720017', 'JL. Trisakti Pumpung RT 031 RW 010 Kelurahan Sungai Tiung Kecamatan Cempaka Banjarbaru Kalimantan Selatan', NULL, 72, 7),
(8, 'MAU\'IZHATUL MU\'MININ', '311263720014', 'Jl. Mr. Cokrokusumo, Bangkal', NULL, 31, 8),
(9, 'MISBAHUL MUNIR', '311263720008', 'Batu Ampar Cempaka', 'Saifullah', 32, 8),
(10, 'IRSYADUL AULAD', '311263720005', 'Jl.Mistar Cokrokusumo Bangkal', 'Hormansyah', 27, 5),
(11, 'NURUL MUJAHIDIN', '311263720007', 'Jl.Transpol,Beruntung Jaya,Rt 34/Rw 11', NULL, 81, 9),
(12, 'AL-AMANAH', '321263720015', 'Jl. Balitan Komp. Tumut Hijau No. 07 Rt. 034 Rw. 011 Kel. Loktabat Utara', 'Mahfuzh', 104, 8);

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
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga_pontren`
--

INSERT INTO `lembaga_pontren` (`id`, `nspp`, `npsn`, `nama_lembaga`, `grup`, `jenjang`, `kecamatan_id`, `alamat`, `jumlah_santri_pria`, `jumlah_santri_wanita`, `jumlah_keseluruhan`, `deleted_at`) VALUES
(97, '510363720010', NULL, 'WARASATUL FUQAHA', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 1, 'JL. SUMBER ILMU , GUNTUNG PINANG', 147, 0, 147, NULL),
(98, '510363720002', NULL, 'AL FALAH PUTERI', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'Jl. A. Yani Km. 23 Pondok Pesantren Al Falah Puteri', 0, 1959, 1959, NULL),
(99, '510363720013', '69951836', 'SULLAMUL KHAIRIYAH', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 3, 'JL. H. MISTAR COKROKUSUMO CEMPAKA HULU', 226, 229, 455, NULL),
(100, '510363720019', NULL, 'Darul Hijrah 2 Banjarbaru', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 4, 'JL. HANDIL ARYA BIMA GUNTUNG HARAPAN RT 18 RW 003 BELAKANG AQUATICA WATERPARK KEL. GUNTUNG MANGGIS KEC. LANDASAN ULIN KOTA BANJARBARU', 50, 0, 50, NULL),
(101, '510363720017', NULL, 'RAUDHATUN NASYI`IN', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 1, 'JALAN BUMI BERKAT 7', 227, 0, 227, NULL),
(102, '510363720004', NULL, 'Nurul Ma`ad Putera', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'JL. GOLF', 125, 0, 125, NULL),
(103, '510063720033', NULL, 'DA\'WATUL ARSYADIAH', 'PONTREN', 'Kitab Kuning', 2, 'Jl. A. Yani KM. 17,5 Kota Citra graha', 250, 0, 250, NULL),
(104, '510363720024', NULL, 'NURUL MA\'AD PUTERI', 'PONTREN', 'Kitab Kuning', 2, 'JL. GOLF RT 10 RW 04', 0, 180, 180, NULL),
(105, '510063720030', NULL, 'PONDOK PESANTREN SALAFIYAH SYAIKH ABDUL QADIR AL JILANI', 'PONTREN', 'Kitab Kuning', 5, 'Jl. Guntung Manggis, Komp Raudhatul Muhibbin', 42, 73, 115, NULL),
(106, '510063720032', NULL, 'BAYTAL HIKMAH AL-HAMIDI AL-HASANI', 'PONTREN', 'Kitab Kuning', 2, 'Jl. Gubernur Syarkawi (Lingkar Utara)', 135, 80, 215, NULL),
(107, '510363720008', NULL, 'MIFTAHUL FALAH', 'PONTREN', 'Kitab Kuning', 1, 'JL. H. MR. COKROKUSUMO (BUMI BERKAT I) RT. 01 RW. 02 SUNGAI BESAR', 101, 0, 101, NULL),
(108, '510063720028', NULL, 'KARAMATUL AULIA', 'PONTREN', 'Kitab Kuning', 2, 'JL. Kelurahan Kel.Landasan Ulin', 250, 0, 250, NULL),
(109, '510363720023', NULL, 'Wali Songo Fiddarissalam Puteri', 'PONTREN', 'Kitab Kuning', 4, 'JL. ABADI III (PALM) RT/RW. 06/07', 0, 110, 110, NULL),
(110, '502363720022', NULL, 'MUHAMMADIYAH BOARDING SCHOOL (MBS) BANJARBARU', 'PONTREN', 'Kitab Kuning', 1, 'JL. SOEKARNO HATTA /TRIKORA NO 12 RT.02/04', 52, 43, 95, NULL),
(111, '510063720034', NULL, 'NURUL IMAN MA\'HAD BA\'ABUD', 'PONTREN', 'Kitab Kuning', 1, 'Jl. Amanah RT.04 RW.02', 70, 0, 70, NULL),
(112, '510063720016', NULL, 'Al-Bidayah', 'PONTREN', 'Kitab Kuning', 3, 'JL. AL-BIDAYAH KAMPUNG HANYAR', 87, 48, 135, NULL),
(113, '512363720020', NULL, 'Shafwatul qur\'aniyyah', 'PONTREN', 'Kitab Kuning', 2, 'PERUMAHAN KAMPOENG SHAFWAH ASRI LANDASAN ULIN', 76, 48, 124, NULL),
(114, '510063720026', NULL, 'PONDOK PESANTREN NURUL FIKRI BANJARBARU', 'PONTREN', 'Kitab Kuning', 4, 'JL. GUNTUNG PARING RT. 36 RW. 07', 226, 220, 446, NULL),
(115, '500363720021', NULL, 'DAARUL IHSAN ISLAMIC BOARDING SCHOOL', 'PONTREN', 'Kitab Kuning', 2, 'JLN. A. YANI KM. 24', 64, 23, 87, NULL),
(116, '510063720025', NULL, 'AL-MUHAJIRIN III', 'PONTREN', 'Kitab Kuning', 4, 'JL. KURANJI RT 32 RW 05', 465, 0, 465, NULL),
(117, '510063720031', NULL, 'QALBUN SALIM', 'PONTREN', 'Kitab Kuning', 4, 'Jl. Akasia II', 29, 9, 38, NULL),
(118, '510063720027', NULL, 'PONDOK PESANTREN TAHFIDZUL QURAN RAUDLATUL MUTAALLIMIN ANNAHDLIYAH', 'PONTREN', 'Kitab Kuning', 4, 'Jl. Guntung Manggis No.40 Rt.18/Rw.03', 20, 19, 39, NULL),
(119, '510063720029', NULL, 'PONDOK PESANTREN AL HIDAYAH BANJARBARU', 'PONTREN', 'Kitab Kuning', 1, 'Jalan Sidodadi II RT 4 RW 5', 67, 73, 140, NULL),
(120, '510263720035', NULL, 'Darul Karim', 'PONTREN', 'Kitab Kuning', 5, 'Jl. Hijrah Jaya RT.013 RW.003', 61, 0, 61, NULL),
(121, '510363726011', NULL, 'WALI SONGO FIDDARISSALAM PUTERA', 'PONTREN', 'Kitab Kuning', 4, 'JL. PESANTREN GUNTUNG MANGGIS', 98, 0, 98, NULL),
(122, '510263720036', NULL, 'Daarul Ghuroba', 'PONTREN', 'Kitab Kuning', 4, 'Jln Palm Raya Banjarbaru', 25, 19, 44, NULL),
(123, '510263720037', NULL, 'Nurul Azhar Kalimantan', 'PONTREN', 'Kitab Kuning', 3, 'Jl. Gajah Mada Rt.033 Rw.010', 73, 16, 89, NULL),
(124, '510263720038', NULL, 'Darul Ilmi Puteri', 'PONTREN', 'Kitab Kuning', 2, 'JL. A. YANI KM. 19.200', 0, 884, 884, NULL),
(125, '510363720003', NULL, 'DARUL ILMI', 'PONTREN', 'Kitab Kuning & Penyelenggara Satuan Pendidikan', 2, 'JL. A. YANI KM. 19.200 KEL. LANDASAN ULIN BARAT', 1313, 0, 1313, NULL),
(126, '510363720018', NULL, 'Sulaimaniyah', 'PONTREN', 'Kitab Kuning', 1, 'Jl. Sidodadi No.1 RT.01 RW.01', 13, 0, 13, NULL);

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
  `tingkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `murid_mdt`
--

INSERT INTO `murid_mdt` (`id`, `lembaga_id`, `nama`, `ttl`, `nisn`, `jenis_kelamin`, `rombel_kelas`, `tingkat`) VALUES
(89, 2, 'FATIAH', '2014-08-25', NULL, 'Perempuan', '2', 'ula'),
(90, 2, 'Muhammad Nur Ilmi', '2015-10-17', NULL, 'laki-laki', '2', 'ula'),
(91, 2, 'NAZIFA', '2014-09-25', NULL, 'Perempuan', '2', 'ula'),
(92, 2, 'ABDILLAH', '2014-11-03', NULL, 'laki-laki', '2', 'ula'),
(93, 2, 'KHOLILURRAHMAN', '2014-05-06', NULL, 'laki-laki', '2', 'ula'),
(94, 2, 'AHMAD RIPA`I', '2014-08-12', NULL, 'laki-laki', '2', 'ula'),
(95, 2, 'AHMAD RIZAL MALIK HADRIAN', '2015-12-23', NULL, 'laki-laki', '3', 'ula'),
(96, 2, 'IRSAL BAQIA', '2012-12-22', NULL, 'laki-laki', '3', 'ula'),
(97, 2, 'MUHAMMAD HIZBALLOH', '2014-11-02', NULL, 'laki-laki', '3', 'ula'),
(98, 2, 'MUHAMMAD NAJIB MUBAROK', '2015-01-06', NULL, 'laki-laki', '3', 'ula'),
(99, 2, 'MUHAMMAD RIZQI', '2011-06-27', NULL, 'laki-laki', '3', 'ula'),
(100, 2, 'MUHAMMAD SAJAD', '2014-09-05', NULL, 'laki-laki', '3', 'ula'),
(101, 2, 'MUHAMMD RISWAN', '2012-11-06', NULL, 'laki-laki', '3', 'ula'),
(102, 2, 'AHMAD RIZQON', '2014-04-01', NULL, 'laki-laki', '3', 'ula'),
(103, 2, 'SUBER MUNTASAR', '2010-11-20', NULL, 'laki-laki', '3', 'ula'),
(104, 2, 'AHMAD RIZQI', '2011-10-18', NULL, 'laki-laki', '4', 'ula'),
(105, 2, 'MUHAMMAD ALVIAN SYAPUTRA', '2010-11-28', NULL, 'laki-laki', '4', 'ula'),
(106, 2, 'MUHAMMAD HAFI', '2012-01-03', NULL, 'laki-laki', '4', 'ula'),
(107, 2, 'MUHAMMAD ROSYID HAMIDI', '2013-01-11', NULL, 'laki-laki', '4', 'ula'),
(108, 2, 'MUTIA RIZQI', '2012-05-13', NULL, 'Perempuan', '4', 'ula'),
(109, 2, 'MUTIARA SHOLEHAH', NULL, NULL, 'Perempuan', '4', 'ula'),
(110, 2, 'NAJWA NUR AZKIA', '2012-01-26', NULL, 'Perempuan', '4', 'ula'),
(111, 2, 'RISYDA KHOIRO', '2012-04-07', NULL, 'Perempuan', '4', 'ula'),
(112, 2, 'YASMIN AZWA', '2012-07-17', NULL, 'Perempuan', '4', 'ula'),
(113, 2, 'YAUMI FITRI', '2012-02-02', NULL, 'Perempuan', '4', 'ula'),
(114, 2, 'YUMNA FAZIRA', '2013-04-14', NULL, 'Perempuan', '4', 'ula'),
(115, 3, 'MUHAMMAD RIZKI', '2015-10-27', NULL, 'laki-laki', '1A', 'ula'),
(116, 3, 'ZAINATUL INAYAH', '2016-09-25', '3168869481', 'Perempuan', '1A', 'ula'),
(117, 3, 'SITI KHOTIJAH', '2018-06-06', NULL, 'Perempuan', '1A', 'ula'),
(118, 3, 'SHAFA SALSABILA', '2018-02-09', '3177164628', 'Perempuan', '1A', 'ula'),
(119, 3, 'MUHAMMAD ASYRAF NAQIB', '2016-12-12', '3164908742', 'laki-laki', '1A', 'ula'),
(120, 3, 'HIKMATUN NAZILA', '2017-10-24', '3178400155', 'Perempuan', '1A', 'ula'),
(121, 3, 'AVIV SAIFULLAH', '2017-11-19', NULL, 'laki-laki', '1A', 'ula'),
(122, 3, 'AQILLA SYIFA RAHAYU', '2016-12-30', '3168232653', 'Perempuan', '1A', 'ula'),
(123, 3, 'MUHAMMAD ATO\'ILLAH', '2016-05-17', '3158973514', 'laki-laki', '1A', 'ula'),
(124, 3, 'AFRIN ANISA', '2016-05-17', NULL, 'Perempuan', '1A', 'ula'),
(125, 3, 'ARSYIL ROHMAN', '2015-12-20', '3150791149', 'laki-laki', '1A', 'ula'),
(126, 3, 'MUHAMMAD ZAKKY', '2017-08-10', NULL, 'laki-laki', '1A', 'ula'),
(127, 3, 'UMAR FADIL', '2016-05-08', '3163802030', 'laki-laki', '1B', 'ula'),
(128, 3, 'SEYTUNNUFUS', '2017-06-05', '3179340692', 'Perempuan', '1B', 'ula'),
(129, 3, 'MUHAMMAD FAJAR TRIARDIANSYAH', '2014-12-08', '3142023592', 'laki-laki', '1B', 'ula'),
(130, 3, 'REZA FIRDAUSA MUBAROK', '2015-03-20', '3158343617', 'laki-laki', '1B', 'ula'),
(131, 3, 'ANISATUL MAGFIROH', '2015-06-11', NULL, 'Perempuan', '1B', 'ula'),
(132, 3, 'SULAIMAN', '2012-07-09', '3126303895', 'laki-laki', '1B', 'ula'),
(133, 3, 'ALFIA', '2016-09-17', '3168818692', 'Perempuan', '1B', 'ula'),
(134, 3, 'MUHAMMAD AKBAR PRAMONO', '2015-08-22', '3150684694', 'laki-laki', '1B', 'ula'),
(135, 3, 'MUHAMMAD HAFIDZ ROMADHONI', '2016-06-16', '3163691630', 'laki-laki', '1B', 'ula'),
(136, 3, 'M. AZKAL WALID', '2016-09-04', '3162984384', 'laki-laki', '1B', 'ula'),
(137, 3, 'MUHAMMAD FIKRI RAMADHANI', '2016-03-22', '3165989468', 'laki-laki', '1B', 'ula'),
(138, 3, 'MUHAMMAD BADALI', '2010-12-29', '3141916037', 'laki-laki', '1B', 'ula'),
(139, 3, 'MUHAMMAD FAIRUZ NADIL AMRULLAH', '2015-05-01', '3152929351', 'laki-laki', '1B', 'ula'),
(140, 3, 'ARSYA MUHAMMAD NUR', '2014-12-18', '3142484078', 'laki-laki', '1B', 'ula'),
(141, 3, 'MUHAMMAD RIFKI ZIDANI', '2016-09-18', '3168030260', 'laki-laki', '1B', 'ula'),
(142, 3, 'FATIN AZKIA', '2016-08-20', '3163134364', 'Perempuan', '2', 'ula'),
(143, 3, 'MUHAMMAD GUFRON', '2014-02-18', '3147915000', 'laki-laki', '2', 'ula'),
(144, 3, 'YUNITA YUSRO', '2015-07-08', '3157980225', 'Perempuan', '2', 'ula'),
(145, 3, 'NAJWATUL KHOIR', '2014-05-29', '3144205251', 'Perempuan', '2', 'ula'),
(146, 3, 'ZAINATUN NASYFA', '2015-03-06', '3154710934', 'Perempuan', '2', 'ula'),
(147, 3, 'LITA TALITA RISMA', '2015-07-01', '3157505762', 'Perempuan', '2', 'ula'),
(148, 3, 'HOLIVA', '2015-02-13', '3153789773', 'Perempuan', '2', 'ula'),
(149, 3, 'TAUFIK HIDAYATULLAH', '2011-11-11', NULL, 'laki-laki', '2', 'ula'),
(150, 3, 'MUHAMMAD SUHDI', '2013-03-17', '3133904056', 'laki-laki', '2', 'ula'),
(151, 3, 'MUHAMMAD RIJALUL MAHBUB', '2013-03-27', NULL, 'laki-laki', '2', 'ula'),
(152, 3, 'AFIKAH ZAHROTUN', '2013-12-22', '3132260110', 'Perempuan', '2', 'ula'),
(153, 3, 'SHOFIATUL MASRUROH', '2014-02-25', '3148511841', 'Perempuan', '2', 'ula'),
(154, 3, 'FERDIYANSYAH', '2012-10-15', '3126736466', 'laki-laki', '2', 'ula'),
(155, 3, 'NAILA AINUN TASYA', '2015-02-20', '3156319034', 'Perempuan', '2', 'ula'),
(156, 3, 'SAFINATUN NAJA', '2013-05-01', '3138954677', 'Perempuan', '2', 'ula'),
(157, 3, 'YASMIN ANISA FITRI', '2013-01-17', '3135251784', 'Perempuan', '2', 'ula'),
(158, 3, 'ALIA ROSALINA', '2015-04-28', '3152153507', 'Perempuan', '2', 'ula'),
(159, 3, 'IQBAL MAULANA', '2014-08-28', '3143804063', 'laki-laki', '2', 'ula'),
(160, 3, 'ACHMAD BERIZI', '2014-09-10', '3140285261', 'laki-laki', '2', 'ula'),
(161, 3, 'ARIA SAPUTRA', '2009-02-05', NULL, 'laki-laki', '2', 'ula'),
(162, 3, 'M. FAIZ', '2011-12-12', '3117250571', 'laki-laki', '2', 'ula'),
(163, 3, 'RISKA AMILLIYA', '2014-01-06', '3141939382', 'Perempuan', '2', 'ula'),
(164, 3, 'RIZQI HIDAYATULLO', '2014-02-14', '3147945948', 'laki-laki', '2', 'ula'),
(165, 3, 'NURI RAMADANI', '2015-04-09', '3157430222', 'Perempuan', '2', 'ula'),
(166, 3, 'HANANIAH', '2013-01-22', '3139767792', 'Perempuan', '3', 'ula'),
(167, 3, 'HARIYANA AZZAHRA', '2013-09-07', '3138032071', 'Perempuan', '3', 'ula'),
(168, 3, 'RIDOLLA', '2012-05-17', '3120216133', 'laki-laki', '3', 'ula'),
(169, 3, 'MUHAMMAD RIFATUL', '2014-03-27', '3148604851', 'laki-laki', '3', 'ula'),
(170, 3, 'NURUL AZIZAH', '2015-05-08', NULL, 'Perempuan', '3', 'ula'),
(171, 3, 'YAZID DHIYAULHAQ', '2013-03-04', '3133637669', 'laki-laki', '3', 'ula'),
(172, 3, 'INDAH ARINA', '2013-07-12', '3132751588', 'Perempuan', '3', 'ula'),
(173, 3, 'ADIB AHMED', '2012-01-01', NULL, 'laki-laki', '3', 'ula'),
(174, 3, 'NABILAH', '2014-05-16', '3145765453', 'Perempuan', '3', 'ula'),
(175, 3, 'JUMINTA', '2014-03-24', '3145004727', 'Perempuan', '3', 'ula'),
(176, 3, 'DIAH KENCANA', '2012-12-06', '3128091798', 'Perempuan', '3', 'ula'),
(177, 3, 'GIVANT MAULANA', '2014-05-09', '3143123683', 'laki-laki', '3', 'ula'),
(178, 3, 'ALISHA', '2014-09-10', '3140921888', 'Perempuan', '3', 'ula'),
(179, 3, 'NADYA YAHYA', '2014-10-01', '3141121977', 'Perempuan', '3', 'ula'),
(180, 3, 'TATANG', '2011-06-15', '3115758855', 'laki-laki', '3', 'ula'),
(181, 3, 'HAZELIA', '2012-05-29', '3120482874', 'Perempuan', '3', 'ula'),
(182, 3, 'MUFID SULTAN', '2012-01-21', '3111306237', 'laki-laki', '3', 'ula'),
(183, 3, 'SITI RAHMAH', '2012-01-16', NULL, 'Perempuan', '3', 'ula'),
(184, 3, 'LEILA FARIDA', '2012-11-11', NULL, 'Perempuan', '3', 'ula'),
(185, 3, 'RIZQI PRADANA', '2013-09-10', '3138627068', 'laki-laki', '3', 'ula'),
(186, 3, 'TAUFIK NUR', '2012-09-03', '3123380303', 'laki-laki', '3', 'ula'),
(187, 3, 'FAYLA SALMA', '2012-12-24', NULL, 'Perempuan', '3', 'ula'),
(188, 3, 'DANNY', '2012-06-04', '3113255652', 'laki-laki', '3', 'ula'),
(189, 3, 'DINA HAFIZAH', '2013-06-09', NULL, 'Perempuan', '3', 'ula'),
(190, 3, 'ADINDA NURUL', '2014-07-22', '3142893888', 'Perempuan', '3', 'ula'),
(191, 3, 'MUHAMMAD FAUZAN', '2015-10-11', NULL, 'laki-laki', '3', 'ula'),
(192, 3, 'MUHAMMAD ILYAS', '2015-11-01', NULL, 'laki-laki', '3', 'ula'),
(193, 4, 'Asyira AzahrAzahra Alfahm', '2017-05-10', NULL, 'Perempuan', '1', 'awwaliyah'),
(194, 4, 'M. Nazmi', '2017-10-08', NULL, 'laki-laki', '1', 'awwaliyah'),
(195, 4, 'M. RasyiRasyid ZuhZuhri', '2018-06-24', NULL, 'laki-laki', '1', 'awwaliyah'),
(196, 4, 'Rafassya', '2017-10-08', NULL, 'Perempuan', '1', 'awwaliyah'),
(197, 4, 'M. Sandy Arkan', '2017-03-24', NULL, 'laki-laki', '2', 'awwaliyah'),
(198, 4, 'M. Rasyid Alfahm', '2012-11-16', NULL, 'laki-laki', '2', 'awwaliyah'),
(199, 4, 'M. Nur Arif Bintang', '2016-11-17', NULL, 'laki-laki', '2', 'awwaliyah'),
(200, 4, 'M. Walid', '2017-04-28', NULL, 'laki-laki', '2', 'awwaliyah'),
(201, 4, 'Nur Hafiza', '2017-04-23', NULL, 'Perempuan', '2', 'awwaliyah'),
(202, 4, 'Aurellia', '2016-01-05', NULL, 'Perempuan', '2', 'awwaliyah'),
(203, 4, 'M. Romeo', '2016-10-06', NULL, 'laki-laki', '2', 'awwaliyah'),
(204, 4, 'M. Nazmi', '2014-10-20', NULL, 'laki-laki', '3', 'awwaliyah'),
(205, 4, 'Salma IzzatunIzzatunnisa', '2016-01-11', NULL, 'Perempuan', '3', 'awwaliyah'),
(206, 4, 'Adzkia Fazzila', '2015-01-12', NULL, 'Perempuan', '3', 'awwaliyah'),
(207, 4, 'Aprilia Wija', '2014-01-15', NULL, 'Perempuan', '3', 'awwaliyah'),
(208, 4, 'Aqila Kanza Salsabila', '2014-04-21', NULL, 'Perempuan', '4', 'awwaliyah'),
(209, 4, 'Nafisah Azzahro', '2013-09-26', NULL, 'Perempuan', '4', 'awwaliyah'),
(210, 4, 'Nayra Nb Afila Zahra', '2013-08-21', NULL, 'Perempuan', '4', 'awwaliyah'),
(211, 4, 'M. Hatta Dinata', NULL, NULL, 'laki-laki', '4', 'awwaliyah'),
(212, 4, 'M. Rusli Akhir', NULL, NULL, 'laki-laki', '4', 'awwaliyah'),
(213, 4, 'M. Amin', NULL, NULL, 'laki-laki', '4', 'awwaliyah'),
(214, 4, 'M. Nabil', '2013-01-01', NULL, 'laki-laki', '5', 'awwaliyah'),
(215, 4, 'M. Alfi', '2014-01-01', NULL, 'laki-laki', '5', 'awwaliyah'),
(216, 4, 'Nazwa', NULL, NULL, 'Perempuan', '5', 'awwaliyah'),
(217, 4, 'Ghifari Akbar', '2013-10-28', NULL, 'laki-laki', '6', 'awwaliyah'),
(218, 4, 'Usman', '2013-10-26', NULL, 'laki-laki', '6', 'awwaliyah'),
(219, 4, 'Nijam', '2013-04-25', NULL, 'laki-laki', '6', 'awwaliyah'),
(220, 4, 'M. Iqbal', '2012-06-18', NULL, 'laki-laki', '6', 'awwaliyah'),
(221, 4, 'M. Naufal', '2013-10-01', NULL, 'laki-laki', '6', 'awwaliyah');

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
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_mdt`
--

INSERT INTO `staff_mdt` (`id`, `lembaga_id`, `nama`, `nik`, `jabatan`, `alamat`) VALUES
(1, 2, 'NAIRUL FAHMI', '6372030312740001', 'Kepala', 'Sungai tiung RT.06 Rw.02 Kel.Sungai tiung Kec.Cempaka'),
(2, 2, 'M.ZARKASYI', '63720301503550001', 'Guru', 'Sungai tiung RT.04 Rw.02 Kel.Sungai tiung Kec.Cempaka'),
(3, 2, 'FAUZAN MUHTADI', '6372031505840002', 'Guru', 'Cempaka, Rt.07 Rw.03 Kel,Cempaka Kec.Cempaka'),
(4, 2, 'AHYANI', '63732031705770002', 'Guru', 'Sungai tiung RT.02 Rw.01 Kel.Sungai tiung Kec.Cempaka'),
(5, 2, 'SLAMET NOOR SODIK', '6372030707830002', 'Guru', 'Sungai tiung RT.05 Rw.02 Kel.Sungai tiung Kec.Cempaka'),
(6, 2, 'HELMI AZHAR', '6372031010870003', 'Guru', 'PESAYANGAN MARTAPURA'),
(7, 2, 'BADARUDDIN', '6303050606730013', 'Guru', 'SEKUMPUL MARTAPURA'),
(8, 2, 'LAILA SURAIYA', '6372034110740002', 'Guru', 'Cempaka, Rt.14 Rw.05 Kel,Cempaka Kec.Cempaka'),
(9, 2, 'HJ.NORMAKIAH', '6372034511770001', 'Guru', 'Sungai tiung RT.02 Rw.01 Kel.Sungai tiung Kec.Cempaka'),
(10, 3, 'MOH YANTO', '3526100904970004', 'GURU', 'BATU AMPAR'),
(11, 3, 'M. RIZQIE MUBARHOK', '6303060107810087', 'GURU', 'JL. P. SURYANATA DESA KIRAM RT 001 Rw.001 KEL. KIRAM KEC. KARANG INTAN'),
(12, 3, 'RUSLAN', '6372030512750001', 'GURU', 'Jl. Sungai Abit'),
(13, 3, 'MUHAMMAD NASIR', '6372030301960006', 'GURU', 'Jl. Sungai Abit'),
(14, 3, 'ABD. WAHID', '6372031005830004', 'GURU', 'SEI. ABIT'),
(15, 3, 'NURDIN', '6372031401890001', 'GURU', 'Jl. Sungai Abit'),
(16, 3, 'KHOIRUDDIN', '6372030107880113', 'GURU', 'Jl. Sungai Abit'),
(17, 3, 'BAHRUDIN', '6372031407890001', 'GURU', 'JL. MANGGARAYA SUNGAI ABIT'),
(18, 3, 'ABDUL MALIK', '3527080107930774', 'GURU & BENDAHARA', 'Jl. Sungai Abit'),
(19, 3, 'SALADIN', '6372030406900001', 'GURU', 'BATU AMPAR'),
(20, 3, 'SABIDIN', '6372031112680004', 'GURU & KEPALA', 'BATU AMPAR'),
(21, 3, 'JAKFAR SODIK', '6372031704960001', 'GURU & SEKETARIS', 'Jl. Sungai Abit'),
(22, 3, 'SYAMSUL ARIFIN', '3527093005890002', 'GURU', 'Sungai Abit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$EDDVJ14/eaiUwwduvepCjuwJMGWh1fUH0geF7CkXKLLCxh1rQv6Ui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga_mdt`
--
ALTER TABLE `lembaga_mdt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_id` (`lembaga_id`);

--
-- Indexes for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembaga_id` (`lembaga_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lembaga_pontren`
--
ALTER TABLE `lembaga_pontren`
  ADD CONSTRAINT `lembaga_pontren_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `murid_mdt`
--
ALTER TABLE `murid_mdt`
  ADD CONSTRAINT `murid_mdt_ibfk_1` FOREIGN KEY (`lembaga_id`) REFERENCES `lembaga_mdt` (`id`);

--
-- Constraints for table `staff_mdt`
--
ALTER TABLE `staff_mdt`
  ADD CONSTRAINT `staff_mdt_ibfk_1` FOREIGN KEY (`lembaga_id`) REFERENCES `lembaga_mdt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
