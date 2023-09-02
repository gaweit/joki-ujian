-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_penjualan_barang.tb_barang
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  PRIMARY KEY (`kode_barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_penjualan_barang.tb_barang: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `harga_beli`, `stok`, `harga_jual`, `profit`) VALUES
	('123', 'CINOS BLACK', 'PACK', 200000, 20, 300000, 100000);
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;

-- Dumping structure for table db_penjualan_barang.tb_pembelian
CREATE TABLE IF NOT EXISTS `tb_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nofaktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table db_penjualan_barang.tb_pembelian: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_pembelian` DISABLE KEYS */;
INSERT INTO `tb_pembelian` (`id`, `nofaktur`, `tanggal`, `nama_supplier`, `kode_barcode`, `stok`) VALUES
	(18, 'tete', '2023-09-02', 'PT. Indonesia', '123', 10);
/*!40000 ALTER TABLE `tb_pembelian` ENABLE KEYS */;

-- Dumping structure for table db_penjualan_barang.tb_supplier
CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(20) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_penjualan_barang.tb_supplier: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_supplier` DISABLE KEYS */;
INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
	(1, 'PT. Cemilan Sentosa', '-', 'Bandung');
INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
	(2, 'PT.Bahagia Selalu', '-', 'padang');
INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
	(3, 'PT. Jaya Sentosa', '-', 'padang barat');
INSERT INTO `tb_supplier` (`id`, `nama_supplier`, `tlp`, `alamat`) VALUES
	(4, 'PT. Indonesia', '-', 'padang');
/*!40000 ALTER TABLE `tb_supplier` ENABLE KEYS */;

-- Dumping structure for table db_penjualan_barang.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_penjualan_barang.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
	(1, 'ralitayustiana@gmail.com', 'ralitayustiana', '123456', 'kasir');
INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
	(2, 'lutri', 'lutri', '123456', 'kasir');
INSERT INTO `user` (`id`, `username`, `name`, `password`, `level`) VALUES
	(3, 'admin', 'admin', '123456', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
