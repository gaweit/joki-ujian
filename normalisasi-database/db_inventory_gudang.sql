-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2023 pada 09.52
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_spesifikasi` varchar(255) DEFAULT NULL,
  `barang_lokasi` varchar(255) DEFAULT NULL,
  `barang_kondisi` varchar(255) DEFAULT NULL,
  `barang_jumlah` int(11) NOT NULL,
  `barang_sumber_dana` varchar(255) DEFAULT NULL,
  `barang_keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
(17, 'Tinta Printer ', 'Hitam 664', 'Lantai 2', 'Baru', 1, 'Capil BJM', 'Tes Edit'),
(18, 'Tinta Printer ', '003', 'Lantai 2', 'Baru', 7, 'Capil BJM', ''),
(19, 'Kertas HVS ', 'A4', 'Lantai 2', 'Baru', 2, 'Capil BJM', 'Tes Data'),
(20, 'Printer ', 'Epson l3110', 'Lantai 1', 'Second', 17, 'Capil BJM', ''),
(21, 'Pulpen', 'Snowman', 'Gudang 1', 'Baru', 3, 'Capil BJM', 'Return'),
(22, 'Tinta Printer ', 'Hitam 664', 'Lantai 2', 'Habis Pakai', 0, 'HIBAH', ''),
(23, 'Pulpen ', 'Pilot', 'Lantai 2', 'Baru', 20, 'HIBAH', ''),
(25, 'Kertas HVS ', 'A4', 'Gudang 1', 'Baru', 8, 'Capil BJM', ''),
(27, 'Tinta Printer ', '003', 'Gudang 2', 'Habis Pakai', 0, 'HIBAH', ''),
(28, 'Tinta Printer ', '664', 'Gudang 2', 'Habis Pakai', 2, 'HIBAH', ''),
(29, 'Kursi lipat  ', 'IKEA Frode', 'Gudang 1', 'Baru', 14, 'Capil BJM', ''),
(30, 'Kursi lipat  ', 'Chitose & Futura', 'Gudang 2', 'Second', 14, 'Capil BJM', 'Baru Ditambahkan'),
(31, 'Pulpen ', 'Parker Vector 2', 'Lantai 1', 'Baru', 5, 'HIBAH', ''),
(32, 'Printer ', 'Epson l3110', 'Lantai 2', 'Baru', 5, 'HIBAH', ''),
(35, 'Aqua ', 'Minuman', 'Lantai 2', 'Baru', 12, 'Capil BJM', ''),
(36, 'Pulpen ', 'Snowman v3', 'Gudang 1', 'Baru', 12, 'Dinas Hubungan', ''),
(38, 'Tinta Printer ', 'Hitam 664', 'Gudang 2', 'Second', 3, 'Capil BJM', ''),
(39, 'Kertas HVS ', '003', 'Gudang 1', 'Habis Pakai', 34, 'Dinas Hubungan', ''),
(40, 'Tinta Printer ', 'Hitam 664', 'Gudang 1', 'Baru', 2, 'Pemerintah Daerah', 'Baru Ditambahkan2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `bk_id` int(11) NOT NULL,
  `bk_id_barang` int(11) NOT NULL,
  `bk_nama_barang` varchar(255) NOT NULL,
  `bk_spesifikasi_barang` varchar(255) NOT NULL,
  `bk_tahun_pengadaan` year(4) NOT NULL,
  `bk_tgl_keluar` date NOT NULL,
  `bk_jumlah_keluar` int(11) NOT NULL,
  `bk_lokasi` varchar(255) NOT NULL,
  `bk_penerima` varchar(255) NOT NULL,
  `bk_divisi` varchar(255) NOT NULL,
  `bk_nip` char(25) NOT NULL DEFAULT '',
  `bk_keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
(8, 17, 'Tinta Printer ', 'Hitam 664', 2023, '2023-04-21', 2, 'Lantai 2', 'Ramlan', '', '', ''),
(9, 23, 'Pulpen ', 'Pilot', 2022, '2023-04-22', 5, 'Lantai 2', 'Ferry', '', '', ''),
(10, 27, 'Tinta Printer ', '003', 2023, '2023-04-27', 5, 'Gudang 2', 'ahmad Rivadi', '', '', ''),
(11, 17, 'Tinta Printer ', 'Hitam 664', 2023, '2023-04-26', 7, 'Lantai 2', 'ahmad', '', '', ''),
(12, 21, 'Pulpen', 'Snowman', 2023, '2023-04-25', 10, 'Gudang 1', 'Sofyan', '', '', ''),
(13, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-26', 2, 'Lantai 1', 'Rivaldi', '', '', 'Printer Rusak'),
(14, 30, 'Kursi lipat  ', 'Chitose & Futura', 2023, '2023-04-29', 10, 'Gudang 2', 'ahmad', '', '', ''),
(15, 18, 'Tinta Printer ', '003', 2023, '2023-04-12', 5, 'Lantai 2', 'Nobita', '', '', ''),
(16, 31, 'Pulpen ', 'Parker Vector 2', 2020, '2023-04-12', 3, 'Lantai 1', 'Sizuka', '', '', ''),
(17, 30, 'Kursi lipat  ', 'Chitose & Futura', 2023, '2023-04-30', 7, 'Gudang 2', 'Syaifuddin', '', '', ''),
(18, 27, 'Tinta Printer ', '003', 2022, '2023-04-27', 5, 'Gudang 2', 'Aldi Kurniawan', '', '', ''),
(19, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-29', 4, 'Lantai 1', 'Ahmad Riduan', '', '', ''),
(20, 21, 'Pulpen', 'Snowman', 2023, '2023-04-28', 2, 'Gudang 1', 'Saskeh ', '', '', ''),
(22, 25, 'Kertas HVS ', 'A4', 2020, '2023-04-12', 1, 'Gudang 1', 'Sofyan', '', '', ''),
(24, 31, 'Pulpen ', 'Parker Vector 2', 2022, '2023-04-13', 2, 'Lantai 1', 'ahmad Rivadi', '', '', ''),
(28, 19, 'Kertas HVS ', 'A4', 2023, '2023-04-30', 12, 'Lantai 2', 'Aldi Kurniawan', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `bm_id` int(11) NOT NULL,
  `bm_id_barang` int(11) NOT NULL,
  `bm_nama_barang` varchar(255) NOT NULL,
  `bm_spesifikasi_barang` varchar(255) NOT NULL,
  `bm_tahun_pengadaan` year(4) NOT NULL,
  `bm_tgl_masuk` date NOT NULL,
  `bm_jumlah` int(11) NOT NULL,
  `bm_id_suplier` int(11) NOT NULL,
  `bm_nama_suplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
(19, 25, 'Kertas HVS ', 'A4', 2023, '2023-04-27', 10, 7, 'Capil BJM'),
(20, 17, 'Tinta Printer ', 'Hitam 664', 2023, '2023-04-26', 10, 7, 'Capil BJM'),
(21, 23, 'Pulpen ', 'Pilot', 2022, '2023-04-27', 10, 13, 'Pemerintah Kota Banjarmasin '),
(22, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-20', 5, 8, 'PT. JAYA SEJAHTERA '),
(23, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-29', 6, 13, 'Pemerintah Kota Banjarmasin '),
(24, 27, 'Tinta Printer ', '003', 2022, '2023-04-20', 10, 7, 'Capil BJM'),
(26, 20, 'Printer ', 'Epson l3110', 2022, '2023-04-13', 5, 7, 'Capil BJM'),
(27, 21, 'Pulpen', 'Snowman', 2023, '2023-04-21', 15, 7, 'Capil BJM'),
(28, 23, 'Pulpen ', 'Pilot', 2021, '2023-04-27', 15, 13, 'Pemerintah Kota Banjarmasin '),
(29, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-28', 2, 13, 'Pemerintah Kota Banjarmasin '),
(30, 18, 'Tinta Printer ', '003', 2023, '2023-04-28', 12, 13, 'Pemerintah Kota Banjarmasin '),
(31, 30, 'Kursi lipat  ', 'Chitose & Futura', 2022, '2023-04-29', 2, 8, 'PT. JAYA SEJAHTERA '),
(32, 20, 'Printer ', 'Epson l3110', 2023, '2023-04-28', 5, 7, 'Capil BJM'),
(37, 35, 'Aqua ', 'Minuman', 2020, '2023-06-22', 2, 7, 'Capil BJM'),
(38, 28, 'Tinta Printer ', '664', 2023, '2023-06-27', 2, 13, 'Pemerintah Kota Banjarmasin ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nip` char(25) NOT NULL DEFAULT '',
  `pegawai_nama` varchar(100) NOT NULL,
  `pegawai_lahir` date NOT NULL,
  `pegawai_alamat` varchar(100) NOT NULL,
  `pegawai_telepon` varchar(100) NOT NULL,
  `pegawai_jabatan` varchar(100) NOT NULL,
  `pegawai_golongan` varchar(100) NOT NULL,
  `pegawai_pendidikan` varchar(100) NOT NULL,
  `pegawai_jenis` varchar(100) NOT NULL,
  `pegawai_foto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_lahir`, `pegawai_alamat`, `pegawai_telepon`, `pegawai_jabatan`, `pegawai_golongan`, `pegawai_pendidikan`, `pegawai_jenis`, `pegawai_foto`) VALUES
(1, '737363', 'Tinta Printer', '2023-05-12', 'rerrrrrrrrrrr', '+12038337739988', 'Sekretaris', 'I/c', 'SMA', 'PNS', ''),
(2, '21', 'Necessitatibus in te', '2023-05-05', 'Hic quis amet quo r', '80', 'Duis officia autem u', 'Et qui in doloremque', 'Eius aspernatur et n', 'Veniam corporis vel', ''),
(5, '49', 'Corporis culpa et fu', '2023-06-23', 'Soluta at pariatur ', '36', 'Excepturi velit dolo', 'Accusamus cumque qua', 'Obcaecati error est ', 'Esse inventore et v', '1167708016_2-2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `pemeliharaan_id` int(11) NOT NULL,
  `pemeliharaan_barang` int(11) NOT NULL,
  `pemeliharaan_nama` varchar(100) NOT NULL,
  `pemeliharaan_status` varchar(100) NOT NULL,
  `pemeliharaan_tanggal` date NOT NULL,
  `pemeliharaan_jumlah` varchar(50) DEFAULT NULL,
  `pemeliharaan_biaya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(255) NOT NULL,
  `suplier_alamat` varchar(255) NOT NULL,
  `suplier_telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
(7, 'Capil BJM', 'Jl. Sultan Adam  No. 18 RT. 28 Banjarmasin 70122', '05113307293'),
(8, 'PT. JAYA SEJAHTERA ', 'JL. RAYA BANJAR INDAH NOMOR 15 D-E, RT.57', '08766373733'),
(13, 'Pemerintah Kota Banjarmasin ', 'Jl. RE Martadinata No.1, Kertak Baru Ilir, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70001', '089678987690'),
(14, 'Dinas Kepemudaan Dan Olah Raga Kota Banjarmasin ', ' Jl. Pramuka, Sungai Lulut, Banjarmasin, Kota Banjarmasin, Kalimantan Selatan 70238', '+6283835436789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', '273748051_1469574126_users-10.png', 'administrator'),
(6, 'Manajemen', 'manajemen', '7839a6a91b6a99d4c29852a0beaa18c8', '936658599_1346712032_1469574162_users-15.png', 'manajemen'),
(9, 'Gudang', 'gudang', 'cbb7449d78314665f9e7c7dd0a18a68a', '203588345_kadina.png', 'gudang'),
(10, 'Randi', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '', 'administrator'),
(11, 'ramlan', 'admin', 'c81e728d9d4c2f636f067f89cc14862c', '', 'administrator'),
(12, 'Ferry', 'didinstudio', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', 'manajemen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`pemeliharaan_id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `bm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `pemeliharaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
