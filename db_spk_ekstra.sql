-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 07:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_ekstra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_client`, `nama_admin`, `email_admin`, `password`) VALUES
(1, 0, 'Administrator 1', 'admin@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc');

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(10) NOT NULL,
  `id_keputusan` int(10) NOT NULL,
  `nama_aturan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_keputusan`, `nama_aturan`) VALUES
(1, 1, 'R1'),
(2, 1, 'R2'),
(3, 1, 'R3'),
(4, 1, 'R4'),
(5, 1, 'R5'),
(6, 1, 'R6'),
(7, 2, 'R7'),
(8, 2, 'R8'),
(9, 2, 'R9'),
(10, 1, 'R10'),
(11, 1, 'R11'),
(12, 1, 'R12'),
(13, 1, 'R13'),
(14, 1, 'R14'),
(15, 1, 'R15'),
(16, 1, 'R16'),
(17, 2, 'R17'),
(18, 2, 'R18'),
(19, 1, 'R19'),
(20, 1, 'R20'),
(21, 1, 'R21'),
(22, 1, 'R22'),
(23, 1, 'R23'),
(24, 1, 'R24'),
(25, 1, 'R25'),
(26, 1, 'R26'),
(27, 1, 'R27'),
(28, 2, 'R28'),
(29, 2, 'R29'),
(30, 2, 'R30'),
(31, 2, 'R31'),
(32, 2, 'R32'),
(33, 2, 'R33'),
(34, 2, 'R34'),
(35, 2, 'R35'),
(36, 2, 'R36'),
(37, 2, 'R37'),
(38, 2, 'R38'),
(39, 2, 'R39'),
(40, 2, 'R40'),
(41, 2, 'R41'),
(42, 2, 'R42'),
(43, 2, 'R43'),
(44, 2, 'R44'),
(45, 2, 'R45'),
(46, 1, 'R46'),
(47, 1, 'R47'),
(48, 2, 'R48'),
(49, 1, 'R49'),
(50, 2, 'R50'),
(51, 2, 'R51'),
(52, 2, 'R52'),
(53, 2, 'R53'),
(54, 2, 'R54'),
(55, 2, 'R55'),
(56, 2, 'R56'),
(57, 2, 'R57'),
(58, 2, 'R58'),
(59, 2, 'R59'),
(60, 2, 'R60'),
(61, 2, 'R61'),
(62, 2, 'R62'),
(63, 2, 'R63'),
(64, 2, 'R64'),
(65, 2, 'R65'),
(66, 2, 'R66'),
(67, 2, 'R67'),
(68, 2, 'R68'),
(69, 2, 'R69'),
(70, 2, 'R70'),
(71, 2, 'R71'),
(72, 2, 'R72'),
(73, 2, 'R73'),
(74, 2, 'R74'),
(75, 2, 'R75'),
(76, 2, 'R76'),
(77, 1, 'R77'),
(78, 2, 'R78'),
(79, 1, 'R79'),
(80, 2, 'R80'),
(81, 2, 'R81'),
(82, 1, 'R82'),
(83, 1, 'R83'),
(84, 1, 'R84'),
(85, 1, 'R85'),
(86, 1, 'R86'),
(87, 1, 'R87'),
(88, 1, 'R88'),
(89, 1, 'R89'),
(90, 1, 'R90'),
(91, 1, 'R91'),
(92, 1, 'R92'),
(93, 1, 'R93'),
(94, 1, 'R94'),
(95, 1, 'R95'),
(96, 1, 'R96'),
(97, 1, 'R97'),
(98, 1, 'R98'),
(99, 1, 'R99'),
(100, 1, 'R100'),
(101, 1, 'R101'),
(102, 1, 'R102'),
(103, 1, 'R103'),
(104, 1, 'R104'),
(105, 1, 'R105'),
(106, 1, 'R106'),
(107, 1, 'R107'),
(108, 1, 'R108'),
(109, 1, 'R109'),
(110, 1, 'R110'),
(111, 1, 'R111'),
(112, 1, 'R112'),
(113, 1, 'R113'),
(114, 2, 'R114'),
(115, 2, 'R115'),
(116, 2, 'R116'),
(117, 2, 'R117'),
(118, 1, 'R118'),
(119, 1, 'R119'),
(120, 1, 'R120'),
(121, 1, 'R121'),
(122, 1, 'R122'),
(123, 1, 'R123'),
(124, 1, 'R124'),
(125, 2, 'R125'),
(126, 2, 'R126'),
(127, 1, 'R127'),
(128, 1, 'R128'),
(129, 1, 'R129'),
(130, 1, 'R130'),
(131, 2, 'R131'),
(132, 1, 'R132'),
(133, 1, 'R133'),
(134, 1, 'R134'),
(135, 1, 'R135'),
(136, 2, 'R136'),
(137, 2, 'R137'),
(138, 2, 'R138'),
(139, 1, 'R139'),
(140, 2, 'R140'),
(141, 2, 'R141'),
(142, 2, 'R142'),
(143, 2, 'R143'),
(144, 2, 'R144'),
(145, 2, 'R145'),
(146, 2, 'R146'),
(147, 2, 'R147'),
(148, 2, 'R148'),
(149, 2, 'R149'),
(150, 2, 'R150'),
(151, 2, 'R151'),
(152, 2, 'R152'),
(153, 2, 'R153'),
(154, 1, 'R154'),
(155, 2, 'R155'),
(156, 2, 'R156'),
(157, 1, 'R157'),
(158, 2, 'R158'),
(159, 2, 'R159'),
(160, 2, 'R160'),
(161, 2, 'R161'),
(162, 2, 'R162');

-- --------------------------------------------------------

--
-- Table structure for table `cek`
--

CREATE TABLE `cek` (
  `id_cek` int(10) NOT NULL,
  `id_riwayat` int(10) NOT NULL,
  `id_variabel` int(10) NOT NULL,
  `data_cek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek`
--

INSERT INTO `cek` (`id_cek`, `id_riwayat`, `id_variabel`, `data_cek`) VALUES
(1, 1, 1, '92'),
(2, 1, 2, '89'),
(3, 1, 3, '178'),
(4, 1, 4, '90'),
(5, 1, 5, '87'),
(6, 6, 6, '86'),
(7, 2, 7, '88');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(10) NOT NULL,
  `nama_client` varchar(255) NOT NULL,
  `jenis_kelamin_client` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir_client` date NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nama_client`, `jenis_kelamin_client`, `tanggal_lahir_client`, `email_client`, `password`) VALUES
(1, 'mus', 'Pria', '2022-12-08', 'mus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'Alvi', 'Wanita', '1997-02-13', 'alviani@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(3, 'Ani', 'Wanita', '1997-09-01', 'ani@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `Id_ekstra` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `BuluTangkis` float NOT NULL,
  `Futsal` float NOT NULL,
  `ModernDance` float NOT NULL,
  `TapakSuci` float NOT NULL,
  `Tari` float NOT NULL,
  `Paskibra` float NOT NULL,
  `Film` float NOT NULL,
  `SeniMusik` float NOT NULL,
  `Pemrograman` float NOT NULL,
  `HizbulWathan` float NOT NULL,
  `KIR` float NOT NULL,
  `PMR` float NOT NULL,
  `Qiroah` float NOT NULL,
  `Basket` float NOT NULL,
  `Jurnalistik` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`Id_ekstra`, `Id_user`, `BuluTangkis`, `Futsal`, `ModernDance`, `TapakSuci`, `Tari`, `Paskibra`, `Film`, `SeniMusik`, `Pemrograman`, `HizbulWathan`, `KIR`, `PMR`, `Qiroah`, `Basket`, `Jurnalistik`) VALUES
(6, 35, 46.7992, 48.8912, 51.0669, 54.2017, 54.7802, 54.6774, 60.8636, 56.5932, 53.0111, 51.6575, 48.8636, 47.5306, 49.5828, 34.5248, 49.3762),
(7, 36, 59.8521, 42.234, 56.2432, 59.3017, 57.067, 57.0237, 48.3333, 47.7229, 46.457, 42.9603, 47, 47.1154, 46.3665, 39.4752, 43.4356),
(8, 0, 55.3898, 59.7965, 54.6906, 55.1641, 54.9699, 55.1707, 56.6406, 56.0504, 57.4436, 56.6406, 56.391, 56.9915, 56.9414, 64.1777, 61.8356),
(9, 0, 55.3898, 59.7965, 54.6906, 55.1641, 54.9699, 55.1707, 56.6406, 56.0504, 57.4436, 56.6406, 56.391, 56.9915, 56.9414, 64.1777, 61.8356),
(10, 0, 55.3898, 59.7965, 54.6906, 55.1641, 54.9699, 55.1707, 56.6406, 56.0504, 57.4436, 56.6406, 56.391, 56.9915, 56.9414, 64.1777, 61.8356);

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `Id_ekstrakulikuler` int(11) NOT NULL,
  `Id_perhitungan` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `K1` double NOT NULL,
  `K2` double NOT NULL,
  `K3` double NOT NULL,
  `K4` double NOT NULL,
  `K5` double NOT NULL,
  `K6` double NOT NULL,
  `K7` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE `himpunan` (
  `id_himpunan` int(10) NOT NULL,
  `id_variabel` int(10) NOT NULL,
  `nama_himpunan` varchar(255) NOT NULL,
  `batas_bawah_himpunan` float(5,2) NOT NULL,
  `batas_atas_himpunan` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_variabel`, `nama_himpunan`, `batas_bawah_himpunan`, `batas_atas_himpunan`) VALUES
(1, 1, 'Cukup', 0.00, 60.00),
(2, 1, 'Baik', 60.00, 100.00),
(3, 2, 'Cukup', 0.00, 60.00),
(4, 2, 'Baik', 60.00, 100.00),
(5, 3, 'Cukup', 0.00, 150.00),
(6, 3, 'Baik', 150.00, 180.00),
(7, 4, 'Cukup', 0.00, 60.00),
(8, 4, 'Baik', 60.00, 100.00),
(9, 5, 'Cukup', 0.00, 60.00),
(10, 5, 'Baik', 60.00, 100.00),
(11, 6, 'Cukup', 0.00, 60.00),
(12, 6, 'Baik', 60.00, 100.00),
(13, 7, 'Cukup', 0.00, 60.00),
(14, 7, 'Baik', 60.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `himpunan1`
--

CREATE TABLE `himpunan1` (
  `Id_himpunan` int(11) NOT NULL,
  `Id_variabel` int(11) NOT NULL,
  `Nama_himpunan` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `himpunan1`
--

INSERT INTO `himpunan1` (`Id_himpunan`, `Id_variabel`, `Nama_himpunan`) VALUES
(1, 1, 'BAIK'),
(2, 1, 'CUKUP'),
(3, 2, 'BAIK'),
(4, 2, 'CUKUP'),
(5, 3, 'BAIK'),
(6, 3, 'CUKUP'),
(7, 1, 'BAIK'),
(8, 1, 'CUKUP'),
(9, 2, 'BAIK'),
(10, 2, 'CUKUP');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `id_keputusan` int(10) NOT NULL,
  `nama_keputusan` varchar(255) NOT NULL,
  `batas_bawah_keputusan` float(5,2) NOT NULL,
  `batas_atas_keputusan` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`id_keputusan`, `nama_keputusan`, `batas_bawah_keputusan`, `batas_atas_keputusan`) VALUES
(1, 'Rendah', 0.00, 60.00),
(2, 'Tinggi', 60.00, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `nama_ekstra`
--

CREATE TABLE `nama_ekstra` (
  `Id_ekstra` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_ekstra`
--

INSERT INTO `nama_ekstra` (`Id_ekstra`, `Nama`) VALUES
(3, 'Ekstra Bulutangkis'),
(8, 'Ekstra Futsal'),
(10, 'Ekstra modern dance'),
(11, 'Ekstra Tari Tradisional'),
(14, 'Ekstra Paskibra');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `Id_perhitungan` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL DEFAULT '''Muhammad Arya''',
  `Id_ekstra` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `K1_baik` double NOT NULL,
  `K1_cukup` double NOT NULL,
  `K2_baik` double NOT NULL,
  `K2_cukup` double NOT NULL,
  `K3_baik` double NOT NULL,
  `K3_cukup` double NOT NULL,
  `K4_baik` double NOT NULL,
  `K4_cukup` double NOT NULL,
  `K5_baik` double NOT NULL,
  `K5_cukup` double NOT NULL,
  `K6_baik` double NOT NULL,
  `K6_cukup` double NOT NULL,
  `K7_baik` double NOT NULL,
  `K7_cukup` double NOT NULL,
  `nilai_ekstra_baik` double NOT NULL,
  `nilai_ekstra_cukup` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`Id_perhitungan`, `Username`, `Id_ekstra`, `tanggal`, `K1_baik`, `K1_cukup`, `K2_baik`, `K2_cukup`, `K3_baik`, `K3_cukup`, `K4_baik`, `K4_cukup`, `K5_baik`, `K5_cukup`, `K6_baik`, `K6_cukup`, `K7_baik`, `K7_cukup`, `nilai_ekstra_baik`, `nilai_ekstra_cukup`) VALUES
(21, 'Muhammad Arya', 3, '2021-09-30', 100, 60, 100, 60, 200, 150, 100, 60, 100, 60, 100, 60, 100, 60, 100, 0),
(22, 'Wahyudi', 8, '2022-12-14', 380, 230, 110, 5, 12, 8, 0, 0, 0, 0, 0, 0, 0, 0, 400, 200),
(23, 'Muhammad Arya', 10, '2021-09-30', 470, 280, 120, 20, 12, 8, 0, 0, 0, 0, 0, 0, 0, 0, 500, 300),
(24, 'Muhammad Arya', 11, '2021-09-30', 330, 170, 90, 10, 12, 8, 0, 0, 0, 0, 0, 0, 0, 0, 350, 150),
(25, 'Muhammad Arya', 14, '2021-09-30', 390, 200, 110, 0, 12, 8, 0, 0, 0, 0, 0, 0, 0, 0, 450, 250);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `Id_produksi` int(11) NOT NULL,
  `Id_perhitungan` int(11) NOT NULL,
  `Tanggal_Produksi` date DEFAULT NULL,
  `K1` double NOT NULL,
  `K2` double NOT NULL,
  `K3` double NOT NULL,
  `K4` double NOT NULL,
  `K5` double NOT NULL,
  `K6` double NOT NULL,
  `K7` double NOT NULL,
  `Total_produksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`Id_produksi`, `Id_perhitungan`, `Tanggal_Produksi`, `K1`, `K2`, `K3`, `K4`, `K5`, `K6`, `K7`, `Total_produksi`) VALUES
(155, 21, '2021-10-02', 320, 70, 11, 0, 0, 0, 0, 287),
(156, 22, '2021-10-02', 350, 30, 11, 0, 0, 0, 0, 322),
(157, 23, '2021-10-02', 430, 60, 11, 0, 0, 0, 0, 412),
(158, 24, '2021-10-02', 270, 50, 11, 0, 0, 0, 0, 259),
(162, 21, '2021-10-03', 240, 40, 9, 0, 0, 0, 0, 263),
(163, 22, '2021-10-03', 270, 10, 9, 0, 0, 0, 0, 263),
(164, 23, '2021-10-03', 360, 50, 9, 0, 0, 0, 0, 394),
(165, 24, '2021-10-03', 200, 30, 9, 0, 0, 0, 0, 228),
(172, 21, '2021-10-04', 270, 20, 12, 0, 0, 0, 0, 277),
(173, 22, '2021-10-04', 350, 20, 12, 0, 0, 0, 0, 328),
(174, 23, '2021-10-04', 450, 80, 12, 0, 0, 0, 0, 403),
(175, 24, '2021-10-04', 300, 60, 12, 0, 0, 0, 0, 255),
(177, 25, '2021-10-04', 390, 20, 12, 0, 0, 0, 0, 390),
(178, 25, '2021-10-02', 340, 70, 11, 0, 0, 0, 0, 360),
(179, 25, '2021-10-03', 280, 50, 9, 0, 0, 0, 0, 340),
(180, 21, '2021-10-05', 220, 50, 12, 0, 0, 0, 0, 283),
(181, 22, '2021-10-05', 380, 20, 12, 0, 0, 0, 0, 351),
(183, 23, '2021-10-05', 400, 60, 12, 0, 0, 0, 0, 402),
(184, 24, '2021-10-05', 330, 60, 12, 0, 0, 0, 0, 256),
(185, 25, '2021-10-05', 400, 60, 12, 0, 0, 0, 0, 351),
(186, 21, '2021-10-06', 340, 80, 12, 0, 0, 0, 0, 298),
(187, 22, '2021-10-06', 350, 40, 12, 0, 0, 0, 0, 308),
(188, 23, '2021-10-06', 470, 80, 12, 0, 0, 0, 0, 404),
(189, 24, '2021-10-06', 300, 90, 12, 0, 0, 0, 0, 312),
(190, 25, '2021-10-06', 340, 10, 12, 0, 0, 0, 0, 355),
(191, 21, '2021-10-07', 250, 40, 12, 0, 0, 0, 0, 279),
(192, 22, '2021-10-07', 360, 90, 12, 0, 0, 0, 0, 330),
(193, 23, '2021-10-07', 400, 60, 12, 0, 0, 0, 0, 402),
(194, 24, '2021-10-07', 280, 40, 12, 0, 0, 0, 0, 254),
(195, 25, '2021-10-07', 370, 30, 12, 0, 0, 0, 0, 366),
(197, 21, '2021-10-09', 300, 70, 12, 0, 0, 0, 0, 280),
(198, 22, '2021-10-09', 300, 60, 12, 0, 0, 0, 0, 294),
(199, 23, '2021-10-09', 440, 60, 12, 0, 0, 0, 0, 403),
(200, 24, '2021-10-09', 280, 60, 12, 0, 0, 0, 0, 254),
(201, 25, '2021-10-09', 280, 60, 12, 0, 0, 0, 0, 327),
(202, 21, '2021-10-10', 230, 50, 8, 0, 0, 0, 0, 274),
(203, 22, '2021-10-10', 340, 60, 8, 0, 0, 0, 0, 313),
(204, 23, '2021-10-10', 330, 40, 8, 0, 0, 0, 0, 383),
(205, 24, '2021-10-10', 330, 40, 8, 0, 0, 0, 0, 275),
(206, 25, '2021-10-10', 260, 110, 8, 0, 0, 0, 0, 250),
(207, 21, '2021-10-11', 300, 50, 12, 0, 0, 0, 0, 276),
(208, 22, '2021-10-11', 350, 20, 12, 0, 0, 0, 0, 328),
(209, 23, '2021-10-11', 480, 20, 12, 0, 0, 0, 0, 500),
(210, 24, '2021-10-11', 250, 10, 12, 0, 0, 0, 0, 250),
(211, 25, '2021-10-11', 350, 50, 12, 0, 0, 0, 0, 351),
(212, 21, '2021-10-12', 340, 70, 12, 0, 0, 0, 0, 283),
(213, 22, '2021-10-12', 380, 40, 12, 0, 0, 0, 0, 311),
(214, 23, '2021-10-12', 410, 40, 12, 0, 0, 0, 0, 410),
(215, 24, '2021-10-12', 300, 60, 12, 0, 0, 0, 0, 255),
(216, 25, '2021-10-12', 370, 50, 12, 0, 0, 0, 0, 351),
(217, 21, '2021-10-13', 350, 30, 12, 0, 0, 0, 0, 298),
(218, 22, '2021-10-13', 360, 10, 12, 0, 0, 0, 0, 349),
(219, 23, '2021-10-13', 500, 40, 12, 0, 0, 0, 0, 436),
(220, 24, '2021-10-13', 250, 10, 12, 0, 0, 0, 0, 250),
(221, 25, '2021-10-13', 400, 30, 12, 0, 0, 0, 0, 371),
(222, 21, '2021-10-14', 320, 30, 12, 0, 0, 0, 0, 292),
(223, 22, '2021-10-14', 250, 50, 12, 0, 0, 0, 0, 296),
(224, 23, '2021-10-14', 410, 40, 12, 0, 0, 0, 0, 410),
(225, 24, '2021-10-14', 350, 60, 12, 0, 0, 0, 0, 256),
(226, 25, '2021-10-14', 370, 0, 12, 0, 0, 0, 0, 398),
(227, 21, '2021-10-16', 270, 10, 12, 0, 0, 0, 0, 277),
(228, 22, '2021-10-16', 350, 100, 12, 0, 0, 0, 0, 337),
(229, 23, '2021-10-16', 450, 40, 12, 0, 0, 0, 0, 430),
(230, 24, '2021-10-16', 300, 10, 12, 0, 0, 0, 0, 289),
(231, 25, '2021-10-16', 390, 30, 12, 0, 0, 0, 0, 371),
(233, 21, '2021-10-17', 300, 40, 8, 0, 0, 0, 0, 300),
(234, 22, '2021-10-17', 250, 80, 8, 0, 0, 0, 0, 285),
(235, 23, '2021-10-17', 300, 20, 8, 0, 0, 0, 0, 321),
(236, 24, '2021-10-17', 170, 60, 8, 0, 0, 0, 0, 244),
(237, 25, '2021-10-17', 250, 40, 8, 0, 0, 0, 0, 343),
(244, 21, '2021-10-18', 340, 10, 12, 0, 0, 0, 0, 350),
(245, 22, '2021-10-18', 350, 30, 12, 0, 0, 0, 0, 320),
(246, 23, '2021-10-18', 470, 20, 12, 0, 0, 0, 0, 500),
(247, 24, '2021-10-18', 300, 40, 12, 0, 0, 0, 0, 255),
(248, 25, '2021-10-18', 380, 40, 12, 0, 0, 0, 0, 356),
(249, 21, '2021-10-19', 250, 30, 11, 0, 0, 0, 0, 291),
(250, 22, '2021-10-19', 350, 30, 11, 0, 0, 0, 0, 322),
(251, 23, '2021-10-19', 450, 80, 11, 0, 0, 0, 0, 411),
(252, 24, '2021-10-19', 250, 40, 11, 0, 0, 0, 0, 259),
(253, 25, '2021-10-19', 380, 20, 11, 0, 0, 0, 0, 373),
(254, 21, '2021-10-20', 350, 70, 12, 0, 0, 0, 0, 283),
(255, 22, '2021-10-20', 380, 10, 12, 0, 0, 0, 0, 382),
(256, 23, '2021-10-20', 430, 40, 12, 0, 0, 0, 0, 424),
(257, 24, '2021-10-20', 300, 50, 12, 0, 0, 0, 0, 250),
(258, 25, '2021-10-20', 350, 10, 12, 0, 0, 0, 0, 363),
(259, 21, '2021-10-21', 300, 20, 12, 0, 0, 0, 0, 282),
(260, 22, '2021-10-21', 360, 30, 12, 0, 0, 0, 0, 322),
(261, 23, '2021-10-21', 350, 40, 12, 0, 0, 0, 0, 405),
(262, 24, '2021-10-21', 240, 50, 12, 0, 0, 0, 0, 244),
(263, 25, '2021-10-21', 330, 30, 12, 0, 0, 0, 0, 350),
(264, 21, '2021-10-23', 320, 20, 12, 0, 0, 0, 0, 302),
(265, 22, '2021-10-23', 330, 20, 12, 0, 0, 0, 0, 309),
(266, 23, '2021-10-23', 430, 90, 12, 0, 0, 0, 0, 411),
(267, 24, '2021-10-23', 250, 60, 12, 0, 0, 0, 0, 239),
(268, 25, '2021-10-23', 340, 50, 12, 0, 0, 0, 0, 350),
(269, 21, '2021-10-24', 290, 10, 9, 0, 0, 0, 0, 271),
(270, 22, '2021-10-24', 270, 40, 9, 0, 0, 0, 0, 286),
(271, 23, '2021-10-24', 360, 70, 9, 0, 0, 0, 0, 391),
(272, 24, '2021-10-24', 200, 50, 9, 0, 0, 0, 0, 240),
(273, 25, '2021-10-24', 280, 60, 9, 0, 0, 0, 0, 340),
(274, 21, '2021-10-25', 340, 20, 12, 0, 0, 0, 0, 320),
(275, 22, '2021-10-25', 380, 50, 12, 0, 0, 0, 0, 302),
(276, 23, '2021-10-25', 470, 90, 12, 0, 0, 0, 0, 416),
(277, 24, '2021-10-25', 320, 90, 12, 0, 0, 0, 0, 337),
(278, 25, '2021-10-25', 380, 80, 12, 0, 0, 0, 0, 368),
(279, 21, '2021-10-26', 280, 30, 12, 0, 0, 0, 0, 275),
(280, 22, '2021-10-26', 350, 70, 12, 0, 0, 0, 0, 304),
(281, 23, '2021-10-26', 400, 40, 12, 0, 0, 0, 0, 405),
(282, 24, '2021-10-26', 200, 70, 12, 0, 0, 0, 0, 197),
(283, 25, '2021-10-26', 370, 70, 12, 0, 0, 0, 0, 356),
(284, 21, '2021-10-27', 300, 50, 12, 0, 0, 0, 0, 276),
(285, 22, '2021-10-27', 250, 20, 12, 0, 0, 0, 0, 341),
(286, 23, '2021-10-27', 450, 50, 12, 0, 0, 0, 0, 413),
(287, 24, '2021-10-27', 300, 70, 12, 0, 0, 0, 0, 268),
(288, 25, '2021-10-27', 320, 50, 12, 0, 0, 0, 0, 350),
(289, 21, '2021-10-28', 300, 20, 12, 0, 0, 0, 0, 282),
(290, 22, '2021-10-28', 350, 110, 12, 0, 0, 0, 0, 360),
(291, 23, '2021-10-28', 450, 20, 12, 0, 0, 0, 0, 462),
(292, 24, '2021-10-28', 280, 40, 12, 0, 0, 0, 0, 254),
(293, 25, '2021-10-28', 350, 80, 12, 0, 0, 0, 0, 359),
(294, 21, '2021-10-30', 270, 20, 12, 0, 0, 0, 0, 279),
(295, 22, '2021-10-30', 350, 60, 12, 0, 0, 0, 0, 300),
(296, 23, '2021-10-30', 450, 30, 12, 0, 0, 0, 0, 452),
(297, 24, '2021-10-30', 300, 40, 12, 0, 0, 0, 0, 255),
(298, 25, '2021-10-30', 390, 80, 12, 0, 0, 0, 0, 371),
(299, 21, '2021-10-31', 300, 30, 9, 0, 0, 0, 0, 291),
(300, 22, '2021-10-31', 360, 10, 9, 0, 0, 0, 0, 323),
(301, 23, '2021-10-31', 350, 30, 9, 0, 0, 0, 0, 381),
(302, 24, '2021-10-31', 240, 40, 9, 0, 0, 0, 0, 243),
(304, 25, '2021-10-31', 300, 60, 9, 0, 0, 0, 0, 341),
(314, 21, '2022-01-20', 280, 52, 12, 0, 0, 0, 0, 275),
(315, 21, '2022-01-13', 250, 50, 9, 0, 0, 0, 0, 272),
(316, 21, '2022-09-27', 240, 30, 15, 0, 0, 0, 0, 275),
(317, 21, '2022-11-02', 140, 50, 7, 0, 0, 0, 0, 274),
(318, 21, '2022-11-07', 140, 50, 7, 0, 0, 0, 0, 274),
(319, 21, '2022-11-02', 160, 60, 9, 0, 0, 0, 0, 270),
(320, 21, '2022-11-01', 160, 60, 9, 0, 0, 0, 0, 270),
(321, 21, '2022-11-01', 160, 60, 9, 0, 0, 0, 0, 270),
(322, 21, '2022-11-08', 150, 60, 9, 0, 0, 0, 0, 274);

-- --------------------------------------------------------

--
-- Table structure for table `produk_roti`
--

CREATE TABLE `produk_roti` (
  `Id_roti` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_roti`
--

INSERT INTO `produk_roti` (`Id_roti`, `Nama`) VALUES
(3, 'Roti isi vanila'),
(8, 'Roti donat manis'),
(10, 'Roti isi pisang'),
(11, 'Roti isi strawberry'),
(14, 'Roti isi coklat manis');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal_riwayat` datetime NOT NULL,
  `id_variabel` int(10) NOT NULL,
  `hasil` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Level` enum('Admin','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_user`, `Nama`, `Username`, `Password`, `Level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(35, 'Muhammad Arya', 'Muhammad Arya', '4b583376b2767b923c3e1da60d10de59', 'Siswa'),
(36, 'Wahyudi', 'Wahyudi', 'c6b5cef6327916d6260a80de98184581', 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(10) NOT NULL,
  `nama_variabel` varchar(255) NOT NULL,
  `status_himpunan_variabel` enum('sembunyikan','tampil') NOT NULL DEFAULT 'sembunyikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `nama_variabel`, `status_himpunan_variabel`) VALUES
(1, 'K1', 'sembunyikan'),
(2, 'K2', 'sembunyikan'),
(3, 'K3', 'sembunyikan'),
(4, 'K4', 'sembunyikan'),
(5, 'K5', 'sembunyikan'),
(6, 'K6', 'sembunyikan'),
(7, 'K7', 'sembunyikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_keputusan` (`id_keputusan`);

--
-- Indexes for table `cek`
--
ALTER TABLE `cek`
  ADD PRIMARY KEY (`id_cek`),
  ADD KEY `id_riwayat` (`id_riwayat`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`Id_ekstra`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`Id_ekstrakulikuler`);

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id_himpunan`),
  ADD KEY `id_variabel` (`id_variabel`);

--
-- Indexes for table `himpunan1`
--
ALTER TABLE `himpunan1`
  ADD PRIMARY KEY (`Id_himpunan`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `nama_ekstra`
--
ALTER TABLE `nama_ekstra`
  ADD PRIMARY KEY (`Id_ekstra`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`Id_perhitungan`),
  ADD KEY `Id_roti` (`Id_ekstra`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`Id_produksi`),
  ADD KEY `Id_perhitungan` (`Id_perhitungan`);

--
-- Indexes for table `produk_roti`
--
ALTER TABLE `produk_roti`
  ADD PRIMARY KEY (`Id_roti`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `riwayat_member` (`id_user`),
  ADD KEY `id_resiko` (`id_variabel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `cek`
--
ALTER TABLE `cek`
  MODIFY `id_cek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `Id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `Id_ekstrakulikuler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id_himpunan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `himpunan1`
--
ALTER TABLE `himpunan1`
  MODIFY `Id_himpunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nama_ekstra`
--
ALTER TABLE `nama_ekstra`
  MODIFY `Id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `Id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `Id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `produk_roti`
--
ALTER TABLE `produk_roti`
  MODIFY `Id_roti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `Id_roti` FOREIGN KEY (`Id_ekstra`) REFERENCES `produk_roti` (`Id_roti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `perhitungan` FOREIGN KEY (`Id_perhitungan`) REFERENCES `perhitungan` (`Id_perhitungan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
