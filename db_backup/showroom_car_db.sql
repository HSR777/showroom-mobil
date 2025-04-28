-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 04:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom_car_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_akun_tbl`
--

CREATE TABLE `dm_akun_tbl` (
  `id_akun` int(3) NOT NULL,
  `username_akun` varchar(20) NOT NULL,
  `password_akun` varchar(16) NOT NULL,
  `recovery_key` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_akun_tbl`
--

INSERT INTO `dm_akun_tbl` (`id_akun`, `username_akun`, `password_akun`, `recovery_key`) VALUES
(1, 'admin', 'admin123', 78564444);

-- --------------------------------------------------------

--
-- Table structure for table `dm_calon_buyer_tbl`
--

CREATE TABLE `dm_calon_buyer_tbl` (
  `id_calon_buyer` int(3) NOT NULL,
  `nama_calon_buyer` varchar(255) NOT NULL,
  `email_calon_buyer` varchar(255) NOT NULL,
  `nomor_calon_buyer` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_jadwal_tbl`
--

CREATE TABLE `dm_jadwal_tbl` (
  `id_jadwal` int(11) NOT NULL,
  `hari_jadwal` varchar(10) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_mobil_tbl`
--

CREATE TABLE `dm_mobil_tbl` (
  `id_mobil` int(3) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `merek_mobil` varchar(100) NOT NULL,
  `deskripsi_mobil` varchar(100) NOT NULL,
  `warna_mobil` varchar(20) NOT NULL,
  `stok_mobil` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='data master mobil';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_akun_tbl`
--
ALTER TABLE `dm_akun_tbl`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `dm_calon_buyer_tbl`
--
ALTER TABLE `dm_calon_buyer_tbl`
  ADD PRIMARY KEY (`id_calon_buyer`);

--
-- Indexes for table `dm_jadwal_tbl`
--
ALTER TABLE `dm_jadwal_tbl`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `dm_mobil_tbl`
--
ALTER TABLE `dm_mobil_tbl`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_calon_buyer_tbl`
--
ALTER TABLE `dm_calon_buyer_tbl`
  MODIFY `id_calon_buyer` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_jadwal_tbl`
--
ALTER TABLE `dm_jadwal_tbl`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_mobil_tbl`
--
ALTER TABLE `dm_mobil_tbl`
  MODIFY `id_mobil` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
