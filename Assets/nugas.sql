-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `NIP` int(7) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `No_telp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIP`, `Password`, `Nama`, `No_telp`) VALUES
(1223, '123', 'Afrizal Bakhri', 1231231231);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID` varchar(5) NOT NULL,
  `Nama` varchar(10) NOT NULL,
  `Tingkatan_kelas` int(2) NOT NULL,
  `NIP` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID`, `Nama`, `Tingkatan_kelas`, `NIP`) VALUES
('123', 'Waliudin', 3, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `kp_luar`
--

CREATE TABLE `kp_luar` (
  `ID_kp` varchar(5) NOT NULL,
  `NIP` int(7) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Jadwal_Kegiatan` varchar(10) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kp_mapel`
--

CREATE TABLE `kp_mapel` (
  `ID_kp` varchar(5) NOT NULL,
  `NIP` int(7) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Jadwal_Kegiatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID` varchar(5) NOT NULL,
  `NIP` int(7) NOT NULL,
  `Pesan_Pemberitahuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `ID` varchar(5) NOT NULL,
  `ID_tugas` varchar(5) NOT NULL,
  `Tugas_selesai` varchar(5) NOT NULL,
  `Tugas_terlambat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(7) NOT NULL,
  `ID_kelas` varchar(5) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `No_telp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `ID_kelas`, `Password`, `Nama`, `No_telp`) VALUES
(22012, '123', '123', 'ayam', 23123123);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `ID` varchar(5) NOT NULL,
  `ID_kp` varchar(5) NOT NULL,
  `NIS` int(7) NOT NULL,
  `Tanggal_dibuat` date NOT NULL,
  `Deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID`);