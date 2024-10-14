-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 14, 2024 at 03:17 PM
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
-- Database: `eargenius`
--
CREATE DATABASE IF NOT EXISTS `eargenius` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eargenius`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`) VALUES
(1, 'user123', 'pass123'),
(2, 'injil', '123'),
(3, 'usernamepanjangpanjang', '123'),
(4, 'regist', 'regist');

-- --------------------------------------------------------

--
-- Table structure for table `iem`
--

CREATE TABLE `iem` (
  `id_iem` int(11) NOT NULL,
  `rank` char(3) NOT NULL,
  `nama_iem` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iem`
--

INSERT INTO `iem` (`id_iem`, `rank`, `nama_iem`, `harga`, `path`) VALUES
(1, 'A', 'KINERA CELESTIAL', 200, 'assets/kineraCelestPhoenixcall.webp'),
(2, 'A+', 'MOONDROP DUSK', 359, 'assets/moondropCrinacleDusk.jpg'),
(3, 'B+', 'MOONDROP GOLDEN AGES', 200, 'assets/moonGoldenAges.jpg'),
(4, 'B-', 'MOONDROP SPACE', 25, 'assets/moonSpaceTravel.jpg'),
(5, 'S', 'SOUNDPEATS ENGINE 4', 60, 'assets/soundpeatsEngine4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_iem` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_iem`, `id_akun`, `review`, `foto`) VALUES
(1, 1, 1, 'Suara yang Luar Biasa', ''),
(4, 2, 4, 'ini regist review', ''),
(5, 3, 1, 'ini user review', ''),
(6, 4, 3, 'review test', ''),
(7, 1, 2, 'Bassnya gacor', ''),
(12, 1, 1, 'komen baru', 'Screenshot 2024-10-09 082234.png'),
(13, 1, 1, 'Tes Upload FIle Kecil', 'kineraCelestPhoenixcall.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `iem`
--
ALTER TABLE `iem`
  ADD PRIMARY KEY (`id_iem`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `iem` (`id_iem`),
  ADD KEY `akun` (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iem`
--
ALTER TABLE `iem`
  MODIFY `id_iem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `akun` FOREIGN KEY (`id_akun`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `iem` FOREIGN KEY (`id_iem`) REFERENCES `iem` (`id_iem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
