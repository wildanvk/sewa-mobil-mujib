-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 06:41 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` char(30) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_denda` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `status` enum('Belum Bayar','Menunggu Konfirmasi','Terkonfirmasi') NOT NULL DEFAULT 'Belum Bayar',
  `uploaded` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_mobil`, `tanggal_sewa`, `tanggal_kembali`, `lama_sewa`, `tanggal_pengembalian`, `total_bayar`, `total_denda`, `bukti_pembayaran`, `foto_ktp`, `status`, `uploaded`) VALUES
(19, 'TRX20240116182239188', 4, '2024-01-17', '2024-01-21', 4, '2024-01-18', 1200000, 0, '1705435514_0c9bc1c05f2965e31068.png', '1705435514_8f38ecce95082d60cd25.png', 'Terkonfirmasi', 1),
(21, 'TRX20240117163444542', 3, '2024-01-20', '2024-01-22', 2, '2024-01-18', 500000, 0, '1705509339_87e5129a178d473ed711.png', '1705509339_8728e373cdbc7353deaa.png', 'Terkonfirmasi', 1),
(26, 'TRX20240117173501522', 4, '2024-01-21', '2024-01-25', 4, '2024-01-18', 1200000, 0, '1705512991_71ed30a328a1289bff33.png', '1705512991_d3e29f273e4813a48459.png', 'Terkonfirmasi', 1);

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
(1, 1, 1, 'Avanza', 'G 2020 FG', 2015, 200000, 50000, 'Aktif', 'Tersedia', 'Ada', 'Tidak Ada', '1700330725_8f8a6db2ccc801ef0381.jpeg'),
(3, 1, 1, 'Yaris', 'G 2021 GH', 2019, 250000, 75000, 'Aktif', 'Tersedia', 'Ada', 'Ada', '1700413656_4ec5708c89e9ab672082.png'),
(4, 14, 1, 'Xenia', 'G 2023', 2020, 300000, 75000, 'Aktif', 'Tersedia', 'Ada', 'Ada', '1700509705_f4e3acf422e99f71d7fc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`, `status`) VALUES
(2, 'BRI', '165468465213654', 'Muhammad Mujibud Da\'awad', 'Aktif'),
(3, 'BCA', '564651654651464', 'Intan Yugistira', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('Aktif','Selesai','Batal') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `status`, `created_at`) VALUES
('TRX20240116182239188', 4, 'Selesai', '2024-01-17 01:22:39'),
('TRX20240117163444542', 4, 'Selesai', '2024-01-17 23:34:44'),
('TRX20240117173501522', 4, 'Selesai', '2024-01-18 00:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `jenis_kelamin`, `email`, `telepon`, `alamat`, `password`) VALUES
(4, 'Wildan Vinu Kananta', 2147483647, 'laki-laki', 'wildanvinukananta@gmail.com', '087771371419', 'JL. DHARMA BAKTI GG. 7 NO. 79B, Medono', '$2y$10$tV2Hmz9IK4gJ0Ci3uNGTx.qvYvdEYD4vawAAoaZqreK1/OP7ZFs.u'),
(5, 'Mujib', 2147483647, 'laki-laki', 'mujib@gmail.com', '085150021000', 'Panjang', '$2y$10$BSMAKkVH27SJgqbx.Uyf7uHwbHizxs3/TGQ2erGrD6vojltDDNGNm');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

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
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
