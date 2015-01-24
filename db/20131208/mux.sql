-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 07:05 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mux`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alat`
--

CREATE TABLE IF NOT EXISTS `tb_alat` (
  `id_alat` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kegunaan` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `thn_oper` char(4) NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`id_alat`, `lokasi`, `kegunaan`, `merk`, `thn_oper`, `kondisi`) VALUES
('tlkm0008989i', 'okoko', 'jkjkj', 'huhuhu', '2007', 'rusak'),
('tlkm00454646499000', 'layoue', 'arnet sbb', 'ok', '2013', 'rusak'),
('tlkm0090099', 'sbb', 'ukur meter', 'siemens cx500 c', '2013', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_backbone`
--

CREATE TABLE IF NOT EXISTS `tb_backbone` (
  `id_backbone` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `avail2mbps` int(11) NOT NULL,
  `availstm1` int(11) NOT NULL,
  `availstm4` int(11) NOT NULL,
  `availstm16` int(11) NOT NULL,
  `availstm64` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_backbone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_backbone`
--

INSERT INTO `tb_backbone` (`id_backbone`, `kode`, `avail2mbps`, `availstm1`, `availstm4`, `availstm16`, `availstm64`, `keterangan`) VALUES
(1, 'ZTE SB-JR', 0, 0, 0, 0, 0, 'surabaya - jember'),
(2, 'ZTE SB-RKT', 8, 7, 9, 0, 8, 'surabaya - rungkut'),
(3, 'ZTE SB-ML', 3300, 8800, 3380, 4000, 8890, 'surabaya - malang'),
(4, 'ZTE SB - M', 0, 0, 0, 0, 0, 'surabaya - madiun'),
(6, 'ZTE SB-JKT', 77, 88, 88, 0, 89, ' surabaya - Jakarta'),
(8, 'ZTE SB-BD', 0, 0, 0, 0, 0, 'surabaya - bandung'),
(10, 'ZTE SB-SLO', 2500, 3000, 1100, 1, 3000, 'surabaya - solo'),
(14, 'ZTE SB-DPR', 8, 99, 9000, 0, 899, 'surabaya - denpasar'),
(15, 'NE SB-DPR', 9, 9, 9, 9, 9, 'NE untuk surabaya denpasar '),
(16, 'Main Ring', 0, 98, 908, 989, 23, 'OK'),
(17, 'Out Ring', 8908, 8, 9, 89, 8, 'KJKJ'),
(18, 'RL Juntion', 8, 97, 0, 897, 90, 'RL Juntion 1'),
(19, 'SMA1 K,KBL', 89, 7, 87, 7, 87, 'SMA1 K,KBL-Menur'),
(20, 'Wuhan', 7, 87, 8, 790, 980, 'Wuhan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ggn`
--

CREATE TABLE IF NOT EXISTS `tb_ggn` (
  `id_ggn` int(11) NOT NULL AUTO_INCREMENT,
  `sistra` varchar(50) NOT NULL,
  `linkx` varchar(20) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `tgl` date NOT NULL,
  `jmA` time NOT NULL,
  `jmB` time NOT NULL,
  `pet` varchar(250) NOT NULL,
  `id_koordinasi` int(11) NOT NULL,
  PRIMARY KEY (`id_ggn`),
  KEY `id_solver` (`id_koordinasi`),
  KEY `id_koordinasi` (`id_koordinasi`),
  KEY `id_koordinasi_2` (`id_koordinasi`),
  KEY `id_koordinasi_3` (`id_koordinasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_ggn`
--

INSERT INTO `tb_ggn` (`id_ggn`, `sistra`, `linkx`, `lokasi`, `uraian`, `tgl`, `jmA`, `jmB`, `pet`, `id_koordinasi`) VALUES
(4, '4', '44', '444', '4444', '0000-00-00', '00:44:43', '00:04:44', '44444424', 11),
(5, '78', '88', '78', '78', '0000-00-00', '00:00:00', '00:00:00', '6', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kapasitas`
--

CREATE TABLE IF NOT EXISTS `tb_kapasitas` (
  `id_kapasitas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kap` varchar(10) NOT NULL,
  `id_backbone` int(11) NOT NULL,
  `avail2mbpsx` int(11) NOT NULL,
  `availstm1x` int(11) NOT NULL,
  `availstm4x` int(11) NOT NULL,
  `availstm64x` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_kapasitas`),
  KEY `id_backbone` (`id_backbone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `tb_kapasitas`
--

INSERT INTO `tb_kapasitas` (`id_kapasitas`, `id_kap`, `id_backbone`, `avail2mbpsx`, `availstm1x`, `availstm4x`, `availstm64x`, `tgl`) VALUES
(1, 'k001', 10, 99, 88, 77, 66, '2013-12-01 00:00:00'),
(2, 'k004', 1, 88, 234, 2, 667, '2013-11-28 00:00:00'),
(3, 'k004', 1, 878, 100, 2001, 100, '2013-12-01 00:00:00'),
(4, 'k002', 1, 100, 10, 4, 1001, '2013-11-01 12:06:00'),
(5, 'k003', 8, 55, 54, 553, 53, '2013-12-01 00:00:00'),
(6, 'k002', 1, 89, 556, 1, 11, '2013-09-01 00:00:00'),
(7, 'k004', 1, 88, 54, 5, 53, '2013-10-29 00:00:00'),
(8, 'k005', 1, 89, 556, 5, 11, '2013-10-01 00:00:00'),
(9, 'k006', 1, 89, 88, 3, 2211, '2013-12-02 00:00:00'),
(10, 'k007', 2, 4489, 56, 88, 5511, '2013-12-01 00:00:00'),
(11, 'k008', 1, 200, 80, 87, 788, '2013-11-04 00:00:00'),
(12, 'k003', 3, 7, 77, 777, 7777, '2013-12-02 17:00:00'),
(13, 'k004', 3, 2, 22, 222, 222, '2013-12-02 00:00:00'),
(14, 'k002', 1, 1, 11, 111, 1111, '2013-07-02 00:00:00'),
(15, 'k002', 1, 3, 33, 333, 3333, '2013-10-02 00:00:00'),
(16, 'k002', 1, 44, 444, 4444, 44444, '2013-08-02 00:00:00'),
(17, 'k002', 1, 12, 2221, 132, 54, '2013-12-02 07:29:08'),
(45, 'k008', 1, 4, 55, 222, 333, '2013-12-01 22:40:51'),
(66, 'k008', 1, 34, 223, 775, 5, '2013-10-10 22:38:37'),
(67, '6', 14, 1, 1, 1, 1, '2013-12-06 03:08:08'),
(68, 'k004', 10, 11, 11, 11, 11, '2013-12-06 03:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koordinasi`
--

CREATE TABLE IF NOT EXISTS `tb_koordinasi` (
  `id_koordinasi` int(11) NOT NULL AUTO_INCREMENT,
  `loker` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `telp2` varchar(15) NOT NULL,
  `id_peg` int(11) NOT NULL,
  PRIMARY KEY (`id_koordinasi`),
  KEY `id_peg` (`id_peg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_koordinasi`
--

INSERT INTO `tb_koordinasi` (`id_koordinasi`, `loker`, `telp`, `telp2`, `id_peg`) VALUES
(10, 77, '02414132893', '928039482', 3),
(11, 666, '0282938', '820948', 2),
(12, 3, '3333', '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_linka`
--

CREATE TABLE IF NOT EXISTS `tb_linka` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `nama` varchar(11) NOT NULL,
  PRIMARY KEY (`id_linka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18446744073709551615 ;

--
-- Dumping data for table `tb_linka`
--

INSERT INTO `tb_linka` (`id_linka`, `keterangan`, `nama`) VALUES
(1, 'surabaya', 'SB'),
(2, 'malang', 'ML'),
(3, 'jember', 'JR'),
(4, 'jakarta', 'JKT'),
(5, 'bandung', 'BD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_linkb`
--

CREATE TABLE IF NOT EXISTS `tb_linkb` (
  `id_linkb` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_linkb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_linkb`
--

INSERT INTO `tb_linkb` (`id_linkb`, `keterangan`, `nama`) VALUES
(1, 'bandung', 'BD'),
(2, 'jakarta', 'JKT'),
(3, 'surabaya', 'SB'),
(4, 'madiun', 'MN'),
(5, 'malalng', 'ML');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peg`
--

CREATE TABLE IF NOT EXISTS `tb_peg` (
  `id_peg` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_level` enum('admin','user','public') NOT NULL,
  `id_session` text NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`id_peg`, `nik`, `nama`, `alamat`, `username`, `password`, `id_level`, `id_session`) VALUES
(1, '111111111111', 'bang opik :))', 'jalan lurus gang kebenaran no 1 ', 'taekmu', 'e8f8fe6ae319ffce0f41f501fd05292e', 'admin', '47r8fiv6vt8vf5ihaln0dmkc77'),
(2, '333333333333', 'aku user', 'jalan jambu no 22 surabaya', 'ijo', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'cvtr7mho0djunrhqq8vl0fkoo3'),
(3, '555555555555', 'kulo tiang public', 'perumahan komplek TNI AL surabaya', 'pub', '3a21cd7317e1445be89999f5d7f62a53', 'public', '6upiok08f4uib87qijshu5vqc6'),
(4, '888888888888', 'aku user2', 'komplek a blok c gg buntu', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user', 'uvjmd9mbnb72hpmgt9va6ilav4'),
(5, '999999999999', 'public2 ', 'lupa iaman', 'public2', '2c3a361fb1de561aa70f6aee4727c6a9', 'public', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkat`
--

CREATE TABLE IF NOT EXISTS `tb_perangkat` (
  `id` char(4) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `thn_oper` int(11) NOT NULL,
  `thn_noper` int(11) NOT NULL,
  `jumMax` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perangkat`
--

INSERT INTO `tb_perangkat` (`id`, `merk`, `type`, `thn_oper`, `thn_noper`, `jumMax`) VALUES
('P001', 'ZTE', 'M920', 2000, 2003, 2),
('P002', 'ZTE', 'M920', 2000, 2008, 4),
('P004', 'ZTE', 'M9200', 2000, 2000, 1),
('P005', 'ZTE aja', 'M9200', 1995, 1995, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkat_detail`
--

CREATE TABLE IF NOT EXISTS `tb_perangkat_detail` (
  `id_per_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_per` varchar(20) NOT NULL,
  `ddf_a` int(11) NOT NULL,
  `ddf_b` int(11) NOT NULL,
  `channelida` int(11) NOT NULL,
  `channelidb` int(11) NOT NULL,
  PRIMARY KEY (`id_per_detail`),
  KEY `id_per` (`id_per`),
  KEY `id_per_2` (`id_per`),
  KEY `id_per_3` (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_perangkat_detail`
--

INSERT INTO `tb_perangkat_detail` (`id_per_detail`, `id_per`, `ddf_a`, `ddf_b`, `channelida`, `channelidb`) VALUES
(1, 'P005', 11, 22, 12, 23),
(2, 'P004', 40, 44, 4444, 4),
(3, 'P005', 500, 8, 508, 88805),
(4, 'P005', 89, 9, 9, 9),
(5, 'P005', 8, 8, 8, 8),
(8, 'P002', 76, 666, 7, 7),
(18, 'P002', 7, 777, 7, 7),
(21, 'P002', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkit`
--

CREATE TABLE IF NOT EXISTS `tb_sirkit` (
  `id_sirkit` int(11) NOT NULL AUTO_INCREMENT,
  `id_per_detail` int(11) NOT NULL,
  `kondisi` enum('rusak','normal') NOT NULL,
  `id_backbone` int(11) NOT NULL,
  `id_linka` int(11) NOT NULL,
  `id_linkb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `st_a` varchar(50) NOT NULL,
  `st_b` varchar(50) NOT NULL,
  `tc` varchar(50) NOT NULL,
  `ddf_tc` varchar(50) NOT NULL,
  `ddf_user` varchar(50) NOT NULL,
  `tid` varchar(50) NOT NULL,
  `diu` varchar(50) NOT NULL,
  `tie_line` varchar(50) NOT NULL,
  `id_sistra` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_sirkit`),
  KEY `id_linkB` (`id_linkb`),
  KEY `id_linkA` (`id_linka`),
  KEY `id_user` (`id_user`),
  KEY `id_backbone` (`id_backbone`),
  KEY `id_user_2` (`id_user`),
  KEY `id_linkA_2` (`id_linka`),
  KEY `id_sistra` (`id_sistra`),
  KEY `id_sistra_2` (`id_sistra`),
  KEY `id_per_detail` (`id_per_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `tb_sirkit`
--

INSERT INTO `tb_sirkit` (`id_sirkit`, `id_per_detail`, `kondisi`, `id_backbone`, `id_linka`, `id_linkb`, `id_user`, `st_a`, `st_b`, `tc`, `ddf_tc`, `ddf_user`, `tid`, `diu`, `tie_line`, `id_sistra`, `keterangan`, `tgl_update`) VALUES
(1, 3, 'rusak', 1, 5, 2, 6, 'sta 1', 'stb 1', 'tc 1', 'ddf tc 1', 'ddf user 1', 'tid 1', 'diu 1', 'tie line 1', 1, 'keterangan 1', '2013-12-03 15:43:08'),
(2, 3, 'normal', 1, 4, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', '', 1, 'keterangan 11', '0000-00-00 00:00:00'),
(3, 3, 'rusak', 1, 5, 2, 6, 'sta 1', 'stb 1', 'tc 1', 'ddf tc 1', 'ddf user 1', 'tid 1', 'diu 1', '', 1, 'keterangan 155', '2013-12-07 00:46:05'),
(4, 3, 'rusak', 1, 5, 2, 6, 'sta 1', 'stb 1', 'tc 1', 'ddf tc 1', 'ddf user 1', 'tid 1', 'diu 1', '', 5, 'keterangan 155', '2013-12-07 02:07:57'),
(5, 3, 'rusak', 1, 5, 2, 7, 'sta 1', 'stb 1', 'tc 1', 'ddf tc 1', 'ddf user 1', 'tid 1', 'diu 1', '', 5, 'udah rusak alatnya bung', '2013-12-07 02:20:02'),
(7, 3, 'normal', 1, 5, 2, 7, 'sta 1', 'stb 1', 'tc 1', 'ddf tc 1', 'ddf user 1', 'tid 1', 'diu 1', '', 5, 'udah rusak alatnya bung', '2013-12-07 02:37:27'),
(8, 3, 'rusak', 1, 1, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', '', 1, 'banget', '2013-12-07 02:38:11'),
(9, 3, 'normal', 1, 1, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'tl 11', 1, 'banget', '2013-12-07 02:46:23'),
(14, 3, 'normal', 1, 1, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'te el 11', 1, 'banget', '2013-12-07 03:18:32'),
(15, 3, 'normal', 1, 1, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'te el 11', 1, 'banget', '2013-12-07 03:20:01'),
(16, 3, 'rusak', 1, 1, 3, 5, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'te el 11', 1, 'banget', '2013-12-07 03:20:07'),
(77, 2, 'rusak', 10, 4, 5, 2, '7', '7', '7', '7', '7', '7', '7', '77', 5, '8', '2013-12-07 19:15:00'),
(79, 1, 'rusak', 1, 5, 1, 5, '7', '7', '87', '87', '87', '7', '87', '87', 5, '7', '2013-12-07 07:25:28'),
(80, 1, 'normal', 1, 5, 1, 5, '99', '9', '9', '9', '99', '9', '99', '9', 1, '7', '2013-12-07 07:26:40'),
(81, 1, 'normal', 1, 5, 1, 7, '99', '9', '9', '9', '99', '9', '99', '9', 1, '7', '2013-12-07 08:56:59'),
(82, 3, 'normal', 1, 1, 3, 8, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'te el 11', 1, 'banget', '2013-12-07 08:57:17'),
(83, 3, 'normal', 1, 1, 3, 8, 'sta 11', 'stb 11', 'tc 11', 'ddf tc 11', 'ddf user 11', 'tid 11', 'diu 11', 'te el 11', 1, 'bangetx', '2013-12-07 08:58:32'),
(84, 3, 'normal', 1, 1, 3, 8, '22', '22', '2', '2', '2', '2', '2', '2', 5, 'banget 2222', '2013-12-07 08:59:01'),
(85, 3, 'normal', 1, 1, 3, 3, '22', '22', '2', '2', '2', '2', '2', '2', 5, 'banget 2222', '2013-12-07 08:59:15'),
(86, 1, 'rusak', 1, 5, 1, 7, '99', '9', '9', '9', '99', '9', '99', '9', 1, '7', '2013-12-07 09:01:18'),
(87, 1, 'normal', 1, 5, 1, 7, '99', '9', '9', '9', '99', '9', '99', '9', 1, '7', '2013-12-07 11:35:26'),
(88, 5, 'normal', 1, 3, 4, 8, '67676', '6', '6', '6', '6', '6', '6', '6', 5, 'I', '2013-12-07 14:28:15'),
(89, 18, 'normal', 1, 5, 1, 8, '99', '99', '9', '9', '9', '9', '9', '9', 5, '9', '2013-12-08 03:23:18'),
(90, 18, 'normal', 1, 4, 4, 8, '99', '99', '9', '9', '9', '9', '9', '9', 5, '9', '2013-12-08 03:24:13'),
(91, 8, 'normal', 1, 5, 1, 8, '6', '6', '6', '6', '66', '6', '6', '6', 5, '77', '2013-12-08 03:24:46'),
(92, 4, 'normal', 15, 5, 1, 8, '7', '7', '7', '7', '7', '7', '7', '7', 5, '2', '2013-12-08 03:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sistra`
--

CREATE TABLE IF NOT EXISTS `tb_sistra` (
  `id_sistra` int(11) NOT NULL AUTO_INCREMENT,
  `sistra` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sistra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_sistra`
--

INSERT INTO `tb_sistra` (`id_sistra`, `sistra`) VALUES
(1, 'DWDM'),
(5, 'ALCATEL-1 STM16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user`, `keterangan`) VALUES
(1, 'sljj', 'ini sljj'),
(2, 'mea', 'ini mea'),
(3, 'flexi', 'ini flexi'),
(4, 'speedy', 'ini speedy'),
(5, 'olo', 'ini olo'),
(6, 'mm', 'ini mm'),
(7, 'l/c', 'ini l/c'),
(8, 'b.tel', 'ini b. tel');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ggn`
--
ALTER TABLE `tb_ggn`
  ADD CONSTRAINT `tb_ggn_ibfk_1` FOREIGN KEY (`id_koordinasi`) REFERENCES `tb_koordinasi` (`id_koordinasi`);

--
-- Constraints for table `tb_kapasitas`
--
ALTER TABLE `tb_kapasitas`
  ADD CONSTRAINT `tb_kapasitas_ibfk_1` FOREIGN KEY (`id_backbone`) REFERENCES `tb_backbone` (`id_backbone`);

--
-- Constraints for table `tb_koordinasi`
--
ALTER TABLE `tb_koordinasi`
  ADD CONSTRAINT `tb_koordinasi_ibfk_1` FOREIGN KEY (`id_peg`) REFERENCES `tb_peg` (`id_peg`);

--
-- Constraints for table `tb_perangkat_detail`
--
ALTER TABLE `tb_perangkat_detail`
  ADD CONSTRAINT `tb_perangkat_detail_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `tb_perangkat` (`Id`);

--
-- Constraints for table `tb_sirkit`
--
ALTER TABLE `tb_sirkit`
  ADD CONSTRAINT `tb_sirkit_ibfk_2` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  ADD CONSTRAINT `tb_sirkit_ibfk_3` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linkA`),
  ADD CONSTRAINT `tb_sirkit_ibfk_4` FOREIGN KEY (`id_backbone`) REFERENCES `tb_backbone` (`id_backbone`),
  ADD CONSTRAINT `tb_sirkit_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_sirkit_ibfk_6` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linkA`),
  ADD CONSTRAINT `tb_sirkit_ibfk_7` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  ADD CONSTRAINT `tb_sirkit_ibfk_8` FOREIGN KEY (`id_sistra`) REFERENCES `tb_sistra` (`id_sistra`),
  ADD CONSTRAINT `tb_sirkit_ibfk_9` FOREIGN KEY (`id_per_detail`) REFERENCES `tb_perangkat_detail` (`id_per_detail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
