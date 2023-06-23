-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk db_labor_animasi
CREATE DATABASE IF NOT EXISTS `db_labor_animasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_labor_animasi`;

-- membuang struktur untuk table db_labor_animasi.bidang
CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `bagian_karyawan` varchar(50) NOT NULL,
  `tugas` text NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.bidang: 4 rows
/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
INSERT INTO `bidang` (`id_bidang`, `bagian_karyawan`, `tugas`) VALUES
	(1, 'Programmer', 'Membuat program berbasis android dan web'),
	(2, 'Blogger', 'Menulis artikel teknologi setiap hari'),
	(3, 'Admin', 'Admin Aplikasi'),
	(4, 'Blogger', 'e123123');
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.informasi
CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(11) NOT NULL AUTO_INCREMENT,
  `isi_informasi` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.informasi: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `informasi` DISABLE KEYS */;
INSERT INTO `informasi` (`id_informasi`, `isi_informasi`, `tgl`) VALUES
	(1, 'isi', '2023-06-19'),
	(2, 'isian aja ubah', '2023-06-19');
/*!40000 ALTER TABLE `informasi` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.kuis
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.kuis: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `kuis` DISABLE KEYS */;
INSERT INTO `kuis` (`id_kuis`, `soal`, `a`, `b`, `c`, `d`, `e`, `jawaban`, `gambar`, `tgl`) VALUES
	(1, 'sebutkan ', 'jghf', 'jhtf', 'hfh', 'fg', 'ya', 'ya', 'kuis_1687106417.jpg', '2023-06-18'),
	(2, 'soal ke 2', 'jghf', 'jhtf', 'hfh', 'gf', 'gfhg', 'fg', 'kuis_1687106417.jpg', '2023-06-18');
/*!40000 ALTER TABLE `kuis` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.materi
CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `isi_materi` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.materi: ~21 rows (lebih kurang)
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
INSERT INTO `materi` (`id_materi`, `isi_materi`, `tgl`) VALUES
	(1, 'asdasdasdad', '2023-06-16'),
	(2, '2', '2023-06-16'),
	(3, 'Cardinal', '2023-06-16'),
	(4, 'Cardinal', '2023-06-16'),
	(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(11, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(12, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(14, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(16, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(17, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(18, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(19, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-16'),
	(26, 'tfytfyfuyfytff\r\nhgfytfygu\r\n\r\ngfytfyt\r\nugtgyguyg\r\n1.', '2023-06-21');
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.pengaturan
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id_pengaturan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `suara` varchar(50) DEFAULT NULL,
  `audio` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.pengaturan: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` (`id_pengaturan`, `suara`, `audio`, `tgl`) VALUES
	(6, 'suara_1687184625.mp3', 'suara_16871846251.mp3', '2023-06-19');
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.petunjuk
CREATE TABLE IF NOT EXISTS `petunjuk` (
  `id_petunjuk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `isi_petunjuk` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_petunjuk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.petunjuk: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `petunjuk` DISABLE KEYS */;
INSERT INTO `petunjuk` (`id_petunjuk`, `isi_petunjuk`, `tgl`) VALUES
	(1, 'petunjuk', '2023-06-19'),
	(2, '13123123123wqdwqeqweqwe', '2023-06-19');
/*!40000 ALTER TABLE `petunjuk` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.praktikum
CREATE TABLE IF NOT EXISTS `praktikum` (
  `id_praktikum` int(11) NOT NULL AUTO_INCREMENT,
  `isi_praktikum` text,
  `foto` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_praktikum`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.praktikum: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `praktikum` DISABLE KEYS */;
INSERT INTO `praktikum` (`id_praktikum`, `isi_praktikum`, `foto`, `tgl`) VALUES
	(1, 'Praktik 1', 'praktikum_1687100026.jpg', '2023-06-18'),
	(32, 'Tasyy', 'praktikum_1687100026.jpg', '2023-06-18');
/*!40000 ALTER TABLE `praktikum` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.tebak_kata
CREATE TABLE IF NOT EXISTS `tebak_kata` (
  `id_tebak_kata` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `soal` text,
  `isian` text,
  `jawaban` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_tebak_kata`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.tebak_kata: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tebak_kata` DISABLE KEYS */;
INSERT INTO `tebak_kata` (`id_tebak_kata`, `soal`, `isian`, `jawaban`, `tgl`) VALUES
	(2, 'sebutkan nama hewan awalan k dan ujung g', 'isian', 'kucing', '2023-06-18'),
	(3, 'sebutkan nama bunga awalan k dan ujung g', 'isian', 'kumbang', '2023-06-18');
/*!40000 ALTER TABLE `tebak_kata` ENABLE KEYS */;

-- membuang struktur untuk table db_labor_animasi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(66) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `nyawa` varchar(1) NOT NULL,
  `point` varchar(3) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel db_labor_animasi.user: 7 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `nyawa`, `point`, `foto`, `keterangan`, `tanggal`, `aktif`) VALUES
	(22, 'Arif Lukman', 'arif@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '', '', 'karyawan_1593124267.jpg', 'admin', '2023-06-22 02:30:27', 0),
	(40, 'Muhammad Lukman Sarip', 'peserta@peserta.peserta', 'peserta', 'ee2b554af530f2962f1e9ad8e1ca20c59f4b8108', 'Peserta', '', '', NULL, NULL, '2022-12-22 20:46:37', 0),
	(47, 'Arif Lukman', 'asd@gmail.com', 'arifasd', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '', '', NULL, 'asd', '2023-01-18 23:07:10', 0),
	(48, 'asdadas', 'dea@dea.dea', 'asdasdasdas', '4150953a511f9f6d74e17d5ac22e8be54e9fab56', 'Admin', '', '', NULL, 'asdasd', '2023-06-12 20:01:48', 0),
	(49, 'dsadsdasd', 'arieflukman557@gmail.com', 'adeade', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '', '', NULL, 'asd', '2023-06-12 20:19:27', 0),
	(51, 'siswa contoh', 'siswa@gmail.com', 'siswa', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'siswa', '5', '10', NULL, NULL, '2023-06-22 22:12:07', 0),
	(52, 'aji firlana', 'firlana89@gmail.com', 'aji firlana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'siswa', '2', '10', NULL, 'OK', '2023-06-22 02:35:45', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
