-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Agu 2023 pada 10.55
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_laris`
--
CREATE TABLE IF NOT EXISTS `barang_laris` (
`kode_barang` varchar(30)
,`nama_barang` varchar(50)
,`jumlah` bigint(21)
,`satuan` varchar(10)
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `posisi`) VALUES
(4, 'Barang', 2),
(5, 'Master', 1),
(6, 'Transaksi', 3),
(7, 'Laporan', 5),
(8, 'Retur Barang', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_modul` varchar(150) NOT NULL,
  `link_menu` text NOT NULL,
  `posisi` int(11) NOT NULL,
  `icon_menu` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `id_menu`, `nama_modul`, `link_menu`, `posisi`, `icon_menu`) VALUES
(6, 4, 'Kategori Barang', 'med.php?mod=kategori', 1, 'fa fa-folder-open'),
(7, 4, 'Data Barang', 'med.php?mod=barang', 2, 'fa fa-cubes'),
(8, 5, 'Data Pelanggan', 'med.php?mod=pelanggan', 1, 'fa fa-group'),
(9, 5, 'Data Supplier', 'med.php?mod=supplier', 2, 'fa fa-user'),
(10, 6, 'Transaksi Penjualan', 'med.php?mod=penjualan', 1, 'fa fa-shopping-cart'),
(11, 6, 'Data Transaksi Penjualan', 'med.php?mod=penjualan&act=list', 2, 'fa fa-book'),
(12, 6, 'Data Transaksi Pembelian', 'med.php?mod=pembelian', 3, 'fa fa-truck'),
(13, 7, 'Laporan Stok Barang', 'med.php?mod=laporan&act=stokbarang', 1, 'fa fa-line-chart'),
(14, 7, 'Laporan Barang Terlaris', 'med.php?mod=laplaris', 2, 'fa fa-pie-chart'),
(15, 7, 'Laporan Transaksi Pembelian', 'med.php?mod=lappemblian', 3, 'fa fa-print'),
(16, 7, 'Laporan Transaksi Penjualan', 'med.php?mod=lappenjualan', 4, 'fa fa-print'),
(17, 8, 'Retur Penjualan', 'med.php?mod=returpenjualan', 1, 'fa fa-cart-arrow-down'),
(18, 8, 'Retur Pembelian', 'med.php?mod=returpembelian', 2, 'fa fa-cart-arrow-down');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_input` date NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `harga_jual` double(10,2) NOT NULL,
  `kategori_id` char(5) NOT NULL,
  `jml_stok` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `deskripsi`, `tgl_input`, `harga_beli`, `harga_jual`, `kategori_id`, `jml_stok`, `satuan`) VALUES
('AD00001', 'IKAN TENGGIRI', '-', '2016-07-25', 120000.00, 150000.00, 'C002', 50, 'KG'),
('AD00003', 'IKAN KAKAP', '-', '2016-07-28', 130000.00, 150000.00, 'C002', 10, 'KG'),
('AD00004', 'IKAN BAWAL AIR LAUT', '-', '2016-07-28', 55000.00, 150000.00, 'C002', 4, 'KG'),
('AD00005', 'IKAN CAKALANG', '-', '2016-07-28', 145000.00, 150000.00, 'C002', 7, 'KG'),
('AD00006', 'IKAN KAKAP MERAH', '-', '2016-07-28', 100000.00, 360000.00, 'C002', 10, 'KG'),
('AD00007', 'IKAN TUNA', '-', '2016-07-28', 150000.00, 40000.00, 'C002', 7, 'KG'),
('AD00008', 'IKAN TROUT', '-', '2016-07-28', 150000.00, 350000.00, 'C002', 11, 'KG'),
('AD00009', 'IKAN EKOR KUNING', '-', '2016-07-28', 190000.00, 150000.00, 'C001', 5, 'KG'),
('AD00010', 'IKAN BARONANG', '-', '2016-07-28', 125000.00, 375000.00, 'C003', 6, 'KG'),
('AD00011', 'IKAN KERAPU', '-', '2016-07-28', 60000.00, 390000.00, 'C002', 7, 'KG'),
('AD00012', 'IKAN KEMBUNG', '', '2023-08-01', 35000.00, 50000.00, 'C001', 10, 'KG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` int(4) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`no_faktur`, `kode_barang`, `harga_beli`, `qty`, `petugas`, `timestmp`) VALUES
('11111111', 'AD00007', 150000.00, 2, 1, '2023-08-01 13:37:10'),
('123456', 'AD00009', 190000.00, 2, 1, '2023-08-01 13:10:38'),
('3445676954', 'AD00010', 80000.00, 4, 1, '2023-07-27 13:21:44'),
('TR001', 'AD00001', 56000.00, 10, 1, '2016-08-03 22:29:09'),
('TR001', 'AD00006', 132000.00, 10, 1, '2016-08-03 22:29:09'),
('TR002', 'AD00001', 55000.00, 2, 1, '2016-08-03 22:35:02'),
('TR002', 'AD00008', 148000.00, 15, 1, '2016-08-03 22:35:02');

--
-- Trigger `tb_detail_pembelian`
--
DELIMITER //
CREATE TRIGGER `after_insert_tmp_beli` AFTER INSERT ON `tb_detail_pembelian`
 FOR EACH ROW BEGIN
	DELETE FROM tb_detail_pembelian_tmp 
	WHERE kode_barang = NEW.kode_barang 
	AND petugas = NEW.petugas;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pembelian_tmp`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pembelian_tmp` (
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` int(4) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(5,2) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`no_transaksi`, `kode_barang`, `qty`, `harga`, `disc`, `petugas`, `timestmp`) VALUES
('CA01082300001', 'AD00001', 1, 150000.00, 0.00, 1, '2023-08-01 13:02:41'),
('CA01082300001', 'AD00006', 2, 360000.00, 0.00, 1, '2023-08-01 13:02:49'),
('CA01082300002', 'AD00007', 7, 40000.00, 0.00, 1, '2023-08-01 13:31:52'),
('CA03081600001', 'AD00001', 1, 150000.00, 0.00, 1, '2016-08-03 21:07:14'),
('CA03081600002', 'AD00001', 1, 150000.00, 0.00, 1, '2016-08-03 21:13:05'),
('CA03081600002', 'AD00003', 1, 150000.00, 0.00, 1, '2016-08-03 21:13:06'),
('CA03081600002', 'AD00004', 1, 150000.00, 0.00, 1, '2016-08-03 21:13:07'),
('CA03081600002', 'AD00005', 1, 150000.00, 0.00, 1, '2016-08-03 21:13:09'),
('CA27072300001', 'AD00001', 1, 150000.00, 0.00, 1, '2023-07-27 12:39:42');

--
-- Trigger `tb_detail_penjualan`
--
DELIMITER //
CREATE TRIGGER `after_insert_delete_tmp` AFTER INSERT ON `tb_detail_penjualan`
 FOR EACH ROW BEGIN
	DELETE FROM tb_detail_penjualan_tmp 
	WHERE kode_barang = NEW.kode_barang 
	AND petugas = NEW.petugas;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan_tmp`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penjualan_tmp` (
  `kode_barang` varchar(50) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(10,2) NOT NULL,
  `qty` int(4) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_barang`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_barang` (
  `kategori_id` char(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_barang`
--

INSERT INTO `tb_kategori_barang` (`kategori_id`, `nama_kategori`) VALUES
('C001', 'TEMPAT MAKAN'),
('C002', 'PASAR '),
('C003', 'BUDIDAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE IF NOT EXISTS `tb_log` (
`id_log` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `deskripsi`, `timestmp`) VALUES
(26, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600001', '2016-08-03 21:07:25'),
(27, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA03081600002', '2016-08-03 21:13:24'),
(28, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA04081600001', '2016-08-04 13:33:06'),
(29, '<span class=''w3-text-red''>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :CA04081600001', '2016-08-04 13:34:36'),
(30, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA27072300001', '2023-07-27 12:40:05'),
(31, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA01082300001', '2023-08-01 13:03:19'),
(32, '<span class=''w3-text-green''>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>CA01082300002', '2023-08-01 13:32:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `nomor_telp`, `alamat`) VALUES
('P0001', 'ADE INDRA SAPUTRA', '085227281672', 'JL. TP. SRIWIJAYA PERUM. VILLA MELATI ASRI NO. 42'),
('P0002', 'JAYA MOTOR', '', 'SIMPANG TELKOM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `petugas` int(11) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no_faktur`, `kode_supplier`, `nama_toko`, `tgl_beli`, `nama_kasir`, `petugas`, `timestmp`) VALUES
('11111111', '', '', '2023-08-01', 'INDAH', 1, '2023-08-01 13:37:10'),
('123456', '', '', '2023-08-01', 'INDAH', 1, '2023-08-01 13:10:38'),
('3445676954', '', '', '2023-07-27', 'indah', 1, '2023-07-27 13:21:44'),
('TR001', 'S0001', 'ELEVEN', '2016-08-03', 'BUJANG', 1, '2016-08-03 22:29:09'),
('TR002', 'S0002', 'TIGER ONE', '2016-08-03', 'MAT LENO', 1, '2016-08-03 22:35:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE IF NOT EXISTS `tb_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `petugas` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bayar` double(10,2) NOT NULL,
  `potongan` double(10,2) NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`no_transaksi`, `kode_pelanggan`, `nama_pelanggan`, `tgl_transaksi`, `petugas`, `status`, `bayar`, `potongan`, `timestmp`) VALUES
('CA01082300001', '', 'ROBI', '2023-08-01', 1, 'LUNAS', 1000000.00, 0.00, '2023-08-01 13:03:19'),
('CA01082300002', '', 'RIDO', '2023-08-01', 1, 'LUNAS', 300000.00, 0.00, '2023-08-01 13:32:44'),
('CA03081600001', 'P0001', 'ADE INDRA SAPUTRA', '2016-08-03', 1, 'LUNAS', 150000.00, 20000.00, '2016-08-03 21:07:25'),
('CA03081600002', 'P0002', 'JAYA MOTOR', '2016-08-03', 1, 'LUNAS', 600000.00, 0.00, '2016-08-03 21:13:24'),
('CA27072300001', '', 'SITI ', '2023-07-27', 1, 'LUNAS', 200000.00, 0.00, '2023-07-27 12:40:05');

--
-- Trigger `tb_penjualan`
--
DELIMITER //
CREATE TRIGGER `after_delete_penjualan` AFTER DELETE ON `tb_penjualan`
 FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-red'>Transaksi penjualan telah di hapus dengan nomor transaksi</span> :", OLD.no_transaksi), NOW());
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `after_insert_penjualan` AFTER INSERT ON `tb_penjualan`
 FOR EACH ROW BEGIN
	INSERT INTO tb_log(deskripsi, timestmp) 
	VALUES(CONCAT("<span class='w3-text-green'>Berhasil melakukan transaksi penjualan dengan nomor transaksi : </span>", NEW.no_transaksi), NOW());
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_retur_pembelian` (
  `no_faktur` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `harga_beli` double(10,2) NOT NULL,
  `qty` int(4) NOT NULL,
  `petugas` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `tb_retur_penjualan` (
  `no_transaksi` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` double(10,2) NOT NULL,
  `disc` double(5,2) NOT NULL,
  `petugas` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `timestmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_barang`
--

CREATE TABLE IF NOT EXISTS `tb_satuan_barang` (
`id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan_barang`
--

INSERT INTO `tb_satuan_barang` (`id_satuan`, `nama_satuan`) VALUES
(18, 'PCS'),
(19, 'UNIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `kode_supplier` varchar(10) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama_toko`, `alamat`, `telepon`, `email`) VALUES
('S0001', 'ELEVEN', 'CILACAP', '589746', '-'),
('S0002', 'IKAN BAKAR SETIA', 'JAMBI', '543798', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `usernm` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `akses_master` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `usernm`, `passwd`, `level`, `last_login`, `akses_master`) VALUES
(1, 'ADMINISTRATOR', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-08-01 12:58:18', ''),
(2, 'CACA', 'caca', 'd2104a400c7f629a197f33bb33fe80c0', 'user', '2016-08-02 12:46:58', 'pelanggan, supplier'),
(3, 'AGUS', 'agus', 'fdf169558242ee051cca1479770ebac3', 'admin', '2016-07-31 15:57:33', '');

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_laris`
--
DROP TABLE IF EXISTS `barang_laris`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_laris` AS select `a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,count(`a`.`kode_barang`) AS `jumlah`,`a`.`satuan` AS `satuan` from (`tb_barang` `a` join `tb_detail_penjualan` `b`) where (`a`.`kode_barang` = `b`.`kode_barang`) group by `a`.`kode_barang`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`kode_barang`), ADD KEY `FK_tb_produk_tb_kategori_produk` (`kategori_id`);

--
-- Indexes for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
 ADD PRIMARY KEY (`no_faktur`,`kode_barang`), ADD KEY `FK_tb_detailbeli_tb_produk` (`kode_barang`);

--
-- Indexes for table `tb_detail_pembelian_tmp`
--
ALTER TABLE `tb_detail_pembelian_tmp`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
 ADD PRIMARY KEY (`no_transaksi`,`kode_barang`), ADD KEY `FK_tb_detailproduk_tb_produk` (`kode_barang`);

--
-- Indexes for table `tb_detail_penjualan_tmp`
--
ALTER TABLE `tb_detail_penjualan_tmp`
 ADD PRIMARY KEY (`petugas`,`kode_barang`);

--
-- Indexes for table `tb_kategori_barang`
--
ALTER TABLE `tb_kategori_barang`
 ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
 ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
 ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
 ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `tb_retur_pembelian`
--
ALTER TABLE `tb_retur_pembelian`
 ADD PRIMARY KEY (`no_faktur`,`kode_barang`), ADD KEY `FK_tb_detailbeli_tb_produk` (`kode_barang`);

--
-- Indexes for table `tb_retur_penjualan`
--
ALTER TABLE `tb_retur_penjualan`
 ADD PRIMARY KEY (`kode_barang`,`no_transaksi`);

--
-- Indexes for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
 ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
 ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
ADD CONSTRAINT `FK_tb_produk_tb_kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori_barang` (`kategori_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
ADD CONSTRAINT `FK_tb_detail_pembelian_tb_barang` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`),
ADD CONSTRAINT `FK_tb_detail_pembelian_tb_pembelian` FOREIGN KEY (`no_faktur`) REFERENCES `tb_pembelian` (`no_faktur`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
ADD CONSTRAINT `FK_tb_detail_penjualan_tb_barang` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`),
ADD CONSTRAINT `FK_tb_detailproduk_tb_pembayaran` FOREIGN KEY (`no_transaksi`) REFERENCES `tb_penjualan` (`no_transaksi`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
