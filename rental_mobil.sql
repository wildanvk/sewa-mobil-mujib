-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 11:36 AM
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
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `status`) VALUES
(1, 'Toyota', 'Aktif'),
(2, 'Honda', 'Aktif'),
(13, 'Mitsubishi', 'Aktif'),
(14, 'Daihatsu', 'Aktif'),
(15, 'Suzuki', 'Aktif'),
(16, 'Nissan', 'Tidak Aktif'),
(17, 'Hyundai', 'Aktif'),
(18, 'Volkswagen', 'Tidak Aktif'),
(19, 'Lexus', 'Aktif'),
(20, 'BMW', 'Tidak Aktif'),
(21, 'Isuzu', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `tersedia` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `fitur_ac` enum('Ada','Tidak Ada') NOT NULL,
  `fitur_tv` enum('Ada','Tidak Ada') NOT NULL,
  `gambar_mobil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_merek`, `id_warna`, `nama_mobil`, `plat_nomor`, `tahun`, `harga_sewa`, `denda`, `status`, `tersedia`, `fitur_ac`, `fitur_tv`, `gambar_mobil`) VALUES
(1, 1, 1, 'Avanza', 'G 2020 FG', 2015, 200000, 50000, 'Aktif', 'Tersedia', 'Ada', 'Ada', '1700330725_8f8a6db2ccc801ef0381.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`, `status`) VALUES
(1, 'Silver', 'Aktif'),
(2, 'Hitam', 'Aktif'),
(3, 'Merah', 'Aktif'),
(4, 'Kuning', 'Tidak Aktif'),
(6, 'Biru', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
