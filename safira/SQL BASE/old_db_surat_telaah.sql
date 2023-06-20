-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 08:00 AM
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
(20, 1, 'Yoki Pirnanda', 'yokipirnanda@gmail.com', 'yoki', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Karyawan', NULL, 'Programmer', '2020-06-28 03:27:00', 0),
(21, 2, 'Yeni Mustika ', 'yeni@gmail.com', 'yeni', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Karyawan', NULL, 'Blogger C', '2020-06-28 03:27:55', 0),
(22, 3, 'Administrator', 'admin@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', NULL, 'admin', '2022-11-20 06:55:57', 1);

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

--
-- Dumping data for table `laporan_kerja`
--

INSERT INTO `laporan_kerja` (`id_laporan_kerja`, `id_user`, `id_karyawan`, `tanggal_lapor`, `file_laporan`, `url`, `status_laporan`) VALUES
(3, 20, 1, '2020-06-27', 'file_laporan_1593116798.pdf', 'https://rumahitjambi.com/', 'diterima'),
(2, 20, 1, '2020-06-25', 'file_laporan_1593114320.pdf', 'https://rumahitjambi.com/', 'belum di proses'),
(4, 21, 2, '2020-06-26', 'file_laporan_1593117022.pdf', 'https://rumahitjambi.com/', 'diterima'),
(5, 21, 2, '2020-06-26', 'file_laporan_1593122104.pdf', 'https://rumahitjambi.com/', 'belum di proses');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
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

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `kepada`, `dari`, `tgl_surat`, `lampiran`, `perihal`, `latar_belakang`, `maksud_tujuan`, `permasalahan`, `usulan`, `penutup`, `diketahui_oleh`, `nama_diketahui`, `nipp_diketahui`, `nama_dibuat`, `nipp_dibuat`) VALUES
(7, 'Direksi PT. Air Minum Intan Banjar', 'Kasubag Transmisi', '2021-12-20', 'ini adalah lampiran', 'ini adalah Perihal', 'Latar belakang adalah dasar atau titik tolak untuk memberikan pemahaman kepada pembaca atau pendengar mengenai apa yang ingin kita sampaikan. Latar belakang yang baik harus disusun dengan sejelas mungkin dan bila perlu disertai dengan data atau fakta yang mendukung', 'Arti dalam maksud berarti pemaknaan. Tujuan arti sebenarnya memiliki makna selain \'maksud\', yakni \'arah\'. Arah dalam makna \'tujuan\' tidak bisa disamakan dengan \'maksud\'. Arah dalam tujuan lebih menunjukkan tempat, wilayah, kota, jurusan, dan sudut. Maksud arti sebenarnya memiliki definisi lebih luas atau umum', 'Jadi yang dimaksud problematika atau masalah adalah sesuatu yang dibutuhkan penyelesaian karena terdapat ketidaksesuaian antara teori yang ada dengan kenyataan yang terjadi', 'Pihak Kemensos sendiri akan menyalurkan bansos PKH 2022 melalui skema pencairan empat tahap. Diawali tahap 1 yang disalurkan pada Januari, tahap 2 disalurkan April sekarang, tahap 3 disalurkan Juli nanti, dan hingga tahap 4 akan disalurkan pada Oktober 2022 mendatang', 'Atas perhatian Bapak kami sampaikan terima kasih. Semoga informasi yang kami berikan bermanfaat bagi Saudara. Demikianlah harapan kami. Atas perhatian Ibu, kami sampaikan terima kasih', 'Kasubag keuangan PDAM', 'Muhammad Lukman Sarip,S.Kom', '1234567890', 'Lookman', '0987654321'),
(8, 'Direktur Teknik PT. Air Minum Intan Banjar', 'Kabag Akademik', '2022-11-18', 'Lampiran isi coba', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum dolor quaerat eos, delectus autem sint reprehenderit repellendus voluptatum veniam dicta dignissimos optio saepe quidem repudiandae vel exercitationem ratione, recusandae rerum.', 'Kasubag EHEM', 'Salahudin', '098876876867676678', 'Lukman sarip', '098987978789787'),
(10, 'Direksi PT. Air Minum Intan Banjar', 'asdasdasds', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `tanggal_kirim_tugas`, `id_karyawan`, `keterangan_tugas`, `deadline`, `file`) VALUES
(1, '2020-06-26', 1, 'Buatlah aplikasi siakad kampus STMIK NH dengan alur program sesuai dengan file yang diupload', '2020-07-31', 'file_tugas_1593108775.pdf'),
(2, '2020-06-26', 2, 'Buat Artikel Teknologi contoh pada file yang dikrim', '2020-06-30', 'file_tugas_1593121383.pdf');

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
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
