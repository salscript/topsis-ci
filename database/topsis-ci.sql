-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 02:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis-ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `alters`
--

CREATE TABLE `alters` (
  `idalter` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `id_tahun` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alters`
--

INSERT INTO `alters` (`idalter`, `ket`, `id_tahun`, `status`) VALUES
(8, 'PT.Sinar Syno Kimia', 2, 1),
(9, 'PT.Niagatama Hijau raya', 2, 1),
(10, 'PT.Chiemstar Indonesia', 2, 1),
(12, 'PT.Naga Putra Suteramas', 2, 1),
(13, 'PT.Amanda Anggun Textile', 2, 1),
(14, 'PT.Kahatex', 2, 1),
(15, 'PT.Jayamas Dwi Perkasa', 2, 1),
(19, 'PT. Tirta Fresindo Jaya', 2, 1),
(20, 'PT.Indo Poly Swakarya', 2, 1),
(21, 'PT.Mitra Plastik', 2, 1),
(34, 'PT SALEMA JAYA', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('qcieigmuvtt834ke2hrn791nr41or6am', '127.0.0.1', 1712029757, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032393735373b),
('u5ro63gkimjlcaa2fq36gru5q7ihdctu', '127.0.0.1', 1712029757, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032393735373b),
('bg3oannhlc4l7b4m37b5g7dp367kptni', '127.0.0.1', 1712029742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032393734323b),
('1p1thfcu66cl7u53o7hdppdsfr80d7vu', '127.0.0.1', 1712030048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032393930353b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b),
('ean29drvujoq24441bo1uter57ii6t8u', '127.0.0.1', 1712029741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032393734313b),
('3l35e964ncpdkqsgmu308mqbc9hvvtvj', '127.0.0.1', 1712022062, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323032313839303b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a31313a22636f72726563742e706e67223b),
('1al278msqdslteaagscgqbbalatecbmu', '127.0.0.1', 1712106792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731323130363739323b),
('iq96l6b72jfodpn42tcsauhdaaupg97d', '::1', 1736424055, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733363432343035353b),
('v8mrqib9tcavq02orpaau0kg33nc1fl1', '::1', 1736425908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313733363432353731313b),
('a8gdp1bp80finvkq0js5lcuo4tne22sb', '::1', 1744441568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343434313432393b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b),
('026ks3dsi9jgguafitfavhd3u654j7m1', '::1', 1744718789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343731383738393b),
('pr2o6dr6tqk4ueko367mud482vj79tsl', '::1', 1744852752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343835323635343b),
('s0i1j1r4g9nb6q18stkjpvgoo1sbbaku', '::1', 1744718733, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343731383732333b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b),
('ilb9kvb5ds4oiugqok7km32hfdttr3dj', '::1', 1744852717, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343835323731373b),
('ph16mbso2i9t75uult9fhogaifm683d5', '::1', 1744858155, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734343835383135353b),
('30tg32t6vb4bf54f0k2v1kqhamvd9461', '::1', 1745073765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734353037333730373b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b),
('uatuj1mld717jasimjjtseanc7hl6msv', '127.0.0.1', 1745397793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734353339373635383b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b),
('s2n0cfioas5iv24mu85jlhsn0rmkfflo', '::1', 1745411325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313734353431313332313b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b666f746f7c733a33363a2238393930343861623063633435353135343030366664623936373639363462332e6a7067223b);

-- --------------------------------------------------------

--
-- Table structure for table `format_setting`
--

CREATE TABLE `format_setting` (
  `head` longtext DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `foot` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `format_setting`
--

INSERT INTO `format_setting` (`head`, `body`, `foot`) VALUES
('<div style=\"text-align: center;\">\r\n    \r\n    <img src=\"http://localhost/TOPSIS-CI/assets/images/topsis12.jpg\" style=\"width: 88.6666px; height: 88.6666px;\"><h3 style=\"margin: 0; font-weight: bold;\">PT. SENOTEXINDO JAYA LESTARI KABUPATEN BANDUNG</h3>\r\n    <p style=\"margin: 0;\">\r\n        Jl. Raya Bandung-Garut Km 25,5, Nanjung, Nanjungmekar,<br>\r\n        Rancaekek, Kabupaten Bandung\r\n    </p></div>', 'Laporan Hasil Akhir ', '<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">Bandung, <u>                                                   </u></div><div style=\"text-align: center;\">Mengetahui,<u></u></div>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p style=\"margin-left: 25px;\"><span style=\"background-color: transparent;\">Direktur</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p style=\"margin-left: 25px;\">xxxxxxxxxx<br></p>\r\n            </td>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51); background-color: transparent;\">Manager</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p>      Kasep_Code</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Meyetujui,</span></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Kepala Admin<br></span></p>\r\n                <p><br></p>\r\n                <p>TTD<br></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\"><br></span><span style=\"color: rgb(51, 51, 51);\">xxxxxxxxxxxx<br></span></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `tanggal_aksi` datetime DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `menu`, `aksi`, `tanggal_aksi`, `user_name`) VALUES
(129, 'Data tahun', '\"2\"', '2025-04-15 06:27:52', 'admin'),
(130, 'Data tahun', '\"17\"', '2025-04-15 06:28:20', 'admin'),
(131, 'Data Kriteria', 'Tambah Kriteria ID:37', '2025-04-15 06:45:51', 'admin'),
(132, 'Data Kriteria', 'Tambah Kriteria ID:38', '2025-04-15 06:46:16', 'admin'),
(133, 'Data Kriteria', 'Tambah Kriteria ID:39', '2025-04-15 06:46:40', 'admin'),
(134, 'Data Kriteria', 'Tambah Kriteria ID:40', '2025-04-15 07:07:10', 'admin'),
(135, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 07:29:28', 'admin'),
(136, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 07:29:39', 'admin'),
(137, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 07:29:49', 'admin'),
(138, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 07:29:56', 'admin'),
(139, 'Data Kriteria', 'Tambah Kriteria ID:41', '2025-04-15 07:30:11', 'admin'),
(140, 'Data Kriteria', 'Tambah Kriteria ID:42', '2025-04-15 07:41:15', 'admin'),
(141, 'Data Kriteria', 'Tambah Kriteria ID:43', '2025-04-15 09:02:30', 'admin'),
(142, 'Data Kriteria', 'Tambah Kriteria ID:44', '2025-04-15 09:02:54', 'admin'),
(143, 'Data Kriteria', 'Tambah Kriteria ID:45', '2025-04-15 09:03:14', 'admin'),
(144, 'Data Kriteria', 'Tambah Kriteria ID:46', '2025-04-15 13:22:59', 'admin'),
(145, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 13:23:19', 'admin'),
(146, 'Data Kriteria', 'Tambah Kriteria ID:47', '2025-04-15 13:23:55', 'admin'),
(147, 'Data Kriteria', 'Hapus Kriteria ID:Array', '2025-04-15 13:24:01', 'admin'),
(148, 'Data Kriteria', 'Tambah Kriteria ID: 48', '2025-04-15 13:27:55', 'admin'),
(149, 'Data Kriteria', 'Hapus Kriteria ID: 48', '2025-04-15 13:28:01', 'admin'),
(150, 'Data tahun', '\"2\"', '2025-04-17 03:22:27', 'admin'),
(151, 'Data tahun', '\"2\"', '2025-04-17 03:35:44', 'admin'),
(152, 'Data tahun', '\"2\"', '2025-04-17 03:56:14', 'admin'),
(153, 'Data format_setting', 'null', '2025-04-17 04:10:30', 'admin'),
(154, 'Data format_setting', 'null', '2025-04-17 04:17:15', 'admin'),
(155, 'Data format_setting', 'null', '2025-04-17 04:17:32', 'admin'),
(156, 'Data format_setting', 'null', '2025-04-17 04:24:41', 'admin'),
(157, 'Data setting', 'null', '2025-04-17 04:27:06', 'admin'),
(158, 'Data setting', 'null', '2025-04-17 04:27:33', 'admin'),
(159, 'Data setting', 'null', '2025-04-17 04:29:03', 'admin'),
(160, 'Data format_setting', 'null', '2025-04-17 04:29:07', 'admin'),
(161, 'Data format_setting', 'null', '2025-04-17 04:36:37', 'admin'),
(162, 'Data format_setting', 'null', '2025-04-17 04:42:45', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idkri` int(11) NOT NULL,
  `ketkri` varchar(100) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `atribut` set('benefit','cost') NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idkri`, `ketkri`, `bobot`, `atribut`, `name`, `status`) VALUES
(41, 'Harga', '0.20', 'cost', 'C1', 1),
(42, 'Kualitas', '0.25', 'benefit', 'C2', 1),
(43, 'Kapasitas Produksi', '0.20', 'benefit', 'C3', 1),
(44, 'Ketepatan Waktu Pengiriman', '0.20', 'benefit', 'C4', 1),
(45, 'Garansi', '0.15', 'benefit', 'C5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memgota`
--

CREATE TABLE `memgota` (
  `id_ngota` int(11) NOT NULL,
  `usn` varchar(32) NOT NULL,
  `pwo` varchar(128) NOT NULL,
  `role` set('ADMIN','OPERATOR','PIMPINAN') NOT NULL DEFAULT '',
  `status` int(11) DEFAULT NULL,
  `foto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `memgota`
--

INSERT INTO `memgota` (`id_ngota`, `usn`, `pwo`, `role`, `status`, `foto`) VALUES
(1, 'admin', '1a382c7339f0ac81773311f264ba2610', 'ADMIN', 1, '899048ab0cc455154006fdb9676964b3.jpg'),
(12, 'operator', 'ff852edd2d33b0495d74118a4e8c57e6', 'OPERATOR', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alter`
--

CREATE TABLE `nilai_alter` (
  `idnilai` int(11) NOT NULL,
  `idalter` int(11) NOT NULL,
  `idkri` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nilai_alter`
--

INSERT INTO `nilai_alter` (`idnilai`, `idalter`, `idkri`, `nilai`) VALUES
(32, 8, 41, 1),
(33, 8, 42, 2),
(34, 8, 43, 2),
(35, 8, 44, 2),
(36, 8, 45, 2),
(37, 9, 41, 2),
(38, 9, 42, 2),
(39, 9, 43, 3),
(40, 9, 44, 1),
(41, 9, 45, 3),
(42, 10, 41, 2),
(43, 10, 42, 3),
(44, 10, 43, 2),
(45, 10, 44, 2),
(46, 10, 45, 2),
(52, 12, 41, 3),
(53, 12, 42, 1),
(54, 12, 43, 2),
(55, 12, 44, 2),
(56, 12, 45, 2),
(57, 13, 41, 3),
(58, 13, 42, 1),
(59, 13, 43, 2),
(60, 13, 44, 1),
(61, 13, 45, 2),
(62, 14, 41, 3),
(63, 14, 42, 2),
(64, 14, 43, 2),
(65, 14, 44, 1),
(66, 14, 45, 2),
(67, 15, 41, 1),
(68, 15, 42, 1),
(69, 15, 43, 1),
(70, 15, 44, 2),
(71, 15, 45, 2),
(87, 19, 41, 1),
(88, 19, 42, 1),
(89, 19, 43, 1),
(90, 19, 44, 2),
(91, 19, 45, 2),
(92, 20, 41, 1),
(93, 20, 42, 2),
(94, 20, 43, 2),
(95, 20, 44, 2),
(96, 20, 45, 2),
(97, 21, 41, 1),
(98, 21, 42, 2),
(99, 21, 43, 3),
(100, 21, 44, 2),
(101, 21, 45, 2),
(112, 34, 41, 1),
(113, 34, 42, 3),
(114, 34, 43, 3),
(115, 34, 44, 3),
(116, 34, 45, 3);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `logo` longtext DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `kota` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`logo`, `nama`, `kota`) VALUES
('topsis11.jpg', 'PT.SENOTEXINDO JAYA LESTARI KABUPATEN BANDUNG', 'BANDUNG');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `roll_no` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`roll_no`, `Name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `idsub` int(11) NOT NULL,
  `idkri` int(11) NOT NULL,
  `nama_sub` varchar(100) NOT NULL,
  `indikator` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`idsub`, `idkri`, `nama_sub`, `indikator`, `bobot`) VALUES
(1, 41, 'Sangat Murah', '< Rp. 50.000 per unit produk', 1),
(2, 41, 'Murah', 'Rp. 50.001 – Rp. 100.000 per unit produk', 2),
(3, 41, 'Standar', 'Rp. 100.001 – Rp. 150.000 per unit produk', 3),
(4, 42, 'Sangat Tinggi', 'Ketahanan produk > 5 tahun', 3),
(5, 42, 'Tinggi', 'Ketahanan produk 3–5 tahun', 2),
(6, 42, 'Baik', 'Ketahanan produk 1–3 tahun', 1),
(7, 43, 'Sangat Tinggi', 'Produksi > 501 unit produk per bulan', 3),
(8, 43, 'Tinggi', 'Produksi 301 – 500 unit produk per bulan', 2),
(9, 43, 'Standar', 'Produksi 100 – 300 unit produk per bulan', 1),
(10, 44, 'Sangat Tepat Waktu', 'Tidak ada keterlambatan (0 hari)', 3),
(11, 44, 'Tepat Waktu', 'Keterlambatan rata-rata < 3 hari', 2),
(12, 44, 'Cukup Tepat Waktu', 'Keterlambatan rata-rata ≥ 4 hari', 1),
(13, 45, 'Sangat Panjang', 'Garansi > 2 tahun', 3),
(14, 45, 'Panjang', 'Garansi 1 – 2 tahun', 2),
(15, 45, 'Standar', 'Garansi < 1 tahun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` bigint(20) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tgl_mulai`, `status`, `tgl_selesai`) VALUES
(2, '2025-01-01', 1, '2025-01-31'),
(17, '2025-02-01', 1, '2025-02-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alters`
--
ALTER TABLE `alters`
  ADD PRIMARY KEY (`idalter`) USING BTREE,
  ADD KEY `id_tahun` (`id_tahun`) USING BTREE;

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`) USING BTREE;

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkri`) USING BTREE;

--
-- Indexes for table `memgota`
--
ALTER TABLE `memgota`
  ADD PRIMARY KEY (`id_ngota`) USING BTREE;

--
-- Indexes for table `nilai_alter`
--
ALTER TABLE `nilai_alter`
  ADD PRIMARY KEY (`idnilai`) USING BTREE,
  ADD KEY `idalter` (`idalter`) USING BTREE,
  ADD KEY `idkri` (`idkri`) USING BTREE;

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`roll_no`) USING BTREE;

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`idsub`),
  ADD KEY `idkri` (`idkri`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alters`
--
ALTER TABLE `alters`
  MODIFY `idalter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `memgota`
--
ALTER TABLE `memgota`
  MODIFY `id_ngota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_alter`
--
ALTER TABLE `nilai_alter`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `stud`
--
ALTER TABLE `stud`
  MODIFY `roll_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `idsub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alters`
--
ALTER TABLE `alters`
  ADD CONSTRAINT `alters_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`);

--
-- Constraints for table `nilai_alter`
--
ALTER TABLE `nilai_alter`
  ADD CONSTRAINT `nilai_alter_ibfk_1` FOREIGN KEY (`idalter`) REFERENCES `alters` (`idalter`),
  ADD CONSTRAINT `nilai_alter_ibfk_2` FOREIGN KEY (`idkri`) REFERENCES `kriteria` (`idkri`);

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`idkri`) REFERENCES `kriteria` (`idkri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
