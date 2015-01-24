-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2014 at 02:57 AM
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
('tlkm0008989i', 'okoko', 'jkjkj', 'huhuhu', '2007', 'baik'),
('tlkm00454646499000', 'layoue', 'arnet sbb', 'ok', '2013', 'rusak'),
('tlkm0090099', 'sbb', 'ukur meter', 'siemens cx500 c', '2013', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_backbone`
--

CREATE TABLE IF NOT EXISTS `tb_backbone` (
  `id_backbone` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `id_sistra` int(11) NOT NULL,
  `avail2mbps` int(11) NOT NULL,
  `availstm1` int(11) NOT NULL,
  `availstm4` int(11) NOT NULL,
  `availstm16` int(11) NOT NULL,
  `availstm64` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_backbone`),
  KEY `id_sistra` (`id_sistra`),
  KEY `id_sistra_2` (`id_sistra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tb_backbone`
--

INSERT INTO `tb_backbone` (`id_backbone`, `kode`, `id_sistra`, `avail2mbps`, `availstm1`, `availstm4`, `availstm16`, `availstm64`, `keterangan`) VALUES
(1, 'ZTE SB-JR', 1, 0, 0, 0, 0, 0, 'surabaya - jember'),
(2, 'ZTE SB-RKT', 1, 8, 7, 9, 0, 8, 'surabaya - rungkut'),
(3, 'ZTE SB-ML', 1, 3300, 8800, 3380, 4000, 8890, 'surabaya - malang'),
(4, 'ZTE SB-MN', 1, 0, 0, 0, 0, 0, 'surabaya - madiun'),
(6, 'ZTE SB-JKT', 1, 77, 88, 88, 0, 89, ' surabaya - Jakarta'),
(8, 'ZTE SB-BD', 1, 0, 0, 0, 0, 0, 'surabaya - bandung'),
(10, 'ZTE SB-SLO', 1, 2500, 3000, 1100, 1, 3000, 'surabaya - solo'),
(14, 'ZTE SB-DPR', 1, 8, 99, 9000, 0, 899, 'surabaya - denpasar'),
(16, 'Main_Ring', 1, 0, 98, 908, 989, 23, 'OK'),
(17, 'Out_Ring', 1, 8908, 8, 9, 89, 8, 'KJKJ'),
(18, 'RL Juntion', 1, 8, 97, 0, 897, 90, 'RL Juntion 1'),
(20, 'LASTMILE WUHAN', 1, 7, 87, 8, 790, 980, 'Wuhan'),
(21, 'ZTE SB-SM', 1, 9, 9, 9, 9, 9, 'MBUH'),
(22, 'ZTE SB-GBR', 1, 1, 2, 3, 4, 33, 'GAK TAHU'),
(23, 'ALCATEL_1660_SM KBL-RKT', 1, 2, 2, 2, 2, 2, 'FJSD'),
(24, 'NORTHEN_ROUTE SB-ML', 1, 23, 2, 2, 32, 3, 'NR'),
(25, 'NORTHEN_ROUTE SB-DPR', 1, 3, 2, 3, 3, 39909, 'D'),
(26, 'NORTHEN_ROUTE SB-MN', 1, 4, 3, 32, 2, 6, 'FG'),
(27, 'NORTHEN_ROUTE SB-JKT', 1, 3, 23, 42, 3, 1, 'SDF'),
(28, 'NORTHEN_ROUTE SB-JKT', 1, 100, 23, 42, 3, 12, 'SDF'),
(29, 'ADM_HUAWEI SUBAYA-JKT-BTM', 1, 100, 3, 12, 31, 323, 'SD'),
(30, 'ADM_HUAWEI SUBAYA-JKT-BTM', 1, 12, 3, 12, 31, 3233, 'SD'),
(31, 'LASTSMILE ADX100_1&ADX100_2', 1, 12, 1, 23, 1, 23, 'SDF'),
(32, 'COMLINE_URBAN KETAPANG(KTP)', 1, 2, 42, 34, 2, 34, 'SDF'),
(33, 'COMLINE_URBAN BANGKALAN(BKL)', 1, 24, 2, 43, 2, 43, 'FSD'),
(34, 'COMLINE_URBAN SAMPANG(SMP)', 1, 2, 4, 2, 43, 24, 'DFSDR2'),
(35, 'RADIO_FUJITSU BL-GSK', 1, 4, 2, 34, 23, 4, 'SFD2'),
(36, 'RADIO_FUJITSU KBL-PMK', 1, 23, 2342, 34, 23, 4, 'FDS'),
(37, 'PDH_SIEMENS_RAP_III KBL-BKL', 1, 23, 12, 12, 3, 12, 'FSD234'),
(38, 'PDH_SIEMENS KBL-GSK', 1, 23, 12, 12, 3, 123, 'FSD234'),
(39, 'SIEMENS KBL-TDS', 1, 3299, 0, 0, 34, 0, 'KEBALEN-TANDES'),
(40, 'NEC SDH_MR_(KBL-DMO)', 1, 143, 0, 0, 0, 0, 'KEBALEN-DARMO');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_ggn`
--

INSERT INTO `tb_ggn` (`id_ggn`, `sistra`, `linkx`, `lokasi`, `uraian`, `tgl`, `jmA`, `jmB`, `pet`, `id_koordinasi`) VALUES
(4, '6', '6', '6', '6', '2014-02-20', '00:00:00', '00:00:00', '8', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_koordinasi`
--

CREATE TABLE IF NOT EXISTS `tb_koordinasi` (
  `id_koordinasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_loker` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `telp2` varchar(15) NOT NULL,
  `id_peg` int(11) NOT NULL,
  PRIMARY KEY (`id_koordinasi`),
  KEY `id_peg` (`id_peg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_koordinasi`
--

INSERT INTO `tb_koordinasi` (`id_koordinasi`, `id_loker`, `telp`, `telp2`, `id_peg`) VALUES
(4, 1, '22', '1111', 2),
(5, 1, '33334', '4444', 5),
(6, 5, '08042829', '0312492384', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_linka`
--

CREATE TABLE IF NOT EXISTS `tb_linka` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `nama` varchar(11) NOT NULL,
  PRIMARY KEY (`id_linka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
(5, 'malang', 'ML');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loker`
--

CREATE TABLE IF NOT EXISTS `tb_loker` (
  `id_loker` int(11) NOT NULL AUTO_INCREMENT,
  `loker` varchar(100) NOT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_loker`
--

INSERT INTO `tb_loker` (`id_loker`, `loker`) VALUES
(1, 'kebalen'),
(3, 'ketintang'),
(4, 'suramadu'),
(5, 'ngagel jaya utara');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`id_peg`, `nik`, `nama`, `alamat`, `username`, `password`, `id_level`, `id_session`) VALUES
(1, '111111111111', 'bang opik :))', 'jalan lurus gang kebenaran no 1 gak ada tanding\r\n', 'taekmu', 'e8f8fe6ae319ffce0f41f501fd05292e', 'admin', 'camjrm9t727s11d9sbv3nrnoo1'),
(2, '612030', 'mulyono', 'pegesangan gg.10', 'epiii', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'rltohpvhaj6ukjsb9na3733sf1'),
(5, '999999999999', 'public2 ', 'lupa iaman', 'public2', '2c3a361fb1de561aa70f6aee4727c6a9', 'public', ''),
(9, '612030', 'mulyono', 'pagesangan', '612030', 'a07c7767a98b8e26418ceb19316475d3', 'user', ''),
(10, '621350', 'sugiyono', 'sidoarjo gg,10', '621350', '025db44c7bed5aad0be250dd67f1321b', 'user', '');

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
('P001', 'ZTE', 'TE M980', 2005, 0, 0),
('P002', 'ALCATEL', 'ALCATEL 1660 SM', 1998, 0, 0),
('P003', 'NEC', 'NEC_MR', 2013, 0, 0),
('P004', 'PDH_SIEMENS', 'PDH_SIEMENS RAPIII', 1997, 0, 0),
('P005', 'TEJAS', 'TJ001A', 2002, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkat_detail`
--

CREATE TABLE IF NOT EXISTS `tb_perangkat_detail` (
  `id_per_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_per` varchar(20) NOT NULL,
  `ddf_a` varchar(50) NOT NULL,
  `ddf_b` varchar(50) NOT NULL,
  `channelida` varchar(50) NOT NULL,
  `channelidb` varchar(50) NOT NULL,
  PRIMARY KEY (`id_per_detail`),
  KEY `id_per` (`id_per`),
  KEY `id_per_2` (`id_per`),
  KEY `id_per_3` (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_perangkat_detail`
--

INSERT INTO `tb_perangkat_detail` (`id_per_detail`, `id_per`, `ddf_a`, `ddf_b`, `channelida`, `channelidb`) VALUES
(1, 'P001', '3', '3', '3', '3'),
(2, 'P002', '5', '5', '5', '5'),
(3, 'P001', '1', '1', '1', '1'),
(8, 'P002', '8', '888', '77', '77'),
(9, 'P002', '7', '7', '7', '7'),
(10, 'P002', '6', '6', '6', '6'),
(11, 'P004', '174', '174', '0', '0'),
(12, 'P003', '0', '0', '898', '0'),
(13, 'P005', 'FHGF79Y98', 'GWRHTRE76', 'FGDG767887', 'DH99');

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
  `keterangan` text NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_sirkit`),
  KEY `id_linkB` (`id_linkb`),
  KEY `id_linkA` (`id_linka`),
  KEY `id_user` (`id_user`),
  KEY `id_backbone` (`id_backbone`),
  KEY `id_user_2` (`id_user`),
  KEY `id_linkA_2` (`id_linka`),
  KEY `id_per_detail` (`id_per_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_sirkit`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_sistra`
--

CREATE TABLE IF NOT EXISTS `tb_sistra` (
  `id_sistra` int(11) NOT NULL AUTO_INCREMENT,
  `sistra` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sistra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_sistra`
--

INSERT INTO `tb_sistra` (`id_sistra`, `sistra`) VALUES
(1, 'DWDM'),
(2, 'ALCATEL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(8, 'b.tel', 'ini b. tel'),
(9, 'keprett', 'kapreth');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_backbone`
--
ALTER TABLE `tb_backbone`
  ADD CONSTRAINT `tb_backbone_ibfk_1` FOREIGN KEY (`id_sistra`) REFERENCES `tb_sistra` (`id_sistra`);

--
-- Constraints for table `tb_ggn`
--
ALTER TABLE `tb_ggn`
  ADD CONSTRAINT `tb_ggn_ibfk_1` FOREIGN KEY (`id_koordinasi`) REFERENCES `tb_koordinasi` (`id_koordinasi`);

--
-- Constraints for table `tb_koordinasi`
--
ALTER TABLE `tb_koordinasi`
  ADD CONSTRAINT `tb_koordinasi_ibfk_1` FOREIGN KEY (`id_peg`) REFERENCES `tb_peg` (`id_peg`);

--
-- Constraints for table `tb_perangkat_detail`
--
ALTER TABLE `tb_perangkat_detail`
  ADD CONSTRAINT `tb_perangkat_detail_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `tb_perangkat` (`id`);

--
-- Constraints for table `tb_sirkit`
--
ALTER TABLE `tb_sirkit`
  ADD CONSTRAINT `tb_sirkit_ibfk_2` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  ADD CONSTRAINT `tb_sirkit_ibfk_3` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linka`),
  ADD CONSTRAINT `tb_sirkit_ibfk_4` FOREIGN KEY (`id_backbone`) REFERENCES `tb_backbone` (`id_backbone`),
  ADD CONSTRAINT `tb_sirkit_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_sirkit_ibfk_6` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linka`),
  ADD CONSTRAINT `tb_sirkit_ibfk_7` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  ADD CONSTRAINT `tb_sirkit_ibfk_9` FOREIGN KEY (`id_per_detail`) REFERENCES `tb_perangkat_detail` (`id_per_detail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
