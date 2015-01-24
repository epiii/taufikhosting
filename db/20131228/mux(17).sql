-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2013 at 02:58 AM
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
  `kode` varchar(50) NOT NULL,
  `avail2mbps` int(11) NOT NULL,
  `availstm1` int(11) NOT NULL,
  `availstm4` int(11) NOT NULL,
  `availstm16` int(11) NOT NULL,
  `availstm64` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_backbone`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_backbone`
--

INSERT INTO `tb_backbone` (`id_backbone`, `kode`, `avail2mbps`, `availstm1`, `availstm4`, `availstm16`, `availstm64`, `keterangan`) VALUES
(1, 'ZTE SB-JR', 0, 0, 0, 0, 0, 'surabaya - jember'),
(2, 'ZTE SB-RKT', 8, 7, 9, 0, 8, 'surabaya - rungkut'),
(3, 'ZTE SB-ML', 3300, 8800, 3380, 4000, 8890, 'surabaya - malang'),
(4, 'ZTE SB-MN', 0, 0, 0, 0, 0, 'surabaya - madiun'),
(6, 'ZTE SB-JKT', 77, 88, 88, 0, 89, ' surabaya - Jakarta'),
(8, 'ZTE SB-BD', 0, 0, 0, 0, 0, 'surabaya - bandung'),
(10, 'ZTE SB-SLO', 2500, 3000, 1100, 1, 3000, 'surabaya - solo'),
(14, 'ZTE SB-DPR', 8, 99, 9000, 0, 899, 'surabaya - denpasar'),
(15, 'NE SB-DPR', 9, 9, 9, 9, 9, 'NE untuk surabaya denpasar '),
(16, 'Main_Ring', 0, 98, 908, 989, 23, 'OK'),
(17, 'Out_Ring', 8908, 8, 9, 89, 8, 'KJKJ'),
(18, 'RL Juntion', 8, 97, 0, 897, 90, 'RL Juntion 1'),
(19, 'SMA1 K,KBL', 89, 7, 87, 7, 87, 'SMA1 K,KBL-Menur'),
(20, 'LASTMILE WUHAN', 7, 87, 8, 790, 980, 'Wuhan'),
(21, 'ZTE SB-SM', 9, 9, 9, 9, 9, 'MBUH'),
(22, 'ZTE SB-GBR', 1, 2, 3, 4, 33, 'GAK TAHU'),
(23, 'ALCATEL_1660_SM KBL-RKT', 2, 2, 2, 2, 2, 'FJSD'),
(24, 'NORTHEN_ROUTE SB-ML', 23, 2, 2, 32, 3, 'NR'),
(25, 'NORTHEN_ROUTE SB-DPR', 3, 2, 3, 3, 39909, 'D'),
(26, 'NORTHEN_ROUTE SB-MN', 4, 3, 32, 2, 6, 'FG'),
(27, 'NORTHEN_ROUTE SB-JKT', 3, 23, 42, 3, 1, 'SDF'),
(28, 'NORTHEN_ROUTE SB-JKT', 3, 23, 42, 3, 12, 'SDF'),
(29, 'ADM_HUAWEI SUBAYA-JKT-BTM', 12, 3, 12, 31, 323, 'SD'),
(30, 'ADM_HUAWEI SUBAYA-JKT-BTM', 12, 3, 12, 31, 3233, 'SD'),
(31, 'LASTSMILE ADX100_1&ADX100_2', 12, 1, 23, 1, 23, 'SDF'),
(32, 'COMLINE_URBAN KETAPANG(KTP)', 2, 42, 34, 2, 34, 'SDF'),
(33, 'COMLINE_URBAN BANGKALAN(BKL)', 24, 2, 43, 2, 43, 'FSD'),
(34, 'COMLINE_URBAN SAMPANG(SMP)', 2, 4, 2, 43, 24, 'DFSDR2'),
(35, 'RADIO_FUJITSU BL-GSK', 4, 2, 34, 23, 4, 'SFD2'),
(36, 'RADIO_FUJITSU KBL-PMK', 23, 2342, 34, 23, 4, 'FDS'),
(37, 'PDH_SIEMENS_RAP_III KBL-BKL', 23, 12, 12, 3, 12, 'FSD234'),
(38, 'PDH_SIEMENS_RAP_III KBL-GSK', 23, 12, 12, 3, 123, 'FSD234'),
(39, 'PDH_SIEMENS_RAP_III KBL-TDS', 234234, 23, 4, 34, 23, 'DFS');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_ggn`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_koordinasi`
--

INSERT INTO `tb_koordinasi` (`id_koordinasi`, `id_loker`, `telp`, `telp2`, `id_peg`) VALUES
(4, 1, '22', '1111', 2),
(5, 1, '33334', '4444', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`id_peg`, `nik`, `nama`, `alamat`, `username`, `password`, `id_level`, `id_session`) VALUES
(1, '111111111111', 'bang opik :))', 'jalan lurus gang kebenaran no 1 gak ada tanding\r\n', 'taekmu', 'e8f8fe6ae319ffce0f41f501fd05292e', 'admin', 'bb02nirjtmtugpgn6rrfl796g2'),
(2, '085655009393', 'epi', 'ngaglik I no 29 Surabaya', 'epiii', 'd41d8cd98f00b204e9800998ecf8427e', 'public', 'rltohpvhaj6ukjsb9na3733sf1'),
(5, '999999999999', 'public2 ', 'lupa iaman', 'public2', '2c3a361fb1de561aa70f6aee4727c6a9', 'public', ''),
(6, '789798', 'uiui', 'uio', 'sip', '06b15d3af713e318d123274a98d70bc9', 'user', '6o8lcdv2kmbvs3tmvd5e4fmi60');

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
('P001', 'zte', 'ok', 2013, 2013, 90),
('P002', '7', '7', 2013, 2013, 90),
('P003', '3', '3', 2013, 2013, 90),
('P004', '5', '5', 2013, 2013, 5),
('P005', '3', '3', 2013, 2013, 5),
('P007', '3', '43', 2013, 2013, 5),
('P008', '3', '3', 2013, 2013, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_perangkat_detail`
--


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
