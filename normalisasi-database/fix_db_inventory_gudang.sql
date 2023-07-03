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


-- Dumping database structure for joki_normalisasi_inventory
CREATE DATABASE IF NOT EXISTS `joki_normalisasi_inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `joki_normalisasi_inventory`;

-- Dumping structure for table joki_normalisasi_inventory.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barang_nama` varchar(255) NOT NULL,
  `barang_spesifikasi` varchar(255) DEFAULT NULL,
  `barang_lokasi` varchar(255) DEFAULT NULL,
  `barang_kondisi` varchar(255) DEFAULT NULL,
  `barang_jumlah` int(11) NOT NULL,
  `barang_sumber_dana` varchar(255) DEFAULT NULL,
  `barang_keterangan` text,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table joki_normalisasi_inventory.barang: ~19 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(17, 'Tinta Printer ', 'Hitam 664', 'Lantai 2', 'Baru', 1, 'Capil BJM', 'Tes Edit');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(18, 'Tinta Printer ', '003', 'Lantai 2', 'Baru', 7, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(19, 'Kertas HVS ', 'A4', 'Lantai 2', 'Baru', 2, 'Capil BJM', 'Tes Data');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(20, 'Printer ', 'Epson l3110', 'Lantai 1', 'Second', 17, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(21, 'Pulpen', 'Snowman', 'Gudang 1', 'Baru', 3, 'Capil BJM', 'Return');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(22, 'Tinta Printer ', 'Hitam 664', 'Lantai 2', 'Habis Pakai', 0, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(23, 'Pulpen ', 'Pilot', 'Lantai 2', 'Baru', 20, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(25, 'Kertas HVS ', 'A4', 'Gudang 1', 'Baru', 8, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(27, 'Tinta Printer ', '003', 'Gudang 2', 'Habis Pakai', 0, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(28, 'Tinta Printer ', '664', 'Gudang 2', 'Habis Pakai', 2, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(29, 'Kursi lipat  ', 'IKEA Frode', 'Gudang 1', 'Baru', 14, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(30, 'Kursi lipat  ', 'Chitose & Futura', 'Gudang 2', 'Second', 14, 'Capil BJM', 'Baru Ditambahkan');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(31, 'Pulpen ', 'Parker Vector 2', 'Lantai 1', 'Baru', 5, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(32, 'Printer ', 'Epson l3110', 'Lantai 2', 'Baru', 5, 'HIBAH', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(35, 'Aqua ', 'Minuman', 'Lantai 2', 'Baru', 12, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(36, 'Pulpen ', 'Snowman v3', 'Gudang 1', 'Baru', 12, 'Dinas Hubungan', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(38, 'Tinta Printer ', 'Hitam 664', 'Gudang 2', 'Second', 3, 'Capil BJM', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(39, 'Kertas HVS ', '003', 'Gudang 1', 'Habis Pakai', 34, 'Dinas Hubungan', '');
INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_spesifikasi`, `barang_lokasi`, `barang_kondisi`, `barang_jumlah`, `barang_sumber_dana`, `barang_keterangan`) VALUES
	(40, 'Tinta Printer ', 'Hitam 664', 'Gudang 1', 'Baru', 2, 'Pemerintah Daerah', 'Baru Ditambahkan2');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.barang_keluar
CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `bk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bk_id_barang` int(11) unsigned NOT NULL,
  `bk_nama_barang` varchar(255) NOT NULL,
  `bk_spesifikasi_barang` varchar(255) NOT NULL,
  `bk_tahun_pengadaan` year(4) NOT NULL,
  `bk_tgl_keluar` date NOT NULL,
  `bk_jumlah_keluar` int(11) NOT NULL,
  `bk_lokasi` varchar(255) NOT NULL,
  `bk_penerima` varchar(255) NOT NULL,
  `bk_divisi` varchar(255) NOT NULL,
  `bk_nip` char(25) NOT NULL DEFAULT '',
  `bk_keterangan` text,
  PRIMARY KEY (`bk_id`),
  KEY `FK_barang_keluar_barang` (`bk_id_barang`),
  CONSTRAINT `FK_barang_keluar_barang` FOREIGN KEY (`bk_id_barang`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table joki_normalisasi_inventory.barang_keluar: ~16 rows (approximately)
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(8, 17, 'Tinta Printer ', 'Hitam 664', '2023', '2023-04-21', 2, 'Lantai 2', 'Ramlan', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(9, 23, 'Pulpen ', 'Pilot', '2022', '2023-04-22', 5, 'Lantai 2', 'Ferry', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(10, 27, 'Tinta Printer ', '003', '2023', '2023-04-27', 5, 'Gudang 2', 'ahmad Rivadi', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(11, 17, 'Tinta Printer ', 'Hitam 664', '2023', '2023-04-26', 7, 'Lantai 2', 'ahmad', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(12, 21, 'Pulpen', 'Snowman', '2023', '2023-04-25', 10, 'Gudang 1', 'Sofyan', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(13, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-26', 2, 'Lantai 1', 'Rivaldi', '', '', 'Printer Rusak');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(14, 30, 'Kursi lipat  ', 'Chitose & Futura', '2023', '2023-04-29', 10, 'Gudang 2', 'ahmad', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(15, 18, 'Tinta Printer ', '003', '2023', '2023-04-12', 5, 'Lantai 2', 'Nobita', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(16, 31, 'Pulpen ', 'Parker Vector 2', '2020', '2023-04-12', 3, 'Lantai 1', 'Sizuka', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(17, 30, 'Kursi lipat  ', 'Chitose & Futura', '2023', '2023-04-30', 7, 'Gudang 2', 'Syaifuddin', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(18, 27, 'Tinta Printer ', '003', '2022', '2023-04-27', 5, 'Gudang 2', 'Aldi Kurniawan', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(19, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-29', 4, 'Lantai 1', 'Ahmad Riduan', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(20, 21, 'Pulpen', 'Snowman', '2023', '2023-04-28', 2, 'Gudang 1', 'Saskeh ', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(22, 25, 'Kertas HVS ', 'A4', '2020', '2023-04-12', 1, 'Gudang 1', 'Sofyan', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(24, 31, 'Pulpen ', 'Parker Vector 2', '2022', '2023-04-13', 2, 'Lantai 1', 'ahmad Rivadi', '', '', '');
INSERT INTO `barang_keluar` (`bk_id`, `bk_id_barang`, `bk_nama_barang`, `bk_spesifikasi_barang`, `bk_tahun_pengadaan`, `bk_tgl_keluar`, `bk_jumlah_keluar`, `bk_lokasi`, `bk_penerima`, `bk_divisi`, `bk_nip`, `bk_keterangan`) VALUES
	(28, 19, 'Kertas HVS ', 'A4', '2023', '2023-04-30', 12, 'Lantai 2', 'Aldi Kurniawan', '', '', '');
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.barang_masuk
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `bm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bm_id_barang` int(11) unsigned NOT NULL,
  `bm_nama_barang` varchar(255) NOT NULL,
  `bm_spesifikasi_barang` varchar(255) NOT NULL,
  `bm_tahun_pengadaan` year(4) NOT NULL,
  `bm_tgl_masuk` date NOT NULL,
  `bm_jumlah` int(11) NOT NULL,
  `bm_id_suplier` int(11) NOT NULL,
  `bm_nama_suplier` varchar(255) NOT NULL,
  PRIMARY KEY (`bm_id`),
  KEY `FK_barang_masuk_barang` (`bm_id_barang`),
  CONSTRAINT `FK_barang_masuk_barang` FOREIGN KEY (`bm_id_barang`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Dumping data for table joki_normalisasi_inventory.barang_masuk: ~15 rows (approximately)
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(19, 25, 'Kertas HVS ', 'A4', '2023', '2023-04-27', 10, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(20, 17, 'Tinta Printer ', 'Hitam 664', '2023', '2023-04-26', 10, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(21, 23, 'Pulpen ', 'Pilot', '2022', '2023-04-27', 10, 13, 'Pemerintah Kota Banjarmasin ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(22, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-20', 5, 8, 'PT. JAYA SEJAHTERA ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(23, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-29', 6, 13, 'Pemerintah Kota Banjarmasin ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(24, 27, 'Tinta Printer ', '003', '2022', '2023-04-20', 10, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(26, 20, 'Printer ', 'Epson l3110', '2022', '2023-04-13', 5, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(27, 21, 'Pulpen', 'Snowman', '2023', '2023-04-21', 15, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(28, 23, 'Pulpen ', 'Pilot', '2021', '2023-04-27', 15, 13, 'Pemerintah Kota Banjarmasin ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(29, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-28', 2, 13, 'Pemerintah Kota Banjarmasin ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(30, 18, 'Tinta Printer ', '003', '2023', '2023-04-28', 12, 13, 'Pemerintah Kota Banjarmasin ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(31, 30, 'Kursi lipat  ', 'Chitose & Futura', '2022', '2023-04-29', 2, 8, 'PT. JAYA SEJAHTERA ');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(32, 20, 'Printer ', 'Epson l3110', '2023', '2023-04-28', 5, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(37, 35, 'Aqua ', 'Minuman', '2020', '2023-06-22', 2, 7, 'Capil BJM');
INSERT INTO `barang_masuk` (`bm_id`, `bm_id_barang`, `bm_nama_barang`, `bm_spesifikasi_barang`, `bm_tahun_pengadaan`, `bm_tgl_masuk`, `bm_jumlah`, `bm_id_suplier`, `bm_nama_suplier`) VALUES
	(38, 28, 'Tinta Printer ', '664', '2023', '2023-06-27', 2, 13, 'Pemerintah Kota Banjarmasin ');
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pegawai_nip` char(25) NOT NULL DEFAULT '',
  `pegawai_nama` varchar(100) NOT NULL,
  `pegawai_lahir` date NOT NULL,
  `pegawai_alamat` varchar(100) NOT NULL,
  `pegawai_telepon` varchar(100) NOT NULL,
  `pegawai_jabatan` varchar(100) NOT NULL,
  `pegawai_golongan` varchar(100) NOT NULL,
  `pegawai_pendidikan` varchar(100) NOT NULL,
  `pegawai_jenis` varchar(100) NOT NULL,
  `pegawai_foto` longtext NOT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table joki_normalisasi_inventory.pegawai: ~3 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_lahir`, `pegawai_alamat`, `pegawai_telepon`, `pegawai_jabatan`, `pegawai_golongan`, `pegawai_pendidikan`, `pegawai_jenis`, `pegawai_foto`) VALUES
	(1, '737363', 'Tinta Printer', '2023-05-12', 'rerrrrrrrrrrr', '+12038337739988', 'Sekretaris', 'I/c', 'SMA', 'PNS', '');
INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_lahir`, `pegawai_alamat`, `pegawai_telepon`, `pegawai_jabatan`, `pegawai_golongan`, `pegawai_pendidikan`, `pegawai_jenis`, `pegawai_foto`) VALUES
	(2, '21', 'Necessitatibus in te', '2023-05-05', 'Hic quis amet quo r', '80', 'Duis officia autem u', 'Et qui in doloremque', 'Eius aspernatur et n', 'Veniam corporis vel', '');
INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_lahir`, `pegawai_alamat`, `pegawai_telepon`, `pegawai_jabatan`, `pegawai_golongan`, `pegawai_pendidikan`, `pegawai_jenis`, `pegawai_foto`) VALUES
	(5, '49', 'Corporis culpa et fu', '2023-06-23', 'Soluta at pariatur ', '36', 'Excepturi velit dolo', 'Accusamus cumque qua', 'Obcaecati error est ', 'Esse inventore et v', '1167708016_2-2.png');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.pemeliharaan
CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `pemeliharaan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pemeliharaan_barang` int(11) unsigned NOT NULL,
  `pemeliharaan_nama` varchar(100) NOT NULL,
  `pemeliharaan_status` varchar(100) NOT NULL,
  `pemeliharaan_tanggal` date NOT NULL,
  `pemeliharaan_jumlah` varchar(50) DEFAULT NULL,
  `pemeliharaan_biaya` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pemeliharaan_id`),
  KEY `FK_pemeliharaan_barang` (`pemeliharaan_barang`),
  CONSTRAINT `FK_pemeliharaan_barang` FOREIGN KEY (`pemeliharaan_barang`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table joki_normalisasi_inventory.pemeliharaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemeliharaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemeliharaan` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.suplier
CREATE TABLE IF NOT EXISTS `suplier` (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_nama` varchar(255) NOT NULL,
  `suplier_alamat` varchar(255) NOT NULL,
  `suplier_telepon` varchar(255) NOT NULL,
  PRIMARY KEY (`suplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table joki_normalisasi_inventory.suplier: ~4 rows (approximately)
/*!40000 ALTER TABLE `suplier` DISABLE KEYS */;
INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
	(7, 'Capil BJM', 'Jl. Sultan Adam  No. 18 RT. 28 Banjarmasin 70122', '05113307293');
INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
	(8, 'PT. JAYA SEJAHTERA ', 'JL. RAYA BANJAR INDAH NOMOR 15 D-E, RT.57', '08766373733');
INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
	(13, 'Pemerintah Kota Banjarmasin ', 'Jl. RE Martadinata No.1, Kertak Baru Ilir, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70001', '089678987690');
INSERT INTO `suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_telepon`) VALUES
	(14, 'Dinas Kepemudaan Dan Olah Raga Kota Banjarmasin ', ' Jl. Pramuka, Sungai Lulut, Banjarmasin, Kota Banjarmasin, Kalimantan Selatan 70238', '+6283835436789');
/*!40000 ALTER TABLE `suplier` ENABLE KEYS */;

-- Dumping structure for table joki_normalisasi_inventory.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table joki_normalisasi_inventory.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', '273748051_1469574126_users-10.png', 'administrator');
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(6, 'Manajemen', 'manajemen', '7839a6a91b6a99d4c29852a0beaa18c8', '936658599_1346712032_1469574162_users-15.png', 'manajemen');
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(9, 'Gudang', 'gudang', 'cbb7449d78314665f9e7c7dd0a18a68a', '203588345_kadina.png', 'gudang');
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(10, 'Randi', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '', 'administrator');
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(11, 'ramlan', 'admin', 'c81e728d9d4c2f636f067f89cc14862c', '', 'administrator');
INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
	(12, 'Ferry', 'didinstudio', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', 'manajemen');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
