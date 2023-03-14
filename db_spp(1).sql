-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 03:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(15, 'XII RPL-1', 'Fajar Kurnia', 'Rekayasa Perangkat Lunak');

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
(165, 30, '1234567890', '2023-03-14', '01', 170000, 16);

--
-- Triggers `tb_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `tDelete` BEFORE DELETE ON `tb_pembayaran` FOR EACH ROW UPDATE tb_siswa SET total_bayar = total_bayar - old.jumlah_bayar WHERE nisn = old.nisn
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tInsert` AFTER INSERT ON `tb_pembayaran` FOR EACH ROW BEGIN UPDATE tb_siswa SET total_bayar= total_bayar + NEW.jumlah_bayar WHERE nisn= NEW.nisn; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tUpdate` BEFORE UPDATE ON `tb_pembayaran` FOR EACH ROW UPDATE tb_siswa SET total_bayar = total_bayar - old.jumlah_bayar + new.jumlah_bayar WHERE nisn = new.nisn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(30, 'admin', 'admin12345', 'Advisor', 'admin'),
(34, 'petugas', 'petugas', 'petugas', 'petugas');

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
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `jenis_kelamin`, `alamat`, `no_telp`, `id_spp`, `total_bayar`) VALUES
('1234567890', '1234567890', 'Yusron', 15, 'Laki-Laki', 'Blok.Sukamaju', '128497264735', 16, 170000);

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
(16, 2022, 170000),
(17, 2023, 180000);

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
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`),
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
