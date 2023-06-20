-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 10:50 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat_telaah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(3) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(66) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `id_karyawan`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`, `aktif`) VALUES
(20, 1, 'Yoki Pirnanda', 'yokipirnanda@gmail.com', 'yoki', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', NULL, 'Programmer', '2023-01-31 09:49:08', 0),
(23, 2, 'Yeni Mustika', 'arieflukman557@gmail.com', 'yeni', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', NULL, 'asd', '2023-01-31 09:49:20', 0),
(22, 3, 'Administrator', 'admin@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', NULL, 'admin', '2023-01-31 09:49:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `bagian_karyawan` varchar(50) NOT NULL,
  `tugas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bagian_karyawan`, `tugas`) VALUES
(1, 'Programmer', 'Membuat program berbasis android dan web'),
(2, 'Blogger', 'Menulis artikel teknologi setiap hari'),
(3, 'Admin', 'Admin Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `NIK`, `jenis_kelamin`, `alamat`, `no_hp`, `id_bidang`, `foto`) VALUES
(1, 'Yoki Pirndada', '1509060208960003', 'Laki-Laki', 'Jl. Lintas Jambi', '085267539848', 1, 'karyawan_1593102990.jpg'),
(2, 'Yeni Mustika', '1509060208960002', 'Perempuan', 'Tungkal', '085267539848', 2, 'karyawan_1593103045.jpg'),
(3, 'Arif Lukman', '1509060208960002', 'Laki-Laki', 'Jambi', '0898988778', 3, 'karyawan_1593124267.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kerja`
--

CREATE TABLE `laporan_kerja` (
  `id_laporan_kerja` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `file_laporan` varchar(255) NOT NULL,
  `url` varchar(200) NOT NULL,
  `status_laporan` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kepada` varchar(2000) NOT NULL,
  `dari` varchar(2000) NOT NULL,
  `tgl_surat` varchar(2000) NOT NULL,
  `lampiran` varchar(2000) NOT NULL,
  `perihal` varchar(2000) NOT NULL,
  `latar_belakang` varchar(2000) NOT NULL,
  `maksud_tujuan` varchar(2000) NOT NULL,
  `permasalahan` varchar(2000) NOT NULL,
  `usulan` varchar(2000) NOT NULL,
  `penutup` varchar(2000) NOT NULL,
  `diketahui_oleh` varchar(2000) NOT NULL,
  `nama_diketahui` varchar(2000) NOT NULL,
  `nipp_diketahui` varchar(2000) NOT NULL,
  `nama_dibuat` varchar(2000) NOT NULL,
  `nipp_dibuat` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `tanggal_kirim_tugas` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `keterangan_tugas` text NOT NULL,
  `deadline` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `laporan_kerja`
--
ALTER TABLE `laporan_kerja`
  ADD PRIMARY KEY (`id_laporan_kerja`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan_kerja`
--
ALTER TABLE `laporan_kerja`
  MODIFY `id_laporan_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
