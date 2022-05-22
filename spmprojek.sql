-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmprojek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(12) NOT NULL,
  `namaAdmin` varchar(60) DEFAULT NULL,
  `kataLaluanAdmin` varchar(20) DEFAULT NULL,
  `jantinaAdmin` char(9) DEFAULT NULL,
  `umurAdmin` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `kataLaluanAdmin`, `jantinaAdmin`, `umurAdmin`) VALUES
('A1', 'Ryan Chan', 'channa', 'lelaki', 29);

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `idHakim` varchar(12) NOT NULL,
  `namaHakim` varchar(60) DEFAULT NULL,
  `kataLaluanHakim` varchar(20) DEFAULT NULL,
  `jantinaHakim` char(9) DEFAULT NULL,
  `umurHakim` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`idHakim`, `namaHakim`, `kataLaluanHakim`, `jantinaHakim`, `umurHakim`) VALUES
('H1', 'Chee Liang', 'ahchee123', 'lelaki', 24),
('H2', 'David Tan', '0123431012', 'lelaki', 25);

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `idMarkah` varchar(12) NOT NULL,
  `idPeserta` varchar(12) NOT NULL,
  `langkah` int(10) NOT NULL,
  `keaslian` int(10) NOT NULL,
  `kelihatan` int(10) NOT NULL,
  `jumlahMarkah` int(5) NOT NULL,
  `komenHakim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markah`
--

INSERT INTO `markah` (`idMarkah`, `idPeserta`, `langkah`, `keaslian`, `kelihatan`, `jumlahMarkah`, `komenHakim`) VALUES
('M1', 'P1', 10, 35, 33, 78, 'Ada langkah yang banyak'),
('M2', 'P2', 10, 40, 38, 88, 'Nilai estetika yang cantik'),
('M3', 'P3', 6, 32, 32, 71, 'Struktur yang kompleks'),
('M4', 'P4', 10, 35, 36, 81, 'wasd3124');

-- --------------------------------------------------------

--
-- Table structure for table `pemenang`
--

CREATE TABLE `pemenang` (
  `tempat` int(5) NOT NULL,
  `idPeserta` varchar(12) NOT NULL,
  `idMarkah` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemenang`
--

INSERT INTO `pemenang` (`tempat`, `idPeserta`, `idMarkah`) VALUES
(2, 'P1', 'M1'),
(1, 'P2', 'M2'),
(3, 'P3', 'M3');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `idPeserta` varchar(12) NOT NULL,
  `namaPeserta` varchar(60) DEFAULT NULL,
  `kataLaluanPeserta` varchar(20) DEFAULT NULL,
  `jantinaPeserta` char(9) DEFAULT NULL,
  `umurPeserta` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`idPeserta`, `namaPeserta`, `kataLaluanPeserta`, `jantinaPeserta`, `umurPeserta`) VALUES
('P1', 'Aiman', 'wasd3124', 'lelaki', 16),
('P2', 'Ai Ling', 'xxlingaixx', 'perempuan', 15),
('P3', 'Aina', '1bestarinet', 'perempuan', 14),
('P4', 'Ah Seng', '1231234123', 'lelaki', 16),
('P5', 'Ah Zai', '1231234123', 'lelaki', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`idHakim`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`idMarkah`),
  ADD KEY `idPeserta` (`idPeserta`);

--
-- Indexes for table `pemenang`
--
ALTER TABLE `pemenang`
  ADD PRIMARY KEY (`idPeserta`),
  ADD KEY `idPeserta` (`idPeserta`),
  ADD KEY `idMarkah` (`idMarkah`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`idPeserta`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `markah`
--
ALTER TABLE `markah`
  ADD CONSTRAINT `markah_ibfk_1` FOREIGN KEY (`idPeserta`) REFERENCES `peserta` (`idPeserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemenang`
--
ALTER TABLE `pemenang`
  ADD CONSTRAINT `pemenang_ibfk_1` FOREIGN KEY (`idPeserta`) REFERENCES `peserta` (`idPeserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemenang_ibfk_2` FOREIGN KEY (`idMarkah`) REFERENCES `markah` (`idMarkah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
