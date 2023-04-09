-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 03:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kehadiran` enum('Hadir','Tanpa Keterangan','Izin','Sakit') NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen`, `nisn`, `kehadiran`, `tanggal`) VALUES
(3, 3231, 'Izin', '2023-04-09'),
(6, 323111, 'Hadir', '2023-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` varchar(128) NOT NULL,
  `harian` varchar(128) NOT NULL,
  `materi_kegiatan` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_guru`
--

CREATE TABLE `master_guru` (
  `nuptk` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `masa_kerja` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_siswa`
--

CREATE TABLE `master_siswa` (
  `nisn` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tahun_ajaran` int(20) NOT NULL,
  `alat_transportasi` varchar(128) NOT NULL,
  `jenis_tinggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_siswa`
--

INSERT INTO `master_siswa` (`nisn`, `nama`, `alamat`, `jk`, `agama`, `tempat_lahir`, `tgl_lahir`, `tahun_ajaran`, `alat_transportasi`, `jenis_tinggal`) VALUES
(3231, 'Anggi', 'FDAF', 'L', 'FDASF', 'FDSAF', '2023-04-04', 342332, 'FDSFA', 'DFAF'),
(323111, 'Abdul', 'FDAF', 'P', 'FDASF', 'FDSAF', '2023-04-04', 342332, 'FDSFA', 'DFAF');

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `keterampilan` varchar(128) NOT NULL,
  `sikap` varchar(128) NOT NULL,
  `akademik` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Ahmad', 'ahmad', '123456', 1),
(2, 'Richard', 'richard', '123456', 2),
(3, 'Kipli', 'kipli', '123456', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `master_guru`
--
ALTER TABLE `master_guru`
  ADD PRIMARY KEY (`nuptk`);

--
-- Indexes for table `master_siswa`
--
ALTER TABLE `master_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `id_absen` (`id_absen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `master_siswa` (`nisn`);

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `raport_ibfk_1` FOREIGN KEY (`id_absen`) REFERENCES `absen_siswa` (`id_absen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
