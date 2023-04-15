-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 10:30 AM
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
(6, 323111, 'Izin', '2023-04-11'),
(8, 3231, 'Tanpa Keterangan', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `foto_kegiatan` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `foto_kegiatan`, `deskripsi`) VALUES
(5, 'Seminar Endgame with Gita Wirjawan', 'ENDGAME2.png', 'Membahas masa depan manusia'),
(6, 'Seminar Endgame with Gita Wirjawan', 'ENDGAME3.png', 'Membahas masa depan manusia');

-- --------------------------------------------------------

--
-- Table structure for table `master_guru`
--

CREATE TABLE `master_guru` (
  `nuptk` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_guru`
--

INSERT INTO `master_guru` (`nuptk`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `jabatan`, `pendidikan_terakhir`, `telp`) VALUES
('909', 'Indrawan Nugroho', 'L', 'Solo', '1994-12-12', 'Kepsek', 'S1', '087776671234');

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
(123, 'IKLFJS', 'JFDLKSJ', 'L', 'DKLSF', 'FLKJ', '0000-00-00', 2018, 'Becak', 'Kost'),
(3231, 'Anggi', 'FDAF', 'L', 'FDASF', 'FDSAF', '2023-04-04', 342332, 'FDSFA', 'DFAF'),
(54321, 'Inwan Solihudin', 'Purwakarta', 'L', 'Islam', 'Karawang', '1999-12-05', 2018, 'Becak', 'Kost'),
(323111, 'Abdul', 'FDAF', 'P', 'FDASF', 'FDSAF', '2023-04-04', 342332, 'FDSFA', 'DFAF'),
(320943207, 'Andromeda', 'Jl. Kuningan Barat 3, RT 07/003, Kelurahan Kuningan Barat, Jakarta Selatan 12710', 'L', 'Islam', 'Yogyakarta', '1998-12-05', 2018, 'Becak', 'Kost'),
(320943209, 'Andrew', 'Jl. Kuningan Barat 3, RT 07/003, Kelurahan Kuningan Barat, Jakarta Selatan 12710', 'L', 'Islam', 'Yogyakarta', '1998-12-05', 2018, 'Becak', 'Kost');

-- --------------------------------------------------------

--
-- Table structure for table `pengembangan`
--

CREATE TABLE `pengembangan` (
  `id_pengembangan` int(11) NOT NULL,
  `nama_pengembangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembangan`
--

INSERT INTO `pengembangan` (`id_pengembangan`, `nama_pengembangan`) VALUES
(1, 'Agama & Moral'),
(2, 'Sosial & Emosional'),
(3, 'Fisik & Motorik'),
(4, 'Kognitif'),
(5, 'Bahasa'),
(6, 'Seni');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `aspek` varchar(128) NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `sikap_spiritual` text NOT NULL,
  `sikap_sosial` text NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id_kegiatan`);

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
-- Indexes for table `pengembangan`
--
ALTER TABLE `pengembangan`
  ADD PRIMARY KEY (`id_pengembangan`);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengembangan`
--
ALTER TABLE `pengembangan`
  MODIFY `id_pengembangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
