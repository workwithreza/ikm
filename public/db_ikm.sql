-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 04:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ikm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE `bencana` (
  `no_bencana` int(11) NOT NULL,
  `nama_bencana` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`no_bencana`, `nama_bencana`) VALUES
(1, 'Gempa Bumi'),
(2, 'Tsunami'),
(3, 'Banjir'),
(4, 'Tanah Longsor'),
(5, 'Letusan Gunung Api'),
(6, 'Kekeringan'),
(7, 'Gelombang Ekstrim dan Abrasi'),
(8, 'Cuaca Ekstrim (Angin Puting Beliung)'),
(9, 'Kebakaran Hutan dan Lahan'),
(10, 'Epidemi dan Wabah Penyakit'),
(11, 'Kegagalan Teknologi'),
(12, 'Konflik Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_28_061351_create_pegawais_table', 1),
(2, '2021_08_09_040208_create_wilayahs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `param_1`
--

CREATE TABLE `param_1` (
  `no_param_1` int(11) NOT NULL,
  `a1_1` tinyint(4) NOT NULL,
  `a1_2` tinyint(4) NOT NULL,
  `a2_1` tinyint(4) NOT NULL,
  `a2_2` tinyint(4) NOT NULL,
  `a3_1` tinyint(4) NOT NULL,
  `a3_2` tinyint(4) NOT NULL,
  `a4_1` tinyint(4) NOT NULL,
  `a4_2` tinyint(4) NOT NULL,
  `a5_1` tinyint(4) NOT NULL,
  `a5_2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_1_2`
--

CREATE TABLE `param_1_2` (
  `no_param_1_2` int(11) NOT NULL,
  `no_bencana` int(11) NOT NULL,
  `no_param_1` int(11) NOT NULL,
  `no_param_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_2`
--

CREATE TABLE `param_2` (
  `no_param_2` int(11) NOT NULL,
  `b1_1` tinyint(4) NOT NULL,
  `b1_2` tinyint(4) NOT NULL,
  `b2_1` tinyint(4) NOT NULL,
  `b2_2` tinyint(4) NOT NULL,
  `b3_1` tinyint(4) NOT NULL,
  `b3_2` tinyint(4) NOT NULL,
  `b4_1` tinyint(4) NOT NULL,
  `b4_2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_3`
--

CREATE TABLE `param_3` (
  `no_param_3` int(11) NOT NULL,
  `c1_1` tinyint(4) NOT NULL,
  `c1_2` tinyint(4) NOT NULL,
  `c2_1` tinyint(4) NOT NULL,
  `c2_2` tinyint(4) NOT NULL,
  `c3_1` tinyint(4) NOT NULL,
  `c3_2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_4`
--

CREATE TABLE `param_4` (
  `no_param_4` int(11) NOT NULL,
  `d1_1` tinyint(4) NOT NULL,
  `d1_2` tinyint(4) NOT NULL,
  `d2_1` tinyint(4) NOT NULL,
  `d2_2` tinyint(4) NOT NULL,
  `d3_1` tinyint(4) NOT NULL,
  `d3_2` tinyint(4) NOT NULL,
  `d4_1` tinyint(4) NOT NULL,
  `d4_2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_5`
--

CREATE TABLE `param_5` (
  `no_param_5` int(11) NOT NULL,
  `e1_1` tinyint(4) NOT NULL,
  `e1_2` tinyint(4) NOT NULL,
  `e2_1` tinyint(4) NOT NULL,
  `e2_2` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `NIP` int(11) NOT NULL,
  `nama_pegawai` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_pegawai` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`NIP`, `nama_pegawai`, `username_pegawai`, `password_pegawai`, `is_admin`, `created_at`, `updated_at`) VALUES
(12345, 'Muhammad Reza Azzahrawan', 'murera', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-08-08 21:12:25', '2021-08-08 21:12:25'),
(123456, 'Zaki Tifani Fauzan', 'zakifauzz', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2021-08-08 21:12:25', '2021-08-08 21:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `no_responden` int(11) NOT NULL,
  `nama_responden` varchar(45) NOT NULL,
  `jabatan_responden` varchar(45) NOT NULL,
  `usia_responden` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kode` varchar(13) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `no` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `no_responden` int(11) NOT NULL,
  `no_param_1_2` int(11) NOT NULL,
  `no_param_3` int(11) NOT NULL,
  `no_param_4` int(11) NOT NULL,
  `no_param_5` int(11) NOT NULL,
  `tanggal_survey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `kode` varchar(13) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`no_bencana`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `param_1`
--
ALTER TABLE `param_1`
  ADD PRIMARY KEY (`no_param_1`);

--
-- Indexes for table `param_1_2`
--
ALTER TABLE `param_1_2`
  ADD PRIMARY KEY (`no_param_1_2`),
  ADD KEY `no_bencana` (`no_bencana`),
  ADD KEY `no_param_1` (`no_param_1`),
  ADD KEY `no_param_2` (`no_param_2`);

--
-- Indexes for table `param_2`
--
ALTER TABLE `param_2`
  ADD PRIMARY KEY (`no_param_2`);

--
-- Indexes for table `param_3`
--
ALTER TABLE `param_3`
  ADD PRIMARY KEY (`no_param_3`);

--
-- Indexes for table `param_4`
--
ALTER TABLE `param_4`
  ADD PRIMARY KEY (`no_param_4`);

--
-- Indexes for table `param_5`
--
ALTER TABLE `param_5`
  ADD PRIMARY KEY (`no_param_5`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`no_responden`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`no`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `no_param_1_2` (`no_param_1_2`),
  ADD KEY `no_param_3` (`no_param_3`),
  ADD KEY `no_param_4` (`no_param_4`),
  ADD KEY `no_param_5` (`no_param_5`),
  ADD KEY `no_responden` (`no_responden`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no_responden` (`no_responden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `param_1`
--
ALTER TABLE `param_1`
  MODIFY `no_param_1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_1_2`
--
ALTER TABLE `param_1_2`
  MODIFY `no_param_1_2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_2`
--
ALTER TABLE `param_2`
  MODIFY `no_param_2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_3`
--
ALTER TABLE `param_3`
  MODIFY `no_param_3` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_4`
--
ALTER TABLE `param_4`
  MODIFY `no_param_4` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_5`
--
ALTER TABLE `param_5`
  MODIFY `no_param_5` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `no_responden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `param_1_2`
--
ALTER TABLE `param_1_2`
  ADD CONSTRAINT `param_1_2_ibfk_1` FOREIGN KEY (`no_bencana`) REFERENCES `bencana` (`no_bencana`),
  ADD CONSTRAINT `param_1_2_ibfk_2` FOREIGN KEY (`no_param_2`) REFERENCES `param_2` (`no_param_2`),
  ADD CONSTRAINT `param_1_2_ibfk_3` FOREIGN KEY (`no_param_1`) REFERENCES `param_1` (`no_param_1`);

--
-- Constraints for table `responden`
--
ALTER TABLE `responden`
  ADD CONSTRAINT `responden_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `wilayah` (`kode`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `pegawais` (`NIP`),
  ADD CONSTRAINT `survey_ibfk_3` FOREIGN KEY (`no_param_3`) REFERENCES `param_3` (`no_param_3`),
  ADD CONSTRAINT `survey_ibfk_4` FOREIGN KEY (`no_param_1_2`) REFERENCES `param_1_2` (`no_param_1_2`),
  ADD CONSTRAINT `survey_ibfk_5` FOREIGN KEY (`no_param_4`) REFERENCES `param_4` (`no_param_4`),
  ADD CONSTRAINT `survey_ibfk_6` FOREIGN KEY (`no_param_5`) REFERENCES `param_5` (`no_param_5`),
  ADD CONSTRAINT `survey_ibfk_7` FOREIGN KEY (`no_responden`) REFERENCES `responden` (`no_responden`);

--
-- Constraints for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `wilayah_ibfk_1` FOREIGN KEY (`no_responden`) REFERENCES `responden` (`no_responden`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
