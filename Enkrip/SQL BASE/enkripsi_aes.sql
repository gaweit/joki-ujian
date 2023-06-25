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


-- Dumping database structure for enkripsi_aes
CREATE DATABASE IF NOT EXISTS `enkripsi_aes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `enkripsi_aes`;

-- Dumping structure for table enkripsi_aes.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_dokumen` text,
  `nama_enkrip` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table enkripsi_aes.dokumen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(1, 0, 'sadasdasd', 'asdasd', '2023-06-16');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(2, 2, 'asdasdasdasd', 'asdasdasd', '2023-06-16');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(3, 1, 'KP.PNG', 'PAKET TOKO ONLINE.png', '1212-12-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(4, 1, 'PAKET WEB DINAMIS.jpg', 'PAKET WEB DINAMIS.jpg', '2023-06-22');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(5, 1, NULL, 'PAKET WEB STATIS.jpg', '1321-03-21');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(6, 1, NULL, 'PAKET WEB DINAMIS.jpg', '1122-12-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(7, 1, 'PAKET WEB DINAMIS.jpg', 'PAKET WEB STATIS.jpg', '1233-03-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(8, 1, 'karyawan_1687699359.png', 'karyawan_16876993591.png', '2133-03-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(9, 1, '7c4a8d09ca3762af61e59520943dc26494f8941b_1687699400.png', '7c4a8d09ca3762af61e59520943dc26494f8941b_16876994001.png', '4333-02-23');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(10, 1, 'PAKET WEB DINAMIS.jpg', 'PAKET WEB DINAMIS.jpg', '1233-03-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(11, 1, 'PAKET WEB DINAMIS.jpg', 'PAKET WEB DINAMIS.jpg', '1233-03-12');
INSERT INTO `dokumen` (`id_dokumen`, `id_user`, `nama_dokumen`, `nama_enkrip`, `tgl`) VALUES
	(12, 1, '7c4a8d09ca3762af61e59520943dc26494f8941b_1687699466.png', '7c4a8d09ca3762af61e59520943dc26494f8941b_16876994661.PNG', '1233-03-12');
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table enkripsi_aes.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(66) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table enkripsi_aes.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`, `aktif`) VALUES
	(1, 'Arif Lukman', 'arif@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'karyawan_1593124267.jpg', 'admin', '2023-06-25 20:13:26', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
