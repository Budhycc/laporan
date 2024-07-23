-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2024 at 03:10 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cetak`
--

CREATE TABLE `cetak` (
  `id_cetak` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `kode_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cetak`
--

INSERT INTO `cetak` (`id_cetak`, `id_laporan`, `kode_surat`) VALUES
(2, 41, '1y0o7'),
(3, 39, 'gI5AK'),
(4, 40, 'OxQ8k'),
(5, 42, 'W0mji'),
(6, 44, 'HPK7i'),
(7, 46, 'S2O8A');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `waktu_laporan` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `alamat_kejadian` varchar(255) NOT NULL,
  `terlapor` varchar(255) DEFAULT NULL,
  `korban` varchar(255) DEFAULT NULL,
  `yang_terjadi` varchar(255) NOT NULL,
  `bagaimana_terjadi` varchar(255) DEFAULT NULL,
  `pidana` varchar(255) DEFAULT NULL,
  `saksi` varchar(255) DEFAULT NULL,
  `kejadian` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `waktu_laporan`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `pekerjaan`, `ktp`, `no_hp`, `no_wa`, `tanggal_kejadian`, `alamat_kejadian`, `terlapor`, `korban`, `yang_terjadi`, `bagaimana_terjadi`, `pidana`, `saksi`, `kejadian`, `bukti`, `status`) VALUES
(1, '2024-07-31', '1', 'anjay', '1', '2024-06-14', '1', '1', '1', 'sFU0W9GW64Yj70pElql90dd64411-33b6-4760-a3b3-ed0cfef80f03.jpeg', '1', '1', '2024-06-21', '1', '1', '1', '1', '1', 'KUHP', '1', '1', 'sFU0W9GW64Yj70pElql98b0c04a5-e85b-4d58-89a0-4dfc6eabd7d2.jpeg', 'diproses'),
(6, '2024-07-30', '1', '1', '1', '2024-06-14', '1', '1', '1', 'sFU0W9GW64Yj70pElql90dd64411-33b6-4760-a3b3-ed0cfef80f03.jpeg', '1', '1', '2024-06-21', '1', '1', '1', '1', '1', 'KUHP', '1', '1', 'sFU0W9GW64Yj70pElql98b0c04a5-e85b-4d58-89a0-4dfc6eabd7d2.jpeg', 'Klarifikasi'),
(23, '2024-07-29', '5555', '5', '5', '2024-07-03', '5', '5', '5', 'yVtHF74hCOFFHlxQXiXqKotori Fried Chicken ( KFC ).jpeg', '5', '5', '2024-07-22', '5', '5', '5', '5', '5', 'KUHP', '5', '5', 'yVtHF74hCOFFHlxQXiXqjadwal.jpeg', 'diproses'),
(35, '2024-07-28', '9', '9', '9', '2024-07-04', '9', '9', '9', 'GTlTKqtUvJviV5nPYe4ojadwal.jpeg', '9', '9', '2024-07-04', '9', '9', '9', '9', '9', 'KUHP', '9', '9', 'GTlTKqtUvJviV5nPYe4oKotori Fried Chicken ( KFC ).jpeg', 'Valid'),
(36, '2024-07-27', '77', '7', '7', '2024-07-11', '7', '7', '7', 'f3ZvT8o3FmpJczj2bdTDjadwal.jpeg', '7', '7', '2024-07-04', '8', '8', '8', '8', '8', 'KUHP', '8', '8', 'f3ZvT8o3FmpJczj2bdTDKotori_Fried_Chicken__KFC_.jpeg', 'Klarifikasi'),
(37, '2024-07-26', '7878878', '7', '7', '0007-07-07', '7', '7', '7', 'KmXboFDrQWPeaeC3jTuCjadwal.jpeg', '7', '7', '0007-07-07', '7', '7', '7', '7', '7', 'KUHP', '7', '7', 'KmXboFDrQWPeaeC3jTuCjadwal.jpeg', 'diproses'),
(38, '2024-07-25', '8123456789', '8', '8', '0008-08-08', '8', '8', '8', 'RR3Yg4TjH3axCbJ1otcBKotori_Fried_Chicken__KFC_.jpeg', '8', '8', '0008-08-08', '8', '8', '8', '8', '8', 'KUHP', '8', '8', 'RR3Yg4TjH3axCbJ1otcBKotori_Fried_Chicken__KFC_.jpeg', 'Valid'),
(39, '2024-07-24', '1234567890', 'Budi', 'lapoa', '2024-07-04', 'laki', 'lapoa', 'gg', 'MxGtB7yPdFlQ4pBV4rEGScreenshot_2024-06-16_at_08.37.37.png', '+6281344099200', '+6281344099200', '2024-07-05', 'kendari', 'aji', 'ari', 'membunuh', 'begitu', 'KUHP', 'saya', 'anjay', 'MxGtB7yPdFlQ4pBV4rEGScreenshot_2024-06-16_at_16.09.14.png', 'Selesai'),
(40, '2024-07-05', '1029384756', 'Budi Setiawan', 'kendari', '2024-07-05', 'laki-laki', 'kendari', 'sekolah', 'iPue8xHdklDEliQCj9MUScreenshot_2024-06-16_at_16.55.38.png', '+6281344099200', '+6281344099200', '2024-07-05', 'makasar', 'ari', 'ira', 'pelecehan', 'rape', 'KUHP', 'saya', 'rape', 'iPue8xHdklDEliQCj9MUScreenshot_2023-12-20_at_19.11.34.png', 'diproses'),
(41, '2024-07-05', '77744657575', 'alwan', 'kendari', '2024-07-05', 'laki-laki', 'kendari', 'sekolah', 'KNEsW51l8X3BmzCEkUa5Screenshot_2024-06-16_at_16.55.38.png', '+6281344099200', '+6281344099200', '2024-07-05', 'makasar', 'ari', 'ira', 'pelecehan', 'rape', 'KUHP', 'saya', 'rape', 'KNEsW51l8X3BmzCEkUa5Screenshot_2023-12-20_at_19.11.34.png', 'diproses'),
(42, '2024-07-20', '1', '1', '1', '0001-01-01', 'laki-laki', '1', '1', 'JAFNCq3wHQwIxtoyNEKdScreenshot_2024-07-20_at_20.19.17.png', '1', '1', '0001-01-01', '1', '1', '1', '1', 'hghhhaa', '1', '1', 'dd', 'JAFNCq3wHQwIxtoyNEKdScreenshot_2024-07-20_at_20.19.17.png', 'Selesai'),
(44, '2024-07-20', '112345678', '1', '1', '0001-01-01', 'laki-laki', '1', '1', '4Imm3mwb4QZDqUSl7frH', '1', '1', '0001-01-01', '1', '', '', '1', '', '', '', '1', '4Imm3mwb4QZDqUSl7frHScreenshot_2024-07-20_at_20.19.17.png', 'diproses'),
(45, '2024-07-21', '1', '1', '1', '0001-01-01', 'laki-laki', '1', '1', 'FDfz2V20ETVpFIrSwWRE', '1', '1', '0001-01-01', '1', '', '', '1', '1', '', '', '1', 'FDfz2V20ETVpFIrSwWREScreenshot_2024-07-16_at_21.23.10.png', 'diproses'),
(46, '2024-07-23', '1', '1', '1', '0001-01-01', 'laki-laki', '1', '1', 'lX5pay5krvxQdWTbzMn5', '123456789012', '123456789012', '0001-01-01', '1', '', '', '1', 'sffdfsfsd', '', '', 'hjsfsdbjfbsjdfbhdsfhdsbfdsbfs', 'lX5pay5krvxQdWTbzMn5Screenshot_2024-07-22_at_19.04.45.png', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`) VALUES
(1, 'budi', '12345'),
(2, 'a', 'a'),
(3, 'user1', 'password1'),
(4, 'user2', 'password2'),
(5, 'user3', 'password3'),
(6, 'user4', 'password4'),
(7, 'user5', 'password5'),
(8, 'user6', 'password6'),
(9, 'user7', 'password7'),
(10, 'user8', 'password8'),
(11, 'user9', 'password9'),
(12, 'user10', 'password10'),
(13, 'user11', 'password11'),
(14, 'user12', 'password12'),
(15, 'user13', 'password13'),
(16, 'user14', 'password14'),
(17, 'user15', 'password15'),
(18, 'user16', 'password16'),
(19, 'user17', 'password17'),
(20, 'user18', 'password18'),
(21, 'user19', 'password19'),
(22, 'user20', 'password20'),
(23, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetak`
--
ALTER TABLE `cetak`
  ADD PRIMARY KEY (`id_cetak`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cetak`
--
ALTER TABLE `cetak`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cetak`
--
ALTER TABLE `cetak`
  ADD CONSTRAINT `cetak_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
