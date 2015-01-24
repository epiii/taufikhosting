-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 06:21 PM
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
  `nama` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kegunaan` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `thn_oper` char(4) NOT NULL,
  `jml` int(11) NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`id_alat`, `nama`, `lokasi`, `kegunaan`, `merk`, `thn_oper`, `jml`, `kondisi`) VALUES
('tlkm0008989i', 'fujitsu hoam', 'sbb', 'dkkd', 'ok', '2008', 2, 'rusak'),
('tlkm00454646499000', 'spanish', 'layoue', 'arnet sbb', 'ok', '2013', 0, 'rusak'),
('tlkm0090099', 'siemens ', 'sbb', 'ukur meter', 'siemens cx500 c', '2013', 1, 'rusak');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_backbone`
--

INSERT INTO `tb_backbone` (`id_backbone`, `kode`, `avail2mbps`, `availstm1`, `availstm4`, `availstm16`, `availstm64`, `keterangan`) VALUES
(1, 'SB-JR', 0, 0, 0, 0, 0, 'sby - jmber'),
(2, 'SB-RKT', 0, 0, 0, 0, 0, 'surabaya - rungkut'),
(3, 'SB-ML', 3300, 8800, 3380, 4000, 8890, 'surabaya - malang'),
(4, 'SB - MN', 0, 0, 0, 0, 0, ''),
(6, 'SB-JKT', 0, 0, 0, 0, 0, ' surabaya - ?'),
(8, 'SB-BD', 0, 0, 0, 0, 0, 'surabaya - bandung'),
(10, 'SB-SLO', 2500, 3000, 1100, 4500, 3000, 'surabaya - solo'),
(14, 'ZTE SB-D', 8, 99, 9000, 0, 899, 'surabaya - denpasar'),
(15, 'NE SB-D', 8, 9, 7, 0, 6, 'NE untuk surabaya denpasar ');

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
  `id_koordinasi` int(3) NOT NULL,
  PRIMARY KEY (`id_ggn`),
  KEY `id_solver` (`id_koordinasi`),
  KEY `id_koordinasi` (`id_koordinasi`),
  KEY `id_koordinasi_2` (`id_koordinasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_ggn`
--

INSERT INTO `tb_ggn` (`id_ggn`, `sistra`, `linkx`, `lokasi`, `uraian`, `tgl`, `jmA`, `jmB`, `pet`, `id_koordinasi`) VALUES
(11, '1', '11', '111', '1111', '2013-11-12', '10:00:01', '06:00:01', '1111111', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

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
(66, 'k008', 1, 34, 223, 775, 5, '2013-10-10 22:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koordinasi`
--

CREATE TABLE IF NOT EXISTS `tb_koordinasi` (
  `id_koordinasi` int(3) NOT NULL AUTO_INCREMENT,
  `loker` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `telp2` varchar(12) NOT NULL,
  `nik` int(11) NOT NULL,
  PRIMARY KEY (`id_koordinasi`),
  KEY `NIK` (`nik`),
  KEY `nik_2` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_koordinasi`
--

INSERT INTO `tb_koordinasi` (`id_koordinasi`, `loker`, `telp`, `telp2`, `nik`) VALUES
(2, '88', '6', '66', 89),
(3, '29384', '82', '384', 1);

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
  `nik` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_level` varchar(20) NOT NULL,
  `id_session` text NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`nik`, `nama`, `alamat`, `username`, `password`, `id_level`, `id_session`) VALUES
(1, 'topek', 'JALAN BEJO BANGET', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ukn57h7ridk9lsgg8hg5elbqv7'),
(89, 'nama asikk ', 'alamat89', 'user89', '6e6ebf1ab9b822283cfde91f2da9e9c9', 'user', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perangkat`
--

INSERT INTO `tb_perangkat` (`id`, `merk`, `type`, `thn_oper`, `thn_noper`) VALUES
('P001', 'ZTE', 'M920', 2000, 2003),
('P002', 'ZTE', 'M920', 2000, 2008),
('P004', 'ZTE', 'M9200', 2000, 2000),
('P005', 'ZTE', 'M920', 2000, 2000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_perangkat_detail`
--

INSERT INTO `tb_perangkat_detail` (`id_per_detail`, `id_per`, `ddf_a`, `ddf_b`, `channelida`, `channelidb`) VALUES
(1, 'P005', 11, 22, 12, 23),
(2, 'P004', 800, 8, 88, 898),
(3, 'P005', 500, 8, 508, 88805);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkit`
--

CREATE TABLE IF NOT EXISTS `tb_sirkit` (
  `id_sirkit` int(11) NOT NULL,
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
  `arnet` varchar(20) NOT NULL,
  `netre` varchar(20) NOT NULL,
  `id_sistra` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `used2mbps` int(11) NOT NULL,
  `usedstm1` int(11) NOT NULL,
  `usedstm4` int(11) NOT NULL,
  `usedstm16` int(11) NOT NULL,
  `usedstm64` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sirkit`
--

INSERT INTO `tb_sirkit` (`id_sirkit`, `id_per_detail`, `kondisi`, `id_backbone`, `id_linka`, `id_linkb`, `id_user`, `st_a`, `st_b`, `tc`, `ddf_tc`, `ddf_user`, `tid`, `diu`, `tie_line`, `arnet`, `netre`, `id_sistra`, `keterangan`, `used2mbps`, `usedstm1`, `usedstm4`, `usedstm16`, `usedstm64`, `bulan`, `tahun`, `tgl_update`) VALUES
(1, 1, 'rusak', 10, 5, 3, 2, 'sta', 'stb', 'tc', 'ddf', 'userddf', 'tid', 'diu', 'tie line', 'arnet', 'netre', 1, 'ket', 900, 77, 5666, 0, 78, 8, 2013, '2013-12-02 15:34:22'),
(2, 2, 'normal', 3, 4, 5, 1, 'sta2', 'stb2', 'tc2', 'ssftc2', 'ddfuser2', 'tid2', 'diu2', 'tielinw2', 'arnet2', 'netre2', 5, 'ket 2', 22, 222, 2222, 0, 22222, 222222, 2222222, '0000-00-00 00:00:00'),
(3, 1, 'rusak', 10, 5, 5, 2, 'sta3', 'stb3', 'tc3', 'ddftc3', 'ddfuser3', 'tid3', 'diu3', 'tieline3', 'arnet3', 'netre3', 1, 'ket3', 33, 333, 3, 0, 3333, 3, 2013, '0000-00-00 00:00:00');

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
  ADD CONSTRAINT `tb_ggn_ibfk_1` FOREIGN KEY (`id_koordinasi`) REFERENCES `tb_koordinasi` (`Id_koordinasi`);

--
-- Constraints for table `tb_kapasitas`
--
ALTER TABLE `tb_kapasitas`
  ADD CONSTRAINT `tb_kapasitas_ibfk_1` FOREIGN KEY (`id_backbone`) REFERENCES `tb_backbone` (`id_backbone`);

--
-- Constraints for table `tb_koordinasi`
--
ALTER TABLE `tb_koordinasi`
  ADD CONSTRAINT `tb_koordinasi_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tb_peg` (`Nik`),
  ADD CONSTRAINT `tb_koordinasi_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_peg` (`nik`);

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
