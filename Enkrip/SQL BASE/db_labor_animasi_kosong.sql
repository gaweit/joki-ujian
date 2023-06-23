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


-- Dumping database structure for db_labor_animasi
CREATE DATABASE IF NOT EXISTS `db_labor_animasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_labor_animasi`;

-- Dumping structure for table db_labor_animasi.bidang
CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `bagian_karyawan` varchar(50) NOT NULL,
  `tugas` text NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.informasi
CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(11) NOT NULL AUTO_INCREMENT,
  `isi_informasi` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.kuis
CREATE TABLE IF NOT EXISTS `kuis` (
  `id_kuis` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text,
  `a` text,
  `b` text,
  `c` text,
  `d` text,
  `e` text,
  `jawaban` text,
  `gambar` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_kuis`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.materi
CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `isi_materi` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.pengaturan
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id_pengaturan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `suara` varchar(50) DEFAULT NULL,
  `audio` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.petunjuk
CREATE TABLE IF NOT EXISTS `petunjuk` (
  `id_petunjuk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `isi_petunjuk` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_petunjuk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.praktikum
CREATE TABLE IF NOT EXISTS `praktikum` (
  `id_praktikum` int(11) NOT NULL AUTO_INCREMENT,
  `isi_praktikum` text,
  `foto` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_praktikum`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.tebak_kata
CREATE TABLE IF NOT EXISTS `tebak_kata` (
  `id_tebak_kata` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `soal` text,
  `isian` text,
  `jawaban` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_tebak_kata`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_labor_animasi.user
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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
