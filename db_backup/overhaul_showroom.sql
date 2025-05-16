-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 07:42 PM
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
-- Database: `overhaul_showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_akun_tbl`
--

CREATE TABLE `dm_akun_tbl` (
  `id_akun` int(11) NOT NULL,
  `username_akun` varchar(20) NOT NULL,
  `password_akun` varchar(255) NOT NULL,
  `email_akun` varchar(255) NOT NULL,
  `recovery_key` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_akun_tbl`
--

INSERT INTO `dm_akun_tbl` (`id_akun`, `username_akun`, `password_akun`, `email_akun`, `recovery_key`) VALUES
(1, 'admin', 'admin123', 'hasansr@gmail.com', '52115756');

-- --------------------------------------------------------

--
-- Table structure for table `dm_calon_buyer_tbl`
--

CREATE TABLE `dm_calon_buyer_tbl` (
  `id_calon_buyer` int(11) NOT NULL,
  `nama_depan_calon_buyer` varchar(255) NOT NULL,
  `nama_belakang_calon_buyer` varchar(255) NOT NULL,
  `email_calon_buyer` varchar(255) NOT NULL,
  `nomor_telepon_calon_buyer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dm_jadwal_tbl`
--

CREATE TABLE `dm_jadwal_tbl` (
  `id_jadwal` int(11) NOT NULL,
  `hari_jadwal` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dm_jadwal_tbl`
--

INSERT INTO `dm_jadwal_tbl` (`id_jadwal`, `hari_jadwal`, `jam_buka`, `jam_tutup`) VALUES
(1, 'senin', '08:00:00', '16:00:00'),
(2, 'selasa', '08:00:00', '16:00:00'),
(3, 'rabu', '08:00:00', '16:00:00'),
(4, 'kamis', '08:00:00', '16:00:00'),
(5, 'jumat', '08:00:00', '16:00:00'),
(6, 'sabtu', '08:00:00', '16:00:00'),
(7, 'minggu', '08:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_mobil_tbl`
--

CREATE TABLE `dm_mobil_tbl` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `merek_mobil` enum('lamborghini','mercedes','porsche','ferrari','bmw') NOT NULL,
  `deskripsi_mobil` text NOT NULL,
  `tipe_mobil` enum('suv','hatchback','supercar','sedan') NOT NULL,
  `stok_mobil` int(11) NOT NULL,
  `harga_mobil` decimal(15,2) NOT NULL,
  `gambar_mobil` varchar(255) DEFAULT NULL,
  `gambar_mobil_overview` varchar(255) DEFAULT NULL,
  `tanggal_diperbaharui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='data master mobil';

--
-- Dumping data for table `dm_mobil_tbl`
--

INSERT INTO `dm_mobil_tbl` (`id_mobil`, `nama_mobil`, `merek_mobil`, `deskripsi_mobil`, `tipe_mobil`, `stok_mobil`, `harga_mobil`, `gambar_mobil`, `gambar_mobil_overview`, `tanggal_diperbaharui`, `tanggal_dibuat`) VALUES
(1, 'URUS', 'lamborghini', 'Lamborghini Urus is the first Super Sport Utility Vehicle in the world, merging the soul of a super sports car with the practical functionality of an SUV. Powered by Lamborghini’s 4.0-liter twin turbo V8 engine and, in the case of Urus SE, a powerful electric motor, the Urus embodies a performance mindset that combines Fun-to-Drive with astounding vehicle capabilities. The design, performance, driving dynamics, and unbridled emotion flow effortlessly into this visionary realization of authentic Lamborghini DNA, revolutionizing an entire segment.', 'hatchback', 15, 5000000000.00, 'uploads/68240d1660add_lamborghini-urus-s-2.jpeg', 'uploads/68240d16616d3_Arancio Xanto Metallic-AXAX-240,84,35-640-en_US.jpg', '2025-05-14 03:25:10', '2025-05-14 03:25:10'),
(2, 'Aventador', 'lamborghini', 'Revolutionary thinking is at the heart of every idea from Automobili Lamborghini. Whether it is aerospace-inspired design or technologies applied to the naturally aspirated V12 engine or carbon-fiber structure, going beyond accepted limits is part of our philosophy. The Aventador advances every concept of performance, immediately establishing itself as the benchmark for the super sports car sector. Giving a glimpse of the future today, it comes from a family of supercars already considered legendary.', 'supercar', 5, 75000000000.00, 'uploads/68241dbf44504_9672537d45ff40a308fa2df062fbb76a.jpg', 'uploads/68241dbf455f8_Used-2017-Lamborghini-Aventador-LP700-4-1675967894.jpg', '2025-05-14 04:36:15', '2025-05-14 04:36:15'),
(3, 'M3 E46', 'bmw', 'BMW M3 E46 adalah varian legendaris dari seri M yang diproduksi antara tahun 2000 hingga 2006, dikenal luas karena keseimbangan sempurna antara performa, handling, dan desain klasik khas BMW. Mengusung mesin 3.2-liter inline-6 naturally aspirated (kode S54), mobil ini menghasilkan tenaga sekitar 333 hp, yang dikombinasikan dengan pilihan transmisi manual 6-percepatan atau SMG otomatis. Dikenal karena karakter berkendara yang responsif dan suara mesin yang khas, M3 E46 menjadi favorit para pecinta mobil sport dan kolektor karena menawarkan sensasi mengemudi yang murni, tanpa terlalu banyak intervensi elektronik seperti pada generasi setelahnya. Desain bodinya yang elegan namun agresif tetap menjadi ikon otomotif hingga hari ini.\r\n', 'sedan', 50, 500000000.00, 'uploads/68244a1ff056d_14476051527_d2563506c9_b.jpg', 'uploads/68244a1ff2692_yuri-rodchenko-2.jpg', '2025-05-14 07:45:35', '2025-05-14 07:45:35'),
(5, 'SL65 AMG', 'mercedes', 'Mercedes-Benz SL65 AMG adalah mobil roadster mewah berperforma tinggi yang menggabungkan desain elegan khas seri SL dengan kekuatan brutal dari divisi performa AMG. Ditenagai oleh mesin V12 6.0-liter twin-turbo, mobil ini menghasilkan tenaga luar biasa sekitar 604 hp dan torsi mencapai 1000 Nm, memungkinkan akselerasi 0-100 km/jam dalam waktu sekitar 4 detik. Dibalut dengan material premium dan teknologi canggih, SL65 AMG menawarkan kenyamanan dan kemewahan tanpa mengorbankan sensasi berkendara ekstrem. Sebagai salah satu model andalan AMG, SL65 AMG menjadi simbol dari kekuatan, eksklusivitas, dan rekayasa otomotif kelas atas.\r\n', 'sedan', 50, 75000000000.00, 'uploads/682454bf1a7c5_mercedes-benz-sl65-amg-black-series.jpg', 'uploads/682454bf1b334_202206-f480acc68f67493d92a7dc9650681eca.jpeg', '2025-05-14 08:30:55', '2025-05-14 08:30:55'),
(6, 'GLC', 'mercedes', 'Mercedes-Benz GLC adalah SUV mewah kelas menengah yang menggabungkan desain elegan, teknologi canggih, dan kenyamanan khas Mercedes dalam paket yang praktis dan serbaguna. Dikenal dengan tampilan modern dan aerodinamis, GLC hadir dengan pilihan mesin bensin, diesel, maupun plug-in hybrid, yang memberikan performa halus dan efisiensi bahan bakar yang baik. Interiornya mewah dengan material premium, sistem infotainment MBUX berbasis AI, dan fitur keselamatan kelas atas seperti adaptive cruise control, lane keeping assist, dan blind spot monitoring. Baik untuk penggunaan harian di kota maupun perjalanan jauh, GLC menawarkan kenyamanan berkendara yang superior tanpa mengorbankan gaya atau kepraktisan.', 'suv', 50, 400000000.00, 'uploads/682456ca7696a_suv-img-glc.jpg', 'uploads/682456ca77445_Mercedes-Benz-AMG-GLC_170_small.png', '2025-05-14 08:39:38', '2025-05-14 08:39:38'),
(7, 'Cayman GTS', 'porsche', 'The Porsche Cayman GTS adalah mobil sport coupe dua pintu yang menawarkan keseimbangan sempurna antara performa tinggi dan pengalaman berkendara yang mengasyikkan. Ditenagai oleh mesin enam silinder boxer naturally aspirated, GTS menyuguhkan tenaga yang responsif dan suara yang khas. Dengan sasis yang disetel secara sporty, suspensi adaptif, dan berbagai fitur performa lainnya, Cayman GTS memberikan handling yang presisi dan lincah, menjadikannya pilihan menarik bagi para penggemar mobil sport yang mencari sensasi berkendara murni.', 'supercar', 5, 5000000000.00, 'uploads/6824c97da464c_614615.jpg', 'uploads/6824c97da5217_c3bf2503403a9954d26d536e346bef46.jpg', '2025-05-14 16:49:01', '2025-05-14 16:49:01'),
(8, 'Ferrari LaFerrari', 'ferrari', 'Ferrari LaFerrari adalah sebuah mahakarya otomotif, hypercar hybrid edisi terbatas yang mewakili puncak teknologi dan performa dari Maranello. Diluncurkan pada tahun 2013, mobil ini adalah Ferrari pertama yang menggunakan sistem hybrid KERS (Kinetic Energy Recovery System) yang diturunkan dari Formula 1. Jantung performanya adalah kombinasi mesin V12 naturally aspirated 6.3 liter yang bertenaga dengan motor listrik, menghasilkan total output yang luar biasa. Desainnya yang radikal dan aerodinamis tidak hanya memukau secara visual tetapi juga sangat fungsional, dengan elemen aerodinamika aktif yang beradaptasi untuk memberikan downforce optimal. Dibangun di atas sasis monocoque serat karbon yang ringan namun kokoh, LaFerrari menawarkan handling yang sangat presisi dan performa akselerasi yang brutal, menjadikannya salah satu mobil paling cepat dan paling didambakan yang pernah diproduksi oleh Ferrari.', 'supercar', 5, 99000000000.00, 'uploads/6824cad5ebba8_wp1863663-ferrari-laferrari-wallpapers.jpg', 'uploads/6824cad5ec7f6_ferrari-laferrari-wallpaper-preview.jpg', '2025-05-14 16:54:45', '2025-05-14 16:54:45'),
(9, 'dummy', 'ferrari', 'sadasdasdasdadasdsadasdasdasdd', 'sedan', 12321, 21312312.00, 'uploads/6824cc32a07a1_fff&text=Dummy+Hero+HD.png', 'uploads/6824cc32a1111_0011ff&text=Dummy+thumbnail+4_3.png', '2025-05-14 17:00:34', '2025-05-14 17:00:34'),
(10, 'dummy', 'porsche', '12321312313131', 'suv', 1231, 1231231.00, 'uploads/6824cc47e6f20_fff&text=Dummy+Hero+HD.png', 'uploads/6824cc47e7a64_0011ff&text=Dummy+thumbnail+4_3.png', '2025-05-14 17:00:55', '2025-05-14 17:00:55'),
(11, 'asdsadsad', 'ferrari', 'sadasdasdsadsadasdsad', 'sedan', 12312, 12312.00, 'uploads/6824cc6c6f580_fff&text=Dummy+Hero+HD.png', 'uploads/6824cc6c6fe28_0011ff&text=Dummy+thumbnail+4_3.png', '2025-05-14 17:01:32', '2025-05-14 17:01:32'),
(12, 'dummy', 'mercedes', '1231232131', 'hatchback', 12321, 1312312.00, 'uploads/6824cc854130e_fff&text=Dummy+Hero+HD.png', 'uploads/6824cc8541a1e_0011ff&text=Dummy+thumbnail+4_3.png', '2025-05-14 17:01:57', '2025-05-14 17:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `tr_pembelian_mobil_tbl`
--

CREATE TABLE `tr_pembelian_mobil_tbl` (
  `id_transaksi` int(11) NOT NULL,
  `id_calon_buyer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `stok_dibeli` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `tanggal_jam_janjian` datetime NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `harga_deal` decimal(15,2) NOT NULL,
  `status_transaksi` enum('pending','selesai','batal','on-going') NOT NULL DEFAULT 'pending',
  `id_akun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_akun_tbl`
--
ALTER TABLE `dm_akun_tbl`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username_akun` (`username_akun`);

--
-- Indexes for table `dm_calon_buyer_tbl`
--
ALTER TABLE `dm_calon_buyer_tbl`
  ADD PRIMARY KEY (`id_calon_buyer`),
  ADD UNIQUE KEY `email_calon_buyer` (`email_calon_buyer`);

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
-- Indexes for table `tr_pembelian_mobil_tbl`
--
ALTER TABLE `tr_pembelian_mobil_tbl`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_calon_buyer` (`id_calon_buyer`),
  ADD KEY `fk_transaksi_mobil` (`id_mobil`),
  ADD KEY `fk_transaksi_jadwal` (`id_jadwal`),
  ADD KEY `fk_transaksi_akun` (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_akun_tbl`
--
ALTER TABLE `dm_akun_tbl`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dm_calon_buyer_tbl`
--
ALTER TABLE `dm_calon_buyer_tbl`
  MODIFY `id_calon_buyer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dm_jadwal_tbl`
--
ALTER TABLE `dm_jadwal_tbl`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dm_mobil_tbl`
--
ALTER TABLE `dm_mobil_tbl`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tr_pembelian_mobil_tbl`
--
ALTER TABLE `tr_pembelian_mobil_tbl`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tr_pembelian_mobil_tbl`
--
ALTER TABLE `tr_pembelian_mobil_tbl`
  ADD CONSTRAINT `fk_transaksi_akun` FOREIGN KEY (`id_akun`) REFERENCES `dm_akun_tbl` (`id_akun`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaksi_calon_buyer` FOREIGN KEY (`id_calon_buyer`) REFERENCES `dm_calon_buyer_tbl` (`id_calon_buyer`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transaksi_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `dm_jadwal_tbl` (`id_jadwal`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_transaksi_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `dm_mobil_tbl` (`id_mobil`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
