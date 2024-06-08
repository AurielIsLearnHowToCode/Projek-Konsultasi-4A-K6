-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 02:05 AM
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

--
-- Dumping data for table `kp_mapel`
--

INSERT INTO `kp_mapel` (`ID_kp`, `NIP`, `Nama`, `Jadwal_Kegiatan`) VALUES
('KP001', 1223, 'PAI', 'Senin'),
('KP002', 1223, 'Bahasa Indonesia', 'Senin'),
('KP003', 1223, 'Bahasa Inggris', 'Rabu'),
('KP004', 1223, 'Bahasa Sunda', 'Rabu'),
('KP005', 1223, 'Bahasa Jepang', 'Selasa'),
('KP006', 1223, 'Matematika Wajib', 'Selasa'),
('KP007', 1223, 'Matematika IPA', 'Kamis'),
('KP008', 1223, 'Fisika', 'Kamis'),
('KP009', 1223, 'Biologi', 'Jum`at'),
('KP010', 1223, 'Kimia', 'Jum`at'),
('KP011', 1223, 'Ekonomi', 'Selasa'),
('KP012', 1223, 'Sejarah', 'Kamis');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID` int(5) NOT NULL,
  `NIP` int(7) NOT NULL,
  `Pesan_Pemberitahuan` varchar(255) NOT NULL,
  `Jenis` varchar(15) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`ID`, `NIP`, `Pesan_Pemberitahuan`, `Jenis`, `created_at`) VALUES
(6, 1223, 'Presentasi Projek Konsultasi di undur untuk urutan dari 9 keatas\r\n', 'event', '2024-06-07'),
(7, 1223, 'PROKONTIL!!!!!', 'announcement', '2024-06-07'),
(8, 1223, 'PBO presentasi nanti senin tanggal 10 juni 2024', 'announcement', '2024-06-07');

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
  `Nama` varchar(30) NOT NULL,
  `Tanggal_dibuat` date NOT NULL,
  `Deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`ID`, `ID_kp`, `Nama`, `Tanggal_dibuat`, `Deadline`) VALUES
('61432', 'KP002', 'test', '2024-06-07', '2024-06-14'),
('31406', 'KP005', 'Testo', '2024-06-07', '2024-06-14');

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

--
-- Indexes for table `kp_luar`
--
ALTER TABLE `kp_luar`
  ADD PRIMARY KEY (`ID_kp`);

--
-- Indexes for table `kp_mapel`
--
ALTER TABLE `kp_mapel`
  ADD PRIMARY KEY (`ID_kp`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
