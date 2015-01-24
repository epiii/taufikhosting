/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50141
Source Host           : 127.0.0.1:3306
Source Database       : mux

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2014-01-28 16:14:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mhs
-- ----------------------------
DROP TABLE IF EXISTS `mhs`;
CREATE TABLE `mhs` (
  `nim` varchar(10) NOT NULL DEFAULT '',
  `namamhs` varchar(30) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mhs
-- ----------------------------
INSERT INTO `mhs` VALUES ('444', 'ini', 'itu');
INSERT INTO `mhs` VALUES ('222', 'bnyak', 'duduk');
INSERT INTO `mhs` VALUES ('555', 'siapa', 'dia');

-- ----------------------------
-- Table structure for tb_alat
-- ----------------------------
DROP TABLE IF EXISTS `tb_alat`;
CREATE TABLE `tb_alat` (
  `id_alat` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kegunaan` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `thn_oper` char(4) NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_alat
-- ----------------------------
INSERT INTO `tb_alat` VALUES ('tlkm0008989i', 'okoko', 'jkjkj', 'huhuhu', '2007', 'baik');
INSERT INTO `tb_alat` VALUES ('tlkm00454646499000', 'layoue', 'arnet sbb', 'ok', '2013', 'rusak');
INSERT INTO `tb_alat` VALUES ('tlkm0090099', 'sbb', 'ukur meter', 'siemens cx500 c', '2013', 'rusak');

-- ----------------------------
-- Table structure for tb_backbone
-- ----------------------------
DROP TABLE IF EXISTS `tb_backbone`;
CREATE TABLE `tb_backbone` (
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
  KEY `id_sistra_2` (`id_sistra`),
  CONSTRAINT `tb_backbone_ibfk_1` FOREIGN KEY (`id_sistra`) REFERENCES `tb_sistra` (`id_sistra`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_backbone
-- ----------------------------
INSERT INTO `tb_backbone` VALUES ('1', 'ZTE SB-JR', '1', '11', '0', '0', '0', '0', 'surabaya - jember');
INSERT INTO `tb_backbone` VALUES ('2', 'ZTE SB-RKT', '1', '300', '7', '9', '0', '8', 'surabaya - rungkut');
INSERT INTO `tb_backbone` VALUES ('3', 'ZTE SB-ML', '1', '4', '4', '4', '0', '4', 'surabaya - malang');
INSERT INTO `tb_backbone` VALUES ('4', 'ZTE SB-MN', '1', '0', '0', '0', '0', '0', 'surabaya - madiun');
INSERT INTO `tb_backbone` VALUES ('6', 'ZTE SB-JKT', '1', '17', '88', '88', '0', '89', ' surabaya - Jakarta');
INSERT INTO `tb_backbone` VALUES ('8', 'ZTE SB-BD', '1', '0', '0', '0', '0', '0', 'surabaya - bandung');
INSERT INTO `tb_backbone` VALUES ('10', 'ZTE SB-SLO', '1', '13', '32', '2', '2', '1', 'surabaya - solo');
INSERT INTO `tb_backbone` VALUES ('14', 'ZTE SB-DPR', '1', '8', '99', '9000', '0', '899', 'surabaya - denpasar');
INSERT INTO `tb_backbone` VALUES ('16', 'Main_Ring', '1', '0', '98', '908', '989', '23', 'OK');
INSERT INTO `tb_backbone` VALUES ('17', 'ALCATEL Out_Ring', '1', '10', '8', '9', '89', '8', 'KJKJ');
INSERT INTO `tb_backbone` VALUES ('18', 'RL Juntion', '1', '8', '97', '0', '897', '90', 'RL Juntion 1');
INSERT INTO `tb_backbone` VALUES ('20', 'LASTMILE WUHAN', '1', '7', '87', '8', '790', '980', 'Wuhan');
INSERT INTO `tb_backbone` VALUES ('21', 'ZTE SB-SM', '1', '9', '9', '9', '9', '9', 'MBUH');
INSERT INTO `tb_backbone` VALUES ('22', 'ZTE SB-GBR', '1', '1', '2', '3', '4', '33', 'GAK TAHU');
INSERT INTO `tb_backbone` VALUES ('23', 'ALCATEL KBL-RKT', '1', '4', '2', '2', '2', '2', 'FJSD');
INSERT INTO `tb_backbone` VALUES ('24', 'ALCATEL SB-ML', '1', '16', '2', '2', '32', '3', 'NR');
INSERT INTO `tb_backbone` VALUES ('25', 'NORTHEN_ROUTE SB-DPR', '1', '3', '2', '3', '3', '39909', 'D');
INSERT INTO `tb_backbone` VALUES ('26', 'NORTHEN_ROUTE SB-MN', '1', '4', '3', '32', '2', '6', 'FG');
INSERT INTO `tb_backbone` VALUES ('27', 'NORTHEN_ROUTE SB-JKT', '1', '3', '23', '42', '3', '1', 'SDF');
INSERT INTO `tb_backbone` VALUES ('28', 'ALCATEL SB-JKT', '1', '15', '23', '42', '3', '12', 'SDF');
INSERT INTO `tb_backbone` VALUES ('30', 'ALCATEL SUBAYA-JKT-BTM', '1', '4', '3', '12', '31', '3', 'SD');
INSERT INTO `tb_backbone` VALUES ('31', 'LASTSMILE ADX100_1&ADX100_2', '1', '12', '1', '23', '1', '23', 'SDF');
INSERT INTO `tb_backbone` VALUES ('32', 'COMLINE_URBAN KETAPANG(KTP)', '1', '2', '42', '34', '2', '34', 'SDF');
INSERT INTO `tb_backbone` VALUES ('33', 'ALCATEL BANGKALAN(BKL)', '1', '3', '2', '5', '2', '43', 'FSD');
INSERT INTO `tb_backbone` VALUES ('34', 'COMLINE_URBAN SAMPANG(SMP)', '1', '2', '4', '2', '43', '24', 'DFSDR2');
INSERT INTO `tb_backbone` VALUES ('35', 'ALCATEL BL-GSK', '1', '2', '2', '34', '23', '4', 'SFD2');
INSERT INTO `tb_backbone` VALUES ('36', 'ALCATEL KBL-PMK', '1', '2', '3', '4', '5', '6', 'FDS');
INSERT INTO `tb_backbone` VALUES ('37', 'ALCATEL KBL-BKL8', '1', '3', '4', '5', '6', '7', 'keteranga kbl bkl 8');
INSERT INTO `tb_backbone` VALUES ('38', 'PDH_SIEMENS KBL-GSK', '1', '2', '3', '4', '5', '6', 'FSD234');
INSERT INTO `tb_backbone` VALUES ('39', 'ALCATEL KBL-TDS', '1', '2', '3', '4', '5', '6', 'KEBALEN-TANDES');
INSERT INTO `tb_backbone` VALUES ('46', 'TEJAS oke', '1', '1', '3', '4', '5', '6', 'yes');
INSERT INTO `tb_backbone` VALUES ('47', 'ZTE SB-GAMBIR', '1', '100', '0', '0', '0', '0', 'ZTE SB-GAMBIR');

-- ----------------------------
-- Table structure for tb_ggn
-- ----------------------------
DROP TABLE IF EXISTS `tb_ggn`;
CREATE TABLE `tb_ggn` (
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
  KEY `id_koordinasi_3` (`id_koordinasi`),
  CONSTRAINT `tb_ggn_ibfk_1` FOREIGN KEY (`id_koordinasi`) REFERENCES `tb_koordinasi` (`id_koordinasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_ggn
-- ----------------------------
INSERT INTO `tb_ggn` VALUES ('4', '6', '6', '6', '6', '2014-02-20', '00:00:07', '00:00:00', '8', '4');

-- ----------------------------
-- Table structure for tb_koordinasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_koordinasi`;
CREATE TABLE `tb_koordinasi` (
  `id_koordinasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_loker` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `telp2` varchar(15) NOT NULL,
  `id_peg` int(11) NOT NULL,
  PRIMARY KEY (`id_koordinasi`),
  KEY `id_peg` (`id_peg`),
  CONSTRAINT `tb_koordinasi_ibfk_1` FOREIGN KEY (`id_peg`) REFERENCES `tb_peg` (`id_peg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_koordinasi
-- ----------------------------
INSERT INTO `tb_koordinasi` VALUES ('4', '1', '22', '1111', '2');
INSERT INTO `tb_koordinasi` VALUES ('5', '1', '33334', '4444', '5');
INSERT INTO `tb_koordinasi` VALUES ('6', '5', '08042829', '0312492384', '5');
INSERT INTO `tb_koordinasi` VALUES ('7', '3', 'okh;k', 'ljhkjh', '9');

-- ----------------------------
-- Table structure for tb_linka
-- ----------------------------
DROP TABLE IF EXISTS `tb_linka`;
CREATE TABLE `tb_linka` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `nama` varchar(11) NOT NULL,
  PRIMARY KEY (`id_linka`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_linka
-- ----------------------------
INSERT INTO `tb_linka` VALUES ('1', 'surabaya', 'SB');
INSERT INTO `tb_linka` VALUES ('2', 'malang', 'ML');
INSERT INTO `tb_linka` VALUES ('3', 'jember', 'JR');
INSERT INTO `tb_linka` VALUES ('4', 'jakarta', 'JKT');
INSERT INTO `tb_linka` VALUES ('5', 'bandung', 'BD');
INSERT INTO `tb_linka` VALUES ('6', 'kebalen', 'KBL');
INSERT INTO `tb_linka` VALUES ('7', 'SB3G', 'SB3G');
INSERT INTO `tb_linka` VALUES ('8', 'LMG', 'LMG');
INSERT INTO `tb_linka` VALUES ('9', 'BBA', 'BBA');
INSERT INTO `tb_linka` VALUES ('10', 'SB1G', 'SB1G');
INSERT INTO `tb_linka` VALUES ('11', 'BKL', 'BKL');
INSERT INTO `tb_linka` VALUES ('12', 'ANTV', 'ANTV');
INSERT INTO `tb_linka` VALUES ('13', 'PS', 'PS');
INSERT INTO `tb_linka` VALUES ('14', 'SB1T', 'SB1T');
INSERT INTO `tb_linka` VALUES ('15', 'RKT', 'RKT');
INSERT INTO `tb_linka` VALUES ('16', 'PDA', 'PDA');
INSERT INTO `tb_linka` VALUES ('17', 'MGO', 'MGO');
INSERT INTO `tb_linka` VALUES ('18', 'MKS', 'MKS');
INSERT INTO `tb_linka` VALUES ('19', 'SB3T', 'SB3T');
INSERT INTO `tb_linka` VALUES ('20', '', '');
INSERT INTO `tb_linka` VALUES ('21', 'SB1', 'SB1');
INSERT INTO `tb_linka` VALUES ('22', 'SB1NGN', 'SB1NGN');
INSERT INTO `tb_linka` VALUES ('23', 'DPR', 'DPR');
INSERT INTO `tb_linka` VALUES ('24', 'BJM', 'BJM');

-- ----------------------------
-- Table structure for tb_linkb
-- ----------------------------
DROP TABLE IF EXISTS `tb_linkb`;
CREATE TABLE `tb_linkb` (
  `id_linkb` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id_linkb`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_linkb
-- ----------------------------
INSERT INTO `tb_linkb` VALUES ('1', 'bandung', 'BD');
INSERT INTO `tb_linkb` VALUES ('2', 'jakarta', 'JKT');
INSERT INTO `tb_linkb` VALUES ('3', 'surabaya', 'SB');
INSERT INTO `tb_linkb` VALUES ('4', 'madiun', 'MN');
INSERT INTO `tb_linkb` VALUES ('5', 'malang', 'ML');
INSERT INTO `tb_linkb` VALUES ('6', 'GRAHA PENA JAWAPOS', 'G.PENA');
INSERT INTO `tb_linkb` VALUES ('7', 'MKS', 'MKS');
INSERT INTO `tb_linkb` VALUES ('8', 'BPP', 'BPP');
INSERT INTO `tb_linkb` VALUES ('9', 'GBR', 'GBR');
INSERT INTO `tb_linkb` VALUES ('10', 'JKT3', 'JKT3');
INSERT INTO `tb_linkb` VALUES ('11', 'JTN', 'JTN');
INSERT INTO `tb_linkb` VALUES ('12', 'BATAM', 'BATAM');
INSERT INTO `tb_linkb` VALUES ('13', 'JTM', 'JTM');
INSERT INTO `tb_linkb` VALUES ('14', '', '');

-- ----------------------------
-- Table structure for tb_loker
-- ----------------------------
DROP TABLE IF EXISTS `tb_loker`;
CREATE TABLE `tb_loker` (
  `id_loker` int(11) NOT NULL AUTO_INCREMENT,
  `loker` varchar(100) NOT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_loker
-- ----------------------------
INSERT INTO `tb_loker` VALUES ('1', 'kebalen');
INSERT INTO `tb_loker` VALUES ('3', 'ketintang');
INSERT INTO `tb_loker` VALUES ('4', 'suramadu');
INSERT INTO `tb_loker` VALUES ('5', 'ngagel jaya utara');

-- ----------------------------
-- Table structure for tb_peg
-- ----------------------------
DROP TABLE IF EXISTS `tb_peg`;
CREATE TABLE `tb_peg` (
  `id_peg` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_level` enum('admin','user','public') NOT NULL,
  `id_session` text NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_peg
-- ----------------------------
INSERT INTO `tb_peg` VALUES ('1', '111111111111', 'mukhamad taufik manami', 'jalan moker aja', 'opik', '1996b97f5732a056542036235a55ea2f', 'admin', 'rasih2t4r53svpt02cs72da4g6');
INSERT INTO `tb_peg` VALUES ('2', '612030', 'mulyono', 'pegesangan gg.10', 'epiii', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'rltohpvhaj6ukjsb9na3733sf1');
INSERT INTO `tb_peg` VALUES ('5', '999999999999', 'public2 ', 'lupa iaman', 'public2', '2c3a361fb1de561aa70f6aee4727c6a9', 'public', '');
INSERT INTO `tb_peg` VALUES ('9', '612030', 'mulyono', 'pagesangan', '612030', 'a07c7767a98b8e26418ceb19316475d3', 'user', '');
INSERT INTO `tb_peg` VALUES ('10', '621350', 'sugiyono', 'sidoarjo gg,10', '621350', '025db44c7bed5aad0be250dd67f1321b', 'user', '');
INSERT INTO `tb_peg` VALUES ('11', '9', '9', '9', '9', 'c9f0f895fb98ab9159f51fd0297e236d', 'user', '');
INSERT INTO `tb_peg` VALUES ('12', '9', '9', '9', '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'user', '');

-- ----------------------------
-- Table structure for tb_perangkat
-- ----------------------------
DROP TABLE IF EXISTS `tb_perangkat`;
CREATE TABLE `tb_perangkat` (
  `id` char(4) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `thn_oper` int(11) NOT NULL,
  `thn_noper` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_perangkat
-- ----------------------------
INSERT INTO `tb_perangkat` VALUES ('P001', 'ZTE', 'TE M980', '2005', '0');
INSERT INTO `tb_perangkat` VALUES ('P002', 'ALCATEL', 'ALCATEL 1660 SM', '1998', '0');
INSERT INTO `tb_perangkat` VALUES ('P003', 'NEC', 'NEC_MR', '2013', '0');
INSERT INTO `tb_perangkat` VALUES ('P004', 'PDH_SIEMENS', 'PDH_SIEMENS RAPIII', '1997', '0');
INSERT INTO `tb_perangkat` VALUES ('P005', 'TEJAS', 'TJ001A', '2002', '0');

-- ----------------------------
-- Table structure for tb_perangkat_detail
-- ----------------------------
DROP TABLE IF EXISTS `tb_perangkat_detail`;
CREATE TABLE `tb_perangkat_detail` (
  `id_per_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_per` varchar(20) NOT NULL,
  `ddf_a` varchar(50) NOT NULL,
  `ddf_b` varchar(50) NOT NULL,
  `channelida` varchar(50) NOT NULL,
  `channelidb` varchar(50) NOT NULL,
  `id_backbone` int(11) NOT NULL,
  PRIMARY KEY (`id_per_detail`),
  KEY `id_per` (`id_per`),
  KEY `id_per_2` (`id_per`),
  KEY `id_per_3` (`id_per`),
  KEY `id_backbone` (`id_backbone`) USING BTREE,
  CONSTRAINT `tb_perangkat_detail_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `tb_perangkat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_perangkat_detail
-- ----------------------------

-- ----------------------------
-- Table structure for tb_sirkit
-- ----------------------------
DROP TABLE IF EXISTS `tb_sirkit`;
CREATE TABLE `tb_sirkit` (
  `id_sirkit` int(11) NOT NULL AUTO_INCREMENT,
  `id_per_detail` int(11) NOT NULL,
  `kondisi` enum('rusak','normal') NOT NULL,
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
  KEY `id_user_2` (`id_user`),
  KEY `id_linkA_2` (`id_linka`),
  KEY `id_per_detail` (`id_per_detail`),
  CONSTRAINT `tb_sirkit_ibfk_2` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  CONSTRAINT `tb_sirkit_ibfk_3` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linka`),
  CONSTRAINT `tb_sirkit_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  CONSTRAINT `tb_sirkit_ibfk_6` FOREIGN KEY (`id_linka`) REFERENCES `tb_linka` (`id_linka`),
  CONSTRAINT `tb_sirkit_ibfk_7` FOREIGN KEY (`id_linkb`) REFERENCES `tb_linkb` (`id_linkb`),
  CONSTRAINT `tb_sirkit_ibfk_9` FOREIGN KEY (`id_per_detail`) REFERENCES `tb_perangkat_detail` (`id_per_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=778 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sirkit
-- ----------------------------

-- ----------------------------
-- Table structure for tb_sirkit(shadow)
-- ----------------------------
DROP TABLE IF EXISTS `tb_sirkit(shadow)`;
CREATE TABLE `tb_sirkit(shadow)` (
  `id_sirkit` int(11) NOT NULL AUTO_INCREMENT,
  `id_per_detail` int(11) NOT NULL,
  `kondisi` enum('rusak','normal') NOT NULL,
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
  KEY `id_user_2` (`id_user`),
  KEY `id_linkA_2` (`id_linka`),
  KEY `id_per_detail` (`id_per_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sirkit(shadow)
-- ----------------------------

-- ----------------------------
-- Table structure for tb_sistra
-- ----------------------------
DROP TABLE IF EXISTS `tb_sistra`;
CREATE TABLE `tb_sistra` (
  `id_sistra` int(11) NOT NULL AUTO_INCREMENT,
  `sistra` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sistra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sistra
-- ----------------------------
INSERT INTO `tb_sistra` VALUES ('1', 'DWDM');
INSERT INTO `tb_sistra` VALUES ('2', 'ALCATEL');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'sljj', 'ini sljj');
INSERT INTO `tb_user` VALUES ('2', 'mea', 'ini mea');
INSERT INTO `tb_user` VALUES ('3', 'flexi', 'ini flexi');
INSERT INTO `tb_user` VALUES ('4', 'speedy', 'ini speedy');
INSERT INTO `tb_user` VALUES ('5', 'olo', 'ini olo');
INSERT INTO `tb_user` VALUES ('6', 'mm', 'ini mm');
INSERT INTO `tb_user` VALUES ('7', 'l/c', 'ini l/c');
INSERT INTO `tb_user` VALUES ('8', 'b.tel', 'ini b. tel');
INSERT INTO `tb_user` VALUES ('9', 'multimedia', 'multimedia');
INSERT INTO `tb_user` VALUES ('10', 'hcpt', 'hcpt');
INSERT INTO `tb_user` VALUES ('11', 'TELKOMSEL', 'TELKOMSEL');
INSERT INTO `tb_user` VALUES ('12', '', '');
INSERT INTO `tb_user` VALUES ('13', 'circecom', 'circecom');
INSERT INTO `tb_user` VALUES ('14', 'trunk', 'trunk');
INSERT INTO `tb_user` VALUES ('15', 'tc', 'tc');
INSERT INTO `tb_user` VALUES ('16', 'mumed', 'mumed');
INSERT INTO `tb_user` VALUES ('17', 'atlasat', 'atlasat');
INSERT INTO `tb_user` VALUES ('18', 'stp ', 'stp ');
INSERT INTO `tb_user` VALUES ('19', 'singtel', 'singtel');
