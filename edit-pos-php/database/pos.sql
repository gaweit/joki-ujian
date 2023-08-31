-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang2`
--

CREATE TABLE `tb_barang2` (
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang2`
--

INSERT INTO `tb_barang2` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `stok`, `harga_jual`, `profit`) VALUES
('1234567891', '        Buku', 'Lusin', 2000, 11, 3000, 1000),
('1234567892', 'Pensil', 'Lusin', 12000, 147, 14000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer2`
--

CREATE TABLE `tb_customer2` (
  `id_customer` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer2`
--

INSERT INTO `tb_customer2` (`id_customer`, `nama`, `alamat`, `telpon`, `email`) VALUES
('P001', 'Umum', '', '', ''),
('P002', 'parman', 'Blora', '085781480396', 'parmanp79@gmail.com'),
('P003', 'rudi', 'Blora jaya', '085781480396', 'carmandblora@yahoo.com'),
('P004', 'admin', 'Blora jaya', '085781480396', 'carmandblora@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian2`
--

CREATE TABLE `tb_pembelian2` (
  `id` int(9) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian2`
--

INSERT INTO `tb_pembelian2` (`id`, `kode_pembelian`, `kode_barang`, `jumlah`, `harga`, `total`, `tanggal`) VALUES
(1, 'PB-303233', '8997023620679', 5, 20000, 100000, '2018-03-26'),
(2, 'PB-20932207', '8997023620679', 5, 20000, 100000, '2018-03-26'),
(3, 'PB-2035230', '8997023620679', 3, 20000, 60000, '2018-03-26'),
(4, 'PB-323432', '8997023620679', 1, 20000, 20000, '2018-03-26'),
(5, 'PB-323900', '8886008101091', 2, 0, 0, '2019-05-04'),
(6, 'PB-4253403', '8886008101091', 2, 0, 0, '2019-05-04'),
(7, 'PB-52924422', '8997023620679', 2, 0, 0, '2019-05-04'),
(8, 'PB-98322323', '1234567891', 2, 2000, 4000, '2019-05-04'),
(9, 'PB-7833537', '1234567891', 2, 2000, 4000, '2019-05-04'),
(10, 'RT-3720290', '1234567891', 2, 2000, 4000, '2019-05-04'),
(11, 'PB-93223202', '   1234567891', 5, 2000, 10000, '2020-04-14'),
(12, 'PB-726039', '      1234567891', 5, 2000, 10000, '2020-04-14');

--
-- Triggers `tb_pembelian2`
--
DELIMITER $$
CREATE TRIGGER `beli_barang` AFTER INSERT ON `tb_pembelian2` FOR EACH ROW BEGIN
 INSERT INTO tb_barang2 SET
 kode_barang = NEW.kode_barang, stok=New.jumlah
 ON DUPLICATE KEY UPDATE stok=stok+New.jumlah;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan2`
--

CREATE TABLE `tb_penjualan2` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `kasir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan2`
--

INSERT INTO `tb_penjualan2` (`id`, `kode_penjualan`, `kode_barang`, `jumlah`, `total`, `tanggal_penjualan`, `id_customer`, `kasir`) VALUES
(161, 'PJ-3034322', '1234567891', 1, 3000, '2020-04-15', 'P003', 'Parman'),
(162, 'PJ-3034322', '1234567892', 1, 14000, '2020-04-15', 'P003', 'Parman'),
(163, 'PJ-22897233', '1234567891', 2, 6000, '2020-04-15', 'P003', 'Parman'),
(164, 'PJ-22897233', '1234567892', 3, 42000, '2020-04-15', 'P003', 'Parman');

--
-- Triggers `tb_penjualan2`
--
DELIMITER $$
CREATE TRIGGER `jual_barang` AFTER INSERT ON `tb_penjualan2` FOR EACH ROW BEGIN
 UPDATE tb_barang2
 SET stok= stok- NEW.jumlah
 WHERE
 kode_barang = NEW.kode_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_tmp2`
--

CREATE TABLE `tb_penjualan_tmp2` (
  `id_tmp` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan_tmp2`
--

INSERT INTO `tb_penjualan_tmp2` (`id_tmp`, `kode_penjualan`, `bayar`, `kembali`) VALUES
(38, 'PJ-3034322', 20000, 3000),
(39, 'PJ-22897233', 50000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_retur`
--

CREATE TABLE `tb_retur` (
  `id` int(11) NOT NULL,
  `kode_retur` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_retur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_retur`
--

INSERT INTO `tb_retur` (`id`, `kode_retur`, `kode_barang`, `jumlah`, `harga`, `total`, `tgl_retur`) VALUES
(13, 'RT-5323233', '1234567891', 1, 2000, 2000, '2019-05-04'),
(14, 'RT-233073', '1234567891', 1, 2000, 2000, '2019-05-04'),
(15, 'RT-6263020', '1234567891', 2, 2000, 4000, '2019-05-04'),
(16, 'RT-334803', '1234567891', 2, 2000, 4000, '2019-05-04');

--
-- Triggers `tb_retur`
--
DELIMITER $$
CREATE TRIGGER `retur` AFTER INSERT ON `tb_retur` FOR EACH ROW BEGIN
 UPDATE tb_barang2
 SET stok= stok- NEW.jumlah
 WHERE
 kode_barang = NEW.kode_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `nama`, `email`, `pass`, `level`, `status`, `foto`) VALUES
(1, 'admin', 'Parman', 'parmanp79@gmail.com', 'admin', 'admin', 'Aktif', 'parman1.jpg'),
(2, 'kasir', 'Indah Nila Sari', 'indah@gmail.com', 'kasirbaru', 'kasir', 'Aktif', 'user.png'),
(4, 'kasir', 'Agus', 'agus@gmail.com', 'kasir', 'kasir', 'Aktif', 'parman.jpg'),
(5, 'kasir', 'Bejo Santoso', 'bejo@gmail.com', 'kasir', '12345', 'Blokir', 'oke.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang2`
--
ALTER TABLE `tb_barang2`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_customer2`
--
ALTER TABLE `tb_customer2`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_pembelian2`
--
ALTER TABLE `tb_pembelian2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan2`
--
ALTER TABLE `tb_penjualan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan_tmp2`
--
ALTER TABLE `tb_penjualan_tmp2`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `tb_retur`
--
ALTER TABLE `tb_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pembelian2`
--
ALTER TABLE `tb_pembelian2`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penjualan2`
--
ALTER TABLE `tb_penjualan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tb_penjualan_tmp2`
--
ALTER TABLE `tb_penjualan_tmp2`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_retur`
--
ALTER TABLE `tb_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
