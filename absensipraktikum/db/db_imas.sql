-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 01:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_imas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'Muhammad Althaf D', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Y', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asisten`
--

CREATE TABLE `tb_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama_asisten` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_asisten`
--

INSERT INTO `tb_asisten` (`id_asisten`, `nim`, `nama_asisten`, `password`, `foto`, `status`) VALUES
(1, '1103194046', 'Muhammad Fakhri Zain R', '3ab16121ca565da52ba3d8bea56114edb2e95d54', 'default.png', 'Y'),
(2, '1103194184', 'Muhammad Syarif', 'a8f32156932c0e6527472849e28680e5a6b08d45', 'default.jpg', 'Y'),
(3, '1103194186', 'Brilliant Friezka Aina', 'd7eb65fc73ab5df318d6f22f9397edb3ef7aae05', 'default.jpg', 'Y'),
(4, '1103194080', 'Delatifa Putri Sugandi', '946e85d941a6ab6cb68c62dba19146bc57eee22d', 'default.jpg', 'Y'),
(5, '1103194067', 'Berliana Putri Buwono', '33d0258eb4e5baa09fa0254ea7a79608a5fd3318', 'default.jpg', 'Y'),
(6, '1103194150', 'Hanif Shafwan Mahib', '38326fa7cabf0d2ef69a0b873be232f8168bdc29', 'default.jpg', 'Y'),
(7, '1103194020', 'Muhammat Lio Pratama', '8eca87cef09d71f3c81782d36128c9ba788e84a5', 'default.jpg', 'Y'),
(8, '1103193178', 'Rahmad Hidayad', 'd520838613b1925657fbfef2257358fda6c6e0c1', 'default.jpg', 'Y'),
(9, '1103194151', 'Muhammad Rizki Afandy', 'f89ff013a5d4391ec40ec8ad136f338d1d3aace4', 'default.jpg', 'Y'),
(10, '1103190023', 'Siti An-nisaa', '3b16e917144fe2c21654f16235f11081e0952a1c', 'default.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id_lab` int(10) NOT NULL,
  `kode_lab` varchar(30) NOT NULL,
  `laboratorium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id_lab`, `kode_lab`, `laboratorium`) VALUES
(1, 'lab-01', 'RNEST'),
(2, 'lab-02', 'EVCONN'),
(3, 'lab-03', 'MAGICS'),
(4, 'lab-04', 'SECULAB'),
(5, 'lab-05', 'SEA'),
(6, 'lab-06', 'ISMILE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(20) NOT NULL,
  `hari` varchar(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  `id_praktikum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `hari`, `id_shift`, `id_asisten`, `id_praktikum`) VALUES
(1, 'Senin', 1, 1, 1),
(2, 'Senin', 2, 1, 1),
(4, 'Selasa', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id_modul` int(10) NOT NULL,
  `nama_modul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id_modul`, `nama_modul`) VALUES
(1, 'Modul 1'),
(2, 'Modul 2'),
(3, 'Modul 3'),
(4, 'Modul 4'),
(5, 'Modul 5'),
(6, 'Modul 6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(60) NOT NULL,
  `nim` int(120) NOT NULL,
  `nama_praktikan` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_praktikan`
--

INSERT INTO `tb_praktikan` (`id_praktikan`, `nim`, `nama_praktikan`, `password`, `foto`, `status`) VALUES
(1, 1103190028, 'AHMAD TAUFIK RAHMAN MUHARAM', 'b1f5996a0f03bfa9aac111ea10aeb0c60af19c95', 'default.png', '1'),
(2, 1103190168, 'HAIKAL ALGI FARIDJ', '82c44ebab4d547e52416bfa64be169cfd4ae9869', 'default.png', '1'),
(3, 1103194161, 'ADITYA RAMADHAN', '0', 'default.png', '1'),
(4, 1103200032, 'FAJRA RISQULLA', '0', 'default.png', '1'),
(5, 1103200064, 'EFRIZAL ZIDAN AKBAR', '0', 'default.png', '1'),
(6, 1103200082, 'MUHAMMAD YUZZAF IBRAHIM AZZUMARAFI', '0', 'default.png', '1'),
(7, 1103200083, 'ADRIAN FERDINAND JOTHAM', '0', 'default.png', '1'),
(8, 1103200181, 'RULLY LUKAS TAMPUBOLON', '0', 'default.png', '1'),
(9, 1103201264, 'AULIA SAMUDRA JIMANANDA', '0', 'default.png', '1'),
(10, 1103202047, 'JHOSE IMMANUEL SEMBIRING', '0', 'default.png', '1'),
(11, 1103202079, 'EDWIN MALIK MAKARIM', '0', 'default.png', '1'),
(12, 1103202092, 'JUAN META SIRGIANTO', '0', 'default.png', '1'),
(13, 1103202112, 'DIPTA PRASETYO FIRMANSYAH', '0', 'default.png', '1'),
(14, 1103204086, 'RIZKY RAMADHANI SYAM', '0', 'default.png', '1'),
(15, 1103204106, 'MUHAMMAD HUSAIN RIFA`I', '0', 'default.png', '1'),
(16, 1103204205, 'AZAM AULIYAA', '0', 'default.png', '1'),
(17, 1103200203, 'FAHMI NANDA SAPUTRO', '0', 'default.png', '1'),
(18, 1103201243, 'ARIO SYAWAL MUHAMMAD', '0', 'default.png', '1'),
(19, 1103201257, 'JEAN JEASEN TIMOTIUS ZIPAZI', '0', 'default.png', '1'),
(20, 1103202020, 'TOPAZ TAUHID', '0', 'default.png', '1'),
(21, 1103202039, 'APRIL HAMONANGAN MARBUN', '0', 'default.png', '1'),
(22, 1103202071, 'MUHAMMAD HAIDAR ABDUL JABBAR', '0', 'default.png', '1'),
(23, 1103202108, 'TIRTAYUDA MUNGGARANA', '0', 'default.png', '1'),
(24, 1103202123, 'RAIHAN ATHA', '0', 'default.png', '1'),
(25, 1103202210, 'RAIHAN RIZKY ISKANDAR', '0', 'default.png', '1'),
(26, 1103203219, 'MUHAMMAD IKHWAN MAULANA', '0', 'default.png', '0'),
(27, 1103204007, 'JUAN ANEMAO SOKHI ZIDOMI', '0', 'default.png', '0'),
(28, 1103204129, 'ALIEF FAUZI LUQMANUL HAKIM', '0', 'default.png', '0'),
(29, 1103204144, 'AHMAD ADIL TAUFANI', '0', 'default.png', '0'),
(30, 1103204191, 'MOCHAMAD PHILLIA WIBOWO', '0', 'default.png', '0'),
(31, 1103204199, 'GERIL HIDAYAT SAPUTRA', '0', 'default.png', '0'),
(32, 1103204224, 'HANS NUR ICHSAN', '0', 'default.png', '0'),
(33, 1103174185, 'RAIHAN ELSAR KUSUMA', '0', 'default.png', '0'),
(34, 1103190033, 'HARIDHOVA PANGESTILLAH', '0', 'default.png', '0'),
(35, 1103190064, 'RADEN ROFIQ YUDHA SETYAWAN', '0', 'default.png', '0'),
(36, 1103190108, 'MUHAMAD IBNU FAJAR WIBAWA', '0', 'default.png', '0'),
(37, 1103194015, 'YUSUF SULLE', '0', 'default.png', '0'),
(38, 1103194042, 'MOHAMMAD RAYHAN ARYANA', '0', 'default.png', '0'),
(39, 1103194050, 'ARIQ ADHITYA', '0', 'default.png', '0'),
(40, 1103194089, 'ADLAN AFIF NUGROHO', '0', 'default.png', '0'),
(41, 1103194122, 'MUH.NASHAR', '0', 'default.png', '0'),
(42, 1103194135, 'MOHAMMAD RIYANT ALMADHI', '0', 'default.png', '0'),
(43, 1103200173, 'HANS HARISON TAUFIQ', '0', 'default.png', '0'),
(44, 1103202187, 'FAZRI ARDHANA', '0', 'default.png', '0'),
(45, 1103204081, 'RAFEAL SEPRIADI', '0', 'default.png', '0'),
(46, 1103204158, 'A MUH RIFQY MUKHRIFAT', '0', 'default.png', '0'),
(47, 1103194043, 'MUHAMMAD AFIF YUSUF GUSTI', '0', 'default.png', '0'),
(48, 1103200005, 'INDRA ANDRIANSYAH DODY MISNADIN', '0', 'default.png', '0'),
(49, 1103200178, 'MUTHIE ARMALIA SOERIAMARITSA', '0', 'default.png', '0'),
(50, 1103200214, 'MUHAMMAD GARMA ASYAM RIANTO', '0', 'default.png', '0'),
(51, 1103201261, 'GUNAWAN TRI MARDANI', '0', 'default.png', '0'),
(52, 1103202023, 'RAMADHAN JOEMA MUTSU', '0', 'default.png', '0'),
(53, 1103202037, 'AHMAD IRSYAD AKMAL', '0', 'default.png', '0'),
(54, 1103202084, 'NASYWA MUZDALIFA', '0', 'default.png', '0'),
(55, 1103202201, 'JAISY MALIKULMULKI ARASY', '0', 'default.png', '0'),
(56, 1103203212, 'ADE TIRTA RAHMAT HIDAYAT', '0', 'default.png', '0'),
(57, 1103204012, 'SAMUEL ROBERT ROMULUS SIDABALOK', '0', 'default.png', '0'),
(58, 1103204031, 'ANDIVA KASIH ANGGORO PUTRA', '0', 'default.png', '0'),
(59, 1103204044, 'AGUNG REYNALDI AVIZENA', '0', 'default.png', '0'),
(60, 1103204160, 'EVAN PRADIPTA HARDINATHA', '0', 'default.png', '0'),
(61, 1103204195, 'RIZKY EKA PUTRA KUSNADY', '0', 'default.png', '0'),
(62, 1103204207, 'MUHAMMAD AMIRUL ARSYAD ARRAYYAN', '0', 'default.png', '0'),
(63, 1103200055, 'FIKRI NOVALDY', '0', 'default.png', '0'),
(64, 1103200110, 'LAZZUARDI SHOLEHUDDIN NURSUHUD', '0', 'default.png', '0'),
(65, 1103200147, 'RAUDHAFILHAQ ALFITRAH', '0', 'default.png', '0'),
(66, 1103200149, 'FASYA HANIFAH PUTTI', '0', 'default.png', '0'),
(67, 1103200202, 'RAYYAN RAMANDA', '0', 'default.png', '0'),
(68, 1103202041, 'DONY TRI NUGROHO', '0', 'default.png', '0'),
(69, 1103202067, 'ADIFA SYAHIRA', '0', 'default.png', '0'),
(70, 1103202131, 'RIZKI HIDAYAT', '0', 'default.png', '0'),
(71, 1103202153, 'MUHAMMAD SADAM ERLANGGA', '0', 'default.png', '0'),
(72, 1103204016, 'TASSYA RAMADHANTI', '0', 'default.png', '0'),
(73, 1103204019, 'MUTIARA SIHALOHO', '0', 'default.png', '0'),
(74, 1103204035, 'IVAN FERNANDA PRAYOGA', '0', 'default.png', '0'),
(75, 1103204104, 'AKBAR PRASTOWO', '0', 'default.png', '0'),
(76, 1103204125, 'DEWA THEISYATTA ASHARO HEISENDA', '0', 'default.png', '0'),
(77, 1103204165, 'ARSHIE FATHREZZA SURYATAMA HENDRADY', '0', 'default.png', '0'),
(78, 1103204167, 'MUHAMMAD ALFACHRI ASMI', '0', 'default.png', '0'),
(79, 1103200008, 'TAUFIK KURAHMAN SASMITA', '0', 'default.png', '0'),
(80, 1103200062, 'MADE PARAMARTHA VIKRAMA', '0', 'default.png', '0'),
(81, 1103201247, 'IBRAHIM MAULANA', '0', 'default.png', '0'),
(82, 1103202022, 'MUHAMMAD FHARIST', '0', 'default.png', '0'),
(83, 1103202116, 'ALBIZHAR ZIDANE BUDI LAKSANA', '0', 'default.png', '0'),
(84, 1103202143, 'ALFIN ANDREAS BASTIAN SITUMEANG', '0', 'default.png', '0'),
(85, 1103202211, 'GIOVANNI NATHANIEL', '0', 'default.png', '0'),
(86, 1103203227, 'MUHAMMAD FAISAL RAMADHAN', '0', 'default.png', '0'),
(87, 1103204017, 'WENING ALFINA ROSUNIKA', '0', 'default.png', '0'),
(88, 1103204018, 'MUHAMMAD DAFFA SATRIA', '0', 'default.png', '0'),
(89, 1103204085, 'MUHAMMAD FAUZAN NUR`ILHAM', '0', 'default.png', '0'),
(90, 1103204137, 'ARDHIEN FADHILLAH SUHARTONO', '0', 'default.png', '0'),
(91, 1103204166, 'HARITS MAULANA MUZAKKI', '0', 'default.png', '0'),
(92, 1103204186, 'RAKEN PUTRA ATHALLAH', '0', 'default.png', '0'),
(93, 1103204192, 'MUHAMMAD RIZKY PRADHITIA', '0', 'default.png', '0'),
(94, 1103204194, 'MUHAMMAD RAHADYAN', '0', 'default.png', '0'),
(95, 1103204204, 'RAFLY PASHA MULYAWAN AZIS', '0', 'default.png', '0'),
(96, 1103184204, 'LEONARDO CAPRIO', '0', 'default.png', '0'),
(97, 1103200080, 'MUHAMMAD IRFAN AL RASYID', '0', 'default.png', '0'),
(98, 1103201049, 'ZULIAN WAHID', '0', 'default.png', '0'),
(99, 1103201208, 'THASYA MULIA', '0', 'default.png', '0'),
(100, 1103201260, 'HAFIZH ALFIAN SYAKUR', '0', 'default.png', '0'),
(101, 1103201263, 'MOHAMAD AQWAM FARID', '0', 'default.png', '0'),
(102, 1103202011, 'MOCH MALIKI MULKY', '0', 'default.png', '0'),
(103, 1103202042, 'RIFQI FADHILA SHANDI', '0', 'default.png', '0'),
(104, 1103202215, 'KRESHNA PUTRA SUDEWO', '0', 'default.png', '0'),
(105, 1103202245, 'ABYAN HAFIIZH', '0', 'default.png', '0'),
(106, 1103204006, 'NURDIN', '0', 'default.png', '0'),
(107, 1103204107, 'FAUZIL FAHREZI SUAIB', '0', 'default.png', '0'),
(108, 1103204126, 'MOHAMMAD RIZKI RAMDHAN', '0', 'default.png', '0'),
(109, 1103204139, 'RIZQULLAH IMAMUDDIN HABIBI', '0', 'default.png', '0'),
(110, 1103204185, 'RAFIF ARIASA', '0', 'default.png', '0'),
(111, 1103204196, 'MUHAMAD MIFTAH RIZALDI RUSWANDI', '0', 'default.png', '0'),
(112, 1103204213, 'ZAKY IBNU KUSUMAH', '0', 'default.png', '0'),
(113, 1103194114, 'MUHAMMAD IQBAL', '0', 'default.png', '0'),
(114, 1103194141, 'PRATYENGGO DAMAR ISWARA PUTRA', '0', 'default.png', '0'),
(115, 1103200056, 'MUHAMMAD AIMAR RIZKI UTAMA', '0', 'default.png', '0'),
(116, 1103200157, 'NAUFAL RAIHAN RAMADHAN', '0', 'default.png', '0'),
(117, 1103203221, 'SHUBQY YOEGA PRATAMA', '0', 'default.png', '0'),
(118, 1103204002, 'ALFIAN MOHAMAD FIRDAUS', '0', 'default.png', '0'),
(119, 1103204030, 'ACHMAD RIONOV FADDILLAH RAMADHAN', '0', 'default.png', '0'),
(120, 1103204038, 'HARVAN NURLUTHFI IRAWAN', '0', 'default.png', '0'),
(121, 1103204074, 'FAKHRITY HIKMAWAN', '0', 'default.png', '0'),
(122, 1103204145, 'I MADE BAYU SATRIA WARDHANA', '0', 'default.png', '0'),
(123, 1103204152, 'VALRAMA WARDHANA HARIWIDJAJA', '0', 'default.png', '0'),
(124, 1103204159, 'ALVIN YOGA NUGRAHA', '0', 'default.png', '0'),
(125, 1103204174, 'YULIANI', '0', 'default.png', '0'),
(126, 1103204182, 'MUHAMAD ANDI DARMAWAN', '0', 'default.png', '0'),
(127, 1103204184, 'IHSAN RIDHO ASMORO', '0', 'default.png', '0'),
(128, 1103204188, 'MICHAEL', '0', 'default.png', '0'),
(129, 1103200034, 'DAFFA ASYQAR AHMAD KHALISHEKA', '0', 'default.png', '0'),
(130, 1103200066, 'RAI BAROKAH UTARI', '0', 'default.png', '0'),
(131, 1103200089, 'IKHSAR SULAEMAN', '0', 'default.png', '0'),
(132, 1103200109, 'CHEVHAN WALIDAIN', '0', 'default.png', '0'),
(133, 1103201241, 'IBNU FAZRIL', '0', 'default.png', '0'),
(134, 1103201244, 'MUHAMMAD HILMY AZIZ', '0', 'default.png', '0'),
(135, 1103201246, 'MUHAMMAD HAEKAL PANDERADJA PASI', '0', 'default.png', '0'),
(136, 1103201258, 'MUHAMMAD DAFFA', '0', 'default.png', '0'),
(137, 1103202128, 'R.MOCH. NEILDI PRATAMA', '0', 'default.png', '0'),
(138, 1103203238, 'ZAIDAN LUTHFI', '0', 'default.png', '0'),
(139, 1103204014, 'PUTERI ANDINI ROSMADILA', '0', 'default.png', '0'),
(140, 1103204029, 'LUTFIANA ERNIASARI', '0', 'default.png', '0'),
(141, 1103204040, 'MUHAMMAD THARREQ AN NAHL', '0', 'default.png', '0'),
(142, 1103204045, 'ADAM AL-AZIZ OLII', '0', 'default.png', '0'),
(143, 1103204099, 'MAURICIO BETHOVEN TIGAUW', '0', 'default.png', '0'),
(144, 1103204130, 'ALDI FAUZAN', '0', 'default.png', '0'),
(145, 1103200021, 'HURIN SALIMAH', '0', 'default.png', '0'),
(146, 1103200076, 'DIMAS PUTRA MAHENDRA', '0', 'default.png', '0'),
(147, 1103201242, 'AL GHIFARY AKMAL NASHEERI', '0', 'default.png', '0'),
(148, 1103201250, 'RATIKA DWI ANGGRAINI', '0', 'default.png', '0'),
(149, 1103201253, 'ALVAN ALFIANSYAH', '0', 'default.png', '0'),
(150, 1103202052, 'MUHAMMAD AGIEL FAKHROZI', '0', 'default.png', '0'),
(151, 1103202154, 'REYNANDA ADITYA', '0', 'default.png', '0'),
(152, 1103202190, 'FERIKHO FATIH AZHAR', '0', 'default.png', '0'),
(153, 1103204013, 'ACHMAD TEGAR SUSANTO', '0', 'default.png', '0'),
(154, 1103204024, 'MUHAMMAD DAFFA\' SAIFULLAH', '0', 'default.png', '0'),
(155, 1103204058, 'ATALLAH SATRIO KUSUMO', '0', 'default.png', '0'),
(156, 1103204060, 'NABILAH SALWA', '0', 'default.png', '0'),
(157, 1103204095, 'ANDI ASWAN', '0', 'default.png', '0'),
(158, 1103204115, 'RIZKA RAHMADINA', '0', 'default.png', '0'),
(159, 1103204177, 'ARYA PRAMUDITHA', '0', 'default.png', '0'),
(160, 1103204236, 'ICHLASUL AL GIFARI', '0', 'default.png', '0'),
(161, 1103200179, 'MUHAMMAD SIDQI NABHAN', '0', 'default.png', '0'),
(162, 1103201075, 'GILMAN MUSLIH ZAKIR', '0', 'default.png', '0'),
(163, 1103202001, 'ILHAM MUHAMAD FIRDAUS', '0', 'default.png', '0'),
(164, 1103202102, 'ARFIQ RIMELDO', '0', 'default.png', '0'),
(165, 1103202114, 'AGUNG AJI SAPUTRA', '0', 'default.png', '0'),
(166, 1103202162, 'SADAM PORISKOVA MARCHIANO', '0', 'default.png', '0'),
(167, 1103202189, 'DAFI RASYADAN DJAUHARI', '0', 'default.png', '0'),
(168, 1103202197, 'RAFLY SURYADHARMA', '0', 'default.png', '0'),
(169, 1103204015, 'M YUSRIL FAUZAN HARAHAP', '0', 'default.png', '0'),
(170, 1103204033, 'RHEZA ILHAM FIRMANSYAH', '0', 'default.png', '0'),
(171, 1103204046, 'FARIZ RAHMAN RAMADHAN', '0', 'default.png', '0'),
(172, 1103204053, 'ANJAS RAHMANTA CAHYA WIJAYA', '0', 'default.png', '0'),
(173, 1103204096, 'FAISHAL ANWAR', '0', 'default.png', '0'),
(174, 1103204142, 'FAHMI ADHIWANGSA', '0', 'default.png', '0'),
(175, 1103204156, 'NADHIFI QURRUNUL BAHRATU FAUZAN HIBATULLAH', '0', 'default.png', '0'),
(176, 1103204169, 'YOANDHIKA SURYA PUTRA', '0', 'default.png', '0'),
(177, 1103204239, 'MUHAMMAD ISMAIL IBADURRAHMAN', '0', 'default.png', '0'),
(178, 1103200025, 'ALIFIA MUTIARA RAHMA', '0', 'default.png', '0'),
(179, 1103200077, 'IMAM ALGIZA', '0', 'default.png', '0'),
(180, 1103200172, 'VIONA INDAH SUCHITA RAY', '0', 'default.png', '0'),
(181, 1103201248, 'SYIFA WANDA ISNAINI', '0', 'default.png', '0'),
(182, 1103202098, 'GALIH KARYA GEMILANG', '0', 'default.png', '0'),
(183, 1103202121, 'ANDHIKA ARIA PRATAMA NUGRAHA', '0', 'default.png', '0'),
(184, 1103204003, 'LOAEZA SEPTAVIAL', '0', 'default.png', '0'),
(185, 1103204010, 'RIDA PUTRI ANDINI', '0', 'default.png', '0'),
(186, 1103204028, 'BAGUS MAHARDIKA SANTOSO', '0', 'default.png', '0'),
(187, 1103204057, 'SABILLY ARTOWIBOWO', '0', 'default.png', '0'),
(188, 1103204059, 'DILARA KYNTA PUTRI RAFLITA', '0', 'default.png', '0'),
(189, 1103204063, 'QATRUNNADA SALSABILA DELFI', '0', 'default.png', '0'),
(190, 1103204088, 'FAHRY FARDHAN JAHADA', '0', 'default.png', '0'),
(191, 1103204120, 'CHAIRUNNISAH RAHMI NASUTION', '0', 'default.png', '0'),
(192, 1103204146, 'IVAN DANIAR ARYAPUTRA PURIMAHUA', '0', 'default.png', '0'),
(193, 1103204150, 'ARSYAD RIZALDI', '0', 'default.png', '0'),
(194, 1103204206, 'ENRICO ANDRESON PATTIPEILOHY', '0', 'default.png', '0'),
(195, 1103200078, 'MUHAMMAD NAPIZ RAFTI', '0', 'default.png', '0'),
(196, 1103200148, 'AHMAD LUTHFI MUHAJIR MUNANDAR', '0', 'default.png', '0'),
(197, 1103200176, 'WILDAN BUDI ANGGARA', '0', 'default.png', '0'),
(198, 1103200240, 'DHAFIN AZKA', '0', 'default.png', '0'),
(199, 1103201259, 'YASSER MARTIN', '0', 'default.png', '0'),
(200, 1103202004, 'ARFARA YEMA SAMGUSDIAN', '0', 'default.png', '0'),
(201, 1103202048, 'NABIL PUTRA KURNIA UTOMO', '0', 'default.png', '0'),
(202, 1103202072, 'Abizar Alghifari Faza', '0', 'default.png', '0'),
(203, 1103202133, 'FAHAR NAIL HAKIM', '0', 'default.png', '0'),
(204, 1103202161, 'MOCHAMMAD HARIER RIZKI', '0', 'default.png', '0'),
(205, 1103204051, 'DINDA RAHMA', '0', 'default.png', '0'),
(206, 1103204105, 'ALIF FIRMANSYAH', '0', 'default.png', '0'),
(207, 1103204193, 'MUHAMMAD FARIQ TAQI PASAI', '0', 'default.png', '0'),
(214, 1103194046, 'Muhammad', '3ab16121ca565da52ba3d8bea56114edb2e95d54', 'default.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikum`
--

CREATE TABLE `tb_praktikum` (
  `id_praktikum` int(11) NOT NULL,
  `kode_praktikum` varchar(40) NOT NULL,
  `praktikum` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_praktikum`
--

INSERT INTO `tb_praktikum` (`id_praktikum`, `kode_praktikum`, `praktikum`) VALUES
(1, 'MP-001', 'Desain sistem Digital'),
(2, 'MP-002', 'Pengolahan Sinyal Digital'),
(3, 'MP-003', 'Mikroprosessor'),
(4, 'MP-004', 'Pemrograman Berorientasi Objek'),
(5, 'MP-005', 'Keamanan SIstem'),
(6, 'MP-006', 'Kecerdasan Buatan'),
(7, 'MP-007', 'Rangkaian Listrik'),
(8, 'MP-008', 'Algoritma Pemrograman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(4, 'Ganjil', 1),
(5, 'Genap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_shift`
--

CREATE TABLE `tb_shift` (
  `id_shift` int(11) NOT NULL,
  `shift` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_shift`
--

INSERT INTO `tb_shift` (`id_shift`, `shift`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A','C') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_siswa`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(1, 2, 1, '2021-03-02', '', '1'),
(2, 4, 2, '2021-03-06', 'I', '1'),
(3, 2, 1, '2021-03-21', 'H', '2'),
(4, 2, 3, '2021-03-21', 'H', '3'),
(5, 5, 1, '2021-03-21', 'H', '1'),
(6, 5, 3, '2021-03-21', 'H', '1'),
(7, 2, 1, '2021-03-23', 'H', '4'),
(8, 2, 3, '2021-03-23', 'I', '4'),
(9, 6, 1, '2021-03-23', 'H', '1'),
(10, 6, 3, '2021-03-23', 'H', '1'),
(11, 6, 4, '2021-03-23', 'H', '1'),
(12, 6, 1, '2021-03-25', 'I', '2'),
(13, 6, 3, '2021-03-25', 'I', '2'),
(14, 6, 4, '2021-03-25', 'I', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_admin_2` (`id_admin`,`nama_lengkap`,`username`,`password`,`aktif`,`foto`);

--
-- Indexes for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  ADD PRIMARY KEY (`id_asisten`),
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_asisten_2` (`id_asisten`,`nim`,`nama_asisten`,`password`,`foto`,`status`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `id_lab` (`id_lab`,`kode_lab`,`laboratorium`);

--
-- Indexes for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_hari` (`hari`),
  ADD KEY `id_hari_2` (`hari`),
  ADD KEY `id_shift` (`id_shift`,`id_asisten`,`id_praktikum`),
  ADD KEY `id_praktikum` (`id_praktikum`);

--
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  ADD PRIMARY KEY (`id_praktikan`);

--
-- Indexes for table `tb_praktikum`
--
ALTER TABLE `tb_praktikum`
  ADD PRIMARY KEY (`id_praktikum`),
  ADD KEY `kode_praktikum` (`kode_praktikum`),
  ADD KEY `id_praktikum` (`id_praktikum`,`kode_praktikum`,`praktikum`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_shift`
--
ALTER TABLE `tb_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id_lab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `id_modul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `tb_praktikum`
--
ALTER TABLE `tb_praktikum`
  MODIFY `id_praktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD CONSTRAINT `tb_mengajar_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `tb_asisten` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mengajar_ibfk_2` FOREIGN KEY (`id_praktikum`) REFERENCES `tb_praktikum` (`id_praktikum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mengajar_ibfk_3` FOREIGN KEY (`id_shift`) REFERENCES `tb_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
