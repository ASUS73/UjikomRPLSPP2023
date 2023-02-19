-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pLogin1` (IN `a1` VARCHAR(200), IN `a2` VARCHAR(200))   SELECT * FROM tb_petugas WHERE username = a1 AND password = a2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pLogin2` (IN `a1` TEXT)   UPDATE tb_petugas SET token = a1 ORDER BY id_petugas LIMIT 2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pLogin3` (IN `a1` VARCHAR(200), IN `a2` VARCHAR(200))   SELECT * FROM tb_siswa WHERE nisn = a1 AND nis = a2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pLogin4` (IN `a1` TEXT)   UPDATE tb_siswa SET token = a1 ORDER BY nisn LIMIT 2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas1` ()   SELECT * FROM tb_petugas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas2` (IN `a1` INT)   SELECT * FROM tb_petugas WHERE id_petugas = a1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas3` (IN `a1` INT)   DELETE FROM tb_petugas WHERE id_petugas = a1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas4` (IN `a1` VARCHAR(200), IN `a2` VARCHAR(200), IN `a3` VARCHAR(200), IN `a4` ENUM('admin','petugas'))   INSERT INTO tb_petugas(username, password, nama_petugas, level) VALUES (a1,a2,a3,a4)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas5` (IN `a1` VARCHAR(200), IN `a2` VARCHAR(200), IN `a3` VARCHAR(200), IN `a4` ENUM('admin','petugas'), IN `a5` INT)   UPDATE tb_petugas SET nama_petugas = a1, username = a2, password = a3, level = a4 WHERE id_petugas = a5$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(3) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `wali_kelas` varchar(100) NOT NULL,
  `kompetensi_keahlian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL-1', 'Sir Alan Clarck', 'Rekayasa Perangkat Lunak'),
(2, 'XII RPL-2', 'Federick Harrison', 'Rekayasa Perangkat Lunak'),
(3, 'XII RPL-3', 'Dzulfikar Bima', 'Rekayasa Perangkat Lunak'),
(5, 'XII MM-1', 'Sentinel Hawker', 'Multi Media'),
(7, 'XII MM-2', 'Jeremy William', 'Multi Media'),
(8, 'XII MM-3', 'Sir Arthur Watson', 'Multi Media');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` varchar(2) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_bayar`, `jumlah_bayar`, `id_spp`) VALUES
(82, 1, '2020202112350', '2023-02-01', '01', 180000, 1),
(83, 19, '2020202112349', '2023-02-01', '01', 180000, 1),
(84, 1, '2020202112345', '2023-02-01', '01', 180000, 1),
(85, 19, '2020202112347', '2023-02-01', '01', 180000, 1),
(86, 1, '2020202112346', '2023-02-01', '01', 250000, 2),
(87, 19, '2020202112348', '2023-02-01', '01', 250000, 2),
(88, 1, '2020202112350', '2023-02-16', '04', 180000, 1),
(89, 19, '2020202112349', '2023-02-16', '04', 180000, 1),
(90, 19, '2020202112351', '2023-02-16', '04', 150000, 9),
(92, 19, '2020202112347', '2023-02-16', '04', 180000, 1),
(93, 1, '2020202112346', '2023-02-16', '04', 250000, 2),
(94, 19, '2020202112348', '2023-02-16', '04', 250000, 2),
(95, 19, '2020202112351', '2023-02-01', '01', 150000, 9),
(96, 1, '2020202112350', '2023-02-16', '12', 180000, 1),
(98, 19, '2020202112349', '2023-02-16', '12', 180000, 1),
(107, 1, '2020202112351', '2023-02-16', '12', 150000, 9),
(110, 1, '2020202112345', '2023-02-16', '12', 180000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `token`) VALUES
(1, 'admin', 'admin12345', 'Advisor', 'admin', 'AIAPEtKe&$O6E_P7F8nO6!rx+t$TGgD!9sdQhnsuHQUw#aMxSGUjSwS$K^LaXbA9SjNnPYsGqPInirOPl$RKU2X+Anm5x7T1jZq$+qq5ygV@!+o+OykC!X6FYAeZ9YdbIwy!$n^^P3dU4d#IKa%)nz&Yxqm)Seq#MmmG_TncyCQVDwm)PCR1&zURVYtE&CJ6MzIalPkQD_QY6qyQk)Elofll*YbjCRL@HNe8Luy@+UxqxxSHE'),
(19, 'Administrasi I', 'satomi', 'Mike Marcus Durrant', 'petugas', 'AIAPEtKe&$O6E_P7F8nO6!rx+t$TGgD!9sdQhnsuHQUw#aMxSGUjSwS$K^LaXbA9SjNnPYsGqPInirOPl$RKU2X+Anm5x7T1jZq$+qq5ygV@!+o+OykC!X6FYAeZ9YdbIwy!$n^^P3dU4d#IKa%)nz&Yxqm)Seq#MmmG_TncyCQVDwm)PCR1&zURVYtE&CJ6MzIalPkQD_QY6qyQk)Elofll*YbjCRL@HNe8Luy@+UxqxxSHE'),
(22, 'Security I', 'daimler', 'Bayerisch Daimler', 'petugas', ''),
(25, 'Perpustakaan I', 'kason', 'Gerald William', 'petugas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `token` text DEFAULT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `jenis_kelamin`, `alamat`, `no_telp`, `id_spp`, `token`, `total_bayar`) VALUES
('2020202112345', '2020202112345', 'Jason Hudson', 1, 'Laki-Laki', 'Las Vegas, Amerika', '088234716456', 1, 'qluXBY3ZeFGR2QrnHmlk2Zq@FazSV4%Z&@43y7Kp!@RTtw%X(j^@mE5hJlt+DXg$4SEMyIkHCM()v9dQ3G@y7qNpbC_ovnzYyJtA@SNPs#b+jM9Ben@bptigSOe8MOaCP!OoG(6XI$9VNoGL#rLEpcTSgO8jLtMtP&DKgppx7q6JQ^kTqOsVb$XpqPUrRLgPw3#nYmqZsnqLpixzFTVn*tN&%E)Wm^m9aMP7ABZP%I$B!mYwYjxJ(5SAP', 350000),
('2020202112346', '2020202112346', 'Alex Mason', 2, 'Laki-Laki', 'Atlanta, Amerika', '083723485748', 2, '', 0),
('2020202112347', '2020202112347', 'Dimitry Petrenko', 1, 'Laki-Laki', 'Moskow, Rusia', '081231249888', 1, '', 0),
('2020202112348', '2020202112348', 'Lev Kravchenko', 3, 'Laki-Laki', 'Moskow, Rusia', '091233127811', 2, '', 0),
('2020202112349', '2020202112349', 'John Price', 5, 'Laki-Laki', 'Skotlandia, United Kingdom', '098237812738', 1, '', 0),
('2020202112350', '2020202112350', 'John MacTavish', 5, 'Laki-Laki', 'London, United Kingdom', '098123782334', 1, '', 0),
('2020202112351', '2020202112351', 'Gary Roach Sanderson', 8, 'Laki-Laki', 'London, United Kingdom', '098912387665', 9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2022, 180000),
(2, 2023, 250000),
(9, 2021, 150000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`,`nisn`,`id_spp`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_kelas` (`id_kelas`,`id_spp`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD UNIQUE KEY `tahun` (`tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
